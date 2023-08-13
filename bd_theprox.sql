-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-07-2023 a las 00:36:55
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
-- Base de datos: `bd_theprox`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `idAdmin` int(11) NOT NULL,
  `nomAdmin` varchar(30) DEFAULT NULL,
  `appAdmin` varchar(50) DEFAULT NULL,
  `apmAdmin` varchar(50) DEFAULT NULL,
  `dniAdmin` char(8) DEFAULT NULL,
  `codAdmin` char(6) DEFAULT NULL,
  `emaAdmin` varchar(100) DEFAULT NULL,
  `celAdmin` char(15) DEFAULT NULL,
  `sexAdmin` char(1) DEFAULT NULL COMMENT 'F:femenino ; M:masculino\r\n',
  `passAdmin` varchar(100) NOT NULL,
  `estAdmin` tinyint(2) DEFAULT NULL COMMENT '0:bloqueado 1:Activo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`idAdmin`, `nomAdmin`, `appAdmin`, `apmAdmin`, `dniAdmin`, `codAdmin`, `emaAdmin`, `celAdmin`, `sexAdmin`, `passAdmin`, `estAdmin`) VALUES
(1, 'keytel', 'pumaylle', 'ramirez', NULL, '201289', NULL, NULL, NULL, 'pIabmaWo', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivo`
--

CREATE TABLE `archivo` (
  `idArchivo` int(11) NOT NULL,
  `Titulo` varchar(100) NOT NULL,
  `Tipo` tinyint(4) DEFAULT NULL COMMENT '1: ,2:',
  `Fecha` datetime DEFAULT NULL COMMENT 'Fecha en la que se subio el archivo',
  `fPubl` date DEFAULT NULL COMMENT 'Año de publicacion ',
  `Ubicacion` varchar(100) DEFAULT NULL,
  `idAutor` int(11) DEFAULT NULL,
  `idAdmin` int(11) NOT NULL,
  `IdNivel` int(11) NOT NULL,
  `idCat` int(11) NOT NULL,
  `idAsesor` int(11) NOT NULL,
  `idCal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `archivo`
--

INSERT INTO `archivo` (`idArchivo`, `Titulo`, `Tipo`, `Fecha`, `fPubl`, `Ubicacion`, `idAutor`, `idAdmin`, `IdNivel`, `idCat`, `idAsesor`, `idCal`) VALUES
(3, 'Proyecto de Investigacion de aplicaciones Web', 1, '2023-07-11 16:32:26', '2023-07-18', 'https://books.google.com.pe/books?id=iqdulye2vWEC&lpg=PA9&ots=RM3ZVfSN-_&dq=proyecto%20de%20investig', 2, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asesor`
--

CREATE TABLE `asesor` (
  `idAsesor` int(11) NOT NULL,
  `nomAsesor` varchar(30) DEFAULT NULL,
  `apeAsesor` varchar(30) DEFAULT NULL,
  `ocupacion` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `asesor`
--

INSERT INTO `asesor` (`idAsesor`, `nomAsesor`, `apeAsesor`, `ocupacion`) VALUES
(1, 'Diwego ', 'de la cruz', 'Ing. de Sistemas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autor`
--

CREATE TABLE `autor` (
  `idAutor` int(11) NOT NULL,
  `dniAutor` char(8) DEFAULT NULL,
  `nomAutor` varchar(30) DEFAULT NULL,
  `apeAutor` varchar(30) DEFAULT NULL,
  `codAutor` char(6) DEFAULT NULL,
  `emaAutor` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `autor`
--

INSERT INTO `autor` (`idAutor`, `dniAutor`, `nomAutor`, `apeAutor`, `codAutor`, `emaAutor`) VALUES
(1, '45897621', 'Geremias', 'Galante Lu', '258963', NULL),
(2, '45231254', 'Andrea', 'Guitierres Salamanta', '201478', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificacion`
--

CREATE TABLE `calificacion` (
  `idCal` int(11) NOT NULL,
  `idUsu` int(11) DEFAULT NULL,
  `Puntuacion` tinyint(4) DEFAULT NULL,
  `Aceptacion` int(11) DEFAULT NULL COMMENT 'Porcentaaje'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `calificacion`
--

INSERT INTO `calificacion` (`idCal`, `idUsu`, `Puntuacion`, `Aceptacion`) VALUES
(1, 1, 4, 18);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrera`
--

CREATE TABLE `carrera` (
  `idCarrera` int(11) NOT NULL,
  `nomCarrera` varchar(50) NOT NULL,
  `facultad` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoría`
--

CREATE TABLE `categoría` (
  `idCat` int(11) NOT NULL,
  `nombreCat` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `categoría`
--

INSERT INTO `categoría` (`idCat`, `nombreCat`) VALUES
(1, 'Desarrollo Web'),
(2, 'Programacion General');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallesol`
--

CREATE TABLE `detallesol` (
  `idDet` int(11) NOT NULL,
  `idSol` int(11) NOT NULL,
  `idAdmin` int(11) NOT NULL,
  `EstSol` tinyint(4) NOT NULL COMMENT '1:Aprobado, 2:Desaprobado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nivel`
--

CREATE TABLE `nivel` (
  `idNivel` int(11) NOT NULL,
  `nomNivel` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `nivel`
--

INSERT INTO `nivel` (`idNivel`, `nomNivel`) VALUES
(1, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud`
--

CREATE TABLE `solicitud` (
  `idSol` int(11) NOT NULL,
  `nomSol` varchar(30) DEFAULT NULL,
  `appSol` varchar(50) DEFAULT NULL,
  `apmSol` varchar(50) DEFAULT NULL,
  `dniSol` char(8) DEFAULT NULL,
  `codSol` char(6) DEFAULT NULL,
  `emaSol` varchar(50) DEFAULT NULL,
  `celSol` char(15) DEFAULT NULL,
  `sexSol` char(2) DEFAULT NULL COMMENT 'F: femenino ; M:masculino\r\n',
  `fnacSol` date DEFAULT NULL,
  `carreraSol` varchar(50) DEFAULT NULL,
  `idCarrera` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsu` int(11) NOT NULL,
  `nomUsu` varchar(50) DEFAULT NULL,
  `appUsu` varchar(50) DEFAULT NULL,
  `apmUsu` varchar(50) DEFAULT NULL,
  `dniUsu` char(8) DEFAULT NULL,
  `codUsu` char(6) DEFAULT NULL,
  `emailUsu` varchar(100) DEFAULT NULL,
  `celUsu` char(15) DEFAULT NULL,
  `sexUsu` char(1) DEFAULT NULL COMMENT 'F:femenino, M:masculino',
  `fnacUsu` date DEFAULT NULL,
  `passUsu` varchar(50) DEFAULT NULL,
  `estUsu` tinyint(1) DEFAULT NULL COMMENT '0 inactivo, 1 activo',
  `imgUsu` varchar(150) DEFAULT NULL,
  `priUsu` tinyint(4) DEFAULT NULL COMMENT '1:Interno; 2:Externo\r\n',
  `regUsu` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsu`, `nomUsu`, `appUsu`, `apmUsu`, `dniUsu`, `codUsu`, `emailUsu`, `celUsu`, `sexUsu`, `fnacUsu`, `passUsu`, `estUsu`, `imgUsu`, `priUsu`, `regUsu`) VALUES
(1, 'keytel', 'pumaylle', 'ramirez', '12345678', '201286', 'keytel@gmail.com', '987654321', 'M', NULL, 'pIabmaWo', 1, NULL, 1, NULL),
(2, 'lucas', 'sacarias', 'martinez', '12345678', '201200', 'lucas@gmail.com', '987654321', 'M', NULL, 'pIabmaWo', 1, NULL, 2, NULL),
(3, 'test2', 'test', 'test2', '12345678', '201201', 'test@gmail.com', '987654321', 'F', NULL, 'pIabmaWo', 1, NULL, 1, NULL),
(4, 'angel', NULL, NULL, NULL, '202053', NULL, NULL, 'M', NULL, 'pIabmaWo', 1, NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_login`
--

CREATE TABLE `usuario_login` (
  `idUL` int(11) NOT NULL,
  `idUsu` int(11) NOT NULL,
  `regUL` datetime DEFAULT NULL,
  `claUL` varchar(100) NOT NULL,
  `estUL` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `usuario_login`
--

INSERT INTO `usuario_login` (`idUL`, `idUsu`, `regUL`, `claUL`, `estUL`) VALUES
(1, 1, '2023-07-12 16:57:00', 'g9rbajk3a6a', 1),
(25, 2, '2023-07-03 18:06:05', 'm31n8g@h4uu', 1),
(26, 3, '2023-07-03 18:21:49', '3v2z69l5@59', 1),
(27, 4, '2023-07-03 19:14:26', '63hs5lteg6r', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`idAdmin`);

--
-- Indices de la tabla `archivo`
--
ALTER TABLE `archivo`
  ADD PRIMARY KEY (`idArchivo`),
  ADD UNIQUE KEY `IdNivel` (`IdNivel`),
  ADD UNIQUE KEY `idCat` (`idCat`),
  ADD UNIQUE KEY `idAsesor` (`idAsesor`),
  ADD UNIQUE KEY `idCal` (`idCal`),
  ADD UNIQUE KEY `idAdmin` (`idAdmin`),
  ADD UNIQUE KEY `idAutor` (`idAutor`);

--
-- Indices de la tabla `asesor`
--
ALTER TABLE `asesor`
  ADD PRIMARY KEY (`idAsesor`);

--
-- Indices de la tabla `autor`
--
ALTER TABLE `autor`
  ADD PRIMARY KEY (`idAutor`);

--
-- Indices de la tabla `calificacion`
--
ALTER TABLE `calificacion`
  ADD PRIMARY KEY (`idCal`),
  ADD UNIQUE KEY `idUsu` (`idUsu`);

--
-- Indices de la tabla `carrera`
--
ALTER TABLE `carrera`
  ADD PRIMARY KEY (`idCarrera`);

--
-- Indices de la tabla `categoría`
--
ALTER TABLE `categoría`
  ADD PRIMARY KEY (`idCat`);

--
-- Indices de la tabla `detallesol`
--
ALTER TABLE `detallesol`
  ADD PRIMARY KEY (`idDet`),
  ADD UNIQUE KEY `idSol` (`idSol`),
  ADD UNIQUE KEY `idAdmin` (`idAdmin`);

--
-- Indices de la tabla `nivel`
--
ALTER TABLE `nivel`
  ADD PRIMARY KEY (`idNivel`);

--
-- Indices de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  ADD PRIMARY KEY (`idSol`),
  ADD UNIQUE KEY `idCarrera` (`idCarrera`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsu`);

--
-- Indices de la tabla `usuario_login`
--
ALTER TABLE `usuario_login`
  ADD PRIMARY KEY (`idUL`),
  ADD UNIQUE KEY `idUsu` (`idUsu`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `idAdmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `archivo`
--
ALTER TABLE `archivo`
  MODIFY `idArchivo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `asesor`
--
ALTER TABLE `asesor`
  MODIFY `idAsesor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `autor`
--
ALTER TABLE `autor`
  MODIFY `idAutor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `calificacion`
--
ALTER TABLE `calificacion`
  MODIFY `idCal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `carrera`
--
ALTER TABLE `carrera`
  MODIFY `idCarrera` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `categoría`
--
ALTER TABLE `categoría`
  MODIFY `idCat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `detallesol`
--
ALTER TABLE `detallesol`
  MODIFY `idDet` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `nivel`
--
ALTER TABLE `nivel`
  MODIFY `idNivel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  MODIFY `idSol` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuario_login`
--
ALTER TABLE `usuario_login`
  MODIFY `idUL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `archivo`
--
ALTER TABLE `archivo`
  ADD CONSTRAINT `archivo_ibfk_1` FOREIGN KEY (`idAutor`) REFERENCES `autor` (`idAutor`),
  ADD CONSTRAINT `archivo_ibfk_2` FOREIGN KEY (`IdNivel`) REFERENCES `nivel` (`idNivel`),
  ADD CONSTRAINT `archivo_ibfk_3` FOREIGN KEY (`idCat`) REFERENCES `categoría` (`idCat`),
  ADD CONSTRAINT `archivo_ibfk_4` FOREIGN KEY (`idCal`) REFERENCES `calificacion` (`idCal`),
  ADD CONSTRAINT `archivo_ibfk_5` FOREIGN KEY (`idAsesor`) REFERENCES `asesor` (`idAsesor`),
  ADD CONSTRAINT `archivo_ibfk_7` FOREIGN KEY (`idAdmin`) REFERENCES `administrador` (`idAdmin`);

--
-- Filtros para la tabla `calificacion`
--
ALTER TABLE `calificacion`
  ADD CONSTRAINT `calificacion_ibfk_1` FOREIGN KEY (`idUsu`) REFERENCES `usuario` (`idUsu`);

--
-- Filtros para la tabla `carrera`
--
ALTER TABLE `carrera`
  ADD CONSTRAINT `carrera_ibfk_1` FOREIGN KEY (`idCarrera`) REFERENCES `solicitud` (`idCarrera`);

--
-- Filtros para la tabla `detallesol`
--
ALTER TABLE `detallesol`
  ADD CONSTRAINT `detallesol_ibfk_1` FOREIGN KEY (`idSol`) REFERENCES `solicitud` (`idSol`),
  ADD CONSTRAINT `detallesol_ibfk_2` FOREIGN KEY (`idAdmin`) REFERENCES `administrador` (`idAdmin`);

--
-- Filtros para la tabla `usuario_login`
--
ALTER TABLE `usuario_login`
  ADD CONSTRAINT `usuario_login_ibfk_1` FOREIGN KEY (`idUsu`) REFERENCES `usuario` (`idUsu`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
