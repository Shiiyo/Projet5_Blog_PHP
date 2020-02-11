-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 11 fév. 2020 à 08:10
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `5-camille-legalland`
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
('45619961-c01b-4914-ada1-451d8ab4993a', 'Legalland', 'Camille', 'Shiyo', 'camillelegalland@gmail.com', '$2y$10$Rp38pRvRvBkJHSOsmhndA.2RiRbOORaD8mrbSV.yYKexsBQW1ndUC'),
('9d9ccba2-0507-11e9-86ff-7824af8a8541', 'Dupont', 'David', 'Dav', 'dupont@gmail.com', '$2y$10$RxeTrGMLcDjDwoDuTE1DAe9poIhOJ4gemJ0l4tacqOurGaCM1DwoK'),
('af4c4efd-3590-42a0-9914-e5eeb18f216c', 'Durand', 'Rose', 'Rosa', 'rose.D@gmail.com', '$2y$10$Rp38pRvRvBkJHSOsmhndA.2RiRbOORaD8mrbSV.yYKexsBQW1ndUC');

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
('2bc7832d-b614-4248-93db-a7f63c09ee6c', '45619961-c01b-4914-ada1-451d8ab4993a', 'Praesent quam elit', 'praesent-quam-elit', 'Maecenas iaculis fringilla est, id tincidunt tellus gravida et. Donec sodales imperdiet orci eu commodo. Quisque ornare pulvinar elit, nec convallis risus ultrices quis. In lacus dui, molestie sed massa eu, ultricies sollicitudin massa.', '\r\n\r\nIn quis orci sed enim elementum rutrum. Curabitur ut ante tincidunt, faucibus odio nec, feugiat massa. Vivamus eu dignissim ante. Sed vel consequat sem. Nulla aliquam elit eget ante euismod varius. Nullam nec fringilla turpis, quis vehicula nulla. Nunc lacinia eleifend ante nec finibus.\r\n\r\nProin posuere hendrerit augue, sit amet semper arcu maximus eu. Suspendisse ac eros nisl. Sed ac blandit lorem. Donec viverra urna diam, non ornare velit mattis in. Maecenas iaculis fringilla est, id tincidunt tellus gravida et. Donec sodales imperdiet orci eu commodo. Quisque ornare pulvinar elit, nec convallis risus ultrices quis. In lacus dui, molestie sed massa eu, ultricies sollicitudin massa.\r\n\r\nUt tincidunt vehicula lectus non tristique. Praesent quam elit, porta non porttitor nec, venenatis non lacus. Phasellus sit amet metus vel tortor fermentum porttitor. Vivamus vel tortor vestibulum, facilisis lorem in, gravida enim. Sed quis magna volutpat, tempor tortor sit amet, vehicula magna. Nunc sit amet sem et urna volutpat aliquet ut vel arcu. Suspendisse non varius justo, id hendrerit ligula. Morbi pulvinar sodales dui id gravida. Proin vitae velit orci. Cras at convallis felis, sit amet efficitur lacus. Quisque turpis enim, semper in dui a, ullamcorper efficitur nisl. Ut tempus est non pellentesque blandit. Pellentesque sed pretium lacus, ut egestas nulla. ', '2020-02-01', '2020-02-01'),
('58a3f7ab-8e82-487d-bca4-fd9645205678', '45619961-c01b-4914-ada1-451d8ab4993a', 'Elementum consectetur', 'elementum-consectetur', 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...', '\r\n\r\nSed eu nisi risus. Nulla cursus quis libero eget pretium. Maecenas mattis sapien vitae lacus luctus, nec pellentesque ex tempor. Nam mattis dolor sed porta lacinia. Proin sed enim sit amet neque tristique congue. Maecenas hendrerit eu dolor vel rutrum. Nunc egestas neque a molestie imperdiet. Cras placerat libero tellus, in facilisis dolor gravida eu. Pellentesque ac commodo tortor. Praesent ligula purus, egestas nec viverra vitae, blandit vel lectus. Vivamus mollis porta felis sed pharetra. Integer hendrerit cursus ligula ac molestie. Nulla tincidunt iaculis egestas. Suspendisse placerat arcu et tortor interdum tristique. Nam consequat turpis id sem mattis semper. Suspendisse sodales tristique magna sit amet hendrerit.\r\n\r\nInteger volutpat dolor et elementum consectetur. Ut condimentum enim lacus, vel porta dolor convallis elementum. Nam tempor condimentum ipsum, vel varius lorem pulvinar vitae. Integer dictum nulla vitae lectus hendrerit imperdiet. Phasellus vel lacus eu dui maximus efficitur. Ut ipsum ante, vehicula ut sodales a, sagittis ut diam. Nam imperdiet, odio ut semper maximus, ex elit iaculis arcu, sit amet elementum diam arcu sed enim. Praesent feugiat, nulla quis mollis pellentesque, felis arcu consequat mauris, eget condimentum mi elit in nisl.\r\n\r\nAliquam laoreet erat venenatis vehicula tristique. Sed vel malesuada lorem. Integer sit amet arcu ante. Vivamus sit amet leo nisi. Donec varius ante sit amet euismod facilisis. Quisque vel orci venenatis, condimentum ipsum porttitor, porta tellus. Phasellus sodales ultricies erat, at vulputate justo vestibulum nec. Praesent luctus felis sit amet orci porttitor, pretium interdum felis faucibus. Proin efficitur sem orci, sit amet consequat libero varius quis. Proin ultricies auctor urna, quis sollicitudin justo commodo at. Etiam ac molestie diam, lacinia efficitur est.\r\n\r\nNulla ornare rutrum massa, et ultrices lacus vehicula in. Aenean lacinia lorem vel lacus tempor, vitae euismod mi varius. Proin sit amet mauris eros. Aenean sodales sapien ut tempor cursus. Aenean blandit nunc nibh, sit amet malesuada orci consectetur in. Aliquam vitae urna magna. Donec nibh mauris, fermentum ut est in, molestie dictum justo. Aenean sollicitudin nisl sed eleifend volutpat. Nam lacus erat, sollicitudin consequat lacinia et, tempor fermentum nulla. Aenean ornare tincidunt metus vitae dignissim.\r\n\r\nMauris aliquam condimentum est, nec ullamcorper urna. Proin facilisis sapien metus, vel facilisis ipsum ultricies at. Vivamus lacinia leo non fringilla cursus. Pellentesque sed lectus vel odio elementum tincidunt. Cras tristique in est et venenatis. Vivamus felis ipsum, vulputate ut blandit sit amet, posuere eu ex. Sed auctor quis elit at porttitor. Donec ullamcorper sodales massa eget condimentum. Morbi id varius elit. Ut in velit in purus blandit semper. ', '2020-02-05', '2020-02-05'),
('6d91edea-3124-4d53-9394-09c020c7ea98', '45619961-c01b-4914-ada1-451d8ab4993a', 'Donec vitae', 'donec-vitae', 'Etiam finibus purus turpis, eget porttitor dolor finibus id. Praesent vitae arcu sed ipsum condimentum pharetra pharetra eget libero.', '\r\n\r\nProin faucibus leo sodales accumsan ultrices. Nunc tempor augue libero, at volutpat elit vehicula eu. Etiam tincidunt consequat enim, quis vehicula mauris ultricies viverra. Vivamus quis imperdiet risus, vitae consequat risus. Vestibulum laoreet sagittis augue. Nunc quis sollicitudin ipsum. Aenean sed lectus ut mi facilisis viverra ac a urna. Suspendisse potenti.\r\n\r\nNunc mollis elit dolor, a suscipit nibh suscipit a. Suspendisse dolor erat, sodales id finibus a, aliquet quis lectus. Aliquam posuere tincidunt vehicula. Donec rhoncus ligula feugiat aliquet finibus. Phasellus faucibus id sem ultrices eleifend. Praesent iaculis velit ut mauris ultrices ornare. Curabitur interdum dolor non elit interdum hendrerit. Mauris non leo magna.\r\n\r\nSuspendisse vel libero vitae est varius imperdiet. Etiam finibus purus turpis, eget porttitor dolor finibus id. Praesent vitae arcu sed ipsum condimentum pharetra pharetra eget libero. Donec vitae lobortis tortor. Nunc et urna vel quam viverra porta sit amet ac erat. Integer porta ultrices arcu, vel cursus leo finibus ut. Proin ut turpis magna. Nulla facilisi. Mauris auctor dignissim ex, aliquam convallis orci lobortis ac. Vestibulum vitae laoreet odio. Nulla scelerisque neque lorem, a lacinia sapien vestibulum sed. Proin scelerisque dui ligula, in mollis lectus laoreet nec. Nulla venenatis dolor non viverra porta. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Integer cursus viverra metus non semper. ', '2020-01-08', '2020-01-08'),
('8d766c72-8eb0-46c3-91e1-265efd9caf20', '45619961-c01b-4914-ada1-451d8ab4993a', 'Morbi magna tortor', 'morbi-magna-tortor', 'Aliquam eget justo diam. Vestibulum efficitur turpis non bibendum iaculis. Nullam faucibus neque non augue finibus, lobortis consequat nibh posuere.', '\r\n\r\nNunc non dui sit amet ligula varius venenatis et suscipit nisi. Morbi vel erat diam. Morbi dictum massa nec massa varius euismod. Nam commodo tristique tempus. Proin scelerisque malesuada ipsum id maximus. Aliquam sed purus eget erat tincidunt ornare non et arcu. Aenean dapibus ex eu ligula rutrum ultrices. Ut tincidunt elit velit, ultrices pharetra felis bibendum vel.\r\n\r\nSed malesuada metus ut tincidunt elementum. Nam sed sodales ligula. Proin imperdiet quam nibh, quis facilisis nunc faucibus non. Cras egestas risus quis vehicula iaculis. Aliquam at dolor consectetur massa mattis ornare. Fusce et augue finibus, tristique tellus quis, efficitur leo. Cras ornare ac quam fringilla porttitor. Morbi luctus turpis nunc, in vulputate lectus convallis eu. Pellentesque cursus fringilla lorem, id accumsan magna gravida at.\r\n\r\nIn dapibus tempus feugiat. Mauris elementum imperdiet viverra. Integer gravida, tortor id placerat dictum, turpis nulla ultrices lacus, et sodales neque enim et mi. Aenean dictum diam aliquam orci vestibulum, non semper arcu pulvinar. Sed gravida fringilla metus ac consequat. Ut ultrices varius convallis. Sed ultrices ipsum a placerat fringilla. Cras aliquam augue elit, ac cursus arcu hendrerit id. Morbi sem mi, ullamcorper at egestas faucibus, dignissim molestie mauris. Morbi a urna ante. Fusce quis commodo nisi, sit amet vestibulum purus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Duis id lacus auctor, accumsan dui id, tincidunt quam. Duis sit amet elit nec ante feugiat gravida.\r\n\r\nIn tincidunt a risus ut rhoncus. Aliquam eget justo diam. Vestibulum efficitur turpis non bibendum iaculis. Nullam faucibus neque non augue finibus, lobortis consequat nibh posuere. Morbi magna tortor, tempus sed tortor ut, commodo maximus nunc. Praesent commodo turpis augue, ac consectetur magna cursus ut. Phasellus nunc risus, consequat a interdum ac, suscipit sed nulla. Maecenas egestas quis magna semper accumsan. Aliquam hendrerit cursus facilisis. Donec laoreet nec massa ac congue. Nam egestas orci vehicula augue suscipit, non volutpat elit pharetra. Sed vitae neque urna. In accumsan massa nec sapien tincidunt, id viverra nisl aliquam. Nam eget convallis mi, sed luctus orci. ', '2019-12-14', '2019-12-14'),
('b557d0e6-f769-4f90-9273-ddec55dd87f4', '45619961-c01b-4914-ada1-451d8ab4993a', 'Lorem Ipsum', 'lorem-ipsum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet tortor at quam molestie interdum ac eu nulla. Curabitur diam lacus, varius nec rutrum et, ultrices in lorem.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet tortor at quam molestie interdum ac eu nulla. Curabitur diam lacus, varius nec rutrum et, ultrices in lorem. Donec efficitur mattis aliquet. Proin tempus rutrum ipsum, sit amet eleifend leo maximus eu. Curabitur auctor luctus massa. Aliquam tincidunt posuere dui, ac tincidunt velit interdum sit amet. Ut tempor mauris eget lorem scelerisque, eu cursus augue rhoncus. In id varius nibh, eget semper mi. Cras et ex mi. Mauris ornare varius urna at pulvinar. Mauris ac ex convallis, vestibulum sem at, molestie enim.\r\n\r\nPellentesque commodo ultricies purus sit amet imperdiet. Nullam dapibus eros nec sodales aliquam. Praesent felis nisi, tristique eu commodo sit amet, fringilla eget nunc. Quisque ac placerat ex, lacinia pulvinar lorem. Morbi a eros posuere, maximus arcu at, facilisis tellus. Vivamus imperdiet, sem eu luctus mattis, felis tortor rutrum elit, id lacinia dolor nibh at urna. Nunc at augue sit amet justo pretium ultrices.\r\n\r\nMorbi malesuada tincidunt dui, quis ornare orci volutpat ut. Integer nec neque ut eros finibus tempor sit amet ac ante. Vivamus maximus vestibulum tincidunt. Suspendisse condimentum sodales euismod. Morbi fringilla sed lacus tincidunt lobortis. Nullam vestibulum nisl quis turpis semper mattis. Praesent felis lacus, hendrerit at dignissim vitae, molestie ut lorem. Aenean ultricies porttitor lectus a varius.\r\n\r\nSed sit amet egestas quam. Nam quis mi sapien. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Ut hendrerit nisl sed tellus imperdiet venenatis. Maecenas consequat nunc eros, vel euismod massa lacinia nec. Cras ut ultrices ex, vel mollis nisl. Donec maximus eros quis sollicitudin posuere. Praesent sollicitudin elit neque, et bibendum nisl vestibulum eu. Praesent et egestas est. Nunc et auctor est, varius luctus magna. Vivamus eget odio vitae dolor ultrices tempor. Cras tincidunt ultricies dui at lacinia. Nulla dictum enim felis, sed maximus metus sagittis eget. Donec ultricies condimentum nunc, et gravida ex dapibus vitae. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris posuere sapien vestibulum, luctus dui id, varius diam.\r\n\r\nEtiam fermentum, odio ut malesuada mollis, nulla enim blandit diam, sed pretium dui ligula at leo. Ut tempus arcu turpis, in luctus felis egestas nec. Maecenas hendrerit diam mauris, vel cursus elit vestibulum sollicitudin. Suspendisse malesuada odio eu lectus tincidunt, quis congue odio pretium. Praesent ultricies tortor at sem lacinia, nec lobortis ipsum tempus. In lacinia ultrices velit, a faucibus lorem fringilla quis. Morbi vehicula sodales felis id viverra. Proin sit amet lorem eget nisi fringilla tempor eget quis nulla. Vestibulum non molestie neque. In hac habitasse platea dictumst. Quisque sit amet orci in ligula consequat aliquam sit amet at lacus. Pellentesque a rutrum diam. Quisque cursus aliquet dolor quis blandit. Vestibulum enim urna, tristique non mi ut, tincidunt porttitor nunc. Suspendisse tempor metus id odio commodo efficitur. ', '2018-11-22', '2019-11-26');

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
('25a20221-2b59-4045-bd7d-e43589ac0ef4', '6d91edea-3124-4d53-9394-09c020c7ea98', 'Guillaume', 'Curabitur interdum dolor non elit interdum hendrerit. Mauris non leo magna.', 'Guillaume@gmail.fr', 1, '2020-02-11 08:07:23'),
('2eb39593-6390-4329-a8df-142a1502c766', '6d91edea-3124-4d53-9394-09c020c7ea98', 'Margot', 'Nulla scelerisque neque lorem, a lacinia sapien vestibulum sed.', 'Margot@hotmail.fr', 1, '2020-02-11 08:05:12'),
('3d4e25f1-a165-4ce8-930e-e2c6972cbe1a', '58a3f7ab-8e82-487d-bca4-fd9645205678', 'Olivier', 'Aenean lacinia lorem vel lacus tempor, vitae euismod mi varius.', 'Olivier@hotmail.com', 1, '2020-02-11 08:03:37'),
('43f8edc0-3252-4ef3-942b-e1086fd0bfd4', 'b557d0e6-f769-4f90-9273-ddec55dd87f4', 'Legalland', 'Hey !', 'test@hotmail.fr', 2, '2018-12-05 14:48:23'),
('6d715c5b-b453-40ff-8982-4eb0083650fb', '8d766c72-8eb0-46c3-91e1-265efd9caf20', 'Henri', 'Duis id lacus auctor, accumsan dui id, tincidunt quam. Duis sit amet elit nec ante feugiat gravida.', 'Henri@hotmail.fr', 1, '2020-02-11 08:05:49'),
('7a45f0bb-50ea-40dc-9d2f-996a164b98dc', 'b557d0e6-f769-4f90-9273-ddec55dd87f4', 'Coucou', 'Coucou les amis', 'test2@hotmail.fr', 1, '2019-11-26 13:27:01'),
('86df7cbf-bde1-4651-9684-70758bb2a5b5', '2bc7832d-b614-4248-93db-a7f63c09ee6c', 'Robot', '<strong>Je suis un vilain robot </strong>', 'robot@gmail.com', 0, '2020-02-11 08:08:50'),
('a39a30a2-de7f-430b-b243-06f9b648a880', '2bc7832d-b614-4248-93db-a7f63c09ee6c', 'Anne', 'Suspendisse non varius justo, id hendrerit ligula. Morbi pulvinar sodales dui id gravida. ', 'Anne@gmail.com', 1, '2020-02-11 08:04:26'),
('b41319d8-df0a-4bd2-a809-86eee47f30a2', '58a3f7ab-8e82-487d-bca4-fd9645205678', 'Christine', 'Aenean sollicitudin nisl sed eleifend volutpat.', 'Christine@gmail.com', 1, '2020-02-11 08:03:11'),
('b97f4f67-afd6-4d1e-b8cc-c89c294008bd', '58a3f7ab-8e82-487d-bca4-fd9645205678', 'Lucy', 'Proin facilisis sapien metus, vel facilisis ipsum ultricies at.', 'Lucy@hotmail.com', 1, '2020-02-11 08:03:57'),
('d49c31d5-68f3-4b34-a00b-37135394beed', 'b557d0e6-f769-4f90-9273-ddec55dd87f4', 'Leeroy', 'Très intéressant !', 'leeroy@gmail.com', 1, '2018-12-05 16:25:14'),
('faa5501f-d061-44ce-8bbd-935ddb6bd95e', 'b557d0e6-f769-4f90-9273-ddec55dd87f4', 'Théo', 'Hello world !', 'theo@gmail.com', 2, '2018-11-26 16:18:15');

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
