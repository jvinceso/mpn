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

		public function insVia(){
			$data = array(
				'cViaNombre' => $this->get_cViaNombre()
				);
			$this->db->insert('via', $data);
			return $this->db->insert_id();
		}
	}
?>