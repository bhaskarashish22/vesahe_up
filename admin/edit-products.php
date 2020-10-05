<?php include("include/header.php");?>
<?php
session_start();
$_SESSION['checkproductlist'] = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
?>

<?php
$id = $_GET['id'];
$result = mysql_query("Select *from productspages where id='$id'");
?>
<?php $row = mysql_fetch_array($result);
?>


<link rel="stylesheet" href="js/css3_3d.css"> 
	<script type="text/javascript" src="js/modernizr.js"></script>

<script>

if (!Modernizr.csstransforms) {
	$(document).ready(function(){
		$(".close").text("Back to top");
	});
}

</script>

<?php
if(isset($_POST['editgallery'])) 
{

$path = "$imgroot/uploads/";
$randval = mt_rand(1,109999);
	
$galleryid = $_POST['galleryid'];
$ext = explode('.', basename($_FILES['file']['name']));   // Explode file name from dot(.)

$file_extension = end($ext); // Store extensions in the variable.

//echo "$file_extension";

$colorname = $_POST['colorname'];
$photo_name = $_FILES['file']['name'];

$date = date("j F, Y");

if($photo_name == "")
{
 $sqlgallery = "update packagegallery set colorname = '$colorname', date = '$date' where id='$galleryid'";
				 $exegallery = mysql_query($sqlgallery);
				
				
				if($exegallery)
				{
				
				echo "<script>alert('Your Gallery Updated')</script>";
echo  "<script>"; 
	echo "location.href='edit-products.php?id=$id'";  
	echo  "</script>";	
	
				}
				
				else
				{
				echo "<script>alert('Your Gallery Not Updated')</script>";
echo  "<script>"; 
	echo "location.href='edit-products.php?id=$id'";  
	echo  "</script>";		
				}
				
}

else if ($file_extension == 'png' or  $file_extension == 'PNG' or  $file_extension == 'jpeg' or  $file_extension == 'JPEG' or  $file_extension == 'JPG' or  $file_extension == 'jpg' or $file_extension == 'gif' or $file_extension == 'GIF' )
	{



$del = $_POST['galleryphoto'];
$myfile="uploads/package-gallery/$del";
$myfile2="uploads/package-gallery-thum/$del";

unlink($myfile);
unlink($myfile2);



$photo_namenew = $galleryid.$randval.$photo_name;

$phot_tmp_name = $_FILES['file']['tmp_name'];

move_uploaded_file($phot_tmp_name,$path.$photo_namenew);

$url3 ="uploads/";
				 
				 $name3 = $photo_namenew;

				 $new_w = "512";

				 $new_h = "450";

				 $thumburl = "uploads/package-gallery-thum/";

				 createthumbnail($name3, $url3,$new_w,$new_h,$thumburl);
				 
				 
				 
				 $name3 = $photo_namenew;
				 $big_w = "800";
				 $big_h = "800";
				 $thumburl_big = "uploads/package-gallery/";
				 createthumbnail($name3, $url3,$big_w,$big_h,$thumburl_big);
				 
				 unlink("uploads/".$photo_namenew);
				 
				 $sqlgallery = "update packagegallery set photo = '$photo_namenew', colorname = '$colorname', date = '$date' where id='$galleryid'";
				 $exegallery = mysql_query($sqlgallery);
				
				
				if($exegallery)
				{
				
				echo "<script>alert('Your Gallery Updated')</script>";
echo  "<script>"; 
	echo "location.href='edit-products.php?id=$id'";  
	echo  "</script>";	
	
				}
				
				else
				{
				echo "<script>alert('Your Gallery Not Updated')</script>";
echo  "<script>"; 
	echo "location.href='edit-products.php?id=$id'";  
	echo  "</script>";		
				}

	
   
	}
	
	else
	{
	echo "<script>alert('Sorry $file_extension is invalid allowed extentions are:  jpeg JPEG JPG PNG gif GIF jpg png')</script>";
echo  "<script>"; 
	echo "location.href='edit-products.php?id=$id'";  
	echo  "</script>";		
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
    
    
    
    
    <SCRIPT type="text/javascript">
        function addRow(tableID) {
 
            var table = document.getElementById(tableID);
 
            var rowCount = table.rows.length;
            var row = table.insertRow(rowCount);
 
            var colCount = table.rows[0].cells.length;
 
            for(var i=0; i<colCount; i++) {
 
                var newcell = row.insertCell(i);
 
                newcell.innerHTML = table.rows[0].cells[i].innerHTML;
                //alert(newcell.childNodes);
                switch(newcell.childNodes[0].type) {
                    case "text":
                            newcell.childNodes[0].value = "";
                            break;
                    case "checkbox":
                            newcell.childNodes[0].checked = false;
                            break;
                    case "select-one":
                            newcell.childNodes[0].selectedIndex = 0;
                            break;
                }
            }
        }
 
        function deleteRow(tableID) {
            try {
            var table = document.getElementById(tableID);
            var rowCount = table.rows.length;
 
            for(var i=0; i<rowCount; i++) {
                var row = table.rows[i];
                var chkbox = row.cells[0].childNodes[0];
                if(null != chkbox && true == chkbox.checked) {
                    if(rowCount <= 1) {
                        alert("Cannot delete all the rows.");
                        break;
                    }
                    table.deleteRow(i);
                    rowCount--;
                    i--;
                }
 
 
            }
            }catch(e) {
                alert(e);
            }
        }
 
    </SCRIPT>
  
	

    
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Manage Products
       
       <!-- <small>Preview</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Manage Products </a></li>
        <li class="active">Edit Products</li>
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
              <h3 class="box-title">Edit Products </h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div class="col-md-10 col-md-offset-1">
			
              <form class="form-horizontal" method="Post" action="update-products.php?id=<?php echo $row['id'];?>" name="donation" enctype="multipart/form-data" onsubmit="return valid_donation();">
    
	<div class="msgpass"><?php echo $msg;?></div>
		
        
       
        	  
	<div class="form-group">
      <label class="control-label col-sm-2">Products Category</label>
      <div class="col-sm-4">
       <select name="productid" id="productid" class="form-control" onChange="getState(this.value)" required>
       <option value="">Select Products Category</option>
       
       <?php
$sql="select * from productcategory where status='Active' order by pageorder asc";
$query=mysql_query($sql);
while($rowp=mysql_fetch_array($query))
{
	?>				
        <option value="<?php echo $rowp['id'];?>"  <?php if ($row['pcname'] == $rowp['name']) echo ' selected="selected"'; ?>><?php echo $rowp['name'];?></option>
        
        <?php } ?>
        
       </select>
      </div>
    </div>	
    
     <div id="statediv">
     
     <?php if($row[fname] == "") { ?>
     
     <div class="form-group">
      <label class="control-label col-sm-2"> &nbsp;</label>
      
       <div class="col-sm-4">

<font color="#FF0000">  No Products Sub Category </font>
</div>
</div>
     
     
     <?php } else { ?>
     
    <div class="form-group">
      <label class="control-label col-sm-2">Products Sub Category</label>
      <div class="col-sm-4">
      
       <select name="fname" id="fname" required class="form-control">
         <option value="<?php echo $row['fname'];?>" selected="selected"><?php echo $row['fname'];?></option>
       <option value="">Select Products Sub Category</option>
             
       
</select>
</div>

      </div>
      
      <?php } ?>
      
      
    </div>	
      
           
        	  
			  
    <div class="form-group">
      <label class="control-label col-sm-2">Products Name</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="name" id="name" value="<?php echo $row['name'];?>" required>
        <input type="hidden" name="oldname" size="30" tabindex="1" value="<?php echo $row[name];?>">
		<input type="hidden" name="pages" size="30" tabindex="1" value="<?php echo $row[pages];?>">
        <input type="hidden" name="pcode" size="30" tabindex="1" value="<?php echo $row[pcode];?>">
      </div>
    </div>
    
    
     <div class="form-group">
      <label class="control-label col-sm-2">Optional Links</label>
      <div class="col-sm-4">
        <input type="text" name="optionallink" id="optionallink" value="<?php echo $row[optionallink];?>" class="form-control"  /> (Example - about-us)
      </div>
    </div>
	
    
    
    
    <!--
    
    <div class="form-group">
      <label class="control-label col-sm-2"> Price</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" name="price" id="price" value="<?php echo $row[price];?>" required>
      </div>
    </div>
    
    
    <div class="form-group">
      <label class="control-label col-sm-2"> Del Price</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" name="childprice" id="childprice" value="<?php echo $row[childprice];?>" required>
      </div>
    </div> !-->
    
    
   
   
	
	
	<div class="form-group">
      <label class="control-label col-sm-2" >Page Order</label>
      <div class="col-sm-4">
        <input type="number" class="form-control" name="pageorder" id="pageorder" value="<?php echo $row['pageorder'];?>" required>
      </div>
    </div>
    
    
    <!--
    <div class="form-group">
      <label class="control-label col-sm-2"> Video Link </label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="videolink" id="videolink" value="<?php echo $row['videolink'];?>">
      </div>
    </div>
    
    
    <div class="form-group">
      <label class="control-label col-sm-2"> Feature </label>
      <div class="col-sm-8">
       <div class="radio">
                    <label class="col-sm-2">
                      <input type="radio" name="feature" id="feature" <?php if ($row[feature] == 'Yes') echo ' checked'; else echo ' unchecked'; ?> value="Yes" required>
                     Yes
                    </label>
                    
                    <label class="col-sm-2">
                      <input type="radio" name="feature" id="feature" value="No" <?php if ($row[feature] == 'No') echo ' checked'; else echo ' unchecked'; ?> required>
                      No
                    </label>
                  </div>
      </div>
    </div>
    
    !-->
	
	
	
	<div class="form-group">
      <label class="control-label col-sm-2" >Products Photo</label>
      <div class="col-sm-10">
        <input type="file" name="uploadphoto" id="uploadphoto"  />
		<input type="hidden" name="ph" size="30" tabindex="1" value="<?php echo $row[photo];?>">
		
		
		<br>
		<?php
  if($row[photo] != "")
  {
  ?>
						
						
						
						<img src="<?php echo $urlroot;?>admin/uploads/products-thums/<?php echo $row[photo];?>" width="120" height="120" class="img" />
						
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
    </div>
	
	
	
    <div class="form-group">
     
      
  <label class="control-label col-sm-2">Image Status</label>
         <div class="col-sm-4">
           <select name="imgstatus" id="imgstatus" class="form-control">
						
						
	<option value="">Select Image Status </option>				
 
 <option value="Active" <?php if ($row[imgstatus] == 'Active') echo ' selected="selected"'; ?>>Active </option>
<option value="DeActive" <?php if ($row[imgstatus] == 'DeActive') echo ' selected="selected"'; ?>>DeActive </option>
  
	
						
						
						</select>
						
						
          
         
       </div>
      
      
      
      
     </div>
     
     
     
     
     
     
     
     <div class="form-group">
      <label class="control-label col-sm-2" >Products Gallery </label>
      <div class="col-sm-10">
       <input type="file" name="file[]" multiple accept="image/*" id="file">
      </div>
    </div>
    
    <div class="form-group">
      <label class="control-label col-sm-2" ></label>
      <div class="col-sm-12">
       <font color="green">For Multiple Images Add : - Ctrl + Select Images </font>
       <?php
						$ses_sql=mysql_query("select * from packagegallery where pcode='".$row['pcode']."'");

                        $countgallery=mysql_num_rows($ses_sql);
						
						?>
						
                        <?php if($countgallery ==0)
						{
						?>
                        <br><font color="red">&nbsp;&nbsp;&nbsp;&nbsp; No Product Gallery</font>
                        <?php
						}
						else
						{
							?>
						
                        <br><font color="red"> &nbsp;&nbsp;&nbsp;&nbsp; <?php echo $countgallery;?> Images </font>
                        
                        <?php } ?>
                        
						<?php
						
$i=0; 
while($rowgallery=mysql_fetch_assoc($ses_sql)) { 
	$i++;
  if($i%4 == '1')
  {
	echo "<div class='col-md-12' style='margin-bottom:1em;'></div>";
  }						
						
	?>					
						
    
    <div class="col-sm-2">
    <img src="<?php echo $urlroot;?>admin/uploads/package-gallery-thum/<?php echo $rowgallery[photo];?>" width="120" height="120" class="img" />
   <br>
    </div>
   
    
 <div class="col-sm-1">
 <br>
 <a href="#info<?php echo $rowgallery['id'];?>g" title="edit"><i class="fa fa-pencil"></i></a><br><br>
 
  <a class="" title="Delete - <?php echo $rowgallery['name'];?>" href="delete-package-gallery.php?id=<?php echo $rowgallery['id'];?>" onClick="return confirm('Are you sure?')"><i class="fa fa-trash-o" aria-hidden="true"></i> </a>
 </div>
                        
                        
      <?php } ?>                  
                        
                        
                        
                        
                        
                        
       
      </div>
    </div>
    
    
    <!--
     <div class="form-group">
      <label class="control-label col-sm-2">  Tag Lines</label>
      <div class="col-sm-10">
        <textarea class="form-control" name="tagline" id="tagline" required> <?php echo $row[tagline];?> </textarea>
      </div>
    </div> !-->
    
    
    
  
    
    
     
     
  
	
    
    
    
    <div class="form-group">
      <label class="control-label col-sm-2">Product Description</label>
      <div class="col-sm-10">
        
        <textarea name="brief" id="brief"> <?php echo $row['brief'];?>
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
    
    
    
    <!--
    
      <div class="form-group">
      <label class="control-label col-sm-2">Information </label>
      <div class="col-sm-10">
        
        <textarea name="cbrief" id="cbrief"> <?php echo $row['cbrief'];?>
</textarea>
                          <script type="text/javascript">
			CKEDITOR.replace( 'cbrief',
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
      <label class="control-label col-sm-2">Stone Sizes Description </label>
      <div class="col-sm-10">
        
        <textarea name="brief1" id="brief1"> <?php echo $row['brief1'];?>
</textarea>
                          <script type="text/javascript">
			CKEDITOR.replace( 'brief1',
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
      <label class="control-label col-sm-2">More Info</label>
      <div class="col-sm-10">
        
        <textarea name="brief2" id="brief2"> <?php echo $row['brief2'];?>
</textarea>
                          <script type="text/javascript">
			CKEDITOR.replace( 'brief2',
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
      !-->
    
    
    <div class="form-group">
      <label class="control-label col-sm-2" >Meta Title</label>
      <div class="col-sm-10">
        <textarea class="form-control" name="metatoptitle" id="metatoptitle" required> <?php echo $row['metatoptitle'];?> </textarea>
      </div>
    </div>
    
    
     <div class="form-group">
      <label class="control-label col-sm-2" >Meta Keywords</label>
      <div class="col-sm-10">
        <textarea class="form-control" name="metakeywords" id="metakeywords" style="height:80px;"> <?php echo $row['metakeywords'];?> </textarea>
      </div>
    </div>
    
     <div class="form-group">
      <label class="control-label col-sm-2" >Meta Description</label>
      <div class="col-sm-10">
        <textarea class="form-control" name="metadescription" id="metadescription" style="height:80px;"> <?php echo $row['metadescription'];?> </textarea>
      </div>
    </div>
    
    
    
    
    
    
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
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

<!-- Product Popup Details !-->
				 <ul id="information">
		
		<?php
						$ses_sql=mysql_query("select * from packagegallery where pcode='".$row['pcode']."'");
						
                        
                        while($rowgallery=mysql_fetch_array($ses_sql))
{
	?>
        	<li id="info<?php echo $rowgallery['id'];?>g">
            	<div>
               		<h3>Edit Gallery - <?php echo $rowgallery[name];?> </h3>

					<form class="form-light mt-20" action="" method="post" name="editgallery<?php echo $rowgallery['id'];?>" enctype="multipart/form-data">
					
                    <!-- <p> Colors Name </p>
                    
                    
                 <p>  <input type="text" name="colorname" id="colorname" value="<?php echo $rowgallery[colorname];?>" placeholder="Colour Name" class="form-control">  </p>   
                    
                    
					
					<p> !-->
					
					
    
					
    <input type="file" name="file" id="file">
    <input type="hidden" name="galleryphoto" id="galleryphoto" value="<?php echo $rowgallery['photo'];?>">
     <input type="hidden" name="galleryid" id="galleryid" value="<?php echo $rowgallery['id'];?>" required>
	
	
    
	 
					</p>
					
					
					<p>   <img src="<?php echo $urlroot;?>admin/uploads/package-gallery-thum/<?php echo $rowgallery[photo];?>" width="120" height="120" class="img" /> </p>
					
					
					
					
					
					
					<p> <button type="submit" class="btn btn-default" name="editgallery" id="submit">Edit Gallery </button></p>
</form>
			
					
					
					
                    <a href="#" class="close">x</a>            	</div>
				<span class="backface"></span>            </li>
				
				
				<?php } ?>
	
	
	</ul>




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
