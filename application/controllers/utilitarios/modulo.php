<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Modulo extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('utilitarios/modulo_model','objModulo');
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
				$dir_final[] = array($recurso=>$ficheros);
			}else{
				$dir_final[]= $recurso;
			}
		}
		/*
		$temp = array();
		foreach ($modulos as $key => $value) {
		    $temp[$value['nModId']]['key'] = $value['nModId'];
		    $temp[$value['nModId']]['title'] = $value['cModModulo'];
		    $menu = $this->ObjMenu->getMenuxModulo( $value['nModId'] );
		    $temp_menu = array();
		    $i=0;
		    foreach ($menu as $row) {
		        if( search_in_array($row['nMenId'],$menusAsignados,'nMenId') ){
		            $temp_menu[$i]['select'] = true;
		        }
		        $temp_menu[$i]['key'] = $row['nMenId'];
		        $temp_menu[$i]['title'] = $row['cMenMenu'];
		        $i++;
		    }
		    $temp[$value['nModId']]['isFolder'] = true;
		    $temp[$value['nModId']]['children'] = $temp_menu;
		}   
		$data['permisos'] = $temp;		
		*/
		// echo json_encode($dir_final,JSON_PRETTY_PRINT);
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
					'initEvtOpc("edit","saluda(fila)")'
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
					'Detalle' => array(
						 'color'=>'blue'
						,'icono'=>'zoom-in'
						,'tooltip'=>'info'
					),
					'Confirmar' => array(
						 'color'=>'orange'
						,'icono'=>'ok'
						,'tooltip'=>'info'
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
}

/* End of file modulo.php */
/* Location: ./application/controllers/utilitarios/modulo.php */
?>