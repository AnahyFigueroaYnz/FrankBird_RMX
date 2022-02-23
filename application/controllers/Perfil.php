<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Perfil extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Perfil_model');
    }

    public function index()
    {
        $this->load->view('login');
    }
    /* Seguridad de log */
    public function seguridad()
    {
        $newdata = array(
            'logueado' => TRUE,
            'id_usuario' => '2',
            'nombre' => 'Anahy',
        );

        $this->session->set_userdata($newdata);
        return true;
    }
}
