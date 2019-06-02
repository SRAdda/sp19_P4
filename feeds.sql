SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';
DROP TABLE IF EXISTS `sp19_newscategories`;
CREATE TABLE `sp19_newscategories` (
  `categoryID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `categoryName` varchar(120) DEFAULT NULL,
  PRIMARY KEY (`categoryID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
INSERT INTO `sp19_newscategories` (`categoryID`, `categoryName`) VALUES
(1, 'Entertainment'),
(2, 'Sports News and Events'),
(3, 'Movie News and Listings');
DROP TABLE IF EXISTS `sp19_feeds`;
CREATE TABLE `sp19_feeds` (
  `feedName` varchar(255) NOT NULL,
  `feedID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `categoryID` int(11) DEFAULT '0',
  `feedUrl` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`feedID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
INSERT INTO `sp19_feeds` (`feedName`, `feedID`, `categoryID`, `feedUrl`) VALUES
('Dance',   1,  1,  'seattle+dance'),
('Theater',  2,  1,  'seattle+theater'),
('Music', 3,  1,  'seattle+music'),
('Seattle Sports News',    4,  2,  'seattle+sports'),
('USA Today Sports News', 5,  2,  'usatoday+sports+news'),
('ESPN Sports News', 6,  2,  'espn+sports+news'),
('Seattle Movie Scene', 7,  3,  'seattle+movies'),
('Movie News', 8,  3,  'movies+news'),
('Top 10 movies', 9, 3,  'top10movies');