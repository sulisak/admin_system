<script src="<?= URL ?>public/js/bootbox.min.js"></script>
<script src="<?= URL ?>public/js/jquery.js"> </script>

<link rel="stylesheet" href="<?= URL ?>public/css1/bootstrap.css">
<link rel="stylesheet" href="<?= URL ?>public/css1/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?= URL ?>public/css1/buttons.bootstrap4.min.css">
<link rel="stylesheet" href="<?= URL ?>public/css1/responsive.bootstrap4.min.css">

<div class="table-responsive">
  <table class="table table-bordered table-hover table-striped" id="example" width="100%" height="500px" cellspacing="0">
    <thead>
      <tr>
        <th>No/<span class='laotext'>ລຳດັບ</span></th>
        <th>Vehicle/<span class='laotext'>ລົດ</span></th>

        <th>Transmission/<span class='laotext'>ແບບການຂັບເຄື່ອນ</span></th>
        <th>Passenger/<span class='laotext'>ຈຳນວນຜູ້ໂດຍສານ</span></th>
        <th>Tank Capacity/<span class='laotext'>ຄວາມຈຸຖັງ</span></th>
        <th>Fuel type/<span class='laotext'>ປະເພດນ້ຳມັນ</span></th>
        <th>Start/<span class='laotext'>ເລີ່ມຕົ້ນ</span></th>
        <th>End/<span class='laotext'>ສິ້ນສຸດ </span></th>
        <th>Curr._Mileage/<span class='laotext'>ເລກໄມສະສົມປະຈຸບັນ</span></th>
        <th>Total_Fuel Cost/<span class='laotext'>ລາຄານ້ຳມັນລວມ</span></th>
        <th>Total_Liter/<span class='laotext'>ຈຳນວນລິດທັງໝົດ</span></th>
        <th>Total_Maintenance_Cost/<span class='laotext'>ລາຄາບຳລຸງຮັກສາທັງໝົດ</span></th>
      </tr>
    </thead>
    <tbody>
      <?php
      $c = 0;
      $start = date_create($start);
      $end = date_create($end);
      foreach ($list1 as $app) {
        $c++;

        $car = isset($app->car) ? $app->car : 0;
        $maxpassenger = isset($app->maxpassenger) ? $app->maxpassenger : '';
        $transmission = isset($app->transmission) ? $app->transmission : '';
        $tankcapacity = isset($app->tankcapacity) ? $app->tankcapacity : '';
        $fueltype = isset($app->fueltype) ? $app->fueltype : '';
        $mileage = isset($app->mileage) ? $app->mileage : '';
        $totalFuelCost = isset($app->totalFuelCost) ? $app->totalFuelCost : '';
        $totalLiter = isset($app->totalLiter) ? $app->totalLiter : '';
        $totalCost = isset($app->totalCost) ? $app->totalCost : ''; ?>

        <tr>
          <td><?= $c ?></td>
          <td>
            <div style='min-width:400px'><?= $car ?></div>
          </td>
          <td><?= strtoupper($transmission) ?></td>
          <td><?= number_format($maxpassenger) ?></td>
          <td><?= number_format($tankcapacity) ?></td>
          <td><?= strtoupper($fueltype) ?></td>
          <td>
            <div style='min-width:250px'><?= (date_format($start, "D jS \of M Y")) ?></div>
          </td>
          <td>
            <div style='min-width:250px'><?= (date_format($end, "D jS \of M Y")) ?></div>
          </td>
          <td><?= number_format($mileage) ?></td>
          <td><?= number_format((float)$totalFuelCost, 2, '.', '') ?></td>
          <td><?= number_format((float)$totalLiter, 2, '.', '') ?></td>
          <td><?= number_format((float)$totalCost, 2, '.', '') ?></td>
        </tr>
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
          url: "<?= URL ?>Fuel/deleteFuel",
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