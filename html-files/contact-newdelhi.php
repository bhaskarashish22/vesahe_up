<?php include("admin/include/connection1.php");?>
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Contact Us - New Delhi </title>

    <?php include("include/filescript.php");?>
</head>
<body class="has-spotlight ashade-smooth-scroll">

<?php include("include/header.php");?>


   
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
                            <p class="ashade-intro">Nice to meet you, friend! My name is Adrew Shade. I’m a professional photographer from Denver, Colorado. If you have any questions, suggestions or you just want to book a photo session feel free to use the contact form below. Lets make something great together!</p>
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
										<?=$socialdata['address'];?>
									</li>
									<li>
										<i class="ashade-contact-icon la la-phone"></i>
										<a href="tel:<?=$socialdata['phone'];?>"> <?=$socialdata['phone'];?> </a>
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
			
			<?php include("include/footer.php");?>