-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2024 at 08:43 PM
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
-- Database: `release_game_library`
--

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
  `engine` char(255) DEFAULT NULL,
  `genre` char(255) DEFAULT NULL,
  `developer` char(255) DEFAULT NULL,
  `publisher` char(255) DEFAULT NULL,
  `publ_date` char(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `trailer_link` text DEFAULT NULL,
  `trailer_title` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `game`
--

INSERT INTO `game` (`game_id`, `name`, `series`, `engine`, `genre`, `developer`, `publisher`, `publ_date`, `description`, `trailer_link`, `trailer_title`) VALUES
(1, 'A Plague Tale: Innocence', 'A Plague Tale', 'Unreal Engine 4', 'Survival horror, stealth', 'Asobo Studio', 'Focus Home Interactive', '20/12/2017', 'A Plague Tale: Innocence is an action-adventure stealth game developed by Asobo Studio and published by Focus Home Interactive. The game was released for PlayStation 4, Windows, and Xbox One in May 2019. It was made available on the cloud-based service Amazon Luna in November 2020. The PlayStation 5 and Xbox Series X/S versions of the game were released in July 2021, alongside a cloud version for the Nintendo Switch.\r\n\r\nSet in mid-14th century Aquitaine, France, during the Hundred Years\' War, the game focuses on the plight of Amicia de Rune and her ill brother Hugo as they flee from soldiers of the French Inquisition and from hordes of rats that are spreading the black plague. The player controls Amicia, using a combination of stealth and limited tools to hide from, distract, or knock out soldiers, evade rat hordes, and solve puzzles, incorporating elements of survival horror games.\r\n\r\nA Plague Tale: Innocence received generally positive reviews from critics and sold over one million units by July 2020. A sequel, A Plague Tale: Requiem, was released in 2022. ', 'https://www.youtube.com/embed/CtP6mNeN6yE', 'A Plague Tale: Innocence - Launch Trailer | PS4'),
(2, 'A Plague Tale: Requiem', 'A Plague Tale', 'Zouna Engine', 'Survival horror, stealth', 'Asobo Studio', 'Focus Home Interactive', '20/12/2017', 'A Plague Tale: Requiem is an action-adventure stealth video game developed by Asobo Studio and published by Focus Entertainment. The game is the sequel to A Plague Tale: Innocence (2019), and follows siblings Amicia and Hugo de Rune who must look for a cure to Hugo\'s blood disease in Southern France while fleeing from soldiers of the Inquisition and hordes of rats that are spreading the black plague. It was released for Nintendo Switch (cloud version), PlayStation 5, Windows, and Xbox Series X/S on 18 October 2022. It received generally positive reviews from critics. At The Game Awards 2022, it received five nominations including Game of the Year. ', 'https://www.youtube.com/embed/qIbzwb8vzNI', 'A Plague Tale: Requiem - Launch Trailer'),
(3, 'Alt F4', 'Alt F4', 'Unreal Engine 4', 'Platform', 'Punpking', 'Punpking', '20/12/2017', ' ALTF4?\r\nThe Way You Play Games Is Simple!!Become a somewhat clumsy Knight and overcome Trap!!But the way to get there won\'t be simple.Will you be able to overcome the various traps and irritating terrains in your way?', 'https://www.youtube.com/embed/_2WpMZz3uvw', 'ALTF4 - Official Launch Trailer'),
(4, 'Amnesia: Rebirth', 'Amnesia', 'HPL Engine', 'Survival horror', 'Frictional Games', 'Frictional Games', '20/12/2017', 'Amnesia: Rebirth is a 2020 survival horror video game developed and published by Frictional Games. It was released for Windows, Linux, and PlayStation 4 on 20 October 2020, for Amazon Luna on 22 October 2021, and for Xbox One and Xbox Series X/S on 20 October 2022. It is the third installment in the franchise and serves as a sequel to Amnesia: The Dark Descent (2010). The game received generally favorable reviews. ', 'https://www.youtube.com/embed/zZGDBBk89Vk', 'Amnesia: Rebirth - Launch Trailer | PS4'),
(5, 'Cyberpunk2077', 'Cyberpunk', 'RED Engine', 'RPG', 'CD Project RED', 'CD Project RED', '10/12/2020', 'Cyberpunk 2077 is a 2020 action role-playing video game developed by CD Projekt Red and published by CD Projekt, based on video game designer Mike Pondsmith\'s game series. Set in a dystopian cyberpunk universe, the player assumes the role of \"V\" (played by Gavin Drea/Cherami Leigh), a mercenary in the fictional Californian city known as \"Night City\", where they deal with the fallout from a heist gone wrong that results in an experimental cybernetic \"bio-chip\" containing an engram of the legendary rock star and terrorist Johnny Silverhand (played by Keanu Reeves) threatening to slowly overwrite V\'s mind; as the story progresses V and Johnny must work together to find a way to be separated and save V\'s life.\r\n            The game\'s development began following the release of The Witcher 3: Wild Hunt – Blood and Wine (2016). The game was developed by a team of around 500 people using the REDengine 4 game engine. CD Projekt launched a new division in Wrocław, Poland, and partnered with Digital Scapes, Nvidia, QLOC, and Jali Research to aid the production. Cyberpunk creator Mike Pondsmith was a consultant, and actor Keanu Reeves had a starring role. The original score was led by Marcin Przybyłowicz, and featured the contributions of several licensed artists. After years of anticipation, CD Projekt released Cyberpunk 2077 for PlayStation 4, Stadia, Windows, and Xbox One on 10 December 2020, followed by PlayStation 5 and Xbox Series X/S on 15 February 2022.', 'https://www.youtube.com/embed/qIcTM8WXFjk', 'Cyberpunk 2077 – trailer ufficiale E3 2019'),
(6, 'Asterigos: Curse of the Stars', 'Asterigos', 'Unreal Engine 4', 'action RPG, metroidvania', 'Acme Gamestudio', 'Tiny Build', '2022-10-11', 'Asterigos: Curse of the Stars is a third-person hack and slash role-playing video game with Soulslike elements, developed by Acme Gamestudio and published by TinyBuild. The game was released for PlayStation 4, PlayStation 5, Windows, Xbox One, and Xbox Series X/S on October 11, 2022.[1] Set in a fantasy world, it follows a young woman named Hilda, who travels to Aphes, a cursed city that is stuck in time, to find her missing father and tribespeople.  Asterigos received positive reviews from critics, who praised its graphics, combat and story, but thought the game lacked polish, with inconsistent voiced scenes and overly easy bosses', 'https://www.youtube.com/embed/QtMpSWG1wp8', 'Asterigos - Official Trailer | PS5, PS4'),
(7, 'Assassin\'s Creed: Odissey', 'Assassin\'s Creed', 'Anvil', 'RPG', 'Ubisoft Quebec', 'Ubisoft', '2018-10-05', 'Assassin\'s Creed Odyssey is a 2018 action role-playing video game developed by Ubisoft Quebec and published by Ubisoft. It is the eleventh major installment in the Assassin\'s Creed series and the successor to 2017\'s Assassin\'s Creed Origins. Like its predecessor, the game features a large open world and adopts many elements from the role-playing genre, putting more emphasis on combat and exploration than stealth. Naval combat from previous titles in the series also plays a prominent role in Odyssey. The game\'s plot tells a mythological history of the Peloponnesian War between Athens and Sparta from 431 to 422 BC. Players control a Spartan mercenary, who fights on both sides of the conflict as they attempt to find their family and eliminate the mysterious Cult of Kosmos. Odyssey also continues the story arc of Layla Hassan, a major character introduced in Origins, who relives the mercenary\'s memories through the Animus device to find a powerful artifact. ', 'https://www.youtube.com/embed/6F8L3d_OIE0', 'Assassin&#39;s Creed Odyssey - Launch Trailer'),
(8, 'Horizon: Zero Dawn', 'Horizon', 'Decima', 'action, RPG', 'Guerrilla Games', 'Sony', '2017-02-28', 'Horizon Zero Dawn is a 2017 action role-playing game developed by Guerrilla Games and published by Sony Interactive Entertainment. The game was released for PlayStation 4 in 2017 and Windows in 2020.  Horizon Zero Dawn is the first game of the Horizon video game series. The plot follows Aloy, a young hunter in a world overrun by machines, who sets out to uncover her past. The player uses ranged weapons, a spear, and stealth to combat mechanical creatures and other enemy forces. A skill tree provides the player with new abilities and bonuses. The player can explore the open world to discover locations and take on side quests. ', 'https://www.youtube.com/embed/JB5On4CiXYY', 'Horizon Zero Dawn | Nuovo Trailer di Lancio'),
(9, 'Horizon: Forbidden West', 'Horizon', 'Decima', 'action, RPG', 'Guerrilla Games', 'Sony', '2022-02-18', 'Horizon Forbidden West is a 2022 action role-playing game developed by Guerrilla Games and published by Sony Interactive Entertainment. The game was released for PlayStation 4 and PlayStation 5 on 18 February 2022.  The sequel to 2017\'s Horizon Zero Dawn, Horizon Forbidden West is set in a post-apocalyptic version of the Western United States recovering from the aftermath of an extinction event caused by a rogue robot swarm. The player can explore the open world and complete quests using ranged and melee weapons against hostile machine creatures.  Horizon Forbidden West received generally positive reviews from critics, and had sold over 8.4 million units by April 2023. An expansion, Burning Shores, was released for the PlayStation 5 version on 19 April 2023. The game and the Burning Shores expansion was collected together and re-released as Horizon Forbidden West - Complete Edition for PlayStation 5 on 6 October 2023, and will release for Windows in early 2024. ', 'https://www.youtube.com/embed/UxDWGW7Z67I', 'Horizon Forbidden West - Story Trailer | PS5, PS4'),
(10, 'Mass Effect: Legendary Edition', 'Mass Effect', 'Unreal Engine 3', 'RPG', 'Bioware', 'Elecrtonic Arts', '2021-03-14', 'Mass Effect Legendary Edition is a compilation of the video games in the Mass Effect trilogy: Mass Effect (2007), Mass Effect 2 (2010), and Mass Effect 3 (2012). It was developed by BioWare and published by Electronic Arts. All three games were remastered, with visual enhancements, technical improvements, and gameplay adjustments. Mass Effect, the first game of the trilogy, received more extensive upgrades than its counterparts, specifically with regard to graphics, combat mechanics, vehicle handling, and loading times.  Development on the Legendary Edition commenced in 2019 under the direction of Mac Walters, who previously served as lead writer for Mass Effect 2 and Mass Effect 3. BioWare decided to approach the project as a remaster as opposed to a remake in order to preserve the original trilogy experience. The compilation was announced on November 7, 2020, and released on May 14, 2021, for PlayStation 4, Windows, and Xbox One. Legendary Edition received very positive reviews from video game publications, who praised the enhanced experience of the first game in addition to the convenience and scope of the overall package. Minor criticism was aimed at the extent of the gameplay and visual changes in certain regards. ', 'https://www.youtube.com/embed/Jh37cTUuSdQ', 'Mass Effect Legendary Edition - Official Reveal Trailer | PS5, PS4'),
(11, 'Immortals Fenyx: Rising', 'Immortals Fenyx', 'Anvil', 'action, rpg', 'Ubisoft Quebec', 'Ubisoft', '2020-12-03', 'Immortals Fenyx Rising is a 2020 action-adventure video game developed by Ubisoft Quebec and published by Ubisoft. The game was released for Nintendo Switch, PlayStation 4, PlayStation 5, Stadia, Windows, Xbox One, and Xbox Series X/S.  Immortals Fenyx Rising tells the story, as narrated by Prometheus to Zeus, of Fenyx, a mortal who in order to rescue Fenyx\'s brother must stop the evil Typhon after his escape from the underworld. The game received positive reviews from critics. ', 'https://www.youtube.com/embed/U4zb1yiFlQo', 'Immortals Fenyx Rising: Launch Trailer | Ubisoft [NA]');

-- --------------------------------------------------------

--
-- Table structure for table `library_rel`
--

CREATE TABLE `library_rel` (
  `user_id` int(255) NOT NULL,
  `game_id` int(255) NOT NULL,
  `main_compl` tinyint(1) DEFAULT NULL,
  `secondary_compl` tinyint(1) DEFAULT NULL,
  `objectives_compl` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `library_rel`
--

INSERT INTO `library_rel` (`user_id`, `game_id`, `main_compl`, `secondary_compl`, `objectives_compl`) VALUES
(1, 2, 0, 0, 0),
(7, 6, 1, NULL, NULL),
(7, 9, NULL, NULL, NULL),
(7, 10, NULL, NULL, NULL),
(47, 1, 1, 0, 0),
(47, 2, 1, 1, NULL),
(47, 3, NULL, NULL, NULL),
(47, 4, NULL, NULL, NULL),
(47, 5, NULL, NULL, NULL),
(47, 6, 1, NULL, NULL),
(47, 7, NULL, NULL, NULL),
(47, 8, NULL, NULL, NULL),
(47, 9, 1, 1, 1),
(47, 10, 1, 0, 0),
(47, 11, 1, NULL, NULL),
(75, 11, 1, 1, NULL),
(76, 1, NULL, NULL, NULL),
(76, 2, NULL, NULL, NULL),
(76, 3, NULL, NULL, NULL),
(76, 4, NULL, NULL, NULL),
(76, 5, NULL, NULL, NULL),
(76, 6, NULL, NULL, NULL),
(76, 7, NULL, NULL, NULL),
(76, 8, NULL, NULL, NULL),
(76, 9, NULL, NULL, NULL),
(76, 10, 1, 1, NULL),
(76, 11, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `firstname` char(100) NOT NULL,
  `lastname` char(100) NOT NULL,
  `email` char(100) NOT NULL,
  `pass` char(100) NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT 0,
  `banned` tinyint(1) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL,
  `profilePic` mediumblob DEFAULT NULL,
  `remember_user_token` varchar(255) DEFAULT NULL,
  `remember_user_id` varchar(255) DEFAULT NULL,
  `remember_expire` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`firstname`, `lastname`, `email`, `pass`, `admin`, `banned`, `user_id`, `profilePic`, `remember_user_token`, `remember_user_id`, `remember_expire`) VALUES
('root', 'root', 'root@root.it', '$2y$10$JG7Aubu9Na68wHY/OZCxj.5FbtKyYvRCk04EPbbg9ydvnQRmtYkL2', 1, 0, 7, NULL, NULL, NULL, NULL),
('q', 'q', 'q@q', '$2y$10$1UZbQlaCgvTyrK3yOVoiyeUJfaKJQRpGTobv2oBJjKoxDQvJdwn76', 0, 0, 52, NULL, NULL, NULL, NULL),
('w', 'w', 'w@w', '$2y$10$f7rtV8aTEHU5C6UY2ndFf.rDzidj5Grx5Aps.khGQk2/V8VvKS26m', 0, 0, 53, NULL, NULL, NULL, NULL),
('r', 'r', 'r@r', '$2y$10$We5aiDhPywTTGELHgvxQLuXDZR3fwDu29uXACnXdWJQOkDy8BarIK', 0, 0, 55, NULL, NULL, NULL, NULL),
('t', 't', 't@t', '$2y$10$s1k03EFFHyZ/mjqMg6n4YOtJyhzfLjBwuoICwbSwDfhdz1Voe8vVe', 0, 0, 56, NULL, NULL, NULL, NULL),
('Kxdzvehpu', 'Aquchsyvw', 'hqyat@ljkoipwyvb.nux', '$2y$10$fygvFd70OyJGlzFGtpE1PuX9t4L3NOZ4UZMwRv/zyHjqjKIGj8JJ2', 0, 0, 57, NULL, NULL, NULL, NULL),
('Aefuslaxv', 'Ynswgmtld', 'urxfj@walxouikqv.anc', '$2y$10$EzYRXD275jnhRjSTVqKvz./AUHCn.4fMHoTe4cbaxgeQkaFStNAFG', 0, 0, 58, NULL, NULL, NULL, NULL),
('Rmozebdnw', 'Ehvaxuycr', 'pycsj@levbqtizjd.rsa', '$2y$10$a2w7gBrJZ5q9CEg1c1mX7Ob3uOarbmvqLLb7Mr.gdfSsPZmL214RK', 0, 0, 59, NULL, NULL, NULL, NULL),
('Naezqygdv', 'Owdtnqlcv', 'tdmrb@jzlqkcurma.pkd', '$2y$10$q0aAVR6FG.z/k7Ql.tIyv.eQfD9GynfYvjEkFxwlNQ7aTIqbTGtUm', 0, 0, 60, NULL, NULL, NULL, NULL),
('Royedwnul', 'Bbgwmhpjk', 'kwegl@pdzkxbaife.rkx', '$2y$10$HIj.yWA60AYpf1yEcYKI0uDliJQWCpk76j7AZKF/RP2wwoUHl/bdq', 0, 0, 61, NULL, NULL, NULL, NULL),
('Thfrxamqs', 'Ksnltewzf', 'vnjaw@itmxbjuphr.wip', '$2y$10$8BlCUqk9x5PTxeaMqs8QkeLikexPJU2VvpFyr3CDTjk8RaL/LgmwK', 0, 0, 62, NULL, NULL, NULL, NULL),
('Qsmtlnkje', 'Fmiobkgjl', 'dljvk@xzqlbnkmve.fbo', '$2y$10$rCoUW2eDlHP.wovTmwqOAu0wiFPxURR3y6VwkfljZQxmDA6I45wB2', 0, 0, 63, NULL, NULL, NULL, NULL),
('Rahumzerg', 'Qfbysxovk', 'ulgdq@fvnmcxjhti.gci', '$2y$10$A/hh3T8RoMm7Et/AcFKz8uotkneajvj1bFSbJ6B7zkNnCSH9YJxfq', 0, 0, 64, NULL, NULL, NULL, NULL),
('Xlcwuhdbv', 'Axzrkamwc', 'qdtvi@rlmuwqxavb.qnr', '$2y$10$qVOMXmYpVunehN6Shk8Wc.xDm/LdHM9UTHRR2uc5oJWEz1sl7tcHi', 0, 0, 65, NULL, NULL, NULL, NULL),
('Ighlibyuo', 'Nftrkywzs', 'duoqz@jqklzxtays.kej', '$2y$10$MbI8Fhb6FtgfRfpL/8CaN.a8vvm7orowUtLbfJMaR9/4kBN/sqafW', 0, 0, 66, NULL, NULL, NULL, NULL),
('Qsvqpkect', 'Xaqxmbwyl', 'cmnvb@gchvqsxjnt.twa', '$2y$10$XVucyR7quRe8qkpJ/Dbp/.sLcFMBQS/5B5n5cuDxY5IYiXwcvuSmi', 0, 0, 67, NULL, NULL, NULL, NULL),
('ringo', 'ringo', 'ringo.aionagent@gmail.com', '$2y$10$J2QQULHGYZlixsTx3ySrUOsxjghkAL9WWMr5sTa0NXfdP5ZL5.fVy', 0, 0, 69, NULL, NULL, NULL, NULL),
('a', 'a', 'a@a', '$2y$10$qNAnjMOVadwbXpLrD.v7D.nH1KT4cgnTS3sOLLXw6cNMSxVwOYK9K', 0, 0, 73, NULL, NULL, NULL, NULL),
('mario', 'rossi', 'mario@rossi', '$2y$10$eG1LGbcqCLyUguom213zW.e.UnieX/FeEhMMK4ag0CVcfsj//MHbq', 0, 0, 74, NULL, NULL, NULL, NULL),
('gina', 'gina', 'gina@gina', '$2y$10$S0CwNCiK2FtmWiauTl5nauzgOKp.PkZ.FKhSeeHtllnrFQh8YVb3C', 0, 0, 75, NULL, NULL, NULL, NULL),
('lorenzo', 'mantero', 'lorenzomantero2002@gmail.com', '$2y$10$FveFql6OxxXYQv54K/T3e.GfSVbmYqSpRQ3gvrr.zlFDtzZqnd6vC', 0, 0, 76, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

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
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `game`
--
ALTER TABLE `game`
  MODIFY `game_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
