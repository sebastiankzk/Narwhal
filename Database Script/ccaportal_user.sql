CREATE TABLE `user` (
  `userID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL,
  `adminNumber` varchar(45) NOT NULL,
  `gender` varchar(45) NOT NULL,
  `dob` varchar(45) NOT NULL,
  `address` varchar(100) NOT NULL,
  `email` varchar(45) NOT NULL,
  `mobile` varchar(45) NOT NULL,
  `role` set('Admin','Student','Leader') NOT NULL DEFAULT 'Student',
  PRIMARY KEY (`userID`),
  UNIQUE KEY `adminNumber_UNIQUE` (`adminNumber`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
