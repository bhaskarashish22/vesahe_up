<?php include("admin/include/connection1.php");?>
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Team </title>

   <?php include("include/filescript.php");?>
   
</head>
<body class="has-spotlight ashade-smooth-scroll">

<?php include("include/header.php");?>

   
    <!-- Content -->
    <div class="ashade-page-title-wrap">
        <h1 class="ashade-page-title">
            <span>What I'm offering</span>
            Our Team
        </h1>
    </div>



    <main class="ashade-content-wrap">
		<div class="ashade-content-scroll">
			<div class="ashade-content">
				<section class="ashade-section">
					<div class="ashade-row">
						<div class="ashade-col col-12">
						<h2 class="ashade-page-title"  align="center">
            <span>Vesahe</span>
            Our Team
        </h2>
							
						</div>
					</div><!-- .ashade-row -->
				</section>
				
				<section class="ashade-section">
					<div class="ashade-row">
                        <div class="ashade-col col-12">
							<div class="ashade-service-card-grid">
							
                             <?php      
  $resultteam=mysql_query("SELECT * FROM teampages order by pageorder asc");
  while($rowdata = mysql_fetch_array($resultteam))
  {
  ?>                           	
                                
                                <div class="ashade-service-card">
									<div class="ashade-service-card__head">
										<div class="ashade-service-card__image">
											<?php if($rowdata['photo'] !="") { ?>
                                       <img src="<?=$urlroot;?>admin/uploads/team/<?=$rowdata['photo'];?>" alt="<?=$rowdata['name'];?>">
                                    <?php } else { ?>
                                    
                                    <img src="<?=$urlroot;?>admin/uploads/aboutus/nophoto.jpg" alt="<?=$rowdata['name'];?>">
                                    <?php } ?>
										</div>
										<div class="ashade-service-card__label">
											<h4>
												<span><?=$rowdata['cbrief'];?></span>
												<?=$rowdata['name'];?>
											</h4>
										</div>
									</div><!-- .ashade-service-card__head -->
									<div class="ashade-service-card__content">
										<?=$rowdata['brief'];?>
										
									</div>
								</div><!-- .ashade-service-card -->
                                
                                <?php } ?>
                                
								
								
								
								
								
							</div><!-- .ashade-service-card-grid -->
                        </div><!-- .ashade-col -->
                    </div><!-- .ashade-row -->
				</section>
				
			</div><!-- .ashade-content -->
			
			<?php include("include/footer.php");?>