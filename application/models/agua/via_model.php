<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*Autogenered Developed by @divisoft*/
/* fecha : 30-03-2014 00:08:07 */
class Via_model extends CI_Model {
		//Atributos de Clase
	private $nViaId = '';
	private $nViaNombre = '';

		//Constructor de Clase
	function __construct(){
		parent::__construct();
	}

		//FUNCIONES Set
	function set_nViaId($nViaId){
		$this->nViaId = $nViaId;
	}
	function set_cViaNombre($cViaNombre){
		$this->cViaNombre = $cViaNombre;
	}

		//FUNCIONES Get
	function get_nViaId(){
		return $this->nViaId;
	}
	function get_cViaNombre(){
		return $this->cViaNombre;
	}
		//Obtener Objeto TIPO_VIA
	function get_ObjTipo_via($CAMPO){
		$query = $this->db->query("SELECT * FROM TIPO_VIA WHERE CAMPO=?", array($CAMPO));
		if ($query->num_rows() > 0){
			$row = $query->row();
				//CREANDO EL OBJETO
		}
	}

	function insVia(){
		$data = array(
			'cViaNombre' => $this->get_cViaNombre()
			);
		$this->db->insert('via', $data);
		return $this->db->insert_id();
	}

	function qryVias(){		
		$query = $this->db->query("select nViaId as ID,cViaNombre as Nombre,dViaFechaRegistro as fecha from via where  cViaEstado=1");
		if ($query) {
			return $query->result_array();
		} else {
			return false;
		}
	}	

	function getVia($nViaId){		
		$query = $this->db->query("
									SELECT nViaId,cViaNombre FROM via WHERE nViaId = '".$nViaId."' and cViaEstado = 1
			");
		if ($query->num_rows() > 0) {
			return $query->row_array();
		} else {
			return false;
		}
	}

	function updVia(){
        $data = array(
            'cViaNombre'  =>  $this->get_cViaNombre()
            );
        $this->db->where('nViaId', $this->get_nViaId());
        $this->db->update('via', $data); 
        return true;
    }
}
?>