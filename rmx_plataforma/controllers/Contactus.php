<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Contactus extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('Contactus_model');
		$this->load->library('versiones');
		$ver = $this->Contactus_model->get_version();
		$this->versiones->set_version($ver);
	}
	// -------------- VISTAS ---------------------
	/**  Función para cargar la vista de la barra de navegación: Contactanos */
	public function index()
	{
		$this->load->view('headers/home/header');
		$this->load->view('headers/home/navbar');
		$this->load->view('home/contactanos');
		$this->load->view('footers/home/footer');
		$this->load->view('footers/home/scripts');
		$this->load->view('footers/cargar_js');
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
			
			$query = $this->Contactus_model->auntenticar($data);

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
			$data = $this->Contactus_model->get_user($email);
			echo json_encode($data);
		} else {
			show_404();
		}
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
			$this->Contactus_model->update_tyc($data, $id_usuario);
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
		$consulta_controller = $this->Contactus_model->get_status_C();
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
