-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-10-2017 a las 02:07:09
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

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`cchcorre`@`localhost` PROCEDURE `prc_actualizar_estado_usuario` (IN `PI_usuario` INT, IN `PI_estadoRegistro` VARCHAR(1), IN `PI_empresa` INT, OUT `PO_error` VARCHAR(200))  BEGIN
	declare V_descripcionError varchar(500);
	DECLARE V_respuestaError varchar(200); 
	
	DECLARE exit handler for sqlexception
	BEGIN
		ROLLBACK;
        
        START TRANSACTION;
        SET PO_error = 'error';

        call prc_registrar_error(concat('Error de tipo exception al ',V_descripcionError),'prc_actualizar_estado_usuario',PI_usuario,V_respuestaError);
        
        COMMIT;
	END;
    
    DECLARE exit handler for sqlwarning
	BEGIN
		ROLLBACK;
        
        START TRANSACTION;
        SET PO_error = 'error';

        call prc_registrar_error(concat('Error de tipo sqlwarning al ',V_descripcionError),'prc_actualizar_estado_usuario',PI_usuario,V_respuestaError);
        
        COMMIT;
	END;
    
	set autocommit = 0;

    START TRANSACTION;


		set V_descripcionError='Actualizar estado de usuario';
        
		update usuario
           set estadoRegistro = PI_estadoRegistro,
               fechaModificacion=now(),
               usuarioModificacion=PI_usuario
         where codUsuario = PI_usuario;

		set PO_error = '000';
	
    COMMIT;
    
	set autocommit = 1;

END$$

CREATE DEFINER=`cchcorre`@`localhost` PROCEDURE `prc_actualizar_intentos_usuario` (IN `PI_usuario` INT, IN `PI_intentos` INT, IN `PI_empresa` INT, OUT `PO_error` VARCHAR(200))  BEGIN
	declare V_descripcionError varchar(500);
    declare V_intentos int;
    declare V_respuestaError varchar(200);

	DECLARE exit handler for sqlexception
	BEGIN
		ROLLBACK;
        
        START TRANSACTION;
        SET PO_error = 'error';

		call prc_registrar_error(concat('Error de tipo exception al ',V_descripcionError),'prc_actualizar_estado_usuario',PI_usuario,V_respuestaError);
        
        COMMIT;
	END;
    
    DECLARE exit handler for sqlwarning
	BEGIN
		ROLLBACK;
        
        START TRANSACTION;
        SET PO_error = 'error';

		call prc_registrar_error(concat('Error de tipo sqlwarning al ',V_descripcionError),'prc_actualizar_estado_usuario',PI_usuario,V_respuestaError);
        
        COMMIT;
	END;
	set autocommit = 0;

    START TRANSACTION;

		set V_descripcionError='Actualizar intentos de usuario';
        if PI_intentos = 0 then
        	update usuario
			   set cantidadIntentos = 0,
				   fechaModificacion=now(),
				   usuarioModificacion=PI_usuario
			 where codUsuario = PI_usuario;

        else
			set V_intentos = 0;            
            
            select cantidadIntentos 
              into V_intentos 
              from usuario
             where codUsuario = PI_usuario;
             
            if V_intentos <= 2 then
				update usuario
				   set cantidadIntentos = ifnull(cantidadIntentos,0) + 1,
					   fechaModificacion=now(),
					   usuarioModificacion=PI_usuario
				 where codUsuario = PI_usuario;
                 
                 select cantidadIntentos 
				   into V_intentos 
				   from usuario
				  where codUsuario = PI_usuario;
            end if;

            if V_intentos>=3 then
				call prc_actualizar_estado_usuario(PI_usuario,'B',PI_empresa,V_respuestaError);
            end if;
		end if;
        
		set PO_error = '000';
		
    COMMIT;
    
	set autocommit = 1;
END$$

