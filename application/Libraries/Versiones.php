<?php
defined('BASEPATH') or exit('No direct script access allowed');

class versiones
{
	var $version = 0;

	function set_version($ver)
	{
		$this->version = $ver;

	}

	function get_version()
	{
        return $this->version;
	}

}

?>