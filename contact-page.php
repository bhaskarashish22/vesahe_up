<?php include("admin/include/connection1.php");?>
<?php
$idm = $_GET['pages'];
$presults = mysql_query("SELECT *FROM contactcategory where pages='$idm' and status='Active'");
?>

<?php $count=mysql_num_rows($presults);
if ($count == 0)
{
//header("Location: $urlroot"); 
//echo "$count";
}
?>

<?php $rows = mysql_fetch_array($presults);
?>

<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Contact Us - <?=$rows['name'];?> </title>

    <?php include("include/filescript.php");?>
</head>
<body class="has-spotlight ashade-smooth-scroll">

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
            <span>If You Have More Questions</span>
            Get in Touch
        </h1>
    </div>

    <main class="ashade-content-wrap">
		<div class="ashade-content-scroll">
			<div class="ashade-content">
				<section class="ashade-section">
					<div class="ashade-row">
                        <div class="ashade-col col-12">
                            <p class="ashade-intro">Need a pin or helicopter – no problem! All are readily available at ‘economy at scale’ pricing. And beside the actual hardware, we have technical staff to work with you and advise on your particular needs</p>
							
							
							
							
							<center>
								
								<h4> OFFICE LOCATION </h4>
						<select onchange="location = this.value;" style="background: none;
    border: 0;
    cursor: pointer;
    color:#808080;
    font-size: 14px;
    margin: 0;
	width: 20%;				
    position: relative;
    z-index: 1;">
							
									
							
							
						
  <option value="">Change Location</option>				
					<?php
								$sqlquery=mysql_query("select * from contactcategory where status='Active' order by pageorder asc");
while($rowdata=mysql_fetch_array($sqlquery)) { ?>

                            
	
  
    <option value="<?=$urlroot;?>contact-page.php?pages=<?=$rowdata['pages'];?>" <?php if($idm == $rowdata[pages]) { ?>selected<?php } ?>><?=$rowdata['name'];?></option>
              
                                <?php } ?>		
							
							 
    
</select>	
							
							</center>				
							
                     
							
							
						</div>
					</div>
				</section>
				<section class="ashade-section">
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
										<?=$rows['address'];?>
									</li>
									<li>
										<i class="ashade-contact-icon la la-phone"></i>
										<a href="tel:<?=$rows['phone'];?>"> <?=$rows['phone'];?> </a>
									</li>
									<li>
										<i class="ashade-contact-icon la la-envelope"></i>
										<a href="mailto:<?=$rows['email'];?>"><?=$rows['email'];?></a>
									</li>
									<li class="ashade-contact-socials">
										<i class="ashade-contact-icon la la-share-alt"></i>
										<a href="<?=$rows['facebook'];?>" target="_blank">Fb</a>
										<a href="<?=$rows['twitter'];?>" target="_blank">Tw</a>
										<a href="<?=$rows['instagram'];?>" target="_blank">In</a>
										<a href="<?=$rows['youtube'];?>" target="_blank">Yt</a>
									</li>
								</ul>
							</div><!-- .ashade-contact-details -->
						</div><!-- .ashade-col -->
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
						</div><!-- .ashade-col -->
					</div><!-- .ashade-row -->
				</section>
			</div><!-- .ashade-content -->
			
			<?php } ?>
			
			<?php include("include/footer.php");?>