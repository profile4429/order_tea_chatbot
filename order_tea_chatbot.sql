-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 06, 2024 at 01:10 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `order_tea_chatbot`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Các loại hạt', '1680942377_23-1200x676.jpg', NULL, NULL),
(3, 'Các loại quả', '1680946782_qua.jpg', NULL, NULL),
(4, 'Trầm hương', '1680953009_tramhuong.jpg', NULL, NULL),
(8, 'Mật Ong', '1681032457_20191029_101400_306259_mat-ong.max-1800x1800.jpg', NULL, NULL),
(9, 'Rượu', '1681032469_ruou.jpg', NULL, NULL),
(16, 'Lục Bình Gỗ', '1683080962_lucbinhgo.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` bigint UNSIGNED NOT NULL,
  `fullname` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `zalo` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_number` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_address` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `fullname`, `address`, `phone`, `email`, `facebook`, `zalo`, `bank_name`, `bank_number`, `bank_address`, `desc`, `created_at`, `updated_at`) VALUES
(1, 'Nguyễn Xuân S', '49 Phạm Văn Đồng, Quận Thủ Đức, Thành Phố Thủ Đức', '(023) 7100 6782', 'sonver2@gmail.com', 'facebook.com/sonver2', '0367012044', 'Ngân hàng Agribank', '65610000188492', 'Chi nhánh Phạm Văn Đồng , Thủ Đức', 'Điền nội dung vào đây', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `intros`
--

CREATE TABLE `intros` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `intros`
--

INSERT INTO `intros` (`id`, `title`, `image`, `desc`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Tăng ca', '1684069482_23-1200x676.jpg', 'Đặc sản Tây nguyên luôn có các chương trình giảm giá, khuyến mãi để mọi người có cơ hội sở hữu và thưởng thức hương vị tự nhiên mà còn là những sản phẩm', 0, NULL, '2023-05-14 13:04:42'),
(4, 'Địa điểm du lịch', '1682594549_khuyenmai.jpg', 'Tây Nguyên bạn không chỉ tham quan các danh lam thắng cảnh đẹp mà còn trải nghiệm được cuộc sống của đồng bào các dân tộc thiểu số , khó khăn ở', 0, NULL, NULL),
(5, 'Thực đơn', '1682594588_thucdon.jpg', 'Với các sản vật riêng có cùng cách chế biến độc đáo của người dân sẽ đem đến cho bạn nhiều món ăn với hương vị đặc biệt, mới lạ', 0, NULL, NULL),
(6, 'Nguyên chất', '1683898929_z4339999689479_9654a096fdef9fb734b3d982eac92c88.jpg', '100% nguyên chất từ thiên nhiên, không pha tạp hóa chất', 1, NULL, '2023-05-12 13:42:09'),
(7, 'An toàn', '1683898920_z4339999699303_5a14c15081bb0c72f0473259f91d3b20.jpg', 'Đã được kiểm định chất lượng và vệ sinh an toàn thực phẩm', 1, NULL, '2023-05-12 13:42:00'),
(8, 'Giá tốt', '1683898268_z4339557178438_32debfcd28eed1f85dd53697a52e0a8b.jpg', 'Nguyên liệu được lấy trực tiếp từ nông trại với giá tốt nhất thị trường, hỗ trợ 24/7', 1, NULL, '2023-12-23 09:15:24');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int NOT NULL,
  `item_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `item_name`, `price`, `description`, `image`) VALUES
(2, 'trà đào cam sả', '10000.00', 'Trà đào với đào tươi và đá viên', 'tradaocamsa.png'),
(3, 'trà ô lông', '25000.00', 'Trà cam với cam tươi và đá viên', 'traolong.png'),
(4, 'trà sen', '15000.00', 'Nước mía với mía tươi và đá viên', 'trasen.png'),
(5, 'trà vải', '15000.00', 'Trà ô long', 'travai.png'),
(7, 'trà đào', '20000.00', '<p>Trà sữa berry<br></p>', 'tradao.png'),
(8, 'trà thảo mộc', '15000.00', 'Trà ô long', 'trathaomoc.png'),
(9, 'trà hoa hồng', '20000.00', '<p>Trà sữa berry<br></p>', 'trahoahong.png'),
(10, 'trà hoa cúc', '15000.00', 'Trà ô long', 'trahoacuc.png'),
(11, 'trà cam', '20000.00', '<p>Trà sữa berry<br></p>', 'tracam.png'),
(12, 'trà tắc', '20000.00', '<p>Trà sữa berry<br></p>', 'tratac.png');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_04_07_103745_create_roles_table', 2),
(6, '2023_04_07_103759_create_user__admins_table', 2),
(7, '2023_04_08_020724_create_user_clients_table', 3),
(8, '2023_04_08_021017_create_categories_table', 3),
(9, '2023_04_08_021131_create_products_table', 3),
(10, '2023_04_08_024210_user_client', 4),
(11, '2023_04_08_024219_category', 4),
(12, '2023_04_08_024241_product', 4),
(13, '2023_04_08_024248_order', 4),
(14, '2023_04_08_024253_order_detail', 4),
(15, '2023_04_23_101827_update_order', 5),
(16, '2023_04_23_103349_update_order', 6),
(17, '2023_04_23_105508_update_order', 7),
(18, '2023_04_27_175911_create_intros_table', 8),
(19, '2023_04_27_211047_create_pictures_table', 9),
(20, '2023_04_27_214121_create_contacts_table', 10),
(21, '2023_04_28_154745_create_news_table', 11),
(22, '2023_04_28_154800_create_policies_table', 11),
(23, '2023_04_28_161435_update_news', 12),
(24, '2023_04_28_161440_update_policy', 12),
(25, '2023_05_03_094413_update_product', 13),
(26, '2023_05_03_172131_update_order', 14),
(27, '2023_05_03_172952_update_order', 15),
(28, '2023_05_03_173042_update_order', 16),
(29, '2023_05_03_173828_update_order', 17),
(30, '2014_10_12_100000_create_password_resets_table', 18),
(31, '2023_05_05_155210_add_username_in_users', 18);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `image`, `desc`, `date`, `created_at`, `updated_at`) VALUES
(1, 'Nguyên Liệu làm trà sữa', '1682673359_thaoduoc.jpg', '<p>Các nguyên liệu làm trà sữa</p>', '2023-04-28 16:15:00', NULL, '2023-12-23 08:54:51'),
(2, 'Nhóm lửa', '1682824719_thucdon.jpg', '<p>Nhóm lửa<br></p>', '2023-04-30 10:18:00', NULL, '2023-12-23 08:55:07');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` bigint UNSIGNED NOT NULL,
  `fullname` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_date` datetime NOT NULL,
  `status` int NOT NULL,
  `total_money` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `payment_option` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `fullname`, `email`, `phone_number`, `address`, `order_date`, `status`, `total_money`, `created_at`, `updated_at`, `payment_option`) VALUES
(18, 'Nguyen Hoang Long', 'Long@gmail.com', '03671863721', 'xa Phuc Trach, huyen Huong Khe, tinh Ha Tinh', '2023-04-23 21:28:52', 3, 880000, NULL, '2023-04-23 15:14:14', '1'),
(19, 'Quang Hải', 'hai@gmail.com', '09876524251', 'Huong Khe - Ha Tinh', '2023-04-23 22:01:40', 2, 640000, NULL, '2023-04-23 15:24:27', '2'),
(20, 'Trang Honag', 'Trang@gmail.com', '0987654321', '42 Dong da - Ha Noi', '2023-04-23 22:25:33', 0, 340000, NULL, '2023-04-23 16:21:10', '3'),
(21, 'Nguyễn Thị Hoa', 'Hoa@gmail.com', '0123456789', 'Lam Trach - Thu Duc - Binh Duong', '2023-04-23 23:23:52', 3, 270000, NULL, '2023-05-04 03:42:05', '1'),
(22, 'Thanh Nhan', 'Nhan@gmail.com', '0367017048', 'Lam Son - Khoi Nghia - Ha Noi', '2023-04-24 10:57:54', 0, 150000, NULL, '2023-05-04 03:42:31', '1'),
(23, 'Nguyễn Quang Hải', 'hai2327@gmail.com', '0274621516', 'ban gaing', '2023-04-24 11:59:38', 2, 1030000, NULL, '2023-05-12 04:43:55', '2'),
(24, 'Lê Huỳnh Như', 'nhu375@gmail.com', '0345275432', 'lao cai - nghe an', '2023-04-24 15:43:43', 3, 2320000, NULL, '2023-05-14 13:02:41', '1'),
(25, 'Hoàng Thi Thuy', 'Thuy@gmail.com', '09371375426', 'cao bang - lang son', '2023-04-24 15:48:56', 2, 1020000, NULL, '2023-05-12 04:44:04', '2'),
(26, 'Hoàng Thi Thuy', 'Thuy@gmail.com', '09371375426', 'cao bang - lang son', '2023-04-24 15:48:56', 1, 1020000, NULL, NULL, '2'),
(27, 'Hoàng Thi Thuy', 'Thuy@gmail.com', '09371375426', 'cao bang - lang son', '2023-04-24 15:48:56', 1, 1020000, NULL, NULL, '2'),
(28, 'Nguyen Hoang Long', 'Long@gmail.com', '03671863721', 'xa Phuc Trach, huyen Huong Khe, tinh Ha Tinh', '2023-04-24 15:58:45', 3, 250000, NULL, '2023-11-21 16:13:00', '1'),
(29, 'Nguyen Hoang Long', 'Long@gmail.com', '0367017048', 'Thu Duc', '2023-04-24 16:02:02', 1, 30000, NULL, NULL, '2'),
(30, 'Nguyen Hoang Long', 'sonsino2001@gmail.com', '03671863721', 'xa Phuc Trach, huyen Huong Khe, tinh Ha Tinh', '2023-04-24 16:02:52', 1, 300000, NULL, NULL, '2'),
(31, 'Son', 'Long@gmail.com', '123', 'xa Phuc Trach, huyen Huong Khe, tinh Ha Tinh', '2023-04-24 16:04:07', 2, 990000, NULL, '2023-11-21 16:11:47', '3'),
(32, 'Nguyễn Xuân Son', 'sonsino2001@gmail.com', '0367017048', 'xa Phuc Trach, huyen Huong Khe, tinh Ha Tinh', '2023-04-24 16:07:33', 1, 70000, NULL, NULL, '3'),
(33, 'Nguyen Hoang Long', 'Hoang@gmail.com', '03671863721', 'xa Phuc Trach, huyen Huong Khe, tinh Ha Tinh', '2023-04-24 16:12:21', 1, 340000, NULL, NULL, '1'),
(34, 'Nguyen Hoang Long', 'sonsino2001@gmail.com', '03671863721', 'xa Phuc Trach, huyen Huong Khe, tinh Ha Tinh', '2023-04-24 16:15:11', 0, 30000, NULL, '2023-11-21 16:13:32', '1'),
(35, 'Nguyễn Hoàng Long', 'long1976@gmail.com', '0367017047', 'Phuc Trach - Huong Khe - Ha tinh', '2023-04-25 16:37:26', 1, 850000, NULL, NULL, '2'),
(36, 'Nguyen Xuan son', 'son@gmail.com', '0334456243', '308 duong Ta Quang Buu', '2023-04-25 16:44:04', 1, 410000, NULL, NULL, '2'),
(37, 'Nguyễn Văn A', 'a324@gmail.com', '02743256425', 'lam dong - lam son - than hoa', '2023-04-25 16:54:07', 1, 280000, NULL, NULL, '1'),
(38, 'ab', 'ab@gmail.com', '0123526345', 'Phuc Trach - Huong Khe - Ha tinh', '2023-04-25 16:54:58', 1, 280000, NULL, NULL, '1'),
(39, 'Nguyen Xuan son', 'sonsino2001@gmail.com', '03671863721', 'Thu Duc', '2023-04-25 16:58:10', 1, 320000, NULL, NULL, '2'),
(40, 'Nguyen Hoang Long', 'Long@gmail.com', '0367017048', 'xa Phuc Trach, huyen Huong Khe, tinh Ha Tinh', '2023-04-25 17:00:28', 1, 280000, NULL, NULL, '2'),
(41, 'Nguyen Xuan Son', 'sonsino2001@gmail.com', '03671863721', 'xa Phuc Trach, huyen Huong Khe, tinh Ha Tinh', '2023-04-25 17:03:05', 1, 30000, NULL, NULL, '2'),
(42, 'Nguyen Xuan Son', 'sonsino2001@gmail.com', '03671863721', 'xa Phuc Trach, huyen Huong Khe, tinh Ha Tinh', '2023-04-25 17:03:05', 1, 30000, NULL, NULL, '2'),
(43, 'Nguyen Xuan son', 'sonsino2001@gmail.com', '03671863721', 'xa Phuc Trach, huyen Huong Khe, tinh Ha Tinh', '2023-04-25 17:09:59', 1, 590000, NULL, NULL, '2'),
(44, 'Nguyen Hoang Long', 'sonsino2001@gmail.com', '03671863721', 'Thu Duc', '2023-04-25 17:12:40', 1, 200000, NULL, NULL, '1'),
(45, 'Nguyen Hoang Long', 'sonsino2001@gmail.com', '0367017048', 'xa Phuc Trach, huyen Huong Khe, tinh Ha Tinh', '2023-04-25 17:13:49', 1, 70000, NULL, NULL, '2'),
(46, 'Nguyễn Xuân Son', 'son123@gmail.com', '0334459302', 'Phuc Trach - Huong Khe - Ha tinh', '2023-04-25 17:19:46', 1, 1520000, NULL, NULL, '2'),
(47, 'Nguyen Hoang Long', 'sonsino2001@gmail.com', '0367017048', 'Thu Duc', '2023-04-27 21:36:42', 1, 2300000, NULL, NULL, '2'),
(48, 'Nguyen Hoang Long', 'sonsino2001@gmail.com', '0367017048', 'Thu Duc', '2023-05-03 17:39:09', 2, 250000, NULL, '2023-07-30 17:30:31', '2'),
(49, 'Nguyen Hoang Long', 'Long@gmail.com', '0367017048', 'xa Phuc Trach, huyen Huong Khe, tinh Ha Tinh', '2023-05-03 17:41:14', 1, 250000, NULL, NULL, '1'),
(50, 'Nguyen Hoang Long', 'sonsino2001@gmail.com', '0367017048', 'xa Phuc Trach, huyen Huong Khe, tinh Ha Tinh', '2023-05-04 10:45:45', 2, 830000, NULL, '2023-07-30 17:30:18', '2'),
(51, 'Nguyen Xuan son', 'sonsino2001@gmail.com', '03671863721', 'xa Phuc Trach, huyen Huong Khe, tinh Ha Tinh', '2023-05-04 16:50:39', 2, 680000, NULL, '2023-07-30 17:30:02', '1'),
(52, 'Nguyen Xuan son', 'sonsino2001@gmail.com', '03671863721', 'xa Phuc Trach, huyen Huong Khe, tinh Ha Tinh', '2023-05-04 16:52:12', 3, 1900000, NULL, '2023-05-04 09:53:05', '2'),
(53, 'Nguyen Hoang Long', 'sonsino2001@gmail.com', '0367017048', 'xa Phuc Trach, huyen Huong Khe, tinh Ha Tinh', '2023-05-06 15:54:46', 0, 100000, NULL, '2023-05-06 09:31:27', '2'),
(54, 'Nguyen Xuan son', 'sonsino2001@gmail.com', '0367017048', 'xa Phuc Trach, huyen Huong Khe, tinh Ha Tinh', '2023-05-06 16:25:56', 3, 270000, NULL, '2023-05-06 09:30:59', '2'),
(55, 'Nguyen Xuan son', 'sonsino2001@gmail.com', '0367017048', 'Phuc Trach - Huong Khe - Ha tinh', '2023-05-10 08:30:17', 2, 340000, NULL, '2023-11-21 16:12:06', '2'),
(56, 'Nguyen Xuan son', 'sonsino2001@gmail.com', '0367017048', 'dia chi', '2023-05-10 08:36:19', 2, 30000, NULL, '2023-05-12 04:43:45', '2'),
(57, 'Nguyen Xuan son', 'sonsino2001@gmail.com', '0367017048', 'Phuc Trach - Huong Khe - Ha tinh', '2023-05-14 19:49:49', 0, 210000, NULL, '2023-05-14 13:02:00', '2'),
(58, 'Nguyen X', 'X@gmail.com', '0334457652', '1243425', '2023-12-23 16:15:41', 1, 10000, NULL, NULL, '1'),
(59, '1', '1@gmail.com', '1', '1', '2023-12-23 16:18:31', 1, 20000, NULL, NULL, '1'),
(60, 'Nguyen Xuan son', 'son@gmail.com', '0367017048', '1', '2023-12-27 20:41:44', 1, 10000, NULL, NULL, '1');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `count` int NOT NULL,
  `price` int NOT NULL,
  `total_money` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id`, `order_id`, `product_id`, `count`, `price`, `total_money`, `created_at`, `updated_at`) VALUES
(112, 60, 28, 1, 10000, 10000, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pictures`
--

CREATE TABLE `pictures` (
  `id` bigint UNSIGNED NOT NULL,
  `image` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pictures`
--

INSERT INTO `pictures` (`id`, `image`, `status`, `created_at`, `updated_at`) VALUES
(16, '1703235657_slide1.jpg', 0, NULL, NULL),
(17, '1703235693_side2.jpg', 0, NULL, NULL),
(18, '1703235702_slide3.png', 0, NULL, NULL),
(20, '1703322504_side4.jpg', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `policy`
--

CREATE TABLE `policy` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `policy`
--

INSERT INTO `policy` (`id`, `title`, `desc`, `date`, `created_at`, `updated_at`) VALUES
(1, 'Chính sách giao hàng', '<p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px;\">Chúng tôi giúp bạn lựa chọn:</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px;\">* ĐẶC SẢN NGON NỔI TIẾNG CỦA CÁC TỈNH TÂY NGUYÊN:&nbsp;ĐẮK LẮK,&nbsp;ĐẮK NÔNG, LÂM ĐỒNG, GIA LAI, KON TUM</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px;\">* THƯƠNG HIỆU NGON VÀ NỔI TIẾNG NHẤT &nbsp;CHO TỪNG LOẠI ĐẶC SẢN</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px;\">* ĐẢM BẢO ĐÚNG GỐC</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px;\">* HÀNG HÓA LUÔN MỚI – HÀNG TƯƠI KHÔNG TRỮ LÂU</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px;\">Với tham vọng mang đến các sản phẩm không những “NGON” mà còn “LÀNH”, tốt cho sức khỏe con người,</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px;\">chúng tôi yêu cầu nhà cung cấp KHÔNG sử dụng các hóa chất gây hại cho sức khỏe.</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px;\">Ngoài ra, chúng tôi luôn để nguyên nhãn mác nhà sản xuất để người tiêu dùng có thể hiểu rõ nguồn gốc chất lượng sản phẩm,&nbsp;đồng thời chúng tôi &nbsp;cũng cung cấp các giấy tờ chứng minh sản phẩm đạt các tiêu chuẩn quy định về vệ sinh an toàn thực phẩm.</p>', '2023-04-28 16:24:00', NULL, '2023-05-14 13:06:11'),
(2, 'Chính sách bảo quản, đóng gói', 'Chính sách bảo quản, đóng gói\r\nVới phương châm “Đặc sản NGON – SẠCH – CHẤT LƯỢNG”, Đặc sản Tây Nguyên luôn đảm bảo các sản phẩm phải giữ chất lượng tốt nhất từ nhà sản xuất đến tay khách hàng.\r\n\r\nMọi sản phẩm được đóng gói trong bao bì sạch, đẹp và tiện lợi cho sử dụng.\r\n\r\nNếu quý khách có yêu cầu, chúng tôi cung cấp dịch vụ hút chân không cho mọi sản phẩm, rất tiện lợi cho việc vận chuyển hàng đi trong và ngoài nước.\r\n\r\nCác mặt hàng luôn được bảo quản trong môi trường thoáng mát.\r\n\r\nCửa hàng được trang bị tủ lạnh chuyên dụng để bảo quản các sản phẩm đặc chủng trong điều kiện nhiệt độ tốt nhất.\r\n\r\nMua sản phẩm của Đặc sản Tây Nguyên, quý khách hoàn toàn yên tâm về mặt CHẤT LƯỢNG!<br>Các mặt hàng luôn được bảo quản trong môi trường thoáng mát. Cửa hàng được trang bị tủ lạnh chuyên dụng để bảo quản các sản phẩm đặc chủng trong điều kiện nhiệt độ tốt nhất. Mua sản phẩm của Đặc sản Tây Nguyên, quý khách hoàn toàn yên tâm về mặt chat luong<br>', '2023-04-30 10:34:00', NULL, '2023-05-05 01:19:56'),
(3, 'Các câu hỏi thường gặp', '<p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(51, 51, 51); font-family: Roboto, sans-serif; font-size: 15px; text-align: justify;\"><strong>Câu hỏi 1:</strong>&nbsp;Đặc sản Tây nguyên là gì?</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(51, 51, 51); font-family: Roboto, sans-serif; font-size: 15px; text-align: justify;\"><strong>Trả lời:</strong>&nbsp;Tây Nguyên là vùng cao nguyên, phía bắc giáp tỉnh&nbsp;Quảng Nam, phía đông giáp các tỉnh&nbsp;Quảng Ngãi,&nbsp;Bình Định,&nbsp;Phú Yên,&nbsp;Khánh Hòa,&nbsp;Ninh Thuận,&nbsp;Bình Thuận, phía nam giáp các tỉnh&nbsp;Đồng Nai,&nbsp;Bình Phước, phía tây giáp với các tỉnh&nbsp;Attapeu&nbsp;(Lào) và&nbsp;Ratanakiri&nbsp;và&nbsp;Mondulkiri&nbsp;(Campuchia).</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(51, 51, 51); font-family: Roboto, sans-serif; font-size: 15px; text-align: justify;\">Với đặc điểm thổ nhưỡng đất đỏ&nbsp;bazan&nbsp;ở độ cao khoảng 500 m đến 600 m so với mặt biển, Tây Nguyên rất phù hợp với những cây công nghiệp như&nbsp;cà phê,&nbsp;ca cao,&nbsp;hồ tiêu,&nbsp;dâu tằm.&nbsp;Cây điều&nbsp;và&nbsp;cây cao su&nbsp;cũng đang được phát triển tại đây.&nbsp;</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(51, 51, 51); font-family: Roboto, sans-serif; font-size: 15px; text-align: justify;\">Tây Nguyên cũng là khu vực ở Việt Nam còn nhiều diện tích rừng với thảm sinh vật đa dạng, trữ lượng khoáng sản phong phú hầu như chưa khai thác và tiềm năng du lịch lớn.</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(51, 51, 51); font-family: Roboto, sans-serif; font-size: 15px; text-align: justify;\">Do đó, Tây nguyên sở hữu rất nhiều sản vật của các bộ tộc thiểu số&nbsp;người Ê Đê, Gia Rai, Mạ... vừa đặc trưng cho vùng đất huyền thoại và cũng là những món ă, đồ uống không thể thiêu của người dân nơi đây.</p><hr style=\"box-sizing: content-box; height: 0px; margin-top: 20px; margin-bottom: 20px; border-top: 1px solid rgb(238, 238, 238); color: rgb(51, 51, 51); font-family: Roboto, sans-serif; font-size: 15px;\"><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(51, 51, 51); font-family: Roboto, sans-serif; font-size: 15px;\"><strong>Câu hỏi 2:</strong>&nbsp;Nguồn gốc các sản phẩm trên dacsantaynguyen.com?</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(51, 51, 51); font-family: Roboto, sans-serif; font-size: 15px; text-align: justify;\"><strong>Trả lời:</strong>&nbsp;Dacsantaynguyen.com (Đặc sản Tây nguyên) được sản xuất và cung cấp bởi những Cơ sở uy tín, đảm bảo chất lượng khi đến tay người tiêu dùng. Quý khách có thể xem thêm&nbsp;<a href=\"http://dacsantaynguyen.com/p/chinh-sach-nguon-san-pham.html\" target=\"_blank\" style=\"background-color: transparent; cursor: pointer;\">Chính sách nguồn sản phẩm</a></p>', '2023-04-30 10:35:00', NULL, '2023-05-05 01:21:05'),
(4, 'Chính sách đổi trả , hoàn tiền', '<h2 class=\"heading-wrp\" style=\"font-family: Roboto, sans-serif; line-height: 1.1; color: rgb(51, 51, 51); margin-top: 20px; margin-bottom: 10px; font-size: 30px;\">Hướng dẫn mua hàng</h2><div class=\"article-content\" style=\"color: rgb(51, 51, 51); font-family: Roboto, sans-serif; font-size: 15px;\"><div style=\"margin-bottom: 30px; line-height: 20px;\"><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px;\"><strong>Bước 1:&nbsp;</strong>Chọn sản phẩm -&gt;&nbsp;Đặt hàng</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px;\"><strong>Bước 2:&nbsp;</strong>Xác&nbsp;nhận&nbsp;đơn hàng.</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px;\"><strong>Bước 3:&nbsp;</strong>Nhập&nbsp;đầy&nbsp;đủ thông tin theo Form mẫu:</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px;\">* Thông tin người Mua hàng:</p><ul style=\"margin-bottom: 10px;\"><li>Họ và tên.</li><li>Địa chỉ.</li><li>Điện thoại</li><li>Email</li></ul><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px;\">* Thông tin người Nhận&nbsp;hàng:</p><ul style=\"margin-bottom: 10px;\"><li>Họ và tên.</li><li>Địa chỉ.</li><li>Điện thoại</li></ul><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px;\"><strong>Bước 4:&nbsp;</strong>Chọn hình thức thanh toán</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px;\"><strong>Bước 5:&nbsp;</strong>Hoàn thành</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px;\"><u><em><strong>Lưu&nbsp;ý:&nbsp;</strong></em></u><strong><span style=\"color: rgb(255, 0, 0);\">Nếu Quý khách vẫn chưa thực hiện&nbsp;được thao tác mua hàng, vui lòng liê</span></strong><strong><span style=\"color: rgb(255, 0, 0);\">n hệ&nbsp;Điện thoại tư vấn trực tiếp: 0932.47.42.47.</span></strong></p></div></div>', '2023-04-30 10:35:00', NULL, '2023-05-05 01:21:32'),
(5, 'Hướng dẫn đặt hàng, thanh toán', '<h3 style=\"font-family: Roboto, sans-serif; line-height: 1.1; color: rgb(51, 51, 51); margin-top: 20px; margin-bottom: 10px; font-size: 24px; text-align: justify;\"><u><span style=\"font-size: 14px;\"><span style=\"font-family: verdana, geneva, sans-serif;\"><strong>Hình thức giao hàng</strong></span></span></u></h3><h3 style=\"font-family: Roboto, sans-serif; line-height: 1.1; color: rgb(51, 51, 51); margin-top: 20px; margin-bottom: 10px; font-size: 24px; text-align: justify;\"><strong><em><span style=\"font-size: 14px;\"><span style=\"font-family: verdana, geneva, sans-serif;\">I. Đối với khách hàng nội thành Tp.Buôn Ma Thuột</span></span></em></strong></h3><h3 style=\"font-family: Roboto, sans-serif; line-height: 1.1; color: rgb(51, 51, 51); margin-top: 20px; margin-bottom: 10px; font-size: 24px; text-align: justify;\"><span style=\"font-size: 14px;\"><span style=\"font-family: verdana, geneva, sans-serif;\">Chúng tôi sẵn sàng giao hàng miễn phí cho các hóa đơn trên 200,000 VND ở&nbsp;Nội thành Thành phố.</span></span><span style=\"font-size: 10pt; font-family: Arial, sans-serif;\"><o:p></o:p></span></h3><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(51, 51, 51); font-family: Roboto, sans-serif; font-size: 15px; text-align: justify;\"><span style=\"font-size: 14px;\"><span style=\"font-family: verdana, geneva, sans-serif;\">Các&nbsp;địa điểm khác, tùy theo mức độ xa gần, có mức giới hạn thấp nhất tổng tiền để được giao miễn phí. Nếu không giao miễn phí chúng tôi cũng giao và tính phí ship, quý khách cứ liên hệ để được nhân viên tư vấn trưc tiếp, linh hoạt xử lý phục vụ.</span></span><span style=\"font-size: 10pt; font-family: Arial, sans-serif;\"><o:p></o:p></span></p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(51, 51, 51); font-family: Roboto, sans-serif; font-size: 15px; text-align: justify;\"><em><strong><span style=\"font-size: 14px;\"><span style=\"font-family: verdana, geneva, sans-serif;\">II Đối với khách hàng ở các Tỉnh, Thành xa:</span></span></strong></em></p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(51, 51, 51); font-family: Roboto, sans-serif; font-size: 15px; text-align: justify;\"><span style=\"font-size: 14px;\"><span style=\"font-family: verdana, geneva, sans-serif;\">Chúng tôi giao hàng cho quý khách ở các tỉnh thành ngoài Tp.Buôn Ma Thuột bằng dịch vụ của công ty vận chuyển.</span></span><span style=\"font-size: 10pt; font-family: Arial, sans-serif;\"><o:p></o:p></span></p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(51, 51, 51); font-family: Roboto, sans-serif; font-size: 15px; text-align: justify;\"><span style=\"font-size: 14px;\"><span style=\"font-family: verdana, geneva, sans-serif;\">Tuy nhiên, quý khách sẽ tốn thêm chi phí dịch vụ vận chuyển. Sau khi quý khách đặt hàng và báo địa chỉ, nhân viên cửa hàng sẽ kiểm tra được tiền phí vận chuyển, và xác nhận với quý khách, nếu quý khách đồng ý thì hàng bắt đầu được gửi đi.</span></span><span style=\"font-size: 10pt; font-family: Arial, sans-serif;\"><o:p></o:p></span></p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(51, 51, 51); font-family: Roboto, sans-serif; font-size: 15px; text-align: justify;\"><span style=\"font-size: 14px;\"><span style=\"font-family: verdana, geneva, sans-serif;\">Quý khách sẽ nhận được giao hàng tận nhà, kiểm tra hàng hóa và thanh toán tổng tiền cho người giao hàng.</span></span><span style=\"font-size: 10pt; font-family: Arial, sans-serif;\"><o:p></o:p></span></p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(51, 51, 51); font-family: Roboto, sans-serif; font-size: 15px; text-align: justify;\"><span style=\"font-size: 14px;\"><span style=\"font-family: verdana, geneva, sans-serif;\">Chúng tôi có thể giao hàng đến Quý khách bằng các hình thức như: xe khách, máy bay và thanh toán qua chuyển khoản.</span></span><span style=\"font-size: 10pt; font-family: Arial, sans-serif;\"><o:p></o:p></span></p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(51, 51, 51); font-family: Roboto, sans-serif; font-size: 15px; text-align: justify;\"><span style=\"font-size: 14px;\"><span style=\"font-family: verdana, geneva, sans-serif;\">Chúng tôi sẽ cố gắng hết sức để hàng hóa đến tận tay Quý khách sớm nhất có thể</span></span><span style=\"font-size: 10pt; font-family: Arial, sans-serif;\"><o:p></o:p></span></p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(51, 51, 51); font-family: Roboto, sans-serif; font-size: 15px; text-align: justify;\"><span style=\"font-size: 14px;\"><span style=\"font-family: verdana, geneva, sans-serif;\">và chi phí vận chuyển rẻ nhất theo yêu cầu khách hàng. Mong quý khách hỗ trợ chi trả cước phí vận chuyển.</span></span><span style=\"font-size: 10pt; font-family: Arial, sans-serif;\"><o:p></o:p></span></p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(51, 51, 51); font-family: Roboto, sans-serif; font-size: 15px; text-align: justify;\"><strong><span style=\"font-size: 14px;\"><span style=\"font-family: verdana, geneva, sans-serif;\">NGÂN HÀNG QUỐC TẾ VIB – CHI NHÁNH ĐẮK LẮK</span></span></strong><span style=\"font-size: 10pt; font-family: Arial, sans-serif;\"><o:p></o:p></span></p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(51, 51, 51); font-family: Roboto, sans-serif; font-size: 15px; text-align: justify;\"><strong><span style=\"font-size: 14px;\"><span style=\"font-family: verdana, geneva, sans-serif;\">Trần Trung Việt: 4107 0406 009 7724</span></span></strong><span style=\"font-size: 10pt; font-family: Arial, sans-serif;\"><o:p></o:p></span></p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(51, 51, 51); font-family: Roboto, sans-serif; font-size: 15px; text-align: justify;\"><span style=\"font-size: 14px;\"><span style=\"font-family: verdana, geneva, sans-serif;\">Ngay sau khi Quý khách chuyển khoản xong, và nhận được thông tin báo SMS từ ngân hàng,&nbsp;chúng tôi sẽ tiến hành chuyển hàng cho quý khách.</span></span><span style=\"font-size: 10pt; font-family: Arial, sans-serif;\"><o:p></o:p></span></p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(51, 51, 51); font-family: Roboto, sans-serif; font-size: 15px; text-align: justify;\"><span style=\"font-size: 14px;\"><span style=\"font-family: verdana, geneva, sans-serif;\">Đặc sản Tây Nguyên – Hương vị từ Tây Nguyên – Rất hân hạnh được phục vụ Quý khách và gia đình bạn bè, thân hữu những bữa ăn ngon, vui vẻ.</span></span><span style=\"font-size: 10pt; font-family: Arial, sans-serif;\"><o:p></o:p></span></p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(51, 51, 51); font-family: Roboto, sans-serif; font-size: 15px; text-align: justify;\"><span style=\"font-size: 14px;\"><span style=\"font-family: verdana, geneva, sans-serif;\">Chúc Quý khách và gia đình luôn AN KHANG – THỊNH VƯỢNG.</span></span><span style=\"font-size: 10pt; font-family: Arial, sans-serif;\"><o:p></o:p></span></p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(51, 51, 51); font-family: Roboto, sans-serif; font-size: 15px; text-align: justify;\"><em><span style=\"font-size: 14px;\"><span style=\"font-family: verdana, geneva, sans-serif;\">Trân trọng cảm ơn!</span></span></em></p>', '2023-04-30 10:35:00', NULL, '2023-05-05 01:21:55');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `title` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int NOT NULL,
  `image` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `category_id`, `title`, `price`, `image`, `desc`, `created_at`, `updated_at`, `deleted`) VALUES
(8, 1, 'trà đào cam sả', 100000, 'tradaocamsa.png', '<p>xịn</p>', NULL, NULL, 0),
(28, 1, 'trà ô lông', 10000, 'traolong.png', 'Trà đào với đào tươi và đá viên', NULL, NULL, 0),
(29, 1, 'trà sen', 100000, 'trasen.png', '<p>xịn</p>', NULL, NULL, 0),
(30, 1, 'trà vải', 10000, 'travai.png', 'Trà đào với đào tươi và đá viên', NULL, NULL, 0),
(31, 1, 'trà đào', 100000, 'tradao.png', '<p>xịn</p>', NULL, NULL, 0),
(32, 1, 'trà thảo mộc', 10000, 'trathaomoc.png', 'Trà đào với đào tươi và đá viên', NULL, NULL, 0),
(33, 1, 'trà hoa hồng', 100000, 'trahoahong.png', '<p>xịn</p>', NULL, NULL, 0),
(34, 1, 'trà hoa cúc', 10000, 'trahoacuc.png', 'Trà đào với đào tươi và đá viên', NULL, NULL, 0),
(35, 1, 'trà cam', 100000, 'tracam.png', '<p>xịn</p>', NULL, NULL, 0),
(36, 1, 'trà tắc', 10000, 'tratac.png', 'Trà đào với đào tươi và đá viên', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `receipt`
--

CREATE TABLE `receipt` (
  `id_receipt` int NOT NULL,
  `id_user` int NOT NULL,
  `id_item` int NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `create_at` datetime NOT NULL,
  `quantity` int NOT NULL,
  `sum` decimal(10,2) NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int DEFAULT NULL,
  `payment_option` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `receipt`
--

INSERT INTO `receipt` (`id_receipt`, `id_user`, `id_item`, `address`, `create_at`, `quantity`, `sum`, `description`, `status`, `payment_option`) VALUES
(2, 2, 3, '40 Trần Văn Hoài ', '2023-12-18 20:34:50', 1, '25000.00', NULL, 3, 1),
(3, 3, 2, '43 Hai Bà Trưng ', '2023-12-22 20:55:37', 1, '10000.00', NULL, 1, 1),
(4, 4, 2, '66 Nguyễn Trãi ', '2023-12-22 22:09:14', 1, '10000.00', NULL, NULL, NULL),
(5, 5, 2, '66 Quang Trung ', '2023-12-23 09:41:17', 1, '10000.00', NULL, NULL, NULL),
(6, 9, 2, '12/2 Đỗ Quang ', '2023-12-23 10:04:24', 1, '10000.00', NULL, NULL, NULL),
(7, 10, 3, '12/7 Nguyễn Tiệm ', '2023-12-23 16:27:49', 1, '25000.00', NULL, NULL, NULL),
(8, 2, 5, '55/2 Hoàng Văn Thám đường ', '2023-12-23 16:31:51', 1, '15000.00', NULL, NULL, NULL),
(9, 2, 5, '55 Nguyễn Trung ', '2023-12-23 17:10:12', 1, '15000.00', NULL, NULL, NULL),
(10, 12, 5, '55 Quang trung ', '2023-12-23 17:19:18', 1, '15000.00', NULL, 2, 1),
(11, 13, 3, '55 Thủ Đức ', '2023-12-28 15:30:35', 1, '25000.00', NULL, 1, 1),
(12, 14, 7, '100 Quang Trung Linh Trung Thủ Đức ', '2023-12-29 21:57:59', 1, '20000.00', NULL, 1, 1),
(13, 15, 5, '55 Linh trung Thủ Đức ', '2024-01-04 22:32:37', 1, '15000.00', NULL, 1, 1),
(14, 16, 7, '55 Linh Trung Thủ Đức ', '2024-01-05 15:47:01', 1, '20000.00', NULL, 1, 1),
(15, 16, 5, '33 Linh Xuân Thủ Đức ', '2024-01-05 15:50:10', 1, '15000.00', NULL, 2, 1),
(16, 17, 7, '55 Trung Trung Thủ Đức ', '2024-01-05 16:22:59', 1, '20000.00', NULL, 1, 1),
(17, 18, 7, '33 Linh Trung Thủ Đức ', '2024-01-05 22:24:04', 1, '20000.00', NULL, 1, 1),
(18, 18, 5, '66/2 Nguyễn Chí Thanh ', '2024-01-05 22:25:36', 1, '15000.00', NULL, 1, 1),
(19, 19, 7, '55 Nguyễn Chí Thanh ', '2024-01-05 22:32:00', 1, '20000.00', NULL, 1, 1),
(20, 19, 5, '66 Trần Đại Nghĩa ', '2024-01-05 22:36:32', 1, '15000.00', NULL, 1, 1),
(21, 20, 7, '67 Hai Bà Trưng ', '2024-01-05 22:44:26', 1, '20000.00', NULL, 2, 1),
(22, 21, 7, '55 Hai Bà Trưng ', '2024-01-05 23:30:12', 1, '20000.00', NULL, 2, 1),
(23, 21, 7, '23 Linh Trung Thủ Đức ', '2024-01-05 23:31:45', 10, '200000.00', NULL, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'User', NULL, NULL),
(2, 'Admin', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `phone`, `note`) VALUES
(1, 'John Doe', '0912345678', 'Note about John Doe'),
(2, 'Trần Hoàng Long', '0368072055', NULL),
(3, 'Nguyễn Thị Mận', '0334459702', NULL),
(4, 'Nguyen Van Tai', '0367017043', NULL),
(5, 'Nguyen Thi Nhu Quynh', '0334467542', NULL),
(6, 'Trần Quang Hà', '0334478893', NULL),
(7, 'Đỗ Huy Huy', '0338765432', NULL),
(8, 'Quang Trung', '0334467652', NULL),
(9, 'Đỗ Quang', '0368072088', NULL),
(10, 'Nguyễn Tiệm', '0985674532', NULL),
(11, 'Nguyễn Văn A', '0987654321', NULL),
(12, 'Nguyễn Quang trung', '0334457654', NULL),
(13, 'Nguyễn Long An', '0368071055', NULL),
(14, 'Nguyễn Văn Anh', '0367876543', NULL),
(15, 'Nguyễn Thanh Long', '0364824952', NULL),
(16, 'Nguyễn Hoàng Long', '0334459401', NULL),
(17, 'Nguyễn Hoàng Quý', '0334459402', NULL),
(18, 'Nguyễn Hoàng Long', '0368072052', NULL),
(19, 'Nguyễn Chí Thanh', '0368072053', NULL),
(20, 'Nguyễn Văn Lang', '0368072054', NULL),
(21, 'Nguyễn Hoàng Long', '0368072056', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(8, 'admin123', 'admin123', 'admin123@gmail.com', NULL, '$2y$10$KoE84hh61Dj5iFdUJMZ56O/.Qw/yFw1SCE8jbcwt7hITjJ.eQTRey', NULL, '2023-05-06 08:28:30', '2023-05-06 08:28:30'),
(9, 'Nguyễn Văn Trân', 'vantran123', 'vantran123@gmail.com', NULL, '$2y$10$Gj6AAXPLVIInh5FAevO03.a826QRttYMZEHEQ/MRgu.ElY/Mai/Uu', NULL, '2023-05-06 08:29:59', '2023-05-06 08:29:59');

-- --------------------------------------------------------

--
-- Table structure for table `user_admin`
--

CREATE TABLE `user_admin` (
  `id` bigint UNSIGNED NOT NULL,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_admin`
--

INSERT INTO `user_admin` (`id`, `username`, `password`, `created_at`, `updated_at`, `deleted_at`, `role_id`) VALUES
(1, 'admin', 'admin', NULL, NULL, NULL, 2),
(3, 'user', 'user', NULL, NULL, NULL, 1),
(4, 'vantran', 'vantran123', NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_client`
--

CREATE TABLE `user_client` (
  `id` bigint UNSIGNED NOT NULL,
  `fullname` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `intros`
--
ALTER TABLE `intros`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_detail_order_id_foreign` (`order_id`),
  ADD KEY `order_detail_product_id_foreign` (`product_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
-- Indexes for table `pictures`
--
ALTER TABLE `pictures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `policy`
--
ALTER TABLE `policy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_category_id_foreign` (`category_id`);

--
-- Indexes for table `receipt`
--
ALTER TABLE `receipt`
  ADD PRIMARY KEY (`id_receipt`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_item` (`id_item`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_admin`
--
ALTER TABLE `user_admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_admin_role_id_foreign` (`role_id`);

--
-- Indexes for table `user_client`
--
ALTER TABLE `user_client`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `intros`
--
ALTER TABLE `intros`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pictures`
--
ALTER TABLE `pictures`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `policy`
--
ALTER TABLE `policy`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `receipt`
--
ALTER TABLE `receipt`
  MODIFY `id_receipt` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_admin`
--
ALTER TABLE `user_admin`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_client`
--
ALTER TABLE `user_client`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`),
  ADD CONSTRAINT `order_detail_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Constraints for table `receipt`
--
ALTER TABLE `receipt`
  ADD CONSTRAINT `receipt_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `receipt_ibfk_2` FOREIGN KEY (`id_item`) REFERENCES `menu` (`id`);

--
-- Constraints for table `user_admin`
--
ALTER TABLE `user_admin`
  ADD CONSTRAINT `user_admin_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
