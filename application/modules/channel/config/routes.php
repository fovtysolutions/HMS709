<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['channel-manager/dashboard'] = 'channel/Channel/index';
// $route['manage-channels'] = 'channel/Channel/show';

$route['manage-channels'] = 'channel/Channel/show';
$route['manage-channels/agoda-ota-manage'] = 'channel/Channel/show1';
$route['hall_room/hallroom-assign'] = 'hall_room/Hallroom/hallroom_assign';
// $route['hall_room/hallroom-facility'] = 'hall_room/Hallroom/hallroom_facility';
// $route['hall_room/seatplan'] = 'hall_room/Hallroom/seatplan';
// $route['hall_room/report'] = 'hall_room/Hallroom/report';