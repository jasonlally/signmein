<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
/**
 * SMI - Model
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

class Signin_model extends MY_Model
{
	/**
	 * Class Constructor
	 */
	public function __construct()
	{
		parent::__construct();
	}

	// --------------------------------------------------------------

	/**
	 *
	 */
	public function get_signin($var)
	{

	}

	// --------------------------------------------------------------

	/**
	 *	Insert new signin to the database
	 *
	 * @param		array  data to be inserted into signin (name, email, phone,
	 * zip)
	 *
	 */
	public function insert_signin($insert_data = array())
	{
		$this->db->trans_start();
		$this->db->insert('signin', $insert_data);
		$signin_id = $this->db->insert_id();
		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE)
		{
			return FALSE;
		}

		return $signin_id;
	}

	// --------------------------------------------------------------

	/**
	 *
	 */
	public function update($var)
	{

	}

	// --------------------------------------------------------------

	/**
	 *
	 *
	 */
	public function delete($var)
	{

	}

}

/* End of file template_model.php */
/* Location: /application/models/template_model.php */
