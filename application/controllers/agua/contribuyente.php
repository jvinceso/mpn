<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contribuyente extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('agua/contribuyente_model','objContribuyente');
		$this->load->model('persona_model','objPersona');
		$this->load->helper('tables_helper');
	}
	public function index()
	{
		$data['main_content'] = 'agua/contribuyente/panel_view';
		$data['aplicacion'] = 'Agua';
		$data['objeto'] = 'Contribuyentes';
		$this->load->view('plantilla/template', $data);			
	}

	function cboTipoEstadoCivil() {
        $result = $this->objContribuyente->cboTipoEstadoCivil();
        echo $result;
    }

    function insContribuyente(){
		$this->objTrabajador->set_AreId( $this->input->post('cbo_ins_trab_area') );
		$this->objTrabajador->set_MulCargo( $this->input->post('cbo_ins_trab_cargo') );	
		$this->objTrabajador->setPerApellidoPaterno( $this->input->post('txt_ins_trab_appaterno') );	
		$this->objTrabajador->setPerApellidoMaterno( $this->input->post('txt_ins_trab_apmaterno') );	
		$this->objTrabajador->setPerNombres( $this->input->post('txt_ins_trab_nombres') );	
		$this->objTrabajador->setPerDNI( $this->input->post('txt_ins_trab_dni') );	
		$this->objTrabajador->setPerSexo( $this->input->post('cbo_ins_trab_sexo') );	
		$this->objTrabajador->setPerFechaNacimiento( $this->input->post('txt_ins_trab_nacimiento') );	
		$this->objTrabajador->setPerDireccion( $this->input->post('txt_ins_trab_direccion') );	
		$this->objTrabajador->setPerEmail( $this->input->post('txt_ins_trab_email') );	
		$this->objTrabajador->setPerTelefono( $this->input->post('txt_ins_trab_telefono') );	
		$this->objTrabajador->setPerCelular( $this->input->post('txt_ins_trab_celular') );	
		$this->objTrabajador->setPerEstadoCivil( $this->input->post('cbo_ins_trab_estcivil') );	
		// print_p($this->objTrabajador);
		if ( $this->objTrabajador->insTrabajador() ) {
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

	function listarContribuyente(){
		$opciones = array(
			'Direccion' => array(
				 'color'=>'green'
				,'icono'=>'home'
				,'tooltip'=>'success'
			)
			// 'Eliminar' => array(
			// 	 'color'=>'red'
			// 	,'icono'=>'trash'
			// 	,'tooltip'=>'success'
			// ),
			// 'Configuracion' => array(
			// 	 'color'=>'blue'
			// 	,'icono'=>'cogs'
			// 	,'tooltip'=>'info'
			// )
		);
		$tabla_data = $this->objPersona->qryContribuyente();
		$funciones = array(
			// 'initEvtUpdJson("../utilitarios/modulo/vistaGet/upd_view/","Pagina de Pruebas",450,250,"listarModulo()")',
			'initEvtOpc("cogs","asignaDireccion(fila)")',
			// 'initEvtDel("confirmarDelete")'
		);
		$nameTable = 'tabla-contrib';
		$pk = 'ID';
	}

}
?>