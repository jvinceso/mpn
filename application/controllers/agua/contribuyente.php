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
			'Pagos' => array(
				 'color'=>'blue'
				,'icono'=>'pagos'
				,'tooltip'=>'success'
			),
			'Documentos' => array(
				 'color'=>'blue'
				,'icono'=>'documento'
				,'tooltip'=>'success'
			),
			'Direccion' => array(
				 'color'=>'green'
				,'icono'=>'direccion'
				,'tooltip'=>'success'
			),
			'Telefono' => array(
				 'color'=>'green'
				,'icono'=>'telefono'
				,'tooltip'=>'success'
			),
			'Eliminar' => array(
				 'color'=>'red'
				,'icono'=>'darbaja'
				,'tooltip'=>'success'
			)
		);
		$tabla_data = $this->objPersona->qryContribuyente();
		$funciones = array(
			'initEvtOpc("pagos","asignaDetalle(fila,\'pago\')")',
			'initEvtOpc("direccion","asignaDetalle(fila,\'dir\')")',
			'initEvtOpc("documento","asignaDetalle(fila,\'docu\')")',
			'initEvtOpc("telefono","asignaDetalle(fila,\'tele\')")',
			'initEvtOpc("darbaja","asignaDetalle(fila,\'baja\')")',
		);
		$nameTable = 'tabla-contrib';
		$pk = 'ID';
		CrudGridMultipleJson($tabla_data,$nameTable,$pk,$opciones,$funciones);
	}

}
?>