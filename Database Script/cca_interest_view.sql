USE `narwhal`;
CREATE  OR REPLACE VIEW `cca_interest_view` AS

select distinct cca_interest.id, cca_interest.ccaID, cca.name as cca_name, cca_interest.userID, user.name as user_name, user.adminNumber, user.gender, user.email, user.mobile, cca_interest.reg_date
from cca_interest inner join
user on cca_interest.userID = user.userID inner join
cca on cca_interest.ccaID = cca.ccaID;
