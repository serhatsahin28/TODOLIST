-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 05 Eki 2023, 16:22:43
-- Sunucu sürümü: 10.4.28-MariaDB
-- PHP Sürümü: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `todolist`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `list`
--

CREATE TABLE `list` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `projects_id` int(11) NOT NULL,
  `active` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status_list` varchar(100) NOT NULL,
  `is_deleted` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `list`
--

INSERT INTO `list` (`id`, `title`, `projects_id`, `active`, `date`, `status_list`, `is_deleted`) VALUES
(5, 'bb', 7, 0, '2023-03-15 13:42:14', 'basladi', 1),
(7, 'b', 14, 0, '2023-03-15 13:52:40', 'bitti', 1),
(8, 'daads', 15, 0, '2023-03-15 13:53:49', 'basladi', 0),
(13, 'dssad', 10, 0, '2023-03-15 14:05:19', 'basladi', 0),
(15, 'dasadsA', 28, 0, '2023-03-15 14:46:13', 'basladi', 0),
(16, 'aaa', 7, 0, '2023-03-15 14:46:43', 'basladi', 0),
(18, 'aaaa', 10, 0, '2023-03-16 07:21:54', 'basladi', 0),
(19, 'Görev', 27, 0, '2023-03-16 07:22:23', 'basladi', 0),
(31, 'aaa', 18, 0, '2023-03-16 07:29:14', 'basladi', 0),
(32, 'aaaaa', 18, 0, '2023-03-16 07:29:34', 'basladi', 0),
(33, 'görev2', 7, 0, '2023-03-16 08:04:41', 'basladi', 0),
(35, 'görev4', 28, 0, '2023-03-16 09:24:06', 'basladi', 0),
(38, 'hjbı', 30, 0, '2023-03-29 11:18:34', 'basladi', 0),
(42, 'aaaa', 34, 0, '2023-10-05 12:29:20', 'bitti', 1),
(43, 'Kahvaltı', 34, 0, '2023-10-05 12:30:42', 'yapılacak', 0),
(44, 'İşe hazırlanma', 34, 0, '2023-10-05 12:30:59', 'yapılacak', 0),
(45, 'işe başlama', 34, 0, '2023-10-05 12:31:15', 'yapılacak', 0),
(46, 'iş dönüşü', 34, 0, '2023-10-05 12:31:34', 'yapılacak', 0),
(47, 'kendime vakit ayırma', 34, 0, '2023-10-05 12:32:11', 'yapılacak', 0),
(48, 'Akşam yemeği', 34, 0, '2023-10-05 12:32:16', 'yapılacak', 0),
(49, 'Evraklar', 34, 0, '2023-10-05 12:32:24', 'yapılacak', 0),
(50, 'dsadsa', 34, 0, '2023-10-05 12:33:09', 'bitti', 1),
(51, 'Mailleri kontrol etme', 35, 0, '2023-10-05 12:39:15', 'yapılacak', 0),
(52, 'Patronla toplantı', 35, 0, '2023-10-05 12:40:22', 'yapılacak', 0),
(53, 'Firmaya gelen yatırımcıları ağırlama', 35, 0, '2023-10-05 12:40:39', 'yapılacak', 0),
(54, 'Öğlen molası', 35, 0, '2023-10-05 12:40:54', 'yapılacak', 0),
(55, 'Evrak işleri', 35, 0, '2023-10-05 12:41:04', 'yapılacak', 0),
(56, 'İş analizi', 35, 0, '2023-10-05 12:41:14', 'yapılacak', 0),
(57, 'Mesai sonu', 35, 0, '2023-10-05 12:41:19', 'yapılacak', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `is_deleted` int(1) DEFAULT 0,
  `user_id` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `projects`
--

INSERT INTO `projects` (`id`, `title`, `is_deleted`, `user_id`) VALUES
(7, 'dassd', 0, 3),
(14, 'ffddd', 0, 5),
(18, 'dasd', 0, 4),
(31, 'Proje2', 0, 3),
(32, 'Proje3', 0, 3),
(34, 'Günlük işler', 0, 7),
(35, 'Ofis işleri', 0, 7);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(100) NOT NULL,
  `is_active` int(11) NOT NULL,
  `partner_id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `is_active`, `partner_id`) VALUES
(7, 'C', '0cc175b9c0f1b6a831c399e269772661', 0, 1);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `list`
--
ALTER TABLE `list`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `list`
--
ALTER TABLE `list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- Tablo için AUTO_INCREMENT değeri `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Tablo için AUTO_INCREMENT değeri `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
