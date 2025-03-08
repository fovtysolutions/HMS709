<?php
defined('BASEPATH') OR exit('No direct script access allowed');



$route['booking_engine/paidservices'] = 'booking_engine/Bookingengine/index';
$route['booking_engine/notification_popup'] = 'booking_engine/Bookingengine/notification';
$route['booking_engine/promotional_slider'] = 'booking_engine/Bookingengine/promotional';
$route['booking_engine/coupon'] = 'booking_engine/Bookingengine/coupon';

$route['booking-engine/save-service'] = 'booking_engine/Bookingengine/save_service';



// $route['booking_engine/edit_service/(:num)'] = 'booking_engine/Bookingengine/edit_service/$1';
$route['booking_engine/update_service'] = 'booking_engine/Bookingengine/update_service';
$route['booking_engine/delete_service/(:num)'] = 'booking_engine/Bookingengine/delete_service/$1';
