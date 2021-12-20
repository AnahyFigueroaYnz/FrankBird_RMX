drop database if EXISTS birdie;
Create database if not exists birdie;
Use birdie; 
-- drop database reachmxc_platform;  use reachmxc_platform; 

--
-- Estructura tabla controladores para mantenimiento
create table controladores (
	id_controlador int not null auto_increment primary key,
	nombre_controlador varchar(30),
	activo int
);

create table versiones_js(
	id_version int not null auto_increment primary key,
	version decimal(24,2),
	fecha date,
	activo int default 1
);

-- ESTRUCTURA TABLA NIVEL USUARIOS
create table niveles_usuarios (
	id_nivelusuario int not null auto_increment primary key,
	tipo varchar(20),
	nivel int,
	activo int default 1
);
-- 1 root 2 admin 3 asesor 4 cliente

-- Estructura para tabla ladas
create table ladas(
	id_lada int not null auto_increment primary key,
	lada varchar(10),
	abrev varchar(7),
	activo int default 1
);

-- ESTRUCTURA TABLA TIPOS DE DOCUMENTOS
create table tipos_doc(
	id_tipo_doc int not null auto_increment primary key,
	tipo varchar (60),
	activo int default 1
);
  
create table unidades_medida (
	id_unidad_md int not null auto_increment primary key,
	unidad_medida varchar(50),
	clave varchar(15),
	activo int default 1
);

-- ESTRUCTURA TABLA ESTADOS PROYECTOS
create table estados_proyectos (
	id_estadoproyectos int not null auto_increment primary key,
	estado varchar(30),
	activo int default 1
);

-- ESTRUCTURA TABLA AGENCIAS ADUANALES
create table agencias_aduanales(
	id_agencia int not null auto_increment primary key,
	id_usuario int not null,
	agencia varchar(30),
	agente varchar(60),
	email varchar(60),
	id_lada int,
	telefono varchar(30),
	honorarios decimal(24,2),
	revalidacion decimal(24,2),
	complementarios decimal(24,2),
	previo decimal(24,2),
	maniobras_puerto decimal(24,2),
	desconsolidacion decimal(24,2),
	revision_rojo int,
	num_patente int,
	activo int default 1,
	foreign key (id_usuario) references usuarios (id_usuario),
);

-- ESTRUCTURA TABLA USUARIOS
create table usuarios (
	id_usuario int not null auto_increment primary key,
	id_nivelusuario int not null,
	id_lada int,
	email varchar (60) not null unique,
	contrasena varchar(60) not null,
	nombre varchar(60) not null,
	telefono VARCHAR(40),
	img_path varchar(60),
	activo int default 1,
	tyc int default 1,
	foreign key (id_nivelusuario) references niveles_usuarios (id_nivelusuario),
	foreign key (id_lada) references ladas (id_lada)
);


-- ESTRUCTURA TABLA PROYECTO
create table proyecto (
	id_proyecto int not null auto_increment primary key,
	a_registro int,
	folio int,
	id_cliente int,
	id_asesor int,
	id_estadoproyectos int default 1,
	Nombre_proyecto varchar(30),
	num_bl varchar(30) DEFAULT NULL,
	etd date DEFAULT NULL,
	eta date DEFAULT NULL,
	fracc_arancelaria varchar(100) DEFAULT NULL,
	restricciones varchar(100) DEFAULT NULL,
	buque varchar(50),
	no_viaje int,
	comentarios LONGTEXT,
	tipo_envio varchar(30),
	destino LONGTEXT,
	oemservice_path Longtext,
	fecha_creacion date,
	activo int default 1,
	foreign key (id_asesor) references usuarios (id_usuario),
	foreign key (id_cliente) references usuarios (id_usuario),
	foreign key (id_estadoproyectos) references estados_proyectos (id_estadoproyectos)
);

-- ESTRUCTURA TABLA PROVEEDORES ASESORES
create table proveedores(
	id_proveedor int not null auto_increment primary key,
	id_usuario int not null,
	proveedor varchar (150),
	direccion varchar (150),
    id_lada int,
	telefono varchar(30),
	contacto varchar(100),
	email varchar(150),
	wechat varchar(40),
	website varchar(150),
	activo int default 1,
	foreign key (id_usuario) references usuarios (id_usuario),
);

