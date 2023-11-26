-- DROP DATABASE BDINFOSPHERE2023;
CREATE DATABASE BDINFOSPHERE2023;
USE BDINFOSPHERE2023;

-- Drop table usuario;
CREATE TABLE usuario (
    usuario_id INT UNIQUE AUTO_INCREMENT COMMENT 'Identificacion numerica para los usuarios',
    usuario_username VARCHAR(50) UNIQUE COMMENT 'Username del usuario',
    usuario_nombre VARCHAR(255) COMMENT "Nombre de Usuario",
    usuario_paterno VARCHAR(255) COMMENT "Apellido Paterno del usuario",
    usuario_materno VARCHAR(255) COMMENT "Apellido Materno del usuario",
    usuario_fenac DATE COMMENT "Fecha de nacimiento del usuario",
    usuario_genero tinyint NOT NULL COMMENT "Genero del usuario. Se puede escoger de la lista.",
    usuario_email VARCHAR(255) UNIQUE COMMENT "Email del usuario",
    usuario_contrasena VARCHAR(255) COMMENT "Contraseña del usuario. Esta debe ser min. de 8 caracteres y con al menos una mayuscula, minuscula, numero y caracter especial",
    usuario_habilitado BIT DEFAULT 1 COMMENT "Indica si es activo el usuario. 0 es inactivo, 1 es activo",
    usuario_bloqueado BIT DEFAULT 0 COMMENT "Si esta bloqueado o no. 0 es Desbloqueado, 1 es bloqueado",
    usuario_imagen MEDIUMBLOB COMMENT "Imagen Tipo Avatar del usuario",
    usuario_feReg DATE DEFAULT (CURRENT_DATE) COMMENT "Fecha en el que se creo el usuario",
    PRIMARY KEY (usuario_id)
);
select*from usuario;
-- Usuario Juan
INSERT INTO usuario(usuario_username, usuario_nombre, usuario_paterno, usuario_materno, usuario_fenac, usuario_genero, usuario_email, usuario_contrasena)
VALUES ('juanito123', 'Juan', 'Pérez', 'Rodríguez', '1990-05-15', 1, 'juan@email.com', 'contraseña123');
-- Usuario María
INSERT INTO usuario(usuario_username, usuario_nombre, usuario_paterno, usuario_materno, usuario_fenac, usuario_genero, usuario_email, usuario_contrasena)
VALUES ('maria89', 'María', 'González', 'López', '1989-08-20', 2, 'maria@email.com', 'contraseña456');
-- Usuario Carlos
INSERT INTO usuario(usuario_username, usuario_nombre, usuario_paterno, usuario_materno, usuario_fenac, usuario_genero, usuario_email, usuario_contrasena)
VALUES ('carlitos22', 'Carlos', 'Rodríguez', 'Martínez', '1995-02-10', 1, 'carlos@email.com', 'contraseña789');
-- Usuario Ana
INSERT INTO usuario(usuario_username, usuario_nombre, usuario_paterno, usuario_materno, usuario_fenac, usuario_genero, usuario_email, usuario_contrasena)
VALUES ('anita_77', 'Ana', 'Sánchez', 'Jiménez', '1985-11-25', 2, 'ana@email.com', 'contraseñaabc');
-- Usuario David
INSERT INTO usuario(usuario_username, usuario_nombre, usuario_paterno, usuario_materno, usuario_fenac, usuario_genero, usuario_email, usuario_contrasena)
VALUES ('davidsito', 'David', 'Martínez', 'López', '1992-04-30', 1, 'david@email.com', 'contraseñaxyz');

