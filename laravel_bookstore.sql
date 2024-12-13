-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2024 at 06:50 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_bookstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` text NOT NULL,
  `book_id` bigint(20) UNSIGNED DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `position` enum('slide','banner') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `image`, `book_id`, `category_id`, `position`, `created_at`, `updated_at`) VALUES
(1, 'banners/zhuQlNONg264SpTl6NEl9p05WpF7qUPiugsr0XHy.jpg', 1, NULL, 'slide', '2024-12-12 04:52:28', '2024-12-12 04:59:51');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `avatar` text NOT NULL,
  `image` text NOT NULL,
  `price` int(11) NOT NULL,
  `origin_price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `sku` varchar(255) NOT NULL,
  `tags` varchar(255) NOT NULL,
  `total_page` varchar(255) NOT NULL,
  `published_year` varchar(255) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `format` varchar(255) NOT NULL,
  `language` varchar(255) NOT NULL,
  `century` varchar(255) NOT NULL,
  `slug` text NOT NULL DEFAULT 'sach-moi',
  `star` int(11) NOT NULL DEFAULT 0,
  `author` varchar(255) NOT NULL DEFAULT 'Chưa Có Tác Giả',
  `summary` text NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `name`, `avatar`, `image`, `price`, `origin_price`, `quantity`, `sku`, `tags`, `total_page`, `published_year`, `category_id`, `format`, `language`, `century`, `slug`, `star`, `author`, `summary`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Sách Mới', 'books/avatars/NVeeruDKSAaWbDF7YNfBosEWGgS6ylds0Ngozbsz.jpg', 'http://127.0.0.1:8000/images/books/1734000872_675ac0e89d58a.jpg#http://127.0.0.1:8000/images/books/1734000872_675ac0e89e394.jpg#http://127.0.0.1:8000/images/books/1734000872_675ac0e89ea32.jpg', 150000, 500000, 50, 'HTOKM', 'Hải Sản, Pizza.', '300', '2020', 1, 'Bìa Cứng', 'Việt Nam', 'Thế kỷ 20', 'sach-moi', 0, 'Chưa Có Tác Giả', '', '', '2024-12-12 03:47:32', '2024-12-12 03:54:32'),
