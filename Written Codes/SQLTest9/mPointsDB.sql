-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 05, 2017 at 06:54 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mPointsDBOld`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `Username` varchar(15) NOT NULL,
  `Password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`Username`, `Password`) VALUES
('WSHSMeritAdmin', 'wshs');

-- --------------------------------------------------------

--
-- Table structure for table `extracurricular`
--

CREATE TABLE `extracurricular` (
  `extraIndex` int(3) NOT NULL,
  `Department` varchar(100) DEFAULT NULL,
  `Field` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `extracurricular`
--

INSERT INTO `extracurricular` (`extraIndex`, `Department`, `Field`) VALUES
(1, 'English', 'Debating Club (WA Debating League)'),
(2, 'English', 'Philosophy Club'),
(3, 'English', 'Gavel Club (Speech)'),
(4, 'English', 'Young Writers Competition'),
(5, 'English', 'Tim Winton Prose Competition'),
(6, 'English', 'Primo Lux Poetry Competition'),
(7, 'Languages', 'WA Japanese Speech Competition'),
(8, 'Languages', 'ACER Language Competition'),
(9, 'Languages', 'Dante Alighieri Italian Examination'),
(10, 'Languages', 'Alliance Francaise Examination'),
(11, 'Languages', 'WAATI Exams'),
(12, 'Languages', 'Hyogo Japanese Exchange'),
(13, 'Languages', 'Toulouse French Exchange'),
(14, 'Languages', 'Intercultural Italian Exchange'),
(16, 'Mathematics', 'ICAS Mathematics Competition'),
(17, 'Mathematics', 'Australian Mathematics Competition'),
(18, 'Mathematics', 'State Mathematics Camp'),
(19, 'Mathematics', 'Mathematical Olympiad'),
(20, 'Mathematics', 'Have-Sum-Fun Mathematics Competition'),
(21, 'Mathematics', 'Australian Informatics Competition'),
(22, 'Science', 'Rio Tinto Big Science Competition'),
(23, 'Science', 'BHP Billiton Science Awards'),
(24, 'Science', 'STAWA Science Talent Search'),
(25, 'Science', 'Young Inventors Competition'),
(26, 'Science', 'UNSW ICAS Science Competition'),
(27, 'Science', 'Science Engineering Challenge'),
(28, 'Science', 'Murdoch STAR Quiz'),
(29, 'Science', 'WA Astronomy Cup'),
(30, 'Science', 'eV Challenge'),
(31, 'Science', 'Solar Car Challenge'),
(32, 'Science', 'World Solar Challenge'),
(33, 'Science', 'Value Adding Quest'),
(34, 'Science', 'National Youth Science Forum'),
(35, 'Science', 'Siemens Science Summer School'),
(36, 'Science', 'RACI Chemistry Quiz'),
(37, 'Science', 'WA Titration Stakes'),
(38, 'Science', 'Professor Harry Messel'),
(39, 'Science', 'International Science School'),
(40, 'Physical Education', 'National Schools Basketball Competition'),
(41, 'Physical Education', 'Basketball Boys'),
(42, 'Physical Education', 'Basketball Girls'),
(43, 'Physical Education', 'AIS Links'),
(44, 'Physical Education', 'A Division Swimming Carnival'),
(45, 'Physical Education', 'B Division Swimming Carnival'),
(46, 'Physical Education', 'B Division Athletics Carnival'),
(47, 'Physical Education', 'Soccer Boys'),
(48, 'Physical Education', 'Soccer Girls'),
(49, 'Physical Education', 'Badminton'),
(50, 'Physical Education', 'AFL Girls'),
(51, 'Physical Education', 'AFL Boys'),
(52, 'Physical Education', 'Cricket'),
(53, 'Physical Education', 'Netball Girls'),
(54, 'Physical Education', 'Triathlon'),
(55, 'Physical Education', 'Cross Country'),
(56, 'Physical Education', 'Rugby Union'),
(57, 'Physical Education', 'Baseball Open'),
(58, 'Physical Education', 'Touch Football'),
(59, 'Physical Education', 'Volleyball'),
(60, 'Physical Education', 'Golf'),
(61, 'Physical Education', 'Hockey Open'),
(62, 'Physical Education', 'Squash'),
(65, 'Society and Environment', 'Geography Competition'),
(66, 'Society and Environment', 'National History Competition'),
(67, 'Society and Environment', 'Stock Market Game'),
(68, 'Society and Environment', 'Economics Association'),
(69, 'Society and Environment', 'Mock Trial'),
(70, 'Society and Environment', 'ANZAC Tour Competition'),
(71, 'Society and Environment', 'Youth Parliament'),
(72, 'Technology and Enterprise', 'Catering at Events'),
(73, 'Technology and Enterprise', 'Willo Cafe'),
(74, 'Technology and Enterprise', 'ICAS Computing Competition'),
(75, 'Technology and Enterprise', 'Graphic Design Competitions'),
(76, 'Technology and Enterprise', 'Animation for Drama'),
(77, 'Technology and Enterprise', 'Set Construction For Whole'),
(78, 'Technology and Enterprise', 'SCITECH Animation Competition'),
(79, 'Technology and Enterprise', 'CPA Australia Plan Your Own Enterprise'),
(80, 'The Arts', 'Jazz Band'),
(81, 'The Arts', 'Junior Band'),
(82, 'The Arts', 'Senior Band'),
(83, 'The Arts', 'Choir'),
(84, 'The Arts', 'String Ensemble'),
(85, 'The Arts', 'Guitar Ensemble'),
(86, 'The Arts', 'Choir Festival'),
(87, 'The Arts', 'Band Festival'),
(88, 'The Arts', 'Dance Festival'),
(89, 'The Arts', 'School Production'),
(90, 'The Arts', 'Rock Eisteddfod'),
(91, 'The Arts', 'Media Club'),
(92, 'The Arts', 'Drama Club'),
(93, 'Student Services', 'Peer Support Program'),
(94, 'Student Services', 'Relay for Life'),
(95, 'Student Services', 'Fundraising for Charities'),
(96, 'Student Services', 'Graduation Performance'),
(97, 'Student Services', 'Student Council'),
(98, 'Other', 'NAIDOC Day'),
(99, 'Other', 'Duke of Edinburgh Award'),
(100, 'Other', 'ANZAC Ceremony'),
(101, 'Other', 'Remembrance Day'),
(102, 'Other', 'World Women''s Day'),
(103, 'Other', 'Yearbook Committee'),
(104, 'Other', 'Outspan'),
(105, 'Other', 'Multicultural Week'),
(106, 'Other', 'Harmony Day'),
(107, 'Other', 'World''s Greatest Shave');

-- --------------------------------------------------------

--
-- Table structure for table `extradepartment`
--

CREATE TABLE `extradepartment` (
  `departmentIndex` int(3) NOT NULL,
  `Department` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `extradepartment`
--

INSERT INTO `extradepartment` (`departmentIndex`, `Department`) VALUES
(1, 'English'),
(2, 'Languages'),
(3, 'Mathematics'),
(4, 'Other'),
(9, 'Physical Education'),
(7, 'Science'),
(6, 'Society and Environment'),
(5, 'Student Services'),
(8, 'Technology and Enterprise'),
(10, 'The Arts');

-- --------------------------------------------------------

--
-- Table structure for table `permanent`
--

CREATE TABLE `permanent` (
  `StudentEmail` varchar(100) NOT NULL,
  `Reason` varchar(1000) DEFAULT NULL,
  `Year` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `permanent`
--

INSERT INTO `permanent` (`StudentEmail`, `Reason`, `Year`) VALUES
('roshan.prashant10@education.wa.edu.au', NULL, NULL),
('roshan.prashant11@education.wa.edu.au', NULL, NULL),
('roshan.prashant12@education.wa.edu.au', NULL, NULL),
('roshan.prashant1@education.wa.edu.au', NULL, NULL),
('roshan.prashant2@education.wa.edu.au', NULL, NULL),
('roshan.prashant3@education.wa.edu.au', NULL, NULL),
('roshan.prashant4@education.wa.edu.au', NULL, NULL),
('roshan.prashant5@education.wa.edu.au', NULL, NULL),
('roshan.prashant6@education.wa.edu.au', NULL, NULL),
('roshan.prashant7@education.wa.edu.au', NULL, NULL),
('roshan.prashant8@education.wa.edu.au', NULL, NULL),
('roshan.prashant9@education.wa.edu.au', NULL, NULL),
('roshan.prashant@education.wa.edu.au', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `MeritCap` int(3) NOT NULL,
  `NumBound` int(3) NOT NULL,
  `DefMsg0` varchar(100) NOT NULL,
  `DefMsgBelow` varchar(100) NOT NULL,
  `DefMsgAbove` varchar(100) NOT NULL,
  `topStudentsCap` int(3) NOT NULL DEFAULT '25',
  `StudentFile` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`MeritCap`, `NumBound`, `DefMsg0`, `DefMsgBelow`, `DefMsgAbove`, `topStudentsCap`, `StudentFile`) VALUES
(100, 50, 'None', 'HiHi', 'HiHi2', 25, '/Applications/XAMPP/xamppfiles/htdocs/SQLTest2/filename.csv');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `UserIndex` int(5) NOT NULL,
  `FName` varchar(100) NOT NULL,
  `LName` varchar(100) NOT NULL,
  `Year` int(1) NOT NULL DEFAULT '7',
  `Email` varchar(100) NOT NULL,
  `Class1` varchar(15) DEFAULT NULL,
  `Class2` varchar(15) DEFAULT NULL,
  `Class3` varchar(15) DEFAULT NULL,
  `Class4` varchar(15) DEFAULT NULL,
  `Class5` varchar(15) DEFAULT NULL,
  `Class6` varchar(15) DEFAULT NULL,
  `Class7` varchar(15) DEFAULT NULL,
  `Class8` varchar(15) DEFAULT NULL,
  `Class9` varchar(15) DEFAULT NULL,
  `Class10` varchar(15) DEFAULT NULL,
  `Class11` varchar(15) DEFAULT NULL,
  `Class12` varchar(15) DEFAULT NULL,
  `Teacher` varchar(1000) DEFAULT NULL,
  `Merit` varchar(1000) DEFAULT NULL,
  `weeklyMerits` int(3) NOT NULL DEFAULT '0',
  `totalMerits` int(3) NOT NULL DEFAULT '0',
  `ObtainedSOTW` int(1) NOT NULL DEFAULT '0',
  `ObtainedMerit` int(1) NOT NULL DEFAULT '0',
  `ObtainedExcellence` int(1) NOT NULL DEFAULT '0',
  `ObtainedOutstanding` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`UserIndex`, `FName`, `LName`, `Year`, `Email`, `Class1`, `Class2`, `Class3`, `Class4`, `Class5`, `Class6`, `Class7`, `Class8`, `Class9`, `Class10`, `Class11`, `Class12`, `Teacher`, `Merit`, `weeklyMerits`, `totalMerits`, `ObtainedSOTW`, `ObtainedMerit`, `ObtainedExcellence`, `ObtainedOutstanding`) VALUES
(4, 'Jayden', 'Choo', 7, 'roshan.prashant3@education.wa.edu.au', '10HSSG_4', '10SCG_4', '10MTG_4', '10ENG_4', '10PE_7', '10HE_7', '10DD_4', NULL, NULL, NULL, NULL, NULL, '1,1,', '5,10,', 15, 15, 1, 1, 1, 0),
(6, 'Sohail', 'Kharrazi', 9, 'roshan.prashant5@education.wa.edu.au', '10CS_1', '10SCG_6', '10MTG_6', '10ENG_6', '10PE_9', '10HE_9', '10DD_6', NULL, NULL, NULL, NULL, NULL, '1,1,1,1,1,1,1,1,1,1,1,1,', '5,5,5,5,5,10,10,10,0,0,10,10,', 75, 75, 1, 0, 0, 0),
(7, 'Tristan', 'Sheets', 7, 'roshan.prashant6@education.wa.edu.au', '10HSSG_7', '10SCG_7', '10MTG_7', '10ENG_7', '10PE_10', '10HE_10', '10DD_7', NULL, NULL, NULL, NULL, NULL, '1,', '5,', 5, 5, 1, 0, 0, 0),
(8, 'Rabiya', 'Raza', 8, 'roshan.prashant7@education.wa.edu.au', '10HSSG_8', '10SCG_8', '10MTG_8', '10ENG_8', '10PE_11', '10HE_11', '10DD_8', NULL, NULL, NULL, NULL, NULL, '1,', '5,', 5, 5, 1, 0, 0, 0),
(9, 'Elisya', 'Razif', 9, 'roshan.prashant8@education.wa.edu.au', '10HSSG_9', '10SCG_9', '10MTG_9', '10ENG_9', '10PE_12', '10HE_12', '10DD_9', NULL, NULL, NULL, NULL, NULL, '1,', '5,', 5, 5, 0, 0, 0, 0),
(11, 'Chantelle', 'Hoffmann', 8, 'roshan.prashant10@education.wa.edu.au', '10CS_3', '10SCGT_1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,', '5,3,3,3,3,3,3,3,3,10,10,10,10,10,10,10,', 99, 99, 1, 0, 0, 0),
(12, 'Jordan', 'Hoffmann', 9, 'roshan.prashant11@education.wa.edu.au', NULL, '10CS_3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1,1,1,1,1,1,1,1,1,1,', '10,10,10,10,10,10,10,10,10,5,', 205, 100, 0, 0, 0, 0),
(58, 'Yi Seng', 'Yap', 0, 'roshan.prashant4@education.wa.edu.au', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1,', '5,', 5, 5, 0, 0, 0, 0),
(59, 'Jordan', 'Hoffmann', 0, 'roshan.prashant9@education.wa.edu.au', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1,', '5,', 5, 5, 0, 0, 0, 0),
(60, 'Zachary', 'Browne', 0, 'roshan.prashant12@education.wa.edu.au', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1,1,', '5,10,', 15, 15, 0, 0, 0, 0),
(71, 'Roshan', 'Prashant', 5, 'roshan.prashant@education.wa.edu.au', '', '10SCG_1', '10MTG_1', '10ENG_1', '10PE_4', '10HE_4', '10DD_1', NULL, NULL, NULL, NULL, NULL, '1,', '5,', 5, 5, 0, 0, 0, 0),
(72, 'Avinash', 'Rajandra', 8, 'roshan.prashant1@education.wa.edu.au', '10HSSG_2', '10SCG_2', '10MTG_2', '10ENG_2', '10PE_5', '10HE_5', '10DD_2', NULL, NULL, NULL, NULL, NULL, '1,', '5,', 5, 5, 0, 0, 0, 0),
(73, 'Kevin', 'Choo', 3, 'roshan.prashant2@education.wa.edu.au', '10HSSG_3', '10SCG_3', '10MTG_3', '10ENG_3', '10PE_6', '10HE_6', '10DD_3', NULL, NULL, NULL, NULL, NULL, '1,', '5,', 5, 5, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `UserIndex` int(5) NOT NULL,
  `FName` varchar(100) DEFAULT NULL,
  `LName` varchar(100) DEFAULT NULL,
  `Title` varchar(100) DEFAULT NULL,
  `Status` int(1) NOT NULL DEFAULT '1',
  `Email` varchar(100) NOT NULL,
  `mPoints` int(3) NOT NULL DEFAULT '0',
  `Class1` varchar(15) DEFAULT NULL,
  `Class2` varchar(15) DEFAULT NULL,
  `Class3` varchar(15) DEFAULT NULL,
  `Class4` varchar(15) DEFAULT NULL,
  `Class5` varchar(15) DEFAULT NULL,
  `Class6` varchar(15) DEFAULT NULL,
  `Class7` varchar(15) DEFAULT NULL,
  `Class8` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`UserIndex`, `FName`, `LName`, `Title`, `Status`, `Email`, `mPoints`, `Class1`, `Class2`, `Class3`, `Class4`, `Class5`, `Class6`, `Class7`, `Class8`) VALUES
(1, 'Nigel', 'Dutton', NULL, 7, 'nigel.dutton@education.wa.edu.au', 2322, '10CS_1', '10CS_2', '10CS_3', '10CS_4', NULL, NULL, NULL, NULL),
(2, 'Jordan', 'Hoffmann', NULL, 1, 'nigel.dutton@education.wa.edu.au', 51, '10CS_2', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'Frinze', 'Lapuz', NULL, 1, 'nigel.dutton@education.wa.edu.au', 51, '10CS_3', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'Dhirren', 'Ranjit Rajah', NULL, 1, 'nigel.dutton@education.wa.edu.au', 51, '10CS_4', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'Andrew', 'Lee', NULL, 1, 'nigel.dutton@education.wa.edu.au', 51, '10CS_5', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'Bob', 'Brown', NULL, 0, 'nigel.dutton@education.wa.edu.au', 51, '10CS_6', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'Jane', 'Jhonson', NULL, 0, 'nigel.dutton@education.wa.edu.au', 51, '10CS_7', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'Josh', 'Shipp', NULL, 0, 'nigel.dutton@education.wa.edu.au', 51, '10CS_8', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'Acorn', 'Wan', NULL, 0, 'nigel.dutton@education.wa.edu.au', 51, '10CS_9', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'Andrew', 'Jin', NULL, 0, 'nigel.dutton@education.wa.edu.au', 51, '10CS_10', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'Sergio', 'Arellano', NULL, 8, 'nigel.dutton@education.wa.edu.au', 57, '10CS_11', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 'Alec', 'Kanganas', NULL, 1, 'nigel.dutton@education.wa.edu.au', 51, '10CS_12', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 'Claudia', 'Goh', NULL, 0, 'nigel.dutton@education.wa.edu.au', 51, '10CS_13', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 'Delwyn', 'Lee', NULL, 0, 'nigel.dutton@education.wa.edu.au', 51, '10CS_14', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 'Tai Shan', 'Ng', NULL, 0, 'nigel.dutton@education.wa.edu.au', 51, '10CS_15', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 'Leo', 'Ngu', NULL, 0, 'nigel.dutton@education.wa.edu.au', 51, '10CS_16', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 'Nikita', 'Tchakashniv', NULL, 0, 'nigel.dutton@education.wa.edu.au', 51, '10CS_17', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 'Sumira', 'Wejisuria', NULL, 0, 'nigel.dutton@education.wa.edu.au', 51, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`Username`);

--
-- Indexes for table `extracurricular`
--
ALTER TABLE `extracurricular`
  ADD PRIMARY KEY (`extraIndex`);

--
-- Indexes for table `extradepartment`
--
ALTER TABLE `extradepartment`
  ADD PRIMARY KEY (`departmentIndex`),
  ADD UNIQUE KEY `Department` (`Department`);

--
-- Indexes for table `permanent`
--
ALTER TABLE `permanent`
  ADD PRIMARY KEY (`StudentEmail`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`StudentFile`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`UserIndex`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`UserIndex`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `extracurricular`
--
ALTER TABLE `extracurricular`
  MODIFY `extraIndex` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=264;
--
-- AUTO_INCREMENT for table `extradepartment`
--
ALTER TABLE `extradepartment`
  MODIFY `departmentIndex` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `UserIndex` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `UserIndex` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
