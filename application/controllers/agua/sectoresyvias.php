<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sectoresyvias extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('agua/sector_model','objSector');
		$this->load->model('agua/via_model','objVia');
		$this->load->helper('tables_helper');
	}
	public function index()
	{
		$data['main_content'] = 'agua/sectoresyvias/panel_view';
		$data['aplicacion'] = 'Agua';
		$data['objeto'] = 'Sectores y Vías';
		$this->load->view('plantilla/template', $data);			
	}
	function prueba(){
		echo json_encode(array(1));
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

	function listarSectores(){
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
		$tabla_data = $this->objSector->qrySector();
		$funciones = array(
			'initEvtOpcPopupId("edit","contribuyente/getContribuyente/","Editar Contribuyente",920,400,"func_close")',
			'initEvtDel("confirmarDelete")'
			);
		$nameTable = 'tabla-Sector';
		$pk = 'ID';
		CrudGridMultipleJson($tabla_data,$nameTable,$pk,$opciones,$funciones);
	}

	function listarVias(){
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
		$tabla_data = $this->objVia->qryVias();
		$funciones = array(
			'initEvtOpcPopupId("edit","contribuyente/getContribuyente/","Editar Contribuyente",920,400,"func_close")',
			'initEvtDel("confirmarDelete")'
			);
		$nameTable = 'tabla-Vias';
		$pk = 'ID';
		CrudGridMultipleJson($tabla_data,$nameTable,$pk,$opciones,$funciones);
	}
}
?>