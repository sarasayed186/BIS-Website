-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2023 at 12:56 AM
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
-- Database: `bisfirstwebsite`
--

-- --------------------------------------------------------

--
-- Table structure for table `acceptedstudentdata`
--

CREATE TABLE `acceptedstudentdata` (
  `StudentCode` int(11) NOT NULL DEFAULT 161746,
  `ArbName` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `StudentID` varchar(15) DEFAULT NULL,
  `image` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `application_data`
--

CREATE TABLE `application_data` (
  `app_id` tinyint(4) NOT NULL,
  `app_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Uni_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `Faculty_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `Program_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `Faculty-Uni_logo` varchar(50) DEFAULT NULL,
  `Program_logo` varchar(50) DEFAULT NULL,
  `Faculty_Dean` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `Post_grad_vice_dean` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `st_affairs_vice_dean` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `Program_coordinator` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `application_data`
--

INSERT INTO `application_data` (`app_id`, `app_name`, `Uni_name`, `Faculty_name`, `Program_name`, `Faculty-Uni_logo`, `Program_logo`, `Faculty_Dean`, `Post_grad_vice_dean`, `st_affairs_vice_dean`, `Program_coordinator`) VALUES
(1, 'النظام الإلكتروني لإدارة شئون أعضاء هيئة التدريس', 'جامعة حلوان', 'كلية التجارة وإدارة الأعمال', 'BIS برنامج نظم معلومات الأعمال', 'Facultylogo.jpg', 'program.png', 'أ.د. حسام الرفاعي', 'أ.د. هند عودة', 'أ.د. أماني فاخر', 'أ.م.د. رشا فرغلى');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `CourseCode` varchar(6) NOT NULL,
  `CourseName` varchar(50) NOT NULL,
  `CourseArbName` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `PreRequiset` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `degree`
--

CREATE TABLE `degree` (
  `StudentCode` int(11) NOT NULL,
  `CourseCode` varchar(6) NOT NULL DEFAULT '',
  `Semester` int(11) NOT NULL,
  `Year` int(11) NOT NULL,
  `Grade` varchar(4) DEFAULT NULL,
  `GroupID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `Department_id` tinyint(4) NOT NULL,
  `Department_ar_name` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Department_eng_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`Department_id`, `Department_ar_name`, `Department_eng_name`) VALUES
(1, 'قسم المحاسبة', 'Accounting Department'),
(2, 'قسم إدارة الأعمال', 'Management Department'),
(3, 'قسم الاقتصاد والتجارة الخارجية', 'Economics & Foreign Trade Depa'),
(4, 'قسم الإحصاء', 'Statistical Department'),
(5, 'قسم العلوم السياسية', 'Political Science Department'),
(6, 'قسم نظم المعلومات', 'Information Systems Department'),
(7, 'شعبه عامه', 'General Major');

-- --------------------------------------------------------

--
-- Table structure for table `doctorscourse`
--

CREATE TABLE `doctorscourse` (
  `id` int(11) NOT NULL,
  `DoctorCode` int(4) NOT NULL,
  `CourseCode` varchar(6) NOT NULL,
  `SemesterCode` int(11) NOT NULL,
  `semesterYear` int(11) NOT NULL,
  `group` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `doctors_account`
--

CREATE TABLE `doctors_account` (
  `DoctorCode` int(11) NOT NULL,
  `Doctor_ar_Name` varchar(80) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Doctor_eng_Name` varchar(50) NOT NULL,
  `National_id` varchar(14) DEFAULT NULL,
  `Mobile` varchar(10) DEFAULT NULL,
  `Academic_Mail` varchar(80) DEFAULT NULL,
  `Personal_Mail` varchar(80) DEFAULT NULL,
  `DoctorJob` tinyint(4) NOT NULL COMMENT 'ref to doctor job table',
  `University` tinyint(4) NOT NULL COMMENT 'ref to universities table',
  `Faculty` tinyint(4) NOT NULL COMMENT 'ref to faculties table',
  `Department` tinyint(4) NOT NULL COMMENT 'ref to departments table',
  `Type` tinyint(4) DEFAULT NULL COMMENT 'ref to doctor type table',
  `UserName` varchar(20) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `Notes` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `Doctor_image` varchar(50) DEFAULT NULL,
  `is_enable` varchar(3) NOT NULL DEFAULT 'Yes' COMMENT 'yes or no'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `doctor_jobs`
--

CREATE TABLE `doctor_jobs` (
  `Doctor_job_id` tinyint(4) NOT NULL,
  `Doctor_job_ar_name` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Doctor_job_eng_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor_jobs`
--

INSERT INTO `doctor_jobs` (`Doctor_job_id`, `Doctor_job_ar_name`, `Doctor_job_eng_name`) VALUES
(1, 'استاذ', 'Professor'),
(2, 'استاذ مساعد', 'Associate Professor'),
(3, 'مدرس', 'Lecturer'),
(4, 'مدرس مساعد', 'lecturer Assistant'),
(5, 'معيد', 'Teaching Assistant'),
(6, 'استاذ متفرغ', '-'),
(7, 'استاذ مساعد متفرغ', '-'),
(8, 'مدرس متفرغ', '');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_types`
--

CREATE TABLE `doctor_types` (
  `Doctor_type_id` tinyint(4) NOT NULL,
  `Doctor_type_name` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor_types`
--

INSERT INTO `doctor_types` (`Doctor_type_id`, `Doctor_type_name`) VALUES
(1, 'داخلى - كلية'),
(2, 'داخلي - جامعة'),
(3, 'منتدب - عضو هيئة تدريس'),
(4, 'منتدب - خبير');

-- --------------------------------------------------------

--
-- Table structure for table `faculties`
--

CREATE TABLE `faculties` (
  `Faculty_id` tinyint(4) NOT NULL,
  `Faculty_ar_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Faculty_eng_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculties`
--

INSERT INTO `faculties` (`Faculty_id`, `Faculty_ar_name`, `Faculty_eng_name`) VALUES
(1, 'كلية التجارة وإدارة الأعمال', 'Faculty of Commerce & Business Administration');

-- --------------------------------------------------------

--
-- Table structure for table `p47_about`
--

CREATE TABLE `p47_about` (
  `aboutId` int(11) NOT NULL,
  `mission` varchar(400) NOT NULL,
  `vision` varchar(400) NOT NULL,
  `history` varchar(400) NOT NULL,
  `whyBis` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `p47_admin`
--

CREATE TABLE `p47_admin` (
  `adminId` int(11) NOT NULL,
  `adminName` varchar(30) NOT NULL,
  `adminMail` varchar(30) NOT NULL,
  `adminPass` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `p47_album`
--

CREATE TABLE `p47_album` (
  `albumId` int(11) NOT NULL,
  `albumTitle` varchar(50) NOT NULL,
  `albumDesc` varchar(400) NOT NULL,
  `parentId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `p47_albumfiles`
--

CREATE TABLE `p47_albumfiles` (
  `fileId` int(11) NOT NULL,
  `fileName` varchar(30) NOT NULL,
  `fileType` tinyint(1) NOT NULL COMMENT 'video or image',
  `file` varchar(300) NOT NULL,
  `albumId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `p47_beststudents`
--

CREATE TABLE `p47_beststudents` (
  `studentId` int(11) NOT NULL,
  `studentName` varchar(40) NOT NULL,
  `studentImage` varchar(200) NOT NULL,
  `studentLevel` varchar(30) NOT NULL,
  `studentRank` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `p47_careers`
--

CREATE TABLE `p47_careers` (
  `careerId` int(11) NOT NULL,
  `careerTitle` varchar(40) NOT NULL,
  `careerDesc` varchar(400) NOT NULL,
  `careerMainPhoto` varchar(300) NOT NULL,
  `careerLink` varchar(100) NOT NULL,
  `parentId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `p47_contact`
--

CREATE TABLE `p47_contact` (
  `contactId` int(11) NOT NULL,
  `userName` varchar(40) NOT NULL,
  `userMail` varchar(40) NOT NULL,
  `question` varchar(500) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `p47_eventcategory`
--

CREATE TABLE `p47_eventcategory` (
  `categoryId` int(11) NOT NULL,
  `categoryName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `p47_eventcategory`
--

INSERT INTO `p47_eventcategory` (`categoryId`, `categoryName`) VALUES
(1, 'entertainment'),
(2, 'sports'),
(3, 'comptetions'),
(4, 'Student Acts'),
(5, 'oriants'),
(6, 'Eftaar');

-- --------------------------------------------------------

--
-- Table structure for table `p47_eventfiles`
--

CREATE TABLE `p47_eventfiles` (
  `fileId` int(11) NOT NULL,
  `fileName` varchar(30) NOT NULL,
  `fileType` tinyint(1) NOT NULL,
  `file` varchar(400) NOT NULL,
  `eventId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `p47_events`
--

CREATE TABLE `p47_events` (
  `eventId` int(11) NOT NULL,
  `mainPhoto` varchar(400) NOT NULL,
  `eventTitle` varchar(70) NOT NULL,
  `eventDesc` varchar(400) NOT NULL,
  `eventCat` int(11) NOT NULL,
  `admId` int(11) NOT NULL,
  `eventDate` date NOT NULL,
  `parentId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='3';

-- --------------------------------------------------------

--
-- Table structure for table `p47_examschedule`
--

CREATE TABLE `p47_examschedule` (
  `exScheduleId` int(11) NOT NULL,
  `exScheduleTitle` varchar(50) NOT NULL,
  `exScheduleSemester` varchar(12) NOT NULL,
  `exScheduleYear` varchar(15) NOT NULL,
  `exScheduleFile` varchar(300) NOT NULL,
  `parentId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `p47_faqs`
--

CREATE TABLE `p47_faqs` (
  `faqId` int(11) NOT NULL,
  `faqTitle` varchar(100) NOT NULL,
  `faqDesc` varchar(500) NOT NULL,
  `faqResponse` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `p47_highboard`
--

CREATE TABLE `p47_highboard` (
  `member_Id` int(11) NOT NULL,
  `member_Name` varchar(40) NOT NULL,
  `member_Image` varchar(400) NOT NULL,
  `member_Bio` varchar(400) NOT NULL,
  `member_Role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `p47_highboardrole`
--

CREATE TABLE `p47_highboardrole` (
  `Role_Id` int(11) NOT NULL,
  `role_Title` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `p47_internships`
--

CREATE TABLE `p47_internships` (
  `internId` int(11) NOT NULL,
  `internTitle` varchar(30) NOT NULL,
  `internDesc` varchar(400) NOT NULL,
  `internPhoto` varchar(200) NOT NULL,
  `internLink` varchar(200) NOT NULL,
  `parentId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `p47_lectureschedule`
--

CREATE TABLE `p47_lectureschedule` (
  `lecScheduleCode` int(11) NOT NULL,
  `lecScheduleTitle` varchar(50) NOT NULL,
  `lecScheduleDesc` varchar(200) NOT NULL,
  `lecScheduleFile` varchar(300) NOT NULL,
  `lecScheduleLevel` varchar(20) NOT NULL,
  `lecScheduleYear` varchar(20) NOT NULL,
  `lecScheduleSemster` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `p47_news`
--

CREATE TABLE `p47_news` (
  `newsId` int(11) NOT NULL,
  `newsTitle` varchar(50) NOT NULL,
  `mainPhoto` varchar(400) NOT NULL,
  `newsDesc` varchar(500) NOT NULL,
  `adminId` int(11) NOT NULL,
  `news_Importance` tinyint(1) NOT NULL COMMENT 'is it public or for students only',
  `dayDate` date NOT NULL,
  `parentId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `p47_portals`
--

CREATE TABLE `p47_portals` (
  `portalId` int(11) NOT NULL,
  `portalTitle` varchar(40) NOT NULL,
  `portalLink` varchar(200) NOT NULL,
  `portalPhoto` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `p47_responses`
--

CREATE TABLE `p47_responses` (
  `responseId` int(11) NOT NULL,
  `responseName` varchar(30) NOT NULL,
  `responseDesc` varchar(500) NOT NULL,
  `requestId` int(11) NOT NULL COMMENT 'returns from contact us table',
  `responseDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `adminId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `p47_studentachievement`
--

CREATE TABLE `p47_studentachievement` (
  `achievementId` int(11) NOT NULL,
  `stuName` varchar(40) NOT NULL,
  `achievementTitle` varchar(50) NOT NULL,
  `stuImage` varchar(200) NOT NULL,
  `achievementDesc` varchar(700) NOT NULL,
  `parentId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `p47_studentacts`
--

CREATE TABLE `p47_studentacts` (
  `activityCode` int(11) NOT NULL,
  `activityName` varchar(30) NOT NULL,
  `activityLogo` varchar(300) NOT NULL,
  `activityPhoto` varchar(300) NOT NULL,
  `activityBio` varchar(500) NOT NULL,
  `activityAcheivement` varchar(500) NOT NULL,
  `activityLink` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `p47_subjectcategory`
--

CREATE TABLE `p47_subjectcategory` (
  `subjectCategoryId` int(11) NOT NULL,
  `subCatName` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `p47_subjects`
--

CREATE TABLE `p47_subjects` (
  `subId` int(11) NOT NULL,
  `subName` varchar(30) NOT NULL,
  `subCat` int(11) NOT NULL,
  `isActive` tinyint(1) NOT NULL COMMENT 'is it available or not',
  `sub_Mandatory` tinyint(1) NOT NULL COMMENT 'is it mandatory or not',
  `creditHours` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `p47_subjectsnotes`
--

CREATE TABLE `p47_subjectsnotes` (
  `noteId` int(11) NOT NULL,
  `noteName` varchar(40) NOT NULL,
  `noteDesc` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `p60_tablename`
--

CREATE TABLE `p60_tablename` (
  `attribute1` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `parent`
--

CREATE TABLE `parent` (
  `parentId` int(11) NOT NULL,
  `childDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `universities`
--

CREATE TABLE `universities` (
  `uni_id` tinyint(4) NOT NULL,
  `uni_ar_name` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `uni_eng_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `universities`
--

INSERT INTO `universities` (`uni_id`, `uni_ar_name`, `uni_eng_name`) VALUES
(1, 'جامعة حلوان', 'Helwan University');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` tinyint(4) NOT NULL,
  `user_ar_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `user_type_id` tinyint(4) NOT NULL,
  `added_date` datetime NOT NULL,
  `added_by` tinyint(4) NOT NULL,
  `Notes` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_enable` varchar(3) NOT NULL DEFAULT 'Yes' COMMENT 'yes or no',
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_ar_name`, `username`, `password`, `user_type_id`, `added_date`, `added_by`, `Notes`, `is_enable`, `image`) VALUES
(1, 'محمد عبد السلام', 'mohamed', '123', 1, '2023-03-09 15:28:23', 1, NULL, 'Yes', '1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users_types`
--

CREATE TABLE `users_types` (
  `user_type_id` tinyint(4) NOT NULL,
  `user_type_name` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_types`
--

INSERT INTO `users_types` (`user_type_id`, `user_type_name`) VALUES
(1, 'Admin'),
(2, 'Employee');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acceptedstudentdata`
--
ALTER TABLE `acceptedstudentdata`
  ADD PRIMARY KEY (`StudentCode`);

--
-- Indexes for table `application_data`
--
ALTER TABLE `application_data`
  ADD PRIMARY KEY (`app_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`CourseCode`),
  ADD KEY `FK_pre` (`PreRequiset`);

--
-- Indexes for table `degree`
--
ALTER TABLE `degree`
  ADD PRIMARY KEY (`StudentCode`,`CourseCode`,`Semester`,`Year`),
  ADD KEY `Semester` (`Semester`),
  ADD KEY `GroupID` (`GroupID`),
  ADD KEY `CourseCode` (`CourseCode`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`Department_id`);

--
-- Indexes for table `doctorscourse`
--
ALTER TABLE `doctorscourse`
  ADD PRIMARY KEY (`id`),
  ADD KEY `semesteryear` (`semesterYear`),
  ADD KEY `DoctorCode` (`DoctorCode`),
  ADD KEY `CourseCode` (`CourseCode`),
  ADD KEY `SemesterCode` (`SemesterCode`);

--
-- Indexes for table `doctors_account`
--
ALTER TABLE `doctors_account`
  ADD PRIMARY KEY (`DoctorCode`),
  ADD UNIQUE KEY `UserName` (`UserName`),
  ADD KEY `DoctorJob` (`DoctorJob`,`University`,`Faculty`,`Department`,`Type`),
  ADD KEY `University` (`University`),
  ADD KEY `Faculty` (`Faculty`),
  ADD KEY `Type` (`Type`),
  ADD KEY `Department` (`Department`);

--
-- Indexes for table `doctor_jobs`
--
ALTER TABLE `doctor_jobs`
  ADD PRIMARY KEY (`Doctor_job_id`);

--
-- Indexes for table `doctor_types`
--
ALTER TABLE `doctor_types`
  ADD PRIMARY KEY (`Doctor_type_id`);

--
-- Indexes for table `faculties`
--
ALTER TABLE `faculties`
  ADD PRIMARY KEY (`Faculty_id`);

--
-- Indexes for table `p47_about`
--
ALTER TABLE `p47_about`
  ADD PRIMARY KEY (`aboutId`);

--
-- Indexes for table `p47_admin`
--
ALTER TABLE `p47_admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `p47_album`
--
ALTER TABLE `p47_album`
  ADD PRIMARY KEY (`albumId`),
  ADD KEY `parentId` (`parentId`);

--
-- Indexes for table `p47_albumfiles`
--
ALTER TABLE `p47_albumfiles`
  ADD PRIMARY KEY (`fileId`),
  ADD KEY `albumId` (`albumId`);

--
-- Indexes for table `p47_beststudents`
--
ALTER TABLE `p47_beststudents`
  ADD PRIMARY KEY (`studentId`);

--
-- Indexes for table `p47_careers`
--
ALTER TABLE `p47_careers`
  ADD PRIMARY KEY (`careerId`),
  ADD UNIQUE KEY `parentId` (`parentId`);

--
-- Indexes for table `p47_contact`
--
ALTER TABLE `p47_contact`
  ADD PRIMARY KEY (`contactId`);

--
-- Indexes for table `p47_eventcategory`
--
ALTER TABLE `p47_eventcategory`
  ADD PRIMARY KEY (`categoryId`);

--
-- Indexes for table `p47_eventfiles`
--
ALTER TABLE `p47_eventfiles`
  ADD PRIMARY KEY (`fileId`),
  ADD KEY `eventId` (`eventId`);

--
-- Indexes for table `p47_events`
--
ALTER TABLE `p47_events`
  ADD PRIMARY KEY (`eventId`),
  ADD KEY `eventCat` (`eventCat`),
  ADD KEY `admId` (`admId`),
  ADD KEY `parentId` (`parentId`);

--
-- Indexes for table `p47_examschedule`
--
ALTER TABLE `p47_examschedule`
  ADD PRIMARY KEY (`exScheduleId`),
  ADD KEY `parentId` (`parentId`);

--
-- Indexes for table `p47_faqs`
--
ALTER TABLE `p47_faqs`
  ADD PRIMARY KEY (`faqId`);

--
-- Indexes for table `p47_highboard`
--
ALTER TABLE `p47_highboard`
  ADD PRIMARY KEY (`member_Id`),
  ADD KEY `member_Role` (`member_Role`);

--
-- Indexes for table `p47_highboardrole`
--
ALTER TABLE `p47_highboardrole`
  ADD PRIMARY KEY (`Role_Id`);

--
-- Indexes for table `p47_internships`
--
ALTER TABLE `p47_internships`
  ADD PRIMARY KEY (`internId`),
  ADD KEY `parentId` (`parentId`);

--
-- Indexes for table `p47_lectureschedule`
--
ALTER TABLE `p47_lectureschedule`
  ADD PRIMARY KEY (`lecScheduleCode`);

--
-- Indexes for table `p47_news`
--
ALTER TABLE `p47_news`
  ADD PRIMARY KEY (`newsId`),
  ADD KEY `admId` (`adminId`),
  ADD KEY `parentId` (`parentId`);

--
-- Indexes for table `p47_portals`
--
ALTER TABLE `p47_portals`
  ADD PRIMARY KEY (`portalId`);

--
-- Indexes for table `p47_responses`
--
ALTER TABLE `p47_responses`
  ADD PRIMARY KEY (`responseId`),
  ADD KEY `admId` (`adminId`),
  ADD KEY `request_Id` (`requestId`);

--
-- Indexes for table `p47_studentachievement`
--
ALTER TABLE `p47_studentachievement`
  ADD PRIMARY KEY (`achievementId`),
  ADD KEY `parentId` (`parentId`);

--
-- Indexes for table `p47_studentacts`
--
ALTER TABLE `p47_studentacts`
  ADD PRIMARY KEY (`activityCode`);

--
-- Indexes for table `p47_subjectcategory`
--
ALTER TABLE `p47_subjectcategory`
  ADD PRIMARY KEY (`subjectCategoryId`);

--
-- Indexes for table `p47_subjects`
--
ALTER TABLE `p47_subjects`
  ADD PRIMARY KEY (`subId`),
  ADD KEY `subCat` (`subCat`);

--
-- Indexes for table `p47_subjectsnotes`
--
ALTER TABLE `p47_subjectsnotes`
  ADD PRIMARY KEY (`noteId`);

--
-- Indexes for table `parent`
--
ALTER TABLE `parent`
  ADD PRIMARY KEY (`parentId`);

--
-- Indexes for table `universities`
--
ALTER TABLE `universities`
  ADD PRIMARY KEY (`uni_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `users_types`
--
ALTER TABLE `users_types`
  ADD PRIMARY KEY (`user_type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `application_data`
--
ALTER TABLE `application_data`
  MODIFY `app_id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `Department_id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `doctorscourse`
--
ALTER TABLE `doctorscourse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `doctors_account`
--
ALTER TABLE `doctors_account`
  MODIFY `DoctorCode` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `doctor_jobs`
--
ALTER TABLE `doctor_jobs`
  MODIFY `Doctor_job_id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `doctor_types`
--
ALTER TABLE `doctor_types`
  MODIFY `Doctor_type_id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `faculties`
--
ALTER TABLE `faculties`
  MODIFY `Faculty_id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `p47_admin`
--
ALTER TABLE `p47_admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `p47_albumfiles`
--
ALTER TABLE `p47_albumfiles`
  MODIFY `fileId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `p47_beststudents`
--
ALTER TABLE `p47_beststudents`
  MODIFY `studentId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `p47_careers`
--
ALTER TABLE `p47_careers`
  MODIFY `careerId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `p47_contact`
--
ALTER TABLE `p47_contact`
  MODIFY `contactId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `p47_eventcategory`
--
ALTER TABLE `p47_eventcategory`
  MODIFY `categoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `p47_eventfiles`
--
ALTER TABLE `p47_eventfiles`
  MODIFY `fileId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `p47_events`
--
ALTER TABLE `p47_events`
  MODIFY `eventId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `p47_examschedule`
--
ALTER TABLE `p47_examschedule`
  MODIFY `exScheduleId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `p47_faqs`
--
ALTER TABLE `p47_faqs`
  MODIFY `faqId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `p47_highboard`
--
ALTER TABLE `p47_highboard`
  MODIFY `member_Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `p47_highboardrole`
--
ALTER TABLE `p47_highboardrole`
  MODIFY `Role_Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `p47_internships`
--
ALTER TABLE `p47_internships`
  MODIFY `internId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `p47_lectureschedule`
--
ALTER TABLE `p47_lectureschedule`
  MODIFY `lecScheduleCode` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `p47_news`
--
ALTER TABLE `p47_news`
  MODIFY `newsId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `p47_portals`
--
ALTER TABLE `p47_portals`
  MODIFY `portalId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `p47_responses`
--
ALTER TABLE `p47_responses`
  MODIFY `responseId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `p47_studentachievement`
--
ALTER TABLE `p47_studentachievement`
  MODIFY `achievementId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `p47_studentacts`
--
ALTER TABLE `p47_studentacts`
  MODIFY `activityCode` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `p47_subjectcategory`
--
ALTER TABLE `p47_subjectcategory`
  MODIFY `subjectCategoryId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `p47_subjects`
--
ALTER TABLE `p47_subjects`
  MODIFY `subId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `p47_subjectsnotes`
--
ALTER TABLE `p47_subjectsnotes`
  MODIFY `noteId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `parent`
--
ALTER TABLE `parent`
  MODIFY `parentId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `universities`
--
ALTER TABLE `universities`
  MODIFY `uni_id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users_types`
--
ALTER TABLE `users_types`
  MODIFY `user_type_id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `doctors_account`
--
ALTER TABLE `doctors_account`
  ADD CONSTRAINT `doctors_account_ibfk_1` FOREIGN KEY (`DoctorJob`) REFERENCES `doctor_jobs` (`Doctor_job_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `doctors_account_ibfk_2` FOREIGN KEY (`University`) REFERENCES `universities` (`uni_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `doctors_account_ibfk_3` FOREIGN KEY (`Faculty`) REFERENCES `faculties` (`Faculty_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `doctors_account_ibfk_4` FOREIGN KEY (`Type`) REFERENCES `doctor_types` (`Doctor_type_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `doctors_account_ibfk_5` FOREIGN KEY (`Department`) REFERENCES `departments` (`Department_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `p47_album`
--
ALTER TABLE `p47_album`
  ADD CONSTRAINT `p47_album_ibfk_1` FOREIGN KEY (`parentId`) REFERENCES `parent` (`parentId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `p47_careers`
--
ALTER TABLE `p47_careers`
  ADD CONSTRAINT `p47_careers_ibfk_1` FOREIGN KEY (`parentId`) REFERENCES `parent` (`parentId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `p47_events`
--
ALTER TABLE `p47_events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`eventCat`) REFERENCES `p47_eventcategory` (`categoryId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `events_ibfk_2` FOREIGN KEY (`admId`) REFERENCES `p47_admin` (`adminId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `p47_events_ibfk_1` FOREIGN KEY (`parentId`) REFERENCES `parent` (`parentId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `p47_examschedule`
--
ALTER TABLE `p47_examschedule`
  ADD CONSTRAINT `p47_examschedule_ibfk_1` FOREIGN KEY (`parentId`) REFERENCES `parent` (`parentId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `p47_highboard`
--
ALTER TABLE `p47_highboard`
  ADD CONSTRAINT `high_board_ibfk_1` FOREIGN KEY (`member_Role`) REFERENCES `p47_highboardrole` (`Role_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `p47_internships`
--
ALTER TABLE `p47_internships`
  ADD CONSTRAINT `p47_internships_ibfk_1` FOREIGN KEY (`parentId`) REFERENCES `parent` (`parentId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `p47_news`
--
ALTER TABLE `p47_news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`adminId`) REFERENCES `p47_admin` (`adminId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `p47_news_ibfk_1` FOREIGN KEY (`parentId`) REFERENCES `parent` (`parentId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `p47_responses`
--
ALTER TABLE `p47_responses`
  ADD CONSTRAINT `responses_ibfk_1` FOREIGN KEY (`requestId`) REFERENCES `p47_contact` (`contactId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `responses_ibfk_2` FOREIGN KEY (`adminId`) REFERENCES `p47_admin` (`adminId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `p47_studentachievement`
--
ALTER TABLE `p47_studentachievement`
  ADD CONSTRAINT `p47_studentachievement_ibfk_1` FOREIGN KEY (`parentId`) REFERENCES `parent` (`parentId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `p47_subjects`
--
ALTER TABLE `p47_subjects`
  ADD CONSTRAINT `subjects_ibfk_1` FOREIGN KEY (`subCat`) REFERENCES `p47_subjectcategory` (`subjectCategoryId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
