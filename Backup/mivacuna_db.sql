-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-02-2023 a las 18:46:40
-- Versión del servidor: 8.0.28
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mivacuna_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `c_medico`
--

CREATE TABLE `c_medico` (
  `id_centromedico` char(6) COLLATE utf8mb4_general_ci NOT NULL,
  `nombre` varchar(40) COLLATE utf8mb4_general_ci NOT NULL,
  `direccion` varchar(40) COLLATE utf8mb4_general_ci NOT NULL,
  `reserva` varchar(500) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `c_medico`
--

INSERT INTO `c_medico` (`id_centromedico`, `nombre`, `direccion`, `reserva`) VALUES
('CEN001', 'Clinica Ricardo Palma', 'Av. Ricardo Palma 141242', 'https://www.crp.com.pe'),
('NULL', 'No asignado', 'No asignado', 'No asignado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dni`
--

CREATE TABLE `dni` (
  `dni_id` char(8) COLLATE utf8mb4_general_ci NOT NULL,
  `nombres` varchar(40) COLLATE utf8mb4_general_ci NOT NULL,
  `apellido_p` varchar(40) COLLATE utf8mb4_general_ci NOT NULL,
  `apellido_m` varchar(40) COLLATE utf8mb4_general_ci NOT NULL,
  `reniec_id_reniec` char(6) COLLATE utf8mb4_general_ci NOT NULL,
  `f_emision` date NOT NULL,
  `f_nacimiento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `dni`
--

INSERT INTO `dni` (`dni_id`, `nombres`, `apellido_p`, `apellido_m`, `reniec_id_reniec`, `f_emision`, `f_nacimiento`) VALUES
('60449003', 'Juan Carlos', 'Tuncar', 'Ruiz', 'REN001', '2018-02-08', '1996-05-15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `doctor`
--

CREATE TABLE `doctor` (
  `id_doctor` char(6) COLLATE utf8mb4_general_ci NOT NULL,
  `dni_dni_id` char(8) COLLATE utf8mb4_general_ci NOT NULL,
  `c_medico_id_centromedico` char(6) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE `paciente` (
  `id_paciente` char(6) COLLATE utf8mb4_general_ci NOT NULL,
  `dni_dni_id` char(8) COLLATE utf8mb4_general_ci NOT NULL,
  `direccion` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `correo` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `telefono` decimal(9,0) NOT NULL,
  `paciente_foto` varchar(200) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`id_paciente`, `dni_dni_id`, `direccion`, `correo`, `telefono`, `paciente_foto`) VALUES
('PC0001', '60449003', 'Av. Peru 15531', 'juanc@gmail.com', '997004985', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pend`
--

CREATE TABLE `pend` (
  `id_pendiente` char(6) COLLATE utf8mb4_general_ci NOT NULL,
  `estado` char(1) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pend`
--

INSERT INTO `pend` (`id_pendiente`, `estado`) VALUES
('PEN_01', '0'),
('PEN_02', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reniec`
--

CREATE TABLE `reniec` (
  `id_reniec` char(6) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `reniec`
--

INSERT INTO `reniec` (`id_reniec`) VALUES
('REN001');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `r_general`
--

CREATE TABLE `r_general` (
  `id_repogeneral` char(6) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `r_general`
--

INSERT INTO `r_general` (`id_repogeneral`) VALUES
('REGR01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `r_perso`
--

CREATE TABLE `r_perso` (
  `id_repopersonal` char(6) COLLATE utf8mb4_general_ci NOT NULL,
  `r_general_id_repogeneral` char(6) COLLATE utf8mb4_general_ci NOT NULL,
  `vacuna_id_vacuna` char(6) COLLATE utf8mb4_general_ci NOT NULL,
  `paciente_id_paciente` char(6) COLLATE utf8mb4_general_ci NOT NULL,
  `id_vapend` char(6) COLLATE utf8mb4_general_ci NOT NULL,
  `id_centromedico` char(6) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `r_perso`
--

INSERT INTO `r_perso` (`id_repopersonal`, `r_general_id_repogeneral`, `vacuna_id_vacuna`, `paciente_id_paciente`, `id_vapend`, `id_centromedico`) VALUES
('REP001', 'REGR01', 'VAC001', 'PC0001', 'VAPE01', 'CEN001'),
('REP002', 'REGR01', 'VAC002', 'PC0001', 'VAPE01', 'CEN001'),
('REP003', 'REGR01', 'VAC004', 'PC0001', 'VAPE01', 'CEN001');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_vacuna`
--

CREATE TABLE `t_vacuna` (
  `id_tipovacuna` char(6) COLLATE utf8mb4_general_ci NOT NULL,
  `caract` varchar(100) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `t_vacuna`
--

INSERT INTO `t_vacuna` (`id_tipovacuna`, `caract`) VALUES
('VAC001', 'Vacuna de tipo covid');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vacuna`
--

CREATE TABLE `vacuna` (
  `id_vacuna` char(6) COLLATE utf8mb4_general_ci NOT NULL,
  `nombre_Vacuna` varchar(40) COLLATE utf8mb4_general_ci NOT NULL,
  `lote` varchar(6) COLLATE utf8mb4_general_ci NOT NULL,
  `fabricante` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `t_vacuna_id_tipovacuna` char(6) COLLATE utf8mb4_general_ci NOT NULL,
  `fecha_vacunacion` date NOT NULL,
  `dosis` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `vacuna`
--

INSERT INTO `vacuna` (`id_vacuna`, `nombre_Vacuna`, `lote`, `fabricante`, `t_vacuna_id_tipovacuna`, `fecha_vacunacion`, `dosis`) VALUES
('VAC001', 'Covid-19', 'abc', 'Phizer', 'VAC001', '2022-02-16', 1),
('VAC002', 'Covid', 'abc', 'Phizer', 'VAC001', '2022-07-15', 2),
('VAC004', 'Influenza', 'abc', 'Marca', 'VAC001', '2020-02-13', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `v_dispo`
--

CREATE TABLE `v_dispo` (
  `vacuna_id_vacuna` char(6) COLLATE utf8mb4_general_ci NOT NULL,
  `c_medico_id_centromedico` char(6) COLLATE utf8mb4_general_ci NOT NULL,
  `disponibilidad` char(1) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `v_dispo`
--

INSERT INTO `v_dispo` (`vacuna_id_vacuna`, `c_medico_id_centromedico`, `disponibilidad`) VALUES
('VAC001', 'CEN001', '1'),
('VAC004', 'CEN001', '0'),
('VAC004', 'CEN001', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `v_pend`
--

CREATE TABLE `v_pend` (
  `id_vapend` char(6) COLLATE utf8mb4_general_ci NOT NULL,
  `vacuna_id_vacuna` char(6) COLLATE utf8mb4_general_ci NOT NULL,
  `f_estimadas` date NOT NULL,
  `pend_id_pendiente` char(6) COLLATE utf8mb4_general_ci NOT NULL,
  `paciente_id_paciente` char(6) COLLATE utf8mb4_general_ci NOT NULL,
  `dosis_pendiente` int NOT NULL,
  `id_centromedico` char(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `v_pend`
--

INSERT INTO `v_pend` (`id_vapend`, `vacuna_id_vacuna`, `f_estimadas`, `pend_id_pendiente`, `paciente_id_paciente`, `dosis_pendiente`, `id_centromedico`) VALUES
('VAPE01', 'VAC001', '2023-02-16', 'PEN_02', 'PC0001', 3, 'NULL'),
('VAPE02', 'VAC004', '2023-07-07', 'PEN_02', 'PC0001', 6, 'NULL'),
('VAPE03', 'VAC001', '2024-01-19', 'PEN_02', 'PC0001', 5, 'NULL');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `c_medico`
--
ALTER TABLE `c_medico`
  ADD PRIMARY KEY (`id_centromedico`),
  ADD UNIQUE KEY `id_centromedico` (`id_centromedico`);

--
-- Indices de la tabla `dni`
--
ALTER TABLE `dni`
  ADD PRIMARY KEY (`dni_id`),
  ADD KEY `dni_reniec_fk` (`reniec_id_reniec`);

--
-- Indices de la tabla `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id_doctor`),
  ADD KEY `doctor_c_medico_fk` (`c_medico_id_centromedico`),
  ADD KEY `doctor_dni_fk` (`dni_dni_id`);

--
-- Indices de la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`id_paciente`),
  ADD KEY `paciente_dni_fk` (`dni_dni_id`);

--
-- Indices de la tabla `pend`
--
ALTER TABLE `pend`
  ADD PRIMARY KEY (`id_pendiente`);

--
-- Indices de la tabla `reniec`
--
ALTER TABLE `reniec`
  ADD PRIMARY KEY (`id_reniec`);

--
-- Indices de la tabla `r_general`
--
ALTER TABLE `r_general`
  ADD PRIMARY KEY (`id_repogeneral`);

--
-- Indices de la tabla `r_perso`
--
ALTER TABLE `r_perso`
  ADD PRIMARY KEY (`id_repopersonal`),
  ADD KEY `r_perso_paciente_fk` (`paciente_id_paciente`),
  ADD KEY `r_perso_r_general_fk` (`r_general_id_repogeneral`),
  ADD KEY `r_perso_v_pend_fk` (`id_vapend`),
  ADD KEY `r_perso_vacuna_fk` (`vacuna_id_vacuna`),
  ADD KEY `fk_id_centromedico` (`id_centromedico`);

--
-- Indices de la tabla `t_vacuna`
--
ALTER TABLE `t_vacuna`
  ADD PRIMARY KEY (`id_tipovacuna`);

--
-- Indices de la tabla `vacuna`
--
ALTER TABLE `vacuna`
  ADD PRIMARY KEY (`id_vacuna`),
  ADD KEY `vacuna_t_vacuna_fk` (`t_vacuna_id_tipovacuna`);

--
-- Indices de la tabla `v_dispo`
--
ALTER TABLE `v_dispo`
  ADD KEY `v_dispo_c_medico_fk` (`c_medico_id_centromedico`),
  ADD KEY `v_dispo_vacuna_fk` (`vacuna_id_vacuna`);

--
-- Indices de la tabla `v_pend`
--
ALTER TABLE `v_pend`
  ADD PRIMARY KEY (`id_vapend`),
  ADD KEY `v_pend_paciente_fk` (`paciente_id_paciente`),
  ADD KEY `v_pend_pend_fk` (`pend_id_pendiente`),
  ADD KEY `v_pend_vacuna_fk` (`vacuna_id_vacuna`),
  ADD KEY `fk_c_medico` (`id_centromedico`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `dni`
--
ALTER TABLE `dni`
  ADD CONSTRAINT `dni_reniec_fk` FOREIGN KEY (`reniec_id_reniec`) REFERENCES `reniec` (`id_reniec`);

--
-- Filtros para la tabla `doctor`
--
ALTER TABLE `doctor`
  ADD CONSTRAINT `doctor_c_medico_fk` FOREIGN KEY (`c_medico_id_centromedico`) REFERENCES `c_medico` (`id_centromedico`),
  ADD CONSTRAINT `doctor_dni_fk` FOREIGN KEY (`dni_dni_id`) REFERENCES `dni` (`dni_id`);

--
-- Filtros para la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD CONSTRAINT `paciente_dni_fk` FOREIGN KEY (`dni_dni_id`) REFERENCES `dni` (`dni_id`);

--
-- Filtros para la tabla `r_perso`
--
ALTER TABLE `r_perso`
  ADD CONSTRAINT `fk_id_centromedico` FOREIGN KEY (`id_centromedico`) REFERENCES `c_medico` (`id_centromedico`),
  ADD CONSTRAINT `r_perso_paciente_fk` FOREIGN KEY (`paciente_id_paciente`) REFERENCES `paciente` (`id_paciente`),
  ADD CONSTRAINT `r_perso_r_general_fk` FOREIGN KEY (`r_general_id_repogeneral`) REFERENCES `r_general` (`id_repogeneral`),
  ADD CONSTRAINT `r_perso_v_pend_fk` FOREIGN KEY (`id_vapend`) REFERENCES `v_pend` (`id_vapend`),
  ADD CONSTRAINT `r_perso_vacuna_fk` FOREIGN KEY (`vacuna_id_vacuna`) REFERENCES `vacuna` (`id_vacuna`);

--
-- Filtros para la tabla `vacuna`
--
ALTER TABLE `vacuna`
  ADD CONSTRAINT `vacuna_t_vacuna_fk` FOREIGN KEY (`t_vacuna_id_tipovacuna`) REFERENCES `t_vacuna` (`id_tipovacuna`);

--
-- Filtros para la tabla `v_dispo`
--
ALTER TABLE `v_dispo`
  ADD CONSTRAINT `v_dispo_c_medico_fk` FOREIGN KEY (`c_medico_id_centromedico`) REFERENCES `c_medico` (`id_centromedico`),
  ADD CONSTRAINT `v_dispo_vacuna_fk` FOREIGN KEY (`vacuna_id_vacuna`) REFERENCES `vacuna` (`id_vacuna`);

--
-- Filtros para la tabla `v_pend`
--
ALTER TABLE `v_pend`
  ADD CONSTRAINT `fk_c_medico` FOREIGN KEY (`id_centromedico`) REFERENCES `c_medico` (`id_centromedico`),
  ADD CONSTRAINT `v_pend_paciente_fk` FOREIGN KEY (`paciente_id_paciente`) REFERENCES `paciente` (`id_paciente`),
  ADD CONSTRAINT `v_pend_pend_fk` FOREIGN KEY (`pend_id_pendiente`) REFERENCES `pend` (`id_pendiente`),
  ADD CONSTRAINT `v_pend_vacuna_fk` FOREIGN KEY (`vacuna_id_vacuna`) REFERENCES `vacuna` (`id_vacuna`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
