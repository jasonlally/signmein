<?php
if ( ! defined('BASEPATH'))
	exit('No direct script access allowed');

class MY_Model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	public function __call($method, $arguments)
	{
		$extension_types = array(
			'_num_rows',
			'_row_array',
			'_array',
			'_result',
			'_row'
		);
		$method_substr = str_replace(array_values($extension_types), FALSE, $method);
		$method_substr_query = $method_substr . '_query';
		$method_substr_extension = str_replace($method_substr, FALSE, $method);
		/*
		// Get flexi auth class name.
		$models = array(
			'signin_model'
		);
		foreach ($models as $model)
		{
			if (isset($this->CI->$library))
			{
				if (method_exists($this->CI->$library, $method_substr_query))
				{
					$target_library = $library;
					break;
				}
			}
		}*/

		if (method_exists($this, $method_substr_query))
		{
			// Pass the first 3 submitted arguments to the function (Usually the
			// SQL SELECT and WHERE statements).
			$argument_1 = (isset($arguments[0])) ? $arguments[0] : FALSE;
			// Usually $sql_select
			$argument_2 = (isset($arguments[1])) ? $arguments[1] : FALSE;
			// Usually $sql_where
			$argument_3 = (isset($arguments[2])) ? $arguments[2] : FALSE;
			// Other
			$data = $this->$method_substr_query($argument_1, $argument_2, $argument_3);

			if ( ! empty($data))
			{
				if ($method_substr_extension == '_result')
				{
					return $data->result();
				} else if ($method_substr_extension == '_row')
				{
					return $data->row();
				} else if ($method_substr_extension == '_array')
				{
					return $data->result_array();
				} else if ($method_substr_extension == '_row_array')
				{
					return $data->row_array();
				} else if ($method_substr_extension == '_num_rows')
				{
					return $data->num_rows();
				} else// '_query'
				{
					return $data;
				}
			}
		}

		echo 'Call to an unknown method : "' . $method . '"';
		return FALSE;
	}

	public function get_signins_query()
	{
		
		$this
	}

}
