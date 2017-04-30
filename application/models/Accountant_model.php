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

	function check_user_email($id, $email)
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
}
