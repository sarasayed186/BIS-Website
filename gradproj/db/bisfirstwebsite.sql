-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2023 at 06:11 PM
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
  `Doctor_image` varchar(150) DEFAULT NULL,
  `is_enable` varchar(3) NOT NULL DEFAULT 'Yes' COMMENT 'yes or no'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctors_account`
--

INSERT INTO `doctors_account` (`DoctorCode`, `Doctor_ar_Name`, `Doctor_eng_Name`, `National_id`, `Mobile`, `Academic_Mail`, `Personal_Mail`, `DoctorJob`, `University`, `Faculty`, `Department`, `Type`, `UserName`, `Password`, `Notes`, `Doctor_image`, `is_enable`) VALUES
(5, '', 'Ahmed Husein', NULL, NULL, 'ahmed@gg.com', NULL, 3, 1, 1, 6, 2, NULL, NULL, NULL, '400149500535_151125.jpg', 'yes'),
(6, '', 'Mohamed Abdelsalam', NULL, NULL, 'example.a@gmail.com', NULL, 1, 1, 1, 6, 2, NULL, NULL, NULL, 'download.jpeg', 'Yes'),
(7, '', 'Shimaa Ouf', NULL, NULL, 'example.a@gmail.com', NULL, 2, 1, 1, 6, 2, NULL, NULL, NULL, '208717381_4270620549643213_1954195402221695213_n.jpg', 'Yes'),
(8, '', 'Ahmed Abd-Elwahab', NULL, NULL, 'example.a@gmail.com', NULL, 2, 1, 1, 6, 1, NULL, NULL, NULL, '15178081_10205862933492267_7782636859728068576_n.jpg', 'Yes'),
(9, '', 'Gehad El-Sharkawy', NULL, NULL, 'example.a@gmail.com', NULL, 4, 1, 1, 6, 1, NULL, NULL, NULL, '295109899_10159261497988992_7904691590772918253_n.jpg', 'Yes'),
(10, '', 'Mahmoud Bahloul', NULL, NULL, 'example.a@gmail.com', NULL, 3, 1, 1, 2, 1, NULL, NULL, NULL, '207728656_4688362821179767_8719481930108936300_n.jpg', 'Yes'),
(11, '', 'Engy Yehia', NULL, NULL, 'example.a@gmail.com', NULL, 2, 1, 1, 6, 2, NULL, NULL, NULL, '190493362_3049160015363152_1388649090420019189_n.jpg', 'Yes');

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

--
-- Dumping data for table `p47_about`
--

INSERT INTO `p47_about` (`aboutId`, `mission`, `vision`, `history`, `whyBis`) VALUES
(2, 'rggr', 'grgr', 'grg', 'grg');

-- --------------------------------------------------------

--
-- Table structure for table `p47_admin`
--

CREATE TABLE `p47_admin` (
  `adminId` int(11) NOT NULL,
  `adminName` varchar(30) NOT NULL,
  `adminMail` varchar(30) NOT NULL,
  `adminPass` varchar(30) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `p47_admin`
--

INSERT INTO `p47_admin` (`adminId`, `adminName`, `adminMail`, `adminPass`, `status`) VALUES
(1, 'Ahmed', 'Ahmed@gg.com', '123', 1),
(2, 'Ahmed Ebeid', 'ahmedmido@gg.com', '555', 0),
(3, 'Ahmed Ebeid', 'ahmedmido@gg.com', '555', 0);

-- --------------------------------------------------------

--
-- Table structure for table `p47_album`
--

CREATE TABLE `p47_album` (
  `albumId` int(11) NOT NULL,
  `mainPhoto` varchar(80) NOT NULL,
  `albumTitle` varchar(50) NOT NULL,
  `albumDesc` varchar(400) NOT NULL,
  `uploadDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` tinyint(1) NOT NULL COMMENT 'is pennding or not'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `p47_album`
--

INSERT INTO `p47_album` (`albumId`, `mainPhoto`, `albumTitle`, `albumDesc`, `uploadDate`, `status`) VALUES
(12, 'IMG_6085.JPG', 'BIS Senior Student Last day in final exams', 'BIS Senior Student Last day in final exams', '2023-06-23 00:54:49', 1),
(13, '341093671_749459436898329_1622974171251487818_n.jpg', 'BIS FUNDAY’23', 'BIS FUNDAY’23', '2023-06-23 01:19:54', 1);

-- --------------------------------------------------------

--
-- Table structure for table `p47_albumfile`
--

CREATE TABLE `p47_albumfile` (
  `id` int(11) NOT NULL,
  `file_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `uploade_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `albumId` int(11) NOT NULL,
  `filetype` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `p47_albumfile`
--

INSERT INTO `p47_albumfile` (`id`, `file_name`, `uploade_on`, `albumId`, `filetype`) VALUES
(70, 'IMG_6089.JPG', '2023-06-23 00:56:20', 12, 'jpeg'),
(71, 'IMG_6091.JPG', '2023-06-23 00:56:20', 12, 'jpeg'),
(73, 'IMG_6093.JPG', '2023-06-23 00:56:20', 12, 'jpeg'),
(74, 'IMG_6094.JPG', '2023-06-23 00:56:20', 12, 'jpeg'),
(75, 'IMG_6095.JPG', '2023-06-23 00:56:20', 12, 'jpeg'),
(77, 'IMG_6099.JPG', '2023-06-23 00:56:20', 12, 'jpeg'),
(78, 'IMG_6100.JPG', '2023-06-23 00:56:20', 12, 'jpeg'),
(79, 'IMG_6101.JPG', '2023-06-23 00:56:20', 12, 'jpeg'),
(80, 'IMG_6102.JPG', '2023-06-23 00:56:20', 12, 'jpeg'),
(81, 'IMG_6103.JPG', '2023-06-23 00:56:20', 12, 'jpeg'),
(82, 'IMG_6104.JPG', '2023-06-23 00:56:20', 12, 'jpeg'),
(86, '4G1A2749.jpg', '2023-06-23 01:18:40', 13, 'jpeg'),
(87, '4G1A2751.jpg', '2023-06-23 01:18:40', 13, 'jpeg'),
(88, '4G1A2752.jpg', '2023-06-23 01:18:40', 13, 'jpeg'),
(89, '4G1A2755.jpg', '2023-06-23 01:18:40', 13, 'jpeg'),
(90, '4G1A2756.jpg', '2023-06-23 01:18:40', 13, 'jpeg'),
(91, '4G1A2757.jpg', '2023-06-23 01:18:40', 13, 'jpeg'),
(92, '4G1A2758.jpg', '2023-06-23 01:18:40', 13, 'jpeg'),
(93, '4G1A2759.jpg', '2023-06-23 01:18:40', 13, 'jpeg'),
(94, '4G1A2760.jpg', '2023-06-23 01:18:40', 13, 'jpeg'),
(95, '4G1A2761.jpg', '2023-06-23 01:18:40', 13, 'jpeg'),
(96, '4G1A2762.jpg', '2023-06-23 01:18:40', 13, 'jpeg'),
(97, '4G1A2763.jpg', '2023-06-23 01:18:40', 13, 'jpeg'),
(98, '4G1A2764.jpg', '2023-06-23 01:18:40', 13, 'jpeg'),
(99, '4G1A2765.jpg', '2023-06-23 01:18:40', 13, 'jpeg'),
(100, '4G1A2766.jpg', '2023-06-23 01:18:40', 13, 'jpeg'),
(101, '4G1A2767.jpg', '2023-06-23 01:18:40', 13, 'jpeg'),
(102, '4G1A2768.jpg', '2023-06-23 01:18:40', 13, 'jpeg'),
(103, '4G1A2770.jpg', '2023-06-23 01:18:40', 13, 'jpeg'),
(104, '4G1A2772.jpg', '2023-06-23 01:18:40', 13, 'jpeg'),
(105, '4G1A2773.jpg', '2023-06-23 01:18:40', 13, 'jpeg'),
(106, '4G1A2802.jpg', '2023-06-23 01:19:04', 13, 'jpeg'),
(107, '4G1A2804.jpg', '2023-06-23 01:19:04', 13, 'jpeg'),
(108, '4G1A2806.jpg', '2023-06-23 01:19:04', 13, 'jpeg'),
(109, '4G1A2808.jpg', '2023-06-23 01:19:04', 13, 'jpeg'),
(110, '4G1A2811.jpg', '2023-06-23 01:19:04', 13, 'jpeg'),
(111, '4G1A2812.jpg', '2023-06-23 01:19:04', 13, 'jpeg'),
(112, '4G1A2813.jpg', '2023-06-23 01:19:04', 13, 'jpeg'),
(113, '4G1A2814.jpg', '2023-06-23 01:19:04', 13, 'jpeg'),
(114, '4G1A2815.jpg', '2023-06-23 01:19:04', 13, 'jpeg'),
(115, '4G1A2816.jpg', '2023-06-23 01:19:04', 13, 'jpeg'),
(116, '4G1A2818.jpg', '2023-06-23 01:19:04', 13, 'jpeg'),
(117, '4G1A2819.jpg', '2023-06-23 01:19:04', 13, 'jpeg'),
(118, '4G1A2820.jpg', '2023-06-23 01:19:04', 13, 'jpeg'),
(119, '4G1A2821.jpg', '2023-06-23 01:19:04', 13, 'jpeg'),
(120, '4G1A2822.jpg', '2023-06-23 01:19:04', 13, 'jpeg'),
(121, '4G1A2823.jpg', '2023-06-23 01:19:04', 13, 'jpeg'),
(122, '4G1A2824.jpg', '2023-06-23 01:19:04', 13, 'jpeg'),
(123, '4G1A2825.jpg', '2023-06-23 01:19:04', 13, 'jpeg'),
(124, '4G1A2826.jpg', '2023-06-23 01:19:04', 13, 'jpeg'),
(125, '4G1A2829.jpg', '2023-06-23 01:19:04', 13, 'jpeg'),
(126, '4G1A2981.jpg', '2023-06-23 01:19:27', 13, 'jpeg'),
(127, '4G1A2982.jpg', '2023-06-23 01:19:27', 13, 'jpeg'),
(128, '4G1A2983.jpg', '2023-06-23 01:19:27', 13, 'jpeg'),
(129, '4G1A2984.jpg', '2023-06-23 01:19:27', 13, 'jpeg'),
(130, '4G1A2985.jpg', '2023-06-23 01:19:27', 13, 'jpeg'),
(131, '4G1A2986.jpg', '2023-06-23 01:19:27', 13, 'jpeg'),
(132, '4G1A2987.jpg', '2023-06-23 01:19:27', 13, 'jpeg'),
(133, '4G1A2988.jpg', '2023-06-23 01:19:27', 13, 'jpeg'),
(134, '4G1A2989.jpg', '2023-06-23 01:19:27', 13, 'jpeg'),
(135, '4G1A2990.jpg', '2023-06-23 01:19:27', 13, 'jpeg'),
(136, '4G1A2991.jpg', '2023-06-23 01:19:27', 13, 'jpeg'),
(137, '4G1A2992.jpg', '2023-06-23 01:19:27', 13, 'jpeg'),
(138, '4G1A2993.jpg', '2023-06-23 01:19:27', 13, 'jpeg'),
(139, '4G1A2994.jpg', '2023-06-23 01:19:27', 13, 'jpeg'),
(140, '4G1A2995.jpg', '2023-06-23 01:19:27', 13, 'jpeg'),
(141, '4G1A2996.jpg', '2023-06-23 01:19:27', 13, 'jpeg'),
(142, '4G1A2997.jpg', '2023-06-23 01:19:27', 13, 'jpeg'),
(143, '4G1A2998.jpg', '2023-06-23 01:19:27', 13, 'jpeg'),
(144, '4G1A2999.jpg', '2023-06-23 01:19:27', 13, 'jpeg'),
(145, '4G1A3000.jpg', '2023-06-23 01:19:27', 13, 'jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `p47_announcement`
--

CREATE TABLE `p47_announcement` (
  `announcementId` int(11) NOT NULL,
  `announcementTitle` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `announcementDesc` varchar(400) COLLATE utf8_unicode_ci NOT NULL,
  `adminId` int(11) NOT NULL,
  `is_Enable` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `p47_announcementfiles`
--

CREATE TABLE `p47_announcementfiles` (
  `fileId` int(11) NOT NULL,
  `file_name` varchar(300) NOT NULL,
  `uploaded_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `announcementId` int(11) NOT NULL,
  `file_type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `p47_beststudents`
--

CREATE TABLE `p47_beststudents` (
  `stuId` int(11) NOT NULL,
  `stuName` varchar(40) NOT NULL,
  `stuAvatar` varchar(200) NOT NULL,
  `stulevel` int(2) NOT NULL,
  `stuRank` int(2) NOT NULL,
  `stuGPA` float NOT NULL,
  `boardId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `p47_beststudents`
