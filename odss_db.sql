-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2023 at 01:09 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `odss_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `id` int(11) NOT NULL,
  `dateupload` date NOT NULL DEFAULT current_timestamp(),
  `description` text NOT NULL,
  `image` text NOT NULL,
  `dateevent` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`id`, `dateupload`, `description`, `image`, `dateevent`) VALUES
(35, '2023-06-08', 'zaz', 'assets/announcement_img/344052708_3432422373692490_2238394227761892383_n.jpg', '2023-05-28'),
(36, '2023-06-15', 'zzz 😴 ', 'assets/announcement_img/344607786_1477982023007225_3887395920883144382_n.jpg', '2023-05-29'),
(37, '2023-06-08', 'zx', 'assets/announcement_img/341735316_938950137441650_9041123389822704515_n.jpg', '2023-05-28'),
(38, '2023-06-14', 'asdasd', 'assets/announcement_img/1605080820_avatar.jpg', '2023-06-30'),
(39, '2023-06-28', 'asd', 'assets/announcement_img/335536881_1402961903864544_1073879527074952360_n.jpg', '2023-06-30'),
(40, '2023-06-28', 'sad to ', 'assets/announcement_img/335715660_1635346630628585_6024463201760273919_n.jpg', '2023-07-08');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `file_json` text NOT NULL,
  `user_id` int(30) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `event_list` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id`, `title`, `description`, `file_json`, `user_id`, `date_created`, `event_list`) VALUES
(5, 'lorem', '&lt;span style=&quot;color: rgb(55, 65, 81); font-family: S&ouml;hne, ui-sans-serif, system-ui, -apple-system, &amp;quot;Segoe UI&amp;quot;, Roboto, Ubuntu, Cantarell, &amp;quot;Noto Sans&amp;quot;, sans-serif, &amp;quot;Helvetica Neue&amp;quot;, Arial, &amp;quot;Apple Color Emoji&amp;quot;, &amp;quot;Segoe UI Emoji&amp;quot;, &amp;quot;Segoe UI Symbol&amp;quot;, &amp;quot;Noto Color Emoji&amp;quot;; white-space: pre-wrap; background-color: rgb(247, 247, 248);&quot;&gt;&quot;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer condimentum ante eget nibh iaculis, vitae tincidunt justo condimentum. Fusce vel risus at massa euismod fringilla id sed tortor. Ut gravida lacus a ante ullamcorper, vel fringilla neque varius. Aliquam condimentum faucibus mi at suscipit. Donec in faucibus velit. Curabitur nec turpis ac eros feugiat vulputate sed at ligula. Nullam pulvinar libero id semper iaculis. Vestibulum luctus tincidunt massa sed consequat. Nunc tristique dolor vel elit pharetra tempus. Sed euismod facilisis dolor, eu tristique lacus gravida nec. Etiam gravida sem at nisl rutrum, nec malesuada felis bibendum. Quisque eu tristique lorem. Sed malesuada, purus at tincidunt rutrum, enim nulla viverra sapien, a hendrerit nibh risus id lorem.&quot;&lt;/span&gt;', '[\"1684822680_1-51 question.docx\"]', 1, '2023-05-23 14:18:13', 'Child Protection Policy (CPP)'),
(6, 'twst', 'twst', '[\"1684835460_1-51 question.docx\"]', 4, '2023-05-23 17:51:47', 'Child Protection Policy (CPP)'),
(8, 'qw', '										zxc																				', '[\"1692984480_BE-Form-3-Resource-Mobilization-1.docx\"]', 1, '2023-05-24 15:34:37', 'Disaster Risk Reduction and Management (DRRM)'),
(12, '', '															', 'null', 2, '2023-09-13 10:31:29', ''),
(13, '3232', '42342', '[\"1694572380_BE-Form-7-School-Accomplishment-Report-1 (2).docx\"]', 1, '2023-09-13 10:33:24', '');

-- --------------------------------------------------------

--
-- Table structure for table `document_form`
--

CREATE TABLE `document_form` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `status` text NOT NULL,
  `schoolyear` text NOT NULL,
  `schoolId` text NOT NULL,
  `schoolName` varchar(350) NOT NULL,
  `document` text NOT NULL,
  `documentFile` blob NOT NULL,
  `textfield1` text NOT NULL,
  `textfield2` text NOT NULL,
  `textfield3` text NOT NULL,
  `textfield4` text NOT NULL,
  `textfield5` text NOT NULL,
  `textfield6` text NOT NULL,
  `textfield7` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `document_form`
