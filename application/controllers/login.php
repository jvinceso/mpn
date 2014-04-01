<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('usuario_model', 'objUsuario');
    }

    public function index()
    {
        $this->load->view('login_view');
    }
    public function validar()
    {
        $usuario = $this->input->post('username');
        $pass = md5($this->input->post('password'));
        if ($this->objUsuario->autenticar($usuario, $pass)) {
            $this->session->set_userdata( 
            array(
                'esta_logeado' => true
                ,'nUsuId' => $this->objUsuario->get_nUsuId()
                ,'cUsuNick' => $this->objUsuario->get_cUsuNick()
                ,'IdPersona' => $this->objUsuario->get_nPerId()
                ,'Nombres' => $this->objUsuario->get_cUsuNombre()
            ));
            redirect('inicio');
        } else {
            redirect('login');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url());
    }

    public function generador()
    {
        $this->load->model('mysql2php', 'objmysqlphp');
        $this->objmysqlphp->GenerarMultiplesClases('bdmpnintegrado');
        echo "Clases Generados";
    }

}

/* End of file login.php */
/* Location: ./application/controllers/login.php */
