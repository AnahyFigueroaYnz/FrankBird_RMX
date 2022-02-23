<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Policy extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('Policy_model');
		$this->load->library('versiones');
		$ver = $this->Policy_model->get_version();
		$this->versiones->set_version($ver);
	}
	// -------------- VISTAS ---------------------
	// funcion para ver las politicas de privacidad
	public function index()
	{
		$this->load->view('headers/home/header');
		$this->load->view('headers/home/navbar');
		$this->load->view('home/politicas');
		$this->load->view('footers/home/footer');
		$this->load->view('footers/home/scripts');
	}
	// funcion para ver los terminos y condificiones
	public function Terminos_Condiciones()
	{
		$this->load->view('headers/home/header');
		$this->load->view('headers/home/navbar');
		$this->load->view('home/tyc');
		$this->load->view('footers/home/footer');
		$this->load->view('footers/home/scripts');
	}
	// Actualizar los permisos del usuarios
	public function update_tyc()
	{
		if ($this->input->is_ajax_request()) {
			$id_usuario = $this->input->post('id_usuario');
			$data = array('tyc' => $this->input->post('tyc'),);
			$this->Policy_model->update_tyc($data, $id_usuario);
			echo json_encode($data);
		} else {
			show_404();
		}
	}
	// funcion de seguridad
	public function seguridad()
	{
		if (($this->session->userdata('logueado') == 1) && ($this->session->userdata('tyc') == 1)) {
			return true;
		} else {
			return false;
		}
	}
	// funcion del mantenimiento
	public function mantenimiento()
	{
		$nivel = $this->session->userdata('nivel');
		$consulta_controller = $this->Policy_model->get_status_C();
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
}
