DROP TABLE IF EXISTS `notification` ;

CREATE  TABLE `notification` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `request_id` INT(11) NOT NULL ,
  `receiver_id` INT(11) NOT NULL ,
  `created_at` INT(11) NULL ,
  `updated_at` INT(11) NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `request_id_UNIQUE` (`request_id` ASC) );