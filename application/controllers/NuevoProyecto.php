<?php
defined('BASEPATH') or exit('No direct script access allowed');

class NuevoProyecto extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('NuevoProyecto_model');
	}

	// funcion para hacer un nuevo pedido
	public function index()
	{
		if ($this->seguridad() == TRUE) {
			$data = array(
				'data_unidades' => $this->NuevoProyecto_model->get_unidades(),
				'DATA_LADAS' => $this->NuevoProyecto_model->get_ladas(),
			);
			$this->load->view('headers/header');
			$this->load->view('plataforma/cliente/pedidos/nuevo_pedido/nuevo_pedido', $data);
			$this->load->view('footers/footer');
		} else {
			redirect(base_url() . 'Login');
		}
	}
	
	// estatus de proyectos del cliente
	public function statusProyectoCliente()
	{
		if ($this->seguridad() == TRUE) {
			if ($this->input->is_ajax_request()) {
				$id_usuario = $this->session->userdata('id_usuario');
				$data = $this->NuevoProyecto_model->noMyProyectos($id_usuario);
				echo json_encode($data);
			} else {
				show_404();
			}
		} else {
			redirect(base_url() . 'Login');
		}
	}

	// funcion para obtener el ultimo id del proyecto base
	public function last_id_pb()
	{
		if ($this->seguridad() == TRUE) {
			if ($this->input->is_ajax_request()) {

				$id_cliente = $this->input->post('id_cliente');

				$data = array(
					'DATA_LASTIDPB' => $this->NuevoProyecto_model->id_ultimo_proyecto_base($id_cliente),
				);
				echo json_encode($data);
			} else {
				show_404();
			}
		} else {
			redirect(base_url() . 'Login');
		}
	}
	// fucnion para agregar el proyecto base
	public function agregar_proyecto_base()
	{
		if ($this->seguridad() == TRUE) {
			if ($this->input->is_ajax_request()) {

				//CREA EL FOLIO CUANDO ES PRIMERA VEZ QUE SE REGISTRA UN PROYECTO, OBTIENE EL ULTIMO FOLIO REGISTRADO
					$DATA_FOLIO = $this->NuevoProyecto_model->get_folio();
					//CONTADOR PARA GENERAR EL NUMERO DE FOLIO E IRSE INCREMENTANDO EJ, 2020-1, 2020-2...
					if ($DATA_FOLIO != FALSE) {
						foreach ($DATA_FOLIO->result() as $row) {
							$Folio = $row->folio + 1;
							//SI YA HAY UN RESULTADO VA AGREGANDO 1
							$A_max = $row->a_registro;
						}
					} else {
						$Folio = 1;
						//SINO ASIGNA AL PRIMERO DEL AÑO
						$A_max = date('Y');
					}
			
					if (date('Y') > $A_max) {
						$Folio = 1;
						//PARA CUANDO CAMBIE DE AÑO SE REINICIE EL CONTADOR
					}
				//

				//Captura de datos, desglose arreglos js
				$data_proyecto_base = $this->input->post('data_proyecto_base');
				$pedido = $this->input->post('pedido');
				$fecha = $data_proyecto_base["fecha_creacion"];
				
				//Data para PROYECTO
				$data_proyecto = array(
					'id_estadoproyectos' => '1',
					'fecha_creacion' => $fecha,
					'a_registro' => date("Y"),
					'folio' => $Folio,
					'id_cliente' => $data_proyecto_base["id_cliente"],
					'id_asesor' => $data_proyecto_base["id_cliente"],
					'comentarios' => $data_proyecto_base["comentarios"],
					'tipo_envio' => $data_proyecto_base["tipo_envio"],
					'destino' => $data_proyecto_base["destino"],
				);
				echo json_encode($data_proyecto);

				//insert para PROYECTO
				$this->NuevoProyecto_model->insert_proyecto($data_proyecto);

				// consultar el ultimo id del proyecto insertado por el cliente 
				$id_proyecto_row = $this->NuevoProyecto_model->id_ultimo_proyecto($data_proyecto_base["id_cliente"]);

				// convertir el valor a un entero
				$id_proyecto_value = $id_proyecto_row->id_proyecto;

				//insertar en tabla coordenadas con status 0
				$data_coord = array('id_proyecto' =>  $id_proyecto_value,);
				$this->NuevoProyecto_model->insert_into_coordenadas($data_coord);

				// task array
				$data_task1 = array(
					'id_proyecto' => $id_proyecto_value,
					'id_task' => 1,
					'estatus' => 0,
					'fecha_cambio' => '0000-00-00',
				);
				$data_task2 = array(
					'id_proyecto' => $id_proyecto_value,
					'id_task' => 2,
					'estatus' => 0,
					'fecha_cambio' => '0000-00-00',
				);
				$data_task3 = array(
					'id_proyecto' => $id_proyecto_value,
					'id_task' => 3,
					'estatus' => 0,
					'fecha_cambio' => '0000-00-00',
				);
				$data_task4 = array(
					'id_proyecto' => $id_proyecto_value,
					'id_task' => 4,
					'estatus' => 0,
					'fecha_cambio' => '0000-00-00',
				);
				$data_task5 = array(
					'id_proyecto' => $id_proyecto_value,
					'id_task' => 5,
					'estatus' => 0,
					'fecha_cambio' => '0000-00-00',
				);
				$data_task6 = array(
					'id_proyecto' => $id_proyecto_value,
					'id_task' => 6,
					'estatus' => 0,
					'fecha_cambio' => '0000-00-00',
				);
				$data_task7 = array(
					'id_proyecto' => $id_proyecto_value,
					'id_task' => 7,
					'estatus' => 0,
					'fecha_cambio' => '0000-00-00',
				);
				$data_task8 = array(
					'id_proyecto' => $id_proyecto_value,
					'id_task' => 8,
					'estatus' => 0,
					'fecha_cambio' => '0000-00-00',
				);
				$data_task9 = array(
					'id_proyecto' => $id_proyecto_value,
					'id_task' => 9,
					'estatus' => 0,
					'fecha_cambio' => '0000-00-00',
				);
				$data_task10 = array(
					'id_proyecto' => $id_proyecto_value,
					'id_task' => 10,
					'estatus' => 0,
					'fecha_cambio' => '0000-00-00',
				);
				$data_task11 = array(
					'id_proyecto' => $id_proyecto_value,
					'id_task' => 11,
					'estatus' => 0,
					'fecha_cambio' => '0000-00-00',
				);
				$data_task12 = array(
					'id_proyecto' => $id_proyecto_value,
					'id_task' => 12,
					'estatus' => 0,
					'fecha_cambio' => '0000-00-00',
				);
				$data_task13 = array(
					'id_proyecto' => $id_proyecto_value,
					'id_task' => 13,
					'estatus' => 0,
					'fecha_cambio' => '0000-00-00',
				);
				$data_task14 = array(
					'id_proyecto' => $id_proyecto_value,
					'id_task' => 14,
					'estatus' => 0,
					'fecha_cambio' => '0000-00-00',
				);
				$data_task15 = array(
					'id_proyecto' => $id_proyecto_value,
					'id_task' => 15,
					'estatus' => 0,
					'fecha_cambio' => '0000-00-00',
				);
				$data_task16 = array(
					'id_proyecto' => $id_proyecto_value,
					'id_task' => 16,
					'estatus' => 0,
					'fecha_cambio' => '0000-00-00',
				);
				$data_task17 = array(
					'id_proyecto' => $id_proyecto_value,
					'id_task' => 17,
					'estatus' => 0,
					'fecha_cambio' => '0000-00-00',
				);
				$data_task18 = array(
					'id_proyecto' => $id_proyecto_value,
					'id_task' => 18,
					'estatus' => 0,
					'fecha_cambio' => '0000-00-00',
				);
				$data_task19 = array(
					'id_proyecto' => $id_proyecto_value,
					'id_task' => 19,
					'estatus' => 0,
					'fecha_cambio' => '0000-00-00',
				);
				$data_task20 = array(
					'id_proyecto' => $id_proyecto_value,
					'id_task' => 20,
					'estatus' => 0,
					'fecha_cambio' => '0000-00-00',
				);
				$data_task21 = array(
					'id_proyecto' => $id_proyecto_value,
					'id_task' => 21,
					'estatus' => 0,
					'fecha_cambio' => '0000-00-00',
				);
				$data_task22 = array(
					'id_proyecto' => $id_proyecto_value,
					'id_task' => 22,
					'estatus' => 0,
					'fecha_cambio' => '0000-00-00',
				);
				$data_task23 = array(
					'id_proyecto' => $id_proyecto_value,
					'id_task' => 23,
					'estatus' => 0,
					'fecha_cambio' => '0000-00-00',
				);
				$data_task24 = array(
					'id_proyecto' => $id_proyecto_value,
					'id_task' => 24,
					'estatus' => 0,
					'fecha_cambio' => '0000-00-00',
				);
				$data_task25 = array(
					'id_proyecto' => $id_proyecto_value,
					'id_task' => 25,
					'estatus' => 0,
					'fecha_cambio' => '0000-00-00',
				);
				$data_task26 = array(
					'id_proyecto' => $id_proyecto_value,
					'id_task' => 26,
					'estatus' => 0,
					'fecha_cambio' => '0000-00-00',
				);
				$data_task27 = array(
					'id_proyecto' => $id_proyecto_value,
					'id_task' => 27,
					'estatus' => 0,
					'fecha_cambio' => '0000-00-00',
				);
				$data_task28 = array(
					'id_proyecto' => $id_proyecto_value,
					'id_task' => 28,
					'estatus' => 0,
					'fecha_cambio' => '0000-00-00',
				);
				$data_task29 = array(
					'id_proyecto' => $id_proyecto_value,
					'id_task' => 29,
					'estatus' => 0,
					'fecha_cambio' => '0000-00-00',
				);
				$data_task30 = array(
					'id_proyecto' => $id_proyecto_value,
					'id_task' => 30,
					'estatus' => 0,
					'fecha_cambio' => '0000-00-00',
				);
				$data_task31 = array(
					'id_proyecto' => $id_proyecto_value,
					'id_task' => 31,
					'estatus' => 0,
					'fecha_cambio' => '0000-00-00',
				);
				$data_task32 = array(
					'id_proyecto' => $id_proyecto_value,
					'id_task' => 32,
					'estatus' => 0,
					'fecha_cambio' => '0000-00-00',
				);
				$data_task33 = array(
					'id_proyecto' => $id_proyecto_value,
					'id_task' => 33,
					'estatus' => 0,
					'fecha_cambio' => '0000-00-00',
				);

				// insetrt arrays tasks
					// sourcing
						$this->NuevoProyecto_model->insert_sourcing($data_task1);
						$this->NuevoProyecto_model->insert_sourcing($data_task2);
						$this->NuevoProyecto_model->insert_sourcing($data_task3);
						$this->NuevoProyecto_model->insert_sourcing($data_task4);
						$this->NuevoProyecto_model->insert_sourcing($data_task5);
						$this->NuevoProyecto_model->insert_sourcing($data_task6);
						$this->NuevoProyecto_model->insert_sourcing($data_task7);
						$this->NuevoProyecto_model->insert_sourcing($data_task8);
						$this->NuevoProyecto_model->insert_sourcing($data_task9);
						$this->NuevoProyecto_model->insert_sourcing($data_task10);
					// production
						$this->NuevoProyecto_model->insert_production($data_task11);
						$this->NuevoProyecto_model->insert_production($data_task12);
						$this->NuevoProyecto_model->insert_production($data_task13);
						$this->NuevoProyecto_model->insert_production($data_task14);
						$this->NuevoProyecto_model->insert_production($data_task15);
						$this->NuevoProyecto_model->insert_production($data_task16);
						$this->NuevoProyecto_model->insert_production($data_task17);
						$this->NuevoProyecto_model->insert_production($data_task18);
						$this->NuevoProyecto_model->insert_production($data_task19);
					// freight
						$this->NuevoProyecto_model->insert_freight($data_task20);
						$this->NuevoProyecto_model->insert_freight($data_task21);
						$this->NuevoProyecto_model->insert_freight($data_task22);
						$this->NuevoProyecto_model->insert_freight($data_task23);
						$this->NuevoProyecto_model->insert_freight($data_task24);
					// customs
						$this->NuevoProyecto_model->insert_customs($data_task25);
						$this->NuevoProyecto_model->insert_customs($data_task26);
						$this->NuevoProyecto_model->insert_customs($data_task27);
						$this->NuevoProyecto_model->insert_customs($data_task28);
						$this->NuevoProyecto_model->insert_customs($data_task29);
					// quoted
						$this->NuevoProyecto_model->insert_quoted($data_task30);
						$this->NuevoProyecto_model->insert_quoted($data_task31);
						$this->NuevoProyecto_model->insert_quoted($data_task32);
					// done
						$this->NuevoProyecto_model->insert_done($data_task33);

				//foreach para el desglose de los datos de PROVEEDORES_CLIENTE, PRODUCTOS_CLIENTE Y PRODUCTOS_SP_CLIENTE
					foreach ($pedido as $pedido_individual) {
						//if para tomar los datos del arreglo que pertenecen a PROVEEDOR_CLIENTE
						if ($pedido_individual["tipo_data"] == "proveedor_cliente") {
							//Datos para tabla PROVEEDORES_CLIENTES
							$data_proveedor_cliente_controller = array(
								'id_prov_interno' => $pedido_individual["id_prov_interno"],
								'proveedor' => $pedido_individual["proveedor"],
								//invoice
							);
							$data_proveedor_cliente_controller_enviar = array(
								'id_cliente' => $data_proyecto_base["id_cliente"],
								'id_proyecto' => $id_proyecto_value,
								'proveedor' => $pedido_individual["proveedor"],
								'email' => $pedido_individual["email"],
								'contacto' => $pedido_individual["contacto"],
								'id_lada' => $pedido_individual["id_lada"],
								'telefono' => $pedido_individual["telefono"],
								'direccion' => $pedido_individual["direccion"],
								'invoice_path' => $pedido_individual["invoice_path"],
							);

							//insert PROVEEDORES_CLIENTES
							$this->NuevoProyecto_model->insert_proveedor_cliente($data_proveedor_cliente_controller_enviar);

							//Consulta para obtener el ultimo id_proveedor_c que ha insertado el cliente
							$id_proveedor_c_row = $this->NuevoProyecto_model->get_last_id_proveedor_cliente($id_proyecto_value);

							//Toma el valor del arreglo
							//variable obtenida/columna de consulta
							$id_proveedor_c_value = $id_proveedor_c_row->id_proveedor_c;

							//foreach para el desglose interno de los productos del proveedor
							foreach ($pedido_individual["productos"] as $producto) {
								//Datos para tabla productos_clientes						
								if ($data_proveedor_cliente_controller["id_prov_interno"] == $producto["id_prov_interno"]) {

									$data_producto_cliente = array(
										'id_cliente' => $data_proyecto_base["id_cliente"],
										'id_proyecto' => $id_proyecto_value,
										'id_proveedor_c' => $id_proveedor_c_value,
										'producto_proveedor_c' => $producto["prod"],
										'cantidad_proveedor_c' => $producto["cant"],
										'id_unidad_md'  => $producto["unidades"],
										'especificaciones_prod_c' => $producto["especificaciones"],
										'color_oem' => $producto["color_oem"],
										'img_path' => $producto["img_path"],
									);
									//Insert para productos de proveedor							
									$this->NuevoProyecto_model->insert_productos_cliente($data_producto_cliente);
								}
							}
						} else if ($pedido_individual["tipo_data"] == "proveedor_cliente_existente"){
							$id_prov_interno_prov = $pedido_individual["id_prov_interno"];
							$id_prov_interno = substr($id_prov_interno_prov, 1);
							
							//foreach para el desglose interno de los productos del proveedor
							foreach ($pedido_individual["productos"] as $producto) {
								$data_proveedor_cliente_controller = array(
									'id_prov_interno' => $pedido_individual["id_prov_interno"],
								);
								//Datos para tabla productos_clientes						
								if ($data_proveedor_cliente_controller["id_prov_interno"] == $producto["id_prov_interno"]) {

									$data_producto_cliente = array(
										'id_cliente' => $data_proyecto_base["id_cliente"],
										'id_proyecto' => $id_proyecto_value,
										'id_proveedor_c' => $id_prov_interno,
										'producto_proveedor_c' => $producto["prod"],
										'cantidad_proveedor_c' => $producto["cant"],
										'id_unidad_md'  => $producto["unidades"],
										'especificaciones_prod_c' => $producto["especificaciones"],
										'color_oem' => $producto["color_oem"],
										'img_path' => $producto["img_path"],
									);
									//Insert para productos de proveedor							
									$this->NuevoProyecto_model->insert_productos_cliente($data_producto_cliente);
								}
							}
						} else {
							show_404();
						}
					}
			} else {
				show_404();
			}
		} else {
			redirect(base_url() . 'Login');
		}
	}
	// funcion para enviar la imagenes del pedido a la carpeta
	public function enviar_img_prod_prov()
	{
		if ($this->seguridad() == TRUE) {
			$imgs_obj = json_decode($_POST['imgs']);
			$id_cliente = $_POST['id_cliente'];

			foreach ($imgs_obj as $img) {
				$id = $img->id;
				$nombre_original = $img->nombre_original;
				$ruta_carpeta  = $img->ruta;
				$validacion_subida = false;

				//comprueba la cantidad de extensiones
				$var = explode(".", $_FILES[$id]["name"]);
				$longitud = count($var);
				//

				//comprueba que sea tipo imagen
				if ($_FILES[$id]['type'] == "image/png" || $_FILES[$id]['type'] == "image/jpg" || $_FILES[$id]['type'] == "image/jpeg") {

					//comprobacion real de tipo, que no sea php o texto
					$file = $_FILES[$id];
					$finfo = finfo_open(FILEINFO_MIME_TYPE);
					if (finfo_file($finfo, $file["tmp_name"]) == "text/x-php" || finfo_file($finfo, $file["tmp_name"]) ==  "text/plain") {
						$validacion_subida = false;
					} else {
						$validacion_subida = true;
					}
					finfo_close($finfo);
					//
				}

				//validar ruta existe
				if (!file_exists($ruta_carpeta)) {
					mkdir($ruta_carpeta, 0777) or die("No se puede crear el directorio de extracci&oacute;n");
				}

				if ($longitud === 2 && $validacion_subida === true) {
					//obtenemos el path que debe tener actualmente en la bd
					$path_tmp = $id . '_' . $nombre_original;

					//get id_producto_sp con id_cliente
					$id_consulta_row = $this->NuevoProyecto_model->get_id_prod_prov($id_cliente, $path_tmp);
					// convertir el valor a un entero
					$id_producto_c_val = $id_consulta_row->id_producto_c;

					//Get id_proyecto_base
					$id_consulta_pb_row = $this->NuevoProyecto_model->id_ultimo_proyecto_base($id_cliente);
					$id_pb = $id_consulta_pb_row->id_proyecto;

					$nuevo_nombre = $id_producto_c_val . '_' . $id_pb . '_producto_prov';

					$nombre_archivo = $nuevo_nombre . "." . pathinfo($_FILES[$id]["name"], PATHINFO_EXTENSION);
					$ruta_guardar_archivo = $ruta_carpeta . $nombre_archivo;

					if (move_uploaded_file($_FILES[$id]["tmp_name"], $ruta_guardar_archivo)) {
						//update campo path
						$datacambio = array('img_path' => $ruta_guardar_archivo,);
						$this->NuevoProyecto_model->update_path_prod_prov($datacambio, $id_producto_c_val);
						echo json_encode($datacambio);
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
		} else {
			redirect(base_url() . 'Login');
		}
	}

	// funcion para inviar los archivos de invoice a la carpeta correspondiente
	public function enviar_inv()
	{
		if ($this->seguridad() == TRUE) {
			//obtencion de datos
			$archivos_obj = json_decode($_POST['archivos_invoice']);
			$id_cliente = $_POST['id_cliente'];

			//Desglose de datos
			foreach ($archivos_obj as $archivo_inf) {
				$id = $archivo_inf->id;
				$nombre_original = $archivo_inf->nombre_original;
				$ruta_carpeta  = $archivo_inf->path;
				$validacion_subida = false;

				//comprueba la cantidad de extensiones
				$var = explode(".", $_FILES[$id]["name"]);
				$longitud = count($var);
				//
				//comprueba que sea tipo imagen
				if ($_FILES[$id]['type'] == "image/png" || $_FILES[$id]['type'] == "image/jpg" || $_FILES[$id]['type'] == "image/jpeg" || $_FILES[$id]['type'] == "application/pdf" || $_FILES[$id]['type'] == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" || $_FILES[$id]['type'] == "application/vnd.ms-excel") {

					//comprobacion real de tipo, que no sea php o texto
					$file = $_FILES[$id];
					$finfo = finfo_open(FILEINFO_MIME_TYPE);
					if (finfo_file($finfo, $file["tmp_name"]) == "text/x-php" || finfo_file($finfo, $file["tmp_name"]) ==  "text/plain") {
						$validacion_subida = false;
					} else {
						$validacion_subida = true;
					}
					finfo_close($finfo);
					//
				}

				//validar ruta existe
				if (!file_exists($ruta_carpeta)) {
					mkdir($ruta_carpeta, 0777) or die("No se puede crear el directorio de extracci&oacute;n");
				}

				if ($longitud === 2 && $validacion_subida === true) {
					//obtenemos el path que debe tener actualmente en la bd
					$path_tmp = $id . '_' . $nombre_original;

					//get id_proveedor con id_cliente
					$id_consulta_row = $this->NuevoProyecto_model->get_id_prov($id_cliente, $path_tmp);
					//var_dump($id_consulta_row->id_proveedor_c);
					// convertir el valor a un entero
					$id_proveedor_c_value = $id_consulta_row->id_proveedor_c;

					//Get id_proyecto_base
					$id_consulta_pb_row = $this->NuevoProyecto_model->id_ultimo_proyecto_base($id_cliente);
					$id_pb = $id_consulta_pb_row->id_proyecto;

					//id_proveedor 		  id_proyecto_base 	tipo archivo
					$nuevo_nombre = $id_proveedor_c_value . '_' . $id_pb . '_invoice';

					//Creando nombre final y ruta
					$nombre_archivo = $nuevo_nombre . "." . pathinfo($_FILES[$id]["name"], PATHINFO_EXTENSION);
					$ruta_guardar_archivo = $ruta_carpeta . $nombre_archivo;

					//Subiendo el archivo
					if (move_uploaded_file($_FILES[$id]["tmp_name"], $ruta_guardar_archivo)) {
						//update campo path
						$datacambio = array('invoice_path' => $ruta_guardar_archivo,);
						$this->NuevoProyecto_model->update_path_prov($datacambio, $id_proveedor_c_value);
						echo json_encode($datacambio);
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
		}
	}

	// funcion para inviar los archivos de oem services a la carpeta correspondiente
	public function cargar_oem()
	{
		//Desglose de datos y obtencion de id_proyecto_base
			$id_cliente = $_POST['id_cliente'];
			$id_consulta_pb_row = $this->NuevoProyecto_model->id_ultimo_proyecto_base($id_cliente);
			$id_pb = $id_consulta_pb_row->id_proyecto;
			$ruta_carpeta = "files/oem_service/";
			$validacion_subida = false;
		//

		//comprueba la cantidad de extensiones
			$var = explode(".", $_FILES['oemservice_path']['name']);
			$longitud = count($var); 
		//

		//comprueba que sea tipo imagen
		if ($_FILES['oemservice_path']['type'] == "image/png" || $_FILES['oemservice_path']['type'] == "image/jpg" ||$_FILES['oemservice_path']['type'] == "image/jpeg" ) {
			
			//comprobacion real de tipo, que no sea php o texto
				$file = $_FILES["oemservice_path"];
				$finfo = finfo_open(FILEINFO_MIME_TYPE);
					if (finfo_file($finfo,$file["tmp_name"]) == "text/x-php" || finfo_file($finfo,$file["tmp_name"]) ==  "text/plain"){
						$validacion_subida = false;
					}else{
						$validacion_subida = true;
					}
				finfo_close($finfo);
			//
		}

		if ($longitud === 2 && $validacion_subida === true) {
			//validar ruta existe
			if (!file_exists($ruta_carpeta)) {
				mkdir($ruta_carpeta, 0777) or die("No se puede crear el directorio de extracci&oacute;n");
			}

			$nombre_archivo = $id_pb . "_imagen_oem" . "." . pathinfo($_FILES["oemservice_path"]["name"], PATHINFO_EXTENSION);

			$ruta_guardar_archivo = $ruta_carpeta . $nombre_archivo;

			if (move_uploaded_file($_FILES["oemservice_path"]["tmp_name"], $ruta_guardar_archivo)) {
				//update campo path
				$datacambio = array('oemservice_path' => $ruta_guardar_archivo,);
				$this->NuevoProyecto_model->update_path_oem($datacambio, $id_pb);
				echo json_encode($datacambio);
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
	
	// funcion para obtenr la media del producto de la cotizacion
	public function mediaProdCot()
	{
		if ($this->seguridad() == TRUE) {
			if ($this->input->is_ajax_request()) {
				$id_producto_cot = $this->input->post('id_producto_cot');
				$data = $this->NuevoProyecto_model->mediaProdCot($id_producto_cot);
				echo json_encode($data);
			} else {
				show_404();
			}
		} else {
			redirect(base_url() . 'Login');
		}
	}

	//obtiene los proveedores del cliente para el select2 del nuevo pedido
	public function getProveedoresCliente()
	{
		if ($this->seguridad() == TRUE) {
			if ($this->input->is_ajax_request()) {
				$id_cliente = $this->uri->segment(3);
				$data = $this->NuevoProyecto_model->getProveedores_clientes($id_cliente);
				echo json_encode($data);
			} else {
				show_404();
			}
		} else {
			redirect(base_url() . 'Login');
		}
	}

	// funcion para la seguridad
	public function seguridad()
	{
		if (($this->session->userdata('logueado') == 1) && ($this->session->userdata('tyc') == 1)) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
}
