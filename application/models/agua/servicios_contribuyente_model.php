<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*Autogenered Developed by @divisoft*/
/* fecha : 12-04-2014 22:29:05 */
	class Servicios_contribuyente_model extends CI_Model {
		//Atributos de Clase
		private $nSecId = '';
		private $nPerId = '';
		private $nSetId = '';
		private $nDicId = '';
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
		function set_nPerId($nPerId){
			$this->nPerId = $nPerId;
		}
		function set_nSetId($nSetId){
			$this->nSetId = $nSetId;
		}
		function set_nDicId($nDicId){
			$this->nDicId = $nDicId;
		}
		function set_dSecFechaRegistro($dSecFechaRegistro){
			$this->dSecFechaRegistro = $dSecFechaRegistro;
		}
		function set_cSecEstado($cSecEstado){
			$this->cSecEstado = $cSecEstado;
		}

		//Obtener Objeto SERVICIOS_CONTRIBUYENTE
		public function get_ObjServicios_contribuyente($CAMPO){
			$this->db->select('nAplId as ID,cAplNombre as Nombre,cAplEstado as Estado,dAplFechaRegistro as "Fecha Registro"');
			return $this->db->where('cAplEstado',1)->get('aplicacion')->result_array();
		}
		public function insServiciosContribuyente(){
			$data = array(
				// 'nSecId' => $this->nSecId,
				'nPerId' => $this->nPerId,
				'nSetId' => $this->nSetId,
				'nDicId' => $this->nDicId
				);
			$this->db->insert('servicios_contribuyente', $data);
			return $this->db->insert_id();
		}
		public function verificaRegistro(){
		$query = $this->db->query("select sc.nSecId from servicios_contribuyente sc
			inner join servicios_tipo st on st.nSetId = sc.nSetId
			inner join multitabla m on m.nMulId = st.nMulServicio
			inner join multitabla mt on mt.nMulId = st.nMulTipoServicio
		where sc.nSetId = '".$this->nSetId."' and nPerId = '".$this->nPerId."' and nDicId = '".$this->nDicId."'  and  sc.cSecEstado = 1");
		;	
		return $query->num_rows();
		}
	}
?>