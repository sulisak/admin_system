<?php
Session_Start();



class Dashboard extends Controller
{

	public function Details()
	{

		if (isset($_SESSION['SESS_MEMBER_POS'])) {
			if ($_SESSION['SESS_MEMBER_POS'] == "Administration") {

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

						$start = date("Y-m-d") . " 01:00:00";
						$end = date("Y-m-d") . " 23:59:59";
						$totalRequest = 0;
						$totalRequestBook = 0;
						$totalRequestStationary = 0;
						$totalRequest = $dashboard_model->getTotalRequest($start, $end);
						$totalRequestBook = $dashboard_model->getTotalRequestBook($start, $end);
						$totalRequestStationary = $dashboard_model->getTotalRequestStationary($start, $end);

						$totalUserActive = 0;
						$totalUserActive = $dashboard_model->getTotalActiveUsers($date);
						$listuser = $dashboard_model->ActiveUsers($start, $end);

						if (isset($_POST["startsearch"])) {
							$startsearch = $_POST["startsearch"];
						} else {
							$startsearch = date("Y-m-d");
						}
						if (isset($_POST["endsearch"])) {
							$endsearch = $_POST["endsearch"];
						} else {
							$endsearch = date("Y-m-d");
						}

						$totalPending = 0;
						$totalPending = $dashboard_model->PendingRequest($startsearch . " 01:00:00", $endsearch . " 23:59:59");

						$totalComplete = 0;
						$totalComplete = $dashboard_model->CompleteRequest($startsearch . " 01:00:00", $endsearch . " 23:59:59");

						$totalCancel = 0;
						$totalCancel = $dashboard_model->CancelRequest($startsearch . " 01:00:00", $endsearch . " 23:59:59");

						$listtop = $dashboard_model->LoadToptreeVehiclerequest($startsearch . " 01:00:00", $endsearch . " 23:59:59");

						$totalCost = 0;
						$totalCost = $dashboard_model->totalCostMaintainance($startsearch, $endsearch);


						$totalMPending = 0;
						$totalMPending = $dashboard_model->totalPendingMaintainance($startsearch, $endsearch);


						$listtopcost = $dashboard_model->LoadToptreeVehicleCost($startsearch, $endsearch);



						$totalFuel = 0;
						$totalFuel = $dashboard_model->totalFuelCost($startsearch, $endsearch);

						$lastmonthstart = date("Y-m-d", strtotime($startsearch . ' -1 months'));
						$lastmonthend = date("Y-m-d", strtotime($endsearch . ' -1 months'));

						$totalFuellast = 0;
						$totalFuellast = $dashboard_model->totalFuelCostlast($lastmonthstart, $lastmonthend);

						$listtopcostfuel = $dashboard_model->LoadTopthreeVehicleFuelCost($startsearch, $endsearch);


						$totalBookPending = 0;
						$totalBookPending = $dashboard_model->totalbookPendingReq($startsearch . " 01:00:00", $endsearch . " 23:59:59");

						$totalBookcomplete = 0;
						$totalBookcomplete = $dashboard_model->totalbookCompleteReq($startsearch . " 01:00:00", $endsearch . " 23:59:59");


						$totalBookcancel = 0;
						$totalBookcancel = $dashboard_model->totalbookCancelReq($startsearch . " 01:00:00", $endsearch . " 23:59:59");



						$listtop3meetingroom = $dashboard_model->LoadTopthreeMostRoom($startsearch . " 01:00:00", $endsearch . " 23:59:59");



						$totalStationPending = 0;
						$totalStationPending = $dashboard_model->totalStationaryPendingReq($startsearch . " 01:00:00", $endsearch . " 23:59:59");



						$totalStationCompleted = 0;
						$totalStationCompleted = $dashboard_model->totalStationaryCompletedReq($startsearch . " 01:00:00", $endsearch . " 23:59:59");


						$totalStationCancelled = 0;
						$totalStationCancelled = $dashboard_model->totalStationaryCancelledReq($startsearch . " 01:00:00", $endsearch . " 23:59:59");

						$listtop3item = $dashboard_model->LoadTopthreeMostItem($startsearch . " 01:00:00", $endsearch . " 23:59:59");



						require 'application/views/_templates/header.php';
						require 'application/views/_templates/nav.php';
						require 'application/views/dashboard/dash.php';
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
	}


	public function index()
	{
		if (isset($_SESSION['SESS_MEMBER_POS'])) {
			if ($_SESSION['SESS_MEMBER_POS'] == "Administration") {

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
						$Setup_Model = $this->loadModel('SetupModel');
						$makerlist = $Setup_Model->loadVehicleMaker();
						// print_r($makerlist);


						require 'application/views/_templates/header.php';
						require 'application/views/_templates/nav.php';
						require 'application/views/dashboard/index.php';
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
	}


	public function Updatestat()

	{

		if (isset($_SESSION['SESS_MEMBER_POS'])) {
			if ($_SESSION['SESS_MEMBER_POS'] == "Administration") {

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

						//print_r($_GET);
						$st = $_GET["st"];
						$vid = $_GET["id"];
						$dashboard_model->updatestatus($st, $vid);
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
	}

	public function ReportVehicle()
	{

		if (isset($_SESSION['SESS_MEMBER_POS'])) {
			if ($_SESSION['SESS_MEMBER_POS'] == "Administration") {

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
						$Setup_Model = $this->loadModel('SetupModel');
						$makerlist = $Setup_Model->loadVehicleMaker();
						// print_r($makerlist);


						require 'application/views/_templates/header.php';
						require 'application/views/_templates/nav.php';
						require 'application/views/dashboard/reportvehicle.php';
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
	}

	public function UpdateVehicleForm()
	{

		if (isset($_SESSION['SESS_MEMBER_POS'])) {
			if ($_SESSION['SESS_MEMBER_POS'] == "Administration") {

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
						$SetupModel = $this->loadModel('SetupModel');
						$makerlist = $SetupModel->loadVehicleMaker();
						//print_r($makerlist);
						$vid = $_GET["id"];
						$uplist = $dashboard_model->getUpdateVehicle($vid);
						//print_r($uplist);
						require 'application/views/_templates/header.php';
						require 'application/views/_templates/nav.php';
						require 'application/views/dashboard/updatevehicle.php';
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
	}



	public function getData()

	{
		if (isset($_SESSION['SESS_MEMBER_POS'])) {
			if ($_SESSION['SESS_MEMBER_POS'] == "Administration") {
				$vid = $_GET["id"];
				$dashboard_model = $this->loadModel('DashboardModel');

				$Setup_Model = $this->loadModel('SetupModel');
				$makerlist = $Setup_Model->loadVehicleMaker();

				$uplist = $dashboard_model->getUpdateVehicle($vid);
				foreach ($uplist as $app) {

					$vid = isset($app->vid) ? $app->vid : 0;
					$vin = isset($app->vin) ? $app->vin : 0;
					$vyear = isset($app->vyear) ? $app->vyear : '';
					$maker = isset($app->maker) ? $app->maker : '';
					$model = isset($app->model) ? $app->model : '';
					$vcolor = isset($app->vcolor) ? $app->vcolor : '';
					$plate = isset($app->plate) ? $app->plate : '';
					$maxpassenger = isset($app->maxpassenger) ? $app->maxpassenger : '';
					$transmission = isset($app->transmission) ? $app->transmission : '';
					$engine = isset($app->engine) ? $app->engine : '';
					$tankcapacity = isset($app->tankcapacity) ? $app->tankcapacity : '';
					$fueltype = isset($app->fueltype) ? $app->fueltype : '';
					$mileage = isset($app->mileage) ? $app->mileage : '';
					$makercar = isset($app->makercar) ? $app->makercar : '';
					$modelcar = isset($app->modelcar) ? $app->modelcar : '';
					$changeoil = isset($app->changeoil) ? $app->changeoil : '';
					$LaoType = isset($app->LaoType) ? $app->LaoType : '';
					$LaoRenew = isset($app->LaoRenew) ? $app->LaoRenew : '';
					$LaoInsureExpired = isset($app->LaoInsureExpired) ? $app->LaoInsureExpired : '';
					$ThaiType = isset($app->ThaiType) ? $app->ThaiType : '';
					$ThaiRenew = isset($app->ThaiRenew) ? $app->ThaiRenew : '';
					$ThaiExpired = isset($app->ThaiExpired) ? $app->ThaiExpired : '';
					$CarInsExpired = isset($app->CarInsExpired) ? $app->CarInsExpired : '';
					$RoadTaxExpire = isset($app->RoadTaxExpire) ? $app->RoadTaxExpire : '';
					$BusinessUnit = isset($app->BusinessUnit) ? $app->BusinessUnit : '';
					$fuelcons = isset($app->fuelcons) ? $app->fuelcons : '';

					date_default_timezone_set('Asia/Bangkok');
					$CURR = date("Y-m-d");
					$CURR = strtotime($CURR);
					$CURR = date("Y-m-d", strtotime("+1 month", $CURR));
					if (($LaoInsureExpired) > ($CURR)) {
						$bgl = "#fff";
					} else {
						$bgl = '#eca3aa';
					}
					if (($ThaiExpired) > ($CURR)) {
						$bgt = "#fff";
					} else {
						$bgt = '#eca3aa';
					}
					if ($CarInsExpired >  $CURR) {
						$bgc = "#fff";
					} else {
						$bgc = '#eca3aa';
					}
					if ($RoadTaxExpire > $CURR) {
						$bgr = "#fff";
					} else {
						$bgr = '#eca3aa';
					} ?>


					<div class="row">
						<div class="col-md-4">
							VIN
							<div class="input-group mb-3">
								<input type="hidden" class="form-control" name="vid" required value="<?php $vid ?>">
								<input type="text" disabled style="background:#fff" class="form-control" name="vin" required Placeholder="Enter VIN" value="<?= $vin ?>">
							</div>
						</div>
						<div class="col-md-4">
							Maker
							<div class="input-group mb-3">
								<select class="form-control" disabled style="background:#fff" disabled="disabled" name="maker" id="maker">
									<option disabled="disabled" selected="selected" value="">Current :<?= $makercar ?></option>

									<?php foreach ($makerlist as $app) {

										if (isset($app->makerid))  $makerid = $app->makerid;
										if (isset($app->makername))  $makername = $app->makername;
										echo '<option value="' . $makerid . '">' . $makername . '</option>';
									} ?>

								</select>
							</div>
						</div>
						<div class="col-md-4">
							<div id="model"> Model<br>
								<?= $modelcar ?></div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-4">
							Year
							<div class="input-group mb-3">
								<input type="text" class="form-control" disabled style="background:#fff" name="year" required Placeholder="Enter year" value="<?= $vyear ?>">
							</div>
						</div>
						<div class="col-md-4">
							Color
							<div class="input-group mb-3">
								<input type="text" class="form-control" disabled style="background:#fff" name="color" required Placeholder="Enter color" value="<?= $vcolor ?>">
							</div>
						</div>
						<div class="col-md-4">
							Plate Number
							<div class="input-group mb-3">
								<input type="text" class="form-control" disabled style="background:#fff" name="plate" required Placeholder="Enter plate" value="<?= $plate ?>">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							Transmission
							<div class="input-group mb-3">
								<select class="form-control" disabled style="background:#fff" name="transmission" required>
									<option disabled="disabled" selected="selected" value="<?= $transmission ?>">
										Current : <?= $transmission ?> </option>
									<option value="Manual">Manual</option>
									<option value="Automatic">Automatic</option>
								</select>
							</div>
						</div>
						<div class="col-md-4">
							Engine Size
							<div class="input-group mb-3">
								<input type="text" class="form-control" name="engine" disabled style="background:#fff" required Placeholder="Enter egine size" value="<?= $engine ?>">
							</div>
						</div>
						<div class="col-md-4">
							Tank capacity
							<div class="input-group mb-3">
								<input type="number" class="form-control" name="tank" disabled style="background:#fff" required Placeholder="Enter tank capacity" value="<?= $tankcapacity ?>">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							Fuel Type
							<div class="input-group mb-3">
								<select class="form-control" name="fuel" disabled style="background:#fff" required>
									<option disabled="disabled" selected="selected" value="<?= $fueltype ?>">
										Current : <?= $fueltype ?> </option>
									<option value="BioDiesel">BioDiesel</option>
									<option value="Diesel">Diesel</option>
									<option value="Regular">Regular</option>
									<option value="Super">Super</option>
								</select>
							</div>
						</div>
						<div class="col-md-4">
							ODM
							<div class="input-group mb-3">
								<input type="number" class="form-control" disabled style="background:#fff" name="mileage" required Placeholder="Enter mileage" value="<?= $mileage ?>">
							</div>
						</div>
						<div class="col-md-4">
							Max Passenger
							<div class="input-group mb-3">
								<input type="number" class="form-control" disabled style="background:#fff" name="maxpassenger" required Placeholder="Enter max passenger" value="<?= $maxpassenger ?>">
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-4">
							Lao Insurance Type
							<div class="input-group mb-3">
								<input type="Text" class="form-control" disabled style="background:#fff" name="laotype" required value="<?= $LaoType ?>" Placeholder="Enter Lao Insurance  Type">
							</div>
						</div>
						<div class="col-md-4">
							Lao Insurance Renew Date
							<div class="input-group mb-3">
								<input type="date" class="form-control" disabled style="background:#fff" name="laoInsren" value="<?= $LaoRenew ?>" required>
							</div>
						</div>
						<div class="col-md-4">
							Lao Insurance Expiration Date
							<div class="input-group mb-3">
								<input type="date" class="form-control" disabled style="background:<?= $bgl ?>" name="laoInsexp" value="<?= $LaoInsureExpired ?>" required>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-4">
							Thai Insurance Type
							<div class="input-group mb-3">
								<input type="text" class="form-control" disabled style="background:#fff" name="thaitype" value="<?= $ThaiType ?>" required Placeholder="Enter Thai Insurance  Type">
							</div>
						</div>
						<div class="col-md-4">
							Thai Insurance Renew Date
							<div class="input-group mb-3">
								<input type="date" class="form-control" disabled style="background:#fff" name="thaiInsrenew" value="<?= $ThaiRenew ?>" required>
							</div>
						</div>

						<div class="col-md-4">
							Thai Insurance Expiration Date
							<div class="input-group mb-3">
								<input type="date" class="form-control" disabled style="background:<?= $bgt ?>" name="thaiInsexp" value="<?= $ThaiExpired ?>" required>
							</div>
						</div>
					</div>


					<div class="row">
						<div class="col-md-4">
							Car Inspection Expiration Date
							<div class="input-group mb-3">
								<input type="date" class="form-control" disabled style="background:<?= $bgc ?>" required value="<?= $CarInsExpired ?>">
							</div>
						</div>
						<div class="col-md-4">
							Road Tax Expiration Date
							<div class="input-group mb-3">
								<input type="date" class="form-control" disabled style="background:<?= $bgr ?>" name="roadDate" required value="<?= $RoadTaxExpire ?>">
							</div>
						</div>
						<div class="col-md-4">
							Fuel consumption
							<div class="input-group mb-3">
								<input type="text" class="form-control" disabled style="background:#fff" name="fuelcons" required placeholder="Enter fuel consumption " value="<?= $fuelcons ?>">
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
							Change oil every
							<div class="input-group mb-3">
								<input type="number" class="form-control" disabled style="background:#fff" name="coil" required Placeholder="Enter change oil" value="<?= $changeoil ?>">
							</div>
						</div>
						<div class="col-md-6">
							Business Unit
							<div class="input-group mb-3">
								<input type="text" class="form-control" disabled style="background:#fff" name="location" required placeholder="Enter Business Unit " value="<?= $BusinessUnit ?>">
							</div>
						</div>
					</div>
					</div>
				<?php } ?>
				<h6> Remarks</h6>
				<div class="d-flex text-center">
					<Strong style="
						padding :10px ;
						color:#000;
						width: 200px;
						height: 40px;
						background: #eca3aa;
						-moz-border-radius: 100px / 50px;
						-webkit-border-radius: 100px / 50px;
						border-radius: 100px / 50px;
					    border: 1px solid #818181;
						margin-right:10px;
						font-size:10px;"> <i class="fas fa-times"></i> Expired & going to Expired</strong>
					<Strong style="
						padding :10px ;
						color:#000;
						width: 110px;
						height: 40px;
						background: #fff;
						-moz-border-radius: 100px / 50px;
						-webkit-border-radius: 100px / 50px;
						border-radius: 100px / 50px;
					    border: 1px solid #818181;
						margin-right:10px;
						font-size:10px;"><i class="fas fa-check"></i> Healthy</strong>

	<?php }
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
	}
	public function UpdateVehiclePro()
	{
		if (isset($_SESSION['SESS_MEMBER_POS'])) {
			if ($_SESSION['SESS_MEMBER_POS'] == "Administration") {
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

						$vid = isset($_POST['vid']) ? ($_POST['vid']) : 0;
						$year = isset($_POST['year']) ? ($_POST['year']) : '';
						$color = isset($_POST['color']) ? ($_POST['color']) : '';
						$plate = isset($_POST['plate']) ? ($_POST['plate']) : '';
						$engine = isset($_POST['engine']) ? ($_POST['engine']) : '';
						$tank = isset($_POST['tank']) ? ($_POST['tank']) : '';
						$mileage = isset($_POST['mileage']) ? ($_POST['mileage']) : '';
						$maxpassenger = isset($_POST['maxpassenger']) ? ($_POST['maxpassenger']) : '';
						$coil = isset($_POST['coil']) ? ($_POST['coil']) : '';
						$laotype = isset($_POST['laotype']) ? ($_POST['laotype']) : '';
						$laoInsren = isset($_POST['laoInsren']) ? ($_POST['laoInsren']) : '';
						$laoInsexp = isset($_POST['laoInsexp']) ? ($_POST['laoInsexp']) : '';
						$thaitype = isset($_POST['thaitype']) ? ($_POST['thaitype']) : '';
						$thaiInsrenew = isset($_POST['thaiInsrenew']) ? ($_POST['thaiInsrenew']) : '';
						$thaiInsexp = isset($_POST['thaiInsexp']) ? ($_POST['thaiInsexp']) : '';
						$Insdate = isset($_POST['Insdate']) ? ($_POST['Insdate']) : '';
						$roadDate = isset($_POST['roadDate']) ? ($_POST['roadDate']) : '';
						$fuelcons = isset($_POST['fuelcons']) ? ($_POST['fuelcons']) : '';
						$location = isset($_POST['location']) ? ($_POST['location']) : '';


						if (isset($_POST['transmission'])) {
							$transmission = ($_POST['transmission']);
							$dashboard_model->UpdateVehicleProTrans($vid, $transmission);
						} else {
							$transmission = '';
						}
						if (isset($_POST['fuel'])) {
							$fuel = ($_POST['fuel']);
							$dashboard_model->UpdateVehicleProFuel($vid, $fuel);
						} else {
							$fuel = '';
						}



						if ($_FILES["logo"]["error"] == 4) {
							$logo = '';
						} else {

							$logo = $_FILES['logo']['tmp_name'];
							$file = $_FILES['logo']['tmp_name'];
							$sourceProperties = getimagesize($file);
							$fileNewName = time();
							$folderPath = "public/img/car/";
							$ext = pathinfo($_FILES['logo']['name'], PATHINFO_EXTENSION);
							$imageType = $sourceProperties[2];
							function imageResize($imageResourceId, $width, $height, $quality)
							{


								$targetWidth = 615;
								$targetHeight = 425;


								$targetLayer = imagecreatetruecolor($targetWidth, $targetHeight);
								imagecopyresampled($targetLayer, $imageResourceId, 0, 0, 0, 0, $targetWidth, $targetHeight, $width, $height);


								return $targetLayer;
							}
							function compress_image($source_url, $destination_url, $quality)
							{

								if ($source_url <> "") {
									$info = getimagesize($source_url);

									if ($info['mime'] == 'image/jpeg')
										$image = imagecreatefromjpeg($source_url);

									elseif ($info['mime'] == 'image/gif')
										$image = imagecreatefromgif($source_url);

									elseif ($info['mime'] == 'image/png')
										$image = imagecreatefrompng($source_url);

									imagejpeg($image, $destination_url, $quality);
									return $destination_url;
								}
							}


							switch ($imageType) {


								case IMAGETYPE_PNG:
									$imageResourceId = imagecreatefrompng($file);
									$targetLayer = imageResize($imageResourceId, $sourceProperties[0], $sourceProperties[1], 40);
									imagepng($targetLayer, $folderPath . $fileNewName . "_thump." . $ext);


									break;


								case IMAGETYPE_GIF:
									$imageResourceId = imagecreatefromgif($file);
									$targetLayer = imageResize($imageResourceId, $sourceProperties[0], $sourceProperties[1], 40);
									imagegif($targetLayer, $folderPath . $fileNewName . "_thump." . $ext);
									break;


								case IMAGETYPE_JPEG:
									$imageResourceId = imagecreatefromjpeg($file);
									$targetLayer = imageResize($imageResourceId, $sourceProperties[0], $sourceProperties[1], 40);
									imagejpeg($targetLayer, $folderPath . $fileNewName . "_thump." . $ext);
									break;


								default:
									echo "Invalid Image type.";
									exit;
									break;
							}

							$logo = $fileNewName . "_thump." . $ext;
						}
						//echo $position;
						if ($logo == '') {
							//wala logo update
							$dashboard_model->UpdateVehiclePro(
								$vid,
								$color,
								$year,
								$plate,
								$engine,
								$tank,
								$mileage,
								$maxpassenger,
								$coil,
								$laotype,
								$laoInsren,
								$laoInsexp,
								$thaitype,
								$thaiInsrenew,
								$thaiInsexp,
								$Insdate,
								$roadDate,
								$fuelcons,
								$location
							);
						} else {
							//meron



							$list = $dashboard_model->getUpdateVehiclePhoto($vid);
							foreach ($list as $app) {
								if (isset($app->logo))  $logo1 = $app->logo;
								Unlink("public/img/car/" . $logo1);
							}
							$dashboard_model->UpdateVehicleProPhoto(
								$vid,
								$color,
								$year,
								$plate,
								$engine,
								$tank,
								$mileage,
								$maxpassenger,
								$coil,
								$laotype,
								$laoInsren,
								$laoInsexp,
								$thaitype,
								$thaiInsrenew,
								$thaiInsexp,
								$Insdate,
								$roadDate,
								$fuelcons,
								$location,
								$logo
							);

							//	echo  $logo;
						}
						echo '
						 <script>
								alert("Update Successfully!");
							  window.location.href ="' . URL . 'Dashboard";
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
	}
	public function AddVehicle()
	{
		if (isset($_SESSION['SESS_MEMBER_POS'])) {
			if ($_SESSION['SESS_MEMBER_POS'] == "Administration") {

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
						$vin = isset($_POST['vin']) ? strtoupper($_POST['vin']) : 0;
						$maker = isset($_POST['maker']) ? ($_POST['maker']) : '';
						$model = isset($_POST['model']) ? ($_POST['model']) : '';
						$year = isset($_POST['year']) ? ($_POST['year']) : '';
						$color = isset($_POST['color']) ? ($_POST['color']) : '';
						$plate = isset($_POST['plate']) ? ($_POST['plate']) : '';
						$transmission = isset($_POST['transmission']) ? ($_POST['transmission']) : '';
						$engine = isset($_POST['egine']) ? ($_POST['egine']) : '';
						$tank = isset($_POST['tank']) ? ($_POST['tank']) : '';
						$fuel = isset($_POST['fuel']) ? ($_POST['fuel']) : '';
						$mileage = isset($_POST['mileage']) ? ($_POST['mileage']) : '';
						$maxpassenger = isset($_POST['maxpassenger']) ? ($_POST['maxpassenger']) : '';
						$coil = isset($_POST['coil']) ? ($_POST['coil']) : '';
						$laotype = isset($_POST['laotype']) ? ($_POST['laotype']) : '';
						$laoInsren = isset($_POST['laoInsren']) ? ($_POST['laoInsren']) : '';
						$laoInsexp = isset($_POST['laoInsexp']) ? ($_POST['laoInsexp']) : '';
						$thaitype = isset($_POST['thaitype']) ? ($_POST['thaitype']) : '';
						$thaiInsrenew = isset($_POST['thaiInsrenew']) ? ($_POST['thaiInsrenew']) : '';
						$thaiInsexp = isset($_POST['thaiInsexp']) ? ($_POST['thaiInsexp']) : '';
						$Insdate = isset($_POST['Insdate']) ? ($_POST['Insdate']) : '';
						$roadDate = isset($_POST['roadDate']) ? ($_POST['roadDate']) : '';
						$fuelcons = isset($_POST['fuelcons']) ? ($_POST['fuelcons']) : '';
						$location = isset($_POST['location']) ? ($_POST['location']) : '';

						$totalvehicl = 0;
						$totalvehicle = $dashboard_model->CheckCar($vin);
						//echo $totalvehicle;
						date_default_timezone_set("Asia/Bangkok");
						$TIME = date("His");
						if ($totalvehicle <> 0) {
							//	echo '<i style="color:red"> Already exist!</i>';
							echo '
						<script src="' . URL . 'public/js/jquery.js"></script>
						<script>
									alert("Created Successfully!");
									 window.location.href ="' . URL . 'Dashboard/Vehicle";
								</script>
					';
						} else {
							if ($_FILES["logo"]["error"] == 4) {
								$logo = 'default.png';
							} else {

								$logo = $_FILES['logo']['tmp_name'];
								$file = $_FILES['logo']['tmp_name'];
								$sourceProperties = getimagesize($file);
								$fileNewName = time();
								$folderPath = "public/img/car/";
								$ext = pathinfo($_FILES['logo']['name'], PATHINFO_EXTENSION);
								$imageType = $sourceProperties[2];
								function imageResize($imageResourceId, $width, $height, $quality)
								{


									$targetWidth = 615;
									$targetHeight = 425;


									$targetLayer = imagecreatetruecolor($targetWidth, $targetHeight);
									imagecopyresampled($targetLayer, $imageResourceId, 0, 0, 0, 0, $targetWidth, $targetHeight, $width, $height);


									return $targetLayer;
								}
								function compress_image($source_url, $destination_url, $quality)
								{

									if ($source_url <> "") {
										$info = getimagesize($source_url);

										if ($info['mime'] == 'image/jpeg')
											$image = imagecreatefromjpeg($source_url);

										elseif ($info['mime'] == 'image/gif')
											$image = imagecreatefromgif($source_url);

										elseif ($info['mime'] == 'image/png')
											$image = imagecreatefrompng($source_url);

										imagejpeg($image, $destination_url, $quality);
										return $destination_url;
									}
								}


								switch ($imageType) {


									case IMAGETYPE_PNG:
										$imageResourceId = imagecreatefrompng($file);
										$targetLayer = imageResize($imageResourceId, $sourceProperties[0], $sourceProperties[1], 40);
										imagepng($targetLayer, $folderPath . $fileNewName . "_thump." . $ext);


										break;


									case IMAGETYPE_GIF:
										$imageResourceId = imagecreatefromgif($file);
										$targetLayer = imageResize($imageResourceId, $sourceProperties[0], $sourceProperties[1], 40);
										imagegif($targetLayer, $folderPath . $fileNewName . "_thump." . $ext);
										break;


									case IMAGETYPE_JPEG:
										$imageResourceId = imagecreatefromjpeg($file);
										$targetLayer = imageResize($imageResourceId, $sourceProperties[0], $sourceProperties[1], 40);
										imagejpeg($targetLayer, $folderPath . $fileNewName . "_thump." . $ext);
										break;


									default:
										echo "Invalid Image type.";
										exit;
										break;
								}

								$logo = $fileNewName . "_thump." . $ext;
							}
							$dashboard_model->insertVehicle(
								$vin,
								$maker,
								$model,
								$year,
								$color,
								$plate,
								$transmission,
								$engine,
								$tank,
								$fuel,
								$mileage,
								$maxpassenger,
								$TIME,
								$coil,
								$laotype,
								$laoInsren,
								$laoInsexp,
								$thaitype,
								$thaiInsrenew,
								$thaiInsexp,
								$Insdate,
								$roadDate,
								$fuelcons,
								$location,
								$logo
							);
							//echo '<i style="color:green"> Created Successfully!</i>';
							echo '
						<script src="' . URL . 'public/js/jquery.js"></script>
						<script>
									alert("Created Successfully!");
									 window.location.href ="' . URL . 'Dashboard/Vehicle";
								</script>
					';
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
	}


	public function updateNeedChangeoil()
	{

		if (isset($_SESSION['SESS_MEMBER_POS'])) {
			if ($_SESSION['SESS_MEMBER_POS'] == "Administration") {
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

						$vid = $_GET["id"];
						$list1 = $dashboard_model->getUpdateVehicle($vid);
						foreach ($list1 as $app) {
							if (isset($app->changeoil))  $changeoil = $app->changeoil;
							if (isset($app->needchangeoil))  $needchangeoil = $app->needchangeoil;
							if (isset($app->vid))  $vid = $app->vid;

							$cc = $needchangeoil + $changeoil;
							//echo $cc;
							//echo $vid. " ssd";
							$dashboard_model->updateMarkedChangeoil($vid, $cc);
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
	}
	public function deleteVehicle()
	{
		if (isset($_SESSION['SESS_MEMBER_POS'])) {
			if ($_SESSION['SESS_MEMBER_POS'] == "Administration") {
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

						$vid = $_GET["id"];
						$list = $dashboard_model->getUpdateVehiclePhoto($vid);
						foreach ($list as $app) {
							if (isset($app->logo))  $logo1 = $app->logo;
							Unlink("public/img/car/" . $logo1);
						}
						$dashboard_model->deleteVehicle($vid);
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
	}
	public function VehicleList1()
	{
		if (isset($_SESSION['SESS_MEMBER_POS'])) {
			if ($_SESSION['SESS_MEMBER_POS'] == "Administration") {
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


						$list1 = $dashboard_model->loadVehicle();
						//print_r($list1);
						require 'application/views/dashboard/report.php';
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
	}

	public function VehicleList()
	{
		if (isset($_SESSION['SESS_MEMBER_POS'])) {
			if ($_SESSION['SESS_MEMBER_POS'] == "Administration") {
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


						$list1 = $dashboard_model->loadVehicle();
						//print_r($list1);
						require 'application/views/dashboard/vehicle.php';
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
	}

	public function modelList()
	{
		if (isset($_SESSION['SESS_MEMBER_POS'])) {
			if ($_SESSION['SESS_MEMBER_POS'] == "Administration") {
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

						$id = $_GET["id"];
						$SetupModel = $this->loadModel('SetupModel');
						$modellist = $SetupModel->loadVehicleModelbyMakerId($id);

						echo '
				Model
				<select  class="form-control" name="model"  required>
							 <option disabled="disabled" selected="selected" value="">Select Maker</option>';

						foreach ($modellist as $app) {

							if (isset($app->cmid))  $cmid = $app->cmid;
							if (isset($app->modelname))  $modelname = $app->modelname;
							echo '<option value="' . $cmid . '">' . $modelname . '</option>';
						}
						echo '
				 </select>';
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
	}

	public function ChangePassword()
	{
		if (isset($_SESSION['SESS_MEMBER_POS'])) {
			if ($_SESSION['SESS_MEMBER_POS'] == "Administration") {
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
						$cPass = $_POST["cPass"];
						$nPass = $_POST["nPass"];
						$un = $Sid;
						$cp = md5($cPass);
						$np = $nPass;
						$totalUser = $dashboard_model->checkCurrentPassword($un, ($cp));
						if ($totalUser == 0) {
							echo '<i style="color:red">Incorrect Current Password!</i>';
						} else {
							$dashboard_model->UpdateCurrentPassword($un, $cp, $np);
							echo '<i style="color:green">Update Password Successfully.</i>';
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
	}

	public function logout_user()
	{

		session_unset();
		session_destroy();
		echo '<script>
									alert("logging off");
									 window.location.href ="' . URL . '";
								</script>
					';
	}
}
