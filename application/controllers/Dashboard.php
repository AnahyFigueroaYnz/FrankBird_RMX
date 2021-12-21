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
		//if ($this->mantenimiento() == FALSE) {
			//if ($this->seguridad() == TRUE && $this->session->userdata('nivel') <= 2) {
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
				$this->load->view('footers/footer');
			/*} else {
				redirect(base_url() . 'Login');
			}
		} else {
			$this->load->view('mantenimiento/mantenimiento');
		}*/
	}

	public function mantenimiento()
	{
		$nivel = $this->session->userdata('nivel');
		$consulta_controller = $this->Dash_model->get_status_C();
		$status = $consulta_controller->activo;

		if ($status == 0) { //inactivo
			return FALSE;
		} else {
			if ($nivel == 1) {
				return FALSE;
			} else {
				return TRUE;
			}
		}
	}

	public function seguridad()
	{
		if (($this->session->userdata('logueado') == 1) && ($this->session->userdata('tyc') == 1)) {
			return true;
		} else {
			return false;
		}
	}
}