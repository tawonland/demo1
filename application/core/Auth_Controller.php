<?php
class Auth_Controller extends MY_Controller
{
	public $c_edit = true;
	public $a_kolom = array();

	function __construct()
	{
		parent::__construct();

		$this->is_loged_in();

		$this->load->library('buttons');

		$this->data['admin_sidebar_menu'] = 'admin_sidebar_menu';

		$this->data['page_header'] = ucfirst($this->ctl);
		$this->data['description'] = 'Halaman ' . $this->ctl;

		$this->data['c_edit'] = $this->c_edit;

		$this->data['buttons'] = array();

		//set table
		$this->load->library('table');

		$tmpl = array ( 'table_open'  => '<table border="1" cellpadding="2" cellspacing="1" class="table table-bordered table-striped">' );

		$this->table->set_template($tmpl);
	}


	function is_loged_in(){
		$loged_in = $this->session->userdata('loged_in');

		$user_id = $this->session->userdata('user_id');

		if(!$loged_in && empty($user_id))
		{
			redirect();
		}
	}

	function listdata()
	{

		$this->data['content_view'] = 'inc_table_generate';

		$this->data['description'] = 'Data ' . $this->ctl;

		$this->data['buttons']['add'] 	= $this->buttons->add($this->ctl);

		$a_data = $this->a_data();
		$no = 0;
		foreach ($a_data as $key => $row) {
			$no++;

			foreach ($this->a_kolom as $k => $v) {

				$field = $v['field'];

				if($field == 'no:'){
					$col[$key][] = $no;
				}
				else{
					$col[$key][] = $row[$field];
				}

			}

			if($this->c_edit){
				$col[$key][] = 'Edit';
			}

			$this->table->add_row($col[$key]);
		}

		$th = array();
		foreach ($this->a_kolom as $k => $v) {
			$th[] = $v['label'];
		}

		if($this->c_edit){
			$th[] = 'Aksi';
		}

		$this->table->set_heading($th);

		$this->data['table_generate'] = $this->table->generate();

		$this->template->admin_template($this->data);
	}

	function a_data()
	{
		return $this->{$this->model}->getList();
	}

	function add()
	{
		$this->data['content_view'] = 'inc_data_v';
		$this->data['buttons']['back'] 	= $this->buttons->back($this->ctl);
		$this->data['buttons']['add'] 	= $this->buttons->add($this->ctl);
		$this->data['buttons']['save'] 	= $this->buttons->save($this->ctl);

		$this->data['description'] = 'Form ';

		$this->template->admin_template($this->data);
	}

	function save()
	{
		echo '<pre>';
		print_r($_REQUEST);
	}

}
