<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*Autogenered Developed by @divisoft*/
/* fecha : 30-03-2014 00:08:07 */
	class Contribuyente_model extends CI_Model {
		//Atributos de Clase
		private $nConId = '';
		private $cConTipoTarifa = '';
		private $nPerId = '';
		private $cConEstado = '';
		private $dConFechaRegistro = '';

		//Constructor de Clase
		function __construct(){
			parent::__construct();
		}

		//FUNCIONES Set
		function set_nConId($nConId){
			$this->nConId = $nConId;
		}
		function set_cConTipoTarifa($cConTipoTarifa){
			$this->cConTipoTarifa = $cConTipoTarifa;
		}
		function set_nPerId($nPerId){
			$this->nPerId = $nPerId;
		}
		function set_cConEstado($cConEstado){
			$this->cConEstado = $cConEstado;
		}
		function set_dConFechaRegistro($dConFechaRegistro){
			$this->dConFechaRegistro = $dConFechaRegistro;
		}

		//FUNCIONES Get
		function get_nConId(){
			return $this->nConId;
		}
		function get_cConTipoTarifa(){
			return $this->cConTipoTarifa;
		}
		function get_nPerId(){
			return $this->nPerId;
		}
		function get_cConEstado(){
			return $this->cConEstado;
		}
		function get_dConFechaRegistro(){
			return $this->dConFechaRegistro;
		}
		//Obtener Objeto CONTRIBUYENTE
		function get_ObjContribuyente($CAMPO){
			$query = $this->db->query("SELECT * FROM CONTRIBUYENTE WHERE CAMPO=?", array($CAMPO));
			if ($query->num_rows() > 0){
				$row = $query->row();
				//CREANDO EL OBJETO
			}
		}
	}
?>