-- Drop table post;
CREATE TABLE post (
post_id INT UNIQUE AUTO_INCREMENT COMMENT 'Identificacion numerica para los posts',
post_nombre VARCHAR(255) COMMENT 'Nombre del post',
post_descripcion VARCHAR(255) COMMENT 'Descripcion general del post',
post_imagen MEDIUMBLOB COMMENT 'Imagen de portada del post',
post_fecrea DATE DEFAULT (CURRENT_DATE) COMMENT 'Fecha de creacion del post',
post_usuarioid INT COMMENT 'FK Id de usuario que creo el curso',
post_categoriaId int COMMENT 'FK Categoria del curso',
FOREIGN KEY (post_usuarioId) REFERENCES usuario(usuario_id),
PRIMARY KEY (post_id)
);
-- Post de Juan
INSERT INTO post(post_nombre, post_descripcion, post_imagen, post_usuarioid, post_categoriaId)
VALUES ('Viaje a la playa', '¡Disfrutando del sol y la arena!', NULL, 1, 1);
INSERT INTO post(post_nombre, post_descripcion, post_imagen, post_usuarioid, post_categoriaId)
VALUES ('Viaje en popo', '¡Disfrutando del cafe y olor!', NULL, 1, 1);
-- Post de María
INSERT INTO post(post_nombre, post_descripcion, post_imagen, post_usuarioid, post_categoriaId)
VALUES ('Receta de cocina', 'Compartiendo mi receta favorita de pasta.', NULL, 2, 2);
-- Post de Carlos
INSERT INTO post(post_nombre, post_descripcion, post_imagen, post_usuarioid, post_categoriaId)
VALUES ('Rutina de ejercicios', 'Mi rutina diaria para mantenerme en forma.', NULL, 3, 3);
-- Post de Ana
INSERT INTO post(post_nombre, post_descripcion, post_imagen, post_usuarioid, post_categoriaId)
VALUES ('Mis mascotas', 'Presentando a mis adorables mascotas.', NULL, 4, 4);
-- Post de David
INSERT INTO post(post_nombre, post_descripcion, post_imagen, post_usuarioid, post_categoriaId)
VALUES ('Aprendiendo a programar', 'Compartiendo mi experiencia en el mundo de la programación.', NULL, 5, 5);


-- Drop table mensaje;
CREATE TABLE mensaje (
mensaje_id int UNIQUE AUTO_INCREMENT COMMENT 'Identificacion numerica para mensajes',
mensaje_texto text comment 'mensaje',
mensaje_recibirid int comment 'id de quien recibe el mensaje', 
mensaje_mandadoid int comment 'id de quien manda el mensaje',
FOREIGN KEY (mensaje_recibirid) REFERENCES usuario(usuario_id),
FOREIGN KEY (mensaje_mandadoid) REFERENCES usuario(usuario_id),
PRIMARY KEY (mensaje_id)
);

-- Drop table comentario;
CREATE TABLE comentario (
comentario_id int UNIQUE AUTO_INCREMENT COMMENT 'Identificacion numerica para comentarios',
comentario_texto text comment 'comentario',
comentario_recibirid int comment 'id del post al que se envia el comentario', 
comentario_mandadoid int comment 'id de quien manda el comentario',
comentario_fecha timestamp default current_timestamp comment 'fecha en la que se creo el post',
FOREIGN KEY (comentario_recibirid) REFERENCES post(post_Id),
FOREIGN KEY (comentario_mandadoid) REFERENCES usuario(usuario_id),
PRIMARY KEY (comentario_id)
);

-- Drop table siguiendo;
CREATE TABLE siguiendo (
siguiendo_id int UNIQUE auto_increment comment 'Identificacion numerica para los seguidores',
following_usuarioid int comment 'usuario esta siguiendo',
follower_usuarioid INT comment 'los que siguen al usuario',
FOREIGN KEY (following_usuarioid) REFERENCES usuario(usuario_id),
FOREIGN KEY (follower_usuarioid) REFERENCES usuario(usuario_id),
PRIMARY KEY (siguiendo_id)
);
-- Relaciones de Seguimiento
INSERT INTO siguiendo (following_usuarioid, follower_usuarioid) VALUES (1, 2), (1, 3), (2, 3), (2, 4), (3, 1), (3, 4), (4, 5), (5, 1), (5, 3), (5, 2);

