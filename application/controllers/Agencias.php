<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Agencias extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Agencias_model');
	}
	/* Funcion de inicio del catalogo de agencias aduanales */
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
