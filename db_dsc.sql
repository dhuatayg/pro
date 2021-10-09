-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-09-2020 a las 05:00:42
-- Versión del servidor: 10.1.8-MariaDB
-- Versión de PHP: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_dsc`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `Guardar_categoria` (IN `nombre` VARCHAR(200), IN `descripcion` VARCHAR(200), IN `estado` INT(2))  BEGIN
INSERT INTO categoria (id_categoria, nombre_categoria, descripcion_categoria, estado_categoria) VALUES (null, nombre, descripcion, estado);
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `area`
--

CREATE TABLE `area` (
  `id_area` int(10) NOT NULL,
  `abre_area` varchar(10) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `nombre_area` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `estado_area` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `area`
--

INSERT INTO `area` (`id_area`, `abre_area`, `nombre_area`, `estado_area`) VALUES
(1, 'AR000001', 'Soporte', 1),
(2, 'AR000002', 'Producción', 1),
(3, 'AR000003', 'Ventas', 1),
(4, 'AR000004', 'Mantenimiento', 1),
(5, 'AR000005', 'Almacén', 1),
(6, 'AR000006', 'Maquinado', 1),
(7, 'AR000007', 'Paileria', 1),
(8, 'AR000008', 'Pintado', 1),
(9, 'AR000009', 'Fundido', 1),
(10, 'AR000010', 'Calidad', 1),
(11, 'AR000011', 'Administración', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

CREATE TABLE `cargo` (
  `id_cargo` int(10) NOT NULL,
  `abre_cargo` varchar(10) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `nombre_cargo` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `estado_cargo` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `cargo`
--

INSERT INTO `cargo` (`id_cargo`, `abre_cargo`, `nombre_cargo`, `estado_cargo`) VALUES
(1, 'CR000001', 'Desarrollador Web', 1),
(2, 'CR000002', 'Jefe de Producción', 1),
(3, 'CR000003', 'Asistente de Ventas', 1),
(4, 'CR000004', 'Operario de Producción', 1),
(5, 'CR000005', 'Gerente', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(10) NOT NULL,
  `abre_categoria` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre_categoria` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion_categoria` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `estado_categoria` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `abre_categoria`, `nombre_categoria`, `descripcion_categoria`, `estado_categoria`) VALUES
(1, 'CA000001', ' Electrobomba Centrífuga Monoblock Serie A', ' Electrobomba Centrífuga Monoblock Serie A', 1),
(2, 'CA000002', 'Electrobomba Centrífuga Monoblock Serie B y C', 'Electrobomba Centrífuga Monoblock Serie B y C', 1),
(3, 'CA000003', 'Motobomba Centrífuga', 'Motobomba Centrífuga', 1),
(4, 'CA000004', 'Electrobomba Autocebante Monoblock', 'Electrobomba Autocebante Monoblock', 1),
(5, 'CA000005', 'Electrobomba Monoblock ISO 2858', 'Electrobomba Monoblock ISO 2858', 1),
(6, 'CA000006', 'Bomba Centrífuga ISO 2858', 'Bomba Centrífuga ISO 2858', 1),
(7, 'CA000007', 'Bomba Eje Libre con Conexiones Roscadas WRF-14', 'Bomba Eje Libre con Conexiones Roscadas WRF-14', 1),
(8, 'CA000008', 'Electrobomba Centrífuga Werken SR', 'Electrobomba Centrífuga Werken SR', 1),
(9, 'CA000009', 'Electrobomba Centrífuga Pedrollo CPM', 'Electrobomba Centrífuga Pedrollo CPM', 1),
(10, 'CA000010', 'Electrobomba Periférica Pedrollo PKM', 'Electrobomba Periférica Pedrollo PKM', 1),
(11, 'CA000011', 'Electrobomba Centrífuga CM32 ', 'Electrobomba Centrífuga CM32 ', 1),
(12, 'CA000012', 'Electrobomba Centrífuga CM27 ', 'Electrobomba Centrífuga CM27 ', 1),
(13, 'CA000013', 'Electrobomba Centrífuga CM22 ', 'Electrobomba Centrífuga CM22 ', 1),
(14, 'CA000014', 'Electrobomba Periférica KPM50', 'Electrobomba Periférica KPM50', 1),
(15, 'CA000015', 'Electrobomba Centrífuga Monofásica Pentax', 'Electrobomba Centrífuga Monofásica Pentax', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(10) NOT NULL,
  `ndocumento_cliente` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre_cliente` varchar(250) COLLATE utf8_spanish2_ci NOT NULL,
  `telefono_cliente` int(9) DEFAULT NULL,
  `correo_cliente` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `estado_cliente` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `ndocumento_cliente`, `nombre_cliente`, `telefono_cliente`, `correo_cliente`, `estado_cliente`) VALUES
