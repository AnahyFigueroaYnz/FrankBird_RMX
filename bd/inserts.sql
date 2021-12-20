use rmx;
-- --------------------------------------------------------
	-- INSERTS DE CATALOGO
-- -----------------------------------------------------

insert into controladores (nombre_controlador) values 
	('Home'), ('Clientes'), ('Plataforma');

insert into versiones_js (version, fecha) values (0.01,'2021-11-23');


insert into niveles_usuarios (tipo, nivel) values 
('root', 1),
('Administrador', 2),
('Asesor', 3),
('Cliente', 4);
-- -----------------------------------------------------

--
-- Volcado de datos para la tabla `ladas`
--

INSERT INTO `ladas` (`abrev`, `lada`, `activo`) VALUES
	('US', '(+ 1)', 1),
	('MX', '(+ 52)', 1),
	('TH', '(+ 66)', 1),
	('JP', '(+ 81)', 1),
	('KR', '(+ 82)', 1),
	('VN', '(+ 84)', 1),
	('CN', '(+ 86)', 1),
	('IN', '(+ 91)', 1);
-- -----------------------------------------------------

--
-- Volcado de datos para la tabla `tipos_doc`
--

insert into tipos_doc (tipo) values 
  ('Comercial invoice'),
  ('Packing list'),
  ('Ficha tecnica'),
  ('BL'),
  ('Factura incrementables'),
  ('Pagos a proveedores'),
  ('Invoice proveedor'),
  ('Pedimento'),
  ('Cotización despacho'),
  ('Carta 3.1.8'),
  ('Anexos'),
  ('Cotización');
 
-- -----------------------------------------------------

--
-- Volcado de datos para la tabla `unidades_medida`
--

insert into unidades_medida (unidad_medida, clave) values ('Piezas', 'pzas'), 
	('Metros', 'mts'), 
	('Kilos', 'kg'), 
	('Metros cuadrados', 'm2'), 
	('Tonelada metrica','tm'), 
	('Tonelada','tn'), 
	('Litros','l'), 
	('Kits','kt'),
	('Un contenedor','contenedor');

-- -----------------------------------------------------

--
-- Volcado de datos para la tabla `estados_proyectos`
--

insert into estados_proyectos (estado) values 
	('Sourcing'), 
	('Cotización enviada'), 
	('Ajustes Solicitados'), 
	('Cotización aceptada'), 
	('Pago Recibido'), 
	('Muestra en Producción'), 
	('Muestra enviada'),
	('Muestra recibida'), 
	('Muestra Aprobada'), 
	('Anticipo Pagado'), 
	('Inicio de producción'), 
	('En producción '), 
	('Terminó Producción '), 
	('Transporte Nacional CHINA'),
	('En puerto CHINA'), 
	('Cargado a buque'), 
	('Transito Marítimo'), 
	('Llegada a Puerto MX'), 
	('Despacho Aduanal'),
	('Solicitud de información'), 
	('Despacho Concluido'), 
	('Transporte Nacional'), 
	('Mercancía Entregada'), 
	('Proyecto Terminado'),
	('Transporte Aéreo'),
	('Solicitud de Recotizar');

-- -----------------------------------------------------
--
-- Volcado de datos para la tabla `tasks`
--

insert into tasks (task, detalle) values
	('Contactar cliente por mail', ''),
	('Crear carpetas en BD', ''),
	('Especificaciones agregadas a MT', ''),
	('5 proveedores contactados', ''),
	('Negociacion inicial', 'Escribir precio a Negociar'),
	('Pedir packing details', 'Escribir medidas de cajas, peso por cajas y cuantas cajas son en total'),
	('Pedir HS code y mercancia clasificación', ''),
	('Hacer cotización hasta destino', ''),
	('Cotización aprobada', 'Escribir quien aprobó'),
	('Cotizacón enviada', ''),
	('Proveedor verificado', ''),
	('Negociación final, bajase 20-30%', 'Escribir precio final, hacer negociacion antes de realizar anticipo a proveedor'),
	('Anticipo pagado', ''),
	('Proveedor liquidado', ''),
	('Packing List y factura recibida', 'Escribir Tax ID de proveedor'),
	('BL recibido', ''),
	('Actualizar fecha de proyecto con ETD', ''),
	('Designar agencia aduanal', 'Escribir la asignación'),
	('Enviar propuesta de valor al proveedor', ''),
	('BL recibido', ''),
	('Contactar naviera', 'Escribir gastos que se tienen que pagar'),
	('Gastos en destino realizados', ''),
	('Actualizar DUE Date con ETA', ''),
	('Enviar documentación a aduanas', ''),
	('BL revalidado', ''),
	('Previo realizado', ''),
	('Cotización recibida', ''),
	('Cotizacion pagada', ''),
	('Confirmar flete nacional', ''),
	('Cotización aceptada por cliente', ''),
	('Anticipo recibido ', ''),
	('Negociación final realizada', ''),
	('Confirmar recepción ', '');

-- --------------------------------------------------------

--
-- Volcado de datos para la tabla `agencias_aduanales`
--

insert into agencias_aduanales (agencia, honorarios, revalidacion, complementarios, previo, desconsolidacion, maniobras_puerto) values 
	('Gamas Aéreo', '0', '500.00', '400.00', '300.00', '0.00', '5000.00'), 
	('Gamas Marítimo', '0', '800.00', '3800.00', '900.00', '0.00', '8500.00'), 
	('Gamas Terrestre', '0', '500.00', '400.00', '300.00', '0.00', '5000.00'),
	('Giraud Aéreo', '0', '650.00', '0.00', '300.00', '0.00', '5000.00'),
	('Giraud Marítimo', '0', '650.00', '0.00', '300.00', '7000.00', '8500.00'),
	('Vejar Marítimo', '0', '650.00', '400.00', '900.00', '7000.00', '8500.00'),
	('Asia', '0', '0', '0', '0', '0', '0');

