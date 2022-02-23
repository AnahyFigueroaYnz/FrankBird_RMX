USE birdie; 
-- procedure los proyectos y sus cantidades segun el estatus
DROP PROCEDURE IF EXISTS sp_proyectos;
delimiter $$
CREATE PROCEDURE sp_proyectos (IN id_user INT)
	BEGIN
		SELECT COUNT(*) AS proyectos,
		(SELECT COUNT(*) FROM proyecto WHERE id_estadoproyectos = 1 AND id_usuario = id_user AND proyecto.activo = 1) AS sourcing,
		(SELECT COUNT(*) FROM proyecto WHERE id_estadoproyectos = 4 AND id_usuario = id_user AND proyecto.activo = 1) AS cotizado,
		(SELECT COUNT(*) FROM proyecto WHERE id_estadoproyectos = 12 AND id_usuario = id_user AND proyecto.activo = 1) AS produccion,
		(SELECT COUNT(*) FROM proyecto WHERE id_estadoproyectos = 17 AND id_usuario = id_user AND proyecto.activo = 1) AS transito,
		(SELECT COUNT(*) FROM proyecto WHERE id_estadoproyectos = 23 AND id_usuario = id_user AND proyecto.activo = 1) AS entregado,
		(SELECT COUNT(*) FROM proyecto WHERE id_estadoproyectos = 24 AND id_usuario = id_user AND proyecto.activo = 2) AS concluido
		FROM proyectos WHERE activo = 1 AND id_usuario = id_user;
	END
$$