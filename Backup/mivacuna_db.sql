-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2023 at 06:27 PM
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
-- Table structure for table `colegio_medico`
--

CREATE TABLE `colegio_medico` (
  `id_colegiomedico` char(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `colegio_medico`
--

INSERT INTO `colegio_medico` (`id_colegiomedico`) VALUES
('CM0001');

-- --------------------------------------------------------

--
-- Table structure for table `credenciales`
--

CREATE TABLE `credenciales` (
  `n_colegiado` char(6) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `grado` varchar(100) NOT NULL,
  `universidad` varchar(100) NOT NULL,
  `especialidad` varchar(100) NOT NULL,
  `id_colegiomedico` char(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `credenciales`
--

INSERT INTO `credenciales` (`n_colegiado`, `titulo`, `grado`, `universidad`, `especialidad`, `id_colegiomedico`) VALUES
('103881', 'Doctor', 'Licenciado', 'Universidad San Marcos', 'Medicina General', 'CM0001'),
('123456', 'Doctor', 'Licenciado', 'Universidad de Lima', 'Medicina General', 'CM0001');

-- --------------------------------------------------------

--
-- Table structure for table `c_medico`
--

CREATE TABLE `c_medico` (
  `id_centromedico` char(6) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `direccion` varchar(40) NOT NULL,
  `reserva` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `c_medico`
--

INSERT INTO `c_medico` (`id_centromedico`, `nombre`, `direccion`, `reserva`) VALUES
('CEN001', 'Clinica Ricardo Palma', 'Av. Ricardo Palma 141242', 'https://www.crp.com.pe'),
('NULL', 'No asignado', 'No asignado', 'No asignado');

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

--
-- Dumping data for table `dni`
--

INSERT INTO `dni` (`dni_id`, `nombres`, `apellido_p`, `apellido_m`, `reniec_id_reniec`, `f_emision`, `f_nacimiento`) VALUES
('60449001', 'Jose Miguel', 'Hurtado', 'Abanto', 'REN001', '2022-12-01', '2000-02-03'),
('60449003', 'Juan Carlos', 'Tuncar', 'Ruiz', 'REN001', '2018-02-08', '1996-05-15'),
('70112005', 'Luis Daniel', 'Diaz', 'Espinoza', 'REN001', '2012-01-01', '1980-01-01'),
('70558994', 'Javier Junio', 'Caycho', 'Zamudio', 'REN001', '2018-10-10', '1996-10-10'),
('70668994', 'Daniel Luis', 'Valverde', 'Farfan', 'REN001', '2000-10-10', '1980-10-10'),
('71442231', 'Carlos Javier', 'Bravo', 'Espino', 'REN001', '2015-10-10', '1970-10-10');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `id_doctor` char(6) NOT NULL,
  `dni_dni_id` char(8) NOT NULL,
  `c_medico_id_centromedico` char(6) NOT NULL,
  `foto_doctor` varchar(1000) NOT NULL,
  `n_colegiado` char(6) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `contraseña` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`id_doctor`, `dni_dni_id`, `c_medico_id_centromedico`, `foto_doctor`, `n_colegiado`, `usuario`, `contraseña`) VALUES
('DC0001', '71442231', 'CEN001', '71442231.png', '103881', 'carlosdoc123', 'carlosdoc123'),
('DC0002', '70112005', 'CEN001', '70112005.png', '123456', 'luis123', 'luis123');

-- --------------------------------------------------------

--
-- Table structure for table `paciente`
--

CREATE TABLE `paciente` (
  `id_paciente` char(6) NOT NULL,
  `dni_dni_id` char(8) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `telefono` decimal(9,0) NOT NULL,
  `paciente_foto` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `paciente`
--

INSERT INTO `paciente` (`id_paciente`, `dni_dni_id`, `direccion`, `correo`, `telefono`, `paciente_foto`) VALUES
('PC0001', '60449003', 'Av. Peru 15531', 'juanc@gmail.com', '997004985', '60449003.png'),
('PC0002', '60449001', 'Jr. Pimentel 2012', 'josemiguel@gmail.com', '997883123', '60449001.png'),
('PC0003', '70558994', 'Jr. Pimentel 2000', 'javiercaycho@gmail.com', '997005674', '70558994.png'),
('PC0004', '70668994', 'Av. Salavery 24122', 'danielluis@gmail.com', '923123333', '70668994.png');

-- --------------------------------------------------------

--
-- Table structure for table `pend`
--

CREATE TABLE `pend` (
  `id_pendiente` char(6) NOT NULL,
  `estado` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pend`
--

INSERT INTO `pend` (`id_pendiente`, `estado`) VALUES
('PEN_01', '0'),
('PEN_02', '1');

-- --------------------------------------------------------

--
-- Table structure for table `reniec`
--

CREATE TABLE `reniec` (
  `id_reniec` char(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reniec`
--

INSERT INTO `reniec` (`id_reniec`) VALUES
('REN001');

-- --------------------------------------------------------

--
-- Table structure for table `r_general`
--

CREATE TABLE `r_general` (
  `id_repogeneral` char(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `r_general`
--

INSERT INTO `r_general` (`id_repogeneral`) VALUES
('REGR01');

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

--
-- Dumping data for table `r_perso`
--

INSERT INTO `r_perso` (`id_repopersonal`, `r_general_id_repogeneral`, `vacuna_id_vacuna`, `paciente_id_paciente`, `id_vapend`) VALUES
('REP001', 'REGR01', 'VAC001', 'PC0001', 'VAPE01'),
('REP002', 'REGR01', 'VAC002', 'PC0002', 'VAPE02'),
('REP003', 'REGR01', 'VAC004', 'PC0003', 'VAPE03');

-- --------------------------------------------------------

--
-- Table structure for table `t_vacuna`
--

CREATE TABLE `t_vacuna` (
  `id_tipovacuna` char(6) NOT NULL,
  `caract` varchar(100) NOT NULL,
  `nombre_Vacuna` varchar(40) NOT NULL,
  `lote` varchar(6) NOT NULL,
  `fabricante` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_vacuna`
--

INSERT INTO `t_vacuna` (`id_tipovacuna`, `caract`, `nombre_Vacuna`, `lote`, `fabricante`) VALUES
('VAC001', 'Vacuna de tipo covid', 'Covid-19', 'ABC-00', 'Phizer'),
('VAC002', 'Vacuna de Influenza', 'Influenza', 'ABC-02', 'Marca');

-- --------------------------------------------------------

--
-- Table structure for table `vacuna`
--

CREATE TABLE `vacuna` (
  `t_vacuna_id_tipovacuna` char(6) NOT NULL,
  `fecha_vacunacion` date NOT NULL,
  `dosis` int(11) NOT NULL,
  `paciente_id_paciente` char(6) NOT NULL,
  `id_centromedico` char(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vacuna`
--

INSERT INTO `vacuna` (`t_vacuna_id_tipovacuna`, `fecha_vacunacion`, `dosis`, `paciente_id_paciente`, `id_centromedico`) VALUES
('VAC001', '2022-02-16', 1, 'PC0001', 'CEN001'),
('VAC002', '2022-07-15', 2, 'PC0002', 'CEN001'),
('VAC001', '2020-02-13', 4, 'PC0003', 'CEN001'),
('VAC002', '2023-02-06', 1, 'PC0001', 'CEN001');

-- --------------------------------------------------------

--
-- Table structure for table `v_dispo`
--

CREATE TABLE `v_dispo` (
  `id_tipovacuna` char(6) NOT NULL,
  `c_medico_id_centromedico` char(6) NOT NULL,
  `disponibilidad` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `v_dispo`
--

INSERT INTO `v_dispo` (`id_tipovacuna`, `c_medico_id_centromedico`, `disponibilidad`) VALUES
('VAC002', 'CEN001', '1'),
('VAC002', 'CEN001', '0'),
('VAC002', 'CEN001', '1'),
('VAC001', 'NULL', '1');

-- --------------------------------------------------------

--
-- Table structure for table `v_pend`
--

CREATE TABLE `v_pend` (
  `f_estimadas` date DEFAULT NULL,
  `pend_id_pendiente` char(6) DEFAULT NULL,
  `paciente_id_paciente` char(6) DEFAULT NULL,
  `dosis_pendiente` int(11) DEFAULT NULL,
  `id_centromedico` char(6) DEFAULT NULL,
  `id_tipovacuna` char(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `v_pend`
--

INSERT INTO `v_pend` (`f_estimadas`, `pend_id_pendiente`, `paciente_id_paciente`, `dosis_pendiente`, `id_centromedico`, `id_tipovacuna`) VALUES
('2023-02-16', 'PEN_02', 'PC0001', 3, 'NULL', 'VAC001'),
('2023-07-07', 'PEN_02', 'PC0002', 6, 'NULL', 'VAC001'),
('2024-01-19', 'PEN_02', 'PC0003', 5, 'NULL', 'VAC001'),
('2022-02-10', 'PEN_02', 'PC0001', 4, 'NULL', 'VAC001');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `colegio_medico`
--
ALTER TABLE `colegio_medico`
  ADD PRIMARY KEY (`id_colegiomedico`);

--
-- Indexes for table `credenciales`
--
ALTER TABLE `credenciales`
  ADD PRIMARY KEY (`n_colegiado`),
  ADD KEY `fk_id_colegiomedico` (`id_colegiomedico`);

--
-- Indexes for table `c_medico`
--
ALTER TABLE `c_medico`
  ADD PRIMARY KEY (`id_centromedico`),
  ADD UNIQUE KEY `id_centromedico` (`id_centromedico`);

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
  ADD KEY `doctor_dni_fk` (`dni_dni_id`),
  ADD KEY `fk_n_colegiado` (`n_colegiado`);

--
-- Indexes for table `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`id_paciente`),
  ADD UNIQUE KEY `dni_dni_id` (`dni_dni_id`),
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
  ADD KEY `vacuna_t_vacuna_fk` (`t_vacuna_id_tipovacuna`),
  ADD KEY `fk_idpaciente` (`paciente_id_paciente`),
  ADD KEY `fk_idcentromedico` (`id_centromedico`);

--
-- Indexes for table `v_dispo`
--
ALTER TABLE `v_dispo`
  ADD KEY `v_dispo_c_medico_fk` (`c_medico_id_centromedico`),
  ADD KEY `fk_tipovacuna` (`id_tipovacuna`);

--
-- Indexes for table `v_pend`
--
ALTER TABLE `v_pend`
  ADD KEY `v_pend_paciente_fk` (`paciente_id_paciente`),
  ADD KEY `v_pend_pend_fk` (`pend_id_pendiente`),
  ADD KEY `fk_c_medico` (`id_centromedico`),
  ADD KEY `fk_id_tipovacuna` (`id_tipovacuna`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `credenciales`
--
ALTER TABLE `credenciales`
  ADD CONSTRAINT `fk_id_colegiomedico` FOREIGN KEY (`id_colegiomedico`) REFERENCES `colegio_medico` (`id_colegiomedico`);

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
  ADD CONSTRAINT `doctor_dni_fk` FOREIGN KEY (`dni_dni_id`) REFERENCES `dni` (`dni_id`),
  ADD CONSTRAINT `fk_n_colegiado` FOREIGN KEY (`n_colegiado`) REFERENCES `credenciales` (`n_colegiado`);

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
  ADD CONSTRAINT `fk_idcentromedico` FOREIGN KEY (`id_centromedico`) REFERENCES `c_medico` (`id_centromedico`),
  ADD CONSTRAINT `fk_idpaciente` FOREIGN KEY (`paciente_id_paciente`) REFERENCES `paciente` (`id_paciente`),
  ADD CONSTRAINT `vacuna_t_vacuna_fk` FOREIGN KEY (`t_vacuna_id_tipovacuna`) REFERENCES `t_vacuna` (`id_tipovacuna`);

--
-- Constraints for table `v_dispo`
--
ALTER TABLE `v_dispo`
  ADD CONSTRAINT `fk_tipovacuna` FOREIGN KEY (`id_tipovacuna`) REFERENCES `t_vacuna` (`id_tipovacuna`),
  ADD CONSTRAINT `v_dispo_c_medico_fk` FOREIGN KEY (`c_medico_id_centromedico`) REFERENCES `c_medico` (`id_centromedico`);

--
-- Constraints for table `v_pend`
--
ALTER TABLE `v_pend`
  ADD CONSTRAINT `fk_c_medico` FOREIGN KEY (`id_centromedico`) REFERENCES `c_medico` (`id_centromedico`),
  ADD CONSTRAINT `fk_id_tipovacuna` FOREIGN KEY (`id_tipovacuna`) REFERENCES `t_vacuna` (`id_tipovacuna`),
  ADD CONSTRAINT `v_pend_paciente_fk` FOREIGN KEY (`paciente_id_paciente`) REFERENCES `paciente` (`id_paciente`),
  ADD CONSTRAINT `v_pend_pend_fk` FOREIGN KEY (`pend_id_pendiente`) REFERENCES `pend` (`id_pendiente`),
  ADD CONSTRAINT `v_pend_vacuna_fk` FOREIGN KEY (`vacuna_id_vacuna`) REFERENCES `vacuna` (`id_vacuna`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
