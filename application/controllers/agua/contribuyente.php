<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contribuyente extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// $this->load->model('utilitarios/modulo_model','objModulo');
		// $this->load->library('table');
	}
	public function index()
	{
		$data['main_content'] = 'agua/contribuyente/panel_view';
		$data['aplicacion'] = 'Agua';
		$data['objeto'] = 'Contribuyentes';
		$this->load->view('plantilla/template', $data);			
	}
	function prueba(){
		echo json_encode(array(1));
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
?>