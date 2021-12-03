<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cript
{
	
	function decrypted_id($id_proyecto_uri)
	{

	    $key64 = "Reachmx1"; $iv64="AAECAwQFBgcICQoLDA0ODw==";
	    $key = base64_decode($key64, true);
	    $iv = base64_decode($iv64, true);
	    $search  = "_";
        $replace = "/";
		$a = str_replace($search, $replace, $id_proyecto_uri);
	    
	    $id_proyecto = openssl_decrypt($a, 'aes-256-cbc', $key, 0, $iv);

	    return $id_proyecto;

	}

}

?>