--

INSERT INTO `p47_beststudents` (`stuId`, `stuName`, `stuAvatar`, `stulevel`, `stuRank`, `stuGPA`, `boardId`) VALUES
(11, 'Ahmed Ebeid', '400149500535_151125.jpg', 4, 3, 3.8, 11),
(17, 'Mohamed ElMalki', '4.jpg', 2, 6, 3.75, 11),
(18, 'Omnia Mostafa', 'photo_2023-06-23_01-38-58.jpg', 3, 3, 3.8, 13),
(19, 'Zeina Ahmed', 'photo_2023-06-23_01-39-15.jpg', 3, 1, 3.95, 13),
(20, 'Doaa Hussein', 'photo_2023-06-23_01-39-18.jpg', 4, 4, 3.78, 13),
(21, 'Yara Emad', 'photo_2023-06-23_01-39-09.jpg', 2, 4, 3.95, 14),
(22, 'Youssef salah', '299034696_5241368375976720_659300657078090972_n.jpg', 3, 1, 3.99, 14),
(23, 'Youssef Sayed', '125110943_1830878633736836_6723694973934553483_n.jpg', 3, 3, 3.8, 14),
(24, 'Ibrahim Mostafa', '353846962_3470080783253022_4435955463527433887_n.jpg', 3, 2, 3.9, 14),
(25, 'Ahmed Hossam', '121637119_101358898429288_1326329825448523325_n.jpg', 2, 1, 3.99, 14),
(28, 'Sara Sayed', '400082300552_377827.jpg', 4, 1, 3.9, 11),
(29, 'Omar Kamal', 'photo_2023-06-23_01-39-02.jpg', 3, 2, 3.85, 11),
(30, 'Youssef Osama', 'photo_2023-06-23_01-38-41.jpg', 4, 4, 3.79, 11),
(31, 'Fatma Osama', 'photo_2023-06-23_01-39-20.jpg', 4, 5, 3.76, 11);

-- --------------------------------------------------------

--
-- Table structure for table `p47_bisnumbers`
--

