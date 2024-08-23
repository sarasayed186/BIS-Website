-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2023 at 10:30 PM
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

--
-- Dumping data for table `doctors_account`
--

INSERT INTO `doctors_account` (`DoctorCode`, `Doctor_ar_Name`, `Doctor_eng_Name`, `National_id`, `Mobile`, `Academic_Mail`, `Personal_Mail`, `DoctorJob`, `University`, `Faculty`, `Department`, `Type`, `UserName`, `Password`, `Notes`, `Doctor_image`, `is_enable`) VALUES
(3, '', 'ahmed', NULL, NULL, 'ahmed@gg.com', NULL, 3, 1, 1, 2, 2, NULL, NULL, NULL, '', 'yes'),
(4, '', 'mido', NULL, NULL, 'mdio@gfhj.com', NULL, 4, 1, 1, 2, 2, NULL, NULL, NULL, '20190223_033313.jpg', 'yes');

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
(9, 'pngaaa.com-18405.png', 'fdfd', '', '2023-06-14 21:41:03', 1),
(10, 'be2943fb-c076-4df1-8a46-34e834c39a4f.jpeg', 'xdsdsf', '', '2023-06-14 21:41:04', 1),
(11, 'Screenshot_20230216_101353.png', 'dsfds', 'hhhhhhhhh', '2023-06-14 21:41:04', 1);

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
(47, 'download.jpeg', '2023-06-14 21:19:07', 9, 'jpeg'),
(49, '51s7NqNrY3L._SL500_.jpg', '2023-06-14 23:10:44', 9, 'jpeg'),
(50, '86b1d8ea8d45404b0961c0a7f2e006b4.jpg', '2023-06-14 23:10:44', 9, 'jpeg'),
(51, '337138759_3496467557343337_5617349370802706507_n.jpg', '2023-06-14 23:10:44', 9, 'jpeg'),
(52, '344565879_989597335362955_2890316742142669334_n.jpg', '2023-06-14 23:10:44', 9, 'jpeg'),
(53, 'agate-banded-blue.jpg', '2023-06-14 23:10:44', 9, 'jpeg'),
(55, 'All Questions at all chapters.pdf', '2023-06-16 17:25:17', 10, 'pdf'),
(56, 'Materials Management YouTube.pdf', '2023-06-16 17:25:55', 10, 'pdf'),
(57, 'league-of-legends-wild-rift-victory.png', '2023-06-16 17:26:12', 11, 'png'),
(58, 'agate-banded-blue.jpg', '2023-06-16 17:31:50', 9, 'jpeg');

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
  `stulevel` varchar(30) NOT NULL,
  `stuRank` int(4) NOT NULL,
  `stuGPA` float NOT NULL,
  `boardId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `jobDesc` varchar(400) NOT NULL,
  `careerMainPhoto` varchar(300) NOT NULL,
  `careerLink` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `p47_careers`
--

INSERT INTO `p47_careers` (`careerId`, `jobTitle`, `companyName`, `jobDesc`, `careerMainPhoto`, `careerLink`, `status`) VALUES
(2, 'fff', '', 'download.jpg', 'gfdgdfgfdg', 'https://getbootstrap.com/docs/4.0/components/forms/', 1),
(3, 'ffdfd', 'hhhhh', ' gfgfg', 'Braum-Poro-Pink-Ceramic-Mugs-Coffee-Cups-Milk-Tea-Mug-Poro-Legends-Cute-New-Adorable-Hand.jpg', 'https://www.facebook.com/f', 1),
(4, 'nono', 'kkk', '   fdfdfsss', 'download.jpeg', 'https://www.facebook.com/', 0),
(5, 'front end dev', 'instant', ' frgfhyhththgfgf', 'download.jpg', 'https://www.facebook.com/f', 1);

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

--
-- Dumping data for table `p47_contact`
--

INSERT INTO `p47_contact` (`contactId`, `userName`, `userMail`, `phone`, `subject`, `question`, `date`) VALUES
(12, 'fdfds', 'ahmedebeid54@gmail.com', '01060786236', 'fdfd', 'fdsfdsf', '2023-06-20 00:30:06'),
(13, 'fdfds', 'ahmedebeid54@gmail.com', '01060786236', 'fdfd', 'fdsfdsf', '2023-06-20 00:32:05'),
(14, 'fdfds', 'ahmedebeid54@gmail.com', '01060786236', 'fdfd', 'fdsfdsf', '2023-06-20 00:32:07'),
(15, 'fdfds', 'ahmedebeid54@gmail.com', '01060786236', 'fdfd', 'fdsfdsf', '2023-06-20 00:33:22'),
(16, 'dssd', 'ahmedebeid47@yahoo.com', '01111297516', 'fsfdsf', 'fdsfdsfdsf', '2023-06-20 00:33:36'),
(17, 'Ahmed Ebeid', 'Ahmed@gg.com', '01060786236', 'fdfd', 'dsdsadsa', '2023-06-20 01:05:18');

-- --------------------------------------------------------

--
-- Table structure for table `p47_dean`
--

CREATE TABLE `p47_dean` (
  `deanId` int(11) NOT NULL,
  `deanName` varchar(40) NOT NULL,
  `deanJobtitle` varchar(60) NOT NULL,
  `deanBio` text NOT NULL,
  `deanWord` text NOT NULL,
  `deanImage` varchar(200) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `p47_dean`
--

INSERT INTO `p47_dean` (`deanId`, `deanName`, `deanJobtitle`, `deanBio`, `deanWord`, `deanImage`, `status`) VALUES
(1, 'ahmed Ebeid', 'Dean Of Faculty Of Commerce And Business Adminstration - Hel', '  Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati non consequuntur aliquid nulla, doloremque pariatur qui ipsam, doloribus, assumenda mollitia rem quidem nobis modi est ad delectus ut maiores blanditiis. Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati non consequuntur aliquid nulla, doloremque pariatur qui ipsam, doloribus, assumenda mollitia rem quidem nobis modi est ad delectus ut maiores blanditiis.\r\n\r\n', '  The faculty of commerce and business administration is one of the leading faculties that was established in 1942 and was called the Higher Institute of Accounting and Financial Sciences. At the undergraduate level, the faculty is considered a pioneer in providing the Business Information Systems (BIS) program, which integrates business and computer sciences. It is the first program at the local and regional levels. The faculty also introduces the FMI Financial Markets and Institutions program, which is also the first program locally and regionally to provide graduates who meet the needs of the market. At the postgraduate level, the faculty has a unique program in hospital management and health economics that grants various scientific degrees (diploma, master, and doctorate) in hospital management, health economics, and health information systems. The faculty is also considered one of the leading faculties in achieving scientific degrees at the undergraduate level in each of the following: Accounting, Business Administration, Economics, Foreign Trade, Political Science, Math, Insurance, Applied Statistics, and Information Systems. Studies for these degrees are taught in both Arabic and English. The faculty also offers academic degrees at the postgraduate level, as it grants the following degrees: Diploma in Human Resources; Accounting and Auditing; Master and Doctorate in Accounting; Business Administration; Economics; Foreign Trade; Political Science; Math Insurance; and applied statistics. he faculty develops a culture of community service and environmental development among students and faculty members by sponsoring seminars and conferences that contribute to raising awareness about global issues (environmental, economic, and health), such as sustainable development, climate change, and the Coronavirus. as well as the faculty, play an important role in encouraging their graduates at different stages to compete in the labor market.\r\n', 'IMG-20181109-WA0023.jpg', 1),
(2, 'PROF AHMED EBEID', 'Dean Of Faculty Of Commerce And Business Adminstration - Hel', 'ffff\r\n', 'hhhh\r\n', 'IMG-20180913-WA0038.jpg', 0);

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
(31, 'img_9014sq-0x600.jpg', 'first', '  We are delighted to invite you to participate in the 5th edition of the Novel Intelligent and Leading Emerging Sciences Conference (NILES2023), which will be held in Egypt from October 21-23, 2023. Registration and Call for Papers are now open.\r\n\r\nNILES is an annual international conference organized by Nile University, Egypt, and all previous runs (2019-2022) was IEEE-sponsored and Scopus-indexed. Our aim is to bring together researchers, engineers, academics, and professionals from the industry to share innovative ideas, present recent research, and explore future trends in various areas of Engineering and Technology.\r\n\r\nDon\'t miss out on this opportunity! Apply before July 15, 2023. We welcome submissions and registrations from all interested parties. You can find the submission link in the information section below, and fill out the form to receive the latest updates and information.\r\n\r\nSubmissions and registrations are very welcome!\r\n\r\nSubmission link: https://niles2023.edas.info/\r\n\r\nFor the latest updates and info, fill out the form: https://forms.office.com/r/ZMnEcTk4Uq\r\n\r\nWebsite: nilesconf.org\r\n\r\nContact Email: niles.conf@nu.edu.eg', 3, '2023-06-20 11:08:09', '2023-06-22', 0),
(40, 'website_1.png', 'first', 'We are delighted to invite you to participate in the 5th edition of the Novel Intelligent and Leading Emerging Sciences Conference (NILES2023), which will be in Egypt from October 21-23, 2023. Registration and Call for Papers are now open.\r\n\r\nNILES is an annual international conference organized by Nile University, Egypt, and all previous runs (2019-2022) was IEEE-sponsored and Scopus-indexed. Our aim is to bring together researchers, engineers, academics, and professionals from the industry to share innovative ideas, present recent research, and explore future trends in various areas of Engineering and Technology.\r\n\r\nDon\'t miss out on this opportunity! Apply before July 15, 2023. We welcome submissions and registrations from all interested parties. You can find the submission link in the information section below, and fill out the form to receive the latest updates and information.\r\n\r\nSubmissions and registrations are very welcome!\r\n\r\nSubmission link: https://niles2023.edas.info/\r\n\r\nFor the latest updates and info, fill out the form: https://forms.office.com/r/ZMnEcTk4Uq\r\n\r\nWebsite: nilesconf.org\r\n\r\nContact Email: niles.conf@nu.edu.eg', 1, '2023-06-19 22:36:39', '2023-06-22', 1),
(42, 'website_1.png', 'The 5th Edition of the Novel Intelligent and Leading Emerging Sciences', 'We are delighted to invite you to participate in the 5th edition of the Novel Intelligent and Leading Emerging Sciences Conference (NILES2023), which will be held in Egypt from October 21-23, 2023. Registration and Call for Papers are now open.\r\n\r\nNILES is an annual international conference organized by Nile University, Egypt, and all previous runs (2019-2022) was IEEE-sponsored and Scopus-indexed. Our aim is to bring together researchers, engineers, academics, and professionals from the industry to share innovative ideas, present recent research, and explore future trends in various areas of Engineering and Technology.\r\n\r\nDon\'t miss out on this opportunity! Apply before July 15, 2023. We welcome submissions and registrations from all interested parties. You can find the submission link in the information section below, and fill out the form to receive the latest updates and information.\r\n\r\nSubmissions and registrations are very welcome!\r\n\r\nSubmission link: https://niles2023.edas.info/\r\n\r\nFor the latest updates and info, fill out the form: https://forms.office.com/r/ZMnEcTk4Uq\r\n\r\nWebsite: nilesconf.org\r\n\r\nContact Email: niles.conf@nu.edu.eg', 1, '2023-06-19 21:57:12', '2023-06-22', 1),
(49, 'chess.jpeg', 'BIS Chess Day', ' International Chess Day is celebrated annually on 20 July, the day the International Chess Federation (FIDE) was founded, in 1924.\r\n\r\nThe idea to celebrate this day as the international chess day was proposed by UNESCO, and it has been celebrated as such since 1966,[1] after it was established by FIDE. FIDE, which has 181 chess federations as its members,[2] organizes chess events and competitions around the world on this day. As recently as 2013, the international chess day was celebrated in 178 countries, according to FIDE President Kirsan Ilyumzhinov.[3] On 12 December, 2019, the UN General Assembly unanimously approved a resolution recognizing the day.[4]\r\n\r\nThe day is celebrated by many of the 605 million regular chess players around the world.[failed verification][5][6][7] A 2012 Yougov poll showed that \"a surprisingly stable 70% of the adult population has played chess at some point during their lives\".[5] This number holds at approximately the same level in countries as diverse as the US, UK, Germany, Russia, and India.[5]', 3, '2023-06-20 17:37:30', '2023-06-30', 0);

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
(456, '51s7NqNrY3L._SL500_.jpg', '2023-06-19 21:26:15', '1', 31, 'jpeg'),
(457, '86b1d8ea8d45404b0961c0a7f2e006b4.jpg', '2023-06-19 21:26:15', '1', 31, 'jpeg'),
(458, '337138759_3496467557343337_5617349370802706507_n.jpg', '2023-06-19 21:26:15', '1', 31, 'jpeg'),
(459, '344565879_989597335362955_2890316742142669334_n.jpg', '2023-06-19 21:26:15', '1', 31, 'jpeg'),
(460, 'agate-banded-blue.jpg', '2023-06-19 21:26:15', '1', 31, 'jpeg'),
(461, 'agate-birthstone.png', '2023-06-19 21:26:15', '1', 31, 'png'),
(462, 'Managerial Accounting Assignment_230524_134905.pdf', '2023-06-19 21:26:15', '1', 31, 'pdf'),
(463, 'Managerial Accounting rules.pdf', '2023-06-19 21:26:15', '1', 31, 'pdf'),
(464, 'Materials Management YouTube.pdf', '2023-06-19 21:26:15', '1', 31, 'pdf'),
(466, '88150125_10220996276991966_5815450735998926848_n.jpg', '2023-06-20 17:43:10', '1', 49, 'jpeg'),
(467, '122196515_10223390973177874_6415010674592308872_n.jpg', '2023-06-20 17:43:10', '1', 49, 'jpeg'),
(468, '122297915_10223376184408164_8257239220234575052_n.jpg', '2023-06-20 17:43:10', '1', 49, 'jpeg'),
(469, '123029442_10223431889400754_801457161316491146_n.jpg', '2023-06-20 17:43:10', '1', 49, 'jpeg'),
(470, '123111480_10223431902081071_8636989861919897614_n.jpg', '2023-06-20 17:43:10', '1', 49, 'jpeg'),
(471, '123165167_10223461075730394_537695539160313063_n.jpg', '2023-06-20 17:43:10', '1', 49, 'jpeg');

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
(33, 'Energy drinks', 'How much sugar is in D’s Energy drinks? ', '2023-06-15 06:45:59', '2023-06-15 03:45:59', ' There are 55 grams per serving. Maintaining a healthy and well-balanced lifestyle is important to D’s Energy Drinks. Our beverages are perfect for athletes and those who maintain an active lifestyle. Check with your doctor before consuming if you have dietary concerns. ', 'created:', 'edited:'),
(34, 'What is an HTML redirect?', 'asdg', '2023-06-19 20:59:18', '2023-06-19 17:59:18', 'An HTML redirect (also sometimes called a meta refresh or meta redirect) is a way of redirecting one HTML page to another in the HTML source code. An HTML redirect includes instructions in the <head> section of the document that tell the web browser to automatically refresh a different page, with an optional time delay before the refresh occurs.\r\n\r\nHTML redirects are the simplest way to redirect a URL. They only involve a small modification to the source code of the old HTML page, and can be made easily and quickly. A HTML redirect will send both human users and search engines to the page you want them to see.\r\n\r\nAdditionally, an HTML redirect lets you set a delay time (in seconds) before the user or search engine bot is sent to the new page. This delay comes in handy if you want to display a brief message before the redirection occurs.', 'created:', 'edited:');

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
(3, 'mido', '39083479_2091004484546860_7946690611527024640_n.jpg', '  Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati non consequuntur aliquid nulla, doloremque pariatur qui ipsam, doloribus, assumenda mollitia rem quidem nobis modi est ad delectus ut maiores blanditiis. Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati non consequuntur aliquid nulla, doloremque pariatur qui ipsam, doloribus, assumenda mollitia rem quidem nobis ', 2, 1),
(4, 'shahdd', '20190223_033149.jpg', '  ipsum dolor sit amet consectetur adipisicing elit. Obcaecati non consequuntur aliquid nulla, doloremque pariatur qui ipsam, doloribus, assumenda mollitia rem quidem nobis modi est ad delectus ut maiores blanditiis. Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati non consequuntur aliquid nulla, doloremque pariatur qui ipsam, doloribus, assumenda mollitia rem quidem nobis mod', 3, 0),
(5, 'ahmed ebeid', '9861783419122955f22f01cc496d2ab290abf671580eab.0.jpeg', ' vice dean', 3, 1),
(6, 'dsfdf', '9890895803984355f22f01cc496d2ab290abf671580eab.0.jpeg', ' fdfdf', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `p47_highboardrole`
--

CREATE TABLE `p47_highboardrole` (
  `Role_Id` int(11) NOT NULL,
  `role_Title` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `p47_highboardrole`
--

INSERT INTO `p47_highboardrole` (`Role_Id`, `role_Title`) VALUES
(2, 'coordinator'),
(3, 'supervisor'),
(4, 'Vice Dean');

-- --------------------------------------------------------

--
-- Table structure for table `p47_news`
--

CREATE TABLE `p47_news` (
  `newsId` int(11) NOT NULL,
  `newsTitle` varchar(50) CHARACTER SET utf8 NOT NULL,
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
(8, 'AHMED', 'pngaaa.com-18405 (1).png', 'We are delighted to invite you to participate in the 5th edition of the Novel Intelligent and Leading Emerging Sciences Conference (NILES2023), which will be held in Egypt from October 21-23, 2023. Registration and Call for Papers are now open. NILES is an annual international conference organized by Nile University, Egypt, and all previous runs (2019-2022) was IEEE-sponsored and Scopus-indexed. Our aim is to bring together researchers, engineers, academics, and professionals from the industry to share innovative ideas, present recent research, and explore future trends in various areas of Engineering and Technology. Don\'t miss out on this opportunity! Apply before July 15, 2023. We welcome submissions and registrations from all interested parties. You can find the submission link in the information section below, and fill out the form to receive the latest updates and information. Submissions and registrations are very welcome! Submission link: https://niles2023.edas.info/ For the latest updates and info, fill out the form: https://forms.office.com/r/ZMnEcTk4Uq Website: nilesconf.org Contact Email: niles.conf@nu.edu.eg\r\n\r\n', 0, '2023-05-18', '2023-06-20 01:00:22', 1),
(9, '??????', 'bg2.png', 'fdgdg', 1, '2023-05-03', '2023-06-16 16:39:58', 1),
(10, 'mazo', '86b1d8ea8d45404b0961c0a7f2e006b4.jpg', ' fdgdg', 1, '2000-10-01', '2023-06-19 22:29:26', 1);

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
(55, 'pngaaa.com-18405.png', '2023-06-16 17:18:03', 8, 'png'),
(56, 'Questions.pdf', '2023-06-16 17:18:03', 8, 'pdf'),
(57, 'Standard Business Plan G.pdf', '2023-06-16 17:18:03', 8, 'pdf'),
(58, 'agate-banded-blue.jpg', '2023-06-16 17:18:30', 8, 'jpeg'),
(59, 'agate-birthstone.png', '2023-06-16 17:18:30', 8, 'png'),
(60, '344565879_989597335362955_2890316742142669334_n.jpg', '2023-06-16 17:21:23', 8, 'jpeg'),
(61, 'All Questions at all chapters.pdf', '2023-06-16 17:21:23', 8, 'pdf'),
(62, 'be2943fb-c076-4df1-8a46-34e834c39a4f.jpeg', '2023-06-16 17:21:23', 8, 'jpeg'),
(64, 'braum_poro_by_captaintanuksan_d8xs498-fullview.jpg', '2023-06-16 17:33:40', 10, 'jpeg'),
(65, 'Braum-Poro-Pink-Ceramic-Mugs-Coffee-Cups-Milk-Tea-Mug-Poro-Legends-Cute-New-Adorable-Hand.jpg', '2023-06-16 17:33:40', 10, 'jpeg'),
(66, 'download.jpeg', '2023-06-16 17:33:40', 10, 'jpeg');

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
(2, 'first semster', 'Second', 2024, 5, 'download-pdf-ebooks.org-wq-9369.pdf', 3, '2023-06-19 18:35:41', 1),
(3, 'first semster ', 'Second', 2022, 2, 'hos_ahmedh-O-27092022013758.pdf', 4, '2023-06-19 18:38:11', 1),
(4, 'rfhjj', 'First', 2022, 3, 'Managerial Accounting Assignment_230524_134905.pdf', 2, '2023-06-19 18:52:23', 1),
(5, 'ahmed midp', 'Second', 2024, 3, 'Questions.pdf', 1, '2023-06-19 18:50:38', 1),
(6, 'first semster', 'Second', 2024, 5, 'download-pdf-ebooks.org-wq-9369.pdf', 5, '2023-06-19 18:35:41', 1),
(7, 'first semster ', 'Second', 2022, 2, 'hos_ahmedh-O-27092022013758.pdf', 3, '2023-06-19 18:38:11', 1),
(8, 'rfhjj', 'First', 2022, 3, 'Managerial Accounting Assignment_230524_134905.pdf', 4, '2023-06-19 18:52:23', 1),
(9, 'ahmed midp', 'Second', 2024, 2, 'Questions.pdf', 1, '2023-06-19 18:50:38', 1),
(10, 'rfhjj', 'First', 2022, 3, 'Managerial Accounting Assignment_230524_134905.pdf', 5, '2023-06-20 01:11:50', 1);

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
(11, '3c8f67c12b1ec694848d1ebfd1d62d2c.0.jpeg', '2023-06-17 01:30:56', 19, 'jpeg'),
(13, '55f22f01cc496d2ab290abf671580eab.0.jpeg', '2023-06-17 01:30:56', 19, 'jpeg'),
(14, '083 - xXpLiMh.jpg', '2023-06-17 01:30:56', 19, 'jpeg'),
(15, '437cf9424835228dcc33f973349bee8d.0.jpeg', '2023-06-17 01:30:56', 19, 'jpeg'),
(17, '20180729_150429.jpg', '2023-06-17 01:30:56', 19, 'jpeg'),
(18, '20190223_033136.jpg', '2023-06-17 01:30:56', 19, 'jpeg'),
(19, '20190223_033149.jpg', '2023-06-17 01:30:56', 19, 'jpeg'),
(23, 'download (2).jpg', '2023-06-17 20:08:59', 15, 'jpeg'),
(24, 'download (3).jpg', '2023-06-17 20:08:59', 15, 'jpeg'),
(25, 'download.jpeg', '2023-06-17 20:08:59', 15, 'jpeg'),
(26, 'download.jpg', '2023-06-17 20:08:59', 15, 'jpeg');

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
(3, 'sff', 'ggg', '7676078911543braum_poro_by_captaintanuksan_d8xs498-fullview.jpg', 'ggfg', 0),
(4, 'sff', 'ggg', '3304878984850download.jpeg', ' ggfg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `p47_studentacts`
--

CREATE TABLE `p47_studentacts` (
  `activityCode` int(11) NOT NULL,
  `activityName` varchar(30) NOT NULL,
  `activityLogo` varchar(300) NOT NULL,
  `activityBio` varchar(500) NOT NULL,
  `activityAcheivement` varchar(500) NOT NULL,
  `activityLink` varchar(200) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `p47_studentacts`
--

INSERT INTO `p47_studentacts` (`activityCode`, `activityName`, `activityLogo`, `activityBio`, `activityAcheivement`, `activityLink`, `status`) VALUES
(15, 'hhhh', '9d78f1951b3f04eadffd1727fd2a079b.0.jpeg', 'hhh', ' hh', 'http://msp-cu.rf.gd/php/aboutus.php', 1),
(19, 'ahmed', '785c2f3fd41386ddc72de4ec67d5c2d3.0.jpeg', ' mido', ' mido', 'http://msp-cu.rf.gd/php/aboutus.php', 1);

-- --------------------------------------------------------

--
-- Table structure for table `p47_stuhonourboard`
--

CREATE TABLE `p47_stuhonourboard` (
  `honBoardId` int(11) NOT NULL,
  `honBoardTitle` varchar(40) NOT NULL,
  `description` varchar(500) NOT NULL,
  `mainPhoto` varchar(200) NOT NULL,
  `year` int(30) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'pennding or not'
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
  MODIFY `DoctorCode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `albumId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `p47_albumfile`
--
ALTER TABLE `p47_albumfile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

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
  MODIFY `stuId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `p47_bisnumbers`
--
ALTER TABLE `p47_bisnumbers`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `p47_careers`
--
ALTER TABLE `p47_careers`
  MODIFY `careerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `p47_contact`
