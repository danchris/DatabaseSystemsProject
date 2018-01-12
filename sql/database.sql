-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 11, 2018 at 12:11 PM
-- Server version: 5.7.20-0ubuntu0.17.10.1
-- PHP Version: 7.1.11-0ubuntu0.17.10.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_project`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `AthensEmployees`
-- (See below for the actual view)
--
CREATE TABLE `AthensEmployees` (
`First_Name` varchar(30)
,`Last_Name` varchar(30)
,`IRS` int(20) unsigned
);

-- --------------------------------------------------------

--
-- Table structure for table `Customer`
--

CREATE TABLE `Customer` (
  `Customer_ID` int(30) NOT NULL,
  `IRS` int(20) UNSIGNED NOT NULL,
  `Social_Security_Number` varchar(30) NOT NULL,
  `Last_Name` varchar(30) NOT NULL,
  `First_Name` varchar(30) NOT NULL,
  `Driver_License` varchar(30) NOT NULL,
  `First_Registration` datetime DEFAULT NULL,
  `City` varchar(30) NOT NULL,
  `Postal_Code` int(20) UNSIGNED DEFAULT NULL,
  `Street` varchar(30) NOT NULL,
  `Street_Number` int(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Customer`
--

INSERT INTO `Customer` (`Customer_ID`, `IRS`, `Social_Security_Number`, `Last_Name`, `First_Name`, `Driver_License`, `First_Registration`, `City`, `Postal_Code`, `Street`, `Street_Number`) VALUES
(1, 1415532, '23524', 'Farsalinos', 'Giorgos', 'A980', '2018-01-11 09:53:14', 'Athens', 12434, 'Kati', 12),
(2, 14312523, '235123', 'Thivaios', 'Tasos', 'A921', '2018-01-11 09:53:58', 'Athens', 35422, 'Pouthenas', 54),
(3, 3525, '32155', 'Trikalinos', 'Trikaliotis', 'as13', '2018-01-11 09:57:39', 'Athens', 15254, 'Alitias', 12),
(4, 252345, '42514245', 'Kanonas', 'Akanonistos', 'asdg234', '2018-01-11 09:58:37', 'Athens', 15253, 'Ampelokipoi', 12),
(5, 2123412, '42514213445', 'Thitis', 'RNS', 'asdg2r2q34', '2018-01-11 09:59:15', 'Athens', 15251, 'SKA', 36),
(6, 2112351, '421231235575', 'Kolokotronis', 'Mpoumpoulinas', 'asdg2r232q34', '2018-01-11 10:00:11', 'Nafplio', 11251, 'Mpourtzi', 1),
(7, 3520, '82155', 'Trikalinos', 'Trikaliotis', 'aaas13', '2018-01-11 10:00:55', 'Trikala', 10254, 'Xwrio', 12),
(8, 212341255, '4251445', 'Clip', 'Mad', 'Dwse1', '2018-01-11 10:03:26', 'Athens', 10051, 'StonAera', 1);

--
-- Triggers `Customer`
--
DELIMITER $$
CREATE TRIGGER `totalDeletedCustomer` BEFORE DELETE ON `Customer` FOR EACH ROW SET @tDC = @tDC +1
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `Email_Address`
--

