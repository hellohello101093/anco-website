<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "default/index";
$route['admin'] = "admin/index";
$route['admin/(:any)'] = "admin/$1";
$route['default/(:any)'] = "default/$1";
$route['categories'] = "default/category/index";
$route['categories/(:any)'] = "default/category/child/$1";
$route['products/(:any)'] = "default/product/index/$1";
$route['about'] = "default/page/index";
$route['news'] = "default/project/index";
$route['news/(:any)'] = "default/project/detail/$1";
$route['events'] = "default/events/index";
$route['events/(:any)'] = "default/events/detail/$1";
$route['video'] = "default/video/index";
$route['video/(:any)'] = "default/video/detail/$1";
$route['sign-in'] = "default/login/index";
$route['sign-in/validate'] = "default/login/validate";
$route['sign-up'] = "default/login/signup";
$route['sign-out'] = "default/login/signout";
$route['create-account'] = "default/login/index";
$route['sign-in-with-facebook'] = "default/login/facebook";
$route['checkout'] = "default/checkout/step1";
$route['checkout/step2'] = "default/checkout/step2";
$route['checkout/step3'] = "default/checkout/step3";
$route['checkout/step4'] = "default/checkout/step4";
$route['contact'] = "default/contact/index";
$route['wish-list'] = "default/wishlist/index";

/* End of file routes.php */
/* Location: ./application/config/routes.php */
