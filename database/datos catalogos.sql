use rmx;
-- --------------------------------------------------------
	-- INSERTS DE CATALOGO
-- -----------------------------------------------------

insert into tipo_cambio (tipo_cambio, fecha_creacion) values (20.17, "2021-05-06");

insert into controladores (nombre_controlador) values 
	('Home'), ('Clientes'), ('Plataforma'), ('Usuarios');

insert into versiones_js (version, fecha) values (0.01,'2020-06-23');
--
-- Volcado de datos para la tabla `ladas`
--

insert into niveles_usuarios (tipo, nivel) values 
('root', 1),
('Administrador', 2),
('Asesor', 3),
('Cliente', 4),
('Agente Aduanal', 5);
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
	(1, 'anahy.figueroa@reachmx.com', '123', 'Anahy Figueroa', NULL, NULL, 1),
	(2, 'monica@reachmx.com', 'Monica06', 'Mónica Córdova', NULL, NULL, 1),
	(3, 'jose@reachmx.com', 'arroba10', 'José Gómez', NULL, NULL, 1),
	(3, 'carla@reachmx.com', 'Reachmx1.', 'Carla García', NULL, NULL, 1),
	(3, 'gerardo@reachmx.com', 'Reachmx1.', 'Gerardo Gutiérrez', NULL, NULL, 1),
	(2, 'abraham@reachmx.com', 'ReachMx1', 'Abraham López', NULL, NULL, 1),
	(4, 'jose.lopezr94@gmail.com', 'lospepes', 'Jose', NULL, NULL, 1),
	(4, 'hectornicola94@gmail.com', '01254678', 'Héctor', NULL, NULL, 1),
	(2, 'hector@reachmx.com', 'pingola99', 'Hector Nicola', NULL, NULL, 1);
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
(10, 'QINGDAO GREEF NEW ENERGY EQUIPMENT CO.,LTD', 'Qingdao', '8615269287557', '8653267731422-807', 'Ritta Lee', 'energy@greefenergy.com', 'www.greefenergy.en.alibaba.com', 1),
(11, 'Jiangsu Naier Wind Power ', 'Wuxi city,China ', '8613915276191', '865108518 616', 'Lucy  Lu', 'sales02@wxnaier.com', 'www.wxnaier.com ', 1),
(12, 'LUMA COMERCIALIZADORA SA DE CV', NULL, '5219993705542', NULL, 'Luis Enrique', NULL, 'www.costamayaagricola.com', 1),
(13, 'dingrong container house', 'Shandong Province, China', '8615192384158', NULL, 'Shirley Liu', 'shirley@drsteelstructure.com', 'https://www.containerhomeshouses.com', 1),
(14, 'Shanghai Meiman Door Co.,Ltd.', 'Shanghai ', '8613916583859', '862167681009', 'Andy', 'andy@shmeiman.com', 'www.shmeiman.com', 1),
(15, 'QPS ELECTRONICS CO.,Limited\nSHENZHEN PEICHENG TECHNOLOGY CO., LTD ', 'Shenzhen,Guangdong, China', '8613560756560', '8675527334670', 'Ivy', 'sales12@sino-qps.com', 'http://sino-qps.com', 1),
(16, 'MULTI-GOLD INDUSTRIAL LIMTED', 'Shenzhen, CHINA', '8618038066859', NULL, 'Serina', 'serina@multigoldhk.com', 'www.multigoldhk.com', 1),
(17, 'Shenzhen Yanbochuang Technology Co., Ltd', 'Shenzhen, CHINA', '8675582529051', NULL, 'Gily', 'sales02@ybc360.com', 'www.hipomall.com', 1),
(18, 'Great Asia Electronic Co.Ltd.', 'Shenzhen', '8613713651665', NULL, 'Mia Tan', 'export@sz-tabletpc.com', 'www.sz-tabletpc.com', 1),
(19, 'KEMCORE Europe s.r.o.', 'Czech Republic', '420608908166', NULL, 'Corina BARTRA', 'corina@kemcore.com', 'www.kemcore.com', 1),
(20, 'LIHONG Factory', 'Factory · Chaozhou  Office · Guangzhou (CHINA)', NULL, '862089052285', 'Calicy Zhang', 'an@icmlh.com', '[../inbox/www.lhicm.com]www.icmlh.com', 1),
(21, 'Wuyi Hongtai Stainless Steel Drinkware CO.,Ltd', NULL, NULL, NULL, 'Cherry', 'cherry@hongtaidrinkware.com', 'www.wyhaotai.en.alibaba.com', 1),
(22, 'Fungho Industries ', 'Jiangman city', '8613827038161', '867506785268', 'Cathy Liu', 'cathy@funghoindustries.cn', NULL, 1),
(23, 'Xi \'an Gavin Electronic Technology Co., Ltd', NULL, '8618209225943', '862981292510', 'Wellsa Wei', 'sales31@gaimc.com', 'www.gaimc.com', 1),
(24, 'Fuzhou Jointer Plastic Welding Machine Co., Ltd', 'Fuzhou Ctiy, Fujian Province, China.', '8618705918780', '8659183811002', 'Ada', 'sales1@jointer.com.cn', NULL, 1),
(25, 'Yixing Shenzhou Earth Working Material Co.,ltd', NULL, '861390153889', NULL, 'Cathy Liu', 'cathy@geogrid-cn.com', 'www.geogrid-cn.com', 1),
(26, 'HEBEI MINGMAI TECHNOLOGY CO.,LTD', 'Qiaoxi District,Shijiazhuang,Hebei,China.', '8613739745191', NULL, 'David Xue', 'david@peweldingmachine.com ', 'www.hdpeweldingmachine.com ', 1),
(27, 'Diron Furntiure', 'Guangdong,China', '8618664226883', NULL, 'Jess', 'dironfurniture@yahoo.com', 'https://dironfurniture.wixsite.com/dironfurniture', 1),
(28, 'Shenzhen Iscrem Technology Co.,Ltd.', 'Guangdong,China', '8615982058755', NULL, 'Lily', 'lily@iscremled.com', 'www.iscremled.com    \n    iscrem.en.alibaba.com ', 1),
(29, 'Mahoo International', 'Ningbo China', '865742785268', NULL, 'Sandy Chen', 'sales8@nbmahoo.com', 'www.mahoo.en.alibaba.com', 1),
(30, 'ZheJiang YongKang Yitai Hardware Co.,Ltd', 'Zhejiang, China', '13516980778', NULL, 'Carina', 'yitai04@ykyitai.com', 'https://ykyitai.en.alibaba.com', 1),
(31, 'Everich Commerce Group Limited', 'Hangzhou Zhejiang 310016,China', '1023498648', '8657189996362', 'Tristan', 'tristan@everich.cn', 'www.everich.cn', 1),
(32, 'J AND R Metalwork Industry Co.,LTD', 'Guangdong,China', '8615768339675', NULL, 'Handy', 'handy@jrmetalwork.com', 'www.jrmetalwork.com', 1),
(33, 'Hebei Orient Rubber & Plastic Co.,Ltd.', 'Hebei, China', '86 18031853605', NULL, 'Sophie Lu', 'sales18@orientrubber.com', 'www.orientrubber.com', 1),
(34, 'HalloChem Group Co., Ltd.', 'Chongqing 401121, China', '862367030727', NULL, 'Zou Qian', 'info@hallochem.com', 'www.hallochem.com', 1),
(35, 'Lockey Safety Products Co.,Ltd', 'Zhejiang, China', 'Jessie15382516252', NULL, 'jessie', 'sales06@lockeysafety.com', 'http://lockeylockout.com', 1),
(36, 'Onu Mall', 'Shenzhen city, China', '86075566607890', NULL, 'Yoyo', 'yoyo@onu-mall.com', 'http://www.onu-mall.com', 1),
(37, 'Shanghai Wanuo', 'Shanghai', NULL, NULL, 'Monica Ding', 'sales@wanuoindustrial.com', 'https://shwannuo.en.alibaba.com/?spm=a2700.8443308.0.0.1c133e5fyxaZbM', 1),
(38, 'Foshan City Smart Mascot Costume Co. Ltd', 'Guangdong, China', 'sanchow', '8618520935883', 'Jojo Zhou', 'sale88@smartmascot.com', 'https://smartmascottoys.en.alibaba.com/', 1),
(39, 'Jining Luheng Machinery Equipment', 'Shandong, China', 'wxid_q0dmod0', NULL, 'Suki Wang', NULL, 'https://luhengmachinery.en.alibaba.com/', 1),
(40, 'Guangzhou Accurates Opto-Electronic Co., Ltd', 'Guangdong, China', '8613929577407', '8613929577407', 'Rose Deng', NULL, 'https://accurats-led.en.alibaba.com/?spm=a2700.8443308.0.0.6f8e3e5fYGy3aU', 1),
(41, 'Timeco (Shanghai) Industrial Co., Ltd', 'Shanghai, China', 'kittyli_1985', '8613761640927', 'Kitty Ly', NULL, 'https://ecoasia.en.alibaba.com', 1),
(42, 'Anhui Green Earth Technology Co., Ltd', 'Anhui, China', 'Joanna315_Sue', NULL, 'Joanna Sue', NULL, 'https://ahgreenearth.en.alibaba.com/', 1),
(43, 'Hefei Pingo Import And Export Co., Ltd', 'Anhui, China', 'DanielZhengCn', NULL, 'Daniel Zheng', NULL, 'https://royalstar01.en.alibaba.com/?spm=a2700.8443308.0.0.6f8e3e5fYGy3aU', 1),
(44, 'Guangzhou Souxin Appliances Co., Ltd.', 'Guangdong, China', 'wxid_6lg4flc36s8b22', NULL, 'Alice/Grace', NULL, 'https://gzsouxin.en.alibaba.com/', 1),
(45, 'Hebei Nie Shang Trade Co., Ltd', 'Hebei, China', NULL, NULL, 'Eileen Liu', NULL, 'https://nieshang.en.alibaba.com', 1),
(46, 'Qingdao Enlightening Electromechanical Co., Ltd', 'Shandong, China', 's17685838729', NULL, 'Flora', NULL, 'https://qdlanting.en.alibaba.com', 1),
(47, 'Ningbo Fulman Technology Co., Ltd.', 'Zhejiang, China', 'wect66', NULL, 'Eric Xu', NULL, 'https://vention1.en.alibaba.com/', 1),
(48, 'Shenzhen Chitwan Plastic Co., Ltd', 'Guangdong, China', 'Amy13631516481', NULL, 'Amy Yim', NULL, 'https://qiw.en.alibaba.com', 1),
(49, 'Shenzhen SNP Trade Co., Limited', 'Guangdong, China', 'acksxu01', NULL, 'Acks Hsu', NULL, 'https://snptek.en.alibaba.com', 1),
(50, 'Shanghai Join Plastic Products Co., Ltd', 'Shanghai, China', '8618217103917', '-2146826265', 'Karry Kang', NULL, 'https://shjiajiu.en.alibaba.com/', 1),
(51, 'JMS SPRING ENTERPRISE CO., LTD', 'Taiwan', NULL, NULL, 'Anita Su', NULL, 'https://jmsgroup.en.alibaba.com', 1),
(52, 'Jinuo Ecommerce Co, Ltd', 'Guangdong, China', 'sadlove1990', NULL, 'Wei Li', NULL, 'https://jinuocostume.en.alibaba.com/?spm=a2700.8443308.0.0.1bca3e5fFRLYyC', 1),
(53, 'Changsu Lianshang Home Textile Co, Ltd', 'Jiangsu, China', 'fei1028379759', NULL, 'Guard Mert', NULL, 'https://hareecisu.en.alibaba.com/?spm=a2700.8443308.0.0.1bca3e5fFRLYyC', 1),
(54, 'Suzhou Renree Textile Co. Ltd', 'Jiangsu, China', 'wxid_wlw0fpnx5w1p12', '8613812636544', 'Mandy Wang', NULL, 'https://szrenreetex.en.alibaba.com/?spm=a2700.8443308.0.0.1bca3e5fFRLYyC', 1),
(55, 'Zhong Yun Intelligent Machinery (Yantai) Corp', 'Shandong, China', NULL, NULL, 'Andy Ma', NULL, 'https://zhongyungroup.en.alibaba.com/?spm=a2700.8443308.0.0.1bca3e5fFRLYyC', 1),
(56, 'Changshu AiLanQi Home Textile Co., Lt', 'Jiangsu, China', 'zhongyun009', NULL, 'Toney Lu', NULL, 'https://ailanqi.en.alibaba.com/?spm=a2700.8443308.0.0.1bca3e5fFRLYyC', 1),
(57, 'Yangzhou Wealth Traveling Articles Co., Ltd', 'Jiangsu, China', 'YangzhouWealth', NULL, 'Lucy Zhang', NULL, 'https://yzwes.en.alibaba.com/?spm=a2700.8443308.0.0.1bca3e5fFRLYyC', 1),
(58, 'Hangzhou Shenqu Fineries Co., Ltd', 'Zhejiang, China', '8618358592522', '8618358592522', 'Keira Zheng', 'keira@hzsilk.cn', 'https://hzshenqu.en.alibaba.com/?spm=a2700.8443308.0.0.1bca3e5fFRLYyC', 1),
(59, 'Changle Baolong Textile Co., Ltd', 'Fujian, China', 'Senorita076', NULL, 'Wendy LU', NULL, 'https://paolong.en.alibaba.com/company_profile.html?spm=a2700.icbuShop.88.36.654f18d450AORG', 1),
(60, 'Nanjing Youxin Ice Pack Co., Ltd', 'Jiangsu, China', NULL, NULL, 'Sherry Tan', 'sherrynjyouxin@outlook.com', 'https://njyouxin.en.alibaba.com/?spm=a2700.8443308.0.0.1bca3e5fFRLYyC', 1),
(61, 'Nantong Qianyue Textile Co., Ltd', 'Jiangsu, China', 'xu295716768', NULL, 'Rita Xu', 'sale1@qianyuetex.com', 'https://qianyuetex.en.alibaba.com/?spm=a2700.8443308.0.0.1bca3e5fFRLYyC', 1),
(62, 'Shanghai Liucare Sports Goods Co., Ltd', 'Shanghai, China', 'n0907n', NULL, 'Nancy Zhou', NULL, 'https://liucare.en.alibaba.com/?spm=a2700.8443308.0.0.1bca3e5fFRLYyC', 1),
(63, 'Dongguan Leduo Garment Co., Ltd', 'Guangdong, China', 'ouyang1207463551', NULL, 'Jennifer Ouyang', NULL, 'https://dgleduo.en.alibaba.com/?spm=a2700.8443308.0.0.1bca3e5fFRLYyC', 1),
(64, 'Shantou City Yayu Industries Co., Ltd.', 'Guangdong, China', 'iii15728824160', NULL, 'Lcey Yang', NULL, 'https://styayu.en.alibaba.com/?spm=a2700.8443308.0.0.1bca3e5fFRLYyC', 1),
(65, 'Anping County Yize Metal Products Co., Ltd', NULL, '8615833963523|', NULL, 'Joyce Q', 'sales3@yizemetal.com', 'www.yizemetal.com', 1),
(66, 'Baoding Chuanye Bags Manufacturing Co.,Ltd.', 'Hebei, China', 'ikevinli', '8615127275971', 'Kevin Li', 'kevin@chuanyebags.com', 'https://chuanyebags.en.alibaba.com/?spm=a2700.8443308.0.0.3f4b3e5fiI400B\n', 1),
(67, 'Ningbo Jewin Electrical Appliances Co.,Ltd', NULL, 'jaydong206', '8613867897769', 'Jay ', 'chinajewin@126.com', 'Http://www.jewintech.com', 1),
(68, 'Shenzhen Sailing Paper Factory ', 'Xiaheng Tian Industrial Park, Foshan city, China ', '8613621137780', '8613621137780', 'Leaf Hu', 'leaf@sailingpaper.com', 'www.sailingpaper.com   ', 1),
(69, 'Amed Refrigeration Solutions', 'Qingdao,China', 'Jack18661729001', '8618661729001', 'Jack Xu', 'jack@amedrefrigeration.com', 'https://qdamd.en.alibaba.com/?spm=a2700.details.cordpanyb.4.608c1a59nznrEf', 1),
(70, 'HONGKONG YOUNGPLUS TECHNOLOGY CO., LIMITED', 'Shenzhen, Guangdong, China ', 'y1136386310', '8613677379462', 'Jenny Yang\n', NULL, 'https://ypt.m.en.alibaba.com?tracelog=alisupplier_sns_minisite', 1),
(71, 'JK TECK. Co., Ltd', 'Buk-gu, Busan, South Korea', 'sepej86', '2517158252', 'Eugene', 'santaeugene@gmail.com ', 'http://jkteck.co.kr/', 1),
(72, 'Yuyao Successful Stationery Products Co., Ltd', 'Yuyao city ZheJiang Province China', 'qsy_0224', NULL, 'Ellen', 'sales6@nb-success.com', 'http://www.nb-success.com/index.html', 1),
(73, 'Shaoxing Shunxing Metal Producting Co.,LTD', 'Shaoxing, Zhejiang, China.', 'bohe1982', '8657588214896', 'Ida', 'shunxing@staples-brads.com', 'http://www.staples-brads.com/EN/index.asp', 1),
(74, 'LANXI WANGXING PLASTIC CO.,LTD', 'LANXI CITY, ZHEJIANG PROVINCE,CHINA', 'Azurein_T', '86057985506021', 'Derek', 'sales@cnrubberband.com', 'http://www.rubberbands.com.cn/index.php?lang=en', 1),
(75, 'Ningbo Bin Bin Stationery CO.,ltd', 'Qiao Tou Hu, Ninghai, Ningbo, China', NULL, NULL, 'Justin', 'justinwei@binbin.cc', '\n', 1),
(76, 'Cangzhou Xinda Sports Equipment Co., Ltd.', 'Haixing County, Cangzhou City, Hebei Province, China  ', 'wxid_qax51iy75toh22', '8619130639580', 'Alice Zhai ', '2260056265@qq.com ', 'https://xykty.en.alibaba.com/', 1),
(77, 'Termos China ', 'Chunhan 3rd District,Yiwu City,China', NULL, '8613868972749', 'Joy Wang\n', NULL, 'https://ywjoyful.en.alibaba.com/', 1),
(78, 'Guohao(Shenzhen) Technology R&D Co., Ltd. ', 'Longgang St., Longgang Dist., Shenzhen', 'yuchen006668', '8675589302686', 'Cathy Liao', 'sales03@ghplastic.cn', 'https://ghsz.en.alibaba.com/', 1),
(79, 'Shinelong Building Better Kitchens', 'Guangzhou, China', 'Annie0618_1024', '13822281065', 'Annie', 'sales4@furnotel.net.cn', 'www.chinashinelong.com', 1),
(80, 'ZHEJIANG ZHENGLONG SPORTS UTENSILS CO.,LTD  ', 'Wuyi County,Zhejiang Province,China  ', '8615238615467', '8615238615467', 'Abboot Liu  ', 'sales2@zlqx.com  ', 'http://www.zlqx.com ', 1),
(81, 'HenanZokeCraneCo.,Ltd. ', 'XinxiangCity,Henan Province,China', NULL, '8618738575087', 'FelixYu', 'felix@zokecrane.com', NULL, 1),
(82, 'shenzhen jade iot-sensing technology co. ltd', 'Shenzhen', 'yc13798730903', NULL, 'Angela ', NULL, NULL, 1),
(83, 'Ecoforever', 'Shenzhen', 'sandywang1214', NULL, 'Sandy', NULL, 'https://ecoforever.en.alibaba.com/', 1),
(84, 'Ningo Alldo Stationery Co., Ltd', 'Ningbo, China', 'mary-chang559', '8657465231250', 'Mary', 'sales@alldochina.com', 'http://www.stapler-punch.com/en/', 1),
(85, 'Jinhua Kanghui Plastic Stationery Co., Ltd', 'Jinhua, China', 'wxid_2czaytp3eu0322', '8657982966668', 'Dr.Fan', 'dr.fan@drfan.cn', 'http://www.drfan.cn/index.php/index/index/g/e.html', 1),
(86, 'Kaisite Stationery Co., Ltd', 'Zhejiang, China', 'iiecho', '8657985952968', 'Ms. Echo', 'kaisite@ywkaisite.com', 'http://www.ywkaisite.com/en/kaisite@ywkaisite.com', 1),
(87, 'Cixi Stationery Manufacturing Co., Ltd', 'Zhejiang, China', 'perfect_hamony', '8657463678898', 'Summer', 'iving@ivingpen.com', 'http://www.ivingpen.com/en/', 1),
(88, 'Yixing Wangzhe Laminating Film Co., Ltd', 'Yixing city, China', 'XXMHYQMH', '13601531020', NULL, 'wangzhe@yxwangzhe.com', 'https://www.wonlami.com/about-us/', 1),
(89, 'Yong Kang SUNYK Industry & Trade Co., LTD', 'Zhejiang, China', '87501001', '8657987504002', 'Ann', 'ann@sunyk.com', 'www.yksunyk.com', 1),
(90, 'Yong Kang Dongming Industry And Trade Co., LTD', 'Zhejiang, China', NULL, '8657987151830', 'Mida', 'sales@chinadongming.com', 'www.chinadongming.com', 1),
(91, 'MONETA INTERNATIONAL (HK)', 'HONG KONG', 'wxid_h22i5oy3vjoq12', '8522854 2366', 'Prakash', 'moneta@monetagroup.net', 'http://www.monetagroup.net/home.php', 1),
(92, 'Guangdong Haiqingxin Environmental Technology Co. LTD', 'Shenzhen, Guangdong', 'Kevinvan1948', NULL, 'Kevin Van ', 'kevin@hikins.com ', 'www.hikins.cn', 1),
(93, 'STARLIGHTS INTERNATIONAL LIMITED', 'Xiamen', 'wxid_s53b1yxyypd122', '8618965168417', 'Chloe Chen', 'sales@starlightsco.com', NULL, 1),
(94, 'Fabsub Technologies', 'Guangzhou', NULL, '8615088053780', 'Shirley', 'sales1@fabsub-tech.com', NULL, 1),
(95, 'TR Sunglasses', 'Zhejiang, China', 'SnHya__', NULL, 'Abby', NULL, NULL, 1),
(96, 'Shenzhen Zhenghao Plasyic Packaging Co.,Ltd', 'Shenzhen, Guangdong', 'HL1184173166', NULL, 'Carol', NULL, NULL, 1),
(97, 'Uzspace', 'Shenzhen, Guangdong', 'zspacebottles', NULL, 'James lee', NULL, NULL, 1),
(98, 'Zhuji FengFanf Piping Co', 'Zhejiang, China', NULL, NULL, 'Jessie', 'sales03-ifan@ifangroup.com', 'www.zjfengfan.com', 1),
(99, 'Tianjin RJH Metal Products', 'Tianjin', '8618722232977', '862268558598', 'Tina ', 'tina@tjrjh.com', NULL, 1),
(100, 'Hangzhou Lohand Biological Co., Ltd, ', 'Hangzhou', 'hevaryzhong', NULL, 'Bill Zhong', 'xbillzh@hotmail.com', 'www.lohandbio.com', 1),
(101, 'RYHX Plastic & Hardware Products Co., Ltd.', 'Shenzhen', 'TwT1307936233', NULL, 'June', NULL, NULL, 1),
(102, 'Dongan Ceramics', 'Guangzhou', 'Donghanceramic / xid_gvqrkx4sddbf22', NULL, 'Monica', 'dh66@donghan.cn', 'http://www.dhpot.com/', 1),
(103, 'Xinxiang JIAHUI FRP Environmental Equipment Co.,LTD', 'Xinxiang', 'peter13598730635', '8613026606550', 'Peter', 'peter@jhcoolingtower.com', 'http://www.jhcoolingtower.com/', 1),
(104, 'Shenzhen Huaxin Ceramics Industry Co.,Ltd', 'Shenzhen', '8613316445906', '8613316445906', 'Leaf Li', 'leaf@hxcera.com', 'www.hxcera.com', 1),
(105, 'Yongkang Promise', 'YongKang', 'Louts0612', NULL, 'Abby', NULL, NULL, 1),
(106, 'Koller', 'Guangdong, China', 'mzr18390826215', NULL, 'Estela', 'friendlyalex@gzkoller.com', 'https://koller.en.alibaba.com/es_ES/company_profile.html?spm=a2700.icbuShop.88.18.e6a940803wPOc8', 1),
(107, 'Dreams Link', 'Hunan ', 'wxid_kry8ptds3n1m21', NULL, 'Cristina', NULL, NULL, 1),
(108, 'Coffee Grinder', 'Guangdong, China', 'water_muzai', NULL, 'Ashley', NULL, NULL, 1),
(109, 'Lavinia', 'Hangzhou', 'zzz530683012', '86137-3585-5998', 'Joanna Cheung', 'joanna@lavinia.ltd', NULL, 1),
(110, 'Shenzhen Kaydeli Refrigeration Equipment Co; Ltd.', 'Shenzhen', 'wxid_mlt9yc4ijl5322', '75528122621', 'Bonnie', 'bxchillersales01@szkaydeli.com', 'www.szkaydeli.cn', 1),
(111, 'Chaozhou Jurong Melamine Products Co., Ltd', 'Guangdong, China', 'wxid_9gn131xo2lfm12', NULL, 'Sarah', NULL, NULL, 1),
(112, 'Han Industrial Corporation Limited', 'Hong Kong', 'yyy5963231', '863176613888', 'Jenny', 'info@hanindus.com', 'https://www.hanindus.com/Contact-us.html', 1),
(113, 'Pengrui Houseware Co.,Ltd.', 'Wenzhou', '8613695867380', '8613695867380', 'Michael', 'sales@pengruicoffee.com', 'http://www.pengruicoffee.com/', 1),
(114, 'Gemc Technology Group Limited ', 'Henan', '8613939957339', '8613939957339', 'Susie Ma', 'export01@gv-medic.com', 'http://www.gv-medic.com/', 1),
(115, 'Guangzhou Kingwell Heat Transfer Technology Co., Ltd', 'Guangzhou', NULL, '8618903063342', 'Kiki', 'sales3@gdkingwell.com', 'http://www.gdkingwell.com', 1),
(116, 'Molekula Group', 'Alemania/España', NULL, '34932204000', 'Lara', 'l.lopez@molekula.com', NULL, 1),
(117, 'Fujian Snowman Trade Co., Ltd.', 'Fujian, China', NULL, '8659128701111', 'Steve', 'snowkey12@snowkey.com', 'https://www.snowkey.com', 1),
(118, 'Shenzhen Smile Technology Co., Ltd', 'Shenzhen,China', 'py19950825', '86079188167256', 'Connie/Leslie', 'sales2@fondsmile.com', NULL, 1),
(119, 'Zhengzhou Smile Dental Equipment Co., Ltd.', 'Zhenzhou, China', 'liujiasanshao2014', '8637163862996', 'MC', NULL, NULL, 1),
(120, 'Guangzhou Wei Ge Machinery Equipment Co., Ltd', 'Guangzhou, China', 'wgmachinery', NULL, 'Tansy ', NULL, NULL, 1),
(121, 'Food Machine Guangzhou Union Co., Ltd ', 'Guangzhou, China', NULL, '862034551359', 'Mahfujur Rahman', NULL, NULL, 1),
(122, 'ReachMX', 'Zemeño 30', 'N/A', '6621632769', 'Jose Dorame', 'jdorame@reachmx.com', 'http://www.jdorame.reachmx.com', 1);

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
	(10, 9, 'Congeladores de hielo', 1),
	(11, 10, 'Generadores Eólicos', 1),
	(12, 11, 'Generadores Eólicos', 1),
	(13, 12, 'Aguacate', 1),
	(14, 13, 'Portable restrooms', 1),
	(15, 14, 'Puertas de impacto', 1),
	(16, 15, 'Tablets', 1),
	(17, 16, 'Tablets', 1),
	(18, 17, 'Tablets', 1),
	(19, 18, 'Tablets', 1),
	(20, 19, 'Cianuro de Sodio', 1),
	(21, 20, 'Tazas', 1),
	(22, 20, 'Cafteras', 1),
	(23, 21, 'Cafeteras', 1),
	(24, 22, 'French Press', 1),
	(25, 23, 'Medidor de flujo', 1),
	(26, 24, 'Plastic Welders', 1),
	(27, 25, 'Geomembrana', 1),
	(28, 26, 'Máquinas Geomembrana', 1),
	(29, 27, 'Muebles', 1),
	(30, 28, 'Reflectores de Led', 1),
	(31, 29, 'Termos', 1),
	(32, 29, 'Vasos', 1),
	(33, 29, 'Café', 1),
	(34, 30, 'Temos', 1),
	(35, 31, 'Termos', 1),
	(36, 32, 'Tuercas', 1),
	(37, 33, 'Manguera Hidráulica', 1),
	(38, 34, 'Químicos', 1),
	(39, 35, 'Candados', 1),
	(40, 36, 'Popotes SS', 1),
	(41, 37, 'Coconut Bowls', 1),
	(42, 38, 'Mamelucos Caricatura', 1),
	(43, 39, 'Máquina Automática de Aplanado', 1),
	(44, 40, 'Reflectores de Led', 1),
	(45, 41, 'Popotes de Papel', 1),
	(46, 42, 'Popotes de Bambú', 1),
	(47, 43, 'Aire Acondicionado', 1),
	(48, 44, 'Aire Acondicionado', 1),
	(49, 45, 'BOPP Film', 1),
	(50, 46, 'Contenedores Plegables', 1),
	(51, 47, 'Ipad Holder', 1),
	(52, 48, 'Ipad Holder', 1),
	(53, 49, 'Ipad Holder', 1),
	(54, 50, 'Contenedores Plegables', 1),
	(55, 51, 'Popotes de Acero Inoxidable', 1),
	(56, 52, 'Mamelucos Caricatura', 1),
	(57, 53, 'Mamelucos Caricatura', 1),
	(58, 54, 'Mamelucos Caricatura', 1),
	(59, 55, 'Dron de Agricultura', 1),
	(60, 56, 'Mamelucos Caricatura', 1),
	(61, 57, 'Antifaz de Gel', 1),
	(62, 58, 'Pijamas de Satin', 1),
	(63, 59, 'Pijamas de Satin', 1),
	(64, 60, 'Antifaz de Gel', 1),
	(65, 61, 'Pijamas de Satin', 1),
	(66, 62, 'Antifaz de Gel', 1),
	(67, 63, 'Pijamas de Satin', 1),
	(68, 64, 'Pijamas de Satin', 1),
	(69, 65, 'Kits de café', 1),
	(70, 66, 'Galvanized wire', 1),
	(71, 67, 'Mochilas', 1),
	(72, 68, 'Dispensadores de Agua', 1),
	(73, 69, 'Thermal paper Coil', 1),
	(74, 70, 'Maquina dispensadora', 1),
	(75, 71, 'Pinzas ', 1),
	(76, 72, 'Base Marmol (Medidor)', 1),
	(77, 73, 'Marcador Pintarron', 1),
	(78, 74, 'Marcador Permanente', 1),
	(79, 74, 'Marcatextos', 1),
	(80, 74, 'Pintarron', 1),
	(81, 75, 'Grapas', 1),
	(82, 76, 'Ligas', 1),
	(83, 77, 'Engrapadora', 1),
	(84, 77, 'Sacagrapa', 1),
	(85, 77, 'Perforadora', 1),
	(86, 77, 'Corrector', 1),
	(87, 78, 'Canasta Basketball', 1),
	(88, 79, 'Termo Bamboo', 1),
	(89, 80, 'Craneo Resina Plastica', 1),
	(90, 81, 'Freezer ', 1),
	(91, 82, 'Máquina para hacer Helado', 1),
	(92, 83, 'Motocicleta', 1),
	(93, 84, 'Malacate', 1),
	(94, 85, 'Sensores de gas', 1),
	(95, 86, 'Termos', 1),
	(96, 87, 'Staplers', 1),
	(97, 87, 'Broches Baco', 1),
	(98, 87, 'Clips', 1),
	(99, 87, 'Sujeta Documentos', 1),
	(100, 88, 'Lápiz Adhesivo', 1),
	(101, 89, 'Post- it, Banderitas', 1),
	(102, 89, 'Muestrario Piel', 1),
	(103, 90, 'Marcadores permanentes', 1),
	(104, 90, 'Marcatextos', 1),
	(105, 91, 'Mica, Cubiertas Negro Opaco', 1),
	(106, 92, 'Materiales de acero inoxidable', 1),
	(107, 93, 'Materiales de acero inoxidable', 1),
	(108, 94, 'Accesorios y refacciones para puertas industriales', 1),
	(109, 95, 'Sistemas de Osmosis y relacionados ', 1),
	(110, 96, 'Tazas Cerámica', 1),
	(111, 97, 'Temos', 1),
	(112, 98, 'Lentes', 1),
	(113, 99, 'Botellas de plástico', 1),
	(114, 100, 'Termos', 1),
	(115, 100, 'Termos', 1),
	(116, 100, 'Botellas de plástico', 1),
	(117, 101, 'Pipas de plástico', 1),
	(118, 102, 'Steel Coils', 1),
	(119, 103, 'Tiras Reactivas', 1),
	(120, 104, 'Envases de siicón', 1),
	(121, 105, 'Cerámica', 1),
	(122, 106, 'Cooling Towers', 1),
	(123, 107, 'Artículos de Cerámica', 1),
	(124, 108, 'Termos', 1),
	(125, 109, 'Maquina de hielo', 1),
	(126, 110, 'Pulseras de silicón', 1),
	(127, 111, 'Coffee Grinder', 1),
	(128, 112, 'Ganchos', 1),
	(129, 113, 'Chiller', 1),
	(130, 114, 'Platos melamina', 1),
	(131, 115, 'Bearings', 1),
	(132, 116, 'Cafetera Italiana', 1),
	(133, 117, 'Water testing strips', 1);

