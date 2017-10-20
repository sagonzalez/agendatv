-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2017 at 11:48 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agendatv`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_user_movie`
--

CREATE TABLE `detail_user_movie` (
  `id` bigint(20) NOT NULL,
  `id_user` int(20) NOT NULL,
  `id_show` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `detail_user_movie`
--

INSERT INTO `detail_user_movie` (`id`, `id_user`, `id_show`) VALUES
(2, 1, 19),
(4, 1, 21),
(5, 1, 22),
(6, 1, 23),
(7, 1, 24),
(8, 1, 25),
(10, 25, 27),
(12, 1, 29);

-- --------------------------------------------------------

--
-- Table structure for table `detail_user_show`
--

CREATE TABLE `detail_user_show` (
  `id` int(20) NOT NULL,
  `id_user` int(20) NOT NULL,
  `id_show` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `detail_user_show`
--

INSERT INTO `detail_user_show` (`id`, `id_user`, `id_show`) VALUES
(5, 1, 10),
(11, 1, 16),
(13, 1, 18),
(15, 1, 20),
(17, 1, 22),
(28, 1, 33),
(38, 1, 10),
(45, 25, 35),
(46, 1, 36),
(60, 1, 50),
(61, 1, 51),
(62, 1, 52),
(63, 1, 53),
(64, 1, 54),
(65, 1, 55),
(66, 1, 56),
(67, 1, 57),
(68, 1, 58),
(76, 1, 66),
(77, 1, 67),
(78, 1, 68);

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE `movie` (
  `id` bigint(20) NOT NULL,
  `name` varchar(45) NOT NULL,
  `rating` tinyint(4) NOT NULL,
  `img` text NOT NULL,
  `state` bit(1) NOT NULL,
  `comment` text,
  `date` date DEFAULT NULL,
  `recommend` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`id`, `name`, `rating`, `img`, `state`, `comment`, `date`, `recommend`) VALUES
(16, 'La muralla', 2, 'http://www.diariodevenusville.com/wp-content/uploads/2016/12/LA-GRAN-MURALLA-poster-2.jpg', b'0', NULL, '0000-00-00', b'0'),
(17, 'La muralla', 2, 'http://www.diariodevenusville.com/wp-content/uploads/2016/12/LA-GRAN-MURALLA-poster-2.jpg', b'0', NULL, '0000-00-00', b'0'),
(19, 'The purge 2', 3, 'http://www.sosmoviers.com/wp-content/uploads/2013/07/The-purge-La-noche-de-las-bestias-Cartel.jpg', b'1', 'kill the son of bitch', '2017-06-20', b'0'),
(21, 'Resident evil: Final Chapter', 1, 'http://es.web.img3.acsta.net/newsv7/16/12/15/16/07/070256.jpg', b'0', NULL, '0000-00-00', b'0'),
(22, 'Gardians of the Galaxy', 4, 'http://pre11.deviantart.net/6565/th/pre/i/2016/149/1/6/guardians_of_the_galaxy_vol_2_poster_by_nunkinz1000-da477eq.png', b'0', NULL, NULL, b'0'),
(23, 'Rogue One', 3, 'http://prensaimperial.com/wp-content/uploads/2016/11/Rogue-One-Poster-Latam.jpg', b'0', NULL, NULL, b'0'),
(24, 'Logan', 5, 'https://images-na.ssl-images-amazon.com/images/I/81knWA39ANL._AC_UL320_SR208,320_.jpg', b'1', 'lorel', '2017-07-04', b'1'),
(25, 'The mommy', 5, 'https://upload.wikimedia.org/wikipedia/en/a/a2/The_Mummy_%282017%29.jpg', b'1', 'another', '2017-06-20', b'0'),
(27, 'Sword art online Ordinale Scale', 5, 'http://img1.ak.crunchyroll.com/i/spire4/7b0068aca81cbdc3b3930d745f5531961485768550_full.jpg', b'0', NULL, NULL, b'0'),
(29, 'Logan', 3, 'https://images-na.ssl-images-amazon.com/images/I/81knWA39ANL._AC_UL320_SR208,320_.jpg', b'0', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `recommend`
--

CREATE TABLE `recommend` (
  `id` bigint(20) NOT NULL,
  `name` varchar(45) NOT NULL,
  `img` text CHARACTER SET utf32 NOT NULL,
  `okydoky` bigint(20) DEFAULT NULL,
  `bad` bigint(20) DEFAULT NULL,
  `review` text CHARACTER SET utf32,
  `type` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `recommend`
--

INSERT INTO `recommend` (`id`, `name`, `img`, `okydoky`, `bad`, `review`, `type`) VALUES
(1, 'Boku no hero academia', 'https://images-na.ssl-images-amazon.com/images/I/91kjVOEopVL._SY450_.jpg', 3, NULL, 'Estudiantes que quieren ser heroes de profesiÃ³n asisten a un escula para ello. Tienen numerosas batallas.', 'ANIME'),
(2, 'Shingeki no Kyojin', 'https://static.posters.cz/image/1300/22797.jpg', 3, NULL, 'You have to see it.', 'ANIME'),
(4, 'Black Bullet', 'https://images-na.ssl-images-amazon.com/images/M/MV5BOWQxN2NkZGYtNmE3ZC00Y2YxLWE1OTMtZTk0NzFlMzE4ZmNiXkEyXkFqcGdeQXVyNjExNjg5OTI@._V1_UX182_CR0,0,182,268_AL_.jpg', 2, NULL, '', 'ANIME'),
(18, 'Supergirl', 'https://pmctvline2.files.wordpress.com/2016/08/supergirl-season-2-poster.jpg', 3, 2, '', 'SERIE'),
(19, 'Bates Motel', 'https://images-na.ssl-images-amazon.com/images/M/MV5BNTc4ODkwMTk4M15BMl5BanBnXkFtZTgwOTY5MTEyMTI@._V1_UY268_CR9,0,182,268_AL_.jpg', 5, NULL, '', 'SERIE'),
(22, 'Logan', 'https://images-na.ssl-images-amazon.com/images/I/81knWA39ANL._AC_UL320_SR208,320_.jpg', 7, 1, 'lorel', 'MOVIE'),
(23, 'Bleach', 'https://images-na.ssl-images-amazon.com/images/I/519de9vCJdL._AC_UL320_SR254,320_.jpg', 5, NULL, '', 'ANIME'),
(24, 'The Flash', 'http://cdn2-www.comingsoon.net/assets/uploads/gallery/the-flash-season-two/cqpjcygusaaqrxv.jpg', 5, NULL, 'The end was pretty bad', 'SERIE');

-- --------------------------------------------------------

--
-- Table structure for table `shows`
--

CREATE TABLE `shows` (
  `id` int(20) NOT NULL,
  `name` varchar(45) NOT NULL,
  `type` char(5) NOT NULL,
  `state` tinyint(4) NOT NULL,
  `rating` tinyint(4) NOT NULL,
  `season` smallint(4) DEFAULT NULL,
  `episode` smallint(4) DEFAULT NULL,
  `date_last_see` date DEFAULT NULL,
  `date_finished` date DEFAULT NULL,
  `comment` text,
  `img` text NOT NULL,
  `sinopsis` text,
  `recommend` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `shows`
--

INSERT INTO `shows` (`id`, `name`, `type`, `state`, `rating`, `season`, `episode`, `date_last_see`, `date_finished`, `comment`, `img`, `sinopsis`, `recommend`) VALUES
(10, 'The walking dead', 'SERIE', 0, 4, 2, 7, '2017-06-21', NULL, NULL, 'http://www.moviesonline.ca/wp-content/uploads/2010/09/TWD_1-SHEET_WEB.jpg', '', b'0'),
(16, 'Jessica Jones', 'SERIE', 1, 5, 2, 13, '2017-06-14', NULL, NULL, 'http://img09.deviantart.net/5eb1/i/2015/325/6/d/jessica_jones__2015____poster_by_smallville_rbb-d9hj1cf.jpg', 'Cuando era niÃ±a, ella estaba en un accidente de auto que matÃ³ a sus padres y la puso en un estado de coma. DespuÃ©s volviÃ³ en sÃ­, Jessica fue legalmente adoptada por la agente de talento, Dorothy Walker, por lo tanto, de convertirse en la hermana adoptiva de Trish Walker. ', b'0'),
(18, 'Shingeki No Kyojin', 'ANIME', 0, 5, 2, 12, '2017-06-19', NULL, NULL, 'http://vignette3.wikia.nocookie.net/doblaje/images/b/ba/Shingeki-no-kyojin-poster.jpg/revision/latest?cb=20131010184255&path-prefix=es', '', b'0'),
(20, 'Bleach', 'ANIME', 2, 5, 1, 365, '2017-07-05', '2017-07-05', '', 'https://images-na.ssl-images-amazon.com/images/I/519de9vCJdL._AC_UL320_SR254,320_.jpg', '', b'1'),
(22, 'Hunter x Hunter', 'ANIME', 2, 4, 1, 365, '2017-07-02', '2017-07-02', 'Gontoo', 'https://ae01.alicdn.com/kf/HTB19XzuHVXXXXbGXpXXq6xXFXXX1/Hunter-x-Hunter-GI-Japan-Anime-Comics-Poster-print-on-silk-wall-art-Home-Decoration-12x18.jpg', '', b'0'),
(33, 'Arrow', 'SERIE', 0, 4, 5, 11, '2017-06-21', '2017-06-19', 'select id from user', 'https://s-media-cache-ak0.pinimg.com/originals/eb/a4/df/eba4df809a662b2f43a8b065903f5ddc.jpg', 'Después de un violento naufragio y tras haber desaparecido y creído muerto durante cinco años, el multimillonario playboy Oliver Queen es rescatado con vida en una isla del Pacífico. De vuelta en casa en Starling City, Oliver es recibido por su madre, su hermana y su mejor amigo, quienes rápidamente notan que la terrible experiencia sufrida lo ha cambiado.', b'0'),
(35, 'kobayashi-san Chi no maid dragon', 'ANIME', 1, 4, NULL, NULL, NULL, NULL, NULL, 'http://s1.dmcdn.net/hEJ-m/1280x720-ytn.jpg', '', b'0'),
(36, 'Scorpion', 'SERIE', 0, 4, 3, 7, '2017-06-21', NULL, NULL, 'https://img.yescdn.ru/2016/01/26/poster/0fe95f7c8d259e4b133730221117bb57-scorpion-season-2.jpg', 'La serie se centra en la vida de Walter O\'Brien, un excéntrico genio que participa en un grupo de mentes brillantes que conforma la última línea de defensa contra las amenazas a las que se enfrenta la humanidad en un mundo tan globalizado y tecnificado como el nuestro.', b'0'),
(50, 'The Flash', 'SERIE', 2, 4, 3, 23, '2017-07-05', '2017-07-05', 'The end was pretty bad', 'http://cdn2-www.comingsoon.net/assets/uploads/gallery/the-flash-season-two/cqpjcygusaaqrxv.jpg', '', b'1'),
(51, 'Bates Motel', 'SERIE', 2, 4, 5, 10, '2017-07-05', '2017-07-05', '', 'https://images-na.ssl-images-amazon.com/images/M/MV5BNTc4ODkwMTk4M15BMl5BanBnXkFtZTgwOTY5MTEyMTI@._V1_UY268_CR9,0,182,268_AL_.jpg', '', b'1'),
(52, 'Lost', 'SERIE', 2, 4, 11, 23, '2017-07-05', '2017-07-05', '', 'https://images-na.ssl-images-amazon.com/images/I/51E-aMp4aRL._AC_UL320_SR250,320_.jpg', '', b'0'),
(53, 'Legends of Tomorrow', 'SERIE', 2, 3, 2, 17, '2017-07-05', '2017-07-05', '', 'http://es.web.img3.acsta.net/newsv7/16/01/27/20/46/150673.jpg', '', b'0'),
(54, 'Supernatural', 'SERIE', 2, 4, 12, 23, '2017-07-05', '2017-07-05', '', 'https://s-media-cache-ak0.pinimg.com/originals/e0/54/1a/e0541aaa67bc6bf13b6abee15b0ba3f9.jpg', '', b'0'),
(55, 'Supergirl', 'SERIE', 2, 3, 2, 23, '2017-07-05', '2017-07-05', '', 'https://pmctvline2.files.wordpress.com/2016/08/supergirl-season-2-poster.jpg', '', b'1'),
(56, 'Daredevil', 'SERIE', 2, 5, 10, 2, '2017-07-05', '2017-07-05', '', 'http://cdn.collider.com/wp-content/uploads/2015/02/daredevil-tv-series-poster-matt-murdock.jpg', '', b'0'),
(57, 'Luke Cage', 'SERIE', 1, 3, NULL, NULL, NULL, NULL, NULL, 'https://cdn4.areajugones.es/wp-content/uploads/2016/08/cpvqrbzusaa3s3v-1.jpg', '', b'0'),
(58, 'Soul eater', 'ANIME', 0, 3, 1, 40, '2017-07-05', NULL, NULL, 'http://www.thatruled.com/wp-content/uploads/2016/09/Soul-Eater-poster.jpg', '', b'0'),
(66, 'Black Bullet', 'ANIME', 1, 3, NULL, NULL, NULL, NULL, NULL, 'https://images-na.ssl-images-amazon.com/images/M/MV5BOWQxN2NkZGYtNmE3ZC00Y2YxLWE1OTMtZTk0NzFlMzE4ZmNiXkEyXkFqcGdeQXVyNjExNjg5OTI@._V1_UX182_CR0,0,182,268_AL_.jpg', '', b'0'),
(67, 'Boku no hero academia', 'ANIME', 1, 3, NULL, NULL, NULL, NULL, NULL, 'https://images-na.ssl-images-amazon.com/images/I/91kjVOEopVL._SY450_.jpg', '', b'0'),
(68, 'Supergirl', 'SERIE', 1, 3, NULL, NULL, NULL, NULL, NULL, 'https://pmctvline2.files.wordpress.com/2016/08/supergirl-season-2-poster.jpg', '', b'0');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(20) NOT NULL,
  `username` varchar(45) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `cod_activation` smallint(6) NOT NULL,
  `status` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `cod_activation`, `status`) VALUES
(1, 'sagonzalez', 'sagonzalez@ittepic.edu.mx', '202cb962ac59075b964b07152d234b70', 1526, b'1'),
(2, 'ezequiel', 'ezequiel_buchon@hotmail.com', '202cb962ac59075b964b07152d234b70', 4585, b'1'),
(22, 'chavista777', 'chava_r3@hotmail.com', '202cb962ac59075b964b07152d234b70', 4969, b'1'),
(23, 'ricosuave', 'ricosuave@hotmail.com', '3e536c1e67bdca8236880b682f50d0de', 2975, b'0'),
(25, 'AngelBlack789', 'angel_Glez45@hotmail.com', '4b582347734898dc03cdb3294a32b60c', 4822, b'1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_user_movie`
--
ALTER TABLE `detail_user_movie`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_movie` (`id_show`);

--
-- Indexes for table `detail_user_show`
--
ALTER TABLE `detail_user_show`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `fk_show` (`id_show`);

--
-- Indexes for table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recommend`
--
ALTER TABLE `recommend`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shows`
--
ALTER TABLE `shows`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_user_movie`
--
ALTER TABLE `detail_user_movie`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `detail_user_show`
--
ALTER TABLE `detail_user_show`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;
--
-- AUTO_INCREMENT for table `movie`
--
ALTER TABLE `movie`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `recommend`
--
ALTER TABLE `recommend`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `shows`
--
ALTER TABLE `shows`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_user_movie`
--
ALTER TABLE `detail_user_movie`
  ADD CONSTRAINT `detail_user_movie_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_user_movie_ibfk_2` FOREIGN KEY (`id_show`) REFERENCES `movie` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `detail_user_show`
--
ALTER TABLE `detail_user_show`
  ADD CONSTRAINT `fk_show` FOREIGN KEY (`id_show`) REFERENCES `shows` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
