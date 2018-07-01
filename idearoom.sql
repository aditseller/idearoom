-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2018 at 11:06 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `idearoom`
--

-- --------------------------------------------------------

--
-- Table structure for table `channel`
--

CREATE TABLE `channel` (
  `id_channel` int(11) NOT NULL,
  `channel` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `channel`
--

INSERT INTO `channel` (`id_channel`, `channel`) VALUES
(2, 'hits'),
(4, 'lifestyle'),
(1, 'listicle'),
(3, 'stories');

-- --------------------------------------------------------

--
-- Table structure for table `hit`
--

CREATE TABLE `hit` (
  `id_hit` int(11) NOT NULL,
  `user_ip` varchar(20) NOT NULL,
  `link` varchar(500) NOT NULL,
  `combine` varchar(500) NOT NULL,
  `urlpost` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hit`
--

INSERT INTO `hit` (`id_hit`, `user_ip`, `link`, `combine`, `urlpost`) VALUES
(19, '::1', '/sobatnetizen/read/Cara-Jeremy-Thomas-Mempertahankan-Eksistensi-180701100154', '::1/sobatnetizen/read/Cara-Jeremy-Thomas-Mempertahankan-Eksistensi-180701100154', 'Cara-Jeremy-Thomas-Mempertahankan-Eksistensi-180701100154'),
(20, '::1', '/sobatnetizen/read/Pemilu-Meksiko--3-Capres-Akan-Bertarung-Gantikan-Presiden-Nieto-180630110347', '::1/sobatnetizen/read/Pemilu-Meksiko--3-Capres-Akan-Bertarung-Gantikan-Presiden-Nieto-180630110347', 'Pemilu-Meksiko--3-Capres-Akan-Bertarung-Gantikan-Presiden-Nieto-180630110347'),
(21, '::1', '/sobatnetizen/read/Maradona-Saatnya-Messi-Panaskan-Mesin--180630110035', '::1/sobatnetizen/read/Maradona-Saatnya-Messi-Panaskan-Mesin--180630110035', 'Maradona-Saatnya-Messi-Panaskan-Mesin--180630110035'),
(22, '192.168.1.1', '/sobatnetizen/read/Pemilu-Meksiko--3-Capres-Akan-Bertarung-Gantikan-Presiden-Nieto-180630110347', '192.168.1.1/sobatnetizen/read/Pemilu-Meksiko--3-Capres-Akan-Bertarung-Gantikan-Presiden-Nieto-180630110347', 'Pemilu-Meksiko--3-Capres-Akan-Bertarung-Gantikan-Presiden-Nieto-180630110347'),
(23, '::1', '/sobatnetizen/read/Setahun-Jauhi-Hingar-Bingar-Ibu-Kota-Untuk-Pindah-ke-Bali--Presenter-Kondang-ini-Ungkap-Perasaannya-180630104818', '::1/sobatnetizen/read/Setahun-Jauhi-Hingar-Bingar-Ibu-Kota-Untuk-Pindah-ke-Bali--Presenter-Kondang-ini-Ungkap-Perasaannya-180630104818', 'Setahun-Jauhi-Hingar-Bingar-Ibu-Kota-Untuk-Pindah-ke-Bali--Presenter-Kondang-ini-Ungkap-Perasaannya-180630104818');

-- --------------------------------------------------------

--
-- Table structure for table `read`
--

CREATE TABLE `read` (
  `id_read` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `content` text NOT NULL,
  `channel` varchar(100) NOT NULL,
  `tag` varchar(500) NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `url` varchar(500) NOT NULL,
  `poster` varchar(500) NOT NULL,
  `source` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `read`
--

INSERT INTO `read` (`id_read`, `title`, `content`, `channel`, `tag`, `created_by`, `created_at`, `url`, `poster`, `source`) VALUES
(5, 'Setahun Jauhi Hingar Bingar Ibu Kota Untuk Pindah ke Bali, Presenter Kondang ini Ungkap Perasaannya', '<p>Presenter kondang Cici Panda ungkapkan perasaannya setelah memutuskan pindah dari Kota Jakarta selama satu tahun. Berdasarkan unggahannya di Instagram, diketahui Cici Panda memutuskan untuk pindah ke Bali bersama keluarga kecilnya. Tepat satu tahun kepindahannya ke Bali, ibu dari Alika ini unggah sebuah foto di Instagramnya kemarin Jumat (29/6/2018). Dalam foto itu tampak dirinya mengenakan dress kasual bergaris warna merah dan putih. Sang buah hati, Alika, juga ada dalam foto tersebut, memeluk perut Panda.</p>', 'hits', 'panda,artis', 'Tezar Aditya', '2018-06-30 10:48:18', 'Setahun-Jauhi-Hingar-Bingar-Ibu-Kota-Untuk-Pindah-ke-Bali--Presenter-Kondang-ini-Ungkap-Perasaannya-180630104818', 'public/uploads/read/01e24949b82b1536f9140c86c573615da1eb86e5.jpg', ''),
(7, 'Maradona: Saatnya Messi Panaskan Mesin!', '<p>Moskow - Argentina susah payah dan Lionel Messi menandai dengan satu gol untuk sampai di babak 16 besar Piala Dunia 2018. Tapi, Maradona optimistis ini jadi tahunnya Messi. Messi tak bisa berbuat banyak dalam dua pertandingan pertama Argentina. Pemain Barcelona itu tak membuat gol ataupun assist.&nbsp;</p><p>Laju Argentina turut tersendat. Tim Tango diimbangi Islandia dan kandas di tangan Kroasia hingga membuat mereka dalam situasi terjepit, harus menang di laga ketiga dan bergantung hasil laga lain.</p>', 'hits', 'messi', 'Tezar Aditya', '2018-06-30 11:00:35', 'Maradona-Saatnya-Messi-Panaskan-Mesin--180630110035', 'public/uploads/read/79ca7ef27c50aa8b290250e3dd66862eba3c06a3.jpg', ''),
(8, 'Pemilu Meksiko, 3 Capres Akan Bertarung Gantikan Presiden Nieto', '<p><strong>Mexico City -</strong> Dalam pemilihan presiden (pilpres) Meksiko yang akan digelar 1 Juli besok, ada tiga capres yang akan bertarung menggantikan kepemimpinan Presiden Enrique Pena Nieto, yang sangat tidak populer di tengah melonjaknya kejahatan kekerasan dan korupsi di negara tersebut.&nbsp;</p><p>Siapa saja ketiga capres itu? Seperti dilansir Sky News, Sabtu (30/6/2018), capres terpopuler dari sayap kiri, Andres Manuel Lopez Obrador, atau AMLO, diprediksi akan memenangi pemilu Meksiko besok. Mantan Wali Kota Mexico City yang dijuluki sebagai &quot;Donald Trump-nya Meksiko&quot; itu unggul dalam polling-polling menjelang pilpres. Dalam kampanyenya, dia berjanji akan memerangi &quot;mafia kekuasaan&quot; untuk membela masyarakat jelas pekerja</p>', 'hits', 'meksiko', 'Tezar Aditya', '2018-06-30 11:03:47', 'Pemilu-Meksiko--3-Capres-Akan-Bertarung-Gantikan-Presiden-Nieto-180630110347', 'public/uploads/read/a1d6f25bada7ae14692223693612551b6dd05355.jpg', ''),
(9, 'Cara Jeremy Thomas Mempertahankan Eksistensi', '<div data-block=\"true\" data-editor=\"idvr\" data-offset-key=\"8hbik-0-0\"><div data-offset-key=\"8hbik-0-0\"><span data-offset-key=\"8hbik-0-0\"><span data-text=\"true\">Aktor&nbsp;</span></span><span data-offset-key=\"8hbik-1-0\"><span data-text=\"true\">Jeremy Thomas&nbsp;</span></span><span data-offset-key=\"8hbik-2-0\"><span data-text=\"true\">memulai kariernya sejak era 90-an dan masih eksis sampai sekarang ini. Bahkan di tahun 2018, Jeremy berkesempatan untuk bermain&nbsp;</span></span><span data-offset-key=\"8hbik-3-0\"><span data-text=\"true\">film horor</span></span><span data-offset-key=\"8hbik-4-0\"><span data-text=\"true\">&nbsp;bersama para pemain muda dalam film terbarunya &#39;13 The Haunted&#39;.&nbsp;</span></span></div></div><figure contenteditable=\"false\" data-block=\"true\" data-editor=\"idvr\" data-offset-key=\"outstreamVideoAds-0-0\"></figure><div data-block=\"true\" data-editor=\"idvr\" data-offset-key=\"df2ce-0-0\"><div data-offset-key=\"df2ce-0-0\"><span data-offset-key=\"df2ce-0-0\"><span data-text=\"true\">Ayah dua orang anak ini mengatakan bahwa menjaga eksistensi tidaklah mudah. Tampang boleh oke, tapi tidak hanya sekadar itu saja. Harus ada niat, tekad, mental dan fisik harus terus dijaga.</span></span></div></div><div data-block=\"true\" data-editor=\"idvr\" data-offset-key=\"br72a-0-0\"><div data-offset-key=\"br72a-0-0\"><span data-offset-key=\"br72a-0-0\"><span data-text=\"true\">&quot;Oleh karena itu kita sebagai pelakunya wajib menjaga stamina, fisik, kualitas kita dengan baik. Kapan kita dibutuhkan kita&nbsp;</span></span><span data-offset-key=\"br72a-0-1\"><span data-text=\"true\">ready</span></span><span data-offset-key=\"br72a-0-2\"><span data-text=\"true\">,&quot; kata Jeremy ditemui di kawasan Kemang, Jakarta Selatan, baru-baru ini.</span></span></div></div>', 'lifestyle', 'jeremythomas,artis,lifestyle', 'Tezar Aditya', '2018-07-01 10:01:54', 'Cara-Jeremy-Thomas-Mempertahankan-Eksistensi-180701100154', 'public/uploads/read/c64fd2de816d1cf31219a47a64ae61c6ac23bd8a.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id_role` int(11) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id_role`, `role`) VALUES
(1, 'Administrator'),
(2, 'Moderator'),
(3, 'Writter');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(500) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `joindate` datetime NOT NULL,
  `role` int(10) NOT NULL,
  `active` enum('0','1') NOT NULL,
  `authKey` varchar(500) NOT NULL,
  `accessToken` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `email`, `password`, `fullname`, `phone`, `joindate`, `role`, `active`, `authKey`, `accessToken`) VALUES
(1, 'tezaraditya@gmail.com', '746f6f72', 'Tezar Aditya', '081314421461', '2018-06-20 04:27:45', 1, '1', '52ca6f764e239e4d9e9e67c89fcf0cae6a4e8ac5', '356a192b7913b04c54574d18c28d46e6395428ab'),
(2, 'prioknews@gmail.com', '746f6f72', 'volunteer', '080989999', '2018-06-20 09:55:48', 3, '1', 'b46deda09533491b109e6b049fa5145b39130d45', 'da4b9237bacccdf19c0760cab7aec4a8359010b0'),
(3, 'aditseller@gmail.com', '746f6f72', 'aditseller', '089928834483', '2018-06-20 09:57:56', 3, '0', 'e7410ca731339e97cfad3ee3fd61ea2ed0bb5886', 'da39a3ee5e6b4b0d3255bfef95601890afd80709');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `channel`
--
ALTER TABLE `channel`
  ADD PRIMARY KEY (`id_channel`),
  ADD UNIQUE KEY `channel` (`channel`);

--
-- Indexes for table `hit`
--
ALTER TABLE `hit`
  ADD PRIMARY KEY (`id_hit`),
  ADD UNIQUE KEY `combine` (`combine`),
  ADD KEY `link` (`link`),
  ADD KEY `title` (`urlpost`),
  ADD KEY `urlpost` (`urlpost`);

--
-- Indexes for table `read`
--
ALTER TABLE `read`
  ADD PRIMARY KEY (`id_read`),
  ADD UNIQUE KEY `title` (`title`),
  ADD UNIQUE KEY `url` (`url`),
  ADD KEY `channel` (`channel`),
  ADD KEY `tag` (`tag`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `source` (`source`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_role`),
  ADD UNIQUE KEY `role` (`role`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `fullname` (`fullname`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD KEY `role` (`role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `channel`
--
ALTER TABLE `channel`
  MODIFY `id_channel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `hit`
--
ALTER TABLE `hit`
  MODIFY `id_hit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `read`
--
ALTER TABLE `read`
  MODIFY `id_read` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hit`
--
ALTER TABLE `hit`
  ADD CONSTRAINT `hit_ibfk_1` FOREIGN KEY (`urlpost`) REFERENCES `read` (`url`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `read`
--
ALTER TABLE `read`
  ADD CONSTRAINT `read_ibfk_1` FOREIGN KEY (`channel`) REFERENCES `channel` (`channel`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `read_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `users` (`fullname`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role`) REFERENCES `roles` (`id_role`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
