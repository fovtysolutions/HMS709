<?php
// module directory name
$HmvcConfig['channel']["_title"]     = "Channel Manager";
$HmvcConfig['channel']["_description"] = "channel  manager";
$HmvcConfig['channel']["_version"]   = 1.0;

// register your module tables
// only register tables are imported while installing the module
$HmvcConfig['channel']['_database'] = true;
$HmvcConfig['channel']["_tables"] = array( 
	'channel_manager',
	'hotel_details',
	// 'tbl_hallroom_info',
	// 'tbl_hallroom_seatplan'
);

$HmvcConfig['channel']["_extra_query"] = true;