-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 20 oct. 2020 à 10:54
-- Version du serveur :  10.4.13-MariaDB
-- Version de PHP : 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `edens_project`
--

-- --------------------------------------------------------

--
-- Structure de la table `attack`
--

CREATE TABLE `attack` (
  `attack_id` int(11) NOT NULL,
  `attack_name` varchar(100) NOT NULL,
  `attack_pui` smallint(6) NOT NULL,
  `attack_use` smallint(6) NOT NULL,
  `attack_img` varchar(50) NOT NULL,
  `attack_dispo` tinyint(1) NOT NULL DEFAULT 0,
  `attack_perso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `attack`
--

INSERT INTO `attack` (`attack_id`, `attack_name`, `attack_pui`, `attack_use`, `attack_img`, `attack_dispo`, `attack_perso`) VALUES
(7, 'Magimech Attack: Gravity Fist', 30, 0, 'Shiki_attack0.jpg', 1, 1),
(8, 'Magimech Attack: Gravity Fist Frenzy', 50, 20, 'Shiki_attack1.jpg', 1, 1),
(9, 'Magimech Attack: Gravity Wave', 100, 30, 'Shiki_attack2.jpg', 0, 1),
(12, 'Happy Blaster', 30, 0, 'Rebecca_attack0.jpg', 1, 2),
(13, 'Bellholy Slash', 75, 20, 'Rebecca_attack1.jpg', 1, 2),
(14, 'Skymech Ninjutsu Attack: Windstorm Slash', 30, 0, 'Jin_attack1.jpg', 0, 3),
(16, 'Skymech Ninjutsu Attack: Windstorm Palm Strike', 80, 20, 'Jin_attack2.jpg', 0, 3),
(17, 'Magimech Attack: Gravity Comet', 200, 50, 'Shiki_overdrive0.jpg', 0, 1),
(18, 'Ignition Floor', 100, 0, 'Drakken_attack0.jpg', 0, 11),
(19, 'Thunder Wall', 100, 0, 'Drakken_attack1.jpg', 0, 11),
(20, 'Five Sword Fencing: Leopard Stance', 35, 0, 'Homura_attack0.jpg', 1, 12),
(21, 'Warrior Maiden Single-Sword Attack: Dragon Flash', 85, 25, 'Homura_attack1.jpg', 1, 12),
(22, 'Creation', 200, 0, 'Mother_attack0.jpg', 0, 13),
(23, 'Million Bullets', 30, 0, 'Weisz_attack0.jpg', 1, 14),
(24, 'Atlas Flame', 65, 10, 'Weisz_attack1.jpg', 1, 14);

-- --------------------------------------------------------

--
-- Structure de la table `chapters`
--

CREATE TABLE `chapters` (
  `chapter_id` int(11) NOT NULL,
  `chapter_name` varchar(20) NOT NULL,
  `chapter_done` tinyint(1) NOT NULL DEFAULT 0,
  `chapter_desc` text NOT NULL,
  `chapter_pic` varchar(250) NOT NULL,
  `chapter_dispo` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `chapters`
--

INSERT INTO `chapters` (`chapter_id`, `chapter_name`, `chapter_done`, `chapter_desc`, `chapter_pic`, `chapter_dispo`) VALUES
(1, 'Chapter 1', 0, 'Two traveling B-Cubers named Rebecca and Happy visit the abandoned Granbell Kingdom theme park and meet Shiki, a sole human boy raised by robots. Just as Shiki and Rebecca begin to strike up a friendship, the robots suddenly turn against them, claiming to want revenge against humanity. The three escape together on Rebecca\'s ship and blast away from the planet itself, revealing that she and Happy are actually space travelers, and kicking off an adventure that will end with Shiki\'s name known all across the universe. ', 'Grandbell_Planet.jpg', 1);

-- --------------------------------------------------------

--
-- Structure de la table `perso`
--

CREATE TABLE `perso` (
  `perso_id` int(11) NOT NULL,
  `perso_name` varchar(30) NOT NULL,
  `perso_type` varchar(10) NOT NULL,
  `perso_typepic` varchar(10) NOT NULL,
  `perso_color` varchar(10) NOT NULL,
  `perso_lvl` tinyint(4) NOT NULL DEFAULT 1,
  `perso_pv` smallint(4) NOT NULL,
  `perso_pm` smallint(6) NOT NULL,
  `perso_atk` smallint(6) NOT NULL,
  `perso_def` smallint(6) NOT NULL,
  `perso_vit` smallint(6) NOT NULL,
  `perso_xp` smallint(6) NOT NULL DEFAULT 0,
  `perso_pic` varchar(250) NOT NULL,
  `perso_play` tinyint(1) NOT NULL DEFAULT 0,
  `perso_overdrive` varchar(30) DEFAULT NULL,
  `perso_overdrivedispo` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `perso`
--

INSERT INTO `perso` (`perso_id`, `perso_name`, `perso_type`, `perso_typepic`, `perso_color`, `perso_lvl`, `perso_pv`, `perso_pm`, `perso_atk`, `perso_def`, `perso_vit`, `perso_xp`, `perso_pic`, `perso_play`, `perso_overdrive`, `perso_overdrivedispo`) VALUES
(1, 'Shiki Grandbell', 'DARK', 'Dark.png', 'black', 3, 105, 150, 126, 66, 86, 0, 'Shiki.jpg', 1, 'Shiki_Incomplete_Overdrive.jpg', 1),
(2, 'Rebecca BlueGarden', 'LIGHT', 'Light.png', 'khaki', 2, 105, 105, 52, 52, 102, 200, 'Rebecca.jpg', 1, NULL, 0),
(3, 'Jin', 'WIND', 'Wind.png', 'lightgreen', 1, 100, 100, 90, 80, 30, 0, 'Jin.png', 0, NULL, 0),
(11, 'Drakken Joe', 'DARK', 'Dark.png', 'black', 1, 100, 100, 100, 100, 100, 0, 'Drakken.jpg', 0, NULL, 0),
(12, 'Homura Kogetsu', 'FIRE', 'Fire.png', 'red', 1, 100, 100, 80, 40, 80, 605, 'Homura.jpg', 1, NULL, 0),
(13, 'Mother', 'LIGHT', 'Light.png', 'khaki', 1, 100, 100, 100, 100, 100, 0, 'Mother.jpg', 0, NULL, 0),
(14, 'Weisz Steiner', 'EARTH', 'Earth.png', 'peru', 1, 100, 100, 90, 50, 60, 0, 'Weisz.jpg', 1, NULL, 0);

-- --------------------------------------------------------

--
-- Structure de la table `quest`
--

CREATE TABLE `quest` (
  `quest_id` int(11) NOT NULL,
  `quest_name` varchar(30) NOT NULL,
  `quest_done` tinyint(1) NOT NULL DEFAULT 0,
  `quest_desc` text NOT NULL,
  `quest_dispo` tinyint(1) NOT NULL DEFAULT 0,
  `quest_pic` varchar(250) NOT NULL,
  `quest_rank` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `quest`
--

INSERT INTO `quest` (`quest_id`, `quest_name`, `quest_done`, `quest_desc`, `quest_dispo`, `quest_pic`, `quest_rank`) VALUES
(2, 'Training 2', 0, 'Defeat Jin again.', 0, 'Rogue_Out.jpg', 'F'),
(9, 'Defeat Drakken', 0, 'Defeat Drakken Joe.', 1, 'Belial_Gore.jpg', 'B'),
(10, '?', 0, '?', 1, 'The_Sakura_Cosmos.jpg', 'SSS');

-- --------------------------------------------------------

--
-- Structure de la table `rank`
--

CREATE TABLE `rank` (
  `rank_id` int(11) NOT NULL,
  `rank_statut` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `rank`
--

INSERT INTO `rank` (`rank_id`, `rank_statut`) VALUES
(1, 'F'),
(2, 'E'),
(3, 'D'),
(4, 'C'),
(5, 'B'),
(6, 'A'),
(7, 'S'),
(8, 'SS'),
(9, 'SSS');

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

CREATE TABLE `type` (
  `type_id` int(11) NOT NULL,
  `type_name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `type`
--

INSERT INTO `type` (`type_id`, `type_name`) VALUES
(1, 'DARK'),
(2, 'WATER'),
(3, 'FIRE'),
(4, 'WIND'),
(5, 'EARTH'),
(6, 'LIGHT');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_pseudo` varchar(10) NOT NULL,
  `user_password` varchar(250) NOT NULL,
  `user_admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `world`
--

CREATE TABLE `world` (
  `world_id` int(11) NOT NULL,
  `world_name` varchar(30) NOT NULL,
  `world_desc` varchar(100) NOT NULL,
  `world_pic` varchar(150) NOT NULL,
  `world_dispo` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `world`
--

INSERT INTO `world` (`world_id`, `world_name`, `world_desc`, `world_pic`, `world_dispo`) VALUES
(3, 'Digitalis', 'Digitalis', 'Digitalis.jpg', 0),
(4, 'Brown Sea', 'Brown Sea', 'Brown_Sea.jpg', 0),
(6, 'Mildian', 'Mildian', 'Mildian.jpg', 0),
(7, 'Newton', 'Newton', 'Newton.jpg', 0),
(8, 'Norma', 'Norma', 'Norma.jpg', 0),
(9, 'Sun Jewel', 'Sun Jewel', 'Sun_Jewel.jpg', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `attack`
--
ALTER TABLE `attack`
  ADD PRIMARY KEY (`attack_id`),
  ADD KEY `attack_perso` (`attack_perso`);

--
-- Index pour la table `chapters`
--
ALTER TABLE `chapters`
  ADD PRIMARY KEY (`chapter_id`);

--
-- Index pour la table `perso`
--
ALTER TABLE `perso`
  ADD PRIMARY KEY (`perso_id`);

--
-- Index pour la table `quest`
--
ALTER TABLE `quest`
  ADD PRIMARY KEY (`quest_id`);

--
-- Index pour la table `rank`
--
ALTER TABLE `rank`
  ADD PRIMARY KEY (`rank_id`);

--
-- Index pour la table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`type_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Index pour la table `world`
--
ALTER TABLE `world`
  ADD PRIMARY KEY (`world_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `attack`
--
ALTER TABLE `attack`
  MODIFY `attack_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `chapters`
--
ALTER TABLE `chapters`
  MODIFY `chapter_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `perso`
--
ALTER TABLE `perso`
  MODIFY `perso_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `quest`
--
ALTER TABLE `quest`
  MODIFY `quest_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `rank`
--
ALTER TABLE `rank`
  MODIFY `rank_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `type`
--
ALTER TABLE `type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `world`
--
ALTER TABLE `world`
  MODIFY `world_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `attack`
--
ALTER TABLE `attack`
  ADD CONSTRAINT `attack_ibfk_1` FOREIGN KEY (`attack_perso`) REFERENCES `perso` (`perso_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
