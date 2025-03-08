<?php
// module directory name
$HmvcConfig['booking_engine']["_title"]     = "Booking Engine";
$HmvcConfig['booking_engine']["_description"] = "Hall room reservation";
$HmvcConfig['booking_engine']["_version"]   = 1.0;

// register your module tables
// only register tables are imported while installing the module
$HmvcConfig['booking_engine']['_database'] = true;
$HmvcConfig['booking_engine']["_tables"] = array( 
	'tbl_booking_engine_paid',
	
);



$HmvcConfig['booking_engine']["_extra_query"] = true;
$config['csrf_protection'] = FALSE;
