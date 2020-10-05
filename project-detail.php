<?php include("admin/include/connection1.php");?>
<?php
$idm = $_GET['pages'];
$presults = mysql_query("SELECT *FROM projectpages where pages='$idm'");
?>

<?php $count=mysql_num_rows($presults);
if ($count == 0)
{
//header("Location: $urlroot"); 
//echo "$count";
}
?>

<?php $rows = mysql_fetch_array($presults)
?>
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title><?php if($count == 0) { ?> Sorry No Project Found <?php } else { ?> <?=$rows['metatoptitle'];?> <?php } ?> </title>
    <meta name="keywords" content="<?=$rows['metakeywords'];?>" />
<meta name="description" content="<?=$rows['metadescription'];?>" />


    <?php include("include/filescript.php");?>
	
	
    
</head>
<body class="has-spotlight ashade-smooth-scroll no-top-padding">

<?php include("include/header.php");?>

 

<?php if ($count == 0) { ?>
   
   <main class="ashade-content-wrap">
 <div class="ashade-content-scroll">
			<div class="ashade-content">
   <section class="ashade-section">
   <div class="col-md-12" style="padding-top:10px; text-align:center;">       
                         
						 <center> <img src="<?=$urlroot;?>img/404.png"> </center>
						 
						 <h3>Not     <b class="traveller_text_b"> Found </b></h3>
							
							
	<p>
						Sorry, but the page you were trying to view does not exist.<br>
						It looks like this was the result of either:
						
							<ul style="list-style-type:none;">
						<li>a mistyped address  </li>
							<li>an out-of-date link </li>
							
							</ul>
				

<a href="<?=$urlroot;?>" class="btn btn-danger"> Click Here To Home Page </a>


</p>

                          
                          </div>
						  
						  </section>
						  
						  </div> 
 
   
   <?php } else { ?>
   
   
 

    
    <!-- Content -->
    <div class="ashade-page-title-wrap">
        <h1 class="ashade-page-title">
            <span>vesahe</span>
            <?=$rows['name'];?>
        </h1>
    </div>

    <main class="ashade-content-wrap">
		<div class="ashade-content-scroll">
			<div class="ashade-content">
				<!-- About Section for Desktop Layout Only -->
				<section class="ashade-section">
					<div class="ashade-row ashade-row-fullheight exclude-header">
						
                        <?php if($rows[photo] !="" and $rows[imgstatus] = 'Active') { ?>
                        <div class="ashade-col col-6">
							<h2>
								<span>vesahe </span>
								<?=$rows['name'];?>

							</h2>
							
                           <?=$rows['brief'];?>
                           
						</div>
                        
                        
                        
						<div class="ashade-col col-6"> <!--  align-bottom hide-on-tablet-port hide-on-phone !-->
							<img src="<?=$urlroot;?>admin/uploads/projects/<?=$rows['photo'];?>">
							
							<?php if($rows[videolink] !=""){?>
							<br>
							<center> <a href="#" id="myBtn" class="btn btn-primary"><h4> Watch Video </h4> </a> </center>
							
							<!-- The Modal -->
<div id="myModal" class="modal" style="padding-top:120px;">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
   <h4 style="color:#000;"> Watch Video </h4>
							
							<div class="player player-small embed-responsive embed-responsive-16by9"> 

				    <iframe src='<?=$rows['videolink'];?>' class="embed-responsive-item" style="width:100%; height:340px; " frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen scrolling='no'></iframe> </div>
  </div>

</div>



<script type="text/javascript">
	// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}


</script>
							
							
							
							
							
							<?php } ?>
							
							
							
						</div>
                        
                        <?php } else { ?>
                        
                        <div class="ashade-col col-12">
							<h2>
								<span>vesahe </span>
								<?=$rows['name'];?>

							</h2>
							
                           <?=$rows['brief'];?>
						   
						   <?php if($rows[videolink] !=""){?>
							<br>
							<h4> Youtube Video </h4>
							
							<div class="player player-small embed-responsive embed-responsive-16by9"> 

				    <iframe src='<?=$rows['videolink'];?>' class="embed-responsive-item" style="width:100%; height:320px; " frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen scrolling='no'></iframe> </div> 
							
							<?php } ?>
                           
						</div>
                        
                        
                        <?php } ?>
                        
                        
					</div><!-- .ashade-row -->
				</section>

				
	
			</div><!-- .ashade-content -->
            
            <?php } ?>
			
			<?php include("include/footer.php");?>