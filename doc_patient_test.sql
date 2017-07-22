-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 22, 2017 at 12:06 अपराह्न
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `doc_patient_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(10) UNSIGNED NOT NULL,
  `appt_date` datetime DEFAULT NULL,
  `patient_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `is_confirmed` tinyint(1) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `appt_date`, `patient_id`, `doctor_id`, `is_confirmed`, `created`, `modified`) VALUES
(2, '2017-08-03 15:17:00', 3, 2, 0, '2017-07-22 04:40:29', '2017-07-22 05:40:50'),
(4, '2017-07-28 14:57:00', 6, 7, 0, '2017-07-22 05:13:05', '2017-07-22 05:13:05'),
(5, '2017-08-05 14:58:00', 4, 5, 1, '2017-07-22 05:13:36', '2017-07-22 06:04:21'),
(6, '2017-08-03 15:24:00', 3, 5, 0, '2017-07-22 05:33:28', '2017-07-22 05:33:28'),
(7, '2017-07-28 15:30:00', 3, 5, 0, '2017-07-22 05:45:53', '2017-07-22 05:45:53'),
(8, '2017-07-28 15:30:00', 3, 5, 0, '2017-07-22 05:51:18', '2017-07-22 05:51:18'),
(9, '2017-08-04 15:40:00', 3, 5, 0, '2017-07-22 05:55:37', '2017-07-22 05:55:37'),
(10, '2017-08-04 15:42:00', 3, 2, 0, '2017-07-22 05:57:15', '2017-07-22 05:57:15');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `firstname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `forgot_pass_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `forgot_pass_expire` datetime DEFAULT NULL,
  `role_id` tinyint(2) DEFAULT NULL COMMENT ' 1 => Admin, 2 => Doctor, 3 => Patient',
  `active` tinyint(1) NOT NULL COMMENT '0 => inactive , 1 => active',
  `last_login` datetime DEFAULT NULL,
  `last_login_ip` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `email`, `password`, `forgot_pass_token`, `forgot_pass_expire`, `role_id`, `active`, `last_login`, `last_login_ip`, `created`, `modified`) VALUES
(1, 'adminf', 'adminl', 'admin', 'admin@admin.com', '$2y$10$0S.lNr72Xb7cECnPtAeFOeJNRKmKaXo.XqDfb9MuvbkftUD.xDkLy', '', NULL, 1, 1, '2017-07-22 05:29:49', '127.0.0.1', '2017-07-22 03:00:44', '2017-07-22 05:29:49'),
(2, 'doctorf', 'doctorl', 'doctor', 'nabinem_yakthumba@yahoo.com', '$2y$10$iZFGjIjxCECR/l3V6WeXvOK49tjHGRgJFW8nQ6tJDBieBhiR6vJCq', '', NULL, 2, 1, '2017-07-22 05:40:42', '127.0.0.1', '2017-07-22 03:01:20', '2017-07-22 05:45:22'),
(3, 'patientF', 'patientL', 'patient', 'yakthumbanabinem@gmail.com', '$2y$10$eKRMqRoSd3BQ1mBsa2g0YeyuurVSXV1wGPY4etqLlkuICiXxQeX1i', '', NULL, 3, 1, '2017-07-22 06:01:16', '127.0.0.1', '2017-07-22 03:03:58', '2017-07-22 06:01:47'),
(4, 'Patientb', 'PatientbL', 'patientb', 'patientb@patient.com', '$2y$10$TJYqtjafot/PsPTbHJzc5eDtgK/EFYD2ebiubhyNRNO4TldmToqba', '', NULL, 3, 1, NULL, '', '2017-07-22 03:05:47', '2017-07-22 03:05:47'),
(5, 'doctor2', 'doc', 'doctor2', 'doctor2@doc.com', '$2y$10$ijxlmIjf.9jrPimLwbelIObtCbIajZ0MBDzXvrfhnWxBfGWa0IEcS', '', NULL, 2, 1, '2017-07-22 06:02:12', '127.0.0.1', '2017-07-22 03:49:12', '2017-07-22 06:02:12'),
(6, 'Patient3', 'Patient3l', 'patient3', 'patient3@patient.com', '$2y$10$zSZHKH1UZUFnvgFT2M1ygum3J0i6AiaGnH5Uj.3m/sNGwgadDMl7K', '', NULL, 3, 1, NULL, '', '2017-07-22 04:25:10', '2017-07-22 04:25:10'),
(7, 'doc3', 'doc', 'doctor3', 'doctor3@doc.com', '$2y$10$RDiATmL36xSm8eNYi3cV1.YPdHPboPS14zVDP9gGFG66mV2UdMYWm', '', NULL, 2, 1, NULL, '', '2017-07-22 04:27:37', '2017-07-22 04:27:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
