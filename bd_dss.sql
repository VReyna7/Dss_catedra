-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 28-03-2023 a las 22:24:59
-- Versión del servidor: 8.0.31
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_dss`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE IF NOT EXISTS `cliente` (
  `DUI` varchar(10) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `telefono` varchar(9) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `contra` varchar(50) NOT NULL,
  `estado` int NOT NULL,
  PRIMARY KEY (`DUI`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`DUI`, `nombre`, `apellido`, `telefono`, `correo`, `direccion`, `contra`, `estado`) VALUES
('11345678-2', 'Valeria', 'Gonzales', '2266-9999', 'LaValeB2@gmail.com', 'San Salvador - San Salvador', '123', 2),
('11345678-6', 'Alisson', 'Escobar', '2233-4455', 'AliEscobar@gmail.com', 'Son Sonate', '123', 2),
('12345678-1', 'Victor', 'Reyna', '6666-6366', 'vicRey@gmail.com', 'La Union - La Union', '123', 2),
('12345678-2', 'Jorge', 'Moreno', '2222-2323', 'JorgeMoree@gmail.com', 'San Miguel - San Miguel', '123', 2),
('12345678-3', 'Cristian', 'Pineda', '1225-6959', 'CristianPineda@gmail.com', 'Cabañas - Cabañas', '123', 2),
('12345678-4', 'Jose', 'Morales', '2536-6352', 'JoseMora@gmail.com', 'Las palmas, chalate', '123', 2),
('12345678-5', 'Miguel', 'Sanches', '1425-9685', 'MigueSan@gmail.com', 'Chalatenango', '123', 2),
('12345678-6', 'Pedri', 'Parlamo', '2516-3629', 'PPedri@gmail.com', 'Antiguo Cuscatlan', '123', 1),
('12345678-7', 'Samanta', 'Miranda', '2569-6958', 'Sami@gmail.com', 'San Salvador -San Salvador', '123', 2),
('12345678-9', 'Manuel', 'Miranda', '5555-5555', 'manue@gmail.com', 'San Salvador - San salvador', '123', 2),
('22222', 'sadasda', 'asdasda', 'asdsad', 'asdasd', 'asdasd', 'asdasd', 0),
('22222242', 'sadasda', 'asdasda', 'asdsad', 'asdasd', 'asdasd', 'asdasd', 0),
('2222224222', 'sadasda', 'asdasda', 'asdsad', 'asdasd', 'asdasd', 'asdasd', 0),
('4444', 'sadsad', 'asda', '24242', 'sadasda', 'asdasd', 'asdas', 0),
('524242', 'asdasdasda', '2asdasd', 'asdasda', 'asdasd', 'asdasd', 'asdasda', 0),
('asdasd', 'asdasd', 'asdasdas', 'asdsad', 'asdasd', 'asdsad', 'asdsadsad', 0),
('asdasda', 'asdasdas', 'adsadasd', 'asdsad', 'asdsad', 'sadsad', 'asdasd', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cupon`
--

