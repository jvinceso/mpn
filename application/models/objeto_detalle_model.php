<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*Autogenered Developed by @divisoft*/
/* fecha : 30-03-2014 01:05:13 */
	class Objeto_detalle_model extends CI_Model {
		//Atributos de Clase
		private $nOdetId = '';
		private $nObjId = '';
		private $cOdetNombreArchivo = '';
		private $nOdetTipo = '';
		private $cOdetPlataforma = '';
		private $cOdetEstado = '';
		private $dOdetFechaRegistro = '';

		//Constructor de Clase
		function __construct(){
			parent::__construct();
			$this->set_nOdetTipo       = 1;
			$this->set_cOdetPlataforma = 1;
		}

		//FUNCIONES Set
		function set_nOdetId( $nOdetId ){
			$this->nOdetId = $nOdetId;
		}
		function set_nObjId( $nObjId ){
			$this->nObjId = $nObjId;
		}
		function set_cOdetNombreArchivo( $cOdetNombreArchivo ){
			$this->cOdetNombreArchivo = $cOdetNombreArchivo;
		}
		function set_nOdetTipo( $nOdetTipo ){
			$this->nOdetTipo = $nOdetTipo;
		}
		function set_cOdetPlataforma( $cOdetPlataforma ){
			$this->cOdetPlataforma = $cOdetPlataforma;
		}
		function set_cOdetEstado( $cOdetEstado ){
			$this->cOdetEstado = $cOdetEstado;
		}
		function set_dOdetFechaRegistro( $dOdetFechaRegistro ){
			$this->dOdetFechaRegistro = $dOdetFechaRegistro;
		}

		//FUNCIONES Get
		function get_nOdetId(){
			return $this->nOdetId;
		}
		function get_nObjId(){
			return $this->nObjId;
		}
		function get_cOdetNombreArchivo(){
			return $this->cOdetNombreArchivo;
		}
		function get_nOdetTipo(){
			return $this->nOdetTipo;
		}
		function get_cOdetPlataforma(){
			return $this->cOdetPlataforma;
		}
		function get_cOdetEstado(){
			return $this->cOdetEstado;
		}
		function get_dOdetFechaRegistro(){
			return $this->dOdetFechaRegistro;
		}
		function insObjetoDetalle(){
			// $this->getNumeroOrden();
			$data = array(
				'nObjId' => $this->nObjId,
				'cOdetNombreArchivo' => $this->cOdetNombreArchivo,
				'nOdetTipo' => $this->nOdetTipo,
				'cOdetPlataforma' => $this->cOdetPlataforma
			);
			$this->db->insert('objeto_detalle', $data);
			$this->nOdetId = $this->db->insert_id();
			return ($this->db->affected_rows() != 1) ? false : true;
		}
	}
?>