<?php include('include/lock.php');

$location=intval($_GET['location']);

$query="SELECT * from productsubcategory where pid='$location' order by pageorder asc";
$result=mysql_query($query);
$count = mysql_num_rows(result);
if($count = 0) { ?> <?php } else { ?>


<select name="fname" id="fname" class="form-control" onChange="getChild(this.value)" required>
<option value="">Select Service Sub Category</option>
<?php while ($row=mysql_fetch_array($result)) { ?>
<option value="<?php echo $row['id']?>"><?php echo $row['fname']?></option>
<?php } ?>
</select>


<?php } ?>