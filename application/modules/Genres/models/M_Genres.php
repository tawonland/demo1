<?php

/**
* 
*/
class M_Genres extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	function get_active_genres()
	{
		$this->db->where('book_genreactive',1);
		$query = $this->db->get('book_genre');

		return $query->result();
	}

}