-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 17 Oca 2021, 02:26:35
-- Sunucu sürümü: 10.4.14-MariaDB
-- PHP Sürümü: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `test`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `cart`
--

CREATE TABLE `cart` (
  `userId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `orderId` int(11) NOT NULL,
  `productQuantity` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `cart`
--

INSERT INTO `cart` (`userId`, `productId`, `orderId`, `productQuantity`, `price`) VALUES
(3, 2, 41, 5, 450),
(3, 3, 43, 1, 100),
(3, 4, 45, 1, 80);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `product`
--

CREATE TABLE `product` (
  `productId` int(11) NOT NULL,
  `productName` varchar(45) COLLATE utf8_turkish_ci NOT NULL,
  `productPrice` float NOT NULL,
  `productExp` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `productPhoto` varchar(75) COLLATE utf8_turkish_ci DEFAULT NULL,
  `productCategory` varchar(25) COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `product`
--

INSERT INTO `product` (`productId`, `productName`, `productPrice`, `productExp`, `productPhoto`, `productCategory`) VALUES
(1, 'erkekAyakkabi1', 79.9, 'Şik ve rahat bir ayakkabi', 'eproduct1.jpeg', 'man'),
(2, 'erkekAyakkabi2', 89.9, 'Şik ve rahat bir ayakkabi', 'eproduct2.jpeg', 'man'),
(3, 'erkekAyakkabi3', 99.9, 'Şik ve rahat bir ayakkabi', 'eproduct3.jpeg', 'man'),
(4, 'kadinAyakkabi1', 79.9, 'Şik ve rahat bir ayakkabi', 'kproduct1.jpg', 'women'),
(5, 'kadinAyakkabi2', 89.9, 'Şik ve rahat bir ayakkabi', 'kproduct2.jpg', 'women'),
(6, 'kadinAyakkabi3', 99.9, 'Şik ve rahat bir ayakkabi', 'kproduct3.jpg', 'women');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `user`
--

CREATE TABLE `user` (
  `userId` int(10) NOT NULL,
  `userUsername` varchar(45) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `userPassword` varchar(45) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `userEmail` varchar(45) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `user`
--

INSERT INTO `user` (`userId`, `userUsername`, `userPassword`, `userEmail`) VALUES
(1, 'admin', '326528a', 'admin@gmail.com'),
(3, 'tolga', '326528a', 'tolga@gmail.com'),
(4, 'ahmet', '123456', 'ahmet@gmail.com'),
(5, 'grkmcngr', '147258', 'gorkem@gmail.com');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`orderId`);

--
-- Tablo için indeksler `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productId`);

--
-- Tablo için indeksler `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userId`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `cart`
--
ALTER TABLE `cart`
  MODIFY `orderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- Tablo için AUTO_INCREMENT değeri `product`
--
ALTER TABLE `product`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `user`
--
ALTER TABLE `user`
  MODIFY `userId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
