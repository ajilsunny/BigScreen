-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2019 at 04:32 PM
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
(1, 'FEDERAL BANK', 'FDC', '7410852096301234', '7410852096301234', 'Nov', 2022, 123, 'AJIL SUNNY', 1),
(2, 'SBI', 'ODC', '9630852074107894', '9630852074107894', 'May', 2023, 789, 'AMAL SUNNY', 1);

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
(12, 'ABIN', 'abin@gmail.com', '9638520147', 4, 'chedikulam', 670706, 'profilepic.png', '1552959708'),
(1, 'admin', 'admin', '123456789', 0, '0', 0, '0', '0'),
(2, 'Ajil Sunny', 'ajilsunny007@gmail.com', '8593967684', 2, 'kiliyanthara', 670706, '1552406856IMG_8800 (2).JPG', '1551848513Class Diagram.png'),
(4, 'ALAN', 'alan@gmail.com', '7410258963', 1, 'sreekandapuram', 670705, 'profilepic.png', '1551867465Sequence Diagram.png'),
(7, 'APPU', 'appu@gmail.com', '7410258963', 2, 'kiliyanthara', 963258, 'profilepic.png', '1552233796'),
(9, 'ARUN', 'arun@gmail.com', '7410852963', 14, 'chemperi', 741258, 'profilepic.png', '1552831938Abin BCA 20180510_211945.jpg'),
(11, 'ASHIL', 'ashil@gmai', '7410852123', 256, 'ytre', 444512, 'profilepic.png', '1552882465'),
(3, 'JITHU', 'jithu@gmail.com', '9638527410', 1, 'chemperi', 670706, 'profilepic.png', '1551849444Object Diagram.png'),
(5, 'JOBIN', 'jobin@gmail.com', '9638520147', 5, 'koovapally', 741852, 'profilepic.png', '1551941005Activity Diagram.png'),
(6, 'RONIYA', 'roniya@gmail.com', '7410852963', 1, 'chemperi', 963852, 'profilepic.png', '1551942180State Chart Diagram.png'),
(10, 'SUNNY', 'sunny@gmail.com', '7410852963', 4, 'vallithodu', 670706, 'profilepic.png', '1552879267');

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
  `date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_filmselection`
--

