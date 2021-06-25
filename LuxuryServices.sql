-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Jun 23, 2021 at 01:40 PM
-- Server version: 10.5.8-MariaDB-1:10.5.8+maria~focal-log
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `LuxuryServices`
--

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE `application` (
  `id` int(11) NOT NULL,
  `applied_at` date NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `offer_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`id`, `applied_at`, `user_id`, `offer_id`) VALUES
(1, '2021-06-09', '5', '007a50618f5642709f57671be3e80d4e');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `info_admin_client_id` int(11) DEFAULT NULL,
  `society_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail_contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number_contact` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `activity_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `info_admin_client_id`, `society_name`, `name_contact`, `mail_contact`, `phone_number_contact`, `created_at`, `activity_type`) VALUES
(1, 1, 'Marriott International, Inc.', 'Jean', 'jean@gmail.com', 442424242, '2021-06-07 08:34:43', 'Technology'),
(2, NULL, 'LVMH', 'Julien', 'julien@gmail.com', 76542452, '2021-06-07 09:35:07', 'Technology');

-- --------------------------------------------------------

--
-- Table structure for table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20210531141154', '2021-05-31 16:12:15', 7741),
('DoctrineMigrations\\Version20210601071858', '2021-06-01 09:19:01', 808),
('DoctrineMigrations\\Version20210603090100', '2021-06-03 11:01:05', 664),
('DoctrineMigrations\\Version20210607092424', '2021-06-07 11:24:37', 580),
('DoctrineMigrations\\Version20210608075121', '2021-06-08 09:51:25', 761),
('DoctrineMigrations\\Version20210608075225', '2021-06-08 09:52:29', 573),
('DoctrineMigrations\\Version20210608075443', '2021-06-08 09:54:46', 1074),
('DoctrineMigrations\\Version20210608075741', '2021-06-08 09:57:45', 137),
('DoctrineMigrations\\Version20210608093041', '2021-06-08 11:30:47', 78),
('DoctrineMigrations\\Version20210610115543', '2021-06-10 13:55:48', 81),
('DoctrineMigrations\\Version20210610121833', '2021-06-10 14:18:39', 78);

-- --------------------------------------------------------

--
-- Table structure for table `experience`
--

