<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Trabajador extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('administrador/trabajador_model','objTrabajador');
		$this->load->model('usuario_model','objUsuario');
	}
	public function index()
	{
		$data['main_content'] = 'administrador/trabajador/panel_view';
		$data['aplicacion'] = 'Administrador';
		$data['objeto'] = 'Trabajador';
		$this->load->view('plantilla/template', $data);			
	}
	function prueba(){
		echo json_encode(array(1));
	}
	function insTrabajador(){
		$this->objTrabajador->set_AreId( $this->input->post('cbo_ins_trab_area') );
		$this->objTrabajador->set_MulCargo( $this->input->post('cbo_ins_trab_cargo') );	
		$this->objTrabajador->setPerApellidoPaterno( $this->input->post('txt_ins_mod_icono') );	
		$this->objTrabajador->setPerApellidoMaterno( $this->input->post('txt_ins_mod_icono') );	
		$this->objTrabajador->setPerNombres( $this->input->post('txt_ins_mod_icono') );	
		$this->objTrabajador->setPerDNI( $this->input->post('txt_ins_mod_icono') );	
		$this->objTrabajador->setPerSexo( $this->input->post('txt_ins_mod_icono') );	
		$this->objTrabajador->setPerFechaNacimiento( $this->input->post('txt_ins_mod_icono') );	
		$this->objTrabajador->setPerDireccion( $this->input->post('txt_ins_mod_icono') );	
		$this->objTrabajador->setPerEmail( $this->input->post('txt_ins_mod_icono') );	
		$this->objTrabajador->setPerTelefono( $this->input->post('txt_ins_mod_icono') );	
		$this->objTrabajador->setPerCelular( $this->input->post('txt_ins_mod_icono') );	
		$this->objTrabajador->setPerEstadoCivil( $this->input->post('txt_ins_mod_icono') );	
		print_r(objTrabajador);
		// $result = $this->objModulo->insAplicacion();
		// if ($result) {
		// 	$this->objModulo->insAplicacion($);
		// 	echo "1";
		// } else {
		// 	echo "0";
		// }
	}
}
?>