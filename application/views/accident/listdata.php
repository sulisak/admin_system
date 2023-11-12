<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Accident Report/<span class="laotext">ລາຍງານອຸປະຕິເຫດ</span></h1>
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

              <form method="post" action="<?= URL ?>AccidentReport/ListData" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-md-3">
                    <b>Start Date/<span class="laotext">ເລີ່ມວັນທີ</span> </b>
                    <input class="form-control" name="start" type="date" value="<?= $strt; ?>" required>
                  </div>
                  <div class="col-md-3">
                    <b>End Date/<span class="laotext">ວັນທີສິ້ນສຸດ</span> </b>

                    <input class="form-control" name="end" type="date" value="<?= $en; ?>" required>
                  </div>
                  <div class="col-md-3">
                    <br>
                    <button type="submit" class="btn btn-md btn-primary" id="submit">
                      Search record/<span class="laotext">ຄົ້ນຫາ</span></button>
                  </div>
                </div>
              </form>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <script src="<?= URL ?>public/js/bootbox.min.js"></script>
              <link rel="stylesheet" href="<?= URL ?>public/css1/bootstrap.css">
              <link rel="stylesheet" href="<?= URL ?>public/css1/dataTables.bootstrap4.min.css">
              <link rel="stylesheet" href="<?= URL ?>public/css1/buttons.bootstrap4.min.css">
              <link rel="stylesheet" href="<?= URL ?>public/css1/responsive.bootstrap4.min.css">

              <div class="table-responsive ">
                <table class="table table-bordered table-hover  table-striped" id="example" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No/<span class="laotext">ລຳດັບ</span></th>
                      <th>Date/<span class="laotext">ວັນທີ</span></th>
                      <th>Driver/<span class="laotext">ຄົນຂັບລົດ</span></th>
                      <th>Vehicle/<span class="laotext">ຊື່ລົດ</span> </th>
                      <th>Cause_of_Accident/<span class="laotext">ສາເຫດອຸປະຕິເຫດ</span> </th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $c = 0;
                    // print_r($list1);
                    foreach ($list1 as $app) {
                      $c++;

                      $id = isset($app->id) ?  $app->id : 0;
                      $driver = isset($app->driver) ?  $app->driver : '';
                      $datetime = isset($app->datetime) ?  $app->datetime : '';
                      $cause = isset($app->cause) ?  $app->cause : '';
                      $remarks = isset($app->remarks) ?  $app->remarks : '';
                      $vyear = isset($app->vyear) ?  $app->vyear : '';
                      $color = isset($app->color) ?  $app->color : '';
                      $plate = isset($app->plate) ?  $app->plate : '';
                      $maker = isset($app->maker) ?  $app->maker : '';
                      $model = isset($app->model) ?  $app->model : '';
                      $vid = isset($app->vid) ?  $app->vid : '';

                      echo "<tr>";
                      echo "<td>" . $c . "</td>";
                      echo "<td><div style='width:150px'>" . $datetime . "</div></td>";
                      echo "<td><div style='width:150px'>" . $driver . "</div></td>";
                      echo "<td><div style='width:450px'>" . $maker . " " . $model . " " . $vyear . " #" . $plate . " " . $color . "</div></td>";
                      echo "<td><div style='width:500px'>" . $cause . "</div></td>";
                      echo "</tr>";
                    }
                    ?>
                  </tbody>
                </table>
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
</body>

</html>