<script src="<?= URL ?>public/js/jquery.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $("#icons").show();
    $(".close1").click(function() {
      //alert("Dsdas");
      $("#icons").hide();
    });


    getAjaxProject();

    function getAjaxProject() {
      $.ajax({ //create an ajax request to display.php
        type: "GET",
        url: "<?= URL ?>Request/UserList",
        dataType: "html", //expect html to be returned
        success: function(response) {
          $("#response").html(response);
          //alert(response);
        }

      });
    };
    $("#maker").change(function() {
      var maker = $("#maker").val();
      ///alert(maker);
      $.ajax({ //create an ajax request to display.php
        type: "GET",
        url: "<?= URL ?>Dashboard/modelList" + "?id=" + maker,
        dataType: "html", //expect html to be returned
        success: function(response) {
          $("#model").html(response);
          //alert(response);
        }

      });
      return false;

    });

    $("#addCar").submit(function() {
      $.ajax({
          type: "POST",
          url: "<?= URL ?>Dashboard/AddVehicle",
          data: $(this).serialize()
        })
        .done(function(data) {
          $('#addres').fadeOut(500).html(data).fadeIn(300);
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
          <h1 class="m-0 text-dark">Vehicle Management/
            <span class="laotext">ຄຸ້ມຄອງຈັດການພະຫະນະ</span>
          </h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item "><a href="<?=URL ?>Request">
                Vehicle Management/
                <span class="laotext">ຄຸ້ມຄອງຈັດການພະຫະນະ</span></a></li>
            <li class="breadcrumb-item active ">Request Vehicle/
              <span class="laotext">ຮ້ອງຂໍເບີກລົດ</span>
            </li>
          </ol>
        </div><!--/.col -->
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
                User List/
                <span class="laotext">ລານການຜູ້ໃຊ້</span>
                <?php //echo $expi =date("Y-m-d H:i:s");
                ?>
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

<div class="modal " id="icons">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">INDICATORS/
          <span class="laotext">ສັນຍາລັກ</span>
        </h4>
        <button type="button" class="close close1 ">
          <i class='fa fa-times-circle' style='color: red; font-size: 25px;'></i>
        </button>
      </div>
      <div class="modal-body">
        <center>
          <img src="<?= URL ?>public/img/icons.jpg" width="450px">
        </center>
      </div>
      <div class="modal-footer ">
        <button type="button" class="btn btn-default close1">Close/
          <span class="laotext">ປິດ</span></button>
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