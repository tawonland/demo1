<?php
class Auth_Controller extends MY_Controller
{
	public $c_edit = true;
	public $c_delete = true;
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

		$tmpl = array ( 'table_open'  => '<table border="1" cellpadding="2" cellspacing="1" class="table table-bordered table-striped table-hover">' );

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

		$this->data['content_view'] = 'inc_list_v';
		$this->data['description'] = 'Data ' . $this->ctl;
		$this->data['buttons']['add'] 	= $this->buttons->add($this->ctl);

		$a_data = $this->a_data();
		$no = 0;
		foreach ($a_data as $key => $row) {
			
			$p_key = $this->{$this->model}->getKey();
			$id    = $row[$p_key];

			$no++;

			$td_attributes = array();

			foreach ($this->a_kolom as $k => $v) {

				$field = $v['field'];
				if(isset($v['td_attributes'])){
					$td_attributes = $v['td_attributes'];
				}
				
				if($field == 'no:'){
					$col[$key][] = $no;
				}
				else{
					$col[$key][] = array('data' => $row[$field]) + $td_attributes;
				}

			}

			$aksi = '';

			if($this->c_edit){
				$aksi .= '<button type="button" class="btn btn-warning btn-xs btn-flat" data-id="'.$id.'" data-type="edit" data-toggle="tooltip" title="Edit">
							<i class="fa fa-edit"></i></button> ';
			}

			if($this->c_delete){
				$aksi .= '<button type="button" class="btn btn-danger btn-xs btn-flat" data-id="'.$id.'" data-type="delete" data-toggle="tooltip" title="Hapus">
							<i class="fa fa-trash"></i></button>';
			}

			if(!empty($aksi)){
				$col[$key][] = array('data' => $aksi, 'align' => 'center');
			}
			
			$this->table->add_row($col[$key]);
		}

		$th = array();
		foreach ($this->a_kolom as $k => $v) {
			$th[] = $v['label'];
		}

		if($this->c_edit){
			$th[] = array('data' => 'Aksi', 'align' => 'center');
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
		$this->data['form_action'] 	= $this->ctl.'/insert';
		$this->data['form_data'] 	= $this->ctl.'/'.$this->ctl.'_v';
		$this->data['description'] 	= 'Form ';

		$row = $this->session->flashdata('row');


		if($row){
			$this->data['row'] = $row;
		}
		
		$this->template->admin_template($this->data);
	}

	function edit($id)
	{
		
		$id 	= $this->uri->segment(3);

		$this->data['content_view'] = 'inc_data_v';
		$this->data['form_action'] 	= $this->ctl.'/update/'.$id;
		$this->data['form_data'] 	= $this->ctl.'/'.$this->ctl.'_v';
		$this->data['description'] 	= 'Form ';

		$row 	= $this->{$this->model}->getRowById($id);

		$this->data['row'] = $row;

		$this->template->admin_template($this->data);
	}

	function insert()
	{
		echo '<pre>';
		print_r($_REQUEST);
	}


	function update($id)
	{
		echo '<pre>';
		print_r($_REQUEST);
	}

}
