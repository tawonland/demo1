<?php

/**
* 
*/
class Admin extends Auth_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$this->data['content_view'] = 'admin/dashboard1_v';
		
		$this->template->admin_template($this->data);
	}

	function dash2()
	{
		$data['content_view'] = 'Dashboard/dashboard2_v';
		$this->template->admin_template($data);
	}

}