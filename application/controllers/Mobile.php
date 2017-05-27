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

		foreach($accountant as $a)
		{
			$hash = $a->password;
		}
		if(password_verify($password, $hash))
		{
			$data['login'] = $this->Login_model->get_accountant_details($username);
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
		//$quantity = (int)$this->input->post('Quantity');
		//$price = (float)$this->input->post('Price');

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
		/*$id = (int)$this->input->post('UserID');
		$total = (float)$this->input->post('Total');
		$customer = $this->input->post('Customer');
		
		$items = $this->input->post('Item');*/
		/*$quantities = (int)$this->input->post('Quantity');
		$prices = (float)$this->input->post('Price');*/

		$id = 1;
		$total = (float)'100';
		$customer = 2;

		$items = "1*50.0*1|2*60.0*2|3*70.0*3|4*80.0*4";

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

			echo $name.','.$price.','.$quantity;
			//$this->Model_Mobile->addSv($id,$total,$customer,$name,$quantity,$price);

		}

		/*$this->Model_Mobile->addSv($id,$total,$customer,$item,$quantity,$price);*/
	}


}