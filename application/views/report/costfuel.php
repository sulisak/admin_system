<script src="<?= URL ?>public/js/jquery.js"></script>
<script type="text/javascript">
	$(document).ready(function() {

		getAjaxProject();

		function getAjaxProject() {
			$.ajax({ //create an ajax request to display.php
				type: "GET",
				url: "<?= URL ?>Report/VehicleCostPro",
				dataType: "html", //expect html to be returned
				success: function(response) {
					$("#response").html(response);
					//alert(response);
				}
			});
		};
		$("#senddataform").submit(function() {
			$("#response").html("<b>Loading response...</b>");
			$.ajax({
					type: "POST",
					url: "<?= URL ?>Report/VehicleCostPro",
					data: $(this).serialize()
				})
				.done(function(data) {
					$("#response").fadeOut(500).html(data).fadeIn(300);
				})
				.fail(function() {
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
					<h1 class="m-0 text-dark">Vehicle Cost/
						<span class="laotext">ລາຄາລົດ</span>
					</h1>
				</div><!-- /.col -->
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
								Vehicle List/<span class="laotext">ລາຍການລົດ</span>
							</h3>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<form method="post" id="senddataform">
								<div class="row">

									<div class="col-md-4">
										<input type="date" name="start" class="form-control" required>
									</div>
									<div class="col-md-4">
										<input type="date" name="end" class="form-control" required>
									</div>
									<div class="col-md-4">
										<input type="submit" class="btn btn-primary" value="ຄົ້ນຫາ">
									</div>
								</div>
							</form>
							<hr>
							<div id="response"></div>
						</div>
					</div>
				</div>
			</div>
		</div><!--/. container-fluid -->
	</section>
	<!-- /.content -->
	</di v>
	<!-- /.content-wrapper -->
	<style>
		.container input[type="radio"] {
			display: block;
			width: 200px;
			float: left;
			clear: both;
		}

		.container label {
			display: block;
			width: calc(100% - 30px);
			float: left;
			margin-right: 200px;
		}

		.container label>span {
			display: block;
			margin: 5px 0;
			font-style: italic;
		}
	</style>

	<div class="modal fade" id="Add">
		<form id="submitins" method="post">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">ADD NEW RECORD/
							<span class="laotext">ເພີ່ມໃໝ່</span>
						</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<i class='fa fa-times-circle' style='color: red; font-size: 25px;'></i>
						</button>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-md-6">
								<strong>VEHICLE/<span class="laotext">ລົດ</span></STRONG>
							</div>
							<div class="col-md-6">
								<strong>DRIVER/<span class="laotext">ຄົນຂັບ</span></STRONG>
							</div>
						</div>
						<hr>
						<div class="row">
							<div class="col-md-6">

								<div class="input-group mb-3">
									<select class="form-control" name="vehicle" id="vid" required>
										<option value=""></option>
										<?php
										//print_r($checker);
										foreach ($vehicle as $app) {
											if (isset($app->vid))  $vid = $app->vid;
											if (isset($app->vyear))  $vyear = $app->vyear;
											if (isset($app->maker))  $maker = $app->maker;
											if (isset($app->modelcar))  $modelcar = $app->modelcar;
											if (isset($app->vcolor))  $vcolor = $app->vcolor;
											if (isset($app->plate))  $plate = $app->plate;

											echo '<option value="' . $vid . '">' . $maker . ' ' . $modelcar . ' ' . $vcolor . ' #' . $plate . '</option>';
										}
										?>

									</select>
								</div>
							</div>
							<div class="col-md-6">

								<div class="input-group mb-3">
									<input class="form-control" name="driver" required placeholder="Enter Dirver" />
								</div>
							</div>
						</div>
						<hr>
						<div class="row">
							<div class="col-md-6">
								<strong>DATE/<span class="laotext">ວັນທີ</span></STRONG>
							</div>
							<div class="col-md-6">
								<strong>GAS STATION/<span class="laotext">ປ້ຳນ້ຳມັນ</span></STRONG>
							</div>
						</div>

						<hr>
						<div class="row">
							<div class="col-md-6">
								<div class="input-group mb-3">
									<input type="date" class="form-control" name="ddate" required>
								</div>
							</div>
							<div class="col-md-6">
								<div class="input-group mb-3">
									<input type="text" class="form-control" name="gas" required placeholder="Enter Gas Station">
								</div>
							</div>
						</div>

						<hr>
						<div class="row">
							<div class="col-md-6">
								<strong>AMOUNT/<span class="laotext">ລາຄາລວມ</span></STRONG>
							</div>
							<div class="col-md-6">
								<strong>OIL PRICE PER LITER/<span class="laotext">ລາຄານ້ຳມັນຕໍ່ລິດ</span></STRONG>
							</div>
						</div>

						<hr>
						<div class="row">
							<div class="col-md-6">
								<div class="input-group mb-3">
									<input type="number" class="form-control" name="amount" id="amount" placeholder="Enter Amount" required>

								</div>
							</div>
							<div class="col-md-6">
								<div class="input-group mb-3">
									<input type="number" class="form-control" name="oil" id="oil" placeholder="Enter Oil price" required>
								</div>
							</div>

						</div>

						<hr>
						<div class="row">
							<div class="col-md-6">
								<strong>TOTAL LITER(S)/<span class="laotext">ລິດທັງໝົດ</span></STRONG>
							</div>
							<div class="col-md-6">
								<strong>MILEAGE/<span class="laotext">ເລກໄມສະສົມທັງໝົດ</span></STRONG>
							</div>
						</div>
						<hr>
						<div class="row">
							<div class="col-md-6">
								<div class="input-group mb-3">
									<input type="number" id="tl" disabled style="background:#fff" class="form-control" name="liter" placeholder="Enter Total Liter" required>
									<input type="hidden" id="tl1" class="form-control" name="liter" placeholder="Enter Total Liter" required>
								</div>
							</div>
							<div class="col-md-6">
								<div class="input-group mb-3">
									<input type="number" id="mm" disabled style="background:#fff" class="form-control" name="mileage" placeholder="Enter Mileage" required>
									<input type="hidden" id="mm1" class="form-control" name="mileage" placeholder="Enter Mileage" required>
								</div>
							</div>
						</div>
						<div id="addres"></div>
					</div>
					<div class="modal-footer ">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Close/
							<span class="laotext">ປິດ</span></button>
						<button type="submit" class="btn btn-primary">Save Details/
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
<script src="<?= URL ?>public/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?= URL ?>public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= URL ?>public/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= URL ?>public/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="dist/js/demo.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="<?= URL ?>public/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="<?= URL ?>public/plugins/raphael/raphael.min.js"></script>
<script src="<?= URL ?>public/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="<?= URL ?>public/plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="<?= URL ?>public/plugins/chart.js/Chart.min.js"></script>

<!-- PAGE SCRIPTS -->
<script src="<?= URL ?>public/js/pages/dashboard2.js"></script>
</body>

</html>