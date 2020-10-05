<?php include("admin/include/connection1.php");?>
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Testimonials </title>

    <?php include("include/filescript.php");?>
</head>
<body class="has-spotlight ashade-smooth-scroll">

<?php include("include/header.php");?>
    
    <!-- Content -->
    <div class="ashade-page-title-wrap">
        <h1 class="ashade-page-title">
            <span>What my clients Say</span>
            Testimonials
        </h1>
    </div>

    <main class="ashade-content-wrap">
		<div class="ashade-content-scroll">
			<div class="ashade-content">
				<section class="ashade-section">       		
					<div class="ashade-row">
						<div class="ashade-col col-12">
							<h2 align="center">
								<span>Client's reviews</span>
								Testimonials
							</h2>
						</div>
						
					</div><!-- .ashade-row -->
				</section>

				<section class="ashade-section">
					<div class="ashade-row">
						<div class="ashade-col col-12">
							<div class="ashade-testimonials-grid is-masonry">
								
                                
                      <?php      
  $resulttestimonial=mysql_query("SELECT * FROM testimonialpages where ftestimonial='Active' order by pageorder asc");
  while($rowdata = mysql_fetch_array($resulttestimonial))
  {
  ?>                                       
                                
                                
                                <div class="ashade-testimonials-item">
									<div class="ashade-testimonials-item__author">
										<div class="ashade-testimonials-item__author--image">
											<?php if($rowdata['photo'] !="") { ?>
                                       <img src="<?=$urlroot;?>admin/uploads/testimonials/<?=$rowdata['photo'];?>" alt="<?=$rowdata['name'];?>">
                                    <?php } else { ?>
                                    
                                    <img src="<?=$urlroot;?>admin/uploads/aboutus/nophoto.jpg" alt="<?=$rowdata['name'];?>">
                                    <?php } ?>
										</div>
										<div class="ashade-testimonials-item__author--name">
											<h6>
												<span><?=$rowdata['designation'];?></span>
												<?=$rowdata['name'];?>
											</h6>
										</div>
									</div><!-- .ashade-testimonials-item__author -->
									<div class="ashade-testimonials-item__content">
										<!--<div class="ashade-testimonials-item__stars ashade-stars4"></div> !-->
										<br><?=$rowdata['brief'];?>
									</div>
								</div><!-- .ashade-testimonials-item -->
                                
                                
                                <?php } ?>
                                
                           
                             
                                
								
							</div><!-- .ashade-testimonials-grid -->
						</div><!-- .ashade-col -->
					</div><!-- .ashade-row -->
				</section>				
			</div><!-- .ashade-content -->
			
			<?php include("include/footer.php");?>