CREATE DEFINER=`cchcorre`@`localhost` PROCEDURE `prc_registrar_error` (IN `PI_descrionError` VARCHAR(500), IN `PI_objetoOcurrencia` VARCHAR(200), IN `PI_usuario` INT, OUT `PO_error` VARCHAR(200))  BEGIN
	declare V_codUsuario int;

    SET autocommit = 0;
    START TRANSACTION;

	if PI_usuario = 0 then
		set V_codUsuario = null;
	else
		set V_codUsuario = PI_usuario;
	end if;

	insert into errores_sistema(descripcionError,claseError,fechaInsercion,codUsuario)
	values(PI_descrionError,PI_objetoOcurrencia,now(),V_codUsuario);

	set PO_error = '000';
	
    COMMIT;
    set autocommit = 1;
END$$

CREATE DEFINER=`cchcorre`@`localhost` PROCEDURE `prc_registrar_token` (IN `PI_usuarioGenerado` VARCHAR(200), IN `PI_estadoRegistro` VARCHAR(1), IN `PI_usuario` INT, IN `PI_empresa` INT, OUT `PO_error` VARCHAR(200))  BEGIN
	declare V_descripcionError varchar(200);
    declare V_ultimoRegistroToken int;
    declare V_token varchar(200);
    declare V_codUsuario int;
    declare V_respuestaError varchar(200);
    declare V_correlativo int;

	DECLARE exit handler for sqlexception
	BEGIN
		ROLLBACK;
        
        START TRANSACTION;
        SET PO_error = 'error';
        
        if PI_usuario = 0 then
			set V_codUsuario = null;
		else
			set V_codUsuario = PI_usuario;
        end if;
        
        call prc_registrar_error(concat('Error de tipo exception al ',V_descripcionError),'prc_registrar_token',V_codUsuario,V_respuestaError);
        
        COMMIT;
        set autocommit = 1;
	END;
    
    DECLARE exit handler for sqlwarning
	BEGIN
		ROLLBACK;
        
        START TRANSACTION;
        SET PO_error = 'error';
        
        if PI_usuario = 0 then
			set V_codUsuario = null;
		else
			set V_codUsuario = PI_usuario;
        end if;
        
        call prc_registrar_error(concat('Error de tipo sqlwarning al ',V_descripcionError),'prc_registrar_token',V_codUsuario,V_respuestaError);
        
        COMMIT;
        set autocommit = 1;
	END;
    set V_descripcionError='';
    
	set autocommit = 0;
    
    START TRANSACTION;

	if PI_estadoRegistro = 'S' then
		set V_descripcionError='Insertar token Usuario';
		
        select ifnull(max(correlativo),0)+1 into V_ultimoRegistroToken from token_usuario;  
        
        set V_token = concat(cast(V_ultimoRegistroToken as char),PI_usuarioGenerado);
        
        insert into token_usuario(valorToken,estadoRegistro,fechaInsercion,fechaUltMov,usuario,codEmpresa)
		values(V_token,PI_estadoRegistro,now(),now(),PI_usuarioGenerado,PI_empresa);
	elseif PI_estadoRegistro = 'N' then
		set V_descripcionError='Actualizar estado token Usuario';
        
        SELECT correlativo
          into V_correlativo
		  from token_usuario
		 where valorToken = PI_usuarioGenerado
         and estadoRegistro = 'S';
        
		update token_usuario
		set estadoRegistro = PI_estadoRegistro
		where correlativo = V_correlativo;
        
        set V_token = '000';
	else
		set V_descripcionError='Actualizar actividad del token Usuario';
        
        SELECT correlativo
          into V_correlativo
		  from token_usuario
		 where valorToken = PI_usuarioGenerado;
        
		update token_usuario
		set fechaUltMov = now()
		where correlativo = V_correlativo;
        
        set V_token = '000';
	end if;

	set PO_error = V_token;
	
    COMMIT;
    set autocommit = 1;
END$$

