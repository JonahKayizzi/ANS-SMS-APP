-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2016 at 02:38 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sms_software_private_3`
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `actions`
--

INSERT INTO `actions` (`id`, `details`, `modified`, `deadline`, `date_action_taken`, `status`, `incident_id`, `reported_by`, `accepted`, `comment`, `notification`) VALUES
(1, 'Stop using trolleys', '2016-02-21 07:54:03', '2016-02-21', '2015-07-21', 1, 11, 'Test', '', '', 'Final Sent'),
(2, 'Tile the floor', '2016-02-21 08:17:32', '2016-02-23', '2015-07-21', 1, 11, 'Kraiba', '', '', 'Final Sent'),
(3, 'Replace floor tiles.', '2015-07-25 11:11:09', '2015-07-27', '2015-07-24', 1, 10, '', '', '', ''),
(4, 'Replace the air conditioner', '2015-07-25 16:29:59', '2015-07-27', '2015-07-24', 1, 1, '', '', '', ''),
(5, 'Call the service provider to do the maintenance works.', '2015-07-27 13:47:11', '2015-07-30', '', 1, 13, '', '', '', ''),
(6, 'Internal I.T team is trying to handle', '2015-07-27 13:53:39', '2015-07-28', '', 1, 13, '', '', '', ''),
(7, 'Contact service provider', '2015-08-10 14:25:24', '2015-07-30', '2015-07-24', 1, 39, 'admin', 'Yes', 'No comment.', ''),
(8, 'Replace all plastic material with metal', '2015-08-11 06:19:10', '2015-08-12', '2015-08-10', 1, 37, 'admin', '', 'NO COMMENT', ''),
(9, 'Replace all plastic material with metal', '2015-08-11 10:03:22', '2015-08-11', '2015-08-11', 1, 42, 'admin', 'N/A', 'NO COMMENT', ''),
(10, 'Replace all plastic material with metal', '2015-08-11 11:32:44', '2015-08-19', '2015-08-11', 1, 24, 'admin', 'Yes', 'NO COMMENT', ''),
(11, 'Replace tank with new one', '2015-09-25 12:32:05', '2015-09-25', '2015-09-25', 1, 46, 'admin', 'Yes', 'Passed', ''),
(12, 'sleeping', '2016-02-09 05:32:21', '2016-02-23', '2016-02-18', 1, 83, 'Samuel.B', 'Yes', 'unable to sleep ', 'Final Sent'),
(13, 'b1', '2016-02-09 05:42:22', '2016-02-09', '2016-02-09', 1, 86, 'admin', 'No', 'b1', ''),
(14, 'aaa', '2016-02-09 11:59:17', '2016-02-09', '2016-02-09', 1, 88, 'admin', 'N/A', '', ''),
(15, 'tesr', '2016-02-21 09:19:13', '2016-02-21', '2016-02-21', 1, 108, 'admin', 'Yes', '', 'Final Sent'),
(16, 'TESR', '2016-02-21 09:21:07', '2016-02-21', '2016-02-21', 1, 108, 'admin', 'N/A', 'TT', 'Final Sent'),
(17, 'TESTRD', '2016-02-21 09:22:34', '2016-02-21', '2016-02-21', 1, 108, 'admin', 'N/A', '', 'Final Sent'),
(18, 'Replace tile floors with something more rough', '2016-07-06 08:25:45', '2016-07-06', '2016-07-09', 1, 143, 'admin', 'Yes', 'no comment', 'NOT YET'),
(19, 'Contact technician', '2016-07-10 04:35:07', '2016-07-10', '2016-07-10', 1, 149, 'admin', '', '', 'NOT YET');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `aircraft_incident_investigations`
--

INSERT INTO `aircraft_incident_investigations` (`id`, `date_of_occurence`, `aircraft_involved`, `description`, `form_of_notification`, `category`, `level_of_investigation`, `investigators`, `tor`, `date_of_assignment`, `deadline`, `transcript`, `preliminary_report`, `SAG_submission`, `SAG_reviewed`, `forwarded_to_DANS_and_Mgrs`, `final_report`, `status`, `transcript_submitted`, `controller_report`, `controller_report_submitted`, `sodf`, `sodf_submitted`, `fps`, `fps_submitted`, `preliminary_report_submitted`, `SAG_submitted`, `SAG_reviewed_by`, `forwarded_to_DANS_and_Mgrs_sent`) VALUES
(1, '2016-06-14', '5ZUAN', '<p>Going around due to runway incursion</p>', 'notification by operator', 'serious', 'Full', '<p>Mwesigye Henry</p>', '0000-00-00', '2016-06-25', '2016-06-30', '0000-00-00', 'submitted on 27th Ju', '0000-00-00', '0000-00-00', '0000-00-00', '<p>completed, pending</p>', 1, 'Submitted', '', 'Submitted', '', 'Submitted', '', 'Submitted', 'Completed', 'Forwarded', '', 'Forwarded'),
(2, '2016-06-15', 'Boeng  44545', '<p>Investigation 23232</p>', 'notified by strep', 'CATEGORY', 'Full', '<p>Samuel</p>', '0000-00-00', '2016-06-16', '2016-06-17', '0000-00-00', 'Not attached', '0000-00-00', '0000-00-00', '0000-00-00', '', 1, 'Submitted', '', 'Submitted', '', 'Submitted', '', 'Submitted', 'Completed', 'Forwarded', '', 'Forwarded'),
(3, '2016-06-28', 'AIRCRAFT INVOLVED', '<p>info goes here</p>', 'notified by strep', 'CATEGORY', 'Full', '<ol>\r\n<li>sam bwire</li>\r\n<li>ronald</li>\r\n<li>brian m</li>\r\n</ol>', '0000-00-00', '2016-07-05', '2016-06-28', '2016-07-05', '', '0000-00-00', '0000-00-00', '0000-00-00', 'Pending', 1, 'Submitted', '', 'Submitted', '', 'Submitted', '', 'Submitted', 'Completed', 'Forwarded', '', 'Forwarded');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `aircraft_incident_investigation_investigators`
--

INSERT INTO `aircraft_incident_investigation_investigators` (`id`, `aircraft_incident_investigation_id`, `investigator_id`, `status`, `date`) VALUES
(1, 3, 1, 1, '2016-07-10 09:57:19'),
(2, 3, 2, 1, '2016-07-10 09:59:52'),
(3, NULL, 3, 1, '2016-07-10 10:08:18'),
(4, 3, 2, 1, '2016-07-10 10:09:11'),
(5, 3, 5, 1, '2016-07-10 10:14:03'),
(6, 3, 5, 1, '2016-07-10 10:14:59');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `audit_form`
--

INSERT INTO `audit_form` (`issue_no`, `issue_date`, `auditor_technical_assessor`, `area_audited`, `area_audited_date`, `auditees_representative`, `detailed_observation`, `classification_of_non_conformance`, `reference_number_of_iso_9001_or_procedure`, `root_cause_analysis_of_non_conformance`, `suggested_corrective_action`, `proposed_date_of_realisation`, `verification_of_proof`, `verification_of_proof_date`, `lead_auditors_comments`, `lead_auditors_comments_date`, `user_id`, `status`, `audit_plan_id`, `questionnaire`, `questionnaire_sub_element`) VALUES
(1, '0000-00-00', 'Mark Lubega', 'Try', NULL, 'Cur', '', '', 'PHR56777', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', NULL, 1, NULL, NULL, NULL),
(2, '2016-05-19', 'Kraiba', 'Kabalagala', '0000-00-00', 'Mark lubega', '<p>-Good , more room for improvement</p>', 'minor', 'HF/30/2015', '<p>- Late submission</p>', '<p>- Submit Early</p>', '0000-00-00', '<p>Verified</p>', '0000-00-00', '<p>-Good</p>', '0000-00-00', 2, 1, 1, NULL, NULL),
(3, '0000-00-00', 'AUDITOR', 'AREA_AUDITED', '0000-00-00', 'REPRESENTATIVE', '<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.</p>', 'minor', 'REFERENCE', '<ol>\r\n<li>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</li>\r\n<li>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</li>\r\n<li>Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</li>\r\n</ol>', '', '0000-00-00', '<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga.</p>', '0000-00-00', '', '0000-00-00', 2, 1, 2, NULL, NULL),
(4, '0000-00-00', 'AUDITOR', 'AREA_AUDITED', '0000-00-00', 'REPRESENTATIVE', '<p>INFORMATION GOES HERE</p>', 'major', 'REFERENCE', '<p>INFORMATION GOES HERE</p>', '<ul>\r\n<li>INFORMATION GOES HERE</li>\r\n<li>INFORMATION GOES HERE</li>\r\n<li>INFORMATION GOES HERE</li>\r\n</ul>', '0000-00-00', '', '0000-00-00', '', '0000-00-00', 2, 1, NULL, 7, 1);

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
(11, 1, 1, 1, '2015-09-25 02:14:39'),
(12, 1, 2, 1, '2015-09-25 09:15:30'),
(13, 1, 2, 1, '2015-09-26 17:05:51'),
(14, 1, 2, 1, '2015-09-26 18:17:17'),
(15, 1, 7, 1, '2016-02-09 11:30:19'),
(16, 1, 7, 1, '2016-02-09 11:32:48');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `audit_plan`
--

INSERT INTO `audit_plan` (`id`, `title`, `date_created`, `user`, `status`) VALUES
(1, 'Audit Plan Title', '2016-07-03 06:05:25', 2, 1),
(2, 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum', '2016-07-04 02:47:54', 2, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `audit_plan_fields`
--

INSERT INTO `audit_plan_fields` (`id`, `name`, `description`, `audit_plan_id`, `date`) VALUES
(1, 'Sed ut perspiciatis ', '<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>', 1, '2016-07-03 06:55:10'),
(2, 'At vero eos et accus', '<p>Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.</p>\r\n<ol>\r\n<li>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment</li>\r\n<li>The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains</li>\r\n</ol>', 1, '2016-07-03 07:08:49');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `audit_plan_work_flow`
--

INSERT INTO `audit_plan_work_flow` (`id`, `audit_plan`, `user`, `status`, `date`) VALUES
(1, 1, 2, 1, '2015-09-26 18:38:04'),
(2, 1, 2, 1, '2015-09-26 18:42:01'),
(3, 1, 5, 1, '2016-02-09 11:24:20');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `audit_report`
--

INSERT INTO `audit_report` (`id`, `title`, `date_created`, `user`, `status`, `audit_plan_id`) VALUES
(1, 'AUDIT REPORT TITLE', '2016-07-04 12:34:24', 2, 1, 2),
(2, 'AUDIT REPORT TITLE', '2016-07-05 10:57:57', 2, 1, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `audit_report_fields`
--

INSERT INTO `audit_report_fields` (`id`, `name`, `description`, `report_id`, `date`) VALUES
(1, 'Introduction', '<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga.</p>', 1, '2016-07-04 12:42:35');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `causes`
--

INSERT INTO `causes` (`id`, `details`, `modified`, `status`, `incident_id`, `reported_by`) VALUES
(1, 'Unreliable communication  between Entebbe ACC and Kinshasa ACC', '2015-08-04 07:51:01', 1, 14, ''),
(2, 'Non adherence to procedures ', '2015-08-04 07:52:10', 1, 14, ''),
(3, 'Non adherence to procedures', '2015-08-10 13:50:33', 1, 39, 'admin'),
(4, 'Unmonitored personel', '2015-08-11 05:32:02', 1, 37, 'admin'),
(5, 'aging of door hinge', '2015-08-11 15:25:21', 1, 46, 'admin'),
(6, 'Automatic loking system got damaged and we suggested it in meeting at tower', '2015-09-25 11:40:43', 1, 47, 'admin'),
(7, 'Communication', '2016-05-11 06:51:56', 1, 59, 'admin'),
(8, 'unknown', '2016-05-11 06:52:10', 1, 59, 'admin'),
(9, 'Unreliable communication  between Entebbe ACC and Kinshasa ACC', '2015-10-01 08:49:39', 1, 65, 'admin'),
(10, 'Unreliable communication  between Entebbe ACC and Kinshasa ACC', '2015-10-01 10:48:45', 1, 60, 'admin'),
(11, 'Communication', '2016-05-11 06:51:49', 1, 60, 'admin'),
(12, 'Communication', '2016-05-11 06:52:00', 1, 67, 'admin'),
(13, 'no governing policy', '2016-05-11 06:53:08', 1, 77, 'admin'),
(14, 'unknown', '2016-05-11 06:52:54', 1, 40, 'admin'),
(15, 'lack of feedback', '2016-05-11 06:52:49', 1, 88, 'sms'),
(16, 'old equipment', '2016-05-11 06:52:41', 1, 27, 'admin'),
(17, 'poor maintainace', '2016-01-20 06:20:10', 1, 98, 'admin'),
(18, 'poor maintenance', '2016-05-11 06:52:18', 1, 83, 'Samuel.B'),
(19, 'unknown', '2016-05-11 06:52:23', 1, 99, 'admin'),
(20, 'unreliable communication equipment', '2016-05-11 06:52:34', 1, 86, 'admin'),
(21, 'Poor verification system', '2016-06-25 02:07:03', 1, 72, 'admin'),
(22, 'Poor Power Installations', '2016-06-25 04:29:18', 1, 126, 'bwire'),
(23, 'Poor Power Installations', '2016-06-25 06:32:18', 1, 122, 'admin'),
(24, 'Poor verification system', '2016-07-10 04:12:04', 1, 149, 'admin');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `change_management`
--

INSERT INTO `change_management` (`id`, `originator_name`, `originator_title`, `system_equipment_concerned`, `date_raised`, `reference_no`, `change_description`, `change_justification`, `back_out_plan`, `affected_areas`, `costs`, `time`, `proposed_implementer`, `recommended_by`, `approved_by`, `reported_by`, `recommendation_date`, `approval_date`, `modified`, `status`, `title_of_change`, `division`, `areas_affected`) VALUES
(1, 'Sam Bwire', 'SMS Manager', 'Server room', '0000-00-00', '', 'Replacement of tiles', '', '', '', '', '', 'admin', '', '', 'admin', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 1, '', '', ''),
(2, 'Security', 'Security Manager', 'Automatic door locks', '0000-00-00', '232323', '', '', '', '', '', '24 hours', 'Roco systems', 'Mr. Mulindwa', 'Oboth Henry', 'admin', '0000-00-00', '0000-00-00', '2015-11-03 10:46:57', 1, '', '', ''),
(3, 'Wanzunula Rogers', 'PAIMO SMS', 'AIM AUTOMATION PHASE 3', '0000-00-00', 'AIM3', '<p>Improving current AIM system to provide for digital NOTAM</p>', '', '', '', '', '2 years ', 'Avitech ', 'Marion Tibenderana', 'Barongo Ronny', 'guest', '0000-00-00', '0000-00-00', '2016-05-26 09:55:09', 1, 'some information goes here', '', ''),
(4, 'ANDREW MWESIGE', 'PTO-SMS/QA', 'VHF RADIOS', '2016-07-11', '0000011', '<p>TRANSFER VHF RADIO ANTENNA TO NEW MAST</p>', '', '', '', '', '1040UTC', 'STO-COM', 'PTO-M', 'MCNS', 'admin', '2016-03-04', '0000-00-00', '2016-05-26 09:55:44', 1, 'VHF RADIOS REINSTALLATION', 'TOWER', ''),
(5, 'ORGINATOR', 'TITLE', 'EQUIPMENT', '0000-00-00', 'REF #', '<p>DESCRIPTION</p>', '', '', '', '', 'TIME', 'IMPLEMENTER', 'RECOMMENDED BY', 'APPROVED BY', 'admin', '0000-00-00', '0000-00-00', '2016-07-05 09:29:48', 1, '', '', ''),
(6, 'ORGINATOR', 'TITLE', 'EQUIPMENT', '2016-07-10', '', '<p>Some information goes here</p>', '', '', 'AREA_AFFECTED', '', '', '', '', '', 'admin', '0000-00-00', '0000-00-00', '2016-07-10 17:58:18', 1, 'Change Management Title', 'DIVISION', ''),
(7, 'ORGINATOR', 'TITLE', '', '2016-07-06', '', '<p>some information here</p>', '', '', '', '', '', '', 'ronald', '', 'admin', '2016-03-04', '0000-00-00', '2016-07-10 18:05:11', 1, 'Change Management Info', 'DIVISION', '');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `cm_affected_areas`
--

INSERT INTO `cm_affected_areas` (`id`, `change_management_id`, `details`, `modified`, `status`, `reported_by`) VALUES
(1, 1, 'Server room', '0000-00-00 00:00:00', 1, 'admin'),
(2, 2, 'Tower', '2015-11-03 10:47:13', 1, 'admin'),
(3, 2, 'Parking', '2015-11-03 10:47:26', 1, 'admin'),
(4, 4, 'Equipment room', '2016-05-26 10:24:46', 1, 'admin'),
(5, 4, 'ACC', '2016-05-26 10:25:19', 1, 'admin'),
(6, 4, 'sms', '2016-05-26 10:25:58', 1, 'admin'),
(7, 3, 'Notam dissemination', '2016-05-26 10:26:37', 1, 'admin'),
(8, 6, 'Server room', '2016-07-10 18:01:43', 1, 'admin');

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
(2, 3, 'AMHS switch', 1000000, 'admin', '2016-05-26 10:27:44', 1, 'USD'),
(3, 4, 'ITEM', 1400000, 'admin', '2016-06-18 19:54:11', 1, 'UGX');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=58 ;

--
-- Dumping data for table `consequences`
--

INSERT INTO `consequences` (`id`, `description`, `modified`, `status`, `incident_id`, `reported_by`) VALUES
(1, 'Aircraft collision', '2015-07-28 07:56:10', 1, 1, ''),
(2, 'Runway Incursion', '2015-07-28 07:56:10', 1, 1, ''),
(3, 'Air proximity', '2015-07-28 07:56:28', 1, 1, ''),
(4, 'Miscommunication', '2015-07-28 08:12:47', 1, 1, ''),
(5, '4 days of no work in server room', '2015-08-10 13:01:14', 1, 40, ''),
(6, '7 hours of no work', '2015-08-10 13:40:42', 1, 39, 'admin'),
(7, 'Knee injury on one staff member', '2015-08-11 05:21:00', 1, 37, 'admin'),
(8, 'Damage of furniture', '2015-08-11 05:25:28', 1, 37, 'admin'),
(9, 'Description of consequence', '2015-08-11 09:02:28', 1, 37, 'admin'),
(10, 'Damage of furniture', '2015-08-11 10:03:04', 1, 42, 'admin'),
(11, 'Damage of equipment', '2015-09-02 11:32:11', 1, 25, 'admin'),
(12, 'hh', '2015-09-05 20:09:30', 1, 22, 'admin'),
(13, 'Aircraft  converging at Bunia DRC FIR   without ATC coordination.', '2015-10-01 08:49:21', 1, 65, 'admin'),
(14, 'Aircraft  converging at Bunia DRC FIR   without ATC coordination.  ', '2015-10-01 10:48:32', 1, 60, 'admin'),
(15, 'Lose of life', '2015-10-01 11:01:29', 1, 68, 'admin'),
(16, 'Less staff reporting to work', '2015-10-01 11:01:54', 1, 68, 'admin'),
(17, 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi', '2016-05-11 06:41:05', 1, 67, 'admin'),
(18, 'Duis aute irure dolor in reprehenderit in voluptate velit esse', '2016-05-11 06:41:20', 1, 68, 'admin'),
(19, 'Excepteur sint occaecat cupidatat non proident', '2016-05-11 06:41:31', 1, 26, 'admin'),
(20, 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium', '2016-05-11 06:41:46', 1, 26, 'admin'),
(21, 'Ut enim ad minima veniam, quis nostrum exercitationem', '2016-05-11 06:41:58', 1, 71, 'admin'),
(22, 'Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam', '2016-05-11 06:42:09', 1, 71, 'admin'),
(23, 'Excepteur sint occaecat cupidatat non proident', '2016-05-11 06:42:20', 1, 70, 'admin'),
(24, 'Ut enim ad minima veniam', '2016-05-11 06:42:29', 1, 77, 'admin'),
(25, 'Excepteur sint occaecat cupidatat non proident', '2016-05-11 06:41:36', 1, 77, 'admin'),
(26, 'Ut enim ad minima veniam', '2016-05-11 06:42:40', 1, 77, 'admin'),
(27, 'Sed ut perspiciatis unde omnis iste', '2016-05-11 06:42:49', 1, 88, 'sms'),
(28, 'At vero eos et accusamus et iusto odio dignissimos ducimus', '2016-05-11 06:43:02', 1, 50, 'admin'),
(29, 'Air Proxies', '2016-01-20 06:17:54', 1, 98, 'admin'),
(30, 'Collision ', '2016-01-20 06:18:50', 1, 98, 'admin'),
(31, 'Temporibus autem quibusdam et aut officiis debitis', '2016-05-11 06:43:12', 1, 90, 'admin'),
(32, 'Et harum quidem rerum facilis est et expedita distinctio.', '2016-05-11 06:43:33', 1, NULL, 'admin'),
(33, 'Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit', '2016-05-11 06:44:04', 1, NULL, 'admin'),
(34, 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium', '2016-05-11 06:44:17', 1, NULL, 'admin'),
(39, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit', '2016-05-11 06:44:29', 1, 14, 'admin'),
(40, 'Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil ', '2016-05-11 06:44:44', 1, 15, 'admin'),
(41, 'Temporibus autem quibusdam et aut officiis debitis', '2016-05-11 06:43:17', 1, 62, 'admin'),
(42, 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2016-05-11 06:43:53', 1, 83, 'Samuel.B'),
(43, 'Et harum quidem rerum facilis est et expedita distinctio.', '2016-05-11 06:43:37', 1, 99, 'admin'),
(44, 'Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil ', '2016-05-11 06:44:47', 1, 86, 'admin'),
(45, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit', '2016-05-11 06:44:32', 1, 86, 'admin'),
(46, 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium', '2016-05-11 06:44:20', 1, 99, 'admin'),
(47, 'Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit', '2016-05-11 06:44:08', 1, 48, 'admin'),
(48, 'accidents may occur', '2016-06-25 02:08:10', 1, 72, 'admin'),
(49, 'can cause death', '2016-06-25 04:32:24', 1, 126, 'bwire'),
(50, 'accidents may occur', '2016-06-29 17:21:15', 1, 140, 'admin'),
(51, 'accidents may occur', '2016-07-06 07:54:29', 1, 143, 'admin'),
(52, 'accidents may occur', '2016-07-06 09:17:56', 1, 138, 'admin'),
(53, 'Missed approaches', '2016-07-10 02:06:05', 1, 149, 'admin'),
(54, 'Airspace violation', '2016-07-10 02:06:39', 1, 149, 'admin'),
(55, 'Loss of separation on approach', '2016-07-10 02:06:54', 1, 149, 'admin'),
(56, 'Airspace violation', '2016-07-10 02:20:58', 1, 145, 'admin'),
(57, 'accidents may occur', '2016-07-10 07:43:16', 1, 139, 'admin');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `critical_assets`
--

INSERT INTO `critical_assets` (`id`, `name`, `descripiton`, `value`, `date`, `status`) VALUES
(1, 'Diesel Generator', 'For Generating Power', '20000', '2015-10-18 08:01:58', 1),
(2, 'Test Asset', 'Test', 'Asset', '2015-10-26 10:25:17', 1),
(3, 'Test 2 Asset', 'Tet', '12', '2015-10-26 10:27:12', 1),
(4, 'Tower server system', 'Tower server system', '$2m', '2015-11-03 06:14:08', 1),
(5, 'NAME', 'DESCRIPTION', 'VALUE', '2016-06-24 09:56:25', 1),
(6, 'NAME', '<p>description</p>', '2,000,000 UGX', '2016-07-05 23:19:57', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `duty_controllers`
--

INSERT INTO `duty_controllers` (`id`, `sod_id`, `incident_id`, `name`, `place`, `CONTROLLING`, `CO0RDINATING`, `MONITORING`, `modified`, `status`) VALUES
(1, 5, 27, 'Joy Kenyangi', 'Tower', 0, 0, 0, '2015-08-14 10:21:19', 1),
(2, 5, 27, 'Joy Kenyangi', 'Tower', 0, 0, 0, '2015-08-14 10:57:52', 0),
(3, 5, 27, 'Joy Kenyangi', 'Approach', 1, 1, 0, '2015-08-14 10:57:47', 0),
(4, 5, 27, 'Joy Kenyangi', 'Air Control', 1, 1, 0, '2015-08-14 10:57:43', 0),
(5, 5, 27, 'Joy Kenyangi', 'Approach', 1, 1, 1, '2015-08-14 10:57:34', 0),
(6, 3, 46, 'Joy Kenyangi', 'Approach', 1, 1, 0, '2015-08-14 10:42:30', 1),
(7, 3, 46, 'Bwire Samuel', 'Approach', 0, 0, 1, '2015-08-14 10:45:39', 1),
(8, 8, 86, 'xxx', 'Tower', 0, 0, 0, '2015-12-16 09:38:59', 1),
(9, 8, 86, 'ccc', 'Tower', 0, 0, 0, '2015-12-16 09:39:06', 1),
(10, 15, 10, 'mwesigye henry', 'Air Control', 0, 1, 0, '2016-07-06 07:06:53', 0),
(11, 16, 85, 'mwesigye henry', 'Approach', 1, 1, 1, '2016-07-06 07:22:20', 1),
(12, 16, 85, 'mwesigye henry', 'Approach', 1, 1, 1, '2016-07-06 07:30:05', 0),
(13, 16, 85, 'mwesigye henry', 'Tower', 0, 0, 0, '2016-07-06 07:27:20', 0),
(14, 10, 75, 'brian muhumuza', 'Tower', 0, 0, 0, '2016-07-06 07:36:03', 1),
(15, 17, 141, 'mwesigye henry', 'Tower', 1, 0, 1, '2016-07-06 07:37:31', 1),
(16, 17, 141, 'brian muhumuza', 'Approach', 1, 1, 0, '2016-07-06 07:37:41', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `effects`
--

INSERT INTO `effects` (`id`, `hazard_id`, `name`, `consequence`, `date`, `reported_by`, `status`, `severity_id`, `severity_rational_id`, `likelihood_id`, `initial_risk_index`, `predicted_residual_risk_index`, `substitute_risk`) VALUES
(1, 27, '', 0, '2016-07-10', 'admin', 1, 0, NULL, NULL, '', '', ''),
(3, 12, '', 0, '2016-07-10', 'admin', 1, 0, NULL, NULL, '', '', ''),
(4, 77, '', 0, '2016-07-10', 'admin', 1, 0, NULL, NULL, '', '', ''),
(5, 77, '', 0, '2016-07-10', 'admin', 1, 0, NULL, NULL, '', '', ''),
(6, 77, '', 0, '2016-07-10', 'admin', 1, 0, NULL, NULL, '', '', ''),
(7, 77, '', 0, '2016-07-10', 'admin', 1, 0, NULL, NULL, '', '', ''),
(8, 40, '', 0, '2016-07-10', 'admin', 1, 0, NULL, NULL, '', '', ''),
(9, 40, '', 0, '2016-07-10', 'admin', 1, 0, NULL, NULL, '', '', ''),
(10, 88, '', 0, '2016-07-10', 'sms', 1, 0, NULL, NULL, '', '', ''),
(11, 1, '', 0, '2016-07-10', 'admin', 1, 0, NULL, NULL, '', '', ''),
(12, 1, '', 0, '2016-07-10', 'admin', 1, 0, NULL, NULL, '', '', ''),
(13, 98, '', 0, '2016-07-10', 'admin', 1, 0, NULL, NULL, '', '', ''),
(14, 98, '', 0, '2016-07-10', 'admin', 1, 0, NULL, NULL, '', '', ''),
(15, 98, NULL, 29, '2016-01-26', 'admin', 1, 0, NULL, NULL, '', '', ''),
(16, 98, NULL, 30, '2016-01-26', 'admin', 1, 0, NULL, NULL, '', '', ''),
(17, 98, NULL, 29, '2016-01-26', 'admin', 1, 0, NULL, NULL, '', '', ''),
(18, 98, NULL, 30, '2016-01-26', 'admin', 1, 0, NULL, NULL, '', '', ''),
(19, 98, NULL, 30, '2016-01-26', 'admin', 1, 0, NULL, NULL, '', '', ''),
(20, 14, NULL, 39, '2016-01-29', 'admin', 1, 0, NULL, NULL, '', '', ''),
(21, 83, NULL, 42, '2016-02-09', 'Samuel.B', 1, 0, NULL, NULL, '', '', ''),
(22, 99, NULL, 43, '2016-02-09', 'admin', 1, 0, NULL, NULL, '', '', ''),
(23, 86, NULL, 44, '2016-02-09', 'admin', 1, 0, NULL, NULL, '', '', ''),
(24, 99, NULL, 46, '2016-02-09', 'admin', 1, 0, NULL, NULL, '', '', ''),
(25, 48, NULL, 47, '2016-02-19', 'admin', 1, 0, NULL, NULL, '', '', ''),
(26, 77, NULL, 24, '2016-02-19', 'admin', 1, 0, NULL, NULL, '', '', ''),
(27, 126, NULL, 49, '2016-06-25', 'bwire', 1, 0, NULL, NULL, '', '', ''),
(28, 140, NULL, 50, '2016-06-29', 'admin', 1, 0, NULL, NULL, '', '', ''),
(29, 143, NULL, 51, '2016-07-06', 'admin', 1, 0, NULL, NULL, '', '', ''),
(30, 143, NULL, 51, '2016-07-06', 'admin', 1, 0, NULL, NULL, '', '', ''),
(31, 149, NULL, 53, '2016-07-10', 'admin', 1, 0, NULL, NULL, '', '', ''),
(32, 145, NULL, 56, '2016-07-10', 'admin', 1, 0, NULL, NULL, '', '', ''),
(33, 149, NULL, 53, '2016-07-10', 'admin', 1, NULL, NULL, NULL, '', '', ''),
(34, 149, NULL, 53, '2016-07-10', 'admin', 1, 3, 1, 3, 'C3', '1B', ''),
(35, 149, NULL, 53, '2016-07-10', 'admin', 1, 1, NULL, 1, 'A1', '1A', '1D'),
(36, 149, NULL, 54, '2016-07-10', 'admin', 1, 2, NULL, 2, '2B', '2E', '1D'),
(37, 149, NULL, 55, '2016-07-10', 'admin', 1, 1, NULL, 1, '1A', '1B', '1D'),
(38, 139, NULL, 57, '2016-07-10', 'admin', 1, NULL, NULL, NULL, '', '', ''),
(39, 149, NULL, 53, '2016-07-10', 'admin', 1, 2, NULL, 1, '1B', '1B', '1D');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `effects_severity_rationales`
--

INSERT INTO `effects_severity_rationales` (`id`, `effects_id`, `severity_rational_id`, `status`) VALUES
(1, 35, 1, 1),
(2, 35, 2, 1),
(3, 36, 1, 1),
(4, 36, 2, 1),
(5, 37, 1, 1),
(6, 37, 2, 1),
(7, 39, 1, 0),
(8, 39, 2, 0),
(9, 39, 3, 0),
(10, 39, 4, 0),
(11, 39, 5, 0),
(12, 39, 6, 0),
(13, 39, 7, 0),
(14, 39, 8, 0),
(15, 39, 9, 0),
(16, 39, 10, 0),
(17, 39, 11, 0),
(18, 39, 12, 0),
(19, 39, 13, 0),
(20, 39, 3, 1),
(21, 39, 4, 1),
(22, 39, 5, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `effect_risk_management`
--

INSERT INTO `effect_risk_management` (`id`, `severity`, `severity_rationale`, `likelihood`, `likelihood_rationale`, `modified`, `status`, `effects_id`, `reported_by`) VALUES
(7, 'A', 'Equipment destroyed', '5', 'Likely to occur many times (has occurred frequently)', '2015-10-11 08:55:10', 1, 3, 'admin'),
(8, 'A', 'Equipment destroyed', '5', 'Likely to occur many times (has occurred frequently)', '2015-11-03 05:03:41', 1, 4, 'admin'),
(9, 'A', 'Serious injury', '4', 'Unlikely to occur but possible (has occurred rarely)', '2015-11-03 05:56:10', 1, 5, 'admin'),
(10, 'A', 'Serious injury', '4', 'Unlikely to occur but possible (has occurred rarely)', '2015-11-03 05:57:35', 1, 6, 'admin'),
(11, 'A', 'Serious injury', '4', 'Unlikely to occur but possible (has occurred rarely)', '2015-11-03 06:04:01', 1, 7, 'admin'),
(12, 'B', 'Equipment destroyed', '3', 'Likely to occur many times (has occurred frequently)', '2015-11-08 11:18:01', 1, 8, 'admin'),
(13, 'A', 'Equipment destroyed', '5', 'Likely to occur many times (has occurred frequently)', '2015-11-08 11:18:24', 1, 9, 'admin'),
(14, 'B', 'Multiple deaths', '3', 'Likely to occur sometimes (has occurred infrequently)', '2015-12-16 07:30:22', 1, 10, 'sms'),
(15, 'B', 'Equipment destroyed', '5', 'Likely to occur many times (has occurred frequently)', '2016-01-08 11:49:27', 1, 11, 'admin'),
(16, 'B', 'Equipment destroyed', '3', 'Likely to occur many times (has occurred frequently)', '2016-01-08 11:49:28', 1, 12, 'admin'),
(17, 'C', 'Equipment destroyed', '3', 'Likely to occur many times (has occurred frequently)', '2016-01-20 06:26:00', 1, 13, 'admin'),
(18, 'A', 'Equipment destroyed', '5', 'Likely to occur many times (has occurred frequently)', '2016-01-20 06:46:37', 1, 14, 'admin'),
(19, 'A', 'Equipment destroyed', '5', 'Likely to occur many times (has occurred frequently)', '2016-01-26 08:46:33', 1, 15, 'admin'),
(20, 'A', 'Equipment destroyed', '5', 'Likely to occur many times (has occurred frequently)', '2016-01-26 08:57:46', 1, 16, 'admin'),
(21, 'A', 'Equipment destroyed', '5', 'Likely to occur many times (has occurred frequently)', '2016-01-26 09:09:30', 1, 17, 'admin'),
(22, 'A', 'Equipment destroyed', '5', 'Likely to occur sometimes (has occurred infrequently)', '2016-01-26 09:31:11', 1, 18, 'admin'),
(23, 'C', 'Equipment destroyed', '2', 'Likely to occur many times (has occurred frequently)', '2016-01-26 09:33:11', 1, 19, 'admin'),
(24, 'C', 'Multiple deaths', '5', 'Likely to occur many times (has occurred frequently)', '2016-01-29 04:12:28', 1, 20, 'admin'),
(25, 'B', 'Equipment destroyed', '5', 'Likely to occur many times (has occurred frequently)', '2016-02-09 05:29:55', 1, 21, 'Samuel.B'),
(26, 'D', 'Equipment destroyed', '5', 'Likely to occur many times (has occurred frequently)', '2016-02-09 05:31:03', 1, 22, 'admin'),
(27, 'A', 'Equipment destroyed', '2', 'Likely to occur sometimes (has occurred infrequently)', '2016-02-09 05:34:05', 1, 23, 'admin'),
(28, 'A', 'Equipment destroyed', '5', 'Likely to occur many times (has occurred frequently)', '2016-02-09 05:36:58', 1, 24, 'admin'),
(29, 'A', 'Equipment destroyed', '5', 'Likely to occur many times (has occurred frequently)', '2016-02-19 06:45:45', 1, 25, 'admin'),
(30, 'A', 'Equipment destroyed', '5', 'Likely to occur many times (has occurred frequently)', '2016-02-19 08:13:03', 1, 26, 'admin'),
(31, 'A', 'Multiple deaths', '5', 'Likely to occur many times (has occurred frequently)', '2016-06-25 04:36:59', 1, 27, 'bwire'),
(32, 'A', 'Multiple deaths', '5', 'Likely to occur many times (has occurred frequently)', '2016-06-29 17:25:40', 1, 28, 'admin'),
(33, 'A', 'Equipment destroyed', '5', 'Likely to occur many times (has occurred frequently)', '2016-07-06 07:55:01', 1, 29, 'admin'),
(34, 'A', 'Equipment destroyed', '5', 'Likely to occur many times (has occurred frequently)', '2016-07-06 07:56:51', 1, 30, 'admin'),
(35, 'D', 'Use of emergency procedures', '4', 'Likely to occur sometimes (has occurred infrequently)', '2016-07-10 02:14:20', 1, 31, 'admin'),
(36, 'B', 'A large reduction in safety margins, physical distress or a workload such that the operators cannot be relied upon to perform their tasks accurately or completely', '5', 'Likely to occur many times (has occurred frequently)', '2016-07-10 02:26:13', 1, 32, 'admin'),
(37, 'B', 'Multiple deaths', '3', 'Likely to occur many times (has occurred frequently)', '2016-07-10 07:43:30', 1, 38, 'admin');

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
(1, 'Bwire Samuel', 'SMS Department', '2016-07-06', 'Mwesigye Andrew', 'SMS Department', 'Bwire Samuel', 'NONE', '2016-07-06', 'Airport Tower', '2016-07-06', '2016-07-06', '', '', '2016-07-06', '', '', '', '2016-07-06', '', 0, '2016-07-06', '0000-00-00 00:00:00', 1, 'admin'),
(2, 'Andrew Mwesigye', 'SMS Department', '0000-00-00', 'Bwire Samuel', 'SMS Department', 'Bwire Samuel', 'NONE', '2016-02-17', 'Airport Tower', '0000-00-00', '0000-00-00', '', '', '0000-00-00', '', '', '', '0000-00-00', '', 1, '0000-00-00', '2016-05-19 10:49:16', 0, 'admin'),
(3, 'Brian Mc. Knite', 'IT', '2016-02-17', 'Mwesigye Andrew', 'SMS Department', 'Paul Tobby', 'NONE', '2016-02-17', 'Airport Tower', '2016-02-17', '0000-00-00', '', '', '2016-02-17', '', '', '', '0000-00-00', '', 1, '0000-00-00', '2016-05-19 10:49:20', 0, 'admin'),
(4, 'Paul Tobby', 'SMS Department', '2016-02-17', 'Mwesigye Andrew', 'SMS Department', 'Paul Tobby', 'NONE', '2016-02-17', 'Airport Tower', '2016-02-17', '0000-00-00', '', '', '2016-02-17', '', '', '', '2016-02-17', '', 1, '0000-00-00', '2016-05-19 10:49:23', 0, 'admin'),
(5, 'Brian Musiime', 'Other', '2016-02-17', 'Mwesigye Andrew', 'SMS Department', 'John Bosco Okirya', 'NONE', '2016-02-17', 'Airport Tower', '2016-02-17', '0000-00-00', '', '', '2016-02-17', '', '', '', '2016-02-17', '', 1, '0000-00-00', '2016-05-19 10:49:26', 0, 'admin'),
(6, 'John Bosco Okirya', 'IT', '2016-02-17', 'Mwesigye Andrew', 'SMS Department', 'Mwesigye Andrew', 'NONE', '2016-02-17', 'Airport Tower', '2016-02-17', '2016-02-17', '', '', '2016-02-17', '', '', '', '2016-02-17', '', 1, '2016-02-17', '2016-05-19 10:49:29', 0, 'admin');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `evaluation_auditors`
--

INSERT INTO `evaluation_auditors` (`id`, `date_id`, `station_id`, `user_id`, `date_created`, `status`) VALUES
(1, 1, 1, 1, '2016-01-19 11:42:38', 1),
(2, 1, 1, 2, '2016-01-19 11:44:02', 1),
(10, 5, 1, 4, '2016-02-09 12:15:22', 1),
(9, 5, 1, 7, '2016-02-09 12:15:14', 1),
(5, 4, 1, 4, '2016-01-19 12:14:50', 1),
(7, 2, 1, 7, '2016-01-19 12:16:31', 1),
(11, 6, 1, 7, '2016-02-21 09:04:12', 1),
(12, 7, 1, 7, '2016-02-21 09:04:46', 1),
(13, 3, 1, 2, '2016-05-19 08:02:06', 1),
(14, 3, 1, 5, '2016-05-19 08:02:14', 1),
(15, 8, 1, 7, '2016-05-19 08:02:38', 1),
(16, 9, 8, 1, '2016-07-03 07:16:17', 1),
(17, 10, 8, 3, '2016-07-03 08:33:52', 1),
(18, 11, 8, 5, '2016-07-03 08:59:46', 1),
(19, 10, 8, 7, '2016-07-04 01:57:08', 1),
(20, 11, 8, 5, '2016-07-04 01:57:19', 1),
(21, 16, 8, 12, '2016-07-04 01:57:29', 1),
(22, 15, 8, 13, '2016-07-04 01:57:46', 1),
(23, 13, 8, 13, '2016-07-04 01:58:04', 1),
(24, 12, 8, 3, '2016-07-04 02:01:37', 1),
(25, 15, 8, 1, '2016-07-04 02:01:59', 1),
(26, 21, 9, 1, '2016-07-04 02:31:57', 1),
(27, 19, 9, 2, '2016-07-04 02:32:09', 1),
(28, 20, 9, 12, '2016-07-04 02:32:24', 1),
(29, 18, 9, 10, '2016-07-04 02:32:36', 1),
(30, 20, 9, 5, '2016-07-04 02:32:47', 1),
(31, 20, 9, 6, '2016-07-04 02:42:13', 1);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `evaluation_date`
--

INSERT INTO `evaluation_date` (`id`, `date`, `type`, `station_id`, `notification`, `date_created`, `status`, `venue`, `activities`) VALUES
(1, '2016-01-12', 'Morning', 1, NULL, '2016-01-19 11:04:45', 1, '', ''),
(2, '2016-01-12', 'Afternoon', 1, NULL, '2016-01-19 11:10:13', 1, '', ''),
(3, '2016-01-12', 'Morning', 1, NULL, '2016-01-19 11:10:34', 1, '', ''),
(4, '2016-01-30', 'Afternoon', 1, NULL, '2016-01-19 11:48:12', 1, '', ''),
(5, '2016-02-21', 'Afternoon', 1, 'Final Sent', '2016-02-09 12:14:02', 1, '', ''),
(6, '2016-02-21', 'Morning', 1, 'Final Sent', '2016-02-21 09:04:01', 1, '', ''),
(7, '2016-02-23', 'Morning', 1, 'Final Sent', '2016-02-21 09:04:36', 1, '', ''),
(8, '2016-05-19', 'Afternoon', 1, NULL, '2016-05-19 08:02:28', 1, '', ''),
(9, '2016-07-01', 'Afternoon', 8, NULL, '2016-07-03 07:16:08', 1, '', ''),
(10, '2016-07-04', 'Morning', 8, NULL, '2016-07-03 07:17:24', 1, '', ''),
(11, '2016-07-04', 'Afternoon', 8, NULL, '2016-07-03 08:52:45', 1, '', ''),
(12, '2016-07-04', 'Morning', 8, NULL, '2016-07-03 08:54:53', 1, '', ''),
(13, '2016-07-03', 'Morning', 8, NULL, '2016-07-03 09:02:37', 1, 'Office of the EIC/CNS', ''),
(14, '2016-07-05', 'Afternoon', 8, NULL, '2016-07-03 09:10:00', 0, 'Office of the PATMO/O’C ANS/Control rooms', ''),
(15, '2016-07-04', 'Afternoon', 8, NULL, '2016-07-04 00:41:55', 1, 'Communication Center/AIS Headquarters', ''),
(16, '2016-07-05', 'Morning', 8, NULL, '2016-07-04 00:50:29', 1, 'Soroti Aerodrome', '<ul>\r\n<li><span style="font-size: 11.0pt; mso-bidi-font-size: 12.0pt; line-height: 115%; font-family: ''Tahoma'',''sans-serif''; mso-fareast-font-family: Calibri; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA;">Interviews/ Observations</span></li>\r\n</ul>'),
(17, '2016-07-04', 'Morning', 9, NULL, '2016-07-04 02:02:55', 0, 'Office of the PATMO/O’C ANS/Control rooms', ''),
(18, '2016-07-06', 'Afternoon', 9, NULL, '2016-07-04 02:26:02', 1, 'Office of the PATMO/O’C ANS/Control rooms', '<ul>\r\n<li>Interviews/observations</li>\r\n<li>Review of documents</li>\r\n</ul>'),
(19, '2016-07-07', 'Morning', 9, NULL, '2016-07-04 02:28:20', 1, 'Office of the PATMO/O’C ANS/Control rooms', '<ul>\r\n<li>Interviews</li>\r\n<li>Reivew of documents</li>\r\n</ul>'),
(20, '2016-07-07', 'Afternoon', 9, NULL, '2016-07-04 02:29:27', 1, 'Office of the EIC/CNS', '<ul>\r\n<li>Observation of environment/surroundings</li>\r\n<li>Review of documents and records</li>\r\n</ul>'),
(21, '2016-07-08', 'Morning', 9, NULL, '2016-07-04 02:30:22', 1, 'Communication Center/AIS Headquarters', '<ul>\r\n<li>Interviews / observations</li>\r\n<li>Review of documents</li>\r\n</ul>');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `evidences`
--

INSERT INTO `evidences` (`id`, `details`, `modified`, `status`, `incident_id`, `reported_by`) VALUES
(1, 'HF sets installed in Entebbe communication center and operational', '2015-08-04 08:26:26', 1, 14, ''),
(2, 'HF sets installed in Entebbe communication center and operational', '2015-08-10 13:54:43', 1, 39, 'admin'),
(3, 'Well truncked network cables in building', '2015-08-11 05:37:16', 1, 37, 'admin'),
(4, 'Full scale performance in one months time', '2015-08-11 05:40:12', 1, 37, 'admin'),
(5, 'HF sets installed in Entebbe communication center and operational ', '2015-10-01 08:53:41', 1, 65, 'admin'),
(6, 'Direct land line telephone 0414320384 in Entebbe communication center and Operational ', '2015-10-01 08:54:07', 1, 65, 'admin'),
(7, 'a', '2015-10-01 11:07:08', 1, 67, 'admin'),
(8, 'good ', '2015-10-11 07:21:17', 1, 73, 'admin'),
(9, 'aaaaaaaa1', '2015-11-03 05:03:35', 1, 77, 'admin'),
(10, 'fff', '2015-11-08 11:17:41', 1, 40, 'admin'),
(11, 'z', '2015-12-16 07:30:02', 1, 88, 'sms'),
(12, 'test', '2016-01-19 10:29:18', 1, 52, 'admin'),
(13, 'Latest Contract documents ', '2016-01-20 06:24:18', 1, 98, 'admin'),
(14, 'eeeeeeeeeeeeeeeeeeeeeeeee', '2016-02-09 05:25:11', 1, 83, 'Samuel.B'),
(15, 'b1', '2016-02-09 05:31:44', 1, 86, 'admin'),
(16, 'Yes', '2016-06-25 02:07:54', 1, 72, 'admin'),
(17, 'Power meters are being purchased', '2016-06-25 04:30:03', 1, 126, 'bwire'),
(18, 'Yes', '2016-07-10 04:11:15', 1, 149, 'admin');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `existing_defenses`
--

INSERT INTO `existing_defenses` (`id`, `details`, `modified`, `status`, `incident_id`, `reported_by`) VALUES
(1, 'HF communication between Entebbe and Kinshasa ', '2015-07-28 08:31:22', 1, 1, ''),
(2, 'direct landline telephone ', '2015-07-28 08:31:22', 1, 1, ''),
(3, 'All controllers on duty are Trained and station validated', '2015-07-28 08:43:29', 1, 1, ''),
(4, 'procedure on vehicles, equipment, people crossing runway 12/30', '2015-07-28 13:35:37', 1, 11, ''),
(5, 'NONE', '2015-08-10 13:44:44', 1, 39, 'admin'),
(6, 'Purchase of new equip', '2015-08-11 05:29:10', 1, 37, 'admin'),
(7, 'Purchase of new equip', '2015-08-11 10:03:11', 1, 42, 'admin'),
(8, 'HF communication between Entebbe and Kinshasa ', '2015-10-01 10:49:17', 1, 60, 'admin'),
(9, ' direct land-line telephone ', '2015-10-01 10:49:29', 1, 60, 'admin'),
(10, 'Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil ', '2016-05-11 06:45:35', 1, 67, 'admin'),
(11, 'HF communication between Entebbe and Kinshasa.', '2016-05-11 06:45:48', 1, 68, 'admin'),
(12, 'Sed ut perspiciatis unde omnis iste natus error ', '2016-05-11 06:46:11', 1, 65, 'admin'),
(13, 'direct land-line telephone ', '2016-05-11 06:46:04', 1, 77, 'admin'),
(14, 'At vero eos et accusamus et iusto odio dignissimos ducimus qui', '2016-05-11 06:46:23', 1, 40, 'admin'),
(15, 'Nam libero tempore, cum soluta nobis est eligendi ', '2016-05-11 06:46:31', 1, 88, 'sms'),
(16, 'Et harum quidem rerum facilis est et expedita distinctio. ', '2016-05-11 06:46:41', 1, 50, 'admin'),
(17, 'running aerodrome maintenance Contractors    ', '2016-01-20 06:23:57', 1, 98, 'admin'),
(18, 'Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus', '2016-05-11 06:46:53', 1, 83, 'Samuel.B'),
(19, 'Itaque earum rerum hic tenetur a sapiente delectus', '2016-05-11 06:47:05', 1, 86, 'admin'),
(20, 'Install upgraded power meters', '2016-06-25 04:29:40', 1, 126, 'bwire'),
(21, 'setup safety department', '2016-07-10 02:32:11', 1, 145, 'admin'),
(22, 'setup safety departments', '2016-07-10 04:11:33', 1, 149, 'admin');

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
(1, 'Use of trolleys has been stopped.', '2015-07-25 08:33:34', 1, 11, ''),
(2, 'New tiles have been put in place.', '2015-07-25 10:31:42', 1, 11, ''),
(3, 'The air conditioner was replaced.', '2015-07-25 16:36:32', 1, 1, ''),
(4, 'Internal I.T team is working on it. Given them 2 days to handle.', '2015-07-27 14:31:15', 1, 13, ''),
(5, 'Internal IT failed and service provider has been contacted', '2015-08-04 14:37:31', 1, 13, ''),
(6, 'Service provider to tackle issue on 23rd of this month.', '2015-08-10 14:50:01', 1, 39, 'admin'),
(7, 'Loose cables were replaced but we are still waiting for further report on arrival of new equipment', '2015-08-11 05:50:05', 1, 37, 'admin'),
(8, 'Loose cables were replaced but we are still waiting for further report on arrival of new equipment', '2015-08-11 10:03:33', 1, 42, 'admin'),
(9, 'procurement is on going', '2015-11-03 05:51:06', 1, 77, 'admin'),
(10, 'New tiles have been put in place.', '2015-11-03 05:51:59', 1, 77, 'admin'),
(11, 'Internal I.T team is working on it.', '2015-11-03 05:54:50', 1, 77, 'admin'),
(12, 'Use of trolleys has been stopped.', '2015-11-03 05:55:27', 1, 77, 'admin');

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
(1, 'Increased supervision', '2015-07-28 08:52:12', 1, 1, 'admin', 'By increasing supervision, better results are expected', 'Yes'),
(2, 'Debriefs', '2015-07-28 08:52:12', 1, 1, 'admin', '', 'Yes'),
(3, 'Sensitisation on  Coordination procedures', '2015-07-28 08:52:31', 1, 1, 'admin', '', 'Yes'),
(4, 'Tarmacadamisimg  the perimeter road to accomodate low heavy equipment.  ', '2015-07-28 09:04:35', 1, NULL, '', '', ''),
(5, 'Tarmacadamisimg  the perimeter road to accomodate low heavy equipment.  ', '2015-07-28 09:05:37', 1, NULL, '', '', ''),
(6, 'Tarmacadamisimg  the perimeter road to accomodate low heavy equipment. ', '2015-07-28 09:06:16', 1, 1, 'admin', '', 'Yes'),
(7, 'Replace all server room wiring with up to date equipment. ', '2015-08-10 13:47:36', 1, 39, 'admin', 'No comment', 'Yes'),
(8, 'Train responsible staff on better safety methods', '2015-08-11 06:26:01', 1, 37, 'admin', 'NO COMMENT', 'Yes'),
(9, 'to purchase a new one', '2015-08-11 15:40:09', 1, 1, 'admin', 'please find out', 'N/A');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=150 ;

--
-- Dumping data for table `incidents`
--

INSERT INTO `incidents` (`id`, `risk_index`, `risk_index_category`, `number`, `occurrence`, `place`, `time`, `aircraft_registration`, `operator`, `departure_point`, `persons_on_board`, `date`, `reported_by`, `status`, `modified`, `category`, `brief_notes`, `recommendations`, `type_of_operation`, `person_responsible`, `main_category`, `reported_by_name`, `reported_by_department`, `reported_by_tel`, `reported_by_email`, `parent_occurrence`, `category_id`, `cause_id`, `other_cause_details`, `reported`, `reoccuring`, `date_reported`) VALUES
(1, '5A', 1, '', 'There is too much heat in tower due lack of airconditioning. This causes headache, low performance and sometimes we get dizzy and feel like faiting. This has gone on for a very long time and it gets worse day by day.', 'Tower', '12 PM', 'HE-09-122-U', '1', 'East', '', '2015-08-09', 'admin', 5, '2016-07-06 04:19:34', 'Other', '', '', 'Communication', 'MCNS', 'Hazard', '', '', '', '', NULL, NULL, NULL, '', 'Yes', 1, '2016-04-01'),
(2, '4A', 1, '', 'There is too much heat in tower', 'Tower', '12 PM', 'HE-09-122-K', '1', 'East', '12', '2016-04-01', 'admin', 3, '2016-06-30 00:33:58', 'OSHE', '', '', '', '', 'Incident', '', '', '', '', NULL, NULL, NULL, '', 'Yes', 1, '2016-04-01'),
(3, '3A', 1, '', 'The floor in the tower is slippery', 'Tower', '3 PM', '', '1', '', '', '2016-04-01', 'admin', 3, '2016-06-30 00:33:58', 'OSHE', '', '', '', '', 'Incident', '', '', '', '', NULL, NULL, NULL, '', 'Yes', 1, '2016-04-01'),
(4, '2A', 2, '', 'A track broke down on the runway', 'Runway', '5 AM', 'KA-23-567-B', '1', 'North wing', '134', '2015-10-09', 'admin', 3, '2016-06-30 00:35:38', 'Other', '', '', '', '', 'Hazard', '', '', '', '', NULL, NULL, NULL, '', 'Yes', 1, '2016-04-01'),
(5, '1A', 2, '', 'A track broke down on the runway', 'Tower', '12 PM', 'ABC-XX-211-K', '1', '', '', '2016-04-01', 'admin', 3, '2016-06-30 00:35:38', 'AVIATION', '', '', '', '', 'Incident', '', '', '', '', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(6, '5B', 1, '', 'A track broke down on the runway', 'PLACE 1', '12 PM', 'ABC-XX-211-K', 'OPERATOR A', 'DEPARTURE POINT A', '12', '2016-04-01', 'admin', 3, '2016-06-30 00:33:58', 'AVIATION', '', '', '', '', 'Incident', '', '', '', '', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(7, '4B', 1, '', 'A track broke down on the runway', 'PLACE 1', '5 AM', 'ABC-XX-211-K', 'OPERATOR A', 'DEPARTURE POINT B', '134', '2015-10-02', 'admin', 3, '2016-06-30 00:33:58', 'AVIATION', '', '', '', '', 'Incident', '', '', '', '', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(8, '3B', 2, '', 'The floor in the tower is slippery', 'PLACE 1', '12 PM', '', '', '', '', '2016-04-01', 'admin', 3, '2016-06-30 00:35:38', 'AVIATION', '', '', '', '', 'Incident', '', '', '', '', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(9, '2B', 2, '', 'A track broke down on the runway', 'PLACE 1', '12 PM', 'ABC-XX-211-K', 'OPERATOR A', 'DEPARTURE POINT A', '134', '2016-04-01', 'admin', 3, '2016-06-30 00:35:38', 'AVIATION', 'A track broke down on the runway because the driver didnt apply brakes.', '', '', '', 'Incident', '', '', '', '', NULL, NULL, NULL, '', 'Yes', 1, '2016-04-01'),
(10, '1B', 3, '', 'A track broke down on the runway', 'PLACE 1', '5 AM', '', '', '', '', '2016-04-01', 'admin', 5, '2016-06-30 00:36:45', 'AVIATION', 'A track broke down on the runway after the driver had been careless.', '', '', '', 'Incident', '', '', '', '', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(11, '5C', 1, '', 'A track broke down on the runway', 'PLACE 1', '3 PM', 'KA-23-567-B', 'OPERATOR A', 'DEPARTURE POINT A', '134', '2015-10-09', 'admin', 3, '2016-06-30 00:33:58', 'Other', 'A track broke down on the runway after the driver had walked away leaving the hand brake not in place.			', '', 'Communication', 'MCNS', 'Hazard', '', '', '', '', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(12, '4C', 2, '', 'Hanging wires in server room', 'Tower', '3 PM', '', '', '', '', '2015-10-11', 'admin', 3, '2016-06-30 00:35:38', 'Other', '', '', '', '', 'Hazard', '', '', '', '', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(13, '3C', 2, '', 'Hanging wires in server room', 'Tower', '12 PM', '', '', '', '', '2016-04-01', 'admin', 4, '2016-06-30 00:35:38', 'OSHE', 'Observed hanging wires in server room since yesterday.', '', '', '', 'Incident', '', '', '', '', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(14, '2C', 2, '', 'Hanging wires in server room', 'PLACE 1', '3 PM', '', '', '', '', '2015-10-08', 'admin', 3, '2016-06-30 00:35:38', 'Other', '', '', '', '', 'Hazard', '', '', '', '', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(15, '1C', 3, '', 'The floor in the tower is slippery', 'Tower', '5 AM', '', '', '', '', '2016-04-01', 'guest', 3, '2016-06-30 00:36:45', 'OSHE', '', '', '', '', 'Incident', '', '', '', '', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(16, '5D', 2, '', 'A track broke down on the runway', 'Tower', '3 PM', '', '', '', '', '2016-04-01', 'guest', 2, '2016-06-30 00:35:38', 'SERIOUS', '', '', '', '', 'Incident', '', '', '', '', NULL, NULL, NULL, '', 'Yes', 1, '2016-04-01'),
(17, '4D', 2, '', 'There is too much heat in tower', 'Tower', '3 PM', '', '', '', '', '2016-04-01', 'guest', 2, '2016-06-30 00:35:38', 'MINOR', '', '', '', '', 'Incident', '', '', '', '', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(18, '3D', 2, '', 'The floor in the tower is slippery', 'Tower', '12 PM', '', '', '', '', '2016-04-01', 'guest', 2, '2016-06-30 00:35:38', 'AVIATION', '', '', '', '', 'Hazard', '', '', '', '', NULL, NULL, NULL, '', 'Yes', 1, '2016-04-01'),
(19, '2D', 3, '', 'A track broke down on the runway', 'Tower', '3 PM', '', '', '', '', '2016-04-01', 'guest', 2, '2016-06-30 00:36:45', 'NONE', '', '', '', '', 'SITREP', '', '', '', '', NULL, NULL, NULL, '', 'Yes', 1, '2016-04-01'),
(20, '1D', 3, '', 'Runway is slippery', 'Tower', '5 AM', '', '', '', '', '2016-04-01', 'guest', 2, '2016-06-30 00:36:45', 'NONE', '', '', '', '', 'Issue', '', '', '', '', NULL, NULL, NULL, '', 'Yes', 1, '2016-04-01'),
(21, '5E', 2, '', 'Hanging wires in server room', 'Tower', '3 PM', '', '', '', '', '2016-04-01', 'admin', 6, '2016-06-30 00:35:38', 'NONE', '', '', '', '', 'SITREP', '', '', '', '', NULL, NULL, NULL, '', 'Yes', 1, '2016-04-01'),
(22, '4E', 2, '', 'Hanging wires in server room', 'Tower', '5 AM', '', '', '', '', '2016-04-01', 'admin', 3, '2016-06-30 00:35:38', 'NONE', '', '', '', '', 'SITREP', '', '', '', '', NULL, NULL, NULL, '', 'Yes', 1, '2016-04-01'),
(23, '3E', 3, '', 'Loose door', 'Area Control Center', '12 PM', '', '', '', '', '2016-04-01', 'admin', 5, '2016-06-30 06:28:54', 'NONE', '', '', '', '', 'Issue', '', '', '', '', NULL, NULL, NULL, '', 'Yes', 1, '2016-04-01'),
(24, '2E', 3, '', 'A track broke down on the runway', 'Approach', '3 PM', '', '', '', '', '2016-04-01', 'guest', 3, '2016-06-30 00:36:45', 'NONE', '', '', '', '', 'Issue', '', '', '', '', NULL, NULL, NULL, '', 'Yes', 1, '2016-04-01'),
(25, '1E', 3, '', 'Runway is slippery', 'Approach', '12 PM', '', '', '', '', '2016-04-01', 'guest', 3, '2016-06-30 00:36:45', 'NONE', '', '', '', '', 'Issue', '', '', '', '', NULL, NULL, NULL, '', 'Yes', 1, '2016-04-01'),
(26, '5A', 1, '', 'Loose door', 'Area Control Center', '3 PM', '', '', '', '', '2016-04-01', 'admin', 3, '2016-06-30 00:33:58', 'NONE', 'Loose door in the area control center', '', '', '', 'Issue', 'admin', 'DUTY OFFICER', '', 'info@caauganda.com', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(27, '5A', 1, '', 'The floor in the tower is slippery', 'Tower', '5 AM', '', '', '', '', '2016-04-01', 'guest', 3, '2016-06-30 00:33:58', 'NONE', '', '', '', '', 'Issue', 'ronald', 'sms', '0761221334', 'ronald@gmail.com', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(28, '5A', 1, '', 'Hanging wires in server room', 'Tower', '12 PM', '', '', '', '', '2016-04-01', 'guest', 2, '2016-06-30 00:33:58', 'SERIOUS', '', '', '', '', 'Incident', 'ronald', 'sms', '0761221334', 'ronald@gmail.com', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(29, '5A', 1, '', 'Truck broke down due to porthole on runway', 'Approach', '12 PM', '', '', '', '', '2016-04-01', 'guest', 2, '2016-06-30 00:33:58', 'OSHE', '', '', '', '', 'Hazard', 'ronald', 'sms', '0761221334', 'ronald@gmail.com', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(30, '5B', 1, 'HZD/A/30/15', 'Runway is slippery', 'Approach', '3 PM', '', '', '', '', '2016-04-01', 'guest', 2, '2016-06-30 00:33:58', 'AVIATION', '', '', '', '', 'Hazard', 'ronald', 'sms', '0761221334', 'ronald@gmail.com', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(31, '5B', 1, '', 'Hanging wires in server room', 'Area Control Center', '3 PM', '', '', '', '', '2016-04-01', 'guest', 2, '2016-06-30 00:33:58', 'MINOR', '', '', '', '', 'Incident', 'ronald', 'sms', '0761221334', 'ronald@gmail.com', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(32, '5B', 1, '', 'A track broke down on the runway', 'Approach', '12 PM', '', '', '', '', '2016-04-01', 'guest', 2, '2016-06-30 00:33:58', 'ACCIDENT', '', '', '', '', 'Incident', 'ronald', 'sms', '0761221334', 'ronald@gmail.com', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(33, '5B', 1, 'INS/S/33/15', 'Loose door', 'Area Control Center', '3 PM', '', '', '', '', '2016-04-01', 'guest', 2, '2016-06-30 00:33:58', 'SERIOUS', '', '', '', '', 'Incident', 'ronald', 'sms', '0761221334', 'ronald@gmail.com', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(34, '5B', 1, 'INS/S/34/15', 'A track broke down on the runway', 'Approach', '5 AM', '', '', '', '', '2016-04-01', 'guest', 2, '2016-06-30 00:33:58', 'SERIOUS', '', '', '', '', 'Incident', '', '', '', '', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(35, '5B', 1, 'INS/O/35/15', 'Loose door', 'Tower', '3 PM', '', '', '', '', '2016-04-01', 'guest', 2, '2016-06-30 00:33:58', 'OTHER', '', '', '', '', 'Incident', 'ronald', 'sms', '0761221334', 'ronald@gmail.com', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(36, '2D', 3, 'HZD/O/36/15', 'Fire in server room', 'Area Control Center', '3 PM', '', '', '', '', '2016-04-01', 'admin', 2, '2016-06-30 00:36:45', 'OSHE', '', '', '', '', 'Hazard', 'admin', 'DUTY OFFICER', '', 'info@caauganda.com', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(37, '5B', 1, '', 'Loose door', 'Approach', '01:07', '', '', '', '', '2016-04-01', 'guest', 3, '2016-06-30 00:33:58', 'NONE', '', '', '', '', 'Issue', '', '', '', '', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(38, '5B', 1, '', 'Loose door', 'Approach', '03:10', '', '', '', '', '2015-08-10', 'guest', 5, '2016-06-30 00:33:58', 'NONE', '', '', '', '', 'SITREP', 'ronald', 'sms', '0761221334', 'ronald@gmail.com', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(39, '5B', 1, '', 'Fire in server room', 'Area Control Center', '13:09', '', '', '', '', '2015-08-10', 'admin', 4, '2016-06-30 00:33:58', 'NONE', '', '', '', '', 'Issue', '', '', '', '', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(40, '2D', 3, 'HZD/A/40/15', 'Fire in server room', 'Approach', '13:09', '', '', '', '', '2015-08-10', 'admin', 3, '2016-06-30 00:36:45', 'AVIATION', '', '', '', '', 'Hazard', '', '', '', '', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(41, '2D', 3, '', 'Runway is slippery', 'Approach', '16:30', '', '', '', '', '2015-08-10', 'admin', 1, '2016-06-30 00:36:45', 'NONE', '', '', '', '', 'SITREP', '', '', '', '', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(42, '2D', 3, 'INS/M/42/15', 'Loose door', 'Approach', '01:01', '', '', '', '', '2015-08-11', 'guest', 5, '2016-06-30 00:36:45', 'MINOR', '', '', '', '', 'Incident', '', '', '', '', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(43, '2D', 3, 'INS/A/43/15', 'A track broke down on the runway', 'Area Control Center', '04:12', '', '', '', '', '2015-08-11', 'guest', 2, '2016-06-30 00:36:45', 'ACCIDENT', '', '', '', '', 'Incident', 'ronald', 'sms', '0761221334', 'ronald@gmail.com', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(44, '2D', 3, 'INS/S/44/15', 'Fire in server room', 'Area Control Center', '01:04', '', '', '', '', '2015-08-11', 'guest', 2, '2016-06-30 00:36:45', 'SERIOUS', '', '', '', '', 'Incident', 'ronald', 'sms', '0761221334', 'ronald@gmail.com', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(45, '2D', 3, '', 'Loose door', 'Area Control Center', '07:30', '', '', '', '', '2015-08-04', 'admin', 3, '2016-06-30 00:36:45', 'NONE', 'Door in sms department is loose', '', '', '', 'Issue', 'admin', 'DUTY OFFICER', '', 'info@caauganda.com', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(46, '2D', 3, 'HZD/A/46/15', 'licking tank', 'Approach', '11:15', '', '', '', '', '2015-08-11', 'admin', 3, '2016-06-30 00:36:45', 'AVIATION', 'licking tank observed', '', '', '', 'Hazard', 'admin', 'DUTY OFFICER', '', 'info@caauganda.com', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(47, '2D', 3, '', 'Loose door', 'Unknown', '01:02', '', '', '', '', '2015-08-26', 'guest', 3, '2016-06-30 00:36:45', 'NONE', '', '', '', '', 'Issue', '', '', '', '', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(48, '2D', 3, 'HZD/A/48/15', 'Low morale in operational staff', 'SMS office', '03:06', '', '', '', '', '2015-09-02', 'admin', 3, '2016-06-30 00:36:45', 'AVIATION', 'There is low commitment of staff to accomplish their duties', '', '', '', 'Hazard', 'admin', 'DUTY OFFICER', '', 'info@caauganda.com', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(49, '2D', 3, 'INS/A/49/15', 'Heating Unit', 'Control Tower', '01:10', '', '', '', '', '2015-09-14', 'guest', 2, '2016-06-30 00:36:45', 'ACCIDENT', 'Observation made today', '', '', '', 'Incident', '', '', '', '', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(50, '2D', 3, '', 'Fire in Parking Yard', 'Parking Yard B', '04:15', '', '', '', '', '2015-09-14', 'admin', 3, '2016-06-30 00:36:45', 'NONE', 'Fire in Parking Yard', '', '', '', 'Issue', 'admin', 'DUTY OFFICER', '', 'info@caauganda.com', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(51, '2D', 3, '', 'Fire in Parking Yard', 'Parking Yard', 'HOUR:MINUTE', '', '', '', '', '2015-09-14', 'admin', 5, '2016-06-30 00:36:45', 'NONE', 'Fire in Parking Yard', '', '', '', 'Hazard', 'admin', 'DUTY OFFICER', '', 'info@caauganda.com', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(52, '2D', 3, '', 'Road block', 'Parking Yard', '4:00 PM', '', '', '', '', '2015-09-17', 'admin', 3, '2016-06-30 00:36:45', 'NONE', 'Road has been blocked due to the fire that occured in the parking yard.', '', '', '', 'Issue', '', '', '', '', 51, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(53, '2D', 3, '', 'Truck stuck on runway', 'Runway', '3:00PM', '', '', '', '', '2015-09-23', 'admin', 6, '2016-06-30 00:36:45', 'NONE', 'A yellow heavy truck is stack on the runway and needs to be roomed asap.', '', '', '', 'SITREP', '', '', '', '', NULL, 7, 6, '', 'Yes', 0, '2016-04-01'),
(54, '2D', 3, '', 'Broken crane on loading bay', 'Loading bay', '12:00AM', '', '', '', '', '2015-09-24', 'admin', 1, '2016-06-30 00:36:45', 'NONE', '', '', '', '', 'SITREP', '', '', '', '', NULL, 13, 9, '', 'Yes', 0, '2016-04-01'),
(55, '2D', 3, '', 'Broken crane on loading bay', 'Loading bay', '12:00AM', '', '', '', '', '2015-09-24', 'admin', 1, '2016-06-30 00:36:45', 'NONE', '', '', '', '', 'SITREP', '', '', '', '', NULL, 4, 9, '', 'Yes', 0, '2016-04-01'),
(56, '2D', 3, '', 'Broken crane on loading bay', 'Loading bay', '12:00AM', '', '', '', '', '2015-09-24', 'admin', 1, '2016-06-30 00:36:45', 'NONE', '', '', '', '', 'SITREP', '', '', '', '', NULL, 4, 1, '', 'Yes', 0, '2016-04-01'),
(57, '2D', 3, '', 'Fumes from controller van', 'Transit', '09:52', '', '', '', '', '2015-09-25', 'guest', 3, '2016-06-30 00:36:45', 'NONE', 'End route Kampala controller van makes fumes', '', '', '', 'Issue', 'Rogers. W', 'SMS', '078855446', 'rwanzunula@caa.co.ug', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(58, '2D', 3, 'INS/A/58/15', 'Exposure to poisonous gas', 'Transit', '1212', '', '', '', '', '2015-09-25', 'admin', 2, '2016-06-30 00:36:45', 'ACCIDENT', '', '', '', '', 'Incident', '', '', '', '', 57, 13, 2, '', 'Yes', 0, '2016-04-01'),
(59, '2D', 3, 'HZD/O/59/15', 'Exposure to poisonous gas', 'Transit', '12.12', '', '', '', '', '2015-09-25', 'admin', 3, '2016-06-30 00:36:45', 'OSHE', '', '', '', '', 'Hazard', '', '', '', '', 58, 13, 2, '', 'Yes', 0, '2016-04-01'),
(60, '2D', 3, 'HZD/A/60/15', 'Exposure to poisonous gas', 'Transit', '1212', '', '', '', '', '2015-09-25', 'admin', 3, '2016-06-30 00:36:45', 'AVIATION', '', '', '', '', 'Hazard', '', '', '', '', 47, 13, 2, '', 'Yes', 0, '2016-04-01'),
(61, '2D', 3, '', 'Exposure to poisonous gas', 'Transit', 'HOUR:MINUTE', '', '', '', '', '2015-09-30', 'guest', 3, '2016-06-30 00:36:45', 'NONE', '', '', '', '', 'Issue', 'sksk', 'sksk', '099', 'p@f.com', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(62, '2D', 3, '', 'too much noise in premises', 'tower', '04:15', '', '', '', '', '2015-09-30', 'admin', 3, '2016-06-30 00:36:45', 'NONE', '', '', '', '', 'Issue', 'admin', 'DUTY OFFICER', '', 'info@caauganda.com', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(63, '2D', 3, '', 'too much noise in premises', 'tower', '04:15', '', '', '', '', '2015-09-30', 'admin', 3, '2016-06-30 00:36:45', 'NONE', '', '', '', '', 'Issue', 'admin', 'DUTY OFFICER', '', 'info@caauganda.com', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(64, '2D', 3, '', 'locking system in store is faulty', 'store', '06:30', '', '', '', '', '2015-09-30', 'guest', 3, '2016-06-30 00:36:45', 'NONE', '', '', '', '', 'Issue', 'mark', 'systems', '0701198000', 'bwire@programmer.net', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(65, '2D', 3, 'HZD/A/65/15', 'Aircraft  converging at Bunia DRC FIR   without ATC coordination. ', 'Bunia', '01:30', '', '', '', '', '2015-09-30', 'Samuel.B', 3, '2016-06-30 00:36:45', 'AVIATION', '', '', '', '', 'Hazard', 'Samuel.B', 'Programmer', '+256701198000', 'bwire@programmer.net', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(66, '2D', 3, '', 'Chairs in Tower are too low', 'Tower', '02:00', '', '', '', '', '2015-10-01', 'guest', 5, '2016-06-30 06:25:24', 'NONE', '', '', '', '', 'Issue', 'Wanzunula', 'SMS', '+256702953774', 'rwanzunula@caa.co.ug', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(67, '2D', 3, 'HZD/A/67/15', 'Lose of situational awareness', 'Tower', '03:00', '', '', '', '', '2015-10-01', 'guest', 3, '2016-06-30 00:36:45', 'AVIATION', '', '', '', '', 'Hazard', '', '', '', '', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(68, '2D', 3, 'HZD/A/68/15', 'Staff broke back bone', 'Tower', '02:00', 'q', 'OPERATOR A', 'DEPARTURE POINT A', '1', '2015-10-01', 'admin', 3, '2016-06-30 00:36:45', 'AVIATION', '', '', '', '', 'Hazard', '', '', '', '', 66, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(69, '2D', 3, 'HZD/A/69/15', 'Deliberate strike of Tower operators', 'Tower', '02:00', '', '', '', '', '2015-10-02', 'admin', 2, '2016-06-30 00:36:45', 'AVIATION', '', '', '', '', 'Hazard', '', '', '', '', 66, NULL, 1, 'Non', 'Yes', 0, '2016-04-01'),
(70, '2D', 3, '', 'Wind around tower', 'Tower', '01:30', '', '', '', '', '2015-10-02', 'Wanzunula.R', 3, '2016-06-30 00:36:45', 'NONE', '', '', '', '', 'Hazard', 'Wanzunula.R', 'PAIMO-SMS/QA', '+256702953774', 'bwire@programmer.net', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(71, '2D', 3, '', 'Contoller working with an invalid license', 'Soroti', '05:12', '', '', '', '', '2015-10-02', 'Wanzunula.R', 3, '2016-06-30 00:36:45', 'NONE', '', '', '', '', 'Incident', 'Wanzunula.R', 'PAIMO-SMS/QA', '+256702953774', 'bwire@programmer.net', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(72, '2D', 3, '', 'Controller working with an invalid license', 'Soroti', 'HOUR:MINUTE', '', '', '', '', '2016-06-23', 'admin', 3, '2016-06-30 00:36:45', 'NONE', '', '', '', '', 'Hazard', 'Wanzunula.R', 'PAIMO-SMS/QA', '+256702953774', 'bwire@programmer.net', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(73, '2D', 3, '', '', 'Soroti', 'HOUR:MINUTE', '', '', '', '', '2015-10-02', 'admin', 3, '2016-06-30 00:36:45', 'NONE', '', '', '', '', 'Hazard', '', '', '', '', 72, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(74, '2D', 3, 'HZD/A/74/15', '', 'Soroti', 'HOUR:MINUTE', '', '', '', '', '2015-10-02', 'admin', 2, '2016-06-30 00:36:45', 'AVIATION', '', '', '', '', 'Hazard', '', '', '', '', 72, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(75, '2D', 3, '', 'Controller working with an invalid license', 'Soroti', '09:30', '', '', '', '', '2015-11-03', 'guest', 1, '2016-06-30 00:36:45', 'NONE', '', '', '', '', 'Issue', '', '', '', '', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(76, '2D', 3, 'HZD/A/76/15', 'open socket', 'control room', '09:00', '', '', '', '', '2015-11-03', 'guest', 2, '2016-06-30 00:36:45', 'AVIATION', '', '', '', '', 'Hazard', '', '', '', '', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(77, '2D', 3, 'HZD/O/77/15', 'Trees blocking run way view', 'Tower', '09:30', 'ER522Q', '', '', 'mwesigye', '2015-11-03', 'admin', 4, '2016-06-30 00:36:45', 'OSHE', '', '', '', '', 'Hazard', '', '', '', '', 75, NULL, 9, 'xx', 'Yes', 0, '2016-04-01'),
(78, '2D', 3, '', 'Trees blocking run way view', 'Tower', '04:10', '34GH-991', 'OPERATOR A', 'DEPARTURE POINT A', 'mwesigye', '2015-11-03', 'admin', 1, '2016-06-30 00:36:45', 'NONE', '', '', '', '', 'SITREP', 'admin', 'DUTY OFFICER', '', 'info@caauganda.com', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(79, '2D', 3, '', 'Trees blocking run way view', 'Tower', '02:03', '', '', '', '', '2015-11-08', 'admin', 1, '2016-06-30 00:36:45', 'NONE', '', '', '', '', 'Issue', 'admin', 'DUTY OFFICER', '', 'info@caauganda.com', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(80, '2D', 3, '', 'Trees blocking run way view', 'Control Room', 'HOUR:MINUTE', '', '', '', '', '2015-11-02', 'admin', 1, '2016-06-30 00:36:45', 'NONE', '', '', '', '', 'Issue', 'admin', 'DUTY OFFICER', '', 'info@caauganda.com', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(81, '2D', 3, '', 'Trees blocking run way view', 'Tower', '03:04', '', '', '', '', '2015-11-10', 'admin', 1, '2016-06-30 00:36:45', 'NONE', '', '', '', '', 'Issue', 'admin', 'DUTY OFFICER', '', 'info@caauganda.com', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(82, '2D', 3, '', 'Trees blocking run way view', 'Control Room', '03:04', '', '', '', '', '2015-11-08', 'admin', 1, '2016-06-30 00:36:45', 'NONE', '', '', '', '', 'Incident', 'admin', 'DUTY OFFICER', '', 'info@caauganda.com', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(83, '2D', 3, 'HZD/A/83/16', 'Trees blocking run way view', 'Tower', '03:05', '', '', '', '', '2015-11-07', 'admin', 3, '2016-06-30 00:36:45', 'AVIATION', '', '', 'Communication', '', 'Hazard', 'admin', 'DUTY OFFICER', '', 'info@caauganda.com', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(84, '2D', 3, '', 'Trees blocking run way view', 'Tower', '03:07', '', '', '', '', '2015-12-16', 'guest', 1, '2016-06-30 00:36:45', 'NONE', '', '', '', '', 'Issue', '', '', '', '', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(85, '2D', 3, '', 'Trees blocking run way view', 'Tower', '04:02', '', '', '', '', '2015-12-16', 'guest', 1, '2016-06-30 00:36:45', 'NONE', '', '', '', '', 'Incident', '', '', '', '', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(86, '2D', 3, 'HZD/A/86/16', 'Trees blocking run way view', 'Tower', '04:06', '', '', '', '', '2015-12-16', 'guest', 3, '2016-06-30 00:36:45', 'AVIATION', '', '', 'Communication', '', 'Hazard', '', '', '', '', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(87, '2D', 3, '', 'Trees blocking run way view', 'Tower', '05:04', '', '', '', '', '2015-12-16', 'guest', 1, '2016-06-30 00:36:45', 'NONE', '', '', '', '', 'Issue', 'Rogers. W', '444', '44444', 'rwanzunula@gmail.com', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(88, '2D', 3, 'HZD/O/88/15', 'Trees blocking run way view', 'Control Room', '03:30', '', '', '', '', '2015-12-15', 'sms', 3, '2016-06-30 00:36:45', 'OSHE', '', '', '', '', 'Hazard', 'sms', 'DUTY OFFICER', '', '', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(89, '2D', 3, '', 'Trees blocking run way view', 'Tower', '04:02', '', '', '', '', '2015-12-29', 'admin', 3, '2016-06-30 00:36:45', 'NONE', '', '', '', '', 'Issue', '', '', '', '', 85, NULL, 2, '', 'Yes', 0, '2016-04-01'),
(90, '2D', 3, '', 'Trees blocking run way view', 'Tower', '9:23', '', '', '', '', '2016-01-20', 'admin', 3, '2016-06-30 00:36:45', 'NONE', '', '', '', '', 'Issue', '', '', '', '', NULL, NULL, 1, 'test', 'Yes', 0, '2016-04-01'),
(91, '2D', 3, '', 'Trees blocking run way view', 'Tower', '10:54', '', '', '', '', '2016-01-20', 'admin', 1, '2016-06-30 00:36:45', 'NONE', '', '', '', '', 'Issue', '', '', '', '', NULL, NULL, NULL, 'x1', 'Yes', 0, '2016-04-01'),
(92, '2D', 3, 'HZD/A/92/16', 'Trees blocking run way view', 'Tower', '1:02', '', '', '', '', '2016-01-20', 'admin', 2, '2016-06-30 00:36:45', 'AVIATION', '', '', '', '', 'Hazard', '', '', '', '', NULL, NULL, NULL, 'tes', 'Yes', 0, '2016-04-01'),
(93, '2D', 3, '', 'Trees blocking run way view', 'Tower', '2:12', '', '', '', '', '2016-01-20', 'admin', 1, '2016-06-30 00:36:45', 'NONE', '', '', '', '', 'Issue', '', '', '', '', 91, NULL, 1, 'test', 'Yes', 0, '2016-04-01'),
(94, '2D', 3, '', 'Trees blocking run way view', 'Tower', '5:09', '', '', '', '', '2016-01-20', 'admin', 1, '2016-06-30 00:36:45', 'NONE', '', '', '', '', 'Incident', '', '', '', '', 93, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(95, '2D', 3, '', 'Trees blocking run way view', 'tower', '03:15', '', '', '', '', '2016-01-20', 'guest', 1, '2016-06-30 00:36:45', 'NONE', '', '', '', '', 'Issue', 'Test Namw', 'Test', '090', 'krabz01@gmail.com', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(96, '2D', 3, '', 'Trees blocking run way view', 'Tower', 'HOUR:MINUTE', '', '', '', '', '2016-01-27', 'guest', 1, '2016-06-30 00:36:45', 'NONE', '', '', '', '', 'Issue', 'test', 'De', '809', 'test', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(97, '2D', 3, '', 'Trees blocking run way view', 'Tower', '03:03', '', '', '', '', '2016-01-20', 'Samuel.B', 5, '2016-06-30 00:36:45', 'NONE', '', '', '', '', 'Incident', 'Samuel.B', 'Programmer', '+256701198000', 'bwire@programmer.net', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(98, '2D', 3, 'HZD/A/98/16', 'Trees blocking run way view', 'control tower', '16:13', '', '', '', '', '2016-01-20', 'Samuel.B', 3, '2016-06-30 00:36:45', 'AVIATION', '', '', '', '', 'Hazard', 'Samuel.B', 'Programmer', '+256701198000', 'bwire@programmer.net', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(99, '2D', 3, 'HZD/O/99/16', 'Environmental Civil Suit', 'control tower', '16:13', '', '', '', '', '2016-01-20', 'admin', 3, '2016-06-30 00:36:45', 'OSHE', '', '', 'Communication', '', 'Hazard', '', '', '', '', 98, NULL, 2, 'Cutting down the trees', 'Yes', 0, '2016-04-01'),
(100, '2D', 3, 'HZD/O/100/16', 'Environmental Civil Suit', 'Tower', '02:05', '', '', '', '', '2016-02-09', 'guest', 2, '2016-06-30 00:36:45', 'OSHE', '', '', 'Communication', '', 'Hazard', 'Rogers', 'yyuty', '', 'rwanzunula@caa.co.ug', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(101, '2D', 3, '', 'Trees blocking run way view', 'entebbe', '20:12', '', '', '', '', '2016-02-09', 'guest', 1, '2016-06-30 00:36:45', 'NONE', '', '', '', '', 'Issue', '', '', '0712493893', 'amwesige@caa.co.ug', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(102, '2D', 3, 'INS/S/102/16', 'Trees blocking run way view', 'entebbe', '19:00', '', '', '', '', '2016-02-09', 'guest', 2, '2016-06-30 00:36:45', 'SERIOUS', '', '', '', '', 'Incident', '', '', '', 'mwesigea@gmail.com', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(103, '2D', 3, '', 'Trees blocking run way view', 'Runway', '02:05', '', '', '', '', '2016-02-09', 'guest', 1, '2016-06-30 00:36:45', 'NONE', '', '', '', '', 'Issue', 'wanzunula Rogers', 'SMS', '0772953774', 'rwanzunula@caa.co.ug', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(104, '2D', 3, '', 'Trees blocking run way view', 'Runway', '08:16', 'KL AirLines', 'OPERATOR A', 'DEPARTURE POINT A', 'mwesigye', '2016-02-09', 'Samuel.B', 5, '2016-06-30 00:36:45', 'NONE', '', '', '', '', 'SITREP', 'Samuel.B', 'Programmer', '+256701198000', 'bwire@programmer.net', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(105, '2D', 3, 'INS/S/105/16', 'Trees blocking run way view', 'Runway', '2323', '', '', '', '', '2016-02-09', 'admin', 2, '2016-06-30 00:36:45', 'SERIOUS', '', '', '', '', 'Incident', '', '', '', '', NULL, NULL, 3, '34', 'Yes', 0, '2016-04-01'),
(106, '2D', 3, 'INS/S/106/16', 'Trees blocking run way view', 'Runway', '2323', '', '', '', '', '2016-02-09', 'admin', 2, '2016-06-30 00:36:45', 'SERIOUS', '', '', '', '', 'Incident', '', '', '', '', NULL, NULL, 2, 'jjjjj', 'Yes', 0, '2016-04-01'),
(107, '2D', 3, '', 'Trees blocking run way view', 'Runway', '12:54', '', '', '', '', '2016-02-16', 'admin', 3, '2016-06-30 00:36:45', 'NONE', '', '', '', '', 'Hazard', '', '', '', '', NULL, NULL, 1, 'test', 'Yes', 0, '2016-04-01'),
(108, '2D', 3, 'HZD/A/108/16', 'Trees blocking run way view', 'Runway', '12:24', '', '', '', '', '2016-02-16', 'admin', 3, '2016-06-30 00:36:45', 'AVIATION', 'Plus This and that', '', '', '', 'Hazard', '', '', '', '', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(109, '2D', 3, '', 'Trees blocking run way view', 'Runway', '08:30', 'KL AirLines', 'muhumuza', 'point b', 'muhumuza', '2016-02-21', 'admin', 1, '2016-06-30 00:36:45', 'NONE', '', '', '', '', 'SITREP', 'admin', 'DUTY OFFICER', '', 'info@caauganda.com', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(110, '2D', 3, '', 'Bird Strick', 'Runway', 'HOUR:MINUTE', 'KL AirLines', 'KL AirLines', 'KL AirLines', 'kwesiga', '2016-03-02', 'Samuel.B', 1, '2016-06-30 00:36:45', 'NONE', '', '', '', '', 'SITREP', 'Samuel.B', 'Programmer', '+256701198000', 'bwire@programmer.net', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(111, '2D', 3, '', 'Tresspass by unknown men', 'Behind tower building', 'HOUR:MINUTE', '', '', '', '', '2016-05-25', 'admin', 1, '2016-06-30 00:36:45', 'NONE', '', '', '', '', 'Issue', 'admin', 'DUTY OFFICER', '', 'info@caauganda.com', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(112, '2D', 3, '', 'Explosion in server room', 'Server room', '1:09', '', '', '', '', '2016-06-19', 'admin', 1, '2016-06-30 00:36:45', 'NONE', '', '', '', '', 'Issue', '', '', '', '', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(113, '2D', 3, '', 'OCCURRENCE', 'PLACE', 'HOUR:MINUTE', '', '', '', '', '2016-06-19', 'admin', 1, '2016-06-30 00:36:45', 'NONE', '', '', '', '', 'Issue', 'admin', 'DUTY OFFICER', '', 'info@caauganda.com', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(114, '2D', 3, '', 'OCCURRENCE', 'PLACE', 'HOUR:MINUTE', '', '', '', '', '2016-06-19', 'admin', 3, '2016-06-30 00:36:45', 'NONE', '', '', '', '', 'Issue', 'admin', 'DUTY OFFICER', '', 'info@caauganda.com', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(115, '2D', 3, '', 'Explosion in server room', 'Server room', '01:06', '', '', '', '', '2016-06-19', 'admin', 1, '2016-06-30 00:36:45', 'NONE', '', '', '', '', 'Issue', 'admin', 'DUTY OFFICER', '', 'info@caauganda.com', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(116, '2D', 3, '', 'Explosion in server room', 'Server room', '05:11', '', '', '', '', '2016-06-19', 'admin', 1, '2016-06-30 00:36:45', 'NONE', '', '', '', '', 'Issue', 'admin', 'DUTY OFFICER', '', 'info@caauganda.com', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(117, '2D', 3, '', 'Explosion in server room', 'Server room', '04:09', '', '', '', '', '2016-06-19', 'admin', 1, '2016-06-30 00:36:45', 'NONE', '', '', '', '', 'Issue', 'admin', 'DUTY OFFICER', '', 'info@caauganda.com', NULL, NULL, NULL, '', 'Yes', 1, '2016-04-01'),
(118, '2D', 3, '', 'Explosion in server room', 'Server room', 'HOUR:10', '', '', '', '', '2016-06-13', 'admin', 1, '2016-06-30 00:36:45', 'NONE', '', '', '', '', 'Issue', 'admin', 'DUTY OFFICER', '', 'info@caauganda.com', NULL, NULL, NULL, '', 'Yes', 0, '2016-04-01'),
(119, '2D', 3, '', 'Explosion in server room', 'Server room', '16:11', '', '', '', '', '2016-06-07', 'admin', 1, '2016-06-30 00:36:45', 'NONE', '', '', '', '', 'Issue', 'admin', 'DUTY OFFICER', '', 'info@caauganda.com', NULL, NULL, NULL, '', 'Yes', 1, '2016-04-01'),
(120, '2D', 3, '', 'Explosion in server room', 'Server room', '12:04', '', '', '', '', '2016-06-01', 'admin', 1, '2016-06-30 00:36:45', 'NONE', '', '', '', '', 'Issue', '', '', '', '', NULL, NULL, NULL, '', 'Yes', 1, '2016-04-01'),
(121, '2D', 3, '', 'Explosion in server room', 'Server room', '06:08', '', '', '', '', '2016-06-06', 'admin', 1, '2016-06-30 00:36:45', 'NONE', '', '', '', '', 'Issue', 'admin', 'DUTY OFFICER', '', 'info@caauganda.com', NULL, NULL, NULL, '', 'Yes', 1, '2016-06-19'),
(122, '2D', 3, '', 'Explosion in server room', 'Server room', '12:04', '', '', '', '', '2016-06-23', 'admin', 3, '2016-06-30 00:36:45', 'NONE', '', '', '', '', 'Hazard', '', '', '', '', NULL, NULL, NULL, '', 'Yes', 0, '2016-06-23'),
(123, '2D', 3, '', 'Explosion in server room', 'Server room', '00:04', 'AIRCRAFT REG', 'OPERATOR', 'DEPATURE POINT', 'ON BOARD', '2016-06-25', 'admin', 1, '2016-06-30 00:36:45', 'NONE', '', '', '', '', 'SITREP', 'admin', 'DUTY OFFICER', '', 'info@caauganda.com', NULL, NULL, NULL, '', 'Yes', 0, '2016-06-25'),
(124, '2D', 3, '', 'Explosion in server room', 'Server room', '00:04', 'AIRCRAFT REG', 'OPERATOR', 'DEPATURE POINT', 'ON BOARD', '2016-06-25', 'admin', 1, '2016-06-30 00:36:45', 'NONE', '', '', '', '', 'SITREP', 'admin', 'DUTY OFFICER', '', 'info@caauganda.com', NULL, NULL, NULL, '', 'Yes', 0, '2016-06-25'),
(125, '2D', 3, '', 'Explosion in server room', 'Server room', 'HOUR:MINUTE', 'AIRCRAFT REG', 'OPERATOR', 'DEPATURE POINT', 'ON BOARD', '2016-06-25', 'admin', 1, '2016-06-30 00:36:45', 'NONE', '', '', '', '', 'SITREP', 'admin', 'DUTY OFFICER', '', 'info@caauganda.com', NULL, NULL, NULL, '', 'Yes', 0, '2016-06-25'),
(126, '2D', 3, '', 'Explosion in server room', 'Server room', 'HOUR:MINUTE', '', '', '', '', '2016-06-25', 'admin', 3, '2016-06-30 00:36:45', 'NONE', '', '', 'Power threats', '', 'Hazard', 'admin', 'DUTY OFFICER', '', 'info@caauganda.com', NULL, NULL, NULL, '', 'Yes', 0, '2016-06-25'),
(127, '2D', 3, '', 'Accident happened at Tower', 'SMS office', '04:09', '', 'Samuel', '', '2', '2016-06-14', 'bwire', 1, '2016-06-30 00:36:45', 'NONE', '', '', '', '', 'SITREP', 'bwire', 'Programmer', '+256701198000', 'bwire@programmer.net', NULL, NULL, NULL, '', 'Yes', 0, '2016-06-25'),
(128, '2D', 3, '', 'pot hole on the runway', 'tower', '05:25', '', '', '', '', '2016-06-27', 'guest', 1, '2016-06-30 00:36:45', 'NONE', '', '', '', '', 'Issue', '', '', '', 'ekakama@caa.co.ug', NULL, NULL, NULL, '', 'Yes', 0, '2016-06-27'),
(129, '2D', 3, '', 'faulty air conditioner', 'apac', 'HOUR:MINUTE', '', '', '', '', '2000-09-09', 'matovu', 1, '2016-06-30 00:36:45', 'NONE', '', '', '', '', 'Incident', 'matovu', 'SMS Officer', '', 'davimato@yahoo.com', NULL, NULL, NULL, '', 'Yes', 1, '2016-06-28'),
(130, '2D', 3, '', 'poor telephone arrangement', 'abim', 'HOUR:MINUTE', '', '', '', '', '2001-01-01', 'matovu', 1, '2016-06-30 00:36:45', 'NONE', '', '', '', '', 'Incident', 'matovu', 'SMS Officer', '', 'davimato@yahoo.com', NULL, NULL, NULL, '', 'Yes', 1, '2016-06-28'),
(131, '2D', 3, '', 'aircraft on taxiways', 'kalong', 'HOUR:MINUTE', '', '', '', '', '2010-06-20', 'matovu', 1, '2016-06-30 00:36:45', 'NONE', '', '', '', '', 'Hazard', 'matovu', 'SMS Officer', '', 'davimato@yahoo.com', NULL, NULL, NULL, '', 'Yes', 0, '2016-06-28'),
(132, '2D', 3, '', 'safety of equipment room', 'lacor', 'HOUR:MINUTE', '', '', '', '', '2010-06-20', 'matovu', 1, '2016-06-30 00:36:45', 'NONE', '', '', '', '', 'Hazard', 'matovu', 'SMS Officer', '', 'davimato@yahoo.com', NULL, NULL, NULL, '', 'Yes', 0, '2016-06-28'),
(133, '2D', 3, '', 'lack of transport', 'serere', 'HOUR:MINUTE', '', '', '', '', '2000-10-10', 'matovu', 5, '2016-07-06 04:25:01', 'NONE', '', '', '', '', 'Issue', 'matovu', 'SMS Officer', '', 'davimato@yahoo.com', NULL, NULL, NULL, '', 'Yes', 1, '2016-06-28'),
(134, '2D', 3, '', 'transport', 'lira', 'HOUR:MINUTE', '', '', '', '', '2000-12-12', 'matovu', 1, '2016-06-30 00:36:45', 'NONE', '', '', '', '', 'Issue', 'matovu', 'SMS Officer', '', 'davimato@yahoo.com', NULL, NULL, NULL, '', 'Yes', 0, '2016-06-28'),
(135, '2D', 3, '', 'faulty boiler', 'mbale', 'HOUR:MINUTE', '', '', '', '', '2000-05-12', 'matovu', 1, '2016-06-30 00:36:45', 'NONE', '', '', '', '', 'Issue', 'matovu', 'SMS Officer', '', 'davimato@yahoo.com', NULL, NULL, NULL, '', 'Yes', 0, '2016-06-28'),
(136, '2D', 3, '', 'lack of water', 'kilwa', 'HOUR:MINUTE', '', '', '', '', '2001-01-01', 'matovu', 1, '2016-06-30 00:36:45', 'NONE', '', '', '', '', 'Issue', 'matovu', 'SMS Officer', '', 'davimato@yahoo.com', NULL, NULL, NULL, '', 'Yes', 1, '2016-06-28'),
(137, '2D', 3, '', 'broken windows', 'masaka', 'HOUR:MINUTE', '', '', '', '', '2005-01-12', 'matovu', 1, '2016-06-30 00:36:45', 'NONE', '', '', '', '', 'Issue', 'matovu', 'SMS Officer', '', 'davimato@yahoo.com', NULL, NULL, NULL, '', 'Yes', 1, '2016-06-28'),
(138, '2D', 3, '', 'lack of first aid kits', 'hoima', 'HOUR:MINUTE', '', '', '', '', '2001-01-01', 'matovu', 3, '2016-07-06 09:17:56', 'NONE', '', '', '', '', 'Issue', 'matovu', 'SMS Officer', '', 'davimato@yahoo.com', NULL, NULL, NULL, '', 'Yes', 0, '2016-06-28'),
(139, '2D', 3, '', 'unprotected CNS equipmnt', 'Lira', 'HOUR:MINUTE', '', '', '', '', '2006-09-09', 'matovu', 3, '2016-07-10 07:43:16', 'NONE', '', '', '', '', 'Hazard', 'matovu', 'SMS Officer', '', 'davimato@yahoo.com', NULL, NULL, NULL, '', 'Yes', 0, '2016-06-28'),
(140, '2D', 3, '', 'unprotected CNS equipmnt', 'Lira', 'HOUR:MINUTE', '', '', '', '', '2006-09-09', 'matovu', 3, '2016-06-30 00:36:45', 'NONE', '', '', '', '', 'Hazard', 'matovu', 'SMS Officer', '', 'davimato@yahoo.com', NULL, NULL, NULL, '', 'Yes', 0, '2016-06-28'),
(141, '', NULL, '', 'Broken glass in waiting hall way', 'visitor hall way', '03:13', '', '', '', '', '2016-07-06', 'admin', 1, '2016-07-06 02:39:46', 'Minor', '', '', '', '', 'Incident', 'admin', 'DUTY OFFICER', '', 'info@caauganda.com', NULL, NULL, NULL, '', 'Yes', 0, '2016-07-06'),
(142, '', NULL, '', 'Explosion in server room', 'Server room', '04:09', '', '', '', '', '2016-07-06', 'admin', 1, '2016-07-06 04:06:06', 'Issue', '', '', '', '', 'Issue', 'admin', 'DUTY OFFICER', '', 'info@caauganda.com', NULL, NULL, NULL, '', 'Yes', 0, '2016-07-06'),
(143, '', NULL, '', 'fire in hall way', 'hall way', '14:04', '', '', '', '', '2016-07-06', 'admin', 3, '2016-07-06 07:54:29', 'OSHE', '', '', '', '', 'Hazard', 'admin', 'DUTY OFFICER', '', 'info@caauganda.com', NULL, NULL, NULL, '', 'Yes', 0, '2016-07-06'),
(144, '', NULL, '', 'Explosion in server room', 'Server room', '07:08', '', '', '', '', '2016-07-06', 'admin', 3, '2016-07-10 07:41:55', 'Issue', '', '', '', '', 'Issue', 'admin', 'DUTY OFFICER', '', 'info@caauganda.com', NULL, NULL, NULL, '', 'Yes', 0, '2016-07-06'),
(145, '', NULL, '', 'Explosion in server room', 'Server room', '07:08', '', '', '', '', '2016-07-06', 'admin', 3, '2016-07-10 02:20:58', 'Issue', '', '', '', '', 'Issue', 'admin', 'DUTY OFFICER', '', 'info@caauganda.com', NULL, NULL, NULL, '', 'Yes', 0, '2016-07-06'),
(146, '', NULL, '', 'Broken glass in waiting hall way', 'Server room', 'HOUR:MINUTE', '', '', '', '', '2016-07-06', 'guest', 3, '2016-07-06 12:09:40', 'Accident', '', '', '', '', 'Incident', '', '', '', 'twesigyeronaldkarakire@gmail.com', NULL, NULL, NULL, '', 'Yes', 0, '2016-07-06'),
(147, '', NULL, '', 'Broken glass in waiting hall way', 'visitor hall way', 'HOUR:MINUTE', '', '', '', '', '2016-07-06', 'admin', 3, '2016-07-07 02:22:56', 'Issue', '', '', '', '', 'Issue', 'admin', 'DUTY OFFICER', '', 'info@caauganda.com', NULL, NULL, NULL, '', 'Yes', 0, '2016-07-06'),
(148, '', NULL, '', 'Broken glass in waiting hall way', 'visitor hall way', 'HOUR:MINUTE', 'AIRCRAFT REG', 'OPERATOR', 'DEPATURE POINT', 'ON BOARD', '2016-07-06', 'admin', 1, '2016-07-06 12:48:51', 'SITREP', '', '', '', '', 'SITREP', 'admin', 'DUTY OFFICER', '', 'info@caauganda.com', NULL, NULL, NULL, '', 'Yes', 0, '2016-07-06'),
(149, '', NULL, '', 'Controller unaware of  Status of serviceability of  the Navigation Aids', 'some place', 'HOUR:MINUTE', '', '', '', '', '2016-07-07', 'guest', 3, '2016-07-10 02:06:05', 'OSHE', '', '', '', '', 'Hazard', 'ronald', 'sms', '', 'twesigyeronaldkarakire@gmail.com', NULL, NULL, NULL, '', 'Yes', 0, '2016-07-07');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `investigation_report`
--

INSERT INTO `investigation_report` (`id`, `title`, `date_created`, `user`, `status`) VALUES
(1, 'SMS Investigations Report', '2016-01-14 10:44:45', 2, 1),
(2, 'General report', '2016-01-19 04:57:19', 2, 1),
(3, 'landing without clearance', '2016-02-10 09:13:47', 2, 1),
(4, 'landing without clearance', '2016-02-10 09:13:58', 2, 1),
(5, 'Sample report', '2016-03-10 10:15:45', 2, 1),
(6, 'Go around due to runway i', '2016-06-25 09:47:06', 2, 1),
(7, 'Go around due to runway incursion', '2016-06-25 09:53:00', 2, 1),
(8, 'investigation report', '2016-07-03 04:26:09', 2, 1),
(9, 'investigation report', '2016-07-03 06:11:57', 2, 1);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `investigation_report_fields`
--

INSERT INTO `investigation_report_fields` (`id`, `name`, `description`, `report_id`, `date`) VALUES
(17, 'INTRODUCTION', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n<ol>\r\n<li>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium</li>\r\n<li>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</li>\r\n</ol>', 1, '2016-01-20 04:04:28'),
(15, 'Introduction', '<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga.</p>\r\n<p>&nbsp;</p>', 2, '2016-01-19 04:57:44'),
(18, '1.2.Background', '', 1, '2016-01-20 10:25:01'),
(19, 'NAME', '<p>DESCRIPTION</p>', 5, '2016-03-10 10:16:12'),
(20, 'ANALYSIS', '<p>DESCRIPTION OF ANALYSIS</p>', 5, '2016-03-10 10:16:59'),
(21, 'SAFETY RECOMMENDATIO', '<ol>\r\n<li>Lorem ipsum dolor sit amet</li>\r\n<li>Excepteur sint occaecat cupidatat non proident</li>\r\n<li>Sed ut perspiciatis unde omnis iste natus</li>\r\n</ol>', 5, '2016-03-10 10:17:46');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=44 ;

--
-- Dumping data for table `investigators`
--

INSERT INTO `investigators` (`id`, `name`, `modified`, `status`, `incident_id`, `reported_by`) VALUES
(1, '7', '2016-02-21 08:07:13', 1, 11, ''),
(2, '7', '2016-02-21 08:07:19', 1, 11, ''),
(3, 'Bwire Samuel', '2015-07-25 11:10:19', 1, 10, ''),
(4, 'Bwire Samuel', '2015-07-25 16:38:36', 1, 1, ''),
(5, 'Bwire Samuel', '2015-07-25 17:00:31', 1, 3, ''),
(6, 'Bwire Samuel', '2015-07-25 17:00:47', 1, 4, ''),
(7, 'Kenyangi Joy', '2015-07-25 17:01:05', 1, 5, ''),
(8, 'Bwire Samuel', '2015-07-25 17:01:24', 1, 6, ''),
(9, 'Bwire Samuel', '2015-07-25 17:01:49', 1, 7, ''),
(10, 'Bwire Samuel', '2015-07-25 17:02:07', 1, 8, ''),
(11, 'Bwire Samuel', '2015-07-25 17:02:20', 1, 9, ''),
(12, 'Kenyangi Joy', '2015-07-25 17:02:34', 1, 10, ''),
(13, 'Henry', '2015-07-27 13:41:15', 1, 13, ''),
(14, 'Bwire Samuel', '2015-08-09 12:37:19', 1, 23, ''),
(15, 'Bwire Samuel', '2015-08-10 14:10:04', 1, 39, 'admin'),
(16, 'Bwire Samuel', '2015-08-11 05:45:15', 1, 37, 'admin'),
(17, 'Bwire Samuel', '2015-08-11 15:26:36', 1, 46, 'admin'),
(18, 'Bwire Samuel', '2015-11-03 05:16:15', 1, 77, 'admin'),
(19, 'Bwire Samuel', '2015-11-08 11:21:16', 1, 40, 'admin'),
(20, 'Bwire Samuel', '2015-11-08 11:21:54', 1, 40, 'admin'),
(21, 'OC-ANS', '2016-01-20 06:44:37', 1, 98, 'admin'),
(22, '3', '2016-01-26 10:50:33', 1, 98, 'admin'),
(23, '5', '2016-01-26 10:58:32', 1, 98, 'admin'),
(24, '2', '2016-01-26 11:06:52', 1, 98, 'admin'),
(25, '2', '2016-01-26 11:07:32', 1, 98, 'admin'),
(26, '6', '2016-01-29 15:59:26', 1, 37, 'admin'),
(27, '6', '2016-01-29 16:00:47', 1, 37, 'admin'),
(28, '6', '2016-01-29 16:01:27', 1, 37, 'admin'),
(29, '6', '2016-01-29 16:02:13', 1, 37, 'admin'),
(30, '6', '2016-01-30 04:58:11', 1, 15, 'admin'),
(31, '1', '2016-02-09 05:30:38', 1, 83, 'Samuel.B'),
(32, '5', '2016-02-09 05:41:36', 1, 86, 'admin'),
(33, '7', '2016-02-21 09:06:15', 1, 108, 'admin'),
(34, '5', '2016-04-11 13:27:51', 1, 107, 'Samuel.B'),
(35, '5', '2016-06-25 04:36:18', 1, 126, 'bwire'),
(36, '1', '2016-07-06 12:09:40', 1, 146, 'Guest'),
(37, '4', '2016-07-06 12:13:49', 1, 146, 'Guest'),
(38, '6', '2016-07-06 12:14:28', 1, 146, 'Guest'),
(39, '2', '2016-07-07 02:22:55', 1, 147, 'guest'),
(40, '2', '2016-07-07 02:23:44', 1, 147, 'guest'),
(41, '1', '2016-07-10 09:03:11', 1, 149, 'admin'),
(42, '1', '2016-07-10 09:04:47', 1, 149, 'admin'),
(43, '1', '2016-07-10 09:04:58', 1, 149, 'admin');

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
(1, 'SMS', '2015-11-03 06:36:01', 'Security', 'Lossing Passwords', 'Employees keep lossing theire passwords and lesson is that we keep our respective passwords secure.', NULL, NULL, 1, '', 0, ''),
(2, 'Safety', '2015-12-16 05:40:25', 'Sms', 'Delayed delivery', 'There was a delay in delivery due to improper organization of documents', NULL, NULL, 1, '', 0, ''),
(3, 'DIVISION', '2016-06-18 18:50:21', 'CATEGORY', 'ISSUE TITLE', 'DESCRIPTION', 1, 89, 1, '', 0, ''),
(4, 'DIVISION', '2016-06-18 19:11:27', 'CATEGORY', 'ISSUE TITLE', 'DESCRIPTION', 2, 1, 1, '', 0, ''),
(5, 'DIVISION', '2016-06-18 19:20:35', 'CATEGORY', 'ISSUE TITLE', 'DESCRIPTION', 1, 1, 1, '', 0, ''),
(6, 'DIVISION', '2016-06-18 19:21:25', 'CATEGORY', 'ISSUE TITLE', 'DESCRIPTION', 3, 1, 1, '', 0, ''),
(7, 'DIVISION', '2016-06-18 19:21:55', 'CATEGORY', 'ISSUE TITLE', 'DESCRIPTION', 3, 1, 1, '', 0, ''),
(8, 'DIVISION', '2016-06-18 19:32:36', 'CATEGORY', 'ISSUE TITLE', 'DESCRIPTION', 4, 1, 1, '', 0, ''),
(9, 'DIVISION', '2016-06-21 04:57:09', 'CATEGORY', 'ISSUE TITLE', 'DESCRIPTION', 5, 2, 1, '', 0, ''),
(10, 'DIVISION', '2016-06-24 08:19:51', 'CATEGORY', 'ISSUE TITLE', 'DESCRIPTION GOES HERE', 5, 1, 1, '', 0, ''),
(11, 'DIVISION', '2016-06-24 23:02:57', 'CATEGORY', 'ISSUE TITLE', 'DESCRIPTION', 1, NULL, 1, '', 0, ''),
(12, 'DIVISION', '2016-06-24 23:40:34', 'CATEGORY', 'ISSUE TITLE', 'DESCRIPTION', NULL, NULL, 1, 'IT', 0, ''),
(13, 'DIVISION', '2016-06-24 23:41:21', 'CATEGORY', 'ISSUE TITLE', 'DESCRIPTION', NULL, NULL, 1, 'SMS', 0, ''),
(14, 'DIVISION', '2016-06-24 23:41:47', 'CATEGORY', 'ISSUE TITLE', 'DESCRIPTION', NULL, NULL, 1, 'SMS', 0, ''),
(15, 'DIVISION', '2016-06-24 23:42:47', 'CATEGORY', 'ISSUE TITLE', 'DESCRIPTION', NULL, NULL, 1, 'NONE', 0, ''),
(16, 'SMS', '2016-06-25 06:25:55', 'Aviation', 'Power Installations', 'Power Installations', 1, 122, 1, 'SMS', 0, ''),
(17, 'Airports', '2016-06-25 06:36:31', 'hazard', 'runway incursion', 'A truck from the garage should only be allowed on the manoeuvring area after inspection', 1, 11, 1, 'SMS', 0, '');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `likelihoods`
--

INSERT INTO `likelihoods` (`id`, `name`, `rationale`) VALUES
(1, 'Extremely improbable', 'Almost inconceivable that the event will occur'),
(2, 'Improbable', 'Very unlikely to occur (not known to have occurred)'),
(3, 'Remote', 'Unlikely to occur but possible (has occurred rarely)'),
(4, 'Occasional', 'Likely to occur sometimes (has occurred infrequently)'),
(5, 'Frequent', 'Likely to occur many times (has occurred frequently)');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `monitoring_activities`
--

INSERT INTO `monitoring_activities` (`id`, `monitoring_activity`, `frequency`, `duration`, `substitute_risk`, `modified`, `status`, `incident_id`, `reported_by`) VALUES
(1, 'Checking unserviceability logs at ACC and CNS ', 'Daily', '', '', '2015-08-04 12:21:23', 1, 14, ''),
(2, 'Checking unserviceability logs at ACC and CNS', 'Daily', '', '', '2015-08-10 14:05:27', 1, 39, 'admin'),
(3, '3. Controller Proficiency checks\r\n', 'Atleast twice a year\r\n', '1. Until Perimeter road is usable by heavy Vehicles \r\n2. For  as long as operations are ongoing\r\n', 'Nil\r\n', '2015-10-11 11:13:20', 1, 12, 'admin'),
(4, 'Sed ut perspiciatis unde omnis iste natus', 'Daily', '2 weeks', '', '2015-11-03 05:06:00', 1, 77, 'admin'),
(5, 'Quis autem vel eum iure reprehenderit', 'Daily', '2 weeks', '', '2015-11-03 05:16:03', 1, 77, 'admin'),
(6, 'periodic telephone calls', '6 hourly', '2 weeks', 'oversleeping', '2016-02-09 05:33:57', 1, 83, 'Samuel.B'),
(7, 'At vero eos et accusamus et iusto odio', 'Daily', '', '', '2016-02-09 05:42:51', 1, 86, 'admin'),
(8, 'Quis autem vel eum iure reprehenderit', 'Daily', '', '', '2016-02-09 05:43:52', 1, 86, 'admin'),
(9, 'Licensed power personnel to conduct fre3quent monitoring', 'every 2 days', '2 months', 'death or harm', '2016-06-25 04:38:35', 1, 126, 'bwire'),
(10, 'NONE', 'NONE', 'NONE', 'NONE', '2016-07-10 09:06:00', 1, 149, 'admin'),
(11, 'NONE', 'NONE', 'NONE', 'NONE', '2016-07-10 09:06:35', 1, 149, 'admin');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=117 ;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `subject`, `description`, `status`, `user`, `user_from`, `type`, `urgent`, `date_created`, `target_group`) VALUES
(24, 'Urgent approval', 'Please work on data sheet loaded.', 'read', 5, 2, 'PRIVATE', 1, '2016-01-20 04:36:23', NULL),
(25, 'Urgent approval of incoming hazard required', 'Hazard HZ/10/A/209 has gone out of scope. Please look at it as soon as possible in order to avoid any more associated hazards. thank you. ronald.', 'sent', 2, 2, 'GROUP', 1, '2016-01-20 07:36:14', NULL),
(26, 'Assigned News Icident', 'You have Been Assigned A new Incident #98', 'read', 2, 2, 'PRIVATE', 0, '2016-01-26 11:07:32', NULL),
(27, 'Assigned New Icident', 'You have Been Assigned A new Incident #37', 'read', 6, 2, 'PRIVATE', 0, '2016-01-29 16:02:13', NULL),
(28, 'Assigned New Icident', 'You have Been Assigned A new Incident #15', 'sent', 6, 2, 'PRIVATE', 0, '2016-01-30 04:58:11', NULL),
(31, 'Assigned New Icident', 'You have Been Assigned A new Incident #83', 'sent', 1, 5, 'PRIVATE', 0, '2016-02-09 05:30:38', NULL),
(32, 'Assigned New Icident', 'You have Been Assigned A new Incident #86', 'sent', 5, 2, 'PRIVATE', 0, '2016-02-09 05:41:36', NULL),
(34, 'Fowarded Sitrep', ' Fowarded Strep .#55', 'sent', 6, 2, 'PRIVATE', 0, '2016-02-15 10:53:12', NULL),
(35, 'Fowarded Sitrep', ' Fowarded Strep .#56', 'read', 6, 2, 'PRIVATE', 0, '2016-02-15 10:53:13', NULL),
(38, 'Mitigation Action Remider 2days', 'Remaider to Check On Implementationsleeping', 'sent', 1, 1, 'PRIVATE', 0, '2016-02-21 08:06:00', NULL),
(39, 'Mitigation Action Remider 2days', 'Remaider to Check On Implementationsleeping', 'sent', 1, 1, 'PRIVATE', 0, '2016-02-21 08:06:08', NULL),
(40, 'Mitigation Action Remider 2days', 'Remaider to Check On ImplementationTile the floor', 'sent', 7, 1, 'PRIVATE', 0, '2016-02-21 08:07:27', NULL),
(49, 'Mitigation Action Remider 2days', 'Remaider to Check On ImplementationTile the floor', 'sent', 7, 1, 'PRIVATE', 0, '2016-02-21 08:14:36', NULL),
(50, 'Mitigation Action Remider 2days', 'Remaider to Check On Implementationsleeping', 'sent', 1, 1, 'PRIVATE', 0, '2016-02-21 08:14:37', NULL),
(51, 'Mitigation Action Remider 2days', 'Remaider to Check On ImplementationTile the floor', 'sent', 7, 1, 'PRIVATE', 0, '2016-02-21 08:17:37', NULL),
(52, 'Mitigation Action Remider 2days', 'Remaider to Check On ImplementationTile the floor', 'sent', 7, 1, 'PRIVATE', 0, '2016-02-21 08:17:37', NULL),
(53, 'Mitigation Action Remider Today', 'Remaider to do autdit in today', 'sent', 4, 1, 'PRIVATE', 1, '2016-02-21 08:56:39', NULL),
(54, 'Mitigation Action Remider Today', 'Remaider to do autdit in today', 'read', 3, 1, 'PRIVATE', 1, '2016-02-21 08:56:39', NULL),
(55, 'Mitigation Action Remider Today', 'Remaider to do autdit in today', 'sent', 4, 1, 'PRIVATE', 1, '2016-02-21 08:56:43', NULL),
(56, 'Mitigation Action Remider Today', 'Remaider to do autdit in today', 'sent', 3, 1, 'PRIVATE', 1, '2016-02-21 08:56:43', NULL),
(57, 'Mitigation Action Remider Today', 'Remaider to do autdit in today', 'sent', 4, 1, 'PRIVATE', 1, '2016-02-21 08:58:09', NULL),
(58, 'Mitigation Action Remider Today', 'Remaider to do autdit in today', 'sent', 3, 1, 'PRIVATE', 1, '2016-02-21 08:58:10', NULL),
(59, 'Mitigation Action Remider Today', 'Remaider to do autdit in today', 'sent', 4, 1, 'PRIVATE', 1, '2016-02-21 09:00:29', NULL),
(60, 'Mitigation Action Remider Today', 'Remaider to do autdit in today', 'sent', 7, 1, 'PRIVATE', 1, '2016-02-21 09:00:29', NULL),
(61, 'Audit Remider 2 days', 'Remaider to do autdit in two days', 'sent', 7, 1, 'PRIVATE', 0, '2016-02-21 09:05:01', NULL),
(62, 'URGENT!! Audit Remider Today ', 'Remaider to do autdit in today', 'sent', 4, 1, 'PRIVATE', 1, '2016-02-21 09:05:03', NULL),
(63, 'URGENT!! Audit Remider Today ', 'Remaider to do autdit in today', 'sent', 7, 1, 'PRIVATE', 1, '2016-02-21 09:05:03', NULL),
(64, 'URGENT!! Audit Remider Today ', 'Remaider to do autdit in today', 'sent', 7, 1, 'PRIVATE', 1, '2016-02-21 09:05:03', NULL),
(65, 'Assigned New Icident', 'You have Been Assigned A new Incident #108', 'sent', 7, 2, 'PRIVATE', 0, '2016-02-21 09:06:15', NULL),
(66, 'Audit Remider 2 days', 'Remaider to do autdit in two days', 'sent', 7, 1, 'PRIVATE', 0, '2016-02-21 09:10:01', NULL),
(67, 'URGENT!! Audit Remider Today ', 'Remaider to do autdit in today', 'sent', 4, 1, 'PRIVATE', 1, '2016-02-21 09:10:02', NULL),
(68, 'URGENT!! Audit Remider Today ', 'Remaider to do autdit in today', 'sent', 7, 1, 'PRIVATE', 1, '2016-02-21 09:10:02', NULL),
(69, 'URGENT!! Audit Remider Today ', 'Remaider to do autdit in today', 'sent', 7, 1, 'PRIVATE', 1, '2016-02-21 09:10:03', NULL),
(70, 'URGENT!! Mitigation Action Remider Today', 'Remaider to Check On Implementationtesr', 'sent', 7, 1, 'PRIVATE', 1, '2016-02-21 09:19:18', NULL),
(71, 'URGENT!! Mitigation Action Remider Today', 'Remaider to Check On ImplementationTESR', 'sent', 7, 1, 'PRIVATE', 1, '2016-02-21 09:21:14', NULL),
(72, 'URGENT!! Mitigation Action Remider Today', 'Remaider to Check On ImplementationTESTRD', 'sent', 7, 1, 'PRIVATE', 1, '2016-02-21 09:25:01', NULL),
(73, 'URGENT!! Audit Remider Today ', 'Remaider to do autdit in today', 'sent', 7, 1, 'PRIVATE', 1, '2016-02-23 02:00:02', NULL),
(74, 'URGENT!! Mitigation Action Remider Today', 'Remaider to Check On ImplementationTile the floor', 'sent', 7, 1, 'PRIVATE', 1, '2016-02-23 02:00:02', NULL),
(75, 'URGENT!! Mitigation Action Remider Today', 'Remaider to Check On ImplementationTile the floor', 'sent', 7, 1, 'PRIVATE', 1, '2016-02-23 02:00:04', NULL),
(76, 'URGENT!! Mitigation Action Remider Today', 'Remaider to Check On Implementationsleeping', 'sent', 1, 1, 'PRIVATE', 1, '2016-02-23 02:00:04', NULL),
(77, 'Assigned New Icident', 'You have Been Assigned A new Incident #107', 'sent', 5, 5, 'PRIVATE', 0, '2016-04-11 13:27:51', NULL),
(82, 'There is some new information that needs your atte', 'This is new information coming in from my desk. Please check it and confirm that it is correct.', 'read', 2, 2, 'PRIVATE', 1, '2016-06-19 23:30:31', NULL),
(84, 'Assigned New Icident', 'You have Been Assigned A new Incident #126', 'sent', 5, 5, 'PRIVATE', 0, '2016-06-25 04:36:18', NULL),
(85, 'URGENT!! SMS training seminar', 'A new training seminar is coming up on 14th July 2016. All SMS staff are advised to attended without fail. Thank you.', 'read', 3, 2, 'PRIVATE', 1, '2016-07-07 02:01:05', NULL),
(86, 'Assigned New Icident', 'You have Been Assigned A new Incident #147', 'read', 2, 3, 'PRIVATE', 0, '2016-07-07 02:22:55', NULL),
(87, 'Assigned New Icident', 'You have Been Assigned A new Incident #147', 'read', 2, 3, 'PRIVATE', 0, '2016-07-07 02:23:44', NULL),
(88, 'URGENT!! Investigator Notification', 'You have been assigned as investigator for: Issue ID: 147. Issue details: Broken glass in waiting hall way', 'read', 2, 3, 'PRIVATE', 1, '2016-07-07 02:23:46', NULL),
(89, 'NEW Hazard', 'A new Hazard has been submitted by ronald. Hazard ID: 149. Hazard details: Controller unaware of  Status of serviceability of  the Navigation Aids', 'sent', 1, 3, 'GROUP', 0, '2016-07-07 02:57:22', NULL),
(90, 'NEW Hazard', 'A new Hazard has been submitted by ronald. Hazard ID: 149. Hazard details: Controller unaware of  Status of serviceability of  the Navigation Aids', 'read', 2, 3, 'GROUP', 0, '2016-07-07 02:57:23', NULL),
(91, 'NEW Hazard', 'A new Hazard has been submitted by ronald. Hazard ID: 149. Hazard details: Controller unaware of  Status of serviceability of  the Navigation Aids', 'sent', 4, 3, 'GROUP', 0, '2016-07-07 02:57:24', NULL),
(92, 'NEW Hazard', 'A new Hazard has been submitted by ronald. Hazard ID: 149. Hazard details: Controller unaware of  Status of serviceability of  the Navigation Aids', 'read', 6, 3, 'GROUP', 0, '2016-07-07 02:57:25', NULL),
(93, 'NEW Hazard', 'A new Hazard has been submitted by ronald. Hazard ID: 149. Hazard details: Controller unaware of  Status of serviceability of  the Navigation Aids', 'sent', 9, 3, 'GROUP', 0, '2016-07-07 02:57:27', NULL),
(94, 'NEW Hazard', 'A new Hazard has been submitted by ronald. Hazard ID: 149. Hazard details: Controller unaware of  Status of serviceability of  the Navigation Aids', 'sent', 10, 3, 'GROUP', 0, '2016-07-07 02:57:28', NULL),
(95, 'NEW Hazard', 'A new Hazard has been submitted by ronald. Hazard ID: 149. Hazard details: Controller unaware of  Status of serviceability of  the Navigation Aids', 'sent', 12, 3, 'GROUP', 0, '2016-07-07 02:57:29', NULL),
(96, 'NEW Hazard', 'A new Hazard has been submitted by ronald. Hazard ID: 149. Hazard details: Controller unaware of  Status of serviceability of  the Navigation Aids', 'sent', 3, 3, 'GROUP', 0, '2016-07-07 02:57:31', NULL),
(97, 'URGENT!! SMS training seminar', 'Please be advised that there is a training seminar on 12th Jan, 2016. Thank you.', 'read', 1, 2, 'PRIVATE', 1, '2016-07-07 03:36:41', NULL),
(98, 'URGENT!! SMS training seminar', 'Please be advised that there is a training seminar on 12th Jan, 2016. Thank you.', 'read', 2, 2, 'PRIVATE', 1, '2016-07-07 03:38:01', NULL),
(99, 'URGENT!! SMS training seminar', 'Please be advised that there is a training seminar on 12th Jan, 2016. Thank you.', 'sent', 1, 2, 'GROUP', 1, '2016-07-07 03:38:57', NULL),
(100, 'URGENT!! SMS training seminar', 'Please be advised that there is a training seminar on 12th Jan, 2016. Thank you.', 'sent', 2, 2, 'GROUP', 1, '2016-07-07 03:38:58', NULL),
(101, 'URGENT!! SMS training seminar', 'Please be advised that there is a training seminar on 12th Jan, 2016. Thank you.', 'sent', 4, 2, 'GROUP', 1, '2016-07-07 03:38:59', NULL),
(102, 'URGENT!! SMS training seminar', 'Please be advised that there is a training seminar on 12th Jan, 2016. Thank you.', 'read', 6, 2, 'GROUP', 1, '2016-07-07 03:39:00', NULL),
(103, 'URGENT!! SMS training seminar', 'Please be advised that there is a training seminar on 12th Jan, 2016. Thank you.', 'sent', 9, 2, 'GROUP', 1, '2016-07-07 03:39:01', NULL),
(104, 'URGENT!! SMS training seminar', 'Please be advised that there is a training seminar on 12th Jan, 2016. Thank you.', 'sent', 10, 2, 'GROUP', 1, '2016-07-07 03:39:02', NULL),
(105, 'URGENT!! SMS training seminar', 'Please be advised that there is a training seminar on 12th Jan, 2016. Thank you.', 'sent', 12, 2, 'GROUP', 1, '2016-07-07 03:39:04', NULL),
(106, 'URGENT!! SMS training seminar', 'Please be advised that there is a training seminar on 12th Jan, 2016. Thank you.', 'read', 3, 2, 'GROUP', 1, '2016-07-07 03:39:05', NULL),
(107, 'Assigned New Icident', 'You have Been Assigned A new Incident #149', 'sent', 1, 2, 'PRIVATE', 0, '2016-07-10 09:03:12', NULL),
(108, 'URGENT!! Investigator Notification', 'You have been assigned as investigator for: Hazard ID: 149. Hazard details: Controller unaware of  Status of serviceability of  the Navigation Aids', 'sent', 1, 2, 'PRIVATE', 1, '2016-07-10 09:03:14', NULL),
(109, 'Assigned New Icident', 'You have Been Assigned A new Incident #149', 'sent', 1, 2, 'PRIVATE', 0, '2016-07-10 09:04:47', NULL),
(110, 'URGENT!! Investigator Notification', 'You have been assigned as investigator for: Hazard ID: 149. Hazard details: Controller unaware of  Status of serviceability of  the Navigation Aids', 'sent', 1, 2, 'PRIVATE', 1, '2016-07-10 09:04:49', NULL),
(111, 'Assigned New Icident', 'You have Been Assigned A new Incident #149', 'sent', 1, 2, 'PRIVATE', 0, '2016-07-10 09:04:58', NULL),
(112, 'URGENT!! Investigator Notification', 'You have been assigned as investigator for: Hazard ID: 149. Hazard details: Controller unaware of  Status of serviceability of  the Navigation Aids', 'sent', 1, 2, 'PRIVATE', 1, '2016-07-10 09:05:00', NULL),
(113, 'URGENT!! Aircraft Incident Investigation', 'You have been assigned as an investigator to Aircraft Incident Investigation #', 'sent', 3, 2, 'PRIVATE', 1, '2016-07-10 10:08:19', NULL),
(114, 'URGENT!! Aircraft Incident Investigation', 'You have been assigned as an investigator to Aircraft Incident Investigation #3', 'read', 2, 2, 'PRIVATE', 1, '2016-07-10 10:09:11', NULL),
(115, 'URGENT!! Aircraft Incident Investigation', 'You have been assigned as an investigator to Aircraft Incident Investigation #3', 'sent', 5, 2, 'PRIVATE', 1, '2016-07-10 10:14:03', NULL),
(116, 'URGENT!! Aircraft Incident Investigation', 'You have been assigned as an investigator to Aircraft Incident Investigation #3', 'sent', 5, 2, 'PRIVATE', 1, '2016-07-10 10:14:59', NULL);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `performance_targets`
--

INSERT INTO `performance_targets` (`id`, `details`, `modified`, `status`, `incident_id`, `reported_by`) VALUES
(1, 'At least 98% availability od Direct speech communication withy Kinshasa', '2015-08-04 12:03:08', 1, 14, ''),
(2, 'At least 98% availability od Direct speech communication withy Kinshasa', '2015-08-10 14:02:49', 1, 39, 'admin'),
(3, 'Full scale performance in one months time', '2015-08-11 05:41:06', 1, 37, 'admin'),
(4, 'aaaaaaaa1', '2015-11-03 05:04:39', 1, 77, 'admin'),
(5, 'Clear view of movement areas from tower ', '2016-01-20 06:43:37', 1, 98, 'admin'),
(6, 'b1', '2016-02-09 05:41:53', 1, 86, 'admin'),
(7, 'xxx', '2016-02-09 06:16:43', 1, 83, 'admin'),
(8, 'Clear view of movement areas from tower', '2016-06-18 22:21:43', 1, 89, 'admin'),
(9, 'To ensure information status of serviceability of navigationaids is available to controllers at all times. ', '2016-07-10 04:34:25', 1, 149, 'admin');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `questionnaire`
--

INSERT INTO `questionnaire` (`questionnaire_id`, `submitted_by`, `date_created`, `status`, `title`, `form_status`) VALUES
(1, '2', '2016-07-04 21:00:00', 1, 'Gap analysis for harum quidem rerum facilis', 'NEW'),
(2, '2', '2015-11-01 05:29:30', 1, '', 'NEW'),
(3, '2', '2015-11-01 05:30:14', 1, '', 'NEW'),
(4, '2', '2015-11-01 05:31:18', 1, '', 'NEW'),
(5, '2', '2015-11-01 05:32:37', 1, '', 'NEW'),
(6, '2', '2015-11-01 09:16:41', 1, '', 'NEW'),
(7, '2', '2016-07-03 21:00:00', 1, 'Gap analysis for harum quidem rerum facilis', 'NEW'),
(8, '2', '2016-07-03 21:00:00', 1, 'Sed ut perspiciatis unde omnis iste natus error sit', 'NEW'),
(9, 'Kraiba', '2016-01-19 04:41:38', 1, '', 'NEW'),
(10, '2', '2016-07-03 21:00:00', 1, 'Gap analysis for harum quidem rerum facilis', 'NEW'),
(11, '2', '2016-01-29 13:08:19', 1, '', 'NEW'),
(12, 'Kraiba', '2016-01-29 13:15:37', 1, '', 'NEW'),
(13, '2', '2016-01-29 13:15:52', 1, '', 'NEW'),
(14, '2', '2016-02-09 10:33:07', 1, '', 'NEW'),
(15, 'admin', '2016-05-19 08:33:06', 1, '', 'NEW'),
(16, '2', '2016-05-19 08:33:19', 1, '', 'NEW'),
(17, 'Wanzunula Rogers', '2016-05-26 10:48:03', 1, '', 'NEW'),
(18, 'Wanzunula Rogers', '2016-05-26 10:49:18', 1, '', 'NEW'),
(19, 'ANDREW MWESIGE', '2016-05-26 10:49:44', 1, '', 'NEW'),
(20, 'MWESIGE', '2016-05-26 10:52:15', 1, '', 'NEW'),
(21, '2', '2016-05-26 10:52:55', 1, '', 'NEW'),
(22, '2', '2016-05-26 10:54:00', 1, '', 'NEW'),
(23, '2', '2016-05-26 10:55:51', 1, '', 'NEW'),
(24, 'Wanzunula Rogers', '2016-05-26 10:59:57', 1, '', 'NEW'),
(25, 'Matovu David', '2016-05-26 11:05:03', 1, '', 'NEW'),
(26, '2', '2016-05-26 11:05:32', 1, '', 'NEW'),
(27, 'wanzu', '2016-06-25 11:26:48', 1, '', 'NEW'),
(28, '2', '2016-06-25 11:29:38', 1, '', 'NEW'),
(29, 'e', '2016-06-25 11:32:54', 1, '', 'NEW'),
(30, 'RONALD', '2016-06-28 12:03:28', 1, '', 'NEW'),
(31, '13', '2016-06-28 12:05:43', 1, '', 'NEW'),
(32, '13', '2016-06-28 12:09:02', 1, '', 'NEW'),
(33, 'RONALD', '2016-06-28 13:20:37', 1, '', 'NEW'),
(34, 'RONALD', '2016-06-28 13:24:47', 1, '', 'NEW'),
(35, 'admin', '2016-06-29 17:43:40', 1, '', 'NEW'),
(36, '2', '2016-06-29 17:44:56', 1, '', 'NEW'),
(37, '2', '2016-07-03 21:00:00', 1, 'Gap analysis for harum quidem rerum facilis', 'NEW'),
(38, '2', '2016-07-03 21:00:00', 1, 'Sed ut perspiciatis unde omnis iste natus error sit ', 'NEW'),
(39, '2', '2016-07-03 21:00:00', 1, 'Sed ut perspiciatis unde omnis iste natus error sit', 'NEW'),
(40, '2', '2016-07-03 21:00:00', 1, 'Nam libero tempore, cum soluta nobis est eligendi ', 'NEW'),
(41, '2', '2016-07-04 21:00:00', 1, 'Sed ut perspiciatis unde omnis iste natus error sit', 'NEW');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `questionnaire_edit_trail`
--

INSERT INTO `questionnaire_edit_trail` (`id`, `questionnaire_id`, `date`, `action`, `user`) VALUES
(1, 10, '2016-07-05 00:56:36', 'UPDATED', NULL),
(2, 2, '2016-07-05 01:00:51', 'CREATED', NULL),
(3, 1, '2016-07-05 01:05:00', 'CREATED', NULL),
(4, 1, '2016-07-05 01:17:09', 'UPDATED', 2),
(5, 1, '2016-07-05 01:22:35', 'UPDATED', 2),
(6, 41, '2016-07-05 17:08:18', 'CREATED', 2),
(7, 41, '2016-07-05 17:08:52', 'UPDATED', 2);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=664 ;

--
-- Dumping data for table `questionnaire_question_answers`
--

INSERT INTO `questionnaire_question_answers` (`questionnaire_id`, `question_id`, `status_of_implementation`, `action_required`, `id`, `answer`) VALUES
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
(10, 1, 'INFORMATION GOES HERE', '', 30, 'No'),
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
(28, 13, '', '', 159, 'Yes'),
(31, 1, '', '', 160, 'Partial'),
(31, 2, '', '', 161, 'Yes'),
(31, 3, '', '', 162, 'Yes'),
(31, 4, '', '', 163, 'Yes'),
(31, 5, '', '', 164, 'Partial'),
(31, 6, '', '', 165, 'No'),
(31, 7, '', '', 166, 'Yes'),
(31, 8, '', '', 167, 'Yes'),
(31, 9, '', '', 168, 'Yes'),
(31, 10, '', '', 169, 'Yes'),
(31, 11, '', '', 170, 'Yes'),
(31, 12, '', '', 171, 'Yes'),
(31, 13, '', '', 172, 'Yes'),
(32, 1, '', '', 173, 'Yes'),
(32, 2, '', '', 174, 'Yes'),
(32, 3, '', '', 175, 'Yes'),
(32, 4, '', '', 176, 'Yes'),
(32, 5, '', '', 177, 'Yes'),
(32, 6, '', '', 178, 'Yes'),
(32, 7, '', '', 179, 'Yes'),
(32, 8, '', '', 180, 'Yes'),
(32, 9, '', '', 181, 'Yes'),
(32, 10, '', '', 182, 'Yes'),
(32, 11, '', '', 183, 'Yes'),
(32, 12, '', '', 184, 'Yes'),
(32, 13, '', '', 185, 'Yes'),
(36, 1, '', '', 186, 'Yes'),
(36, 2, '', '', 187, 'Yes'),
(36, 3, '', '', 188, 'Yes'),
(36, 4, '', '', 189, 'Yes'),
(36, 5, '', '', 190, 'Yes'),
(36, 6, '', '', 191, 'Yes'),
(36, 7, '', '', 192, 'Yes'),
(36, 8, '', '', 193, 'Yes'),
(36, 9, '', '', 194, 'Yes'),
(36, 10, '', '', 195, 'Yes'),
(36, 11, '', '', 196, 'Yes'),
(36, 12, '', '', 197, 'Yes'),
(36, 13, '', '', 198, 'Yes'),
(37, 1, '', '', 199, 'Yes'),
(37, 2, '', '', 200, 'Yes'),
(37, 3, '', '', 201, 'Yes'),
(37, 4, '', '', 202, 'Yes'),
(37, 5, '', '', 203, 'Yes'),
(37, 6, '', '', 204, 'Yes'),
(37, 7, '', '', 205, 'Yes'),
(37, 8, '', '', 206, 'Yes'),
(37, 9, '', '', 207, 'Yes'),
(37, 10, '', '', 208, 'Yes'),
(37, 11, '', '', 209, 'Yes'),
(37, 12, '', '', 210, 'Yes'),
(37, 13, '', '', 211, 'Yes'),
(38, 1, 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.', '', 212, 'Partial'),
(38, 2, '', '', 213, 'Yes'),
(38, 3, '', '', 214, 'Yes'),
(38, 4, '', '', 215, 'Yes'),
(38, 5, '', '', 216, 'Yes'),
(38, 6, '', '', 217, 'Yes'),
(38, 7, '', '', 218, 'Yes'),
(38, 8, '', '', 219, 'Yes'),
(38, 9, '', '', 220, 'Yes'),
(38, 10, '', '', 221, 'Yes'),
(38, 11, '', '', 222, 'Yes'),
(38, 12, '', '', 223, 'Yes'),
(38, 13, '', '', 224, 'Yes'),
(39, 1, 'Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?', '', 225, 'Partial'),
(39, 2, 'UNKNOWN', '', 226, 'Yes'),
(39, 3, '', '', 227, 'Yes'),
(39, 4, '', '', 228, 'Yes'),
(39, 5, '', '', 229, 'Yes'),
(39, 6, '', '', 230, 'Yes'),
(39, 7, '', '', 231, 'Yes'),
(39, 8, '', '', 232, 'Yes'),
(39, 9, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit,', '', 233, 'Partial'),
(39, 10, '', '', 234, 'Yes'),
(39, 11, '', '', 235, 'Yes'),
(39, 12, '', '', 236, 'Yes'),
(39, 13, '', '', 237, 'Yes'),
(40, 1, 'Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe', '', 238, 'Yes'),
(40, 2, '', '', 239, 'Yes'),
(40, 3, '', '', 240, 'Yes'),
(40, 4, '', '', 241, 'Yes'),
(40, 5, '', '', 242, 'Yes'),
(40, 6, '', '', 243, 'Yes'),
(40, 7, '', '', 244, 'Yes'),
(40, 8, '', '', 245, 'Yes'),
(40, 9, '', '', 246, 'Yes'),
(40, 10, '', '', 247, 'Yes'),
(40, 11, '', '', 248, 'Yes'),
(40, 12, '', '', 249, 'Yes'),
(40, 13, '', '', 250, 'Yes'),
(40, 14, '', '', 251, 'Yes'),
(40, 15, '', '', 252, 'Yes'),
(40, 16, 'Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe', '', 253, 'Yes'),
(40, 17, '', '', 254, 'Yes'),
(40, 18, '', '', 255, 'Yes'),
(40, 19, '', '', 256, 'Yes'),
(40, 20, '', '', 257, 'Yes'),
(40, 21, '', '', 258, 'Yes'),
(40, 22, '', '', 259, 'Yes'),
(40, 23, '', '', 260, 'Yes'),
(40, 24, '', '', 261, 'Yes'),
(40, 25, '', '', 262, 'Yes'),
(40, 26, '', '', 263, 'Yes'),
(40, 27, '', '', 264, 'Yes'),
(40, 28, '', '', 265, 'Yes'),
(40, 29, '', '', 266, 'Yes'),
(40, 30, '', '', 267, 'Yes'),
(40, 31, '', '', 268, 'Yes'),
(40, 32, '', '', 269, 'Yes'),
(40, 33, 'Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe', '', 270, 'Yes'),
(40, 34, '', '', 271, 'Yes'),
(40, 35, '', '', 272, 'Yes'),
(40, 36, '', '', 273, 'Yes'),
(40, 37, '', '', 274, 'Yes'),
(40, 38, '', '', 275, 'Yes'),
(40, 39, '', '', 276, 'Yes'),
(40, 40, '', '', 277, 'Yes'),
(40, 41, '', '', 278, 'Yes'),
(40, 42, '', '', 279, 'Yes'),
(40, 43, '', '', 280, 'Yes'),
(40, 44, '', '', 281, 'Yes'),
(40, 45, '', '', 282, 'Yes'),
(40, 46, '', '', 283, 'Yes'),
(40, 47, '', '', 284, 'Yes'),
(40, 48, '', '', 285, 'Yes'),
(40, 49, '', '', 286, 'Yes'),
(40, 50, '', '', 287, 'Yes'),
(40, 51, '', '', 288, 'Yes'),
(40, 52, '', '', 289, 'Yes'),
(40, 53, 'Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe', '', 290, 'Yes'),
(40, 54, '', '', 291, 'Yes'),
(40, 55, '', '', 292, 'Yes'),
(40, 56, '', '', 293, 'Yes'),
(40, 57, '', '', 294, 'Yes'),
(40, 58, '', '', 295, 'Yes'),
(40, 59, '', '', 296, 'Yes'),
(40, 60, 'Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe', '', 297, 'Yes'),
(40, 61, '', '', 298, 'Yes'),
(40, 62, '', '', 299, 'Yes'),
(40, 63, '', '', 300, 'Yes'),
(40, 64, '', '', 301, 'Yes'),
(40, 65, '', '', 302, 'Yes'),
(40, 66, '', '', 303, 'Yes'),
(40, 67, '', '', 304, 'Yes'),
(40, 68, '', '', 305, 'Yes'),
(40, 69, 'Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe', '', 306, 'Yes'),
(40, 70, '', '', 307, 'Yes'),
(40, 71, '', '', 308, 'Yes'),
(7, 1, '', '', 309, 'Yes'),
(7, 2, '', '', 310, 'Yes'),
(7, 3, '', '', 311, 'Yes'),
(7, 4, '', '', 312, 'Yes'),
(7, 5, '', '', 313, 'Yes'),
(7, 6, '', '', 314, 'Yes'),
(7, 7, '', '', 315, 'Yes'),
(7, 8, '', '', 316, 'Yes'),
(7, 9, '', '', 317, 'Yes'),
(7, 10, '', '', 318, 'Yes'),
(7, 11, '', '', 319, 'Yes'),
(7, 12, '', '', 320, 'Yes'),
(7, 13, '', '', 321, 'Yes'),
(7, 14, '', '', 322, 'Yes'),
(7, 15, '', '', 323, 'Yes'),
(7, 16, '', '', 324, 'Yes'),
(7, 17, '', '', 325, 'Yes'),
(7, 18, '', '', 326, 'Yes'),
(7, 19, '', '', 327, 'Yes'),
(7, 20, '', '', 328, 'Yes'),
(7, 21, '', '', 329, 'Yes'),
(7, 22, '', '', 330, 'Yes'),
(7, 23, '', '', 331, 'Yes'),
(7, 24, '', '', 332, 'Yes'),
(7, 25, '', '', 333, 'Yes'),
(7, 26, '', '', 334, 'Yes'),
(7, 27, '', '', 335, 'Yes'),
(7, 28, '', '', 336, 'Yes'),
(7, 29, '', '', 337, 'Yes'),
(7, 30, '', '', 338, 'Yes'),
(7, 31, '', '', 339, 'No'),
(7, 32, '', '', 340, 'Yes'),
(7, 33, '', '', 341, 'Yes'),
(7, 34, '', '', 342, 'Yes'),
(7, 35, '', '', 343, 'Yes'),
(7, 36, '', '', 344, 'Yes'),
(7, 37, '', '', 345, 'Yes'),
(7, 38, '', '', 346, 'Yes'),
(7, 39, '', '', 347, 'Yes'),
(7, 40, '', '', 348, 'Yes'),
(7, 41, '', '', 349, 'Yes'),
(7, 42, '', '', 350, 'Yes'),
(7, 43, '', '', 351, 'Yes'),
(7, 44, '', '', 352, 'Yes'),
(7, 45, '', '', 353, 'Yes'),
(7, 46, '', '', 354, 'Yes'),
(7, 47, '', '', 355, 'Yes'),
(7, 48, '', '', 356, 'Yes'),
(7, 49, '', '', 357, 'Yes'),
(7, 50, '', '', 358, 'Yes'),
(7, 51, '', '', 359, 'Yes'),
(7, 52, '', '', 360, 'Yes'),
(7, 53, '', '', 361, 'Yes'),
(7, 54, '', '', 362, 'Yes'),
(7, 55, '', '', 363, 'Yes'),
(7, 56, '', '', 364, 'Yes'),
(7, 57, '', '', 365, 'Yes'),
(7, 58, '', '', 366, 'Yes'),
(7, 59, '', '', 367, 'Yes'),
(7, 60, '', '', 368, 'Yes'),
(7, 61, '', '', 369, 'Yes'),
(7, 62, '', '', 370, 'Yes'),
(7, 63, '', '', 371, 'Yes'),
(7, 64, '', '', 372, 'Yes'),
(7, 65, '', '', 373, 'Yes'),
(7, 66, '', '', 374, 'Yes'),
(7, 67, '', '', 375, 'Yes'),
(7, 68, '', '', 376, 'Yes'),
(7, 69, '', '', 377, 'Yes'),
(7, 70, '', '', 378, 'Yes'),
(7, 71, '', '', 379, 'Yes'),
(8, 1, 'Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe', '', 380, 'Partial'),
(8, 2, 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. ', '', 381, 'Partial'),
(8, 3, '', '', 382, 'Yes'),
(8, 4, '', '', 383, 'Yes'),
(8, 5, '', '', 384, 'Yes'),
(8, 6, '', '', 385, 'Yes'),
(8, 7, '', '', 386, 'Yes'),
(8, 8, '', '', 387, 'Yes'),
(8, 9, '', '', 388, 'Yes'),
(8, 10, '', '', 389, 'Yes'),
(8, 11, '', '', 390, 'Yes'),
(8, 12, '', '', 391, 'Yes'),
(8, 13, '', '', 392, 'Yes'),
(8, 14, '', '', 393, 'Yes'),
(8, 15, '', '', 394, 'Yes'),
(8, 16, '', '', 395, 'Yes'),
(8, 17, '', '', 396, 'Yes'),
(8, 18, '', '', 397, 'Yes'),
(8, 19, '', '', 398, 'Yes'),
(8, 20, '', '', 399, 'Yes'),
(8, 21, '', '', 400, 'Yes'),
(8, 22, '', '', 401, 'Yes'),
(8, 23, '', '', 402, 'Yes'),
(8, 24, '', '', 403, 'Yes'),
(8, 25, '', '', 404, 'Yes'),
(8, 26, '', '', 405, 'Yes'),
(8, 27, '', '', 406, 'Yes'),
(8, 28, '', '', 407, 'Yes'),
(8, 29, '', '', 408, 'Yes'),
(8, 30, '', '', 409, 'Yes'),
(8, 31, '', '', 410, 'Yes'),
(8, 32, '', '', 411, 'Yes'),
(8, 33, '', '', 412, 'Yes'),
(8, 34, '', '', 413, 'Yes'),
(8, 35, '', '', 414, 'Yes'),
(8, 36, '', '', 415, 'Yes'),
(8, 37, '', '', 416, 'Yes'),
(8, 38, '', '', 417, 'Yes'),
(8, 39, '', '', 418, 'Yes'),
(8, 40, '', '', 419, 'Yes'),
(8, 41, '', '', 420, 'Yes'),
(8, 42, '', '', 421, 'Yes'),
(8, 43, '', '', 422, 'Yes'),
(8, 44, '', '', 423, 'Yes'),
(8, 45, '', '', 424, 'Yes'),
(8, 46, '', '', 425, 'Yes'),
(8, 47, '', '', 426, 'Yes'),
(8, 48, '', '', 427, 'Yes'),
(8, 49, '', '', 428, 'Yes'),
(8, 50, '', '', 429, 'Yes'),
(8, 51, '', '', 430, 'Yes'),
(8, 52, '', '', 431, 'Yes'),
(8, 53, '', '', 432, 'Yes'),
(8, 54, '', '', 433, 'Yes'),
(8, 55, '', '', 434, 'Yes'),
(8, 56, '', '', 435, 'Yes'),
(8, 57, '', '', 436, 'Yes'),
(8, 58, '', '', 437, 'Yes'),
(8, 59, '', '', 438, 'Yes'),
(8, 60, '', '', 439, 'Yes'),
(8, 61, '', '', 440, 'Yes'),
(8, 62, '', '', 441, 'Yes'),
(8, 63, '', '', 442, 'Yes'),
(8, 64, '', '', 443, 'Yes'),
(8, 65, '', '', 444, 'Yes'),
(8, 66, '', '', 445, 'Yes'),
(8, 67, '', '', 446, 'Yes'),
(8, 68, '', '', 447, 'Yes'),
(8, 69, '', '', 448, 'Yes'),
(8, 70, '', '', 449, 'Yes'),
(8, 71, '', '', 450, 'Yes'),
(2, 1, '', '', 451, 'No'),
(2, 2, 'INFO GOES HERE', '', 452, 'No'),
(2, 3, '', '', 453, 'Yes'),
(2, 4, '', '', 454, 'Yes'),
(2, 5, '', '', 455, 'Yes'),
(2, 6, '', '', 456, 'Yes'),
(2, 7, '', '', 457, 'Yes'),
(2, 8, '', '', 458, 'Yes'),
(2, 9, '', '', 459, 'Yes'),
(2, 10, '', '', 460, 'Yes'),
(2, 11, '', '', 461, 'Yes'),
(2, 12, '', '', 462, 'Yes'),
(2, 13, '', '', 463, 'Yes'),
(2, 14, '', '', 464, 'Yes'),
(2, 15, '', '', 465, 'Yes'),
(2, 16, '', '', 466, 'Yes'),
(2, 17, '', '', 467, 'Yes'),
(2, 18, '', '', 468, 'Yes'),
(2, 19, '', '', 469, 'Yes'),
(2, 20, '', '', 470, 'Yes'),
(2, 21, '', '', 471, 'Yes'),
(2, 22, '', '', 472, 'Yes'),
(2, 23, '', '', 473, 'Yes'),
(2, 24, '', '', 474, 'Yes'),
(2, 25, '', '', 475, 'Yes'),
(2, 26, '', '', 476, 'Yes'),
(2, 27, '', '', 477, 'Yes'),
(2, 28, '', '', 478, 'Yes'),
(2, 29, '', '', 479, 'Yes'),
(2, 30, '', '', 480, 'Yes'),
(2, 31, '', '', 481, 'Yes'),
(2, 32, '', '', 482, 'Yes'),
(2, 33, '', '', 483, 'Yes'),
(2, 34, '', '', 484, 'Yes'),
(2, 35, '', '', 485, 'Yes'),
(2, 36, '', '', 486, 'Yes'),
(2, 37, '', '', 487, 'Yes'),
(2, 38, '', '', 488, 'Yes'),
(2, 39, '', '', 489, 'Yes'),
(2, 40, '', '', 490, 'Yes'),
(2, 41, '', '', 491, 'Yes'),
(2, 42, '', '', 492, 'Yes'),
(2, 43, '', '', 493, 'Yes'),
(2, 44, '', '', 494, 'Yes'),
(2, 45, '', '', 495, 'Yes'),
(2, 46, '', '', 496, 'Yes'),
(2, 47, '', '', 497, 'Yes'),
(2, 48, '', '', 498, 'Yes'),
(2, 49, '', '', 499, 'Yes'),
(2, 50, '', '', 500, 'Yes'),
(2, 51, '', '', 501, 'Yes'),
(2, 52, '', '', 502, 'Yes'),
(2, 53, '', '', 503, 'Yes'),
(2, 54, '', '', 504, 'Yes'),
(2, 55, '', '', 505, 'Yes'),
(2, 56, '', '', 506, 'Yes'),
(2, 57, '', '', 507, 'Yes'),
(2, 58, '', '', 508, 'Yes'),
(2, 59, '', '', 509, 'Yes'),
(2, 60, '', '', 510, 'Yes'),
(2, 61, '', '', 511, 'Yes'),
(2, 62, '', '', 512, 'Yes'),
(2, 63, '', '', 513, 'Yes'),
(2, 64, '', '', 514, 'Yes'),
(2, 65, '', '', 515, 'Yes'),
(2, 66, '', '', 516, 'Yes'),
(2, 67, '', '', 517, 'Yes'),
(2, 68, '', '', 518, 'Yes'),
(2, 69, '', '', 519, 'Yes'),
(2, 70, '', '', 520, 'Yes'),
(2, 71, '', '', 521, 'Yes'),
(1, 1, 'no', '', 522, 'Yes'),
(1, 2, 'unknown', '', 523, 'Yes'),
(1, 3, '', '', 524, 'Partial'),
(1, 4, '', '', 525, 'Yes'),
(1, 5, '', '', 526, 'Yes'),
(1, 6, '', '', 527, 'Yes'),
(1, 7, '', '', 528, 'Yes'),
(1, 8, '', '', 529, 'Yes'),
(1, 9, '', '', 530, 'No'),
(1, 10, 'no reason', '', 531, 'Partial'),
(1, 11, '', '', 532, 'Yes'),
(1, 12, '', '', 533, 'Yes'),
(1, 13, '', '', 534, 'Yes'),
(1, 14, '', '', 535, 'Yes'),
(1, 15, '', '', 536, 'Yes'),
(1, 16, '', '', 537, 'Yes'),
(1, 17, '', '', 538, 'Yes'),
(1, 18, '', '', 539, 'Yes'),
(1, 19, '', '', 540, 'Yes'),
(1, 20, '', '', 541, 'Yes'),
(1, 21, '', '', 542, 'Yes'),
(1, 22, '', '', 543, 'Yes'),
(1, 23, '', '', 544, 'Yes'),
(1, 24, '', '', 545, 'Yes'),
(1, 25, '', '', 546, 'Yes'),
(1, 26, '', '', 547, 'Yes'),
(1, 27, '', '', 548, 'Yes'),
(1, 28, '', '', 549, 'Yes'),
(1, 29, '', '', 550, 'Yes'),
(1, 30, '', '', 551, 'Yes'),
(1, 31, '', '', 552, 'Yes'),
(1, 32, '', '', 553, 'Yes'),
(1, 33, '', '', 554, 'Yes'),
(1, 34, '', '', 555, 'Yes'),
(1, 35, '', '', 556, 'Yes'),
(1, 36, '', '', 557, 'Yes'),
(1, 37, '', '', 558, 'Yes'),
(1, 38, '', '', 559, 'Yes'),
(1, 39, '', '', 560, 'Yes'),
(1, 40, '', '', 561, 'Yes'),
(1, 41, '', '', 562, 'Yes'),
(1, 42, '', '', 563, 'Yes'),
(1, 43, '', '', 564, 'Yes'),
(1, 44, '', '', 565, 'Yes'),
(1, 45, '', '', 566, 'Yes'),
(1, 46, '', '', 567, 'Yes'),
(1, 47, '', '', 568, 'Yes'),
(1, 48, '', '', 569, 'Yes'),
(1, 49, '', '', 570, 'Yes'),
(1, 50, '', '', 571, 'Yes'),
(1, 51, '', '', 572, 'Yes'),
(1, 52, '', '', 573, 'Yes'),
(1, 53, '', '', 574, 'Yes'),
(1, 54, '', '', 575, 'Yes'),
(1, 55, '', '', 576, 'Yes'),
(1, 56, '', '', 577, 'Yes'),
(1, 57, '', '', 578, 'Yes'),
(1, 58, '', '', 579, 'Yes'),
(1, 59, '', '', 580, 'Yes'),
(1, 60, '', '', 581, 'Yes'),
(1, 61, '', '', 582, 'Yes'),
(1, 62, '', '', 583, 'Yes'),
(1, 63, '', '', 584, 'Yes'),
(1, 64, '', '', 585, 'Yes'),
(1, 65, '', '', 586, 'Yes'),
(1, 66, '', '', 587, 'Yes'),
(1, 67, '', '', 588, 'Yes'),
(1, 68, '', '', 589, 'Yes'),
(1, 69, '', '', 590, 'Yes'),
(1, 70, '', '', 591, 'Yes'),
(1, 71, '', '', 592, 'Yes'),
(41, 1, '', '', 593, 'Yes'),
(41, 2, '', '', 594, 'Yes'),
(41, 3, '', '', 595, 'Yes'),
(41, 4, '', '', 596, 'Yes'),
(41, 5, '', '', 597, 'Yes'),
(41, 6, '', '', 598, 'Yes'),
(41, 7, '', '', 599, 'Yes'),
(41, 8, '', '', 600, 'Yes'),
(41, 9, '', '', 601, 'Yes'),
(41, 10, '', '', 602, 'Yes'),
(41, 11, '', '', 603, 'Yes'),
(41, 12, '', '', 604, 'Yes'),
(41, 13, '', '', 605, 'Yes'),
(41, 14, '', '', 606, 'Yes'),
(41, 15, '', '', 607, 'Yes'),
(41, 16, '', '', 608, 'Yes'),
(41, 17, '', '', 609, 'Yes'),
(41, 18, '', '', 610, 'Yes'),
(41, 19, '', '', 611, 'Yes'),
(41, 20, '', '', 612, 'Yes'),
(41, 21, '', '', 613, 'Yes'),
(41, 22, '', '', 614, 'Yes'),
(41, 23, '', '', 615, 'Yes'),
(41, 24, '', '', 616, 'Yes'),
(41, 25, '', '', 617, 'Yes'),
(41, 26, '', '', 618, 'Yes'),
(41, 27, '', '', 619, 'Yes'),
(41, 28, '', '', 620, 'Yes'),
(41, 29, '', '', 621, 'Yes'),
(41, 30, '', '', 622, 'Yes'),
(41, 31, '', '', 623, 'Yes'),
(41, 32, '', '', 624, 'Yes'),
(41, 33, '', '', 625, 'Yes'),
(41, 34, '', '', 626, 'Yes'),
(41, 35, '', '', 627, 'Yes'),
(41, 36, '', '', 628, 'Yes'),
(41, 37, '', '', 629, 'Yes'),
(41, 38, '', '', 630, 'Yes'),
(41, 39, '', '', 631, 'Yes'),
(41, 40, '', '', 632, 'Yes'),
(41, 41, '', '', 633, 'Yes'),
(41, 42, '', '', 634, 'Yes'),
(41, 43, '', '', 635, 'Yes'),
(41, 44, '', '', 636, 'Yes'),
(41, 45, '', '', 637, 'Yes'),
(41, 46, '', '', 638, 'Yes'),
(41, 47, '', '', 639, 'Yes'),
(41, 48, '', '', 640, 'Yes'),
(41, 49, '', '', 641, 'Yes'),
(41, 50, '', '', 642, 'Yes'),
(41, 51, '', '', 643, 'Yes'),
(41, 52, '', '', 644, 'Yes'),
(41, 53, '', '', 645, 'Yes'),
(41, 54, '', '', 646, 'Yes'),
(41, 55, '', '', 647, 'Yes'),
(41, 56, '', '', 648, 'Yes'),
(41, 57, '', '', 649, 'Yes'),
(41, 58, '', '', 650, 'Yes'),
(41, 59, '', '', 651, 'Yes'),
(41, 60, '', '', 652, 'Yes'),
(41, 61, '', '', 653, 'Yes'),
(41, 62, '', '', 654, 'Yes'),
(41, 63, '', '', 655, 'Yes'),
(41, 64, '', '', 656, 'Yes'),
(41, 65, '', '', 657, 'Yes'),
(41, 66, '', '', 658, 'Yes'),
(41, 67, '', '', 659, 'Yes'),
(41, 68, '', '', 660, 'Yes'),
(41, 69, '', '', 661, 'Yes'),
(41, 70, '', '', 662, 'Yes'),
(41, 71, '', '', 663, 'Yes');

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
(1, 'We have made complaints to the people concerned but they all say thay are working on it. I recommend that serious consideration and efforts should be put in this matter. Let the solution be practical not theoretical.', '2015-07-25 07:38:59', 1, 11, ''),
(2, 'Let the solution be practical not theoretical.', '2015-07-25 07:38:59', 1, 11, ''),
(3, 'We are suggesting that they stop using trolleys. They should simply carry the food.', '2015-07-25 09:27:23', 1, 11, ''),
(4, 'We are suggesting that they stop using trolleys.', '2015-07-25 09:29:15', 1, 11, ''),
(5, 'Replace old floor tiles with new ones.', '2015-07-25 11:09:39', 1, 10, ''),
(6, 'Replace the air conditioner', '2015-07-25 16:34:24', 1, 1, ''),
(7, 'Repair where the a/c was located.', '2015-07-25 16:37:07', 1, 1, ''),
(8, 'Train drivers on safety', '2015-07-25 16:40:43', 1, 11, ''),
(9, 'Install a/c', '2015-07-25 16:58:03', 1, 2, ''),
(10, 'Train drivers on safety', '2015-07-27 13:39:14', 1, 13, ''),
(11, 'Contact external service provider\r\n', '2015-08-10 14:08:07', 1, 39, 'admin'),
(12, 'Replace all old equipment ', '2015-08-11 05:42:44', 1, 37, 'admin'),
(13, 'HF communication between Entebbe and Kinshasa ', '2015-10-01 08:51:20', 1, 65, 'admin'),
(14, ' direct land-line telephone ', '2015-10-01 08:52:43', 1, 65, 'admin'),
(15, 'Train drivers on safety', '2015-11-03 05:16:26', 1, 77, 'admin'),
(16, 'Train drivers on safety', '2015-11-03 05:17:02', 1, 77, 'admin'),
(17, 'Train drivers on safety', '2015-11-03 05:23:17', 1, 77, 'admin'),
(18, 'Train drivers on safety', '2015-11-03 05:26:57', 1, 77, 'admin');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `remarks`
--

INSERT INTO `remarks` (`id`, `details`, `modified`, `status`, `incident_id`, `reported_by`) VALUES
(1, 'No feedback', '2015-07-25 08:12:02', 1, 11, ''),
(2, 'A private electrician has been contacted to work on the maintenance.', '2015-07-25 09:52:33', 1, 11, ''),
(3, 'Replaced.', '2015-07-25 11:10:38', 1, 10, ''),
(4, 'I recommend Paul and Henry to handle this.', '2015-07-27 13:43:06', 1, 13, ''),
(5, 'Please assign to investigator(s)', '2015-08-10 14:18:37', 1, 39, 'admin'),
(6, 'Further investigations are going on', '2015-08-11 05:47:13', 1, 37, 'admin'),
(7, 'Further investigations are going on', '2015-11-08 11:22:11', 1, 40, 'admin'),
(8, 'Further investigations are going on', '2015-11-08 11:23:00', 1, 40, 'admin'),
(9, 'Assessment conducted on 9th Feb 2016', '2016-02-09 05:34:31', 1, 83, 'Samuel.B'),
(10, 'We need genuine power installations', '2016-06-25 04:36:06', 1, 126, 'bwire'),
(11, 'all sms staff please take this notification serious. thank you.', '2016-07-06 08:10:55', 1, 143, 'admin'),
(12, 'remark goes here.', '2016-07-06 08:11:32', 1, 143, 'admin'),
(13, 'all sms staff please take this notification serious. thank you.', '2016-07-10 09:06:49', 1, 149, 'admin');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `review_dates`
--

INSERT INTO `review_dates` (`id`, `review_date`, `ocurrence`, `remark`) VALUES
(1, '2016-02-27', 108, ''),
(2, '2016-02-29', 37, ''),
(3, '2016-06-28', 126, ''),
(4, '2016-07-14', 84, ''),
(5, '2016-07-07', 143, 'all sms staff please take this notification serious. thank you.'),
(6, '2016-07-08', 143, 'remark goes here.'),
(7, '2016-07-10', 149, 'all sms staff please take this notification serious. ');

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
(1, '723K ', 'Cables in server room were not properly replaced', '1E', '1B', 'admin', '', '2016-02-16 15:22:40', 1, 'admin', '', '0000-00-00', '', '0000-00-00', '0000-00-00');

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
(4, 'DETAILS', '2016-06-18 19:45:58', 'admin', 1, 1);

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
(4, 'NONE', '2016-06-18 19:42:44', 'admin', 1, 1);

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
(3, 'DETAILS', '2016-06-18 19:34:15', 'admin', 1, 1);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

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
(9, '0000-00-00', '00:06:06', 'KALOLI37', 'C212', '1234', 'USDOD', 'huen-nzara', 'return to pick cargo', 'FORWARDED FOR ACTION                                                                             ', 'NOTIFIED RESPONSIBLE OFFICE                                                                                                                                                                                                     \r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 'YES\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 3, 10, 0),
(10, '0000-00-00', '00:06:50', '220', '899', '785', 'JJM', 'HHJ', 'TWR FREQ U/S', 'RTHT', 'FGFRH', 'BNGH', 11, 10, 2),
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
(40, '0000-00-00', '18:52:30', '5TYYZ', 'B739', '5TYYZ', 'JLIE AIR', 'HTDA-HUEN', 'GO AROUND', 'NIL', 'NIL', 'NIL', 4, 10, 0),
(41, '2016-07-05', '12:03:00', 'AIRCRAFT', 'TYPE', 'REGISTAR', 'OPERATOR', 'route', 'EVENT', 'remarks', 'action', 'summary', 1, 2, 0),
(42, '2016-07-05', '12:03:00', 'AIRCRAFT', 'TYPE', '', '', '', '', '', '', '', 1, 7, 0);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `safety_logs_categories`
--

INSERT INTO `safety_logs_categories` (`id`, `name`, `user`, `date`) VALUES
(1, 'ATC error / Violation', 0, '2015-12-06 10:32:12'),
(2, 'Pilot error / Violation', 0, '2015-12-06 10:32:12'),
(3, 'Techincal', 0, '2015-12-06 11:37:50'),
(4, 'Weather', 0, '2015-12-06 11:37:50'),
(5, 'A/c on Rwy', 0, '2015-12-06 11:37:50'),
(6, 'Vehicle / Object on RWY', 0, '2015-12-06 11:37:50'),
(7, 'Fuel', 0, '2015-12-06 11:37:50'),
(8, 'Procedures', 0, '2015-12-06 11:37:50'),
(9, 'Cause at Destination', 0, '2015-12-06 11:37:50'),
(10, 'Others', 2, '2015-12-06 11:37:50'),
(11, 'another', 2, '2016-07-05 17:40:45');

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
(1, 'Missed approach', 0, '2015-12-06 10:32:38'),
(2, 'Un stable approach', 0, '2015-12-06 10:32:38'),
(3, 'Diversion', 0, '2015-12-06 11:41:18'),
(4, 'Delay', 0, '2015-12-06 11:41:18'),
(5, 'Airspace violation', 0, '2015-12-06 11:44:01'),
(6, 'Runway incursion', 0, '2015-12-06 11:44:01'),
(7, 'Airprox', 0, '2015-12-06 11:50:15'),
(8, 'Bird Strike', 0, '2015-12-06 11:50:15'),
(9, 'VVIP', 0, '2015-12-06 11:50:15'),
(10, 'Cancelation of flight', 0, '2015-12-06 11:50:15'),
(11, 'Equipment/Navaid malfunction', 0, '2015-12-06 11:50:15'),
(12, 'Emergency ', 0, '2015-12-06 11:50:15'),
(13, 'Tyre burst', 0, '2015-12-06 11:50:15'),
(14, 'Weather discrepancy reports', 0, '2015-12-06 11:50:15'),
(15, 'Airside signage', 0, '2015-12-06 11:50:15'),
(16, 'Airside surfaces', 0, '2015-12-06 11:50:15'),
(17, 'General', 0, '2015-12-06 11:50:15');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `safety_occurrence_data`
--

INSERT INTO `safety_occurrence_data` (`id`, `incident_id`, `date_of_occurrence`, `date_of_occurrence_2`, `date_of_occurrence_3`, `time_of_occurrence`, `time_of_occurrence_2`, `time_of_occurrence_3`, `shift`, `shift_2`, `shift_3`, `duration_of_shift`, `duration_of_shift_2`, `duration_of_shift_3`, `time_dc_logged_on_duty`, `time_dc_logged_on_duty_2`, `time_dc_logged_on_duty_3`, `time_dc_logged_off_duty`, `time_dc_logged_off_duty_2`, `time_dc_logged_off_duty_3`, `time_dc_reported_on_duty`, `time_dc_reported_on_duty_2`, `time_dc_reported_on_duty_3`, `time_dc_reported_off_duty`, `time_dc_reported_off_duty_2`, `time_dc_reported_off_duty_3`, `no_of_personnel_on_shift_roster`, `no_of_personnel_on_shift_roster_2`, `no_of_personnel_on_shift_roster_3`, `no_of_personnel_on_shift_logbook`, `no_of_personnel_on_shift_logbook_2`, `no_of_personnel_on_shift_logbook_3`, `density_of_traffic`, `density_of_traffic_2`, `density_of_traffic_3`, `no_of_trainees_on_shift`, `no_of_trainees_on_shift_2`, `no_of_trainees_on_shift_3`, `traffic_handled_by_trainee`, `traffic_handled_by_trainee_2`, `traffic_handled_by_trainee_3`, `controller_under_medication`, `controller_under_medication_2`, `controller_under_medication_3`, `date_from_last_annual_leave`, `date_from_last_annual_leave_2`, `date_from_last_annual_leave_3`, `last_training_attended`, `last_training_attended_2`, `last_training_attended_3`, `last_training_date`, `last_training_date_2`, `last_training_date_3`, `last_proficiency_date`, `last_proficiency_date_2`, `last_proficiency_date_3`, `weather_information`, `aerodrome_information`, `controllers_on_duty`, `completed_by`, `modified`, `status`) VALUES
(1, 16, '2015-08-10', '0000-00-00', '0000-00-00', '2:30 PM', '', '', 'Day', 'Day', 'Day', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'Low', 'Low', 'Low', NULL, NULL, NULL, 'Yes', 'Yes', 'Yes', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', 'admin', '2015-08-11 12:35:28', 1),
(2, 16, '2015-08-07', '0000-00-00', '0000-00-00', '2:30 PM', '', '', 'Day', 'Day', 'Day', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'Low', 'Low', 'Low', NULL, NULL, NULL, 'Yes', 'Yes', 'Yes', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', 'admin', '2015-08-11 12:36:52', 1),
(3, 46, '2015-07-07', '0000-00-00', '0000-00-00', '2:30 PM', '', '', 'Day', 'Day', 'Day', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'Low', 'Low', 'Low', NULL, NULL, NULL, 'Yes', 'Yes', 'Yes', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', 'admin', '2015-08-14 08:16:14', 1),
(4, 46, '2015-07-07', '0000-00-00', '0000-00-00', '2:30 PM', '', '', 'Day', 'Day', 'Day', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'Low', 'Low', 'Low', NULL, NULL, NULL, 'Yes', 'Yes', 'Yes', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', 'admin', '2015-08-14 08:18:59', 1),
(5, 27, '2015-07-07', '0000-00-00', '0000-00-00', '2:30 PM', '', '', 'Day', 'Day', 'Day', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'Low', 'Low', 'Low', NULL, NULL, NULL, 'Yes', 'Yes', 'Yes', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', 'admin', '2015-08-14 10:16:18', 1),
(6, 50, '2015-01-01', '0000-00-00', '0000-00-00', '12:00 PM', '', '', 'Day', 'Day', 'Day', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'Low', 'Low', 'Low', NULL, NULL, NULL, 'Yes', 'Yes', 'Yes', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', 'admin', '2015-09-18 12:39:03', 1),
(7, 40, '0000-00-00', '0000-00-00', '0000-00-00', '2', '', '', 'Day', 'Day', 'Day', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'Low', 'Low', 'Low', NULL, NULL, NULL, 'Yes', 'Yes', 'Yes', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', 'admin', '2015-11-03 09:51:09', 1),
(8, 86, '0000-00-00', '0000-00-00', '0000-00-00', '22', '22', '2', 'Day', 'Day', 'Day', '23', '23', '23', '23', '23', '23', '2', '2', '2', '2', '2', '2', '3', '3', '3', 4, 4, 4, 4, 4, 4, 'Low', 'Low', 'Low', 4, 4, NULL, 'Yes', 'Yes', 'Yes', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '4444', '', '', 'sms', '2015-12-16 09:37:04', 1),
(9, 71, '0000-00-00', '0000-00-00', '0000-00-00', '3', '3', '3', 'Day', 'Day', 'Day', '3', '', '', '3', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'Low', 'Low', 'Low', NULL, NULL, NULL, 'Yes', 'Yes', 'Yes', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', 'sms', '2015-12-16 09:47:36', 1),
(10, 75, '0000-00-00', '0000-00-00', '0000-00-00', '22', '', '', 'Day', 'Night', 'Day', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'Low', 'Low', 'Low', NULL, NULL, NULL, 'No', 'Yes', 'Yes', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '2223', '', '', 'admin', '2016-02-09 09:57:29', 1),
(11, 75, '2015-03-12', '0000-00-00', '0000-00-00', '23:04', '', '', 'Day', 'Day', 'Day', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'Low', 'Low', 'Low', NULL, NULL, NULL, 'Yes', 'Yes', 'Yes', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', 'admin', '2016-05-19 01:20:28', 1),
(12, 75, '2015-03-12', '0000-00-00', '0000-00-00', '23:04', '', '', 'Day', 'Day', 'Day', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'Low', 'Low', 'Low', NULL, NULL, NULL, 'Yes', 'Yes', 'Yes', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', 'admin', '2016-05-19 01:27:48', 1),
(13, 75, '2015-03-12', '0000-00-00', '0000-00-00', '23:04', '', '', 'Day', 'Day', 'Day', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'Low', 'Low', 'Low', NULL, NULL, NULL, 'Yes', 'Yes', 'Yes', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', 'admin', '2016-05-19 08:31:10', 1),
(14, 89, '2015-03-12', '0000-00-00', '0000-00-00', '12:00 ', '', '', 'Day', 'Day', 'Day', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'Low', 'Low', 'Low', NULL, NULL, NULL, 'Yes', 'Yes', 'Yes', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', 'admin', '2016-06-18 20:32:52', 1),
(15, 10, '2015-03-12', '0000-00-00', '0000-00-00', '23:04', '', '', 'Day', 'Day', 'Day', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'Low', 'Low', 'Low', NULL, NULL, NULL, 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', 'admin', '2016-07-06 06:47:57', 1),
(16, 85, '2015-03-12', '0000-00-00', '0000-00-00', '12:00', '', '', 'Day', 'Day', 'Day', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'Low', 'Low', 'Low', NULL, NULL, NULL, 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', 'admin', '2016-07-06 07:11:57', 1),
(17, 141, '2015-03-12', '0000-00-00', '0000-00-00', '12:00', '', '', 'Day', 'Day', 'Day', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'Low', 'Low', 'Low', NULL, NULL, NULL, 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', 'admin', '2016-07-06 07:37:02', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `safety_recommendations`
--

INSERT INTO `safety_recommendations` (`id`, `source`, `details`, `causes`, `mitigation`, `modified`, `status`, `reported_by`, `remarks`, `brief`, `content_type`, `content_id`) VALUES
(13, 'Hazard #77', 'Details of safety recommendations', '', '', '2016-06-24 09:20:32', 1, '2', '', 'Cut Down Trees', NULL, NULL),
(14, 'CAP 123', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>', '<p>lack of proper communication</p>', '', '2016-06-24 09:20:36', 1, 'admin', '<p>Test</p>', '<p>test</p>', NULL, NULL),
(15, 'SOURCE', 'DETAILS', 'CAUSES', '', '2016-06-24 09:39:55', 1, 'admin', 'REMARKS', 'BRIEF', NULL, NULL),
(16, 'SOURCE', '<p>DETAILS</p>', '<p>CAUSES</p>', '', '2016-06-24 23:02:05', 1, 'admin', '<p>REMARKS</p>', '', 1, NULL),
(17, 'SOURCE', '', '', '', '2016-07-06 00:22:08', 1, 'admin', '', '', 4, 1),
(18, 'SOURCE', '<p>Safety recommendations information goes here.</p>', '', '', '2016-07-06 03:46:22', 1, 'admin', '', '', 1, 10),
(19, 'Hazard #149', 'Controller unaware of  Status of serviceability of  the Navigation Aids', '', '', '2016-07-10 04:19:51', 1, '2', '', 'UNKNOWN', NULL, NULL),
(20, 'Hazard #149', 'Controller unaware of  Status of serviceability of  the Navigation Aids', '', '', '2016-07-10 04:20:48', 1, '2', '', 'UNKNOWN', NULL, NULL),
(21, 'Hazard #149', 'Controller unaware of  Status of serviceability of  the Navigation Aids', '', '', '2016-07-10 04:23:23', 1, '2', '', 'UNKNOWN', NULL, NULL),
(22, 'Hazard #149', 'Controller unaware of  Status of serviceability of  the Navigation Aids', '', '', '2016-07-10 04:25:28', 1, '2', '', 'UNKNOWN', NULL, NULL),
(23, 'Hazard #149', 'Controller unaware of  Status of serviceability of  the Navigation Aids', '', '', '2016-07-10 08:51:33', 1, '2', '', 'UNKNOWN', NULL, NULL),
(24, 'Hazard #149', 'Controller unaware of  Status of serviceability of  the Navigation Aids', '', '', '2016-07-10 08:54:46', 1, '2', '', 'UNKNOWN', NULL, NULL);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `safety_requirements`
--

INSERT INTO `safety_requirements` (`id`, `mitigation`, `time_frame`, `modified`, `status`, `incident_id`, `predicted_residual_risk`, `consequence`, `reported_by`, `priority`) VALUES
(1, 'Increased supervision', '', '2015-08-04 11:41:32', 1, NULL, '', 0, '', 0),
(2, 'Increased supervision', '', '2015-08-04 11:43:31', 1, 14, '1B', 0, '', 0),
(3, 'Increased supervision', '2 weeks', '2015-08-10 14:00:03', 1, 39, '1B', 0, 'admin', 0),
(4, 'Increased supervision', '2 weeks', '2015-08-11 06:06:15', 1, 37, '1B', 0, 'admin', 0),
(5, 'a', 'a', '2015-10-01 11:07:31', 1, 67, 'a', 0, 'admin', 0),
(6, 'bbb', '12 months', '2015-11-08 11:19:11', 1, 40, 'd', 0, 'admin', 0),
(7, 'bbb', '12 months', '2015-11-08 11:21:03', 1, 40, 'd', 0, 'admin', 0),
(8, 'z', '3 months', '2015-12-16 07:31:11', 1, 88, '5A', 0, 'sms', 0),
(9, 'q', '1', '2016-01-13 05:24:01', 1, 50, '1', 0, 'admin', 0),
(10, 'asd', 'sad', '2016-01-16 10:58:58', 1, 71, 'dsad', 0, 'admin', 0),
(11, 'ad', 'sad', '2016-01-16 11:09:34', 1, 71, 'dsad', 0, 'admin', 0),
(12, 'sada', 'dsad', '2016-01-16 11:09:42', 1, 71, 'dsadad', 0, 'admin', 0),
(13, 'test', 'test', '2016-01-16 11:18:17', 1, 71, '5A', 0, 'admin', 0),
(14, 'test', 'test', '2016-01-16 11:20:09', 1, 71, '4A', 0, 'admin', 0),
(15, 'ads', 'sad', '2016-01-26 09:59:23', 1, 98, '4A', 30, 'admin', 0),
(16, 'test', '2days', '2016-02-09 05:31:31', 1, 99, '1E', 43, 'admin', 0),
(17, 'B-1', '2 months', '2016-02-09 05:36:30', 1, 86, '2B', 44, 'admin', 0),
(18, 'B-1', '2 months', '2016-02-09 05:37:34', 1, 86, '2B', 44, 'admin', 0),
(19, 'B-1', '2years', '2016-02-09 05:41:06', 1, 86, '1C', 44, 'admin', 0),
(20, 'sleeping', '2 weeks', '2016-02-09 06:16:22', 1, 83, '2C', 42, 'admin', 0),
(21, 'test', '2hours', '2016-02-19 06:46:13', 1, 48, '1A', 47, 'admin', 0),
(22, 'Cut Down Trees', '2days', '2016-02-19 08:13:42', 1, 77, '1A', 24, 'admin', 0),
(23, 'Cut Down Trees', '2days', '2016-02-19 08:14:30', 1, 77, '1A', 24, 'admin', 0),
(24, 'UNKNOWN', '4 Days', '2016-07-10 04:19:51', 1, 149, '', 0, 'admin', 7);

-- --------------------------------------------------------

--
-- Table structure for table `severities`
--

CREATE TABLE IF NOT EXISTS `severities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `value` varchar(8) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `severities`
--

