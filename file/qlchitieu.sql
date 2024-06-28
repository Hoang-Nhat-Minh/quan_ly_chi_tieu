-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2019 at 12:23 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.13
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */
;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */
;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */
;
/*!40101 SET NAMES utf8mb4 */
;
--
-- Database: `qlchitieu`
--

-- --------------------------------------------------------
--
-- Table structure for table `chi`
--

CREATE TABLE `chi` (
  `id_chi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `noidung` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `ngay` date NOT NULL,
  `loai` int(11) NOT NULL,
  `chi` int(11) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_unicode_ci;
--
-- Dumping data for table `chi`
--

INSERT INTO `chi` (`id_chi`, `id_user`, `noidung`, `ngay`, `chi`)
VALUES (1, 1, 'ăn ốc', 1, '2019-01-03', 30000),
  (
    2,
    2,
    'mua trà sữa',
    1,
    '2019-01-05',
    15000
  );
-- --------------------------------------------------------
--
-- Table structure for table `cmt`
--

CREATE TABLE `cmt` (
  `id_cmt` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `noidung` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `ngay` date NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_unicode_ci;
-- --------------------------------------------------------
--
-- Table structure for table `so_no`
--

CREATE TABLE `so_no` (
  `id_no` int(11) NOT NULL,
  `loai` int(11) NOT NULL,
  `noidung` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `ngay` date NOT NULL,
  `sono` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `trano` int(11) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_unicode_ci;
--
-- Dumping data for table `so_no`
--

INSERT INTO `so_no` (
    `id_no`,
    `loai`,
    `noidung`,
    `ngay`,
    `sono`,
    `id_user`,
    `trano`
  )
VALUES (1, 1, 'ăn nướng', '2019-01-01', 20000, 1, 1),
  (2, 0, 'nợ trà sữa', '2019-01-01', 20000, 1, 0),
  (3, 0, 'nợ tình', '2019-01-04', 30000, 1, 0),
  (
    5,
    0,
    'trần huy vay đi bao trà sữa cho gái',
    '2019-01-04',
    300000,
    1,
    0
  ),
  (
    6,
    0,
    'nợ anh huy vốn kinh doanh',
    '2019-01-05',
    300000,
    2,
    0
  );
-- --------------------------------------------------------
--
-- Table structure for table `thu`
--

CREATE TABLE `thu` (
  `id_thu` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `noidung` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `ngay` date NOT NULL,
  `loai` int(11) NOT NULL,
  `thu` int(11) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_unicode_ci;
--
-- Dumping data for table `thu`
--

INSERT INTO `thu` (`id_thu`, `id_user`, `noidung`, `ngay`, `thu`)
VALUES (2, 1, 'code ra tiền', 1, '2019-01-04', 200000),
  (3, 1, 'code dạo', 1, '2019-01-04', 250000),
  (4, 2, 'bán quần áo', 1, '2019-01-05', 200000);
-- --------------------------------------------------------
--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `sex_user` int(11) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_unicode_ci;
--
-- Dumping data for table `user`
--

INSERT INTO `user` (
    `id_user`,
    `username`,
    `password`,
    `name`,
    `birthday`,
    `sex_user`
  )
VALUES (
    1,
    'vanhuy',
    '9400355b62bf8a006a56f2539c98664d',
    'văn huy',
    '2019-01-01',
    1
  ),
  (
    2,
    'minhnguyet',
    '7085e6b4fb5bf71436221f6ccd1af40c',
    'lý Minh nguyệt',
    '2019-01-05',
    0
  );
--
-- Indexes for dumped tables
--

--
-- Indexes for table `chi`
--
ALTER TABLE `chi`
ADD PRIMARY KEY (`id_chi`),
  ADD KEY `id_user` (`id_user`);
--
-- Indexes for table `cmt`
--
ALTER TABLE `cmt`
ADD PRIMARY KEY (`id_cmt`);
--
-- Indexes for table `so_no`
--
ALTER TABLE `so_no`
ADD PRIMARY KEY (`id_no`),
  ADD KEY `id_user` (`id_user`);
--
-- Indexes for table `thu`
--
ALTER TABLE `thu`
ADD PRIMARY KEY (`id_thu`),
  ADD KEY `id_user` (`id_user`);
--
-- Indexes for table `user`
--
ALTER TABLE `user`
ADD PRIMARY KEY (`id_user`);
--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chi`
--
ALTER TABLE `chi`
MODIFY `id_chi` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 5;
--
-- AUTO_INCREMENT for table `cmt`
--
ALTER TABLE `cmt`
MODIFY `id_cmt` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `so_no`
--
ALTER TABLE `so_no`
MODIFY `id_no` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 8;
--
-- AUTO_INCREMENT for table `thu`
--
ALTER TABLE `thu`
MODIFY `id_thu` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 6;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `chi`
--
ALTER TABLE `chi`
ADD CONSTRAINT `chi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
--
-- Constraints for table `so_no`
--
ALTER TABLE `so_no`
ADD CONSTRAINT `so_no_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
--
-- Constraints for table `thu`
--
ALTER TABLE `thu`
ADD CONSTRAINT `thu_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */
;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */
;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */
;