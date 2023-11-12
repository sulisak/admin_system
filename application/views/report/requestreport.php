<script src="<?php echo URL; ?>public/js/jquery.js"></script>
<script type="text/javascript">
	$(document).ready(function() {

		getAjaxProject();

		function getAjaxProject() {
			$.ajax({ //create an ajax request to display.php
				type: "GET",
				url:  "<?= URL ?>Report/RequestVehicleReportPro",
				// url: "<?= URL ?>Report/RequestVehicleReportPro",

				dataType: "html", //expect html to be returned
				success: function(response) {
					$("#response").html(response);
					//alert(response);
				}
			});
		};

		$('#senddataform').submit(function() {
			$.ajax({
				type: "POST",
				// url: <?=  URL; ?>Report/RequestVehicleReportPro'"; ?>
				url: "<?= URL ?>Report/RequestVehicleReportPro",
				data: $(this).serialize()
			}).done(function(data) {
				$("#response").html(data);
				// console.log(data)
			}).fail(function() {
			
				alert("Posting failed.");
			});

			return false;
		});

	});
</script>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Vehicle Reports/
						<span class="laotext">ລາຍງານພະຫະນະ </span>
					</h1>
				</div>
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">

			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">
								Vehicle Request/
								<span class="laotext">ຮ້ອງຂໍພາຫະນະ </span>
							</h3>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<form method="post" id="senddataform">
								<div class="row">

									<div class="col-md-4">
										<input type="date" name="startdate" class="form-control">
									</div>
									<div class="col-md-4">
										<input type="date" name="enddate" class="form-control">
									</div>
									<div class="col-md-4">
										<input type="submit" class="btn btn-primary" value="Search Data">
									</div>
								</div>

							</form>
							<br>
							<div id="response"></div>
						</div>
					</div>
				</div>
			</div>
			<!-- /.row -->
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
					<h4 class="modal-title">Add New CAR/<span class="laotext">ເພີ່ມລົດໃໝ່</span></h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<i class='fa fa-times-circle' style='color: red; font-size: 25px;'></i>
					</button>
				</div>
				<div class="modal-body">

					<div class="row">
						<div class="col-md-4">
							VIN/<span class="laotext">ເລກຈັກ</span>
							<div class="input-group mb-3">
								<input type="text" class="form-control" name="vin" required Placeholder="Enter VIN">
							</div>
						</div>
						<div class="col-md-4">
							Maker/<span class="laotext">ຍີ່ຫໍ້
								<div class="input-group mb-3">
									<select class="form-control" name="maker" id="maker" required>
										<option disabled="disabled" selected="selected" value="">Select Maker/
											<span class="laotext">ເລືອກຍີ່ຫໍ້</span>
										</option>
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
							<div id="model">Select Model/
								<span class="laotext">ເລືອກລຸ້ນ</span>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-4">
							Year/<span class="laotext">ປີ</span>
							<div class="input-group mb-3">
								<input type="text" class="form-control" name="year" required Placeholder="Enter year">
							</div>
						</div>
						<div class="col-md-4">
							Color/<span class="laotext">ສີ</span>
							<div class="input-group mb-3">
								<input type="text" class="form-control" name="color" required Placeholder="Enter color">
							</div>
						</div>
						<div class="col-md-4">
							Plate Number/<span class="laotext">ເລກທະບຽນ</span>
							<div class="input-group mb-3">
								<input type="text" class="form-control" name="plate" required Placeholder="Enter plate">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							Transmission/<span class="laotext">ແບບການຂັບເຄື່ອນ</span>
							<div class="input-group mb-3">
								<select class="form-control" name="transmission" required>
									<option value="Manual">Manual/
										<span class="laotext">ກະປຸກ</span>
									</option>
									<option value="Automatic">Automatic/<span class="laotext">
											ອໍໂຕເມຕິກ</span></option>
								</select>
							</div>
						</div>
						<div class="col-md-4">
							Engine Size/
							<span class="laotext">ຂະໜາດຈັກ</span>
							<div class="input-group mb-3">
								<input type="text" class="form-control" name="egine" required Placeholder="Enter egine size">
							</div>
						</div>
						<div class="col-md-4">
							Tank capacity/
							<span class="laotext">ຄວາມຈຸຖັງ</span>
							<div class="input-group mb-3">
								<input type="text" class="form-control" name="tank" required Placeholder="Enter tank capacity">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							Fuel Type/
							<span class="laotext">ປະເພດນ້ຳມັນ</span>
							<div class="input-group mb-3">
								<select class="form-control" name="fuel" required>
									<option value="BioDiesel">BioDiesel/
										<span class="laotext">ກາຊວນຊີວະພາບ</span>
									</option>
									<option value="Diesel">Diesel/
										<span class="laotext">ກາຊວນ</span>
									</option>
									<option value="Regular">Regular/
										<span class="laotext">ແອັດຊັງ</span>
									</option>
									<option value="Super">Super/
										<span class="laotext">ພິເສດ</span>
									</option>
								</select>
							</div>
						</div>
						<div class="col-md-4">
							Mileage/
							<span class="laotext">ເລກໄມສະສົມ</span>
							<div class="input-group mb-3">
								<input type="text" class="form-control" name="mileage" required Placeholder="Enter mileage">
							</div>
						</div>
						<div class="col-md-4">
							Max Passenger/
							<span class="laotext">ຜູ້ໂດຍສານສູງສຸດ</span>
							<div class="input-group mb-3">
								<input type="text" class="form-control" name="maxpassenger" required Placeholder="Enter max passenger">
							</div>
						</div>
					</div>
					<div id="addres"></div>
				</div>
				<div class="modal-footer ">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close/
						<span class="laotext">ປິດ</span></button>
					<button type="submit" class="btn btn-primary">Save changes/
						<span class="laotext">ບັນທຶກ</span></button>
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