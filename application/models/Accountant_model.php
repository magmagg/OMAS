<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Accountant_model extends CI_Model
{
	function __construct()
	{
    parent::__construct();
  }

  //Customer
  function submit_add_user($data)
  {
    $this->db->insert('customer',$data);
  }

	function get_customers()
	{
		$this->db->select('*');
		$this->db->from('customer');
		$query = $this->db->get();
		return $query->result();
	}

	function delete_one_customer($id)
	{
    $this->db->delete('customer', array('CustomerID' => $id));
	}

	function get_one_customer($id)
	{
		$this->db->select('*');
		$this->db->from('customer');
		$this->db->where('CustomerID',$id);
		$query = $this->db->get();
		return $query->result();
	}

	function submit_edit_one_customer($id, $data)
	{
		$this->db->where('CustomerID',$id);
		$this->db->update('customer',$data);
	}

	function check_customer_email($id, $email)
	{
		$this->db->where('Email', $email);
		if($id) {
				$this->db->where_not_in('CustomerID', $id);
		}
		return $this->db->get('customer')->num_rows();
	}

  //Supplier
  function submit_add_supplier($data)
  {
    $this->db->insert('supplier',$data);
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

	function submit_edit_one_supplier($id,$data)
	{
		$this->db->where('SupplierID',$id);
		$this->db->update('supplier',$data);
	}

	function delete_one_supplier($id)
	{
		$this->db->delete('supplier', array('SupplierID' => $id));
	}

	//Purchase orders
	function insert_purchase_order($data)
	{
		$this->db->insert('purchasing_order',$data);
		return $this->db->insert_id();
	}

	function insert_purchase_order_item($data)
	{
		$this->db->insert('purchasing_order_item',$data);
	}

	function get_purchase_orders_byuser($accountantID)
	{
		$this->db->select('*');
		$this->db->from('purchasing_order');
		$this->db->where('Accountant_UserID',$accountantID);
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

	//Sales invoice
	function get_purchase_order_items()
	{
		$this->db->select('*');
		$this->db->from('purchasing_order_item');
		$query = $this->db->get();
		return $query->result();
	}
}
