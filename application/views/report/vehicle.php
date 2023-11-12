<script src="<?php echo URL; ?>public/js/bootbox.min.js"></script>
<script src="<?php echo URL; ?>public/js/jquery.js"> </script>

<link rel="stylesheet" href="<?php echo URL; ?>public/css1/bootstrap.css">
<link rel="stylesheet" href="<?php echo URL; ?>public/css1/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?php echo URL; ?>public/css1/buttons.bootstrap4.min.css">
<link rel="stylesheet" href="<?php echo URL; ?>public/css1/responsive.bootstrap4.min.css">
<style>
	.switch {
		position: relative;
		display: inline-block;
		width: 60px;
		height: 34px;
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
		height: 26px;
		width: 26px;
		left: 4px;
		bottom: 4px;
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
		border-radius: 34px;
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

<div class="table-responsive">
	<table class="table table-bordered table-condensed table-striped " id="example" cellspacing="0">
		<thead>
			<tr>
				<th>No/<span class="laotext">ລຳດັບ</span></th>
				<th>Photo</th>
				<th>Vechicle_Identification_Number/<span class="laotext">ເລກຈັກ</span></th>
				<th>Vechicle/<span class="laotext">ລົດ</span> </th>
				<th>ODM/<span class="laotext">ເລກກົງເຕີ</span></th>
				<th>Request/<span class="laotext">ການຮ້ອງຂໍ</span></th>
				<!-- <th >Status</th>-->
				<th width="50px">Action/<span class="laotext">ຈັດການ</span></th>

			</tr>
		</thead>
		<tbody>
			<?php
			$c = 0;
			// print_r($list1 );
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
				$makercar = isset($app->makercar) ?  $app->makercar : '';
				$modelcar = isset($app->modelcar) ?  $app->modelcar : '';
				$changeoil = isset($app->changeoil) ?  $app->changeoil : '';
				$LaoType = isset($app->LaoType) ?  $app->LaoType : '';
				$LaoRenew = isset($app->LaoRenew) ?  $app->LaoRenew : '';
				$LaoInsureExpired = isset($app->LaoInsureExpired) ?  $app->LaoInsureExpired : '';
				$ThaiType = isset($app->ThaiType) ?  $app->ThaiType : '';
				$ThaiRenew = isset($app->ThaiRenew) ?  $app->ThaiRenew : '';
				$ThaiExpired = isset($app->ThaiExpired) ?  $app->ThaiExpired : '';
				$CarInsExpired = isset($app->CarInsExpired) ?  $app->CarInsExpired : '';
				$RoadTaxExpire = isset($app->RoadTaxExpire) ?  $app->RoadTaxExpire : '';
				$BusinessUnit = isset($app->BusinessUnit) ?  $app->BusinessUnit : '';
				$fuelcons = isset($app->fuelcons) ?  $app->fuelcons : '';
				$logo = isset($app->logo) ?  $app->logo : '';
				$countdata = isset($app->countdata) ?  $app->countdata : '';
				date_default_timezone_set('Asia/Bangkok');
				$CURR = date("Y-m-d");
				$CURR = strtotime($CURR);
				$CURR = date("Y-m-d", strtotime("+1 month", $CURR));



				if ($logo == "") {
					$logo = "dd1.jpg";
				} ?>


				<tr>
					<td><?= $c ?></td>
					<td><a href='<?= URL ?>public/img/car/<?= $logo ?>' target='_blank'> <img src='<?= URL ?>public/img/car/<?= $logo ?>' width='70px'></a> </td>
					<td><?= $vin ?></td>

					<td>
						<div style='width:300px!important; vertical-align:middle!important;'>
							<?= $makercar ?> <?= $modelcar ?> <?= $vyear ?> #<?= $plate ?>
						</div>
					</td>
					<td><?= number_format($mileage) ?></td>

					<td><?= number_format($countdata) ?></td>

					<td class="d-flex">
						<a href="#" class="btn btn-xs
									bg-gradient-info btn-flat loaddetails" id="del_<?= $vid ?>">
							<i class="fas fa-eye"></i>
						</a><a href="<?= URL ?>Dashboard/UpdateVehicleForm?id=<?= $vid ?>" class="btn btn-xs
									bg-gradient-success btn-flat" onClick="return confirm('Are you sure you want to edit?');">
							<i class="fas fa-edit"></i>
						</a>
						<a href="#" class="btn btn-xs  bg-gradient-danger btn-flat deleteGroup" id="del_<?= $vid ?>">
							<i class="fas fa-trash"></i>
						</a>
					</td>

				</tr>
				<script>
					var switchStatus = false;
					$("#togBtn_<?= $vid ?>").on("change", function() {
						var switchStatus = "";
						var id = "<?= $vid ?>";
						if ($(this).is(":checked")) {
							switchStatus = $(this).is(":checked");

						} else {
							switchStatus = $(this).is(":checked");

						}
						//alert(switchStatus);// To verify
						var pass = "";
						if (switchStatus == true) {
							pass = 0;
						} else {
							pass = 1;
						}
						//alert(pass);// To verify
						$.ajax({
							url: "<?= URL ?>Dashboard/Updatestat",
							type: "GET",
							data: {
								id: id,
								st: pass
							},
							success: function(response) {
								alert("Update Successfully!");
							}
						});
					});
				</script>
			<?php	}
			?>
		</tbody>
	</table>

</div>
<div class="modal " id="viewLocation" tabindex="-1" role="dialog " style=" background-color: rgba(0,0,0,.01) !important;
  width: 100%;
  height: 100%;
  overflow: auto;">

	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content " style="border-radius:5px; ">
			<div class="modal-header">
				<h4 style="color:#000" class="modal-title" id="defaultModalLabel">Vechicle Info/
					<span class="laotext">ຂໍ້ມູນລົດ</span>
				</h4>
			</div>
			<div class="modal-body">
				<div id="loadGetInfo"></div>
			</div>
			<div class="modal-footer">


				<a href="#" id="" data-color="pink" class="btn bg-pink closemodal waves-effect">CLOSE/
					<span class="laotext">ປິດ</span></a>

			</div>
		</div>
	</div>

</div>
<script>
	$(document).ready(function() {
		$('.closemodal').click(function() {
			$('#viewLocation').hide();
		});

		$('.loaddetails').click(function() {
			var el = this;
			var id = this.id;
			var splitid = id.split("_");

			// Delete id
			var id = splitid[1];
			//alert(id);
			$.ajax({
				url: <?php echo '"' . URL . 'Dashboard/getData"'; ?>,
				type: 'GET',
				data: {
					id: id
				},
				success: function(response) {
					//	alert(response);
					$("#loadGetInfo").html(response);
					$('#viewLocation').show();

				}
			});

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
					url: <?php echo "'" . URL . "'" ?> + "Dashboard/deleteVehicle",
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