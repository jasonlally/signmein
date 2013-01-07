<?php
if ( ! defined('BASEPATH'))
	exit('No direct script access allowed');

class Form extends MY_Controller
{

	function __construct()
	{
		parent::__construct();
	}

	/**
	 * index
	 *
	 */
	public function index()
	{
		//We show a 404 error to make this innaccessible without providing a
		// UID to associate with the form
		show_404();
	}

	public function open()
	{
		$this->data = array();
		if ($this->input->post('signin_identity'))
		{
			$this->load->model('identity_model');
			$this->identity_model->process_identity();
		}

		$form_owner_id = $this->uri->rsegment(3);
		$user = $this->flexi_auth->get_user_by_id($form_owner_id)->result();
		if ( ! $user)
		{
			show_404(); //user ID is used to process the form, if non-existent, show not found
		}
		/*
		 *set up title and keywords (if not the default in custom.php config
		 * file will be set)
		 */

		$this->title = "Sign Me In";
		$this->keywords = "registration, sign-in, participant tracking";
		$this->hasNav = FALSE;
		$this->hasFooter = FALSE;
		$this->data['container'] = 'fixed';
		$this->data['form_owner_id'] = $form_owner_id;
		$this->data['user'] = $user;
		$this->data['message'] = ( ! isset($this->data['message'])) ? $this->session->flashdata('message') : $this->data['message'];
		$this->_render('form/index');
	}

}

/* End of file form.php */
/* Location: ./application/controllers/form.php */
