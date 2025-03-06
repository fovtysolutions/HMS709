CREATE TABLE `tbl_zone` (
  `zone_id` int(11) NOT NULL AUTO_INCREMENT,
  `zone_type` text DEFAULT NULL,
  `isactive` int(3) DEFAULT 1,
  PRIMARY KEY (`zone_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
CREATE TABLE `tbl_slot` (
  `slot_id` int(11) NOT NULL AUTO_INCREMENT,
  `slot_type` text DEFAULT NULL,
  `zone_id` int(11) DEFAULT NULL,
  `isactive` int(3) DEFAULT 1,
  PRIMARY KEY (`slot_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
CREATE TABLE `tbl_vehicle` (
  `vehicle_id` int(11) NOT NULL AUTO_INCREMENT,
  `vehicle_type` text DEFAULT NULL,
  `isactive` int(3) DEFAULT 1,
  PRIMARY KEY (`vehicle_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
CREATE TABLE `tbl_parkingSetting` (
  `parkingSetting_id` int(11) NOT NULL AUTO_INCREMENT,
  `zone_id` int(11) DEFAULT NULL,
  `vehicle_id` int(11) DEFAULT NULL,
  `time` int(11) DEFAULT 0,
  `price` decimal(10,2) DEFAULT 0,
  `vat` decimal(5,2) DEFAULT 0,
  PRIMARY KEY (`parkingSetting_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
CREATE TABLE `tbl_bookParking` (
  `bookParking_id` int(11) NOT NULL AUTO_INCREMENT,
  `bookedid` int(11) DEFAULT NULL,
  `parkingSetting_id` int(11) DEFAULT NULL,
  `zone_id` int(11) DEFAULT NULL,
  `slot_id` varchar(100) DEFAULT NULL,
  `total_price` decimal(10,2) DEFAULT 0,
  `checkin` datetime DEFAULT null,
  `checkout` datetime DEFAULT null,
  `status` int(3) DEFAULT 0 comment '0=free,1=booked,2=cancelled',
  `paymentStatus` int(3) DEFAULT 0 comment '0=unpaid,1=paid',
  `comment` text DEFAULT null,
  PRIMARY KEY (`bookParking_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;