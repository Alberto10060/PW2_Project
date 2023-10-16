/*
DELIMITER $#%
CREATE FUNCTION  ()
RETURNS 
DETERMINISTIC
BEGIN
DECLARE 

RETURN (Score);
END $#%
DELIMITER ;
*/

/*VIEWS*/

CREATE VIEW Postsmegusta AS
SELECT 
post_Id ,
post_Nombre ,
post_Descripcion ,
post_tipo ,
post_MeGusta ,
post_NoMeGusta , 
post_Imagen ,
post_FeCrea ,
post_UsuarioId 
post_CategoriaId 
FROM post 
ORDER BY postmegusta DESC
LIMIT 4;


-- TRIGGERS
-- prueba
DELIMITER \\
CREATE TRIGGER actualizarpost
AFTER INSERT ON post
    FOR EACH ROW 
 INSERT INTO usuario
 SET action = 'update',
     post_ID = OLD.post_ID,
     usuario_ApPaterno = OLD.usuario_ApPaterno,
     usuario_ApMaterno = OLD.usuario_ApMaterno,
     changedat = NOW(); \\
     -----------------------------------------------------
     
CREATE TRIGGER Compararposts
AFTER INSERT on Posts
FOR EACH ROW
SET ACTION = 'X',



CREATE TRIGGER 