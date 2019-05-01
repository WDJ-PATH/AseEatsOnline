-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 28, 2019 at 08:21 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `accase`
--

-- --------------------------------------------------------

--
-- Table structure for table `acc_ase`
--

DROP TABLE IF EXISTS `acc_ase`;
CREATE TABLE IF NOT EXISTS `acc_ase` (
  `fname` varchar(60) NOT NULL,
  `roll` varchar(60) NOT NULL,
  `mobileno` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `cpw` varchar(60) NOT NULL,
  PRIMARY KEY (`roll`),
  UNIQUE KEY `mobileno` (`mobileno`,`email`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `acc_ase`
--

INSERT INTO `acc_ase` (`fname`, `roll`, `mobileno`, `email`, `password`, `cpw`) VALUES
('Karthika Manoj', 'AM.EN.U4CSE16131', '9447415549', 'karthikaaamanoj@gmail.com', 'apple123', 'apple123'),
('ccc', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int(255) NOT NULL,
  `order_date` datetime(6) NOT NULL,
  `token` varchar(50) NOT NULL,
  `roll` varchar(25) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `order_status` varchar(50) NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders_items`
--

DROP TABLE IF EXISTS `orders_items`;
CREATE TABLE IF NOT EXISTS `orders_items` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`order_id`,`product_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `php_users_login`
--

DROP TABLE IF EXISTS `php_users_login`;
CREATE TABLE IF NOT EXISTS `php_users_login` (
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `php_users_login`
--

INSERT INTO `php_users_login` (`email`, `password`) VALUES
('karthikaaamanoj@gmail.com', 'apple123'),
('', '');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_description` text NOT NULL,
  `product_price` decimal(10,2) NOT NULL,
  PRIMARY KEY (`product_id`),
  UNIQUE KEY `product_name` (`product_name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_image`, `product_description`, `product_price`) VALUES
(1, 'Veg Fried Rice', 'veg_fried_rice.jpg', 'Rice sauteed with mixed vegetables and sauces.Served with choice of pickle,salad and ketchup.', '55.00'),
(2, 'Egg Fried Rice', 'egg_fried_rice.jpg', 'Rice sauteed with vegetables and sauces topped with scrambled eggs and served with salad,ketchup and pickle.', '65.00'),
(3, 'Veg Noodles', 'veg_noodle.jpg', 'Ramen noodles cooked with mixed vegetables and sauces served with choice of pickle,salad and ketchup.', '65.00'),
(4, 'Egg Noodles', 'egg_noodle.jpg', 'Ramen noodles cooked with vegetables and sauces topped with scrambled eggs.\r\nServed with pickle,salad and ketchup.', '70.00'),
(5, 'Veg Biriyani', 'veg_biriyani.jpg', 'Basmati rice cooked with mixed vegetables an Indian spices. Served with choice of pickle and salad.', '55.00'),
(6, 'Egg Biriyani', 'egg_biriyani.jpg', 'Basmati rice cooked with vegetables and Indian spices served with a boiled egg , salad and pickle.', '65.00'),
(7, 'Masala Dosa', 'masala_dosa.jpg', 'Rice batter cooked over a stone tawa,thinly fried to perfection and filled with potato masala. Served with lentil vegetable stew and ground coconut chutney.', '45.00'),
(8, 'Ghee Roast', 'ghee_roa.jpg', 'One of the most popular varieties of dosa in India with rich aroma of ghee and a wonderful texture that is crisp and golden colored on the outer side and slightly softer inside. ', '40.00'),
(9, 'Khar Dosa', 'khar_dosa.jpg', 'Dosa with a flavorful chutney powder filling prepared using curry leaves, red chili, gram dal, urad dal, dry coconut, tamarind etc served with Sambhar and grounded coconut chutney.', '45.00'),
(10, 'Puttu', 'putt.jpg', 'A dish of rice flour layered with freshly grated coconut and steamed in a piece of bamboo or a metal vessel. ', '35.00'),
(11, 'Puri', 'poori.jpg', 'A round piece of bread made of unleavened wheat flour, deep-fried and served usually with vegetables.', '35.00'),
(12, 'Chappati', 'chappati.jpg', 'Wheat flour spread into thin disks and cooked over a medium flame. A  warm chappati is irresistible with favorite curry.', '10.00'),
(13, 'Porotta', 'porotta.jpg', 'Popular Indian bread cooked with flour.All-time favorite among Keralites.', '8.00'),
(14, 'Appam', 'appam.jpg', 'A type of pancake,made with fermented rice batter and coconut milk. ', '10.00'),
(15, 'Egg curry', 'egg_cury.jpg', 'Boiled eggs in thick gravy of onion,coconut milk,curry leaves and the famous Indian spices.', '35.00'),
(16, 'Kadala Curry', 'kadala_cury.jpg', 'Black chana cooked with coconut milk,red chillies,pearl onions and curry leaves along with Indian spices.', '35.00'),
(17, 'Paneer Kurma', 'paneer_kuruma.jpg', 'The spicy Indian curry of mughlai cuisine ; Cottage cheese cooked with exotic Indian spices and herbs served with a dollop of butter on top.', '45.00'),
(18, 'Tea', 'teaa.jpg', 'The Great Indian Chai ;\r\nhot, creamy, fragrant with black tea and fresh cardamom , Chai is a way of life in India.', '10.00'),
(19, 'Coffee', 'coffee.jpg', 'If you have got this coffee,you don\'t need an inspirational quote to get your day started!', '10.00'),
(20, 'Egg Puffs', 'egg_puff.jpg', 'Puff pastry filled with an onion masala and boiled egg.', '12.00'),
(21, 'Veg Puffs', 'veg_puff.jpg', 'Puff pastry filled with a mixed vegetable masala served with ketchup.', '10.00'),
(22, ' Veg Cutlet', 'veg_cutlets.jpg', 'A quick snack recipe of crispy vegetable patties that can be served on their own with a green chutney or dip.', '12.00'),
(23, 'Vada', 'vada.jpg', 'A popular South Indian savory fried doughnut shaped tea-time snack usually served with chutney.', '10.00'),
(24, 'Pazhampori', 'pazhamporii.jpg', 'A Kerala snack where ripe banana slices are dipped in a flour batter and deep fried to get a crispy coating ', '12.00');

-- --------------------------------------------------------

--
-- Table structure for table `token`
--

DROP TABLE IF EXISTS `token`;
CREATE TABLE IF NOT EXISTS `token` (
  `order_id` int(255) NOT NULL,
  `token` varchar(50) NOT NULL,
  PRIMARY KEY (`order_id`,`token`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
