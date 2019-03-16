-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-03-2019 a las 01:03:22
-- Versión del servidor: 10.1.19-MariaDB
-- Versión de PHP: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `saap`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargos`
--

CREATE TABLE `cargos` (
  `id_cargo` int(11) NOT NULL,
  `nombre_cargo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cargos`
--

INSERT INTO `cargos` (`id_cargo`, `nombre_cargo`) VALUES
(1, 'Supervisor'),
(2, 'Cajero'),
(3, 'Administrador'),
(4, 'Gerente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `IdCliente` int(11) NOT NULL,
  `TipoDocumento` varchar(30) NOT NULL,
  `DocumentoCliente` int(11) NOT NULL,
  `NombreCliente` varchar(90) DEFAULT NULL,
  `ApellidosCliente` varchar(90) DEFAULT NULL,
  `NumeroTelefonico` int(11) DEFAULT NULL,
  `Email` varchar(90) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clients`
--

INSERT INTO `clients` (`id`, `name`, `email`, `address`) VALUES
(14, 'panchito', 'panchito_tester@mail.com', 'libertad'),
(16, 'ulises', 'ulises@mail.com', 'independencia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `convenios`
--

CREATE TABLE `convenios` (
  `IdConvenio` int(11) NOT NULL,
  `NombreConvenio` varchar(60) DEFAULT NULL,
  `Valor` int(11) DEFAULT NULL,
  `NombreCliente` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `convenios`
--

INSERT INTO `convenios` (`IdConvenio`, `NombreConvenio`, `Valor`, `NombreCliente`) VALUES
(1, 'Almacenes Exito Clientes', 150000, 'ALMACENES EXITO S.A'),
(2, 'Universidad Javeriana Alumnos', 2500000, 'ALMACENES EXITO S.A'),
(5, 'Universidad Javeriana Profesores', 2500000, 'EFREN CAMILOSUESCA TORRES '),
(3, 'Almacenes Exito Empleados', 2000000, 'PONTIFICIA UNIVERSIDAD JAVERIANA-'),
(4, 'Universidad Javeriana Profesores', 2800000, 'EFREN CAMILOSUESCA TORRES '),
(7, 'Las arepas de Ruge', 300000, 'OLGA LUCIA  SOLORZANO PEREA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `disponibilidad`
--

CREATE TABLE `disponibilidad` (
  `IdLugar` int(11) NOT NULL,
  `Fila` varchar(1) DEFAULT NULL,
  `Columna` varchar(1) DEFAULT NULL,
  `Disponibilidad` tinyint(4) NOT NULL,
  `Placas` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `disponibilidad`
--

INSERT INTO `disponibilidad` (`IdLugar`, `Fila`, `Columna`, `Disponibilidad`, `Placas`) VALUES
(1, 'B', '9', 0, '10'),
(2, 'A', '6', 0, 'VBG678'),
(3, 'B', '2', 0, '1'),
(4, 'D', '2', 1, '2'),
(5, 'C', '1', 0, '3'),
(6, 'B', '2', 0, 'NYT567');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `IdEmpleado` int(11) NOT NULL,
  `TipoDeDocumento` varchar(100) DEFAULT NULL,
  `Documento` varchar(100) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Apellidos` varchar(100) NOT NULL,
  `Cargo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`IdEmpleado`, `TipoDeDocumento`, `Documento`, `Nombre`, `Apellidos`, `Cargo`) VALUES
(9, 'Cedula de ciudadania', '79958300', 'Miguel', 'Galindo Sánchez', 'Administrador'),
(11, 'Cedula de ciudadania', '79448730', 'Juan carlos', 'Salcedo Barreto', 'Administrador'),
(14, 'Cedula de ciudadania', '80125920', 'Freddy Camilo', 'Ardila Amortegui', 'Gerente'),
(15, 'Cedula de ciudadania', '98765432', 'Mario Manuel', 'Murillo Toro', 'Cajero');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingresos`
--

CREATE TABLE `ingresos` (
  `IdControlIngreso` int(11) NOT NULL,
  `fecha` varchar(100) NOT NULL,
  `tiempo` varchar(100) NOT NULL,
  `TipoTarifa` varchar(100) NOT NULL,
  `PlacasVehiculo` varchar(100) NOT NULL,
  `NombreEmpleado` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ingresos`
--

INSERT INTO `ingresos` (`IdControlIngreso`, `fecha`, `tiempo`, `TipoTarifa`, `PlacasVehiculo`, `NombreEmpleado`) VALUES
(1, '', '18:29', 'Minuto', 'BFB689', 'Mario Manuel Murillo Toro'),
(2, '', '18:47', 'Minuto', 'RTY678', 'Mario Manuel Murillo Toro'),
(3, '', '18:47', 'Hora', 'BXG36', 'Mario Manuel Murillo Toro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarifas`
--

CREATE TABLE `tarifas` (
  `id_tarifa` int(11) NOT NULL,
  `tarifa` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tarifas`
--

INSERT INTO `tarifas` (`id_tarifa`, `tarifa`) VALUES
(1, 'Minuto'),
(2, 'Hora'),
(3, 'Convenio');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiempo`
--

CREATE TABLE `tiempo` (
  `IdControlTiempo` int(11) NOT NULL,
  `HoraEntrada` time(6) DEFAULT NULL,
  `HoraSalida` time(6) DEFAULT NULL,
  `PlacaVehiculo` varchar(90) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tiempo`
--

INSERT INTO `tiempo` (`IdControlTiempo`, `HoraEntrada`, `HoraSalida`, `PlacaVehiculo`) VALUES
(1, '16:20:00.000000', '18:24:00.000000', '1'),
(2, '11:30:00.000000', '12:04:00.000000', '2'),
(3, '16:30:00.000000', '18:44:00.000000', '3'),
(4, '11:30:00.000000', '11:50:00.000000', '4'),
(5, '10:00:00.000000', '13:20:00.000000', '5'),
(12, '19:30:00.000000', '22:00:00.000000', 'MNT56A'),
(13, '23:00:00.000000', '23:59:00.000000', 'MNT56A'),
(14, '20:53:00.000000', '20:54:00.000000', 'RTY678');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_de_documento`
--

CREATE TABLE `tipo_de_documento` (
  `id_tipo` int(11) NOT NULL,
  `nombre_documento` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_de_documento`
--

INSERT INTO `tipo_de_documento` (`id_tipo`, `nombre_documento`) VALUES
(1, 'Cedula de ciudadania'),
(2, 'Cedula de extranjeria'),
(3, 'Tarjeta de identidad'),
(4, 'Pasaporte'),
(5, 'NIT');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_de_vehiculo`
--

CREATE TABLE `tipo_de_vehiculo` (
  `id_tipo_v` int(11) NOT NULL,
  `nombre_tipov` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_de_vehiculo`
--

INSERT INTO `tipo_de_vehiculo` (`id_tipo_v`, `nombre_tipov`) VALUES
(1, 'Micro Bus'),
(2, 'Automovil'),
(3, 'Motocicleta'),
(4, 'Bicicleta'),
(5, 'Otro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`uid`, `username`, `password`, `email`, `name`) VALUES
(2, 'Dani', 'db96f9a4e73f39c88edd56be2cbd90b2d9aaaaf12e3440ca53d5dc2bb10af29f', 'rugelin@gmail.com', 'DanielRuge'),
(3, 'Migue', '087f097d43a1c2abd53601b25e9f1be2f673c60b444d2892bd465ed021b63d05', 'migue.el@gmail.com', 'Miguel Galindo'),
(4, 'fcardila', '4b6f9c8113bb89168d19f456dda7993994d2e673cfe725f157e09e4a514afb6c', 'freddycardila@gmail.com', 'Freddy Ardila'),
(5, 'jcsalcedo', 'a5cee29fc65db34be9dc799658434c834500c8e907eb447c94fa2ba3d5f876ce', 'jcsalcedo@gmail.com', 'Juan Carlos Salcedo'),
(6, 'alzate', '016010cdcd49d5a9b4dbfea2574a86f805039dff0d7c1a5154a5257ba18d352d', 'alzateelneris@gmail.com', 'Alejandro Alzate ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `Id` int(255) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `clave` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`Id`, `nombre`, `clave`) VALUES
(4, 'Daniel Ruge', '$2y$10$S6pBblA5VTUhQeA5pW/5zOtpWPr39ag5O./fzxlG9iLZ0WOFeET0O'),
(10, 'SuperUsuario', '$2y$10$RNv1AGhwmjgpnPj4pIzepe67Bxb.bMdRJJUduf/rz9aizrMxtRrA2'),
(11, 'Miguel', '$2y$10$9NU1CNFrbbWu9XY6irqkUOlA6ejKSXapol8b.4CzRW2mynRmz46vO'),
(12, 'Juan Carlos Salcedo Barreto', '$2y$10$Oq4eslnPJWBO8kXTpx29a.BlFRrIkUoDnz4n8XgizU6evHsV/jhYO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculos`
--

CREATE TABLE `vehiculos` (
  `IdVehiculoCliente` int(11) NOT NULL,
  `TipoV` varchar(100) NOT NULL,
  `Placas` varchar(20) DEFAULT NULL,
  `Marca` varchar(30) DEFAULT NULL,
  `Referencia` varchar(30) DEFAULT NULL,
  `Color` varchar(30) DEFAULT NULL,
  `Modelo` varchar(30) DEFAULT NULL,
  `Descripcion` varchar(100) DEFAULT NULL,
  `NombreCliente` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `vehiculos`
--

INSERT INTO `vehiculos` (`IdVehiculoCliente`, `TipoV`, `Placas`, `Marca`, `Referencia`, `Color`, `Modelo`, `Descripcion`, `NombreCliente`) VALUES
(4, 'Motocicleta', 'RTY678', 'MAZDA', 'Carrick', 'verde', '1990', 'Carro ', 'EFREN CAMILO SUESCA TORRES '),
(5, 'Automovil', 'BFB689', 'Audi', 'Audaz', 'Rojo', '2018', 'Sedan', 'PONTIFICIA UNIVERSIDAD JAVERIANA -'),
(6, 'Automovil', 'FGT525', 'Ford', 'T', 'negro', '1921', 'clasico sin rayones', 'EFREN CAMILO SUESCA TORRES '),
(7, 'Automovil', 'SER459', 'CHEVROLET', 'CROWN', 'AZUL Y VERDE', '1920', 'RAYADO', 'PONTIFICIA UNIVERSIDAD JAVERIANA -'),
(8, 'Motocicleta', 'BXG36', 'AKT', '125 CC', 'NEGRO', '2008', 'RAYADA SIN PARRILLA', 'ALMACENES EXITO  S.A');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cargos`
--
ALTER TABLE `cargos`
  ADD PRIMARY KEY (`id_cargo`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`IdCliente`);

--
-- Indices de la tabla `convenios`
--
ALTER TABLE `convenios`
  ADD PRIMARY KEY (`IdConvenio`);

--
-- Indices de la tabla `disponibilidad`
--
ALTER TABLE `disponibilidad`
  ADD PRIMARY KEY (`IdLugar`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`IdEmpleado`);

--
-- Indices de la tabla `ingresos`
--
ALTER TABLE `ingresos`
  ADD PRIMARY KEY (`IdControlIngreso`);

--
-- Indices de la tabla `tiempo`
--
ALTER TABLE `tiempo`
  ADD PRIMARY KEY (`IdControlTiempo`);

--
-- Indices de la tabla `tipo_de_documento`
--
ALTER TABLE `tipo_de_documento`
  ADD PRIMARY KEY (`id_tipo`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indices de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD PRIMARY KEY (`IdVehiculoCliente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `IdCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `convenios`
--
ALTER TABLE `convenios`
  MODIFY `IdConvenio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `IdEmpleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `ingresos`
--
ALTER TABLE `ingresos`
  MODIFY `IdControlIngreso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tiempo`
--
ALTER TABLE `tiempo`
  MODIFY `IdControlTiempo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `tipo_de_documento`
--
ALTER TABLE `tipo_de_documento`
  MODIFY `id_tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  MODIFY `IdVehiculoCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
