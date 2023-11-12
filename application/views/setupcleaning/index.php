<script src="<?= URL; ?>public/js/jquery.js"></script>
<script type="text/javascript">
  $(document).ready(function() {

    getAjaxProject();

    function getAjaxProject() {
      $.ajax({ //create an ajax request to display.php
        type: "GET",
        url: "<?= URL ?>SetupCleaning/FacilityList",
        dataType: "html", //expect html to be returned
        success: function(response) {
          $("#response").html(response);
          //alert(response);
        }

      });
    };
    $("#addmaker").submit(function() {
      $.ajax({
          type: "POST",
          url: "<?= URL ?>SetupCleaning/AddFacilities",
          data: $(this).serialize()
        })
        .done(function(data) {
          $("#responseAdd").html(data);
          alert(data);
          getAjaxProject();
        })
        .fail(function() {
          alert("Posting failed.");
        });
      return false;
    });
  });
</script>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Setup Cleaning/
            <span class="laotext">ຕັ້ງຄ່າທຳຄວາມສະອາດ </span>
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
                <button class="btn btn-xs btn-block bg-gradient-primary btn-flat" data-toggle="modal" data-target="#modal-default">
                  <i class="fas fa-plus"></i> Add new/
                  <span class="laotext">ເພີ່ມໃໝ່</span>
                </button>
              </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div id="response"></div>
            </div>
          </div>
        </div>
      </div>
    </div><!--/. container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<div class="modal fade" id="modal-default">
  <form id="addmaker" method="post">
    <div class="modal-dialog ">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Add New Facility/
            <span class="laotext">ເພີ່ມສະຖານທີ່ໃໝ່</span>
          </h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <i class='fa fa-times-circle' style='color: red; font-size: 25px;'></i>
          </button>
        </div>
        <div class="modal-body">
          <b>Business Unit/
            <span class="laotext">ຫົວໜ່ວຍທຸລະກິດ </span></b>


          <div class="input-group mb-3">

            <select class="form-control" name="cid" required>
              <?php
              foreach ($listbusiness as $app) {
                if (isset($app->cid))  $cid = $app->cid;
                if (isset($app->cname))  $cname = $app->cname;
                echo '<option value="' . $cid . '">' . $cname . '</option>';
              }
              ?>

            </select>
            <div class="input-group-append">
              <span class="input-group-text"><i class="fas fa-building"></i></span>
            </div>
          </div>
          <b>Facility</b>
          <div class="input-group mb-3">

            <input type="text" class="form-control" name="maker" required>
            <div class="input-group-append">
              <span class="input-group-text"><i class="fas fa-building"></i></span>
            </div>
          </div>
        </div>
        <div class="modal-footer ">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close/
            <span class="laotext">ປິດ</span></button>
          <button type="submit" class="btn btn-primary">Save changes/
            <span class="laotext">ບັນທຶກ</span></button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </form>
</div>


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
<script src="<?= URL; ?>public/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?= URL; ?>public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= URL; ?>public/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= URL; ?>public/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="dist/js/demo.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="<?= URL; ?>public/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="<?= URL; ?>public/plugins/raphael/raphael.min.js"></script>
<script src="<?= URL; ?>public/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="<?= URL; ?>public/plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="<?= URL; ?>public/plugins/chart.js/Chart.min.js"></script>

<!-- PAGE SCRIPTS -->
<script src="<?= URL; ?>public/js/pages/dashboard2.js"></script>
</body>

</html>