CREATE DEFINER=`cchcorre`@`localhost` PROCEDURE `prc_validar_token` (IN `P_codToken` VARCHAR(200), IN `P_codUsuario` INT, OUT `PO_validacion` VARCHAR(200))  BEGIN
DECLARE V_cantidad int;
DECLARE V_fecha1 DATETIME;
declare V_diferencia_minutos int;
declare V_descripcionError varchar(500);
declare V_tiempoSesion int;
declare V_resultadoActualizarToken varchar(200);
declare V_respuestaError varchar(200);
declare V_codUsuario int;

	DECLARE exit handler for sqlexception
	BEGIN
		ROLLBACK;

        START TRANSACTION;
        SET PO_validacion = 'error';


        if P_codUsuario=0 then
			set V_codUsuario = null;
        else
			set V_codUsuario = P_codUsuario;
        end if;

        call prc_registrar_error(concat('Error de tipo exception al validar Token'),'prc_validar_token',V_codUsuario,V_respuestaError);

        COMMIT;
	END;

    DECLARE exit handler for sqlwarning
	BEGIN
		ROLLBACK;

        START TRANSACTION;
        SET PO_validacion = 'error';

        if P_codUsuario=0 then
			set V_codUsuario = null;
        else
			set V_codUsuario = P_codUsuario;
        end if;

        call prc_registrar_error(concat('Error de tipo sqlwarning al validar Token'),'prc_validar_token',V_codUsuario,V_respuestaError);

        COMMIT;
	END;


set autocommit = 0;

START TRANSACTION;
set PO_validacion = 'S';

SELECT
    COUNT(correlativo)
INTO V_cantidad
FROM
    token_usuario
WHERE
    valorToken = P_codToken
        AND estadoRegistro = 'N';

if V_cantidad = 0 then
	SELECT
		COUNT(correlativo)
	INTO V_cantidad FROM
		token_usuario
	WHERE
		valorToken = P_codToken
			AND estadoRegistro = 'S';

	if V_cantidad = 1 then
		SELECT
			fechaUltMov
		INTO V_fecha1 FROM
			token_usuario
		WHERE
			valorToken = P_codToken
				AND estadoRegistro = 'S';

		select cast(valorParametro AS UNSIGNED)
          into V_tiempoSesion
          from parametros_generales
		 where identificadorParametro = 'TIME_OUT_SESSION';

        set V_diferencia_minutos = TIMESTAMPDIFF(MINUTE, V_fecha1, now());

        if V_diferencia_minutos >= V_tiempoSesion then
			call prc_registrar_token(P_codToken,'N',P_codUsuario,0,V_resultadoActualizarToken);

            if V_resultadoActualizarToken = 'error' then
                call prc_registrar_error('Error al actualizar estado del token','prc_validar_token',P_codUsuario,V_respuestaError);
            end if;

            set PO_validacion = 'N';
        else
			call prc_registrar_token(P_codToken,'R',P_codUsuario,0,V_resultadoActualizarToken);

            if V_resultadoActualizarToken = 'error' then
                call prc_registrar_error('Error al actualizar fecha y hora de ultima actualizacion del token','prc_validar_token',P_codUsuario,V_respuestaError);

			end if;

            set PO_validacion = 'S';

        end if;
    else
		set PO_validacion = 'N';
    end if;
else
	set PO_validacion = 'N';
end if;

COMMIT;
set autocommit = 1;

END$$

CREATE DEFINER=`cchcorre`@`localhost` PROCEDURE `prc_validar_usuario_password` (IN `P_usuario` VARCHAR(200), IN `PI_numeroToken` VARCHAR(200), OUT `PO_validacion` VARCHAR(200), OUT `PO_codUsuario` INT, OUT `PO_password` VARCHAR(200), OUT `PO_codEmpresa` INT)  BEGIN
DECLARE V_cantidad int;
declare V_codEmpresa int;
declare V_codUsuario int;
declare V_password varchar(200);
declare V_descripcionError varchar(500);
declare V_validacionToken varchar(200);
DECLARE V_respuestaError varchar(200); 

	DECLARE exit handler for sqlexception
	BEGIN
		ROLLBACK;
        
        START TRANSACTION;
        SET PO_validacion = 'error';
        
        call prc_registrar_error(concat('Error de tipo exception al validar Usuario: ',P_usuario),'prc_validar_usuario_password',null,V_respuestaError);
        COMMIT;
	END;
    
    DECLARE exit handler for sqlwarning
	BEGIN
        ROLLBACK;
        
        START TRANSACTION;
        SET PO_validacion = 'error';
        
        call prc_registrar_error(concat('Error de tipo Sqlwarning al validar Usuario: ',P_usuario),'prc_validar_usuario_password',null,V_respuestaError);
        COMMIT;
	END;


