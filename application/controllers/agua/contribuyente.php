<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contribuyente extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('persona_natural_model','objPersonaNatural');
		$this->load->model('persona_detalle_model','objPersonaDetalle');
		$this->load->model('persona_model','objPersona');
		$this->load->helper('tables_helper');
	}
	public function index()
	{
		$this->loaders->verificaAcceso();
		$data['main_content'] = 'agua/contribuyente/panel_view';
		$data['aplicacion'] = 'Agua';
		$data['objeto'] = 'Contribuyentes';
		$this->load->view('plantilla/template', $data);			
	}

	function cboTipoEstadoCivil() {
        $result = $this->objPersonaDetalle->cboTipoEstadoCivil();
        echo $result;
    }

    function insContribuyente(){

		$datapd = 
		   array(
		      'dni'         =>  $this->input->post('txt_ins_cont_dni') ,
		      'email'       =>  $this->input->post('txt_ins_cont_email'),
		      'telefono'    =>  $this->input->post('txt_ins_cont_telefono'),
		      'celular'     =>  $this->input->post('txt_ins_cont_celular'),
		      'estadocivil' =>  $this->input->post('cbo_ins_per_estcivil')
		   );
		$this->objPersona->setPerApellidoPaterno( $this->input->post('txt_ins_cont_appaterno') );	
		$this->objPersona->setPerApellidoMaterno( $this->input->post('txt_ins_cont_apmaterno') );	
		$this->objPersona->setPerNombres( $this->input->post('txt_ins_cont_nombres') );			
		$this->objPersona->setPerContribuyente( 'SI' );			
		$this->objPersonaNatural->set_cPnaSexo( $this->input->post('cbo_ins_cont_sexo') );	
		$this->objPersonaNatural->set_dPnaFechaNacimiento( $this->input->post('txt_ins_cont_nacimiento') );	
		$this->objPersonaDetalle->set_cPdeValor( $datapd );
		if ( $this->objPersona->insPersona() ) {
			$this->objPersonaNatural->set_nPerId( $this->objPersona->getPerId() );
			$this->objPersonaNatural->insPersonaNatural();
			$this->objPersonaDetalle->set_nPerId( $this->objPersona->getPerId() );
			$this->objPersonaDetalle->instPersonaDetalle('contribuyente');
			echo "1";		
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
		CrudGridMultipleJson($tabla_data,$nameTable,$pk,$opciones,$funciones);
	}

}
?>