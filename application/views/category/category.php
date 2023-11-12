<script src="<?php echo URL; ?>public/js/bootbox.min.js"></script>


<link rel="stylesheet" href="<?php echo URL; ?>public/css1/bootstrap.css">
<link rel="stylesheet" href="<?php echo URL; ?>public/css1/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?php echo URL; ?>public/css1/buttons.bootstrap4.min.css">
<link rel="stylesheet" href="<?php echo URL; ?>public/css1/responsive.bootstrap4.min.css">
<style>
  tr td {
    padding: 0 0 0 10px !important;
    margin: 0 !important;
    vertical-align: middle !important;
  }
</style>

<!---->
<div class="alert alert-success alert-dismissible fade show" role="alert" style="display:none" id="messageres">
  <p><b>Message/<span class="laotext">ຂໍ້ຄວາມ </span>: </b> <span id="msg" class="laotext">You should check in on some of those fields below/ກວດເບິ່ງຫ້ອງໃສ່ຂໍ້ມູນທາງລຸ່ມ.</span></p>
  <button type="button" id="closebt" class="close">
    <i class='fa fa-times-circle' style='color: red; font-size: 25px;'></i>
  </button>

</div>
<div class="alert alert-danger alert-dismissible fade show" role="alert" style="display:none" id="messageres2">
  <p><b>Message/<span class="laotext">ຂໍ້ຄວາມ </span>: </b> <span class="laotext">Already Exist/ມີຂໍ້ມູນນີ້ແລ້ວ</span></p>
  <button type="button" id="closebt2" class="close">
    <i class='fa fa-times-circle' style='color: red; font-size: 25px;'></i>
  </button>
</div>
<!---->


<table class="table table-bordered table-hover table-responsive table-striped" id="example" width="100%" height="500px" cellspacing="0">
  <thead>
    <tr>
      <th width="5%">No/<span class="laotext">ລຳດັບ</span></th>

      <th width="70%">Category name/<span class="laotext">ຊື່ປະເພດສິນຄ້າ</span></th>


      <th width="25%">Action/<span class="laotext">ຈັດການ</span> </th>
    </tr>
  </thead>


  <tbody>
    <?php
    $c = 0;
    foreach ($listcategory as $app) {
      $c++;

      if (isset($app->catid)) {
        $id = $app->catid;
      } else {
        $id = "";
      }
      if (isset($app->categoryname)) {
        $categoryname = $app->categoryname;
      } else {
        $categoryname = "";
      }


      echo "<tr>";
      echo "<td>" . $c . "</td>";
      echo "<td><input type='text' id='categoryname_" . $id . "' value='" . $categoryname . "' class='form-control'></td>";

      echo '<td class="d-flex">

        <a href="#" class="btn btn-sm  bg-gradient-success btn-flat" onClick="edit(' . $id . ')">
        <i class="fas fa-edit"></i> EDIT
        </a>


						 </td>';

      echo "</tr>";
    ?>

      <script>
        $('#messageres').hide();
        $('#closebt').click(function() {
          $('#messageres').hide();
        });

        $('#closebt2').click(function() {
          $('#messageres2').hide();
        });

        //update
        function edit(id) {

          if (confirm('Are you sure to Update this category.?') == true) {

            var categoryname = $('#categoryname_<?= $id ?>').val();

            $.ajax({
              url: '<?= URL ?>Category/Updatecategory',
              type: 'GET',
              data: {
                id: id,
                categoryname: categoryname
              },
              success: function(response) {
                if (response == 'exit') {
                  $('#messageres').show();
                  $('#msg').html('Update Successfully!');
                  $('#messageres').fadeIn();
                  $('#messageres').fadeIn('slow');
                  $('#messageres').fadeIn(3000);
                } else if (response == 'Update Successfully!') {
                  $('#messageres').show();
                  $('#msg').html('Update Successfully!');
                  $('#messageres').fadeIn();
                  $('#messageres').fadeIn('slow');
                  $('#messageres').fadeIn(3000);
                } else {

                  $('#messageres2').show();
                  $('#messageres2').fadeIn();
                  $('#messageres2').fadeIn('slow');
                  $('#messageres2').fadeIn(3000);
                }
              }
            })
          }
        }
      </script>
    <?php }
    ?>
  </tbody>
</table>


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