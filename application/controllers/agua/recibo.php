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
	function procesar_recibos( $anio ){
		$this->objRecibo->ins_procesar_recibos( $anio );
	}

}

/* End of file recibo.php */
/* Location: ./application/controllers/agua/recibo.php */
?>