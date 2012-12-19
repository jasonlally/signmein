<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {
	
	public function index(){	
		
		/*
		 *set up title and keywords (if not the default in custom.php config file will be set) 
		 */
		$this->title = "Sign Me In";
		$this->keywords = "registration, sign-in, participant tracking";
		$this->hasNav = FALSE;
		$this->template = "front";
		$this->data = array(
		'test' => 'test');
		
		$this->_render('home/index');
	}
	
}