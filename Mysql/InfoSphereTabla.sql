-- DROP DATABASE BDINFOSPHERE2023;
CREATE DATABASE BDINFOSPHERE2023;
USE BDINFOSPHERE2023;

Call sp_mensaje(0,"menaje prueba",3,7, 'INSERT');


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
-- Drop table post;
CREATE TABLE post (
post_id INT UNIQUE AUTO_INCREMENT COMMENT 'Identificacion numerica para los posts',
post_nombre VARCHAR(255) COMMENT 'Nombre del post',
post_descripcion VARCHAR(255) COMMENT 'Descripcion general del post',
post_imagen MEDIUMBLOB COMMENT 'Imagen de portada del post',
post_fecrea DATE DEFAULT (CURRENT_DATE) COMMENT 'Fecha de creacion del post',
post_usuarioid INT COMMENT 'FK Id de usuario que creo el post',
FOREIGN KEY (post_usuarioId) REFERENCES usuario(usuario_id),
PRIMARY KEY (post_id)
);


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

