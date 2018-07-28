<?php


/**
* 
*/
class M_Users extends MY_Model
{
	
	const table 	= 'users';
	const key 		= 'user_id';
	const limit 	= 3;

	function __construct()
	{
		parent::__construct();
	}

	function signup($data)
	{
		$this->db->insert(static::getTable(), $data);

		return $this->db->insert_id();
	}

	function get_login($user_name)
	{
		$where = array('user_name' => $user_name, 'user_email' => $user_name);
		$query = $this->db->or_where($where)
							->get(static::getTable());

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