USE birdie;

------------------------------------------------------------
-- INSERTAR LAS LADAS
INSERT INTO
    ladas (codigo, lada, fecha_creacion)
VALUES
    (1, 'US', CURDATE()),
    (52, 'MX', CURDATE());

------------------------------------------------------------
-- INSERTAR LOS ESTATUS DE LOS PROYECTOS
INSERT INTO
    estatus (estatus, fecha_creacion)
values
    ('Sourcing', CURDATE()),
    ('Cotización enviada', CURDATE()),
    ('Ajustes Solicitados', CURDATE()),
    ('Cotización aceptada', CURDATE()),
    ('Pago Recibido', CURDATE()),
    ('Muestra en Producción', CURDATE()),
    ('Muestra enviada', CURDATE()),
    ('Muestra recibida', CURDATE()),
    ('Muestra Aprobada', CURDATE()),
    ('Anticipo Pagado', CURDATE()),
    ('Inicio de producción', CURDATE()),
    ('En producción ', CURDATE()),
    ('Terminó Producción ', CURDATE()),
    ('Transporte Nacional CHINA', CURDATE()),
    ('En puerto CHINA', CURDATE()),
    ('Cargado a buque', CURDATE()),
    ('Transito Marítimo', CURDATE()),
    ('Llegada a Puerto MX', CURDATE()),
    ('Despacho Aduanal', CURDATE()),
    ('Solicitud de información', CURDATE()),
    ('Despacho Concluido', CURDATE()),
    ('Transporte Nacional', CURDATE()),
    ('Mercancía Entregada', CURDATE()),
    ('Proyecto Terminado', CURDATE()),
    ('Transporte Aéreo', CURDATE()),
    ('Solicitud de Recotizar', CURDATE());

------------------------------------------------------------
-- INSERTAR TIPOS DE CHECKLIST
INSERT INTO
    tpo_moneda (clave, moneda, valor, fecha_creacion)
values
    ('MXN', 'peso mexicano', 0.049, CURDATE()),
    ('USD', 'dolares ee. uu.', 20.380, CURDATE());

------------------------------------------------------------
-- INSERTAR TIPOS DE CHECKLIST
INSERT INTO
    cot_estatus (val_estatus, estatus, fecha_creacion)
values
    (0, 'Nueva', CURDATE()),
    (1, 'Aceptada', CURDATE()),
    (2, 'Rechazada', CURDATE()),
    (3, 'Eliminada', CURDATE());

------------------------------------------------------------
-- INSERTAR LAS LADAS
INSERT INTO
    tpo_medidas (clave, medida, fecha_creacion)
VALUES
    ('kt', 'kit`s', CURDATE()),
    ('k', 'kilo(s)', CURDATE()),
    ('l', 'litro(s)', CURDATE()),
    ('m', 'metro(s)', CURDATE()),
    ('pza', 'pieza(s)', CURDATE()),
    ('t', 'tonelada(s)', CURDATE()),
    ('m2', 'metros cuadrado(s)', CURDATE()),
    ('tm', 'tonelada metrica(s)', CURDATE()),
    ('contenedor', 'contenedor(s)', CURDATE());

------------------------------------------------------------
-- INSERTAR TIPOS DE AGENCIAS ADUANALES
INSERT INTO
    tpo_agencias (tipo, fecha_creacion)
values
    ('Aerea', CURDATE()),
    ('Maritima', CURDATE()),
    ('Terrestre', CURDATE());

------------------------------------------------------------
-- INSERTAR TIPOS DE CHECKLIST
INSERT INTO
    tpo_checklist (tpo_chklst, fecha_creacion)
values
    ('Sourcing', CURDATE()),
    ('Production', CURDATE()),
    ('Freight', CURDATE()),
    ('Customs', CURDATE()),
    ('Done', CURDATE());

------------------------------------------------------------
-- INSERTAR LOS TIPOS DE DOCUMENTOS
INSERT INTO
    tpo_documentos (tpo_doc, fecha_creacion)
VALUES
    ('Comercial invoice', CURDATE()),
    ('Packing list', CURDATE()),
    ('Ficha tecnica', CURDATE()),
    ('BL', CURDATE()),
    ('Factura incrementables', CURDATE()),
    ('Pagos a proveedores', CURDATE()),
    ('Invoice proveedor', CURDATE()),
    ('Pedimento', CURDATE()),
    ('Cotización despacho', CURDATE()),
    ('Carta 3.1.8', CURDATE()),
    ('Anexos', CURDATE()),
    ('Cotización', CURDATE());

------------------------------------------------------------
-- INSERTAR LAS TAREAS DEL CHECKLIST
INSERT INTO
    task_checklist (
        id_tpo_chklst,
        task_checklist,
        especificaciones,
        fecha_creacion
    )
