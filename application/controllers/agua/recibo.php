<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Recibo extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}
	public function index()
	{
		$this->loaders->verificaAcceso();
		$data['main_content'] = 'agua/recibos/panel_view';
		$data['aplicacion'] = 'Agua';
		$data['objeto'] = 'Recibos';
		$this->load->view('plantilla/template', $data);			
	}

}

/* End of file recibo.php */
/* Location: ./application/controllers/agua/recibo.php */
?>