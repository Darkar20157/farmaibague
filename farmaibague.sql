-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-02-2023 a las 16:30:37
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cost_additional`
--

CREATE TABLE `cost_additional` (
  `ID` int(11) NOT NULL,
  `COST_ADDITIONAL` varchar(120) NOT NULL,
  `PRICE` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `payment_method`
--

CREATE TABLE `payment_method` (
  `ID` int(11) NOT NULL,
  `PAYMENT_NAME` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `clients`
--
ALTER TABLE `clients`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cost_additional`
--
ALTER TABLE `cost_additional`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detail_art`
--
ALTER TABLE `detail_art`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detail_inventory`
--
ALTER TABLE `detail_inventory`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `discounts`
--
ALTER TABLE `discounts`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `inventario`
--
ALTER TABLE `inventario`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `payment_method`
--
ALTER TABLE `payment_method`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sales`
--
ALTER TABLE `sales`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `vendors`
--
ALTER TABLE `vendors`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
