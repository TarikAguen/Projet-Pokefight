SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `membre` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `mdp` varchar(1000) NOT NULL,
  `id_pkm` varchar(1000),
  `gold` int(1000),
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `monster` (
  `id_pkm` int NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `str` int(30) NOT NULL,
  `hp` int(30) NOT NULL,
  `spd` int(30) NOT NULL,
  `def` int(30) NOT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

