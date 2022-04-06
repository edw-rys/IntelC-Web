-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2022 at 04:01 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `intelc_db_2022`
--

-- --------------------------------------------------------

--
-- Table structure for table `audits`
--

CREATE TABLE `audits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `event` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `auditable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `auditable_id` bigint(20) UNSIGNED NOT NULL,
  `old_values` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `new_values` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` varchar(1023) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `audits`
--

INSERT INTO `audits` (`id`, `user_type`, `user_id`, `event`, `auditable_type`, `auditable_id`, `old_values`, `new_values`, `url`, `ip_address`, `user_agent`, `tags`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 1, 'updated', 'App\\Models\\Service', 1, '{\"title\":\"Garantice la privacidad y la seguridad\",\"short_description\":\"Garantice la privacidad y la seguridad\"}', '{\"title\":\"Garantice la privacidad y la seguridad.\",\"short_description\":\"Garantice la privacidad y la seguridad 001,\"}', 'http://intelc.test/admin/service/update/1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', NULL, '2022-03-06 21:02:05', '2022-03-06 21:02:05'),
(2, 'App\\Models\\User', 1, 'created', 'App\\Models\\Service', 2, '[]', '{\"title\":\"Acceso y velocidad de transmisi\\u00f3n\",\"short_description\":\"Acceso y velocidad de transmisi\\u00f3n\",\"description\":\"<p><br><\\/p>\",\"image\":{},\"created_by\":1,\"updated_by\":1,\"id\":2}', 'http://intelc.test/admin/service', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', NULL, '2022-03-06 21:02:42', '2022-03-06 21:02:42'),
(3, 'App\\Models\\User', 1, 'updated', 'App\\Models\\Service', 2, '{\"image\":{}}', '{\"image\":\"9Mk16FyKcDzSd1MU1G1gGBw65rXAbwBMmjBa9ZIU.svg\"}', 'http://intelc.test/admin/service', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', NULL, '2022-03-06 21:02:42', '2022-03-06 21:02:42'),
(4, 'App\\Models\\User', 1, 'updated', 'App\\Models\\Service', 1, '{\"deleted_by\":null}', '{\"deleted_by\":1}', 'http://intelc.test/admin/service/1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', NULL, '2022-03-06 21:07:33', '2022-03-06 21:07:33'),
(5, 'App\\Models\\User', 1, 'deleted', 'App\\Models\\Service', 1, '{\"id\":1,\"title\":\"Garantice la privacidad y la seguridad.\",\"short_description\":\"Garantice la privacidad y la seguridad 001,\",\"icon\":null,\"image\":\"DPfNrOaIoJUGAoVu7A63dnvQyr1S4Q2XY1mEAS5U.svg\",\"background\":null,\"description\":\"<p><br><\\/p>\",\"video_url\":null,\"content\":null,\"created_by\":1,\"updated_by\":1,\"deleted_by\":1}', '[]', 'http://intelc.test/admin/service/1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', NULL, '2022-03-06 21:07:33', '2022-03-06 21:07:33'),
(6, 'App\\Models\\User', 1, 'updated', 'App\\Models\\Service', 1, '{\"deleted_by\":1}', '{\"deleted_by\":null}', 'http://intelc.test/admin/service/restore/1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', NULL, '2022-03-06 21:08:40', '2022-03-06 21:08:40'),
(7, 'App\\Models\\User', 1, 'updated', 'App\\Models\\Service', 1, '{\"image\":\"DPfNrOaIoJUGAoVu7A63dnvQyr1S4Q2XY1mEAS5U.svg\"}', '{\"image\":\"arrow-right.svg\"}', 'http://intelc.test/admin/service/update/1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', NULL, '2022-03-06 21:20:01', '2022-03-06 21:20:01'),
(8, 'App\\Models\\User', 1, 'updated', 'App\\Models\\Service', 2, '{\"image\":\"9Mk16FyKcDzSd1MU1G1gGBw65rXAbwBMmjBa9ZIU.svg\"}', '{\"image\":\"speed.svg\"}', 'http://intelc.test/admin/service/update/2', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', NULL, '2022-03-06 21:20:12', '2022-03-06 21:20:12'),
(9, 'App\\Models\\User', 1, 'updated', 'App\\Models\\Service', 1, '{\"image\":\"arrow-right.svg\"}', '{\"image\":\"security.svg\"}', 'http://intelc.test/admin/service/update/1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', NULL, '2022-03-06 21:20:21', '2022-03-06 21:20:21'),
(10, 'App\\Models\\User', 1, 'created', 'App\\Models\\Service', 3, '[]', '{\"title\":\"Internet totalmente encriptado\",\"short_description\":\"Internet totalmente encriptado\",\"description\":\"<p><br><\\/p>\",\"image\":\"internet.svg\",\"created_by\":1,\"updated_by\":1,\"id\":3}', 'http://intelc.test/admin/service', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', NULL, '2022-03-06 21:21:19', '2022-03-06 21:21:19'),
(11, 'App\\Models\\User', 1, 'created', 'App\\Models\\Service', 4, '[]', '{\"title\":\"Red VPN m\\u00faltiple\",\"short_description\":\"Red VPN m\\u00faltiple\",\"description\":\"<p><br><\\/p>\",\"image\":\"vpn.svg\",\"created_by\":1,\"updated_by\":1,\"id\":4}', 'http://intelc.test/admin/service', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', NULL, '2022-03-06 21:21:36', '2022-03-06 21:21:36'),
(12, 'App\\Models\\User', 1, 'created', 'App\\Models\\Service', 5, '[]', '{\"title\":\"Bloquear contenido malicioso\",\"short_description\":\"Bloquear contenido malicioso\",\"description\":\"<p>Desc\\t <\\/p>\",\"image\":\"virus.svg\",\"created_by\":1,\"updated_by\":1,\"id\":5}', 'http://intelc.test/admin/service', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', NULL, '2022-03-06 21:22:02', '2022-03-06 21:22:02'),
(13, 'App\\Models\\User', 1, 'created', 'App\\Models\\Service', 6, '[]', '{\"title\":\"Red VPN m\\u00faltiple\",\"short_description\":\"Red VPN m\\u00faltiple\",\"description\":\"<p><br><\\/p>\",\"image\":\"network.svg\",\"created_by\":1,\"updated_by\":1,\"id\":6}', 'http://intelc.test/admin/service', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', NULL, '2022-03-06 21:25:29', '2022-03-06 21:25:29'),
(14, 'App\\Models\\User', 1, 'created', 'App\\Models\\Service', 7, '[]', '{\"title\":\"Ancho de banda ilimitado\",\"short_description\":\"Ancho de banda ilimitado\",\"description\":\"<p><br><\\/p>\",\"image\":\"bandwidth.svg\",\"created_by\":1,\"updated_by\":1,\"id\":7}', 'http://intelc.test/admin/service', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', NULL, '2022-03-06 21:25:53', '2022-03-06 21:25:53'),
(15, 'App\\Models\\User', 1, 'created', 'App\\Models\\Service', 8, '[]', '{\"title\":\"Configuraci\\u00f3n f\\u00e1cil de usar\",\"short_description\":\"Configuraci\\u00f3n f\\u00e1cil de usar\",\"description\":\"<p><br><\\/p>\",\"image\":\"support-query.svg\",\"created_by\":1,\"updated_by\":1,\"id\":8}', 'http://intelc.test/admin/service', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', NULL, '2022-03-06 21:26:30', '2022-03-06 21:26:30'),
(16, 'App\\Models\\User', 1, 'created', 'App\\Models\\Service', 9, '[]', '{\"title\":\"Equipo de soporte experto\",\"short_description\":\"Equipo de soporte experto\",\"description\":\"<p><br><\\/p>\",\"image\":\"team.svg\",\"created_by\":1,\"updated_by\":1,\"id\":9}', 'http://intelc.test/admin/service', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', NULL, '2022-03-06 21:26:49', '2022-03-06 21:26:49'),
(17, 'App\\Models\\User', 1, 'created', 'App\\Models\\PlanesPrices', 1, '[]', '{\"title\":\"PLAN IDEAL 1\",\"price\":\"20.54\",\"short_description\":\"Plan mensual\",\"description\":\"<ul><li>Capacidad: 10M\\/10M<\\/li><li>Compresi\\u00f3n: 1;2<\\/li><li>Kbps: 10240 kbps<\\/li><\\/ul>\",\"image\":\"internet.svg\",\"created_by\":1,\"updated_by\":1,\"id\":1}', 'http://intelc.test/admin/planes-prices', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', NULL, '2022-03-06 22:04:10', '2022-03-06 22:04:10'),
(18, 'App\\Models\\User', 1, 'created', 'App\\Models\\PlanesPrices', 2, '[]', '{\"title\":\"PLAN IDEAL 2\",\"price\":\"25.00\",\"short_description\":\"Plan mensual\",\"description\":\"<p><br><\\/p>\",\"image\":\"bandwidth.svg\",\"created_by\":1,\"updated_by\":1,\"id\":2}', 'http://intelc.test/admin/planes-prices', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', NULL, '2022-03-06 22:04:58', '2022-03-06 22:04:58'),
(19, 'App\\Models\\User', 1, 'created', 'App\\Models\\PlanesPrices', 3, '[]', '{\"title\":\"PLAN IDEAL 3\",\"price\":\"31.25\",\"short_description\":\"Plan mensual\",\"description\":\"<p><br><\\/p>\",\"image\":\"business-query.svg\",\"created_by\":1,\"updated_by\":1,\"id\":3}', 'http://intelc.test/admin/planes-prices', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', NULL, '2022-03-06 22:05:22', '2022-03-06 22:05:22'),
(20, 'App\\Models\\User', 1, 'updated', 'App\\Models\\PlanesPrices', 2, '{\"description\":\"<p><br><\\/p>\"}', '{\"description\":\"<p><span style=\\\"color: rgb(246, 246, 244); background-color: rgb(40, 42, 54);\\\">PlanesPricesController<\\/span><\\/p><p><br><\\/p>\"}', 'http://intelc.test/admin/planes-prices/update/2', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', NULL, '2022-03-06 22:06:43', '2022-03-06 22:06:43'),
(21, 'App\\Models\\User', 1, 'updated', 'App\\Models\\PlanesPrices', 2, '{\"description\":\"<p><span style=\\\"color: rgb(246, 246, 244); background-color: rgb(40, 42, 54);\\\">PlanesPricesController<\\/span><\\/p><p><br><\\/p>\"}', '{\"description\":\"<ul><li>Capacidad: 20M\\/20M<\\/li><li>Compresi\\u00f3n: 1;2<\\/li><li>Kbps: 20480 kbps<\\/li><\\/ul>\"}', 'http://intelc.test/admin/planes-prices/update/2', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', NULL, '2022-03-06 22:07:21', '2022-03-06 22:07:21'),
(22, 'App\\Models\\User', 1, 'updated', 'App\\Models\\PlanesPrices', 1, '{\"title\":\"PLAN IDEAL 1\",\"price\":20.54,\"short_description\":\"Plan mensual\",\"description\":\"<ul><li>Capacidad: 10M\\/10M<\\/li><li>Compresi\\u00f3n: 1;2<\\/li><li>Kbps: 10240 kbps<\\/li><\\/ul>\"}', '{\"title\":\"PLAN IDEAL 11\",\"price\":\"220.54\",\"short_description\":\"Plan mensual A\",\"description\":\"<ul><li>Capacidad: 10M\\/10M<\\/li><li>Compresi\\u00f3n: 1;2<\\/li><li>Kbps: 10240 kbps<\\/li><\\/ul><p><br><\\/p>\"}', 'http://intelc.test/admin/planes-prices/update/1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', NULL, '2022-03-06 22:08:20', '2022-03-06 22:08:20'),
(23, 'App\\Models\\User', 1, 'updated', 'App\\Models\\PlanesPrices', 1, '{\"title\":\"PLAN IDEAL 11\",\"price\":220.54,\"short_description\":\"Plan mensual A\"}', '{\"title\":\"PLAN IDEAL 1\",\"price\":\"20.54\",\"short_description\":\"Plan mensual\"}', 'http://intelc.test/admin/planes-prices/update/1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', NULL, '2022-03-06 22:08:39', '2022-03-06 22:08:39'),
(24, 'App\\Models\\User', 1, 'updated', 'App\\Models\\PlanesPrices', 3, '{\"description\":\"<p><br><\\/p>\"}', '{\"description\":\"<ul><li>Capacidad: 30M\\/30M<\\/li><li>Compresi\\u00f3n: 1;2<\\/li><li>Kbps: 30720 kbps<\\/li><\\/ul><p><br><\\/p>\"}', 'http://intelc.test/admin/planes-prices/update/3', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', NULL, '2022-03-06 22:09:06', '2022-03-06 22:09:06'),
(25, 'App\\Models\\User', 1, 'updated', 'App\\Models\\PlanesPrices', 3, '{\"deleted_by\":null}', '{\"deleted_by\":1}', 'http://intelc.test/admin/planes-prices/3', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', NULL, '2022-03-06 22:09:19', '2022-03-06 22:09:19'),
(26, 'App\\Models\\User', 1, 'deleted', 'App\\Models\\PlanesPrices', 3, '{\"id\":3,\"title\":\"PLAN IDEAL 3\",\"price\":31.25,\"short_description\":\"Plan mensual\",\"icon\":null,\"image\":\"business-query.svg\",\"background\":null,\"description\":\"<ul><li>Capacidad: 30M\\/30M<\\/li><li>Compresi\\u00f3n: 1;2<\\/li><li>Kbps: 30720 kbps<\\/li><\\/ul><p><br><\\/p>\",\"video_url\":null,\"content\":null,\"created_by\":1,\"updated_by\":1,\"deleted_by\":1}', '[]', 'http://intelc.test/admin/planes-prices/3', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', NULL, '2022-03-06 22:09:19', '2022-03-06 22:09:19'),
(27, 'App\\Models\\User', 1, 'updated', 'App\\Models\\PlanesPrices', 2, '{\"deleted_by\":null}', '{\"deleted_by\":1}', 'http://intelc.test/admin/planes-prices/2', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', NULL, '2022-03-06 22:09:24', '2022-03-06 22:09:24'),
(28, 'App\\Models\\User', 1, 'deleted', 'App\\Models\\PlanesPrices', 2, '{\"id\":2,\"title\":\"PLAN IDEAL 2\",\"price\":25,\"short_description\":\"Plan mensual\",\"icon\":null,\"image\":\"bandwidth.svg\",\"background\":null,\"description\":\"<ul><li>Capacidad: 20M\\/20M<\\/li><li>Compresi\\u00f3n: 1;2<\\/li><li>Kbps: 20480 kbps<\\/li><\\/ul>\",\"video_url\":null,\"content\":null,\"created_by\":1,\"updated_by\":1,\"deleted_by\":1}', '[]', 'http://intelc.test/admin/planes-prices/2', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', NULL, '2022-03-06 22:09:24', '2022-03-06 22:09:24'),
(29, 'App\\Models\\User', 1, 'updated', 'App\\Models\\PlanesPrices', 1, '{\"deleted_by\":null}', '{\"deleted_by\":1}', 'http://intelc.test/admin/planes-prices/1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', NULL, '2022-03-06 22:09:29', '2022-03-06 22:09:29'),
(30, 'App\\Models\\User', 1, 'deleted', 'App\\Models\\PlanesPrices', 1, '{\"id\":1,\"title\":\"PLAN IDEAL 1\",\"price\":20.54,\"short_description\":\"Plan mensual\",\"icon\":null,\"image\":\"internet.svg\",\"background\":null,\"description\":\"<ul><li>Capacidad: 10M\\/10M<\\/li><li>Compresi\\u00f3n: 1;2<\\/li><li>Kbps: 10240 kbps<\\/li><\\/ul><p><br><\\/p>\",\"video_url\":null,\"content\":null,\"created_by\":1,\"updated_by\":1,\"deleted_by\":1}', '[]', 'http://intelc.test/admin/planes-prices/1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', NULL, '2022-03-06 22:09:29', '2022-03-06 22:09:29'),
(31, 'App\\Models\\User', 1, 'updated', 'App\\Models\\PlanesPrices', 1, '{\"deleted_by\":1}', '{\"deleted_by\":null}', 'http://intelc.test/admin/planes-prices/restore/1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', NULL, '2022-03-06 22:14:21', '2022-03-06 22:14:21'),
(32, 'App\\Models\\User', 1, 'updated', 'App\\Models\\PlanesPrices', 2, '{\"deleted_by\":1}', '{\"deleted_by\":null}', 'http://intelc.test/admin/planes-prices/restore/2', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', NULL, '2022-03-06 22:14:27', '2022-03-06 22:14:27'),
(33, 'App\\Models\\User', 1, 'updated', 'App\\Models\\PlanesPrices', 3, '{\"deleted_by\":1}', '{\"deleted_by\":null}', 'http://intelc.test/admin/planes-prices/restore/3', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', NULL, '2022-03-06 22:16:02', '2022-03-06 22:16:02'),
(34, 'App\\Models\\User', 1, 'created', 'App\\Models\\PlanesPrices', 4, '[]', '{\"title\":\"PLAN IDEAL HOME GPON\",\"price\":\"20.54\",\"short_description\":\"Plan mensual\",\"description\":\"<p><br><\\/p>\",\"image\":\"device.svg\",\"created_by\":1,\"updated_by\":1,\"id\":4}', 'http://intelc.test/admin/planes-prices', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', NULL, '2022-03-06 22:16:23', '2022-03-06 22:16:23'),
(35, 'App\\Models\\User', 1, 'updated', 'App\\Models\\PlanesPrices', 4, '{\"description\":\"<p><br><\\/p>\"}', '{\"description\":\"<ul><li>Capacidad: 30M\\/30M<\\/li><li>Compresi\\u00f3n: 1;2<\\/li><li>Kbps: 30720 kbps<\\/li><\\/ul><p><br><\\/p>\"}', 'http://intelc.test/admin/planes-prices/update/4', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', NULL, '2022-03-06 22:16:46', '2022-03-06 22:16:46'),
(36, 'App\\Models\\User', 1, 'created', 'App\\Models\\PlanesPrices', 5, '[]', '{\"title\":\"PLAN IDEAL SUPER HOME GPON\",\"price\":\"25\",\"short_description\":\"Plan mensual\",\"description\":\"<ul><li>Capacidad: 40M\\/40M<\\/li><li>Compresi\\u00f3n: 1;2<\\/li><li>Kbps: 40960 kbps<\\/li><\\/ul>\",\"image\":\"enterprise.svg\",\"created_by\":1,\"updated_by\":1,\"id\":5}', 'http://intelc.test/admin/planes-prices', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', NULL, '2022-03-06 22:17:29', '2022-03-06 22:17:29'),
(37, 'App\\Models\\User', 1, 'created', 'App\\Models\\PlanesPrices', 6, '[]', '{\"title\":\"PLAN IDEAL SUPREMO GPON\",\"price\":\"31.25\",\"short_description\":\"Plan mensual\",\"description\":\"<ul><li>Capacidad: 50M\\/50M<\\/li><li>Compresi\\u00f3n: 1;2<\\/li><li>Kbps: 51200 kbps<\\/li><\\/ul>\",\"image\":\"a-query.svg\",\"created_by\":1,\"updated_by\":1,\"id\":6}', 'http://intelc.test/admin/planes-prices', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', NULL, '2022-03-06 22:18:07', '2022-03-06 22:18:07'),
(38, 'App\\Models\\User', 1, 'created', 'App\\Models\\PlanesPrices', 7, '[]', '{\"title\":\"PLAN IDEAL PREMIUM GPON\",\"price\":\"40.18\",\"short_description\":\"Plan mensual\",\"description\":\"<ul><li>Capacidad: 60M\\/50M<\\/li><li>Compresi\\u00f3n: 1;2<\\/li><li>Kbps: 61440 kbps<\\/li><\\/ul><p><br><\\/p>\",\"image\":\"network.svg\",\"created_by\":1,\"updated_by\":1,\"id\":7}', 'http://intelc.test/admin/planes-prices', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', NULL, '2022-03-06 22:18:50', '2022-03-06 22:18:50'),
(39, 'App\\Models\\User', 1, 'created', 'App\\Models\\PlanesPrices', 8, '[]', '{\"title\":\"PLAN IDEAL INFINITY GPON\",\"price\":\"49.11\",\"short_description\":\"Plan mensual\",\"description\":\"<ul><li>Capacidad: 80M\\/80M<\\/li><li>Compresi\\u00f3n: 1;2<\\/li><li>Kbps: 81920 kbps<\\/li><\\/ul>\",\"image\":\"security.svg\",\"created_by\":1,\"updated_by\":1,\"id\":8}', 'http://intelc.test/admin/planes-prices', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', NULL, '2022-03-06 22:19:54', '2022-03-06 22:19:54'),
(40, 'App\\Models\\User', 1, 'updated', 'App\\Models\\PlanesPrices', 7, '{\"description\":\"<ul><li>Capacidad: 60M\\/50M<\\/li><li>Compresi\\u00f3n: 1;2<\\/li><li>Kbps: 61440 kbps<\\/li><\\/ul><p><br><\\/p>\"}', '{\"description\":\"<ul><li>Capacidad: 60M\\/60M<\\/li><li>Compresi\\u00f3n: 1;2<\\/li><li>Kbps: 61440 kbps<\\/li><\\/ul><p><br><\\/p>\"}', 'http://intelc.test/admin/planes-prices/update/7', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', NULL, '2022-03-06 22:20:05', '2022-03-06 22:20:05'),
(41, 'App\\Models\\User', 1, 'created', 'App\\Models\\PlanesPrices', 9, '[]', '{\"title\":\"PLAN IDEAL GAMER GPON\",\"price\":\"58.04\",\"short_description\":\"Plan mensual\",\"description\":\"<ul><li>Capacidad: 100M\\/100M<\\/li><li>Compresi\\u00f3n: 1;2<\\/li><li>Kbps: 102400 kbps<\\/li><\\/ul>\",\"image\":\"speed.svg\",\"created_by\":1,\"updated_by\":1,\"id\":9}', 'http://intelc.test/admin/planes-prices', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', NULL, '2022-03-06 22:20:40', '2022-03-06 22:20:40'),
(42, 'App\\Models\\User', 1, 'created', 'App\\Models\\PlanesPrices', 10, '[]', '{\"title\":\"PLAN IDEAL XTREME GPON\",\"price\":\"66.96\",\"short_description\":\"Plan mensual\",\"description\":\"<ul><li>Capacidad: 130M\\/130M<\\/li><li>Compresi\\u00f3n: 1;2<\\/li><li>Kbps: 133120 kbps<\\/li><\\/ul>\",\"image\":\"startup.svg\",\"created_by\":1,\"updated_by\":1,\"id\":10}', 'http://intelc.test/admin/planes-prices', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', NULL, '2022-03-06 22:21:31', '2022-03-06 22:21:31'),
(43, 'App\\Models\\User', 1, 'created', 'App\\Models\\PlanesPrices', 11, '[]', '{\"title\":\"PLAN IDEAL SUPER XTREME GPON\",\"price\":\"80.36\",\"short_description\":\"Plan mensual\",\"description\":\"<ul><li>Capacidad: 150M\\/150M<\\/li><li>Compresi\\u00f3n: 1;2<\\/li><li>Kbps: 153600 kbps<\\/li><\\/ul>\",\"image\":\"vpn.svg\",\"created_by\":1,\"updated_by\":1,\"id\":11}', 'http://intelc.test/admin/planes-prices', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', NULL, '2022-03-06 22:22:23', '2022-03-06 22:22:23'),
(44, 'App\\Models\\User', 1, 'created', 'App\\Models\\PlanesPrices', 12, '[]', '{\"title\":\"PLAN IDEAL MEGA XTREME GPON\",\"price\":\"107.14\",\"short_description\":\"Plan mensual\",\"description\":\"<ul><li>Capacidad: 200M\\/200M<\\/li><li>Compresi\\u00f3n: 1;2<\\/li><li>Kbps: 204800 kbps<\\/li><\\/ul>\",\"image\":\"affiliate-query.svg\",\"created_by\":1,\"updated_by\":1,\"id\":12}', 'http://intelc.test/admin/planes-prices', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', NULL, '2022-03-06 22:22:56', '2022-03-06 22:22:56'),
(45, 'App\\Models\\User', 1, 'created', 'App\\Models\\PlanesPrices', 13, '[]', '{\"title\":\"PLAN IDEAL ULTRA XTREME GPON\",\"price\":\"160.71\",\"short_description\":\"Plan mensual\",\"description\":\"<ul><li>Capacidad: 300M\\/300M<\\/li><li>Compresi\\u00f3n: 1;2<\\/li><li>Kbps: 307200 kbps<\\/li><\\/ul>\",\"image\":\"guarantee.svg\",\"created_by\":1,\"updated_by\":1,\"id\":13}', 'http://intelc.test/admin/planes-prices', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', NULL, '2022-03-06 22:23:48', '2022-03-06 22:23:48'),
(46, 'App\\Models\\User', 1, 'created', 'App\\Models\\PlanesPrices', 14, '[]', '{\"title\":\"PLAN IDEAL INFINITY GPON\",\"price\":\"187.5\",\"short_description\":\"Plan mensual\",\"description\":\"<ul><li>Capacidad: 5000M\\/500M<\\/li><li>Compresi\\u00f3n: 1;2<\\/li><li>Kbps: 512000 kbps<\\/li><\\/ul>\",\"image\":\"speed.svg\",\"created_by\":1,\"updated_by\":1,\"id\":14}', 'http://intelc.test/admin/planes-prices', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', NULL, '2022-03-06 22:24:59', '2022-03-06 22:24:59'),
(47, 'App\\Models\\User', 1, 'updated', 'App\\Models\\PlanesPrices', 13, '{\"description\":\"<ul><li>Capacidad: 300M\\/300M<\\/li><li>Compresi\\u00f3n: 1;2<\\/li><li>Kbps: 307200 kbps<\\/li><\\/ul>\"}', '{\"description\":\"<ul><li>Capacidad: 300M\\/300M<\\/li><li>Compresi\\u00f3n: 1;2<\\/li><li>Kbps: 307200 kbps<\\/li><\\/ul><p><br><\\/p>\"}', 'http://intelc.test/admin/planes-prices/update/13', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', NULL, '2022-03-06 22:25:06', '2022-03-06 22:25:06'),
(48, 'App\\Models\\User', 1, 'created', 'App\\Models\\PlanesPrices', 15, '[]', '{\"title\":\"PLAN IDEAL MEGA INFINITY GPON\",\"price\":\"223.21\",\"short_description\":\"Plan mensual\",\"description\":\"<ul><li>Capacidad: 800M\\/800M<\\/li><li>Compresi\\u00f3n: 1;2<\\/li><li>Kbps: 819200 kbps<\\/li><\\/ul>\",\"image\":\"bandwidth.svg\",\"created_by\":1,\"updated_by\":1,\"id\":15}', 'http://intelc.test/admin/planes-prices', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', NULL, '2022-03-06 22:25:51', '2022-03-06 22:25:51'),
(49, 'App\\Models\\User', 1, 'created', 'App\\Models\\PlanesPrices', 16, '[]', '{\"title\":\"PLAN IDEAL 1 CORPORATIVO GPON\",\"price\":\"62.5\",\"short_description\":\"Plan mensual\",\"description\":\"<ul><li>Capacidad: 50M\\/50M<\\/li><li>Compresi\\u00f3n: 1;2<\\/li><li>Kbps: 51200 kbps<\\/li><\\/ul>\",\"image\":\"a-query.svg\",\"created_by\":1,\"updated_by\":1,\"id\":16}', 'http://intelc.test/admin/planes-prices', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', NULL, '2022-03-06 22:26:31', '2022-03-06 22:26:31'),
(50, 'App\\Models\\User', 1, 'created', 'App\\Models\\PlanesPrices', 17, '[]', '{\"title\":\"PLAN IDEAL 2 CORPORATIVO GPON\",\"price\":\"75.89\",\"short_description\":\"Plan mensual\",\"description\":\"<ul><li>Capacidad: 80M\\/50M<\\/li><li>Compresi\\u00f3n: 1;2<\\/li><li>Kbps: 81920 kbps\\t<\\/li><\\/ul>\",\"image\":\"bandwidth.svg\",\"created_by\":1,\"updated_by\":1,\"id\":17}', 'http://intelc.test/admin/planes-prices', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', NULL, '2022-03-06 22:27:08', '2022-03-06 22:27:08'),
(51, 'App\\Models\\User', 1, 'updated', 'App\\Models\\PlanesPrices', 16, '{\"title\":\"PLAN IDEAL 1 CORPORATIVO GPON\",\"price\":62.5,\"image\":\"a-query.svg\",\"description\":\"<ul><li>Capacidad: 50M\\/50M<\\/li><li>Compresi\\u00f3n: 1;2<\\/li><li>Kbps: 51200 kbps<\\/li><\\/ul>\"}', '{\"title\":\"PLAN IDEAL ULTRA INFINITY GPON\",\"price\":\"258.93\",\"image\":\"enterprise.svg\",\"description\":\"<ul><li>Capacidad: 1 Gbps<\\/li><li>Compresi\\u00f3n: 1;2<\\/li><li>Kbps: 1024000 kbps<\\/li><\\/ul><p><br><\\/p>\"}', 'http://intelc.test/admin/planes-prices/update/16', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', NULL, '2022-03-06 22:28:13', '2022-03-06 22:28:13'),
(52, 'App\\Models\\User', 1, 'updated', 'App\\Models\\PlanesPrices', 17, '{\"title\":\"PLAN IDEAL 2 CORPORATIVO GPON\",\"price\":75.89,\"image\":\"bandwidth.svg\",\"description\":\"<ul><li>Capacidad: 80M\\/50M<\\/li><li>Compresi\\u00f3n: 1;2<\\/li><li>Kbps: 81920 kbps\\t<\\/li><\\/ul>\"}', '{\"title\":\"PLAN IDEAL 1 CORPORATIVO GPON\",\"price\":\"62.5\",\"image\":\"a-query.svg\",\"description\":\"<ul><li>Capacidad: 50M\\/50M<\\/li><li>Compresi\\u00f3n: 1;2<\\/li><li>Kbps: 51200 kbps<\\/li><\\/ul>\"}', 'http://intelc.test/admin/planes-prices/update/17', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', NULL, '2022-03-06 22:28:55', '2022-03-06 22:28:55'),
(53, 'App\\Models\\User', 1, 'created', 'App\\Models\\PlanesPrices', 18, '[]', '{\"title\":\"PLAN IDEAL 2 CORPORATIVO GPON\",\"price\":\"75.89\",\"short_description\":\"Plan mensual\",\"description\":\"<ul><li>Capacidad: 80M\\/50M<\\/li><li>Compresi\\u00f3n: 1;2<\\/li><li>Kbps: 81920 kbps<\\/li><\\/ul>\",\"image\":\"affiliate-query.svg\",\"created_by\":1,\"updated_by\":1,\"id\":18}', 'http://intelc.test/admin/planes-prices', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', NULL, '2022-03-06 22:29:33', '2022-03-06 22:29:33'),
(54, 'App\\Models\\User', 1, 'created', 'App\\Models\\PlanesPrices', 19, '[]', '{\"title\":\"PLAN IDEAL 3 CORPORATIVO GPON\",\"price\":\"98.21\",\"short_description\":\"Plan mensual\",\"description\":\"<ul><li>Capacidad: 100M\\/100M<\\/li><li>Compresi\\u00f3n: 1;2<\\/li><li>Kbps: 102400 kbps<\\/li><\\/ul>\",\"image\":\"enterprise.svg\",\"created_by\":1,\"updated_by\":1,\"id\":19}', 'http://intelc.test/admin/planes-prices', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', NULL, '2022-03-06 22:30:07', '2022-03-06 22:30:07'),
(55, 'App\\Models\\User', 1, 'created', 'App\\Models\\PlanesPrices', 20, '[]', '{\"title\":\"PLAN IDEAL 4 CORPORATIVO GPON\",\"price\":\"160.71\",\"short_description\":\"Plan mensual\",\"description\":\"<ul><li>Capacidad: 150M\\/150M<\\/li><li>Compresi\\u00f3n: 1;2<\\/li><li>Kbps: 153600 kbps<\\/li><\\/ul>\",\"image\":\"network.svg\",\"created_by\":1,\"updated_by\":1,\"id\":20}', 'http://intelc.test/admin/planes-prices', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', NULL, '2022-03-06 22:30:57', '2022-03-06 22:30:57'),
(56, 'App\\Models\\User', 1, 'created', 'App\\Models\\PlanesPrices', 21, '[]', '{\"title\":\"PLAN IDEAL 5 CORPORATIVO GPON\",\"price\":\"187.5\",\"short_description\":\"Plan mensual\",\"description\":\"<ul><li>Capacidad: 200M\\/200M<\\/li><li>Compresi\\u00f3n: 1;2<\\/li><li>Kbps: 204800 kbps<\\/li><\\/ul>\",\"image\":\"business-query.svg\",\"created_by\":1,\"updated_by\":1,\"id\":21}', 'http://intelc.test/admin/planes-prices', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', NULL, '2022-03-06 22:32:42', '2022-03-06 22:32:42'),
(57, 'App\\Models\\User', 1, 'created', 'App\\Models\\PlanesPrices', 22, '[]', '{\"title\":\"PLAN IDEAL 6 CORPORATIVO GPON\",\"price\":\"267.86\",\"short_description\":\"Plan mensual\",\"description\":\"<ul><li>Capacidad: 300M\\/300M<\\/li><li>Compresi\\u00f3n: 1;2<\\/li><li>Kbps: 307200 kbps<\\/li><\\/ul>\",\"image\":\"startup.svg\",\"created_by\":1,\"updated_by\":1,\"id\":22}', 'http://intelc.test/admin/planes-prices', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', NULL, '2022-03-06 22:33:20', '2022-03-06 22:33:20'),
(58, 'App\\Models\\User', 1, 'created', 'App\\Models\\Testimonials', 1, '[]', '{\"person\":\"Marsha C. Meyer\",\"place\":\"Melbourne, Australia\",\"stars\":\"4\",\"description\":\"<p><strong style=\\\"color: rgb(0, 0, 0);\\\">Lorem Ipsum<\\/strong><span style=\\\"color: rgb(0, 0, 0);\\\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.<\\/span><\\/p>\",\"created_by\":1,\"updated_by\":1,\"id\":1}', 'http://intelc.test/admin/testimonials', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', NULL, '2022-03-06 23:00:38', '2022-03-06 23:00:38'),
(59, 'App\\Models\\User', 1, 'created', 'App\\Models\\Testimonials', 2, '[]', '{\"person\":\"Bns H. Jabed\",\"place\":\"Noakhali, Bangladesh\",\"stars\":\"5\",\"description\":\"<p><strong style=\\\"color: rgb(0, 0, 0);\\\">Lorem Ipsum<\\/strong><span style=\\\"color: rgb(0, 0, 0);\\\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.<\\/span><\\/p>\",\"created_by\":1,\"updated_by\":1,\"id\":2}', 'http://intelc.test/admin/testimonials', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', NULL, '2022-03-06 23:00:55', '2022-03-06 23:00:55'),
(60, 'App\\Models\\User', 1, 'created', 'App\\Models\\Testimonials', 3, '[]', '{\"person\":\"Cathy S. Knight\",\"place\":\"Cathy S. Knight\",\"stars\":\"0\",\"description\":\"<p><strong style=\\\"color: rgb(0, 0, 0);\\\">Lorem Ipsum<\\/strong><span style=\\\"color: rgb(0, 0, 0);\\\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.<\\/span><\\/p>\",\"created_by\":1,\"updated_by\":1,\"id\":3}', 'http://intelc.test/admin/testimonials', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', NULL, '2022-03-06 23:01:22', '2022-03-06 23:01:22'),
(61, 'App\\Models\\User', 1, 'created', 'App\\Models\\Testimonials', 4, '[]', '{\"person\":\"Cathy S. Knight\",\"place\":\"California, United States\",\"stars\":\"5\",\"description\":\"<p><strong style=\\\"color: rgb(0, 0, 0);\\\">Lorem Ipsum<\\/strong><span style=\\\"color: rgb(0, 0, 0);\\\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.<\\/span><\\/p>\",\"created_by\":1,\"updated_by\":1,\"id\":4}', 'http://intelc.test/admin/testimonials', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', NULL, '2022-03-06 23:01:54', '2022-03-06 23:01:54'),
(62, 'App\\Models\\User', 1, 'created', 'App\\Models\\Team', 1, '[]', '{\"name\":\"Edward Reyes\",\"cargo\":\"Sistemas\",\"image\":{},\"created_by\":1,\"updated_by\":1,\"id\":1}', 'http://intelc.test/admin/our-team', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', NULL, '2022-03-07 00:30:39', '2022-03-07 00:30:39'),
(63, 'App\\Models\\User', 1, 'updated', 'App\\Models\\Team', 1, '{\"image\":{}}', '{\"image\":\"RLa2rMBqzv3Ngy79fLRO4rGJoEYTNLqQGwzWwgeL.png\"}', 'http://intelc.test/admin/our-team', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', NULL, '2022-03-07 00:30:39', '2022-03-07 00:30:39'),
(64, 'App\\Models\\User', 1, 'updated', 'App\\Models\\Team', 1, '{\"deleted_by\":null}', '{\"deleted_by\":1}', 'http://intelc.test/admin/our-team/1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', NULL, '2022-03-07 00:37:11', '2022-03-07 00:37:11'),
(65, 'App\\Models\\User', 1, 'deleted', 'App\\Models\\Team', 1, '{\"id\":1,\"name\":\"Edward Reyes\",\"image\":\"RLa2rMBqzv3Ngy79fLRO4rGJoEYTNLqQGwzWwgeL.png\",\"cargo\":\"Sistemas\",\"description\":null,\"place\":null,\"video_url\":null,\"content\":null,\"created_by\":1,\"updated_by\":1,\"deleted_by\":1}', '[]', 'http://intelc.test/admin/our-team/1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', NULL, '2022-03-07 00:37:11', '2022-03-07 00:37:11'),
(66, 'App\\Models\\User', 1, 'created', 'App\\Models\\Questions', 1, '[]', '{\"question\":\"\\u00bf?\",\"answer\":\"Respueta\",\"created_by\":1,\"updated_by\":1,\"id\":1}', 'http://intelc.test/admin/questions', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', NULL, '2022-03-07 01:03:40', '2022-03-07 01:03:40'),
(67, 'App\\Models\\User', 1, 'updated', 'App\\Models\\Questions', 1, '{\"image\":null}', '{\"image\":null}', 'http://intelc.test/admin/questions', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', NULL, '2022-03-07 01:03:40', '2022-03-07 01:03:40'),
(68, 'App\\Models\\User', 1, 'updated', 'App\\Models\\Questions', 1, '{\"answer\":\"Respueta\"}', '{\"answer\":\"Respuseta\"}', 'http://intelc.test/admin/questions/update/1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', NULL, '2022-03-07 01:03:45', '2022-03-07 01:03:45'),
(69, 'App\\Models\\User', 1, 'created', 'App\\Models\\Blog', 1, '[]', '{\"title\":\"Torrent Pirates Prefer To Pay For Video Streaming Services\",\"description\":\"<p><br><\\/p><p><span style=\\\"color: rgb(113, 114, 113);\\\">\\\"At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.\\\"<\\/span><\\/p><blockquote><span style=\\\"color: rgb(113, 114, 113); background-color: rgb(255, 255, 255);\\\">\\u201cWe are eos et accusamus et iusto odio dignissimos ducimus qui landitiispraesentiumti cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animied est laborum quidem rerum et dolorum fuga\\u201d<\\/span><\\/blockquote><p><span style=\\\"color: rgb(113, 114, 113);\\\">On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the rms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish In a free hour, when our power of choice.<\\/span><\\/p><p><br><\\/p>\",\"image\":{},\"created_by\":1,\"updated_by\":1,\"id\":1}', 'http://intelc.test/admin/blog', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', NULL, '2022-03-07 01:31:29', '2022-03-07 01:31:29'),
(70, 'App\\Models\\User', 1, 'updated', 'App\\Models\\Blog', 1, '{\"image\":{}}', '{\"image\":\"faXRJrHFRzG4EZ6BJJSA8JXh0gfTDg3HlpoJxRQR.jpg\"}', 'http://intelc.test/admin/blog', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', NULL, '2022-03-07 01:31:29', '2022-03-07 01:31:29'),
(71, 'App\\Models\\User', 1, 'updated', 'App\\Models\\Blog', 1, '{\"deleted_by\":null}', '{\"deleted_by\":1}', 'http://intelc.test/admin/blog/1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', NULL, '2022-03-07 01:32:04', '2022-03-07 01:32:04'),
(72, 'App\\Models\\User', 1, 'deleted', 'App\\Models\\Blog', 1, '{\"id\":1,\"title\":\"Torrent Pirates Prefer To Pay For Video Streaming Services\",\"description\":\"<p><br><\\/p><p><span style=\\\"color: rgb(113, 114, 113);\\\">\\\"At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.\\\"<\\/span><\\/p><blockquote><span style=\\\"color: rgb(113, 114, 113); background-color: rgb(255, 255, 255);\\\">\\u201cWe are eos et accusamus et iusto odio dignissimos ducimus qui landitiispraesentiumti cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animied est laborum quidem rerum et dolorum fuga\\u201d<\\/span><\\/blockquote><p><span style=\\\"color: rgb(113, 114, 113);\\\">On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the rms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish In a free hour, when our power of choice.<\\/span><\\/p><p><br><\\/p>\",\"image\":\"faXRJrHFRzG4EZ6BJJSA8JXh0gfTDg3HlpoJxRQR.jpg\",\"video_url\":null,\"content\":null,\"created_by\":1,\"updated_by\":1,\"deleted_by\":1}', '[]', 'http://intelc.test/admin/blog/1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', NULL, '2022-03-07 01:32:04', '2022-03-07 01:32:04'),
(73, 'App\\Models\\User', 1, 'updated', 'App\\Models\\Blog', 1, '{\"deleted_by\":1}', '{\"deleted_by\":null}', 'http://intelc.test/admin/blog/restore/1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', NULL, '2022-03-07 01:45:42', '2022-03-07 01:45:42'),
(74, 'App\\Models\\User', 1, 'updated', 'App\\Models\\Blog', 1, '{\"description\":\"<p><br><\\/p><p><span style=\\\"color: rgb(113, 114, 113);\\\">\\\"At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.\\\"<\\/span><\\/p><blockquote><span style=\\\"color: rgb(113, 114, 113); background-color: rgb(255, 255, 255);\\\">\\u201cWe are eos et accusamus et iusto odio dignissimos ducimus qui landitiispraesentiumti cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animied est laborum quidem rerum et dolorum fuga\\u201d<\\/span><\\/blockquote><p><span style=\\\"color: rgb(113, 114, 113);\\\">On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the rms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish In a free hour, when our power of choice.<\\/span><\\/p><p><br><\\/p>\"}', '{\"description\":\"<p><br><\\/p><p><span style=\\\"color: rgb(113, 114, 113);\\\">\\\"At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.\\\"<\\/span><\\/p><blockquote><span style=\\\"color: rgb(113, 114, 113); background-color: rgb(255, 255, 255);\\\">\\u201cWe are eos et accusamus et iusto odio dignissimos ducimus qui landitiispraesentiumti cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animied est laborum quidem rerum et dolorum fuga\\u201d<\\/span><\\/blockquote><p><span style=\\\"color: rgb(113, 114, 113);\\\">On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the rms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish In a free hour, when our power of choice.<\\/span><\\/p><p><a href=\\\"http:\\/\\/intelc.test\\/front\\/blog\\/1#\\\" target=\\\"_blank\\\" style=\\\"color: rgb(113, 114, 113);\\\">#Technology<\\/a><span style=\\\"color: rgb(113, 114, 113);\\\">&nbsp;<\\/span><a href=\\\"http:\\/\\/intelc.test\\/front\\/blog\\/1#\\\" target=\\\"_blank\\\" style=\\\"color: rgb(113, 114, 113);\\\">#Envato<\\/a><span style=\\\"color: rgb(113, 114, 113);\\\">&nbsp;<\\/span><a href=\\\"http:\\/\\/intelc.test\\/front\\/blog\\/1#\\\" target=\\\"_blank\\\" style=\\\"color: rgb(113, 114, 113);\\\">#Themeforest<\\/a><span style=\\\"color: rgb(113, 114, 113);\\\">&nbsp;<\\/span><a href=\\\"http:\\/\\/intelc.test\\/front\\/blog\\/1#\\\" target=\\\"_blank\\\" style=\\\"color: rgb(113, 114, 113);\\\">#Domain<\\/a><\\/p><p><br><\\/p><p><br><\\/p>\"}', 'http://intelc.test/admin/blog/update/1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', NULL, '2022-03-07 02:00:24', '2022-03-07 02:00:24');
INSERT INTO `audits` (`id`, `user_type`, `user_id`, `event`, `auditable_type`, `auditable_id`, `old_values`, `new_values`, `url`, `ip_address`, `user_agent`, `tags`, `created_at`, `updated_at`) VALUES
(75, 'App\\Models\\User', 1, 'updated', 'App\\Models\\Blog', 1, '{\"description\":\"<p><br><\\/p><p><span style=\\\"color: rgb(113, 114, 113);\\\">\\\"At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.\\\"<\\/span><\\/p><blockquote><span style=\\\"color: rgb(113, 114, 113); background-color: rgb(255, 255, 255);\\\">\\u201cWe are eos et accusamus et iusto odio dignissimos ducimus qui landitiispraesentiumti cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animied est laborum quidem rerum et dolorum fuga\\u201d<\\/span><\\/blockquote><p><span style=\\\"color: rgb(113, 114, 113);\\\">On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the rms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish In a free hour, when our power of choice.<\\/span><\\/p><p><a href=\\\"http:\\/\\/intelc.test\\/front\\/blog\\/1#\\\" target=\\\"_blank\\\" style=\\\"color: rgb(113, 114, 113);\\\">#Technology<\\/a><span style=\\\"color: rgb(113, 114, 113);\\\">&nbsp;<\\/span><a href=\\\"http:\\/\\/intelc.test\\/front\\/blog\\/1#\\\" target=\\\"_blank\\\" style=\\\"color: rgb(113, 114, 113);\\\">#Envato<\\/a><span style=\\\"color: rgb(113, 114, 113);\\\">&nbsp;<\\/span><a href=\\\"http:\\/\\/intelc.test\\/front\\/blog\\/1#\\\" target=\\\"_blank\\\" style=\\\"color: rgb(113, 114, 113);\\\">#Themeforest<\\/a><span style=\\\"color: rgb(113, 114, 113);\\\">&nbsp;<\\/span><a href=\\\"http:\\/\\/intelc.test\\/front\\/blog\\/1#\\\" target=\\\"_blank\\\" style=\\\"color: rgb(113, 114, 113);\\\">#Domain<\\/a><\\/p><p><br><\\/p><p><br><\\/p>\"}', '{\"description\":\"<p><br><\\/p><p><span style=\\\"color: rgb(113, 114, 113);\\\">\\\"At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.\\\"<\\/span><\\/p><blockquote><span style=\\\"color: rgb(113, 114, 113); background-color: rgb(255, 255, 255);\\\">\\u201cWe are eos et accusamus et iusto odio dignissimos ducimus qui landitiispraesentiumti cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animied est laborum quidem rerum et dolorum fuga\\u201d<\\/span><\\/blockquote><p><span style=\\\"color: rgb(113, 114, 113);\\\">On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the rms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish In a free hour, when our power of choice.<\\/span><\\/p><p><a href=\\\"http:\\/\\/intelc.test\\/front\\/blog\\/1#\\\" target=\\\"_blank\\\" style=\\\"color: rgb(113, 114, 113);\\\">#Technology #Envato #Themeforest #Domain<\\/a><\\/p><p><br><\\/p><p><br><\\/p>\"}', 'http://intelc.test/admin/blog/update/1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', NULL, '2022-03-07 02:07:21', '2022-03-07 02:07:21'),
(76, 'App\\Models\\User', 1, 'updated', 'App\\Models\\Questions', 1, '{\"answer\":\"Respuseta\"}', '{\"answer\":\"Respuesta\"}', 'http://intelc.test/admin/questions/update/1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', NULL, '2022-03-07 02:29:18', '2022-03-07 02:29:18'),
(77, 'App\\Models\\User', 1, 'updated', 'App\\Models\\Questions', 1, '{\"question\":\"\\u00bf?\"}', '{\"question\":\"\\u00bfC\\u00f3mo configuro StrongVPN?\"}', 'http://intelc.test/admin/questions/update/1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', NULL, '2022-03-07 02:29:46', '2022-03-07 02:29:46'),
(78, 'App\\Models\\User', 1, 'updated', 'App\\Models\\Team', 1, '{\"deleted_by\":1}', '{\"deleted_by\":null}', 'http://intelc.test/admin/our-team/restore/1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', NULL, '2022-03-07 02:59:02', '2022-03-07 02:59:02');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_url` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `title`, `description`, `image`, `video_url`, `content`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Torrent Pirates Prefer To Pay For Video Streaming Services', '<p><br></p><p><span style=\"color: rgb(113, 114, 113);\">\"At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.\"</span></p><blockquote><span style=\"color: rgb(113, 114, 113); background-color: rgb(255, 255, 255);\">“We are eos et accusamus et iusto odio dignissimos ducimus qui landitiispraesentiumti cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animied est laborum quidem rerum et dolorum fuga”</span></blockquote><p><span style=\"color: rgb(113, 114, 113);\">On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the rms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish In a free hour, when our power of choice.</span></p><p><a href=\"http://intelc.test/front/blog/1#\" target=\"_blank\" style=\"color: rgb(113, 114, 113);\">#Technology #Envato #Themeforest #Domain</a></p><p><br></p><p><br></p>', 'faXRJrHFRzG4EZ6BJJSA8JXh0gfTDg3HlpoJxRQR.jpg', NULL, NULL, 1, 1, NULL, '2022-03-07 01:31:29', '2022-03-07 02:07:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blog_files`
--

