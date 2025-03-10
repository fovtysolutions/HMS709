<?php
// module directory name
$HmvcConfig['emailmark']["_title"]     = "	Email Marketing";
$HmvcConfig['emailmark']["_description"] = "Email Marketing";
$HmvcConfig['emailmark']["_version"]   = 1.0;

// register your module tables
// only register tables are imported while installing the module
$HmvcConfig['emailmark']['_database'] = true;
$HmvcConfig['emailmark']["_tables"] = array( 
	 'marketing',
	 'tb_multinights',
	//  'tb_sameday',
	'tb_eailybird',
	// 'tb_dayofweek'
	
);

$HmvcConfig['emailmark']["_extra_query"] = true;