<?php

/**
* 
*/
class M_Publishers extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	function get_active_publishers()
	{
		$this->db->where('publisher_active',1);
		$query = $this->db->get('publishers');

		return $query->result();
	}

}