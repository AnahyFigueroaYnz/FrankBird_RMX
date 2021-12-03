use rmx;

-- vista para obtener numero de proyectos de plataforma
	drop view if exists noProyectos_platform;
	create view noProyectos_platform as
	SELECT COUNT(0) AS NoProyecto, 
    (SELECT COUNT(0) FROM proyecto WHERE proyecto.id_estadoproyectos = 1 AND proyecto.activo = 1) AS sourcing,
	(SELECT COUNT(0) FROM proyecto WHERE proyecto.id_estadoproyectos = 4 AND proyecto.activo = 1) AS cotizados,
    (SELECT COUNT(0) FROM proyecto WHERE proyecto.id_estadoproyectos = 12 AND proyecto.activo = 1) AS en_proceso,
    (SELECT COUNT(0) FROM proyecto WHERE proyecto.id_estadoproyectos = 15 AND proyecto.activo = 1) AS puerto_salida,
    (SELECT COUNT(0) FROM proyecto WHERE proyecto.id_estadoproyectos = 18 AND proyecto.activo = 1) AS puerto_llegada,
    (SELECT COUNT(0) FROM proyecto WHERE proyecto.id_estadoproyectos = 24 AND proyecto.activo = 2) AS concluido
    FROM proyecto WHERE proyecto.activo = 1;

-- vista para proyectos activos
    DROP VIEW IF EXISTS get_proyectos_activos;
    CREATE VIEW get_proyectos_activos AS
    SELECT 
        proyecto.*,
        (SELECT usuarios.nombre FROM usuarios WHERE usuarios.id_usuario = proyecto.id_cliente) AS nombre_cliente,
        proyecto.fecha_creacion AS fecha,
        estados_proyectos.estado AS estado,
        proyecto.id_asesor AS id_asesor_p
    FROM proyecto
    JOIN estados_proyectos ON proyecto.id_estadoproyectos = estados_proyectos.id_estadoproyectos
    WHERE proyecto.activo = 1 AND proyecto.id_estadoproyectos > 1 AND proyecto.id_estadoproyectos < 24;
    
-- vista para obtener los proyectos por asesor
	drop view if exists get_proyectos_asesor;
    create view get_proyectos_asesor as
	SELECT proyecto.*, (SELECT nombre FROM usuarios WHERE id_usuario = proyecto.id_cliente) AS nombre_cliente,
	fecha_creacion as fecha, estado
	FROM proyecto
	JOIN estados_proyectos ON  proyecto.id_estadoproyectos = estados_proyectos.id_estadoproyectos;
    
-- vista para obtener proyectos agente por agencia
	drop view if exists get_proy_agente;
    create view get_proy_agente as
	SELECT proyecto.*, (SELECT nombre FROM usuarios WHERE id_usuario = proyecto.id_cliente) AS nombre_cliente,
	fecha_creacion as fecha, estado, cotizaciones.id_agencia as agen_id, cotizaciones.activo as cot_act,
	proyecto.activo as proy_act
	FROM proyecto
	JOIN estados_proyectos ON  proyecto.id_estadoproyectos = estados_proyectos.id_estadoproyectos
	join cotizaciones on cotizaciones.id_proyecto = proyecto.id_proyecto;

-- ---------------------------------------------------------------
-- Comienzan creacion de visas para funciones de modelos
-- ---------------------------------------------------------------

-- vista para obtener listado de cotizaciones por cliente
	drop view if exists lista_cotizaciones_cliente;
    create view lista_cotizaciones_cliente as
	select id_cotizacion, cotizaciones.id_proyecto, cotizaciones.folio, proyecto.a_registro as registro_p,
	proyecto.folio as folio_p, cotizaciones.suma, nombre_cot, proyecto.id_cliente as id_cliente, cotizaciones.activo
	from cotizaciones 
	join proyecto on cotizaciones.id_proyecto = proyecto.id_proyecto
    where cotizaciones.activo >= 2 && cotizaciones.activo < 5;
    
-- vista para obtener el id_proveedor_c en la funcion get_id_prov de Clientes model
	drop view if exists get_id_prov; 
	create view get_id_prov as
	SELECT id_proveedor_c, id_cliente, id_proyecto, proveedor, email, contacto, id_lada, telefono, direccion, invoice_path, activo
	FROM proveedores_clientes
	WHERE id_proyecto = (SELECT max(id_proyecto) 
	FROM proyecto);

-- vista para obtener el id_producto_sp_c en la funcion get_id_prod_sp de Clientes model
	drop view if exists get_id_prod_sp;
	create view get_id_prod_sp as
	SELECT id_producto_sp_c, id_cliente, img_path
	FROM productos_sp_clientes
	WHERE id_proyecto = (SELECT max(id_proyecto) 
	FROM proyecto);

