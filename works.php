<?php include("admin/include/connection1.php");?>
<?php
$idm = $_GET['link'];
$presults = mysql_query("SELECT *FROM servicepages where link='$idm'");
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
   <title><?php if($count == 0) { ?> Sorry No Works Found <?php } else { ?> <?=$rows['fname'];?> <?php } ?> </title>
    <meta name="keywords" content="<?=$rows['fname'];?>" />
<meta name="description" content="<?=$rows['fname'];?>" />


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
           <span>Home</span>
            <?=$rows['fname'];?>
        </h1>
    </div>

    <main class="ashade-content-wrap">
		<div class="ashade-content-scroll">
			<div class="ashade-content">
				<section class="ashade-section">
					<div class="ashade-row">
					
						<div class="ashade-col col-12">
								<h3 align="center">
                        		<span>Home</span>
                        		<?=$rows['fname'];?>
                        	</h3>
							<!-- <p class="ashade-intro">Photography is my passion. Through the lens the world looks different and i would like to show you this difference. You can see it in my albums that are presented here.</p> !-->
						</div>
					</div>
				</section>
				<section class="ashade-section">
					<!--<div class="ashade-grid ashade-grid-2cols"> !-->
                    <div class="ashade-row">
                    
                       <?php
			include('admin/include/connection1.php');	// include your code to connect to DB.

	$tbl_name="servicepages";		//your table name
	// How many adjacent pages should be shown on each side?
	$adjacents = 3;
			$query = "SELECT COUNT(*) as num FROM $tbl_name where link='$idm' order by id desc";
	$total_pages = mysql_fetch_array(mysql_query($query));
	$total_pages = $total_pages[num];
	
	/* Setup vars for query. */
	$targetpage = "works.php?link=".$_GET['link']; 	//your file name  (the name of this file)
	
	$limit = 12; 								//how many items to show per page
	$page = $_GET['page'];
	if($page) 
		$start = ($page - 1) * $limit; 			//first item to display on this page
	else
		$start = 0;								//if no page var is given, set start to 0
	
	/* Get data. */
	$sql = "SELECT *from $tbl_name where link='$idm' order by id desc LIMIT $start, $limit";
	$result = mysql_query($sql);
    $count=mysql_num_rows($result);
	
	//while($rowdata=mysql_fetch_array($result)) { 
	
				 $i=0; 
while($rowdata=mysql_fetch_assoc($result)) { 
	$i++;
  if($i%3 == '1')
  {
	echo '</div> <div class="ashade-row">';
  }			 
				 
	
	?>            
                <div class="ashade-col col-4"> 
                    
						<div class="ashade-gallery-item ashade-grid-item">
							
							<a href="<?=$urlroot;?>works-detail.php?pages=<?=$rowdata['pages'];?>">
								<img src="<?=$urlrooot;?>admin/uploads/service/<?=$rowdata['photo'];?>" class="works-img" data-src="<?=$urlrooot;?>admin/uploads/service/<?=$rowdata['photo'];?>" alt="<?=$rowdata['name'];?>" class="lazy">
								
								<!-- width="1500" height="1200" !-->
								
							</a><br>
							<h5>
								<span><?=$rowdata['fname'];?></span>
										<?=$rowdata['name'];?>
								</h5>
						</div><!-- .ashade-gallery-item -->
			   
						</div>
                        
                        <?php } ?>
                        
						
						</div>
                       
                       
					<!--</div>!-->
					
					
					
					
					
					
					 <div class="col-md-12">
                        
                       <?php

	

	/* Setup page vars for display. */
	if ($page == 0) $page = 1;					//if no page var is given, default to 1.
	$prev = $page - 1;							//previous page is page - 1
	$next = $page + 1;							//next page is page + 1
	$lastpage = ceil($total_pages/$limit);		//lastpage is = total pages / items per page, rounded up.
	$lpm1 = $lastpage - 1;						//last page minus 1
	
	/* 
		Now we apply our rules and draw the pagination object. 
		We're actually saving the code to a variable in case we want to draw it more than once.
	*/
	$pagination = "";
	if($lastpage > 1)
	{	
		$pagination .= "<div class=\"pagination\">";
		//previous button
		if ($page > 1) 
			$pagination.= "<a href=\"$targetpage&page=$prev\"> « Previous</a>";
		else
			$pagination.= "<span class=\"disabled\">« Previous</span>";	
		
		//pages	
		if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
		{	
			for ($counter = 1; $counter <= $lastpage; $counter++)
			{
				if ($counter == $page)
					$pagination.= "<span class=\"current\">$counter</span>";
				else
					$pagination.= "<a href=\"$targetpage&page=$counter\">$counter</a>";					
			}
		}
		elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some
		{
			//close to beginning; only hide later pages
			if($page < 1 + ($adjacents * 2))		
			{
				for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage&page=$counter\">$counter</a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage&page=$lpm1\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage&page=$lastpage\">$lastpage</a>";		
			}
			//in middle; hide some front and some back
			elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
			{
				$pagination.= "<a href=\"$targetpage&page=1\">1</a>";
				$pagination.= "<a href=\"$targetpage&page=2\">2</a>";
				$pagination.= "...";
				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage&page=$counter\">$counter</a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage&page=$lpm1\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage&page=$lastpage\">$lastpage</a>";		
			}
			//close to end; only hide early pages
			else
			{

				$pagination.= "<a href=\"$targetpage&page=1\">1</a>";
				$pagination.= "<a href=\"$targetpage&page=2\">2</a>";
				$pagination.= "...";
				for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage&page=$counter\">$counter</a>";					
				}
			}
		}
		
		//next button
		if ($page < $counter - 1) 
			$pagination.= "<a href=\"$targetpage&page=$next\">Next »</a>";
		else
			$pagination.= "<span class=\"disabled\">Next » </span>";
		$pagination.= "</div>\n";		
	}
?>

	

<?=$pagination?>


</div>
                        
                        
					
					
					
				</section>
				
				
				
			
				
				
			</div><!-- .ashade-content -->
            
            <?php } ?>
			
			<?php include("include/footer.php");?>