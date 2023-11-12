<script src="<?php echo URL; ?>public/js/bootbox.min.js"></script>
<script src="<?php echo URL; ?>public/js/jquery.js"> </script>

<link rel="stylesheet" href="<?php echo URL; ?>public/css1/bootstrap.css">
<link rel="stylesheet" href="<?php echo URL; ?>public/css1/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?php echo URL; ?>public/css1/buttons.bootstrap4.min.css">
<link rel="stylesheet" href="<?php echo URL; ?>public/css1/responsive.bootstrap4.min.css">
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
	<table class="table table-bordered table-hover  table-striped " id="example" width="100%" height="500px" cellspacing="0">
		<thead>
			<th width="150px">Action/
				<span class="laotext">ຈັດການ</span>
			</th>
			<th>No/ <span class="laotext">ລຳດັບ</span></th>
			<th>Req._code/ <span class="laotext">ລະຫັດຮ້ອງຂໍ</span></th>
			<th><span class="engtext">Admin ອະນຸມັດ</span></th>
			<th>Taken/ <span class="laotext">ເອົາ</span></th>
			<th>Status/ <span class="laotext">ສະຖານະ</span></th>

			<th>Requestor/ <span class="laotext">ຜູ້ຮ້ອງຂໍ</span></th>
			<th>Category_Name/ <span class="laotext">ຊື່ປະເພດ</span></th>
			<th>Product_Name/ <span class="laotext">ຊື່ເຄື່ອງ</span></th>
			<th>Barcode/<span class="laotext">ເລກບາໂຄດ</span></th>
			<th>UOM</th>
			<th>Req_Qty/ <span class="laotext">ຈຳນວນຮ້ອງຂໍ</span></th>
			<th>Unit_Price/ <span class="laotext">ລາຄາ</span></th>
			<th>Total_Cost/ <span class="laotext">ລວມລາຄາ</span></th>
			<th>Date_Needed/ <span class="laotext">ວັນທີຕ້ອງການ</span></th>
			<th>Date_Req/ <span class="laotext">ວັນທີຮ້ອງຂໍເບີກ</span></th>
			<th>Remark/ <span class="laotext">ໝາຍເຫດ</span></th>

		</thead>
		<tbody>
			<?php
			$c = 0;
			foreach ($list1 as $app) {
				// print_r($app);
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
				$canceldate = isset($app->canceldate) ? $app->canceldate : '';
			?>

				<!-- rendor data -->
				<tr>
					<td>

						<a href="#view<?= $id ?>" class="btn btn-md  bg-gradient-primary btn-flat" data-toggle="modal" data-target="#view<?= $id ?>">
							<i class="fas fa-eye"></i> View Details
						</a>
					</td>
					<td><?= $c ?></td>
					<td><?= $reqCode ?></td>
					<?php if ($status == 'Approved by Admin') { ?> <!-- check status approve by admin  -->
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
					<?php } 
					
					elseif ($status == 'Pending') { ?> <!-- check status pending by admin  -->

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
					<?php } 
					
					elseif ($status == 'Completed') { ?> <!-- check status all was approved /admin, give items  -->

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
						<?php }
						
					else {

						 { ?>
							<td>
								<center>
								<div class="circledivCancel">x</div>
								</center>
							</td>
							<td>
								<center>
								<div class="circledivCancel">x</div>
								</center>
							</td>
						<?php } ?>

						
					<?php } ?>


					<td>
						<div style='width:250px'><?= $status ?></div>
					</td>
					<td>
						<div style='width:250px'><?= $requestorname ?></div>
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

				<!-- modal -->
				<div class="modal fade" id="view<?= $id ?>">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
							<div class="modal-header">
								<h4 class="modal-title">REQUEST DETAILS</h4>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<i class='fa fa-times-circle' style='color: red; font-size: 25px;'></i>
								</button>
							</div>
							<div class="modal-body">

								<div class="row">
									<div class="col-md-12 text-center">
										<center>
											<br>
											<!-- Approve line -->
											<div class="hori-timeline" dir="ltr">
												<ul class="list-inline events">

													<li class="list-inline-item event-list">
														<div class="px-1">
															<div class="event-date text-center">
																<img src="<?= URL ?>public/img/profile/<?= $requestorprofile ?>" style="vertical-align: middle; width: 50px;  height: 50px; border-radius: 50%;">
															</div>

															
																<!-- Approved by Admin -->
															<?php if ($status == 'Approved by Admin') { ?> 
																
																<!-- view details to if status Approved by Admin -->
																<center>
																	<div class="circledivPending">P</div> <!-- view details given items is pending -->
																</center>
															<?php } 
															
															else if ($status == 'Completed') { ?>
														
																<center>
																	<div class="circledivComplete">C</div>
																</center>
																<!-- <center>
																	<div class="circledivComplete">C</div>
																</center>
																<center>
																	<div class="circledivComplete">C</div>
																</center> -->
															<?php } 
															
															else if ($status == 'Cancelled') { ?>
																<!-- <center>
																	<div class="circledivPending">P</div>
																</center> -->
																<center>
																	<div class="circledivCancel">X</div>
																</center>
															<?php } 
															
															 
															else { ?>
																<center>
																	<div class="circledivPending">P</div>
																</center>
															<?php } 
															
															
															?>

															<h6 class="labelmodal">REQUESTOR</h6>
															<p style="font-size:10px"><?= $daterequest ?></p>

														</div>
													</li>
													<li class="list-inline-item event-list">
														<div class="px-1">
															<?php if ($adminname == '') { ?>
																<div class="event-date text-center">
																	<img src="<?= URL ?>public/img/linemanager.png" width="50px">
																</div>
															<?php } else { ?>
																<div class="event-date text-center">
																	<img src="<?= URL ?>public/img/profile/<?= $adminprofile ?>" style="vertical-align: middle;width: 50px; height: 50px; border-radius: 50%;">
																</div>
															<?php } ?>

															<?php if ($adminid == null) {
																if ($status != "Cancelled") { ?>
																	<center>
																		<div class="circledivPending">P</div>
																	</center>
																	<?php } else {
																	if ($canceldate == '0000-00-00 00:00:00') { ?>
																		<center>
																			<div class="circledivPending">P</div>
																		</center>
																	<?php	} else { ?>
																		<center>
																			<div class="circledivCancel">X</div>
																		</center>
																<?php	}
																}
															} else { ?>
																<center>
																	<div class="circledivComplete">C</div>
																</center>
															<?php } ?>


															<h6 class="labelmodal">ADMIN HEAD</h6>

															<?php if ($adminname == '') { ?>
																<p style="font-size:10px"><br></p>
															<?php } else { ?>
																<p style="font-size:10px"><?= $admindate ?></p>
															<?php } ?>

														</div>
													</li>
													<li class="list-inline-item event-list">
														<div class="px-1">


															<?php if ($givenby == '') { ?>
																<div class="event-date text-center">
																	<img src="<?= URL ?>public/img/linemanager.png" width="50px">
																</div>
															<?php } else { ?>
																<div class="event-date text-center">
																	<img src="<?= URL ?>public/img/profile/<?= $givenprofile ?>" style="vertical-align: middle; height: 50px; border-radius: 50%;">
																</div>
															<?php	} ?>

															<?php if ($given == null) {
																if ($status != "Cancelled") { ?>
																	<center>
																		<div class="circledivPending">P</div>
																	</center>
																	<?php } else {
																	if ($canceldate == '0000-00-00 00:00:00') { ?>
																		<center>
																			<div class="circledivPending">P</div>
																		</center>
																	<?php 	} else { ?>
																		<center>
																			<div class="circledivCancel">X</div>
																		</center>
																<?php 	}
																}
															} else { ?>
																<center>
																	<div class="circledivComplete">C</div>
																</center>
															<?php } ?>



															<h6 class="labelmodal">GAVE BY </h6>

															<?php if ($givenby == '') { ?>
																<p style="font-size:10px"><br></p>
															<?php } else { ?>
																<p style="font-size:10px"><?= $givendate ?></p>
															<?php } ?>


														</div>
													</li>

												</ul>

											</div>
										</center>
									</div>
								</div>
								<div class="row">
									<div class="col-md-4">
										<b>Request Code</b>
										<div class="input-group mb-3">
											<input class="form-control" name="id" value="<?= $reqCode ?>" type="text" style="background:#fff" disabled required>


											<div class="input-group-append">
												<span class="input-group-text"><i class="fas fa-align-justify"></i></span>
											</div>
										</div>
									</div>
									<div class="col-md-4">
										<b>Business Unit </b>
										<div class="input-group mb-3">
											<input class="form-control" name="id" value="<?= $company ?>" type="text" style="background:#fff" disabled required>
											<div class="input-group-append">
												<span class="input-group-text"><i class="fas fa-building"></i></span>
											</div>
										</div>
									</div>
									<div class="col-md-4">
										<b>Fullname </b>
										<div class="input-group mb-3">
											<input class="form-control" name="id" value="<?= $requestorname ?> (<?= $department ?>)" type="text" style="background:#fff" disabled required>
											<div class="input-group-append">
												<span class="input-group-text"><i class="fas fa-id-card"></i></span>
											</div>
										</div>
									</div>

								</div>

								<hr>
								<div class="row">
									<div class="col-md-6">
										<b>Category </b>
										<div class="input-group mb-3">
											<input class="form-control laotext" name="id" value="<?= $category ?>" type="text" style="background:#fff" disabled required>
											<div class="input-group-append">
												<span class="input-group-text"><i class="fas fa-building"></i></span>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<b>Product </b>
										<div class="input-group mb-3">
											<input class="form-control laotext" name="id" value="<?= $pname ?>" type="text" style="background:#fff" disabled required>
											<div class="input-group-append">
												<span class="input-group-text"><i class="fas fa-id-card"></i></span>
											</div>
										</div>
									</div>

								</div>


								<hr>
								<div class="row">
									<div class="col-md-2">
										<b>Request Qty </b>
										<div class="input-group mb-3">
											<input class="form-control" name="qty" value="<?= $reqqty ?>" type="number" min="1" type="text" style="background:#fff" disabled placeholder="0 " required>
											<div class="input-group-append">
												<span class="input-group-text"><i class="fas fa-box"></i></span>
											</div>
										</div>
									</div>
									<div class="col-md-4">
										<b>Date Needed </b>
										<div class="input-group mb-3">
											<input class="form-control" name="dateneed" value="<?= $dateneeded ?>" type="text" style="background:#fff" disabled type="date" placeholder="Enter Date Needed " required>
											<div class="input-group-append">
												<span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<b>Remarks </b>
										<div class="input-group mb-3 laotext">
											<input class="form-control" name="remark" value="<?= $remarks ?>" type="text" style="background:#fff" disabled type="text" placeholder="Enter Date remarks " required>
											<div class="input-group-append">
												<span class="input-group-text"><i class="fas fa-marker"></i></span>
											</div>
										</div>
									</div>
								</div>


								<div class="modal-footer ">
									<!-- <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button> -->
									<div class="d-flex">

										<?php if ($status == 'Approved by Admin') { ?>

											<button class="btn btn-md  bg-gradient-info  btn-flat disabled">
												<i class="fas fa-check"></i> Admin
											</button>
											<button class="btn btn-md  bg-gradient-primary  btn-flat ml-2" id="gavebyStat<?= $id ?>">
												<i class="fas fa-check"></i> Give Item
											</button>
										
											<button class="btn btn-md btn-block bg-gradient-danger btn-flat ml-2" id="cancel<?= $id ?>">
												<i class="fas fa-trash"></i> Cancel
											</button>
										
										<?php  } elseif ($status == 'Cancelled') {
										} elseif ($status == 'Completed') {
										} else { ?>
											<Button class="btn btn-md  bg-gradient-info  btn-flat ml-2" id="adminApp<?= $id ?>">
												<i class="fas fa-check"></i> Admin
											</Button>
											<Button class="btn btn-md  bg-gradient-primary  btn-flat ml-2" disabled>
												<i class="fas fa-check"></i> Give Item
											</Button>
									
											<Button class="btn btn-md btn-block bg-gradient-danger btn-flat ml-2" id="cancel<?= $id ?>">
												<i class="fas fa-trash"></i> Cancel
											</Button>
											<!-- <script>
												$(document).ready(function() {
													$('#cancel<?= $id ?>').click(function() {
														var id = $('#id<?= $id ?>').val();
														var r = confirm('Are you sure you want to Cancel_check?');
														if (r == true) {
															loading(Swal)
															$.ajax({
																url: '<?= URL ?>Stationary/cancelRequest',
																type: 'GET',
																data: {
																	id: id
																},


																success: function(response) {
																	Swal.fire({
																		title: "Success!",
																		text: "Cancelled Successfully!",
																		icon: "success"
																	}).then(function(result) {
																		if (result.value == true) {
																			$.ajax({
																				type: 'GET',
																				url: '<?= URL ?>Stationary/LoadData',
																				dataType: 'html', //expect html to be returned
																				success: function(response) {
																					$('.modal-backdrop').remove();
																					$('#view<?= $id ?>').hide(); // closes all active pop ups.
																					$('#response').html(response);

																				}

																			});
																		}
																	})
																}
															});
														}
														return false;

													});
													$('#gavebyStat<?= $id ?>').click(function() {
														var id = $('#id<?= $id ?>').val();
														var r = confirm('Are you sure you want to give items?');
														if (r == true) {
															loading(Swal)
															$.ajax({
																url: '<?= URL ?>Stationary/gavebyStat',
																type: 'GET',
																data: {
																	id: id
																},
																success: function(response) {
																	Swal.fire({
																		title: "Success!",
																		text: "Give items Successfully!!",
																		icon: "success"
																	}).then(function(result) {
																		if (result.value == true) {
																			$.ajax({
																				type: 'GET',
																				url: '<?= URL ?>Stationary/LoadData',
																				dataType: 'html', //expect html to be returned
																				success: function(response) {
																					$('.modal-backdrop').remove();
																					$('#view<?= $id ?>').hide(); // closes all active pop ups.
																					$('#response').html(response);

																				}

																			});
																		}
																	});
																}
															});
														}
														return false;

													});


													$('#adminApp<?= $id ?>').click(function() {
														var id = $('#id<?= $id ?>').val();
														var r = confirm('Are you sure you want to Approved?');
														if (r == true) {
															loading(Swal)
															$.ajax({
																url: '<?= URL ?>Stationary/AdminLine',
																type: 'GET',
																data: {
																	id: id
																},
																success: function(response) {

																	Swal.fire({
																		title: "Success!",
																		text: "Approve Successfully!!",
																		icon: "success"
																	}).then(function() {
																		$.ajax({
																			type: 'GET',
																			url: '<?= URL ?>Stationary/LoadData',
																			dataType: 'html', //expect html to be returned
																			success: function(response) {
																				$('.modal-backdrop').remove();
																				$('#view<?= $id ?>').hide(); // closes all active pop ups.
																				$('#response').html(response);
																			}

																		});
																		Close(Swal)
																	});
																}
															});
														}
														return false;
													});

												});
											</script> -->




										<?php	} ?>
									</div>
									<input type="hidden" id="id<?= $id ?>" value="<?= $id ?>" />
								</div>
							</div>
						</div>
					</div>
				</div>

				<script>
					$(document).ready(function() {
						$('#cancel<?= $id ?>').click(function() {
							var id = $('#id<?= $id ?>').val();
							var r = confirm('Are you sure you want to Cancel?');
							if (r == true) {
								loading(Swal)
								$.ajax({
									url: '<?= URL ?>Stationary/cancelRequest',
									type: 'GET',
									data: {
										id: id
									},
									success: function(response) {
										Swal.fire({
											title: "Success!",
											text: "Delete Successfully!!",
											icon: "success"
										}).then(function(result) {
											if (result.value == true) {
												$.ajax({
													type: 'GET',
													url: '<?= URL ?>Stationary/LoadData',
													dataType: 'html', //expect html to be returned
													success: function(response) {
														$('.modal-backdrop').remove();
														$('#view<?= $id ?>').hide(); // closes all active pop ups.
														$('#response').html(response);

													}

												});
											}
										})
									}
								});
							}
							return false;

						});
						$('#gavebyStat<?= $id ?>').click(function() {
							var id = $('#id<?= $id ?>').val();
							var r = confirm('Are you sure you want to Update?');
							if (r == true) {
								loading(Swal)
								$.ajax({
									url: '<?= URL ?>Stationary/gavebyStat',
									type: 'GET',
									data: {
										id: id
									},
									success: function(response) {
										Swal.fire({
											title: "Success!",
											text: "Delete Successfully!!",
											icon: "success"
										}).then(function(result) {
											if (result.value == true) {
												$.ajax({
													type: 'GET',
													url: '<?= URL ?>Stationary/LoadData',
													dataType: 'html', //expect html to be returned
													success: function(response) {
														$('.modal-backdrop').remove();
														$('#view<?= $id ?>').hide(); // closes all active pop ups.
														$('#response').html(response);

													}

												});
											}
										});
									}
								});
							}
							return false;

						});


						$('#adminApp<?= $id ?>').click(function() {
							var id = $('#id<?= $id ?>').val();
							var r = confirm('Are you sure you want to Approved?');
							if (r == true) {
								loading(Swal)
								$.ajax({
									url: '<?= URL ?>Stationary/AdminLine',
									type: 'GET',
									data: {
										id: id
									},
									success: function(response) {

										Swal.fire({
											title: "Success!",
											text: "Approve Successfully!!",
											icon: "success"
										}).then(function() {
											$.ajax({
												type: 'GET',
												url: '<?= URL ?>Stationary/LoadData',
												dataType: 'html', //expect html to be returned
												success: function(response) {
													$('.modal-backdrop').remove();
													$('#view<?= $id ?>').hide(); // closes all active pop ups.
													$('#response').html(response);
												}

											});
											Close(Swal)
										});
									}
								});
							}
							return false;
						});

					});
				</script>

			<?php }
			?>

		</tbody>
	</table>

