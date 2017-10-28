-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-10-2017 a las 02:19:56
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `incloudt`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_empresa`
--

CREATE TABLE `datos_empresa` (
  `codEmpresa` int(11) NOT NULL,
  `razonSocial` varchar(200) NOT NULL,
  `limiteUsuarios` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `datos_empresa`
--

INSERT INTO `datos_empresa` (`codEmpresa`, `razonSocial`, `limiteUsuarios`) VALUES
(1, 'INCLOUDT SA', 3),
(2, 'Cre art SA', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `codEmpresa` int(11) NOT NULL,
  `nombreEmpresa` varchar(500) NOT NULL,
  `identificadorEmpresa` varchar(30) NOT NULL,
  `estadoRegistro` varchar(1) NOT NULL COMMENT 'S:Activo/N:No Activo/B:Bloqueado',
  `fechaInsercion` datetime NOT NULL,
  `usuarioInsercion` varchar(30) NOT NULL,
  `fechaModificacion` datetime DEFAULT NULL,
  `usuarioModificacion` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`codEmpresa`, `nombreEmpresa`, `identificadorEmpresa`, `estadoRegistro`, `fechaInsercion`, `usuarioInsercion`, `fechaModificacion`, `usuarioModificacion`) VALUES
(1, 'INCLOUDT', '1ncl0udt', 'S', '2017-10-26 00:00:00', 'JANO', '0000-00-00 00:00:00', ''),
(2, 'Cre art', 'cre0art', 'S', '2017-10-27 00:00:00', 'jano', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa_sistema`
--

