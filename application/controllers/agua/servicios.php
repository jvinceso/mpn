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

	function nomServicio() {
		$this->objMultitabla->set_nMulIdPadre('51');
		$this->objMultitabla->set_cMulDescripcion( $this->input->get("term") );
		$data = $this->objMultitabla->qrymultitablaAutocompelte();
		$return_arr = array();
		if ($data) {
			foreach ($data as $row) {
				$arrayServicio['label'] = htmlspecialchars($row['descripción']);
				$arrayServicio['id'] = $row['ID'];
				array_push($return_arr, $arrayServicio);
			}
		}
		print_r(json_encode($return_arr));
	}

	function insServicioporTipo(){
		$array = $this->input->post('json');
		// $nServId = $array['txt_ins_serv_nom'];
		$temp = array();
		// $this->objMultitabla->set_cMulDescripcion($array['txt_ins_servpt_nom']);
		// $servicio = $this->objMultitabla->insServicio();


		foreach ($array['tipos_servicios'] as $indice => $filita) {
			// $temp[]['nMulId'] = $THIS->OBTENERiDDESDEBD
			$this->objMultitabla->set_cMulDescripcion( $filita['nombre'] );
			$this->objMultitabla->getServicioId();//obtengo el id del tipo de servicio de multitabla
			$temp[$indice]['nMulTipoServicio'] = $this->objMultitabla->get_nMulId();
			$temp[$indice]['nMulServicio'] = $array['hid_fnd_ins_servpt_nom'];// obtengo el id del servicio de multitabla
		}
		$result = $this->objServiosTipo->insServicioporTipo($temp);
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

	function insTipoServicio(){
		$this->objMultitabla->set_cMulDescripcion($this->input->post('txt_ins_tserv_nom'));
		$result = $this->objMultitabla->insTipoServicio();
		// print_p( $this->objServiosTipo->insServiciosTipo($temp) );
		if ($result) {
			echo "1";
		} else {
			echo "0";
		}
	}

	function insServicio(){
		$this->objMultitabla->set_cMulDescripcion($this->input->post('txt_ins_serv_nom'));
		$result = $this->objMultitabla->insServicio();
		// print_p( $this->objServiosTipo->insServiciosTipo($temp) );
		if ($result) {
			echo "1";
		} else {
			echo "0";
		}
	}
	function listarServiciosporTipo(){
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
			'initEvtOpcPopupId("edit","servicios/getServiciosporTipo/","Editar Servicios por Tipo",600,300,"func_close")',
			'initEvtDel("confirmarDeleteServicioPorTipo")'
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

	function listarServicios(){
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
		$this->objMultitabla->set_nMulIdPadre('51');
		$tabla_data = $this->objMultitabla->qrymultitabla();
		$funciones = array(
			'initEvtOpcPopupId("edit","servicios/getServicio/","Editar Servicio",500,200,"func_close")',
			'initEvtDel("confirmarDeleteMultitabla")'
			);
		$nameTable = 'tabla-Servicios';
		$pk = 'ID';
		CrudGridMultipleJson($tabla_data,$nameTable,$pk,$opciones,$funciones);
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
			'initEvtOpcPopupId("edit","servicios/getTipoServicio/","Editar Tipo de Servicio",500,200,"func_close")',
			'initEvtDel("confirmarDeleteMultitabla")'
			);
		$nameTable = 'tabla-TipoServicios';
		$pk = 'ID';
		CrudGridMultipleJson($tabla_data,$nameTable,$pk,$opciones,$funciones);
	}

	function getServicio($nMulId) {
		// echo $nPerId;
		$fila = $this->objMultitabla->getmultitabla($nMulId);
        // print_p($fila);
		if ($fila) {
			$filax["fila"] = $fila;
			$this->load->view('agua/servicios/upd_servicios_view', $filax);
		} else {
			echo "Error";
		}
	}

	function getTipoServicio($nMulId) {
		// echo $nPerId;
		$fila = $this->objMultitabla->getmultitabla($nMulId);
        // print_p($fila);
		if ($fila) {
			$filax["fila"] = $fila;
			$this->load->view('agua/servicios/upd_tiposervicio_view', $filax);
		} else {
			echo "Error";
		}
	}

	function getServiciosporTipo($nSetId) {
		// echo $nPerId;
		$fila = $this->objServiosTipo->getServiciosporTipo($nSetId);
         // print_p($fila);
		if ($fila) {
			$filax["fila"] = $fila;
			$this->load->view('agua/servicios/upd_serviciosportipo_view', $filax);
		} else {
			echo "Error";
		}
	}

	function cboTipoServicioUpd() {
		$this->objMultitabla->set_nMulId( $this->input->post('txt_upd_servpt_nMulId') );
		$result = $this->objMultitabla->cboTipoServicioUpd();
		echo $result;
	}

	function updServicio() {
		$this->objMultitabla->set_nMulId($this->input->post('txt_upd_serv_nMulId'));
		$this->objMultitabla->set_cMulDescripcion($this->input->post('txt_upd_serv_nom'));
		$result = $this->objMultitabla->updMultitabla();
		// print_p($_POST);exit();
		if ($result) {
			echo "1";
		} else {
			echo "0";
		}
	}

	function updTipoServicio() {
		$this->objMultitabla->set_nMulId($this->input->post('txt_upd_tserv_nMulId'));
		$this->objMultitabla->set_cMulDescripcion($this->input->post('txt_upd_tserv_nom'));
		$result = $this->objMultitabla->updMultitabla();
		// print_p($_POST);exit();
		if ($result) {
			echo "1";
		} else {
			echo "0";
		}
	}

	function updServicioporTipo() {
		$anio = date('Y');
		$this->objServiosTipo->set_nSetId($this->input->post('txt_upd_servpt_nSetId'));
		$this->objServiosTipo->set_nMulTipoServicio($this->input->post('cbo_upd_tipo_serv'));
		$this->objCostoServiosTipo->set_nSetId($this->input->post('txt_upd_servpt_nSetId'));
		$this->objCostoServiosTipo->set_fCstPago($this->input->post('txt_upd_servpt_costo'));
		$this->objCostoServiosTipo->set_nCstAnio($anio);
		// print_p($_POST);exit();
		if ($this->objServiosTipo->updServicioporTipo()) {				 
			if ($this->objCostoServiosTipo->updServicioporTipo()) {
				echo "1";
			}else{
				echo "2";
			}	
		} else {
			echo "0";
		}
	}

	function delServicioPorTipo(){
		$anio = date('Y');
		$this->objServiosTipo->set_nSetId( $this->input->post('nSetId') );
		$this->objCostoServiosTipo->set_nSetId($this->input->post('nSetId'));
		$this->objCostoServiosTipo->set_nCstAnio($anio);
		if ($this->objServiosTipo->delServicioPorTipo()) {		   
			if ( $this->objCostoServiosTipo->delServicioPorTipo() ) {
				echo "1";
			}else{
				echo "2";
			}	
		}else{
			echo "0";
		}
	}

	function delMultitabla(){
		$this->objMultitabla->set_nMulId( $this->input->post('nMulId') );
		if ($this->objMultitabla->delMultitabla()) {	
			echo "1";
		}else{
			echo "0";
		}
	}
}
?>