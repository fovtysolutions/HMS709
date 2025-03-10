INSERT INTO `language` (`phrase`, `english`) VALUES( 'marketing_name', 'Markeing Name');
INSERT INTO `language` (`phrase`, `english`) VALUES( 'select_channels', 'Select Channels');
INSERT INTO `language` (`phrase`, `english`) VALUES( 'discount_in', 'Discount In %');
INSERT INTO `language` (`phrase`, `english`) VALUES( 'select_off_type', 'Select Offer Type');
INSERT INTO `language` (`phrase`, `english`) VALUES( 'stay_date', 'Stay Date');
INSERT INTO `language` (`phrase`, `english`) VALUES( 'start_date', 'Start Date');
INSERT INTO `language` (`phrase`, `english`) VALUES( 'end_date', 'End Date');
INSERT INTO `language` (`phrase`, `english`) VALUES( 'submit', 'Submit');
INSERT INTO `language` (`phrase`, `english`) VALUES( 'cancel', 'Cancel');
INSERT INTO `language` (`phrase`, `english`) VALUES( 'no_end_date', 'No End Date');
INSERT INTO `language` (`phrase`, `english`) VALUES( 'basic', ' Basic');
INSERT INTO `language` (`phrase`, `english`) VALUES( 'email_mark', 'Email Marketing');
INSERT INTO `language` (`phrase`, `english`) VALUES( 'marketing', 'Marketing');

INSERT INTO `language` (`phrase`, `english`) VALUES( 'booking_date', 'Booking Date');
INSERT INTO `language` (`phrase`, `english`) VALUES( 'blackout', 'Do you want to blackout the offer for specific stay date ?');


INSERT INTO `language` (`phrase`, `english`) VALUES( 'blackout_dates', 'Choose Blackout Date');
INSERT INTO `language` (`phrase`, `english`) VALUES( 'is_recurring', 'Is Recurring ?');
INSERT INTO `language` (`phrase`, `english`) VALUES( 'length_of_stay', 'Length of Stay');
INSERT INTO `language` (`phrase`, `english`) VALUES( 'min', 'Minimum');
INSERT INTO `language` (`phrase`, `english`) VALUES( 'maximum', 'Maximum');
INSERT INTO `language` (`phrase`, `english`) VALUES( 'app_night', 'Applicable night');

INSERT INTO `language` (`phrase`, `english`) VALUES( 'only_member', 'Applicable only for Members ?');
INSERT INTO `language` (`phrase`, `english`) VALUES( 'only_mobile_users', 'Applicable only for Mobile Users ?');
INSERT INTO `language` (`phrase`, `english`) VALUES( 'all_the_room_rate_plan', 'Will the Marketing be applicable for all the room rate plan ?');
INSERT INTO `language` (`phrase`, `english`) VALUES( 'basic_mark', 'Basic Marketing');
INSERT INTO `language` (`phrase`, `english`) VALUES( 'basic_mark', 'Basic Marketing');
INSERT INTO `language` (`phrase`, `english`) VALUES( 'eaily_bird', 'Eairy Bird');
INSERT INTO `language` (`phrase`, `english`) VALUES( 'day_of_week', 'Day of Week');
INSERT INTO `language` (`phrase`, `english`) VALUES( 'same_day', 'Same Day');
INSERT INTO `language` (`phrase`, `english`) VALUES( 'multi_nights', 'Multi Nights');





ALTER TABLE `tbl_roomnofloorassign` ADD `hallid` INT(11) NULL DEFAULT NULL AFTER `roomid`;
ALTER TABLE `tbl_roomnofloorassign` CHANGE `roomid` `roomid` INT(11) NULL DEFAULT NULL;
ALTER TABLE `roomfaility_ref_accomodation` ADD `hallid` INT(11) NULL DEFAULT NULL AFTER `room_id`;
ALTER TABLE `roomfaility_ref_accomodation` CHANGE `room_id` `room_id` INT(11) NULL DEFAULT NULL;
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`)
VALUES('30305', 'Hall Room Service', 'Service', 2, 1, 1, 0, 'I', 0, 0, '0.00', '1', '2021-12-19 18:52:31', '', '0000-00-00 00:00:00');
INSERT INTO `sec_menu_item` (`menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) VALUES ('hall_room', 'hall-room', 'hall_room', '0', '0', '1', '2021-12-19 00:00:00');
INSERT INTO `sec_menu_item` (`menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) SELECT 'hallroom_booking', 'hallroom-booking', 'hall_room', sec_menu_item.menu_id, '0', '1', '2021-12-19 00:00:00' FROM sec_menu_item WHERE sec_menu_item.menu_title = 'hall_room';
INSERT INTO `sec_menu_item` (`menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) SELECT 'hallroom_status', 'hallroom-status', 'hall_room', sec_menu_item.menu_id, '0', '1', '2021-12-19 00:00:00' FROM sec_menu_item WHERE sec_menu_item.menu_title = 'hall_room';
INSERT INTO `sec_menu_item` (`menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) SELECT 'hallroom_type', 'hallroom-type', 'hall_room', sec_menu_item.menu_id, '0', '1', '2021-12-19 00:00:00' FROM sec_menu_item WHERE sec_menu_item.menu_title = 'hall_room';
INSERT INTO `sec_menu_item` (`menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) SELECT 'hallroom_assign', 'hallroom-assign', 'hall_room', sec_menu_item.menu_id, '0', '1', '2021-12-19 00:00:00' FROM sec_menu_item WHERE sec_menu_item.menu_title = 'hall_room';
INSERT INTO `sec_menu_item` (`menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) SELECT 'hallroom_facility', 'hallroom-facility', 'hall_room', sec_menu_item.menu_id, '0', '1', '2021-12-19 00:00:00' FROM sec_menu_item WHERE sec_menu_item.menu_title = 'hall_room';
INSERT INTO `sec_menu_item` (`menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) SELECT 'seatplan', 'seatplan', 'hall_room', sec_menu_item.menu_id, '0', '1', '2021-12-19 00:00:00' FROM sec_menu_item WHERE sec_menu_item.menu_title = 'hall_room';
INSERT INTO `sec_menu_item` (`menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) SELECT 'report', 'report', 'hall_room', sec_menu_item.menu_id, '0', '1', '2021-12-19 00:00:00' FROM sec_menu_item WHERE sec_menu_item.menu_title = 'hall_room';