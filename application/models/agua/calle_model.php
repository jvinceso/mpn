<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*Autogenered Developed by @divisoft*/
/* fecha : 30-03-2014 00:08:07 */
class Calle_model extends CI_Model {
		//Atributos de Clase
	private $nCalId = '';
	private $cCalNombre = '';
	private $nViaId = '';
	private $nSecId = '';
	private $nCalEstado = '';
	private $dCalFechaRegistro = '';

		//Constructor de Clase
	function __construct(){
		parent::__construct();
	}

		//FUNCIONES Set
	function set_nCalId($nCalId){
		$this->nCalId = $nCalId;
	}
	function set_cCalNombre($cCalNombre){
		$this->cCalNombre = $cCalNombre;
	}
	function set_nViaId($nViaId){
		$this->nViaId = $nViaId;
	}
	function set_nSecId($nSecId){
		$this->nSecId = $nSecId;
	}

		//FUNCIONES Get
	function get_nCalId(){
		return $this->nCalId;
	}
	function get_cCalNombre(){
		return $this->cCalNombre;
	}
	function get_nViaId(){
		return $this->nViaId;
	}
	function get_nSecId(){
		return $this->nSecId;
	}
		//Obtener Objeto CALLE
	public function get_ObjCalle(){
		$query = $this->db->query("select c.nCalId,CONCAT(v.cViaNombre,' ',c.cCalNombre) as nombre from calle as c  
			inner join via as v on c.nViaId = v.nViaId where c.nCalEstado = 1 and c.nSecId = ?", array( $this->nSecId ));
		if ($query->num_rows() > 0){
			return $query->result_array();
		}else{
			return false;
		}
	}

	public function cboTipoSector(){		
		$query = $this->db->query("select nSecId,cSecNombre from sector");
		if ($query) {
			$data   = $query->result_array();
            // print_p($data);exit();
			$combo  = creaCombo($data);
			$result = form_dropdown("cbo_ins_cal_sector", $combo,'', 'id="cbo_ins_cal_sector" class="chosen-select"');
			return $result;
		} else {
			return false;
		}
	}
	public function cboTipoVia(){		
		$query = $this->db->query("select nViaId,cViaNombre from via");
		if ($query) {
			$data   = $query->result_array();
            // print_p($data);exit();
			$combo  = creaCombo($data);
			$result = form_dropdown("cbo_ins_cal_via", $combo,'', 'id="cbo_ins_cal_via" class="chosen-select"');
			return $result;
		} else {
			return false;
		}
	}

	public function insCalle(){
		$calle = array(
			'cCalNombre' =>  $this->get_cCalNombre(),
			'nSecId'     =>  $this->get_nSecId(),
			'nViaId'     =>  $this->get_nViaId()
			);
		// print_p($calle);exit();
		$this->db->insert('calle', $calle);
		return $this->db->insert_id();
	}

	public function qryCalle(){		
		$query = $this->db->query("
			select c.nCalId as ID,c.cCalNombre as Nombre,s.cSecNombre as Sector,v.cViaNombre as Vía,c.dCalFechaRegistro as fecha from calle c
			inner join  sector s on c.nSecId = s.nSecId
			inner join  via v on c.nViaId = v.nViaId
			where c.nCalEstado = 1"
			);
		if ($query) {
			return $query->result_array();
		} else {
			return false;
		}
	}

	function getCalle($nCalId){		
		$query = $this->db->query("
						select c.nCalId ,c.cCalNombre ,s.nSecId, v.nViaId ,c.dCalFechaRegistro from calle c
						inner join  sector s on c.nSecId = s.nSecId
						inner join  via v on c.nViaId = v.nViaId
						where nCalId = '".$nCalId."' and c.nCalEstado = 1
									
			");
		if ($query->num_rows() > 0) {
			return $query->row_array();
		} else {
			return false;
		}
	}
	
}
?>