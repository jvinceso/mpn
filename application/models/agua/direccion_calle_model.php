<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*Autogenered Developed by @divisoft*/
/* fecha : 12-04-2014 22:29:05 */
class Direccion_calle_model extends CI_Model {
		//Atributos de Clase
	private $nDicId = '';
	private $nPdeId = '';
	private $nCalId = '';

		//Constructor de Clase
	function __construct(){
		parent::__construct();
	}

		//FUNCIONES Set
	function set_nDicId( $nDicId ){
		$this->nDicId = $nDicId;
	}
	function set_nPdeId( $nPdeId ){
		$this->nPdeId = $nPdeId;
	}
	function set_nCalId( $nCalId ){
		$this->nCalId = $nCalId;
	}
	public function get_nDicId(){
		return $this->nDicId;
	}
		//Obtener Objeto DIRECCION_CALLE
	function get_ObjDireccion_calle($CAMPO){
		$query = $this->db->query("SELECT * FROM DIRECCION_CALLE WHERE CAMPO=?", array($CAMPO));
		if ($query->num_rows() > 0){
			$row = $query->row();
				//CREANDO EL OBJETO
		}
	}
	public function insDireccionCalle(){
		$this->db->trans_start();
		$data = array(
			'nPdeId' => $this->nPdeId ,
			'nCalId' => $this->nCalId
			);
		// print_p($data);
		// exit();
		$this->db->insert('direccion_calle', $data);
		$this->nDicId = $this->db->insert_id();
		$this->db->trans_complete();		
		if( $this->db->trans_status() !== FALSE )
		{
			return true;
		}else{
			return false;
		}
	}
	public function obtenernDicIdxnPdeId(){
		// select nDicId from direccion_calle where nPdeId = 1
		// echo "sdfsd";
		// print_p($this->nPdeId );
		// exit();
		$this->db->select('nDicId');
		$fila =  $this->db->where( 'nPdeId', $this->nPdeId )->get('direccion_calle')->row_array();
		// print_p($fila);exit();
		if ( !empty( $fila ) ) {
			$this->nDicId = $fila['nDicId'];
		}else{
			$this->nDicId = 0;						
		}
		// print_p( $this->nDicId );
		// exit();
		return $this->nDicId;
	}
}
?>