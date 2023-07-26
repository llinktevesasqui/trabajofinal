-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-07-2023 a las 04:02:09
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0
-- RESTAURANT SU SAZON

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dbventas2023`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carta`
--

CREATE TABLE `carta` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `carta`
--

INSERT INTO `carta` (`id`, `nombre`) VALUES
(1, 'Ajinomen'),
(2, 'Verano'),
(3, 'CENA'),
(4, 'pescados'),
(6, 'frituras');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `idclientes` int(11) NOT NULL,
  `nombres` varchar(60) DEFAULT NULL,
  `ruc` varchar(11) DEFAULT NULL,
  `direccion` varchar(90) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle mesa`
--

CREATE TABLE `detalle mesa` (
  `idmesa` int(11) NOT NULL,
  `idcarta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_boletas`
--

CREATE TABLE `detalle_boletas` (
  `iddetalle_boletas` int(11) NOT NULL,
  `precio_venta` decimal(19,7) DEFAULT NULL,
  `descripcion` varchar(300) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `imagen` varchar(45) DEFAULT NULL,
  `idfacturas` int(11) NOT NULL,
  `idproducto` int(11) NOT NULL,
  `idmarcas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id` int(11) NOT NULL,
  `nombres` varchar(60) DEFAULT NULL,
  `apellidos` varchar(45) DEFAULT NULL,
  `fechaNacimiento` datetime DEFAULT NULL,
  `dni` varchar(8) DEFAULT NULL,
  `fecha_alta` date DEFAULT NULL,
  `tipo` varchar(45) DEFAULT NULL,
  `login` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id`, `nombres`, `apellidos`, `fechaNacimiento`, `dni`, `fecha_alta`, `tipo`, `login`, `password`) VALUES
(1, 'Kelvis', 'Tevez', '1992-01-01 23:24:00', '70853128', NULL, 'Administrador', 'Kelvis@gmail.com', 'Kelvis'),
(2, 'Verano', 'Juan', '2023-07-17 00:00:00', '18181818', '0000-00-00', 'Administrador', 'Juan', '123'),
(3, 'Primaveras', 'Juan', '0000-00-00 00:00:00', '18181818', '0000-00-00', 'Administrador', 'Juan', '123'),
(6, 'galdino ', 'teves asqui', '2000-12-11 00:00:00', '70853128', '0000-00-00', 'mesero', 'galdino@gmail.com', '123456'),
(7, 'ray', 'chalcha', '0000-00-00 00:00:00', '1232', '0000-00-00', 'usuario', 'ray@gmail.com', '123456');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresas`
--

CREATE TABLE `empresas` (
  `idempresas` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `ruc` varchar(45) DEFAULT NULL,
  `direccion` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas`
--

CREATE TABLE `facturas` (
  `idfacturas` int(11) NOT NULL,
  `numero` varchar(20) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `subtotal` decimal(19,7) DEFAULT NULL,
  `igv` decimal(19,0) DEFAULT NULL,
  `total` decimal(19,7) DEFAULT NULL,
  `idclientes` int(11) NOT NULL,
  `idempleados` int(11) NOT NULL,
  `idempresas` int(11) NOT NULL,
  `estado` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mesa`
--

CREATE TABLE `mesa` (
  `idmesa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id` int(11) NOT NULL,
  `nombre` varchar(60) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `precio_unitario` decimal(19,7) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `imagen` varchar(45) DEFAULT NULL,
  `estado` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `nombre`, `descripcion`, `precio_unitario`, `stock`, `imagen`, `estado`) VALUES
(1, 'CocaCola', 'La mejor Gaseosa', '11.0000000', 100, 'gaseosa.jpg', 'A'),
(2, 'pejerrey', 'pescados', '2.0000000', 2, '', 'A'),
(4, 'chicharron', 'carnes', '2.0000000', 2, '', 'A');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `v_productos`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `v_productos` (
`id` int(11)
,`nombre` varchar(60)
,`descripcion` varchar(255)
,`precio_unitario` decimal(19,7)
,`stock` int(11)
,`imagen` varchar(45)
,`estado` char(1)
,`carta` varchar(45)
);

-- --------------------------------------------------------

--
-- Estructura para la vista `v_productos`
--
DROP TABLE IF EXISTS `v_productos`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_productos`  AS SELECT `p`.`id` AS `id`, `p`.`nombre` AS `nombre`, `p`.`descripcion` AS `descripcion`, `p`.`precio_unitario` AS `precio_unitario`, `p`.`stock` AS `stock`, `p`.`imagen` AS `imagen`, `p`.`estado` AS `estado`, `c`.`nombre` AS `carta` FROM (`producto` `p` join `carta` `c` on(`p`.`id` = `c`.`id`))  ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carta`
--
ALTER TABLE `carta`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`idclientes`);

--
-- Indices de la tabla `detalle mesa`
--
ALTER TABLE `detalle mesa`
  ADD KEY `fk_mesa_has_carta_mesa1_idx` (`idmesa`),
  ADD KEY `fk_mesa_has_carta_carta1_idx` (`idcarta`);

--
-- Indices de la tabla `detalle_boletas`
--
ALTER TABLE `detalle_boletas`
  ADD PRIMARY KEY (`iddetalle_boletas`),
  ADD KEY `fk_detalle_boletas_facturas1_idx` (`idfacturas`),
  ADD KEY `fk_detalle_boletas_producto1_idx` (`idproducto`),
  ADD KEY `fk_detalle_boletas_marcas1_idx` (`idmarcas`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`idempresas`);

--
-- Indices de la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD PRIMARY KEY (`idfacturas`),
  ADD KEY `fk_facturas_clientes_idx` (`idclientes`),
  ADD KEY `fk_facturas_empleados1_idx` (`idempleados`),
  ADD KEY `fk_facturas_empresas1_idx` (`idempresas`);

--
-- Indices de la tabla `mesa`
--
ALTER TABLE `mesa`
  ADD PRIMARY KEY (`idmesa`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carta`
--
ALTER TABLE `carta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `idclientes` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `empresas`
--
ALTER TABLE `empresas`
  MODIFY `idempresas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `facturas`
--
ALTER TABLE `facturas`
  MODIFY `idfacturas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `mesa`
--
ALTER TABLE `mesa`
  MODIFY `idmesa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
