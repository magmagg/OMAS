<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Model_mobile extends CI_Model{

        function validatecredential($username,$password)
        {
            $where = "username = '$username' and password = '$password'";
            $this->db->select('*');
            $this->db->from('accountant');
            $this->db->where($where);
            $query = $this->db->get();
            return $query->result_array();

        }   
        

        function supplierName()
        {
            $this->db->select('*');
            $this->db->from('supplier');
            $query = $this->db->get();
            return $query->result_array();
        }

        function customerName()
        {
            $this->db->select('*');
            $this->db->from('customer');
            $query = $this->db->get();
            return $query->result_array();
        }

        function customerDetails($customerID)
        {
            $where = "CustomerID = '$customerID'";
            $this->db->select('*');
            $this->db->from('customer');
            $this->db->where($where);
            $query = $this->db->get();
            return $query->result_array();
        }

       /* function addPO($id,$total,$supplier,$item,$quantity,$price)
        {
              //purchasing_order table
             $purchase_data = array 
             (
                'Accountant_UserID' => $id,
                'Total' => $total,
                'Supplier_SupplierID' => $supplier                
             );

             $this->db->insert('purchasing_order',$purchase_data);
             $insert_id = $this->db->insert_id();

             //purchasing_order_items table
            $item_data = array
            (
                'ItemName' => $item,
                'Quantity' => $quantity,
                'UnitPrice' => $price,
                'PO_ID' => $insert_id
            );

            $this->db->insert('purchasing_order_item', $item_data);

        }*/

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

        function addSv($id,$total,$customer,$item,$quantity,$price)
        {
            $service_data = array 
             (
                'Accountant_UserID' => $id,
                'Total' => $total,
                'Customer_CustomerID' => $customer                
             );

             $this->db->insert('service_invoice',$service_data);
             $insert_id = $this->db->insert_id();

            
            $item_data = array
            (
                'ItemID' => $item,
                'Quantity' => $quantity,
                
                'SO_ID' => $insert_id
            );

            $this->db->insert('service_invoice_item', $item_data);
        }

	}

?>