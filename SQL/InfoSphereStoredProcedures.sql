DELIMITER $#%
create procedure AgregarUsuario  
(in SPu_Nombre varchar(255), 
SPu_Apellido_Paterno varchar(255), 
SPu_Apellido_Materno varchar(255), 
SPu_Fecha_Nacimiento date, 
SPu_Genero tinyint, 
SPu_Email varchar(255), 
SPu_Contraseña varchar(255), 
SPu_Rol tinyint, 
SPu_Imagen MEDIUMBLOB
)
begin
 insert into `usuario` (usuario_Nombre, 
 usuario_ApPaterno,
    usuario_ApMaterno,
    usuario_FeNac,
    usuario_Genero,
    usuario_Email,
    usuario_Contraseña,
    usuario_Rol, 
    usuario_Imagen)
 values (SPu_Nombre, 
 SPu_Apellido_Paterno, 
 SPu_Apellido_Materno, 
 SPu_Fecha_Nacimiento, 
 SPu_Genero, 
 SPu_Email, 
 SPu_Contraseña, 
 SPu_Rol, 
 SPu_Imagen);
 END $#%
DELIMITER ;
'////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////'
'////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////'
DELIMITER $#%
create procedure ModificarUsuario  
(in SPEmail varchar(255), 
SPNombre varchar(255), 
SPApellido_Paterno varchar(255), 
SPApellido_Materno varchar(255),
SPGenero tinyint,  
SPContraseña varchar(255))
begin
 update `usuario`
 set Nombre = SPNombre, 
 Apellido_Paterno = SPApellido_Paterno, 
 Apellido_Materno = SPApellido_Materno, 
 Genero = SPGenero,  
 Contraseña = SPContraseña
 where Email = SPEmail;
 END $#%
DELIMITER ;
'////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////'
'////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////'
DELIMITER $#%
create procedure EliminarUsuario  
(in SPUsuarioId int)
begin
 update `usuario`
 set Habilitado = 0
 where UsuarioId = SPUsuarioId;
 END $#%
DELIMITER ;
'////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////'
'////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////'
DELIMITER $#%
create procedure BloquearUsuario  
(in SPUsuarioId int)
begin
 update `usuario`
 set Bloqueado = 0
 where UsuarioId = SPUsuarioId;
 END $#%
DELIMITER ;
'////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////'
'////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////'
DELIMITER $#%
create procedure DesbloquearUsuario  
(in SPUsuarioId int)
begin
 update `usuario`
 set Bloqueado = 1
 where UsuarioId = SPUsuarioId;
 END $#%
DELIMITER ;
'////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////'
'////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////'
DELIMITER $#%
create procedure emailDisponible
(in SPu_Email varchar(255))
BEGIN
 Select usuario_Email FROM usuario WHERE usuario_Email = SPu_Email;
 END $#%
DELIMITER ;
'////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////'
'////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////'
DELIMITER $#%
create procedure iniciarSesion
(in SPu_Email varchar(255), Spu_Contraseña varchar(255))
BEGIN
 Select usuario_Id, 
    usuario_Nombre, 
    usuario_ApPaterno, 
    usuario_ApMaterno,
    usuario_FeNac, 
    usuario_Genero, 
    usuario_Email, 
    usuario_Contraseña,
    usuario_Habilitado,
    usuario_Rol,
    usuario_Bloqueado, 
    usuario_FeReg, 
    usuario_Imagen FROM usuario WHERE (usuario_Email = SPu_Email) AND (usuario_Contraseña = Spu_Contraseña) AND (usuario_Bloqueado <> 1);
 END $#%
DELIMITER ;
'////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////'
'////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////'
DELIMITER $#%
create procedure bloquearUsuario
(in SPu_Id int)
BEGIN
 UPDATE usuario 
 SET usuario_Bloqueado = 1
 WHERE usuario_Id = SPu_Id;
 END $#%