set autocommit = 0;
    
START TRANSACTION;
set V_codEmpresa = 0;
set V_validacionToken = 'S';
set V_cantidad = 0;

select count(*) 
  into V_cantidad
  from usuario
 where nombreUsuario = P_usuario;
if V_cantidad = 1 then
	select codEmpresa
	  into V_codEmpresa
	  from usuario
	 where nombreUsuario = P_usuario;

	set PO_codEmpresa = V_codEmpresa;
	set V_cantidad = 0;

	select count(*) 
	  into V_cantidad
	  from usuario
	 where nombreUsuario = P_usuario
	   and codEmpresa = V_codEmpresa
       and estadoRegistro = 'S';
	   
	if V_cantidad = 1 then
		select codUsuario,passwordUsuario
		  into V_codUsuario,V_password
		  from usuario
		 where nombreUsuario = P_usuario
		   and codEmpresa = V_codEmpresa;
		
		call prc_validar_token(PI_numeroToken,V_codUsuario,V_validacionToken);
		
		if V_validacionToken = 'N' or V_validacionToken = 'error' then
			call prc_registrar_error('Error al validar Token','prc_validar_usuario_password',V_codUsuario,PO_validacion);
            set PO_validacion = 'error';
		else
			set PO_validacion = '000';
			set PO_password = V_password;
			set PO_codUsuario = V_codUsuario;
            set autocommit = 1;
		end if;
	else
		call prc_registrar_error('Usuario Bloqueado y/o No Vigente','prc_validar_usuario_password',null,PO_validacion);
    
		set PO_password = '';
		set PO_codUsuario = 0;
		set PO_validacion = 'error';
	end if;
else
	call prc_registrar_error('Usuario No Encontrado','prc_validar_usuario_password',null,PO_validacion);
	
    set autocommit = 1;
    set PO_password = '';
	set PO_codUsuario = 0;
    set PO_codEmpresa = 0;
end if;

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_empresa`
--

CREATE TABLE `datos_empresa` (
  `codEmpresa` int(11) NOT NULL,
  `razonSocial` varchar(200) NOT NULL,
  `limiteUsuarios` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `codEmpresa` int(11) NOT NULL,
  `nombreEmpresa` varchar(500) NOT NULL,
  `estadoRegistro` varchar(1) NOT NULL COMMENT 'S:Activo/N:No Activo/B:Bloqueado',
  `fechaInsercion` datetime NOT NULL,
  `usuarioInsercion` int(11) NOT NULL,
  `fechaModificacion` datetime DEFAULT NULL,
  `usuarioModificacion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `usuarioInsercion` int(11) NOT NULL,
  `fechaModificacion` datetime DEFAULT NULL,
  `usuarioModificacion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `parametros_generales`
--

INSERT INTO `parametros_generales` (`codParametro`, `codEmpresa`, `identificadorParametro`, `descipcionParametro`, `valorParametro`, `estadoRegistro`, `fechaInsercion`, `usuarioInsercion`, `fechaModificacion`, `usuarioModificacion`) VALUES
(1, 0, 'TIME_OUT_SESSION', 'Tiempo limite de Sesion Activa', '5', 'S', '2017-07-05 00:00:00', 1, NULL, NULL),
(2, 0, 'LLAVE_HASH', 'Llave de encriptacion Hash para datos Sensibles', 'VmFtb3NfcG9yX21hc19wdWxwaW4=', 'S', '2017-07-05 00:00:00', 1, NULL, NULL);

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
  `usuarioInsercion` int(11) DEFAULT NULL,
  `fechaModificacion` datetime DEFAULT NULL,
  `usuarioModificacion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `codUsuario` int(11) NOT NULL,
  `codEmpresa` int(11) NOT NULL,
  `nombreUsuario` varchar(200) NOT NULL,
  `passwordUsuario` varchar(200) NOT NULL,
  `cantidadIntentos` int(11) NOT NULL,
  `indicadorUsuarioAdministrador` varchar(1) NOT NULL,
  `estadoRegistro` varchar(1) NOT NULL COMMENT 'S:Vigente/N:No Vigente/Z:Super Admin',
  `fechaInsercion` datetime NOT NULL,
  `usuarioInsercion` int(11) NOT NULL,
  `fechaModificacion` datetime DEFAULT NULL,
  `usuarioModificacion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_sistema`
