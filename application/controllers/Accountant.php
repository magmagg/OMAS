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
				redirect(base_url().'Accountant/add_supplier', 'refresh');

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
		$this->session->set_flashdata('success','<div class="alert alert-success">Data inserted!!</div>');
		redirect(base_url().'Accountant/view_purchase_orders');
	}

	function view_purchase_orders()
	{
		$data['purchaseorders'] = $this->Accountant_model->get_purchase_orders_byuser($this->session->userdata('AccountantID'));
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
                  'Administrator_AdminID'=>1);
    $ServiceID = $this->Accountant_model->insert_service_invoice($data);

    foreach($use['items'] as $key=>$value)
    {
      $data = array('POI_ItemID'=>$value,
                    'Quantity'=>$use['quantity'][$key],
                    'SO_ID'=>$ServiceID);
      $this->Accountant_model->insert_service_invoice_item($data);
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
    $data['serviceinvoices'] = $this->Accountant_model->get_service_invoice_byuser($this->session->userdata('AccountantID'));
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

    $assetstotal = '';
    $liabilitiestotal = '';
    $oequitytotal = '';

    foreach($use['assetname'] as $key=>$value)
    {
      $data = array('balance_id'=>$balanceid,
                    'asset_name'=>$value,
                    'asset_value'=>$use['assetvalue'][$key],
                    );
      $assetstotal += $use['assetvalue'][$key];
      $this->Accountant_model->insert_assets($data);
    }

    foreach($use['liabilityname'] as $key=>$value)
    {
      $data = array('balance_id'=>$balanceid,
                    'liability_name'=>$value,
                    'liability_value'=>$use['liabilityvalue'][$key],
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

}