DELIMITER ;
'////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////'
'////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////'
DELIMITER $#%
create procedure desbloquearUsuario
(in SPu_Id int)
BEGIN
 UPDATE usuario 
 SET usuario_Bloqueado = 0
 WHERE usuario_Id = SPu_Id;
 END $#%
DELIMITER ;

DELIMITER $#%
create procedure obtenerImagen
(in SPu_Email varchar(255))
BEGIN
 Select usuario_Imagen from usuario WHERE 
 usuario_Email = SPu_Email;
 END $#%
DELIMITER ;


DELIMITER $#%
create procedure agregarpost
(in SPcat_Nombre varchar(255))
BEGIN
INSERT INTO categoria (categoria_Nombre, categoria_FeCrea) VALUES (SPcat_Nombre, (CURRENT_DATE));
 END $#%
DELIMITER ;

DELIMITER $#%
create procedure obtenerpost
()
BEGIN
SELECT categoria_Id, categoria_Nombre FROM categoria;
 END $#%
DELIMITER ;

DELIMITER $#%
create procedure postCheck(in SPpost_Nombre  varchar(255))
BEGIN
SELECT post_Id, post_Nombre FROM post WHERE post_Nombre = SPpost_Nombre;
 END $#%
DELIMITER ;


DELIMITER $#%
create procedure ModificarUsuarioData(in 
SPu_Id varchar(255), 
SPu_Nombre varchar(255), 
SPu_Apellido_Paterno varchar(255), 
SPu_Apellido_Materno varchar(255),
SPu_Genero tinyint,  
SPu_Contraseña varchar(255)
)
begin
 update usuario
 set 
 usuario_Nombre = SPu_Nombre,
    usuario_ApPaterno = SPu_Apellido_Paterno,
    usuario_ApMaterno = SPu_Apellido_Materno,
    usuario_Genero = SPu_Genero, 
    usuario_Contraseña = SPu_Contraseña
 where usuario_Id = SPu_Id	;
 END $#%
DELIMITER ;

DELIMITER $#%
create procedure ModificarUsuarioImagen(in 
SPu_Id varchar(255),  
SPu_Imagen MEDIUMBLOB)
begin
 update usuario
 set     
 usuario_Imagen = SPu_Imagen
 where usuario_Id = SPu_Id	;
 END $#%
DELIMITER ;

DELIMITER $#%
create procedure obtenerCursoTipoPago(in SPCurso_Id INT)
BEGIN
SELECT curso_tipo FROM curso WHERE Curso_Id = SPCurso_Id;
 END $#%
DELIMITER ;




DELIMITER $#%
create procedure AgregarNivel(in 
SPnivel_Titulo varchar(255),
SPnivel_Indice INT,
SPnivel_Costo DECIMAL(10,2),
SPnivel_Descripcion VARCHAR (255),
SPnivel_Recursos TEXT,
SPnivel_Video VARCHAR(255),
SPnivel_CursoId int
)
begin
 insert into nivel (
nivel_Titulo,
nivel_Indice,
nivel_Costo,
nivel_Descripcion,
nivel_Recursos,
nivel_Video,
nivel_CursoId
)
 values (
SPnivel_Titulo,
SPnivel_Indice,
SPnivel_Costo,
SPnivel_Descripcion,
SPnivel_Recursos,
SPnivel_Video,
SPnivel_CursoId
);	
 END $#%
DELIMITER ;

DELIMITER $#%
create procedure ObtenerIndiceNivel(in SPnivel_CursoId INT)
BEGIN
SELECT MAX(nivel_Indice) AS Indice FROM nivel WHERE nivel_CursoId = SPnivel_CursoId;
 END $#%
DELIMITER ;

DELIMITER $#%
create procedure cambiarPostActivo(in SPCurso_Id INT)
BEGIN
UPDATE curso 
SET curso_Activo = NOT curso_Activo
WHERE Curso_Id = SPCurso_Id;
 END $#%
DELIMITER ;

