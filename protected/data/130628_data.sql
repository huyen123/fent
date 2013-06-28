truncate `profile`;
truncate `category`;
truncate `device`;
INSERT INTO `profile` (`email`, `employee_code`, `secret_key`) VALUES ('fent.admin@framgia.com', 'FENTADMIN', 'fentadmin');
INSERT INTO `profile` (`email`, `employee_code`, `name`) VALUES ('nguyen.thi.huyen@framgia.com', 'B120043', 'Nguyễn Thị Huyền');
INSERT INTO `profile` (`email`, `employee_code`, `name`) VALUES ('nguyen.van.giang@framgia.com', 'B120040', 'Nguyen Van Giang');
INSERT INTO `profile` (`email`, `employee_code`, `name`) VALUES ('le.van.ban@framgia.com', 'B120041', 'Le Van Ban');
INSERT INTO `profile` (`email`, `employee_code`, `name`) VALUES ('pham.tri.thai@framgia.com', 'B120042', 'Pham Tri Thai');
INSERT INTO `profile` (`email`, `employee_code`, `name`) VALUES ('nguyen.ngoc.du@framgia.com', 'B120045', 'Nguyen Ngoc Du');
INSERT INTO `profile` (`email`, `employee_code`, `name`) VALUES ('nguyen.thi.ngoc@framgia.com', 'B120038', 'Nguyen Thi Ngoc');
INSERT INTO `profile` (`email`, `employee_code`, `name`) VALUES ('tran.duc.thang@framgia.com', 'B120050', 'Tran Duc Thang');
INSERT INTO `profile` (`email`, `employee_code`, `name`) VALUES ('nguyen.trung.quan@framgia.com', 'B120036', 'Nguyen Trung Quan');

INSERT INTO `user` (`username`, `password`, `is_admin`, `profile_id`) VALUES ('admin', '21232f297a57a5a743894a0e4a801fc3', 1, 1);

INSERT INTO `category` (`name`) VALUES ('MacBook');
INSERT INTO `category` (`name`) VALUES ('Laptop');
INSERT INTO `category` (`name`) VALUES ('Monitor');
INSERT INTO `category` (`name`) VALUES ('Case + Mac mini');
INSERT INTO `category` (`name`) VALUES ('Android Devices');
INSERT INTO `category` (`name`) VALUES ('Ios Devices');
INSERT INTO `category` (`name`) VALUES ('Other');

INSERT INTO `device` (`name`, `description`, `serial_number`, `category_id`) VALUES ('MacBook_01', 'White', 'M01', 1);
INSERT INTO `device` (`name`, `description`, `serial_number`, `category_id`) VALUES ('MacBook_02', 'Black', 'M02', 1);
INSERT INTO `device` (`name`, `description`, `serial_number`, `category_id`) VALUES ('MacBook_03', 'Black', 'M03', 1);
INSERT INTO `device` (`name`, `description`, `serial_number`, `category_id`) VALUES ('MacBook_04', 'White', 'M04', 1);
INSERT INTO `device` (`name`, `description`, `serial_number`, `category_id`) VALUES ('Dell_01', 'Black', 'D01', 2);
INSERT INTO `device` (`name`, `description`, `serial_number`, `category_id`) VALUES ('Dell_02', 'Black', 'D02', 2);
INSERT INTO `device` (`name`, `description`, `serial_number`, `category_id`) VALUES ('Dell_03', 'Black', 'D03', 2);
INSERT INTO `device` (`name`, `description`, `serial_number`, `category_id`) VALUES ('Dell_04', 'Black', 'D04', 2);
INSERT INTO `device` (`name`, `description`, `serial_number`, `category_id`) VALUES ('Monitor_01', 'White', 'Mo01', 3);
INSERT INTO `device` (`name`, `description`, `serial_number`, `category_id`) VALUES ('Monitor_02', 'White', 'Mo02', 3);
INSERT INTO `device` (`name`, `description`, `serial_number`, `category_id`) VALUES ('Monitor_03', 'White', 'Mo03', 3);
INSERT INTO `device` (`name`, `description`, `serial_number`, `category_id`) VALUES ('Monitor_04', 'White', 'Mo04', 3);