CREATE TABLE `blog_files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `blog_id` bigint(20) UNSIGNED NOT NULL,
  `file` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `icons`
--

CREATE TABLE `icons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `class` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `icons`
--

INSERT INTO `icons` (`id`, `class`, `name`, `created_at`, `updated_at`) VALUES
(1, 'a-query.svg', 'una consulta', '2022-03-06 21:05:23', '2022-03-06 21:05:23'),
(2, 'affiliate-query.svg', 'consulta de afiliados', '2022-03-06 21:05:23', '2022-03-06 21:05:23'),
(3, 'arrow-right.svg', 'flecha derecha', '2022-03-06 21:05:23', '2022-03-06 21:05:23'),
(4, 'bandwidth.svg', 'banda ancha', '2022-03-06 21:05:23', '2022-03-06 21:05:23'),
(5, 'business-query.svg', 'consulta de negocio', '2022-03-06 21:05:23', '2022-03-06 21:05:23'),
(6, 'device.svg', 'dispositivo', '2022-03-06 21:05:23', '2022-03-06 21:05:23'),
(7, 'enterprise.svg', 'empresa', '2022-03-06 21:05:23', '2022-03-06 21:05:23'),
(8, 'general-query.svg', 'consulta general', '2022-03-06 21:05:23', '2022-03-06 21:05:23'),
(9, 'guarantee.svg', 'garantía', '2022-03-06 21:05:23', '2022-03-06 21:05:23'),
(10, 'internet.svg', 'Internet', '2022-03-06 21:05:23', '2022-03-06 21:05:23'),
(11, 'money.svg', 'dinero', '2022-03-06 21:05:23', '2022-03-06 21:05:23'),
(12, 'network.svg', 'la red', '2022-03-06 21:05:23', '2022-03-06 21:05:23'),
(13, 'press-query.svg', 'prensa-consulta', '2022-03-06 21:05:23', '2022-03-06 21:05:23'),
(14, 'security.svg', 'seguridad', '2022-03-06 21:05:23', '2022-03-06 21:05:23'),
(15, 'settings.svg', 'ajustes', '2022-03-06 21:05:23', '2022-03-06 21:05:23'),
(16, 'speed.svg', 'velocidad', '2022-03-06 21:05:23', '2022-03-06 21:05:23'),
(17, 'startup.svg', 'puesta en marcha', '2022-03-06 21:05:23', '2022-03-06 21:05:23'),
(18, 'support-query.svg', 'consulta de soporte', '2022-03-06 21:05:23', '2022-03-06 21:05:23'),
(19, 'support.svg', 'apoyo', '2022-03-06 21:05:23', '2022-03-06 21:05:23'),
(20, 'team.svg', 'equipo', '2022-03-06 21:05:23', '2022-03-06 21:05:23'),
(21, 'trial.svg', 'prueba', '2022-03-06 21:05:23', '2022-03-06 21:05:23'),
(22, 'virus.svg', 'virus', '2022-03-06 21:05:23', '2022-03-06 21:05:23'),
(23, 'vpn.svg', 'VPN', '2022-03-06 21:05:23', '2022-03-06 21:05:23'),
(24, 'website.svg', 'sitio web', '2022-03-06 21:05:23', '2022-03-06 21:05:23');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_11_28_213601_create_roles_table', 1),
(5, '2020_11_28_213743_create_roles_user_table', 1),
(6, '2021_04_01_221024_create_permission_tables', 1),
(7, '2021_06_03_094750_create_service', 1),
(8, '2022_03_06_145832_create_audits_table', 1),
(9, '2022_03_06_150112_create_planes_prices', 1),
(10, '2022_03_06_150229_create_planes_prices_features', 1),
(11, '2022_03_06_150539_create_testimonals', 1),
(12, '2022_03_06_150548_create_places', 1),
(13, '2022_03_06_150726_create_team', 1),
(14, '2022_03_06_150854_create_social_networks', 1),
(15, '2022_03_06_151503_create_team_social_network', 1),
(16, '2022_03_06_151635_create_questions', 1),
(17, '2022_03_06_151716_create_blog', 1),
(18, '2022_03_06_151825_create_blog_files', 1),
(19, '2022_03_06_155855_create_icons', 2);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `places`
--

