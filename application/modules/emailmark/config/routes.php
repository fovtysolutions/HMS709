<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['email-marketing'] = 'emailmark/Mark/show';
$route['email-marketing/basic-marketing'] = 'emailmark/Mark/basicShow';
$route['email-marketing/basic-marketing-listadd'] = 'emailmark/Mark/basicListadd';

$route['email-marketing/multi-nights'] = 'emailmark/Mark/nightShowpage';
$route['email-marketing/multi-nights-list'] = 'emailmark/Mark/nightsList';
$route['email-marketing/eaily-bird'] = 'emailmark/Mark/eailyShowpage';
$route['email-marketing/eaily-bird-list'] = 'emailmark/Mark/eailylist';

$route['email-marketing/same-day'] = 'emailmark/Mark/sameDayShowpage';



$route['email-marketing/day-of-week'] = 'emailmark/Mark/dayOfWeekShowpage';
// $route['manage-channels/agoda-ota-manage/saveDetails'] = 'channel/Channel/saveOnbording';
// // $route['hall_room/hallroom-assign'] = 'hall_room/Hallroom/hallroom_assign';
// // $route['hall_room/hallroom-facility'] = 'hall_room/Hallroom/hallroom_facility';
// // $route['hall_room/seatplan'] = 'hall_room/Hallroom/seatplan';
// // $route['hall_room/report'] = 'hall_room/Hallroom/report';