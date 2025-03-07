<?php

// module name
$HmvcMenu2["channel"] = array(
    //set icon
    "icon"           => "<i class='ti-blackboard'></i>
", 
 //group level name
     "dashboard" => array(
        //menu name
            "controller" => "channel;",
            "method"     => "index",
            "url"        => "channel-manager/dashboard",
            "permission" => "read"
        
    ),

    "channel_manage" => array(
        //menu name
            "controller" => "channel",
            "method"     => "show",
            "url"        => "manage-channels",
            "permission" => "read"
        
    ),
    //  "channels" => array(
    //     //menu name
    //         "controller" => "channel",
    //         "method"     => "show",
    //         "url"        => "hall_room/hallroom-type",
    //         "permission" => "read"
        
    // ),
    // "hallroom_status" => array(
    //     //menu name
    //         "controller" => "channel",
    //         "method"     => "show",
    //         "url"        => "manage-channels",
    //         "permission" => "read"
        
    // ),
    //  "hallroom_type" => array(
    //     //menu name
    //         "controller" => "Hallroom",
    //         "method"     => "hallroom_type",
    //         "url"        => "hall_room/hallroom-type",
    //         "permission" => "read"
        
    // ),
     
);
   

 