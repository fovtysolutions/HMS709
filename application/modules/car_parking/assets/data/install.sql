INSERT INTO `language` (`phrase`, `english`) VALUES( 'car_parking', 'Car Parking');
INSERT INTO `language` (`phrase`, `english`) VALUES( 'zone_list', 'Zone List');
INSERT INTO `language` (`phrase`, `english`) VALUES( 'slot_list', 'Slot List');
INSERT INTO `language` (`phrase`, `english`) VALUES( 'vehicle_list', 'Vehicle List');
INSERT INTO `language` (`phrase`, `english`) VALUES( 'setting_list', 'Setting List');
INSERT INTO `language` (`phrase`, `english`) VALUES( 'book_parking', 'Book Parking');
INSERT INTO `language` (`phrase`, `english`) VALUES( 'parking_list', 'Parking List');
INSERT INTO `language` (`phrase`, `english`) VALUES( 'vehicle_type', 'Vehicle Type');
INSERT INTO `language` (`phrase`, `english`) VALUES( 'zone_type', 'Zone Type');
INSERT INTO `language` (`phrase`, `english`) VALUES( 'select_time', 'Select Time');
INSERT INTO `language` (`phrase`, `english`) VALUES( 'parking_note', 'Parking Note');
INSERT INTO `language` (`phrase`, `english`) VALUES( 'please_select_slot', 'Please Select a Slot');
INSERT INTO `language` (`phrase`, `english`) VALUES( 'bill_summary', 'Bill Summary');
INSERT INTO `language` (`phrase`, `english`) VALUES( 'slot', 'Slot');
INSERT INTO `language` (`phrase`, `english`) VALUES( 'hour', 'Hour');
INSERT INTO `language` (`phrase`, `english`) VALUES( 'slot_type', 'Slot Type');
INSERT INTO `language` (`phrase`, `english`) VALUES( 'zone', 'Zone');
INSERT INTO `language` (`phrase`, `english`) VALUES( 'ttime', 'Time');
INSERT INTO `language` (`phrase`, `english`) VALUES( 'slot_no', 'Slot No');
INSERT INTO `sec_menu_item` (`menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) VALUES 
('car_parking', 'car_parking', 'car_parking', '0', '0', '1', current_timestamp());
INSERT INTO `sec_menu_item` (`menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) 
SELECT 'zone_list', 'zone_list', 'car_parking', sec_menu_item.menu_id, '0', '1', current_timestamp() FROM sec_menu_item WHERE sec_menu_item.menu_title = 'car_parking';
INSERT INTO `sec_menu_item` (`menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) 
SELECT 'slot_list', 'slot_list', 'car_parking', sec_menu_item.menu_id, '0', '1', current_timestamp() FROM sec_menu_item WHERE sec_menu_item.menu_title = 'car_parking';
INSERT INTO `sec_menu_item` (`menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) 
SELECT 'vehicle_list', 'vehicle_list', 'car_parking', sec_menu_item.menu_id, '0', '1', current_timestamp() FROM sec_menu_item WHERE sec_menu_item.menu_title = 'car_parking';
INSERT INTO `sec_menu_item` (`menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) 
SELECT 'setting_list', 'setting_list', 'car_parking', sec_menu_item.menu_id, '0', '1', current_timestamp() FROM sec_menu_item WHERE sec_menu_item.menu_title = 'car_parking';
INSERT INTO `sec_menu_item` (`menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) 
SELECT 'book_parking', 'book_parking', 'car_parking', sec_menu_item.menu_id, '0', '1', current_timestamp() FROM sec_menu_item WHERE sec_menu_item.menu_title = 'car_parking';
INSERT INTO `sec_menu_item` (`menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) 
SELECT 'parking_list', 'parking_list', 'car_parking', sec_menu_item.menu_id, '0', '1', current_timestamp() FROM sec_menu_item WHERE sec_menu_item.menu_title = 'car_parking';
