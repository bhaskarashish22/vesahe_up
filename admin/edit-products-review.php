<?php include("include/header.php");?>

<?php
$id = $_GET['id'];
$result = mysql_query("Select *from listrating where id='$id'");
?>
<?php $row = mysql_fetch_array($result);?>


<?php

//function Code link url

function create_slug($string){
   $slug=preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
   return $slug;
}

if(isset($_POST['submit'])) {
	

$status = $_POST['status'];
$homestatus = $_POST['homestatus'];


$sql = "update listrating set homestatus = '$homestatus', status = '$status' where id='$id'";
$exe = mysql_query($sql);


if($exe)
{

echo "<script>alert('Congratulation!! Your Review Successfully Updated')</script>";
echo  "<script>"; 
	echo "location.href='product-review.php'";  
	echo  "</script>";	

 } 
 else
 
 {
	echo "<script>alert('Sorry!! Your Review Not Updated')</script>"; 
	echo  "<script>"; 
	echo "location.href='product-review.php'";  
	echo  "</script>";	
 }
 
}
?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Manage Products Review 
       
       <!-- <small>Preview</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Manage Products Review  </a></li>
        <li class="active">Edit Products Review  </li>
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
              <h3 class="box-title">Edit Products Review  </h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div class="col-md-10 col-md-offset-1">
              <form class="form-horizontal" method="post" action="edit-products-review.php?id=<?php echo $row['id'];?>" name="samplescategory">
              
              <div class="msgpass"><?php echo $msg;?></div>
             
    <div class="form-group">
      <label class="control-label col-sm-3"> Customer Name </label>
      <div class="col-sm-4">
       <?php echo $row['nickname'];?>
        
       
      </div>
    </div>
    
    <div class="form-group">
      <label class="control-label col-sm-3"> Product Name </label>
      <div class="col-sm-4">
       <?php echo $row['productname'];?>
        
       
      </div>
    </div>
    
    
     <div class="form-group">
      <label class="control-label col-sm-3"> Review </label>
      <div class="col-sm-8">
       <p style="text-align:justify;"> <?php echo $row['reviewmsg'];?> </p>
        
       
      </div>
    </div>
    
    
    
    
    
    
    <div class="form-group">
      <label class="control-label col-sm-3">Rating </label>
      <div class="col-sm-4">
       <?php if ($row['listrating'] == '1')
  {
	  ?>                          
                                        
                                    <i class="fa fa-star" style="color:#F45C5D;"></i> 
                                    <i class="fa fa-star-o"></i> 
                                    <i class="fa fa-star-o"></i> 
                                    <i class="fa fa-star-o"></i> 
                                    <i class="fa fa-star-o"></i> 
                                    <span class="rating-count" style="color:#F45C5D;">(1)</span>
                                    
                                    
         <?php }  else  if ($row['listrating'] == '2')
  {
	  ?>    
      
      <i class="fa fa-star" style="color:#F45C5D;"></i> 
                                    <i class="fa fa-star" style="color:#F45C5D;"></i> 
                                    <i class="fa fa-star-o"></i> 
                                    <i class="fa fa-star-o"></i> 
                                    <i class="fa fa-star-o"></i> 
                                    <span class="rating-count" style="color:#F45C5D;">(2)</span>                       
          <?php } else if ($row['listrating'] == '3')
													{
														?>  
                                                        
            <i class="fa fa-star" style="color:#F45C5D;"></i> 
                                    <i class="fa fa-star" style="color:#F45C5D;"></i> 
                                    <i class="fa fa-star" style="color:#F45C5D;"></i> 
                                    <i class="fa fa-star-o"></i> 
                                    <i class="fa fa-star-o"></i> 
                                    <span class="rating-count" style="color:#F45C5D;">(3)</span>                                            
                <?php }  else  if ($row['listrating'] == '4')
													{ ?>                                          
                                                         
                    <i class="fa fa-star" style="color:#F45C5D;"></i> 
                                    <i class="fa fa-star" style="color:#F45C5D;"></i> 
                                    <i class="fa fa-star" style="color:#F45C5D;"></i> 
                                    <i class="fa fa-star" style="color:#F45C5D;"></i> 
                                    <i class="fa fa-star-o" style="color:#F45C5D;"></i> 
                                    <span class="rating-count" style="color:#F45C5D;">(4)</span>
                                    
                                    
                                    <?php } else if ($row['listrating'] == '5')
													{
														?>                                      
                                       <i class="fa fa-star" style="color:#F45C5D;"></i> 
                                    <i class="fa fa-star" style="color:#F45C5D;"></i> 
                                    <i class="fa fa-star" style="color:#F45C5D;"></i> 
                                    <i class="fa fa-star" style="color:#F45C5D;"></i> 
                                    <i class="fa fa-star" style="color:#F45C5D;"></i> 
                                    <span class="rating-count" style="color:#F45C5D;">(5)</span>
                                    
                                    
                                     <?php } ?>                                      
				   
				  
                   
      </div>
    </div>
    
    
    <div class="form-group">
      <label class="control-label col-sm-3"> Date & Time </label>
      <div class="col-sm-8">
       <p style="text-align:justify;"> <?php echo $row['date'];?> </p>
        
       
      </div>
    </div>
    
    
    <div class="form-group">
      <label class="control-label col-sm-3">Home Page Show </label>
      <div class="col-sm-4">
      
       <div class="radio">
                    <label class="col-sm-2">
                      <input type="radio" name="homestatus" id="homestatus" <?php if ($row[homestatus] == 'Yes') echo ' checked'; else echo ' unchecked'; ?> value="Yes" required>
                     Yes
                    </label>
                    
                    <label class="col-sm-2">
                      <input type="radio" name="homestatus" id="homestatus" value="No" <?php if ($row[homestatus] == 'No') echo ' checked'; else echo ' unchecked'; ?> required>
                      No
                    </label>
                  </div>
      
      
      </div>
    </div>
    
    
    
    <div class="form-group">
      <label class="control-label col-sm-3">Status</label>
      <div class="col-sm-4">
        <select name="status" id="status" class="form-control" required>
        <option value="">Select Status </option>
       <option value="Yes" <?php if ($row[status] == 'Yes') echo ' selected="selected"'; ?>>Yes</option>
        <option value="No" <?php if ($row[status] == 'No') echo ' selected="selected"'; ?>>No</option>
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