--
-- Volcado de datos para la tabla `destinos_cotizador`
--

INSERT INTO `destinos_cotizador` (`id_destino`, `destino`, `tipo`, `activo`) VALUES
	(1, 'NINGBO', 1, 1),
	(2, 'SHANGHAI', 1, 1),
	(3, 'SHENZHEN', 1, 1),
	(4, 'QINGDAO', 1, 1),
	(5, 'TIANJIN', 1, 1),
	(6, 'GUANGZHOU', 1, 1),
	(7, 'HONG KONG', 1, 1),
	(8, 'XIAMENN', 2, 1),
	(9, 'BEIJINGl', 1, 1),
	(10, 'LAZARO CARDENAS', 2, 1),
	(11, 'MANZANILLO', 2, 1),
	(12, 'ENSENADA', 2, 1),
	(13, 'GUAYMAS', 2, 1),
	(14, 'CIUDAD DE MEXICO', 2, 1),
	(15, 'GUADALAJARA', 2, 1);

--
-- Volcado de datos para la tabla `catalogo_cotizador`
--

INSERT INTO `catalogo_cotizador` (`id_catalogo`, `id_origen`, `id_destino`, `tipo`, `tarifa_aerea`, `lcl_cbm`, `ft20`, `ft40`, `hq40`, `activo`) VALUES
	(1, 1, 10, 2, '0.00', '150.00', '7300.00', '8300.00', '8300.00', 1),
	(2, 1, 11, 2, '0.00', '150.00', '7300.00', '8300.00', '8300.00', 1),
	(3, 2, 12, 2, '0.00', '180.00', '7400.00', '8600.00', '8600.00', 1),
	(4, 1, 12, 2, '0.00', '150.00', '7300.00', '8300.00', '8300.00', 1),
	(5, 1, 13, 2, '0.00', '150.00', '8000.00', '9000.00', '9000.00', 1),
	(6, 2, 10, 2, '0.00', '180.00', '7400.00', '8600.00', '8600.00', 1),
	(7, 2, 11, 2, '0.00', '180.00', '7400.00', '8600.00', '8600.00', 1),
	(8, 2, 13, 2, '0.00', '180.00', '8150.00', '9400.00', '9400.00', 1),
	(9, 3, 10, 2, '0.00', '150.00', '7300.00', '8300.00', '8300.00', 1),
	(10, 3, 11, 2, '0.00', '150.00', '7300.00', '8300.00', '8300.00', 1),
	(11, 3, 12, 2, '0.00', '150.00', '7300.00', '8300.00', '8300.00', 1),
	(12, 3, 13, 2, '0.00', '150.00', '8000.00', '9000.00', '9000.00', 1),
	(13, 4, 10, 2, '0.00', '180.00', '7300.00', '8300.00', '8300.00', 1),
	(14, 4, 11, 2, '0.00', '180.00', '7300.00', '8300.00', '8300.00', 1),
	(15, 4, 12, 2, '0.00', '180.00', '7300.00', '8300.00', '8300.00', 1),
	(16, 4, 13, 2, '0.00', '180.00', '9000.00', '9000.00', '9000.00', 1),
	(17, 5, 10, 2, '0.00', '150.00', '7300.00', '8300.00', '8300.00', 1),
	(18, 5, 11, 2, '0.00', '150.00', '7300.00', '8300.00', '8300.00', 1),
	(19, 5, 12, 2, '0.00', '150.00', '7300.00', '8300.00', '8300.00', 1),
	(20, 5, 13, 2, '0.00', '150.00', '8000.00', '9000.00', '9000.00', 1),
	(21, 6, 10, 2, '0.00', '180.00', '7300.00', '8300.00', '8300.00', 1),
	(22, 6, 11, 2, '0.00', '180.00', '7300.00', '8300.00', '8300.00', 1),
	(23, 6, 12, 2, '0.00', '180.00', '7300.00', '8300.00', '8300.00', 1),
	(24, 6, 13, 2, '0.00', '180.00', '8000.00', '9000.00', '9000.00', 1),
	(25, 7, 10, 2, '0.00', '150.00', '7300.00', '8300.00', '8300.00', 1),
	(26, 7, 11, 2, '0.00', '150.00', '7300.00', '8300.00', '8300.00', 1),
	(27, 7, 12, 2, '0.00', '150.00', '7300.00', '8300.00', '8300.00', 1),
	(28, 7, 13, 2, '0.00', '150.00', '8000.00', '9000.00', '9000.00', 1),
	(29, 8, 10, 2, '0.00', '180.00', '7300.00', '8300.00', '8300.00', 1),
	(30, 8, 11, 2, '0.00', '180.00', '7300.00', '8300.00', '8300.00', 1),
	(31, 8, 12, 2, '0.00', '180.00', '7300.00', '8300.00', '8300.00', 1),
	(32, 8, 13, 2, '0.00', '180.00', '8000.00', '9000.00', '9000.00', 1),
	(33, 2, 14, 1, '11.60', '0.00', '0.00', '0.00', '0.00', 1),
	(34, 2, 15, 1, '11.40', '0.00', '0.00', '0.00', '0.00', 1),
	(35, 9, 14, 1, '11.60', '0.00', '0.00', '0.00', '0.00', 1),
	(36, 9, 15, 1, '11.40', '0.00', '0.00', '0.00', '0.00', 1),
	(37, 6, 14, 1, '11.50', '0.00', '0.00', '0.00', '0.00', 1),
	(38, 6, 15, 1, '11.00', '0.00', '0.00', '0.00', '0.00', 1),
	(39, 7, 14, 1, '11.50', '0.00', '0.00', '0.00', '0.00', 1),
	(40, 7, 15, 1, '11.50', '0.00', '0.00', '0.00', '0.00', 1);