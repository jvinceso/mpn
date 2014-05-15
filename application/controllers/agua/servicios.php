<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Servicios extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('agua/servicios_tipo_model','objServiosTipo');
		$this->load->model('agua/Costo_servicios_tipo_model','objCostoServiosTipo');
		$this->load->model('multitabla_model','objMultitabla');
		// $this->load->model('agua/via_model','objVia');
		$this->load->helper('tables_helper');
	}
	public function index()
	{
		$data['main_content'] = 'agua/servicios/panel_view';
		$data['aplicacion'] = 'Agua';
		$data['objeto'] = 'Servicios';
		$this->load->view('plantilla/template', $data);			
	}

	function qryServicioTipo(){
			$tipos_servicio = $this->objServiosTipo->qryServicioTipo( );
			foreach ($tipos_servicio as $key => $fila) {
					$tipos_servicio_data[] = $fila['cMulDescripcion'];
					// $tipos_servicio_data[] = array('id'=>$fila['nMulId'],'name'=>$fila['cMulDescripcion']);
			}
			echo json_encode($tipos_servicio_data);
	}

	function insServicio(){
		$array = $this->input->post('json');
		// $nServId = $array['txt_ins_serv_nom'];
		$temp = array();
		$this->objMultitabla->set_cMulDescripcion($array['txt_ins_serv_nom']);
		$servicio = $this->objMultitabla->insServicio();
		foreach ($array['tipos_servicios'] as $indice => $filita) {
			// $temp[]['nMulId'] = $THIS->OBTENERiDDESDEBD
			$this->objMultitabla->set_cMulDescripcion( $filita['nombre'] );
			$this->objMultitabla->getServicioId();
			$temp[$indice]['nMulTipoServicio'] = $this->objMultitabla->get_nMulId();
			$temp[$indice]['nMulServicio'] = $servicio;
		}
		$result = $this->objServiosTipo->insServiciosTipo($temp);
		// print_r( $temp ); exit();
// Array
// (
//     [0] => Array
//         (
//             [nMulTipoServicio] => 48
//             [nMulServicio] => 68
//         )

//     [1] => Array
//         (
//             [nMulTipoServicio] => 49
//             [nMulServicio] => 68
//         )

// )

		if ($result) {
			echo "1";
		} else {
			echo "0";
		}
	}

	function insServicioTipo(){
		$this->objMultitabla->set_cMulDescripcion($this->input->post('txt_ins_tserv_nom'));
		$result = $this->objMultitabla->insServicioTipo();
		// print_p( $this->objServiosTipo->insServiciosTipo($temp) );
		if ($result) {
			echo "1";
		} else {
			echo "0";
		}
	}
	function listarServicios(){
		$opciones = array(
			'Costo' => array(
				 'color'=>'red'
				,'icono'=>'money'
				,'tooltip'=>'success'
			),
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
		$tabla_data = $this->objServiosTipo->qryServiciosTipo();
		$funciones = array(		
			'initEvtOpcPopupId("money","servicios/getViewCosto/","Agregar Costo por Año",480,200,"func_close")',
			'initEvtOpcPopupId("edit","servicios/getServicios/","Editar Servicios",600,300,"func_close")',
			'initEvtDel("confirmarDelete")'
		);
		$nameTable = 'tabla-servicios';
		$pk = 'ID';
		$disable_order=true;
		CrudGridMultipleJson($tabla_data,$nameTable,$pk,$opciones,$funciones,$disable_order);		

	}
	function getViewCosto($nSetId){	
		 $Codigo["nSetId"] = $nSetId;	
		 $this->load->view('agua/costo_servicios_tipo/ins_tiposervicio_costo_view', $Codigo);
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

	function getServicios($nSetId) {
		// echo $nPerId;
		$fila = $this->objServiosTipo->getServicios($nSetId);
         // print_p($fila);
		if ($fila) {
			$filax["fila"] = $fila;
			$this->load->view('agua/servicios/upd_servicios_view', $filax);
		} else {
			echo "Error";
		}
	}

	function cboTipoServicioUpd() {
		$this->objMultitabla->set_nMulId( $this->input->post('txt_upd_servtipo_nMulId') );
		$result = $this->objMultitabla->cboTipoServicioUpd();
		echo $result;
	}

	function updServicio() {
		$this->objCalle->set_nCalId($this->input->post('txt_upd_nCalId'));
		$this->objCalle->set_cCalNombre($this->input->post('txt_upd_cal_nom'));
		$this->objCalle->set_nSecId($this->input->post('cbo_upd_cal_nSecId'));
		$this->objCalle->set_nViaId($this->input->post('cbo_upd_via_nViaId'));
		$result = $this->objCalle->updCalle();
		// print_p($_POST);exit();
		if ($result) {
			echo "1";
		} else {
			echo "0";
		}
	}

}
?>