DELIMITER $#%
create procedure obtenerPostData(in SPcurso_Id INT)
BEGIN
SELECT 
curso_Id, 
curso_Nombre, 
curso_Descripcion, 
curso_tipo, 
curso_Precio, 
curso_MeGusta, 
curso_NoMeGusta, 
curso_Calificacion, 
curso_Imagen, 
curso_Activo, 
curso_FeCrea, 
Curso_UsuarioId, 
curso_CategoriaId 
FROM curso WHERE curso_Id = SPcurso_Id;
 END $#%
DELIMITER ;


DELIMITER $#%
create procedure obtenerTodoPost()
BEGIN
SELECT 
curso_Id, 
curso_Nombre, 
curso_Descripcion, 
curso_tipo, 
curso_Precio, 
curso_MeGusta, 
curso_NoMeGusta, 
curso_Calificacion, 
curso_Imagen, 
curso_Activo, 
curso_FeCrea, 
Curso_UsuarioId, 
curso_CategoriaId 
FROM curso;
 END $#%
DELIMITER ;


DELIMITER $#%
create procedure agregarMensaje(in
SPmensaje_Contenido VARCHAR(255),
SPMensaje_SenderId INT,
SPMensaje_ReceiverId INT)
BEGIN
INSERT INTO Mensaje(
mensaje_Contenido,
Mensaje_SenderId,
Mensaje_ReceiverId
) VALUES (
SPmensaje_Contenido,
SPMensaje_SenderId,
SPMensaje_ReceiverId);
END $#%
DELIMITER ;




DELIMITER $#%
create procedure obtenerMensajesReciente(in SPusuarioActual int, SPusuarioOtro int)
BEGIN
SELECT
mensaje_Id,
mensaje_Contenido,
mensaje_FeCrea,
Mensaje_SenderId,
Mensaje_ReceiverId
FROM mensaje 
WHERE (Mensaje_ReceiverId = SPusuarioActual AND Mensaje_SenderId = SPusuarioOtro) 
OR (Mensaje_SenderId = SPusuarioActual AND Mensaje_ReceiverId = SPusuarioOtro) 
ORDER BY mensaje_Id;
END $#%
DELIMITER ;

CALL obtenerMensajesReciente(1,10);

DELIMITER $#%
create procedure agregarPostUsuario(in
SPcu_curso_id int,
SPcu_usuario_id int,
SPcu_terminado bit,
SPcu_MeGusta bit,
SPcu_NoMegusta bit)
BEGIN
INSERT INTO curso_usuario(
cu_curso_id,
cu_usuario_id,
cu_terminado,
cu_MeGusta,
cu_NoMegusta
) VALUES (
SPcu_curso_id,
SPcu_usuario_id,
SPcu_terminado,
SPcu_MeGusta,
SPcu_NoMegusta);
END $#%
DELIMITER ;

DELIMITER $#%
create procedure obtenerLosMasVendidos()
BEGIN
SELECT
curso_id,
curso_Nombre,
curso_Descripcion,
curso_tipo,
curso_Precio,
curso_MeGusta,
curso_NoMeGusta,
curso_Calificacion,
curso_Imagen,
curso_Activo,
curso_FeCrea,
Curso_UsuarioId,
curso_CategoriaId
from losmasvendidos;
END $#%
DELIMITER ;

DELIMITER $#%
create procedure obtenerLosMasNuevos()
BEGIN
SELECT
curso_id,
curso_Nombre,
curso_Descripcion,
curso_tipo,
curso_Precio,
curso_MeGusta,
curso_NoMeGusta,
curso_Calificacion,
curso_Imagen,
curso_Activo,
curso_FeCrea,
Curso_UsuarioId,
curso_CategoriaId
from losmasnuevos;
END $#%
DELIMITER ;

DELIMITER $#%
create procedure obtenerLosMasFamosos()
BEGIN
SELECT
curso_id,
curso_Nombre,
curso_Descripcion,
curso_tipo,
curso_Precio,
curso_MeGusta,
curso_NoMeGusta,
curso_Calificacion,
curso_Imagen,
curso_Activo,
curso_FeCrea,
Curso_UsuarioId,
curso_CategoriaId
from losmasfamosos;
END $#%
DELIMITER ;
