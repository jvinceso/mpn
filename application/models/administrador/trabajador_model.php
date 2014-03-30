<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
// print_p(FCPATH);
require_once('application/models/persona_model.php');
class Trabajador_model extends Persona_model {
	private $TmuId;
	private $AreId;
	private $MulCargo;	

	function __construct() {
        parent::__construct();
    }

	public function set_TmuId( $TmuId ){
		$this->TmuId = $TmuId;
	}

	public function set_AreId( $AreId ){
		$this->AreId = $AreId;
	}
	public function set_MulCargo( $MulCargo ){
		$this->MulCargo = $MulCargo;
	}	
	public function get_TmuId() {
		return $this->TmuId;
	}
	public function get_AreId() {
		return $this->AreId;
	}  
	public function get_MulCargo() {
		return $this->MulCargo;
	}

	public function insAplicacion(){
		$data = array(
			'cAplNombre' => $this->get_nombre(),
			'nAplTipo'  =>  '1',
			'cAplIcono' =>  $this->get_cAplIcono(),
			'nAplOrden' =>  $this->getUltimoNroOrden()
			);
		$this->db->insert('aplicacion', $data);
		return $this->db->insert_id();
	}
	public function updAplicacion(){
		$data = array(
			'cAplNombre' => $this->get_nombre(),
			'cAplIcono' => $this->get_cAplIcono()
		);
		$this->db->where( 'nAplId', $this->get_codigo() );
		$this->db->update( 'aplicacion', $data );
		return true;
	}
	public function delAplicacion(){
		$data = array(
			'cAplEstado' => 0
		);
		$this->db->where( 'nAplId', $this->get_codigo() );
		$this->db->update( 'aplicacion', $data );
		return true;
	}

	public function getUltimoNroOrden(){
		return $this->db->count_all_results('aplicacion');
	}
	public function qryAplicaciones(){
		$this->db->select('nAplId as ID,cAplNombre as Nombre,cAplEstado as Estado,dAplFechaRegistro as "Fecha Registro"');
		return $this->db->where('cAplEstado',1)->get('aplicacion')->result_array();
	}
	public function getObjeto(){
		$this->db->select('nObjId AS ID,cObjNombre as "Opcion", nObjOrden as "Orden"');
		return $this->db->where(array('nAplId'=>$this->get_codigo(), 'cObjEstado'=>1))->get('objeto')->result_array();		
	}
	public function getAplicacion(){
		$this->db->select('nAplId ,cAplNombre ,cAplEstado ,dAplFechaRegistro,cAplIcono');
		return $this->db->where(array('cAplEstado'=>1,'nAplId'=>$this->get_codigo() ))->get('aplicacion')->result_array()[0];
	}
}

/* End of file modulo_model.php */
/* Location: ./application/models/utilitarios/modulo_model.php */
?>