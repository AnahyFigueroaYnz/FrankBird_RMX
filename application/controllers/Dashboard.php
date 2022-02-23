<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Dashboard_model');
	}
	/* Funcion de incio de la informacion general de dashboard */
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
			redirect(base_url() . 'Home');
		}
	}
	/* Funcion para ver el conteo de los proyectos segun el estatus */
	public function AvanceProyectos()
	{
		if ($this->seguridad() == TRUE) {
			if ($this->input->is_ajax_request()) {
				$id_usuario = intval($this->session->userdata('id_usuario'));

				$data = $this->Dashboard_model->AvanceProyectos($id_usuario);
				echo json_encode($data);
			} else {
				show_404();
			}
		} else {
			redirect(base_url() . '/Login');
		}
	}
	/* Funcion para obtener el listado de las tareas  */
	public function taskList()
	{
		if ($this->seguridad() == TRUE) {
			if ($this->input->is_ajax_request()) {
				$id_usuario = $this->session->userdata('id_usuario');

				$data = $this->Dashboard_model->taskList($id_usuario);

				echo json_encode($data);
			} else {
				show_404();
			}
		} else {
			redirect(base_url() . 'Home');
		}
	}
	/* Funcion para obtener el ultimo identificador de la tarea agregada */
	public function taskData()
	{
		if ($this->seguridad() == TRUE) {
			if ($this->input->is_ajax_request()) {
				$id_usuario = $this->session->userdata('id_usuario');

				$data = $this->Dashboard_model->taskData($id_usuario);

				echo json_encode($data);
			} else {
				show_404();
			}
		} else {
			redirect(base_url() . 'Home');
		}
	}
	/* Funcion para agregar una nueva tarea */
	public function taskAdd()
	{
		if ($this->seguridad() == TRUE) {
			if ($this->input->is_ajax_request()) {
				$id_usuario = $this->session->userdata('id_usuario');

				$array = array(
					'id_usuario' => $id_usuario,
					'estatus' => trim($this->input->post('estatus')),
					'task_dash' => trim($this->input->post('task_dash')),
					'fecha_limite' => trim($this->input->post('fecha_limite')),
				);

				$data = $this->Dashboard_model->taskAdd($array);

				json_encode($data);
			} else {
				show_404();
			}
		} else {
			redirect(base_url() . 'Home');
		}
	}
	/* Funcion para editar la informacion de una tarea */
	public function taskEdit()
	{
		if ($this->seguridad() == TRUE) {
			if ($this->input->is_ajax_request()) {
				$id_task_dash = $this->input->post('id_task_dash');

				$array = array(
					'estatus' => trim($this->input->post('estatus')),
					'task_dash' => trim($this->input->post('task_dash')),
					'fecha_limite' => trim($this->input->post('fecha_limite')),
				);

				$data = $this->Dashboard_model->taskUpdate($array, $id_task_dash);

				json_encode($data);
			} else {
				show_404();
			}
		} else {
			redirect(base_url() . 'Home');
		}
	}
	/* Funcion para eliminar una tarea */
	public function taskDelete()
	{
		if ($this->seguridad() == TRUE) {
			if ($this->input->is_ajax_request()) {
				$id_task_dash = $this->input->post('id_task_dash');

				$array = array(
					'activo' => trim($this->input->post('activo')),
				);

				$data = $this->Dashboard_model->taskUpdate($array, $id_task_dash);

				json_encode($data);
			} else {
				show_404();
			}
		} else {
			redirect(base_url() . 'Home');
		}
	}
	/* Funcion para agregar/remover check de las tareas */
	public function taskChekin()
	{
		if ($this->seguridad() == TRUE) {
			if ($this->input->is_ajax_request()) {
				$id_task_dash = $this->input->post('id_task_dash');

				$array = array(
					'estatus' => trim($this->input->post('estatus')),
					'fecha_cambio' => trim($this->input->post('fecha_cambio')),
				);

				$data = $this->Dashboard_model->taskUpdate($array, $id_task_dash);

				json_encode($data);
			} else {
				show_404();
			}
		} else {
			redirect(base_url() . 'Home');
		}
	}
	/* Termino y condiciones */
	public function TerminosCondiciones()
	{
		if ($this->seguridad() == TRUE) {
			$this->load->view('headers/header');
			$this->load->view('plataforma/global/term_cond');
			$this->load->view('footers/footer-script');
		} else {
			redirect(base_url() . 'Home');
		}
	}
	/* Politicas de privacidad */
	public function PoliticasPrivacidad()
	{
		if ($this->seguridad() == TRUE) {
			$this->load->view('headers/header');
			$this->load->view('plataforma/global/politicas_priv');
			$this->load->view('footers/footer-script');
		} else {
			redirect(base_url() . 'Home');
		}
	}
	/* Preguntas frecuentes */
	public function Help()
	{
		if ($this->seguridad() == TRUE) {
			$this->load->view('headers/header');
			$this->load->view('plataforma/global/help');
			$this->load->view('footers/footer');
		} else {
			redirect(base_url() . 'Home');
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