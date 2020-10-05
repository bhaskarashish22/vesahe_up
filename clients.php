<?php include("admin/include/connection1.php");?>
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Clients</title>

<?php include("include/filescript-2.php");?>
    
</head>
<body class="has-spotlight ashade-smooth-scroll no-top-padding">

<?php include("include/header.php");?>

    
    <!-- Content -->
    <div class="ashade-page-title-wrap">
        <h2 class="ashade-page-title">
            <span>Vesahe</span>
            Our Clients
        </h2>
    </div>

    <main class="ashade-content-wrap" style="background-color:#fff;">
		<div class="ashade-content-scroll">
			<div class="ashade-content">
				<!-- About Section for Desktop Layout Only -->
				<h2 align="center" style="color:#000;">
								<span>Vesahe</span>
								Our Clients
							</h2>
				

				 <section class="ashade-section">
					<div class="ashade-row ashade-keep-on-tablet"> 
					
                       
                       <?php
					   $sqlquery=mysql_query("select * from clientpages order by pageorder asc");
//while($rowdata=mysql_fetch_array($sqlquery)) { ?>

	  <?php
$i=0; 
while($rowdata=mysql_fetch_assoc($sqlquery)) { 
	$i++;
  if($i%5 == '1')
  {
	echo '<!--<section class="ashade-section">
					<div class="ashade-row ashade-keep-on-tablet">!-->';
  }
	else if($i%4 == '1') {
		echo '</div>
				</section> <section class="ashade-section">
					<div class="ashade-row ashade-keep-on-tablet">';
	}
	
	else
	{
	echo '';	
	}
?>								
						
						
 
                        <div class="ashade-col col-3">
							<div class="ashade-service-card__image">
											<center><img src="<?php echo $urlroot;?>admin/uploads/clients/<?php echo $rowdata[photo];?>" alt="<?php echo $rowdata[name];?>"> </center>
										</div>
						</div><!-- .ashade-col -->
                        <?php } ?>
                        
						
                      </div>
				</section> 
						
					
				
				
				
				
				

				

				
			</div><!-- .ashade-content -->
			
			<?php include("include/footer.php");?>