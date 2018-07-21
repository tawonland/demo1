<?php

/**
* 
*/
class M_Books extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	function post_book()
	{
		$this->db->insert('Books',$this->input->post());

		return $this->db->insert_id();
	}

	function add_book_author($book_author)
	{
		$this->db->insert_batch('book_author',$book_author);
	}

	function add_book_images($book_images)
	{
		$this->db->insert_batch('book_images',$book_images);
	}

	function get_all()
	{
		$query = $this->db->get('books');
		return $query->result();
	}
}
?>