<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Costo_servicios_tipo extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('agua/Costo_servicios_tipo_model','objCostoServiosTipo');
		$this->load->model('multitabla_model','objMultitabla');
		$this->load->helper('tables_helper');
	}
	public function index()
	{
		// $data['main_content'] = 'agua/servicios/panel_view';
		// $data['aplicacion'] = 'Agua';
		// $data['objeto'] = 'Servicios';
		// $this->load->view('plantilla/template', $data);			
	}

	// function loadDataServicios(){
	// 	$opciones = array(
	// 		'Costo' => array(
	// 			 'color'=>'red'
	// 			,'icono'=>'money'
	// 			,'tooltip'=>'success'
	// 		)
	// 	);
	// 	$tabla_data = $this->objServiosTipo->qryServiciosTipo();
	// 	$funciones = array(
	// 		// "circle-plus","servicios/agregarCosto/","Agregar etiquetas a noticias",480,420,"func_close"
	// 		'initEvtOpcPopupId("money","servicios/getViewCosto/","Agregar Costo por Año",480,200,"func_close")',
	// 		// 'initEvtOpcPopupId("cogs","asignarCosto(fila)")',
	// 	);
	// 	$nameTable = 'tabla-servicios';
	// 	$pk = 'ID';
	// 	CrudGridMultipleJson($tabla_data,$nameTable,$pk,$opciones,$funciones);		

	// }

	function insCostoServiciosTipo(){
		$anio = date("Y");
		$this->objCostoServiosTipo->set_nSetId($this->input->post('txt_ins_setid'));
		$this->objCostoServiosTipo->set_fCstPago($this->input->post('txt_ins_cst_costo'));
		$this->objCostoServiosTipo->set_nCstAnio($anio);
		$result = $this->objCostoServiosTipo->insCostoServiciosTipo();
		// print_p( $this->objServiosTipo->insServiciosTipo($temp) );
		if ($result) {
			echo "1";
		} else {
			echo "0";
		}
	}

	function listarTipoServicios(){
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
		$this->objMultitabla->set_nMulIdPadre('47');
		$tabla_data = $this->objMultitabla->qrymultitabla();
		$funciones = array(
			'initEvtOpcPopupId("edit","contribuyente/getContribuyente/","Editar Contribuyente",920,400,"func_close")',
			'initEvtDel("confirmarDelete")'
			);
		$nameTable = 'tabla-TipoServicios';
		$pk = 'ID';
		CrudGridMultipleJson($tabla_data,$nameTable,$pk,$opciones,$funciones);
	}

	function VerificaCostoAnio(){
		$anio = date("Y");
		$this->objCostoServiosTipo->set_nSetId($this->input->post('nSetId'));
		$this->objCostoServiosTipo->set_nCstAnio($anio);
		$costo = $this->objCostoServiosTipo->VerificaCostoAnio();
            if ($costo > 0)
                echo "false";
            else
                echo "true";
	}

}
?>