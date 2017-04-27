<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Accountant_model extends CI_Model
{
	function __construct()
	{
    parent::__construct();
  }

  function submit_add_user($data)
  {
    $this->db->insert('customer',$data);
  }
}
