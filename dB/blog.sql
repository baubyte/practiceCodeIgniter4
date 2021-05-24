-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: codeigniter-db:3306
-- Tiempo de generación: 24-05-2021 a las 00:05:00
-- Versión del servidor: 5.7.33
-- Versión de PHP: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `blog`
--
CREATE DATABASE IF NOT EXISTS `blog` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `blog`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `id` int(12) UNSIGNED NOT NULL,
  `name` varchar(120) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'PHP', '2021-05-23 18:41:09', '2021-05-23 18:41:09', NULL),
(2, 'Python', '2021-05-23 18:41:17', '2021-05-23 18:41:17', NULL),
(3, 'Java', '2021-05-23 18:41:23', '2021-05-23 18:41:23', NULL),
(4, 'Javascript', '2021-05-23 18:41:28', '2021-05-23 18:41:28', NULL),
(5, 'C++', '2021-05-23 18:41:46', '2021-05-23 18:41:46', NULL),
(6, 'ASP Classic', '2021-05-23 18:43:15', '2021-05-23 18:43:15', NULL),
(7, 'C', '2021-05-23 18:43:20', '2021-05-23 18:43:20', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories_posts`
--

CREATE TABLE `categories_posts` (
  `id` int(12) UNSIGNED NOT NULL,
  `post_id` int(12) UNSIGNED DEFAULT NULL,
  `category_id` int(12) UNSIGNED DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `countries`
--

CREATE TABLE `countries` (
  `id` int(12) UNSIGNED NOT NULL,
  `name` varchar(80) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `countries`
--

INSERT INTO `countries` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Portugal', '1978-06-09 22:23:55', '2003-11-24 13:47:12', NULL),
(2, 'Palau', '1991-03-31 08:14:05', '2002-10-22 04:01:26', NULL),
(3, 'Taiwan', '1970-11-19 08:37:57', '1988-10-21 19:13:42', NULL),
(4, 'Dominican Republic', '2021-03-10 13:24:47', '2021-04-08 19:54:04', NULL),
(5, 'Madagascar', '1976-10-26 23:30:36', '1984-05-05 03:57:24', NULL),
(6, 'Kuwait', '1974-11-10 11:19:08', '2020-08-16 13:08:32', NULL),
(7, 'Marshall Islands', '1975-09-07 08:11:26', '1979-06-08 18:46:01', NULL),
(8, 'Northern Mariana Islands', '2018-07-05 12:46:20', '2018-07-08 22:23:34', NULL),
(9, 'Iceland', '1975-10-12 21:24:58', '2013-04-08 10:46:17', NULL),
(10, 'Belgium', '2010-09-26 01:27:40', '2019-06-13 01:06:08', NULL),
(11, 'Saint Lucia', '1970-12-24 14:19:27', '2000-05-12 17:04:33', NULL),
(12, 'United States of America', '1990-06-08 16:48:57', '2009-12-19 15:18:36', NULL),
(13, 'Netherlands', '1983-07-03 14:34:33', '2017-05-02 08:37:30', NULL),
(14, 'Albania', '2021-04-12 19:47:21', '2021-04-20 17:28:08', NULL),
(15, 'Antigua and Barbuda', '1991-04-07 09:46:44', '2021-03-23 16:20:28', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `groups`
--

CREATE TABLE `groups` (
  `id` int(12) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `groups`
--

INSERT INTO `groups` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin', '2021-05-23 18:37:10', '2021-05-23 18:37:10', NULL),
(2, 'User', '2021-05-23 18:37:10', '2021-05-23 18:37:10', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(21, '2021-05-15-015610', 'App\\Database\\Migrations\\AddCountries', 'default', 'App', 1621805790, 1),
(22, '2021-05-15-020231', 'App\\Database\\Migrations\\AddGroups', 'default', 'App', 1621805790, 1),
(23, '2021-05-15-020251', 'App\\Database\\Migrations\\AddUsers', 'default', 'App', 1621805791, 1),
(24, '2021-05-15-021236', 'App\\Database\\Migrations\\AddUsersInfo', 'default', 'App', 1621805791, 1),
(25, '2021-05-15-022119', 'App\\Database\\Migrations\\AddPosts', 'default', 'App', 1621805792, 1),
(26, '2021-05-15-022139', 'App\\Database\\Migrations\\AddCategories', 'default', 'App', 1621805792, 1),
(27, '2021-05-15-022207', 'App\\Database\\Migrations\\AddCategoriesPosts', 'default', 'App', 1621805793, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posts`
--

CREATE TABLE `posts` (
  `id` int(12) UNSIGNED NOT NULL,
  `user_id` int(12) UNSIGNED DEFAULT NULL,
  `title` varchar(120) NOT NULL,
  `slug` varchar(150) NOT NULL,
  `body` text,
  `image` varchar(40) DEFAULT NULL,
  `published_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(12) UNSIGNED NOT NULL,
  `group_id` int(12) UNSIGNED DEFAULT NULL,
  `username` varchar(120) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(60) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `group_id`, `username`, `email`, `password`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'BauByte', 'admin@admin.com', '$2y$10$XsyAVMuwv4JULtjtROHbhOZN57H5L.JW5H4/ewq4vvBrqsSJjpdHa', '2021-05-23 18:40:27', '2021-05-23 18:40:27', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users_info`
--

CREATE TABLE `users_info` (
  `id` int(12) UNSIGNED NOT NULL,
  `user_id` int(12) UNSIGNED DEFAULT NULL,
  `country_id` int(12) UNSIGNED DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users_info`
--

INSERT INTO `users_info` (`id`, `user_id`, `country_id`, `name`, `surname`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 12, 'Bau', 'Byte', '2021-05-23 18:40:27', '2021-05-23 18:40:27', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categories_posts`
--
ALTER TABLE `categories_posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_posts_post_id_foreign` (`post_id`),
  ADD KEY `categories_posts_category_id_foreign` (`category_id`);

--
-- Indices de la tabla `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `posts_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `users_group_id_foreign` (`group_id`);

--
-- Indices de la tabla `users_info`
--
ALTER TABLE `users_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_info_user_id_foreign` (`user_id`),
  ADD KEY `users_info_country_id_foreign` (`country_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `categories_posts`
--
ALTER TABLE `categories_posts`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `users_info`
--
ALTER TABLE `users_info`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `categories_posts`
--
ALTER TABLE `categories_posts`
  ADD CONSTRAINT `categories_posts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `categories_posts_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Filtros para la tabla `users_info`
--
ALTER TABLE `users_info`
  ADD CONSTRAINT `users_info_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `users_info_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
