-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-09-2026 a las 13:23:31
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `seguimiento_academico`
--

-- --------------------------------------------------------

--
-- Creación de la base de datos
--

CREATE DATABASE IF NOT EXISTS `seguimiento_academico` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `seguimiento_academico`;

--
-- Estructura de tabla para la tabla `administradores`
--

CREATE TABLE `administradores` (
  `id_usuario` int(11) NOT NULL,
  `usuario` varchar(32) NOT NULL,
  `contrasena` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `administradores`
--

INSERT INTO `administradores` (`id_usuario`, `usuario`, `contrasena`) VALUES
(1, 'profesor', '$2y$10$dm3NZseRtjoP5I4cG0RU5uCYiLqUprqwBQWA/F7fiCPhTflX4fXOm');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

CREATE TABLE `estados` (
  `id_estado` int(11) NOT NULL,
  `nombre_estado` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estados`
--

INSERT INTO `estados` (`id_estado`, `nombre_estado`) VALUES
(4, 'Aprobado'),
(1, 'Cursando'),
(2, 'Libre'),
(3, 'Regular'),
(0, 'Sin cursar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_x_materia`
--

CREATE TABLE `estado_x_materia` (
  `codigo_materia` varchar(10) NOT NULL,
  `id_estado` int(11) NOT NULL,
  `anio` int(11) NOT NULL,
  `nota` int(11) DEFAULT NULL,
  `visible` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estado_x_materia`
--

INSERT INTO `estado_x_materia` (`codigo_materia`, `id_estado`, `anio`, `nota`, `visible`) VALUES
('T1201', 4, 2022, 6, 0),
('T1202', 4, 2023, 8, 0),
('T1203', 3, 2022, NULL, 0),
('T1205', 4, 2024, 9, 0),
('T1206', 4, 2025, 5, 0),
('T1210', 3, 2024, NULL, 0),
('t1211', 0, 2025, NULL, 0),
('T1212', 3, 2026, NULL, 1),
('T1213', 3, 2026, NULL, 1),
('T1215', 1, 2026, NULL, 1),
('T1217', 0, 2026, NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

CREATE TABLE `materias` (
  `codigo_materia` varchar(10) NOT NULL,
  `nombre_materia` varchar(50) NOT NULL,
  `anio_carrera` int(11) NOT NULL,
  `cuatrimestre_carrera` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `materias`
--

INSERT INTO `materias` (`codigo_materia`, `nombre_materia`, `anio_carrera`, `cuatrimestre_carrera`) VALUES
('T1201', 'Elementos de Programación', 1, 1),
('T1202', 'Matemática para Informática', 1, 1),
('T1203', 'Análisis Matemático I', 1, 2),
('T1204', 'Álgebra Lineal y Geometría Analítica', 1, 2),
('T1205', 'Programación', 1, 2),
('T1206', 'Sistemas de Computación', 2, 1),
('T1207', 'Algoritmos y Estructuras de Datos', 2, 1),
('T1208', 'Programación Orientada a Objetos', 2, 1),
('T1209', 'Programación Numérica', 2, 2),
('T1210', 'Paradigmas y Lenguajes', 2, 2),
('T1211', 'Taller sobre Configuración de Redes IP', 2, 2),
('T1212', 'Probabilidades y Estadística', 3, 1),
('T1213', 'Bases de Datos', 3, 1),
('T1214', 'Introducción al Desarrollo Móvil', 3, 1),
('T1215', 'Programación de Aplicaciones Web', 3, 2),
('T1216', 'Programación Avanzada en Bases de Datos', 3, 2),
('T1217', 'Seminario Técnico Profesional', 3, 2),
('T12RC', 'Inglés', 2, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- Indices de la tabla `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`id_estado`),
  ADD UNIQUE KEY `nombre` (`nombre_estado`);

--
-- Indices de la tabla `estado_x_materia`
--
ALTER TABLE `estado_x_materia`
  ADD PRIMARY KEY (`codigo_materia`),
  ADD KEY `fk_exm_estado` (`id_estado`);

--
-- Indices de la tabla `materias`
--
ALTER TABLE `materias`
  ADD PRIMARY KEY (`codigo_materia`),
  ADD UNIQUE KEY `nombre` (`nombre_materia`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administradores`
--
ALTER TABLE `administradores`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `estados`
--
ALTER TABLE `estados`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `estado_x_materia`
--
ALTER TABLE `estado_x_materia`
  ADD CONSTRAINT `fk_exm_estado` FOREIGN KEY (`id_estado`) REFERENCES `estados` (`id_estado`),
  ADD CONSTRAINT `fk_exm_materia` FOREIGN KEY (`codigo_materia`) REFERENCES `materias` (`codigo_materia`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
