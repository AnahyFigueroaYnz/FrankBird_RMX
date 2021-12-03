<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('Home_model');
		$this->load->library('versiones');
		$ver = $this->Home_model->get_version();
		$this->versiones->set_version($ver);
	}
	// -------------- VISTAS ---------------------

	public function index()
	{
		$this->load->view('headers/home/header');
		$this->load->view('headers/home/navbar');
		$this->load->view('home/inicio');
		$this->load->view('footers/home/footer');
		$this->load->view('footers/home/scripts');
	}
	/**  Función para cargar la vista de la barra de navegación: servicios */
	public function Servicios()
	{
		$this->load->view('headers/home/header');
		$this->load->view('headers/home/navbar');
		$this->load->view('home/servicios');
		$this->load->view('footers/home/footer');
		$this->load->view('footers/home/scripts');
	}
	/**  Función para cargar la vista de la barra de navegación: FAQs */
	public function FAQ()
	{
		$this->load->view('headers/home/header');
		$this->load->view('headers/home/navbar');
		$this->load->view('home/faqs');
		$this->load->view('footers/home/footer');
		$this->load->view('footers/home/scripts');
	}
	/**  Función para cargar la vista de la barra de navegación: Contactanos */
	public function Contactanos()
	{
		$this->load->view('headers/home/header');
		$this->load->view('headers/home/navbar');
		$this->load->view('home/contactanos');
		$this->load->view('footers/home/footer');
		$this->load->view('footers/home/scripts');
		$this->load->view('footers/cargar_js');
	}
	/**  Función para cargar la vista de la barra de navegación: Cotizador */
	public function Cotizador()
	{
		$data = array(
			'DATA_TIPOCAMBIO' => $this->Home_model->get_tipo_cambio(),
		);
		$this->load->view('headers/home/header');
		$this->load->view('headers/home/navbar');
		$this->load->view('home/cotizador', $data);
		$this->load->view('footers/home/footer');
		$this->load->view('footers/home/scripts');
	}
	public function get_tipo_cambio()
	{
		if ($this->input->is_ajax_request()) {
			$data = $this->Home_model->get_tipo_cambio();
			echo json_encode($data);
		} else {
			show_404();
		}
	}
	
	public function get_TarifaOrigen()
	{
		if ($this->input->is_ajax_request()) {
			$tipo_envio = $this->input->post('tipo_envio');
			$tipo_movimiento = $this->input->post('tipo_movimiento');
			if ($tipo_movimiento == "Exportar") {
				$movimiento = 2;
			}else if ($tipo_movimiento == "Importar") {
				$movimiento = 1;
			}
			$tarifas = $this->Home_model->get_tarifas($tipo_envio, $movimiento);
			$id_origen = array();
			foreach ($tarifas as $row) {
				array_push($id_origen, $row->id_origen);
			}
			$data = $this->Home_model->get_Destinos($id_origen);
			echo json_encode($data);
		} else {
			show_404();
		}
	}

	public function get_TarifaDestino()
	{
		if ($this->input->is_ajax_request()) {
			$tipo_envio = $this->input->post('tipo_envio');
			$id_origen = $this->input->post('id_origen');

			$destinos = $this->Home_model->get_tarifasWhere($id_origen, $tipo_envio);
			$id_destino = array();
			foreach ($destinos as $row) {
				array_push($id_destino, $row->id_destino);
			}
			$data = $this->Home_model->get_Destinos($id_destino);
			echo json_encode($data);
		} else {
			show_404();
		}
	}
	public function get_TarifaId()
	{
		if ($this->input->is_ajax_request()) {
			$id_origen = $this->input->post('id_origen');
			$id_destino = $this->input->post('id_destino');
			$data = $this->Home_model->get_AlldatosTarifa($id_origen,$id_destino);
			echo json_encode($data);
		} else {
			show_404();
		}
	}

	public function insertCotizador()
	{
		if ($this->input->is_ajax_request()) {
			//CREA EL FOLIO CUANDO ES PRIMERA VEZ QUE SE REGISTRA UNA COTIZACION, OBTIENE EL ULTIMO FOLIO REGISTRADO
	            $DATA_FOLIO = $this->Home_model->get_folioCotizador();
	            //CONTADOR PARA GENERAR EL NUMERO DE FOLIO E IRSE INCREMENTANDO EJ, 2020-1, 2020-2...
	            if ($DATA_FOLIO != FALSE) {
	                $Folio = $DATA_FOLIO->folio + 1; //SI YA HAY UN RESULTADO VA AGREGANDO 1
	                $fecha = $DATA_FOLIO->fecha_creacion; //OBTIENE LA FECHA 
	                $fecha_creacion = substr($fecha, 0,4); //TOMA LOS PRIMEROS 4 NUMEROS (EL AÑO)
	            } else {
	              $Folio = 1;
	              //SINO ASIGNA AL PRIMERO DEL AÑO
	              $fecha_creacion = date('Y');
	            }

	            if (date('Y') > $fecha_creacion) {
	              $Folio = 1;
	              //PARA CUANDO CAMBIE DE AÑO SE REINICIE EL CONTADOR
	            }
	        //
			$data = array(
				'id_catalogo' => trim($this->input->post('id_catalogo')),
				'folio' => $Folio,
				'tipo_solicitud' => trim($this->input->post('tipo_solicitud')),
				'tipo_envio' => trim($this->input->post('tipo_envio')),
				'tipo_contenedor' => trim($this->input->post('tipo_contenedor')),
				'volumen' => trim($this->input->post('volumen')),
				'peso' => trim($this->input->post('peso')),
				'origen' => trim($this->input->post('origen')),
				'destino' => trim($this->input->post('destino')),
				'comentarios' => trim($this->input->post('comentarios')),
				'contenedor' => trim($this->input->post('contenedor')),
				'cantidad_contenedor' => trim($this->input->post('cantidad_contenedor')),
				'tipo_cambio' => trim($this->input->post('tipo_cambio')),
				'nombre_producto' => trim($this->input->post('nombre_producto')),
				'valor_mercancia' => trim($this->input->post('valor_mercancia_usd')),
				'fracc_arancelaria' => trim($this->input->post('fracc_arancelaria')),
				'despacho_aduanal' => trim($this->input->post('despacho_aduanal')),
				'previo_origen' => trim($this->input->post('previo_origen')),
				'inspeccion_fabrica' => trim($this->input->post('inspeccion_fabrica')),
				'seguros_mercancia' => trim($this->input->post('seguros_mercancia')),
				'logistica' => trim($this->input->post('logistica')),
				'iva' => trim($this->input->post('iva')),
				'total' => trim($this->input->post('total')),
				'fecha_creacion' => trim($this->input->post('fecha_creacion')),
			);
			$this->Home_model->InsertCotizador($data);

			$dt =array(
				'Fecha' => str_replace("-", "", trim($this->input->post('fecha_creacion'))),
				'Folio' => $Folio,
			);
			echo json_encode($dt);

		} else {
			show_404();
		}
	}

	public function UpdateEmailCotizador()
	{
		if ($this->input->is_ajax_request()) {
			$fecha_creacion = trim($this->input->post('fecha_creacion'));
			$folio = trim($this->input->post('folio'));
			$Get_id = $this->Home_model->consultaIdCotizador($fecha_creacion, $folio);
				$id_cotizador = $Get_id->id_cotizador;
			$dataUp = array('email' => trim($this->input->post('email')));
			$this->Home_model->updateEmail($dataUp, $id_cotizador);
		} else {
			show_404();
		}
	}

	public function EnviarCorreoCotizador()
	{
		$this->load->library('mail');
		$email_to = trim($this->input->post('email'));
		$email_subject = "Cotizacion recibida";
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
			                        <td esdev-links-color="#757575" align="center" style="Margin:0;padding-top:10px;padding-bottom:20px;padding-left:30px;padding-right:30px;"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:15px;font-family:helvetica, \'helvetica neue\', arial, verdana, sans-serif;line-height:23px;color:#FFFFFF;">Confirmamos que hemos recibido tu cotización, en unos momentos uno de nuestros asesores se comunicará contigo.</p></td> 
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

		$this->mail->enviar_correo($email_from, $email_subject, $mensaje, $headers, $email_to);
	}
	
	// funcion de la vista del registro
	public function Crear_Cuenta()
	{
		if ($this->mantenimiento() == FALSE) {
			$data = array(
				'DATA_LADAS' => $this->Home_model->get_ladas(),
			);
			$this->load->view('headers/home/header');
			$this->load->view('home/sign_in', $data);
			$this->load->view('footers/home/scripts');
			$this->load->view('footers/cargar_js');
		} else {
			$this->load->view('mantenimiento/mantenimiento');
		}
	}
	// funcion para crear al usuario cliente
	public function crear_usuarios_h()
	{
		if ($this->input->is_ajax_request()) {
			$email = trim($this->input->post('email'));
			$nombre = trim($this->input->post('nombre'));

			$data = array(
				'id_nivelusuario' => trim($this->input->post('id_nivelusuario')),
				'email' => $email,
				'nombre' => $nombre,
				'id_lada' => trim($this->input->post('id_lada')),
				'telefono' => trim($this->input->post('telefono')),
				'contrasena' => trim($this->input->post('contrasena')),
				'tyc' => trim($this->input->post('tyc')),
			);

			$comprobacion = $this->Home_model->usuarioNoExistente($data);

			//si no existe trae falso, de lo contrario significa que existe
			if ($comprobacion == false) {
				$this->Home_model->insert_usuarios($data);
				$comprobacion_insert = $this->Home_model->usuarioNoExistente($data);
				if ($comprobacion_insert != false) {
					//Envio de correo
					$this->load->library('mail');
					$email_to = $email;
					$email_subject = "Bienvenido a ReachMX";
					$email_from = "hola@reachmx.com";

					$headers = '
							<meta charset="UTF-8">
						    <meta content="width=device-width, initial-scale=1" name="viewport">
						    <meta name="x-apple-disable-message-reformatting">
						    <meta http-equiv="X-UA-Compatible" content="IE=edge">
						    <meta content="telephone=no" name="format-detection">';

					$mensaje = '
							<div class="es-wrapper-color" style="background-color:#F1F1F1"> 
							   <table class="es-wrapper" width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;padding:0;Margin:0;width:100%;height:100%;background-repeat:repeat;background-position:center top"> 
							     <tr style="border-collapse:collapse"> 
							      <td valign="top" style="padding:0;Margin:0"> 
							       <table cellpadding="0" cellspacing="0" class="es-content" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%"> 
							         <tr style="border-collapse:collapse"> 
							          <td align="center" style="padding:0;Margin:0"> 
							           <table class="es-content-body" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:transparent;width:600px" cellspacing="0" cellpadding="0" align="center"> 
							             <tr style="border-collapse:collapse"> 
							              <td align="left" style="Margin:0;padding-left:10px;padding-right:10px;padding-top:15px;padding-bottom:15px"> 
							               <!--[if mso]><table style="width:580px" cellpadding="0" cellspacing="0"><tr><td style="width:282px" valign="top"><![endif]--> 
							               <table class="es-left" cellspacing="0" cellpadding="0" align="left" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:left"> 
							                 <tr style="border-collapse:collapse"> 
							                  <td align="left" style="padding:0;Margin:0;width:282px"> 
							                   <table width="100%" cellspacing="0" cellpadding="0" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px"> 
							                     <tr style="border-collapse:collapse"> 
							                      <td class="es-infoblock es-m-txt-c" align="left" style="padding:0;Margin:0;line-height:14px;font-size:12px;color:#CCCCCC"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:12px;font-family:arial, \'helvetica neue\', helvetica, sans-serif;line-height:14px;color:#CCCCCC">Put your preheader text here<br></p></td> 
							                     </tr> 
							                   </table></td> 
							                 </tr> 
							               </table> 
							               <!--[if mso]></td><td style="width:20px"></td><td style="width:278px" valign="top"><![endif]--> 
							               <table class="es-right" cellspacing="0" cellpadding="0" align="right" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:right"> 
							                 <tr style="border-collapse:collapse"> 
							                  <td align="left" style="padding:0;Margin:0;width:278px"> 
							                   <table width="100%" cellspacing="0" cellpadding="0" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px"> 
							                     <tr style="border-collapse:collapse"> 
							                      <td align="right" class="es-infoblock es-m-txt-c" style="padding:0;Margin:0;line-height:14px;font-size:12px;color:#CCCCCC"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:12px;font-family:helvetica, \'helvetica neue\', arial, verdana, sans-serif;line-height:14px;color:#CCCCCC"><a href="https://viewstripo.email/" class="view" target="_blank" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, \'helvetica neue\', helvetica, sans-serif;font-size:12px;text-decoration:underline;color:#CCCCCC">View in browser</a></p></td> 
							                     </tr> 
							                   </table></td> 
							                 </tr> 
							               </table> 
							               <!--[if mso]></td></tr></table><![endif]--></td> 
							             </tr> 
							           </table></td> 
							         </tr> 
							       </table> 
							       <table cellpadding="0" cellspacing="0" class="es-header" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;background-color:transparent;background-repeat:repeat;background-position:center top"> 
							         <tr style="border-collapse:collapse"> 
							          <td align="center" style="padding:0;Margin:0"> 
							           <table class="es-header-body" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#FFFFFF;width:600px" cellspacing="0" cellpadding="0" bgcolor="#ffffff" align="center"> 
							             <tr style="border-collapse:collapse"> 
							              <td style="Margin:0;padding-top:30px;padding-bottom:30px;padding-left:40px;padding-right:40px;background-color:transparent" bgcolor="transparent" align="left"> 
							               <table cellspacing="0" cellpadding="0" width="100%" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px"> 
							                 <tr style="border-collapse:collapse"> 
							                  <td valign="top" align="center" style="padding:0;Margin:0;width:520px"> 
							                   <table width="100%" cellspacing="0" cellpadding="0" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px"> 
							                     <tr style="border-collapse:collapse"> 
							                      <td align="center" style="padding:0;Margin:0;font-size:0px"><a href="https://www.reachmx.com" target="_blank" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:helvetica, \'helvetica neue\', arial, verdana, sans-serif;font-size:14px;text-decoration:underline;color:#FFFFFF"><img src="https://reachmx.com/template_home/img/logo.png" alt style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic" width="200" class="adapt-img"></a></td> 
							                     </tr> 
							                   </table></td> 
							                 </tr> 
							               </table></td> 
							             </tr> 
							           </table></td> 
							         </tr> 
							       </table> 
							       <table class="es-content" cellspacing="0" cellpadding="0" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%"> 
							         <tr style="border-collapse:collapse"> 
							          <td align="center" style="padding:0;Margin:0"> 
							           <table class="es-content-body" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#333333;width:600px" cellspacing="0" cellpadding="0" bgcolor="#333333" align="center"> 
							             <tr style="border-collapse:collapse"> 
							              <td style="Margin:0;padding-top:40px;padding-bottom:40px;padding-left:40px;padding-right:40px;background-color:#333333;background-image:url(https://www.reachmx.com/resources/banners/barco.jpeg);background-repeat:no-repeat;background-position:center top" align="left" bgcolor="#333333" background="images/78141586993453070.jpeg"> 
							               <table cellspacing="0" cellpadding="0" width="100%" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px"> 
							                 <tr style="border-collapse:collapse"> 
							                  <td valign="top" align="center" style="padding:0;Margin:0;width:520px"> 
							                   <table width="100%" cellspacing="0" cellpadding="0" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px"> 
							                     <tr style="border-collapse:collapse"> 
							                      <td align="center" style="padding:0;Margin:0;padding-bottom:10px;padding-top:40px"><h1 style="Margin:0;line-height:36px;mso-line-height-rule:exactly;font-family:lato, \'helvetica neue\', helvetica, arial, sans-serif;font-size:30px;font-style:normal;font-weight:bold;color:#FFFFFF">Bienvenido a Reachmx&nbsp;</h1></td> 
							                     </tr> 
							                     <tr style="border-collapse:collapse"> 
							                      <td esdev-links-color="#757575" align="center" style="Margin:0;padding-top:10px;padding-bottom:20px;padding-left:30px;padding-right:30px"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:15px;font-family:helvetica, \'helvetica neue\', arial, verdana, sans-serif;line-height:23px;color:#FFFFFF">La manera más rápida y eficiente de hacer tus importaciones<br></p></td> 
							                     </tr> 
							                     <tr style="border-collapse:collapse"> 
							                      <td align="center" style="padding:0;Margin:0;padding-top:10px;padding-bottom:20px"><span class="es-button-border" style="border-style:solid;border-color:#26A4D3;background:none 0% 0% repeat scroll #26A4D3;border-width:0px;display:inline-block;border-radius:50px;width:auto"><a href="https://reachmx.com/Home/Ingresar" class="es-button" target="_blank" style="mso-style-priority:100 !important;text-decoration:none;transition:all 100ms ease-in;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, \'helvetica neue\', helvetica, sans-serif;font-size:14px;color:#FFFFFF;border-style:solid;border-color:#26A4D3;border-width:15px 30px 15px 30px;display:inline-block;background:#26A4D3 none repeat scroll 0% 0%;border-radius:50px;font-weight:bold;font-style:normal;line-height:17px;width:auto;text-align:center">Ingresar</a></span></td> 
							                     </tr> 
							                   </table></td> 
							                 </tr> 
							               </table></td> 
							             </tr> 
							           </table></td> 
							         </tr> 
							       </table> 
							       <table class="es-content" cellspacing="0" cellpadding="0" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%"> 
							         <tr style="border-collapse:collapse"> 
							          <td align="center" style="padding:0;Margin:0"> 
							           <table class="es-content-body" cellspacing="0" cellpadding="0" bgcolor="#ffffff" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#FFFFFF;width:600px"> 
							             <tr style="border-collapse:collapse"> 
							              <td align="left" style="padding:0;Margin:0;padding-top:40px;padding-left:40px;padding-right:40px"> 
							               <table width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px"> 
							                 <tr style="border-collapse:collapse"> 
							                  <td valign="top" align="center" style="padding:0;Margin:0;width:520px"> 
							                   <table width="100%" cellspacing="0" cellpadding="0" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px"> 
							                     <tr style="border-collapse:collapse"> 
							                      <td class="es-m-txt-c" align="left" style="padding:0;Margin:0;padding-top:5px;padding-bottom:15px"><h2 style="Margin:0;line-height:24px;mso-line-height-rule:exactly;font-family:lato, \'helvetica neue\', helvetica, arial, sans-serif;font-size:20px;font-style:normal;font-weight:bold;color:#333333;text-align:center">¡Muchas gracias por registrarte!</h2></td> 
							                     </tr> 
							                     <tr style="border-collapse:collapse"> 
							                      <td align="left" style="padding:0;Margin:0;padding-bottom:10px"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:15px;font-family:helvetica, \'helvetica neue\', arial, verdana, sans-serif;line-height:23px;color:#555555">Para hacer tu primer proyecto de importación ingresa a tu cuenta y haz clic en <strong><span>Nuevo Pedido</span>.</strong></p></td> 
							                     </tr> 
							                     <tr style="border-collapse:collapse"> 
							                      <td align="left" style="padding:0;Margin:0;padding-top:10px;padding-bottom:10px"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:15px;font-family:helvetica, \'helvetica neue\', arial, verdana, sans-serif;line-height:23px;color:#555555">Con Reachmx estarás siempre actualizado del estatus de tu mercancía, de su ubicación exacta, logística y despacho aduanal automáticos, no tendrás nada de que preocuparte.&nbsp;</p></td> 
							                     </tr> 
							                     <tr style="border-collapse:collapse"> 
							                      <td align="left" style="padding:0;Margin:0;padding-top:10px;padding-bottom:10px"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:15px;font-family:helvetica, \'helvetica neue\', arial, verdana, sans-serif;line-height:23px;color:#555555">Atentamente</p></td> 
							                     </tr> 
							                   </table></td> 
							                 </tr> 
							               </table></td> 
							             </tr> 
							             <tr style="border-collapse:collapse"> 
							              <td align="left" style="Margin:0;padding-top:10px;padding-bottom:40px;padding-left:40px;padding-right:40px"> 
							               <!--[if mso]><table style="width:520px" cellpadding="0"
							                            cellspacing="0"><tr><td style="width:40px" valign="top"><![endif]--> 
							               <table class="es-left" cellspacing="0" cellpadding="0" align="left" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:left"> 
							                 <tr style="border-collapse:collapse"> 
							                  <td class="es-m-p0r es-m-p20b" valign="top" align="center" style="padding:0;Margin:0;width:40px"> 
							                   <table width="100%" cellspacing="0" cellpadding="0" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px"> 
							                     <tr style="border-collapse:collapse"> 
							                      <td align="left" style="padding:0;Margin:0;font-size:0px"><img src="https://www.reachmx.com/favicon.ico" alt style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic" width="40"></td> 
							                     </tr> 
							                   </table></td> 
							                 </tr> 
							               </table> 
							               <!--[if mso]></td><td style="width:20px"></td><td style="width:460px" valign="top"><![endif]--> 
							               <table cellspacing="0" cellpadding="0" align="right" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px"> 
							                 <tr style="border-collapse:collapse"> 
							                  <td align="left" style="padding:0;Margin:0;width:460px"> 
							                   <table width="100%" cellspacing="0" cellpadding="0" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px"> 
							                     <tr style="border-collapse:collapse"> 
							                      <td align="left" style="padding:0;Margin:0;padding-top:10px"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:14px;font-family:helvetica, \'helvetica neue\', arial, verdana, sans-serif;line-height:21px;color:#222222"><b>Equipo Reachmx</b></p></td> 
							                     </tr> 
							                     <tr style="border-collapse:collapse"> 
							                      <td align="left" style="padding:0;Margin:0"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:14px;font-family:helvetica, \'helvetica neue\', arial, verdana, sans-serif;line-height:21px;color:#666666">hola@reachmx.com</p></td> 
							                     </tr> 
							                   </table></td> 
							                 </tr> 
							               </table> 
							               <!--[if mso]></td></tr></table><![endif]--></td> 
							             </tr> 
							           </table></td> 
							         </tr> 
							       </table> 
							       <table class="es-content" cellspacing="0" cellpadding="0" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%"> 
							         <tr style="border-collapse:collapse"> 
							          <td align="center" style="padding:0;Margin:0"> 
							           <table class="es-content-body" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#26A4D3;width:600px" cellspacing="0" cellpadding="0" bgcolor="#26a4d3" align="center"> 
							             <tr style="border-collapse:collapse"> 
							              <td style="Margin:0;padding-bottom:20px;padding-top:40px;padding-left:40px;padding-right:40px;background-color:#26A4D3" bgcolor="#26a4d3" align="left"> 
							               <table width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px"> 
							                 <tr style="border-collapse:collapse"> 
							                  <td valign="top" align="center" style="padding:0;Margin:0;width:520px"> 
							                   <table width="100%" cellspacing="0" cellpadding="0" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px"> 
							                     <tr style="border-collapse:collapse"> 
							                      <td class="es-m-txt-c" align="center" style="padding:0;Margin:0"><h2 style="Margin:0;line-height:24px;mso-line-height-rule:exactly;font-family:lato, \'helvetica neue\', helvetica, arial, sans-serif;font-size:20px;font-style:normal;font-weight:bold;color:#FFFFFF">Tú éxito es lo que más importa</h2></td> 
							                     </tr> 
							                     <tr style="border-collapse:collapse"> 
							                      <td align="center" style="padding:0;Margin:0;padding-top:5px;padding-bottom:10px"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:17px;font-family:helvetica, \'helvetica neue\', arial, verdana, sans-serif;line-height:26px;color:#AAD4EA">#Tech&amp;Trade</p></td> 
							                     </tr> 
							                   </table></td> 
							                 </tr> 
							               </table></td> 
							             </tr> 
							           </table></td> 
							         </tr> 
							       </table> 
							       <table class="es-content" cellspacing="0" cellpadding="0" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%"> 
							         <tr style="border-collapse:collapse"> 
							          <td align="center" style="padding:0;Margin:0"> 
							           <table class="es-content-body" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#292828;width:600px" cellspacing="0" cellpadding="0" bgcolor="#292828" align="center"> 
							             <tr style="border-collapse:collapse"> 
							              <td align="left" bgcolor="#ffffff" style="Margin:0;padding-top:30px;padding-bottom:30px;padding-left:40px;padding-right:40px;background-color:#FFFFFF"> 
							               <table width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px"> 
							                 <tr style="border-collapse:collapse"> 
							                  <td valign="top" align="center" style="padding:0;Margin:0;width:520px"> 
							                   <table width="100%" cellspacing="0" cellpadding="0" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px"> 
							                     <tr style="border-collapse:collapse"> 
							                      <td align="center" style="padding:0;Margin:0;font-size:0"> 
							                       <table class="es-table-not-adapt es-social" cellspacing="0" cellpadding="0" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px"> 
							                         <tr style="border-collapse:collapse"> 
							                          <td valign="top" align="center" style="padding:0;Margin:0;padding-right:10px"><a target="_blank" href="https://www.facebook.com/reachmx" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:helvetica, \'helvetica neue\', arial, verdana, sans-serif;font-size:15px;text-decoration:underline;color:#26A4D3"><img title="Facebook" src="https://zftph.stripocdn.email/content/assets/img/social-icons/logo-colored/facebook-logo-colored.png" alt="Fb" width="32" height="32" style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic"></a></td> 
							                          <td valign="top" align="center" style="padding:0;Margin:0;padding-right:10px"><a target="_blank" href="https://www.twitter.com/reachmxs" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:helvetica, \'helvetica neue\', arial, verdana, sans-serif;font-size:15px;text-decoration:underline;color:#26A4D3"><img title="Twitter" src="https://zftph.stripocdn.email/content/assets/img/social-icons/logo-colored/twitter-logo-colored.png" alt="Tw" width="32" height="32" style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic"></a></td> 
							                          <td valign="top" align="center" style="padding:0;Margin:0;padding-right:10px"><a target="_blank" href="https://www.instagram.com/reachmx_" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:helvetica, \'helvetica neue\', arial, verdana, sans-serif;font-size:15px;text-decoration:underline;color:#26A4D3"><img title="Instagram" src="https://zftph.stripocdn.email/content/assets/img/social-icons/logo-colored/instagram-logo-colored.png" alt="Inst" width="32" height="32" style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic"></a></td> 
							                          <td valign="top" align="center" style="padding:0;Margin:0"><a target="_blank" href="https://www.linkedin.com/company/reachmx-trade-solutions" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:helvetica, \'helvetica neue\', arial, verdana, sans-serif;font-size:15px;text-decoration:underline;color:#26A4D3"><img title="Linkedin" src="https://zftph.stripocdn.email/content/assets/img/social-icons/logo-colored/linkedin-logo-colored.png" alt="In" width="32" height="32" style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic"></a></td> 
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
							     </tr> 
							   </table> 
							</div>';

					$this->mail->enviar_correo($email_from, $email_subject, $mensaje, $headers, $email_to);

					$data_au = array(
						'usuario' => $this->input->post('email', true),
						'password' => $this->input->post('contrasena', true),
					);

					$query = $this->Home_model->auntenticar($data_au);

					if ($query != false) {
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

						$data_x  = array('insert' => true, 'autenticacion' => true,);
						echo json_encode($data_x);
					} else {
						$data_x  = array('insert' => true, 'autenticacion' => false,);
						echo json_encode($data_x);
					}
				} else {
					$data_x  = array('insert' => false, 'info' => 'error al insertar',);
					echo json_encode($data_x);
				}
			} else {
				$data_x = array('insert' => false, 'info' => 'ya existe',);
				echo json_encode($data_x);
			}
		} else {
			show_404();
		}
	}
	// funcion de la vista de login segun el nievel de usuario logeado
	public function Ingresar()
	{
		$nivel = $this->session->userdata('nivel');

		if ($this->seguridad() == TRUE) {
			if ($this->mantenimiento() == FALSE) {
				if ($nivel == 1) { //admin 
					redirect(base_url() . 'Mantenimiento/DashboardRoot');
				} else if ($nivel == 2) { //admin 
					redirect(base_url() . 'Plataforma/DashboardAdministrador');
				} else if ($nivel == 3) { //asesor 
					redirect(base_url() . 'Plataforma/DashboardAsesor');
				} else if ($nivel == 4) { //cliente
					redirect(base_url() . 'Clientes/DashboardCliente');
				} else if ($nivel == 5) { //Agente
					redirect(base_url() . 'Plataforma/DashboardAgente');
				}
			} else {
				$this->load->view('mantenimiento/mantenimiento');
			}
		} else {
			$this->load->view('headers/home/header');
			$this->load->view('home/login');
			$this->load->view('footers/home/scripts');
			$this->load->view('footers/cargar_js');
		}
	}
	/*Funcion para el login*/
	public function fun_login()
	{
		if ($this->input->is_ajax_request()) {
			$data = array(
				'usuario' => $this->input->post('email', true),
				'password' => $this->input->post('contrasena', true),
			);
			
			$query = $this->Home_model->auntenticar($data);

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
	/*Función para el logout*/
	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url());
	}
	// funcion para recuperar la contraseña del usuario
	public function Recuperar_Cuenta()
	{
		$this->load->view('headers/home/header');
		$this->load->view('home/recovery');
		$this->load->view('footers/home/scripts');
		$this->load->view('footers/cargar_js');
	}
	// Funcion para enviar CORREO de vista contacto 
	public function EnviandoCorreo()
	{
		$this->load->library('mail');
		if ($this->input->is_ajax_request()) {

			$user_name = $this->input->post('u_name', true);
			$email_from = $this->input->post('u_email', true);
			$email_subject = $this->input->post('u_subject', true);
			$user_content = $this->input->post('u_content', true);
			$user_phone = $this->input->post('u_phone', true);

			$mensaje = '
				<div class="es-wrapper-color">
			        <table class="es-wrapper" width="100%" cellspacing="0" cellpadding="0" style="background-position: center top;">
			            <tbody>
			                <tr>
			                    <td class="esd-email-paddings st-br" valign="top">
			                        <table cellpadding="0" cellspacing="0" class="es-header esd-header-popover" align="center">
			                            <tbody>
			                                <tr>
			                                    <td class="esd-stripe esd-checked" align="center" style="background-color: transparent;" bgcolor="transparent">
			                                        <div>
			                                            <table class="es-header-body" align="center" cellpadding="0" cellspacing="0" width="600" bgcolor="#ffffff" style="background-color: #ffffff;">
			                                                <tbody>
			                                                    <tr>
			                                                        <td class="esd-structure es-p20t es-p20b es-p20r es-p20l" align="left">
			                                                            <table cellpadding="0" cellspacing="0" width="100%">
			                                                                <tbody>
			                                                                    <tr>
			                                                                        <td width="560" class="esd-container-frame" align="center" valign="top">
			                                                                            <table cellpadding="0" cellspacing="0" width="100%">
			                                                                                <tbody>
			                                                                                    <tr>
			                                                                                        <td align="center" class="esd-block-image" style="font-size: 0px; height: 80px;"><a target="_blank" href="https://reachmx.com"><img src="https://reachmx.com/template_home/img/logo.png" alt style="display: block; width: 250px; height: 63px;" class="adapt-img" height="63"></a></td>
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
			                                        </div>
			                                    </td>
			                                </tr>
			                            </tbody>
			                        </table>
			                        <table cellpadding="0" cellspacing="0" class="esd-footer-popover es-content" align="center">
			                            <tbody>
			                                <tr>
			                                    <td class="esd-stripe" align="center">
			                                        <table class="es-content-body" align="center" cellpadding="0" cellspacing="0" width="600" bgcolor="rgba(0, 0, 0, 0)">
			                                            <tbody>
			                                                <tr>
			                                                  <td class="esd-structure es-p5t es-p30r es-p30l" align="left" style="border-radius: 0px 0px 10px 10px; background-color: #26a4d3;" bgcolor="#26A4D3">   
			                                                    <table cellpadding="0" cellspacing="0" width="100%">
			                                                      <tbody>
			                                                          <tr>
			                                                              <td width="540" class="esd-container-frame" align="center" valign="top">
			                                                                  <table cellpadding="0" cellspacing="0" width="100%">
			                                                                      <tbody>
			                                                                          <tr>
			                                                                              <td align="center" class="esd-block-text">
			                                                                                  <h1 style="color: #ffffff; font-family: helvetica, \'helvetica neue\', arial, verdana, sans-serif;">' . $email_subject . '</h1>
			                                                                              </td>
			                                                                          </tr>
			                                                                          <tr>
			                                                                              <td align="center" class="esd-block-text es-p20t">
			                                                                                  <p style="font-family: helvetica, \'helvetica neue\', arial, verdana, sans-serif; color: #ffffff;">El usuario ' . $user_name . ' ha escrito:</p>
			                                                                              </td>
			                                                                          </tr>
			                                                                          <tr>
			                                                                              <td align="left" class="esd-block-text">
			                                                                                  <div style="line-height: 200%; color: #ffffff; text-align: center;">' . $user_content . '</div>
			                                                                              </td>
			                                                                          </tr>
			                                                                          <tr>
			                                                                              <td align="left" class="esd-block-text">
			                                                                                  <ul>
			                                                                                      <li style="text-align: justify; line-height: 200%; color: #ffffff;">Telefono de contacto: ' . $user_phone . '</li>
			                                                                                      <li style="text-align: justify; line-height: 200%; color: #ffffff;">Email de contacto: ' . $email_from . '</li>
			                                                                                  </ul>
			                                                                              </td>
			                                                                          </tr>
			                                                                          <tr>
			                                                                              <td align="center" class="esd-block-image" style="font-size: 0px;">
			                                                                                  <a target="_blank">
			                                                                                      <img class="adapt-img" src="https://www.reachmx.com/resources/banners/banner_11.png" alt style="display: block;" width="540">
			                                                                                  </a>
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

			$headers = '
				<meta charset="UTF-8">
			    <meta content="width=device-width, initial-scale=1" name="viewport">
			    <meta name="x-apple-disable-message-reformatting">
			    <meta http-equiv="X-UA-Compatible" content="IE=edge">
			    <meta content="telephone=no" name="format-detection">';

			$email_to = 'hector@reachmx.com, abraham@reachmx.com, marina@reachmx.com, jose@reachmx.com, monica@reachmx.com';

			$this->mail->enviar_correo($email_from, $email_subject, $mensaje, $headers, $email_to);
		} else {
			show_404();
		}
	}
	// funcion para enviar la contraseña por el correo electronico registrado
	public function enviarContrasena()
	{
		$this->load->library('mail');
		if (($this->input->post('email', true))) {
			$email = $this->input->post('email');
			$DATA_CORREO = $this->Home_model->get_password($email);
			if ($DATA_CORREO != FALSE) {
				foreach ($DATA_CORREO->result() as $row) {
					$password = $row->contrasena;
				}
				// Debes editar las próximas dos líneas de código de acuerdo con tus preferencias
				$email_to = $email;
				$email_subject = "RESTABLECER CONTRASEÑA";
				$email_from = "no-reply@reachmx.com";

				$headers = '
					<meta charset="UTF-8">
				    <meta content="width=device-width, initial-scale=1" name="viewport">
				    <meta name="x-apple-disable-message-reformatting">
				    <meta http-equiv="X-UA-Compatible" content="IE=edge">
				    <meta content="telephone=no" name="format-detection">';

				// Aquí se deberían validar los datos ingresados por el usuario
				if (!null ===($this->input->post('email'))) {
					$data = array('error' => 'formulario no enviado',);
					echo json_encode($data);
				}
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
			                                  <h1 style="Margin: 0;line-height:36px;mso-line-height-rule:exactly;font-family:lato, \'helvetica neue\', helvetica, arial, sans-serif;font-size:30px;font-style:normal;font-weight:bold;color:#FFFFFF;">Recuperación de contraseña</h1>
			                                </td> 
			                               </tr> 
			                               <tr style="border-collapse:collapse;"> 
			                                <td esdev-links-color="#757575" align="center" style="Margin:0;padding-top:10px;padding-bottom:20px;padding-left:30px;padding-right:30px;"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:15px;font-family:helvetica, \'helvetica neue\', arial, verdana, sans-serif;line-height:23px;color:#FFFFFF;">Su contraseña es: ' . $password . '</p></td> 
			                               </tr> 
			                               <tr style="border-collapse:collapse;"> 
			                                <td align="center" style="padding:0;Margin:0;padding-top:10px;padding-bottom:20px;">
			                                  <span class="es-button-border" style="border-style:solid;border-color:#26A4D3;background:none 0% 0% repeat scroll #26A4D3;border-width:0px;display:inline-block;border-radius:50px;width:auto;">
			                                    <a href="https://reachmx.com/Home/Ingresar" class="es-button" target="_blank" style="mso-style-priority:100 !important;text-decoration:none;transition:all 100ms ease-in;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, \'helvetica neue\', helvetica, sans-serif;font-size:14px;color:#FFFFFF;border-style:solid;border-color:#26A4D3;border-width:15px 30px 15px 30px;display:inline-block;background:#26A4D3 none repeat scroll 0% 0%;border-radius:50px;font-weight:bold;font-style:normal;line-height:17px;width:auto;text-align:center;">Entrar a mi cuenta</a>
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

				// Ahora se envía el e-mail usando la función mail() de PHP
				$this->mail->enviar_correo($email_from, $email_subject, $mensaje, $headers, $email_to);
			    $data = array('error' => 'Enviado correctamente',);
				echo json_encode($data);
			} else {
				$data = array('error' => 'No encontrado',);
				echo json_encode($data);
			}
		}
	}
	// funcion para ver los terminos y condificiones
	public function Terminos_Condiciones()
	{
		$this->load->view('headers/home/header');
		$this->load->view('headers/home/navbar');
		$this->load->view('home/tyc');
		$this->load->view('footers/home/footer');
		$this->load->view('footers/home/scripts');
	}
	// funcion para ver las politicas de privacidad
	public function Politica_Privacidad()
	{
		$this->load->view('headers/home/header');
		$this->load->view('headers/home/navbar');
		$this->load->view('home/politicas');
		$this->load->view('footers/home/footer');
		$this->load->view('footers/home/scripts');
	}
	// obtner la informacion del usuarios
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

	public function getLastCotizador()
	{
		if ($this->input->is_ajax_request()) {
			$data = $this->Home_model->get_folioCotizador();
			echo json_encode($data);
		} else {
			show_404();
		}
	}

	// Actualizar los permisos del usuarios
	public function update_tyc()
	{
		if ($this->input->is_ajax_request()) {
			$id_usuario = $this->input->post('id_usuario');
			$data = array('tyc' => $this->input->post('tyc'),);
			$this->Home_model->update_tyc($data, $id_usuario);
			echo json_encode($data);
		} else {
			show_404();
		}
	}
	// funcion de seguridad
	public function seguridad()
	{
		if (($this->session->userdata('logueado') == 1) && ($this->session->userdata('tyc') == 1)) {
			return true;
		} else {
			return false;
		}
	}
	// funcion del mantenimiento
	public function mantenimiento()
	{
		$nivel = $this->session->userdata('nivel');
		$consulta_controller = $this->Home_model->get_status_C();
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
