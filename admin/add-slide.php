<?php include("include/header.php");?>
<?php
include("include/connection1.php"); 
//function Code link url

function create_slug($string){
   $slug=preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
   return $slug;
}


 
if(isset($_POST['submit'])) {
	
	if (get_magic_quotes_gpc()) {
    $titlename = stripslashes($_POST['name']);
	$cbrief = stripslashes($_POST['cbrief']);
	$brief = stripslashes($_POST['brief']);
	$urllink = stripslashes($_POST['urllink']);
	
}
else {
    $titlename = $_POST['name'];
	$cbrief = $_POST['cbrief'];
	$brief = $_POST['brief'];
	$urllink = $_POST['urllink'];
	
}


$path = "$imgroot/uploads/";

$randval = mt_rand(1,9999);
$titlename = mysql_real_escape_string($titlename);	
$cbrief = mysql_real_escape_string($cbrief);
$brief = mysql_real_escape_string($brief);
$urllink = mysql_real_escape_string($urllink);	

$newname3 = $titlename;
$newnamep3 = create_slug($newname3);
$newname = strtolower($newnamep3); 
//$brief = $_POST['brief'];

$newsp = $_POST['pageorder'];
$cname = $_POST['cname'];

$date = date('d-m-Y');




$ext = explode('.', basename($_FILES['uploadphoto']['name']));   // Explode file name from dot(.)

$file_extension = end($ext); // Store extensions in the variable.

$photo_name = $_FILES['uploadphoto']['name'];
$photo_name = preg_replace('/\s+/', '', $photo_name); // white space close
$photo_name = str_replace('(', '', $photo_name); // white space close
$photo_name = str_replace(')', '', $photo_name); // white space close
$photo_name = str_replace('%', '', $photo_name); // white space close
$photo_name = str_replace('?', '', $photo_name); // white space close

$photo_namenew = $randval.$photo_name;

$phot_tmp_name = $_FILES['uploadphoto']['tmp_name'];
$phot_tmp_name = preg_replace('/\s+/', '', $phot_tmp_name); // white space close
$phot_tmp_name = str_replace('(', '', $phot_tmp_name); // white space close
$phot_tmp_name = str_replace(')', '', $phot_tmp_name); // white space close
$phot_tmp_name = str_replace('%', '', $phot_tmp_name); // white space close
$phot_tmp_name = str_replace('?', '', $phot_tmp_name); // white space close



if($photo_name == "")
{


$sql = "insert homeslide set pageorder = '$newsp', cname = '$cname', name = '$titlename', cbrief = '$cbrief', urllink = '$urllink', brief = '$brief', pages = '$newname', date = '$date'";
$result = mysql_query($sql);

if($result)
{
$msg="<b>Congratulation!! Your Slide Successfully Submitted</b><br><br>";
//include('edit-slide.php');
}

else
{
$msg="<b>Sorry!! Your Slide Not Submitted</b><br><br>";
//include('edit-slide.php');	
}

}

else if($file_extension == 'png' or  $file_extension == 'PNG' or  $file_extension == 'jpeg' or  $file_extension == 'JPEG' or  $file_extension == 'JPG' or  $file_extension == 'jpg' or $file_extension == 'gif' or $file_extension == 'GIF' )
  
 {
 

//$photo_namenew = $randval.$photo_name;

//$phot_tmp_name = $_FILES['uploadphoto']['tmp_name'];

move_uploaded_file($phot_tmp_name,$path.$photo_namenew);
	$url3 ="uploads/";

				$name3 = $photo_namenew;

				$new_w = "100";
				 $new_h = "54";
				 $thumburl = "uploads/slide-thums/";
				 createthumbnail($name3, $url3,$new_w,$new_h,$thumburl);
				 
				 
				 $big_w = "1233";
				 $big_h = "720";
				 $thumburl_big = "uploads/slide/";
				 createthumbnail($name3, $url3,$big_w,$big_h,$thumburl_big);
				
				 
				 unlink("uploads/".$photo_namenew);



$sql = "insert homeslide set pageorder = '$newsp', cname = '$cname', name = '$titlename', cbrief = '$cbrief', brief = '$brief', urllink = '$urllink', pages = '$newname', photo = '$photo_namenew', date = '$date'";
$result = mysql_query($sql);


if($result)
{
$msg="<b>Congratulation!! Your Slide Successfully Submitted</b><br><br>";
//include('edit-slide.php');
}

else
{
$msg="<b>Sorry!! Your Slide Not Submitted</b><br><br>";
//include('edit-slide.php');	
}

}
 
 else 
 
 {
 
 $msg="<b>Sorry $file_extension is invalid, allowed extentions are:  jpeg, JPEG, JPG, PNG, gif, GIF, jpg, png</b><br><br>";
//include('edit-slide.php');
 
 }
  

  }
  
  
  // funtion to crop image 			

function createthumbnail($name, $url,$new_w,$new_h,$thumburl)

