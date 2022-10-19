-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2021 at 06:56 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecom_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(10) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_pass` varchar(255) NOT NULL,
  `admin_image` text NOT NULL,
  `admin_country` text NOT NULL,
  `admin_about` text NOT NULL,
  `admin_contact` varchar(255) NOT NULL,
  `admin_job` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_email`, `admin_pass`, `admin_image`, `admin_country`, `admin_about`, `admin_contact`, `admin_job`) VALUES
(1, 'Ismael Valgy', 'valgyismael185@gmail.com', '1234', 'slide_3.png', 'Mozambique', '<p style=\"text-align: left;\">Desenvolvedor Junior com algum conhecimento em integra&ccedil;&atilde;o front-end e back-end. Disposto a aprender e crescer mais tanto proficionalmente tanto como individualmente.</p>', '+258842025446', 'Web Developer '),
(2, 'Wodash Walker', 'wodashwalker185@gmail.com', '2345', 'ecom-store-logo1.png', 'Mozambique', 'Junior Dev Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel laborum ipsa molestias minus. Beatae, quas totam. Illum optio atque similique in, repellendus laborum quia suscipit expedita dignissimos voluptatibus saepe soluta.\r\n\r\nEsta aplicacao foi criada por Fenix.org', '+258842025446', 'Developer'),
(3, 'Isma Valgy', 'ismavalgy185@gmail.com', '1234', 'thumb2-human-eye-4k-digital-art-creative-eye-in-night.jpg', 'Mozambique', '<p>Web designer junior with some experience in backend implementation</p>', '842025446', 'Web designer');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `p_id` int(10) NOT NULL,
  `ip_add` varchar(255) NOT NULL,
  `qty` int(10) NOT NULL,
  `size` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`p_id`, `ip_add`, `qty`, `size`) VALUES
(3, '::1', 1, 'Large'),
(5, '::1', 1, 'Medium');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(10) NOT NULL,
  `cat_title` text NOT NULL,
  `cat_top` text NOT NULL,
  `cat_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`, `cat_top`, `cat_image`) VALUES
(1, 'Homem', 'no', 'man.jpg'),
(2, 'Mulher', 'yes', 'woman.jpg'),
(3, 'Crianças', 'no', 'kid.jpg'),
(9, 'Bebe', 'yes', 'baby.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(10) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_pass` varchar(255) NOT NULL,
  `customer_city` text NOT NULL,
  `customer_contact` varchar(255) NOT NULL,
  `customer_address` text NOT NULL,
  `customer_image` text NOT NULL,
  `customer_ip` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `customer_email`, `customer_pass`, `customer_city`, `customer_contact`, `customer_address`, `customer_image`, `customer_ip`) VALUES
(1, 'Ismael Valgy', 'valgyismael@gmail.com', '1234', 'Maputo', '842025446', 'Boane', 'thumb2-human-eye-4k-digital-art-creative-eye-in-night.jpg', '127.0.0.1'),
(4, 'Carimo Dev', 'carimodev@gmail.com', '1234', 'Maputo', '842025446', 'Guerra Popular', 'puma runner side.jpg', '127.0.0.1');

-- --------------------------------------------------------

--
-- Table structure for table `customer_orders`
--

