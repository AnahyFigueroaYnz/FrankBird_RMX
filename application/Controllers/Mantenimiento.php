<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mantenimiento extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('Mantenimiento_model');

		$this->load->library('versiones');
		$ver = $this->Mantenimiento_model->get_version();
		$this->versiones->set_version($ver);
	}

	public function DashboardRoot()
	{
		if ($this->seguridad() == TRUE) {
			$data = array(
				'data_controladores' => $this->Mantenimiento_model->get_controladores(),
			);
			// var_dump($data);
			$this->load->view('headers/header');
			$this->load->view('headers/navBar_plataforma');
			$this->load->view('plataforma/dashboardRoot', $data);
			$this->load->view('footers/footer_cierre');
			$this->load->view('footers/footer-script');
			$this->load->view('footers/cargar_js');
		} else {
			redirect(base_url() . 'Home/Ingresar');
		}
	}

	// funcion para obtener los estatus de los controladores
	public function get_estatus()
	{
		if ($this->seguridad() == TRUE) {
			if ($this->input->is_ajax_request()) {
				$data = $this->Mantenimiento_model->get_estatus();
				echo json_encode($data);
			} else {
				show_404();
			}
		} else {
			redirect(base_url());
		}
	}

	public function cambio_status_all()
	{
		if ($this->seguridad() == TRUE) {
			if ($this->input->is_ajax_request()) {
				$activo = $this->input->post('activo');

				$controladores = $this->Mantenimiento_model->get_controladores();

				foreach ($controladores->result() as $row) {
					$id_controlador = $row->id_controlador;
					$data = array('activo' => $activo,);

					$this->Mantenimiento_model->update_controlador($data, $id_controlador);
						//Update a bitacora
							$tabla = "controladores"; $tipo_accion = "Update";
							$this->update_bitacora_up($tabla, $tipo_accion, $id_controlador);
				}
			} else {
				show_404();
			}
		} else {
			redirect(base_url());
		}
	}

	public function cambio_status_oxo()
	{
		if ($this->seguridad() == TRUE) {
			if ($this->input->is_ajax_request()) {
				$activo = $this->input->post('activo');
				$id_controlador = $this->input->post('id_controlador');

				$data = array('activo' => $activo,);

				$this->Mantenimiento_model->update_controlador($data, $id_controlador);
					//Update a bitacora
						$tabla = "controladores"; $tipo_accion = "Update";
						$this->update_bitacora_up($tabla, $tipo_accion, $id_controlador);
			} else {
				show_404();
			}
		} else {
			redirect(base_url());
		}
	}

	public function cambio_version()
	{
		if ($this->seguridad() == TRUE) {
			if ($this->input->is_ajax_request()) {
				//cambia el status del ultimo a 0
				//consigue el id
				$consulta_id = $this->Mantenimiento_model->get_last_activ();
				$id_version = $consulta_id->id_version;
				$data_cambio = array('activo' => 0,);
				//hace el cambio
				$this->Mantenimiento_model->update_last($id_version, $data_cambio);
					//Update a bitacora
						$tabla = "versiones_js"; $tipo_accion = "Update";
						$this->update_bitacora_up($tabla, $tipo_accion, $id_version);

				//obtiene la informacion nueva
				$data = array(
					'version' => $this->input->post('version'),
					'fecha' => date("Y-m-d")
				);

				//inserta la informacion
				$this->Mantenimiento_model->insert_nueva_version($data);
					//Update a bitacora
						$tipo_accion2 = "Insert"; $id_name = "id_version";
						$this->update_bitacora_in($tabla, $tipo_accion2, $id_name);
			} else {
				show_404();
			}
		} else {
			redirect(base_url());
		}
	}

	public function seguridad()
	{
		if (($this->session->userdata('logueado') == 1) && ($this->session->userdata('nivel') == 1) && ($this->session->userdata('tyc') == 1)) {
			return true;
		} else {
			return false;
		}
	}

	public function update_bitacora_up($tabla, $tipo_accion, $id_tabla)
	{
		//get last in bitacora 
			$id_consulta_bit = $this->Mantenimiento_model->get_last_id_bit($tabla, $tipo_accion, $id_tabla);
				$id_bit = $id_consulta_bit->id_bit;
			$data_up =array('id_usuario' => $this->session->userdata('id_usuario'),);
		//Hace el update
			$this->Mantenimiento_model->Update_bit($id_bit, $data_up);
	}

	public function update_bitacora_in($tabla, $tipo_accion, $id_name)
	{
		//Update a bitacora
			$id_consulta_last_tabla =$this->Mantenimiento_model->last_tabla($tabla, $id_name);
				$id_tabla = $id_consulta_last_tabla->$id_name;
		//get last in bitacora 
			$id_consulta_bit = $this->Mantenimiento_model->get_last_id_bit($tabla, $tipo_accion, $id_tabla);
				$id_bit = $id_consulta_bit->id_bit;
			$data_up =array('id_usuario' => $this->session->userdata('id_usuario'),);
		//Hace el update
			$this->Mantenimiento_model->Update_bit($id_bit, $data_up);
	}
}
