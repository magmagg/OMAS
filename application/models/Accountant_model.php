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

	//Service invoice
	function get_purchase_order_items_poid()
	{
		$this->db->select('PO_ID');
		$this->db->from('purchasing_order_item');
		$this->db->distinct();
		$query = $this->db->get();
		return $query->result();
	}

	function get_purchase_order_status($id)
	{
		$this->db->select('PurchaseID,Status');
		$this->db->from('purchasing_order');
		$this->db->where('PurchaseID',$id);

		$query = $this->db->get();
		return $query->result();
	}

	function insert_service_invoice($data)
	{
		$this->db->insert('service_invoice',$data);
		return $this->db->insert_id();
	}

	function insert_service_invoice_item($data)
	{
		$this->db->insert('service_invoice_item',$data);
	}

	function insert_service_invoice_service($data)
	{
		$this->db->insert('service_invoice_service',$data);
	}

	function get_service_invoice_byuser($accountantID)
	{
		$this->db->select('*');
		$this->db->from('service_invoice');
		$this->db->where('Accountant_UserID',$accountantID);
		$query = $this->db->get();
		return $query->result();
	}

	function get_purchase_order_items_byid($id)
	{
		$this->db->select('*');
		$this->db->from('purchasing_order_item');
		$this->db->where('PO_ID',$id);
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

	function get_so_id_quantity($id)
	{
		$this->db->select('*');
		$this->db->from('service_invoice_item');
		$this->db->where('SO_ID',$id);
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

	function get_service_services($id)
	{
		$this->db->select('*');
		$this->db->from('service_invoice_service');
		$this->db->where('SO_ID',$id);
		$query = $this->db->get();
		return $query->result();
	}

	//Utilities
	function submit_make_utilities($data)
	{
		$this->db->insert('utilities',$data);
	}

	function get_all_utilities()
	{
		$this->db->select('*');
		$this->db->from('utilities');
		$query = $this->db->get();
		return $query->result();
	}

	function get_one_utility($id)
	{
		$this->db->select('*');
		$this->db->from('utilities');
		$this->db->where('UtilitiesID',$id);
		$query = $this->db->get();
		return $query->result();
	}

	function submit_update_utility($utilitiesID, $data)
	{
		$this->db->where('UtilitiesID',$utilitiesID);
		$this->db->update('utilities',$data);
	}

	//inventory
	function get_purchase_order_items_w_supp()
	{
		$this->db->select('poi.*, po.*');
		$this->db->from('purchasing_order_item as poi');
		$this->db->join('purchasing_order as po', 'po.PurchaseID = poi.PO_ID');
		$query = $this->db->get();
		return $query->result();
	}

	//Balance sheet
	function insert_balance_table($data)
	{
		$this->db->insert('balance',$data);
		return $this->db->insert_id();
	}

	function insert_assets($data)
	{
		$this->db->insert('assets',$data);
	}

	function insert_liabilities($data)
	{
		$this->db->insert('liabilities',$data);
	}

	function insert_oequity($data)
	{
		$this->db->insert('owners_equity',$data);
	}

	function insert_balancer($data)
	{
		$this->db->insert('balancer',$data);
	}

	function get_balance_ids()
	{
		$this->db->select('*');
		$this->db->from('balance');
		$query = $this->db->get();
		return $query->result();
	}

	function get_assets($id)
	{
		$this->db->select('*');
		$this->db->from('assets');
		$this->db->where('balance_id',$id);
		$query = $this->db->get();
		return $query->result();
	}

	function get_liabilities($id)
	{
		$this->db->select('*');
		$this->db->from('liabilities');
		$this->db->where('balance_id',$id);
		$query = $this->db->get();
		return $query->result();
	}

	function get_oequity($id)
	{
		$this->db->select('*');
		$this->db->from('owners_equity');
		$this->db->where('balance_id',$id);
		$query = $this->db->get();
		return $query->result();
	}

	function get_balancer($id)
	{
		$this->db->select('*');
		$this->db->from('balancer');
		$this->db->where('balance_id',$id);
		$query = $this->db->get();
		return $query->result();
	}

	//OtherExpenses
	function submit_other_expenses($data,$table)
	{
		$this->db->insert($table,$data);
	}

	function get_other_expenses($table)
	{
		$this->db->select('*');
		$this->db->from($table);
		$query = $this->db->get();
		return $query->result();
	}

	function get_one_expense($data, $table)
	{
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where($data);
		$query = $this->db->get();
		return $query->result_array();
	}

	function submit_update_expense($data,$id,$idname,$table)
	{
		$this->db->where($idname,$id);
		$this->db->update($table,$data);
	}

	//Services Reports

	function MonthlyService($year)
	{

			$group = "Month(TransactionDate)";
			$select = "Month(TransactionDate) as month, count(*) as counted";


			$where = "YEAR(TransactionDate) ='".$year."'";


			$this->db->select($select);
			$this->db->from('service_invoice');
			$this->db->where($where);
			$this->db->group_by($group);
			$query = $this->db->get();
			return $query->result_array();

	}

	function QuarterlyService($year)
	{

			$group = "Quarter(TransactionDate)";
			$select = "Quarter(TransactionDate) as Quarter, count(*) as counted";


			$where = "YEAR(TransactionDate) ='".$year."'";


			$this->db->select($select);
			$this->db->from('service_invoice');
			$this->db->where($where);
			$this->db->group_by($group);
			$query = $this->db->get();
			return $query->result_array();

	}

	function SemiService($year)
	{

			$group = "Month(TransactionDate)>6";
			$select = "Month(TransactionDate)>6 as Semi, count(*) as counted";


			$where = "YEAR(TransactionDate) ='".$year."'";

			$this->db->select($select);
			$this->db->from('service_invoice');
			$this->db->where($where);
			$this->db->group_by($group);
			$query = $this->db->get();
			return $query->result_array();

	}

	function AnnualService()
	{

			$group = "Year(TransactionDate)";
			$select = "Year(TransactionDate) as Annual, count(*) as counted";

			$this->db->select($select);
			$this->db->from('service_invoice');
			$this->db->group_by($group);
			$query = $this->db->get();
			return $query->result();

	}

	//Purchase Reports

	function MonthlyPurchase($year)
	{

			$group = "Month(TransactionDate)";
			$select = "Month(TransactionDate) as month, count(*) as counted";


			$where = "YEAR(TransactionDate) ='".$year."'";


			$this->db->select($select);
			$this->db->from('purchasing_order');
			$this->db->where($where);
			$this->db->group_by($group);
			$query = $this->db->get();
			return $query->result_array();

	}

	function QuarterlyPurchase($year)
	{

			$group = "Quarter(TransactionDate)";
			$select = "Quarter(TransactionDate) as Quarter, count(*) as counted";


			$where = "YEAR(TransactionDate) ='".$year."'";


			$this->db->select($select);
			$this->db->from('purchasing_order');
			$this->db->where($where);
			$this->db->group_by($group);
			$query = $this->db->get();
			return $query->result_array();

	}

	function SemiPurchase($year)
	{

			$group = "Month(TransactionDate)>6";
			$select = "Month(TransactionDate)>6 as Semi, count(*) as counted";


			$where = "YEAR(TransactionDate) ='".$year."'";

			$this->db->select($select);
			$this->db->from('purchasing_order');
			$this->db->where($where);
			$this->db->group_by($group);
			$query = $this->db->get();
			return $query->result_array();

	}

	function AnnualPurchase()
	{

			$group = "Year(TransactionDate)";
			$select = "Year(TransactionDate) as Annual, count(*) as counted";

			$this->db->select($select);
			$this->db->from('purchasing_order');
			$this->db->group_by($group);
			$query = $this->db->get();
			return $query->result();

	}

	//Expense Reports
	function MonthlyExpense($year, $table)
	{

			$group = "Month(date_created)";
			$select = "Month(date_created) as month, count(*) as counted";


			$where = "YEAR(date_created) ='".$year."'";


			$this->db->select($select);
			$this->db->from($table);
			$this->db->where($where);
			$this->db->group_by($group);
			$query = $this->db->get();
			return $query->result_array();

	}

	function QuarterlyExpense($year, $table)
	{

			$group = "Quarter(date_created)";
			$select = "Quarter(date_created) as Quarter, count(*) as counted";


			$where = "YEAR(date_created) ='".$year."'";


			$this->db->select($select);
			$this->db->from($table);
			$this->db->where($where);
			$this->db->group_by($group);
			$query = $this->db->get();
			return $query->result_array();

	}

	function SemiExpense($year, $table)
	{

			$group = "Month(date_created)>6";
			$select = "Month(date_created)>6 as Semi, count(*) as counted";


			$where = "YEAR(date_created) ='".$year."'";

			$this->db->select($select);
			$this->db->from($table);
			$this->db->where($where);
			$this->db->group_by($group);
			$query = $this->db->get();
			return $query->result_array();

	}

	function AnnualExpense($table)
	{

			$group = "Year(date_created)";
			$select = "Year(date_created) as Annual, count(*) as counted";

			$this->db->select($select);
			$this->db->from($table);
			$this->db->group_by($group);
			$query = $this->db->get();
			return $query->result_array();

	}

	//Inventory Reports

	function MonthlyInventory($year)
	{

			$group = "Month(service_invoice.TransactionDate)";
			$select = "sum(service_invoice_item.Quantity) as Quantity,  Month(service_invoice.TransactionDate) as month";
			$from = "service_invoice_item, service_invoice";


			$where = "YEAR(TransactionDate) ='".$year."'";

			$where = "service_invoice_item.SO_ID = service_invoice.ServiceID and
YEAR(service_invoice.TransactionDate) ='".$year."'";


			$this->db->select($select);
			$this->db->from($from);
			$this->db->where($where);
			$this->db->group_by($group);
			$query = $this->db->get();
			return $query->result_array();

	}

	function QuarterlyInventory($year)
	{

			$group = "Quarter(service_invoice.TransactionDate)";
			$select = "sum(service_invoice_item.Quantity) as Quantity,  Quarter(service_invoice.TransactionDate) as month";
			$from = "service_invoice_item, service_invoice";


			$where = "YEAR(TransactionDate) ='".$year."'";

			$where = "service_invoice_item.SO_ID = service_invoice.ServiceID and
YEAR(service_invoice.TransactionDate) ='".$year."'";


			$this->db->select($select);
			$this->db->from($from);
			$this->db->where($where);
			$this->db->group_by($group);
			$query = $this->db->get();
			return $query->result_array();

	}

	function SemiInventory($year)
	{

			$group = "Month(service_invoice.TransactionDate)>6";
			$select = "sum(service_invoice_item.Quantity) as Quantity,  Month(service_invoice.TransactionDate)>6 as month";
			$from = "service_invoice_item, service_invoice";


			$where = "service_invoice_item.SO_ID = service_invoice.ServiceID and
YEAR(service_invoice.TransactionDate) ='".$year."'";


			$this->db->select($select);
			$this->db->from($from);
			$this->db->where($where);
			$this->db->group_by($group);
			$query = $this->db->get();
			return $query->result_array();

	}

	function AnnualInventory()
	{

			$group = "Year(service_invoice.TransactionDate)";
			$select = "sum(service_invoice_item.Quantity) as Quantity,  Year(service_invoice.TransactionDate) as year";
			$from = "service_invoice_item, service_invoice";


			$where = "service_invoice_item.SO_ID = service_invoice.ServiceID";


			$this->db->select($select);
			$this->db->from($from);
			$this->db->where($where);
			$this->db->group_by($group);
			$query = $this->db->get();
			return $query->result();

	}

	//Revenue
	function QuarterlyRevenue($year)
	{

			$group = "Quarter(TransactionDate)";
			$select = "Quarter(TransactionDate) as Quarter, sum(total) as sum";


			$where = "YEAR(TransactionDate) ='".$year."'";


			$this->db->select($select);
			$this->db->from('service_invoice');
			$this->db->where($where);
			$this->db->group_by($group);
			$query = $this->db->get();
			return $query->result_array();

	}

	function SemiRevenue($year)
	{

			$group = "Month(TransactionDate)>6";
			$select = "Month(TransactionDate)>6 as Semi, sum(total) as sum";


			$where = "YEAR(TransactionDate) ='".$year."'";

			$this->db->select($select);
			$this->db->from('service_invoice');
			$this->db->where($where);
			$this->db->group_by($group);
			$query = $this->db->get();
			return $query->result_array();

	}


}