</div>



<script>
	$(document).ready(function() {

		// Delete
		$('.deleteGroup').click(function() {


			var r = confirm("Are you sure you want to Remove?");
			if (r == true) {



				var el = this;
				var id = this.id;
				var splitid = id.split("_");

				// Delete id
				var deleteid = splitid[1];

				$.ajax({
					url: "<?= URL ?>Stocks/deleteStock",
					type: 'GET',
					data: {
						id: deleteid
					},
					success: function(response) {
						//alert(deleteid);
						//alert(response);
						///Removing row from HTML Table
						$(el).closest('tr').css('background', 'tomato');
						$(el).closest('tr').fadeOut(800, function() {
							$(this).remove();
						});


					}
				});
			} else {

			}

		});
	});
</script>

<!-- Bootstrap core JavaScript-->
<script src="<?php echo URL; ?>public/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo URL; ?>public/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?php echo URL; ?>public/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?php echo URL; ?>public/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="<?php echo URL; ?>public/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo URL; ?>public/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?php echo URL; ?>public/js/demo/datatables-demo.js"></script>

<script src="<?php echo URL; ?>public/js1/jquery-3.3.1.js"></script>
<script src="<?php echo URL; ?>public/js1/jquery.dataTables.min.js"></script>
<script src="<?php echo URL; ?>public/js1/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo URL; ?>public/js1/dataTables.buttons.min.js"></script>
<script src="<?php echo URL; ?>public/js1/buttons.bootstrap4.min.js"></script>
<script src="<?php echo URL; ?>public/js1/jszip.min.js"></script>
<script src="<?php echo URL; ?>public/js1/pdfmake.min.js"></script>
<script src="<?php echo URL; ?>public/js1/vfs_fonts.js"></script>
<script src="<?php echo URL; ?>public/js1/buttons.html5.min.js"></script>
<script src="<?php echo URL; ?>public/js1/buttons.print.min.js"></script>
<script src="<?php echo URL; ?>public/js1/buttons.colVis.min.js"></script>

<script>
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
		]

	});

	table.buttons().container()
		.appendTo('#example_wrapper .col-md-6:eq(0)');
</script>