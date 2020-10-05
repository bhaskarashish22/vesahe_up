<?php include("include/header.php");?>


<?php
//function Code link url

function create_slug($string){
   $slug=preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
   return $slug;
}

if(isset($_POST['submit'])) {
	
// Usage across all PHP versions

if (get_magic_quotes_gpc()) {
    $titlename = stripslashes($_POST['name']);
	$phone = stripslashes($_POST['phone']);
	$web = stripslashes($_POST['web']);
	$email = stripslashes($_POST['email']);
	$address = stripslashes($_POST['address']);
	$facebook = stripslashes($_POST['facebook']);
	$twitter = stripslashes($_POST['twitter']);
	$youtube = stripslashes($_POST['youtube']);
	$instagram = stripslashes($_POST['instagram']);
	$googleplus = stripslashes($_POST['googleplus']);
	$linkedin = stripslashes($_POST['linkedin']);
	$whatsapp = stripslashes($_POST['whatsapp']);
}

else {
    $titlename = $_POST['name'];
	$phone = $_POST['phone'];
	$web = $_POST['web'];
	$email = $_POST['email'];
	$address = $_POST['address'];
	$facebook = $_POST['facebook'];
	$twitter = $_POST['twitter'];
	$youtube = $_POST['youtube'];
	$instagram = $_POST['instagram'];
	$googleplus = $_POST['googleplus'];
	$linkedin = $_POST['linkedin'];
	$whatsapp = $_POST['whatsapp'];
		
}


$sqlchk = "select name from contactcategory where name = '$titlename'";
$exechk = mysql_query($sqlchk);
$numchk = mysql_num_rows($exechk);
if ($numchk>0)
{
$i=$numchk; 
$i++;
$del_id = $i;
$newname1 = "$titlename"."".$del_id; 
$newnamep = create_slug($newname1);
$newname = strtolower($newnamep);

$sqlchks = "select pages from contactcategory where pages = '$newname'";
$exechks = mysql_query($sqlchks);
$numchks = mysql_num_rows($exechks);

if ($numchks>0)
{
$i=$numchks; 
$i++;
$del_ids = $i;
$newname2 = "$newname"."".$del_ids; 
$newnamep2 = create_slug($newname2);
$newname = strtolower($newnamep2);


}

}

else
{

$newname3 = $titlename;
$newnamep3 = create_slug($newname3);
$newname = strtolower($newnamep3);  
}


// If using MySQL
$titlename = mysql_real_escape_string($titlename);
$phone = mysql_real_escape_string($phone);
$web = mysql_real_escape_string($web);
$email = mysql_real_escape_string($email);
$address = mysql_real_escape_string($address);

$facebook = mysql_real_escape_string($facebook);
$twitter = mysql_real_escape_string($twitter);
$youtube = mysql_real_escape_string($youtube);
$instagram = mysql_real_escape_string($instagram);
$googleplus = mysql_real_escape_string($googleplus);
$linkedin = mysql_real_escape_string($linkedin);
$whatsapp = mysql_real_escape_string($whatsapp);

$pageorder = $_POST['pageorder'];
$status = $_POST['status'];


$sql = "insert contactcategory set name = '$titlename', pages = '$newname', pageorder = '$pageorder', status = '$status', phone = '$phone', web = '$web', address = '$address', email = '$email', facebook = '$facebook', twitter = '$twitter', youtube = '$youtube', instagram = '$instagram', googleplus = '$googleplus', linkedin = '$linkedin', whatsapp = '$whatsapp'";
$exe = mysql_query($sql);

if($exe)
{
		echo '<script>alert("Contact Data is Added");</script>';
		echo  "<script>"; 
	echo "location.href='contact_view.php'";  
	echo  "</script>"; 
	}
	 
	else
	{
		echo '<script>alert("Contact Data is Not Added");</script>';
		echo  "<script>"; 
	echo "location.href='contact-add.php'";  
	echo  "</script>"; 
	}

}

?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Manage Contact
       
       <!-- <small>Preview</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Manage Contact</a></li>
        <li class="active">Add Contact</li>
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
              <h3 class="box-title">Add Contact</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div class="col-md-10 col-md-offset-1">
            
              <form class="form-horizontal" method="post" action="<?php echo $PHP_SELF;?>" name="samplescategory">
              
              <div class="msgpass"><?php echo $msg;?></div>
             
   <div class="form-group">
      <label class="control-label col-sm-3">Page Name</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" name="name" id="name"  required>
      </div>
    </div>
    
    
     <div class="form-group">
      <label class="control-label col-sm-3">Pageorder</label>
      <div class="col-sm-4">
        <input type="number" class="form-control" name="pageorder" id="pageorder" required>
      </div>
    </div>
    
    <div class="form-group">
      <label class="control-label col-sm-3">Status</label>
      <div class="col-sm-4">
        <select name="status" id="status" class="form-control" required>
        <option value="">Select Status </option>
        <option value="Active">Active </option>
        <option value="Deactive">Deactive </option>
        </select>
      </div>
    </div>
    
    
    <div class="form-group">
      <label class="control-label col-sm-3">Phone</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" name="phone" id="phone" required>
      </div>
    </div>
    
    
    <div class="form-group">
      <label class="control-label col-sm-3">Email</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" name="email" id="email" required>
      </div>
    </div>
    
    <div class="form-group">
      <label class="control-label col-sm-3">Web</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" name="web" id="web" required>
      </div>
    </div>
    
    <div class="form-group">
      <label class="control-label col-sm-3">Address</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" name="address" id="address" required>
      </div>
    </div>
   
    <div class="form-group">
      <label class="control-label col-sm-3">Facebook Link</label>
      <div class="col-sm-8">
        <input type="text" class="form-control" name="facebook" id="facebook" required>
      </div>
    </div>
   
   
   <div class="form-group">
      <label class="control-label col-sm-3">Twitter Link</label>
      <div class="col-sm-8">
        <input type="text" class="form-control" name="twitter" id="twitter" required>
      </div>
    </div>
	
	
	<div class="form-group">
      <label class="control-label col-sm-3">Youtube Link</label>
      <div class="col-sm-8">
        <input type="text" class="form-control" name="youtube" id="youtube" required>
      </div>
    </div>
	
	<div class="form-group">
      <label class="control-label col-sm-3">Instagram Link</label>
      <div class="col-sm-8">
        <input type="text" class="form-control" name="instagram" id="instagram" />
      </div>
    </div>
	
	<div class="form-group">
      <label class="control-label col-sm-3">Google Plus Link</label>
      <div class="col-sm-8">
        <input type="text" class="form-control" name="googleplus" id="googleplus" />
      </div>
    </div>
    
    
    <div class="form-group">
      <label class="control-label col-sm-3">Linkedin Link</label>
      <div class="col-sm-8">
        <input type="text" class="form-control" name="linkedin" id="linkedin" />
      </div>
    </div>
	
	<div class="form-group">
      <label class="control-label col-sm-3">WhatsApp Link</label>
      <div class="col-sm-8">
        <input type="text" class="form-control" name="whatsapp" id="whatsapp" />
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
