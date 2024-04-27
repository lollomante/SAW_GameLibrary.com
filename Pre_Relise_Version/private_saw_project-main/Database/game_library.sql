-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 01, 2024 at 11:03 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `game_library`
--

-- --------------------------------------------------------

--
-- Table structure for table `developer`
--

CREATE TABLE `developer` (
  `dev_id` int(11) NOT NULL,
  `dev_name` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `developer`
--

INSERT INTO `developer` (`dev_id`, `dev_name`) VALUES
(1, 'Asobo Studios'),
(2, 'Punpking'),
(3, 'Frictional Games'),
(4, 'Ubisoft Montreal'),
(5, 'Ubisoft Sofia'),
(6, 'Ubisoft Quebec'),
(7, 'Climax Studios'),
(8, 'Acme Gamestudios'),
(9, 'Japan Studios'),
(10, 'Stormind Games'),
(11, 'Quantic Dream'),
(12, 'CD Project Red');

-- --------------------------------------------------------

--
-- Table structure for table `dlc_rel`
--

CREATE TABLE `dlc_rel` (
  `father_game_id` int(11) NOT NULL,
  `child_game_name` char(100) NOT NULL,
  `child_game_id` int(11) NOT NULL,
  `type_of_rel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `game`
--

CREATE TABLE `game` (
  `game_id` int(11) NOT NULL,
  `name` char(255) NOT NULL,
  `series` char(255) NOT NULL,
  `type` char(255) NOT NULL,
  `engine` char(255) DEFAULT NULL,
  `genre` char(255) DEFAULT NULL,
  `dev_id` char(255) DEFAULT NULL,
  `pub_id` char(255) DEFAULT NULL,
  `publ_date` char(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `trailer_link` text DEFAULT NULL,
  `trailer_title` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `game`
--

INSERT INTO `game` (`game_id`, `name`, `series`, `type`, `engine`, `genre`, `dev_id`, `pub_id`, `publ_date`, `description`, `trailer_link`, `trailer_title`) VALUES
(1, 'A Plague Tale: Innocence', 'A Plague Tale', 'game', 'Unreal Engine 4', 'Survival horror, stealth', '1', '1', '20/12/2017', 'A Plague Tale: Innocence is an action-adventure stealth game developed by Asobo Studio and published by Focus Home Interactive. The game was released for PlayStation 4, Windows, and Xbox One in May 2019. It was made available on the cloud-based service Amazon Luna in November 2020. The PlayStation 5 and Xbox Series X/S versions of the game were released in July 2021, alongside a cloud version for the Nintendo Switch.\r\n\r\nSet in mid-14th century Aquitaine, France, during the Hundred Years\' War, the game focuses on the plight of Amicia de Rune and her ill brother Hugo as they flee from soldiers of the French Inquisition and from hordes of rats that are spreading the black plague. The player controls Amicia, using a combination of stealth and limited tools to hide from, distract, or knock out soldiers, evade rat hordes, and solve puzzles, incorporating elements of survival horror games.\r\n\r\nA Plague Tale: Innocence received generally positive reviews from critics and sold over one million units by July 2020. A sequel, A Plague Tale: Requiem, was released in 2022. ', 'https://www.youtube.com/embed/CtP6mNeN6yE', 'A Plague Tale: Innocence - Launch Trailer | PS4'),
(2, 'A Plague Tale: Requiem', 'A Plague Tale', 'game', 'Zouna Engine', 'Survival horror, stealth', '1', '1', '20/12/2017', 'A Plague Tale: Requiem is an action-adventure stealth video game developed by Asobo Studio and published by Focus Entertainment. The game is the sequel to A Plague Tale: Innocence (2019), and follows siblings Amicia and Hugo de Rune who must look for a cure to Hugo\'s blood disease in Southern France while fleeing from soldiers of the Inquisition and hordes of rats that are spreading the black plague. It was released for Nintendo Switch (cloud version), PlayStation 5, Windows, and Xbox Series X/S on 18 October 2022. It received generally positive reviews from critics. At The Game Awards 2022, it received five nominations including Game of the Year. ', NULL, NULL),
(3, 'Alt F4', 'Alt F4', 'game', 'Unreal Engine 4', 'Platform', '2', '2', '20/12/2017', NULL, NULL, NULL),
(4, 'Amnesia: Rebirth', 'Amnesia', 'game', 'HPL Engine', 'Survival horror', '3', '3', '20/12/2017', 'Amnesia: Rebirth is a 2020 survival horror video game developed and published by Frictional Games. It was released for Windows, Linux, and PlayStation 4 on 20 October 2020, for Amazon Luna on 22 October 2021, and for Xbox One and Xbox Series X/S on 20 October 2022. It is the third installment in the franchise and serves as a sequel to Amnesia: The Dark Descent (2010). The game received generally favorable reviews. ', NULL, NULL),
(5, 'Cyberpunk2077', 'Cyberpunk', 'game', 'RED Engine', 'RPG', '12', '12', '10/12/2020', 'Cyberpunk 2077 is a 2020 action role-playing video game developed by CD Projekt Red and published by CD Projekt, based on video game designer Mike Pondsmith\'s game series. Set in a dystopian cyberpunk universe, the player assumes the role of \"V\" (played by Gavin Drea/Cherami Leigh), a mercenary in the fictional Californian city known as \"Night City\", where they deal with the fallout from a heist gone wrong that results in an experimental cybernetic \"bio-chip\" containing an engram of the legendary rock star and terrorist Johnny Silverhand (played by Keanu Reeves) threatening to slowly overwrite V\'s mind; as the story progresses V and Johnny must work together to find a way to be separated and save V\'s life.\r\n            The game\'s development began following the release of The Witcher 3: Wild Hunt – Blood and Wine (2016). The game was developed by a team of around 500 people using the REDengine 4 game engine. CD Projekt launched a new division in Wrocław, Poland, and partnered with Digital Scapes, Nvidia, QLOC, and Jali Research to aid the production. Cyberpunk creator Mike Pondsmith was a consultant, and actor Keanu Reeves had a starring role. The original score was led by Marcin Przybyłowicz, and featured the contributions of several licensed artists. After years of anticipation, CD Projekt released Cyberpunk 2077 for PlayStation 4, Stadia, Windows, and Xbox One on 10 December 2020, followed by PlayStation 5 and Xbox Series X/S on 15 February 2022.', 'https://www.youtube.com/embed/qIcTM8WXFjk', 'Cyberpunk 2077 – trailer ufficiale E3 2019'),
(6, 'Asterigos: Curse of the Stars', 'Asterigos', '', NULL, 'action RPG, metroidvania', NULL, NULL, '2022-10-11', 'Asterigos: Curse of the Stars is a third-person hack and slash role-playing video game with Soulslike elements, developed by Acme Gamestudio and published by TinyBuild. The game was released for PlayStation 4, PlayStation 5, Windows, Xbox One, and Xbox Series X/S on October 11, 2022.[1] Set in a fantasy world, it follows a young woman named Hilda, who travels to Aphes, a cursed city that is stuck in time, to find her missing father and tribespeople.  Asterigos received positive reviews from critics, who praised its graphics, combat and story, but thought the game lacked polish, with inconsistent voiced scenes and overly easy bosses', 'https://www.youtube.com/embed/QtMpSWG1wp8', 'Asterigos - Official Trailer | PS5, PS4');

-- --------------------------------------------------------

--
-- Table structure for table `library_rel`
--

CREATE TABLE `library_rel` (
  `user_id` int(255) NOT NULL,
  `game_id` int(255) NOT NULL,
  `platform` char(100) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `year` char(10) NOT NULL,
  `main_compl` tinyint(1) DEFAULT NULL,
  `secondary_compl` tinyint(1) DEFAULT NULL,
  `objectives_compl` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `library_rel`
--

INSERT INTO `library_rel` (`user_id`, `game_id`, `platform`, `price`, `year`, `main_compl`, `secondary_compl`, `objectives_compl`) VALUES
(1, 2, 'a', 0, '', 0, 0, 0),
(7, 6, NULL, NULL, '', NULL, NULL, NULL),
(47, 1, 'Epic Games Launcer', 0, '2021', 1, 0, 0),
(47, 2, NULL, NULL, '', NULL, NULL, NULL),
(47, 3, NULL, NULL, '', NULL, NULL, NULL),
(47, 4, NULL, NULL, '', NULL, NULL, NULL),
(47, 5, NULL, NULL, '', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `publisher`
--

CREATE TABLE `publisher` (
  `pub_id` int(11) NOT NULL,
  `pub_name` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `publisher`
--

INSERT INTO `publisher` (`pub_id`, `pub_name`) VALUES
(1, 'Focus Entrateinment'),
(2, 'Punpking'),
(3, 'Frictional Games'),
(4, 'Ubisoft'),
(5, 'Tyni Build'),
(6, 'PS Studios'),
(7, 'Team 17'),
(8, 'Quantic Dream'),
(9, 'CD Project Red');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `firstname` char(100) NOT NULL,
  `lastname` char(100) NOT NULL,
  `email` char(100) NOT NULL,
  `pass` char(100) NOT NULL,
  `newsletter` tinyint(1) NOT NULL DEFAULT 0,
  `admin` tinyint(1) NOT NULL DEFAULT 0,
  `banned` tinyint(1) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL,
  `profilePic` mediumblob DEFAULT NULL,
  `remember_user_id` varchar(255) DEFAULT NULL,
  `remember_user_token` varchar(255) DEFAULT NULL,
  `remember_expire` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`firstname`, `lastname`, `email`, `pass`, `newsletter`, `admin`, `banned`, `user_id`, `profilePic`, `remember_user_id`, `remember_user_token`, `remember_expire`) VALUES
('root', 'root', 'root@root.it', '$2y$10$JG7Aubu9Na68wHY/OZCxj.5FbtKyYvRCk04EPbbg9ydvnQRmtYkL2', 0, 1, 0, 7, NULL, NULL, NULL, NULL),
('lorenzo', 'mantero', 'lorenzomantero2002@gmail.com', '$2y$10$MkpzrryW9AOucak8uvmPHOnc/lgTAIwsjzj9SOvol7sRpWY0c4kE2', 0, 0, 0, 47, NULL, 'ad061ede3c56dbdb0f0701f942780eb4c089fc465c16b1a48d514c4d06c2f9dc', '$2y$10$cBdczMHIqx6OezK7oZGp6uNXobc1dHcpIdjJeuzCB3mOtX9hUMNoW', '1703865700');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `developer`
--
ALTER TABLE `developer`
  ADD PRIMARY KEY (`dev_id`);

--
-- Indexes for table `dlc_rel`
--
ALTER TABLE `dlc_rel`
  ADD PRIMARY KEY (`father_game_id`,`child_game_id`);

--
-- Indexes for table `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`game_id`);

--
-- Indexes for table `library_rel`
--
ALTER TABLE `library_rel`
  ADD PRIMARY KEY (`user_id`,`game_id`);

--
-- Indexes for table `publisher`
--
ALTER TABLE `publisher`
  ADD PRIMARY KEY (`pub_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `developer`
--
ALTER TABLE `developer`
  MODIFY `dev_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `game`
--
ALTER TABLE `game`
  MODIFY `game_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `publisher`
--
ALTER TABLE `publisher`
  MODIFY `pub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
