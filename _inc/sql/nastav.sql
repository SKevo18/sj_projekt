CREATE DATABASE IF NOT EXISTS `projekt`;
USE `projekt`;


CREATE TABLE `kontakt` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `meno` varchar(40) DEFAULT NULL,
 `email` varchar(64) DEFAULT NULL,
 `sprava` text NOT NULL,
 `suhlas` tinyint(1) NOT NULL DEFAULT 0,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_slovak_ci;


CREATE TABLE `recept` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `nazov` varchar(40) NOT NULL,
 `pridany` date NOT NULL DEFAULT CURRENT_TIMESTAMP(),
 `popis` VARCHAR(255) DEFAULT NULL,
 `postup` text DEFAULT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_slovak_ci;


CREATE TABLE `surovina` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `nazov` varchar(30) NOT NULL,
 `kcal` smallint(5) unsigned NOT NULL,
 `jednotka` varchar(8) NOT NULL DEFAULT "g",
 `cena` decimal(3,2) DEFAULT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_slovak_ci;

CREATE TABLE `surovina_recept` (
 `id_surovina` int(11) NOT NULL,
 `id_recept` int(11) NOT NULL,
 `mnozstvo` smallint(5) unsigned NOT NULL,
 PRIMARY KEY (`id_surovina`,`id_recept`),
 KEY `fk_recept` (`id_recept`),
 CONSTRAINT `fk_recept` FOREIGN KEY (`id_recept`) REFERENCES `recept` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
 CONSTRAINT `fk_surovina` FOREIGN KEY (`id_surovina`) REFERENCES `surovina` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_slovak_ci;
