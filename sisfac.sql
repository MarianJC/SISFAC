-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-07-2024 a las 11:48:10
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sisfac`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `idcategoria` int(11) NOT NULL,
  `nomcategoria` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`idcategoria`, `nomcategoria`) VALUES
(1, 'Bebidas'),
(2, 'Abarrotes'),
(3, 'Limpieza'),
(4, 'Maquillaje'),
(5, 'Calzado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `idcliente` int(11) NOT NULL,
  `nomcliente` varchar(128) NOT NULL,
  `ruccliente` varchar(11) NOT NULL,
  `dircliente` varchar(128) NOT NULL,
  `telcliente` varchar(9) NOT NULL,
  `emailcliente` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`idcliente`, `nomcliente`, `ruccliente`, `dircliente`, `telcliente`, `emailcliente`) VALUES
(1, 'Rosmery Silva', '12345673745', 'Calle San Martin', '908556443', 'rosmery@gmail.com'),
(2, 'Martin Condori', '10164121611', 'Av. Las Americas', '900611356', 'martin@gmail.com'),
(3, 'Pedro López', '12345678903', 'Av. Independencia 789', '987654323', 'pedro@gmail.com'),
(4, 'Ana García', '12345678904', 'Calle San Martín 1011', '987654324', 'ana@gmail.com'),
(5, 'Carlos Sánchez', '12345678905', 'Av. Universitaria 1213', '987654325', 'carlos@gmail.com'),
(6, 'Sandra Rodríguez', '12345678906', 'Calle Simón Bolívar 1415', '987654326', 'sandra@gmail.com'),
(7, 'David Martínez', '12345678907', 'Av. Javier Prado 1617', '987654327', 'david@gmail.com'),
(8, 'Laura Fernández', '12345678908', 'Calle Arequipa 1819', '987654328', 'laura@gmail.com'),
(9, 'Roberto Flores', '12345678909', 'Av. Grau 2021', '987654329', 'roberto@gmail.com'),
(10, 'Cristina Gómez', '12345678910', 'Calle Tacna 2223', '987654330', 'cristina@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `condicionventa`
--

CREATE TABLE `condicionventa` (
  `idcondicion` int(11) NOT NULL,
  `nomcondicion` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `condicionventa`
--

INSERT INTO `condicionventa` (`idcondicion`, `nomcondicion`) VALUES
(1, 'Contado'),
(2, 'Crédito');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallefactura`
--

