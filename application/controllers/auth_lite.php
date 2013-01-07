<?php
if ( ! defined('BASEPATH'))
	exit('No direct script access allowed');

class Auth_lite extends MY_Controller
{

	function __construct()
	{
		parent::__construct();

		// Load 'lite' flexi auth library by default.
		// If preferable, functions from this library can be referenced using
		// 'flexi_auth' as done below.
		// This prevents needing to reference 'flexi_auth_lite' in some files,
		// and 'flexi_auth' in others, everything can be referenced by
		// 'flexi_auth'.
		$this->load->library('flexi_auth_lite', FALSE, 'flexi_auth');
	}

	function index()
	{
		$this->load->view('index_view');
	}

	function features()
	{
		$this->load->view('features_view');
	}

	function demo()
	{
		$this->load->view('demo_view');
	}

	function user_guide()
	{
		$this->load->view('user_guide_view');
	}

	function support()
	{
		$this->load->view('support_view');
	}

	function privilege_examples()
	{
		$this->load->view('demo/privilege_examples_view');
	}

	function lite_library()
	{
		$user = $this->flexi_auth->get_user_by_id_row_array();

		$this->data['user_full_name'] = ( ! empty($user)) ? $user['upro_first_name'] . ' ' . $user['upro_last_name'] : null;
		$this->data['user_phone'] = ( ! empty($user)) ? $user['upro_phone'] : null;
		$this->data['user_last_login'] = ( ! empty($user)) ? date('jS M Y @ H:i:s', strtotime($user['uacc_date_last_login'])) : null;
		$this->data['user_group_desc'] = ( ! empty($user)) ? $user['ugrp_desc'] : null;

		$this->load->view('demo/lite_view', $this->data);
	}

}

/* End of file auth_lite.php */
/* Location: ./application/controllers/auth_lite.php */
