<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Home extends MY_Controller {

	function __construct() {
		parent::__construct();
		$this -> template = "front";
	}

	public function index() {

		/*
		 *set up title and keywords (if not the default in custom.php config file will be set)
		 */
		$this -> title = "Sign Me In";
		$this -> keywords = "registration, sign-in, participant tracking";

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
		$this -> title = "Sign Up | Sign Me In";
		$this -> _render('home/register');
	}

	/**
	 * login
	 * Login page used by all user types to log into their account.
	 * This demo includes 3 example accounts that can be logged into via using either their email address or username. The login details are provided within the view page.
	 * Users without an account can register for a new account.
	 * Note: This page is only accessible to users who are not currently logged in, else they will be redirected.
	 */
	function login() {

		// Redirect users logged in via password (However, not 'Remember me' users, as they may wish to login properly).
		if ($this -> flexi_auth -> is_logged_in_via_password() && uri_string() != 'auth/logout') {
			// Preserve any flashdata messages so they are passed to the redirect page.
			if ($this -> session -> flashdata('message')) { $this -> session -> keep_flashdata('message');
			}

			// Redirect logged in admins (For security, admin users should always sign in via Password rather than 'Remember me'.
			if ($this -> flexi_auth -> is_admin()) {
				redirect('auth_admin/dashboard');
			} else {
				redirect('dashboard');
			}
		}
		// If 'Login' form has been submited, attempt to log the user in.
		if ($this -> input -> post('login_user')) {
			$this -> load -> model('demo_auth_model');
			$this -> demo_auth_model -> login();
		}

		// CAPTCHA Example
		// Check whether there are any existing failed login attempts from the users ip address and whether those attempts have exceeded the defined threshold limit.
		// If the user has exceeded the limit, generate a 'CAPTCHA' that the user must additionally complete when next attempting to login.
		if ($this -> flexi_auth -> ip_login_attempts_exceeded()) {
			/**
			 * reCAPTCHA
			 * http://www.google.com/recaptcha
			 * To activate reCAPTCHA, ensure the 'recaptcha()' function below is uncommented and then comment out the 'math_captcha()' function further below.
			 *
			 * A boolean variable can be passed to 'recaptcha()' to set whether to use SSL or not.
			 * When displaying the captcha in a view, reCAPTCHA generates all html required for display.
			 *
			 * Note: To use this example, you will also need to enable the recaptcha examples in 'models/demo_auth_model.php', and 'views/demo/login_view.php'.
			 */
			$this -> data['captcha'] = $this -> flexi_auth -> recaptcha(FALSE);

			/**
			 * flexi auths math CAPTCHA
			 * Math CAPTCHA is a basic CAPTCHA style feature that asks users a basic maths based question to validate they are indeed not a bot.
			 * For flexibility on CAPTCHA presentation, the 'math_captcha()' function only generates a string of the equation, see the example below.
			 *
			 * To activate math_captcha, ensure the 'math_captcha()' function below is uncommented and then comment out the 'recaptcha()' function above.
			 *
			 * Note: To use this example, you will also need to enable the math_captcha examples in 'models/demo_auth_model.php', and 'views/demo/login_view.php'.
			 */
			# $this->data['captcha'] = $this->flexi_auth->math_captcha(FALSE);
		}

		// Get any status message that may have been set.
		$this -> data['message'] = (!isset($this -> data['message'])) ? $this -> session -> flashdata('message') : $this -> data['message'];

		$this -> template = "front";
		$this -> title = "Sign In | Sign Me In";
		$this -> _render('home/login');
		/*$this->load->view('demo/login_view', $this->data);*/
	}


/**
	 * about
	 * A static page about the application
	 */
	function about() {
		/*
		 *set up title and keywords (if not the default in custom.php config file will be set)
		 */
		$this -> title = "About | Sign Me In";
		$this -> keywords = "registration, sign-in, participant tracking";
		$this -> data = array('test' => 'test');

		$this -> _render('home/about');
	}
	
	/**
	 * contact
	 * A static page on how to contact me
	 */
	function contact() {
		/*
		 *set up title and keywords (if not the default in custom.php config file will be set)
		 */
		$this -> title = "Contact | Sign Me In";
		$this -> keywords = "registration, sign-in, participant tracking";

		$this -> _render('home/contact');
	}
	
}
