<?php

/**
* 
*/
class Template extends MY_Controller
{
	
	function __construct()
	{
		# code...
	}

	function index()
	{
		echo 1;
	}

	function front_template($data = null)
	{
		$this->load->view("template/front_template_v", $data);
	}

	function admin_template($data = null)
	{
		
		$this->load->view("template/admin_template_v", $data);
	}

	function sample_template($data = null)
	{
		$this->load->view("template/sample_template_v", $data);
	}
}