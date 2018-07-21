<?php

/**
* 
*/
class Dashboard extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$data['content_view'] = 'Dashboard/dashboard1_v';
		$this->template->admin_template($data);
	}

	function dash2()
	{
		$data['content_view'] = 'Dashboard/dashboard2_v';
		$this->template->admin_template($data);
	}
}