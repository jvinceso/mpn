<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*Autogenered Developed by @divisoft*/
/* fecha : 30-03-2014 00:08:07 */
class Sector_model extends CI_Model {
		//Atributos de Clase
	private $nSecId = '';
	private $cSecNombre = '';
	private $dSecFechaRegistro = '';
	private $cSecEstado = '';

		//Constructor de Clase
	function __construct(){
		parent::__construct();
	}

		//FUNCIONES Set
	function set_nSecId($nSecId){
		$this->nSecId = $nSecId;
	}
	function set_cSecNombre($cSecNombre){
		$this->cSecNombre = $cSecNombre;
	}

		//FUNCIONES Get
	function get_nSecId(){
		return $this->nSecId;
	}
	function get_cSecNombre(){
		return $this->cSecNombre;
	}
		//Obtener Objeto SECTOR
	function get_ObjSector($CAMPO){
		$query = $this->db->query("SELECT * FROM SECTOR WHERE CAMPO=?", array($CAMPO));
		if ($query->num_rows() > 0){
			$row = $query->row();
				//CREANDO EL OBJETO
		}
	}

	public function insSector(){
		$data = array(
			'cSecNombre' => $this->get_cSecNombre()
			);
		$this->db->insert('sector', $data);
		return $this->db->insert_id();
	}
	public function qrySector(){		
		$query = $this->db->query("select nSecId as ID,cSecNombre as Nombre,dSecFechaRegistro as fecha from sector where  cSecEstado=1");
		if ($query) {
			return $query->result_array();
		} else {
			return false;
		}
	}	

	function getSector($nSecId){		
		$query = $this->db->query("
									SELECT nSecId,cSecNombre FROM SECTOR WHERE nSecId = '".$nSecId."' AND cSecEstado = 1
			");
		if ($query->num_rows() > 0) {
			return $query->row_array();
		} else {
			return false;
		}
	}

	function updSector(){
        $data = array(
            'cSecNombre'  =>  $this->get_cSecNombre()
            );
        $this->db->where('nSecId', $this->get_nSecId());
        $this->db->update('sector', $data); 
        return true;
    }

   	function cboSectorUpd(){
        $query = $this->db->query("select nSecId,cSecNombre from sector");
        if ($query) {
            $data   = $query->result_array();
            // print_p($data);exit();
            $combo  = creaCombo($data);
            $result = form_dropdown("cbo_upd_cal_nSecId", $combo,$this->get_nSecId(), 'id="cbo_upd_cal_nSecId" class="chosen-select" style="width:160px"');
            return $result;
        } else {
            return false;
        }
	}

}
?>