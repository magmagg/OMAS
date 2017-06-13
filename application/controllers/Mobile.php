<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mobile extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct()
	{
		parent::__construct();
		$this->load->model('Model_Mobile','',TRUE);
		$this->load->model('Login_model','',TRUE);
		$this->load->model('Accountant_model','',TRUE);
	}

	public function index()
	{
		echo "Hello Mobile";

	}

	public function Login()
	{
	

		$username = $this->input->post('username');
		$password = $this->input->post('password');


		$accountant = $this->Login_model->get_accountant_details($username);
		$data['login'] = array();

		if($accountant != null){


			foreach($accountant as $a)
			{
				$hash = $a->password;
			}
			if(password_verify($password, $hash))
			{
				$data['login'] = $this->Login_model->get_accountant_details($username);
				echo json_encode($data);
				
			}
		} else {
			echo json_encode($data);
		}
		
	}

	public function Supplier()
	{
		$data['supplier'] = $this->Model_Mobile->supplierName();
		echo json_encode($data);

	}

	public function Utilities()
	{
		$data['utilities'] = $this->Model_Mobile->utilitiesList();
		echo json_encode($data);
	}

	public function Stocks()
	{
		$data['stocks'] = $this->Model_Mobile->stocksList();
		echo json_encode($data);
	}

	public function Sold()
	{
		$data['sold'] = $this->Model_Mobile->soldList();
		echo json_encode($data);
	}

	public function Customer()
	{
		$data['customer'] = $this->Model_Mobile->customerName();
		echo json_encode($data);
	}

	public function CustomerDetails()
	{
		$customerID = (int)$this->input->post('ID');

		$data['details'] = $this->Model_Mobile->customerDetails($customerID);
		echo json_encode($data);
	}

	public function PurchaseOrderItems()
	{	


		$PO_IDS = array();
		$purchase_invoice = $this->Model_Mobile->purchase_invoice();
		foreach ($purchase_invoice as $purchase_id) {
			
			foreach($purchase_id as $id){
				$PO_IDS[] = $id;

			}
		}
		
		$data['purchase_items'] = $this->Model_Mobile->purchase_items($PO_IDS);
		echo json_encode($data);
	}

	public function PurchaseOrderItemDetails()
	{
		$itemNameId = (int)$this->input->post('ID');

		$data['details'] = $this->Model_Mobile->getPurchaseItemDetails($itemNameId);
		echo json_encode($data);
	}

	public function addUtilities()
	{
		$name = $this->input->post('Util_name');
		$desc = $this->input->post('Util_desc');
		$price = (float)$this->input->post('Util_price');
		$date = $this->input->post('Util_paid');
		$user = (int)$this->input->post('Util_user');

		$this->Model_Mobile->addUtils($name,$desc,$price,$date,$user);
	}

	public function addPurchase()
	{
		$userId = (int)$this->input->post('UserID');
		$total = (float)$this->input->post('Total');
		$supplierId = $this->input->post('Supplier');
		$items = $this->input->post('Item');

		//$items = "1*50.0*1|2*60.0*2|3*70.0*3|4*80.0*4";

	 //Insert data now
	    $data = array('Total'=>$total,
	                  'Accountant_UserID'=>$userId,
	                  'Supplier_SupplierID'=>$supplierId,
	                  'Administrator_AdminID'=>1);
	  
		$PurchaseID = $this->Model_Mobile->insert_purchase_order($data);

		foreach(explode('|',$items) as $item){

			$name = "";
			$price = "";
			$quantity= "";
			$ctr = 0;
			foreach(explode('*',$item) as $names){

				switch ($ctr) {
					case 0:
						$name = $names;
						$ctr++;
						break;
					case 1:
						$price = $names;
						$ctr++;
						break;
					case 2:
						$quantity = $names;
						$ctr++;
						break;
					default:
						$ctr = 0;
						break;
				}
			}

			echo $name.','.$price.','.$quantity.'<br>';
			$data = array('ItemName'=>$name,
                    'Quantity'=>$quantity,
                    'UnitPrice'=>$price,
                    'PO_ID'=>$PurchaseID);
      		$this->Model_Mobile->insert_purchase_order_item($data);
 
	  }
    }

	public function addService()
	{
		$userId = (int)$this->input->post('UserID');
		$total = (float)$this->input->post('Total');
		$customer = $this->input->post('Customer');		
		$items = $this->input->post('Item');
		$service_items = $this->input->post('service_items');


		//Insert data now
		$data = array('Total'=>$total,
		              'Accountant_UserID'=>$userId,
		              'Customer_CustomerID'=>$customer,
		              'Administrator_AdminID'=>1,
		              'Status'=>1);
		$ServiceID = $this->Accountant_model->insert_service_invoice($data);

		foreach(explode('|',$items) as $item){

			$id = "";
			$price = "";
			$quantity= "";
			$ctr = 0;
			foreach(explode('*',$item) as $names){

				switch ($ctr) {
					case 0:
						$id = $names;
						$ctr++;
						break;
					case 1:
						$price = $names;
						$ctr++;
						break;
					case 2:
						$quantity = $names;
						$ctr++;
						break;
					default:
						$ctr = 0;
						break;
				}
			}

      		$data = array('POI_ItemID'=>$id,
                    'Quantity'=>$quantity,
                    'SO_ID'=>$ServiceID);
      		$this->Accountant_model->insert_service_invoice_item($data);
      		$stock=$this->Model_Mobile->getPurchasingItemsById($id);
      		$this->Model_Mobile->subtractQuantities($ServiceID,$quantity,$id, $stock[0]['Quantity']);
		}

		foreach(explode('|',$service_items) as $service_item){

			$name = "";
			$price = "";
			$quantity= "";
			$ctr = 0;
			foreach(explode('*',$service_item) as $names){

				switch ($ctr) {
					case 0:
						$name = $names;
						$ctr++;
						break;
					case 1:
						$price = $names;
						$ctr++;
						break;
					case 2:
						$quantity = $names;
						$ctr++;
						break;
					default:
						$ctr = 0;
						break;
				}
			}

      		$data = array('service_name'=>$name,
                    'Quantity'=>$quantity,
                    'UnitPrice'=>$price,
                    'SO_ID'=>$ServiceID);
      		$this->Accountant_model->insert_service_invoice_service($data);

		}

	}

	function getNextInvoiceNum()
	{
		$data['next_invoice_id'] = $this->Model_Mobile->getNextInvoiceNum();
		echo json_encode($data);
	}

	function getNextPurchaseNum()
	{
		$data['next_purchase_id'] = $this->Model_Mobile->getNextPurchaseNum();
		echo json_encode($data);
	}

	function balanceList()
	{
		$data['balance'] = $this->Model_Mobile->balanceSheet();
		echo json_encode($data);
	}

	function balanceTotal()
	{

		$balanceID = (int)$this->input->post('ID');

		$data['balanceTotal'] = $this->Model_Mobile->balanceTotal($balanceID);
		echo json_encode($data);
	}

	function assets()
	{

		$balanceID = (int)$this->input->post('ID');

		$data['assets'] = $this->Model_Mobile->assetTotal($balanceID);
		echo json_encode($data);
	}

	function liabilities()
	{

		$balanceID = (int)$this->input->post('ID');

		$data['liabilities'] = $this->Model_Mobile->liabilitiesTotal($balanceID);
		echo json_encode($data);
	}

	function ownersEquity()
	{

		$balanceID = (int)$this->input->post('ID');

		$data['equity'] = $this->Model_Mobile->ownersTotal($balanceID);
		echo json_encode($data);
	}

	function entertainment()
	{
		$data['entertainment'] = $this->Model_Mobile->expenseET();
		echo json_encode($data);
	}

	function fees()
	{
		$data['fees'] = $this->Model_Mobile->expenseFees();
		echo json_encode($data);
	}

	function insurance()
	{
		$data['insurance'] = $this->Model_Mobile->expenseInsurance();
		echo json_encode($data);
	}

	function interest()
	{
		$data['interest'] = $this->Model_Mobile->expenseInterest();
		echo json_encode($data);
	}

	function maintenance()
	{
		$data['maintenance'] = $this->Model_Mobile->expenseMaintenance();
		echo json_encode($data);
	}

	function others()
	{
		$data['others'] = $this->Model_Mobile->expenseOthers();
		echo json_encode($data);
	}

	function rent()
	{
		$data['rent'] = $this->Model_Mobile->expenseRent();
		echo json_encode($data);
	}

	function supplies()
	{
		$data['supplies'] = $this->Model_Mobile->expenseSupplies();
		echo json_encode($data);
	}

	function training()
	{
		$data['training'] = $this->Model_Mobile->expenseTraining();
		echo json_encode($data);
	}

	function travel()
	{
		$data['travel'] = $this->Model_Mobile->expenseTravel();
		echo json_encode($data);
	}

	function wages()
	{
		$data['wages'] = $this->Model_Mobile->expenseWages();
		echo json_encode($data);
	}

	//Services Reports

	function serviceMonthly()
	{
		$year = (int)$this->input->post('year');

		$data['monthly'] = $this->Model_Mobile->MonthlyService($year);
		echo json_encode($data);
	}

	function serviceQuarterly()
	{
		$year = (int)$this->input->post('year');

		$data['quarterly'] = $this->Model_Mobile->QuarterlyService($year);
		echo json_encode($data);
	}

	function serviceSemi()
	{
		$year = (int)$this->input->post('year');

		$data['semi'] = $this->Model_Mobile->SemiService($year);
		echo json_encode($data);
	}

	function serviceAnnual()
	{
		$year = (int)$this->input->post('year');

		$data['annual'] = $this->Model_Mobile->AnnualService($year);
		echo json_encode($data);
	}

	//Purchasing Reports

	function purchaseMonthly()
	{
		$year = (int)$this->input->post('year');

		$data['monthly'] = $this->Model_Mobile->MonthlyPurchase($year);
		echo json_encode($data);
	}

	function purchaseQuarterly()
	{
		$year = (int)$this->input->post('year');

		$data['quarterly'] = $this->Model_Mobile->QuarterlyPurchase($year);
		echo json_encode($data);
	}

	function purchaseSemi()
	{
		$year = (int)$this->input->post('year');

		$data['semi'] = $this->Model_Mobile->SemiPurchase($year);
		echo json_encode($data);
	}

	function purchaseAnnual()
	{
		$year = (int)$this->input->post('year');

		$data['annual'] = $this->Model_Mobile->AnnualPurchase($year);
		echo json_encode($data);
	}

	//Inventory Reports

	function inventoryMonthly()
	{
		$year = (int)$this->input->post('year');

		$data['monthly'] = $this->Model_Mobile->MonthlyInventory($year);
		echo json_encode($data);
	}

	function inventoryQuarterly()
	{
		$year = (int)$this->input->post('year');

		$data['quarterly'] = $this->Model_Mobile->QuarterlyInventory($year);
		echo json_encode($data);
	}

	function inventorySemi()
	{
		$year = (int)$this->input->post('year');

		$data['semi'] = $this->Model_Mobile->SemiInventory($year);
		echo json_encode($data);
	}

	function inventoryAnnual()
	{
		$year = (int)$this->input->post('year');

		$data['annual'] = $this->Model_Mobile->AnnualInventory($year);
		echo json_encode($data);
	}

    
}

?>
