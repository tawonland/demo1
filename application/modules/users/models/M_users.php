<?php


/**
* 
*/
class M_Users extends MY_Model
{
	
	const TABLE_NAME = 'users';

	function __construct()
	{
		parent::__construct();
	}

	function signup($data)
	{
		$this->db->insert('users',$data);

		return $this->db->insert_id();
	}

	function get_user($username)
	{
		$query = $this->db->where(['user_name' => $username])
							->get('users');

		$num = $query->num_rows();

		if($num < 1)
		{
			return false;
		}

		$row = $query->row();

		return $row;
	}
}
?>