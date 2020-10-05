 <!-- Footer -->

<style type="text/css">
	
	/* ved */
	
	
	select {
    border: 1px solid #d2d2d2;
    color: #666666;
    cursor: pointer;
    display: inline-block;
    font-size: 14px;
    font-weight: 300;
    height: 40px;
    padding: 8px 12px;
    width: 100%;
}

.goog-te-gadget .goog-te-combo {
    margin: 0px 0 !important;
}


#google_translate_element {
  color: Black;
  
}
#google_translate_element a {
  display: none;
}
select.google_translate_element {
  color: black;
}
div.goog-te-gadget {
  color:black;
  width:150px;
  display:inline-block;
  
}


body{ top: 0 !important;}
.goog-te-banner-frame{display: none !important;}

#goog-gt-tt, .goog-te-balloon-frame{display: none !important;} 
.goog-text-highlight { background: none !important; box-shadow: none !important;}
a#Div5.up:after{
      content: "\25BC";
   }
a#Div5.down:after{
      content: "\25B2";
   }

.goog-logo-link {
   display:none !important;
   
} 

.goog-te-gadget{
  color:#000;
  font-size:0px !important;
}
</style>





	<footer id="ashade-footer">
		<div class="ashade-footer-inner">
			<div class="ashade-footer__socials">
				<ul class="ashade-socials">
					<li><a href="<?=$socialdata['facebook'];?>" target="_blank">Fb</a> </li>
							<li><a href="<?=$socialdata['twitter'];?>" target="_blank">Tw</a></li>
							<li><a href="<?=$socialdata['instagram'];?>" target="_blank">In</a></li>
							<li><a href="<?=$socialdata['youtube'];?>" target="_blank">Yt</a></li>
					<!-- <li><a href="<?=$urlroot;?>">En</a></li>
					<li><a href="https://www.vesahe.com/china" target="_blank">Cn</a></li> !-->
					
					
					
				</ul>
			</div>
			
			
			<div class="ashade-footer__copyright">
			<div id="google_translate_element"></div>

 <script type="text/javascript">
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({ pageLanguage: 'en', includedLanguages: "zh-CN,en" }, 'google_translate_element');
        }
 </script>

 <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>   </div>
			
			
			<div style="display:none;">
<a target="_blank" alt="Website Designing Company in Delhi" href="https://www.firstpointwebdesign.com/website-design/">Website Design</a> By:  <a alt="Website Designing Company in India"target="_blank" href="https://www.firstpointwebdesign.com"><font style="color:rgb(103, 201, 224);">First Point Web Design</font></a> - <a alt="Film Production Website Designing Company" target="_blank" href="https://www.firstpointwebdesign.com/film-production-website-design/"><font style="color:rgb(103, 201, 224);">Film Production Web Designing Company in India</font></a>
			</div>
			<div class="ashade-footer__copyright">
				Copyright &copy; <?=date('Y');?>, All Rights Reserved
			</div>
		</div>
	</footer>

    
    
    
    <!-- Aside Bar -->
    <aside id="ashade-aside">
       	<a href="#" class="ashade-aside-close">Close Sidebar</a>
        <div class="ashade-aside-inner">
        	<div class="ashade-aside-content">
				<div class="ashade-widget ashade-widget--about">
					<div class="ashade-widget--about__head">
						<img src="img/general/owner-avatar.jpg" alt="Andrew Shade">
						<h5>
							<span>Photographer</span>
							Andrew Shade
						</h5>
					</div>
					<p>Nice to meet you, friend! My name is Andrew Shade. I am from Denver. Photography is my passion. Through the lens the world looks different and I would like to show you this difference.</p>
					<p class="align-right">
						<a href="<?=$urlroot;?>aboutus.php" class="ashade-learn-more">Learn More</a>
					</p>
				</div><!-- .ashade-widget -->
       			
				<div class="ashade-widget ashade-widget--contacts">
					<h5 class="ashade-widget-title">
						<span>My contacts and socials</span>
						How to find me
					</h5>
					<ul class="ashade-contact-details__list">
						<li>
							<i class="ashade-contact-icon la la-map-marker"></i>
							<?=$socialdata['address'];?>
						</li>
						<li>
							<i class="ashade-contact-icon la la-phone"></i>
							<a href="tel:<?=$socialdata['phone'];?>"><?=$socialdata['phone'];?></a>
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
					<p class="align-right">
						<a href="<?=$urlroot;?><?=$urlroot;?>contact-page.php?pages=new-delhi" class="ashade-learn-more">Get in touch</a>
					</p>
				</div><!-- .ashade-widget -->
       			
        	</div><!-- .ashade-aside-content -->
        </div><!-- .ashade-aside-inner -->
    </aside>

    <!-- UI Elements -->
    <div class="ashade-home-block-overlay"></div>
    <div class="ashade-menu-overlay"></div>
    <div class="ashade-aside-overlay"></div>
    <div class="ashade-cursor is-inactive">
    	<span class="ashade-cursor-circle"></span>
    	<span class="ashade-cursor-slider"></span>
    	<span class="ashade-cursor-close ashade-cursor-label">Close</span>
    	<span class="ashade-cursor-zoom ashade-cursor-label">Zoom</span>
    </div>

    <!-- SCRIPTS -->
    <script src="<?=$urlroot;?>js/jquery.min.js"></script>
    <script src="<?=$urlroot;?>js/gsap.min.js"></script>
    <script src="<?=$urlroot;?>js/masonry.min.js"></script>
    <script src="<?=$urlroot;?>js/core.js"></script>
    
    <script src="<?=$urlroot;?>js/jquery.lazy.min.js"></script>
    <script src="<?=$urlroot;?>js/tiny-slider.js"></script>
	<script src="<?=$urlroot;?>js/photoswipe.min.js"></script>
	<script src="<?=$urlroot;?>js/photoswipe-ui-default.min.js"></script>
    
    
</body>

</html>