DROP TABLE IF EXISTS `cupon`;
CREATE TABLE IF NOT EXISTS `cupon` (
  `idCupon` char(5) NOT NULL,
  `idOferta` char(5) NOT NULL,
  `DuiCliente` varchar(10) NOT NULL,
  `estado` int NOT NULL,
  PRIMARY KEY (`idCupon`),
  KEY `idOferta` (`idOferta`),
  KEY `DuiCliente` (`DuiCliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `cupon`
--

INSERT INTO `cupon` (`idCupon`, `idOferta`, `DuiCliente`, `estado`) VALUES
('CU001', 'OF001', '11345678-2', 1),
('CU002', 'OF002', '11345678-6', 1),
('CU003', 'OF003', '12345678-2', 1),
('CU004', 'OF004', '12345678-2', 1),
('CU005', 'OF005', '12345678-3', 1),
('CU006', 'OF006', '12345678-4', 1),
('CU007', 'OF007', '12345678-5', 1),
('CU008', 'OF008', '12345678-6', 1),
('CU009', 'OF009', '12345678-7', 1),
('CU010', 'OF010', '12345678-9', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

DROP TABLE IF EXISTS `empleado`;
CREATE TABLE IF NOT EXISTS `empleado` (
  `CodigoEmpleado` char(6) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `contra` varchar(50) NOT NULL,
  `idEmpresa` char(5) NOT NULL,
  `Rol` varchar(20) NOT NULL,
  PRIMARY KEY (`CodigoEmpleado`),
  KEY `idEmpresa` (`idEmpresa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`CodigoEmpleado`, `nombre`, `apellido`, `correo`, `contra`, `idEmpresa`, `Rol`) VALUES
('EMP001', 'Jose', 'Baldivieso', 'josepBaldi@gmail.com', '123', 'EM001', 'empleado'),
('EMP002', 'Manuel', 'Miranda', 'ManuelMiranda@gmail.com', '123', 'EM002', 'empleado'),
('EMP003', 'Victor', 'Reyna', 'VictorReyna@gmail.com', '123', 'EM003', 'empleado'),
('EMP004', 'Jorge', 'Moreno', 'JorgeMore@gmail.com', '123', 'EM004', 'empleado'),
('EMP005', 'Cristian', 'Pineda', 'CristianPine@gmail.com', '123', 'EM005', 'empleado'),
('EMP006', 'Josep', 'Mangalorian', 'joseppManga@gmail.com', '123', 'EM006', 'empleado'),
('EMP007', 'Miguel', 'Baltimor', 'MigueBalti@gmail.com', '123', 'EM007', 'empleado'),
('EMP008', 'Alejandro', 'Alejandres', 'AleAles@gmail.com', '123', 'EM008', 'empleado'),
('EMP009', 'Pedro', 'Pedres', 'PP@gmail.com', '123', 'EM009', 'empleado'),
('EMP010', 'Valeria', 'Gonzales', 'LaValeBONI@gmail.com', '123', 'EM010', 'empleado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

DROP TABLE IF EXISTS `empresa`;
CREATE TABLE IF NOT EXISTS `empresa` (
  `CodigoEmpresa` char(5) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `telefono` varchar(9) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `idRubro` int NOT NULL,
  `comision` float NOT NULL,
  PRIMARY KEY (`CodigoEmpresa`),
  KEY `idRubro` (`idRubro`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`CodigoEmpresa`, `nombre`, `direccion`, `telefono`, `correo`, `idRubro`, `comision`) VALUES
('EM001', 'Restaurante Doña Rosa', '3a Avenida Norte 7 C, San Salvador', '2262-8475', 'DoniaRosa@gmail.com', 1001, 7),
('EM002', 'Gq Racing Sport', 'Blvr. Sta. Elena 20', '2535-0203', 'TallerGQ@gmail.com', 1002, 8.5),
('EM003', 'ZOOVET', 'Avenida Albert Einstein 1', '7050-9654', 'zoovet@gmail.com', 1004, 12),
('EM004', 'Tony Romas', 'Blvr. del Hipódromo 777, San Salvador', '2298-5050', 'TonyRomas@gmail.com', 1001, 5.2),
('EM005', 'Atami beach house', 'Calle Los Conacastes, poligono i, lote 1, club atami, La Libertad, El Salvador', '2296-2569', 'atamibeach@gmail.com', 1006, 15.2),
('EM006', 'El Espíritu de la Montaña', 'Conchagua', '7484-9950', 'EspiritudMontania@gmail.com', 1005, 8.9),
('EM007', 'Las Hojas Resort & Beach Club', 'alle Principal 95 Playa Las Hojas, San Pedro', '2505-2800', 'LasHojasResort@gmail.com', 1006, 9.5),
('EM008', 'El Pinabete La Montaña de Los Sueños', 'Canton las granadillas, La Palma La Palma, Chalatenango ', '0016-8000', 'pinabete@gmail.com', 1006, 8.5),
('EM009', 'Clínica Psicológica INFICON', '9 Calle Poniente Bis #4927 Colonia Escalón. Clínica Psicológica INFICON.', '', 'infisionClinic@gmail.com', 1003, 9),
('EM010', 'Talleres G2', 'Calle a San Antonio abad, pasaje Valdivieso #9-a, San Salvador San Salvador, El Salvador', '2522-4335', 'tallerg2@gmail.com', 1002, 12.5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadosofertas`
--

DROP TABLE IF EXISTS `estadosofertas`;
CREATE TABLE IF NOT EXISTS `estadosofertas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) COLLATE utf8mb4_german2_ci NOT NULL,
  `descripcion` varchar(20) COLLATE utf8mb4_german2_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_german2_ci;

--
-- Volcado de datos para la tabla `estadosofertas`
--

INSERT INTO `estadosofertas` (`id`, `nombre`, `descripcion`) VALUES
(0, 'Activo', 'El cupon se puede se'),
(1, 'Vencido', 'El cupon ha llegado '),
(2, 'Agotado', 'El cupon llego a su ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oferta`
--

DROP TABLE IF EXISTS `oferta`;
CREATE TABLE IF NOT EXISTS `oferta` (
  `CodigoOferta` char(5) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `precioRegular` float NOT NULL,
  `precioOferta` float NOT NULL,
  `fechaInicio` date NOT NULL,
  `fechaFin` date NOT NULL,
  `cantidadLimite` int NOT NULL DEFAULT '0',
  `descripcion` varchar(100) NOT NULL,
  `idEmpresa` char(5) NOT NULL,
  `fechaLimite` date NOT NULL,
  `CantidadVenta` int DEFAULT NULL,
  `estado` int NOT NULL,
  PRIMARY KEY (`CodigoOferta`),
  KEY `idEmpresa` (`idEmpresa`),
  KEY `estado` (`estado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `oferta`
--

INSERT INTO `oferta` (`CodigoOferta`, `titulo`, `precioRegular`, `precioOferta`, `fechaInicio`, `fechaFin`, `cantidadLimite`, `descripcion`, `idEmpresa`, `fechaLimite`, `CantidadVenta`, `estado`) VALUES
('OF001', 'Banquete para 5', 30.5, 19.99, '2023-02-24', '2023-02-28', 55, 'Banquete familiar para 5 personas', 'EM001', '2023-03-10', 54, 1),
('OF002', 'Cambio de aceite', 25, 15, '2023-02-24', '2023-03-10', 0, 'Cambio de aceite', 'EM002', '2023-03-31', 0, 0),
('OF003', 'Baño y corte de pelo', 32.99, 21.99, '2023-02-24', '2023-03-31', 200, 'Baño para su mascota mas corte de pelo', 'EM003', '2023-04-27', 0, 0),
('OF004', 'Banquete de RIBS para 5 personas', 65.99, 45, '2023-02-24', '2023-03-14', 80, 'Banquete de RIBS para 5 personas !!!', 'EM004', '2023-02-21', 0, 1),
('OF005', 'Day pass', 25, 10.99, '2023-02-24', '2023-03-08', 90, 'Day pass Totalmente consumible a su valor original ($25.00)', 'EM005', '2023-03-22', 0, 1),
('OF006', 'Cabaña mas kit para fogata', 125.99, 75, '2023-02-24', '2023-03-08', 25, 'Paquete que incluye estancia en cabaña para 4 personas mas un kit para fogata Incluye una glorieta', 'EM006', '2023-03-31', 0, 0),
('OF007', 'Day pass Consumible', 25, 15, '2023-02-24', '2023-03-15', 100, 'Day pass consumible a su precio original ($25.00)', 'EM007', '2023-03-31', 0, 0),
('OF008', 'Cabaña para 4 personas', 95, 45, '2023-02-24', '2023-03-16', 50, 'Cabaña para 4 personas', 'EM008', '2023-03-31', 0, 0),
('OF009', 'Terapia Psicologica', 35, 17.99, '2023-02-24', '2023-03-15', 50, 'Paga $17.99 en lugar de $35 por una sesión de Terapia Psicológica', 'EM009', '2023-03-31', 0, 0),
('OF010', 'Cambio de discos de freno', 35, 19.99, '2023-02-24', '2023-03-16', 60, 'Oferta en el cambio de discos de freno', 'EM010', '2023-03-31', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rubro`
--

DROP TABLE IF EXISTS `rubro`;
CREATE TABLE IF NOT EXISTS `rubro` (
  `CodigoRubro` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  PRIMARY KEY (`CodigoRubro`)
) ENGINE=InnoDB AUTO_INCREMENT=1011 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `rubro`
--

INSERT INTO `rubro` (`CodigoRubro`, `nombre`, `descripcion`) VALUES
(1001, 'Restaurante', 'Este rubro esta orientado a las empresas de la rama relacionada con la comida'),
(1002, 'Automoviles', 'Este rubro esta orientado a las empresas de la rama relacionada con los automoviles'),
(1003, 'Salud', 'Este rubro esta orientado a las empresas de la rama relacionada con la Salud'),
(1004, 'Mascotas', 'Este rubro esta orientado a las empresas de la rama relacionada con las mascotas'),
(1005, 'Turismo', 'Este rubro esta orientado a las empresas de la rama relacionada con el turismo'),
(1006, 'Alojamientos', 'Este rubro esta orientado a las empresas de la rama relacionada con la hosteleria'),
(1007, 'Hogar', 'Este rubro esta orientado a las empresas de la rama relacionada con las cosas del hogar'),
(1008, 'Belleza', 'Este rubro esta orientado a las empresas de la rama relacionada con la belleza'),
(1009, 'Tecnologia', 'Este rubro esta orientado a las empresas de la rama relacionada con la tecnologia'),
(1010, 'Diversion', 'Este rubro esta orientado a las empresas de la rama relacionada con la diversion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `test`
--

DROP TABLE IF EXISTS `test`;
CREATE TABLE IF NOT EXISTS `test` (
  `matricula` varchar(20) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(20) NOT NULL,
  PRIMARY KEY (`matricula`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `test`
--

INSERT INTO `test` (`matricula`, `nombre`, `apellido`) VALUES
('', '', ''),
('adasd', 'asdsadas', 'sadsad'),
('asdsada', 'asdasda', 'asdsad'),
('asda213', 'asdasda', 'asdsad');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cupon`
--
ALTER TABLE `cupon`
  ADD CONSTRAINT `cupon_ibfk_1` FOREIGN KEY (`idOferta`) REFERENCES `oferta` (`CodigoOferta`),
  ADD CONSTRAINT `cupon_ibfk_2` FOREIGN KEY (`DuiCliente`) REFERENCES `cliente` (`DUI`);

--
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `empleado_ibfk_1` FOREIGN KEY (`idEmpresa`) REFERENCES `empresa` (`CodigoEmpresa`);

--
-- Filtros para la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD CONSTRAINT `empresa_ibfk_1` FOREIGN KEY (`idRubro`) REFERENCES `rubro` (`CodigoRubro`);

--
-- Filtros para la tabla `oferta`
--
ALTER TABLE `oferta`
  ADD CONSTRAINT `oferta_ibfk_1` FOREIGN KEY (`idEmpresa`) REFERENCES `empresa` (`CodigoEmpresa`),
  ADD CONSTRAINT `oferta_ibfk_2` FOREIGN KEY (`estado`) REFERENCES `estadosofertas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