-- vista para obtener el id_producto_sp_c en la funcion get_id_prod_prov de Clientes model
	drop view if exists get_id_prod_prov;
	create view get_id_prod_prov as
	SELECT id_producto_c, id_cliente, img_path
	FROM productos_clientes
	WHERE id_proyecto = (SELECT max(id_proyecto) 
	FROM proyecto);

-- vista para obtener los proyectos en sourcing
	drop view if exists sourcingMisProy;
    create view sourcingMisProy as
	SELECT proyecto.*, 
	(SELECT nombre from usuarios where id_usuario = proyecto.id_cliente) as Cliente,
	(SELECT nombre from usuarios where id_usuario = proyecto.id_asesor) as Asesor
	FROM proyecto 
	LEFT JOIN usuarios ON usuarios.id_usuario = proyecto.id_cliente
	WHERE proyecto.id_estadoproyectos = 1 AND proyecto.activo = 1
	AND (DAY(proyecto.fecha_creacion) < (select DAY (NOW())) OR MONTH(proyecto.fecha_creacion) < (select MONTH (NOW())) ); 

-- v
	drop view if exists ganancias;
	create view ganancias as
	SELECT SUM(suma) AS Ganancias 
	FROM cotizaciones
	LEFT JOIN proyecto ON proyecto.id_proyecto = cotizaciones.id_proyecto
	WHERE proyecto.activo = 1 AND proyecto.id_estadoproyectos >= 10 AND cotizaciones.activo = 3
	AND MONTH(proyecto.fecha_creacion) = MONTH (NOW());
    
-- v
	drop view if exists sourcingProy;
	create view sourcingProy as
	SELECT proyecto.*,
	(SELECT nombre from usuarios where id_usuario = proyecto.id_cliente) as Cliente,
	(SELECT nombre from usuarios where id_usuario = proyecto.id_asesor) as Asesor
	FROM proyecto 
	LEFT JOIN usuarios ON usuarios.id_usuario = proyecto.id_cliente
	WHERE proyecto.id_estadoproyectos = 1 AND proyecto.activo = 1 
	AND (DAY(proyecto.fecha_creacion) < DAY (NOW()) OR MONTH(proyecto.fecha_creacion) < MONTH (NOW()))
	ORDER BY proyecto.folio DESC;

-- v
	drop view if exists sourcingMisProy_asesor;
	create view sourcingMisProy_asesor as
	SELECT proyecto.*,
	(SELECT nombre from usuarios where id_usuario = proyecto.id_cliente) as Cliente,
	(SELECT nombre from usuarios where id_usuario = proyecto.id_asesor) as Asesor
	FROM proyecto 
	LEFT JOIN usuarios ON usuarios.id_usuario = proyecto.id_cliente
	WHERE proyecto.id_estadoproyectos = 1 AND proyecto.activo = 1
	AND (DAY(proyecto.fecha_creacion) < DAY(now()) OR MONTH(proyecto.fecha_creacion) < MONTH(now()));
        
-- v
	drop view if exists desAduanProy;
	create view desAduanProy as
	SELECT proyecto.*, cotizaciones.id_agencia as id_agencia,
    (SELECT nombre from usuarios where id_usuario = proyecto.id_cliente) as Cliente,
	(SELECT nombre from usuarios where id_usuario = proyecto.id_asesor) as Asesor
	FROM proyecto 
	LEFT JOIN usuarios ON usuarios.id_usuario = proyecto.id_cliente
	LEFT JOIN cotizaciones on cotizaciones.id_proyecto = proyecto.id_proyecto
	WHERE proyecto.id_estadoproyectos = 19 AND proyecto.activo = 1
	AND (DAY(fecha_creacion) <= (DAY(NOW()) -3) OR MONTH(proyecto.fecha_creacion) < MONTH(now()))
	AND cotizaciones.activo = 3;
    
    -- consulta productos sin proveedor del cliente
	drop view if exists productos_sp_c;
	create view productos_sp_c AS
	SELECT productos_sp_clientes.*, proyecto.oemservice_path, proyecto.activo as proy_activo,
    unidades_medida.clave, unidades_medida.unidad_medida
    FROM productos_sp_clientes 
	LEFT JOIN proyecto ON proyecto.id_proyecto = productos_sp_clientes.id_proyecto
    LEFT JOIN unidades_medida on unidades_medida.id_unidad_md = productos_sp_clientes.id_unidad_md;
    
    -- consulta productos con proveedor del cliente
	drop view if exists productos_cp_c;
	create view productos_cp_c AS
	SELECT productos_clientes.*, proveedores_clientes.proveedor, proveedores_clientes.email, 
    proveedores_clientes.contacto, proveedores_clientes.telefono, proveedores_clientes.direccion, 
    proveedores_clientes.invoice_path, proyecto.oemservice_path, proyecto.activo as proy_activo,
    unidades_medida.unidad_medida, unidades_medida.clave, ladas.lada, ladas.abrev
    FROM productos_clientes
	LEFT JOIN proveedores_clientes ON proveedores_clientes.id_proveedor_c = productos_clientes.id_proveedor_c
    LEFT JOIN proyecto on proyecto.id_proyecto = productos_clientes.id_proyecto
    LEFT JOIN unidades_medida on unidades_medida.id_unidad_md = productos_clientes.id_unidad_md
	LEFT JOIN ladas ON ladas.id_lada = proveedores_clientes.id_lada;
    
