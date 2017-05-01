<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{
	function __construct()
	{
    parent::__construct();
    $this->load->model('Admin_model');
  }

  function index()
  {
		$this->load->view('Admin/header');
		$this->load->view('Admin/index');
  }

	function add_accountant()
	{
		$config = array(
				array(
								'field' => 'username',
								'label' => 'username',
								'rules' => 'trim|required|min_length[1]|max_length[45]|is_unique[accountant.Username]'
				),
				array(
								'field' => 'password',
								'label' => 'password',
								'rules' => 'trim|required|min_length[1]|max_length[45]',
								'errors' => array(
												'required' => 'You must provide a %s.',
								),
				),
				array(
								'field' => 'email',
								'label' => 'email',
								'rules' => 'required|is_unique[accountant.Email]|valid_email',
								'errors' => array(
												'is_unique' => 'Email already in use',
											),
				),
				array(
								'field' => 'confirmpassword',
								'label' => 'confirmpassword',
								'rules' => 'trim|required|min_length[1]|max_length[45]|matches[password]'
				)
		);

		$this->form_validation->set_rules($config);

		if ($this->form_validation->run() == FALSE)
		{
				$this->load->view('Admin/header');
				$this->load->view('Admin/accountants/add_accountant');
				$this->session->set_flashdata('error','<div class="alert alert-danger">Please check form for errors!</div>');
		}
		else
		{
				$data = array('username'=>$this->input->post('username'),
											'email'=>$this->input->post('email'),
											'password'=>password_hash($this->input->post('password'), PASSWORD_DEFAULT)
										 );

				$this->Admin_model->submit_add_accountant($data);
				$this->session->set_flashdata('success','<div class="alert alert-success">Data inserted</div>');
				redirect(base_url().'Admin/add_accountant', 'refresh');
		}
	}

	function view_accountants()
	{
		$data['accountants'] = $this->Admin_model->get_accountants();
		$this->load->view('Admin/header');
		$this->load->view('Admin/Accountants/view_accountants',$data);
	}

}
