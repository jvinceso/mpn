<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*Autogenered Developed by @jvinceso*/
/* Date : 22-06-2013 01:02:43 */
class Objeto_model extends CI_Model {
	############################### PROPIEDADES/ATRIBUTOS ################################
	protected $nObjId = '';
	protected $nAplId = '';
	public  $cObjNombre = '';
	public  $bObjTipo = '';
	private $nObjIdPadre = '';
	public  $nObjOrden = '';
	public  $cObjEstado = '';
	public  $dObjFechaRegistro = '';
	//Constructor de Clase
	function __construct(){
		parent::__construct();
		$this->set_bObjTipo(1);
		$this->set_nObjIdPadre(0);
	}

	public function set_nObjId( $nObjId ){
		$this->nObjId = $nObjId;
	}
	public function set_nAplId( $nAplId ){
		$this->nAplId = $nAplId;
	}
	public function set_cObjNombre( $cObjNombre ){
		$this->cObjNombre = $cObjNombre;
	}
	public function set_bObjTipo( $bObjTipo ){
		$this->bObjTipo = $bObjTipo;
	}
	public function set_nObjIdPadre( $nObjIdPadre ){
		$this->nObjIdPadre = $nObjIdPadre;
	}
	public function set_nObjOrden( $nObjOrden ){
		$this->nObjOrden = $nObjOrden;
	}
	public function set_cObjEstado( $cObjEstado ){
		$this->cObjEstado = $cObjEstado;
	}
	public function set_dObjFechaRegistro( $dObjFechaRegistro ){
		$this->dObjFechaRegistro = $dObjFechaRegistro;
	}
	public function get_nObjId(){
		return $this->nObjId;
	}
	################################# MÉTODOS ##################################
	public function getObjeto(){
		$this->db->select('nObjId,cObjNombre,nObjOrden');
		return $this->db->where(array('cObjEstado'=>1,'nObjId'=>$this->get_nObjId() ))->get('objeto')->result_array()[0];
	}
	public function insObjeto(){
		//Consultamos el Ultimo Numero de Orden registrado
		$this->getNumeroOrden();
		$data = array(
			'nAplId'      => $this->nAplId,
			'cObjNombre'  => $this->cObjNombre,
			'nObjIdPadre' => $this->nObjIdPadre,
			'bObjTipo'    => $this->bObjTipo,
			'nObjOrden'   => $this->nObjOrden
		);
		$this->db->insert('objeto', $data);
		$this->nObjId = $this->db->insert_id();
		return ($this->db->affected_rows() != 1) ? false : true;
		// return $this->db->insert_id();		
	}
	public function getNumeroOrden(){
		//Contamos Los Objetos Registrados y sumamos +1
		$this->db->select('nObjOrden')->from('objeto')->where('nAplId', $this->nAplId )->limit(0, 1);
		$this->nObjOrden = $this->db->count_all_results() + 1;
	}
	public function updObjeto(){
		$data = array(
			'cObjNombre' => $this->cObjNombre,
			'nObjOrden' => $this->nObjOrden
		);
		$this->db->where( 'nObjId', $this->get_nObjId() );
		$this->db->update( 'objeto', $data );
		return ($this->db->affected_rows() != 1) ? false : true;
	}
	//LISTA DE MENU + OPCIONES
    public function listaMenuOpciones(){
    	$resultado = array();  
    	$ul="";
    	$active="";
    	$nAplIds="";
    	$opciones="";
    	$url = $this->session->userdata('url');
		$query = $this->db->query("SELECT nAplId,cAplNombre,cAplIcono FROM aplicacion ORDER BY nAplOrden");  
		foreach ($query->result() as $row){
    		$opt = $this->listaSubMenus($row->nAplId);
    		// $nAplIds.=$row->nAplId.',';
			if($opt != null){ 
				$active = "";
				$ul='class="ocultar"';
				$array = array();
				foreach ($opt->result() as $opcion){
					if($url){
					   if ($opcion->cOdetNombreArchivo == $url) {
                            $active = "class=\"active open\"";
                            $ul = 'style="display:block"';
                            $opciones = 'class="active"';
                        } else {
                            $opciones = '';
                        }	
					}  
					$array[] = array(
						"value" => $opcion->cObjNombre,
						"active" => $opciones,
						"url" => $opcion->cOdetNombreArchivo
					);
				}

				$resultado[] =  array(
					'menu' => $row->cAplNombre,
					'datos' => $array,
					"papa" => $row->nAplId,
					"icon" => $row->cAplIcono,
					'active' => $active,
					'ul' => $ul);
			}
		} 
        return $resultado;
    }

    //LISTA DE OPCIONES DEL MENU
    function listaSubMenus($nAplId){
    	$nUsuId = $this->session->userdata('nUsuId');
    	$query = $this->db->query("SELECT od.cOdetNombreArchivo, o.cObjNombre, o.nAplId FROM usuario_objeto uo
		INNER JOIN usuario u on u.nUsuId = uo.nUsuId
		INNER JOIN objeto o on o.nObjId = uo.nObjId
		INNER JOIN objeto_detalle od ON od.nObjId = o.nObjId
		WHERE o.nAplId = ? AND u.nUsuId = ? AND uo.cUobEstado = 1 AND o.cObjEstado = 1
    		ORDER BY o.nAplId,o.nObjOrden",array($nAplId,$nUsuId));

        if($query->num_rows() > 0){
        	return $query;
        }
        return null;
    }     
}
?>