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
		echo "procesando......";
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
			// print_p( $rsContribuyentes );
			// print_p( $rsCuotas );
			// exit();
			foreach ($rsContribuyentes as $key => $value) {
				$nPerIdContribuyente = $value['nPerId'];
				foreach ( $rsCuotas as $indice => $valor) {				
					$this->db->query("INSERT INTO recibo(nFevId,nPerIdContribuyente,nPerIdTrabajador)VALUES(".$valor['nFevId'].",".$nPerIdContribuyente.",".$nPerIdTrabajador.")");
					$nRecId = $this->db->insert_id();
					print_p($nRecId);
					$rsServicios = $this->db->query("select sc.nSecId,cst.fCstPago from servicios_contribuyente sc
						inner join servicios_tipo st ON sc.nSetId = st.nSetId
						inner join costo_servicios_tipo cst on st.nSetId = cst.nSetId
						where sc.nPerId = ".$nPerIdContribuyente."  and sc.cSecEstado = 1 and cst.nCstAnio = ".$anio."")->result_array();
					$total = 0;
					foreach ($rsServicios as $indi => $val) {
						$total +=$val['fCstPago'];
						$this->db->query("INSERT INTO recibo_detalle(nRecId,nSecId,cRedPrecio)VALUES(".$nRecId.",".$val['nSecId'].",".$val['fCstPago'].")");
					}
					$this->db->query("UPDATE recibo SET fRecDeuda = ".$total." WHERE nRecId = ".$nRecId." ");
				}
			}
			$this->db->trans_complete();
			// print_p( $this->db->_error_number() );
			// print_p( $this->db->_error_message() );
			echo "<br>proceso terminado!!!!";
		}else{
			echo "ya se registraron los recibos de dicho anio";
		}
	}


	// $this->db->trans_start();
	// $this->db->query('AN SQL QUERY...');
	// $this->db->query('ANOTHER QUERY...');
	// $this->db->query('AND YET ANOTHER QUERY...');
	// $this->db->trans_complete();

}

/* End of file recibo_model.php */
/* Location: ./application/models/agua/recibo_model.php */
?>