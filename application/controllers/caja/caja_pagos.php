<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Caja_pagos extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('caja/caja_pagos_model','objCajaPagos');
		$this->load->model('caja/concepto_model','objConcepto');
		$this->load->model('agua/sector_model','objSector');
		$this->load->model('persona_model','objPersona');
		$this->load->helper('tables_helper');
	}
	public function index()
	{
		$data['main_content'] = 'caja/caja_pagos/panel_view';
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
			'initEvtOpcPopupId("edit","caja_pagos/getCajaPagos/","Editar Tipo de Pago",500,200,"func_close")',
			'initEvtDel("confirmarDeleteTipoPago")'
			);
		$nameTable = 'tabla-CajaPagos';
		$pk = 'ID';
		CrudGridMultipleJson($tabla_data,$nameTable,$pk,$opciones,$funciones);
	}

	function listaAgua(){
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
		$tabla_data = $this->objCajaPagos->qryCajaAgua();
		$funciones = array(
			'initEvtOpcPopupId("edit","concepto/getTipoPago/","Editar el Pago",500,200,"func_close")',
			'initEvtDel("confirmarDeleteTipoPago")'
			);
		$nameTable = 'tabla-Agua';
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

	function GetNombreSector() {
		$this->objSector->set_cSecNombre( $this->input->get("term") );
		$data = $this->objSector->GetNombreSector();
		$return_arr = array();
		if ($data) {
			foreach ($data as $row) {
				$arraySetor['label'] = htmlspecialchars($row['DESCRIPCION']);
				$arraySetor['id'] = $row['ID'];
				array_push($return_arr, $arraySetor);
			}
		}
		print_r(json_encode($return_arr));
	}

	function insCajaPagos(){
		$this->objCajaPagos->set_nTmuId($this->session->userdata('IdPersona'));
		$this->objCajaPagos->set_nConId($this->input->post('cbo_ins_pag_concepto'));
		$this->objCajaPagos->set_cCpaSerieNumero($this->input->post('txt_ins_pag_serie'));
		$this->objCajaPagos->set_nPerId($this->input->post('hid_fnd_ins_pag_nombre'));
		$this->objCajaPagos->set_fCpaMonto($this->input->post('txt_ins_pag_monto'));
		$this->objCajaPagos->set_cCpaMes($this->input->post('cbo_ins_pag_mes'));
		$this->objCajaPagos->set_fCpaHoras($this->input->post('txt_ins_pag_horas'));
		$this->objCajaPagos->set_cCpaSector($this->input->post('hid_fnd_ins_pag_sector'));
		$this->objCajaPagos->set_cCpaPlanilla($this->input->post('txt_ins_pag_planilla'));
		$this->objCajaPagos->set_cCpaFechaPlanilla($this->input->post('txt_ins_pag_fecha_planilla'));
		$this->objCajaPagos->set_cCpaSerie($this->input->post('txt_ins_pag_serie'));
		$result = $this->objCajaPagos->insCajaPagos();
		// print_p( $_POST );
		if ($result) {
			echo "1";
		} else {
			echo "0";
		}
	}

	function getCosto(){       
		$this->objConcepto->set_nConId($this->input->post('cbo_ins_pag_concepto'));
		$fila = $this->objConcepto->getCosto();
		if ($fila) {
			echo $fila["fConCosto"];
		} else {
			echo "0";
		}

	}

	function getCajaPagos($nCpaId) {
		$fila = $this->objCajaPagos->getCajaPagos($nCpaId);
        print_p($fila);
		if ($fila) {
			$filax["fila"] = $fila;
			$this->load->view('caja/caja_pagos/upd_caja_pagos_view', $filax);
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