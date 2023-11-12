<script src="<?= URL ?>public/js/jquery.js"></script>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Stationary Request Report/
						<span class="laotext">ລາຍງານການຮ້ອງຂໍເບີກເຄື່ອງ</span>
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
								Stationary List/
								<span class="laotext">ລາຍການເບີກເຄື່ອງ</span>
						</div>

						<!-- /.card-header -->
						<div class="card-body">
							<form method="post" action="<?= URL ?>Report/StationaryRequestReport" enctype="multipart/form-data">
								<div class="row">
									<div class="col-md-3">
										<b>Start Date/
											<span class="laotext">ວັນທີເລີ່ມຕົ້ນ</span></b>
										<input class="form-control" name="start" type="date" value="<?= $strt; ?>" required>
									</div>
									<div class="col-md-3">
										<b>End Date/
											<span class="laotext">ວັນທີສິ້ນສຸດ</span></b>
										<input class="form-control" name="end" type="date" value="<?= $en; ?>" required>
									</div>
									<div class="col-md-3">
										<br>
										<button type="submit" class="btn btn-md btn-primary" id="submit">Search record/
											<span class="laotext">ຄົ້ນຫາ</span></button>
									</div>
								</div>
							</form>
							<hr>
							<script src="<?= URL ?>public/js/bootbox.min.js"></script>
							<script src="<?= URL ?>public/js/jquery.js"> </script>

							<link rel="stylesheet" href="<?= URL ?>public/css1/bootstrap.css">
							<link rel="stylesheet" href="<?= URL ?>public/css1/dataTables.bootstrap4.min.css">
							<link rel="stylesheet" href="<?= URL ?>public/css1/buttons.bootstrap4.min.css">
							<link rel="stylesheet" href="<?= URL ?>public/css1/responsive.bootstrap4.min.css">

							<style>
								.scroll {
									width: 100%;

									overflow-y: scroll;
								}

								.scroll::-webkit-scrollbar {
									width: 2px;
								}

								.scroll::-webkit-scrollbar-track {
									-webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
									border-radius: 10px;
								}

								.scroll::-webkit-scrollbar-thumb {
									border-radius: 10px;
									-webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.5);
								}

								.circledivPending {
									height: 35px;
									width: 35px;
									display: table-cell;
									text-align: center;
									vertical-align: middle;
									border-radius: 50%;

									background: #ffd24b;
								}

								.circledivCancel {
									height: 35px;
									width: 35px;
									display: table-cell;
									text-align: center;
									vertical-align: middle;
									border-radius: 50%;

									background: #f2727f;
								}

								.circledivComplete {
									height: 35px;
									width: 35px;
									display: table-cell;
									text-align: center;
									vertical-align: middle;
									border-radius: 50%;

									background: #3dcfa4;
								}

								.hori-timeline .events {
									border-top: 3px solid #e9ecef;
								}

								.hori-timeline .events .event-list {
									display: block;
									position: relative;
									text-align: center;
									padding-top: 70px;
									margin-right: 0;
								}

								.hori-timeline .events .event-list:before {
									content: "";
									position: absolute;
									height: 36px;
									border-right: 2px dashed #dee2e6;
									top: 0;
								}

								.hori-timeline .events .event-list .event-date {
									position: absolute;

									left: 0;
									right: 0;

									margin: 0 auto;

								}

								@media (min-width: 1140px) {
									.hori-timeline .events .event-list {
										display: inline-block;
										width: 150px;
										padding-top: 45px;
									}

									.hori-timeline .events .event-list .event-date {
										top: -30px;
									}
								}

								@media (min-width: 992px) {
									.modal-lg {
										max-width: 1000px;
									}
								}

								.text {
									font-size: 12px;
								}


								.labelmodal {
									font-size: 10px;
									font-weight: 990;
								}
							</style>

							<div class="table-responsive">
								<table class="table table-bordered table-hover  table-striped" id="example" width="100%" height="500px" cellspacing="0">
									<thead>
										<tr>
											<th>No/<span class="laotext">ລຳດັບ</span></th>
											<th>Req._code/<span class="laotext">ເລກຮ້ອງຂໍ</span></th>
											<th>LineManager/<span class="laotext">ຫົວໜ້າສາຍງານ</span></th>
											<th>Admin/<span class="laotext">ຜູ້ບໍລິຫານລະບົບ</span></th>
											<th>Taken/<span class="laotext">ເອົາ</span></th>
											<th>Status/<span class="laotext">ສະຖານະ</span></th>

											<th>Requestor/<span class="laotext">ຜູ້ຮ້ອງຂໍ</span></th>
											<th>Department/<span class="laotext">ຜູ້ຮ້ອງຂໍ</span></th>
											<th>Category_Name/<span class="laotext">ຊື່ປະເພດເຄື່ອງອຸປະກອນ</span></th>
											<th>Product_Name/<span class="laotext">ຊື່</span></th>
											<th>Barcode/<span class="laotext">ເລກບາໂຄດ</span></th>
											<th>UOM</th>
											<th>Req_Qty/<span class="laotext">ຈຳນວນທີ່ຂໍເບີກ</span></th>
											<th>Unit_Price/<span class="laotext">ລາຄາຕໍ່ຫົວໜ່ວຍ</span></th>
											<th>Total_Cost/<span class="laotext">ລວມລາຄາ</span></th>
											<th>Date_Needed/<span class="laotext">ວັນທີທີ່ຕ້ອງການ</span></th>
											<th>Date_Req/<span class="laotext">ວັນທີຮ້ອງຂໍເບີກ</span></th>
											<th>Remark/<span class="laotext">ໝາຍເຫດ</span></th>
										</tr>
									</thead>
									<tbody>
										<?php
										$c = 0;
										foreach ($list as $app) {
											$c++;
											$id = isset($app->id) ? $app->id : '';
											$barcode = isset($app->barcode) ? $app->barcode : '';
											$pname = isset($app->pname) ? $app->pname : '';
											$uom = isset($app->uom) ? $app->uom : '';
											$reqqty = isset($app->reqqty) ? $app->reqqty : '';
											$unitprice = isset($app->unitprice) ? $app->unitprice : '';
											$category = isset($app->category) ? $app->category : '';
											$reqCode = isset($app->reqCode) ? $app->reqCode : '';
											$requestorname = isset($app->requestorname) ? $app->requestorname : '';
											$requestor = isset($app->requestor) ? $app->requestor : '';
											$productid = isset($app->productid) ? $app->productid : '';
											$dateneeded = isset($app->dateneeded) ? $app->dateneeded : '';
											$daterequest = isset($app->daterequest) ? $app->daterequest : '';
											$remarks = isset($app->remarks) ? $app->remarks : '';
											$lineManagerid = isset($app->lineManagerid) ? $app->lineManagerid : '';
											$adminid = isset($app->adminid) ? $app->adminid : '';
											$givendate = isset($app->givendate) ? $app->givendate : '';
											$linemane = isset($app->linemane) ? $app->linemane : '';
											$adminname = isset($app->adminname) ? $app->adminname : '';
											$totalcost = isset($app->totalcost) ? $app->totalcost : '';
											$status = isset($app->status) ? $app->status : '';
											$given = isset($app->given) ? $app->given : '';
											$givenby = isset($app->givenby) ? $app->givenby : '';
											$givenprofile = isset($app->givenprofile) ? $app->givenprofile : '';
											$lineprofile = isset($app->lineprofile) ? $app->lineprofile : '';
											$adminprofile = isset($app->adminprofile) ? $app->adminprofile : '';
											$requestorprofile = isset($app->requestorprofile) ? $app->requestorprofile : '';
											$linemanagerdate = isset($app->linemanagerdate) ? $app->linemanagerdate : '';
											$admindate = isset($app->admindate) ? $app->admindate : '';
											$givendate = isset($app->givendate) ? $app->givendate : '';
											$company = isset($app->company) ? $app->company : '';
											$department = isset($app->department) ? $app->department : '';
											$canceldate = isset($app->canceldate) ? $app->canceldate : ''; ?>

											<tr>
												<td><?= $c ?></td>
												<td><?= $reqCode ?></td>

												<?php if ($status == 'Approved by Line Manager') { ?>
													<td>
														<center>
															<div class="circledivComplete">C</div>
														</center>
													</td>
													<td>
														<center>
															<div class="circledivPending">P</div>
														</center>
													</td>
													<td>
														<center>
															<div class="circledivPending">P</div>
														</center>
													</td>
												<?php	} elseif ($status == 'Approved by Admin') { ?>
													<td>
														<center>
															<div class="circledivComplete">C</div>
														</center>
													</td>
													<td>
														<center>
															<div class="circledivComplete">C</div>
														</center>
													</td>
													<td>
														<center>
															<div class="circledivPending">P</div>
														</center>
													</td>
												<?php	} elseif ($status == 'Pending') { ?>

													<td>
														<center>
															<div class="circledivPending">P</div>
														</center>
													</td>
													<td>
														<center>
															<div class="circledivPending">P</div>
														</center>
													</td>
													<td>
														<center>
															<div class="circledivPending">P</div>
														</center>
													</td>
												<?php	} elseif ($status == 'Completed') { ?>

													<td>
														<center>
															<div class="circledivComplete">C</div>
														</center>
													</td>
													<td>
														<center>
															<div class="circledivComplete">C</div>
														</center>
													</td>
													<td>
														<center>
															<div class="circledivComplete">C</div>
														</center>
													</td>
													<?php } else {
													if ($lineManagerid == 0) { ?>
														<td>
															<center>
																<div class="circledivCancel">x</div>
															</center>
														</td>
													<?php	} else { ?>
														<td>
															<center>
																<div class="circledivComplete">C</div>
															</center>
														</td>
													<?php	}

													if ($adminid == 0) { ?>
														<td>
															<center>
																<div class="circledivCancel">x</div>
															</center>
														</td>
													<?php	} else { ?>
														<td>
															<center>
																<div class="circledivComplete">C</div>
															</center>
														</td>
													<?php } ?>

													<td>
														<center>
															<div class="circledivCancel">x</div>
														</center>
													</td>
												<?php	} ?>
												<td><?= $status ?></td>

												<td>
													<div style='width:250px'><?= $requestorname ?></div>
												</td>
												<td>
													<div style='width:250px'><?= $department ?></div>
												</td>
												<td><?= $category ?></td>

												<td>
													<div style='width:250px'><?= $pname ?></div>
												</td>
												<td><?= $barcode ?></td>
												<td><?= $uom ?></td>
												<td><?= number_format($reqqty) ?></td>
												<td><?= number_format($unitprice) ?></td>
												<td><?= number_format($totalcost) ?></td>
												<td>
													<div style='width:100px'><?= $dateneeded ?></div>
												</td>
												<td>
													<div style='width:250px'><?= $daterequest ?></div>
												</td>
												<td>
													<div style='width:250px'><?= $remarks ?></div>
												</td>
											</tr>
										<?php }
										?>
									</tbody>
								</table>
							</div>
						</div>
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

