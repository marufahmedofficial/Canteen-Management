-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2023 at 09:03 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uits_online_canteen`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adm_id` int(222) NOT NULL,
  `username` varchar(222) NOT NULL,
  `password` varchar(222) NOT NULL,
  `email` varchar(222) NOT NULL,
  `code` varchar(222) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adm_id`, `username`, `password`, `email`, `code`, `date`) VALUES
(1, 'admin', 'CAC29D7A34687EB14B37068EE4708E7B', 'admin@mail.com', '', '2022-05-27 13:21:52'),
(2, 'admin2', '25d55ad283aa400af464c76d713c07ad', 'admin2@gmail.com', '', '2023-05-16 15:30:31');

-- --------------------------------------------------------

--
-- Table structure for table `dishes`
--

CREATE TABLE `dishes` (
  `d_id` int(222) NOT NULL,
  `c_id` int(222) NOT NULL,
  `title` varchar(222) NOT NULL,
  `slogan` varchar(222) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `img` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `dishes`
--

INSERT INTO `dishes` (`d_id`, `c_id`, `title`, `slogan`, `price`, `img`) VALUES
(1, 1, 'Yorkshire Lamb Patties', 'Lamb patties which melt in your mouth, and are quick and easy to make. Served hot with a crisp salad.', 14.00, '62908867a48e4.jpg'),
(3, 4, 'Chicken Madeira', 'Chicken Madeira, like Chicken Marsala, is made with chicken, mushrooms, and a special fortified wine. But, the wines are different;', 23.00, '62908bdf2f581.jpg'),
(4, 1, 'Stuffed Jacket Potatoes', 'Deep fry whole potatoes in oil for 8-10 minutes or coat each potato with little oil. Mix the onions, garlic, tomatoes and mushrooms. Add yoghurt, ginger, garlic, chillies, coriander', 8.00, '62908d393465b.jpg'),
(5, 2, 'Pink Spaghetti Gamberoni', 'Spaghetti with prawns in a fresh tomato sauce. This dish originates from Southern Italy and with the combination of prawns, garlic, chilli and pasta. Garnish each with remaining tablespoon parsley.', 21.00, '606d7491a9d13.jpg'),
(6, 2, 'Cheesy Mashed Potato', 'Deliciously Cheesy Mashed Potato. The ultimate mash for your Thanksgiving table or the perfect accompaniment to vegan sausage casserole. Everyone will love it\'s fluffy, cheesy.', 5.00, '606d74c416da5.jpg'),
(7, 2, 'Crispy Chicken Strips', 'Fried chicken strips, served with special honey mustard sauce.', 8.00, '606d74f6ecbbb.jpg'),
(8, 2, 'Lemon Grilled Chicken And Pasta', 'Marinated rosemary grilled chicken breast served with mashed potatoes and your choice of pasta.', 11.00, '606d752a209c3.jpg'),
(9, 3, 'Vegetable Fried Rice', 'Chinese rice wok with cabbage, beans, carrots, and spring onions.', 5.00, '606d7575798fb.jpg'),
(10, 3, 'Prawn Crackers', '12 pieces deep-fried prawn crackers', 7.00, '606d75a7e21ec.jpg'),
(11, 3, 'Spring Rolls', 'Lightly seasoned shredded cabbage, onion and carrots, wrapped in house made spring roll wrappers, deep fried to golden brown.', 6.00, '606d75ce105d0.jpg'),
(12, 3, 'Manchurian Chicken', 'Chicken pieces slow cooked with spring onions in our house made manchurian style sauce.', 11.00, '606d7600dc54c.jpg'),
(13, 4, ' Buffalo Wings', 'Fried chicken wings tossed in spicy Buffalo sauce served with crisp celery sticks and Blue cheese dip.', 11.00, '606d765f69a19.jpg'),
(14, 4, 'Mac N Cheese Bites', 'Served with our traditional spicy queso and marinara sauce.', 9.00, '606d768a1b2a1.jpg'),
(15, 4, 'Signature Potato Twisters', 'Spiral sliced potatoes, topped with our traditional spicy queso, Monterey Jack cheese, pico de gallo, sour cream and fresh cilantro.', 6.00, '606d76ad0c0cb.jpg'),
(16, 4, 'Meatballs Penne Pasta', 'Garlic-herb beef meatballs tossed in our house-made marinara sauce and penne pasta topped with fresh parsley.', 10.00, '606d76eedbb99.jpg'),
(17, 5, 'Roti', 'This is paratha type roti for your breakfast', 10.00, '64639e167d2e9.jpg'),
(18, 5, 'Dal', 'This is vey awesome spicy dal breakfast', 15.00, '646264be29f29.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `remark`
--

CREATE TABLE `remark` (
  `id` int(11) NOT NULL,
  `frm_id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `remark` mediumtext NOT NULL,
  `remarkDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `remark`
--

INSERT INTO `remark` (`id`, `frm_id`, `status`, `remark`, `remarkDate`) VALUES
(1, 2, 'in process', 'none', '2022-05-01 05:17:49'),
(2, 3, 'in process', 'none', '2022-05-27 11:01:30'),
(3, 2, 'closed', 'thank you for your order!', '2022-05-27 11:11:41'),
(4, 3, 'closed', 'none', '2022-05-27 11:42:35'),
(5, 4, 'in process', 'none', '2022-05-27 11:42:55'),
(6, 1, 'rejected', 'none', '2022-05-27 11:43:26'),
(7, 7, 'in process', 'none', '2022-05-27 13:03:24'),
(8, 8, 'in process', 'none', '2022-05-27 13:03:38'),
(9, 9, 'rejected', 'thank you', '2022-05-27 13:03:53'),
(10, 7, 'closed', 'thank you for your ordering with us', '2022-05-27 13:04:33'),
(11, 8, 'closed', 'thanks ', '2022-05-27 13:05:24'),
(12, 5, 'closed', 'none', '2022-05-27 13:18:03'),
(13, 16, 'closed', 'ok', '2023-05-14 15:32:04');

-- --------------------------------------------------------

--
-- Table structure for table `res_category`
--

CREATE TABLE `res_category` (
  `c_id` int(222) NOT NULL,
  `c_name` varchar(222) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `res_category`
--

INSERT INTO `res_category` (`c_id`, `c_name`, `date`) VALUES
(1, 'Continental', '2022-05-27 08:07:35'),
(2, 'Italian', '2021-04-07 08:45:23'),
(3, 'Chinese', '2021-04-07 08:45:25'),
(4, 'American', '2021-04-07 08:45:28'),
(5, 'Breakfast', '2023-05-15 16:44:11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(222) NOT NULL,
  `username` varchar(222) NOT NULL,
  `f_name` varchar(222) NOT NULL,
  `l_name` varchar(222) NOT NULL,
  `email` varchar(222) NOT NULL,
  `phone` varchar(222) NOT NULL,
  `password` varchar(222) NOT NULL,
  `address` text NOT NULL,
  `status` int(222) NOT NULL DEFAULT 1,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `username`, `f_name`, `l_name`, `email`, `phone`, `password`, `address`, `status`, `date`) VALUES
(1, 'eric', 'Eric', 'Lopez', 'eric@mail.com', '1458965547', 'a32de55ffd7a9c4101a0c5c8788b38ed', '87 Armbrester Drive', 1, '2022-05-27 08:40:36'),
(2, 'harry', 'Harry', 'Holt', 'harryh@mail.com', '3578545458', 'bc28715006af20d0e961afd053a984d9', '33 Stadium Drive', 1, '2022-05-27 08:41:07'),
(3, 'james', 'James', 'Duncan', 'james@mail.com', '0258545696', '58b2318af54435138065ee13dd8bea16', '67 Hiney Road', 1, '2022-05-27 08:41:37'),
(4, 'christine', 'Christine', 'Moore', 'christine@mail.com', '7412580010', '5f4dcc3b5aa765d61d8327deb882cf99', '114 Test Address', 1, '2022-05-01 05:14:42'),
(5, 'scott', 'Scott', 'Miller', 'scott@mail.com', '7896547850', '5f4dcc3b5aa765d61d8327deb882cf99', '63 Charack Road', 1, '2022-05-27 10:53:51'),
(6, 'liamoore', 'Liam', 'Moore', 'liamoore@mail.com', '7896969696', '5f4dcc3b5aa765d61d8327deb882cf99', '122 Bleck Street', 1, '2022-05-27 12:57:00'),
(7, 'Anto', 'An', 'To', 'anto@gmail.com', '01867769848', '25d55ad283aa400af464c76d713c07ad', 'Dhaka, Bangladesh', 1, '2023-05-13 08:12:12');

-- --------------------------------------------------------

--
-- Table structure for table `users_orders`
--

CREATE TABLE `users_orders` (
  `o_id` int(222) NOT NULL,
  `u_id` int(222) NOT NULL,
  `title` varchar(222) NOT NULL,
  `quantity` int(222) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `status` varchar(222) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `d_loc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users_orders`
--

INSERT INTO `users_orders` (`o_id`, `u_id`, `title`, `quantity`, `price`, `status`, `date`, `d_loc`) VALUES
(1, 4, 'Spring Rolls', 2, 6.00, 'rejected', '2022-05-27 11:43:26', ''),
(2, 4, 'Prawn Crackers', 1, 7.00, 'closed', '2022-05-27 11:11:41', ''),
(3, 5, 'Chicken Madeira', 1, 23.00, 'closed', '2022-05-27 11:42:35', ''),
(4, 5, 'Cheesy Mashed Potato', 1, 5.00, 'in process', '2022-05-27 11:42:55', ''),
(5, 5, 'Meatballs Penne Pasta', 1, 10.00, 'closed', '2022-05-27 13:18:03', ''),
(6, 5, 'Yorkshire Lamb Patties', 1, 14.00, NULL, '2022-05-27 11:40:51', ''),
(7, 6, 'Yorkshire Lamb Patties', 1, 14.00, 'closed', '2022-05-27 13:04:33', ''),
(8, 6, 'Lobster Thermidor', 1, 36.00, 'closed', '2022-05-27 13:05:24', ''),
(9, 6, 'Stuffed Jacket Potatoes', 1, 8.00, 'rejected', '2022-05-27 13:03:53', ''),
(16, 7, 'Spring Rolls', 1, 6.00, 'closed', '2023-05-14 15:32:04', ''),
(17, 7, 'Yorkshire Lamb Patties', 1, 14.00, NULL, '2023-05-15 14:37:42', ''),
(18, 7, 'Yorkshire Lamb Patties', 1, 14.00, NULL, '2023-05-15 17:45:40', ''),
(19, 7, 'Roti', 1, 10.00, NULL, '2023-05-15 17:46:03', ''),
(20, 7, 'Dal', 1, 15.00, NULL, '2023-05-15 17:46:03', ''),
(21, 7, 'Vegetable Fried Rice', 1, 5.00, NULL, '2023-05-16 14:52:05', ''),
(22, 7, 'Spring Rolls', 1, 6.00, NULL, '2023-05-16 14:52:05', ''),
(23, 7, 'Roti', 2, 10.00, NULL, '2023-06-04 15:54:30', 'Room 411'),
(24, 7, 'Dal', 1, 15.00, NULL, '2023-06-04 15:54:30', 'Room 411'),
(25, 7, 'Chicken Madeira', 2, 23.00, NULL, '2023-07-04 06:03:31', '7'),
(26, 7, 'Chicken Madeira', 1, 23.00, NULL, '2023-07-04 07:01:15', '5'),
(27, 7, ' Buffalo Wings', 1, 11.00, NULL, '2023-07-04 07:01:15', '5');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adm_id`);

--
-- Indexes for table `dishes`
--
ALTER TABLE `dishes`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `remark`
--
ALTER TABLE `remark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `res_category`
--
ALTER TABLE `res_category`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `users_orders`
--
ALTER TABLE `users_orders`
  ADD PRIMARY KEY (`o_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adm_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dishes`
--
ALTER TABLE `dishes`
  MODIFY `d_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `remark`
--
ALTER TABLE `remark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `res_category`
--
ALTER TABLE `res_category`
  MODIFY `c_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users_orders`
--
ALTER TABLE `users_orders`
  MODIFY `o_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