INSERT INTO `severities` (`id`, `name`, `value`) VALUES
(1, 'Catastrophic', 'A'),
(2, 'Hazardous', 'B'),
(3, 'Major', 'C'),
(4, 'Minor', 'D'),
(5, 'Negligible', 'E');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `severity`
--

INSERT INTO `severity` (`id`, `severity`, `severity_rationale`, `likelihood`, `likelihood_rationale`, `modified`, `status`, `incident_id`, `reported_by`) VALUES
(1, 'B', 'Large reduction in safety margins', '4', 'Likely to occur some times', '2015-08-04 11:07:27', 1, 14, ''),
(2, 'B', 'Large reduction in safety margins', '4', 'Likely to occur some times', '2015-08-10 13:57:32', 1, 39, 'admin'),
(3, 'B', 'Large reduction in safety margins', '4', 'Likely to occur some times', '2015-08-11 06:00:48', 1, 37, 'admin'),
(4, 'B', 'Major equipment damage', '4', 'Likely to occur sometimes (has occurred infrequently)', '2015-10-01 11:07:24', 1, 67, 'admin'),
(5, 'A', 'Multiple deaths', '5', 'Unlikely to occur but possible (has occurred rarely)', '2015-10-01 11:39:13', 1, 1, 'admin'),
(6, 'A', 'Little consequences', '4', 'Likely to occur sometimes (has occurred infrequently)', '2015-10-10 04:58:25', 1, 65, 'admin'),
(7, 'A', 'Equipment destroyed', '5', 'Likely to occur many times (has occurred frequently)', '2016-01-13 04:35:20', 1, 50, 'admin'),
(8, 'A', 'Equipment destroyed', '5', 'Likely to occur many times (has occurred frequently)', '2016-01-16 08:30:16', 1, 71, 'admin'),
(9, 'A', 'Equipment destroyed', '5', 'Likely to occur many times (has occurred frequently)', '2016-01-20 02:08:02', 1, 61, 'admin'),
(10, 'A', 'A large reduction in safety margins, physical distress or a workload such that the operators cannot be relied upon to perform their tasks accurately or completely', '5', 'Likely to occur many times (has occurred frequently)', '2016-01-20 02:08:09', 1, 61, 'admin'),
(11, 'A', 'Equipment destroyed', '5', 'Likely to occur many times (has occurred frequently)', '2016-01-29 04:03:39', 1, 64, 'admin'),
(12, 'A', 'Equipment destroyed', '5', 'Likely to occur many times (has occurred frequently)', '2016-02-01 06:31:36', 1, 63, 'admin'),
(13, 'B', 'Multiple deaths', '4', 'Likely to occur sometimes (has occurred infrequently)', '2016-06-18 22:22:27', 1, 114, 'admin'),
(14, 'A', 'Equipment destroyed', '5', 'Likely to occur many times (has occurred frequently)', '2016-07-06 09:20:21', 1, 138, 'admin'),
(15, 'B', 'Multiple deaths', '4', 'Likely to occur many times (has occurred frequently)', '2016-07-10 07:41:55', 1, 144, 'admin'),
(16, 'B', 'Multiple deaths', '4', 'Likely to occur sometimes (has occurred infrequently)', '2016-07-10 07:50:06', 1, 149, 'admin');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `severity_rationales`
--