-- -----------------------------------------------------

--
-- Volcado de datos para la tabla `puertos`
--

insert into puertos (id_agencia, puerto, clave) values 
	('7', 'Shanghai ', 'CNSHA'),
	('7', 'Qingdao', 'CNQND'),
	('7', 'Tianjin ', 'CNTJN'),
	('7', 'Ningbo ', 'CNNGB'),
	('7', 'Shenzhen ', 'CNSHZ'),
	('7', 'Guangzhou ', 'CNGZH');

-- -----------------------------------------------------

--
-- Volcado de datos para la tabla `transporte`
--

insert into transporte (id_agencia, transporte, clave) values 
	('1', 'Ciudad de México', 'CDMX'),
	('1', 'Guadalajara', 'MXGDL'),
	('1', 'Hermosillo', 'MXHMO'),
	('2', 'Ensenada', 'MXENS'),
	('2', 'Manzanillo', 'MXMZO'),
	('2', 'Veracruz', 'MXVER'),
	('3', 'Nogales', 'MXNOG'),
	('3', 'Nuevo Laredo', 'MXNLD'),
	('4', 'Ciudad de México', 'CDMX'),
	('4', 'Guadalajara', 'MXGDL'),
	('5', 'Manzanillo', 'MXMZO'),
	('6', 'Ensenada', 'MXENS'),
	('6', 'Guaymas', 'MXGYM');
-- -----------------------------------------------------

-- -----------------------------------------------------
-- -----------------------------------------------------
	-- INSERTS DINAMICOS
-- -----------------------------------------------------
-- -----------------------------------------------------

-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_nivelusuario`, `email`, `contrasena`, `nombre`, `id_lada`, `telefono`, `activo`) VALUES
	(1, 'marina@reachmx.com', 'root123.', 'Marina Lara Meza',  2, '(662) 203 5521', 1),
	(1, 'anahy.figueroa@reachmx.com', '123', 'Anahy Figueroa', NULL, NULL, 1);
-- -----------------------------------------------------

--
-- Volcado de datos para la tabla `proveedores`
--
INSERT INTO `proveedores` (`id_proveedor`, `proveedor`, `direccion`, `wechat`, `telefono`, `contacto`, `email`, `website`, `activo`) VALUES
	(1, 'Easy Industry and Trade Co.,ltd', 'HuangDian Industry Zone Yongkang City Zhejiang,China', '8615306603182', NULL, 'Karen Ye', 'market1@ykeasybottle.com', 'www.ykeasybottle.com', 1),
	(2, 'JINHUA BOSUN TECHNOLOGY CO., LTD.', '	Zhejiang, China', '8615857987766', NULL, 'Max Zhang', 'maxzhang@bosun-tech.com ', 'http://maxbosun.en.alibaba.com ', 1),
	(3, 'Yongkang Lanyang Houseware Co.,Ltd', 'Zhejiang, China', 'xiaoyuguaiguai2010', '8657989292297', 'Sandy/Caroline', 'sandy@zjlanos.com\n', 'www.zjlanos.com  /     http://lanos.en.alibaba.com', 1),
	(4, 'SUNKEA', 'Shanghai, China', '8618964997206', NULL, 'Cathy/Luna', 'sk07@sunkea.com', 'www.sunkea.com', 1),
	(5, 'GUANGXI THEBEST PAPER PRODUCTS CO., LTD', 'Guangxi Province, Chin', '86-771-330653', NULL, 'Sarah', 'sarah@nndibeishi.com', 'www.nndibeishi.com', 1),
	(6, 'SHUANGTONG DAILY NECESSITIES CO', 'Zhejiang, China', 'I377151843', '-', 'Eli', 'st04@china-straws.com', 'www.china-straes.com', 1),
	(7, 'ROAD SCENERY INDUSTRIAL LIMITED', 'Beijing HQ, HongKong Office, Qingdao Office, Dongying Office', '8615711097359', '8610597590178003', 'Anna Tian', 'annatiany@yeah.net', NULL, 1),
	(8, 'Jiangsu Yuchang Optical Galsses Co.ltd', 'Danyang Jiangsu P.R. of China', 'F15057040263', NULL, 'Fancy Wu', 'ancy@yc-optical.com', 'ycoptical.en.alibaba.com/', 1),
	(9, 'Foshan Haode refrigeration equipment CO., LTD.', ', Foshan, Guangdong, China', '562492111', '8618927247291', 'Fiona ', 'b2048978986@gmail.com', 'www.fshuaer.com', 1),
	(10, 'QINGDAO GREEF NEW ENERGY EQUIPMENT CO.,LTD', 'Qingdao', '8615269287557', '8653267731422-807', 'Ritta Lee', 'energy@greefenergy.com', 'www.greefenergy.en.alibaba.com', 1);

-- --------------------------------------------------------

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `id_proveedor`, `producto`, `activo`) VALUES
	(1, 1, 'Termos', 1),
	(2, 1, 'Popotes', 1),
	(3, 2, 'Termos ', 1),
	(4, 3, 'Termos ', 1),
	(5, 4, 'Productos de papel', 1),
	(6, 5, 'Productos de papel', 1),
	(7, 6, 'Popotes PLA', 1),
	(8, 7, 'Llantas', 1),
	(9, 8, 'Lentes', 1),
	(10, 9, 'Congeladores de hielo', 1);