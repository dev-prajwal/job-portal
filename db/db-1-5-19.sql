-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2019 at 06:40 AM
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
  `enabled` tinyint(4) NOT NULL DEFAULT '1',
  `deleted` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_id`, `user_id`, `company_name`, `company_type`, `company_email`, `company_phone`, `company_location`, `company_about`, `company_website`, `company_linkedin`, `company_twitter`, `company_fb`, `logo_path`, `enabled`, `deleted`) VALUES
(1, 6, 'Bright Solutions', 'Software Development', 'hr@britsol.in', NULL, 'Margao', 'Test Description', 'britsol.in', '', '', '', NULL, 1, 0),
(3, 9, 'Ajay Solutions 2', 'Digital Marketing', 'hr@britsol.in', NULL, 'Margao', '<b>Company Profile</b><div><b><br /></b></div><div><b>test data</b></div>', 'www.somename.com', NULL, NULL, NULL, NULL, 1, 0),
(5, 10, 'Test Company', 'Digital Marketing', 'hr@britsol.in', NULL, 'Sanguem', '<b>Test Company&nbsp;</b><div><ol><li><b>My test company</b></li><li><b>dummy content</b></li></ol></div>', 'goaelectronics.co.in', NULL, NULL, NULL, NULL, 1, 0);

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
  `cv_enabled` tinyint(4) NOT NULL DEFAULT '1',
  `call_for_interview` tinyint(4) NOT NULL DEFAULT '0',
  `status` varchar(25) NOT NULL DEFAULT 'New Application',
  `applied_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_applied`
--

INSERT INTO `job_applied` (`apply_id`, `job_id`, `applied_by_name`, `applied_by_email`, `applied_by_contact`, `current_position`, `notes`, `applied_by_cv_link`, `cv_enabled`, `call_for_interview`, `status`, `applied_on`, `is_deleted`) VALUES
(1, 2, 'Prajwal Dessai', 'prajwaldessai@gmail.com', '08308583738', 'NA', NULL, 'upload/resume/2_prajwaldessai@gmail.com/', 1, 0, 'New Application', '2019-04-06 22:08:33', 0),
(2, 5, 'Prajwal Dessai', 'prajwaldessai@gmail.com', '08308583738', 'NA', NULL, 'Deleted', 0, 0, 'Deleted', '2019-04-19 21:28:53', 1),
(3, 9, 'Prajwal Dessai', 'prajwaldessai@gmail.com', '08308583738', 'NA', NULL, 'upload/resume/9_prajwaldessai@gmail.com/prajwaldessaiProfile.pdf', 1, 0, 'New Application', '2019-05-01 08:47:47', 0),
(4, 7, 'Prajwal Dessai', 'prajwaldessai@gmail.com', '08308583738', 'NA', NULL, 'upload/resume/7_prajwaldessai@gmail.com/prajwaldessaiProfile.pdf', 1, 0, 'New Application', '2019-05-01 00:00:00', 0);

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
(3, 'Web Development', 1),
(4, 'Software Engineer', 1),
(5, 'Digital Marketing', 1),
(6, 'Marketing', 1),
(7, 'SEO', 1),
(8, 'Operations', 1),
(9, 'Human Resource', 1),
(10, 'HR', 1),
(11, 'Manager', 1),
(12, 'Freelance', 1);

-- --------------------------------------------------------

--
-- Table structure for table `job_post`
--

CREATE TABLE `job_post` (
  `job_id` int(11) NOT NULL,
  `job_title` varchar(255) NOT NULL,
  `job_posted_by` varchar(150) NOT NULL,
  `company_id` int(11) NOT NULL,
  `job_location` varchar(150) NOT NULL,
  `job_type` varchar(100) NOT NULL,
  `job_category` varchar(150) NOT NULL,
  `job_description` text,
  `no_of_vacancy` int(11) DEFAULT NULL,
  `job_qualification` varchar(150) DEFAULT NULL,
  `job_experience` varchar(150) DEFAULT NULL,
  `salary_range` varchar(25) DEFAULT NULL,
  `company_location` varchar(250) DEFAULT NULL,
  `application_last_date` date DEFAULT NULL,
  `date_posted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `validity_in_days` int(11) NOT NULL DEFAULT '30',
  `keywords` varchar(500) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '3',
  `enabled` tinyint(4) NOT NULL DEFAULT '1',
  `deleted` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_post`
--

INSERT INTO `job_post` (`job_id`, `job_title`, `job_posted_by`, `company_id`, `job_location`, `job_type`, `job_category`, `job_description`, `no_of_vacancy`, `job_qualification`, `job_experience`, `salary_range`, `company_location`, `application_last_date`, `date_posted`, `validity_in_days`, `keywords`, `status`, `enabled`, `deleted`) VALUES
(1, 'C++ Developer', 'Bright Solutions', 1, 'Goa', 'Full Time', 'Web Developer', 'Loreum ipsum dummy text', 2, 'Graduate', NULL, NULL, 'Ponda', '2019-04-01', '2019-03-03 11:04:39', 30, 'Network Engineer', 3, 1, 0),
(2, 'Ajay Solutions2', 'Ajay Solutions 2', 3, 'Goa', 'Part Time', 'Office admin', '<b>Some Dummy Description</b><div><b><br></b></div><div>Test data</div><div>Test data</div>', 0, '', '', NULL, 'Pernem', '2019-03-31', '2019-03-24 09:05:28', 30, 'Network Engineer,Catering', 3, 1, 0),
(3, 'QA Engineer', 'Bright Solutions', 1, 'Goa', 'Part Time', 'Marketing', NULL, 4, NULL, NULL, NULL, 'Ponda', '2019-04-30', '2019-04-19 10:17:48', 30, 'Network Engineer', 3, 1, 0),
(4, 'Marketing Intern', 'Test Company', 5, 'Margoa', 'Intern', 'Marketing', '<p>Test Description</p><div><ul><li>Hello 123</li><li>Test lines</li></ul></div>', 2, '', '', NULL, 'Margao', '2019-04-30', '2019-04-19 15:40:18', 30, 'Network Engineer', 3, 1, 0),
(5, 'Test Engineer  ', 'Bright Solutions', 1, 'Goa', 'Full Time', 'Office admin', '<b>Test Description</b>', 0, 'Diploma', NULL, NULL, 'Ponda', '2019-04-30', '2019-04-19 15:53:31', 30, 'Network Engineer,Catering', 3, 1, 0),
(6, 'Web Operations Manager', 'Bright Solutions', 1, 'Goa', 'Full Time', 'Manager', NULL, 0, NULL, '2 - 3 years', NULL, 'other', NULL, '2019-04-20 20:43:17', 30, 'Web Development,Software Engineer,Operations,Manager', 3, 1, 0),
(7, 'Office Administrator', 'Bright Solutions', 1, 'Goa', 'Full Time', 'Office admin', NULL, 1, NULL, NULL, NULL, 'Vasco ', NULL, '2019-04-20 20:46:43', 30, 'Operations,Human Resource', 3, 1, 0),
(8, 'Network Admin', 'Bright Solutions', 1, 'Margoa', 'Part Time', 'Marketing', NULL, 2, NULL, '1 - 2 years', NULL, 'Canacona', NULL, '2019-04-20 20:50:39', 30, 'Network Engineer', 3, 1, 0),
(9, 'Business Development Executive', 'Bright Solutions', 1, 'Goa', 'Full Time', 'Marketing', NULL, 2, NULL, '2 - 3 years', NULL, 'Mapusa', NULL, '2019-04-20 20:53:56', 30, 'Marketing,SEO,Operations,Human Resource,HR,Manager', 3, 1, 0),
(10, 'Executive Chef', 'Bright Solutions', 1, 'Goa', 'Full Time', 'Manager', NULL, 2, NULL, '1 - 2 years', NULL, 'Bicholim', NULL, '2019-04-20 20:56:03', 30, 'Catering', 5, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `job_post_hits`
--

CREATE TABLE `job_post_hits` (
  `job_id` int(11) NOT NULL,
  `hit_on_date` datetime NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `location_lattiude` varchar(255) NOT NULL,
  `location_longitude` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `job_post_salary_range`
--

CREATE TABLE `job_post_salary_range` (
  `id` tinyint(4) NOT NULL,
  `salary_range` varchar(25) NOT NULL,
  `enabled` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_post_salary_range`