INSERT INTO `severity_rationales` (`id`, `name`, `description`, `severity_id`) VALUES
(1, 'Equipment destroyed', 'Equipment destroyed', 1),
(2, 'Multiple deaths', 'Multiple deaths', 1),
(3, 'A large reduction in safety margins', 'A large reduction in safety margins, physical distress or a workload such that the operators cannot be relied upon to perform their tasks accurately or completely', 2),
(4, 'Serious injury', 'Serious injury', 2),
(5, 'Major equipment damage', 'Major equipment damage', 2),
(6, 'A significant reduction in safety margins', 'A significant reduction in safety margins, a reduction in the ability of the operators to cope with adverse operating conditions as a result of increase in workload, or as a result of conditions impairing their efficiency', 3),
(7, 'Serious incident', 'Serious incident', 3),
(8, 'Injury to persons', 'Injury to persons', 3),
(9, 'Nuisance', 'Nuisance', 4),
(10, 'Operating limitations', 'Operating limitations', 4),
(11, 'Use of emergency procedures', 'Use of emergency procedures', 4),
(12, 'Minor incident', 'Minor incident', 4),
(13, 'Little consequences', 'Little consequences', 5);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `sms_form_124_comments`
--

INSERT INTO `sms_form_124_comments` (`id`, `incident_id`, `comment`, `modified`, `status`, `reported_by`) VALUES
(1, 52, 'NONE', '2015-09-23 08:30:51', 1, 'rogers'),
(2, 47, 'NONE', '2015-09-23 08:37:07', 0, 'admin'),
(3, 71, 'shall report on this next week', '2016-03-04 04:03:34', 1, 'admin'),
(4, 1, '<p>NO COMMENTS</p>', '2016-07-05 16:03:27', 1, 'admin');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `sms_form_124_contributing_factors`
--