CREATE TABLE `experience` (
  `id` int(11) NOT NULL,
  `experience` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `experience`
--

INSERT INTO `experience` (`id`, `experience`) VALUES
(1, '0 - 6 month'),
(2, '6 month - 1 year'),
(3, '1 - 2 years'),
(4, '2 + years'),
(5, '5 + years'),
(6, '10 + years');

-- --------------------------------------------------------

--
-- Table structure for table `info_admin_candidat`
--

CREATE TABLE `info_admin_candidat` (
  `id` int(11) NOT NULL,
  `notes` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `files` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `info_admin_candidat`
--

INSERT INTO `info_admin_candidat` (`id`, `notes`, `created_at`, `updated_at`, `files`) VALUES
(1, 'blablabla', '2016-01-01 00:00:00', '2016-01-01 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `info_admin_client`
--

CREATE TABLE `info_admin_client` (
  `id` int(11) NOT NULL,
  `notes` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `info_admin_client`
--

INSERT INTO `info_admin_client` (`id`, `notes`) VALUES
(1, 'efzeezzeezz');

-- --------------------------------------------------------

--
-- Table structure for table `job_category`
--

CREATE TABLE `job_category` (
  `id` int(11) NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_category`
--

INSERT INTO `job_category` (`id`, `category`) VALUES
(1, 'Commercial'),
(2, 'Retail sales'),
(3, 'Creative'),
(4, 'Technology'),
(5, 'Marketing & PR'),
(6, 'Fashion & luxury'),
(7, 'Management & HR');

-- --------------------------------------------------------

--
-- Table structure for table `job_offer`
--

CREATE TABLE `job_offer` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `title_job` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_visible` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `expired_at` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salary` int(11) NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_offer`
--

INSERT INTO `job_offer` (`id`, `category_id`, `type_id`, `client_id`, `title_job`, `is_visible`, `created_at`, `expired_at`, `salary`, `location`, `description`) VALUES
('007a50618f5642709f57671be3e80d4e', 3, 1, 1, 'Nail Artist', 1, '2021-06-08 08:03:52', '2021-06-25', 2550, 'Lyon', 'Nail Art or “art of decorating the nails”, is an advanced method of making up the nails, which consists of making various decorations on them, in addition to or as a replacement for applying varnish.'),
('10', 1, 1, 1, 'Assistant Store Manager Premium Fashion Brand', 1, '2021-06-07 09:39:32', '2021-06-17', 4000, 'Bruxelles', 'As an Assistant Store Manager, you will be supporting the Store Manager in the following duties: training and motivating Sales Assistants; achieving sales goals by monitoring team performances; creating reports, analysing and interpreting retail data; overseeing stock level, maintaining outstanding store condition and visual merchandising standards; handling client complaint'),
('11', 7, 3, 1, 'Assistant Housekeeping Manager', 1, '2021-06-07 09:40:24', '2021-08-04', 2500, 'Dubai', 'Ajman Saray a Luxury Collection Resort Ajman. Housekeeping & Laundry'),
('2', 1, 1, 1, 'Store Manager Luxury Italian Brand', 1, '2021-06-07 09:26:34', '2021-09-30', 2500, 'London', 'The Store Manager will be responsible of managing an amazig team in a well structured and performing Store, the sales are high and it\'s easy to fidelize the clients, which means that is going to be also easy to make higher commissions.\r\n\r\nThe candidate will be responsible of the control of the KPI\'s, targets, store organization and team performance, so it\'s the perfect opportunity to learn new skills and to use the knowledge of the market.'),
('3', 4, 3, 1, 'Back-end Dev Web', 1, '2021-06-07 09:32:08', '2021-07-28', 6000, 'Paris', 'Back-end dev web for Google'),
('4', 2, 3, 1, 'Sales Advisor (Automotive)', 0, '2021-06-07 09:32:58', '2021-08-18', 3800, 'Los Angels', 'On behalf of our client, a luxury segment top player in the automotive industry, for 2 Sales Advisors to join their Store in Los Angeles.'),
('5', 4, 5, 1, 'First Officer -RJ', 0, '2021-06-07 09:33:50', '2021-10-06', 189, 'Canada', 'You are an experienced First Officer seeking a role that will allow you to diversify your skills and grow within Summit Air. You will operate our Avro RJ 85/100 aircraft based out of Edmonton, AB.\r\n\r\nJoin the Summit Air team in Edmonton, AB today!'),
('6', 6, 1, 2, 'Marketing Digital Luxury Brand', 1, '2021-06-07 09:36:04', '2021-10-28', 5000, 'Paris', 'Participate in digital marketing and digital communication of the brand on social networks, the blog, the dedicated website. Contribute to specific marketing plans linked to participation in certain webinars, exhibitions and the Cannes Film Festival.'),
('7', 3, 4, 2, 'Senior Digital Designer', 1, '2021-06-07 09:37:12', '2021-06-30', 4560, 'New York', 'Start as a 3D artist, where you would be responsible for digitally designing every single product of the Maison.'),
('9', 7, 4, 1, 'International Marketing Project & Product Manager', 1, '2021-06-07 09:39:11', '2021-07-02', 2800, 'Paris', 'Development Marketing Strategy As a project manager for marketing developement you will be at the heart of creating concepts, starting with a blank piece of paper, imagining the next launches of innovative products and services that respond best to our consumers needs, while being the guardian of the brands’ DNA. At the same time, you are responsible for the analysis of the brands performance, to be the eyes and ears of our competitors’ activities and a partner for the different markets all over the world.');

-- --------------------------------------------------------

--
-- Table structure for table `job_type`
--

CREATE TABLE `job_type` (
  `id` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_type`
--

INSERT INTO `job_type` (`id`, `type`) VALUES
(1, 'Full Time'),
(2, 'Part Time'),
(3, 'Temporary'),
(4, 'Freelance'),
(5, 'Seasonal');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `experience_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `info_admin_candidat_id` int(11) DEFAULT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:json)',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adress` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nationality` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passport` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cv` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `search_location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_available` tinyint(1) DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `completed_profile` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `experience_id`, `category_id`, `info_admin_candidat_id`, `email`, `roles`, `password`, `gender`, `first_name`, `last_name`, `adress`, `country`, `nationality`, `passport`, `cv`, `photo`, `search_location`, `birth_date`, `birth_location`, `is_available`, `description`, `completed_profile`) VALUES
('3e05a6bee1f3408cbef85cce6de25996', 1, 1, NULL, 'max@gmail.com', '[]', '$argon2id$v=19$m=65536,t=4,p=1$2jBUNbJikusKfQOWq6eZyQ$RlRuULSp6yZY3cs4AhmQ50G9YSvW8Jsupt2j0xtP7Xw', 'Male', 'Maxime', 'Regny', 'Regny', 'France', 'Fa', NULL, NULL, NULL, 'Regny', NULL, NULL, 0, 'Maecenas eget eleifend orci. Pellentesque tempor sollicitudin urna, at hendrerit nisl. Nullam auctor eros ac nulla mattis lobortis. Proin fermentum, magna vitae aliquet fermentum.', 1),
('5', 5, 4, 1, 'hamza@gmail.com', '[]', '$argon2id$v=19$m=65536,t=4,p=1$qQON0MeeBVuvolDzgAUaxQ$DXjF5KJnUwgGPUzGWk6LL4ujSWQHgER2O5GLrhyQL4Y', 'Male', 'Hamza', 'K', '69 rue de la paix 69007 Lyon', 'France', 'Francais', '023-ninja-4-60b9eb621df35.png', '017-ninja-2-60bf413619b7a.png', '001-ninja-60b9d766087f4.png', 'Lyon', '1996-06-27', 'Lyon', 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin nec lectus aliquet tortor ultricies hendrerit luctus eu massa. Quisque semper enim ut lacus aliquam viverra.', 1),
('6', 1, 1, NULL, 'admin@gmail.com', '[\"ROLE_ADMIN\"]', '$argon2id$v=19$m=65536,t=4,p=1$E+s65/IBN6o6CKLmSHTB+w$8z3cYiFO6KoZY1xXNZx3o1ss9Vhh5bXodktnuiaKjW4', 'Male', 'Maxime', 'Regny', 'Regny', 'France', 'Francais', 'js1-60bf6d3243c00.png', NULL, 'house-60bf6cb014345.jpg', 'Regny', NULL, NULL, 0, 'Phasellus consequat lectus et magna vehicula euismod. Nam tempus turpis pharetra massa hendrerit auctor vel ac risus. Praesent nulla turpis, iaculis nec pulvinar eget.', 1),
('7', 3, 4, NULL, 'jean@gmail.com', '[]', '$argon2id$v=19$m=65536,t=4,p=1$dFbfN3hQ6Sfz3jEEDlNfcw$s/OB2JrSPoOYVR2D8dC077qYLFz+nOywQ1tm7Hzag7A', 'Male', 'Jean', 'Bonnard', '123 route de saint cyr St Colombe sur Gand', 'France', 'Francais', NULL, NULL, '033-hannya-60b9d88214474.png', 'Roanne', '1990-04-17', 'St Etienne', 1, 'Aliquam erat volutpat. Suspendisse molestie metus auctor ultricies dignissim.', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_A45BDDC1A76ED395` (`user_id`),
  ADD KEY `IDX_A45BDDC153C674EE` (`offer_id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_C74404551A30DA6A` (`info_admin_client_id`);

--
-- Indexes for table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `experience`
--
ALTER TABLE `experience`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `info_admin_candidat`
--
ALTER TABLE `info_admin_candidat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `info_admin_client`
--
ALTER TABLE `info_admin_client`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_category`
--
ALTER TABLE `job_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_offer`
--
ALTER TABLE `job_offer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_288A3A4E12469DE2` (`category_id`),
  ADD KEY `IDX_288A3A4EC54C8C93` (`type_id`),
  ADD KEY `IDX_288A3A4E19EB6921` (`client_id`);

--
-- Indexes for table `job_type`
--
ALTER TABLE `job_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`),
  ADD UNIQUE KEY `UNIQ_8D93D64949359CA1` (`info_admin_candidat_id`),
  ADD KEY `IDX_8D93D64946E90E27` (`experience_id`),
  ADD KEY `IDX_8D93D64912469DE2` (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `application`
--
ALTER TABLE `application`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `experience`
--
ALTER TABLE `experience`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `info_admin_candidat`
--
ALTER TABLE `info_admin_candidat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `info_admin_client`
--
ALTER TABLE `info_admin_client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `job_category`
--
ALTER TABLE `job_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `job_type`
--
ALTER TABLE `job_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `application`
--
ALTER TABLE `application`
  ADD CONSTRAINT `FK_A45BDDC153C674EE` FOREIGN KEY (`offer_id`) REFERENCES `job_offer` (`id`),
  ADD CONSTRAINT `FK_A45BDDC1A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `FK_C74404551A30DA6A` FOREIGN KEY (`info_admin_client_id`) REFERENCES `info_admin_client` (`id`);

--
-- Constraints for table `job_offer`
--
ALTER TABLE `job_offer`
  ADD CONSTRAINT `FK_288A3A4E12469DE2` FOREIGN KEY (`category_id`) REFERENCES `job_category` (`id`),
  ADD CONSTRAINT `FK_288A3A4E19EB6921` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`),
  ADD CONSTRAINT `FK_288A3A4EC54C8C93` FOREIGN KEY (`type_id`) REFERENCES `job_type` (`id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_8D93D64912469DE2` FOREIGN KEY (`category_id`) REFERENCES `job_category` (`id`),
  ADD CONSTRAINT `FK_8D93D64946E90E27` FOREIGN KEY (`experience_id`) REFERENCES `experience` (`id`),
  ADD CONSTRAINT `FK_8D93D64949359CA1` FOREIGN KEY (`info_admin_candidat_id`) REFERENCES `info_admin_candidat` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
