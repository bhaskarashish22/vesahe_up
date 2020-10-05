<?php include("admin/include/connection1.php");?>
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>About Us </title>

   <?php include("include/filescript.php");?>
   
   <link type="text/css" rel="stylesheet" href="<?=$urlroot;?>css/photoswipe.css">
	<link type="text/css" rel="stylesheet" href="<?=$urlroot;?>css/default-skin/default-skin.css">
	<link type="text/css" rel="stylesheet" href="<?=$urlroot;?>css/tiny-slider.css">
   
</head>

<body class="has-spotlight ashade-smooth-scroll no-top-padding">

 <?php include("include/header.php");?>

    
    <!-- Content -->
    <div class="ashade-page-title-wrap">
        <h1 class="ashade-page-title">
            <span>Who am I?</span>
            About us
        </h1>
    </div>


 <?php
$aboutresult = mysql_query("Select *from aboutus where id='1'");
?>
<?php $aboutusrow = mysql_fetch_array($aboutresult);?>  

    <main class="ashade-content-wrap">
		<div class="ashade-content-scroll">
			<div class="ashade-content">
				<!-- About Section for Desktop Layout Only -->
				<section class="ashade-section">
					<div class="ashade-row ashade-row-fullheight exclude-header">
						
                   <?php if($aboutusrow['imgstatus'] == 'Active' AND $aboutusrow['photo'] !="") { ?>        
                        
                        <!-- <div class="ashade-col col-6">
							
							
						</div> !-->
                        
                        
						<div class="ashade-col col-12"> 
							<h2>
								<span>About Us</span>
								<?=$aboutusrow['name'];?>
							</h2>
							
							<img src="<?=$urlroot;?>admin/uploads/aboutus/<?=$aboutusrow['photo'];?>" class="aboutus-img" alt="About Us">
							
							
							
							<?=$aboutusrow['brief'];?>
							
							
						</div>
                        
                        
                      <?php } else { ?>
                      
                      
                      <div class="ashade-col col-12">
							<h2>
								<span>About Us</span>
								<?=$aboutusrow['name'];?>
							</h2>
							
							<?=$aboutusrow['brief'];?>
							
						</div>
                      
                      
                      <?php } ?>  
                        
                        
                        
                        
					</div><!-- .ashade-row -->
				</section>

				
                <section class="ashade-section">
				<h2>
								
								Key Focus
							</h2>
					<div class="ashade-row">
						
						<div class="ashade-col col-12" style="padding-bottom:40px;">
						<h4>Concept</h4>
							<p>We decode your thought process into marvelous visuals of Reality. <b> from Design to Development </b> </p>
						</div>
						</div>
						
					<div class="ashade-row">
						<div class="ashade-col col-6">
						<h4><?=$aboutusrow['aboutheading1'];?></h4>
							<?=$aboutusrow['brief1'];?>
						</div>
						<div class="ashade-col col-6">
						<h4><?=$aboutusrow['aboutheading2'];?></h4>
							<?=$aboutusrow['brief2'];?>
						</div>
						
						<!--
						<div class="ashade-col col-4">
						<h4><?=$aboutusrow['aboutheading3'];?></h4>
							<?=$aboutusrow['brief3'];?>
						</div> !-->
					</div><!-- .ashade-row -->
				</section>

				
				<section class="ashade-section">
					<div class="ashade-row">
                        <div class="ashade-col col-12 align-center">
                        	<h3>
                        		<span>Where magic is happening</span>
                        		Showreel
                        	</h3>
                           <!-- <p class="ashade-intro">Here I like to show you photo processing. Sometimes you can not see result without direct comparsion. So I'll show you direct compare photo before and after processing, where I made retouching photo, removed background noise and improve color brightness.</p> !-->
							<p>&nbsp; </p>
                        </div><!-- .ashade-col -->
                    </div><!-- .ashade-row -->
					<div class="ashade-row">
                        <div class="ashade-col col-12">
                        	<div class="ashade-before-after" data-img-before="<?=$urlroot;?>img/showrel.jpg" data-img-after="<?=$urlroot;?>img/showrel.jpg">
                        		<img src="<?=$urlroot;?>img/showrel.jpg" alt="Photo Processing" width="1920" height="1280">
                        	</div><!-- .ashade-before-after -->
                        </div><!-- .ashade-col -->
                    </div><!-- .ashade-row -->
				</section>

				
				
			</div><!-- .ashade-content -->
			
		<?php include("include/footer.php");?>