CREATE TABLE `p47_bisnumbers` (
  `id` int(11) UNSIGNED NOT NULL,
  `staff_members` int(11) NOT NULL,
  `under_graduates` int(11) NOT NULL,
  `graduates` int(11) NOT NULL,
  `post_graduates` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `p47_bisnumbers`
--

INSERT INTO `p47_bisnumbers` (`id`, `staff_members`, `under_graduates`, `graduates`, `post_graduates`) VALUES
(7, 5000, 6000, 1000, 2000),
(8, 5000, 6000, 1000, 2000);

-- --------------------------------------------------------

--
-- Table structure for table `p47_careers`
--

CREATE TABLE `p47_careers` (
  `careerId` int(11) NOT NULL,
  `jobTitle` varchar(40) NOT NULL,
  `companyName` varchar(40) NOT NULL,
  `jobDesc` text NOT NULL,
  `careerMainPhoto` varchar(300) NOT NULL,
  `careerLink` varchar(100) NOT NULL,
  `type` varchar(20) NOT NULL,
  `beginDate` varchar(20) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `p47_careers`
--

INSERT INTO `p47_careers` (`careerId`, `jobTitle`, `companyName`, `jobDesc`, `careerMainPhoto`, `careerLink`, `type`, `beginDate`, `status`) VALUES
(8, 'Graduates Internship Y23', 'Midea Group -  Smart Village, Giza', 'Midea Egypt is gladly announcing the Graduate Internship Program for Year 2023 that will last for around 2~3 months (July to September).\r\n\r\nWe are targeting ambitious recent graduates to explore their potentiality for future opportunities with Midea Egypt in the following roles:\r\n\r\n- Product Manager:\r\n\r\nAssist in market Benchmark.\r\nParticipate in pricing process for new products.\r\nMonitor and track sales achievements in regards of QTY & AMT.\r\nCompetition analysis for assigned product.\r\nCollect and analyze PSI data (Purchase + Sales + Inventory).\r\nCollect forecast from sales team.\r\nAssist in periodical reports.\r\n \r\n- HR & Admin:\r\n\r\nAssist in the recruitment and selection process.\r\nMaintain employee files and records in electronic and paper form.\r\nOrganize regular employee performance reviews.\r\nParticipate in developing the employee engagement activities.\r\nAssist in administrative tasks.\r\nSchedule in-house and external meetings.\r\nControl supplies inventory by checking stock, anticipating needed supplies, placing orders, receiving supplies.\r\nApplication Deadline: 24th June 2023', 'Logo-Midea.jpg', 'https://www.midea.com/global', 'intern', '2023-06-21', 1),
(9, 'IT Service desk', 'Al Ahly Medical Company', 'Serving as the first point of contact for users seeking technical assistance over the phone\r\nor email or onsite.\r\nPerforming remote troubleshooting through diagnostic techniques\r\nInstalls, troubleshoots, services, related PC software, telephones, cables, and\r\nconnectors.\r\nInvestigates information, network, and communications needs of users, and makes\r\nrecommendations regarding software and hardware. Moves equipment from office to\r\noffice.\r\nMaintains all support work orders in company ticket system\r\n May participate in after-hours support via cell phone and remote access to PC and/or\r\nnetwork\r\nEnsure end-users have optimal working equipment\r\nEnsure end-users are supported quickly and efficiently for incidents, problems, and\r\nrequests; reduce first-call- resolution times; must have excellent judgment for when to\r\nescalate\r\nEnsure the LAN in office is working efficiently\r\nWorks with other teams and departments in performing tasks associated.', 'Al-Ahly-Medical-Company-Egypt-7459-1505036217-og.jpg', 'https://wuzzuf.net/jobs/careers/Al-Ahly-Medical-Company-Egypt-7459', 'full', '2023-06-09', 1),
(10, 'Technical Support Engineer', 'Al Ahly Medical Company', 'Collect all problems whether Software or hardware and send them to the Quality department in China\r\nMake analysis to all problems\r\nShare the technical information with all department\r\nPublish all news related to the Software\r\nTraining the staff\r\nReport to the manager', 'download.png', 'https://www.realme.com/eg/', 'full', '2023-06-09', 1),
(11, 'IT Specialist', 'Premier Services and Recruitment Oversea', ' -Install and configure software packages such as operating systems, business programs, and other office tools that are required.\r\n- Install hardware and peripheral components such as monitors, keyboards, printers, and disk drivers on the user’s premises.\r\n- Monitoring, diagnosing, and repairing computer systems, Hardware, and networks.\r\n- Register IT assets on related applications and notify their direct reporting line in case of shortage. \r\n\r\nDuration: 3 months - Paid', 'Premier-Services-and-Recruitment-Overseas-Egypt-30005-1554018262-og.webp', 'https://wuzzuf.net/jobs/careers/Premier-Services-and-Recruitment-Egypt-30005', 'part', '2023-06-24', 1);

-- --------------------------------------------------------

--
-- Table structure for table `p47_contact`
--

CREATE TABLE `p47_contact` (
  `contactId` int(11) NOT NULL,
  `userName` varchar(40) NOT NULL,
  `userMail` varchar(40) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `question` varchar(500) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `p47_dean`
--

CREATE TABLE `p47_dean` (
  `deanId` int(11) NOT NULL,
  `deanName` varchar(40) NOT NULL,
  `deanJobtitle` varchar(90) NOT NULL,
  `deanBio` text NOT NULL,
  `deanWord` text NOT NULL,
  `deanImage` varchar(200) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `p47_dean`
--

INSERT INTO `p47_dean` (`deanId`, `deanName`, `deanJobtitle`, `deanBio`, `deanWord`, `deanImage`, `status`) VALUES
(3, 'Prof/ Gamal Ali', 'Dean Of Faculty Of Commerce And Business Adminstration - Hel', ' Donec diam neque, vestibulum eget, vulputate ut, ultrices vel, augue. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec pharetra, magna vestibulum aliquet ultrices, erat tortor sollicitudin mi, sit amet lobortis sapien sapien non mi. Integer ac neque.\r\n', ' The faculty of commerce and business administration is one of the leading faculties that was established in 1942 and was called the Higher Institute of Accounting and Financial Sciences.\r\nAt the undergraduate level, the faculty is considered a pioneer in providing the Business Information Systems (BIS) program, which integrates business and computer sciences. It is the first program at the local and regional levels.\r\nThe faculty also introduces the FMI Financial Markets and Institutions program, which is also the first program locally and regionally to provide graduates who meet the needs of the market.\r\nAt the postgraduate level, the faculty has a unique program in hospital management and health economics that grants various scientific degrees (diploma, master, and doctorate) in hospital management, health economics, and health information systems.\r\nThe faculty is also considered one of the leading faculties in achieving scientific degrees at the undergraduate level in each of the following:\r\nAccounting, Business Administration, Economics, Foreign Trade, Political Science, Math, Insurance, Applied Statistics, and Information Systems. Studies for these degrees are taught in both Arabic and English.\r\nThe faculty also offers academic degrees at the postgraduate level, as it grants the following degrees: Diploma in Human Resources; Accounting and Auditing; Master and Doctorate in Accounting; Business Administration; Economics; Foreign Trade; Political Science; Math Insurance; and applied statistics.\r\nhe faculty develops a culture of community service and environmental development among students and faculty members by sponsoring seminars and conferences that contribute to raising awareness about global issues (environmental, economic, and health), such as sustainable development, climate change, and the Coronavirus. as well as the faculty, play an important role in encouraging their graduates at different stages to compete in the labor market.\r\nALLAH grants success\r\n\r\n\r\nBest regards and appreciation\r\n\r\nProf/Gamal Ali', 'dean.jpeg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `p47_event`
--

CREATE TABLE `p47_event` (
  `eventId` int(11) NOT NULL,
  `mainPhoto` varchar(400) NOT NULL,
  `eventTitle` varchar(70) NOT NULL,
  `eventDesc` text NOT NULL,
  `eventCat` int(11) NOT NULL,
  `eventDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `eventDatee` varchar(20) NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT 'is pennding or not'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `p47_event`
--

INSERT INTO `p47_event` (`eventId`, `mainPhoto`, `eventTitle`, `eventDesc`, `eventCat`, `eventDate`, `eventDatee`, `status`) VALUES
(54, 'images (1).jpeg', 'The 5th Edition of the Novel Intelligent and Leading Emerging Sciences', ' We are delighted to invite you to participate in the 5th edition of the Novel Intelligent and Leading Emerging Sciences Conference (BIS2023), which will be held in Egypt from October 21-23, 2023. Registration and Call for Papers are now open.\r\n\r\nBIS is an annual international conference organized by BIS University, Egypt, and all previous runs (2019-2022) was IEEE-sponsored and Scopus-indexed. Our aim is to bring together researchers, engineers, academics, and professionals from the industry to share innovative ideas, present recent research, and explore future trends in various areas of Engineering and Technology.\r\n\r\nDon\'t miss out on this opportunity! Apply before July 15, 2023. We welcome submissions and registrations from all interested parties. You can find the submission link in the information section below, and fill out the form to receive the latest updates and information.\r\n\r\nSubmissions and registrations are very welcome!\r\n\r\nSubmission link: https://BIS2023.edas.info/\r\n\r\nFor the latest updates and info, fill out the form: https://forms.office.com/r/ZMnEcTk4Uq\r\n\r\n\r\n', 3, '2023-06-23 00:20:18', '2023-10-21', 1),
(55, '000000[1]', 'interdum eu tincidunt in leo maecenas pulvinar lobortis est phasellus ', ' \"Proin interdum mauris non ligula pellentesque ultrices. Phasellus id sapien in sapien iaculis congue. Vivamus metus arcu, adipiscing molestie, hendrerit at, vulputate vitae, nisl.\r\n\r\nAenean lectus. Pellentesque eget nunc. Donec quis orci eget orci vehicula condimentum.\"\r\n', 2, '2023-06-23 00:29:20', '2023-06-22', 1),
(56, '172_16x9_1076.jpg', 'Fall Convocation', ' Join us as we celebrate the accomplishments of our graduating students at the Fall Convocation ceremony. This year\'s keynote speaker is renowned physicist Dr. Jane Smith.', 5, '2023-06-23 00:36:56', '2023-06-30', 1),
(57, '20170818-2017InternationalWelcomeDinner.jpg', 'International Student Welcome Dinner', 'New international students are invited to join us for a welcome dinner to kick off the academic year. Meet fellow students, faculty, and staff, and learn more about the resources available to you on campus.', 1, '2023-06-23 00:38:45', '2023-06-16', 1),
(58, 'EF 17.jpg', 'Career Fair', 'Connect with top employers and explore career opportunities at our annual career fair. Bring your resume and dress to impress!', 4, '2023-06-23 00:40:48', '2023-06-16', 1),
(59, 'pexels-brent-keane-1751731.jpg', 'Winter Music Concert', 'Join us for an evening of music and entertainment at our annual Winter Music Concert. This year\'s performers include the university choir, orchestra, and jazz ensemble.', 1, '2023-06-23 00:45:57', '2023-06-16', 1),
(60, '279059004_10227171070637948_6469219844953632887_n.jpg', 'iftaar ramdan', 'Join us for an Iftar Ramdan.', 6, '2023-06-23 00:48:52', '2023-07-01', 1);

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
-- Table structure for table `p47_eventfile`
--

CREATE TABLE `p47_eventfile` (
  `id` int(11) NOT NULL,
  `file_name` varchar(800) COLLATE utf8_unicode_ci NOT NULL,
  `uploade_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `eventId` int(11) NOT NULL,
  `filetype` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `p47_eventfile`
--

INSERT INTO `p47_eventfile` (`id`, `file_name`, `uploade_on`, `status`, `eventId`, `filetype`) VALUES
(475, '278695433_10227171062677749_4723181435303945496_n.jpg', '2023-06-23 00:50:21', '1', 60, 'jpeg'),
(476, '278711450_10227171061837728_8853288549389764921_n.jpg', '2023-06-23 00:50:21', '1', 60, 'jpeg'),
(477, '279046514_10227171072077984_7151386496363977472_n.jpg', '2023-06-23 00:50:21', '1', 60, 'jpeg'),
(478, '279049288_10227171071037958_3611201629778858740_n.jpg', '2023-06-23 00:50:21', '1', 60, 'jpeg'),
(479, '279054040_10227171070837953_812893160104833019_n.jpg', '2023-06-23 00:50:21', '1', 60, 'jpeg'),
(480, '279059004_10227171070637948_6469219844953632887_n.jpg', '2023-06-23 00:50:21', '1', 60, 'jpeg');

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

--
-- Dumping data for table `p47_faqs`
--

INSERT INTO `p47_faqs` (`faqId`, `faqTitle`, `faqDesc`, `faqResponse`) VALUES
(1, 'ahmed', 'hhhhhhh', 'fgggh'),
(2, 'fdfsd', 'fdsf', 'fdsf'),
(3, 'gfdg', 'gfdg', 'gfdg'),
(4, 'cvdv', 'vdv', 'vdv'),
(5, 'a7moudy', 'hghg', 'rere');

-- --------------------------------------------------------

--
-- Table structure for table `p47_faqss`
--

CREATE TABLE `p47_faqss` (
  `faqId` int(11) NOT NULL,
  `faqTitle` varchar(5000) DEFAULT NULL,
  `faqDesc` varchar(5000) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `edited_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `faqResponse` varchar(5000) DEFAULT NULL,
  `text` text NOT NULL DEFAULT 'created:',
  `textt` text NOT NULL DEFAULT 'edited:'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `p47_faqss`
--

INSERT INTO `p47_faqss` (`faqId`, `faqTitle`, `faqDesc`, `created_at`, `edited_at`, `faqResponse`, `text`, `textt`) VALUES
(35, 'how do I figure out what to learn ?', 'The most important thing is that you want to learn something that interests you, because once you start learning, you’ll be with this topic for a while. Choosing something just because it’s popular or what others are doing isn’t the way to go because if you don’t have a true interest in it, you’ll lose the motivation to learn! Spend some time seriously looking into the different tech career paths before choosing one to go down.', '2023-06-23 16:53:51', '2023-06-23 13:53:51', 'The most important thing is that you want to learn something that interests you, because once you start learning, you’ll be with this topic for a while. Choosing something just because it’s popular or what others are doing isn’t the way to go because if you don’t have a true interest in it, you’ll lose the motivation to learn! Spend some time seriously looking into the different tech career paths before choosing one to go down.', 'created:', 'edited:'),
(36, 'Which programming language is the best to learn?', 'Which programming language is the best to learn?', '2023-06-23 16:54:17', '2023-06-23 13:54:17', 'I usually tell most people to start by learning HTML and CSS, then move into learning JavaScript. The reason is that JavaScript is used everywhere: frontend, backend, and even to build mobile apps. It has many use cases, which is why I think it’s smart to learn.', 'created:', 'edited:'),
(37, 'Is it possible to do both graphic design and coding?', 'If you have an interest in coding and graphic design, then there’s nothing to say you shouldn’t learn skills in both areas. They often work hand-in-hand, so having knowledge and skills in both areas could be desirable for certain career paths. You could also think about pursuing something in between like UI design, which is a very in-demand career right now!', '2023-06-23 16:54:33', '2023-06-23 13:54:33', 'If you have an interest in coding and graphic design, then there’s nothing to say you shouldn’t learn skills in both areas. They often work hand-in-hand, so having knowledge and skills in both areas could be desirable for certain career paths. You could also think about pursuing something in between like UI design, which is a very in-demand career right now!', 'created:', 'edited:');

-- --------------------------------------------------------

--
-- Table structure for table `p47_highboard`
--

CREATE TABLE `p47_highboard` (
  `member_Id` int(11) NOT NULL,
  `member_Name` varchar(40) NOT NULL,
  `member_Image` varchar(400) NOT NULL,
  `member_Bio` varchar(400) NOT NULL,
  `member_Role` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `p47_highboard`
--

INSERT INTO `p47_highboard` (`member_Id`, `member_Name`, `member_Image`, `member_Bio`, `member_Role`, `status`) VALUES
(7, 'DR. Mahmoud ElTony', '', ' augue vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae donec pharetra', 5, 1),
(8, 'DR. Hend Ouda', '863353437976044yR7Xhxo_400x400.jpg', ' augue vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae donec pharetra', 6, 1),
(9, 'DR. Rasha Farghaly', '7288099953404Rasha-Farghali.jpg', ' augue vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae donec pharetra', 8, 1),
(10, 'DR. Hend Attia', '76745787865998Hend Attia - program registrar.jpg', ' Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati non consequuntur aliquid nulla, doloremque pariatur qui ipsam, doloribus, assumenda mollitia rem quidem nobis modi est ad delectus ut maiores', 9, 1),
(11, 'DR. Mahmoud Bahloul', '92427295304024Mahmoud Bahloul - program registrar.jpg', ' Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati non consequuntur aliquid nulla, doloremque pariatur qui ipsam, doloribus, assumenda mollitia rem quidem nobis modi est ad delectus ut maiores', 9, 1),
(12, 'DR. hadeer el batanouny', '30461551902890hadeer el batanouny - program registrar.jpg', ' Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati non consequuntur aliquid nulla, doloremque pariatur qui ipsam, doloribus, assumenda mollitia rem quidem nobis modi est ad delectus ut maiores', 9, 1),
(13, 'DR. Abd El Rahman Mostafa', '94205788898948Abd El Rahman Mostafa - program registrar.jpg', ' Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati non consequuntur aliquid nulla, doloremque pariatur qui ipsam, doloribus, assumenda mollitia rem quidem nobis modi est ad delectus ut maiores', 9, 1);

-- --------------------------------------------------------

--
-- Table structure for table `p47_highboardrole`
--

CREATE TABLE `p47_highboardrole` (
  `Role_Id` int(11) NOT NULL,
  `role_Title` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `p47_highboardrole`
--

INSERT INTO `p47_highboardrole` (`Role_Id`, `role_Title`) VALUES
(5, 'Acting College Vice Dean for Community Affairs and Research Services\r\n\r\n'),
(6, 'College Vice Dean for Studies and Research\r\n'),
(8, 'Program Coordinator'),
(9, 'Program Registrar');

-- --------------------------------------------------------

--
-- Table structure for table `p47_news`
--

CREATE TABLE `p47_news` (
  `newsId` int(11) NOT NULL,
  `newsTitle` varchar(300) CHARACTER SET utf8 NOT NULL,
  `mainPhoto` varchar(400) NOT NULL,
  `newsDesc` text NOT NULL,
  `news_Importance` tinyint(1) NOT NULL COMMENT 'is it public or for students only',
  `dayDate` varchar(30) DEFAULT NULL,
  `currentDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(11) NOT NULL COMMENT 'is pendding or not'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `p47_news`
--

INSERT INTO `p47_news` (`newsId`, `newsTitle`, `mainPhoto`, `newsDesc`, `news_Importance`, `dayDate`, `currentDate`, `status`) VALUES
(28, 'Schedule of exams for qualifying subjects and supplementary materials for equivalent foreign certificates, IG certificate and American diploma', '352732987_1225493021487944_1713502077091810870_n.jpg', ' A very important announcement for students of the first, second, third and fourth levels who were previously notified by Student Affairs of the supplementary subjects prescribed for them.\r\nSchedule of exams for qualifying subjects and supplementary materials for equivalent foreign certificates, IG certificate and American diploma, July 2023 session\r\nRegistration takes place on the following link for students who are scheduled to perform supplementary materials for equivalent certificates (they have previously been notified of these materials by Student Affairs), and then a code will appear to pay the exam fees, and the payment will be made at Masari outlets Oh safety\r\nhttp://app2.helwan.edu.eg/IGE/login.asp\r\nThen, you will go to the Faculty of Education, Helwan University, to take the exam on the announced dates\r\n( NB )\r\nComplementary subjects are subjects to be taken for foreign and equivalency degree students who have not previously taken their exams in the pre-college stage, and the student does not graduate and obtain a bachelor’s degree until after taking the supplementary subjects exam and passing it. students)\r\nPlease take the exam so that this does not affect the graduation of final year students, or the registration of level (first, second and third) students for the upcoming semesters.', 0, '2023-07-09', '2023-06-22 23:53:50', 1),
(29, 'The US Embassy in Cairo and Amideast\'s Visit to BIS HU', 'helwan_university_visit_moi_university.png', 'BIS had the pleasure of hosting the US Embassy in Cairo and Amideast’s convoy, along with some US university representatives, since BIS was chosen as one of 9 other universities in Egypt to be approached for partnership opportunities.  \r\n\r\nThe visit will be complemented by a “Networking Event” held on March 17th, which will collectively gather the US university representatives and the selected universities from Egypt to discuss future collaborations.  \r\n\r\nThe US university representatives that honored us yesterday are from: \r\n\r\nNorth Carolina State University \r\nColorado State University \r\nUniversity of Massachusetts – Boston Campus \r\nThe University of Alabama \r\nRutgers, The State University of New Jersy \r\nTufts University ', 1, '2023-06-24', '2023-06-23 02:04:53', 1),
(30, 'BIS at EduGate', 'thumb63c7e3d9e4b8f.webp', 'BIS always has the pleasure of participating in such\r\nthe well-known and fruitful event as EduGate that enables us to\r\nintroduce and market BIS  to all high school students by\r\nwidely communicating with different students and their parents\r\nand make sure to provide the needed guidance.\r\n\r\nEduGate is an international educational exhibition and forum gathering universities and high school students. It is a chance for many exceptional universities and study-abroad agencies from around the world to connect and engage with promising academic talents. Educators also had the chance to network and discuss the latest trends in international education. The event was held on 7 - 11 March at Kempinski Royal Maxim and another one will be held on Jul 30,31 and 1 Aug 2023 at Kempinski Royal Maxim Hotel as well.', 1, '2023-06-30', '2023-06-23 02:05:48', 1),
(31, 'BIS CELEBRATES MOTHER’S DAY.', 'images.jpeg', ' In regards to Mother’s day, BIS has decided to honor the fighters & supporters in our students’ lives ,In the presence of Dr. Mahmoud Abu Al-Nasr, the academic advisor of BIS, and Dr. Amal El-Ghazzawi, Dean of Mass communication.\r\nWhere the BIS honored the mothers and gave them certificates of appreciation in order to thank them for all they have done for the sake of their children’s success.\r\nOur students couldn’t have done it without you!', 1, '2023-03-21', '2023-06-23 00:14:17', 1),
(32, 'BIS Gradution Party 2021-2022', '242037606_10225846808412220_2757469358553124454_n.jpg', ' Under the patronage of Professor Dr. Majid Najm, President of the University, and Professor Dr. Amani Fakher, Dean of the College, and in the presence of Dr. Mona Fouad, Vice President of the University for Graduate Studies and Research, and Dr. Mamdouh Mahdi, Vice President of the University for Community Service and Environmental Development, a graduation ceremony for the Business Information Systems (BIS) program was held yesterday at the Arts and Culture Complex at Helwan University. We thank God for the success of the ceremony, the good organization, and the impressive image that the ceremony presented, which is worthy of the program\'s students, the college administration, and Helwan University itself. Thank you to everyone who contributed and participated in organizing this event. Attached are some pictures from the ceremony that have been prepared so far.', 1, '2022-09-15', '2023-06-23 15:33:40', 1);

-- --------------------------------------------------------

--
-- Table structure for table `p47_newsfile`
--

CREATE TABLE `p47_newsfile` (
  `id` int(11) NOT NULL,
  `file_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `uploade_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `newsId` int(11) NOT NULL,
  `filetype` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `p47_newsfile`
--

INSERT INTO `p47_newsfile` (`id`, `file_name`, `uploade_on`, `newsId`, `filetype`) VALUES
(67, '297104574_10227759836036715_5041785742855584519_n.jpg', '2023-06-23 02:08:17', 30, 'jpeg'),
(68, '297207236_10227759832636630_5714793927192438395_n.jpg', '2023-06-23 02:08:17', 30, 'jpeg'),
(69, '297212207_10227759833636655_2951544690566492701_n.jpg', '2023-06-23 02:08:17', 30, 'jpeg'),
(70, '297215208_10227759831396599_5469391544479621109_n.jpg', '2023-06-23 02:08:17', 30, 'jpeg'),
(71, '297216073_10227759833236645_3775273915920526529_n.jpg', '2023-06-23 02:08:17', 30, 'jpeg'),
(72, '297222979_10227759832236620_7595300058390013892_n.jpg', '2023-06-23 02:08:17', 30, 'jpeg'),
(75, '297237017_10227759833516652_7440770545772666326_n.jpg', '2023-06-23 02:08:17', 30, 'jpeg'),
(76, '297244187_10227759835436700_3362160611938870832_n.jpg', '2023-06-23 02:08:17', 30, 'jpeg'),
(77, '297267606_10227759829956563_240429864451377276_n.jpg', '2023-06-23 02:08:17', 30, 'jpeg'),
(78, '297275646_10227759831516602_9144089830089231906_n.jpg', '2023-06-23 02:08:17', 30, 'jpeg'),
(79, '297275655_10227759835636705_3001773475755291583_n.jpg', '2023-06-23 02:08:17', 30, 'jpeg'),
(80, '297335343_10227759834596679_2583338013984313425_n.jpg', '2023-06-23 02:08:17', 30, 'jpeg'),
(81, '297357540_10227759833956663_8420740816237225638_n.jpg', '2023-06-23 02:08:17', 30, 'jpeg'),
(82, '297397917_10227759833396649_7886011544213215835_n.jpg', '2023-06-23 02:08:17', 30, 'jpeg'),
(83, '297463148_10227759833796659_9211364389741572817_n.jpg', '2023-06-23 02:08:17', 30, 'jpeg'),
(84, '297466361_10227759830876586_8661820284740712748_n.jpg', '2023-06-23 02:08:17', 30, 'jpeg'),
(85, '297490469_10227759836676731_6823616146415135191_n.jpg', '2023-06-23 02:08:17', 30, 'jpeg'),
(86, '297606001_10227759836876736_5443697275125496380_n.jpg', '2023-06-23 02:08:17', 30, 'jpeg'),
(87, '241756818_10225846807052186_6680883010206815931_n.jpg', '2023-06-23 15:34:46', 32, 'jpeg'),
(88, '241758590_10225846811692302_7485791935611774623_n.jpg', '2023-06-23 15:34:46', 32, 'jpeg'),
(89, '241772263_10225846807412195_3851901531709945547_n.jpg', '2023-06-23 15:34:46', 32, 'jpeg'),
(90, '241818191_10225846804572124_3504072010643312436_n (1).jpg', '2023-06-23 15:34:46', 32, 'jpeg'),
(91, '241818191_10225846804572124_3504072010643312436_n.jpg', '2023-06-23 15:34:46', 32, 'jpeg'),
(92, '241824166_10225846813772354_2187455289113267220_n.jpg', '2023-06-23 15:34:46', 32, 'jpeg'),
(93, '241879882_10225846807732203_3371101039027262547_n.jpg', '2023-06-23 15:34:46', 32, 'jpeg'),
(94, '241893481_10225846813492347_8347459786296474722_n.jpg', '2023-06-23 15:34:46', 32, 'jpeg'),
(95, '241955580_10225846808092212_228761891279053126_n.jpg', '2023-06-23 15:34:46', 32, 'jpeg'),
(96, '241957835_10225846809572249_5694370077049935692_n.jpg', '2023-06-23 15:34:46', 32, 'jpeg'),
(97, '241977046_10225846808772229_6171478590409763896_n.jpg', '2023-06-23 15:34:46', 32, 'jpeg'),
(98, '242009199_10225846806692177_3448082859472258480_n.jpg', '2023-06-23 15:34:46', 32, 'jpeg'),
(99, '242037606_10225846808412220_2757469358553124454_n.jpg', '2023-06-23 15:34:46', 32, 'jpeg'),
(100, '242052271_10225846805652151_2858329969756697944_n.jpg', '2023-06-23 15:34:46', 32, 'jpeg'),
(101, '242076416_10225846812372319_8801021663525502435_n.jpg', '2023-06-23 15:34:46', 32, 'jpeg'),
(102, '242094161_10225846809132238_985062274225026425_n.jpg', '2023-06-23 15:34:46', 32, 'jpeg'),
(103, '242121480_10225846806452171_2691899569060853389_n.jpg', '2023-06-23 15:34:46', 32, 'jpeg'),
(104, '242123073_10225846804892132_7892511018630183691_n.jpg', '2023-06-23 15:34:46', 32, 'jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `p47_schedules`
--

CREATE TABLE `p47_schedules` (
  `ScheduleId` int(11) NOT NULL,
  `ScheduleTitle` varchar(50) NOT NULL,
  `ScheduleSemester` varchar(12) NOT NULL DEFAULT 'Both',
  `ScheduleYear` int(5) NOT NULL,
  `level` int(2) NOT NULL DEFAULT 5,
  `ScheduleFile` varchar(300) NOT NULL,
  `scheduleTypeId` int(11) NOT NULL,
  `uploadDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `p47_schedules`
--

INSERT INTO `p47_schedules` (`ScheduleId`, `ScheduleTitle`, `ScheduleSemester`, `ScheduleYear`, `level`, `ScheduleFile`, `scheduleTypeId`, `uploadDate`, `status`) VALUES
(11, 'BIS Final exam Schedule 2022', 'Second', 2022, 5, 'BISنهائى جدول امتحانات الفاينال.pdf', 2, '2023-06-23 01:23:16', 1),
(12, 'BIS Final exam Schedule 2022', 'First', 2023, 5, 'final-exams-schedule.pdf', 2, '2023-06-23 01:23:57', 1),
(13, 'Level One guidline', 'Both', 2024, 5, 'lvl1-guideline.pdf', 5, '2023-06-23 01:24:59', 1),
(14, 'Academic Calendar', 'Second', 2023, 5, 'Academic-calendar.pdf', 3, '2023-06-23 01:26:27', 1),
(15, 'BIS Final exam Schedule 2022', 'Second', 2022, 5, 'BISنهائى جدول امتحانات الفاينال.pdf', 2, '2023-06-23 01:23:16', 1),
(16, 'BIS Final exam Schedule 2022', 'Second', 2022, 1, 'BISنهائى جدول امتحانات الفاينال.pdf', 1, '2023-06-23 01:23:16', 1),
(17, 'BIS Final exam Schedule 2022', 'Second', 2022, 2, 'BISنهائى جدول امتحانات الفاينال.pdf', 1, '2023-06-23 01:23:16', 1),
(18, 'BIS Halls Scheme - 2022/23.', 'Both', 2022, 5, 'halls-schedule.pdf', 4, '2023-06-23 01:28:13', 1);

-- --------------------------------------------------------

--
-- Table structure for table `p47_scheduletype`
--

CREATE TABLE `p47_scheduletype` (
  `scheduleTypeId` int(11) NOT NULL,
  `TypeName` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `p47_scheduletype`
--

INSERT INTO `p47_scheduletype` (`scheduleTypeId`, `TypeName`) VALUES
(1, 'Lecture Schedules'),
(2, 'Exam Schedules'),
(3, 'Academic Calendar'),
(4, 'Halls Scheme'),
(5, 'Guideline');

-- --------------------------------------------------------

--
-- Table structure for table `p47_stuactsimgs`
--

CREATE TABLE `p47_stuactsimgs` (
  `id` int(11) NOT NULL,
  `file_name` varchar(200) NOT NULL,
  `uploade_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `activityCode` int(11) NOT NULL,
  `filetype` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `p47_stuactsimgs`
--

INSERT INTO `p47_stuactsimgs` (`id`, `file_name`, `uploade_on`, `activityCode`, `filetype`) VALUES
(27, '342367132_1216269759023370_4618376724971747149_n.jpg', '2023-06-23 02:58:46', 25, 'jpeg'),
(28, '343970576_200604499436422_4184002589883562729_n.jpg', '2023-06-23 02:58:46', 25, 'jpeg'),
(29, '344023326_949637846380104_1430949135544961744_n.jpg', '2023-06-23 02:58:46', 25, 'jpeg'),
(30, '344024050_968179664359523_7069906104826406926_n.jpg', '2023-06-23 02:58:46', 25, 'jpeg'),
(31, '344069876_629617958574048_2570847769313786909_n.jpg', '2023-06-23 02:58:46', 25, 'jpeg'),
(32, '344407072_3533447393648384_4581317821376581082_n.jpg', '2023-06-23 02:58:46', 25, 'jpeg'),
(34, '344535232_4216001985291713_3156792153532545371_n.jpg', '2023-06-23 02:58:46', 25, 'jpeg'),
(35, '344535350_3553158734911997_7535571325944391789_n.jpg', '2023-06-23 02:58:46', 25, 'jpeg'),
(36, '344536278_3052568088383022_2735651399569124350_n.jpg', '2023-06-23 02:58:46', 25, 'jpeg'),
(37, '344547427_6293526384046339_603931836082435125_n.jpg', '2023-06-23 02:58:46', 25, 'jpeg'),
(38, '344548168_252265327214841_2912381861646437658_n.jpg', '2023-06-23 02:58:46', 25, 'jpeg'),
(39, '344569173_595666225847257_927005038446408424_n.jpg', '2023-06-23 02:58:46', 25, 'jpeg');

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
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `p47_studentachievement`
--

INSERT INTO `p47_studentachievement` (`achievementId`, `stuName`, `achievementTitle`, `stuImage`, `achievementDesc`, `status`) VALUES
(8, ' Ziad Hisham Farouk Hassan', 'the student Ziad Hisham Farouk Hassan for winning ', '51760955627151325973643_1130221257613944_6723874904138723520_n.jpg', 'A BIS student at Helwan University is someone who achieves the difficult equation of excelling academically, athletically, and having multiple talents, meaning they have a well-rounded personality. Every day there is good news about our students and their athletic achievements. Today, we congratulate the student Ziad Hisham Farouk Hassan for winning two awards - in the name of Allah, Mashallah. The first is that he won second place in the game of Taekwondo at the level of Helwan University, and the second is that he won third place in track and field events at the university level. And there is still more to come, God willing.', 1),
(9, 'Moumen Hossam', 'the Egypt national handball team won the', '68901892_10219091388010932_317351190721462272_n.jpg', ' The College of Commerce, Business Administration, and Business Information Systems (BIS) program management congratulate the Egypt national handball team for winning the World Cup for youth. We also congratulate our student, Moumen Hossam, who is a freshman in the BIS program, for his role in winning this championship. We wish them continued success and excellence.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `p47_studentacts`
--

CREATE TABLE `p47_studentacts` (
  `activityCode` int(11) NOT NULL,
  `activityName` varchar(30) NOT NULL,
  `activityLogo` varchar(300) NOT NULL,
  `mainPhoto` varchar(200) NOT NULL,
  `activityBio` varchar(500) NOT NULL,
  `activityLink` varchar(200) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `p47_studentacts`
--

INSERT INTO `p47_studentacts` (`activityCode`, `activityName`, `activityLogo`, `mainPhoto`, `activityBio`, `activityLink`, `status`) VALUES
(21, 'Enactus Helwan University', '333805197_729586545186108_6639128922960968175_n.jpg', 'enactus bis.jpg', ' Formerly known as SIFE Helwan University, We are a community of student, academic and business leader\r\n', 'https://www.facebook.com/EnactusHelwanUniversity', 1),
(22, 'THREEDOS', '347224227_1583145112527701_6263762500504351743_n.jpg', '326704548_1315690932544487_7394673401246437111_n.jpg', ' ThreeDOS (Previously known as FunKey) is one of the leading student activities in Faculty Of Business and Information System in Helwan University which - unlike the other student activities- is focusing on three main aspects by which we believe that we can create a generation that will carry on his shoulder the renaissance of this country to put it in the place it deserves. \r\nAnd below here you can find our main three aspects:\r\n\r\n1st: The Academic Aspect: In a world that changes every day comes', 'https://www.facebook.com/photo/?fbid=528056379525810&set=a.464968012501314', 1),
(25, 'MSP CU', '308669665_450912063740560_7865110919023923152_n.png', '308352565_450912060407227_2568821278651746735_n.png', ' MSP Tech Club is a student activity organized by Microsoft student partners under the supervision of Microsoft, aiming to increase the knowledge of students by providing them with the essential training and the interpersonal skills.', 'https://www.facebook.com/MSPCU/about_details', 1);

-- --------------------------------------------------------

--
-- Table structure for table `p47_stuhonourboard`
--

CREATE TABLE `p47_stuhonourboard` (
  `honBoardId` int(11) NOT NULL,
  `honBoardTitle` varchar(40) NOT NULL,
  `description` varchar(500) NOT NULL,
  `mainPhoto` varchar(200) NOT NULL,
  `year` varchar(15) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'pennding or not'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `p47_stuhonourboard`
--

INSERT INTO `p47_stuhonourboard` (`honBoardId`, `honBoardTitle`, `description`, `mainPhoto`, `year`, `status`) VALUES
(11, 'BIS Top student 2025-2026', '  BIS Top student 2025-2026', '73080367_10219500377395411_5442745246557405184_n (1).jpg', '2025-2026', 1),
(13, 'BIS Top student 2023-2024', ' BIS Top student 2022-2023', '88150125_10220996276991966_5815450735998926848_n.jpg', '2022-2023', 1),
(14, 'BIS Top student 2026-2027	', ' BIS Top student 2026-2027	', 'academic-calendar.jpg', '2026-2027', 1);

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
-- Table structure for table `p60_tablename`
--

CREATE TABLE `p60_tablename` (
  `attribute1` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  ADD PRIMARY KEY (`albumId`);

--
-- Indexes for table `p47_albumfile`
--
ALTER TABLE `p47_albumfile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `albumId` (`albumId`);

--
-- Indexes for table `p47_announcement`
--
ALTER TABLE `p47_announcement`
  ADD PRIMARY KEY (`announcementId`),
  ADD KEY `adminId` (`adminId`);

--
-- Indexes for table `p47_announcementfiles`
--
ALTER TABLE `p47_announcementfiles`
  ADD PRIMARY KEY (`fileId`),
  ADD KEY `announcementId` (`announcementId`);

--
-- Indexes for table `p47_beststudents`
--
ALTER TABLE `p47_beststudents`
  ADD PRIMARY KEY (`stuId`),
  ADD KEY `boardId` (`boardId`);

--
-- Indexes for table `p47_bisnumbers`
--
ALTER TABLE `p47_bisnumbers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `p47_careers`
--
ALTER TABLE `p47_careers`
  ADD PRIMARY KEY (`careerId`);

--
-- Indexes for table `p47_contact`
--
ALTER TABLE `p47_contact`
  ADD PRIMARY KEY (`contactId`);

--
-- Indexes for table `p47_dean`
--
ALTER TABLE `p47_dean`
  ADD PRIMARY KEY (`deanId`);

--
-- Indexes for table `p47_event`
--
ALTER TABLE `p47_event`
  ADD PRIMARY KEY (`eventId`),
  ADD KEY `eventCat` (`eventCat`);

--
-- Indexes for table `p47_eventcategory`
--
ALTER TABLE `p47_eventcategory`
  ADD PRIMARY KEY (`categoryId`);

--
-- Indexes for table `p47_eventfile`
--
ALTER TABLE `p47_eventfile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `eventId` (`eventId`);

--
-- Indexes for table `p47_faqs`
--
ALTER TABLE `p47_faqs`
  ADD PRIMARY KEY (`faqId`);

--
-- Indexes for table `p47_faqss`
--
ALTER TABLE `p47_faqss`
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
-- Indexes for table `p47_news`
--
ALTER TABLE `p47_news`
  ADD PRIMARY KEY (`newsId`);

--
-- Indexes for table `p47_newsfile`
--
ALTER TABLE `p47_newsfile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `newsId` (`newsId`);

--
-- Indexes for table `p47_schedules`
--
ALTER TABLE `p47_schedules`
  ADD PRIMARY KEY (`ScheduleId`),
  ADD KEY `scheduleTypeId` (`scheduleTypeId`);

--
-- Indexes for table `p47_scheduletype`
--
ALTER TABLE `p47_scheduletype`
  ADD PRIMARY KEY (`scheduleTypeId`);

--
-- Indexes for table `p47_stuactsimgs`
--
ALTER TABLE `p47_stuactsimgs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activityCode` (`activityCode`);

--
-- Indexes for table `p47_studentachievement`
--
ALTER TABLE `p47_studentachievement`
  ADD PRIMARY KEY (`achievementId`);

--
-- Indexes for table `p47_studentacts`
--
ALTER TABLE `p47_studentacts`
  ADD PRIMARY KEY (`activityCode`);

--
-- Indexes for table `p47_stuhonourboard`
--
ALTER TABLE `p47_stuhonourboard`
  ADD PRIMARY KEY (`honBoardId`);

--
-- Indexes for table `p47_subjectcategory`
--
ALTER TABLE `p47_subjectcategory`
  ADD PRIMARY KEY (`subjectCategoryId`);

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
  MODIFY `Department_id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `doctorscourse`
--
ALTER TABLE `doctorscourse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `doctors_account`
--
ALTER TABLE `doctors_account`
  MODIFY `DoctorCode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
-- AUTO_INCREMENT for table `p47_about`
--
ALTER TABLE `p47_about`
  MODIFY `aboutId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `p47_admin`
--
ALTER TABLE `p47_admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `p47_album`
--
ALTER TABLE `p47_album`
  MODIFY `albumId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `p47_albumfile`
--
ALTER TABLE `p47_albumfile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT for table `p47_announcement`
--
ALTER TABLE `p47_announcement`
  MODIFY `announcementId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `p47_announcementfiles`
--
ALTER TABLE `p47_announcementfiles`
  MODIFY `fileId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `p47_beststudents`
--
ALTER TABLE `p47_beststudents`
  MODIFY `stuId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `p47_bisnumbers`
--
ALTER TABLE `p47_bisnumbers`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `p47_careers`
--
ALTER TABLE `p47_careers`
  MODIFY `careerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `p47_contact`
--
ALTER TABLE `p47_contact`
  MODIFY `contactId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `p47_dean`
--
ALTER TABLE `p47_dean`
  MODIFY `deanId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `p47_event`
--
ALTER TABLE `p47_event`
  MODIFY `eventId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `p47_eventcategory`
--
ALTER TABLE `p47_eventcategory`
  MODIFY `categoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `p47_eventfile`
--
ALTER TABLE `p47_eventfile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=483;

--
-- AUTO_INCREMENT for table `p47_faqs`
--
ALTER TABLE `p47_faqs`
  MODIFY `faqId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `p47_faqss`
--
ALTER TABLE `p47_faqss`
  MODIFY `faqId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `p47_highboard`
--
ALTER TABLE `p47_highboard`
  MODIFY `member_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `p47_highboardrole`
--
ALTER TABLE `p47_highboardrole`
  MODIFY `Role_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `p47_news`
--
ALTER TABLE `p47_news`
  MODIFY `newsId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `p47_newsfile`
--
ALTER TABLE `p47_newsfile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `p47_schedules`
--
ALTER TABLE `p47_schedules`
  MODIFY `ScheduleId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `p47_scheduletype`
--
ALTER TABLE `p47_scheduletype`
  MODIFY `scheduleTypeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `p47_stuactsimgs`
--
ALTER TABLE `p47_stuactsimgs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `p47_studentachievement`
--
ALTER TABLE `p47_studentachievement`
  MODIFY `achievementId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `p47_studentacts`
--
ALTER TABLE `p47_studentacts`
  MODIFY `activityCode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `p47_stuhonourboard`
--
ALTER TABLE `p47_stuhonourboard`
  MODIFY `honBoardId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `p47_subjectcategory`
--
ALTER TABLE `p47_subjectcategory`
  MODIFY `subjectCategoryId` int(11) NOT NULL AUTO_INCREMENT;

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
-- Constraints for table `p47_albumfile`
--
ALTER TABLE `p47_albumfile`
  ADD CONSTRAINT `p47_albumfile_ibfk_1` FOREIGN KEY (`albumId`) REFERENCES `p47_album` (`albumId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `p47_announcement`
--
ALTER TABLE `p47_announcement`
  ADD CONSTRAINT `p47_announcement_ibfk_1` FOREIGN KEY (`adminId`) REFERENCES `p47_admin` (`adminId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `p47_announcementfiles`
--
ALTER TABLE `p47_announcementfiles`
  ADD CONSTRAINT `p47_announcementfiles_ibfk_1` FOREIGN KEY (`announcementId`) REFERENCES `p47_announcement` (`announcementId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `p47_beststudents`
--
ALTER TABLE `p47_beststudents`
  ADD CONSTRAINT `p47_beststudents_ibfk_1` FOREIGN KEY (`boardId`) REFERENCES `p47_stuhonourboard` (`honBoardId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `p47_event`
--
ALTER TABLE `p47_event`
  ADD CONSTRAINT `p47_event_ibfk_1` FOREIGN KEY (`eventCat`) REFERENCES `p47_eventcategory` (`categoryId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `p47_eventfile`
--
ALTER TABLE `p47_eventfile`
  ADD CONSTRAINT `p47_eventFile_ibfk_1` FOREIGN KEY (`eventId`) REFERENCES `p47_event` (`eventId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `p47_highboard`
--
ALTER TABLE `p47_highboard`
  ADD CONSTRAINT `high_board_ibfk_1` FOREIGN KEY (`member_Role`) REFERENCES `p47_highboardrole` (`Role_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `p47_newsfile`
--
ALTER TABLE `p47_newsfile`
  ADD CONSTRAINT `p47_newsfile_ibfk_1` FOREIGN KEY (`newsId`) REFERENCES `p47_news` (`newsId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `p47_schedules`
--
ALTER TABLE `p47_schedules`
  ADD CONSTRAINT `p47_schedules_ibfk_1` FOREIGN KEY (`scheduleTypeId`) REFERENCES `p47_scheduletype` (`scheduleTypeId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `p47_stuactsimgs`
--
ALTER TABLE `p47_stuactsimgs`
  ADD CONSTRAINT `p47_stuactsimgs_ibfk_1` FOREIGN KEY (`activityCode`) REFERENCES `p47_studentacts` (`activityCode`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
