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
	
    $titlename = stripslashes($_POST['childname']);
	$brief = stripslashes($_POST['brief']);
	$metatoptitle = stripslashes($_POST['metatoptitle']);
	$metakeywords = stripslashes($_POST['metakeywords']);
	$metadescription = stripslashes($_POST['metadescription']);
}
else {
    $titlename = $_POST['childname'];
	$brief = $_POST['brief'];	
	$metatoptitle = $_POST['metatoptitle'];
	$metakeywords = $_POST['metakeywords'];
	$metadescription = $_POST['metadescription'];	
}

$sqlchk = "select childname from productchildcategory where childname = '$titlename'";
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

$sqlchks = "select childpages from productchildcategory where childpages = '$newname'";
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


$path = "$imgroot/uploads/";
$randval = mt_rand(1,109999);

// If using MySQL
$titlename = mysql_real_escape_string($titlename);
$brief = mysql_real_escape_string($brief);


$metatoptitle = mysql_real_escape_string($metatoptitle);
$metakeywords = mysql_real_escape_string($metakeywords);
$metadescription = mysql_real_escape_string($metadescription);

$pageorder = $_POST['pageorder'];
$status = $_POST['status'];
$productid = $_POST['productid'];
$productsubid = $_POST['fname'];

$optionallink = $_POST['optionallink'];
if($optionallink == "")
{
//$slacelink = "/";		
$newname = $newname.$slacelink;	
}
else
{	
$newname = $optionallink;	
}


//product
$ses_sql=mysql_query("select * from productcategory where id='$productid'");
$productrow1=mysql_fetch_array($ses_sql);
$productname=$productrow1['name'];
$productname = mysql_real_escape_string($productname);
$link=$productrow1['pages'];
//$link = strtolower(create_slug($productname));

//product
$ses_sql2=mysql_query("select * from productsubcategory where id='$productsubid'");
$productrow2=mysql_fetch_array($ses_sql2);
$productsubname=$productrow2['fname'];
$pages=$productrow2['pages'];
//$pages = strtolower(create_slug($productsubname));



$ext = explode('.', basename($_FILES['uploadphoto']['name']));   // Explode file name from dot(.)

$file_extension = end($ext); // Store extensions in the variable.

//echo "$file_extension";

$photo_name = $_FILES['uploadphoto']['name'];

$photo_namenew = $randval.$photo_name;

$phot_tmp_name = $_FILES['uploadphoto']['tmp_name'];

if($photo_name == "")

{

$sql = "insert productchildcategory set childname = '$titlename', childpages = '$newname', optionallink = '$optionallink', name = '$productname', link = '$link', pid = '$productid', fname = '$productsubname', pages = '$pages', pcid = '$productsubid', pageorder = '$pageorder', brief = '$brief', status = '$status', metatoptitle = '$metatoptitle', metakeywords = '$metakeywords', metadescription = '$metadescription', date=Now()";
$exe = mysql_query($sql);

if($exe)
{
$msg="<br><b>Congratulation!! Your $titlename - Service Child Category Successfully Submitted</b><br><br>";
//include('service_upload.php');
 } 
 else
 {
	$msg="<br><b>Sorry!! Your $titlename - Service Child Category Not Submitted</b><br><br>"; 
 }
 
}

else if ($file_extension == 'png' or  $file_extension == 'PNG' or  $file_extension == 'jpeg' or  $file_extension == 'JPEG' or  $file_extension == 'JPG' or  $file_extension == 'jpg' or $file_extension == 'gif' or $file_extension == 'GIF' )
	{
		
   move_uploaded_file($phot_tmp_name,$path.$photo_namenew);
	$url3 ="uploads/";


                 $name3 = $photo_namenew;

				 $new_w = "800";

				 $new_h = "800";

				 $thumburl = "uploads/products-childcategory/";

				 createthumbnail($name3, $url3,$new_w,$new_h,$thumburl);
				 
					
unlink("uploads/".$photo_namenew);

$sql = "insert productchildcategory set childname = '$titlename', childpages = '$newname', optionallink = '$optionallink', name = '$productname', link = '$link', pid = '$productid', fname = '$productsubname', pages = '$pages', pcid = '$productsubid', pageorder = '$pageorder', photo = '$photo_namenew', brief = '$brief', status = '$status', metatoptitle = '$metatoptitle', metakeywords = '$metakeywords', metadescription = '$metadescription', date=Now()";
$exe = mysql_query($sql);

if($exe)
{
$msg="<br><b>Congratulation!! Your $titlename - Service Child Category Successfully Submitted</b><br><br>";
//include('service_upload.php');
 } 
 else
 {
	$msg="<br><b>Sorry!! Your $titlename - Service Child Category Not Submitted</b><br><br>"; 
 }
 
	}
	
	 else 
{

$msg="<b>Sorry $file_extension is invalid, allowed extentions are:  jpeg, JPEG, JPG, PNG, gif, GIF, jpg, png</b><br><br>";

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


<script language="javascript" type="text/javascript">
function getXMLHTTP() { //fuction to return the xml http object
		var xmlhttp=false;	
		try{
			xmlhttp=new XMLHttpRequest();
		}
		catch(e)	{		
			try{			
				xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch(e){
				try{
				xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
				}
				catch(e1){
					xmlhttp=false;
				}
			}
		}
		 	
		return xmlhttp;
    }
	
	function getState(location_id) {		
		
		var strURL="findproduct.php?location="+location_id;
		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {						
						document.getElementById('statediv').innerHTML=req.responseText;						
					} else {
						alert("Problem while using XMLHTTP:\n" + req.statusText);
					}
				}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}		
	}
	</script>  

