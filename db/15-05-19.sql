-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2019 at 07:54 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `recruiter_goa`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `blog_id` int(11) NOT NULL,
  `blog_title` varchar(500) NOT NULL,
  `blog_category_id` int(11) NOT NULL,
  `blog_by` varchar(255) NOT NULL,
  `blog_body` longtext NOT NULL,
  `blog_slug` varchar(500) NOT NULL,
  `blog_body_draft` longtext NOT NULL,
  `last_updated` date NOT NULL,
  `featured_image` varchar(100) NOT NULL,
  `draft` int(11) NOT NULL,
  `published` int(11) NOT NULL,
  `date_posted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`blog_id`, `blog_title`, `blog_category_id`, `blog_by`, `blog_body`, `blog_slug`, `blog_body_draft`, `last_updated`, `featured_image`, `draft`, `published`, `date_posted`) VALUES
(1, 'Testasdasd', 1, 'Pramit Sawant', 'asdassad', '', 'asdassad', '0000-00-00', '', 0, 1, '2019-05-08 17:19:33'),
(2, 'asdasdasd', 2, '0', '', '', '<h4>TEst</h4>', '0000-00-00', 'egyptian_sunrise_by_red_flare-d3cwyxm10.jpg', 1, 0, '2019-05-08 17:19:33'),
(3, 'asasdasdasd', 1, '0', 'af ajfjajaf<br>', '', 'af ajfjajaf<br>', '0000-00-00', '', 0, 0, '2019-05-08 17:19:33'),
(4, 'Blog 1', 1, '0', '<h1>Title</h1><p>Content</p>', '', '<h1>Title</h1><p>Content</p>', '0000-00-00', '', 0, 0, '2019-05-08 17:19:33'),
(5, 'Title TEst', 2, '0', '', '', '', '0000-00-00', '', 1, 0, '2019-05-08 17:19:33'),
(6, 'Test Blog', 1, 'Prajwal Dessai', '<h2><strong>Test Blog Header</strong></h2><p><strong><br></strong></p><p>Some test description will go here. some demo contents of blogs desicription.</p><p><span style=\\\"font-family: Roboto, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400;\\\">Some test description will go here. some demo contents of blogs desicription.</span><br></p><p><span style=\\\"font-family: Roboto, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400;\\\">Some test description will go here. some demo contents of blogs desicription.</span><span style=\\\"font-family: Roboto, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400;\\\"><br></span></p><p><span style=\\\"font-family: Roboto, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400;\\\">Some test description will go here. some demo contents of blogs desicription.</span><span style=\\\"font-family: Roboto, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400;\\\"><br></span></p><p><span style=\\\"font-family: Roboto, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400;\\\">Some test description will go here. some demo contents of blogs desicription.</span><span style=\\\"font-family: Roboto, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400;\\\"><br></span></p><p><span style=\\\"font-family: Roboto, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400;\\\">Some test description will go here. some demo contents of blogs desicription.</span><span style=\\\"font-family: Roboto, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400;\\\"><br></span></p><br><h2><strong>Some Header 2</strong></h2><p>some details will go here test 3.&nbsp;<span style=\\\"font-family: Roboto, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400;\\\">some demo contents of blogs desicription. Some dummy text here and so on.</span></p><p>Combined with a handful of model sentence structures, to generate lorem Ipsum which.</p><br><p>Combined with a handful of model sentence structures, to generate lorem Ipsum which<br></p><br>', 'Test-Blog', '<h2><strong>Test Blog Header</strong></h2><p><strong><br></strong></p><p>Some test description will go here. some demo contents of blogs desicription.</p><p><span style=\\\"font-family: Roboto, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400;\\\">Some test description will go here. some demo contents of blogs desicription.</span><br></p><p><span style=\\\"font-family: Roboto, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400;\\\">Some test description will go here. some demo contents of blogs desicription.</span><span style=\\\"font-family: Roboto, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400;\\\"><br></span></p><p><span style=\\\"font-family: Roboto, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400;\\\">Some test description will go here. some demo contents of blogs desicription.</span><span style=\\\"font-family: Roboto, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400;\\\"><br></span></p><p><span style=\\\"font-family: Roboto, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400;\\\">Some test description will go here. some demo contents of blogs desicription.</span><span style=\\\"font-family: Roboto, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400;\\\"><br></span></p><p><span style=\\\"font-family: Roboto, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400;\\\">Some test description will go here. some demo contents of blogs desicription.</span><span style=\\\"font-family: Roboto, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400;\\\"><br></span></p><br><h2><strong>Some Header 2</strong></h2><p>some details will go here test 3.&nbsp;<span style=\\\"font-family: Roboto, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400;\\\">some demo contents of blogs desicription. Some dummy text here and so on.</span></p><p>Combined with a handful of model sentence structures, to generate lorem Ipsum which.</p><br><p>Combined with a handful of model sentence structures, to generate lorem Ipsum which<br></p><br>', '2019-05-12', '', 0, 1, '2019-05-12 10:02:16');

-- --------------------------------------------------------

--
-- Table structure for table `blog_category`
--

CREATE TABLE `blog_category` (
  `blog_category_id` int(11) NOT NULL,
  `blog_category_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog_category`
--

INSERT INTO `blog_category` (`blog_category_id`, `blog_category_name`) VALUES
(1, 'Company'),
(2, 'Candidate');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `company_id` int(25) NOT NULL,
  `user_id` int(15) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `company_type` varchar(150) DEFAULT NULL,
  `company_email` varchar(100) DEFAULT NULL,
  `company_phone` varchar(50) DEFAULT NULL,
  `company_location` varchar(500) NOT NULL,
  `company_about` text,
  `company_website` varchar(150) DEFAULT NULL,
  `company_linkedin` varchar(150) DEFAULT NULL,
  `company_twitter` varchar(150) DEFAULT NULL,
  `company_fb` varchar(250) DEFAULT NULL,
  `logo_path` varchar(250) DEFAULT NULL,
  `date_registered` date NOT NULL,
  `featured` bit(1) NOT NULL DEFAULT b'0',
  `enabled` tinyint(4) NOT NULL DEFAULT '1',
  `deleted` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_id`, `user_id`, `company_name`, `company_type`, `company_email`, `company_phone`, `company_location`, `company_about`, `company_website`, `company_linkedin`, `company_twitter`, `company_fb`, `logo_path`, `date_registered`, `featured`, `enabled`, `deleted`) VALUES
