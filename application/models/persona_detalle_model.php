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

	public function cboTipoEstadoCivil(){	
        $query = $this->db->query("select nMulId,cMulDescripcion from multitabla where nMulIdPadre = 18");
        if ($query) {
            $data   = $query->result_array();
            // print_p($data);exit();
            $combo  = creaCombo($data);
            $result = form_dropdown("cbo_ins_per_estcivil", $combo,'', 'id="cbo_ins_per_estcivil" class="chzn-select" style="width:160px"');
            return $result;
        } else {
            return false;
        }
	}

	public	function instPersonaDetalle($parametros){
		switch ($parametros) {
			case 'trabajador':
				  $objPersonadetalle = array(
					   array(
					      'nPerId' => $this->nPerId ,
					      'nMulId' => '16' ,
					      'cPdeValor' => $this->cPdeValor['dni']
					   ),
					   array(
					      'nPerId' => $this->nPerId ,
					      'nMulId' => '45' ,
					      'cPdeValor' => $this->cPdeValor['email']
					   ),
					   array(
					      'nPerId' => $this->nPerId ,
					      'nMulId' => '46' ,
					      'cPdeValor' => $this->cPdeValor['direccion']
					   ),
					   array(
					      'nPerId' => $this->nPerId ,
					      'nMulId' => '43' ,
					      'cPdeValor' => $this->cPdeValor['telefono']
					   ),
					   array(
					      'nPerId' => $this->nPerId ,
					      'nMulId' => '44' ,
					      'cPdeValor' => $this->cPdeValor['celular']
					   ),
					   array(
					      'nPerId' => $this->nPerId ,
					      'nMulId' => '18' ,
					      'cPdeValor' => $this->cPdeValor['estadocivil']
					   )
					);			
				break;
			
			case 'contribuyente':
				  $objPersonadetalle = array(
					   array(
					      'nPerId' => $this->nPerId ,
					      'nMulId' => '16' ,
					      'cPdeValor' => $this->cPdeValor['dni']
					   ),
					   array(
					      'nPerId' => $this->nPerId ,
					      'nMulId' => '45' ,
					      'cPdeValor' => $this->cPdeValor['email']
					   ),
					   array(
					      'nPerId' => $this->nPerId ,
					      'nMulId' => '43' ,
					      'cPdeValor' => $this->cPdeValor['telefono']
					   ),
					   array(
					      'nPerId' => $this->nPerId ,
					      'nMulId' => '44' ,
					      'cPdeValor' => $this->cPdeValor['celular']
					   ),
					   array(
					      'nPerId' => $this->nPerId ,
					      'nMulId' => '18' ,
					      'cPdeValor' => $this->cPdeValor['estadocivil']
					   )
					);
			
				break;
		}
		$this->db->insert_batch('persona_detalle', $objPersonadetalle); 
	}
	public function listaDetalle(  ){
		// select * from persona_detalle where nMulId = 46 and nPerId = 5
		// nPdeId,nMulId,cPdeValor,cPedEstado
		$this->db->select('nPdeId as ID, cPdeValor as Direccion');
		return $this->db->where(array( 'nPerId' => $this->nPerId, 'cPedEstado'=>1, 'nMulId'=>$this->nMulId ))->get('persona_detalle')->result_array();			
	}
	public function setPersonaDetalle(){
		$detalle = array(
			'nPerId' => $this->nPerId ,
			'nMulId' => $this->nMulId ,
			'cPdeValor' => $this->cPdeValor
			);
		$this->db->insert('persona_detalle', $detalle);
		if($this->db->affected_rows() > 0)
		{
			$this->nPdeId = $this->db->insert_id();
			return true;
		}else{
			return false;
		}
	}	
}	
?>