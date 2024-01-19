<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'Home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['faq'] = 'Home/faq';
$route['about'] = 'Home/about';
$route['terms-and-condition'] = 'Home/tnc';
$route['contact-us'] = 'Home/contact';
$route['thank-you'] = 'Home/thankyou';
$route['page-expired'] = 'Home/pageExpired';
$route['register'] = 'Home/register';
$route['error-404'] = 'Home/error404';

$route['blogs'] = 'Blogs/index';
$route['jobs'] = 'Jobs/index';
$route['dream-job'] = 'Jobs/viewJob';
$route['post-job'] = 'Jobs/postJob';
$route['edit-job-post'] = 'Jobs/editJobPost';
$route['job-approval'] = 'Home/verifyJobsAdmin';
$route['get-job-widget'] = 'Home/getJobwidgt';

$route['employer'] = 'Employer/index';

$route['employer-edit-profle'] = 'Employer/edit';
$route['employer-manage-candidate'] = 'Employer/manageCandidate';
$route['employer-manage-jobs'] = 'Employer/manageJobs';
$route['employer-account-settings'] = 'Employer/accountSettings';

$route['verify-user'] = 'Auth/verify';

$route['blog-post'] = 'Blogs/blogView';

$route['company-section'] = 'Blogs/viewCompany';