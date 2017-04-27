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

  //Supplier
  function submit_add_supplier($data)
  {
    $this->db->insert('supplier',$data);
  }
}
