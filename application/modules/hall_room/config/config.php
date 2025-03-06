<?php
// module directory name
$HmvcConfig['channel']["_title"]     = "Hall room";
$HmvcConfig['channel']["_description"] = "Hall room reservation";
$HmvcConfig['channel']["_version"]   = 1.0;

// register your module tables
// only register tables are imported while installing the module
$HmvcConfig['channel']['_database'] = true;
$HmvcConfig['channel']["_tables"] = array( 
	'tbl_hallroom_booking',
	'tbl_hallroom_postbill',
	'tbl_hallroom_info',
	'tbl_hallroom_seatplan'
);

$HmvcConfig['channel']["_extra_query"] = true;