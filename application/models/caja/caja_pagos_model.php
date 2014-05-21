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

		$caja = array(
			'nPerId'    => $this->nPerId,
			'nConId'    => $this->nConId,
			'fCpaMonto' => $this->fCpaMonto,
			'cCpaAno'   => $this->cCpaAno,
			'cCpaMes'   => $this->cCpaMes
			);
		$this->db->insert('caja_pagos', $caja);
		return $this->db->insert_id();		
		$this->db->insert();
	}
}
?>