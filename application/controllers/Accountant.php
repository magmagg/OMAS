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
                'rules' => 'required|min_length[1]|max_length[10]|numeric',
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
				redirect(base_url().'Accountant/add_customer', 'refresh');
    }
  }

	function view_customers()
	{
		$data['customers'] = $this->Accountant_model->get_customers();
		$this->load->view('Accountant/header');
		$this->load->view('Accountant/customers/view_customers',$data);
	}

	function edit_one_customer()
	{
		$id = $this->uri->segment(3);
		$config = array(
				array(
								'field' => 'customername',
								'label' => 'customername',
								'rules' => 'required'
				),
				array(
								'field' => 'phone',
								'label' => 'phone',
								'rules' => 'required|min_length[1]|max_length[10]|numeric',
								'errors' => array(
												'required' => 'You must provide a %s.',
								),
				),
				array(
								'field' => 'email',
								'label' => 'email',
								'rules' => 'required|valid_email|callback_check_customer_email',
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
			$data['customer'] = $this->Accountant_model->get_one_customer($id);

			$this->load->view('Accountant/header');
			$this->load->view('Accountant/customers/edit_one_customer',$data);
			$this->session->set_flashdata('error','<div class="alert alert-danger">Please check form for errors! The form has been reset</div>');
		}
		else
		{
				$data = array('CustomerName'=>$this->input->post('customername'),
											'Phone'=>$this->input->post('phone'),
											'Email'=>$this->input->post('email'),
											'Address'=>$this->input->post('address')
										 );

				$this->Accountant_model->submit_edit_one_customer($id, $data);
				$this->session->set_flashdata('success','<div class="alert alert-success">Data updated!</div>');
				redirect(base_url().'Accountant/edit_one_customer/'.$id, 'refresh');
		}
	}

	function check_customer_email($email)
	{
		$id = $this->input->post('customerid');
		$data['customers'] = $this->Accountant_model->get_customers();

		foreach($data['customers'] as $d)
		{
			if($id == $d->CustomerID)
			{
				if($email == $d->Email)
				{
					return TRUE;
				}
			}
			else
			{
				if($email == $d->Email)
				{
					$this->form_validation->set_message('check_customer_email', 'Email must be unique');
					return FALSE;
				}
			}
		}
	}

	function delete_one_customer()
	{
		$id = $this->input->post('customerID');
		$this->Accountant_model->delete_one_customer($id);
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
				),
				array(
								'field' => 'postalcode',
								'label' => 'postalcode',
								'rules' => 'required|min_length[4]|max_length[4]|numeric'
				),
        array(
                'field' => 'phone',
                'label' => 'phone',
                'rules' => 'required|min_length[1]|max_length[10]|numeric',
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
				redirect(base_url().'Accountant/add_supplier', 'refresh');

    }
  }

	function view_suppliers()
	{
		$data['suppliers'] = $this->Accountant_model->get_suppliers();
		$this->load->view('Accountant/header');
		$this->load->view('Accountant/supplier/view_suppliers',$data);
	}

	function edit_one_supplier()
	{
		$id = $this->uri->segment(3);
		$config = array(
        array(
                'field' => 'suppliername',
                'label' => 'suppliername',
                'rules' => 'required'
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
				),
				array(
								'field' => 'postalcode',
								'label' => 'postalcode',
								'rules' => 'required|min_length[4]|max_length[4]|numeric'
				),
        array(
                'field' => 'phone',
                'label' => 'phone',
                'rules' => 'required|min_length[1]|max_length[10]|numeric',
                'errors' => array(
                        'required' => 'You must provide a %s.',
                ),
        ),
        array(
                'field' => 'email',
                'label' => 'email',
                'rules' => 'required|valid_email|callback_check_supplier_email',
                'errors' => array(
                        'is_unique' => 'Email already in use',
                      ),
        )
    );

    $this->form_validation->set_rules($config);

		if ($this->form_validation->run() == FALSE)
		{
			$data['supplier'] = $this->Accountant_model->get_one_supplier($id);

			$this->load->view('Accountant/header');
			$this->load->view('Accountant/supplier/edit_one_supplier',$data);
			$this->session->set_flashdata('error','<div class="alert alert-danger">Please check form for errors! The form has been reset</div>');
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

				$this->Accountant_model->submit_edit_one_supplier($id, $data);
				$this->session->set_flashdata('success','<div class="alert alert-success">Data updated!</div>');
				redirect(base_url().'Accountant/edit_one_supplier/'.$id, 'refresh');
		}
	}

	function check_supplier_email($email)
	{
		$id = $this->input->post('supplierid');
		$data['suppliers'] = $this->Accountant_model->get_suppliers();

		foreach($data['suppliers'] as $d)
		{
			if($id == $d->SupplierID)
			{
				if($email == $d->Email)
				{
					return TRUE;
				}
			}
			else
			{
				if($email == $d->Email)
				{
					$this->form_validation->set_message('check_supplier_email', 'Email must be unique');
					return FALSE;
				}
			}
		}
	}

	function delete_one_supplier()
	{
		$id = $this->input->post('supplierID');
		$this->Accountant_model->delete_one_supplier($id);
	}

	//Purchase orders
	function make_purchase_order()
	{
		$data['suppliers'] = $this->Accountant_model->get_suppliers();
		$this->load->view('Accountant/header');
		$this->load->view('Accountant/PurchaseOrder/make_purchase_order',$data);
	}

	function get_one_supplier()
	{
		$id = $this->input->post('supplierid');
		$data['supplier'] = $this->Accountant_model->get_one_supplier($id);
		echo json_encode($data);
	}

	function submit_make_purchase_order()
	{
    $use['items'] = list($items) = $this->input->post('item');
    $use['quantity'] = list($items) = $this->input->post('quantity');
    $use['unitprice'] = list($items) = $this->input->post('unitprice');
    $use['total'] = list($items) = $this->input->post('total');

    $total = 0;
    foreach($use['total'] as $t)
    {
      $total += $t;
    }

    //Insert data now
    $data = array('Total'=>$total,
                  'Accountant_UserID'=>$this->session->userdata('AccountantID'),
                  'Supplier_SupplierID'=>$this->input->post('supplierid'),
                  'Administrator_AdminID'=>1);
    $PurchaseID = $this->Accountant_model->insert_purchase_order($data);

    foreach($use['items'] as $key=>$value)
    {
      $data = array('ItemName'=>$value,
                    'Quantity'=>$use['quantity'][$key],
                    'UnitPrice'=>$use['unitprice'][$key],
                    'PO_ID'=>$PurchaseID);
      $this->Accountant_model->insert_purchase_order_item($data);
    }

	}

}
