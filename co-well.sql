-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 04, 2021 at 03:56 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `co-well`
--

-- --------------------------------------------------------

--
-- Table structure for table `co-well_admin_credentials`
--

CREATE TABLE `co-well_admin_credentials` (
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `co-well_admin_credentials`
--

INSERT INTO `co-well_admin_credentials` (`username`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `co-well_admin_users`
--

CREATE TABLE `co-well_admin_users` (
  `name` varchar(25) NOT NULL,
  `email` varchar(35) NOT NULL,
  `age` int(10) NOT NULL,
  `vaccinedose1` varchar(20) NOT NULL,
  `hospitaldose1` varchar(25) NOT NULL,
  `datedose1` date NOT NULL,
  `vaccinedose2` varchar(20) NOT NULL,
  `hospitaldose2` varchar(25) NOT NULL,
  `datedose2` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `co-well_admin_users`
--

INSERT INTO `co-well_admin_users` (`name`, `email`, `age`, `vaccinedose1`, `hospitaldose1`, `datedose1`, `vaccinedose2`, `hospitaldose2`, `datedose2`) VALUES
('guru', 'guru@gmail.com', 34, 'covaxin', 'frontline', '2021-08-05', 'covaxin', 'appolo', '2021-08-28'),
('sreevatsan', 'sreevatsanm@gmail.com', 47, 'covaxin', 'raju', '2021-08-29', 'covaxin', 'raju', '2021-08-13'),
('venkatesh', 'venkatesh.mds@gmail.com', 44, 'covaxin', 'frontline', '2021-08-13', '-', '-', '0000-00-00'),
('krishnaa', 'krishnaa2902@gmail.com', 19, 'covishield', 'kauvery', '2021-08-05', 'covishield', 'appolo', '2021-08-10'),
('krishnaa', 'krishnaa2902@gmail.com', 19, 'covishield', 'kauvery', '2021-08-05', '-', '-', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `co-well_hospitals`
--

CREATE TABLE `co-well_hospitals` (
  `name` varchar(20) NOT NULL,
  `area` varchar(20) NOT NULL,
  `slots_available_covaxin` int(10) NOT NULL,
  `slots_available_covishield` int(10) NOT NULL,
  `min_age_allowed` int(10) NOT NULL,
  `max_age_allowed` int(10) NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `co-well_hospitals`
--

INSERT INTO `co-well_hospitals` (`name`, `area`, `slots_available_covaxin`, `slots_available_covishield`, `min_age_allowed`, `max_age_allowed`, `type`) VALUES
('appolo', 'Teynampet', 14, 14, 18, 45, 'private'),
('raju', 'T.nagar', 10, 9, 45, 60, 'private'),
('kauvery', 'Mylapore', 13, 24, 18, 60, 'private'),
('gandhi', 'Tambaram', 10, 9, 18, 45, 'govt'),
('nehru', 'Mambalam', 30, 10, 45, 60, 'govt'),
('agada', 'Chrompet', 10, 10, 18, 60, 'private'),
('frontline', 'Tambaram', 20, 20, 18, 45, 'private'),
('fortis', 'Mambalam', 23, 10, 45, 60, 'private');

-- --------------------------------------------------------

--
-- Table structure for table `co-well_users`
--

CREATE TABLE `co-well_users` (
  `name` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(35) NOT NULL,
  `mobile_number` varchar(10) NOT NULL,
  `age` int(10) NOT NULL,
  `area` varchar(20) NOT NULL,
  `vaccine` varchar(20) NOT NULL,
  `financials` varchar(20) NOT NULL,
  `medical_condition` varchar(30) NOT NULL,
  `doses_taken` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `co-well_users`
--

INSERT INTO `co-well_users` (`name`, `password`, `email`, `mobile_number`, `age`, `area`, `vaccine`, `financials`, `medical_condition`, `doses_taken`) VALUES
('ram', 'ram', 'ram@gmail.com', '1234567890', 20, 'Tambaram', 'covaxin', 'no', 'none', 0),
('sam', 'sam', 'sam@gmail.com', '1234567890', 47, 'T.Nagar', 'covishield', 'yes', 'none', 0),
('guru', 'guru', 'guru@gmail.com', '1234567890', 34, 'Mambalam', 'covaxin', 'yes', 'mild fever', 2),
('tom', 'tom', 'tom@gmail.com', '1234567890', 50, 'Other', 'covaxin', 'no', 'none', 0),
('bob', 'bob', 'bob@gmail.com', '1234567890', 30, 'Teynampet', 'covishield', 'yes', 'none', 0),
('ron', 'ron', 'ron@gmail.com', '1234567890', 50, 'Tambaram', 'covaxin', 'no', 'none', 0),
('jack', 'jack', 'jack@gmail.com', '1234567890', 60, 'Other', 'covishield', 'no', 'soar throat', 0),
('krishnaa', 'krishnaa', 'krishnaa2902@gmail.com', '1234567890', 19, 'T.Nagar', 'covishield', 'no', 'none', 1),
('priya', 'priya', 'shpriyaa@gmail.com', '1234567890', 44, 'T.Nagar', 'covaxin', 'no', 'sore throat ', 0),
('venkatesh', 'venkatesh', 'venkatesh.mds@gmail.com', '1234567890', 44, 'T.Nagar', 'covaxin', 'no', 'none', 1),
('sreevatsan', 'sreevatsan', 'sreevatsanm@gmail.com', '1234567890', 47, 'T.Nagar', 'covaxin', 'no', 'none', 2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