(3, 'Sách mới 234', 'books/avatars/QH1XnpD71avNksj6aiOt1nuybS7MgskzqUCQFh18.jpg', 'http://127.0.0.1:8000/images/books/1734001072_675ac1b018cdd.jpg#http://127.0.0.1:8000/images/books/1734001072_675ac1b01978c.jpg#http://127.0.0.1:8000/images/books/1734001072_675ac1b019ed7.jpg', 20000, 500000, 20, 'HHHNAM2', 'pizza, bánh pizza giao diện, pizza mới', '5000', '2023', 1, 'Bìa Cứng', 'Việt Nam', 'Thế kỷ 20', 'sach-moi111', 0, 'Chưa Có Tác Giả', '', '', '2024-12-12 03:57:52', '2024-12-13 02:33:00'),
(5, 'Sách mới 2', 'books/avatars/NVeeruDKSAaWbDF7YNfBosEWGgS6ylds0Ngozbsz.jpg', 'http://127.0.0.1:8000/images/books/1734000872_675ac0e89d58a.jpg#http://127.0.0.1:8000/images/books/1734000872_675ac0e89e394.jpg#http://127.0.0.1:8000/images/books/1734000872_675ac0e89ea32.jpg', 150000, 500000, 5, 'ANVFER', 'book, sách', '300', '2020', 1, 'Sách', 'Việt Nam', 'Thế kỷ 21', 'sach-moi', 0, 'Chưa Có Tác Giả', '', '', '2024-12-13 09:04:34', '2024-12-13 09:04:34'),
(6, 'Sách mới 3', 'books/avatars/NVeeruDKSAaWbDF7YNfBosEWGgS6ylds0Ngozbsz.jpg', 'http://127.0.0.1:8000/images/books/1734000872_675ac0e89d58a.jpg#http://127.0.0.1:8000/images/books/1734000872_675ac0e89e394.jpg#http://127.0.0.1:8000/images/books/1734000872_675ac0e89ea32.jpg', 150000, 500000, 5, 'ANVFER', 'book, sách', '300', '2020', 1, 'Sách', 'Việt Nam', 'Thế kỷ 21', 'sach-moi', 0, 'Chưa Có Tác Giả', '', '', '2024-12-13 09:04:34', '2024-12-13 09:04:34'),
(7, 'Sách mới 4', 'books/avatars/NVeeruDKSAaWbDF7YNfBosEWGgS6ylds0Ngozbsz.jpg', 'http://127.0.0.1:8000/images/books/1734000872_675ac0e89d58a.jpg#http://127.0.0.1:8000/images/books/1734000872_675ac0e89e394.jpg#http://127.0.0.1:8000/images/books/1734000872_675ac0e89ea32.jpg', 150000, 500000, 5, 'ANVFER', 'book, sách', '300', '2020', 1, 'Sách', 'Việt Nam', 'Thế kỷ 21', 'sach-moi', 0, 'Chưa Có Tác Giả', '', '', '2024-12-13 09:04:34', '2024-12-13 09:04:34'),
(8, 'Sách mới 6', 'books/avatars/NVeeruDKSAaWbDF7YNfBosEWGgS6ylds0Ngozbsz.jpg', 'http://127.0.0.1:8000/images/books/1734000872_675ac0e89d58a.jpg#http://127.0.0.1:8000/images/books/1734000872_675ac0e89e394.jpg#http://127.0.0.1:8000/images/books/1734000872_675ac0e89ea32.jpg', 150000, 500000, 5, 'ANVFER', 'book, sách', '300', '2020', 1, 'Sách', 'Việt Nam', 'Thế kỷ 21', 'sach-moi', 0, 'Chưa Có Tác Giả', '', '', '2024-12-13 09:04:34', '2024-12-13 09:04:34'),
(9, 'Sách mới 7', 'books/avatars/NVeeruDKSAaWbDF7YNfBosEWGgS6ylds0Ngozbsz.jpg', 'http://127.0.0.1:8000/images/books/1734000872_675ac0e89d58a.jpg#http://127.0.0.1:8000/images/books/1734000872_675ac0e89e394.jpg#http://127.0.0.1:8000/images/books/1734000872_675ac0e89ea32.jpg', 150000, 500000, 5, 'ANVFER', 'book, sách', '300', '2020', 1, 'Sách', 'Việt Nam', 'Thế kỷ 21', 'sach-moi', 0, 'Chưa Có Tác Giả', '', '', '2024-12-13 09:04:34', '2024-12-13 09:04:34'),
(10, 'Sách mới 8', 'books/avatars/NVeeruDKSAaWbDF7YNfBosEWGgS6ylds0Ngozbsz.jpg', 'http://127.0.0.1:8000/images/books/1734000872_675ac0e89d58a.jpg#http://127.0.0.1:8000/images/books/1734000872_675ac0e89e394.jpg#http://127.0.0.1:8000/images/books/1734000872_675ac0e89ea32.jpg', 150000, 500000, 5, 'ANVFER', 'book, sách', '300', '2020', 1, 'Sách', 'Việt Nam', 'Thế kỷ 21', 'sach-moi', 0, 'Chưa Có Tác Giả', '', '', '2024-12-13 09:04:34', '2024-12-13 09:04:34'),
(11, 'Sách mới 9', 'books/avatars/NVeeruDKSAaWbDF7YNfBosEWGgS6ylds0Ngozbsz.jpg', 'http://127.0.0.1:8000/images/books/1734000872_675ac0e89d58a.jpg#http://127.0.0.1:8000/images/books/1734000872_675ac0e89e394.jpg#http://127.0.0.1:8000/images/books/1734000872_675ac0e89ea32.jpg', 150000, 500000, 5, 'ANVFER', 'book, sách', '300', '2020', 1, 'Sách', 'Việt Nam', 'Thế kỷ 21', 'sach-moi', 0, 'Chưa Có Tác Giả', '', '', '2024-12-13 09:04:34', '2024-12-13 09:04:34'),
(12, 'Sách mới 10', 'books/avatars/NVeeruDKSAaWbDF7YNfBosEWGgS6ylds0Ngozbsz.jpg', 'http://127.0.0.1:8000/images/books/1734000872_675ac0e89d58a.jpg#http://127.0.0.1:8000/images/books/1734000872_675ac0e89e394.jpg#http://127.0.0.1:8000/images/books/1734000872_675ac0e89ea32.jpg', 150000, 500000, 5, 'ANVFER333', 'book, sách', '300', '2020', 1, 'Sách', 'Việt Nam', 'Thế kỷ 21', 'sach-moi111111', 0, 'Nguyễn Văn An', '<p>Tóm tắt sách</p>', 'ab', '2024-12-13 09:04:34', '2024-12-13 06:54:35'),
(13, 'Sách mới 12', 'books/avatars/StCunuFMRPPw7sFWuJvMyIa3Kheh5mbZ8zI9DKWm.jpg', 'http://127.0.0.1:8000/images/books/1734098151_675c3ce77ad74.jpg#http://127.0.0.1:8000/images/books/1734098151_675c3ce77bba1.jpg#http://127.0.0.1:8000/images/books/1734098151_675c3ce77c0ca.png#http://127.0.0.1:8000/images/books/1734098151_675c3ce77c6d5.jpg', 10000, 150000, 15, 'TRE4553', 'sách mới, sách hay', '200', '2021', 1, 'Bìa Cứng', 'Việt Nam', 'Việt Nam', 'sach-moi-12', 0, 'Nguyễn Văn An', '<p>Cuốn sách \"7 loại hình thông minh\" đưa ra những ví dụ cụ thể về những phương pháp ứng xử thông minh, tài năng đã giành được điểm cao trong các cuộc thi nghề nghiệp, được lấy từ vô số những nền văn hoá khác nhau trên thế giới.&nbsp;</p><p>Bạn cũng có cơ hội để thực tập những kỹ năng quan sát của Klahari Bushman, khả năng giao cảm, hiểu người của vị quan Manhatan, phương pháp thiền của vị sư Phật</p>', 'abcde', '2024-12-13 06:55:51', '2024-12-13 06:55:51');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `book_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `book_id`, `user_id`, `quantity`, `created_at`, `updated_at`) VALUES
(6, 1, 2, 1, '2024-12-13 10:34:02', '2024-12-13 10:34:02');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Sách Thiếu Nhi', 'sach-thieu-nhi', 'categories/hYXLlVo0E2slQ94PrAMzHUzkOzuZ6agQBZWsTpNM.jpg', '2024-12-12 03:14:08', '2024-12-12 03:15:57'),
(2, 'Mục Mới', 'muc-moi', 'categories/hYXLlVo0E2slQ94PrAMzHUzkOzuZ6agQBZWsTpNM.jpg', '2024-12-13 17:46:17', '2024-12-13 17:46:17');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `content` text NOT NULL,
  `star` int(11) NOT NULL,
  `book_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `content`, `star`, `book_id`, `user_id`, `created_at`, `updated_at`) VALUES
