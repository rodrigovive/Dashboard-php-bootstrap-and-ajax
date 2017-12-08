-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-12-2017 a las 03:31:50
-- Versión del servidor: 5.7.14
-- Versión de PHP: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `registro`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `user` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `pasadmin` varchar(250) NOT NULL,
  `rol` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `login`
--

INSERT INTO `login` (`id`, `user`, `password`, `email`, `pasadmin`, `rol`) VALUES
(1, 'Administrador', '', 'admin@gmail.com', '123456', 1),
(2, 'Josephzxcz', '12345', 'josephg059@gmail.com', '', 2),
(3, 'rodrigo viveros', '123', 'cherry199662@gmail.com', '', 2),
(4, 'root', '123', 'asdad@gmail.com', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `politicas`
--

CREATE TABLE `politicas` (
  `id` int(4) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `politicas`
--

INSERT INTO `politicas` (`id`, `name`, `description`) VALUES
(1, 'Agregar Usuarios', 'Tiene el permiso de agregar usuarios'),
(2, 'Ver Usuarios Disponibles', 'Tiene el permiso de ver usuarios disponibles'),
(3, 'Editar Usuarios', 'Tiene el permiso de editar usuarios'),
(4, 'Borrar Usuarios', 'Tiene el permiso de borrar usuarios'),
(5, 'Crear Roles', 'Tiene el permiso de crear roles'),
(6, 'Agregar Roles', 'Tiene el permiso de agregar roles'),
(7, 'Editar Roles', 'Tiene el permiso de editar roles'),
(8, 'Borrar Roles', 'Tiene el permiso de borrar roles'),
(9, 'Asignar Roles', 'Tiene el permiso de asignar rol al usuario'),
(10, 'Quitar Rol', 'Tiene el permiso de quitar role al usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `politica_role`
--

CREATE TABLE `politica_role` (
  `politica_id` int(4) NOT NULL,
  `role_id` int(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_user`
--

CREATE TABLE `role_user` (
  `user_id` int(4) NOT NULL,
  `role_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `user` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `rol` int(5) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `politicas`
--
ALTER TABLE `politicas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `politicas`
--
ALTER TABLE `politicas`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
