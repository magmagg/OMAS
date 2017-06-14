<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Accountant extends CI_Controller
{
	function __construct()
	{
    parent::__construct();

    $this->load->model('Accountant_model');
    $this->load->model('Admin_model');
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
        $this->load->view('Accountant/ServiceInvoice/sub_menu');
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
    $this->load->view('Accountant/ServiceInvoice/sub_menu');
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
      $this->load->view('Accountant/ServiceInvoice/sub_menu');
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
                'rules' => 'required|is_unique[supplier.SupplierName]'
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
        $this->load->view('Accountant/PurchaseOrder/sub_menu');
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
				redirect(base_url().'Accountant/view_suppliers', 'refresh');

    }
  }

	function view_suppliers()
	{
		$data['suppliers'] = $this->Accountant_model->get_suppliers();
		$this->load->view('Accountant/header');
    $this->load->view('Accountant/PurchaseOrder/sub_menu');
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
      $this->load->view('Accountant/PurchaseOrder/sub_menu');
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
    $this->load->view('Accountant/PurchaseOrder/sub_menu');
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
    $use['itemdesc'] = list($items) = $this->input->post('itemdesc');
    $use['quantity'] = list($items) = $this->input->post('quantity');
    $use['unitprice'] = list($items) = $this->input->post('unitprice');
    $use['total'] = list($items) = $this->input->post('total');

    $total = 0;
    foreach($use['total'] as $t)
    {
      $total += $t;
    }

    //Insert data now
		//Admin is logged in
		if($this->session->userdata('logged_in_admin') == true)
		{
			$data = array('Total'=>$total,
	                  'Accountant_UserID'=>$this->session->userdata('AccountantID'),
	                  'Supplier_SupplierID'=>$this->input->post('supplierid'),
	                  'Administrator_AdminID'=>$this->session->userdata('AccountantID'),
										'Status'=>1);
	    $PurchaseID = $this->Accountant_model->insert_purchase_order($data);

		}
		else
		{
			$data = array('Total'=>$total,
										'Accountant_UserID'=>$this->session->userdata('AccountantID'),
										'Supplier_SupplierID'=>$this->input->post('supplierid'),
										'Administrator_AdminID'=>1);
			$PurchaseID = $this->Accountant_model->insert_purchase_order($data);

		}

    foreach($use['items'] as $key=>$value)
    {
      $data = array('ItemName'=>$value,
                    'Quantity'=>$use['quantity'][$key],
                    'ItemDesc'=>$use['itemdesc'][$key],
                    'UnitPrice'=>$use['unitprice'][$key],
                    'PO_ID'=>$PurchaseID);
      $this->Accountant_model->insert_purchase_order_item($data);
    }
		$this->session->set_flashdata('success','<div class="alert alert-success">Data inserted!!</div>');
		redirect(base_url().'Accountant/view_purchase_orders');
	}

	function view_purchase_orders()
	{
		if($this->session->userdata('logged_in_admin') == true)
		{
			$data['purchaseorders'] = $this->Admin_model->get_purchase_orders();
		}
		else
		{
			$data['purchaseorders'] = $this->Accountant_model->get_purchase_orders_byuser($this->session->userdata('AccountantID'));
		}
		$data['suppliers'] = $this->Accountant_model->get_suppliers();
		$this->load->view('Accountant/header');
    $this->load->view('Accountant/PurchaseOrder/sub_menu');
		$this->load->view('Accountant/PurchaseOrder/view_purchase_orders',$data);
	}

	function view_one_purchase_order()
	{
		$id = $this->uri->segment(3);
		$data['purchaseorder'] = $this->Accountant_model->get_purchase_orders_byuser_items($id);
		$data['supplier'] = $this->Accountant_model->get_one_supplier($data['purchaseorder'][0]->Supplier_SupplierID);

		$this->load->view('Accountant/header');
		$this->load->view('Accountant/PurchaseOrder/view_purchase_order_one',$data);
	}

	//service Invoice
	function make_service_invoice()
	{
		$data['customers'] = $this->Accountant_model->get_customers();

    //Get distinct PO ID's to check if accepted by admin or not
		$use['POID'] = $this->Accountant_model->get_purchase_order_items_poid();
    $data['items']  = array();
    foreach($use['POID'] as $p)
    {
      $use['status'] = $this->Accountant_model->get_purchase_order_status($p->PO_ID);
      $Status = $use['status'][0]->Status;
      $purchaseID = $use['status'][0]->PurchaseID;
      if($Status == 1)
      {
        $use['items'] = $this->Accountant_model->get_purchase_order_items_byid($purchaseID);
        foreach($use['items'] as $i)
        {
          $data['items'][] = array('ItemName'=>$i->ItemName,
                                   'ItemID'=>$i->ItemID,
                                    'UnitPrice'=>$i->UnitPrice);
        }
      }
    }
		$this->load->view('Accountant/header');
    $this->load->view('Accountant/ServiceInvoice/sub_menu');
		$this->load->view('Accountant/ServiceInvoice/make_service_invoice',$data);
	}

	function get_one_customer()
	{
		$id = $this->input->post('customerid');
		$data['customer'] = $this->Accountant_model->get_one_customer($id);
		echo json_encode($data);
	}

  function submit_make_service_invoice()
  {
    $use['items'] = list($items) = $this->input->post('items');
    $use['quantity'] = list($items) = $this->input->post('quantity');
    $use['total'] = list($items) = $this->input->post('total');

		$use['service'] = list($items) = $this->input->post('service');
    $use['servicequantity'] = list($items) = $this->input->post('servicequantity');
    $use['serviceunitprice'] = list($items) = $this->input->post('serviceunitprice');
    $use['servicetotal'] = list($items) = $this->input->post('servicetotal');

    $total = 0;
    foreach($use['total'] as $t)
    {
      $total += $t;
    }

    foreach($use['servicetotal'] as $t)
    {
      $total += $t;
    }

    //Insert data now
    $data = array('Total'=>$total,
                  'Accountant_UserID'=>$this->session->userdata('AccountantID'),
                  'Customer_CustomerID'=>$this->input->post('customerid'),
                  'Administrator_AdminID'=>1,
                  'Status'=>1);
    $ServiceID = $this->Accountant_model->insert_service_invoice($data);

    foreach($use['items'] as $key=>$value)
    {
      $data = array('POI_ItemID'=>$value,
                    'Quantity'=>$use['quantity'][$key],
                    'SO_ID'=>$ServiceID);
      $this->Accountant_model->insert_service_invoice_item($data);

      $use['itemquant'] = $this->Accountant_model->get_quantity_by_itemid($value);
      foreach($use['itemquant'] as $q)
      {
        $origquant = $q->Quantity;
      }
      $newquant = $origquant - $use['quantity'][$key];
      $data = array('Quantity'=>$newquant);
      $this->Accountant_model->subtract_quantity($data,$value);
    }

		foreach($use['service'] as $key=>$value)
		{
			$data = array('service_name'=>$value,
										'Quantity'=>$use['servicequantity'][$key],
										'UnitPrice'=>$use['serviceunitprice'][$key],
										'SO_ID'=>$ServiceID);
			$this->Accountant_model->insert_service_invoice_service($data);
		}
    $this->session->set_flashdata('success','<div class="alert alert-success">Data inserted!!</div>');
    redirect(base_url().'Accountant/view_service_invoices');
  }

  function view_service_invoices()
  {
		if($this->session->userdata('logged_in_admin') == true)
		{
			$data['serviceinvoices'] = $this->Admin_model->get_service_invoices();
		}
		else
		{
			$data['serviceinvoices'] = $this->Accountant_model->get_service_invoice_byuser($this->session->userdata('AccountantID'));
		}
    $data['customers'] = $this->Accountant_model->get_customers();
    $this->load->view('Accountant/header');
    $this->load->view('Accountant/ServiceInvoice/sub_menu');
    $this->load->view('Accountant/ServiceInvoice/view_service_invoices',$data);
  }

  function view_one_service_invoice()
  {
    $id = $this->uri->segment(3);
    $use['items'] = $this->Accountant_model->get_so_id_quantity($id);
    $data['serviceinvoice'] = $this->Accountant_model->get_service_invoice_byuser_items($id);
		$data['services'] = $this->Accountant_model->get_service_services($id);
    $data['items']  = array();
    foreach($use['items'] as $p)
    {
        $use['allitems'] = $this->Accountant_model->get_purchase_order_items();

        foreach($use['allitems'] as $i)
        {
          if($p->POI_ItemID == $i->ItemID)
          {
            $data['items'][] = array('ItemName'=>$i->ItemName,
                                     'ItemID'=>$i->ItemID,
                                      'UnitPrice'=>$i->UnitPrice,
                                      'Quantity'=>$p->Quantity);
          }
        }
    }
    $data['customer'] = $this->Accountant_model->get_one_customer($data['serviceinvoice'][0]->Customer_CustomerID);

    $this->load->view('Accountant/header');
    $this->load->view('Accountant/ServiceInvoice/sub_menu');
    $this->load->view('Accountant/ServiceInvoice/view_service_invoice_one',$data);
  }

	function get_max_item_value()
	{
		$itemid = $this->input->post('itemid');
		echo json_encode($this->Accountant_model->get_max_item_value($itemid));
	}

	//Utilities
	function view_utilities()
	{
    $data['utilites'] = $this->Accountant_model->get_all_utilities();
		$this->load->view('Accountant/header');
		$this->load->view('Accountant/Utilities/sub_menu');
		$this->load->view('Accountant/Utilities/view_utilities',$data);
	}

  function make_utilities()
  {
    $config = array(
        array(
                'field' => 'utilitiesname',
                'label' => 'utilitiesname',
                'rules' => 'required'
        ),
        array(
                'field' => 'utilitiesdesc',
                'label' => 'utilitiesdesc',
                'rules' => 'required'
        ),
        array(
                'field' => 'utilitiesprice',
                'label' => 'utilitiesprice',
                'rules' => 'required|numeric'
        )
    );

    $this->form_validation->set_rules($config);

    if ($this->form_validation->run() == FALSE)
    {
        $this->load->view('Accountant/header');
        $this->load->view('Accountant/Utilities/sub_menu');
        $this->load->view('Accountant/Utilities/make_utilities');
        $this->session->set_flashdata('error','<div class="alert alert-danger">Please check form for errors!</div>');
    }
    else
    {
      if($this->input->post('filecheckbox') == 1)
      {
        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'doc|docx|pdf';
        $config['max_size']             = 100;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('fileinput'))
        {
          $this->session->set_flashdata('error1','<div class="alert alert-danger">Error with file upload, Please try again</div>');
            redirect(base_url().'Accountant/make_utilities', 'refresh');
        }
        else
        {
          $upload_data = $this->upload->data();
          $file_name = $upload_data['full_path'];
            if($this->input->post('paidcheckbox') == 1)
            {
              $data = array('utility_name'=>$this->input->post('utilitiesname'),
                            'utility_desc'=>$this->input->post('utilitiesdesc'),
                            'utility_price'=>$this->input->post('utilitiesprice'),
                            'date_paid'=>$this->input->post('utilitiesdatepaid'),
                            'utility_doc'=>$file_name,
                            'Status'=>1
                           );
            }
            else
            {
              $data = array('utility_name'=>$this->input->post('utilitiesname'),
                            'utility_desc'=>$this->input->post('utilitiesdesc'),
                            'utility_price'=>$this->input->post('utilitiesprice'),
                            'utility_doc'=>$file_name
                             );
            }
        }
      }
      else
      {
        if($this->input->post('paidcheckbox') == 1)
        {
          $data = array('utility_name'=>$this->input->post('utilitiesname'),
                        'utility_desc'=>$this->input->post('utilitiesdesc'),
                        'utility_price'=>$this->input->post('utilitiesprice'),
                        'date_paid'=>$this->input->post('utilitiesdatepaid'),
                        'Status'=>1
                       );
        }
        else
        {
          $data = array('utility_name'=>$this->input->post('utilitiesname'),
                                'utility_desc'=>$this->input->post('utilitiesdesc'),
                                'utility_price'=>$this->input->post('utilitiesprice')
                               );
        }
      }
        $this->Accountant_model->submit_make_utilities($data);
        $this->session->set_flashdata('success','<div class="alert alert-success">Data inserted</div>');
        redirect(base_url().'Accountant/view_utilities', 'refresh');
    }
  }

  function view_one_utility()
  {
    $id = $this->uri->segment(3);

    $data['utility'] = $this->Accountant_model->get_one_utility($id);
    $this->load->view('Accountant/header');
    $this->load->view('Accountant/Utilities/sub_menu');
    $this->load->view('Accountant/Utilities/view_one_utility',$data);
  }

  function submit_update_utility()
  {
    $utilitiesID = $this->input->post('id');
    if($this->input->post('filecheckbox') == 1)
    {
      $config['upload_path']          = './uploads/';
      $config['allowed_types']        = 'doc|docx|pdf';
      $config['max_size']             = 100;

      $this->load->library('upload', $config);

      if (!$this->upload->do_upload('fileinput'))
      {
        $this->session->set_flashdata('error1','<div class="alert alert-danger">Error with file upload, Please try again</div>');
        redirect(base_url().'Accountant/view_one_utility/'.$utilitiesID, 'refresh');
      }
      else
      {
        $upload_data = $this->upload->data();
        $file_name = $upload_data['full_path'];
          if($this->input->post('paidcheckbox') == 1)
          {
            $data = array('date_paid'=>$this->input->post('utilitiesdatepaid'),
                          'utility_doc'=>$file_name,
                          'Status'=>1
                         );
          }
          else
          {
            $data = array('utility_doc'=>$file_name);
          }
          $this->Accountant_model->submit_update_utility($utilitiesID, $data);
      }
    }
    else
    {
        $data = array('date_paid'=>$this->input->post('utilitiesdatepaid'),
                      'Status'=>1
                     );

      $this->Accountant_model->submit_update_utility($utilitiesID, $data);
    }
    redirect(base_url().'Accountant/view_utilities', 'refresh');
  }

	function inventory()
	{
    $data['inventory'] = $this->Accountant_model->get_purchase_order_items_w_supp();
    $data['suppliers'] = $this->Accountant_model->get_suppliers();
    $this->load->view('Accountant/header');
    $this->load->view('Accountant/Inventory/sub_menu');
    $this->load->view('Accountant/Inventory/inventory',$data);
	}

	//Balance sheet
	function balance_sheet()
	{
    $this->load->view('Accountant/header');
    $this->load->view('Accountant/BalanceSheet/sub_menu');
    $this->load->view('Accountant/BalanceSheet/create_balance_sheet');
	}

  function submit_create_balance_sheet()
  {
    $data = array('created_by'=>$this->session->userdata('AccountantID'));
    $balanceid = $this->Accountant_model->insert_balance_table($data);

    $use['assetname'] = list($items) = $this->input->post('assetname');
    $use['assetvalue'] = list($items) = $this->input->post('assetvalue');

    $use['liabilityname'] = list($items) = $this->input->post('liabilityname');
    $use['liabilityvalue'] = list($items) = $this->input->post('liabilityvalue');

    $use['oequityname'] = list($items) = $this->input->post('oequityname');
    $use['oequityvalue'] = list($items) = $this->input->post('oequityvalue');

    if($this->input->post('assetcurrent') == NULL)
    {
      $assetcurrent = 0;
    }
    else
    {
      $assetcurrent = $this->input->post('assetcurrent');
    }

    if($this->input->post('liabilitycurrent') == NULL)
    {
      $liabilitycurrent = 0;
    }
    else
    {
      $liabilitycurrent = $this->input->post('liabilitycurrent');
    }

    $assetstotal = '';
    $liabilitiestotal = '';
    $oequitytotal = '';

    foreach($use['assetname'] as $key=>$value)
    {
      $data = array('balance_id'=>$balanceid,
                    'asset_name'=>$value,
                    'asset_value'=>$use['assetvalue'][$key],
                    'asset_current'=>$assetcurrent,
                    );
      $assetstotal += $use['assetvalue'][$key];
      $this->Accountant_model->insert_assets($data);
    }

    foreach($use['liabilityname'] as $key=>$value)
    {
      $data = array('balance_id'=>$balanceid,
                    'liability_name'=>$value,
                    'liability_value'=>$use['liabilityvalue'][$key],
                    'liability_current'=>$liabilitycurrent,
                    );
      $liabilitiestotal += $use['liabilityvalue'][$key];
      $this->Accountant_model->insert_liabilities($data);
    }

    foreach($use['oequityname'] as $key=>$value)
    {
      $data = array('balance_id'=>$balanceid,
                    'owner_name'=>$value,
                    'owner_value'=>$use['oequityvalue'][$key],
                    );
      $oequitytotal += $use['oequityvalue'][$key];
      $this->Accountant_model->insert_oequity($data);
    }

    $data = array('balance_id'=>$balanceid,
                  'total_assets'=>$assetstotal,
                  'total_liabilities'=>$liabilitiestotal,
                  'total_equity'=>$oequitytotal);
    $this->Accountant_model->insert_balancer($data);
    $this->session->set_flashdata('success','<div class="alert alert-success">Data inserted</div>');
		redirect(base_url().'Accountant/balance_sheet', 'refresh');
  }

  function submit_update_balancesheet()
  {
    $data = array('created_by'=>$this->session->userdata('AccountantID'));
    $balanceid = $this->Accountant_model->insert_balance_table($data);

    $use['assetname'] = list($items) = $this->input->post('assetname');
    $use['assetvalue'] = list($items) = $this->input->post('assetvalue');

    $use['liabilityname'] = list($items) = $this->input->post('liabilityname');
    $use['liabilityvalue'] = list($items) = $this->input->post('liabilityvalue');

    $use['oequityname'] = list($items) = $this->input->post('oequityname');
    $use['oequityvalue'] = list($items) = $this->input->post('oequityvalue');

    if($this->input->post('assetcurrent') == NULL)
    {
      $assetcurrent = 0;
    }
    else
    {
      $assetcurrent = $this->input->post('assetcurrent');
    }

    if($this->input->post('liabilitycurrent') == NULL)
    {
      $liabilitycurrent = 0;
    }
    else
    {
      $liabilitycurrent = $this->input->post('liabilitycurrent');
    }

    $assetstotal = '';
    $liabilitiestotal = '';
    $oequitytotal = '';

    foreach($use['assetname'] as $key=>$value)
    {
      $data = array('balance_id'=>$balanceid,
                    'asset_name'=>$value,
                    'asset_value'=>$use['assetvalue'][$key],
                    'asset_current'=>$assetcurrent,
                    );
      $assetstotal += $use['assetvalue'][$key];
      $this->Accountant_model->insert_assets($data);
    }

    foreach($use['liabilityname'] as $key=>$value)
    {
      $data = array('balance_id'=>$balanceid,
                    'liability_name'=>$value,
                    'liability_value'=>$use['liabilityvalue'][$key],
                    'liability_current'=>$liabilitycurrent,
                    );
      $liabilitiestotal += $use['liabilityvalue'][$key];
      $this->Accountant_model->insert_liabilities($data);
    }

    foreach($use['oequityname'] as $key=>$value)
    {
      $data = array('balance_id'=>$balanceid,
                    'owner_name'=>$value,
                    'owner_value'=>$use['oequityvalue'][$key],
                    );
      $oequitytotal += $use['oequityvalue'][$key];
      $this->Accountant_model->insert_oequity($data);
    }

    $data = array('balance_id'=>$balanceid,
                  'total_assets'=>$assetstotal,
                  'total_liabilities'=>$liabilitiestotal,
                  'total_equity'=>$oequitytotal);
    $this->Accountant_model->insert_balancer($data);
    $this->session->set_flashdata('success','<div class="alert alert-success">Data inserted</div>');
    redirect(base_url().'Accountant/balance_sheet', 'refresh');
  }

  function view_balance_sheet()
  {
    $data['ids'] = $this->Accountant_model->get_balance_ids();

    $this->load->view('Accountant/header');
    $this->load->view('Accountant/BalanceSheet/sub_menu');
    $this->load->view('Accountant/BalanceSheet/view_balance_sheet',$data);
  }

  function view_balance_sheet_one()
  {
    $id = $this->uri->segment(3);

    $data['assets'] = $this->Accountant_model->get_assets($id);
    $data['liabilities'] = $this->Accountant_model->get_liabilities($id);
    $data['oequity'] = $this->Accountant_model->get_oequity($id);
    $data['balancer'] = $this->Accountant_model->get_balancer($id);
    $data['balancesheetid'] = $id;

    $this->load->view('Accountant/header');
    $this->load->view('Accountant/BalanceSheet/sub_menu');
    $this->load->view('Accountant/BalanceSheet/view_balance_sheet_one1',$data);
  }

  function edit_one_balance_sheet()
  {
    $id = $this->uri->segment(3);

    $data['assets'] = $this->Accountant_model->get_assets($id);
    $data['liabilities'] = $this->Accountant_model->get_liabilities($id);
    $data['oequity'] = $this->Accountant_model->get_oequity($id);
    $data['balancer'] = $this->Accountant_model->get_balancer($id);
    $data['balancesheetid'] = $id;

    $this->load->view('Accountant/header');
    $this->load->view('Accountant/BalanceSheet/sub_menu');
    $this->load->view('Accountant/BalanceSheet/edit_balance_sheet_one',$data);
  }

	//OtherExpenses
	function make_other_expenses()
	{
		$config = array(
				array(
								'field' => 'name',
								'label' => 'sname',
								'rules' => 'required'
				),
				array(
								'field' => 'desc',
								'label' => 'desc',
								'rules' => 'required'
				),
				array(
								'field' => 'price',
								'label' => 'price',
								'rules' => 'required|numeric'
				)
		);

		$this->form_validation->set_rules($config);

		if ($this->form_validation->run() == FALSE)
		{
				$this->load->view('Accountant/header');
				$this->load->view('Accountant/Utilities/sub_menu');
				$this->load->view('Accountant/Utilities/make_other_expenses');
				$this->session->set_flashdata('error','<div class="alert alert-danger">Please check form for errors!</div>');
		}
		else
		{
			if($this->input->post('table') == 'depreciation')
			{

					if($this->input->post('filecheckbox') == 1)
					{
						$config['upload_path']          = './uploads/';
						$config['allowed_types']        = 'doc|docx|pdf';
						$config['max_size']             = 100;

						$this->load->library('upload', $config);

						if (!$this->upload->do_upload('fileinput'))
						{
							$this->session->set_flashdata('error1','<div class="alert alert-danger">Error with file upload, Please try again</div>');
								redirect(base_url().'Accountant/make_other_expenses', 'refresh');
						}
						else
						{
							$upload_data = $this->upload->data();
							$file_name = $upload_data['full_path'];
							$data = array('name'=>$this->input->post('name'),
														'desc'=>$this->input->post('desc'),
														'value'=>$this->input->post('price'),
														'fiscal_year'=>$this->input->post('yearpicker'),
														'other_doc'=>$file_name
														 );

						}
					}
					else
					{
							$data = array('name'=>$this->input->post('name'),
														'desc'=>$this->input->post('desc'),
														'value'=>$this->input->post('price'),
														'fiscal_year'=>$this->input->post('yearpicker'),
														 );
					}
		        $table = $this->input->post('table');
						$this->Accountant_model->submit_other_expenses($data,$table);
						$this->session->set_flashdata('success','<div class="alert alert-success">Data inserted</div>');
						redirect(base_url().'Accountant/view_other_expenses', 'refresh');
			}
			if($this->input->post('filecheckbox') == 1)
			{
				$config['upload_path']          = './uploads/';
				$config['allowed_types']        = 'doc|docx|pdf';
				$config['max_size']             = 100;

				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('fileinput'))
				{
					$this->session->set_flashdata('error1','<div class="alert alert-danger">Error with file upload, Please try again</div>');
						redirect(base_url().'Accountant/make_other_expenses', 'refresh');
				}
				else
				{
					$upload_data = $this->upload->data();
					$file_name = $upload_data['full_path'];
						if($this->input->post('paidcheckbox') == 1)
						{
							$data = array('name'=>$this->input->post('name'),
														'desc'=>$this->input->post('desc'),
														'value'=>$this->input->post('price'),
														'date_paid'=>$this->input->post('datepaid'),
														'other_doc'=>$file_name,
														'Status'=>1
													 );
						}
						else
						{
							$data = array('name'=>$this->input->post('name'),
														'desc'=>$this->input->post('desc'),
														'value'=>$this->input->post('price'),
														'other_doc'=>$file_name
														 );
						}
				}
			}
			else
			{
				if($this->input->post('paidcheckbox') == 1)
				{
					$data = array('name'=>$this->input->post('name'),
												'desc'=>$this->input->post('desc'),
												'value'=>$this->input->post('price'),
												'date_paid'=>$this->input->post('datepaid'),
												'Status'=>1
											 );
				}
				else
				{
					$data = array('name'=>$this->input->post('name'),
																'desc'=>$this->input->post('desc'),
																'value'=>$this->input->post('price')
															 );
				}
			}
        $table = $this->input->post('table');
				$this->Accountant_model->submit_other_expenses($data,$table);
				$this->session->set_flashdata('success','<div class="alert alert-success">Data inserted</div>');
				redirect(base_url().'Accountant/view_other_expenses', 'refresh');
		}
	}

	function view_other_expenses()
	{
		$data['expenses'] = array('other_expenses','rent','insurance','fees','wages','interest','supplies','maintenance','travel','entertainment','training','utilities','depreciation');
    foreach($data['expenses'] as $e)
    {
      $data[$e] = $this->Accountant_model->get_other_expenses($e);
    }
		$this->load->view('Accountant/header');
		$this->load->view('Accountant/Utilities/sub_menu');
		$this->load->view('Accountant/Utilities/view_other_expenses',$data);
	}

  function view_one_expense()
  {
    $table = $this->uri->segment(3);
    $id = $this->uri->segment(4);

    if($table == 'other_expenses')
    {
      $data['idname'] = 'other_expenseID';
      $data['table'] = 'other_expenses';
      $use = array('other_expenseID'=>$id);
    }
    else if($table =='rent')
    {
      $data['idname'] = 'rentID';
      $data['table'] = 'rent';
      $use = array('rentID'=>$id);
    }
    else if($table =='insurance')
    {
      $data['idname'] = 'insuranceID';
      $data['table'] = 'insurance';
      $use = array('insuranceID'=>$id);
    }
    else if($table =='fees')
    {
      $data['idname'] = 'feesID';
      $data['table'] = 'fees';
      $use = array('feesID'=>$id);
    }
    else if($table =='wages')
    {
      $data['idname'] = 'wagesID';
      $data['table'] = 'wages';
      $use = array('wagesID'=>$id);
    }
    else if($table =='interest')
    {
      $data['idname'] = 'interestID';
      $data['table'] = 'interest';
      $use = array('interestID'=>$id);
    }
    else if($table =='supplies')
    {
      $data['idname'] = 'suppliesID';
      $data['table'] = 'supplies';
      $use = array('suppliesID'=>$id);
    }
    else if($table =='maintenance')
    {
      $data['idname'] = 'maintenanceID';
      $data['table'] = 'maintenance';
      $use = array('maintenanceID'=>$id);
    }
    else if($table =='travel')
    {
      $data['idname'] = 'travelID';
      $data['table'] = 'travel';
      $use = array('travelID'=>$id);
    }
    else if($table =='entertainment')
    {
      $data['idname'] = 'entertainmentID';
      $data['table'] = 'entertainment';
      $use = array('entertainmentID'=>$id);
    }
    else if($table =='training')
    {
      $data['idname'] = 'trainingID';
      $data['table'] = 'training';
      $use = array('trainingID'=>$id);
    }
    else if($table =='utilities')
    {
      $data['idname'] = 'UtilitiesID';
      $data['table'] = 'utilities';
      $use = array('UtilitiesID'=>$id);
    }
		else if($table =='depreciation')
		{
			$data['idname'] = 'depreciationID';
			$data['table'] = 'depreciation';
			$use = array('depreciationID'=>$id);
		}



    $data['expense'] = $this->Accountant_model->get_one_expense($use, $table);
    $this->load->view('Accountant/header');
    $this->load->view('Accountant/Utilities/sub_menu');
    $this->load->view('Accountant/Utilities/view_one_expense',$data);
  }

  function submit_update_expense()
  {
    $table = $this->input->post('table');
    if($table == 'other_expenses')
          $idname = 'other_expenseID';
    else if($table =='rent')
          $idname = 'rentID';
    else if($table =='insurance')
          $idname = 'insuranceID';
    else if($table =='fees')
          $idname = 'feesID';
    else if($table =='wages')
          $idname = 'wagesID';
    else if($table =='interest')
          $idname = 'interestID';
    else if($table =='supplies')
          $idname = 'suppliesID';
    else if($table =='maintenance')
          $idname = 'maintenanceID';
    else if($table =='travel')
          $idname = 'travelID';
    else if($table =='entertainment')
          $idname = 'entertainmentID';
    else if($table =='training')
          $idname = 'trainingID';
    else if($table =='utilities')
          $idname = 'UtilitiesID';

    $id = $this->input->post('id');
    if($this->input->post('filecheckbox') == 1)
    {
      $config['upload_path']          = './uploads/';
      $config['allowed_types']        = 'doc|docx|pdf';
      $config['max_size']             = 100;

      $this->load->library('upload', $config);

      if (!$this->upload->do_upload('fileinput'))
      {
        $this->session->set_flashdata('error1','<div class="alert alert-danger">Error with file upload, Please try again</div>');
        redirect(base_url().'Accountant/view_one_expense/'.$table.'/'.$id, 'refresh');
      }
      else
      {
        $upload_data = $this->upload->data();
        $file_name = $upload_data['full_path'];
          if($this->input->post('paidcheckbox') == 1)
          {
            $data = array('date_paid'=>$this->input->post('expensedatepaid'),
                          'other_doc'=>$file_name,
                          'Status'=>1
                         );
          }
          else
          {
            $data = array('other_doc'=>$file_name);
          }
          $this->Accountant_model->submit_update_expense($data,$id,$idname,$table);
      }
    }
    else
    {
        $data = array('date_paid'=>$this->input->post('expensedatepaid'),
                      'Status'=>1
                     );

      $this->Accountant_model->submit_update_expense($data,$id,$idname,$table);
    }
    redirect(base_url().'Accountant/view_one_expense/'.$table.'/'.$id, 'refresh');
  }

  function download_file()
  {
    $this->load->helper('download');

    $id = $this->uri->segment(3);
    $table = $this->uri->segment(4);
    if($table == 'other_expenses')
      $use = array('other_expenseID'=>$id);
    else if($table =='rent')
      $use = array('rentID'=>$id);
    else if($table =='insurance')
      $use = array('insuranceID'=>$id);
    else if($table =='fees')
      $use = array('feesID'=>$id);
    else if($table =='wages')
      $use = array('wagesID'=>$id);
    else if($table =='interest')
      $use = array('interestID'=>$id);
    else if($table =='supplies')
      $use = array('suppliesID'=>$id);
    else if($table =='maintenance')
      $use = array('maintenanceID'=>$id);
    else if($table =='travel')
      $use = array('travelID'=>$id);
    else if($table =='entertainment')
      $use = array('entertainmentID'=>$id);
    else if($table =='training')
      $use = array('trainingID'=>$id);
    else if($table =='utilities')
      $use = array('UtilitiesID'=>$id);
		else if($table =='depreciation')
			$use = array('depreciationID'=>$id);



    $data['expense'] = $this->Accountant_model->get_one_expense($use, $table);
    foreach($data['expense'] as $e)
    {
      force_download($e['other_doc'], NULL);
    }
  }

	function get_fiscal_years_used()
	{
		echo json_encode($this->Accountant_model->get_fiscal_years_used());
	}

  //Reports
  function reports()
  {
		$data['serviceyears'] = $this->Accountant_model->AnnualService();
		$data['purchaseyears'] = $this->Accountant_model->AnnualPurchase();
		$data['inventoryyears'] = $this->Accountant_model->AnnualInventory();
    $data['yearlyrevenue'] = $this->Accountant_model->YearlyRevenue();

    $this->load->view('Accountant/header');
    $this->load->view('Accountant/Reports/sub_menu');
    $this->load->view('Accountant/Reports/view_reports',$data);
  }

	//Services
	function MonthlyService()
	{
		$year = $this->input->post('year');
		echo json_encode($this->Accountant_model->MonthlyService($year));
	}

	function QuarterlyService()
	{
		$year = $this->input->post('year');
		echo json_encode($this->Accountant_model->QuarterlyService($year));
	}

	function SemiService()
	{
		$year = $this->input->post('year');
		echo json_encode($this->Accountant_model->SemiService($year));
	}

	function AnnualService()
	{
		$year = $this->input->post('year');
		echo json_encode($this->Accountant_model->AnnualService());
	}

	//Purchase
	function MonthlyPurchase()
	{
		$year = $this->input->post('year');
		echo json_encode($this->Accountant_model->MonthlyPurchase($year));
	}

	function QuarterlyPurchase()
	{
		$year = $this->input->post('year');
		echo json_encode($this->Accountant_model->QuarterlyPurchase($year));
	}

	function SemiPurchase()
	{
		$year = $this->input->post('year');
		echo json_encode($this->Accountant_model->SemiPurchase($year));
	}

	function AnnualPurchase()
	{
		$year = $this->input->post('year');
		echo json_encode($this->Accountant_model->AnnualPurchase());
	}

	//Expenses
	function YearExpense()
	{
		$table = $this->input->post('table');
		echo json_encode($this->Accountant_model->AnnualExpense($table));
	}

	function MonthlyExpense()
	{
		$table = $this->input->post('table');
		$year = $this->input->post('year');
		echo json_encode($this->Accountant_model->MonthlyExpense($year,$table));
	}

	function QuarterlyExpense()
	{
		$table = $this->input->post('table');
		$year = $this->input->post('year');
		echo json_encode($this->Accountant_model->QuarterlyExpense($year,$table));
	}

	function SemiExpense()
	{
		$table = $this->input->post('table');
		$year = $this->input->post('year');
		echo json_encode($this->Accountant_model->SemiExpense($year,$table));
	}

	function AnnualExpense()
	{
		$table = $this->input->post('table');
		echo json_encode($this->Accountant_model->AnnualExpense($table));
	}

  //Inventory
	function MonthlyInventory()
	{
		$year = $this->input->post('year');
		echo json_encode($this->Accountant_model->MonthlyInventory($year));
	}

	function QuarterlyInventory()
	{
		$year = $this->input->post('year');
		echo json_encode($this->Accountant_model->QuarterlyInventory($year));
	}

	function SemiInventory()
	{
		$year = $this->input->post('year');
		echo json_encode($this->Accountant_model->SemiInventory($year));
	}

	function AnnualInventory()
	{
		$year = $this->input->post('year');
		echo json_encode($this->Accountant_model->AnnualInventory($year));
	}

	//Revenue
	function QuarterlyRevenue()
	{
		$year = $this->input->post('year');
		echo json_encode($this->Accountant_model->QuarterlyRevenue($year));
	}

	function SemiRevenue()
	{
		$year = $this->input->post('year');
		echo json_encode($this->Accountant_model->SemiRevenue($year));
	}

  function MonthlyRevenue()
  {
    $year = $this->input->post('year');
    echo json_encode($this->Accountant_model->MonthlyRevenue($year));
  }

  //Income statement

  function income_statement()
  {

    $this->load->view('Accountant/header');
    $this->load->view('Accountant/Reports/sub_menu');
    $this->load->view('Accountant/Reports/income_statement');
  }

  function submit_get_income_statement()
  {
    $year = $this->input->post('yearpicker');
    $duration = $this->input->post('duration');
    $month = $this->input->post('month');
    $data['other_income'] = $this->input->post('other_income');
    $data['interest_expense'] = $this->input->post('interest_expense');
    $totalexpenses = '';

    //statementrevenue
    $data['income'] = $this->Accountant_model->MonthlyIncome($year,$month,$duration);
    //incomeinventorybegin
    $data['begin'] = $this->Accountant_model->MonthlyStatementInventory($year,$month,$duration);
    //incomeinventoryend
    $data['end'] = $this->Accountant_model->MonthlyStatementInventoryEnd($year,$month,$duration);
    $use['expenses'] = array('other_expenses','rent','insurance','fees','wages','interest','supplies','maintenance','travel','entertainment','training','utilities');
    foreach($use['expenses'] as $e)
    {
      $use[$e] = $this->Accountant_model->MonthlyStatementExpenses($year,$month,$e,$duration);
    }

    foreach($use['other_expenses'] as $u)
    {
        $totalexpenses += $u['Total'];
    }
    foreach($use['rent'] as $u)
    {
        $totalexpenses += $u['Total'];
    }
    foreach($use['insurance'] as $u)
    {
        $totalexpenses += $u['Total'];
    }
    foreach($use['fees'] as $u)
    {
        $totalexpenses += $u['Total'];
    }
    foreach($use['wages'] as $u)
    {
        $totalexpenses += $u['Total'];
    }
    foreach($use['interest'] as $u)
    {
        $totalexpenses += $u['Total'];
    }
    foreach($use['supplies'] as $u)
    {
        $totalexpenses += $u['Total'];
    }
    foreach($use['maintenance'] as $u)
    {
        $totalexpenses += $u['Total'];
    }
    foreach($use['travel'] as $u)
    {
        $totalexpenses += $u['Total'];
    }
    foreach($use['entertainment'] as $u)
    {
        $totalexpenses += $u['Total'];
    }
    foreach($use['training'] as $u)
    {
        $totalexpenses += $u['Total'];
    }
    foreach($use['utilities'] as $u)
    {
        $totalexpenses += $u['Total'];
    }
    $data['totalexpense'] = $totalexpenses;

    //echo json_encode($data);


    $this->load->view('Accountant/header');
    $this->load->view('Accountant/Reports/sub_menu');
    $this->load->view('Accountant/Reports/income_statement',$data);

  }

}
