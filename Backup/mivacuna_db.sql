-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2023 at 06:14 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mivacuna_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `c_medico`
--

CREATE TABLE `c_medico` (
  `id_centromedico` char(6) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `direccion` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dni`
--

CREATE TABLE `dni` (
  `dni_id` char(8) NOT NULL,
  `nombres` varchar(40) NOT NULL,
  `apellido_p` varchar(40) NOT NULL,
  `apellido_m` varchar(40) NOT NULL,
  `reniec_id_reniec` char(6) NOT NULL,
  `f_emision` date NOT NULL,
  `f_nacimiento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `id_doctor` char(6) NOT NULL,
  `dni_dni_id` char(8) NOT NULL,
  `c_medico_id_centromedico` char(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `paciente`
--

CREATE TABLE `paciente` (
  `id_paciente` char(6) NOT NULL,
  `dni_dni_id` char(8) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `telefono` decimal(9,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pend`
--

CREATE TABLE `pend` (
  `id_pendiente` char(6) NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reniec`
--

CREATE TABLE `reniec` (
  `id_reniec` char(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `r_general`
--

CREATE TABLE `r_general` (
  `id_repogeneral` char(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `r_perso`
--

CREATE TABLE `r_perso` (
  `id_repopersonal` char(6) NOT NULL,
  `r_general_id_repogeneral` char(6) NOT NULL,
  `vacuna_id_vacuna` char(6) NOT NULL,
  `paciente_id_paciente` char(6) NOT NULL,
  `id_vapend` char(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_vacuna`
--

CREATE TABLE `t_vacuna` (
  `id_tipovacuna` char(6) NOT NULL,
  `caract` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vacuna`
--

CREATE TABLE `vacuna` (
  `id_vacuna` char(6) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `lote` varchar(6) NOT NULL,
  `fabricante` varchar(50) NOT NULL,
  `t_vacuna_id_tipovacuna` char(6) NOT NULL,
  `fecha_vacunacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `v_dispo`
--

CREATE TABLE `v_dispo` (
  `vacuna_id_vacuna` char(6) NOT NULL,
  `c_medico_id_centromedico` char(6) NOT NULL,
  `disponibilidad` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `v_pend`
--

CREATE TABLE `v_pend` (
  `id_vapend` char(6) NOT NULL,
  `vacuna_id_vacuna` char(6) NOT NULL,
  `f_estimadas` date NOT NULL,
  `pend_id_pendiente` char(6) NOT NULL,
  `paciente_id_paciente` char(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `c_medico`
--
ALTER TABLE `c_medico`
  ADD PRIMARY KEY (`id_centromedico`);

--
-- Indexes for table `dni`
--
ALTER TABLE `dni`
  ADD PRIMARY KEY (`dni_id`),
  ADD KEY `dni_reniec_fk` (`reniec_id_reniec`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id_doctor`),
  ADD KEY `doctor_c_medico_fk` (`c_medico_id_centromedico`),
  ADD KEY `doctor_dni_fk` (`dni_dni_id`);

--
-- Indexes for table `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`id_paciente`),
  ADD KEY `paciente_dni_fk` (`dni_dni_id`);

--
-- Indexes for table `pend`
--
ALTER TABLE `pend`
  ADD PRIMARY KEY (`id_pendiente`);

--
-- Indexes for table `reniec`
--
ALTER TABLE `reniec`
  ADD PRIMARY KEY (`id_reniec`);

--
-- Indexes for table `r_general`
--
ALTER TABLE `r_general`
  ADD PRIMARY KEY (`id_repogeneral`);

--
-- Indexes for table `r_perso`
--
ALTER TABLE `r_perso`
  ADD PRIMARY KEY (`id_repopersonal`),
  ADD KEY `r_perso_paciente_fk` (`paciente_id_paciente`),
  ADD KEY `r_perso_r_general_fk` (`r_general_id_repogeneral`),
  ADD KEY `r_perso_v_pend_fk` (`id_vapend`),
  ADD KEY `r_perso_vacuna_fk` (`vacuna_id_vacuna`);

--
-- Indexes for table `t_vacuna`
--
ALTER TABLE `t_vacuna`
  ADD PRIMARY KEY (`id_tipovacuna`);

--
-- Indexes for table `vacuna`
--
ALTER TABLE `vacuna`
  ADD PRIMARY KEY (`id_vacuna`),
  ADD KEY `vacuna_t_vacuna_fk` (`t_vacuna_id_tipovacuna`);

--
-- Indexes for table `v_dispo`
--
ALTER TABLE `v_dispo`
  ADD KEY `v_dispo_c_medico_fk` (`c_medico_id_centromedico`),
  ADD KEY `v_dispo_vacuna_fk` (`vacuna_id_vacuna`);

--
-- Indexes for table `v_pend`
--
ALTER TABLE `v_pend`
  ADD PRIMARY KEY (`id_vapend`),
  ADD KEY `v_pend_paciente_fk` (`paciente_id_paciente`),
  ADD KEY `v_pend_pend_fk` (`pend_id_pendiente`),
  ADD KEY `v_pend_vacuna_fk` (`vacuna_id_vacuna`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dni`
--
ALTER TABLE `dni`
  ADD CONSTRAINT `dni_reniec_fk` FOREIGN KEY (`reniec_id_reniec`) REFERENCES `reniec` (`id_reniec`);

--
-- Constraints for table `doctor`
--
ALTER TABLE `doctor`
  ADD CONSTRAINT `doctor_c_medico_fk` FOREIGN KEY (`c_medico_id_centromedico`) REFERENCES `c_medico` (`id_centromedico`),
  ADD CONSTRAINT `doctor_dni_fk` FOREIGN KEY (`dni_dni_id`) REFERENCES `dni` (`dni_id`);

--
-- Constraints for table `paciente`
--
ALTER TABLE `paciente`
  ADD CONSTRAINT `paciente_dni_fk` FOREIGN KEY (`dni_dni_id`) REFERENCES `dni` (`dni_id`);

--
-- Constraints for table `r_perso`
--
ALTER TABLE `r_perso`
  ADD CONSTRAINT `r_perso_paciente_fk` FOREIGN KEY (`paciente_id_paciente`) REFERENCES `paciente` (`id_paciente`),
  ADD CONSTRAINT `r_perso_r_general_fk` FOREIGN KEY (`r_general_id_repogeneral`) REFERENCES `r_general` (`id_repogeneral`),
  ADD CONSTRAINT `r_perso_v_pend_fk` FOREIGN KEY (`id_vapend`) REFERENCES `v_pend` (`id_vapend`),
  ADD CONSTRAINT `r_perso_vacuna_fk` FOREIGN KEY (`vacuna_id_vacuna`) REFERENCES `vacuna` (`id_vacuna`);

--
-- Constraints for table `vacuna`
--
ALTER TABLE `vacuna`
  ADD CONSTRAINT `vacuna_t_vacuna_fk` FOREIGN KEY (`t_vacuna_id_tipovacuna`) REFERENCES `t_vacuna` (`id_tipovacuna`);

--
-- Constraints for table `v_dispo`
--
ALTER TABLE `v_dispo`
  ADD CONSTRAINT `v_dispo_c_medico_fk` FOREIGN KEY (`c_medico_id_centromedico`) REFERENCES `c_medico` (`id_centromedico`),
  ADD CONSTRAINT `v_dispo_vacuna_fk` FOREIGN KEY (`vacuna_id_vacuna`) REFERENCES `vacuna` (`id_vacuna`);

--
-- Constraints for table `v_pend`
--
ALTER TABLE `v_pend`
  ADD CONSTRAINT `v_pend_paciente_fk` FOREIGN KEY (`paciente_id_paciente`) REFERENCES `paciente` (`id_paciente`),
  ADD CONSTRAINT `v_pend_pend_fk` FOREIGN KEY (`pend_id_pendiente`) REFERENCES `pend` (`id_pendiente`),
  ADD CONSTRAINT `v_pend_vacuna_fk` FOREIGN KEY (`vacuna_id_vacuna`) REFERENCES `vacuna` (`id_vacuna`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;