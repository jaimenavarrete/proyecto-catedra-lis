-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-06-2020 a las 02:56:22
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrera`
--

CREATE TABLE `carrera` (
  `Codigo_carrera` int(11) NOT NULL,
  `Nombre_carrera` varchar(25) DEFAULT NULL,
  `Codigo_escuela` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `Usuario_empleado` varchar(8) NOT NULL,
  `Pass_empleado` varchar(100) DEFAULT NULL,
  `Nombres_empleado` varchar(25) DEFAULT NULL,
  `Apellidos_empleado` varchar(25) DEFAULT NULL,
  `Edad` int(11) DEFAULT NULL,
  `Correo` varchar(320) DEFAULT NULL,
  `Telefono` varchar(9) DEFAULT NULL,
  `Codigo_rol` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `escuela`
--

CREATE TABLE `escuela` (
  `Codigo_escuela` varchar(4) NOT NULL,
  `Nombre_escuela` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE `estudiante` (
  `Usuario_estudiante` varchar(8) NOT NULL,
  `Pass` varchar(100) DEFAULT NULL,
  `Nombres_estudiante` varchar(25) DEFAULT NULL,
  `Apellidos_estudiante` varchar(25) DEFAULT NULL,
  `Edad` int(11) DEFAULT NULL,
  `Correo` varchar(320) DEFAULT NULL,
  `Telefono` varchar(9) DEFAULT NULL,
  `Codigo_rol` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo`
--

CREATE TABLE `grupo` (
  `Codigo_grupo` varchar(6) NOT NULL,
  `Nombre_grupo` varchar(3) DEFAULT NULL,
  `Tipo` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripcion`
--

CREATE TABLE `inscripcion` (
  `Codigo_inscripcion` int(11) NOT NULL,
  `Usuario_estudiante` varchar(8) DEFAULT NULL,
  `Codigo_grupo` varchar(6) DEFAULT NULL,
  `Codigo_materia` varchar(5) DEFAULT NULL,
  `Usuario_empleado` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia`
--

CREATE TABLE `materia` (
  `Codigo_materia` varchar(5) NOT NULL,
  `Nombre_materia` varchar(25) DEFAULT NULL,
  `Codigo_escuela` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `Codigo_rol` int(11) NOT NULL,
  `Nombre_rol` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  ADD PRIMARY KEY (`Codigo_grupo`);

--
-- Indices de la tabla `inscripcion`
--
ALTER TABLE `inscripcion`
  ADD PRIMARY KEY (`Codigo_inscripcion`),
  ADD KEY `FK_Usuario_estudiante` (`Usuario_estudiante`),
  ADD KEY `FK_Codigo_grupo_inscripcion` (`Codigo_grupo`),
  ADD KEY `FK_Codigo_materia_inscripcion` (`Codigo_materia`),
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
  MODIFY `Codigo_carrera` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `inscripcion`
--
ALTER TABLE `inscripcion`
  MODIFY `Codigo_inscripcion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `Codigo_rol` int(11) NOT NULL AUTO_INCREMENT;

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
-- Filtros para la tabla `inscripcion`
--
ALTER TABLE `inscripcion`
  ADD CONSTRAINT `FK_Codigo_grupo_inscripcion` FOREIGN KEY (`Codigo_grupo`) REFERENCES `grupo` (`Codigo_grupo`),
  ADD CONSTRAINT `FK_Codigo_materia_inscripcion` FOREIGN KEY (`Codigo_materia`) REFERENCES `materia` (`Codigo_materia`),
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
