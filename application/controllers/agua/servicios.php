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
			// $tipos_servicio_data = array();
			foreach ($tipos_servicio as $key => $fila) {
				// $this->objModulo->set_codigo( $fila['ID'] );
				// $objetos = $this->objModulo->getObjeto();
				// if ( count($objetos)>=1 ) {
					$tipos_servicio_data[] = $fila['cMulDescripcion'];
				// 	$children = array();
				// 	foreach ($objetos as $indice => $registro) {
				// 		$children[ $registro['ID'] ] = array('name' => $registro['Opcion'], 'type'=>'item','tree-item-name'=> true );
				// 	}
				// 	$tree_data[$fila['ID']]['additionalParameters'] = array( 'children' => $children);
				// }else{
				// 	$tree_data[$fila['ID']] = array('name'=>$fila['Nombre'],'type'=>'item');
				// }
			}
			// print_p( json_encode($tree_data,JSON_PRETTY_PRINT ));
			echo json_encode($tipos_servicio_data);
			// print_p($this->objModulo->qryAplicaciones( ));
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
}
?>