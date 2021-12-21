<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Login_model');
	}

	public function index()
	{
		$this->load->view('login');
		$this->load->view('footers/footer');
	}
	
	/*Función para el logout*/
	public function Logout()
	{
		$this->session->sess_destroy();
		redirect(base_url());
	}

	/*Funcion para el login*/
	public function fun_login()
	{
		if ($this->input->is_ajax_request()) {
			$data = array(
				'usuario' => $this->input->post('email', true),
				'password' => $this->input->post('contrasena', true),
			);
			
			$query = $this->Login_model->auntenticar($data);

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
}