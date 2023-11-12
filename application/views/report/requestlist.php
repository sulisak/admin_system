<script src="<?php echo URL; ?>public/js/jquery.js"> </script>

<link rel="stylesheet" href="<?php echo URL; ?>public/css1/bootstrap.css">
<link rel="stylesheet" href="<?php echo URL; ?>public/css1/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?php echo URL; ?>public/css1/buttons.bootstrap4.min.css">
<link rel="stylesheet" href="<?php echo URL; ?>public/css1/responsive.bootstrap4.min.css">



<div class="table-responsive">
	<table class="table table-bordered table-hover table-striped" id="example" width="100%" height="500px" cellspacing="0">
		<thead>
			<tr>
				<th>No/<span class="laotext">ລຳດັບ</span></th>
				<th>VRNo/<span class="laotext">ເລກຈັກ.</span></th>
				<th>Vehicle/<span class="laotext">ລົດ</span></th>
				<th>Requestor/<span class="laotext">ຜູ້ຮ້ອງຂໍ</span></th>
				<th>Location</th>
				<th>Business_Unit/<span class="laotext">ຫົວໜ່ວຍທຸລະກິດ</span></th>
				<th>Department/<span class="laotext">ພະແນກ</span></th>
				<th>Purpose</th>
				<th>Departure/<span class="laotext">ອອກໄປ</span></th>
				<th>Arrival/<span class="laotext">ມາຮອດ</span></th>
				<th>Return_Key/<span class="laotext">ສົ່ງກະແຈ</span></th>
				<th>Duration<span class="laotext"></span></th>
				<th>Used ODM<span class="laotext"></span></th>
				<th>Driver/<span class="laotext">ຄົນຂັບ</span></th>
				<th>Action/<span class="laotext">ຈັດການ</span></th>
			</tr>
		</thead>
		<tbody>
			<?php
			$c = 0;
			$rstatus = "";
			$userid = "";
			$username = "";
			$fullname = "";
			$contact = "";
			$company = "";
			$department = "";

			foreach ($list as $app) {
				$c++;
				$returnTimekey = '';
				$rid = isset($app->rid) ?  $app->rid : 0;
				$userid = isset($app->userid) ?  $app->userid : 0;
				$vrno = isset($app->vrno) ?  $app->vrno : 0;
				$departdate = isset($app->departdate) ?  $app->departdate : '';
				$daparttime = isset($app->daparttime) ?  $app->daparttime : '';
				$datereturn = isset($app->datereturn) ?  $app->datereturn : '';
				$returntime = isset($app->returntime) ?  $app->returntime : '';
				$rstatus = isset($app->rstatus) ?  $app->rstatus : '';
				$location = isset($app->location) ?  $app->location : '';
				$dateRequest = isset($app->dateRequest) ?  $app->dateRequest : '';
				$purpose = isset($app->purpose) ?  $app->purpose : '';
				$modelname = isset($app->modelname) ?  $app->modelname : '';
				$cname = isset($app->cname) ?  $app->cname : '';
				$makername = isset($app->makername) ?  $app->makername : '';
				$department = isset($app->department) ?  $app->department : '';
				$Email = isset($app->Email) ?  $app->Email : '';
				$fullname = isset($app->fullname) ?  $app->fullname : '';
				$Dfname = isset($app->Dfname) ?  $app->Dfname : '';
				$dateRequest = isset($app->dateRequest) ?  $app->dateRequest : '';
				$plate = isset($app->plate) ?  $app->plate : '';
				$drivertype = isset($app->drivertype) ?  $app->drivertype : '';
				$returnTimekey = isset($app->returnTimekey) ?  $app->returnTimekey : '';
				$Duration = isset($app->Duration) ?  $app->Duration : 0;
				$totalused = isset($app->totalused) ?  $app->totalused : 0;

				$dateRequest = date_create($dateRequest);
				$dateRequest = date_format($dateRequest, "d-m-Y H:i:s");

				$departdate = date_create($departdate);
				$departdate = date_format($departdate, "d-m-Y H:i:s");

				$datereturn = date_create($datereturn);
				$datereturn = date_format($datereturn, "d-m-Y H:i:s");

				if ($returnTimekey == "0000-00-00 00:00:00") {
					$returnTimekey = '---';
				} else {
					$returnTimekey = date_create($returnTimekey);
					$returnTimekey = date_format($returnTimekey, "d-m-Y H:i:s");
				} ?>


				<tr>
					<td><?= $c ?></td>
					<td><a href='' title='View details' class='viewDetails' id='del_<?= $rid ?>' target='_blank'><?= $vrno ?></a></td>
					<td><?= $makername ?> <?= $modelname ?> #<?= $plate ?> </td>
					<td><?= $fullname ?></td>
					<td><?= $location ?></td>
					<td><?= $cname ?></td>
					<td><?= $department ?></td>
					<td><?= $purpose ?></td>

					<td><?= strtoupper($departdate) ?></td>
					<td><?= strtoupper($datereturn) ?></td>

					<td>
						<p class='st'><?= ($returnTimekey) ?></p>
					</td>
					<?php if ($Duration == 0) { ?>
						<td>
							<p class='st'>0</p>
						</td>
					<?php } else { ?>
						<td>
							<p class='st'><?= number_format(($Duration / 60), 2) ?> hr(s)</p>
						</td>
					<?php	} ?>
					<td>
						<p class='st'><?= number_format(($totalused)) ?> KM </p>
					</td>

					<?php if ($drivertype == 0) {
						echo '<td>
						Drive by self
					</td>';
					} else {
						echo '<td>
						' . $Dfname . '
					</td>';
					} ?>
					<td align="center">
						<button title="View details" class="btn btn-xs   bg-gradient-primary btn-flat viewDetails" id="del_<?= $rid ?>">
							<i class="fas fa-eye"></i>
						</button>
					</td>
				</tr>
			<?php }
			?>
		</tbody>
	</table>

