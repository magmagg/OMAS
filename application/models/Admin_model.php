<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model
{
	function __construct()
	{
    parent::__construct();
  }

	//accountant
	function submit_add_accountant($data)
	{
		$this->db->insert('accountant',$data);
	}

	function get_accountants()
	{
		$this->db->select('username,email,create_time,UserID,Status');
		$this->db->from('accountant');
		$query = $this->db->get();
		return $query->result();
	}

	//Purchaseorder processing
	function get_purchase_orders()
	{
		$this->db->select('*');
		$this->db->from('purchasing_order');
		$query = $this->db->get();
		return $query->result();
	}

	function get_purchase_orders_byuser_items($POID)
	{
		$this->db->select('*');
		$this->db->from('purchasing_order as po');
		$this->db->join('purchasing_order_item as poi', 'po.PurchaseID = poi.PO_ID');
		$this->db->where('po.PurchaseID',$POID);
		$query = $this->db->get();
		return $query->result();
	}

	function get_suppliers()
	{
		$this->db->select('*');
		$this->db->from('supplier');
		$query = $this->db->get();
		return $query->result();
	}

	function get_one_supplier($id)
	{
		$this->db->select('*');
		$this->db->from('supplier');
		$this->db->where('SupplierID',$id);
		$query = $this->db->get();
		return $query->result();
	}

	function process_purchase_order($id,$data)
	{
		$this->db->where('PurchaseID',$id);
		$this->db->update('purchasing_order',$data);
	}

	//ServiceInvoice processing
	function get_service_invoices()
	{
		$this->db->select('*');
		$this->db->from('service_invoice');
		$query = $this->db->get();
		return $query->result();
	}

	function get_customers()
	{
		$this->db->select('*');
		$this->db->from('customer');
		$query = $this->db->get();
		return $query->result();
	}

	function get_so_id_quantity($id)
	{
		$this->db->select('*');
		$this->db->from('service_invoice_item');
		$this->db->where('SO_ID',$id);
		$query = $this->db->get();
		return $query->result();
	}

	function get_service_invoice_byuser_items($SOID)
	{
		$this->db->select('*');
		$this->db->from('service_invoice');
		$this->db->where('ServiceID',$SOID);
		$query = $this->db->get();
		return $query->result();
	}

	function get_purchase_order_items()
	{
		$this->db->select('*');
		$this->db->from('purchasing_order_item');
		$query = $this->db->get();
		return $query->result();
	}

	function get_one_customer($id)
	{
		$this->db->select('*');
		$this->db->from('customer');
		$this->db->where('CustomerID',$id);
		$query = $this->db->get();
		return $query->result();
	}

	function process_service_invoice($id,$data)
	{
		$this->db->where('ServiceID',$id);
		$this->db->update('service_invoice',$data);
	}

	function activate_user($id,$data)
	{
		$this->db->where('UserID',$id);
		$this->db->update('accountant',$data);
	}

	function get_accountant_details($username)
	{
		$this ->db->select('*');
		$this ->db->from('accountant');
		$this->db->where('UserID', $username);
		$query = $this->db->get();
		return $query->result();
	}

	function submit_edit_accountant($data,$id)
	{
		$this->db->where('UserID',$id);
		$this->db->update('accountant',$data);
	}


}
