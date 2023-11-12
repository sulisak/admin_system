<script src="<?php echo URL; ?>public/js/bootbox.min.js"></script>


<link rel="stylesheet" href="<?php echo URL; ?>public/css1/bootstrap.css">
<link rel="stylesheet" href="<?php echo URL; ?>public/css1/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?php echo URL; ?>public/css1/buttons.bootstrap4.min.css">
<link rel="stylesheet" href="<?php echo URL; ?>public/css1/responsive.bootstrap4.min.css">



<div class="table-responsive ">

  <table class="table table-bordered table-hover table-striped" id="example" width="100%" height="500px" cellspacing="0">
    <thead>
      <tr>
        <th>No/<span class="laotext">ລຳດັບ</span></th>
        <th>Date/<span class="laotext">ວັນທີ</span></th>
        <th>Driver/<span class="laotext">ຄົນຂັບລົດ</span></th>
        <th>Vehicle/<span class="laotext">ຊື່ລົດ</span></th>

        <th>Cause_of_Accident/<span class="laotext">ສາເຫດອຸປະຕິເຫດ</span></th>


        <th>Action/<span class="laotext">ຈັດການ</span></th>
      </tr>
    </thead>
    <tbody>
      <?php
      $c = 0;
      foreach ($list1 as $app) {
        $c++;
        $id = isset($app->id) ? $app->id : 0;
        $driver = isset($app->driver) ? $app->driver : 0;
        $datetime = isset($app->datetime) ? $app->datetime : '';
        $cause = isset($app->cause) ? $app->cause : '';
        $remarks = isset($app->remarks) ? $app->remarks : '';
        $vyear = isset($app->vyear) ? $app->vyear : '';
        $color = isset($app->color) ? $app->color : '';
        $plate = isset($app->plate) ? $app->plate : '';
        $maker = isset($app->maker) ? $app->maker : '';
        $model = isset($app->model) ? $app->model : '';
        $vid = isset($app->vid) ? $app->vid : '';



        echo "<tr>";
        echo "<td>" . $c . "</td>";
        echo "<td><div style='width:150px'>" . $datetime . "</div></td>";
        echo "<td><div style='width:150px'>" . $driver . "</div></td>";
        echo "<td><div style='width:450px'>" . $maker . " " . $model . " " . $vyear . " #" . $plate . " " . $color . "</div></td>";
        echo "<td><div style='width:500px'>" . $cause . "</div></td>";
        echo '<td class="d-flex">
										<!--
									<a href="' . URL . 'Inspection/UpdateInspection?id=' . $id . '" class="btn btn-xs  bg-gradient-success btn-flat" onClick="return confirm(\'Are you sure you want to edit?\');">
											<i class="fas fa-edit"></i>
										</a>-->
										<a href="#" class="btn btn-xs btn-block bg-gradient-danger btn-flat deleteGroup" id="del_' . $id . '">
											<i class="fas fa-trash"></i>
										</a>
									 </td>';





        echo "</tr>";
      }
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
          url: <?php echo "'" . URL . "'" ?> + "AccidentReport/deleteAccident",
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