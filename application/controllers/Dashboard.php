<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('Dash_model');
		$this->load->library('versiones');
		$ver = $this->Dash_model->get_version();
		$this->versiones->set_version($ver);
	}
	// -------------- VISTAS ---------------------

	public function index()
	{
		if ($this->seguridad() == TRUE) {
			$id_usuario = $this->session->userdata('id_usuario');
			$data = array(
				'Data_Proyectos' => $this->Dash_model->noProyectos($id_usuario),
				'Data_Agencias' => $this->Dash_model->noAgencias($id_usuario),
				'Data_Proveedores' => $this->Dash_model->noProveedores($id_usuario),
				'Data_UltCotizaciones' => $this->Dash_model->lastCotizaciones($id_usuario),
				'Data_UltProyectos' => $this->Dash_model->lastProyectos(),
				'Data_UltProductos' => $this->Dash_model->lastProductos(),
				'Data_SourcingProy' => $this->Dash_model->sourcingMisProy($id_usuario),
				'Data_Ganancias' => $this->Dash_model->ganancias($id_usuario),
				'Data_Pendientes' => $this->Dash_model->pendientesTasks($id_usuario),
			);
			$this->load->view('headers/header');
			$this->load->view('plataforma/administrador/dashboardAdmin', $data);
			$this->load->view('footers/cargar_js');
			$this->load->view('footers/footer');
		} else {
			redirect(base_url() . 'Login');
		}
	}

	public function seguridad()
	{
		if ($this->session->userdata('logueado') == 1) {
			return true;
		} else {
			return false;
		}
	}
}