-- ESTRUCTURA TABLA PROVEEDORES CLIENTES
create table proveedores_clientes(
	id_proveedor_c int not null auto_increment primary key,
	id_cliente int,
	id_proyecto int,
	proveedor varchar(60),
	email varchar(60),
	contacto varchar(60),
    id_lada int,
	telefono varchar(30),
	direccion longtext,
	invoice_path longtext,
	activo int default 1,
	foreign key(id_cliente) references usuarios (id_usuario),
	foreign key (id_proyecto) references proyecto (id_proyecto)
);

-- -----------------------------------------------------
  -- DINAMICAS
-- -----------------------------------------------------

-- ESTRUCTURA TABLA NOTIFICACIONES
create table notificaciones (
	id_notificacion int not null auto_increment primary key,
	id_get int,
	mensaje varchar(100),
	fecha date,
	status int default 1,
	activo int default 1,
	foreign key (id_get) references usuarios (id_usuario)
); -- status 1 enviado 0 leido activo 1 visible 0 no visible

-- ESTRUCTURA TABLA PRODUCTOS ASESORES
create table productos(
	id_producto int not null auto_increment primary key,
	id_proveedor int not null,
	id_usuario int not null,
	producto varchar (60),
	fracc_arancelaria varchar(100) DEFAULT NULL,
	activo int default 1,
	foreign key (id_proveedor) references proveedores (id_proveedor),
	foreign key (id_usuario) references usuarios (id_usuario),
);

-- ESTRUCTURA TABLA PRODUCTOS CLIENTES CON PROVEESORES
create table productos_clientes(
	id_producto_c int not null auto_increment primary key,
	id_cliente int,
	id_proveedor_c int,
	id_proyecto int,
	producto_proveedor_c varchar(30),
	cantidad_proveedor_c int,
	id_unidad_md int,
	especificaciones_prod_c LONGTEXT,
	img_path longtext,
    color_oem varchar(40),
	activo int default 1,
	foreign key (id_cliente) references usuarios (id_usuario),
	foreign key (id_unidad_md) references unidades_medida (id_unidad_md),
	foreign key (id_proyecto) references proyecto (id_proyecto),
	foreign key (id_proveedor_c) references proveedores_clientes (id_proveedor_c)
);

-- ESTRUCTURA TABLA PUERTOS
create table puertos(
	id_puerto int not null auto_increment primary key,
	id_agencia int not null,
	puerto varchar(30),
	clave varchar(25),
	acivo int default 1,
	foreign key (id_agencia) references agencias_aduanales (id_agencia)
); 

create table transporte(
	id_transporte int not null auto_increment primary key,
	id_agencia int not null,
	transporte varchar(30),
	clave varchar(25),
	activo int default 1,
	foreign key (id_agencia) references agencias_aduanales (id_agencia)
);

-- Estructura tabla coordenadas
create table coordenadas(
	id_coord int not null auto_increment primary key,
	id_proyecto int,
	direccion longtext,
	lat float(10,6),
	lng float(10,6),
	activo int default 0,
	foreign key (id_proyecto) references proyecto (id_proyecto)
);

-- ESTRUCTURA TABLA COTIZACIONES PENDIENTE
create table cotizaciones(
	id_cotizacion int not null auto_increment primary key,
	id_agencia int,
	id_proyecto int,
	id_puertoSalida int, 
	id_puertoLlegada int,
	folio int,
	nombre_cot varchar(50),
	tiempo_entrega varchar(50),
	valor_mercancia decimal(24,2),
	flete_internacional decimal(24,2),
	flete_nacional decimal(24,2),
	arancel decimal(24,2),
	arancel_porc int,
	honorarios decimal(24,2),
	dta decimal(24,2),
	otros decimal(24,2),
	iva decimal(24,2),
	suma decimal(24,2),
	dolar decimal(24,2) default 10.00,
	honorarios_c decimal(24,2) default 0,
	revalicacion_c decimal(24,2) default 0,
	complementarios_c decimal(24,2) default 0,
	previo_c decimal(24,2) default 0,
	maniobras_c decimal(24,2) default 0,
	desconsolidacion_c decimal(24,2) default 0,
	activo int default 1,
	foreign key (id_agencia) references agencias_aduanales(id_agencia),
	foreign key (id_proyecto) references proyecto (id_proyecto),
	foreign key (id_puertoSalida) references puertos(id_puerto),
	foreign key (id_puertoLlegada) references transporte(id_transporte)
); 
-- Estatus
-- 0 eliminada 1 Activa 2 Aprobada_Admins 3 aceptada 4 Rechazada 5 Recotizar_cliente 6 recotizar_admin
-- 0 eliminada 1 Activa 2 Aprobada_Admins 3 aceptada 4 Recotizar_cliente 5 recotizar_admin (Nueva, actual)

