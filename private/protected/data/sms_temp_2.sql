-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2016 at 03:27 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sms_temp_2`
--

-- --------------------------------------------------------

--
-- Table structure for table `actions`
--

CREATE TABLE IF NOT EXISTS `actions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `details` text NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deadline` varchar(128) NOT NULL,
  `date_action_taken` varchar(128) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `incident_id` int(11) DEFAULT NULL,
  `reported_by` varchar(32) NOT NULL,
  `accepted` varchar(3) NOT NULL,
  `comment` varchar(256) NOT NULL,
  `notification` varchar(20) DEFAULT 'NOT YET',
  PRIMARY KEY (`id`),
  KEY `incident_id` (`incident_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `actions`
--

INSERT INTO `actions` (`id`, `details`, `modified`, `deadline`, `date_action_taken`, `status`, `incident_id`, `reported_by`, `accepted`, `comment`, `notification`) VALUES
(1, 'Stop using trolleys', '2016-02-21 12:54:03', '2016-02-21', '2015-07-21', 1, 11, 'Test', '', '', 'Final Sent'),
(2, 'Tile the floor', '2016-02-21 13:17:32', '2016-02-23', '2015-07-21', 1, 11, 'Kraiba', '', '', 'Final Sent'),
(3, 'Replace floor tiles.', '2015-07-25 15:11:09', '2015-07-27', '2015-07-24', 1, 10, '', '', '', ''),
(4, 'Replace the air conditioner', '2015-07-25 20:29:59', '2015-07-27', '2015-07-24', 1, 1, '', '', '', ''),
(5, 'Call the service provider to do the maintenance works.', '2015-07-27 17:47:11', '2015-07-30', '', 1, 13, '', '', '', ''),
(6, 'Internal I.T team is trying to handle', '2015-07-27 17:53:39', '2015-07-28', '', 1, 13, '', '', '', ''),
(7, 'Contact service provider', '2015-08-10 18:25:24', '2015-07-30', '2015-07-24', 1, 39, 'admin', 'Yes', 'No comment.', ''),
(8, 'Replace all plastic material with metal', '2015-08-11 10:19:10', '2015-08-12', '2015-08-10', 1, 37, 'admin', '', 'NO COMMENT', ''),
(9, 'Replace all plastic material with metal', '2015-08-11 14:03:22', '2015-08-11', '2015-08-11', 1, 42, 'admin', 'N/A', 'NO COMMENT', ''),
(10, 'Replace all plastic material with metal', '2015-08-11 15:32:44', '2015-08-19', '2015-08-11', 1, 24, 'admin', 'Yes', 'NO COMMENT', ''),
(11, 'Replace tank with new one', '2015-09-25 16:32:05', '2015-09-25', '2015-09-25', 1, 46, 'admin', 'Yes', 'Passed', ''),
(12, 'sleeping', '2016-02-09 10:32:21', '2016-02-23', '2016-02-18', 1, 83, 'Samuel.B', 'Yes', 'unable to sleep ', 'Final Sent'),
(13, 'b1', '2016-02-09 10:42:22', '2016-02-09', '2016-02-09', 1, 86, 'admin', 'No', 'b1', ''),
(14, 'aaa', '2016-02-09 16:59:17', '2016-02-09', '2016-02-09', 1, 88, 'admin', 'N/A', '', ''),
(15, 'tesr', '2016-02-21 14:19:13', '2016-02-21', '2016-02-21', 1, 108, 'admin', 'Yes', '', 'Final Sent'),
(16, 'TESR', '2016-02-21 14:21:07', '2016-02-21', '2016-02-21', 1, 108, 'admin', 'N/A', 'TT', 'Final Sent'),
(17, 'TESTRD', '2016-02-21 14:22:34', '2016-02-21', '2016-02-21', 1, 108, 'admin', 'N/A', '', 'Final Sent');

-- --------------------------------------------------------

--
-- Table structure for table `aircraft_incident_investigations`
--

CREATE TABLE IF NOT EXISTS `aircraft_incident_investigations` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'No',
  `date_of_occurence` date NOT NULL COMMENT 'Date of occurence',
  `aircraft_involved` varchar(20) NOT NULL COMMENT 'Aircraft involved',
  `description` text NOT NULL COMMENT 'Description',
  `form_of_notification` varchar(30) NOT NULL COMMENT 'Form of Notification',
  `category` varchar(30) NOT NULL COMMENT 'Category',
  `level_of_investigation` varchar(30) NOT NULL COMMENT 'Level of Investigation',
  `investigators` text NOT NULL COMMENT 'Investigator(s)',
  `tor` date NOT NULL COMMENT 'tor',
  `date_of_assignment` date NOT NULL COMMENT 'Date of Assignment',
  `deadline` date NOT NULL COMMENT 'Deadline',
  `transcript` date NOT NULL COMMENT 'Transcript',
  `preliminary_report` varchar(20) NOT NULL COMMENT 'Preliminary report',
  `SAG_submission` date NOT NULL COMMENT 'SAG',
  `SAG_reviewed` date NOT NULL,
  `forwarded_to_DANS_and_Mgrs` date NOT NULL COMMENT 'SRC or forwarded to DANS and Mgrs',
  `final_report` text NOT NULL COMMENT 'Final report',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `transcript_submitted` varchar(32) NOT NULL,
  `controller_report` varchar(32) NOT NULL,
  `controller_report_submitted` varchar(32) NOT NULL,
  `sodf` varchar(32) NOT NULL,
  `sodf_submitted` varchar(32) NOT NULL,
  `fps` varchar(32) NOT NULL,
  `fps_submitted` varchar(32) NOT NULL,
  `preliminary_report_submitted` varchar(32) NOT NULL,
  `SAG_submitted` varchar(32) NOT NULL,
  `SAG_reviewed_by` varchar(32) NOT NULL,
  `forwarded_to_DANS_and_Mgrs_sent` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `aircraft_incident_investigations`
--