INSERT INTO `sms_form_124_contributing_factors` (`id`, `details`, `modified`, `reported_by`, `status`, `incident_id`) VALUES
(1, 'Lack of proper maintenance', '2015-08-27 13:26:20', 'admin', 0, 47),
(2, 'Lack of proper maintenance', '2015-08-27 13:25:50', 'admin', 0, 47),
(3, 'Lack of proper maintenance', '2015-09-23 09:36:27', 'admin', 0, 47),
(4, 'CONTRIBUTING FACTOR', '2016-05-19 10:40:37', 'admin', 1, NULL),
(5, 'CONTRIBUTING FACTOR', '2016-07-06 04:28:20', 'admin', 0, 72),
(6, '<p>some information here</p>', '2016-07-05 16:09:30', 'admin', 1, 72),
(7, '<p>info goes here</p>', '2016-07-05 16:24:34', 'admin', 0, 4),
(8, '<p>other info</p>', '2016-07-05 16:26:58', 'admin', 0, 72),
(9, '<p>info here</p>', '2016-07-05 16:29:21', 'admin', 0, 72),
(10, '<p>bad weather</p>\r\n<p>&nbsp;</p>', '2016-07-06 07:40:41', 'admin', 0, 72);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `sms_form_124_corrective_actions`
--

