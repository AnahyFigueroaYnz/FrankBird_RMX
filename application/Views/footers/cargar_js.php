<?php
		$_curController = $this->router->fetch_class();
		$_curAction = $this->router->fetch_method();
		
		switch ($_curController) {

		    case 'Plataforma':
			    echo '<script src="'.base_url().'js/plataforma/plataforma.js"></script>';			    
			    echo '<script src="'.base_url().'js/plataforma/documentos.js"></script>';
			case 'Dashboard':
				echo '<script src="'.base_url().'js/plataforma/dashboard.js"></script>';
		    
	    }
?>
		<script>var base_url = '<?php echo base_url()?>';</script>