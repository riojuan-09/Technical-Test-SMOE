-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2024 at 01:55 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_smoe`
--

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`) VALUES
(1, 'Finance'),
(2, 'Human Resource'),
(3, 'Engineering'),
(4, 'IT Development');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `employee_id` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `job_title` varchar(255) NOT NULL,
  `department_id` int(11) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `date_hired` date DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `employee_id`, `first_name`, `last_name`, `job_title`, `department_id`, `date_of_birth`, `date_hired`, `email`, `phone_number`, `address`, `pass`) VALUES
(16, 'ID001', 'Alex', 'Chandra', 'IT Infrastucture', 4, '1997-06-18', '2022-06-14', 'alex@gmail.com', '081262373637', 'Batam', '$2y$10$/miVulXnWHFiXkF6QVw4yOkoS.xeFcENPH7z7.6JmCITQNTQ1mBIm'),
(21, 'ID002', 'Jennie', 'Julie', 'HR Staff', 2, '1999-07-12', '2022-07-12', 'jennie@gmail.com', '08315378136', 'Batam', '$2y$10$JaagN5xtgS8wPtL38WKaCO8e4JBCPnEw/sKsXePdYOpR2mmOkCKqi'),
(22, 'ID003', 'Hendra', 'Jaya', 'Finance Staff', 1, '1998-02-02', '2021-02-09', 'hendra@gmail.com', '081276348728', 'Batam\r\n', '$2y$10$wy7WRojfdxQgpjPLSu3OruKgza3LCcqiBf/JISsZUo/vKwfw7e/0i'),
(23, 'ID004', 'Ajeng', 'Dewi', 'Payroll Officer', 2, '2000-09-08', '2023-09-07', 'ajeng@gmail.com', '0812626823', 'Batam', '$2y$10$TvXE.b/Rqb4aynOo8ub.Q.8RpGVXfKF8fNs1wXfMB5fwQraDKf8K.'),
(24, 'ID005', 'Kartika', 'Putri', 'Material Engineer', 3, '1998-09-09', '2024-02-03', 'kartika@gmail.com', '081267828635', 'Batam\r\n', '$2y$10$50GIDMQBJ.z6eeNGHElYRu2Iv/YKwcBbOiSOpAbe7xmIGk7sJUNdC'),
(25, 'ID006', 'Putra', 'Jaya', 'Mechanical Engineering', 3, '2000-03-05', '2023-02-04', 'putra@gmail.com', '08127236428', 'Batam', '$2y$10$qo3WZl7XlnZ.XePZPsEC2uXno/HHIUem32qmzTp9htuKGaFCwOZ9K'),
(26, 'ID007', 'Ayu', 'Sinta', 'System Analyst', 4, '1996-02-02', '2022-02-04', 'ayu@gmail.com', '0816327468', 'Batam\r\n', '$2y$10$qgaIHUuY8E53pS1gPBJBee1T1MB4XxG0oUzHATVwY9AmRT2QLP2eq'),
(27, 'ID008', 'Shintia', 'Lubis', 'IT Programmer', 4, '2000-07-04', '2024-02-05', 'shintia@gmail.com', '08216354736', 'Batam\r\n', '$2y$10$lDFIAGv4l67OIXpI4jl.Vee0Ea.Tsq9r3CQPCOYJdhAXxTzPK29Le');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `department_id` (`department_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
