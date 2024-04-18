-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 18-04-2024 a las 19:42:33
-- Versión del servidor: 11.3.2-MariaDB
-- Versión de PHP: 8.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `prueba1`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_login`
--

CREATE TABLE `t_login` (
  `id_login` int(11) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `t_login`
--

INSERT INTO `t_login` (`id_login`, `email`, `password`) VALUES
(1, 'prueba@gmail.com', '1234'),
(3, 'prueba1@gmail.com', '1234'),
(4, 'prueba3@gmail.com', '$2y$10$W4F30ZmqH7.Ln7Qh7wUjHe1C3VaVmxT6mp3l40x3tB9sK/NQ5eSF.'),
(5, 'diego@mail.com', '$2y$10$ywzW0g1k8htXT5xCtSMzE.z.FS3iRL51c/cnKv8TJtthB0c2K.2/S'),
(6, 'diego@mail.com', '$2y$10$tEH/rgko8ldjzOHcL68Kou7xf/43erm/t/7jgfyTy6cNs7K8cseTO'),
(7, 'prueba5@gmail.com', '$2y$10$auTkELY.eNfed5Lfeu1ajO.DAECoUnNT0R5nvb9q.1gZ.lPCdmnhS'),
(8, 'prueba6@gmail.com', '$2y$10$UVqprAubesivKPb52kA30epNeM2AaPNL3V9tQz24A36AYRVutDvt6'),
(9, 'prueba7@gmail.com', '$2y$10$sGAE2kpGBr9wmPKYAD1swe/KwhgVni3hV9.0nJVjFO32C0dfgl0N.'),
(10, 'prueba4@gmail.com ', '$2y$10$sGmEZe69iasLvY15rQ0HneF5ehH6CV8XjBHpadthZSuvmAOvjVTau');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_persona`
--

CREATE TABLE `t_persona` (
  `id_persona` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `t_persona`
--

INSERT INTO `t_persona` (`id_persona`, `nombre`, `apellido`, `email`) VALUES
(1, 'juan', 'de la cruz', 'juan@gmail.com'),
(2, 'juan', 'de la cruz', 'juan@gmail.com'),
(3, 'Ezequiel', 'mendoza', 'ezequiel@gmail.com'),
(4, 'Ezequiel', 'mendoza', 'ezequiel@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_productos`
--

CREATE TABLE `t_productos` (
  `id_producto` int(11) NOT NULL,
  `nombre` varchar(250) DEFAULT NULL,
  `marca` varchar(250) DEFAULT NULL,
  `precio` int(250) DEFAULT NULL,
  `cantidad` int(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `t_productos`
--

INSERT INTO `t_productos` (`id_producto`, `nombre`, `marca`, `precio`, `cantidad`) VALUES
(2, 'audifonos', 'razer', 800, 10),
(3, 'audifonos', 'logitech', 1000, 2),
(4, 'mouse', 'razer', 700, 1),
(6, 'audifonos', 'sony', 300, 1),
(7, 'audifonos', 'jbl', 1000, 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `t_login`
--
ALTER TABLE `t_login`
  ADD PRIMARY KEY (`id_login`);

--
-- Indices de la tabla `t_persona`
--
ALTER TABLE `t_persona`
  ADD PRIMARY KEY (`id_persona`);

--
-- Indices de la tabla `t_productos`
--
ALTER TABLE `t_productos`
  ADD PRIMARY KEY (`id_producto`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `t_login`
--
ALTER TABLE `t_login`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `t_persona`
--
ALTER TABLE `t_persona`
  MODIFY `id_persona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `t_productos`
--
ALTER TABLE `t_productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
