-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 18, 2019 at 08:45 AM
-- Server version: 5.7.25
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `lost_pets`
--
CREATE DATABASE IF NOT EXISTS `lost_pets` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `lost_pets`;

-- --------------------------------------------------------

--
-- Table structure for table `found`
--

CREATE TABLE `found` (
  `id_user` int(11) NOT NULL,
  `id_pet` int(11) NOT NULL,
  `location` varchar(120) DEFAULT NULL,
  `found` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `found`
--

INSERT INTO `found` (`id_user`, `id_pet`, `location`, `found`) VALUES
(98, 33, '47.179177380991185 27.583848779851735', 1),
(98, 33, '47.18483427216482 27.56200096823952', 1),
(98, 33, '47.186130558165296 27.582461617209702', 1),
(98, 25, '47.29162441385387 27.51607721502131', 1),
(98, 25, '47.28609653269148 27.525787353515614', 1),
(98, 33, '47.182477307427725 27.565295479514386', 1),
(98, 33, '47.191079722631116 27.563908316872357', 0),
(98, 33, '47.19402543476384 27.549343109130856', 0),
(98, 33, '47.18070951520131 27.56200096823952', 0),
(98, 33, '47.18070951520131 27.56200096823952', 0),
(98, 49, '47.28869941338924 27.505320343188952', 1),
(98, 50, '47.28869941338924 27.505320343188952', 1),
(98, 51, '', 0),
(98, 52, '', 0),
(98, 33, '47.16668294432585 27.56408171220261', 0),
(100, 28, '47.29327207932944 27.5078079917214', 0),
(98, 26, '47.29013311899259 27.53446925770154', 1),
(98, 26, '47.25978060522814 27.51192786476828', 1),
(98, 26, '47.29330853856298 27.51366181807086', 0),
(98, 26, '47.26001596298972 27.53256190906871', 0),
(98, 26, '47.2800175488042 27.53516283902256', 1),
(98, 26, '47.28272306520164 27.498229633678086', 0),
(98, 53, '', 0),
(98, 54, '', 0),
(98, 54, '47.30521466391154 27.496006705544197', 0),
(98, 54, '47.30932973798263 27.513172843239516', 0),
(98, 54, '47.29768912852212 27.515080191872347', 0),
(98, 54, '47.301922373989036 27.485949776389386', 0),
(98, 54, '47.30991757955468 27.48959107832476', 0),
(98, 54, '47.30838917786812 27.505023262717494', 0),
(98, 54, '47.31379716995636 27.48889749700374', 0),
(98, 54, '47.31403228749413 27.50484986738724', 0),
(98, 54, '47.307331027732744 27.488550706343236', 0),
(98, 53, '47.27879531581173 27.529893354936082', 0),
(98, 55, '47.297284600658344 27.510695598426874', 0),
(98, 55, '47.287084536831735 27.497619282115597', 0),
(98, 55, '47.31060299457163 27.513051466508365', 0),
(98, 56, '47.257522294325994 27.5145102956925', 1),
(98, 56, '47.23497313170744 27.55081523548475', 1),
(98, 57, '47.166160707177454 27.592050953429542', 1),
(98, 57, '47.17478698234796 27.57447849620473', 1),
(98, 58, '47.15755425403707 27.58875644215468', 0),
(98, 58, '47.17351870834666 27.58716930042615', 0),
(98, 58, '47.164559774857956 27.569309581409787', 0),
(98, 58, '47.1442787196545 27.597052834250714', 0),
(98, 58, '47.14298141197486 27.57971330122515', 0),
(98, 58, '47.17245786110463 27.612138227982935', 0),
(99, 58, '47.13967903138851 27.608150135387096', 1),
(99, 58, '47.153948561094275 27.605029019442487', 0),
(99, 58, '47.14923178504497 27.566708651455972', 0),
(99, 58, '47.15347690232705 27.575551813299015', 1),
(99, 59, '47.16551232254222 27.5969060226767', 1),
(100, 60, '47.1760033635881 27.60817671914333', 0),
(99, 61, '47.14570336108792 27.591183976778275', 0),
(100, 61, '47.13708533759722 27.57691470059483', 1),
(102, 62, '47.15248404694167 27.60886856651105', 1),
(102, 63, '47.15177653772403 27.590835452164427', 1),
(98, 63, '47.13661117192987 27.5796924937855', 1),
(98, 64, '47.14823885035256 27.57939309432088', 1),
(99, 64, '47.155102928266274 27.575645446777344', 1),
(99, 65, '47.1616230382968 27.59638410273264', 1),
(98, 66, '47.16451144147986 27.600373929281822', 1),
(102, 67, '47.15885120605448 27.591010581448018', 1),
(102, 68, '47.15401695126805 27.59049039545722', 0),
(102, 69, '47.146705779364055 27.605749184519738', 0),
(100, 70, '47.16138606451893 27.593091325411073', 1),
(103, 69, '47.14651119231536 27.592199498956866', 1),
(103, 71, '47.14759142807491 27.589970209466454', 0);

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id_user` int(11) NOT NULL,
  `lat` varchar(30) NOT NULL,
  `lng` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id_user`, `lat`, `lng`) VALUES
(98, '47.277093339999986', '27.50917711999999'),
(99, '47.277093339999986', '27.50917711999999'),
(100, '47.27709334000041', '27.509177119999695'),
(101, '47.17403663547209', '27.57495160920718');

-- --------------------------------------------------------

