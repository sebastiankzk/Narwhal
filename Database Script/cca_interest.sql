CREATE TABLE `cca_interest` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ccaID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
