-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Jul 12, 2025 at 08:56 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lumina`
--

-- --------------------------------------------------------

--
-- Table structure for table `additional_images`
--

CREATE TABLE `additional_images` (
  `id` int(255) NOT NULL,
  `product_id` int(255) NOT NULL,
  `product_image` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `additional_images`
--

INSERT INTO `additional_images` (`id`, `product_id`, `product_image`) VALUES
(15, 15, '../product_images/earrings-two.jpeg'),
(16, 15, '../product_images/earrring-one.webp');

-- --------------------------------------------------------

--
-- Table structure for table `add_product`
--

CREATE TABLE `add_product` (
  `product_id` int(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_category` varchar(255) NOT NULL,
  `product_subcategory` varchar(255) NOT NULL,
  `product_price` int(255) NOT NULL,
  `product_image` varchar(500) NOT NULL,
  `product_description` varchar(500) NOT NULL,
  `product_tag` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `add_product`
--

INSERT INTO `add_product` (`product_id`, `product_name`, `product_category`, `product_subcategory`, `product_price`, `product_image`, `product_description`, `product_tag`) VALUES
(11, 'Stylish Black Challa', 'Jewellery', 'Rings', 3000, '../product_images/challa.jpeg', 'This is an amazing black challa with premiuim quality mateiral', 'Luxury Picks'),
(12, 'Golden Challa ', 'Jewellery', 'Rings', 4000, '../product_images/golden challa.jpeg', 'This is an amaing golden challa for men', 'Luxury Picks'),
(13, 'Beautifull High Quality Men Ring', 'Jewellery', 'Rings', 500, '../product_images/ring.jpeg', 'Beautifull High Quality Men Ring  amazig premium quality', 'Luxury Picks'),
(14, 'Beautifull Necklace ', 'Jewellery', 'Necklaces', 700, '../product_images/beautifull necklace.jpeg', 'This is an awesome beautiifull necklace', ''),
(15, 'Earrings', 'Jewellery', 'Earrings', 400, '../product_images/earrings.jpeg', 'An awesome earrings pair', 'Best Sellers'),
(17, 'Luxurious Ring', 'Jewellery', 'Luxury Collection', 699, '../product_images/ring.jpeg', 'LUXIORIOUS Ring ', 'Trending'),
(18, 'Foundation', 'Cosmetics', 'Foundation', 400, '../product_images/foundation.jpeg', 'This is an amazing yellow foundation', 'Best Sellers'),
(19, 'Lipstick', 'Cosmetics', 'Lipstick', 600, '../product_images/lipstick.png', 'red lipstick', 'Best Sellers'),
(20, 'Eye Shadow', 'Cosmetics', 'Eyeshadow', 700, '../product_images/shadow.jpeg', 'An amazing Eye shadow', 'Best Sellers'),
(23, 'Face Wash New Arrivals', 'Cosmetics', 'New Arrivals', 600, '../product_images/new arrivals.jpeg', 'Amazing New arrivals', 'Best Sellers'),
(24, 'Brush', 'Beauty Tools', 'Brushes', 499, '../product_images/brushes.jpeg', 'this is an amazing brush', ''),
(26, 'Mirror', 'Beauty Tools', 'Mirrors', 500, '../product_images/long mirrors.jpeg', 'amazing long mirrors', ''),
(28, 'Golden RIng online', 'Jewellery', '', 4000, 'https://cdn.shopify.com/s/files/1/0678/2772/8663/files/MIRRORS_living_room_decoration_at_grace-international.pk_49c88c47-4e42-4158-b2ad-a0e2d759fb3e_480x480.jpg?v=1703340473', 'this is golden challa from online pic', ''),
(29, 'Bracelet', 'Jewellery', 'Bracelets', 4000, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS9TU6weKZ9X6fSLLEdivPkzuqYQ3EGs16liA&s', 'Amazing Bracelet for women', 'Best Sellers'),
(30, 'Beauty Tools ', 'Beauty Tools', 'Accessories', 4000, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSfWHoEUfzzFNE9JAPtGiWPwQ26tdQPDrLXAg&s', 'Amazing Beauty accessories', 'New Arrivals'),
(32, 'Black Maskara', 'Cosmetics', 'New Arrivals', 3000, 'https://www.goldenrose.com.pk/cdn/shop/products/dramatic-lashes-night-black-mascara-new-782213_600x600_crop_center.jpg?v=1717250135', 'this is black maskara', ''),
(33, 'Yellow Mascara', 'Cosmetics', 'New Arrivals', 899, '../product_images/yellow mascara.jpeg', 'This is yellow mascara', 'Luxury Picks');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_image` varchar(500) NOT NULL,
  `user_email` varchar(500) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`user_id`, `user_name`, `user_image`, `user_email`, `user_password`, `status`) VALUES
(3, 'admin', 'users/admin.jpeg', 'admin@gmail.com', 'admin', 'approved'),
(4, 'Mansoor', 'users/Screenshot 2025-07-06 123029.png', 'mansoor@gmail.com', '123', 'rejected');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `user_id` int(100) NOT NULL,
  `item` int(11) NOT NULL,
  `product_image` varchar(500) NOT NULL,
  `product_name` varchar(500) NOT NULL,
  `product_price` int(255) NOT NULL,
  `quantity` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `FirstName` varchar(200) NOT NULL,
  `Lastname` varchar(200) NOT NULL,
  `Email` varchar(200) NOT NULL,
  `Phnum` int(11) NOT NULL,
  `Subject` varchar(200) NOT NULL,
  `Message` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `FirstName`, `Lastname`, `Email`, `Phnum`, `Subject`, `Message`) VALUES
(9, 'Mansoor', 'Ahmed', 'mansoor@gmail.com', 311256789, 'jewelry', 'This is sample text..'),
(10, 'Farhan', 'Raza', 'farhan@gmail.com', 31222678, 'orders', 'No one can tell me what to do......'),
(11, 'Maaz', 'Ahmed', 'maaz@gmail.com', 311256789, 'jewelry', 'this is somehow questions'),
(12, 'Faizan', 'Bro', 'faizan@gmail.com', 2147483647, 'jewelry', 'nothing'),
(14, 'Rohan', 'Khan', 'rohan@gmail.com', 887868, 'orders', 'My question is regarding the order support'),
(21, 'Abdul', 'Bari', 'abdulbari@gmail.com', 98376777, 'General Inquiry', 'I am just checking that the userid session will work or not.'),
(22, 'Taha', 'ALi', 'taha08@gmail.com', 312245678, 'General Inquiry', 'this is my  general request for the inquiry of my parcel..'),
(23, 'Faizan', 'Rizvi', 'faizanrizvi@gmail.com', 987654321, 'Wholesale Inquiries', 'How do you buy the wholesales through..');

-- --------------------------------------------------------

--
-- Table structure for table `user_acc`
--

CREATE TABLE `user_acc` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_acc`
--

INSERT INTO `user_acc` (`id`, `name`, `email`, `password`) VALUES
(3, 'Waqar', 'waqar@gmail.com', 'waqar'),
(4, 'Taha', 'taha08@gmail.com', 'taha08'),
(6, 'Mehmood', 'mehmood@gmail.com', 'mehmood'),
(7, 'Hamid', 'hamid@gmail.com', '123'),
(8, 'Mehmood', 'mehmood@gmail.com', 'mehmood'),
(9, 'Faris', 'faris@gmail.com', 'faris'),
(10, 'Faris', 'faris@gmail.com', 'faris'),
(11, 'Haris', 'haris@gmail.com', 'haris'),
(12, 'Fazal', 'fazal@gmail.com', 'fazal'),
(13, 'Faizan', 'farizan@gmail.com', 'faizan'),
(14, 'Rohan', 'rohan@gmail.com', 'rohan123'),
(15, 'Sarfaraz', 'sarfaraz@gmail.com', '123'),
(16, 'Murshid', 'murshid@gmail.com', '123'),
(17, 'Arib', 'arib@gmail.com', 'arib'),
(18, 'Rahil', 'rahil@gmail.com', 'rahil123'),
(19, 'Mansoor', 'mansoorahmed123@gmail.com', 'mansoor');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `product_image` text DEFAULT NULL,
  `product_price` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `user_id`, `product_name`, `product_image`, `product_price`, `quantity`) VALUES
(28, 5, 'Blue Stone RIng', '../product_images/blue ring.jpeg', 500, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `additional_images`
--
ALTER TABLE `additional_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_product_id` (`product_id`);

--
-- Indexes for table `add_product`
--
ALTER TABLE `add_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`item`),
  ADD KEY `user_acc` (`user_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_acc`
--
ALTER TABLE `user_acc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `additional_images`
--
ALTER TABLE `additional_images`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `add_product`
--
ALTER TABLE `add_product`
  MODIFY `product_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `user_acc`
--
ALTER TABLE `user_acc`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `additional_images`
--
ALTER TABLE `additional_images`
  ADD CONSTRAINT `fk_product_id` FOREIGN KEY (`product_id`) REFERENCES `add_product` (`product_id`) ON DELETE CASCADE;

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `user_acc` FOREIGN KEY (`user_id`) REFERENCES `user_acc` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