CREATE TABLE `customer_orders` (
  `order_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `due_amount` int(100) NOT NULL,
  `invoice_no` int(100) NOT NULL,
  `qty` int(10) NOT NULL,
  `size` text NOT NULL,
  `order_date` date NOT NULL,
  `order_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_orders`
--

INSERT INTO `customer_orders` (`order_id`, `customer_id`, `due_amount`, `invoice_no`, `qty`, `size`, `order_date`, `order_status`) VALUES
(3, 1, 4299, 1253076906, 1, 'Large', '2021-10-16', 'Pago'),
(4, 1, 2100, 543205255, 1, 'Large', '2021-11-04', 'Pago'),
(5, 1, 4299, 543205255, 1, 'Large', '2021-11-04', 'Pago'),
(6, 1, 500, 540051301, 1, 'Medium', '2021-11-16', 'Pending'),
(7, 1, 3000, 540051301, 1, 'Medium', '2021-11-16', 'Pending'),
(8, 1, 2700, 248865517, 1, 'Medium', '2021-11-16', 'Pending'),
(9, 1, 4299, 504588068, 1, 'Small', '2021-11-18', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `home_box`
--

CREATE TABLE `home_box` (
  `box_id` int(10) NOT NULL,
  `box_title` text NOT NULL,
  `box_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `home_box`
--

INSERT INTO `home_box` (`box_id`, `box_title`, `box_desc`) VALUES
(1, 'Compre estando em Casa', 'Trazemos para você a plataforma online mais facil de fazer compras.                        '),
(2, 'Melhores Preços', 'Nos temos os melhores precos do mercado                        '),
(3, 'Produtos 100% originais', 'Other than just selling goods, we look up only for the best and original products');

-- --------------------------------------------------------

--
-- Table structure for table `manufacturers`
--

CREATE TABLE `manufacturers` (
  `manufacturer_id` int(10) NOT NULL,
  `manufacturer_title` text NOT NULL,
  `manufacturer_top` text NOT NULL,
  `manufacturer_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `manufacturers`
--

INSERT INTO `manufacturers` (`manufacturer_id`, `manufacturer_title`, `manufacturer_top`, `manufacturer_image`) VALUES
(1, 'Ayesha', 'no', 'ayesha.jpg'),
(3, 'Addidas', 'yes', 'addidas.jpg'),
(4, 'Nike', 'yes', 'nike.jpg'),
(8, 'Puma', 'yes', 'puma.jpg'),
(10, 'Converse ', 'no', 'allstar.jpg'),
(11, 'Aisha ', 'no', 'aisha.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(10) NOT NULL,
  `invoice_no` int(10) NOT NULL,
  `amount` int(10) NOT NULL,
  `payment_mode` text NOT NULL,
  `ref_no` int(10) NOT NULL,
  `code` int(10) NOT NULL,
  `payment_date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `invoice_no`, `amount`, `payment_mode`, `ref_no`, `code`, `payment_date`) VALUES
(1, 1253076906, 4299, '', 1234, 1234, '16/10/21 15:12:58'),
(2, 543205255, 2100, 'Mpesa', 1234, 1234, '04/11/21 10:42:28'),
(3, 543205255, 4299, 'Mpesa', 2345, 12345, '18/11/21 09:15:33');

-- --------------------------------------------------------

--
-- Table structure for table `pending_orders`
--

CREATE TABLE `pending_orders` (
  `order_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `invoice_no` int(10) NOT NULL,
  `product_id` text NOT NULL,
  `qty` int(10) NOT NULL,
  `size` text NOT NULL,
  `order_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pending_orders`
--

INSERT INTO `pending_orders` (`order_id`, `customer_id`, `invoice_no`, `product_id`, `qty`, `size`, `order_status`) VALUES
(3, 1, 1253076906, '12', 1, 'Large', 'Pago'),
(4, 1, 543205255, '11', 1, 'Large', 'Pago'),
(5, 1, 543205255, '12', 1, 'Large', 'Pago'),
(6, 1, 540051301, '4', 1, 'Medium', 'Pending'),
(7, 1, 540051301, '8', 1, 'Medium', 'Pending'),
(8, 1, 248865517, '7', 1, 'Medium', 'Pending'),
(9, 1, 504588068, '12', 1, 'Small', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(10) NOT NULL,
  `p_cat_id` int(10) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `manufacturer_id` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `product_title` text NOT NULL,
  `product_img1` text NOT NULL,
  `product_img2` text NOT NULL,
  `product_img3` text NOT NULL,
  `product_price` int(10) NOT NULL,
  `product_keywords` text NOT NULL,
  `product_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `p_cat_id`, `cat_id`, `manufacturer_id`, `date`, `product_title`, `product_img1`, `product_img2`, `product_img3`, `product_price`, `product_keywords`, `product_desc`) VALUES
(1, 1, 1, 10, '2021-10-07 15:15:54', 'All Star Vans', 'all_star1.png', 'all_star2.png', 'all_star3.png', 800, 'Sapatilha All Star Vans', '<p>Sapatilha All Star Vans numeros de 39-41, de <em>leda</em></p>'),
(2, 2, 2, 1, '2021-10-07 15:14:47', ' Black Muslim Dress ', 'long-abaya-dress-casual-muslim-dress-women.jpg', 'long-abaya-dress-casual-muslim-dress-women.jpg', 'vestido-2019-superior-novo-vestido-muculmano-2-pc-vestido-feminino-e-robe-kaftan-abaya-magro-muculmano-vestidos-de-festa-para-a.jpg', 5000, 'Vestido', '<p>Vestido de alta qualidade com o melhor tecido disponivel no mercado</p>'),
(3, 4, 2, 0, '2021-09-02 17:50:56', 'Red Winter', 'Red-Winter-jacket-1.png', 'Red-Winter-jacket-2.png', 'Red-Winter-jacket-3.png', 3000, 'Jaquetas para Mulher', '<p>Jaqueta de couro da melhor qualidade</p>'),
(4, 5, 1, 0, '2021-09-02 17:52:57', 'Mont Blanc Belt', 'Mont-Blanc-Belt-man-1.png', 'Mont-Blanc-Belt-man-2.png', 'Mont-Blanc-Belt-man-3.png', 500, 'Cintos', '<p>Cinto de leda</p>'),
(5, 5, 2, 0, '2021-09-02 17:54:17', 'Diamond Heart Ring', 'women-diamond-heart-ring-2.png', 'women-diamond-heart-ring-3.png', 'women-diamond-heart-ring-1.png', 8000, 'Anel de Diamante', '<p>anel de diamante original</p>'),
(7, 4, 1, 0, '2021-09-27 08:00:11', 'Man Geox Winter Jacket', 'Man-Geox-Winter-jacket-1.png', 'Man-Geox-Winter-jacket-2.png', 'Man-Geox-Winter-jacket-3.png', 2700, 'Jaqueta Homem', '<p>Jaqueta para Homem</p>'),
(8, 3, 2, 0, '2021-09-27 08:11:55', 'Waxed Cotton Coat', 'waxed-cotton-coat-woman-2.png', 'waxed-cotton-coat-woman-2.png', 'waxed-cotton-coat-woman-3.png', 3000, 'Casaco Casual Mulheres', '<p>Casacos&nbsp; Casuais para Mulheres</p>'),
(9, 1, 1, 3, '2021-09-29 10:53:17', 'Man Adidas Suarez', 'Man-Adidas-Suarez-Slop-On-3.png', 'Man-Adidas-Suarez-Slop-On-2.png', 'Man-Adidas-Suarez-Slop-On-1.png', 1600, 'Sapatilhas Addidas', '<p>Sapatilhas da Marca Addidas da melhor qualidade</p>'),
(11, 1, 1, 8, '2021-10-07 15:16:41', 'Puma Runner', 'puma runner.jpg', 'puma runner side.jpg', 'puma runner side.jpg', 2100, 'Sapatilhas para correr', '<p>Sapatilhas para correr</p>'),
(12, 2, 2, 1, '2021-10-11 13:39:14', 'Sheherza Dress', 'Sheherzadedress.jpg', 'Sheherzadedress.jpg', 'Sheherzadedress.jpg', 4299, 'Vestido Muculmano', '<p>Vestido Muculmano</p>');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `p_cat_id` int(10) NOT NULL,
  `p_cat_title` text NOT NULL,
  `p_cat_top` text NOT NULL,
  `p_cat_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`p_cat_id`, `p_cat_title`, `p_cat_top`, `p_cat_image`) VALUES
(1, 'Sapatilhas ', 'yes', 'allstar.jpg'),
(2, 'Vestidos', 'no', 'dress.jpg'),
(3, 'Casacos', 'no', 'coat.jpg'),
(4, 'Jaquetas', 'yes', 'jacket.jpg'),
(5, 'Acessorios', 'yes', 'other.jpg'),
(6, 'Carros', 'no', 'cars.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `slide_id` int(10) NOT NULL,
  `slide_name` varchar(255) NOT NULL,
  `slide_image` text NOT NULL,
  `slide_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`slide_id`, `slide_name`, `slide_image`, `slide_url`) VALUES
