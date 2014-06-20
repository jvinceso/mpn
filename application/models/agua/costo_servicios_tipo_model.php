<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*Autogenered Developed by @divisoft*/
/* fecha : 30-03-2014 00:08:07 */
class Costo_servicios_tipo_model extends CI_Model {
		//Atributos de Clase
	private $nCstId = '';
	private $nSetId = '';
	private $fCstPago = '';
	private $nCstAnio = '';
	private $dCstFechaRegistro = '';
	private $cCsrEstado = '';

		//Constructor de Clase
	function __construct(){
		parent::__construct();
	}

		//FUNCIONES Set
	function set_nCstId($nCstId){
		$this->nCstId = $nCstId;
	}
	function set_nSetId($nSetId){
		$this->nSetId = $nSetId;
	}
	function set_fCstPago($fCstPago){
		$this->fCstPago = $fCstPago;
	}
	function set_nCstAnio($nCstAnio){
		$this->nCstAnio = $nCstAnio;
	}
	function set_dCstFechaRegistro($dCstFechaRegistro){
		$this->dCstFechaRegistro = $dCstFechaRegistro;
	}
	function set_cCsrEstado($cCsrEstado){
		$this->cCsrEstado = $cCsrEstado;
	}

		//FUNCIONES Get
	function get_nCstId(){
		return $this->nCstId;
	}
	function get_nSetId(){
		return $this->nSetId;
	}
	function get_fCstPago(){
		return $this->fCstPago;
	}
	function get_nCstAnio(){
		return $this->nCstAnio;
	}
	function get_dCstFechaRegistro(){
		return $this->dCstFechaRegistro;
	}
	function get_cCsrEstado(){
		return $this->cCsrEstado;
	}
		//Obtener Objeto COSTO_SERVICIOS_TIPO
	function get_ObjCosto_servicios_tipo($CAMPO){
		$query = $this->db->query("SELECT * FROM COSTO_SERVICIOS_TIPO WHERE CAMPO=?", array($CAMPO));
		if ($query->num_rows() > 0){
			$row = $query->row();
				//CREANDO EL OBJETO
		}
	}

	public function insCostoServiciosTipo(){
		$data = array(
			'nSetId' 	   => $this->get_nSetId(),
			'fCstPago'     => $this->get_fCstPago(),				
			'nCstAnio' 	   => $this->get_nCstAnio()
			);
		$this->db->insert('Costo_Servicios_Tipo', $data);
		return $this->db->insert_id();
	}

	public function getAniosFiscales( ){
		$tmp = null;
		$rs = $this->db->query('SELECT DISTINCT cst.nCstAnio as aid,cst.nCstAnio as descrip from costo_servicios_tipo cst
			inner join servicios_tipo st on st.nSetId = cst.nSetId 
			inner join multitabla m on m.nMulId = st.nMulServicio
			inner join multitabla mt on mt.nMulId = st.nMulTipoServicio
			where st.cSetEstado = 1 and cst.cCstEstado = 1  and st.cSetEstado = 1 
			and m.cMulEstado = 1 and mt.cMulEstado = 1 
			order by cst.nCstAnio desc');
		if ($rs->num_rows() > 0){
			$tmp = $rs->result_array();
		}
		return $tmp;
	}

	function VerificaCostoAnio(){		
		$query = $this->db->query("
			select * from costo_servicios_tipo where nSetId = '".$this->get_nSetId()."' and nCstAnio = '".$this->get_nCstAnio()."'									
			");
		if ($query->num_rows() > 0) {
			return $query->num_rows();
		} else {
			return false;
		}
	}

	public	function updServicioporTipo(){
		$data = array(
			'fCstPago'  =>  $this->get_fCstPago()
			);
		// $this->db->where('nSetId', $this->get_nSetId());
		 $this->db->where(
		 	array(
		 		'nSetId' => $this->get_nSetId(),
		 		'nCstAnio' => $this->get_nCstAnio()
		 ) );
		$this->db->update('costo_servicios_tipo', $data); 
		return true;
	}

	public function delServicioPorTipo(){
        $data = array(
            'cCstEstado' => 0
            );
		 $this->db->where(
		 	array(
		 		'nSetId' => $this->get_nSetId(),
		 		'nCstAnio' => $this->get_nCstAnio()
		 ) );
		$this->db->update('costo_servicios_tipo', $data); 
		return true;
    }
}
?>