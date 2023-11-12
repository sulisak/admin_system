<?php

use ReallySimpleJWT\Token;

session_start();
class Home extends Controller
{
	/**
	 * PAGE: index
	 * This method handles what happens when you move to http://yourproject/home/index (which is the default page btw)
	 */
	public function index()
	{




		if (isset($_SESSION['SESS_MEMBER_ID'])) {
			$Sid = $_SESSION['SESS_MEMBER_ID'];
		} else {
			$Sid = '';
		}
		if (isset($_SESSION['SESS_MEMBER_unique'])) {
			$unq = $_SESSION['SESS_MEMBER_unique'];
		} else {
			$unq = '';
		}
		if ($Sid == "" && $unq == "") {
			$LoginModel = $this->loadModel('LoginModel');
			$companylist = $LoginModel->getCompany();
			//print_r($companylist);					
			require 'application/views/login/index.php';
		} else {
			if ($_SESSION['SESS_MEMBER_POS'] == "Administration") {


				header("location:" . URL . "Dashboard");
			} else {
				header("location:" . URL . "Document/In");
			}
		}
	}


	public function LoginAccount()
	{
		// 		print_r($_POST);

		$un = $_POST["un"];
		$pw = md5($_POST["pw"]);
		$LoginModel = $this->loadModel('LoginModel');
		$data = $LoginModel->getData($un, $pw);
		foreach ($data as $app) {
			if (isset($app->userid))
				$userid = $app->userid;
			if (isset($app->username))
				$username = $app->username;
			if (isset($app->fullname))
				$fullname = $app->fullname;
			if (isset($app->contact))
				$contact = $app->contact;
			if (isset($app->position))
				$Position = $app->position;
			if (isset($app->company))
				$company = $app->company;
			if (isset($app->department))
				$department = $app->department;
			if (isset($app->profile))
				$profile = $app->profile;
			if (isset($app->cid))
				$cid = $app->cid;
			if (isset($app->depid))
				$depid = $app->depid;
			$_SESSION['SESS_MEMBER_POS'] = $Position;
			$_SESSION['SESS_MEMBER_ID'] = $userid;
			$_SESSION['SESS_MEMBER_Fname'] = $fullname;
			$_SESSION['SESS_MEMBER_contact'] = $contact;
			$_SESSION['SESS_MEMBER_Username'] = $username;
			$_SESSION['SESS_MEMBER_department'] = $department;
			$_SESSION['SESS_MEMBER_company'] = $company;
			$_SESSION['SESS_MEMBER_pic'] = $profile;
			$_SESSION['SESS_MEMBER_cid'] = $cid;
			$_SESSION['SESS_MEMBER_depid'] = $depid;
		}

		$totalUser = $LoginModel->CheckAccountLogin($un, $pw);

		// Define response data
		$data = array(
			'success' => false,
		);

		if ($totalUser == 1) {
			$LoginModel->DeleteSession($_SESSION['SESS_MEMBER_ID']);
			date_default_timezone_set('Asia/Bangkok');
			$date = date("Y-m-d");
			$unique = substr(uniqid(rand(), true), 0, 25);
			$_SESSION['SESS_MEMBER_unique'] = $unique;
			$LoginModel->InsertSession($_SESSION['SESS_MEMBER_ID'], $unique, $date);

			// Generate JWT token
			$userId = 1;
			$secret = 'AIfTesTsec!ReT423*&';
			$expiration = time() + 3600;
			$issuer = 'localhost';

			$token = Token::create($userId, $secret, $expiration, $issuer);
			if ($_SESSION['SESS_MEMBER_POS'] == "Administration") {
				$data = array(
					'success' => true,
					'token' => $token,
					'redirectType' => 'admin',
				);
			} else {
				$data = array(
					'success' => true,
					'token' => $token,
					'redirectType' => 'document',
				);
			}
		} else {
			$data = array(
				'success' => false,
				'message' => 'Invalid username and password!',
			);
			// echo "Invalid username and password!";
		}

		// Response data to clien
		$responseData = json_encode($data, JSON_PRETTY_PRINT);
		header('Content-Type: application/json; charset=utf-8');
		echo $responseData;


		//	$LoginModel = $this->loadModel('LoginModel');
		//$data = $LoginModel->getData($un,$pw);
		//	print_r($data);


	}


