<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Services extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('Services_model');
		$this->load->library('versiones');
		$ver = $this->Services_model->get_version();
		$this->versiones->set_version($ver);
	}
	// -------------- VISTAS ---------------------
	/**  Función para cargar la vista de la barra de navegación: servicios */
	public function index()
	{
		$this->load->view('headers/home/header');
		$this->load->view('headers/home/navbar');
		$this->load->view('home/servicios');
		$this->load->view('footers/home/footer');
		$this->load->view('footers/home/scripts');
	}
	/**  Función para cargar la vista de la barra de navegación: FAQs */
	public function FAQ()
	{
		$this->load->view('headers/home/header');
		$this->load->view('headers/home/navbar');
		$this->load->view('home/faqs');
		$this->load->view('footers/home/footer');
		$this->load->view('footers/home/scripts');
	}
	// funcion de la vista de login segun el nievel de usuario logeado
	public function Ingresar()
	{
		$nivel = $this->session->userdata('nivel');

		if ($this->seguridad() == TRUE) {
			if ($this->mantenimiento() == FALSE) {
				if ($nivel == 1) { //admin 
					redirect(base_url() . 'Mantenimiento/DashboardRoot');
				} else if ($nivel == 2) { //admin 
					redirect(base_url() . 'Plataforma/DashboardAdministrador');
				} else if ($nivel == 3) { //asesor 
					redirect(base_url() . 'Plataforma/DashboardAsesor');
				} else if ($nivel == 4) { //cliente
					redirect(base_url() . 'Clientes/DashboardCliente');
				} else if ($nivel == 5) { //Agente
					redirect(base_url() . 'Plataforma/DashboardAgente');
				}
			} else {
				$this->load->view('mantenimiento/mantenimiento');
			}
		} else {
			$this->load->view('headers/home/header');
			$this->load->view('home/login');
			$this->load->view('footers/home/scripts');
			$this->load->view('footers/cargar_js');
		}
	}
	/*Funcion para el login*/
	public function fun_login()
	{
		if ($this->input->is_ajax_request()) {
			$data = array(
				'usuario' => $this->input->post('email', true),
				'password' => $this->input->post('contrasena', true),
			);
			
			$query = $this->Services_model->auntenticar($data);

			if ($query == false) {
				$data_error = array('autenticacion' => false,);
				echo json_encode($data_error);
			} else {
				foreach ($query->result() as $row) {
					$id_usuario = $row->id_usuario;
					$usuario = $row->email;
					$nombre = $row->nombre;
					$password = $row->contrasena;
					$img_path = $row->img_path;
					$nivel = $row->id_nivelusuario;
					$tyc = $row->tyc;
				}
				$newdata = array(
					'id_usuario' => $id_usuario,
					'usuario' => $usuario,
					'nombre' => $nombre,
					'password' => $password,
					'nivel' => $nivel,
					'img_path' => $img_path,
					'tyc' => $tyc,
					'logueado' => TRUE,
				);

				$this->session->set_userdata($newdata);
				$data_success = array('autenticacion' => true,);
				echo json_encode($data_success);
			}
		} else {
			show_404();
		}
	}
	/*Función para el logout*/
	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url());
	}
	// obtner la informacion del usuarios
	public function get_usuario()
	{
		if ($this->input->is_ajax_request()) {
			$email = $this->input->post('email');
			$data = $this->Services_model->get_user($email);
			echo json_encode($data);
		} else {
			show_404();
		}
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
	// funcion para ver las politicas de privacidad
	public function Politica_Privacidad()
	{
		$this->load->view('headers/home/header');
		$this->load->view('headers/home/navbar');
		$this->load->view('home/politicas');
		$this->load->view('footers/home/footer');
		$this->load->view('footers/home/scripts');
	}
	// Actualizar los permisos del usuarios
	public function update_tyc()
	{
		if ($this->input->is_ajax_request()) {
			$id_usuario = $this->input->post('id_usuario');
			$data = array('tyc' => $this->input->post('tyc'),);
			$this->Services_model->update_tyc($data, $id_usuario);
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
		$consulta_controller = $this->Services_model->get_status_C();
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
