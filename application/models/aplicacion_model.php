<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*Autogenered Developed by @divisoft*/
/* fecha : 30-03-2014 01:05:13 */
	class Aplicacion_model extends CI_Model {
		//Atributos de Clase
		private $nAplId = '';
		private $cAplNombre = '';
		private $nAplTipo = '';
		private $cAplIcono = '';
		private $nAplOrden = '';
		private $dAplFechaRegistro = '';
		private $cAplEstado = '';

		//Constructor de Clase
		function __construct(){
			parent::__construct();
		}

		//FUNCIONES Set
		function set_nAplId($nAplId){
			$this->nAplId = $nAplId;
		}
		function set_cAplNombre($cAplNombre){
			$this->cAplNombre = $cAplNombre;
		}
		function set_nAplTipo($nAplTipo){
			$this->nAplTipo = $nAplTipo;
		}
		function set_cAplIcono($cAplIcono){
			$this->cAplIcono = $cAplIcono;
		}
		function set_nAplOrden($nAplOrden){
			$this->nAplOrden = $nAplOrden;
		}
		function set_dAplFechaRegistro($dAplFechaRegistro){
			$this->dAplFechaRegistro = $dAplFechaRegistro;
		}
		function set_cAplEstado($cAplEstado){
			$this->cAplEstado = $cAplEstado;
		}

		//FUNCIONES Get
		function get_nAplId(){
			return $this->nAplId;
		}
		function get_cAplNombre(){
			return $this->cAplNombre;
		}
		function get_nAplTipo(){
			return $this->nAplTipo;
		}
		function get_cAplIcono(){
			return $this->cAplIcono;
		}
		function get_nAplOrden(){
			return $this->nAplOrden;
		}
		function get_dAplFechaRegistro(){
			return $this->dAplFechaRegistro;
		}
		function get_cAplEstado(){
			return $this->cAplEstado;
		}
		//Obtener Objeto APLICACION
		function get_ObjAplicacion($CAMPO){
			$query = $this->db->query("SELECT * FROM APLICACION WHERE CAMPO=?", array($CAMPO));
			if ($query->num_rows() > 0){
				$row = $query->row();
				//CREANDO EL OBJETO
			}
		}
	}
?>