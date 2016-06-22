-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 17, 2016 at 08:47 PM
-- Server version: 5.5.47-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sistemaXML`
--

-- --------------------------------------------------------

--
-- Table structure for table `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `cpf` varchar(15) NOT NULL,
  `nome` varchar(120) DEFAULT NULL,
  `sexo` int(11) DEFAULT NULL,
  `data_nasc` char(10) DEFAULT NULL,
  `credito` double DEFAULT NULL,
  PRIMARY KEY (`cpf`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cliente`
--

INSERT INTO `cliente` (`cpf`, `nome`, `sexo`, `data_nasc`, `credito`) VALUES
('30480099112', 'Maria', 2, '13/01/1970', 15100),
('90730597127', 'Joao', 1, '29/03/1980', 12500),
('91030181210', 'Pedro', 1, '10/07/1971', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cliente2`
--

CREATE TABLE IF NOT EXISTS `cliente2` (
  `cpf` varchar(11) NOT NULL,
  `nome` varchar(120) DEFAULT NULL,
  `sexo` char(2) DEFAULT NULL,
  `idade` int(11) DEFAULT NULL,
  `ativo` char(1) DEFAULT NULL,
  PRIMARY KEY (`cpf`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cliente2`
--

INSERT INTO `cliente2` (`cpf`, `nome`, `sexo`, `idade`, `ativo`) VALUES
('30680099112', 'Maria', 'F', 42, 'S'),
('90730597127', 'Joao', 'M', 35, 'S'),
('91030181210', 'Pedro', 'M', 44, 'N');

-- --------------------------------------------------------

--
-- Table structure for table `vendas`
--

CREATE TABLE IF NOT EXISTS `vendas` (
  `cliente` varchar(11) DEFAULT NULL,
  `valor` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vendas`
--

INSERT INTO `vendas` (`cliente`, `valor`) VALUES
('90730597127', 700.00),
('90730597127', 350.00),
('30680099112', 810.00),
('30680099112', 1200.00),
('91030181210', 1800.00);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
