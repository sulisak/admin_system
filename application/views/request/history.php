<script src="<?php echo URL; ?>public/js/jquery.js"></script>
<script type="text/javascript">
	$(document).ready(function() {

		getAjaxProject();

		function getAjaxProject() {
			$.ajax({ //create an ajax request to display.php
				type: "GET",
				url: <?php echo  "'" .  URL  . "Request/HistoryList'"; ?>,
				dataType: "html", //expect html to be returned
				success: function(response) {
					$("#response").html(response);
					//alert(response);
				}

			});
		};
	});
</script>

<head>

	<script src="<?php echo URL; ?>public/js/jquery.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</head>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">
						<span class="laotext">Vehicle Management/ບໍລິຫານຈັດການລົດ</span>
					</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item "><a href="<?php echo URL ?>Request">Vehicle Management/
								<span class="laotext">ບໍລິຫານຈັດການລົດ</span></a></li>
						<li class="breadcrumb-item active ">Request History/
							<span class="laotext">ປະຫວັດການເບີກລົດ</span>
						</li>
					</ol>
				</div><!--/.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<!-- ----------------------------------------------------------------------- -->
	<div id="myModal" class="modal fade" tabindex="-1">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title laotext" id="exampleModalLabel" style="font-family:Phetsarath OT!important;color: red;font-weight: bold;">ແຈ້ງເຕືອນການກວດເຊັກເອກະສານລົດ</h5>
					<button type="button" class="btn-close close" data-bs-dismiss="modal" aria-label="Close">
						<i class='fa fa-times-circle' style='color: red; font-size: 25px;'></i>
					</button>
				</div>
				<div class="modal-body">
					<span class="engtext"> *** &nbsp;Please check vehicle documents that nearly to expiration date soon .
					</span>
					<span class="laotext">*** &nbsp;ກະລຸນາກວດສອບເອກະສານລົດ ແລະ ຕໍ່ສັນຍາເອກະສານລົດຕາມ link ນີ້.&nbsp</span>
					<hr>
					<span class="text-center">
						<a href="<?php  ?>/Dashboard/Vehicle" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Click here</a>
					</span>
				</div>
			</div>
		</div>
	</div>
	<script>
		var myModal = new bootstrap.Modal(document.getElementById('myModal'), {})
		myModal.show()
	</script>

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">

			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">
								Request List/<span class="laotext">ລາຍການເບີກລົດ</span>
							</h3>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<div id="response"></div>
						</div>
					</div>
				</div>
			</div>
		</div><!--/. container-fluid -->
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->


<div class="modal fade" id="Add">
	<form id="addCar" method="post">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Add New CAR/
						<span class="laotext">ເພີ່ມລົດໃໝ່</span>
					</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<i class='fa fa-times-circle' style='color: red; font-size: 25px;'></i>
					</button>
				</div>
				<div class="modal-body">

					<div class="row">
						<div class="col-md-4">
							VIN/ເລກຈັກ
							<div class="input-group mb-3">
								<input type="text" class="form-control" name="vin" required Placeholder="Enter VIN">
							</div>
						</div>
						<div class="col-md-4">
							Maker/ຍີ່ຫໍ້
							<div class="input-group mb-3">
								<select class="form-control" name="maker" id="maker" required>
									<option disabled="disabled" selected="selected" value="">Select Maker/ເລືອກຍີ່ຫໍ້</option>
									<?php
									foreach ($makerlist as $app) {

										if (isset($app->makerid))  $makerid = $app->makerid;
										if (isset($app->makername))  $makername = $app->makername;
										echo '<option value="' . $makerid . '">' . $makername . '</option>';
									}
									?>
								</select>
							</div>
						</div>
						<div class="col-md-4">
							<div id="model">Select Model/ເລືອກລຸ້ນ</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-4">
							Year/ປີ
							<div class="input-group mb-3">
								<input type="text" class="form-control" name="year" required Placeholder="Enter year">
							</div>
						</div>
						<div class="col-md-4">
							Color/ສີ
							<div class="input-group mb-3">
								<input type="text" class="form-control" name="color" required Placeholder="Enter color">
							</div>
						</div>
						<div class="col-md-4">
							Plate Number/ທະບຽນລົດ
							<div class="input-group mb-3">
								<input type="text" class="form-control" name="plate" required Placeholder="Enter plate">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							Transmission/ແບບການຂັບເຄື່ອນ
							<div class="input-group mb-3">
								<select class="form-control" name="transmission" required>
									<option value="Manual">Manual/ເກຍກະປຸກ</option>
									<option value="Automatic">Automatic/ເກຍອໍໂຕເມຕິກ</option>
								</select>
							</div>
						</div>
						<div class="col-md-4">
							Engine Size/ຂະໜາດຈັກ
							<div class="input-group mb-3">
								<input type="text" class="form-control" name="egine" required Placeholder="Enter egine size">
							</div>
						</div>
						<div class="col-md-4">
							Tank capacity/ຄວາມຈຸຖັງ
							<div class="input-group mb-3">
								<input type="text" class="form-control" name="tank" required Placeholder="Enter tank capacity">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							Fuel Type/ປະເພດນ້ຳມັນ
							<div class="input-group mb-3">
								<select class="form-control" name="fuel" required>
									<option value="BioDiesel">BioDiesel/ກາຊວນຊີວະພາບ</option>
									<option value="Diesel">Diesel/ກາຊວນ</option>
									<option value="Regular">Regular/ແອັດຊັງ</option>
									<option value="Super">Super/ພິເສດ</option>
								</select>
							</div>
						</div>
						<div class="col-md-4">
							Mileage/ເລກໄລະຍະສະສົມ
							<div class="input-group mb-3">
								<input type="text" class="form-control" name="mileage" required Placeholder="Enter mileage">
							</div>
						</div>
						<div class="col-md-4">
							Max Passenger/ນັ່ງໄດ້ສູງສຸດ
							<div class="input-group mb-3">
								<input type="text" class="form-control" name="maxpassenger" required Placeholder="Enter max passenger">
							</div>
						</div>
					</div>
					<div id="addres"></div>
				</div>
				<div class="modal-footer ">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close /ປິດ</button>
					<button type="submit" class="btn btn-primary">Save changes/ບັນທຶກ</button>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</form>
</div>


<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
	<!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->

<!-- Main Footer -->
<footer class="main-footer">
	<strong>Copyright &copy; 2020 <a href="https://aifgrouplaos.com/" target="_blank"></a>.</strong>
	All rights reserved.
	<div class="float-right d-none d-sm-inline-block">
		<b>Version</b> 1.0
	</div>
</footer>
</div>

</font>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="<?php echo URL; ?>public/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?php echo URL; ?>public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo URL; ?>public/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo URL; ?>public/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="dist/js/demo.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="<?php echo URL; ?>public/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="<?php echo URL; ?>public/plugins/raphael/raphael.min.js"></script>
<script src="<?php echo URL; ?>public/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="<?php echo URL; ?>public/plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo URL; ?>public/plugins/chart.js/Chart.min.js"></script>

<!-- PAGE SCRIPTS -->
<script src="<?php echo URL; ?>public/js/pages/dashboard2.js"></script>
</body>

</html>