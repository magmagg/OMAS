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

        function stocksList()
        {
            $this->db->select('*');
            $this->db->from('purchasing_order_item');
            $query = $this->db->get();
            return $query->result_array();
        }

        function getPurchasingItemsById($id)
        {
            $this->db->select('*');
            $this->db->from('purchasing_order_item');
            $this->db->where('ItemID',$id);
            $query = $this->db->get();
            return $query->result_array();
        }

        function soldList()
        {
            $where = "service_invoice_item.POI_ItemID = purchasing_order_item.ItemID ";

            $group = "purchasing_order_item.ItemName";

            $this->db->select('purchasing_order_item.ItemName AS itemName, purchasing_order_item.ItemDesc AS itemDesc, purchasing_order_item.UnitPrice AS itemPrice, sum(service_invoice_item.Quantity) AS Quantity ');
            $this->db->from('purchasing_order_item,service_invoice_item ');
            $this->db->where($where);
            $this->db->group_by($group);
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

    
        function supplierDetails($id)
        {
            $where = "SupplierID = '$id'";
            $this->db->select('*');
            $this->db->from('supplier');
            $this->db->where($where);
            $query = $this->db->get();
            return $query->result_array();
        }

        function purchaseOrderDetails($id)
        {
            $where = "PurchaseID = '$id'";
            $this->db->select('*');
            $this->db->from('purchasing_order');
            $this->db->where($where);
            $query = $this->db->get();
            return $query->result_array();
        }

        function userInfo($id)
        {
            $where = "UserID = '$id'";
            $this->db->select('*');
            $this->db->from('accountant');
            $this->db->where($where);
            $query = $this->db->get();
            return $query->result_array();
        }

        function getInvoiceItems($ids,$SO_ID)
        {
            $this->db->select('service_invoice_item.ItemID,service_invoice_item.Quantity,UnitPrice,ItemName,POI_ItemID,SO_ID');
            $this->db->from('service_invoice_item');
            $this->db->where('SO_ID',$SO_ID);
            $this->db->where_in('service_invoice_item.POI_ItemID',$ids);
            $this->db->join('purchasing_order_item', 'purchasing_order_item.ItemID = service_invoice_item.POI_ItemID');
        //$this->db->join('department', 'department.dept_id = admin.dept_grp');
        //$this->db->order_by("lname", "asc");
        //$this->db->limit($num,$start);

      /*  $this->db->select('purchasing_order_item.ItemID,service_invoice_item.Quantity,UnitPrice,ItemName,SO_ID');
        $this->db->from('purchasing_order_item');
        $this->db->where_in('purchasing_order_item.ItemID',$ids);
        $this->db->join('service_invoice_item', 'service_invoice_item.POI_ItemID = purchasing_order_item.ItemID');*/

        $query = $this->db->get();
        return $query->result();    
        }

        function getInvoiceItemsWeb($SO_ID)
        {
            $this->db->select('service_invoice_item.ItemID,service_invoice_item.Quantity,UnitPrice,ItemName,POI_ItemID,SO_ID');
            $this->db->from('service_invoice_item');
            $this->db->where('SO_ID',$SO_ID);
            //$this->db->where_in('service_invoice_item.POI_ItemID',$ids);
            $this->db->join('purchasing_order_item', 'purchasing_order_item.ItemID = service_invoice_item.POI_ItemID');

             $query = $this->db->get();
            return $query->result(); 
        }

        function getInvoiceServiceWeb($SO_ID)
        {
            $this->db->where_in("SO_ID",$SO_ID);
            return $this->db->get('service_invoice_service')->result();
        }

        
         function getPOItemsWeb($PurchaseID)
        {
            $this->db->where_in("PO_ID",$PurchaseID);
            return $this->db->get('purchasing_order_item')->result();
        }

        function serviceInvoiceDetails($id)
        {
            $where = "ServiceID = '$id'";
            $this->db->select('*');
            $this->db->from('service_invoice');
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

        function utilitiesList()
        {
            $this->db->select('*');
            $this->db->from('utilities');
            $query = $this->db->get();
            return $query->result_array();
        }

        function addPO($id,$total,$supplier,$item,$quantity,$price)
        {
              //purchasing_order table
             $purchase_data = array
             (
                'Accountant_UserID' => $id,
                'Total' => $total,
                'Supplier_SupplierID' => $supplier
             );
        }

        function subtractQuantities($ServiceID,$quantity,$id, $stock)
        {
            (int)$new_stock = (int)$stock-(int)$quantity;
            $this->db->where('ItemID',$id);
            $this->db->update('purchasing_order_item',array('Quantity'=>$new_stock));

        }

        function getNextInvoiceNum()
        {
            return $this->db->select('*')->order_by('ServiceID',"desc")->limit(1)->get('service_invoice')->result_array();
        }

         function getNextPurchaseNum()
        {
            return $this->db->select('*')->order_by('PurchaseID',"desc")->limit(1)->get('purchasing_order')->result_array();
        }


        function purchase_items($poId,$itemID)
        {   
           
            $this->db->where_in("PO_ID",$poId);
            $this->db->where_not_in("ItemID ",$itemID);
            $this->db->where('Quantity != ',0);
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

        function addUtils($name,$desc,$price,$date,$user)
        {
            $util_data = array
            (
                'utility_name' => $name,
                'utility_desc' => $desc,
                'utility_price' => $price,
                'date_paid' => $date,
                'created_by' => $user
            );

            $this->db->insert('utilities', $util_data);
        }

        function balanceSheet()
        {
            $this->db->select('*');
            $this->db->from('balance');
            $query = $this->db->get();
            return $query->result_array();
        }

        function balanceTotal($balanceID)
        {
            $where = "balance_id = '$balanceID'";
            $this->db->select('*');
            $this->db->from('balancer');
            $this->db->where($where);
            $query = $this->db->get();
            return $query->result_array();
        }

        function assetTotal($balanceID)
        {
            $where = "balance_id = '$balanceID' and asset_current = 0";
            $this->db->select('*');
            $this->db->from('assets');
            $this->db->where($where);
            $query = $this->db->get();
            return $query->result_array();
        }

        function assetCurr($balanceID)
        {
            $where = "balance_id = '$balanceID' and asset_current = 1";
            $this->db->select('*');
            $this->db->from('assets');
            $this->db->where($where);
            $query = $this->db->get();
            return $query->result_array();
        }

        function assetNonCurr($balanceID)
        {
            $where = "balance_id = '$balanceID' and asset_current = 2";
            $this->db->select('*');
            $this->db->from('assets');
            $this->db->where($where);
            $query = $this->db->get();
            return $query->result_array();
        }

        function liabilitiesTotal($balanceID)
        {
            $where = "balance_id = '$balanceID' and liability_current = 0";
            $this->db->select('*');
            $this->db->from('liabilities');
            $this->db->where($where);
            $query = $this->db->get();
            return $query->result_array();
        }

        function liabilitiesCurrent($balanceID)
        {
            $where = "balance_id = '$balanceID' and liability_current = 1";
            $this->db->select('*');
            $this->db->from('liabilities');
            $this->db->where($where);
            $query = $this->db->get();
            return $query->result_array();
        }

        function liabilitiesNonCurrent($balanceID)
        {
            $where = "balance_id = '$balanceID' and liability_current = 2";
            $this->db->select('*');
            $this->db->from('liabilities');
            $this->db->where($where);
            $query = $this->db->get();
            return $query->result_array();
        }

        function ownersTotal($balanceID)
        {
            $where = "balance_id = '$balanceID'";
            $this->db->select('*');
            $this->db->from('owners_equity');
            $this->db->where($where);
            $query = $this->db->get();
            return $query->result_array();
        }

        function expenseET()
        {
            $this->db->select('*');
            $this->db->from('entertainment');
            $query = $this->db->get();
            return $query->result_array();
        }

        function expenseFees()
        {
            $this->db->select('*');
            $this->db->from('fees');
            $query = $this->db->get();
            return $query->result_array();
        }

        function expenseInsurance()
        {
            $this->db->select('*');
            $this->db->from('insurance');
            $query = $this->db->get();
            return $query->result_array();
        }

        function expenseInterest()
        {
            $this->db->select('*');
            $this->db->from('interest');
            $query = $this->db->get();
            return $query->result_array();
        }

        function expenseMaintenance()
        {
            $this->db->select('*');
            $this->db->from('maintenance');
            $query = $this->db->get();
            return $query->result_array();
        }

        function expenseOthers()
        {
            $this->db->select('*');
            $this->db->from('other_expenses');
            $query = $this->db->get();
            return $query->result_array();
        }

        function expenseRent()
        {
            $this->db->select('*');
            $this->db->from('rent');
            $query = $this->db->get();
            return $query->result_array();
        }

        function expenseSupplies()
        {
            $this->db->select('*');
            $this->db->from('supplies');
            $query = $this->db->get();
            return $query->result_array();
        }

        function expenseTraining()
        {
            $this->db->select('*');
            $this->db->from('training');
            $query = $this->db->get();
            return $query->result_array();
        }

        function expenseTravel()
        {
            $this->db->select('*');
            $this->db->from('travel');
            $query = $this->db->get();
            return $query->result_array();
        }

        function expenseWages()
        {
            $this->db->select('count(*) as count');
            $this->db->from('wages');
            $query = $this->db->get();
            return $query->result_array();
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

        function AnnualService($year)
        {

            $group = "Year(TransactionDate)";
            $select = "Year(TransactionDate) as Annual, count(*) as counted";

            $this->db->select($select);
            $this->db->from('service_invoice');
            $this->db->group_by($group);
            $query = $this->db->get();
            return $query->result_array();

        }

        //Services Rendered

        function MonthlyServices($year)
        {

            $group = "Month(service_invoice.TransactionDate)";

            $select = "sum(service_invoice_service.Quantity) as counted, MONTH(service_invoice.TransactionDate) as month";

            $from = "service_invoice_service, service_invoice";

            $where = "service_invoice_service.SO_ID = service_invoice.ServiceID and
YEAR(service_invoice.TransactionDate) ='".$year."'";


            $this->db->select($select);
            $this->db->from($from);
            $this->db->where($where);
            $this->db->group_by($group);
            $query = $this->db->get();
            return $query->result_array();

        }

        function QuarterlyServices($year)
        {

            $group = "Quarter(service_invoice.TransactionDate)";

            $select = "sum(service_invoice_service.Quantity) as counted, Quarter(service_invoice.TransactionDate) as Quarter";
            
            $from = "service_invoice_service, service_invoice";

            $where = "service_invoice_service.SO_ID = service_invoice.ServiceID and
YEAR(service_invoice.TransactionDate) ='".$year."'";


            $this->db->select($select);
            $this->db->from($from);
            $this->db->where($where);
            $this->db->group_by($group);
            $query = $this->db->get();
            return $query->result_array();

        }

        function SemiServices($year)
        {

            $group = "MONTH(service_invoice.TransactionDate)>6";

            $select = "sum(service_invoice_service.Quantity) as counted, MONTH(service_invoice.TransactionDate)>6 as month";
            
            $from = "service_invoice_service, service_invoice";

            $where = "service_invoice_service.SO_ID = service_invoice.ServiceID and
YEAR(service_invoice.TransactionDate) ='".$year."'";


            $this->db->select($select);
            $this->db->from($from);
            $this->db->where($where);
            $this->db->group_by($group);
            $query = $this->db->get();
            return $query->result_array();

        }

        function AnnualServices($year)
        {

            $group = "Year(service_invoice.TransactionDate)";
            $select = "sum(service_invoice_service.Quantity) as counted,  Year(service_invoice.TransactionDate) as Annual";
            $from = "service_invoice_service, service_invoice";


            $where = "service_invoice_service.SO_ID = service_invoice.ServiceID";


            $this->db->select($select);
            $this->db->from($from);
            $this->db->where($where);
            $this->db->group_by($group);
            $query = $this->db->get();
            return $query->result_array();

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

        function AnnualPurchase($year)
        {

            $group = "Year(TransactionDate)";
            $select = "Year(TransactionDate) as Annual, count(*) as counted";

            $this->db->select($select);
            $this->db->from('purchasing_order');
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
YEAR(service_invoice.TransactionDate) = 2017";


            $this->db->select($select);
            $this->db->from($from);
            $this->db->where($where);
            $this->db->group_by($group);
            $query = $this->db->get();
            return $query->result_array();

        }

        function AnnualInventory($year)
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
            return $query->result_array();

        }

        //Expense Reports

        function MonthlyExpense($year,$expense)
        {

            $group = "Month(date_created)";
            $select = "Month(date_created) as month, sum(value) as counted";


            $where = "YEAR(date_created) ='".$year."'";
        

            $this->db->select($select);
            $this->db->from($expense);
            $this->db->where($where);
            $this->db->group_by($group);
            $query = $this->db->get();
            return $query->result_array();

        }

        function QuarterlyExpense($year,$expense)
        {

            $group = "Quarter(date_created)";
            $select = "Quarter(date_created) as month, sum(value) as counted";


            $where = "YEAR(date_created) ='".$year."'";
        

            $this->db->select($select);
            $this->db->from($expense);
            $this->db->where($where);
            $this->db->group_by($group);
            $query = $this->db->get();
            return $query->result_array();

        }

        function SemiExpense($year,$expense)
        {

            $group = "Month(date_created)>6";
            $select = "Month(date_created)>6 as month, sum(value) as counted";


            $where = "YEAR(date_created) ='".$year."'";
        

            $this->db->select($select);
            $this->db->from($expense);
            $this->db->where($where);
            $this->db->group_by($group);
            $query = $this->db->get();
            return $query->result_array();

        }

        function AnnualExpense($year,$expense)
        {

            $group = "Year(date_created)";
            $select = "Year(date_created) as year, sum(value) as counted";

            $this->db->select($select);
            $this->db->from($expense);
            $this->db->group_by($group);
            $query = $this->db->get();
            return $query->result_array();

        }

        //Revenue Reports

        function MonthlyRevenue($year)
        {

            $group = "MONTH(TransactionDate)";
            $select = "sum(total) as total, MONTH(TransactionDate) as month";


            $where = "YEAR(TransactionDate) ='".$year."'";
        

            $this->db->select($select);
            $this->db->from('service_invoice');
            $this->db->where($where);
            $this->db->group_by($group);
            $query = $this->db->get();
            return $query->result_array();

        }

        function QuarterlyRevenue($year)
        {

            $group = "Quarter(TransactionDate)";
            $select = "sum(total) as total, Quarter(TransactionDate) quarter";


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
            $select = "Month(TransactionDate)>6 as month, sum(total) as total";


            $where = "YEAR(TransactionDate) ='".$year."'";
        

            $this->db->select($select);
            $this->db->from('service_invoice');
            $this->db->where($where);
            $this->db->group_by($group);
            $query = $this->db->get();
            return $query->result_array();

        }

        function YearlyRevenue()
        {

            $group = "Year(TransactionDate)";
            $select = "Year(TransactionDate) as Annual, sum(total) as counted";

            $this->db->select($select);
            $this->db->from('service_invoice');
            $this->db->group_by($group);
            $query = $this->db->get();
            return $query->result_array();

        }

        //INCOME STATEMENT

        function MonthlyIncome($year,$month,$duration)
        {

            $select = "sum(total) as total, MONTH(TransactionDate) as month";

            if($duration == "monthly")
            {

                $where = "MONTH(TransactionDate) ='".$month."' AND YEAR(TransactionDate) = '".$year."'";

            }else if($duration == "quarterly")
            {

                $where = "Quarter(TransactionDate) ='".$month."' AND YEAR(TransactionDate) = '".$year."'";

            }else if($duration == "semi")
            {
                /*
                    Pag semi annual, and value dapat ng $month is 1 or 2
                    representing 1st and 2nd half.

                */

                if($month == "1")
                {
                    $where = "MONTH(TransactionDate) BETWEEN 1 AND 6
                                and YEAR(TransactionDate) ='".$year."'";
                }else
                {
                    $where = "MONTH(TransactionDate) BETWEEN 7 AND 12
                                and YEAR(TransactionDate) ='".$year."'";
                }

            }else if($duration == "annual")
            {
                $where = "YEAR(TransactionDate) ='".$year."'";
            }
        
        

            $this->db->select('sum(Total) as Total');
            $this->db->from('service_invoice');
            $this->db->where($where);
            $query = $this->db->get();
            return $query->result_array();

        }

        function MonthlyStatementInventory($year,$month,$duration)
        {

            $select = "sum(total) as total, MONTH(TransactionDate) as month";


            if($duration == "monthly")
            {

                $where = "MONTH(TransactionDate) ='".$month."' AND YEAR(TransactionDate) = '".$year."'";

            }else if($duration == "quarterly")
            {

                $where = "Quarter(TransactionDate) ='".$month."' AND YEAR(TransactionDate) = '".$year."'";

            }else if($duration == "semi")
            {
                /*
                    Pag semi annual, and value dapat ng $month is 1 or 2
                    representing 1st and 2nd half.

                */

                if($month == "1")
                {
                    $where = "MONTH(TransactionDate) BETWEEN 1 AND 6
                                and YEAR(TransactionDate) ='".$year."'";
                }else
                {
                    $where = "MONTH(TransactionDate) BETWEEN 7 AND 12
                                and YEAR(TransactionDate) ='".$year."'";
                }

            }else if($duration == "annual")
            {
                $where = "YEAR(TransactionDate) ='".$year."'";
            }
        

            $this->db->select('sum(Total) as Total');
            $this->db->from('purchasing_order');
            $this->db->where($where);
            $query = $this->db->get();
            return $query->result_array();

        }

        function MonthlyStatementInventoryEnd($year,$month,$duration)
        {

            $select = "sum(total) as total, MONTH(TransactionDate) as month";


            if($duration == "monthly")
            {

                $where = "MONTH(TransactionDate) ='".$month."' AND YEAR(TransactionDate) = '".$year."'";

            }else if($duration == "quarterly")
            {

                $where = "Quarter(TransactionDate) ='".$month."' AND YEAR(TransactionDate) = '".$year."'";

            }else if($duration == "semi")
            {
                /*
                    Pag semi annual, and value dapat ng $month is 1 or 2
                    representing 1st and 2nd half.

                */

                if($month == "1")
                {
                    $where = "MONTH(TransactionDate) BETWEEN 1 AND 6
                                and YEAR(TransactionDate) ='".$year."'";
                }else
                {
                    $where = "MONTH(TransactionDate) BETWEEN 7 AND 12
                                and YEAR(TransactionDate) ='".$year."'";
                }

            }else if($duration == "annual")
            {
                $where = "YEAR(TransactionDate) ='".$year."'";
            }
        

            $this->db->select('sum(Total) as Total');
            $this->db->from('service_invoice');
            $this->db->where($where);
            $query = $this->db->get();
            return $query->result_array();

        }

        function MonthlyStatementExpenses($year,$month,$table,$duration)
        {

            if($duration == "monthly")
            {

                $where = "MONTH(date_created) ='".$month."' AND YEAR(date_created) = '".$year."'";

            }else if($duration == "quarterly")
            {

                $where = "Quarter(date_created) ='".$month."' AND YEAR(date_created) = '".$year."'";

            }else if($duration == "semi")
            {
                /*
                    Pag semi annual, and value dapat ng $month is 1 or 2
                    representing 1st and 2nd half.

                */

                if($month == "1")
                {
                    $where = "MONTH(date_created) BETWEEN 1 AND 6
                                and YEAR(date_created) ='".$year."'";
                }else
                {
                    $where = "MONTH(date_created) BETWEEN 7 AND 12
                                and YEAR(date_created) ='".$year."'";
                }

            }else if($duration == "annual")
            {
                $where = "YEAR(date_created) ='".$year."'";
            }
        

            $this->db->select('sum(value) as Total');
            $this->db->from($table);
            $this->db->where($where);
            $query = $this->db->get();
            return $query->result_array();

        }

        //Retrieve year for spinners

        function RetrieveYearly($module)
        {

            $group = "YEAR(TransactionDate)";

            $this->db->select('YEAR(TransactionDate) as year');
            $this->db->from($module);
            $this->db->group_by($group);
            $query = $this->db->get();
            return $query->result_array();
        }

        //insert Filename

        function insertFilename($filename,$name,$table)
        {

            
            $this->db->where('name',$name);
            $this->db->update($table,array('other_doc'=>$filename));
            
        }

	}
?>