(1, '20600886534', 'DAVID SILVA CORTEZ S.A.C.', 956030913, 'admin@dsc.com', 1),
(2, '20556527084', 'PERU BOMBAS E.I.R.L.', 990997293, 'ventas@perubombas.com', 1),
(3, '20493172710', 'PEDROLLO S.A.C.', 986022846, 'ventas@bombaspedrollo.pe', 1),
(4, '20557920464', 'INDUSTRIA TECHNI PERÚ S.A.C.', 5067627, 'ventas@techniperu.com', 1),
(5, '20603894074', 'YAQUA PERU S.A.C.', 945303149, 'informes@bombasyaquaperu.com', 1),
(6, '20100171814', 'HIDROSTAL S.A.', 3191000, 'ventas@hidrostal.com.pe', 1),
(7, '20602877575', 'AGUSA SERVICIOS GENERALES E.I.R.L', 997830467, 'info@sssagusa.com', 1),
(8, '20514001783', 'HIDROMEC INGENIEROS S.A.C.', 2718379, 'ventas@hidromecingenieros.com', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallepedido`
--

CREATE TABLE `detallepedido` (
  `id_detallepedido` int(10) NOT NULL,
  `id_pedido` int(10) NOT NULL,
  `id_producto` int(10) NOT NULL,
  `cantidad_detallepedido` int(10) NOT NULL,
  `restante_detallepedido` int(10) DEFAULT NULL,
  `precio_detallepedido` double NOT NULL,
  `importe_detallepedido` double NOT NULL,
  `estado_detallepedido` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `detallepedido`
--

INSERT INTO `detallepedido` (`id_detallepedido`, `id_pedido`, `id_producto`, `cantidad_detallepedido`, `restante_detallepedido`, `precio_detallepedido`, `importe_detallepedido`, `estado_detallepedido`) VALUES
(1, 1, 3, 30, 30, 27, 810, 1),
(2, 2, 1, 47, 47, 40, 1880, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `id_empleado` int(10) NOT NULL,
  `dni_empleado` int(8) NOT NULL,
  `nombre_empleado` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `paterno_empleado` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `materno_empleado` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `telefono_empleado` int(9) DEFAULT NULL,
  `id_area` int(10) NOT NULL,
  `id_cargo` int(10) NOT NULL,
  `estado_empleado` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`id_empleado`, `dni_empleado`, `nombre_empleado`, `paterno_empleado`, `materno_empleado`, `telefono_empleado`, `id_area`, `id_cargo`, `estado_empleado`) VALUES
(1, 48015506, 'Diego Jorge', 'Huatay', 'Gonzales', 987868738, 1, 1, 1),
(2, 73244976, 'Magali Rosario', 'Silva', 'Cornejo', 963706005, 11, 5, 1),
(3, 41867366, 'Richard Felix', 'Gonzales', 'Melgar', 347358246, 2, 2, 1),
(4, 41524418, 'Gianella Doris', 'Sanchéz', 'Contreras', 956030913, 3, 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `id_estado` int(10) NOT NULL,
  `abre_estado` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre_estado` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `descripcion_estado` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `estado_estado` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`id_estado`, `abre_estado`, `nombre_estado`, `descripcion_estado`, `estado_estado`) VALUES
