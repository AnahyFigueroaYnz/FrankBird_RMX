<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Administrador extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('Administrador_model');
		$this->load->library('versiones');
		$ver = $this->Administrador_model->get_version();
		$this->versiones->set_version($ver);
	}
	// -------------- VISTAS ---------------------

	public function index()
	{
		if ($this->mantenimiento() == FALSE) {
			if ($this->seguridad() == TRUE) {
				$nivel = $this->session->userdata('nivel');
				if ($nivel == 1) { //root
					redirect(base_url() . 'Mantenimiento/DashboardRoot');
				} else if ($nivel == 2) { //admin 
					redirect(base_url() . 'DashboardAdministrador');
				}
			} else {
				redirect(base_url() . 'Home/Ingresar');
			}
		} else {
			$this->load->view('mantenimiento/mantenimiento');
		}
	}

	public function ListaTarifas()
	{
		if ($this->mantenimiento() == FALSE) {
			if ($this->seguridad() == TRUE) {
				$data = array(
					'DATA_DESTINOS' => $this->Administrador_model->get_destinos(),
					'DATA_TCAMBIO' => $this->Administrador_model->get_ultimoTipoCambio(),
				);				
				$this->load->view('headers/header');
				$this->load->view('headers/navBar_plataforma');
				$this->load->view('administrador/cotizador/lista_tarifas', $data);
				$this->load->view('footers/footer_cierre');
				$this->load->view('footers/footer-script');
				$this->load->view('footers/cargar_js');
			} else {
				redirect(base_url());
			}
		} else {
			$this->load->view('mantenimiento/mantenimiento');
		}
	}

	//funciones para la lista de tarifas
		public function get_tarifasAjax()
		{
			if ($this->seguridad() == TRUE) {
				if ($this->input->is_ajax_request()) {

					$data = $this->Administrador_model->get_tarifasAjax();
					echo json_encode($data);
				} else {
					show_404();
				}
			} else {
				redirect(base_url());
			}
		}

		public function get_destinosSelect()
		{
			if ($this->seguridad() == TRUE) {
				if ($this->input->is_ajax_request()) {
					$data = $this->Administrador_model->get_destinos();
					echo json_encode($data);
				} else {
					show_404();
				}
			} else {
				redirect(base_url());
			}
		}

		public function crearTarifa()
		{
			if ($this->seguridad() == TRUE) {
				if ($this->input->is_ajax_request()) {
					$data = array(
						'id_origen' => trim($this->input->post('id_origen')),
						'id_destino' => trim($this->input->post('id_destino')),
						'tarifa_aerea' => trim($this->input->post('tarifa_aerea')),
						'lcl_cbm' => trim($this->input->post('lcl_cbm')),
						'ft20' => trim($this->input->post('ft20')),
						'ft40' => trim($this->input->post('ft40')),
						'hq40' => trim($this->input->post('hq40')),
						'tipo' => trim($this->input->post('tipo')),
						'movimiento' => trim($this->input->post('movimiento')),
					);

					$this->Administrador_model->insertTarifa($data);
					echo json_encode($data);
				} else {
					show_404();
				}
			} else {
				redirect(base_url());
			}
		}

		public function EditarTarifa()
		{
			if ($this->seguridad() == TRUE) {
				if ($this->input->is_ajax_request()) {
					$id_catalogo = $this->input->post('id_catalogo');
					$columna = $this->input->post('columna');
					$valor = trim($this->input->post('valor'));
					if ($columna == "tipo") {
						if ($valor == 1) { 
							//aereo, automaticamente al cambiar el tipo pone los demas elementos en 0
							$data = array(
								$columna => $valor,
								'lcl_cbm' => 0,
								'ft20' => 0,
								'ft40' => 0,
								'hq40' => 0,
							);
						}else{
							$data = array(
								$columna => $valor,
								'tarifa_aerea' => 0,
							);
						}
					}else if ($columna == 'tarifa_aerea') {
						if ($valor == "" || $valor == 0 || $valor == null) {
							//si el valor de la tarifa es nulo o 0 significa que ahora es maritimo por lo que debe cambiar a tipo 2
							$data = array(
								$columna => $valor,
								'tipo' => 2,
							);
						}else{
							//si es diferente de nulo se cambia a aereo
							$data = array(
								$columna => $valor,
								'tipo' => 1,
							);
						}
					} else if($columna == 'lcl_cbm' || $columna == 'ft20' || $columna == 'ft40' || $columna == 'hq40'){
						if ($valor == "" || $valor == 0 || $valor == null) {
							//si el valor de la tarifa es nulo significa que ahora es aereo por lo que debe cambiar a tipo 1
							$tipo = 1;
						}else{
							$tipo = 2;	//si es diferente de nulo se cambia a maritimo
						}
						$data = array(
							$columna => $valor,
							'tipo' => $tipo,
						);
					}else{
						$data = array(
							$columna => $valor,
						);
					}

					$this->Administrador_model->update_Tarifa($data, $id_catalogo);
					echo json_encode($data);
				} else {
					show_404();
				}
			} else {
				redirect(base_url());
			}
		}

		public function eliminar_tarifa()
		{
			if ($this->seguridad() == TRUE) {
				if ($this->input->is_ajax_request()) {
					$id_catalogo = $this->input->post('id_tarifa');
					$data = array(
						'activo' => $this->input->post('activo'),
					);

					$this->Administrador_model->update_Tarifa($data, $id_catalogo);
				} else {
					show_404();
				}
			} else {
				redirect(base_url());
			}
		}
	//

	public function ListaDestinos()
	{
		if ($this->mantenimiento() == FALSE) {
			if ($this->seguridad() == TRUE) {
				$this->load->view('headers/header');
				$this->load->view('headers/navBar_plataforma');
				$this->load->view('administrador/cotizador/lista_destinos');
				$this->load->view('footers/footer_cierre');
				$this->load->view('footers/footer-script');
				$this->load->view('footers/cargar_js');
			} else {
				redirect(base_url());
			}
		} else {
			$this->load->view('mantenimiento/mantenimiento');
		}
	}

	//Funciones correspondientes para Destinos, get, update e insert
		public function get_destinosAjax()
		{
			if ($this->seguridad() == TRUE) {
				if ($this->input->is_ajax_request()) {

					$data = $this->Administrador_model->get_destinosAjax();
					echo json_encode($data);
				} else {
					show_404();
				}
			} else {
				redirect(base_url());
			}
		}

		public function crearDestino()
		{
			if ($this->seguridad() == TRUE) {
				if ($this->input->is_ajax_request()) {
					$data = array(
						'destino' => trim($this->input->post('destino')),
						'tipo' => trim($this->input->post('tipo')),
					);

					$this->Administrador_model->insertDestino($data);
					echo json_encode($data);
				} else {
					show_404();
				}
			} else {
				redirect(base_url());
			}
		}

		public function updateDestinos()
		{
			if ($this->seguridad() == TRUE) {
				if ($this->input->is_ajax_request()) {
					$id_destino = $this->input->post('id_destino');
					$valor = trim($this->input->post('valor'));
					$columna = trim($this->input->post('columna'));
					if ($columna == "Tipo") {
						$data = array(
							'tipo' => $valor,
						);
					}else if ($columna == "Nombre"){
						$data = array(
							'destino' => $valor, );
					}

					$this->Administrador_model->update_Destinos($data, $id_destino);
				} else {
					show_404();
				}
			} else {
				redirect(base_url());
			}
		}

		public function eliminar_destino()
		{
			if ($this->seguridad() == TRUE) {
				if ($this->input->is_ajax_request()) {
					$id_destino = $this->input->post('id_destino');
					$data = array(
						'activo' => $this->input->post('activo'),
					);

					$this->Administrador_model->update_Destinos($data, $id_destino);
				} else {
					show_404();
				}
			} else {
				redirect(base_url());
			}
		}
	//

	public function ListaCotizaciones()
	{
		if ($this->mantenimiento() == FALSE) {
			if ($this->seguridad() == TRUE) {
				$data = array(
					'DATA_COTIZADOR' => $this->Administrador_model->get_cotCotizador(), 
				);
				$this->load->view('headers/header');
				$this->load->view('headers/navBar_plataforma');
				$this->load->view('administrador/cotizador/lista_cotizaciones', $data);
				$this->load->view('footers/footer_cierre');
				$this->load->view('footers/footer-script');
				$this->load->view('footers/cargar_js');
			} else {
				redirect(base_url());
			}
		} else {
			$this->load->view('mantenimiento/mantenimiento');
		}
	}

	public function DetalleCotizacion()
	{
		if ($this->mantenimiento() == FALSE) {
			if ($this->seguridad() == TRUE) {
				$this->load->library('cript');
				$id_cotizador_uri = $this->uri->segment(3);
				$id_cotizador = $this->cript->decrypted_id($id_cotizador_uri);

				$data = array(
					'DETALLE_COTIZADOR' => $this->Administrador_model->getDetalleCotizador($id_cotizador), 
				);
				$this->load->view('headers/header');
				$this->load->view('headers/navBar_plataforma');
				$this->load->view('administrador/cotizador/detalle_cotizacion', $data);
				$this->load->view('footers/footer_cierre');
				$this->load->view('footers/footer-script');
				$this->load->view('footers/cargar_js');
			} else {
				redirect(base_url());
			}
		} else {
			$this->load->view('mantenimiento/mantenimiento');
		}
	}

	public function eliminar_cotCotizador()
	{
		if ($this->seguridad() == TRUE) {
			if ($this->input->is_ajax_request()) {
				$id_cotizador = $this->input->post('id_cotizador');
				$data = array(
					'activo' => $this->input->post('activo'),
				);

				$this->Administrador_model->update_cotizador($data, $id_cotizador);
			} else {
				show_404();
			}
		} else {
			redirect(base_url());
		}
	}

	public function ActualizarTipo()
	{
		if ($this->seguridad() == TRUE) {
			if ($this->input->is_ajax_request()) {
				$getLastCambio = $this->Administrador_model->get_ultimoTipoCambio();
					$id_tipoC = $getLastCambio->id_tipo_c;
				$dataUpdate = array(
					'activo' => 0,
				);
				$this->Administrador_model->updateTipoCambio($id_tipoC, $dataUpdate);

				$data = array(
					'tipo_cambio' => trim($this->input->post('tipoCambio')),
					'fecha_creacion' => trim($this->input->post('fecha_creacion')),
				);
				$this->Administrador_model->InsertTipoCambio($data);
			} else {
				show_404();
			}
		} else {
			redirect(base_url());
		}
	}

	//END vistas para la administración del cotizador de home
	
	// funcion de seguridad
	public function seguridad()
	{
		if (($this->session->userdata('logueado') == 1) && ($this->session->userdata('nivel') <= 2) && ($this->session->userdata('tyc') == 1)) {
			return true;
		} else {
			return false;
		}
	}
	// funcion del mantenimiento
	public function mantenimiento()
	{
		$nivel = $this->session->userdata('nivel');
		$consulta_controller = $this->Administrador_model->get_status_C();
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
