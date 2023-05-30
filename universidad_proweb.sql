-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         8.0.32 - MySQL Community Server - GPL
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.0.0.6468
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para universidad_proweb
CREATE DATABASE IF NOT EXISTS `universidad_proweb` /*!40100 DEFAULT CHARACTER SET utf8mb3 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `universidad_proweb`;

-- Volcando estructura para tabla universidad_proweb.estudiantes
CREATE TABLE IF NOT EXISTS `estudiantes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `num_lista` int DEFAULT NULL,
  `nombres` varchar(45) DEFAULT NULL,
  `apellidos` varchar(45) DEFAULT NULL,
  `genero` char(1) DEFAULT NULL,
  `grado_id` int DEFAULT NULL,
  `seccion_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `grado_estudiante_programa_fkey_idx` (`grado_id`),
  KEY `seccion_estudiante_secciones_fkey_idx` (`seccion_id`),
  CONSTRAINT `grado_estudiante_programa_fkey` FOREIGN KEY (`grado_id`) REFERENCES `programa` (`id`),
  CONSTRAINT `seccion_estudiante_secciones_fkey` FOREIGN KEY (`seccion_id`) REFERENCES `secciones` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla universidad_proweb.estudiantes: ~1 rows (aproximadamente)
INSERT INTO `estudiantes` (`id`, `num_lista`, `nombres`, `apellidos`, `genero`, `grado_id`, `seccion_id`) VALUES
	(1, 1, 'Juan Pablo', 'Sanchez', 'M', 1, 1),
	(2, 2, 'Juan Diego', 'Gonzalez', 'M', 2, 2),
	(3, 3, 'Laura Sofia', 'Uribe', 'F', 2, 2),
	(4, 4, 'Andrea', 'Quiñonez', 'F', 3, 2);

-- Volcando estructura para tabla universidad_proweb.materias
CREATE TABLE IF NOT EXISTS `materias` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `num_evaluaciones` int DEFAULT NULL,
  `grado_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `grado_materia_programa_fkey_idx` (`grado_id`),
  CONSTRAINT `grado_materia_programa_fkey` FOREIGN KEY (`grado_id`) REFERENCES `programa` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla universidad_proweb.materias: ~0 rows (aproximadamente)

-- Volcando estructura para tabla universidad_proweb.notas
CREATE TABLE IF NOT EXISTS `notas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nota` decimal(10,2) DEFAULT NULL,
  `observaciones` varchar(100) DEFAULT NULL,
  `alumno_id` int DEFAULT NULL,
  `materia_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `alumno_notas_estudiantes_fkey_idx` (`alumno_id`),
  KEY `materia_notas_materias_fkey_idx` (`materia_id`),
  CONSTRAINT `alumno_notas_estudiantes_fkey` FOREIGN KEY (`alumno_id`) REFERENCES `estudiantes` (`id`),
  CONSTRAINT `materia_notas_materias_fkey` FOREIGN KEY (`materia_id`) REFERENCES `materias` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla universidad_proweb.notas: ~0 rows (aproximadamente)

-- Volcando estructura para tabla universidad_proweb.programa
CREATE TABLE IF NOT EXISTS `programa` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `ciclo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla universidad_proweb.programa: ~2 rows (aproximadamente)
INSERT INTO `programa` (`id`, `nombre`, `ciclo`) VALUES
	(1, 'Ingenieria de Sistemas', '2023A'),
	(2, 'Ingenieria Industrial', '2023A'),
	(3, 'Ingenieria Comercial', '2022B'),
	(4, 'Ingenieria Biomedica', '2020A'),
	(5, 'Ingenieria en Energias', '2022B');

-- Volcando estructura para tabla universidad_proweb.secciones
CREATE TABLE IF NOT EXISTS `secciones` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` char(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla universidad_proweb.secciones: ~2 rows (aproximadamente)
INSERT INTO `secciones` (`id`, `nombre`) VALUES
	(1, 'A'),
	(2, 'B');

-- Volcando estructura para tabla universidad_proweb.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(15) DEFAULT NULL,
  `password` varchar(15) DEFAULT NULL,
  `nombre` varchar(60) DEFAULT NULL,
  `rol` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla universidad_proweb.users: ~0 rows (aproximadamente)
INSERT INTO `users` (`id`, `username`, `password`, `nombre`, `rol`) VALUES
	(1, 'juan20', '123', 'Juan Pablo', 'Consultor');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
