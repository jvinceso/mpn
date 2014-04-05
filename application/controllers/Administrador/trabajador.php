<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Trabajador extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('administrador/trabajador_model','objTrabajador');
		$this->load->model('persona_natural_model','objPersonaNatural');
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

	function cboTipoEstadoCivil() {
        $result = $this->objTrabajador->cboTipoEstadoCivil();
        echo $result;
    }
    function cboTipoArea() {
        $result = $this->objTrabajador->cboTipoArea();
        echo $result;
    }
    function cboTipoCargo() {
        $result = $this->objTrabajador->cboTipoCargo();
        echo $result;
    }

	function insTrabajador(){
		$this->objTrabajador->set_AreId( $this->input->post('cbo_ins_trab_area') );
		$this->objTrabajador->set_MulCargo( $this->input->post('cbo_ins_trab_cargo') );	
		$this->objTrabajador->setPerApellidoPaterno( $this->input->post('txt_ins_trab_appaterno') );	
		$this->objTrabajador->setPerApellidoMaterno( $this->input->post('txt_ins_trab_apmaterno') );	
		$this->objTrabajador->setPerNombres( $this->input->post('txt_ins_trab_nombres') );	
		$this->objTrabajador->setPerDNI( $this->input->post('txt_ins_trab_dni') );	
		$this->objPersonaNatural->set_cPnaSexo( $this->input->post('cbo_ins_trab_sexo') );	
		$this->objPersonaNatural->set_dPnaFechaNacimiento( $this->input->post('txt_ins_trab_nacimiento') );	
		$this->objTrabajador->setPerDireccion( $this->input->post('txt_ins_trab_direccion') );	
		$this->objTrabajador->setPerEmail( $this->input->post('txt_ins_trab_email') );	
		$this->objTrabajador->setPerTelefono( $this->input->post('txt_ins_trab_telefono') );	
		$this->objTrabajador->setPerCelular( $this->input->post('txt_ins_trab_celular') );	
		$this->objTrabajador->setPerEstadoCivil( $this->input->post('cbo_ins_trab_estcivil') );	
		// print_p($this->objTrabajador);
		if ( $this->objTrabajador->insTrabajador( $this->objPersonaNatural ) ) {
			$query = $this->objUsuario->insUsuario($this->input->post('txt_ins_trab_dni'),$this->objTrabajador->getPerId());
				if ($query) {
					echo "1";
				}else{
					echo "2";
				}			
		} else {
			echo "0";
		}
	}
}
?>