<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Proyectos extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Proyectos_model');
	}
	/* Funcion de inicio del catalogo de agencias aduanales */
	public function index()
	{
		$this->load->view('login');
	}

	/* Proyectos nuevo pedido */
	public function Nuevo()
	{
		if ($this->seguridad() == TRUE) {
			$this->load->view('headers/header');
			$this->load->view('proyectos/proyectos-nuevo');
			$this->load->view('footers/footer');
		} else {
			redirect(base_url() . 'dashboard');
		}
	}

	/* Proyectos nuevo pedido */
	public function Todos()
	{
		if ($this->seguridad() == TRUE) {
			$this->load->view('headers/header');
			// $this->load->view('proyectos/proyectos-todos');
			
			$this->load->view('proyectos/proyectos-detalle');
			$this->load->view('footers/footer');
		} else {
			redirect(base_url() . 'dashboard');
		}
	}

	/* Proyectos nuevo pedido */
	public function Activos()
	{
		if ($this->seguridad() == TRUE) {
			$this->load->view('headers/header');
			$this->load->view('proyectos/proyectos-activos');
			$this->load->view('footers/footer');
		} else {
			redirect(base_url() . 'dashboard');
		}
	}

	/* Proyectos nuevo pedido */ 
	public function Concluidos()
	{
		if ($this->seguridad() == TRUE) {
			$this->load->view('headers/header');
			$this->load->view('proyectos/proyectos-concluidos');
			$this->load->view('footers/footer');
		} else {
			redirect(base_url() . 'dashboard');
		}
	}

	/* Proyectos nuevo pedido */
	public function Eliminados()
	{
		if ($this->seguridad() == TRUE) {
			$this->load->view('headers/header');
			$this->load->view('proyectos/proyectos-eliminados');
			$this->load->view('footers/footer');
		} else {
			redirect(base_url() . 'dashboard');
		}
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
