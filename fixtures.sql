-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 22 juin 2020 à 13:22
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `live_question`
--

-- --------------------------------------------------------

--
-- Structure de la table `ami`
--

DROP TABLE IF EXISTS `ami`;
CREATE TABLE IF NOT EXISTS `ami` (
  `Id_profil` int(11) NOT NULL COMMENT 'Utilisateur qui a envoyé la demande d''ami',
  `#Id_profil` int(11) NOT NULL COMMENT 'Utilisateur qui a accepté la demande d''ami',
  KEY `Id_profil` (`Id_profil`),
  KEY `Id_profil_ami` (`#Id_profil`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Déchargement des données de la table `ami`
--

INSERT INTO `ami` (`Id_profil`, `#Id_profil`) VALUES
(2, 57),
(1, 55),
(64, 1);

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `Id_categorie` int(11) NOT NULL AUTO_INCREMENT,
  `Libelle_categorie` varchar(255) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`Id_categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`Id_categorie`, `Libelle_categorie`) VALUES
(1, 'Anime'),
(2, 'NSFW'),
(3, 'Voiture'),
(4, 'Informatique'),
(5, 'Coronavirus'),
(6, 'Politique'),
(7, 'VM'),
(8, 'Idols'),
(9, 'K-Pop'),
(10, 'Japon'),
(11, 'test'),
(12, 'test2');

-- --------------------------------------------------------

--
-- Structure de la table `demande_ami`
--

DROP TABLE IF EXISTS `demande_ami`;
CREATE TABLE IF NOT EXISTS `demande_ami` (
  `Id_profil` int(11) NOT NULL COMMENT 'Utilisateur qui a envoyé la demande d''ami',
  `#Id_profil` int(11) NOT NULL COMMENT 'Utilisateur qui a reçu la demande d''ami',
  KEY `Id_profil_send` (`Id_profil`),
  KEY `Id_profil_receive` (`#Id_profil`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Déchargement des données de la table `demande_ami`
--

INSERT INTO `demande_ami` (`Id_profil`, `#Id_profil`) VALUES
(1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `likes`
--

DROP TABLE IF EXISTS `likes`;
CREATE TABLE IF NOT EXISTS `likes` (
  `#Id_profil` int(11) NOT NULL,
  `#Id_question` int(11) NOT NULL,
  KEY `#Id_profil` (`#Id_profil`),
  KEY `#Id_question` (`#Id_question`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Déchargement des données de la table `likes`
--

INSERT INTO `likes` (`#Id_profil`, `#Id_question`) VALUES
(1, 167),
(65, 1),
(57, 167);

-- --------------------------------------------------------

--
-- Structure de la table `profil`
--

DROP TABLE IF EXISTS `profil`;
CREATE TABLE IF NOT EXISTS `profil` (
  `Id_profil` int(11) NOT NULL AUTO_INCREMENT,
  `Pseudo_profil` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `Mail_profil` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `MotDePasse_profil` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `Genre_profil` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `Image_profil` varchar(255) CHARACTER SET utf8 NOT NULL,
  `Description_profil` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `#Id_role` int(11) NOT NULL,
  PRIMARY KEY (`Id_profil`),
  KEY `#Id_role` (`#Id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Déchargement des données de la table `profil`
--

INSERT INTO `profil` (`Id_profil`, `Pseudo_profil`, `Mail_profil`, `MotDePasse_profil`, `Genre_profil`, `Image_profil`, `Description_profil`, `#Id_role`) VALUES
(1, 'Yam', 'root@livequestion.com', '$2y$10$tZjW1sjH3sllXUf98JLqdueBoEvSprB6H9/x5I5PDoQuWaNRxJAte', 'Non-binaire', './image_profil/1.jpg', 'uwu', 1),
(2, 'Lythis', 'lythis@morgan.fr', '$2y$10$k/bxo39LFYjt28bx3oNM/ePoDjriiygJBNXviYvVJSRusLn/.Emyq', 'Homme', './image_profil/2.gif', 'Aucune information disponible.', 1),
(55, 'Kyllian', 'kyllian@joseph.fr', '$2y$10$k/bxo39LFYjt28bx3oNM/ePoDjriiygJBNXviYvVJSRusLn/.Emyq', 'Homme', './image_profil/55.jpeg', 'Aucune information disponible.', 1),
(56, 'Leo', 'leo@stvincent.net', '$2y$10$k/bxo39LFYjt28bx3oNM/ePoDjriiygJBNXviYvVJSRusLn/.Emyq', 'Hélicoptère d\'attaque', './image_profil/Default.png', 'Aucune information disponible.', 2),
(57, 'Nico Nico Nii', 'nico@stvincent.net', '$2y$10$k/bxo39LFYjt28bx3oNM/ePoDjriiygJBNXviYvVJSRusLn/.Emyq', 'Non-binaire', './image_profil/57.jpg', 'Aucune information disponible.', 2),
(63, 'test', 'me@test', '$2y$10$k/bxo39LFYjt28bx3oNM/ePoDjriiygJBNXviYvVJSRusLn/.Emyq', 'Femme', './image_profil/Default.png', 'Aucune information disponible.', 2),
(64, 'Jeff', 'jeff@jeff.jeff', '$2y$10$k/bxo39LFYjt28bx3oNM/ePoDjriiygJBNXviYvVJSRusLn/.Emyq', 'Homme', './image_profil/Default.png', 'Super prof des BTS 1 (ils travaillent mais que des fois).', 2),
(65, 'Christopher', 'christopher@gmail.com', '$2y$10$gec1euS8zD7C3iQdZRyiouncOUUdmDfwhozHaLTtyVUT6WAqjxJna', 'Homme', './image_profil/Default.png', 'Aucune information disponible.', 2),
(66, 'Mikaël', 'mikael@mika.fr', '$2y$10$NW9XY69pN37hi/9OuCUf7Op0tx7.FM61VPcZl5RNW.7r.hiADh.1.', 'Homme', './image_profil/Default.png', 'Aucune information disponible.', 2);

-- --------------------------------------------------------

--
-- Structure de la table `question`
--

DROP TABLE IF EXISTS `question`;
CREATE TABLE IF NOT EXISTS `question` (
  `Id_question` int(11) NOT NULL AUTO_INCREMENT,
  `Titre_question` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `Date_creation_question` date NOT NULL,
  `#Id_profil` int(11) NOT NULL,
  `#Id_categorie` int(11) NOT NULL,
  PRIMARY KEY (`Id_question`),
  KEY `#Id_profil` (`#Id_profil`),
  KEY `#Id_categorie` (`#Id_categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=175 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Déchargement des données de la table `question`
--

INSERT INTO `question` (`Id_question`, `Titre_question`, `Date_creation_question`, `#Id_profil`, `#Id_categorie`) VALUES
(1, 'Qui est la meilleure waifu/meilleur husbando?', '2020-04-03', 2, 1),
(2, 'J\'aime TELLEMENT les VM, j\'en fais tout les jours, suis-je addicte?', '2020-04-04', 2, 7),
(3, 'Why is Japan such a peaceful land?', '2020-04-04', 1, 10),
(4, 'Comment faire pour que Morgan soit plus intelligent?', '2020-04-05', 1, 5),
(5, 'Who\'s the best idol?', '2020-04-05', 1, 8),
(6, 'Ceci est un test', '2020-04-05', 2, 1),
(45, 'Pourquoi je suis aussi beau?', '2020-04-06', 55, 3),
(46, 'Pourquoi Nico Nico Nii me harcèle même dans mes rêves?', '2020-04-15', 57, 1),
(61, 'Esse qui pariatur est et temporibus enim quaerat. Sint quos quia at possimus vel?', '2020-06-11', 2, 2),
(62, 'Earum ex voluptas eum provident placeat. Ut laborum asperiores doloribus. Maxime fugiat velit molestias eaque numquam sit ad est?', '2020-06-11', 2, 2),
(63, 'Iste odit adipisci rerum qui maxime sunt consectetur earum. Sint et velit velit incidunt?', '2020-06-11', 2, 6),
(64, 'Nulla ut explicabo quibusdam. Repellendus eos consequuntur veniam saepe. Est ut dolorum corrupti quia porro nihil. Sed laudantium sed soluta recusandae sapiente quos cupiditate?', '2020-06-11', 2, 5),
(65, 'Voluptatem sint sapiente cumque et. Qui animi laboriosam voluptas illo aperiam in minima. Debitis quis ut dignissimos. Et rem consectetur laborum error nam fuga deserunt?', '2020-06-11', 2, 10),
(66, 'Et vel aut adipisci veniam aliquam et voluptatibus. Sed hic occaecati rerum. Consectetur quidem non alias. Perferendis in voluptatem minima?', '2020-06-11', 2, 6),
(67, 'At est quia autem sequi est placeat cum. Aut nesciunt sunt dicta est. Illum incidunt alias ratione?', '2020-06-11', 2, 3),
(68, 'Perferendis aperiam rerum aut laboriosam iste vel. Et praesentium dolor et?', '2020-06-11', 2, 9),
(69, 'Et soluta qui vel ea. Labore corporis voluptas velit. Quo est velit eaque eum commodi qui debitis. Eos asperiores omnis excepturi maiores corporis facilis suscipit?', '2020-06-11', 2, 2),
(70, 'Placeat vel tenetur deleniti voluptas. Mollitia vel sapiente recusandae autem eum error perferendis. Nesciunt veniam ea qui hic vero est suscipit?', '2020-06-11', 2, 1),
(71, 'Officiis recusandae nam et recusandae ipsa perferendis. Ea rerum nemo et non magni dolorem labore harum. Quisquam voluptas labore quos iusto. Iusto vel qui corporis?', '2020-06-11', 2, 5),
(72, 'Sunt ut reiciendis dolorem quo reprehenderit. Aut quia voluptate quaerat aliquid incidunt officiis ipsa. Natus assumenda iure dolor voluptas dolorum. Ut est delectus deleniti iusto repudiandae?', '2020-06-11', 2, 8),
(73, 'Sunt ut reiciendis dolorem quo reprehenderit. Aut quia voluptate quaerat aliquid incidunt officiis ipsa. Natus assumenda iure dolor voluptas dolorum. Ut est delectus deleniti iusto repudiandae?', '2020-06-11', 2, 8),
(74, 'Dolorem in eius molestiae dolorem voluptas. Aut nihil eos rerum porro quos. Esse quaerat vel consectetur quibusdam rerum?', '2020-06-11', 2, 5),
(75, 'Itaque harum consequuntur tempora accusamus. Provident placeat sed esse rerum ex perferendis dolorem. Ut fuga expedita molestiae doloremque tempora accusamus nulla?', '2020-06-11', 2, 2),
(76, 'Asperiores vel aspernatur rerum mollitia et ea est nesciunt. Voluptatem odit vel reiciendis perferendis iusto veniam delectus. Qui vel quis et ipsum reiciendis. Vel explicabo qui occaecati?', '2020-06-11', 2, 6),
(77, 'Ex dolores vitae explicabo odio voluptatem libero sunt aut. Illo est aut et alias culpa non laboriosam omnis. Aut eius a alias eos?', '2020-06-11', 2, 4),
(78, 'A voluptatem culpa repellat quis magni officia. Aut et blanditiis saepe vero blanditiis vel hic pariatur. Sint animi sed et?', '2020-06-11', 2, 3),
(79, 'Officiis doloribus aut amet omnis quas. Odit eaque animi quod. Et ea exercitationem in nisi optio?', '2020-06-11', 2, 6),
(80, 'Ut et voluptatem qui et corrupti. Dolorem aliquid eaque voluptas dolores. Ut earum dolores cupiditate repellendus recusandae. Iusto et est voluptate eveniet modi?', '2020-06-11', 2, 8),
(81, 'Sequi dolorem harum repellendus voluptas consequatur et officia. Numquam quibusdam accusantium sint sint. Et est nam qui non aut. Et quis facere possimus veniam facilis?', '2020-06-11', 2, 3),
(82, 'Quibusdam rerum assumenda delectus cumque. Possimus aut sit voluptatem id. Similique omnis veritatis commodi non?', '2020-06-11', 2, 8),
(83, 'Veritatis nulla tempora sint fuga mollitia fugiat. Voluptas earum ad accusantium. Aut tempore odit excepturi?', '2020-06-11', 2, 2),
(84, 'Possimus amet sit debitis aut similique nihil magni perferendis. Necessitatibus ut aut dolorem adipisci aut. Pariatur non voluptatem necessitatibus repellendus?', '2020-06-11', 2, 2),
(85, 'Distinctio nihil ad qui quis rerum sed. Maiores et inventore doloremque aliquam. Harum quod hic corrupti consequatur dolores aliquam est quibusdam. Ut sapiente rerum commodi minus corporis?', '2020-06-11', 2, 3),
(86, 'Delectus sint tempore ipsum reiciendis. Et laboriosam distinctio facilis quidem sapiente omnis dolorem. Laborum sed qui aperiam iure?', '2020-06-11', 2, 2),
(87, 'Expedita quod debitis ducimus doloremque. Rerum eum iusto itaque fugiat magni amet. Aut corrupti autem mollitia pariatur omnis a?', '2020-06-11', 2, 9),
(88, 'Optio atque odit aspernatur itaque. Ut et voluptas sapiente cumque recusandae numquam. Ea velit consequuntur placeat rerum est?', '2020-06-11', 2, 9),
(89, 'Et est amet saepe qui quo repellat quas. Aspernatur eum soluta velit consectetur ea explicabo voluptas. Quos facere quaerat magni maiores modi ut voluptatem eos?', '2020-06-11', 2, 2),
(90, 'Libero dignissimos nesciunt accusantium quia possimus esse nihil qui. Rerum dolorem veniam corporis eum?', '2020-06-11', 2, 2),
(91, 'Odio quis iure aspernatur et. Quo laboriosam voluptatum ad excepturi consequatur ea. Vitae similique itaque voluptatem ut tenetur?', '2020-06-11', 2, 2),
(92, 'Eos mollitia quia velit facilis quas occaecati aut. Enim beatae omnis impedit. Iste ducimus in incidunt aperiam autem illum consequatur?', '2020-06-11', 2, 5),
(93, 'Magnam eius tenetur aspernatur cumque neque. Porro eaque quam eos autem rem magni. Ea et debitis velit ut iure quis aut. Ipsam sit temporibus sed totam in in impedit?', '2020-06-11', 2, 3),
(94, 'Veritatis nobis voluptatem voluptas a. Aut iusto similique rem ut ut alias. Molestias a soluta aut numquam?', '2020-06-11', 2, 4),
(95, 'Quia eveniet est quibusdam quas nemo quia ut. Cupiditate non modi ad tempore at voluptate eius. Expedita velit autem nesciunt repellendus sit et rem?', '2020-06-11', 2, 9),
(96, 'Optio dolor aut sint nihil ab aut. Facere enim pariatur aut est commodi nesciunt consequatur vel. Alias quisquam et placeat rem qui in vero. Unde sit voluptas ut qui. Quam soluta minima et?', '2020-06-11', 2, 3),
(97, 'Ab accusamus ipsam ratione sed cupiditate. Dolorum nisi aut quas aut. Consequuntur adipisci commodi velit qui atque neque sunt?', '2020-06-11', 2, 5),
(98, 'Accusamus sequi sunt quas. Nisi est quia perspiciatis. Sint aperiam unde et aut officiis eum. Architecto nemo dolorum ipsum itaque?', '2020-06-11', 2, 4),
(99, 'Corrupti ratione necessitatibus quae delectus numquam voluptatem. Ex neque voluptate dicta vel. Nulla dolores libero adipisci qui nisi ullam?', '2020-06-11', 2, 4),
(100, 'Soluta consequatur unde tempore non. Debitis nihil libero et accusantium qui. Et alias accusantium mollitia ut laboriosam exercitationem.?', '2020-06-11', 2, 10),
(101, 'Sed dolore velit quibusdam maiores sit harum distinctio nobis. Aperiam est corrupti voluptatem sed a. Et sint velit recusandae delectus reprehenderit?', '2020-06-11', 2, 3),
(102, 'Quisquam ex velit laboriosam quo voluptate. Non et sint cumque et autem odit?', '2020-06-11', 2, 3),
(103, 'Natus ratione omnis maiores. Tempore eum minus ut excepturi iste. Iste quam sit vitae autem aliquid aperiam nemo. At est facere nesciunt iure aliquid?', '2020-06-11', 2, 6),
(104, 'Animi corporis tempora voluptates omnis. Molestiae praesentium et occaecati provident id. Maiores ut similique odio officia consequatur deserunt distinctio?', '2020-06-11', 2, 9),
(105, 'Et qui et enim eius qui. Id eum consequatur provident quibusdam. Natus voluptas nemo qui aspernatur molestiae. Quia quis ut ut animi ducimus sit?', '2020-06-11', 2, 1),
(106, 'Animi ea sed dolor qui fuga. Sint minima quam quos modi. Ea culpa soluta dolorum labore inventore eveniet?', '2020-06-11', 2, 7),
(107, 'Veritatis voluptate doloribus illo cumque est inventore ut. Voluptate ut hic ut qui est exercitationem fugiat. Nobis exercitationem quam quas non veniam quod?', '2020-06-11', 2, 5),
(108, 'Corporis est sapiente nisi fugit architecto consequatur recusandae ea. Vitae laborum suscipit architecto illum quasi perspiciatis et. Nihil quasi aperiam deserunt quisquam odit ut fuga?', '2020-06-11', 2, 4),
(109, 'Est dolorum eveniet porro voluptas. Aut error aliquam rerum. Qui perferendis ut est voluptas iste et ducimus?', '2020-06-11', 2, 4),
(110, 'Deserunt est modi cumque iusto enim. Nisi doloribus maxime dolor ullam impedit consectetur? ', '2020-06-11', 2, 3),
(111, 'Autem voluptas aliquid natus aliquam ut omnis. Et voluptate at maxime voluptatem in. Illum sint nisi et eius nemo possimus molestiae. Blanditiis et fugit exercitationem debitis?', '2020-06-11', 2, 5),
(112, 'Eius reprehenderit ut vel vitae ipsum. Voluptatibus optio nisi et est quod doloremque quo. Minus consequatur illo quos voluptatem. Et sapiente magnam dolor eius?', '2020-06-11', 2, 7),
(113, 'Sapiente quae non sed et saepe non. Blanditiis laudantium repudiandae tenetur maiores necessitatibus optio ut ut. Voluptatibus laboriosam ad a sunt. Temporibus odio perspiciatis eos?', '2020-06-11', 2, 5),
(114, 'Possimus soluta voluptas perspiciatis et ut voluptas non. Eum sit consequatur eos accusamus. Cumque facilis autem consequatur repellendus impedit?', '2020-06-11', 2, 9),
(115, 'Iusto dolor placeat et velit sunt ad. Est voluptates consequatur neque dolores. Laboriosam aliquam eveniet placeat voluptatum?', '2020-06-11', 2, 9),
(116, 'Sapiente vero ut dolorem qui nobis voluptatem ipsa illum. Velit iste architecto unde molestiae odit architecto. Libero odio et voluptatibus iste dolor. Omnis sed est sint beatae?', '2020-06-11', 2, 4),
(117, 'Quam unde voluptates consectetur veniam vel. Maxime est error est ullam enim. Velit odit voluptatem facilis nisi aut?', '2020-06-11', 2, 3),
(118, 'Aut nostrum quia dolorem harum ea est. Et qui suscipit voluptate eligendi. Dolor ut iste dolor eaque nesciunt qui earum. Aut molestiae fugiat id accusamus tempore velit aliquam similique?', '2020-06-11', 2, 2),
(119, 'Et perspiciatis aut adipisci excepturi minus. Velit tempore non sequi odio. Et rerum sed qui enim incidunt. Explicabo aut sint earum reiciendis. Velit et non sed ut?', '2020-06-11', 2, 7),
(120, 'Aut debitis quis ut sint sint eligendi. Quae dolorem consequatur aliquid laboriosam deleniti error. In explicabo modi necessitatibus incidunt et officiis. Aut et sequi corporis mollitia?', '2020-06-11', 2, 6),
(121, 'Laborum dolores quibusdam dolores. Et in doloribus voluptatum eos aspernatur in. Necessitatibus aut velit sit ratione quis vitae?', '2020-06-11', 2, 9),
(122, 'Voluptas dolor voluptatem ipsum beatae qui. Quia soluta voluptatem explicabo eos. Laboriosam aliquam numquam suscipit unde ut?', '2020-06-11', 2, 9),
(123, 'Nihil voluptates distinctio corporis et nobis et vel facilis. Nulla voluptates consequatur aut quo perspiciatis molestias. Nobis quia tempora deleniti ea et?', '2020-06-11', 2, 8),
(124, 'Ad libero corrupti et nobis voluptas quasi eum. Fugit sapiente aut dignissimos totam nulla officia id. Qui pariatur ab dolores modi porro. Ipsam molestiae alias aliquam delectus?', '2020-06-11', 2, 9),
(125, 'Asperiores sed repellat a recusandae alias eveniet. Et aperiam repellat voluptatem magnam eos debitis et. Molestias nemo voluptatibus est dolores molestias nemo et.', '2020-06-11', 2, 3),
(126, 'Et odit eos neque occaecati. Debitis dolorem cupiditate aut magni magnam quo. Dolore beatae exercitationem nihil cupiditate. Rerum quae placeat aperiam?', '2020-06-11', 2, 10),
(127, 'Minus veniam non aliquid dolores iste. Tenetur non dolores et eum consequuntur. Est corrupti temporibus perspiciatis odio quas molestiae sunt?\r\n', '2020-06-11', 2, 10),
(128, 'Ipsum modi nisi eaque. Amet rem nihil sed debitis dolor voluptate. Qui aliquam nihil veritatis reiciendis. Tenetur possimus alias aut?', '2020-06-11', 2, 2),
(129, 'Voluptatem similique laboriosam perspiciatis nobis. Maiores rerum sequi consequatur libero asperiores. Vitae provident nostrum incidunt similique?', '2020-06-11', 2, 4),
(130, 'Distinctio qui quidem nihil quos. Aliquid enim omnis et voluptatem magni. Eos non illum maiores autem eum magnam quis nam?', '2020-06-11', 2, 7),
(131, 'Id nam ab sint earum. Molestias nihil eos eum illum. Optio debitis atque perspiciatis reiciendis ullam exercitationem. Enim blanditiis aut nisi nihil est pariatur?\r\n', '2020-06-11', 2, 7),
(132, 'Odit ipsam aut ut. Enim fugiat eveniet fugiat delectus placeat non doloremque aut. Architecto architecto omnis sunt et illum voluptatem. Nam delectus optio perferendis. Quam dolores sequi dolor?', '2020-06-11', 2, 6),
(133, 'Quia doloribus vel in. Et eum et molestiae fuga illum iure laboriosam nobis. Assumenda id voluptas non iste. Iure eos odio labore ducimus. Praesentium et unde blanditiis et ut vel quis?', '2020-06-11', 2, 8),
(134, 'Consequuntur porro vel tenetur officiis quae quia suscipit. Fugiat est eos nobis voluptas aperiam provident et laudantium. Est tempore numquam labore quo maiores. Doloribus qui hic et quam?', '2020-06-11', 2, 7),
(135, 'Ipsa autem qui et fugiat unde necessitatibus error voluptate. Voluptatibus et dolorem quaerat dicta omnis quasi. Eum cumque laborum voluptas ut?', '2020-06-11', 2, 2),
(136, 'Consequatur placeat vitae et velit velit. Eos dolorum laboriosam quidem. Cupiditate voluptas totam recusandae maiores ut laboriosam iste et. Ut sed ea minima incidunt est?', '2020-06-11', 2, 1),
(137, 'Velit velit molestiae suscipit fugiat consequatur. Consequatur odit odio tempore. Odio eum voluptatem alias. Iure et officia voluptatum est delectus voluptatem non?', '2020-06-11', 2, 8),
(138, 'A aut odio nihil pariatur consequatur explicabo id qui. Dignissimos et quis dolor qui aut. Aut quod dolores totam laborum velit maxime ut?', '2020-06-11', 2, 9),
(139, 'Quia et repellendus quae. Odit et voluptatibus totam optio et rerum?', '2020-06-11', 2, 10),
(140, 'Ex commodi quidem ratione ducimus dolor alias aut. Nihil id nesciunt laboriosam et aliquid consectetur at?', '2020-06-11', 2, 5),
(141, 'Et qui rerum omnis voluptatem. Id sed aut fuga et fugit animi?', '2020-06-11', 2, 4),
(142, 'Accusantium recusandae numquam impedit possimus ducimus quae. Recusandae maiores possimus pariatur nemo aut voluptatum dolor. Aut in id sequi. Occaecati nesciunt quo non soluta exercitationem?', '2020-06-11', 2, 9),
(143, 'Mollitia magnam in voluptate quo. Facere laboriosam perspiciatis quia cupiditate asperiores dolor occaecati. Et fugiat occaecati laboriosam eos molestias dolorem?', '2020-06-11', 2, 3),
(144, 'Ea dolores reprehenderit consequatur omnis. Et nesciunt et ut at quia. Non placeat est dolores eligendi et?', '2020-06-11', 2, 10),
(145, 'Commodi id perferendis aperiam dolorem est id id. A sit voluptas alias consectetur vero quam. Et et perspiciatis vel non. Animi et quis unde et dolores?', '2020-06-11', 2, 5),
(146, 'Tempora aut soluta deserunt. Nesciunt in vel velit impedit culpa eveniet dolorem. Perspiciatis neque sit ratione eius quidem. Quia voluptas delectus vitae voluptate sunt aut consequatur?', '2020-06-11', 2, 3),
(147, 'Similique tempore quisquam qui quisquam illo sint corrupti. Veniam modi eos omnis ea. Quos consequatur iusto assumenda laborum temporibus totam qui?', '2020-06-11', 2, 7),
(148, 'Dolores sed fugit voluptatem omnis eos. Voluptatem repellat corrupti voluptas debitis eligendi. Maxime aut tenetur consequatur nostrum et. Amet tempore delectus id numquam nam sunt voluptatem quia?', '2020-06-11', 2, 10),
(149, 'Et neque similique consequatur vero voluptatem qui adipisci. Ad soluta mollitia cum odit aliquid. Qui minima autem reprehenderit. Porro dolores recusandae sed?', '2020-06-11', 2, 1),
(150, 'Autem rem repellendus optio consequatur voluptate dolor. Delectus eos architecto consequatur eligendi excepturi in sit quisquam. Voluptatum unde dolorem in?', '2020-06-11', 2, 1),
(151, 'Amet aut mollitia nobis possimus beatae sed. Perspiciatis minima explicabo non necessitatibus assumenda molestias. Repellendus et labore amet excepturi ut veniam fugiat?', '2020-06-11', 2, 3),
(152, 'Ut quod neque dolorem. Beatae possimus eaque sit quod officia omnis velit. Adipisci quaerat dolores dolores dolores deleniti reiciendis?', '2020-06-11', 2, 7),
(153, 'Maxime magnam eaque tenetur dicta. Eos nostrum eos et vero doloremque molestiae. Enim id iure delectus nihil ut et?', '2020-06-11', 2, 7),
(154, 'Deleniti illum molestiae quam nobis consequuntur voluptas. Blanditiis natus ut ex blanditiis. Vero fugit quaerat rerum sequi eos. Pariatur aliquid assumenda atque voluptates cupiditate facere non?', '2020-06-11', 2, 10),
(155, 'Repudiandae fuga ut a rerum iste. Aut molestiae voluptatum iusto ea deserunt. Et dolores aut deleniti voluptatibus rem ut. Sed placeat sapiente ut officiis. Facilis minus sint blanditiis in?', '2020-06-11', 2, 3),
(156, 'Esse consequatur eligendi culpa nisi sed. Atque soluta optio vel. Velit commodi adipisci molestias dolores illum?', '2020-06-11', 2, 7),
(157, 'Deleniti repudiandae autem enim perferendis. Dolorum esse dolor voluptate error nesciunt mollitia. Culpa quia voluptate aliquam ad accusantium iure quos?', '2020-06-11', 2, 1),
(158, 'Quisquam cupiditate rerum sint qui non voluptas sit. Incidunt id eos quo. Numquam explicabo odio omnis eum et?', '2020-06-11', 2, 2),
(159, 'Dolores harum et dolorum qui eos vero. Aspernatur ut laudantium ut voluptatem. Autem velit rem quia alias et maxime. Aut temporibus ex quisquam. Temporibus et nesciunt est voluptatibus?', '2020-06-11', 2, 2),
(160, 'Sit doloremque quis aspernatur accusantium. Veritatis quas eius aut quis amet ipsam. Alias qui molestiae accusantium ut rerum labore?', '2020-06-11', 2, 9),
(161, 'Voluptatum amet enim adipisci odit. Velit aut vero nesciunt mollitia. Porro fugit molestiae et et est incidunt inventore?', '2020-06-11', 2, 3),
(162, 'Nesciunt fugiat assumenda fugit totam fugit quod. Qui in facilis nemo. Esse dolores harum nihil ratione eum. Sed vitae tempore cumque similique cumque libero molestiae?', '2020-06-11', 2, 3),
(163, 'Vitae culpa nobis cupiditate iusto suscipit delectus. Facere accusantium error voluptate et quo facere autem omnis. Aliquid soluta sed necessitatibus et sint. A nemo dolorem non?', '2020-06-11', 2, 1),
(164, 'Quaerat reiciendis velit id rem a quisquam. Modi quia provident optio voluptas voluptas et ut. Libero dolorem earum temporibus corporis ipsam. Eveniet quae qui officia omnis?', '2020-06-11', 2, 6),
(165, 'Velit molestiae ea harum sapiente natus. Aspernatur cum veniam perferendis a voluptatem. Quibusdam rerum consectetur maxime?', '2020-06-11', 2, 8),
(166, 'Ratione est architecto quas nihil deleniti ab placeat. Debitis ex unde nulla. Aut qui id neque?', '2020-06-11', 2, 8),
(167, 'Voluptatem sit reiciendis eaque et aut quisquam fuga sed. Nihil omnis sit eligendi est possimus. Voluptas maxime in ullam repellat?', '2020-06-11', 2, 2),
(168, 'Nisi velit ut sed provident consequuntur quia sint. Ad quas et cupiditate placeat consequatur voluptas rerum repellat. Sit ut ducimus est quos. Velit fuga et ut ab dicta?', '2020-06-11', 2, 5),
(169, 'Ratione impedit est est omnis praesentium vitae fuga voluptas. Consequatur voluptatem molestiae illo distinctio adipisci in est. Sit ut placeat modi perferendis suscipit ea?', '2020-06-11', 2, 6),
(170, 'In veniam omnis repudiandae reiciendis repudiandae velit deserunt numquam. Aliquam accusamus qui dolores eum maiores ullam dolore?', '2020-06-11', 2, 1),
(171, 'Placeat et quo eaque quod qui repellat omnis et. Dolor officiis qui alias architecto unde ut dolor. Rerum et quisquam voluptatem impedit blanditiis ea deserunt. Magnam quo adipisci ex ducimus nihil?', '2020-06-11', 2, 4),
(172, 'Expedita nihil perspiciatis eos non repellat non recusandae aperiam. Magnam cupiditate ad sapiente et. In tenetur ipsum repudiandae sit temporibus. Consequatur beatae qui consequuntur ad omnis?', '2020-06-11', 2, 8),
(173, 'Rerum voluptas qui qui rem omnis quia voluptatem. Excepturi asperiores in voluptatem delectus incidunt similique ut dolore?', '2020-06-11', 2, 2),
(174, 'Quam assumenda non voluptas voluptatem consequuntur. Quaerat ullam quas exercitationem ut sint numquam et. Doloribus nostrum eaque dolorum id autem. Id aut ad quia aut?', '2020-06-11', 2, 8);

-- --------------------------------------------------------

--
-- Structure de la table `reponse`
--

DROP TABLE IF EXISTS `reponse`;
CREATE TABLE IF NOT EXISTS `reponse` (
  `Id_reponse` int(11) NOT NULL AUTO_INCREMENT,
  `Contenu_reponse` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `Date_reponse` date NOT NULL,
  `#Id_profil` int(11) NOT NULL,
  `#Id_question` int(11) NOT NULL,
  PRIMARY KEY (`Id_reponse`),
  KEY `#Id_profil` (`#Id_profil`),
  KEY `#Id_question` (`#Id_question`)
) ENGINE=InnoDB AUTO_INCREMENT=95 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Déchargement des données de la table `reponse`
--

INSERT INTO `reponse` (`Id_reponse`, `Contenu_reponse`, `Date_reponse`, `#Id_profil`, `#Id_question`) VALUES
(1, 'Astolfo', '2020-04-03', 1, 1),
(2, 'Because it\'s soooo beautiful :3', '2020-04-04', 2, 3),
(3, 'Omg Lythis noticed me!!', '2020-04-04', 1, 3),
(66, ':(', '2020-04-06', 2, 45),
(77, 'Tu es super beau', '2020-04-02', 1, 45),
(78, 'oui', '2020-04-19', 1, 45),
(79, 'test', '2020-04-19', 1, 3),
(85, 'test', '2020-04-21', 1, 45),
(86, 'test2', '2020-04-21', 1, 45),
(91, 'k', '2020-04-22', 1, 46);

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `Id_role` int(11) NOT NULL AUTO_INCREMENT,
  `Libelle_role` varchar(50) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`Id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`Id_role`, `Libelle_role`) VALUES
(1, 'Admin'),
(2, 'Utilisateur');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `ami`
--
ALTER TABLE `ami`
  ADD CONSTRAINT `Id_profil` FOREIGN KEY (`Id_profil`) REFERENCES `profil` (`Id_profil`),
  ADD CONSTRAINT `Id_profil_demande` FOREIGN KEY (`#Id_profil`) REFERENCES `profil` (`Id_profil`);

--
-- Contraintes pour la table `demande_ami`
--
ALTER TABLE `demande_ami`
  ADD CONSTRAINT `Id_profil_receive` FOREIGN KEY (`#Id_profil`) REFERENCES `profil` (`Id_profil`),
  ADD CONSTRAINT `Id_profil_send` FOREIGN KEY (`Id_profil`) REFERENCES `profil` (`Id_profil`);

--
-- Contraintes pour la table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `#Id_profil` FOREIGN KEY (`#Id_profil`) REFERENCES `profil` (`Id_profil`),
  ADD CONSTRAINT `#Id_question` FOREIGN KEY (`#Id_question`) REFERENCES `question` (`Id_question`);

--
-- Contraintes pour la table `profil`
--
ALTER TABLE `profil`
  ADD CONSTRAINT `FK_#Id_role` FOREIGN KEY (`#Id_role`) REFERENCES `role` (`Id_role`);

--
-- Contraintes pour la table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `FK_#Id_categorie` FOREIGN KEY (`#Id_categorie`) REFERENCES `categorie` (`Id_categorie`),
  ADD CONSTRAINT `FK_#Id_profil` FOREIGN KEY (`#Id_profil`) REFERENCES `profil` (`Id_profil`);

--
-- Contraintes pour la table `reponse`
--
ALTER TABLE `reponse`
  ADD CONSTRAINT `FK_#Id_profil2` FOREIGN KEY (`#Id_profil`) REFERENCES `profil` (`Id_profil`),
  ADD CONSTRAINT `FK_#Id_question` FOREIGN KEY (`#Id_question`) REFERENCES `question` (`Id_question`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
