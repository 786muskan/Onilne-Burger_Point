-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 09, 2025 at 02:01 PM
-- Server version: 8.3.0
-- PHP Version: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `burgerwurger`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `id` int NOT NULL AUTO_INCREMENT,
  `customer_id` int NOT NULL,
  `product_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `customer_id` (`customer_id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `description` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `status` enum('available','not-available') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'available',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `status`) VALUES
(1, 'Burgers', 'A burger is made with a cooked patty, placed inside a sliced bun. It is commonly topped with ingredi', 'available'),
(2, 'French-Fries', 'French fries are thinly sliced potatoes that are deep-fried and are typically seasoned with salt ', 'available'),
(3, 'Cold Drink', 'A cold drink is a chilled beverage served at a low temperature, often enjoyed for its refreshing qua', 'available'),
(4, 'Ice-cream', 'Ice cream is a sweet, creamy dessert made from milk, cream, sugar, and flavorings, often churned to ', 'available');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int NOT NULL AUTO_INCREMENT,
  `order_no` varchar(7) NOT NULL,
  `user_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `order_to_user` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_no`, `user_id`) VALUES
(1, 'FMN1101', 2),
(2, 'MNO1102', 2),
(3, 'TPH4361', 2),
(4, 'ULH9031', 2),
(5, 'RFW3882', 4),
(6, 'GDQ2776', 2),
(7, 'ZRH2793', 2),
(8, 'SDY4088', 2),
(9, 'AFX0286', 4),
(10, 'NFL3682', 2),
(11, 'SDU8340', 2),
(12, 'AHR3556', 4),
(13, 'YMY4005', 2),
(14, 'XNS9607', 4),
(15, 'VTZ5915', 2);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

DROP TABLE IF EXISTS `order_details`;
CREATE TABLE IF NOT EXISTS `order_details` (
  `id` int NOT NULL AUTO_INCREMENT,
  `order_id` int NOT NULL,
  `product_id` int NOT NULL,
  `qty` int NOT NULL,
  `price` double NOT NULL,
  PRIMARY KEY (`id`),
  KEY `order_to_order_detail` (`order_id`),
  KEY `product_to_order_detail` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `qty`, `price`) VALUES
(1, 1, 1, 2, 160),
(2, 1, 5, 2, 400),
(3, 2, 8, 1, 150),
(4, 2, 2, 1, 150),
(5, 3, 8, 1, 150),
(6, 4, 2, 2, 300),
(7, 4, 1, 3, 240),
(8, 5, 2, 1, 150),
(9, 6, 3, 3, 360),
(10, 6, 9, 19, 3800),
(11, 7, 9, 4, 800),
(12, 8, 10, 4, 600),
(13, 9, 1, 8, 640),
(14, 10, 9, 1, 200),
(15, 10, 8, 1, 150),
(16, 11, 5, 1, 200),
(17, 12, 1, 2, 160),
(18, 12, 2, 3, 450),
(19, 13, 2, 1, 150),
(20, 14, 1, 1, 80),
(21, 14, 5, 2, 400),
(22, 15, 1, 1, 80),
(23, 15, 9, 1, 200);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `category_id` int NOT NULL,
  `type` enum('Vegetarian','Non-vegetarian') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `description` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `price` double NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `status` enum('available','not-available') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'available',
  PRIMARY KEY (`id`),
  KEY `cat_to_product` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `category_id`, `type`, `description`, `price`, `image`, `status`) VALUES
(1, 'Crispy Veg Burger', 1, 'Vegetarian', 'Crispy veg patty burger', 80, 'crispy veg.jpg', 'available'),
(2, 'Veggie burger with cheese', 1, 'Vegetarian', 'Veg Patty, Lettuce, Tomato(Seasonal) & Our Signature Mayo Sauce', 150, 'veg burger with cheese.jpg', 'available'),
(3, 'Chicken Makhani Burst Burger', 1, 'Non-vegetarian', '2 Crunchy Veg taco + med fries', 120, 'Chicken Makhani Burst Burger.jpg', 'available'),
(4, 'Whopper Jr Chicken', 1, 'Non-vegetarian', 'Our Signature Whopper with Flame Grilled Chicken Patty, Onions, Lettuce, Tomatoes (Seasonal), Gherkins, Creamy And Smoky Sauces', 180, 'Whopper Jr Chicken.jpg', 'available'),
(5, 'Iced Americano', 3, '', 'Our signature Arabica espresso with ice', 200, 'Iced Americano.jpg', 'available'),
(6, ' Coca Cola', 3, '', 'carbonated soft drink ', 60, 'cola.jpg', 'available'),
(7, 'Crunchy Chicken Nuggets', 2, 'Non-vegetarian', 'Tender Crunchy Chicken Nuggets Fried To Golden Brown Perfection', 100, 'Crunchy Chicken Nuggets.jpg', 'available'),
(8, 'Peri Peri Fries', 2, 'Vegetarian', 'Crispy Fries With Tangy Peri Peri Spice', 150, 'fries.jpg', 'available'),
(9, 'Fusion Oreo', 4, '', 'creamy soft ice cream and crunchy Oreo pieces', 200, 'fusion oreo.jpg', 'available'),
(10, 'Cokkie Crunch', 4, '', 'a scoop of creamy vanilla ice cream topped with crushed chocolate chip cookies, hot fudge or caramel sauce, and a dollop of whipped cream.', 150, 'cokkie crunch.jpg', 'available');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `address` varchar(100) NOT NULL,
  `type` enum('customer','admin') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'customer',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `phone`, `address`, `type`) VALUES
(1, 'Muskan', 'muskan@123.com', 'muskan', '7678909890', 'Ajmer', 'admin'),
(2, 'Sanjana', 'sanjana@06.com', 'sanjana', '8796879686', 'Ajmer', 'customer'),
(3, 'Admin', 'admin@123', 'admin123', '6578767898', 'Ajmer', 'admin'),
(4, 'muskan', 'muskan@12.com', 'muskan', '8967574657', 'ajmer', 'customer');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `order_to_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_to_order_detail` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `product_to_order_detail` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `cat_to_product` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
