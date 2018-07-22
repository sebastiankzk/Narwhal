CREATE TABLE `narwhal`.`contact_us` (
  `contactID` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `message` VARCHAR(500) NOT NULL,
  PRIMARY KEY (`contactID`));
