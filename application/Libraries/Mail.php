<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mail
{
	

	function enviar_correo($_email_from, $_email_subject, $_mensaje,$_headers, $_email_to)
	{
		
		$email_subject = $_email_subject;
		$mensaje = 
			'<html>
				<head>'.$_headers.'
				</head>
				<body>
					'.$_mensaje.'
				</body>
			</html>';
		$mensaje = utf8_decode($mensaje);
			
		// Para enviar un correo HTML, debe establecerse la cabecera Content-type
		
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

		// Cabeceras adicionales
		$headers .= 'To: '.$_email_to . "\r\n";
		$headers .= 'From: '.$_email_from . "\r\n";

		// Enviarlo
		mail($_email_to, $email_subject, $mensaje, $headers);
	}
}

?>