-- consulta proveedor del cliente
	drop view if exists provCliente;
	create view provCliente AS
	SELECT cotizaciones.id_cotizacion as id_cotizacion, proyecto.id_proyecto as proy_id_proyecto,
    cotizaciones.activo AS activ_cot, proveedores_clientes.*
    FROM cotizaciones 
	LEFT JOIN proyecto ON proyecto.id_proyecto = cotizaciones.id_proyecto
	LEFT JOIN proveedores_clientes ON proveedores_clientes.id_proyecto = proyecto.id_proyecto;
    
    -- consulta cotizacion detalle 
	drop view if exists detCotizacion;
	create view detCotizacion as
	SELECT proyecto.a_registro as registro_p, proyecto.folio as folio_p, proyecto.id_estadoproyectos as id_status,
	cotizaciones.activo AS activ_cot, cotizaciones.*, cotizaciones.honorarios AS honorariosC,
    (SELECT (flete_internacional + IFNULL(otros, 0))) AS logisticaInter,
	(SELECT (dta + arancel)) AS impuestosImpor,
	(SELECT (honorarios_c + revalicacion_c + complementarios_c + previo_c + maniobras_c + desconsolidacion_c)) AS sumaAgencia,
	puertos.puerto, (SELECT clave From puertos where id_puerto = cotizaciones.id_puertoSalida) AS claveSalida,
	transporte.transporte, (SELECT clave From transporte where id_transporte = cotizaciones.id_puertoLlegada) AS claveLlegada,
    agencias_aduanales.agencia
	FROM cotizaciones
	LEFT JOIN proyecto ON proyecto.id_proyecto = cotizaciones.id_proyecto
	LEFT JOIN agencias_aduanales ON cotizaciones.id_agencia = agencias_aduanales.id_agencia
	LEFT JOIN puertos ON cotizaciones.id_puertoSalida = puertos.id_puerto
	LEFT JOIN transporte ON cotizaciones.id_puertoLlegada = transporte.id_transporte;

-- consulta productos de cotizacion 
	drop view if exists prodCotizacion;
	create view prodCotizacion as
	SELECT cotizaciones.activo AS activ_cot, cotizaciones.id_proyecto AS id_proyecto, proyecto.id_estadoproyectos AS id_estatus,
	producto_cotizacion.*, unidades_medida.unidad_medida, unidades_medida.clave, proveedores.proveedor
	FROM producto_cotizacion
	LEFT JOIN cotizaciones ON cotizaciones.id_cotizacion = producto_cotizacion.id_cotizacion
	LEFT JOIN proyecto ON proyecto.id_proyecto = cotizaciones.id_proyecto
	LEFT JOIN proveedores ON producto_cotizacion.id_proveedor = proveedores.id_proveedor
	LEFT JOIN unidades_medida ON producto_cotizacion.id_unidad_md = unidades_medida.id_unidad_md;
    
-- consulta media productos de cotizacion 
	drop view if exists mediaProdCoizacion;
	create view mediaProdCoizacion as
	SELECT producto_cotizacion.id_producto_cot AS id_prod_cot, producto_cotizacion.id_cotizacion as id_cotizacion, 
	proyecto.id_proyecto AS id_proyecto, media_productos_cot.*, cotizaciones.activo AS activ_cot
	FROM producto_cotizacion
	LEFT JOIN cotizaciones ON cotizaciones.id_cotizacion = producto_cotizacion.id_cotizacion
	LEFT JOIN proyecto ON proyecto.id_proyecto = cotizaciones.id_proyecto
	LEFT JOIN media_productos_cot ON producto_cotizacion.id_producto_cot = media_productos_cot.id_producto_cot;

-- consulta para origen y destino en tarifas
	drop view if exists getTarifas_destinos;
	create view getTarifas_destinos as
	SELECT id_catalogo, tipo, movimiento, tarifa_aerea, lcl_cbm, ft20, ft40, hq40, activo, 
	(SELECT destino FROM destinos_cotizador WHERE catalogo_cotizador.id_origen = destinos_cotizador.id_destino) as origen,
	(SELECT destino FROM destinos_cotizador WHERE catalogo_cotizador.id_destino = destinos_cotizador.id_destino) as destino
	FROM catalogo_cotizador WHERE activo = 1;
    
    
-- consulta para tipo de cambio
	drop view if exists get_tipo_cambio;
	create view get_tipo_cambio as
    SELECT id_tipo_c, tipo_cambio, fecha_creacion FROM tipo_cambio WHERE activo = 1 ORDER BY id_tipo_c DESC LIMIT 1;