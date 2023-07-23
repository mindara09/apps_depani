-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2023 at 02:43 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `joki_depani`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_07_18_132240_role_users', 1),
(6, '2023_07_18_141314_reservation', 1),
(7, '2023_07_18_151050_settings', 2),
(8, '2023_07_19_134140_review', 3),
(9, '2023_07_19_150119_product', 4),
(10, '2023_07_21_142128_transaction', 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_product` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `desc` varchar(255) NOT NULL,
  `status_stock` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name_product`, `price`, `desc`, `status_stock`, `created_at`, `updated_at`) VALUES
(3, 'Latte', 40000, 'Hangatnya kelembutan kopi dengan sentuhan susu.', 0, '2023-07-21 15:35:58', NULL),
(4, 'Cappuccino', 35000, 'Kenikmatan cita rasa lembut dalam secangkir', 1, NULL, NULL),
(5, 'Espresso', 25000, 'Kelezatan kopi pekat yang menggoda.', 1, NULL, NULL),
(6, 'Americano', 30000, 'Kopi segar dengan kesederhanaan tanpa pemanis.', 1, NULL, NULL),
(7, 'Mocha', 40000, 'Simfoni manis dan pahit dalam setiap tegukan.', 1, NULL, NULL),
(8, 'Flat White', 35000, 'Ketenangan dalam secangkir kopi yang menggugah.', 1, NULL, NULL),
(9, 'Teh Earl Grey', 18000, 'Teh hitam beraroma jeruk bergaya Inggris dengan sentuhan unik dari bunga', 1, NULL, NULL),
(10, 'Chai Latte', 24000, 'Teh hitam kaya rempah dengan susu hangat yang membuat perpaduan rasa yang istimewa.', 1, NULL, NULL),
(11, 'Smoothie Berry Blast', 30000, 'Campuran segar dari berbagai buah berry, memberikan sensasi meledakkan rasa di mulut.', 1, NULL, NULL),
(12, 'Sandwich Chicken Avocado', 35000, 'Roti gandum dengan potongan daging ayam dan potongan alpukat yang segar, dilengkapi saus lezat.', 1, NULL, NULL),
(13, 'Pasta Carbonara', 40000, 'Pasta dengan saus krim keju lezat dan potongan daging bacon yang gurih.', 1, NULL, NULL),
(14, 'Chocolate Lava Cake', 28000, 'Kue cokelat lembut dengan inti cokelat meleleh yang nikmat, disajikan dengan es krim vanila', 1, NULL, NULL),
(15, 'Matcha Latte', 28000, 'Minuman khas Jepang yang terbuat dari bubuk teh matcha berkualitas tinggi, dicampur dengan susu untuk rasa yang lembut dan manis.', 1, NULL, NULL),
(16, 'Iced Americano', 18000, 'Espresso disajikan dengan es dan air dingin, memberikan sensasi kopi yang menyegarkan di cuaca panas.', 1, NULL, NULL),
(17, 'Vanilla Frappuccino', 32000, 'Minuman dingin yang menyegarkan dengan campuran espresso, susu, dan sirup vanila, dihancurkan dengan es.', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `time_attendance` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `desc` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`id`, `user_id`, `time_attendance`, `status`, `desc`, `created_at`, `updated_at`) VALUES
(1, 1, '10-10-2023', 2, 'Ulang tahun anak', '2023-07-19 14:35:46', NULL),
(2, 26, '08.00', 0, 'Ulang tahun anaksssssss', '2023-07-20 08:03:42', NULL),
(3, 27, 'jam 9', 0, 'ulassad dasd', '2023-07-20 08:32:56', NULL),
(4, 29, '10 siang', 2, 'asdsadsa', '2023-07-20 08:36:03', NULL),
(5, 30, '12', 1, 'asdsadsad', '2023-07-20 08:36:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `start` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `user_id`, `start`, `comment`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 'Bagus ', '2023-07-20 13:46:53', NULL),
(2, 1, 2, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolorem laborum perspiciatis ducimus eos fugit, cumque quo ipsam quaerat, eum, aperiam et? Nihil modi accusamus nemo voluptatem exercitationem placeat, unde delectus.', '2023-07-20 13:47:06', NULL),
(3, 4, 5, 'Mantap Jos', '2023-07-28 15:20:27', NULL),
(4, 10, 2, 'Kuren', NULL, NULL),
(5, 9, 1, 'Kureng jos', '2023-07-29 15:21:01', NULL),
(6, 2, 5, 'Mantap pisan', NULL, NULL),
(7, 8, 1, 'Kureng', NULL, NULL),
(8, 7, 2, 'Lumayan lah ya', NULL, NULL),
(9, 1, 2, 'asdsadasdsad', NULL, NULL),
(10, 47, 4, 'Pelayanan lumayan dan masih ada yang kurang', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_users`
--

CREATE TABLE `role_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_role` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_users`
--

INSERT INTO `role_users` (`id`, `name_role`, `created_at`, `updated_at`) VALUES
(1, 'Admin', NULL, NULL),
(2, 'Customer', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `link_maps` varchar(255) NOT NULL,
  `no_telp` varchar(255) NOT NULL,
  `link_instagram` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `link_maps`, `no_telp`, `link_instagram`, `created_at`, `updated_at`) VALUES
(1, 'https://goo.gl/maps/CbHgsJbq46NvUSFw1', '0888888824', 'https://goo.gl/maps/CbHgsJbq46NvUSFw4', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `product` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`product`)),
  `total_price` int(11) NOT NULL,
  `pay` int(11) DEFAULT NULL,
  `change` int(11) DEFAULT NULL,
  `payment` varchar(255) DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `status_payment` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `user_id`, `product`, `total_price`, `pay`, `change`, `payment`, `discount`, `status_payment`, `created_at`, `updated_at`) VALUES
(1, 32, '{\"11\":{\"name_product\":\"Smoothie Berry Blast\",\"price\":30000,\"desc\":\"Campuran segar dari berbagai buah berry, memberikan sensasi meledakkan rasa di mulut.\",\"quantity\":3}}', 90000, 100000, 10000, '2', NULL, 1, '2023-07-21 07:56:29', '2023-07-22 22:49:21'),
(2, 34, '{\"11\":{\"name_product\":\"Smoothie Berry Blast\",\"price\":30000,\"desc\":\"Campuran segar dari berbagai buah berry, memberikan sensasi meledakkan rasa di mulut.\",\"quantity\":3}}', 90000, 100000, 10000, '1', NULL, 1, '2023-07-21 07:58:02', '2023-07-22 19:45:29'),
(3, 35, '{\"3\":{\"name_product\":\"Latte\",\"price\":40000,\"desc\":\"Hangatnya kelembutan kopi dengan sentuhan susu.\",\"quantity\":2},\"4\":{\"name_product\":\"Cappuccino\",\"price\":35000,\"desc\":\"Kenikmatan cita rasa lembut dalam secangkir\",\"quantity\":1},\"5\":{\"name_product\":\"Espresso\",\"price\":25000,\"desc\":\"Kelezatan kopi pekat yang menggoda.\",\"quantity\":1},\"6\":{\"name_product\":\"Americano\",\"price\":30000,\"desc\":\"Kopi segar dengan kesederhanaan tanpa pemanis.\",\"quantity\":2},\"7\":{\"name_product\":\"Mocha\",\"price\":40000,\"desc\":\"Simfoni manis dan pahit dalam setiap tegukan.\",\"quantity\":1},\"8\":{\"name_product\":\"Flat White\",\"price\":35000,\"desc\":\"Ketenangan dalam secangkir kopi yang menggugah.\",\"quantity\":1},\"9\":{\"name_product\":\"Teh Earl Grey\",\"price\":18000,\"desc\":\"Teh hitam beraroma jeruk bergaya Inggris dengan sentuhan unik dari bunga\",\"quantity\":1},\"10\":{\"name_product\":\"Chai Latte\",\"price\":24000,\"desc\":\"Teh hitam kaya rempah dengan susu hangat yang membuat perpaduan rasa yang istimewa.\",\"quantity\":1}}', 317000, NULL, NULL, NULL, NULL, 0, '2023-07-22 19:45:29', NULL),
(4, 36, '{\"3\":{\"name_product\":\"Latte\",\"price\":40000,\"desc\":\"Hangatnya kelembutan kopi dengan sentuhan susu.\",\"quantity\":2},\"4\":{\"name_product\":\"Cappuccino\",\"price\":35000,\"desc\":\"Kenikmatan cita rasa lembut dalam secangkir\",\"quantity\":1},\"5\":{\"name_product\":\"Espresso\",\"price\":25000,\"desc\":\"Kelezatan kopi pekat yang menggoda.\",\"quantity\":1},\"6\":{\"name_product\":\"Americano\",\"price\":30000,\"desc\":\"Kopi segar dengan kesederhanaan tanpa pemanis.\",\"quantity\":2},\"7\":{\"name_product\":\"Mocha\",\"price\":40000,\"desc\":\"Simfoni manis dan pahit dalam setiap tegukan.\",\"quantity\":1},\"8\":{\"name_product\":\"Flat White\",\"price\":35000,\"desc\":\"Ketenangan dalam secangkir kopi yang menggugah.\",\"quantity\":1},\"9\":{\"name_product\":\"Teh Earl Grey\",\"price\":18000,\"desc\":\"Teh hitam beraroma jeruk bergaya Inggris dengan sentuhan unik dari bunga\",\"quantity\":1},\"10\":{\"name_product\":\"Chai Latte\",\"price\":24000,\"desc\":\"Teh hitam kaya rempah dengan susu hangat yang membuat perpaduan rasa yang istimewa.\",\"quantity\":1}}', 317000, NULL, NULL, NULL, NULL, 0, '2023-07-22 19:49:03', NULL),
(5, 38, '{\"3\":{\"name_product\":\"Latte\",\"price\":40000,\"desc\":\"Hangatnya kelembutan kopi dengan sentuhan susu.\",\"quantity\":2},\"4\":{\"name_product\":\"Cappuccino\",\"price\":35000,\"desc\":\"Kenikmatan cita rasa lembut dalam secangkir\",\"quantity\":1},\"5\":{\"name_product\":\"Espresso\",\"price\":25000,\"desc\":\"Kelezatan kopi pekat yang menggoda.\",\"quantity\":1},\"6\":{\"name_product\":\"Americano\",\"price\":30000,\"desc\":\"Kopi segar dengan kesederhanaan tanpa pemanis.\",\"quantity\":2},\"7\":{\"name_product\":\"Mocha\",\"price\":40000,\"desc\":\"Simfoni manis dan pahit dalam setiap tegukan.\",\"quantity\":1},\"8\":{\"name_product\":\"Flat White\",\"price\":35000,\"desc\":\"Ketenangan dalam secangkir kopi yang menggugah.\",\"quantity\":1},\"9\":{\"name_product\":\"Teh Earl Grey\",\"price\":18000,\"desc\":\"Teh hitam beraroma jeruk bergaya Inggris dengan sentuhan unik dari bunga\",\"quantity\":1},\"10\":{\"name_product\":\"Chai Latte\",\"price\":24000,\"desc\":\"Teh hitam kaya rempah dengan susu hangat yang membuat perpaduan rasa yang istimewa.\",\"quantity\":1}}', 317000, NULL, NULL, NULL, NULL, 0, '2023-07-22 19:49:21', NULL),
(6, 39, '{\"11\":{\"name_product\":\"Smoothie Berry Blast\",\"price\":30000,\"desc\":\"Campuran segar dari berbagai buah berry, memberikan sensasi meledakkan rasa di mulut.\",\"quantity\":2}}', 60000, 100000, 40000, '1', NULL, 1, '2023-07-22 22:51:11', '2023-07-22 22:51:55'),
(7, 40, '{\"13\":{\"name_product\":\"Pasta Carbonara\",\"price\":40000,\"desc\":\"Pasta dengan saus krim keju lezat dan potongan daging bacon yang gurih.\",\"quantity\":2}}', 80000, NULL, NULL, NULL, NULL, 0, '2023-07-22 23:05:58', NULL),
(8, 43, '{\"11\":{\"name_product\":\"Smoothie Berry Blast\",\"price\":30000,\"desc\":\"Campuran segar dari berbagai buah berry, memberikan sensasi meledakkan rasa di mulut.\",\"quantity\":1}}', 30000, NULL, NULL, NULL, NULL, 0, '2023-07-22 23:07:42', NULL),
(9, 44, '{\"11\":{\"name_product\":\"Smoothie Berry Blast\",\"price\":30000,\"desc\":\"Campuran segar dari berbagai buah berry, memberikan sensasi meledakkan rasa di mulut.\",\"quantity\":1},\"12\":{\"name_product\":\"Sandwich Chicken Avocado\",\"price\":35000,\"desc\":\"Roti gandum dengan potongan daging ayam dan potongan alpukat yang segar, dilengkapi saus lezat.\",\"quantity\":1}}', 65000, NULL, NULL, NULL, NULL, 0, '2023-07-22 23:09:33', NULL),
(10, 45, '{\"3\":{\"name_product\":\"Latte\",\"price\":40000,\"desc\":\"Hangatnya kelembutan kopi dengan sentuhan susu.\",\"quantity\":3},\"11\":{\"name_product\":\"Smoothie Berry Blast\",\"price\":30000,\"desc\":\"Campuran segar dari berbagai buah berry, memberikan sensasi meledakkan rasa di mulut.\",\"quantity\":1},\"12\":{\"name_product\":\"Sandwich Chicken Avocado\",\"price\":35000,\"desc\":\"Roti gandum dengan potongan daging ayam dan potongan alpukat yang segar, dilengkapi saus lezat.\",\"quantity\":1}}', 185000, 200000, 15000, '2', NULL, 1, '2023-07-22 23:27:34', '2023-07-22 23:28:11'),
(11, 46, '{\"5\":{\"name_product\":\"Espresso\",\"price\":25000,\"desc\":\"Kelezatan kopi pekat yang menggoda.\",\"quantity\":2},\"7\":{\"name_product\":\"Mocha\",\"price\":40000,\"desc\":\"Simfoni manis dan pahit dalam setiap tegukan.\",\"quantity\":2}}', 130000, 150000, 20000, '2', NULL, 1, '2023-07-22 23:30:36', '2023-07-22 23:31:27'),
(12, 47, '{\"11\":{\"name_product\":\"Smoothie Berry Blast\",\"price\":30000,\"desc\":\"Campuran segar dari berbagai buah berry, memberikan sensasi meledakkan rasa di mulut.\",\"quantity\":1},\"17\":{\"name_product\":\"Vanilla Frappuccino\",\"price\":32000,\"desc\":\"Minuman dingin yang menyegarkan dengan campuran espresso, susu, dan sirup vanila, dihancurkan dengan es.\",\"quantity\":1}}', 62000, NULL, NULL, NULL, NULL, 0, '2023-07-23 05:16:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_user` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `no_telp` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_user`, `name`, `email`, `no_telp`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'Administrator', 'admin@gmail.com', '08212232922', '$2y$10$Q5xY6SMWDH7OYU/zrPCDBulYOYYZxvOtUQMhkU.LSjB1Ajmq1nmAK', NULL, '2023-07-18 07:17:18', NULL),
(2, 2, 'asdsad', 'sadsa@gmail.com', '213213', '$2y$10$QTwuiAfL3hyA5.cJT1OL6uNx4lP/lrcmcqdRu0qSqdzWGa7R2lclG', NULL, NULL, NULL),
(4, 2, 'asdsad', 'sadssa@gmail.com', '213213', '$2y$10$jCJ5bFB/IaN93uBAn90hn.TMvoQxvFqyNwXYTCx.KlxlAgLmJZ43W', NULL, NULL, NULL),
(5, 2, 'asdsad', 'sadssass@gmail.com', '6289650386343', '$2y$10$8KY6xopYueZEOtSkvb93Iux9XrEG3AYvfCkiHGGO55JHX4vCT0/ba', NULL, NULL, NULL),
(7, 2, 'asdsad', 'sadssassss@gmail.com', '213213', '$2y$10$ZsdX/q56pOKhZwEx0n5ZJed7aOzRmNQZPEpOwbb5I5LXdNEQBCjzO', NULL, NULL, NULL),
(9, 2, 'asdsad', 'sadssassssss@gmail.com', '213213', '$2y$10$/vbKAv0t66fxKBJ8RA./9O.QkHiMcPaGnPJQFfD9/Iz9sp.5k5kNC', NULL, NULL, NULL),
(11, 2, 'asdsad', 'sadssassssssa@gmail.com', '213213', '$2y$10$.eIC.euwQGdl7e2noY5DOOyXAMgR/L23udaJBriby6LlEFCYNtAF6', NULL, NULL, NULL),
(12, 2, 'asdsad', 'sadssassssassa@gmail.com', '213213', '$2y$10$OI.89AxEjsho/DAUOfnRe.lO9h7WYa84hbWTCLxAjJ1CzDAv28mQO', NULL, NULL, NULL),
(14, 2, 'asdsad', 'sadssaszsssassa@gmail.com', '213213', '$2y$10$ehksJcFYZP8mtEJrd4hB6O/a2NElzS9b8EJCrD4qDsVUiFNOfqYHi', NULL, NULL, NULL),
(16, 2, 'asdsad', 'sadssasxzsssassa@gmail.com', '213213', '$2y$10$eCfDEyYIi6NblfLZ01QZd.Ek.BXVCRcDk0Yf/fWVyQlhSC//mygYy', NULL, NULL, NULL),
(18, 2, 'asdsad', 'sadssasxzsszsassa@gmail.com', '213213', '$2y$10$gWErYkTMtKVhH8SJCIozr.nlmwDBCbRp51pfZ7CmwKyHfR6OZkJZK', NULL, NULL, NULL),
(20, 2, 'asdsad', 'sadssasxzsszzsassa@gmail.com', '213213', '$2y$10$z0qsCgeqzjbgl4EhFN0A/OyQEPJAfOX9rQl.0J5xm7/S3394ijdgm', NULL, NULL, NULL),
(22, 2, 'asdsad', 'sa1dssasxzsszzsassa@gmail.com', '213213', '$2y$10$xWnk0uc2ND.xhyBWZkKb5O0dRezAQvLx0Q/GiGbvu5pviZE3a5tKm', NULL, NULL, NULL),
(24, 2, 'asdsad', 'sa1dssa1sxzsszzsassa@gmail.com', '213213', '$2y$10$CcLlBBcOL2EglIAfmQplceXCZro3lOp99DWu.0mZhgEOwC.bIGcMy', NULL, NULL, NULL),
(26, 2, 'asdsad', 'sa1x1dssa1sxzsszzsassa@gmail.com', '213213', '$2y$10$k6L82j36kWC3PBgoJcMccuvpyL5vw8Mb7iXLfRYPr3pED2mhP2hUC', NULL, NULL, NULL),
(27, 2, 'Test', 'test@gmail.com', '088888', '$2y$10$j.gHH7l9PbiGxHZSfzQkluhBckih8TCsatIuynPi/0FrKn55WOBhS', NULL, NULL, NULL),
(29, 2, 'aszx', 'saa11dsa@gmail.com', '123213213', '$2y$10$TD0KaLB5biu/BmFThW3JEef.vnFcdhDziwyI8IQNlBjpURh9rvuDm', NULL, NULL, NULL),
(30, 2, '222', 'ss@gmail.com', '6289650386343', '$2y$10$S5dvVeMjInN6TAXWYX.4UemIZv2gPNDFt5zQ4RQ4oSONv.h1Ki5Oa', NULL, NULL, NULL),
(31, 2, 'Test Checkout1', 'hcek@gmail.com', '08888888888', '$2y$10$kKz923pjFP3EifI2AYbcaO5DOVgHdM/7viFqyNBKp2ZGzh4EhMT6q', NULL, '2023-07-21 07:55:15', NULL),
(32, 2, 'Test Checkout111', 'hcesk@gmail.com', '08888888888', '$2y$10$Z7vsF8zqy7/BgzBx/SKCfu5xaI48jwindBK3W9pySgsf.xhJVe71.', NULL, '2023-07-21 07:56:29', NULL),
(34, 2, 'Test Checkout111', 'hces1k@gmail.com', '08888888888', '$2y$10$eh0mkGYyreDt6yQRwSJ81.wzeRov.W0f5IwEkLoRat6aEYQ6u3Nla', NULL, '2023-07-21 07:58:02', NULL),
(35, 2, 'Customer', 'customer@gmail.com', '0822112323212', '$2y$10$oex599hAKQ34NFVt5GcKfOq2i6Sgb0A0C/9uB4EprMmyokt7oxpaG', NULL, '2023-07-22 19:45:29', NULL),
(36, 2, 'Customer1', 'custome1r@gmail.com', '0822112323212', '$2y$10$DUjI5yHdCbCdDgI6T4fa/.Eo8j32EveJJs1hIjP1GppMKVVWrq/Vu', NULL, '2023-07-22 19:49:03', NULL),
(38, 2, 'Customer1', 'custome2@gmail.com', '0822112323212', '$2y$10$hSHCLVgqRKfHR7OgefXq3OdAP5Cb.l68ziwZe8ERl1uCDsTJ3Db2S', NULL, '2023-07-22 19:49:21', NULL),
(39, 2, 'azis', 'azis@gmail.com', '085862120205', '$2y$10$J3sWu1GzoZSsaXYMhIkvX.Y47RplCG/LfCZ8dJFt0YVAa.VWc6TJ.', NULL, '2023-07-22 22:51:11', NULL),
(40, 2, 'denis', 'denis@gmail.com', '085862120205', '$2y$10$YLaGjAMJ/UY4IlY1/3yWneZ456vvE9Q29KkmXE8wK3ldhy004HU4K', NULL, '2023-07-22 23:05:58', NULL),
(42, 2, 'denis', 'denis1@gmail.com', '085862120205', '$2y$10$Oeoq58MhmrGVLPwEXw/ZA.gSIBwYGZ4f1115ZpYNafdw3YW/7Yyu2', NULL, '2023-07-22 23:07:16', NULL),
(43, 2, 'wiwin', 'winaryo@gmail.com', '085862120205', '$2y$10$dMgU21Zh1OX481eJs8nWmu997RxXRKX8UPFBNMPUoTBRKpPMFxQRS', NULL, '2023-07-22 23:07:42', NULL),
(44, 2, 'azril', 'azril@gmail.com', '085862120205', '$2y$10$eDlcKVHeXi5Fun0cPp5SmuE32LbWKxHFkBQe9EwRKGWW.s.cjUPyO', NULL, '2023-07-22 23:09:33', NULL),
(45, 2, 'salma', 'salma@gmail.com', '085862120205', '$2y$10$8Vkv2fG/XrpjohwALvYjpuvOrF2qlUHqSFIuA4CKPo97eCJY52W3S', NULL, '2023-07-22 23:27:34', NULL),
(46, 2, 'dinda', 'dinda@gmail.com', '085862120205', '$2y$10$Ds5p15jfSP3mheOZ1w7wruPu/IORUDjyUvjqu39yImtxjcn04F0pm', NULL, '2023-07-22 23:30:36', NULL),
(47, 2, 'ari', 'ari@gmail.com', '085862120205', '$2y$10$MP4bthPk8a.2j6AybbJhzOXWHWqtU0GwJAx8cB8jXxQxt4.fQi6mC', NULL, '2023-07-23 05:16:52', NULL);

--
-- Indexes for dumped tables
--

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
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_users`
--
ALTER TABLE `role_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `role_users`
--
ALTER TABLE `role_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
