<?php include("admin/include/connection1.php");?>
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>VESAHE - FILM SOLUTION</title>
<?php include("include/filescript.php");?>
   
</head>



<body class="ashade-home-template has-spotlight ashade-smooth-scroll">
    
 <?php include("include/header.php");?>
 
 <?php
  $i=1;
  $resultslide=mysql_query("SELECT * FROM homeslide where cname='Active' order by rand() limit 1");
  while($rowslide = mysql_fetch_array($resultslide)) { ?>
    
    <!-- Home Background -->
	<div class="ashade-home-background ashade-page-background is-image" data-src="<?=$urlroot;?>admin/uploads/slide/<?=$rowslide['photo'];?>"></div>
	
    <?php $i++; } ?>
    
	<!-- Home Links and Titles -->
	<div class="ashade-home-link--works ashade-home-link-wrap">
		<div class="ashade-home-link is-link">
			<span>My Photo Portfolio</span>
			<span>Explore Works</span>
		</div>
	</div><!-- .ashade-home-link-wrap -->
	
	
	<div class="ashade-home-link--contacts ashade-home-link-wrap">
		<div class="ashade-home-link is-link">
			<span>How to find me</span>
			<span>Contact Me</span>
		</div>
	</div><!-- .ashade-home-link-wrap -->
   
   <!-- Home Title and Back Button -->
    <div class="ashade-page-title-wrap is-inactive ">
        <h1 class="ashade-page-title">&nbsp;</h1>
    </div><!-- .ashade-page-title-wrap -->
    
    <div class="ashade-home-return ashade-back-wrap is-inactive">
        <div class="ashade-back is-home-return">
            <span>Return</span>
            <span>Back</span>
        </div>
    </div><!-- .ashade-to-top-wrap -->
    
   
   
    <?php
$contactresult = mysql_query("Select *from contactcategory where id='1'");
$socialdata = mysql_fetch_array($contactresult);
?>           
   
    <!-- Home Contacts Block -->
    <div id="ashade-home-contacts">
		<div class="ashade-row">
			<div class="ashade-col col-12">
				<p class="ashade-intro">Nice to meet you, friend! My name is Adrew Shade. I’m a professional photographer from Denver, Colorado. If you have any questions, suggestions or you just want to book a photo session feel free to use the contact form below. Lets make something great together!</p>
			</div>
		</div><!-- .ashade-row -->
		<div class="ashade-row">
			<div class="ashade-col col-4">
				<div class="ashade-contact-details">
					<h4 class="ashade-contact-details__title">
						<span>My Contacts and Socials</span>
						How to Find Me
					</h4>
					<ul class="ashade-contact-details__list">
						<li>
							<i class="ashade-contact-icon la la-map-marker"></i>
							<?=$socialdata['address'];?>
						</li>
						<li>
							<i class="ashade-contact-icon la la-phone"></i>
							<a href="tel:<?=$socialdata['phone'];?>"><?=$socialdata['phone'];?> </a>
						</li>
						<li>
							<i class="ashade-contact-icon la la-envelope"></i>
							<a href="mailto:<?=$socialdata['email'];?>"><?=$socialdata['email'];?></a>
						</li>
						<li class="ashade-contact-socials">
							<i class="ashade-contact-icon la la-share-alt"></i>
							<a href="<?=$socialdata['facebook'];?>" target="_blank">Fb</a>
							<a href="<?=$socialdata['twitter'];?>" target="_blank">Tw</a>
							<a href="<?=$socialdata['instagram'];?>" target="_blank">In</a>
							<a href="<?=$socialdata['youtube'];?>" target="_blank">Yt</a>
						</li>
					</ul>
				</div><!-- .ashade-contact-details -->
			</div>
			<div class="ashade-col col-8">
				<form action="#" method="post" class="ashade-contact-form">
					<div class="ashade-row ashade-small-gap">
						<div class="ashade-col col-4">
							<input type="text" id="name" name="name" placeholder="Your Name" required>
						</div>
						<div class="ashade-col col-4">
							<input type="email" id="email" name="email" placeholder="Your Email" required>
						</div>
						<div class="ashade-col col-4">
							<input type="tel" id="phone" name="phone" placeholder="Your Phone" required>
						</div>
					</div>
					<textarea name="message" id="message" placeholder="Your Message" required></textarea>
					<div class="ashade-contact-form__footer">
						<div class="ashade-contact-form__response"></div>
						<div class="ashade-contact-form__submit">
							<input type="submit" value="Send Message">
						</div>
					</div>
				</form>
			</div>
		</div>
    </div><!-- #ashade-home-contacts -->
    
    
    
    
    
    <!-- Home Works Block -->
    <div id="ashade-home-works">
    	<div class="ashade-row">
    		<div class="ashade-col col-12">
    			<!-- <p class="ashade-intro">Photography is my passion. Through the lens the world looks different and i would like to show you this difference. You can see it in my albums that are presented here.</p> !-->
				<div class="ashade-albums-grid ashade-grid ashade-grid-3cols is-masonry">
					
					<?php
								$sqlquery=mysql_query("select * from servicepages where fservice='Yes' order by rand()");
while($rowdata=mysql_fetch_array($sqlquery)) { ?>   
					
					<div class="ashade-album-item ashade-grid-item">
						<div class="ashade-album-item__image">
							<img src="<?=$urlroot;?>admin/uploads/service/<?=$rowdata['photo'];?>" alt="<?=$rowdata['name'];?>">
						</div>
						<h5>
							<span><?=$rowdata['fname'];?></span>
							<?=$rowdata['name'];?>
						</h5>
						<a href="<?=$urlroot;?>works-detail.php?pages=<?=$rowdata['pages'];?>" class="ashade-album-item__link"></a>
					</div><!-- .ashade-album-item -->
					
					<?php } ?>
					
					
					
					
				</div><!-- .ashade-albums-grid -->
			</div><!-- .ashade-col -->
		</div><!-- .ashade-row -->
    </div><!-- #ashade-home-works -->

   <?php include("include/footer.php");?>