--
-- Table structure for table `owner`
--

CREATE TABLE `owner` (
  `id_user` int(11) NOT NULL,
  `id_pet` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `owner`
--

INSERT INTO `owner` (`id_user`, `id_pet`) VALUES
(98, 64),
(99, 65),
(98, 66),
(102, 67),
(102, 68),
(102, 69),
(100, 70),
(103, 71);

-- --------------------------------------------------------

--
-- Table structure for table `pet`
--

CREATE TABLE `pet` (
  `id_pet` int(11) NOT NULL,
  `gallery` varchar(30) NOT NULL,
  `location` varchar(50) DEFAULT NULL,
  `name` varchar(30) NOT NULL,
  `species` varchar(30) NOT NULL,
  `breed` varchar(30) NOT NULL,
  `details` varchar(150) DEFAULT NULL,
  `reward` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pet`
--

INSERT INTO `pet` (`id_pet`, `gallery`, `location`, `name`, `species`, `breed`, `details`, `reward`) VALUES
(64, '1560841987.jpg', '47.14823885035256 27.57939309432088', 'Labradorus', 'Dog', 'labrador', 'Im labraDorus', 'No'),
(65, '1560842237.jpg', '47.1616230382968 27.59638410273264', 'Bleg', 'Dog', 'affenpinscher', 'im bleg', 'No'),
(66, '1560842697.JPG', '47.16451144147986 27.600373929281822', 'Gatu', 'Dog', 'affenpinscher', 'Im really really lost', 'No'),
(67, '1560843214.webp', '47.15885120605448 27.591010581448018', 'losticiune', 'Dog', 'affenpinscher', 'mam pierdut', 'No'),
(68, '1560843245.jpg', '47.15401695126805 27.59049039545722', 'losticiune2', 'Dog', 'affenpinscher', 'wheres daddy', 'No'),
(69, '1560843266.JPG', '47.146705779364055 27.605749184519738', 'bai', 'Dog', 'affenpinscher', 'csfnaicsf', 'No'),
(70, '1560843490.jpeg', '47.16138606451893 27.593091325411073', 'kitty', 'Cat', 'Abyssinian', '1231415', 'No'),
(71, '1560844294.jpg', '47.14759142807491 27.589970209466454', 'madlib', 'Dog', 'affenpinscher', 'suras', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `mail` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `avatar` varchar(40) DEFAULT 'default.jpg',
  `phone` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `mail`, `lname`, `fname`, `password`, `avatar`, `phone`) VALUES
(98, 'emiradu98@icloud.com', 'Emilian', 'Radu', 'c81abaf7085837104f5ead1e1aecb46b988de958f17c32e091566e1e2e869f68', '1560287785.JPG', '0757595727'),
(99, 'andrei@gmail.com', 'Andrei', 'Balteanu', 'c81abaf7085837104f5ead1e1aecb46b988de958f17c32e091566e1e2e869f68', 'default.jpg', '0757595727'),
(100, 'gatu@gmail.com', 'Cristian', 'Gatu', 'c81abaf7085837104f5ead1e1aecb46b988de958f17c32e091566e1e2e869f68', '1560290254.JPG', '0721556123'),
(101, 'andra@gmail.com', 'Andra', 'Lidia', 'c81abaf7085837104f5ead1e1aecb46b988de958f17c32e091566e1e2e869f68', '1560320640.JPG', '0757595727'),
(102, 'emi@radu.com', 'Emilian', 'Radu', 'c81abaf7085837104f5ead1e1aecb46b988de958f17c32e091566e1e2e869f68', '1560841317.JPG', '0757595727'),
(103, 'teona@gmail.com', 'teona', 'solescu', 'c81abaf7085837104f5ead1e1aecb46b988de958f17c32e091566e1e2e869f68', 'default.jpg', '0757595727');

-- --------------------------------------------------------

--
-- Table structure for table `verify`
--

CREATE TABLE `verify` (
  `id_user` int(11) NOT NULL,
  `activate_code` varchar(30) NOT NULL,
  `activated` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `verify`
--

INSERT INTO `verify` (`id_user`, `activate_code`, `activated`) VALUES
(98, 'owEOdXnUeL', 1),
(99, '2rQB5y3xqu', 0),
(100, 'WPgF3jwOuN', 1),
(101, '0CEBTuY26w', 0),
(102, 'klenKztUCA', 1),
(103, '9vQWarRN8M', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD UNIQUE KEY `id_user` (`id_user`);

--
-- Indexes for table `owner`
--
ALTER TABLE `owner`
  ADD KEY `fk_user` (`id_user`),
  ADD KEY `fk_pet` (`id_pet`);

--
-- Indexes for table `pet`
--
ALTER TABLE `pet`
  ADD PRIMARY KEY (`id_pet`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `mail` (`mail`);

--
-- Indexes for table `verify`
--
ALTER TABLE `verify`
  ADD UNIQUE KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pet`
--
ALTER TABLE `pet`
  MODIFY `id_pet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `location`
--
ALTER TABLE `location`
  ADD CONSTRAINT `foreign` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE;

--
-- Constraints for table `owner`
--
ALTER TABLE `owner`
  ADD CONSTRAINT `fk_pet` FOREIGN KEY (`id_pet`) REFERENCES `pet` (`id_pet`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE;

--
-- Constraints for table `verify`
--
ALTER TABLE `verify`
  ADD CONSTRAINT `fk` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE;
