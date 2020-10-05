<?php include("admin/include/connection1.php");?>
<?php
$idm = $_GET['childpages'];
$presults = mysql_query("SELECT *FROM productchildcategory where childpages='$idm' and status='Active'");
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
      <title><?php if($count == 0) { ?> Sorry No Service Found <?php } else { ?> <?=$rows['metatoptitle'];?> <?php } ?> </title>
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
            <?=$rows['childname'];?>
        </h1>
    </div>

    <main class="ashade-content-wrap">
		<div class="ashade-content-scroll">
			<div class="ashade-content">
				<!-- About Section for Desktop Layout Only -->
				<section class="ashade-section">
					<div class="ashade-row ashade-row-fullheight exclude-header">
						
                        <?php if($rows[photo] !="") { ?>
                        <div class="ashade-col col-6">
							<h2>
								<span>vesahe </span>
								<?=$rows['childname'];?>

							</h2>
							
                           <?=$rows['brief'];?>
                           
						</div>
                        
                        
                        
						<div class="ashade-col col-6"> <!--  align-bottom hide-on-tablet-port hide-on-phone !-->
							<img src="<?=$urlroot;?>admin/uploads/products-childcategory/<?=$rows['photo'];?>">
						</div>
                        
                        <?php } else { ?>
                        
                        <div class="ashade-col col-12">
							<h2>
								<span>vesahe </span>
								<?=$rows['childname'];?>

							</h2>
							
                           <?=$rows['brief'];?>
                           
						</div>
                        
                        
                        <?php } ?>
                        
                        
					</div><!-- .ashade-row -->
				</section>

				
	
			</div><!-- .ashade-content -->
            
            <?php } ?>
			
			<?php include("include/footer.php");?>