<?php

/**
 *
 */
class Register extends Front_Controller
{

  function __construct()
  {
    parent::__construct();
  }

  function index()
	{
		$this->load->view("register/register_v", $this->data);
	}

}

?>