CREATE TABLE `places` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `planes_prices`
--

CREATE TABLE `planes_prices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(10,2) NOT NULL,
  `short_description` varchar(3000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `background` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_url` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type_id` bigint(20) DEFAULT null,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `planes_prices`
--

INSERT INTO `planes_prices` (`id`, `title`, `price`, `short_description`, `icon`, `image`, `background`, `description`, `video_url`, `content`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'PLAN IDEAL 1', 20.54, 'Plan mensual', NULL, 'internet.svg', NULL, '<ul><li>Capacidad: 10M/10M</li><li>Compresión: 1;2</li><li>Kbps: 10240 kbps</li></ul><p><br></p>', NULL, NULL, 1, 1, NULL, '2022-03-06 22:04:10', '2022-03-06 22:14:21', NULL),
(2, 'PLAN IDEAL 2', 25.00, 'Plan mensual', NULL, 'bandwidth.svg', NULL, '<ul><li>Capacidad: 20M/20M</li><li>Compresión: 1;2</li><li>Kbps: 20480 kbps</li></ul>', NULL, NULL, 1, 1, NULL, '2022-03-06 22:04:58', '2022-03-06 22:14:27', NULL),
(3, 'PLAN IDEAL 3', 31.25, 'Plan mensual', NULL, 'business-query.svg', NULL, '<ul><li>Capacidad: 30M/30M</li><li>Compresión: 1;2</li><li>Kbps: 30720 kbps</li></ul><p><br></p>', NULL, NULL, 1, 1, NULL, '2022-03-06 22:05:22', '2022-03-06 22:16:02', NULL),
(4, 'PLAN IDEAL HOME GPON', 20.54, 'Plan mensual', NULL, 'device.svg', NULL, '<ul><li>Capacidad: 30M/30M</li><li>Compresión: 1;2</li><li>Kbps: 30720 kbps</li></ul><p><br></p>', NULL, NULL, 1, 1, NULL, '2022-03-06 22:16:23', '2022-03-06 22:16:46', NULL),
(5, 'PLAN IDEAL SUPER HOME GPON', 25.00, 'Plan mensual', NULL, 'enterprise.svg', NULL, '<ul><li>Capacidad: 40M/40M</li><li>Compresión: 1;2</li><li>Kbps: 40960 kbps</li></ul>', NULL, NULL, 1, 1, NULL, '2022-03-06 22:17:29', '2022-03-06 22:17:29', NULL),
(6, 'PLAN IDEAL SUPREMO GPON', 31.25, 'Plan mensual', NULL, 'a-query.svg', NULL, '<ul><li>Capacidad: 50M/50M</li><li>Compresión: 1;2</li><li>Kbps: 51200 kbps</li></ul>', NULL, NULL, 1, 1, NULL, '2022-03-06 22:18:07', '2022-03-06 22:18:07', NULL),
(7, 'PLAN IDEAL PREMIUM GPON', 40.18, 'Plan mensual', NULL, 'network.svg', NULL, '<ul><li>Capacidad: 60M/60M</li><li>Compresión: 1;2</li><li>Kbps: 61440 kbps</li></ul><p><br></p>', NULL, NULL, 1, 1, NULL, '2022-03-06 22:18:50', '2022-03-06 22:20:04', NULL),
(8, 'PLAN IDEAL INFINITY GPON', 49.11, 'Plan mensual', NULL, 'security.svg', NULL, '<ul><li>Capacidad: 80M/80M</li><li>Compresión: 1;2</li><li>Kbps: 81920 kbps</li></ul>', NULL, NULL, 1, 1, NULL, '2022-03-06 22:19:54', '2022-03-06 22:19:54', NULL),
(9, 'PLAN IDEAL GAMER GPON', 58.04, 'Plan mensual', NULL, 'speed.svg', NULL, '<ul><li>Capacidad: 100M/100M</li><li>Compresión: 1;2</li><li>Kbps: 102400 kbps</li></ul>', NULL, NULL, 1, 1, NULL, '2022-03-06 22:20:40', '2022-03-06 22:20:40', NULL),
(10, 'PLAN IDEAL XTREME GPON', 66.96, 'Plan mensual', NULL, 'startup.svg', NULL, '<ul><li>Capacidad: 130M/130M</li><li>Compresión: 1;2</li><li>Kbps: 133120 kbps</li></ul>', NULL, NULL, 1, 1, NULL, '2022-03-06 22:21:31', '2022-03-06 22:21:31', NULL),
(11, 'PLAN IDEAL SUPER XTREME GPON', 80.36, 'Plan mensual', NULL, 'vpn.svg', NULL, '<ul><li>Capacidad: 150M/150M</li><li>Compresión: 1;2</li><li>Kbps: 153600 kbps</li></ul>', NULL, NULL, 1, 1, NULL, '2022-03-06 22:22:23', '2022-03-06 22:22:23', NULL),
(12, 'PLAN IDEAL MEGA XTREME GPON', 107.14, 'Plan mensual', NULL, 'affiliate-query.svg', NULL, '<ul><li>Capacidad: 200M/200M</li><li>Compresión: 1;2</li><li>Kbps: 204800 kbps</li></ul>', NULL, NULL, 1, 1, NULL, '2022-03-06 22:22:56', '2022-03-06 22:22:56', NULL),
(13, 'PLAN IDEAL ULTRA XTREME GPON', 160.71, 'Plan mensual', NULL, 'guarantee.svg', NULL, '<ul><li>Capacidad: 300M/300M</li><li>Compresión: 1;2</li><li>Kbps: 307200 kbps</li></ul><p><br></p>', NULL, NULL, 1, 1, NULL, '2022-03-06 22:23:48', '2022-03-06 22:25:06', NULL),
(14, 'PLAN IDEAL INFINITY GPON', 187.50, 'Plan mensual', NULL, 'speed.svg', NULL, '<ul><li>Capacidad: 5000M/500M</li><li>Compresión: 1;2</li><li>Kbps: 512000 kbps</li></ul>', NULL, NULL, 1, 1, NULL, '2022-03-06 22:24:59', '2022-03-06 22:24:59', NULL),
(15, 'PLAN IDEAL MEGA INFINITY GPON', 223.21, 'Plan mensual', NULL, 'bandwidth.svg', NULL, '<ul><li>Capacidad: 800M/800M</li><li>Compresión: 1;2</li><li>Kbps: 819200 kbps</li></ul>', NULL, NULL, 1, 1, NULL, '2022-03-06 22:25:51', '2022-03-06 22:25:51', NULL),
(16, 'PLAN IDEAL ULTRA INFINITY GPON', 258.93, 'Plan mensual', NULL, 'enterprise.svg', NULL, '<ul><li>Capacidad: 1 Gbps</li><li>Compresión: 1;2</li><li>Kbps: 1024000 kbps</li></ul><p><br></p>', NULL, NULL, 1, 1, NULL, '2022-03-06 22:26:31', '2022-03-06 22:28:13', NULL),
(17, 'PLAN IDEAL 1 CORPORATIVO GPON', 62.50, 'Plan mensual', NULL, 'a-query.svg', NULL, '<ul><li>Capacidad: 50M/50M</li><li>Compresión: 1;2</li><li>Kbps: 51200 kbps</li></ul>', NULL, NULL, 1, 1, NULL, '2022-03-06 22:27:08', '2022-03-06 22:28:55', NULL),
(18, 'PLAN IDEAL 2 CORPORATIVO GPON', 75.89, 'Plan mensual', NULL, 'affiliate-query.svg', NULL, '<ul><li>Capacidad: 80M/50M</li><li>Compresión: 1;2</li><li>Kbps: 81920 kbps</li></ul>', NULL, NULL, 1, 1, NULL, '2022-03-06 22:29:33', '2022-03-06 22:29:33', NULL),
(19, 'PLAN IDEAL 3 CORPORATIVO GPON', 98.21, 'Plan mensual', NULL, 'enterprise.svg', NULL, '<ul><li>Capacidad: 100M/100M</li><li>Compresión: 1;2</li><li>Kbps: 102400 kbps</li></ul>', NULL, NULL, 1, 1, NULL, '2022-03-06 22:30:07', '2022-03-06 22:30:07', NULL),
(20, 'PLAN IDEAL 4 CORPORATIVO GPON', 160.71, 'Plan mensual', NULL, 'network.svg', NULL, '<ul><li>Capacidad: 150M/150M</li><li>Compresión: 1;2</li><li>Kbps: 153600 kbps</li></ul>', NULL, NULL, 1, 1, NULL, '2022-03-06 22:30:57', '2022-03-06 22:30:57', NULL),
(21, 'PLAN IDEAL 5 CORPORATIVO GPON', 187.50, 'Plan mensual', NULL, 'business-query.svg', NULL, '<ul><li>Capacidad: 200M/200M</li><li>Compresión: 1;2</li><li>Kbps: 204800 kbps</li></ul>', NULL, NULL, 1, 1, NULL, '2022-03-06 22:32:42', '2022-03-06 22:32:42', NULL),
(22, 'PLAN IDEAL 6 CORPORATIVO GPON', 267.86, 'Plan mensual', NULL, 'startup.svg', NULL, '<ul><li>Capacidad: 300M/300M</li><li>Compresión: 1;2</li><li>Kbps: 307200 kbps</li></ul>', NULL, NULL, 1, 1, NULL, '2022-03-06 22:33:20', '2022-03-06 22:33:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `planes_prices_features`
--

CREATE TABLE `planes_prices_features` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `plan_id` bigint(20) UNSIGNED NOT NULL,
  `description` varchar(3000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_url` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question`, `answer`, `image`, `video_url`, `content`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '¿Cómo configuro StrongVPN?', 'Respuesta', NULL, NULL, NULL, 1, 1, NULL, '2022-03-07 01:03:40', '2022-03-07 02:29:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `guard_name`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Administrador', 'web', 'active', NULL, '2022-03-06 20:30:32', '2022-03-06 20:30:32');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`id`, `role_id`, `user_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, '2022-03-06 20:30:32', '2022-03-06 20:30:32');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` varchar(3000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `background` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_url` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id`, `title`, `short_description`, `icon`, `image`, `background`, `description`, `video_url`, `content`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Garantice la privacidad y la seguridad.', 'Garantice la privacidad y la seguridad 001,', NULL, 'security.svg', NULL, '<p><br></p>', NULL, NULL, 1, 1, NULL, '2022-03-06 20:49:27', '2022-03-06 21:20:21', NULL),
(2, 'Acceso y velocidad de transmisión', 'Acceso y velocidad de transmisión', NULL, 'speed.svg', NULL, '<p><br></p>', NULL, NULL, 1, 1, NULL, '2022-03-06 21:02:42', '2022-03-06 21:20:12', NULL),
(3, 'Internet totalmente encriptado', 'Internet totalmente encriptado', NULL, 'internet.svg', NULL, '<p><br></p>', NULL, NULL, 1, 1, NULL, '2022-03-06 21:21:19', '2022-03-06 21:21:19', NULL),
(4, 'Red VPN múltiple', 'Red VPN múltiple', NULL, 'vpn.svg', NULL, '<p><br></p>', NULL, NULL, 1, 1, NULL, '2022-03-06 21:21:36', '2022-03-06 21:21:36', NULL),
(5, 'Bloquear contenido malicioso', 'Bloquear contenido malicioso', NULL, 'virus.svg', NULL, '<p>Desc	 </p>', NULL, NULL, 1, 1, NULL, '2022-03-06 21:22:02', '2022-03-06 21:22:02', NULL),
(6, 'Red VPN múltiple', 'Red VPN múltiple', NULL, 'network.svg', NULL, '<p><br></p>', NULL, NULL, 1, 1, NULL, '2022-03-06 21:25:29', '2022-03-06 21:25:29', NULL),
(7, 'Ancho de banda ilimitado', 'Ancho de banda ilimitado', NULL, 'bandwidth.svg', NULL, '<p><br></p>', NULL, NULL, 1, 1, NULL, '2022-03-06 21:25:53', '2022-03-06 21:25:53', NULL),
(8, 'Configuración fácil de usar', 'Configuración fácil de usar', NULL, 'support-query.svg', NULL, '<p><br></p>', NULL, NULL, 1, 1, NULL, '2022-03-06 21:26:30', '2022-03-06 21:26:30', NULL),
(9, 'Equipo de soporte experto', 'Equipo de soporte experto', NULL, 'team.svg', NULL, '<p><br></p>', NULL, NULL, 1, 1, NULL, '2022-03-06 21:26:49', '2022-03-06 21:26:49', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `social_networks`
--

CREATE TABLE `social_networks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cargo` varchar(1500) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Integrante',
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `place` varchar(3000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_url` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`id`, `name`, `image`, `cargo`, `description`, `place`, `video_url`, `content`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Edward Reyes', 'RLa2rMBqzv3Ngy79fLRO4rGJoEYTNLqQGwzWwgeL.png', 'Sistemas', NULL, NULL, NULL, NULL, 1, 1, NULL, '2022-03-07 00:30:39', '2022-03-07 02:59:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `team_social_network`
--

