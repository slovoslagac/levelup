SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

ALTER TABLE `ustedite_tournaments`.`matches`
CHANGE COLUMN `timestamp` `timestamp` DATETIME NULL DEFAULT current_timestamp ;

CREATE TABLE IF NOT EXISTS `ustedite_tournaments`.`participant_details` (
  `id` INT(9) NOT NULL,
  `tournament_id` INT(5) NOT NULL,
  `participantid` INT(5) NULL DEFAULT NULL COMMENT 'team id / player id - zavisi od turnira.',
  `roundid` INT(5) NULL DEFAULT NULL,
  `groupid` INT(5) NULL DEFAULT NULL,
  `special_data` INT(5) NULL DEFAULT NULL COMMENT 'ako je fifa - id tima sa kojim igra',
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
