<?php
// module directory name
$HmvcConfig['car_parking']["_title"]     = "Car parking";
$HmvcConfig['car_parking']["_description"] = "Car parking for hotel guests";
$HmvcConfig['car_parking']["_version"]   = 1.0;

// register your module tables
// only register tables are imported while installing the module
$HmvcConfig['car_parking']['_database'] = true;
$HmvcConfig['car_parking']["_tables"] = array( 
	'tbl_zone','tbl_slot','tbl_vehicle','tbl_parkingSetting','tbl_bookParking'
);
$HmvcConfig['car_parking']["_extra_query"] = true;
