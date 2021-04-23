-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 23, 2021 at 02:43 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sanctuary`
--

-- --------------------------------------------------------

--
-- Table structure for table `animals`
--

CREATE TABLE `animals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` date NOT NULL,
  `description` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` enum('mammal','bird','reptile','amphibian','fish','invertebrate') COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `available` tinyint(1) NOT NULL DEFAULT 1,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `animals`
--

INSERT INTO `animals` (`id`, `created_at`, `updated_at`, `name`, `date_of_birth`, `description`, `type`, `image`, `available`, `user_id`) VALUES
(3, '2021-04-15 11:47:54', '2021-04-16 16:14:11', 'Clair Wunsch', '1983-11-08', 'DROP animals;', 'amphibian', 'noimage.jpg', 0, 8),
(4, '2021-04-15 11:47:54', '2021-04-15 11:47:54', 'Miss Lauren Ward', '2011-08-12', 'Provident saepe est velit rem. Reiciendis nam cum pariatur commodi fuga. Perspiciatis numquam voluptatem architecto voluptatem asperiores.', 'mammal', 'noimage.jpg', 1, NULL),
(5, '2021-04-15 11:47:54', '2021-04-15 22:02:05', 'Peter Parisian', '1977-01-13', 'Ut et tempore autem ut vel aut. Dolor numquam fugit enim. Vel odit quaerat reprehenderit et. Ad ex quia repudiandae.', 'mammal', 'noimage.jpg', 0, 4),
(6, '2021-04-15 11:47:54', '2021-04-15 12:18:42', 'Prof. Maybell Abbott', '1987-03-20', 'Dolorem aliquam ab repudiandae commodi voluptates rerum incidunt. Necessitatibus vel tempore unde similique sit. Debitis et corporis deleniti vero sit provident eaque ducimus.', 'mammal', 'noimage.jpg', 0, 1),
(7, '2021-04-15 11:47:54', '2021-04-16 16:11:27', 'Jovany Bartell', '1994-01-08', 'Corporis mollitia pariatur eum. Eos ipsum est qui eius dolorum aut culpa. Quos explicabo ipsum sunt sit eius accusamus et nisi. Aliquam consequatur dolores rerum.', 'amphibian', 'Screenshot 2021-04-08 at 17.30.37_1618592669.png', 0, 2),
(8, '2021-04-15 11:47:54', '2021-04-15 11:47:54', 'Stefan Turcotte', '1989-07-13', 'Ut consequuntur sed in molestiae sed non nisi. Maiores est eos quas at illo. Amet ullam et dolores dolorem.', 'amphibian', 'noimage.jpg', 1, NULL),
(9, '2021-04-15 11:47:54', '2021-04-16 16:11:43', 'Torrey Baumbach', '1984-11-23', 'Et qui voluptas voluptas ea accusamus necessitatibus. Ducimus est labore temporibus ut odio tempora repudiandae. Et quis et nostrum.', 'reptile', 'noimage.jpg', 0, 21),
(10, '2021-04-15 11:47:54', '2021-04-15 12:27:16', 'Shannon Lesch', '1990-03-28', 'Eaque nisi iste nostrum debitis. Quasi debitis velit unde odio possimus minima sunt. Aut quasi quia aut ut.', 'amphibian', 'noimage.jpg', 0, 9),
(11, '2021-04-15 14:17:42', '2021-04-16 16:11:30', 'Prof. Leonie Marks', '1989-12-11', 'Officiis velit magni magni aut dolor et id. Sint sint nesciunt voluptatem et laudantium neque vitae beatae. Et corrupti dolor accusantium. Fugiat voluptas reiciendis et est quo atque culpa.', 'bird', 'noimage.jpg', 0, 23),
(12, '2021-04-15 14:17:42', '2021-04-15 14:17:42', 'Jodie Harber', '1987-08-06', 'Sed asperiores ut tempore inventore. Totam est enim quam eum. Quo facere quam et unde accusamus. Magni blanditiis saepe omnis corporis reprehenderit.', 'bird', 'noimage.jpg', 1, NULL),
(13, '2021-04-15 14:17:42', '2021-04-15 14:17:42', 'Madelyn Johns I', '2014-09-07', 'Et tenetur et nulla iure tempore. Asperiores deserunt et voluptas. Earum libero omnis necessitatibus voluptatem quae.', 'reptile', 'noimage.jpg', 1, NULL),
(14, '2021-04-15 14:17:42', '2021-04-15 14:17:42', 'Dr. Zane Greenholt II', '1986-01-21', 'Ut nam tempore ipsum. Repudiandae perspiciatis deleniti ducimus exercitationem ad qui. Possimus vel quaerat ducimus.', 'mammal', 'noimage.jpg', 1, NULL),
(15, '2021-04-15 14:17:42', '2021-04-15 14:17:42', 'Miss Naomie Mraz', '1994-07-23', 'Sequi cupiditate repudiandae sunt. Saepe minima magnam ad maxime esse culpa. Omnis necessitatibus quo consequatur nobis sit.', 'bird', 'noimage.jpg', 1, NULL),
(16, '2021-04-15 14:17:42', '2021-04-15 14:17:42', 'Prof. Jack Hackett', '1992-09-24', 'Temporibus non maxime totam quis. Ad autem eligendi placeat dolorem et minus minus enim. Nostrum accusamus omnis voluptatem autem. Aliquid sunt velit et nihil.', 'invertebrate', 'noimage.jpg', 1, NULL),
(17, '2021-04-15 14:17:42', '2021-04-15 22:02:57', 'Monserrat Lowe', '1975-06-15', 'Provident sed dolor incidunt rerum maiores iure architecto. Commodi eum culpa aut odit sunt. Recusandae provident ea nesciunt blanditiis ut sed. In quia iure quisquam dolores placeat.', 'reptile', 'noimage.jpg', 0, 15),
(18, '2021-04-15 14:17:42', '2021-04-15 14:17:42', 'Coleman Zieme', '2003-12-08', 'Itaque sapiente veritatis doloribus officiis occaecati. Suscipit iste quia tempore. Quasi dolor vero est voluptatem. Sequi similique commodi rerum sed eos fuga.', 'amphibian', 'noimage.jpg', 1, NULL),
(19, '2021-04-15 14:17:42', '2021-04-15 14:17:42', 'Hudson Schmidt', '1999-10-19', 'Quo velit non et qui ut. Et libero ut cumque blanditiis voluptatibus harum sit. Velit cumque accusantium voluptate molestiae ea harum quam quas. Corrupti sapiente et corrupti qui id.', 'mammal', 'noimage.jpg', 1, NULL),
(20, '2021-04-15 14:17:42', '2021-04-15 14:17:42', 'Dr. Pearline Beer', '1986-08-10', 'Aut sequi consequatur fugiat aut. Voluptates et vero nostrum magni tempora molestias. Dolor vero in delectus maiores voluptatem.', 'invertebrate', 'noimage.jpg', 1, NULL),
(21, '2021-04-15 14:43:01', '2021-04-15 14:43:01', 'a', '1212-12-12', NULL, 'mammal', 'noimage.jpg', 1, NULL),
(23, '2021-04-15 15:17:14', '2021-04-15 15:17:14', 'a', '1234-12-12', NULL, 'bird', 'noimage.jpg', 1, NULL),
(28, '2021-04-16 16:21:09', '2021-04-16 16:21:09', 'asd', '2021-04-22', 'asd', 'amphibian', 'noimage.jpg', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(91, '2014_10_12_000000_create_users_table', 1),
(92, '2014_10_12_100000_create_password_resets_table', 1),
(93, '2019_08_19_000000_create_failed_jobs_table', 1),
(94, '2021_04_05_212556_create_animals_table', 1),
(95, '2021_04_05_222435_create_requests_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `animal_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `adoption_status` enum('approved','denied','pending') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `created_at`, `updated_at`, `animal_id`, `user_id`, `adoption_status`) VALUES
(1, '2021-04-15 11:47:54', '2021-04-15 12:27:15', 9, 3, 'approved'),
(2, '2021-04-15 11:47:54', '2021-04-15 12:27:16', 10, 9, 'approved'),
(3, '2021-04-15 11:47:54', '2021-04-15 12:19:02', 7, 3, 'denied'),
(4, '2021-04-15 11:47:54', '2021-04-15 22:02:05', 5, 4, 'approved'),
(5, '2021-04-15 11:47:54', '2021-04-15 22:02:29', 3, 8, 'approved'),
(6, '2021-04-15 11:47:54', '2021-04-15 12:19:00', 3, 1, 'denied'),
(7, '2021-04-15 11:47:54', '2021-04-15 12:19:02', 7, 10, 'approved'),
(8, '2021-04-15 11:47:54', '2021-04-15 22:02:29', 3, 10, 'denied'),
(9, '2021-04-15 11:47:54', '2021-04-15 22:02:29', 3, 9, 'denied'),
(10, '2021-04-15 11:47:54', '2021-04-15 12:18:42', 6, 1, 'approved'),
(12, '2021-04-15 14:17:42', '2021-04-15 22:02:57', 17, 15, 'approved'),
(13, '2021-04-15 14:17:42', '2021-04-16 10:54:55', 9, 21, 'approved'),
(14, '2021-04-15 14:17:42', '2021-04-16 10:54:56', 18, 18, 'denied'),
(17, '2021-04-15 14:17:42', '2021-04-16 16:11:27', 7, 2, 'approved'),
(18, '2021-04-15 14:17:42', '2021-04-15 22:02:57', 17, 16, 'denied'),
(19, '2021-04-15 14:17:42', '2021-04-15 14:17:42', 6, 8, 'pending'),
(20, '2021-04-15 14:17:42', '2021-04-15 14:17:42', 4, 9, 'pending'),
(21, '2021-04-15 14:17:42', '2021-04-15 14:17:42', 20, 8, 'pending'),
(31, '2021-04-15 19:37:27', '2021-04-16 16:11:29', 11, 1, 'denied'),
(35, '2021-04-16 16:10:57', '2021-04-16 16:11:30', 11, 23, 'approved'),
(36, '2021-04-16 16:10:58', '2021-04-16 16:10:58', 12, 23, 'pending'),
(37, '2021-04-16 21:35:03', '2021-04-16 21:35:03', 4, 1, 'pending'),
(38, '2021-04-16 21:37:34', '2021-04-16 21:37:34', 12, 1, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `forename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `role` tinyint(1) NOT NULL DEFAULT 0,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `forename`, `surname`, `email`, `email_verified_at`, `role`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'yerdman', 'Selena', 'Pagac', 'Selena@Pagac.com', NULL, 0, '$2y$10$wLHM63.GTtIRjuBbtFCUquUG3piGQclG50WHbujgpcfxYPqLr7JYm', NULL, '2021-04-15 11:47:53', '2021-04-15 11:47:53'),
(2, 'cheyenne.kihn', 'Xander', 'Lehner', 'Xander@Lehner.com', NULL, 0, '$2y$10$.3qIPHrUzmXqQrgxmIlMTuUCcY5AD27k66fh7NH.pc5q/PTycOTnm', NULL, '2021-04-15 11:47:53', '2021-04-15 11:47:53'),
(3, 'gust.rogahn', 'Riley', 'McGlynn', 'Riley@McGlynn.com', NULL, 0, '$2y$10$sUczJq/UpjER4QfLheLJDu2I0zr/LJUmsaj/S1IV./lP.hCDlfMjW', NULL, '2021-04-15 11:47:53', '2021-04-15 11:47:53'),
(4, 'erica.greenholt', 'Corine', 'Bruen', 'Corine@Bruen.com', NULL, 0, '$2y$10$zhYbWcF97PE9d5iNkYwzaOPuHCvrnlaga9YHzDeoMJzgV05H0Bi0K', NULL, '2021-04-15 11:47:53', '2021-04-15 11:47:53'),
(5, 'ellsworth.weimann', 'Harley', 'Hilpert', 'Harley@Hilpert.com', NULL, 0, '$2y$10$zQ/xm9YpzZWM77LUnLd9WuHgk6Aw1k.NgCC9DLNCz/DnkOGxiBBK2', NULL, '2021-04-15 11:47:53', '2021-04-15 11:47:53'),
(6, 'willms.eliza', 'Luther', 'Haley', 'Luther@Haley.com', NULL, 0, '$2y$10$6lkXTcu1At0oehWZdnIh9u2S1lejfcO03xXBQclEUe/bL5ugx632K', NULL, '2021-04-15 11:47:53', '2021-04-15 11:47:53'),
(7, 'treutel.alberto', 'Matilde', 'Lubowitz', 'Matilde@Lubowitz.com', NULL, 0, '$2y$10$6c24Jv3Q19OpdfQM6MWPeOmE1CSfxTD2EQ8KWDm2crVSbK8SSLxIS', NULL, '2021-04-15 11:47:53', '2021-04-15 11:47:53'),
(8, 'lueilwitz.nola', 'Reanna', 'Marquardt', 'Reanna@Marquardt.com', NULL, 0, '$2y$10$NDP6A9arRTb7M5K5K/dXAuadpOnxqN.K28tyPa/lT8BMk0/TAWfNG', NULL, '2021-04-15 11:47:53', '2021-04-15 11:47:53'),
(9, 'waino.satterfield', 'Wanda', 'Emmerich', 'Wanda@Emmerich.com', NULL, 0, '$2y$10$pSn//jaFLfaeww5ruweE8eVcWp1/BBWLEGjzfOHqi44PeLTvvvpgC', NULL, '2021-04-15 11:47:54', '2021-04-15 11:47:54'),
(10, 'adaugherty', 'Solon', 'Schaden', 'Solon@Schaden.com', NULL, 0, '$2y$10$XQvOXA34vQPmoRQBDqO2Q.6zkn6QfSy0teRWi7HgJbBP6Dhwb6C1G', NULL, '2021-04-15 11:47:54', '2021-04-15 11:47:54'),
(13, 'terry.von', 'Oleta', 'Fritsch', 'Oleta@Fritsch.com', NULL, 0, '$2y$10$4hA7h4g.T2UKQUc.Y29eE.wpFjqjkYR1U0HAZzGbfnDsBHUi4jBhy', NULL, '2021-04-15 14:17:42', '2021-04-15 14:17:42'),
(14, 'mckenna45', 'Andy', 'Kub', 'Andy@Kub.com', NULL, 0, '$2y$10$xT2UORZL13UdxRIbaROg0.ZTHrmwJwM8FVDcK1yX89s2SdpFP2OCa', NULL, '2021-04-15 14:17:42', '2021-04-15 14:17:42'),
(15, 'deven03', 'Baron', 'Breitenberg', 'Baron@Breitenberg.com', NULL, 0, '$2y$10$vf8.iolW4OudjGz18xAi4eB6dkBXsMIpluewMUzasqlManh4WChaq', NULL, '2021-04-15 14:17:42', '2021-04-15 14:17:42'),
(16, 'eoberbrunner', 'Ernie', 'Crona', 'Ernie@Crona.com', NULL, 0, '$2y$10$WvtWnJK/3tEGeHX1NG4dROnd2PZZRAdeyx.EN2cGJMhfgldXpeFJq', NULL, '2021-04-15 14:17:42', '2021-04-15 14:17:42'),
(17, 'barton.jayce', 'Estell', 'Koelpin', 'Estell@Koelpin.com', NULL, 0, '$2y$10$el7OIcEWQmMlu7MhoPUImeE3IkpCd9578oAG1LQxCOHzQ2VUKd.cC', NULL, '2021-04-15 14:17:42', '2021-04-15 14:17:42'),
(18, 'zgaylord', 'Patience', 'Rohan', 'Patience@Rohan.com', NULL, 0, '$2y$10$dNSCqYdq5pDzynZp.YgYo.9NPSGIzc4RM6i/cCCuUkRWkayKsMwsq', NULL, '2021-04-15 14:17:42', '2021-04-15 14:17:42'),
(19, 'icorwin', 'Giovani', 'Abbott', 'Giovani@Abbott.com', NULL, 0, '$2y$10$DIwGn3d7GQVVPislJIFJl.7osAornYrJ4K/YO4FyPi3fen47oO1h6', NULL, '2021-04-15 14:17:42', '2021-04-15 14:17:42'),
(20, 'lois75', 'Esteban', 'Prosacco', 'Esteban@Prosacco.com', NULL, 0, '$2y$10$y9Ik/MFwynwcqq6A2TmUHucdgXWrCVin3W1.UkALAbRXYW46hoXLS', NULL, '2021-04-15 14:17:42', '2021-04-15 14:17:42'),
(21, 'lawrence56', 'Aliza', 'Zulauf', 'Aliza@Zulauf.com', NULL, 0, '$2y$10$g9cDIAxw3IwU/jCz/jYuK.KRFgYfI6.cV/PPiYAYELIyg0MFQcOhe', NULL, '2021-04-15 14:17:42', '2021-04-15 14:17:42'),
(22, 'mia76', 'Audreanne', 'Okuneva', 'Audreanne@Okuneva.com', NULL, 0, '$2y$10$/9NBgaxu5t7fVwDYgaqFP./u8pJEFXHrd.JKQc6UcMewLB2kOJlzu', NULL, '2021-04-15 14:17:42', '2021-04-15 14:17:42'),
(23, 'test', 'test', 'test', 'test@test.com', NULL, 1, '$2y$10$LGp3YzCeZJfQnr0s6l1b/enMP56VlkMjQUkawVSSMaPDnHnWGkgA.', NULL, '2021-04-16 16:10:19', '2021-04-16 16:10:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `animals`
--
ALTER TABLE `animals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `animals_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `requests_animal_id_user_id_unique` (`animal_id`,`user_id`),
  ADD KEY `requests_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `animals`
--
ALTER TABLE `animals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `animals`
--
ALTER TABLE `animals`
  ADD CONSTRAINT `animals_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `requests`
--
ALTER TABLE `requests`
  ADD CONSTRAINT `requests_animal_id_foreign` FOREIGN KEY (`animal_id`) REFERENCES `animals` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `requests_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
