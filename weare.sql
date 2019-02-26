-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-02-2019 a las 15:51:43
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `weare`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--
-- Creación: 12-01-2019 a las 00:36:33
--

CREATE TABLE `users` (
  `idUsuarios` int(11) NOT NULL,
  `email` varchar(45) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `usuario` varchar(45) NOT NULL,
  `password` char(100) NOT NULL,
  `avatar` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELACIONES PARA LA TABLA `users`:
--

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`idUsuarios`, `email`, `nombre`, `usuario`, `password`, `avatar`) VALUES
(1, 'euge@hotmail.com', 'Eugenia', 'eugedelatorre', '$2y$10$e1GN.2BGwrVopeI53Bh28etnCgLXKhMjuYETcfS.GFKTqfaDdugAu', '5c34ba550532d.jpg'),
(2, 'eugenia@dh.com', 'Eugenia', 'eugedelatorre', '$2y$10$oI/nTTD/zFcvQT8CmP6IUu1UoO99a71j/8IZqtgldEmjpwkRz/ZvG', '5c34bb700465d.jpg'),
(3, 'benderpablo@hotmail.com', 'Pablo', 'pablobender', '$2y$10$sF5tWbh22BvthQm3hJqZOuG8PhXJZThCWDJUobdMJpCX9BZ6PsYfi', '5c34bc360eac0.jpg'),
(4, 'antonella@dh.com', 'Anto', 'anto123', '$2y$10$wIr2iM/adxZdT1X6ayd41.F1pK895omQc/kYs/Czccu1XO2RV8OZy', '5c34d8f990dac.jpg'),
(5, 'hola@dh.com', 'Dario', 'dariosus', '$2y$10$TP2B68IloQQ7TNwkUNyriecXVSDlbkF5jqX1DZhqUIO9rthfiFCve', '5c35004878d18.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUsuarios`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `idUsuarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
