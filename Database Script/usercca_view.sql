CREATE 
    ALGORITHM = UNDEFINED 
    DEFINER = `root`@`localhost` 
    SQL SECURITY DEFINER
VIEW `usercca_view` AS
    SELECT 
        `user`.`userID` AS `userID`,
        `user`.`name` AS `User_name`,
        `cca`.`ccaID` AS `ccaID`,
        `cca`.`name` AS `cca_name`
    FROM
        ((`tbl_user_cca`
        JOIN `user` ON ((`user`.`userID` = `tbl_user_cca`.`userID`)))
        JOIN `cca` ON ((`cca`.`ccaID` = `tbl_user_cca`.`ccaID`)))