<script src="<?= URL; ?>public/js/jquery.js"></script>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Stocks In and Out Report/
            <span class="laotext">ລາຍງານສາງເຂົ້າ-ອອກ</span>
          </h1>
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
              <h3 class="card-title">
                Stock List/<span class="laotext">ລາຍການສາງ
                </span>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <script src="<?= URL; ?>public/js/bootbox.min.js"></script>
              <script src="<?= URL; ?>public/js/jquery.js"> </script>

              <link rel="stylesheet" href="<?= URL; ?>public/css1/bootstrap.css">
              <link rel="stylesheet" href="<?= URL; ?>public/css1/dataTables.bootstrap4.min.css">
              <link rel="stylesheet" href="<?= URL; ?>public/css1/buttons.bootstrap4.min.css">
              <link rel="stylesheet" href="<?= URL; ?>public/css1/responsive.bootstrap4.min.css">
              <div class="table-responsive">
                <table class="table table-bordered  table-striped" id="example" width="100%" height="500px" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No/<span class="laotext">ລຳດັບ</span></th>
                      <th>Barcode/<span class="laotext">ບາໂຄດ</span></th>
                      <th>Product/<span class="laotext">ເຄື່ອງ</span></th>
                      <!-- <th >Date_In/Out/<span class="laotext">ວັນທີເຂົ້າ-ອອກ</span></th>  -->
                 <th width="250px">Total Qty/<span class="laotext">ຈຳນວນທີ່ມີທັງໝົດ</span></th>
                 <th width="250px">Cut Stock Qty/<span class="laotext">ຈຳນວນຕັດສະຕ໋ອກ</span></th>
                      <th>Unit_Price/<span class="laotext">ລາຄາ</span></th>
                      <th>Total_Amount/<span class="laotext">ລວມລາຄາ</span></th>

                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $c = 0;
                    $total = 0;
                    $totalcost1 = 0;
                    // print_r($list);
                    foreach ($list as $app) {
                      $c++;
                      $id = isset($app->id) ? $app->id : '';
                      $barcode = isset($app->barcode) ? $app->barcode : '';
                      $pname = isset($app->pname) ? $app->pname : '';
                      $uom = isset($app->uom) ? $app->uom : '';
                      $qty = isset($app->qty) ? $app->qty : '';
                      $unitprice = isset($app->unitprice) ? $app->unitprice : '';
                      $critical = isset($app->critical) ? $app->critical : '';
                      $category = isset($app->category) ? $app->category : '';
                      $catname = isset($app->catname) ? $app->catname : '';
                      $qty = isset($app->qty) ? $app->qty : '';
                      $addqty = isset($app->addqty) ? $app->addqty : '';
                      $datein = isset($app->datein) ? $app->datein : '';
                      $upPrice = isset($app->upPrice) ? $app->upPrice : '';
                      $totalcosting = isset($app->totalcosting) ? $app->totalcosting : '';
                      echo "<tr>";

                      echo "<td>" . $c . "</td>";

                      echo "<td>" . $barcode . "</td>";
                      echo "<td><div style='width:300px'>" . $pname . "</div></td>";
                      
                      echo "<td><div style='width:150px'>" . number_format($qty) . "</div></td>";
                      echo "<td><div style='width:150px'>" . number_format($addqty) . "</div></td>";
                      echo "<td><div style='width:150px'>" . number_format($upPrice) . "</div></td>";
                      echo "<td><div style='width:150px'>" . number_format($totalcosting) . "</div></td>";

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
</body>

</html>

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