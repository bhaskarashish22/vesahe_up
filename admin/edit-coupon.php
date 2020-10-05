<?php include("include/header.php");?>
<?php
$id = $_GET['id'];
$result = mysql_query("Select *from couponpages where id='$id'");
?>
<?php $row = mysql_fetch_array($result)
?>

<?php

//function Code link url

function create_slug($string){
   $slug=preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
   return $slug;
}

if(isset($_POST['submit'])) {
	
// Usage across all PHP versions

if (get_magic_quotes_gpc()) {
    $couponname = stripslashes($_POST['couponname']);
	$couponcode = stripslashes($_POST['couponcode']);
	$startdate = stripslashes($_POST['startdate']);
	$enddate = stripslashes($_POST['enddate']);
	$coupontype = stripslashes($_POST['coupontype']);
	//$fixedamount = stripslashes($_POST['fixedamount']);
	//$percentamount = stripslashes($_POST['percentamount']);
	
}
else {
    $couponname = $_POST['couponname'];
	$couponcode = $_POST['couponcode'];	
	$startdate = $_POST['startdate'];
	$enddate = $_POST['enddate'];
	$coupontype = $_POST['coupontype'];
	//$fixedamount = $_POST['fixedamount'];
	//$percentamount = $_POST['percentamount'];
	
}


// If using MySQL
$couponname = mysql_real_escape_string($couponname);
$couponcode = mysql_real_escape_string($couponcode);
$startdate = mysql_real_escape_string($startdate);
$enddate = mysql_real_escape_string($enddate);
$coupontype = mysql_real_escape_string($coupontype);
//$fixedamount = mysql_real_escape_string($fixedamount);
//$percentamount = mysql_real_escape_string($percentamount);

$status = $_POST['status'];
$numbertimes = $_POST['numbertimes'];


if($coupontype == 'Fixed Amount')
{
$fixedamount1 = $_POST['fixedamount'];
$fixedamount2 = $_POST['fixedamount2'];
if($fixedamount1 == $fixedamount2)
{
	$fixedamount = $_POST['fixedamount2'];
}
else
{
	$fixedamount = $_POST['fixedamount'];
}

}

else
{
$percentamount1 = $_POST['percentamount'];
$percentamount2 = $_POST['percentamount2'];	

if($percentamount1 == $percentamount2)
{
	$percentamount = $_POST['percentamount2'];
}
else
{
	$percentamount = $_POST['percentamount'];
}

}


$sql = "update couponpages set couponname = '$couponname', couponcode = '$couponcode', startdate = '$startdate', enddate = '$enddate', coupontype = '$coupontype', fixedamount = '$fixedamount', percentamount = '$percentamount', numbertimes = '$numbertimes', status = '$status', date=Now() where id='$id'";
$exe = mysql_query($sql);

if($exe)
{
$msg="<br><b>Congratulation!! Your $couponname - Coupons Successfully Submitted</b><br><br><script type='text/javascript'>
                    window.setTimeout(function() {
                        location.href = 'edit-coupon.php?id=$id';
                    }, 2000);
        </script>";
//include('service_upload.php');
 } 
 else
 {
	$msg="<br><b>Sorry!! Your $couponname - Coupons Not Submitted</b><br><br>"; 
 }

}

?>


<link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
  
  
  <script>
jQuery.noConflict();
 
(function( $ ) {
  $(document).ready(function() {
 
$('#startdate').datepicker({ dateFormat: 'dd-mm-yy', minDate: 0});
$('#enddate').datepicker({ dateFormat: 'dd-mm-yy', minDate: 0});
        
       
  });

})( jQuery );

  </script>
  
  
  <script type="text/javascript">
    function ShowHideDiv() {
        var ddlPassport = document.getElementById("ddlPassport");
        var dvPassport = document.getElementById("dvPassport");
		var lgPassport = document.getElementById("lgPassport");
		
        dvPassport.style.display = ddlPassport.value == "Fixed Amount" ? "block" : "none";
		lgPassport.style.display = ddlPassport.value == "Percent Amount" ? "block" : "none";
		ddlved.style.display = ddlved.value == "" ? "block" : "none";
    }
</script>



<script type="text/javascript">
    function ShowHideDiv2() {
        var ddlPassport2 = document.getElementById("ddlPassport2");
        var dvPassport2 = document.getElementById("dvPassport2");
		var lgPassport2 = document.getElementById("lgPassport2");
		
        dvPassport2.style.display = ddlPassport2.value == "Flat Discount" ? "block" : "none";
		lgPassport2.style.display = ddlPassport2.value == "Specified Discount" ? "block" : "none";
		ddlved2.style.display = ddlved2.value == "" ? "block" : "none";
    }
