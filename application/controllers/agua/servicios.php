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
	function loadDataServicios(){
		$opciones = array(
			'Costo' => array(
				 'color'=>'red'
				,'icono'=>'money'
				,'tooltip'=>'success'
			)
		);
		$tabla_data = $this->objServiosTipo->qryServiciosTipo();
		$funciones = array(
			// "circle-plus","servicios/agregarCosto/","Agregar etiquetas a noticias",480,420,"func_close"
			'initEvtOpcPopupId("money","servicios/getViewCosto/","Agregar Costo por Año",480,420,"func_close")',
			// 'initEvtOpcPopupId("cogs","asignarCosto(fila)")',
		);
		$nameTable = 'tabla-servicios';
		$pk = 'ID';
		CrudGridMultipleJson($tabla_data,$nameTable,$pk,$opciones,$funciones);		

	}
	function getViewCosto($nSetId){	
		 $Codigo["nSetId"] = $nSetId;	
		 $this->load->view('agua/servicios/ins_tiposervicio_costo_view', $Codigo);
	}

	function insCostoServiciosTipo(){
		$this->objCostoServiosTipo->set_nSetId($this->input->post('txt_ins_setid'));
		$this->objCostoServiosTipo->set_fCstPago($this->input->post('txt_ins_cst_costo'));
		$this->objCostoServiosTipo->set_nCstAnio($this->input->post('txt_ins_cst_anio'));
		$result = $this->objCostoServiosTipo->insCostoServiciosTipo();
		// print_p( $this->objServiosTipo->insServiciosTipo($temp) );
		if ($result) {
			echo "1";
		} else {
			echo "0";
		}
	}
}
?>