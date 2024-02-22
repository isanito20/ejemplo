-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-02-2024 a las 14:47:31
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `alquiler_juegos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alquiler`
--
CREATE DATABASE alquiler_juegos;
use database alquiler_juegos;

CREATE TABLE `alquiler` (
  `id` int(11) NOT NULL,
  `Cod_juego` varchar(20) NOT NULL,
  `DNI_cliente` varchar(9) NOT NULL,
  `Fecha_alquiler` date NOT NULL,
  `Fecha_devol` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `alquiler`
--

INSERT INTO `alquiler` (`id`, `Cod_juego`, `DNI_cliente`, `Fecha_alquiler`, `Fecha_devol`) VALUES
(10, 'CoD-PS4', '12121212A', '2020-12-11', '2020-12-11'),
(11, 'CoD-PS4', '12121212A', '2020-12-11', '2020-12-11'),
(12, 'CoD-PS4', '12121212A', '2020-12-11', '2020-12-11'),
(13, 'M-Nintendo', '12121212A', '2020-12-11', '2020-12-11'),
(14, 'CoD-PS4', '12121212A', '2020-12-11', '2020-12-11'),
(15, 'F-PS4', '12121212A', '2020-12-11', '2020-12-11'),
(16, 'SMB-Nintendo', '12121212A', '2020-12-11', '2020-12-11'),
(17, 'CoD-PS4', '29999999F', '2023-12-15', '0000-00-00'),
(18, 'F-PS4', '28888888A', '2023-12-15', '2023-12-15'),
(19, 'fifa', '28888888A', '2023-12-15', '2024-01-21'),
(20, 'M-Nintendo', '24858899S', '2023-12-15', '2023-12-15'),
(21, 'CoD-PS4', '24858899S', '2024-01-16', '0000-00-00'),
(22, 'CoD-PS4', '28888888A', '2024-01-21', '2024-01-21'),
(23, 'CoD-PS4', '28888888A', '2024-01-21', '0000-00-00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `DNI` varchar(9) NOT NULL,
  `Nombre` varchar(30) NOT NULL,
  `Apellidos` varchar(50) NOT NULL,
  `Direccion` varchar(50) NOT NULL,
  `Localidad` varchar(50) NOT NULL,
  `Clave` varchar(50) NOT NULL,
  `Tipo` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`DNI`, `Nombre`, `Apellidos`, `Direccion`, `Localidad`, `Clave`, `Tipo`) VALUES
('11111111A', 'Antonio', 'López', 'Ancha,21', 'Lucena', '4a181673429f0b6abbfd452f0f3b5950', 'cliente'),
('12121212A', 'Admin', 'Admin', 'Direc. Admin', 'Lucena', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
('24858899S', 'polo', 'molo', 'calle pelota', 'albacete', '$2y$10$q6wLmCvuEi9UD3CmNagH8.9YofB77oJNhD8QvjnCzUD', 'cliente'),
('26827667F', 'izan', 'herenas', 'calle polo', 'moriles', '1234', 'cliente'),
('28888888A', 'jefe', 'jefazo', 'calle admin', 'superrr', 'd41d8cd98f00b204e9800998ecf8427e', 'admin'),
('29999999F', 'alberto', 'arjona', 'calle maria santa de la justicia', 'puebla', 'd41d8cd98f00b204e9800998ecf8427e', 'cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `juegos`
--

CREATE TABLE `juegos` (
  `Codigo` varchar(20) NOT NULL,
  `Nombre_juego` varchar(50) NOT NULL,
  `Nombre_consola` varchar(30) NOT NULL,
  `Anno` year(4) NOT NULL,
  `Precio` int(11) NOT NULL,
  `Alguilado` varchar(10) NOT NULL,
  `Imagen` varchar(60) NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `juegos`
--

INSERT INTO `juegos` (`Codigo`, `Nombre_juego`, `Nombre_consola`, `Anno`, `Precio`, `Alguilado`, `Imagen`, `descripcion`) VALUES
('CoD-PS4', 'Call of Duty', 'PS4', '2019', 120, 'SI', 'Fotos/cod.jpg', 'Call of Duty es una serie de videojuegos de disparos en primera persona, de estilo bélico, creada por Ben Chichoski, desarrollada principal e inicialmente por Infinity Ward, Treyarch, Sledgehammer Games y en menor proporción Raven Software y distribuida por Activision.'),
('F-PS4', 'Fortnite', 'PS4', '2018', 90, 'NO', 'Fotos/fortnite.jpg', 'Fortnite es un videojuego del año 2017 desarrollado por la empresa Epic Games, lanzado como diferentes paquetes de software que presentan diferentes modos de juego, pero que comparten el mismo motor de juego y mecánicas. Fue anunciado en los Spike Video Game Awards en 2011'),
('fifa', 'fifa', 'PS4', '2023', 30, 'NO', 'fotos/1702601755-fifa.jpg', 'el mejor juego del fifa'),
('M-Nintendo', 'MineCraft', 'Nintendo', '2015', 50, 'NO', 'Fotos/minecraft.jpg', 'Minecraft es un videojuego de construcción, de tipo «mundo abierto» o sandbox creado originalmente por el sueco Markus Persson (conocido comúnmente como \"Notch\"),2​ y posteriormente desarrollado por su empresa, Mojang Studios. Fue lanzado públicamente el 17 de mayo de 2009, después de diversos cambios fue lanzada su versión completa el 18 de noviembre de 2011. '),
('SMB-Nintendo', 'Super Mario Bross', 'Nintendo', '2007', 99, 'NO', 'Fotos/marioWonder.jpg', 'Super Mario (スーパーマリオ Sūpā Mario?) es una serie de videojuegos de plataformas creados por la empresa desarrolladora Nintendo y protagonizados por su mascota, Mario. También conocida como la serie Super Mario Bros. (スーパーマリオブラザーズ Sūpā Mario Burazāzu?). o simplemente la serie Mario (マ リ オ?), es la serie principal de la franquicia de Mario. Se ha lanzado al menos un videojuego de Super Mario para todas las consolas de videojuegos de Nintendo. ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pelicula`
--

CREATE TABLE `pelicula` (
  `nombre` varchar(50) NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `duracion` time NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `trailer` varchar(100) NOT NULL,
  `subcategoria` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido1` varchar(50) NOT NULL,
  `apellido2` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `fechanacimiento` date NOT NULL,
  `pais` varchar(50) NOT NULL,
  `codigopostal` int(11) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `rol` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`username`, `password`, `nombre`, `apellido1`, `apellido2`, `email`, `fechanacimiento`, `pais`, `codigopostal`, `telefono`, `rol`) VALUES
('pepe', '1234', 'pepe', 'pepe1', 'pepe2', 'pepe@gmail.com', '2024-01-01', 'españa', 14900, '123456789', 'admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valoracion`
--

CREATE TABLE `valoracion` (
  `usuario` varchar(50) NOT NULL,
  `pelicula` varchar(50) NOT NULL,
  `valoracion` int(11) NOT NULL,
  `comentario` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alquiler`
--
ALTER TABLE `alquiler`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Cod_juego` (`Cod_juego`),
  ADD KEY `DNI_cliente` (`DNI_cliente`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`DNI`);

--
-- Indices de la tabla `juegos`
--
ALTER TABLE `juegos`
  ADD PRIMARY KEY (`Codigo`);

--
-- Indices de la tabla `pelicula`
--
ALTER TABLE `pelicula`
  ADD PRIMARY KEY (`nombre`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`username`);

--
-- Indices de la tabla `valoracion`
--
ALTER TABLE `valoracion`
  ADD PRIMARY KEY (`usuario`,`pelicula`),
  ADD KEY `pelicula` (`pelicula`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alquiler`
--
ALTER TABLE `alquiler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alquiler`
--
ALTER TABLE `alquiler`
  ADD CONSTRAINT `alquiler_ibfk_1` FOREIGN KEY (`DNI_cliente`) REFERENCES `cliente` (`DNI`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `alquiler_ibfk_2` FOREIGN KEY (`Cod_juego`) REFERENCES `juegos` (`Codigo`);

--
-- Filtros para la tabla `valoracion`
--
ALTER TABLE `valoracion`
  ADD CONSTRAINT `valoracion_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`username`),
  ADD CONSTRAINT `valoracion_ibfk_2` FOREIGN KEY (`pelicula`) REFERENCES `pelicula` (`nombre`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
