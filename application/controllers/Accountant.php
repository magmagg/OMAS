<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Accountant extends CI_Controller
{
	function __construct()
	{
    parent::__construct();

    $this->load->model('Accountant_model');
  }

  function index()
  {
		$this->load->view('Accountant/header');
		$this->load->view('Accountant/index');
  }


  //Customers

  function add_customer()
  {
    $config = array(
        array(
                'field' => 'customername',
                'label' => 'customername',
                'rules' => 'required'
        ),
        array(
                'field' => 'phone',
                'label' => 'phone',
                'rules' => 'required|min_length[1]|max_length[10]|is_natural',
                'errors' => array(
                        'required' => 'You must provide a %s.',
                ),
        ),
        array(
                'field' => 'email',
                'label' => 'email',
                'rules' => 'required|is_unique[customer.Email]|valid_email',
                'errors' => array(
                        'is_unique' => 'Email already in use',
                      ),
        ),
        array(
                'field' => 'address',
                'label' => 'address',
                'rules' => 'required'
        )
    );

    $this->form_validation->set_rules($config);

    if ($this->form_validation->run() == FALSE)
    {
		    $this->load->view('Accountant/header');
		    $this->load->view('Accountant/customers/add_customer');
        $this->session->set_flashdata('error','<div class="alert alert-danger">Please check form for errors!</div>');
    }
    else
    {
        $data = array('CustomerName'=>$this->input->post('customername'),
                      'Phone'=>$this->input->post('phone'),
                      'Email'=>$this->input->post('email'),
                      'Address'=>$this->input->post('address')
                     );

        $this->Accountant_model->submit_add_user($data);
        $this->session->set_flashdata('success','<div class="alert alert-success">Data inserted</div>');
    }
  }

  //Suppliers

  function add_supplier()
  {
    $config = array(
        array(
                'field' => 'suppliername',
                'label' => 'suppliername',
                'rules' => 'required'
        ),
        array(
                'field' => 'phone',
                'label' => 'phone',
                'rules' => 'required|min_length[1]|max_length[10]|is_natural',
                'errors' => array(
                        'required' => 'You must provide a %s.',
                ),
        ),
        array(
                'field' => 'email',
                'label' => 'email',
                'rules' => 'required|is_unique[supplier.Email]|valid_email',
                'errors' => array(
                        'is_unique' => 'Email already in use',
                      ),
        ),
        array(
                'field' => 'address',
                'label' => 'address',
                'rules' => 'required'
        ),
        array(
                'field' => 'city',
                'label' => 'city',
                'rules' => 'required'
        ),
        array(
                'field' => 'region',
                'label' => 'region',
                'rules' => 'required'
        )
    );

    $this->form_validation->set_rules($config);

    if ($this->form_validation->run() == FALSE)
    {
        $this->load->view('Accountant/header');
        $this->load->view('Accountant/supplier/add_supplier');
        $this->session->set_flashdata('error','<div class="alert alert-danger">Please check form for errors!</div>');
    }
    else
    {
        $data = array('SupplierName'=>$this->input->post('suppliername'),
                      'Address'=>$this->input->post('address'),
                      'City'=>$this->input->post('city'),
                      'Region'=>$this->input->post('region'),
                      'PostalCode'=>$this->input->post('postalcode'),
                      'Phone'=>$this->input->post('phone'),
                      'Email'=>$this->input->post('email'),
                     );

        $this->Accountant_model->submit_add_supplier($data);
        $this->session->set_flashdata('success','<div class="alert alert-success">Data inserted!</div>');

    }
  }
}
