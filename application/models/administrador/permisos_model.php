<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Permisos_model extends CI_Model {
	private $nAplId;
	private $cAplNombre;
	private $cAplIcono;
	private $nAplOrden;

	public function set_codigo( $nAplId ){
		$this->nAplId = $nAplId;
	}
	public function set_nombre( $cAplNombre ){
		$this->cAplNombre = $cAplNombre;
	}
	public function set_cAplIcono( $cAplIcono ){
		$this->cAplIcono = $cAplIcono;
	}
	public function set_nAplOrden( $nAplOrden ){
		$this->nAplOrden = $nAplOrden;
	}
	public function get_codigo() {
		return $this->nAplId;
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



	public function qryUsuarios(){
		// $this->db->select('nAplId as ID,cAplNombre as Nombre,cAplEstado as Estado,dAplFechaRegistro as "Fecha Registro"');
		// return $this->db->where('cAplEstado',1)->get('aplicacion')->result_array();


        $query = $this->db->query("
                        select u.nUsuId as ID,pd.cPdeValor as DNI,p.cPerNombres as Nombres,p.cPerApellidoPaterno as ApellidoPaterno,p.cPerApellidoMaterno as ApellidoMaterno from usuario u inner join
						persona p on u.nPerId = p.nPerId inner join
						persona_detalle pd on p.nPerId = pd.nPdeId
						where pd.nMulId = 16 and u.cUsuEstado = '1' and p.cPerEstado = '1'  
                    ");
        if ($query) {
            return $query->result_array();
        } else {
            return null;
        }

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

	public function getAplicacion(){
		$this->db->select('nAplId ,cAplNombre ,cAplEstado ,dAplFechaRegistro,cAplIcono');
		return $this->db->where(array('cAplEstado'=>1,'nAplId'=>$this->get_codigo() ))->get('aplicacion')->result_array()[0];
	}
}

/* End of file modulo_model.php */
/* Location: ./application/models/utilitarios/modulo_model.php */
?>