(1, 'home_slide', 'slide_1.png', 'http://localhost/moz_estore/index.php'),
(2, 'Shop_slide', 'slide_3.png', 'http://localhost/moz_estore/shop.php'),
(3, 'register_slide', 'slide_5.jpg', 'http://localhost/moz_estore/customer_register.php'),
(4, 'contact_slide', 'slide_4.jpg', 'http://localhost/moz_estore/contact.php');

-- --------------------------------------------------------

--
-- Table structure for table `terms`
--

CREATE TABLE `terms` (
  `termsi_id` int(10) NOT NULL,
  `terms_title` varchar(100) NOT NULL,
  `terms_link` varchar(100) NOT NULL,
  `terms_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `terms`
--

INSERT INTO `terms` (`termsi_id`, `terms_title`, `terms_link`, `terms_desc`) VALUES
(1, 'Termos & Condicoes', 'terms_conditions', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.Praesentium quasi voluptas totam, non officia quas illo animi explicabo dolor aut ercitationem, ad veritatis eos Laboriosam inventore                                    '),
(2, 'Politica de Reembolso ', 'refund_policy', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.Praesentium quasi voluptas totam, non officia quas illo animiexplicabo dolor aut xercitationem, ad veritatis eos. Laboriosam inventore quae exercitationem placeat magni.                            '),
(3, 'Promocoes & Outros', 'promo_more', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.Praesentium quasi voluptas totam, non officia quas illo animiexplicabo dolor aut xercitationem, ad veritatis eos. Laboriosam inventore quae exercitationem placeat magni.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `customer_orders`
--
ALTER TABLE `customer_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `home_box`
--
ALTER TABLE `home_box`
  ADD PRIMARY KEY (`box_id`);

--
-- Indexes for table `manufacturers`
--
ALTER TABLE `manufacturers`
  ADD PRIMARY KEY (`manufacturer_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `pending_orders`
--
ALTER TABLE `pending_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`p_cat_id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`slide_id`);

--
-- Indexes for table `terms`
--
ALTER TABLE `terms`
  ADD PRIMARY KEY (`termsi_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customer_orders`
--
ALTER TABLE `customer_orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `home_box`
--
ALTER TABLE `home_box`
  MODIFY `box_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `manufacturers`
--
ALTER TABLE `manufacturers`
  MODIFY `manufacturer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pending_orders`
--
ALTER TABLE `pending_orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `p_cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `slide_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `terms`
--
ALTER TABLE `terms`
  MODIFY `termsi_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
