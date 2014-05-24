<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Recibo extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('agua/costo_servicios_tipo_model','objCosto');
		$this->load->model('agua/recibo_model','objRecibo');
		$this->load->model('multitabla_model','objMultitabla');
		//Do your magic here
	}
	public function index()
	{
		$this->loaders->verificaAcceso();
		$data['main_content'] = 'agua/recibos/panel_view';
		$data['aplicacion'] = 'Agua';
		$data['anios'] = $this->objCosto->getAniosFiscales();
		$data['objeto'] = 'Recibos';
		$this->objMultitabla->set_nMulIdPadre(51);//nMulIdPadre->Servicios=51
		$data['cboServicio'] = $this->objMultitabla->qrymultitabla();
		$this->load->view('plantilla/template', $data);			
	}
	function obtenerAnios(){
		$cboAniosFiscales = $this->objCosto->getAniosFiscales( $this->input->post('servicio') );
		// print_p($cboAniosFiscales);
		if( !empty($cboAniosFiscales) )	echo form_dropdown("cbo_anios", creaCombo($cboAniosFiscales),'', 'id="cbo_anios" class="chosen-select w360"');
		else echo "2";
	}
	function procesar_recibos( $parcial = false ){
		$anio = date('Y');
		$rpt_procesar = 0;
		if ( $parcial ) {
			$anio = $this->input->post('anio');
			$mes = $this->input->post('mes');
			if ( isset( $anio ) && isset($mes) ) {
				// procesando parcialmente......
				$this->objRecibo->set_nPerIdContribuyente( $this->input->post('idx') );
				$rpt_procesar = $this->objRecibo->ins_procesar_recibos_parcial( $anio,$mes );
			}else{
				$rpt_procesar = 4;
			}
		}else{
			if ( isset( $anio ) ) {
				// procesando......
				$rpt_procesar = $this->objRecibo->ins_procesar_recibos( $anio );
			}else{
				$rpt_procesar = 4;
			}
		}
		echo $rpt_procesar;
		exit(0);
	}

	function efectuarPago(){
		$nRecID = $this->input->post('nRecId');
		$rpt_proceso = "0";
		$this->load->model('administrador/trabajador_model','objTrabajador');
		$this->load->model('caja/caja_pagos_model','objCajaPagos');

		$nTmuId = $this->objTrabajador->ObtenerCodigoTrabajador( $this->session->userdata('IdPersona') );
		// print_p( $nTmuId );
		$this->objRecibo->set_nRecId( $nRecID );
		$recibo_pagar = $this->objRecibo->getRecibo("PP");
		/**
		 * Data para Caja
		 */
		if( $recibo_pagar ){	
			$this->objCajaPagos->set_nPerId( $recibo_pagar['nPerIdContribuyente'] );
			$this->objCajaPagos->set_nTmuId( $nTmuId );//Concepto Agua
			$this->objCajaPagos->set_nConId( CONCEPTO_AGUA );//Concepto Agua
			$this->objCajaPagos->set_fCpaMonto( $recibo_pagar['Monto'] );
			$this->objCajaPagos->set_cCpaAno( $recibo_pagar['Anio'] );
			$this->objCajaPagos->set_cCpaMes( $recibo_pagar['Mes'] );
			$this->objCajaPagos->set_cCpaSerieNumero( 'AGUA-'.$recibo_pagar['nRecId'] );

			$this->objRecibo->updReciboCaja("T");
			$idCaja = $this->objCajaPagos->ins_pago_recibo();
			if ($idCaja) {
				$rpt_proceso = "1";
			} else {
				$rpt_proceso = "0";
			}
			// print_p( $idCaja  );
		}else{
			$rpt_proceso = "3";
		}
		echo $rpt_proceso;
	}

	function vistaPrevia($codRecibo){
		$data['codigo'] = $codRecibo;
		$this->load->view('reportes/template_view_resultado', $data);	
	}

	function reporte( $codx = 157 )
	{
		/* 
		 * To change this template, choose Tools | Templates
		 * and open the template in the editor.
		*/
		$this->load->library('pdf');
		$this->load->library('PHPJasperXML');

		$this->objRecibo->set_nRecId( $codx );
		$rsreporte = $this->objRecibo->getDataReport( );
		if ( $rsreporte ) {
			$PHPJasperXML = new PHPJasperXML($pdf);
			$xml =  simplexml_load_file( FCPATH."reportes_design/sample1.jrxml" );
			$PHPJasperXML->arrayParameter=array("mensaje"=>'El Pago de este recibo no cancela deudas anteriores, la perdida del mismo sera de S/.1 adicional');
			$PHPJasperXML->xml_dismantle( $xml );
			$PHPJasperXML->dataToArray( $rsreporte );
			$PHPJasperXML->outpage("I");			
		}else{
			echo '<center>No hay Datos para mostrar</center>';
		}
	}
}
/* End of file recibo.php */
/* Location: ./application/controllers/agua/recibo.php */
?>