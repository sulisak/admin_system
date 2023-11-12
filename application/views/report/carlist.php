<script src="<?= URL ?>public/js/bootbox.min.js"></script>
<script src="<?= URL ?>public/js/jquery.js"> </script>

<link rel="stylesheet" href="<?= URL ?>public/css1/bootstrap.css">
<link rel="stylesheet" href="<?= URL ?>public/css1/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?= URL ?>public/css1/buttons.bootstrap4.min.css">
<link rel="stylesheet" href="<?= URL ?>public/css1/responsive.bootstrap4.min.css">
<style>
	.switch {
		position: relative;
		display: inline-block;
		width: 50px;
		height: 20px;
		margin-top: 10px;
	}

	.switch input {
		opacity: 0;
		width: 0;
		height: 0;
	}

	.slider {
		position: absolute;
		cursor: pointer;
		top: 0;
		left: 0;
		right: 0;
		bottom: 0;
		background-color: #ccc;
		-webkit-transition: .4s;
		transition: .4s;
	}

	.slider:before {
		position: absolute;
		content: "";
		height: 10px;
		width: 15px;
		left: 5px;
		bottom: 5px;
		background-color: white;
		-webkit-transition: .4s;
		transition: .4s;
	}

	input:checked+.slider {
		background-color: #2196F3;
	}

	input:focus+.slider {
		box-shadow: 0 0 1px #2196F3;
	}

	input:checked+.slider:before {
		-webkit-transform: translateX(26px);
		-ms-transform: translateX(26px);
		transform: translateX(26px);
	}

	/* Rounded sliders */
	.slider.round {
		border-radius: 14px;
	}

	.slider.round:before {
		border-radius: 50%;
	}

	tr td {
		padding: 0 0 0 10px !important;
		margin: 0 !important;
		vertical-align: middle !important;
	}
</style>


