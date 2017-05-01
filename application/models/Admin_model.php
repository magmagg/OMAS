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

}
