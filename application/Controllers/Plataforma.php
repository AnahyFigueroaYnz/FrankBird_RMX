<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Plataforma extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Plataforma_model');
	}

	public function index()
	{
		if ($this->seguridad() == TRUE) {
			redirect(base_url() . 'Dashboard');
		} else {
		 	redirect(base_url() . 'Login');
		}
	}	
	
	// estatus de proyectos del admin
	public function statusProyecto()
	{
		if ($this->seguridad() == TRUE) {
			if ($this->input->is_ajax_request()) {
				$id_usuario = $this->session->userdata('id_usuario');
				$data = $this->Plataforma_model->noProyectos($id_usuario);
				echo json_encode($data);
			} else {
				show_404();
			}
		} else {
			redirect(base_url() . 'Login');
		}
	}
	// estatus de proyectos del asesor
	public function statusProyectoAsesor()
	{
		if ($this->seguridad() == TRUE) {
			if ($this->input->is_ajax_request()) {
				$id_usuario = $this->session->userdata('id_usuario');
				$data = $this->Plataforma_model->noMyProyectos($id_usuario);
				echo json_encode($data);
			} else {
				show_404();
			}
		} else {
			redirect(base_url() . 'Login');
		}
	}

	/*	VISTA TODOS LOS PROYECTOS ADMIN */
	public function Proyectos()
	{
		if ($this->seguridad() == TRUE) {
			$id_usuario = $this->session->userdata('id_usuario');
			$data = array(
				'DATA_TODOSPROYECTOS' => $this->Plataforma_model->get_allproyectos($id_usuario),
				//'DATA_ASESORES' => $this->Plataforma_model->get_asesores(),
				'DATA_STATUS' => $this->Plataforma_model->get_status(),
			);
			$this->load->view('headers/header');
			$this->load->view('plataforma/administrador/todos_proyectos', $data);
			$this->load->view('footers/cargar_js');
			$this->load->view('footers/footer');

		} else {
			redirect(base_url() . 'Login');
		}
	}
	/*	VISTA TODOS LOS PROYECTOS ACTIVOS ADMIN */
	public function Proyectos_activos()
	{
		if ($this->seguridad() == TRUE) {
			$id_usuario = $this->session->userdata('id_usuario');
			$data = array(
				'DATA_TODOSPROYECTOS' => $this->Plataforma_model->get_allactivos($id_usuario),
				'DATA_STATUS' => $this->Plataforma_model->get_status(),
			);

			$this->load->view('headers/header');
			$this->load->view('plataforma/administrador/proyectos_activos', $data);
			$this->load->view('footers/cargar_js');
			$this->load->view('footers/footer');

		} else {
			redirect(base_url() . 'Login');
		}
	}
	/*	VISTA TODOS LOS PROYECTOS CONCLUIODOS ADMIN */
	public function Proyectos_concluidos()
	{
		if ($this->seguridad() == TRUE) {
			$id_usuario = $this->session->userdata('id_usuario');
			$data = array(
				'DATA_TODOSPROYECTOS' => $this->Plataforma_model->get_allconcluidos($id_usuario),
				'DATA_STATUS' => $this->Plataforma_model->get_status(),
			);

			$this->load->view('headers/header');
			$this->load->view('plataforma/administrador/proyectos_concluidos', $data);
			$this->load->view('footers/cargar_js');
			$this->load->view('footers/footer');

		} else {
			redirect(base_url() . 'Login');
		}
	}
	/*	VISTA TODOS LOS PROYECTOS ELIMINADOS ADMIN */
	public function Proyectos_eliminados()
	{
		if ($this->seguridad() == TRUE && $this->session->userdata('nivel') <= 2) {
			$data = array(
				'DATA_TODOSPROYECTOS' => $this->Plataforma_model->get_alleliminados(),
				'DATA_ASESORES' => $this->Plataforma_model->get_asesores(),
				'DATA_STATUS' => $this->Plataforma_model->get_status(),
			);

			$this->load->view('headers/header');
			$this->load->view('plataforma/administrador/proyectos_eliminados', $data);
			$this->load->view('footers/cargar_js');
			$this->load->view('footers/footer');

		} else {
			redirect(base_url() . 'Login');
		}
	}

	/*	VISTA DETALLE PROYECTOS AD Y AS*/
	public function DetalleProyectos()
	{
		if ($this->seguridad() == TRUE) {
			$this->load->library('cript');
			$id_proyecto_uri = $this->uri->segment(3);
			$id_proyecto = $this->cript->decrypted_id($id_proyecto_uri);
			$id_usuario = $this->session->userdata('id_usuario');

			$data = array(
				'DATA_ASESORES' => $this->Plataforma_model->get_asesores(),
				'Data_Puertos_Salida' => $this->Plataforma_model->puertos_salida(),
				'Data_Agencias' => $this->Plataforma_model->agencias_aduanales($id_usuario),
				'Data_Proveedores' => $this->Plataforma_model->get_proveedores($id_usuario),
				'Data_Puertos_Llegada' => $this->Plataforma_model->puertos_llegada(),
				'Data_Proyecto' => $this->Plataforma_model->get_all_data_proyecto($id_proyecto),
				'Data_Productos_C' => $this->Plataforma_model->get_productos_c($id_proyecto),
				'Data_Productos_SP_C' => FALSE,//$this->Plataforma_model->get_productos_sp_c($id_proyecto),
				'DATA_STATUS' => $this->Plataforma_model->get_status(),
				'Data_Poyecto_Edit' => $this->Plataforma_model->get_proyecto_edit($id_proyecto),
				'data_unidades' => $this->Plataforma_model->get_unidades(),
				'Data_sourcing' => $this->Plataforma_model->get_sourcing($id_proyecto),
				'Data_production' => $this->Plataforma_model->get_production($id_proyecto),
				'Data_freight' => $this->Plataforma_model->get_freight($id_proyecto),
				'Data_customs' => $this->Plataforma_model->get_customs($id_proyecto),
				'Data_quoted' => $this->Plataforma_model->get_quoted($id_proyecto),
				'Data_done' => $this->Plataforma_model->get_done($id_proyecto),
				'Data_Cotizacion' => $this->Plataforma_model->detalleCotizacion($id_proyecto),
				'Data_ProdCotiza' => $this->Plataforma_model->productosCot($id_proyecto),
				'Data_MedProdCot' => $this->Plataforma_model->mediProdCot($id_proyecto),
				'Data_cot_acep' => $this->Plataforma_model->detalleCotAceptada($id_proyecto),
				'Data_productos_cot' => $this->Plataforma_model->prodCotAcep($id_proyecto),
				'Data_medi_prod_cot' => $this->Plataforma_model->mediProdCotAcep($id_proyecto),
				'Data_prov_cliente' => $this->Plataforma_model->provCotCliente($id_proyecto),
				'Data_tipo_documentos' => $this->Plataforma_model->get_tipo_documentos(),
				'comprobar_coordenadas' => $this->Plataforma_model->comprobar_coordenadas($id_proyecto),
				'DATA_LADAS' => $this->Plataforma_model->get_ladas(),
				'data_get_pdfCotizacion' => $this->Plataforma_model->get_pdfCotizacion($id_proyecto),
				'Data_ShipsGo' => 'af8ee0a00fdb427cbf3d8b09352c2b0f',
			);

			$this->load->view('headers/header');
			$this->load->view('plataforma/asesor/proyectos/detalle', $data);
			$this->load->view('footers/cargar_js');
			$this->load->view('footers/footer');
		} else {
			redirect(base_url() . 'Login');
		}
	}

	public function actualizar_rastreo()
	{
		if ($this->seguridad() == TRUE) {
			if ($this->input->is_ajax_request()) {
				$id_proyecto = $this->input->post('id_proyecto');

				$data = array(
					'etd' => trim($this->input->post('etd')),
					'eta' => trim($this->input->post('eta')),
					'buque' => trim($this->input->post('buque')),
					'no_viaje' => trim($this->input->post('no_viaje')),
				);

				$this->Plataforma_model->update_proyecto($data, $id_proyecto);
				echo json_encode($data);
			} else {
				show_404();
			}
		} else {
			redirect(base_url() . 'Login');
		}
	}

	public function actualizar_proyecto()
	{
		if ($this->seguridad() == TRUE) {
			if ($this->input->is_ajax_request()) {
				$id_proyecto = $this->input->post('id_proyecto');

				if ($this->input->post('id_asesor') == NULL) {
					$data = array(
						'id_proyecto' => trim($this->input->post('id_proyecto')),
						'id_estadoproyectos' => trim($this->input->post('id_estadoproyecto')),
						'Nombre_proyecto' => trim($this->input->post('nomProyecto')),
						'num_bl' => trim($this->input->post('numBl')),
						'etd' => trim($this->input->post('salida')),
						'eta' => trim($this->input->post('llegada')),
						'fracc_arancelaria' => trim($this->input->post('fracAran')),
						'restricciones' => trim($this->input->post('restic')),
						'buque' => trim($this->input->post('buque')),
						'no_viaje' => trim($this->input->post('viaje')),
					);
				} else {
					$data = array(
						'id_proyecto' => trim($this->input->post('id_proyecto')),
						'id_estadoproyectos' => trim($this->input->post('id_estadoproyecto')),
						'Nombre_proyecto' => trim($this->input->post('nomProyecto')),
						'num_bl' => trim($this->input->post('numBl')),
						'etd' => trim($this->input->post('salida')),
						'eta' => trim($this->input->post('llegada')),
						'fracc_arancelaria' => trim($this->input->post('fracAran')),
						'restricciones' => trim($this->input->post('restic')),
						'buque' => trim($this->input->post('buque')),
						'no_viaje' => trim($this->input->post('viaje')),
						'id_asesor' => trim($this->input->post('id_asesor')),
					);
				}

				$this->Plataforma_model->update_proyecto($data, $id_proyecto);
				echo json_encode($data);
			} else {
				show_404();
			}
		} else {
			redirect(base_url() . 'Login');
		}
	}

	public function finalizar_proyecto()
	{
		if ($this->seguridad() == TRUE) {
			if ($this->input->is_ajax_request()) {
				$id_proyecto = $this->input->post('id_proyecto');
				$data = array(
					'activo' => trim($this->input->post('activo')),
				);
				$this->Plataforma_model->update_proyecto($data, $id_proyecto);
				echo json_encode($data);
			} else {
				show_404();
			}
		} else {
			redirect(base_url() . 'Login');
		}
	}

	public function Busqueda_productos()
	{
		if ($this->seguridad() == TRUE) {
			$id_usuario = $this->session->userdata('id_usuario');
			$data = array(
				'Data_todos_productos' => $this->Plataforma_model->get_all_productos($id_usuario),
			);
			$this->load->view('headers/header');
			$this->load->view('plataforma/search_all_products', $data);
			$this->load->view('footers/footer');

		} else {
			redirect(base_url() . 'Login');
		}
	}

	public function sourcing_task()
	{
		if ($this->seguridad() == TRUE) {
			if ($this->input->is_ajax_request()) {
				$id_sourcing = trim($this->input->post('id_sourcing'));
				$data = $this->Plataforma_model->task_sourcing($id_sourcing);
				echo json_encode($data);
			} else {
				show_404();
			}
		} else {
			redirect(base_url() . 'Login');
		}
	}

	public function actualizar_bl()
	{
		if ($this->seguridad() == TRUE) {
			if ($this->input->is_ajax_request()) {
				$id_proyecto = $this->input->post('id_proyecto');

				$data_bl = array(
					'num_bl' =>  trim($this->input->post('num_bl')),
				);

				$this->Plataforma_model->update_proyecto($data_bl, $id_proyecto);
				echo json_encode($data_bl);
			} else {
				show_404();
			}
		} else {
			redirect(base_url() . 'Login');
		}
	}

	public function production_task()
	{
		if ($this->seguridad() == TRUE) {
			if ($this->input->is_ajax_request()) {
				$id_production = trim($this->input->post('id_production'));
				$data = $this->Plataforma_model->task_production($id_production);
				echo json_encode($data);
			} else {
				show_404();
			}
		} else {
			redirect(base_url() . 'Login');
		}
	}

	public function freight_task()
	{
		if ($this->seguridad() == TRUE) {
			if ($this->input->is_ajax_request()) {
				$id_freight = trim($this->input->post('id_freight'));
				$data = $this->Plataforma_model->task_freight($id_freight);
				echo json_encode($data);
			} else {
				show_404();
			}
		} else {
			redirect(base_url() . 'Login');
		}
	}

	/*		VISTA LISTA AGENCIAS ADUANALES 	AD Y AS		*/

	public function agencias_aduanales()
	{
		if ($this->seguridad() == TRUE) {
			$id_usuario = $this->session->userdata('id_usuario');
			$data = array(
				'Data_agencias_aduanales' => $this->Plataforma_model->agencias_aduanales($id_usuario),
				'DATA_LADAS' => $this->Plataforma_model->get_ladas(),
			);
			$this->load->view('headers/header');
			$this->load->view('plataforma/agencias_aduanales', $data);
			$this->load->view('footers/cargar_js');
			$this->load->view('footers/footer');

		} else {
			redirect(base_url() . 'Login');
		}
	}

	public function DetalleAgenciaAduanal()
	{
		if ($this->seguridad() == TRUE) {
			$id_agencia = $this->uri->segment(3);
			$data = array(
				'Data_detalle_agencia' => $this->Plataforma_model->get_detalle_agencias_aduanales($id_agencia),
				'Data_puertos' => $this->Plataforma_model->get_puertos($id_agencia),
				'DATA_LADAS' => $this->Plataforma_model->get_ladas(),
				'Data_agentes' => $this->Plataforma_model->get_agentes($id_agencia),
			);
			$this->load->view('headers/header');
			$this->load->view('plataforma/detalleAgencia', $data);
			$this->load->view('footers/cargar_js');
			$this->load->view('footers/footer');
		} else {
			redirect(base_url() . 'Login');
		}
	}

	public function add_transporte()
	{
		if ($this->seguridad() == TRUE) {
			if ($this->input->is_ajax_request()) {

				$data = array(
					'id_agencia' => trim($this->input->post('id_agencia')),
					'transporte' => trim($this->input->post('transporte')),
					'clave' => trim($this->input->post('clave')),
				);
				$this->Plataforma_model->insert_transporte($data);
				echo json_encode($data);
			} else {
				show_404();
			}
		} else {
			redirect(base_url() . 'Login');
		}
	}

	public function datos_transporte()
	{
		if ($this->seguridad() == TRUE) {
			if ($this->input->is_ajax_request()) {
				$id_agencia = trim($this->input->post('id_agencia'));
				$data = $this->Plataforma_model->transportes($id_agencia);
				echo json_encode($data);
			} else {
				show_404();
			}
		} else {
			redirect(base_url() . 'Login');
		}
	}

	public function ver_datos_editar_transporte()
	{
		if ($this->seguridad() == TRUE) {
			if ($this->input->is_ajax_request()) {

				$id_transporte = $this->input->post('id_transporte');
				$data = $this->Plataforma_model->get_datos_transporte($id_transporte);
				echo json_encode($data);
			} else {
				show_404();
			}
		} else {
			redirect(base_url() . 'Login');
		}
	}

	public function editar_transporte()
	{
		if ($this->seguridad() == TRUE) {
			if ($this->input->is_ajax_request()) {
				$id_transporte = $this->input->post('id_transporte');
				$data = array(
					'transporte' => trim($this->input->post('transporte')),
					'clave' => trim($this->input->post('clave')),
				);

				$this->Plataforma_model->update_transporte($data, $id_transporte);
				echo json_encode($data);
			} else {
				show_404();
			}
		} else {
			redirect(base_url() . 'Login');
		}
	}

	public function eliminar_transporte()
	{
		if ($this->seguridad() == TRUE) {
			if ($this->input->is_ajax_request()) {
				$id_transporte = $this->input->post('id_transporte');
				$data = array(
					'activo' => 0,
				);

				$this->Plataforma_model->update_transporte($data, $id_transporte);
				echo json_encode($data);
			} else {
				show_404();
			}
		} else {
			redirect(base_url() . 'Login');
		}
	}

	public function crear_aa()
	{
		if ($this->seguridad() == TRUE) {
			if ($this->input->is_ajax_request()) {
				$data = array(
					'agencia' => trim($this->input->post('agencia')),
					'agente' => trim($this->input->post('agente')),
					'email' => trim($this->input->post('email')),
					'id_lada' => trim($this->input->post('id_lada')),
					'telefono' => trim($this->input->post('telefono')),
					'honorarios' => trim($this->input->post('honorarios')),
					'revalidacion' => trim($this->input->post('revalidacion')),
					'complementarios' => trim($this->input->post('complementarios')),
					'previo' => trim($this->input->post('previo')),
					'maniobras_puerto' => trim($this->input->post('maniobras_puerto')),
					'desconsolidacion' => trim($this->input->post('desconsolidacion')),
				);
				var_dump($data);
				$this->Plataforma_model->insert_aa($data);
				echo json_encode($data);
			} else {
				show_404();
			}
		} else {
			redirect(base_url() . 'Login');
		}
	}

	public function editar_aa()
	{
		if ($this->seguridad() == TRUE) {
			if ($this->input->is_ajax_request()) {
				$id_agencia = $this->input->post('id_agencia');
				$data = array(
					'agencia' => trim($this->input->post('agencia')),
					'agente' => trim($this->input->post('agente')),
					'email' => trim($this->input->post('email')),
					'id_lada' => trim($this->input->post('id_lada')),
					'telefono' => trim($this->input->post('telefono')),
					'honorarios' => trim($this->input->post('honorarios')),
					'revalidacion' => trim($this->input->post('revalidacion')),
					'complementarios' => trim($this->input->post('complementarios')),
					'previo' => trim($this->input->post('previo')),
					'maniobras_puerto' => trim($this->input->post('maniobras_puerto')),
					'desconsolidacion' => trim($this->input->post('desconsolidacion')),
				);


				$this->Plataforma_model->update_aa($data, $id_agencia);
				echo json_encode($data);
			} else {
				show_404();
			}
		} else {
			redirect(base_url() . 'Login');
		}
	}

	public function eliminar_agencia()
	{
		if ($this->seguridad() == TRUE) {
			if ($this->input->is_ajax_request()) {
				$id_agencia = $this->input->post('id_agencia');
				$data = array(
					'activo' => 0,
				);
				$this->Plataforma_model->update_aa($data, $id_agencia);
				echo json_encode($data);
			} else {
				show_404();
			}
		} else {
			redirect(base_url() . 'Login');
		}
	}

	/*	VISTA PROVEEDORES AD Y AS */
	public function Proveedores()
	{
		if ($this->seguridad() == TRUE) {
			$id_usuario = $this->session->userdata('id_usuario');
			$data = array(
				'data_proveedores_asesor' => $this->Plataforma_model->get_proveedores($id_usuario),
				'DATA_LADAS' => $this->Plataforma_model->get_ladas(),
			);
			$this->load->view('headers/header');
			$this->load->view('plataforma/proveedores', $data);
			$this->load->view('footers/cargar_js');
			$this->load->view('footers/footer');
		} else {
			redirect(base_url() . 'Login');
		}
	}

	public function get_proveedores()
	{
		if ($this->seguridad() == TRUE) {
			if ($this->input->is_ajax_request()) {
				$data = $this->Plataforma_model->get_proveedoresCot();
				echo json_encode($data);
			} else {
				show_404();
			}
		} else {
			redirect(base_url() . 'Login');
		}
	}


	public function crear_proveedor()
	{
		if ($this->seguridad() == TRUE) {
			if ($this->input->is_ajax_request()) {
				$data = array(
					'proveedor' => trim($this->input->post('proveedor')),
					'contacto' => trim($this->input->post('contacto')),
					'email' => trim($this->input->post('email')),
					'id_lada' => trim($this->input->post('id_lada')),
					'telefono' => trim($this->input->post('telefono')),
					'direccion' => trim($this->input->post('direccion')),
					'wechat' => trim($this->input->post('wechat')),
					'website' => trim($this->input->post('website')),
				);


				$this->Plataforma_model->insert_prov($data);
				echo json_encode($data);
			} else {
				show_404();
			}
		} else {
			redirect(base_url() . 'Login');
		}
	}
	public function crear_proveedor_cotiza()
	{
		if ($this->seguridad() == TRUE) {
			if ($this->input->is_ajax_request()) {
				$data = array(
					'proveedor' => trim($this->input->post('proveedor')),
					'contacto' => trim($this->input->post('contacto')),
					'email' => trim($this->input->post('email')),
					'telefono' => trim($this->input->post('telefono')),
				);

				$this->Plataforma_model->insert_prov($data);
				echo json_encode($data);
			} else {
				show_404();
			}
		} else {
			redirect(base_url() . 'Login');
		}
	}
	public function ultimo_prov()
	{
		if ($this->seguridad() == TRUE) {
			if ($this->input->is_ajax_request()) {

				$data = $this->Plataforma_model->get_last_prov();
				echo json_encode($data);
			} else {
				show_404();
			}
		} else {
			redirect(base_url() . 'Login');
		}
	}

	public function ultimo_prod()
	{
		if ($this->seguridad() == TRUE) {
			if ($this->input->is_ajax_request()) {
				$id_proveedor = $this->input->post('id_proveedor');
				$data = $this->Plataforma_model->ultimo_prod($id_proveedor);
				echo json_encode($data);
			} else {
				show_404();
			}
		} else {
			redirect(base_url() . 'Login');
		}
	}

	public function eliminar_prov()
	{
		if ($this->seguridad() == TRUE) {
			if ($this->input->is_ajax_request()) {
				$id_proveedor = $this->input->post('id_proveedor');
				$data = array(
					'activo' => 0,
				);
				$this->Plataforma_model->update_prov($data, $id_proveedor);
				echo json_encode($data);
			} else {
				show_404();
			}
		} else {
			redirect(base_url() . 'Login');
		}
	}

	public function detalleProveedor()
	{
		if ($this->seguridad() == TRUE) {
			$id_proveedor = $this->uri->segment(3);
			$data = array(
				'Data_detalle_proveedor' => $this->Plataforma_model->get_detalle_prov($id_proveedor),
				'Data_productos_prov' => $this->Plataforma_model->get_prod_proveedor($id_proveedor),
				'DATA_LADAS' => $this->Plataforma_model->get_ladas(),
			);
			$this->load->view('headers/header');
			$this->load->view('plataforma/detalleProveedores', $data);
			$this->load->view('footers/cargar_js');
			$this->load->view('footers/footer');
		} else {
			redirect(base_url() . 'Login');
		}
	}
	// mari no
	public function get_datos_proveedor()
	{
		if ($this->seguridad() == TRUE) {
			if ($this->input->is_ajax_request()) {

				$id_proveedor = $this->input->post('id_proveedor');
				$data = $this->Plataforma_model->get_proveedor($id_proveedor);

				echo json_encode($data);
			} else {
				show_404();
			}
		} else {
			redirect(base_url() . 'Login');
		}
	}
	// 
	public function editar_proveedor()
	{
		if ($this->seguridad() == TRUE) {
			if ($this->input->is_ajax_request()) {
				$id_proveedor = $this->input->post('id_proveedor');
				$data = array(
					'proveedor' => trim($this->input->post('proveedor')),
					'contacto' => trim($this->input->post('contacto')),
					'email' => trim($this->input->post('email')),
					'id_lada' => trim($this->input->post('id_lada')),
					'telefono' => trim($this->input->post('telefono')),
					'direccion' => trim($this->input->post('direccion')),
					'wechat' => trim($this->input->post('wechat')),
					'website' => trim($this->input->post('website')),
				);
				$this->Plataforma_model->update_prov($data, $id_proveedor);
				echo json_encode($data);
			} else {
				show_404();
			}
		} else {
			redirect(base_url() . 'Login');
		}
	}
	public function get_proveedores_tabla()
	{
		if ($this->seguridad() == TRUE) {
			if ($this->input->is_ajax_request()) {

				$data = $this->Plataforma_model->get_proveedores_cot();
				echo json_encode($data);
			} else {
				show_404();
			}
		} else {
			redirect(base_url() . 'Login');
		}
	}

	public function crear_producto()
	{
		if ($this->seguridad() == TRUE) {
			if ($this->input->is_ajax_request()) {
				$data = array(
					'id_proveedor' => trim($this->input->post('id_proveedor')),
					'producto' => trim($this->input->post('producto')),
					'fracc_arancelaria' => trim($this->input->post('fracc_arancelaria')),
				);

				$this->Plataforma_model->insert_prod($data);
				echo json_encode($data);
			} else {
				show_404();
			}
		} else {
			redirect(base_url() . 'Login');
		}
	}

	public function ver_datos_editar_producto()
	{
		if ($this->seguridad() == TRUE) {
			if ($this->input->is_ajax_request()) {

				$id_producto = $this->input->post('id_producto');
				$data = $this->Plataforma_model->get_datos_producto_prov($id_producto);

				echo json_encode($data);
			} else {
				show_404();
			}
		} else {
			redirect(base_url() . 'Login');
		}
	}

	public function editar_producto()
	{
		if ($this->seguridad() == TRUE) {
			if ($this->input->is_ajax_request()) {
				$id_producto = $this->input->post('id_producto');
				$data = array(
					'producto' => trim($this->input->post('producto')),
					'fracc_arancelaria' => trim($this->input->post('fracc_arancelaria')),
				);

				$this->Plataforma_model->update_producto($data, $id_producto);
				echo json_encode($data);
			} else {
				show_404();
			}
		} else {
			redirect(base_url() . 'Login');
		}
	}

	public function eliminar_prod_prov()
	{
		if ($this->seguridad() == TRUE) {
			if ($this->input->is_ajax_request()) {
				$id_producto = $this->input->post('id_producto');
				$data = array(
					'activo' => 0,
				);
				$this->Plataforma_model->update_producto($data, $id_producto);
				echo json_encode($data);
			} else {
				show_404();
			}
		} else {
			redirect(base_url() . 'Login');
		}
	}

	//trae los datos del proyecto para editar
	public function ver_datos_editar_proyecto()
	{
		if ($this->seguridad() == TRUE) {
			if ($this->input->is_ajax_request()) {

				$id_proyecto = $this->input->post('id_proyecto');
				$data = $this->Plataforma_model->get_pb($id_proyecto);
				echo json_encode($data);
			} else {
				show_404();
			}
		} else {
			redirect(base_url() . 'Login');
		}
	}

	public function media_proyecto()
	{
		if ($this->seguridad() == TRUE) {
			if ($this->input->is_ajax_request()) {
				$id_proyecto = $this->input->post('id_proyecto');
				$data = $this->Plataforma_model->media_proyecto($id_proyecto);
				echo json_encode($data);
			} else {
				show_404();
			}
		} else {
			redirect(base_url() . 'Login');
		}
	}

	public function media_invoice()
	{
		if ($this->seguridad() == TRUE) {
			if ($this->input->is_ajax_request()) {
				$id_proyecto = $this->input->post('id_proyecto');
				$data = $this->Plataforma_model->media_invoice($id_proyecto);
				echo json_encode($data);
			} else {
				show_404();
			}
		} else {
			redirect(base_url() . 'Login');
		}
	}

	public function media_invoice_prod()
	{
		if ($this->seguridad() == TRUE) {
			if ($this->input->is_ajax_request()) {
				$id_producto_c = $this->input->post('id_producto_c');
				$data = $this->Plataforma_model->media_invoice_prod($id_producto_c);
				echo json_encode($data);
			} else {
				show_404();
			}
		} else {
			redirect(base_url() . 'Login');
		}
	}

	public function media_producto_sp()
	{
		if ($this->seguridad() == TRUE) {
			if ($this->input->is_ajax_request()) {
				$id_proyecto = $this->input->post('id_proyecto');
				$data = $this->Plataforma_model->media_producto_sp($id_proyecto);
				echo json_encode($data);
			} else {
				show_404();
			}
		} else {
			redirect(base_url() . 'Login');
		}
	}

	public function media_producto_cp_prod()
	{
		if ($this->seguridad() == TRUE) {
			if ($this->input->is_ajax_request()) {
				$id_producto_c = $this->input->post('id_producto_c');
				$data = $this->Plataforma_model->media_producto_cp_prod($id_producto_c);
				echo json_encode($data);
			} else {
				show_404();
			}
		} else {
			redirect(base_url() . 'Login');
		}
	}

	public function media_producto_sp_prod()
	{
		if ($this->seguridad() == TRUE) {
			if ($this->input->is_ajax_request()) {
				$id_producto_sp_c = $this->input->post('id_producto_sp_c');
				$data = $this->Plataforma_model->media_producto_sp_prod($id_producto_sp_c);
				echo json_encode($data);
			} else {
				show_404();
			}
		} else {
			redirect(base_url() . 'Login');
		}
	}

	public function asignar_asesor_proyecto()
	{
		if ($this->seguridad() == TRUE) {
			if ($this->input->is_ajax_request()) {
				$id_proyecto = $this->input->post('id_proyecto');
				$id_estadoproyecto = $this->input->post('id_estadoproyecto');
				if ($id_estadoproyecto == null) {
					//echo "id_estadoproyecto vacio";
					$data = array(
						'Nombre_proyecto' => trim($this->input->post('Nombre_proyecto')),
					);
				} else {
					//echo "id_estadoproyecto no vacio";
					$data = array(
						'Nombre_proyecto' => trim($this->input->post('Nombre_proyecto')),
						'id_estadoproyectos' => trim($this->input->post('id_estadoproyecto')),
					);
				}

				
				$this->Plataforma_model->update_proyecto($data, $id_proyecto);
				echo json_encode($data);
			} else {
				show_404();
			}
		} else {
			redirect(base_url() . 'Login');
		}
	}

	public function datos_agencia()
	{
		if ($this->seguridad() == TRUE) {
			if ($this->input->is_ajax_request()) {

				$id_agencia = $this->input->post('id_agencia');
				$data = array(
					'Data_Agencia' => $this->Plataforma_model->get_agencia($id_agencia),
					'Data_Puertos' => $this->Plataforma_model->puertos_agencia($id_agencia),
				);
				echo json_encode($data);
			} else {
				show_404();
			}
		} else {
			redirect(base_url() . 'Login');
		}
	}

	public function datos_agencias()
	{
		if ($this->seguridad() == TRUE) {
			if ($this->input->is_ajax_request()) {

				$id_agencia = $this->input->post('id_agencia');
				$data = $this->Plataforma_model->get_agencia($id_agencia);
				echo json_encode($data);
			} else {
				show_404();
			}
		} else {
			redirect(base_url() . 'Login');
		}
	}

	public function productos_proveedores()
	{
		if ($this->seguridad() == TRUE) {
			if ($this->input->is_ajax_request()) {

				$id_proveedor = $this->input->post('id_proveedor');
				$data = array(
					'Data_Producto' => $this->Plataforma_model->productos_prov($id_proveedor),
				);
				echo json_encode($data);
			} else {
				show_404();
			}
		} else {
			redirect(base_url() . 'Login');
		}
	}

	public function cotizacion()
	{
		if ($this->input->is_ajax_request()) {
			$cotizacion = $this->input->post('cotizacion');
			$Listproductos = $this->input->post('Listproductos');
			$IdProyecto = $cotizacion['id_proyecto'];

			// sacar el folio
			$data_folio = $this->Plataforma_model->ultimo_folio();
			// contador para general el folio e ir incrementando
			if ($data_folio != FALSE) {
				foreach ($data_folio->result() as $row) {
					$Folio = $row->folio + 1;
				}
			} else {
				$Folio = 1;
			}
			//

			$data_Cotizacion = array(
				'folio' => $Folio,
				'nombre_cot' =>	$cotizacion['nombreCotiza'],
				'tiempo_entrega' => $cotizacion['tiempo_entrega'],
				'suma' => $cotizacion['totalCot'],
				'id_puertoSalida' => $cotizacion['puertoSalida'],
				'id_puertoLlegada' => $cotizacion['puertoLlegada'],
				'flete_internacional' => $cotizacion['inter'],
				'flete_nacional' => $cotizacion['nacio'],
				'otros' => $cotizacion['otros'],
				'dta' =>  $cotizacion['dta'],
				'arancel' => $cotizacion['aranc'],
				'arancel_porc' => $cotizacion['arancel_porc'],
				'honorarios' => $cotizacion['honor'],
				'id_proyecto' => $cotizacion['id_proyecto'],
				'iva' => $cotizacion['iva'],
				'dolar' => $cotizacion['dolar'],
				'id_agencia' => $cotizacion['id_agencia'],
				'valor_mercancia' => $cotizacion['valor_mercancia'],
				'honorarios_c' => $cotizacion['honorarios_c'],
				'revalicacion_c' => $cotizacion['revalicacion_c'],
				'complementarios_c' => $cotizacion['complementario_c'],
				'previo_c' => $cotizacion['previo_c'],
				'maniobras_c' => $cotizacion['maniobras_c'],
				'desconsolidacion_c' => $cotizacion['desconsolidacion_c'],
			);
			//INSERTAR COTIZACION 
			$this->Plataforma_model->agregar_cotizacion($data_Cotizacion);

			// Traer Id de cotizacion agregada
			$IdCotizacion_Row = $this->Plataforma_model->ultimo_IdCotizacion($IdProyecto);
			$IdCotizacion = $IdCotizacion_Row->id_cotizacion;

			if (is_array($Listproductos)) {
				foreach ($Listproductos as $Producto) {
					$data_Producto = array(
						'id_cotizacion' => $IdCotizacion,
						'id_proveedor' => $Producto["id_proveedor"],
						'id_unidad_md' => $Producto['id_unidad_md'],
						'producto' => $Producto["producto"],
						'cantidad' => $Producto["cantidad"],
						'precio' => $Producto["precio"],
						'total' => $Producto["total"],
						'especificaciones' => $Producto["especificaciones"],
					);

					//insert productos
					$this->Plataforma_model->agregar_producto($data_Producto);

					// utlimo producto insertado
					$IdProdCotiza_Row = $this->Plataforma_model->ultimo_IdProdCotiza($IdCotizacion);
					// convertir valor obtenido en entero
					$IdProdCotiza = $IdProdCotiza_Row->id_producto_cot;

					// recorrido de cada imagen agregada al arreglo
					foreach ($Producto["path"] as $paths) {

						// identificar si el producto y la informacion 
						// de arreglo de las imagenes si coinciden
						if ($Producto["count"] === $paths['id_prod']) {
							$data_ImgProdCot = array(
								'id_producto_cot' => $IdProdCotiza,
								'path_prod_cot' => $paths['path_name'],
							);

							// insertar en media productos cotización
							$this->Plataforma_model->agregar_media_producto($data_ImgProdCot);
						}
					}
				}
			}
		} else {
			show_404();
		}
	}

	public function cotizacion_imagenes()
	{
		$imgs_obj = json_decode($_POST['imgs']);
		$IdProyecto = $_POST['idProyeco'];

		foreach ($imgs_obj as $img) {
			$id = $img->id;
			$ruta_carpeta  = $img->ruta;

			//validar ruta existe
			if (!file_exists($ruta_carpeta)) {
				mkdir($ruta_carpeta, 0777) or die("No se puede crear el directorio de extracci&oacute;n");
			}

			//obtenemos el path que debe tener actualmente en la bd
			$pathtmp = $img->path_name;

			// Traer Id de cotizacion agregada
			$IdCotizacion_Row = $this->Plataforma_model->ultimo_IdCotizacion($IdProyecto);
			$IdCotizacion = $IdCotizacion_Row->id_cotizacion;

			// Traer Id de la media de cotizacion
			$IdMediaProdCot_Row = $this->Plataforma_model->ultimo_IdImaCot($pathtmp);
			$IdMediaProdCot = $IdMediaProdCot_Row->id_media_prod_cot;

			// Nombre nuevo del path
			$nuevo_nombre = $IdMediaProdCot . '_' . $IdCotizacion . '_producto_cot';

			// enviar imagen a la carpeta
			$nombre_archivo = $nuevo_nombre . "." . pathinfo($_FILES[$id]["name"], PATHINFO_EXTENSION);
			$ruta_guardar_archivo = $ruta_carpeta . $nombre_archivo;

			if (move_uploaded_file($_FILES[$id]["tmp_name"], $ruta_guardar_archivo)) {
				echo "imagen cargada";
				// actualizar path en la BD
				$data_ImgProdCot = array('path_prod_cot' => $ruta_guardar_archivo,);
				$this->Plataforma_model->update_media_producto($data_ImgProdCot, $IdMediaProdCot);
			} else {
				echo "imagen no cargada";
			}
		}
	}
	// 
	public function datos_productos_proveedor()
	{
		if ($this->seguridad() == TRUE) {
			if ($this->input->is_ajax_request()) {

				$id_proveedor = $this->input->post('id_proveedor');
				$data = $this->Plataforma_model->get_producto_proveedore($id_proveedor);
				echo json_encode($data);
			} else {
				show_404();
			}
		} else {
			redirect(base_url() . 'Login');
		}
	}

	public function nombreProducto()
	{
		if ($this->seguridad() == TRUE) {
			if ($this->input->is_ajax_request()) {

				$id_producto = $this->input->post('id_producto');
				$data = $this->Plataforma_model->get_nombreProducto($id_producto);
				echo json_encode($data);
			} else {
				show_404();
			}
		} else {
			redirect(base_url() . 'Login');
		}
	}

	public function proveedor_cliente()
	{
		if ($this->seguridad() == TRUE) {
			if ($this->input->is_ajax_request()) {
				$id_cotizacion = $this->input->post('id_cotizacion');
				$data = $this->Plataforma_model->provCliente($id_cotizacion);
				echo json_encode($data);
			} else {
				show_404();
			}
		} else {
			redirect(base_url() . 'Login');
		}
	}

	public function datos_productos_cotizacion()
	{
		if ($this->seguridad() == TRUE) {
			if ($this->input->is_ajax_request()) {

				$id_cotizacion = $this->input->post('id_cotizacion');
				$data = $this->Plataforma_model->get_producto_cotizacion($id_cotizacion);
				echo json_encode($data);
			} else {
				show_404();
			}
		} else {
			redirect(base_url() . 'Login');
		}
	}

	public function get_proyecto_info()
	{
		if ($this->seguridad() == TRUE) {
			if ($this->input->is_ajax_request()) {
				$id_proyecto = $this->input->post('id_proyecto');
				$data = $this->Plataforma_model->get_proyecto_info($id_proyecto);
				echo json_encode($data);
			} else {
				show_404();
			}
		} else {
			redirect(base_url() . 'Login');
		}
	}

	public function get_proveedor_c()
	{
		if ($this->seguridad() == TRUE) {
			if ($this->input->is_ajax_request()) {
				$id_proyecto = $this->input->post('id_proyecto');
				$data = $this->Plataforma_model->get_proveedor_c($id_proyecto);
				echo json_encode($data);
			} else {
				show_404();
			}
		} else {
			redirect(base_url() . 'Login');
		}
	}

	public function get_productos_cotizacion()
	{
		if ($this->seguridad() == TRUE) {
			if ($this->input->is_ajax_request()) {
				$id_producto_cot = $this->input->post('id_producto_cot');
				$data = $this->Plataforma_model->get_productos_cotizacion($id_producto_cot);
				echo json_encode($data);
			} else {
				show_404();
			}
		} else {
			redirect(base_url() . 'Login');
		}
	}

	public function last_media_productos_cotizacion()
	{
		if ($this->seguridad() == TRUE) {
			if ($this->input->is_ajax_request()) {
				$id_producto_cot = $this->input->post('id_producto_cot');
				$data = $this->Plataforma_model->last_media_productos_cotizacion($id_producto_cot);
				echo json_encode($data);
			} else {
				show_404();
			}
		} else {
			redirect(base_url() . 'Login');
		}
	}

	public function media_productos_cotizacion()
	{
		if ($this->seguridad() == TRUE) {
			if ($this->input->is_ajax_request()) {
				$id_producto_cot = $this->input->post('id_producto_cot');
				$data = $this->Plataforma_model->media_productos_cotizacion($id_producto_cot);
				echo json_encode($data);
			} else {
				show_404();
			}
		} else {
			redirect(base_url() . 'Login');
		}
	}

	public function update_status_cotizacion()
	{
		if ($this->seguridad() == TRUE) {
			if ($this->input->is_ajax_request()) {
				$id_cotizacion = trim($this->input->post('id_cotizacion'));
				// echo trim($this->input->post('id_cotizacion'));
				$data = array(
					'activo' => trim($this->input->post('activo')),
				);
				$this->Plataforma_model->update_cotizacion($data, $id_cotizacion);

				$date = new DateTime();
				$fecha = $date->format('Y/m/d');

				//encuentra el proyecto con el id_cotizacion
				$data_referencia = $this->Plataforma_model->get_id_referencia($id_cotizacion);
				$id_proyecto = $data_referencia->id_proyecto;
				$id_agencia = $data_referencia->id_agencia;

				//encuentra el pb con el id encontrado y el id asesor
				$data_get_pb = $this->Plataforma_model->get_pb($id_proyecto);
				$id_pb = $data_get_pb->id_proyecto;
				$id_asesor = $data_get_pb->id_asesor;

				//Comprobacion para envio de correo a cliente
				if (trim($this->input->post('activo')) == 2) {
					//Actualiza el id_estadoproyectos del proyecto
					$data_status = array('id_estadoproyectos' => 2,);
					$this->Plataforma_model->update_proyecto($data_status, $id_proyecto);

					//Obtiene el id usuario con la consulta anterior
					$id_usuario = $data_get_pb->id_cliente;

					//get informacion para el envio del correo cliente
					$data_usuario_c = $this->Plataforma_model->get_data_user($id_usuario);
					$nombre = $data_usuario_c->nombre;
					$email_to = $data_usuario_c->email;

					//obtiene el correo del asesor
					$data_usu_asesor = $this->Plataforma_model->get_data_user($id_asesor);
					$email_from = $data_usu_asesor->email;


					$this->load->library('mail');
					$email_subject = "Cotizacion recibida";

					$headers = '
						<meta charset="UTF-8">
					    <meta content="width=device-width, initial-scale=1" name="viewport">
					    <meta name="x-apple-disable-message-reformatting">
					    <meta http-equiv="X-UA-Compatible" content="IE=edge">
					    <meta content="telephone=no" name="format-detection">';

					$mensaje = '
						<div class="es-wrapper-color">
                            <table class="es-wrapper" width="100%" cellspacing="0" cellpadding="0">
                                <tbody>
                                    <tr>
                                        <td class="esd-email-paddings" valign="top">
                                            <table cellpadding="0" cellspacing="0" class="esd-footer-popover es-content" align="center">
                                                <tbody>
                                                    <tr>
                                                        <td class="esd-stripe" align="center">
                                                            <table bgcolor="#ffffff" class="es-content-body" align="center" cellpadding="0" cellspacing="0" width="600">
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="esd-structure es-p20t es-p20r es-p20l" align="left">
                                                                            <table width="100%" cellspacing="0" cellpadding="0">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td class="es-m-p0r esd-container-frame" width="560" valign="top" align="center">
                                                                                            <table width="100%" cellspacing="0" cellpadding="0">
                                                                                                <tbody>
                                                                                                    <tr>
                                                                                                        <td align="center" class="esd-block-image es-p20b" style="font-size: 0px;"><a target="_blank"><img class="adapt-img" src="https://www.reachmx.com/img/logo.png" alt style="display: block;" width="246"></a></td>
                                                                                                    </tr>
                                                                                                </tbody>
                                                                                            </table>
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="esd-structure es-p20t es-p20r es-p20l" align="left" bgcolor="#333333" style="background-color: #333333;">
                                                                            <table cellpadding="0" cellspacing="0" width="100%">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td width="560" class="esd-container-frame" align="center" valign="top">
                                                                                            <table cellpadding="0" cellspacing="0" width="100%">
                                                                                                <tbody>
                                                                                                    <tr>
                                                                                                        <td align="left" class="esd-block-text">
                                                                                                            <p style="font-size: 21px; color: #ffffff; line-height: 150%;"><br></p>
                                                                                                            <p style="color: #ffffff; line-height: 150%; font-size: 21px; text-align: center;"><strong><span style="font-size: 24px; font-family: helvetica, \'helvetica neue\', arial, verdana, sans-serif; line-height: 150%;">Estimado ' . $nombre . '</span></strong></p>
                                                                                                            <p style="color: #ffffff; line-height: 150%; text-align: center; font-size: 24px; font-family: helvetica, \'helvetica neue\', arial, verdana, sans-serif;"><br>El equipo&nbsp;ReachMX le informa que ha mandado una cotizacion a su pedido, puede revisarla en la plataforma<br><br></p>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td align="center" style="padding:0;Margin:0;padding-top:10px;padding-bottom:20px;"><span class="es-button-border" style="border-style:solid;border-color:#26A4D3;background:none 0% 0% repeat scroll #26A4D3;border-width:0px;display:inline-block;border-radius:50px;width:auto;"><a href="https://reachmx.com" class="es-button" target="_blank" style="mso-style-priority:100 !important;text-decoration:none;transition:all 100ms ease-in;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, \'helvetica neue\', helvetica, sans-serif;font-size:14px;color:#FFFFFF;border-style:solid;border-color:#26A4D3;border-width:15px 30px 15px 30px;display:inline-block;background:#26A4D3 none repeat scroll 0% 0%;border-radius:50px;font-weight:bold;font-style:normal;line-height:17px;width:auto;text-align:center;">Entrar</a></span></td>
                                                                                                    </tr>
                                                                                                </tbody>
                                                                                            </table>
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="esd-structure es-p20t es-p20r es-p20l" align="left" bgcolor="#3d85c6" style="background-color: #3d85c6; background-image: url(https://www.reachmx.com/resources/banners/banner_11.png); background-repeat: no-repeat; background-position: center top;" background="https://www.reachmx.com/resources/banners/banner_11.png">
                                                                            <table cellpadding="0" cellspacing="0" width="100%">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td width="560" class="esd-container-frame" align="center" valign="top">
                                                                                            <table cellpadding="0" cellspacing="0" width="100%">
                                                                                                <tbody>
                                                                                                    <tr>
                                                                                                        <td align="center" class="esd-block-text">
                                                                                                            <p style="line-height: 200%; color: #ffffff; font-size: 20px;"><strong>Tú éxito es lo que más importa<br>#Tech&Trade</strong></p>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                </tbody>
                                                                                            </table>
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>';

					//$this->mail->enviar_correo($email_from, $email_subject, $mensaje, $headers, $email_to);


				} else if (trim($this->input->post('activo')) == 3) {
					//Actualiza el id_estadoproyectos del proyecto
					$data_status = array('id_estadoproyectos' => 4,);
					$this->Plataforma_model->update_proyecto($data_status, $id_proyecto);
				} else if (trim($this->input->post('activo')) == 4) {
					//Actualiza el id_estadoproyectos del proyecto
					$data_status = array('id_estadoproyectos' => 3,);
					$this->Plataforma_model->update_proyecto($data_status, $id_proyecto);
				} else if (trim($this->input->post('activo')) == 5) {
					//Actualiza el id_estadoproyectos del proyecto
					$data_status = array('id_estadoproyectos' => 1,);
					$this->Plataforma_model->update_proyecto($data_status, $id_proyecto);
				}
			} else {
				show_404();
			}
		} else {
			redirect(base_url() . 'Login');
		}
	}
	// funcion para obtener media del producto con proveedor del pedido
	public function mediaPedidoP()
	{
		if ($this->seguridad() == TRUE) {
			if ($this->input->is_ajax_request()) {
				$id_producto_c = $this->input->post('id_producto_c');
				$data = $this->Plataforma_model->mediaPedidoP($id_producto_c);
				echo json_encode($data);
			} else {
				show_404();
			}
		} else {
			redirect(base_url() . 'Login');
		}
	}
	// funcion para obtener media del producto sin proveedor del pedido
	public function mediaPedidoSP()
	{
		if ($this->seguridad() == TRUE) {
			if ($this->input->is_ajax_request()) {
				$id_producto_sp_c = $this->input->post('id_producto_sp_c');
				$data = $this->Plataforma_model->mediaPedidoSP($id_producto_sp_c);
				echo json_encode($data);
			} else {
				show_404();
			}
		} else {
			redirect(base_url() . 'Login');
		}
	}
	// funcion para obtener media de la perzonalizacion del producto del pedido
	public function mediaPedidoOEM()
	{
		if ($this->seguridad() == TRUE) {
			if ($this->input->is_ajax_request()) {
				$id_proyecto = $this->input->post('id_proyecto');
				$data = $this->Plataforma_model->mediaPedidoOEM($id_proyecto);
				echo json_encode($data);
			} else {
				show_404();
			}
		} else {
			redirect(base_url() . 'Login');
		}
	}
	// funcion para obtenr la media del producto de la cotizacion
	public function mediaProdCot()
	{
		if ($this->seguridad() == TRUE) {
			if ($this->input->is_ajax_request()) {
				$id_producto_cot = $this->input->post('id_producto_cot');
				$data = $this->Plataforma_model->mediaProdCot($id_producto_cot);
				echo json_encode($data);
			} else {
				show_404();
			}
		} else {
			redirect(base_url() . 'Login');
		}
	}

	public function editar_perfil()
	{
		if ($this->seguridad() == TRUE) {
			if ($this->input->is_ajax_request()) {
				$id_usuario = trim($this->input->post('id_usuario'));
				$lada = filter_var(trim($this->input->post('lada')), FILTER_SANITIZE_NUMBER_INT);
				$telefono = trim($this->input->post('telefono'));

				if ($lada === "0") {
					$lada = null;
				}
				if ($telefono === "") {
					$telefono = null;
				}

				$data = array(
					'nombre' => filter_var(trim($this->input->post('nombre')), FILTER_SANITIZE_STRING),
					'email' => filter_var(trim($this->input->post('email')), FILTER_VALIDATE_EMAIL, FILTER_FLAG_STRIP_HIGH),
					'id_lada' => $lada,
					'telefono' => $telefono,
				);

				$this->Plataforma_model->update_perfil($data, $id_usuario);
				echo json_encode($data);
			} else {
				show_404();
			}
		} else {
			redirect(base_url() . 'Login');
		}
	}

	public function checkSourcing()
	{
		if ($this->seguridad() == TRUE) {
			if ($this->input->is_ajax_request()) {
				$idSourcing = $this->input->post('id_sourcing');
				$dataSourcing = array(
					'estatus' => trim($this->input->post('estatus')),
					'fecha_cambio' => trim($this->input->post('fecha_cambio')),
					'comentario' => trim($this->input->post('comentario')),
				);
				$this->Plataforma_model->updateSourcing($dataSourcing, $idSourcing);
				echo json_encode($dataSourcing);
			} else {
				show_404();
			}
		} else {
			redirect(base_url() . 'Login');
		}
	}

	public function checkProduction()
	{
		if ($this->seguridad() == TRUE) {
			if ($this->input->is_ajax_request()) {
				$idProduction = $this->input->post('id_production');
				$dataProduction = array(
					'estatus' => trim($this->input->post('estatus')),
					'fecha_cambio' => trim($this->input->post('fecha_cambio')),
					'comentario' => trim($this->input->post('comentario')),
				);
				$this->Plataforma_model->updateProduction($dataProduction, $idProduction);
				echo json_encode($dataProduction);
			} else {
				show_404();
			}
		} else {
			redirect(base_url() . 'Login');
		}
	}

	public function checkFreight()
	{
		if ($this->seguridad() == TRUE) {
			if ($this->input->is_ajax_request()) {
				$idFreight = $this->input->post('id_freight');
				$dataFreight = array(
					'estatus' => trim($this->input->post('estatus')),
					'fecha_cambio' => trim($this->input->post('fecha_cambio')),
					'comentario' => trim($this->input->post('comentario')),
				);
				$this->Plataforma_model->updateFreight($dataFreight, $idFreight);
				echo json_encode($dataFreight);
			} else {
				show_404();
			}
		} else {
			redirect(base_url() . 'Login');
		}
	}

	public function checkCustoms()
	{
		if ($this->seguridad() == TRUE) {
			if ($this->input->is_ajax_request()) {
				$idCustoms = $this->input->post('id_customs');
				$dataCustoms = array(
					'estatus' => trim($this->input->post('estatus')),
					'fecha_cambio' => trim($this->input->post('fecha_cambio')),
					'comentario' => trim($this->input->post('comentario')),
				);
				$this->Plataforma_model->updateCustoms($dataCustoms, $idCustoms);
				echo json_encode($dataCustoms);
			} else {
				show_404();
			}
		} else {
			redirect(base_url() . 'Login');
		}
	}

	public function checkQuoted()
	{
		if ($this->seguridad() == TRUE) {
			if ($this->input->is_ajax_request()) {
				$idQuoted = $this->input->post('id_quoted');
				$dataQuoted = array(
					'estatus' => trim($this->input->post('estatus')),
					'fecha_cambio' => trim($this->input->post('fecha_cambio')),
					'comentario' => trim($this->input->post('comentario')),
				);
				$this->Plataforma_model->updateQuoted($dataQuoted, $idQuoted);
				echo json_encode($dataQuoted);
			} else {
				show_404();
			}
		} else {
			redirect(base_url() . 'Login');
		}
	}

	public function checkDone()
	{
		if ($this->seguridad() == TRUE) {
			if ($this->input->is_ajax_request()) {
				$idDone = $this->input->post('id_done');
				$dataDone = array(
					'estatus' => trim($this->input->post('estatus')),
					'fecha_cambio' => trim($this->input->post('fecha_cambio')),
					'comentario' => trim($this->input->post('comentario')),
				);
				$this->Plataforma_model->updateDonde($dataDone, $idDone);
				echo json_encode($dataDone);
			} else {
				show_404();
			}
		} else {
			redirect(base_url() . 'Login');
		}
	}

	public function get_tipos_documentos()
	{
		if ($this->seguridad() == TRUE) {
			if ($this->input->is_ajax_request()) {
				$data = $this->Plataforma_model->get_tipos_documentos();
				echo json_encode($data);
			} else {
				show_404();
			}
		} else {
			redirect(base_url() . 'Login');
		}
	}

	public function get_id_documento()
	{
		if ($this->seguridad() == TRUE) {
			if ($this->input->is_ajax_request()) {
				$id_proyecto = trim($this->input->post('id_proyecto'));
				$id_tipo_doc = trim($this->input->post('id_tipo_doc'));
				$data = $this->Plataforma_model->get_id_documento($id_proyecto, $id_tipo_doc);
				echo json_encode($data);
			} else {
				show_404();
			}
		} else {
			redirect(base_url() . 'Login');
		}
	}

	public function update_documento()
	{
		if ($this->seguridad() == TRUE) {
			if ($this->input->is_ajax_request()) {
				$id_documento = $this->input->post('id_documento');
				$data = array(
					'activo' => trim($this->input->post('activo')),
				);
				$this->Plataforma_model->update_documento($data, $id_documento);
				echo json_encode($data);

				$path = $this->input->post('archivo_path'); //obtencion del path
				unlink($path); //eliminacion del archivo
			} else {
				show_404();
			}
		} else {
			redirect(base_url() . 'Login');
		}
	}

	public function insert_documento()
	{
		if ($this->seguridad() == TRUE) {
			if ($this->input->is_ajax_request()) {
				$data = array(
					'id_tipo_doc' => trim($this->input->post('id_tipo_doc')),
					'id_proyecto' => trim($this->input->post('id_proyecto')),
					'nombre_documento' => trim($this->input->post('nombre_documento')),
					'archivo_path' => trim($this->input->post('archivo_path')),
					'activo' => trim($this->input->post('activo')),
				);

				$this->Plataforma_model->insert_documento($data);
				echo json_encode($data);
			} else {
				show_404();
			}
		} else {
			redirect(base_url() . 'Login');
		}
	}

	public function get_documento()
	{
		if ($this->seguridad() == TRUE) {
			if ($this->input->is_ajax_request()) {
				$id_proyecto = trim($this->input->post('id_proyecto'));
				$id_tipo_doc = trim($this->input->post('id_tipo_doc'));
				$data = $this->Plataforma_model->get_documento($id_proyecto, $id_tipo_doc);
				echo json_encode($data);
			} else {
				show_404();
			}
		} else {
			redirect(base_url() . 'Login');
		}
	}

	public function get_documentos()
	{
		if ($this->seguridad() == TRUE) {
			if ($this->input->is_ajax_request()) {
				$id_proyecto = trim($this->input->post('id_proyecto'));
				$data = $this->Plataforma_model->get_documentos($id_proyecto);
				echo json_encode($data);
			} else {
				show_404();
			}
		} else {
			redirect(base_url() . 'Login');
		}
	}

	public function enviar_doc()
	{
		//Desglose de datos
		$id_tipo_doc = $_POST['id_tipo_doc'];
		$nombre_archivoget = $_POST['nombre_archivo'];
		$id_proyecto = $_POST['id_proyecto'];

		//creacion de data para insert
		$data = array(
			'id_proyecto' => $id_proyecto,
			'nombre_documento' => $nombre_archivoget,
			'id_tipo_doc' => $id_tipo_doc,
		);

		//comprobacion para update
		$id_doc_consulta1 = $this->Plataforma_model->last_id_doc($id_proyecto, $id_tipo_doc);
		$id_doc_res_consulta = $id_doc_consulta1->id_documento;
		$id_tipo_doc_res_consulta = $id_doc_consulta1->id_tipo_doc;

		if ($id_doc_res_consulta == NULL) {
			//insert datos documento
			$this->Plataforma_model->insert_documento($data);
		} else {
			$datacambio = array('activo' => 0,);
			//cambiar el status de activo a 0
			$this->Plataforma_model->update_documento($datacambio, $id_doc_res_consulta);

			$this->Plataforma_model->insert_documento($data);
		}

		//Consulta para obtener el ultimo id_documento que ha insertado 
		$id_doc_consulta = 	$this->Plataforma_model->last_id_doc($id_proyecto, $id_tipo_doc);
		//Toma el valor del arreglo y lo convierte en int
		//variable obtenida/columna de consulta
		$id_doc = $id_doc_consulta->id_documento;

		$ruta_carpeta = "files/documentos/";

		//validar ruta existe
		if (!file_exists($ruta_carpeta)) {
			mkdir($ruta_carpeta, 0777) or die("No se puede crear el directorio de extracci&oacute;n");
		}

		$nombre_archivo = $id_doc . '_' . $nombre_archivoget . "." . pathinfo($_FILES["input-imgProducto"]["name"], PATHINFO_EXTENSION);
		$ruta_guardar_archivo = $ruta_carpeta . $nombre_archivo;


		if (move_uploaded_file($_FILES["input-imgProducto"]["tmp_name"], $ruta_guardar_archivo)) {
			echo "imagen cargada";
			$data2 = array(
				'nombre_documento' => $nombre_archivo,
				'archivo_path' => $ruta_guardar_archivo,
			);
			$this->Plataforma_model->update_documento($data2, $id_doc);
		} else {
			echo "imagen no cargada";
		}
	}

	public function subir_evidencia()
	{
		//Desglose de datos
		$id_done = $_POST['id'];
		$ruta_carpeta = "files/evidencia/";

		//validar ruta existe
		if (!file_exists($ruta_carpeta)) {
			mkdir($ruta_carpeta, 0777) or die("No se puede crear el directorio de extracci&oacute;n");
		}

		$nombre_archivo = $id_done . '_evidencia_done.' . pathinfo($_FILES["imagen"]["name"], PATHINFO_EXTENSION);
		$ruta_guardar_archivo = $ruta_carpeta . $nombre_archivo;

		if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $ruta_guardar_archivo)) {
			echo "imagen cargada";
			$data = array(
				'comentario' => $ruta_guardar_archivo,
			);
			$this->Plataforma_model->updateDonde($data, $id_done);
		} else {
			echo "imagen no cargada";
		}
	}

	public function get_evidencia()
	{
		if ($this->seguridad() == TRUE) {
			if ($this->input->is_ajax_request()) {
				$id_done = $this->input->post('id_done');
				$data = $this->Plataforma_model->get_evidencia($id_done);
				echo json_encode($data);
			} else {
				show_404();
			}
		} else {
			redirect(base_url() . 'Login');
		}
	}

	public function enviar_img_perfil()
	{
		//Desglose de datos
		$id_usuario = $_POST['id_usuario'];
		$ruta_carpeta = "files/usuarios/";
		$validacion_subida = false;
		//

		//eliminar imagen anterior
		$consultar_pathAnterior = $this->Plataforma_model->get_data_user($id_usuario);
		$path_previo = $consultar_pathAnterior->img_path;
		if ($path_previo != NULL) {
			unlink($path_previo);
		}
		//

		//comprueba la cantidad de extensiones
		$var = explode(".", $_FILES['imagen']['name']);
		$longitud = count($var);
		//

		//comprueba que sea tipo imagen
		if ($_FILES['imagen']['type'] == "image/png" || $_FILES['imagen']['type'] == "image/jpg" || $_FILES['imagen']['type'] == "image/jpeg") {

			//comprobacion real de tipo, que no sea php o texto
			$file = $_FILES["imagen"];
			$finfo = finfo_open(FILEINFO_MIME_TYPE);
			if (finfo_file($finfo, $file["tmp_name"]) == "text/x-php" || finfo_file($finfo, $file["tmp_name"]) ==  "text/plain") {
				$validacion_subida = false;
			} else {
				$validacion_subida = true;
			}
			finfo_close($finfo);
			//
		}
		//si solo es el nombre y una extencion y no es un php se sube
		if ($longitud === 2 && $validacion_subida === true) {
			//validar ruta existe
			if (!file_exists($ruta_carpeta)) {
				mkdir($ruta_carpeta, 0777) or die("No se puede crear el directorio de extracci&oacute;n");
			}

			//reasignacion de nombre
			$nombre_archivo = $id_usuario . "_img_perfil." . pathinfo($_FILES["imagen"]["name"], PATHINFO_EXTENSION);
			$ruta_guardar_archivo = $ruta_carpeta . $nombre_archivo;

			if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $ruta_guardar_archivo)) {

				$data2 = array(
					'img_path' => $ruta_guardar_archivo,
				);

				//get data
				$getdata = $this->Plataforma_model->get_data_user($id_usuario);
				$usuario = $getdata->email;
				$nombre = $getdata->nombre;
				$password = $getdata->contrasena;
				$nivel = $getdata->id_nivelusuario;

				$newdata = array(
					'id_usuario' => $id_usuario,
					'usuario' => $usuario,
					'nombre' => $nombre,
					'password' => $password,
					'nivel' => $nivel,
					'img_path' => $ruta_guardar_archivo,
					'logueado' => TRUE,
				);

				$this->session->set_userdata($newdata);

				$this->Plataforma_model->update_perfil($data2, $id_usuario);
				echo json_encode($data2);
			} else {
				$dt = array(
					'status' => 'false',
					'info' => 'carga',
				);
				echo json_encode($dt);
			}
		} else {
			$dt = array(
				'status' => 'false',
				'info' => 'extension',
			);
			echo json_encode($dt);
		}
	}

	public function correo_cambioStatus()
	{
		if ($this->seguridad() == TRUE) {
			if ($this->input->is_ajax_request()) {
				//Post de info
				$status = trim($this->input->post('status'));
				$id_proyecto = trim($this->input->post('id_proyecto'));

				//consigue el nombre del status 
				$data_status = $this->Plataforma_model->get_status_correo($status);
				$estado = $data_status->estado;

				//consigue el email y nombre del cliente
				$data_correo =  $this->Plataforma_model->get_correo_cliente($id_proyecto);
				$email_to = $data_correo->email;
				$nombre = $data_correo->nombre;

				$data_asesor =  $this->Plataforma_model->get_correo_asesor($id_proyecto);
				$email_from = $data_asesor->email;

				//Declaracion de avriables para enviar
				$email_subject = "Aviso cambio status";
				$mensaje = '
				<div class="es-wrapper-color">
		          <table class="es-wrapper" width="100%" cellspacing="0" cellpadding="0">
		            <tbody>
		              <tr>
		                <td class="esd-email-paddings st-br" valign="top">
		                 <table cellpadding="0" cellspacing="0" class="es-header" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;background-color:transparent;background-repeat:repeat;background-position:center top;"> 
		                   <tr style="border-collapse:collapse;"> 
		                    <td align="center" style="padding:0;Margin:0;"> 
		                     <table class="es-header-body" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#FFFFFF;" width="600" cellspacing="0" cellpadding="0" bgcolor="#ffffff" align="center"> 
		                       <tr style="border-collapse:collapse;"> 
		                        <td style="Margin:0;padding-top:30px;padding-bottom:30px;padding-left:40px;padding-right:40px;background-color:transparent;" bgcolor="transparent" align="left"> 
		                         <table cellspacing="0" cellpadding="0" width="100%" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;"> 
		                           <tr style="border-collapse:collapse;"> 
		                            <td width="520" valign="top" align="center" style="padding:0;Margin:0;"> 
		                             <table width="100%" cellspacing="0" cellpadding="0" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;"> 
		                               <tr style="border-collapse:collapse;"> 
		                                <td align="center" style="padding:0;Margin:0;font-size:0px;">
		                                  <a href="https://www.reachmx.com" target="_blank" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:helvetica, \'helvetica neue\', arial, verdana, sans-serif;font-size:14px;text-decoration:underline;color:#FFFFFF;"><img src="https://zftph.stripocdn.email/content/guids/CABINET_2e2d355826f27dab527a7542223ace13/images/11861586991901546.png" alt style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic;" width="200" class="adapt-img"></a>
		                                </td> 
		                               </tr> 
		                             </table>
		                            </td> 
		                           </tr> 
		                         </table>
		                        </td> 
		                       </tr> 
		                     </table>
		                    </td> 
		                   </tr> 
		                 </table> 
		                 <table class="es-content" cellspacing="0" cellpadding="0" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;"> 
		                   <tr style="border-collapse:collapse;"> 
		                    <td align="center" style="padding:0;Margin:0;"> 
		                     <table class="es-content-body" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#333333;" width="600" cellspacing="0" cellpadding="0" bgcolor="#333333" align="center"> 
		                       <tr style="border-collapse:collapse;"> 
		                        <td style="Margin:0;padding-top:40px;padding-bottom:40px;padding-left:40px;padding-right:40px;background-color:#333333;" align="left" bgcolor="#333333" > 
		                         <table cellspacing="0" cellpadding="0" width="100%" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;"> 
		                           <tr style="border-collapse:collapse;"> 
		                            <td width="520" valign="top" align="center" style="padding:0;Margin:0;"> 
		                             <table width="100%" cellspacing="0" cellpadding="0" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;"> 
		                               <tr style="border-collapse:collapse;"> 
		                                <td align="center" style="padding:0;Margin:0;padding-bottom:10px;padding-top:40px;">
		                                  <h1 style="Margin: 0;line-height:36px;mso-line-height-rule:exactly;font-family:lato, \'helvetica neue\', helvetica, arial, sans-serif;font-size:30px;font-style:normal;font-weight:bold;color:#FFFFFF;">Su mercancía se encuentra en ' . $estado . '</h1>
		                                </td> 
		                               </tr> 
		                               <tr style="border-collapse:collapse;"> 
		                                <td esdev-links-color="#757575" align="center" style="Margin:0;padding-top:10px;padding-bottom:20px;padding-left:30px;padding-right:30px;"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:15px;font-family:helvetica, \'helvetica neue\', arial, verdana, sans-serif;line-height:23px;color:#FFFFFF;">Con Reachmx esta siempre conectado, consulte el estatus de su mercancía 24/7</p></td> 
		                               </tr> 
		                               <tr style="border-collapse:collapse;"> 
		                                <td align="center" style="padding:0;Margin:0;padding-top:10px;padding-bottom:20px;">
		                                  <span class="es-button-border" style="border-style:solid;border-color:#26A4D3;background:none 0% 0% repeat scroll #26A4D3;border-width:0px;display:inline-block;border-radius:50px;width:auto;">
		                                    <a href="https://reachmx.com" class="es-button" target="_blank" style="mso-style-priority:100 !important;text-decoration:none;transition:all 100ms ease-in;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, \'helvetica neue\', helvetica, sans-serif;font-size:14px;color:#FFFFFF;border-style:solid;border-color:#26A4D3;border-width:15px 30px 15px 30px;display:inline-block;background:#26A4D3 none repeat scroll 0% 0%;border-radius:50px;font-weight:bold;font-style:normal;line-height:17px;width:auto;text-align:center;">Entrar</a>
		                                  </span>
		                                </td> 
		                               </tr> 
		                             </table>
		                            </td> 
		                           </tr> 
		                         </table></td> 
		                       </tr> 
		                     </table></td> 
		                   </tr> 
		                 </table> 
		                 <table class="es-content" cellspacing="0" cellpadding="0" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;"> 
		                   <tr style="border-collapse:collapse;"> 
		                    <td align="center" style="padding:0;Margin:0;"> 
		                     <table class="es-content-body" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#26A4D3;" width="600" cellspacing="0" cellpadding="0" bgcolor="#26a4d3" align="center"> 
		                       <tr style="border-collapse:collapse;"> 
		                        <td style="Margin:0;padding-bottom:20px;padding-top:40px;padding-left:40px;padding-right:40px;background-color:#26A4D3;" bgcolor="#26a4d3" align="left"> 
		                         <table width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;"> 
		                           <tr style="border-collapse:collapse;"> 
		                            <td width="520" valign="top" align="center" style="padding:0;Margin:0;"> 
		                             <table width="100%" cellspacing="0" cellpadding="0" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;"> 
		                               <tr style="border-collapse:collapse;"> 
		                                <td class="es-m-txt-c" align="center" style="padding:0;Margin:0;"><h2 style="Margin:0;line-height:24px;mso-line-height-rule:exactly;font-family:lato, \'helvetica neue\', helvetica, arial, sans-serif;font-size:20px;font-style:normal;font-weight:bold;color:#FFFFFF;">Tú éxito es lo que más importa</h2></td> 
		                               </tr> 
		                               <tr style="border-collapse:collapse;"> 
		                                <td align="center" style="padding:0;Margin:0;padding-top:5px;padding-bottom:10px;"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:17px;font-family:helvetica, \'helvetica neue\', arial, verdana, sans-serif;line-height:26px;color:#AAD4EA;">#Tech&amp;Trade</p></td> 
		                               </tr> 
		                             </table></td> 
		                           </tr> 
		                         </table></td> 
		                       </tr> 
		                     </table></td> 
		                   </tr> 
		                 </table> 
		                 <table class="es-content" cellspacing="0" cellpadding="0" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;"> 
		                   <tr style="border-collapse:collapse;"> 
		                    <td align="center" style="padding:0;Margin:0;"> 
		                     <table class="es-content-body" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#292828;" width="600" cellspacing="0" cellpadding="0" bgcolor="#292828" align="center"> 
		                       <tr style="border-collapse:collapse;"> 
		                        <td align="left" bgcolor="#ffffff" style="Margin:0;padding-top:30px;padding-bottom:30px;padding-left:40px;padding-right:40px;background-color:#FFFFFF;"> 
		                         <table width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;"> 
		                           <tr style="border-collapse:collapse;"> 
		                            <td width="520" valign="top" align="center" style="padding:0;Margin:0;"> 
		                             <table width="100%" cellspacing="0" cellpadding="0" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;"> 
		                               <tr style="border-collapse:collapse;"> 
		                                <td align="center" style="padding:0;Margin:0;font-size:0;"> 
		                                 <table class="es-table-not-adapt es-social" cellspacing="0" cellpadding="0" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;"> 
		                                   <tr style="border-collapse:collapse;"> 
		                                    <td valign="top" align="center" style="padding:0;Margin:0;padding-right:10px;"><a target="_blank" href="https://www.facebook.com/reachmx" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:helvetica, \'helvetica neue\', arial, verdana, sans-serif;font-size:15px;text-decoration:underline;color:#26A4D3;"><img title="Facebook" src="https://zftph.stripocdn.email/content/assets/img/social-icons/logo-colored/facebook-logo-colored.png" alt="Fb" width="32" height="32" style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic;"></a></td> 
		                                    <td valign="top" align="center" style="padding:0;Margin:0;padding-right:10px;"><a target="_blank" href="https://www.twitter.com/reachmxs" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:helvetica, \'helvetica neue\', arial, verdana, sans-serif;font-size:15px;text-decoration:underline;color:#26A4D3;"><img title="Twitter" src="https://zftph.stripocdn.email/content/assets/img/social-icons/logo-colored/twitter-logo-colored.png" alt="Tw" width="32" height="32" style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic;"></a></td> 
		                                    <td valign="top" align="center" style="padding:0;Margin:0;padding-right:10px;"><a target="blank" href="https://www.instagram.com/reachmx" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:helvetica, \'helvetica neue\', arial, verdana, sans-serif;font-size:15px;text-decoration:underline;color:#26A4D3;"><img title="Instagram" src="https://zftph.stripocdn.email/content/assets/img/social-icons/logo-colored/instagram-logo-colored.png" alt="Inst" width="32" height="32" style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic;"></a></td> 
		                                    <td valign="top" align="center" style="padding:0;Margin:0;"><a target="_blank" href="https://www.linkedin.com/company/reachmx-trade-solutions" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:helvetica, \'helvetica neue\', arial, verdana, sans-serif;font-size:15px;text-decoration:underline;color:#26A4D3;"><img title="Linkedin" src="https://zftph.stripocdn.email/content/assets/img/social-icons/logo-colored/linkedin-logo-colored.png" alt="In" width="32" height="32" style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic;"></a></td> 
		                                   </tr> 
		                                 </table></td> 
		                               </tr> 
		                             </table></td> 
		                           </tr> 
		                         </table></td> 
		                       </tr> 
		                     </table></td> 
		                   </tr> 
		                 </table></td>
		                </td>
		              </tr>
		            </tbody>
		          </table>
		        </div>';

				$headers = '
				<meta charset="UTF-8">
				<meta content="width=device-width, initial-scale=1" name="viewport">
				<meta name="x-apple-disable-message-reformatting">
				<meta http-equiv="X-UA-Compatible" content="IE=edge">
				<meta content="telephone=no" name="format-detection">';

				$this->load->library('mail');

				//$this->mail->enviar_correo($email_from, $email_subject, $mensaje, $headers, $email_to);
			} else {
				show_404();
			}
		} else {
			redirect(base_url() . 'Login');
		}
	}
	// funcion del correo para aviso de la fecha limite del pendiente
	public function correo_pendiente()
	{
		if ($this->seguridad() == TRUE) {
			if ($this->input->is_ajax_request()) {
				//Post de info
				$id_task_dash = trim($this->input->post('id_task_dash'));
				$id_usuario = trim($this->input->post('id_usuario'));

				//consigue el nombre del status 
				$data_task = $this->Plataforma_model->taskData($id_task_dash);
				$fecha_limite = $data_task->fecha_limite;
				$fechaLimite = date('d-m-Y', strtotime($fecha_limite));
				$task = $data_task->task_dash;

				//consigue el email y nombre del cliente
				$data_correo =  $this->Plataforma_model->get_correo_usuario($id_usuario);
				$email_to = $data_correo->email;
				$nombre = $data_correo->nombre;

				$email_from = 'no-reply@reachmx.com';

				//Declaracion de avriables para enviar
				$email_subject = "AVISO FECHA LIMITE DE PENDIENTE";
				$mensaje = '
				<div class="es-wrapper-color">
		          <table class="es-wrapper" width="100%" cellspacing="0" cellpadding="0">
		            <tbody>
		              <tr>
		                <td class="esd-email-paddings st-br" valign="top">
		                 <table cellpadding="0" cellspacing="0" class="es-header" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;background-color:transparent;background-repeat:repeat;background-position:center top;"> 
		                   <tr style="border-collapse:collapse;"> 
		                    <td align="center" style="padding:0;Margin:0;"> 
		                     <table class="es-header-body" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#FFFFFF;" width="600" cellspacing="0" cellpadding="0" bgcolor="#ffffff" align="center"> 
		                       <tr style="border-collapse:collapse;"> 
		                        <td style="Margin:0;padding-top:30px;padding-bottom:30px;padding-left:40px;padding-right:40px;background-color:transparent;" bgcolor="transparent" align="left"> 
		                         <table cellspacing="0" cellpadding="0" width="100%" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;"> 
		                           <tr style="border-collapse:collapse;"> 
		                            <td width="520" valign="top" align="center" style="padding:0;Margin:0;"> 
		                             <table width="100%" cellspacing="0" cellpadding="0" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;"> 
		                               <tr style="border-collapse:collapse;"> 
		                                <td align="center" style="padding:0;Margin:0;font-size:0px;">
		                                  <a href="https://www.reachmx.com" target="_blank" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:helvetica, \'helvetica neue\', arial, verdana, sans-serif;font-size:14px;text-decoration:underline;color:#FFFFFF;"><img src="https://zftph.stripocdn.email/content/guids/CABINET_2e2d355826f27dab527a7542223ace13/images/11861586991901546.png" alt style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic;" width="200" class="adapt-img"></a>
		                                </td> 
		                               </tr> 
		                             </table>
		                            </td> 
		                           </tr> 
		                         </table>
		                        </td> 
		                       </tr> 
		                     </table>
		                    </td> 
		                   </tr> 
		                 </table> 
		                 <table class="es-content" cellspacing="0" cellpadding="0" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;"> 
		                   <tr style="border-collapse:collapse;"> 
		                    <td align="center" style="padding:0;Margin:0;"> 
		                     <table class="es-content-body" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#333333;" width="600" cellspacing="0" cellpadding="0" bgcolor="#333333" align="center"> 
		                       <tr style="border-collapse:collapse;"> 
		                        <td style="Margin:0;padding-top:40px;padding-bottom:40px;padding-left:40px;padding-right:40px;background-color:#333333;" align="left" bgcolor="#333333" > 
		                         <table cellspacing="0" cellpadding="0" width="100%" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;"> 
		                           <tr style="border-collapse:collapse;"> 
		                            <td width="520" valign="top" align="center" style="padding:0;Margin:0;"> 
		                             <table width="100%" cellspacing="0" cellpadding="0" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;"> 
		                               <tr style="border-collapse:collapse;"> 
		                                <td align="center" style="padding:0;Margin:0;padding-bottom:10px;padding-top:40px;">
		                                  <h1 style="Margin: 0;line-height:36px;mso-line-height-rule:exactly;font-family:lato, \'helvetica neue\', helvetica, arial, sans-serif;font-size:30px;font-style:normal;font-weight:bold;color:#FFFFFF;">El pendiente ' . $task . ' se debe terminar antes de' . $fechaLimite . '</h1> 
		                                </td> 
		                               </tr> 
		                               <tr style="border-collapse:collapse;"> 
		                                <td esdev-links-color="#757575" align="center" style="Margin:0;padding-top:10px;padding-bottom:20px;padding-left:30px;padding-right:30px;"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:15px;font-family:helvetica, \'helvetica neue\', arial, verdana, sans-serif;line-height:23px;color:#FFFFFF;">Con Reachmx esta siempre conectado, consulte su actividad 24/7</p></td> 
		                               </tr> 
		                               <tr style="border-collapse:collapse;"> 
		                                <td align="center" style="padding:0;Margin:0;padding-top:10px;padding-bottom:20px;">
		                                  <span class="es-button-border" style="border-style:solid;border-color:#26A4D3;background:none 0% 0% repeat scroll #26A4D3;border-width:0px;display:inline-block;border-radius:50px;width:auto;">
		                                    <a href="https://reachmx.com" class="es-button" target="_blank" style="mso-style-priority:100 !important;text-decoration:none;transition:all 100ms ease-in;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, \'helvetica neue\', helvetica, sans-serif;font-size:14px;color:#FFFFFF;border-style:solid;border-color:#26A4D3;border-width:15px 30px 15px 30px;display:inline-block;background:#26A4D3 none repeat scroll 0% 0%;border-radius:50px;font-weight:bold;font-style:normal;line-height:17px;width:auto;text-align:center;">Entrar</a>
		                                  </span>
		                                </td> 
		                               </tr> 
		                             </table>
		                            </td> 
		                           </tr> 
		                         </table></td> 
		                       </tr> 
		                     </table></td> 
		                   </tr> 
		                 </table> 
		                 <table class="es-content" cellspacing="0" cellpadding="0" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;"> 
		                   <tr style="border-collapse:collapse;"> 
		                    <td align="center" style="padding:0;Margin:0;"> 
		                     <table class="es-content-body" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#26A4D3;" width="600" cellspacing="0" cellpadding="0" bgcolor="#26a4d3" align="center"> 
		                       <tr style="border-collapse:collapse;"> 
		                        <td style="Margin:0;padding-bottom:20px;padding-top:40px;padding-left:40px;padding-right:40px;background-color:#26A4D3;" bgcolor="#26a4d3" align="left"> 
		                         <table width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;"> 
		                           <tr style="border-collapse:collapse;"> 
		                            <td width="520" valign="top" align="center" style="padding:0;Margin:0;"> 
		                             <table width="100%" cellspacing="0" cellpadding="0" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;"> 
		                               <tr style="border-collapse:collapse;"> 
		                                <td class="es-m-txt-c" align="center" style="padding:0;Margin:0;"><h2 style="Margin:0;line-height:24px;mso-line-height-rule:exactly;font-family:lato, \'helvetica neue\', helvetica, arial, sans-serif;font-size:20px;font-style:normal;font-weight:bold;color:#FFFFFF;">Tú éxito es lo que más importa</h2></td> 
		                               </tr> 
		                               <tr style="border-collapse:collapse;"> 
		                                <td align="center" style="padding:0;Margin:0;padding-top:5px;padding-bottom:10px;"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:17px;font-family:helvetica, \'helvetica neue\', arial, verdana, sans-serif;line-height:26px;color:#AAD4EA;">#Tech&amp;Trade</p></td> 
		                               </tr> 
		                             </table></td> 
		                           </tr> 
		                         </table></td> 
		                       </tr> 
		                     </table></td> 
		                   </tr> 
		                 </table> 
		                 <table class="es-content" cellspacing="0" cellpadding="0" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;"> 
		                   <tr style="border-collapse:collapse;"> 
		                    <td align="center" style="padding:0;Margin:0;"> 
		                     <table class="es-content-body" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#292828;" width="600" cellspacing="0" cellpadding="0" bgcolor="#292828" align="center"> 
		                       <tr style="border-collapse:collapse;"> 
		                        <td align="left" bgcolor="#ffffff" style="Margin:0;padding-top:30px;padding-bottom:30px;padding-left:40px;padding-right:40px;background-color:#FFFFFF;"> 
		                         <table width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;"> 
		                           <tr style="border-collapse:collapse;"> 
		                            <td width="520" valign="top" align="center" style="padding:0;Margin:0;"> 
		                             <table width="100%" cellspacing="0" cellpadding="0" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;"> 
		                               <tr style="border-collapse:collapse;"> 
		                                <td align="center" style="padding:0;Margin:0;font-size:0;"> 
		                                 <table class="es-table-not-adapt es-social" cellspacing="0" cellpadding="0" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;"> 
		                                   <tr style="border-collapse:collapse;"> 
		                                    <td valign="top" align="center" style="padding:0;Margin:0;padding-right:10px;"><a target="_blank" href="https://www.facebook.com/reachmx" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:helvetica, \'helvetica neue\', arial, verdana, sans-serif;font-size:15px;text-decoration:underline;color:#26A4D3;"><img title="Facebook" src="https://zftph.stripocdn.email/content/assets/img/social-icons/logo-colored/facebook-logo-colored.png" alt="Fb" width="32" height="32" style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic;"></a></td> 
		                                    <td valign="top" align="center" style="padding:0;Margin:0;padding-right:10px;"><a target="_blank" href="https://www.twitter.com/reachmxs" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:helvetica, \'helvetica neue\', arial, verdana, sans-serif;font-size:15px;text-decoration:underline;color:#26A4D3;"><img title="Twitter" src="https://zftph.stripocdn.email/content/assets/img/social-icons/logo-colored/twitter-logo-colored.png" alt="Tw" width="32" height="32" style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic;"></a></td> 
		                                    <td valign="top" align="center" style="padding:0;Margin:0;padding-right:10px;"><a target="blank" href="https://www.instagram.com/reachmx" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:helvetica, \'helvetica neue\', arial, verdana, sans-serif;font-size:15px;text-decoration:underline;color:#26A4D3;"><img title="Instagram" src="https://zftph.stripocdn.email/content/assets/img/social-icons/logo-colored/instagram-logo-colored.png" alt="Inst" width="32" height="32" style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic;"></a></td> 
		                                    <td valign="top" align="center" style="padding:0;Margin:0;"><a target="_blank" href="https://www.linkedin.com/company/reachmx-trade-solutions" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:helvetica, \'helvetica neue\', arial, verdana, sans-serif;font-size:15px;text-decoration:underline;color:#26A4D3;"><img title="Linkedin" src="https://zftph.stripocdn.email/content/assets/img/social-icons/logo-colored/linkedin-logo-colored.png" alt="In" width="32" height="32" style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic;"></a></td> 
		                                   </tr> 
		                                 </table></td> 
		                               </tr> 
		                             </table></td> 
		                           </tr> 
		                         </table></td> 
		                       </tr> 
		                     </table></td> 
		                   </tr> 
		                 </table></td>
		                </td>
		              </tr>
		            </tbody>
		          </table>
		        </div>';

				$headers = '
				<meta charset="UTF-8">
				<meta content="width=device-width, initial-scale=1" name="viewport">
				<meta name="x-apple-disable-message-reformatting">
				<meta http-equiv="X-UA-Compatible" content="IE=edge">
				<meta content="telephone=no" name="format-detection">';

				$this->load->library('mail');

				$this->mail->enviar_correo($email_from, $email_subject, $mensaje, $headers, $email_to);
			} else {
				show_404();
			}
		} else {
			redirect(base_url() . 'Login');
		}
	}

	public function taskChekin()
	{
		if ($this->seguridad() == TRUE) {
			if ($this->input->is_ajax_request()) {
				$id_task_dash = $this->input->post('id_task_dash');
				$dataTasks = array(
					'estatus' => trim($this->input->post('estatus')),
					'fecha_cambio' => trim($this->input->post('fecha_cambio')),
				);
				$this->Plataforma_model->taskUpdate($dataTasks, $id_task_dash);
				json_encode($dataTasks);
			} else {
				show_404();
			}
		} else {
			redirect(base_url() . 'Login');
		}
	}

	public function taskData()
	{
		if ($this->seguridad() == TRUE) {
			if ($this->input->is_ajax_request()) {
				$id_task_dash = trim($this->input->post('id_task_dash'));
				$data = $this->Plataforma_model->taskData($id_task_dash);
				echo json_encode($data);
			} else {
				show_404();
			}
		} else {
			redirect(base_url() . 'Login');
		}
	}

	public function taskDatas()
	{
		if ($this->seguridad() == TRUE) {
			if ($this->input->is_ajax_request()) {
				$id_usuario = trim($this->input->post('id_usuario'));

				$data = $this->Plataforma_model->taskDatas($id_usuario);
				echo json_encode($data);
			} else {
				show_404();
			}
		} else {
			redirect(base_url() . 'Login');
		}
	}

	public function taskDash()
	{
		if ($this->seguridad() == TRUE) {
			if ($this->input->is_ajax_request()) {
				$data = array(
					'id_usuario' => trim($this->input->post('id_usuario')),
					'task_dash' => trim($this->input->post('task_dash')),
					'estatus' => trim($this->input->post('estatus')),
					'fecha_limite' => trim($this->input->post('fecha_limite')),
				);
				$this->Plataforma_model->taskDash($data);
				json_encode($data);
			} else {
				show_404();
			}
		} else {
			redirect(base_url() . 'Login');
		}
	}

	public function taskDashEdit()
	{
		if ($this->seguridad() == TRUE) {
			if ($this->input->is_ajax_request()) {
				$id_task_dash = $this->input->post('id_task_dash');
				$data = array(
					'task_dash' => trim($this->input->post('task_dash')),
					'estatus' => trim($this->input->post('estatus')),
					'fecha_limite' => trim($this->input->post('fecha_limite')),
				);
				$this->Plataforma_model->taskUpdate($data, $id_task_dash);
				json_encode($data);
			} else {
				show_404();
			}
		} else {
			redirect(base_url() . 'Login');
		}
	}

	public function taskDashCorreo()
	{
		if ($this->seguridad() == TRUE) {
			if ($this->input->is_ajax_request()) {
				$id_task_dash = $this->input->post('id_task_dash');
				$data = array(
					'correo' => trim($this->input->post('correo')),
				);
				$this->Plataforma_model->taskUpdate($data, $id_task_dash);
				json_encode($data);
			} else {
				show_404();
			}
		} else {
			redirect(base_url() . 'Login');
		}
	}

	public function taskDashDelet()
	{
		if ($this->seguridad() == TRUE) {
			if ($this->input->is_ajax_request()) {
				$id_task_dash = $this->input->post('id_task_dash');
				$data = array(
					'activo' => trim($this->input->post('activo')),
				);
				$this->Plataforma_model->taskUpdate($data, $id_task_dash);
				json_encode($data);
			} else {
				show_404();
			}
		} else {
			redirect(base_url() . 'Login');
		}
	}

	public function update_coordenadas()
	{
		if ($this->seguridad() == TRUE) {
			if ($this->input->is_ajax_request()) {
				$id_proyecto = $this->input->post('id_proyecto');
				$data = array(
					'id_proyecto' => trim($this->input->post('id_proyecto')),
					'direccion' => trim($this->input->post('direccion')),
					'activo' => 1,
				);
				$this->Plataforma_model->update_coord($data, $id_proyecto);
				echo json_encode($data);
			} else {
				show_404();
			}
		} else {
			redirect(base_url() . 'Login');
		}
	}

	public function ultima_aa()
	{
		if ($this->seguridad() == TRUE) {
			if ($this->input->is_ajax_request()) {
				$data = $this->Plataforma_model->get_last_aa();
				echo json_encode($data);
			} else {
				show_404();
			}
		} else {
			redirect(base_url() . 'Login');
		}
	}

	public function update_otras_cotizaciones()
	{
		if ($this->seguridad() == TRUE) {
			if ($this->input->is_ajax_request()) {
				$id_cotizacion = trim($this->input->post('id_cotizacion'));
				//obtiene id_proyecto
				$data = $this->Plataforma_model->get_proyecto_cotizacion($id_cotizacion);
				$id_proyecto = $data->id_proyecto;

				//obtiene las cotizaciones del proyecto
				$cotizaciones = $this->Plataforma_model->get_cotizaciones_update($id_proyecto);
				foreach ($cotizaciones->result() as $row) {
					//Revisa las cotizaciones activas antes de hacer el update
					if ($row->activo == 2) {
						$id_cotizacion = $row->id_cotizacion;
						//set activo 4 que equivale a rechazar por cliente
						$data_envio = array('activo' => 4);
						//hacer update
						$this->Plataforma_model->update_cotizacion($data_envio, $id_cotizacion);
					}
				}
			} else {
				show_404();
			}
		} else {
			redirect(base_url() . 'Login');
		}
	}

	public function get_pathCotizacion()
	{
		if ($this->seguridad() == TRUE) {
			if ($this->input->is_ajax_request()) {
				$id_documento = $this->input->post('id_documento');
				$data = $this->Plataforma_model->get_pdfPath($id_documento);
				echo json_encode($data);
			} else {
				show_404();
			}
		} else {
			redirect(base_url() . 'Login');
		}
	}

	public function get_folio()
	{
		if ($this->seguridad() == TRUE) {
			if ($this->input->is_ajax_request()) {
				$id_proyecto = $this->input->post('id_proyecto');
				$data = $this->Plataforma_model->get_folio($id_proyecto);
				echo json_encode($data);
			} else {
				show_404();
			}
		} else {
			redirect(base_url() . 'Login');
		}
	}

	public function consultaAsesorProyecto()
	{
		if ($this->seguridad() == TRUE) {
			if ($this->input->is_ajax_request()) {
				$id_cotizacion = trim($this->input->post('id_cotizacion'));

				//Encuentra el proyecto con el id_cotizacion
				$data_referencia = $this->Plataforma_model->get_id_referencia($id_cotizacion);
				$id_proyecto = $data_referencia->id_proyecto;

				//Busca en el proyecto si esta asignado el asesor
				$data_get_pb = $this->Plataforma_model->get_pb($id_proyecto);
				$id_asesor = $data_get_pb->id_asesor;

				if ($id_asesor != NULL) {
					$data = array(
						'id_asesor' => 'true',
					);
					echo json_encode($data);
				} else {
					$data = array(
						'id_asesor' => 'false',
					);
					echo json_encode($data);
				}
			} else {
				show_404();
			}
		} else {
			redirect(base_url() . 'Login');
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
			redirect(base_url() . 'Login');
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
			redirect(base_url() . 'Login');
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
			redirect(base_url() . 'Login');
		}
	}

	public function seguridad()
	{
		if (($this->session->userdata('logueado') == 1)) {
			return true;
		} else {
			return false;
		}
	}
}
