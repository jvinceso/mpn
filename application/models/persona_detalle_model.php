<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*Autogenered Developed by @divisoft*/
/* fecha : 30-03-2014 00:08:07 */
	class Persona_detalle_model extends CI_Model {
		//Atributos de Clase
		private $nPdeId = '';
		private $nPerId = '';
		private $nMulId = '';
		private $cPdeValor = '';
		private $dPedFechaRegistro = '';
		private $cPedEstado = '';

		//Constructor de Clase
		function __construct(){
			parent::__construct();
		}

		//FUNCIONES Set
		function set_nPdeId($nPdeId){
			$this->nPdeId = $nPdeId;
		}
		function set_nPerId($nPerId){
			$this->nPerId = $nPerId;
		}
		function set_nMulId($nMulId){
			$this->nMulId = $nMulId;
		}
		function set_cPdeValor($cPdeValor){
			$this->cPdeValor = $cPdeValor;
		}


		//FUNCIONES Get
		function get_nPdeId(){
			return $this->nPdeId;
		}
		function get_nPerId(){
			return $this->nPerId;
		}
		function get_nMulId(){
			return $this->nMulId;
		}
		function get_cPdeValor(){
			return $this->cPdeValor;
		}
		//Obtener Objeto PERSONA_DETALLE
		function get_ObjPersona_detalle($CAMPO){
			$query = $this->db->query("SELECT * FROM PERSONA_DETALLE WHERE CAMPO=?", array($CAMPO));
			if ($query->num_rows() > 0){
				$row = $query->row();
				//CREANDO EL OBJETO
			}
		}

		function instPersonaDetalle(){
		 $persona_detalle = array(
                '0' => array(
                    'nPerId'    => $this->getPerId(),
                    'nMulId'    => 16,
                    'cPdeValor' => $this->getPerDNI()
                ),
                '1' => array(
                    'nPerId'    => $this->getPerId(),
                    'nMulId'    => 18,
                    'cPdeValor' => $this->getPerEstadoCivil()
                ),   
                '2' => array(
                    'nPerId'    => $this->getPerId(),
                    'nMulId'    => 43,
                    'cPdeValor' => $this->getPerTelefono()
                ),
                '3' => array(
                    'nPerId'    => $this->getPerId(),
                    'nMulId'    => 44,
                    'cPdeValor' => $this->getPerCelular()
                ),
                '4' => array(
                    'nPerId'    => $this->getPerId(),
                    'nMulId'    => 45,
                    'cPdeValor' => $this->getPerEmail()
                ),             
                '5' => array(
                    'nPerId'    => $this->getPerId(),
                    'nMulId'    => 46,
                    'cPdeValor' => $this->getPerDireccion()
                )
        );
        for ($y = 0; $y < count($persona_detalle); $y++) {
            $this->db->insert('persona_detalle', $persona_detalle[$y]);
        }
        
        return $this->db->insert_id();
		}
	}
?>