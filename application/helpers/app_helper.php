<?php 

function level($level)
{
	return isset($_SESSION[$level]) || !empty($_SESSION[$level]) ? true : false;
}

function category()
{
	$CI =& get_instance();
	return $CI->db->get('category')->result_array();
}

 ?>