<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Home_model');
        $this->load->model('Dashboard_model');
    }

    public function index()
    {
		if ($this->seguridad() == TRUE) {
			$id_usuario = intval($this->session->userdata('id_usuario'));

			$data = array(
				'Data_Tareas' => $this->Dashboard_model->Data_Tareas($id_usuario),
				'Data_Ganancias' => $this->Dashboard_model->Data_Ganancias($id_usuario),
				'Data_AgenciasAd' => $this->Dashboard_model->Data_AgenciasAd($id_usuario),
				'Data_Proyectos' => $this->Dashboard_model->Data_Proyectos($id_usuario),
				'Data_Productos' => $this->Dashboard_model->Data_Productos($id_usuario),
				'Data_Proveedores' => $this->Dashboard_model->Data_Proveedores($id_usuario),
				'Data_Ultimos_Proyectos' => $this->Dashboard_model->Data_Ultimos_Proyectos($id_usuario),
				'Data_Ultimos_Productos' => $this->Dashboard_model->Data_Ultimos_Productos($id_usuario),
				'Data_Ultimas_Cotizaciones' => $this->Dashboard_model->Data_Ultimas_Cotizaciones($id_usuario),
			);

			$this->load->view('headers/header');
			$this->load->view('dashboard/dashboard', $data);
			$this->load->view('footers/footer');
		} else {
            $this->load->view('home/login');
		}
    }
    /* Funcion para el login */
    public function authenticator()
    {
        if ($this->input->is_ajax_request()) {
            $data = array(
                'usuario' => $this->input->post('email', true),
                'password' => $this->input->post('contrasena', true),
            );

            $query = $this->Home_model->authenticator($data);

            if ($query == false) {
                $data_error = array('autenticacion' => false,);
                echo json_encode($data_error);
            } else {
                foreach ($query->result() as $row) {
                    $id_usuario = $row->id_usuario;
                    $nombre = $row->nombre;
                    $usuario = $row->email;
                    $password = $row->contrasena;
                    $img_path = $row->img_path;
                }
                $newdata = array(
                    'logueado' => TRUE,
                    'nombre' => $nombre,
                    'usuario' => $usuario,
                    'password' => $password,
                    'img_path' => $img_path,
                    'id_usuario' => $id_usuario,
                );

                $this->session->set_userdata($newdata);
                $data_success = array('autenticaction' => true,);
                echo json_encode($data_success);
            }
        } else {
            show_404();
        }
    }
    /* Función para el logout */
    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url());
    }
    /* Obtner la informacion del usuarios */
    public function get_usuario()
    {
        if ($this->input->is_ajax_request()) {
            $email = $this->input->post('email');
            $data = $this->Home_model->get_user($email);
            echo json_encode($data);
        } else {
            show_404();
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