--

CREATE TABLE `usuario_sistema` (
  `codUsuario` int(11) NOT NULL,
  `codEmpresa` int(11) NOT NULL,
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
  ADD KEY `fk_errores_sistema_usuario1_idx` (`codUsuario`,`codEmpresa`);

--
-- Indices de la tabla `parametros_generales`
--
ALTER TABLE `parametros_generales`
  ADD PRIMARY KEY (`codParametro`),
  ADD KEY `fk_parametros_generales_empresa1_idx1` (`codEmpresa`);

--
-- Indices de la tabla `sistema`
--
ALTER TABLE `sistema`
  ADD PRIMARY KEY (`codSistema`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`codUsuario`,`codEmpresa`),
  ADD UNIQUE KEY `nombre_usuario_UNIQUE` (`nombreUsuario`),
  ADD UNIQUE KEY `cod_usuario_UNIQUE` (`codUsuario`),
  ADD KEY `fk_usuario_empresa1_idx` (`codEmpresa`);

--
-- Indices de la tabla `usuario_sistema`
--
ALTER TABLE `usuario_sistema`
  ADD PRIMARY KEY (`codUsuario`,`codEmpresa`,`codSistema`),
  ADD KEY `fk_usuario_sistema_sistema1_idx` (`codSistema`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `codEmpresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `errores_sistema`
--
ALTER TABLE `errores_sistema`
  MODIFY `codError` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=331;
--
-- AUTO_INCREMENT de la tabla `parametros_generales`
--
ALTER TABLE `parametros_generales`
  MODIFY `codParametro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `sistema`
--
ALTER TABLE `sistema`
  MODIFY `codSistema` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
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
  ADD CONSTRAINT `fk_errores_sistema_usuario1` FOREIGN KEY (`codUsuario`,`codEmpresa`) REFERENCES `usuario` (`codUsuario`, `codEmpresa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `parametros_generales`
--
ALTER TABLE `parametros_generales`
  ADD CONSTRAINT `fk_parametros_generales_empresa1` FOREIGN KEY (`codEmpresa`) REFERENCES `empresa` (`codEmpresa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario_sistema`
--
ALTER TABLE `usuario_sistema`
  ADD CONSTRAINT `fk_usuario_sistema_sistema1` FOREIGN KEY (`codSistema`) REFERENCES `sistema` (`codSistema`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuario_sistema_usuario1` FOREIGN KEY (`codUsuario`,`codEmpresa`) REFERENCES `usuario` (`codUsuario`, `codEmpresa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

DELIMITER $$
--
-- Eventos
--
CREATE DEFINER=`cchcorre`@`localhost` EVENT `evn_caducar_token` ON SCHEDULE EVERY 1 MINUTE STARTS '2017-08-02 10:14:42' ON COMPLETION NOT PRESERVE ENABLE DO BEGIN
		declare V_tiempoSesion int;
	
		select cast(valorParametro as unsigned) 
          into V_tiempoSesion 
          from parametros_generales 
		 where identificadorParametro = 'TIME_OUT_SESSION';
    
		update token_usuario
        set estadoRegistro = 'N'
        where TIMESTAMPDIFF(MINUTE, fechaUltMov, now())>=V_tiempoSesion;
	    
	END$$

DELIMITER ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
