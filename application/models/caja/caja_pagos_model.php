<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*Autogenered Developed by @divisoft*/
/* fecha : 20-05-2014 02:18:10 */
class Caja_pagos_model extends CI_Model {
	//Atributos de Clase
	private $nCpaId = '';
	private $nTmuId = '';
	private $nConId = '';
	private $cCpaSerieNumero = '';
	private $cCpaAno = '';
	private $nPerId = '';
	private $fCpaMonto = '';
	private $cCpaEstadoCobro = '';
	private $cCpaMes = '';
	private $fCpaHoras = '';
	private $cCpaSector = '';
	private $cCpaPlanilla = '';
	private $cCpaFechaPlanilla = '';
	private $cCpaSerie = '';
	private $dCpaFechaRegistro = '';
	private $cCpaEstado = '';

		//Constructor de Clase
	function __construct(){
		parent::__construct();
	}

		//FUNCIONES Set
	public function set_nCpaId($nCpaId){
		$this->nCpaId = $nCpaId;
	}
	public function set_nTmuId($nTmuId){
		$this->nTmuId = $nTmuId;
	}
	public function set_nConId($nConId){
		$this->nConId = $nConId;
	}
	public function set_cCpaSerieNumero($cCpaSerieNumero){
		$this->cCpaSerieNumero = $cCpaSerieNumero;
	}
	public function set_cCpaAno($cCpaAno){
		$this->cCpaAno = $cCpaAno;
	}
	public function set_nPerId($nPerId){
		$this->nPerId = $nPerId;
	}
	public function set_fCpaMonto($fCpaMonto){
		$this->fCpaMonto = $fCpaMonto;
	}
	public function set_cCpaEstadoCobro($cCpaEstadoCobro){
		$this->cCpaEstadoCobro = $cCpaEstadoCobro;
	}
	public function set_cCpaMes($cCpaMes){
		$this->cCpaMes = $cCpaMes;
	}
	public function set_fCpaHoras($fCpaHoras){
		$this->fCpaHoras = $fCpaHoras;
	}
	public function set_cCpaSector($cCpaSector){
		$this->cCpaSector = $cCpaSector;
	}
	public function set_cCpaPlanilla($cCpaPlanilla){
		$this->cCpaPlanilla = $cCpaPlanilla;
	}
	public function set_cCpaFechaPlanilla($cCpaFechaPlanilla){
		$this->cCpaFechaPlanilla = $cCpaFechaPlanilla;
	}
	public function set_cCpaSerie($cCpaSerie){
		$this->cCpaSerie = $cCpaSerie;
	}
	public function set_dCpaFechaRegistro($dCpaFechaRegistro){
		$this->dCpaFechaRegistro = $dCpaFechaRegistro;
	}
	public function set_cCpaEstado($cCpaEstado){
		$this->cCpaEstado = $cCpaEstado;
	}

		//Obtener Objeto CAJA_PAGOS
	public function get_ObjCaja_pagos($CAMPO){
		$query = $this->db->query("SELECT * FROM CAJA_PAGOS WHERE CAMPO=?", array($CAMPO));
		if ($query->num_rows() > 0){
			$row = $query->row();
				//CREANDO EL OBJETO
		}
	}

	public function ins_pago_recibo(){
		$idCaja = 0;
		$this->db->trans_start();
		$sql_cajaRecibo = "select  nCpaId from caja_pagos where cCpaSerieNumero = '".$this->cCpaSerieNumero."'";
		$caja = array(
			'nPerId'    => $this->nPerId,
			'nTmuId'    => $this->nTmuId,
			'nConId'    => $this->nConId,
			'fCpaMonto' => $this->fCpaMonto,
			'cCpaAno'   => $this->cCpaAno,
			'cCpaMes'   => $this->cCpaMes,
			'cCpaSerieNumero'   => $this->cCpaSerieNumero
			);
		$rsCajaPago = $this->db->query( $sql_cajaRecibo );
		if( $rsCajaPago->num_rows() == 0 ){
			$this->db->insert('caja_pagos', $caja);
			$idCaja = $this->db->insert_id();
		}else{
			$caja['cCpaEstado'] = 1;
			$caja['dCpaFechaRegistro'] = date('Y-m-d H:i:s');

			$codCaja = $rsCajaPago->row()->nCpaId ;
			$this->db->where( 'nCpaId', $codCaja );	
			$idCaja = $this->db->update( 'caja_pagos', $caja );
		}
		$this->db->trans_complete();
		return $idCaja;
	}
		// $this->objCajaPagos->set_nTmuId($this->session->userdata('IdPersona'));
		// $this->objCajaPagos->set_nConId($this->input->post('cbo_ins_pag_concepto'));
		// $this->objCajaPagos->set_cCpaSerieNumero($this->input->post('txt_ins_pag_serie'));
		// $this->objCajaPagos->set_nPerId($this->input->post('hid_fnd_ins_pag_nombre'));
		// $this->objCajaPagos->set_fCpaMonto($this->input->post('txt_ins_pag_monto'));
		// $this->objCajaPagos->set_cCpaMes($this->input->post('txt_ins_pag_mes'));
		// $this->objCajaPagos->set_fCpaHoras($this->input->post('txt_ins_pag_horas'));
		// $this->objCajaPagos->set_cCpaSector($this->input->post('hid_fnd_ins_pag_sector'));
		// $this->objCajaPagos->set_cCpaPlanilla($this->input->post('txt_ins_pag_planilla'));
		// $this->objCajaPagos->set_cCpaFechaPlanilla($this->input->post('txt_ins_pag_fecha_planilla'));
		// $this->objCajaPagos->set_cCpaSerie($this->input->post('txt_ins_pag_serie'));
	public function insCajaPagos(){
		$this->db->trans_start();
		$ano = date("Y");
		$caja = array(
			'nTmuId'    		=> $this->nTmuId,
			'nConId'    		=> $this->nConId,
			'cCpaSerieNumero'   => 'CAJA',
			'cCpaAno'  			=> $ano,
			'nPerId'    		=> $this->nPerId,
			'fCpaMonto' 		=> $this->fCpaMonto,
			'cCpaEstadoCobro'	=> '1',
			'cCpaMes'  			=> $this->cCpaMes,
			'fCpaHoras'  		=> $this->fCpaHoras,
			'cCpaSector'  		=> $this->cCpaSector,
			'cCpaPlanilla'  	=> $this->cCpaPlanilla,
			'cCpaFechaPlanilla' => $this->cCpaFechaPlanilla,
			'cCpaSerie'  		=> $this->cCpaSerie,
			);
		$this->db->insert('caja_pagos', $caja);
		$idCaja = $this->db->insert_id();
		$this->db->trans_complete();
		return $idCaja;
	}

