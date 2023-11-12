<?php
Session_Start();
if (isset($_SESSION['SESS_MEMBER_POS'])) {
	if ($_SESSION['SESS_MEMBER_POS'] == "Administration") {


		class Category extends Controller
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
				if ($Sid == "") {
					$LoginModel = $this->loadModel('LoginModel');
					$companylist = $LoginModel->getCompany();
					require 'application/views/login/index.php';
				} else {

					date_default_timezone_set('Asia/Bangkok');
					$date = date("Y-m-d");
					$userId = $Sid;
					$token = $_SESSION['SESS_MEMBER_unique'];
					$dashboard_model = $this->loadModel('DashboardModel');
					$LogUser = $dashboard_model->CheckAccount($userId, $token, $date);
					//echo $LogUser;
					if ($LogUser == 1) {



						require 'application/views/_templates/header.php';
						require 'application/views/_templates/nav.php';
						require 'application/views/category/index.php';
					} else {


						session_unset();
						session_destroy();


						echo ' 
						<script src="' . URL . 'public/js/jquery.js"></script>
						<script>
									alert("logging off");
									 window.location.href ="' . URL . '";
								</script>	
					';
					}
				}
			}

			public function Loadcategory()
			{



				if (isset($_SESSION['SESS_MEMBER_ID'])) {
					$Sid = $_SESSION['SESS_MEMBER_ID'];
				} else {
					$Sid = '';
				}
				if ($Sid == "") {
					$LoginModel = $this->loadModel('LoginModel');
					$companylist = $LoginModel->getCompany();
					require 'application/views/login/index.php';
				} else {

					date_default_timezone_set('Asia/Bangkok');
					$date = date("Y-m-d");
					$userId = $Sid;
					$token = $_SESSION['SESS_MEMBER_unique'];
					$dashboard_model = $this->loadModel('DashboardModel');
					$LogUser = $dashboard_model->CheckAccount($userId, $token, $date);
					//echo $LogUser;
					if ($LogUser == 1) {

						$CategoryModel = $this->loadModel('CategoryModel');
						$listcategory = $CategoryModel->loadcategory();
						// 	print_r($listcategory);
						require 'application/views/category/category.php';
					} else {
						session_unset();
						session_destroy();


						echo ' 
						<script src="' . URL . 'public/js/jquery.js"></script>
						<script>
									alert("logging off");
									 window.location.href ="' . URL . '";
								</script>	
					';
					}
				}
			}


			public function Updatecategory()
			{

				if (isset($_SESSION['SESS_MEMBER_ID'])) {
					$Sid = $_SESSION['SESS_MEMBER_ID'];
				} else {
					$Sid = '';
				}
				if ($Sid == "") {
					$LoginModel = $this->loadModel('LoginModel');
					$companylist = $LoginModel->getCompany();
					require 'application/views/login/index.php';
				} else {

					date_default_timezone_set('Asia/Bangkok');
					$date = date("Y-m-d");
					$userId = $Sid;
					$token = $_SESSION['SESS_MEMBER_unique'];
					$dashboard_model = $this->loadModel('DashboardModel');
					$LogUser = $dashboard_model->CheckAccount($userId, $token, $date);
					//echo $LogUser;
					if ($LogUser == 1) {

						// print_r($_GET);
						$id = isset($_GET["id"]) ? $_GET["id"] : '';
						$categoryname = isset($_GET["categoryname"]) ? $_GET["categoryname"] : '';

						// load model
						$CategoryModel = $this->loadModel('CategoryModel');

						$categoryname = strtoupper($categoryname);

						$totalcategory = 0;
						$totalcategory = $CategoryModel->CheckcategoryandID($id, $categoryname);
						if ($totalcategory == 0) {
							$totalcategory1 = 0;
							$totalcategory1 = $CategoryModel->CheckcategoryandnotID($id, $categoryname);
							if ($totalcategory1 == 0) {
								$CategoryModel->Updatecategory($categoryname, $id);
								echo "Update Successfully!";
							} else {
								//exist
								echo "Already Exit!";
							}
						} else {
							echo "exit";
						}
					} else {
						session_unset();
						session_destroy();
						echo ' 
						<script src="' . URL . 'public/js/jquery.js"></script>
						<script>
									alert("logging off");
									 window.location.href ="' . URL . '";
								</script>	
					';
					}
				}
			}



			public function Addcategory()
			{



				if (isset($_SESSION['SESS_MEMBER_ID'])) {
					$Sid = $_SESSION['SESS_MEMBER_ID'];
				} else {
					$Sid = '';
				}
				if ($Sid == "") {
					$LoginModel = $this->loadModel('LoginModel');
					$companylist = $LoginModel->getCompany();
					require 'application/views/login/index.php';
				} else {

					date_default_timezone_set('Asia/Bangkok');
					$date = date("Y-m-d");
					$userId = $Sid;
					$token = $_SESSION['SESS_MEMBER_unique'];
					$dashboard_model = $this->loadModel('DashboardModel');
					$LogUser = $dashboard_model->CheckAccount($userId, $token, $date);
					//echo $LogUser;
					if ($LogUser == 1) {

						$categoryname = $_POST["categoryname"];
						$CategoryModel = $this->loadModel('CategoryModel');
						$total = 0;
						$total = $CategoryModel->Checkcategory($catid);

						//echo $total;
						if ($total == 0) {
							$CategoryModel->Addcategory($categoryname);

							echo " Create Successfully!!";
						} else {
							echo " Already Exits!";
						}
					} else {
						session_unset();
						session_destroy();


						echo ' 
						<script src="' . URL . 'public/js/jquery.js"></script>
						<script>
									alert("logging off");
									 window.location.href ="' . URL . '";
								</script>	
					';
					}
				}
			}
		}
	}
} else {
	session_unset();
	session_destroy();


	echo ' 
		<script src="' . URL . 'public/js/jquery.js"></script>
		<script>
				window.location.href ="' . URL . '";
				</script>	
	';
}
