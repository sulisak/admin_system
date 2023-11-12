<script src="<?= URL; ?>public/js/jquery.js"></script>
<link rel="stylesheet" href="<?= URL; ?>public/css1/bootstrap.css">
<link rel="stylesheet" href="<?= URL; ?>public/css1/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?= URL; ?>public/css1/buttons.bootstrap4.min.css">
<link rel="stylesheet" href="<?= URL; ?>public/css1/responsive.bootstrap4.min.css">

<div class="">
	<div class="alert alert-success alert-dismissible fade show" role="alert" style="display:none" id="messageres">
		<p><b>Message/<span class="laotext">ຂໍ້ຄວາມ</span>: </b> <span id="msg">.</span></p>
		<button type="button" id="closebt" class="close">
			<i class='fa fa-times-circle' style='color: red; font-size: 25px;'></i>
		</button>
	</div>
	<div class="table-responsive">
		<table class="table table-bordered table-hover  table-striped" id="example" width="100%" height="500px" cellspacing="0">
			<thead>
				<tr>
					<th width="30px">No/<span class="laotext">ລຳດັບ</span></th>
					<th>Facility/<span class="laotext">ສະຖານທີ່</span></th>
					<th>Business_Unit/<span class="laotext">ຫົວໜ່ວຍທຸລະກິດ</span></th>
					<th width="180px">Duties/<span class="laotext">ໜ້າທີ່</span></th>
					<th width="200px">Action/<span class="laotext">ຈັດການ</span></th>
				</tr>
			</thead>
			<tbody>
				<?php
				$c = 0;
				foreach ($list1 as $app) {
					$c++;
					if (isset($app->fid))  $fid = $app->fid;
					if (isset($app->facilityname))  $facilityname = $app->facilityname;
					if (isset($app->company))  $company = $app->company;
					if (isset($app->dutiesCount)) {
						$dutiesCount = $app->dutiesCount;
					} else {
						$dutiesCount = 0;
					} ?>

					<tr class='data'>
						<td><?= $c ?></td>
						<td>
							<input type='text' class='form-control' value='<?= $facilityname ?>' placeholder='Enter Maker Name' id='name_<?= $fid ?>' />
						</td>
						<td><?= $company ?></td>
						<td>
							<button class="btn btn-xs  bg-gradient-success btn-flat addModel" id="del_<?= $fid ?>">
								<i class="fas fa-plus"></i> Add
							</button>
							<button class="btn btn-xs  bg-gradient-info btn-flat ViewModel" id="del_<?= $fid ?>">
								<i class="fas fa-eye"></i> View
							</button>
						</td>
						<?php if ($dutiesCount == '0') { ?>
							<td>
								<button class="btn btn-xs  bg-gradient-success btn-flat UpdateModel" id="UpdateModel_<?= $fid ?>">
									<i class="fas fa-edit"></i> Edit
								</button>
								<button class="btn btn-xs  bg-gradient-danger btn-flat deleteGroup" id="del_<?= $fid ?>">
									<i class="fas fa-trash"></i> Delete
								</button>
							</td>
						<?php	} else { ?>
							<td>
							</td>
						<?php	} ?>
					</tr>

					<script>
						$(document).ready(function() {

							$('#messageres').hide();
							$('#closebt').click(function() {
								$('#messageres').hide();
							});


							//Update
							$('#UpdateModel_<?= $fid ?>').click(function() {
								var el = this;
								var id = this.id;
								var splitid = id.split('_');
								//  id
								var deleteid = splitid[1];
								//alert(deleteid);
								//alert('<?= $facilityname ?>');
								var name = $('#name_<?= $fid ?>').val();

								var r = confirm('Are you sure you want to Update?');
								if (r == true) {
									$.ajax({
										url: '<?= URL ?>' + 'SetupCleaning/UpdateMaker',
										type: 'GET',
										data: {
											id: deleteid,
											name: name
										},
										success: function(response) {
											$('#messageres').show();
											//alert(response);
											$('#msg').html(response);
											$('#messageres').fadeIn();
											$('#messageres').fadeIn('slow');
											$('#messageres').fadeIn(3000);




										}
									});
								}

							});
						});
					</script>
				<?php }
				?>

			</tbody>
		</table>
	</div>
