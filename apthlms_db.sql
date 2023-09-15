-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 05, 2023 at 05:22 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apthlms_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `borrow`
--

CREATE TABLE `borrow` (
  `borrow_id` int(11) NOT NULL,
  `ID` bigint(50) NOT NULL,
  `date_borrow` varchar(100) NOT NULL,
  `due_date` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `borrow`
--

INSERT INTO `borrow` (`borrow_id`, `ID`, `date_borrow`, `due_date`) VALUES
(1, 12, '2023-08-31 22:06:50', '31/08/2023'),
(2, 11, '2023-09-02 22:56:40', '3/09/2023');

-- --------------------------------------------------------

--
-- Table structure for table `borrowdetails`
--

CREATE TABLE `borrowdetails` (
  `borrow_details_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `borrow_id` int(11) NOT NULL,
  `borrow_status` varchar(50) NOT NULL,
  `date_return` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `borrowdetails`
--

INSERT INTO `borrowdetails` (`borrow_details_id`, `book_id`, `borrow_id`, `borrow_status`, `date_return`) VALUES
(1, 35, 1, 'returned', '2023-09-01 09:05:14'),
(2, 39, 2, 'returned', '2023-09-05 03:33:47');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `classname` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `classname`) VALUES
(1, 'Periodical'),
(2, 'English'),
(3, 'Math'),
(4, 'Science'),
(5, 'Encyclopedia'),
(6, 'Filipiniana'),
(7, 'Newspaper'),
(8, 'General'),
(9, 'References');

-- --------------------------------------------------------

--
-- Table structure for table `lost_book`
--

CREATE TABLE `lost_book` (
  `Book_ID` int(11) NOT NULL,
  `ISBN` int(11) NOT NULL,
  `Member_No` varchar(50) NOT NULL,
  `Date Lost` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `id` int(10) NOT NULL,
  `AdminName` varchar(120) DEFAULT NULL,
  `UserName` varchar(120) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`id`, `AdminName`, `UserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`) VALUES
(1, 'Admin', 'admin', 8979555558, 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '2019-10-11 04:36:52'),
(2, 'Aptech', 'aptech', 74467689, 'aptech123@gmail.com', 'aptech', '2023-08-28 16:35:36');

-- --------------------------------------------------------

--
-- Table structure for table `tblbook`
--

CREATE TABLE `tblbook` (
  `book_id` int(11) NOT NULL,
  `book_title` varchar(100) NOT NULL,
  `category_id` int(50) NOT NULL,
  `author` varchar(50) NOT NULL,
  `book_copies` int(11) NOT NULL,
  `book_pub` varchar(100) NOT NULL,
  `publisher_name` varchar(100) NOT NULL,
  `isbn` varchar(50) NOT NULL,
  `copyright_year` int(11) NOT NULL,
  `date_receive` varchar(20) NOT NULL,
  `date_added` datetime NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblbook`
--

INSERT INTO `tblbook` (`book_id`, `book_title`, `category_id`, `author`, `book_copies`, `book_pub`, `publisher_name`, `isbn`, `copyright_year`, `date_receive`, `date_added`, `status`) VALUES
(33, 'English Made Easy', 2, 'Jonathan Crichton, Pieter Koster', 25, 'Rabia Book House, Lahore', 'Rao Zulfiqar', '978-969-508-145-7', 2015, '', '2023-08-14 08:07:27', 'Archive'),
(34, 'Mathematics', 3, 'Agha Sohail Ahmed', 75, 'Prof Ahajiz Ahmed', 'Hashir Ali', 'SO(G-1)E&L', 2014, '', '2023-08-19 09:35:37', 'Archive'),
(35, 'The Fundamentas Of English Grammar And Composition', 8, 'Prof.Malik Shafiq Ahmed', 5000, 'Ahmed Sajjid', 'Tariq Brothers', '9780-8926--558-09', 2003, '', '2023-08-19 09:38:29', 'Archive'),
(36, 'A Brief History of Time', 4, 'Stephen Hawking', 600, 'Bantam Dell Publishing Group', ' Simon Mitton', '978-0-553-10953-5', 1988, '', '2023-08-25 07:41:07', 'Damage'),
(37, 'Salient Features of General', 8, 'Wali Muhammad', 3456, 'Dogar Brothers', 'Dogar.PK', '16890-00-6969', 2022, '', '2023-08-25 07:54:16', 'Damage'),
(38, 'Tongue Twister For Fluency', 2, 'M.Masood', 300, 'Rabia Book House, Lahore', 'Rabia ', ' 978-969-508-132-7', 2020, '', '2023-08-25 07:54:59', 'New'),
(39, 'Mathematics 10th', 3, 'Muhammad Habib', 2000, 'Shan', 'Muhammad Sharif', 'PCA/12/GH23', 2022, '', '2023-08-25 07:55:54', 'New'),
(40, ' Charlotte’s Web – E.B. White', 2, 'E.B.Writes', 9000, 'Garh Willams', 'E.B.Writes', '583-74-8774-884', 2005, '', '2023-08-30 01:49:51', 'Old'),
(41, 'Chemistry', 4, 'Abu Saad Azmi', 40000, 'Universal Book Depot', 'S.M.Ziaur', 'STB 24', 2021, '', '2023-08-30 01:53:18', 'New'),
(42, 'Biology', 4, 'Dr. Nasiruddin', 3000, 'Academic offset Press', 'Dr.Navaid Rab', '087-66-987-001', 2012, '', '2023-08-30 01:57:21', 'Lost'),
(43, 'English For B.A', 2, 'Nawab Ali ', 2500, 'NR Enterprises', 'Abdul Rauf', '434-74525-8840-', 2011, '', '2023-08-30 02:00:07', 'New'),
(44, 'Ideal Essays ', 2, 'Muhammad Arshad', 5600, 'Bool Land Corner', 'Sole Agent Javed Sons', '665-7756-885-8', 1995, '', '2023-08-30 02:02:02', 'Subject for Replacement'),
(45, 'Data Science From Scratch', 4, 'Joel Grus', 3, 'O Reilly Media Publication', 'O Reilly Media', '978149190439', 2015, '', '2023-09-05 08:04:50', 'Lost');

-- --------------------------------------------------------

--
-- Table structure for table `tblclass`
--

CREATE TABLE `tblclass` (
  `ID` int(5) NOT NULL,
  `ClassName` varchar(50) DEFAULT NULL,
  `Section` varchar(20) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblclass`
--

INSERT INTO `tblclass` (`ID`, `ClassName`, `Section`, `CreationDate`) VALUES
(22, '11th', 'A', '2023-08-29 17:06:38'),
(23, '10th', 'A', '2023-08-29 17:06:47'),
(24, '9th', 'A', '2023-08-29 17:06:56'),
(25, '8th', 'A', '2023-08-29 17:07:42'),
(26, '7th', 'A', '2023-08-29 17:07:50'),
(27, '6th', 'A', '2023-08-29 17:07:57'),
(28, '12th', 'B', '2023-08-29 17:08:07'),
(29, '11th', 'B', '2023-08-29 17:08:15'),
(30, '10th', 'B', '2023-08-29 17:08:24'),
(31, '9th', 'B', '2023-08-29 17:08:33'),
(32, '8th', 'B', '2023-08-29 17:08:41'),
(33, '7th', 'B', '2023-08-29 17:08:52'),
(34, '6th', 'B', '2023-08-29 17:09:00'),
(35, '5th', 'A', '2023-08-31 11:14:09');

-- --------------------------------------------------------

--
-- Table structure for table `tblemployee`
--

CREATE TABLE `tblemployee` (
  `ID` int(5) NOT NULL,
  `EmployeeName` varchar(50) DEFAULT NULL,
  `Designation` varchar(20) DEFAULT NULL,
  `JoiningDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblemployee`
--

INSERT INTO `tblemployee` (`ID`, `EmployeeName`, `Designation`, `JoiningDate`) VALUES
(1, 'Tahir', 'Library Specialists', '2022-01-13 18:42:14'),
(17, 'Ali', 'Library Clerk', '2023-08-13 05:10:03'),
(18, 'Faisal', 'Librarian', '2023-08-13 05:18:51');

-- --------------------------------------------------------

--
-- Table structure for table `tblnotice`
--

CREATE TABLE `tblnotice` (
  `ID` int(5) NOT NULL,
  `NoticeTitle` mediumtext DEFAULT NULL,
  `ClassId` int(10) DEFAULT NULL,
  `NoticeMsg` mediumtext DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblnotice`
--

INSERT INTO `tblnotice` (`ID`, `NoticeTitle`, `ClassId`, `NoticeMsg`, `CreationDate`) VALUES
(2, 'Marks of Unit Test.', 3, 'Meet your class teacher for seeing copies of unit test', '2022-01-19 06:35:58'),
(3, 'Making Noise', 13, 'Don\'t make noise in library Hall', '2022-01-19 06:35:58'),
(4, 'Test', 3, 'This is for testing.', '2022-02-02 18:17:03'),
(5, 'Test Notice', 8, 'This is for Testing.', '2022-02-02 19:03:43'),
(6, 'chehlum', 28, 'hello students your class wil remin off on the day of chehlum', '2023-09-02 10:18:17'),
(7, 'Library Constraction', 21, 'Due To Work in Progress Library will closed 5th September', '2023-09-04 06:19:37');

-- --------------------------------------------------------

--
-- Table structure for table `tblpage`
--

CREATE TABLE `tblpage` (
  `ID` int(10) NOT NULL,
  `PageType` varchar(200) DEFAULT NULL,
  `PageTitle` mediumtext DEFAULT NULL,
  `PageDescription` mediumtext DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `UpdationDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblpage`
--

INSERT INTO `tblpage` (`ID`, `PageType`, `PageTitle`, `PageDescription`, `Email`, `MobileNumber`, `UpdationDate`) VALUES
(1, 'aboutus', 'About Us', '<div style=\"text-align: center;\"><font face=\"georgia\" size=\"5\"><span style=\"color: rgb(84, 86, 90);\" helvetica=\"\" neue\",=\"\" helvetica,=\"\" sans-serif;=\"\" background-color:=\"\" rgb(235,=\"\" 239,=\"\" 240);\"=\"\">Our library offers collaborative learning and community interaction in a safe setting, with co-working spaces, study rooms, workstations, thousands of books, and unlimited internet – all in one place. We aspire to offer experiences, generate ideas and discussion, and bring people and communities together in a vibrant social space,</span><span style=\"color: rgb(84, 86, 90); text-align: left;\">libraries are vibrant community and cultural spaces where you can express yourself, interact with others and explore ideas to learn new things.</span></font></div>', NULL, NULL, NULL),
(2, 'contactus', 'Contact Us', '1st Chowck Street No.\'3\' House No.\'9\' Block \'C\' Sindh Green Colony Larkana,Sindh,Pakistan.', 'noorsoomro2006@gmail.com', 3232021227, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblpublicnotice`
--

CREATE TABLE `tblpublicnotice` (
  `ID` int(5) NOT NULL,
  `NoticeTitle` varchar(200) DEFAULT NULL,
  `NoticeMessage` mediumtext DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblpublicnotice`
--

INSERT INTO `tblpublicnotice` (`ID`, `NoticeTitle`, `NoticeMessage`, `CreationDate`) VALUES
(1, 'Closing Library', 'It is Informed you the library is closed tomorow', '2022-01-20 09:11:57'),
(2, 'Making Noise', 'It is Stricty informed you don\'t make noise in library Hall.\r\n', '2022-02-02 19:04:10'),
(3, 'Opening Library', 'Library are Open at 9:00pm', '2023-08-10 17:41:04');

-- --------------------------------------------------------

--
-- Table structure for table `tblstudent`
--

CREATE TABLE `tblstudent` (
  `ID` int(10) NOT NULL,
  `StudentName` varchar(200) DEFAULT NULL,
  `StudentEmail` varchar(200) DEFAULT NULL,
  `StudentClass` varchar(100) DEFAULT NULL,
  `Gender` varchar(50) DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `StuID` varchar(200) DEFAULT NULL,
  `FatherName` mediumtext DEFAULT NULL,
  `MotherName` mediumtext DEFAULT NULL,
  `ContactNumber` bigint(10) DEFAULT NULL,
  `AltenateNumber` bigint(10) DEFAULT NULL,
  `Address` mediumtext DEFAULT NULL,
  `UserName` varchar(200) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `Image` varchar(200) DEFAULT NULL,
  `DateofAdmission` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblstudent`
--

INSERT INTO `tblstudent` (`ID`, `StudentName`, `StudentEmail`, `StudentClass`, `Gender`, `DOB`, `StuID`, `FatherName`, `MotherName`, `ContactNumber`, `AltenateNumber`, `Address`, `UserName`, `Password`, `Image`, `DateofAdmission`) VALUES
(11, 'Muhammad Faisal ', 'sfaisal01@gmail.com', '21', 'Male', '2004-12-26', '101', 'Abdul Rasheed Soomro', 'NGM', 3133152773, 3232021227, 'Larkana/Sindh/Pakistan', 'faisal', '202cb962ac59075b964b07152d234b70', '3aab2ce06f6dea4b4c74d6c2182d5ab91693330226.jpg', '2023-08-29 17:30:26'),
(12, 'Noor Muhammad ', 'noorsoomro2006@gmail.com', '22', 'Male', '2006-12-14', '102', 'Abdul Rasheed Soomro', 'NGM', 3330333657, 3184944194, 'Larkana/Sindh/Pakistan', 'noor', '202cb962ac59075b964b07152d234b70', 'b5033cb90ab48e9e9df33abb9bcf9a441693330381.jpg', '2023-08-29 17:33:01'),
(13, 'Shahbaz Hyder', 'kalhoro123@gmail.com', '23', 'Male', '2007-02-01', '103', 'Haji Ghulamllah', 'SSS', 3213514055, 3213514055, 'Larkana/Sindh/Pakistam', 'shahbaz', '202cb962ac59075b964b07152d234b70', '28e0fa3f2a34f11d2031e6446afba6371693330684.jpg', '2023-08-29 17:38:04'),
(14, 'hadi', 'hadi@gmail.com', '28', 'Male', '2023-09-05', '110', 'ghulam shabir', 'masmat parveen', 315034468, 315034468, 'syr padar', 'hadi', '3861a60523ef89a017be166c5b325409', '1db2a312dba87dc210789ec1eab71b811693650031.png', '2023-09-02 10:20:31');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `id` int(11) NOT NULL,
  `borrowertype` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`id`, `borrowertype`) VALUES
(2, 'Teacher'),
(20, 'Employee'),
(21, 'Non-Teaching'),
(22, 'Student'),
(32, 'Contruction');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `borrow`
--
ALTER TABLE `borrow`
  ADD PRIMARY KEY (`borrow_id`),
  ADD KEY `borrowerid` (`ID`),
  ADD KEY `borrowid` (`borrow_id`);

--
-- Indexes for table `borrowdetails`
--
ALTER TABLE `borrowdetails`
  ADD PRIMARY KEY (`borrow_details_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`),
  ADD UNIQUE KEY `category_id` (`category_id`),
  ADD KEY `classid` (`category_id`);

--
-- Indexes for table `lost_book`
--
ALTER TABLE `lost_book`
  ADD PRIMARY KEY (`Book_ID`);

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblbook`
--
ALTER TABLE `tblbook`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `tblclass`
--
ALTER TABLE `tblclass`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblemployee`
--
ALTER TABLE `tblemployee`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblnotice`
--
ALTER TABLE `tblnotice`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblpage`
--
ALTER TABLE `tblpage`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblpublicnotice`
--
ALTER TABLE `tblpublicnotice`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblstudent`
--
ALTER TABLE `tblstudent`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`),
  ADD KEY `borrowertype` (`borrowertype`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `borrow`
--
ALTER TABLE `borrow`
  MODIFY `borrow_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `borrowdetails`
--
ALTER TABLE `borrowdetails`
  MODIFY `borrow_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=801;

--
-- AUTO_INCREMENT for table `lost_book`
--
ALTER TABLE `lost_book`
  MODIFY `Book_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblbook`
--
ALTER TABLE `tblbook`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `tblclass`
--
ALTER TABLE `tblclass`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tblemployee`
--
ALTER TABLE `tblemployee`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tblnotice`
--
ALTER TABLE `tblnotice`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tblpage`
--
ALTER TABLE `tblpage`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblpublicnotice`
--
ALTER TABLE `tblpublicnotice`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblstudent`
--
ALTER TABLE `tblstudent`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