CREATE TABLE `team_social_network` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `social_network_id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `link` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `testimonals`
--

CREATE TABLE `testimonals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `person` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stars` int(11) DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `place` varchar(3000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_url` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonals`
--

INSERT INTO `testimonals` (`id`, `person`, `stars`, `description`, `place`, `image`, `video_url`, `content`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Marsha C. Meyer', 4, '<p><strong style=\"color: rgb(0, 0, 0);\">Lorem Ipsum</strong><span style=\"color: rgb(0, 0, 0);\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</span></p>', 'Melbourne, Australia', NULL, NULL, NULL, 1, 1, NULL, '2022-03-06 23:00:38', '2022-03-06 23:00:38', NULL),
(2, 'Bns H. Jabed', 5, '<p><strong style=\"color: rgb(0, 0, 0);\">Lorem Ipsum</strong><span style=\"color: rgb(0, 0, 0);\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</span></p>', 'Noakhali, Bangladesh', NULL, NULL, NULL, 1, 1, NULL, '2022-03-06 23:00:55', '2022-03-06 23:00:55', NULL),
(3, 'Cathy S. Knight', 0, '<p><strong style=\"color: rgb(0, 0, 0);\">Lorem Ipsum</strong><span style=\"color: rgb(0, 0, 0);\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</span></p>', 'Cathy S. Knight', NULL, NULL, NULL, 1, 1, NULL, '2022-03-06 23:01:22', '2022-03-06 23:01:22', NULL),
(4, 'Cathy S. Knight', 5, '<p><strong style=\"color: rgb(0, 0, 0);\">Lorem Ipsum</strong><span style=\"color: rgb(0, 0, 0);\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</span></p>', 'California, United States', NULL, NULL, NULL, 1, 1, NULL, '2022-03-06 23:01:54', '2022-03-06 23:01:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `last_name`, `email`, `email_verified_at`, `password`, `status`, `deleted_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Edw', 'Rys', 'admin@admin.com', NULL, '$2y$10$a6BkCdtNDbPXi/3EbHCHsekfl1JK7RrbqTZrZnUlEAh.jxmWVMNf6', 'active', NULL, NULL, '2022-03-06 20:30:32', '2022-03-06 20:30:32');



