<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends Auth_Controller {

	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('ip_address');

		$this->session->sess_destroy();
		redirect();
	}

	function tes()
	{
		echo '1';
	}

}
