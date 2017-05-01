<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model
{
	function __construct()
	{
    parent::__construct();
  }

	function check_if_admin($username, $password)
	{
		$this ->db->select('AdminID');
		$this ->db->from('administrator');
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		$query = $this->db->get();
		foreach($query->result() as $row)
		{
			return $row->AdminID;
		}
	}

	function get_admin_details($adminID)
	{
		$this ->db->select('*');
		$this ->db->from('administrator');
		$this->db->where('AdminID', $adminID);
		$query = $this->db->get();
		return $query->result();
	}

	function check_if_accountant($username,$password)
	{
		$this ->db->select('UserID');
		$this ->db->from('accountant');
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		$query = $this->db->get();
		foreach($query->result() as $row)
		{
			return $row->UserID;
		}
	}

	function get_accountant_details($username)
	{
		$this ->db->select('*');
		$this ->db->from('accountant');
		$this->db->where('Username', $username);
		$query = $this->db->get();
		return $query->result();
	}
}