(1, 'ES000001', 'Entregado', 'El pedido se entrego satisfactoriamente.', 1),
(2, 'ES000002', 'En Producción', 'El pedido se encuentra en producción.', 1),
(3, 'ES000003', 'Sin Programar', 'La producción no se encuentra planificada.', 1),
(4, 'ES000004', 'Terminado', 'La producción se ha terminado. ', 1),
(5, 'ES000005', 'Cancelado', 'La producción se ha cancelado.', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `indirecto_produccion`
--

CREATE TABLE `indirecto_produccion` (
  `id_indirecto_produccion` int(10) NOT NULL,
  `id_produccion` int(10) NOT NULL,
  `descripcion_gasto` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `valor_gasto` decimal(10,0) NOT NULL,
  `estado_gasto` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `indirecto_produccion`
--

INSERT INTO `indirecto_produccion` (`id_indirecto_produccion`, `id_produccion`, `descripcion_gasto`, `valor_gasto`, `estado_gasto`) VALUES
(1, 1, 'Mantenimiento', '50', 1),
(2, 2, 'Mano de obra extra', '144', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maproducto`
--

CREATE TABLE `maproducto` (
  `id_maproducto` int(10) NOT NULL,
  `id_producto` int(10) NOT NULL,
  `id_material` int(10) NOT NULL,
  `cantidad_maproducto` int(10) NOT NULL,
  `monto_maproducto` decimal(10,0) NOT NULL,
  `estado_maproducto` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `maproducto`
--

INSERT INTO `maproducto` (`id_maproducto`, `id_producto`, `id_material`, `cantidad_maproducto`, `monto_maproducto`, `estado_maproducto`) VALUES
(1, 1, 4, 6, '18', 1),
(7, 3, 4, 3, '9', 1),
(8, 4, 6, 1, '3', 1),
(9, 2, 4, 1, '3', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maquina`
--

CREATE TABLE `maquina` (
  `id_maquina` int(10) NOT NULL,
  `abre_maquina` varchar(10) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `nombre_maquina` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `descripcion_maquina` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `cantidad_maquina` int(10) DEFAULT NULL,
  `id_area` int(10) NOT NULL,
  `estado_maquina` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `maquina`
--

INSERT INTO `maquina` (`id_maquina`, `abre_maquina`, `nombre_maquina`, `descripcion_maquina`, `cantidad_maquina`, `id_area`, `estado_maquina`) VALUES
(1, 'MA000001', 'EWM 221 MV', 'Maquina EWM 221 MV para la soldadura de los componentes.', 6, 7, 1),
(2, 'MA000002', 'Granalladora', 'Granalladora para quitar imperfecciones del fundido.', 3, 9, 1),
(3, 'MA000003', 'Taladro SCH40-JK114', 'Taladro Perforador de tubos SCH40-JK114', 4, 7, 1),
(4, 'MA000004', 'Horno', 'Horno para fundir la chatarra.', 5, 9, 1),
(5, 'MA000005', 'Kaili KP6402', 'Lijadora de banda RSA KP6402', 4, 6, 1),
(6, 'MA000006', 'Wagner W550', 'Wagner Pistola para pintar W550.', 4, 8, 1),
(7, 'MA000007', 'Sierra SC16-B2', 'Sierra para cotar metal SC16-B2.', 4, 6, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `material`
--

CREATE TABLE `material` (
  `id_material` int(10) NOT NULL,
  `abre_material` varchar(10) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `nombre_material` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `descripcion_material` varchar(250) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `unidad_material` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `stock_material` int(10) DEFAULT NULL,
  `precio_material` decimal(10,0) DEFAULT NULL,
  `estado_material` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `material`
--

INSERT INTO `material` (`id_material`, `abre_material`, `nombre_material`, `descripcion_material`, `unidad_material`, `stock_material`, `precio_material`, `estado_material`) VALUES
(1, 'MT000001', 'Barra de acero de 36 mm', 'Una barra de acero de 36 mm', 'Unidad', 250, '2', 1),
(2, 'MT000002', 'Bloque de acero 60 mm ', 'Bloque de acero 60 milimetros', 'Unidad', 260, '2', 1),
(3, 'MT000003', 'Bloque de acero 80 mm', 'Bloque de acero de 80 milimetros ', 'Unidad', 230, '3', 1),
(4, 'MT000004', 'Bloque de chatarra', 'Bloque de chatarra', 'Kilo', 106, '3', 1),
(5, 'MT000005', 'Bloque de acero 90 mm', 'Bloque de acero de 90 milimetros', 'Unidad', 240, '4', 1),
(6, 'MT000006', 'Disco de  acero 32 cm', 'Disco de acero 32 cm', 'Unidad', 282, '8', 1),
(7, 'MT000007', 'Disco de acero 28 cm', 'Disco de acero 28 cm', 'Unidad', 267, '6', 1),
(8, 'MT000008', 'Disco de acero de 18 cm', 'Disco de acero de 18 cm', 'Unidad', 264, '5', 1),
(9, 'MT000009', 'Bloque de acero de 8 cm', 'Bloque de acero de 8 cm', 'Unidad', 270, '4', 1),
(10, 'MT000010', 'Bloque de acero de 9 cm', 'Bloque de acero de 9 cm', 'Unidad', 336, '5', 1),
(11, 'MT000011', 'Bloque de acero de 36 cm', 'Bloque de acero de 36 cm', 'Unidad', 760, '8', 1),
(12, 'MT000012', 'Barra de acero 23mm', 'Barra de acero de 23 mm', 'Unidad', 858, '5', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mqproducto`
--

CREATE TABLE `mqproducto` (
  `id_mqproducto` int(10) NOT NULL,
  `id_producto` int(10) NOT NULL,
  `id_maquina` int(10) NOT NULL,
  `estado_mqproducto` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `mqproducto`
--

INSERT INTO `mqproducto` (`id_mqproducto`, `id_producto`, `id_maquina`, `estado_mqproducto`) VALUES
(1, 1, 4, 1),
(2, 1, 6, 1),
(3, 1, 3, 1),
(4, 1, 2, 1),
(20, 3, 5, 1),
(21, 4, 5, 1),
(22, 2, 5, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `id_pedido` int(10) NOT NULL,
  `abre_pedido` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha_pedido` date NOT NULL,
  `entrega_pedido` date NOT NULL,
  `monto_pedido` double NOT NULL,
  `id_cliente` int(10) NOT NULL,
  `id_estado` int(10) NOT NULL,
  `ind_pedido` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`id_pedido`, `abre_pedido`, `fecha_pedido`, `entrega_pedido`, `monto_pedido`, `id_cliente`, `id_estado`, `ind_pedido`) VALUES
(1, 'PE000001', '2020-07-18', '2020-07-19', 810, 1, 2, 1),
(2, 'PE000002', '2020-07-19', '2020-07-19', 1880, 1, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proceso`
--

CREATE TABLE `proceso` (
  `id_proceso` int(10) NOT NULL,
  `abre_proceso` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `id_area` int(10) NOT NULL,
  `nombre_proceso` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion_proceso` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `estado_proceso` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `proceso`
--

INSERT INTO `proceso` (`id_proceso`, `abre_proceso`, `id_area`, `nombre_proceso`, `descripcion_proceso`, `estado_proceso`) VALUES
(1, 'PO000001', 5, 'Almacenaje', 'Indica que la producción ha acabado y se ha guardado los productos en el almacén.', 1),
(2, 'PO000002', 10, 'Revisión', 'Se revisa si los productos cumplen con los estandares de calidad.', 1),
(3, 'PO000003', 7, 'Corte', 'Se realizan cortes de acuerdo a las medidas de los planos.', 1),
(4, 'PO000004', 6, 'Emsamblaje', 'Se realiza el emsamblaje de los componentes.', 1),
(5, 'PO000005', 8, 'Pintado', 'Se realiza el pintado de los componentes.', 1),
(6, 'PO000006', 6, 'Pulido', 'Se realiza el pulido de los materiales', 1),
(7, 'PO000007', 9, 'Limpieza de excesos', 'Se limpian los excesos que tengan las piezas luego de la fundición', 1),
(8, 'PO000008', 6, 'Perforación', 'Se realizan agujeros a las piezas para prepararlas para el ensamblaje', 1),
(9, 'PO000009', 6, 'Soldadura', 'Se realizan soldaduras para la unión de las piezas.', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proceso_produccion`
--

CREATE TABLE `proceso_produccion` (
  `id_proceso_produccion` int(10) NOT NULL,
  `id_produccion` int(10) NOT NULL,
  `id_proceso` int(10) NOT NULL,
  `total_proceso_produccion` int(10) NOT NULL,
  `realizado_proceso_produccion` int(10) NOT NULL,
  `ind_proceso_produccion` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `proceso_produccion`
--

INSERT INTO `proceso_produccion` (`id_proceso_produccion`, `id_produccion`, `id_proceso`, `total_proceso_produccion`, `realizado_proceso_produccion`, `ind_proceso_produccion`) VALUES
(1, 1, 3, 30, 24, 1),
(2, 1, 8, 30, 24, 1),
(3, 1, 9, 30, 24, 1),
(4, 1, 2, 30, 24, 1),
(5, 1, 1, 30, 30, 1),
(6, 2, 3, 47, 15, 1),
(7, 2, 2, 47, 14, 1),
(8, 2, 1, 47, 11, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `produccion`
--

CREATE TABLE `produccion` (
  `id_produccion` int(10) NOT NULL,
  `id_pedido` int(10) NOT NULL,
  `id_producto` int(10) NOT NULL,
  `abre_produccion` varchar(10) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `inicio_produccion` date DEFAULT NULL,
  `fin_produccion` date DEFAULT NULL,
  `cantidad_produccion` int(10) DEFAULT NULL,
  `producido_produccion` int(10) DEFAULT NULL,
  `real_producción` int(10) DEFAULT '0',
  `total_reprocesado_produccion` int(10) DEFAULT '0',
  `monto_material_produccion` decimal(10,0) NOT NULL,
  `monto_trabajo_produccion` decimal(10,0) NOT NULL,
  `monto_indirecto_produccion` decimal(10,0) NOT NULL,
  `total_produccion` decimal(10,0) NOT NULL,
  `id_estado` int(10) NOT NULL,
  `ind_produccion` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `produccion`
--

INSERT INTO `produccion` (`id_produccion`, `id_pedido`, `id_producto`, `abre_produccion`, `inicio_produccion`, `fin_produccion`, `cantidad_produccion`, `producido_produccion`, `real_producción`, `total_reprocesado_produccion`, `monto_material_produccion`, `monto_trabajo_produccion`, `monto_indirecto_produccion`, `total_produccion`, `id_estado`, `ind_produccion`) VALUES
(1, 1, 3, 'OP000001', '2020-07-18', '2020-07-19', 30, 30, 24, 6, '9', '640', '50', '699', 4, 1),
(2, 2, 1, 'OP000002', '2020-07-19', '2020-07-19', 47, 11, 11, 3, '18', '1350', '144', '1512', 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_producto` int(10) NOT NULL,
  `abre_producto` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre_producto` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `id_categoria` int(10) NOT NULL,
  `stock_producto` int(20) DEFAULT NULL,
  `precio_producto` double DEFAULT NULL,
  `estado_producto` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `abre_producto`, `nombre_producto`, `id_categoria`, `stock_producto`, `precio_producto`, `estado_producto`) VALUES
(1, 'PR000001', 'Armazón Monoblock A', 1, 0, 40, 1),
(2, 'PR000002', 'Abrazadera Monoblock A', 1, 0, 3, 1),
(3, 'PR000003', 'Impulsor B/C', 1, 0, 27, 1),
(4, 'PR000004', 'Rodamiento A', 1, 0, 15, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id_rol` int(10) NOT NULL,
  `abre_rol` varchar(10) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `nombre_rol` varchar(250) COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion_rol` varchar(250) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `estado_rol` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id_rol`, `abre_rol`, `nombre_rol`, `descripcion_rol`, `estado_rol`) VALUES
(1, 'RO000001', 'Administrador', 'Usuario con privilegios de administrador.', 1),
(2, 'RO000002', 'Producción', 'Usuario con privilegios de producción.', 1),
(3, 'RO000003', 'Ventas', 'Usuario con privilegios de ventas.', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `timeline`
--

CREATE TABLE `timeline` (
  `id_timeline` int(10) NOT NULL,
  `id_proceso_produccion` int(10) NOT NULL,
  `fecha_timeline` date DEFAULT NULL,
  `cantidad_timeline` int(10) DEFAULT NULL,
  `reprocesado_timeline` int(10) NOT NULL DEFAULT '0',
  `incidencia_timeline` varchar(250) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `ind_timeline` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `timeline`
--

INSERT INTO `timeline` (`id_timeline`, `id_proceso_produccion`, `fecha_timeline`, `cantidad_timeline`, `reprocesado_timeline`, `incidencia_timeline`, `ind_timeline`) VALUES
(1, 1, '2020-07-18', 24, 0, '24', 1),
(2, 2, '2020-07-18', 24, 0, '24', 1),
(3, 3, '2020-07-18', 24, 0, 'Ninguna', 1),
(4, 4, '2020-07-18', 24, 6, 'Seis unidades se encuentran realizando labores adicionales', 1),
(5, 5, '2020-07-18', 24, 0, 'Ninguna', 1),
(6, 5, '2020-07-21', 4, 0, 'Ninguna', 1),
(7, 6, '2020-07-19', 15, 0, 'Ninguna', 1),
(8, 7, '2020-07-19', 14, 3, 'Hubieron imperfecciones en 3 productos', 1),
(9, 8, '2020-07-19', 11, 0, 'NInguna', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajo`
--

CREATE TABLE `trabajo` (
  `id_trabajo` int(10) NOT NULL,
  `id_produccion` int(10) NOT NULL,
  `fecha_trabajo` date DEFAULT NULL,
  `nempleados_trabajo` int(5) NOT NULL,
  `horas_trabajo` int(10) NOT NULL,
  `tasa_trabajo` int(10) NOT NULL,
  `monto_trabajo` int(10) NOT NULL,
  `estado_trabajo` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `trabajo`
--

INSERT INTO `trabajo` (`id_trabajo`, `id_produccion`, `fecha_trabajo`, `nempleados_trabajo`, `horas_trabajo`, `tasa_trabajo`, `monto_trabajo`, `estado_trabajo`) VALUES
(1, 1, '2020-07-18', 4, 8, 20, 640, 1),
(2, 2, '2020-07-19', 6, 9, 25, 1350, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(10) NOT NULL,
  `abre_usuario` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `id_empleado` int(10) NOT NULL,
  `user_usuario` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `password_usuario` varchar(150) COLLATE utf8_spanish2_ci NOT NULL,
  `id_rol` int(10) NOT NULL,
  `estado_usuario` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `abre_usuario`, `id_empleado`, `user_usuario`, `password_usuario`, `id_rol`, `estado_usuario`) VALUES
(1, 'US000001', 1, 'dhuatayg', 'f89650efdb4d831fdf4c40259be371aa100c28f1', 1, 1),
(2, 'US000002', 2, 'mrosarios', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, 1),
(3, 'US000003', 3, 'rgonzalesm', '7c4a8d09ca3762af61e59520943dc26494f8941b', 2, 1),
(4, 'US000004', 4, 'gsanchezc', '7c4a8d09ca3762af61e59520943dc26494f8941b', 3, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`id_area`),
  ADD UNIQUE KEY `nombre_area_UNIQUE` (`nombre_area`);

--
-- Indices de la tabla `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`id_cargo`),
  ADD UNIQUE KEY `nombre_cargo_UNIQUE` (`nombre_cargo`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`),
  ADD UNIQUE KEY `nombre_categoria_UNIQUE` (`nombre_categoria`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`),
  ADD UNIQUE KEY `ndocumento_cliente_UNIQUE` (`ndocumento_cliente`);

--
-- Indices de la tabla `detallepedido`
--
ALTER TABLE `detallepedido`
  ADD PRIMARY KEY (`id_detallepedido`),
  ADD KEY `fk_detallepedido_pedido_idx` (`id_pedido`),
  ADD KEY `fk_detallepedido_producto_idx` (`id_producto`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`id_empleado`),
  ADD KEY `fk_empleado_area_idx` (`id_area`),
  ADD KEY `fk_empleado_cargo_idx` (`id_cargo`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id_estado`),
  ADD UNIQUE KEY `nombre_estado` (`nombre_estado`);

--
-- Indices de la tabla `indirecto_produccion`
--
ALTER TABLE `indirecto_produccion`
  ADD PRIMARY KEY (`id_indirecto_produccion`),
  ADD KEY `fk_indirecto_produccion` (`id_produccion`);

--
-- Indices de la tabla `maproducto`
--
ALTER TABLE `maproducto`
  ADD PRIMARY KEY (`id_maproducto`),
  ADD KEY `fk_maproducto_producto_idx` (`id_producto`),
  ADD KEY `fk_maproducto_material_idx` (`id_material`);

--
-- Indices de la tabla `maquina`
--
ALTER TABLE `maquina`
  ADD PRIMARY KEY (`id_maquina`),
  ADD UNIQUE KEY `nombre_maquina_UNIQUE` (`nombre_maquina`),
  ADD KEY `fk_maquina_area_idx` (`id_area`);

--
-- Indices de la tabla `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`id_material`),
  ADD UNIQUE KEY `abre_material_UNIQUE` (`abre_material`),
  ADD UNIQUE KEY `nombre_material_UNIQUE` (`nombre_material`);

--
-- Indices de la tabla `mqproducto`
--
ALTER TABLE `mqproducto`
  ADD PRIMARY KEY (`id_mqproducto`),
  ADD KEY `fk_mqproducto_maquina_idx` (`id_maquina`),
  ADD KEY `fk_mqproducto_producto_idx` (`id_producto`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id_pedido`),
  ADD KEY `fk_pedido_cliente_idx` (`id_cliente`),
  ADD KEY `fk_pedido_estado` (`id_estado`);

--
-- Indices de la tabla `proceso`
--
ALTER TABLE `proceso`
  ADD PRIMARY KEY (`id_proceso`),
  ADD KEY `fk_proceso_area_idx` (`id_area`);

--
-- Indices de la tabla `proceso_produccion`
--
ALTER TABLE `proceso_produccion`
  ADD PRIMARY KEY (`id_proceso_produccion`),
  ADD KEY `fk_produccion_proc_produccion` (`id_produccion`),
  ADD KEY `fk_proceso_proc_produccion` (`id_proceso`) USING BTREE,
  ADD KEY `id_produccion` (`id_produccion`);

--
-- Indices de la tabla `produccion`
--
ALTER TABLE `produccion`
  ADD PRIMARY KEY (`id_produccion`),
  ADD KEY `fk_produccion_pedido_idx` (`id_pedido`),
  ADD KEY `fk_produccion_producto_idx` (`id_producto`),
  ADD KEY `fk_produccion_proceso_idx` (`id_estado`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`),
  ADD UNIQUE KEY `nombre_producto_UNIQUE` (`nombre_producto`),
  ADD KEY `fk_producto_categoria_idx` (`id_categoria`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_rol`),
  ADD UNIQUE KEY `nombre_rol_UNIQUE` (`nombre_rol`);

--
-- Indices de la tabla `timeline`
--
ALTER TABLE `timeline`
  ADD PRIMARY KEY (`id_timeline`),
  ADD KEY `fk_timeline_proceso_produccion` (`id_proceso_produccion`);

--
-- Indices de la tabla `trabajo`
--
ALTER TABLE `trabajo`
  ADD PRIMARY KEY (`id_trabajo`),
  ADD KEY `fk_trabajo_produccion_idx` (`id_produccion`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `user_usuario_UNIQUE` (`user_usuario`),
  ADD KEY `fk_usuario_rol_idx` (`id_rol`),
  ADD KEY `fk_usuario_empleado_idx` (`id_empleado`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `area`
--
ALTER TABLE `area`
  MODIFY `id_area` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `cargo`
--
ALTER TABLE `cargo`
  MODIFY `id_cargo` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `detallepedido`
--
ALTER TABLE `detallepedido`
  MODIFY `id_detallepedido` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `id_empleado` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `id_estado` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `indirecto_produccion`
--
ALTER TABLE `indirecto_produccion`
  MODIFY `id_indirecto_produccion` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `maproducto`
--
ALTER TABLE `maproducto`
  MODIFY `id_maproducto` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `maquina`
--
ALTER TABLE `maquina`
  MODIFY `id_maquina` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `material`
--
ALTER TABLE `material`
  MODIFY `id_material` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `mqproducto`
--
ALTER TABLE `mqproducto`
  MODIFY `id_mqproducto` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id_pedido` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `proceso`
--
ALTER TABLE `proceso`
  MODIFY `id_proceso` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `proceso_produccion`
--
ALTER TABLE `proceso_produccion`
  MODIFY `id_proceso_produccion` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `produccion`
--
ALTER TABLE `produccion`
  MODIFY `id_produccion` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id_rol` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `timeline`
--
ALTER TABLE `timeline`
  MODIFY `id_timeline` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `trabajo`
--
ALTER TABLE `trabajo`
  MODIFY `id_trabajo` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detallepedido`
--
ALTER TABLE `detallepedido`
  ADD CONSTRAINT `fk_detallepedido_pedido` FOREIGN KEY (`id_pedido`) REFERENCES `pedido` (`id_pedido`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_detallepedido_producto` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `fk_empleado_area` FOREIGN KEY (`id_area`) REFERENCES `area` (`id_area`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_empleado_cargo` FOREIGN KEY (`id_cargo`) REFERENCES `cargo` (`id_cargo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `indirecto_produccion`
--
ALTER TABLE `indirecto_produccion`
  ADD CONSTRAINT `fk_indirecto_produccion` FOREIGN KEY (`id_produccion`) REFERENCES `produccion` (`id_produccion`);

--
-- Filtros para la tabla `maproducto`
--
ALTER TABLE `maproducto`
  ADD CONSTRAINT `fk_maproducto_material` FOREIGN KEY (`id_material`) REFERENCES `material` (`id_material`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_maproducto_producto` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `maquina`
--
ALTER TABLE `maquina`
  ADD CONSTRAINT `fk_maquina_area` FOREIGN KEY (`id_area`) REFERENCES `area` (`id_area`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `mqproducto`
--
ALTER TABLE `mqproducto`
  ADD CONSTRAINT `fk_mqproducto_maquina` FOREIGN KEY (`id_maquina`) REFERENCES `maquina` (`id_maquina`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_mqproducto_producto` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `fk_pedido_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pedido_estado` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `proceso`
--
ALTER TABLE `proceso`
  ADD CONSTRAINT `fk_proceso_area` FOREIGN KEY (`id_area`) REFERENCES `area` (`id_area`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `proceso_produccion`
--
ALTER TABLE `proceso_produccion`
  ADD CONSTRAINT `fk_proceso_proc_produccion` FOREIGN KEY (`id_proceso`) REFERENCES `proceso` (`id_proceso`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_produccion_proc_produccion` FOREIGN KEY (`id_produccion`) REFERENCES `produccion` (`id_produccion`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `produccion`
--
ALTER TABLE `produccion`
  ADD CONSTRAINT `fk_produccion_estado` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`),
  ADD CONSTRAINT `fk_produccion_pedido` FOREIGN KEY (`id_pedido`) REFERENCES `pedido` (`id_pedido`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_produccion_producto` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `fk_producto_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `timeline`
--
ALTER TABLE `timeline`
  ADD CONSTRAINT `fk_timeline_proceso_produccion` FOREIGN KEY (`id_proceso_produccion`) REFERENCES `proceso_produccion` (`id_proceso_produccion`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `trabajo`
--
ALTER TABLE `trabajo`
  ADD CONSTRAINT `fk_trabajo_produccion` FOREIGN KEY (`id_produccion`) REFERENCES `produccion` (`id_produccion`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_empleado` FOREIGN KEY (`id_empleado`) REFERENCES `empleado` (`id_empleado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuario_rol` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
