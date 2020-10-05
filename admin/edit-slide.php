<?php include("include/header.php");?>
<?php
$id = $_GET['id'];
$result = mysql_query("Select *from homeslide where id='$id'");
?>
<?php $row = mysql_fetch_array($result)
?>
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Manage Slide
       <!-- <small>Preview</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Manage Slide</a></li>
        <li><a href="#">View Slide</a></li>
        <li class="active">Edit Slide</li>
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
              <h3 class="box-title">Edit Slide</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div class="col-md-10 col-md-offset-1">
               <form class="form-horizontal" method="post" action="update-slide.php?id=<?php echo $row['id'];?>" name="editclients" enctype="multipart/form-data">
			  
			  <div class="msgpass"><?php echo $msg;?></div>
			  
    <!--
    
    <div class="form-group">
    
      <label class="control-label col-sm-2" >Name</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" name="name" id="name" value="<?php echo $row[name];?>">
      </div>
      
    </div>
    
    
    <div class="form-group">
    
      <label class="control-label col-sm-2" >Tagline</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" name="cbrief" id="cbrief" value="<?php echo $row[cbrief];?>">
      </div>
      
    </div>
    
    
    
    <div class="form-group">
    
      <label class="control-label col-sm-2" >Brief</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="brief" id="brief" value="<?php echo $row[brief];?>">
      </div>
      
    </div>
    
    
    
    <div class="form-group">
    
      <label class="control-label col-sm-2" >Url Link</label>
      <div class="col-sm-8">
       <input type="text" name="urllink" id="urllink" value="<?php echo $row[urllink];?>" class="form-control">
      </div>
      
    </div>
    
    
    !-->
    
   
    
    <div class="form-group">
    
      <label class="control-label col-sm-2" >Active Status</label>
      <div class="col-sm-4">
        <select name="cname" id="cname" class="form-control">
						<option value="Active" <?php if ($row[cname] == 'Active') echo ' selected="selected"'; ?>>Active</option>
						<option value="Deactive" <?php if ($row[cname] == 'DeActive') echo ' selected="selected"'; ?>>DeActive</option>
						
						</select>
						
						
						
                        
      </div>
      
    </div>
	
	
	
	<div class="form-group">
    
      <label class="control-label col-sm-2" >Page Order</label>
      <div class="col-sm-4">
        <input type="number" class="form-control" name="pageorder" id="pageorder" value="<?php echo $row['pageorder'];?>">
      </div>
      
    </div>
    
    
    
    
    
    
    
    
    
    <div class="form-group">
      <label class="control-label col-sm-2" >Slide:</label>
      <div class="col-sm-8">
        
         <div class="col-sm-12" style="padding:0px;">
		 
		 <?php
  if($row[photo] != "")
  {
  ?>
						
						
						
						<img src="<?php echo $urlroot;?>admin/uploads/slide/<?php echo $row[photo];?>" width="120" height="120" class="img" />
						
						<?php
						}
						else
						{
						?>
						<img src="<?php echo $urlroot;?>admin/uploads/aboutus/nophoto.jpg" width="120" height="120" class="img" />
						
						<?php
						
						}
						
						?>
		 
		 
		 
		 </div>
        
        <div class="col-sm-12" style="padding:0px;"><br>
          <input type="file" name="uploadphoto" id="uploadphoto">
		  <input type="hidden" name="ph" size="30" tabindex="1" value="<?php echo $row[photo];?>">
        </div>
        
      </div>
    </div>
    
    <div class="form-group">
      <div class="col-sm-offset-4 col-sm-8">
        <button type="submit" name="submit" class="btn  btn-primary">Update</button>
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

<script>
function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result).css({"width": "80%", "padding-left": "0px", "padding-right": "10px", "padding-bottom": "10px", "padding-top": "0px"});
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    $("#imgInp").change(function(){
        readURL(this);
    });
</script>

</body>
</html>
