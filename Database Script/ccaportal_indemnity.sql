CREATE TABLE `indemnity` (
  `indemnityID` int(11) NOT NULL AUTO_INCREMENT,
  `userID` int(11) NOT NULL,
  `ccaID` int(11) NOT NULL,
  `nameOfParent` varchar(45) NOT NULL,
  `emergencyContact` varchar(45) NOT NULL,
  `date` date NOT NULL,
  `medicalRecord` varchar(45) NOT NULL,
  `status` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`indemnityID`),
  KEY `ccaID_idx` (`ccaID`),
  KEY `userID_idx` (`userID`),
  CONSTRAINT `indemnity_ibfk_1` FOREIGN KEY (`ccaID`) REFERENCES `cca` (`ccaID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `indemnity_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
