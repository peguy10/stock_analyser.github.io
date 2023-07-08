-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2023 at 09:45 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stock_analyser`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id_cat` int(11) NOT NULL,
  `name_category` varchar(50) NOT NULL,
  `code_category` varchar(100) NOT NULL,
  `description_category` text NOT NULL,
  `image_category` varchar(255) NOT NULL,
  `created_by` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id_cat`, `name_category`, `code_category`, `description_category`, `image_category`, `created_by`) VALUES
(1, 'ORDINATEUR', 'CAT1', 'Categorie des ordinateurs', '../assets/img/uploads/NjPSM.png', 'MILLENA'),
(2, 'TELEPHONE', 'CAT2', 'Computers Description', '../assets/img/uploads/VmEAR.png', 'MILLENA'),
(3, 'ELECTRONIQUE', 'CAT3', 'vente electronique', '../assets/img/uploads/20943770.jpg', 'MILLENA');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id_` int(11) NOT NULL,
  `name_customer` varchar(30) NOT NULL,
  `email_customer` int(11) NOT NULL,
  `phone_customer` varchar(11) NOT NULL,
  `country_customer` varchar(30) NOT NULL,
  `city_customer` varchar(30) NOT NULL,
  `address_customer` varchar(50) NOT NULL,
  `description_customer` varchar(50) NOT NULL,
  `avatar_customer` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id_c` int(11) NOT NULL,
  `name_customer` varchar(30) NOT NULL,
  `email_customer` varchar(30) NOT NULL,
  `phone_customer` int(30) NOT NULL,
  `country_customer` varchar(30) NOT NULL,
  `city_customer` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id_c`, `name_customer`, `email_customer`, `phone_customer`, `country_customer`, `city_customer`) VALUES
(9, 'JOHN DOE', 'johndoe@gmail.com', 687878787, 'India', 'City 2'),
(10, 'JANE DOE', 'janedoe@gmail.com', 686868686, 'USA', 'City 1');

-- --------------------------------------------------------

--
-- Table structure for table `product_list`
--

CREATE TABLE `product_list` (
  `id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `sku` varchar(10) NOT NULL,
  `id_categorie` int(100) NOT NULL,
  `price` double NOT NULL,
  `quantity` int(100) NOT NULL,
  `id_user` int(100) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `tax` int(11) NOT NULL,
  `status` varchar(100) NOT NULL,
  `descriptions` varchar(100) NOT NULL,
  `id_fournisseur` int(11) NOT NULL,
  `date_entree` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_list`
--

INSERT INTO `product_list` (`id`, `product_name`, `sku`, `id_categorie`, `price`, `quantity`, `id_user`, `product_image`, `tax`, `status`, `descriptions`, `id_fournisseur`, `date_entree`) VALUES
(1, 'macos', 'PRO369', 1, 350000, 15, 1, '../assets/img/uploads/5.jpg', 10, '', 'caracteristique : DD : 250Gb RAM: 4Go', 9, '2023-07-05'),
(2, 'iPhone xR', 'PRO697', 2, 100000, 5, 1, '../assets/img/uploads/11.jpg', 20, '', 'STOCKAGE 128Gb Ram : 8Gb', 10, '2023-07-05'),
(3, 'DELL', 'PRO327', 1, 110000, 5, 2, '../assets/img/uploads/2.jpg', 15, '', 'DD : 500GB RAM : 8GB', 9, '2023-07-05'),
(4, 'iPhone 12', 'PRO218', 2, 210000, 5, 2, '../assets/img/uploads/TU.jpg', 10, '', 'STOCHAGE : 128 GB RAM : 6GB', 10, '2023-07-05'),
(5, 'Jorden Ramsey', 'PRO449', 2, 100000, 592, 3, '../assets/img/uploads/TR.jpg', 15, '', 'Voluptatem qui aperi', 10, '2023-07-08');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity_sale` int(11) NOT NULL,
  `sale_price` int(20) NOT NULL,
  `sale_date` date NOT NULL,
  `ref_sale` varchar(50) NOT NULL,
  `status_sale` varchar(50) NOT NULL,
  `id_client` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `product_id`, `quantity_sale`, `sale_price`, `sale_date`, `ref_sale`, `status_sale`, `id_client`, `id_user`) VALUES
(1, 4, 2, 231000, '2023-07-06', 'SL70086', 'en cour...', 10, 2);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id_f` int(30) NOT NULL,
  `name_supplier` varchar(30) NOT NULL,
  `email_supplier` varchar(30) NOT NULL,
  `phone_supplier` int(30) NOT NULL,
  `country_supplier` varchar(30) NOT NULL,
  `city_supplier` varchar(30) NOT NULL,
  `description_supplier` varchar(30) NOT NULL,
  `avatar_supplier` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id_f`, `name_supplier`, `email_supplier`, `phone_supplier`, `country_supplier`, `city_supplier`, `description_supplier`, `avatar_supplier`) VALUES
(9, 'PEGUY NKOUEBO', 'n.peguy@inov.cm', 678563771, 'India', 'City 2', 'lkk', '../assets/img/uploads/4880440.jpg'),
(10, 'Millena', 'millena@gmil.com', 678563771, 'India', 'City 2', 'vente des telephones', '../assets/img/uploads/20943770.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nom`, `email`, `mot_de_passe`) VALUES
(1, 'PEGUY', 'peguynkouebo100@gmail.com', '$2y$10$wxtRBF7jAJknuGGKNu5q1OLpgLMB82r.9M8G/i8AVGbhtoNyZLflK'),
(2, 'MILLENA', 'millena@gmail.com', '$2y$10$V5DXYIh86q1E4Bzy5VjyRejONOHZTTd.SXxCSf074oQu9ZI2AQ6iu'),
(3, 'JOHN', 'john@gmail.com', '$2y$10$GVCZQQ/GbX9FoUj9Tt1LC.sdI00hak5qnD9/nAkU1zD5atzb1gzpW');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_cat`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_c`);

--
-- Indexes for table `product_list`
--
ALTER TABLE `product_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_categorie` (`id_categorie`),
  ADD KEY `fk_user` (`id_user`),
  ADD KEY `fk_fournisseur` (`id_fournisseur`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_sales_products` (`product_id`),
  ADD KEY `fk_sales_customers` (`id_client`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_f`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id_cat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id_c` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `product_list`
--
ALTER TABLE `product_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_f` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product_list`
--
ALTER TABLE `product_list`
  ADD CONSTRAINT `product_list_ibfk_1` FOREIGN KEY (`id_categorie`) REFERENCES `categories` (`id_cat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_list_ibfk_2` FOREIGN KEY (`id_fournisseur`) REFERENCES `supplier` (`id_f`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `fk_sales_customers` FOREIGN KEY (`id_client`) REFERENCES `customer` (`id_c`),
  ADD CONSTRAINT `fk_sales_products` FOREIGN KEY (`product_id`) REFERENCES `product_list` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sales_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
