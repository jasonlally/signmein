<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Menu configuration - projects
|--------------------------------------------------------------------------
|
| Set menu array below to load in to 
|
*/

$nav = array();
$nav['dashboard'] = 'Dashboard';
$nav['reports'] = 'Reports';
$config['menu']['dashboard_top'] = $nav;

$nav = array();
$nav['report_header'] = array('label' => 'Report', 'attributes' => 'class="nav-header"', 'header' => TRUE);
$nav['reports'] = 'Home';
$nav['projects/create'] = array('label' => 'Create New Project');

$config['menu']['report'] = $nav;

$nav = array();
$nav['account_header'] = array('label' => 'Account', 'attributes' => 'class="nav-header"', 'header' => TRUE);
$nav['user'] = 'Home';
$nav['user/update'] = 'Edit Profile';
$nav['register/settings'] = 'Registration Settings';
$nav['register/pending_registrations'] = 'Pending Registrations';
$nav['administration/create_user'] = 'Add User';
$nav['administration/manage_users'] = 'Manage Users';
$nav['user/logout'] = 'Logout';
$config['menu']['user'] = $nav;

$nav = array();
$nav['projects'] = 'Projects';
$nav['user'] = 'Account';
$nav['user/logout'] = 'Logout';
$config['menu']['backend_top'] = $nav;

$nav = array();
$nav['#'] = 'Home';
$nav['about'] = 'About';
$nav['contact'] = 'Contact';
$config['menu']['main_top'] = $nav;

$nav = array();
$nav['#'] = 'Create New List';
$nav['cols/1'] = 'I';
$nav['cols/2'] = 'II';
$nav['cols/3'] = 'III';
$config['menu']['brainstorm_top'] = $nav;