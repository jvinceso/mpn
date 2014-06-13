<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Trabajador extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('administrador/trabajador_model','objTrabajador');
		$this->load->model('persona_natural_model','objPersonaNatural');
		$this->load->model('usuario_model','objUsuario');
		$this->load->model('persona_detalle_model','objPersonaDetalle');
		$this->load->helper('tables_helper');
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
        $result = $this->objPersonaDetalle->cboTipoEstadoCivil();
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
		$datapd = 
		   array(
		      'dni'         =>  $this->input->post('txt_ins_trab_dni') ,
		      'direccion'   =>  $this->input->post('txt_ins_trab_direccion') ,
		      'email'       =>  $this->input->post('txt_ins_trab_email'),
		      'telefono'    =>  $this->input->post('txt_ins_trab_telefono'),
		      'celular'     =>  $this->input->post('txt_ins_trab_celular'),
		      'estadocivil' =>  $this->input->post('cbo_ins_per_estcivil')
		   );
		$this->objTrabajador->set_AreId( $this->input->post('cbo_ins_trab_area') );
		$this->objTrabajador->set_MulCargo( $this->input->post('cbo_ins_trab_cargo') );	
		$this->objTrabajador->setPerApellidoPaterno( $this->input->post('txt_ins_trab_appaterno') );	
		$this->objTrabajador->setPerApellidoMaterno( $this->input->post('txt_ins_trab_apmaterno') );	
		$this->objTrabajador->setPerNombres( $this->input->post('txt_ins_trab_nombres') );			
		$this->objTrabajador->setPerContribuyente( 'NO' );			
		$this->objPersonaNatural->set_cPnaSexo( $this->input->post('cbo_ins_trab_sexo') );	
		$this->objPersonaNatural->set_dPnaFechaNacimiento( $this->input->post('txt_ins_trab_nacimiento') );	
		$this->objPersonaDetalle->set_cPdeValor( $datapd );
		if ( $this->objTrabajador->insTrabajador( $this->objPersonaNatural,$this->objPersonaDetalle ) ) {
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

	function listarTrabajador(){
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
		$tabla_data = $this->objTrabajador->listarTrabajador();
		$funciones = array(
			'initEvtOpcPopupId("edit","contribuyente/getContribuyente/","Editar Contribuyente",920,400,"func_close")',
			// 'initEvtSlider("home","contribuyente/get_agregar_direccion/","tbl_contribuyentes_principal","c_frm_contribuyente","c_frm_procesos_contribuyente","","")',			
			'initEvtDel("confirmarDelete")'
			);
		$nameTable = 'tabla-Trabajador';
		$pk = 'ID';
		CrudGridMultipleJson($tabla_data,$nameTable,$pk,$opciones,$funciones);
	}
}
?>