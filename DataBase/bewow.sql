-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2022 at 10:10 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bewow`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `idAdmin` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `adminUid` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`idAdmin`, `nom`, `email`, `adminUid`, `password`, `image`) VALUES
(3, 'amal', 'amal@gmail.com', 'amal1', '202cb962ac59075b964b07152d234b70', 'woman.jpg'),
(9, 'Said', 'said@gmail.com', 'said123', '202cb962ac59075b964b07152d234b70', 'IMG-61c9fbb820aa11.42804496.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `idChart` int(11) NOT NULL,
  `idProMen` int(11) DEFAULT NULL,
  `idProWomen` int(11) DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `userId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`idChart`, `idProMen`, `idProWomen`, `date`, `userId`) VALUES
(22, 4, NULL, '2022-02-25 19:32:16', 3);

-- --------------------------------------------------------

--
-- Table structure for table `commande`
--

CREATE TABLE `commande` (
  `idCmd` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `idProMen` int(11) DEFAULT NULL,
  `idProWomen` int(11) DEFAULT NULL,
  `idDeliver` int(11) DEFAULT NULL,
  `dateLivraison` date NOT NULL,
  `adresseLivraison` varchar(100) NOT NULL,
  `qte` int(11) NOT NULL,
  `prix` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `commande`
--

INSERT INTO `commande` (`idCmd`, `userId`, `idProMen`, `idProWomen`, `idDeliver`, `dateLivraison`, `adresseLivraison`, `qte`, `prix`) VALUES
(1, 3, 5, NULL, 1, '2022-03-04', 'Casablanca,Oulfa,Zoubir', 1, 200),
(2, 3, NULL, 1, 1, '2022-03-04', 'Casablanca,Oulfa,Zoubir', 1, 450);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `createdOn` datetime NOT NULL DEFAULT current_timestamp(),
  `idPro` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `deliver`
--

CREATE TABLE `deliver` (
  `idDeliver` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `tel` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `ddn` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `deliver`
--

INSERT INTO `deliver` (`idDeliver`, `nom`, `prenom`, `email`, `tel`, `image`, `ddn`) VALUES
(1, 'Hassan', 'Moutawakil', 'hassan@gmail.com', '0655443322', 'IMG-61bf2e7eab7097.94235149.jpg', '1989-09-10');

-- --------------------------------------------------------

--
-- Table structure for table `favoris_men`
--

CREATE TABLE `favoris_men` (
  `idFav` int(11) NOT NULL,
  `idPro` int(11) DEFAULT NULL,
  `userId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `favoris_men`
--

INSERT INTO `favoris_men` (`idFav`, `idPro`, `userId`) VALUES
(5, 8, 3),
(23, 4, 3),
(25, 10, 3);

-- --------------------------------------------------------

--
-- Table structure for table `favoris_women`
--

CREATE TABLE `favoris_women` (
  `idFav` int(11) NOT NULL,
  `idPro` int(11) DEFAULT NULL,
  `userId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `favoris_women`
--

INSERT INTO `favoris_women` (`idFav`, `idPro`, `userId`) VALUES
(2, 23, 3);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `message` varchar(300) DEFAULT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `message`, `userid`) VALUES
(3, 'Thank you very much. I am very pleased with the Website and working with BEWOW has been great. You have exceeded my expectations!', 3),
(5, 'I love everything about this website, looking forward to more enhancements!!! 🙌', 20),
(10, 'Online shopping is very helpful. Verity of goods are in Online shopping. And it is even greater with BEWOW', 15);

-- --------------------------------------------------------

--
-- Table structure for table `product_men`
--

CREATE TABLE `product_men` (
  `idPro` int(11) NOT NULL,
  `marque` varchar(100) NOT NULL,
  `titre` varchar(100) NOT NULL,
  `taille` varchar(100) NOT NULL,
  `prix` varchar(100) NOT NULL,
  `image` varchar(180) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_men`
--

INSERT INTO `product_men` (`idPro`, `marque`, `titre`, `taille`, `prix`, `image`, `description`) VALUES
(2, 'zara', 'jeans', 'L', '350', 'IMG-61bdea9e433bd1.76479126.jpg', 'Good looking jeans Jeans are a type of pants traditionally made from denim (a kind of cotton fabric). ... The defining feature of most jeans is that they\'re made out of some kind of denim or denim-like fabric. Most jeans have seams and pockets that are reinforced with rivets—small metal fasteners.'),
(3, 'H&M', 'Hoodies', 'XL', '750', 'IMG-61bdf095a1aaf7.35215282.jpeg', 'A hoodie (in some cases it is also spelled hoody and alternatively known as a hooded sweatshirt) is a sweatshirt with a hood. Hoodies often include a muff sewn onto the lower front, and (usually) a drawstring to adjust the hood opening.'),
(4, 'Zara', 'T-Shirts', 'L', '200', 'IMG-61f5ddbde95ea5.78750221.jpg', 'a high quality T-shirt 100% cotton'),
(5, 'H&M', 'T-Shirts', 'L', '200', 'IMG-61f5de97c04c92.09970975.jpg', 'a high quality T-shirt 100% cotton'),
(6, 'Pull&Bear', 'T-Shirts', 'L', '300', 'IMG-61f5deb795dc65.54833795.jpg', 'a high quality T-shirt 100% cotton'),
(7, 'Zara', 'T-Shirts', 'XL', '250', 'IMG-61f5ded7c2ecf8.45048374.jpeg', 'a high quality T-shirt 100% cotton'),
(8, 'Pull&Bear', 'Hoodies', 'L', '350', 'IMG-61f5df289a0066.63883843.jpg', 'a high quality Hoodie 100% cotton!'),
(9, 'H&M', 'Hoodies', 'L', '300', 'IMG-61f5df3f37dfd3.28285969.jpg', 'a high quality T-shirt 100% cotton'),
(10, 'Zara', 'Hoodies', 'L', '400', 'IMG-61f5df54598596.90338473.jpg', 'a high quality T-shirt 100% cotton!'),
(11, 'Zara', 'Hoodies', 'L', '300', 'IMG-61f5df6683efa3.17506175.jpg', 'a high quality T-shirt 100% cotton'),
(12, 'H&M', 'Hoodies', 'L', '390', 'IMG-61f5df7bce99e7.92802661.jpg', 'a high quality T-shirt 100% cotton!'),
(13, 'Bershka', 'Hoodies', 'L', '300', 'IMG-61f5df9597e3e2.58097923.jpg', 'a high quality T-shirt 100% cotton!');

-- --------------------------------------------------------

--
-- Table structure for table `product_women`
--

CREATE TABLE `product_women` (
  `idPro` int(11) NOT NULL,
  `marque` varchar(100) NOT NULL,
  `titre` varchar(100) NOT NULL,
  `taille` varchar(100) NOT NULL,
  `prix` varchar(100) NOT NULL,
  `image` varchar(180) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_women`
--

INSERT INTO `product_women` (`idPro`, `marque`, `titre`, `taille`, `prix`, `image`, `description`) VALUES
(1, 'zara', 'jeans', 'L', '450', 'IMG-61bdc95244fde9.56585077.jpeg', 'Good looking jeans Jeans are a type of pants traditionally made from denim (a kind of cotton fabric). ... The defining feature of most jeans is that they\'re made out of some kind of denim or denim-like fabric. Most jeans have seams and pockets that are reinforced with rivets—small metal fasteners.'),
(2, 'H&M', 'Hoodies', 'L', '400', 'IMG-61f8451cbb2cc5.42619358.jpg', 'Top-tier quality hoodies 100% cotton '),
(3, 'H&M', 'Hoodies', 'L', '300', 'IMG-621b6d101f2801.58511893.jpg', 'Top-tier quality hoodies 100% cotton '),
(4, 'Zara', 'Hoodies', 'L', '350', 'IMG-621b6d709a7730.74410303.jpg', 'Top-tier quality hoodies 100% cotton '),
(5, 'H&M', 'Hoodies', 'L', '400', 'IMG-621b6d845f5b66.12689134.jpeg', 'Top-tier quality hoodies 100% cotton '),
(6, 'H&M', 'Hoodies', 'L', '500', 'IMG-621b6d98a1d1a7.21993046.jpg', 'Top-tier quality hoodies 100% cotton '),
(7, 'Zara', 'Jacket', 'L', '500', 'IMG-621b6dc5752543.51638763.jpg', 'Top-tier quality Jackets 100% leather '),
(8, 'H&M', 'Jacket', 'L', '400', 'IMG-621b6eb9af93e5.20704073.jpg', 'Top-tier quality Jacket fashionable,lighter, tighter-fitting'),
(9, 'Zara', 'Jacket', 'L', '300', 'IMG-621b6ed9a67964.68460740.jpg', 'Top-tier quality Jacket fashionable,lighter, tighter-fitting'),
(10, 'H&M', 'Jacket', 'L', '400', 'IMG-621b6ef062cf14.44957197.jpg', 'Top-tier quality Jacket fashionable,lighter, tighter-fitting'),
(11, 'Pull&Bear', 'Jeans', 'L', '400', 'IMG-621b6f0de4b5d0.30683139.jpg', 'Top-tier quality Jacket fashionable,lighter, tighter-fitting'),
(12, 'H&M', 'Jeans', 'L', '400', 'IMG-621b6f45b72106.88267355.jpg', 'Top-tier quality Jacket fashionable,lighter, tighter-fitting'),
(13, 'Zara', 'Jeans', 'L', '400', 'IMG-621b6f64ecbab6.67811143.jpg', 'Top-tier quality jeans fashionable,lighter, tighter-fitting'),
(14, 'Zara', 'Jeans', 'L', '400', 'IMG-621b6f786f4d49.52790272.jpg', 'Top-tier quality Jacket fashionable,lighter, tighter-fitting'),
(15, 'H&M', 'Snicker', 'L', '450', 'IMG-621b6ff63b35d3.39006863.jpg', 'Top-tier quality Snickers comfort for the foot'),
(16, 'Nike', 'Snicker', 'L', '450', 'IMG-621b700e1ae3b4.87455943.jpg', 'Top-tier quality Snickers comfort for the foot'),
(17, 'Nike', 'Snicker', 'L', '450', 'IMG-621b70212b7cd0.74087940.jpg', 'Top-tier quality Snickers comfort for the foot'),
(18, 'Nike', 'Snicker', 'L', '300', 'IMG-621b703280e104.40365538.jpg', 'Top-tier quality Snickers comfort for the foot'),
(19, 'Nike', 'Snicker', 'L', '400', 'IMG-621b705e537967.31553498.jpg', 'Top-tier quality Snickers comfort for the foot'),
(20, 'H&M', 'T-Shirts', 'M', '130', 'IMG-621b70bf6b5b38.39953101.jpg', 'Top-tier quality T-shirts Long sleeves round neckline,stretchy, light, and inexpensive fabric and are easy to clean.'),
(21, 'zara', 'T-Shirts', 'L', '450', 'IMG-621b70d11d29d0.30613326.jpg', 'Top-tier quality T-shirts Long sleeves round neckline,stretchy, light, and inexpensive fabric and are easy to clean.'),
(22, 'Zara', 'T-Shirts', 'L', '200', 'IMG-621b70e7354284.94323170.jpg', 'Top-tier quality T-shirts Long sleeves round neckline,stretchy, light, and inexpensive fabric and are easy to clean.'),
(23, 'H&M', 'T-Shirts', 'L', '230', 'IMG-621b710561c814.42888665.jpg', 'Top-tier quality T-shirts Long sleeves round neckline,stretchy, light, and inexpensive fabric and are easy to clean.'),
(24, 'Zara', 'T-Shirts', 'L', '299', 'IMG-621b711703c5b6.11096480.jpg', 'Top-tier quality T-shirts Long sleeves round neckline,stretchy, light, and inexpensive fabric and are easy to clean.');

-- --------------------------------------------------------

--
-- Table structure for table `reviewmen`
--

CREATE TABLE `reviewmen` (
  `id` int(11) NOT NULL,
  `idPro` int(11) DEFAULT NULL,
  `userId` int(11) DEFAULT NULL,
  `rateIndex` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviewmen`
--

INSERT INTO `reviewmen` (`id`, `idPro`, `userId`, `rateIndex`) VALUES
(1, 3, 3, 4),
(2, 8, 3, 5),
(3, 4, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `reviewwmn`
--

CREATE TABLE `reviewwmn` (
  `id` int(11) NOT NULL,
  `idPro` int(11) DEFAULT NULL,
  `userId` int(11) DEFAULT NULL,
  `rateIndex` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviewwmn`
--

INSERT INTO `reviewwmn` (`id`, `idPro`, `userId`, `rateIndex`) VALUES
(1, 1, 3, 3),
(2, 2, 3, 5),
(3, 2, 15, 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `userName` varchar(128) NOT NULL,
  `userLastName` varchar(128) NOT NULL,
  `userEmail` varchar(128) NOT NULL,
  `userUid` varchar(128) NOT NULL,
  `userPwd` varchar(128) NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `adresse` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `userName`, `userLastName`, `userEmail`, `userUid`, `userPwd`, `image`, `adresse`) VALUES
(3, 'amine', 'said', 'amine@gmail.com', 'amine1', '$2y$10$LRjXLK2TtzSuCeLh/YNFcO1.gBZHP9S7qlFbbr1e2LIG/D55TCFq2', NULL, 'Casablanca,Oulfa,Zoubir'),
(15, 'Asmaa', 'Khadija', 'asmaa@gmail.com', 'asmaa1', '$2y$10$8z7BCdJYSUgc.CunFs2JQePfqIz0aZ/i1au2zLlk4uN3i0n6RUy9m', NULL, 'Rabat'),
(20, 'Karim', 'Hamid', 'karim@gmail.com', 'karim1', '$2y$10$zOg4sd09iOvI..m7y.8dOeopPoXhLl/aAZ7VkTiNS9TYxEWhQcH36', NULL, 'Mekness');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idAdmin`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`idChart`),
  ADD KEY `idProMen` (`idProMen`),
  ADD KEY `idProWomen` (`idProWomen`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`idCmd`),
  ADD KEY `userId` (`userId`),
  ADD KEY `idProMen` (`idProMen`),
  ADD KEY `idProWomen` (`idProWomen`),
  ADD KEY `idDeliver` (`idDeliver`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`),
  ADD KEY `hamza2` (`idPro`);

--
-- Indexes for table `deliver`
--
ALTER TABLE `deliver`
  ADD PRIMARY KEY (`idDeliver`);

--
-- Indexes for table `favoris_men`
--
ALTER TABLE `favoris_men`
  ADD PRIMARY KEY (`idFav`),
  ADD KEY `idPro` (`idPro`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `favoris_women`
--
ALTER TABLE `favoris_women`
  ADD PRIMARY KEY (`idFav`),
  ADD KEY `idPro` (`idPro`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk` (`userid`);

--
-- Indexes for table `product_men`
--
ALTER TABLE `product_men`
  ADD PRIMARY KEY (`idPro`);

--
-- Indexes for table `product_women`
--
ALTER TABLE `product_women`
  ADD PRIMARY KEY (`idPro`);

--
-- Indexes for table `reviewmen`
--
ALTER TABLE `reviewmen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idPro` (`idPro`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `reviewwmn`
--
ALTER TABLE `reviewwmn`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idPro` (`idPro`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `idAdmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `idChart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `commande`
--
ALTER TABLE `commande`
  MODIFY `idCmd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `deliver`
--
ALTER TABLE `deliver`
  MODIFY `idDeliver` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `favoris_men`
--
ALTER TABLE `favoris_men`
  MODIFY `idFav` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `favoris_women`
--
ALTER TABLE `favoris_women`
  MODIFY `idFav` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `product_men`
--
ALTER TABLE `product_men`
  MODIFY `idPro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `product_women`
--
ALTER TABLE `product_women`
  MODIFY `idPro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `reviewmen`
--
ALTER TABLE `reviewmen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reviewwmn`
--
ALTER TABLE `reviewwmn`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`idProMen`) REFERENCES `product_men` (`idPro`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`idProWomen`) REFERENCES `product_women` (`idPro`),
  ADD CONSTRAINT `cart_ibfk_3` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `commande_ibfk_2` FOREIGN KEY (`idProMen`) REFERENCES `product_men` (`idPro`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `commande_ibfk_3` FOREIGN KEY (`idProWomen`) REFERENCES `product_women` (`idPro`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `commande_ibfk_4` FOREIGN KEY (`idDeliver`) REFERENCES `deliver` (`idDeliver`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hamza1` FOREIGN KEY (`idPro`) REFERENCES `product_men` (`idPro`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hamza2` FOREIGN KEY (`idPro`) REFERENCES `product_women` (`idPro`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `favoris_men`
--
ALTER TABLE `favoris_men`
  ADD CONSTRAINT `favoris_men_ibfk_1` FOREIGN KEY (`idPro`) REFERENCES `product_men` (`idPro`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `favoris_men_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `favoris_women`
--
ALTER TABLE `favoris_women`
  ADD CONSTRAINT `favoris_women_ibfk_1` FOREIGN KEY (`idPro`) REFERENCES `product_women` (`idPro`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `favoris_women_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `fk` FOREIGN KEY (`userid`) REFERENCES `users` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reviewmen`
--
ALTER TABLE `reviewmen`
  ADD CONSTRAINT `reviewmen_ibfk_1` FOREIGN KEY (`idPro`) REFERENCES `product_men` (`idPro`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reviewmen_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reviewwmn`
--
ALTER TABLE `reviewwmn`
  ADD CONSTRAINT `reviewwmn_ibfk_1` FOREIGN KEY (`idPro`) REFERENCES `product_women` (`idPro`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reviewwmn_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
