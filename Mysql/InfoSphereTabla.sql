CREATE DATABASE BDINFOSPHERE2023;
USE BDINFOSPHERE2023;

CREATE TABLE usuario (
    usuario_Id INT UNIQUE AUTO_INCREMENT COMMENT 'Identificacion numerica para los usuarios',
    usuario_Nombre VARCHAR(255) COMMENT "Nombre de Usuario",
    usuario_ApPaterno VARCHAR(255) COMMENT "Apellido Paterno del usuario",
    usuario_ApMaterno VARCHAR(255) COMMENT "Apellido Materno del usuario",
    usuario_FeNac DATE COMMENT "Fecha de nacimiento del usuario",
    usuario_Genero tinyint NOT NULL COMMENT "Genero del usuario. Se puede escoger de la lista.",
    usuario_Email VARCHAR(255) UNIQUE COMMENT "Email del usuario",
    usuario_Contraseña VARCHAR(255) COMMENT "Contraseña del usuario. Esta debe ser min. de 8 caracteres y con al menos una mayuscula, minuscula, numero y caracter especial",
    usuario_Habilitado BIT DEFAULT 1 COMMENT "Indica si es activo el usuario. 0 es inactivo, 1 es activo",
    usuario_Bloqueado BIT DEFAULT 0 COMMENT "Si esta bloqueado o no. 0 es Desbloqueado, 1 es bloqueado",
    usuario_Imagen MEDIUMBLOB COMMENT "Imagen Tipo Avatar del usuario",
    usuario_FeReg DATE DEFAULT (CURRENT_DATE) COMMENT "Fecha en el que se creo el usuario",
    PRIMARY KEY (usuario_Id)
);

CREATE TABLE post (
post_Id INT UNIQUE AUTO_INCREMENT COMMENT 'Identificacion numerica para los posts',
post_Nombre VARCHAR(255) COMMENT 'Nombre del post',
post_Descripcion VARCHAR(255) COMMENT 'Descripcion general del curso',
post_tipo BIT COMMENT 'Dictamina si es compra completa 0 o por nivel 1',
post_MeGusta INT NULL DEFAULT 0 COMMENT '"MeGustas" que le han dado los usuarios al post ',
post_NoMeGusta INT NULL DEFAULT 0 COMMENT '"NoMeGustas" que le han dado los usuarios al post ', 
post_Imagen MEDIUMBLOB COMMENT 'Imagen de portada del Curso',
post_FeCrea DATE DEFAULT (CURRENT_DATE) COMMENT 'Fecha de creacion del curso',
post_UsuarioId INT COMMENT 'FK Id de usuario que creo el curso',
post_CategoriaId int COMMENT 'FK Categoria del curso',
FOREIGN KEY (post_UsuarioId) REFERENCES usuario(Usuario_Id),
PRIMARY KEY (post_Id)
);


CREATE TABLE mensaje (
mensaje_id int UNIQUE AUTO_INCREMENT COMMENT 'Identificacion numerica para mensajes',
mensaje_texto text comment 'mensaje',
mensaje_recibirid int comment 'id de quien recibe el mensaje', 
mensaje_mandadoid int comment 'id de quien manda el mensaje',
FOREIGN KEY (mensaje_recibirid) REFERENCES usuario(Usuario_Id),
FOREIGN KEY (mensaje_mandadoid) REFERENCES usuario(Usuario_Id),
PRIMARY KEY (mensaje_id)
);