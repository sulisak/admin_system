<?php
Session_Start();
require './application/controller/EmailController.php';

if (isset($_SESSION['SESS_MEMBER_POS'])) {
	if ($_SESSION['SESS_MEMBER_POS'] == "Administration") {


		class Stationary extends Controller
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


						$CleaningModel = $this->loadModel('CleaningModel');
						$listbusiness = $CleaningModel->loadcompany();
						$StationaryModel = $this->loadModel('StationaryModel');
						$cat = $StationaryModel->Loadcategory();




						require 'application/views/_templates/header.php';
						require 'application/views/_templates/nav.php';
						require 'application/views/stationary/index.php';
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

			public function LoadData()
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




						$StationaryModel = $this->loadModel('StationaryModel');
						$list1 = $StationaryModel->LoadRequest();
						//print_r($list1);
						require 'application/views/stationary/request.php';
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











			public function LoadProduct()
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




						$catid = $_GET["catid"];
						$StationaryModel = $this->loadModel('StationaryModel');
						$list1 = $StationaryModel->loadStock($catid);

						echo
						'<b>Product /<span class="laotext">ຊື່ອຸປະກອນ</span></b>
						<div class="input-group mb-3">
						  <select class="form-control" name="barcode" id="barcode" required>';
						echo '<option value="0">--Select Product/<span class="laotext">ເລືອກອຸປະກອນ</span>--</option>';
						foreach ($list1 as $app) {
							if (isset($app->barcode)) {
								$barcode = $app->barcode;
							} else {
								$barcode = "";
							}
							if (isset($app->pname)) {
								$pname = $app->pname;
							} else {
								$pname = "";
							}
							if (isset($app->qty)) {
								$qty  = $app->qty;
							} else {
								$qty  = "";
							}
							if (isset($app->id)) {
								$id = $app->id;
							} else {
								$id = "";
							}
							// $pname = strlen($pname) > 50 ? substr($pname,0,50)."..." : $pname;


							echo '<option value="' . $id . '">' . $barcode . ' - Name: ' . $pname . '</option>';
						}

						echo '
						  </select>
						  <div class="input-group-append">
							<span class="input-group-text"><i class="fas fa-id-card"></i></span>
						  </div>
						</div>
						<script type="text/javascript">
							$(document).ready(function() {
							$("#barcode").change(function(){

							var barcode=$("#barcode").val();
							if(barcode==0){
								$("#save").hide();
								$("#addreq").hide();
							}else{
								$("#save").show();
								$("#addreq").show();
							}

							return false;


						});



					});

					</script>


						';
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




			public function LoadStock()
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




						$cid = $_GET["cid"];
						$StationaryModel = $this->loadModel('StationaryModel');
						$list1 = $StationaryModel->LoadData($cid);

						echo
						'<b>User/<span class="laotext">ຜູ້ໃຊ້</b>
						<div class="input-group mb-3">
						  <select class="form-control" name="userid" id="userid" required>';
						echo '<option value="0">--Select User/<span class="laotext">ເລືອກຜູ້ໃຊ້</span> --</option>';
						foreach ($list1 as $app) {
							if (isset($app->userid)) {
								$id = $app->userid;
							} else {
								$id = "";
							}
							if (isset($app->userid)) {
								$userid = $app->userid;
							} else {
								$userid = "";
							}
							if (isset($app->username)) {
								$username  = $app->username;
							} else {
								$username  = "";
							}
							if (isset($app->fullname)) {
								$fullname = $app->fullname;
							} else {
								$fullname = "";
							}
							if (isset($app->pname)) {
								$pname = $app->pname;
							} else {
								$pname = "";
							}
							if (isset($app->contact)) {
								$contact = $app->contact;
							} else {
								$contact = "";
							}
							if (isset($app->Email)) {
								$Email = $app->Email;
							} else {
								$Email = "";
							}
							if (isset($app->profile)) {
								$profile = $app->profile;
							} else {
								$profile = "";
							}
							if (isset($app->company)) {
								$company = $app->company;
							} else {
								$company = "";
							}
							if (isset($app->department)) {
								$department = $app->department;
							} else {
								$department = "";
							}
							echo '<option value="' . $userid . '">' . $fullname . ' - (' . $department . ')</option>';
						}

						echo '
						  </select>
						  <div class="input-group-append">
							<span class="input-group-text"><i class="fas fa-id-card"></i></span>
						  </div>
						</div>';
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






			public function AddData()
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
						$id = $_POST["id"];
						$cid = $_POST["cid"];
						$userid = $_POST["userid"];
						$catid = $_POST["catid"];
						$qty = $_POST["qty"];
						$dateneed = $_POST["dateneed"];
						$barcode = $_POST["barcode"];
						$remark = $_POST["remark"];



						$StationaryModel = $this->loadModel('StationaryModel');
						$totalqty = 0;
						$totalqty = $StationaryModel->CheckBarcode($barcode);


						if ($totalqty >= $qty) {
							$total = 0;
							$total = $StationaryModel->CheckDuplicate($id);
							if ($total == 0) {
								$unitprice = 0;
								$unitprice = $StationaryModel->getUnitBarcode($barcode);

								$totalcost = $qty * $unitprice;
								$StationaryModel->Updateproduct($barcode, $qty);
								$date1 = date("Y-m-d H:i:s");
								$StationaryModel->AddData($id, $userid, $barcode, $qty, $dateneed, $date1, $remark, $totalcost);

								$StockModel = $this->loadModel('StockModel');
								$productid = $barcode;
								$unitprice = 0;
								$unitprice = $StockModel->getunitprice($productid);
								$datein = date("Y-m-d H:i:s");
								$newqty = $qty * -1;
								$Totalcost = ($newqty *  $unitprice);
								$StockModel->AddStock($productid, $newqty, $unitprice, $Totalcost, $datein, $userid);
								echo "Create Successfully!";
							} else {
								echo "<i style='color:red'>Already Exist!</i>";
							}
						} else {
							echo "<i style='color:red'>Insufficient stock. Available stock is/ເຄື່ອງທີ່ທ່ານເບີກບໍ່ພຽງພໍ.ຍັງເຫຼືອແມ່ນ: " . $totalqty . "</i>";
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


			// public function AppLine()
			// {



			// 	 if(isset($_SESSION['SESS_MEMBER_ID'])){$Sid=$_SESSION['SESS_MEMBER_ID'];}else{$Sid='';}
			// 		if($Sid=="" ){
			// 				$LoginModel = $this->loadModel('LoginModel');
			// 				$companylist = $LoginModel->getCompany();
			// 				require 'application/views/login/index.php';
			// 		}else{

			// 			date_default_timezone_set('Asia/Bangkok');
			// 			$date =date("Y-m-d");
			// 			$userId=$Sid;
			// 			$token=$_SESSION['SESS_MEMBER_unique'];
			// 			$dashboard_model = $this->loadModel('DashboardModel');
			// 			$LogUser = $dashboard_model->CheckAccount($userId, $token, $date);
			// 			//echo $LogUser;
			// 			if ($LogUser==1){

			// 				//print_r($_POST);
			// 				$id = $_GET["id"];



			// 				$date1 =date("Y-m-d H:i:s");
			// 				$StationaryModel = $this->loadModel('StationaryModel');
			// 				$StationaryModel->ApproveLine($id,$date1, $userId);
			// 				$StationaryModel->updateStatus($id,'Approved by Line Manager');
			// 				$listEmail=$StationaryModel->getRequestEmail($id);

			// 				echo "Approved Successfully!";
			// 		        foreach ($listEmail as $app) {
			// 			     if (isset($app->id)){  $id= $app->id;}else{$id="";}
			// 				 if (isset($app->reqCode)){  $reqCode= $app->reqCode;}else{$reqCode="";}
			// 				 if (isset($app->Email)){  $Email= $app->Email;}else{$Email="";}

			// 			                                            	$subject = "Approved Request Stationary";
			// 															$header  = 'MIME-Version: 1.0' . "\r\n";
			// 															$header .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			// 															$header .= "From:AIF GROUP EMAIL AUTOMATION";
			// 															$message1 = '<html xmlns="http://www.w3.org/1999/xhtml">
			// 																<head>
			// 																	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
			// 																	<title>Approved Request Vehicle </title>
			// 																	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
			// 																</head>
			// 																<body style="margin:0; padding:10px 0 0 0;" bgcolor="#F8F8F8">
			// 																<table align="center" border="0" cellpadding="0" cellspacing="0" width="95%%">
			// 																	<tr>
			// 																		<td align="center">
			// 																			<table align="center" border="0" cellpadding="0" cellspacing="0" width="600"
			// 																				   style="border-collapse: separate; border-spacing: 2px 5px; box-shadow: 1px 0 1px 1px #B8B8B8;"
			// 																				   bgcolor="#FFFFFF">
			// 																				<tr>
			// 																					<td align="center" style="padding: 0px 0px 0px 0x;">
			// 																							<br><br>
			// 																							<img src="https://aif-adminsystem.asia-erp.com/public/img/aif_favicon.png" alt="Logo"/>
			// 																					<br>
			// 																					<h4>Approved Request Stationary</h4>
			// 																					============================================================================

			// 																					</td>
			// 																				</tr>


			// 																			   <tr>
			// 																				<td>
			// 																				<table style="padding: 0px 30px 0px 30px;">
			// 																					<tr class="service">
			// 																					<td ><b>Request Code: </b> '.($reqCode).'</td>
			// 																					</tr>
			// 																					<tr class="service">
			// 																					<td ><b>Approved by Line Manager: </b> '.($_SESSION["SESS_MEMBER_Fname"]).'</td>
			// 																					</tr>




			// 																				</table>


			// 																				</td>
			// 																				</tr>
			// 																				<tr>
			// 																				<td style="padding: 10px 30px 40px 30px;">
			// 																				=============================================================================
			// 																				<br><br><br>
			// 																				</td>
			// 																				</tr>

			// 																			</table>
			// 																		</td>
			// 																	</tr>
			// 																</table>
			// 																</body>
			// 																</html>';


			// 																mail($Email,$subject,$message1,$header);
			// 																$RequestModel = $this->loadModel('RequestModel');

			//                                     					        $listemail=$RequestModel->loadUsersAdmin();
			//     			                                            	foreach ($listemail as $app) {
			//     				                                            	if (isset($app->Email ))  $adminEmail = $app->Email ;
			//     			                                            	    	mail($adminEmail,$subject,$message1,$header);
			//     			                                            	}


			// 		        }



			// 			}else{
			// 				session_unset();
			// 				session_destroy();


			// 					echo '
			// 					<script src="'. URL .'public/js/jquery.js"></script>
			// 					<script>
			// 								alert("logging off");
			// 								 window.location.href ="'. URL .'";
			// 							</script>
			// 				';
			// 			}
			// 		}

			// }
			public function AdminLine()
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

						//print_r($_POST);
						$id = $_GET["id"];



						$date1 = date("Y-m-d H:i:s");
						$StationaryModel = $this->loadModel('StationaryModel');
						$StationaryModel->ApproveAdmin($id, $userId, $date1);
						$StationaryModel->updateStatus($id, 'Approved by Admin');
						$listEmail = $StationaryModel->getRequestEmail($id);

						//echo "Approved Successfully!";
						foreach ($listEmail as $app) {

							$id = isset($app->id) ?  $app->id : '';
							$reqCode = isset($app->reqCode) ?  $app->reqCode : '';
							$Email = isset($app->Email) ?  $app->Email : '';
							$requester_name = isset($app->requester_name) ? $app->requester_name : '';
							$daterequest = isset($app->daterequest) ? $app->daterequest : '';
							$remarks = isset($app->remarks) ? $app->remarks : '';
							$qty_request = isset($app->qty_request) ? $app->qty_request : '';
							$pname = isset($app->pname) ? $app->pname : '';
						}
						// send notification to eamil requestor

						// email finction close temporary and reopen when email migrate done ============
						// $msg = 'Your stationary was approved by Admin';
						// // send SMTP
						// $UserData = new SendMail\RequestUser_stationary_request('' . URL_REQUESTER . 'Stationary', $msg, $reqCode, $requester_name, $pname, $qty_request, $daterequest, $remarks);
						// $templete = $UserData->getUser_admin_approve();
						// $email =  new SendMail\ConfigMail($Email, 'Approve Stationary by Admin');
						// $email->getSendEamil($email->ApproveEamil_stationary($templete));

						// echo "Approved Successfully!";
	// email finction close temporary and reopen when email migrate done ============

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

			public function gavebyStat()
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

						//print_r($_POST);
						$id = $_GET["id"];



						$date1 = date("Y-m-d H:i:s");
						$StationaryModel = $this->loadModel('StationaryModel');
						$StationaryModel->gavebyStat($id, $date1, $userId);
						$StationaryModel->updateStatus($id, 'Completed');
						echo "Update Successfully!";
						$listEmail = $StationaryModel->getRequestEmail($id);
						foreach ($listEmail as $app) {
							if (isset($app->id)) {
								$id = $app->id;
							} else {
								$id = "";
							}
							if (isset($app->reqCode)) {
								$reqCode = $app->reqCode;
							} else {
								$reqCode = "";
							}
							if (isset($app->Email)) {
								$Email = $app->Email;
							} else {
								$Email = "";
							}

							$subject = "Receipt Request Stationary";
							$header  = 'MIME-Version: 1.0' . "\r\n";
							$header .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
							$header .= "From:AIF GROUP EMAIL AUTOMATION";
							$message1 = '<html xmlns="http://www.w3.org/1999/xhtml">
																	<head>
																		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
																		<title>Receipt Request Vehicle </title>
																		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
																	</head>
																	<body style="margin:0; padding:10px 0 0 0;" bgcolor="#F8F8F8">
																	<table align="center" border="0" cellpadding="0" cellspacing="0" width="95%%">
																		<tr>
																			<td align="center">
																				<table align="center" border="0" cellpadding="0" cellspacing="0" width="600"
																					   style="border-collapse: separate; border-spacing: 2px 5px; box-shadow: 1px 0 1px 1px #B8B8B8;"
																					   bgcolor="#FFFFFF">
																					<tr>
																						<td align="center" style="padding: 0px 0px 0px 0x;">
																								<br><br>
																								<img src="https://aif-adminsystem.asia-erp.com/public/img/aif_favicon.png" alt="Logo"/>
																						<br>
																						<h4>Receipt Request Stationary</h4>
																						============================================================================

																						</td>
																					</tr>


																				   <tr>
																					<td>
																					<table style="padding: 0px 30px 0px 30px;">
																						<tr class="service">
																						<td ><b>Request Code: </b> ' . ($reqCode) . '</td>
																						</tr>
																						<tr class="service">
																						<td ><b>Gave By: </b> ' . ($_SESSION["SESS_MEMBER_Fname"]) . '</td>
																						</tr>




																					</table>


																					</td>
																					</tr>
																					<tr>
																					<td style="padding: 10px 30px 40px 30px;">
																					=============================================================================
																					<br><br><br>
																					</td>
																					</tr>

																				</table>
																			</td>
																		</tr>
																	</table>
																	</body>
																	</html>';


							mail($Email, $subject, $message1, $header);
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

			public function cancelRequest()
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

						//print_r($_POST);
						$id = $_GET["id"];
						$date1 = date("Y-m-d H:i:s");
						$StationaryModel = $this->loadModel('StationaryModel');
						$StationaryModel->updateStatus($id, 'Cancelled');
						// $id=$StationaryModel->get_adminid($id,$status);
						// print_r($id);

						$StationaryModel->cancelline($id, $date1);
						// $list = $StationaryModel->getRequestEmail($id);
						// foreach ($list	 as $app) {
						// 	if (isset($app->given)) {
						// 		$given = $app->given;
						// 	} else {
						// 		$given = "";
						// 	}
						// 	if (isset($app->adminid)) {
						// 		$adminid = $app->adminid;
						// 	} else {
						// 		$adminid = "";
						// 	}
						// 	if (isset($app->lineManagerid)) {
						// 		$lineManagerid = $app->lineManagerid;
						// 	} else {
						// 		$lineManagerid = "";
						// 	}
						// 	if (isset($app->reqqty)) {
						// 		$reqqty = $app->reqqty;
						// 	} else {
						// 		$reqqty = "";
						// 	}
						// 	if (isset($app->productid)) {
						// 		$productid = $app->productid;
						// 	} else {
						// 		$productid = "";
						// 	}
						//if($given==0){
						$StationaryModel->UpdateproductReturn($productid, $reqqty);

						$StockModel = $this->loadModel('StockModel');
						$unitprice = 0;
						$unitprice = $StockModel->getunitprice($productid);

						$datein = date("Y-m-d H:i:s");

						$newqty = $reqqty;
						$Totalcost = $newqty *  $unitprice;
						$StockModel->AddStock($productid, $newqty, $unitprice, $Totalcost, $datein,$userId);


						$listEmail = $StationaryModel->getRequestEmail($id);

						foreach ($listEmail as $app) {

							$id = isset($app->id) ?  $app->id : '';
							$reqCode = isset($app->reqCode) ?  $app->reqCode : '';
							$Email = isset($app->Email) ?  $app->Email : '';
							$requester_name = isset($app->requester_name) ? $app->requester_name : '';
							$daterequest = isset($app->daterequest) ? $app->daterequest : '';
							$remarks = isset($app->remarks) ? $app->remarks : '';
							$qty_request = isset($app->qty_request) ? $app->qty_request : '';
							$pname = isset($app->pname) ? $app->pname : '';
						}
						// email function ===================
						// foreach ($listEmail as $app) {

						// 	$id = isset($app->id) ?  $app->id : '';
						// 	$reqCode = isset($app->reqCode) ?  $app->reqCode : '';
						// 	$Email = isset($app->Email) ?  $app->Email : '';
						// 	$requester_name = isset($app->requester_name) ? $app->requester_name : '';
						// 	$daterequest = isset($app->daterequest) ? $app->daterequest : '';
						// 	$remarks = isset($app->remarks) ? $app->remarks : '';
						// 	$qty_request = isset($app->qty_request) ? $app->qty_request : '';
						// 	$pname = isset($app->pname) ? $app->pname : '';
						// }
						// // send notification to eamil requestor
						// $msg = 'Your stationary request was rejected by Admin';
						// // send SMTP
						// $UserData = new SendMail\RequestUser_stationary_request('' . URL_REQUESTER . 'Stationary', $msg, $reqCode, $requester_name, $pname, $qty_request, $daterequest, $remarks);
						// $templete = $UserData->getUser_admin_approve();
						// $email =  new SendMail\ConfigMail($Email, 'Rejected stationary request by Admin');
						// $email->getSendEamil($email->RejectEamil_stationary($templete));
						// }

						echo "Cancelled Successfully!";
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