create table status_cotizaciones(
	id_status_cot int not null auto_increment primary key,
	val int,
	status varchar(30),
	activo int default 1
);

create table producto_cotizacion(
	id_producto_cot int not null auto_increment primary key,
	id_cotizacion int not null,
	id_proveedor int not null,
	id_unidad_md int,
	producto varchar (60),
	cantidad int, 
	precio decimal(24,2),
	total decimal(24,2),
	especificaciones varchar(500),
	activo int default 1,
	foreign key (id_cotizacion) references cotizaciones (id_cotizacion),
	foreign key (id_proveedor) references proveedores (id_proveedor),
	foreign key (id_unidad_md) references unidades_medida (id_unidad_md)
);

create table media_productos_cot(
    id_media_prod_cot int not null auto_increment primary key,
    id_producto_cot int not null,
    path_prod_cot longtext,
    activo int default 1,
    foreign key (id_producto_cot) references producto_cotizacion (id_producto_cot)
);

-- Estructura para tabla de tareas de admin y asesor
create table task_dashboard(
	id_task_dash int not null auto_increment primary key,
	id_usuario int,
	task_dash varchar(100),
    fecha_limite date,
    fecha_cambio date,
    estatus int default 0,
    correo int default 0,
	activo int default 1
);

create table tasks (
    id_task int not null auto_increment primary key,
    task varchar(100),
    detalle LONGTEXT,
    activo int default 1
);

create table sourcing (
	id_sourcing int not null auto_increment primary key,
	id_proyecto int,
	id_task int,
	estatus int default 0,
	fecha_cambio date,
	comentario longtext,
	activo int default 1,
	foreign key (id_task) references tasks (id_task)
);

create table quoted (
	id_quoted int not null auto_increment primary key,
	id_proyecto int,
	id_task int,
	estatus int default 0,
	fecha_cambio date,
	comentario longtext,
	activo int default 1,
	foreign key (id_task) references tasks (id_task)
);

create table production (
	id_production int not null auto_increment primary key,
	id_proyecto int,
	id_task int,
	estatus int default 0,
	fecha_cambio date,
	comentario longtext,
	activo int default 1,
	foreign key (id_task) references tasks (id_task)
);

create table freight (
	id_freight int not null auto_increment primary key,
	id_proyecto int,
	id_task int,
	estatus int default 0,
	fecha_cambio date,
	comentario longtext,
	activo int default 1,
	foreign key (id_task) references tasks (id_task)
);

create table customs (
	id_customs int not null auto_increment primary key,
	id_proyecto int,
	id_task int,
	estatus int default 0,
	fecha_cambio date,
	comentario longtext,
	activo int default 1,
	foreign key (id_task) references tasks (id_task)
);

create table done (
	id_done int not null auto_increment primary key,
	id_proyecto int,
	id_task int,
	estatus int default 0,
	fecha_cambio date,
	comentario longtext,
	activo int default 1,
	foreign key (id_task) references tasks (id_task)
);


-- ESTRUCTURA TABLA DOCUMENTOS
create table documentos (
	id_documento int not null auto_increment primary key,
	id_tipo_doc int,
	id_proyecto int,
	nombre_documento varchar (20),
	archivo_path varchar(60),
	activo int default 1,
	foreign key (id_tipo_doc) references tipos_doc (id_tipo_doc),
	foreign key (id_proyecto) references proyecto (id_proyecto)
);