(6, 'Hay lắm', 4, 1, 2, '2024-12-12 12:13:28', '2024-12-12 12:13:28');

-- --------------------------------------------------------

--
-- Table structure for table `detail_orders`
--

CREATE TABLE `detail_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `book_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_orders`
--

INSERT INTO `detail_orders` (`id`, `book_id`, `order_id`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 1, '2024-12-13 10:28:40', '2024-12-13 10:28:40');

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_12_12_090847_create_categories_table', 2),
(6, '2024_12_12_090945_create_books_table', 3),
(7, '2024_12_12_091726_create_comments_table', 4),
(8, '2024_12_12_092051_create_carts_table', 5),
(13, '2024_12_12_092227_create_orders_table', 6),
(14, '2024_12_12_092756_create_detail_orders_table', 6),
(15, '2024_12_12_092932_create_banners_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `amount` int(11) NOT NULL,
  `payment` enum('cod','bank') NOT NULL DEFAULT 'cod',
  `address` text NOT NULL,
  `status` enum('pending','confirmed','packed','shipped','delivered','cancelled','returned') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `code`, `user_id`, `amount`, `payment`, `address`, `status`, `created_at`, `updated_at`) VALUES
(1, 'KJFGNIJKDFN', 2, 150000, 'cod', 'Hà Nội', 'pending', '2024-12-12 12:44:42', '2024-12-12 06:10:18'),
(2, 'ORD-675C6EC826605', 2, 150000, 'cod', 'Tầng 1, Tòa ABC, Đường XYZ, Quận JQK, Phường Trần Phú, Thành phố Qui Nhơn, Tỉnh Bình Định', 'pending', '2024-12-13 10:28:40', '2024-12-13 10:35:17');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `role` enum('user','admin','staff') NOT NULL DEFAULT 'user',
  `password` varchar(255) NOT NULL,
  `status` enum('activate','block') NOT NULL DEFAULT 'activate',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `phone`, `role`, `password`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Nguyễn Văn An', 'admin', 'admin@gmail.com', '2024-12-12 09:57:21', '0999888999', 'admin', '$2y$10$XIKnWBIAhgesusdMdxmuUerBj1x25AEkw7Py6O7e7m8ryUIvI5Agi', 'activate', NULL, '2024-12-12 09:57:21', '2024-12-12 04:29:55'),
(2, 'Nguyễn Văn An', 'nguyenvana', 'nguyenvana@gmail.com', '2024-12-12 11:21:14', '0555666888', 'user', '$2y$10$XIKnWBIAhgesusdMdxmuUerBj1x25AEkw7Py6O7e7m8ryUIvI5Agi', 'activate', NULL, '2024-12-12 11:21:14', '2024-12-12 04:24:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`),
  ADD KEY `banners_book_id_foreign` (`book_id`),
  ADD KEY `banners_category_id_foreign` (`category_id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `books_category_id_foreign` (`category_id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_book_id_foreign` (`book_id`),
  ADD KEY `carts_user_id_foreign` (`user_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_book_id_foreign` (`book_id`),
  ADD KEY `comments_user_id_foreign` (`user_id`);

--
-- Indexes for table `detail_orders`
--
ALTER TABLE `detail_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_orders_book_id_foreign` (`book_id`),
  ADD KEY `detail_orders_order_id_foreign` (`order_id`);

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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

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
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `detail_orders`
--
ALTER TABLE `detail_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `banners`
--
ALTER TABLE `banners`
  ADD CONSTRAINT `banners_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `banners_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `detail_orders`
--
ALTER TABLE `detail_orders`
  ADD CONSTRAINT `detail_orders_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `detail_orders_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
