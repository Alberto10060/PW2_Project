-- DROP PROCEDURE IF EXISTS sp_usuario;
DELIMITER //
CREATE PROCEDURE sp_usuario (
    IN p_usuario_id INT,
    IN p_usuario_username VARCHAR(50),
    IN p_usuario_nombre VARCHAR(255),
    IN p_usuario_paterno VARCHAR(255),
    IN p_usuario_materno VARCHAR(255),
    IN p_usuario_genero ENUM('Masculino', 'Femenino', 'Otro'),
    IN p_usuario_fenac DATE,
    IN p_usuario_imagen MEDIUMBLOB,
    IN p_usuario_email VARCHAR(255),
    IN p_usuario_contrasena VARCHAR(255),
    IN p_usuario_habilitado BIT,
    IN p_usuario_bloqueado BIT,
    IN p_operacion VARCHAR(30)
)
BEGIN
    IF p_operacion = 'INSERT' THEN
        INSERT INTO usuario (usuario_username, usuario_nombre, usuario_paterno, usuario_materno, usuario_genero, usuario_fenac, usuario_imagen, usuario_email, usuario_contrasena)
        VALUES (p_usuario_username, p_usuario_nombre, p_usuario_paterno, p_usuario_materno, p_usuario_genero, p_usuario_fenac, p_usuario_imagen, p_usuario_email, p_usuario_contrasena);
    ELSEIF p_operacion = 'UPDATE' THEN
        UPDATE usuario
        SET usuario_username = p_usuario_username,
            usuario_nombre = p_usuario_nombre,
            usuario_paterno = p_usuario_paterno,
            usuario_materno = p_usuario_materno,
            usuario_genero = p_usuario_genero,
            usuario_fenac = p_usuario_fenac,
            usuario_email = p_usuario_email,
            usuario_contrasena = p_usuario_contrasena
        WHERE usuario_id = p_usuario_id;
    ELSEIF p_operacion = 'UPDATE_PHOTO' THEN
        UPDATE usuario
        SET usuario_imagen = p_usuario_imagen
        WHERE usuario_id = p_usuario_id;
    ELSEIF p_operacion = 'DELETE' THEN
        DELETE FROM usuario
        WHERE usuario_id = p_usuario_id;
    ELSEIF p_operacion = 'SELECT' THEN
        SELECT usuario_id, usuario_username, usuario_nombre, usuario_paterno, usuario_materno, usuario_genero, usuario_fenac, usuario_imagen, usuario_email, usuario_contrasena, usuario_fereg, usuario_habilitado, usuario_bloqueado
        FROM usuario
        WHERE usuario_id = p_usuario_id;
    END IF;
END //
DELIMITER ;
-- drop procedure obtener_posts_seguidos;
DELIMITER //

CREATE PROCEDURE obtener_posts_seguidos(IN usuario_id_param INT)
BEGIN
    -- Crear una tabla temporal para almacenar temporalmente los posts
    CREATE TEMPORARY TABLE TempPosts
    SELECT p.*
    FROM post p
    INNER JOIN siguiendo s ON p.post_usuarioid = s.following_usuarioid
    WHERE s.follower_usuarioid = usuario_id_param;

    -- Mostrar los posts de la tabla temporal
    SELECT * FROM TempPosts order by post_id desc;

    -- Eliminar la tabla temporal
    DROP TEMPORARY TABLE IF EXISTS TempPosts;
END //

DELIMITER ;
CALL obtener_posts_seguidos(3);

-- drop procedure sp_post;
DELIMITER //

CREATE PROCEDURE sp_post (
    IN p_post_id INT,
    IN p_post_nombre VARCHAR(255),
    IN p_post_descripcion VARCHAR(255),
    IN p_post_imagen MEDIUMBLOB,
    IN p_post_usuarioid INT,
    IN p_post_categoriaId INT,
    IN p_operacion VARCHAR(30)
)
BEGIN
    IF p_operacion = 'INSERT' THEN
        INSERT INTO post (post_nombre, post_descripcion, post_imagen, post_usuarioid, post_categoriaId)
        VALUES (p_post_nombre, p_post_descripcion, p_post_imagen, p_post_usuarioid, p_post_categoriaId);
    ELSEIF p_operacion = 'UPDATE' THEN
        UPDATE post
        SET post_nombre = p_post_nombre,
            post_descripcion = p_post_descripcion,
            post_imagen = p_post_imagen,
            post_usuarioid = p_post_usuarioid,
            post_categoriaId = p_post_categoriaId
        WHERE post_id = p_post_id;
    ELSEIF p_operacion = 'DELETE' THEN
        DELETE FROM post
        WHERE post_id = p_post_id;
    ELSEIF p_operacion = 'SELECT' THEN
        SELECT post_id, post_nombre, post_descripcion, post_imagen, post_fecrea, post_usuarioid, post_categoriaId
        FROM post
        WHERE post_id = p_post_id order by post_id desc;
	ELSEIF p_operacion = 'SELECT_ALL' THEN
        SELECT post_id, post_nombre, post_descripcion, post_imagen, post_fecrea, post_usuarioid, post_categoriaId
        FROM post order by post_id desc;
	ELSEIF p_operacion = 'SELECT_ALL_USER' THEN
        SELECT post_id, post_nombre, post_descripcion, post_imagen, post_fecrea, post_usuarioid, post_categoriaId
        FROM post
        WHERE post_usuarioid = post_usuarioid order by post_id desc;
    END IF;
END //

DELIMITER ;

