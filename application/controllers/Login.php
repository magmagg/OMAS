<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{
	function __construct()
	{
    parent::__construct();
		$this->load->model('Login_model');
  }

  function index()
  {
		if($this->session->userdata('logged_in_accountant') == 1)
		{
			redirect('Accountant');
		}
		else if($this->session->userdata('logged_in_admin')==1)
		{
			redirect('Admin');
		}
		else
		{
			$config = array(
					array(
									'field' => 'username',
									'label' => 'username',
									'rules' => 'trim|required|min_length[1]|max_length[45]'
					),
					array(
									'field' => 'password',
									'label' => 'password',
									'rules' => 'trim|required|min_length[1]|max_length[45]'
					)
			);

			$this->form_validation->set_rules($config);

			if ($this->form_validation->run() == FALSE)
			{
					$this->load->view('Login/index');
						$this->session->set_flashdata('validationerrors','<div class="alert alert-danger">Please check form for errors!!</div>');
			}
			else
			{
				$username = $this->input->post('username');
				$password = $this->input->post('password');

				//Check if admin, get ID if yes
				$adminID = $this->Login_model->check_if_admin($username,$password);

				if($adminID)
				{
					$data['admin'] = $this->Login_model->get_admin_details($adminID);
					foreach($data['admin'] as $a)
					{
						$sessiondata = array('AccountantID'=>$a->AdminID,
																'username'=>$a->username,
																'email'=>$a->email,
																'create_time'=>$a->create_time,
																'logged_in_admin'=>true
																);
					}
	        $this->session->set_userdata($sessiondata);
					redirect('Admin','refresh');
				}
				else
				{
					$data['accountant'] = $this->Login_model->get_accountant_details($username);
					if($data['accountant'])
					{
						foreach($data['accountant'] as $a)
						{
							if($a->Status == 1)
							{
								$hash = $a->password;

								if(password_verify($password, $hash))
								{
									$data['accountant'] = $this->Login_model->get_accountant_details($username);
									foreach($data['accountant'] as $a)
									{
										$sessiondata = array('AccountantID'=>$a->UserID,
																				'username'=>$a->username,
																				'email'=>$a->email,
																				'create_time'=>$a->create_time,
																				'logged_in_accountant'=>true
																				);
									}
									$this->session->set_userdata($sessiondata);
									redirect('Accountant','refresh');
								}
								else
								{
									$this->session->set_flashdata('error','User not found');
									redirect('Login','refresh');
								}
							}
							else
							{
									$this->session->set_flashdata('error','Account disabled');
									redirect('Login','refresh');
							}
						}
					}
					else
					{
							$this->session->set_flashdata('error','User not found');
							redirect('Login','refresh');
					}
				}
			}
		}
  }

	function logout()
	{
		session_destroy();
		redirect('Login','refresh');
	}

}
