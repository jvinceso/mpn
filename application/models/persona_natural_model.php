<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*Autogenered Developed by @divisoft*/
/* fecha : 30-03-2014 00:08:07 */
// require_once('application/models/persona_model.php');
	class Persona_natural_model extends CI_Model {
		//Atributos de Clase
		private $nPerId = '';
		private $cPnaSexo = '';
		private $dPnaFechaNacimiento = '';		

		//Constructor de Clase
		function __construct(){
			parent::__construct();
		}

		//FUNCIONES Set
		function set_nPerId($nPerId){
			$this->nPerId = $nPerId;
		}
		function set_cPnaSexo($cPnaSexo){
			$this->cPnaSexo = $cPnaSexo;
		}
		function set_dPnaFechaNacimiento($dPnaFechaNacimiento){
			$this->dPnaFechaNacimiento = $dPnaFechaNacimiento;
		}
		
		//FUNCIONES Get
		function get_nPerId(){
			return $this->nPerId;
		}
		function get_cPnaSexo(){
			return $this->cPnaSexo;
		}
		function get_dPnaFechaNacimiento(){
			return $this->dPnaFechaNacimiento;
		}

		
		//Obtener Objeto PERSONA_NATURAL
		function get_ObjPersona_natural($CAMPO){
			$query = $this->db->query("SELECT * FROM PERSONA_NATURAL WHERE CAMPO=?", array($CAMPO));
			if ($query->num_rows() > 0){
				$row = $query->row();
				//CREANDO EL OBJETO
			}
		}

		function insPersonaNatural(){
				$persona_natural = array(
					'nPerId'               =>  $this->get_nPerId(),
					'cPnaSexo'             =>  $this->get_cPnaSexo(),
					'dPnaFechaNacimiento'  =>  $this->get_dPnaFechaNacimiento()
					);
				$this->db->insert('persona_natural', $persona_natural);
				// return $this->db->insert_id();
		}
	}
?>