-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 31, 2020 at 07:00 PM
-- Server version: 5.5.44-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `f34ee`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `cat_name`) VALUES
(1, 'Cakes'),
(2, 'Cookies'),
(3, 'Others');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contactno` int(8) NOT NULL,
  `message` varchar(500) NOT NULL,
  `currentdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`name`, `email`, `contactno`, `message`, `currentdate`) VALUES
('sdd', 'ww@hotmail.co.sd', 89998999, 'erlkceklrsekjdfkscmdnambchjgw,mcbn,dhqklsndmsbfjkhlkns :)', '2020-10-31');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dish_name` varchar(50) NOT NULL,
  `price` double(5,2) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `dish_description` varchar(255) DEFAULT NULL,
  `available` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `dish_name`, `price`, `cat_id`, `dish_description`, `available`) VALUES
(1, 'Classic New York Cheesecake', 35.00, 1, 'Our Classic New York Cheesecakes have three layers: a Graham Cracker Crust, cream cheese filling and lightly sweetened sour cream topping', 1),
(2, 'Double Chocolate Cake', 40.50, 1, 'This moist chocolate cake is made with milk and dark chocolate', 1),
(3, 'Strawberry Shortcake', 32.00, 1, 'Classic vanilla cake filled with strawberry cream and topped with fresh strawberries', 1),
(4, 'Triple Chocolate Chip Cookies', 18.00, 2, '250g per bottle, filled with three types of chocolate: white, milk and dark', 1),
(5, 'Raspberry Thumbprint Cookies', 18.00, 2, '250g per bottle, buttery vanilla cookies lined with homemade raspberry jam in the center', 1),
(6, 'Blueberry Crumble Muffin', 12.00, 3, 'Blueberry muffins topped with a sugary crumble (4pcs)', 1),
(7, 'Butter Croissant', 18.00, 3, 'Buttery and flaky pastry best eaten alone or with a sweet jam', 1),
(8, 'New Product', 13.00, 3, 'Coming Soon: what happens if i extend this text?', 0);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `amount` decimal(11,2) NOT NULL,
  `order_date` date NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `customer_id`, `amount`, `order_date`, `status`) VALUES
(1, 1, 107.00, '2020-10-28', 0),
(2, 1, 429.50, '2020-10-28', 0),
(3, 4, 81.00, '2020-10-31', 0);

-- --------------------------------------------------------

--
-- Table structure for table `orderitem`
--

CREATE TABLE IF NOT EXISTS `orderitem` (
  `orderid` int(11) NOT NULL,
  `itemid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderitem`
--

INSERT INTO `orderitem` (`orderid`, `itemid`, `quantity`) VALUES
(1, 1, 1),
(1, 4, 2),
(1, 6, 3),
(2, 1, 1),
(2, 2, 5),
(2, 3, 6),
(3, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `contact` int(8) NOT NULL,
  `user_role` tinyint(4) NOT NULL DEFAULT '0',
  `h_password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `fullname`, `contact`, `user_role`, `h_password`) VALUES
(1, 'testemail@yahoo.com', 'Testing Name', 12345678, 0, '$2y$10$1/HMBSOQrnmX3wWneW5mi.vCj3V/o.JvweOR8kzseqwXvE57C2i1y'),
(2, 'test@test.com', 'Testing Name two', 42345678, 1, '$2y$10$UMDKymZcMKqj7cEvCqNEGuUh0C.3e4Nji6sYOQpf1uKjGHKaPfm9i'),
(3, 'jngo@gmail.com', 'Jeremy Ngo', 12345678, 0, '$2y$10$maNxlusAPi/Mz3Md80rnQOPpHoMQCuvtOULC5fi7ZfYVIe3U8ljYK'),
(4, 'admin@hello.com', 'Admin', 66662323, 1, '$2y$10$.fGLOXjn46XdjxvIS2vhGePlVcD2Y.ktYwERyN91/5IFnO9Rrv1lu');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
