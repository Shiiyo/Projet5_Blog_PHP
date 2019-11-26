-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 15 oct. 2019 à 13:25
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projet5`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` char(36) NOT NULL,
  `name` varchar(36) NOT NULL,
  `first_name` varchar(36) NOT NULL,
  `pseudo` varchar(36) NOT NULL,
  `email` varchar(320) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pseudo` (`pseudo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `name`, `first_name`, `pseudo`, `email`, `password`) VALUES
('45619961-c01b-4914-ada1-451d8ab4993a', 'Legalland', 'Camille', 'Shiyo', 'camillelegalland@gmail.com', '$2y$10$toTrJtjx9rZfYa0GvJiM9.5vc3eH5lpelgYBY6PGF1gEb.9i7aVke'),
('6da3fe0e-de8e-47d1-a1fb-a97607dc8c69', 'Shiyo', 'Test', 'coucou23', 'test2@hotmail.fr', '$2y$10$TA3GFZlQ5IEUvkb5K2gUteuv3jRtEsDKRWTdHlvWAPbQ/UcwB0fxu'),
('9d9ccba2-0507-11e9-86ff-7824af8a8541', 'Dupont', 'David', 'Dav', 'dupont@gmail.com', '$2y$10$RxeTrGMLcDjDwoDuTE1DAe9poIhOJ4gemJ0l4tacqOurGaCM1DwoK');

-- --------------------------------------------------------

--
-- Structure de la table `blog_post`
--

DROP TABLE IF EXISTS `blog_post`;
CREATE TABLE IF NOT EXISTS `blog_post` (
  `id` char(36) NOT NULL,
  `id_admin` char(36) NOT NULL,
  `title` varchar(200) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `resume` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `add_date` date NOT NULL,
  `update_date` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `title` (`title`),
  KEY `id_admin_blog_post` (`id_admin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `blog_post`
--

INSERT INTO `blog_post` (`id`, `id_admin`, `title`, `slug`, `resume`, `content`, `add_date`, `update_date`) VALUES
('b557d0e6-f769-4f90-9273-ddec55dd87f4', '9d9ccba2-0507-11e9-86ff-7824af8a8541', 'Lorem Ipsum 23', 'lorem-ipsum-23', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet tortor at quam molestie interdum ac eu nulla. Curabitur diam lacus, varius nec rutrum et, ultrices in lorem. Hey!', 'Coucou ! Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet tortor at quam molestie interdum ac eu nulla. Curabitur diam lacus, varius nec rutrum et, ultrices in lorem. Donec efficitur mattis aliquet. Proin tempus rutrum ipsum, sit amet eleifend leo maximus eu. Curabitur auctor luctus massa. Aliquam tincidunt posuere dui, ac tincidunt velit interdum sit amet. Ut tempor mauris eget lorem scelerisque, eu cursus augue rhoncus. In id varius nibh, eget semper mi. Cras et ex mi. Mauris ornare varius urna at pulvinar. Mauris ac ex convallis, vestibulum sem at, molestie enim.\r\n\r\nPellentesque commodo ultricies purus sit amet imperdiet. Nullam dapibus eros nec sodales aliquam. Praesent felis nisi, tristique eu commodo sit amet, fringilla eget nunc. Quisque ac placerat ex, lacinia pulvinar lorem. Morbi a eros posuere, maximus arcu at, facilisis tellus. Vivamus imperdiet, sem eu luctus mattis, felis tortor rutrum elit, id lacinia dolor nibh at urna. Nunc at augue sit amet justo pretium ultrices. Hello\r\n\r\nMorbi malesuada tincidunt dui, quis ornare orci volutpat ut. Integer nec neque ut eros finibus tempor sit amet ac ante. Vivamus maximus vestibulum tincidunt. Suspendisse condimentum sodales euismod. Morbi fringilla sed lacus tincidunt lobortis. Nullam vestibulum nisl quis turpis semper mattis. Praesent felis lacus, hendrerit at dignissim vitae, molestie ut lorem. Aenean ultricies porttitor lectus a varius.\r\n\r\nSed sit amet egestas quam. Nam quis mi sapien. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Ut hendrerit nisl sed tellus imperdiet venenatis. Maecenas consequat nunc eros, vel euismod massa lacinia nec. Cras ut ultrices ex, vel mollis nisl. Donec maximus eros quis sollicitudin posuere. Praesent sollicitudin elit neque, et bibendum nisl vestibulum eu. Praesent et egestas est. Nunc et auctor est, varius luctus magna. Vivamus eget odio vitae dolor ultrices tempor. Cras tincidunt ultricies dui at lacinia. Nulla dictum enim felis, sed maximus metus sagittis eget. Donec ultricies condimentum nunc, et gravida ex dapibus vitae. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris posuere sapien vestibulum, luctus dui id, varius diam.\r\n\r\nEtiam fermentum, odio ut malesuada mollis, nulla enim blandit diam, sed pretium dui ligula at leo. Ut tempus arcu turpis, in luctus felis egestas nec. Maecenas hendrerit diam mauris, vel cursus elit vestibulum sollicitudin. Suspendisse malesuada odio eu lectus tincidunt, quis congue odio pretium. Praesent ultricies tortor at sem lacinia, nec lobortis ipsum tempus. In lacinia ultrices velit, a faucibus lorem fringilla quis. Morbi vehicula sodales felis id viverra. Proin sit amet lorem eget nisi fringilla tempor eget quis nulla. Vestibulum non molestie neque. In hac habitasse platea dictumst. Quisque sit amet orci in ligula consequat aliquam sit amet at lacus. Pellentesque a rutrum diam. Quisque cursus aliquet dolor quis blandit. Vestibulum enim urna, tristique non mi ut, tincidunt porttitor nunc. Suspendisse tempor metus id odio commodo efficitur. ', '2018-11-22', '2018-12-21');

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `id` char(36) NOT NULL,
  `id_blog_post` char(36) NOT NULL,
  `pseudo` varchar(36) NOT NULL,
  `message` text NOT NULL,
  `email` varchar(320) NOT NULL,
  `validation` tinyint(4) NOT NULL,
  `add_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_blog_post-comment` (`id_blog_post`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`id`, `id_blog_post`, `pseudo`, `message`, `email`, `validation`, `add_date`) VALUES
('04d69a4e-b369-47fa-8c08-f82c3b9241e4', 'b557d0e6-f769-4f90-9273-ddec55dd87f4', 'Thrall', '<strong> test XSS </strong>', 'test@hotmail.fr', 2, '2019-07-03 13:17:42'),
('43f8edc0-3252-4ef3-942b-e1086fd0bfd4', 'b557d0e6-f769-4f90-9273-ddec55dd87f4', 'Legalland', 'Hey !', 'test@hotmail.fr', 2, '2018-12-05 14:48:23'),
('d49c31d5-68f3-4b34-a00b-37135394beed', 'b557d0e6-f769-4f90-9273-ddec55dd87f4', 'Leeroy', 'Très intéressant !', 'leeroy@gmail.com', 0, '2018-12-05 16:25:14'),
('faa5501f-d061-44ce-8bbd-935ddb6bd95e', 'b557d0e6-f769-4f90-9273-ddec55dd87f4', 'Théo', 'Hello world !', 'theo@gmail.com', 1, '2018-11-26 16:18:15');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `blog_post`
--
ALTER TABLE `blog_post`
  ADD CONSTRAINT `id_admin_blog_post` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `id_blog_post-comment` FOREIGN KEY (`id_blog_post`) REFERENCES `blog_post` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
