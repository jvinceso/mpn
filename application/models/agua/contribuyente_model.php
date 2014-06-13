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

		function getContribuyente($nPerId){		
		$query = $this->db->query("
									select p.nPerId ,
									   pd1.cPdeValor as dni,
								       p.cPerNombres,
								       p.cPerApellidoPaterno,
								       p.cPerApellidoMaterno, 
								       pn.dPnaFechaNacimiento,
								       pd2.cPdeValor as estcivil,
								       pn.cPnaSexo, 
								       pd3.cPdeValor as telefono,
									   pd4.cPdeValor as celular,
									   pd5.cPdeValor as email
									from persona p 
									inner join persona_detalle pd1 on p.nPerId = pd1.nPerId
									inner join persona_natural pn  on p.nPerId = pn.nPerId
									inner join persona_detalle pd2 on p.nPerId = pd2.nPerId
									inner join persona_detalle pd3 on p.nPerId = pd3.nPerId
									inner join persona_detalle pd4 on p.nPerId = pd4.nPerId
									inner join persona_detalle pd5 on p.nPerId = pd5.nPerId
									where p.nPerId = '".$nPerId."' and pd1.nMulId = 16 and pd2.nMulId = 18 and pd3.nMulId = 43 and pd4.nMulId = 44 and pd5.nMulId = 45 and
									 p.cPerContribuyente='SI' and p.cPerEstado=1
			");
		if ($query->num_rows() > 0) {
			return $query->row_array();
		} else {
			return false;
		}
	}

	}
?>