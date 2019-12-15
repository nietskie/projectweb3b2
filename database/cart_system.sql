-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2019 at 01:36 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cart_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` varchar(50) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `qty` int(10) NOT NULL,
  `total_price` varchar(100) NOT NULL,
  `product_code` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `product_name`, `product_price`, `product_image`, `qty`, `total_price`, `product_code`) VALUES
(254, 21, 'Acer Nitro 5', '28000', 'product/acern5.jpeg', 1, '28000', 'p02'),
(259, 22, 'ASUS TUF Fx505', '48000', 'product/asus_tuf.jpeg', 1, '48000', 'p03'),
(260, 22, 'Asus Zenbook Pro Duo', '120000', 'product/asus.jpeg', 1, '120000', 'p04'),
(261, 22, 'Acer Aspire 3', '25000', 'product/acer_3.jpeg\n\n', 1, '25000', 'p01'),
(262, 21, 'Acer Aspire 3', '25000', 'product/acer_3.jpeg\n\n', 1, '25000', 'p01');

-- --------------------------------------------------------

--
-- Table structure for table `developer`
--

CREATE TABLE `developer` (
  `email` varchar(20) NOT NULL,
  `password` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `developer`
--

INSERT INTO `developer` (`email`, `password`) VALUES
('admin@admin.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `sender_name` varchar(50) NOT NULL,
  `reciever_name` varchar(50) NOT NULL,
  `message_text` text NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `sender_name`, `reciever_name`, `message_text`, `date_time`) VALUES
(147, 'nietskie11@gmail.com', 'admin@admin.com', 'Hello', '2019-12-10 11:47:51'),
(148, 'nietskie11@gmail.com', 'admin@admin.com', 'deadline is coming', '2019-12-10 11:48:04'),
(149, 'nietskie11@gmail.com', 'admin@admin.com', 'i dont have review yet tf!', '2019-12-10 11:48:21'),
(150, 'admin@admin.com', 'nietskie11@gmail.com', 'yeah you can do it ', '2019-12-10 11:48:56'),
(151, 'admin@admin.com', 'nietskie11@gmail.com', 'you have little more problem  in sending ', '2019-12-10 11:49:29'),
(152, 'admin@admin.com', 'nietskie11@gmail.com', 'hello', '2019-12-13 11:56:33'),
(153, 'nietskie11@gmail.com', 'admin@admin.com', 'hello what\'s the problem\n', '2019-12-13 11:57:26'),
(154, 'nietskie11@gmail.com', 'admin@admin.com', 'hello', '2019-12-14 12:00:54'),
(155, 'nietskie11@gmail.com', 'admin@admin.com', 'admin i have problem in buying item', '2019-12-14 12:01:14'),
(156, 'admin@admin.com', 'mariane@yahoo.com', 'hello\r\n', '2019-12-14 12:05:48');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `pmode` varchar(50) NOT NULL,
  `products` varchar(255) NOT NULL,
  `product_image` varchar(100) NOT NULL,
  `amount_paid` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `email`, `phone`, `address`, `pmode`, `products`, `product_image`, `amount_paid`) VALUES
(91, '1', 'Ronald Nieto', 'nietskie11@gmail.com', '09493016435', 'asdasd', 'Cash on Delivery', 'ASUS TUF Fx505', 'product/asus_tuf.jpeg', '48000'),
(92, '1', 'Ronald Nieto', 'nietskie11@gmail.com', '09493016435', 'asdasdasd', 'Cash on Delivery', 'Acer Nitro 5', 'product/acern5.jpeg', '28000');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `brand` varchar(100) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` varchar(50) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `details` varchar(500) NOT NULL,
  `product_code` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `brand`, `product_name`, `product_price`, `product_image`, `details`, `product_code`) VALUES
