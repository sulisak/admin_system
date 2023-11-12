<script src="<?php echo URL; ?>public/js/jquery.js"> </script>

<link rel="stylesheet" href="<?php echo URL; ?>public/css1/bootstrap.css">
<link rel="stylesheet" href="<?php echo URL; ?>public/css1/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?php echo URL; ?>public/css1/buttons.bootstrap4.min.css">
<link rel="stylesheet" href="<?php echo URL; ?>public/css1/responsive.bootstrap4.min.css">

<style>
	tr td {
		padding: 0 10px 0 10px !important;
		margin: 0 !important;
		vertical-align: middle !important;
	}
</style>

<div class="">

	<table class="table table-bordered table-hover  table-striped table-responsive" id="example" width="100%" height="500px" cellspacing="0">
		<thead>
			<tr>
				<th>No/<span class="laotext">ລຳດັບ</span> </th>
				<th>Photo</th>
				<th>Fullname/<span class="laotext">ຊື່ຜູ້ເບີກ</span> </th>
				<th>VRNo./<span class="laotext">ເລກທີເບີກ</span> </th>
				<th>Vehicle/<span class="laotext">ຊື່ລົດ</span> </th>
				<th>Departure/<span class="laotext">ພະແນກ</span> </th>
				<th>Arrival/<span class="laotext">ມາຮອດ</span> </th>
				<th>Return_Key/<span class="laotext">ສົ່ງກະແຈ</span> </th>
				<th>Driver/<span class="laotext">ພະນັກງານຂັບລົດ</span> </th>
				<th>Action/<span class="laotext">ຈັດການ</span> </th>
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
				if (isset($app->rid))  $rid = $app->rid;
				if (isset($app->userid))  $userid = $app->userid;
				if (isset($app->vrno))  $vrno = $app->vrno;
				if (isset($app->departdate))  $departdate = $app->departdate;
				if (isset($app->daparttime))  $daparttime = $app->daparttime;
				if (isset($app->datereturn))  $datereturn = $app->datereturn;
				if (isset($app->returntime))  $returntime = $app->returntime;
				if (isset($app->rstatus))  $rstatus = $app->rstatus;
				if (isset($app->location))  $location = $app->location;
				if (isset($app->dateRequest))  $dateRequest = $app->dateRequest;
				if (isset($app->purpose))  $purpose = $app->purpose;
				if (isset($app->modelname))  $modelname = $app->modelname;
				if (isset($app->cname))  $cname = $app->cname;
				if (isset($app->makername))  $makername = $app->makername;
				if (isset($app->department))  $department = $app->department;
				if (isset($app->Email))  $Email = $app->Email;
				if (isset($app->fullname))  $fullname = $app->fullname;
				if (isset($app->Dfname)) {
					$Dfname = $app->Dfname;
				} else {
					$Dfname = '';
				}
				if (isset($app->dateRequest))  $dateRequest = $app->dateRequest;
				if (isset($app->plate))  $plate = $app->plate;
				if (isset($app->drivertype))  $drivertype = $app->drivertype;

				if (isset($app->returnTimekey))  $returnTimekey = $app->returnTimekey;
				if (isset($app->logo)) {
					$logo = $app->logo;
				} else {
					$logo = "";
				}


				//$dateRequest=date_create($dateRequest);
				//$dateRequest=date_format($dateRequest,"D jS \of M Y");


				//$departdate=date_create($departdate);
				//$departdate=date_format($departdate,"D jS \of M Y");

				//	$datereturn=date_create($datereturn);
				//$datereturn=date_format($datereturn,"D jS \of M Y");

				if ($returnTimekey == '') {
					$returnTimekey = '---';
				}
				//else{
				//$returnTimekey=date_create($returnTimekey);
				//$returnTimekey=date_format($returnTimekey,"D jS \of M Y -  H:i:s");
				//}


				if ($logo == "") {
					$logo = "dd1.jpg";
				}
				echo "<tr>";
				echo "<td align='center'><div style='min-width:80px'>" . $c . "</div></td>";
				echo "<td><a href ='" . URL . "public/img/car/" . $logo . "' target='_blank'> <img src='" . URL . "public/img/car/" . $logo . "' width='70px'></a> </td>";
				echo "<td><div style='min-width:200px'>" . $fullname . "</div></td>";
				echo "<td><div style='min-width:100px'><a href='' title='View details'  class='viewDetails'
					 id='del_" . $rid . "'
					target='_blank'>" . $vrno . "</a></div></td>";
				echo "<td><div style='min-width:400px'>" . $makername . " " . $modelname . " #" . $plate . " </td>";
				echo "<td><div style='min-width:200px'>" . strtoupper($departdate) . "</div></td>";
				echo "<td><div style='min-width:200px'>" . strtoupper($datereturn) . "</div></td>";

				echo "<td><div style='min-width:200px'><p class='st'>" . strtoupper($returnTimekey) . "</p> </div></td>";
				//echo "<td><p class='st'>".$Dfname."</p>  </td>";

				if ($Dfname == "") {
					if ($drivertype == 0) {
						echo '<td align="center">	<div style="min-width:160px">
								Drive by self  	</div>
								</td>';
					} else {
						echo '<td >

							</td>';
					}
				} else {
					echo '<td align="center">	<div style="min-width:160px">
								' . $Dfname . '	</div>
							  </td>';
				}
				echo '<td align="center">	<div style="min-width:110px">
							<button title="View details"  class="btn btn-xs   bg-gradient-primary btn-flat viewDetails"
										 id="del_' . $rid . '"
										>
											<i class="fas fa-eye"></i>
							</button>

							</div>
							</td>';
				echo "</tr>";
			}
			?>




		</tbody>
	</table>

</div>
</font>

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
					// alert(response);

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


<div class="modal " id="showDiv" style=" background-color: rgba(0,0,0,.01) !important;
  width: 100%;
  height: 100%;
  overflow: auto;">

	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title laotext">Request Details_testtt/ລາຍລະອຽດເບີກລົດ</h4>
				<button type="button" class="close closemd" data-dismiss="modal" aria-label="Close">
					<i class='fa fa-times-circle' style='color: red; font-size: 25px;'></i>
				</button>
			</div>
			<div class="modal-body scroll">
				<div id="vdres"></div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger closemd" data-dismiss="modal">Close/ປິດ</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>

</div>

<div class="modal " id="addModalDiv" style=" background-color: rgba(0,0,0,.01) !important;
  width: 100%;
  height: 100%;
  overflow: auto;">
	<form id="AddModel" method="post">
		<div class="modal-dialog modal-md">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Return vehicle/ສົ່ງກະແຈລົດ</h4>
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


</font>


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
		});

		table.buttons().container()
			.appendTo('#example_wrapper .col-md-6:eq(0)');
	});
</script>