-- phpMyAdmin SQL Dump
-- version 4.4.1.1
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Erstellungszeit: 26. Jun 2015 um 21:16
-- Server-Version: 5.5.42
-- PHP-Version: 5.4.39

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Datenbank: `splendr`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `products`
--

CREATE TABLE `products` (
  `id` int(10) unsigned NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `name` varchar(256) NOT NULL,
  `url` varchar(1024) DEFAULT NULL,
  `image` varchar(1024) DEFAULT NULL,
  `price` varchar(23) DEFAULT NULL,
  `board` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `products`
--

INSERT INTO `products` (`id`, `timestamp`, `name`, `url`, `image`, `price`, `board`) VALUES
(3, '2015-06-11 12:25:33', 'IPhone 4', 'http://www.amazon.de/Apple-iPhone-32GB-schwarz-Simlock/dp/B003TKSD8E', 'http://ecx.images-amazon.com/images/I/61I-nQED-fL._SL1500_.jpg', '225', 'Technik'),
(18, '2015-06-22 12:35:40', 'Samsung Galaxy S6', 'http://www.amazon.de/Samsung-Galaxy-S6-Smartphone-Touch-Display/dp/B00TX5O8WE/ref=sr_1_1?ie=UTF8&qid=1434976515&sr=8-1&keywords=samsung+galaxy+s6', 'http://ecx.images-amazon.com/images/I/81NcaQNcoqL._SL1500_.jpg', '550', 'Technik'),
(19, '2015-06-24 15:38:59', 'IPhone 6', 'http://www.amazon.de/Apple-iPhone-Smartphone-Display-Speicher/dp/B00NGOCJ74', 'http://ecx.images-amazon.com/images/I/51eclIdmTuL.jpg', '700', 'Technik'),
(21, '2015-06-24 16:32:22', 'Hundekorb', 'http://www.ebay.de/itm/Hundebett-mit-Kissen-Hundekorb-Hundesofa-Hunde-Katzen-Tier-Bett-Katzenbett-S-XL-/400596027195?pt=LH_DefaultDomain_77&var=&hash=item5d4562473b', 'http://i.ebayimg.com/t/Hundebett-mit-Kissen-Hundekorb-Hundesofa-Hunde-Katzen-Tier-Bett-Katzenbett-S-XL-/00/s/MTYwMFgxNjAw/z/eU4AAOSweW5VHqiI/$_57.JPG', '33', 'Mode'),
(22, '2015-06-26 15:00:53', 'Damen Sommer Maxikleid', 'http://www.ebay.de/itm/Sexy-Damen-Sommer-Maxikleid-Lang-Boho-Party-Strand-Abendkleid-Cocktailkleider-/381284967084?pt=LH_DefaultDomain_77&var=&hash=item58c65ae2ac', 'http://i.ebayimg.com/t/Sexy-Damen-Sommer-Maxikleid-Lang-Boho-Party-Strand-Abendkleid-Cocktailkleider-/00/s/OTAwWDkwMA==/z/F9UAAOSwl8NVcW2~/$_57.JPG', '12', 'Mode'),
(23, '2015-06-26 15:02:35', 'BEHYPE Herren Chinohose', 'http://www.ebay.de/itm/BEHYPE-Herren-Chinohose-Slim-Stil-Chino-Hose-Jeans-Schwarz-Braun-Navy-Beige-NEU-/400854470765?pt=LH_DefaultDomain_77&var=&hash=item5d54c9d06d', 'http://i.ebayimg.com/t/BEHYPE-Herren-Chinohose-Slim-Stil-Chino-Hose-Jeans-Schwarz-Braun-Navy-Beige-NEU-/00/s/MTAwMVgxMDAx/z/djYAAOSwBahUzPrd/$_57.JPG', '24', 'Mode'),
(24, '2015-06-26 15:04:05', 'Sony MDRZX100', 'http://www.amazon.de/Sony-MDRZX100-DJ-B%C3%BCgelkopfh%C3%B6rer-wei%C3%9F/dp/B004MMG39E/ref=sr_1_5?ie=UTF8&qid=1435330996&sr=8-5&keywords=kopfh%C3%B6rer', 'http://ecx.images-amazon.com/images/I/51O2GoKZ9RL._SL1320_.jpg', '18', 'Technik'),
(25, '2015-06-26 15:05:07', 'Biere der Welt (12 Flaschen)', 'http://www.amazon.de/Biere-der-Welt-12-Flaschen/dp/B003Q6WQL6/ref=sr_1_1?ie=UTF8&qid=1435331071&sr=8-1&keywords=bier', 'http://ecx.images-amazon.com/images/I/91B2UumeE4L._SL1500_.jpg', '26', 'Bier'),
(26, '2015-06-26 15:06:35', 'Heineken Bier 24x0,33', 'http://www.amazon.de/Heineken-Bier-24x0-Inkl-Pfand/dp/B007SGQR7O/ref=sr_1_1?ie=UTF8&qid=1435331164&sr=8-1&keywords=heineken', 'http://ecx.images-amazon.com/images/I/817SF19w7LL._SL1500_.jpg', '26', 'Bier'),
(27, '2015-06-26 15:09:47', 'Asus F205TA-BING-FD0035BS', 'http://www.amazon.de/F205TA-BING-FD0035BS-Notebook-Intel-Z3735F-HDGrafik/dp/B00P0X5YVW/ref=sr_1_2?ie=UTF8&qid=1435331355&sr=8-2&keywords=laptop', 'http://ecx.images-amazon.com/images/I/7144Ox6eupL._SL1500_.jpg', '258', 'Technik');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE `user` (
  `firstname` varchar(50) CHARACTER SET utf8 NOT NULL,
  `lastname` varchar(50) CHARACTER SET utf8 NOT NULL,
  `email` varchar(256) CHARACTER SET utf8 NOT NULL,
  `password` varchar(1024) CHARACTER SET utf8 NOT NULL,
  `id` int(10) unsigned NOT NULL,
  `activationCode` varchar(35) CHARACTER SET utf8 NOT NULL,
  `activated` int(1) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `user`
--

INSERT INTO `user` (`firstname`, `lastname`, `email`, `password`, `id`, `activationCode`, `activated`) VALUES
('Robert', 'Manig', 'cyanwish@gmail.com', 'sha256:1000:vf8LK43YChMiNlI2eRn4UzPSvUu0+Hqw:1MYAV8frzAY4g7zvmFmdY1QAFWgQM7fu', 11, '96c477291b610d0f5c9573b18d13cb24', 1);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT für Tabelle `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
