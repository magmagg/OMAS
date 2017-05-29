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

        function purchase_invoice()
        {   
            $this->db->select("PurchaseID");
            $this->db->where("Status",1);
            return $this->db->get('purchasing_order')->result_array();
        }

        function purchase_items($poId)
        {   
           
             $this->db->where_in("PO_ID",$poId);

            return $this->db->get('purchasing_order_item')->result_array();
        }

        function getPurchaseItemDetails($id)
        {
            $this->db->where('ItemID',$id);
            return $this->db->get('purchasing_order_item')->result_array();
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