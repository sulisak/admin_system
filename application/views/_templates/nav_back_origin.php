<style>
*{
    font-size: 13px;
}
    .sidebar-mini .nav-sidebar, .sidebar-mini .nav-sidebar > .nav-header, .sidebar-mini .nav-sidebar .nav-link {
    
    font-size: 13px;
    }
    
.user-panel .image {
    display: inline-block ! important;
    padding-left: 30px  ! important;
}
</style>
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white ">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="" class="nav-link">
		<?php date_default_timezone_set("Asia/Bangkok");
						echo   date('l jS \of F Y ');
			?>
		</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="" class="nav-link"><div id="MyClockDisplay" class="clock" onload="showTime()"></div></a>
      </li>
   
    </ul>
</nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary " style=" background-color: #333092;">
   
    <a href="#" class="brand-link" style="border-bottom: 0px ;background-color: #333092;border-bottom: 1px solid #4f5962;">
     <!--  <img src="<?php echo URL ;?>public/img/AIFLogo.png" alt="AIF Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">-->
      <span class="brand-text font-weight-light">AIF GROUP ADMIN SYS. V2</span>
      

    </a>
   <!--  Sidebar -->
    <div class="sidebar" >
        
        <div class="user-panel mt-3 pb-3 pl-1 mb-3 d-flex" style="margin-left: -30px ! important;">
        <div class="image">
          <img src="<?php echo URL ;?>public/img/profile/<?php echo $_SESSION['SESS_MEMBER_pic'];?>"   class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
           <a href="#" class="d-block"><?php echo $_SESSION['SESS_MEMBER_Fname'];?></a>
			<a href="#" class="d-block" style="font-size:12px"><?php echo $_SESSION['SESS_MEMBER_company'];?></a>
			<a href="#" class="d-block" style="font-size:12px"><?php echo $_SESSION['SESS_MEMBER_department'];?></a>
        </div>
      </div>
        
        
        
  

      <!-- Sidebar Menu -->
      <nav class="mt-2 mb-3">
	     <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
			
			<li class="nav-header">DASHBOARD PANEL </li>
			
            <?php 
            if(	$_SESSION['SESS_MEMBER_POS'] =="Administration"){
				
            ?>
			<li class="nav-item has-treeview">
            <a href="<?php echo URL ;?>Dashboard/Details" 
                                    <?php 
										$actual_link = "$_SERVER[REQUEST_URI]";
										IF($actual_link=="/<?php echo URL ;?>/Dashboard/Details"){
											echo " class='nav-link active'";
										}else{
											echo " class='nav-link'";
										}
										?> 
            >
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p> Dashboard </p>
            </a>
            </li>
			<li 
								<?php 
										$actual_link = "$_SERVER[REQUEST_URI]";
										  
                                          $pos = strrpos($actual_link,'id') - 1;
                                          $actual_linkgetID = substr($actual_link, 0, $pos);
                                               
										IF($actual_link=="/<?php echo URL ;?>/Document/In"
										|| $actual_link=="/<?php echo URL ;?>/Document/Out"
										|| $actual_link=="/<?php echo URL ;?>/Stationary"
										|| $actual_link=="/<?php echo URL ;?>/Stocks"
										|| $actual_link=="/<?php echo URL ;?>/Checklist"
										|| $actual_link=="/<?php echo URL ;?>/BookRoom"
										
										|| $actual_link=="/<?php echo URL ;?>/Fuel"
										|| $actual_link=="/<?php echo URL ;?>/Inspection"
										|| $actual_link=="/<?php echo URL ;?>/Maintainance"
										|| $actual_link=="/<?php echo URL ;?>/Request"
										|| $actual_link=="/<?php echo URL ;?>/SetupVehicle"
										|| $actual_link=="/<?php echo URL ;?>/Request/ApproveRequest"
										|| $actual_link=="/<?php echo URL ;?>/Request/ReturnVehicle"
										|| $actual_link=="/<?php echo URL ;?>/Request/History"
										|| $actual_link=="/<?php echo URL ;?>/Dashboard/Vehicle"
										|| $actual_linkgetID=="/<?php echo URL ;?>/Maintainance/LoadPicture"
										|| $actual_linkgetID=="/<?php echo URL ;?>/Stocks/loadPicture"
										
										){
											echo " class='nav-item has-treeview menu-open'";
										}else{
											echo " class='nav-item has-treeview'";
										}
										?> >
            <a href="#"
						
								<?php 
										$actual_link = "$_SERVER[REQUEST_URI]";
										  $pos = strrpos($actual_link,'id') - 1;
                                          $actual_linkgetID = substr($actual_link, 0, $pos);
										IF($actual_link=="/<?php echo URL ;?>/Document/In"
										|| $actual_link=="/<?php echo URL ;?>/Document/Out"
										|| $actual_link=="/<?php echo URL ;?>/Stationary"
										|| $actual_link=="/<?php echo URL ;?>/Stocks"
										|| $actual_link=="/<?php echo URL ;?>/Checklist"
										|| $actual_link=="/<?php echo URL ;?>/BookRoom"
										
										|| $actual_link=="/<?php echo URL ;?>/Fuel"
										|| $actual_link=="/<?php echo URL ;?>/Inspection"
										|| $actual_link=="/<?php echo URL ;?>/Maintainance"
										|| $actual_link=="/<?php echo URL ;?>/Request"
										|| $actual_link=="/<?php echo URL ;?>/SetupVehicle"
										|| $actual_link=="/<?php echo URL ;?>/Request/ApproveRequest"
										|| $actual_link=="/<?php echo URL ;?>/Request/ReturnVehicle"
										|| $actual_link=="/<?php echo URL ;?>/Request/History"
										|| $actual_link=="/<?php echo URL ;?>/Dashboard/Vehicle"
										|| $actual_linkgetID=="/<?php echo URL ;?>/Maintainance/LoadPicture"
											|| $actual_linkgetID=="/<?php echo URL ;?>/Stocks/loadPicture"
										){
												echo " class='nav-link active'";
										}else{
												echo " class='nav-link '";
										}
										?> >
			
				
              <i class="nav-icon fas fa-circle"></i>
              <p >
              Routine Work
               
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" >
             <li 
							<?php 
										$actual_link = "$_SERVER[REQUEST_URI]";
										   $pos = strrpos($actual_link,'id') - 1;
                                          $actual_linkgetID = substr($actual_link, 0, $pos);
										IF( $actual_link=="/<?php echo URL ;?>/Fuel"
										|| $actual_link=="/<?php echo URL ;?>/Inspection"
										|| $actual_link=="/<?php echo URL ;?>/Maintainance"
										|| $actual_link=="/<?php echo URL ;?>/Request"
										|| $actual_link=="/<?php echo URL ;?>/SetupVehicle"
										|| $actual_link=="/<?php echo URL ;?>/Request/ApproveRequest"
										|| $actual_link=="/<?php echo URL ;?>/Request/ReturnVehicle"
										|| $actual_link=="/<?php echo URL ;?>/Request/History"
										|| $actual_link=="/<?php echo URL ;?>/Dashboard/Vehicle"
										|| $actual_linkgetID=="/<?php echo URL ;?>/Maintainance/LoadPicture"
										
										){
											echo " class='nav-item has-treeview menu-open'";
										}else{
											echo " class='nav-item has-treeview'";
										}
										?> >
				<a  href=""
								<?php 
										$actual_link = "$_SERVER[REQUEST_URI]";
										   $pos = strrpos($actual_link,'id') - 1;
                                          $actual_linkgetID = substr($actual_link, 0, $pos);
										IF( $actual_link=="/<?php echo URL ;?>/Fuel"
										|| $actual_link=="/<?php echo URL ;?>/Inspection"
										|| $actual_link=="/<?php echo URL ;?>/Maintainance"
										|| $actual_link=="/<?php echo URL ;?>/Request"
										|| $actual_link=="/<?php echo URL ;?>/SetupVehicle"
										|| $actual_link=="/<?php echo URL ;?>/Request/ApproveRequest"
										|| $actual_link=="/<?php echo URL ;?>/Request/ReturnVehicle"
										|| $actual_link=="/<?php echo URL ;?>/Request/History"
										|| $actual_link=="/<?php echo URL ;?>/Dashboard/Vehicle"
										|| $actual_linkgetID=="/<?php echo URL ;?>/Maintainance/LoadPicture"
										
										){
											echo " class='nav-link nav-link active'";
										}else{
											echo " class='nav-link nav-link '";
										}
										?> >
				  <i class="nav-icon fas fa-car"></i>
				  <p>
					Vehicle Management
					<i class="right fas fa-angle-left"></i>
				  </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo URL ;?>Request"
                                       <?php 
										$actual_link = "$_SERVER[REQUEST_URI]";
										IF($actual_link=="/<?php echo URL ;?>/Request"){
											echo " class='nav-link active'";
										}else{
											echo " class='nav-link'";
										}
										?> 
                
                >
                  <i class="fas fa-folder-plus nav-icon"></i>
                  <p>Request Vehicle</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo URL ;?>Request/ApproveRequest"
                                     <?php 
										$actual_link = "$_SERVER[REQUEST_URI]";
										IF($actual_link=="/<?php echo URL ;?>/Request/ApproveRequest"){
											echo " class='nav-link active'";
										}else{
											echo " class='nav-link'";
										}
										?>>
                  <i class="fas fa-check-double nav-icon"></i>
                  <p>Approve Request</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo URL ;?>Request/ReturnVehicle" 
                  <?php 
										$actual_link = "$_SERVER[REQUEST_URI]";
										IF($actual_link=="/<?php echo URL ;?>/Request/ReturnVehicle"){
											echo " class='nav-link active'";
										}else{
											echo " class='nav-link'";
										}
										?>>
                  <i class="fas fa-undo-alt nav-icon"></i>
                  <p>Return Vehicle</p>
                </a>
              </li>
              
              
               <li class="nav-item">
                <a href="<?php echo URL ;?>Request/History" 
                <?php 
										$actual_link = "$_SERVER[REQUEST_URI]";
										IF($actual_link=="/<?php echo URL ;?>/Request/History"){
											echo " class='nav-link active'";
										}else{
											echo " class='nav-link'";
										}
										?>>
                  <i class="fas fa-history nav-icon"></i>
                  <p>Request History</p>
                </a>
              </li>
			   <li class="nav-item">
                <a href="<?php echo URL ;?>SetupVehicle" 
                                      <?php 
										$actual_link = "$_SERVER[REQUEST_URI]";
										IF($actual_link=="/<?php echo URL ;?>/SetupVehicle"){
											echo " class='nav-link active'";
										}else{
											echo " class='nav-link'";
										}
										?>  >
                  <i class="fas fa-tools nav-icon"></i>
                  <p>Vehicle Maker</p>
                </a>
              </li>
			   <li class="nav-item">
                <a href="<?php echo URL ;?>Dashboard/Vehicle" 
                 <?php 
										$actual_link = "$_SERVER[REQUEST_URI]";
										IF($actual_link=="/<?php echo URL ;?>/Dashboard/Vehicle"){
											echo " class='nav-link active'";
										}else{
											echo " class='nav-link'";
										}
										?> >
                  <i class="fas fa-car nav-icon"></i>
                  <p>Vehicle List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo URL ;?>Maintainance" 
                 <?php 
										$actual_link = "$_SERVER[REQUEST_URI]";
										 $pos = strrpos($actual_link,'id') - 1;
                                          $actual_linkgetID = substr($actual_link, 0, $pos);
										IF($actual_link=="/<?php echo URL ;?>/Maintainance"
											|| $actual_linkgetID=="/<?php echo URL ;?>/Maintainance/LoadPicture"
										){
											echo " class='nav-link active'";
										}else{
											echo " class='nav-link'";
										}
										?>
                >
                  <i class="fas fa-cogs nav-icon"></i>
                  <p>Vehicle Maintenance</p>
                </a>
              </li>
			  <li class="nav-item">
                <a href="<?php echo URL ;?>Inspection" 
                <?php 
										$actual_link = "$_SERVER[REQUEST_URI]";
										IF($actual_link=="/<?php echo URL ;?>/Inspection"){
											echo " class='nav-link active'";
										}else{
											echo " class='nav-link'";
										}
										?>
                
                >
                  <i class="fas fa-eye nav-icon"></i>
                  <p>Vehicle Inspection</p>
                </a>
              </li>
              
            
              <li class="nav-item">
                <a href="<?php echo URL ;?>Fuel"  <?php 
										$actual_link = "$_SERVER[REQUEST_URI]";
										IF($actual_link=="/<?php echo URL ;?>/Fuel"){
											echo " class='nav-link active'";
										}else{
											echo " class='nav-link'";
										}
										?> >
                  <i class="fas fa-gas-pump nav-icon"></i>
                  <p>Vehicle Fuel</p>
                </a>
              </li>
			  
			  
              </li>
			  
			  
            </ul>
          </li>
		  <li class="nav-item has-treeview">
				   <a href="<?php echo URL ;?>BookRoom"
				   <?php 
										$actual_link = "$_SERVER[REQUEST_URI]";
										IF($actual_link=="/<?php echo URL ;?>/BookRoom"){
											echo " class='nav-link active'";
										}else{
											echo " class='nav-link'";
										}
										?>
				   >
				  <i class="nav-icon fas fa-address-book"></i>
				  <p>Book Meeting Room</p>
				</a>
		   </li>
		  <li
							<?php 
										$actual_link = "$_SERVER[REQUEST_URI]";
										   $pos = strrpos($actual_link,'id') - 1;
                                          $actual_linkgetID = substr($actual_link, 0, $pos);
										IF($actual_link=="/<?php echo URL ;?>/Stationary"
										|| $actual_link=="/<?php echo URL ;?>/Stocks"
											|| $actual_linkgetID=="/<?php echo URL ;?>/Stocks/loadPicture"
										){
											echo " class='nav-item has-treeview menu-open'";
										}else{
											echo " class='nav-item has-treeview '";
										}
										?> >
		    
            <a href="#"
									<?php 
										$actual_link = "$_SERVER[REQUEST_URI]";
										   $pos = strrpos($actual_link,'id') - 1;
                                          $actual_linkgetID = substr($actual_link, 0, $pos);
										IF($actual_link=="/<?php echo URL ;?>/Stationary"
										|| $actual_link=="/<?php echo URL ;?>/Stocks"
											|| $actual_linkgetID=="/<?php echo URL ;?>/Stocks/loadPicture"
										){
											echo " class='nav-link active'";
										}else{
											echo " class='nav-link '";
										}
										?> >
              <i class="nav-icon fas fa-building"></i>
              <p>
                Stationary Mngt.
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo URL ;?>Stationary" <?php 
										$actual_link = "$_SERVER[REQUEST_URI]";
										IF($actual_link=="/<?php echo URL ;?>/Stationary"
										
										
										){
											echo " class='nav-link active'";
										}else{
											echo " class='nav-link'";
										}
										?> >
                  <i class="far fa-circle nav-icon"></i>
					<p>Stationary</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo URL ;?>Stocks" <?php 
										$actual_link = "$_SERVER[REQUEST_URI]";
										   $pos = strrpos($actual_link,'id') - 1;
                                          $actual_linkgetID = substr($actual_link, 0, $pos);
										IF($actual_link=="/<?php echo URL ;?>/Stocks"
											|| $actual_linkgetID=="/<?php echo URL ;?>/Stocks/loadPicture"
										
										){
											echo " class='nav-link active'";
										}else{
											echo " class='nav-link'";
										}
										?> >
                 <i class="fas fa-barcode nav-icon"></i>
					<p>Stocks</p>
                </a>
              </li>
            
            </ul>
			</li>
			<?php
			}
			?>
			<li
								<?php 
										$actual_link = "$_SERVER[REQUEST_URI]";
										IF($actual_link=="/<?php echo URL ;?>/Document/In"
										|| $actual_link=="/<?php echo URL ;?>/Document/Out"
										){
											echo " class='nav-item has-treeview menu-open'";
										}else{
											echo " class='nav-item has-treeview'";
										}
										?> >
			
			
            <a href="#" 
							<?php 
										$actual_link = "$_SERVER[REQUEST_URI]";
										IF($actual_link=="/<?php echo URL ;?>/Document/In"
										|| $actual_link=="/<?php echo URL ;?>/Document/Out"
										){
											echo " class='nav-link active'";
										}else{
											echo " class='nav-link '";
										}
										?> >
			
              <i class="nav-icon fas fa-file-alt"></i>
              <p>
                 Document 
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo URL ;?>Document/In" <?php 
										$actual_link = "$_SERVER[REQUEST_URI]";
										IF($actual_link=="/<?php echo URL ;?>/Document/In"){
											echo " class='nav-link active'";
										}else{
											echo " class='nav-link'";
										}
										?> >
                  <i class="fas fa-arrow-left nav-icon"></i>
					<p>Document In</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo URL ;?>Document/Out" <?php 
										$actual_link = "$_SERVER[REQUEST_URI]";
										IF($actual_link=="/<?php echo URL ;?>/Document/Out"){
											echo " class='nav-link active'";
										}else{
											echo " class='nav-link'";
										}
										?> >
                  <i class="fas fa-arrow-right nav-icon"></i>
					<p>Document Out</p>
                </a>
              </li>
            
            </ul>
			</li>
			
			<?php 
            if(	$_SESSION['SESS_MEMBER_POS'] =="Administration"){
			?>
			<li class="nav-item has-treeview">
            <a href="<?php echo URL ;?>Checklist" <?php 
										$actual_link = "$_SERVER[REQUEST_URI]";
										IF($actual_link=="/<?php echo URL ;?>/Checklist"){
											echo " class='nav-link active'";
										}else{
											echo " class='nav-link'";
										}
										?> >
              <i class="nav-icon fas fa-broom"></i>
              <p>
                Cleaning Checklist
               
              </p>
            </a>
           
			</li>
			
			
			
		</ul>
		</li>
		<li class="nav-item has-treeview">
            <a href="<?php echo URL ;?>AccidentReport" <?php 
										$actual_link = "$_SERVER[REQUEST_URI]";
										IF($actual_link=="/<?php echo URL ;?>/AccidentReport"){
											echo " class='nav-link active'";
										}else{
											echo " class='nav-link'";
										}
										?> >
              <i class="nav-icon fas fa-car-crash"></i>
              <p>
               Accident Report
               
              </p>
            </a>
            
			</li>
			
			
		
			
			
			<li class="nav-item has-treeview">
            <a href="<?php echo URL ;?>Category" <?php 
										$actual_link = "$_SERVER[REQUEST_URI]";
										IF($actual_link=="/<?php echo URL ;?>/Category"){
											echo " class='nav-link active'";
										}else{
											echo " class='nav-link'";
										}
										?> >
              <i class="nav-icon fas fa-tasks"></i>
              <p>
               Category
               
              </p>
            </a>
            
			</li>
			
			
		  <li class="nav-header">REPORTS</li>
		  <li 
							<?php 
										$actual_link = "$_SERVER[REQUEST_URI]";
										IF($actual_link=="/<?php echo URL ;?>/Report/RequestVehicleReport"
										|| $actual_link=="/<?php echo URL ;?>/Dashboard/ReportVehicle"
										|| $actual_link=="/<?php echo URL ;?>/Report/VehicleMileage"
										|| $actual_link=="/<?php echo URL ;?>/Report/CarAvailability"
										|| $actual_link=="/<?php echo URL ;?>/Report/VehicleCost"
										|| $actual_link=="/<?php echo URL ;?>/Report/FuelReport"
										|| $actual_link=="/<?php echo URL ;?>/AccidentReport/ListData"
										|| $actual_link=="/<?php echo URL ;?>/Report/VehicleHistory"
										){
											echo " class='nav-item has-treeview menu-open'";
										}else{
											echo " class='nav-item has-treeview'";
										}
										?> >
            <a href="#" 
								<?php 
										$actual_link = "$_SERVER[REQUEST_URI]";
										IF($actual_link=="/<?php echo URL ;?>/Report/RequestVehicleReport"
										|| $actual_link=="/<?php echo URL ;?>/Dashboard/ReportVehicle"
										|| $actual_link=="/<?php echo URL ;?>/Report/VehicleMileage"
										|| $actual_link=="/<?php echo URL ;?>/Report/CarAvailability"
										|| $actual_link=="/<?php echo URL ;?>/Report/VehicleCost"
										|| $actual_link=="/<?php echo URL ;?>/Report/FuelReport"
										|| $actual_link=="/<?php echo URL ;?>/AccidentReport/ListData"
										|| $actual_link=="/<?php echo URL ;?>/Report/VehicleHistory"
										){
											echo " class='nav-link active'";
										}else{
											echo " class='nav-link'";
										}
										?> >
			
			
              <i class="nav-icon fas fa-file-alt"></i>
              <p>
				Vehicle Reports 
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
                
                 <li class="nav-item">
                 <a href="<?php echo URL ;?>Report/VehicleHistory" 
                 <?php 
										$actual_link = "$_SERVER[REQUEST_URI]";
										IF($actual_link=="/<?php echo URL ;?>/Report/VehicleHistory"){
											echo " class='nav-link active'";
										}else{
											echo " class='nav-link'";
										}
										?> >
                 
                  <i class="fas  fa-history nav-icon"></i>
                  <p> Vehicle History</p>
                </a>
              </li>

              <li class="nav-item">
                 <a href="<?php echo URL ;?>Report/RequestVehicleReport" 
                 <?php 
										$actual_link = "$_SERVER[REQUEST_URI]";
										IF($actual_link=="/<?php echo URL ;?>/Report/RequestVehicleReport"){
											echo " class='nav-link active'";
										}else{
											echo " class='nav-link'";
										}
										?> >
                 
                  <i class="fas  fa-folder-plus nav-icon"></i>
                  <p> Vehicle Request</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo URL ;?>Dashboard/ReportVehicle"  
                <?php 
										$actual_link = "$_SERVER[REQUEST_URI]";
										IF($actual_link=="/<?php echo URL ;?>/Dashboard/ReportVehicle"){
											echo " class='nav-link active'";
										}else{
											echo " class='nav-link'";
										}
										?> >
                  <i class="fas fa-car nav-icon"></i>
                  <p>Vehicle List & Insurance</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo URL ;?>Report/VehicleMileage" <?php 
										$actual_link = "$_SERVER[REQUEST_URI]";
										IF($actual_link=="/<?php echo URL ;?>/Report/VehicleMileage"){
											echo " class='nav-link active'";
										}else{
											echo " class='nav-link'";
										}
										?> >
                  <i class="fas fa-car nav-icon"></i>
                  <p>Vehicle Mileage</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo URL ;?>Report/CarAvailability" 
                                     <?php 
										$actual_link = "$_SERVER[REQUEST_URI]";
										IF($actual_link=="/<?php echo URL ;?>/Report/CarAvailability"){
											echo " class='nav-link active'";
										}else{
											echo " class='nav-link'";
										}
										?> >
                    
                  <i class="fas fa-eye nav-icon"></i>
                  <p>Vehicle Availability</p>
                </a>
              </li>
            
              <li class="nav-item">
                <a href="<?php echo URL ;?>Report/VehicleCost" 
                                  <?php 
										$actual_link = "$_SERVER[REQUEST_URI]";
										IF($actual_link=="/<?php echo URL ;?>/Report/VehicleCost"){
											echo " class='nav-link active'";
										}else{
											echo " class='nav-link'";
										}
										?> >
                  <i class="fas fa-money-bill nav-icon"></i>
                  <p>Vehicle  Cost</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo URL ;?>Report/FuelReport" 
                                <?php 
										$actual_link = "$_SERVER[REQUEST_URI]";
										IF($actual_link=="/<?php echo URL ;?>/Report/FuelReport"){
											echo " class='nav-link active'";
										}else{
											echo " class='nav-link'";
										}
										?> >
                    
                  <i class="fas fa-gas-pump nav-icon"></i>
                  <p>Vehicle  Fuel</p>
                </a>
              </li>
              <li class="nav-item has-treeview">
                    <a href="<?php echo URL ;?>AccidentReport/ListData" 
                                    <?php 
										$actual_link = "$_SERVER[REQUEST_URI]";
										IF($actual_link=="/<?php echo URL ;?>/AccidentReport/ListData"){
											echo " class='nav-link active'";
										}else{
											echo " class='nav-link'";
										}
										?> >
                      <i class="nav-icon fas fa-car-crash"></i>
                      <p>
                       Accident Report
                       
                      </p>
                    </a>
                    
        	</li>
            
            </ul>
			</li>
			<li class="nav-item has-treeview">
				   <a href="<?php echo URL ;?>ChecklistReport" 
				                    <?php 
										$actual_link = "$_SERVER[REQUEST_URI]";
										IF($actual_link=="/<?php echo URL ;?>/ChecklistReport"){
											echo " class='nav-link active'";
										}else{
											echo " class='nav-link'";
										}
										?> >
				  <i class="nav-icon fas fa-broom"></i>
				  <p>Checklist Report</p>
				</a>
		    </li>

        	<li class="nav-item has-treeview">
				   <a href="<?php echo URL ;?>Report/BookingRoomReport" 
				                    <?php 
										$actual_link = "$_SERVER[REQUEST_URI]";
										IF($actual_link=="/<?php echo URL ;?>/Report/BookingRoomReport"){
											echo " class='nav-link active'";
										}else{
											echo " class='nav-link'";
										}
										?> >
				  <i class="nav-icon fas fa-address-book"></i>
				  <p>Booking Room Report</p>
				</a>
		    </li>
			
			<li class="nav-item has-treeview">
				   <a href="<?php echo URL ;?>Report/StationaryRequestReport" 
				                   <?php 
										$actual_link = "$_SERVER[REQUEST_URI]";
										IF($actual_link=="/<?php echo URL ;?>/Report/StationaryRequestReport"){
											echo " class='nav-link active'";
										}else{
											echo " class='nav-link'";
										}
										?> >
				  <i class="nav-icon fas fa-circle"></i>
				  <p>Stationary  Report</p>
				</a>
		    </li>
			
			
			<li class="nav-item has-treeview">
				   <a href="<?php echo URL ;?>Report/StockHistoryReport"
				                    <?php 
										$actual_link = "$_SERVER[REQUEST_URI]";
										IF($actual_link=="/<?php echo URL ;?>/Report/StockHistoryReport"){
											echo " class='nav-link active'";
										}else{
											echo " class='nav-link'";
										}
										?> >
				  <i class="nav-icon fas fa-barcode"></i>
				  <p>Stock Report</p>
				</a>
		    </li>
			<li class="nav-header"> SETUP & CONFIG</li>
			<li 
				<?php 
										$actual_link = "$_SERVER[REQUEST_URI]";
										$pos = strrpos($actual_link,'id') - 1;
                                         $actual_linkgetID = substr($actual_link, 0, $pos);
										IF($actual_link=="/<?php echo URL ;?>/Users"
										|| $actual_link=="/<?php echo URL ;?>/BusinessUnit"
										|| $actual_link=="/<?php echo URL ;?>/Department"
											|| $actual_linkgetID=="/<?php echo URL ;?>/Users/UpdateForm"
										){
											echo " class='nav-item has-treeview menu-open'";
										}else{
											echo " class='nav-item has-treeview'";
										}
										?> >
			
            <a href="#" 
							<?php 
										$actual_link = "$_SERVER[REQUEST_URI]";
										$pos = strrpos($actual_link,'id') - 1;
                                          $actual_linkgetID = substr($actual_link, 0, $pos);
										IF($actual_link=="/<?php echo URL ;?>/Users"
										|| $actual_link=="/<?php echo URL ;?>/BusinessUnit"
										|| $actual_link=="/<?php echo URL ;?>/Department"
											|| $actual_linkgetID=="/<?php echo URL ;?>/Users/UpdateForm"
										){
											echo " class='nav-link active menu-open'";
										}else{
											echo " class='nav-link'";
										}
										?> >
			
              <i class="nav-icon fas fa-cogs"></i>
              <p>
              Setup Account
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
			 <ul class="nav nav-treeview" >
             <li class="nav-item has-treeview">
				   <a href="<?php echo URL ;?>Users"
				                   <?php 
										$actual_link = "$_SERVER[REQUEST_URI]";
										$pos = strrpos($actual_link,'id') - 1;
                                        $actual_linkgetID = substr($actual_link, 0, $pos);
										IF($actual_link=="/<?php echo URL ;?>/Users"
											|| $actual_linkgetID=="/<?php echo URL ;?>/Users/UpdateForm"
										){
											echo " class='nav-link active'";
										}else{
											echo " class='nav-link'";
										}
										?> >
				  <i class="nav-icon fas fa-users"></i>
				  <p>Users</p>
				</a>
		    </li>
			<li class="nav-item has-treeview">
				   <a href="<?php echo URL ;?>BusinessUnit" 
				                    <?php 
										$actual_link = "$_SERVER[REQUEST_URI]";
										IF($actual_link=="/<?php echo URL ;?>/BusinessUnit"){
											echo " class='nav-link active'";
										}else{
											echo " class='nav-link'";
										}
										?> >
				  <i class="nav-icon fas fa-building"></i>
				  <p>Business Unit</p>
				</a>
		    </li>
			<li class="nav-item has-treeview">
				   <a href="<?php echo URL ;?>Department"
				                         <?php 
										$actual_link = "$_SERVER[REQUEST_URI]";
										IF($actual_link=="/<?php echo URL ;?>/Department"){
											echo " class='nav-link active'";
										}else{
											echo " class='nav-link'";
										}
										?> >
				  <i class="nav-icon fas fa-code-branch"></i>
				  <p>Department</p>
				</a>
		    </li>
		    </ul>
            </li>
			<li class="nav-item has-treeview">
				   <a href="<?php echo URL ;?>MeetingRoom"
				                    <?php 
										$actual_link = "$_SERVER[REQUEST_URI]";
										IF($actual_link=="/<?php echo URL ;?>/MeetingRoom"){
											echo " class='nav-link active'";
										}else{
											echo " class='nav-link'";
										}
										?> >
				  <i class="nav-icon fas fa-address-book"></i>
				  <p>Setup Meeting Room</p>
				</a>
		    </li>
			
			<li class="nav-item has-treeview">
				   <a href="<?php echo URL ;?>SetupCleaning"
				               <?php 
										$actual_link = "$_SERVER[REQUEST_URI]";
										IF($actual_link=="/<?php echo URL ;?>/SetupCleaning"){
											echo " class='nav-link active'";
										}else{
											echo " class='nav-link'";
										}
										?> >
				  <i class="nav-icon fas fa-broom"></i>
				  <p>Setup Cleaning</p>
				</a>
		    </li>
			
			
			<?php
			}
			?>
			
			<li class="nav-header">ACCOUNT SETTINGS</li>
				<li class="nav-item" >
				<a href="#PasswordModal" data-toggle="modal" data-target="#PasswordModal"  class="nav-link">
				  <i class="nav-icon fas fa-user-lock"></i>
				  <p>Change Password</p>
				</a>
		    </li>
		    <li class="nav-item">
				<a 
				href="#logoutModal" data-toggle="modal" data-target="#logoutModal"  class="nav-link">
				
				  <i class="nav-icon fas fa-sign-out-alt"></i>
				  <p>LOG-OUT</p>
				</a>
		    </li>
		    
		    <li class="nav-item">
				<a 
				href="https://intranet.aifgrouplaos.com/logout.php?id=<?php echo $_SESSION['SESS_MEMBER_Username'];?>&&appdata=vehicle"   class="nav-link">
				
				  <i class="nav-icon fa fa-rocket"></i>
				  <p>Go to other services</p>
				</a>
		    </li>
			
			
			
			
			
			
			
			</ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  
     <!-- Logout Modal-->

			<div class="modal fade in" id="logoutModal" tabindex="-1" role="dialog" >
                <div class="modal-dialog" role="document">
                    <div class="modal-content " style="border-radius:5px; ">
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">Exit Account?</h4>
                        </div>
                        <div class="modal-body">
                           Select "Change Users" below if you are ready to end your current session.
                        </div>
                        <div class="modal-footer">
						
                          <a href="<?php echo URL ;?>Dashboard/logout_user" data-color="pink" 
						    class="btn bg-pink  waves-effect">Change Users</a>
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                    </div>
                </div>
            </div>
 <!-- Logout Modal-->
 
 
   <div class="modal fade" id="PasswordModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
	  <form method="post" id="changepw">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
			
			<div class="text-xs font-weight-bold text-primary text-uppercase mt-3" >Current Password</div>
				<input type="password"class="form-control" name="cPass" id="cPass" required Placeholder="Please Enter Current Password">
			<div class="text-xs font-weight-bold text-primary text-uppercase mt-3" >New Password</div>
				<input type="password"class="form-control" name="nPass" required Placeholder="Please Enter New Password">
		
			<div id="chresponse"></div>
		</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <button class="btn btn-primary" type="submit" >Save New Password</button>
        </div>
        </form>
      </div>
    </div>
  </div>	
   <script src="<?php echo URL ;?>public/js/jquery.js"></script>
<script>
$(document).ready(function() {	
	
	$("#chresponse").html("");			
	$("#changepw").submit(function(){
				$("#chresponse").html("<b>Loading response...</b>");
					$.ajax({
							type: "POST",
								url: <?php echo "'". URL . "'" ?> + "Dashboard/ChangePassword", 
							data: $(this).serialize()
							})
							.done(function(data){
							$("#chresponse").fadeOut(500).html(data).fadeIn(300);
							
							})
							.fail(function() {
							alert( "Posting failed." );
							});
							
							return false;
																
																
			});	
								
							
							
	
});
</script>	
	
 