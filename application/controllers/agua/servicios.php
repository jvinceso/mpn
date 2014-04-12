<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Servicios extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('agua/servicios_tipo_model','objServiosTipo');
		$this->load->model('multitabla_model','objMultitabla');
		// $this->load->model('agua/via_model','objVia');
		// $this->load->library('table');
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
	function pru(){

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
		// $this->objServiosTipo->insServiciosTipo($temp);
		print_p( $this->objServiosTipo->insServiciosTipo($temp) );
		// $result = $this->objServiosTipo->insServicio_Tipo();
/*		$array = $this->input->post('json');
		$this->objMultitabla->set_cMulDescripcion($array['txt_ins_serv_nom']);
		// $servicio = $this->objMultitabla->insServicio();
		// $this->servicios_tipo_model->set_nMulServicio($servicio);
		$this->objServiosTipo->set_nMulTipoServicio($array['tipos_servicios']);
		// print_p($this->input->post('json'));exit();
		$result = $this->objServiosTipo->insServicio_Tipo();
		// if ($result) {
		// 	echo "1";
		// } else {
		// 	echo "0";
		// }*/
	}
}
?>