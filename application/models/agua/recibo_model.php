<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Recibo_model extends CI_Model {
	private $nRecId = '';
	private $dRecFechaImpresion = '';
	private $fRecDeuda = '';
	private $fRecAbono = '';
	private $fRecDescuento = '';
	private $cRecPagado = '';
	private $dRecFechaPago = '';
	private $nFevId = '';
	private $nPerIdContribuyente = '';
	private $nPerIdTrabajador = '';

	public function set_nRecId( $nRecId ){
		$this->nRecId = $nRecId;
	}
	public function set_dRecFechaImpresion( $dRecFechaImpresion ){
		$this->dRecFechaImpresion = $dRecFechaImpresion;
	}
	public function set_fRecDeuda( $fRecDeuda ){
		$this->fRecDeuda = $fRecDeuda;
	}
	public function set_fRecAbono( $fRecAbono ){
		$this->fRecAbono = $fRecAbono;
	}
	public function set_fRecDescuento( $fRecDescuento ){
		$this->fRecDescuento = $fRecDescuento;
	}
	public function set_cRecPagado( $cRecPagado ){
		$this->cRecPagado = $cRecPagado;
	}
	public function set_dRecFechaPago( $dRecFechaPago ){
		$this->dRecFechaPago = $dRecFechaPago;
	}
	public function set_nFevId( $nFevId ){
		$this->nFevId = $nFevId;
	}
	public function set_nPerIdContribuyente( $nPerIdContribuyente ){
		$this->nPerIdContribuyente = $nPerIdContribuyente;
	}
	public function set_nPerIdTrabajador( $nPerIdTrabajador ){
		$this->nPerIdTrabajador = $nPerIdTrabajador;
	}

	public function ins_procesar_recibos($anio){
		$rpta_proceso = 0;
		$sql_recibo = "";
		$sql_reciboDetalle = "";
		$nPerIdTrabajador = $this->session->userdata('IdPersona');
		/**
		 * Se Obtiene lista de contribuyentes segun el año que se ah seleccionado
		 * en base al servicio tipo y relación con la tabla costo
		 */
		$rsRecibos = $this->db->query("select nRecId from recibo where YEAR(dFecFechaRegistro) = '".$anio."'")->result_array();
		if ( count( $rsRecibos ) == 0 ) {
			$this->db->trans_start();
			$rsContribuyentes = $this->db->query('select p.nPerId from persona p
				inner join servicios_contribuyente sc on p.nPerId = sc.nPerId
				inner join costo_servicios_tipo cst on sc.nSetId = cst.nSetId
				where cPerEstado = 1 and cst.nCstAnio = '.$anio.'
				group by p.nPerId')->result_array();
			$rsCuotas = $this->db->query('select nFevId from fechas_vencimiento where nFevAnio = '.$anio.'')->result_array();

			foreach ($rsContribuyentes as $key => $value) {
				$nPerIdContribuyente = $value['nPerId'];
				foreach ( $rsCuotas as $indice => $valor) {				
					$this->db->query("INSERT INTO recibo(nFevId,nPerIdContribuyente,nPerIdTrabajador)VALUES(".$valor['nFevId'].",".$nPerIdContribuyente.",".$nPerIdTrabajador.")");
					$nRecId = $this->db->insert_id();
					// print_p($nRecId);
					$rsServicios = $this->db->query("select sc.nSecId,cst.fCstPago from servicios_contribuyente sc
						inner join servicios_tipo st ON sc.nSetId = st.nSetId
						inner join costo_servicios_tipo cst on st.nSetId = cst.nSetId
						where sc.nPerId = ".$nPerIdContribuyente."  and sc.cSecEstado = 1 and cst.nCstAnio = ".$anio."")->result_array();
					$total = 0;
					foreach ($rsServicios as $indi => $val) {
						$total +=$val['fCstPago'];
						$this->db->query("INSERT INTO recibo_detalle(nRecId,nSecId,cRedPrecio)VALUES(".$nRecId.",".$val['nSecId'].",".$val['fCstPago'].")");
					}
					$total = (Double) $total;
					$this->db->query("UPDATE recibo SET fRecDeuda = ".$total." WHERE nRecId = ".$nRecId." ");
				}
			}
			$this->db->trans_complete();
			// print_p( $this->db->_error_number() );
			// print_p( $this->db->_error_message() );
			$rpta_proceso = 1;
		}else{
			// ya se registraron los recibos de dicho anio
			$rpta_proceso = 3;
		}
		return $rpta_proceso;
	}

	public function qryRecibos( $anio = null ){
		$anio = is_null( $anio ) ? date('Y') : $anio ;
		// $this->db->trans_start();
		$sql_recibo_qry = 'SELECT  		r.nRecId as "ID"
				,@i := @i + 1 as Cuota
				,f.dFevFecha_vence AS "Vencimiento"
				,IFNULL(r.dRecFechaPago,"----/--/--") AS "Pago"
				,(
				SELECT sum(rd.cRedPrecio)
				FROM recibo_detalle rd 
					INNER JOIN servicios_contribuyente sc on sc.nSecId = rd.nSecId
					INNER JOIN servicios_tipo st on st.nSetId = sc.nSetId 
						and st.nMulTipoServicio IN (select nMulId from multitabla where nMulIdPadre = 47)
						and st.nMulServicio IN (select nMulId from multitabla where UPPER(cMulDescripcion) = UPPER("agua"))
				WHERE rd.nRecId = r.nRecId
				 ) as "Agua"
				,(
				SELECT rd.cRedPrecio
				FROM recibo_detalle rd 
					INNER JOIN servicios_contribuyente sc on sc.nSecId = rd.nSecId
					INNER JOIN servicios_tipo st on st.nSetId = sc.nSetId 
						and st.nMulTipoServicio IN (select nMulId from multitabla where nMulIdPadre = 47)
						and st.nMulServicio IN (select nMulId from multitabla where UPPER(cMulDescripcion) = UPPER("Desaguexx"))
				WHERE rd.nRecId = r.nRecId
				 ) as "Desague"
				,IFNULL(
				(
				SELECT rd.cRedPrecio
				FROM recibo_detalle rd 
					INNER JOIN servicios_contribuyente sc on sc.nSecId = rd.nSecId
					INNER JOIN servicios_tipo st on st.nSetId = sc.nSetId 
						and st.nMulTipoServicio IN (select nMulId from multitabla where nMulIdPadre = 47)
						and st.nMulServicio IN (select nMulId from multitabla where UPPER(cMulDescripcion) = UPPER("Limpieza"))
				WHERE rd.nRecId = r.nRecId
				),0) as "Limpieza Municipal"
				,r.fRecDeuda AS "Deuda"
				,CASE 
					WHEN r.fRecAbono IS NULL THEN 0.0
					ELSE r.fRecAbono
				END AS "Abonos"
			FROM recibo r
				INNER JOIN fechas_vencimiento f ON f.nFevId = r.nFevId
				,(select @i := 0) temp
			WHERE r.nPerIdContribuyente = '.$this->nPerIdContribuyente.' AND YEAR( r.dFecFechaRegistro ) = '.$anio.'
			ORDER BY nRecId ASC';
			// print_p( $sql_recibo_qry );	exit();
		$rsRecibos = $this->db->query( $sql_recibo_qry );

		if ($rsRecibos->num_rows() > 0) {
			return $rsRecibos->result_array();
		} else {
			return false;
		}
	}

	public function updateRecibo(){
		
	}
	public function getRecibo(){
		$sql = '
		SELECT 
			r.nRecId, r.dRecFechaImpresion, ( IFNULL(r.fRecDeuda,0) + IFNULL(r.fRecAbono,0) ) as Monto, 
			case MONTH(fv.dFevFecha_vence) 
						WHEN 1 THEN "Enero"
						WHEN 2 THEN "Febrero"
						WHEN 3 THEN "Marzo"
						WHEN 4 THEN "Abril"
						WHEN 5 THEN "Mayo"
						WHEN 6 THEN "Junio"
						WHEN 7 THEN "Julio"
						WHEN 8 THEN "Agosto"
						WHEN 9 THEN "Septiembre"
						WHEN 10 THEN "Octubre"
						WHEN 11 THEN "Noviembre"
						WHEN 12 THEN "Diciembre"
						ELSE "Esto no es un Mes"
			END as Mes,
			YEAR( fv.dFevFecha_vence ) as Anio,
			r.dRecFechaPago, r.nFevId, r.nPerIdContribuyente FROM recibo r
			INNER JOIN fechas_vencimiento fv ON fv.nFevId = r.nFevId
		where nRecId = '. $this->nRecId .';';
		$query = $this->db->query( $sql )->result_array();
		return $query;

	}
	public function getDataReport(){
		$sql_reporte = 'SELECT rd.nRecId ,
			p.nPerId AS CodigoPersona ,
		   case MONTH(fv.dFevFecha_vence) 
				WHEN 1 THEN "Enero"
				WHEN 2 THEN "Febrero"
				WHEN 3 THEN "Marzo"
				WHEN 4 THEN "Abril"
				WHEN 5 THEN "Mayo"
				WHEN 6 THEN "Junio"
				WHEN 7 THEN "Julio"
				WHEN 8 THEN "Agosto"
				WHEN 9 THEN "Septiembre"
				WHEN 10 THEN "Octubre"
				WHEN 11 THEN "Noviembre"
				WHEN 12 THEN "Diciembre"
				ELSE "Esto no es un Mes"
		   END as Mes,
	   		YEAR( fv.dFevFecha_vence ) as Anio,			
       		CONCAT(p.cPerApellidoPaterno," ",p.cPerApellidoMaterno," ",p.cPerNombres) AS Nombres ,
       		CONCAT(v.cViaNombre," ",c.cCalNombre," ",pd.cPdeValor) AS Domicilio ,
       		s.cSecNombre AS Lugar ,
       		CONCAT(m.cMulDescripcion," - ",mt.cMulDescripcion) AS Concepto ,
       		rd.cRedPrecio AS Importe ,
       		DATE_FORMAT(cast(r.dRecFechaImpresion AS datetime),"%d/%m/%Y") AS FechaEmision ,
       		fv.dFevFecha_vence AS FechaVencimiento ,
       		fv.dFevFecha_corte AS FechaCorte ,
       		CONCAT("S/. ",r.fRecDeuda) AS Deuda
		FROM recibo_detalle rd
			INNER JOIN recibo r ON rd.nRecId = r.nRecId
			INNER JOIN servicios_contribuyente sc ON sc.nSecId = rd.nSecId
			INNER JOIN servicios_tipo st ON st.nSetId = sc.nSetId
			INNER JOIN multitabla m ON m.nMulId = st.nMulServicio
			INNER JOIN multitabla mt ON mt.nMulId = st.nMulTipoServicio
			INNER JOIN fechas_vencimiento fv ON fv.nFevId = r.nFevId
			INNER JOIN persona p ON p.nPerId = r.nPerIdContribuyente
			INNER JOIN direccion_calle dc ON dc.nDicId = sc.nDicId
			INNER JOIN persona_detalle pd ON pd.nPdeId = dc.nPdeId
			INNER JOIN calle c ON c.nCalId = dc.nCalId
			INNER JOIN via v ON v.nViaId = c.nViaId
			INNER JOIN sector s ON s.nSecId = c.nSecId
		WHERE rd.nRecId = ' .$this->nRecId. ' ';
		
		$rsRecibos = $this->db->query( $sql_reporte );
		
		if ($rsRecibos->num_rows() > 0) {
			return $rsRecibos->result_array();
		} else {
			return false;
		}		
	}
	public function pagar_recibo(){

	}
}

/* End of file recibo_model.php */
/* Location: ./application/models/agua/recibo_model.php */
?>