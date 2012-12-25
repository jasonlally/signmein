<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Home extends MY_Controller {
	
	function __construct() 
    {
        parent::__construct();
		}

	public function index() {

		/*
		 *set up title and keywords (if not the default in custom.php config file will be set)
		 */
		$this -> title = "Sign Me In";
		$this -> keywords = "registration, sign-in, participant tracking";
		$this -> hasNav = FALSE;
		$this -> template = "front";
		$this -> data = array('test' => 'test');

		$this -> _render('home/index');
	}

	/**
	 * register_account
	 * User registration page used by all new users wishing to create an account.
	 * Note: This page is only accessible to users who are not currently logged in, else they will be redirected.
	 */
	function register() {
		// Redirect user away from registration page if already logged in.
		if ($this -> flexi_auth -> is_logged_in()) {
			redirect('auth');
		}
		// If 'Registration' form has been submitted, attempt to register their details as a new account.
		else if ($this -> input -> post('register_user')) {
			$this -> load -> model('demo_auth_model');
			$this -> demo_auth_model -> register_account();
		}
		//ChromePHP::log('status');
		// Get any status message that may have been set.
		$this -> data['message'] = (!isset($this -> data['message'])) ? $this -> session -> flashdata('message') : $this -> data['message'];

		//$this->load->view('demo/public_examples/register_view', $this->data);
		//$this -> load -> view('auth/register_account', $this -> data);
		$this->template = "front";
		$this->title = "Sign Up | Sign Me In";
		$this->_render('home/register');
	}

}
