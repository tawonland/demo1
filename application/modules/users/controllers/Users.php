<?php

/**
*
*/
class Users extends Auth_Controller
{

	function __construct()
	{
		parent::__construct();
	}

	function index()
	{

		$this->a_kolom[] = array('label' => array('data' => 'No', 'align' => 'center'), 'field' => 'no:');
		$this->a_kolom[] = array('label' => 'Nama Lengkap', 'field' => 'user_fullname');
		$this->a_kolom[] = array('label' => 'Email', 'field' => 'user_name');
		$this->a_kolom[] = array('label' => 'No HP', 'field' => 'user_mobile');
		$this->a_kolom[] = array('label' => array('data' => 'Aktif', 'align' => 'center'), 'td_attributes' => array('align' => 'center'), 'field' => 'user_active');

		parent::listdata();
	}

	//overide a_data
	function a_data(){
		$a_data = parent::a_data();

		foreach ($a_data as $key => $row)
		{
			foreach ($this->a_kolom as $k => $v)
			{
				$field = $v['field'];

				if($field == 'no:')
				{
					$val  = '';
				}
				else if($field == 'user_active')
				{
					$val  = $row['user_active'] == '1' ? '<span class="label label-success">Aktif</span>' : '<span class="label label-danger">Tidak Aktif</span>';
				}
				else{
					$val  = $row[$field];
				}

				$a_data[$key][$field] = $val;
			}

		}

		return $a_data;
	}

	function add()
	{
		parent::add();
	}


	function insert()
	{

		$this->load->library('form_validation');

		$config = array(
		        array(
		                'field' => 'user_fullname',
		                'label' => 'Nama Lengkap',
		                'rules' => 'trim|required'
		        ),
		        array(
		                'field' => 'user_email',
		                'label' => 'Email',
		                'rules' => 'trim|required|valid_email|is_unique[users.user_email]'
		        )
		);

		$this->form_validation->set_rules($config);
		$data = $this->input->post();

		if ($this->form_validation->run() == FALSE)
        {
           	$this->session->set_flashdata('row', $data);

           	$this->session->set_flashdata('error', validation_errors());
            redirect($this->ctl.'/add');

        }

        //load model
        $this->load->model('users/m_users');

        //
        $data['user_password']  = password_hash('admin', PASSWORD_BCRYPT);
        $data['user_name']		= $data['user_email'];
        $data['user_fullname']		= $data['user_fullname'];

        //insert data
       	$id = $this->M_Users->insert($data);
        
        if(!$id)
        {
        	$this->session->set_flashdata('error', info('not_saved'));
        	redirect($this->ctl.'/add');
        }

       	$this->session->set_flashdata('success', info('saved'));
       	redirect($this->ctl);
	}

	function update($id)
	{

		$this->load->library('form_validation');

		$config = array(
		        array(
		                'field' => 'user_fullname',
		                'label' => 'Nama Lengkap',
		                'rules' => 'trim|required'
		        )
		);

		$this->form_validation->set_rules($config);
		$data = $this->input->post();

		if ($this->form_validation->run() == FALSE)
        {
           	$this->session->set_flashdata('row', $data);

           	$this->session->set_flashdata('error', validation_errors());
            redirect($this->ctl.'/edit/'.$id);

        }

        //load model
        $this->load->model('users/m_users');

        //
        $data['user_name']		= $data['user_email'];

       	$this->M_Users->update($data, $id);
       
	}

}