(1, 6, 'Bright Solutions', '1', 'hr@britsol.in', NULL, '6', 'Test Description', 'britsol.in', '', '', '', NULL, '2019-05-02', b'0', 1, 0),
(3, 9, 'Ajay Solutions 2', '2', 'hr@britsol.in', NULL, '3', '<b>Company Profile</b><div><b><br /></b></div><div><b>test data</b></div>', 'www.somename.com', NULL, NULL, NULL, NULL, '2019-05-01', b'0', 0, 0),
(5, 10, 'Test Company', '2', 'hr@britsol.in', NULL, '7', '<b>Test Company&nbsp;</b><div><ol><li><b>My test company</b></li><li><b>dummy content</b></li></ol></div>', 'goaelectronics.co.in', NULL, NULL, NULL, NULL, '2019-05-01', b'0', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `company_type`
--

CREATE TABLE `company_type` (
  `company_type_id` int(11) NOT NULL,
  `company_type` varchar(255) NOT NULL,
  `enabled` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company_type`
--

INSERT INTO `company_type` (`company_type_id`, `company_type`, `enabled`) VALUES
(1, 'Software Development', 1),
(2, 'Digital Marketing', 1);

-- --------------------------------------------------------

--
-- Table structure for table `job_applied`
--

CREATE TABLE `job_applied` (
  `apply_id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `applied_by_name` varchar(300) NOT NULL,
  `applied_by_email` varchar(255) NOT NULL,
  `applied_by_contact` varchar(20) NOT NULL,
  `current_position` varchar(255) DEFAULT NULL,
  `notes` varchar(500) DEFAULT NULL,
  `applied_by_cv_link` varchar(255) DEFAULT NULL,
  `call_for_interview` tinyint(4) NOT NULL DEFAULT '0',
  `status` varchar(25) NOT NULL DEFAULT 'New Application',
  `applied_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_applied`
--

INSERT INTO `job_applied` (`apply_id`, `job_id`, `applied_by_name`, `applied_by_email`, `applied_by_contact`, `current_position`, `notes`, `applied_by_cv_link`, `call_for_interview`, `status`, `applied_on`, `is_deleted`) VALUES
(1, 2, 'Prajwal Dessai', 'prajwaldessai@gmail.com', '08308583738', 'NA', NULL, 'upload/resume/2_prajwaldessai@gmail.com/', 0, 'New Application', '2019-04-06 22:08:33', 0),
(2, 5, 'Prajwal Dessai', 'prajwaldessai@gmail.com', '08308583738', 'NA', NULL, 'upload/resume/5_prajwaldessai@gmail.com/prajwaldessaiProfile.pdf', 0, 'New Application', '2019-04-19 21:28:53', 0),
(3, 3, '', '', '', NULL, NULL, NULL, 0, 'New Application', '2019-05-05 23:52:57', 0),
(4, 3, '', '', '', NULL, NULL, NULL, 0, 'New Application', '2019-05-05 23:52:57', 0),
(5, 1, '', '', '', NULL, NULL, NULL, 0, 'New Application', '2019-05-05 23:54:08', 0),
(6, 5, '', '', '', NULL, NULL, NULL, 0, 'New Application', '2019-05-05 23:54:08', 0),
(7, 3, '', '', '', NULL, NULL, NULL, 0, 'New Application', '2019-05-05 23:54:08', 0),
(8, 5, '', '', '', NULL, NULL, NULL, 0, 'New Application', '2019-05-05 23:54:08', 0),
(9, 1, '', '', '', NULL, NULL, NULL, 0, 'New Application', '2019-05-05 23:54:08', 0),
(10, 4, '', '', '', NULL, NULL, NULL, 0, 'New Application', '2019-05-05 23:54:39', 0),
(11, 4, '', '', '', NULL, NULL, NULL, 0, 'New Application', '2019-05-05 23:54:39', 0);

-- --------------------------------------------------------

--
-- Table structure for table `job_category`
--

CREATE TABLE `job_category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `enabled` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_category`
--

INSERT INTO `job_category` (`id`, `name`, `enabled`) VALUES
(1, 'Personal Assistant', 1),
(2, 'Office admin', 1),
(5, 'Manager', 1),
(8, 'Marketing', 1),
(9, 'Web Developer', 1);

-- --------------------------------------------------------

--
-- Table structure for table `job_experience`
--

CREATE TABLE `job_experience` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL COMMENT 'in years',
  `enabled` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_experience`
--

INSERT INTO `job_experience` (`id`, `name`, `enabled`) VALUES
(1, 'Less than 1 Year', 1),
(2, '1 - 2 years', 1),
(3, '2 - 3 years', 1),
(4, '3 - 4 years', 1),
(5, '4 - 5 years', 1),
(6, '5 - 6 years', 1);

-- --------------------------------------------------------

--
-- Table structure for table `job_keywords`
--

CREATE TABLE `job_keywords` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `enabled` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_keywords`
--

INSERT INTO `job_keywords` (`id`, `name`, `enabled`) VALUES
(1, 'Network Engineer', 1),
(2, 'Catering', 1),
(3, 'Software Testing', 1),
(4, 'Software Engineer', 1),
(5, 'Web Developer', 1),
(6, 'Android Developer', 1),
(7, 'Mobile Developer', 1),
(8, 'QA Engineer', 1),
(9, 'Quality Control', 1),
(10, 'Hotel & hospitality management', 1),
(11, 'Business Development', 1),
(12, 'Sales', 1),
(13, 'Operations', 1),
(14, 'Office Administration', 1),
(15, 'Data Entry', 1),
(16, 'Human Resource', 1),
(17, 'Civil Engineer', 1),
(18, 'Mechanical Engineer', 1),
(19, 'Electrical Engineer', 1),
(20, 'Photographer & Cinematography', 1),
(21, 'Content Writer / Blogger', 1);

-- --------------------------------------------------------

--
-- Table structure for table `job_post`
--

CREATE TABLE `job_post` (
  `job_id` int(11) NOT NULL,
  `job_title` varchar(255) NOT NULL,
  `job_posted_by` varchar(150) NOT NULL,
  `company_id` int(11) NOT NULL,
  `job_location` tinyint(150) NOT NULL,
  `job_type` varchar(100) NOT NULL,
  `job_category` varchar(150) NOT NULL,
  `job_description` text,
  `no_of_vacancy` int(11) DEFAULT NULL,
  `job_qualification` varchar(150) DEFAULT NULL,
  `job_experience` varchar(150) DEFAULT NULL,
  `salary_range` varchar(25) DEFAULT NULL,
  `company_location` varchar(250) DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `date_posted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `validity_in_days` tinyint(11) NOT NULL DEFAULT '30',
  `keywords` varchar(500) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '3',
  `enabled` tinyint(4) NOT NULL DEFAULT '0',
  `deleted` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_post`
--

INSERT INTO `job_post` (`job_id`, `job_title`, `job_posted_by`, `company_id`, `job_location`, `job_type`, `job_category`, `job_description`, `no_of_vacancy`, `job_qualification`, `job_experience`, `salary_range`, `company_location`, `expiry_date`, `date_posted`, `validity_in_days`, `keywords`, `status`, `enabled`, `deleted`) VALUES
(1, 'C++ Developer', 'Bright Solutions', 1, 4, '1', '5', 'Loreum ipsum dummy text', 2, '1', NULL, NULL, '4', '2019-04-01', '2017-03-03 11:04:39', 30, 'Network Engineer', 1, 1, 0),
(2, 'Ajay Solutions2', 'Ajay Solutions 2', 3, 5, '4', '9', '<b>Some Dummy Description</b><div><b><br></b></div><div>Test data</div><div>Test data</div>', 0, '', '', NULL, '2', '2019-03-31', '2019-03-24 09:05:28', 30, 'Network Engineer,Catering', 1, 1, 0),
(3, 'QA Engineer', 'Bright Solutions', 1, 5, '5', '5', NULL, 4, NULL, NULL, NULL, '4', '2019-04-30', '2019-04-19 10:17:48', 30, 'Network Engineer', 1, 1, 0),
(4, 'Marketing Intern', 'Test Company', 5, 7, '1', '8', '<p>Test Description</p><div><ul><li>Hello 123</li><li>Test lines</li></ul></div>', 2, '', '', NULL, '2', '2019-04-30', '2019-04-19 15:40:18', 30, 'Network Engineer', 1, 1, 0),
(5, 'Test Engineer  ', 'Bright Solutions', 1, 3, '1', '2', '<b>Test Description</b>', 0, '3', '2', '2', '4', '2019-04-30', '2019-05-01 15:53:31', 30, 'Network Engineer,Catering', 1, 1, 0),
(6, 'Content Writer', 'Bright Solutions', 1, 1, '2', '9', '<h4>Welcome To Recruiter Goa</h4><p>Expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone.</p><p>Who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure.</p><h5>Our Terms</h5><p>Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious some great physical exercise, except to.</p><ul><li>But because those who do not know how to pursue pleasure</li><li>Nor again is there anyone who loves or pursues</li><li>Except to obtain some advantage from it?</li><li>who avoids a pain that produces no resultant pleasure.</li></ul>', 0, NULL, NULL, NULL, NULL, '2019-06-13', '2019-05-14 16:19:30', 30, 'Software Engineer,Content Writer / Blogger', 3, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `job_post_hits`
--

CREATE TABLE `job_post_hits` (
  `job_id` int(11) NOT NULL,
  `hit_on_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ip_address` varchar(255) NOT NULL,
  `location_lattiude` varchar(255) NOT NULL,
  `location_longitude` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_post_hits`
--

INSERT INTO `job_post_hits` (`job_id`, `hit_on_date`, `ip_address`, `location_lattiude`, `location_longitude`) VALUES
(5, '2019-05-07 17:39:47', '::1', '', ''),
(5, '2019-05-07 17:41:31', '::1', '', ''),
(5, '2019-05-07 17:41:34', '::1', '', ''),
(5, '2019-05-07 17:42:00', '::1', '', ''),
(5, '2019-05-07 17:44:04', '::1', '', ''),
(5, '2019-05-07 17:45:47', '::1', '', ''),
(5, '2019-05-07 17:46:36', '::1', '', ''),
(5, '2019-05-07 17:46:56', '::1', '', ''),
(5, '2019-05-07 17:49:54', '::1', '', ''),
(5, '2019-05-07 17:53:01', '::1', '', ''),
(5, '2019-05-07 17:53:28', '::1', '', ''),
(5, '2019-05-07 17:54:40', '::1', '', ''),
(5, '2019-05-07 17:56:17', '::1', '', ''),
(5, '2019-05-07 17:56:20', '::1', '', ''),
(5, '2019-05-07 17:56:23', '::1', '', ''),
(5, '2019-05-07 17:56:44', '::1', '', ''),
(5, '2019-05-07 18:00:27', '::1', '', ''),
(5, '2019-05-07 18:00:48', '::1', '', ''),
(6, '2019-05-15 11:27:01', '::1', '', ''),
(6, '2019-05-15 11:29:21', '::1', '', ''),
(6, '2019-05-15 11:33:21', '::1', '', ''),
(6, '2019-05-15 11:35:16', '::1', '', ''),
(6, '2019-05-15 11:36:48', '::1', '', ''),
(6, '2019-05-15 11:41:56', '::1', '', ''),
(6, '2019-05-15 11:42:46', '::1', '', ''),
(6, '2019-05-15 11:45:26', '::1', '', ''),
(6, '2019-05-15 11:46:08', '::1', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `job_post_salary_range`
--

CREATE TABLE `job_post_salary_range` (
  `id` tinyint(4) NOT NULL,
  `salary_range` varchar(255) NOT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_post_salary_range`
--

INSERT INTO `job_post_salary_range` (`id`, `salary_range`, `enabled`) VALUES
(1, '< 5000', 1),
(2, '5000 - 10000', 1),
(3, '10,000 - 15,000', 1),
(4, '15,000 - 20,000', 1);

-- --------------------------------------------------------

--
-- Table structure for table `job_post_status`
--

CREATE TABLE `job_post_status` (
  `job_post_status_id` int(11) NOT NULL,
  `job_post_status` varchar(255) NOT NULL,
  `enabled` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_post_status`
--

INSERT INTO `job_post_status` (`job_post_status_id`, `job_post_status`, `enabled`) VALUES
(1, 'Approved', 1),
(2, 'Rejected', 1),
(3, 'Pending', 1),
(4, 'Pause', 1),
(5, 'Deleted', 1),
(6, 'Active', 1),
(7, 'Expired', 1);

-- --------------------------------------------------------

--
-- Table structure for table `job_post_type`
--

CREATE TABLE `job_post_type` (
  `job_post_type_id` int(11) NOT NULL,
  `job_post_type` varchar(100) NOT NULL,
  `enabled` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_post_type`
--

INSERT INTO `job_post_type` (`job_post_type_id`, `job_post_type`, `enabled`) VALUES
(1, 'Full Time', 1),
(2, 'Part Time', 1),
(3, 'Intern', 1),
(4, 'Freelance', 1),
(5, 'Temporary', 1),
(6, 'Contaract', 1);

-- --------------------------------------------------------

--
-- Table structure for table `job_qualification`
--

CREATE TABLE `job_qualification` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `enabled` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_qualification`
--

INSERT INTO `job_qualification` (`id`, `name`, `enabled`) VALUES
(1, 'Matriculate', 1),
(2, 'Intermediate', 1),
(3, 'Diploma', 1),
(4, 'Graduate', 1),
(5, 'Post Graduate', 1);

-- --------------------------------------------------------

--
-- Table structure for table `job_searched`
--

CREATE TABLE `job_searched` (
  `id` int(11) NOT NULL,
  `search_term` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `location_taluka`
--

CREATE TABLE `location_taluka` (
  `taluka_id` int(11) NOT NULL,
  `taluka_name` varchar(100) NOT NULL,
  `state_name` varchar(100) NOT NULL DEFAULT 'Goa',
  `enabled` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location_taluka`
--

INSERT INTO `location_taluka` (`taluka_id`, `taluka_name`, `state_name`, `enabled`) VALUES
(1, 'Panjim', 'Goa', 1),
(2, 'Margao', 'Goa', 1),
(3, 'Mapusa', 'Goa', 1),
(4, 'Vasco ', 'Goa', 1),
(5, 'Ponda', 'Goa', 1),
(6, 'Bicholim', 'Goa', 1),
(7, 'Sanguem', 'Goa', 1),
(8, 'Canacona', 'Goa', 1),
(9, 'Quepem', 'Goa', 1),
(10, 'Savordem', 'Goa', 1),
(11, 'Pernem', 'Goa', 1),
(12, 'Valpoi', 'Goa', 1),
(13, 'Marcel', 'Goa', 1),
(14, 'Sanquelim', 'Goa', 1);

-- --------------------------------------------------------

--
-- Table structure for table `subscription`
--

CREATE TABLE `subscription` (
  `subscription_id` int(11) NOT NULL,
  `subscribed_by` varchar(255) NOT NULL,
  `subscription_category` int(11) NOT NULL,
  `subscription_location` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `suspended_profiles`
--

CREATE TABLE `suspended_profiles` (
  `profile_id` int(11) NOT NULL,
  `profile_email` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `sub_user` int(5) NOT NULL DEFAULT '0',
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `belongs_to_company` int(11) NOT NULL,
  `user_type` int(11) NOT NULL,
  `token` varchar(20) NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '1',
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0',
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `sub_user`, `username`, `email`, `password`, `belongs_to_company`, `user_type`, `token`, `is_active`, `is_deleted`, `modified`, `created_on`) VALUES
(2, 0, 'pramit', 'pramitsawant11@gmail.com', 'dc76e9f0c0006e8f919e0c515c66dbba3982f785', 0, 1, '', 1, 0, '2019-02-13 16:58:11', '2019-02-13 16:55:56'),
(3, 0, 'pramitsawant', 'pramitsawant@gmail.com', 'dc76e9f0c0006e8f919e0c515c66dbba3982f785', 0, 1, 'BdczqsQt5S', 1, 0, '2019-02-13 16:58:11', '2019-02-13 16:55:56'),
(6, 0, 'Britsol Goa', 'dev@britsol.in', 'dc76e9f0c0006e8f919e0c515c66dbba3982f785', 1, 3, 'fsiXjS3KnA', 0, 0, '2019-02-15 08:55:49', '2019-02-15 08:55:49'),
(9, 0, 'Ajay Solutions 2', 'info@britsol.in', 'dc76e9f0c0006e8f919e0c515c66dbba3982f785', 1, 3, 'N20VKfPDYw', 0, 0, '2019-03-24 09:05:28', '2019-03-24 09:05:28'),
(10, 0, 'Test Company', 'prajwal@goaelectronics.co.in', '0ddec2d7e784f56fe0bd4fe295b4b53464af379c', 1, 3, 'wvpuSMsl88', 0, 0, '2019-04-19 15:40:17', '2019-04-19 15:40:17');

-- --------------------------------------------------------

--
-- Table structure for table `users_roles`
--

CREATE TABLE `users_roles` (
  `user_role_id` int(11) NOT NULL,
  `user_role` varchar(50) NOT NULL,
  `enabled` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_roles`
--

INSERT INTO `users_roles` (`user_role_id`, `user_role`, `enabled`) VALUES
(1, 'super admin', 1),
(2, 'admin', 1),
(3, 'recruiter/company admin', 1),
(4, 'recruiter/company user', 1),
(5, 'candidate', 1);

-- --------------------------------------------------------

--
-- Table structure for table `verification_urls`
--

CREATE TABLE `verification_urls` (
  `url_id` int(11) NOT NULL,
  `url` varchar(500) NOT NULL,
  `url_for` varchar(100) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `verification_urls`
--

INSERT INTO `verification_urls` (`url_id`, `url`, `url_for`, `status`) VALUES
(1, 'http://localhost/recruitergoa/verify-user?token=&id=', 'verify company', 1),
(2, 'http://localhost/recruitergoa/verify-user?token=fsiXjS3KnA&id=6', 'verify company', 1),
(3, 'http://localhost/recruitergoa/verify-user?token=lSns8rDX2y&id=8', 'verify company', 1),
(4, 'http://localhost/recruitergoa/verify-user?token=OyYLHh9zxr&id=9', 'verify company', 1),
(5, 'http://localhost/recruitergoa/verify-user?token=OyYLHh9zxr&id=9', 'verify company', 1),
(6, 'http://localhost/recruitergoa/verify-user?token=OyYLHh9zxr&id=9', 'verify company', 1),
(7, 'http://localhost/recruitergoa/verify-user?token=OyYLHh9zxr&id=9', 'verify company', 1),
(8, 'http://localhost/recruitergoa/verify-user?token=OyYLHh9zxr&id=9', 'verify company', 1),
(9, 'http://localhost/recruitergoa/verify-user?token=cp6YMzEeDz&id=7', 'verify company', 1),
(10, 'http://localhost/recruitergoa/verify-user?token=38GeeazLZQ&id=8', 'verify company', 1),
(11, 'http://localhost/recruitergoa/verify-user?token=N20VKfPDYw&id=9', 'verify company', 1),
(12, 'http://localhost/recruitergoa/verify-user?token=wvpuSMsl88&id=10', 'verify company', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`blog_id`);

--
-- Indexes for table `blog_category`
--
ALTER TABLE `blog_category`
  ADD PRIMARY KEY (`blog_category_id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`company_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `company_type`
--
ALTER TABLE `company_type`
  ADD PRIMARY KEY (`company_type_id`);

--
-- Indexes for table `job_applied`
--
ALTER TABLE `job_applied`
  ADD PRIMARY KEY (`apply_id`);

--
-- Indexes for table `job_category`
--
ALTER TABLE `job_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_experience`
--
ALTER TABLE `job_experience`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_keywords`
--
ALTER TABLE `job_keywords`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_post`
--
ALTER TABLE `job_post`
  ADD PRIMARY KEY (`job_id`),
  ADD KEY `job_category` (`job_category`),
  ADD KEY `expiry_date` (`expiry_date`);

--
-- Indexes for table `job_post_salary_range`
--
ALTER TABLE `job_post_salary_range`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_post_status`
--
ALTER TABLE `job_post_status`
  ADD PRIMARY KEY (`job_post_status_id`);

--
-- Indexes for table `job_post_type`
--
ALTER TABLE `job_post_type`
  ADD PRIMARY KEY (`job_post_type_id`);

--
-- Indexes for table `job_qualification`
--
ALTER TABLE `job_qualification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_searched`
--
ALTER TABLE `job_searched`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location_taluka`
--
ALTER TABLE `location_taluka`
  ADD PRIMARY KEY (`taluka_id`);

--
-- Indexes for table `subscription`
--
ALTER TABLE `subscription`
  ADD PRIMARY KEY (`subscription_id`);

--
-- Indexes for table `suspended_profiles`
--
ALTER TABLE `suspended_profiles`
  ADD PRIMARY KEY (`profile_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `users_roles`
--
ALTER TABLE `users_roles`
  ADD PRIMARY KEY (`user_role_id`);

--
-- Indexes for table `verification_urls`
--
ALTER TABLE `verification_urls`
  ADD PRIMARY KEY (`url_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `blog_category`
--
ALTER TABLE `blog_category`
  MODIFY `blog_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `company_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `company_type`
--
ALTER TABLE `company_type`
  MODIFY `company_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `job_applied`
--
ALTER TABLE `job_applied`
  MODIFY `apply_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `job_category`
--
ALTER TABLE `job_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `job_experience`
--
ALTER TABLE `job_experience`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `job_keywords`
--
ALTER TABLE `job_keywords`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `job_post`
--
ALTER TABLE `job_post`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `job_post_salary_range`
--
ALTER TABLE `job_post_salary_range`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `job_post_status`
--
ALTER TABLE `job_post_status`
  MODIFY `job_post_status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `job_post_type`
--
ALTER TABLE `job_post_type`
  MODIFY `job_post_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `job_qualification`
--
ALTER TABLE `job_qualification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `job_searched`
--
ALTER TABLE `job_searched`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `location_taluka`
--
ALTER TABLE `location_taluka`
  MODIFY `taluka_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `subscription`
--
ALTER TABLE `subscription`
  MODIFY `subscription_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `suspended_profiles`
--
ALTER TABLE `suspended_profiles`
  MODIFY `profile_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users_roles`
--
ALTER TABLE `users_roles`
  MODIFY `user_role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `verification_urls`
--
ALTER TABLE `verification_urls`
  MODIFY `url_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `company`
--
ALTER TABLE `company`
  ADD CONSTRAINT `company_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
