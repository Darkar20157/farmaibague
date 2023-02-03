-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-02-2023 a las 06:06:51
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `farmaibague`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `category`
--

CREATE TABLE `category` (
  `ID` int(10) NOT NULL,
  `NAME_CATEGORY` varchar(60) NOT NULL,
  `DESCRIPTION` varchar(200) NOT NULL,
  `DATE_CREATION` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `category`
--

INSERT INTO `category` (`ID`, `NAME_CATEGORY`, `DESCRIPTION`, `DATE_CREATION`) VALUES
(1, 'TABLETAS', 'AQUI SE GUARDARAN TODO EL TIPO DE TABLETAS', '2023-01-21 21:44:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clients`
--

CREATE TABLE `clients` (
  `ID` int(20) NOT NULL,
  `CED_NRO` bigint(15) NOT NULL,
  `NAMES` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `EMAIL` varchar(200) NOT NULL,
  `ADDRES` varchar(200) NOT NULL,
  `PHONE` bigint(15) NOT NULL,
  `DATE_CREATION` datetime NOT NULL,
  `STATES` tinyint(1) NOT NULL,
  `GENDER` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clients`
--

INSERT INTO `clients` (`ID`, `CED_NRO`, `NAMES`, `EMAIL`, `ADDRES`, `PHONE`, `DATE_CREATION`, `STATES`, `GENDER`) VALUES
(1, 1234560789, 'Danny Alejandro', 'daniel259922@gmail.com', 'Mz d casa 7 ', 2147483647, '2023-01-25 03:34:20', 1, 'Masculino'),
(3, 987654321, 'Daniel', '', 'mz d casa 10', 1234569870, '2023-01-24 21:37:24', 1, 'Masculino'),
(4, 1234567890, 'Danny', '', 'Mz d casa 7', 2147483647, '2023-01-24 22:09:37', 1, 'Masculino'),
(5, 12345607, 'Danny', 'daniel259922@gmail.com', 'Mz d casa 7', 2147483647, '2023-01-24 22:19:03', 1, 'Masculino'),
(6, 2147483647, 'jose', 'luis@gmail.com', 'Mz d casa 7 ', 1234567890, '2023-01-25 20:05:00', 1, 'Masculino'),
(8, 1005714270, 'Danny Alejandro Rojas Ramirez', 'daniel259922@gmail.com', 'Mz d casa 7', 2147483647, '2023-01-25 20:09:21', 1, 'Masculino'),
(9, 1005714271, 'Jose luis ', 'alberto@gmail.com', 'Mz d casa 7', 2147483647, '2023-01-25 20:10:43', 1, 'Masculino'),
(11, 1005714275, 'Jasiel Valentina', 'jasiel@gmail.com', 'Mz 1a casa 5 ', 31115489410, '2023-01-27 20:27:30', 1, 'Femenino'),
(12, 4567891230, 'Valentina', 'valen@gmail.com', 'Mz 1a casa 7', 1234879123, '2023-01-28 18:24:19', 1, 'Femenino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cost_additional`
--

CREATE TABLE `cost_additional` (
  `ID` int(11) NOT NULL,
  `COST_ADDITIONAL` varchar(120) NOT NULL,
  `PRICE` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cost_additional`
--

INSERT INTO `cost_additional` (`ID`, `COST_ADDITIONAL`, `PRICE`) VALUES
(1, 'DOMICILIO $2.000', 2000),
(2, 'Domicilio $3000', 3000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detail_art`
--

CREATE TABLE `detail_art` (
  `ID` int(10) NOT NULL,
  `BARCODE` bigint(20) DEFAULT NULL,
  `NAME_PRODUCT` varchar(120) NOT NULL,
  `GRAMMAGE_MINIMETERAGE` varchar(20) NOT NULL,
  `BRAND` varchar(60) NOT NULL,
  `PRICE` int(10) NOT NULL,
  `NOTE` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detail_art`
--

INSERT INTO `detail_art` (`ID`, `BARCODE`, `NAME_PRODUCT`, `GRAMMAGE_MINIMETERAGE`, `BRAND`, `PRICE`, `NOTE`) VALUES
(9, 5, 'ACETAMINOFEN + HIDROCODEINA', '20GR', 'N/A', 30000, 'SIRVE PARA EL DOLOR DE CABEZA'),
(12, 8, 'Carbacepina', '10GM', 'GENFAR', 3000, 'SIRVE PARA LA CIRCULACION'),
(13, 9, 'ACETAMINOFEN', '10GM', 'CUALQUIERA', 1300, 'NINGUNA'),
(14, 10, 'ENSURE ADVANCE VAINILLA', '850GR', 'ADVANCE', 114000, 'TE SUBE LAS DEFENSAS'),
(15, 11, 'NAPROXENO', '250MG', 'AG', 6100, 'NAPROXENO ANALGECICO PARA EL DOLOR'),
(18, 7509546063645, 'Speed Stick', '150ML', 'Speed Stick', 12000, 'Ninguna');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detail_inventory`
--

CREATE TABLE `detail_inventory` (
  `ID` int(10) NOT NULL,
  `BARCODE` bigint(20) DEFAULT NULL,
  `NAME_PRODUCT` varchar(120) NOT NULL,
  `AMOUNT` int(10) NOT NULL,
  `NIT_VENDOR` varchar(20) NOT NULL,
  `DATE_CREATION` datetime NOT NULL,
  `PRICE_UNID` int(10) NOT NULL,
  `PACKAGING` varchar(60) NOT NULL,
  `PRICE_BUY` int(10) NOT NULL,
  `NOTES` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detail_inventory`
--

INSERT INTO `detail_inventory` (`ID`, `BARCODE`, `NAME_PRODUCT`, `AMOUNT`, `NIT_VENDOR`, `DATE_CREATION`, `PRICE_UNID`, `PACKAGING`, `PRICE_BUY`, `NOTES`) VALUES
(26, 5, 'ACETAMINOFEN + HIDROCODEINA', 20, '45678913-5', '2023-02-02 23:00:52', 30000, 'Caja', 30000, 'Ninguna'),
(27, 9, 'ACETAMINOFEN', 50, '45678913-5', '2023-02-02 23:03:28', 1300, 'Caja', 20, 'Ninguna'),
(28, 9, 'ACETAMINOFEN', 10, '45678913-5', '2023-02-02 23:04:13', 1300, 'Unidad', 20000, 'Ninguna'),
(29, 5, 'ACETAMINOFEN + HIDROCODEINA', 10, '45678913-5', '2023-02-02 23:05:25', 30000, 'Unidad', 20000, 'Ninguna');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detail_product`
--

CREATE TABLE `detail_product` (
  `BARCODE` bigint(20) NOT NULL,
  `NAME_PRODUCT` varchar(120) NOT NULL,
  `AMOUNT` int(10) NOT NULL,
  `GRAMMAGE_MINIMETERAGE` varchar(20) NOT NULL,
  `PRICE` int(10) NOT NULL,
  `DISCOUNT_ID` int(10) NOT NULL,
  `PACKAGING` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `discounts`
--

CREATE TABLE `discounts` (
  `ID` int(11) NOT NULL,
  `DISCOUNT_NAME` varchar(120) NOT NULL,
  `DISCOUNT_PRICE` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `discounts`
--

INSERT INTO `discounts` (`ID`, `DISCOUNT_NAME`, `DISCOUNT_PRICE`) VALUES
(1, 'Lunes de descuento 5%', 5),
(3, 'Sin descuento', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `ID` int(10) NOT NULL,
  `BARCODE` bigint(20) DEFAULT NULL,
  `NAME_PRODUCT` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish2_ci DEFAULT NULL,
  `AMOUNT` int(10) DEFAULT NULL,
  `NIT_VENDOR` varchar(20) DEFAULT NULL,
  `PRICE` int(10) NOT NULL,
  `PACKAGING` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `inventario`
--

INSERT INTO `inventario` (`ID`, `BARCODE`, `NAME_PRODUCT`, `AMOUNT`, `NIT_VENDOR`, `PRICE`, `PACKAGING`) VALUES
(28, 5, 'ACETAMINOFEN + HIDROCODEINA', 18, '45678913-5', 30000, 'Caja'),
(29, 9, 'ACETAMINOFEN', 50, '45678913-5', 1300, 'Caja'),
(30, 9, 'ACETAMINOFEN', 10, '45678913-5', 1300, 'Unidad'),
(31, 5, 'ACETAMINOFEN + HIDROCODEINA', 18, '45678913-5', 30000, 'Unidad');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `payment_method`
--

CREATE TABLE `payment_method` (
  `ID` int(11) NOT NULL,
  `PAYMENT_NAME` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `payment_method`
--

INSERT INTO `payment_method` (`ID`, `PAYMENT_NAME`) VALUES
(2, 'Efectivo'),
(3, 'Nequi');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sales`
--

CREATE TABLE `sales` (
  `ID` int(20) NOT NULL,
  `NRO_FACTURA` varchar(30) DEFAULT NULL,
  `CED_NRO` bigint(15) DEFAULT NULL,
  `DATE_VOUCHER` datetime DEFAULT NULL,
  `BARCODE` bigint(20) DEFAULT NULL,
  `AMOUNT` int(10) NOT NULL,
  `PRICE_UNID` int(10) NOT NULL,
  `PACKAGING` varchar(60) NOT NULL,
  `TAXES_ID` int(10) NOT NULL,
  `DISCOUNT_ID` int(10) NOT NULL,
  `COST_ADDITIONAL_ID` int(10) NOT NULL,
  `TOTAL_ITEMS` int(10) NOT NULL,
  `PAYMENT_METHOD_ID` int(10) NOT NULL,
  `PAY_CLIENT` int(10) NOT NULL,
  `EXCHANGE` int(10) NOT NULL,
  `TOTAL_REGISTER` int(10) NOT NULL,
  `TOTAL_VOUCHER` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sales`
--

INSERT INTO `sales` (`ID`, `NRO_FACTURA`, `CED_NRO`, `DATE_VOUCHER`, `BARCODE`, `AMOUNT`, `PRICE_UNID`, `PACKAGING`, `TAXES_ID`, `DISCOUNT_ID`, `COST_ADDITIONAL_ID`, `TOTAL_ITEMS`, `PAYMENT_METHOD_ID`, `PAY_CLIENT`, `EXCHANGE`, `TOTAL_REGISTER`, `TOTAL_VOUCHER`) VALUES
(36, 'JVS-1', 1234560789, '2023-02-03 00:03:54', 5, 2, 30000, 'Caja', 0, 1, 1, 1, 2, 60000, 1000, 57000, 59000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `ID` int(20) NOT NULL,
  `NAME_USER` varchar(120) DEFAULT NULL,
  `CED_NRO` bigint(15) DEFAULT NULL,
  `PASSWORDS` varchar(200) DEFAULT NULL,
  `EMAIL` varchar(200) DEFAULT NULL,
  `ADDRES` varchar(200) NOT NULL,
  `PHONE` bigint(12) DEFAULT NULL,
  `TYPE_USER` tinyint(3) DEFAULT NULL,
  `CREATION_DATE` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='TABLE OF USERS';

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`ID`, `NAME_USER`, `CED_NRO`, `PASSWORDS`, `EMAIL`, `ADDRES`, `PHONE`, `TYPE_USER`, `CREATION_DATE`) VALUES
(1, 'Admin', 1234567890, '$2y$10$Hg8JEEqpQL21venpR4TmQOW5r8lVqn8oVLJySWXr0X4HbvnD29wla', 'admin@gmail.com', '*', 3204594935, 1, '2023-01-20 03:02:25'),
(3, 'Danny Alejandro Rojas', 1005714270, '$2y$10$3zpHN1nIjkyMmaNmxzyzKu4SmI9h9cWNhYkny6fYN6EelVf.1ExTy', 'vendedor@gmail.com', 'Mz d casa 7', 3204594935, 3, NULL),
(4, 'Juan Luis Gomez', 101568022, '$2y$10$T6NB20qRCkkn5RJQ.KSHduE0IPLgCYn35Q8wC8LpqBUTsV1wZ7OB6', 'empleado@gmail.com', 'Mz d casa 10 barrio/cantabria', 3504829823, 3, NULL),
(5, 'Danny Alejandro', 11111111111, '$2y$10$JD4Z3B7rS3uz7kw8lVAj4OVebqd9B/wmTHbDZefiD3fpr/Y3xADLe', 'ejemplo@gmail.com', 'Mz d casa 7 B/German Huertas', 2222222222, 3, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vendors`
--

CREATE TABLE `vendors` (
  `ID` int(10) NOT NULL,
  `NIT_VENDOR` varchar(20) DEFAULT NULL,
  `NAME_VENDOR` varchar(120) NOT NULL,
  `ADDRESS_VENDOR` varchar(200) NOT NULL,
  `PHONE_VENDOR` bigint(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `vendors`
--

INSERT INTO `vendors` (`ID`, `NIT_VENDOR`, `NAME_VENDOR`, `ADDRESS_VENDOR`, `PHONE_VENDOR`) VALUES
(1, '1234567890', 'PROV-DANNY', 'MZ D CASA 7', 3204594935),
(2, '45678913-5', 'FarmaTolima', 'Mz f casa 11 Centro', 45478123);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `CED_NRO` (`CED_NRO`);

--
-- Indices de la tabla `cost_additional`
--
ALTER TABLE `cost_additional`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `detail_art`
--
ALTER TABLE `detail_art`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `BARCODE` (`BARCODE`);

--
-- Indices de la tabla `detail_inventory`
--
ALTER TABLE `detail_inventory`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `discounts`
--
ALTER TABLE `discounts`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `payment_method`
--
ALTER TABLE `payment_method`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `CED_NRO` (`CED_NRO`);

--
-- Indices de la tabla `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`NIT_VENDOR`) USING BTREE;

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `category`
--
ALTER TABLE `category`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `clients`
--
ALTER TABLE `clients`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `cost_additional`
--
ALTER TABLE `cost_additional`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `detail_art`
--
ALTER TABLE `detail_art`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `detail_inventory`
--
ALTER TABLE `detail_inventory`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `discounts`
--
ALTER TABLE `discounts`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `inventario`
--
ALTER TABLE `inventario`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `payment_method`
--
ALTER TABLE `payment_method`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `sales`
--
ALTER TABLE `sales`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `vendors`
--
ALTER TABLE `vendors`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
