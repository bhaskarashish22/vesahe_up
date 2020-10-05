<?php include('include/lock.php');

$location=$_GET['location'];

$query="SELECT * from subcategory where link='$location' and status='Active' order by pageorder asc";
$result=mysql_query($query);

?>

 <div class="form-group">
                    <label  class="col-sm-2 control-label">Select Category :</label>
                    
                    <div class="col-sm-5">

<select name="fname" id="fname" class="form-control" required>
<option value="">Select Sub Category</option>
<?php while ($row=mysql_fetch_array($result)) { ?>
<option value="<?php echo $row['name']?>"><?php echo $row['name']?></option>
<?php } ?>
</select>

  </div>
                  </div>