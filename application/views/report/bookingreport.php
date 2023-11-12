
 <script src="<?php echo URL ;?>public/js/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function() {	 

	getAjaxProject() ;
	 function getAjaxProject() {
					$.ajax({    //create an ajax request to display.php
							type: "GET",
							url: <?php echo  "'".  URL  ."Report/CarAvailabilityList'";?>,             
							dataType: "html",   //expect html to be returned                
							success: function(response){                    
								$("#response").html(response); 
								//alert(response);
							}

						});
	};
	

	
});

</script>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Booking Room Request/
			<span class="laotext">ບັນທຶກຈອງຫ້ອງປະຊຸມ</span></h1>
          </div><!-- /.col -->
          <!--  <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v2</li>
            </ol>
          </div>/.col -->
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
				Meeting Room Request List/<span class="laotext">ລາຍການຮ້ອງຂໍຈອງຫ້ອງປະຊຖມ</span>
              </div>
			 
              <!-- /.card-header -->
					<div class="card-body">
							<form method="post" action="<?php echo URL ;?>Report/BookingRoomReport" enctype="multipart/form-data">								
								<div class="row">
									<div class="col-md-3">		
										<b>Start Date/<span class="laotext">ວັນທີເລີ່ມຕົ້ນ</span>	</b>		
											<input class="form-control" name="start" type="date"  value="<?php echo $start;?>" required>								
									</div>	
									<div class="col-md-3">		
										<b>End Date/<span class="laotext">ວັນສິ້ນສຸດ</span>	</b>										
										
											<input class="form-control" name="end" type="date" value="<?php echo $end;?>"  required>								
									</div>	
									<div class="col-md-3">
									<br>
										<button type="submit" class="btn btn-md btn-primary" id="submit" >Search record/ຄົ້ນຫາຂໍ້ມູນ</button>
									</div>	
									
														
								</div>
								
									
								
							 </form>
							<hr>
<script src="<?php echo URL ;?>public/js/bootbox.min.js"></script>
<script src="<?php echo URL ;?>public/js/jquery.js">	</script>

<link rel="stylesheet" href="<?php echo URL ;?>public/css1/bootstrap.css">
<link rel="stylesheet" href="<?php echo URL ;?>public/css1/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?php echo URL ;?>public/css1/buttons.bootstrap4.min.css">
<link rel="stylesheet" href="<?php echo URL ;?>public/css1/responsive.bootstrap4.min.css">



<div class="table-responsive">


 

               <table class="table table-bordered table-responsivetable-hover  table-striped" id="example" width="100%"  height="500px" cellspacing="0">
                 <thead>
                  <tr>
                    <th>No/<span class="laotext">ລຳດັບ</span></th>
                    <th>Room/<span class="laotext">ຫ້ອງ</span></th>
                    <th>Requestor/<span class="laotext">ຜູ້ຮ້ອງຂໍ</span></th>                    
                    <th>Start/<span class="laotext">ເລີ່ມຕົ້ນ</span></th> 
                    <th>End/<span class="laotext">ສິ້ນສຸດ</span></th> 
                    <th>Purposed/<span class="laotext">ຈຸດປະສົງ</span></th> 
                    <th>Participant/<span class="laotext">ຜູ້ເຂົ້າຮ່ວມ</span></th> 
                    <th>Remark/<span class="laotext">ໝາຍເຫດ</span></th> 
                    <th>Status/<span class="laotext">ສະຖານະ</span></th> 
                   
					                            
                  </tr>
                  </thead>
                  <tbody>
				  <?php 
				  $c=0;
				 // print_r($list );
				  foreach ($list as $app) { 
				  $c++;
				  if (isset($app->rbid)){  $id= $app->rbid;}else{$id="";}	
				  if (isset($app->purposed)) { $purposed= $app->purposed;	}else{$purposed="";}
					if (isset($app->participant)){  $participant= $app->participant;	}else{$participant="";}
					if (isset($app->startdate)){  $startdate= $app->startdate;	}else{$startdate="";}
					if (isset($app->enddate)){  $enddate= $app->enddate;}else{$enddate="";}	
					if (isset($app->remarks)){  $remarks= $app->remarks;	}else{$remarks="";}
					if (isset($app->roomName)) { $roomName= $app->roomName;	}else{$roomName="";}
					if (isset($app->requestor)){  $requestor= $app->requestor;	}else{$requestor="";}
					if (isset($app->creator)) { $creator= $app->creator;	}else{$creator="";}
					if (isset($app->status)) { $status= $app->status;	}else{$status="";}
					
					
					echo "<tr>";
					echo "<td>".$c."</td>";
					echo "<td><div style='min-width:400px'>".strtoupper($roomName)."</div></td>";
					echo "<td><div style='min-width:200px'>".strtoupper($requestor)."</div></td>";
					echo "<td><div style='min-width:200px'>".($startdate)."</div></td>";
					echo "<td><div style='min-width:200px'>".($enddate)."</div></td>";
					echo "<td>".strtoupper($purposed)."</td>";
					echo "<td>".number_format($participant)."</td>";
					echo "<td>".($remarks)."</td>";
					echo "<td>
					<div style='min-width:200px'>
					<Span class='cc'>".($status)."</span></div>
					
					</td>";
					
					
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
<script src="<?php echo URL ;?>public/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?php echo URL ;?>public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo URL ;?>public/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo URL ;?>public/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="dist/js/demo.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="<?php echo URL ;?>public/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="<?php echo URL ;?>public/plugins/raphael/raphael.min.js"></script>
<script src="<?php echo URL ;?>public/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="<?php echo URL ;?>public/plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo URL ;?>public/plugins/chart.js/Chart.min.js"></script>

<!-- PAGE SCRIPTS -->
<script src="<?php echo URL ;?>public/js/pages/dashboard2.js"></script>
</body>
</html>

			  
		  
						  
		  
			  
			  
			  
			  
			  

  
       <script src="<?php echo URL ;?>public/js1/jquery-3.3.1.js"></script>
    <script src="<?php echo URL ;?>public/js1/jquery.dataTables.min.js"></script>
    <script src="<?php echo URL ;?>public/js1/dataTables.bootstrap4.min.js"></script>
    <script src="<?php echo URL ;?>public/js1/dataTables.buttons.min.js"></script>
    <script src="<?php echo URL ;?>public/js1/buttons.bootstrap4.min.js"></script>
    <script src="<?php echo URL ;?>public/js1/jszip.min.js"></script>
    <script src="<?php echo URL ;?>public/js1/pdfmake.min.js"></script>
    <script src="<?php echo URL ;?>public/js1/vfs_fonts.js"></script>
    <script src="<?php echo URL ;?>public/js1/buttons.html5.min.js"></script>
    <script src="<?php echo URL ;?>public/js1/buttons.print.min.js"></script>
    <script src="<?php echo URL ;?>public/js1/buttons.colVis.min.js"></script>

    <script>
	$(document).ready(function() {
	    var table = $('#example').DataTable( {
	        lengthChange: true,
	       // buttons: [ 'copy', 'excel', 'csv' ],
		    buttons: [
            {
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
        ]
			 ,
			paging:         true,	
	    } );
	 
	    table.buttons().container()
	        .appendTo( '#example_wrapper .col-md-6:eq(0)' );
	} );
     </script>
  