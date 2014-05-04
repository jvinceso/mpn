<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contribuyente extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('persona_natural_model','objPersonaNatural');
		$this->load->model('persona_detalle_model','objPersonaDetalle');
		$this->load->model('agua/sector_model','objSector');
		$this->load->model('persona_model','objPersona');
		$this->load->model('agua/contribuyente_model','objContribuyente');
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
			'Recibos' => array(
				'color'=>'blue'
				,'icono'=>'calendar'
				,'tooltip'=>'pink'
				),
			'Direccion' => array(
				'color'=>'green'
				,'icono'=>'home'
				,'tooltip'=>'success'
				),
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
		$tabla_data = $this->objPersona->qryContribuyente();
		$funciones = array(
			'initEvtOpc("calendar","verificar_pagos(fila)")',
			'initEvtOpc("home","asignar_direccion(fila)")',
			'initEvtOpcPopupId("edit","contribuyente/getContribuyente/","Editar Contribuyente",920,400,"func_close")',
			// 'initEvtSlider("home","contribuyente/get_agregar_direccion/","tbl_contribuyentes_principal","c_frm_contribuyente","c_frm_procesos_contribuyente","","")',			
			'initEvtDel("confirmarDelete")'
			);
		$nameTable = 'tabla-contrib';
		$pk = 'ID';
		CrudGridMultipleJson($tabla_data,$nameTable,$pk,$opciones,$funciones);
	}

	function getContribuyente($nPerId) {
		// echo $nPerId;
		$fila = $this->objContribuyente->getContribuyente($nPerId);
        // print_p($fila);
		if ($fila) {
			$filax["fila"] = $fila;
			$this->load->view('agua/contribuyente/upd_view', $filax);
		} else {
			echo "Error";
		}
	}

	function updContribuyente() {
		$datapd = array(
			array(				
				'nMulId' => '16' ,
				'cPdeValor' => $this->input->post('txt_upd_cont_dni')
				),
			array(				
				'nMulId' => '45' ,
				'cPdeValor' => $this->input->post('txt_upd_cont_email')
				),
			array(				
				'nMulId' => '43' ,
				'cPdeValor' => $this->input->post('txt_upd_cont_telefono')
				),
			array(				
				'nMulId' => '44' ,
				'cPdeValor' => $this->input->post('txt_upd_cont_celular')
				),
			array(				
				'nMulId' => '18' ,
				'cPdeValor' => $this->input->post('cbo_upd_per_estcivil')
				)
			);

		$this->objPersona->setPerApellidoPaterno( $this->input->post('txt_upd_cont_appaterno') );	
		$this->objPersona->setPerApellidoMaterno( $this->input->post('txt_upd_cont_apmaterno') );	
		$this->objPersona->setPerNombres( $this->input->post('txt_upd_cont_nombres') );			
		$this->objPersona->setPerContribuyente( 'SI' );	
		$this->objPersona->setPerId( $this->input->post('txt_upd_nperid') );	

		$this->objPersonaNatural->set_cPnaSexo( $this->input->post('cbo_upd_cont_sexo') );	
		$this->objPersonaNatural->set_dPnaFechaNacimiento( $this->input->post('txt_upd_cont_nacimiento') );	
		$this->objPersonaNatural->set_nPerId( $this->input->post('txt_upd_nperid') );

		$this->objPersonaDetalle->set_cPdeValor( $datapd );
		$this->objPersonaDetalle->set_nPerId( $this->input->post('txt_upd_nperid') );

		if ( $this->objPersona->updPersona() && $this->objPersonaNatural->updPersonaNatural() && $this->objPersonaDetalle->updPersonaDetalle() ) {
			echo "1";		
		} else {
			echo "0";
		}
	}

	function cboEstadoCivilUpd() {
		$this->objPersonaDetalle->set_cPdeValor( $this->input->post('txt_upd_estcivil') );
		$result = $this->objPersonaDetalle->cboEstadoCivilUpd();
		echo $result;
	}

	function get_agregar_direccion(){
		$json = $this->input->post('json');
		$this->objPersonaDetalle->set_nPerId( $json['nPerId'] );
		$this->objPersonaDetalle->set_nMulId( 46 );
		$json['nMulId'] = 46;
		$data['persona'] = $json;
		$data['sector'] = $this->objSector->qrySector();
		$data['objDireccion'] = $this->objPersonaDetalle->listaDetalle();
		$this->load->view('agua/contribuyente/get_agregar_direccion', $data, FALSE);
	}
	function get_recibos_contribuyente(){
		$json = $this->input->post('json');
		$this->objPersonaDetalle->set_nPerId( $json['nPerId'] );
		$this->objPersonaDetalle->set_nMulId( 46 );
		$json['nMulId'] = 46;
		$data['persona'] = $json;
		$data['sector'] = $this->objSector->qrySector();
		$data['objDireccion'] = $this->objPersonaDetalle->listaDetalle();
		$this->load->view('agua/contribuyente/get_recibos_contribuyente', $data, FALSE);
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
		$this->objPersonaDetalle->set_nPerId( $this->input->post('txt_hdn_nPerid') );
		$this->objPersonaDetalle->set_cPdeValor( $this->input->post('direc') );		
		$this->objPersonaDetalle->set_nMulId( $this->input->post('txt_hdn_nMulId') );
	}
	function qryServicios(){
		print_p( $this->input->post('json') );
	}

	function delContribuyente(){
		$this->objPersona->setPerId( $this->input->post('nPerId') );
		echo $this->objPersona->delContribuyente();

	}

}
?>