INSERT INTO `sms_form_124_corrective_actions` (`id`, `action`, `owner`, `completion_date`, `modified`, `status`, `incident_id`, `reported_by`, `priority`, `completion_status`, `completed_on`, `remark`) VALUES
(1, 'Review safety policy', 'Bwire Samuel', '2016-05-19', '2015-08-28 03:23:32', 1, 46, 'admin', 1, 'Pending', '0000-00-00', ''),
(2, 'Review safety policy', 'Bwire Samuel', '2015-08-29', '2015-09-23 09:37:33', 0, 47, 'sms', 1, 'Pending', '0000-00-00', ''),
(3, 'Get a more professional technician', 'admin', '2016-06-09', '2016-06-09 00:23:02', 1, 82, 'admin', 5, 'Pending', '0000-00-00', ''),
(4, 'Purchase new server', 'UNKNOWN', '2016-06-09', '2016-06-09 00:24:48', 1, 82, 'admin', 1, 'Pending', '2016-06-01', ''),
(5, 'Get a more professional technician', 'admin', '2016-06-19', '2016-06-19 04:40:44', 1, 94, 'admin', 1, 'Done', '2016-06-19', ''),
(6, 'Install New power installations', 'Bwire', '2016-06-25', '2016-06-25 06:17:51', 1, 126, 'bwire', 8, 'Pending', '0000-00-00', ''),
(7, '<p>informaton here</p>', 'admin', '2016-07-06', '2016-07-05 16:12:00', 1, 3, 'admin', 1, 'Pending', '2016-07-06', ''),
(8, '<p>info here</p>', 'UNKNOWN', '2016-07-05', '2016-07-06 04:29:45', 0, 3, 'admin', 1, 'Pending', '0000-00-00', ''),
(9, '<p>sms staff training program</p>', 'admin', '2016-07-06', '2016-07-06 08:02:54', 1, 143, 'admin', 3, 'Pending', '0000-00-00', '<p>need to be put in plan</p>');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `sms_form_124_data`
--