<script src="<?= URL ?>public/js1/jquery-3.3.1.js"></script>
<script src="<?= URL ?>public/js1/jquery.dataTables.min.js"></script>
<script src="<?= URL ?>public/js1/dataTables.bootstrap4.min.js"></script>
<script src="<?= URL ?>public/js1/dataTables.buttons.min.js"></script>
<script src="<?= URL ?>public/js1/buttons.bootstrap4.min.js"></script>
<script src="<?= URL ?>public/js1/jszip.min.js"></script>
<script src="<?= URL ?>public/js1/pdfmake.min.js"></script>
<script src="<?= URL ?>public/js1/vfs_fonts.js"></script>
<script src="<?= URL ?>public/js1/buttons.html5.min.js"></script>
<script src="<?= URL ?>public/js1/buttons.print.min.js"></script>
<script src="<?= URL ?>public/js1/buttons.colVis.min.js"></script>

<script>
	$(document).ready(function() {
		var table = $('#example').DataTable({
			lengthChange: true,
			// buttons: [ 'copy', 'excel', 'csv' ],
			buttons: [{
					extend: 'copyHtml5',
					exportOptions: {
						columns: ':visible'
					}
				},
				{
					extend: 'excelHtml5',
					exportOptions: {
						columns: ':visible'
					}
				},
				{
					extend: 'pdfHtml5',
					exportOptions: {
						columns: ':visible'
					}
				},
				'colvis'
			],
			paging: true,
		});

		table.buttons().container()
			.appendTo('#example_wrapper .col-md-6:eq(0)');
	});
</script>