<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Modulo extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('utilitarios/modulo_model','objModulo');
		$this->load->model('objeto_model','objObjeto');
		$this->load->model('objeto_detalle_model','objObjetoDetalle');
		$this->load->library('table');
	}
	public function pruebas(){
		
		$data = array(
			array('name', 'Color', 'Size'),
			array('Fred', 'Blue', 'Small'),
			array('Mary', 'Red', 'Large'),
			array('John', 'Green', 'Medium')
		);
		
		echo $this->table->generate($data);
	}
	public function vistaGet($vista,$parametros = null) {
		$data = array();
		switch ($vista) {
			case 'upd_view':
				$this->objModulo->set_codigo( $parametros );
				$data = $this->objModulo->getAplicacion();
			break;
			case 'upd_obj_view':
				$this->objObjeto->set_nObjId( $parametros );
				$data = $this->objObjeto->getObjeto();
				// print_p($data);
				// exit();
			break;
			default:
				break;
		}
		$this->load->view('utilitarios/modulo/' . $vista,$data);
	}		
	public function index()
	{
		// $this->loaders->verificaAcceso();
		$this->load->helper('tables_helper');
		$data['main_content'] = 'utilitarios/modulo/panel_view';
		$data['titulo'] = 'Gestor Modulos';
		$data['aplicacion'] = 'Utilitarios';
		$data['objeto'] = 'Configurar Módulos';
		// $data['tabla_data'] = $this->objModulo->qryAplicaciones();
		// $tabla_data[] = array('Id','Nombre','Estado','Fecha Registro');
		// $data['tabla'] = $this->table->generate( array_reverse( $tabla_data ));
		$this->load->view('plantilla/template', $data);			
	}
	public function qryControladores(){
		$controladores = FCPATH.'\application\controllers';
		$directorio = array_diff(scandir( $controladores,0 ), array('..', '.'));
		$dir_final = array();
		foreach ( $directorio as $indice => $recurso ){
			if( is_dir($controladores.DIRECTORY_SEPARATOR.$recurso) ){
				$path_modulos = $controladores.DIRECTORY_SEPARATOR.$recurso;
				$ficheros = array_diff(scandir( $path_modulos ), array('..', '.'));
				$dir_final[$recurso] = $ficheros;
			}else{
				$dir_final[]= $recurso;
			}
		}
		array_multisort($dir_final, SORT_DESC );
		$data['controladores'] = $dir_final;
		$this->load->view('utilitarios/modulo/qry_controladores_view', $data);
	}

	function loadDataGrid($opcion=NULL){
		$this->load->helper('tables_helper');
		$opcion = (is_null($opcion)) ? $this->input->post('x') : $opcion;
		switch ($opcion) {
			case 'objetos':
				/*Listar Hijos de la Aplicación*/
				$opciones = array(
					'Editar' => array(
						 'color'=>'green'
						,'icono'=>'edit'
						,'tooltip'=>'success'
					),
					'Confirmar' => array(
						 'color'=>'orange'
						,'icono'=>'ok'
						,'tooltip'=>'info'
					)
				);
				$funciones = array(
					'initEvtOpc("edit","editarObjeto(fila)")'
				);	
				$nameTable = 'tblObjeto';
				$pk = 'ID';
				$this->objModulo->set_codigo( $this->input->post('cod') );
				$tabla_data = $this->objModulo->getObjeto();
			break;			
			default:
				$opciones = array(
					'Editar' => array(
						 'color'=>'green'
						,'icono'=>'pencil'
						,'tooltip'=>'success'
					),
					'Eliminar' => array(
						 'color'=>'red'
						,'icono'=>'trash'
						,'tooltip'=>'success'
					),
					'Configuracion' => array(
						 'color'=>'blue'
						,'icono'=>'cogs'
						,'tooltip'=>'info'
					)
				);
				$tabla_data = $this->objModulo->qryAplicaciones();
				$funciones = array(
					'initEvtUpdJson("../utilitarios/modulo/vistaGet/upd_view/","Pagina de Pruebas",450,250,"listarModulo()")',
					'initEvtOpc("cogs","asignarObjetos(fila)")',
					'initEvtDel("confirmarDelete")'
				);
				$nameTable = 'idTabla';
				$pk = 'ID';
				break;
		}
		CrudGridMultipleJson($tabla_data,$nameTable,$pk,$opciones,$funciones);		
	}
	function delAplicacion(){
		$this->objModulo->set_codigo( $this->input->post('codex') );
		echo $this->objModulo->delAplicacion( );

	}
	function updAplicacion(){
		$this->objModulo->set_codigo( $this->input->post('txt_upd_mod_id') );
		$this->objModulo->set_nombre( $this->input->post('txt_upd_mod_nombre') );
		$this->objModulo->set_cAplIcono( $this->input->post('txt_upd_mod_icono') );
		echo $this->objModulo->updAplicacion( );
	}
	function updObjeto(){
		$this->objObjeto->set_nObjId( $this->input->post('txt_upd_obj_id') );
		$this->objObjeto->set_cObjNombre( $this->input->post('txt_upd_obj_nombre') );
		$this->objObjeto->set_nObjOrden( $this->input->post('txt_upd_obj_order') );
		echo $this->objObjeto->updObjeto( );
	}

	function insAplicacion(){
		$this->objModulo->set_nombre( $this->input->post('txt_ins_mod_nombre') );
		$this->objModulo->set_cAplIcono( $this->input->post('txt_ins_mod_icono') );	
		$result = $this->objModulo->insAplicacion();
		if ($result) {
			echo "1";
		} else {
			echo "0";
		}
	}

	function insObjeto(){
		$this->input->post('txt_ins_obj_nombre');
		$this->objObjeto->set_nAplId( $this->input->post('txt_ins_apli_codigo') );
		$this->objObjeto->set_cObjNombre( $this->input->post('txt_ins_obj_nombre') );
		if ( $this->objObjeto->insObjeto() ) {
			/*Objeto Detalle*/
			$this->objObjetoDetalle->set_nObjId( $this->objObjeto->get_nObjId() );
			$this->objObjetoDetalle->set_cOdetNombreArchivo( $this->input->post('txt_ins_obj_file') );			
			$response = ( $this->objObjetoDetalle->insObjetoDetalle() ) ? 'succes_all' : 'err002';
		}else{
			$response = 'errObt';
		}
		echo $response;
	}
	function pruebaMetodo(){
		$this->objObjeto->getNumeroOrden();
		// echo 
	}
}

/* End of file modulo.php */
/* Location: ./application/controllers/utilitarios/modulo.php */
?>