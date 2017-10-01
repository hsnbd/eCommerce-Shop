-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2017 at 05:23 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php109`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `home` ()  BEGIN
SELECT * FROM categories ORDER BY name ASC;

SELECT * FROM subcategories ORDER BY name ASC;

SELECT * FROM slider ORDER BY id DESC;


SELECT p.id, p.title, p.price, p.vat, p.discount,p.picture1,p.picture2,p.picture3,p.default_picture,c.name cname, sc.name scname
FROM products p, subcategories sc, categories c
WHERE p.subcategoriesid = sc.id AND
sc.categoriesid = c.id
ORDER BY p.id desc LIMIT 12;

SELECT p.id, p.title, p.price, p.vat, p.discount,p.picture1,p.picture2,p.picture3,p.default_picture,c.name cname, sc.name scname
FROM products p, subcategories sc, categories c
WHERE p.subcategoriesid = sc.id AND
sc.categoriesid = c.id
ORDER BY p.discount desc LIMIT 12;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Electronics', '2017-08-15 06:45:33', '2017-08-15 06:45:33'),
(2, 'Men\'s Ware', '2017-08-15 07:47:14', '2017-08-15 07:47:14'),
(3, 'Women\'s Ware', '2017-08-15 08:11:40', '2017-08-15 08:11:40'),
(4, 'Collection', '2017-08-17 10:28:36', '2017-08-17 10:28:36');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `countriesid` tinyint(3) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `code` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discout` double(5,2) NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `citiesid` tinyint(3) UNSIGNED NOT NULL,
  `gender` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dislikes`
--

CREATE TABLE `dislikes` (
  `id` int(10) UNSIGNED NOT NULL,
  `reviewsid` tinyint(3) UNSIGNED NOT NULL,
  `customersid` tinyint(3) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `reviewsid` tinyint(3) UNSIGNED NOT NULL,
  `customersid` tinyint(3) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `catid` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `catid`, `created_at`, `updated_at`) VALUES
(1, 1, '2017-08-16 12:45:52', '2017-08-16 12:45:52'),
(2, 2, '2017-08-16 12:45:52', '2017-08-16 12:45:52'),
(3, 3, '2017-08-16 12:45:52', '2017-08-16 12:45:52');

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
(225, '2014_10_12_000000_create_users_table', 1),
(226, '2014_10_12_100000_create_password_resets_table', 1),
(227, '2017_05_22_164716_create_units_table', 1),
(228, '2017_05_22_165048_create_categories_table', 1),
(229, '2017_05_22_165222_create_countries_table', 1),
(230, '2017_05_22_165341_create_cities_table', 1),
(231, '2017_05_22_172318_create_subcategories_table', 1),
(232, '2017_05_22_172543_create_shipping_table', 1),
(233, '2017_05_22_172631_create_coupons_table', 1),
(234, '2017_05_22_175445_create-products_table', 1),
(235, '2017_05_23_005619_create_customers_table', 1),
(236, '2017_05_23_005839_create_sales_table', 1),
(237, '2017_05_23_012108_create_slider_table', 1),
(238, '2017_05_23_012230_create_salesdetails_table', 1),
(239, '2017_05_23_012328_create_reviews_table', 1),
(240, '2017_05_23_013906_create_likes_table', 1),
(241, '2017_05_23_013939_create_dislikes_table', 1),
(242, '2017_05_25_082538_create_size_table', 1),
(243, '2017_08_15_093218_create_social_table', 1),
(244, '2017_08_15_102318_create_store_infos_table', 1),
(246, '2017_08_16_123547_create_menus_table', 2),
(247, '2017_08_17_161253_create_special_offers_table', 3),
(249, '2017_08_17_174845_create_review_products_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `vat` double(4,2) NOT NULL,
  `discount` double(6,2) NOT NULL,
  `unitsid` tinyint(3) UNSIGNED NOT NULL,
  `subcategoriesid` tinyint(3) UNSIGNED NOT NULL,
  `weight` double(8,2) NOT NULL,
  `size` smallint(6) DEFAULT NULL,
  `stock` double(10,2) NOT NULL,
  `picture1` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `picture2` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `picture3` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `default_picture` smallint(6) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `price`, `vat`, `discount`, `unitsid`, `subcategoriesid`, `weight`, `size`, `stock`, `picture1`, `picture2`, `picture3`, `default_picture`, `created_at`, `updated_at`) VALUES
(1, 'Lenovo Ideapad G40 - 4th Gen Core i3 - 4GB RAM – 500GB HDD – 14\" (Refurbished) Laptop – Black', 'Key Features\r\n\r\n    REFURBISHED LAPTOP\r\n    THIS ITEM MAY OR MAY NOT BE IN ORIGINAL PACKAGING\r\n    Performance: Core i3 4th Gen, 1.9Ghz, 4GB DDR3 RAM\r\n    Display: 14.0 inches\r\n    Storage: 500 GB HDD SATA 5400 RPM\r\n    Battery: Li-Ion 4 Cell', 29000.00, 10.00, 12.00, 1, 2, 1.00, 1, 10.00, 'jpg', 'jpg', 'jpg', 1, '2017-08-15 06:50:11', '2017-08-15 06:50:11'),
(2, 'Dell Latitude E6420 – 2nd Gen Core i5 – 4GB RAM – 320GB HDD - 14” (Refurbished) Laptop – Black', 'Key Features\r\n\r\n    REFURBISHED LAPTOP\r\n    THIS ITEM MAY OR MAY NOT BE IN ORIGINAL PACKAGING\r\n    Screen Size: 14 inches\r\n    Screen Resolution: 1366 x 768\r\n    Processor Type: Intel Core i5\r\n    Processor Speed: 2.5GHz', 23000.00, 10.00, 9.00, 1, 2, 1.00, 1, 10.00, 'jpg', 'jpg', 'jpg', 2, '2017-08-15 06:51:47', '2017-08-15 06:51:47'),
(3, 'HP Elite Book 840 - 4th Gen Core i7 - 4GB RAM – 500GB HDD – 14’’ (Refurbished) Laptop – Metal Silver', 'Key Features\r\n\r\n    REFURBISHED LAPTOP\r\n    THIS ITEM MAY OR MAY NOT BE IN ORIGINAL PACKAGING\r\n    Screen Size: 14 inches\r\n    Screen Resolution: 1600 x 900\r\n    Processor: 2.6 GHz Intel Core i7\r\n    RAM: 4 GB DDR3 SDRAM', 39900.00, 10.00, 14.00, 1, 2, 1.00, 1, 20.00, 'jpg', 'jpg', 'jpg', 3, '2017-08-15 06:52:58', '2017-08-15 06:52:58'),
(4, 'Huawei Y 5II Dual SIM Smartphone 8GB – Black', 'Never Miss a Chance to Enjoy the Moment\r\n\r\nIt’s a pity to lose vivid details in photos because of lighting. The dual flashlight of Huawei Y5II performs exceptionally well in low-light conditions. The 8-megapixel camera and the F2.0 aperture creates photos of that look professional. The auto-enhancement feature designed for portraits, along with the 2-megapixel front-facing camera delivers the perfect selfies experience, making your portraits stand out and shine.\r\nimage\r\n\r\n\r\nSee the World at the Speed of Light with Crystal Clarity\r\n\r\nHuawei Y5II sports a beautiful 5-inch HD LCD display, providing crisp, vibrant experience that is truly a feast for the eyes. But it’s more than just a piece of eye-candy. The quad 1.3GHz CPU backs up the graphic performance with enough processing power to keep even the most multitasking-oriented user flying along, immersed in a visual wonderland.', 9990.00, 10.00, 0.00, 1, 2, 1.00, 2, 10.00, 'jpg', 'jpg', 'jpg', 3, '2017-08-15 06:56:37', '2017-08-15 06:56:37'),
(5, 'Huawei GR3 2017 Dual SIM Smartphone 16GB – Gold', 'GR3 2017 is equipped with a 12MB f/2.2 BSI rear camera.  The BSI sensor ensures better image quality even in low light conditions.  The rear camera has a built-in LED flash right beside it. Fast capturing ability makes sure user never miss a moment worth capturing.\r\n\r\nThe 8-megapixel front camera is another blast from Huawei. The front camera consists a wide angle lens and most impressive part of it is the aperture rate. GR3 2017 has an aperture rate of f/2.0 which is capable of focusing the main subject by blurring out the background objects. To enhance the low light image quality the UI is functioned for screen flash while taking selfies.\r\n\r\n\r\nGR3: System & Hardware\r\n\r\nNew GR3 2017 is powered by a 2.1 GHz 64 Bit Kirin 655 octa-core processor, a 3GB RAM & 16GB storage which is expandable up to 128GB by micro SD card. To provide a flawless graphics performance GR3 has a Mali T830 GPU on board.\r\n\r\nAll the hardware comes to life with an Android 7.0 Nougat operating system. And to make the Android experience more user-friendly and efficient Huawei has added the EMUI 5.0 to the system.\r\n\r\n\r\nGR3: Sensors\r\n\r\nProximity, light, compass, accelerometer, gyroscope and a fingerprint sensor are in the list of offerings of Huawei GR3 2017.', 19900.00, 10.00, 0.00, 1, 3, 1.00, 2, 20.00, 'jpg', 'jpg', 'jpg', 1, '2017-08-15 07:36:15', '2017-08-15 07:36:15'),
(6, 'Huawei GR5 Mini Smartphone 16GB – Gold', 'China Smartphone brand Huawei Launch another Mid-range Android Smartphone HUAWEI GR5 Mini. GR5 mini is a mini version of their popular Android Smartphone HUAWEI GR5. It has a great 13 MP rear camera with autofocus and LED flash for quick capture the perfect image. You can capture crystal clear image with Sony Sensor. It has 8 MP front facing camera which supports HDR.', 15500.00, 10.00, 0.00, 1, 3, 1.00, 2, 20.00, 'jpg', 'jpg', 'jpg', 2, '2017-08-15 07:37:39', '2017-08-15 07:37:39'),
(7, 'Huawei Honor 4X Smartphone 8GB - Golden', 'Key Features\r\n\r\n    Octa Core 1.2 GHz Processor\r\n    8 GB ROM, 2 GB RAM\r\n    5.5 inches IPS LCD capacitive touchscreen\r\n    Front 13MP and Secondary 5MP Camera\r\n    Android Operating System\r\n    Li-Ion 3000mAh battery', 12900.00, 10.00, 0.00, 1, 3, 1.00, 2, 12.00, 'jpg', 'jpg', 'jpg', 3, '2017-08-15 07:38:53', '2017-08-15 07:38:53'),
(8, 'Huawei GR3 2017 Dual SIM Smartphone 16GB – Black', 'Key Features\r\n\r\n    Octa Core 2.1 GHz Processor\r\n    5.2\" FHD IPS 2.5D curved glass at 424 PPI\r\n    3 GB RAM, 16 GB ROM expandable via micro SD card slot up to 128 GB\r\n    12 MP Back Camera, 8 MP Front Camera\r\n    Android 7.0 Nougat Operating System\r\n    3000mAh Battery', 19900.00, 10.00, 0.00, 1, 3, 1.00, 3, 10.00, 'jpg', 'jpg', 'jpg', 1, '2017-08-15 07:42:30', '2017-08-15 07:42:30'),
(9, 'Smartphone 8GB - Golden', 'Key Features\r\n\r\n    Octa Core 1.2 GHz Processor\r\n    8 GB ROM, 2 GB RAM\r\n    5.5 inches IPS LCD capacitive touchscreen\r\n    Front 13MP and Secondary 5MP Camera\r\n    Android Operating System\r\n    Li-Ion 3000mAh battery', 12990.00, 0.00, 0.00, 1, 3, 1.00, 3, 10.00, 'jpg', 'jpg', 'jpg', 1, '2017-08-15 07:44:16', '2017-08-15 07:44:16'),
(11, 'Long Panjabi - Brown', 'About O2  \r\nFrom the last Eleven years,02 is known for launching its design by its unique collections. O2 offers all the latest men\'s and women\'s apparel, footwear, jeans, underwear and accessories.\r\nKey Features\r\n\r\n    Product Type: Long Panjabi\r\n    Color: Brown\r\n    Main Material: Silk\r\n    Style:\r\n    Gender: Men', 5040.00, 10.00, 0.00, 2, 4, 0.00, 3, 10.00, 'jpg', 'jpg', 'jpg', 1, '2017-08-15 07:48:56', '2017-08-15 07:48:56'),
(12, 'Envy Khadi Ethnic Vest - Blue', 'About O2  \r\nFrom the last Eleven years,02 is known for launching its design by its unique collections. O2 offers all the latest men\'s and women\'s apparel, footwear, jeans, underwear and accessories.\r\nKey Features\r\n\r\n    Product Type: Ethnic Vest\r\n    Color: Blue\r\n    Main Material: Khadi\r\n    Style: Casual\r\n    Gender: Men', 57775.00, 10.00, 0.00, 2, 4, 1.00, 3, 20.00, 'jpg', 'jpg', 'jpg', 2, '2017-08-15 07:50:41', '2017-08-15 07:50:41'),
(13, 'Twill Formal Pant For Men', 'About O CODE \r\nO CODE is a formal clothing brand set to provide luxury and elegance in your affordability.\r\nKey Features\r\n\r\n    Product type: Men\'s Pant\r\n    Material: Twill\r\n    Color: Beige\r\n    Gender: Men', 1596.00, 10.00, 0.00, 1, 7, 1.00, 2, 20.00, 'jpg', 'jpg', 'jpg', 1, '2017-08-15 08:08:11', '2017-08-15 08:08:11'),
(14, 'Blue Check Poly Viscose Formal Pant For Men', 'About O CODE \r\nO CODE is a formal clothing brand set to provide luxury and elegance in your affordability.\r\nKey Features\r\n\r\n    Product type: Men\'s Pant\r\n    Material: Poly Viscose\r\n    Color: Blue Check\r\n    Gender: Men', 1500.00, 10.00, 55.00, 2, 7, 1.00, 5, 10.00, 'jpg', 'jpg', 'jpg', 1, '2017-08-15 08:09:32', '2017-08-15 08:09:32'),
(15, 'Grey Poly Viscose Formal Pant For Men', 'About O CODE \r\nO CODE is a formal clothing brand set to provide luxury and elegance in your affordability.\r\nKey Features\r\n\r\n    Product type: Men\'s Pant\r\n    Material: Poly Viscose\r\n    Color: Grey\r\n    Gender: Men', 1463.00, 10.00, 5.00, 2, 7, 1.00, 2, 10.00, 'jpg', 'jpg', 'jpg', 2, '2017-08-15 08:10:39', '2017-08-15 08:10:39'),
(16, 'Green Silk Jamdani Sharee For Women', 'Saree is the most popular and traditional dress among the women in the subcontinent. Among all types of material used to make saree \"Benarashi Silk\" is one of the expensive and gorgeous material of all.\r\n\r\nAbout Benarashi World\r\nInspired by fashion and innovation, Benarashi World is redefining the Saree trend in Bangladesh. With a balance of current fashion, timeless designs and relentless quality, Benarashi World stands apart. Each garment is expertly designed, constructed and matched with the human body shape and thus enhance what makes you beautiful! We believe strongly in honoring tradition, at the same time promoting the designs of tomorrow.\r\nWith daraz, the seller comes closer to the huge consumers of all over Bangladesh, and serving to the greater extend for achieving higher customer satisfaction. The brands working with daraz are not only serving top class products but also are dedicated to acquire brand loyalty !', 3600.00, 10.00, 0.00, 1, 8, 10.00, 2, 10.00, 'jpg', 'jpg', 'jpg', 1, '2017-08-15 08:12:44', '2017-08-15 08:12:44'),
(17, 'Sky Blue Half Silk Sharee For Women', 'Saree is the most popular and traditional dress among the women in the subcontinent. Among all types of material used to make saree \"Benarashi Silk\" is one of the expensive and gorgeous material of all.\r\n\r\nAbout Benarashi World\r\nInspired by fashion and innovation, Benarashi World is redefining the Saree trend in Bangladesh. With a balance of current fashion, timeless designs and relentless quality, Benarashi World stands apart. Each garment is expertly designed, constructed and matched with the human body shape and thus enhance what makes you beautiful! We believe strongly in honoring tradition, at the same time promoting the designs of tomorrow.\r\nWith daraz, the seller comes closer to the huge consumers of all over Bangladesh, and serving to the greater extend for achieving higher customer satisfaction. The brands working with daraz are not only serving top class products but also are dedicated to acquire brand loyalty !', 2990.00, 10.00, 0.00, 1, 8, 1.00, 2, 10.00, 'jpg', 'jpg', 'jpg', 2, '2017-08-15 08:13:36', '2017-08-15 08:13:36'),
(18, 'Navy Blue Half Silk Sharee For Women', 'Saree is the most popular and traditional dress among the women in the subcontinent. Among all types of material used to make saree \"Benarashi Silk\" is one of the expensive and gorgeous material of all.\r\n\r\nAbout Benarashi World\r\nInspired by fashion and innovation, Benarashi World is redefining the Saree trend in Bangladesh. With a balance of current fashion, timeless designs and relentless quality, Benarashi World stands apart. Each garment is expertly designed, constructed and matched with the human body shape and thus enhance what makes you beautiful! We believe strongly in honoring tradition, at the same time promoting the designs of tomorrow.\r\nWith daraz, the seller comes closer to the huge consumers of all over Bangladesh, and serving to the greater extend for achieving higher customer satisfaction. The brands working with daraz are not only serving top class products but also are dedicated to acquire brand loyalty !', 3250.00, 10.00, 0.00, 1, 8, 1.00, 2, 10.00, 'jpg', 'jpg', 'jpg', 2, '2017-08-15 08:14:31', '2017-08-15 08:14:31'),
(19, 'Red Silk Sharee For Women', 'Saree is the most popular and traditional dress among the women in the subcontinent. Among all types of material used to make saree \"Benarashi Silk\" is one of the expensive and gorgeous material of all.\r\n\r\nAbout Benarashi World\r\nInspired by fashion and innovation, Benarashi World is redefining the Saree trend in Bangladesh. With a balance of current fashion, timeless designs and relentless quality, Benarashi World stands apart. Each garment is expertly designed, constructed and matched with the human body shape and thus enhance what makes you beautiful! We believe strongly in honoring tradition, at the same time promoting the designs of tomorrow.\r\nWith daraz, the seller comes closer to the huge consumers of all over Bangladesh, and serving to the greater extend for achieving higher customer satisfaction. The brands working with daraz are not only serving top class products but also are dedicated to acquire brand loyalty !', 4800.00, 10.00, 0.00, 1, 8, 1.50, 2, 10.00, 'jpg', 'jpg', 'jpg', 2, '2017-08-15 08:15:29', '2017-08-15 08:15:29'),
(20, 'Light Lemon Half Silk Sharee For Women', 'Saree is the most popular and traditional dress among the women in the subcontinent. Among all types of material used to make saree \"Benarashi Silk\" is one of the expensive and gorgeous material of all.\r\n\r\nAbout Benarashi World\r\nInspired by fashion and innovation, Benarashi World is redefining the Saree trend in Bangladesh. With a balance of current fashion, timeless designs and relentless quality, Benarashi World stands apart. Each garment is expertly designed, constructed and matched with the human body shape and thus enhance what makes you beautiful! We believe strongly in honoring tradition, at the same time promoting the designs of tomorrow.\r\nWith daraz, the seller comes closer to the huge consumers of all over Bangladesh, and serving to the greater extend for achieving higher customer satisfaction. The brands working with daraz are not only serving top class products but also are dedicated to acquire brand loyalty !', 3250.00, 10.00, 0.00, 1, 8, 1.00, 2, 10.00, 'jpg', 'jpg', 'jpg', 3, '2017-08-15 08:16:23', '2017-08-15 08:16:23'),
(21, 'Yellow Silk Sharee For Women', 'Saree is the most popular and traditional dress among the women in the subcontinent. Among all types of material used to make saree \"Benarashi Silk\" is one of the expensive and gorgeous material of all.\r\n\r\nAbout Benarashi World\r\nInspired by fashion and innovation, Benarashi World is redefining the Saree trend in Bangladesh. With a balance of current fashion, timeless designs and relentless quality, Benarashi World stands apart. Each garment is expertly designed, constructed and matched with the human body shape and thus enhance what makes you beautiful! We believe strongly in honoring tradition, at the same time promoting the designs of tomorrow.\r\nWith daraz, the seller comes closer to the huge consumers of all over Bangladesh, and serving to the greater extend for achieving higher customer satisfaction. The brands working with daraz are not only serving top class products but also are dedicated to acquire brand loyalty !', 4000.00, 10.00, 0.00, 1, 8, 10.00, 1, 0.00, 'jpg', 'jpg', 'jpg', 2, '2017-08-15 08:18:34', '2017-08-15 08:18:34'),
(22, 'Multicolor Silk Katan Sharee For Women', 'Saree is the most popular and traditional dress among the women in the subcontinent. Among all types of material used to make saree \"Benarashi Silk\" is one of the expensive and gorgeous material of all.\r\n\r\nAbout Benarashi World\r\nInspired by fashion and innovation, Benarashi World is redefining the Saree trend in Bangladesh. With a balance of current fashion, timeless designs and relentless quality, Benarashi World stands apart. Each garment is expertly designed, constructed and matched with the human body shape and thus enhance what makes you beautiful! We believe strongly in honoring tradition, at the same time promoting the designs of tomorrow.\r\nWith daraz, the seller comes closer to the huge consumers of all over Bangladesh, and serving to the greater extend for achieving higher customer satisfaction. The brands working with daraz are not only serving top class products but also are dedicated to acquire brand loyalty !', 3650.00, 10.00, 0.00, 1, 8, 1.00, 2, 12.00, 'jpg', 'jpg', 'jpg', 1, '2017-08-15 08:20:01', '2017-08-15 08:20:01'),
(23, 'Dark Green Half Silk Sharee For Women', 'Saree is the most popular and traditional dress among the women in the subcontinent. Among all types of material used to make saree \"Benarashi Silk\" is one of the expensive and gorgeous material of all.\r\n\r\nAbout Benarashi World\r\nInspired by fashion and innovation, Benarashi World is redefining the Saree trend in Bangladesh. With a balance of current fashion, timeless designs and relentless quality, Benarashi World stands apart. Each garment is expertly designed, constructed and matched with the human body shape and thus enhance what makes you beautiful! We believe strongly in honoring tradition, at the same time promoting the designs of tomorrow.\r\nWith daraz, the seller comes closer to the huge consumers of all over Bangladesh, and serving to the greater extend for achieving higher customer satisfaction. The brands working with daraz are not only serving top class products but also are dedicated to acquire brand loyalty !', 2990.00, 10.00, 0.00, 1, 8, 1.00, 1, 10.00, 'jpg', 'jpg', 'jpg', 1, '2017-08-15 08:27:53', '2017-08-15 08:27:53'),
(24, 'Blue Silk Sharee For Women', 'Saree is the most popular and traditional dress among the women in the subcontinent. Among all types of material used to make saree \"Benarashi Silk\" is one of the expensive and gorgeous material of all.\r\n\r\nAbout Benarashi World\r\nInspired by fashion and innovation, Benarashi World is redefining the Saree trend in Bangladesh. With a balance of current fashion, timeless designs and relentless quality, Benarashi World stands apart. Each garment is expertly designed, constructed and matched with the human body shape and thus enhance what makes you beautiful! We believe strongly in honoring tradition, at the same time promoting the designs of tomorrow.\r\nWith daraz, the seller comes closer to the huge consumers of all over Bangladesh, and serving to the greater extend for achieving higher customer satisfaction. The brands working with daraz are not only serving top class products but also are dedicated to acquire brand loyalty !', 4200.00, 10.00, 0.00, 1, 8, 1.00, 3, 10.00, 'jpg', 'jpg', 'jpg', 1, '2017-08-15 08:34:17', '2017-08-15 08:34:17'),
(25, 'Light Magenta Half Silk Sharee For Women', 'Saree is the most popular and traditional dress among the women in the subcontinent. Among all types of material used to make saree \"Benarashi Silk\" is one of the expensive and gorgeous material of all.\r\n\r\nAbout Benarashi World\r\nInspired by fashion and innovation, Benarashi World is redefining the Saree trend in Bangladesh. With a balance of current fashion, timeless designs and relentless quality, Benarashi World stands apart. Each garment is expertly designed, constructed and matched with the human body shape and thus enhance what makes you beautiful! We believe strongly in honoring tradition, at the same time promoting the designs of tomorrow.\r\nWith daraz, the seller comes closer to the huge consumers of all over Bangladesh, and serving to the greater extend for achieving higher customer satisfaction. The brands working with daraz are not only serving top class products but also are dedicated to acquire brand loyalty !', 3250.00, 10.00, 0.00, 1, 8, 1.00, 2, 10.00, 'jpg', 'jpg', 'jpg', 1, '2017-08-15 08:35:32', '2017-08-15 08:35:32'),
(26, 'Light Blue Half Silk Sharee For Women', 'Saree is the most popular and traditional dress among the women in the subcontinent. Among all types of material used to make saree \"Benarashi Silk\" is one of the expensive and gorgeous material of all.\r\n\r\nAbout Benarashi World\r\nInspired by fashion and innovation, Benarashi World is redefining the Saree trend in Bangladesh. With a balance of current fashion, timeless designs and relentless quality, Benarashi World stands apart. Each garment is expertly designed, constructed and matched with the human body shape and thus enhance what makes you beautiful! We believe strongly in honoring tradition, at the same time promoting the designs of tomorrow.\r\nWith daraz, the seller comes closer to the huge consumers of all over Bangladesh, and serving to the greater extend for achieving higher customer satisfaction. The brands working with daraz are not only serving top class products but also are dedicated to acquire brand loyalty !', 3250.00, 10.00, 0.00, 1, 8, 10.00, 2, 10.00, 'jpg', 'jpg', 'jpg', 2, '2017-08-15 08:46:08', '2017-08-15 08:46:08'),
(27, 'LG 28\" - 28LH454A LED TV - Black', 'Key Features\r\n\r\n    Device: LED\r\n    Screen Size (cm): 28:70 cm\r\n    Resolution: HD 1366 x 768\r\n    Display Type: Flat\r\n    BackLight Module: Slim LED\r\n    Analog TV Reception: Yes', 23000.00, 10.00, 7.00, 1, 6, 1.00, 1, 10.00, 'jpg', 'jpg', 'jpg', 1, '2017-08-15 08:54:05', '2017-08-15 08:54:05'),
(28, 'Sony 40\" R352D Full HD 1080p LED TV - Black', 'Key Features\r\n\r\n    Display Size: 40\"\r\n    Display Type: Full HD LED\r\n    Display Resolution: 1920 x 1080\r\n    X-Protection PRO\r\n    Clear Resolution Enhancer\r\n    Clear Phase', 34500.00, 10.00, 35.00, 1, 6, 10.00, 2, 10.00, 'jpg', 'jpg', 'jpg', 2, '2017-08-15 08:57:28', '2017-08-15 08:57:28');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `customersid` tinyint(3) UNSIGNED NOT NULL,
  `productsid` tinyint(3) UNSIGNED NOT NULL,
  `rating` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `messege` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `review_products`
--

CREATE TABLE `review_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `users_id` int(11) DEFAULT NULL,
  `users_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `review_products`
--

INSERT INTO `review_products` (`id`, `product_id`, `users_id`, `users_email`, `user_name`, `message`, `created_at`, `updated_at`) VALUES
(1, 27, NULL, 'dvrobin4@gmail.com', 'Jean\'s', 'sfasdf', '2017-08-17 18:00:00', '2017-08-17 18:00:00'),
(2, 27, NULL, 'dvrobin4@gmail.com', 'Jean\'s', 'sfasdf', '2017-08-17 18:00:00', '2017-08-17 18:00:00'),
(3, 27, NULL, 'dvrobin4@gmail.com', 'Electronics', 'safasdf', '2017-08-17 18:00:00', '2017-08-17 18:00:00'),
(4, 27, NULL, 'r@gmail.com', 'Jean\'s', 'rgfdsgdfg', '2017-08-17 18:00:00', '2017-08-17 18:00:00'),
(5, 27, NULL, 'afasf@gami.com', 'fdgs', 'adfasd', '2017-08-18 11:40:55', NULL),
(6, 27, NULL, 'afasf@gami.com', 'fdgs', 'adfasd', '2017-08-18 11:41:01', NULL),
(7, 27, NULL, 'afasf@gami.com', 'fdgs', 'adfasd', '2017-08-18 11:41:02', NULL),
(8, 27, NULL, 'afasf@gami.com', 'fdgs', 'adfasd', '2017-08-18 11:41:03', NULL),
(9, 27, NULL, 'afasf@gami.com', 'fdgs', 'adfasd', '2017-08-18 11:41:03', NULL),
(10, 27, NULL, 'afasf@gami.com', 'fdgs', 'adfasd', '2017-08-18 11:41:03', NULL),
(11, 27, NULL, 'afasf@gami.com', 'fdgs', 'adfasd', '2017-08-18 11:41:03', NULL),
(12, 27, NULL, 'afasf@gami.com', 'fdgs', 'adfasd', '2017-08-18 11:41:04', NULL),
(13, 27, NULL, 'afasf@gami.com', 'fdgs', 'adfasd', '2017-08-18 11:41:04', NULL),
(14, 27, NULL, 'afasf@gami.com', 'fdgs', 'adfasd', '2017-08-18 11:41:04', NULL),
(15, 27, NULL, 'afasf@gami.com', 'fdgs', 'adfasd', '2017-08-18 11:41:04', NULL),
(16, 27, NULL, 'afasf@gami.com', 'fdgs', 'adfasd', '2017-08-18 11:41:04', NULL),
(17, 27, NULL, 'afasf@gami.com', 'fdgs', 'adfasd', '2017-08-18 11:41:04', NULL),
(18, 27, NULL, 'afasf@gami.com', 'fdgs', 'adfasd', '2017-08-18 11:41:05', NULL),
(19, 27, NULL, 'afasf@gami.com', 'fdgs', 'adfasd', '2017-08-18 11:41:05', NULL),
(20, 27, NULL, 'w@h.com', 'asfa', 'asdfas', '2017-08-18 11:42:06', NULL),
(21, 27, NULL, 'w@h.com', 'asfa', 'asdfas', '2017-08-18 11:42:08', NULL),
(22, 27, NULL, 'w@h.com', 'asfa', 'asdfas', '2017-08-18 11:42:08', NULL),
(23, 27, NULL, 'w@h.com', 'asfa', 'asdfas', '2017-08-18 11:42:08', NULL),
(24, 27, NULL, 'w@h.com', 'asfa', 'asdfas', '2017-08-18 11:42:08', NULL),
(25, 27, NULL, 'asdfa@h.coma', 'dfasdf', 'asdf', '2017-08-18 11:43:18', NULL),
(26, 27, NULL, 'asdfa@h.coma', 'dfasdf', 'asdf', '2017-08-18 11:43:19', NULL),
(27, 27, NULL, 'asdfa@h.coma', 'dfasdf', 'asdf', '2017-08-18 11:43:19', NULL),
(28, 27, NULL, 'asdfa@h.coma', 'dfasdf', 'asdf', '2017-08-18 11:43:19', NULL),
(29, 27, NULL, 'asdfa@h.coma', 'dfasdf', 'asdf', '2017-08-18 11:43:19', NULL),
(30, 27, NULL, 'asdfa@h.coma', 'dfasdf', 'asdf', '2017-08-18 11:43:19', NULL),
(31, 27, NULL, 'asdfa@h.coma', 'dfasdf', 'asdf', '2017-08-18 11:43:20', NULL),
(32, 27, NULL, 'asdfa@h.coma', 'dfasdf', 'asdf', '2017-08-18 11:43:20', NULL),
(33, 27, NULL, 'sdfasd@gmail.com', 'sdgfs', 'sgdfg', '2017-08-18 11:44:33', NULL),
(34, 27, NULL, 'sdfasd@gmail.com', 'sdgfs', 'sgdfg', '2017-08-18 11:44:34', NULL),
(35, 27, NULL, 'sdfasd@gmail.com', 'sdgfs', 'sgdfg', '2017-08-18 11:44:35', NULL),
(36, 27, NULL, 'sdfasd@gmail.com', 'sdgfs', 'sgdfg', '2017-08-18 11:44:35', NULL),
(37, 27, NULL, 'sdfasd@gmail.com', 'sdgfs', 'sgdfg', '2017-08-18 11:44:35', NULL),
(38, 27, NULL, 'sdfasd@gmail.com', 'sdgfs', 'sgdfg', '2017-08-18 11:44:35', NULL),
(39, 27, NULL, 'sdfasd@gmail.com', 'sdgfs', 'sgdfg', '2017-08-18 11:44:35', NULL),
(40, 27, NULL, 'sdfasd@gmail.com', 'sdgfs', 'sgdfg', '2017-08-18 11:44:36', NULL),
(41, 27, NULL, 'sdfasd@gmail.com', 'sdgfs', 'sgdfg', '2017-08-18 11:44:36', NULL),
(42, 27, NULL, 'sdfasd@gmail.com', 'sdgfs', 'sgdfg', '2017-08-18 11:44:36', NULL),
(43, 27, NULL, 'sdfasd@gmail.com', 'sdgfs', 'sgdfg', '2017-08-18 11:44:36', NULL),
(44, 27, NULL, 'sdfasd@gmail.com', 'sdgfs', 'sgdfg', '2017-08-18 11:44:36', NULL),
(45, 27, NULL, 'sdfasd@gmail.com', 'sdgfs', 'sgdfg', '2017-08-18 11:44:36', NULL),
(46, 27, NULL, 'sdfasd@gmail.com', 'sdgfs', 'sgdfg', '2017-08-18 11:44:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `shippingid` tinyint(3) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `shippingid`, `date`, `created_at`, `updated_at`) VALUES
(1, 1, '2017-08-16', NULL, NULL),
(2, 2, '2017-08-17', NULL, NULL),
(3, 2, '2017-08-17', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `salesdetail`
--

CREATE TABLE `salesdetail` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `salesid` tinyint(3) UNSIGNED NOT NULL,
  `productsid` tinyint(3) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `vat` double(4,2) NOT NULL,
  `discount` double(5,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `salesdetail`
--

INSERT INTO `salesdetail` (`id`, `salesid`, `productsid`, `quantity`, `vat`, `discount`, `created_at`, `updated_at`) VALUES
(1, 1, 27, 1, 10.00, 7.00, NULL, NULL),
(2, 2, 27, 3, 10.00, 7.00, NULL, NULL),
(3, 3, 2, 1, 10.00, 9.00, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE `shipping` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` int(11) NOT NULL,
  `usersid` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shipping`
--

INSERT INTO `shipping` (`id`, `name`, `address`, `contact`, `usersid`, `created_at`, `updated_at`) VALUES
(1, 'Sharifur Rahman', 'Panthopath, Green Road, Dhaka', 1811666560, 1, NULL, NULL),
(2, 'Jean', 'Newyork', 123456799, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `size` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'L', '2017-08-15 06:46:47', '2017-08-15 06:46:47'),
(2, 'M', '2017-08-15 06:46:51', '2017-08-15 06:46:51'),
(3, 'XL', '2017-08-15 06:46:54', '2017-08-15 06:46:54'),
(4, 'XXL', '2017-08-15 06:46:57', '2017-08-15 06:46:57'),
(5, 'SM', '2017-08-15 06:47:01', '2017-08-15 06:47:01');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `url`, `picture`, `created_at`, `updated_at`) VALUES
(2, 'http://localhost/php109/public/womens-ware/sharee/25/light-magenta-half-silk-sharee-for-women', 'jpg', '2017-08-15 09:03:44', '2017-08-15 09:03:44'),
(5, 'http://localhost/php109/public/womens-ware/sharee/24/blue-silk-sharee-for-women', 'jpg', '2017-08-15 09:09:12', '2017-08-15 09:09:12'),
(6, 'Home  Dashboard AD', 'jpg', '2017-08-15 09:50:43', '2017-08-15 09:50:43'),
(7, 'dfgdfhgdfg', 'jpg', '2017-08-15 09:51:09', '2017-08-15 09:51:09'),
(8, 'rewr', 'jpg', '2017-08-15 11:15:27', '2017-08-15 11:15:27');

-- --------------------------------------------------------

--
-- Table structure for table `socials`
--

CREATE TABLE `socials` (
  `id` int(10) UNSIGNED NOT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `youtube` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `socials`
--

INSERT INTO `socials` (`id`, `facebook`, `twitter`, `instagram`, `youtube`, `created_at`, `updated_at`) VALUES
(1, 'https://facebook.com/', 'https://facebook.com/', 'https://facebook.com/', 'https://facebook.com/', '2017-08-14 18:00:00', '2017-08-15 06:25:37');

-- --------------------------------------------------------

--
-- Table structure for table `special_offers`
--

CREATE TABLE `special_offers` (
  `id` int(10) UNSIGNED NOT NULL,
  `post_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `store_infos`
