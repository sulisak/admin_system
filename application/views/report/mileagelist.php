<script src="<?= URL ?>public/js/bootbox.min.js"></script>
<script src="<?= URL ?>public/js/jquery.js"> </script>

<link rel="stylesheet" href="<?= URL ?>public/css1/bootstrap.css">
<link rel="stylesheet" href="<?= URL ?>public/css1/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?= URL ?>public/css1/buttons.bootstrap4.min.css">
<link rel="stylesheet" href="<?= URL ?>public/css1/responsive.bootstrap4.min.css">
<style>
	tr td {
		padding: 0 0 0 10px !important;
		margin: 0 !important;
		vertical-align: middle !important;
	}
</style>

<div class="table-responsive ">
	<table class="table table-bordered" id="example" width="100%" height="500px" cellspacing="0">
		<thead>
			<tr>
				<th width="30px">No/<span class="laotext">ລຳດັບ</span></th>
				<th>Vehicle/<span class="laotext">ລົດ</span></th>
				<th>Color/<span class="laotext">ສີ</span></th>
				<th>Need_Maintaince/<span class="laotext">ຕ້ອງການບຳລຸງຮັກສາ</span></th>
				<th> Curr._Mileage(s)/<span class="laotext">ເລກໄມປະຈຸບັນ</span></th>
				<th> Last_Change_oil/<span class="laotext">ປ່ຽນນ້ຳມັນເຄື່ອງລ້າສຸດ</span></th>
				<th>Status/<span class="laotext">ສະຖານະ</span></th>
				<th width="30px">Action/<span class="laotext">ຈັດການ</span></th>
			</tr>
		</thead>
		<tbody>
			<?php
			$c = 0;
			$changeTheOil = 0;
			foreach ($list1 as $app) {
				$c++;
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
				$vehicleStat = isset($app->vehicleStat) ? $app->vehicleStat : '';
				$modelcar = isset($app->modelcar) ? $app->modelcar : '';
				$makercar = isset($app->makercar) ? $app->makercar : '';
				$changeoil = isset($app->changeoil) ? $app->changeoil : '';
				$startingMileage = isset($app->startingMileage) ? $app->startingMileage : '';
				$needchangeoil = isset($app->needchangeoil) ? $app->needchangeoil : '';
				$lastchange = isset($app->lastchange) ? $app->lastchange : '';

				//5900 > 6000
				if ($needchangeoil - 500  <=  $mileage) {
					echo "<tr bgcolor='#fd828d'>";
				} else {
					echo "<tr>";
				} ?>
				<td><?= $c ?></td>
				<td><?= $makercar ?> <?= $modelcar ?> <?= $vyear ?> #<?= $plate ?> </td>
				<td><?= strtoupper($vcolor) ?></td>
				<td><?= number_format($needchangeoil) ?> </td>
				<td><?= number_format($mileage) ?> </td>
				<td><?= number_format($lastchange) ?></td>
				<td><?= $vehicleStat ?></td>
				<td class="d-flex">
					<a href="#" class="btn btn-xs btn-block bg-gradient-success btn-flat deleteGroup" id="del_<?= $vid ?>">
						<i class="fas fa-check"></i>
					</a>
				</td>
				</tr>
			<?php	}
			?>
		</tbody>
	</table>

</div>

<script>
	$(document).ready(function() {
		// Delete
		$('.deleteGroup').click(function() {
			var r = confirm("Are you sure you want to Add Change-oil Marked?");
			if (r == true) {
				var el = this;
				var id = this.id;
				var splitid = id.split("_");

				// Delete id
				var deleteid = splitid[1];

				$.ajax({
					url: "<?= URL ?>Dashboard/updateNeedChangeoil",
					type: 'GET',
					data: {
						id: deleteid
					},
					success: function(response) {
						alert("Update Successfully!");
						$.ajax({ //create an ajax request to display.php
							type: "GET",
							url: "<?= URL ?>Report/VehicleMileageList",
							dataType: "html", //expect html to be returned
							success: function(response) {
								$("#response").html(response);
								//alert(response);
							}

						});
					}
				});
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