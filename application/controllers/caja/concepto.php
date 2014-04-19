<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Concepto extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('caja/concepto_model','objConcepto');
		$this->load->model('multitabla_model','objMultitabla');
		// $this->load->library('table');
	}
	public function index()
	{
		$data['main_content'] = 'caja/concepto/panel_view';
		$data['aplicacion'] = 'Caja';
		$data['objeto'] = 'Concepto de Pago';
		$this->load->view('plantilla/template', $data);			
	}

	function insTipoPago(){
		$this->objMultitabla->set_cMulDescripcion($this->input->post('txt_ins_tpago_nom'));
		$result = $this->objMultitabla->insTipoPago();
		// print_p( $this->objServiosTipo->insServiciosTipo($temp) );
		if ($result) {
			echo "1";
		} else {
			echo "0";
		}
	}

	function cboTipoPago(){
		$result = $this->objMultitabla->qryTipoPago();
        echo $result;
	}

	function insConcepto(){
		$this->objConcepto->set_cConDescripcion($this->input->post('txt_ins_con_desc'));
		$this->objConcepto->set_fConCosto($this->input->post('txt_ins_con_costo'));
		$this->objConcepto->set_nMulIdTipoPago($this->input->post('cbo_ins_con_tipopago'));
		$result = $this->objConcepto->insConcepto();
		// print_p( $this->objServiosTipo->insServiciosTipo($temp) );
		if ($result) {
			echo "1";
		} else {
			echo "0";
		}
	}
}
?>