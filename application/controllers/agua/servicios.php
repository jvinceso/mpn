<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Servicios extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// $this->load->model('agua/sector_model','objSector');
		// $this->load->model('agua/via_model','objVia');
		// $this->load->library('table');
	}
	public function index()
	{
		$data['main_content'] = 'agua/servicios/panel_view';
		$data['aplicacion'] = 'Agua';
		$data['objeto'] = 'Servicios';
		$this->load->view('plantilla/template', $data);			
	}

	function insSector(){
		$this->objSector->set_cSecNombre( $this->input->post('txt_ins_sec_nom') );
		$result = $this->objSector->insSector();
		if ($result) {
			echo "1";
		} else {
			echo "0";
		}
	}
	function insVia(){
		$this->objVia->set_cViaNombre( $this->input->post('txt_ins_via_nom') );
		$result = $this->objVia->insVia();
		if ($result) {
			echo "1";
		} else {
			echo "0";
		}
	}
}
?>