INSERT INTO `aircraft_incident_investigations` (`id`, `date_of_occurence`, `aircraft_involved`, `description`, `form_of_notification`, `category`, `level_of_investigation`, `investigators`, `tor`, `date_of_assignment`, `deadline`, `transcript`, `preliminary_report`, `SAG_submission`, `SAG_reviewed`, `forwarded_to_DANS_and_Mgrs`, `final_report`, `status`, `transcript_submitted`, `controller_report`, `controller_report_submitted`, `sodf`, `sodf_submitted`, `fps`, `fps_submitted`, `preliminary_report_submitted`, `SAG_submitted`, `SAG_reviewed_by`, `forwarded_to_DANS_and_Mgrs_sent`) VALUES
(1, '2016-06-14', '5ZUAN', 'Going around due to runway incursion', '0', 'serious', '0', 'Mwesigye Henry', '0000-00-00', '2016-06-25', '2016-06-30', '0000-00-00', 'submitted on 27th Ju', '0000-00-00', '0000-00-00', '0000-00-00', 'completed, pending', 1, '', '', '', '', '', '', '', '', '', '', ''),
(2, '2016-06-15', 'Boeng  44545', 'Investigation 23232', '1', 'x', '1', 'Samuel', '0000-00-00', '2016-06-16', '2016-06-17', '0000-00-00', 'Not attached', '0000-00-00', '0000-00-00', '0000-00-00', '', 1, '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `aircraft_incident_investigation_investigators`
--

CREATE TABLE IF NOT EXISTS `aircraft_incident_investigation_investigators` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `aircraft_incident_investigation_id` int(11) DEFAULT NULL,
  `investigator_id` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `aircraft_types`
--

CREATE TABLE IF NOT EXISTS `aircraft_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `aircraft_types`
--

INSERT INTO `aircraft_types` (`id`, `name`, `status`) VALUES
(1, 'AIRCRAFT TYPE A', 1),
(2, 'AIRCRAFT TYPE B', 1);

-- --------------------------------------------------------

--
-- Table structure for table `audit_form`
--

CREATE TABLE IF NOT EXISTS `audit_form` (
  `issue_no` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Issue Number',
  `issue_date` date NOT NULL COMMENT 'Issue Date',
  `auditor_technical_assessor` varchar(200) NOT NULL COMMENT 'Auditor/Technical Assesor',
  `area_audited` varchar(200) NOT NULL COMMENT 'Area  Audited',
  `area_audited_date` date DEFAULT NULL COMMENT 'Date of Area Audit',
  `auditees_representative` varchar(200) NOT NULL COMMENT 'Auditee''s Representative ',
  `detailed_observation` text COMMENT 'Part 1: Detailed Observation',
  `classification_of_non_conformance` varchar(256) NOT NULL COMMENT 'Classification of Non-conformance( Major/Minor/Observation)',
  `reference_number_of_iso_9001_or_procedure` varchar(200) NOT NULL COMMENT 'Reference number of ISO 9001 or Procedure/Regular/Standard',
  `root_cause_analysis_of_non_conformance` text COMMENT 'Root Cause Analysis of Non-conformance',
  `suggested_corrective_action` text COMMENT 'Part 2: Suggested corrective action. Note(Corrective action shall follow to be indicated overleaf)',
  `proposed_date_of_realisation` date DEFAULT NULL COMMENT 'Proposed date of realisation',
  `verification_of_proof` text COMMENT 'Verification of proof of effective corrective action and close-out by the auditor',
  `verification_of_proof_date` date DEFAULT NULL COMMENT 'Date of Verification of proof ',
  `lead_auditors_comments` text COMMENT 'Lead Auditor''s Comments',
  `lead_auditors_comments_date` date DEFAULT NULL COMMENT 'Date of Lead Auditor''s Comments',
  `user_id` int(11) DEFAULT NULL COMMENT 'User ',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `audit_plan_id` int(11) DEFAULT NULL,
  `questionnaire` int(11) DEFAULT NULL,
  `questionnaire_sub_element` int(11) DEFAULT NULL,
  PRIMARY KEY (`issue_no`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `audit_form`
--

INSERT INTO `audit_form` (`issue_no`, `issue_date`, `auditor_technical_assessor`, `area_audited`, `area_audited_date`, `auditees_representative`, `detailed_observation`, `classification_of_non_conformance`, `reference_number_of_iso_9001_or_procedure`, `root_cause_analysis_of_non_conformance`, `suggested_corrective_action`, `proposed_date_of_realisation`, `verification_of_proof`, `verification_of_proof_date`, `lead_auditors_comments`, `lead_auditors_comments_date`, `user_id`, `status`, `audit_plan_id`, `questionnaire`, `questionnaire_sub_element`) VALUES
(1, '0000-00-00', 'Mark Lubega', 'Try', NULL, 'Cur', '', '', 'PHR56777', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', NULL, 1, NULL, NULL, NULL),
(2, '2016-06-28', 'Kraiba', 'Kabalagala', '2016-06-28', 'Mark lubega', '-Good , more room for improvement', '', 'HF/30/2015', '- Late submission', '- Submit Early', '2016-06-28', 'Verified', '2016-06-28', '-Good\r\n', '2016-06-28', 2, 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `audit_form_work_flow`
--

CREATE TABLE IF NOT EXISTS `audit_form_work_flow` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `audit_form` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user` (`user`),
  KEY `audit_form` (`audit_form`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `audit_form_work_flow`
--

INSERT INTO `audit_form_work_flow` (`id`, `audit_form`, `user`, `status`, `date`) VALUES
(1, 1, 1, 1, NULL),
(2, 1, 1, 1, NULL),
(3, 1, 1, 1, NULL),
(4, 1, 1, 1, NULL),
(5, 1, 1, 1, NULL),
(6, 1, 1, 1, NULL),
(7, 1, 3, 1, NULL),
(8, 1, 1, 1, NULL),
(9, 1, 2, 1, NULL),
(10, 1, 1, 1, '0000-00-00 00:00:00'),
(11, 1, 1, 1, '2015-09-25 06:14:39'),
(12, 1, 2, 1, '2015-09-25 13:15:30'),
(13, 1, 2, 1, '2015-09-26 21:05:51'),
(14, 1, 2, 1, '2015-09-26 22:17:17'),
(15, 1, 7, 1, '2016-02-09 16:30:19'),
(16, 1, 7, 1, '2016-02-09 16:32:48');

-- --------------------------------------------------------

--
-- Table structure for table `audit_plan`
--

CREATE TABLE IF NOT EXISTS `audit_plan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(256) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `audit_plan_fields`
--

CREATE TABLE IF NOT EXISTS `audit_plan_fields` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `description` text NOT NULL,
  `audit_plan_id` int(11) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `audit_plan_id` (`audit_plan_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `audit_plan_work_flow`
--

CREATE TABLE IF NOT EXISTS `audit_plan_work_flow` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `audit_plan` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user` (`user`),
  KEY `audit_form` (`audit_plan`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `audit_report`
--

CREATE TABLE IF NOT EXISTS `audit_report` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(256) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `audit_plan_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `audit_plan_id` (`audit_plan_id`),
  KEY `user` (`user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `audit_report_fields`
--

CREATE TABLE IF NOT EXISTS `audit_report_fields` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `description` text NOT NULL,
  `report_id` int(11) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `report_id` (`report_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`ID`, `category`) VALUES
(1, 'Yii tutorial'),
(2, 'Wordpress article');

-- --------------------------------------------------------

--
-- Table structure for table `causes`
--

CREATE TABLE IF NOT EXISTS `causes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `details` varchar(256) NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `incident_id` int(11) DEFAULT NULL,
  `reported_by` varchar(32) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `incident_id` (`incident_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `causes`
--

INSERT INTO `causes` (`id`, `details`, `modified`, `status`, `incident_id`, `reported_by`) VALUES
(1, 'Unreliable communication  between Entebbe ACC and Kinshasa ACC', '2015-08-04 08:51:01', 1, 14, ''),
(2, 'Non adherence to procedures ', '2015-08-04 08:52:10', 1, 14, ''),
(3, 'Non adherence to procedures', '2015-08-10 14:50:33', 1, 39, 'admin'),
(4, 'Unmonitored personel', '2015-08-11 06:32:02', 1, 37, 'admin'),
(5, 'aging of door hinge', '2015-08-11 16:25:21', 1, 46, 'admin'),
(6, 'Automatic loking system got damaged and we suggested it in meeting at tower', '2015-09-25 12:40:43', 1, 47, 'admin'),
(7, 'Communication', '2016-05-11 07:51:56', 1, 59, 'admin'),
(8, 'unknown', '2016-05-11 07:52:10', 1, 59, 'admin'),
(9, 'Unreliable communication  between Entebbe ACC and Kinshasa ACC', '2015-10-01 09:49:39', 1, 65, 'admin'),
(10, 'Unreliable communication  between Entebbe ACC and Kinshasa ACC', '2015-10-01 11:48:45', 1, 60, 'admin'),
(11, 'Communication', '2016-05-11 07:51:49', 1, 60, 'admin'),
(12, 'Communication', '2016-05-11 07:52:00', 1, 67, 'admin'),
(13, 'no governing policy', '2016-05-11 07:53:08', 1, 77, 'admin'),
(14, 'unknown', '2016-05-11 07:52:54', 1, 40, 'admin'),
(15, 'lack of feedback', '2016-05-11 07:52:49', 1, 88, 'sms'),
(16, 'old equipment', '2016-05-11 07:52:41', 1, 27, 'admin'),
(17, 'poor maintainace', '2016-01-20 08:20:10', 1, 98, 'admin'),
(18, 'poor maintenance', '2016-05-11 07:52:18', 1, 83, 'Samuel.B'),
(19, 'unknown', '2016-05-11 07:52:23', 1, 99, 'admin'),
(20, 'unreliable communication equipment', '2016-05-11 07:52:34', 1, 86, 'admin'),
(21, 'Poor verification system', '2016-06-25 03:07:03', 1, 72, 'admin'),
(22, 'Poor Power Installations', '2016-06-25 05:29:18', 1, 126, 'bwire'),
(23, 'Poor Power Installations', '2016-06-25 07:32:18', 1, 122, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `change_management`
--

CREATE TABLE IF NOT EXISTS `change_management` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `originator_name` varchar(128) NOT NULL,
  `originator_title` varchar(128) NOT NULL,
  `system_equipment_concerned` varchar(256) NOT NULL,
  `date_raised` date NOT NULL,
  `reference_no` varchar(32) NOT NULL,
  `change_description` text NOT NULL,
  `change_justification` text NOT NULL,
  `back_out_plan` text NOT NULL,
  `affected_areas` varchar(256) NOT NULL,
  `costs` varchar(256) NOT NULL,
  `time` varchar(128) NOT NULL,
  `proposed_implementer` varchar(32) NOT NULL,
  `recommended_by` varchar(32) NOT NULL,
  `approved_by` varchar(32) NOT NULL,
  `reported_by` varchar(32) NOT NULL,
  `recommendation_date` date NOT NULL,
  `approval_date` date NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `title_of_change` varchar(256) NOT NULL,
  `division` varchar(256) NOT NULL,
  `areas_affected` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `change_management`
--

INSERT INTO `change_management` (`id`, `originator_name`, `originator_title`, `system_equipment_concerned`, `date_raised`, `reference_no`, `change_description`, `change_justification`, `back_out_plan`, `affected_areas`, `costs`, `time`, `proposed_implementer`, `recommended_by`, `approved_by`, `reported_by`, `recommendation_date`, `approval_date`, `modified`, `status`, `title_of_change`, `division`, `areas_affected`) VALUES
(1, 'Sam Bwire', 'SMS Manager', 'Server room', '0000-00-00', '', 'Replacement of tiles', '', '', '', '', '', 'admin', '', '', 'admin', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 1, '', '', ''),
(2, 'Security', 'Security Manager', 'Automatic door locks', '0000-00-00', '232323', '', '', '', '', '', '24 hours', 'Roco systems', 'Mr. Mulindwa', 'Oboth Henry', 'admin', '0000-00-00', '0000-00-00', '2015-11-03 12:46:57', 1, '', '', ''),
(3, 'Wanzunula Rogers', 'PAIMO SMS', 'AIM AUTOMATION PHASE 3', '0000-00-00', 'AIM3', 'Improving current AIM system to provide for digital NOTAM', '', '', '', '', '2 years ', 'Avitech ', 'Marion Tibenderana', 'Barongo Ronny', 'admin', '0000-00-00', '0000-00-00', '2016-05-26 10:55:09', 1, '', '', ''),
(4, 'ANDREW MWESIGE', 'PTO-SMS/QA', 'VHF RADIOS', '0000-00-00', '0000011', 'TRANSFER VHF RADIO ANTENNA TO NEW MAST ', '', '', '', '', '1040UTC', 'STO-COM', 'PTO-M', 'MCNS', 'admin', '0000-00-00', '0000-00-00', '2016-05-26 10:55:44', 1, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `cm_affected_areas`
--

CREATE TABLE IF NOT EXISTS `cm_affected_areas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `change_management_id` int(11) DEFAULT NULL,
  `details` varchar(256) NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `reported_by` varchar(32) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `change_management_id` (`change_management_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `cm_affected_areas`
--

INSERT INTO `cm_affected_areas` (`id`, `change_management_id`, `details`, `modified`, `status`, `reported_by`) VALUES
(1, 1, 'Server room', '0000-00-00 00:00:00', 1, 'admin'),
(2, 2, 'Tower', '2015-11-03 12:47:13', 1, 'admin'),
(3, 2, 'Parking', '2015-11-03 12:47:26', 1, 'admin'),
(4, 4, 'Equipment room', '2016-05-26 11:24:46', 1, 'admin'),
(5, 4, 'ACC', '2016-05-26 11:25:19', 1, 'admin'),
(6, 4, 'sms', '2016-05-26 11:25:58', 1, 'admin'),
(7, 3, 'Notam dissemination', '2016-05-26 11:26:37', 1, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `cm_costs`
--

CREATE TABLE IF NOT EXISTS `cm_costs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `change_management_id` int(11) DEFAULT NULL,
  `item` varchar(128) NOT NULL,
  `cost` int(11) NOT NULL,
  `reported_by` varchar(32) NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `staus` tinyint(4) NOT NULL DEFAULT '1',
  `unit` varchar(32) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `change_management_id` (`change_management_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `cm_costs`
--

INSERT INTO `cm_costs` (`id`, `change_management_id`, `item`, `cost`, `reported_by`, `modified`, `staus`, `unit`) VALUES
(1, 1, 'Reh Hat Linux Operating System', 7000, 'admin', '0000-00-00 00:00:00', 1, 'USD'),
(2, 3, 'AMHS switch', 1000000, 'admin', '2016-05-26 11:27:44', 1, 'USD'),
(3, 4, 'ITEM', 1400000, 'admin', '2016-06-18 20:54:11', 1, 'UGX');

-- --------------------------------------------------------

--
-- Table structure for table `consequences`
--

CREATE TABLE IF NOT EXISTS `consequences` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` text NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `incident_id` int(11) DEFAULT NULL,
  `reported_by` varchar(32) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `incident_id` (`incident_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50 ;

--
-- Dumping data for table `consequences`
--

INSERT INTO `consequences` (`id`, `description`, `modified`, `status`, `incident_id`, `reported_by`) VALUES
(1, 'Aircraft collision', '2015-07-28 08:56:10', 1, 1, ''),
(2, 'Runway Incursion', '2015-07-28 08:56:10', 1, 1, ''),
(3, 'Air proximity', '2015-07-28 08:56:28', 1, 1, ''),
(4, 'Miscommunication', '2015-07-28 09:12:47', 1, 1, ''),
(5, '4 days of no work in server room', '2015-08-10 14:01:14', 1, 40, ''),
(6, '7 hours of no work', '2015-08-10 14:40:42', 1, 39, 'admin'),
(7, 'Knee injury on one staff member', '2015-08-11 06:21:00', 1, 37, 'admin'),
(8, 'Damage of furniture', '2015-08-11 06:25:28', 1, 37, 'admin'),
(9, 'Description of consequence', '2015-08-11 10:02:28', 1, 37, 'admin'),
(10, 'Damage of furniture', '2015-08-11 11:03:04', 1, 42, 'admin'),
(11, 'Damage of equipment', '2015-09-02 12:32:11', 1, 25, 'admin'),
(12, 'hh', '2015-09-05 21:09:30', 1, 22, 'admin'),
(13, 'Aircraft  converging at Bunia DRC FIR   without ATC coordination.', '2015-10-01 09:49:21', 1, 65, 'admin'),
(14, 'Aircraft  converging at Bunia DRC FIR   without ATC coordination.  ', '2015-10-01 11:48:32', 1, 60, 'admin'),
(15, 'Lose of life', '2015-10-01 12:01:29', 1, 68, 'admin'),
(16, 'Less staff reporting to work', '2015-10-01 12:01:54', 1, 68, 'admin'),
(17, 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi', '2016-05-11 07:41:05', 1, 67, 'admin'),
(18, 'Duis aute irure dolor in reprehenderit in voluptate velit esse', '2016-05-11 07:41:20', 1, 68, 'admin'),
(19, 'Excepteur sint occaecat cupidatat non proident', '2016-05-11 07:41:31', 1, 26, 'admin'),
(20, 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium', '2016-05-11 07:41:46', 1, 26, 'admin'),
(21, 'Ut enim ad minima veniam, quis nostrum exercitationem', '2016-05-11 07:41:58', 1, 71, 'admin'),
(22, 'Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam', '2016-05-11 07:42:09', 1, 71, 'admin'),
(23, 'Excepteur sint occaecat cupidatat non proident', '2016-05-11 07:42:20', 1, 70, 'admin'),
(24, 'Ut enim ad minima veniam', '2016-05-11 07:42:29', 1, 77, 'admin'),
(25, 'Excepteur sint occaecat cupidatat non proident', '2016-05-11 07:41:36', 1, 77, 'admin'),
(26, 'Ut enim ad minima veniam', '2016-05-11 07:42:40', 1, 77, 'admin'),
(27, 'Sed ut perspiciatis unde omnis iste', '2016-05-11 07:42:49', 1, 88, 'sms'),
(28, 'At vero eos et accusamus et iusto odio dignissimos ducimus', '2016-05-11 07:43:02', 1, 50, 'admin'),
(29, 'Air Proxies', '2016-01-20 08:17:54', 1, 98, 'admin'),
(30, 'Collision ', '2016-01-20 08:18:50', 1, 98, 'admin'),
(31, 'Temporibus autem quibusdam et aut officiis debitis', '2016-05-11 07:43:12', 1, 90, 'admin'),
(32, 'Et harum quidem rerum facilis est et expedita distinctio.', '2016-05-11 07:43:33', 1, NULL, 'admin'),
(33, 'Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit', '2016-05-11 07:44:04', 1, NULL, 'admin'),
(34, 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium', '2016-05-11 07:44:17', 1, NULL, 'admin'),
(39, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit', '2016-05-11 07:44:29', 1, 14, 'admin'),
(40, 'Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil ', '2016-05-11 07:44:44', 1, 15, 'admin'),
(41, 'Temporibus autem quibusdam et aut officiis debitis', '2016-05-11 07:43:17', 1, 62, 'admin'),
(42, 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2016-05-11 07:43:53', 1, 83, 'Samuel.B'),
(43, 'Et harum quidem rerum facilis est et expedita distinctio.', '2016-05-11 07:43:37', 1, 99, 'admin'),
(44, 'Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil ', '2016-05-11 07:44:47', 1, 86, 'admin'),
(45, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit', '2016-05-11 07:44:32', 1, 86, 'admin'),
(46, 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium', '2016-05-11 07:44:20', 1, 99, 'admin'),
(47, 'Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit', '2016-05-11 07:44:08', 1, 48, 'admin'),
(48, 'accidents may occur', '2016-06-25 03:08:10', 1, 72, 'admin'),
(49, 'can cause death', '2016-06-25 05:32:24', 1, 126, 'bwire');

-- --------------------------------------------------------

--
-- Table structure for table `critical_assets`
--

CREATE TABLE IF NOT EXISTS `critical_assets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(500) NOT NULL,
  `descripiton` text NOT NULL,
  `value` varchar(200) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `critical_assets`
--

INSERT INTO `critical_assets` (`id`, `name`, `descripiton`, `value`, `date`, `status`) VALUES
(1, 'Diesel Generator', 'For Generating Power', '20000', '2015-10-18 09:01:58', 1),
(2, 'Test Asset', 'Test', 'Asset', '2015-10-26 11:25:17', 1),
(3, 'Test 2 Asset', 'Tet', '12', '2015-10-26 11:27:12', 1),
(4, 'Tower server system', 'Tower server system', '$2m', '2015-11-03 08:14:08', 1),
(5, 'NAME', 'DESCRIPTION', 'VALUE', '2016-06-24 10:56:25', 1);

-- --------------------------------------------------------

--
-- Table structure for table `critical_asset_vulnerability`
--

CREATE TABLE IF NOT EXISTS `critical_asset_vulnerability` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `critical_asset_id` int(11) NOT NULL,
  `risk` varchar(500) NOT NULL,
  `consequence` varchar(500) NOT NULL,
  `mitigation` varchar(500) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `critical_fk1_asset_vulnerability` (`critical_asset_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `critical_asset_vulnerability`
--

INSERT INTO `critical_asset_vulnerability` (`id`, `critical_asset_id`, `risk`, `consequence`, `mitigation`, `status`) VALUES
(1, 1, 'Breakdown', 'lose of power', 'routine service', 1),
(2, 4, 'Lightening struck', 'control system down', 'routine monitoring', 1);

-- --------------------------------------------------------

--
-- Table structure for table `departure_points`
--

CREATE TABLE IF NOT EXISTS `departure_points` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `departure_points`
--

INSERT INTO `departure_points` (`id`, `name`, `status`) VALUES
(1, 'DEPARTURE POINT A', 1),
(2, 'DEPARTURE POINT B', 1);

-- --------------------------------------------------------

--
-- Table structure for table `destinations`
--

CREATE TABLE IF NOT EXISTS `destinations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `destinations`
--

INSERT INTO `destinations` (`id`, `name`, `status`) VALUES
(1, 'DESTINATION A', 1),
(2, 'DESTINATION B', 1);

-- --------------------------------------------------------

--
-- Table structure for table `duty_controllers`
--

CREATE TABLE IF NOT EXISTS `duty_controllers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sod_id` int(11) DEFAULT NULL,
  `incident_id` int(11) DEFAULT NULL,
  `name` varchar(256) NOT NULL,
  `place` varchar(128) NOT NULL,
  `CONTROLLING` tinyint(4) NOT NULL DEFAULT '0',
  `CO0RDINATING` tinyint(4) NOT NULL DEFAULT '0',
  `MONITORING` tinyint(4) NOT NULL DEFAULT '0',
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `sod_id` (`sod_id`),
  KEY `incident_id` (`incident_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `duty_controllers`
--

INSERT INTO `duty_controllers` (`id`, `sod_id`, `incident_id`, `name`, `place`, `CONTROLLING`, `CO0RDINATING`, `MONITORING`, `modified`, `status`) VALUES
(1, 5, 27, 'Joy Kenyangi', 'Tower', 0, 0, 0, '2015-08-14 11:21:19', 1),
(2, 5, 27, 'Joy Kenyangi', 'Tower', 0, 0, 0, '2015-08-14 11:57:52', 0),
(3, 5, 27, 'Joy Kenyangi', 'Approach', 1, 1, 0, '2015-08-14 11:57:47', 0),
(4, 5, 27, 'Joy Kenyangi', 'Air Control', 1, 1, 0, '2015-08-14 11:57:43', 0),
(5, 5, 27, 'Joy Kenyangi', 'Approach', 1, 1, 1, '2015-08-14 11:57:34', 0),
(6, 3, 46, 'Joy Kenyangi', 'Approach', 1, 1, 0, '2015-08-14 11:42:30', 1),
(7, 3, 46, 'Bwire Samuel', 'Approach', 0, 0, 1, '2015-08-14 11:45:39', 1),
(8, 8, 86, 'Bwire Samuel', 'Tower', 0, 0, 0, '2015-12-16 11:38:59', 1),
(9, 8, 86, 'Brian Muhumuza', 'Tower', 0, 0, 0, '2015-12-16 11:39:06', 1);

-- --------------------------------------------------------

--
-- Table structure for table `effects`
--

CREATE TABLE IF NOT EXISTS `effects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hazard_id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `consequence` int(11) NOT NULL,
  `date` date NOT NULL,
  `reported_by` varchar(200) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `severity_id` int(11) DEFAULT NULL,
  `severity_rational_id` int(11) DEFAULT NULL,
  `likelihood_id` int(11) DEFAULT NULL,
  `initial_risk_index` varchar(8) NOT NULL,
  `predicted_residual_risk_index` varchar(8) NOT NULL,
  `substitute_risk` varchar(8) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_effects_1` (`hazard_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `effects`
--

INSERT INTO `effects` (`id`, `hazard_id`, `name`, `consequence`, `date`, `reported_by`, `status`, `severity_id`, `severity_rational_id`, `likelihood_id`, `initial_risk_index`, `predicted_residual_risk_index`, `substitute_risk`) VALUES
(1, 27, NULL, 0, '2015-10-11', 'admin', 1, NULL, NULL, NULL, '', '', ''),
(3, 12, NULL, 0, '2015-10-11', 'admin', 1, NULL, NULL, NULL, '', '', ''),
(4, 77, NULL, 0, '2015-11-03', 'admin', 1, NULL, NULL, NULL, '', '', ''),
(5, 77, NULL, 0, '2015-11-03', 'admin', 1, NULL, NULL, NULL, '', '', ''),
(6, 77, NULL, 0, '2015-11-03', 'admin', 1, NULL, NULL, NULL, '', '', ''),
(7, 77, NULL, 0, '2015-11-03', 'admin', 1, NULL, NULL, NULL, '', '', ''),
(8, 40, NULL, 0, '2015-11-08', 'admin', 1, NULL, NULL, NULL, '', '', ''),
(9, 40, NULL, 0, '2015-11-08', 'admin', 1, NULL, NULL, NULL, '', '', ''),
(10, 88, NULL, 0, '2015-12-16', 'sms', 1, NULL, NULL, NULL, '', '', ''),
(11, 1, NULL, 0, '2016-01-08', 'admin', 1, NULL, NULL, NULL, '', '', ''),
(12, 1, NULL, 0, '2016-01-08', 'admin', 1, NULL, NULL, NULL, '', '', ''),
(13, 98, NULL, 0, '2016-01-20', 'admin', 1, NULL, NULL, NULL, '', '', ''),
(14, 98, NULL, 0, '2016-01-20', 'admin', 1, NULL, NULL, NULL, '', '', ''),
(15, 98, NULL, 29, '2016-01-26', 'admin', 1, NULL, NULL, NULL, '', '', ''),
(16, 98, NULL, 30, '2016-01-26', 'admin', 1, NULL, NULL, NULL, '', '', ''),
(17, 98, NULL, 29, '2016-01-26', 'admin', 1, NULL, NULL, NULL, '', '', ''),
(18, 98, NULL, 30, '2016-01-26', 'admin', 1, NULL, NULL, NULL, '', '', ''),
(19, 98, NULL, 30, '2016-01-26', 'admin', 1, NULL, NULL, NULL, '', '', ''),
(20, 14, NULL, 39, '2016-01-29', 'admin', 1, NULL, NULL, NULL, '', '', ''),
(21, 83, NULL, 42, '2016-02-09', 'Samuel.B', 1, NULL, NULL, NULL, '', '', ''),
(22, 99, NULL, 43, '2016-02-09', 'admin', 1, NULL, NULL, NULL, '', '', ''),
(23, 86, NULL, 44, '2016-02-09', 'admin', 1, NULL, NULL, NULL, '', '', ''),
(24, 99, NULL, 46, '2016-02-09', 'admin', 1, NULL, NULL, NULL, '', '', ''),
(25, 48, NULL, 47, '2016-02-19', 'admin', 1, NULL, NULL, NULL, '', '', ''),
(26, 77, NULL, 24, '2016-02-19', 'admin', 1, NULL, NULL, NULL, '', '', ''),
(27, 126, NULL, 49, '2016-06-25', 'bwire', 1, NULL, NULL, NULL, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `effects_severity_rationales`
--

CREATE TABLE IF NOT EXISTS `effects_severity_rationales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `effects_id` int(11) DEFAULT NULL,
  `severity_rational_id` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `effect_risk_management`
--

CREATE TABLE IF NOT EXISTS `effect_risk_management` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `severity` varchar(32) NOT NULL,
  `severity_rationale` varchar(256) NOT NULL,
  `likelihood` varchar(32) NOT NULL,
  `likelihood_rationale` varchar(256) NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `effects_id` int(11) DEFAULT NULL,
  `reported_by` varchar(32) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `incident_id` (`effects_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `effect_risk_management`
--

INSERT INTO `effect_risk_management` (`id`, `severity`, `severity_rationale`, `likelihood`, `likelihood_rationale`, `modified`, `status`, `effects_id`, `reported_by`) VALUES
(7, 'A', 'Equipment destroyed', '5', 'Likely to occur many times (has occurred frequently)', '2015-10-11 09:55:10', 1, 3, 'admin'),
(8, 'A', 'Equipment destroyed', '5', 'Likely to occur many times (has occurred frequently)', '2015-11-03 07:03:41', 1, 4, 'admin'),
(9, 'A', 'Serious injury', '4', 'Unlikely to occur but possible (has occurred rarely)', '2015-11-03 07:56:10', 1, 5, 'admin'),
(10, 'A', 'Serious injury', '4', 'Unlikely to occur but possible (has occurred rarely)', '2015-11-03 07:57:35', 1, 6, 'admin'),
(11, 'A', 'Serious injury', '4', 'Unlikely to occur but possible (has occurred rarely)', '2015-11-03 08:04:01', 1, 7, 'admin'),
(12, 'B', 'Equipment destroyed', '3', 'Likely to occur many times (has occurred frequently)', '2015-11-08 13:18:01', 1, 8, 'admin'),
(13, 'A', 'Equipment destroyed', '5', 'Likely to occur many times (has occurred frequently)', '2015-11-08 13:18:24', 1, 9, 'admin'),
(14, 'B', 'Multiple deaths', '3', 'Likely to occur sometimes (has occurred infrequently)', '2015-12-16 09:30:22', 1, 10, 'sms'),
(15, 'B', 'Equipment destroyed', '5', 'Likely to occur many times (has occurred frequently)', '2016-01-08 13:49:27', 1, 11, 'admin'),
(16, 'B', 'Equipment destroyed', '3', 'Likely to occur many times (has occurred frequently)', '2016-01-08 13:49:28', 1, 12, 'admin'),
(17, 'C', 'Equipment destroyed', '3', 'Likely to occur many times (has occurred frequently)', '2016-01-20 08:26:00', 1, 13, 'admin'),
(18, 'A', 'Equipment destroyed', '5', 'Likely to occur many times (has occurred frequently)', '2016-01-20 08:46:37', 1, 14, 'admin'),
(19, 'A', 'Equipment destroyed', '5', 'Likely to occur many times (has occurred frequently)', '2016-01-26 10:46:33', 1, 15, 'admin'),
(20, 'A', 'Equipment destroyed', '5', 'Likely to occur many times (has occurred frequently)', '2016-01-26 10:57:46', 1, 16, 'admin'),
(21, 'A', 'Equipment destroyed', '5', 'Likely to occur many times (has occurred frequently)', '2016-01-26 11:09:30', 1, 17, 'admin'),
(22, 'A', 'Equipment destroyed', '5', 'Likely to occur sometimes (has occurred infrequently)', '2016-01-26 11:31:11', 1, 18, 'admin'),
(23, 'C', 'Equipment destroyed', '2', 'Likely to occur many times (has occurred frequently)', '2016-01-26 11:33:11', 1, 19, 'admin'),
(24, 'C', 'Multiple deaths', '5', 'Likely to occur many times (has occurred frequently)', '2016-01-29 06:12:28', 1, 20, 'admin'),
(25, 'B', 'Equipment destroyed', '5', 'Likely to occur many times (has occurred frequently)', '2016-02-09 07:29:55', 1, 21, 'Samuel.B'),
(26, 'D', 'Equipment destroyed', '5', 'Likely to occur many times (has occurred frequently)', '2016-02-09 07:31:03', 1, 22, 'admin'),
(27, 'A', 'Equipment destroyed', '2', 'Likely to occur sometimes (has occurred infrequently)', '2016-02-09 07:34:05', 1, 23, 'admin'),
(28, 'A', 'Equipment destroyed', '5', 'Likely to occur many times (has occurred frequently)', '2016-02-09 07:36:58', 1, 24, 'admin'),
(29, 'A', 'Equipment destroyed', '5', 'Likely to occur many times (has occurred frequently)', '2016-02-19 08:45:45', 1, 25, 'admin'),
(30, 'A', 'Equipment destroyed', '5', 'Likely to occur many times (has occurred frequently)', '2016-02-19 10:13:03', 1, 26, 'admin'),
(31, 'A', 'Multiple deaths', '5', 'Likely to occur many times (has occurred frequently)', '2016-06-25 05:36:59', 1, 27, 'bwire');

-- --------------------------------------------------------

--
-- Table structure for table `employee_recognition`
--

CREATE TABLE IF NOT EXISTS `employee_recognition` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nominator_name` varchar(128) NOT NULL,
  `nominator_department` varchar(128) NOT NULL,
  `date` date NOT NULL,
  `nominee_name` varchar(128) NOT NULL,
  `nominee_department` varchar(128) NOT NULL,
  `nominee_supervisor_name` varchar(128) NOT NULL,
  `description_of_actions` varchar(256) NOT NULL,
  `date_observed` date NOT NULL,
  `place_observed` varchar(256) NOT NULL,
  `date_received` date NOT NULL,
  `date_reviewed` date NOT NULL,
  `additional_information` varchar(256) NOT NULL,
  `nomination_accepted` varchar(4) NOT NULL,
  `accepted_date` date NOT NULL,
  `accepted_comments` varchar(256) NOT NULL,
  `award_granted` varchar(128) NOT NULL,
  `award_level` varchar(128) NOT NULL,
  `award_granted_date` date NOT NULL,
  `award_granted_comments` varchar(256) NOT NULL,
  `chaiperson_approval` tinyint(4) NOT NULL DEFAULT '1',
  `chaiperson_approval_date` date NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `reported_by` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `employee_recognition`
--

INSERT INTO `employee_recognition` (`id`, `nominator_name`, `nominator_department`, `date`, `nominee_name`, `nominee_department`, `nominee_supervisor_name`, `description_of_actions`, `date_observed`, `place_observed`, `date_received`, `date_reviewed`, `additional_information`, `nomination_accepted`, `accepted_date`, `accepted_comments`, `award_granted`, `award_level`, `award_granted_date`, `award_granted_comments`, `chaiperson_approval`, `chaiperson_approval_date`, `modified`, `status`, `reported_by`) VALUES
(1, 'Bwire Samuel', 'SMS Department', '0000-00-00', 'Mwesigye Andrew', 'SMS Department', 'Bwire Samuel', 'NONE', '2015-09-14', 'Airport Tower', '0000-00-00', '0000-00-00', '', '', '0000-00-00', '', '', '', '0000-00-00', '', 0, '0000-00-00', '0000-00-00 00:00:00', 1, 'admin'),
(2, 'Andrew Mwesigye', 'SMS Department', '0000-00-00', 'Bwire Samuel', 'SMS Department', 'Bwire Samuel', 'NONE', '2016-02-17', 'Airport Tower', '0000-00-00', '0000-00-00', '', '', '0000-00-00', '', '', '', '0000-00-00', '', 1, '0000-00-00', '2016-05-19 11:49:16', 0, 'admin'),
(3, 'Brian Mc. Knite', 'IT', '2016-02-17', 'Mwesigye Andrew', 'SMS Department', 'Paul Tobby', 'NONE', '2016-02-17', 'Airport Tower', '2016-02-17', '0000-00-00', '', '', '2016-02-17', '', '', '', '0000-00-00', '', 1, '0000-00-00', '2016-05-19 11:49:20', 0, 'admin'),
(4, 'Paul Tobby', 'SMS Department', '2016-02-17', 'Mwesigye Andrew', 'SMS Department', 'Paul Tobby', 'NONE', '2016-02-17', 'Airport Tower', '2016-02-17', '0000-00-00', '', '', '2016-02-17', '', '', '', '2016-02-17', '', 1, '0000-00-00', '2016-05-19 11:49:23', 0, 'admin'),
(5, 'Brian Musiime', 'Other', '2016-02-17', 'Mwesigye Andrew', 'SMS Department', 'John Bosco Okirya', 'NONE', '2016-02-17', 'Airport Tower', '2016-02-17', '0000-00-00', '', '', '2016-02-17', '', '', '', '2016-02-17', '', 1, '0000-00-00', '2016-05-19 11:49:26', 0, 'admin'),
(6, 'John Bosco Okirya', 'IT', '2016-02-17', 'Mwesigye Andrew', 'SMS Department', 'Mwesigye Andrew', 'NONE', '2016-02-17', 'Airport Tower', '2016-02-17', '2016-02-17', '', '', '2016-02-17', '', '', '', '2016-02-17', '', 1, '2016-02-17', '2016-05-19 11:49:29', 0, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `evaluation_auditors`
--

CREATE TABLE IF NOT EXISTS `evaluation_auditors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_id` int(11) NOT NULL,
  `station_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `evaluation_auditors`
--

INSERT INTO `evaluation_auditors` (`id`, `date_id`, `station_id`, `user_id`, `date_created`, `status`) VALUES
(1, 1, 1, 1, '2016-01-19 13:42:38', 1),
(2, 1, 1, 2, '2016-01-19 13:44:02', 1),
(10, 5, 1, 4, '2016-02-09 14:15:22', 1),
(9, 5, 1, 7, '2016-02-09 14:15:14', 1),
(5, 4, 1, 4, '2016-01-19 14:14:50', 1),
(7, 2, 1, 7, '2016-01-19 14:16:31', 1),
(11, 6, 1, 7, '2016-02-21 11:04:12', 1),
(12, 7, 1, 7, '2016-02-21 11:04:46', 1),
(13, 3, 1, 2, '2016-05-19 09:02:06', 1),
(14, 3, 1, 5, '2016-05-19 09:02:14', 1),
(15, 8, 1, 7, '2016-05-19 09:02:38', 1);

-- --------------------------------------------------------

--
-- Table structure for table `evaluation_date`
--

CREATE TABLE IF NOT EXISTS `evaluation_date` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `type` varchar(20) NOT NULL,
  `station_id` int(11) NOT NULL,
  `notification` varchar(20) DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `venue` varchar(256) NOT NULL,
  `activities` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `evaluation_date`
--

INSERT INTO `evaluation_date` (`id`, `date`, `type`, `station_id`, `notification`, `date_created`, `status`, `venue`, `activities`) VALUES
(1, '2016-01-12', '1', 1, NULL, '2016-01-19 13:04:45', 1, '', ''),
(2, '2016-01-12', '1', 1, NULL, '2016-01-19 13:10:13', 1, '', ''),
(3, '2016-01-12', '1', 1, NULL, '2016-01-19 13:10:34', 1, '', ''),
(4, '2016-01-30', '0', 1, NULL, '2016-01-19 13:48:12', 1, '', ''),
(5, '2016-02-21', '0', 1, 'Final Sent', '2016-02-09 14:14:02', 1, '', ''),
(6, '2016-02-21', '1', 1, 'Final Sent', '2016-02-21 11:04:01', 1, '', ''),
(7, '2016-02-23', '1', 1, 'Final Sent', '2016-02-21 11:04:36', 1, '', ''),
(8, '2016-05-19', '0', 1, NULL, '2016-05-19 09:02:28', 1, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `evidences`
--

CREATE TABLE IF NOT EXISTS `evidences` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `details` varchar(256) NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `incident_id` int(11) DEFAULT NULL,
  `reported_by` varchar(32) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `incident_id` (`incident_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `evidences`
--

INSERT INTO `evidences` (`id`, `details`, `modified`, `status`, `incident_id`, `reported_by`) VALUES
(1, 'HF sets installed in Entebbe communication center and operational', '2015-08-04 09:26:26', 1, 14, ''),
(2, 'HF sets installed in Entebbe communication center and operational', '2015-08-10 14:54:43', 1, 39, 'admin'),
(3, 'Well truncked network cables in building', '2015-08-11 06:37:16', 1, 37, 'admin'),
(4, 'Full scale performance in one months time', '2015-08-11 06:40:12', 1, 37, 'admin'),
(5, 'HF sets installed in Entebbe communication center and operational ', '2015-10-01 09:53:41', 1, 65, 'admin'),
(6, 'Direct land line telephone 0414320384 in Entebbe communication center and Operational ', '2015-10-01 09:54:07', 1, 65, 'admin'),
(7, 'N/A', '2015-10-01 12:07:08', 1, 67, 'admin'),
(8, 'good', '2015-10-11 08:21:17', 1, 73, 'admin'),
(9, 'N/A', '2015-11-03 07:03:35', 1, 77, 'admin'),
(10, 'N/A', '2015-11-08 13:17:41', 1, 40, 'admin'),
(11, 'N/A', '2015-12-16 09:30:02', 1, 88, 'sms'),
(12, 'N/A', '2016-01-19 12:29:18', 1, 52, 'admin'),
(13, 'Latest Contract documents ', '2016-01-20 08:24:18', 1, 98, 'admin'),
(14, 'N/A', '2016-02-09 07:25:11', 1, 83, 'Samuel.B'),
(15, 'N/A', '2016-02-09 07:31:44', 1, 86, 'admin'),
(16, 'Yes', '2016-06-25 03:07:54', 1, 72, 'admin'),
(17, 'Power meters are being purchased', '2016-06-25 05:30:03', 1, 126, 'bwire');

-- --------------------------------------------------------

--
-- Table structure for table `existing_defenses`
--

CREATE TABLE IF NOT EXISTS `existing_defenses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `details` text NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `incident_id` int(11) DEFAULT NULL,
  `reported_by` varchar(32) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `incident_id` (`incident_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `existing_defenses`
--

INSERT INTO `existing_defenses` (`id`, `details`, `modified`, `status`, `incident_id`, `reported_by`) VALUES
(1, 'HF communication between Entebbe and Kinshasa ', '2015-07-28 09:31:22', 1, 1, ''),
(2, 'direct landline telephone ', '2015-07-28 09:31:22', 1, 1, ''),
(3, 'All controllers on duty are Trained and station validated', '2015-07-28 09:43:29', 1, 1, ''),
(4, 'procedure on vehicles, equipment, people crossing runway 12/30', '2015-07-28 14:35:37', 1, 11, ''),
(5, 'NONE', '2015-08-10 14:44:44', 1, 39, 'admin'),
(6, 'Purchase of new equip', '2015-08-11 06:29:10', 1, 37, 'admin'),
(7, 'Purchase of new equip', '2015-08-11 11:03:11', 1, 42, 'admin'),
(8, 'HF communication between Entebbe and Kinshasa ', '2015-10-01 11:49:17', 1, 60, 'admin'),
(9, ' direct land-line telephone ', '2015-10-01 11:49:29', 1, 60, 'admin'),
(10, 'Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil ', '2016-05-11 07:45:35', 1, 67, 'admin'),
(11, 'HF communication between Entebbe and Kinshasa.', '2016-05-11 07:45:48', 1, 68, 'admin'),
(12, 'Sed ut perspiciatis unde omnis iste natus error ', '2016-05-11 07:46:11', 1, 65, 'admin'),
(13, 'direct land-line telephone ', '2016-05-11 07:46:04', 1, 77, 'admin'),
(14, 'At vero eos et accusamus et iusto odio dignissimos ducimus qui', '2016-05-11 07:46:23', 1, 40, 'admin'),
(15, 'Nam libero tempore, cum soluta nobis est eligendi ', '2016-05-11 07:46:31', 1, 88, 'sms'),
(16, 'Et harum quidem rerum facilis est et expedita distinctio. ', '2016-05-11 07:46:41', 1, 50, 'admin'),
(17, 'running aerodrome maintenance Contractors    ', '2016-01-20 08:23:57', 1, 98, 'admin'),
(18, 'Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus', '2016-05-11 07:46:53', 1, 83, 'Samuel.B'),
(19, 'Itaque earum rerum hic tenetur a sapiente delectus', '2016-05-11 07:47:05', 1, 86, 'admin'),
(20, 'Install upgraded power meters', '2016-06-25 05:29:40', 1, 126, 'bwire');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `details` text NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `incident_id` int(11) DEFAULT NULL,
  `reported_by` varchar(32) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `incident_id` (`incident_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `details`, `modified`, `status`, `incident_id`, `reported_by`) VALUES
(1, 'Use of trolleys has been stopped.', '2015-07-25 09:33:34', 1, 11, ''),
(2, 'New tiles have been put in place.', '2015-07-25 11:31:42', 1, 11, ''),
(3, 'The air conditioner was replaced.', '2015-07-25 17:36:32', 1, 1, ''),
(4, 'Internal I.T team is working on it. Given them 2 days to handle.', '2015-07-27 15:31:15', 1, 13, ''),
(5, 'Internal IT failed and service provider has been contacted', '2015-08-04 15:37:31', 1, 13, ''),
(6, 'Service provider to tackle issue on 23rd of this month.', '2015-08-10 15:50:01', 1, 39, 'admin'),
(7, 'Loose cables were replaced but we are still waiting for further report on arrival of new equipment', '2015-08-11 06:50:05', 1, 37, 'admin'),
(8, 'Loose cables were replaced but we are still waiting for further report on arrival of new equipment', '2015-08-11 11:03:33', 1, 42, 'admin'),
(9, 'procurement is on going', '2015-11-03 07:51:06', 1, 77, 'admin'),
(10, 'New tiles have been put in place.', '2015-11-03 07:51:59', 1, 77, 'admin'),
(11, 'Internal I.T team is working on it.', '2015-11-03 07:54:50', 1, 77, 'admin'),
(12, 'Use of trolleys has been stopped.', '2015-11-03 07:55:27', 1, 77, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `finacial_risk_analysis`
--

CREATE TABLE IF NOT EXISTS `finacial_risk_analysis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hazzard_no` int(11) NOT NULL COMMENT 'Hazzard Number',
  `date` varchar(20) NOT NULL COMMENT 'Date',
  `action` text NOT NULL COMMENT 'What is to be done or Replaced or Purchaced',
  `cost` int(11) NOT NULL COMMENT 'Cost Of Replacement',
  `warranty` varchar(200) NOT NULL,
  `approved_by` text NOT NULL COMMENT 'Approved and Authorized by',
  `date_modified` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `finacial_risk_analysis`
--

INSERT INTO `finacial_risk_analysis` (`id`, `hazzard_no`, `date`, `action`, `cost`, `warranty`, `approved_by`, `date_modified`, `status`) VALUES
(1, 24, 'DATE', 'INFO', 150000, 'WARRANTY', 'USERNAME', '0000-00-00 00:00:00', 1),
(2, 24, '2015-09-08', 'Purchased new server', 200000, 'N/A', 'admin', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `further_actions`
--

CREATE TABLE IF NOT EXISTS `further_actions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `details` text NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `incident_id` int(11) DEFAULT NULL,
  `reported_by` varchar(32) NOT NULL,
  `comment` varchar(256) NOT NULL,
  `accepted` varchar(3) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `incident_id` (`incident_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `further_actions`
--

INSERT INTO `further_actions` (`id`, `details`, `modified`, `status`, `incident_id`, `reported_by`, `comment`, `accepted`) VALUES
(1, 'Increased supervision', '2015-07-28 09:52:12', 1, 1, 'admin', 'By increasing supervision, better results are expected', 'Yes'),
(2, 'Debriefs', '2015-07-28 09:52:12', 1, 1, 'admin', '', 'Yes'),
(3, 'Sensitisation on  Coordination procedures', '2015-07-28 09:52:31', 1, 1, 'admin', '', 'Yes'),
(4, 'Tarmacadamisimg  the perimeter road to accomodate low heavy equipment.  ', '2015-07-28 10:04:35', 1, NULL, '', '', ''),
(5, 'Tarmacadamisimg  the perimeter road to accomodate low heavy equipment.  ', '2015-07-28 10:05:37', 1, NULL, '', '', ''),
(6, 'Tarmacadamisimg  the perimeter road to accomodate low heavy equipment. ', '2015-07-28 10:06:16', 1, 1, 'admin', '', 'Yes'),
(7, 'Replace all server room wiring with up to date equipment. ', '2015-08-10 14:47:36', 1, 39, 'admin', 'No comment', 'Yes'),
(8, 'Train responsible staff on better safety methods', '2015-08-11 07:26:01', 1, 37, 'admin', 'NO COMMENT', 'Yes'),
(9, 'to purchase a new one', '2015-08-11 16:40:09', 1, 1, 'admin', 'please find out', 'N/A');

-- --------------------------------------------------------

--
-- Table structure for table `incidents`
--

CREATE TABLE IF NOT EXISTS `incidents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `risk_index` varchar(32) NOT NULL,
  `risk_index_category` tinyint(4) DEFAULT NULL,
  `number` varchar(32) NOT NULL,
  `occurrence` varchar(256) NOT NULL,
  `place` varchar(128) NOT NULL,
  `time` varchar(128) NOT NULL,
  `aircraft_registration` varchar(128) NOT NULL,
  `operator` varchar(256) NOT NULL,
  `departure_point` varchar(128) NOT NULL,
  `persons_on_board` varchar(128) NOT NULL,
  `date` date DEFAULT NULL,
  `reported_by` varchar(32) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `category` varchar(32) NOT NULL DEFAULT 'NONE',
  `brief_notes` text NOT NULL,
  `recommendations` text NOT NULL COMMENT 'Brief Notes',
  `type_of_operation` varchar(256) NOT NULL,
  `person_responsible` varchar(256) NOT NULL,
  `main_category` varchar(32) NOT NULL,
  `reported_by_name` varchar(128) NOT NULL,
  `reported_by_department` varchar(128) NOT NULL,
  `reported_by_tel` varchar(128) NOT NULL,
  `reported_by_email` varchar(128) NOT NULL,
  `parent_occurrence` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `cause_id` int(11) DEFAULT NULL,
  `other_cause_details` varchar(128) NOT NULL,
  `reported` varchar(20) NOT NULL DEFAULT 'Yes',
  `reoccuring` tinyint(4) NOT NULL DEFAULT '0',
  `date_reported` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `operator` (`operator`),
  KEY `status` (`status`),
  KEY `category_id` (`category_id`),
  KEY `cause_id` (`cause_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=205 ;

--
-- Dumping data for table `incidents`
--

INSERT INTO `incidents` (`id`, `risk_index`, `risk_index_category`, `number`, `occurrence`, `place`, `time`, `aircraft_registration`, `operator`, `departure_point`, `persons_on_board`, `date`, `reported_by`, `status`, `modified`, `category`, `brief_notes`, `recommendations`, `type_of_operation`, `person_responsible`, `main_category`, `reported_by_name`, `reported_by_department`, `reported_by_tel`, `reported_by_email`, `parent_occurrence`, `category_id`, `cause_id`, `other_cause_details`, `reported`, `reoccuring`, `date_reported`) VALUES
(1, '', NULL, '', 'There is too much heat in tower due lack of airconditioning. This causes headache, low performance and sometimes we get dizzy and feel like faiting. This has gone on for a very long time and it gets worse day by day.', 'Tower', '12 PM', 'HE-09-122-U', '1', 'East', '', '2015-08-09', 'admin', 4, '2016-06-22 23:54:37', 'Other', '', '', 'Communication', 'MCNS', 'Hazard', '', '', '', '', NULL, NULL, NULL, '', 'Yes', 1, '2016-04-01'),
(2, '', NULL, '', 'There is too much heat in tower', 'Tower', '12 PM', 'HE-09-122-K', '1', 'East', '12', '2016-04-01', 'admin', 3, '2016-06-22 23:54:37', 'OSHE', '', '', '', '', 'Incident', '', '', '', '', NULL, NULL, NULL, '', 'Yes', 1, '2016-04-01'),
(3, '', NULL, '', 'The floor in the tower is slippery', 'Tower', '3 PM', '', '1', '', '', '2016-04-01', 'admin', 3, '2016-06-22 23:54:37', 'OSHE', '', '', '', '', 'Incident', '', '', '', '', NULL, NULL, NULL, '', 'Yes', 1, '2016-04-01'),
(4, '', NULL, '', 'A track broke down on the runway', 'Runway', '5 AM', 'KA-23-567-B', '1', 'North wing', '134', '2015-10-09', 'admin', 3, '2016-06-22 23:54:37', 'Other', '', '', '', '', 'Hazard', '', '', '', '', NULL, NULL, NULL, '', 'Yes', 1, '2016-04-01'),
(5, '', NULL, '', 'A track broke down on the runway', 'Tower', '12 PM', 'ABC-XX-211-K', '1', '', '', '2016-04-01', 'admin', 3, '2016-06-22 23:54:37', 'AVIATION', '', '', '', '', 'Incident', '', '', '', '', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(6, '', NULL, '', 'A track broke down on the runway', 'PLACE 1', '12 PM', 'ABC-XX-211-K', 'OPERATOR A', 'DEPARTURE POINT A', '12', '2016-04-01', 'admin', 3, '2016-06-22 23:54:37', 'AVIATION', '', '', '', '', 'Incident', '', '', '', '', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(7, '', NULL, '', 'A track broke down on the runway', 'PLACE 1', '5 AM', 'ABC-XX-211-K', 'OPERATOR A', 'DEPARTURE POINT B', '134', '2015-10-02', 'admin', 3, '2016-06-22 23:54:37', 'AVIATION', '', '', '', '', 'Incident', '', '', '', '', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(8, '', NULL, '', 'The floor in the tower is slippery', 'PLACE 1', '12 PM', '', '', '', '', '2016-04-01', 'admin', 3, '2016-06-22 23:54:37', 'AVIATION', '', '', '', '', 'Incident', '', '', '', '', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(9, '', NULL, '', 'A track broke down on the runway', 'PLACE 1', '12 PM', 'ABC-XX-211-K', 'OPERATOR A', 'DEPARTURE POINT A', '134', '2016-04-01', 'admin', 3, '2016-06-22 23:54:37', 'AVIATION', 'A track broke down on the runway because the driver didnt apply brakes.', '', '', '', 'Incident', '', '', '', '', NULL, NULL, NULL, '', 'Yes', 1, '2016-04-01'),
(10, '', NULL, '', 'A track broke down on the runway', 'PLACE 1', '5 AM', '', '', '', '', '2016-04-01', 'admin', 5, '2016-06-22 23:54:37', 'AVIATION', 'A track broke down on the runway after the driver had been careless.', '', '', '', 'Incident', '', '', '', '', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(11, '', NULL, '', 'A track broke down on the runway', 'PLACE 1', '3 PM', 'KA-23-567-B', 'OPERATOR A', 'DEPARTURE POINT A', '134', '2015-10-09', 'admin', 3, '2016-06-22 23:54:37', 'Other', 'A track broke down on the runway after the driver had walked away leaving the hand brake not in place.			', '', 'Communication', 'MCNS', 'Hazard', '', '', '', '', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(12, '', NULL, '', 'Hanging wires in server room', 'Tower', '3 PM', '', '', '', '', '2015-10-11', 'admin', 3, '2016-06-22 23:54:37', 'Other', '', '', '', '', 'Hazard', '', '', '', '', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(13, '', NULL, '', 'Hanging wires in server room', 'Tower', '12 PM', '', '', '', '', '2016-04-01', 'admin', 4, '2016-06-22 23:54:37', 'OSHE', 'Observed hanging wires in server room since yesterday.', '', '', '', 'Incident', '', '', '', '', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(14, '', NULL, '', 'Hanging wires in server room', 'PLACE 1', '3 PM', '', '', '', '', '2015-10-08', 'admin', 3, '2016-06-22 23:54:37', 'Other', '', '', '', '', 'Hazard', '', '', '', '', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(15, '', NULL, '', 'The floor in the tower is slippery', 'Tower', '5 AM', '', '', '', '', '2016-04-01', 'guest', 3, '2016-06-22 23:54:37', 'OSHE', '', '', '', '', 'Incident', '', '', '', '', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(16, '', NULL, '', 'A track broke down on the runway', 'Tower', '3 PM', '', '', '', '', '2016-04-01', 'guest', 2, '2016-06-22 23:54:37', 'SERIOUS', '', '', '', '', 'Incident', '', '', '', '', NULL, NULL, NULL, '', 'Yes', 1, '2016-04-01'),
(17, '', NULL, '', 'There is too much heat in tower', 'Tower', '3 PM', '', '', '', '', '2016-04-01', 'guest', 2, '2016-06-22 23:54:37', 'MINOR', '', '', '', '', 'Incident', '', '', '', '', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(18, '', NULL, '', 'The floor in the tower is slippery', 'Tower', '12 PM', '', '', '', '', '2016-04-01', 'guest', 2, '2016-06-22 23:54:37', 'AVIATION', '', '', '', '', 'Hazard', '', '', '', '', NULL, NULL, NULL, '', 'Yes', 1, '2016-04-01'),
(19, '', NULL, '', 'A track broke down on the runway', 'Tower', '3 PM', '', '', '', '', '2016-04-01', 'guest', 2, '2016-06-22 23:54:37', 'NONE', '', '', '', '', 'SITREP', '', '', '', '', NULL, NULL, NULL, '', 'Yes', 1, '2016-04-01'),
(20, '', NULL, '', 'Runway is slippery', 'Tower', '5 AM', '', '', '', '', '2016-04-01', 'guest', 2, '2016-06-22 23:54:37', 'NONE', '', '', '', '', 'Issue', '', '', '', '', NULL, NULL, NULL, '', 'Yes', 1, '2016-04-01'),
(21, '', NULL, '', 'Hanging wires in server room', 'Tower', '3 PM', '', '', '', '', '2016-04-01', 'admin', 6, '2016-06-22 23:54:37', 'NONE', '', '', '', '', 'SITREP', '', '', '', '', NULL, NULL, NULL, '', 'Yes', 1, '2016-04-01'),
(22, '', NULL, '', 'Hanging wires in server room', 'Tower', '5 AM', '', '', '', '', '2016-04-01', 'admin', 3, '2016-06-22 23:54:37', 'NONE', '', '', '', '', 'SITREP', '', '', '', '', NULL, NULL, NULL, '', 'Yes', 1, '2016-04-01'),
(23, '', NULL, '', 'Loose door', 'Area Control Center', '12 PM', '', '', '', '', '2016-04-01', 'admin', 3, '2016-06-22 23:54:37', 'NONE', '', '', '', '', 'Issue', '', '', '', '', NULL, NULL, NULL, '', 'Yes', 1, '2016-04-01'),
(24, '', NULL, '', 'A track broke down on the runway', 'Approach', '3 PM', '', '', '', '', '2016-04-01', 'guest', 3, '2016-06-22 23:54:37', 'NONE', '', '', '', '', 'Issue', '', '', '', '', NULL, NULL, NULL, '', 'Yes', 1, '2016-04-01'),
(25, '', NULL, '', 'Runway is slippery', 'Approach', '12 PM', '', '', '', '', '2016-04-01', 'guest', 3, '2016-06-22 23:54:37', 'NONE', '', '', '', '', 'Issue', '', '', '', '', NULL, NULL, NULL, '', 'Yes', 1, '2016-04-01'),
(26, '', NULL, '', 'Loose door', 'Area Control Center', '3 PM', '', '', '', '', '2016-04-01', 'admin', 3, '2016-06-22 23:54:37', 'NONE', 'Loose door in the area control center', '', '', '', 'Issue', 'admin', 'DUTY OFFICER', '', 'info@caauganda.com', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(27, '', NULL, '', 'The floor in the tower is slippery', 'Tower', '5 AM', '', '', '', '', '2016-04-01', 'guest', 3, '2016-06-22 23:54:37', 'NONE', '', '', '', '', 'Issue', 'ronald', 'sms', '0761221334', 'ronald@gmail.com', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(28, '', NULL, '', 'Hanging wires in server room', 'Tower', '12 PM', '', '', '', '', '2016-04-01', 'guest', 2, '2016-06-22 23:54:37', 'SERIOUS', '', '', '', '', 'Incident', 'ronald', 'sms', '0761221334', 'ronald@gmail.com', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(29, '', NULL, '', 'Truck broke down due to porthole on runway', 'Approach', '12 PM', '', '', '', '', '2016-04-01', 'guest', 2, '2016-06-22 23:54:37', 'OSHE', '', '', '', '', 'Hazard', 'ronald', 'sms', '0761221334', 'ronald@gmail.com', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(30, '', NULL, 'HZD/A/30/15', 'Runway is slippery', 'Approach', '3 PM', '', '', '', '', '2016-04-01', 'guest', 2, '2016-06-22 23:54:37', 'AVIATION', '', '', '', '', 'Hazard', 'ronald', 'sms', '0761221334', 'ronald@gmail.com', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(31, '', NULL, '', 'Hanging wires in server room', 'Area Control Center', '3 PM', '', '', '', '', '2016-04-01', 'guest', 2, '2016-06-22 23:54:37', 'MINOR', '', '', '', '', 'Incident', 'ronald', 'sms', '0761221334', 'ronald@gmail.com', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(32, '', NULL, '', 'A track broke down on the runway', 'Approach', '12 PM', '', '', '', '', '2016-04-01', 'guest', 2, '2016-06-22 23:54:37', 'ACCIDENT', '', '', '', '', 'Incident', 'ronald', 'sms', '0761221334', 'ronald@gmail.com', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(33, '', NULL, 'INS/S/33/15', 'Loose door', 'Area Control Center', '3 PM', '', '', '', '', '2016-04-01', 'guest', 2, '2016-06-22 23:54:37', 'SERIOUS', '', '', '', '', 'Incident', 'ronald', 'sms', '0761221334', 'ronald@gmail.com', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(34, '', NULL, 'INS/S/34/15', 'A track broke down on the runway', 'Approach', '5 AM', '', '', '', '', '2016-04-01', 'guest', 2, '2016-06-22 23:54:37', 'SERIOUS', '', '', '', '', 'Incident', '', '', '', '', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(35, '', NULL, 'INS/O/35/15', 'Loose door', 'Tower', '3 PM', '', '', '', '', '2016-04-01', 'guest', 2, '2016-06-22 23:54:37', 'OTHER', '', '', '', '', 'Incident', 'ronald', 'sms', '0761221334', 'ronald@gmail.com', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(36, '', NULL, 'HZD/O/36/15', 'Fire in server room', 'Area Control Center', '3 PM', '', '', '', '', '2016-04-01', 'admin', 2, '2016-06-22 23:54:37', 'OSHE', '', '', '', '', 'Hazard', 'admin', 'DUTY OFFICER', '', 'info@caauganda.com', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(37, '', NULL, '', 'Loose door', 'Approach', '01:07', '', '', '', '', '2016-04-01', 'guest', 3, '2016-06-22 23:54:37', 'NONE', '', '', '', '', 'Issue', '', '', '', '', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(38, '', NULL, '', 'Loose door', 'Approach', '03:10', '', '', '', '', '2015-08-10', 'guest', 5, '2016-06-22 23:54:37', 'NONE', '', '', '', '', 'SITREP', 'ronald', 'sms', '0761221334', 'ronald@gmail.com', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(39, '', NULL, '', 'Fire in server room', 'Area Control Center', '13:09', '', '', '', '', '2015-08-10', 'admin', 4, '2016-06-22 23:54:37', 'NONE', '', '', '', '', 'Issue', '', '', '', '', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(40, '', NULL, 'HZD/A/40/15', 'Fire in server room', 'Approach', '13:09', '', '', '', '', '2015-08-10', 'admin', 3, '2016-06-22 23:54:37', 'AVIATION', '', '', '', '', 'Hazard', '', '', '', '', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(41, '', NULL, '', 'Runway is slippery', 'Approach', '16:30', '', '', '', '', '2015-08-10', 'admin', 1, '2016-06-22 23:54:37', 'NONE', '', '', '', '', 'SITREP', '', '', '', '', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(42, '', NULL, 'INS/M/42/15', 'Loose door', 'Approach', '01:01', '', '', '', '', '2015-08-11', 'guest', 5, '2016-06-22 23:54:37', 'MINOR', '', '', '', '', 'Incident', '', '', '', '', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(43, '', NULL, 'INS/A/43/15', 'A track broke down on the runway', 'Area Control Center', '04:12', '', '', '', '', '2015-08-11', 'guest', 2, '2016-06-22 23:54:37', 'ACCIDENT', '', '', '', '', 'Incident', 'ronald', 'sms', '0761221334', 'ronald@gmail.com', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(44, '', NULL, 'INS/S/44/15', 'Fire in server room', 'Area Control Center', '01:04', '', '', '', '', '2015-08-11', 'guest', 2, '2016-06-22 23:54:37', 'SERIOUS', '', '', '', '', 'Incident', 'ronald', 'sms', '0761221334', 'ronald@gmail.com', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(45, '', NULL, '', 'Loose door', 'Area Control Center', '07:30', '', '', '', '', '2015-08-04', 'admin', 3, '2016-06-22 23:54:37', 'NONE', 'Door in sms department is loose', '', '', '', 'Issue', 'admin', 'DUTY OFFICER', '', 'info@caauganda.com', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(46, '', NULL, 'HZD/A/46/15', 'licking tank', 'Approach', '11:15', '', '', '', '', '2015-08-11', 'admin', 3, '2016-06-22 23:54:37', 'AVIATION', 'licking tank observed', '', '', '', 'Hazard', 'admin', 'DUTY OFFICER', '', 'info@caauganda.com', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(47, '', NULL, '', 'Loose door', 'Unknown', '01:02', '', '', '', '', '2015-08-26', 'guest', 3, '2016-06-22 23:54:37', 'NONE', '', '', '', '', 'Issue', '', '', '', '', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(48, '', NULL, 'HZD/A/48/15', 'Low morale in operational staff', 'SMS office', '03:06', '', '', '', '', '2015-09-02', 'admin', 3, '2016-06-22 23:54:37', 'AVIATION', 'There is low commitment of staff to accomplish their duties', '', '', '', 'Hazard', 'admin', 'DUTY OFFICER', '', 'info@caauganda.com', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(49, '', NULL, 'INS/A/49/15', 'Heating Unit', 'Control Tower', '01:10', '', '', '', '', '2015-09-14', 'guest', 2, '2016-06-22 23:54:37', 'ACCIDENT', 'Observation made today', '', '', '', 'Incident', '', '', '', '', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(50, '', NULL, '', 'Fire in Parking Yard', 'Parking Yard B', '04:15', '', '', '', '', '2015-09-14', 'admin', 3, '2016-06-22 23:54:37', 'NONE', 'Fire in Parking Yard', '', '', '', 'Issue', 'admin', 'DUTY OFFICER', '', 'info@caauganda.com', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(51, '', NULL, '', 'Fire in Parking Yard', 'Parking Yard', 'HOUR:MINUTE', '', '', '', '', '2015-09-14', 'admin', 5, '2016-06-22 23:54:37', 'NONE', 'Fire in Parking Yard', '', '', '', 'Hazard', 'admin', 'DUTY OFFICER', '', 'info@caauganda.com', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(52, '', NULL, '', 'Road block', 'Parking Yard', '4:00 PM', '', '', '', '', '2015-09-17', 'admin', 3, '2016-06-22 23:54:37', 'NONE', 'Road has been blocked due to the fire that occured in the parking yard.', '', '', '', 'Issue', '', '', '', '', 51, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(53, '', NULL, '', 'Truck stuck on runway', 'Runway', '3:00PM', '', '', '', '', '2015-09-23', 'admin', 6, '2016-06-22 23:54:37', 'NONE', 'A yellow heavy truck is stack on the runway and needs to be roomed asap.', '', '', '', 'SITREP', '', '', '', '', NULL, 7, 6, '', 'Yes', 0, '2016-04-01'),
(54, '', NULL, '', 'Broken crane on loading bay', 'Loading bay', '12:00AM', '', '', '', '', '2015-09-24', 'admin', 1, '2016-06-22 23:54:37', 'NONE', '', '', '', '', 'SITREP', '', '', '', '', NULL, 13, 9, '', 'Yes', 0, '2016-04-01'),
(55, '', NULL, '', 'Broken crane on loading bay', 'Loading bay', '12:00AM', '', '', '', '', '2015-09-24', 'admin', 1, '2016-06-22 23:54:37', 'NONE', '', '', '', '', 'SITREP', '', '', '', '', NULL, 4, 9, '', 'Yes', 0, '2016-04-01'),
(56, '', NULL, '', 'Broken crane on loading bay', 'Loading bay', '12:00AM', '', '', '', '', '2015-09-24', 'admin', 1, '2016-06-22 23:54:37', 'NONE', '', '', '', '', 'SITREP', '', '', '', '', NULL, 4, 1, '', 'Yes', 0, '2016-04-01'),
(57, '', NULL, '', 'Fumes from controller van', 'Transit', '09:52', '', '', '', '', '2015-09-25', 'guest', 3, '2016-06-22 23:54:37', 'NONE', 'End route Kampala controller van makes fumes', '', '', '', 'Issue', 'Rogers. W', 'SMS', '078855446', 'rwanzunula@caa.co.ug', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(58, '', NULL, 'INS/A/58/15', 'Exposure to poisonous gas', 'Transit', '1212', '', '', '', '', '2015-09-25', 'admin', 2, '2016-06-22 23:54:37', 'ACCIDENT', '', '', '', '', 'Incident', '', '', '', '', 57, 13, 2, '', 'Yes', 0, '2016-04-01'),
(59, '', NULL, 'HZD/O/59/15', 'Exposure to poisonous gas', 'Transit', '12.12', '', '', '', '', '2015-09-25', 'admin', 3, '2016-06-22 23:54:37', 'OSHE', '', '', '', '', 'Hazard', '', '', '', '', 58, 13, 2, '', 'Yes', 0, '2016-04-01'),
(60, '', NULL, 'HZD/A/60/15', 'Exposure to poisonous gas', 'Transit', '1212', '', '', '', '', '2015-09-25', 'admin', 3, '2016-06-22 23:54:37', 'AVIATION', '', '', '', '', 'Hazard', '', '', '', '', 47, 13, 2, '', 'Yes', 0, '2016-04-01'),
(61, '', NULL, '', 'Exposure to poisonous gas', 'Transit', 'HOUR:MINUTE', '', '', '', '', '2015-09-30', 'guest', 3, '2016-06-22 23:54:37', 'NONE', '', '', '', '', 'Issue', 'sksk', 'sksk', '099', 'p@f.com', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(62, '', NULL, '', 'too much noise in premises', 'tower', '04:15', '', '', '', '', '2015-09-30', 'admin', 3, '2016-06-22 23:54:37', 'NONE', '', '', '', '', 'Issue', 'admin', 'DUTY OFFICER', '', 'info@caauganda.com', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(63, '', NULL, '', 'too much noise in premises', 'tower', '04:15', '', '', '', '', '2015-09-30', 'admin', 3, '2016-06-22 23:54:37', 'NONE', '', '', '', '', 'Issue', 'admin', 'DUTY OFFICER', '', 'info@caauganda.com', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(64, '', NULL, '', 'locking system in store is faulty', 'store', '06:30', '', '', '', '', '2015-09-30', 'guest', 3, '2016-06-22 23:54:37', 'NONE', '', '', '', '', 'Issue', 'mark', 'systems', '0701198000', 'bwire@programmer.net', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(65, '', NULL, 'HZD/A/65/15', 'Aircraft  converging at Bunia DRC FIR   without ATC coordination. ', 'Bunia', '01:30', '', '', '', '', '2015-09-30', 'Samuel.B', 3, '2016-06-22 23:54:37', 'AVIATION', '', '', '', '', 'Hazard', 'Samuel.B', 'Programmer', '+256701198000', 'bwire@programmer.net', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(66, '', NULL, '', 'Chairs in Tower are too low', 'Tower', '02:00', '', '', '', '', '2015-10-01', 'guest', 5, '2016-06-30 10:26:14', 'NONE', '', '', '', '', 'Issue', 'Wanzunula', 'SMS', '+256702953774', 'rwanzunula@caa.co.ug', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(67, '', NULL, 'HZD/A/67/15', 'Lose of situational awareness', 'Tower', '03:00', '', '', '', '', '2015-10-01', 'guest', 3, '2016-06-22 23:54:37', 'AVIATION', '', '', '', '', 'Hazard', '', '', '', '', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(68, '', NULL, 'HZD/A/68/15', 'Staff broke back bone', 'Tower', '02:00', 'q', 'OPERATOR A', 'DEPARTURE POINT A', '1', '2015-10-01', 'admin', 3, '2016-06-22 23:54:37', 'AVIATION', '', '', '', '', 'Hazard', '', '', '', '', 66, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(69, '', NULL, 'HZD/A/69/15', 'Deliberate strike of Tower operators', 'Tower', '02:00', '', '', '', '', '2015-10-02', 'admin', 2, '2016-06-22 23:54:37', 'AVIATION', '', '', '', '', 'Hazard', '', '', '', '', 66, NULL, 1, 'Non', 'Yes', 0, '2016-04-01'),
(70, '', NULL, '', 'Wind around tower', 'Tower', '01:30', '', '', '', '', '2015-10-02', 'Wanzunula.R', 3, '2016-06-22 23:54:37', 'NONE', '', '', '', '', 'Hazard', 'Wanzunula.R', 'PAIMO-SMS/QA', '+256702953774', 'bwire@programmer.net', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(71, '', NULL, '', 'Contoller working with an invalid license', 'Soroti', '05:12', '', '', '', '', '2015-10-02', 'Wanzunula.R', 3, '2016-06-22 23:54:37', 'NONE', '', '', '', '', 'Incident', 'Wanzunula.R', 'PAIMO-SMS/QA', '+256702953774', 'bwire@programmer.net', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(72, '', NULL, '', 'Controller working with an invalid license', 'Soroti', 'HOUR:MINUTE', '', '', '', '', '2016-06-23', 'admin', 3, '2016-06-25 03:07:03', 'NONE', '', '', '', '', 'Hazard', 'Wanzunula.R', 'PAIMO-SMS/QA', '+256702953774', 'bwire@programmer.net', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(73, '', NULL, '', '', 'Soroti', 'HOUR:MINUTE', '', '', '', '', '2015-10-02', 'admin', 3, '2016-06-22 23:54:37', 'NONE', '', '', '', '', 'Hazard', '', '', '', '', 72, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(74, '', NULL, 'HZD/A/74/15', '', 'Soroti', 'HOUR:MINUTE', '', '', '', '', '2015-10-02', 'admin', 2, '2016-06-22 23:54:37', 'AVIATION', '', '', '', '', 'Hazard', '', '', '', '', 72, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(75, '', NULL, '', 'Controller working with an invalid license', 'Soroti', '09:30', '', '', '', '', '2016-07-05', 'guest', 1, '2016-06-22 23:54:37', 'NONE', '', '', '', '', 'Hazard', '', '', '', '', NULL, NULL, NULL, '', 'Yes', 0, '2016-07-05'),
(76, '', NULL, 'HZD/A/76/15', 'open socket', 'control room', '09:00', '', '', '', '', '2015-11-03', 'guest', 2, '2016-06-22 23:54:37', 'AVIATION', '', '', '', '', 'Hazard', '', '', '', '', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(77, '', NULL, 'HZD/O/77/15', 'Trees blocking run way view', 'Tower', '09:30', 'ER522Q', '', '', 'mwesigye', '2015-11-03', 'admin', 4, '2016-06-22 23:54:37', 'OSHE', '', '', '', '', 'Hazard', '', '', '', '', 75, NULL, 9, 'xx', 'Yes', 0, '2016-04-01'),
(78, '', NULL, '', 'Trees blocking run way view', 'Tower', '04:10', '34GH-991', 'OPERATOR A', 'DEPARTURE POINT A', 'mwesigye', '2015-11-03', 'admin', 1, '2016-06-22 23:54:37', 'NONE', '', '', '', '', 'SITREP', 'admin', 'DUTY OFFICER', '', 'info@caauganda.com', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(79, '', NULL, '', 'Trees blocking run way view', 'Tower', '02:03', '', '', '', '', '2015-11-08', 'admin', 1, '2016-06-22 23:54:37', 'NONE', '', '', '', '', 'Issue', 'admin', 'DUTY OFFICER', '', 'info@caauganda.com', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(80, '', NULL, '', 'Trees blocking run way view', 'Control Room', 'HOUR:MINUTE', '', '', '', '', '2015-11-02', 'admin', 1, '2016-06-22 23:54:37', 'NONE', '', '', '', '', 'Issue', 'admin', 'DUTY OFFICER', '', 'info@caauganda.com', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(81, '', NULL, '', 'Trees blocking run way view', 'Tower', '03:04', '', '', '', '', '2015-11-10', 'admin', 1, '2016-06-22 23:54:37', 'NONE', '', '', '', '', 'Issue', 'admin', 'DUTY OFFICER', '', 'info@caauganda.com', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(82, '', NULL, '', 'Trees blocking run way view', 'Control Room', '03:04', '', '', '', '', '2015-11-08', 'admin', 1, '2016-06-22 23:54:37', 'NONE', '', '', '', '', 'Incident', 'admin', 'DUTY OFFICER', '', 'info@caauganda.com', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(83, '', NULL, 'HZD/A/83/16', 'Trees blocking run way view', 'Tower', '03:05', '', '', '', '', '2015-11-07', 'admin', 3, '2016-06-22 23:54:37', 'AVIATION', '', '', 'Communication', '', 'Hazard', 'admin', 'DUTY OFFICER', '', 'info@caauganda.com', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(84, '', NULL, '', 'Trees blocking run way view', 'Tower', '03:07', '', '', '', '', '2015-12-16', 'guest', 1, '2016-06-22 23:54:37', 'NONE', '', '', '', '', 'Issue', '', '', '', '', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(85, '', NULL, '', 'Trees blocking run way view', 'Tower', '04:02', '', '', '', '', '2015-12-16', 'guest', 1, '2016-06-22 23:54:37', 'NONE', '', '', '', '', 'Incident', '', '', '', '', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(86, '', NULL, 'HZD/A/86/16', 'Trees blocking run way view', 'Tower', '04:06', '', '', '', '', '2015-12-16', 'guest', 3, '2016-06-22 23:54:37', 'AVIATION', '', '', 'Communication', '', 'Hazard', '', '', '', '', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(87, '', NULL, '', 'Trees blocking run way view', 'Tower', '05:04', '', '', '', '', '2015-12-16', 'guest', 1, '2016-06-22 23:54:37', 'NONE', '', '', '', '', 'Issue', 'Rogers. W', '444', '44444', 'rwanzunula@gmail.com', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(88, '', NULL, 'HZD/O/88/15', 'Trees blocking run way view', 'Control Room', '03:30', '', '', '', '', '2015-12-15', 'sms', 3, '2016-06-22 23:54:37', 'OSHE', '', '', '', '', 'Hazard', 'sms', 'DUTY OFFICER', '', '', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(89, '', NULL, '', 'Trees blocking run way view', 'Tower', '04:02', '', '', '', '', '2015-12-29', 'admin', 3, '2016-06-22 23:54:37', 'NONE', '', '', '', '', 'Issue', '', '', '', '', 85, NULL, 2, '', 'Yes', 0, '2016-04-01'),
(90, '', NULL, '', 'Trees blocking run way view', 'Tower', '9:23', '', '', '', '', '2016-01-20', 'admin', 3, '2016-06-22 23:54:37', 'NONE', '', '', '', '', 'Issue', '', '', '', '', NULL, NULL, 1, 'test', 'Yes', 0, '2016-04-01'),
(91, '', NULL, '', 'Trees blocking run way view', 'Tower', '10:54', '', '', '', '', '2016-01-20', 'admin', 1, '2016-06-22 23:54:37', 'NONE', '', '', '', '', 'Issue', '', '', '', '', NULL, NULL, NULL, 'x1', 'Yes', 0, '2016-04-01'),
(92, '', NULL, 'HZD/A/92/16', 'Trees blocking run way view', 'Tower', '1:02', '', '', '', '', '2016-01-20', 'admin', 2, '2016-06-22 23:54:37', 'AVIATION', '', '', '', '', 'Hazard', '', '', '', '', NULL, NULL, NULL, 'tes', 'Yes', 0, '2016-04-01'),
(93, '', NULL, '', 'Trees blocking run way view', 'Tower', '2:12', '', '', '', '', '2016-01-20', 'admin', 1, '2016-06-22 23:54:37', 'NONE', '', '', '', '', 'Issue', '', '', '', '', 91, NULL, 1, 'test', 'Yes', 0, '2016-04-01'),
(94, '', NULL, '', 'Trees blocking run way view', 'Tower', '5:09', '', '', '', '', '2016-01-20', 'admin', 1, '2016-06-22 23:54:37', 'NONE', '', '', '', '', 'Incident', '', '', '', '', 93, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(95, '', NULL, '', 'Trees blocking run way view', 'tower', '03:15', '', '', '', '', '2016-01-20', 'guest', 1, '2016-06-22 23:54:37', 'NONE', '', '', '', '', 'Issue', 'Test Namw', 'Test', '090', 'krabz01@gmail.com', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(96, '', NULL, '', 'Trees blocking run way view', 'Tower', 'HOUR:MINUTE', '', '', '', '', '2016-01-27', 'guest', 1, '2016-06-22 23:54:37', 'NONE', '', '', '', '', 'Issue', 'test', 'De', '809', 'test', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(97, '', NULL, '', 'Trees blocking run way view', 'Tower', '03:03', '', '', '', '', '2016-01-20', 'Samuel.B', 5, '2016-06-22 23:54:37', 'NONE', '', '', '', '', 'Incident', 'Samuel.B', 'Programmer', '+256701198000', 'bwire@programmer.net', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(98, '', NULL, 'HZD/A/98/16', 'Trees blocking run way view', 'control tower', '16:13', '', '', '', '', '2016-01-20', 'Samuel.B', 3, '2016-06-22 23:54:37', 'AVIATION', '', '', '', '', 'Hazard', 'Samuel.B', 'Programmer', '+256701198000', 'bwire@programmer.net', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(99, '', NULL, 'HZD/O/99/16', 'Environmental Civil Suit', 'control tower', '16:13', '', '', '', '', '2016-01-20', 'admin', 3, '2016-06-22 23:54:37', 'OSHE', '', '', 'Communication', '', 'Hazard', '', '', '', '', 98, NULL, 2, 'Cutting down the trees', 'Yes', 0, '2016-04-01'),
(100, '', NULL, 'HZD/O/100/16', 'Environmental Civil Suit', 'Tower', '02:05', '', '', '', '', '2016-02-09', 'guest', 2, '2016-06-22 23:54:37', 'OSHE', '', '', 'Communication', '', 'Hazard', 'Rogers', 'yyuty', '', 'rwanzunula@caa.co.ug', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(101, '', NULL, '', 'Trees blocking run way view', 'entebbe', '20:12', '', '', '', '', '2016-02-09', 'guest', 1, '2016-06-22 23:54:37', 'NONE', '', '', '', '', 'Issue', '', '', '0712493893', 'amwesige@caa.co.ug', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(102, '', NULL, 'INS/S/102/16', 'Trees blocking run way view', 'entebbe', '19:00', '', '', '', '', '2016-02-09', 'guest', 2, '2016-06-22 23:54:37', 'SERIOUS', '', '', '', '', 'Incident', '', '', '', 'mwesigea@gmail.com', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(103, '', NULL, '', 'Trees blocking run way view', 'Runway', '02:05', '', '', '', '', '2016-02-09', 'guest', 1, '2016-06-22 23:54:37', 'NONE', '', '', '', '', 'Issue', 'wanzunula Rogers', 'SMS', '0772953774', 'rwanzunula@caa.co.ug', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(104, '', NULL, '', 'Trees blocking run way view', 'Runway', '08:16', 'KL AirLines', 'OPERATOR A', 'DEPARTURE POINT A', 'mwesigye', '2016-02-09', 'Samuel.B', 5, '2016-06-22 23:54:37', 'NONE', '', '', '', '', 'SITREP', 'Samuel.B', 'Programmer', '+256701198000', 'bwire@programmer.net', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(105, '', NULL, 'INS/S/105/16', 'Trees blocking run way view', 'Runway', '2323', '', '', '', '', '2016-02-09', 'admin', 2, '2016-06-22 23:54:37', 'SERIOUS', '', '', '', '', 'Incident', '', '', '', '', NULL, NULL, 3, '34', 'Yes', 0, '2016-04-01'),
(106, '', NULL, 'INS/S/106/16', 'Trees blocking run way view', 'Runway', '2323', '', '', '', '', '2016-02-09', 'admin', 2, '2016-06-22 23:54:37', 'SERIOUS', '', '', '', '', 'Incident', '', '', '', '', NULL, NULL, 2, 'jjjjj', 'Yes', 0, '2016-04-01'),
(107, '', NULL, '', 'Trees blocking run way view', 'Runway', '12:54', '', '', '', '', '2016-02-16', 'admin', 3, '2016-06-22 23:54:37', 'NONE', '', '', '', '', 'Hazard', '', '', '', '', NULL, NULL, 1, 'test', 'Yes', 0, '2016-04-01'),
(108, '', NULL, 'HZD/A/108/16', 'Trees blocking run way view', 'Runway', '12:24', '', '', '', '', '2016-02-16', 'admin', 3, '2016-06-22 23:54:37', 'AVIATION', 'Plus This and that', '', '', '', 'Hazard', '', '', '', '', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(109, '', NULL, '', 'Trees blocking run way view', 'Runway', '08:30', 'KL AirLines', 'muhumuza', 'point b', 'muhumuza', '2016-02-21', 'admin', 1, '2016-06-22 23:54:37', 'NONE', '', '', '', '', 'SITREP', 'admin', 'DUTY OFFICER', '', 'info@caauganda.com', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(110, '', NULL, '', 'Bird Strick', 'Runway', 'HOUR:MINUTE', 'KL AirLines', 'KL AirLines', 'KL AirLines', 'kwesiga', '2016-03-02', 'Samuel.B', 1, '2016-06-22 23:54:37', 'NONE', '', '', '', '', 'SITREP', 'Samuel.B', 'Programmer', '+256701198000', 'bwire@programmer.net', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(111, '', NULL, '', 'Tresspass by unknown men', 'Behind tower building', 'HOUR:MINUTE', '', '', '', '', '2016-05-25', 'admin', 1, '2016-06-22 23:54:37', 'NONE', '', '', '', '', 'Issue', 'admin', 'DUTY OFFICER', '', 'info@caauganda.com', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(112, '', NULL, '', 'Explosion in server room', 'Server room', '1:09', '', '', '', '', '2016-06-19', 'admin', 1, '2016-06-22 23:54:37', 'NONE', '', '', '', '', 'Issue', '', '', '', '', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(113, '', NULL, '', 'OCCURRENCE', 'PLACE', 'HOUR:MINUTE', '', '', '', '', '2016-06-19', 'admin', 1, '2016-06-22 23:54:37', 'NONE', '', '', '', '', 'Issue', 'admin', 'DUTY OFFICER', '', 'info@caauganda.com', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(114, '', NULL, '', 'OCCURRENCE', 'PLACE', 'HOUR:MINUTE', '', '', '', '', '2016-06-19', 'admin', 3, '2016-06-22 23:54:37', 'NONE', '', '', '', '', 'Issue', 'admin', 'DUTY OFFICER', '', 'info@caauganda.com', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(115, '', NULL, '', 'Explosion in server room', 'Server room', '01:06', '', '', '', '', '2016-06-19', 'admin', 1, '2016-06-22 23:54:37', 'NONE', '', '', '', '', 'Issue', 'admin', 'DUTY OFFICER', '', 'info@caauganda.com', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(116, '', NULL, '', 'Explosion in server room', 'Server room', '05:11', '', '', '', '', '2016-06-19', 'admin', 1, '2016-06-22 23:54:37', 'NONE', '', '', '', '', 'Issue', 'admin', 'DUTY OFFICER', '', 'info@caauganda.com', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(117, '', NULL, '', 'Explosion in server room', 'Server room', '04:09', '', '', '', '', '2016-06-19', 'admin', 1, '2016-06-22 23:54:37', 'NONE', '', '', '', '', 'Issue', 'admin', 'DUTY OFFICER', '', 'info@caauganda.com', NULL, NULL, NULL, '', 'Yes', 1, '2016-04-01'),
(118, '', NULL, '', 'Explosion in server room', 'Server room', 'HOUR:10', '', '', '', '', '2016-06-13', 'admin', 1, '2016-06-22 23:54:37', 'NONE', '', '', '', '', 'Issue', 'admin', 'DUTY OFFICER', '', 'info@caauganda.com', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(119, '', NULL, '', 'Explosion in server room', 'Server room', '16:11', '', '', '', '', '2016-06-07', 'admin', 1, '2016-06-22 23:54:37', 'NONE', '', '', '', '', 'Issue', 'admin', 'DUTY OFFICER', '', 'info@caauganda.com', NULL, NULL, NULL, '', 'Yes', 1, '2016-04-01'),
(120, '', NULL, '', 'Explosion in server room', 'Server room', '12:04', '', '', '', '', '2016-06-01', 'admin', 1, '2016-06-22 23:54:37', 'NONE', '', '', '', '', 'Issue', '', '', '', '', NULL, NULL, NULL, '', 'Yes', 1, '2016-04-01'),
(121, '', NULL, '', 'Explosion in server room', 'Server room', '06:08', '', '', '', '', '2016-06-06', 'admin', 1, '2016-06-19 02:35:56', 'NONE', '', '', '', '', 'Issue', 'admin', 'DUTY OFFICER', '', 'info@caauganda.com', NULL, NULL, NULL, '', 'Yes', 1, '2016-06-19'),
(122, '', NULL, '', 'Explosion in server room', 'Server room', '12:04', '', '', '', '', '2016-06-23', 'admin', 3, '2016-06-25 07:32:18', 'NONE', '', '', '', '', 'Hazard', '', '', '', '', NULL, NULL, NULL, '', 'Yes', 0, '2016-06-23'),
(123, '', NULL, '', 'Explosion in server room', 'Server room', '00:04', 'AIRCRAFT REG', 'OPERATOR', 'DEPATURE POINT', 'ON BOARD', '2016-06-25', 'admin', 1, '2016-06-24 22:48:38', 'NONE', '', '', '', '', 'SITREP', 'admin', 'DUTY OFFICER', '', 'info@caauganda.com', NULL, NULL, NULL, '', 'Yes', 0, '2016-06-25'),
(124, '', NULL, '', 'Explosion in server room', 'Server room', '00:04', 'AIRCRAFT REG', 'OPERATOR', 'DEPATURE POINT', 'ON BOARD', '2016-06-25', 'admin', 1, '2016-06-24 22:49:35', 'NONE', '', '', '', '', 'SITREP', 'admin', 'DUTY OFFICER', '', 'info@caauganda.com', NULL, NULL, NULL, '', 'Yes', 0, '2016-06-25'),
(125, '', NULL, '', 'Explosion in server room', 'Server room', 'HOUR:MINUTE', 'AIRCRAFT REG', 'OPERATOR', 'DEPATURE POINT', 'ON BOARD', '2016-06-25', 'admin', 1, '2016-06-24 22:50:01', 'NONE', '', '', '', '', 'SITREP', 'admin', 'DUTY OFFICER', '', 'info@caauganda.com', NULL, NULL, NULL, '', 'Yes', 0, '2016-06-25'),
(126, '', NULL, '', 'Explosion in server room', 'Server room', 'HOUR:MINUTE', '', '', '', '', '2016-06-25', 'admin', 3, '2016-06-25 05:33:55', 'NONE', '', '', 'Power threats', '', 'Hazard', 'admin', 'DUTY OFFICER', '', 'info@caauganda.com', NULL, NULL, NULL, '', 'Yes', 0, '2016-06-25'),
(127, '', NULL, '', 'Accident happened at Tower', 'SMS office', '04:09', '', 'Samuel', '', '2', '2016-06-14', 'bwire', 1, '2016-06-25 10:02:04', 'NONE', '', '', '', '', 'SITREP', 'bwire', 'Programmer', '+256701198000', 'bwire@programmer.net', NULL, NULL, NULL, '', 'Yes', 0, '2016-06-25'),
(128, '', NULL, '', 'pot hole on the runway', 'tower', '05:25', '', '', '', '', '2016-06-27', 'guest', 1, '2016-06-27 10:05:49', 'NONE', '', '', '', '', 'Issue', '', '', '', 'ekakama@caa.co.ug', NULL, NULL, NULL, '', 'Yes', 0, '2016-06-27'),
(129, '', NULL, '', 'faulty air conditioner', 'apac', 'HOUR:MINUTE', '', '', '', '', '2000-09-09', 'matovu', 1, '2016-06-28 04:50:56', 'NONE', '', '', '', '', 'Incident', 'matovu', 'SMS Officer', '', 'davimato@yahoo.com', NULL, NULL, NULL, '', 'Yes', 1, '2016-06-28'),
(130, '', NULL, '', 'poor telephone arrangement', 'abim', 'HOUR:MINUTE', '', '', '', '', '2001-01-01', 'matovu', 1, '2016-06-28 04:53:00', 'NONE', '', '', '', '', 'Incident', 'matovu', 'SMS Officer', '', 'davimato@yahoo.com', NULL, NULL, NULL, '', 'Yes', 1, '2016-06-28'),
(131, '', NULL, '', 'aircraft on taxiways', 'kalong', 'HOUR:MINUTE', '', '', '', '', '2010-06-20', 'matovu', 1, '2016-06-28 04:55:58', 'NONE', '', '', '', '', 'Hazard', 'matovu', 'SMS Officer', '', 'davimato@yahoo.com', NULL, NULL, NULL, '', 'Yes', 0, '2016-06-28'),
(132, '', NULL, '', 'safety of equipment room', 'lacor', 'HOUR:MINUTE', '', '', '', '', '2010-06-20', 'matovu', 1, '2016-06-28 04:57:19', 'NONE', '', '', '', '', 'Hazard', 'matovu', 'SMS Officer', '', 'davimato@yahoo.com', NULL, NULL, NULL, '', 'Yes', 0, '2016-06-28'),
(133, '', NULL, '', 'lack of transport', 'serere', 'HOUR:MINUTE', '', '', '', '', '2000-10-10', 'matovu', 1, '2016-06-28 04:58:38', 'NONE', '', '', '', '', 'Issue', 'matovu', 'SMS Officer', '', 'davimato@yahoo.com', NULL, NULL, NULL, '', 'Yes', 1, '2016-06-28'),
(134, '', NULL, '', 'transport', 'lira', 'HOUR:MINUTE', '', '', '', '', '2000-12-12', 'matovu', 1, '2016-06-28 05:00:04', 'NONE', '', '', '', '', 'Issue', 'matovu', 'SMS Officer', '', 'davimato@yahoo.com', NULL, NULL, NULL, '', 'Yes', 0, '2016-06-28'),
(135, '', NULL, '', 'faulty boiler', 'mbale', 'HOUR:MINUTE', '', '', '', '', '2000-05-12', 'matovu', 1, '2016-06-28 05:08:45', 'NONE', '', '', '', '', 'Issue', 'matovu', 'SMS Officer', '', 'davimato@yahoo.com', NULL, NULL, NULL, '', 'Yes', 0, '2016-06-28'),
(136, '', NULL, '', 'lack of water', 'kilwa', 'HOUR:MINUTE', '', '', '', '', '2001-01-01', 'matovu', 1, '2016-06-28 05:10:16', 'NONE', '', '', '', '', 'Issue', 'matovu', 'SMS Officer', '', 'davimato@yahoo.com', NULL, NULL, NULL, '', 'Yes', 1, '2016-06-28'),
(137, '', NULL, '', 'broken windows', 'masaka', 'HOUR:MINUTE', '', '', '', '', '2005-01-12', 'matovu', 1, '2016-06-28 05:13:15', 'NONE', '', '', '', '', 'Issue', 'matovu', 'SMS Officer', '', 'davimato@yahoo.com', NULL, NULL, NULL, '', 'Yes', 1, '2016-06-28'),
(138, '', NULL, '', 'lack of first aid kits', 'hoima', 'HOUR:MINUTE', '', '', '', '', '2001-01-01', 'matovu', 1, '2016-06-28 05:15:18', 'NONE', '', '', '', '', 'Issue', 'matovu', 'SMS Officer', '', 'davimato@yahoo.com', NULL, NULL, NULL, '', 'Yes', 0, '2016-06-28'),
(139, '', NULL, '', 'unprotected CNS equipmnt', 'Lira', 'HOUR:MINUTE', '', '', '', '', '2006-09-09', 'matovu', 1, '2016-06-28 05:20:44', 'NONE', '', '', '', '', 'Hazard', 'matovu', 'SMS Officer', '', 'davimato@yahoo.com', NULL, NULL, NULL, '', 'Yes', 0, '2016-06-28'),
(140, '', NULL, '', 'unprotected CNS equipmnt', 'Lira', 'HOUR:MINUTE', '', '', '', '', '2006-09-09', 'matovu', 1, '2016-06-28 05:20:47', 'NONE', '', '', '', '', 'Hazard', 'matovu', 'SMS Officer', '', 'davimato@yahoo.com', NULL, NULL, NULL, '', 'Yes', 0, '2016-06-28'),
(141, '', NULL, '', 'air miss', 'gulu', 'HOUR:MINUTE', '', '', '', '', '2001-01-01', 'matovu', 1, '2016-06-28 05:00:42', 'NONE', '', '', '', '', 'Issue', 'matovu', 'SMS Officer', '', 'davimato@yahoo.com', NULL, NULL, NULL, '', 'Yes', 0, '2016-06-28'),
(142, '', NULL, '', 'NO PLAN B', 'KELIM', 'HOUR:MINUTE', '', '', '', '', '2000-09-09', 'matovu', 1, '2016-06-28 05:03:06', 'NONE', '', '', '', '', 'Issue', 'matovu', 'SMS Officer', '', 'davimato@yahoo.com', NULL, NULL, NULL, '', 'Yes', 0, '2016-06-28'),
(143, '', NULL, '', 'diversion', 'HUEK', 'HOUR:MINUTE', '', '', '', '', '2001-06-06', 'matovu', 1, '2016-06-28 05:06:38', 'NONE', '', '', '', '', 'Issue', 'matovu', 'SMS Officer', '', 'davimato@yahoo.com', NULL, NULL, NULL, '', 'Yes', 0, '2016-06-28'),
(144, '', NULL, '', 'POOR TELEPHONES', 'ININGO', 'HOUR:MINUTE', '', '', '', '', '2001-01-01', 'matovu', 1, '2016-06-28 05:08:50', 'NONE', '', '', '', '', 'Issue', 'matovu', 'SMS Officer', '', 'davimato@yahoo.com', NULL, NULL, NULL, '', 'Yes', 0, '2016-06-28'),
(145, '', NULL, '', 'REMOTE MONITORING', 'KAMUSALA', 'HOUR:MINUTE', '', '', '', '', '2003-09-04', 'matovu', 1, '2016-06-28 05:13:12', 'NONE', '', '', '', '', 'Issue', 'matovu', 'SMS Officer', '', 'davimato@yahoo.com', NULL, NULL, NULL, '', 'Yes', 1, '2016-06-28'),
(146, '', NULL, '', 'faulty localiser', 'KASILO', '11:15', '', '', '', '', '2002-09-12', 'matovu', 1, '2016-06-28 05:20:04', 'NONE', '', '', '', '', 'Issue', 'matovu', 'SMS Officer', '', 'davimato@yahoo.com', NULL, NULL, NULL, '', 'Yes', 1, '2016-06-28'),
(147, '', NULL, '', 'no cordination', 'AWOJA', 'HOUR:MINUTE', '', '', '', '', '2004-01-01', 'matovu', 1, '2016-06-28 05:23:17', 'NONE', '', '', '', '', 'Issue', 'matovu', 'SMS Officer', '', 'davimato@yahoo.com', NULL, NULL, NULL, '', 'Yes', 1, '2016-06-28'),
(148, '', NULL, '', 'wrong message adresses', 'nakatunya', 'HOUR:MINUTE', '', '', '', '', '2005-01-12', 'matovu', 1, '2016-06-28 05:27:20', 'NONE', '', '', '', '', 'Issue', 'matovu', 'SMS Officer', '', 'davimato@yahoo.com', NULL, NULL, NULL, '', 'Yes', 0, '2016-06-28'),
(149, '', NULL, '', 'violation of proceedures', 'ATIRA', 'HOUR:MINUTE', '', '', '', '', '2006-09-09', 'matovu', 1, '2016-06-28 05:31:18', 'NONE', '', '', '', '', 'Issue', 'matovu', 'SMS Officer', '', 'davimato@yahoo.com', NULL, NULL, NULL, '', 'Yes', 1, '2016-06-28'),
(150, '', NULL, '', 'FAULTY EQUIPMENT', 'ORUPE', 'HOUR:MINUTE', '', '', '', '', '2007-01-22', 'matovu', 1, '2016-06-28 05:33:58', 'NONE', '', '', '', '', 'Issue', 'matovu', 'SMS Officer', '', 'davimato@yahoo.com', NULL, NULL, NULL, '', 'Yes', 1, '2016-06-28'),
(151, '', NULL, '', 'poor communication', 'KAMUDINI', 'HOUR:MINUTE', '', '', '', '', '2008-12-18', 'matovu', 1, '2016-06-28 05:37:56', 'NONE', '', '', '', '', 'Issue', 'matovu', 'SMS Officer', '', 'davimato@yahoo.com', NULL, NULL, NULL, '', 'Yes', 1, '2016-06-28'),
(152, '', NULL, '', 'AIR MISS', 'AMUDAT', 'HOUR:MINUTE', '', '', '', '', '2012-09-21', 'matovu', 1, '2016-06-28 07:15:00', 'NONE', '', '', '', '', 'Issue', 'matovu', 'SMS Officer', '', 'davimato@yahoo.com', NULL, NULL, NULL, '', 'Yes', 0, '2016-06-28'),
(153, '', NULL, '', 'diversion', 'AGUU', 'HOUR:MINUTE', '', '', '', '', '2009-03-12', 'matovu', 1, '2016-06-28 07:17:47', 'NONE', '', '', '', '', 'Issue', 'matovu', 'SMS Officer', '', 'davimato@yahoo.com', NULL, NULL, NULL, '', 'Yes', 0, '2016-06-28'),
(154, '', NULL, '', 'asd', 'asd', '02:04', '', '', '', '', '2016-06-28', 'admin', 1, '2016-06-28 08:46:59', 'NONE', '', '', '', '', 'Issue', 'admin', 'DUTY OFFICER', '', 'info@caauganda.com', NULL, NULL, NULL, '', '', 1, '2016-06-28'),
(155, '', NULL, '', 'testxxx', 'Tower', '02:09', '', '', '', '', '2016-06-28', 'bwire', 1, '2016-06-28 11:12:13', 'NONE', '', '', '', '', 'Issue', 'bwire', 'Programmer', '+256701198000', 'bwire@programmer.net', NULL, NULL, NULL, '', '', 0, '2016-06-28'),
(156, '', NULL, '', 'delayed METARS', 'acholi ', 'HOUR:MINUTE', '', '', '', '', '2016-07-01', 'matovu', 1, '2016-07-04 07:49:16', 'NONE', '', '', '', '', 'Issue', 'matovu', 'SMS Officer', '', 'davimato@yahoo.com', NULL, NULL, NULL, '', '', 1, '2016-07-04'),
(157, '', NULL, '', 'shortage of chairs', 'aruu', 'HOUR:MINUTE', '', '', '', '', '2011-07-04', 'matovu', 1, '2016-07-04 07:50:25', 'NONE', '', '', '', '', 'Issue', 'matovu', 'SMS Officer', '', 'davimato@yahoo.com', NULL, NULL, NULL, '', '', 0, '2016-07-04'),
(158, '', NULL, '', 'unreliable localiser', 'kumi', 'HOUR:MINUTE', '', '', '', '', '2016-10-04', 'matovu', 1, '2016-07-04 07:52:28', 'NONE', '', '', '', '', 'Issue', 'matovu', 'SMS Officer', '', 'davimato@yahoo.com', NULL, NULL, NULL, '', '', 0, '2016-07-04'),
(159, '', NULL, '', 'slow internet', 'tororo', 'HOUR:MINUTE', '', '', '', '', '2016-07-28', 'matovu', 1, '2016-07-04 07:56:26', 'NONE', '', '', '', '', 'Issue', 'matovu', 'SMS Officer', '', 'davimato@yahoo.com', NULL, NULL, NULL, '', '', 1, '2016-07-04'),
(160, '', NULL, '', 'risk assesment plan', 'aboke', 'HOUR:MINUTE', '', '', '', '', '2006-07-10', 'matovu', 1, '2016-07-04 07:58:14', 'NONE', '', '', '', '', 'Issue', 'matovu', 'SMS Officer', '', 'davimato@yahoo.com', NULL, NULL, NULL, '', '', 0, '2016-07-04'),
(161, '', NULL, '', 'faulty air conditioner', 'abic', 'HOUR:MINUTE', '', '', '', '', '2014-07-05', 'matovu', 1, '2016-07-04 07:59:25', 'NONE', '', '', '', '', 'Issue', 'matovu', 'SMS Officer', '', 'davimato@yahoo.com', NULL, NULL, NULL, '', '', 0, '2016-07-04'),
(162, '', NULL, '', 'old curtains', 'adjumani', 'HOUR:MINUTE', '', '', '', '', '2006-07-24', 'matovu', 1, '2016-07-04 08:00:39', 'NONE', '', '', '', '', 'Issue', 'matovu', 'SMS Officer', '', 'davimato@yahoo.com', NULL, NULL, NULL, '', '', 1, '2016-07-04'),
(163, '', NULL, '', 'exposed cables', 'apac', 'HOUR:MINUTE', '', '', '', '', '2029-07-20', 'matovu', 1, '2016-07-04 08:01:56', 'NONE', '', '', '', '', 'Hazard', 'matovu', 'SMS Officer', '', 'davimato@yahoo.com', NULL, NULL, NULL, '', '', 1, '2016-07-04'),
(164, '', NULL, '', 'FAULTY EQUIPMENT', 'oyam', '00:07', '', '', '', '', '2017-08-04', 'matovu', 1, '2016-07-04 08:03:22', 'NONE', '', '', '', '', 'Hazard', 'matovu', 'SMS Officer', '', 'davimato@yahoo.com', NULL, NULL, NULL, '', '', 1, '2016-07-04'),
(165, '', NULL, '', 'INCORRECT INFORMATION', 'LENDU', 'HOUR:MINUTE', '', '', '', '', '2002-07-30', 'matovu', 1, '2016-07-04 08:05:36', 'NONE', '', '', '', '', 'Hazard', 'matovu', 'SMS Officer', '', 'davimato@yahoo.com', NULL, NULL, NULL, '', '', 0, '2016-07-04'),
(166, '', NULL, '', 'FAULTY TELEPHONES', 'YUMBE', 'HOUR:MINUTE', '', '', '', '', '2010-06-20', 'matovu', 1, '2016-07-04 08:08:18', 'NONE', '', '', '', '', 'Hazard', 'matovu', 'SMS Officer', '', 'davimato@yahoo.com', NULL, NULL, NULL, '', '', 0, '2016-07-04'),
(167, '', NULL, '', 'faulty door', 'kichwamba', 'HOUR:MINUTE', '', '', '', '', '2000-07-04', 'matovu', 1, '2016-07-04 08:11:26', 'NONE', '', '', '', '', 'Issue', 'matovu', 'SMS Officer', '', 'davimato@yahoo.com', NULL, NULL, NULL, '', '', 0, '2016-07-04'),
(168, '', NULL, '', 'trees obstructing', 'myanzi', '05:18', '', '', '', '', '2000-09-09', 'matovu', 1, '2016-07-04 08:17:59', 'NONE', '', '', '', '', 'Hazard', 'matovu', 'SMS Officer', '', 'davimato@yahoo.com', NULL, NULL, NULL, '', '', 1, '2016-07-04'),
(169, '', NULL, '', 'loss of radar display', 'apac', '16:03', '', '', '', '', '2006-07-10', 'matovu', 1, '2016-07-04 08:19:04', 'NONE', '', '', '', '', 'Hazard', 'matovu', 'SMS Officer', '', 'davimato@yahoo.com', NULL, NULL, NULL, '', '', 0, '2016-07-04'),
(170, '', NULL, '', 'INCORRECT INFORMATION', 'AWICH', '12:50', '', '', '', '', '2005-01-12', 'matovu', 1, '2016-07-04 08:21:05', 'NONE', '', '', '', '', 'Incident', 'matovu', 'SMS Officer', '', 'davimato@yahoo.com', NULL, NULL, NULL, '', '', 0, '2016-07-04'),
(171, '', NULL, '', 'FAULTY EQUIPMENT', 'NEBBI', 'HOUR:MINUTE', '', '', '', '', '2007-01-22', 'matovu', 1, '2016-07-04 08:22:12', 'NONE', '', '', '', '', 'Issue', 'matovu', 'SMS Officer', '', 'davimato@yahoo.com', NULL, NULL, NULL, '', '', 0, '2016-07-04'),
(172, '', NULL, '', 'snakes in tower', 'kolir', '13:13', '', '', '', '', '2002-07-30', 'matovu', 1, '2016-07-04 08:23:28', 'NONE', '', '', '', '', 'Issue', 'matovu', 'SMS Officer', '', 'davimato@yahoo.com', NULL, NULL, NULL, '', '', 0, '2016-07-04'),
(173, '', NULL, '', 'POOR PROCEEDURES', 'BUKEDEA', 'HOUR:MINUTE', '', '', '', '', '2016-07-04', 'matovu', 1, '2016-07-04 08:26:16', 'NONE', '', '', '', '', 'Incident', 'matovu', 'SMS Officer', '', 'davimato@yahoo.com', NULL, NULL, NULL, '', '', 0, '2016-07-04'),
(174, '', NULL, '', 'switching between  frequencies', 'arua', '03:00', '', '', '', '', '2001-06-06', 'matovu', 1, '2016-07-04 08:28:08', 'NONE', '', '', '', '', 'Hazard', 'matovu', 'SMS Officer', '', 'davimato@yahoo.com', NULL, NULL, NULL, '', '', 0, '2016-07-04'),
(175, '', NULL, '', 'UNSTABLE AWOS', 'LIRA', 'HOUR:MINUTE', '', '', '', '', '2002-09-12', 'matovu', 1, '2016-07-04 08:30:16', 'NONE', '', '', '', '', 'Hazard', 'matovu', 'SMS Officer', '', 'davimato@yahoo.com', NULL, NULL, NULL, '', '', 1, '2016-07-04'),
(176, '', NULL, '', 'no contact established', 'kasese', '15:06', '', '', '', '', '2018-12-12', 'matovu', 1, '2016-07-04 08:32:25', 'NONE', '', '', '', '', 'Hazard', 'matovu', 'SMS Officer', '', 'davimato@yahoo.com', NULL, NULL, NULL, '', '', 1, '2016-07-04'),
(177, '', NULL, '', 'poor cordination with kabale', 'ntugamo', '02:00', '', '', '', '', '2005-01-12', 'matovu', 1, '2016-07-04 08:35:33', 'NONE', '', '', '', '', 'Hazard', 'matovu', 'SMS Officer', '', 'davimato@yahoo.com', NULL, NULL, NULL, '', '', 1, '2016-07-04'),
(178, '', NULL, '', 'NO ATC', 'WARAGA', '09:09', '', '', '', '', '2016-07-04', 'matovu', 1, '2016-07-04 08:37:51', 'NONE', '', '', '', '', 'Hazard', 'matovu', 'SMS Officer', '', 'davimato@yahoo.com', NULL, NULL, NULL, '', '', 0, '2016-07-04'),
(179, '', NULL, '', 'FAULTY EQUIPMENT', 'MPUTA', 'HOUR:MINUTE', '', '', '', '', '2014-07-05', 'matovu', 1, '2016-07-04 08:39:50', 'NONE', '', '', '', '', 'Issue', 'matovu', 'SMS Officer', '', 'davimato@yahoo.com', NULL, NULL, NULL, '', '', 0, '2016-07-04'),
(180, '', NULL, '', 'FAULTY EQUIPMENT', 'KAMWEZI', '11:11', '', '', '', '', '2008-12-18', 'matovu', 1, '2016-07-04 08:40:50', 'NONE', '', '', '', '', 'Hazard', 'matovu', 'SMS Officer', '', 'davimato@yahoo.com', NULL, NULL, NULL, '', '', 1, '2016-07-04'),
(181, '', NULL, '', 'air miss', 'ABESO', '15:59', '', '', '', '', '2013-09-12', 'matovu', 1, '2016-07-04 08:44:59', 'NONE', '', '', '', '', 'Incident', 'matovu', 'SMS Officer', '', 'davimato@yahoo.com', NULL, NULL, NULL, '', '', 0, '2016-07-04'),
(182, '', NULL, '', 'WEAK WOODEN COVERS', 'KATAKWI', '18:04', '', '', '', '', '2016-07-28', 'matovu', 1, '2016-07-04 08:46:27', 'NONE', '', '', '', '', 'Issue', 'matovu', 'SMS Officer', '', 'davimato@yahoo.com', NULL, NULL, NULL, '', '', 0, '2016-07-04'),
(183, '', NULL, '', 'poor radios', 'gwetom', '15:00', '', '', '', '', '2011-01-23', 'matovu', 1, '2016-07-07 10:07:51', 'NONE', '', '', '', '', 'Issue', 'matovu', 'SMS Officer', '', 'davimato@yahoo.com', NULL, NULL, NULL, '', '', 1, '2016-07-07'),
(184, '', NULL, '', 'open manhole', 'aguu', 'HOUR:MINUTE', '', '', '', '', '2000-09-09', 'matovu', 1, '2016-07-07 10:09:14', 'NONE', '', '', '', '', 'Hazard', 'matovu', 'SMS Officer', '', 'davimato@yahoo.com', NULL, NULL, NULL, '', '', 1, '2016-07-07'),
(185, '', NULL, '', 'selective hearing', 'abuket', 'HOUR:MINUTE', '', '', '', '', '2012-12-12', 'matovu', 1, '2016-07-07 10:11:28', 'NONE', '', '', '', '', 'Hazard', 'matovu', 'SMS Officer', '', 'davimato@yahoo.com', NULL, NULL, NULL, '', '', 1, '2016-07-07'),
(186, '', NULL, '', 'weather values discrepancies', 'agiriaun', 'HOUR:MINUTE', '', '', '', '', '2000-05-12', 'matovu', 1, '2016-07-07 10:13:55', 'NONE', '', '', '', '', 'Hazard', 'matovu', 'SMS Officer', '', 'davimato@yahoo.com', NULL, NULL, NULL, '', '', 0, '2016-07-07'),
(187, '', NULL, '', 'no radios', 'agule', 'HOUR:MINUTE', '', '', '', '', '2021-09-01', 'matovu', 1, '2016-07-07 10:16:07', 'NONE', '', '', '', '', 'Hazard', 'matovu', 'SMS Officer', '', 'davimato@yahoo.com', NULL, NULL, NULL, '', '', 1, '2016-07-07'),
(188, '', NULL, '', 'standard phraseology', 'liera', 'HOUR:MINUTE', '', '', '', '', '2009-03-12', 'matovu', 1, '2016-07-07 10:17:25', 'NONE', '', '', '', '', 'Hazard', 'matovu', 'SMS Officer', '', 'davimato@yahoo.com', NULL, NULL, NULL, '', '', 0, '2016-07-07'),
(189, '', NULL, '', 'illegal road', 'apac', 'HOUR:MINUTE', '', '', '', '', '2002-07-30', 'matovu', 1, '2016-07-07 10:19:32', 'NONE', '', '', '', '', 'Hazard', 'matovu', 'SMS Officer', '', 'davimato@yahoo.com', NULL, NULL, NULL, '', '', 1, '2016-07-07');
INSERT INTO `incidents` (`id`, `risk_index`, `risk_index_category`, `number`, `occurrence`, `place`, `time`, `aircraft_registration`, `operator`, `departure_point`, `persons_on_board`, `date`, `reported_by`, `status`, `modified`, `category`, `brief_notes`, `recommendations`, `type_of_operation`, `person_responsible`, `main_category`, `reported_by_name`, `reported_by_department`, `reported_by_tel`, `reported_by_email`, `parent_occurrence`, `category_id`, `cause_id`, `other_cause_details`, `reported`, `reoccuring`, `date_reported`) VALUES
(190, '', NULL, '', 'poor cordination', 'loroko', 'HOUR:MINUTE', '', '', '', '', '2007-01-22', 'matovu', 1, '2016-07-07 10:20:54', 'NONE', '', '', '', '', 'Hazard', 'matovu', 'SMS Officer', '', 'davimato@yahoo.com', NULL, NULL, NULL, '', '', 1, '2016-07-07'),
(191, '', NULL, '', 'NON ADHEARANCE TO INSTRUCTIONS', 'abim', 'HOUR:MINUTE', '', '', '', '', '2011-01-23', 'matovu', 1, '2016-07-07 10:23:14', 'NONE', '', '', '', '', 'Hazard', 'matovu', 'SMS Officer', '', 'davimato@yahoo.com', NULL, NULL, NULL, '', '', 0, '2016-07-07'),
(192, '', NULL, '', 'LACK OF PROFFIENCY', 'DOKOLO', 'HOUR:MINUTE', '', '', '', '', '2004-01-01', 'matovu', 1, '2016-07-07 10:24:38', 'NONE', '', '', '', '', 'Hazard', 'matovu', 'SMS Officer', '', 'davimato@yahoo.com', NULL, NULL, NULL, '', '', 1, '2016-07-07'),
(193, '', NULL, '', 'NAV AID MORNITOR', 'MWEYA', 'HOUR:MINUTE', '', '', '', '', '2009-07-07', 'matovu', 1, '2016-07-07 10:26:49', 'NONE', '', '', '', '', 'Hazard', 'matovu', 'SMS Officer', '', 'davimato@yahoo.com', NULL, NULL, NULL, '', '', 0, '2016-07-07'),
(194, '', NULL, '', 'RNAV TRAINING', 'KAMULI', 'HOUR:MINUTE', '', '', '', '', '2016-07-07', 'matovu', 1, '2016-07-07 10:28:25', 'NONE', '', '', '', '', 'Hazard', 'matovu', 'SMS Officer', '', 'davimato@yahoo.com', NULL, NULL, NULL, '', '', 1, '2016-07-07'),
(195, '', NULL, '', 'ANNUAL LEAVE', 'SEMBABULE', 'HOUR:MINUTE', '', '', '', '', '2016-07-07', 'matovu', 1, '2016-07-07 10:29:31', 'NONE', '', '', '', '', 'Hazard', 'matovu', 'SMS Officer', '', 'davimato@yahoo.com', NULL, NULL, NULL, '', '', 0, '2016-07-07'),
(196, '', NULL, '', 'STRAY ANIMALS', 'OYAM', 'HOUR:MINUTE', '', '', '', '', '2019-07-07', 'matovu', 1, '2016-07-07 10:31:15', 'NONE', '', '', '', '', 'Hazard', 'matovu', 'SMS Officer', '', 'davimato@yahoo.com', NULL, NULL, NULL, '', '', 0, '2016-07-07'),
(197, '', NULL, '', 'INTERFEARANCE', 'OCHERO', 'HOUR:MINUTE', '', '', '', '', '2016-07-07', 'matovu', 1, '2016-07-07 10:38:22', 'NONE', '', '', '', '', 'Hazard', 'matovu', 'SMS Officer', '', 'davimato@yahoo.com', NULL, NULL, NULL, '', '', 1, '2016-07-07'),
(198, '', NULL, '', 'LACK of data', 'kabale', 'HOUR:MINUTE', '', '', '', '', '2003-09-04', 'matovu', 1, '2016-07-07 10:39:10', 'NONE', '', '', '', '', 'Hazard', 'matovu', 'SMS Officer', '', 'davimato@yahoo.com', NULL, NULL, NULL, '', '', 0, '2016-07-07'),
(199, '', NULL, '', 'SELCAL ''US''', 'CHAMULIKI', 'HOUR:MINUTE', '', '', '', '', '2002-07-30', 'matovu', 1, '2016-07-07 10:40:59', 'NONE', '', '', '', '', 'Issue', 'matovu', 'SMS Officer', '', 'davimato@yahoo.com', NULL, NULL, NULL, '', '', 1, '2016-07-07'),
(200, '', NULL, '', 'exposed duct cables', 'katakwi', 'HOUR:MINUTE', '', '', '', '', '2000-05-12', 'matovu', 1, '2016-07-07 10:42:34', 'NONE', '', '', '', '', 'Issue', 'matovu', 'SMS Officer', '', 'davimato@yahoo.com', NULL, NULL, NULL, '', '', 1, '2016-07-07'),
(201, '', NULL, '', 'children at airstrip', 'serere', 'HOUR:MINUTE', '', '', '', '', '2001-01-01', 'matovu', 1, '2016-07-07 10:43:29', 'NONE', '', '', '', '', 'Issue', 'matovu', 'SMS Officer', '', 'davimato@yahoo.com', NULL, NULL, NULL, '', '', 0, '2016-07-07'),
(202, '', NULL, '', 'too many trainees', 'abim', 'HOUR:MINUTE', '', '', '', '', '2005-01-12', 'matovu', 1, '2016-07-07 10:44:53', 'NONE', '', '', '', '', 'Hazard', 'matovu', 'SMS Officer', '', 'davimato@yahoo.com', NULL, NULL, NULL, '', '', 0, '2016-07-07'),
(203, '', NULL, '', 'bad weather', 'akorokoro', 'HOUR:MINUTE', '', '', '', '', '2016-07-07', 'matovu', 1, '2016-07-07 10:46:17', 'NONE', '', '', '', '', 'Issue', 'matovu', 'SMS Officer', '', 'davimato@yahoo.com', NULL, NULL, NULL, '', '', 1, '2016-07-07'),
(204, '', NULL, '', 'hazzardous vehicle', 'apac', 'HOUR:MINUTE', '', '', '', '', '2016-01-01', 'matovu', 1, '2016-07-07 10:47:31', 'NONE', '', '', '', '', 'Hazard', 'matovu', 'SMS Officer', '', 'davimato@yahoo.com', NULL, NULL, NULL, '', '', 1, '2016-07-07');

-- --------------------------------------------------------

--
-- Table structure for table `incident_category`
--

CREATE TABLE IF NOT EXISTS `incident_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(128) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `incident_category`
--

INSERT INTO `incident_category` (`id`, `category`, `status`) VALUES
(1, 'Missed approach', 1),
(2, 'Un stable approach', 1),
(3, 'Diversion', 1),
(4, 'Bird strike', 1),
(5, 'Delay', 1),
(6, 'Airspace violation', 1),
(7, 'Runway incursion', 1),
(8, 'Airprox', 1),
(9, 'VVIP', 1),
(10, 'Cancelation of flight', 1),
(11, 'Equipment/Navaid malfunction', 1),
(12, 'Level burst', 1),
(13, 'Emergency', 1);

-- --------------------------------------------------------

--
-- Table structure for table `incident_cause`
--

CREATE TABLE IF NOT EXISTS `incident_cause` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cause` varchar(128) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `incident_cause`
--

INSERT INTO `incident_cause` (`id`, `cause`, `status`) VALUES
(1, 'Technical', 1),
(2, 'Weather', 1),
(3, 'ATC error/violation', 1),
(4, 'Pilot error / violation', 1),
(5, 'Aircraft on runway', 1),
(6, 'Vehicle on runway', 1),
(7, 'Cause at destination', 1),
(8, 'Fuel', 1),
(9, 'Other', 1);

-- --------------------------------------------------------

--
-- Table structure for table `incident_investigation`
--

CREATE TABLE IF NOT EXISTS `incident_investigation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `level` varchar(25) NOT NULL,
  `incident_id` int(11) NOT NULL,
  `status` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `incident_investigation`
--

INSERT INTO `incident_investigation` (`id`, `level`, `incident_id`, `status`) VALUES
(1, 'brief', 85, 'Under Investigation'),
(2, 'full', 82, 'Under Investigation'),
(3, 'brief', 33, 'closed'),
(4, 'brief', 94, 'closed');

-- --------------------------------------------------------

--
-- Table structure for table `investigation_report`
--

CREATE TABLE IF NOT EXISTS `investigation_report` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(256) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `investigation_report`
--

INSERT INTO `investigation_report` (`id`, `title`, `date_created`, `user`, `status`) VALUES
(1, 'SMS Investigations Report', '2016-01-14 12:44:45', 2, 1),
(2, 'General report', '2016-01-19 06:57:19', 2, 1),
(3, 'landing without clearance', '2016-02-10 11:13:47', 2, 1),
(4, 'landing without clearance', '2016-02-10 11:13:58', 2, 1),
(5, 'Sample report', '2016-03-10 12:15:45', 2, 1),
(6, 'Go around due to runway i', '2016-06-25 10:47:06', 2, 1),
(7, 'Go around due to RWY incu', '2016-06-25 10:53:00', 2, 1),
(8, 'July', '2016-06-28 05:18:52', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `investigation_report_fields`
--

CREATE TABLE IF NOT EXISTS `investigation_report_fields` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `description` text NOT NULL,
  `report_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `investigators`
--

CREATE TABLE IF NOT EXISTS `investigators` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `incident_id` int(11) DEFAULT NULL,
  `reported_by` varchar(32) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `incident_id` (`incident_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `investigators`
--

INSERT INTO `investigators` (`id`, `name`, `modified`, `status`, `incident_id`, `reported_by`) VALUES
(1, '7', '2016-02-21 10:07:13', 1, 11, ''),
(2, '7', '2016-02-21 10:07:19', 1, 11, ''),
(3, 'Bwire Samuel', '2015-07-25 12:10:19', 1, 10, ''),
(4, 'Bwire Samuel', '2015-07-25 17:38:36', 1, 1, ''),
(5, 'Bwire Samuel', '2015-07-25 18:00:31', 1, 3, ''),
(6, 'Bwire Samuel', '2015-07-25 18:00:47', 1, 4, ''),
(7, 'Kenyangi Joy', '2015-07-25 18:01:05', 1, 5, ''),
(8, 'Bwire Samuel', '2015-07-25 18:01:24', 1, 6, ''),
(9, 'Bwire Samuel', '2015-07-25 18:01:49', 1, 7, ''),
(10, 'Bwire Samuel', '2015-07-25 18:02:07', 1, 8, ''),
(11, 'Bwire Samuel', '2015-07-25 18:02:20', 1, 9, ''),
(12, 'Kenyangi Joy', '2015-07-25 18:02:34', 1, 10, ''),
(13, 'Henry', '2015-07-27 14:41:15', 1, 13, ''),
(14, 'Bwire Samuel', '2015-08-09 13:37:19', 1, 23, ''),
(15, 'Bwire Samuel', '2015-08-10 15:10:04', 1, 39, 'admin'),
(16, 'Bwire Samuel', '2015-08-11 06:45:15', 1, 37, 'admin'),
(17, 'Bwire Samuel', '2015-08-11 16:26:36', 1, 46, 'admin'),
(18, 'Bwire Samuel', '2015-11-03 07:16:15', 1, 77, 'admin'),
(19, 'Bwire Samuel', '2015-11-08 13:21:16', 1, 40, 'admin'),
(20, 'Bwire Samuel', '2015-11-08 13:21:54', 1, 40, 'admin'),
(21, 'OC-ANS', '2016-01-20 08:44:37', 1, 98, 'admin'),
(22, '3', '2016-01-26 12:50:33', 1, 98, 'admin'),
(23, '5', '2016-01-26 12:58:32', 1, 98, 'admin'),
(24, '2', '2016-01-26 13:06:52', 1, 98, 'admin'),
(25, '2', '2016-01-26 13:07:32', 1, 98, 'admin'),
(26, '6', '2016-01-29 17:59:26', 1, 37, 'admin'),
(27, '6', '2016-01-29 18:00:47', 1, 37, 'admin'),
(28, '6', '2016-01-29 18:01:27', 1, 37, 'admin'),
(29, '6', '2016-01-29 18:02:13', 1, 37, 'admin'),
(30, '6', '2016-01-30 06:58:11', 1, 15, 'admin'),
(31, '1', '2016-02-09 07:30:38', 1, 83, 'Samuel.B'),
(32, '5', '2016-02-09 07:41:36', 1, 86, 'admin'),
(33, '7', '2016-02-21 11:06:15', 1, 108, 'admin'),
(34, '5', '2016-04-11 14:27:51', 1, 107, 'Samuel.B'),
(35, '5', '2016-06-25 05:36:18', 1, 126, 'bwire');

-- --------------------------------------------------------

--
-- Table structure for table `lessons_learnt`
--

CREATE TABLE IF NOT EXISTS `lessons_learnt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Divission` varchar(20) NOT NULL,
  `date_reported` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `category` varchar(20) NOT NULL,
  `issue_title` varchar(20) NOT NULL,
  `Description` text NOT NULL,
  `content_type` tinyint(4) DEFAULT NULL,
  `content_id` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `sent_to` varchar(128) NOT NULL,
  `cost` int(11) DEFAULT '0',
  `sub_category` varchar(256) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `content_type` (`content_type`),
  KEY `content_id` (`content_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `lessons_learnt`
--

INSERT INTO `lessons_learnt` (`id`, `Divission`, `date_reported`, `category`, `issue_title`, `Description`, `content_type`, `content_id`, `status`, `sent_to`, `cost`, `sub_category`) VALUES
(1, 'SMS', '2015-11-03 08:36:01', 'Security', 'Lossing Passwords', 'Employees keep lossing theire passwords and lesson is that we keep our respective passwords secure.', NULL, NULL, 1, '', 0, ''),
(2, 'Safety', '2015-12-16 07:40:25', 'Sms', 'Delayed delivery', 'There was a delay in delivery due to improper organization of documents', NULL, NULL, 1, '', 0, ''),
(3, 'DIVISION', '2016-06-18 19:50:21', 'CATEGORY', 'ISSUE TITLE', 'DESCRIPTION', 1, 89, 1, '', 0, ''),
(4, 'DIVISION', '2016-06-18 20:11:27', 'CATEGORY', 'ISSUE TITLE', 'DESCRIPTION', 2, 1, 1, '', 0, ''),
(5, 'DIVISION', '2016-06-18 20:20:35', 'CATEGORY', 'ISSUE TITLE', 'DESCRIPTION', 1, 1, 1, '', 0, ''),
(6, 'DIVISION', '2016-06-18 20:21:25', 'CATEGORY', 'ISSUE TITLE', 'DESCRIPTION', 3, 1, 1, '', 0, ''),
(7, 'DIVISION', '2016-06-18 20:21:55', 'CATEGORY', 'ISSUE TITLE', 'DESCRIPTION', 3, 1, 1, '', 0, ''),
(8, 'DIVISION', '2016-06-18 20:32:36', 'CATEGORY', 'ISSUE TITLE', 'DESCRIPTION', 4, 1, 1, '', 0, ''),
(9, 'DIVISION', '2016-06-21 05:57:09', 'CATEGORY', 'ISSUE TITLE', 'DESCRIPTION', 5, 2, 1, '', 0, ''),
(10, 'DIVISION', '2016-06-24 09:19:51', 'CATEGORY', 'ISSUE TITLE', 'DESCRIPTION GOES HERE', 5, 1, 1, '', 0, ''),
(11, 'DIVISION', '2016-06-25 00:02:57', 'CATEGORY', 'ISSUE TITLE', 'DESCRIPTION', 1, NULL, 1, '', 0, ''),
(12, 'DIVISION', '2016-06-25 00:40:34', 'CATEGORY', 'ISSUE TITLE', 'DESCRIPTION', NULL, NULL, 1, 'IT', 0, ''),
(13, 'DIVISION', '2016-06-25 00:41:21', 'CATEGORY', 'ISSUE TITLE', 'DESCRIPTION', NULL, NULL, 1, 'SMS', 0, ''),
(14, 'DIVISION', '2016-06-25 00:41:47', 'CATEGORY', 'ISSUE TITLE', 'DESCRIPTION', NULL, NULL, 1, 'SMS', 0, ''),
(15, 'DIVISION', '2016-06-25 00:42:47', 'CATEGORY', 'ISSUE TITLE', 'DESCRIPTION', NULL, NULL, 1, 'NONE', 0, ''),
(16, 'SMS', '2016-06-25 07:25:55', 'Aviation', 'Power Installations', 'Power Installations', 1, 122, 1, 'SMS', 0, ''),
(17, 'Airports', '2016-06-25 07:36:31', 'hazard', 'runway incursion', 'A truck from the garage should only be allowed on the manoeuvring area after inspection', 1, 11, 1, 'SMS', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `lessons_learnt_content_types`
--

CREATE TABLE IF NOT EXISTS `lessons_learnt_content_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_2` (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `lessons_learnt_content_types`
--

INSERT INTO `lessons_learnt_content_types` (`id`, `name`) VALUES
(1, 'Incident'),
(2, 'Workshop'),
(3, 'Task'),
(4, 'Risk Management'),
(5, 'Safety Audits');

-- --------------------------------------------------------

--
-- Table structure for table `likelihoods`
--

CREATE TABLE IF NOT EXISTS `likelihoods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `rationale` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `monitoring_activities`
--

CREATE TABLE IF NOT EXISTS `monitoring_activities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `monitoring_activity` varchar(256) NOT NULL,
  `frequency` varchar(128) NOT NULL,
  `duration` varchar(128) NOT NULL,
  `substitute_risk` varchar(256) NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `incident_id` int(11) DEFAULT NULL,
  `reported_by` varchar(32) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `incident_id` (`incident_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `monitoring_activities`
--

INSERT INTO `monitoring_activities` (`id`, `monitoring_activity`, `frequency`, `duration`, `substitute_risk`, `modified`, `status`, `incident_id`, `reported_by`) VALUES
(1, 'Checking unserviceability logs at ACC and CNS ', 'Daily', '', '', '2015-08-04 13:21:23', 1, 14, ''),
(2, 'Checking unserviceability logs at ACC and CNS', 'Daily', '', '', '2015-08-10 15:05:27', 1, 39, 'admin'),
(3, '3. Controller Proficiency checks\r\n', 'Atleast twice a year\r\n', '1. Until Perimeter road is usable by heavy Vehicles \r\n2. For  as long as operations are ongoing\r\n', 'Nil\r\n', '2015-10-11 12:13:20', 1, 12, 'admin'),
(4, 'Sed ut perspiciatis unde omnis iste natus', 'Daily', '2 weeks', '', '2015-11-03 07:06:00', 1, 77, 'admin'),
(5, 'Quis autem vel eum iure reprehenderit', 'Daily', '2 weeks', '', '2015-11-03 07:16:03', 1, 77, 'admin'),
(6, 'periodic telephone calls', '6 hourly', '2 weeks', 'oversleeping', '2016-02-09 07:33:57', 1, 83, 'Samuel.B'),
(7, 'At vero eos et accusamus et iusto odio', 'Daily', '', '', '2016-02-09 07:42:51', 1, 86, 'admin'),
(8, 'Quis autem vel eum iure reprehenderit', 'Daily', '', '', '2016-02-09 07:43:52', 1, 86, 'admin'),
(9, 'Licensed power personnel to conduct fre3quent monitoring', 'every 2 days', '2 months', 'death or harm', '2016-06-25 05:38:35', 1, 126, 'bwire');

-- --------------------------------------------------------

--
-- Table structure for table `nationalities`
--

CREATE TABLE IF NOT EXISTS `nationalities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `nationalities`
--

INSERT INTO `nationalities` (`id`, `name`, `status`) VALUES
(1, 'UGANDA', 1),
(2, 'KENYA', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE IF NOT EXISTS `notifications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `status` varchar(7) NOT NULL DEFAULT 'sent',
  `user` int(11) NOT NULL,
  `user_from` int(11) NOT NULL,
  `type` varchar(7) NOT NULL DEFAULT 'PRIVATE',
  `urgent` int(1) NOT NULL DEFAULT '0',
  `date_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `target_group` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user` (`user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=85 ;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `subject`, `description`, `status`, `user`, `user_from`, `type`, `urgent`, `date_created`, `target_group`) VALUES
(1, '', 'Descrption', '', 1, 2, 'PRIVATE', 0, '0000-00-00 00:00:00', NULL),
(2, '', 'smsFowarded You a document. Issue No.1', '', 1, 1, 'PRIVATE', 0, '2015-09-06 08:05:32', NULL),
(3, '', 'guestFowarded You a document. Issue No.1', 'sent', 3, 4, 'PRIVATE', 0, '2015-09-06 08:06:47', NULL),
(4, '', 'Fowarded You a document. Issue No.1', 'sent', 1, 3, 'PRIVATE', 0, '2015-09-24 17:36:57', NULL),
(5, '', 'Fowarded You a document. Issue No.1', 'read', 2, 3, 'PRIVATE', 0, '2015-09-24 17:37:40', NULL),
(6, '', 'Fowarded You a document. Issue No.1', 'sent', 1, 1, 'PRIVATE', 0, '2015-09-25 03:12:22', NULL),
(7, '', 'Fowarded You a document. Issue No.1', 'sent', 1, 1, 'PRIVATE', 0, '2015-09-25 03:14:39', NULL),
(8, '', 'Fowarded You a document. Issue No.1', 'read', 2, 2, 'PRIVATE', 0, '2015-09-25 03:15:30', NULL),
(9, '', 'adminFowarded You a document. Issue No.1  <a href =''index.php?r=auditForm/print&issue_no=1''>view</a> or <a href =''index.php?r=auditForm/update&id=1''>edit</a>', 'read', 2, 1, 'PRIVATE', 0, '2015-09-26 11:05:51', NULL),
(10, '', 'admin Fowarded You a document. Issue No.1  <a href =''index.php?r=auditForm/print&issue_no=''1''>view</a> or <a href =''index.php?r=auditForm/update&id=''1''>edit</a>', 'read', 2, 2, 'PRIVATE', 0, '2015-09-26 12:17:17', NULL),
(11, '', 'admin Fowarded You a document. Audit Plan .1  <a href =''index.php?r=auditForm/print&id=''1''>view</a> or <a href =''index.php?r=auditPlan/update&id=''1''>edit</a>', 'read', 2, 1, 'PRIVATE', 0, '2015-09-26 12:38:04', NULL),
(12, '', 'xxx', 'read', 2, 1, 'PRIVATE', 0, '2002-02-02 04:00:00', NULL),
(13, '', 'Test', 'sent', 6, 2, 'PRIVATE', 0, '2016-01-12 10:41:30', NULL),
(14, '', 'Test', 'read', 2, 2, 'PRIVATE', 0, '2016-01-17 11:47:01', NULL),
(15, '', 'description', 'sent', 3, 2, 'PRIVATE', 0, '2016-01-17 12:15:35', NULL),
(16, '', 'test', 'sent', 3, 2, 'PRIVATE', 0, '2016-01-17 12:16:25', NULL),
(17, '', 'test', 'sent', 3, 2, 'GROUP', 0, '2016-01-17 12:18:03', NULL),
(18, '', 'test', 'read', 4, 2, 'PRIVATE', 0, '2016-01-17 12:22:11', NULL),
(19, '', 'Test', 'read', 2, 2, 'GROUP', 0, '2016-01-17 12:23:35', NULL),
(20, 'Test', 'Test', 'read', 2, 2, 'PRIVATE', 0, '2016-01-17 12:51:30', NULL),
(21, 'Subject', 'Description', 'read', 2, 2, 'PRIVATE', 0, '2016-01-17 12:52:06', NULL),
(22, 'Test Group ', 'Test', 'sent', 3, 2, 'GROUP', 1, '2016-01-18 14:01:30', NULL),
(23, 'Make Sure ', 'Assign Issues', 'sent', 2, 2, 'GROUP', 1, '2016-01-18 15:35:26', NULL),
(24, 'Urgent approval', 'Please work on data sheet loaded.', 'read', 5, 2, 'PRIVATE', 1, '2016-01-20 06:36:23', NULL),
(25, 'Group message', 'Test', 'sent', 2, 2, 'GROUP', 1, '2016-01-20 09:36:14', NULL),
(26, 'Assigned News Icident', 'You have Been Assigned A new Incident #98', 'read', 2, 2, 'PRIVATE', 0, '2016-01-26 13:07:32', NULL),
(27, 'Assigned New Icident', 'You have Been Assigned A new Incident #37', 'sent', 6, 2, 'PRIVATE', 0, '2016-01-29 18:02:13', NULL),
(28, 'Assigned New Icident', 'You have Been Assigned A new Incident #15', 'sent', 6, 2, 'PRIVATE', 0, '2016-01-30 06:58:11', NULL),
(29, 'Fowared Curf', 'Kraiba Semakula Fowarded You a document. Issue No.1  <a href =''index.php?r=auditForm/print&issue_no=1''>view</a> or <a href =''index.php?r=auditForm/update&id=1''>edit</a>', 'sent', 7, 2, 'PRIVATE', 0, '2016-02-09 05:32:48', NULL),
(30, 'Fowarded 115', ' form115 #2  <a href =''index.php?r=changeManagement/form115&id=2''>view</a> or <a href =''index.php?r=changeManagement/view&id=2''>edit</a>', 'sent', 7, 2, 'PRIVATE', 0, '2016-02-09 05:53:16', NULL),
(31, 'Assigned New Icident', 'You have Been Assigned A new Incident #83', 'sent', 1, 5, 'PRIVATE', 0, '2016-02-09 07:30:38', NULL),
(32, 'Assigned New Icident', 'You have Been Assigned A new Incident #86', 'sent', 5, 2, 'PRIVATE', 0, '2016-02-09 07:41:36', NULL),
(33, 'Fowared Sitrep', ' Fowarded Strep .#38', 'sent', 6, 2, 'PRIVATE', 0, '2016-02-15 09:53:51', NULL),
(34, 'Fowarded Sitrep', ' Fowarded Strep .#55', 'sent', 6, 2, 'PRIVATE', 0, '2016-02-15 12:53:12', NULL),
(35, 'Fowarded Sitrep', ' Fowarded Strep .#56', 'sent', 6, 2, 'PRIVATE', 0, '2016-02-15 12:53:13', NULL),
(36, 'Fowarded Sitrep', ' Fowarded Strep .#78', 'sent', 6, 2, 'PRIVATE', 0, '2016-02-15 12:53:13', NULL),
(37, 'Fowarded Sitrep', ' Fowarded Strep .#21', 'sent', 6, 2, 'PRIVATE', 0, '2016-02-16 08:34:49', NULL),
(38, 'Mitigation Action Remider 2days', 'Remaider to Check On Implementationsleeping', 'sent', 1, 1, 'PRIVATE', 0, '2016-02-21 10:06:00', NULL),
(39, 'Mitigation Action Remider 2days', 'Remaider to Check On Implementationsleeping', 'sent', 1, 1, 'PRIVATE', 0, '2016-02-21 10:06:08', NULL),
(40, 'Mitigation Action Remider 2days', 'Remaider to Check On ImplementationTile the floor', 'sent', 7, 1, 'PRIVATE', 0, '2016-02-21 10:07:27', NULL),
(41, 'Mitigation Action Remider 2days', 'Remaider to Check On ImplementationTile the floor', 'sent', 7, 1, 'PRIVATE', 0, '2016-02-21 10:07:27', NULL),
(42, 'Mitigation Action Remider 2days', 'Remaider to Check On Implementationsleeping', 'sent', 1, 1, 'PRIVATE', 0, '2016-02-21 10:07:27', NULL),
(43, 'Mitigation Action Remider Today', 'Remaider to Check On ImplementationStop using trolleys', 'sent', 7, 1, 'PRIVATE', 1, '2016-02-21 10:07:28', NULL),
(44, 'Mitigation Action Remider Today', 'Remaider to Check On ImplementationStop using trolleys', 'sent', 7, 1, 'PRIVATE', 1, '2016-02-21 10:07:28', NULL),
(45, 'Mitigation Action Remider 2days', 'Remaider to Check On ImplementationTile the floor', 'sent', 7, 1, 'PRIVATE', 0, '2016-02-21 10:14:30', NULL),
(46, 'Mitigation Action Remider 2days', 'Remaider to Check On ImplementationTile the floor', 'sent', 7, 1, 'PRIVATE', 0, '2016-02-21 10:14:30', NULL),
(47, 'Mitigation Action Remider 2days', 'Remaider to Check On Implementationsleeping', 'sent', 1, 1, 'PRIVATE', 0, '2016-02-21 10:14:30', NULL),
(48, 'Mitigation Action Remider 2days', 'Remaider to Check On ImplementationTile the floor', 'sent', 7, 1, 'PRIVATE', 0, '2016-02-21 10:14:33', NULL),
(49, 'Mitigation Action Remider 2days', 'Remaider to Check On ImplementationTile the floor', 'sent', 7, 1, 'PRIVATE', 0, '2016-02-21 10:14:36', NULL),
(50, 'Mitigation Action Remider 2days', 'Remaider to Check On Implementationsleeping', 'sent', 1, 1, 'PRIVATE', 0, '2016-02-21 10:14:37', NULL),
(51, 'Mitigation Action Remider 2days', 'Remaider to Check On ImplementationTile the floor', 'sent', 7, 1, 'PRIVATE', 0, '2016-02-21 10:17:37', NULL),
(52, 'Mitigation Action Remider 2days', 'Remaider to Check On ImplementationTile the floor', 'sent', 7, 1, 'PRIVATE', 0, '2016-02-21 10:17:37', NULL),
(53, 'Mitigation Action Remider Today', 'Remaider to do autdit in today', 'sent', 4, 1, 'PRIVATE', 1, '2016-02-21 10:56:39', NULL),
(54, 'Mitigation Action Remider Today', 'Remaider to do autdit in today', 'sent', 3, 1, 'PRIVATE', 1, '2016-02-21 10:56:39', NULL),
(55, 'Mitigation Action Remider Today', 'Remaider to do autdit in today', 'sent', 4, 1, 'PRIVATE', 1, '2016-02-21 10:56:43', NULL),
(56, 'Mitigation Action Remider Today', 'Remaider to do autdit in today', 'sent', 3, 1, 'PRIVATE', 1, '2016-02-21 10:56:43', NULL),
(57, 'Mitigation Action Remider Today', 'Remaider to do autdit in today', 'sent', 4, 1, 'PRIVATE', 1, '2016-02-21 10:58:09', NULL),
(58, 'Mitigation Action Remider Today', 'Remaider to do autdit in today', 'sent', 3, 1, 'PRIVATE', 1, '2016-02-21 10:58:10', NULL),
(59, 'Mitigation Action Remider Today', 'Remaider to do autdit in today', 'sent', 4, 1, 'PRIVATE', 1, '2016-02-21 11:00:29', NULL),
(60, 'Mitigation Action Remider Today', 'Remaider to do autdit in today', 'sent', 7, 1, 'PRIVATE', 1, '2016-02-21 11:00:29', NULL),
(61, 'Audit Remider 2 days', 'Remaider to do autdit in two days', 'sent', 7, 1, 'PRIVATE', 0, '2016-02-21 11:05:01', NULL),
(62, 'URGENT!! Audit Remider Today ', 'Remaider to do autdit in today', 'sent', 4, 1, 'PRIVATE', 1, '2016-02-21 11:05:03', NULL),
(63, 'URGENT!! Audit Remider Today ', 'Remaider to do autdit in today', 'sent', 7, 1, 'PRIVATE', 1, '2016-02-21 11:05:03', NULL),
(64, 'URGENT!! Audit Remider Today ', 'Remaider to do autdit in today', 'sent', 7, 1, 'PRIVATE', 1, '2016-02-21 11:05:03', NULL),
(65, 'Assigned New Icident', 'You have Been Assigned A new Incident #108', 'sent', 7, 2, 'PRIVATE', 0, '2016-02-21 11:06:15', NULL),
(66, 'Audit Remider 2 days', 'Remaider to do autdit in two days', 'sent', 7, 1, 'PRIVATE', 0, '2016-02-21 11:10:01', NULL),
(67, 'URGENT!! Audit Remider Today ', 'Remaider to do autdit in today', 'sent', 4, 1, 'PRIVATE', 1, '2016-02-21 11:10:02', NULL),
(68, 'URGENT!! Audit Remider Today ', 'Remaider to do autdit in today', 'sent', 7, 1, 'PRIVATE', 1, '2016-02-21 11:10:02', NULL),
(69, 'URGENT!! Audit Remider Today ', 'Remaider to do autdit in today', 'sent', 7, 1, 'PRIVATE', 1, '2016-02-21 11:10:03', NULL),
(70, 'URGENT!! Mitigation Action Remider Today', 'Remaider to Check On Implementationtesr', 'sent', 7, 1, 'PRIVATE', 1, '2016-02-21 11:19:18', NULL),
(71, 'URGENT!! Mitigation Action Remider Today', 'Remaider to Check On ImplementationTESR', 'sent', 7, 1, 'PRIVATE', 1, '2016-02-21 11:21:14', NULL),
(72, 'URGENT!! Mitigation Action Remider Today', 'Remaider to Check On ImplementationTESTRD', 'sent', 7, 1, 'PRIVATE', 1, '2016-02-21 11:25:01', NULL),
(73, 'URGENT!! Audit Remider Today ', 'Remaider to do autdit in today', 'sent', 7, 1, 'PRIVATE', 1, '2016-02-23 04:00:02', NULL),
(74, 'URGENT!! Mitigation Action Remider Today', 'Remaider to Check On ImplementationTile the floor', 'sent', 7, 1, 'PRIVATE', 1, '2016-02-23 04:00:02', NULL),
(75, 'URGENT!! Mitigation Action Remider Today', 'Remaider to Check On ImplementationTile the floor', 'sent', 7, 1, 'PRIVATE', 1, '2016-02-23 04:00:04', NULL),
(76, 'URGENT!! Mitigation Action Remider Today', 'Remaider to Check On Implementationsleeping', 'sent', 1, 1, 'PRIVATE', 1, '2016-02-23 04:00:04', NULL),
(77, 'Assigned New Icident', 'You have Been Assigned A new Incident #107', 'sent', 5, 5, 'PRIVATE', 0, '2016-04-11 14:27:51', NULL),
(78, 'Fowarded 115', ' form115 #4  <a href =''index.php?r=changeManagement/form115&id=4''>view</a> or <a href =''index.php?r=changeManagement/view&id=4''>edit</a>', 'sent', 4, 2, 'PRIVATE', 0, '2016-05-26 10:56:06', NULL),
(79, 'Fowarded 115', ' form115 #3  <a href =''index.php?r=changeManagement/form115&id=3''>view</a> or <a href =''index.php?r=changeManagement/view&id=3''>edit</a>', 'sent', 1, 2, 'PRIVATE', 0, '2016-05-26 10:56:18', NULL),
(80, 'Fowarded 115', ' form115 #3  <a href =''index.php?r=changeManagement/form115&id=3''>view</a> or <a href =''index.php?r=changeManagement/view&id=3''>edit</a>', 'sent', 4, 2, 'PRIVATE', 0, '2016-05-26 11:28:40', NULL),
(81, 'SUBJECT', 'DESCRIPTION', 'read', 2, 2, 'PRIVATE', 1, '2016-06-20 00:18:32', NULL),
(82, 'There is some new information that needs your atte', 'This is new information coming in from my desk. Please check it and confirm that it is correct.', 'read', 2, 2, 'PRIVATE', 1, '2016-06-20 00:30:31', NULL),
(83, 'SUBJECT', 'Description', 'sent', 2, 2, 'GROUP', 1, '2016-06-20 00:41:50', NULL),
(84, 'Assigned New Icident', 'You have Been Assigned A new Incident #126', 'sent', 5, 5, 'PRIVATE', 0, '2016-06-25 05:36:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `operators`
--

CREATE TABLE IF NOT EXISTS `operators` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `operators`
--

INSERT INTO `operators` (`id`, `name`, `status`) VALUES
(1, 'OPERATOR A', 1),
(2, 'OPERATOR B', 1);

-- --------------------------------------------------------

--
-- Table structure for table `owners`
--

CREATE TABLE IF NOT EXISTS `owners` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `owners`
--

INSERT INTO `owners` (`id`, `name`, `status`) VALUES
(1, 'OWNER A', 1),
(2, 'OWNER B', 1);

-- --------------------------------------------------------

--
-- Table structure for table `performance_targets`
--

CREATE TABLE IF NOT EXISTS `performance_targets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `details` varchar(256) NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `incident_id` int(11) DEFAULT NULL,
  `reported_by` varchar(32) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `incident_id` (`incident_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `performance_targets`
--

INSERT INTO `performance_targets` (`id`, `details`, `modified`, `status`, `incident_id`, `reported_by`) VALUES
(1, 'At least 98% availability od Direct speech communication withy Kinshasa', '2015-08-04 13:03:08', 1, 14, ''),
(2, 'At least 98% availability od Direct speech communication withy Kinshasa', '2015-08-10 15:02:49', 1, 39, 'admin'),
(3, 'Full scale performance in one months time', '2015-08-11 06:41:06', 1, 37, 'admin'),
(4, 'aaaaaaaa1', '2015-11-03 07:04:39', 1, 77, 'admin'),
(5, 'Clear view of movement areas from tower ', '2016-01-20 08:43:37', 1, 98, 'admin'),
(6, 'n/a', '2016-02-09 07:41:53', 1, 86, 'admin'),
(7, 'na/a', '2016-02-09 08:16:43', 1, 83, 'admin'),
(8, 'Clear view of movement areas from tower', '2016-06-18 23:21:43', 1, 89, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `places`
--

CREATE TABLE IF NOT EXISTS `places` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `places`
--

INSERT INTO `places` (`id`, `name`, `status`) VALUES
(1, 'Approach', 1),
(2, 'Area Control Center', 1),
(3, 'Tower', 1);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `post_ID` int(11) NOT NULL AUTO_INCREMENT,
  `post_title` varchar(255) DEFAULT NULL,
  `post_content` text,
  `category_id` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`post_ID`),
  KEY `FK_post_cat` (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_ID`, `post_title`, `post_content`, `category_id`, `date`) VALUES
(1, 'How to create a blog in Yii', 'If you put these things together a drop down list will be drawn. And if you want to group items in it by specified column, it is very easy. Let’s say you have a table of countries and table of continents. Each country belongs to 1 continent = you have relation 1:N from continent to countries and back. In your drop down list you want to see all the countries. But not mixed together. You want them to be grouped by continents like on the picture above.', 1, '2014-07-29 14:26:53'),
(2, 'Post title', 'Some content goes here.', 1, '2014-12-05 12:06:30');

-- --------------------------------------------------------

--
-- Table structure for table `questionnaire`
--

CREATE TABLE IF NOT EXISTS `questionnaire` (
  `questionnaire_id` int(11) NOT NULL AUTO_INCREMENT,
  `submitted_by` varchar(200) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `title` varchar(256) NOT NULL,
  `form_status` varchar(32) NOT NULL DEFAULT 'NEW',
  PRIMARY KEY (`questionnaire_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `questionnaire`
--

INSERT INTO `questionnaire` (`questionnaire_id`, `submitted_by`, `date_created`, `status`, `title`, `form_status`) VALUES
(1, '2', '2015-11-01 07:27:52', 1, '', 'NEW'),
(2, '2', '2015-11-01 07:29:30', 1, '', 'NEW'),
(3, '2', '2015-11-01 07:30:14', 1, '', 'NEW'),
(4, '2', '2015-11-01 07:31:18', 1, '', 'NEW'),
(5, '2', '2015-11-01 07:32:37', 1, '', 'NEW'),
(6, '2', '2015-11-01 11:16:41', 1, '', 'NEW'),
(7, 'Rogers', '2015-11-03 13:24:21', 1, '', 'NEW'),
(8, 'Yh', '2015-11-08 13:32:04', 1, '', 'NEW'),
(9, 'Kraiba', '2016-01-19 06:41:38', 1, '', 'NEW'),
(10, '2', '2016-01-20 04:34:40', 1, '', 'NEW'),
(11, '2', '2016-01-29 15:08:19', 1, '', 'NEW'),
(12, 'Kraiba', '2016-01-29 15:15:37', 1, '', 'NEW'),
(13, '2', '2016-01-29 15:15:52', 1, '', 'NEW'),
(14, '2', '2016-02-09 12:33:07', 1, '', 'NEW'),
(15, 'admin', '2016-05-19 09:33:06', 1, '', 'NEW'),
(16, '2', '2016-05-19 09:33:19', 1, '', 'NEW'),
(17, 'Wanzunula Rogers', '2016-05-26 11:48:03', 1, '', 'NEW'),
(18, 'Wanzunula Rogers', '2016-05-26 11:49:18', 1, '', 'NEW'),
(19, 'ANDREW MWESIGE', '2016-05-26 11:49:44', 1, '', 'NEW'),
(20, 'MWESIGE', '2016-05-26 11:52:15', 1, '', 'NEW'),
(21, '2', '2016-05-26 11:52:55', 1, '', 'NEW'),
(22, '2', '2016-05-26 11:54:00', 1, '', 'NEW'),
(23, '2', '2016-05-26 11:55:51', 1, '', 'NEW'),
(24, 'Wanzunula Rogers', '2016-05-26 11:59:57', 1, '', 'NEW'),
(25, 'Matovu David', '2016-05-26 12:05:03', 1, '', 'NEW'),
(26, '2', '2016-05-26 12:05:32', 1, '', 'NEW'),
(27, 'wanzu', '2016-06-25 12:26:48', 1, '', 'NEW'),
(28, '2', '2016-06-25 12:29:38', 1, '', 'NEW'),
(29, 'e', '2016-06-25 12:32:54', 1, '', 'NEW');

-- --------------------------------------------------------

--
-- Table structure for table `questionnaire_edit_trail`
--

CREATE TABLE IF NOT EXISTS `questionnaire_edit_trail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `questionnaire_id` int(11) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `action` varchar(256) NOT NULL,
  `user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `questionnaire_questions`
--

CREATE TABLE IF NOT EXISTS `questionnaire_questions` (
  `question_id` int(11) NOT NULL AUTO_INCREMENT,
  `question` text NOT NULL,
  `section` varchar(200) NOT NULL,
  `level1` text COMMENT 'Level 1 (most desirable)',
  `level2` text COMMENT 'Level 2 (average)',
  `level3` text COMMENT 'Level 3 (least desirable)',
  `question_no` varchar(200) NOT NULL,
  PRIMARY KEY (`question_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=72 ;

--
-- Dumping data for table `questionnaire_questions`
--

INSERT INTO `questionnaire_questions` (`question_id`, `question`, `section`, `level1`, `level2`, `level3`, `question_no`) VALUES
(1, 'Is there a safety policy in place?\r\n[ 5.3.7 to 5.3.15; 5.5.3]', '1', 'Final accountability for safety and\r\nquality matters clearly addressed in\r\nthe accountable manager’s TOR.', 'Accountable manager’s TOR have\r\nnegligible or indistinct mention of\r\nsafety/quality functions', 'Safety/quality functions non-existent\r\nin accountable manager’s TOR', '1.1-1'),
(2, 'Does the safety policy reflect senior management’s commitment\r\nregarding safety management?\r\n[5.3.7 to 5.3.15]', '2.1', 'TBD', 'TBD', 'TBD', '1.1-2'),
(3, 'Is the safety policy appropriate to the size, nature and complexity\r\nof the organization?\r\n[5.3.7 to 5.3.15]', '2.1', 'Less than 8 years', '8 to less than 12 years', 'More than 12 years', '1.1-3'),
(4, 'Is the safety policy relevant to aviation safety?\r\n[5.3.7 to 5.3.15]', '2.1', '', 'HIRA programme in place. Completion\r\nor review of 1 to 3 risk assessment\r\nprojects (per 100 operational\r\nemployees) within the last 12 months', 'No active HIRA programme in place', '1.1-4'),
(5, 'Is the safety policy signed by the accountable executive?\r\n[5.3.7 to 5.3.15; 5.5.3]', '2.1', 'TBD', 'TBD', 'TBD', '1.1-5'),
(6, 'Is the safety policy communicated, with visible endorsement,\r\nthroughout the [Organization]?\r\n[5.5.3]', '2.1', '1: less than 15', '1:15 to 20', '1: more than 20', '1.1-6'),
(7, 'Has [Organization] identified an accountable executive who,\r\nirrespective of other functions, shall have ultimate responsibility\r\nand accountability, on behalf of the [Organization], for the\r\nimplementation and maintenance of the SMS?\r\n[5.3.16 to 5.3.26; 5.5.2]', '2.1', 'TBD', 'TBD', 'TBD', '1.2-1'),
(8, 'Does the accountable executive have full control of the financial\r\nand human resources required for the operations authorized to\r\nbe conducted under the operations certificate?\r\n[5.3.16 to 5.3.26]', '1', 'TBD', 'TBD', 'TBD', '1.2-2'),
(9, 'Does the Accountable Executive have final authority over all\r\naviation activities of his organization?\r\n[5.3.16 to 5.3.26]', '1', 'TBD', 'TBD', 'TBD', '1.2-3'),
(10, 'Has [Organization] identified and documented the safety\r\naccountabilities of management as well as operational personnel,\r\nwith respect to the SMS?\r\n[5.3.16 to 5.3.26]', '1', 'More than 10 years', '5 to 10 years', 'Less than 5 years', '1.2-4'),
(11, 'Is there a safety committee or review board for the purpose of\r\nreviewing SMS and safety performance?\r\n[5.3.27 to 5.3.33; Appendix 4]', '2.2', '1 OR NILL', '2', '3 or more', '1.2-5'),
(12, 'Is the safety committee chaired by the accountable executive or\r\nby an appropriately assigned deputy, duly substantiated in the\r\nSMS manual?\r\n[5.3.27 to 5.3.33; Appendix 4]', '1', 'Has more than 3 years of aviation\r\nexperience and aviation technical\r\nqualifications', 'Has more than 3 years of aviation\r\nexperience or technical qualifications', 'Has less than 3 years of aviation\r\nexperience and no technical\r\nqualification', '1.2-6'),
(13, 'Does the safety committee include relevant operational or\r\ndepartmental heads as applicable?\r\n[5.3.27 to 5.3.33; Appendix 4]', '2.2', 'Has more than 15 years of civil\r\naviation safety/quality experience and\r\naviation technical qualifications', 'Has more than 5 years of civil aviation\r\nsafety/quality experience and aviation\r\ntechnical qualifications', 'Has less than 5 years of civil aviation\r\nsafety/quality experience or no\r\naviation technical qualification', '1.2-7'),
(14, 'Are there safety action groups that work in conjunction with the\r\nsafety committee (especially for large/complex organizations)?\r\n[5.3.27 to 5.3.33; Appendix 4]', '1', NULL, NULL, NULL, '1.2-8'),
(15, 'Has [Organization] appointed a qualified person to manage and\r\noversee the day-to-day operation of the SMS?\r\n[5.3.27 to 5.3.33; 5.5.2; Appendix 2]', '', NULL, NULL, NULL, '1.3-1'),
(16, 'Does the qualified person have direct access or reporting to the\r\naccountable executive concerning the implementation and\r\noperation of the SMS?\r\n[5.3.27 to 5.3.33; 5.5.2; Appendix 2, 6.1]', '', NULL, NULL, NULL, '1.3-2'),
(17, 'Does the manager responsible for administering the SMS hold\r\nother responsibilities that may conflict or impair his role as SMS\r\nmanager?\r\n[Appendix 2, 6.4]', '', NULL, NULL, NULL, '1.3-3'),
(18, 'Is the SMS manager’s position a senior management position not\r\nlower than or subservient to other operational or production\r\npositions?\r\n[Appendix 2, 6.4]', '', NULL, NULL, NULL, '1.3-4'),
(19, 'Does [Organization] have an emergency response/contingency\r\nplan appropriate to the size, nature and complexity of the\r\norganization?\r\n[Appendix 3]', '', NULL, NULL, NULL, '1.4-1'),
(20, 'Does the emergency/contingency plan address all possible or\r\nlikely emergency/crisis scenarios relating to the organization’s\r\naviation product or service deliveries?\r\n[Appendix 3, 4 f)]', '', NULL, NULL, NULL, '1.4-2'),
(21, 'Does the ERP include procedures for the continuing safe\r\nproduction, delivery or support of its aviation products or services\r\nduring such emergencies or contingencies?\r\n[Appendix 3, 4 e)]', '', NULL, NULL, NULL, '1.4-3'),
(22, 'Is there a plan and record for drills or exercises with respect to\r\nthe ERP?\r\n[Appendix 3, 5 c)]', '', NULL, NULL, NULL, '1.4-4'),
(23, 'Does the ERP address the necessary coordination of its\r\nemergency response/contingency procedures with the\r\nemergency/response contingency procedures of other\r\norganizations where applicable?\r\n[Appendix 3, 4 d)]', '', NULL, NULL, NULL, '1.4-5'),
(24, 'Does [Organization] have a process to distribute and\r\ncommunicate the ERP to all relevant personnel, including\r\nrelevant external organizations?\r\n[Appendix 3, 5 d)]', '', NULL, NULL, NULL, '1.4-7'),
(25, 'Is there a procedure for periodic review of the ERP to ensure its\r\ncontinuing relevance and effectiveness?\r\n[Appendix 3, 5 f)]', '', NULL, NULL, NULL, '1.4-7'),
(26, 'Is there a top-level SMS summary or exposition document which\r\nis approved by the accountable manager and accepted by the\r\nCAA?\r\n[5.3.36 to 5.3.38]', '', NULL, NULL, NULL, '1.5-1'),
(27, 'Does the SMS documentation address the organization’s SMS\r\nand its associated components and elements?\r\n[5.3.36 to 5.3.38; 5.4.1; Appendix 4]', '', NULL, NULL, NULL, '1.5-2'),
(28, 'Is [Organization] SMS framework in alignment with the regulatory\r\nSMS framework?\r\n[5.3.36 to 5.3.38; 5.4.1; Appendix 4]', '', NULL, NULL, NULL, '1.5-3'),
(29, 'Does [Organization] maintain a record of relevant supporting\r\ndocumentation pertinent to the implementation and operation of\r\nthe SMS?\r\n[5.3.36 to 5.3.38; 5.5.5]', '', NULL, NULL, NULL, '1.5-4'),
(30, 'Does [Organization] have an SMS implementation plan to\r\nestablish its SMS implementation process, including specific\r\ntasks and their relevant implementation milestones?\r\n[5.4.4]', '', NULL, NULL, NULL, '1.5-5'),
(31, 'Does the SMS implementation plan address the coordination\r\nbetween the service provider’s SMS and the SMS of external\r\norganizations where applicable?\r\n[5.4.4]', '', NULL, NULL, NULL, '1.5-6'),
(32, 'Is the SMS implementation plan endorsed by the accountable\r\nexecutive?\r\n[5.4.4; 5.5.2]', '', NULL, NULL, NULL, '1.5-7'),
(33, 'Is there a process for voluntary hazards/threats reporting by all\r\nemployees?\r\n[5.3.42 to 5.3.52; 5.5.4]', '', NULL, NULL, NULL, '2.1-1'),
(34, 'Is the voluntary hazard/threats reporting simple, available to all\r\npersonnel involved in safety-related duties and commensurate\r\nwith the size of the service provider?\r\n[5.3.42 to 5.3.52]', '', NULL, NULL, NULL, '2.1-2'),
(35, 'Does [Organization] SDCPS include procedures for\r\nincident/accident reporting by operational or production\r\npersonnel?\r\n[5.3.42 to 5.3.52; 5.5.4; Chapter 4, Appendix 3]', '', NULL, NULL, NULL, '2.1-3'),
(36, 'Is incident/accident reporting simple, accessible to all personnel\r\ninvolved in safety-related duties and commensurate with the size\r\nof the service provider?\r\n[5.3.42 to 5.3.52; 5.5.4]', '', NULL, NULL, NULL, '2.1-4'),
(37, 'Does [Organization] have procedures for investigation of all\r\nreported incident/accidents?\r\n[5.3.42 to 5.3.52; 5.5.4]', '', NULL, NULL, NULL, '2.1-5'),
(38, 'Are there procedures to ensure that hazards/threats identified or\r\nuncovered during incident/accident investigation processes are\r\nappropriately accounted for and integrated into the organization’s\r\nhazard collection and risk mitigation procedure?\r\n[2.13.9; 5.3.50 f); 5.5.5]', '', NULL, NULL, NULL, '2.1-6'),
(39, 'Are there procedures to review hazards/threats from relevant\r\nindustry reports for follow-up actions or risk evaluation where\r\napplicable?\r\n[5.3.5.1]', '', NULL, NULL, NULL, '2.1-7'),
(40, 'Is there a documented hazard identification and risk mitigation\r\n(HIRM) procedure involving the use of objective risk analysis\r\ntools?\r\n[2.13; 2.14; 5.3.53 to 5.3.61', '', NULL, NULL, NULL, '2.2-1'),
(41, 'Is the risk assessment reports approved by departmental\r\nmanagers or at a higher level where appropriate?\r\n[2.15.5; 5.3.53 to 5.3.61]', '', NULL, NULL, NULL, '2.2-2'),
(42, 'Is there a procedure for periodic review of existing risk mitigation\r\nrecords?\r\n[5.5.4]', '', NULL, NULL, NULL, '2.2-3'),
(43, 'Is there a procedure to account for mitigation actions whenever\r\nunacceptable risk levels are identified?\r\n[5.5.4]', '', NULL, NULL, NULL, '2.2-4'),
(44, 'Is there a procedure to prioritize identified hazards for risk\r\nmitigation actions?\r\n[5.5.4]', '', NULL, NULL, NULL, '2.2-5'),
(45, 'Is there a programme for systematic and progressive review of all\r\naviation safety-related operations, processes, facilities and\r\nequipment subject to the HIRM process as identified by the\r\norganization?\r\n[5.5.4]', '', NULL, NULL, NULL, '2.2-6'),
(46, 'Are there identified safety performance indicators for measuring\r\nand monitoring the safety performance of the organizations\r\naviation activities?\r\n[5.3.66 to 5.3.73 5.4.5 5.5.4 5.5.5 Appendix 6]', '', NULL, NULL, NULL, '3.1-1'),
(47, 'Are the safety performance indicators relevant to the\r\norganizations safety policy as well as managements high-level\r\nsafety objectives or goals?\r\n[5.3.66 to 5.3.73 5.4.5 Appendix 6]', '', NULL, NULL, NULL, '3.1-2'),
(48, 'Do the safety performance indicators include alert or target settings\r\nto define unacceptable performance regions and planned\r\nimprovement goals?\r\n[5.3.66 to 5.3.73 5.4.5 5.5.4 5.5.5 Appendix 6]', '', NULL, NULL, NULL, '3.1-3'),
(49, 'Is the setting of alert levels or out-of-control criteria based on\r\nobjective safety metrics principles?\r\n[5.3.66 to 5.3.73 5.4.5 Appendix 6]', '', NULL, NULL, NULL, '3.1-4'),
(50, 'Do the safety performance indicators include quantitative\r\nmonitoring of high-consequence safety outcomes (e.g. accident\r\nand serious incident rates) as well as lower-consequence events\r\ne.g. rate of non-compliance, deviations?\r\n[5.3.66 to 5.3.73 5.4.5 5.5.4 5.5.5 Appendix 6]', '', NULL, NULL, NULL, '3.1-5'),
(51, 'Are safety performance indicators and their associated\r\nperformance settings developed in consultation with, and subject\r\nto, the civil aviation authoritys agreement?\r\n[5.3.66 to 5.3.73 5.4.5.2 5.5.4 5.5.5]', '', NULL, NULL, NULL, '3.1-6'),
(52, 'Is there a procedure for corrective or follow-up action to be taken\r\nwhen targets are not achieved and alert levels are exceeded or \r\nbreached?\r\n[5.4.5 Appendix 6, Table 5-A6-5 b)]', '', NULL, NULL, NULL, '3.1-7'),
(53, 'Are the safety performance indicators periodically reviewed?\r\n[5.4.5 Appendix 6]', '', NULL, NULL, NULL, '3.1-8'),
(54, 'Is there a procedure for review of relevant existing aviation\r\nsafety-related facilities and equipment (including HIRM records)\r\nwhenever there are pertinent changes to those facilities or\r\nequipment?\r\n[5.3.74 to 5.3.77 5.5.4]', '', NULL, NULL, NULL, '3.2-1'),
(55, 'Is there a procedure for review of relevant existing aviation\r\nsafety-related operations and processes (including any HIRM\r\nrecords) whenever there are pertinent changes to those\r\noperations or processes?\r\n[5.3.74 to 5.3.77 5.5.4]', '', NULL, NULL, NULL, '3.2-2'),
(56, 'Is there a procedure for review of new aviation safety-related\r\noperations and processes for hazards or risks before they are\r\ncommissioned?\r\n[5.5.4]', '', NULL, NULL, NULL, '3.2-3'),
(57, 'Is there a procedure for review of relevant existing facilities,\r\nequipment, operations or processes (including HIRM records)\r\nwhenever there are pertinent changes external to the organization\r\nsuch as regulatory or industry standards, best practices or\r\ntechnology?\r\n[5.5.4]', '', NULL, NULL, NULL, '3.2-4'),
(58, 'Is there a procedure for periodic internal audit or assessment of the\r\nSMS?\r\n[5.3.78 to 5.3.82 5.5.4 5.5.5]', '', NULL, NULL, NULL, '3.3-1'),
(59, 'Is there a current internal SMS auditor assessment plan?\r\n[5.3.78 to 5.3.82 5.5.4 5.5.5]', '', NULL, NULL, NULL, '3.3-2'),
(60, 'Does the SMS audit plan include the sampling of\r\ncompleted or existing safety risk assessments?\r\n[5.5.5]', '', NULL, NULL, NULL, '3.3-3'),
(61, 'Does the SMS audit plan cover the SMS interface with\r\nsubcontractors or customers where applicable?\r\n[5.4.1 5.5.5]', '', NULL, NULL, NULL, '3.3-5'),
(62, 'Is there a process for SMS auditor assessment reports to be\r\nsubmitted or highlighted for the accountable managers attention\r\nwhere appropriate?\r\n[5.3.80 5.5.5]', '', NULL, NULL, NULL, '3.3-6'),
(63, 'Does the SMS audit plan cover the SMS interface with\r\nsubcontractors or customers where applicable?\r\n[5.4.1 5.5.5]', '', NULL, NULL, NULL, '3.3-5'),
(64, 'Is there a process for SMS auditor assessment reports to be\r\nsubmitted or highlighted for the accountable managers attention\r\nwhere appropriate?\r\n[5.3.80 5.5.5]', '', NULL, NULL, NULL, '3.3-6'),
(65, 'Is there a programme to provide SMS training or familiarization to\r\npersonnel involved in the implementation or operation of the\r\nSMS?\r\n[5.3.86 to 5.3.91 5.5.5]', '', NULL, NULL, NULL, '4.1-1'),
(66, 'Has the accountable executive undergone appropriate SMS\r\nfamiliarization, briefing or training?\r\n[5.3.86 to 5.3.91 5.5.5]', '', NULL, NULL, NULL, '4.1-2'),
(67, 'Are personnel involved in conducting risk mitigation provided with\r\nappropriate risk management training or familiarization?\r\n[5.3.86 to 5.3.91 5.5.5]', '', NULL, NULL, NULL, '4.1-3'),
(68, 'Is there evidence of organizationwide SMS education or\r\nawareness efforts?\r\n[5.3.86 to 5.3.91 5.5.5]', '', NULL, NULL, NULL, '4.1-4'),
(69, 'Does [Organization] participate in sharing safety information with\r\nrelevant external industry product and service providers or\r\norganizations, including the relevant aviation regulatory\r\norganizations?\r\n[5.3.92 5.3.93 5.5.5]', '', NULL, NULL, NULL, '4.2-1'),
(70, 'Is there evidence of a safety SMS publication, circular or\r\nchannel for communicating safety SMS matters to employees?\r\n[5.3.92 5.3.93 5.5.5]', '', NULL, NULL, NULL, '4.2-2'),
(71, 'Are [Organization] SMS manual and related guidance material\r\naccessible or disseminated to all relevant personnel?\r\n[5.3.92 5.3.93 5.5.5]', '', NULL, NULL, NULL, '4.2-3');

-- --------------------------------------------------------

--
-- Table structure for table `questionnaire_question_answers`
--

CREATE TABLE IF NOT EXISTS `questionnaire_question_answers` (
  `questionnaire_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `status_of_implementation` text NOT NULL,
  `action_required` text NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `answer` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_questionnaire_question_answers_1` (`questionnaire_id`),
  KEY `fk_questionnaire_question_answers_2` (`question_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=160 ;

--
-- Dumping data for table `questionnaire_question_answers`
--

INSERT INTO `questionnaire_question_answers` (`questionnaire_id`, `question_id`, `status_of_implementation`, `action_required`, `id`, `answer`) VALUES
(1, 3, 'no', 'djdj', 1, 'No'),
(3, 13, '', '', 2, 'Yes'),
(4, 13, '', '', 3, 'Yes'),
(5, 1, '', '', 4, 'Yes'),
(5, 2, '', '', 5, 'Yes'),
(5, 3, '', '', 6, 'No'),
(5, 4, '', '', 7, 'Yes'),
(5, 5, '', '', 8, 'Yes'),
(5, 6, '', '', 9, 'No'),
(5, 7, '', '', 10, 'Yes'),
(5, 8, '', '', 11, 'Yes'),
(5, 9, '', '', 12, 'No'),
(5, 10, '', '', 13, 'Yes'),
(5, 11, '', '', 14, 'Yes'),
(5, 12, '', '', 15, 'Yes'),
(5, 13, '', '', 16, 'Yes'),
(6, 1, '', '', 17, 'Yes'),
(6, 2, '', '', 18, 'Yes'),
(6, 3, '', '', 19, 'Yes'),
(6, 4, '', '', 20, 'Yes'),
(6, 5, '', '', 21, 'Yes'),
(6, 6, '', '', 22, 'Yes'),
(6, 7, '', '', 23, 'Yes'),
(6, 8, '', '', 24, 'Yes'),
(6, 9, '', '', 25, 'Yes'),
(6, 10, '', '', 26, 'Yes'),
(6, 11, '', '', 27, 'Yes'),
(6, 12, '', '', 28, 'Yes'),
(6, 13, '', '', 29, 'Yes'),
(10, 1, '', '', 30, 'Yes'),
(10, 2, '', '', 31, 'Yes'),
(10, 3, '', '', 32, 'Yes'),
(10, 4, '', '', 33, 'Yes'),
(10, 5, '', '', 34, 'Yes'),
(10, 6, '', '', 35, 'Yes'),
(10, 7, '', '', 36, 'Yes'),
(10, 8, '', '', 37, 'Yes'),
(10, 9, '', '', 38, 'Yes'),
(10, 10, '', '', 39, 'Yes'),
(10, 11, '', '', 40, 'Yes'),
(10, 12, '', '', 41, 'Yes'),
(10, 13, '', '', 42, 'Yes'),
(11, 1, '', '', 43, 'Level 1'),
(11, 2, '', '', 44, 'Level 1'),
(11, 3, '', '', 45, 'Level 1'),
(11, 4, '', '', 46, 'Level 1'),
(11, 5, '', '', 47, 'Level 1'),
(11, 6, '', '', 48, 'Level 1'),
(11, 7, '', '', 49, 'Level 1'),
(11, 8, '', '', 50, 'Level 1'),
(11, 9, '', '', 51, 'Level 1'),
(11, 10, '', '', 52, 'Level 1'),
(11, 11, '', '', 53, 'Level 1'),
(11, 12, '', '', 54, 'Level 1'),
(11, 13, '', '', 55, 'Level 1'),
(13, 1, '', '', 56, '1'),
(13, 2, '', '', 57, '1'),
(13, 3, '', '', 58, '1'),
(13, 4, '', '', 59, '1'),
(13, 5, '', '', 60, '1'),
(13, 6, '', '', 61, '1'),
(13, 7, '', '', 62, '1'),
(13, 8, '', '', 63, '1'),
(13, 9, '', '', 64, '1'),
(13, 10, '', '', 65, '1'),
(13, 11, '', '', 66, '1'),
(13, 12, '', '', 67, '1'),
(13, 13, '', '', 68, '1'),
(14, 1, '', '', 69, '3'),
(14, 2, '', '', 70, '3'),
(14, 3, '', '', 71, '1'),
(14, 4, '', '', 72, '1'),
(14, 5, '', '', 73, '1'),
(14, 6, '', '', 74, '1'),
(14, 7, '', '', 75, '1'),
(14, 8, '', '', 76, '1'),
(14, 9, '', '', 77, '1'),
(14, 10, '', '', 78, '1'),
(14, 11, '', '', 79, '1'),
(14, 12, '', '', 80, '2'),
(14, 13, '', '', 81, '1'),
(16, 1, '', '', 82, 'Yes'),
(16, 2, '', '', 83, 'Yes'),
(16, 3, '', '', 84, 'Yes'),
(16, 4, '', '', 85, 'Yes'),
(16, 5, '', '', 86, 'Yes'),
(16, 6, '', '', 87, 'Yes'),
(16, 7, '', '', 88, 'Yes'),
(16, 8, '', '', 89, 'Yes'),
(16, 9, '', '', 90, 'Yes'),
(16, 10, '', '', 91, 'Yes'),
(16, 11, '', '', 92, 'Yes'),
(16, 12, '', '', 93, 'Yes'),
(16, 13, '', '', 94, 'Yes'),
(21, 1, '', '', 95, 'Yes'),
(21, 2, '', '', 96, 'Yes'),
(21, 3, '', '', 97, 'Yes'),
(21, 4, '', '', 98, 'Yes'),
(21, 5, '', '', 99, 'Yes'),
(21, 6, '', '', 100, 'Yes'),
(21, 7, '', '', 101, 'Yes'),
(21, 8, '', '', 102, 'Yes'),
(21, 9, '', '', 103, 'Yes'),
(21, 10, '', '', 104, 'Yes'),
(21, 11, '', '', 105, 'Yes'),
(21, 12, '', '', 106, 'Yes'),
(21, 13, '', '', 107, 'Yes'),
(22, 1, '', '', 108, 'Yes'),
(22, 2, '', '', 109, 'Yes'),
(22, 3, '', '', 110, 'Yes'),
(22, 4, '', '', 111, 'Yes'),
(22, 5, '', '', 112, 'Yes'),
(22, 6, '', '', 113, 'Yes'),
(22, 7, '', '', 114, 'Yes'),
(22, 8, '', '', 115, 'Yes'),
(22, 9, '', '', 116, 'Yes'),
(22, 10, '', '', 117, 'Yes'),
(22, 11, '', '', 118, 'Yes'),
(22, 12, '', '', 119, 'Yes'),
(22, 13, '', '', 120, 'Yes'),
(23, 1, '', '', 121, 'Partial'),
(23, 2, '', '', 122, 'Yes'),
(23, 3, '', '', 123, 'Partial'),
(23, 4, '', '', 124, 'Yes'),
(23, 5, '', '', 125, 'No'),
(23, 6, '', '', 126, 'Yes'),
(23, 7, '', '', 127, 'Yes'),
(23, 8, '', '', 128, 'Yes'),
(23, 9, '', '', 129, 'Yes'),
(23, 10, '', '', 130, 'Yes'),
(23, 11, '', '', 131, 'Yes'),
(23, 12, '', '', 132, 'Yes'),
(23, 13, '', '', 133, 'No'),
(26, 1, '', '', 134, 'Partial'),
(26, 2, '', '', 135, 'Yes'),
(26, 3, '', '', 136, 'Yes'),
(26, 4, '', '', 137, 'Yes'),
(26, 5, '', '', 138, 'Yes'),
(26, 6, '', '', 139, 'Yes'),
(26, 7, '', '', 140, 'Yes'),
(26, 8, '', '', 141, 'Yes'),
(26, 9, '', '', 142, 'Yes'),
(26, 10, '', '', 143, 'Yes'),
(26, 11, '', '', 144, 'Yes'),
(26, 12, '', '', 145, 'Yes'),
(26, 13, '', '', 146, 'Yes'),
(28, 1, '', '', 147, 'Yes'),
(28, 2, '', '', 148, 'Yes'),
(28, 3, '', '', 149, 'No'),
(28, 4, '', '', 150, 'Yes'),
(28, 5, '', '', 151, 'Yes'),
(28, 6, '', '', 152, 'Partial'),
(28, 7, '', '', 153, 'Yes'),
(28, 8, '', '', 154, 'Yes'),
(28, 9, '', '', 155, 'Yes'),
(28, 10, '', '', 156, 'Yes'),
(28, 11, '', '', 157, 'Yes'),
(28, 12, '', '', 158, 'Yes'),
(28, 13, '', '', 159, 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `recommended_solutions`
--

CREATE TABLE IF NOT EXISTS `recommended_solutions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `details` text NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `incident_id` int(11) DEFAULT NULL,
  `reported_by` varchar(32) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `incident_id` (`incident_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `recommended_solutions`
--

INSERT INTO `recommended_solutions` (`id`, `details`, `modified`, `status`, `incident_id`, `reported_by`) VALUES
(1, 'We have made complaints to the people concerned but they all say thay are working on it. I recommend that serious consideration and efforts should be put in this matter. Let the solution be practical not theoretical.', '2015-07-25 08:38:59', 1, 11, ''),
(2, 'Let the solution be practical not theoretical.', '2015-07-25 08:38:59', 1, 11, ''),
(3, 'We are suggesting that they stop using trolleys. They should simply carry the food.', '2015-07-25 10:27:23', 1, 11, ''),
(4, 'We are suggesting that they stop using trolleys.', '2015-07-25 10:29:15', 1, 11, ''),
(5, 'Replace old floor tiles with new ones.', '2015-07-25 12:09:39', 1, 10, ''),
(6, 'Replace the air conditioner', '2015-07-25 17:34:24', 1, 1, ''),
(7, 'Repair where the a/c was located.', '2015-07-25 17:37:07', 1, 1, ''),
(8, 'Train drivers on safety', '2015-07-25 17:40:43', 1, 11, ''),
(9, 'Install a/c', '2015-07-25 17:58:03', 1, 2, ''),
(10, 'Train drivers on safety', '2015-07-27 14:39:14', 1, 13, ''),
(11, 'Contact external service provider\r\n', '2015-08-10 15:08:07', 1, 39, 'admin'),
(12, 'Replace all old equipment ', '2015-08-11 06:42:44', 1, 37, 'admin'),
(13, 'HF communication between Entebbe and Kinshasa ', '2015-10-01 09:51:20', 1, 65, 'admin'),
(14, ' direct land-line telephone ', '2015-10-01 09:52:43', 1, 65, 'admin'),
(15, 'Train drivers on safety', '2015-11-03 07:16:26', 1, 77, 'admin'),
(16, 'Train drivers on safety', '2015-11-03 07:17:02', 1, 77, 'admin'),
(17, 'Train drivers on safety', '2015-11-03 07:23:17', 1, 77, 'admin'),
(18, 'Train drivers on safety', '2015-11-03 07:26:57', 1, 77, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `remarks`
--

CREATE TABLE IF NOT EXISTS `remarks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `details` text NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `incident_id` int(11) DEFAULT NULL,
  `reported_by` varchar(32) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `incident_id` (`incident_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `remarks`
--

INSERT INTO `remarks` (`id`, `details`, `modified`, `status`, `incident_id`, `reported_by`) VALUES
(1, 'No feedback', '2015-07-25 09:12:02', 1, 11, ''),
(2, 'A private electrician has been contacted to work on the maintenance.', '2015-07-25 10:52:33', 1, 11, ''),
(3, 'Replaced.', '2015-07-25 12:10:38', 1, 10, ''),
(4, 'I recommend Paul and Henry to handle this.', '2015-07-27 14:43:06', 1, 13, ''),
(5, 'Please assign to investigator(s)', '2015-08-10 15:18:37', 1, 39, 'admin'),
(6, 'Further investigations are going on', '2015-08-11 06:47:13', 1, 37, 'admin'),
(7, 'Further investigations are going on', '2015-11-08 13:22:11', 1, 40, 'admin'),
(8, 'Further investigations are going on', '2015-11-08 13:23:00', 1, 40, 'admin'),
(9, 'Assessment conducted on 9th Feb 2016', '2016-02-09 07:34:31', 1, 83, 'Samuel.B'),
(10, 'We need genuine power installations', '2016-06-25 05:36:06', 1, 126, 'bwire'),
(11, 'remark', '2016-06-30 06:21:40', 1, 4, 'Guest');

-- --------------------------------------------------------

--
-- Table structure for table `review_dates`
--

CREATE TABLE IF NOT EXISTS `review_dates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `review_date` date NOT NULL,
  `ocurrence` int(11) NOT NULL,
  `remark` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `review_dates`
--

INSERT INTO `review_dates` (`id`, `review_date`, `ocurrence`, `remark`) VALUES
(1, '2016-02-27', 108, ''),
(2, '2016-02-29', 37, ''),
(3, '2016-06-28', 126, '');

-- --------------------------------------------------------

--
-- Table structure for table `risk_assesment_values`
--

CREATE TABLE IF NOT EXISTS `risk_assesment_values` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `value` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `risk_assesment_values`
--

INSERT INTO `risk_assesment_values` (`id`, `name`, `value`) VALUES
(1, '1A', 8),
(2, '1B', 4),
(3, '1C', 3),
(4, '1D', 2),
(5, '1E', 1),
(6, '2A', 11),
(7, '2B', 10),
(8, '2C', 9),
(9, '2D', 6),
(10, '2E', 5),
(11, '3A', 20),
(12, '3B', 14),
(13, '3C', 13),
(14, '3D', 12),
(15, '3E', 7),
(16, '4A', 22),
(17, '4B', 21),
(18, '4C', 17),
(19, '4D', 16),
(20, '4E', 15),
(21, '5A', 25),
(22, '5B', 24),
(23, '5C', 23),
(24, '5D', 19),
(25, '5E', 18);

-- --------------------------------------------------------

--
-- Table structure for table `risk_management`
--

CREATE TABLE IF NOT EXISTS `risk_management` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `serial_no` varchar(16) NOT NULL,
  `description` text NOT NULL,
  `current_risk_index` varchar(4) NOT NULL,
  `theoretical_risk_index` varchar(4) NOT NULL,
  `risk_owner` varchar(32) NOT NULL,
  `actual_risk_index` varchar(4) NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `reported_by` varchar(32) NOT NULL,
  `evaluated_by` varchar(32) NOT NULL,
  `evaluation_date` date NOT NULL,
  `approved_by` varchar(32) NOT NULL,
  `approval_date` date NOT NULL,
  `next_evaluation_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `risk_management`
--

INSERT INTO `risk_management` (`id`, `serial_no`, `description`, `current_risk_index`, `theoretical_risk_index`, `risk_owner`, `actual_risk_index`, `modified`, `status`, `reported_by`, `evaluated_by`, `evaluation_date`, `approved_by`, `approval_date`, `next_evaluation_date`) VALUES
(1, '723K ', 'Cables in server room were not properly replaced', '1E', '1B', 'admin', '', '2016-02-16 17:22:40', 1, 'admin', '', '0000-00-00', '', '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `rm_consequences`
--

CREATE TABLE IF NOT EXISTS `rm_consequences` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `details` varchar(256) NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `reported_by` varchar(32) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `risk_management_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `risk_management_id` (`risk_management_id`),
  KEY `risk_management_id_2` (`risk_management_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `rm_consequences`
--

INSERT INTO `rm_consequences` (`id`, `details`, `modified`, `reported_by`, `status`, `risk_management_id`) VALUES
(1, 'NONE', '0000-00-00 00:00:00', 'admin', 1, 1),
(2, 'Server room is inaccessible', '0000-00-00 00:00:00', 'admin', 1, 1),
(3, 'System server is offline', '0000-00-00 00:00:00', 'admin', 1, 1),
(4, 'DETAILS', '2016-06-18 20:45:58', 'admin', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `rm_current_defences`
--

CREATE TABLE IF NOT EXISTS `rm_current_defences` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `details` varchar(256) NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `reported_by` varchar(32) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `risk_management_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `risk_management_id` (`risk_management_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `rm_current_defences`
--

INSERT INTO `rm_current_defences` (`id`, `details`, `modified`, `reported_by`, `status`, `risk_management_id`) VALUES
(1, 'NONE', '0000-00-00 00:00:00', 'admin', 1, 1),
(2, 'Air conditioning system in server room was replaced', '0000-00-00 00:00:00', 'admin', 1, 1),
(3, 'All staff that use the server room have been given adequate training', '0000-00-00 00:00:00', 'admin', 1, 1),
(4, 'NONE', '2016-06-18 20:42:44', 'admin', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `rm_technical_defences`
--

CREATE TABLE IF NOT EXISTS `rm_technical_defences` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `details` varchar(256) NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `reported_by` varchar(32) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `risk_management_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `risk_management_id` (`risk_management_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `rm_technical_defences`
--

INSERT INTO `rm_technical_defences` (`id`, `details`, `modified`, `reported_by`, `status`, `risk_management_id`) VALUES
(1, 'NONE', '0000-00-00 00:00:00', 'admin', 1, 1),
(2, 'A continous training programme has been put in place for every new I.T. staff', '0000-00-00 00:00:00', 'admin', 1, 1),
(3, 'DETAILS', '2016-06-18 20:34:15', 'admin', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `safety_logs`
--

CREATE TABLE IF NOT EXISTS `safety_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `aircraft` varchar(30) NOT NULL,
  `type` varchar(20) NOT NULL,
  `registrar` varchar(20) NOT NULL,
  `operator` varchar(20) NOT NULL,
  `route` text NOT NULL,
  `event` varchar(256) NOT NULL,
  `remarks` text NOT NULL,
  `action_taken` text NOT NULL,
  `entered_into_summary` text NOT NULL,
  `cause` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `safety_logs`
--

INSERT INTO `safety_logs` (`id`, `date`, `time`, `aircraft`, `type`, `registrar`, `operator`, `route`, `event`, `remarks`, `action_taken`, `entered_into_summary`, `cause`, `category`, `user`) VALUES
(1, '0000-00-00', '12:00:00', 'PWR566', 'C30J', '5XUGA', 'MAN AIR', 'JUDG - HUEN', 'BIRD STRIKE', 'NIL', 'LOW PASS', 'BIRD STRIKE', 1, 2, 0),
(2, '0000-00-00', '12:00:00', 'MAN789', 'C30J', 'ZSSCP', 'MAN AIR', 'JUED - HWNA', 'GO AROUND', 'NIL', 'LOW PASS', 'BIRD STRIKE', 2, 7, 0),
(3, '0000-00-00', '00:00:02', 'MAN789', 'C30J', '5XUGA', 'MAN AIR', 'JUDG - HUEN', 'RETURNING', 'NIL', 'INFORMED SFC', 'BIRD STRIKE', 16, 4, 0),
(4, '0000-00-00', '00:08:30', 'GOAT469', 'C30J', '5XGOT', 'US DOD', 'HSSS - HUEN', 'BIRD STRIKE', 'NIL', 'INFORMED SFC', 'BIRD STRIKE', 8, 10, 0),
(5, '0000-00-00', '00:09:00', 'UNO786P', 'B788', 'ZSSCP', 'MONUSCO', 'EGGW - HUEN', 'RETURNING', 'DUE PRESSURIZATION', 'INFORMED ACC', 'RETURNING DUE PRESSURIZATION PROBLEM', 3, 3, 0),
(6, '0000-00-00', '00:07:50', 'MAN789', 'A332', 'AFHED', 'MAN AIR', 'JUED - HWNA', 'GO AROUND', 'LANDING GEAR PROBLEM', 'LOW PASS', 'MISSED APPROACH', 1, 3, 0),
(7, '0000-00-00', '00:04:50', 'UG001', 'GLF3', '5XUGA', 'UGANDA ', 'JUDG - HUEN', 'VVIP MOVEMENT', 'VVIP INBOUND', 'INFORMED SFC', 'VVIP ARRIVAL AT 0520', 9, 10, 0),
(8, '0000-00-00', '00:11:00', 'PWR566', 'B747', '7QWER', 'POWER AIRLINES', 'GEWS - WERC', 'CANCELATION OF FLIGH', 'TECHNICAL PROBLEM WITH ENGINE 3', 'INFORMED O''C ANS, ACC, RADAR,', 'FLIGHT CANCELLED', 10, 3, 0),
(9, '0000-00-00', '00:06:06', 'KALOLI37', 'C212', '1234', 'USDOD', 'huen-nzara', 'return to pick cargo', 'FORWARDED FOR ACTION', 'NOTIFIED RESPONSIBLE OFFICE', 'YES', 3, 10, 0),
(10, '0000-00-00', '00:06:50', '220', '899', '785', 'JJM', 'HHJ', 'TWR FREQ U/S', 'RTHT', 'FGFRH', 'BNGH', 11, 10, 0),
(11, '0000-00-00', '11:11:11', 'UNO444', 'CL78', 'HZCFX', 'UN', 'nil', 'REPORTED DEAD BIRD', 'nil', 'nil', 'nil', 8, 10, 0),
(12, '0000-00-00', '10:10:10', 'un484', 'c310', 'zjizs', 'ED AIR', 'N/A', 'return due oil leak', 'NIL', 'NIL', 'NIL', 3, 3, 0),
(13, '0000-00-00', '07:48:41', 'uno558', 'L382', 'DGRGH', 'ME AIRLINES', 'NIL', 'RETURN DUE TECH', 'NIL', 'NIL', 'NIL', 4, 3, 0),
(14, '0000-00-00', '210:00:00', 'ETH1278', 'B734', 'ETANN', 'JUNE AIR', 'NIL', 'REPORTED  BIRDSTRIKE', 'NIL', 'NIL', 'NIL', 8, 10, 0),
(15, '0000-00-00', '05:05:05', '5YACE', 'C208', 'NIL', 'NIL', 'NIL', 'RETURN DUE TECH', 'NIL', 'NIL', 'NIL', 3, 3, 0),
(16, '0000-00-00', '04:58:42', 'KALOLI88', 'B190', 'NIL', 'NOMAD', 'NIL', 'SOMEONE ACTING FUNNY', 'NIL', 'NIL', 'NIL', 17, 10, 0),
(17, '0000-00-00', '00:08:30', 'KITE267', 'C30J', 'QWERTR', 'ALLIANCE FRANCAIS', 'HUEN-HTDA', 'aborted takeoff ', 'PILOT REQUESTED TO RETURN TO CHECK FOR DAMAGE TO THE AIRCRAFT. NO DAMAGE REPORTED AND SHE WAS LATER AIRBORNE AT 0856', 'FILLED SITREP\r\nINSPECTED RUNWAY FOR BIRD REMAINS', 'YES', 8, 10, 0),
(18, '0000-00-00', '07:16:18', 'NOMAD11', 'M28', 'NIL', 'USDOD', 'HRYR-HUEN', 'REPORTED PAPI OFF', 'NIL', 'NIL', 'NIL', 11, 10, 0),
(19, '0000-00-00', '16:05:25', 'RWD424', 'CRJ1', '9XIWT', 'RWANDA AIR', 'NIL', 'REPORTED GRAS ON R17', 'NIL', 'NIL', 'NIL', 17, 10, 0),
(20, '0000-00-00', '15:24:24', '4LGSS', 'B738', 'NIL', 'UN', 'HCMM-HUEN', 'LANDED WITHOUT CLX', 'NIL', 'NIL', 'NIL', 17, 2, 0),
(21, '0000-00-00', '00:11:20', '5XUAW', 'AW1', '5XUAW', 'WHISKERS', 'HSSJ-HUEN', 'RCF', 'TRAFFIC WAS SEEN AT ABOUT 4 MILES FINAL RUNWAY 17. SHE OVERFLEW TOWER AND USING THE ALDIS LAMP SHE WAS GIVEN LANDING CLEARANCE. SHE WAS IDENTIFIED USING BINOCULARS. OPERATIONS INFORMED TOWER THAT SHE WAS FROM JUBA AND HER PORTABLE RADIO HAD FAILED. SHE LANDED SAFELY RUNWAY 30', 'LANDING CLEARANCE GIVEN USING ALDIS LAMP.\r\nSITREP FILLED ', 'NO', 11, 3, 0),
(22, '0000-00-00', '00:00:00', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'FDD U/S', 'N/A', 'N/A', 'N/A', 17, 10, 0),
(23, '0000-00-00', '13:01:40', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'TWR FREQ U/S', 'NEEDS CHECKING', 'NIL', 'NIL', 11, 10, 0),
(24, '0000-00-00', '00:12:33', 'SHJSDF', 'EW12', 'SHJSDF', 'UNKNOWN', 'HRYR -HUEN', 'VIP MOVEMENT', 'NIL', 'INFORMED SFC', 'NO', 9, 10, 0),
(25, '0000-00-00', '11:22:03', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 3, 10, 0),
(26, '0000-00-00', '03:30:30', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'AWOS U/S', 'N/A', 'NIL', 'NIL', 11, 10, 0),
(27, '0000-00-00', '14:51:20', 'KLM355', 'C182', 'HODPH', 'KAJJANSI', 'HUJI -HUEN', 'GO AROUND', 'REPORTED', 'FORWARDED', 'YES', 1, 10, 0),
(28, '0000-00-00', '19:15:15', 'AF445', 'B06', 'NIL', 'UG GOVT', 'HUEN- HUMM', 'VVIP DEPARTURE', 'NOTED', 'NIL', 'YES', 9, 10, 0),
(29, '0000-00-00', '12:15:25', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'NIL', 'YES', 17, 10, 0),
(30, '0000-00-00', '08:20:00', 'N/A', 'N/A', 'N/A', 'N/A', 'n/a', 'AWOS U/S', 'nil', 'nil', 'nil', 17, 10, 0),
(31, '0000-00-00', '03:38:20', 'BAW69', 'B77L', 'GBNNM', 'MAF', 'KJHH-HUEN', 'GO AROUND', 'NIL', 'NIL', 'NIL', 17, 10, 0),
(32, '0000-00-00', '08:14:41', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'SIREN MARINE N U/S', 'NIL', 'NIL', 'NIL', 11, 10, 0),
(33, '0000-00-00', '18:40:10', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'FADED CL R17', 'N/A', 'FORWARDED TO  OPS', 'YES', 17, 10, 0),
(34, '0000-00-00', '07:00:10', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'OPEN MANHOLE ON TWY', 'N/A', 'INFORMED OC', 'YES', 16, 10, 0),
(35, '0000-00-00', '17:58:02', '5TZYZ', 'IL76', 'NIL', 'UN', 'HUMA-HUEN', 'VVIP DEPARTURE', 'N/A', 'NOTED', 'NO', 9, 10, 0),
(36, '0000-00-00', '16:03:02', 'UN0465', 'A332', 'N/A', 'UN', 'HUEN-HSSJ', 'RETURN RWY BLOCKED ', 'NOTIFIED', 'NIL', 'NO', 3, 9, 0),
(37, '0000-00-00', '14:14:17', 'UGB441', 'C208', '9FWWW', 'RWANDA AIR', 'HAAD-HUEN', 'LIGHTS ON TWY A OFF', 'NIL', 'FORWARDED TO ELE', 'YES', 11, 10, 0),
(38, '0000-00-00', '22:24:00', 'THY112', 'B190', '5BHHL', 'TURKISH', 'HKJK-HUEN', 'NDB OFF', 'NOTED', 'REPORTED', ' YES', 11, 10, 0),
(39, '0000-00-00', '11:22:45', 'AF145', 'PC46', 'AGN840', 'LIME AIR', 'HUEN-FEFF', 'RETUIRN TO PICK PAX', 'NIL', 'NIL', 'NIL', 3, 3, 0),
(40, '0000-00-00', '18:52:30', '5TYYZ', 'B739', '5TYYZ', 'JLIE AIR', 'HTDA-HUEN', 'GO AROUND', 'NIL', 'NIL', 'NIL', 4, 10, 0);

-- --------------------------------------------------------

--
-- Table structure for table `safety_logs_categories`
--

CREATE TABLE IF NOT EXISTS `safety_logs_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `user` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `safety_logs_categories`
--

INSERT INTO `safety_logs_categories` (`id`, `name`, `user`, `date`) VALUES
(1, 'ATC error / Violation', 0, '2015-12-06 12:32:12'),
(2, 'Pilot error / Violation', 0, '2015-12-06 12:32:12'),
(3, 'Techincal', 0, '2015-12-06 13:37:50'),
(4, 'Weather', 0, '2015-12-06 13:37:50'),
(5, 'A/c on Rwy', 0, '2015-12-06 13:37:50'),
(6, 'Vehicle / Object on RWY', 0, '2015-12-06 13:37:50'),
(7, 'Fuel', 0, '2015-12-06 13:37:50'),
(8, 'Procedures', 0, '2015-12-06 13:37:50'),
(9, 'Cause at Destination', 0, '2015-12-06 13:37:50'),
(10, 'Others', 0, '2015-12-06 13:37:50');

-- --------------------------------------------------------

--
-- Table structure for table `safety_logs_causes`
--

CREATE TABLE IF NOT EXISTS `safety_logs_causes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `user` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `safety_logs_causes`
--

INSERT INTO `safety_logs_causes` (`id`, `name`, `user`, `date`) VALUES
(1, 'Missed approach', 0, '2015-12-06 12:32:38'),
(2, 'Un stable approach', 0, '2015-12-06 12:32:38'),
(3, 'Diversion', 0, '2015-12-06 13:41:18'),
(4, 'Delay', 0, '2015-12-06 13:41:18'),
(5, 'Airspace violation', 0, '2015-12-06 13:44:01'),
(6, 'Runway incursion', 0, '2015-12-06 13:44:01'),
(7, 'Airprox', 0, '2015-12-06 13:50:15'),
(8, 'Bird Strike', 0, '2015-12-06 13:50:15'),
(9, 'VVIP', 0, '2015-12-06 13:50:15'),
(10, 'Cancelation of flight', 0, '2015-12-06 13:50:15'),
(11, 'Equipment/Navaid malfunction', 0, '2015-12-06 13:50:15'),
(12, 'Emergency ', 0, '2015-12-06 13:50:15'),
(13, 'Tyre burst', 0, '2015-12-06 13:50:15'),
(14, 'Weather discrepancy reports', 0, '2015-12-06 13:50:15'),
(15, 'Airside signage', 0, '2015-12-06 13:50:15'),
(16, 'Airside surfaces', 0, '2015-12-06 13:50:15'),
(17, 'General', 0, '2015-12-06 13:50:15');

-- --------------------------------------------------------

--
-- Table structure for table `safety_occurrence_data`
--

CREATE TABLE IF NOT EXISTS `safety_occurrence_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `incident_id` int(11) DEFAULT NULL,
  `date_of_occurrence` date NOT NULL,
  `date_of_occurrence_2` date NOT NULL,
  `date_of_occurrence_3` date NOT NULL,
  `time_of_occurrence` varchar(128) NOT NULL,
  `time_of_occurrence_2` varchar(128) NOT NULL,
  `time_of_occurrence_3` varchar(128) NOT NULL,
  `shift` varchar(128) NOT NULL,
  `shift_2` varchar(128) NOT NULL,
  `shift_3` varchar(128) NOT NULL,
  `duration_of_shift` varchar(128) NOT NULL,
  `duration_of_shift_2` varchar(128) NOT NULL,
  `duration_of_shift_3` varchar(128) NOT NULL,
  `time_dc_logged_on_duty` varchar(128) NOT NULL,
  `time_dc_logged_on_duty_2` varchar(128) NOT NULL,
  `time_dc_logged_on_duty_3` varchar(128) NOT NULL,
  `time_dc_logged_off_duty` varchar(128) NOT NULL,
  `time_dc_logged_off_duty_2` varchar(128) NOT NULL,
  `time_dc_logged_off_duty_3` varchar(128) NOT NULL,
  `time_dc_reported_on_duty` varchar(128) NOT NULL,
  `time_dc_reported_on_duty_2` varchar(128) NOT NULL,
  `time_dc_reported_on_duty_3` varchar(128) NOT NULL,
  `time_dc_reported_off_duty` varchar(128) NOT NULL,
  `time_dc_reported_off_duty_2` varchar(128) NOT NULL,
  `time_dc_reported_off_duty_3` varchar(128) NOT NULL,
  `no_of_personnel_on_shift_roster` int(11) DEFAULT NULL,
  `no_of_personnel_on_shift_roster_2` int(11) DEFAULT NULL,
  `no_of_personnel_on_shift_roster_3` int(11) DEFAULT NULL,
  `no_of_personnel_on_shift_logbook` int(11) DEFAULT NULL,
  `no_of_personnel_on_shift_logbook_2` int(11) DEFAULT NULL,
  `no_of_personnel_on_shift_logbook_3` int(11) DEFAULT NULL,
  `density_of_traffic` varchar(32) NOT NULL,
  `density_of_traffic_2` varchar(32) NOT NULL,
  `density_of_traffic_3` varchar(32) NOT NULL,
  `no_of_trainees_on_shift` int(11) DEFAULT NULL,
  `no_of_trainees_on_shift_2` int(11) DEFAULT NULL,
  `no_of_trainees_on_shift_3` int(11) DEFAULT NULL,
  `traffic_handled_by_trainee` varchar(16) NOT NULL,
  `traffic_handled_by_trainee_2` varchar(16) NOT NULL,
  `traffic_handled_by_trainee_3` varchar(16) NOT NULL,
  `controller_under_medication` varchar(16) NOT NULL,
  `controller_under_medication_2` varchar(16) NOT NULL,
  `controller_under_medication_3` varchar(16) NOT NULL,
  `date_from_last_annual_leave` date NOT NULL,
  `date_from_last_annual_leave_2` date NOT NULL,
  `date_from_last_annual_leave_3` date NOT NULL,
  `last_training_attended` varchar(256) NOT NULL,
  `last_training_attended_2` varchar(256) NOT NULL,
  `last_training_attended_3` varchar(256) NOT NULL,
  `last_training_date` date NOT NULL,
  `last_training_date_2` date NOT NULL,
  `last_training_date_3` date NOT NULL,
  `last_proficiency_date` date NOT NULL,
  `last_proficiency_date_2` date NOT NULL,
  `last_proficiency_date_3` date NOT NULL,
  `weather_information` text NOT NULL,
  `aerodrome_information` text NOT NULL,
  `controllers_on_duty` text NOT NULL,
  `completed_by` varchar(256) NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `incident_id` (`incident_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `safety_occurrence_data`
--

INSERT INTO `safety_occurrence_data` (`id`, `incident_id`, `date_of_occurrence`, `date_of_occurrence_2`, `date_of_occurrence_3`, `time_of_occurrence`, `time_of_occurrence_2`, `time_of_occurrence_3`, `shift`, `shift_2`, `shift_3`, `duration_of_shift`, `duration_of_shift_2`, `duration_of_shift_3`, `time_dc_logged_on_duty`, `time_dc_logged_on_duty_2`, `time_dc_logged_on_duty_3`, `time_dc_logged_off_duty`, `time_dc_logged_off_duty_2`, `time_dc_logged_off_duty_3`, `time_dc_reported_on_duty`, `time_dc_reported_on_duty_2`, `time_dc_reported_on_duty_3`, `time_dc_reported_off_duty`, `time_dc_reported_off_duty_2`, `time_dc_reported_off_duty_3`, `no_of_personnel_on_shift_roster`, `no_of_personnel_on_shift_roster_2`, `no_of_personnel_on_shift_roster_3`, `no_of_personnel_on_shift_logbook`, `no_of_personnel_on_shift_logbook_2`, `no_of_personnel_on_shift_logbook_3`, `density_of_traffic`, `density_of_traffic_2`, `density_of_traffic_3`, `no_of_trainees_on_shift`, `no_of_trainees_on_shift_2`, `no_of_trainees_on_shift_3`, `traffic_handled_by_trainee`, `traffic_handled_by_trainee_2`, `traffic_handled_by_trainee_3`, `controller_under_medication`, `controller_under_medication_2`, `controller_under_medication_3`, `date_from_last_annual_leave`, `date_from_last_annual_leave_2`, `date_from_last_annual_leave_3`, `last_training_attended`, `last_training_attended_2`, `last_training_attended_3`, `last_training_date`, `last_training_date_2`, `last_training_date_3`, `last_proficiency_date`, `last_proficiency_date_2`, `last_proficiency_date_3`, `weather_information`, `aerodrome_information`, `controllers_on_duty`, `completed_by`, `modified`, `status`) VALUES
(1, 16, '2015-08-10', '0000-00-00', '0000-00-00', '2:30 PM', '', '', 'Day', 'Day', 'Day', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'Low', 'Low', 'Low', NULL, NULL, NULL, 'Yes', 'Yes', 'Yes', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', 'admin', '2015-08-11 13:35:28', 1),
(2, 16, '2015-08-07', '0000-00-00', '0000-00-00', '2:30 PM', '', '', 'Day', 'Day', 'Day', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'Low', 'Low', 'Low', NULL, NULL, NULL, 'Yes', 'Yes', 'Yes', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', 'admin', '2015-08-11 13:36:52', 1),
(3, 46, '2015-07-07', '0000-00-00', '0000-00-00', '2:30 PM', '', '', 'Day', 'Day', 'Day', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'Low', 'Low', 'Low', NULL, NULL, NULL, 'Yes', 'Yes', 'Yes', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', 'admin', '2015-08-14 09:16:14', 1),
(4, 46, '2015-07-07', '0000-00-00', '0000-00-00', '2:30 PM', '', '', 'Day', 'Day', 'Day', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'Low', 'Low', 'Low', NULL, NULL, NULL, 'Yes', 'Yes', 'Yes', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', 'admin', '2015-08-14 09:18:59', 1),
(5, 27, '2015-07-07', '0000-00-00', '0000-00-00', '2:30 PM', '', '', 'Day', 'Day', 'Day', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'Low', 'Low', 'Low', NULL, NULL, NULL, 'Yes', 'Yes', 'Yes', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', 'admin', '2015-08-14 11:16:18', 1),
(6, 50, '2015-01-01', '0000-00-00', '0000-00-00', '12:00 PM', '', '', 'Day', 'Day', 'Day', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'Low', 'Low', 'Low', NULL, NULL, NULL, 'Yes', 'Yes', 'Yes', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', 'admin', '2015-09-18 13:39:03', 1),
(7, 40, '0000-00-00', '0000-00-00', '0000-00-00', '2', '', '', 'Day', 'Day', 'Day', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'Low', 'Low', 'Low', NULL, NULL, NULL, 'Yes', 'Yes', 'Yes', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', 'admin', '2015-11-03 11:51:09', 1),
(8, 86, '0000-00-00', '0000-00-00', '0000-00-00', '22', '22', '2', 'Day', 'Day', 'Day', '23', '23', '23', '23', '23', '23', '2', '2', '2', '2', '2', '2', '3', '3', '3', 4, 4, 4, 4, 4, 4, 'Low', 'Low', 'Low', 4, 4, NULL, 'Yes', 'Yes', 'Yes', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '4444', '', '', 'sms', '2015-12-16 11:37:04', 1),
(9, 71, '0000-00-00', '0000-00-00', '0000-00-00', '3', '3', '3', 'Day', 'Day', 'Day', '3', '', '', '3', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'Low', 'Low', 'Low', NULL, NULL, NULL, 'Yes', 'Yes', 'Yes', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', 'sms', '2015-12-16 11:47:36', 1),
(10, 75, '0000-00-00', '0000-00-00', '0000-00-00', '22', '', '', 'Day', 'Night', 'Day', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'Low', 'Low', 'Low', NULL, NULL, NULL, 'No', 'Yes', 'Yes', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '2223', '', '', 'admin', '2016-02-09 11:57:29', 1),
(11, 75, '2015-03-12', '0000-00-00', '0000-00-00', '23:04', '', '', 'Day', 'Day', 'Day', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'Low', 'Low', 'Low', NULL, NULL, NULL, 'Yes', 'Yes', 'Yes', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', 'admin', '2016-05-19 02:20:28', 1),
(12, 75, '2015-03-12', '0000-00-00', '0000-00-00', '23:04', '', '', 'Day', 'Day', 'Day', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'Low', 'Low', 'Low', NULL, NULL, NULL, 'Yes', 'Yes', 'Yes', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', 'admin', '2016-05-19 02:27:48', 1),
(13, 75, '2015-03-12', '0000-00-00', '0000-00-00', '23:04', '', '', 'Day', 'Day', 'Day', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'Low', 'Low', 'Low', NULL, NULL, NULL, 'Yes', 'Yes', 'Yes', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', 'admin', '2016-05-19 09:31:10', 1),
(14, 89, '2015-03-12', '0000-00-00', '0000-00-00', '12:00 ', '', '', 'Day', 'Day', 'Day', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'Low', 'Low', 'Low', NULL, NULL, NULL, 'Yes', 'Yes', 'Yes', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', 'admin', '2016-06-18 21:32:52', 1);

-- --------------------------------------------------------

--
-- Table structure for table `safety_recommendations`
--

CREATE TABLE IF NOT EXISTS `safety_recommendations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `source` varchar(200) NOT NULL,
  `details` text NOT NULL,
  `causes` text NOT NULL,
  `mitigation` text NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `reported_by` varchar(32) NOT NULL,
  `remarks` text NOT NULL,
  `brief` text NOT NULL,
  `content_type` int(11) DEFAULT NULL,
  `content_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `safety_recommendations`
--

INSERT INTO `safety_recommendations` (`id`, `source`, `details`, `causes`, `mitigation`, `modified`, `status`, `reported_by`, `remarks`, `brief`, `content_type`, `content_id`) VALUES
(13, 'Hazard #77', 'Details of safety recommendations', '', '', '2016-06-24 10:20:32', 1, '2', '', 'Cut Down Trees', NULL, NULL),
(14, 'CAP 123', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'lack of proper communication', '', '2016-06-24 10:20:36', 1, '2', 'Test', 'test', NULL, NULL),
(15, 'SOURCE', 'DETAILS', 'CAUSES', '', '2016-06-24 10:39:55', 1, 'admin', 'REMARKS', 'BRIEF', NULL, NULL),
(16, 'SOURCE', 'DETAILS', 'CAUSES', '', '2016-06-25 00:02:05', 1, 'admin', 'REMARKS', '', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `safety_requirements`
--

CREATE TABLE IF NOT EXISTS `safety_requirements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mitigation` varchar(256) NOT NULL,
  `time_frame` varchar(128) NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `incident_id` int(11) DEFAULT NULL,
  `predicted_residual_risk` varchar(256) NOT NULL,
  `consequence` int(11) NOT NULL,
  `reported_by` varchar(32) NOT NULL,
  `priority` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `incident_id` (`incident_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `safety_requirements`
--

INSERT INTO `safety_requirements` (`id`, `mitigation`, `time_frame`, `modified`, `status`, `incident_id`, `predicted_residual_risk`, `consequence`, `reported_by`, `priority`) VALUES
(1, 'Increased supervision', '', '2015-08-04 12:41:32', 1, NULL, '', 0, '', 0),
(2, 'Increased supervision', '', '2015-08-04 12:43:31', 1, 14, '1B', 0, '', 0),
(3, 'Increased supervision', '2 weeks', '2015-08-10 15:00:03', 1, 39, '1B', 0, 'admin', 0),
(4, 'Increased supervision', '2 weeks', '2015-08-11 07:06:15', 1, 37, '1B', 0, 'admin', 0),
(5, 'a', 'a', '2015-10-01 12:07:31', 1, 67, 'a', 0, 'admin', 0),
(6, 'bbb', '12 months', '2015-11-08 13:19:11', 1, 40, 'd', 0, 'admin', 0),
(7, 'bbb', '12 months', '2015-11-08 13:21:03', 1, 40, 'd', 0, 'admin', 0),
(8, 'z', '3 months', '2015-12-16 09:31:11', 1, 88, '5A', 0, 'sms', 0),
(9, 'q', '1', '2016-01-13 07:24:01', 1, 50, '1', 0, 'admin', 0),
(10, 'asd', 'sad', '2016-01-16 12:58:58', 1, 71, 'dsad', 0, 'admin', 0),
(11, 'ad', 'sad', '2016-01-16 13:09:34', 1, 71, 'dsad', 0, 'admin', 0),
(12, 'sada', 'dsad', '2016-01-16 13:09:42', 1, 71, 'dsadad', 0, 'admin', 0),
(13, 'test', 'test', '2016-01-16 13:18:17', 1, 71, '5A', 0, 'admin', 0),
(14, 'test', 'test', '2016-01-16 13:20:09', 1, 71, '4A', 0, 'admin', 0),
(15, 'ads', 'sad', '2016-01-26 11:59:23', 1, 98, '4A', 30, 'admin', 0),
(16, 'test', '2days', '2016-02-09 07:31:31', 1, 99, '1E', 43, 'admin', 0),
(17, 'B-1', '2 months', '2016-02-09 07:36:30', 1, 86, '2B', 44, 'admin', 0),
(18, 'B-1', '2 months', '2016-02-09 07:37:34', 1, 86, '2B', 44, 'admin', 0),
(19, 'B-1', '2years', '2016-02-09 07:41:06', 1, 86, '1C', 44, 'admin', 0),
(20, 'sleeping', '2 weeks', '2016-02-09 08:16:22', 1, 83, '2C', 42, 'admin', 0),
(21, 'test', '2hours', '2016-02-19 08:46:13', 1, 48, '1A', 47, 'admin', 0),
(22, 'Cut Down Trees', '2days', '2016-02-19 10:13:42', 1, 77, '1A', 24, 'admin', 0),
(23, 'Cut Down Trees', '2days', '2016-02-19 10:14:30', 1, 77, '1A', 24, 'admin', 0);

-- --------------------------------------------------------

--
-- Table structure for table `severities`
--

CREATE TABLE IF NOT EXISTS `severities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `value` varchar(8) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `severity`
--

CREATE TABLE IF NOT EXISTS `severity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `severity` varchar(32) NOT NULL,
  `severity_rationale` varchar(256) NOT NULL,
  `likelihood` varchar(32) NOT NULL,
  `likelihood_rationale` varchar(256) NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `incident_id` int(11) DEFAULT NULL,
  `reported_by` varchar(32) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `incident_id` (`incident_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `severity`
--

INSERT INTO `severity` (`id`, `severity`, `severity_rationale`, `likelihood`, `likelihood_rationale`, `modified`, `status`, `incident_id`, `reported_by`) VALUES
(1, 'B', 'Large reduction in safety margins', '4', 'Likely to occur some times', '2015-08-04 12:07:27', 1, 14, ''),
(2, 'B', 'Large reduction in safety margins', '4', 'Likely to occur some times', '2015-08-10 14:57:32', 1, 39, 'admin'),
(3, 'B', 'Large reduction in safety margins', '4', 'Likely to occur some times', '2015-08-11 07:00:48', 1, 37, 'admin'),
(4, 'B', 'Major equipment damage', '4', 'Likely to occur sometimes (has occurred infrequently)', '2015-10-01 12:07:24', 1, 67, 'admin'),
(5, 'A', 'Multiple deaths', '5', 'Unlikely to occur but possible (has occurred rarely)', '2015-10-01 12:39:13', 1, 1, 'admin'),
(6, 'A', 'Little consequences', '4', 'Likely to occur sometimes (has occurred infrequently)', '2015-10-10 05:58:25', 1, 65, 'admin'),
(7, 'A', 'Equipment destroyed', '5', 'Likely to occur many times (has occurred frequently)', '2016-01-13 06:35:20', 1, 50, 'admin'),
(8, 'A', 'Equipment destroyed', '5', 'Likely to occur many times (has occurred frequently)', '2016-01-16 10:30:16', 1, 71, 'admin'),
(9, 'A', 'Equipment destroyed', '5', 'Likely to occur many times (has occurred frequently)', '2016-01-20 04:08:02', 1, 61, 'admin'),
(10, 'A', 'A large reduction in safety margins, physical distress or a workload such that the operators cannot be relied upon to perform their tasks accurately or completely', '5', 'Likely to occur many times (has occurred frequently)', '2016-01-20 04:08:09', 1, 61, 'admin'),
(11, 'A', 'Equipment destroyed', '5', 'Likely to occur many times (has occurred frequently)', '2016-01-29 06:03:39', 1, 64, 'admin'),
(12, 'A', 'Equipment destroyed', '5', 'Likely to occur many times (has occurred frequently)', '2016-02-01 08:31:36', 1, 63, 'admin'),
(13, 'B', 'Multiple deaths', '4', 'Likely to occur sometimes (has occurred infrequently)', '2016-06-18 23:22:27', 1, 114, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `severity_rationales`
--

CREATE TABLE IF NOT EXISTS `severity_rationales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `description` text NOT NULL,
  `severity_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sms_form_124_comments`
--

CREATE TABLE IF NOT EXISTS `sms_form_124_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `incident_id` int(11) DEFAULT NULL,
  `comment` text NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `reported_by` varchar(32) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `incident_id` (`incident_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `sms_form_124_comments`
--

INSERT INTO `sms_form_124_comments` (`id`, `incident_id`, `comment`, `modified`, `status`, `reported_by`) VALUES
(1, 52, 'NONE', '2015-09-23 09:30:51', 1, 'rogers'),
(2, 47, 'NONE', '2015-09-23 09:37:07', 0, 'admin'),
(3, 71, 'shall report on this next week', '2016-03-04 06:03:34', 1, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `sms_form_124_contributing_factors`
--

CREATE TABLE IF NOT EXISTS `sms_form_124_contributing_factors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `details` text NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `reported_by` varchar(32) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `incident_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `incident_id` (`incident_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `sms_form_124_contributing_factors`
--

INSERT INTO `sms_form_124_contributing_factors` (`id`, `details`, `modified`, `reported_by`, `status`, `incident_id`) VALUES
(1, 'Lack of proper maintenance', '2015-08-27 14:26:20', 'admin', 0, 47),
(2, 'Lack of proper maintenance', '2015-08-27 14:25:50', 'admin', 0, 47),
(3, 'Lack of proper maintenance', '2015-09-23 10:36:27', 'admin', 0, 47),
(4, 'CONTRIBUTING FACTOR', '2016-05-19 11:40:37', 'admin', 1, NULL),
(5, 'CONTRIBUTING FACTOR', '2016-06-24 23:19:26', 'admin', 1, 72);

-- --------------------------------------------------------

--
-- Table structure for table `sms_form_124_corrective_actions`
--

CREATE TABLE IF NOT EXISTS `sms_form_124_corrective_actions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `action` text NOT NULL,
  `owner` varchar(128) NOT NULL,
  `completion_date` date NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `incident_id` int(11) DEFAULT NULL,
  `reported_by` varchar(32) NOT NULL,
  `priority` tinyint(4) NOT NULL DEFAULT '1',
  `completion_status` varchar(32) NOT NULL DEFAULT 'Pending',
  `completed_on` date NOT NULL,
  `remark` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `incident_id` (`incident_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `sms_form_124_corrective_actions`
--

INSERT INTO `sms_form_124_corrective_actions` (`id`, `action`, `owner`, `completion_date`, `modified`, `status`, `incident_id`, `reported_by`, `priority`, `completion_status`, `completed_on`, `remark`) VALUES
(1, 'Review safety policy', 'Bwire Samuel', '2016-05-19', '2015-08-28 04:23:32', 1, 46, 'admin', 1, 'Pending', '0000-00-00', ''),
(2, 'Review safety policy', 'Bwire Samuel', '2015-08-29', '2015-09-23 10:37:33', 0, 47, 'sms', 1, 'Pending', '0000-00-00', ''),
(3, 'Get a more professional technician', 'admin', '2016-06-09', '2016-06-09 01:23:02', 1, 82, 'admin', 5, 'Pending', '0000-00-00', ''),
(4, 'Purchase new server', 'UNKNOWN', '2016-06-09', '2016-06-09 01:24:48', 1, 82, 'admin', 1, 'Pending', '2016-06-01', ''),
(5, 'Get a more professional technician', 'admin', '2016-06-19', '2016-06-19 05:40:44', 1, 94, 'admin', 1, 'Done', '2016-06-19', ''),
(6, 'Install New power installations', 'Bwire', '2016-06-25', '2016-06-25 07:17:51', 1, 126, 'bwire', 8, 'Pending', '0000-00-00', '');

-- --------------------------------------------------------

--
-- Table structure for table `sms_form_124_data`
--

CREATE TABLE IF NOT EXISTS `sms_form_124_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `incident_id` int(11) DEFAULT NULL,
  `type_of_incident` varchar(128) NOT NULL,
  `case_no` varchar(128) NOT NULL,
  `employee_name` varchar(128) NOT NULL,
  `employee_number` varchar(128) NOT NULL,
  `supervisor` varchar(256) NOT NULL,
  `department` varchar(256) NOT NULL,
  `location_of_incident` varchar(256) NOT NULL,
  `movement_area` varchar(128) NOT NULL,
  `hospital` varchar(256) NOT NULL,
  `date_of_incident` date NOT NULL,
  `time_of_incident` varchar(128) NOT NULL,
  `date_reported` date NOT NULL,
  `type_of_injury` varchar(256) NOT NULL,
  `body_part_injured` varchar(256) NOT NULL,
  `cause_of_incident` varchar(256) NOT NULL,
  `incident_site` varchar(256) NOT NULL,
  `type_of_equipment_involved` varchar(256) NOT NULL,
  `related_act` varchar(256) NOT NULL,
  `weather_conditions` varchar(256) NOT NULL,
  `incident_description` text NOT NULL,
  `investigation` text NOT NULL,
  `area_supervisor` varchar(128) NOT NULL,
  `analysis_date` date NOT NULL,
  `completed_by` varchar(32) NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `incident_id` (`incident_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `sms_form_124_data`
--

INSERT INTO `sms_form_124_data` (`id`, `incident_id`, `type_of_incident`, `case_no`, `employee_name`, `employee_number`, `supervisor`, `department`, `location_of_incident`, `movement_area`, `hospital`, `date_of_incident`, `time_of_incident`, `date_reported`, `type_of_injury`, `body_part_injured`, `cause_of_incident`, `incident_site`, `type_of_equipment_involved`, `related_act`, `weather_conditions`, `incident_description`, `investigation`, `area_supervisor`, `analysis_date`, `completed_by`, `modified`, `status`) VALUES
(1, 47, 'Injury', '2317', 'Bwire Samuel', '45', '', 'SMS', 'airport floor 2', '', '', '2015-08-27', '15:00 Hours', '2015-08-27', '', '', 'slippery floor', '', '', '', '', '', '', 'John Doe', '0000-00-00', 'bwire', '2015-08-27 13:05:51', 1),
(2, 46, 'Injury', 'HZD/A/46/15', 'Bwire Samuel', '45', '', 'SMS', 'airport floor 2', '', '', '2015-08-27', '15:00 Hours', '2015-08-27', '', '', 'slippery floor', '', '', '', '', '', '', 'John Doe', '0000-00-00', 'bwire', '2015-08-27 13:16:42', 1),
(3, NULL, 'Injury', 'TestCase', 'Kraiba Kraiba', 'Kraiba', '', 'Kraiba', 'Kraiba', '', '', '2016-02-01', '21000', '2016-02-01', '', '', 'Kraiba', '', '', '', '', '', '', 'Kriaba', '0000-00-00', 'admin', '2016-02-01 06:19:16', 1),
(4, NULL, 'Equip', 'a', 'dd', 'd', 'd', 'd', 'd', 'd', 'd', '2016-02-09', '23', '2016-02-09', 's', 's', 's', 's', 's', 's', 's', 's', '', 's', '0000-00-00', 'admin', '2016-02-09 11:44:29', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sms_form_124_data_analysis_checklist`
--

CREATE TABLE IF NOT EXISTS `sms_form_124_data_analysis_checklist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `photographos` varchar(4) NOT NULL,
  `diagrams` varchar(4) NOT NULL,
  `supervisor_statements` varchar(4) NOT NULL,
  `witness_statements` varchar(4) NOT NULL,
  `employment_history` varchar(4) NOT NULL,
  `employee_statement` varchar(4) NOT NULL,
  `walk_around_checklist` varchar(4) NOT NULL,
  `training_records` varchar(4) NOT NULL,
  `police_reports` varchar(4) NOT NULL,
  `other` varchar(4) NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `reported_by` varchar(32) NOT NULL,
  `incident_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `incident_id` (`incident_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `sms_form_124_data_analysis_checklist`
--

INSERT INTO `sms_form_124_data_analysis_checklist` (`id`, `photographos`, `diagrams`, `supervisor_statements`, `witness_statements`, `employment_history`, `employee_statement`, `walk_around_checklist`, `training_records`, `police_reports`, `other`, `modified`, `status`, `reported_by`, `incident_id`) VALUES
(1, 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', '2015-08-28 05:06:56', 1, 'admin', 47),
(2, 'Yes', 'Yes', 'Yes', 'Yes', 'No', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', '2015-08-28 05:09:03', 1, 'admin', 47),
(3, 'No', 'No', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', '2016-02-09 11:51:56', 1, 'admin', NULL),
(4, 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', '2016-06-24 23:18:38', 1, 'admin', 72);

-- --------------------------------------------------------

--
-- Table structure for table `station`
--

CREATE TABLE IF NOT EXISTS `station` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `audit_plan_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `audit_plan_id` (`audit_plan_id`),
  KEY `audit_plan_id_2` (`audit_plan_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `station`
--

INSERT INTO `station` (`id`, `name`, `date_created`, `audit_plan_id`) VALUES
(1, 'DAN''S SMS', '0000-00-00 00:00:00', NULL),
(2, 'ATM', '0000-00-00 00:00:00', NULL),
(3, 'CNS', '0000-00-00 00:00:00', NULL),
(4, 'AIM', '0000-00-00 00:00:00', NULL),
(5, 'SOROTI', '0000-00-00 00:00:00', NULL),
(6, 'GULU', '0000-00-00 00:00:00', NULL),
(7, 'Kampala', '2016-05-19 09:27:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `color` varchar(32) NOT NULL DEFAULT 'CCCCCC',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `name`, `color`, `status`) VALUES
(1, 'INCOMING', 'fc0516', 1),
(2, 'PENDING', '0505fc', 1),
(3, 'INITIATED', 'fca205', 1),
(4, 'MONITORED', '33cc15', 1),
(5, 'CLOSED', '000000', 1),
(6, 'FOWARDED', 'CCCCCC', 1);

-- --------------------------------------------------------

--
-- Table structure for table `system_states`
--

CREATE TABLE IF NOT EXISTS `system_states` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `details` varchar(256) NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `incident_id` int(11) DEFAULT NULL,
  `reported_by` varchar(32) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `status` (`status`),
  KEY `incident_id` (`incident_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `system_states`
--

INSERT INTO `system_states` (`id`, `details`, `modified`, `status`, `incident_id`, `reported_by`) VALUES
(1, 'When ATS direct speech line is not serviceable', '2015-08-04 09:07:06', 1, 14, ''),
(2, 'When ATS direct speech line is not serviceable', '2015-08-10 14:53:08', 1, 39, 'admin'),
(3, 'Uncontrolled environment', '2015-08-11 06:34:31', 1, 37, 'admin'),
(4, 'Worked on', '2015-09-25 12:07:46', 1, 57, 'admin'),
(5, 'When ATS direct speech line is not serviceable', '2015-10-01 09:49:01', 1, 65, 'admin'),
(6, 'When there is  delay in establishment of contact by Communication center with Kinshasa ACC', '2015-10-01 09:49:59', 1, 65, 'admin'),
(7, 'unknown', '2016-05-11 08:38:12', 1, 65, 'admin'),
(8, ' direct land-line telephone ', '2015-10-01 09:52:29', 1, 65, 'admin'),
(9, 'Worked on', '2016-05-11 08:38:16', 1, 67, 'admin'),
(10, 'Worked on', '2016-05-11 08:38:19', 1, 67, 'admin'),
(11, 'Working fine', '2016-05-11 08:38:24', 1, 77, 'admin'),
(12, 'Uncontrolled environment', '2016-05-11 08:38:31', 1, 40, 'admin'),
(13, 'At vero eos et accusamus et iusto odio dignissimos', '2016-05-11 08:38:44', 1, 88, 'sms'),
(14, 'When overgrown trees obstruct towers view of movement areas during landing and take off of aircraft.', '2016-01-20 08:22:06', 1, 98, 'admin'),
(15, 'Temporibus autem quibusdam et aut officiis ', '2016-05-11 08:38:54', 1, 83, 'Samuel.B'),
(16, 'Itaque earum rerum hic tenetur a sapiente delectus.', '2016-05-11 08:39:07', 1, 83, 'Samuel.B'),
(17, 'unknown', '2016-05-11 08:39:14', 1, 86, 'admin'),
(18, 'Monitored', '2016-06-25 03:07:18', 1, 72, 'admin'),
(19, 'Install monitoring system', '2016-06-25 03:07:40', 1, 72, 'admin'),
(20, 'Can cause death', '2016-06-25 05:28:51', 1, 126, 'bwire');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE IF NOT EXISTS `tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(256) NOT NULL,
  `location` varchar(256) NOT NULL,
  `analyst` varchar(256) NOT NULL,
  `date` date NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `reported_by` varchar(32) NOT NULL,
  `change_management_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `title`, `location`, `analyst`, `date`, `modified`, `status`, `reported_by`, `change_management_id`) VALUES
(1, 'Installation and commissioning of VCCS.', 'ENTEBBE', 'HASSAN B.MUKIIBBI.', '2016-06-25', '2015-08-19 12:54:44', 1, 'admin', NULL),
(2, 'Replace door locks', 'server room', 'Henry', '2015-11-03', '2015-11-03 12:53:14', 1, 'admin', NULL),
(3, 'Replace door locks', 'server room', 'Henry', '2015-11-03', '2015-11-03 12:53:14', 1, 'admin', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `task_steps`
--

CREATE TABLE IF NOT EXISTS `task_steps` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `task_id` int(11) DEFAULT NULL,
  `description` varchar(256) NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `reported_by` varchar(32) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `task_id` (`task_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `task_steps`
--

INSERT INTO `task_steps` (`id`, `task_id`, `description`, `modified`, `status`, `reported_by`) VALUES
(1, 1, 'Pre-installation meeting', '2015-08-20 08:11:56', 1, 'admin'),
(2, 1, 'Unpacking of equipment from the shipping boxes.', '2015-08-20 08:43:54', 1, 'admin'),
(3, 1, 'Installation of electronic equipment rack.', '2015-08-20 09:07:54', 1, 'admin'),
(4, 1, 'Cable terminations and installation.', '2015-08-20 09:09:24', 1, 'admin'),
(5, 3, 'Remove old locks', '2015-11-03 12:54:03', 1, 'admin'),
(6, 3, 'install new locks', '2015-11-03 12:58:23', 1, 'admin'),
(7, 3, 'install new locks', '2015-11-03 13:03:36', 1, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `task_step_comments`
--

CREATE TABLE IF NOT EXISTS `task_step_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `task_step_id` int(11) DEFAULT NULL,
  `details` varchar(256) NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `reported_by` varchar(32) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `task_step_id` (`task_step_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `task_step_comments`
--

INSERT INTO `task_step_comments` (`id`, `task_step_id`, `details`, `modified`, `status`, `reported_by`) VALUES
(1, 2, 'Shipping boxes are wooden and tightly sealed with nails.', '2015-08-20 09:06:32', 1, 'admin'),
(2, 3, 'There is need to have protective gear.', '2015-08-20 09:08:57', 1, 'admin'),
(3, 4, 'There is need to have protective wear.', '2015-08-20 09:11:37', 1, 'admin'),
(4, 5, 'has to be done urgently', '2015-11-03 12:58:10', 1, 'admin'),
(5, 5, 'has to be done urgently', '2015-11-03 13:03:53', 1, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `task_step_hazards`
--

CREATE TABLE IF NOT EXISTS `task_step_hazards` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `task_step_id` int(11) DEFAULT NULL,
  `details` varchar(256) NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `reported_by` varchar(32) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `task_step_id` (`task_step_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `task_step_hazards`
--

INSERT INTO `task_step_hazards` (`id`, `task_step_id`, `details`, `modified`, `status`, `reported_by`) VALUES
(1, 2, 'Improperly disposed nails.', '2015-08-20 08:44:13', 1, 'admin'),
(2, 2, 'Removed wooden lids.', '2015-08-20 08:44:30', 1, 'admin'),
(3, 3, 'Tools falling.', '2015-08-20 09:08:10', 1, 'admin'),
(4, 4, 'Cables breaking', '2015-08-20 09:09:40', 1, 'admin'),
(5, 4, 'Cables breaking', '2015-08-20 09:09:53', 1, 'admin'),
(6, 4, 'Staff falling during installation.', '2015-08-20 09:10:07', 1, 'admin'),
(7, 4, 'Tools falling', '2015-08-20 09:10:20', 1, 'admin'),
(8, 5, 'Security loosened', '2015-11-03 12:56:52', 1, 'admin'),
(9, 5, 'Damage on door frame', '2015-11-03 13:02:05', 1, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `task_step_hazard_controls`
--

CREATE TABLE IF NOT EXISTS `task_step_hazard_controls` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `task_step_id` int(11) DEFAULT NULL,
  `details` varchar(256) NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `reported_by` varchar(32) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `task_step_id` (`task_step_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `task_step_hazard_controls`
--

INSERT INTO `task_step_hazard_controls` (`id`, `task_step_id`, `details`, `modified`, `status`, `reported_by`) VALUES
(1, 2, 'Use of appropriate tools for unpacking.', '2015-08-20 08:53:00', 1, 'admin'),
(2, 2, 'Proper disposal of removed nails and boards.', '2015-08-20 08:53:12', 1, 'admin'),
(3, 2, 'Nails properly stored.', '2015-08-20 08:53:24', 1, 'admin'),
(4, 2, 'Wooden lid will be collected together and handed to PDU for disposal.', '2015-08-20 08:53:36', 1, 'admin'),
(5, 3, 'Careful use of tools and proper body earthing and discharge techniques.', '2015-08-20 09:08:24', 1, 'admin'),
(6, 3, 'Tools used by competent engineers.', '2015-08-20 09:08:35', 1, 'admin'),
(7, 3, 'Wearing protective gears during installation exercise.', '2015-08-20 09:08:44', 1, 'admin'),
(8, 4, 'Cables to be tightened with tie wraps.', '2015-08-20 09:10:48', 1, 'admin'),
(9, 4, 'Engineers should be trained on how to use and handle tools were necessary.', '2015-08-20 09:11:00', 1, 'admin'),
(10, 4, 'Wearing protective gears during installation.', '2015-08-20 09:11:10', 1, 'admin'),
(11, 4, 'Installation of cable led and supervised by Thales engineers', '2015-08-20 09:11:26', 1, 'admin'),
(12, 5, 'improve security at gate', '2015-11-03 12:57:14', 1, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `department` varchar(128) NOT NULL,
  `email` varchar(64) NOT NULL,
  `phone_number` varchar(32) NOT NULL,
  `position` varchar(128) NOT NULL,
  `category` varchar(128) NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `username` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role` varchar(25) NOT NULL,
  `user_group_id` int(11) DEFAULT NULL,
  `user_department_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `department`, `email`, `phone_number`, `position`, `category`, `modified`, `status`, `username`, `password`, `role`, `user_group_id`, `user_department_id`) VALUES
(1, 'andrew', 'SMS', 'mwesigea@gmail.com', '', 'PTO/SMS', 'admin', '2016-06-24 12:44:07', 1, 'andrew', '0cc175b9c0f1b6a831c399e269772661', 'SMS Admin', NULL, NULL),
(2, 'admin', 'SMS', 'info@caauganda.com', '', 'DUTY OFFICER', 'admin', '2016-05-11 03:37:22', 1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'System Admin', NULL, NULL),
(3, 'guest', 'NONE', 'info@caauganda.com', '', 'GUEST', 'public', '2016-01-20 06:40:38', 1, 'guest', '084e0343a0486ff05530df6c705c8bb4', 'guest', NULL, NULL),
(4, 'kasirye', 'SMS', 'mitchmichael@hotmail.com', '+256702953774', 'SMS', 'admin', '2016-01-18 15:20:53', 1, 'kasirye', '8ce4b16b22b58894aa86c421e8759df3', 'SMS Admin', NULL, NULL),
(5, 'bwire', 'IT', 'bwire@programmer.net', '+256701198000', 'Programmer', 'admin', '2016-01-20 06:39:52', 1, 'bwire', '92eb5ffee6ae2fec3ad71c777531578f', 'System Admin', NULL, NULL),
(6, 'rogers', 'SMS', 'rwanzunula@gmail.com', '', 'PAIMO-SMS/QA', 'admin', '2016-01-29 17:58:42', 1, 'rogers', '4b43b0aee35624cd95b910189b3dc231', 'SMS Admin', NULL, NULL),
(7, 'Kraiba Semakula', 'Strep', 'krabz01@gmail.com', '2556702432543', 'Admin', 'sitrep', '2016-02-01 05:30:36', 1, 'kraiba', 'c88447365689eb85c79fcf0c4987713d', 'STREP Admin', NULL, NULL),
(8, 'guest', '', '', '', '', '', '2016-02-08 10:53:25', 1, 'guest', '084e0343a0486ff05530df6c705c8bb4', '', NULL, NULL),
(9, 'matovu', 'sms', 'davimato@yahoo.com', '', 'SMS Officer', 'admin', '2016-06-25 04:42:06', 1, 'matovu', '6f8f57715090da2632453988d9a1501b', 'SMS Admin', NULL, NULL),
(10, 'kakama', 'sms', 'kakamaedmond@gmail.com', '', 'sms', 'admin', '2016-06-25 04:43:47', 1, 'kakama', '8ce4b16b22b58894aa86c421e8759df3', 'SMS Admin', NULL, NULL),
(11, 'sitrep', 'sms', 'davimato@yahoo.com', '', 'sms', 'admin', '2016-06-25 04:44:49', 1, 'sitrep', '03c7c0ace395d80182db07ae2c30f034', 'SMS Admin', NULL, NULL),
(12, 'wabomba', 'sms', 'mwabomba@caa.co.ug', '', 'sms', 'admin', '2016-06-25 04:45:42', 1, 'wabomba', 'f1290186a5d0b1ceab27f4e77c0c5d68', 'SMS Admin', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_departments`
--

CREATE TABLE IF NOT EXISTS `user_departments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `description` varchar(256) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_groups`
--

CREATE TABLE IF NOT EXISTS `user_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `user_groups`
--

INSERT INTO `user_groups` (`id`, `name`, `data`) VALUES
(1, 'Other DANS staff', '2016-01-17 11:30:44'),
(2, 'System Admin', '2016-01-17 11:30:44'),
(3, 'SMS Admin', '2016-01-17 11:30:44'),
(4, 'SMS Officer', '2016-01-17 11:30:44'),
(5, 'STREP Admin', '2016-02-01 05:18:59');

-- --------------------------------------------------------

--
-- Table structure for table `verifications`
--

CREATE TABLE IF NOT EXISTS `verifications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `verified_by` varchar(256) NOT NULL,
  `note` text NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `incident_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `incident_id` (`incident_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `verifications`
--

INSERT INTO `verifications` (`id`, `verified_by`, `note`, `modified`, `status`, `incident_id`) VALUES
(1, 'Bwire Samuel', 'Use of trolleys has been stopped according to the action to be taken.', '2015-07-25 09:40:24', 1, 11),
(2, 'Bwire Samuel', 'All work done by the electrician was done well according to standards.', '2015-07-25 11:45:31', 1, 10),
(3, 'Bwire Samuel', '', '2015-07-25 17:41:38', 1, 1),
(4, 'Bwire Samuel', 'Verification done', '2016-06-25 05:39:17', 1, 126),
(5, 'Samuel Bwire', '', '2016-06-30 07:20:52', 1, 39);

-- --------------------------------------------------------

--
-- Table structure for table `workshops`
--

CREATE TABLE IF NOT EXISTS `workshops` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject` varchar(256) NOT NULL,
  `hours` varchar(32) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `venue` varchar(128) NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `reported_by` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `workshops`
--

INSERT INTO `workshops` (`id`, `subject`, `hours`, `from_date`, `to_date`, `venue`, `modified`, `status`, `reported_by`) VALUES
(1, 'SMS Training', '12:00 - 15:00', '2015-09-18', '2015-09-19', 'Kampala International Hotel', '0000-00-00 00:00:00', 1, 'admin'),
(2, 'safety promotion', '5', '2016-06-28', '2016-06-28', 'serena', '2016-06-28 06:37:26', 1, 'kakama');

-- --------------------------------------------------------

--
-- Table structure for table `workshop_attendance`
--

CREATE TABLE IF NOT EXISTS `workshop_attendance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `workshop_id` int(11) DEFAULT NULL,
  `employee_no` varchar(32) NOT NULL,
  `name` varchar(128) NOT NULL,
  `position` varchar(128) NOT NULL,
  `email` varchar(32) NOT NULL,
  `phone` varchar(32) NOT NULL,
  `signature` varchar(128) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `reported_by` varchar(32) NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `workshop_id` (`workshop_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `workshop_attendance`
--

INSERT INTO `workshop_attendance` (`id`, `workshop_id`, `employee_no`, `name`, `position`, `email`, `phone`, `signature`, `status`, `reported_by`, `modified`) VALUES
(1, 1, '723', 'Twesigy Ronald', 'SMS Department', 'rkarakire@caa.co.ug', '', '', 1, 'admin', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `workshop_facilitators`
--

CREATE TABLE IF NOT EXISTS `workshop_facilitators` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `workshop_id` int(11) DEFAULT NULL,
  `print_name` varchar(128) NOT NULL,
  `organization` varchar(128) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `reported_by` varchar(32) NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `workshop_id` (`workshop_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `workshop_facilitators`
--

INSERT INTO `workshop_facilitators` (`id`, `workshop_id`, `print_name`, `organization`, `status`, `reported_by`, `modified`) VALUES
(1, 1, 'CAA', 'Civil Aviation Authority', 1, 'admin', '0000-00-00 00:00:00');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `actions`
--
ALTER TABLE `actions`
  ADD CONSTRAINT `fk_actions_1` FOREIGN KEY (`incident_id`) REFERENCES `incidents` (`id`);

--
-- Constraints for table `audit_form`
--
ALTER TABLE `audit_form`
  ADD CONSTRAINT `audit_form_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `audit_plan_fields`
--
ALTER TABLE `audit_plan_fields`
  ADD CONSTRAINT `fk_audit_plan_fields_1` FOREIGN KEY (`audit_plan_id`) REFERENCES `audit_plan` (`id`);

--
-- Constraints for table `audit_report`
--
ALTER TABLE `audit_report`
  ADD CONSTRAINT `fk_audit_report_1` FOREIGN KEY (`user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `fk_audit_report_2` FOREIGN KEY (`audit_plan_id`) REFERENCES `audit_plan` (`id`);

--
-- Constraints for table `audit_report_fields`
--
ALTER TABLE `audit_report_fields`
  ADD CONSTRAINT `fk_audit_report_fields_1` FOREIGN KEY (`report_id`) REFERENCES `audit_report` (`id`);

--
-- Constraints for table `causes`
--
ALTER TABLE `causes`
  ADD CONSTRAINT `fk_causes_1` FOREIGN KEY (`incident_id`) REFERENCES `incidents` (`id`);

--
-- Constraints for table `cm_affected_areas`
--
ALTER TABLE `cm_affected_areas`
  ADD CONSTRAINT `fk_cm_affected_areas_1` FOREIGN KEY (`change_management_id`) REFERENCES `change_management` (`id`);

--
-- Constraints for table `cm_costs`
--
ALTER TABLE `cm_costs`
  ADD CONSTRAINT `fk_cm_costs_1` FOREIGN KEY (`change_management_id`) REFERENCES `change_management` (`id`);

--
-- Constraints for table `consequences`
--
ALTER TABLE `consequences`
  ADD CONSTRAINT `fk_consequences_1` FOREIGN KEY (`incident_id`) REFERENCES `incidents` (`id`);

--
-- Constraints for table `critical_asset_vulnerability`
--
ALTER TABLE `critical_asset_vulnerability`
  ADD CONSTRAINT `critical_fk1_asset_vulnerability` FOREIGN KEY (`critical_asset_id`) REFERENCES `critical_assets` (`id`);

--
-- Constraints for table `duty_controllers`
--
ALTER TABLE `duty_controllers`
  ADD CONSTRAINT `fk_duty_controllers_1` FOREIGN KEY (`sod_id`) REFERENCES `safety_occurrence_data` (`id`),
  ADD CONSTRAINT `fk_duty_controllers_2` FOREIGN KEY (`incident_id`) REFERENCES `incidents` (`id`);

--
-- Constraints for table `effects`
--
ALTER TABLE `effects`
  ADD CONSTRAINT `fk_effects_1` FOREIGN KEY (`hazard_id`) REFERENCES `incidents` (`id`);

--
-- Constraints for table `effect_risk_management`
--
ALTER TABLE `effect_risk_management`
  ADD CONSTRAINT `fk_effect_risk_management_1` FOREIGN KEY (`effects_id`) REFERENCES `effects` (`id`);

--
-- Constraints for table `evidences`
--
ALTER TABLE `evidences`
  ADD CONSTRAINT `fk_evidences_1` FOREIGN KEY (`incident_id`) REFERENCES `incidents` (`id`);

--
-- Constraints for table `existing_defenses`
--
ALTER TABLE `existing_defenses`
  ADD CONSTRAINT `fk_existing_defenses_1` FOREIGN KEY (`incident_id`) REFERENCES `incidents` (`id`);

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `fk_feedback_1` FOREIGN KEY (`incident_id`) REFERENCES `incidents` (`id`);

--
-- Constraints for table `further_actions`
--
ALTER TABLE `further_actions`
  ADD CONSTRAINT `fk_further_actions_1` FOREIGN KEY (`incident_id`) REFERENCES `incidents` (`id`);

--
-- Constraints for table `incidents`
--
ALTER TABLE `incidents`
  ADD CONSTRAINT `fk_incidents_1` FOREIGN KEY (`status`) REFERENCES `status` (`id`),
  ADD CONSTRAINT `fk_incidents_2` FOREIGN KEY (`cause_id`) REFERENCES `incident_cause` (`id`),
  ADD CONSTRAINT `fk_incidents_3` FOREIGN KEY (`category_id`) REFERENCES `incident_category` (`id`);

--
-- Constraints for table `investigators`
--
ALTER TABLE `investigators`
  ADD CONSTRAINT `fk_investigators_1` FOREIGN KEY (`incident_id`) REFERENCES `incidents` (`id`);

--
-- Constraints for table `monitoring_activities`
--
ALTER TABLE `monitoring_activities`
  ADD CONSTRAINT `fk_monitoring_activities_1` FOREIGN KEY (`incident_id`) REFERENCES `incidents` (`id`);

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`id`);

--
-- Constraints for table `performance_targets`
--
ALTER TABLE `performance_targets`
  ADD CONSTRAINT `fk_performance_targets_1` FOREIGN KEY (`incident_id`) REFERENCES `incidents` (`id`);

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `FK_post_cat` FOREIGN KEY (`category_id`) REFERENCES `category` (`ID`);

--
-- Constraints for table `questionnaire_question_answers`
--
ALTER TABLE `questionnaire_question_answers`
  ADD CONSTRAINT `fk_questionnaire_question_answers_1` FOREIGN KEY (`questionnaire_id`) REFERENCES `questionnaire` (`questionnaire_id`),
  ADD CONSTRAINT `fk_questionnaire_question_answers_2` FOREIGN KEY (`question_id`) REFERENCES `questionnaire_questions` (`question_id`);

--
-- Constraints for table `recommended_solutions`
--
ALTER TABLE `recommended_solutions`
  ADD CONSTRAINT `fk_recommened_solutions_1` FOREIGN KEY (`incident_id`) REFERENCES `incidents` (`id`);

--
-- Constraints for table `remarks`
--
ALTER TABLE `remarks`
  ADD CONSTRAINT `fk_remarks_1` FOREIGN KEY (`incident_id`) REFERENCES `incidents` (`id`);

--
-- Constraints for table `rm_consequences`
--
ALTER TABLE `rm_consequences`
  ADD CONSTRAINT `fk_rm_consequences_1` FOREIGN KEY (`risk_management_id`) REFERENCES `risk_management` (`id`);

--
-- Constraints for table `rm_current_defences`
--
ALTER TABLE `rm_current_defences`
  ADD CONSTRAINT `fk_rm_current_defences_1` FOREIGN KEY (`risk_management_id`) REFERENCES `risk_management` (`id`);

--
-- Constraints for table `rm_technical_defences`
--
ALTER TABLE `rm_technical_defences`
  ADD CONSTRAINT `fk_rm_technical_defences_1` FOREIGN KEY (`risk_management_id`) REFERENCES `risk_management` (`id`);

--
-- Constraints for table `safety_occurrence_data`
--
ALTER TABLE `safety_occurrence_data`
  ADD CONSTRAINT `fk_safety_occurrence_data_1` FOREIGN KEY (`incident_id`) REFERENCES `incidents` (`id`);

--
-- Constraints for table `safety_requirements`
--
ALTER TABLE `safety_requirements`
  ADD CONSTRAINT `fk_safety_requirements_1` FOREIGN KEY (`incident_id`) REFERENCES `incidents` (`id`);

--
-- Constraints for table `severity`
--
ALTER TABLE `severity`
  ADD CONSTRAINT `fk_severity_1` FOREIGN KEY (`incident_id`) REFERENCES `incidents` (`id`);

--
-- Constraints for table `sms_form_124_comments`
--
ALTER TABLE `sms_form_124_comments`
  ADD CONSTRAINT `fk_sms_form_124_comments_1` FOREIGN KEY (`incident_id`) REFERENCES `incidents` (`id`);

--
-- Constraints for table `sms_form_124_contributing_factors`
--
ALTER TABLE `sms_form_124_contributing_factors`
  ADD CONSTRAINT `fk_sms_form_124_contributing_factors_2` FOREIGN KEY (`incident_id`) REFERENCES `incidents` (`id`);

--
-- Constraints for table `sms_form_124_corrective_actions`
--
ALTER TABLE `sms_form_124_corrective_actions`
  ADD CONSTRAINT `fk_sms_form_124_corrective_actions_1` FOREIGN KEY (`incident_id`) REFERENCES `incidents` (`id`);

--
-- Constraints for table `sms_form_124_data`
--
ALTER TABLE `sms_form_124_data`
  ADD CONSTRAINT `fk_sms_form_124_data_1` FOREIGN KEY (`incident_id`) REFERENCES `incidents` (`id`);

--
-- Constraints for table `sms_form_124_data_analysis_checklist`
--
ALTER TABLE `sms_form_124_data_analysis_checklist`
  ADD CONSTRAINT `fk_sms_form_124_data_analysis_checklist_1` FOREIGN KEY (`incident_id`) REFERENCES `incidents` (`id`);

--
-- Constraints for table `system_states`
--
ALTER TABLE `system_states`
  ADD CONSTRAINT `fk_system_states_1` FOREIGN KEY (`incident_id`) REFERENCES `incidents` (`id`);

--
-- Constraints for table `task_steps`
--
ALTER TABLE `task_steps`
  ADD CONSTRAINT `fk_task_steps_1` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`id`);

--
-- Constraints for table `task_step_comments`
--
ALTER TABLE `task_step_comments`
  ADD CONSTRAINT `fk_task_step_comments` FOREIGN KEY (`task_step_id`) REFERENCES `task_steps` (`id`);

--
-- Constraints for table `task_step_hazards`
--
ALTER TABLE `task_step_hazards`
  ADD CONSTRAINT `fk_task_step_hazards_1` FOREIGN KEY (`task_step_id`) REFERENCES `task_steps` (`id`);

--
-- Constraints for table `task_step_hazard_controls`
--
ALTER TABLE `task_step_hazard_controls`
  ADD CONSTRAINT `fk_task_step_hazard_controls_1` FOREIGN KEY (`task_step_id`) REFERENCES `task_steps` (`id`);

--
-- Constraints for table `verifications`
--
ALTER TABLE `verifications`
  ADD CONSTRAINT `fk_verifications_1` FOREIGN KEY (`incident_id`) REFERENCES `incidents` (`id`);

--
-- Constraints for table `workshop_attendance`
--
ALTER TABLE `workshop_attendance`
  ADD CONSTRAINT `fk_workshop_attendance_1` FOREIGN KEY (`workshop_id`) REFERENCES `workshops` (`id`);

--
-- Constraints for table `workshop_facilitators`
--
ALTER TABLE `workshop_facilitators`
  ADD CONSTRAINT `fk_workshop_facilitators_1` FOREIGN KEY (`workshop_id`) REFERENCES `workshops` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
