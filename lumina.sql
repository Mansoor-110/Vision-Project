-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2025 at 11:12 PM
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
(23, 12, '../product_images/purple3.webp'),
(24, 12, '../product_images/purple2.webp'),
(25, 12, '../product_images/purple1.webp'),
(27, 15, '../product_images/marina3.webp'),
(28, 15, '../product_images/marina2.webp'),
(29, 15, '../product_images/marina1.webp'),
(30, 42, '../product_images/aqua3.webp'),
(31, 42, '../product_images/aqua2.webp'),
(32, 42, '../product_images/aqua1.webp'),
(33, 43, '../product_images/rubi3.webp'),
(34, 43, '../product_images/rubi2.webp'),
(35, 43, '../product_images/rubia.webp'),
(36, 44, '../product_images/atlan3.webp'),
(37, 44, '../product_images/atlan2.webp'),
(38, 44, '../product_images/altlan1.webp'),
(39, 45, '../product_images/amythest3.webp'),
(40, 45, '../product_images/amethyst2.webp'),
(41, 45, '../product_images/amethyst.webp'),
(43, 46, '../product_images/heart3.webp'),
(44, 46, '../product_images/heart2.webp'),
(45, 46, '../product_images/heart.webp'),
(46, 47, '../product_images/earnull3.webp'),
(47, 47, '../product_images/earnull2.webp'),
(48, 47, '../product_images/earnull1.webp'),
(49, 48, '../product_images/heartshape2.webp'),
(50, 48, '../product_images/heartshape1.webp'),
(51, 11, '../product_images/infinite2.webp'),
(52, 11, '../product_images/infinite1.webp'),
(53, 34, '../product_images/ultra3.webp'),
(54, 34, '../product_images/ultra2.webp'),
(55, 34, '../product_images/ultra1.webp'),
(56, 35, '../product_images/pendant2.webp'),
(57, 35, '../product_images/pendant1.webp'),
(58, 36, '../product_images/mom3.webp'),
(59, 36, '../product_images/mom2.webp'),
(60, 36, '../product_images/mom1.webp'),
(61, 37, '../product_images/will2.webp'),
(62, 37, '../product_images/will1.webp'),
(63, 38, '../product_images/traci3.webp'),
(64, 38, '../product_images/traci2.webp'),
(65, 38, '../product_images/traci1.webp'),
(66, 39, '../product_images/atoz1.webp'),
(67, 40, '../product_images/verse3.webp'),
(68, 40, '../product_images/verse2.webp'),
(69, 40, '../product_images/verse1.jpg'),
(70, 41, '../product_images/soul3.webp'),
(71, 41, '../product_images/soul2.webp'),
(72, 41, '../product_images/soul1.webp'),
(73, 13, '../product_images/joran3.webp'),
(74, 13, '../product_images/joran2.webp'),
(75, 13, '../product_images/joran1.webp'),
(76, 49, '../product_images/4-qul 3.webp'),
(77, 49, '../product_images/4-qul 2.webp'),
(78, 49, '../product_images/4-qul 1.webp'),
(79, 50, '../product_images/harf3.webp'),
(80, 50, '../product_images/harf2.webp'),
(81, 50, '../product_images/harf1.webp'),
(82, 51, '../product_images/rose3.webp'),
(83, 51, '../product_images/rose2.webp'),
(84, 51, '../product_images/rose1.webp'),
(85, 52, '../product_images/eternity 3.webp'),
(86, 52, '../product_images/eternity 2.webp'),
(87, 52, '../product_images/eternity1.webp'),
(90, 53, '../product_images/promise 3.webp'),
(91, 53, '../product_images/promise 1.webp'),
(92, 54, '../product_images/infinity 2.webp'),
(93, 54, '../product_images/infinity 1.webp'),
(94, 55, '../product_images/snake 3.webp'),
(95, 55, '../product_images/snake 2.webp'),
(96, 55, '../product_images/snake 1.webp'),
(97, 56, '../product_images/embrace.webp'),
(98, 56, '../product_images/embrace 2.webp'),
(99, 56, '../product_images/embrace 1.webp'),
(100, 29, '../product_images/elizabeth 2.webp'),
(101, 29, '../product_images/elizabeth.webp'),
(102, 58, '../product_images/galaxy.webp'),
(103, 59, '../product_images/puzzle 3.webp'),
(104, 59, '../product_images/puzzle 2.webp'),
(105, 59, '../product_images/puzzle.webp'),
(106, 60, '../product_images/spark2.webp'),
(107, 60, '../product_images/spark.webp'),
(108, 61, '../product_images/date2.webp'),
(109, 61, '../product_images/date1.webp'),
(110, 62, '../product_images/evil3.webp'),
(111, 62, '../product_images/evil2.webp'),
(112, 62, '../product_images/evil1.webp'),
(113, 63, '../product_images/heartbracelet2.webp'),
(114, 63, '../product_images/heartbracelet1.webp'),
(115, 64, '../product_images/sweet 2.webp'),
(116, 64, '../product_images/sweet1.webp'),
(117, 18, '../product_images/2f_sku_100453_1000x1000_10.avif'),
(118, 18, '../product_images/2f_sku_100453_1000x1000_2.avif'),
(119, 20, '../product_images/ey.jfif'),
(120, 20, '../product_images/eyes.jfif'),
(121, 19, '../product_images/images.jfif'),
(122, 19, '../product_images/8ed1051d5035df3a8b4f26972f53cf7494.rdeep-vertical.w245.webp'),
(123, 24, '../product_images/71Jg3I6My-L._SX466_.jpg'),
(124, 24, '../product_images/71hMtGvCnVL._SX466_.jpg'),
(125, 26, '../product_images/71oEscY7ZKL._AC_SL1500_.jpg'),
(126, 26, '../product_images/61xzMgdLj3L._AC_SX679_.jpg'),
(127, 30, '../product_images/BISP0202V01_YAA18DIG6XXXXXXXX_ABCD00-PICS-00001-1024-77203.webp'),
(128, 30, '../product_images/BISP0202V01_YAA18DIG6XXXXXXXX_ABCD00-PICS-00002-1024-77203.webp'),
(129, 32, '../product_images/dramatic-lashes-night-black-mascara-new-320818_600x.webp'),
(130, 32, '../product_images/dramatic-lashes-night-black-mascara-new-942331_600x.webp'),
(131, 33, '../product_images/bb06f66a5b44c68b9185c3c86cee853e8f8361126e2b9db17ea6c21bf64ea7aa.webp'),
(132, 33, '../product_images/d0e4d0d0c9d9c17ae90d44363a0b7d1045f2f798d9b883ccdcb4eccaa523be5a.webp'),
(133, 65, '../product_images/Makeup-For-Ever-Foundatio-Water-Blend-Face-6.jpg'),
(134, 65, '../product_images/Makeup-For-Ever-Foundatio-Water-Blend-Face-7.jpg'),
(135, 66, '../product_images/1715856915ce6a58b9b91068a2f083717679c1aa72_thumbnail_1200x_wk_sheglam.webp'),
(136, 66, '../product_images/16823177050c1c75aadacb900b99dc065807a827b2_thumbnail_1200x_wk_sheglam.webp'),
(137, 67, '../product_images/68e02f8fa4fef6d0a7e44ad3005a980e.jpg_720x720q80.jpg_.webp'),
(138, 67, '../product_images/70eeef2df0559ba76fd98db562adcc05.jpg_720x720q80.jpg_.webp'),
(139, 68, '../product_images/B00PFCSURS-4-612x612.webp'),
(140, 68, '../product_images/B00PFCSURS-10-612x612.webp'),
(141, 69, '../product_images/61kQ2fK+bcL._SL1500_.jpg'),
(142, 69, '../product_images/71poT+p9ANL._SL1500_.jpg'),
(143, 70, '../product_images/images.jfif'),
(144, 70, '../product_images/download.jfif'),
(145, 71, '../product_images/81xrBDOsDbL._AC_SX522_.jpg'),
(146, 71, '../product_images/41DsiiD8+OL._AC_SX522_.jpg'),
(147, 72, '../product_images/Foundation-Straigh-Box.png'),
(148, 72, '../product_images/makeup-studio.png'),
(149, 73, '../product_images/169020362_2900831796841691_6330528266931218736_n.jpg'),
(150, 73, '../product_images/306744061_3283714661886734_5108955057089138333_n.jpg'),
(151, 74, '../product_images/df555b57-defe-411a-8dd4-9ba6d6d72ed2.webp'),
(152, 74, '../product_images/2bd93877-f873-45cc-b0a3-45e6abd9079f.webp'),
(153, 75, '../product_images/images (1).jfif'),
(154, 75, '../product_images/6902395371601-4c8655.jpg'),
(155, 76, '../product_images/5107tH+Z2vL._SL1080_.jpg'),
(156, 76, '../product_images/714qqKtzMUL._SL1500_.jpg'),
(157, 77, '../product_images/s-l300-800x800-1.jpg'),
(158, 78, '../product_images/kck35aq4_cakes_625x300_02_June_25.webp'),
(159, 79, '../product_images/GLO.jpeg'),
(160, 80, '../product_images/11dqyM+-evL.jpg'),
(161, 81, '../product_images/how-to-apply-eyeshadow-guide.jpg'),
(162, 81, '../product_images/how-to-apply-eyeshadow-brushes.jpg'),
(163, 82, '../product_images/pexels-mart-production-7290609.jpg'),
(164, 82, '../product_images/pexels-julietberdo-14442035.jpg'),
(165, 83, '../product_images/01049_00_prod_Standard_960_d06371bb-88c4-425c-a9a1-9f4adfe9dc92_1024x1024.webp'),
(166, 83, '../product_images/4041762642899.webp'),
(167, 84, '../product_images/pexels-pnw-prod-9219006.jpg'),
(168, 84, '../product_images/pexels-freestockpro-12969252.jpg'),
(169, 85, '../product_images/Too-Faced-Born-This-Way-The-Natural-Nudes-Eye-Shadow-Palette.png'),
(170, 86, '../product_images/51GhqcEHAlL.webp'),
(171, 86, '../product_images/51GhqcEHAlL._AC_SL1001.webp'),
(172, 87, '../product_images/pexels-richard-cascaes-figueiredo-37075473-9871652.jpg'),
(173, 88, '../product_images/Too-Faced-Born-This-Way-The-Natural-Nudes-Eye-Shadow-Palette (1).png'),
(174, 89, '../product_images/SKIN1004_20-_20Madagascar_201004Day_20Signature_20Mini-Set_202024_202_800x_82d2db3c-5313-46ad-bf60-73ae7b4269df.webp'),
(175, 89, '../product_images/SKIN1004_20-_20Madagascar_201004Day_20Signature_20Mini-Set_202024_203_800x_94e041aa-16c6-408b-b9e4-f2a413eca0ee.webp'),
(176, 90, '../product_images/H6f2dc60ca84e4fbfb180633808cf8195b.webp'),
(177, 90, '../product_images/drrashel-24k-gold-radiance-anti-aging-essence-mask-pack-of-5-811643.webp'),
(178, 91, '../product_images/images (2).jfif'),
(179, 91, '../product_images/download (1).jfif'),
(180, 92, '../product_images/IMG-1444.jfif'),
(181, 92, '../product_images/2de3449c-61f9-4af8-ba7f-f54f76685be8_1.webp'),
(182, 93, '../product_images/SP1.jpg'),
(183, 93, '../product_images/SP-1707x2048.jpg'),
(184, 94, '../product_images/Hemani Anti Mark Cream Blemish Less 50ml in pakistan-2-500x554.jpg'),
(185, 94, '../product_images/Hemani Anti Mark Cream Blemish Less 50ml in pakistan-1-500x554.jpg'),
(186, 95, '../product_images/images (4).jfif'),
(187, 95, '../product_images/images (3).jfif'),
(188, 96, '../product_images/c750afdb8c7ddf0769ea6a3dac7e02b1.jpg_720x720q80.jpg_.webp'),
(189, 97, '../product_images/Ponds-Bright-Beauty-Day-Cream-50gm-min.png.webp'),
(190, 97, '../product_images/Ponds BB cream1-1100x1100.jpg.webp'),
(191, 98, '../product_images/images (6).jfif'),
(192, 98, '../product_images/images (5).jfif'),
(193, 99, '../product_images/ur-glam-tokyo-girls-collection-duo-eyebrowspoolie-makeup-brush-177613.webp'),
(194, 99, '../product_images/ur-glam-tokyo-girls-collection-duo-eyebrowspoolie-makeup-brush-693313.webp'),
(195, 100, '../product_images/for-your-beauty-professional-strobe-shine-makeup-brushes-623283.webp'),
(196, 100, '../product_images/for-your-beauty-professional-strobe-shine-makeup-brushes-922260.webp'),
(197, 101, '../product_images/branded-professional-makeup-brushes-by-weight-ultra-soft-available-in-kgs-960544.webp'),
(198, 102, '../product_images/download (2).jfif'),
(199, 103, '../product_images/natural-maker-7-piece-professional-makeup-brush-set-with-black-travel-pouch-571300.webp'),
(200, 104, '../product_images/lg_yRA1f2yOGE0G0upqIWFGwefuOOwq8ON1ugApSwM3.jpg'),
(201, 104, '../product_images/lg_Uq1QrQHrvRkUenVkeEiktfDOUb6anHSN4fXscJ9A.jpg'),
(202, 105, '../product_images/enina-blossom-beauty-12-piece-makeup-brush-set-713106.webp'),
(203, 106, '../product_images/5177qNx86jL._AC_SX679_.jpg'),
(204, 106, '../product_images/51b3SN+XuuL._AC_SX679_.jpg'),
(205, 107, '../product_images/387501253_1835146956920656_7302521472707516053_n-min.webp'),
(206, 107, '../product_images/400455886_899246964915433_6413279558357232690_n-min.webp'),
(207, 108, '../product_images/hot1719981313306.jpg'),
(208, 108, '../product_images/hot1719980971127.jpg'),
(209, 109, '../product_images/b9910b0995b5982e458aba7ff8d8a6aa.webp'),
(210, 109, '../product_images/18484090712029333433.webp'),
(211, 110, '../product_images/Jewelry-Cabinet-With-Led-Mirror-SA2405-72-Apricot-2037.webp'),
(212, 110, '../product_images/Jewelry-Cabinet-With-Led-Mirror-SA2405-72-Apricot-4401.webp'),
(213, 111, '../product_images/Rotatable-Black-Vanity-Mirror-5508-Round-SA2405-160-Apricot-2374.webp'),
(214, 111, '../product_images/Rotatable-Black-Vanity-Mirror-5508-Round-SA2405-160-Apricot-9823.webp'),
(215, 112, '../product_images/81oqdS+ttIL._AC_SX679_.jpg'),
(216, 112, '../product_images/51szIS7DKQL._AC_SX679_.jpg'),
(217, 113, '../product_images/1672113463531c5a897140e6ca6280647bf255381d.webp'),
(218, 113, '../product_images/1672113463cbba6e6f9560ce091265dfb91f0f43cd.webp'),
(219, 114, '../product_images/pexels-ds-stories-7256160.jpg'),
(220, 115, '../product_images/images (7).jfif'),
(221, 116, '../product_images/images (8).jfif'),
(222, 117, '../product_images/pexels-jhong-pascua-1062908-3018845.jpg'),
(223, 118, '../product_images/photo-1596462502278-27bfdc403348.avif'),
(224, 119, '../product_images/images (9).jfif'),
(225, 120, '../product_images/pexels-devin-brown-254415220-13307114.jpg'),
(226, 120, '../product_images/pexels-mart-production-7290735.jpg'),
(227, 121, '../product_images/160556217-natural-cosmetics-for-winter-make-up-at-blue-background.jpg'),
(228, 121, '../product_images/77761776-brush-and-cosmetic-isolated-on-a-white-background-top-view.jpg');

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
(11, 'Infinite Whisper', 'Jewellery', 'Necklaces', 5999, '../product_images/m.webp', 'The Infinite Whisper necklace', 'Luxury Picks'),
(12, 'PURPLE AMETHYST', 'Jewellery', 'Earrings', 4000, '../product_images/r.png', 'Elegant purple earrings', 'Luxury Picks'),
(13, 'The Joran Ring', 'Jewellery', 'Rings', 1499, 'https://thegracepk.com/cdn/shop/products/16004a7d-aed4-4fad-b345-a1162c0987d4.jpg?v=1674476273&width=700', 'Handmade item', 'Best Sellers'),
(15, 'MARINA STUD ', 'Jewellery', 'Earrings', 4999, '../product_images/rr.jpg', 'An awesome earrings pair', 'Best Sellers'),
(18, 'Foundation', 'Cosmetics', 'Foundation', 400, 'https://www.toofaced.com/media/export/cms/products/1000x1000/2f_sku_100453_1000x1000_0.jpg', 'This is an amazing yellow foundation', 'Best Sellers'),
(19, 'Lipstick', 'Cosmetics', 'Lipstick', 600, '../product_images/pexels-valeriya-850801.jpg', 'Red elegant decent lipstick', 'Best Sellers'),
(20, 'Eye Shadow', 'Cosmetics', 'Eyeshadow', 700, '../product_images/shadow.jpeg', 'An amazing Eye shadow', 'Best Sellers'),
(24, 'Fish-Shaped ', 'Beauty Tools', 'Brushes', 499, 'https://lotshop.pk/cdn/shop/files/fish-shaped-mermaid-foundation-applying-makeup-brush-307485.jpg?v=1719858427&width=713', 'this is an amazing brush', ''),
(26, 'Mirror', 'Beauty Tools', 'Mirrors', 500, '../product_images/long mirrors.jpeg', 'amazing long mirrors', ''),
(29, 'Bracelet', 'Jewellery', 'Bracelets', 4000, 'https://thegracepk.com/cdn/shop/products/BISP0202V01_YAA18DIG6XXXXXXXX_ABCD00-PICS-00000-1024-8319.webp?v=1674476567&width=800', 'Amazing Bracelet for women', 'Best Sellers'),
(30, 'Beauty Tools ', 'Beauty Tools', 'Accessories', 4000, '../product_images/pexels-lina-5731813.jpg', 'Amazing Beauty accessories', 'New Arrivals'),
(32, 'Black Maskara', 'Cosmetics', 'New Arrivals', 3000, 'https://www.goldenrose.com.pk/cdn/shop/products/dramatic-lashes-night-black-mascara-new-782213_600x600_crop_center.jpg?v=1717250135', 'this is black maskara', ''),
(33, 'Yellow Mascara', 'Cosmetics', 'New Arrivals', 899, '../product_images/yellow mascara.jpeg', 'This is yellow mascara', 'Luxury Picks'),
(34, 'Ultramarine Necklace', 'Jewellery', 'Necklaces', 3499, '../product_images/m1.webp', 'Sterling silver can be worn in the shower', 'Trending'),
(35, 'Rhyah Peridot Pendant', 'Jewellery', 'Necklaces', 3990, '../product_images/m4.png', 'Avoid direct contact with perfumes, sprays,', 'Trending'),
(36, 'Motherly Love Necklace', 'Jewellery', 'Necklaces', 3399, '../product_images/m2.png', 'Mother\'s Love Is Peace', 'Best Sellers'),
(37, 'Willodean Necklace', 'Jewellery', 'Necklaces', 3599, '../product_images/m3.png', ' luxury signature Grace', ''),
(38, ' Traci Necklace', 'Jewellery', 'Necklaces', 3399, '../product_images/m5.webp', 'luxury Item', 'Luxury Picks'),
(39, 'A to Z Dangle Letter', 'Jewellery', 'Necklaces', 3899, '../product_images/m6.jpg', 'simple elegant summer layering jewelry.', 'New Arrivals'),
(40, 'AYAT UL KURSI', 'Jewellery', 'Necklaces', 2199, '../product_images/m7.jpg', 'Engraved in the most elegant manner, ', ''),
(41, 'Soul Kin Necklace', 'Jewellery', 'Necklaces', 3299, '../product_images/m8.jpg', 'siblings, or loved ones,', ''),
(42, 'AQUAMARINE ZIRCON', 'Jewellery', 'Earrings', 3599, '../product_images/r6.jpg', 'A pair of Aquamarine Zircon Earrings', ''),
(43, 'RUBY STUD EARRINGS', 'Jewellery', 'Earrings', 3599, '../product_images/r7.jpg', 'A pair of Ruby Diamond Earring', ''),
(44, 'ATLANTIS EMERALD DIAMOND', 'Jewellery', 'Earrings', 3299, '../product_images/r4.png', 'A pair of Atlantis Emerald and Diamond Earrings', ''),
(45, 'Amethyst Elegance Hoop', 'Jewellery', 'Earrings', 2999, '../product_images/r1.png', 'EARINGS Made with Pure SILVER', 'New Arrivals'),
(46, 'HEART EARRINGS', 'Jewellery', 'Earrings', 3299, '../product_images/r8.jpg', 'Coated with Rhodium for durability', 'Trending'),
(47, ' Farnell Stud Earrings', 'Jewellery', 'Earrings', 1999, '../product_images/r9.jpg', 'Coated with Rhodium for durability', ''),
(48, 'HEART SHAPED EARRING', 'Jewellery', 'Earrings', 3599, '../product_images/r0.jpg', 'A pair of Heart shaped Earrings', ''),
(49, '4-QUL SPIRAL RING', 'Jewellery', 'Rings', 2299, 'https://thegracepk.com/cdn/shop/products/4-Qul-Spiral-Ring---BLK---RG---CLOSE-UP_1_1800x1800_ecb8a2a6-a272-42dc-b474-2d3e633a2eb7.webp?v=1678536729&width=800', 'Al-Kafirun, Al-Ikhlas, Al-Falaq,', 'Trending'),
(50, 'Harf-e-Ishq', 'Jewellery', 'Rings', 1599, 'https://thegracepk.com/cdn/shop/files/ChatGPTImageJul1_2025_04_53_04PM.png?v=1751376623&width=800', 'Harf-e-Ishq is where delicate design ', ''),
(51, 'Ruby Rose', 'Jewellery', 'Rings', 5999, 'https://thegracepk.com/cdn/shop/files/BIPM0017R17_WAA18DIG4GARNXXXX_ABCD00-BP-PICS-00000-1024-71139.webp?v=1751975839&width=800', 'A regal masterpiece crafted to captivate.', ''),
(52, 'ETERNITY DIAMOND', 'Jewellery', 'Rings', 2999, 'https://thegracepk.com/cdn/shop/products/Rhonda-11x8mmEmerald_5.5x4x3mmStepCutTraperzoids-18kYG-Size8-1_1050x1400_c91428b4-5100-4287-aaa7-f8aacf89e313.jpg?v=1709038779&width=800', 'Handmade item', ''),
(53, 'Promise Aquamarine Ring', 'Jewellery', 'Rings', 2499, 'https://thegracepk.com/cdn/shop/products/il_794xN.1654558311_s99r.jpg?v=1637064534&width=700', 'Gemstone: Aquamarine', ''),
(54, 'INFINITY LOVE RING', 'Jewellery', 'Rings', 2999, 'https://thegracepk.com/cdn/shop/products/6979db7e-35a4-40a9-84e2-1a2a2657e28a.jpg?v=1674476327&width=700', 'Materials: Sterling Silver ', ''),
(55, 'The Snake Ring', 'Jewellery', 'Rings', 3299, 'https://thegracepk.com/cdn/shop/files/BIJP0630R281_YAA18SYBSXXXXXXXX_ABCD00-BP-PICS-00001-1024-71118.webp?v=1735224269&width=800', 'its luxurious appeal,', ''),
(56, ' Love Embrace Ring', 'Jewellery', 'Rings', 3199, 'https://thegracepk.com/cdn/shop/products/BIPM0050R03_YAA18DIG6XXXXXXXX_ABCD00-PICS-00002-1024-11946.webp?v=1663934620&width=800', '925 STERLING SILVER (CHANDI)', ''),
(57, 'Soul Script Bracelet', 'Jewellery', 'Bracelets', 3599, 'https://thegracepk.com/cdn/shop/files/May2_2025_05_33_41PM.png?v=1746190256&width=800', ' A symbol of elegance and sentiment.', ''),
(58, 'Galaxy Bracelet ', 'Jewellery', 'Bracelets', 2999, 'https://thegracepk.com/cdn/shop/products/il_794xN.3390133526_jpif.jpg?v=1639763346&width=700', 'Inspired by the light that the stars ', 'New Arrivals'),
(59, 'Puzzle Bracelet', 'Jewellery', 'Bracelets', 4999, 'https://thegracepk.com/cdn/shop/files/IMG-1961.webp?v=1706279468&width=700', 'Introducing the Puzzle Bracelet – a unique ', 'Luxury Picks'),
(60, 'Serene Spark Initial ', 'Jewellery', 'Bracelets', 3999, 'https://thegracepk.com/cdn/shop/files/abbott-lyon-birthstone-little-luxe-letter-bracelet-gold-27944780660802_935x1056_crop_center_e0d166cb-ae5b-4fc7-813f-1da8e1359718.webp?v=1745844675&width=800', 'symbol of elegance and sentiment. ', ''),
(61, 'Diamond Date-Number', 'Jewellery', 'Bracelets', 2499, 'https://thegracepk.com/cdn/shop/files/il_794xN.3448725430_8mx4.webp?v=1693057356&width=700', 'Name Bracelet is the perfect gift ', ''),
(62, 'EYE OF EVIL BRACELET', 'Jewellery', 'Bracelets', 4999, 'https://thegracepk.com/cdn/shop/products/ezgif-1-3393bde739.jpg?v=1647350269&width=800', 'Handmade item', ''),
(63, 'The Heart Bracelet', 'Jewellery', 'Bracelets', 2599, 'https://thegracepk.com/cdn/shop/products/BINK0126V02_YAA18DIG6XXXXXXXX_ABCD00-PICS-00001-1024-20998.webp?v=1663927988&width=800', '925 STERLING SILVER (CHANDI)', ''),
(64, 'The Sweet Rhythm ', 'Jewellery', 'Bracelets', 2799, 'https://thegracepk.com/cdn/shop/products/BIVT0037V05_WAA18DIG6XXXXXXXX_ABCD00-PICS-00001-1024-11663.webp?v=1663929693&width=800', 'Handmade item', ''),
(65, 'Face & Body Foundation', 'Cosmetics', 'Foundation', 2599, ' https://cutish.pk/wp-content/uploads/2020/09/Makeup-For-Ever-Foundatio-Water-Blend-Face-2.jpg', 'Water Blend Face & Body foundation ', ''),
(66, 'High Coverage Foundation', 'Cosmetics', 'Foundation', 3599, 'https://m.media-amazon.com/images/I/51b5DqELyRL._SL1500_.jpg', 'Becute Cosmetics High Coverage Foundation', ''),
(67, 'Professional Makeup Foundation', 'Cosmetics', 'Foundation', 1999, 'https://m.media-amazon.com/images/I/511zi6VylSL._SL1500_.jpg', 'This foundation blends effortlessly', ''),
(68, ' PORELESS FOUNDATION', 'Cosmetics', 'Foundation', 3999, 'https://cosmeticplanetpk.com/wp-content/uploads/2016/01/FIT-ME-MATTE.png', '24 Hour Oil Control  Foundation ', ''),
(69, 'Liquid Foundation', 'Cosmetics', 'Foundation', 2899, 'https://www.paccosmetics.com/cdn/shop/files/8904341204276_IMG.main.jpg?v=1742281316&width=600', 'This foundation provides a second-skin feel', ''),
(70, 'Makeup Beauty Splash', 'Cosmetics', 'Foundation', 2499, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRiBcYqsFxBX34h7fkrSEAKgT5uzzZgRw6yXg&s', 'liquid foundation makeup beauty splash ', ''),
(71, 'Foundation Makeup Shade', 'Cosmetics', 'Foundation', 4999, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT-ylPZYNcB9apbdIdDOw5FHovCK-LEgFhphg&s', ' Free Dermatologically and Clinically Tested', ''),
(72, 'Gold Pro Filter Foundation', 'Cosmetics', 'Foundation', 5499, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRl7GiErisbp9GyLKCkPEug8IQiywr4qxkI5g&s', 'This professional-grade foundation', 'Best Sellers'),
(73, 'Glamorous Lipstick', 'Cosmetics', 'Lipstick', 1499, 'https://www.sweetface.com.pk/cdn/shop/files/01_f9ea1066-e3e4-424f-af53-7f73fa149658.jpg?v=1734606518&width=823', 'longevity with SweetFace Queen Lipstick', ''),
(74, 'Pure Color Matte Lipstick', 'Cosmetics', 'Lipstick', 999, 'https://media.ulta.com/i/ulta/2604695?w=400&fmt=auto', 'This long lasting lipstick saturates lips ', ''),
(75, 'Maybelline Color Lipstick', 'Cosmetics', 'Lipstick', 899, 'https://beautypouch.pk/cdn/shop/products/Maybelline-Color-Show-Lipstick-Party-Pink-108.webp?v=1667858707&width=713', 'Shades stay true without drying out your lips', ''),
(76, ' Lips Long Stay Matte Lipstick', 'Cosmetics', 'Lipstick', 599, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSzX96NT5eXMFeIm7vnpznsHAJL1QBrV-DLbg&s', ' love bullet matte lipsticks', ''),
(77, ' Halal Velvet Matte ', 'Cosmetics', 'Lipstick', 1299, '../product_images/pexels-ebru-akal-1512857-12606864.jpg', ' every day with a premium', ''),
(78, 'Matte Cream Lipstick', 'Cosmetics', 'Lipstick', 579, '../product_images/pexels-suzyhazelwood-2533266.jpg', 'luxurious Matte Cream Lipstick', ''),
(79, 'Priming Matte Lipstick ', 'Cosmetics', 'Lipstick', 599, '../product_images/pexels-suzyhazelwood-1213558.jpg', 'Huda Kattan\'s comfort-wear formula ', ''),
(80, 'ishak-ektiren', 'Cosmetics', 'Lipstick', 799, '../product_images/pexels-ishak-ektiren-327147089-27421762.jpg', 'Comfort Transfer-proof Lipstick', ''),
(81, 'The New Nude Eyeshadow', 'Cosmetics', 'Eyeshadow', 3999, '../product_images/pexels-828860-2639947.jpg', 'A game-changing palette', ''),
(82, 'EYESHADOW MAKEUP ', 'Cosmetics', 'Eyeshadow', 2999, '../product_images/pexels-magda-ehlers-pexels-1339340.jpg', 'Professional Makeup Artist and for beginners', ''),
(83, 'Colorful Makeup Palettes Brushes', 'Cosmetics', 'Eyeshadow', 2599, '../product_images/pexels-michael-obstoj-1772571864-32388553.jpg', 'Eye Shadow And Blush On Palette', ''),
(84, 'Holding an Eye Shadow ', 'Cosmetics', 'Eyeshadow', 799, '../product_images/pexels-mariacamila-7712432.jpg', 'Holding an Eye Shadow PALLATE', ''),
(85, 'Butterfly dream makeup', 'Cosmetics', 'Eyeshadow', 5599, '../product_images/pexels-pnw-prod-9219006.jpg', 'Matte And Shimmer Eye Shadow ', ''),
(86, 'Wet & Dry Eyeshadow', 'Cosmetics', 'Eyeshadow', 1299, 'https://images.pexels.com/photos/354962/pexels-photo-354962.jpeg', ' OCTYLDODECYL STEAROYL STEARATE', ''),
(87, ' Huda Beauty Brown ', 'Cosmetics', 'Eyeshadow', 2399, '../product_images/pexels-richard-cascaes-figueiredo-37075473-9871630.jpg', 'delicious brown eyeshadow palettes ', ''),
(88, 'MAEPEOR Jam', 'Cosmetics', 'Eyeshadow', 3599, '../product_images/pexels-pnw-prod-9219006.jpg', 'The MAEPEOR has more choice colorful ', ''),
(89, 'SKIN1004 Madagascar', 'Cosmetics', 'Skincare', 2299, 'https://cozmetica.pk/cdn/shop/files/SKIN1004_20-_20Madagascar_201004Day_20Signature_20Mini-Set_202024_800x_0c4b0e11-67c9-4f55-a477-0323a98adfb2.webp?v=1748525706&width=1426', 'A Mini Set that combines ', ''),
(90, 'Gold Radiance', 'Cosmetics', 'Skincare', 1299, 'https://cozmetica.pk/cdn/shop/products/10.jpg?v=1699332533&width=1426', 'The Nutrients are rich', ''),
(91, 'Zombie Pack ', 'Cosmetics', 'Skincare', 2299, 'https://cozmetica.pk/cdn/shop/products/0005541_rice-in-youth-face-cream_1500.jpg?v=1699344695&width=1426', 'An 8-in-1 full-face TREATMENT MASK', ''),
(92, 'The Ordinary Hyaluronic ', 'Cosmetics', 'Skincare', 4699, 'https://cozmetica.pk/cdn/shop/products/TheOrdinaryHyaluronicAcid2_B5Cozmetica.jpg?v=1699376231&width=1426', 'Suitable for all skin types', ''),
(93, 'The Ordinary Vitamin C', 'Cosmetics', 'Skincare', 2299, 'https://cozmetica.pk/cdn/shop/products/vitamin-c_6fe9d67f-4cea-4546-99f5-966f3b506bbe.jpg?v=1699376329&width=1426', 'A water- and silicone-free ', ''),
(94, 'L\'Oreal Serum', 'Cosmetics', 'Skincare', 1299, 'https://cozmetica.pk/cdn/shop/products/0003136_anti-mark-cream-blemish-less.jpg?v=1699342340&width=1426', 'minute 1 unit is sold in the US.', ''),
(95, 'Fade Out Cream', 'Cosmetics', 'Skincare', 4299, 'https://cozmetica.pk/cdn/shop/products/0003020_fade-out-cream.jpg?v=1699343097&width=1426', '• Enhances the cell renewal process', ''),
(96, 'Nyx Soft Matte Lip ', 'Cosmetics', 'Skincare', 4599, 'https://cozmetica.pk/cdn/shop/products/SOFTMATTELIPCREAM-ABUDHABI.jpg?v=1735744083&width=1426', 'Delightfully creamy', ''),
(97, 'Ponds Bright Beauty ', 'Cosmetics', 'Skincare', 4599, 'https://cozmetica.pk/cdn/shop/files/Hero_e02ee322-898d-477f-b8fb-7f17f380019d.webp?v=1738846643&width=1426', 'Gives radiant, glowing skin', ''),
(98, 'DUcare Kabuki', 'Beauty Tools', 'Brushes', 1299, 'https://lotshop.pk/cdn/shop/files/ducare-kabuki-flat-foundation-makeup-brush-430211.webp?v=1719858369&width=713', 'Experience Flawless Coverage ', ''),
(99, 'GLAM Tokyo Girls', 'Beauty Tools', 'Brushes', 999, 'https://lotshop.pk/cdn/shop/files/ur-glam-tokyo-girls-collection-duo-eyebrowspoolie-makeup-brush-526945.jpg?v=1719858364&width=1100', 'eyebrow brush for defining and shaping,', ''),
(100, 'Beauty Professional', 'Beauty Tools', 'Brushes', 1499, 'https://lotshop.pk/cdn/shop/files/for-your-beauty-professional-strobe-shine-makeup-brushes-192502.jpg?v=1723976802&width=713', 'tools for creating stunning', ''),
(101, 'Premium Set', 'Beauty Tools', 'Brushes', 1399, 'https://lotshop.pk/cdn/shop/files/premium-set-of-10-makeup-brushes-with-free-gift-branded-quality-4340238.jpg?v=1751987059&width=1100', 'Makeup enthusiasts and professionals alike.', ''),
(102, 'Branded Professional', 'Beauty Tools', 'Brushes', 1299, '../product_images/pexels-thisisjooh-27026566.jpg', 'Transform your makeup application ', ''),
(103, 'Brush Set with Black', 'Beauty Tools', 'Brushes', 3999, 'https://lotshop.pk/cdn/shop/files/natural-maker-7-piece-professional-makeup-brush-set-with-black-travel-pouch-960589.jpg?v=1732205055&width=713', 'his set includes 7 essential brushes', ''),
(104, 'Perfect Diary 3-Piece', 'Beauty Tools', 'Brushes', 1899, 'https://lotshop.pk/cdn/shop/files/perfect-diary-3-piece-makeup-brush-set-with-black-leather-pouch-253910.webp?v=1738170788&width=713', 'Luxury meets perfection ', ''),
(105, 'EniNa Blossom Beauty', 'Beauty Tools', 'Brushes', 3999, 'https://lotshop.pk/cdn/shop/files/enina-blossom-beauty-12-piece-makeup-brush-set-730128.jpg?v=1727896346&width=1100', 'functionality to your makeup routine.', ''),
(106, 'Wanderlust Mirror', 'Beauty Tools', 'Mirrors', 7999, 'https://lurella.pk/cdn/shop/products/BIGBLKSM161_02.progressive.jpg?v=1613515244', 'Dimensions: 7.48 x 9.92 x 0.95 in', ''),
(107, 'Rotatable Golden', 'Beauty Tools', 'Mirrors', 5999, 'https://apricot.com.pk/cdn/shop/files/Rotatable-Golden-Vanity-Mirror-SA2405-157-Apricot-7731.webp?v=1727599801&width=823', 'Swivel Single Sided Makeup', ''),
(108, ' Golden Vanity Mirror', 'Beauty Tools', 'Mirrors', 4999, 'https://apricot.com.pk/cdn/shop/files/Rotatable-Golden-Vanity-Mirror-5507-Round-SA2405-159-Apricot-6017.jpg?v=1727599691&width=823', 'Power Supply: Use without power', ''),
(109, ' LED Mirror Curvy ', 'Beauty Tools', 'Mirrors', 4599, 'https://apricot.com.pk/cdn/shop/files/LED-Mirror-Curvy-Cosmetics-Storage-Box-Apricot-8509.jpg?v=1718693305&width=823', 'It is a mobile dressing table', ''),
(110, 'Jewelry Cabinet', 'Beauty Tools', 'Mirrors', 3599, 'https://apricot.com.pk/cdn/shop/files/Jewelry-Cabinet-With-Led-Mirror-SA2405-72-Apricot-7484.jpg?v=1727599876&width=823', 'Jewelry is an indispensable addition ', ''),
(111, 'Rotatable Black', 'Beauty Tools', 'Mirrors', 5999, 'https://apricot.com.pk/cdn/shop/files/Rotatable-Black-Vanity-Mirror-5508-Round-SA2405-160-Apricot-9624.jpg?v=1727599703&width=823', 'Power Supply: Use without power', ''),
(112, '2in1 cosmetics mirror', 'Beauty Tools', 'Mirrors', 6999, 'https://www.medisana.com/thumbnail/45/70/07/1720698869/165ea46f4b329582ccae7dabb8f2cc06_1920x1920.jpg?ts=1720698869', 'The 2in1 cosmetic mirror impresses ', ''),
(113, 'Wall Mount with Folding Arm Double-Sided', 'Beauty Tools', 'Mirrors', 7999, 'https://luckyhome.pk/cdn/shop/files/SSCosmeticmirror3.jpg?v=1727870341', 'deal for bathrooms or vanities', ''),
(114, 'Storage Organizer Accessories', 'Beauty Tools', 'Accessories', 8799, '../product_images/pexels-ds-stories-7256120.jpg', ' material suitable for professional', ''),
(115, 'Hakim Santoso ', 'Beauty Tools', 'Accessories', 7599, '../product_images/pexels-hakimsatoso-6527699.jpg', 'what you need quickly.', ''),
(116, 'Nester grapher', 'Beauty Tools', 'Accessories', 4999, '../product_images/pexels-nestergrapher-12175442.jpg', 'organized in a sleek and modern way', ''),
(117, 'karolina-grabowska', 'Beauty Tools', 'Accessories', 8999, '../product_images/pexels-karolina-grabowska-4938514.jpg', 'It will last for a long time.', ''),
(118, 'jhong-pascua', 'Beauty Tools', 'Accessories', 5899, '../product_images/pexels-jhong-pascua-1062908-3018845.jpg', 'Elegance to your makeup collection', ''),
(119, 'Lina Kivaka', 'Beauty Tools', 'Accessories', 5999, '../product_images/pexels-lina-5731811.jpg', 'Its also a Perfect Gifts ', ''),
(120, 'Makeup Cosmetics', 'Beauty Tools', 'Accessories', 2999, '../product_images/pexels-rdne-7755138.jpg', 'save lots of your valuable time', ''),
(121, 'suzyhazel wood', 'Beauty Tools', 'Accessories', 3699, '../product_images/pexels-suzyhazelwood-1438065.jpg', 'Luxury design make easy to access', '');

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
(5, 'farazkhan', 'users/IMG_20231224_224938.jpg', 'farazkhan61512@gmail.com', 'fk$12345678', 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `user_id` int(255) NOT NULL,
  `item` int(11) NOT NULL,
  `product_image` varchar(500) NOT NULL,
  `product_name` varchar(500) NOT NULL,
  `product_price` int(255) NOT NULL,
  `quantity` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`user_id`, `item`, `product_image`, `product_name`, `product_price`, `quantity`) VALUES
(23, 56, '../product_images/r.png', 'RUBY STUD EARRINGS', 4000, 1),
(24, 57, '../product_images/m.webp', 'Infinite Whisper', 5999, 1),
(24, 58, '../product_images/m4.png', 'Rhyah Peridot Pendant', 3990, 1),
(24, 59, '../product_images/r1.png', 'Amethyst Elegance Hoop', 2999, 1),
(25, 60, '../product_images/long mirrors.jpeg', 'Mirror', 500, 1),
(25, 61, '../product_images/pexels-thisisjooh-27026566.jpg', 'Branded Professional', 1299, 1),
(25, 62, 'https://cozmetica.pk/cdn/shop/files/SKIN1004_20-_20Madagascar_201004Day_20Signature_20Mini-Set_202024_800x_0c4b0e11-67c9-4f55-a477-0323a98adfb2.webp?v=1748525706&width=1426', 'SKIN1004 Madagascar', 2299, 1),
(26, 63, '../product_images/m4.png', 'Rhyah Peridot Pendant', 3990, 1),
(26, 64, '../product_images/m1.webp', 'Ultramarine Necklace', 3499, 1),
(26, 65, '../product_images/rr.jpg', 'MARINA STUD ', 4999, 1),
(26, 78, 'http://localhost/Vision-Project/admin/custom_jewellery_admin/jewellery/ruby.avif', 'Customized jewellery', 6000, 1),
(26, 79, '../product_images/r.png', 'PURPLE AMETHYST', 4000, 1),
(26, 80, 'http://localhost/Vision-Project/admin/custom_jewellery_admin/jewellery/hrundl%20black%20diamond%201.avif', 'Customized jewellery', 7600, 1);

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
-- Table structure for table `gems`
--

CREATE TABLE `gems` (
  `gem_id` int(255) NOT NULL,
  `gem_name` varchar(255) NOT NULL,
  `gem_price` int(255) NOT NULL,
  `gem_image` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gems`
--

INSERT INTO `gems` (`gem_id`, `gem_name`, `gem_price`, `gem_image`) VALUES
(4, 'ruby', 6000, 'custom_jewellery_admin/gems/ruby-thumb.avif'),
(5, 'emerald', 8000, 'custom_jewellery_admin/gems/emerald-thumb.avif'),
(9, 'diamond', 20000, 'custom_jewellery_admin/gems/diamond-thumb.avif'),
(10, 'black diamond', 7000, 'custom_jewellery_admin/gems/black diamond.avif'),
(11, 'sapphire', 9000, 'custom_jewellery_admin/gems/sapphire.avif');

-- --------------------------------------------------------

--
-- Table structure for table `jewellery_bodies`
--

CREATE TABLE `jewellery_bodies` (
  `id` int(255) NOT NULL,
  `body_type` varchar(255) NOT NULL,
  `body_image` varchar(500) NOT NULL,
  `body_price` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jewellery_bodies`
--

INSERT INTO `jewellery_bodies` (`id`, `body_type`, `body_image`, `body_price`) VALUES
(10, 'ring', 'custom_jewellery_admin/jewellery/bodies/ring-body.jpg', 0),
(16, 'ring', 'custom_jewellery_admin/jewellery/bodies/ring-body-2 (1).jpg', 0),
(17, 'ring', 'custom_jewellery_admin/jewellery/bodies/ruby heart shape ring 1.jpg', 0),
(18, 'necklace', 'custom_jewellery_admin/jewellery/bodies/drop diamond 1.avif', 0),
(19, 'bracelet', 'custom_jewellery_admin/jewellery/bodies/rounded bracelet 1.webp', 0),
(21, 'ring', 'custom_jewellery_admin/jewellery/bodies/gisu body.jpg', 900),
(22, 'ring', 'custom_jewellery_admin/jewellery/bodies/body torment.png', 7000),
(23, 'ring', 'custom_jewellery_admin/jewellery/bodies/lyptop body.jpg', 500),
(24, 'ring', 'custom_jewellery_admin/jewellery/bodies/hrundl body.jpg', 600),
(25, 'ring', 'custom_jewellery_admin/jewellery/bodies/body.jpg', 9000),
(26, 'necklace', 'custom_jewellery_admin/jewellery/bodies/tinatin body.jpg', 7000),
(27, 'necklace', 'custom_jewellery_admin/jewellery/bodies/zoya body.jpg', 6000),
(28, 'necklace', 'custom_jewellery_admin/jewellery/bodies/lena body.jpg', 6000),
(29, 'necklace', 'custom_jewellery_admin/jewellery/bodies/plevna body.jpg', 4000),
(30, 'necklace', 'custom_jewellery_admin/jewellery/bodies/ahishar body.jpg', 5000),
(31, 'necklace', 'custom_jewellery_admin/jewellery/bodies/cross body.jpg', 2000),
(32, 'necklace', 'custom_jewellery_admin/jewellery/bodies/angel body.jpg', 7000),
(33, 'earrings', 'custom_jewellery_admin/jewellery/bodies/finifugal body.jpg', 4000),
(34, 'earrings', 'custom_jewellery_admin/jewellery/bodies/verano body.jpg', 5000),
(35, 'earrings', 'custom_jewellery_admin/jewellery/bodies/darejni body.jpg', 6000),
(36, 'earrings', 'custom_jewellery_admin/jewellery/bodies/xatu body.jpg', 7000),
(37, 'earrings', 'custom_jewellery_admin/jewellery/bodies/shalev body.jpg', 6000),
(38, 'earrings', 'custom_jewellery_admin/jewellery/bodies/legno body.jpg', 5000),
(39, 'earrings', 'custom_jewellery_admin/jewellery/bodies/possiblitan body.jpg', 4000),
(40, 'earrings', 'custom_jewellery_admin/jewellery/bodies/palin body.jpg', 3000),
(41, 'bracelet', 'custom_jewellery_admin/jewellery/bodies/finninuala body.jpg', 4000),
(42, 'bracelet', 'custom_jewellery_admin/jewellery/bodies/boundness body.jpg', 3000),
(43, 'bracelet', 'custom_jewellery_admin/jewellery/bodies/soliel body.jpg', 2000),
(44, 'bracelet', 'custom_jewellery_admin/jewellery/bodies/mae body.jpg', 3000),
(45, 'bracelet', 'custom_jewellery_admin/jewellery/bodies/krisanta body.jpg', 5000),
(46, 'bracelet', 'custom_jewellery_admin/jewellery/bodies/menarik body.jpg', 4000),
(47, 'bracelet', 'custom_jewellery_admin/jewellery/bodies/jodynne  body.jpg', 5000);

-- --------------------------------------------------------

--
-- Table structure for table `jewellery_variants`
--

CREATE TABLE `jewellery_variants` (
  `id` int(255) NOT NULL,
  `body_id` int(255) NOT NULL,
  `gem` varchar(255) NOT NULL,
  `position` int(255) NOT NULL,
  `images` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jewellery_variants`
--

INSERT INTO `jewellery_variants` (`id`, `body_id`, `gem`, `position`, `images`) VALUES
(22, 10, 'diamond', 1, 'custom_jewellery_admin/jewellery/diamond.avif'),
(23, 10, 'diamond', 2, 'custom_jewellery_admin/jewellery/diamond-1.avif'),
(24, 10, 'diamond', 3, 'custom_jewellery_admin/jewellery/diamond-2.avif'),
(25, 10, 'diamond', 4, 'custom_jewellery_admin/jewellery/diamond-3.avif'),
(26, 10, 'emerald', 1, 'custom_jewellery_admin/jewellery/emerald.avif'),
(27, 10, 'emerald', 2, 'custom_jewellery_admin/jewellery/emerald-1.avif'),
(28, 10, 'emerald', 3, 'custom_jewellery_admin/jewellery/emerald-2.avif'),
(29, 10, 'emerald', 4, 'custom_jewellery_admin/jewellery/emerald-3.avif'),
(30, 10, 'ruby', 1, 'custom_jewellery_admin/jewellery/ruby.avif'),
(31, 10, 'ruby', 2, 'custom_jewellery_admin/jewellery/ruby-1.avif'),
(32, 10, 'ruby', 3, 'custom_jewellery_admin/jewellery/ruby-2.avif'),
(33, 10, 'ruby', 4, 'custom_jewellery_admin/jewellery/ruby-3.avif'),
(46, 16, 'diamond', 1, 'custom_jewellery_admin/jewellery/custon_square_ring 1.avif'),
(47, 16, 'diamond', 2, 'custom_jewellery_admin/jewellery/custon_square_ring 2.avif'),
(48, 16, 'diamond', 3, 'custom_jewellery_admin/jewellery/custon_square_ring 3.avif'),
(49, 16, 'diamond', 4, 'custom_jewellery_admin/jewellery/custon_square_ring 4.avif'),
(50, 16, 'emerald', 1, 'custom_jewellery_admin/jewellery/custom square emerald 1.webp'),
(51, 16, 'emerald', 2, 'custom_jewellery_admin/jewellery/custom sqare emerald 2.avif'),
(52, 16, 'emerald', 3, 'custom_jewellery_admin/jewellery/custom sqare emerald 3.avif'),
(53, 16, 'emerald', 4, 'custom_jewellery_admin/jewellery/custom sqare emerald 4.avif'),
(54, 16, 'ruby', 1, 'custom_jewellery_admin/jewellery/custom square ring ruby 1.avif'),
(55, 16, 'ruby', 2, 'custom_jewellery_admin/jewellery/custom square ring ruby 2.avif'),
(56, 16, 'ruby', 3, 'custom_jewellery_admin/jewellery/custom square ring ruby 3.avif'),
(57, 16, 'ruby', 4, 'custom_jewellery_admin/jewellery/custom square ring ruby 4.avif'),
(58, 17, 'diamond', 1, 'custom_jewellery_admin/jewellery/diamond heart shape ring 1.webp'),
(59, 17, 'diamond', 2, 'custom_jewellery_admin/jewellery/diamond heart shape ring 2.webp'),
(60, 17, 'diamond', 3, 'custom_jewellery_admin/jewellery/diamond heart shape ring 3.avif'),
(61, 17, 'diamond', 4, 'custom_jewellery_admin/jewellery/diamond heart shape ring 4.avif'),
(62, 17, 'emerald', 1, 'custom_jewellery_admin/jewellery/emerald heart shape ring 1.avif'),
(63, 17, 'emerald', 2, 'custom_jewellery_admin/jewellery/emerald heart shape ring 2.avif'),
(64, 17, 'emerald', 3, 'custom_jewellery_admin/jewellery/diamond heart shape ring 3.avif'),
(65, 17, 'emerald', 4, 'custom_jewellery_admin/jewellery/diamond heart shape ring 4.avif'),
(66, 17, 'ruby', 1, 'custom_jewellery_admin/jewellery/ruby heart shape ring 1.avif'),
(67, 17, 'ruby', 2, 'custom_jewellery_admin/jewellery/ruby heart shape ring 2.avif'),
(68, 17, 'ruby', 3, 'custom_jewellery_admin/jewellery/ruby heart shape ring 3.avif'),
(69, 17, 'ruby', 4, 'custom_jewellery_admin/jewellery/ruby heart shape ring 4.avif'),
(70, 18, 'diamond', 1, 'custom_jewellery_admin/jewellery/drop diamond 1.avif'),
(71, 18, 'diamond', 2, 'custom_jewellery_admin/jewellery/drop diamond necklace 2.avif'),
(72, 18, 'diamond', 3, 'custom_jewellery_admin/jewellery/drop diamond necklace 3.avif'),
(73, 18, 'emerald', 1, 'custom_jewellery_admin/jewellery/drop emerald necklace 1.avif'),
(74, 18, 'emerald', 2, 'custom_jewellery_admin/jewellery/drop emrald necklace 2.jpg'),
(75, 18, 'emerald', 3, 'custom_jewellery_admin/jewellery/drop emrald necklace 3.jpg'),
(76, 18, 'ruby', 1, 'custom_jewellery_admin/jewellery/drop ruby necklace 1.avif'),
(77, 18, 'ruby', 2, 'custom_jewellery_admin/jewellery/drop ruby necklace 2.jpg'),
(78, 18, 'ruby', 3, 'custom_jewellery_admin/jewellery/drop ruby necklace 3.jpg'),
(79, 19, 'diamond', 1, 'custom_jewellery_admin/jewellery/rounded bracelet 1.webp'),
(80, 19, 'diamond', 2, 'custom_jewellery_admin/jewellery/rounded bracelet 2.webp'),
(81, 19, 'diamond', 3, 'custom_jewellery_admin/jewellery/rounded bracelet 3.webp'),
(82, 19, 'emerald', 1, 'custom_jewellery_admin/jewellery/rounded bracelet 1 emerald.webp'),
(83, 19, 'emerald', 2, 'custom_jewellery_admin/jewellery/rounded bracelet 2 emerald.avif'),
(84, 19, 'emerald', 3, 'custom_jewellery_admin/jewellery/rounded bracelet 3emerald.webp'),
(85, 19, 'ruby', 1, 'custom_jewellery_admin/jewellery/rounded bracelet 1.avif'),
(86, 19, 'ruby', 2, 'custom_jewellery_admin/jewellery/rounded bracelet  ruby 2.avif'),
(87, 19, 'ruby', 3, 'custom_jewellery_admin/jewellery/rounded bracelet 3 ruby (2).webp'),
(88, 21, 'diamond', 1, 'custom_jewellery_admin/jewellery/gisu diamond 1.avif'),
(89, 21, 'diamond', 2, 'custom_jewellery_admin/jewellery/gisu diamond 2.avif'),
(90, 21, 'diamond', 3, 'custom_jewellery_admin/jewellery/gisu diamond 3.avif'),
(91, 21, 'emerald', 1, 'custom_jewellery_admin/jewellery/gisu emerald 1.avif'),
(92, 21, 'emerald', 2, 'custom_jewellery_admin/jewellery/gisu emerald 2.avif'),
(93, 21, 'emerald', 3, 'custom_jewellery_admin/jewellery/gisu diamond 3.avif'),
(94, 21, 'ruby', 1, 'custom_jewellery_admin/jewellery/gisu ruby 1.avif'),
(95, 21, 'ruby', 2, 'custom_jewellery_admin/jewellery/gisu ruby 2.avif'),
(96, 21, 'ruby', 3, 'custom_jewellery_admin/jewellery/gisu ruby 3.avif'),
(97, 22, 'diamond', 1, 'custom_jewellery_admin/jewellery/torment diamond 1.avif'),
(98, 22, 'diamond', 2, 'custom_jewellery_admin/jewellery/torment diamond 2.avif'),
(99, 22, 'diamond', 3, 'custom_jewellery_admin/jewellery/torment diamond 3.avif'),
(100, 22, 'ruby', 1, 'custom_jewellery_admin/jewellery/torment ruby 1.avif'),
(101, 22, 'ruby', 2, 'custom_jewellery_admin/jewellery/torment ruby 2.avif'),
(102, 22, 'ruby', 3, 'custom_jewellery_admin/jewellery/torment ruby 3.avif'),
(103, 22, 'black diamond', 1, 'custom_jewellery_admin/jewellery/black diamond torment 1.jpg'),
(104, 22, 'black diamond', 2, 'custom_jewellery_admin/jewellery/black diamond torment 2.avif'),
(105, 22, 'black diamond', 3, 'custom_jewellery_admin/jewellery/black diamond torment 3.avif'),
(106, 23, 'diamond', 1, 'custom_jewellery_admin/jewellery/lytop diamond 1.avif'),
(107, 23, 'diamond', 2, 'custom_jewellery_admin/jewellery/lytop diamond 2.avif'),
(108, 23, 'diamond', 3, 'custom_jewellery_admin/jewellery/lytop diamond 3.avif'),
(109, 23, 'emerald', 1, 'custom_jewellery_admin/jewellery/lytop emerald 1.avif'),
(110, 23, 'emerald', 2, 'custom_jewellery_admin/jewellery/lytop emerald 2.avif'),
(111, 23, 'emerald', 3, 'custom_jewellery_admin/jewellery/lytop emerald 3.avif'),
(112, 23, 'ruby', 1, 'custom_jewellery_admin/jewellery/lytop ruby 1.avif'),
(113, 23, 'ruby', 2, 'custom_jewellery_admin/jewellery/lyptop ruby 2.jpg'),
(114, 23, 'ruby', 3, 'custom_jewellery_admin/jewellery/lyptop ruby 3.avif'),
(115, 24, 'diamond', 1, 'custom_jewellery_admin/jewellery/hrundl diamond 1.avif'),
(116, 24, 'diamond', 2, 'custom_jewellery_admin/jewellery/hrundl diamond 2.avif'),
(117, 24, 'diamond', 3, 'custom_jewellery_admin/jewellery/hrundl diamond 3.avif'),
(118, 24, 'emerald', 1, 'custom_jewellery_admin/jewellery/hrundl emerald 1.avif'),
(119, 24, 'emerald', 2, 'custom_jewellery_admin/jewellery/hrundl emerald 2.avif'),
(120, 24, 'emerald', 3, 'custom_jewellery_admin/jewellery/hrundl emerald 3.avif'),
(121, 24, 'ruby', 1, 'custom_jewellery_admin/jewellery/hrundl ruby 1.avif'),
(122, 24, 'ruby', 2, 'custom_jewellery_admin/jewellery/hrundl ruby 2.avif'),
(123, 24, 'ruby', 3, 'custom_jewellery_admin/jewellery/hrundl ruby 3.avif'),
(124, 24, 'black diamond', 1, 'custom_jewellery_admin/jewellery/hrundl black diamond 1.avif'),
(125, 24, 'black diamond', 2, 'custom_jewellery_admin/jewellery/hrundl black diamond 2.avif'),
(126, 24, 'black diamond', 3, 'custom_jewellery_admin/jewellery/hrundl black diamond 3.jpg'),
(127, 24, 'sapphire', 1, 'custom_jewellery_admin/jewellery/hrundl sapphire 1.avif'),
(128, 24, 'sapphire', 2, 'custom_jewellery_admin/jewellery/hrundl sapphire 2.avif'),
(129, 24, 'sapphire', 3, 'custom_jewellery_admin/jewellery/hrundl sapphire 3.avif'),
(130, 25, 'diamond', 1, 'custom_jewellery_admin/jewellery/alcosta diamond 1.avif'),
(131, 25, 'diamond', 2, 'custom_jewellery_admin/jewellery/alcosta diamond 2.jpg'),
(132, 25, 'diamond', 3, 'custom_jewellery_admin/jewellery/alcosta diamond 3.avif'),
(133, 25, 'emerald', 1, 'custom_jewellery_admin/jewellery/alcosta emerald 1.avif'),
(134, 25, 'emerald', 2, 'custom_jewellery_admin/jewellery/alcosta emerald 2.avif'),
(135, 25, 'emerald', 3, 'custom_jewellery_admin/jewellery/alcosta emerald 3.jpg'),
(136, 25, 'ruby', 1, 'custom_jewellery_admin/jewellery/alcosta ruby 1.avif'),
(137, 25, 'ruby', 2, 'custom_jewellery_admin/jewellery/alcosta ruby 2.jpg'),
(138, 25, 'ruby', 3, 'custom_jewellery_admin/jewellery/alcosta ruby 3.jpg'),
(139, 25, 'black diamond', 1, 'custom_jewellery_admin/jewellery/alcosta black diamond 1.avif'),
(140, 25, 'black diamond', 2, 'custom_jewellery_admin/jewellery/alcosta black diamond 2.avif'),
(141, 25, 'black diamond', 3, 'custom_jewellery_admin/jewellery/alcosta black diamond 3.jpg'),
(142, 25, 'sapphire', 1, 'custom_jewellery_admin/jewellery/alcosta sapphire 1.jpg'),
(143, 25, 'sapphire', 2, 'custom_jewellery_admin/jewellery/alcosta sapphire 2.jpg'),
(144, 25, 'sapphire', 3, 'custom_jewellery_admin/jewellery/alcosta sapphire 3.jpg'),
(145, 26, 'diamond', 1, 'custom_jewellery_admin/jewellery/tinatin diamond 1.avif'),
(146, 26, 'diamond', 2, 'custom_jewellery_admin/jewellery/tinatin diamond 2.jpg'),
(147, 26, 'diamond', 3, 'custom_jewellery_admin/jewellery/tinatin diamond 3.avif'),
(148, 26, 'emerald', 1, 'custom_jewellery_admin/jewellery/tinatin emerald 1.avif'),
(149, 26, 'emerald', 2, 'custom_jewellery_admin/jewellery/tinatin emerald 2.jpg'),
(150, 26, 'emerald', 3, 'custom_jewellery_admin/jewellery/tinatin emerald 3.jpg'),
(151, 26, 'ruby', 1, 'custom_jewellery_admin/jewellery/tinatin ruby 1.jpg'),
(152, 26, 'ruby', 2, 'custom_jewellery_admin/jewellery/tinatin ruby 2.jpg'),
(153, 26, 'ruby', 3, 'custom_jewellery_admin/jewellery/tinatin ruby 3.jpg'),
(154, 26, 'sapphire', 1, 'custom_jewellery_admin/jewellery/tinatin sapphire 1.avif'),
(155, 26, 'sapphire', 2, 'custom_jewellery_admin/jewellery/tinatin sapphire 2.jpg'),
(156, 26, 'sapphire', 3, 'custom_jewellery_admin/jewellery/tinatin sapphire 3.avif'),
(157, 27, 'diamond', 1, 'custom_jewellery_admin/jewellery/zoya diamond 1.avif'),
(158, 27, 'diamond', 2, 'custom_jewellery_admin/jewellery/zoya diamond 2.webp'),
(159, 27, 'diamond', 3, 'custom_jewellery_admin/jewellery/zoya diamond 3.webp'),
(160, 27, 'emerald', 1, 'custom_jewellery_admin/jewellery/zoya emerald 1.avif'),
(161, 27, 'emerald', 2, 'custom_jewellery_admin/jewellery/zoya emerald 2.avif'),
(162, 27, 'emerald', 3, 'custom_jewellery_admin/jewellery/zoya emerald 3.avif'),
(163, 27, 'ruby', 1, 'custom_jewellery_admin/jewellery/zoya ruby 1.avif'),
(164, 27, 'ruby', 2, 'custom_jewellery_admin/jewellery/zoya ruby 2.avif'),
(165, 27, 'ruby', 3, 'custom_jewellery_admin/jewellery/zoya ruby 3.avif'),
(166, 28, 'diamond', 1, 'custom_jewellery_admin/jewellery/lena diamond 1.avif'),
(167, 28, 'diamond', 2, 'custom_jewellery_admin/jewellery/lena diamond 2.avif'),
(168, 28, 'emerald', 1, 'custom_jewellery_admin/jewellery/lena emerald 1.avif'),
(170, 28, 'ruby', 1, 'custom_jewellery_admin/jewellery/lena ruby 1.avif'),
(171, 28, 'ruby', 2, 'custom_jewellery_admin/jewellery/lena ruby 2.avif'),
(172, 28, 'sapphire', 1, 'custom_jewellery_admin/jewellery/lena sapphire 1.avif'),
(173, 28, 'sapphire', 2, 'custom_jewellery_admin/jewellery/lena sapphire 2.avif'),
(174, 29, 'diamond', 1, 'custom_jewellery_admin/jewellery/plevna diamond 1.avif'),
(175, 29, 'diamond', 2, 'custom_jewellery_admin/jewellery/plevna diamond 2.jpg'),
(176, 29, 'diamond', 3, 'custom_jewellery_admin/jewellery/plevna diamond 3.jpg'),
(177, 29, 'emerald', 1, 'custom_jewellery_admin/jewellery/plevna emerald 1.avif'),
(178, 29, 'emerald', 2, 'custom_jewellery_admin/jewellery/plevna emerald 2.avif'),
(179, 29, 'emerald', 3, 'custom_jewellery_admin/jewellery/plevna emerald 3.avif'),
(180, 29, 'ruby', 1, 'custom_jewellery_admin/jewellery/plevna ruby 1.avif'),
(181, 29, 'ruby', 2, 'custom_jewellery_admin/jewellery/plevna ruby 2.avif'),
(182, 29, 'ruby', 3, 'custom_jewellery_admin/jewellery/plevna ruby 3.jpg'),
(183, 30, 'diamond', 1, 'custom_jewellery_admin/jewellery/ahishar diamond 1.avif'),
(184, 30, 'diamond', 2, 'custom_jewellery_admin/jewellery/ahishar diamond 2.jpg'),
(185, 30, 'diamond', 3, 'custom_jewellery_admin/jewellery/ahishar diamond 3.avif'),
(186, 30, 'ruby', 1, 'custom_jewellery_admin/jewellery/ahishar ruby 1.avif'),
(187, 30, 'ruby', 2, 'custom_jewellery_admin/jewellery/ahishar ruby 2.jpg'),
(188, 30, 'ruby', 3, 'custom_jewellery_admin/jewellery/ahishar ruby 3.avif'),
(189, 30, 'black diamond', 1, 'custom_jewellery_admin/jewellery/ahishar black diamond 1.jpg'),
(190, 30, 'black diamond', 2, 'custom_jewellery_admin/jewellery/ahishar black diamond 2.jpg'),
(191, 30, 'black diamond', 3, 'custom_jewellery_admin/jewellery/ahishsar black diamond 3.jpg'),
(192, 31, 'diamond', 1, 'custom_jewellery_admin/jewellery/cross diamond 1.avif'),
(193, 31, 'diamond', 2, 'custom_jewellery_admin/jewellery/cross diamond 2.avif'),
(194, 31, 'diamond', 3, 'custom_jewellery_admin/jewellery/cross diamond 3.avif'),
(195, 31, 'emerald', 1, 'custom_jewellery_admin/jewellery/cross emerald 1.avif'),
(196, 31, 'emerald', 2, 'custom_jewellery_admin/jewellery/cross emerald 2.jpg'),
(197, 31, 'emerald', 3, 'custom_jewellery_admin/jewellery/cross emerald 3.avif'),
(198, 31, 'ruby', 1, 'custom_jewellery_admin/jewellery/cross ruby 1.avif'),
(199, 31, 'ruby', 2, 'custom_jewellery_admin/jewellery/cross ruby 2.avif'),
(200, 31, 'ruby', 3, 'custom_jewellery_admin/jewellery/cross ruby 3.avif'),
(201, 32, 'diamond', 1, 'custom_jewellery_admin/jewellery/angel diamond 1.avif'),
(202, 32, 'diamond', 2, 'custom_jewellery_admin/jewellery/angel diamond 2.avif'),
(203, 32, 'diamond', 3, 'custom_jewellery_admin/jewellery/angel diamond 3.avif'),
(204, 32, 'emerald', 1, 'custom_jewellery_admin/jewellery/angel emerald 1.avif'),
(205, 32, 'emerald', 2, 'custom_jewellery_admin/jewellery/angel emerald 2.avif'),
(206, 32, 'emerald', 3, 'custom_jewellery_admin/jewellery/angel emerald 3.jpg'),
(207, 32, 'ruby', 1, 'custom_jewellery_admin/jewellery/angel ruby 1.avif'),
(208, 32, 'ruby', 2, 'custom_jewellery_admin/jewellery/angel ruby 2.jpg'),
(209, 32, 'ruby', 3, 'custom_jewellery_admin/jewellery/angel ruby 3.jpg'),
(210, 32, 'sapphire', 1, 'custom_jewellery_admin/jewellery/angel sapphire 1.avif'),
(211, 32, 'sapphire', 2, 'custom_jewellery_admin/jewellery/angel sapphire 2.avif'),
(212, 32, 'sapphire', 3, 'custom_jewellery_admin/jewellery/angel sapphire 3.avif'),
(213, 28, 'emerald', 2, 'custom_jewellery_admin/jewellery/lena emerald 2.avif'),
(214, 33, 'diamond', 1, 'custom_jewellery_admin/jewellery/finifugal diamond 1.avif'),
(215, 33, 'diamond', 2, 'custom_jewellery_admin/jewellery/finifugal diamond 2.avif'),
(216, 33, 'diamond', 3, 'custom_jewellery_admin/jewellery/finifugal diamond 3.avif'),
(217, 33, 'emerald', 1, 'custom_jewellery_admin/jewellery/finifugal emerald 1.avif'),
(218, 33, 'emerald', 2, 'custom_jewellery_admin/jewellery/finifugal emerald 2.jpg'),
(219, 33, 'emerald', 3, 'custom_jewellery_admin/jewellery/finifugal emerald 3.jpg'),
(220, 33, 'ruby', 1, 'custom_jewellery_admin/jewellery/finifugal ruby `.avif'),
(221, 33, 'ruby', 2, 'custom_jewellery_admin/jewellery/finifugal ruby 2.avif'),
(222, 33, 'ruby', 3, 'custom_jewellery_admin/jewellery/finifugal ruby 3.jpg'),
(223, 34, 'diamond', 1, 'custom_jewellery_admin/jewellery/verano diamond 1.avif'),
(224, 34, 'diamond', 2, 'custom_jewellery_admin/jewellery/verano diamond 2.webp'),
(225, 34, 'diamond', 3, 'custom_jewellery_admin/jewellery/verano diamond 4.webp'),
(226, 34, 'ruby', 1, 'custom_jewellery_admin/jewellery/verano ruby 1.jpg'),
(227, 34, 'ruby', 2, 'custom_jewellery_admin/jewellery/verano ruby 2.webp'),
(228, 34, 'ruby', 3, 'custom_jewellery_admin/jewellery/verano ruby 3.jpg'),
(229, 34, 'emerald', 1, 'custom_jewellery_admin/jewellery/verano emerald 1.jpg'),
(230, 34, 'emerald', 2, 'custom_jewellery_admin/jewellery/verano emerald 2.jpg'),
(231, 34, 'emerald', 3, 'custom_jewellery_admin/jewellery/verano emerald 3.jpg'),
(232, 34, 'black diamond', 1, 'custom_jewellery_admin/jewellery/verano black diamond 1.jpg'),
(233, 34, 'black diamond', 2, 'custom_jewellery_admin/jewellery/verano black diamond 2.jpg'),
(234, 34, 'black diamond', 3, 'custom_jewellery_admin/jewellery/verano black diamond 3.webp'),
(235, 35, 'diamond', 1, 'custom_jewellery_admin/jewellery/darejni diamond 1.avif'),
(236, 35, 'diamond', 2, 'custom_jewellery_admin/jewellery/darejni diamond 2.avif'),
(237, 35, 'diamond', 3, 'custom_jewellery_admin/jewellery/darejni diamond 3.jpg'),
(238, 35, 'emerald', 1, 'custom_jewellery_admin/jewellery/darejni emerald 1.avif'),
(239, 35, 'emerald', 2, 'custom_jewellery_admin/jewellery/darejni emerald 32.avif'),
(240, 35, 'emerald', 3, 'custom_jewellery_admin/jewellery/darejni emerald 3.avif'),
(241, 35, 'ruby', 1, 'custom_jewellery_admin/jewellery/darejni ruby.avif'),
(242, 35, 'ruby', 2, 'custom_jewellery_admin/jewellery/darejni ruby 2.jpg'),
(243, 35, 'ruby', 3, 'custom_jewellery_admin/jewellery/darejni ruby 3.avif'),
(244, 36, 'diamond', 1, 'custom_jewellery_admin/jewellery/xatu diamond 1.avif'),
(245, 36, 'diamond', 2, 'custom_jewellery_admin/jewellery/xatu diamond 2.avif'),
(246, 36, 'diamond', 3, 'custom_jewellery_admin/jewellery/xatu diamond 3.avif'),
(247, 36, 'emerald', 1, 'custom_jewellery_admin/jewellery/xatu emerald 1.avif'),
(248, 36, 'emerald', 2, 'custom_jewellery_admin/jewellery/xatu emerald 2.avif'),
(249, 36, 'emerald', 3, 'custom_jewellery_admin/jewellery/xatu emerald 3.avif'),
(250, 36, 'ruby', 1, 'custom_jewellery_admin/jewellery/xatu ruby 1.avif'),
(251, 36, 'ruby', 2, 'custom_jewellery_admin/jewellery/xatu ruby 2.avif'),
(252, 36, 'ruby', 3, 'custom_jewellery_admin/jewellery/xatu ruby 3.avif'),
(253, 37, 'diamond', 1, 'custom_jewellery_admin/jewellery/shalev diamond 1.avif'),
(254, 37, 'diamond', 2, 'custom_jewellery_admin/jewellery/shaliv diamond 2.avif'),
(255, 37, 'diamond', 3, 'custom_jewellery_admin/jewellery/shalev diamond 3.jpg'),
(256, 37, 'emerald', 1, 'custom_jewellery_admin/jewellery/shalev emerald 1.avif'),
(257, 37, 'emerald', 2, 'custom_jewellery_admin/jewellery/shalev emerald 2.avif'),
(258, 37, 'emerald', 3, 'custom_jewellery_admin/jewellery/shalev emerald 3.avif'),
(259, 37, 'ruby', 1, 'custom_jewellery_admin/jewellery/shalev ruby 1.avif'),
(260, 37, 'ruby', 2, 'custom_jewellery_admin/jewellery/shalev ruby 2.jpg'),
(261, 37, 'ruby', 3, 'custom_jewellery_admin/jewellery/shalev ruby 3.jpg'),
(262, 38, 'diamond', 1, 'custom_jewellery_admin/jewellery/legno diamond 1.avif'),
(263, 38, 'diamond', 2, 'custom_jewellery_admin/jewellery/legno diamond 2.avif'),
(264, 38, 'diamond', 3, 'custom_jewellery_admin/jewellery/legno diamond 3.jpg'),
(265, 38, 'emerald', 1, 'custom_jewellery_admin/jewellery/legno emerald 1.avif'),
(266, 38, 'emerald', 2, 'custom_jewellery_admin/jewellery/legno emerald 2.jpg'),
(267, 38, 'emerald', 3, 'custom_jewellery_admin/jewellery/legno emerald 3.jpg'),
(268, 38, 'ruby', 1, 'custom_jewellery_admin/jewellery/legno ruby 1.avif'),
(269, 38, 'ruby', 2, 'custom_jewellery_admin/jewellery/legno ruby 2.avif'),
(270, 38, 'ruby', 3, 'custom_jewellery_admin/jewellery/legno ruby 3.avif'),
(271, 39, 'diamond', 1, 'custom_jewellery_admin/jewellery/diamond possibilitan 1.avif'),
(272, 39, 'diamond', 2, 'custom_jewellery_admin/jewellery/diamond possibilitan 2.avif'),
(273, 39, 'diamond', 3, 'custom_jewellery_admin/jewellery/diamond possibilitan.avif'),
(274, 39, 'emerald', 1, 'custom_jewellery_admin/jewellery/emerald possiblitan 1.avif'),
(275, 39, 'emerald', 2, 'custom_jewellery_admin/jewellery/emerald possiblitan 2.avif'),
(276, 39, 'emerald', 3, 'custom_jewellery_admin/jewellery/emerald possiblitan 3.avif'),
(277, 39, 'ruby', 1, 'custom_jewellery_admin/jewellery/ruby possibilitan 1.avif'),
(278, 39, 'ruby', 2, 'custom_jewellery_admin/jewellery/ruby possibilitan 2.avif'),
(279, 39, 'ruby', 3, 'custom_jewellery_admin/jewellery/ruby possibilitan 3.avif'),
(280, 40, 'diamond', 1, 'custom_jewellery_admin/jewellery/palin diamond 1.avif'),
(281, 40, 'diamond', 2, 'custom_jewellery_admin/jewellery/palin diamond 2.avif'),
(282, 40, 'diamond', 3, 'custom_jewellery_admin/jewellery/palin diamond 3.avif'),
(283, 40, 'emerald', 1, 'custom_jewellery_admin/jewellery/palin emerald 1.avif'),
(284, 40, 'emerald', 2, 'custom_jewellery_admin/jewellery/palin emerald 2.jpg'),
(285, 40, 'emerald', 3, 'custom_jewellery_admin/jewellery/palin emerald 3.avif'),
(286, 40, 'ruby', 1, 'custom_jewellery_admin/jewellery/palin ruby 1.avif'),
(287, 40, 'ruby', 2, 'custom_jewellery_admin/jewellery/palin ruby 2.avif'),
(288, 40, 'ruby', 3, 'custom_jewellery_admin/jewellery/palin ruby 3.avif'),
(289, 41, 'diamond', 1, 'custom_jewellery_admin/jewellery/finninuala diamond 1.avif'),
(290, 41, 'diamond', 2, 'custom_jewellery_admin/jewellery/finninuala diamond 2.avif'),
(291, 41, 'diamond', 3, 'custom_jewellery_admin/jewellery/finninuala diamond 3.avif'),
(292, 41, 'emerald', 1, 'custom_jewellery_admin/jewellery/finninuala emerald 1.avif'),
(293, 41, 'emerald', 2, 'custom_jewellery_admin/jewellery/finninuala emerald 2.avif'),
(294, 41, 'emerald', 3, 'custom_jewellery_admin/jewellery/finninuala emerald 3.avif'),
(295, 41, 'ruby', 1, 'custom_jewellery_admin/jewellery/finnuala ruby 1.webp'),
(296, 41, 'ruby', 2, 'custom_jewellery_admin/jewellery/finnuala ruby 2.avif'),
(297, 41, 'ruby', 3, 'custom_jewellery_admin/jewellery/finnuala ruby 3.avif'),
(298, 42, 'diamond', 1, 'custom_jewellery_admin/jewellery/boundness diamond 1.jpg'),
(299, 42, 'diamond', 2, 'custom_jewellery_admin/jewellery/boundness diamond 2.avif'),
(300, 42, 'diamond', 3, 'custom_jewellery_admin/jewellery/boundness diamond 3.avif'),
(301, 42, 'emerald', 1, 'custom_jewellery_admin/jewellery/boundess emerald 1.avif'),
(302, 42, 'emerald', 2, 'custom_jewellery_admin/jewellery/boundness emerald 2.avif'),
(303, 42, 'emerald', 3, 'custom_jewellery_admin/jewellery/boundness emerald 3.jpg'),
(304, 42, 'ruby', 1, 'custom_jewellery_admin/jewellery/boundness ruby 1.avif'),
(305, 42, 'ruby', 2, 'custom_jewellery_admin/jewellery/boundness ruby 2.avif'),
(306, 42, 'ruby', 3, 'custom_jewellery_admin/jewellery/boundness ruby 3.avif'),
(307, 43, 'diamond', 1, 'custom_jewellery_admin/jewellery/soliel diamond 1.avif'),
(308, 43, 'diamond', 2, 'custom_jewellery_admin/jewellery/soliel diamond 2.avif'),
(309, 43, 'diamond', 3, 'custom_jewellery_admin/jewellery/soliel diamond 3.avif'),
(310, 43, 'emerald', 1, 'custom_jewellery_admin/jewellery/soliel emerald 1.avif'),
(311, 43, 'emerald', 2, 'custom_jewellery_admin/jewellery/soliel emerald 2.jpg'),
(312, 43, 'emerald', 3, 'custom_jewellery_admin/jewellery/soliel emerald 3.jpg'),
(313, 43, 'ruby', 1, 'custom_jewellery_admin/jewellery/soleil ruby 1.jpg'),
(314, 43, 'ruby', 2, 'custom_jewellery_admin/jewellery/soleil ruby 2.jpg'),
(315, 43, 'ruby', 3, 'custom_jewellery_admin/jewellery/soleil ruby 3.jpg'),
(316, 44, 'diamond', 1, 'custom_jewellery_admin/jewellery/mae diamond 1.avif'),
(317, 44, 'diamond', 2, 'custom_jewellery_admin/jewellery/mae diamond 2.avif'),
(318, 44, 'diamond', 3, 'custom_jewellery_admin/jewellery/mae diamond 3.avif'),
(319, 44, 'emerald', 1, 'custom_jewellery_admin/jewellery/mae emerald 1.avif'),
(320, 44, 'emerald', 2, 'custom_jewellery_admin/jewellery/mae emerald 2.avif'),
(321, 44, 'emerald', 3, 'custom_jewellery_admin/jewellery/mae emerald 3.jpg'),
(322, 44, 'ruby', 1, 'custom_jewellery_admin/jewellery/mae ruby 1.avif'),
(323, 44, 'ruby', 2, 'custom_jewellery_admin/jewellery/mae ruby 2.avif'),
(324, 44, 'ruby', 3, 'custom_jewellery_admin/jewellery/mae ruby 3.avif'),
(325, 45, 'diamond', 1, 'custom_jewellery_admin/jewellery/krisanta diamond 1.avif'),
(326, 45, 'diamond', 2, 'custom_jewellery_admin/jewellery/krisanta diamond 2.avif'),
(327, 45, 'diamond', 3, 'custom_jewellery_admin/jewellery/krisanta diamond 3.avif'),
(328, 45, 'emerald', 1, 'custom_jewellery_admin/jewellery/krisanta emerald 3.avif'),
(329, 45, 'emerald', 2, 'custom_jewellery_admin/jewellery/krisanta emerald 2.avif'),
(330, 45, 'emerald', 3, 'custom_jewellery_admin/jewellery/krisanta emerald 3.webp'),
(331, 45, 'ruby', 1, 'custom_jewellery_admin/jewellery/krisanta ruby 1.jpg'),
(332, 45, 'ruby', 2, 'custom_jewellery_admin/jewellery/krisanta ruby 2.webp'),
(333, 45, 'ruby', 3, 'custom_jewellery_admin/jewellery/krisanta ruby 3.avif'),
(334, 46, 'diamond', 1, 'custom_jewellery_admin/jewellery/menarik diamond 1.avif'),
(335, 46, 'diamond', 2, 'custom_jewellery_admin/jewellery/menarik diamond 2.avif'),
(336, 46, 'diamond', 3, 'custom_jewellery_admin/jewellery/menarik diamond 3.jpg'),
(337, 46, 'emerald', 1, 'custom_jewellery_admin/jewellery/menarik emerald `1.jpg'),
(338, 46, 'emerald', 2, 'custom_jewellery_admin/jewellery/menarik emerald 2.avif'),
(339, 46, 'emerald', 3, 'custom_jewellery_admin/jewellery/menarik emerald 3.jpg'),
(340, 46, 'ruby', 1, 'custom_jewellery_admin/jewellery/menarik ruby 1.jpg'),
(341, 46, 'ruby', 2, 'custom_jewellery_admin/jewellery/menarik ruby 2.jpg'),
(342, 46, 'ruby', 3, 'custom_jewellery_admin/jewellery/menarik ruby 3.jpg'),
(343, 47, 'diamond', 1, 'custom_jewellery_admin/jewellery/jodynne diamond 1.avif'),
(344, 47, 'diamond', 2, 'custom_jewellery_admin/jewellery/jodynne diamond 2.jpg'),
(345, 47, 'diamond', 3, 'custom_jewellery_admin/jewellery/jodynne diamond 3.jpg'),
(346, 47, 'emerald', 1, 'custom_jewellery_admin/jewellery/jodynne emerald 1.avif'),
(347, 47, 'emerald', 2, 'custom_jewellery_admin/jewellery/jodynne emerald 2.avif'),
(348, 47, 'emerald', 3, 'custom_jewellery_admin/jewellery/jodynne emerald 3.avif'),
(349, 47, 'ruby', 1, 'custom_jewellery_admin/jewellery/jodynne ruby 1.jpg'),
(350, 47, 'ruby', 2, 'custom_jewellery_admin/jewellery/jodynne ruby 2.avif'),
(351, 47, 'ruby', 3, 'custom_jewellery_admin/jewellery/jodynne ruby 3.avif');

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
(23, 'farazkhan', 'farazkhan61512@gmail.com', 'fk$12345678'),
(24, 'Miswer', 'miswer@gmail.com', 'miswer'),
(25, 'Aliyan', 'aliyan6464@gmail.com', 'aliyan'),
(26, 'Mansoor', 'mansoor@gmail.com', 'mansoor');

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
(44, 26, 'RUBY STUD EARRINGS', '../product_images/r.png', 4000, 1),
(45, 26, 'The Joran Ring', 'https://thegracepk.com/cdn/shop/products/16004a7d-aed4-4fad-b345-a1162c0987d4.jpg?v=1674476273&width=700', 1499, 1),
(46, 26, 'MARINA STUD ', '../product_images/rr.jpg', 4999, 1);

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
  ADD KEY `cart_user` (`user_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gems`
--
ALTER TABLE `gems`
  ADD PRIMARY KEY (`gem_id`);

--
-- Indexes for table `jewellery_bodies`
--
ALTER TABLE `jewellery_bodies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jewellery_variants`
--
ALTER TABLE `jewellery_variants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bodies_body_id` (`body_id`);

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
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=229;

--
-- AUTO_INCREMENT for table `add_product`
--
ALTER TABLE `add_product`
  MODIFY `product_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `gems`
--
ALTER TABLE `gems`
  MODIFY `gem_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `jewellery_bodies`
--
ALTER TABLE `jewellery_bodies`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `jewellery_variants`
--
ALTER TABLE `jewellery_variants`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=352;

--
-- AUTO_INCREMENT for table `user_acc`
--
ALTER TABLE `user_acc`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

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
  ADD CONSTRAINT `cart_user` FOREIGN KEY (`user_id`) REFERENCES `user_acc` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `jewellery_variants`
--
ALTER TABLE `jewellery_variants`
  ADD CONSTRAINT `bodies_body_id` FOREIGN KEY (`body_id`) REFERENCES `jewellery_bodies` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
