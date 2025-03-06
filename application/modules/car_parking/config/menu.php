<?php

// module name
$HmvcMenu2["car_parking"] = array(
    //set icon
    "icon"           => "<i class='hvr-buzz-out fas fa-car-side'></i>
", 
//group level name
    "zone_list" => array(
        //menu name
            "controller" => "tax",
            "method"     => "index",
            "url"        => "car_parking/zoneList",
            "permission" => "read"
        
    ),
    "slot_list" => array(
        //menu name
            "controller" => "tax",
            "method"     => "index",
            "url"        => "car_parking/slotList",
            "permission" => "read"
        
    ),
    "vehicle_list" => array(
        //menu name
            "controller" => "tax",
            "method"     => "index",
            "url"        => "car_parking/vehicleList",
            "permission" => "read"
        
    ),
    "setting_list" => array(
        //menu name
            "controller" => "tax",
            "method"     => "index",
            "url"        => "car_parking/settingList",
            "permission" => "read"
        
    ),
    "book_parking" => array(
        //menu name
            "controller" => "tax",
            "method"     => "index",
            "url"        => "car_parking/bookParking",
            "permission" => "read"
        
    ),
    "parking_list" => array(
        //menu name
            "controller" => "tax",
            "method"     => "index",
            "url"        => "car_parking/parkingList",
            "permission" => "read"
        
    ),
);

 