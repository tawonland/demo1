<?php

/**
* 
*/
class M_Authors extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	function get_active_authors()
	{
		$this->db->where('author_isactive',1);
		$query = $this->db->get('Authors');

		return $query->result();
	}

}