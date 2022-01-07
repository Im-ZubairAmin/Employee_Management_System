-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2022 at 05:30 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ems`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_info`
--

CREATE TABLE `admin_info` (
  `Admin_ID` int(11) NOT NULL,
  `First_Name` varchar(25) NOT NULL,
  `Last_Name` varchar(25) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Phone_Number` varchar(11) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Address` varchar(300) NOT NULL,
  `CNIC` varchar(13) NOT NULL,
  `DateOfBirth` date NOT NULL,
  `DateOfJoining` date NOT NULL,
  `Salary` int(11) NOT NULL,
  `Total_Leave_Days` int(2) NOT NULL,
  `Leave_Days_Used` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_info`
--

INSERT INTO `admin_info` (`Admin_ID`, `First_Name`, `Last_Name`, `Gender`, `Phone_Number`, `Email`, `Password`, `Address`, `CNIC`, `DateOfBirth`, `DateOfJoining`, `Salary`, `Total_Leave_Days`, `Leave_Days_Used`) VALUES
(31, 'Jake', 'Paul', 'Male', '01284837610', 'testEmail@gmail.com', '123', 'Not Important', '8392048228193', '2021-10-18', '2021-10-07', 214200, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `advance_table`
--

CREATE TABLE `advance_table` (
  `AdvanceTable_ID` int(11) NOT NULL,
  `Developer_ID` int(11) NOT NULL,
  `Manager_ID` int(11) NOT NULL,
  `Reason` varchar(500) NOT NULL,
  `Amount` int(11) NOT NULL,
  `DateApplied` date NOT NULL,
  `Status` varchar(25) NOT NULL,
  `Active` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `advance_table`
--

INSERT INTO `advance_table` (`AdvanceTable_ID`, `Developer_ID`, `Manager_ID`, `Reason`, `Amount`, `DateApplied`, `Status`, `Active`) VALUES
(3, 11, 1, 'fjwekohfhwe', 34000, '2021-09-10', 'Accepted', 'no'),
(4, -1, 1, 'dnfjsadfhasdih', 3909, '2021-10-12', 'Accepted', 'no'),
(5, -1, 1, 'dfmnadfn;erqhe', 5657, '2021-10-12', 'Rejected', 'no'),
(6, -1, 1, 'ewifnqweihf', 100, '2021-10-12', 'Rejected', 'no'),
(7, -1, 1, 'jih99h9hhh99h', 34000, '2021-10-12', 'Rejected', 'no'),
(10, 11, 1, 'dasdasd', 34000, '2021-10-13', 'Pending', 'no'),
(12, -1, 1, 'ewmrmewkmr', 34000, '2021-09-07', 'Accepted', 'no'),
(13, 11, 1, 'bkjb', 34000, '2021-10-16', 'Pending', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `complaint_table`
--

CREATE TABLE `complaint_table` (
  `Complaint_ID` int(11) NOT NULL,
  `TypeOfEmployee` varchar(25) NOT NULL,
  `Developer_ID` int(11) NOT NULL,
  `Manager_ID` int(11) NOT NULL,
  `ComplaintTo` varchar(25) NOT NULL,
  `Complaint` varchar(500) NOT NULL,
  `DateOfComplaint` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complaint_table`
--

INSERT INTO `complaint_table` (`Complaint_ID`, `TypeOfEmployee`, `Developer_ID`, `Manager_ID`, `ComplaintTo`, `Complaint`, `DateOfComplaint`) VALUES
(1, 'Developer', 11, 1, 'Manager', 'kncknsaknckn', '2021-10-07'),
(2, 'Developer', 11, 1, 'Admin', 'Harrasment', '2021-10-07'),
(4, 'Manager', -1, 1, 'Admin', 'Overworked', '2021-10-07'),
(5, 'Developer', 11, 1, 'Manager', 'efwekjfkwe', '2021-10-10'),
(6, 'Developer', 11, 1, 'Manager', 'jdewjfjewf', '2021-10-10'),
(7, 'Developer', 11, 1, 'Manager', 'fmwefwjefjweof', '2021-10-10'),
(8, 'Developer', 11, 1, 'Manager', 'fwefwoejfojwe', '2021-10-10'),
(9, 'Developer', 11, 1, 'Manager', 'fmkefwenfknwe', '2021-10-10'),
(10, 'Developer', 11, 1, 'Manager', 'mkdnkcfadknsf\r\n', '2021-10-10'),
(11, 'Developer', 11, 1, 'Manager', 'sdasdasda', '2021-10-10'),
(12, 'Developer', 11, 1, 'Manager', 'sdsdasd', '2021-10-10'),
(13, 'Developer', 11, 1, 'Manager', 'sdkasdknasdnasdn', '2021-10-10'),
(14, 'Manager', -1, 1, 'Admin', 'fwkoewjfoawe', '2021-10-11'),
(15, 'Manager', -1, 1, 'Admin', 'emfwoefonew', '2021-10-11'),
(16, 'Manager', -1, 1, 'Admin', 'efkewfwe', '2021-10-11'),
(18, 'Developer', 11, 1, 'Manager', 'jsdjqwjdjqw', '2021-10-13'),
(19, 'Developer', 11, 1, 'Manager', 'CHECKING', '2021-10-13'),
(20, 'Manager', -1, 1, 'Admin', 'eqwkewqj', '2021-10-14');

-- --------------------------------------------------------

--
-- Table structure for table `developer_info`
--

CREATE TABLE `developer_info` (
  `Developer_ID` int(11) NOT NULL,
  `First_Name` varchar(25) NOT NULL,
  `Last_Name` varchar(25) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Phone_Number` varchar(11) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Address` varchar(300) NOT NULL,
  `CNIC` varchar(13) NOT NULL,
  `DateOfBirth` date NOT NULL,
  `DateOfJoining` date NOT NULL,
  `Salary` int(11) NOT NULL,
  `Total_Leave_Days` int(2) NOT NULL,
  `Leave_Days_Used` int(2) NOT NULL,
  `Total_Absent_Days` int(11) NOT NULL,
  `Manager_ID` int(11) NOT NULL,
  `JobTitle` int(11) NOT NULL,
  `Team_ID` int(11) NOT NULL,
  `Bonus` int(11) NOT NULL,
  `BonusMonth` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `developer_info`
--

INSERT INTO `developer_info` (`Developer_ID`, `First_Name`, `Last_Name`, `Gender`, `Phone_Number`, `Email`, `Password`, `Address`, `CNIC`, `DateOfBirth`, `DateOfJoining`, `Salary`, `Total_Leave_Days`, `Leave_Days_Used`, `Total_Absent_Days`, `Manager_ID`, `JobTitle`, `Team_ID`, `Bonus`, `BonusMonth`) VALUES
(11, 'Jake', 'Paul', 'Male', '07293375481', 'testing@gmail.com', '123', 'Not Important', '1234567882961', '2021-10-11', '2021-10-09', 145000, 20, 15, 0, 1, 22, 0, 0, '2021-09-12');

-- --------------------------------------------------------

--
-- Table structure for table `fired_employees`
--

CREATE TABLE `fired_employees` (
  `Fired_Employees_ID` int(11) NOT NULL,
  `First_Name` varchar(50) NOT NULL,
  `Last_Name` varchar(50) NOT NULL,
  `Phone_Number` varchar(50) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `CNIC` varchar(50) NOT NULL,
  `TypeOfEmployee` varchar(50) NOT NULL,
  `Gender` varchar(50) NOT NULL,
  `DateOfJoining` date NOT NULL,
  `DateOfFiring` date NOT NULL,
  `Email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fired_employees`
--

INSERT INTO `fired_employees` (`Fired_Employees_ID`, `First_Name`, `Last_Name`, `Phone_Number`, `Address`, `CNIC`, `TypeOfEmployee`, `Gender`, `DateOfJoining`, `DateOfFiring`, `Email`) VALUES
(1, 'Jake', 'Paul', '017338822940', 'rr3r', '1389037448291', 'Manager', 'Male', '2021-10-13', '2022-01-07', 'testingpurpose@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `job_title`
--

CREATE TABLE `job_title` (
  `JobTitle_ID` int(11) NOT NULL,
  `JobTitle_Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job_title`
--

INSERT INTO `job_title` (`JobTitle_ID`, `JobTitle_Name`) VALUES
(1, 'Front-End Developer'),
(22, 'Back-End Developer');

-- --------------------------------------------------------

--
-- Table structure for table `leave_table`
--

CREATE TABLE `leave_table` (
  `LeaveTable_ID` int(11) NOT NULL,
  `Developer_ID` int(11) NOT NULL,
  `Manager_ID` int(11) NOT NULL,
  `Reason` varchar(500) NOT NULL,
  `NumberOfDays` int(2) NOT NULL,
  `StartDate` date NOT NULL,
  `DateApplied` date NOT NULL,
  `Status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `leave_table`
--

INSERT INTO `leave_table` (`LeaveTable_ID`, `Developer_ID`, `Manager_ID`, `Reason`, `NumberOfDays`, `StartDate`, `DateApplied`, `Status`) VALUES
(6, 11, 1, 'I am very sick', 3, '2021-10-19', '2021-10-10', 'Accepted'),
(7, 11, 1, 'ewnfenfnqe', 11, '2021-10-19', '2021-10-11', 'Rejected'),
(20, 11, 1, 'sn sanic', 1, '2021-10-25', '2021-10-12', 'Rejected'),
(25, -1, 1, 'dmfwekfnwen', 1, '2021-10-24', '2021-10-12', 'Accepted'),
(26, -1, 1, 'jniin', 1, '2021-10-26', '2021-10-12', 'Rejected'),
(27, -1, 1, 'oooho', 18, '2021-10-19', '2021-10-12', 'Rejected'),
(28, -1, 1, 'efewfewf', 1, '2021-10-21', '2021-10-13', 'Pending'),
(30, 11, 1, 'qrt', 1, '2021-10-05', '2021-10-13', 'Pending'),
(31, -1, 1, 'bhbh', 1, '2021-10-12', '2021-10-14', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `loan_table`
--

CREATE TABLE `loan_table` (
  `LoanTable_ID` int(11) NOT NULL,
  `Developer_ID` int(11) NOT NULL,
  `Manager_ID` int(11) NOT NULL,
  `Reason` varchar(500) NOT NULL,
  `Amount` int(11) NOT NULL,
  `TimePeriod` int(2) NOT NULL,
  `DateApplied` date NOT NULL,
  `Status` varchar(25) NOT NULL,
  `Active` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loan_table`
--

INSERT INTO `loan_table` (`LoanTable_ID`, `Developer_ID`, `Manager_ID`, `Reason`, `Amount`, `TimePeriod`, `DateApplied`, `Status`, `Active`) VALUES
(3, -1, 1, 'erjerjerj', 56787, 36, '2021-10-12', 'Accepted', 'no'),
(4, -1, 1, 'fdjsfieia[fja', 35, 20, '2021-10-12', 'Rejected', 'no'),
(6, -1, 1, 'fefwe', 56787, 10, '2020-10-16', 'Rejected', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `manager_info`
--

CREATE TABLE `manager_info` (
  `Manager_ID` int(11) NOT NULL,
  `First_Name` varchar(25) NOT NULL,
  `Last_Name` varchar(25) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Phone_Number` varchar(11) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Address` varchar(300) NOT NULL,
  `CNIC` varchar(13) NOT NULL,
  `DateOfBirth` date NOT NULL,
  `DateOfJoining` date NOT NULL,
  `Salary` int(11) NOT NULL,
  `Total_Leave_Days` int(2) NOT NULL,
  `Leave_Days_Used` int(2) NOT NULL,
  `Bonus` int(11) NOT NULL,
  `BonusMonth` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `manager_info`
--

INSERT INTO `manager_info` (`Manager_ID`, `First_Name`, `Last_Name`, `Gender`, `Phone_Number`, `Email`, `Password`, `Address`, `CNIC`, `DateOfBirth`, `DateOfJoining`, `Salary`, `Total_Leave_Days`, `Leave_Days_Used`, `Bonus`, `BonusMonth`) VALUES
(1, 'Jake', 'Paul', 'Male', '03728392810', 'notValid@gmail.com', '123', 'Not Important', '1294028449371', '2021-10-19', '2021-10-05', 160000, 21, 20, 100, '2021-10-15');

-- --------------------------------------------------------

--
-- Table structure for table `project_info`
--

CREATE TABLE `project_info` (
  `Project_ID` int(11) NOT NULL,
  `ProjectName` varchar(50) NOT NULL,
  `CustomerName` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `PhoneNumber` varchar(11) NOT NULL,
  `StartDate` date DEFAULT NULL,
  `EndDate` date DEFAULT NULL,
  `CustomerType` varchar(25) NOT NULL,
  `SoftwareType` varchar(25) NOT NULL,
  `Description` varchar(500) NOT NULL,
  `Status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project_info`
--

INSERT INTO `project_info` (`Project_ID`, `ProjectName`, `CustomerName`, `Email`, `PhoneNumber`, `StartDate`, `EndDate`, `CustomerType`, `SoftwareType`, `Description`, `Status`) VALUES
(0, 'Not Applicable', 'Not Applicable', 'Not Applicable', '11228844930', NULL, NULL, 'Not Applicable', 'Not Applicable', 'Not Applicable', 'Not Applicable'),
(1, 'Qantas', 'Qantas Airways', 'companyEmail@gmail.com', '18399281973', '2021-10-27', '2021-10-30', 'Individual', 'MobileApp', 'feiwfhiewhf', 'Completed');

-- --------------------------------------------------------

--
-- Table structure for table `retired_employees`
--

CREATE TABLE `retired_employees` (
  `Retired_Employee_ID` int(11) NOT NULL,
  `First_Name` varchar(50) NOT NULL,
  `Last_Name` varchar(50) NOT NULL,
  `Phone_Number` varchar(50) NOT NULL,
  `Address` varchar(150) NOT NULL,
  `CNIC` varchar(50) NOT NULL,
  `TypeOfEmployee` varchar(50) NOT NULL,
  `Gender` varchar(50) NOT NULL,
  `DateOfRetiring` date NOT NULL,
  `DateOfJoining` date NOT NULL,
  `Email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `retired_employees`
--

INSERT INTO `retired_employees` (`Retired_Employee_ID`, `First_Name`, `Last_Name`, `Phone_Number`, `Address`, `CNIC`, `TypeOfEmployee`, `Gender`, `DateOfRetiring`, `DateOfJoining`, `Email`) VALUES
(1, 'Jake', 'Paul', '112288449388', 'Not Important', '1839240228618', 'Manager', 'Male', '2022-01-07', '2022-01-07', 'retiredemployee@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `teams_info`
--

CREATE TABLE `teams_info` (
  `Team_ID` int(11) NOT NULL,
  `TeamName` varchar(50) NOT NULL,
  `Manager_ID` int(11) NOT NULL,
  `Project_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teams_info`
--

INSERT INTO `teams_info` (`Team_ID`, `TeamName`, `Manager_ID`, `Project_ID`) VALUES
(0, 'Not Assigned', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_info`
--
ALTER TABLE `admin_info`
  ADD PRIMARY KEY (`Admin_ID`);

--
-- Indexes for table `advance_table`
--
ALTER TABLE `advance_table`
  ADD PRIMARY KEY (`AdvanceTable_ID`),
  ADD KEY `Manager_ID` (`Manager_ID`);

--
-- Indexes for table `complaint_table`
--
ALTER TABLE `complaint_table`
  ADD PRIMARY KEY (`Complaint_ID`);

--
-- Indexes for table `developer_info`
--
ALTER TABLE `developer_info`
  ADD PRIMARY KEY (`Developer_ID`),
  ADD KEY `Manager_ID` (`Manager_ID`),
  ADD KEY `JobTitle` (`JobTitle`);

--
-- Indexes for table `fired_employees`
--
ALTER TABLE `fired_employees`
  ADD PRIMARY KEY (`Fired_Employees_ID`);

--
-- Indexes for table `job_title`
--
ALTER TABLE `job_title`
  ADD PRIMARY KEY (`JobTitle_ID`);

--
-- Indexes for table `leave_table`
--
ALTER TABLE `leave_table`
  ADD PRIMARY KEY (`LeaveTable_ID`),
  ADD KEY `Manager_ID` (`Manager_ID`);

--
-- Indexes for table `loan_table`
--
ALTER TABLE `loan_table`
  ADD PRIMARY KEY (`LoanTable_ID`),
  ADD KEY `Manager_ID` (`Manager_ID`);

--
-- Indexes for table `manager_info`
--
ALTER TABLE `manager_info`
  ADD PRIMARY KEY (`Manager_ID`);

--
-- Indexes for table `project_info`
--
ALTER TABLE `project_info`
  ADD PRIMARY KEY (`Project_ID`);

--
-- Indexes for table `retired_employees`
--
ALTER TABLE `retired_employees`
  ADD PRIMARY KEY (`Retired_Employee_ID`);

--
-- Indexes for table `teams_info`
--
ALTER TABLE `teams_info`
  ADD PRIMARY KEY (`Team_ID`),
  ADD KEY `Manager_ID` (`Manager_ID`),
  ADD KEY `Project_ID` (`Project_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_info`
--
ALTER TABLE `admin_info`
  MODIFY `Admin_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `advance_table`
--
ALTER TABLE `advance_table`
  MODIFY `AdvanceTable_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `complaint_table`
--
ALTER TABLE `complaint_table`
  MODIFY `Complaint_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `developer_info`
--
ALTER TABLE `developer_info`
  MODIFY `Developer_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `fired_employees`
--
ALTER TABLE `fired_employees`
  MODIFY `Fired_Employees_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `job_title`
--
ALTER TABLE `job_title`
  MODIFY `JobTitle_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `leave_table`
--
ALTER TABLE `leave_table`
  MODIFY `LeaveTable_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `loan_table`
--
ALTER TABLE `loan_table`
  MODIFY `LoanTable_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `manager_info`
--
ALTER TABLE `manager_info`
  MODIFY `Manager_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `project_info`
--
ALTER TABLE `project_info`
  MODIFY `Project_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `retired_employees`
--
ALTER TABLE `retired_employees`
  MODIFY `Retired_Employee_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `teams_info`
--
ALTER TABLE `teams_info`
  MODIFY `Team_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `advance_table`
--
ALTER TABLE `advance_table`
  ADD CONSTRAINT `advance_table_ibfk_2` FOREIGN KEY (`Manager_ID`) REFERENCES `manager_info` (`Manager_ID`);

--
-- Constraints for table `developer_info`
--
ALTER TABLE `developer_info`
  ADD CONSTRAINT `developer_info_ibfk_1` FOREIGN KEY (`Manager_ID`) REFERENCES `manager_info` (`Manager_ID`),
  ADD CONSTRAINT `developer_info_ibfk_2` FOREIGN KEY (`JobTitle`) REFERENCES `job_title` (`JobTitle_ID`);

--
-- Constraints for table `leave_table`
--
ALTER TABLE `leave_table`
  ADD CONSTRAINT `leave_table_ibfk_2` FOREIGN KEY (`Manager_ID`) REFERENCES `manager_info` (`Manager_ID`);

--
-- Constraints for table `loan_table`
--
ALTER TABLE `loan_table`
  ADD CONSTRAINT `loan_table_ibfk_2` FOREIGN KEY (`Manager_ID`) REFERENCES `manager_info` (`Manager_ID`);

--
-- Constraints for table `teams_info`
--
ALTER TABLE `teams_info`
  ADD CONSTRAINT `teams_info_ibfk_1` FOREIGN KEY (`Manager_ID`) REFERENCES `manager_info` (`Manager_ID`),
  ADD CONSTRAINT `teams_info_ibfk_2` FOREIGN KEY (`Project_ID`) REFERENCES `project_info` (`Project_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