</script>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Manage Coupon
       
       <!-- <small>Preview</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Manage Coupon</a></li>
        <li class="active">Edit Coupon</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Coupon</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div class="col-md-10 col-md-offset-1">
              <form class="form-horizontal" method="post" action="edit-coupon.php?id=<?php echo $row['id'];?>" name="couponscategory">
              
              <div class="msgpass"><?php echo $msg;?></div>
              
              
              
             
             
    <div class="form-group">
      <label class="control-label col-sm-3" >Discount Coupon Name </label>
      <div class="col-sm-4">
        <input type="text" class="form-control" name="couponname" id="couponname" value="<?php echo $row['couponname'];?>" required>
      </div>
    </div>
	
	
	<div class="form-group">
      <label class="control-label col-sm-3" >Discount Coupon Code </label>
      <div class="col-sm-4">
        <input type="text" class="form-control" name="couponcode" id="couponcode" value="<?php echo $row['couponcode'];?>" required>
      </div>
    </div>
    
    
    <div class="form-group">
      <label class="control-label col-sm-3" >Start Date   </label>
      <div class="col-sm-4">
        <input type="text" id="startdate" name="startdate" placeholder='DD-MM-YYYY' value="<?php echo $row['startdate'];?>" onKeyUp="if (/[^\d-]/g.test(this.value)) this.value = this.value.replace(/[^\d-]/g,'')" class="form-control" required onChange="validate(this)"/>
						
					<script type="text/javascript">	
						function validate(el){
    var regex = /^(0?[1-9]|[12][0-9]|3[01])-(0?[1-9]|1[012])-\d{4}$/;
    if(!regex.test(el.value)){
        alert('invalid start date');
        el.value = '';
    }
}
		</script>			
      </div>
    </div>
	
	
	<div class="form-group">
      <label class="control-label col-sm-3" >End Date   </label>
      <div class="col-sm-4">
         <input type="text" id="enddate" name="enddate" placeholder='DD-MM-YYYY' value="<?php echo $row['enddate'];?>" onKeyUp="if (/[^\d-]/g.test(this.value)) this.value = this.value.replace(/[^\d-]/g,'')" class="form-control" required onChange="validate2(this)"/>
						
					<script type="text/javascript">	
						function validate2(el){
    var regex = /^(0?[1-9]|[12][0-9]|3[01])-(0?[1-9]|1[012])-\d{4}$/;
    if(!regex.test(el.value)){
        alert('invalid end date');
        el.value = '';
    }
}
		</script>		
      </div>
    </div>
    
    
	
	<div class="form-group">
      <label class="control-label col-sm-3">Coupon Type</label>
      <div class="col-sm-4">
        <select name="coupontype" class="form-control" onchange="ShowHideDiv()" id="ddlPassport" required>
        <option value="">Select Coupon Type </option>
        <option value="Fixed Amount" <?php if ($row[coupontype] == 'Fixed Amount') echo ' selected="selected"'; ?>>Fixed Amount  </option>
        <option value="Percent Amount" <?php if ($row[coupontype] == 'Percent Amount') echo ' selected="selected"'; ?>>Percent Amount </option>
        </select>
      </div>
    </div>
	
	
	<?php 
	if ($row[fixedamount] != "")
	{
	?>
	
	<div id="ddlved">

	<div class="form-group">
      <label class="control-label col-sm-3" >Fixed Amount </label>
      <div class="col-sm-4">
        <input type="number" class="form-control" name="fixedamount" id="fixedamount" value="<?php echo $row['fixedamount'];?>">
      </div>
    </div>
	
	</div>
	
	<?php } else if ($row[percentamount] != "")
	{
	?> 
	
	<div id="ddlved">


     <div class="form-group">
      <label class="control-label col-sm-3" >Percent Amount </label>
      <div class="col-sm-4">
        <input type="number" class="form-control" name="percentamount" id="percentamount" value="<?php echo $row['percentamount'];?>">
      </div>
    </div>
	
	</div>
	
	<?php } ?>
	
	
	<div id="dvPassport" style="display: none">

	<div class="form-group">
      <label class="control-label col-sm-3" >Fixed Amount </label>
      <div class="col-sm-4">
        <input type="number" class="form-control" name="fixedamount2" id="fixedamount" value="<?php echo $row['fixedamount'];?>">
      </div>
    </div>
	
	</div>
	
	
	
	 <div id="lgPassport"  style="display: none">


     <div class="form-group">
      <label class="control-label col-sm-3" >Percent Amount </label>
      <div class="col-sm-4">
        <input type="number" class="form-control" name="percentamount2" id="percentamount" value="<?php echo $row['percentamount'];?>">
      </div>
    </div>
	
	</div>
   
      
	
	<div class="form-group">
      <label class="control-label col-sm-3" >Number of Times Use </label>
      <div class="col-sm-4">
        <input type="number" class="form-control" name="numbertimes" id="numbertimes" value="<?php echo $row['numbertimes'];?>" required>
      </div>
    </div> 
	
	
	
	
	
   
    
    <div class="form-group">
      <label class="control-label col-sm-3">Status</label>
      <div class="col-sm-4">
        <select name="status" id="status" class="form-control" required>
        <option value="">Select Status </option>
        <option value="Active" <?php if ($row[status] == 'Active') echo ' selected="selected"'; ?>>Active</option>
        <option value="Deactive" <?php if ($row[status] == 'Deactive') echo ' selected="selected"'; ?>>Deactive</option>
        </select>
      </div>
    </div>
    
    
    
    
    <div class="form-group">
    
      <div class="col-sm-offset-3 col-sm-5">
        <button type="submit" name="submit" class="btn  btn-primary">Submit</button>
      </div>
      
    </div>
  </form>
            </div>
            
            <div class="clearfix"></div>
          </div>
          <!-- /.box -->

          <!-- Form Element sizes -->
          
          <!-- /.box -->

          
          <!-- /.box -->

          <!-- Input addon -->
          
          <!-- /.box -->

        </div>
        <!--/.col (left) -->
        <!-- right column -->
        
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include("include/footer.php");?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.0 -->
<script src="plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>

<!-- CK Editor -->
<script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>



<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1');
	CKEDITOR.replace('editor2');
	CKEDITOR.replace('editor3');
	CKEDITOR.replace('editor4');
    //bootstrap WYSIHTML5 - text editor
    $(".textarea").wysihtml5();
	
	
	
  });
</script>

</body>
</html>
