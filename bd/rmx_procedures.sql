Use rmx; 

-- procedure para cliente
	drop procedure if exists noMyProyectos;
    delimiter $$
	create procedure noMyProyectos (IN id_usuario_g INT)
		begin
			SELECT COUNT(*) AS NoMyProyecto,
			(SELECT COUNT(*) FROM proyecto 
			WHERE id_estadoproyectos = 1 AND proyecto.id_cliente = id_usuario_g AND proyecto.activo = 1) AS sourcing,
			(SELECT COUNT(*) FROM proyecto
			WHERE id_estadoproyectos = 4 AND proyecto.id_cliente = id_usuario_g AND proyecto.activo = 1) AS cotizados,
			(SELECT COUNT(*) FROM proyecto
			WHERE id_estadoproyectos = 12 AND proyecto.id_cliente = id_usuario_g AND proyecto.activo = 1) AS en_proceso,
			(SELECT COUNT(*) FROM proyecto
			WHERE id_estadoproyectos = 15 AND proyecto.id_cliente = id_usuario_g AND proyecto.activo = 1) AS puerto_salida,
			(SELECT COUNT(*) FROM proyecto
			WHERE id_estadoproyectos = 18 AND proyecto.id_cliente = id_usuario_g AND proyecto.activo = 1) AS puerto_llegada,
			(SELECT COUNT(*) FROM proyecto
			WHERE id_estadoproyectos = 24 AND proyecto.id_cliente = id_usuario_g AND proyecto.activo = 2) AS concluido
			FROM proyecto
			WHERE proyecto.activo = 1 AND proyecto.id_cliente = id_usuario_g;
		end
    $$

--procedure para tener info completa del proyecto
    drop procedure if exists get_all_data_proyecto;
	delimiter $$
		create procedure get_all_data_proyecto (IN id_proyecto_get INT)
		begin
			SELECT *, proyecto.activo as activo_p,
			proyecto.a_registro as registro_p, proyecto.folio as folio_p,
			(usuarios.nombre) as nombreCliente
			FROM proyecto
			JOIN usuarios ON proyecto.id_cliente = usuarios.id_usuario
			LEFT JOIN estados_proyectos ON proyecto.id_estadoproyectos = estados_proyectos.id_estadoproyectos
			LEFT JOIN productos_clientes ON proyecto.id_proyecto = productos_clientes.id_proyecto
			LEFT JOIN productos_sp_clientes ON  proyecto.id_proyecto = productos_sp_clientes.id_proyecto
			LEFT JOIN proveedores_clientes ON productos_clientes.id_proveedor_c = proveedores_clientes.id_proveedor_c
			WHERE proyecto.id_proyecto = id_proyecto_get;
		end
	$$

--
	drop procedure if exists noMyProyectos_asesor;
	delimiter $$
		create procedure noMyProyectos_asesor (IN id_usuario_get INT)
		begin
			SELECT COUNT(*) AS NoMyProyecto,
			(SELECT COUNT(*) FROM proyecto WHERE id_estadoproyectos = 1 AND id_asesor = id_usuario_get AND activo = 1) AS sourcing,
			(SELECT COUNT(*) FROM proyecto WHERE id_estadoproyectos = 4 AND id_asesor = id_usuario_get AND activo = 1) AS cotizados,
			(SELECT COUNT(*) FROM proyecto WHERE id_estadoproyectos = 12 AND id_asesor = id_usuario_get AND activo = 1) AS en_proceso,
			(SELECT COUNT(*) FROM proyecto WHERE id_estadoproyectos = 15 AND id_asesor = id_usuario_get AND activo = 1) AS puerto_salida,
			(SELECT COUNT(*) FROM proyecto WHERE id_estadoproyectos = 18 AND id_asesor = id_usuario_get AND activo = 1) AS puerto_llegada,
			(SELECT COUNT(*) FROM proyecto WHERE id_estadoproyectos = 24 AND id_asesor = id_usuario_get AND activo = 2) AS concluido
			FROM proyecto WHERE activo = 1 AND id_asesor = id_usuario_get;
		end
	$$

/*
	drop procedure if exists noMyProyectos;
	drop procedure if exists get_all_data_proyecto;
	drop procedure if exists noMyProyectos_asesor;
*/