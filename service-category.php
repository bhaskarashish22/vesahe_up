<?php include("admin/include/connection1.php");?>
<?php
$idm = $_GET['link'];
$presults = mysql_query("SELECT *FROM productcategory where pages='$idm' and status='Active'");
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

   <?php if($rows['id'] == '4') {?>
   
    <?php include("include/filescript-2.php");?>
	
   <?php } else { ?>
   
    <?php include("include/filescript.php");?>
	
	<?php } ?>
	
	
    
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

    <main class="ashade-content-wrap" <?php if($rows['id'] == '4') {?>style="background-color:#fff;" <?php } ?>>
		<div class="ashade-content-scroll">
			<div class="ashade-content">
				<!-- About Section for Desktop Layout Only -->
				<section class="ashade-section">
					<div class="ashade-row ashade-row-fullheight exclude-header">
						
                        <?php if($rows[photo] !="") { ?>
                        <div class="ashade-col col-6">
							<h2 <?php if($rows['id'] == '4') {?> style="color:#000;"<?php } ?>>
								<span>vesahe </span>
								<?=$rows['name'];?>

							</h2>
							
                           <?=$rows['brief'];?>
                           
						</div>
                        
                        
                        
						<div class="ashade-col col-6"> <!--  align-bottom hide-on-tablet-port hide-on-phone !-->
							<img src="<?=$urlroot;?>admin/uploads/products-banner/<?=$rows['photo'];?>">
						</div>
                        
                        <?php } else { ?>
                        
                        <div class="ashade-col col-12">
							<h2>
								<span>vesahe </span>
								<?=$rows['name'];?>

							</h2>
							
                           <?=$rows['brief'];?>
                           
						</div>
                        
                        
                        <?php } ?>
                        
                        
					</div><!-- .ashade-row -->
				</section>

				<section class="ashade-section">
				<h2>
								
								<!-- Key Focus -->
							</h2>
                            
                            
					<div class="ashade-row">
					
						
                      <?php
$sqlquery2=mysql_query("select * from productsubcategory where link='$rows[pages]' and status='Active' order by pageorder asc");
$countrows2=mysql_num_rows($sqlquery2);
?>  
     
     <?php
while($rowdata2=mysql_fetch_array($sqlquery2)) { ?>                   
                        <div class="ashade-col col-6" style="padding-top:10px;">
						<h4><a href="<?=$urlroot;?>service-sub-category.php?pages=<?=$rowdata2['pages'];?>"> <?=$rowdata2['fname'];?> </a></h4>
							
                        
                        
                         <?php
$sqlquery3=mysql_query("select * from productchildcategory where pages='$rowdata2[pages]' and status='Active' order by pageorder asc");
$countrows3=mysql_num_rows($sqlquery3);
?>  
     <?php if($countrows3 == 0) { ?>   <?php } else { ?>    
                            <ul>
                            
                            
							<?php
while($rowdata3=mysql_fetch_array($sqlquery3)) { ?>
												<li><a href="<?=$urlroot;?>service-child-category.php?childpages=<?=$rowdata3['childpages'];?>"><?=$rowdata3['childname'];?></a></li>
                                                
                                                <?php } ?>
								
								
							</ul>
                            
                            <?php } ?>
                            
                            
                            
						</div>
                        
                      <?php } ?>  
                        
                        
						
						</div>
                        
                        
						
				</section>
	
			</div><!-- .ashade-content -->
            
            <?php } ?>
			
			<?php include("include/footer.php");?>