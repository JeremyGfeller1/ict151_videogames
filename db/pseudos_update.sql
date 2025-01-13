DROP SCHEMA ict151_videogames;
CREATE SCHEMA ict151_videogames;
USE ict151_videogames;

CREATE TABLE videogames (
  id int(11) NOT NULL AUTO_INCREMENT,
  noun varchar(20) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE pseudos (
  id int(11) NOT NULL AUTO_INCREMENT,
  nickname varchar(100) NOT NULL,
  gender char(1) NOT NULL,
  origin text NOT NULL,
  since date NOT NULL,
  isDeleted boolean DEFAULT 0,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `pseudos_in_videogames` (
	id int(11) NOT NULL AUTO_INCREMENT,
	`fkPseudo` int(11) NOT NULL,
	`fkVideogame` int(11) NOT NULL,
	PRIMARY KEY (`id`),
	FOREIGN KEY (`fkPseudo`) REFERENCES `pseudos`(`id`) ON DELETE CASCADE,
	FOREIGN KEY (`fkVideogame`) REFERENCES `videogames`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE users (
  id int(11) NOT NULL AUTO_INCREMENT,
  username varchar(20) NOT NULL,
  pass varchar(255) NOT NULL,
  administrator int(2) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Insérer des jeux vidéo
INSERT INTO videogames (noun) VALUES 
('Minecraft'), 
('Fortnite'), 
('League of Legends'), 
('Valorant'), 
('Apex Legends');

-- Insérer des pseudos
INSERT INTO pseudos (nickname, gender, origin, since) VALUES 
('ShadowSlayer', 'M', 'Inspired by fantasy novels', '2015-06-10'),
('LunaFox', 'F', 'Derived from love for foxes', '2017-09-23'),
('PixelPirate', 'M', 'Combination of tech and pirate themes', '2019-03-14'),
('CyberSakura', 'F', 'Love for cyberpunk and cherry blossoms', '2020-08-19'),
('StealthDragon', 'M', 'Stealthy nature and admiration for dragons', '2018-12-05');

-- Créer des associations dans pseudos_in_videogames (au moins 5 jeux par pseudo)
INSERT INTO pseudos_in_videogames (fkPseudo, fkVideogame) VALUES 
(1, 1), (1, 2), (1, 3), (1, 4), (1, 5),
(2, 1), (2, 3), (2, 4), (2, 5), (2, 2),
(3, 2), (3, 3), (3, 1), (3, 5), (3, 4),
(4, 4), (4, 5), (4, 3), (4, 2), (4, 1),
(5, 5), (5, 3), (5, 4), (5, 1), (5, 2);

INSERT INTO users (username, pass, administrator) VALUES ('admin', '$2y$10$VlROxnjPaNMnX7Qg6QDX7uKZT1TmrFr/cOW7P/J8QFVyKbVfEavKy', 1);
INSERT INTO users (username, pass, administrator) VALUES ('user', '$2y$10$VlROxnjPaNMnX7Qg6QDX7uKZT1TmrFr/cOW7P/J8QFVyKbVfEavKy', 0);