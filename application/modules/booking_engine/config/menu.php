<?php

// module name
$HmvcMenu2["booking_engine"] = array(
    //set icon
    "icon"           => "<i class='ti-blackboard'></i>
", 
 //group level name
  

    "paidservices" => array(
       //menu name
           "controller" => "Bookingengine",
           "method"     => "index",
           "url"        => "booking_engine/paidservices",
           "permission" => "read"
       
   ),
   // notification popup
    "notification_popup" => array(
    //menu name
    "controller" => "Bookingengine",
    "method"     => "index",
    "url"        => "booking_engine/notification_popup",
    "permission" => "read"
    
   ),
   //promotional slider
   "promotional_slider" => array(
    //menu name
    "controller" => "Bookingengine",
    "method"     => "index",
    "url"        => "booking_engine/promotional_slider",
    "permission" => "read"
   ),
   //coupon
   "coupon" => array(
    //menu name
    "controller" => "Bookingengine",
    "method"     => "index",
    "url"        => "booking_engine/coupon",
    "permission" => "read"
   ),


   
);
   

 