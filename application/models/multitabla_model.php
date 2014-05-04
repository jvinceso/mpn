<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*Autogenered Developed by @divisoft*/
/* fecha : 30-03-2014 00:08:07 */
	class Multitabla_model extends CI_Model {
		//Atributos de Clase
		private $nMulId = '';
		private $nMulIdPadre = '';
		private $cMulDescripcion = '';
		private $cMulEstado = '';

		//Constructor de Clase
		function __construct(){
			parent::__construct();
		}

		//FUNCIONES Set
		function set_nMulId($nMulId){
			$this->nMulId = $nMulId;
		}
		function set_nMulIdPadre($nMulIdPadre){
			$this->nMulIdPadre = $nMulIdPadre;
		}
		function set_cMulDescripcion($cMulDescripcion){
			$this->cMulDescripcion = $cMulDescripcion;
		}
		function set_cMulEstado($cMulEstado){
			$this->cMulEstado = $cMulEstado;
		}

		//FUNCIONES Get
		function get_nMulId(){
			return $this->nMulId;
		}
		function get_nMulIdPadre(){
			return $this->nMulIdPadre;
		}
		function get_cMulDescripcion(){
			return $this->cMulDescripcion;
		}
		function get_cMulEstado(){
			return $this->cMulEstado;
		}
		//Obtener Objeto MULTITABLA
		function get_ObjMultitabla($CAMPO){
			$query = $this->db->query("SELECT * FROM MULTITABLA WHERE CAMPO=?", array($CAMPO));
			if ($query->num_rows() > 0){
				$row = $query->row();
				//CREANDO EL OBJETO
			}
		}

		public function insServicio(){
			$data = array(
				'nMulIdPadre' 	   => 51,
				'cMulDescripcion'  =>  $this->get_cMulDescripcion(),				
				'cMulEstado' 	   => 1
				);
			$this->db->insert('multitabla', $data);
			return $this->db->insert_id();
		}

		public function insServicioTipo(){
			$data = array(
				'nMulIdPadre' 	   => 47,
				'cMulDescripcion'  =>  $this->get_cMulDescripcion(),				
				'cMulEstado' 	   => 1
				);
			$this->db->insert('multitabla', $data);
			return $this->db->insert_id();
		}
		public function getServicioId(){ 
			$this->db->select('nMulId');
			$this->nMulId = $this->db->where(array('nMulIdPadre'=>47,'cMulDescripcion'=>$this->cMulDescripcion, 'cMulEstado'=>1 ))->get('multitabla')->result_array()[0]['nMulId'];
			return $this->nMulId;
		}	

		public function insTipoPago(){
			$data = array(
				'nMulIdPadre' 	   => 1,
				'cMulDescripcion'  => $this->get_cMulDescripcion(),				
				'cMulEstado' 	   => 1
				);
			$this->db->insert('multitabla', $data);
			return $this->db->insert_id();
		}

		public function qryTipoPago(){
		$query = $this->db->query("select nMulId,cMulDescripcion from multitabla where cMulEstado = 1 and nMulIdPadre = 1");
        if ($query) {
            $data   = $query->result_array();
            // print_p($data);exit();
            $combo  = creaCombo($data);
            $result = form_dropdown("cbo_ins_con_tipopago", $combo,'', 'id="cbo_ins_con_tipopago" class="chosen-select"');
            return $result;
        } else {
            return false;
        }
		}

		public function qrymultitabla(){
			$query = $this->db->query("select nMulId as ID,cMulDescripcion as descripción from multitabla where cMulEstado = 1 and nMulIdPadre ='".$this->nMulIdPadre."' ");
			return $query->result_array();	
		}



	}
?>