CREATE 
    ALGORITHM = UNDEFINED 
    DEFINER = `root`@`localhost` 
    SQL SECURITY DEFINER
VIEW `attendance_view` AS
    SELECT 
        `attendance`.`attendanceID` AS `attendanceID`,
        `attendance`.`userID` AS `userID`,
        `user`.`name` AS `User_name`,
        `attendance`.`ccaID` AS `ccaID`,
        `cca`.`name` AS `cca_name`,
        `attendance`.`dateTime` AS `dateTime`,
        `attendance`.`attendance` AS `attendance`,
        `attendance`.`reason` AS `reason`,
        `attendance`.`remarks` AS `remarks`
    FROM
        ((`attendance`
        JOIN `user` ON ((`attendance`.`userID` = `user`.`userID`)))
        JOIN `cca` ON ((`attendance`.`ccaID` = `cca`.`ccaID`)))