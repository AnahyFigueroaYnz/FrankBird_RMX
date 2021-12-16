<?php
		$data_ver =  $this->versiones->get_version();
		$version = $data_ver->version;

		$_curController = $this->router->fetch_class();
		$_curAction = $this->router->fetch_method();
		
		switch ($_curController) {

		    case 'Mantenimiento':
			    echo '<script src="'.base_url().'js/mantenimiento/mantenimiento.js?v='.$version.'"></script>';
		    break;

		    case 'Plataforma':
			    echo '<script src="'.base_url().'js/plataforma/plataforma.js?v='.$version.'"></script>';
			    echo '<script src="'.base_url().'js/plataforma/dashboard.js?v='.$version.'"></script>';
			    echo '<script src="'.base_url().'js/plataforma/documentos.js?v='.$version.'"></script>';
		    break;

		    case 'Home':
			    echo '<script src="'.base_url().'js/home/home.js?v='.$version.'"></script>';
			break;
		    
	    }
?>
		<script>var base_url = '<?php echo base_url()?>';</script>