(1, 'laptop', 'Acer Aspire 3', '25000', 'product/acer_3.jpeg\r\n\r\n', 'Acer Aspire 3 A315-42G-R1FE<br>\r\nAMD Ryzen 3 3200U 2.6-3.5GHz Processor<br>\r\n4gb DDR4 2667Mhz Memory<br>\r\n1,000GB HD<br>\r\n2GB Total Amd Rageon Vega 3 Graphics<br>\r\n2GB Dedicated GDDR5 AMD Radeon 540X\r\n15.6\"(1366x768)HD Resolution', 'p01'),
(2, 'laptop', 'Acer Nitro 5', '28000', 'product/acern5.jpeg', 'AMD RYZEN 5-3550H TURBO SPEED:3.7GHZ<br>\r\n1tb HHD<br>\r\nAMD RADEON VEGA 8 Graphic<br>\r\nRadeon RX560x Series(4gb GDDR5)<br>\r\n15.6\"(1920x1080)FHD IPS slim bezel LCD', 'p02'),
(3, 'laptop', 'ASUS TUF Fx505', '48000', 'product/asus_tuf.jpeg', '- Windows 10 Home<br>\r\n- AMD Ryzen 5 3550H QUAD 8CPU 2.1GHz up to 3.7GHz<br>\r\n- 8GB DDR4 2666MHz SDRAM (32gb ram max)<br>\r\n- 512GB SSDD<br>\r\n- 15.6\" FHD (1920x1080) 120Hz Anti-Glare IPS-level Panel<br>\r\n- (m.2 SLOT available)<br>\r\n- 3GB NVIDIA GeForce GTX 1050 GDDR5 VRAM', 'p03'),
(4, 'laptop', 'Asus Zenbook Pro Duo', '120000', 'product/asus.jpeg', '15.6-inch 4K UHD OLED main display<br>\r\n14-inch 4K UHD ScreenPad Plus display<br>\r\nWindows 10 Home<br>\r\nIntel Core i9-9980HK, Intel Core i7-9750H<br>\r\nNVIDIA RTX 2060 (6GB) graphics<br>\r\n1TB PCIe x4 storage<br>\r\n32GB DDR4 2666MHz RAM<br>', 'p04'),
(5, 'laptop', 'DELL G3 3590', '38000', 'product/dell_g.jpeg', 'CPU: Intel Core i5-8300H (quad-core, 8MB cache, up to 4.0GHz w/ Turbo Boost)<br>\r\nGraphics: Nvidia GeForce GTX 1050 Ti (4GB GDDR5); Intel UHD Graphics 630<br>\r\nRAM: 8GB DDR4 (2,666MHz)<br>\r\nScreen: 15.6-inch FHD (1,920 x 1,080) anti-glare LED-backlit<br>\r\nStorage: 128GB SSD: 1TB HDD @ 5,400RPM', 'p05'),
(6, 'laptop', 'Lenovo 330', '25000', 'product/lenovo 330.jpeg', 'Intel 8th gen Quad Core i5-8250U 1.6-3.4GHz Processor<br>\r\n4GB DDR4 2400MHz Memory<br>\r\n1,000GB HDD<br>\r\n2GB Dedicated GDDR5 AMD Radeon 530 (dual videocard)<br>\r\n2GB Total Ultra Intel HD Graphics 630<br>\r\n15.6\" (1920x1080) Full HD Resolution', 'p06'),
(7, 'laptop', 'Lenovo flex 14', '48000', 'product/lenovo_flex.jpeg', 'CPU: Intel 1.6 GHz Core i5 4200U<br>\r\nGraphics: Intel integrated HD 4400 graphics<br>\r\nRAM: 8GB of DDR3<br>\r\nStorage: 128GB SSD hard drive<br>\r\nScreen: 14-inch 1366x768 LED screen', 'p07'),
(8, 'laptop', 'Lenovo Legion Y540', '50000', 'product/lenovo_legion.jpeg', 'CPU. Intel Core i7-8750H 9.<br>\r\nGPU. NVIDIA GeForce GTX 1050 Ti (4GB GDDR5) 35.<br>\r\nDisplay. 15.6”, Full HD (1920 x 1080), IPS.<br>\r\nHDD/SSD. 512GB SSD.<br>\r\nRAM. 8GB DDR4.', 'p08'),
(9, 'laptop', 'APPLE 13.3 MacBook Air', '60000', 'product/mac_air.jpeg', 'CPU: 1.6GHz Intel Core i5-8210Y (dual-core, 4 threads, 4MB cache, up to 3.6GHz)<br>\r\nGraphics: Intel UHD Graphics 617. <br>\r\nRAM: 8GB (2,133MHz LPDDR3)<br>\r\nScreen: 13.3-inch, 2,560 x 1,600 Retina True Tone display (backlit LED, IPS)<br>\r\nStorage: 256GB PCIe SSD.', 'p09'),
(10, 'laptop', 'MSI GE75 Raider', '100000', 'product/msi.jpeg', 'ProcessorIntel Core i7-8750H (Intel Core i7)<br>\r\nGraphics adapterNVIDIA GeForce RTX 2070 (Laptop) - 8192 MB, Core: 1215 MHz,<br> Memory: 1750 MHz, GDDR6, 419.17, Optimus<br>\r\nMemory16384 MB  \r\n, DDR4-2666, Single-channel, 1333.3 MHz, 19-19-19-43<br>\r\nDisplay17.3 inch 16:9, 1920 x 1080 pixel 127 PPI, Chi Mei N173HCE-G33, IPS,<br>\r\nMainboardIntel Cannon Lake HM370<br>\r\nStorageKingston RBUSNS8154P3256GJ1, 256 GB', 'p10'),
(12, 'watch', 'Casio Analog Dial Watch', '500', 'product/relo1.jpg', 'Model:Quartz <br>\r\nStrap Material: Stainless Steal', 'p11'),
(13, 'watch', 'Japan GSHOCK', '800', 'image/2.PNG', 'Brand:No Brand<br>\r\nBrand New<br>\r\n100% high quality<br>\r\nNOT AUTOLIGHT', 'p12'),
(14, 'watch', 'Sports Silicone Watch Led', '200', 'image/silicon.PNG', '-POWER SAVING:The screnn will authomatically stays off while there is no and operaion after 5 hours<br>\r\nELECTRONIC MOVEMENT: Electronic movement ensures you accurate and precise time.<br>\r\n-MULTI DISPLAY:It can only show you the real time, but also show you the calendar<br>\r\n-ADJUSTABLE LENGTH:The silicone strap is adjustble', 'p13'),
(15, 'cellphone', 'iPhone 11 Pro Max', '62000', 'image/iphone 11 Pro Max.PNG', 'Screen Size:6.5\"<br>\r\nRear Camera Resolution:12 + 12 + 12MP<br>\r\nFront Camera Resolution:12MP<br>\r\nRAM: 6GB<br>\r\nBattery Capacity:3500mAh<br>', 'p14'),
(16, 'cellphone', 'Lenovo z6 Lite', '8900', 'image/Lenovo z6.PNG', '6.3-inch FHD+ display @ 2340 x 1080px.\r\nHDR10.<br>\r\nQualcomm Snapdragon 710 2.2GHz octa-core.<br>\r\nAdreno 616 <br> \r\nGPU.4GB <br>\r\nRAM.64GB.<br>\r\nExpandable up to 256GB via microSD (SIM 2)<br>\r\n16MP f/1.8 + 8MP f/2.4+ 5MP f/2.2 triple rear cameras', 'p15'),
(17, 'cellphone', 'Xiaomi Redmi Note 7', '7900', 'image/redminote7.PNG', 'Features. Qualcomm® Snapdragon™ 660 AIE octa-core processor<br>\r\nCamera. 48MP AI dual rear camera*<br>\r\nDisplay. 6.3\" Dot Drop display19.5:9 aspect ratio<br>\r\nCharging and battery. 4000mAh (typ)* / 3900mAh (min)<br>\r\nDimensions. Height: 159.21mm Width: 75.21mm.', 'p16'),
(18, 'cellphone', 'Huawei Nova 3i', '11990', 'image/Huawei Nova 3i .PNG', 'Screen:6.3\" 1080x2340 pixels.<br>\r\nCamera:16MP.<br>\r\n4/6GB RAM. Hisilicon Kirin 710.\r\n3340mAh.', 'p17'),
(19, 'cellphone', 'ROG Phone', '25000', 'image/rogphone.PNG', 'Processor: speed-binned 2.96GHz Qualcomm Snapdragon 845.<br>\r\nGPU: Qualcomm Adreno 630.<br>\r\nDisplay: 6-inch, 18:9 (2160 x 1080) OLED panel with 90Hz refresh rate and 1ms pixel response time; includes HDR support and 108.6 percent DCI-P3 color gamut coverage.', 'p18'),
(20, 'cellphone', 'Nokia 9', '30000', 'image/Capture.PNG', 'Screen size (inches): 5.99<br>\r\nProcessor: octa-core<br>\r\nProcessor make	Qualcomm Snapdragon:845<br>\r\nRAM: 6GB<br>\r\nInternal storage:128GB', 'p19'),
(21, 'cellphone', 'Samsung S10', '40000', 'image/s10.PNG', 'OS ver	One UI (Android 9.0 Pie)<br>\r\nCPU	Exynos 9820 - EMEA\r\nQualcomm SDM855 Snapdragon 855 - USA/LATAM, China\r\nOcta-core<br>\r\nStorage	128GB , 512GB <br>\r\nRAM: 8GB<br>\r\nExternal Storage:Up to 512GB <br>(SIM 2 slot/dual SIM model only)<br>\r\nBattery	3400mAh<br>\r\nScreen	Display Size: 6.1 inches<br>', 'p20'),
(22, 'cellphone', 'Sony Xperia 1', '26000', 'image/sony.PNG', 'Released 2019, June. 178g, 8.2mm thickness. Android 9.0, up to Android 10. <br>64GB/128GB storage, microSD slot.\r\n8.4% 2,646,572 hits.<br>\r\n595 Become a fan.<br>\r\n6.5\" 1644x3840 pixels.<br>\r\n12MP. 2160p.<br>\r\n6GB RAM. Snapdragon 855.<br>\r\n3330mAh.', 'p21'),
(23, 'bag', 'TOTE NAG', '500', 'image/ab.PNG', 'Shoulder Bag<br>\r\nColor: Light Green Only', 'p22'),
(24, 'bag', 'Shark Bag', '700', 'image/bb.PNG', 'Shoulder Bag<br>\r\nColor: Pink Only', 'p23'),
(25, 'bag', 'Nibezzer', '5000', 'image/cb.PNG', 'Shoulder Bag<br>\r\nColor: Black Only', 'p24'),
(26, 'bag', 'Crossbody Bag', '1000', 'image/gb.PNG', 'Shoulder Bag<br>\r\nColor: Orange and White Only', 'p25'),
(27, 'bag', 'The Circle HandBag', '300', 'image/db.PNG', 'Shoulder Bag<br>\r\nColor: Brown Only', 'p26'),
(28, 'bag', 'Shark Bag v2', '400', 'image/eb.PNG', 'Backpack<br>\r\nColor: Black Only', 'p27'),
(29, 'bag', 'Elegant Shoulder Bag', '100', 'image/fb.PNG', 'Shoulder Bag<br>\r\nColor: Maroon Only', 'p28'),
(30, 'Dress', 'Floral CockTail', '4000', 'image/a.PNG', 'Design: Floral<br>\r\nSemi Cotton', 'p29'),
(31, 'Dress', 'Turtle Neck Cocktail', '5000', 'image/b.PNG', 'Color: white only<br>\r\nSemi Cotton', 'p30'),
(32, 'Dress', 'Greename Cocktail', '500', 'image/c.PNG', 'Color:Green only<br>\r\nSemi Cotton', 'p31'),
(33, 'Dress', 'Pink Dress', '1500', 'image/d.PNG', 'Color: Pink only<br>\r\nSemi Cotton', 'p32'),
(34, 'Dress', 'Blue Dress', '1600', 'image/blue.PNG', 'Color: Blue only<br>\r\nSemi Cotton', 'p33');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `user_id` int(10) NOT NULL,
  `password` varchar(50) NOT NULL,
  `full_name` varchar(300) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `email` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`user_id`, `password`, `full_name`, `mobile`, `email`) VALUES
(1, 'nietskie', 'Ronald Nieto', '09493016435', 'nietskie11@gmail.com'),
(21, 'mariane', 'mariane', '01234567890', 'mariane@yahoo.com'),
(22, 'nietskie', 'reyes', '01234567890', 'reyes@reyes.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=263;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
