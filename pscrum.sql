-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         5.7.23-log - MySQL Community Server (GPL)
-- SO del servidor:              Win64
-- HeidiSQL Versión:             9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para pscrum
CREATE DATABASE IF NOT EXISTS `pscrum` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `pscrum`;

-- Volcando estructura para tabla pscrum.criterios_aceptacion
CREATE TABLE IF NOT EXISTS `criterios_aceptacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `escenario` varchar(350) NOT NULL DEFAULT '0',
  `desencadenante` varchar(350) NOT NULL DEFAULT '0',
  `resultado` varchar(700) NOT NULL DEFAULT '0',
  `estado` int(2) NOT NULL DEFAULT '1',
  `id_historia` varchar(700) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla pscrum.criterios_aceptacion: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `criterios_aceptacion` DISABLE KEYS */;
INSERT INTO `criterios_aceptacion` (`id`, `escenario`, `desencadenante`, `resultado`, `estado`, `id_historia`) VALUES
	(2, 'asgf', 'sadf', 'asdfasdasd', 1, '6');
/*!40000 ALTER TABLE `criterios_aceptacion` ENABLE KEYS */;

-- Volcando estructura para procedimiento pscrum.editUser
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `editUser`(
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
BEGIN
UPDATE login SET nombres=nombres, apellidos=apellidos, dni=dni, celular=celular, telefono=telefono, direccion=direccion,
email=correo,situacion=status, rol=rol
 WHERE id = userId;

END//
DELIMITER ;

-- Volcando estructura para tabla pscrum.epicas
CREATE TABLE IF NOT EXISTS `epicas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `epica` varchar(150) NOT NULL DEFAULT '0',
  `descripcion` varchar(300) NOT NULL DEFAULT '0',
  `estado` int(1) NOT NULL DEFAULT '0',
  `id_proyecto` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla pscrum.epicas: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `epicas` DISABLE KEYS */;
INSERT INTO `epicas` (`id`, `epica`, `descripcion`, `estado`, `id_proyecto`) VALUES
	(3, 'Ingresar al Sistema', 'Ingresar al Sistema', 1, 1),
	(4, 'ASD', 'ASD', 1, 1);
/*!40000 ALTER TABLE `epicas` ENABLE KEYS */;

-- Volcando estructura para tabla pscrum.estado
CREATE TABLE IF NOT EXISTS `estado` (
  `id` int(11) NOT NULL,
  `estado` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla pscrum.estado: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `estado` DISABLE KEYS */;
INSERT INTO `estado` (`id`, `estado`) VALUES
	(1, 'Por iniciar'),
	(2, 'En proceso'),
	(3, 'terminado');
/*!40000 ALTER TABLE `estado` ENABLE KEYS */;

-- Volcando estructura para tabla pscrum.historias
CREATE TABLE IF NOT EXISTS `historias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `como` varchar(10) NOT NULL DEFAULT 'Como',
  `rol` varchar(100) NOT NULL,
  `necesito` varchar(10) NOT NULL DEFAULT 'necesito',
  `funcionalidad` varchar(300) NOT NULL,
  `para` varchar(10) NOT NULL DEFAULT 'para',
  `razon` varchar(300) NOT NULL,
  `prioridad` int(4) DEFAULT NULL,
  `puntaje` int(4) DEFAULT NULL,
  `id_epica` int(3) unsigned NOT NULL,
  `estado` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla pscrum.historias: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `historias` DISABLE KEYS */;
INSERT INTO `historias` (`id`, `como`, `rol`, `necesito`, `funcionalidad`, `para`, `razon`, `prioridad`, `puntaje`, `id_epica`, `estado`) VALUES
	(6, 'Como', 'asd', 'necesito', 'asd', 'para', 'asd', 234, 234, 3, 1);
/*!40000 ALTER TABLE `historias` ENABLE KEYS */;

-- Volcando estructura para tabla pscrum.login
CREATE TABLE IF NOT EXISTS `login` (
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

-- Volcando datos para la tabla pscrum.login: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `login` DISABLE KEYS */;
INSERT INTO `login` (`id`, `username`, `nombres`, `apellidos`, `email`, `password`, `situacion`, `rol`, `fecha_registro`, `dni`, `celular`, `telefono`, `nacimiento`, `direccion`) VALUES
	(48, 'admin', 'HENRY', 'VILLANUEVA MONRROY', 'henry@lacafetalab.pe', '123456a.', 1, 1, '2018-07-29', 72754438, 989861707, 989861707, '19/09/2018', 'jr. san carlos comas');
/*!40000 ALTER TABLE `login` ENABLE KEYS */;

-- Volcando estructura para tabla pscrum.proyectos
CREATE TABLE IF NOT EXISTS `proyectos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `proyecto` varchar(50) DEFAULT NULL,
  `descripcion` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla pscrum.proyectos: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `proyectos` DISABLE KEYS */;
INSERT INTO `proyectos` (`id`, `proyecto`, `descripcion`) VALUES
	(1, 'SilBIA', 'Desarrollo de silabos'),
	(5, 'FalCON', 'EVALUACIONES\n');
/*!40000 ALTER TABLE `proyectos` ENABLE KEYS */;

-- Volcando estructura para procedimiento pscrum.registrar
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `registrar`(
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
BEGIN

insert into login(dni,username,password,nombres,apellidos,email,situacion,rol,fecha_registro,nacimiento,celular,telefono,direccion) values(dni,usuario,password,nomb,apellido,email,1,rol,CURDATE(),datepicker,celular,telefono,direccion);
END//
DELIMITER ;

-- Volcando estructura para procedimiento pscrum.removerUser
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `removerUser`(
        IN `userID` INT(10)
    )
BEGIN
UPDATE login SET Situacion = 0 WHERE id= userID;
END//
DELIMITER ;

-- Volcando estructura para tabla pscrum.roles_usuarios
CREATE TABLE IF NOT EXISTS `roles_usuarios` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `rol_name` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla pscrum.roles_usuarios: ~7 rows (aproximadamente)
/*!40000 ALTER TABLE `roles_usuarios` DISABLE KEYS */;
INSERT INTO `roles_usuarios` (`ID`, `rol_name`) VALUES
	(1, 'Administrador'),
	(2, 'Director'),
	(3, 'SubDirector'),
	(4, 'Docente'),
	(5, 'Auxiliar'),
	(6, 'Administrativo'),
	(7, 'Estudiante');
/*!40000 ALTER TABLE `roles_usuarios` ENABLE KEYS */;

-- Volcando estructura para tabla pscrum.tarea
CREATE TABLE IF NOT EXISTS `tarea` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(500) NOT NULL DEFAULT '0',
  `estado` int(2) NOT NULL DEFAULT '1',
  `id_historia` varchar(500) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla pscrum.tarea: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tarea` DISABLE KEYS */;
INSERT INTO `tarea` (`id`, `descripcion`, `estado`, `id_historia`) VALUES
	(4, 'asd', 3, '6');
/*!40000 ALTER TABLE `tarea` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
