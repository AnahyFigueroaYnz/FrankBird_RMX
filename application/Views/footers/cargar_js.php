<?php
		$_curController = $this->router->fetch_class();
		$_curAction = $this->router->fetch_method();
		
		switch ($_curController) {

		    case 'Usuarios':
			    echo '<script src="'.base_url().'js/usuarios/usuarios.js"></script>';
		    break;

		    case 'Mantenimiento':
			    echo '<script src="'.base_url().'js/mantenimiento/mantenimiento.js"></script>';
		    break;

		    case 'Plataforma':
			    echo '<script src="'.base_url().'js/plataforma/plataforma.js"></script>';
			    echo '<script src="'.base_url().'js/plataforma/dashboard.js"></script>';
			    echo '<script src="'.base_url().'js/plataforma/documentos.js"></script>';
		    break;

		    case 'Administrador':
			    echo '<script src="'.base_url().'js/administrador/administrador.js"></script>';
		    break;

		    case 'Home':
			    echo '<script src="'.base_url().'js/home/home.js"></script>';
			break;
		    
	    }
?>
		<script>var base_url = '<?php echo base_url()?>';</script>