</div>

<script>
	$(document).ready(function() {
		$('.closemodal').click(function() {
			$('#ViewModal').hide();
			$('#addModal').hide();
			$("#responseAdd").hide();
			$("#cmodelname").val('');
		});
		$('.addModel').click(function() {
			$('#addModal').show();
			$("#responseAdd").hide();
			$("#cmodelname").val('');
			var el = this;
			var id = this.id;
			var splitid = id.split("_");

			// id
			var id = splitid[1];
			$('#cmodel').val(id);
			//alert(id);
		});
		$('.ViewModel').click(function() {
			//$('#ViewModal').show();
			var el = this;
			var id = this.id;
			var splitid = id.split("_");

			// id
			var id = splitid[1];
			$.ajax({
				url: "<?= URL ?>SetupCleaning/VehicleModel?id=" + id,
				type: 'GET',
				data: {
					id: id
				},
				success: function(response) {
					//alert(response);
					$("#loadGetInfo").html(response);
					$('#ViewModal').show();
				}
			});
		});

		$("#AddModel").submit(function() {
			$("#responseAdd").hide();
			$.ajax({
					type: "POST",
					url: "<?= URL ?>SetupCleaning/AddDuties",
					data: $(this).serialize()
				})
				.done(function(data) {
					$("#responseAdd").fadeOut(500).html(data).fadeIn(300);
				})
				.fail(function() {
					alert("Posting failed.");
				});
			return false;
		});
	});
</script>

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
					url: "<?= URL ?>SetupCleaning/DeleteteMaker",
					type: 'GET',
					data: {
						id: deleteid
					},
					success: function(response) {
						//alert(deleteid);
						///alert(response);
						///Removing row from HTML Table

						$(el).closest('tr').css('background', 'tomato');
						$(el).closest('tr').fadeOut(800, function() {
							$(this).remove();
						});
					}
				});
			}
		});
	});
</script>

<div class="modal " id="addModal">
	<form id="AddModel" method="post">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Add Duties/
						<span class="laotext">ເພີ່ມໜ້າວຽກ</span>
					</h4>
					<button type="button" class="close closemodal" data-dismiss="modal" aria-label="Close">
						<i class='fa fa-times-circle' style='color: red; font-size: 25px;'></i>
					</button>
				</div>
				<div class="modal-body">
					Duties/<span class="laotext">ໜ້າວຽກ</span>
					<input type="hidden" name="cmodel" id="cmodel">
					<input type="text" name="cmodelname" id="cmodelname" class="form-control" placeholder="Enter Duties">
					<div id="responseAdd"></div>
				</div>
				<div class="modal-footer ">
					<button type="button" class="btn btn-default closemodal" data-dismiss="modal">
						Close/<span class="laotext">ປິດ</span></button>
					<button type="submit" class="btn btn-primary">Save changes/
						<span class="laotext">ບັນທຶກ</span></button>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
	</form>
	<!-- /.modal-dialog -->
</div>
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
</style>
<div class="modal " id="ViewModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">View Duties/
					<span class="laotext">ເບິ່ງໜ້າວຽກ</span>
				</h4>
				<button type="button" class="close closemodal" data-dismiss="modal" aria-label="Close">
					<i class='fa fa-times-circle' style='color: red; font-size: 25px;'></i>
				</button>
			</div>
			<div class="modal-body scroll" style="height: 450px;	overflow-y: auto;">

				<div id="loadGetInfo"></div>
			</div>
			<div class="modal-footer ">
				<button type="button" class="btn btn-default closemodal" data-dismiss="modal">Close/
					<span class="laotext">ປິດ</span> </button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>



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