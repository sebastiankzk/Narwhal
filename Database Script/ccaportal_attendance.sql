SELECT * FROM narwhal.user;CREATE TABLE `attendance` (
  `attendanceID` int(11) NOT NULL AUTO_INCREMENT,
  `userID` int(11) NOT NULL,
  `ccaID` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `attendance` varchar(45) NOT NULL,
  `reason` varchar(100) DEFAULT NULL,
  `remarks` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`attendanceID`),
  KEY `ccaID_idx` (`ccaID`),
  KEY `userID_idx` (`userID`),
  CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `attendance_ibfk_2` FOREIGN KEY (`ccaID`) REFERENCES `cca` (`ccaID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
