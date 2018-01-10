-- phpMyAdmin SQL Dump
-- version 4.0.10.18
-- https://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Oct 27, 2017 at 10:15 AM
-- Server version: 5.6.36-cll-lve
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `checklist_form`
--

-- --------------------------------------------------------

--
-- Table structure for table `sub_sub_menu`
--

CREATE TABLE IF NOT EXISTS `sub_sub_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `href` varchar(200) DEFAULT NULL,
  `main_parent` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=136 ;

--
-- Dumping data for table `sub_sub_menu`
--

INSERT INTO `sub_sub_menu` (`id`, `parent_id`, `name`, `href`, `main_parent`) VALUES
(1, 1, 'Site Safety Management Plan', 'Site_Safety_Management_Plan_iframe.php', 1),
(2, 1, 'Site Safety Management Plan Signing Page', 'site_signing_page.php', 1),
(3, 1, 'Site Layout and Evacuation Plan', '', 1),
(4, 9, 'New Site Induction Form', 'site_induction_form_new.php', 3),
(5, 9, 'Approved Site Induction Form', 'approved_forms.php', 3),
(6, 9, 'Site Induction Register', 'employee.php', 3),
(7, 9, 'Site Induction Email Request', 'site_induction_email_request.php', 3),
(8, 9, 'Site Induction Video', '', 3),
(9, 10, 'Blank Ceiling Induction Form', '', NULL),
(10, 10, 'Approved Ceiling Induction Form', '', NULL),
(11, 10, 'Ceiling Induction Video', '', NULL),
(12, 11, 'New Visitor Induction Form', 'visitor_induction_blank.php', 3),
(13, 11, 'Approved Visitor Induction Form', 'visitor_induction.php', 3),
(14, 11, 'Sign Out Visitor Induction Form', 'visitor_induction_out.php', 3),
(15, 12, 'New Driver Induction Form', '', NULL),
(16, 12, 'Approved Driver Induction Form', '', NULL),
(17, 21, 'New Permit to Work Authorisation', '', NULL),
(18, 21, 'Approved Permit to Work Authorisation', '', NULL),
(19, 21, 'Permit to Work Authorisation Register', '', NULL),
(20, 22, 'New Permit to Excavate', '', NULL),
(21, 22, 'Approved Permit to Excavate', '', NULL),
(22, 22, 'Permit to Excavate Register', '', NULL),
(23, 23, 'New Permit to Hot Work', '', NULL),
(24, 23, 'Approved Permit to Hot Work', '', NULL),
(25, 23, 'Permit to Hot Work Register', '', NULL),
(26, 24, 'New Permit to Enter Confined Space', '', NULL),
(27, 24, 'Approved Permit to Enter Confined Space', '', NULL),
(28, 24, 'Permit to Enter Confined Space Register', '', NULL),
(29, 25, 'New Permit to Enter Cold Room / Freezer', '', NULL),
(30, 25, 'Approved Permit to Enter Cold Room / Freezer', '', NULL),
(31, 25, 'Permit to Enter Cold Room / Freezer', '', NULL),
(32, 26, 'New Permit to Penetrate Surface', '', NULL),
(33, 26, 'Approved Permit to Penetrate Surface', '', NULL),
(34, 26, 'Permit to Penetrate Surface Register', '', NULL),
(35, 27, 'New Permit to Access Ceiling', '', NULL),
(36, 27, 'Approved Permit to Access Ceiling', '', NULL),
(37, 27, 'Permit to Access Ceiling Register', '', NULL),
(38, 28, 'New Permit to Access Ceiling', '', NULL),
(39, 28, 'Approved Permit to Access Ceiling', '', NULL),
(40, 28, 'Permit to Access Ceiling Register', '', NULL),
(41, 29, 'Blank Permit to Energise Electrical', '', NULL),
(42, 29, 'Approved Permit to Energise Electrical', '', NULL),
(43, 29, 'Permit to Energise Electrical Register', '', NULL),
(44, 30, 'New Permit to Energise Services', '', NULL),
(45, 30, 'Approved Permit to Energise Services', '', NULL),
(46, 30, 'Permit to Energise Services Register', '', NULL),
(47, 32, 'New OH&S Committee Constitution ', '', NULL),
(48, 32, 'Approved OH&S Committee Constitution ', '', NULL),
(49, 32, 'OH&S Committee Constitution Register', '', NULL),
(50, 33, 'New OH&S Safety Committee Minutes & Site OH&S Inspection Form', '', NULL),
(51, 33, 'Approved OH&S Safety Committee Minutes & Site OH&S Inspection Form', '', NULL),
(52, 33, 'OH&S Safety Committee Minutes Register', '', NULL),
(53, 34, 'New Evacuation Test Checklist', '', NULL),
(54, 34, 'Approved Evacuation Test Checklist', '', NULL),
(55, 34, 'Evacuation Test Register', '', NULL),
(56, 35, 'Blank Nurse Call Inspection Checklist', '', NULL),
(57, 35, 'Approved  Nurse Call Inspection Checklist', '', NULL),
(58, 35, 'Nurse Call Inspection Checklist Register', '', NULL),
(59, 36, 'New Air Conditioning Checklist', '', NULL),
(60, 36, 'Approved Air Conditioning Checklist ', '', NULL),
(61, 36, 'Air Conditioning Checklist Register ', '', NULL),
(62, 37, 'New Fire Protection Checklist', '', NULL),
(63, 37, 'Approved Fire Protection Checklist', '', NULL),
(64, 37, 'Fire Protection Checklist Register', '', NULL),
(65, 38, 'New Spill Kit General Purpose Checklist', '', NULL),
(66, 38, 'Approved Spill Kit General Purpose Checklist', '', NULL),
(67, 38, 'Spill Kit General Purpose Checklist Register', '', NULL),
(68, 39, 'New Site Security Checklist', '', NULL),
(69, 39, 'Approved Site Security Checklist', '', NULL),
(70, 39, 'Site Security Checklist Register', '', NULL),
(71, 40, 'Blank First Aid Checklist', '', NULL),
(72, 40, 'Approved First Aid Checklist', '', NULL),
(73, 40, 'First Aid Checklist Register', '', NULL),
(74, 41, 'New Scaffold Inspection Checklist', '', NULL),
(75, 41, 'Approved Scaffold Inspection Checklist', '', NULL),
(76, 41, 'Scaffold Inspection Checklist Register', '', NULL),
(77, 42, 'New Hoist Inspection Checklist', '', NULL),
(78, 42, 'Approved Hoist Inspection Checklist', '', NULL),
(79, 42, 'Hoist Inspection Checklist Register', '', NULL),
(80, 43, 'New Roof Access Checklist', '', NULL),
(81, 43, 'Approved Roof Access Checklist', '', NULL),
(82, 43, 'Roof Access Checklist Register', '', NULL),
(83, 44, 'New Noise Hazard Identification Checklist', '', NULL),
(84, 44, 'Approved Noise Hazard Identification Checklist', '', NULL),
(85, 44, 'Noise Hazard Identification Checklist Register', '', NULL),
(86, 45, 'New Roof Sign Off Checklist', '', NULL),
(87, 45, 'Roof Sign Off Checklist Register', '', NULL),
(88, 46, 'Approved Structural Steel Erection Signoff Checklist', '', NULL),
(89, 46, 'Structural Steel Erection Signoff Checklist register', '', NULL),
(90, 46, 'Structural Steel Erection Signoff Checklist', '', NULL),
(91, 47, 'New Crane Lift Plan Checklist', '', NULL),
(92, 47, 'Approved Crane Lift Plan Checklist', '', NULL),
(93, 47, 'Crane Lift Plan Checklist Register', '', NULL),
(94, 48, 'New Precast Panel Erection Sign off Checklist', '', NULL),
(95, 48, ' Approved Precast Panel Erection Sign off Checklist', '', NULL),
(96, 48, 'Precast Panel Erection Sign off Checklist Register', '', NULL),
(98, 55, '', 'checklist.php', 13),
(99, 55, '', 'checklist_view.php', 13),
(100, 55, '', 'view_itp.php', 13),
(101, 55, '', 'form.php', 13),
(102, 13, '', 'edit_category.php', 4),
(103, 13, '', 'add_category.php', 4),
(104, 14, '', 'add_employer.php', 4),
(105, 14, '', 'edit_employer.php', 4),
(107, 15, '', 'consultant_register_add.php', 4),
(108, 31, '', 'statistics_week_form.php', 7),
(109, 31, '', 'statistics_month_form.php', 7),
(110, 20, '', 'site_attendance_daily.php', 5),
(111, 20, '', 'site_attendance_comments.php', 5),
(112, 20, '', 'site_attendance_monthly.php', 5),
(113, 20, '', 'site_attendance_approved_form.php', 5),
(114, 9, '', 'site_induction_approved.php', 3),
(115, 7, '', 'site_induction_form_unapproved.php', 2),
(116, 7, '', 'unapproved_forms.php', 2),
(117, 7, '', 'resubmitted_forms.php', 2),
(118, 7, '', 'site_induction_resubmitted.php', 2),
(119, 56, '', 'site_diary_new_home.php', 11),
(120, 52, '', 'site_instruction_approved_form.php', 20),
(121, 53, '', 'site_instruction_daily.php', 20),
(122, 53, '', 'site_instruction_weekly.php', 20),
(123, 53, '', 'site_instruction_monthly.php', 20),
(124, 55, '', 'add_itp_project.php', 13),
(125, 11, '', 'visitor_induction_form.php', 3),
(126, 11, '', 'visitor_induction_form_sign_out.php', 3),
(127, 58, '', 'site_instruction_saved_form.php', 20),
(129, 18, NULL, 'test_image_gallery.php', 5),
(130, 11, 'Visitor Induction Register', 'visitor_induction_register.php', 3),
(131, 56, '', 'site_diary_approved.php', 11),
(132, 56, '', 'site_diary_attention.php', 11),
(133, 59, '', 'site_diary_approved_list.php', 11),
(134, 60, '', 'site_diary_register.php', 11),
(135, 1, 'Internal Traffic Management Plan', '', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