<script type="text/javascript" src="ckeditor/ckeditor.js"></script>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Manage Service Child Category
       
       <!-- <small>Preview</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Manage Service Child Category</a></li>
        <li class="active">Add Service Child Category</li>
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
              <h3 class="box-title">Add Service Child Category</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div class="col-md-10 col-md-offset-1">
              <form class="form-horizontal" method="post" action="<?php echo $PHP_SELF;?>" name="samplescategory" enctype="multipart/form-data">
              
              <div class="msgpass"><?php echo $msg;?></div>
              
              
          <div class="form-group">
      <label class="control-label col-sm-3">Service Category</label>
      <div class="col-sm-4">
       <select name="productid" id="productid" class="form-control" onChange="getState(this.value)" required>
       <option value="">Select Service Category</option>
       
        <?php
$sql="select * from productcategory where status='Active' order by pageorder asc";
$query=mysql_query($sql);
while($rowp=mysql_fetch_array($query))
{
	?>			
       
     
        <option value="<?php echo $rowp['id'];?>"><?php echo $rowp['name'];?></option>
        
        <?php } ?>
        
        
        
       </select>
      </div>
    </div>	
    
    
       <div class="form-group">
      <label class="control-label col-sm-3">Service Sub Category</label>
      <div class="col-sm-4">
       <div id="statediv">
       <select name="fname" id="fname" required class="form-control">
       <option value="">Select Service Sub Category</option>
             
       
</select>
</div>

      </div>
    </div>	     
              
              
             
    <div class="form-group">
      <label class="control-label col-sm-3" >Add Service Child Category</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" name="childname" id="childname" required>
      </div>
    </div>
    
    
    <div class="form-group">
      <label class="control-label col-sm-3">Optional Links</label>
      <div class="col-sm-4">
        <input type="text" name="optionallink" id="optionallink" class="form-control"  /> (Example - about-us)
      </div>
    </div> 
    
    
    <div class="form-group">
      <label class="control-label col-sm-3">Pageorder</label>
      <div class="col-sm-4">
        <input type="number" class="form-control" name="pageorder" id="pageorder" required>
      </div>
    </div>
    
    <div class="form-group">
      <label class="control-label col-sm-3" >Products Photo</label>
      <div class="col-sm-4">
        <input type="file" name="uploadphoto" id="uploadphoto"  />
      </div>
    </div>
    
    
	
	<div class="form-group">
      <label class="control-label col-sm-3">Category Description</label>
      <div class="col-sm-9">
         <textarea name="brief" id="brief">
</textarea>
                          <script type="text/javascript">
			CKEDITOR.replace( 'brief',
			 {
				filebrowserBrowseUrl : 'ckfinder/ckfinder.html',
				filebrowserImageBrowseUrl : 'ckfinder/ckfinder.html?type=Images',
				filebrowserFlashBrowseUrl : 'ckfinder/ckfinder.html?type=Flash',
				filebrowserUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
				filebrowserImageUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
				filebrowserFlashUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
			 } 
			 );			
			 </script>

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
      <label class="control-label col-sm-3" >Meta Title</label>
      <div class="col-sm-9">
        <textarea class="form-control" name="metatoptitle" id="metatoptitle" required></textarea>
      </div>
    </div>
    
    
    <div class="form-group">
      <label class="control-label col-sm-3" >Meta Keywords</label>
      <div class="col-sm-9">
        <textarea class="form-control" name="metakeywords" id="metakeywords" style="height:80px;"></textarea>
      </div>
    </div>
    
     <div class="form-group">
      <label class="control-label col-sm-3" >Meta Description</label>
      <div class="col-sm-9">
        <textarea class="form-control" name="metadescription" id="metadescription" style="height:80px;"></textarea>
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
