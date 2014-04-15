<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contribuyente extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('persona_natural_model','objPersonaNatural');
		$this->load->model('persona_detalle_model','objPersonaDetalle');
		$this->load->model('agua/sector_model','objSector');
		$this->load->model('agua/servicios_tipo_model','objServiosTipo');
		$this->load->model('agua/servicios_contribuyente_model','objServiciosContribuyente');
		$this->load->model('persona_model','objPersona');
		$this->load->model('agua/direccion_calle_model','objDireccionCalle');
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
			// 'Documentos' => array(
			// 	 'color'=>'blue'
			// 	,'icono'=>'documento'
			// 	,'tooltip'=>'success'
			// ),
			'Direccion' => array(
				 'color'=>'green'
				,'icono'=>'direccion'
				,'tooltip'=>'success'
			),
			// 'Telefono' => array(
			// 	 'color'=>'green'
			// 	,'icono'=>'telefono'
			// 	,'tooltip'=>'success'
			// ),
			// 'Eliminar' => array(
			// 	 'color'=>'red'
			// 	,'icono'=>'darbaja'
			// 	,'tooltip'=>'success'
			// )
		);
		$tabla_data = $this->objPersona->qryContribuyente();
		$funciones = array(
			'initEvtOpc("pagos","ver_pagos(fila)")',
			'initEvtOpc("direccion","asignar_direccion(fila)")',
			// 'initEvtOpc("documento","asignaDetalle(fila,\'docu\')")',
			// 'initEvtOpc("telefono","asignaDetalle(fila,\'tele\')")',
			// 'initEvtOpc("darbaja","asignaDetalle(fila,\'baja\')")',
		);
		$nameTable = 'tabla-contrib';
		$pk = 'ID';
		CrudGridMultipleJson($tabla_data,$nameTable,$pk,$opciones,$funciones);
	}

	function get_agregar_direccion(){
		$json = $this->input->post('json');
		$this->objPersonaDetalle->set_nPerId( $json['nPerId'] );
		$this->objPersonaDetalle->set_nMulId( 46 );
		$json['nMulId'] = 46;
		$data['persona'] = $json;
		$data['sector'] = $this->objSector->qrySector();
		$data['objDireccion'] = $this->objPersonaDetalle->listaDetalle();
		$this->load->view('agua/contribuyente/get_agregar_direccion', $data);
	}
	function listarDirecciones(){
		$json = $this->input->post('json');
		$this->objPersonaDetalle->set_nPerId( $json['nPerId'] );
		$this->objPersonaDetalle->set_nMulId( $json['nMulId'] );
		$tabla_data = $this->objPersonaDetalle->listaDetalle();
		$opciones = array(
		    'Pagos' => array(
		         'color'=>'blue'
		        ,'icono'=>'cloud-upload'
		        ,'tooltip'=>'success'
		    )
		);
		$funciones = array(
		    'initEvtOpc("cloud-upload","asignarTipo(fila)")'
		);
		$nameTable = 'tabla-direcccion-contribuyente';
		$pk = 'ID';
		CrudGridMultipleJson($tabla_data,$nameTable,$pk,$opciones,$funciones);

	}
	function get_calles(){
		$this->load->model('agua/calle_model','objCalle');
		$this->objCalle->set_nSecId(  $this->input->post('nSector') );
		$calles = $this->objCalle->get_ObjCalle();
		if ($calles) {
            echo form_dropdown("cbo_calle", creaCombo($calles),'', 'id="cbo_calle" class="chosen-select w360"');
		}else{
			echo "0";
		}
	}
	function insdireccion(){
		/*Insertamos Persona Detalle*/
		$this->objPersonaDetalle->set_nPerId( $this->input->post('txt_hdn_nPerid') );
		$this->objPersonaDetalle->set_nMulId( $this->input->post('txt_hdn_nMulId') );
		$this->objPersonaDetalle->set_cPdeValor( $this->input->post('direc') );		
		if($this->objPersonaDetalle->setPersonaDetalle()){
			/*Relacionamos calle con la direccion*/
			$this->objDireccionCalle->set_nPdeId( $this->objPersonaDetalle->get_nPdeId() );
			$this->objDireccionCalle->set_nCalId( $this->input->post('cbo_calle') );
			if( $this->objDireccionCalle->insDireccionCalle() ){
				echo "1";
			}else{
				echo "e";
			}
			
		}

	}
	function qryServicios(){
		$json = $this->input->post('json');
		$data['cboServiciosTipo'] = $this->objServiosTipo->listarServiciostipo();
		$data['codDireccion'] = $json['codx'];
		$data['nPerId'] = $json['PerId'];
		$this->objDireccionCalle->set_nPdeId( $json['codx'] );
			$this->objDireccionCalle->obtenernDicIdxnPdeId();
		$data['servicios_prestados'] = $this->objServiosTipo->listaServicioXDireccion( $this->objDireccionCalle );		
		$this->load->view('agua/contribuyente/get_agregar_serviciotipo_view', $data);
		// print_p( $this->input->post('json') );
	}
	
	function insServiciosxDireccion(){
		$this->objDireccionCalle->set_nPdeId( $this->input->post('nPdeId') );
			$this->objDireccionCalle->obtenernDicIdxnPdeId();
		$this->objServiciosContribuyente->set_nDicId( $this->objDireccionCalle->get_nDicId() );
		$this->objServiciosContribuyente->set_nSetId( $this->input->post('serviciotipo') );
		$this->objServiciosContribuyente->set_nPerId( $this->input->post('nPerId') );
		if ( $this->objServiciosContribuyente->verificaRegistro() < 1 ) {
			$this->objServiciosContribuyente->insServiciosContribuyente();
			echo "1";
		}else{
			echo "3";
		}
	}

	function listarServiciosxDireccion(){
		$this->objDireccionCalle->set_nPdeId( $this->input->post('nPdeId') );
			$this->objDireccionCalle->obtenernDicIdxnPdeId();
		$servicios_prestados = $this->objServiosTipo->listaServicioXDireccion( $this->objDireccionCalle );
		$opciones = null;
		$funciones = null;
		$nameTable = 'tabla-servicios-direccion';
		$pk = null;
		CrudGridMultipleJson($servicios_prestados,$nameTable,$pk,$opciones,$funciones); 

	}

}
?>