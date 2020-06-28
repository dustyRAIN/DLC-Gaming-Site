-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2019 at 11:11 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dlc_gaming_site`
--

-- --------------------------------------------------------

--
-- Table structure for table `game`
--

CREATE TABLE `game` (
  `game_id` int(11) NOT NULL,
  `request_id` int(11) DEFAULT NULL,
  `short_desc` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `game`
--

INSERT INTO `game` (`game_id`, `request_id`, `short_desc`) VALUES
(1, 1, 'Counter-Strike: Global Offensive (CS: GO) expands upon the team-based action gameplay that it pioneered when it was launched 19 years ago.'),
(2, 2, 'assassin creed finest game of the world'),
(3, 3, 'Overwatch Overwatch Overwatch Overwatch');

-- --------------------------------------------------------

--
-- Table structure for table `game_ratings`
--

CREATE TABLE `game_ratings` (
  `game_id` int(11) NOT NULL,
  `user_id` varchar(30) NOT NULL,
  `points` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `game_ratings`
--

INSERT INTO `game_ratings` (`game_id`, `user_id`, `points`) VALUES
(2, 'lamisa', 3);

-- --------------------------------------------------------

--
-- Table structure for table `game_req_genre`
--

CREATE TABLE `game_req_genre` (
  `request_id` int(11) NOT NULL,
  `type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `game_req_genre`
--

INSERT INTO `game_req_genre` (`request_id`, `type`) VALUES
(1, 'Action'),
(1, 'Multiplayer'),
(1, 'Shooting'),
(1, 'Stategy'),
(2, 'Action'),
(2, 'Open World'),
(2, 'Stategy'),
(3, 'Action'),
(3, 'FPS'),
(3, 'Multiplayer'),
(3, 'Open World'),
(3, 'RPG');

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`type`) VALUES
('Action'),
('Arcade'),
('FPS'),
('Multiplayer'),
('Open World'),
('RPG'),
('Shooting'),
('Simulation'),
('Sports'),
('Stategy');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `request_id` int(11) NOT NULL,
  `uploader_id` varchar(30) DEFAULT NULL,
  `game_name` varchar(500) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `vid_url` varchar(800) DEFAULT NULL,
  `pic_url` varchar(800) DEFAULT NULL,
  `state` int(11) DEFAULT NULL,
  `file_url` varchar(800) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`request_id`, `uploader_id`, `game_name`, `description`, `vid_url`, `pic_url`, `state`, `file_url`) VALUES
(1, 'lamisa', 'Counter Strike: GO', 'Counter-Strike: Global Offensive (CS: GO) expands upon the team-based action gameplay that it pioneered when it was launched 19 years ago. CS: GO features new maps, characters, weapons, and game modes, and delivers updated versions of the classic CS content (de_dust2, etc.).', 'edYCtaNueQY', 'https://www.mithesports.com/wp-content/uploads/2015/09/CSGO.jpg', 3, 'https://www.mithesports.com/wp-content/uploads/2015/09/CSGO.jpg'),
(2, 'lamisa', 'Assassin creed', 'Y0Oa4Lp5fLE Y0Oa4Lp5fLE Y0Oa4Lp5fLE Y0Oa4Lp5fLE', 'Y0Oa4Lp5fLE', 'https://cdn.ndtv.com/tech/gadgets/Assassins_Creed_Ezio_ubisoft.jpg?output-quality=80&output-format=webp', 3, 'https://cdn.ndtv.com/tech/gadgets/Assassins_Creed_Ezio_ubisoft.jpg?output-quality=80&output-format=webp'),
(3, 'lamisa', 'Overwatch', 'Overwatch Overwatch Overwatch Overwatch', 'wMOM34XEi2k', 'https://cdn.vox-cdn.com/thumbor/XEtr5sx6s-7B5HjbqWkl9D6VW98=/0x0:1920x1080/920x613/filters:focal(821x172:1127x478):format(webp)/cdn.vox-cdn.com/uploads/chorus_image/image/65609038/vlcsnap_2019_11_01_15h22m17s784.0.jpg', 3, 'https://cdn.vox-cdn.com/thumbor/XEtr5sx6s-7B5HjbqWkl9D6VW98=/0x0:1920x1080/920x613/filters:focal(821x172:1127x478):format(webp)/cdn.vox-cdn.com/uploads/chorus_image/image/65609038/vlcsnap_2019_11_01_15h22m17s784.0.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `selected_game`
--

CREATE TABLE `selected_game` (
  `game_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `selected_game`
--

INSERT INTO `selected_game` (`game_id`) VALUES
(1),
(2),
(3);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` varchar(30) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(400) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `name`, `email`, `password`) VALUES
('lamisa', 'Farhat Lamisa', 'lamisa@gmail.co', '646f5f8ef540e353d347b43d97a94c44'),
('shayam', 'Shayam Imtiaz', 'shayam@gmail.com', 'cccde0e468275ea8d63eb4207eb41a7f');

-- --------------------------------------------------------

--
-- Table structure for table `user_game_list`
--

CREATE TABLE `user_game_list` (
  `game_id` int(11) NOT NULL,
  `user_id` varchar(30) NOT NULL,
  `is_downloaded` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`game_id`);

--
-- Indexes for table `game_ratings`
--
ALTER TABLE `game_ratings`
  ADD PRIMARY KEY (`game_id`,`user_id`);

--
-- Indexes for table `game_req_genre`
--
ALTER TABLE `game_req_genre`
  ADD PRIMARY KEY (`request_id`,`type`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`type`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `selected_game`
--
ALTER TABLE `selected_game`
  ADD PRIMARY KEY (`game_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_game_list`
--
ALTER TABLE `user_game_list`
  ADD PRIMARY KEY (`game_id`,`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `game`
--
ALTER TABLE `game`
  MODIFY `game_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