values
    (1,'Contactar cliente por mail', '', CURDATE()),
    (1,'Crear carpetas en base de datos','',CURDATE()),
    (1,'Especificaciones agregadas a MT','',CURDATE()),
    (1,'5 proveedores contactados', '', CURDATE()),
    (1,'Negociacion inicial','Especificar el precio a negociar',CURDATE()),
    (1,'Pedir packing details','Especificar las medidas de cajas, peso por cajas y cuantas cajas son en total',CURDATE()),
    (1,'Pedir HS CODE y mercancia clasificación','',CURDATE()),
    (1,'Hacer cotización hasta destino','',CURDATE()),
    (1,'Cotización aprobada','Especificar quien aprobó la cotizacion',CURDATE()),
    (1,'Cotizacón enviada', '', CURDATE()),
    (2,'Proveedor verificado', '', CURDATE()),
    (2,'Negociación final, bajarse 20-30%','Especificar precio final, hacer negociacion antes de realizar anticipo a proveedor',CURDATE()),
    (2,'Anticipo pagado', '', CURDATE()),
    (2,'Proveedor liquidado', '', CURDATE()),
    (2,'Packing List y factura recibida','Especificar Tax ID de proveedor',CURDATE()),
    (2,'BL recibido', '', CURDATE()),
    (2,'Actualizar fecha de proyecto con tiempo estimado de salida (ETD)','',CURDATE()),
    (2,'Designar agencia aduanal','Especificar la asignación',CURDATE()),
    (2,'Enviar propuesta de valor al proveedor','',CURDATE()),
    (3,'BL recibido', '', CURDATE()),
    (3,'Contactar naviera','Especificar los gastos que se tienen que pagar',CURDATE()),
    (3,'Gastos en destino realizados', '', CURDATE()),
    (3,'Actualizar DUE Date con ETA', '', CURDATE()),
    (3,'Enviar documentación a aduanas', '', CURDATE()),
    (4,'BL revalidado', '', CURDATE()),
    (4,'Previo realizado', '', CURDATE()),
    (4,'Cotización recibida', '', CURDATE()),
    (4,'Cotizacion pagada', '', CURDATE()),
    (4,'Confirmar flete nacional', '', CURDATE()),
    (5,'Cotización aceptada por cliente','',CURDATE()),
    (5,'Anticipo recibido ', '', CURDATE()),
    (5,'Negociación final realizada', '', CURDATE()),
    (5,'Confirmar recepción ', '', CURDATE());

-- --------------------------------------------------------
-- INSERTAR USUARIOS 
INSERT INTO
    usuarios (
        id_lada,
        nombre,
        contrasena,
        email,
        telefono,
        fecha_creacion
    )
values
    (
        2,
        'Anahy Figueroa ',
        '123',
        'anahy.figueroa@reachmx.com',
        '(662) 150 5577',
        CURDATE()
    ),
    (
        2,
        'Marina Lara Meza',
        '456',
        'marina@reachmx.com',
        '(662) 203 5521',
        CURDATE()
    ),
    (
        2,
        'Hector Nicola',
        '01254678',
        'hectornicola94@gmail.com',
        NULL,
        CURDATE()
    );

-- --------------------------------------------------------
-- INSERTAR PROVEEDORES
INSERT INTO
    proveedores (
        id_lada,
        id_usuario,
        proveedor,
        email,
        direccion,
        dir_pais,
        telefono,
        contacto,
        web_site,
        fecha_creacion
    )
VALUES
    (
        1,
        2,
        'Jinhua Bosun Techology Co., LTD.',
        'maxzhang@bosun-tech.com',
        'Zhejiang',
        'China',
        '(158) 579 87766',
        'Max Zhang',
        'maxbosun.en.alibaba.com',
        CURDATE()
    ),
    (
        2,
        2,
        'Yongkang Lanyang Houseware Co,LTD',
        'sandy@zjlanos.com\n',
        'Zhejiang',
        'China',
        '(579) 8929 2297',
        'Sandy/Caroline',
        'www.zjlanos.com, lanos.en.alibaba.com',
        CURDATE()
    );

-- --------------------------------------------------------
-- INSERTAR PRODUCTOS DE LOS PROVEEDORES
INSERT INTO
    productos (
        id_usuario,
        id_proveedor,
        producto,
        fecha_creacion
    )
VALUES
    (2, 1, 'Popotes', CURDATE()),
    (2, 2, 'Termos ', CURDATE());

-- --------------------------------------------------------
-- INSERTAR PROYECTOS
INSERT INTO
    agencias (
        id_lada,
        id_usuario,
        id_tpo_agencia,
        patente,
        revision,
        agencia,
        agente,
        email,
        telefono,
        previo,
        honorarios,
        revalidacion,
        complementarios,
        maniobras_puerto,
        desconsolidacion,
        fecha_creacion
    )
values
    (
        NULL,
        2,
        2,
        NULL,
        NULL,
        'GAMAS',
        NULL,
        NULL,
        NULL,
        '300.00',
        '0.00',
        '500.00',
        '300.00',
        '0.00',
        '5000.00',
        CURDATE()
    );

-- --------------------------------------------------------
-- INSERTAR ORIGEN PARTIDA DE LOS PROVEEDORES
INSERT INTO
    pto_origen (
        id_proveedor,
        origen,
        siglas,
        fecha_creacion
        )
values
    (1, 'Qingdao', 'QND', CURDATE()),
    (2, 'Shenzhen', 'SHZ', CURDATE()),
    (2, 'Guangzhou', 'GZH', CURDATE());

-- --------------------------------------------------------
-- INSERTAR DESTINO FINAL DE LAS AGENCIAS
INSERT INTO
    pto_destino (
        id_agencia,
        siglas,
        destino,
        ubicacion,
        ub_siglas,
        fecha_creacion
        )
values
    (1, 'ENS', 'Ensenada', 'Mexico', 'MX', CURDATE()),
    (1, 'GYM', 'Guaymas ', 'Mexico', 'MX', CURDATE()),
    (1, 'HMO', 'Hermosillo ', 'Mexico', 'MX', CURDATE()),
    (1, 'MZO', 'Manzanillo ', 'Mexico', 'MX', CURDATE()),
    (1, 'NOG', 'Nogales ', 'Mexico', 'MX', CURDATE());