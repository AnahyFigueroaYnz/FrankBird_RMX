use rmx;
-- Estructura para tabla bitacora
create table bitacora (
	id_bit int not null auto_increment primary key,
	usuario varchar(50),
	id_usuario int,
	id_tabla int,
	tabla varchar (50),
	tipo_accion varchar(50),
	query_usado LONGTEXT,
	fecha TIMESTAMP default now()
);

-- triggers para proyecto
	drop trigger if exists tr_insert_proy;
	delimiter $$
		create trigger tr_insert_proy after insert on proyecto
		for each row
		begin
			if new.comentarios is null then set @new_comentario= "NULL"; else set @new_comentario = new.comentarios; end if;
			if new.oemservice_path is null then set @new_oemservice= "NULL"; else set @new_oemservice = new.oemservice_path; end if;
			insert into bitacora (usuario, id_tabla, tabla, tipo_accion, query_usado, fecha) values(
			current_user(), new.id_proyecto, 'proyecto', 'Insert', 
			concat('insert into proyecto (id_proyecto, id_cliente, a_registro, folio, comentarios, tipo_envio, destino, oemservice_path, id_estadoproyectos, fecha_creacion) 
					values (',new.id_proyecto,', ',new.id_cliente,', ', new.a_registro,', ',new.folio,', "',@new_comentario,'", "',new.tipo_envio,'", "',new.destino,'", "',@new_oemservice,'", ', new.id_estadoproyectos,', "', new.fecha_creacion,'");'),
			now());
		end 
	$$
	drop trigger if exists tr_update_proy;
	delimiter $$
		create trigger tr_update_proy after update on proyecto
		for each row
		begin
			if old.oemservice_path is null then set @old_oemservice = "NULL"; else set @old_oemservice= old.oemservice_path; end if;
			if new.oemservice_path <> @old_oemservice then 
				insert into bitacora (usuario, id_tabla, tabla, tipo_accion, query_usado, fecha) values(
				current_user(), new.id_proyecto, 'proyecto', 'Update', 
				concat('Informacion anterior: old_oem:  ', @old_oemservice, ' new_oemservice: ', new.oemservice_path),
				now());
			end if;
			if new.oemservice_path = old.oemservice_path then 
					if old.id_asesor is null then set @old_id_asesor = "NULL"; else set @old_id_asesor = old.id_asesor; end if;
						if new.id_asesor is null then set @new_id_asesor = "NULL"; else set @new_id_asesor = new.id_asesor; end if;
					if old.Nombre_proyecto is null then set @old_Nombre_proyecto = "NULL"; else set @old_Nombre_proyecto = old.Nombre_proyecto; end if;
						if new.Nombre_proyecto is null then set @new_Nombre_proyecto = "NULL"; else set @new_Nombre_proyecto = new.Nombre_proyecto; end if;
					if old.num_bl is null then set @old_num_bl = "NULL"; else set @old_num_bl = old.num_bl; end if;
						if new.num_bl is null then set @new_num_bl = "NULL"; else set @new_num_bl = new.num_bl; end if;
					if old.etd is null then set @old_etd = "NULL"; else set @old_etd = old.etd; end if;
						if new.etd is null then set @new_etd = "NULL"; else set @new_etd = new.etd; end if;
					if old.eta is null then set @old_eta = "NULL"; else set @old_eta = old.eta; end if;
						if new.eta is null then set @new_eta = "NULL"; else set @new_eta = new.eta; end if;
					if old.fracc_arancelaria is null then set @old_fracc_arancelaria = "NULL"; else set @old_fracc_arancelaria = old.fracc_arancelaria; end if;
						if new.fracc_arancelaria is null then set @new_fracc_arancelaria = "NULL"; else set @new_fracc_arancelaria = new.fracc_arancelaria; end if;
					if old.restricciones is null then set @old_restricciones = "NULL"; else set @old_restricciones = old.restricciones; end if;
						if new.restricciones is null then set @new_restricciones = "NULL"; else set @new_restricciones = new.restricciones; end if;
					if old.buque is null then set @old_buque = "NULL"; else set @old_buque = old.buque; end if;
						if new.buque is null then set @new_buque = "NULL"; else set @new_buque = new.buque; end if;
					if old.no_viaje is null then set @old_no_viaje = "NULL"; else set @old_no_viaje = old.no_viaje; end if;
						if new.no_viaje is null then set @new_no_viaje = "NULL"; else set @new_no_viaje = new.no_viaje; end if;
				insert into bitacora (usuario, id_tabla, tabla, tipo_accion, query_usado, fecha) values(
				current_user(), new.id_proyecto, 'proyecto', 'Update', 
				concat('Informacion anterior: activo: ', old.activo,' id_asesor: ', @old_id_asesor, ', id_estadoproyectos: ', old.id_estadoproyectos, ', Nombre_proyecto:  "', @old_Nombre_proyecto, '", num_bl: ', @old_num_bl, 
						', etd: ', @old_etd, ', eta: ', @old_eta, ', fracc_arancelaria: ', @old_fracc_arancelaria, ', restricciones: ', @old_restricciones,', buque: ', @old_buque, ', no_viaje: ', @old_no_viaje,
		                '; Informacion nueva: activo: ', new.activo,' id_asesor: ', @new_id_asesor, ', id_estadoproyectos: ', new.id_estadoproyectos, ', Nombre_proyecto:  "', @new_Nombre_proyecto, '", num_bl: ', @new_num_bl, 
						', etd: ', @new_etd, ', eta: ', @new_eta,', fracc_arancelaria: ', @new_fracc_arancelaria, ', restricciones: ', @new_restricciones,', buque: ', @new_buque, ', no_viaje: ', @new_no_viaje
		                ),
				now());
			end if;
		end 
	$$

-- Triggesr para usuarios
	drop trigger if exists tr_insert_usuarios;
	delimiter $$
		create trigger tr_insert_usuarios after insert on usuarios
		for each row
		begin
				if new.id_lada is null then set @new_id_lada = "NULL"; else set @new_id_lada = new.id_lada; end if;
				if new.telefono is null then set @new_telefono = "NULL"; else set @new_telefono = new.telefono; end if;
			insert into bitacora (usuario, id_tabla, tabla, tipo_accion, query_usado, fecha) values(
			current_user(), new.id_usuario, 'usuarios', 'Insert', 
			concat('insert into usuarios (id_usuario, id_nivelusuario, id_lada, email, nombre,	telefono) values(', 
				new.id_usuario,', ', new.id_nivelusuario,', ', @new_id_lada,', "', new.email,'", "', new.nombre,'", "', @new_telefono,'");'),
			now());
		end 
	$$
	drop trigger if exists tr_update_usuarios;
	delimiter $$
		create trigger tr_update_usuarios after update on usuarios
		for each row
		begin
				if old.id_lada is null then set @old_id_lada = "NULL"; else set @old_id_lada = old.id_lada; end if;
				if old.telefono is null then set @old_telefono = "NULL"; else set @old_telefono = old.telefono; end if;
                if new.id_lada is null then set @new_id_lada = "NULL"; else set @new_id_lada = new.id_lada; end if;
				if new.telefono is null then set @new_telefono = "NULL"; else set @new_telefono = new.telefono; end if;
			insert into bitacora (usuario, id_tabla, tabla, tipo_accion, query_usado, fecha) values(current_user(), old.id_usuario, 'usuarios', 'Update', 
			concat('Informacion anterior: activo ', old.activo,' id_nivel: ', old.id_nivelusuario,', id_lada: ', @old_id_lada,', email: ', old.email,', nombre: ', old.nombre,', telefono: ', @old_telefono,
					', Informacion nueva: activo ',new.activo,' id_nivel: ', new.id_nivelusuario,', id_lada: ', @new_id_lada,', email: ', new.email,', nombre: ', new.nombre,', telefono: ', @new_telefono),
			now());
		end 
	$$

-- Triggers para agencias aduanales
	drop trigger if exists tr_insert_aa;
	delimiter $$
		create trigger tr_insert_aa after insert on agencias_aduanales
		for each row
		begin
				if new.id_lada is null then set @new_id_lada = "NULL"; else set @new_id_lada = new.id_lada; end if;
				if new.telefono is null then set @new_telefono = "NULL"; else set @new_telefono = new.telefono; end if;
				if new.agente is null then set @new_agente = "NULL"; else set @new_agente = new.agente; end if;
				if new.email is null then set @new_email = "NULL"; else set @new_email = new.email; end if;
				if new.honorarios is null then set @new_honorarios = "0"; else set @new_honorarios = new.honorarios; end if;
				if new.revalidacion is null then set @new_revalidacion = "0"; else set @new_revalidacion = new.revalidacion; end if;
				if new.complementarios is null then set @new_complementarios = "0"; else set @new_complementarios = new.complementarios; end if;
				if new.previo is null then set @new_previo = "0"; else set @new_previo = new.previo; end if;
				if new.maniobras_puerto is null then set @new_maniobras_puerto = "0"; else set @new_maniobras_puerto = new.maniobras_puerto; end if;
				if new.desconsolidacion is null then set @new_desconsolidacion = "0"; else set @new_desconsolidacion = new.desconsolidacion; end if;

			insert into bitacora (usuario, id_tabla, tabla, tipo_accion, query_usado, fecha) values(
			current_user(), new.id_agencia, 'agencias_aduanales', 'Insert', 
			concat('insert into agencias_aduanales (id_agencia, agencia, agente, email, id_lada, telefono, honorarios, revalidacion, complementarios, previo, maniobras_puerto, desconsolidacion) values(',
	        		new.id_agencia,', "', new.agencia,'", "',@new_agente,'", "', @new_email,'", ',@new_id_lada,', "', @new_telefono,'", ', @new_honorarios, ', ', @new_revalidacion, ', ', @new_complementarios, ', ', @new_previo, ', ', @new_maniobras_puerto, ', ', @new_desconsolidacion, ')'),
			now());
		end 
	$$
	drop trigger if exists tr_update_aa;
	delimiter $$
		create trigger tr_update_aa after update on agencias_aduanales
		for each row
		begin	
				if old.id_lada is null then set @old_id_lada = "NULL"; else set @old_id_lada = old.id_lada; end if;
                if old.id_lada = "" then set @old_id_lada = "NULL"; else set @old_id_lada = old.id_lada; end if;
					if new.id_lada is null then set @new_id_lada = "NULL"; else set @new_id_lada = new.id_lada; end if;
				if old.telefono is null then set @old_telefono = "NULL"; else set @old_telefono = old.telefono; end if;
                if old.telefono = "" then set @old_telefono = "NULL"; else set @old_telefono = old.telefono; end if;
					if new.telefono is null then set @new_telefono = "NULL"; else set @new_telefono = new.telefono; end if;
				if old.agente is null then set @old_agente = "NULL"; else set @old_agente = old.agente; end if;
                if old.agente = "" then set @old_agente = "NULL"; else set @old_agente = old.agente; end if;
					if new.agente is null then set @new_agente = "NULL"; else set @new_agente = new.agente; end if;
				if old.email is null then set @old_email = "NULL"; else set @old_email = old.email; end if;
                if old.email = "" then set @old_email = "NULL"; else set @old_email = old.email; end if;
					if new.email is null then set @new_email = "NULL"; else set @new_email = new.email; end if;
				if old.honorarios is null then set @old_honorarios = "0"; else set @old_honorarios = old.honorarios; end if;
					if new.honorarios is null then set @new_honorarios = "0"; else set @new_honorarios = new.honorarios; end if;
				if old.revalidacion is null then set @old_revalidacion = "0"; else set @old_revalidacion = old.revalidacion; end if;
					if new.revalidacion is null then set @new_revalidacion = "0"; else set @new_revalidacion = new.revalidacion; end if;
				if old.complementarios is null then set @old_complementarios = "0"; else set @old_complementarios = old.complementarios; end if;
					if new.complementarios is null then set @new_complementarios = "0"; else set @new_complementarios = new.complementarios; end if;
				if old.previo is null then set @old_previo = "0"; else set @old_previo = old.previo; end if;
					if new.previo is null then set @new_previo = "0"; else set @new_previo = new.previo; end if;
				if old.maniobras_puerto is null then set @old_maniobras_puerto = "0"; else set @old_maniobras_puerto = old.maniobras_puerto; end if;
					if new.maniobras_puerto is null then set @new_maniobras_puerto = "0"; else set @new_maniobras_puerto = new.maniobras_puerto; end if;
				if old.desconsolidacion is null then set @old_desconsolidacion = "0"; else set @old_desconsolidacion = old.desconsolidacion; end if;
					if new.desconsolidacion is null then set @new_desconsolidacion = "0"; else set @new_desconsolidacion = new.desconsolidacion; end if;

			insert into bitacora (usuario, id_tabla, tabla, tipo_accion, query_usado, fecha) values(
	        current_user(), old.id_agencia, 'agencias_aduanales', 'Update', 
			concat('Anterior: agencia:', old.agencia,', agente:',@old_agente,', email:', @old_email,', lada:',@new_id_lada,', tel:', @old_telefono,', honorarios:', @old_honorarios, ', revalidacion:', @old_revalidacion, ', complementarios:', @old_complementarios, ', previo:', @old_previo, ', maniobras:', @old_maniobras_puerto, ', desconsolidacion:', @old_desconsolidacion, ', activo:', @old_activo,
	        	', nuevo: agencia:', new.agencia,', agente:',@new_agente,', email:', @new_email,', lada:',@new_id_lada,', tel:', @new_telefono,', honorarios:', @new_honorarios, ', revalidacion:', @new_revalidacion, ', complementarios:', @new_complementarios, ', previo:', @new_previo, ', maniobras:', @new_maniobras_puerto, ', desconsolidacion:', @new_desconsolidacion, ', activo:', @new_activo
	        ),
			now());
		end 
	$$

-- Triggers para tabla transporte
	drop trigger if exists tr_insert_transporte;
	delimiter $$
		create trigger tr_insert_transporte after insert on transporte
		for each row
		begin
			insert into bitacora (usuario, id_tabla, tabla, tipo_accion, query_usado, fecha) values(current_user(), new.id_transporte, 'transporte', 'Insert', 
				concat('insert into transporte (id_transporte, id_agencia, transporte, clave) values(', new.id_transporte,', ', new.id_agencia,', "', new.transporte,'", "', new.clave,'")'),
				now());
		end 
	$$
	drop trigger if exists tr_update_transporte;
	delimiter $$
		create trigger tr_update_transporte after update on transporte
		for each row
		begin
			insert into bitacora (usuario, id_tabla, tabla, tipo_accion, query_usado, fecha) values(
			current_user(), new.id_transporte, 'transporte', 'Update', 
			concat('Informacion anterior: transporte: "', old.transporte,'", Clave: "', old.clave,'", activo: ', old.activo,
	        ', Informacion nueva: transporte: "', new.transporte,'", Clave: "', new.clave,'", activo: ', new.activo),
			now());
		end 
	$$

-- Triggers para tabla proveedores
	drop trigger if exists tr_insert_proveedores;
	delimiter $$
		create trigger tr_insert_proveedores after insert on proveedores
		for each row
		begin
				if new.id_lada is null then set @new_id_lada = "NULL"; else set @new_id_lada = new.id_lada; end if;
				if new.telefono is null then set @new_telefono = "NULL"; else set @new_telefono = new.telefono; end if;
				if new.direccion is null then set @new_direccion = "NULL"; else set @new_direccion = new.direccion; end if;
				if new.contacto is null then set @new_contacto = "NULL"; else set @new_contacto = new.contacto; end if;
				if new.email is null then set @new_email = "NULL"; else set @new_email = new.email; end if;
				if new.wechat is null then set @new_wechat = "NULL"; else set @new_wechat = new.wechat; end if;
				if new.website is null then set @new_website = "NULL"; else set @new_website = new.website; end if;
			
			insert into bitacora (usuario, id_tabla, tabla, tipo_accion, query_usado, fecha) values(current_user(), new.id_proveedor, 'proveedores', 'Insert', 
				concat('insert into proveedores (id_proveedor, proveedor, direccion, id_lada, telefono, contacto, email, wechat, website) values (',
					new.id_proveedor,', "', new.proveedor,'", "', @new_direccion,'", ',
					@new_id_lada,', "', @new_telefono,'", "', @new_contacto,'", "', 
					@new_email,'", ', @new_wechat,', "', @new_website,'")'),
				now());
		end 
	$$
	drop trigger if exists tr_update_proveedores;
	delimiter $$
		create trigger tr_update_proveedores after update on proveedores
		for each row
		begin
				if old.id_lada is null then set @old_id_lada = "NULL"; else set @old_id_lada = old.id_lada; end if;
					if new.id_lada is null then set @new_id_lada = "NULL"; else set @new_id_lada = new.id_lada; end if;
				if old.telefono is null then set @old_telefono = "NULL"; else set @old_telefono = old.telefono; end if;
					if new.telefono is null then set @new_telefono = "NULL"; else set @new_telefono = new.telefono; end if;
				if old.direccion is null then set @old_direccion = "NULL"; else set @old_direccion = old.direccion; end if;
					if new.direccion is null then set @new_direccion = "NULL"; else set @new_direccion = new.direccion; end if;
				if old.contacto is null then set @old_contacto = "NULL"; else set @old_contacto = old.contacto; end if;
					if new.contacto is null then set @new_contacto = "NULL"; else set @new_contacto = new.contacto; end if;
				if old.email is null then set @old_email = "NULL"; else set @old_email = old.email; end if;
					if new.email is null then set @new_email = "NULL"; else set @new_email = new.email; end if;
				if old.wechat is null then set @old_wechat = "NULL"; else set @old_wechat = old.wechat; end if;
					if new.wechat is null then set @new_wechat = "NULL"; else set @new_wechat = new.wechat; end if;
				if old.website is null then set @old_website = "NULL"; else set @old_website = old.website; end if;
					if new.website is null then set @new_website = "NULL"; else set @new_website = new.website; end if;
				if old.activo is null then set @old_activo = "NULL"; else set @old_activo = old.activo; end if;
					if new.activo is null then set @new_activo = "NULL"; else set @new_activo = new.activo; end if;

			insert into bitacora (usuario, id_tabla, tabla, tipo_accion, query_usado, fecha) values(current_user(), new.id_proveedor, 'proveedores', 'Update', 
				concat('Inf anterior: proveedor:',
					old.proveedor,', dir:', @old_direccion,', lada:',
					@old_id_lada,', tel:', @old_telefono,', contacto:', @old_contacto,', email:', 
					@old_email,', wechat:', @old_wechat,', web:', @old_website, ', activo:',@old_activo,
					'Inf nueva: proveedor:',
					new.proveedor,', dir:', @new_direccion,', lada:',@new_id_lada,
					', tel:', @new_telefono,', contacto:', @new_contacto,', email:', 
					@new_email,', wechat:', @new_wechat,', web:', @new_website, 
					', activo:',@new_activo),
				now());
		end 
	$$

-- Triggers para tabla productos
	drop trigger if exists tr_insert_productos;
	delimiter $$
		create trigger tr_insert_productos after insert on productos
		for each row
		begin
			insert into bitacora (usuario, id_tabla, tabla, tipo_accion, query_usado, fecha) values(current_user(), new.id_producto, 'productos', 'Insert', 
				concat('insert into productos (id_producto, id_proveedor, producto) values(', new.id_producto,', ', new.id_proveedor,', "', new.producto,'")'),
				now());
		end 
	$$

	drop trigger if exists tr_update_productos;
	delimiter $$	
		create trigger tr_update_productos after update on productos
		for each row
		begin
			insert into bitacora (usuario, id_tabla, tabla, tipo_accion, query_usado, fecha) values(
			current_user(), new.id_producto, 'productos', 'Update', 
			concat('Informacion anterior: producto: "', old.producto,'", activo: ', old.activo,
	        ', Informacion nueva: producto: "', new.producto,'", activo: ', new.activo),
			now());
		end 
	$$

-- Trigger para tabla relacion_agente_aduanal
	drop trigger if exists tr_insert_rel_aa;
	delimiter $$
		create trigger tr_insert_rel_aa after insert on relacion_agente_aduanal
		for each row
		begin
			insert into bitacora (usuario, id_tabla, tabla, tipo_accion, query_usado, fecha) values(current_user(), new.id_relacion_aa, 'relacion_agente_aduanal', 'Insert', 
				concat('insert into relacion_agente_aduanal (id_relacion_aa, id_usuario, id_agencia) values(', new.id_relacion_aa,', ', new.id_usuario,', "', new.id_agencia,'")'),
				now());
		end 
	$$

-- Trigger para tabla proveedores_clientes
	drop trigger if exists tr_insert_proveedores_clientes;
	delimiter $$
		create trigger tr_insert_proveedores_clientes after insert on proveedores_clientes
		for each row
		begin
				if new.direccion is null then set @new_direccion = "NULL"; else set @new_direccion = new.direccion; end if;
				if new.id_lada is null then set @new_id_lada = "NULL"; else set @new_id_lada = new.id_lada; end if;
				if new.telefono is null then set @new_telefono = "NULL"; else set @new_telefono = new.telefono; end if;

			insert into bitacora (usuario, id_usuario, id_tabla, tabla, tipo_accion, query_usado, fecha) values(
				current_user(), new.id_cliente, new.id_proveedor_c, 'proveedores_clientes', 'Insert', 
				concat('insert into proveedores_clientes (id_proveedor_c, id_cliente, id_proyecto, proveedor, email, contacto, id_lada, telefono, direccion) values(', 
						new.id_proveedor_c,', ',new.id_cliente,', ', new.id_proyecto,', "', new.proveedor,'",',new.email,'", "', new.contacto, '", ',
						@new_id_lada,', "', @new_telefono, '", "', @new_direccion,'");'),
				now());
		end 
	$$
	drop trigger if exists tr_update_proveedores_clientes;
	delimiter $$
		create trigger tr_update_proveedores_clientes after Update on proveedores_clientes
		for each row
		begin
			insert into bitacora (usuario, id_usuario, id_tabla, tabla, tipo_accion, query_usado, fecha) values(
				current_user(), old.id_cliente, new.id_proveedor_c, 'proveedores_clientes', 'Update', 
				concat('Actualizacion invoice_path:', new.invoice_path),
				now());
		end 
	$$

-- Trigger para tabla productos_clientes
	drop trigger if exists tr_insert_productos_clientes;
	delimiter $$
		create trigger tr_insert_productos_clientes after insert on productos_clientes
		for each row
		begin
			insert into bitacora (usuario, id_usuario, id_tabla, tabla, tipo_accion, query_usado, fecha) values(
				current_user(), new.id_cliente, new.id_producto_c, 'productos_clientes', 'Insert', 
				concat('insert into productos_clientes (id_producto_c, id_cliente, id_proyecto, producto_proveedor_c, id_unidad_md) values(', 
					new.id_producto_c,', ',new.id_cliente,', ', new.id_proyecto,', "', new.producto_proveedor_c,'",',new.id_unidad_md,');'),
				now());
		end 
	$$

-- Trigger para tabla productos_sp_clientes
	drop trigger if exists tr_insert_productos_sp_clientes;
	delimiter $$
		create trigger tr_insert_productos_sp_clientes after insert on productos_sp_clientes
		for each row
		begin
				if new.color_oem is null then set @new_color_oem = "NULL"; else set @new_color_oem = new.color_oem; end if;
			
			insert into bitacora (usuario, id_usuario, id_tabla, tabla, tipo_accion, query_usado, fecha) values(
				current_user(), new.id_cliente, new.id_producto_sp_c, 'productos_sp_clientes', 'Insert', 
				concat('insert into productos_sp_clientes (id_producto_sp_c, id_cliente, id_proyecto, producto_sp_c, cantidad_sp_c, id_unidad_md, especificaciones_sp_c, color_oem) values(', 
					new.id_producto_sp_c,', ',new.id_cliente,', ', new.id_proyecto,', "', new.producto_sp_c,'",',new.cantidad_sp_c,', ', new.id_unidad_md,', "', new.especificaciones_sp_c,'", "',@new_color_oem,'");'),
				now());
		end 
	$$
	drop trigger if exists tr_update_productos_sp_clientes;
	delimiter $$
		create trigger tr_update_productos_sp_clientes after update on productos_sp_clientes
		for each row
		begin
			insert into bitacora (usuario, id_usuario, id_tabla, tabla, tipo_accion, query_usado, fecha) values(
				current_user(), old.id_cliente, new.id_producto_sp_c, 'productos_sp_clientes', 'Update', 
				concat('Update img_path: ', new.img_path),
				now());
		end 
	$$

-- Trigger para tabla cotizaciones
	drop trigger if exists tr_insert_cotizaciones;
	delimiter $$
		create trigger tr_insert_cotizaciones after insert on cotizaciones
		for each row
		begin		
			insert into bitacora (usuario, id_tabla, tabla, tipo_accion, query_usado, fecha) values(
				current_user(), new.id_cotizacion, 'cotizaciones', 'Insert', 
				concat(
					'insert into cotizaciones (id_cotizacion, id_agencia, id_proyecto, id_puertoSalida, id_puertoLlegada, nombre_cot, valor_mercancia, flete_internacional, flete_nacional, arancel, honorarios, dta, otros, iva, suma, dolar, honorarios_c, revalicacion_c, complementarios_c, previo_c, maniobras_c, desconsolidacion_c) values (',
					new.id_cotizacion,', ', new.id_agencia, ', ', new.id_proyecto, ', ', new.id_puertoSalida, ', ', 
					new.id_puertoLlegada, ', "', new.nombre_cot, '", ', new.valor_mercancia, ', ', new.flete_internacional, ', ', 
					new.flete_nacional, ', ', new.arancel, ', ', new.honorarios, ', ', new.dta, ', ', 
					new.otros, ', ', new.iva, ', ', new.suma, ', ', new.dolar, ', ', new.honorarios_c, ', ', 
					new.revalicacion_c, ', ', new.complementarios_c, ', ', new.previo_c, ', ', new.maniobras_c, ', ', 
					new.desconsolidacion_c, ', '
					),
				now());
		end 
	$$
	drop trigger if exists tr_update_cotizaciones;
	delimiter $$
		create trigger tr_update_cotizaciones after Update on cotizaciones
		for each row
		begin		
			insert into bitacora (usuario, id_tabla, tabla, tipo_accion, query_usado, fecha) values(
				current_user(), new.id_cotizacion, 'cotizaciones', 'Update', 
				concat(
					'Anterior activo: ', old.activo, ', Nuevo activo: ', new.activo
					),
				now());
		end 
	$$

-- Trigger para tabla producto_cotizacion
	drop trigger if exists tr_insert_producto_cotizacion;
	delimiter $$
		create trigger tr_insert_producto_cotizacion after insert on producto_cotizacion
		for each row
		begin		
				if new.especificaciones is null then set @new_especificaciones = "NULL"; else set @new_especificaciones = new.especificaciones; end if;

			insert into bitacora (usuario, id_tabla, tabla, tipo_accion, query_usado, fecha) values(
				current_user(), new.id_producto_cot, 'producto_cotizacion', 'Insert', 
				concat('insert into producto_cotizacion (id_producto_cot, id_cotizacion, id_proveedor, id_unidad_md, producto, cantidad, precio, total, especificaciones ) values (',
					new.id_producto_cot, ', ', new.id_cotizacion, ', ', new.id_proveedor, ', ', 
					new.id_unidad_md, ', "', new.producto, '", ', new.cantidad, ', ', new.precio, ', ', 
					new.total, ', "', @new_especificaciones, '");'
				),
				now());
		end 
	$$

-- Trigger para tabla media_productos_cot
	drop trigger if exists tr_insert_media_productos_cot;
	delimiter $$
		create trigger tr_insert_media_productos_cot after insert on media_productos_cot
		for each row
		begin		
			insert into bitacora (usuario, id_tabla, tabla, tipo_accion, query_usado, fecha) values(
				current_user(), new.id_media_prod_cot, 'media_productos_cot', 'Insert', 
				concat('insert into media_productos_cot (id_media_prod_cot,id_producto_cot) values (',
					new.id_media_prod_cot, ', ', new.id_producto_cot, '");'
				),
				now());
		end 
	$$

	drop trigger if exists tr_update_media_productos_cot;
	delimiter $$
		create trigger tr_update_media_productos_cot after update on media_productos_cot
		for each row
		begin		
			insert into bitacora (usuario, id_tabla, tabla, tipo_accion, query_usado, fecha) values(
				current_user(), new.id_media_prod_cot, 'media_productos_cot', 'Update', 
				concat('path_prod_cot: ', new.path_prod_cot),
				now());
		end 
	$$

-- Trigger para tabla documentos
	drop trigger if exists tr_insert_documentos;
	delimiter $$
		create trigger tr_insert_documentos after insert on documentos
		for each row
		begin		
			insert into bitacora (usuario, id_tabla, tabla, tipo_accion, query_usado, fecha) values(
				current_user(), new.id_documento, 'documentos', 'Insert', 
				concat('insert into documentos (id_documento,id_tipo_doc, id_proyecto, nombre_documento) values (',
					new.id_documento, ', ', new.id_tipo_doc, ', ', new.id_proyecto,', "',new.nombre_documento, '");'
				),
				now());
		end 
	$$

	drop trigger if exists tr_update_documentos;
	delimiter $$
		create trigger tr_update_documentos after update on documentos
		for each row
		begin		
			insert into bitacora (usuario, id_tabla, tabla, tipo_accion, query_usado, fecha) values(
				current_user(), new.id_documento, 'documentos', 'Update', 
				concat('archivo_path: ', new.archivo_path, ', activo_anterior: ', old.activo, ', activo_nuevo: ', new.activo),
				now());
		end 
	$$

-- Triggers para tasks (6)
	-- Customs
		drop trigger if exists tr_insert_customs;
		delimiter $$
			create trigger tr_insert_customs after insert on customs
			for each row
			begin		
				insert into bitacora (usuario, id_tabla, tabla, tipo_accion, query_usado, fecha) values(
					current_user(), new.id_customs, 'customs', 'Insert', 
					concat('insert into customs (id_customs, id_proyecto, id_task, estatus, fecha_cambio) values (',
						new.id_customs, ', ', new.id_proyecto, ', ', new.id_task,', ',new.estatus,', ', new.fecha_cambio, ');'
					),
					now());
			end 
		$$

		drop trigger if exists tr_update_customs;
		delimiter $$
			create trigger tr_update_customs after update on customs
			for each row
			begin		
				insert into bitacora (usuario, id_tabla, tabla, tipo_accion, query_usado, fecha) values(
					current_user(), new.id_customs, 'customs', 'Update', 
					concat('Info anterior: estatus: ', old.estatus, ', fecha_cambio: ', old.fecha_cambio,
						', Info nueva:', new.estatus, ', fecha_cambio: ', new.fecha_cambio
						),
					now());
			end 
		$$

	-- done
		drop trigger if exists tr_insert_done;
		delimiter $$
			create trigger tr_insert_done after insert on done
			for each row
			begin		
				insert into bitacora (usuario, id_tabla, tabla, tipo_accion, query_usado, fecha) values(
					current_user(), new.id_done, 'done', 'Insert', 
					concat('insert into done (id_done, id_proyecto, id_task, estatus, fecha_cambio) values (',
						new.id_done, ', ', new.id_proyecto, ', ', new.id_task,', ',new.estatus,', ', new.fecha_cambio, ');'
					),
					now());
			end 
		$$
		drop trigger if exists tr_update_done;
		delimiter $$
			create trigger tr_update_done after update on done
			for each row
			begin		
				insert into bitacora (usuario, id_tabla, tabla, tipo_accion, query_usado, fecha) values(
					current_user(), new.id_done, 'done', 'Update', 
					concat('Info anterior: estatus: ', old.estatus, ', fecha_cambio: ', old.fecha_cambio,
						', Info nueva:', new.estatus, ', fecha_cambio: ', new.fecha_cambio
						),
					now());
			end 
		$$

	-- freight
		drop trigger if exists tr_insert_freight;
		delimiter $$
			create trigger tr_insert_freight after insert on freight
			for each row
			begin		
				insert into bitacora (usuario, id_tabla, tabla, tipo_accion, query_usado, fecha) values(
					current_user(), new.id_freight, 'freight', 'Insert', 
					concat('insert into freight (id_freight, id_proyecto, id_task, estatus, fecha_cambio) values (',
						new.id_freight, ', ', new.id_proyecto, ', ', new.id_task,', ',new.estatus,', ', new.fecha_cambio, ');'
					),
					now());
			end 
		$$
		drop trigger if exists tr_update_freight;
		delimiter $$
			create trigger tr_update_freight after update on freight
			for each row
			begin		
				insert into bitacora (usuario, id_tabla, tabla, tipo_accion, query_usado, fecha) values(
					current_user(), new.id_freight, 'freight', 'Update', 
					concat('Info anterior: estatus: ', old.estatus, ', fecha_cambio: ', old.fecha_cambio,
						', Info nueva:', new.estatus, ', fecha_cambio: ', new.fecha_cambio
						),
					now());
			end 
		$$

	-- production
		drop trigger if exists tr_insert_production;
		delimiter $$
			create trigger tr_insert_production after insert on production
			for each row
			begin		
				insert into bitacora (usuario, id_tabla, tabla, tipo_accion, query_usado, fecha) values(
					current_user(), new.id_production, 'production', 'Insert', 
					concat('insert into production (id_production, id_proyecto, id_task, estatus, fecha_cambio) values (',
						new.id_production, ', ', new.id_proyecto, ', ', new.id_task,', ',new.estatus,', ', new.fecha_cambio, ');'
					),
					now());
			end 
		$$
		drop trigger if exists tr_update_production;
		delimiter $$
			create trigger tr_update_production after update on production
			for each row
			begin		
				insert into bitacora (usuario, id_tabla, tabla, tipo_accion, query_usado, fecha) values(
					current_user(), new.id_production, 'production', 'Update', 
					concat('Info anterior: estatus: ', old.estatus, ', fecha_cambio: ', old.fecha_cambio,
						', Info nueva:', new.estatus, ', fecha_cambio: ', new.fecha_cambio
						),
					now());
			end 
		$$

	-- quoted
		drop trigger if exists tr_insert_quoted;
		delimiter $$
			create trigger tr_insert_quoted after insert on quoted
			for each row
			begin		
				insert into bitacora (usuario, id_tabla, tabla, tipo_accion, query_usado, fecha) values(
					current_user(), new.id_quoted, 'quoted', 'Insert', 
					concat('insert into quoted (id_quoted, id_proyecto, id_task, estatus, fecha_cambio) values (',
						new.id_quoted, ', ', new.id_proyecto, ', ', new.id_task,', ',new.estatus,', ', new.fecha_cambio, ');'
					),
					now());
			end 
		$$
		drop trigger if exists tr_update_quoted;
		delimiter $$
			create trigger tr_update_quoted after update on quoted
			for each row
			begin		
				insert into bitacora (usuario, id_tabla, tabla, tipo_accion, query_usado, fecha) values(
					current_user(), new.id_quoted, 'quoted', 'Update', 
					concat('Info anterior: estatus: ', old.estatus, ', fecha_cambio: ', old.fecha_cambio,
						', Info nueva:', new.estatus, ', fecha_cambio: ', new.fecha_cambio
						),
					now());
			end 
		$$

	-- sourcing
		drop trigger if exists tr_insert_sourcing;
		delimiter $$
			create trigger tr_insert_sourcing after insert on sourcing
			for each row
			begin		
				insert into bitacora (usuario, id_tabla, tabla, tipo_accion, query_usado, fecha) values(
					current_user(), new.id_sourcing, 'sourcing', 'Insert', 
					concat('insert into sourcing (id_sourcing, id_proyecto, id_task, estatus, fecha_cambio) values (',
						new.id_sourcing, ', ', new.id_proyecto, ', ', new.id_task,', ',new.estatus,', ', new.fecha_cambio, ');'
					),
					now());
			end 
		$$
		drop trigger if exists tr_update_sourcing;
		delimiter $$
			create trigger tr_update_sourcing after update on sourcing
			for each row
			begin		
				insert into bitacora (usuario, id_tabla, tabla, tipo_accion, query_usado, fecha) values(
					current_user(), new.id_sourcing, 'sourcing', 'Update', 
					concat('Info anterior: estatus: ', old.estatus, ', fecha_cambio: ', old.fecha_cambio,
						', Info nueva:', new.estatus, ', fecha_cambio: ', new.fecha_cambio
						),
					now());
			end 
		$$

-- Triggers para coordenadas
	drop trigger if exists tr_update_coordenadas;
	delimiter $$
		create trigger tr_update_coordenadas after update on coordenadas
		for each row
		begin		
			if old.lat is null then set @old_lat = "NULL"; else set @old_lat = old.lat; end if;
			if old.lng is null then set @old_lng = "NULL"; else set @old_lng = old.lng; end if;
			insert into bitacora (usuario, id_tabla, tabla, tipo_accion, query_usado, fecha) values(
				current_user(), old.id_coord, 'coordenadas', 'Update', 
				concat('id_proyecto: ',old.id_proyecto,'; Info anterior: lat: ', @old_lat, ', lng: ', @old_lng, ', activo: ', old.activo,
					', Info nueva:', new.lat, ', lng: ', new.lng, ', activo: ', new.activo
					),
				now());
		end 
	$$
-- Triggers para versiones_js
	drop trigger if exists tr_insert_version;
	delimiter $$
		create trigger tr_insert_version after insert on versiones_js
		for each row
		begin		
			insert into bitacora (usuario, id_tabla, tabla, tipo_accion, query_usado, fecha) values(
				current_user(), new.id_version, 'versiones_js', 'Insert', 
				concat('insert into versiones_js (id_version, version, fecha, activo) values (',
					new.id_version, ', ', new.version, ', ', new.fecha,', ',new.activo, ');'
				),
				now());
		end 
	$$

	drop trigger if exists tr_update_version;
	delimiter $$
		create trigger tr_update_version after update on versiones_js
		for each row
		begin		
			insert into bitacora (usuario, id_tabla, tabla, tipo_accion, query_usado, fecha) values(
				current_user(), old.id_version, 'versiones_js', 'Update', 
				concat('Informacion anterior: version: ', old.version,', activo: ', old.activo,
					' Informacion nueva: version: ', new.version, ', activo: ', new.activo
				),
				now());
		end 
	$$

-- Triggers para controladores
	drop trigger if exists tr_update_controladores;
	delimiter $$
		create trigger tr_update_controladores after update on controladores
		for each row
		begin		
			insert into bitacora (usuario, id_tabla, tabla, tipo_accion, query_usado, fecha) values(
				current_user(), old.id_controlador, 'controladores', 'Update', 
				concat('Informacion anterior: controlador: ', old.nombre_controlador, ', activo: ', old.activo,
					' Informacion nueva: activo: ', new.activo
				),
				now());
		end 
	$$
    
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
    
    drop procedure if exists get_all_data_proyecto;
	delimiter $$
		create procedure get_all_data_proyecto (IN id_proyecto_get INT)
		begin
			SELECT *, proyecto.activo as activo_p,
			proyecto.a_registro as registro_p, proyecto.folio as folio_p,
			(SELECT nombre FROM usuarios WHERE id_usuario = proyecto.id_asesor) AS nombreAsesor, 
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
	drop trigger if exists tr_insert_pb;
	drop trigger if exists tr_update_pb;
	drop trigger if exists tr_insert_proy;
	drop trigger if exists tr_update_proy;
	drop trigger if exists tr_insert_usuarios;
	drop trigger if exists tr_update_usuarios;
	drop trigger if exists tr_insert_aa;
	drop trigger if exists tr_update_aa;
	drop trigger if exists tr_insert_transporte;
	drop trigger if exists tr_update_transporte;
	drop trigger if exists tr_insert_proveedores;
	drop trigger if exists tr_update_proveedores;
	drop trigger if exists tr_insert_productos;
	drop trigger if exists tr_update_productos;
	drop trigger if exists tr_insert_rel_aa;
	drop trigger if exists tr_insert_proveedores_clientes;
	drop trigger if exists tr_update_proveedores_clientes;
	drop trigger if exists tr_insert_productos_clientes;
	drop trigger if exists tr_insert_productos_sp_clientes;
	drop trigger if exists tr_update_productos_sp_clientes;
	drop trigger if exists tr_insert_cotizaciones;
	drop trigger if exists tr_update_cotizaciones;
	drop trigger if exists tr_insert_producto_cotizacion;
	drop trigger if exists tr_insert_media_productos_cot;
	drop trigger if exists tr_update_media_productos_cot;
	drop trigger if exists tr_insert_documentos;
	drop trigger if exists tr_update_documentos;
	drop trigger if exists tr_insert_customs;
	drop trigger if exists tr_update_customs;
	drop trigger if exists tr_insert_done;
	drop trigger if exists tr_update_done;
	drop trigger if exists tr_insert_freight;
	drop trigger if exists tr_update_freight;
	drop trigger if exists tr_insert_production;
	drop trigger if exists tr_update_production;
	drop trigger if exists tr_insert_quoted;
	drop trigger if exists tr_update_quoted;
	drop trigger if exists tr_insert_sourcing;
	drop trigger if exists tr_update_sourcing;
	drop trigger if exists tr_update_coordenadas;
	drop trigger if exists tr_insert_version;
	drop trigger if exists tr_update_version;
	drop trigger if exists tr_update_controladores;

	drop procedure if exists noMyProyectos;
	drop procedure if exists get_all_data_proyecto;
	drop procedure if exists noMyProyectos_asesor;
	

	-- triggers insert y update para proyecto_base
	drop trigger if exists tr_insert_pb;
	delimiter $$
		create trigger tr_insert_pb after insert on proyecto_base
		for each row
		begin
			if new.comentarios is null then set @new_comentario= "NULL"; else set @new_comentario = new.comentarios; end if;
			insert into bitacora (usuario, id_usuario, id_tabla, tabla, tipo_accion, query_usado, fecha) values(
			current_user(), new.id_cliente, new.id_proyecto_base, 'proyecto_base', 'Insert', 
			concat('insert into proyecto_base (id_proyecto_base, a_registro, folio, id_cliente, presupuesto, preferencia_empaque, comentarios, tipo_envio, destino, activo, oemservice_path) values (',
	        new.id_proyecto_base,', ',new.a_registro,', ',new.folio,', ',new.id_cliente,', ',new.presupuesto,', "',new.preferencia_empaque,'", "',new.comentarios,'", "',new.tipo_envio,'", "',new.destino,'", ',new.activo,');'),
			now());
		end 
	$$
	drop trigger if exists tr_update_pb;
	delimiter $$
		create trigger tr_update_pb after update on proyecto_base
		for each row
		begin
			insert into bitacora (usuario, id_usuario, id_tabla, tabla, tipo_accion, query_usado, fecha) values(
			current_user(), old.id_cliente, new.id_proyecto_base, 'proyecto_base', 'Update', 
			concat('update proyecto_base set oemservice_path = "', new.oemservice_path,'" where id_proyecto_base = "', new.id_proyecto_base,'";'),
			now());
		end 
	$$
*/