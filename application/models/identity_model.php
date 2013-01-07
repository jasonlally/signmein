<?php
if ( ! defined('BASEPATH'))
	exit('No direct script access allowed');
/**
 * SMI - Identity Model
 *
 * SMI makes it easier to manage public sign ins - built on Code
 * Igniter
 *
 * @package     Sign Me In
 * @author      Jason Lally
 * @copyright   Copyright (c) 2008 - 2012, Jason Lally.
 * (http://jasonlally.com/)
 * @license     Licensed under the MIT License
 * @link        http://smi.local
 */

class Identity_model extends MY_Model
{
	/**
	 * Class Constructor
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('date');
	}

	// --------------------------------------------------------------

	public function & __get($key)
	{
		$CI = &get_instance();
		return $CI->$key;
	}

	// --------------------------------------------------------------

	/**
	 * Get identity from identity database, return false if identity does
	 * not exist
	 *
	 * @param   str  pass in the identity (email or name) code must be
	 * updated to parse for both
	 * @param		bool is there an email address
	 * @return  int
	 */
	public function get_identity($identity, $email = NULL)
	{
		$this->db->select('*');
		$this->db->from('identity');
		$this->db->join('identity_email', 'identity_email.idem_idty_fk = identity.idty_id');
		$this->db->where('idem_email', $identity);

		$query = $this->db->get();

		if ($query->num_rows() > 0)
		{
			return $query->row();
		} else
		{
			return FALSE;
		}
	}

	// --------------------------------------------------------------

	/**
	 * Insert new identity if it doesn't already exist
	 *
	 * @access 	public
	 * @param   str		first name for identity
	 * @param		str	 	last name for identity
	 * @param		str		email for identity
	 * @return  int   new identity id
	 */
	public function insert_identity($fname, $lname, $email)
	{
		$this->db->trans_start();
		$insert_data = array(
			'idty_fname' => $fname,
			'idty_lname' => $lname
		);
		$this->db->insert('identity', $insert_data);
		$idty_id = $this->db->insert_id();

		$insert_data = array(
			'idem_email' => $email,
			'idem_idty_fk' => $idty_id
		);
		$this->db->insert('identity_email', $insert_data);
		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE)
		{
			return FALSE;
		}

		return $idty_id;
	}

	// --------------------------------------------------------------

	/**
	 * Process identity from form submission after checking for valid input
	 *
	 */
	public function process_identity()
	{
		$this->load->library('form_validation');
		$this->load->helper('formatter');
		$this->load->model('signin_model');
		//$this->load->helper(array('form', 'url'));

		// Set validation rules.
		$this->form_validation->set_rules('signin_email', 'Email Address', 'trim|required|valid_email');
		$this->form_validation->set_rules('signin_fname', 'First Name', 'trim|required');
		$this->form_validation->set_rules('signin_lname', 'Last Name', 'trim|required');
		$this->form_validation->set_rules('signin_phone', 'Phone Number', 'trim|strip_non_alnum|min_length[10]|max_length[10]');
		$this->form_validation->set_rules('signin_zip', 'Zip Code', 'trim|numeric|min_length[5]|max_length[5]');

		if ($this->form_validation->run())
		{
			$idty_id = $this->get_identity($this->input->post('signin_email'));
			//ChromePhp::log($idty_id);
			//check for existing identity
			if ($idty_id === FALSE)
			{
				$idty_id = $this->insert_identity($this->input->post('signin_fname'), $this->input->post('signin_lname'), $this->input->post('signin_email'));
			} else {
				$idty_id = $idty_id->idty_id;
			}

			$insert_data = array(
				'signin_datetime' => now(),
				'signin_idty_fk' => $idty_id,
				'signin_email' => $this->input->post('signin_email'),
				'signin_uacc_fk' => $this->input->post('signin_form_owner'),
				'signin_name' => $this->input->post('signin_fname') . " " . $this->input->post('signin_lname'),
				'signin_phone' => $this->input->post('signin_phone'),
				'signin_zip' => $this->input->post('signin_zip')
			);

			$this->signin_model->insert_signin($insert_data);
			$this->form_validation->unset_field_data();
			
			$this->data['message'] = "<div class='alert alert-success'>You successfully signed in</div>";

		} else
		{
			ChromePhp::log('failure');
			// Set validation errors.
			$this->data['message'] = validation_errors('<div class="alert alert-error">', '</div>');
			ChromePhp::log($this->data['message']);
			return FALSE;
		}
	}

	// --------------------------------------------------------------

}

/* End of file identity_model.php */
/* Location: /application/models/identity_model.php */
