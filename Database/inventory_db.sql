-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 31, 2022 at 08:16 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `ID` int(11) NOT NULL,
  `Admin_Name` varchar(60) NOT NULL,
  `Email` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`ID`, `Admin_Name`, `Email`) VALUES
(1, 'Mikias Miessa', 'mikiasmiessa10@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `discarded_products`
--

CREATE TABLE `discarded_products` (
  `Product_Name` varchar(40) NOT NULL,
  `Product_Type` varchar(40) NOT NULL,
  `Product_Type2` varchar(40) NOT NULL,
  `Safety_Type` varchar(40) NOT NULL,
  `Quantity` int(40) NOT NULL,
  `Unit` varchar(40) NOT NULL,
  `Shelf_Life` date NOT NULL,
  `Usability` varchar(40) NOT NULL,
  `Shelf_Number` varchar(11) NOT NULL,
  `Warehouse_Number` varchar(11) NOT NULL,
  `Reason` text NOT NULL,
  `SKU` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `discarded_products`
--

INSERT INTO `discarded_products` (`Product_Name`, `Product_Type`, `Product_Type2`, `Safety_Type`, `Quantity`, `Unit`, `Shelf_Life`, `Usability`, `Shelf_Number`, `Warehouse_Number`, `Reason`, `SKU`) VALUES
('SCREW DRIVER', 'MECHANICAL', 'MACHINE', 'OTHERS...', 100, 'PIECES', '2022-12-27', 'Reusable', '002', '003', 'test delete', 'ELCLSCW03002'),
('DELL', 'ELECTRONICS', 'CLOTHING', 'FRAGILE', 20, 'PIECES', '2029-06-29', 'Reusable', '001', '003', 'Too much personal computers', 'ELPCDE003001'),
('SCREW DRIVER', 'MECHANICAL', 'MACHINE', 'OTHERS...', 12, 'PIECES', '2022-12-27', 'Reusable', '002', '003', 'test delete', 'MEMASC003002');

-- --------------------------------------------------------

--
-- Table structure for table `issued_products`
--

CREATE TABLE `issued_products` (
  `Quantity` int(11) NOT NULL,
  `Issued_Date` date NOT NULL,
  `Issued_To` varchar(100) NOT NULL,
  `SKU` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `issued_products`
--

INSERT INTO `issued_products` (`Quantity`, `Issued_Date`, `Issued_To`, `SKU`) VALUES
(10, '2022-12-30', 'MERRY', 'GACLTU003006'),
(11, '2022-12-20', 'MIKIAS', 'GACLTU003006'),
(54, '2022-12-20', 'MERON', 'GACLJA003002'),
(40, '2022-12-21', 'MIKI', 'ELPCTO003021'),
(10, '2022-12-21', 'NAOL', 'GACLTU003006'),
(5, '0000-00-00', 'MIKI', 'GACLTU003006'),
(5, '2022-12-26', 'MIKIAS', 'GACLTU003006'),
(5, '2022-12-26', 'MERON', 'GACLTU003006'),
(5, '2022-12-26', 'NAOL', 'GACLTU003006'),
(10, '2022-12-29', 'MIKIAS', 'MEMASC003002');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `SKU` varchar(40) NOT NULL,
  `Messages` text NOT NULL,
  `_Status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`SKU`, `Messages`, `_Status`) VALUES
('GACLJA003002', 'JACKET Capacity Low in stock', 1),
('GACLTU003006', 'TUTA Capacity Low in stock', 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `Product_Name` varchar(40) NOT NULL,
  `Product_Type` varchar(40) NOT NULL,
  `Product_Type2` varchar(40) NOT NULL,
  `Safety_Type` varchar(40) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Min_Quan` int(20) NOT NULL,
  `Unit` varchar(20) NOT NULL,
  `Shelf_Life` date DEFAULT NULL,
  `Shelf_Number` varchar(40) NOT NULL,
  `Warehouse_Number` varchar(40) NOT NULL,
  `Usability` varchar(40) NOT NULL,
  `FREQUENCY` int(11) NOT NULL,
  `SKU` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`Product_Name`, `Product_Type`, `Product_Type2`, `Safety_Type`, `Quantity`, `Min_Quan`, `Unit`, `Shelf_Life`, `Shelf_Number`, `Warehouse_Number`, `Usability`, `FREQUENCY`, `SKU`) VALUES
('DRILL', 'ELECTRONIC', 'MACHINE', 'FRAGILE', 85, 15, 'PIECES', '2026-11-25', '002', '003', 'Reusable', 11, 'ELMADR003002'),
('TOSHIBA', 'ELECTRONIC', 'PC', 'FRAGILE', 81, 15, 'PIECES', '2026-11-25', '021', '003', 'non Reusable', 11, 'ELPCTO003021'),
('JACKET', 'GARMENT', 'CLOTHING', 'FRAGILE', 11, 15, 'PIECES', '2026-11-30', '002', '003', 'non Reusable', 3, 'GACLJA003002'),
('TUTA', 'GARMENT', 'MACHINE', 'FRAGILE', 7, 15, 'PIECES', '2023-03-11', '006', '003', 'non Reusable', 10, 'GACLTU003006'),
('SCREW DRIVER', 'MECHANICAL', 'MACHINE', 'OTHERS...', 100, 15, 'PIECES', '2023-01-07', '002', '003', 'Reusable', 1, 'MEMASC003002');

-- --------------------------------------------------------

--
-- Table structure for table `product_type`
--

CREATE TABLE `product_type` (
  `ID` int(11) NOT NULL,
  `Product_Type` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_type`
--

INSERT INTO `product_type` (`ID`, `Product_Type`) VALUES
(1, 'ELECTRONIC'),
(2, 'FURNITURE'),
(3, 'LIQUID'),
(4, 'GARMENT'),
(5, 'MECHANICAL');

-- --------------------------------------------------------

--
-- Table structure for table `product_type2`
--

CREATE TABLE `product_type2` (
  `ID` int(11) NOT NULL,
  `Product_Type2` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_type2`
--

INSERT INTO `product_type2` (`ID`, `Product_Type2`) VALUES
(1, 'CLOTHING'),
(2, 'MACHINE'),
(3, 'PC');

-- --------------------------------------------------------

--
-- Table structure for table `safety_type`
--

CREATE TABLE `safety_type` (
  `ID` int(11) NOT NULL,
  `Safety_Type` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `safety_type`
--

INSERT INTO `safety_type` (`ID`, `Safety_Type`) VALUES
(1, 'FRAGILE'),
(2, 'FLAMABLE'),
(3, 'POISONOUS'),
(4, 'OTHERS...');

-- --------------------------------------------------------

--
-- Table structure for table `stockin_date`
--

CREATE TABLE `stockin_date` (
  `Stockin_Date` date NOT NULL,
  `SKU` varchar(40) NOT NULL,
  `Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stockin_date`
--

INSERT INTO `stockin_date` (`Stockin_Date`, `SKU`, `Quantity`) VALUES
('2022-12-20', 'GACLTU003006', 10),
('2022-12-20', 'GACLTU003006', 11),
('2022-12-21', 'ELMADR003002', 80),
('2022-12-21', 'GACLJA003002', 10),
('2022-12-21', 'ELPCTO003021', 40),
('2022-12-21', 'ELMADR003002', 10),
('2022-12-23', 'GACLTU003006', 5),
('2022-12-26', 'GACLTU003006', 5),
('2022-12-26', 'GACLTU003006', 5),
('2022-12-26', 'GACLTU003006', 5),
('2022-12-29', 'MEMASC003002', 10),
('2022-12-29', 'GACLJA003002', 5),
('2022-12-31', 'GACLJA003002', 50);

-- --------------------------------------------------------

--
-- Table structure for table `stockout_date`
--

CREATE TABLE `stockout_date` (
  `Stockout_Date` date NOT NULL,
  `SKU` varchar(40) NOT NULL,
  `Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stockout_date`
--

INSERT INTO `stockout_date` (`Stockout_Date`, `SKU`, `Quantity`) VALUES
('2022-12-30', 'GACLTU003006', 10),
('2022-12-20', 'GACLTU003006', 11),
('2022-12-20', 'GACLJA003002', 54),
('2022-12-20', 'ELMADR003002', 80),
('2022-12-21', 'ELPCTO003021', 40),
('2022-12-21', 'GACLTU003006', 10),
('2022-12-21', 'ELMADR003002', 10),
('0000-00-00', 'GACLTU003006', 5),
('2022-12-26', 'GACLTU003006', 5),
('2022-12-26', 'GACLTU003006', 5),
('2022-12-26', 'GACLTU003006', 5),
('2022-12-27', 'ELMADR003002', 5),
('2022-12-29', 'MEMASC003002', 10),
('2022-12-29', 'ELPCTO003021', 0),
('2022-12-30', 'GACLJA003002', 50),
('2022-12-30', 'GACLJA003002', 50);

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `ID` int(11) NOT NULL,
  `Unit` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`ID`, `Unit`) VALUES
(1, 'PIECES'),
(2, 'KILLOGRAM'),
(3, 'LITER'),
(4, 'METER');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `discarded_products`
--
ALTER TABLE `discarded_products`
  ADD PRIMARY KEY (`SKU`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`SKU`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`SKU`);

--
-- Indexes for table `product_type`
--
ALTER TABLE `product_type`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `product_type2`
--
ALTER TABLE `product_type2`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `safety_type`
--
ALTER TABLE `safety_type`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrator`
--
ALTER TABLE `administrator`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product_type`
--
ALTER TABLE `product_type`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product_type2`
--
ALTER TABLE `product_type2`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `safety_type`
--
ALTER TABLE `safety_type`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