INSERT INTO `tbl_filmselection` (`fs_id`, `mid`, `lid`, `status`, `date`) VALUES
(65, 1, 11, 1, '2018-11-16'),
(66, 2, 11, 1, '2018-11-15'),
(67, 3, 11, 0, '2018-11-10'),
(68, 2, 4, 1, '2018-11-02'),
(74, 4, 4, 0, '2018-11-19'),
(70, 1, 4, 1, '2018-11-17'),
(76, 3, 4, 2, '2018-11-20'),
(77, 8, 4, 1, '2018-11-23'),
(79, 6, 4, 0, '2019-02-19'),
(81, 9, 9, 1, '2019-03-18');

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
(7, 'appu@gmail.com', '622622b00805c54040dd9a15674a5117', 1, 0),
(9, 'arun@gmail.com', '722279e9e630b3e731464b69968ea4b4', 2, 0),
(10, 'sunny@gmail.com', '533c5ba8368075db8f6ef201546bd71a', 1, 0),
(11, 'ashil@gmai', '06c56a89949d617def52f371c357b6db', 1, 0),
(12, 'abin@gmail.com', 'aca873b8c1bce59ec3135a6553abb18b', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_moviedetails`
--

CREATE TABLE `tbl_moviedetails` (
  `mid` int(11) NOT NULL,
  `distributer_id` int(11) NOT NULL,
  `film_name` varchar(100) NOT NULL,
  `poster_pic` varchar(500) NOT NULL,
  `cover_pic` varchar(500) NOT NULL,
  `director` varchar(50) NOT NULL,
  `director_pic` varchar(500) NOT NULL,
  `producer` varchar(50) NOT NULL,
  `producer_pic` varchar(500) NOT NULL,
  `mdirector` varchar(50) NOT NULL,
  `language` varchar(50) NOT NULL,
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

INSERT INTO `tbl_moviedetails` (`mid`, `distributer_id`, `film_name`, `poster_pic`, `cover_pic`, `director`, `director_pic`, `producer`, `producer_pic`, `mdirector`, `language`, `actor`, `actor_pic`, `actress`, `actress_pic`, `description`, `date`, `price`) VALUES
(1, 5, 'Theevandi', '1540657901images.jpg', '1540657901theevandicover.jpg', 'Fellini T. P', '1540657901maxresdefault.jpg', 'Shaji Nadesan', '1540657901producer.jpeg', 'Kailas Menon', 'Malayalam', 'Tovino Thomas', '1540657901Tovino_Thomas.jpg', 'Samyuktha Menon', '1540657901Samyuktha.jpg', 'The story takes place in the fictional village of Pullinad. Damodaran, a resident of Pullinad, is unable to take his pregnant wife to the hospital due to heavy rain and the rebellion following the murder of Rajiv Gandhi. His wife\'s brother(referred to as Ammavan by the protagonist and his friends) arranges for a midwife. Although he was initially against it, Damodaran later agrees. However the child dies causing great disappointment to Damodaran. He places the child on a table and goes to see his wife whose condition has worsened. Ammavan, a chain smoker, blows the smoke at the dead child which leads to its survival. The child is named Bineesh. As a child Bineesh buys cigarettes for his uncle as he gets to buy something using the balance amount. When he becomes a teenager he is prompted by his friend Safar to smoke a cigarette which eventually leads to him getting addicted to it. He is caught in the school for smoking due to a foolish statement made by Safar and is asked to bring his parents. He decides to bring his uncle. That night while going to meet his uncle he sees a packet of cigarette and decides to smoke one. He moves out and smokes peacefully. However he gets mistaken for a thief by 2 police constables and is taken to police station where everyone gets to know about his secret. As time passes he is addicted and gets the title of Theevandi (chainsmoker, colloquially). As time passes, his elder sister gets married to Vijith, a BSCL (Bharatiya Socialist Congress League) party member and he falls in love with his childhood friend Devi. Devi is the daughter of Madhu, an active BSCL member. He is against the affair of his daughter with Bineesh but later relents on the condition that Bineesh reduces his smoking. ', '2018', '2000000'),
(2, 5, 'Kayamkulam Kochunni', '1540661206images1.jpg', '1540661206kopchunni.jpg', 'Rosshan Andrrews', '1540661206rosshan-andrrews_0.jpg', 'Gokulam Gopalan', '1540661206md1.jpg', 'Gopi Sundar', 'Malayalam', 'Mohanlal', '1540661206Mohanlal_DN_0.jpg', 'Priya Anand ', '15406612061.jpg', 'Kayamkulam Kochunni was born in 1818, near Kottukulangara, Karthikapally Taluk in Travancore (present-day Kerala), British India. He spent his childhood and younger ages in Evoor. After his father\'s death, the family fell to poverty and Kochunni was employed in a grocery store. Later he began stealing and became an outlaw. He was known for stealing from the rich and giving to the poor. Kochunni was once caught by the officials after his girlfriend betrayed him, he escaped and killed her along with her assistant. He was in hideout after that, during which he stole the Shaligram belonging to the Padmanabhaswamy Temple. Ayilyam Thirunal Rama Varma was the ruler of Travancore and T. Madhava Rao was the Diwan of Travancore at the time. Kochunni was accused of several thefts and two homicides. Both the Palace and police officials failed to find Kochunni, afterwhich a warrior, Arattupuzha Velayudha Panicker, was enlisted with the task, who eventually captured him and submitted to the Diwan. Panicker was honoured by the King. Kochunni was remanded for one year, during which he died in the Travancore jail in 1859. His remains was buried at the Pettah Juma Masjid.[4] According to historians, the Central Archives building in present-day Thiruvananthapuram was formerly a prison in the 19th century and is believed to be the first Travancore prison, which is likely where Kochunni was incarcerated.[5]', '2018', '2500000'),
(3, 13, 'Spadikam', '1541920022Spadikam.jpg', '1541920022cover.jpg', 'Bhadran', '1541920022220px-Director_Bhadran.jpg', 'R. Mohan', '1541920022producer.jpg', 'S. P. Venkatesh', 'Malayalam', 'Mohanlal', '1541920022Mohanlal.jpg', 'Urvashi', '1541920022urvashi.jpg', 'homas Chacko, or \"Aadu Thoma\" as he is widely known, is a local gangster and a quarry owner, who is notorious for being the undefeated champion in his confronts and the unrivaled contender in the trade. He is feared in the locality for his atypical practices, like drinking the blood of black male goats before fights (an act that is believed to be the source of his strength) and using his Mundu as a weapon during fights. In spite of his frightening nature, he is known to have a good heart, gambling with his life for just cause. He is the son of the retired school headmaster Chacko (Chacko master), the President\'s medal winner in mathematics. Thoma is the never-ending headache of his \'respectable\' father, both never getting along on any occasion. His mother and sister are caught in the row, left to choose between sides; while Chacko master\'s brother – Manimala Vakkachan, supports Thoma whatsoever. Pookoya, a local baron, is the newly-made enemy of Thoma, along with his sub-inspector (S.I.) friend Kuttikkadan; for supporting Pookoya\'s daughter\'s relationship with a penniless teacher. Due to Thoma\'s relationship with a prostitute, revealed when the police shame him publicly, the arranged marriage of his sister almost fail, further angering his father. This force him to rat his son out to the police on a later occasion, thrashing him with a cane like he used to do in the early days; surprising even the S.I. with the act.', '2018', '4500000'),
(4, 13, 'The King', '1541937927poster.jpg', '1541937927cover.jpg', 'Shaji Kailas', '1541937927Shaji_kailas.jpg', 'Manjalamkuzhi Ali', '1541937927manjalamkuzhi-ali.jpeg', 'Rajamani', 'Malayalam', 'Mammootty', '1541937927Mammootty.jpg', 'Vani Viswanath', '1541937927vani.jpg', 'he city of Kozhikode is victimized by a massive communal riot against the slums, costing the lives of 12 people. Madhu Kumar (Appa Haja), a wildlife photographer, witnesses a group of criminals transporting explosives through the local forest check post, so he calls up the local police commissioner Shankar (Devan) and passes the information. Shankar asks him to wait for his officers to pick him up. But instead of the police, it is the same goons who come for Madhu, resulting in his death. While having the police to fight against the rioters, the aggressive and belligerent, yet honorable and incorruptible district collector Joseph Alex IAS (Mammootty) is suspicious of Shankar\'s activities and decides to investigate the case. He is assisted by ASP Prasad (K. B. Ganesh Kumar), one of the sincere officers who admires Joseph for his arrogant way of dealing politicians and officials. Also tagging along with Joseph is the young assistant district collector Anura Mukerji IAS (Vani Viswanath), whose freecare style conflicts against Joseph\'s strict behavior because of her tragic childhood. It later turns out that Anura\'s behavior was rooted from a horrible experience of when her father continuously cheated on her mother a lot, and that her mother prayed to her to no avail, which is why Anura pretended to be a freak to ease her pain. Upon learning this, Alex decides to warm up to her.', '2018', '3500000'),
(5, 13, 'Sarkar', '1541939099Sarkar_2018_poster.jpg', '1541939099cover.jpg', 'AR Murugadoss', '1541939099Murugadoss.jpg', 'Kalanithi Maran', '1541939099producer.jpg', 'A. R. Rahman', 'Tamil', 'Vijay', '1541939099Vijay.jpg', 'Keerthy Suresh', '1541939099Keerthy Suresh jpg.jpg', 'Sundar Ramasamy (Vijay) is an USA-based highly successful NRI businessman known for his ruthless nature. He arrives in Chennai to cast his vote in the Tamil Nadu Assembly election. However, he finds out to his shock that someone else had already voted in his name and therefore is unable to cast his vote. Sundar approaches the Tamil Nadu Election Commission, seeking a stay on the election result for his constituency, annulling the vote of the fraud elector and allowing him to legitimately cast his vote, to which they agree. Sundar further raises awareness among the public regarding fraud voting and many of the people admit that they too could not vote in the election due to the fraud voting. Meanwhile, Sundar rekindles his romance with his estranged sister-in-law\'s (Papri Ghosh) sister Nila (Keerthy Suresh), whom he had last met five years ago.\r\n\r\nHowever, Sundar\'s actions bring him into confrontation with two influential and corrupt politicians, M. Masilamani (Pala. Karuppiah), who is the Chief Minister of Tamil Nadu, and his brother Malarvannan alias Rendu (Radha Ravi). Though Masilamani\'s party wins in the elections, due to many people admitting that they were not able to vote due to fraud, the election result is annulled and fresh elections are scheduled to take place within the next fifteen days. After attempts are made on his life by Malarvannan\'s henchmen, Sundar decides to contest the election against Masilamani as an Independent and resigns from his company to avoid any conflict-of-interest.', '2018', '6000000'),
(6, 14, 'Jacobinte Swargarajyam', '1542728071Jacobinte_Swargarajyam_poster.jpg', '1542728071Jacobinte-Swargarajyam.jpg', 'Vineeth Sreenivasan', '1542728071producer.jpg', 'Noble Babu Thomas', '1542728071Noble-Babu-Thomas_1.jpg', 'Shaan Rahman', 'Malayalam', 'Nivin Pauly', '154272807158378985.jpg', 'Lakshmy Ramakrishnan', '1542728071images.jpg', 'Jacob (Renji Panicker) is a successful businessman settled in Dubai with wife Sherly (Lakshmy Ramakrishnan) and their four kids – Jerry (Nivin Pauly), Abin (Sreenath Bhasi), Ammu (Aima Sebastian), and Chris (Stacen). Jacob is always respected for his ideas by his colleagues and he had done many businesses before starting a steel business. Then comes global recession and Jacob moves for a lucrative trade through his Pakistani colleague, Ajmal, by taking a total of 8 million dirhams from his investors. Ajmal cheats Jacob and Jacob is left in a debt of 8 million dirhams which he happens to know on his 25th wedding anniversary. Soon Jacob\'s credibility and trustful way of doing business is lost and is forced to travel to Liberia to get a deal, but doesn\'t go well and is forced to stay there to avoid arrest. With no other way and continued complaints from the investors especially from Murali Menon (Ashwin Kumar), Jerry decides to give his best to solve the problems by stepping into his dad\'s shoes.\r\n\r\nJerry, without a trade license or an office, faces many difficulties at first. He decides to go out completely with what his father has taught him about business. He meets a self-made businessman Yusuf Shah (Vineeth Sreenivasan) and strikes a deal with him, eventually he earns his trust and the business grows. Jerry motivates Abin to start a tours and travel company and they succeed in it. Jerry settles most of the debts and gains trust with them. But investor Murali Menon pressurizes him for full payment, Jerry with his mother tries to close deals and collect money, but they were only able to collect a half of what they owed. Finally Murali moves the case against Jerry in Dubai High court but the case is rejected because the case was against the company and it is registered under Jacob\'s name. Murali who also is affected by recession is in deep debt, he is forced to agree with Jerry\'s conditions. ', '2018', '2000000'),
(7, 14, '96', '1542729501p15911775_v_v8_aa.jpg', '15427295017fe357a5c52e82db686d4ec7c5e2aa21.jpg', 'C. Prem Kumar', '1542729501download.jpg', 'S. Nanthagopal', '1542729501download (1).jpg', 'Govind Vasantha', 'Tamil', 'Vijay Sethupathi', '1542729501download (2).jpg', 'Trisha Krishnan', '1542729501trisha.jpg', 'Ram (Vijay Sethupathi) is a happy-go-lucky freelance travel photographer whose passion makes him travel all over India. An introduction to Ram\'s life (the very start of the movie) is aptly summarized in the beautiful song \'The Life of Ram\'. This song showcases the travel exploits of Ram such as an underwater scuba diving and photo shoot in Andaman and Nicobar Islands, Rajasthan Desert expedition at Jaisalmer, wonderful views of Rohtang Pass and capturing day to day life in and around Calcutta and Howrah Bridge to name a few. At the end of the song, the actual story begins with Ram instructing his students about photography and the nuances of taking great pictures in a temple in Kumbakonam. At the end of the day, Ram is tired and asks if any one of them knows driving. Prabha volunteers first, mentioning that she can drive. Ram asks her to get ready early next morning for the drive back to Chennai. Prabha starts driving early next morning with Ram fast asleep in the passenger seat. Sometime, near the strike of dawn, Ram gets up and sees around the place and surroundings. Prabha informs him that they are currently in Thanjavur and they had to route through Thanjavur and Trichy to reach Chennai due to traffic issues in the original route. She also mentions to Ram that Google maps is switched on. Ram asks Prabha to ignore Google and drive as per his instructions. They drive through Thanjavur main city when Ram gets excited seeing the same. He reveals to Prabha that he is from the same city. He gets excited and points out the corporation bus stand mentioning that his parents landed up here, first after their marriage. His excitement continues and he explains to Prabha about other things that come in the way of their drive (such as the Government Hospital where he was born, the first shopping complex that came up in their city and a bakery that was very famous that made you hungry anytime). As they are further driving through the city, he shows Prabha a place mentioning that\'s where his old home would have been long before. When Prabha asks Ram if she needs to stop the car, he asks her to continue driving since he feels he may have to talk to people if they were to stop. As they continue the drive, the car passes by a small crossing over a river stream and Ram gets super excited seeing the same. He starts to say something to Prabha but then immediately keeps quiet.', '2018', '2000000'),
(8, 14, 'Odiyan', '1542731690download.jpg', '1542731690odiyan.jpg', 'V. A. Shrikumar Menon', '154273169051905_v.jpg', 'Antony Perumbavoor', '1542731690image.png', 'M. Jayachandran', 'Malayalam', 'Mohanlal', '1542731690mohanla.jpg', 'Manju Warrier', '1542731690Manju_Warrier_0.jpeg', 'Odiyan is an upcoming Indian Malayalam-language fantasy thriller film directed by V. A. Shrikumar Menon in his feature film debut. It was written by Harikrishnan and is based on the legend of the Odiyan clan, who in Kerala folklore are men possessing shapeshifting abilities, who could assume animal form. Odiyans are said to have inhabited the Malabar region of Kerala during pre-electricity era. The film stars Mohanlal in the title role, alongside Prakash Raj and Manju Warrier. The film was produced by Aashirvad Cinemas.\r\n\r\nPrincipal photography began in Varanasi, Uttar Pradesh in August 2017. Major part of the film was shot in Palakkad district, where the Thenkurissi village in the film was recreated. Some scenes were also filmed in Vagamon, Athirappilly, and Kochi. The film was completed after 145 days shooting. Sam C. S. composed the film\'s score and it also features songs composed by M. Jayachandran. Odiyan is set to release on 14 December 2018 in over 4000 screens worldwide.[1]', '2018', '2000000'),
(9, 5, 'Spider-Man: Homecoming', '1542765411Spider-Man_Homecoming_poster.jpg', '1542765411max1506545262-frontback-cover.jpg', 'Jon Watts', '1542765411Jon_Watts_by_Gage_Skidmore_2.jpg', 'Kevin Feige', '1542765411(cropped).jpg', 'Michael Giacchino', 'English', 'Tom Holland', '1542765411Tom_Holland_by_Gage_Skidmore.jpg', 'Zendaya', '1542765411Zendaya.png', 'Spider-Man: Homecoming is a 2017 American superhero film based on the Marvel Comics character Spider-Man, co-produced by Columbia Pictures and Marvel Studios, and distributed by Sony Pictures Releasing. It is the second Spider-Man film reboot and the sixteenth film in the Marvel Cinematic Universe (MCU). The film is directed by Jon Watts, from a screenplay by the writing teams of Jonathan Goldstein and John Francis Daley, Watts and Christopher Ford, and Chris McKenna and Erik Sommers. Tom Holland stars as Peter Parker / Spider-Man, alongside Michael Keaton, Jon Favreau, Zendaya, Donald Glover, Tyne Daly, Marisa Tomei, and Robert Downey Jr. In Spider-Man: Homecoming, Peter Parker tries to balance high school life with being Spider-Man, while facing the Vulture.\r\n\r\nIn February 2015, Marvel Studios and Sony reached a deal to share the character rights of Spider-Man, integrating the character into the established MCU. The following June, Holland was cast as the title character and Watts was hired to direct. This was followed shortly by the hiring of Daley and Goldstein. In April 2016, the film\'s title was revealed, along with additional cast, including Downey in his MCU role of Tony Stark / Iron Man. Principal photography began in June 2016 at Pinewood Atlanta Studios in Fayette County, Georgia, and continued in Atlanta, Los Angeles, and New York City. The other screenwriters were revealed during filming, which concluded in Berlin in October 2016. The production team made efforts to differentiate the film from previous Spider-Man films.', '2018', '2500000');

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
(42, 'Nun20 days', '1552979697Picture1.jpg', 'wretryty', '2019/03/19  08:14:57am', 0);

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
(33, 'ajilsunny007@gmail.com', 455283);

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
-- Table structure for table `tbl_theatreseating`
--

CREATE TABLE `tbl_theatreseating` (
  `tid` int(11) NOT NULL,
  `lid` int(11) NOT NULL,
  `c_row` int(11) NOT NULL,
  `c_column` int(11) NOT NULL,
  `c_price` int(11) NOT NULL,
  `l_rows` int(11) NOT NULL,
  `l_column` int(11) NOT NULL,
  `l_price` int(11) NOT NULL,
  `b_rows` int(11) NOT NULL,
  `b_column` int(11) NOT NULL,
  `b_price` int(11) NOT NULL,
  `no_of_shows` int(11) NOT NULL,
  `time1` varchar(20) NOT NULL,
  `time2` varchar(20) NOT NULL,
  `time3` varchar(20) NOT NULL,
  `time4` varchar(20) NOT NULL,
  `time5` varchar(20) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_theatreseating`
--

INSERT INTO `tbl_theatreseating` (`tid`, `lid`, `c_row`, `c_column`, `c_price`, `l_rows`, `l_column`, `l_price`, `b_rows`, `b_column`, `b_price`, `no_of_shows`, `time1`, `time2`, `time3`, `time4`, `time5`, `status`) VALUES
(13, 4, 20, 15, 100, 20, 15, 150, 20, 15, 200, 4, '10:00', '13:00', '16:00', '19:00', '', 1);

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
  ADD UNIQUE KEY `film_name` (`film_name`);

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
-- Indexes for table `tbl_theatreseating`
--
ALTER TABLE `tbl_theatreseating`
  ADD PRIMARY KEY (`tid`),
  ADD UNIQUE KEY `lid` (`lid`);

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
-- AUTO_INCREMENT for table `tbl_details`
--
ALTER TABLE `tbl_details`
  MODIFY `regid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_district`
--
ALTER TABLE `tbl_district`
  MODIFY `did` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=695;

--
-- AUTO_INCREMENT for table `tbl_filmselection`
--
ALTER TABLE `tbl_filmselection`
  MODIFY `fs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `tbl_film_category`
--
ALTER TABLE `tbl_film_category`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `lid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_moviedetails`
--
ALTER TABLE `tbl_moviedetails`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_news`
--
ALTER TABLE `tbl_news`
  MODIFY `nid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `tbl_otp`
--
ALTER TABLE `tbl_otp`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tbl_runningmovietime`
--
ALTER TABLE `tbl_runningmovietime`
  MODIFY `runid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_state`
--
ALTER TABLE `tbl_state`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tbl_status`
--
ALTER TABLE `tbl_status`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_theatreseating`
--
ALTER TABLE `tbl_theatreseating`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_usertype`
--
ALTER TABLE `tbl_usertype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD CONSTRAINT `tbl_login_ibfk_1` FOREIGN KEY (`username`) REFERENCES `tbl_details` (`email`),
  ADD CONSTRAINT `tbl_login_ibfk_2` FOREIGN KEY (`lstatus`) REFERENCES `tbl_status` (`sid`);

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
