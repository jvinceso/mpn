<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Calle extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('agua/calle_model','objCalle');
		// $this->load->model('agua/via_model','objVia');
		// $this->load->library('table');
	}
	public function index()
	{
		$data['main_content'] = 'agua/calle/panel_view';
		$data['aplicacion'] = 'Agua';
		$data['objeto'] = 'Calles';
		$this->load->view('plantilla/template', $data);			
	}

	function cboTipoSector() {
        $result = $this->objCalle->cboTipoSector();
        echo $result;
    }

    function cboTipoVia() {
        $result = $this->objCalle->cboTipoVia();
        echo $result;
    }

	function insCalle(){
		$this->objCalle->set_cCalNombre( $this->input->post('txt_ins_cal_nom') );
		$this->objCalle->set_nSecId( $this->input->post('cbo_ins_cal_sector') );
		$this->objCalle->set_nViaId( $this->input->post('cbo_ins_cal_via') );
		$result = $this->objCalle->insCalle();
		if ($result) {
			echo "1";
		} else {
			echo "0";
		}
	}
}
?>