CREATE TABLE `detallefactura` (
  `iddetalle` int(11) NOT NULL,
  `idfactura` int(11) NOT NULL,
  `idproducto` int(11) NOT NULL,
  `cant` int(11) NOT NULL,
  `cosuni` decimal(19,4) NOT NULL,
  `preuni` decimal(10,4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas`
--

CREATE TABLE `facturas` (
  `idfactura` int(11) NOT NULL,
  `fecha` date NOT NULL DEFAULT curdate(),
  `idcliente` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `fechareg` datetime NOT NULL DEFAULT current_timestamp(),
  `idcondicion` int(11) NOT NULL,
  `valorventa` decimal(10,4) NOT NULL,
  `igv` decimal(10,4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `idproducto` int(11) NOT NULL,
  `idproveedor` int(11) NOT NULL,
  `nomproducto` varchar(128) NOT NULL,
  `unimed` varchar(15) NOT NULL,
  `stock` int(11) NOT NULL,
  `cosuni` decimal(10,4) NOT NULL,
  `preuni` decimal(10,4) NOT NULL,
  `idcategoria` int(11) NOT NULL,
  `estado` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idproducto`, `idproveedor`, `nomproducto`, `unimed`, `stock`, `cosuni`, `preuni`, `idcategoria`, `estado`) VALUES
(1, 5, 'Aceite Vegetal PRIMOR Premium', 'ml', 56, 7.4000, 8.0000, 2, 'A'),
(2, 5, 'Fideos Spaghetti DON VITTORIO', 'g', 56, 4.6000, 5.0000, 2, 'A'),
(3, 1, 'Agua CIELO sin gas', 'ml', 80, 0.9000, 1.5000, 1, 'A'),
(4, 2, 'Bebida GLORIA Cebada y Trigo', 'L', 30, 3.5000, 4.6000, 1, 'A'),
(5, 4, 'Detergente MARSELLA', 'kg', 50, 4.0000, 5.0000, 3, 'A'),
(6, 4, 'Jabón BOLIVAR Floral', 'gr', 35, 3.0000, 3.5000, 3, 'A'),
(7, 6, 'Rubor Liquido RARE BEAUTY', 'cm', 20, 189.0000, 191.0000, 4, 'A'),
(8, 7, 'Máscara de Pestañas', 'ml', 20, 55.9000, 60.0000, 4, 'A'),
(9, 8, 'Zapatillas Urbanas Hombre', 'par', 40, 149.0000, 200.0000, 5, 'A'),
(10, 10, 'Zapatilla Nike Air Max ', 'par', 50, 429.0000, 500.0000, 5, 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `idproveedor` int(11) NOT NULL,
  `nomproveedor` varchar(128) NOT NULL,
  `rucproveedor` varchar(11) NOT NULL,
  `dirproveedor` varchar(128) NOT NULL,
  `telproveedor` varchar(9) NOT NULL,
  `emailproveedor` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`idproveedor`, `nomproveedor`, `rucproveedor`, `dirproveedor`, `telproveedor`, `emailproveedor`) VALUES
(1, 'Industrias San Miguel', '12345678901', 'Av. San Miguel 123', '123456789', 'info@industriassanmiguel.com'),
(2, 'Arca Continental Lindley', '23456789012', 'Calle Lindley 456', '234567890', 'contacto@arcacontinental.com'),
(3, 'Backus AB InBev', '34567890123', 'Jr. Backus 789', '345678901', 'info@backus.com'),
(4, 'Favel', '56789912345', 'Calle Favel 890', '567890123', 'info@favel.com'),
(5, 'Vega', '67890123456', 'Av. Vega 123', '678991234', 'contacto@vega.com'),
(6, 'Rare Beauty', '78901234567', 'Calle Rare 456', '789012345', 'info@rarebeauty.com'),
(7, 'Maybelline', '89012345678', 'Jr. Maybelline 789', '890123456', 'contacto@maybelline.com'),
(8, 'Adidas', '90123456789', 'Av. Adidas 123', '901234567', 'info@adidas.com'),
(9, 'Sabella', '01020304050', 'Av. Sabella 456', '010203040', 'contacto@sabella.com'),
(10, 'Nike', '01234567890', 'Calle Nike 456', '012345678', 'contacto@nike.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idusuario` int(11) NOT NULL,
  `nomusuario` varchar(15) NOT NULL,
  `password` char(40) NOT NULL,
  `apellidos` varchar(64) NOT NULL,
  `nombres` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `estado` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idusuario`, `nomusuario`, `password`, `apellidos`, `nombres`, `email`, `estado`) VALUES
(1, 'Administrador', 'f865b53623b121fd34ee5426c792e5c33af8c227', 'Fuentes Velarde', 'Antonio Paul', 'antonio@gmail.com', 'A'),
(2, 'Vendedor1', '3592afa86b83d6f25d869d9ec1302e51b3a7a76d', 'González Aliaga', 'María Cruz', 'maria.gonzalez@email.com', 'A'),
(3, 'Vendedor2', '3592afa86b83d6f25d869d9ec1302e51b3a7a76d', 'López Guzmán', 'Pedro Matthias', 'pedro.lopez@email.com', 'A');

--
-- Disparadores `usuarios`
--
DELIMITER $$
CREATE TRIGGER `before_usuario_insert` BEFORE INSERT ON `usuarios` FOR EACH ROW BEGIN
    SET NEW.password = SHA1(NEW.password);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `before_usuario_update` BEFORE UPDATE ON `usuarios` FOR EACH ROW BEGIN
    SET NEW.password = SHA1(NEW.password);
END
$$
DELIMITER ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`idcategoria`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`idcliente`);

--
-- Indices de la tabla `condicionventa`
--
ALTER TABLE `condicionventa`
  ADD PRIMARY KEY (`idcondicion`);

--
-- Indices de la tabla `detallefactura`
--
ALTER TABLE `detallefactura`
  ADD PRIMARY KEY (`iddetalle`),
  ADD KEY `idfactura` (`idfactura`),
  ADD KEY `idproducto` (`idproducto`);

--
-- Indices de la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD PRIMARY KEY (`idfactura`),
  ADD KEY `idcliente` (`idcliente`),
  ADD KEY `idusuario` (`idusuario`),
  ADD KEY `idcondicion` (`idcondicion`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idproducto`),
  ADD KEY `idproveedor` (`idproveedor`),
  ADD KEY `idcategoria` (`idcategoria`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`idproveedor`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idusuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `idcategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `idcliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `condicionventa`
--
ALTER TABLE `condicionventa`
  MODIFY `idcondicion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `detallefactura`
--
ALTER TABLE `detallefactura`
  MODIFY `iddetalle` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `facturas`
--
ALTER TABLE `facturas`
  MODIFY `idfactura` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `idproducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `idproveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detallefactura`
--
ALTER TABLE `detallefactura`
  ADD CONSTRAINT `detallefactura_ibfk_1` FOREIGN KEY (`idfactura`) REFERENCES `facturas` (`idfactura`),
  ADD CONSTRAINT `detallefactura_ibfk_2` FOREIGN KEY (`idproducto`) REFERENCES `productos` (`idproducto`);

--
-- Filtros para la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD CONSTRAINT `facturas_ibfk_1` FOREIGN KEY (`idcliente`) REFERENCES `clientes` (`idcliente`),
  ADD CONSTRAINT `facturas_ibfk_2` FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`idusuario`),
  ADD CONSTRAINT `facturas_ibfk_3` FOREIGN KEY (`idcondicion`) REFERENCES `condicionventa` (`idcondicion`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`idproveedor`) REFERENCES `proveedores` (`idproveedor`),
  ADD CONSTRAINT `productos_ibfk_2` FOREIGN KEY (`idcategoria`) REFERENCES `categorias` (`idcategoria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