</div>


<script>
	$(document).ready(function() {
		$('.closemodal').click(function() {
			$('#addModalDiv').hide();

		});
		$('.closemd').click(function() {
			$("#showDiv").hide();
		});

		$('.viewDetails').click(function() {
			$("#showDiv").show();
			var el = this;
			var id = this.id;
			var splitid = id.split("_");

			// id
			var id = splitid[1];
			//alert(id);
			$.ajax({
				url: <?php echo "'" . URL . "'" ?> + "Request/ViewDetail?id=" + id,
				type: 'GET',
				data: {
					id: id
				},
				success: function(response) {
					//alert(response);

					$("#vdres").html(response);

				}
			});



			return false;
		});






		$(".addModel").click(function() {
			var el = this;
			var id = this.id;
			var splitid = id.split("_");

			// id
			var id = splitid[1];
			alert(id);
			$('#addModalDiv').show();

			$.ajax({
				url: <?php echo "'" . URL . "'" ?> + "Request/getinfoReturn?id=" + id,
				type: 'GET',
				data: {
					id: id
				},
				success: function(response) {
					//alert(response);
					$('#responseAdd').html(response);
					/*
						$.ajax({    //create an ajax request to display.php
							type: "GET",
							url: <?php echo  "'" .  URL  . "Request/ReturnRequestList'"; ?>,
							dataType: "html",   //expect html to be returned
							success: function(response){
								$("#response").html(response);
								//alert('Approved!');
							}

						/*/
				}
			});


			return false;



		});
		$("#AddModel").submit(function() {
			$.ajax({
					type: "POST",
					url: <?php echo  "'" .  URL  . "Request/AddReturn'"; ?>,
					data: $(this).serialize()
				}).done(function(data) {
					//$("#responseAdd").fadeOut(500).html(data).fadeIn(300);

					if (data == "ok") {

						$.ajax({ //create an ajax request to display.php
							type: "GET",
							url: <?php echo  "'" .  URL  . "Request/ReturnRequestList'"; ?>,
							dataType: "html", //expect html to be returned
							success: function(response) {
								$("#response").html(response);
								//alert(response);
							}

						});
					} else {
						alert(data);
					}


				})
				.fail(function() {
					alert("Posting failed.");
				});


			return false;


		});

	});
</script>
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

<div class="modal " id="showDiv">

	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Request Details/ລາຍລະອຽດການຮ້ອງຂໍ</h4>
				<button type="button" class="close closemd" data-dismiss="modal" aria-label="Close">
					<i class='fa fa-times-circle' style='color: red; font-size: 25px;'></i>
				</button>
			</div>
			<div class="modal-body scroll" style="height:550px;overflow-y: scroll;">
				<div id="vdres"></div>
			</div>
			<div class="modal-footer ">
				<button type="button" class="btn btn-danger closemd" data-dismiss="modal">Close/ປິດ</button>

			</div>
		</div>
		<!-- /.modal-content -->
	</div>

</div>

<div class="modal " id="addModalDiv">
	<form id="AddModel" method="post">
		<div class="modal-dialog modal-md">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Return vehicle/ສົ່ງລົດ</h4>
					<button type="button" class="close closemodal" data-dismiss="modal" aria-label="Close">
						<i class='fa fa-times-circle' style='color: red; font-size: 25px;'></i>
					</button>
				</div>
				<div class="modal-body">

					<div id="responseAdd"> </div>


				</div>
				<div class="modal-footer ">
					<button type="button" class="btn btn-danger closemodal" data-dismiss="modal">Close/ປິດ</button>
					<button type="submit" class="btn btn-primary">Save Details/ບັນທຶກ</button>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
	</form>
	<!-- /.modal-dialog -->
</div>





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