--

INSERT INTO `document_form` (`id`, `title`, `status`, `schoolyear`, `schoolId`, `schoolName`, `document`, `documentFile`, `textfield1`, `textfield2`, `textfield3`, `textfield4`, `textfield5`, `textfield6`, `textfield7`) VALUES
(98, 'Brigada', 'Upload', '2023', '413', 'oilkujy', 'BE-FORM-1', 0x75706c6f6164732f323032332f427269676164612f6f696c6b756a792f363530303163643362393539615f42452d466f726d2d312d312e786c7378, '', '', '', '', '', '', ''),
(101, 'Nutrition Month', 'Upload', '2023', '2147483647', 'Lenienza Elementary School', 'Nutrition Month', 0x75706c6f6164732f323032332f4e7574726974696f6e204d6f6e74682f4c656e69656e7a6120456c656d656e74617279205363686f6f6c2f363530303230386430666166365f42452d466f726d2d342d4461696c792d417474656e64616e63652d6f662d566f6c756e746565722d312e646f6378, '', '', '', '', '', '', ''),
(102, 'Fire Prevention Month', 'Upload', '2023', '2147483647', 'Lenienza Elementary School', 'Fire Prevention Month', 0x75706c6f6164732f323032332f466972652050726576656e74696f6e204d6f6e74682f4c656e69656e7a6120456c656d656e74617279205363686f6f6c2f363530303232383663366238395f42452d466f726d732d436f6e736f6c6964617465642d44697374726963742e786c73, '', '', '', '', '', '', ''),
(103, 'Brigada', 'Upload', '2023', '2147483647', 'Lenienza Elementary School', 'BE-FORM-1', 0x75706c6f6164732f323032332f427269676164612f4c656e69656e7a6120456c656d656e74617279205363686f6f6c2f363530303233333230383338615f42452d466f726d2d312d312e786c7378, '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `event_name`
--

CREATE TABLE `event_name` (
  `id` int(11) NOT NULL,
  `event_categories` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event_name`
--

INSERT INTO `event_name` (`id`, `event_categories`) VALUES
(1, 'Child Protection Policy (CPP)'),
(2, 'Disaster Risk Reduction and Management (DRRM)'),
(3, 'School-Based Feeding (SFB)'),
(4, 'School Inside A Garden (SIGA)'),
(5, 'Adopt-A-School (AAS)'),
(6, 'Brigada Eskwela (BE)');

-- --------------------------------------------------------

--
-- Table structure for table `forms`
--

CREATE TABLE `forms` (
  `id` int(11) NOT NULL,
  `form_id` int(11) NOT NULL,
  `document` varchar(350) NOT NULL,
  `comment` text NOT NULL,
  `documentFile` text NOT NULL,
  `textfield1` varchar(256) NOT NULL,
  `textfield2` varchar(256) NOT NULL,
  `textfield3` varchar(256) NOT NULL,
  `textfield4` varchar(350) NOT NULL,
  `textfield5` varchar(350) NOT NULL,
  `textfield6` varchar(350) NOT NULL,
  `textfield7` varchar(350) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `forms`
--

INSERT INTO `forms` (`id`, `form_id`, `document`, `comment`, `documentFile`, `textfield1`, `textfield2`, `textfield3`, `textfield4`, `textfield5`, `textfield6`, `textfield7`) VALUES
(65, 2421, 'BE-FORM-1', 'COMING', 'forms/BE-FORM-1//BE-Form-1-1.xlsx', '', '', '', '', '', '', ''),
(66, 5422, 'Nutrition Month', '', 'forms/Nutrition Month//', '', '', '', '', '', '', ''),
(67, 3452, 'Fire Prevention Month', '', 'forms/Fire Prevention Month//BE-Forms-Consolidated-District.xls', 'Total Revenue', 'Total of Items ', 'Total Amount', '', '', '', ''),
(68, 0, 'TEST FOR,', 'EVIL', 'forms/TEST FOR,//PDS.xlsx', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

CREATE TABLE `school` (
  `id` int(11) NOT NULL,
  `schoolId` int(11) NOT NULL,
  `schoolName` varchar(350) NOT NULL,
  `district` varchar(350) NOT NULL,
  `status` varchar(350) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `school`
--

INSERT INTO `school` (`id`, `schoolId`, `schoolName`, `district`, `status`) VALUES
(6, 412, 'scc', 'district1', 'active'),
(7, 413, 'oilkujy', 'district2', 'active'),
(8, 74532, 'adasgha', 'district3', 'active'),
(13, 2147483647, 'Lenienza Elementary School', 'district1', 'active'),
(14, 123, '21312', 'district1', 'active'),
(15, 123, '12312', 'district3', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `upload_document`
--

CREATE TABLE `upload_document` (
  `id` int(11) NOT NULL,
  `title` varchar(350) NOT NULL,
  `dateupload` datetime NOT NULL,
  `dateend` text NOT NULL,
  `schoolyear` varchar(350) NOT NULL,
  `document` varchar(350) NOT NULL,
  `status` varchar(350) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `upload_document`
--

INSERT INTO `upload_document` (`id`, `title`, `dateupload`, `dateend`, `schoolyear`, `document`, `status`) VALUES
(195, 'awsad', '2023-09-19 19:59:03', '2023-09-29 12:00:00', '2023', 'Nutrition Month', 'Open'),
(202, 'Calleno New Document 1.2', '2023-09-20 14:00:03', '2023-09-29 12:00:00', '2023', 'TEST FOR,', 'Open'),
(203, 'DOCUMENT CALLENO', '2023-09-20 14:00:24', '2023-09-29 12:00:00', '2023', 'TEST FOR,', 'Close'),
(204, 'BRAND NEW DOCUMENT', '2023-09-20 14:00:51', '2023-09-29 12:00:00', '2023', 'TEST FOR,', 'Open');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(30) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `middlename` varchar(200) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `schoolId` int(11) NOT NULL,
  `schoolName` varchar(350) NOT NULL,
  `district` varchar(350) NOT NULL,
  `status` varchar(350) NOT NULL,
  `password` text NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 2 COMMENT '1=Admin,2= users',
  `avatar` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `middlename`, `contact`, `address`, `email`, `schoolId`, `schoolName`, `district`, `status`, `password`, `type`, `avatar`, `date_created`) VALUES
(1, 'Admin', 'Admin', '', '+12354654787', 'Sample', 'admin@admin.com', 412, 'Lenienza Elementary School', 'district1', 'active', '202cb962ac59075b964b07152d234b70', 1, '1694572440_1992locsin.jpg', '2020-11-11 15:35:19'),
(2, 'Marc', 'Lingating', 'C', '+123456789', 'Address', 'lingating@gmail.com', 413, 'adasgha', 'district3', 'active', '202cb962ac59075b964b07152d234b70', 2, '1694572500_amogus stop (2).jpg', '2020-11-11 09:24:40'),
(4, 'Justine', 'Calleno', '', '09123456789', 'waads', 'calleno@calleno.com', 413, 'oilkujy', 'district2', 'active', '32250170a0dca92d53ec9624f336ca24', 2, '1685168220_cat.jpg', '2023-05-19 18:47:17'),
(5, 'Juliana', 'Dela Cruz', 'Dalig', '34324', '23423423', 'julianna@gmail.com', 412, 'scc', 'district1', 'active', '202cb962ac59075b964b07152d234b70', 2, '1694601900_archimonde.jpg', '2023-09-13 18:45:25'),
(6, 'Maria', 'Gonzales', '', '09808086876', 'kagawasan village', 'maria@gmail.com', 412, 'adasgha', 'district3', 'active', '202cb962ac59075b964b07152d234b70', 2, '1694658780_antijoy2.jpg', '2023-09-14 10:33:57'),
(8, 'Maria', 'Dela Cruz', 'Dalig', '123123123123', '<p>KAGAWASAN VILALGE</p>', 'avemaria@gmail.com', 413, 'Lenienza Elementary School', 'district1', 'active', '202cb962ac59075b964b07152d234b70', 2, '1695191460_8-Yaa5ujrtEObo0Kz.png', '2023-09-20 14:31:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `document_form`
--
ALTER TABLE `document_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_name`
--
ALTER TABLE `event_name`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forms`
--
ALTER TABLE `forms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `school`
--
ALTER TABLE `school`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `upload_document`
--
ALTER TABLE `upload_document`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `document_form`
--
ALTER TABLE `document_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `event_name`
--
ALTER TABLE `event_name`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `forms`
--
ALTER TABLE `forms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `school`
--
ALTER TABLE `school`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `upload_document`
--
ALTER TABLE `upload_document`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=205;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