--

INSERT INTO `job_post_salary_range` (`id`, `salary_range`, `enabled`) VALUES
(1, '< 5000', 1),
(2, '5000 - 10000', 1),
(3, '10000 - 15000', 1),
(4, '15000 - 20000', 1);

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
  `state_name` varchar(100) NOT NULL DEFAULT 'Goa'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location_taluka`
--

INSERT INTO `location_taluka` (`taluka_id`, `taluka_name`, `state_name`) VALUES
(1, 'Panjim', 'Goa'),
(2, 'Margao', 'Goa'),
(3, 'Mapusa', 'Goa'),
(4, 'Vasco ', 'Goa'),
(5, 'Ponda', 'Goa'),
(6, 'Bicholim', 'Goa'),
(7, 'Sanguem', 'Goa'),
(8, 'Canacona', 'Goa'),
(9, 'Quepem', 'Goa'),
(10, 'Savordem', 'Goa'),
(11, 'Pernem', 'Goa'),
(12, 'Valpoi', 'Goa'),
(13, 'Marcel', 'Goa'),
(14, 'Sanquelim', 'Goa');

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
  `status` int(11) NOT NULL
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
  ADD KEY `job_category` (`job_category`);

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
  MODIFY `apply_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `job_post`
--
ALTER TABLE `job_post`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
