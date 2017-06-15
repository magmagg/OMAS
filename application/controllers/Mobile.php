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
	  $this->purchase_msg($userId,$supplierId,$items,$PurchaseID);
    }


    public function purchase_msg($userId,$supplierId,$items,$PurchaseID){

		$supplier_info=$this->supplier_information($supplierId);
		$po_info=$this->po_info($PurchaseID);
		$user_info=$this->user_info($userId);
		$items_info=$this->items_info($items,$PurchaseID);
		//$service_item=$this->service_items_info($service_items);

		$message = "<center> <img src='" . base_url() . "assets/images/logo.png' width='20%'/> </center>" . "<hr> <h2 style='margin:0px 0px 15px 0px; text-align:center; color:#fff; background:#be1e2d; padding:20px; font-family:Arial, sans-serif;'> OMAS </h2>";
		$message .= "<p style='text-align: center; font-family: Verdana, sans-serif; font-size:22px;'>" .
					"Hi! This is" .  " OMAS. We would like to order items from you"  . ". Please see our order details below. Thank you!" . 
					"</p>";
		$message .= "<table width='100%' border='0' cellpadding='5'>" . 
						"<tr>" .
							"<td colspan='4'>" .
								"<h2 style='margin:0px; text-align:center; color:#fff; background:#444; padding:20px; font-family:Arial, sans-serif;'> OMAS PURCHASE ORDER </h2>" . 
							"</td>" . 
						"</tr>" . 
						"<tr>" .
							"<td colspan='2' width='50%'>" .
								"<h2 style='margin:0px; text-align:center; color:#fff; background:#be1e2d; padding:5px; font-family:Arial, sans-serif;'> SUPPLIER INFORMATION </h2>" . 
 							"</td>" . 
 							"<td colspan='2' width='50%'>" .
								"<h2 style='margin:0px; text-align:center; color:#fff; background:#be1e2d; padding:5px; font-family:Arial, sans-serif;'> ORDER INFORMATION </h2>" . 
 							"</td>" . 
						"</tr>" . 
						"<tr>" .
							"<td width='25%' valign='middle' align='center'>" .
								"<H3 style='margin:0px; font-family:Arial, sans-serif;'>SUPPLIER NAME:</h3>" . 
 							"</td>" . 
 							"<td width='25%' align='center'>" .
								"<h3 style='margin:0px; font-family:Courier New, serif; color:#333;'>" . $supplier_info[0]['SupplierName'] . "</h3>" . 
 							"</td>" . 
 							"<td width='25%' valign='middle' align='center'>" .
								"<H3 style='margin:0px; font-family:Arial, sans-serif;'>PO ID:</H3>" . 
 							"</td>" . 
 							"<td width='25%' valign='middle' align='center'>" .
								"<H3 style='margin:0px; font-family:Courier New, serif; color:#333;'>" . $po_info[0]['PurchaseID'] . "</H3>" . 
 							"</td>" . 
						"</tr>" . 
						"<tr>" .
							"<td width='25%' valign='middle' align='center'>" .
								"<H3 style='margin:0px; font-family:Arial, sans-serif;'>CONTACT DETAILS:</H3>" . 
 							"</td>" . 
 							"<td width='25%' align='center'>" .
								"<H3 style='margin:0px; font-family:Courier New, serif; color:#333;'>" . $supplier_info[0]['Email'] . " /<BR>" . $supplier_info[0]['Phone'] . "</H3>" . 
 							"</td>" . 
 							"<td width='25%' valign='middle' align='center'>" .
								"<H3 style='margin:0px; font-family:Arial, sans-serif;'>TRANSACTION DATE:</H3>" . 
 							"</td>" . 
 							"<td width='25%' valign='middle' align='center'>" .
								"<H3 style='margin:0px; font-family:Courier New, serif; color:#333;'>" .  $po_info[0]['TransactionDate']  . "</H3>" . 
 							"</td>" . 
						"</tr>" . 
						"<tr>" .
							"<td width='25%' valign='middle' align='center'>" .
								"<H3 style='margin:0px; font-family:Arial, sans-serif;'>ADDRESS:</H3>" . 
 							"</td>" . 
 							"<td width='25%' align='center'>" .
								"<H3 style='margin:0px; font-family:Courier New, serif; color:#333;'>" . $supplier_info[0]['Address']." ".$supplier_info[0]['City']." ".$supplier_info[0]['Region']." ".$supplier_info[0]['PostalCode']. "</H3>" . 
 							"</td>" . 
 							"<td width='25%' valign='middle' align='center'>" .
								"<H3 style='margin:0px; font-family:Arial, sans-serif;'>TOTAL:</H3>" . 
 							"</td>" . 
 							"<td width='25%' valign='middle' align='center'>" .
								"<H3 style='margin:0px; font-family:Courier New, serif; color:#333;'> Php " .  $po_info[0]['Total']   . "</H3>" . 
 							"</td>" . 
						"</tr>" . 
						"<tr style='background:#be1e2d; color:#fff;'>" .
							"<td width='25%' valign='middle' align='center'>" .
								"<H3 style='margin:0px; font-family:Arial, sans-serif;'> ITEM ID </H3>" .
						
 							"</td>" . 
 							"<td width='25%' valign='middle' align='center'>" .
								"<H3 style='margin:0px; font-family:Arial, sans-serif;'>ITEM NAME</H3>" .
							
 							"</td>" . 
 							"<td width='25%' valign='middle' align='center'>" .
								"<H3 style='margin:0px; font-family:Arial, sans-serif;'>PRICE </H3>" .
								
 							"</td>" . 
 							"<td width='25%' valign='middle' align='center'>" .
								"<H3 style='margin:0px; font-family:Arial, sans-serif;'>QUANTITY </H3>" .
								
 							"</td>" . 
						"</tr>" ;
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

					      $message .="<tr style='background:#fff5ee; color:#fff;'>" .
							"<td width='25%' valign='middle' align='center'>" .
								"<H3 style='margin:0px; font-family:Courier New, serif; color:#333;'>" . "###" . "</H3>" . 
 							"</td>" . 
 							"<td width='25%' valign='middle' align='center'>" .
								"<H3 style='margin:0px; font-family:Courier New, serif; color:#333;'>" . $name . "</H3>" . 
 							"</td>" .
 							"<td width='25%' valign='middle' align='center'>" .
								"<H3 style='margin:0px; font-family:Courier New, serif; color:#333;'>" . $price . "</H3>" . 
 							"</td>" .
 							"<td width='25%' valign='middle' align='center'>" .
								"<H3 style='margin:0px; font-family:Courier New, serif; color:#333;'>" . $quantity . "</H3>" . 
 							"</td>" .
 						"</tr>";	

						}
						$message .="<tr>" .
							"<td colspan='2' width='50%' valign='top' align='right'>" .
								"<H3 style='margin:0px; font-family:Arial, sans-serif;'>PREPARED BY: </H3>" .
							"</td>" .
							"<td colspan='2' width='50%'>";
								
									$message .= "<H3 style='margin:0px; font-family:Courier New, serif; color:#333;'>" . $user_info[0]['username'] . " </h3> <br> " ; 
							
							$message .= "</td>" .
						"</tr>" .
						"<tr style='background:#444; color:#fff'>" .
							"<td colspan='4'>" .
								"<p style='text-align: right; font-family: Verdana, sans-serif; font-size:14px;'>" .
									"You may screen capture this and print or you can show this message to the person from OMAS. Thank you." .
								"</p>" . 
							"</td>" . 
						"</tr>" .
					"</table>";

	
		/*$this->send_mail("Service Invoice",$message,"hacelestial@feu-eac.edu.ph");*/
		$this->send_mail("Purchase Order",$message,$supplier_info[0]['Email']);
		 
	}


	function supplier_information($id)
	{
		$supplier = $this->Model_Mobile->supplierDetails($id);

		return $supplier;
	}

	function po_info($id)
	{
		$po = $this->Model_Mobile->purchaseOrderDetails($id);

		return $po;
	}

    public function send_mail($subj,$msg,$dest) {
        $mail = new PHPMailer();
        $mail->IsSMTP(); // we are going to use SMTP
        $mail->SMTPAuth   = true; // enabled SMTP authentication
        $mail->SMTPSecure = "ssl";  // prefix for secure protocol to connect to the server
        $mail->Host       = "smtp.gmail.com";      // setting GMail as our SMTP server
        $mail->Port       = 465;                   // SMTP port to connect to GMail
        $mail->Username   = "dichliebeich12@gmail.com";  // user email address
        $mail->Password   = "Faithhopelove12";            // password in GMail
        $mail->SetFrom('omasph2017@gmail.com', 'Online Managerial Accounting');  //Who is sending the email
    
        $mail->Subject    = $subj;
        $mail->Body      = $msg;
        $mail->AltBody    = "Plain text message";
        $destino = $dest; // Who is addressed the email to
        $mail->AddAddress($destino, "John Doe");

       
        if(!$mail->Send()) {
            $data["message"] = "Error: " . $mail->ErrorInfo;
        } else {
            $data["message"] = "Message sent correctly!";
        }
    
        echo  $data["message"];
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

		$this->invoice_msg($userId,$customer,$items,$service_items,$ServiceID);

	}


	public function invoice_msg($userId,$customer,$items,$service_items,$ServiceID){

		$cust_info=$this->customer_information($customer);
		$service_invoice_info=$this->service_invoice_info($ServiceID);
		$user_info=$this->user_info($userId);
		$items_info=$this->items_info($items,$ServiceID);
		//$service_item=$this->service_items_info($service_items);

		$message = "<center> <img src='" . base_url() . "assets/images/logo.png' width='20%'/> </center>" . "<hr> <h2 style='margin:0px 0px 15px 0px; text-align:center; color:#fff; background:#be1e2d; padding:20px; font-family:Arial, sans-serif;'> OMAS </h2>";
		$message .= "<p style='text-align: center; font-family: Verdana, sans-serif; font-size:22px;'>" .
					"You availed services from" .  " Online Managerial Accounting System"  . ". Please see your service invoice details below." . 
					"</p>";
		$message .= "<table width='100%' border='0' cellpadding='5'>" . 
						"<tr>" .
							"<td colspan='4'>" .
								"<h2 style='margin:0px; text-align:center; color:#fff; background:#444; padding:20px; font-family:Arial, sans-serif;'> OMAS SERVICE INVOICE </h2>" . 
							"</td>" . 
						"</tr>" . 
						"<tr>" .
							"<td colspan='2' width='50%'>" .
								"<h2 style='margin:0px; text-align:center; color:#fff; background:#be1e2d; padding:5px; font-family:Arial, sans-serif;'> CUSTOMER INFORMATION </h2>" . 
 							"</td>" . 
 							"<td colspan='2' width='50%'>" .
								"<h2 style='margin:0px; text-align:center; color:#fff; background:#be1e2d; padding:5px; font-family:Arial, sans-serif;'> INVOICE INFORMATION </h2>" . 
 							"</td>" . 
						"</tr>" . 
						"<tr>" .
							"<td width='25%' valign='middle' align='center'>" .
								"<H3 style='margin:0px; font-family:Arial, sans-serif;'>CUSTOMER NAME:</h3>" . 
 							"</td>" . 
 							"<td width='25%' align='center'>" .
								"<h3 style='margin:0px; font-family:Courier New, serif; color:#333;'>" . $cust_info[0]['CustomerName'] . "</h3>" . 
 							"</td>" . 
 							"<td width='25%' valign='middle' align='center'>" .
								"<H3 style='margin:0px; font-family:Arial, sans-serif;'>INVOICE ID:</H3>" . 
 							"</td>" . 
 							"<td width='25%' valign='middle' align='center'>" .
								"<H3 style='margin:0px; font-family:Courier New, serif; color:#333;'>" . $service_invoice_info[0]['ServiceID'] . "</H3>" . 
 							"</td>" . 
						"</tr>" . 
						"<tr>" .
							"<td width='25%' valign='middle' align='center'>" .
								"<H3 style='margin:0px; font-family:Arial, sans-serif;'>CONTACT DETAILS:</H3>" . 
 							"</td>" . 
 							"<td width='25%' align='center'>" .
								"<H3 style='margin:0px; font-family:Courier New, serif; color:#333;'>" . $cust_info[0]['Email'] . " /<BR>" . $cust_info[0]['Phone'] . "</H3>" . 
 							"</td>" . 
 							"<td width='25%' valign='middle' align='center'>" .
								"<H3 style='margin:0px; font-family:Arial, sans-serif;'>TRANSACTION DATE:</H3>" . 
 							"</td>" . 
 							"<td width='25%' valign='middle' align='center'>" .
								"<H3 style='margin:0px; font-family:Courier New, serif; color:#333;'>" .  $service_invoice_info[0]['TransactionDate']  . "</H3>" . 
 							"</td>" . 
						"</tr>" . 
						"<tr>" .
							"<td width='25%' valign='middle' align='center'>" .
								"<H3 style='margin:0px; font-family:Arial, sans-serif;'>ADDRESS:</H3>" . 
 							"</td>" . 
 							"<td width='25%' align='center'>" .
								"<H3 style='margin:0px; font-family:Courier New, serif; color:#333;'>" . $cust_info[0]['Address'] . "</H3>" . 
 							"</td>" . 
 							"<td width='25%' valign='middle' align='center'>" .
								"<H3 style='margin:0px; font-family:Arial, sans-serif;'>TOTAL:</H3>" . 
 							"</td>" . 
 							"<td width='25%' valign='middle' align='center'>" .
								"<H3 style='margin:0px; font-family:Courier New, serif; color:#333;'> Php " .  $service_invoice_info[0]['Total']  . "</H3>" . 
 							"</td>" . 
						"</tr>" . 
						"<tr style='background:#be1e2d; color:#fff;'>" .
							"<td width='25%' valign='middle' align='center'>" .
								"<H3 style='margin:0px; font-family:Arial, sans-serif;'> ITEM ID </H3>" .
						
 							"</td>" . 
 							"<td width='25%' valign='middle' align='center'>" .
								"<H3 style='margin:0px; font-family:Arial, sans-serif;'>ITEM NAME</H3>" .
							
 							"</td>" . 
 							"<td width='25%' valign='middle' align='center'>" .
								"<H3 style='margin:0px; font-family:Arial, sans-serif;'>PRICE </H3>" .
								
 							"</td>" . 
 							"<td width='25%' valign='middle' align='center'>" .
								"<H3 style='margin:0px; font-family:Arial, sans-serif;'>QUANTITY </H3>" .
								
 							"</td>" . 
						"</tr>" ;
						foreach($items_info as $invoice_items){
						$message .="<tr style='background:#fff5ee; color:#fff;'>" .
							"<td width='25%' valign='middle' align='center'>" .
								"<H3 style='margin:0px; font-family:Courier New, serif; color:#333;'>" . $invoice_items->ItemID . "</H3>" . 
 							"</td>" . 
 							"<td width='25%' valign='middle' align='center'>" .
								"<H3 style='margin:0px; font-family:Courier New, serif; color:#333;'>" . $invoice_items->ItemName . "</H3>" . 
 							"</td>" .
 							"<td width='25%' valign='middle' align='center'>" .
								"<H3 style='margin:0px; font-family:Courier New, serif; color:#333;'>" . $invoice_items->UnitPrice . "</H3>" . 
 							"</td>" .
 							"<td width='25%' valign='middle' align='center'>" .
								"<H3 style='margin:0px; font-family:Courier New, serif; color:#333;'>" . $invoice_items->Quantity . "</H3>" . 
 							"</td>" .
 						"</tr>";
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

					      $message .="<tr style='background:#fff5ee; color:#fff;'>" .
							"<td width='25%' valign='middle' align='center'>" .
								"<H3 style='margin:0px; font-family:Courier New, serif; color:#333;'>" . "###" . "</H3>" . 
 							"</td>" . 
 							"<td width='25%' valign='middle' align='center'>" .
								"<H3 style='margin:0px; font-family:Courier New, serif; color:#333;'>" . $name . "</H3>" . 
 							"</td>" .
 							"<td width='25%' valign='middle' align='center'>" .
								"<H3 style='margin:0px; font-family:Courier New, serif; color:#333;'>" . $price . "</H3>" . 
 							"</td>" .
 							"<td width='25%' valign='middle' align='center'>" .
								"<H3 style='margin:0px; font-family:Courier New, serif; color:#333;'>" . $quantity . "</H3>" . 
 							"</td>" .
 						"</tr>";	

						}
						$message .="<tr>" .
							"<td colspan='2' width='50%' valign='top' align='right'>" .
								"<H3 style='margin:0px; font-family:Arial, sans-serif;'>PREPARED BY: </H3>" .
							"</td>" .
							"<td colspan='2' width='50%'>";
								
									$message .= "<H3 style='margin:0px; font-family:Courier New, serif; color:#333;'>" . $user_info[0]['username'] . " </h3> <br> " ; 
							
							$message .= "</td>" .
						"</tr>" .
						"<tr style='background:#444; color:#fff'>" .
							"<td colspan='4'>" .
								"<p style='text-align: right; font-family: Verdana, sans-serif; font-size:14px;'>" .
									"You may screen capture this and print or you can show this message to the person from OMAS. Thank you." .
								"</p>" . 
							"</td>" . 
						"</tr>" .
					"</table>";

	
		/*$this->send_mail("Service Invoice",$message,"hacelestial@feu-eac.edu.ph");*/
		$this->send_mail("Service Invoice",$message,$cust_info[0]['Email']);
		 
	}

	function customer_information($id)
	{
		$customer = $this->Model_Mobile->customerDetails($id);

		return $customer;
	}

	function service_invoice_info($id)
	{
		$service_invoice = $this->Model_Mobile->serviceInvoiceDetails($id);

		return $service_invoice;
	}
	
	function user_info($id)
	{
		$user = $this->Model_Mobile->userInfo($id);

		return $user;
	}


	function items_info($items,$ServiceID)
	{

		$Item_IDS = array();
		foreach(explode('|',$items) as $item){

			//$id = "";
			$price = "";
			$quantity= "";
			$ctr = 0;
			foreach(explode('*',$item) as $names){

				switch ($ctr) {
					case 0:
						$Item_IDS[] = $names;
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

		}
		$data=$this->Model_Mobile->getInvoiceItems($Item_IDS,$ServiceID);
		return $data;
		/*var_dump($data);
		echo $data[0]->ItemName;*/
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

	function assetsCurrent()
	{

		$balanceID = (int)$this->input->post('ID');

		$data['assets'] = $this->Model_Mobile->assetCurr($balanceID);
		echo json_encode($data);
	}

	function assetsNonCurrent()
	{

		$balanceID = (int)$this->input->post('ID');

		$data['assets'] = $this->Model_Mobile->assetNonCurr($balanceID);
		echo json_encode($data);
	}

	function liabilities()
	{

		$balanceID = (int)$this->input->post('ID');

		$data['liabilities'] = $this->Model_Mobile->liabilitiesTotal($balanceID);
		echo json_encode($data);
	}

	function liabilitiesCurrent()
	{

		$balanceID = (int)$this->input->post('ID');

		$data['liabilities'] = $this->Model_Mobile->liabilitiesCurrent($balanceID);
		echo json_encode($data);
	}

	function liabilitiesNonCurrent()
	{

		$balanceID = (int)$this->input->post('ID');

		$data['liabilities'] = $this->Model_Mobile->liabilitiesNonCurrent($balanceID);
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

	//services rendered

	function servicesMonthly()
	{
		$year = (int)$this->input->post('year');

		$data['monthly'] = $this->Model_Mobile->MonthlyServices($year);
		echo json_encode($data);
	}

	function servicesQuarterly()
	{
		$year = (int)$this->input->post('year');

		$data['quarterly'] = $this->Model_Mobile->QuarterlyServices($year);
		echo json_encode($data);
	}

	function servicesSemi()
	{
		$year = (int)$this->input->post('year');

		$data['semi'] = $this->Model_Mobile->SemiServices($year);
		echo json_encode($data);
	}

	function servicesAnnual()
	{
		$year = (int)$this->input->post('year');

		$data['annual'] = $this->Model_Mobile->AnnualServices($year);
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

	//Expenses Reports

	function expenseMonthly()
	{
		$year = (int)$this->input->post('year');
		$expense = $this->input->post('expense');

		$data['monthly'] = $this->Model_Mobile->MonthlyExpense($year,$expense);
		echo json_encode($data);
	}

	function expenseQuarterly()
	{
		$year = (int)$this->input->post('year');
		$expense = $this->input->post('expense');

		$data['quarterly'] = $this->Model_Mobile->QuarterlyExpense($year,$expense);
		echo json_encode($data);
	}

	function expenseSemi()
	{
		$year = (int)$this->input->post('year');
		$expense = $this->input->post('expense');

		$data['semi'] = $this->Model_Mobile->SemiExpense($year,$expense);
		echo json_encode($data);
	}

	function expenseAnnual()
	{
		$year = (int)$this->input->post('year');
		$expense = $this->input->post('expense');

		$data['annual'] = $this->Model_Mobile->AnnualExpense($year,$expense);
		echo json_encode($data);
	}

	//Revenue Reports

	function revenueMonthly()
	{
		$year = (int)$this->input->post('year');

		$data['monthly'] = $this->Model_Mobile->MonthlyRevenue($year);
		echo json_encode($data);
	}

	function revenueQuarterly()
	{
		$year = (int)$this->input->post('year');

		$data['quarterly'] = $this->Model_Mobile->QuarterlyRevenue($year);
		echo json_encode($data);
	}

	function revenueSemi()
	{
		$year = (int)$this->input->post('year');

		$data['semi'] = $this->Model_Mobile->SemiRevenue($year);
		echo json_encode($data);
	}

	function revenueAnnual()
	{

		$data['annual'] = $this->Model_Mobile->YearlyRevenue();
		echo json_encode($data);
	}

	//INCOME STATEMENT

	function statementRevenue()
	{

		/*

			$month, magpapalit kada month na pinili. pag quarterly naman, and values
			dapat 1-4 lang. pag semi annual, 0-1 lang

		*/
		$year = 2016;
		$month = 1;
		$duration = "semi";

		$data['income'] = $this->Model_Mobile->MonthlyIncome($year,$month,$duration);
		echo json_encode($data);
	}

	function incomeInventoryBegin()
	{

		/*

			$month, magpapalit kada month na pinili. pag quarterly naman, and values
			dapat 1-4 lang. pag semi annual, 0-1 lang

		*/

		$year = 2016;
		$month = 2;
		$duration = "annual";

		$data['begin'] = $this->Model_Mobile->MonthlyStatementInventory($year,$month,$duration);
		echo json_encode($data);
	}

	function incomeInventoryEnd()
	{

		/*

			$month, magpapalit kada month na pinili. pag quarterly naman, and values
			dapat 1-4 lang. pag semi annual, 0-1 lang

		*/

		$year = 2016;
		$month = 0;
		$duration = "semi";

		$data['end'] = $this->Model_Mobile->MonthlyStatementInventoryEnd($year,$month,$duration);
		echo json_encode($data);
	}

	function incomeExpenses()
	{

		/*

			$month, magpapalit kada month na pinili. pag quarterly naman, and values
			dapat 1-4 lang. pag semi annual, 0-1 lang

		*/

		$year = 2016;
		$month = 0;
		$table = "fees";
		$duration = "annual";

		$data['expense'] = $this->Model_Mobile->MonthlyStatementExpenses($year,$month,$table,$duration);
		echo json_encode($data);
	}

	//Retrieve year for reports

	function retrieveYear()
	{
		$module = $this->input->post('module');
		
		$data['year'] = $this->Model_Mobile->RetrieveYearly($module);
		echo json_encode($data);
	}


    
}

?>
