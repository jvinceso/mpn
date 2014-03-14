<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contribuyente_model extends CI_Model {
	private $cAplNombre;
	private $cAplIcono;
	private $nAplOrden;

	public function set_nombre( $cAplNombre ){
		$this->cAplNombre = $cAplNombre;
	}
	public function set_cAplIcono( $cAplIcono ){
		$this->cAplIcono = $cAplIcono;
	}
	public function set_nAplOrden( $nAplOrden ){
		$this->nAplOrden = $nAplOrden;
	}
	public function get_nombre() {
		return $this->cAplNombre;
	}  
	public function get_cAplIcono() {
		return $this->cAplIcono;
	}   
	public function get_nAplOrden() {
		return $this->nAplOrden;
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

	public function getUltimoNroOrden(){
		return $this->db->count_all_results('aplicacion');
	}
	public function qryAplicaciones(){
		$this->db->select('nAplId as ID,cAplNombre as Nombre,cAplEstado as Estado,dAplFechaRegistro as "Fecha Registro"');
		return $this->db->where('cAplEstado',1)->get('aplicacion')->result_array();
	}
}

/* End of file modulo_model.php */
/* Location: ./application/models/utilitarios/modulo_model.php */
?>