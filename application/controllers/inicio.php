<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Inicio extends CI_Controller {

	public function __construct() {
		parent::__construct();
        // $this->load->model('inicio_model');
	}
	public function index() {
        // $data['categoria_menu'] = $this->inicio_model->cargarMenu();               
        // $data['categoria_submenu'] = $this->inicio_model->cargarSubMenu();
		$data['main_content'] = 'inicio_view';
		$data['titulo'] = 'Sistema Hotelero';
		$this->load->view('plantilla/template', $data);
	}
}