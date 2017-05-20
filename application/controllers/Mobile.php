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
	}

	public function index()
	{
		echo "Hello Mobile";

	

	}

	public function Login()
	{
		// $success[] = array('loginstatus' => "1");
		// $fail[] = array('loginstatus' => "0");

		/*$username = $this->input->post('UserID');
		$password = $this->input->post('password');*/

		$username = "accountant";
		$password = "accountant";

		$data['login'] = $this->Model_Mobile->validatecredential($username,$password);
		$noaccount['login'] = array();

		if(count($data['login'])>0)
		{
			echo json_encode($data);
		}
		
	}

	public function Supplier()
	{
		$data['supplier'] = $this->Model_Mobile->supplierName();
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

	public function addPurchase()
	{
		$id = (int)$this->input->post('UserID');
		$total = (float)$this->input->post('Total');
		$supplier = $this->input->post('Supplier');
		$item = $this->input->post('Item');
		$quantity = (int)$this->input->post('Quantity');
		$price = (float)$this->input->post('Price');

		$this->Model_Mobile->addPO($id,$total,$supplier,$item,$quantity,$price);

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
			$this->Model_Mobile->addSv($id,$total,$customer,$name,$quantity,$price);

		}

		/*$this->Model_Mobile->addSv($id,$total,$customer,$item,$quantity,$price);*/
	}


}