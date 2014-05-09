<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Calle extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('agua/calle_model','objCalle');
		$this->load->model('agua/sector_model','objSector');
		$this->load->model('agua/via_model','objVia');
		$this->load->helper('tables_helper');
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

	function listarCalles(){
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
		$tabla_data = $this->objCalle->qryCalle();
		$funciones = array(
			'initEvtOpcPopupId("edit","calle/getCalle/","Editar Calle",800,300,"func_close")',
			'initEvtDel("confirmarDelete")'
			);
		$nameTable = 'tabla-Calle';
		$pk = 'ID';
		CrudGridMultipleJson($tabla_data,$nameTable,$pk,$opciones,$funciones);
	}

	function getCalle($nCalId) {
		// echo $nPerId;
		$fila = $this->objCalle->getCalle($nCalId);
        // print_p($fila);
		if ($fila) {
			$filax["fila"] = $fila;
			$this->load->view('agua/calle/upd_view', $filax);
		} else {
			echo "Error";
		}
	}

	function cboSectorUpd() {
		$this->objSector->set_nSecId( $this->input->post('txt_upd_cal_nSecId') );
		$result = $this->objSector->cboSectorUpd();
		echo $result;
	}
}
?>