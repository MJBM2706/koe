-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-06-2021 a las 07:13:13
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `id17038902_koe`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comprobante_pago`
--

CREATE TABLE `comprobante_pago` (
  `idComprobante_Pago` int(11) NOT NULL,
  `paciente_idPaciente` int(11) NOT NULL,
  `paciente_Usuario_idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consulta_paga`
--

CREATE TABLE `consulta_paga` (
  `idConsulta_Paga` int(11) NOT NULL,
  `profesional_idProfesional` bigint(20) NOT NULL,
  `profesional_Usuario_idUsuario` bigint(20) NOT NULL,
  `comprobante_Pago_idComprobante_Pago` int(11) NOT NULL,
  `comprobante_Pago_Paciente_idPaciente` bigint(20) NOT NULL,
  `comprobante_Pago_Paciente_Usuario_idUsuario` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historia_clinica`
--

CREATE TABLE `historia_clinica` (
  `idHistoria_Clinica` bigint(20) NOT NULL,
  `paciente_idPaciente` bigint(20) NOT NULL,
  `paciente_Usuario_idUsuario` bigint(20) NOT NULL,
  `profesional_idProfesional` bigint(20) NOT NULL,
  `fecha` date NOT NULL DEFAULT current_timestamp(),
  `fuenteInformacion` text COLLATE utf8_unicode_ci NOT NULL,
  `motivoConsulta` text COLLATE utf8_unicode_ci NOT NULL,
  `historiaEnfermedadActual` text COLLATE utf8_unicode_ci NOT NULL,
  `examenMental` text COLLATE utf8_unicode_ci NOT NULL,
  `diagnostico` text COLLATE utf8_unicode_ci NOT NULL,
  `formulacionDinamica` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `pronostico` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `tratamiento` text COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE `paciente` (
  `idPaciente` bigint(20) NOT NULL,
  `usuario_idUsuario` bigint(20) NOT NULL,
  `nombre` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `apellido` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tipoDocumento` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `documentoIdentidad` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fechaNacimiento` date DEFAULT NULL,
  `departamento` varchar(125) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ciudad` varchar(125) COLLATE utf8_unicode_ci DEFAULT NULL,
  `direccion` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `celular` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contactoEmergencia` varchar(225) COLLATE utf8_unicode_ci DEFAULT NULL,
  `celularEmergencia` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`idPaciente`, `usuario_idUsuario`, `nombre`, `apellido`, `tipoDocumento`, `documentoIdentidad`, `fechaNacimiento`, `departamento`, `ciudad`, `direccion`, `celular`, `contactoEmergencia`, `celularEmergencia`) VALUES
(15, 20, 'Maria Jose', 'Botero Martínez', 'IDENT. FISCAL PARA EXT.', '1036963286', '1998-06-27', 'amazonas', 'amazonas', 'Cra 54C #66b-37', '3002427778', 'Luciana Martinez', '3002427778'),
(16, 22, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesional`
--

CREATE TABLE `profesional` (
  `idProfesional` bigint(20) NOT NULL,
  `usuario_idUsuario` bigint(20) NOT NULL,
  `nombre` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `apellido` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `tituloProfesional` varchar(125) COLLATE utf8_unicode_ci NOT NULL,
  `tarjetaProfesional` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `estadoTarjeta` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `estado` varchar(45) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` bigint(20) NOT NULL,
  `tipoUsuario` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `correo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `tipoUsuario`, `correo`, `password`) VALUES
(20, 'paciente', 'majo.botero.m.123@gmail.com', '2706'),
(21, 'admin', 'admin@admin.com', 'admin123456789'),
(22, 'paciente', 'ejemplo@ejemplo', '123456');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `voluntario`
--

CREATE TABLE `voluntario` (
  `idVoluntario` bigint(20) NOT NULL,
  `usuario_idUsuario` bigint(20) NOT NULL,
  `nombre` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `apellido` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `ocupacion` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `estadoCapacitacion` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `estado` varchar(45) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comprobante_pago`
--
ALTER TABLE `comprobante_pago`
  ADD PRIMARY KEY (`idComprobante_Pago`);

--
-- Indices de la tabla `consulta_paga`
--
ALTER TABLE `consulta_paga`
  ADD PRIMARY KEY (`idConsulta_Paga`);

--
-- Indices de la tabla `historia_clinica`
--
ALTER TABLE `historia_clinica`
  ADD PRIMARY KEY (`idHistoria_Clinica`);

--
-- Indices de la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`idPaciente`),
  ADD KEY `fk_Paciente_Usuario_idUsuario` (`usuario_idUsuario`);

--
-- Indices de la tabla `profesional`
--
ALTER TABLE `profesional`
  ADD PRIMARY KEY (`idProfesional`),
  ADD KEY `fk_Profesional_Usuario_idUsuario` (`usuario_idUsuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD UNIQUE KEY `correo` (`correo`);

--
-- Indices de la tabla `voluntario`
--
ALTER TABLE `voluntario`
  ADD PRIMARY KEY (`idVoluntario`),
  ADD KEY `fk_Voluntario_Usuario_idUsuario` (`usuario_idUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comprobante_pago`
--
ALTER TABLE `comprobante_pago`
  MODIFY `idComprobante_Pago` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `consulta_paga`
--
ALTER TABLE `consulta_paga`
  MODIFY `idConsulta_Paga` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `paciente`
--
ALTER TABLE `paciente`
  MODIFY `idPaciente` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD CONSTRAINT `fk_Paciente_Usuario_idUsuario` FOREIGN KEY (`usuario_idUsuario`) REFERENCES `usuario` (`idUsuario`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `profesional`
--
ALTER TABLE `profesional`
  ADD CONSTRAINT `fk_Profesional_Usuario_idUsuario` FOREIGN KEY (`usuario_idUsuario`) REFERENCES `usuario` (`idUsuario`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `voluntario`
--
ALTER TABLE `voluntario`
  ADD CONSTRAINT `fk_Voluntario_Usuario_idUsuario` FOREIGN KEY (`usuario_idUsuario`) REFERENCES `usuario` (`idUsuario`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
