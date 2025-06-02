-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 18, 2024 at 08:04 AM
-- Server version: 8.0.35-0ubuntu0.20.04.1
-- PHP Version: 8.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `S4956547`
--

-- --------------------------------------------------------

--
-- Table structure for table `dlc_rel`
--

CREATE TABLE `dlc_rel` (
  `father_game_id` int NOT NULL,
  `child_game_name` char(100) COLLATE utf8mb4_general_ci NOT NULL,
  `child_game_id` int NOT NULL,
  `type_of_rel` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `game`
--

CREATE TABLE `game` (
  `game_id` int NOT NULL,
  `name` char(255) COLLATE utf8mb4_general_ci NOT NULL,
  `series` char(255) COLLATE utf8mb4_general_ci NOT NULL,
  `engine` char(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `genre` char(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `developer` char(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `publisher` char(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `publ_date` char(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_general_ci,
  `trailer_link` text COLLATE utf8mb4_general_ci,
  `trailer_title` text COLLATE utf8mb4_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `game`
--

INSERT INTO `game` (`game_id`, `name`, `series`, `engine`, `genre`, `developer`, `publisher`, `publ_date`, `description`, `trailer_link`, `trailer_title`) VALUES
(1, 'A Plague Tale: Innocence', 'A Plague Tale', 'Unreal Engine 4', 'Survival horror, stealth', 'Asobo Studio', 'Focus Home Interactive', '2019-03-14', 'A Plague Tale: Innocence is an action-adventure stealth game developed by Asobo Studio and published by Focus Home Interactive. The game was released for PlayStation 4, Windows, and Xbox One in May 2019. It was made available on the cloud-based service Amazon Luna in November 2020. The PlayStation 5 and Xbox Series X/S versions of the game were released in July 2021, alongside a cloud version for the Nintendo Switch.\r\n\r\nSet in mid-14th century Aquitaine, France, during the Hundred Years\' War, the game focuses on the plight of Amicia de Rune and her ill brother Hugo as they flee from soldiers of the French Inquisition and from hordes of rats that are spreading the black plague. The player controls Amicia, using a combination of stealth and limited tools to hide from, distract, or knock out soldiers, evade rat hordes, and solve puzzles, incorporating elements of survival horror games.\r\n\r\nA Plague Tale: Innocence received generally positive reviews from critics and sold over one million units by July 2020. A sequel, A Plague Tale: Requiem, was released in 2022. ', 'https://www.youtube.com/embed/CtP6mNeN6yE', 'A Plague Tale: Innocence - Launch Trailer | PS4'),
(2, 'A Plague Tale: Requiem', 'A Plague Tale', 'Zouna Engine', 'Survival horror, stealth', 'Asobo Studio', 'Focus Home Interactive', '2022-10-18', 'A Plague Tale: Requiem is an action-adventure stealth video game developed by Asobo Studio and published by Focus Entertainment. The game is the sequel to A Plague Tale: Innocence (2019), and follows siblings Amicia and Hugo de Rune who must look for a cure to Hugo\'s blood disease in Southern France while fleeing from soldiers of the Inquisition and hordes of rats that are spreading the black plague. It was released for Nintendo Switch (cloud version), PlayStation 5, Windows, and Xbox Series X/S on 18 October 2022. It received generally positive reviews from critics. At The Game Awards 2022, it received five nominations including Game of the Year. ', 'https://www.youtube.com/embed/qIbzwb8vzNI', 'A Plague Tale: Requiem - Launch Trailer'),
(3, 'Alt F4', 'Alt F4', 'Unreal Engine 4', 'Platform', 'Punpking', 'Punpking', '2021-11-12', ' ALTF4?\r\nThe Way You Play Games Is Simple!!Become a somewhat clumsy Knight and overcome Trap!!But the way to get there won\'t be simple.Will you be able to overcome the various traps and irritating terrains in your way?', 'https://www.youtube.com/embed/_2WpMZz3uvw', 'ALTF4 - Official Launch Trailer'),
(4, 'Amnesia: Rebirth', 'Amnesia', 'HPL Engine', 'Survival horror', 'Frictional Games', 'Frictional Games', '2020-10-20', 'Amnesia: Rebirth is a 2020 survival horror video game developed and published by Frictional Games. It was released for Windows, Linux, and PlayStation 4 on 20 October 2020, for Amazon Luna on 22 October 2021, and for Xbox One and Xbox Series X/S on 20 October 2022. It is the third installment in the franchise and serves as a sequel to Amnesia: The Dark Descent (2010). The game received generally favorable reviews. ', 'https://www.youtube.com/embed/zZGDBBk89Vk', 'Amnesia: Rebirth - Launch Trailer | PS4'),
(5, 'Cyberpunk2077', 'Cyberpunk', 'RED Engine', 'RPG', 'CD Project RED', 'CD Project RED', '2020-12-10', 'Cyberpunk 2077 is a 2020 action role-playing video game developed by CD Projekt Red and published by CD Projekt, based on video game designer Mike Pondsmith\'s game series. Set in a dystopian cyberpunk universe, the player assumes the role of \"V\" (played by Gavin Drea/Cherami Leigh), a mercenary in the fictional Californian city known as \"Night City\", where they deal with the fallout from a heist gone wrong that results in an experimental cybernetic \"bio-chip\" containing an engram of the legendary rock star and terrorist Johnny Silverhand (played by Keanu Reeves) threatening to slowly overwrite V\'s mind; as the story progresses V and Johnny must work together to find a way to be separated and save V\'s life.\r\n            The game\'s development began following the release of The Witcher 3: Wild Hunt – Blood and Wine (2016). The game was developed by a team of around 500 people using the REDengine 4 game engine. CD Projekt launched a new division in Wrocław, Poland, and partnered with Digital Scapes, Nvidia, QLOC, and Jali Research to aid the production. Cyberpunk creator Mike Pondsmith was a consultant, and actor Keanu Reeves had a starring role. The original score was led by Marcin Przybyłowicz, and featured the contributions of several licensed artists. After years of anticipation, CD Projekt released Cyberpunk 2077 for PlayStation 4, Stadia, Windows, and Xbox One on 10 December 2020, followed by PlayStation 5 and Xbox Series X/S on 15 February 2022.', 'https://www.youtube.com/embed/qIcTM8WXFjk', 'Cyberpunk 2077 – trailer ufficiale E3 2019'),
(6, 'Asterigos: Curse of the Stars', 'Asterigos', 'Unreal Engine 4', 'action RPG, souls-like', 'Acme Gamestudio', 'Tiny Build', '2022-10-11', 'Asterigos: Curse of the Stars is a third-person hack and slash role-playing video game with Soulslike elements, developed by Acme Gamestudio and published by TinyBuild. The game was released for PlayStation 4, PlayStation 5, Windows, Xbox One, and Xbox Series X/S on October 11, 2022.[1] Set in a fantasy world, it follows a young woman named Hilda, who travels to Aphes, a cursed city that is stuck in time, to find her missing father and tribespeople.  Asterigos received positive reviews from critics, who praised its graphics, combat and story, but thought the game lacked polish, with inconsistent voiced scenes and overly easy bosses', 'https://www.youtube.com/embed/QtMpSWG1wp8', 'Asterigos - Official Trailer | PS5, PS4'),
(7, 'Assassin\'s Creed: Odissey', 'Assassin\'s Creed', 'Anvil', 'RPG', 'Ubisoft Quebec', 'Ubisoft', '2018-10-05', 'Assassin\'s Creed Odyssey is a 2018 action role-playing video game developed by Ubisoft Quebec and published by Ubisoft. It is the eleventh major installment in the Assassin\'s Creed series and the successor to 2017\'s Assassin\'s Creed Origins. Like its predecessor, the game features a large open world and adopts many elements from the role-playing genre, putting more emphasis on combat and exploration than stealth. Naval combat from previous titles in the series also plays a prominent role in Odyssey. The game\'s plot tells a mythological history of the Peloponnesian War between Athens and Sparta from 431 to 422 BC. Players control a Spartan mercenary, who fights on both sides of the conflict as they attempt to find their family and eliminate the mysterious Cult of Kosmos. Odyssey also continues the story arc of Layla Hassan, a major character introduced in Origins, who relives the mercenary\'s memories through the Animus device to find a powerful artifact. ', 'https://www.youtube.com/embed/6F8L3d_OIE0', 'Assassin&#39;s Creed Odyssey - Launch Trailer'),
(8, 'Horizon: Zero Dawn', 'Horizon', 'Decima', 'action, RPG', 'Guerrilla Games', 'Sony', '2017-02-28', 'Horizon Zero Dawn is a 2017 action role-playing game developed by Guerrilla Games and published by Sony Interactive Entertainment. The game was released for PlayStation 4 in 2017 and Windows in 2020.  Horizon Zero Dawn is the first game of the Horizon video game series. The plot follows Aloy, a young hunter in a world overrun by machines, who sets out to uncover her past. The player uses ranged weapons, a spear, and stealth to combat mechanical creatures and other enemy forces. A skill tree provides the player with new abilities and bonuses. The player can explore the open world to discover locations and take on side quests. ', 'https://www.youtube.com/embed/JB5On4CiXYY', 'Horizon Zero Dawn | Nuovo Trailer di Lancio'),
(9, 'Horizon: Forbidden West', 'Horizon', 'Decima', 'action, RPG', 'Guerrilla Games', 'Sony', '2022-02-18', 'Horizon Forbidden West is a 2022 action role-playing game developed by Guerrilla Games and published by Sony Interactive Entertainment. The game was released for PlayStation 4 and PlayStation 5 on 18 February 2022.  The sequel to 2017\'s Horizon Zero Dawn, Horizon Forbidden West is set in a post-apocalyptic version of the Western United States recovering from the aftermath of an extinction event caused by a rogue robot swarm. The player can explore the open world and complete quests using ranged and melee weapons against hostile machine creatures.  Horizon Forbidden West received generally positive reviews from critics, and had sold over 8.4 million units by April 2023. An expansion, Burning Shores, was released for the PlayStation 5 version on 19 April 2023. The game and the Burning Shores expansion was collected together and re-released as Horizon Forbidden West - Complete Edition for PlayStation 5 on 6 October 2023, and will release for Windows in early 2024. ', 'https://www.youtube.com/embed/UxDWGW7Z67I', 'Horizon Forbidden West - Story Trailer | PS5, PS4'),
(10, 'Mass Effect: Legendary Edition', 'Mass Effect', 'Unreal Engine 3', 'RPG', 'Bioware', 'Elecrtonic Arts', '2021-03-14', 'Mass Effect Legendary Edition is a compilation of the video games in the Mass Effect trilogy: Mass Effect (2007), Mass Effect 2 (2010), and Mass Effect 3 (2012). It was developed by BioWare and published by Electronic Arts. All three games were remastered, with visual enhancements, technical improvements, and gameplay adjustments. Mass Effect, the first game of the trilogy, received more extensive upgrades than its counterparts, specifically with regard to graphics, combat mechanics, vehicle handling, and loading times.  Development on the Legendary Edition commenced in 2019 under the direction of Mac Walters, who previously served as lead writer for Mass Effect 2 and Mass Effect 3. BioWare decided to approach the project as a remaster as opposed to a remake in order to preserve the original trilogy experience. The compilation was announced on November 7, 2020, and released on May 14, 2021, for PlayStation 4, Windows, and Xbox One. Legendary Edition received very positive reviews from video game publications, who praised the enhanced experience of the first game in addition to the convenience and scope of the overall package. Minor criticism was aimed at the extent of the gameplay and visual changes in certain regards. ', 'https://www.youtube.com/embed/Jh37cTUuSdQ', 'Mass Effect Legendary Edition - Official Reveal Trailer | PS5, PS4'),
(11, 'Immortals Fenyx: Rising', 'Immortals Fenyx', 'Anvil', 'action, rpg', 'Ubisoft Quebec', 'Ubisoft', '2020-12-03', 'Immortals Fenyx Rising is a 2020 action-adventure video game developed by Ubisoft Quebec and published by Ubisoft. The game was released for Nintendo Switch, PlayStation 4, PlayStation 5, Stadia, Windows, Xbox One, and Xbox Series X/S.  Immortals Fenyx Rising tells the story, as narrated by Prometheus to Zeus, of Fenyx, a mortal who in order to rescue Fenyx\'s brother must stop the evil Typhon after his escape from the underworld. The game received positive reviews from critics. ', 'https://www.youtube.com/embed/U4zb1yiFlQo', 'Immortals Fenyx Rising: Launch Trailer | Ubisoft [NA]'),
(16, 'Mass Effect: Andromeda', 'Mass Effect', 'Frostbite 3', 'action RPG', 'BioWare', 'Electronic Arts', '2017-03-21', 'Mass Effect: Andromeda is a 2017 action role-playing video game developed by BioWare and published by Electronic Arts. It is the fourth major entry in the Mass Effect series and was released in March 2017 for PlayStation 4, Windows, and Xbox One. The game is set within the Andromeda Galaxy during the 29th century, where humanity is planning to populate new home worlds as part of a strategy called the Andromeda Initiative. The player assumes the role of either Scott or Sara Ryder, an inexperienced military recruit who joins the Initiative and wakes up in Andromeda following a 634-year sleeper ship journey. Events transpire that result in Ryder becoming humanity\'s Pathfinder, who is tasked with finding a new home world for humanity while also dealing with an antagonistic alien species known as the Kett, and uncovering the secrets of a mysterious synthetic intelligence species known as the Remnant. ', 'https://www.youtube.com/embed/pyZw_oqk7Q8', 'ANDROMEDA – Trailer di presentazione ufficiale – N7 Day 2016'),
(23, 'XEL', 'XEL', 'Unreal Engine 4', 'hack and slash, isometric', 'Tiny Roar', 'Assemble Entertainment', '2022-07-12', 'EL is a 3D action-adventure set in a sci-fi fantasy setting. Play as Reid, shipwrecked on the strange world of XEL. Without any recollection of her former life, it is up to you to unravel her past and connection to XEL. Ready your sword and shield as you explore the overworld of XEL and dive into imposing dungeons full of unforeseen threats and challenging puzzles. Throughout your journey you will make new friends and foes, find new gadgets as well as being able to jump through time and space. As Reid delves deeper into the mysteries surrounding XEL, she discovers an endless cycle of peril. Will she be able to break free from it and what will it take? ', 'https://www.youtube.com/embed/N7Nq9ue0lRE', 'Xel - Official Release Trailer'),
(24, 'Life is Strange', 'Life is Strange', 'Unreal Engine 3', 'Graphic novel', 'Dontnod Entertainment', 'Square Enix', '2015-01-30', 'Life Is Strange is a series of adventure games published by Square Enix\'s External Studios.[1] Created by Dontnod Entertainment, the series debuted with the eponymous first installment, which was released in five episodes throughout 2015. It was followed by a prequel, Life Is Strange: Before the Storm, which was developed by Deck Nine and released in three episodes throughout 2017, with a downloadable content (DLC) bonus episode released in early 2018. The sequel Life Is Strange 2 and its spin-off The Awesome Adventures of Captain Spirit were developed by Dontnod and released between 2018 and 2019. A third main installment, Life Is Strange: True Colors, was released in its entirety on 10 September 2021. Additionally, a remastered collection of the original game and its prequel was released in February 2022.  The series has spawned a comic series set after one of the original game\'s possible endings, and in-universe books. ', 'https://www.youtube.com/embed/AURVxvIZrmU', 'Life is Strange - Trailer'),
(25, 'Soul Hackers 2', 'Soul Hackers', 'Unity', 'JRPG', 'ATLUS', 'SEGA', '2022-08-25', 'Soul Hackers 2[c] is a 2022 role-playing video game developed by Atlus. It was published by Atlus in Japan and by Sega worldwide for PlayStation 4, PlayStation 5, Windows, Xbox One, and Xbox Series X/S. The game is the fifth installment in the Devil Summoner series, itself a part of the larger Megami Tensei franchise, and a sequel to Devil Summoner: Soul Hackers (1997). The plot follows Ringo and Figue, manifested agents of the artificial intelligence Aion, as they seek and recruit people from rival groups of Devil Summoners who are key to preventing an approaching apocalypse. Gameplay has Ringo and her party exploring dungeon environments within a futuristic city, and fighting enemies in turn-based combat.  Soul Hackers 2 was developed by a team incorporating several Tokyo Mirage Sessions ♯FE staff members including Eiji Ishida and Mitsuru Hirata, who worked as co-producers and co-directors, and scenario writer Makoto Miyauchi. The team collaborated with artist Shirow Miwa on character designs, and composers from the studio Monaca led by Keiichi Okabe to create the soundtrack. ', 'https://www.youtube.com/embed/4PzLz2nepqQ', 'Soul Hackers 2 — Opening Movie | PS5, PS4, Xbox Series X|S, Xbox One, PC'),
(26, 'Stray', 'Stray', 'Unreal Engine 4', 'Platform', 'Blue Twelve Studios', 'Annapurna', '2022-06-19', 'Stray is a 2022 adventure game developed by BlueTwelve Studio and published by Annapurna Interactive. The story follows a stray cat who falls into a walled city populated by robots, machines, and mutant bacteria, and sets out to return to the surface with the help of a drone companion, B-12. The game is presented through a third-person perspective. The player traverses the game world by leaping across platforms and climbing up obstacles, and can interact with the environment to open new paths. Using B-12, they can store items found throughout the world and hack into technology to solve puzzles. Throughout the game, the player must evade the antagonistic Zurks and Sentinels, which attempt to kill them. ', 'https://www.youtube.com/embed/u84hRUQlaio', 'Stray - Teaser Trailer | PS5'),
(27, 'Control', 'Control', 'Northlight Engine', 'action adventure', 'Remedy Entrateinment', '505 Games', '2019-08-26', 'Control is a 2019 action-adventure game developed by Remedy Entertainment and published by 505 Games. The game was released in August 2019 for PlayStation 4, Windows, and Xbox One, and for PlayStation 5 and Xbox Series X/S in February 2021. Cloud-based versions for the Nintendo Switch and Amazon Luna were released in October 2020, followed by a version for Stadia in July 2021. Two paid expansions have been released.  The game revolves around the Federal Bureau of Control (FBC), a secret U.S. government agency tasked with containing and studying phenomena that violate the laws of reality. As Jesse Faden (Courtney Hope), the Bureau\'s new Director, the player explores the Oldest House – the FBC\'s paranormal headquarters – and utilizes powerful abilities to defeat a deadly enemy known as the Hiss, which has invaded and corrupted reality. The player gains abilities by finding Objects of Power, mundane objects like a rotary phone or a floppy disk imbued with energies from another dimension, that have been at the center of major paranormal events and since recovered by the FBC. In addition to Hope, voice work and live-action footage was provided by James McCaffrey, Matthew Porretta, and Martti Suosalo, while the band Poets of the Fall provided additional music. ', 'https://www.youtube.com/embed/PT5yMfC9LQM', 'Control - Gamescom 2019 Launch Trailer | PS4'),
(28, 'Beyond: Two Souls', 'Beyond: Two Souls', '', 'interactive drama', 'Quantic Dream', 'Quantic Dream', '2013-10-08', 'Beyond: Two Souls is an action-adventure game developed by Quantic Dream and published by Sony Computer Entertainment. It was released on 8 October 2013 for PlayStation 3 and for PlayStation 4 on 24 November 2015. A Windows port self-published by Quantic Dream was released on 22 July 2019.  The game features Jodie Holmes, one of two player characters. The other is an incorporeal entity named Aiden: a separate soul linked to Jodie since birth. Jodie, portrayed by Elliot Page,[a] possesses supernatural powers through her psychic link to Aiden, growing from adolescence to adulthood while learning to control Aiden and the powers they share. Willem Dafoe co-stars as Nathan Dawkins, a researcher in the Department of Paranormal Activity and Jodie\'s surrogate-father-figure. The actors in the game worked during the year-long project in Quantic Dream\'s Paris studio to perform on-set voice acting and motion-capture acting. ', 'https://www.youtube.com/embed/MtEoS0MaNyA', 'BEYOND: Two Souls - Launch Trailer | PS4'),
(29, 'The Last of us Part 2', 'The Last of Us', '', 'survival horor, stealth', 'Naughty Dog', 'Sony', '2020-06-19', 'The Last of Us Part II is a 2020 action-adventure game developed by Naughty Dog and published by Sony Interactive Entertainment. Set five years after The Last of Us (2013), the game focuses on two playable characters in a post-apocalyptic United States whose lives intertwine: Ellie, who sets out in revenge for a murder, and Abby, a soldier who becomes involved in a conflict between her militia and a religious cult. The game uses a third-person perspective; the player must fight human enemies and cannibalistic zombie-like creatures with firearms, improvised weapons, and stealth. ', 'https://www.youtube.com/embed/vhII1qlcZ4E', 'The Last of Us Part II - Official Story Trailer | PS4'),
(34, 'Death Stranding', 'Death Stranding', 'Decima', 'Action', 'Kojima Productions', 'Sony', '2019-10-08', 'Death Stranding is a 2019 action game developed by Kojima Productions and published by Sony Interactive Entertainment for the PlayStation 4. It is the first game from director Hideo Kojima and Kojima Productions after their split from Konami in 2015. A Windows port licensed by Sony was released by 505 Games in July 2020. A director\'s cut version was released for the PlayStation 5 in September 2021, followed by a release for Windows in March 2022. Versions for iOS,[b] iPadOS and macOS are set to be released in early 2024', 'https://www.youtube.com/embed/WfbvZzTeC1M', 'Death Stranding | Trailer di lancio | PS4'),
(35, 'Shadow of the Tomb Raider', 'Tomb Raider', 'Foundation Engine', 'action adventure', 'Eidos Montreal', 'Square Enix', '2018-08-17', 'Shadow of the Tomb Raider is a 2018 action-adventure game developed by Eidos-Montréal and published by Square Enix\'s European subsidiary. The game is the sequel to Rise of the Tomb Raider and is the twelfth mainline entry in the Tomb Raider series, as well as the third and final entry of the Survivor trilogy. It was released for PlayStation 4, Windows, and Xbox One in September 2018. Versions for Linux and macOS, and Stadia, were released in November 2019. After release, the game was expanded upon with downloadable content in both a season pass and as standalone releases. ', 'https://www.youtube.com/embed/XYtyeqVQnRI', 'Shadow Of The Tomb Raider - Official Trailer');

-- --------------------------------------------------------

--
-- Table structure for table `library_rel`
--

CREATE TABLE `library_rel` (
  `user_id` int NOT NULL,
  `game_id` int NOT NULL,
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
(7, 16, NULL, NULL, NULL),
(7, 27, NULL, NULL, NULL),
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
(75, 1, 1, NULL, NULL),
(75, 5, 1, NULL, 0),
(75, 11, 1, 1, NULL),
(76, 1, NULL, NULL, NULL),
(76, 2, 1, 1, NULL),
(76, 3, NULL, NULL, NULL),
(76, 4, NULL, NULL, NULL),
(76, 5, NULL, NULL, NULL),
(76, 6, 1, NULL, NULL),
(76, 7, NULL, NULL, NULL),
(76, 8, 1, 0, 0),
(76, 9, 1, NULL, NULL),
(76, 10, 1, 0, NULL),
(76, 11, NULL, NULL, NULL),
(76, 16, NULL, NULL, NULL),
(76, 23, NULL, NULL, NULL),
(76, 24, 1, 1, 1),
(76, 25, 1, NULL, NULL),
(76, 26, NULL, NULL, NULL),
(76, 27, NULL, NULL, NULL),
(76, 28, NULL, NULL, NULL),
(76, 29, NULL, NULL, NULL),
(76, 34, NULL, NULL, NULL),
(76, 35, NULL, NULL, NULL),
(78, 5, 0, 0, 0),
(80, 10, NULL, NULL, NULL),
(80, 16, NULL, NULL, NULL),
(83, 4, NULL, NULL, NULL),
(83, 5, NULL, NULL, NULL),
(83, 11, NULL, NULL, NULL),
(83, 16, NULL, NULL, NULL),
(83, 23, NULL, NULL, NULL),
(83, 25, 1, 1, 1),
(83, 26, NULL, NULL, NULL),
(83, 27, 1, 1, 1),
(102, 7, 1, 0, NULL),
(102, 28, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `firstname` char(100) COLLATE utf8mb4_general_ci NOT NULL,
  `lastname` char(100) COLLATE utf8mb4_general_ci NOT NULL,
  `email` char(100) COLLATE utf8mb4_general_ci NOT NULL,
  `pass` char(100) COLLATE utf8mb4_general_ci NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  `user_id` int NOT NULL,
  `profilePic` mediumblob,
  `remember_user_token` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `remember_user_id` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `remember_expire` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--



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
  MODIFY `game_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