	public function qryCajaAgua(){		

		$query = $this->db->query("
			select 
			nCpaId as ID
			,CONCAT(p.cPerNombres ,' ',p.cPerApellidoPaterno,' ', p.cPerApellidoMaterno ) as Poblador
			,c.cConDescripcion as Descripción
			,cp.fCpaMonto as Monto
			,ifnull(cp.cCpaMes,'-') as Mes			
			,case 
			when cp.cCpaSerie is null then ifnull(cp.cCpaSerieNumero,'-')
			else cp.cCpaSerie
				end as Serie
			,dCpaFechaRegistro as Transferencia
			from caja_pagos cp
			inner join persona p on cp.nPerId = p.nPerId
			inner join concepto c on cp.nConId = c.nConId
			left join sector s  on cp.cCpaSector = s.nSecId
			where cp.cCpaEstado = 1 and p.cPerEstado = 1 and c.cConEstado = 1 and cCpaEstadoCobro = 0
			order by dCpaFechaRegistro desc
			");
		if ($query) {
			return $query->result_array();
		} else {
			return false;
		}
	}

	public function qryCajaPagos(){		

		$query = $this->db->query("
			select 
			nCpaId as ID
			,CONCAT(p.cPerNombres ,' ',p.cPerApellidoPaterno,' ', p.cPerApellidoMaterno ) as Poblador
			,c.cConDescripcion as Descripción
			,cp.fCpaMonto as Monto
			,ifnull(cp.cCpaMes,'-') as Mes 
			,ifnull(cp.fCpaHoras,'-') as Horas 
			,ifnull(s.cSecNombre,'-') as Sector 
			,ifnull(cp.cCpaPlanilla,'-') as Planilla
			,ifnull(cp.cCpaFechaPlanilla,'-') as Fecha
			,case 
			when cp.cCpaSerie is null then ifnull(cp.cCpaSerieNumero,'-')
			else cp.cCpaSerie
				end as Serie
			from caja_pagos cp
			inner join persona p on cp.nPerId = p.nPerId
			inner join concepto c on cp.nConId = c.nConId
			left join sector s  on cp.cCpaSector = s.nSecId
			where cp.cCpaEstado = 1 and p.cPerEstado = 1 and c.cConEstado = 1 and cCpaEstadoCobro = 1
			");
		if ($query) {
			return $query->result_array();
		} else {
			return false;
		}
	}

	public function getCajaPagos($nCpaId){
		$query = $this->db->query("
			select cp.nCpaId,cp.nPerId,cp.nConId,cp.fCpaMonto,CONCAT(p.cPerNombres ,' ',p.cPerApellidoPaterno,' ', p.cPerApellidoMaterno ) AS nombre 
			from caja_pagos cp inner join persona p on cp.nPerId = p.nPerId
 			where cCpaEstado = 1 and nCpaId='".$nCpaId."' 
			");
		if ($query->num_rows() > 0) {
			return $query->row_array();
		} else {
			return false;
		}
	}

	public function pagarReciboAgua($recibo,$abono){
		$this->db->trans_start();
		$data = array(
			'cCpaEstadoCobro'  =>  1
			);
		$this->db->where('nCpaId', $this->nCpaId);
		$this->db->update('caja_pagos', $data);	

		$data = array(
			 'fRecDeuda' 	 =>  0
			,'fRecAbono'  	 =>  $abono
			,'cRecPagado' 	 =>  'C'
			,'dRecFechaPago' =>  date("Y-m-d H:i:s")
			);
		$this->db->where('nRecId', $recibo);
		$this->db->update('recibo', $data);



		$this->db->trans_complete();
		return true;
// Addesd by jvinces
	}
}
?>