INSERT INTO `sms_form_124_data` (`id`, `incident_id`, `type_of_incident`, `case_no`, `employee_name`, `employee_number`, `supervisor`, `department`, `location_of_incident`, `movement_area`, `hospital`, `date_of_incident`, `time_of_incident`, `date_reported`, `type_of_injury`, `body_part_injured`, `cause_of_incident`, `incident_site`, `type_of_equipment_involved`, `related_act`, `weather_conditions`, `incident_description`, `investigation`, `area_supervisor`, `analysis_date`, `completed_by`, `modified`, `status`) VALUES
(1, 47, 'Injury', '2317', 'Bwire Samuel', '45', '', 'SMS', 'airport floor 2', '', '', '2015-08-27', '15:00 Hours', '2015-08-27', '', '', 'slippery floor', '', '', '', '', '', '', 'John Doe', '0000-00-00', 'bwire', '2015-08-27 12:05:51', 1),
(2, 46, 'Injury', 'HZD/A/46/15', 'Bwire Samuel', '45', '', 'SMS', 'airport floor 2', '', '', '2015-08-27', '15:00 Hours', '2015-08-27', '', '', 'slippery floor', '', '', '', '', '', '', 'John Doe', '0000-00-00', 'bwire', '2015-08-27 12:16:42', 1),
(3, NULL, 'Injury', 'TestCase', 'Kraiba Kraiba', 'Kraiba', '', 'Kraiba', 'Kraiba', '', '', '2016-02-01', '21000', '2016-02-01', '', '', 'Kraiba', '', '', '', '', '', '', 'Kriaba', '0000-00-00', 'admin', '2016-02-01 04:19:16', 1),
(4, 2, 'Equip', 'CASE', 'EMPLOYEE', 'EMPLOYEE #', 'SUPERVISOR', 'DEPARTMENT', 'LOCATION', 'YES', 'N/A', '2016-07-05', '23:00HRS', '2016-07-05', 'INJURY', 'EQUIPMENT', 'CAUSE', 'SITE', 'EQUIPMENT TYPE', 'CONDITION', 'WEATHER', '<p>INFORMATION GOES HERE</p>', '', 'SUPERVISOR', '0000-00-00', 'admin', '2016-02-09 09:44:29', 1),
(5, 2, 'Weather', 'UNKNOWN', 'EMPLOYEE', 'EMPLOYEE #', 'SUPERVISOR', 'DEPARTMENT', 'LOCATION', 'Yes', 'N/A', '2016-07-05', '23:00HRS', '2016-07-05', 'INJURY', 'EQUIPMENT', 'UNKNOWN', 'SITE', 'EQUIPMENT TYPE', 'CONDITION', 'WEATHER', '<p>some information here</p>', '', 'SUPERVISOR', '0000-00-00', 'admin', '2016-07-05 16:06:29', 1),
(6, 6, 'Injury', 'UNKNOWN', 'Mubiru Frank', '', '', '', 'LOCATION', '', '', '2016-07-05', '23:00HRS', '2016-07-05', '', '', '', '', '', '', '', '<p>informaton here</p>', '', '', '0000-00-00', 'admin', '2016-07-05 16:19:55', 1);

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
(1, 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', '2015-08-28 04:06:56', 1, 'admin', 47),
(2, 'Yes', 'Yes', 'Yes', 'Yes', 'No', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', '2015-08-28 04:09:03', 1, 'admin', 47),
(3, 'No', 'No', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', '2016-02-09 09:51:56', 1, 'admin', NULL),
(4, 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', '2016-06-24 22:18:38', 1, 'admin', 72);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

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
(7, 'Kampala', '2016-05-19 08:27:23', NULL),
(8, 'Audit Plan Title', '2016-07-03 07:15:44', 1),
(9, 'Audit Plan Title', '2016-07-04 01:11:55', 1);

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
(6, 'FORWARDED', 'CCCCCC', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `system_states`
--

INSERT INTO `system_states` (`id`, `details`, `modified`, `status`, `incident_id`, `reported_by`) VALUES
(1, 'When ATS direct speech line is not serviceable', '2015-08-04 08:07:06', 1, 14, ''),
(2, 'When ATS direct speech line is not serviceable', '2015-08-10 13:53:08', 1, 39, 'admin'),
(3, 'Uncontrolled environment', '2015-08-11 05:34:31', 1, 37, 'admin'),
(4, 'Worked on', '2015-09-25 11:07:46', 1, 57, 'admin'),
(5, 'When ATS direct speech line is not serviceable', '2015-10-01 08:49:01', 1, 65, 'admin'),
(6, 'When there is  delay in establishment of contact by Communication center with Kinshasa ACC', '2015-10-01 08:49:59', 1, 65, 'admin'),
(7, 'unknown', '2016-05-11 07:38:12', 1, 65, 'admin'),
(8, ' direct land-line telephone ', '2015-10-01 08:52:29', 1, 65, 'admin'),
(9, 'Worked on', '2016-05-11 07:38:16', 1, 67, 'admin'),
(10, 'Worked on', '2016-05-11 07:38:19', 1, 67, 'admin'),
(11, 'Working fine', '2016-05-11 07:38:24', 1, 77, 'admin'),
(12, 'Uncontrolled environment', '2016-05-11 07:38:31', 1, 40, 'admin'),
(13, 'At vero eos et accusamus et iusto odio dignissimos', '2016-05-11 07:38:44', 1, 88, 'sms'),
(14, 'When overgrown trees obstruct towers view of movement areas during landing and take off of aircraft.', '2016-01-20 06:22:06', 1, 98, 'admin'),
(15, 'Temporibus autem quibusdam et aut officiis ', '2016-05-11 07:38:54', 1, 83, 'Samuel.B'),
(16, 'Itaque earum rerum hic tenetur a sapiente delectus.', '2016-05-11 07:39:07', 1, 83, 'Samuel.B'),
(17, 'unknown', '2016-05-11 07:39:14', 1, 86, 'admin'),
(18, 'Monitored', '2016-06-25 02:07:18', 1, 72, 'admin'),
(19, 'Install monitoring system', '2016-06-25 02:07:40', 1, 72, 'admin'),
(20, 'Can cause death', '2016-06-25 04:28:51', 1, 126, 'bwire'),
(21, 'Install monitoring systems', '2016-07-10 04:11:49', 1, 149, 'admin');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `title`, `location`, `analyst`, `date`, `modified`, `status`, `reported_by`, `change_management_id`) VALUES
(1, 'Installation and commissioning of VCCS.', 'ENTEBBE', 'HASSAN B.MUKIIBBI.', '2016-07-07', '2015-08-19 11:54:44', 1, 'rogers', NULL),
(2, 'Replace door locks', 'server room', 'Henry', '2015-11-03', '2015-11-03 10:53:14', 1, 'admin', NULL),
(3, 'Replace door locks again', 'server room', 'Henry', '2016-07-05', '2015-11-03 10:53:14', 1, 'admin', NULL),
(4, 'Change Management Title', 'DIVISION', 'ORGINATOR', '2016-07-06', '2016-07-10 18:05:11', 1, 'admin', 7),
(5, 'VHF RADIOS REINSTALLATION', 'TOWER', 'ANDREW MWESIGE', '2016-07-11', '2016-07-10 18:43:43', 1, 'admin', 4);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `task_steps`
--

INSERT INTO `task_steps` (`id`, `task_id`, `description`, `modified`, `status`, `reported_by`) VALUES
(1, 1, 'Pre-installation meeting', '2015-08-20 07:11:56', 1, 'admin'),
(2, 1, 'Unpacking of equipment from the shipping boxes.', '2015-08-20 07:43:54', 1, 'admin'),
(3, 1, 'Installation of electronic equipment rack.', '2015-08-20 08:07:54', 1, 'admin'),
(4, 1, 'Cable terminations and installation.', '2015-08-20 08:09:24', 1, 'admin'),
(5, 3, 'Remove old locks', '2015-11-03 10:54:03', 1, 'admin'),
(6, 3, 'install new locks', '2015-11-03 10:58:23', 1, 'admin'),
(7, 3, 'install new locks', '2015-11-03 11:03:36', 1, 'admin'),
(8, 1, 'task step a', '2016-07-07 06:00:25', 1, 'rogers'),
(9, 2, 'task step info', '2016-07-10 17:21:59', 1, 'admin'),
(10, 4, 'task step info', '2016-07-10 18:35:21', 1, 'admin'),
(11, 5, 'Inform all relevant staff of new change', '2016-07-10 18:44:12', 1, 'admin');

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
(1, 2, 'Shipping boxes are wooden and tightly sealed with nails.', '2015-08-20 08:06:32', 1, 'admin'),
(2, 3, 'There is need to have protective gear.', '2015-08-20 08:08:57', 1, 'admin'),
(3, 4, 'There is need to have protective wear.', '2015-08-20 08:11:37', 1, 'admin'),
(4, 5, 'has to be done urgently', '2015-11-03 10:58:10', 1, 'admin'),
(5, 5, 'has to be done urgently', '2015-11-03 11:03:53', 1, 'admin');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `task_step_hazards`
--

INSERT INTO `task_step_hazards` (`id`, `task_step_id`, `details`, `modified`, `status`, `reported_by`) VALUES
(1, 2, 'Improperly disposed nails.', '2015-08-20 07:44:13', 1, 'admin'),
(2, 2, 'Removed wooden lids.', '2015-08-20 07:44:30', 1, 'admin'),
(3, 3, 'Tools falling.', '2015-08-20 08:08:10', 1, 'admin'),
(4, 4, 'Cables breaking', '2015-08-20 08:09:40', 1, 'admin'),
(5, 4, 'Cables breaking', '2015-08-20 08:09:53', 1, 'admin'),
(6, 4, 'Staff falling during installation.', '2015-08-20 08:10:07', 1, 'admin'),
(7, 4, 'Tools falling', '2015-08-20 08:10:20', 1, 'admin'),
(8, 5, 'Security loosened', '2015-11-03 10:56:52', 1, 'admin'),
(9, 5, 'Damage on door frame', '2015-11-03 11:02:05', 1, 'admin'),
(10, 5, 'Made necessary adjustments to wall', '2016-07-05 23:41:30', 1, 'admin'),
(11, 8, 'hazard', '2016-07-07 06:00:34', 1, 'rogers'),
(12, 10, 'Made necessary adjustments to wall', '2016-07-10 18:35:26', 1, 'admin');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `task_step_hazard_controls`
--

INSERT INTO `task_step_hazard_controls` (`id`, `task_step_id`, `details`, `modified`, `status`, `reported_by`) VALUES
(1, 2, 'Use of appropriate tools for unpacking.', '2015-08-20 07:53:00', 1, 'admin'),
(2, 2, 'Proper disposal of removed nails and boards.', '2015-08-20 07:53:12', 1, 'admin'),
(3, 2, 'Nails properly stored.', '2015-08-20 07:53:24', 1, 'admin'),
(4, 2, 'Wooden lid will be collected together and handed to PDU for disposal.', '2015-08-20 07:53:36', 1, 'admin'),
(5, 3, 'Careful use of tools and proper body earthing and discharge techniques.', '2015-08-20 08:08:24', 1, 'admin'),
(6, 3, 'Tools used by competent engineers.', '2015-08-20 08:08:35', 1, 'admin'),
(7, 3, 'Wearing protective gears during installation exercise.', '2015-08-20 08:08:44', 1, 'admin'),
(8, 4, 'Cables to be tightened with tie wraps.', '2015-08-20 08:10:48', 1, 'admin'),
(9, 4, 'Engineers should be trained on how to use and handle tools were necessary.', '2015-08-20 08:11:00', 1, 'admin'),
(10, 4, 'Wearing protective gears during installation.', '2015-08-20 08:11:10', 1, 'admin'),
(11, 4, 'Installation of cable led and supervised by Thales engineers', '2015-08-20 08:11:26', 1, 'admin'),
(12, 5, 'improve security at gate', '2015-11-03 10:57:14', 1, 'admin'),
(13, 4, 'hazard control', '2016-07-07 06:00:42', 1, 'rogers'),
(14, 8, 'hazard control', '2016-07-07 06:00:55', 1, 'rogers'),
(15, 10, 'hazard control', '2016-07-10 18:35:33', 1, 'admin');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `department`, `email`, `phone_number`, `position`, `category`, `modified`, `status`, `username`, `password`, `role`, `user_group_id`, `user_department_id`) VALUES
(1, 'andrew', 'SMS', 'mwesigea@gmail.com', '', 'PTO/SMS', 'admin', '2016-06-24 11:44:07', 1, 'andrew', '21232f297a57a5a743894a0e4a801fc3', 'SMS Admin', 3, 1),
(2, 'admin', 'SMS', 'info@caauganda.com', '', 'DUTY OFFICER', 'admin', '2016-07-07 02:52:48', 1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'SMS Admin', 3, 1),
(3, 'guest', 'NONE', 'info@caauganda.com', '', 'GUEST', 'public', '2016-07-07 02:55:34', 1, 'guest', '084e0343a0486ff05530df6c705c8bb4', 'guest', NULL, NULL),
(4, 'kasirye', 'SMS', 'mitchmichael@hotmail.com', '+256702953774', 'SMS', 'admin', '2016-07-07 02:53:47', 1, 'kasirye', '21232f297a57a5a743894a0e4a801fc3', 'SMS Admin', 3, 1),
(5, 'bwire', 'IT', 'bwire@programmer.net', '+256701198000', 'Programmer', 'admin', '2016-07-07 02:53:47', 1, 'bwire', '21232f297a57a5a743894a0e4a801fc3', 'System Admin', NULL, NULL),
(6, 'rogers', 'SMS', 'rwanzunula@gmail.com', '', 'PAIMO-SMS/QA', 'admin', '2016-07-07 02:53:47', 1, 'rogers', '21232f297a57a5a743894a0e4a801fc3', 'SMS Admin', 3, 1),
(7, 'Kraiba Semakula', 'Strep', 'krabz01@gmail.com', '2556702432543', 'Admin', 'sitrep', '2016-07-07 02:53:47', 1, 'kraiba', '21232f297a57a5a743894a0e4a801fc3', 'STREP Admin', 1, 3),
(8, 'guest', '', '', '', '', '', '2016-07-07 02:53:47', 1, 'guest', '21232f297a57a5a743894a0e4a801fc3', '', NULL, NULL),
(9, 'matovu', 'sms', 'davimato@yahoo.com', '', 'SMS Officer', 'admin', '2016-07-07 02:53:47', 1, 'matovu', '21232f297a57a5a743894a0e4a801fc3', 'SMS Admin', 3, 1),
(10, 'kakama', 'sms', 'kakamaedmond@gmail.com', '', 'sms', 'admin', '2016-07-07 02:53:47', 1, 'kakama', '21232f297a57a5a743894a0e4a801fc3', 'SMS Admin', 3, 1),
(11, 'sitrep', 'sms', 'davimato@yahoo.com', '', 'sms', 'admin', '2016-07-07 02:53:47', 1, 'sitrep', '21232f297a57a5a743894a0e4a801fc3', 'SMS Admin', NULL, NULL),
(12, 'wabomba', 'sms', 'mwabomba@caa.co.ug', '', 'sms', 'admin', '2016-07-07 02:53:47', 1, 'wabomba', '21232f297a57a5a743894a0e4a801fc3', 'SMS Admin', 3, 1),
(13, 'ronald', 'sms', '', '', 'sms admin', 'admin', '2016-07-07 02:53:47', 1, 'ronald', '21232f297a57a5a743894a0e4a801fc3', 'System Admin', NULL, NULL);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user_departments`
--

INSERT INTO `user_departments` (`id`, `name`, `description`, `status`) VALUES
(1, 'SMS', '', 1),
(2, 'IT', '', 1),
(3, 'SITREP', '', 1);

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
(1, 'Other DANS staff', '2016-01-17 09:30:44'),
(2, 'System Admin', '2016-01-17 09:30:44'),
(3, 'SMS Admin', '2016-01-17 09:30:44'),
(4, 'SMS Officer', '2016-01-17 09:30:44'),
(5, 'SITREP Admin', '2016-02-01 03:18:59');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `verifications`
--

INSERT INTO `verifications` (`id`, `verified_by`, `note`, `modified`, `status`, `incident_id`) VALUES
(1, 'Bwire Samuel', 'Use of trolleys has been stopped according to the action to be taken.', '2015-07-25 08:40:24', 1, 11),
(2, 'Bwire Samuel', 'All work done by the electrician was done well according to standards.', '2015-07-25 10:45:31', 1, 10),
(3, 'Bwire Samuel', '', '2015-07-25 16:41:38', 1, 1),
(4, 'Bwire Samuel', 'Verification done', '2016-06-25 04:39:17', 1, 126),
(5, 'admin', '', '2016-07-06 08:13:57', 1, 143),
(6, 'Bwire Samuel', 'no comment', '2016-07-10 09:16:44', 1, 149);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `workshops`
--

INSERT INTO `workshops` (`id`, `subject`, `hours`, `from_date`, `to_date`, `venue`, `modified`, `status`, `reported_by`) VALUES
(1, 'SMS Training', '12:00 - 15:00', '2015-09-18', '2015-09-19', 'Kampala International Hotel', '0000-00-00 00:00:00', 1, 'admin');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `workshop_facilitators`
--

INSERT INTO `workshop_facilitators` (`id`, `workshop_id`, `print_name`, `organization`, `status`, `reported_by`, `modified`) VALUES
(1, 1, 'CAA', 'Civil Aviation Authority', 1, 'admin', '0000-00-00 00:00:00'),
(2, 1, 'NAME', 'ORGANIZATION', 1, 'admin', '2016-07-06 01:04:17');

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
