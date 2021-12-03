<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Usuarios extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('Usuarios_model');

		$this->load->library('versiones');
		$ver = $this->Usuarios_model->get_version();
		$this->versiones->set_version($ver);
	}

	/*		VISTA LISTA ASESORES 	ADMIN		*/

	public function lista_asesores()
	{
		if ($this->mantenimiento() == FALSE) {
			if ($this->seguridad() == TRUE) {
				$data = array(
					//PARAMETRO FALSE CUANDO NO ES CLIENTE TRUE CUANDO SI LO ES
					'DATA_USUARIOS' => $this->Usuarios_model->get_usuarios(),
					'DATA_NIVELES' => $this->Usuarios_model->get_niveles(),
				);
				$this->load->view('headers/header');
				$this->load->view('headers/navBar_plataforma');
				$this->load->view('plataforma/administrador/asesores', $data);
				$this->load->view('footers/footer_cierre');
				$this->load->view('footers/footer-script');
				$this->load->view('footers/cargar_js');
			} else {
				redirect(base_url() . 'Home/Ingresar');
			}
		} else {
			$this->load->view('mantenimiento/mantenimiento');
		}
	}
	// funcion para crear a los usuarios, en los distintos niveles
	public function crear_usuarios()
	{
		if ($this->seguridad() == TRUE) {
			if ($this->input->is_ajax_request()) {
				$data = array(
					'email' => trim($this->input->post('email')),
					'nombre' => trim($this->input->post('nombre')),
					'contrasena' => trim($this->input->post('contrasena')),
					'id_nivelusuario' => trim($this->input->post('id_nivelusuario')),
				);
				var_dump($data);
				$this->Usuarios_model->insert_usuarios($data);
				echo json_encode($data);

				//Update a bitacora
				$tabla = "usuarios";
				$tipo_accion = "Insert";
				$id_name = "id_usuario";
				$this->update_bitacora_in($tabla, $tipo_accion, $id_name);
			} else {
				show_404();
			}
		} else {
			redirect(base_url());
		}
	}

	// funcion para obtener los datos del usuario
	public function datos_editar_usuario()
	{
		if ($this->seguridad() == TRUE) {
			if ($this->input->is_ajax_request()) {

				$id_usuario = $this->input->post('id_usuario');
				$data = $this->Usuarios_model->get_usuarios_by_id($id_usuario);
				echo json_encode($data);
			} else {
				show_404();
			}
		} else {
			redirect(base_url());
		}
	}
	// funcion para la informacion del usuario
	public function editar_usuario()
	{
		if ($this->seguridad() == TRUE) {
			if ($this->input->is_ajax_request()) {
				$id_usuario = $this->input->post('id_usuario');
				$data = array(
					'email' => trim($this->input->post('email')),
					'nombre' => trim($this->input->post('nombre')),
					'id_nivelusuario' => $this->input->post('id_nivelusuario'),
					'contrasena' => $this->input->post('contrasena'),
				);

				$this->Usuarios_model->update_usuarios($data, $id_usuario);
				echo json_encode($data);
				//Update a bitacora
				$tabla = "usuarios";
				$tipo_accion = "Update";
				$this->update_bitacora_up($tabla, $tipo_accion, $id_usuario);
			} else {
				show_404();
			}
		} else {
			redirect(base_url());
		}
	}
	// funcion para eliminar a un usario 
	public function eliminar_usuario()
	{
		if ($this->seguridad() == TRUE) {
			if ($this->input->is_ajax_request()) {

				$id_usuario = $this->input->post('id_usuario');

				$this->Usuarios_model->delete_usuarios($id_usuario);
				//Update a bitacora
				$tabla = "usuarios";
				$tipo_accion = "Update";
				$this->update_bitacora_up($tabla, $tipo_accion, $id_usuario);
			} else {
				show_404();
			}
		} else {
			redirect(base_url());
		}
	}
	// funcion para el cambio de la contraseña del usuario utilizando la contraseña anterior
	public function cambiar_contrasena()
	{
		if ($this->input->is_ajax_request()) {
			$id_usuario = $this->input->post('id_usuario');
			$data = array(
				'contrasena' => $this->input->post('contrasena'),
			);

			$this->Usuarios_model->update_usuarios($data, $id_usuario);
		} else {
			show_404();
		}
	}
	// funcion de seguridad
	public function seguridad()
	{
		if (($this->session->userdata('logueado') == 1) and ($this->session->userdata('nivel') < 4) && ($this->session->userdata('tyc') == 1)) {
			return true;
		} else {
			return false;
		}
	}
	// funcion del mantenimiento de las paginas
	public function mantenimiento()
	{
		$nivel = $this->session->userdata('nivel');
		$consulta_controller = $this->Usuarios_model->get_status_C();
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

	public function update_bitacora_up($tabla, $tipo_accion, $id_tabla)
	{
		//get last in bitacora 
		$id_consulta_bit = $this->Usuarios_model->get_last_id_bit($tabla, $tipo_accion, $id_tabla);
		$id_bit = $id_consulta_bit->id_bit;
		$data_up = array('id_usuario' => $this->session->userdata('id_usuario'),);
		//Hace el update
		$this->Usuarios_model->Update_bit($id_bit, $data_up);
	}

	public function update_bitacora_in($tabla, $tipo_accion, $id_name)
	{
		//Update a bitacora
		$id_consulta_last_tabla = $this->Usuarios_model->last_tabla($tabla, $id_name);
		$id_tabla = $id_consulta_last_tabla->$id_name;
		//get last in bitacora 
		$id_consulta_bit = $this->Usuarios_model->get_last_id_bit($tabla, $tipo_accion, $id_tabla);
		$id_bit = $id_consulta_bit->id_bit;
		$data_up = array('id_usuario' => $this->session->userdata('id_usuario'),);
		//Hace el update
		$this->Usuarios_model->Update_bit($id_bit, $data_up);
	}
}
