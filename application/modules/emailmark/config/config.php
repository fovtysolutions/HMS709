<?php
// module directory name
$HmvcConfig['emailmark']["_title"]     = "	Email Marketing";
$HmvcConfig['emailmark']["_description"] = "Email Marketing";
$HmvcConfig['emailmark']["_version"]   = 1.0;

// register your module tables
// only register tables are imported while installing the module
$HmvcConfig['emailmark']['_database'] = true;
$HmvcConfig['emailmark']["_tables"] = array( 
	// 'channel_manager',
	// 'hotel_details',
	// 'tbl_hallroom_info',
	// 'tbl_hallroom_seatplan'
);

$HmvcConfig['emailmark']["_extra_query"] = true;