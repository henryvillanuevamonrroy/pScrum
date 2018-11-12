# SQL Manager 2010 for MySQL 4.5.0.9
# ---------------------------------------
# Host     : localhost
# Port     : 3306
# Database : pscrum


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES latin1 */;

SET FOREIGN_KEY_CHECKS=0;

CREATE DATABASE `pscrum`
    CHARACTER SET 'latin1'
    COLLATE 'latin1_swedish_ci';

USE `pscrum`;

#
# Structure for the `calificaciones` table : 
#

CREATE TABLE `calificaciones` (
  `indice` int(11) NOT NULL AUTO_INCREMENT,
  `alumno` varchar(120) NOT NULL DEFAULT '0',
  `nota` int(11) NOT NULL DEFAULT '5',
  `curso` varchar(120) NOT NULL DEFAULT '0',
  `grado` int(11) NOT NULL DEFAULT '0',
  `descripcion` varchar(300) NOT NULL DEFAULT '0',
  `tipo` varchar(50) NOT NULL DEFAULT '0',
  `fecha` date DEFAULT NULL,
  `dni` int(11) DEFAULT NULL,
  PRIMARY KEY (`indice`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

#
# Structure for the `calificaciones_r` table : 
#

CREATE TABLE `calificaciones_r` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `curso` varchar(50) DEFAULT NULL,
  `grado` int(11) DEFAULT NULL,
  `tipo` varchar(50) DEFAULT NULL,
  `dni` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

#
# Structure for the `cursos` table : 
#

CREATE TABLE `cursos` (
  `indice` int(11) NOT NULL AUTO_INCREMENT,
  `curso` varchar(50) DEFAULT '0',
  `descripcion` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`indice`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

#
# Structure for the `estudiantes` table : 
#

CREATE TABLE `estudiantes` (
  `dni` int(8) NOT NULL,
  `nombres` varchar(80) DEFAULT NULL,
  `apellidos` varchar(80) DEFAULT NULL,
  `grado` int(2) DEFAULT NULL,
  `seccion` int(1) DEFAULT NULL,
  `estado` int(11) DEFAULT '1',
  PRIMARY KEY (`dni`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for the `grado` table : 
#

CREATE TABLE `grado` (
  `id` int(11) DEFAULT NULL,
  `descripcion` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for the `hora_horario` table : 
#

CREATE TABLE `hora_horario` (
  `indice` int(11) NOT NULL AUTO_INCREMENT,
  `orden` varchar(50) NOT NULL DEFAULT '0',
  `hora_inicio` varchar(50) NOT NULL DEFAULT '0',
  `hora_final` varchar(50) NOT NULL DEFAULT '0',
  `descripcion` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`indice`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

#
# Structure for the `horario` table : 
#

CREATE TABLE `horario` (
  `indice` int(11) NOT NULL AUTO_INCREMENT,
  `turno` varchar(50) DEFAULT '0',
  `curso` varchar(50) DEFAULT '0',
  `docente` varchar(50) DEFAULT '0',
  `grado` varchar(50) DEFAULT '0',
  `seccion` varchar(50) DEFAULT '0',
  `dia` varchar(50) DEFAULT '0',
  PRIMARY KEY (`indice`)
) ENGINE=InnoDB AUTO_INCREMENT=1053 DEFAULT CHARSET=latin1;

#
# Structure for the `login` table : 
#

CREATE TABLE `login` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `nombres` varchar(255) NOT NULL,
  `apellidos` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `situacion` int(2) NOT NULL,
  `rol` int(11) DEFAULT NULL,
  `fecha_registro` varchar(45) DEFAULT 'NUL',
  `dni` int(8) DEFAULT NULL,
  `celular` int(9) DEFAULT NULL,
  `telefono` int(9) DEFAULT NULL,
  `nacimiento` varchar(50) DEFAULT NULL,
  `direccion` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `dni` (`dni`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;

#
# Structure for the `proyectos` table : 
#

CREATE TABLE `proyectos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `proyecto` varchar(50) DEFAULT NULL,
  `descripcion` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

#
# Structure for the `roles_usuarios` table : 
#

CREATE TABLE `roles_usuarios` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `rol_name` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

#
# Structure for the `seccion` table : 
#

CREATE TABLE `seccion` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Definition for the `editUser` procedure : 
#

CREATE DEFINER = 'root'@'localhost' PROCEDURE `editUser`(
        IN `userId` VARCHAR(255),
        IN `nombres` VARCHAR(255),
        IN `apellidos` VARCHAR(255),
        IN `dni` VARCHAR(255),
        IN `celular` VARCHAR(255) ,
        IN `telefono` VARCHAR(255),
        IN `direccion` VARCHAR(255),
        IN `correo` VARCHAR(255),
        IN `status` INT(10),
        IN `rol` INT(10)
    )
    NOT DETERMINISTIC
    CONTAINS SQL
    SQL SECURITY DEFINER
    COMMENT ''
BEGIN
UPDATE login SET nombres=nombres, apellidos=apellidos, dni=dni, celular=celular, telefono=telefono, direccion=direccion,
email=correo,situacion=status, rol=rol
 WHERE id = userId;

END;

#
# Definition for the `editUser_estudiante` procedure : 
#

CREATE DEFINER = 'root'@'localhost' PROCEDURE `editUser_estudiante`(
        IN `userId` VARCHAR(255),
        IN `nombres` VARCHAR(255),
        IN `apellidos` VARCHAR(255),
        IN `dni` int(255),
        IN `celular` VARCHAR(255) ,
        IN `telefono` VARCHAR(255),
        IN `direccion` VARCHAR(255),
        IN `correo` VARCHAR(255),
        IN `status` INT(10),
        IN `rol` INT(10),
        IN `grado` INT(10),
        IN `seccion` INT(10)
    )
    NOT DETERMINISTIC
    CONTAINS SQL
    SQL SECURITY DEFINER
    COMMENT ''
BEGIN
UPDATE login SET nombres=nombres, apellidos=apellidos, dni=dni, celular=celular, telefono=telefono, direccion=direccion,
email=correo,situacion=status, rol=rol
 WHERE id = userId;
 
 UPDATE estudiantes SET nombres = nombres,apellidos=apellidos,estado=status, grado=grado, seccion=seccion
 WHERE dni = dni;

END;

#
# Definition for the `generar_horario` procedure : 
#

CREATE DEFINER = 'root'@'localhost' PROCEDURE `generar_horario`()
    NOT DETERMINISTIC
    CONTAINS SQL
    SQL SECURITY DEFINER
    COMMENT ''
BEGIN

delete from horario;

-- Sexto de primaria *****************************************************************************
insert into horario (turno, grado, seccion, dia) 
select CONCAT(h.hora_inicio," - ",h.hora_final), 16, "NA", "Lunes"  from hora_horario h order by orden;
commit;
insert into horario (turno, grado, seccion, dia) 
select CONCAT(h.hora_inicio," - ",h.hora_final), 16, "NA", "Martes"  from hora_horario h order by orden;
commit;
insert into horario (turno, grado, seccion, dia) 
select CONCAT(h.hora_inicio," - ",h.hora_final), 16, "NA", "Miercoles"  from hora_horario h order by orden;
commit;
insert into horario (turno, grado, seccion, dia) 
select CONCAT(h.hora_inicio," - ",h.hora_final), 16, "NA", "Jueves"  from hora_horario h order by orden;
commit;
insert into horario (turno, grado, seccion, dia) 
select CONCAT(h.hora_inicio," - ",h.hora_final), 16, "NA", "Viernes"  from hora_horario h order by orden;
commit;

-- 1RO DE SECUNDARIA *****************************************************************************
insert into horario (turno, grado, seccion, dia) 
select CONCAT(h.hora_inicio," - ",h.hora_final), 21, "NA", "Lunes"  from hora_horario h order by orden;
commit;
insert into horario (turno, grado, seccion, dia) 
select CONCAT(h.hora_inicio," - ",h.hora_final), 21, "NA", "Martes"  from hora_horario h order by orden;
commit;
insert into horario (turno, grado, seccion, dia) 
select CONCAT(h.hora_inicio," - ",h.hora_final), 21, "NA", "Miercoles"  from hora_horario h order by orden;
commit;
insert into horario (turno, grado, seccion, dia) 
select CONCAT(h.hora_inicio," - ",h.hora_final), 21, "NA", "Jueves"  from hora_horario h order by orden;
commit;
insert into horario (turno, grado, seccion, dia) 
select CONCAT(h.hora_inicio," - ",h.hora_final), 21, "NA", "Viernes"  from hora_horario h order by orden;
commit;

-- 2DO DE SECUNDARIA *****************************************************************************
insert into horario (turno, grado, seccion, dia) 
select CONCAT(h.hora_inicio," - ",h.hora_final), 22, "NA", "Lunes"  from hora_horario h order by orden;
commit;
insert into horario (turno, grado, seccion, dia) 
select CONCAT(h.hora_inicio," - ",h.hora_final), 22, "NA", "Martes"  from hora_horario h order by orden;
commit;
insert into horario (turno, grado, seccion, dia) 
select CONCAT(h.hora_inicio," - ",h.hora_final), 22, "NA", "Miercoles"  from hora_horario h order by orden;
commit;
insert into horario (turno, grado, seccion, dia) 
select CONCAT(h.hora_inicio," - ",h.hora_final), 22, "NA", "Jueves"  from hora_horario h order by orden;
commit;
insert into horario (turno, grado, seccion, dia) 
select CONCAT(h.hora_inicio," - ",h.hora_final), 22, "NA", "Viernes"  from hora_horario h order by orden;
commit;

-- 3RO DE SECUNDARIA *****************************************************************************
insert into horario (turno, grado, seccion, dia) 
select CONCAT(h.hora_inicio," - ",h.hora_final), 23, "NA", "Lunes"  from hora_horario h order by orden;
commit;
insert into horario (turno, grado, seccion, dia) 
select CONCAT(h.hora_inicio," - ",h.hora_final), 23, "NA", "Martes"  from hora_horario h order by orden;
commit;
insert into horario (turno, grado, seccion, dia) 
select CONCAT(h.hora_inicio," - ",h.hora_final), 23, "NA", "Miercoles"  from hora_horario h order by orden;
commit;
insert into horario (turno, grado, seccion, dia) 
select CONCAT(h.hora_inicio," - ",h.hora_final), 23, "NA", "Jueves"  from hora_horario h order by orden;
commit;
insert into horario (turno, grado, seccion, dia) 
select CONCAT(h.hora_inicio," - ",h.hora_final), 23, "NA", "Viernes"  from hora_horario h order by orden;
commit;

-- 4TO DE SECUNDARIA *****************************************************************************
insert into horario (turno, grado, seccion, dia) 
select CONCAT(h.hora_inicio," - ",h.hora_final), 24, "NA", "Lunes"  from hora_horario h order by orden;
commit;
insert into horario (turno, grado, seccion, dia) 
select CONCAT(h.hora_inicio," - ",h.hora_final), 24, "NA", "Martes"  from hora_horario h order by orden;
commit;
insert into horario (turno, grado, seccion, dia) 
select CONCAT(h.hora_inicio," - ",h.hora_final), 24, "NA", "Miercoles"  from hora_horario h order by orden;
commit;
insert into horario (turno, grado, seccion, dia) 
select CONCAT(h.hora_inicio," - ",h.hora_final), 24, "NA", "Jueves"  from hora_horario h order by orden;
commit;
insert into horario (turno, grado, seccion, dia) 
select CONCAT(h.hora_inicio," - ",h.hora_final), 24, "NA", "Viernes"  from hora_horario h order by orden;
commit;
-- 5TO DE SECUNDARIA *****************************************************************************
insert into horario (turno, grado, seccion, dia) 
select CONCAT(h.hora_inicio," - ",h.hora_final), 25, "NA", "Lunes"  from hora_horario h order by orden;
commit;
insert into horario (turno, grado, seccion, dia) 
select CONCAT(h.hora_inicio," - ",h.hora_final), 25, "NA", "Martes"  from hora_horario h order by orden;
commit;
insert into horario (turno, grado, seccion, dia) 
select CONCAT(h.hora_inicio," - ",h.hora_final), 25, "NA", "Miercoles"  from hora_horario h order by orden;
commit;
insert into horario (turno, grado, seccion, dia) 
select CONCAT(h.hora_inicio," - ",h.hora_final), 25, "NA", "Jueves"  from hora_horario h order by orden;
commit;
insert into horario (turno, grado, seccion, dia) 
select CONCAT(h.hora_inicio," - ",h.hora_final), 25, "NA", "Viernes"  from hora_horario h order by orden;
commit;

END;

#
# Definition for the `registrar` procedure : 
#

CREATE DEFINER = 'root'@'localhost' PROCEDURE `registrar`(
        IN `usuario` varchar(255),
        IN `password` varchar(255),
        IN `nomb` varchar(255),
        IN `apellido` varchar(255),
        IN `email` varchar(255),
        IN `rol` varchar(45),
        IN `dni` varchar(8),
        IN `datepicker` varchar(10),
        IN `celular` varchar(9),
        IN `telefono` varchar(7),
        IN `direccion` varchar(90)
    )
    NOT DETERMINISTIC
    CONTAINS SQL
    SQL SECURITY DEFINER
    COMMENT ''
BEGIN

insert into login(dni,username,password,nombres,apellidos,email,situacion,rol,fecha_registro,nacimiento,celular,telefono,direccion) values(dni,usuario,password,nomb,apellido,email,1,rol,CURDATE(),datepicker,celular,telefono,direccion);
END;

#
# Definition for the `registrar_estudiantes` procedure : 
#

CREATE DEFINER = 'root'@'localhost' PROCEDURE `registrar_estudiantes`(
        IN `usuario` varchar(255),
        IN `password` varchar(255),
        IN `nomb` varchar(255),
        IN `apellido` varchar(255),
        IN `email` varchar(255),
        IN `rol` varchar(45),
        IN `dni` varchar(8),
        IN `datepicker` varchar(10),
        IN `celular` varchar(9),
        IN `telefono` varchar(7),
        IN `direccion` varchar(90),
        IN `grado` varchar(90),
        IN `seccion` varchar(90)
    )
    NOT DETERMINISTIC
    CONTAINS SQL
    SQL SECURITY DEFINER
    COMMENT ''
BEGIN

insert into login(dni,username,password,nombres,apellidos,email,situacion,rol,fecha_registro,nacimiento,celular,telefono,direccion) values(dni,usuario,password,nomb,apellido,email,1,rol,CURDATE(),datepicker,celular,telefono,direccion);

insert into estudiantes(dni,nombres,apellidos,grado,seccion) values(dni,nomb,apellido,grado,seccion);
END;

#
# Definition for the `removerUser` procedure : 
#

CREATE DEFINER = 'root'@'localhost' PROCEDURE `removerUser`(
        IN `userID` INT(10)
    )
    NOT DETERMINISTIC
    CONTAINS SQL
    SQL SECURITY DEFINER
    COMMENT ''
BEGIN
UPDATE login SET Situacion = 0 WHERE id= userID;
END;

#
# Data for the `calificaciones` table  (LIMIT 0,500)
#

INSERT INTO `calificaciones` (`indice`, `alumno`, `nota`, `curso`, `grado`, `descripcion`, `tipo`, `fecha`, `dni`) VALUES 
  (9,'VILLANUEVA HENRY4',12,'geometria',25,'','examen','2018-11-04',72754438),
  (10,'VILLANUEVA HENRY4',12,'geometria',25,'','examen','2018-11-04',72754438),
  (11,'VILLANUEVA HENRY4',14,'geometria',25,'','examen','2018-11-04',72754438),
  (12,'VILLANUEVA HENRY4',3,'geometria',25,'','examen','2018-11-04',72754438),
  (13,'VILLANUEVA HENRY4',2,'geometria',25,'','examen','2018-11-04',72754438),
  (14,'VILLANUEVA HENRY4',12,'geometria',25,'','examen','2018-11-04',72754438),
  (15,'VILLANUEVA HENRY4',13,'geometria',25,'','examen','2018-11-04',72754438),
  (16,'VILLANUEVA HENRY4',12,'geometria',25,'','examen','2018-11-04',72754438);
COMMIT;

#
# Data for the `calificaciones_r` table  (LIMIT 0,500)
#

INSERT INTO `calificaciones_r` (`id`, `curso`, `grado`, `tipo`, `dni`, `fecha`) VALUES 
  (7,'geometria',25,'examen',72754438,'2018-11-04'),
  (8,'geometria',25,'examen',72754438,'2018-11-04'),
  (9,'geometria',25,'examen',72754438,'2018-11-04');
COMMIT;

#
# Data for the `cursos` table  (LIMIT 0,500)
#

INSERT INTO `cursos` (`indice`, `curso`, `descripcion`) VALUES 
  (1,'matematica',NULL),
  (2,'lenguaje',NULL),
  (3,'geometria',NULL),
  (4,'matematica2','mate2');
COMMIT;

#
# Data for the `estudiantes` table  (LIMIT 0,500)
#

INSERT INTO `estudiantes` (`dni`, `nombres`, `apellidos`, `grado`, `seccion`, `estado`) VALUES 
  (77788888,'HENRY4','VILLANUEVA',25,1,2);
COMMIT;

#
# Data for the `grado` table  (LIMIT 0,500)
#

INSERT INTO `grado` (`id`, `descripcion`) VALUES 
  (3,'inicial 3 a'),
  (4,'inicial 4 a'),
  (5,'inicial 5 a'),
  (11,'1ro de primaria'),
  (12,'2do de primaria'),
  (13,'3ro de primaria'),
  (14,'4to de primaria'),
  (15,'5to de primaria'),
  (16,'6to de primaria'),
  (21,'1ro de secundaria'),
  (22,'2do de secundaria'),
  (23,'3ro de sucundaria'),
  (24,'4to de secundaria'),
  (25,'5to de secundaria');
COMMIT;

#
# Data for the `hora_horario` table  (LIMIT 0,500)
#

INSERT INTO `hora_horario` (`indice`, `orden`, `hora_inicio`, `hora_final`, `descripcion`) VALUES 
  (5,'2','08:00 am','9:00 am','1'),
  (6,'3','09:00 am','10:00 am','1'),
  (7,'4','10:00 am','11:00 am','1'),
  (8,'5','11:00 am','12:00 pm','1');
COMMIT;

#
# Data for the `horario` table  (LIMIT 0,500)
#

INSERT INTO `horario` (`indice`, `turno`, `curso`, `docente`, `grado`, `seccion`, `dia`) VALUES 
  (846,'08:00 am - 9:00 am','geometria','23452423','16','NA','Lunes'),
  (847,'09:00 am - 10:00 am','0','0','16','NA','Lunes'),
  (848,'10:00 am - 11:00 am','0','0','16','NA','Lunes'),
  (849,'11:00 am - 12:00 pm','0','0','16','NA','Lunes'),
  (853,'08:00 am - 9:00 am','0','0','16','NA','Martes'),
  (854,'09:00 am - 10:00 am','0','0','16','NA','Martes'),
  (855,'10:00 am - 11:00 am','0','0','16','NA','Martes'),
  (856,'11:00 am - 12:00 pm','0','0','16','NA','Martes'),
  (860,'08:00 am - 9:00 am','0','0','16','NA','Miercoles'),
  (861,'09:00 am - 10:00 am','0','0','16','NA','Miercoles'),
  (862,'10:00 am - 11:00 am','0','0','16','NA','Miercoles'),
  (863,'11:00 am - 12:00 pm','0','0','16','NA','Miercoles'),
  (867,'08:00 am - 9:00 am','0','0','16','NA','Jueves'),
  (868,'09:00 am - 10:00 am','0','0','16','NA','Jueves'),
  (869,'10:00 am - 11:00 am','0','0','16','NA','Jueves'),
  (870,'11:00 am - 12:00 pm','0','0','16','NA','Jueves'),
  (874,'08:00 am - 9:00 am','0','0','16','NA','Viernes'),
  (875,'09:00 am - 10:00 am','0','0','16','NA','Viernes'),
  (876,'10:00 am - 11:00 am','0','0','16','NA','Viernes'),
  (877,'11:00 am - 12:00 pm','0','0','16','NA','Viernes'),
  (881,'08:00 am - 9:00 am','0','0','21','NA','Lunes'),
  (882,'09:00 am - 10:00 am','0','0','21','NA','Lunes'),
  (883,'10:00 am - 11:00 am','0','0','21','NA','Lunes'),
  (884,'11:00 am - 12:00 pm','0','0','21','NA','Lunes'),
  (888,'08:00 am - 9:00 am','0','0','21','NA','Martes'),
  (889,'09:00 am - 10:00 am','0','0','21','NA','Martes'),
  (890,'10:00 am - 11:00 am','0','0','21','NA','Martes'),
  (891,'11:00 am - 12:00 pm','0','0','21','NA','Martes'),
  (895,'08:00 am - 9:00 am','0','0','21','NA','Miercoles'),
  (896,'09:00 am - 10:00 am','matematica','23452424','21','NA','Miercoles'),
  (897,'10:00 am - 11:00 am','0','0','21','NA','Miercoles'),
  (898,'11:00 am - 12:00 pm','0','0','21','NA','Miercoles'),
  (902,'08:00 am - 9:00 am','0','0','21','NA','Jueves'),
  (903,'09:00 am - 10:00 am','0','0','21','NA','Jueves'),
  (904,'10:00 am - 11:00 am','0','0','21','NA','Jueves'),
  (905,'11:00 am - 12:00 pm','0','0','21','NA','Jueves'),
  (909,'08:00 am - 9:00 am','0','0','21','NA','Viernes'),
  (910,'09:00 am - 10:00 am','0','0','21','NA','Viernes'),
  (911,'10:00 am - 11:00 am','0','0','21','NA','Viernes'),
  (912,'11:00 am - 12:00 pm','0','0','21','NA','Viernes'),
  (916,'08:00 am - 9:00 am','0','0','22','NA','Lunes'),
  (917,'09:00 am - 10:00 am','0','0','22','NA','Lunes'),
  (918,'10:00 am - 11:00 am','0','0','22','NA','Lunes'),
  (919,'11:00 am - 12:00 pm','0','0','22','NA','Lunes'),
  (923,'08:00 am - 9:00 am','0','0','22','NA','Martes'),
  (924,'09:00 am - 10:00 am','0','0','22','NA','Martes'),
  (925,'10:00 am - 11:00 am','0','0','22','NA','Martes'),
  (926,'11:00 am - 12:00 pm','0','0','22','NA','Martes'),
  (930,'08:00 am - 9:00 am','0','0','22','NA','Miercoles'),
  (931,'09:00 am - 10:00 am','0','0','22','NA','Miercoles'),
  (932,'10:00 am - 11:00 am','0','0','22','NA','Miercoles'),
  (933,'11:00 am - 12:00 pm','0','0','22','NA','Miercoles'),
  (937,'08:00 am - 9:00 am','0','0','22','NA','Jueves'),
  (938,'09:00 am - 10:00 am','0','0','22','NA','Jueves'),
  (939,'10:00 am - 11:00 am','0','0','22','NA','Jueves'),
  (940,'11:00 am - 12:00 pm','0','0','22','NA','Jueves'),
  (944,'08:00 am - 9:00 am','0','0','22','NA','Viernes'),
  (945,'09:00 am - 10:00 am','0','0','22','NA','Viernes'),
  (946,'10:00 am - 11:00 am','0','0','22','NA','Viernes'),
  (947,'11:00 am - 12:00 pm','0','0','22','NA','Viernes'),
  (951,'08:00 am - 9:00 am','0','0','23','NA','Lunes'),
  (952,'09:00 am - 10:00 am','0','0','23','NA','Lunes'),
  (953,'10:00 am - 11:00 am','0','0','23','NA','Lunes'),
  (954,'11:00 am - 12:00 pm','0','0','23','NA','Lunes'),
  (958,'08:00 am - 9:00 am','0','0','23','NA','Martes'),
  (959,'09:00 am - 10:00 am','0','0','23','NA','Martes'),
  (960,'10:00 am - 11:00 am','0','0','23','NA','Martes'),
  (961,'11:00 am - 12:00 pm','0','0','23','NA','Martes'),
  (965,'08:00 am - 9:00 am','0','0','23','NA','Miercoles'),
  (966,'09:00 am - 10:00 am','0','0','23','NA','Miercoles'),
  (967,'10:00 am - 11:00 am','0','0','23','NA','Miercoles'),
  (968,'11:00 am - 12:00 pm','0','0','23','NA','Miercoles'),
  (972,'08:00 am - 9:00 am','0','0','23','NA','Jueves'),
  (973,'09:00 am - 10:00 am','0','0','23','NA','Jueves'),
  (974,'10:00 am - 11:00 am','0','0','23','NA','Jueves'),
  (975,'11:00 am - 12:00 pm','0','0','23','NA','Jueves'),
  (979,'08:00 am - 9:00 am','0','0','23','NA','Viernes'),
  (980,'09:00 am - 10:00 am','0','0','23','NA','Viernes'),
  (981,'10:00 am - 11:00 am','0','0','23','NA','Viernes'),
  (982,'11:00 am - 12:00 pm','0','0','23','NA','Viernes'),
  (986,'08:00 am - 9:00 am','0','0','24','NA','Lunes'),
  (987,'09:00 am - 10:00 am','0','0','24','NA','Lunes'),
  (988,'10:00 am - 11:00 am','0','0','24','NA','Lunes'),
  (989,'11:00 am - 12:00 pm','0','0','24','NA','Lunes'),
  (993,'08:00 am - 9:00 am','0','0','24','NA','Martes'),
  (994,'09:00 am - 10:00 am','0','0','24','NA','Martes'),
  (995,'10:00 am - 11:00 am','0','0','24','NA','Martes'),
  (996,'11:00 am - 12:00 pm','0','0','24','NA','Martes'),
  (1000,'08:00 am - 9:00 am','0','0','24','NA','Miercoles'),
  (1001,'09:00 am - 10:00 am','0','0','24','NA','Miercoles'),
  (1002,'10:00 am - 11:00 am','0','0','24','NA','Miercoles'),
  (1003,'11:00 am - 12:00 pm','0','0','24','NA','Miercoles'),
  (1007,'08:00 am - 9:00 am','0','0','24','NA','Jueves'),
  (1008,'09:00 am - 10:00 am','0','0','24','NA','Jueves'),
  (1009,'10:00 am - 11:00 am','0','0','24','NA','Jueves'),
  (1010,'11:00 am - 12:00 pm','0','0','24','NA','Jueves'),
  (1014,'08:00 am - 9:00 am','0','0','24','NA','Viernes'),
  (1015,'09:00 am - 10:00 am','0','0','24','NA','Viernes'),
  (1016,'10:00 am - 11:00 am','0','0','24','NA','Viernes'),
  (1017,'11:00 am - 12:00 pm','0','0','24','NA','Viernes'),
  (1021,'08:00 am - 9:00 am','0','0','25','NA','Lunes'),
  (1022,'09:00 am - 10:00 am','0','0','25','NA','Lunes'),
  (1023,'10:00 am - 11:00 am','0','0','25','NA','Lunes'),
  (1024,'11:00 am - 12:00 pm','0','0','25','NA','Lunes'),
  (1028,'08:00 am - 9:00 am','0','0','25','NA','Martes'),
  (1029,'09:00 am - 10:00 am','0','0','25','NA','Martes'),
  (1030,'10:00 am - 11:00 am','0','0','25','NA','Martes'),
  (1031,'11:00 am - 12:00 pm','0','0','25','NA','Martes'),
  (1035,'08:00 am - 9:00 am','0','0','25','NA','Miercoles'),
  (1036,'09:00 am - 10:00 am','0','0','25','NA','Miercoles'),
  (1037,'10:00 am - 11:00 am','0','0','25','NA','Miercoles'),
  (1038,'11:00 am - 12:00 pm','0','0','25','NA','Miercoles'),
  (1042,'08:00 am - 9:00 am','0','0','25','NA','Jueves'),
  (1043,'09:00 am - 10:00 am','0','0','25','NA','Jueves'),
  (1044,'10:00 am - 11:00 am','0','0','25','NA','Jueves'),
  (1045,'11:00 am - 12:00 pm','0','0','25','NA','Jueves'),
  (1049,'08:00 am - 9:00 am','0','0','25','NA','Viernes'),
  (1050,'09:00 am - 10:00 am','0','0','25','NA','Viernes'),
  (1051,'10:00 am - 11:00 am','0','0','25','NA','Viernes'),
  (1052,'11:00 am - 12:00 pm','0','0','25','NA','Viernes');
COMMIT;

#
# Data for the `login` table  (LIMIT 0,500)
#

INSERT INTO `login` (`id`, `username`, `nombres`, `apellidos`, `email`, `password`, `situacion`, `rol`, `fecha_registro`, `dni`, `celular`, `telefono`, `nacimiento`, `direccion`) VALUES 
  (48,'admin','HENRY','VILLANUEVA MONRROY','henry@lacafetalab.pe','123456a.',1,1,'2018-07-29',72754438,989861707,989861707,'19/09/2018','jr. san carlos comas');
COMMIT;

#
# Data for the `proyectos` table  (LIMIT 0,500)
#

INSERT INTO `proyectos` (`id`, `proyecto`, `descripcion`) VALUES 
  (1,'SilBIA','Desarrollo de silabos');
COMMIT;

#
# Data for the `roles_usuarios` table  (LIMIT 0,500)
#

INSERT INTO `roles_usuarios` (`ID`, `rol_name`) VALUES 
  (1,'Administrador'),
  (2,'Director'),
  (3,'SubDirector'),
  (4,'Docente'),
  (5,'Auxiliar'),
  (6,'Administrativo'),
  (7,'Estudiante');
COMMIT;

#
# Data for the `seccion` table  (LIMIT 0,500)
#

INSERT INTO `seccion` (`id`, `descripcion`) VALUES 
  (1,'A'),
  (2,'B'),
  (3,'C'),
  (4,'D'),
  (5,'E');
COMMIT;



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;