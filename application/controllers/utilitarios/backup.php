<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Backup extends CI_Controller {

	public function index()
	{
		$data['main_content'] = 'utilitarios/modulo_view';
		$data['titulo'] = 'Gestor Modulos';
		// echo "hola mundo";
		$this->load->view('plantilla/template', $data);	

	}

}

/* End of file backup.php */
/* Location: ./application/controllers/utilitarios/backup.php */
?>