--
ALTER TABLE `p47_contact`
  MODIFY `contactId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `p47_dean`
--
ALTER TABLE `p47_dean`
  MODIFY `deanId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `p47_event`
--
ALTER TABLE `p47_event`
  MODIFY `eventId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `p47_eventcategory`
--
ALTER TABLE `p47_eventcategory`
  MODIFY `categoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `p47_eventfile`
--
ALTER TABLE `p47_eventfile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=472;

--
-- AUTO_INCREMENT for table `p47_faqs`
--
ALTER TABLE `p47_faqs`
  MODIFY `faqId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `p47_faqss`
--
ALTER TABLE `p47_faqss`
  MODIFY `faqId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `p47_highboard`
--
ALTER TABLE `p47_highboard`
  MODIFY `member_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `p47_highboardrole`
--
ALTER TABLE `p47_highboardrole`
  MODIFY `Role_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `p47_news`
--
ALTER TABLE `p47_news`
  MODIFY `newsId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `p47_newsfile`
--
ALTER TABLE `p47_newsfile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `p47_schedules`
--
ALTER TABLE `p47_schedules`
  MODIFY `ScheduleId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `p47_scheduletype`
--
ALTER TABLE `p47_scheduletype`
  MODIFY `scheduleTypeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `p47_stuactsimgs`
--
ALTER TABLE `p47_stuactsimgs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `p47_studentachievement`
--
ALTER TABLE `p47_studentachievement`
  MODIFY `achievementId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `p47_studentacts`
--
ALTER TABLE `p47_studentacts`
  MODIFY `activityCode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `p47_stuhonourboard`
--
ALTER TABLE `p47_stuhonourboard`
  MODIFY `honBoardId` int(11) NOT NULL AUTO_INCREMENT;

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
  ADD CONSTRAINT `p47_beststudents_ibfk_1` FOREIGN KEY (`boardId`) REFERENCES `p47_stuhonourboard` (`honBoardId`);

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
