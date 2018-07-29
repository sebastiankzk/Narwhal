SELECT * FROM narwhal.tbl_user_cca;CREATE TABLE `tbl_user_cca` (
  `user_ccaID` int(11) NOT NULL,
  `userID` int(11) DEFAULT NULL,
  `ccaID` int(11) DEFAULT NULL,
  `quit` varchar(45) DEFAULT 'Active',
  PRIMARY KEY (`user_ccaID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