CREATE TABLE `empresa_sistema` (
  `codEmpresa` int(11) NOT NULL,
  `codSistema` int(11) NOT NULL,
  `estadoRegistro` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `errores_sistema`
--

CREATE TABLE `errores_sistema` (
  `codError` int(11) NOT NULL,
  `codUsuario` int(11) NOT NULL,
  `codEmpresa` int(11) NOT NULL,
  `descripcionError` varchar(500) NOT NULL COMMENT 'Descripcion del error',
  `claseError` varchar(200) NOT NULL COMMENT 'clase y metoido donde ocurrio el error',
  `fechaInsercion` datetime NOT NULL COMMENT 'fecha y hora donde ocurrio el error'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parametros_generales`
--

CREATE TABLE `parametros_generales` (
  `codParametro` int(11) NOT NULL,
  `codEmpresa` int(11) NOT NULL,
  `identificadorParametro` varchar(100) NOT NULL,
  `descipcionParametro` varchar(200) DEFAULT NULL,
  `valorParametro` varchar(200) DEFAULT NULL,
  `estadoRegistro` varchar(1) NOT NULL,
  `fechaInsercion` datetime NOT NULL,
  `usuarioInsercion` varchar(30) NOT NULL,
  `fechaModificacion` datetime DEFAULT NULL,
  `usuarioModificacion` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `parametros_generales`
--

INSERT INTO `parametros_generales` (`codParametro`, `codEmpresa`, `identificadorParametro`, `descipcionParametro`, `valorParametro`, `estadoRegistro`, `fechaInsercion`, `usuarioInsercion`, `fechaModificacion`, `usuarioModificacion`) VALUES
(1, 1, 'TIME_OUT_SESSION', 'Tiempo limite de Sesion Activa', '5', 'S', '2017-07-05 00:00:00', '1', NULL, NULL),
(2, 1, 'LLAVE_HASH', 'Llave de encriptacion Hash para datos Sensibles', 'VmFtb3NfcG9yX21hc19wdWxwaW4=', 'S', '2017-07-05 00:00:00', '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona_usuario`
--

CREATE TABLE `persona_usuario` (
  `codPersonaUsuario` int(11) NOT NULL,
  `nombresPersona` varchar(500) NOT NULL,
  `ApellidosPersona` varchar(500) NOT NULL,
  `numeroDocumento` varchar(25) NOT NULL,
  `numeroCelular` varchar(30) DEFAULT NULL,
  `numeroAnexo` varchar(30) DEFAULT NULL,
  `estadoRegistro` varchar(1) NOT NULL,
  `fechaInsercion` datetime NOT NULL,
  `usuarioInsercion` varchar(30) NOT NULL,
  `fechaModificacion` datetime DEFAULT NULL,
  `usuarioModificacion` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `persona_usuario`
--

INSERT INTO `persona_usuario` (`codPersonaUsuario`, `nombresPersona`, `ApellidosPersona`, `numeroDocumento`, `numeroCelular`, `numeroAnexo`, `estadoRegistro`, `fechaInsercion`, `usuarioInsercion`, `fechaModificacion`, `usuarioModificacion`) VALUES
(1, 'Alejandro Cesar', 'Nuñez Yupanqui', '44833065', '964713313', '5418', 's', '2017-10-27 00:00:00', '', NULL, NULL),
(2, 'Nelson Steve', 'Rojas vilca', '77777777', '999999999', '1111', 'S', '2017-10-27 00:00:00', 'jano', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sistema`
--

CREATE TABLE `sistema` (
  `codSistema` int(11) NOT NULL,
  `etiquetaSistema` varchar(300) DEFAULT NULL,
  `urlSistema` varchar(300) DEFAULT NULL,
  `urlIcono` varchar(300) DEFAULT NULL,
  `estadoRegistro` varchar(1) DEFAULT NULL,
  `fechaInsercion` datetime DEFAULT NULL,
  `usuarioInsercion` varchar(30) DEFAULT NULL,
  `fechaModificacion` datetime DEFAULT NULL,
  `usuarioModificacion` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `codUsuario` int(11) NOT NULL,
  `codEmpresa` int(11) NOT NULL,
  `codPersonaUsuario` int(11) NOT NULL,
  `nombreUsuario` varchar(200) NOT NULL,
  `passwordUsuario` varchar(200) NOT NULL,
  `cantidadIntentos` int(11) NOT NULL,
  `indicadorUsuarioAdministrador` varchar(1) NOT NULL,
  `estadoRegistro` varchar(1) NOT NULL COMMENT 'S:Vigente/N:No Vigente/Z:Super Admin',
  `fechaInsercion` datetime NOT NULL,
  `usuarioInsercion` varchar(30) NOT NULL,
  `fechaModificacion` datetime DEFAULT NULL,
  `usuarioModificacion` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`codUsuario`, `codEmpresa`, `codPersonaUsuario`, `nombreUsuario`, `passwordUsuario`, `cantidadIntentos`, `indicadorUsuarioAdministrador`, `estadoRegistro`, `fechaInsercion`, `usuarioInsercion`, `fechaModificacion`, `usuarioModificacion`) VALUES
(1, 1, 1, 'acnunez', '$2y$12$Vm1GdGIzTmZjRzl5WDIxa.2gQYe0cMPidgMxR7sEAYU17oD2RZHte', 0, 'Z', 'S', '2017-10-26 00:00:00', 'jano', NULL, NULL),
(2, 2, 2, 'nrojas', '$2y$12$Vm1GdGIzTmZjRzl5WDIxa.2gQYe0cMPidgMxR7sEAYU17oD2RZHte', 0, 'S', 'S', '2017-10-27 00:00:00', 'jano', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_sistema`
--

CREATE TABLE `usuario_sistema` (
  `codUsuario` int(11) NOT NULL,
  `codSistema` int(11) NOT NULL,
  `estadoRegistro` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `datos_empresa`
--
ALTER TABLE `datos_empresa`
  ADD PRIMARY KEY (`codEmpresa`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`codEmpresa`);

--
-- Indices de la tabla `empresa_sistema`
--
ALTER TABLE `empresa_sistema`
  ADD PRIMARY KEY (`codEmpresa`,`codSistema`),
  ADD KEY `fk_empresa_sistema_sistema1_idx` (`codSistema`);

--
-- Indices de la tabla `errores_sistema`
--
ALTER TABLE `errores_sistema`
  ADD PRIMARY KEY (`codError`),
  ADD KEY `fk_errores_sistema_usuario1_idx` (`codUsuario`),
  ADD KEY `fk_errores_sistema_empresa1_idx` (`codEmpresa`);

--
-- Indices de la tabla `parametros_generales`
--
ALTER TABLE `parametros_generales`
  ADD PRIMARY KEY (`codParametro`),
  ADD KEY `fk_parametros_generales_empresa1_idx1` (`codEmpresa`);

--
-- Indices de la tabla `persona_usuario`
--
ALTER TABLE `persona_usuario`
  ADD PRIMARY KEY (`codPersonaUsuario`);

--
-- Indices de la tabla `sistema`
--
ALTER TABLE `sistema`
  ADD PRIMARY KEY (`codSistema`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`codUsuario`),
  ADD UNIQUE KEY `nombre_usuario_UNIQUE` (`nombreUsuario`),
  ADD UNIQUE KEY `cod_usuario_UNIQUE` (`codUsuario`),
  ADD KEY `fk_usuario_empresa1_idx1` (`codEmpresa`),
  ADD KEY `fk_usuario_PersonaUsuario1_idx` (`codPersonaUsuario`);

--
-- Indices de la tabla `usuario_sistema`
--
ALTER TABLE `usuario_sistema`
  ADD PRIMARY KEY (`codUsuario`,`codSistema`),
  ADD KEY `fk_usuario_sistema_sistema1_idx` (`codSistema`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `codEmpresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `errores_sistema`
--
ALTER TABLE `errores_sistema`
  MODIFY `codError` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `parametros_generales`
--
ALTER TABLE `parametros_generales`
  MODIFY `codParametro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `persona_usuario`
--
ALTER TABLE `persona_usuario`
  MODIFY `codPersonaUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `sistema`
--
ALTER TABLE `sistema`
  MODIFY `codSistema` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `codUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `datos_empresa`
--
ALTER TABLE `datos_empresa`
  ADD CONSTRAINT `fk_datos_empresa_empresa1` FOREIGN KEY (`codEmpresa`) REFERENCES `empresa` (`codEmpresa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `empresa_sistema`
--
ALTER TABLE `empresa_sistema`
  ADD CONSTRAINT `fk_empresa_sistema_empresa1` FOREIGN KEY (`codEmpresa`) REFERENCES `empresa` (`codEmpresa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_empresa_sistema_sistema1` FOREIGN KEY (`codSistema`) REFERENCES `sistema` (`codSistema`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `errores_sistema`
--
ALTER TABLE `errores_sistema`
  ADD CONSTRAINT `fk_errores_sistema_empresa1` FOREIGN KEY (`codEmpresa`) REFERENCES `empresa` (`codEmpresa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_errores_sistema_usuario1` FOREIGN KEY (`codUsuario`) REFERENCES `usuario` (`codUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `parametros_generales`
--
ALTER TABLE `parametros_generales`
  ADD CONSTRAINT `fk_parametros_generales_empresa1` FOREIGN KEY (`codEmpresa`) REFERENCES `empresa` (`codEmpresa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_PersonaUsuario1` FOREIGN KEY (`codPersonaUsuario`) REFERENCES `persona_usuario` (`codPersonaUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuario_empresa1` FOREIGN KEY (`codEmpresa`) REFERENCES `empresa` (`codEmpresa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario_sistema`
--
ALTER TABLE `usuario_sistema`
  ADD CONSTRAINT `fk_usuario_sistema_sistema1` FOREIGN KEY (`codSistema`) REFERENCES `sistema` (`codSistema`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuario_sistema_usuario1` FOREIGN KEY (`codUsuario`) REFERENCES `usuario` (`codUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
