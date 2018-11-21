-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2018 at 06:28 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `khabo`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(20) NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` varchar(30) COLLATE utf8_unicode_ci DEFAULT '-',
  `last_signout` varchar(30) COLLATE utf8_unicode_ci DEFAULT '-',
  `total_time` varchar(30) COLLATE utf8_unicode_ci DEFAULT '-'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `last_login`, `last_signout`, `total_time`) VALUES
(1, 'Farhan Hamim', '-', '-', '-');

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `id` int(30) NOT NULL,
  `description` varchar(125) COLLATE utf8_unicode_ci NOT NULL,
  `store_pic` varchar(125) COLLATE utf8_unicode_ci NOT NULL,
  `food_pic1` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `food_pic2` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `food_pic3` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `food_pic4` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `food_pic5` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `food_pic6` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `menuId` varchar(16) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`id`, `description`, `store_pic`, `food_pic1`, `food_pic2`, `food_pic3`, `food_pic4`, `food_pic5`, `food_pic6`, `menuId`) VALUES
(1, '', 'resturantImg/rid1/rid1.jpg', 'resturantImg/rid1/1.jpg', 'resturantImg/rid1/2.jpg', 'resturantImg/rid1/3.jpg', 'resturantImg/rid1/4.jpg', 'resturantImg/rid1/5.jpg', 'resturantImg/rid1/6.jpg', '1'),
(10, '', 'resturantImg/rid10/rid1.jpg', 'resturantImg/rid10/1.jpg', 'resturantImg/rid10/2.jpg', 'resturantImg/rid10/3.jpg', 'resturantImg/rid10/4.jpg', 'resturantImg/rid10/5.jpg', 'resturantImg/rid10/6.jpg', '10'),
(11, '', 'resturantImg/rid11/rid11.jpg', 'resturantImg/rid11/1.jpg', 'resturantImg/rid11/2.jpg', 'resturantImg/rid11/3.jpg', 'resturantImg/rid11/4.jpg', 'resturantImg/rid11/5.jpg', 'resturantImg/rid11/6.jpg', '11'),
(12, '', 'resturantImg/rid12/rid12.jpg', 'resturantImg/rid12/1.jpg', 'resturantImg/rid12/2.jpg', 'resturantImg/rid12/3.jpg', 'resturantImg/rid12/4.jpg', 'resturantImg/rid12/5.jpg', 'resturantImg/rid12/6.jpg', '12'),
(13, '', 'resturantImg/rid13/rid13.jpg', 'resturantImg/rid13/1.jpg', 'resturantImg/rid13/2.jpg', 'resturantImg/rid13/3.jpg', 'resturantImg/rid13/4.jpg', 'resturantImg/rid13/5.jpg', 'resturantImg/rid13/6.jpg', '13'),
(14, '', 'resturantImg/rid14/rid14.jpg', 'resturantImg/rid14/1.jpg', 'resturantImg/rid14/2.jpg', 'resturantImg/rid14/3.jpg', 'resturantImg/rid14/4.jpg', 'resturantImg/rid14/5.jpg', 'resturantImg/rid14/6.jpg', '14'),
(15, '', 'resturantImg/rid15/rid15.jpg', 'resturantImg/rid15/1.jpg', 'resturantImg/rid15/2.jpg', 'resturantImg/rid15/3.jpg', 'resturantImg/rid15/4.jpg', 'resturantImg/rid15/5.jpg', 'resturantImg/rid15/6.jpg', '15'),
(16, '', 'resturantImg/rid16/rid16.jpg', 'resturantImg/rid16/1.jpg', 'resturantImg/rid16/2.jpg', 'resturantImg/rid16/3.jpg', 'resturantImg/rid16/4.jpg', 'resturantImg/rid16/5.jpg', 'resturantImg/rid16/6.jpg', '16'),
(17, '', 'resturantImg/rid17/rid17.jpg', 'resturantImg/rid17/1.jpg', 'resturantImg/rid17/2.jpg', 'resturantImg/rid17/3.jpg', 'resturantImg/rid17/4.jpg', 'resturantImg/rid17/5.jpg', 'resturantImg/rid17/6.jpg', '17'),
(18, '', 'resturantImg/rid18/rid18.jpg', 'resturantImg/rid18/1.jpg', 'resturantImg/rid18/2.jpg', 'resturantImg/rid18/3.jpg', 'resturantImg/rid18/4.jpg', 'resturantImg/rid18/5.jpg', 'resturantImg/rid18/6.jpg', '18'),
(19, '', 'resturantImg/rid19/rid19.jpg', 'resturantImg/rid19/1.jpg', 'resturantImg/rid19/2.jpg', 'resturantImg/rid19/3.jpg', 'resturantImg/rid19/4.jpg', 'resturantImg/rid19/5.jpg', 'resturantImg/rid19/6.jpg', '19'),
(20, '', 'resturantImg/rid20/rid20.jpg', 'resturantImg/rid20/1.jpg', 'resturantImg/rid20/2.jpg', 'resturantImg/rid20/3.jpg', 'resturantImg/rid20/4.jpg', 'resturantImg/rid20/5.jpg', 'resturantImg/rid20/6.jpg', '20'),
(21, '', 'resturantImg/rid21/rid21.jpg', 'resturantImg/rid21/1.jpg', 'resturantImg/rid21/2.jpg', 'resturantImg/rid21/3.jpg', 'resturantImg/rid21/4.jpg', 'resturantImg/rid21/5.jpg', 'resturantImg/rid21/6.jpg', '21'),
(22, '', 'resturantImg/rid22/rid22.jpg', 'resturantImg/rid22/1.jpg', 'resturantImg/rid22/2.jpg', 'resturantImg/rid22/3.jpg', 'resturantImg/rid22/4.jpg', 'resturantImg/rid22/5.jpg', 'resturantImg/rid22/6.jpg', '22'),
(23, '', 'resturantImg/rid23/rid23.jpg', 'resturantImg/rid23/1.jpg', 'resturantImg/rid23/2.jpg', 'resturantImg/rid23/3.jpg', 'resturantImg/rid23/4.jpg', 'resturantImg/rid23/5.jpg', 'resturantImg/rid23/6.jpg', '23'),
(24, '', 'resturantImg/rid24/rid24.jpg', 'resturantImg/rid24/1.jpg', 'resturantImg/rid24/2.jpg', 'resturantImg/rid24/3.jpg', 'resturantImg/rid24/4.jpg', 'resturantImg/rid24/5.jpg', 'resturantImg/rid24/6.jpg', '24'),
(25, '', 'resturantImg/rid25/rid25.jpg', 'resturantImg/rid25/1.jpg', 'resturantImg/rid25/2.jpg', 'resturantImg/rid25/3.jpg', 'resturantImg/rid25/4.jpg', 'resturantImg/rid25/5.jpg', 'resturantImg/rid25/6.jpg', '25'),
(26, '', 'resturantImg/rid26/rid26.jpg', 'resturantImg/rid26/1.jpg', 'resturantImg/rid26/2.jpg', 'resturantImg/rid26/3.jpg', 'resturantImg/rid26/4.jpg', 'resturantImg/rid26/5.jpg', 'resturantImg/rid26/6.jpg', '26'),
(27, '', 'resturantImg/rid27/rid27.jpg', 'resturantImg/rid27/1.jpg', 'resturantImg/rid27/2.jpg', 'resturantImg/rid27/3.jpg', 'resturantImg/rid27/4.jpg', 'resturantImg/rid27/5.jpg', 'resturantImg/rid27/6.jpg', '27'),
(28, '', 'resturantImg/rid28/rid28.jpg', 'resturantImg/rid28/1.jpg', 'resturantImg/rid28/2.jpg', 'resturantImg/rid28/3.jpg', 'resturantImg/rid28/4.jpg', 'resturantImg/rid28/5.jpg', 'resturantImg/rid28/6.jpg', '28'),
(29, '', 'resturantImg/rid29/rid29.jpg', 'resturantImg/rid29/1.jpg', 'resturantImg/rid29/2.jpg', 'resturantImg/rid29/3.jpg', 'resturantImg/rid29/4.jpg', 'resturantImg/rid29/5.jpg', 'resturantImg/rid29/6.jpg', '29'),
(3, '', 'resturantImg/rid3/rid3.jpg', 'resturantImg/rid3/1.jpg', 'resturantImg/rid3/2.jpg', 'resturantImg/rid3/3.jpg', 'resturantImg/rid3/4.jpg', 'resturantImg/rid3/5.jpg', 'resturantImg/rid3/6.jpg', '3'),
(30, '', 'resturantImg/rid30/rid30.jpg', 'resturantImg/rid30/1.jpg', 'resturantImg/rid30/2.jpg', 'resturantImg/rid30/3.jpg', 'resturantImg/rid30/4.jpg', 'resturantImg/rid30/5.jpg', 'resturantImg/rid30/6.jpg', '30'),
(31, '', 'resturantImg/rid31/rid31.jpg', 'resturantImg/rid31/1.jpg', 'resturantImg/rid31/2.jpg', 'resturantImg/rid31/3.jpg', 'resturantImg/rid31/4.jpg', 'resturantImg/rid31/5.jpg', 'resturantImg/rid31/6.jpg', '31'),
(4, '', 'resturantImg/rid4/rid4.jpg', 'resturantImg/rid4/1.jpg', 'resturantImg/rid4/2.jpg', 'resturantImg/rid4/3.jpg', 'resturantImg/rid4/4.jpg', 'resturantImg/rid4/5.jpg', 'resturantImg/rid4/6.jpg', '4'),
(5, '', 'resturantImg/rid5/rid5.jpg', 'resturantImg/rid5/1.jpg', 'resturantImg/rid5/2.jpg', 'resturantImg/rid5/3.jpg', 'resturantImg/rid5/4.jpg', 'resturantImg/rid5/5.jpg', 'resturantImg/rid5/6.jpg', '5'),
(6, '', 'resturantImg/rid6/rid6.jpg', 'resturantImg/rid6/1.jpg', 'resturantImg/rid6/2.jpg', 'resturantImg/rid6/3.jpg', 'resturantImg/rid6/4.jpg', 'resturantImg/rid6/5.jpg', 'resturantImg/rid6/6.jpg', '6'),
(7, '', 'resturantImg/rid7/rid7.jpg', 'resturantImg/rid7/1.jpg', 'resturantImg/rid1/2.jpg', 'resturantImg/rid7/3.jpg', 'resturantImg/rid7/4.jpg', 'resturantImg/rid7/5.jpg', 'resturantImg/rid7/6.jpg', '7'),
(8, '', 'resturantImg/rid8/rid8.jpg', 'resturantImg/rid8/1.jpg', 'resturantImg/rid8/2.jpg', 'resturantImg/rid8/3.jpg', 'resturantImg/rid8/4.jpg', 'resturantImg/rid8/5.jpg', 'resturantImg/rid8/6.jpg', '8'),
(9, '', 'resturantImg/rid9/rid9.jpg', 'resturantImg/rid9/1.jpg', 'resturantImg/rid9/2.jpg', 'resturantImg/rid9/3.jpg', 'resturantImg/rid9/4.jpg', 'resturantImg/rid9/5.jpg', 'resturantImg/rid9/6.jpg', '9');

-- --------------------------------------------------------

--
-- Table structure for table `menutable`
--

CREATE TABLE `menutable` (
  `m_id` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `items` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `menutable`
--

INSERT INTO `menutable` (`m_id`, `items`) VALUES
('1', 8),
('10', 6),
('11', 6),
('12', 6),
('13', 6),
('14', 6),
('15', 6),
('16', 6),
('17', 6),
('18', 6),
('19', 6),
('20', 6),
('21', 6),
('22', 6),
('23', 6),
('24', 6),
('25', 6),
('26', 6),
('27', 6),
('28', 6),
('29', 6),
('3', 7),
('30', 6),
('31', 6),
('4', 6),
('5', 0),
('6', 0),
('7', 0),
('8', 0),
('9', 0);

-- --------------------------------------------------------

--
-- Table structure for table `other`
--

CREATE TABLE `other` (
  `id` int(30) NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `confirmId` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  `last_signout` varchar(30) COLLATE utf8_unicode_ci DEFAULT '-',
  `resetCode` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `other`
--

INSERT INTO `other` (`id`, `name`, `confirmId`, `last_signout`, `resetCode`) VALUES
(6, 'khadija', '123', '-', '123');

-- --------------------------------------------------------

--
-- Table structure for table `places`
--

CREATE TABLE `places` (
  `id` int(11) NOT NULL,
  `areaName` varchar(50) NOT NULL,
  `lati` varchar(15) NOT NULL,
  `longi` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `places`
--

INSERT INTO `places` (`id`, `areaName`, `lati`, `longi`) VALUES
(1, 'Kamal Ataturk Avenue,Banani,Dhaka', '23.794346', '90.402198'),
(2, 'Gulshan-circle 2,Dhaka', '23.794793', '90.414239'),
(3, 'Gulshan-1,Dhaka', '23.780392', '90.416811'),
(4, 'Mohakhali inter district bus terminal,Dhaka', '23.773136', '90.401703'),
(5, 'Jashimuddin Road,Uttara,Dhaka', '23.860721', '90.400013'),
(6, 'Dhanmondi 32,Dhaka', '23.751744', '90.377827'),
(7, 'Shonir Akhra,Dhaka', '23.702650', '90.450738'),
(8, 'Banasree,Dhaka', '23.763830', '90.431212'),
(9, 'Baridhara,Dhaka', '23.803220', '90.419479');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `id` int(30) NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `lat` float NOT NULL,
  `lng` float NOT NULL,
  `type` varchar(30) COLLATE utf8_unicode_ci DEFAULT 'restaurant'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`id`, `name`, `address`, `lat`, `lng`, `type`) VALUES
(1, 'Fish & Co', '22 Bir Uttam AK Khandakar Road, Dhaka', 23.7769, 90.4167, 'Resturant'),
(3, 'Pizza Roma', 'House No. 16, Road No.:101, Gulshan 2, Dhaka 1212', 23.7931, 90.4183, 'Resturant'),
(4, 'The Atrium Restaurant', '50 & 52 Pragati Avenue, J Block, Baridhara, Dhaka 1212', 23.8025, 90.4229, 'Resturant'),
(5, 'Saltz', '8 Gulshan North Avenue, Dhaka 1212', 23.7994, 90.4121, 'Resturant'),
(6, 'Koreana Restaurant', 'House No. 22, Road No. 123, Gulshan 1, Dhaka 1212', 23.7849, 90.4195, 'Resturant'),
(7, 'Thai Emerald', 'House 54 Road No 2, Sector 3, Dhaka 1230', 23.8666, 90.3996, 'Resturant'),
(8, 'Golden Chimney Restaurant', '12, Sonargaon road, Sonartori Tower, Bangla Motor, Dhaka 1000', 23.746, 90.3929, 'Restaurant'),
(9, 'Thirty3 Restaurant', '3rd Floor, 3 New Baily Road, Dhaka 1217', 23.742, 90.4099, 'Resturant'),
(10, 'Izumi', 'House No. 24/24C, Road No.113, Gulshan 2, Dhaka 1212', 23.7886, 90.4206, 'Resturant'),
(11, 'Lake Terrace', 'House 25/E, Lake Dr Rd, Dhaka 1230', 23.8697, 90.3934, 'Resturant'),
(12, 'Nirob Hotel', '114 Nazimuddin Rd, Dhaka 1211', 23.7209, 90.3988, 'Resturant'),
(13, 'Sky View Lounge', '21st Floor, Sky View Trade Center, 27,  Old 118/2, Shantinagar, Dhaka 1217', 23.7389, 90.4156, 'Resturant'),
(14, 'The Mirage', 'House- 9/A/1, Road No 3, Gulshan-1, Dhaka 1212', 23.7757, 90.4155, 'Resturant'),
(15, 'Grind House', '566/A, Block-C, 2nd Floor, Khilgaon, Taltola, Dhaka 1219', 23.752, 90.4215, 'Resturant'),
(16, 'The dining lounge', '373/B Level 3, Shotodol Rose Heights, Shahid Baki Road,  Dhaka 1219', 23.7519, 90.4229, 'Resturant'),
(17, 'Angan', '401/1A, Shahid Baki Road, Momenbug Chowrasta, Dhaka 1219', 23.7487, 90.4267, 'Resturant'),
(18, 'Al Kaderia', '2/3 Sahid Muktijoddha Faruk Iqbal And Taslim Road, West Rampura, Dhaka 1219', 23.7593, 90.4184, 'Resturant'),
(19, 'Appeliano', 'Sahid Baki Road, Khilgaon, Taltola, 568, Block - C, Dhaka 1219', 23.752, 90.4214, 'Resturant'),
(20, 'Tradition BD', '568/C, Shahid Baki Road, Block C, Khilgaon, Dhaka 1219', 23.752, 90.4215, 'Resturant'),
(21, 'Tune and bite music cafe', '568/C, Shahid Baki Road, Block C, Khilgaon, Dhaka 1219', 23.7519, 90.4217, 'Resturant'),
(22, 'American Burger', 'House no. 53/1, Satmasjid Road, Dhanmondi 4/A, Dhaka 1219', 23.7404, 90.3752, 'Resturant'),
(23, 'Xinxian Restaurant', 'House no. 7, Road no. 8, Dhanmondi, Dhaka 1219', 23.7457, 90.3843, 'Resturant'),
(24, 'Cafe hello', '49/A Satmasjid Road, Dhanmondi, Dhaka 1219', 23.7446, 90.3722, 'Resturant'),
(25, 'Royal Buffet restaurant', 'House No-8/A, 5th Floor, Royal Plaza, Road No-4, Dhanmondi, Dhaka 1219', 23.742, 90.3825, 'Resturant'),
(26, 'Takeout Dhanmondi', '736 Rangs KB Square,  Road - 9/a, Satmosjid Road, Dhanmondi, Dhaka 1219', 23.7447, 90.3721, 'Resturant'),
(27, 'Hakka Dhaka', '34, Green Regency, Near Banani Supper Market Road 10, Block D, Dhaka 1213', 23.792, 90.4063, 'Resturant'),
(28, 'Dosa Express', 'Gold Palace, 3rd Floor, 3 New Baily Road, Dhaka 1219', 23.7421, 90.41, 'Resturant'),
(29, 'Baily fiesta', '1/2 New Baily Rd, Dhaka 1219', 23.7426, 90.4104, 'Resturant'),
(30, 'Shwarma street', 'Assign Quashem Paradise, 143/2, New Baily Road, Dhaka 1219', 23.7417, 90.4083, 'Resturant'),
(31, 'Boomers Cafe', 'House no. 25, 3rd floor,  New Baily Road, natok sarani, Dhaka 1219', 23.7416, 90.41, 'Resturant'),
(32, 'Muncheese', 'Hazrat Shahjalal Market, Kuratoli, Kuril, Dhaka 1229', 23.8475, 90.4061, 'restaurant'),
(33, 'Golden Gate Restaurent', 'Kuratoli, Kuril, Dhaka 1229', -20.8168, -49.4789, 'restaurant'),
(34, 'Ridoy Biriyani House', 'Kuratoli, Ka-74/D, Dhaka 1229', -33.3529, -70.753, 'restora'),
(35, 'Khandani Birani House', 'Kuratoli, Dhaka 1229', -20.8172, -49.473, 'restora'),
(36, 'Janata Hotel & Restora', 'K-123, Kuril - Kuratoli Bazar, Khilkhet, Vatara, Dhaka 1229', 37.7229, -92.9257, 'restora'),
(37, 'KITCHENETTE', 'Kuratoli, Kuril bishwa road, Dhaka 1229', 23.7104, 90.4074, 'restaurant'),
(38, 'Cafe Crush', 'House-709, Road- 1, Block- G, Basundhara, Dhaka 1206', 12.9444, 77.5562, 'cafe');

-- --------------------------------------------------------

--
-- Table structure for table `res_rating`
--

CREATE TABLE `res_rating` (
  `id` int(30) NOT NULL,
  `area` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `rating` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `res_rating`
--

INSERT INTO `res_rating` (`id`, `area`, `rating`) VALUES
(1, 'Gulshan', 1),
(3, 'Gulshan', 1),
(4, 'Baridhara', 1),
(5, 'Gulshan', 1),
(6, 'Gulshan', 1),
(7, 'Gulshan', 1),
(8, 'Bangla Motor', 1),
(9, 'Baily Road', 1),
(10, 'Gulshan', 1),
(11, 'Uttara', 1),
(12, 'Bangshal', 1),
(13, 'Motijheel', 1),
(14, 'Gulshan', 1),
(15, 'Khilgaon', 1),
(16, 'Khilgaon', 1),
(17, 'Khilgaon', 1),
(18, 'Rampura', 1),
(19, 'Khilgaon', 1),
(20, 'Khilgaon', 1),
(21, 'Khilgaon', 1),
(22, 'Dhanmondi', 1),
(23, 'Dhanmondi', 1),
(24, 'Dhanmondi', 1),
(25, 'Dhanmondi', 1),
(26, 'Dhanmondi', 1),
(27, 'Banani', 1),
(28, 'Baily Road', 1),
(29, 'Baily Road', 1),
(30, 'Baily Road', 1),
(31, 'Baily Road', 1),
(32, 'kuratoli', 1),
(33, 'kuratoli', 1),
(34, 'kuratoli', 1),
(35, 'kuratoli', 1),
(36, 'kuratoli', 1),
(37, 'kuratoli', 1),
(38, 'Bashundhara', 1);

-- --------------------------------------------------------

--
-- Table structure for table `shop_owner`
--

CREATE TABLE `shop_owner` (
  `id` int(20) NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `shop_id` int(30) NOT NULL,
  `confirmId` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  `last_signout` varchar(30) COLLATE utf8_unicode_ci DEFAULT '-',
  `resetCode` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `shop_owner`
--

INSERT INTO `shop_owner` (`id`, `name`, `shop_id`, `confirmId`, `last_signout`, `resetCode`) VALUES
(6, 'Mili', 1, '123', '-', '123');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(20) NOT NULL,
  `status` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `confirmId` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  `resetCode` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `active` int(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `status`, `email`, `password`, `confirmId`, `resetCode`, `active`) VALUES
(1, 'admin', 'fh3.tushar@gmail.com', 'razor3919!', '123', '123', 0),
(6, 'other', 'a@gmail.com', '123', '156', '156', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD KEY `admin_fk0` (`id`);

--
-- Indexes for table `details`
--
ALTER TABLE `details`
  ADD UNIQUE KEY `menuId` (`menuId`),
  ADD KEY `details_fk0` (`id`);

--
-- Indexes for table `menutable`
--
ALTER TABLE `menutable`
  ADD PRIMARY KEY (`m_id`);

--
-- Indexes for table `other`
--
ALTER TABLE `other`
  ADD KEY `other_fk0` (`id`);

--
-- Indexes for table `places`
--
ALTER TABLE `places`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `res_rating`
--
ALTER TABLE `res_rating`
  ADD KEY `res_rating_fk0` (`id`);

--
-- Indexes for table `shop_owner`
--
ALTER TABLE `shop_owner`
  ADD KEY `shop_owner_fk0` (`id`),
  ADD KEY `shop_owner_fk1` (`shop_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `confirmId` (`confirmId`),
  ADD UNIQUE KEY `resetCode` (`resetCode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `places`
--
ALTER TABLE `places`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_fk0` FOREIGN KEY (`id`) REFERENCES `user` (`id`);

--
-- Constraints for table `details`
--
ALTER TABLE `details`
  ADD CONSTRAINT `details_fk0` FOREIGN KEY (`id`) REFERENCES `restaurant` (`id`),
  ADD CONSTRAINT `details_fk1` FOREIGN KEY (`menuId`) REFERENCES `menutable` (`m_id`);

--
-- Constraints for table `other`
--
ALTER TABLE `other`
  ADD CONSTRAINT `other_fk0` FOREIGN KEY (`id`) REFERENCES `user` (`id`);

--
-- Constraints for table `res_rating`
--
ALTER TABLE `res_rating`
  ADD CONSTRAINT `res_rating_fk0` FOREIGN KEY (`id`) REFERENCES `restaurant` (`id`);

--
-- Constraints for table `shop_owner`
--
ALTER TABLE `shop_owner`
  ADD CONSTRAINT `shop_owner_fk0` FOREIGN KEY (`id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `shop_owner_fk1` FOREIGN KEY (`shop_id`) REFERENCES `restaurant` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