{

	$system=explode(".", $name);

	$filep = end($system);
	
	 //echo "<pre>";
	//print_r($filep);
	//die("VED");
	
	//$src_img=imagecreatefromjpeg($url.$name);
	
	//Details image Croping Details
	
	if($filep == "png")
	{
		$src_img = imagecreatefrompng($url.$name);
	} 
	
	else if($filep == "PNG")
	{
		$src_img = imagecreatefrompng($url.$name);
	} 
	
	else if($filep == "jpeg")
	{
		$src_img = imagecreatefromjpeg($url.$name);
	} 
	
	else if($filep == "JPEG")
	{
		$src_img = imagecreatefromjpeg($url.$name);
	} 
	
	else if($filep == "JPG")
	{
		$src_img = imagecreatefromjpeg($url.$name);
	} 
	
	else if($filep == "jpg")
	{
		$src_img = imagecreatefromjpeg($url.$name);
	} 
	
	else if($filep == "gif")
	{
		$src_img = imagecreatefromgif($url.$name);
	} 
	
	else if($filep == "GIF")
	{
		$src_img = imagecreatefromgif($url.$name);
	} 

        else if($filep == "bmp")
	{
		$src_img = imagecreatefromwbmp($url.$name);
	} 

        else if($filep == "BMP")
	{
		$src_img = imagecreatefromwbmp($url.$name);
	} 
	
	//Details image Croping End Details




	# get dimensions of old image

	$old_x=imagesx($src_img);

	$old_y=imagesy($src_img);

	if ($old_x > $new_w)

	{

		$thumb_w = $new_w;

		$ratio = $new_w/$old_x;

		$thumb_h = intval($old_y*$ratio);

		if($thumb_h > $new_h)

		{

			$ratio = $new_h/$old_y;

			$thumb_w = intval($old_x*$ratio);

			$thumb_h = intval($new_h);

		}

	

	}

	elseif($old_x <= $new_w) // if old width is less then current width

	{

		if($old_y > $new_h)

		{

			$ratio = $new_h/$old_y;

			$thumb_w = intval($old_x*$ratio);

			$thumb_h = intval($new_h);

		}

		else

		{

			$thumb_w =$old_x;

			$thumb_h=$old_y;

		}

	}



	$dst_img=imagecreatetruecolor($thumb_w, $thumb_h);

	# resize source image and place the copy in the destination image

	imagecopyresampled($dst_img,$src_img,0,0,0,0,$thumb_w,$thumb_h,$old_x,$old_y); 

	# get file name, add tn_ and create thumbnail according to $makeimg

	//$filename=$system[0].".".$system[1];
    $filename=$name;

	

	imagejpeg($dst_img,$thumburl.$filename); 

	# destroy both image objects (to save memory)

	imagedestroy($dst_img); 

	imagedestroy($src_img); 

	# initialise name

	$name="";

} 


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
        <li class="active">Add Slide</li>
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
              <h3 class="box-title">Add Slide</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div class="col-md-10 col-md-offset-1">
               <form class="form-horizontal" method="post" action="<?php echo $PHP_SELF;?>" name="editclients" enctype="multipart/form-data">
			  
			  <div class="msgpass"><?php echo $msg;?></div>
			  
    
   <!-- 
   <div class="form-group">
    
      <label class="control-label col-sm-2" >Name</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" name="name" id="name">
      </div>
      
    </div>
    
    
    <div class="form-group">
    
      <label class="control-label col-sm-2" >Tagline</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" name="cbrief" id="cbrief">
      </div>
      
    </div>
    
    
    
    <div class="form-group">
    
      <label class="control-label col-sm-2" >Brief</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="brief" id="brief">
      </div>
      
    </div>
    
    
    <div class="form-group">
    
      <label class="control-label col-sm-2" >Url Link</label>
      <div class="col-sm-8">
       <input type="text" name="urllink" id="urllink" class="form-control">
      </div>
      
    </div>
    !-->
   
    
    <div class="form-group">
    
      <label class="control-label col-sm-2" >Active Status</label>
      <div class="col-sm-4">
        <select name="cname" id="cname" class="form-control">
						<option value="Active">Active</option>
						<option value="Deactive">DeActive</option>
						
						</select>
						
						
						
                        
      </div>
      
    </div>
	
	
	
	<div class="form-group">
    
      <label class="control-label col-sm-2" >Page Order</label>
      <div class="col-sm-4">
        <input type="number" class="form-control" name="pageorder" id="pageorder">
      </div>
      
    </div>
    
    
    
    
    
    
    
    
    <div class="form-group">
    
      <label class="control-label col-sm-2" >Slide</label>
      <div class="col-sm-6">
       <input type="file" name="uploadphoto" id="uploadphoto">
      </div>
      
    </div>
    
    
    
    
    
    
    
    <div class="form-group">
      <div class="col-sm-offset-4 col-sm-8">
        <button type="submit" name="submit" class="btn  btn-primary">Upload</button>
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
