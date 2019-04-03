-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2019 at 07:28 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bigscreen`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bank`
--

CREATE TABLE `tbl_bank` (
  `bid` int(11) NOT NULL,
  `bank_name` varchar(50) NOT NULL,
  `banktype` varchar(10) NOT NULL,
  `account_no` varchar(16) NOT NULL,
  `card_no` varchar(16) NOT NULL,
  `month` varchar(10) NOT NULL,
  `year` int(11) NOT NULL,
  `cvv` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_bank`
--

INSERT INTO `tbl_bank` (`bid`, `bank_name`, `banktype`, `account_no`, `card_no`, `month`, `year`, `cvv`, `name`, `status`) VALUES
(1, 'FEDERAL BANK', 'FDC', '11740100106648', '11740100106648', 'Nov', 2022, 123, 'AJIL SUNNY', 1),
(2, 'SBI', 'ODC', '9630852074107894', '9630852074107894', 'May', 2023, 789, 'AMAL SUNNY', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_day`
--

CREATE TABLE `tbl_day` (
  `did` int(11) NOT NULL,
  `dname` varchar(50) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_day`
--

INSERT INTO `tbl_day` (`did`, `dname`, `status`) VALUES
(1, 'Monday', 0),
(2, 'Tuesday', 0),
(3, 'Wednesday', 0),
(4, 'Thursday', 0),
(5, 'Friday', 0),
(6, 'Saturday', 0),
(7, 'Sunday', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_details`
--

CREATE TABLE `tbl_details` (
  `regid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `did` int(11) NOT NULL,
  `place` varchar(50) NOT NULL,
  `pin` bigint(20) NOT NULL,
  `profile_pic` text NOT NULL,
  `cpic` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_details`
--

INSERT INTO `tbl_details` (`regid`, `name`, `email`, `phone`, `did`, `place`, `pin`, `profile_pic`, `cpic`) VALUES
(1, 'admin', 'admin', '123456789', 0, '0', 0, '0', '0'),
(2, 'Ajil Sunny', 'ajilsunny007@gmail.com', '8593967684', 2, 'kiliyanthara', 670706, '1552406856IMG_8800 (2).JPG', '1551848513Class Diagram.png'),
(4, 'ALAN', 'alan@gmail.com', '7410258963', 1, 'sreekandapuram', 670705, 'profilepic.png', '1551867465Sequence Diagram.png'),
(7, 'APPU', 'appu@gmail.com', '7410258963', 2, 'kiliyanthara', 963258, 'profilepic.png', '1552233796'),
(3, 'Jithu Benny', 'jithu@gmail.com', '8593967684', 1, '`manikadavu', 670706, '1554256626IMG_20190206_100028.jpg', '1551849444Object Diagram.png'),
(5, 'JOBIN', 'jobin@gmail.com', '9638520147', 5, 'koovapally', 741852, 'profilepic.png', '1551941005Activity Diagram.png'),
(6, 'RONIYA', 'roniya@gmail.com', '7410852963', 1, 'chemperi', 963852, 'profilepic.png', '1551942180State Chart Diagram.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_district`
--

CREATE TABLE `tbl_district` (
  `did` int(11) NOT NULL,
  `dname` varchar(50) NOT NULL,
  `sid` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_district`
--

INSERT INTO `tbl_district` (`did`, `dname`, `sid`, `status`) VALUES
(5, 'Kasaragod', 13, 1),
(4, 'Kannur', 13, 1),
(3, 'Idukki', 13, 1),
(2, 'Ernakulam', 13, 1),
(1, 'Alappuzha', 13, 1),
(6, 'Kollam', 13, 1),
(7, 'Kottayam', 13, 1),
(8, 'Kozhikode', 13, 1),
(9, 'Malappuram', 13, 1),
(10, 'Palakkad', 13, 1),
(11, 'Pathanamthitta', 13, 1),
(12, 'Thiruvananthapuram', 13, 1),
(13, 'Thrissur', 13, 1),
(14, 'Wayanad', 13, 1),
(15, 'Bagalkot', 12, 1),
(16, 'Bangalore', 12, 1),
(17, 'Bangalore Rural', 12, 1),
(18, 'Belgaum', 12, 1),
(19, 'Bellary', 12, 1),
(20, 'Bidar', 12, 1),
(21, 'Bijapur', 12, 1),
(22, 'Chamarajanagar', 12, 1),
(23, 'Chikkaballapura', 12, 1),
(24, 'Chikmagalur', 12, 1),
(25, 'Chitradurga', 12, 1),
(26, 'Dakshina Kannada', 12, 1),
(27, 'Davanagere', 12, 1),
(28, 'Dharwad', 12, 1),
(29, 'Gadag', 12, 1),
(30, 'Gulbarga', 12, 1),
(31, 'Hassan', 12, 1),
(32, 'Haveri', 12, 1),
(33, 'Kodagu', 12, 1),
(34, 'Kolar', 12, 1),
(35, 'Koppal', 12, 1),
(36, 'Mandya', 12, 1),
(37, 'Mysore', 12, 1),
(38, 'Raichur', 12, 1),
(39, 'Ramanagara', 12, 1),
(40, 'Shimoga', 12, 1),
(41, 'Tumkur', 12, 1),
(42, 'Udupi', 12, 1),
(43, 'Uttara Kannada', 12, 1),
(44, 'Yadgir', 12, 1),
(45, 'Anantapur', 1, 1),
(46, 'Chittoor', 1, 1),
(47, 'East Godavari', 1, 1),
(48, 'Guntur', 1, 1),
(49, 'Krishna', 1, 1),
(50, 'Kurnool', 1, 1),
(51, 'Prakasam', 1, 1),
(52, 'Sri Potti Sriramulu Nellore', 1, 1),
(53, 'Srikakulam', 1, 1),
(54, 'Visakhapatnam', 1, 1),
(55, 'Vizianagaram', 1, 1),
(56, 'West Godavari', 1, 1),
(57, 'YSR (Kadapa)', 1, 1),
(58, 'Anjaw', 2, 1),
(59, 'Changlang', 2, 1),
(60, 'Dibang Valley', 2, 1),
(61, 'East Kameng', 2, 1),
(62, 'East Siang', 2, 1),
(63, 'Kurung Kumey', 2, 1),
(64, 'Lohit', 2, 1),
(65, 'Longding', 2, 1),
(66, 'Lower Dibang Valley', 2, 1),
(67, 'Lower Subansiri', 2, 1),
(68, 'Papum Pare', 2, 1),
(69, 'Tawang', 2, 1),
(70, 'Tirap', 2, 1),
(71, 'Upper Siang', 2, 1),
(72, 'Upper Subansiri', 2, 1),
(73, 'West Kameng', 2, 1),
(74, 'West Siang', 2, 1),
(75, 'Baksa', 3, 1),
(76, 'Barpeta', 3, 1),
(77, 'Bongaigaon', 3, 1),
(78, 'Cachar', 3, 1),
(79, 'Chirang', 3, 1),
(80, 'Darrang', 3, 1),
(81, 'Dhemaji', 3, 1),
(82, 'Dhubri', 3, 1),
(83, 'Dibrugarh', 3, 1),
(84, 'Dima Hasao', 3, 1),
(85, 'Goalpara', 3, 1),
(86, 'Golaghat', 3, 1),
(87, 'Hailakandi', 3, 1),
(88, 'Jorhat', 3, 1),
(89, 'Kamrup', 3, 1),
(90, 'Kamrup Metropolitan', 3, 1),
(91, 'Karbi Anglong', 3, 1),
(92, 'Karimganj', 3, 1),
(93, 'Kokrajhar', 3, 1),
(94, 'Lakhimpur', 3, 1),
(95, 'Morigaon', 3, 1),
(96, 'Nagaon', 3, 1),
(97, 'Nalbari', 3, 1),
(98, 'Sivasagar', 3, 1),
(99, 'Sonitpur', 3, 1),
(100, 'Tinsukia', 3, 1),
(101, 'Udalguri', 3, 1),
(102, 'Biswanath', 3, 1),
(103, 'Charaideo', 3, 1),
(104, 'Hojai', 3, 1),
(105, 'Majuli', 3, 1),
(106, 'South Salamara-Mankachar', 3, 1),
(107, 'West Karbi Anglong', 3, 1),
(108, 'Araria', 4, 1),
(109, 'Arwal', 4, 1),
(110, 'Aurangabad', 4, 1),
(111, 'Banka', 4, 1),
(112, 'Begusarai', 4, 1),
(113, 'Bhagalpur', 4, 1),
(114, 'Bhojpur', 4, 1),
(115, 'Buxar', 4, 1),
(116, 'Darbhanga', 4, 1),
(117, 'East Champaran', 4, 1),
(118, 'Gaya', 4, 1),
(119, 'Gopalganj', 4, 1),
(120, 'Jamui', 4, 1),
(121, 'Jehanabad', 4, 1),
(122, 'Kaimur', 4, 1),
(123, 'Katihar', 4, 1),
(124, 'Khagaria', 4, 1),
(125, 'Kishanganj', 4, 1),
(126, 'Lakhisarai', 4, 1),
(127, 'Madhepura', 4, 1),
(128, 'Madhubani', 4, 1),
(129, 'Munger', 4, 1),
(130, 'Muzaffarpur', 4, 1),
(131, 'Nalanda', 4, 1),
(132, 'Nawada', 4, 1),
(133, 'Patna', 4, 1),
(134, 'Purnia', 4, 1),
(135, 'Rohtas', 4, 1),
(136, 'Saharsa', 4, 1),
(137, 'Samastipur', 4, 1),
(138, 'Saran', 4, 1),
(139, 'Sheikhpura', 4, 1),
(140, 'Sheohar', 4, 1),
(141, 'Sitamarhi', 4, 1),
(142, 'Siwan', 4, 1),
(143, 'Supaul', 4, 1),
(144, 'Vaishali', 4, 1),
(145, 'West Champaran', 4, 1),
(146, 'Balod', 5, 1),
(147, 'Baloda Bazar', 5, 1),
(148, 'Balrampur', 5, 1),
(149, 'Bastar', 5, 1),
(150, 'Bemetara', 5, 1),
(151, 'Bijapur', 5, 1),
(152, 'Bilaspur', 5, 1),
(153, 'Dantewada', 5, 1),
(154, 'Dhamtari', 5, 1),
(155, 'Durg', 5, 1),
(156, 'Gariaband', 5, 1),
(157, 'Janjgir Champa', 5, 1),
(158, 'Jashpur', 5, 1),
(159, 'Kabirdham', 5, 1),
(160, 'Kanker', 5, 1),
(161, 'Kondagaon', 5, 1),
(162, 'Korba', 5, 1),
(163, 'Koriya', 5, 1),
(164, 'Mahasamund', 5, 1),
(165, 'Mungeli', 5, 1),
(166, 'Narayanpur', 5, 1),
(167, 'Raigarh', 5, 1),
(168, 'Raipur', 5, 1),
(169, 'Rajnandgaon', 5, 1),
(170, 'Sukma', 5, 1),
(171, 'Surajpur', 5, 1),
(172, 'Surguja', 5, 1),
(173, 'North Goa', 6, 1),
(174, 'South Goa', 6, 1),
(175, 'Ahmedabad', 7, 1),
(176, 'Amreli', 7, 1),
(177, 'Anand', 7, 1),
(178, 'Aravalli', 7, 1),
(179, 'Banaskantha', 7, 1),
(180, 'Botad', 7, 1),
(181, 'Bharuch', 7, 1),
(182, 'Bhavnagar', 7, 1),
(183, 'Chhota Udaipur', 7, 1),
(184, 'Dahod', 7, 1),
(185, 'Devbhoomi Dwarka', 7, 1),
(186, 'Gandhinagar', 7, 1),
(187, 'Gir Somnath', 7, 1),
(188, 'Jamnagar', 7, 1),
(189, 'Junagadh', 7, 1),
(190, 'Kheda', 7, 1),
(191, 'Kutch', 7, 1),
(192, 'Mahisagar', 7, 1),
(193, 'Mahesana', 7, 1),
(194, 'Morbi', 7, 1),
(195, 'Narmada', 7, 1),
(196, 'Navsari', 7, 1),
(197, 'Panchmahal', 7, 1),
(198, 'Patan', 7, 1),
(199, 'Porbandar', 7, 1),
(200, 'Rajkot', 7, 1),
(201, 'Sabarkantha', 7, 1),
(202, 'Surat', 7, 1),
(203, 'Surendranagar', 7, 1),
(204, 'Tapi', 7, 1),
(205, 'The Dangs', 7, 1),
(206, 'Vadodara', 7, 1),
(207, 'Valsad', 7, 1),
(208, 'Ambala', 8, 1),
(209, 'Bhiwani', 8, 1),
(210, 'Faridabad', 8, 1),
(211, 'Fatehabad', 8, 1),
(212, 'Gurgaon', 8, 1),
(213, 'Hisar', 8, 1),
(214, 'Jhajjar', 8, 1),
(215, 'Jind', 8, 1),
(216, 'Kaithal', 8, 1),
(217, 'Karnal', 8, 1),
(218, 'Kurukshetra', 8, 1),
(219, 'Mahendragarh', 8, 1),
(220, 'Mewat', 8, 1),
(221, 'Palwal', 8, 1),
(222, 'Panchkula', 8, 1),
(223, 'Panipat', 8, 1),
(224, 'Rewari', 8, 1),
(225, 'Rohtak', 8, 1),
(226, 'Sirsa', 8, 1),
(227, 'Sonipat', 8, 1),
(228, 'Yamunanagar', 8, 1),
(229, 'Charkhi Dadri', 8, 1),
(230, 'Bilaspur', 9, 1),
(231, 'Chamba', 9, 1),
(232, 'Hamirpur', 9, 1),
(233, 'Kangra', 9, 1),
(234, 'Kinnaur', 9, 1),
(235, 'Kullu', 9, 1),
(236, 'Lahaul and Spiti', 9, 1),
(237, 'Mandi', 9, 1),
(238, 'Shimla', 9, 1),
(239, 'Sirmaur', 9, 1),
(240, 'Solan', 9, 1),
(241, 'Una', 9, 1),
(242, 'Anantnag', 10, 1),
(243, 'Badgam', 10, 1),
(244, 'Bandipora', 10, 1),
(245, 'Baramulla', 10, 1),
(246, 'Doda', 10, 1),
(247, 'Ganderbal', 10, 1),
(248, 'Jammu', 10, 1),
(249, 'Kargil', 10, 1),
(250, 'Kathua', 10, 1),
(251, 'Kishtwar', 10, 1),
(252, 'Kulgam', 10, 1),
(253, 'Kupwara', 10, 1),
(254, 'Leh', 10, 1),
(255, 'Poonch', 10, 1),
(256, 'Pulwama', 10, 1),
(257, 'Rajouri', 10, 1),
(258, 'Ramban', 10, 1),
(259, 'Reasi', 10, 1),
(260, 'Samba', 10, 1),
(261, 'Shopian', 10, 1),
(262, 'Srinagar', 10, 1),
(263, 'Udhampur', 10, 1),
(264, 'Bokaro', 11, 1),
(265, 'Chatra', 11, 1),
(266, 'Deoghar', 11, 1),
(267, 'Dhanbad', 11, 1),
(268, 'Dumka', 11, 1),
(269, 'East Singhbhum', 11, 1),
(270, 'Garhwa', 11, 1),
(271, 'Giridih', 11, 1),
(272, 'Godda', 11, 1),
(273, 'Gumla', 11, 1),
(274, 'Hazaribagh', 11, 1),
(275, 'Jamtara', 11, 1),
(276, 'Khunti', 11, 1),
(277, 'Koderma', 11, 1),
(278, 'Latehar', 11, 1),
(279, 'Lohardaga', 11, 1),
(280, 'Pakur', 11, 1),
(281, 'Palamu', 11, 1),
(282, 'Ramgarh', 11, 1),
(283, 'Ranchi', 11, 1),
(284, 'Sahibganj', 11, 1),
(285, 'Saraikela Kharsawan', 11, 1),
(286, 'Simdega', 11, 1),
(287, 'West Singhbhum', 11, 1),
(288, 'Agar Malwa', 14, 1),
(289, 'Alirajpur', 14, 1),
(290, 'Anuppur', 14, 1),
(291, 'Ashoknagar', 14, 1),
(292, 'Balaghat', 14, 1),
(293, 'Barwani', 14, 1),
(294, 'Betul', 14, 1),
(295, 'Bhind', 14, 1),
(296, 'Bhopal', 14, 1),
(297, 'Burhanpur', 14, 1),
(298, 'Chhatarpur', 14, 1),
(299, 'Chhindwara', 14, 1),
(300, 'Damoh', 14, 1),
(301, 'Datia', 14, 1),
(302, 'Dewas', 14, 1),
(303, 'Dhar', 14, 1),
(304, 'Dindori', 14, 1),
(305, 'East Nimar', 14, 1),
(306, 'Guna', 14, 1),
(307, 'Gwalior', 14, 1),
(308, 'Harda', 14, 1),
(309, 'Hoshangabad', 14, 1),
(310, 'Indore', 14, 1),
(311, 'Jabalpur', 14, 1),
(312, 'Jhabua', 14, 1),
(313, 'Katni', 14, 1),
(314, 'Mandla', 14, 1),
(315, 'Mandsaur', 14, 1),
(316, 'Morena', 14, 1),
(317, 'Narsinghpur', 14, 1),
(318, 'Neemuch', 14, 1),
(319, 'Panna', 14, 1),
(320, 'Raisen', 14, 1),
(321, 'Rajgarh', 14, 1),
(322, 'Ratlam', 14, 1),
(323, 'Rewa', 14, 1),
(324, 'Sagar', 14, 1),
(325, 'Satna', 14, 1),
(326, 'Sehore', 14, 1),
(327, 'Seoni', 14, 1),
(328, 'Shahdol', 14, 1),
(329, 'Shajapur', 14, 1),
(330, 'Sheopur', 14, 1),
(331, 'Shivpuri', 14, 1),
(332, 'Sidhi', 14, 1),
(333, 'Singrauli', 14, 1),
(334, 'Tikamgarh', 14, 1),
(335, 'Ujjain', 14, 1),
(336, 'Umaria', 14, 1),
(337, 'Vidisha', 14, 1),
(338, 'West Nimar', 14, 1),
(339, 'Ahmednagar', 15, 1),
(340, 'Akola', 15, 1),
(341, 'Amravati', 15, 1),
(342, 'Aurangabad', 15, 1),
(343, 'Beed', 15, 1),
(344, 'Bhandara', 15, 1),
(345, 'Buldhana', 15, 1),
(346, 'Chandrapur', 15, 1),
(347, 'Dhule', 15, 1),
(348, 'Gadchiroli', 15, 1),
(349, 'Gondia', 15, 1),
(350, 'Hingoli', 15, 1),
(351, 'Jalgaon', 15, 1),
(352, 'Jalna', 15, 1),
(353, 'Kolhapur', 15, 1),
(354, 'Latur', 15, 1),
(355, 'Mumbai City', 15, 1),
(356, 'Mumbai Suburban', 15, 1),
(357, 'Nagpur', 15, 1),
(358, 'Nanded', 15, 1),
(359, 'Nandurbar', 15, 1),
(360, 'Nashik', 15, 1),
(361, 'Osmanabad', 15, 1),
(362, 'Parbhani', 15, 1),
(363, 'Pune', 15, 1),
(364, 'Raigad', 15, 1),
(365, 'Ratnagiri', 15, 1),
(366, 'Sangli', 15, 1),
(367, 'Satara', 15, 1),
(368, 'Sindhudurg', 15, 1),
(369, 'Solapur', 15, 1),
(370, 'Thane', 15, 1),
(371, 'Wardha', 15, 1),
(372, 'Washim', 15, 1),
(373, 'Yavatmal', 15, 1),
(374, 'Palghar', 15, 1),
(375, 'Bishnupur', 16, 1),
(376, 'Chandel', 16, 1),
(377, 'Churachandpur', 16, 1),
(378, 'Imphal East', 16, 1),
(379, 'Imphal West', 16, 1),
(380, 'Senapati', 16, 1),
(381, 'Tamenglong', 16, 1),
(382, 'Thoubal', 16, 1),
(383, 'Ukhrul', 16, 1),
(384, 'Jiribam', 16, 1),
(385, 'Kangpokpi', 16, 1),
(386, 'Kakching district', 16, 1),
(387, 'Tengnoupal', 16, 1),
(388, 'Kamjong', 16, 1),
(389, 'Noney', 16, 1),
(390, 'Pherzawl', 16, 1),
(391, 'East Garo Hills', 17, 1),
(392, 'West Garo Hills', 17, 1),
(393, 'North Garo Hills', 17, 1),
(394, 'South Garo Hills', 17, 1),
(395, 'South West Garo Hills', 17, 1),
(396, 'East Jaintia Hills', 17, 1),
(397, 'West Jaintia Hills', 17, 1),
(398, 'East Khasi Hills', 17, 1),
(399, 'South West Khasi Hills', 17, 1),
(400, 'West Khasi Hills', 17, 1),
(401, 'Ri-Bhoi', 17, 1),
(402, 'Aizawl', 18, 1),
(403, 'Champhai', 18, 1),
(404, 'Kolasib', 18, 1),
(405, 'Lawngtlai', 18, 1),
(406, 'Lunglei', 18, 1),
(407, 'Mamit', 18, 1),
(408, 'Saiha', 18, 1),
(409, 'Serchhip', 18, 1),
(410, 'Dimapur', 19, 1),
(411, 'Kiphire', 19, 1),
(412, 'Kohima', 19, 1),
(413, 'Longleng', 19, 1),
(414, 'Mokokchung', 19, 1),
(415, 'Mon', 19, 1),
(416, 'Peren', 19, 1),
(417, 'Phek', 19, 1),
(418, 'Tuensang', 19, 1),
(419, 'Wokha', 19, 1),
(420, 'Zunheboto', 19, 1),
(421, 'Angul', 20, 1),
(422, 'Balangir', 20, 1),
(423, 'Baleshwar', 20, 1),
(424, 'Bargarh', 20, 1),
(425, 'Bhadrak', 20, 1),
(426, 'Boudh', 20, 1),
(427, 'Cuttack', 20, 1),
(428, 'Debagarh', 20, 1),
(429, 'Dhenkanal', 20, 1),
(430, 'Gajapati', 20, 1),
(431, 'Ganjam', 20, 1),
(432, 'Jagatsinghpur', 20, 1),
(433, 'Jajpur', 20, 1),
(434, 'Jharsuguda', 20, 1),
(435, 'Kalahandi', 20, 1),
(436, 'Kandhamal', 20, 1),
(437, 'Kendrapara', 20, 1),
(438, 'Kendujhar', 20, 1),
(439, 'Khordha', 20, 1),
(440, 'Koraput', 20, 1),
(441, 'Malkangiri', 20, 1),
(442, 'Mayurbhanj', 20, 1),
(443, 'Nabarangapur', 20, 1),
(444, 'Nayagarh', 20, 1),
(445, 'Nuapada', 20, 1),
(446, 'Puri', 20, 1),
(447, 'Rayagada', 20, 1),
(448, 'Sambalpur', 20, 1),
(449, 'Subarnapur', 20, 1),
(450, 'Sundergarh', 20, 1),
(451, 'Amritsar', 21, 1),
(452, 'Barnala', 21, 1),
(453, 'Bathinda', 21, 1),
(454, 'Fazilka', 21, 1),
(455, 'Faridkot', 21, 1),
(456, 'Fatehgarh Sahib', 21, 1),
(457, 'Firozpur', 21, 1),
(458, 'Gurdaspur', 21, 1),
(459, 'Hoshiarpur', 21, 1),
(460, 'Jalandhar', 21, 1),
(461, 'Kapurthala', 21, 1),
(462, 'Ludhiana', 21, 1),
(463, 'Mansa', 21, 1),
(464, 'Moga', 21, 1),
(465, 'Mohali', 21, 1),
(466, 'Muktsar', 21, 1),
(467, 'Pathankot', 21, 1),
(468, 'Patiala', 21, 1),
(469, 'Rupnagar', 21, 1),
(470, 'Sangrur', 21, 1),
(471, 'Shahid Bhagat Singh Nagar', 21, 1),
(472, 'Tarn Taran', 21, 1),
(473, 'Ajmer', 22, 1),
(474, 'Alwar', 22, 1),
(475, 'Banswara', 22, 1),
(476, 'Baran', 22, 1),
(477, 'Barmer', 22, 1),
(478, 'Bharatpur', 22, 1),
(479, 'Bhilwara', 22, 1),
(480, 'Bikaner', 22, 1),
(481, 'Bundi', 22, 1),
(482, 'Chittaurgarh', 22, 1),
(483, 'Churu', 22, 1),
(484, 'Dausa', 22, 1),
(485, 'Dhaulpur', 22, 1),
(486, 'Dungarpur', 22, 1),
(487, 'Ganganagar', 22, 1),
(488, 'Hanumangarh', 22, 1),
(489, 'Jaipur', 22, 1),
(490, 'Jaisalmer', 22, 1),
(491, 'Jalor', 22, 1),
(492, 'Jhalawar', 22, 1),
(493, 'Jhunjhunun', 22, 1),
(494, 'Jodhpur', 22, 1),
(495, 'Karauli', 22, 1),
(496, 'Kota', 22, 1),
(497, 'Nagaur', 22, 1),
(498, 'Pali', 22, 1),
(499, 'Pratapgarh', 22, 1),
(500, 'Rajsamand', 22, 1),
(501, 'Sawai Madhopur', 22, 1),
(502, 'Sikar', 22, 1),
(503, 'Sirohi', 22, 1),
(504, 'Tonk', 22, 1),
(505, 'Udaipur', 22, 1),
(506, 'East Sikkim', 23, 1),
(507, 'North Sikkim', 23, 1),
(508, 'South Sikkim', 23, 1),
(509, 'West Sikkim', 23, 1),
(510, 'Ariyalur', 24, 1),
(511, 'Chennai', 24, 1),
(512, 'Coimbatore', 24, 1),
(513, 'Cuddalore', 24, 1),
(514, 'Dharmapuri', 24, 1),
(515, 'Dindigul', 24, 1),
(516, 'Erode', 24, 1),
(517, 'Kanchipuram', 24, 1),
(518, 'Kanyakumari', 24, 1),
(519, 'Karur', 24, 1),
(520, 'Krishnagiri', 24, 1),
(521, 'Madurai', 24, 1),
(522, 'Nagapattinam', 24, 1),
(523, 'Namakkal', 24, 1),
(524, 'Perambalur', 24, 1),
(525, 'Pudukkottai', 24, 1),
(526, 'Ramanathapuram', 24, 1),
(527, 'Salem', 24, 1),
(528, 'Sivaganga', 24, 1),
(529, 'Thanjavur', 24, 1),
(530, 'The Nilgiris', 24, 1),
(531, 'Theni', 24, 1),
(532, 'Thiruvallur', 24, 1),
(533, 'Thiruvarur', 24, 1),
(534, 'Thoothukudi', 24, 1),
(535, 'Tiruchirappalli', 24, 1),
(536, 'Tirunelveli', 24, 1),
(537, 'Tirupur', 24, 1),
(538, 'Tiruvannamalai', 24, 1),
(539, 'Vellore', 24, 1),
(540, 'Viluppuram', 24, 1),
(541, 'Virudhunagar', 24, 1),
(542, 'Dhalai', 26, 1),
(543, 'Gomati', 26, 1),
(544, 'Khowai', 26, 1),
(545, 'North Tripura', 26, 1),
(546, 'Sepahijala', 26, 1),
(547, 'South Tripura', 26, 1),
(548, 'Unakoti', 26, 1),
(549, 'West Tripura', 26, 1),
(550, 'Agra', 27, 1),
(551, 'Aligarh', 27, 1),
(552, 'Allahabad', 27, 1),
(553, 'Ambedkar Nagar', 27, 1),
(554, 'Amethi', 27, 1),
(555, 'Amroha', 27, 1),
(556, 'Auraiya', 27, 1),
(557, 'Azamgarh', 27, 1),
(558, 'Baghpat', 27, 1),
(559, 'Bahraich', 27, 1),
(560, 'Ballia', 27, 1),
(561, 'Balrampur', 27, 1),
(562, 'Banda', 27, 1),
(563, 'Barabanki', 27, 1),
(564, 'Bareilly', 27, 1),
(565, 'Basti', 27, 1),
(566, 'Bijnor', 27, 1),
(567, 'Budaun', 27, 1),
(568, 'Bulandshahr', 27, 1),
(569, 'Chandauli', 27, 1),
(570, 'Chitrakoot', 27, 1),
(571, 'Deoria', 27, 1),
(572, 'Etah', 27, 1),
(573, 'Etawah', 27, 1),
(574, 'Faizabad', 27, 1),
(575, 'Farrukhabad', 27, 1),
(576, 'Fatehpur', 27, 1),
(577, 'Firozabad', 27, 1),
(578, 'Gautam Buddha Nagar', 27, 1),
(579, 'Ghaziabad', 27, 1),
(580, 'Ghazipur', 27, 1),
(581, 'Gonda', 27, 1),
(582, 'Gorakhpur', 27, 1),
(583, 'Hamirpur', 27, 1),
(584, 'Hardoi', 27, 1),
(585, 'Hathras (Mahamaya Nagar)', 27, 1),
(586, 'Jalaun', 27, 1),
(587, 'Jaunpur', 27, 1),
(588, 'Jhansi', 27, 1),
(589, 'Jyotiba Phule Nagar', 27, 1),
(590, 'Kannauj', 27, 1),
(591, 'Kanpur Dehat (Ramabai Nagar)', 27, 1),
(592, 'Kanpur Nagar', 27, 1),
(593, 'Kanshiram Nagar', 27, 1),
(594, 'Kaushambi', 27, 1),
(595, 'Kheri', 27, 1),
(596, 'Kushinagar', 27, 1),
(597, 'Lalitpur', 27, 1),
(598, 'Lucknow', 27, 1),
(599, 'Maharajganj', 27, 1),
(600, 'Mahoba', 27, 1),
(601, 'Mainpuri', 27, 1),
(602, 'Mathura', 27, 1),
(603, 'Mau', 27, 1),
(604, 'Meerut', 27, 1),
(605, 'Mirzapur', 27, 1),
(606, 'Moradabad', 27, 1),
(607, 'Muzaffarnagar', 27, 1),
(608, 'Panchsheel Nagar district (Hapur)', 27, 1),
(609, 'Pilibhit', 27, 1),
(610, 'Pratapgarh', 27, 1),
(611, 'Raebareli', 27, 1),
(612, 'Rampur', 27, 1),
(613, 'Saharanpur', 27, 1),
(614, 'Sant Kabir Nagar', 27, 1),
(615, 'Sant Ravidas Nagar', 27, 1),
(616, 'Shahjahanpur', 27, 1),
(617, 'Shamli', 27, 1),
(618, 'Shravasti', 27, 1),
(619, 'Siddharthnagar', 27, 1),
(620, 'Sitapur', 27, 1),
(621, 'Sonbhadra', 27, 1),
(622, 'Sultanpur', 27, 1),
(623, 'Unnao', 27, 1),
(624, 'Varanasi', 27, 1),
(625, 'Almora', 28, 1),
(626, 'Bageshwar', 28, 1),
(627, 'Chamoli', 28, 1),
(628, 'Champawat', 28, 1),
(629, 'Dehradun', 28, 1),
(630, 'Haridwar', 28, 1),
(631, 'Nainital', 28, 1),
(632, 'Pauri Garhwal', 28, 1),
(633, 'Pithoragarh', 28, 1),
(634, 'Rudraprayag', 28, 1),
(635, 'Tehri Garhwal', 28, 1),
(636, 'Udham Singh Nagar', 28, 1),
(637, 'Uttarkashi', 28, 1),
(638, 'Bankura', 29, 1),
(639, 'Bardhaman', 29, 1),
(640, 'Birbhum', 29, 1),
(641, 'Cooch Behar', 29, 1),
(642, 'Dakshin Dinajpur', 29, 1),
(643, 'Darjeeling', 29, 1),
(644, 'Hooghly', 29, 1),
(645, 'Howrah', 29, 1),
(646, 'Jalpaiguri', 29, 1),
(647, 'Kolkata', 29, 1),
(648, 'Malda', 29, 1),
(649, 'Murshidabad', 29, 1),
(650, 'Nadia', 29, 1),
(651, 'North 24 Parganas', 29, 1),
(652, 'Paschim Medinipur', 29, 1),
(653, 'Purba Medinipur', 29, 1),
(654, 'Purulia', 29, 1),
(655, 'South 24 Parganas', 29, 1),
(656, 'Uttar Dinajpur', 29, 1),
(657, 'Alipurduar', 29, 1),
(658, 'Burdwan', 29, 1),
(659, 'Jhargram', 29, 1),
(660, 'Kalimpong', 29, 1),
(661, 'West Burdwan', 29, 1),
(662, 'Adilabad', 25, 1),
(663, 'Bhadradri Kothagudem', 25, 1),
(664, 'Hyderabad', 25, 1),
(665, 'Jagtial', 25, 1),
(666, 'Jangaon', 25, 1),
(667, 'Jayashankar Bhupalpally', 25, 1),
(668, 'Jogulamba Gadwal', 25, 1),
(669, 'Kamareddy', 25, 1),
(670, 'Karimnagar', 25, 1),
(671, 'Khammam', 25, 1),
(672, 'Kumuram Bheem', 25, 1),
(673, 'Mahabubabad', 25, 1),
(674, 'Mahabubnagar', 25, 1),
(675, 'Mancherial', 25, 1),
(676, 'Medak', 25, 1),
(677, 'Medchal', 25, 1),
(678, 'Mulugu', 25, 1),
(679, 'Nagarkurnool', 25, 1),
(680, 'Nalgonda', 25, 1),
(681, 'Narayanpet', 25, 1),
(682, 'Nirmal', 25, 1),
(683, 'Nizamabad', 25, 1),
(684, 'Peddapalli', 25, 1),
(685, 'Rajanna Sircilla', 25, 1),
(686, 'Rangareddy', 25, 1),
(687, 'Sangareddy', 25, 1),
(688, 'Siddipet', 25, 1),
(689, 'Suryapet', 25, 1),
(690, 'Vikarabad', 25, 1),
(691, 'Wanaparthy', 25, 1),
(692, 'Warangal (Rural)', 25, 1),
(693, 'Warangal (Urban)', 25, 1),
(694, 'Yadadri Bhuvanagiri', 25, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_filmselection`
--

CREATE TABLE `tbl_filmselection` (
  `fs_id` int(11) NOT NULL,
  `mid` int(11) NOT NULL,
  `lid` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `sdate` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_filmselection`
--

INSERT INTO `tbl_filmselection` (`fs_id`, `mid`, `lid`, `status`, `sdate`) VALUES
(1, 1, 3, 2, '2019-04-02');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_film_category`
--

CREATE TABLE `tbl_film_category` (
  `cid` int(11) NOT NULL,
  `catname` varchar(50) NOT NULL,
  `cstatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_film_category`
--

INSERT INTO `tbl_film_category` (`cid`, `catname`, `cstatus`) VALUES
(1, 'Action', 0),
(2, 'Biography', 0),
(3, 'Crime', 0),
(4, 'Documentary', 0),
(5, 'Horror', 0),
(6, 'Romance', 0),
(7, 'Adventure', 0),
(8, 'Sports', 0),
(9, 'War', 0),
(10, 'Psychological', 0),
(11, 'Family', 0),
(12, 'Fantasy', 0),
(13, 'Thriller', 0),
(14, 'Animation', 0),
(15, 'Costume', 0),
(16, 'Drama', 0),
(17, 'History', 0),
(18, 'Musical', 0),
(19, 'Comedy', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_language`
--

CREATE TABLE `tbl_language` (
  `la_id` int(11) NOT NULL,
  `la_name` varchar(30) NOT NULL,
  `la_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_language`
--

INSERT INTO `tbl_language` (`la_id`, `la_name`, `la_status`) VALUES
(1, 'English', 0),
(2, 'Hindi', 0),
(3, 'Malayalam', 0),
(4, 'Kannada', 0),
(5, 'Tamil', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE `tbl_login` (
  `lid` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(500) NOT NULL,
  `type` int(11) NOT NULL,
  `lstatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`lid`, `username`, `password`, `type`, `lstatus`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 0, 0),
(2, 'ajilsunny007@gmail.com', '1ed09e82663a771ec7c98e896e37a501', 3, 0),
(3, 'jithu@gmail.com', '97e75fd1f9125270c4ec644141947574', 2, 0),
(4, 'alan@gmail.com', '02558a70324e7c4f269c69825450cec8', 3, 0),
(5, 'jobin@gmail.com', 'e6758b2a3b13423bdd3fe1b8e273909c', 2, 0),
(6, 'roniya@gmail.com', '202cb962ac59075b964b07152d234b70', 2, 0),
(7, 'appu@gmail.com', '622622b00805c54040dd9a15674a5117', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_moviedetails`
--

CREATE TABLE `tbl_moviedetails` (
  `mid` int(11) NOT NULL,
  `distributor_id` int(11) NOT NULL,
  `film_name` varchar(100) NOT NULL,
  `poster_pic` varchar(500) NOT NULL,
  `cover_pic` varchar(500) NOT NULL,
  `director` varchar(50) NOT NULL,
  `director_pic` varchar(500) NOT NULL,
  `producer` varchar(50) NOT NULL,
  `producer_pic` varchar(500) NOT NULL,
  `mdirector` varchar(50) NOT NULL,
  `language` varchar(50) NOT NULL,
  `categories` varchar(100) NOT NULL,
  `actor` varchar(50) NOT NULL,
  `actor_pic` varchar(500) NOT NULL,
  `actress` varchar(50) NOT NULL,
  `actress_pic` varchar(500) NOT NULL,
  `description` longtext NOT NULL,
  `date` varchar(4) NOT NULL,
  `price` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_moviedetails`
--

INSERT INTO `tbl_moviedetails` (`mid`, `distributor_id`, `film_name`, `poster_pic`, `cover_pic`, `director`, `director_pic`, `producer`, `producer_pic`, `mdirector`, `language`, `categories`, `actor`, `actor_pic`, `actress`, `actress_pic`, `description`, `date`, `price`) VALUES
(1, 2, 'SPADIKAM', '1553059069Spadikam.jpg', '15530590691541920022cover.jpg', 'Bhadran', '1553059068Director_Bhadran.jpg', 'R. Mohan', '1553059068download.jpg', 'S. P. Venkatesh', '3', '1,6,16', 'Mohanlal,Thilakan', '1553059068Mohanlal_DN_0.jpg,1553059068Thilakan.jpg', 'Urvashi,Silk Smitha,K. P. A. C. Lalitha', '1553059068Urvashi.jpg,1553059069Silk_Smitha_2.jpg,1553059069K. P. A. C. Lalitha.jpg', 'Spadikam (English: Crystal) is a 1995 Indian Malayalam-language action drama film written and directed by Bhadran and starring Mohanlal in the lead role. Dialogues were written by Rajendra Babu. The title \"Spadikam\" means \"crystal\" or \"prism\", the splitting of light by a prism being a metaphor for human nature. The film also stars Thilakan, Urvashi, Spadikam George, K. P. A. C. Lalitha, Rajan P. Dev, Silk Smitha, Nedumudi Venu, Chippy, and V. K. Sreeraman.\r\n\r\nSpadikam was the highest-grossing Malayalam film of the year 1995, collecting more than ?5 crore (US$700,000) from the box office.[1] Mohanlal won the Kerala State Film Award for Best Actor and Filmfare Award for Best Actor – Malayalam for his portrayal of Thomas \"Aadu Thoma\" Chacko, a rogue youngster estranged from his narcissistic father, Chacko Master (Thilakan), upon failing to meet the latter\'s high expectations.[2][3] The film was remade into Tamil, Telugu, and Kannada languages.', '2018', '25000'),
(2, 2, 'NATTURAJAVU', '1553091375Natturajavu.jpg', '1553091375925047040s.jpg', 'Shaji Kailas', '1553091374Shaji_kailas.jpg', 'Antony Perumbavoor', '1553091374image.png', 'M. Jayachandran', '3', '1,13,16', 'Mohanlal,Kalabhavan Mani', '155309137465603579.jpg,1553091374download.jpg', 'Meena,Nayanthara', '1553091374meena.jpg,1553091375Nayanthara-hairstyle-in-raja-rani.jpg', 'Naatturajavu (English: Native King) is a 2004 Indian Malayalam-language action-drama film directed by Shaji Kailas and written by T. A. Shahid. The film stars Mohanlal in the lead role and Meena, Nayantara, Kalabhavan Mani, Kaviyoor Ponnamma , K. P. A. C. Lalitha, and Siddique in supporting roles. M. Jayachandran composed the soundtrack.[2] It was produced by Antony Perumbavoor through Aashirvad Cinemas. Naatturajavu was released in India on 20 August 2004, it was well received at the box office becoming one of the highest-grossing Malayalam films of the year.', '2018', '25000'),
(3, 4, 'JACOBINTE SWARGARAJYAM', '1554258022Jacobinte_Swargarajyam_poster.jpg', '1554258022Jacobinte-Swargarajyam.jpg', 'Vineeth Sreenivasan', '1554258022Vineeth_Sreenivasan_Aravindante_Athidhikal.jpg', 'Noble Babu Thomas', '1554258022Noble-Babu-Thomas_1.jpg', 'Shaan Rahman', '3', '11,16,19', 'Nivin Pauly,Renji Panicker', '155425802266509862.jpg,155425802267433395.jpg', 'Lakshmy Ramakrishnan', '1554258022Lakshmy Ramakrishnan.jpg', 'Jacob (Renji Panicker) is a successful businessman settled in Dubai with wife Sherly (Lakshmy Ramakrishnan) and their four kids – Jerry (Nivin Pauly), Abin (Sreenath Bhasi), Ammu (Aima Sebastian), and Chris (Stacen). Jacob is always respected for his ideas by his colleagues and he had done many businesses before starting a steel business. Then comes global recession and Jacob moves for a lucrative trade through his Pakistani colleague, Ajmal, by taking a total of 8 million dirhams from his investors. Ajmal cheats Jacob and Jacob is left in a debt of 8 million dirhams which he happens to know on his 25th wedding anniversary. Soon Jacob\'s credibility and trustful way of doing business is lost and is forced to travel to Liberia to get a deal, but doesn\'t go well and is forced to stay there to avoid arrest. With no other way and continued complaints from the investors especially from Murali Menon (Ashwin Kumar), Jerry decides to give his best to solve the problems by stepping into his dad\'s shoes.', '2018', '25000'),
(4, 4, 'LUCIFER', '1554260209Lucifer_film_poster.jpg', '15542602091553746858_lucifer.jpg', 'Prithviraj Sukumaran', '1554260208image.jpg', 'Antony Perumbavoor', '1554260208A428177_list_20180122175653.jpg', 'Deepak Dev', '3', '1,7,13,16', 'Mohanlal,Vivek Oberoi,Tovino Thomas,Indrajith Suku', '1554260208190326 Mohanlal._resources1.jpg,155426020865623054.jpg,155426020863395979.jpg,1554260209A315698_list_20160518161519.jpg', 'Manju Warrier', '1554260209manju_warrier.jpg', 'Lucifer is a 2019 Indian Malayalam-language film directed by Prithviraj Sukumaran and written by Murali Gopy. Produced by Antony Perumbavoor through the production house Aashirvad Cinemas, the film marks Prithviraj\'s directorial debut and features Mohanlal in the lead role as Stephen Nedumpally, alongside a supporting cast including Prithviraj Sukumaran, Vivek Oberoi, Manju Warrier, Tovino Thomas, Indrajith Sukumaran, Saniya Iyappan, Saikumar, Kalabhavan Shajohn, and Nyla Usha. Deepak Dev composed the music for the film, and the cinematography was handled by Sujith Vaassudev.\r\n\r\nDevelopment of the film began in 2016 when Murali pitched a story to Prithviraj at the sets of Tiyaan in Ramoji Film City, it was when he decided to make Lucifer his directorial debut. Title of the film was taken from an unrealised project of director Rajesh Pillai which was also written by Murali with another story. Pre-production of Lucifer began in 2017 and Murali completed the final draft of the screenplay in February 2018. Principal photography began in mid-July that year and lasted till January 2019, with filming carried out in Idukki, Thiruvananthapuram, Ernakulam, and Kollam districts, and Mumbai, Bangalore, Lakshadweep, and Russia.', '2018', '50000');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_news`
--

CREATE TABLE `tbl_news` (
  `nid` int(11) NOT NULL,
  `heading` varchar(100) NOT NULL,
  `photo` varchar(500) NOT NULL,
  `description` text NOT NULL,
  `ndate` varchar(100) NOT NULL,
  `nstatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_news`
--

INSERT INTO `tbl_news` (`nid`, `heading`, `photo`, `description`, `ndate`, `nstatus`) VALUES
(42, 'sanjay', '1552979697Picture1.jpg', 'wretryty', '2019/03/28  05:54:40am', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_otp`
--

CREATE TABLE `tbl_otp` (
  `oid` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `otp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_otp`
--

INSERT INTO `tbl_otp` (`oid`, `email`, `otp`) VALUES
(34, 'ajilsunny007@gmail.com', 121439);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_runningmovietime`
--

CREATE TABLE `tbl_runningmovietime` (
  `runid` int(11) NOT NULL,
  `mid` int(11) NOT NULL,
  `lid` int(11) NOT NULL,
  `no_of_shows` int(11) NOT NULL,
  `time1` varchar(20) NOT NULL,
  `time2` varchar(20) NOT NULL,
  `time3` varchar(20) NOT NULL,
  `time4` varchar(20) NOT NULL,
  `time5` varchar(20) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_runningmovietime`
--

INSERT INTO `tbl_runningmovietime` (`runid`, `mid`, `lid`, `no_of_shows`, `time1`, `time2`, `time3`, `time4`, `time5`, `status`) VALUES
(8, 3, 4, 2, '10:00', '16:00', '00:00', '00:00', '00:00', 1),
(9, 2, 4, 3, '10:00', '13:00', '16:00', '00:00', '00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_showtime`
--

CREATE TABLE `tbl_showtime` (
  `stid` int(11) NOT NULL,
  `tid` int(11) NOT NULL,
  `screen` int(11) NOT NULL,
  `dayid` int(11) NOT NULL,
  `show_time` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_showtime`
--

INSERT INTO `tbl_showtime` (`stid`, `tid`, `screen`, `dayid`, `show_time`, `status`) VALUES
(1, 1, 1, 1, '10:30 AM,1:00 PM,4:00 PM,8:00 PM', 0),
(2, 1, 1, 2, '11:00 AM,2:30 PM,7:30 PM', 0),
(3, 1, 1, 3, '10:00 AM,1:00 PM,4:00 PM,7:30 PM', 0),
(4, 1, 1, 4, '11:00 AM,4:00 PM', 0),
(5, 1, 2, 6, '05:00 AM,08:00 AM,11:00 AM,2:30 PM,8:30 PM', 0),
(12, 1, 2, 7, '4:30 PM,9:00 PM', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_state`
--

CREATE TABLE `tbl_state` (
  `id` int(11) NOT NULL,
  `sname` varchar(100) NOT NULL,
  `status` varchar(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_state`
--

INSERT INTO `tbl_state` (`id`, `sname`, `status`) VALUES
(1, 'Andhra Pradesh', '1'),
(2, 'Arunachal Pradesh', '1'),
(3, 'Assam', '1'),
(4, 'Bihar', '1'),
(5, 'Chhattisgarh', '1'),
(6, 'Goa', '1'),
(7, 'Gujarat', '1'),
(8, 'Haryana', '1'),
(9, 'Himachal Pradesh', '1'),
(10, 'Jammu and Kashmir', '1'),
(11, 'Jharkhand', '1'),
(12, 'Karnataka', '1'),
(13, 'Kerala', '1'),
(14, 'Madhya Pradesh', '1'),
(15, 'Maharashtra', '1'),
(16, 'Manipur', '1'),
(17, 'Meghalaya', '1'),
(18, 'Mizoram', '1'),
(19, 'Nagaland', '1'),
(20, 'Odisha', '1'),
(21, 'Punjab', '1'),
(22, 'Rajasthan', '1'),
(23, 'Sikkim', '1'),
(24, 'Tamil Nadu', '1'),
(25, 'Telangana', '1'),
(26, 'Tripura', '1'),
(27, 'Uttar Pradesh', '1'),
(28, 'Uttarakhand', '1'),
(29, 'West Bengal', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_status`
--

CREATE TABLE `tbl_status` (
  `sid` int(11) NOT NULL,
  `sname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_status`
--

INSERT INTO `tbl_status` (`sid`, `sname`) VALUES
(0, 'ok'),
(1, 'not approve'),
(2, 'block');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_theatredetails`
--

CREATE TABLE `tbl_theatredetails` (
  `tid` int(11) NOT NULL,
  `lid` int(11) NOT NULL,
  `theatre_name` varchar(100) NOT NULL,
  `t_pro_pic` text NOT NULL,
  `t_cov_pic` text NOT NULL,
  `t_email` varchar(100) NOT NULL,
  `t_phone` varchar(15) NOT NULL,
  `t_district` int(11) NOT NULL,
  `t_place` varchar(100) NOT NULL,
  `t_description` text NOT NULL,
  `t_screens` int(11) NOT NULL,
  `t_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_theatredetails`
--

INSERT INTO `tbl_theatredetails` (`tid`, `lid`, `theatre_name`, `t_pro_pic`, `t_cov_pic`, `t_email`, `t_phone`, `t_district`, `t_place`, `t_description`, `t_screens`, `t_status`) VALUES
(1, 3, 'NEW INDIA', '1553920924crown-theatre.jpg', '1553920924Kanakakkunnu_Palace_Kerala_8875.jpg', 'newindia@gmail.com', '9638527410', 4, 'iritty', 'A nice multiplex theater with decent crowd. Came here to witness the cinema experience in South India. Definitely worth a visit in case u are a big fan of watching movies first day no matter which place!!', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_theatreseating`
--

CREATE TABLE `tbl_theatreseating` (
  `thid` int(11) NOT NULL,
  `tid` int(11) NOT NULL,
  `screen_no` int(11) NOT NULL,
  `row` int(11) NOT NULL,
  `cols` int(11) NOT NULL,
  `seat_arrangement` text NOT NULL,
  `classes_names` text NOT NULL,
  `class_rows` text NOT NULL,
  `class_amount` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_theatreseating`
--

INSERT INTO `tbl_theatreseating` (`thid`, `tid`, `screen_no`, `row`, `cols`, `seat_arrangement`, `classes_names`, `class_rows`, `class_amount`, `status`) VALUES
(1, 1, 1, 10, 20, '1-5,1-7,1-15,1-13,1-12,1-11,1-10,1-9,1-8,1-1,1-2,1-3,1-4,1-19,1-18,1-17,1-16,1-20,2-1,2-2,2-3,2-4,2-5,2-7,2-8,2-9,2-10,2-11,2-12,2-13,2-15,2-16,2-17,2-18,2-19,3-1,3-2,3-3,3-4,3-5,3-7,3-8,3-10,3-11,3-12,3-13,3-17,3-18,3-19,3-20,5-1,5-5,5-13,5-20,5-2,5-3,5-4,5-7,5-8,5-9,5-10,5-11,5-12,5-15,5-16,5-17,5-18,5-19,6-1,6-2,6-3,6-4,6-5,6-7,6-8,6-9,6-10,6-11,6-12,6-13,6-15,6-16,6-17,6-18,6-19,6-20,7-1,7-2,7-3,7-4,7-5,7-8,7-9,7-10,7-11,7-12,7-13,7-15,7-16,7-17,7-18,7-19,7-20,9-1,9-2,9-3,9-4,9-5,9-7,9-8,9-9,9-10,9-11,9-12,9-13,9-15,9-16,9-17,9-18,9-19,9-20,10-1,10-2,10-3,10-4,10-5,10-7,10-8,10-9,10-10,10-12,10-13,10-15,10-18,10-19,10-20,3-9,3-15,3-16,2-20,10-11,10-16,10-17,7-7', 'Balcoly,First Class,Second Class', '9,5,1', '200,150,100', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_usertype`
--

CREATE TABLE `tbl_usertype` (
  `id` int(11) NOT NULL,
  `type` varchar(20) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_usertype`
--

INSERT INTO `tbl_usertype` (`id`, `type`, `status`) VALUES
(0, 'admin', 0),
(1, 'user', 0),
(2, 'Theatre Owner', 0),
(3, 'Distributor', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_bank`
--
ALTER TABLE `tbl_bank`
  ADD PRIMARY KEY (`bid`);

--
-- Indexes for table `tbl_day`
--
ALTER TABLE `tbl_day`
  ADD PRIMARY KEY (`did`),
  ADD KEY `status` (`status`);

--
-- Indexes for table `tbl_details`
--
ALTER TABLE `tbl_details`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `regid` (`regid`);

--
-- Indexes for table `tbl_district`
--
ALTER TABLE `tbl_district`
  ADD PRIMARY KEY (`did`);

--
-- Indexes for table `tbl_filmselection`
--
ALTER TABLE `tbl_filmselection`
  ADD PRIMARY KEY (`fs_id`);

--
-- Indexes for table `tbl_film_category`
--
ALTER TABLE `tbl_film_category`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `tbl_language`
--
ALTER TABLE `tbl_language`
  ADD PRIMARY KEY (`la_id`),
  ADD KEY `la_status` (`la_status`);

--
-- Indexes for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`lid`),
  ADD KEY `username` (`username`),
  ADD KEY `lstatus` (`lstatus`);

--
-- Indexes for table `tbl_moviedetails`
--
ALTER TABLE `tbl_moviedetails`
  ADD PRIMARY KEY (`mid`),
  ADD UNIQUE KEY `film_name` (`film_name`),
  ADD KEY `distributor_id` (`distributor_id`);

--
-- Indexes for table `tbl_news`
--
ALTER TABLE `tbl_news`
  ADD PRIMARY KEY (`nid`),
  ADD UNIQUE KEY `heading` (`heading`),
  ADD UNIQUE KEY `heading_2` (`heading`),
  ADD KEY `nstatus` (`nstatus`);

--
-- Indexes for table `tbl_otp`
--
ALTER TABLE `tbl_otp`
  ADD PRIMARY KEY (`oid`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `tbl_runningmovietime`
--
ALTER TABLE `tbl_runningmovietime`
  ADD PRIMARY KEY (`runid`);

--
-- Indexes for table `tbl_showtime`
--
ALTER TABLE `tbl_showtime`
  ADD PRIMARY KEY (`stid`),
  ADD KEY `dayid` (`dayid`);

--
-- Indexes for table `tbl_state`
--
ALTER TABLE `tbl_state`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_status`
--
ALTER TABLE `tbl_status`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `tbl_theatredetails`
--
ALTER TABLE `tbl_theatredetails`
  ADD PRIMARY KEY (`tid`),
  ADD KEY `lid` (`lid`),
  ADD KEY `t_status` (`t_status`);

--
-- Indexes for table `tbl_theatreseating`
--
ALTER TABLE `tbl_theatreseating`
  ADD PRIMARY KEY (`thid`),
  ADD KEY `tid` (`tid`);

--
-- Indexes for table `tbl_usertype`
--
ALTER TABLE `tbl_usertype`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_bank`
--
ALTER TABLE `tbl_bank`
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_day`
--
ALTER TABLE `tbl_day`
  MODIFY `did` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_details`
--
ALTER TABLE `tbl_details`
  MODIFY `regid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_district`
--
ALTER TABLE `tbl_district`
  MODIFY `did` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=695;

--
-- AUTO_INCREMENT for table `tbl_filmselection`
--
ALTER TABLE `tbl_filmselection`
  MODIFY `fs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_film_category`
--
ALTER TABLE `tbl_film_category`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_language`
--
ALTER TABLE `tbl_language`
  MODIFY `la_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `lid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_moviedetails`
--
ALTER TABLE `tbl_moviedetails`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_news`
--
ALTER TABLE `tbl_news`
  MODIFY `nid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `tbl_otp`
--
ALTER TABLE `tbl_otp`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tbl_runningmovietime`
--
ALTER TABLE `tbl_runningmovietime`
  MODIFY `runid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_showtime`
--
ALTER TABLE `tbl_showtime`
  MODIFY `stid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_state`
--
ALTER TABLE `tbl_state`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tbl_status`
--
ALTER TABLE `tbl_status`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_theatredetails`
--
ALTER TABLE `tbl_theatredetails`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_theatreseating`
--
ALTER TABLE `tbl_theatreseating`
  MODIFY `thid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_usertype`
--
ALTER TABLE `tbl_usertype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_day`
--
ALTER TABLE `tbl_day`
  ADD CONSTRAINT `tbl_day_ibfk_1` FOREIGN KEY (`status`) REFERENCES `tbl_status` (`sid`);

--
-- Constraints for table `tbl_language`
--
ALTER TABLE `tbl_language`
  ADD CONSTRAINT `tbl_language_ibfk_1` FOREIGN KEY (`la_status`) REFERENCES `tbl_status` (`sid`);

--
-- Constraints for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD CONSTRAINT `tbl_login_ibfk_1` FOREIGN KEY (`username`) REFERENCES `tbl_details` (`email`),
  ADD CONSTRAINT `tbl_login_ibfk_2` FOREIGN KEY (`lstatus`) REFERENCES `tbl_status` (`sid`);

--
-- Constraints for table `tbl_moviedetails`
--
ALTER TABLE `tbl_moviedetails`
  ADD CONSTRAINT `tbl_moviedetails_ibfk_1` FOREIGN KEY (`distributor_id`) REFERENCES `tbl_login` (`lid`);

--
-- Constraints for table `tbl_news`
--
ALTER TABLE `tbl_news`
  ADD CONSTRAINT `tbl_news_ibfk_1` FOREIGN KEY (`nstatus`) REFERENCES `tbl_status` (`sid`);

--
-- Constraints for table `tbl_otp`
--
ALTER TABLE `tbl_otp`
  ADD CONSTRAINT `tbl_otp_ibfk_1` FOREIGN KEY (`email`) REFERENCES `tbl_details` (`email`);

--
-- Constraints for table `tbl_showtime`
--
ALTER TABLE `tbl_showtime`
  ADD CONSTRAINT `tbl_showtime_ibfk_1` FOREIGN KEY (`dayid`) REFERENCES `tbl_day` (`did`);

--
-- Constraints for table `tbl_theatredetails`
--
ALTER TABLE `tbl_theatredetails`
  ADD CONSTRAINT `tbl_theatredetails_ibfk_1` FOREIGN KEY (`lid`) REFERENCES `tbl_login` (`lid`),
  ADD CONSTRAINT `tbl_theatredetails_ibfk_2` FOREIGN KEY (`t_status`) REFERENCES `tbl_status` (`sid`);

--
-- Constraints for table `tbl_theatreseating`
--
ALTER TABLE `tbl_theatreseating`
  ADD CONSTRAINT `tbl_theatreseating_ibfk_1` FOREIGN KEY (`tid`) REFERENCES `tbl_theatredetails` (`tid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
