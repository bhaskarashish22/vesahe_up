<!-- Header -->
<?php include("ip-location-check.php");?>


 <?php
$contactresult = mysql_query("Select *from contactcategory where id='1'");
$socialdata = mysql_fetch_array($contactresult);
?>          


 <?php
$bannerresult = mysql_query("Select *from bannerpage where id='1'");?>
<?php $bannerrow = mysql_fetch_array($bannerresult);?> 

	<header id="ashade-header">
        <div class="ashade-header-inner">
            <div class="ashade-logo-block">
                <a href="<?=$urlroot;?>" class="ashade-logo is-retina">
                	<img src="<?php echo $urlroot;?>admin/banner/<?php echo $bannerrow['photo'];?>" alt="Vesahe" width="300" height="110">
                </a>
            </div>
            <div class="ashade-nav-block">
                <nav class="ashade-nav">
                    <ul class="main-menu">
                        <li class="menu-item-has-children">
                            <a href="<?=$urlroot;?>">Home</a>
                           
                        </li>
						<li class="menu-item-has-children">
                            <a href="<?=$urlroot;?>aboutus.php">About Us</a>
                           
                        </li>
                        
                        
                        
                        
						<li class="menu-item-has-children">
                            <a href="#">Services</a>
                            <ul class="sub-menu">
                                
                                <?php
								$sqlquery=mysql_query("select * from productcategory where status='Active' order by pageorder asc");
while($rowdata=mysql_fetch_array($sqlquery)) { ?>

<?php
$sqlquery2=mysql_query("select * from productsubcategory where link='$rowdata[pages]' and status='Active' order by pageorder asc");
$countrows2=mysql_num_rows($sqlquery2);
?>
            
            
       <?php if($countrows2 == 0) { ?>
       
       <li><a href="<?=$urlroot;?>service-category.php?link=<?=$rowdata['pages'];?>"><?=$rowdata['name'];?></a></li>
       
       
       <?php } else { ?>    
            
                                <li class="menu-item-has-children">
                                    <a href="<?=$urlroot;?>service-category.php?link=<?=$rowdata['pages'];?>"><?=$rowdata['name'];?></a>
                                    <ul class="sub-menu">
                      
                                    
                                   <?php
while($rowdata2=mysql_fetch_array($sqlquery2)) { ?>


  
                                    		 
                                                 
     <?php
$sqlquery3=mysql_query("select * from productchildcategory where pages='$rowdata2[pages]' and status='Active' order by pageorder asc");
$countrows3=mysql_num_rows($sqlquery3);
?>  
     <?php if($countrows3 == 0) { ?>
		
  
                                  
      <li><a href="<?=$urlroot;?>service-sub-category.php?pages=<?=$rowdata2['pages'];?>"><?=$rowdata2['fname'];?></a> </li>
																	
														
     
      <?php } else { ?>
      
     
      
   <li><a href="<?=$urlroot;?>service-sub-category.php?pages=<?=$rowdata2['pages'];?>"><?=$rowdata2['fname'];?></a>
		

                                          <ul class="sub-menu">
                                           <?php
while($rowdata3=mysql_fetch_array($sqlquery3)) { ?>
												<li><a href="<?=$urlroot;?>service-child-category.php?childpages=<?=$rowdata3['childpages'];?>"><?=$rowdata3['childname'];?></a></li>
                                                
                                                <?php } ?>
												
												</ul>
                                                
                                              
                                              </li>
                                        
								 
                                      
                                         <?php } ?>       
                                                
                                          
										
                                        
                                        <?php } ?>
                                        
                                          </ul> 
                                        
                                        </li>      
                                        
                                        
                                        <?php } ?>
                                        
                                       <?php } ?> 
                                       
                                        </ul>
                                        
                                        </li>
                                        
                                        
                                
                           
                        <li class="menu-item-has-children">

                            <a href="<?=$urlroot;?>team.php">Team</a>
                            
                        </li>
						<li class="menu-item-has-children">
                            <a href="#">Works</a>
                            <ul class="sub-menu">
							 <?php
								$sqlquery=mysql_query("select * from collcategory where status='Active' order by pageorder asc");
while($rowdata=mysql_fetch_array($sqlquery)) { ?>   
                                <li><a href="<?php echo $urlroot;?>works.php?link=<?=$rowdata['pages'];?>"><?=$rowdata['name'];?></a></li>
                              <?php } ?>
                            </ul> 
  						</li>
                        
						
                        <li><a href="#">Projects</a>
						<ul class="sub-menu">
                                
                           <?php
								$sqlquery=mysql_query("select * from addcategory where status='Active' order by pageorder asc");
while($rowdata=mysql_fetch_array($sqlquery)) { ?>     
                                <li><a href="#"><?=$rowdata['name'];?></a>
									
              <?php
$sqlquery2=mysql_query("select * from subcategory where link='$rowdata[pages]' and status='Active' order by pageorder asc");
$countsubproject=mysql_num_rows($sqlquery2);
?>                      
                         <?php if($countsubproject == 0) { ?> <?php } else { ?>

                                    <ul class="sub-menu">
                                    <?php
									while($rowdata2=mysql_fetch_array($sqlquery2)) { ?>   
										<li><a href="<?php echo $urlroot;?>projects.php?pclink=<?=$rowdata['pages'];?>&link=<?=$rowdata2['pages'];?>"><?=$rowdata2['name'];?></a></li>
                                        
                                        <?php } ?>
										
									</ul> 
                                    
                                    <?php } ?>
								
								</li>
                                
                                <?php } ?>
                                
                               
                                
                            </ul> 
						</li>
                        
                        
						<li><a href="<?=$urlroot;?>clients.php">Clients</a></li>
						 <li><a href="<?=$urlroot;?>testimonials.php">Testimonials</a></li>
						 
                         
                         <li class="menu-item-has-children">
                            <a href="#">Contacts</a>
                            <ul class="sub-menu">
                             <?php
								$sqlquery=mysql_query("select * from contactcategory where status='Active' order by pageorder asc");
while($rowdata=mysql_fetch_array($sqlquery)) { ?>

                                <li><a href="<?=$urlroot;?>contact-page.php?pages=<?=$rowdata['pages'];?>"><?=$rowdata['name'];?></a></li>
                                
                                <?php } ?>
                               
								
                            </ul> 
  						</li>
                         
                         
                       <!-- 
                        <li>
							<a href="#" class="ashade-aside-toggler">
								<span class="ashade-aside-toggler__icon01"></span>
								<span class="ashade-aside-toggler__icon02"></span>
								<span class="ashade-aside-toggler__icon03"></span>
							</a>
                        </li>  !-->
                    </ul>
                </nav>
            </div>
        </div>
    </header>