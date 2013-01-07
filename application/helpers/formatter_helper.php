<?php
if ( ! defined('BASEPATH'))
	exit('No direct script access allowed');

/**
 * @desc Simple function to check if current page is equal to nav list
 * element.
 *       This case return "active" as class name for the list element.
 * @param String $pageID
 * @param String $linkID
 * @return String/Null
 */
function strip_non_alnum($str)
{
	$clean = preg_replace('/(\W*)/', '', $str);
	return $clean;
}

/* End of file formatter_helper.php */
/* Location: ./application/helpers/formatter_helper.php */
