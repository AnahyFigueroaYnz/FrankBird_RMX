USE birdie;    
-- vista para ganancias del mes del usuario
	DROP VIEW IF EXISTS vw_ganacias;
	CREATE VIEW vw_ganacias AS
	SELECT SUM(total) AS ganancias, proyectos.id_usuario FROM cotizaciones
	LEFT JOIN proyectos ON proyectos.id_proyecto = cotizaciones.id_proyecto
    WHERE proyectos.activo = 1 AND proyectos.id_estatus >= 10 AND cotizaciones.activo = 3 
    AND MONTH(proyectos.fecha_creacion) = MONTH (NOW());

    -- vista para las agencias del usuario
	DROP VIEW IF EXISTS vw_no_agencias;
    CREATE VIEW vw_no_agencias AS
	SELECT COUNT(*) AS agencias, id_usuario FROM agencias;

    -- vista para los proyectos del usuario
	DROP VIEW IF EXISTS vw_no_proyectos;
    CREATE VIEW vw_no_proyectos AS
	SELECT COUNT(*) AS proyectos, id_usuario
	FROM proyectos WHERE proyectos.activo = 1;

    -- vista para los productos del usuario
	DROP VIEW IF EXISTS vw_no_productos;
    CREATE VIEW vw_no_productos AS
    SELECT COUNT(*) AS productos, proveedores.id_usuario AS id_usuario FROM productos 
    LEFT JOIN proveedores ON proveedores.id_proveedor = productos.id_proveedor;

    -- vista para los proveedores del usuario
	DROP VIEW IF EXISTS vw_no_proveedores;
    CREATE VIEW vw_no_proveedores AS
	SELECT COUNT(*) AS proveedores, id_usuario FROM proveedores;

-- vista para las tareas del usuario
	DROP VIEW IF EXISTS vw_get_tareas;
	CREATE VIEW vw_get_tareas AS
	SELECT * FROM tasks WHERE activo = 1;

    -- vista para la informacion completa del proveedores del usuario
	DROP VIEW IF EXISTS vw_get_proveedores;
    CREATE VIEW vw_get_proveedores AS
	SELECT proveedores.*, ladas.lada, ladas.codigo FROM proveedores
    LEFT JOIN ladas ON ladas.id_lada = proveedores.id_lada;

    -- vista para los ultimos proyectos agregados del usuario
	DROP VIEW IF EXISTS vw_ultimos_proyectos;
    CREATE VIEW vw_ultimos_proyectos AS
	SELECT estatus.estatus, proyectos.* FROM proyectos
	LEFT JOIN estatus ON proyectos.id_estatus = estatus.id_estatus
    WHERE proyectos.activo = 1;

    -- vista para los ultimos proyectos productos cotizados del usuario
	DROP VIEW IF EXISTS vw_ultimos_productos;
    CREATE VIEW vw_ultimos_productos AS
    SELECT productos.*, productos.id_usuario AS id_user, proveedores.proveedor FROM productos 
    LEFT JOIN proveedores ON proveedores.id_proveedor = productos.id_proveedor
    WHERE productos.activo = 1;

    -- vista para las ultimas cotizaciones del usuario
	DROP VIEW IF EXISTS vw_ultimas_cotizaciones;
    CREATE VIEW vw_ultimas_cotizaciones AS
	SELECT proyectos.id_usuario, folio, registro, cotizaciones.*,
    proyectos.folio AS p_folio, proyectos.nombre, proyectos.activo AS p_activo FROM cotizaciones 
    LEFT JOIN proyectos ON proyectos.id_proyecto = cotizaciones.id_proyecto
    WHERE proyectos.activo = 1;

    -- vista para los proyectos en camino del usuario
	DROP VIEW IF EXISTS vw_proyectos_transito;
    CREATE VIEW vw_proyectos_transito AS
	SELECT * FROM proyectos WHERE activo = 1 AND
    MONTH(fecha_llegada) = MONTH(now()) AND 
    (DAY(fecha_llegada) = DAY(now() OR
    DAY(fecha_llegada) = DAY(NOW() - INTERVAL 1 DAY) OR
    DAY(fecha_llegada) = DAY(NOW() - INTERVAL 2 DAY)) OR
    DAY(fecha_llegada) = DAY(NOW() - INTERVAL 3 DAY) OR
    DAY(fecha_llegada) = DAY(NOW() - INTERVAL 4 DAY) OR
    DAY(fecha_llegada) = DAY(NOW() - INTERVAL 5 DAY));

    -- vista para la informacion completa del proyecto del usuario
	DROP VIEW IF EXISTS vw_dellateProyecto;
    CREATE VIEW vw_dellateProyecto AS
	SELECT proyectos.*, productos.id_producto, productos.id_unidad_md, productos.producto,
    productos.precio_u, productos.cantidad, productos.img_logotipo, productos.rpg_logotipo,
    productos.especificaciones, productos.fracc_arancel as prod_arancel, proveedores.id_lada,
    proveedores.proveedor, proveedores.factura_path, proveedores.email, proveedores.telefono,
    proveedores.contacto, ladas.lada, ladas.codigo FROM proyectos
	LEFT JOIN estatus ON estatus.id_estatus = proyectos.id_estatus
	LEFT JOIN proveedores ON proveedores.id_proyecto = proyectos.id_proyecto
	LEFT JOIN productos ON productos.id_proyecto = proyectos.id_proyecto
    LEFT JOIN ladas ON ladas.id_lada = proveedores.id_lada;