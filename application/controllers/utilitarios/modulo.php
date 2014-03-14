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
		$data['tabla_data'] = $this->objModulo->qryAplicaciones();
		// $tabla_data[] = array('Id','Nombre','Estado','Fecha Registro');
		// $data['tabla'] = $this->table->generate( array_reverse( $tabla_data ));
		$this->load->view('plantilla/template', $data);			
	}
	function loadDataGrid(){
		$this->load->helper('tables_helper');
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
			// 'initEvtUpdJson("../utilitarios/modulo/updModulo/","Pagina de Pruebas",450,250,"dataLocal(fila)")',
			// 'initEvtUpd("../utilitarios/modulo/updModulo/","Pagina de Pruebas",450,250,"confirmarEdicion()")',
			'initEvtDel("confirmarDelete")'
			// ,'initE'
		);
		CrudGridMultipleJson($tabla_data,'idTabla','ID',$opciones,$funciones);		
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