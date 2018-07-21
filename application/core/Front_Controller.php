<?php
class Front_Controller extends MY_Controller
{

	function __construct()
	{
		parent::__construct();

		$this->data['sidebar_menu'] = 'front/front_sidebar_menu';

		$this->data['page_header'] = ucfirst($this->ctl);
		$this->data['description'] = 'Halaman ' . $this->ctl;
	}
}