<div class="e">
	<div id="updatem" style="display:none">
		<div class="col-md-6" style="width:100%;height:350px;border:1px solid #007bff; padding:10px">
			<div style="max-height:100%;overflow:auto;padding:10px">
				<FORM id="submitremark" method="post">
					Date Completed/<span class="laotext">ວັນທີສຳເລັດ</span>
					<?php
					date_default_timezone_set('Asia/Bangkok');
					$time = date("H:i");
					?>
					<input type="date" class="form-control" name="ed" id="ed" min="<?= $date; ?>" required>
					<input type="hidden" class="form-control" name="sd" id="sd" value="<?= $date; ?>" required>

					<span id="dddddd" class="laotext">Time Completed/ເວລາສຳເລັດ</span> <span id="resss" style="color:red"></span>
					<div style="display:none">
						<input type="time" class="form-control" name="stime" id="start_time" required value="<?= $time; ?>">
					</div>
					<input type="time" class="form-control" name="etime" id="end_time" required>
					<input type="hidden" id="vid" class="form-control" name="vid" required>
					Remarks/<span class="laotext">ໝາຍເຫດ</span>
					<Textarea name="remarks" class="form-control" rows="4" id="txt" placeholder=" Enter short remarks... " required></textarea>
					<br>
					<button class="btn btn-primary" type="submit">Submit & disabled vehicle/
						<span class="laotext">ບັນທຶກ</span></button>
					<button class="btn btn-danger" id="canceldis" type="button">Cancel/
						<span class="laotext">ຍົກເລີກ</span></button>
				</form>
			</div>
		</div>
	</div>
	<hr>
	<div class="table-responsive ">
		<table class="table table-bordered" id="example" width="100%" height="500px" cellspacing="0">
			<thead>
				<tr>
					<th width="30px">No/<span class="laotext">ລຳດັບ</span></th>
					<th>Vehicle/<span class="laotext">ລົດ</span></th>
					<th>Color/<span class="laotext">ສີ</span></th>
					<th>Plate#/<span class="laotext">ເລກທະບຽນ</span></th>
					<th>Transmission/<span class="laotext">ແບບການຂັບເຄື່ອນ</span></th>
					<th>Mileage/<span class="laotext">ເລກໄມສະສົມ</span></th>
					<th>Book_Status/<span class="laotext">ສະຖານະການຈອງ</span></th>
					<th>Start/<span class="laotext">ເລີ່ມ</span></th>
					<th>End/<span class="laotext">ສິ້ນສຸດ</span></th>
					<th>Car_Status/<span class="laotext">ສະຖານະລົດ</span></th>
					<th>Short Comment/<span class="laotext">ໝາຍເຫດຫຍໍ້</span></th>
					<th width="30px">Status/<span class="laotext">ສະຖານະ</span></th>

				</tr>
			</thead>
			<tbody>
				<?php
				$c = 0;
				// print_r($list1);
				foreach ($list1 as $app) {
					$c++;
					$vid = isset($app->vid) ?  $app->vid : 0;
					$vin = isset($app->vin) ?  $app->vin : 0;
					$vyear = isset($app->vyear) ?  $app->vyear : '';
					$maker = isset($app->maker) ?  $app->maker : '';
					$model = isset($app->model) ?  $app->model : '';
					$vcolor = isset($app->vcolor) ?  $app->vcolor : '';
					$plate = isset($app->plate) ?  $app->plate : '';
					$maxpassenger = isset($app->maxpassenger) ?  $app->maxpassenger : '';
					$transmission = isset($app->transmission) ?  $app->transmission : '';
					$engine = isset($app->engine) ?  $app->engine : '';
					$tankcapacity = isset($app->tankcapacity) ?  $app->tankcapacity : '';
					$fueltype = isset($app->fueltype) ?  $app->fueltype : '';
					$mileage = isset($app->mileage) ?  $app->mileage : '';
					$vehicleStat = isset($app->vehicleStat) ?  $app->vehicleStat : '';
					$modelcar = isset($app->modelcar) ?  $app->modelcar : '';
					$makercar = isset($app->makercar) ?  $app->makercar : '';
					$st = isset($app->st) ?  $app->st : '';
					$sdate = isset($app->sdate) ?  $app->sdate : '';
					$edate = isset($app->edate) ?  $app->edate : '';
					$remarks = isset($app->remarks) ?  $app->remarks : '';

					if ($vehicleStat == 'Pending') {
						echo "<tr bgcolor='#ffde7a'>";
					} elseif ($vehicleStat == 'Booked') {
						echo "<tr bgcolor='#fd828d'>";
					} else {
						echo "<tr>";
					} ?>

					<td><?= $c ?></td>
					<td>
						<div style='width:300px!important; vertical-align:middle!important;'><?= $makercar ?> <?= $modelcar ?> <?= $vyear ?> </div>
					</td>
					<td><?= $vcolor ?></td>
					<td><?= $plate ?></td>
					<td><?= $transmission ?></td>
					<td><?= number_format($mileage) ?></td>
					<td><?= $vehicleStat ?> </td>
					<?php if ($sdate != '') {
						echo "<td><div style='width:200px!important; vertical-align:middle!important;'>" .  ($sdate) . " </div>  </td>";
					} else {
						echo "<td>  </td>";
					}
					if ($edate != '') {
						echo "<td><div style='width:200px!important; vertical-align:middle!important;'>" .  ($edate) . " </div>  </td>";
					} else {
						echo "<td>  </td>";
					}

					if ($st == 0) {
						echo "<td bgcolor='#f3c9cd'> Disabled</td>";
					} else {
						echo "<td  bgcolor='#beefd3'>Available</td>";
					}

					echo "<td>" . $remarks . "   </td>";

					if ($vehicleStat == "Available") {
						if ($st == 1) { ?>
							<td><label class="switch">
									<input type="checkbox" id="togBtn_<?= $vid ?>" checked>
									<span class="slider round"></span>
								</label>
							</td>
						<?php	} else { ?>
							<td><label class="switch">
									<input type="checkbox" id="togBtn_<?= $vid ?>">
									<span class="slider round"></span>
								</label>
							</td>
						<?php	}
					} else {
						if ($st == 1) { ?>
							<td><label class="switch">
									<input type="checkbox" id="togBtn_<?= $vid ?>" checked>
									<span class="slider round"></span>
								</label>
							</td>
						<?php } else { ?>
							<td><label class="switch">
									<input type="checkbox" id="togBtn_<?= $vid ?>">
									<span class="slider round"></span>
								</label>
							</td>
					<?php }
					} ?>

					</tr>

					<script>
						var switchStatus = false;
						$("#togBtn_<?= $vid ?>").on("change", function() {
							var switchStatus = "";
							var id = "<?= $vid ?>";
							if ($(this).is(":checked")) {
								switchStatus = $(this).is(":checked");
								$("#updatem").hide();
								var pass = "1";
								$.ajax({
									url: "<?= URL ?>Report/UpdatestatOn",
									type: "GET",
									data: {
										id: id,
										st: pass
									},
									success: function(response) {

										$.ajax({ //create an ajax request to display.php
											type: "GET",
											url: "<?= URL  ?>Report/CarAvailabilityList",
											dataType: "html", //expect html to be returned
											success: function(response) {
												$("#response").html(response);

											}

										});



									}
								});
							} else {
								switchStatus = $(this).is(":checked");
								$("#updatem").show();
							}
							//alert(switchStatus);// To verify
							var pass = "";
							if (switchStatus == true) {
								pass = 0;
							} else {
								pass = 1;
							}
							//alert(pass);// To verify
							$("#vid").val(<?= $vid ?>);

						});
					</script>
				<?php	}
				?>
			</tbody>
		</table>
	</div>

