<?php
class Auth_Controller extends MY_Controller
{
	public $c_edit = true;
	public $c_update = false;
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
		$this->data['c_update'] = $this->c_edit;
		$this->data['c_delete'] = $this->c_delete;

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

		$page = 'index/';
		$total_rows = $this->{$this->model}->getCount();

		$a_data = array();
		
		if($this->method == 'search')
		{
			// get search string
        	$search = ($this->input->post("search"))? $this->input->post("search") : "NIL";
        	$search = ($this->uri->segment(3)) ? $this->uri->segment(3) : $search;

			$page = 'search/';
			$total_rows = $this->{$this->model}->getCountSearch($search);
			
		}
		else
		{
			$a_data = $this->a_data();
		}

		
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

			$aksi .= '<button type="button" class="btn btn-info btn-xs btn-flat" data-id="'.$id.'" data-type="detail" data-toggle="tooltip" title="Lihat Detail">
			<i class="fa fa-eye"></i></button> ';
			

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
		foreach ($this->a_kolom as $k => $v) 
		{
			$th[] = $v['label'];
		}

		if($this->c_edit)
		{
			$th[] = array('data' => 'Aksi', 'align' => 'center');
		}

		$this->table->set_heading($th);

		$this->data['table_generate'] = $this->table->generate();


		// Pagination
		$this->load->library('pagination');

		

		$pagging['base_url'] = base_url().$this->ctl.'/'.$page;
		$pagging['total_rows'] = $total_rows;
		$pagging['per_page'] = $this->{$this->model}->getLimit();
		$pagging['uri_segment'] = $this->getOffset();
		$pagging['use_page_numbers'] = TRUE;
		$pagging['cur_page'] = $this->getOffset();
		// echo $pagging['uri_segment'];
		// die();
		
		$pagging['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
		$pagging['full_tag_close'] = '</ul>';
		
		$pagging['first_tag_open'] = '<li class="paginate_button">';
		$pagging['first_tag_close'] = '</li>';
		
		$pagging['cur_tag_open'] = '<li class="paginate_button active"><a href="#">';
		$pagging['cur_tag_close'] = '</a></li>';
		
		$pagging['prev_tag_open'] = '<li class="paginate_button">';
		$pagging['prev_tag_close'] = '</li>';
		
		$pagging['num_tag_open'] = '<li class="paginate_button">';
		$pagging['num_tag_close'] = '</li>';
		
		$pagging['next_tag_open'] = '<li class="paginate_button">';
		$pagging['close_tag_open'] = '</li>';
		
		$pagging['last_tag_open'] = '<li class="paginate_button">';
		$pagging['last_tag_close'] = '</li>';

		$this->pagination->initialize($pagging);

		$this->data['pagination'] = $this->pagination->create_links();

		$this->template->admin_template($this->data);
	}

	function a_data()
	{
		return $this->{$this->model}->getList($this->getOffset());
	}

	function getOffset()
	{
		return $this->uri->segment(3);
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

	function detail($id)
	{

		$this->data['c_edit'] = false;

		$id 	= $this->uri->segment(3);
		$row 	= $this->{$this->model}->getRowById($id);

		$this->data['content_view'] = 'inc_detail_v';
		$this->data['form_action'] 	= '';
		$this->data['form_data'] 	= $this->ctl.'/'.$this->ctl.'_v';
		$this->data['description'] 	= 'Form ';
		$this->data['id']  = $id;
		$this->data['row'] = $row;

		

		$this->template->admin_template($this->data);
	}

	function edit($id)
	{
		
		if($this->c_edit !== true)
		{

			die(info('has_no_access'));
		}

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
		
		
	}

	function delete()
	{
		
		if($this->c_delete !== true)
		{
			die(info('has_no_access'));
		}

		$id = $this->input->post('key');

		list($ok, $msg) = $this->{$this->model}->delete($id);

		if(!$ok)
        {
            $this->session->set_flashdata('danger', $msg);
        }

       	$this->session->set_flashdata('success', info('deleted'));
       	redirect($this->ctl);
		
	}

	function search()
	{
		

        $this->a_kolom[] = array('label' => array('data' => 'No', 'align' => 'center'), 'field' => 'no:');
		$this->a_kolom[] = array('label' => 'Nama Lengkap', 'field' => 'user_fullname');
		$this->a_kolom[] = array('label' => 'Email', 'field' => 'user_name');
		$this->a_kolom[] = array('label' => 'No HP', 'field' => 'user_mobile');
		$this->a_kolom[] = array('label' => array('data' => 'Aktif', 'align' => 'center'), 'td_attributes' => array('align' => 'center'), 'field' => 'user_active');

        $this->listdata();

	}

}
