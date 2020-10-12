-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2020 at 08:19 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `regdata` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id`, `username`, `password`, `firstname`, `lastname`, `regdata`) VALUES
(1, 'admin', '1234', 'ณัฐพร', 'ใจเฉลียว', '2020-10-02 09:08:08'),
(2, 'admin01', '1234', 'test', 'one', '2020-10-08 09:24:22'),
(3, 'lotuscom', '81dc9bdb52d04dc20036dbd8313ed055', 'ณัฐพร', 'ใจเฉลียว', '2020-10-08 09:35:59');

-- --------------------------------------------------------

--
-- Table structure for table `tb_document`
--

CREATE TABLE `tb_document` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) UNSIGNED NOT NULL,
  `document_no` varchar(20) NOT NULL,
  `topic` varchar(255) NOT NULL,
  `detail` varchar(255) NOT NULL,
  `ext` varchar(4) NOT NULL,
  `size` double UNSIGNED NOT NULL,
  `file` varchar(255) NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_document`
--

INSERT INTO `tb_document` (`id`, `sender_id`, `document_no`, `topic`, `detail`, `ext`, `size`, `file`, `last_update`) VALUES
(101, 11, '789879', '789879', 'มณฑิตา   อินทานี ไตรภพ   แพรศิริ ณัฐพร   ใจเฉลียว', '', 0, '1602148715-หลักสูตรphp.pdf', '2020-10-08 09:18:35'),
(102, 11, '111/222', 'เทส', 'ณัฐพร   ใจเฉลียว ไตรภพ   แพรศิริ', '', 0, '1602154013-หลักสูตรphp.pdf', '2020-10-08 10:46:53'),
(103, 11, '555/555', 'เทสสสสทู', 'ณัฐสุดา   หว่านณรงค์ เกษราภรณ์   หว่านณรงค์', '', 0, '1602154041-Presentation1(1).pdf', '2020-10-08 10:47:21'),
(104, 21, '10/99', 'ไฟป่า', 'ไตรภพ   แพรศิริ', '', 0, '1602233956-หลักสูตรphp.pdf', '2020-10-09 08:59:16'),
(105, 21, '888/888', 'น้ำท่วม', '                        ไตรภพ   แพรศิริ ณัฐพร   ใจเฉลียว ณัฐสุดา   หว่านณรงค์                555', '', 0, '1602234672-Presentation1(1).pdf', '2020-10-09 09:11:12'),
(106, 0, '1111/1010', 'ฝนตกน้ำท่วม', 'ไตรภพ   แพรศิริ ณัฐสุดา   หว่านณรงค์', '', 0, '1602408180-หลักสูตรphp.pdf', '2020-10-11 09:23:00'),
(107, 0, '1111/1010', 'ฝนตกน้ำท่วม', 'ณัฐพร   ใจเฉลียว', '', 0, '1602408218-หลักสูตรphp.pdf', '2020-10-11 09:23:38'),
(108, 21, '1111/1010', 'ฝนตกน้ำท่วม', 'ณัฐสุดา   หว่านณรงค์ ณัฐพร   ใจเฉลียว', '', 0, '1602408399-หลักสูตรphp.pdf', '2020-10-11 09:26:39');

-- --------------------------------------------------------

--
-- Table structure for table `tb_personal`
--

CREATE TABLE `tb_personal` (
  `personal_id` int(11) NOT NULL,
  `personal_perfix` varchar(11) NOT NULL COMMENT 'คำนำหน้านาม',
  `personal_name` varchar(255) NOT NULL COMMENT 'ชื่ออาจารย์',
  `personal_lastname` varchar(255) NOT NULL COMMENT 'นามสกุลอาจารย์'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_personal`
--

INSERT INTO `tb_personal` (`personal_id`, `personal_perfix`, `personal_name`, `personal_lastname`) VALUES
(1, 'นาย', 'ณัฐพร', 'ใจเฉลียว'),
(2, 'นาย', 'ไตรภพ', 'แพรศิริ'),
(3, 'นายสาว', 'มณฑิตา', 'อินทานี'),
(4, 'นายสาว', 'ณัฐสุดา', 'หว่านณรงค์'),
(5, 'นายสาว', 'เกษราภรณ์', 'หว่านณรงค์');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `regdata` timestamp NULL DEFAULT current_timestamp(),
  `status` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `username`, `password`, `firstname`, `lastname`, `regdata`, `status`) VALUES
(11, 'test', '81dc9bdb52d04dc20036dbd8313ed055', 'test', 'test', '2020-10-02 11:54:41', 1),
(21, 'test01', '81dc9bdb52d04dc20036dbd8313ed055', 'test', '01', '2020-10-09 08:31:15', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_document`
--
ALTER TABLE `tb_document`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_personal`
--
ALTER TABLE `tb_personal`
  ADD PRIMARY KEY (`personal_id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_document`
--
ALTER TABLE `tb_document`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `tb_personal`
--
ALTER TABLE `tb_personal`
  MODIFY `personal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