</div>

<script>
	$(document).ready(function() {
		$('#updatem').hide();
		$('#canceldis').click(function() {
			$.ajax({ //create an ajax request to display.php
				type: "GET",
				url: "<?= URL ?>Report/CarAvailabilityList",
				dataType: "html", //expect html to be returned
				success: function(response) {
					$("#response").html(response);
					//alert(response);
				}
			});
		});
		$("#submitremark").submit(function() {
			//start time
			var start_time = $("#start_time").val();

			//end time
			var end_time = $("#end_time").val();
			var sd = $("#sd").val();
			var ed = $("#ed").val();

			//convert both time into timestamp
			var stt = new Date(sd + " " + start_time);
			stt = stt.getTime();

			var endt = new Date(ed + " " + end_time);
			endt = endt.getTime();

			//by this you can see time stamp value in console via firebug


			if (stt > endt) {
				$("#resss").val("");
				$("#resss").fadeOut("slow").html("* Its should be higher than previous date and time!").fadeIn(500);
				$("#end_time").focus();
				return false;
			} else {

				$.ajax({
						type: "POST",
						url: <?php echo '"' . URL . '"'; ?> + "Report/SaveRemark",
						data: $(this).serialize()
					})
					.done(function(data) {


						$.ajax({ //create an ajax request to display.php
							type: "GET",
							url: "<?= URL ?>Report/CarAvailabilityList",
							dataType: "html", //expect html to be returned
							success: function(response) {
								$("#response").html(response);
							}
						});

						$("#end_time").val("");
						$("#ed").val("");
						$("#txt").val("");

						$('#updatem').hide();
						$("#resss").val("");
					})
					.fail(function() {
						alert("Posting failed.");
					});
				return false;
			}
			return false;

		});

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
					url: "<?= URL ?>Dashboard/deleteVehicle",
					type: 'GET',
					data: {
						id: deleteid
					},
					success: function(response) {
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
<script src="<?= URL ?>public/vendor/jquery/jquery.min.js"></script>
<script src="<?= URL ?>public/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= URL ?>public/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= URL ?>public/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="<?= URL ?>public/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= URL ?>public/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?= URL ?>public/js/demo/datatables-demo.js"></script>

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