CREATE TABLE `Email_Address` (
  `Store_ID` int(20) NOT NULL,
  `Email_Address` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Email_Address`
--

INSERT INTO `Email_Address` (`Store_ID`, `Email_Address`) VALUES
(12, 'krit@gmail.com'),
(8, 'merkouri@gmail.com'),
(13, 'panagouli@gmail.com'),
(10, 'panep@gmail.com'),
(9, 'polyt@gmail.com'),
(11, 'xan@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `Employee`
--

CREATE TABLE `Employee` (
  `IRS` int(20) UNSIGNED NOT NULL,
  `Social_Security_Number` varchar(30) NOT NULL,
  `Driver_License` varchar(30) NOT NULL,
  `First_Name` varchar(30) NOT NULL,
  `Last_Name` varchar(30) NOT NULL,
  `Street` varchar(30) NOT NULL,
  `Street_Number` int(20) UNSIGNED DEFAULT NULL,
  `Postal_Code` int(20) UNSIGNED DEFAULT NULL,
  `City` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Employee`
--

INSERT INTO `Employee` (`IRS`, `Social_Security_Number`, `Driver_License`, `First_Name`, `Last_Name`, `Street`, `Street_Number`, `Postal_Code`, `City`) VALUES
(123, '1245', 'A1', 'Daniil', 'Christodoulopoulos', 'Spirou Merkouri', 34, 11634, 'Athens'),
(1234, '1234112', 'A4', 'Kalamakis', 'Souvlakis', 'Egnatia', 112, 12434, 'Thessaloniki'),
(1244, '12445', 'A3', 'Dramatikos', 'Dramas', 'Tipota', 124, 12414, 'Drama'),
(1435, '1234', 'A2', 'Patrinos', 'Patras', 'Karnavali', 24, 12394, 'Patra'),
(14235, '13532', 'A6', 'Daniil', 'Larisinos', 'Pelasgwn', 14, 41500, 'Larisa'),
(12412214, '124124', 'A5', 'Giorgos', 'Kritikos', 'Chaniwn', 1, 21415, 'Hrakleio');

-- --------------------------------------------------------

--
-- Table structure for table `Fuel_Type`
--

CREATE TABLE `Fuel_Type` (
  `License_Plate` varchar(30) NOT NULL,
  `Fuel_Type` enum('Petrol','Diesel','Gas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Fuel_Type`
--

INSERT INTO `Fuel_Type` (`License_Plate`, `Fuel_Type`) VALUES
('A114', 'Petrol'),
('A12425', 'Petrol'),
('A124250000', 'Diesel'),
('A12425000123', 'Diesel'),
('A1295', 'Gas'),
('A1454124', 'Petrol'),
('A3425', 'Petrol'),
('A34321', 'Petrol'),
('A345', 'Diesel');

-- --------------------------------------------------------

--
-- Table structure for table `Payment_Transaction`
--

CREATE TABLE `Payment_Transaction` (
  `License_Plate` varchar(30) NOT NULL,
  `Start_Date` varchar(30) NOT NULL,
  `Payment_Amount` double NOT NULL,
  `Payment_Method` enum('Cash','Card') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Payment_Transaction`
--

INSERT INTO `Payment_Transaction` (`License_Plate`, `Start_Date`, `Payment_Amount`, `Payment_Method`) VALUES
('A34321', '2018-01-11', 100, 'Cash'),
('A345', '2018-01-11', 120.1, 'Card');

--
-- Triggers `Payment_Transaction`
--
DELIMITER $$
CREATE TRIGGER `totalPaymentAmount` BEFORE INSERT ON `Payment_Transaction` FOR EACH ROW SET @tPA = @tPA +NEW.Payment_Amount
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `Phone_Number`
--

CREATE TABLE `Phone_Number` (
  `Store_ID` int(20) NOT NULL,
  `Phone_Number` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Phone_Number`
--

INSERT INTO `Phone_Number` (`Store_ID`, `Phone_Number`) VALUES
(8, '2100000000'),
(10, '2310000987'),
(13, '2410924092'),
(11, '2521009874'),
(9, '2610000000'),
(12, '2810982491');

-- --------------------------------------------------------

--
-- Table structure for table `Rents`
--

CREATE TABLE `Rents` (
  `License_Plate` varchar(30) NOT NULL,
  `Start_Date` date NOT NULL,
  `Start_Location` varchar(30) NOT NULL,
  `Finish_Location` varchar(30) NOT NULL,
  `Finish_Date` date NOT NULL,
  `Return_State` varchar(30) NOT NULL,
  `Customer_ID` int(30) NOT NULL,
  `IRS` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Rents`
--

INSERT INTO `Rents` (`License_Plate`, `Start_Date`, `Start_Location`, `Finish_Location`, `Finish_Date`, `Return_State`, `Customer_ID`, `IRS`) VALUES
('A34321', '2018-01-11', 'Patra', 'Athens', '2018-01-14', 'OK', 2, 1435),
('A345', '2018-01-11', 'Athens', 'Athens', '2018-01-15', 'OK', 1, 123);

-- --------------------------------------------------------

--
-- Table structure for table `Reserves`
--

CREATE TABLE `Reserves` (
  `License_Plate` varchar(30) NOT NULL,
  `Start_Date` date NOT NULL,
  `Start_Location` varchar(30) NOT NULL,
  `Finish_Location` varchar(30) NOT NULL,
  `Finish_Date` date NOT NULL,
  `Paid` enum('Yes','No') NOT NULL,
  `Customer_ID` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Reserves`
--

INSERT INTO `Reserves` (`License_Plate`, `Start_Date`, `Start_Location`, `Finish_Location`, `Finish_Date`, `Paid`, `Customer_ID`) VALUES
('A34321', '2018-01-11', 'Patra', 'Athens', '2018-01-14', 'Yes', 2),
('A345', '2018-01-11', 'Athens', 'Athens', '2018-01-15', 'Yes', 1);

-- --------------------------------------------------------

--
-- Table structure for table `Store`
--

CREATE TABLE `Store` (
  `Store_ID` int(20) NOT NULL,
  `Street` varchar(30) NOT NULL,
  `Street_Number` int(20) UNSIGNED DEFAULT NULL,
  `Postal_Code` int(20) UNSIGNED DEFAULT NULL,
  `City` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Store`
--

INSERT INTO `Store` (`Store_ID`, `Street`, `Street_Number`, `Postal_Code`, `City`) VALUES
(8, 'Spirou Merkouri', 33, 11634, 'Athens'),
(9, 'Hrwwn Polytexneiou', 12, 12945, 'Patra'),
(10, 'Panepistimiou', 45, 23495, 'Thessaloniki'),
(11, 'Xanthis', 124, 12345, 'Drama'),
(12, 'Psiloritis', 9, 12941, 'Hrakleio'),
(13, 'Panagouli', 58, 41222, 'Larisa');

-- --------------------------------------------------------

--
-- Stand-in structure for view `TotalKHM`
-- (See below for the actual view)
--
CREATE TABLE `TotalKHM` (
`License_Plate` varchar(30)
,`Kilometers` int(50)
);

-- --------------------------------------------------------

--
-- Table structure for table `Vehicle`
--

CREATE TABLE `Vehicle` (
  `License_Plate` varchar(30) NOT NULL,
  `Model` varchar(30) NOT NULL,
  `Type` enum('Car','Motorcycle','ATV','Mini Vans','Truck') NOT NULL,
  `Make` varchar(30) NOT NULL,
  `Year` year(4) NOT NULL,
  `Kilometers` int(50) NOT NULL,
  `Cylinder_Capacity` float NOT NULL,
  `Horse_Power` int(20) NOT NULL,
  `Damages` varchar(30) DEFAULT NULL,
  `Malfunctions` varchar(30) DEFAULT NULL,
  `Next_Service` date NOT NULL,
  `Insurance_Exp_Date` date NOT NULL,
  `Last_Service` date NOT NULL,
  `Store_ID` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Vehicle`
--

INSERT INTO `Vehicle` (`License_Plate`, `Model`, `Type`, `Make`, `Year`, `Kilometers`, `Cylinder_Capacity`, `Horse_Power`, `Damages`, `Malfunctions`, `Next_Service`, `Insurance_Exp_Date`, `Last_Service`, `Store_ID`) VALUES
('A114', 'X20', 'Motorcycle', 'Suzuki', 2018, 100131, 1.1, 113, 'none', 'none', '2022-01-01', '2026-01-01', '2020-01-01', 11),
('A12425', 'Punto', 'Car', 'Fiat', 2012, 100131, 1, 113, 'none', 'none', '2022-01-01', '2026-01-01', '2017-01-01', 9),
('A124250000', 'Punto', 'Car', 'Fiat', 2012, 100131, 1, 113, 'none', 'none', '2022-01-01', '2023-01-01', '2017-01-01', 12),
('A12425000123', 'Panda', 'Car', 'Fiat', 2001, 1001321, 1, 113, 'none', 'none', '2022-01-01', '2023-01-01', '2017-01-01', 13),
('A1295', 'X20', 'Motorcycle', 'Suzuki', 2018, 100131, 1.1, 113, 'none', 'none', '2022-01-01', '2026-01-01', '2020-01-01', 9),
('A1454124', 'X20', 'Motorcycle', 'Suzuki', 2018, 100131, 1.1, 113, 'none', 'none', '2022-01-01', '2026-01-01', '2020-01-01', 10),
('A3425', 'XC60', 'Car', 'Volvo', 2014, 124131, 2, 213, 'none', 'mpouzi', '2021-01-01', '2026-01-01', '2017-01-01', 8),
('A34321', 'XC60', 'Car', 'Volvo', 2014, 124131, 2, 213, 'none', 'none', '2021-01-01', '2026-01-01', '2017-01-01', 10),
('A345', 'i16', 'Car', 'BMW', 2014, 12413, 1.6, 123, 'none', 'none', '2020-01-01', '2025-01-01', '2017-01-01', 8);

-- --------------------------------------------------------

--
-- Table structure for table `Works`
--

CREATE TABLE `Works` (
  `IRS` int(20) UNSIGNED NOT NULL,
  `Store_ID` int(20) NOT NULL,
  `Start_Date` date NOT NULL,
  `Finish_Date` date DEFAULT NULL,
  `Position` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Works`
--

INSERT INTO `Works` (`IRS`, `Store_ID`, `Start_Date`, `Finish_Date`, `Position`) VALUES
(123, 8, '2018-01-11', '2999-03-11', 'OLA'),
(1234, 10, '2018-01-11', '2019-04-12', 'Souvlatzis'),
(1244, 11, '2018-01-11', '2024-12-04', 'Tameio'),
(1435, 9, '2018-01-11', '2028-12-12', 'Karnavalos'),
(14235, 13, '2018-01-11', '2048-12-09', 'Kafetzis'),
(12412214, 12, '2018-01-11', '2023-12-04', 'Raki');

-- --------------------------------------------------------

--
-- Structure for view `AthensEmployees`
--
DROP TABLE IF EXISTS `AthensEmployees`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `AthensEmployees`  AS  select `Employee`.`First_Name` AS `First_Name`,`Employee`.`Last_Name` AS `Last_Name`,`Employee`.`IRS` AS `IRS` from `Employee` where (select `Works`.`IRS` from `Works` where ((`Works`.`IRS` = `Employee`.`IRS`) and (`Employee`.`City` = 'Athens'))) group by `Employee`.`IRS` order by `Employee`.`Last_Name` ;

-- --------------------------------------------------------

--
-- Structure for view `TotalKHM`
--
DROP TABLE IF EXISTS `TotalKHM`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `TotalKHM`  AS  select `Vehicle`.`License_Plate` AS `License_Plate`,`Vehicle`.`Kilometers` AS `Kilometers` from `Vehicle` group by `Vehicle`.`License_Plate` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Customer`
--
ALTER TABLE `Customer`
  ADD PRIMARY KEY (`Customer_ID`),
  ADD UNIQUE KEY `Customer_ID` (`Customer_ID`),
  ADD UNIQUE KEY `IRS` (`IRS`),
  ADD UNIQUE KEY `Customer_ID_2` (`Customer_ID`),
  ADD UNIQUE KEY `Social_Security_Number` (`Social_Security_Number`,`Driver_License`),
  ADD UNIQUE KEY `Driver_License` (`Driver_License`);

--
-- Indexes for table `Email_Address`
--
ALTER TABLE `Email_Address`
  ADD PRIMARY KEY (`Store_ID`),
  ADD UNIQUE KEY `Email_Address` (`Email_Address`);

--
-- Indexes for table `Employee`
--
ALTER TABLE `Employee`
  ADD PRIMARY KEY (`IRS`),
  ADD UNIQUE KEY `IRS` (`IRS`),
  ADD UNIQUE KEY `IRS_2` (`IRS`,`Social_Security_Number`,`Driver_License`),
  ADD UNIQUE KEY `Driver_License` (`Driver_License`);

--
-- Indexes for table `Fuel_Type`
--
ALTER TABLE `Fuel_Type`
  ADD PRIMARY KEY (`License_Plate`);

--
-- Indexes for table `Payment_Transaction`
--
ALTER TABLE `Payment_Transaction`
  ADD PRIMARY KEY (`License_Plate`,`Start_Date`),
  ADD KEY `INDEX` (`License_Plate`,`Start_Date`);

--
-- Indexes for table `Phone_Number`
--
ALTER TABLE `Phone_Number`
  ADD PRIMARY KEY (`Store_ID`),
  ADD UNIQUE KEY `Phone_Number` (`Phone_Number`);

--
-- Indexes for table `Rents`
--
ALTER TABLE `Rents`
  ADD PRIMARY KEY (`License_Plate`,`Start_Date`),
  ADD KEY `IRS` (`IRS`),
  ADD KEY `Customer_ID` (`Customer_ID`);

--
-- Indexes for table `Reserves`
--
ALTER TABLE `Reserves`
  ADD PRIMARY KEY (`License_Plate`,`Start_Date`),
  ADD KEY `Customer_ID` (`Customer_ID`);

--
-- Indexes for table `Store`
--
ALTER TABLE `Store`
  ADD PRIMARY KEY (`Store_ID`),
  ADD UNIQUE KEY `Store_ID` (`Store_ID`);

--
-- Indexes for table `Vehicle`
--
ALTER TABLE `Vehicle`
  ADD PRIMARY KEY (`License_Plate`),
  ADD UNIQUE KEY `License_Plate` (`License_Plate`),
  ADD UNIQUE KEY `License_Plate_2` (`License_Plate`),
  ADD UNIQUE KEY `License_Plate_3` (`License_Plate`),
  ADD KEY `Store_ID` (`Store_ID`);

--
-- Indexes for table `Works`
--
ALTER TABLE `Works`
  ADD PRIMARY KEY (`IRS`,`Store_ID`,`Start_Date`),
  ADD KEY `Store_ID` (`Store_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Customer`
--
ALTER TABLE `Customer`
  MODIFY `Customer_ID` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `Store`
--
ALTER TABLE `Store`
  MODIFY `Store_ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `Email_Address`
--
ALTER TABLE `Email_Address`
  ADD CONSTRAINT `Email_Address_ibfk_1` FOREIGN KEY (`Store_ID`) REFERENCES `Store` (`Store_ID`);

--
-- Constraints for table `Fuel_Type`
--
ALTER TABLE `Fuel_Type`
  ADD CONSTRAINT `Fuel_Type_ibfk_1` FOREIGN KEY (`License_Plate`) REFERENCES `Vehicle` (`License_Plate`);

--
-- Constraints for table `Phone_Number`
--
ALTER TABLE `Phone_Number`
  ADD CONSTRAINT `Phone_Number_ibfk_1` FOREIGN KEY (`Store_ID`) REFERENCES `Store` (`Store_ID`);

--
-- Constraints for table `Rents`
--
ALTER TABLE `Rents`
  ADD CONSTRAINT `Rents_ibfk_1` FOREIGN KEY (`License_Plate`) REFERENCES `Vehicle` (`License_Plate`),
  ADD CONSTRAINT `Rents_ibfk_2` FOREIGN KEY (`Customer_ID`) REFERENCES `Customer` (`Customer_ID`);

--
-- Constraints for table `Reserves`
--
ALTER TABLE `Reserves`
  ADD CONSTRAINT `Reserves_ibfk_1` FOREIGN KEY (`License_Plate`) REFERENCES `Vehicle` (`License_Plate`),
  ADD CONSTRAINT `Reserves_ibfk_2` FOREIGN KEY (`Customer_ID`) REFERENCES `Customer` (`Customer_ID`);

--
-- Constraints for table `Vehicle`
--
ALTER TABLE `Vehicle`
  ADD CONSTRAINT `Vehicle_ibfk_1` FOREIGN KEY (`Store_ID`) REFERENCES `Store` (`Store_ID`);

--
-- Constraints for table `Works`
--
ALTER TABLE `Works`
  ADD CONSTRAINT `Works_ibfk_1` FOREIGN KEY (`IRS`) REFERENCES `Employee` (`IRS`),
  ADD CONSTRAINT `Works_ibfk_2` FOREIGN KEY (`Store_ID`) REFERENCES `Store` (`Store_ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
