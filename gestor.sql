create database gestor;

use gestor;

CREATE TABLE `proyecto` (
  `id_proyecto` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date DEFAULT NULL,
  PRIMARY KEY (`id_proyecto`)
);

CREATE TABLE `trabajador` (
  `id_trabajador` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `apellidos` varchar(120) NOT NULL,
  `dni` varchar(9) NOT NULL,
  `email` varchar(60) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `contrasena` varbinary(32) NOT NULL,
  `estado` varchar(30) NOT NULL,
  PRIMARY KEY (`id_trabajador`),
  UNIQUE KEY `usuario` (`usuario`)
);

CREATE TABLE `tarea` (
  `id_tarea` int NOT NULL AUTO_INCREMENT,
  `id_proyecto` int NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(150) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  PRIMARY KEY (`id_tarea`),
  KEY `pk_tarea` (`id_proyecto`),
  CONSTRAINT `pk_tarea` FOREIGN KEY (`id_proyecto`) REFERENCES `proyecto` (`id_proyecto`) ON DELETE CASCADE
);

CREATE TABLE `trabajador_tarea` (
  `id_trabajador_tarea` int NOT NULL AUTO_INCREMENT,
  `id_trabajador` int NOT NULL,
  `id_tarea` int NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date DEFAULT NULL,
  PRIMARY KEY (`id_trabajador_tarea`),
  KEY `fk_trabajador` (`id_trabajador`),
  KEY `fk_tareas` (`id_tarea`),
  CONSTRAINT `fk_tareas` FOREIGN KEY (`id_tarea`) REFERENCES `tarea` (`id_tarea`) ON DELETE CASCADE,
  CONSTRAINT `fk_trabajador` FOREIGN KEY (`id_trabajador`) REFERENCES `trabajador` (`id_trabajador`) ON DELETE CASCADE
);

CREATE TABLE `trabajador_proyecto` (
  `id_trabajador_proyecto` int NOT NULL AUTO_INCREMENT,
  `id_trabajador` int NOT NULL,
  `id_proyecto` int NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date DEFAULT NULL,
  PRIMARY KEY (`id_trabajador_proyecto`),
  KEY `fk_trabajadores` (`id_trabajador`),
  KEY `fk_proyectos` (`id_proyecto`),
  CONSTRAINT `fk_proyectos` FOREIGN KEY (`id_proyecto`) REFERENCES `proyecto` (`id_proyecto`) ON DELETE CASCADE,
  CONSTRAINT `fk_trabajadores` FOREIGN KEY (`id_trabajador`) REFERENCES `trabajador` (`id_trabajador`) ON DELETE CASCADE
);
