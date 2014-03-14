<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Inicio extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->_Esta_logeado();
	}
	public function index() {
		$data['main_content'] = 'inicio_view';
		$data['titulo'] = 'Sistema Integrado Municipal MPN 2.0';
		$this->load->view('plantilla/template', $data);
	}
	function _Esta_logeado() {
        $esta_logeado = $this->session->userdata('esta_logeado');
        if ($esta_logeado != true) {
            redirect('login');
        }
    } 
}