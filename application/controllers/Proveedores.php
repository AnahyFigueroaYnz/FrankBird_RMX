<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Proveedores extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Proveedores_model');
	}
	/* Listado de los proveedores */
	public function index()
	{
		if ($this->seguridad() == TRUE) {
			$id_usuario = intval($this->session->userdata('id_usuario'));
			$data = array(
				'Data_ladas' => $this->Proveedores_model->Data_ladas(),
				'Data_medidas' => $this->Proveedores_model->Data_medidas(),
				'Data_Proveedores' => $this->Proveedores_model->Data_Proveedores($id_usuario),
			);
			$this->load->view('headers/header');
			$this->load->view('proveedores/proveedores', $data);
			$this->load->view('footers/footer');
		} else {
			redirect(base_url() . 'dashboard');
		}
	}

	/* Detallado de proveedor, sus productos y puentos de partida de envio */
	public function Detalle()
	{
		if ($this->seguridad() == TRUE) {
			$this->load->view('headers/header');
			$this->load->view('proveedores/proveedores-detalle');
			$this->load->view('footers/footer');
		} else {
			redirect(base_url() . 'dashboard');
		}
	}


	/* Funcion obtener listado de los proveedores */
	public function Data_Proveedores()
	{
		if ($this->seguridad() == TRUE) {
			if ($this->input->is_ajax_request()) {
				$id_usuario = intval($this->session->userdata('id_usuario'));
				$data = $this->Proveedores_model->Data_Proveedores($id_usuario);
				echo json_encode($data);
			} else {
				show_404();
			}
		} else {
			redirect(base_url());
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
