<?php
defined('BASEPATH') or exit('No direct script access allowed');

class NuevoProyecto extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Clientes_model');

		$this->load->library('versiones');
		$ver = $this->Clientes_model->get_version();
		$this->versiones->set_version($ver);
	}

	// funcion para hacer un nuevo pedido
	public function index()
	{
		if ($this->mantenimiento() == FALSE) {
			if ($this->seguridad() == TRUE) {
				$id_usuario = $this->session->userdata('id_usuario');

				$data = array(
					'data_unidades' => $this->Clientes_model->get_unidades(),
					'DATA_LADAS' => $this->Clientes_model->get_ladas(),
				);
				$this->load->view('headers/header');
				$this->load->view('headers/navBar_plataforma');
				$this->load->view('plataforma/cliente/pedidos/nuevo_pedido/nuevo_pedido', $data);
				$this->load->view('footers/footer_cierre');
				$this->load->view('footers/footer-script');
				$this->load->view('footers/cargar_js');
			} else {
				redirect(base_url() . 'Home');
			}
		} else {
			$this->load->view('mantenimiento/mantenimiento');
		}
	}
	
	// estatus de proyectos del cliente
	public function statusProyectoCliente()
	{
		if ($this->seguridad() == TRUE) {
			if ($this->input->is_ajax_request()) {
				$id_usuario = $this->session->userdata('id_usuario');
				$data = $this->Clientes_model->noMyProyectos($id_usuario);
				echo json_encode($data);
			} else {
				show_404();
			}
		} else {
			redirect(base_url() . 'Home');
		}
	}
	// obtener el ultimo id del producto sin proveedor
	public function last_id_prod_sp()
	{
		if ($this->seguridad() == TRUE) {
			if ($this->input->is_ajax_request()) {

				//$id_cliente = $this->input->post('id_cliente');

				$data = array(
					'DATA_LASTIDSP' => $this->Clientes_model->id_ultimo_prod_sp(),
				);
				echo json_encode($data);
			} else {
				show_404();
			}
		} else {
			redirect(base_url() . 'Home');
		}
	}
	// funcion para obtener el ultimo id del proyecto base
	public function last_id_pb()
	{
		if ($this->seguridad() == TRUE) {
			if ($this->input->is_ajax_request()) {

				$id_cliente = $this->input->post('id_cliente');

				$data = array(
					'DATA_LASTIDPB' => $this->Clientes_model->id_ultimo_proyecto_base($id_cliente),
				);
				echo json_encode($data);
			} else {
				show_404();
			}
		} else {
			redirect(base_url() . 'Home');
		}
	}
	// fucnion para agregar el proyecto base
	public function agregar_proyecto_base()
	{
		if ($this->seguridad() == TRUE) {
			if ($this->input->is_ajax_request()) {

				//CREA EL FOLIO CUANDO ES PRIMERA VEZ QUE SE REGISTRA UN PROYECTO, OBTIENE EL ULTIMO FOLIO REGISTRADO
					$DATA_FOLIO = $this->Clientes_model->get_folio();
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
				$this->Clientes_model->insert_proyecto($data_proyecto);

				// consultar el ultimo id del proyecto insertado por el cliente 
				$id_proyecto_row = $this->Clientes_model->id_ultimo_proyecto($data_proyecto_base["id_cliente"]);

				// convertir el valor a un entero
				$id_proyecto_value = $id_proyecto_row->id_proyecto;

				//insertar en tabla coordenadas con status 0
				$data_coord = array('id_proyecto' =>  $id_proyecto_value,);
				$this->Clientes_model->insert_into_coordenadas($data_coord);

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
						$this->Clientes_model->insert_sourcing($data_task1);
						$this->Clientes_model->insert_sourcing($data_task2);
						$this->Clientes_model->insert_sourcing($data_task3);
						$this->Clientes_model->insert_sourcing($data_task4);
						$this->Clientes_model->insert_sourcing($data_task5);
						$this->Clientes_model->insert_sourcing($data_task6);
						$this->Clientes_model->insert_sourcing($data_task7);
						$this->Clientes_model->insert_sourcing($data_task8);
						$this->Clientes_model->insert_sourcing($data_task9);
						$this->Clientes_model->insert_sourcing($data_task10);
					// production
						$this->Clientes_model->insert_production($data_task11);
						$this->Clientes_model->insert_production($data_task12);
						$this->Clientes_model->insert_production($data_task13);
						$this->Clientes_model->insert_production($data_task14);
						$this->Clientes_model->insert_production($data_task15);
						$this->Clientes_model->insert_production($data_task16);
						$this->Clientes_model->insert_production($data_task17);
						$this->Clientes_model->insert_production($data_task18);
						$this->Clientes_model->insert_production($data_task19);
					// freight
						$this->Clientes_model->insert_freight($data_task20);
						$this->Clientes_model->insert_freight($data_task21);
						$this->Clientes_model->insert_freight($data_task22);
						$this->Clientes_model->insert_freight($data_task23);
						$this->Clientes_model->insert_freight($data_task24);
					// customs
						$this->Clientes_model->insert_customs($data_task25);
						$this->Clientes_model->insert_customs($data_task26);
						$this->Clientes_model->insert_customs($data_task27);
						$this->Clientes_model->insert_customs($data_task28);
						$this->Clientes_model->insert_customs($data_task29);
					// quoted
						$this->Clientes_model->insert_quoted($data_task30);
						$this->Clientes_model->insert_quoted($data_task31);
						$this->Clientes_model->insert_quoted($data_task32);
					// done
						$this->Clientes_model->insert_done($data_task33);

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
							$this->Clientes_model->insert_proveedor_cliente($data_proveedor_cliente_controller_enviar);

							//Consulta para obtener el ultimo id_proveedor_c que ha insertado el cliente
							$id_proveedor_c_row = $this->Clientes_model->get_last_id_proveedor_cliente($id_proyecto_value);

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
									$this->Clientes_model->insert_productos_cliente($data_producto_cliente);
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
									$this->Clientes_model->insert_productos_cliente($data_producto_cliente);
								}
							}
						} else {
							show_404();
						}
					}

				//envio correo cliente
				$id_cliente = $data_proyecto_base["id_cliente"];
				$data_email = $this->Clientes_model->get_email($id_cliente);
				$email = $data_email->email;
				$nombre = $data_email->nombre;
				$telefono_cliente = $data_email->telefono;
				if ($telefono_cliente == Null) {
					$telefono_cliente = 'No hay telefono registrado';
				}

				$this->load->library('mail');
				$email_to = $email;
				$email_subject = "Nuevo pedido realizado";
				$email_from = "no-reply@reachmx.com";

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
						                          <h1 style="Margin: 0;line-height:36px;mso-line-height-rule:exactly;font-family:lato, \'helvetica neue\', helvetica, arial, sans-serif;font-size:30px;font-style:normal;font-weight:bold;color:#FFFFFF;">¡Gracias por confiar en nosotros, Importa + fácil con ReachMx!</h1>
						                        </td> 
						                       </tr> 
						                       <tr style="border-collapse:collapse;"> 
						                        <td esdev-links-color="#757575" align="center" style="Margin:0;padding-top:10px;padding-bottom:20px;padding-left:30px;padding-right:30px;"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:15px;font-family:helvetica, \'helvetica neue\', arial, verdana, sans-serif;line-height:23px;color:#FFFFFF;">Confirmamos de recibido tu pedido, en un momento uno de nuestros asesores se comunicara contigo</p></td> 
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
						         </table>
						        </td>
						      </tr>
						    </tbody>
						  </table>
						</div>';

					//$this->mail->enviar_correo($email_from, $email_subject, $mensaje, $headers, $email_to);

				//Envio notificacion
					$consulta_admins = $this->Clientes_model->get_admins();
					$email_fr = 'marina@reachmx.com';
					$date = new DateTime();
					$fecha = $date->format('Y/m/d');
					$mensaje_admins='
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
						                          <h1 style="Margin: 0;line-height:36px;mso-line-height-rule:exactly;font-family:lato, \'helvetica neue\', helvetica, arial, sans-serif;font-size:30px;font-style:normal;font-weight:bold;color:#FFFFFF;">¡Nuevo pedido!</h1>
						                          <br>
						                          <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:16px;font-family:helvetica, \'helvetica neue\', arial, verdana, sans-serif;line-height:24px;color:#FFFFFF">Folio: <strong>'.date('Y').'-'.$Folio .'</strong></p>
						                        </td> 
						                       </tr> ';
						                       foreach ($pedido as $pedido_individual) {
													//if para tomar los datos del arreglo que pertenecen a PROVEEDOR_CLIENTE
													if ($pedido_individual["tipo_data"] == "proveedor_cliente") {
														$data_proveedor_cliente_controller = array(
															'id_prov_interno' => $pedido_individual["id_prov_interno"],
															'proveedor' => $pedido_individual["proveedor"],
															//invoice
														);
														//foreach para el desglose interno de los productos del proveedor
														foreach ($pedido_individual["productos"] as $producto) {
															//Datos para tabla productos_clientes						
															if ($data_proveedor_cliente_controller["id_prov_interno"] == $producto["id_prov_interno"]) {
																$producto_proveedor_c = $producto["prod"];
																$cantidad_proveedor_c = $producto["cant"];
																$id_unidad_md  = $producto["unidades"];
																$especificaciones_prod_c = $producto["especificaciones"];
																//buscar unidades
																	$consult_unidad = $this->Clientes_model->get_unidades_correo($id_unidad_md);
																		$unidad = $consult_unidad->unidad_medida;
															
																$mensaje_admins.='
																<tr style="border-collapse:collapse"> 
																	<td esdev-links-color="#757575" align="left" style="Margin:0;padding-top:10px;padding-bottom:20px;padding-left:30px;padding-right:30px">
																		<p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:16px;font-family:helvetica, \'helvetica neue\', arial, verdana, sans-serif;line-height:24px;color:#FFFFFF">
																			<strong>Producto:</strong><span style="color:#ffffff"><strong>'.$producto_proveedor_c.'</strong></span>
																			<br>
																			<strong>Cantidad:&nbsp;</strong> &nbsp;<span style="color:#ffffff">'.$cantidad_proveedor_c. ' '. $unidad.'</span>
																		</p>
																		<p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:16px;font-family:helvetica, \'helvetica neue\', arial, verdana, sans-serif;line-height:24px;color:#FFFFFF">
																			<strong>Especificaciones: </strong><span style="color:#ffffff">'.$especificaciones_prod_c.'</span></p>								
																	</td> 
																</tr>';
															}
														}
													} else if ($pedido_individual["tipo_data"] == "productos_sp_cliente") {
														//Datos para tabla productos_sp_clientes
															$producto_sp_c = $pedido_individual["producto"];
															$cantidad_sp_c = $pedido_individual["cantidad"];
															$id_unidad_md  = $pedido_individual["unidades"];
															$especificaciones_sp_c = $pedido_individual["especificaciones"];
															//buscar unidades
																$consult_unidad = $this->Clientes_model->get_unidades_correo($id_unidad_md);
																	$unidad = $consult_unidad->unidad_medida;
															$mensaje_admins.='
															<tr style="border-collapse:collapse"> 
																<td esdev-links-color="#757575" align="left" style="Margin:0;padding-top:10px;padding-bottom:20px;padding-left:30px;padding-right:30px">
																	<p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:16px;font-family:helvetica, \'helvetica neue\', arial, verdana, sans-serif;line-height:24px;color:#FFFFFF">
																		<strong>Producto:</strong><span style="color:#ffffff"><strong>'.$producto_sp_c.'</strong></span>
																		<br>
																		<strong>Cantidad:&nbsp;</strong> &nbsp;<span style="color:#ffffff">'.$cantidad_sp_c. ' '. $unidad.'</span>
																	</p>
																	<p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:16px;font-family:helvetica, \'helvetica neue\', arial, verdana, sans-serif;line-height:24px;color:#FFFFFF">
																		<strong>Especificaciones: </strong><span style="color:#ffffff">'.$especificaciones_sp_c.'</span></p>								
																</td> 
															</tr>';
													}
												}
												$mensaje_admins.='
												<tr style="border-collapse:collapse"> 
													<td esdev-links-color="#757575" align="left" style="Margin:0;padding-bottom:20px;padding-left:30px;padding-right:20px">
														<p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:16px;font-family:helvetica, \'helvetica neue\', arial, verdana, sans-serif;line-height:24px;color:#FFFFFF"><strong>Correo de cliente:</strong><span style="color:#ffffff">' . $email_to . '</span></p>
														<p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:16px;font-family:helvetica, \'helvetica neue\', arial, verdana, sans-serif;line-height:24px;color:#FFFFFF"><strong>Celular: </strong><span style="color:#ffffff">' . $telefono_cliente . '</span></p>
														<p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:16px;font-family:helvetica, \'helvetica neue\', arial, verdana, sans-serif;line-height:24px;color:#FFFFFF"><br></p>
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
						         </table>
						        </td>
						      </tr>
						    </tbody>
						  </table>
						</div>';
					
					foreach ($consulta_admins->result() as $row) {
						$email_admin = $row->email;
						$data_notificacion = array(
							'id_get' => $row->id_usuario,
							'mensaje' => 'Se ha registrado un nuevo pedido',
							'fecha' => $fecha,
						);
						$this->Clientes_model->insert_notificacion($data_notificacion);
						echo json_encode($data_notificacion);

						//$this->mail->enviar_correo($email_fr, $email_subject, $mensaje_admins, $headers, $email_admin);
					} 
			} else {
				show_404();
			}
		} else {
			redirect(base_url() . 'Home');
		}
	}
	// funcion para enviar la imagenes del pedido a la carpeta
	public function enviar()
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
					$id_consulta_row = $this->Clientes_model->get_id_prod_sp($id_cliente, $path_tmp);
					// convertir el valor a un entero
					$id_producto_sp_c_val = $id_consulta_row->id_producto_sp_c;

					//Get id_proyecto_base
					$id_consulta_pb_row = $this->Clientes_model->id_ultimo_proyecto_base($id_cliente);
					$id_pb = $id_consulta_pb_row->id_proyecto;

					$nuevo_nombre = $id_producto_sp_c_val . '_' . $id_pb . '_producto_sp';

					$nombre_archivo = $nuevo_nombre . "." . pathinfo($_FILES[$id]["name"], PATHINFO_EXTENSION);
					$ruta_guardar_archivo = $ruta_carpeta . $nombre_archivo;

					if (move_uploaded_file($_FILES[$id]["tmp_name"], $ruta_guardar_archivo)) {
						//update campo path
						$datacambio = array('img_path' => $ruta_guardar_archivo,);
						$this->Clientes_model->update_path_prod_sp($datacambio, $id_producto_sp_c_val);
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
			redirect(base_url() . 'Home');
		}
	}

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
					$id_consulta_row = $this->Clientes_model->get_id_prod_prov($id_cliente, $path_tmp);
					// convertir el valor a un entero
					$id_producto_c_val = $id_consulta_row->id_producto_c;

					//Get id_proyecto_base
					$id_consulta_pb_row = $this->Clientes_model->id_ultimo_proyecto_base($id_cliente);
					$id_pb = $id_consulta_pb_row->id_proyecto;

					$nuevo_nombre = $id_producto_c_val . '_' . $id_pb . '_producto_prov';

					$nombre_archivo = $nuevo_nombre . "." . pathinfo($_FILES[$id]["name"], PATHINFO_EXTENSION);
					$ruta_guardar_archivo = $ruta_carpeta . $nombre_archivo;

					if (move_uploaded_file($_FILES[$id]["tmp_name"], $ruta_guardar_archivo)) {
						//update campo path
						$datacambio = array('img_path' => $ruta_guardar_archivo,);
						$this->Clientes_model->update_path_prod_prov($datacambio, $id_producto_c_val);
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
			redirect(base_url() . 'Home');
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
					$id_consulta_row = $this->Clientes_model->get_id_prov($id_cliente, $path_tmp);
					//var_dump($id_consulta_row->id_proveedor_c);
					// convertir el valor a un entero
					$id_proveedor_c_value = $id_consulta_row->id_proveedor_c;

					//Get id_proyecto_base
					$id_consulta_pb_row = $this->Clientes_model->id_ultimo_proyecto_base($id_cliente);
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
						$this->Clientes_model->update_path_prov($datacambio, $id_proveedor_c_value);
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
			$id_consulta_pb_row = $this->Clientes_model->id_ultimo_proyecto_base($id_cliente);
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
				$this->Clientes_model->update_path_oem($datacambio, $id_pb);
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
				$data = $this->Clientes_model->mediaProdCot($id_producto_cot);
				echo json_encode($data);
			} else {
				show_404();
			}
		} else {
			redirect(base_url() . 'Home');
		}
	}

	//obtiene los proveedores del cliente para el select2 del nuevo pedido
	public function getProveedoresCliente()
	{
		if ($this->seguridad() == TRUE) {
			if ($this->input->is_ajax_request()) {
				$id_cliente = $this->uri->segment(3);
				$data = $this->Clientes_model->getProveedores_clientes($id_cliente);
				echo json_encode($data);
			} else {
				show_404();
			}
		} else {
			redirect(base_url() . 'Home');
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
	// funcion para el mantenimiento
	public function mantenimiento()
	{
		$nivel = $this->session->userdata('nivel');
		$consulta_controller = $this->Clientes_model->get_status_C();
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
