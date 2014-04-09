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
	}
?>