--

CREATE TABLE `store_infos` (
  `id` int(10) UNSIGNED NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `store_infos`
--

INSERT INTO `store_infos` (`id`, `address`, `email`, `phone`, `created_at`, `updated_at`) VALUES
(1, 'Address : 1234k Avenue,4th block, Newyork City.', 'dvrobin4@gmail.com', 1234567567, '2017-08-14 18:00:00', '2017-08-15 06:24:32');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categoriesid` tinyint(3) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `name`, `categoriesid`, `created_at`, `updated_at`) VALUES
(2, 'Laptops', 1, '2017-08-15 06:46:08', '2017-08-15 06:46:08'),
(3, 'Mobile', 1, '2017-08-15 06:53:40', '2017-08-15 06:53:40'),
(4, 'Panjabi', 2, '2017-08-15 07:47:38', '2017-08-15 07:47:38'),
(6, 'Tv', 1, '2017-08-15 07:55:37', '2017-08-15 07:55:37'),
(7, 'Jeans', 2, '2017-08-15 08:06:00', '2017-08-15 08:06:00'),
(8, 'Sharee', 3, '2017-08-15 08:11:48', '2017-08-15 08:11:48'),
(9, 'Special Collection', 4, '2017-08-17 10:28:49', '2017-08-17 10:28:49');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Pieces', '2017-08-15 06:46:18', '2017-08-15 06:46:18'),
(2, 'Dozzen', '2017-08-15 06:46:25', '2017-08-15 06:46:25'),
(3, 'Kg', '2017-08-15 06:46:29', '2017-08-15 06:46:29'),
(4, 'Km', '2017-08-15 06:46:33', '2017-08-15 06:46:33');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `type`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Sharifur', 'r@gmail.com', '$2y$10$294sohR2QysGiPVUZ2FQc.rb5KVbl5c7G4zOlLo4WoYxta0/.Z.He', 'admin', '1ZbafJ82TDx3JoITv7e9SK2WH0AtKQfb82IerZi3ia0yEUnZZdFllrVf7hyk', '2017-08-15 06:26:53', '2017-08-15 06:26:53'),
(2, 'MD Abdullah', 'a@gmail.com', '$2y$10$eGQAUerHiO/4Jo0w0s/Pg.sZoiV3JVBj/jaMakZaqVr0/xRdxedhS', NULL, NULL, '2017-08-17 11:15:01', '2017-08-17 11:15:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cities_countriesid_foreign` (`countriesid`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `countries_name_unique` (`name`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `coupons_code_unique` (`code`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_email_unique` (`email`),
  ADD KEY `customers_citiesid_foreign` (`citiesid`);

--
-- Indexes for table `dislikes`
--
ALTER TABLE `dislikes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dislikes_reviewsid_foreign` (`reviewsid`),
  ADD KEY `dislikes_customersid_foreign` (`customersid`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `likes_reviewsid_foreign` (`reviewsid`),
  ADD KEY `likes_customersid_foreign` (`customersid`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_title_unique` (`title`),
  ADD KEY `products_unitsid_foreign` (`unitsid`),
  ADD KEY `products_subcategoriesid_foreign` (`subcategoriesid`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_customersid_foreign` (`customersid`),
  ADD KEY `reviews_productsid_foreign` (`productsid`);

--
-- Indexes for table `review_products`
--
ALTER TABLE `review_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salesdetail`
--
ALTER TABLE `salesdetail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `salesdetail_salesid_foreign` (`salesid`),
  ADD KEY `salesdetail_productsid_foreign` (`productsid`);

--
-- Indexes for table `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `socials`
--
ALTER TABLE `socials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `special_offers`
--
ALTER TABLE `special_offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store_infos`
--
ALTER TABLE `store_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subcategories_name_categoriesid_unique` (`name`,`categoriesid`),
  ADD KEY `subcategories_categoriesid_foreign` (`categoriesid`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `units_name_unique` (`name`);

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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dislikes`
--
ALTER TABLE `dislikes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=250;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `review_products`
--
ALTER TABLE `review_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `salesdetail`
--
ALTER TABLE `salesdetail`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `shipping`
--
ALTER TABLE `shipping`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `size`
--
ALTER TABLE `size`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `socials`
--
ALTER TABLE `socials`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `special_offers`
--
ALTER TABLE `special_offers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `store_infos`
--
ALTER TABLE `store_infos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_countriesid_foreign` FOREIGN KEY (`countriesid`) REFERENCES `countries` (`id`);

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_citiesid_foreign` FOREIGN KEY (`citiesid`) REFERENCES `cities` (`id`);

--
-- Constraints for table `dislikes`
--
ALTER TABLE `dislikes`
  ADD CONSTRAINT `dislikes_customersid_foreign` FOREIGN KEY (`customersid`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `dislikes_reviewsid_foreign` FOREIGN KEY (`reviewsid`) REFERENCES `reviews` (`id`);

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_customersid_foreign` FOREIGN KEY (`customersid`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `likes_reviewsid_foreign` FOREIGN KEY (`reviewsid`) REFERENCES `reviews` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_subcategoriesid_foreign` FOREIGN KEY (`subcategoriesid`) REFERENCES `subcategories` (`id`),
  ADD CONSTRAINT `products_unitsid_foreign` FOREIGN KEY (`unitsid`) REFERENCES `units` (`id`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_customersid_foreign` FOREIGN KEY (`customersid`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `reviews_productsid_foreign` FOREIGN KEY (`productsid`) REFERENCES `products` (`id`);

--
-- Constraints for table `salesdetail`
--
ALTER TABLE `salesdetail`
  ADD CONSTRAINT `salesdetail_productsid_foreign` FOREIGN KEY (`productsid`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `salesdetail_salesid_foreign` FOREIGN KEY (`salesid`) REFERENCES `sales` (`id`);

--
-- Constraints for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD CONSTRAINT `subcategories_categoriesid_foreign` FOREIGN KEY (`categoriesid`) REFERENCES `categories` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
