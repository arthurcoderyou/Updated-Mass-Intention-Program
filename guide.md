# tbl_mass_intentions
    list of mass intentions
    id Primary	int(11)			No	None		AUTO_INCREMENT		
	2	mi_contact_name	varchar(255)	latin1_swedish_ci		No	None				
	3	mi_contact_info	varchar(255)	latin1_swedish_ci		No	None				
	4	mi_intention_name	varchar(255)	latin1_swedish_ci		No	None				
	5	mi_intention_type	int(11)			No	None				
	6	mi_intention_type_other	varchar(255)	latin1_swedish_ci		No	None				
	7	mi_intention_notes	longtext	latin1_swedish_ci		No	None				
	8	mi_start_date	date			No	None				
	9	mi_end_date	date			No	None				
	10	mi_duration	int(11)			No	None				
	11	mi_duration_type	varchar(50)	latin1_swedish_ci		No	None				
	12	mi_added_by	varchar(50)	latin1_swedish_ci		No	None				
	13	mi_date_added	datetime			No	None				
	14	val_active	int(11)			No	None				


> intention type definition
    These are the type of mass intention 
    create edit delete enable/disable mass_intention_types

> requested time definition
    Here you will type the available hours for mass intention to be scheduled
    create edit delete enable/disable requested_time

> requested_time_days

# ACCOUNT
accounts:
cervaniaadrian@gmail.com
$2y$12$INDav2d6tgkisO7/jplQq.dcXPAEc5vKFAaHRnplxs3KWeKs0lYme
password :12345678


# DB CODE
INSERT INTO `mass_intentions` (contact_name, contact_info, intention_name, intention_type, intention_notes,start_date,end_date,duration,duration_type, status )
SELECT 
    `mi_contact_name`,         
    `mi_contact_info`,
    `mi_intention_name`,
    `mi_intention_type`,
    `mi_intention_notes`,
    `mi_start_date`,
    `mi_end_date`,
    `mi_duration`,
    `mi_duration_type`,
    `val_active`
FROM tbl_mass_intentions;


INSERT INTO `request_time_options` (id, time, status, created_at, updated_at,created_by )
SELECT 
    `id`,         
    `time`,
    `status`,
    `created_at`,
    `updated_at`,
    `created_by`
FROM tbl_requested_time;



INSERT INTO `request_time_option_days` (id, day_id, request_time_option_id, created_at, updated_at,created_by )
SELECT 
    `id`,         
    `day_id`,
    `request_time_option_id`,
    `created_at`,
    `updated_at`,
    `created_by`
FROM tbl_requested_time_days;


INSERT INTO `mass_intention_request_time_options` (id, mass_intention_id, time_option_id, created_at, updated_at  )
SELECT 
    `id`,         
    `mass_intention_id`,
    `requested_time_id`,
    `created_at`,
    `updated_at`
FROM tbl_mass_intentions_requested_time;


INSERT INTO `mass_intentions` (id, contact_name, contact_info, created_at, updated_at, created_by,intention_name, intention_type, intention_notes, start_date, end_date, duration, duration_type, status )
SELECT 
    `id`,         
    `mi_contact_name`,
    `mi_contact_info`,
    `created_at`,
    `updated_at`,
    `created_by`,
    `mi_intention_name`,
    `mi_intention_type`,
    `mi_intention_notes`,
    `mi_start_date`,
    `mi_end_date`,
    `mi_duration`,
    `mi_duration_type`,
    `status`
FROM tbl_mass_intentions;

> DB Creators in mass intention	

dsiadmin
Edit Edit
Copy Copy
Delete Delete
info@aganacathedral.org
- 10

Edit Edit
Copy Copy
Delete Delete
jbollinger@aganacathedral.org
- 5

Edit Edit
Copy Copy
Delete Delete
jsannicolas@aganacathedral.org
- 4 

Edit Edit
Copy Copy
Delete Delete
mkidd@aganacathedral.org
- 8

Edit
Copy Copy
Delete Delete
Front Desk Receptionist
info@aganacathedral.org
-9


> SQL CODE TO UPDATE:
UPDATE `tbl_mass_intentions` SET  `created_by`= 9 WHERE  `added_by` =  "info@aganacathedral.org"

UPDATE `tbl_requested_time` SET  `created_by`= 4 WHERE  `added_by` =  "jsannicolas@aganacathedral.org"

UPDATE `tbl_requested_time` SET  `created_by`= 4 WHERE  `mi_added_by` =  "jsannicolas@aganacathedral.org"

 UPDATE `tbl_mass_intentions` SET  `created_by`= 4 WHERE  `mi_added_by` =  "jsannicolas@aganacathedral.org"


> duration type
DY - day
WK - week
MO - month
YR - year


UPDATE `tbl_mass_intentions` SET  `mi_duration_type`='year'  WHERE `mi_duration_type` = "YR"




# DELETE RECORDS THAT ARE NO LONGER NEEDED
HAS DURATION TYPE day and 


DELETE FROM `tbl_mass_intentions` WHERE `mi_end_date` <= "2024-9-31 11:59:59"

DELETE FROM `tbl_mass_intentions` WHERE `mi_date_added` <= "2024-9-31 11:59:59" AND `mi_duration_type` = "day"

DELETE FROM `tbl_mass_intentions` WHERE `mi_date_added` <= "2022-9-31 11:59:59" AND `mi_duration_type` = "week" AND `mi_duration` <= 1

DELETE FROM `tbl_mass_intentions` WHERE `mi_date_added` <= "2022-9-31 11:59:59" AND `mi_duration_type` = "week" AND `mi_duration` <= 1




> mass intention id's 
12 , 13 ,14 ,15 ,16 ,17 ,18 ,19 ,20 ,21 ,22 ,23 ,24 ,25 ,26 ,27 ,28 ,29 ,30 ,31 ,32 ,33 ,34 ,35 ,36,37 ,38 ,39,40 ,41 ,42 ,43 , 44 , 45 ,46 ,47 ,48 ,49,50,51 ,52 ,53 ,54 ,55 ,56 , 57,58 ,59 , 60 ,61,62, 63 ,64 ,65 ,66,67 ,68 ,69 ,70 ,71 ,72 ,73,74, 75 ,76 ,77,


> delete not in array of ids
DELETE FROM tbl_mass_intentions_requested_time
WHERE requested_time_id NOT IN (16, 17, 18,  19,  20,  21,  22, 23, 24,  25,  26,  27,  28, 29, 30 );

| 16 |
| 17 |
| 18 |
| 19 |
| 20 |
| 21 |
| 22 |
| 23 |
| 24 |
| 25 |
| 26 |
| 27 |
| 28 |
| 29 |
| 30 


> updapting tables to have the same value
UPDATE tbl_requested_time
SET 
    `time` = `requested_time`,
    `status` = `val_active`,
    `created_at` = `date_added`,
    `updated_at` = `date_added`;


UPDATE tbl_requested_time
SET 
    `request_time_option_id` = `requested_time_id`,
    `day_id` = `col_day_id`;





# REMAINING FEATURES TO DO

Add permissions

Add roles

Add permission conditions of roles on the controllers 

Add permission conditions of roles on the views



Print 
Option to print the values based on the chosen order, filters and queries

> Report Templates
    [New feature is add to favorites the printing query we want to click if we need that format ready]
    technical idea
    create a new model that can save a query template of printing then use it in the dashboard


TODAY 
- all time

- per time

Output to other formats
- docs

Print view by list
Print view by paragraph




# ROLES AND PERMISSIONS 





