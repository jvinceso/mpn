<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Permisos extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('administrador/permisos_model','objPermisos');
		$this->load->model('utilitarios/modulo_model','objModulo');
		$this->load->library('table');
	}

	public function index()
	{
		// $this->loaders->verificaAcceso();
		$this->load->helper('tables_helper');
		$data['main_content'] = 'administrador/permisos/panel_view';
		$data['titulo'] = 'Gestor de Permisos';
		$data['aplicacion'] = 'Administrador';
		$data['objeto'] = 'Permisos';
		// $data['tabla_data'] = $this->objPermisos->qryAplicaciones();
		// $tabla_data[] = array('Id','Nombre','Estado','Fecha Registro');
		// $data['tabla'] = $this->table->generate( array_reverse( $tabla_data ));
		$this->load->view('plantilla/template', $data);			
	}

	public function vistaGet($vista,$parametros = null) {
		$data = array();
		switch ($vista) {
			case 'upd_view':
				$this->objPermisos->set_codigo( $parametros );
				$data = $this->objPermisos->getAplicacion();
				// print_p($data);
				// exit();
				break;			
			default:
				break;
		}
		$this->load->view('utilitarios/modulo/' . $vista,$data);
	}		

	function loadDataGrid(){
		$this->load->helper('tables_helper');
		$opciones = array(
			// 'permisos' => array(
			// 	 'color'=>'green'
			// 	,'icono'=>'user'
			// 	,'tooltip'=>'success'
			// ),
			// 'clave' => array(
			// 	 'color'=>'red'
			// 	,'icono'=>'unlock'
			// 	,'tooltip'=>'success'
			// )
		);
		$tabla_data = $this->objPermisos->qryUsuarios();
		$funciones = array(
			// 'initEvPermisosJson()',
			// 'initEvtUpdJson("../utilitarios/modulo/updModulo/","Pagina de Pruebas",450,250,"dataLocal(fila)")',
			// 'initEvtUpd("../utilitarios/modulo/updModulo/","Pagina de Pruebas",450,250,"confirmarEdicion()")',
			// 'initEvtDel("confirmarDelete")'
			// ,'initE'
		);
		CrudGridMultipleJson($tabla_data,'idTablaPermisos','ID',$opciones,$funciones);		
	}
	function delAplicacion(){
		$this->objPermisos->set_codigo( $this->input->post('codex') );
		echo $this->objPermisos->delAplicacion( );

	}
	function updAplicacion(){
		$this->objPermisos->set_codigo( $this->input->post('txt_upd_mod_id') );
		$this->objPermisos->set_nombre( $this->input->post('txt_upd_mod_nombre') );
		$this->objPermisos->set_cAplIcono( $this->input->post('txt_upd_mod_icono') );
		echo $this->objPermisos->updAplicacion( );
	}

	function insAplicacion(){
		$this->objPermisos->set_nombre( $this->input->post('txt_ins_mod_nombre') );
		$this->objPermisos->set_cAplIcono( $this->input->post('txt_ins_mod_icono') );	
		$result = $this->objPermisos->insAplicacion();
		if ($result) {
			echo "1";
		} else {
			echo "0";
		}
	}
	function getpermisos(){
			$aplicacion = $this->objModulo->qryAplicaciones( );
			$tree_data = array();
			foreach ($aplicacion as $key => $fila) {
				$this->objModulo->set_codigo( $fila['ID'] );
				$objetos = $this->objModulo->getObjeto();
				if ( count($objetos)>=1 ) {
					$tree_data[$fila['ID']] = array('name'=>$fila['Nombre'],'type'=>'folder');
					$children = array();
					foreach ($objetos as $indice => $registro) {
						$children[ $registro['ID'] ] = array('name' => $registro['Opcion'], 'type'=>'item');
					}
					$tree_data[$fila['ID']]['additionalParameters'] = array( 'children' => $children );
				}else{
					$tree_data[$fila['ID']] = array('name'=>$fila['Nombre'],'type'=>'item','selectItem'=>'true');					
				}
			}
			// print_p( json_encode($tree_data,JSON_PRETTY_PRINT ));
			echo json_encode($tree_data);
			// print_p($this->objModulo->qryAplicaciones( ));
	}
}

/* End of file modulo.php */
/* Location: ./application/controllers/utilitarios/modulo.php */
?>