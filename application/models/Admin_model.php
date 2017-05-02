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
		$this->db->select('username,email,create_time,UserID');
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

}
