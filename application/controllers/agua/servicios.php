<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Servicios extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('agua/servicios_tipo_model','objServiosTipo');
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

	function insServicio(){
		$this->objSector->set_cSecNombre( $this->input->post('txt_ins_sec_nom') );
		$result = $this->objSector->insSector();
		if ($result) {
			echo "1";
		} else {
			echo "0";
		}
	}
}
?>