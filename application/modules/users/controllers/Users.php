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

		$this->a_kolom[] = array('label' => 'No', 'field' => 'no:');
		$this->a_kolom[] = array('label' => 'Nama', 'field' => 'user_firstname');
		$this->a_kolom[] = array('label' => 'Email', 'field' => 'user_email');
		$this->a_kolom[] = array('label' => 'No HP', 'field' => 'user_mobile');
		$this->a_kolom[] = array('label' => 'Aktif', 'field' => 'user_active');

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

	function save()
	{
		$this->load->library('form_validation');

		$config = array(
		        array(
		                'field' => 'user_firstname',
		                'label' => 'Nama Depan',
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

        $this->load->model('users/m_users');

        unset($data['passconf'],$data['submit']);

        $data['user_password']  = password_hash($data['user_password'], PASSWORD_BCRYPT);
        $data['user_name']		= $data['user_email'];

        $id = $this->M_Users->signup($data);

        if(!$id)
        {
        	$this->session->set_flashdata('error', 'Pendaftaran Gagal');
        	redirect($this->ctl.'/add');
        }

       	$this->session->set_flashdata('success', 'Pendaftaran Berhasil');
       	redirect($this->ctl);
	}
}