CREATE TABLE `type_planes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `audits`
--
ALTER TABLE `audits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `audits_auditable_type_auditable_id_index` (`auditable_type`,`auditable_id`),
  ADD KEY `audits_user_id_user_type_index` (`user_id`,`user_type`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blog_created_by_foreign` (`created_by`),
  ADD KEY `blog_updated_by_foreign` (`updated_by`),
  ADD KEY `blog_deleted_by_foreign` (`deleted_by`);

--
-- Indexes for table `blog_files`
--
ALTER TABLE `blog_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blog_files_created_by_foreign` (`created_by`),
  ADD KEY `blog_files_updated_by_foreign` (`updated_by`),
  ADD KEY `blog_files_deleted_by_foreign` (`deleted_by`),
  ADD KEY `blog_files_blog_id_foreign` (`blog_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `icons`
--
ALTER TABLE `icons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `places`
--
ALTER TABLE `places`
  ADD PRIMARY KEY (`id`),
  ADD KEY `places_created_by_foreign` (`created_by`),
  ADD KEY `places_updated_by_foreign` (`updated_by`),
  ADD KEY `places_deleted_by_foreign` (`deleted_by`);

--
-- Indexes for table `planes_prices`
--
ALTER TABLE `planes_prices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `planes_prices_created_by_foreign` (`created_by`),
  ADD KEY `planes_prices_updated_by_foreign` (`updated_by`),
  ADD KEY `planes_prices_deleted_by_foreign` (`deleted_by`);

--
-- Indexes for table `planes_prices_features`
--
ALTER TABLE `planes_prices_features`
  ADD PRIMARY KEY (`id`),
  ADD KEY `planes_prices_features_created_by_foreign` (`created_by`),
  ADD KEY `planes_prices_features_updated_by_foreign` (`updated_by`),
  ADD KEY `planes_prices_features_deleted_by_foreign` (`deleted_by`),
  ADD KEY `planes_prices_features_plan_id_foreign` (`plan_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `questions_created_by_foreign` (`created_by`),
  ADD KEY `questions_updated_by_foreign` (`updated_by`),
  ADD KEY `questions_deleted_by_foreign` (`deleted_by`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`),
  ADD KEY `role_user_user_id_foreign` (`user_id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_created_by_foreign` (`created_by`),
  ADD KEY `service_updated_by_foreign` (`updated_by`),
  ADD KEY `service_deleted_by_foreign` (`deleted_by`);

--
-- Indexes for table `social_networks`
--
ALTER TABLE `social_networks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `social_networks_created_by_foreign` (`created_by`),
  ADD KEY `social_networks_updated_by_foreign` (`updated_by`),
  ADD KEY `social_networks_deleted_by_foreign` (`deleted_by`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`),
  ADD KEY `team_created_by_foreign` (`created_by`),
  ADD KEY `team_updated_by_foreign` (`updated_by`),
  ADD KEY `team_deleted_by_foreign` (`deleted_by`);

--
-- Indexes for table `team_social_network`
--
ALTER TABLE `team_social_network`
  ADD PRIMARY KEY (`id`),
  ADD KEY `team_social_network_social_network_id_foreign` (`social_network_id`),
  ADD KEY `team_social_network_team_id_foreign` (`team_id`);

--
-- Indexes for table `testimonals`
--
ALTER TABLE `testimonals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `testimonals_created_by_foreign` (`created_by`),
  ADD KEY `testimonals_updated_by_foreign` (`updated_by`),
  ADD KEY `testimonals_deleted_by_foreign` (`deleted_by`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);


ALTER TABLE `type_planes`
  ADD PRIMARY KEY (`id`);


--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `audits`
--
ALTER TABLE `audits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blog_files`
--
ALTER TABLE `blog_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `icons`
--
ALTER TABLE `icons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `places`
--
ALTER TABLE `places`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `planes_prices`
--
ALTER TABLE `planes_prices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `planes_prices_features`
--
ALTER TABLE `planes_prices_features`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `social_networks`
--
ALTER TABLE `social_networks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `team_social_network`
--
ALTER TABLE `team_social_network`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `testimonals`
--
ALTER TABLE `testimonals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blog`
--
ALTER TABLE `blog`
  ADD CONSTRAINT `blog_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `blog_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `blog_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `blog_files`
--
ALTER TABLE `blog_files`
  ADD CONSTRAINT `blog_files_blog_id_foreign` FOREIGN KEY (`blog_id`) REFERENCES `blog` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `blog_files_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `blog_files_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `blog_files_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `places`
--
ALTER TABLE `places`
  ADD CONSTRAINT `places_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `places_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `places_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `planes_prices`
--
ALTER TABLE `planes_prices`
  ADD CONSTRAINT `planes_prices_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `planes_prices_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `planes_prices_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `planes_prices_features`
--
ALTER TABLE `planes_prices_features`
  ADD CONSTRAINT `planes_prices_features_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `planes_prices_features_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `planes_prices_features_plan_id_foreign` FOREIGN KEY (`plan_id`) REFERENCES `planes_prices` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `planes_prices_features_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `questions_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `questions_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `service`
--
ALTER TABLE `service`
  ADD CONSTRAINT `service_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `service_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `service_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `social_networks`
--
ALTER TABLE `social_networks`
  ADD CONSTRAINT `social_networks_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `social_networks_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `social_networks_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `team`
--
ALTER TABLE `team`
  ADD CONSTRAINT `team_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `team_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `team_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `team_social_network`
--
ALTER TABLE `team_social_network`
  ADD CONSTRAINT `team_social_network_social_network_id_foreign` FOREIGN KEY (`social_network_id`) REFERENCES `planes_prices` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `team_social_network_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `team` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `testimonals`
--
ALTER TABLE `testimonals`
  ADD CONSTRAINT `testimonals_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `testimonals_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `testimonals_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
