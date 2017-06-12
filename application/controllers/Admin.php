<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{
	function __construct()
	{
    parent::__construct();
    $this->load->model('Admin_model');
		$this->load->model('Accountant_model');
  }

  function index()
  {
		$this->load->view('Admin/header1');
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
				$this->load->view('Admin/Accountants/sub_menu');
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
		$this->load->view('Admin/Accountants/sub_menu');
		$this->load->view('Admin/Accountants/view_accountants',$data);
	}

	//PurchaseOrder processing
	function view_purchase_orders()
	{
		$data['purchaseorders'] = $this->Admin_model->get_purchase_orders();
		$data['suppliers'] = $this->Admin_model->get_suppliers();
		$data['accountants'] = $this->Admin_model->get_accountants();
		$this->load->view('Admin/header');
		$this->load->view('Admin/PurchaseOrder/view_purchase_orders',$data);
	}

	function view_one_purchase_order()
	{
		$id = $this->uri->segment(3);
		$data['purchaseorder'] = $this->Admin_model->get_purchase_orders_byuser_items($id);
		$data['supplier'] = $this->Admin_model->get_one_supplier($data['purchaseorder'][0]->Supplier_SupplierID);
		$data['POID'] = $data['purchaseorder'][0]->PurchaseID;

		$this->load->view('Admin/header');
		$this->load->view('Admin/PurchaseOrder/view_purchase_order_one',$data);
	}

	function accept_one_purchase_order()
	{
		$id = $this->input->post('purchaseorderid');

		$data = array('Status'=>1);

		$this->Admin_model->process_purchase_order($id,$data);
		$this->session->set_flashdata('success','<div class="alert alert-success">Purchase order accepted!</div>');
	}

	function reject_one_purchase_order()
	{
		$id = $this->input->post('purchaseorderid');

		$data = array('Status'=>2);

		$this->Admin_model->process_purchase_order($id,$data);
		$this->session->set_flashdata('success','<div class="alert alert-danger">Purchase order Rejected!</div>');
	}

	//Service Invoice processing
	function view_service_invoices()
	{
		$data['serviceinvoices'] = $this->Admin_model->get_service_invoices();
		$data['customers'] = $this->Admin_model->get_customers();
		$data['accountants'] = $this->Admin_model->get_accountants();
		$this->load->view('Admin/header');
		$this->load->view('Admin/ServiceInvoice/view_service_invoices',$data);
	}

	function view_one_service_invoice()
	{
		$id = $this->uri->segment(3);
		$use['items'] = $this->Admin_model->get_so_id_quantity($id);
		$data['serviceinvoice'] = $this->Admin_model->get_service_invoice_byuser_items($id);
		$data['items']  = array();
		foreach($use['items'] as $p)
		{
				$use['allitems'] = $this->Admin_model->get_purchase_order_items();

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
		$data['customer'] = $this->Admin_model->get_one_customer($data['serviceinvoice'][0]->Customer_CustomerID);
		$data['SOID'] = $data['serviceinvoice'][0]->ServiceID;

		$this->load->view('Admin/header');
		$this->load->view('Admin/ServiceInvoice/view_service_invoice_one',$data);
	}

	function accept_one_service_invoice()
	{
		$id = $this->input->post('serviceinvoiceid');

		$data = array('Status'=>1);

		$this->Admin_model->process_service_invoice($id,$data);
		$this->session->set_flashdata('success','<div class="alert alert-success">Service invoice accepted!</div>');
	}

	function reject_one_service_invoice()
	{
		$id = $this->input->post('serviceinvoiceid');

		$data = array('Status'=>2);

		$this->Admin_model->process_service_invoice($id,$data);
		$this->session->set_flashdata('success','<div class="alert alert-danger">Service invoice Rejected!</div>');
	}

}
