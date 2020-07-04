-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-07-2020 a las 01:38:45
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyectolis`
--
CREATE DATABASE IF NOT EXISTS `proyectolis` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `proyectolis`;

DELIMITER $$
--
-- Procedimientos
--
DROP PROCEDURE IF EXISTS `count_registers`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `count_registers` (IN `cod_materia` VARCHAR(6))  BEGIN
	SELECT COUNT(*) as "Estudiantes-inscritos"
	FROM inscripcion
		INNER JOIN grupo on inscripcion.codigo_grupo = grupo.codigo_grupo
	WHERE Codigo_materia = "POO104";
END$$

DROP PROCEDURE IF EXISTS `fetch_students`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `fetch_students` (IN `subject` VARCHAR(6))  BEGIN
	SELECT usuario_estudiante as "Estudiantes-inscritos" 
    FROM inscripcion 
    	INNER JOIN grupo on inscripcion.codigo_grupo = grupo.codigo_grupo
    WHERE Codigo_materia = subject;
END$$

DROP PROCEDURE IF EXISTS `fetch_subjects`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `fetch_subjects` ()  BEGIN
	SELECT Codigo_materia, Nombre_materia FROM materia;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrera`
--

DROP TABLE IF EXISTS `carrera`;
CREATE TABLE `carrera` (
  `Codigo_carrera` int(11) NOT NULL,
  `Nombre_carrera` varchar(25) DEFAULT NULL,
  `Codigo_escuela` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `carrera`
--

INSERT INTO `carrera` (`Codigo_carrera`, `Nombre_carrera`, `Codigo_escuela`) VALUES
(1, 'Ingeniería en Ciencias de', 1),
(2, 'Ingeniería Industrial', 4),
(3, 'Ingeniería Biomédica', 3),
(4, 'Licenciatura en Diseño Gr', 2),
(5, 'Licenciatura en Diseño In', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

DROP TABLE IF EXISTS `empleado`;
CREATE TABLE `empleado` (
  `Usuario_empleado` varchar(8) NOT NULL,
  `Pass_empleado` varchar(100) DEFAULT NULL,
  `Nombres_empleado` varchar(25) DEFAULT NULL,
  `Apellidos_empleado` varchar(25) DEFAULT NULL,
  `Edad` int(11) DEFAULT NULL,
  `Correo` varchar(320) DEFAULT NULL,
  `Telefono` varchar(9) DEFAULT NULL,
  `Codigo_rol` int(11) DEFAULT NULL,
  `Activo` tinyint(1) DEFAULT NULL,
  `Hora_bloqueo` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`Usuario_empleado`, `Pass_empleado`, `Nombres_empleado`, `Apellidos_empleado`, `Edad`, `Correo`, `Telefono`, `Codigo_rol`, `Activo`, `Hora_bloqueo`) VALUES
('LF155643', '123456', 'Nombre Prueba', 'Apellido Prueba', 53, 'prueba@hotmail.com', '12345678', 2, 0, '0000-00-00 00:00:00'),
('RC173243', '123456', 'Nombre Empleado', 'Apellido Empleado', 35, 'empleado@hotmail.com', '12345678', 2, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `escuela`
--

DROP TABLE IF EXISTS `escuela`;
CREATE TABLE `escuela` (
  `Codigo_escuela` int(11) NOT NULL,
  `Nombre_escuela` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `escuela`
--

INSERT INTO `escuela` (`Codigo_escuela`, `Nombre_escuela`) VALUES
(1, 'Escuela de Ingeniería en Ciencias de la Computació'),
(2, 'Escuela de Diseño'),
(3, 'Ciencias Básicas'),
(4, 'Escuela de Ingeniería Industrial'),
(5, 'Escuela de Ingeniería Biomédica'),
(6, 'Escuela de Comunicaciones');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

DROP TABLE IF EXISTS `estudiante`;
CREATE TABLE `estudiante` (
  `Usuario_estudiante` varchar(8) NOT NULL,
  `Pass` varchar(100) DEFAULT NULL,
  `Nombres_estudiante` varchar(25) DEFAULT NULL,
  `Apellidos_estudiante` varchar(25) DEFAULT NULL,
  `Edad` int(11) DEFAULT NULL,
  `Correo` varchar(320) DEFAULT NULL,
  `Telefono` varchar(9) DEFAULT NULL,
  `Codigo_rol` int(11) DEFAULT NULL,
  `Grupo_proyecto` tinyint(1) DEFAULT NULL,
  `Activo` tinyint(1) DEFAULT NULL,
  `Hora_bloqueo` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estudiante`
--

INSERT INTO `estudiante` (`Usuario_estudiante`, `Pass`, `Nombres_estudiante`, `Apellidos_estudiante`, `Edad`, `Correo`, `Telefono`, `Codigo_rol`, `Grupo_proyecto`, `Activo`, `Hora_bloqueo`) VALUES
('AS173543', '123456', 'Nombre Ejemplo', 'Apellido Ejemplo', 21, 'ejemplo@hotmail.com', '12345678', 1, 0, 0, '0000-00-00 00:00:00'),
('CF176243', '123456', 'Nombre Ejemplo', 'Apellido Ejemplo', 21, 'ejemplo@hotmail.com', '12345678', 1, 0, 0, '0000-00-00 00:00:00'),
('CV173443', '123456', 'Nombre Ejemplo', 'Apellido Ejemplo', 21, 'ejemplo@hotmail.com', '12345678', 1, 0, 0, '0000-00-00 00:00:00'),
('DC175204', '123456', 'Nombre de Prueba', 'Apellido de Prueba', 22, 'ejemploprueba@hotmail.com', '12345678', 1, 0, 0, '0000-00-00 00:00:00'),
('GF173243', '123456', 'Nombre de Ejemplo', 'Apellido de Ejemplo', 21, 'ejemplo@ejemplo.com', '12345678', 1, 0, 0, '0000-00-00 00:00:00'),
('LJ173643', '123456', 'Nombre Ejemplo', 'Apellido Ejemplo', 21, 'ejemplo@hotmail.com', '12345678', 1, 0, 0, '0000-00-00 00:00:00'),
('PO172243', '123456', 'Nombre Ejemplo', 'Apellido Ejemplo', 21, 'ejemplo@hotmail.com', '12345678', 1, 0, 0, '0000-00-00 00:00:00'),
('RF173243', '123456', 'Nombre Ejemplo', 'Apellido Ejemplo', 21, 'ejemplo@hotmail.com', '12345678', 1, 0, 0, '0000-00-00 00:00:00'),
('TD171243', '123456', 'Geovanny Diego', 'Fontan Trigueros', 21, 'diego@hotmail.com', '12345678', 1, 0, 0, '0000-00-00 00:00:00'),
('TF170243', '123456', 'Diego Geovanny', 'Trigueros Fontan', 21, 'dieog@hotmail.com', '12345678', 1, 0, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo`
--

DROP TABLE IF EXISTS `grupo`;
CREATE TABLE `grupo` (
  `Codigo_grupo` int(11) NOT NULL,
  `Nombre_grupo` varchar(3) DEFAULT NULL,
  `Tipo` tinyint(1) DEFAULT NULL,
  `Codigo_materia` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `grupo`
--

INSERT INTO `grupo` (`Codigo_grupo`, `Nombre_grupo`, `Tipo`, `Codigo_materia`) VALUES
(1, '01T', 0, 'POO104'),
(2, '01T', 0, 'MDB104');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripcion`
--

DROP TABLE IF EXISTS `inscripcion`;
CREATE TABLE `inscripcion` (
  `Codigo_inscripcion` int(11) NOT NULL,
  `Usuario_estudiante` varchar(8) DEFAULT NULL,
  `Codigo_grupo` int(11) DEFAULT NULL,
  `Usuario_empleado` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `inscripcion`
--

INSERT INTO `inscripcion` (`Codigo_inscripcion`, `Usuario_estudiante`, `Codigo_grupo`, `Usuario_empleado`) VALUES
(19, 'LJ173643', 1, 'RC173243'),
(20, 'LJ173643', 2, 'LF155643'),
(21, 'TF170243', 1, 'RC173243'),
(22, 'TF170243', 2, 'LF155643'),
(23, 'TD171243', 1, 'RC173243'),
(24, 'TD171243', 2, 'LF155643'),
(25, 'RF173243', 1, 'RC173243'),
(26, 'RF173243', 2, 'LF155643'),
(27, 'DC175204', 1, 'RC173243'),
(28, 'DC175204', 2, 'LF155643'),
(29, 'GF173243', 1, 'RC173243'),
(30, 'GF173243', 2, 'LF155643'),
(31, 'CV173443', 1, 'RC173243'),
(32, 'CV173443', 2, 'LF155643'),
(33, 'AS173543', 1, 'RC173243'),
(34, 'AS173543', 2, 'LF155643'),
(35, 'CF176243', 1, 'RC173243'),
(36, 'CF176243', 2, 'LF155643'),
(37, 'PO172243', 1, 'RC173243');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia`
--

DROP TABLE IF EXISTS `materia`;
CREATE TABLE `materia` (
  `Codigo_materia` varchar(6) NOT NULL,
  `Nombre_materia` varchar(50) DEFAULT NULL,
  `Codigo_escuela` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `materia`
--

INSERT INTO `materia` (`Codigo_materia`, `Nombre_materia`, `Codigo_escuela`) VALUES
('ADS104', 'Análisis y Diseño de Sistemas', 1),
('CVV501', 'Cálculo de Varias Variables', 3),
('MDB104', 'Modelamiento y Diseño de Bases de Datos', 1),
('POO104', 'Programación Orientada a Objetos', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `Codigo_rol` int(11) NOT NULL,
  `Nombre_rol` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`Codigo_rol`, `Nombre_rol`) VALUES
(1, 'Estudiante'),
(2, 'Docente'),
(3, 'Administra');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrera`
--
ALTER TABLE `carrera`
  ADD PRIMARY KEY (`Codigo_carrera`),
  ADD KEY `FK_Codigo_escuela_carrera` (`Codigo_escuela`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`Usuario_empleado`),
  ADD KEY `FK_Codigo_rol_empleado` (`Codigo_rol`);

--
-- Indices de la tabla `escuela`
--
ALTER TABLE `escuela`
  ADD PRIMARY KEY (`Codigo_escuela`);

--
-- Indices de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`Usuario_estudiante`),
  ADD KEY `FK_Codigo_rol_estudiante` (`Codigo_rol`);

--
-- Indices de la tabla `grupo`
--
ALTER TABLE `grupo`
  ADD PRIMARY KEY (`Codigo_grupo`),
  ADD KEY `FK_Codigo_materia_grupo` (`Codigo_materia`);

--
-- Indices de la tabla `inscripcion`
--
ALTER TABLE `inscripcion`
  ADD PRIMARY KEY (`Codigo_inscripcion`),
  ADD KEY `FK_Usuario_estudiante` (`Usuario_estudiante`),
  ADD KEY `FK_Codigo_grupo_inscripcion` (`Codigo_grupo`),
  ADD KEY `FK_Usuario_empleado_inscripcion` (`Usuario_empleado`);

--
-- Indices de la tabla `materia`
--
ALTER TABLE `materia`
  ADD PRIMARY KEY (`Codigo_materia`),
  ADD KEY `FK_Codigo_escuela_materia` (`Codigo_escuela`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`Codigo_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrera`
--
ALTER TABLE `carrera`
  MODIFY `Codigo_carrera` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `escuela`
--
ALTER TABLE `escuela`
  MODIFY `Codigo_escuela` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `grupo`
--
ALTER TABLE `grupo`
  MODIFY `Codigo_grupo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `inscripcion`
--
ALTER TABLE `inscripcion`
  MODIFY `Codigo_inscripcion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `Codigo_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carrera`
--
ALTER TABLE `carrera`
  ADD CONSTRAINT `FK_Codigo_escuela_carrera` FOREIGN KEY (`Codigo_escuela`) REFERENCES `escuela` (`Codigo_escuela`);

--
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `FK_Codigo_rol_empleado` FOREIGN KEY (`Codigo_rol`) REFERENCES `roles` (`Codigo_rol`);

--
-- Filtros para la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD CONSTRAINT `FK_Codigo_rol_estudiante` FOREIGN KEY (`Codigo_rol`) REFERENCES `roles` (`Codigo_rol`);

--
-- Filtros para la tabla `grupo`
--
ALTER TABLE `grupo`
  ADD CONSTRAINT `FK_Codigo_materia_grupo` FOREIGN KEY (`Codigo_materia`) REFERENCES `materia` (`Codigo_materia`);

--
-- Filtros para la tabla `inscripcion`
--
ALTER TABLE `inscripcion`
  ADD CONSTRAINT `FK_Codigo_grupo_inscripcion` FOREIGN KEY (`Codigo_grupo`) REFERENCES `grupo` (`Codigo_grupo`),
  ADD CONSTRAINT `FK_Usuario_empleado_inscripcion` FOREIGN KEY (`Usuario_empleado`) REFERENCES `empleado` (`Usuario_empleado`),
  ADD CONSTRAINT `FK_Usuario_estudiante` FOREIGN KEY (`Usuario_estudiante`) REFERENCES `estudiante` (`Usuario_estudiante`);

--
-- Filtros para la tabla `materia`
--
ALTER TABLE `materia`
  ADD CONSTRAINT `FK_Codigo_escuela_materia` FOREIGN KEY (`Codigo_escuela`) REFERENCES `escuela` (`Codigo_escuela`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
