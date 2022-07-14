ALTER TABLE `safety_logs` ADD `date_occured` DATE NOT NULL AFTER `user`;

ALTER TABLE `incidents` ADD `sitrep_category` INT NULL DEFAULT NULL AFTER `date_reported`, ADD `sitrep_cause` INT NULL DEFAULT NULL AFTER `sitrep_category`;

CREATE TABLE IF NOT EXISTS `sitrep_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `sitrep_causes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

ALTER TABLE `aircraft_incident_investigations` CHANGE `tor` `tor` TEXT NOT NULL COMMENT 'tor';

ALTER TABLE `investigation_report` ADD `aircraft_incident_investigation_id` INT NOT NULL AFTER `status`;

ALTER TABLE `investigation_report` CHANGE `aircraft_incident_investigation_id` `aircraft_incident_investigation_id` INT(11) NULL DEFAULT NULL;

ALTER TABLE `aircraft_incident_investigations` ADD `incident_id` INT NULL DEFAULT NULL AFTER `forwarded_to_DANS_and_Mgrs_sent`;

ALTER TABLE `station` CHANGE `name` `name` VARCHAR(256) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL;

ALTER TABLE `audit_form` CHANGE `auditees_representative` `auditees_representative` INT NOT NULL COMMENT 'Auditee''s Representative ';