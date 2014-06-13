<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*Autogenered Developed by @divisoft*/
/* fecha : 30-03-2014 00:08:07 */
class Concepto_model extends CI_Model {
		//Atributos de Clase
	private $nConId = '';
	private $cConDescripcion = '';
	private $fConCosto = '';
	private $nMulIdTipoPago = '';
	private $dConFechaRegistro = '';
	private $cConEstado = '';

		//Constructor de Clase
	function __construct(){
		parent::__construct();
	}

		//FUNCIONES Set
	function set_nConId($nConId){
		$this->nConId = $nConId;
	}
	function set_cConDescripcion($cConDescripcion){
		$this->cConDescripcion = $cConDescripcion;
	}
	function set_fConCosto($fConCosto){
		$this->fConCosto = $fConCosto;
	}
	function set_nMulIdTipoPago($nMulIdTipoPago){
		$this->nMulIdTipoPago = $nMulIdTipoPago;
	}
	function set_dConFechaRegistro($dConFechaRegistro){
		$this->dConFechaRegistro = $dConFechaRegistro;
	}
	function set_cConEstado($cConEstado){
		$this->cConEstado = $cConEstado;
	}

		//FUNCIONES Get
	function get_nConId(){
		return $this->nConId;
	}
	function get_cConDescripcion(){
		return $this->cConDescripcion;
	}
	function get_fConCosto(){
		return $this->fConCosto;
	}
	function get_nMulIdTipoPago(){
		return $this->nMulIdTipoPago;
	}
	function get_dConFechaRegistro(){
		return $this->dConFechaRegistro;
	}
	function get_cConEstado(){
		return $this->cConEstado;
	}
		//Obtener Objeto concepto

	public function insConcepto(){
		$concepto = array(
			'cConDescripcion' =>  $this->get_cConDescripcion(),
			'fConCosto'       =>  $this->get_fConCosto(),
			'nMulIdTipoPago'  =>  $this->get_nMulIdTipoPago()
			);
		// print_p($calle);exit();
		$this->db->insert('concepto', $concepto);
		return $this->db->insert_id();
	}

	public function listarConcepto(){		
		$query = $this->db->query("
			select c.nConId as ID, c.cConDescripcion as Nombre, c.fConCosto as costo,m.cMulDescripcion as 'Tipo de Pago', c.dConFechaRegistro as Fecha from concepto c
			inner join multitabla m on c.nMulIdTipoPago = m.nMulId
			where c.cConEstado = 1"
			);
		if ($query) {
			return $query->result_array();
		} else {
			return false;
		}
	}

	public function getConcepto($nConId){
		$query = $this->db->query("select nConId,cConDescripcion,fConCosto,nMulIdTipoPago from concepto where cConEstado = 1 and nConId='".$nConId."' ");
		if ($query->num_rows() > 0) {
			return $query->row_array();
		} else {
			return false;
		}
	}

	public function updConcepto(){
		$data = array(
			'cConDescripcion'  =>  $this->get_cConDescripcion(),
			'fConCosto'  	   =>  $this->get_fConCosto(),
			'nMulIdTipoPago'   =>  $this->get_nMulIdTipoPago()
			);
		$this->db->where('nConId', $this->get_nConId());
		$this->db->update('concepto', $data); 
		return true;
	}

	public function delConcepto(){
		$data = array(
			'cConEstado'  =>  0
			);
		$this->db->where('nConId', $this->get_nConId());
		$this->db->update('concepto', $data); 
		return true;
	}

	public function cboConcepto(){		
		$query = $this->db->query("
			select nConId, cConDescripcion from concepto where cConEstado = 1
			");
		if ($query) {
			$data   = $query->result_array();
            // print_p($data);exit();
			$combo  = creaCombo($data);
			$result = form_dropdown("cbo_ins_pag_concepto", $combo,'', 'id="cbo_ins_pag_concepto" class="chosen-select"');
			return $result;
		} else {
			return false;
		}
	}

	public function getCosto(){
		$query = $this->db->query("select fConCosto from concepto where cConEstado = 1 and nConId='".$this->get_nConId()."' ");
		if ($query->num_rows() > 0) {
			return $query->row_array();
		} else {
			return false;
		}
	}

}
?>