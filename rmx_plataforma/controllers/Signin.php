<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Signin extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('Signin_model');
		$this->load->library('versiones');
		$ver = $this->Signin_model->get_version();
		$this->versiones->set_version($ver);
	}
	// -------------- VISTAS ---------------------
	// funcion de la vista del registro
	public function index()
	{
		if ($this->mantenimiento() == FALSE) {
			$data = array(
				'DATA_LADAS' => $this->Signin_model->get_ladas(),
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

			$comprobacion = $this->Signin_model->usuarioNoExistente($data);

			//si no existe trae falso, de lo contrario significa que existe
			if ($comprobacion == false) {
				$this->Signin_model->insert_usuarios($data);
				$comprobacion_insert = $this->Signin_model->usuarioNoExistente($data);
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

					$query = $this->Signin_model->auntenticar($data_au);

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
			
			$query = $this->Signin_model->auntenticar($data);

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
	// obtner la informacion del usuarios
	public function get_usuario()
	{
		if ($this->input->is_ajax_request()) {
			$email = $this->input->post('email');
			$data = $this->Signin_model->get_user($email);
			echo json_encode($data);
		} else {
			show_404();
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
	// Actualizar los permisos del usuarios
	public function update_tyc()
	{
		if ($this->input->is_ajax_request()) {
			$id_usuario = $this->input->post('id_usuario');
			$data = array('tyc' => $this->input->post('tyc'),);
			$this->Signin_model->update_tyc($data, $id_usuario);
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
		$consulta_controller = $this->Signin_model->get_status_C();
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
