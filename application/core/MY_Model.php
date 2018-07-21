<?php
class MY_Model extends CI_Model
{

	CONST TABLE_NAME = '';

	function __construct()
	{
		parent::__construct();
	}

	function getList(){
		$c = get_called_class();
		$query = $this->db->get($c::TABLE_NAME);

		return $query->result_array();
	}
}