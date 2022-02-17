-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2022 at 10:56 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `petvaccination`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminacc`
--

CREATE TABLE `adminacc` (
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `FullName` text NOT NULL,
  `AccID` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adminacc`
--

INSERT INTO `adminacc` (`Username`, `Password`, `FullName`, `AccID`) VALUES
('sysad', '12345678', 'GUENE LOPEZ', 'GU202202070809');

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `PetID` varchar(14) NOT NULL,
  `ClinicID` varchar(14) NOT NULL,
  `OwnerID` varchar(14) NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL,
  `AppoinmentCase` text NOT NULL,
  `ServiceType` text NOT NULL,
  `AppointmentID` varchar(14) NOT NULL,
  `RequestStatus` text NOT NULL,
  `RejectResponse` longtext NOT NULL,
  `AppoinmentStatus` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`PetID`, `ClinicID`, `OwnerID`, `Date`, `Time`, `AppoinmentCase`, `ServiceType`, `AppointmentID`, `RequestStatus`, `RejectResponse`, `AppoinmentStatus`) VALUES
('Ba202202111607', 'Pe202202072000', 'gu202202071953', '2022-02-14', '09:30:00', 'Check up', 'Clinic Visit', 'Bg202202121548', 'Approved', '', ''),
('Ba202202111607', 'Pe202202072000', 'gu202202071953', '2022-02-25', '10:00:00', 'Check up', 'Clinic Visit', 'Bg202202121717', 'Cancelled', 'We\'re sorry :(<br>But Feb 25 is holiday. You might want to set another appointment. We\'re open  Mondays to Fridays except holidays', ''),
('Ba202202111607', 'Pe202202072000', 'gu202202071953', '2022-02-21', '09:30:00', 'Deworm', 'Clinic Visit', 'Bg202202122003', 'Accepted', '', 'Done'),
('Ba202202111607', 'Pe202202072000', 'gu202202071953', '2022-02-17', '16:13:00', '5in1', 'Clinic Visit', 'Bg202202161613', '', '', 'Done'),
('Ba202202111607', 'Go202202141734', 'gu202202071953', '2022-02-21', '14:00:00', 'Check up', 'Clinic Visit', 'Bg202202171600', 'Pending', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `clinicowner`
--

CREATE TABLE `clinicowner` (
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `owner` text NOT NULL,
  `ClinicName` text NOT NULL,
  `Address` varchar(500) NOT NULL,
  `ClinicDays` text NOT NULL,
  `CH-Open` time NOT NULL,
  `CH-Close` time NOT NULL,
  `ServicesOffered` longtext NOT NULL,
  `ContactDetails` varchar(500) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `AcceptHS` text NOT NULL,
  `Facebook` varchar(255) DEFAULT NULL,
  `Instagram` varchar(255) DEFAULT NULL,
  `Web` varchar(510) DEFAULT NULL,
  `Image` varchar(255) DEFAULT NULL,
  `ClinicID` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clinicowner`
--

INSERT INTO `clinicowner` (`Username`, `Password`, `owner`, `ClinicName`, `Address`, `ClinicDays`, `CH-Open`, `CH-Close`, `ServicesOffered`, `ContactDetails`, `Email`, `AcceptHS`, `Facebook`, `Instagram`, `Web`, `Image`, `ClinicID`) VALUES
('GGS', 'golden', 'Juan Dela Cruz', 'Golden Spoon Animal Clinic and Grooming Services', 'Block 2, C5 Service Road, Lot 26 Pinagsama Phase 1 Footbridge Village, Taguig, Metro Manila', 'Monday to Saturday', '00:00:00', '00:00:00', '5 in 1\r\nRabies\r\nDeworm\r\nGrooming', '09064826606', 'guenelopez10@gmail.com', 'No', NULL, NULL, NULL, 'images/GoldenSpoon.jpg', 'Go202202141734'),
('PPAC', 'petpaws', 'James Victor', 'Pet Paws Animal Clinic', 'Doña Soledad Ave, Bicutan, Parañaque,1711 Metro Manila', 'Monday - Friday (Except Holidays)', '09:00:00', '17:00:00', '5in1, Anti-Rabies, Deworm', 'Globe:09064826606 DITO:09922043001', 'guenelopez10@gmail.com', 'Yes', 'https://www.facebook.com/guene.lopez', 'guenelopez27', 'www.PetPawsAnimalClinic.com.ph', 'images/petpawsclinic.jpg', 'Pe202202072000');

-- --------------------------------------------------------

--
-- Table structure for table `dewormrecord`
--

CREATE TABLE `dewormrecord` (
  `PetID` varchar(14) NOT NULL,
  `OwnerID` varchar(14) NOT NULL,
  `ClinicID` varchar(14) NOT NULL,
  `DateGiven` date NOT NULL,
  `MedicineUsed` text NOT NULL,
  `RepeatOn` date NOT NULL,
  `dewormID` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dewormrecord`
--

INSERT INTO `dewormrecord` (`PetID`, `OwnerID`, `ClinicID`, `DateGiven`, `MedicineUsed`, `RepeatOn`, `dewormID`) VALUES
('Ba202202111607', 'gu202202071953', 'Pe202202072000', '2022-02-16', 'WORM RID', '2022-02-26', 'Bg202202161559'),
('Ba202202111607', 'gu202202071953', 'Pe202202072000', '2022-02-16', 'WORM RID', '0000-00-00', 'Bg202202161636');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `FromName` text NOT NULL,
  `SenderID` varchar(14) NOT NULL,
  `ToName` text NOT NULL,
  `ReceiverID` varchar(14) NOT NULL,
  `Message` longtext NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL,
  `DateTimeSort` datetime NOT NULL,
  `MessageID` varchar(14) NOT NULL,
  `Seen` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`FromName`, `SenderID`, `ToName`, `ReceiverID`, `Message`, `Date`, `Time`, `DateTimeSort`, `MessageID`, `Seen`) VALUES
('Guene Lopez', 'gu202202071953', 'Golden Spoon Animal Clinic and Grooming Services', 'Go202202141734', 'Hi, I would like to ask if you are also selling pet accessories.', '2022-02-15', '19:08:44', '2022-02-15 19:08:44', 'G20220215G1908', 'Unseen'),
('Guene Lopez', 'gu202202071953', 'Pet Paws Animal Clinic', 'Pe202202072000', 'hi, I would like to ask if you\'re also selling pet accessories', '2022-02-15', '19:17:43', '2022-02-15 19:17:43', 'G20220215P1917', 'Seen'),
('Guene Lopez', 'gu202202071953', 'Pet Paws Animal Clinic', 'Pe202202072000', 'cage', '2022-02-16', '14:01:57', '2022-02-16 14:01:57', 'G20220216P1401', 'Seen'),
('Pet Paws Animal Clinic', 'Pe202202072000', 'Guene Lopez', 'gu202202071953', 'yes, would you like to specify the accessories you\'re looking for?', '2022-02-16', '14:00:36', '2022-02-16 14:00:36', 'P20220216G1400', 'Seen');

-- --------------------------------------------------------

--
-- Table structure for table `pet`
--

CREATE TABLE `pet` (
  `image` varchar(520) DEFAULT NULL,
  `PetName` text NOT NULL,
  `Breed` text NOT NULL,
  `DateofBirth` date NOT NULL,
  `Color` text NOT NULL,
  `Species` text NOT NULL,
  `Sex` text NOT NULL,
  `PetID` varchar(14) NOT NULL,
  `OwnerID` varchar(14) NOT NULL,
  `deleted` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pet`
--

INSERT INTO `pet` (`image`, `PetName`, `Breed`, `DateofBirth`, `Color`, `Species`, `Sex`, `PetID`, `OwnerID`, `deleted`) VALUES
('images/dogs/BamBam.jpg', 'Bambam', 'Schweenie', '2021-10-02', 'Black and White', 'Canine', 'Male', 'Ba202202111607', 'gu202202071953', '');

-- --------------------------------------------------------

--
-- Table structure for table `petowner`
--

CREATE TABLE `petowner` (
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `FullName` longtext NOT NULL,
  `Address` longtext NOT NULL,
  `Email` varchar(255) NOT NULL,
  `ContactNumber` varchar(12) NOT NULL,
  `PetOwnerID` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `petowner`
--

INSERT INTO `petowner` (`Username`, `Password`, `FullName`, `Address`, `Email`, `ContactNumber`, `PetOwnerID`) VALUES
('dyosa', 'hhi', 'Athena Tutanes', 'Dona Soledad Ave, Bicutan, Paranaque, 1711 Metro Manila', 'guenelopez10@gmail.com', '09382919283', 'dy202202071954'),
('guene27', 'hello', 'Guene Lopez', 'Block 18 Lot 39 EP Village Phase 2 Pinagsama', 'guenelopez10@gmail.com', '09064836606', 'gu202202071953');

-- --------------------------------------------------------

--
-- Table structure for table `vaccinereport`
--

CREATE TABLE `vaccinereport` (
  `PetID` varchar(14) NOT NULL,
  `OwnerID` varchar(14) NOT NULL,
  `ClinicID` varchar(14) NOT NULL,
  `DateofTreatment` date NOT NULL,
  `Weight` int(4) NOT NULL,
  `Expiration` date NOT NULL,
  `Against` text NOT NULL,
  `Type` text NOT NULL,
  `Manufacturer` longtext NOT NULL,
  `LotNo` varchar(24) NOT NULL,
  `Vet` varchar(255) NOT NULL,
  `ReportID` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vaccinereport`
--

INSERT INTO `vaccinereport` (`PetID`, `OwnerID`, `ClinicID`, `DateofTreatment`, `Weight`, `Expiration`, `Against`, `Type`, `Manufacturer`, `LotNo`, `Vet`, `ReportID`) VALUES
('Ba202202111607', 'gu202202071953', 'Pe202202072000', '2022-02-16', 2, '2022-03-02', 'DHLPPI', 'ML', 'Leptosa Canicola-Icterohaemorrhagie Bactrin<br>Leptoferm', '512753', 'Jose Maria G. Alindogran (3722)', 'Bg202202161639');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`AppointmentID`);

--
-- Indexes for table `clinicowner`
--
ALTER TABLE `clinicowner`
  ADD PRIMARY KEY (`ClinicID`);

--
-- Indexes for table `dewormrecord`
--
ALTER TABLE `dewormrecord`
  ADD PRIMARY KEY (`dewormID`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`MessageID`);

--
-- Indexes for table `pet`
--
ALTER TABLE `pet`
  ADD PRIMARY KEY (`PetID`);

--
-- Indexes for table `petowner`
--
ALTER TABLE `petowner`
  ADD PRIMARY KEY (`PetOwnerID`);

--
-- Indexes for table `vaccinereport`
--
ALTER TABLE `vaccinereport`
  ADD PRIMARY KEY (`ReportID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
