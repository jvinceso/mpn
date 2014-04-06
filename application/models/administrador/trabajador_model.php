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



	// public function cboTipoEstadoCivil(){	
 //        $query = $this->db->query("select nMulId,cMulDescripcion from multitabla where nMulIdPadre = 18");
 //        if ($query) {
 //            $data   = $query->result_array();
 //            // print_p($data);exit();
 //            $combo  = creaCombo($data);
 //            $result = form_dropdown("cbo_ins_trab_estcivil", $combo,'', 'id="cbo_ins_trab_estcivil" class="chzn-select" style="width:160px"');
 //            return $result;
 //        } else {
 //            return false;
 //        }
	// }	
	public function cboTipoArea(){		
        $query = $this->db->query("select nMulId,cMulDescripcion from multitabla where nMulIdPadre = 28");
        if ($query) {
            $data   = $query->result_array();
            // print_p($data);exit();
            $combo  = creaCombo($data);
            $result = form_dropdown("cbo_ins_trab_area", $combo,'', 'id="cbo_ins_trab_area" class="chosen-select"');
            return $result;
        } else {
            return false;
        }
	}
	public function cboTipoCargo(){		
        $query = $this->db->query("select nMulId,cMulDescripcion from multitabla where nMulIdPadre = 37");
        if ($query) {
            $data   = $query->result_array();
            // print_p($data);exit();
            $combo  = creaCombo($data);
            $result = form_dropdown("cbo_ins_trab_cargo", $combo,'', 'id="cbo_ins_trab_cargo" class="chosen-select"');
            return $result;
        } else {
            return false;
        }
	}

	public function insTrabajador($objpn,$objpd){
// inserta a la persona
		$this->insPersona();
// inserta a la persona natural
		$objpn->set_nPerId( $this->getPerId() );
		$objpn->insPersonaNatural();
// inserta a la persona detalle
		$objpd->set_nPerId( $this->getPerId() );
		$objpd->instPersonaDetalle('trabajador');
// inserta al trabajador municipal
		$trabajador_municipal = array(
			'nPerId'      =>  $this->getPerId(),
			'nMulArea'    =>  $this->get_AreId(),
			'nMulCargo'   =>  $this->get_MulCargo()
			);
		$this->db->insert('Trabajador_Municipal', $trabajador_municipal);
        return $this->db->insert_id();
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