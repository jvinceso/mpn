<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Concepto extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('caja/concepto_model','objConcepto');
		$this->load->model('multitabla_model','objMultitabla');
		$this->load->helper('tables_helper');
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

	function listarTipoPago(){
		$opciones = array(
			'Editar' => array(
				'color'=>'blue'
				,'icono'=>'edit'
				,'tooltip'=>'info'
				),
			'Eliminar' => array(
				'color'=>'red'
				,'icono'=>'trash'
				,'tooltip'=>'danger'
				)
			);
		$this->objMultitabla->set_nMulIdPadre('1');
		$tabla_data = $this->objMultitabla->qrymultitabla();
		$funciones = array(
			'initEvtOpcPopupId("edit","contribuyente/getContribuyente/","Editar Contribuyente",920,400,"func_close")',
			'initEvtDel("confirmarDelete")'
			);
		$nameTable = 'tabla-TipoPago';
		$pk = 'ID';
		CrudGridMultipleJson($tabla_data,$nameTable,$pk,$opciones,$funciones);
	}

	function listarConcepto(){
		$opciones = array(
			'Editar' => array(
				'color'=>'blue'
				,'icono'=>'edit'
				,'tooltip'=>'info'
				),
			'Eliminar' => array(
				'color'=>'red'
				,'icono'=>'trash'
				,'tooltip'=>'danger'
				)
			);
		
		$tabla_data = $this->objConcepto->listarConcepto();
		$funciones = array(
			'initEvtOpcPopupId("edit","contribuyente/getContribuyente/","Editar Contribuyente",920,400,"func_close")',
			'initEvtDel("confirmarDelete")'
			);
		$nameTable = 'tabla-Concepto';
		$pk = 'ID';
		CrudGridMultipleJson($tabla_data,$nameTable,$pk,$opciones,$funciones);
	}
}
?>