	public function LoginAccountAll()
	{
		//print_r($_POST);

		$un = $_GET["un"];
		$pw = md5($_GET["pw"]);
		$LoginModel = $this->loadModel('LoginModel');
		$data = $LoginModel->getData($un, $pw);
		foreach ($data as $app) {
			if (isset($app->userid))
				$userid = $app->userid;
			if (isset($app->username))
				$username = $app->username;
			if (isset($app->fullname))
				$fullname = $app->fullname;
			if (isset($app->contact))
				$contact = $app->contact;
			if (isset($app->position))
				$Position = $app->position;
			if (isset($app->company))
				$company = $app->company;
			if (isset($app->department))
				$department = $app->department;
			if (isset($app->profile))
				$profile = $app->profile;
			if (isset($app->cid))
				$cid = $app->cid;
			if (isset($app->depid))
				$depid = $app->depid;
			$_SESSION['SESS_MEMBER_POS'] = $Position;
			$_SESSION['SESS_MEMBER_ID'] = $userid;
			$_SESSION['SESS_MEMBER_Fname'] = $fullname;
			$_SESSION['SESS_MEMBER_contact'] = $contact;
			$_SESSION['SESS_MEMBER_Username'] = $username;
			$_SESSION['SESS_MEMBER_department'] = $department;
			$_SESSION['SESS_MEMBER_company'] = $company;
			$_SESSION['SESS_MEMBER_pic'] = $profile;
			$_SESSION['SESS_MEMBER_cid'] = $cid;
			$_SESSION['SESS_MEMBER_depid'] = $depid;
		}

		$totalUser = $LoginModel->CheckAccountLogin($un, $pw);
		//echo $totalUser;
		if ($totalUser == 1) {

			$LoginModel->DeleteSession($_SESSION['SESS_MEMBER_ID']);
			date_default_timezone_set('Asia/Bangkok');
			$date = date("Y-m-d");
			$unique = substr(uniqid(rand(), true), 0, 25);
			$_SESSION['SESS_MEMBER_unique'] = $unique;
			$LoginModel->InsertSession($_SESSION['SESS_MEMBER_ID'], $unique, $date);
			// 	if(	$_SESSION['SESS_MEMBER_POS'] =="Administration"){
			echo $_SESSION['res'] = $_SESSION['SESS_MEMBER_ID'] . "_" . $unique;
			//   }else{
			//       	echo "document";
			//   }


		} else {
			echo $_SESSION['res'] = "0";
		}

		//	$LoginModel = $this->loadModel('LoginModel');
		//$data = $LoginModel->getData($un,$pw);
		//	print_r($data);


	}


	public function LoginAccountMain()
	{
		//print_r($_POST);

		$un = $_GET["un"];
		$pw = md5($_GET["pw"]);
		$LoginModel = $this->loadModel('LoginModel');
		$data = $LoginModel->getData($un, $pw);
		foreach ($data as $app) {
			if (isset($app->userid))
				$userid = $app->userid;
			if (isset($app->username))
				$username = $app->username;
			if (isset($app->fullname))
				$fullname = $app->fullname;
			if (isset($app->contact))
				$contact = $app->contact;
			if (isset($app->position))
				$Position = $app->position;
			if (isset($app->company))
				$company = $app->company;
			if (isset($app->department))
				$department = $app->department;
			if (isset($app->profile))
				$profile = $app->profile;
			if (isset($app->cid))
				$cid = $app->cid;
			if (isset($app->depid))
				$depid = $app->depid;
			$_SESSION['SESS_MEMBER_POS'] = $Position;
			$_SESSION['SESS_MEMBER_ID'] = $userid;
			$_SESSION['SESS_MEMBER_Fname'] = $fullname;
			$_SESSION['SESS_MEMBER_contact'] = $contact;
			$_SESSION['SESS_MEMBER_Username'] = $username;
			$_SESSION['SESS_MEMBER_department'] = $department;
			$_SESSION['SESS_MEMBER_company'] = $company;
			$_SESSION['SESS_MEMBER_pic'] = $profile;
			$_SESSION['SESS_MEMBER_cid'] = $cid;
			$_SESSION['SESS_MEMBER_depid'] = $depid;
		}

		$totalUser = $LoginModel->CheckAccountLogin($un, $pw);
		//echo $totalUser;
		if ($totalUser == 1) {

			$LoginModel->DeleteSession($_SESSION['SESS_MEMBER_ID']);
			date_default_timezone_set('Asia/Bangkok');
			$date = date("Y-m-d");
			$unique = substr(uniqid(rand(), true), 0, 25);
			$_SESSION['SESS_MEMBER_unique'] = $unique;
			$LoginModel->InsertSession($_SESSION['SESS_MEMBER_ID'], $unique, $date);
			if ($_SESSION['SESS_MEMBER_POS'] == "Administration") {

				header("Location: <?php BASE_URL ?>/Request/ApproveRequest");
			} else {
				header("Location: <?php BASE_URL ?>/Document/In");
			}
		} else {
			echo '
			
			  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
             <script src="<?php BASE_URL ?>/public/js/jquery.js">	</script>
             <script src="<?php BASE_URL ?>/public/js/sweetalert2.all.min.js"></script>
             <script>
             $(document).ready(function() {
                 Swal.fire({
                    title: "Warning!",
                    text: "Please check your Credentials!",
                    icon: "error"
                }).then(function() {
                    
                    window.location = "https://intranet.aifgrouplaos.com/#features";
                });
                 
             });
             </script>
             ';
		}

		//	$LoginModel = $this->loadModel('LoginModel');
		//$data = $LoginModel->getData($un,$pw);
		//	print_r($data);


	}
}
