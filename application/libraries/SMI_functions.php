<?php
if ( ! defined('BASEPATH'))
	exit('No direct script access allowed');
/**
 * Function library to use across SMI, simplify calls
 *
 */

load_class('Flexi_auth_lite', 'libraries', FALSE);

class SMI_functions extends Flexi_auth_lite
{
	public function __construct()
	{
		parent::__construct();
		//$this->CI->load->model('signin_model');
	}

}

/* End of file SMI_functions.php */
/* Location: ./application/libraries/SMI_functions.php */
