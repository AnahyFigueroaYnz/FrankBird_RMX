DROP DATABASE IF EXISTS rmx;
CREATE DATABASE IF NOT EXISTS rmx;
USE rmx;
-- CATALOGO TABLA DE LADAS
CREATE TABLE ladas (
	id_lada INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	lada VARCHAR(10),
	codigo VARCHAR(7),
	fecha_creacion DATE,
	activo INT DEFAULT 1
);
-- CATALOGO TABLA ESTADOS PROYECTOS
CREATE TABLE estatus (
	id_estatus INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	estatus VARCHAR(30),
	fecha_creacion DATE,
	activo INT DEFAULT 1
);
-- CATALOGO TABLA TIPO DE CAMBIO
CREATE TABLE tpo_moneda (
	id_moneda INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	clave VARCHAR(5),
	moneda VARCHAR(20),
	valor DECIMAL(24,3),
	fecha_creacion DATE,
	activo INT DEFAULT 1
);
-- CATALOGO TABLA ESTATUS DEL COTIZADOR
CREATE TABLE cot_estatus (
	id_estatus INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	val_estatus INT,
	estatus VARCHAR(30),
	fecha_creacion DATE,
	activo INT DEFAULT 1
);
-- CATALOGO TABLA UNIDADES DE MEDIDA
CREATE TABLE tpo_medidas (
	id_medida INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	medida VARCHAR(50),
	clave VARCHAR(15),
	fecha_creacion DATE,
	activo INT DEFAULT 1
);
-- CATALOGO TIPO AGENCIAS ADUANALES
CREATE TABLE tpo_agencias (
	id_tpo_agencia INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	tipo VARCHAR(60),
	fecha_creacion DATE,
	activo INT DEFAULT 1
);
-- CATALOGO TIPOS DE TAREAS DEL CHECKLIST
CREATE TABLE tpo_checklist (
    id_tpo_chklst INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    tpo_chklst VARCHAR(35),
	fecha_creacion DATE,
    activo INT DEFAULT 1
);
-- CATALOGO TABLA TIPOS DE DOCUMENTOS
CREATE TABLE tpo_documentos (
	id_docuemtno INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	tpo_doc VARCHAR (60),
	fecha_creacion DATE,
	activo INT DEFAULT 1
);
-- CATALOGO TAREAS PARA ESTRUCTURAR EL CHECKLIST
CREATE TABLE task_checklist (
    id_task_checklist INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    id_tpo_chklst INT,
    task_checklist VARCHAR(80),
    especificaciones LONGTEXT,
	fecha_creacion DATE,
    activo INT DEFAULT 1
);
-- TABLA USUARIOS
CREATE TABLE usuarios (
	id_usuario INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	id_lada INT,
	nombre VARCHAR(60) NOT NULL,
	contrasena VARCHAR(60) NOT NULL,
	email VARCHAR (60) NOT NULL UNIQUE,
	telefono VARCHAR(40),
	img_path VARCHAR(60) UNIQUE,
	fecha_creacion DATE,
	activo INT DEFAULT 1
);
-- TABLA TAREAS DEL DASHBOARD
CREATE TABLE tasks (
	id_tasks INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	id_usuario INT,
	task VARCHAR(100),
    fecha_limite DATE,
    fecha_cambio DATE,
    estatus INT DEFAULT 0,
    email INT DEFAULT 0,
	fecha_creacion DATE,
	activo INT DEFAULT 1
);
-- TABLA PROYECTO
CREATE TABLE proyecto (
	id_proyecto INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	folio INT,
	registro INT,
	no_viaje INT,
	id_usuario INT,
	id_estatus INT,
	destino LONGTEXT,
	buque VARCHAR(50),
	nombre VARCHAR(30),
	comentarios LONGTEXT,
	oem_services LONGTEXT,
	tpo_envio VARCHAR(30),
	numero_bl VARCHAR(30),
	eta DATE,
	etd DATE,
	fracc_arancel VARCHAR(100) DEFAULT NULL,
	restricciones VARCHAR(100) DEFAULT NULL,
	fecha_creacion DATE,
	activo INT DEFAULT 1
);
-- TABLA PROVEEDORES ASESORES
CREATE TABLE proveedores (
	id_proveedor INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    id_lada INT,
	id_usuario INT,
	id_proyecto INT,
	proveedor LONGTEXT,
	email VARCHAR(150),
	wechat VARCHAR(40),
	direccion LONGTEXT,
	ubicacion LONGTEXT,
	telefono VARCHAR(30),
	contacto VARCHAR(150),
	web_site VARCHAR(150),
	factura_path LONGTEXT,
	no_factura varchar(50),
	fecha_creacion DATE,
	activo INT DEFAULT 1
);
-- TABLA PRODUCTOS ASESORES
CREATE TABLE productos (
	id_producto INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	id_usuario INT,
	id_proyecto INT,
	id_unidad_md INT,
	id_proveedor INT NOT NULL,
	producto VARCHAR (60),
	cantidad INT,
	img_logotipo LONGTEXT,
    rpg_logotipo LONGTEXT,
	especificaciones LONGTEXT,
	fracc_arancel VARCHAR(100),
	fecha_creacion DATE,
	activo INT DEFAULT 1
);
-- TABLA AGENCIAS ADUANALES
CREATE TABLE agencias (
	id_agencia INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	id_lada INT,
    id_usuario INT,
    id_tpo_agencia INT,
	patente INT,
	revision INT,
	agencia VARCHAR(30),
	agente VARCHAR(60),
	email VARCHAR(60),
	telefono VARCHAR(30),
	previo DECIMAL(24,2),
	honorarios DECIMAL(24,2),
	revalidacion DECIMAL(24,2),
	complementarios DECIMAL(24,2),
	maniobras_puerto DECIMAL(24,2),
	desconsolidacion DECIMAL(24,2),
	fecha_creacion DATE,
	activo INT DEFAULT 1
);
-- TABLA PUNTO ORIGEN DE PARTIDA
CREATE TABLE pto_origen (
	id_origen INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	id_proveedor INT NOT NULL,
	siglas VARCHAR(25),
	origen VARCHAR(50),
	fecha_creacion DATE,
	acivo INT DEFAULT 1
);
-- TABLA PUNTO DESTINO FINAL
CREATE TABLE pto_destino (
	id_destino INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	id_agencia INT NOT NULL,
	siglas VARCHAR(25),
	destino VARCHAR(50),
	ubicacion VARCHAR(50),
	ub_siglas VARCHAR(50),
	fecha_creacion DATE,
	activo INT DEFAULT 1
);
-- TABLA COORDENADAS PROVEEDOR
CREATE TABLE coordenadas (
	id_coord INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	id_proyecto INT,
	lat float(10,6),
	lng float(10,6),
	direccion LONGTEXT,
	fecha_creacion DATE,
	activo INT DEFAULT 0
);
-- TABLA COTIZADOR - CALCULO DE COSTOS
CREATE TABLE cotizaciones (
	id_cotizacion INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	id_origen INT,
	id_estatus INT,
	id_destino INT,
	id_proyecto INT,
	fol_registro INT,
	porc_arancel INT,
	nombre VARCHAR(50),
	iva DECIMAL(24,2),
	dta DECIMAL(24,2),
	total DECIMAL(24,2),
	otros DECIMAL(24,2),
	arancel DECIMAL(24,2),
	mercancia DECIMAL(24,2),
	flete_nal DECIMAL(24,2),
	flete_intl DECIMAL(24,2),
	tiempo_entrega VARCHAR(50),
	dolar DECIMAL(24,2) DEFAULT 0,
	fecha_creacion DATE,
	activo INT DEFAULT 1
);
-- TABLA AGENCIA ADUANAL DEL COTIZADOR
CREATE TABLE cot_agencia (
	id_agencia INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	id_cotizacion INT,
	previo_c DECIMAL(24,2) DEFAULT 0,
	maniobras_c DECIMAL(24,2) DEFAULT 0,
	honorarios_c DECIMAL(24,2) DEFAULT 0,
	revalicacion_c DECIMAL(24,2) DEFAULT 0,
	complementarios_c DECIMAL(24,2) DEFAULT 0,
	desconsolidacion_c DECIMAL(24,2) DEFAULT 0,
	fecha_creacion DATE,
	activo INT DEFAULT 1
);
-- TABLA PRODUCTOS DEL COTIZADOR
CREATE TABLE cot_producto (
	id_producto INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	id_medida INT,
	id_proveedor INT,
	id_cotizacion INT,
	cantidad INT,
	nombre VARCHAR (60),
	precio DECIMAL(24,2),
	total DECIMAL(24,2),
	especificaciones VARCHAR(500),
	fecha_creacion DATE,
	activo INT DEFAULT 1
);
-- TABLA IMAGENES DE LOS PRODUCTOS DE LA COTIZACIÓN
CREATE TABLE cot_prod_media (
    id_prod_media INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    id_producto INT NOT NULL,
    img_path LONGTEXT,
	fecha_creacion DATE,
    activo INT DEFAULT 1
);
-- TABLA DEL CHECKLIST POR PROYECTO
CREATE TABLE checklist (
	id_checklist INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT,
	id_proyecto INT,
	id_chklst_tasks INT,
	comentario LONGTEXT,
	estatus INT DEFAULT 0,
	fecha_cambio DATE,
	fecha_creacion DATE,
	activo INT DEFAULT 1
);
-- TABLA DOCUMENTOS
CREATE TABLE documentos (
	id_documento INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	id_tpo_doc INT,
	id_proyecto INT,
	doc_nombre VARCHAR (20),
	archivo_path VARCHAR(60),
	fecha_creacion DATE,
	activo INT DEFAULT 1
);