<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Caja_pagos extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('caja/caja_pagos_model','objCajaPagos');
		$this->load->model('caja/concepto_model','objConcepto');
		$this->load->model('persona_model','objPersona');
		$this->load->helper('tables_helper');
	}
	public function index()
	{
		$data['main_content'] = 'caja/pagos/panel_view';
		$data['aplicacion'] = 'Caja';
		$data['objeto'] = 'Pagos';
		$data['concepto'] = $this->objConcepto->cboConcepto();
		$this->load->view('plantilla/template', $data);	

	}

	function listaPagos(){
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
		$tabla_data = $this->objCajaPagos->qryCajaPagos();
		$funciones = array(
			'initEvtOpcPopupId("edit","concepto/getTipoPago/","Editar Tipo de Pago",500,200,"func_close")',
			'initEvtDel("confirmarDeleteTipoPago")'
			);
		$nameTable = 'tabla-CajaPagos';
		$pk = 'ID';
		CrudGridMultipleJson($tabla_data,$nameTable,$pk,$opciones,$funciones);
	}


	function GetNombreContribuyente() {
		$this->objPersona->setPerNombres( $this->input->get("term") );
		$data = $this->objPersona->GetNombreContribuyente();
		$return_arr = array();
		if ($data) {
			foreach ($data as $row) {
				$arrayContribuyente['label'] = htmlspecialchars($row['DESCRIPCION']);
				$arrayContribuyente['id'] = $row['ID'];
				array_push($return_arr, $arrayContribuyente);
			}
		}
		print_r(json_encode($return_arr));
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

	function getConcepto($nConId) {
		// echo $nPerId;
		$fila = $this->objConcepto->getConcepto($nConId);
        // print_p($fila);
		if ($fila) {
			$filax["fila"] = $fila;
			$this->load->view('caja/concepto/upd_concepto_view', $filax);
		} else {
			echo "Error";
		}
	}

	function updConcepto() {
		$this->objConcepto->set_nConId($this->input->post('txt_upd_con_nConId'));
		$this->objConcepto->set_cConDescripcion($this->input->post('txt_upd_con_desc'));
		$this->objConcepto->set_fConCosto($this->input->post('txt_upd_con_costo'));
		$this->objConcepto->set_nMulIdTipoPago($this->input->post('cbo_upd_con_tipopago'));
		$result = $this->objConcepto->updConcepto();
		// print_p($_POST);exit();
		if ($result) {
			echo "1";
		} else {
			echo "0";
		}
	}

	function delTipoPago(){
		$this->objMultitabla->set_nMulId( $this->input->post('nMulId') );
		if ($this->objMultitabla->delMultitabla()) {	
			echo "1";
		}else{
			echo "0";
		}
	}

	function cboTipoPagoUpd() {
		$this->objMultitabla->set_nMulId( $this->input->post('txt_upd_con_nMulId') );
		$this->objMultitabla->set_nMulIdPadre( '1' );
		$result = $this->objMultitabla->cboTipoPagoUpd();
		echo $result;
	}
}
?>