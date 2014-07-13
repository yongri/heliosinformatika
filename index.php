<?php 
session_start();
include "connection.php"; 
include "cons.php";
include"header.php"; 
?>
<div class="container overviewindex">
	<div class="container overviewmidle">
		<div class="container topslider">
			<div class="row">
				<div class="col-lg-12 blue">
		<!-- Slider -->
			<div id="main-slider" class="flslidertopslider">
				<ul class="slides">
				  <li>
					<img class="pict" src="http://<?php echo BASE_URL; ?>/img/slides/banner1.jpg" alt="" />
				  </li>
				  <li>
					<img class="pict" src="http://<?php echo BASE_URL; ?>/img/slides/banner2.jpg" alt="" />
				  </li>
				  <li>
					<img class="pict" src="http://<?php echo BASE_URL; ?>/img/slides/hp_storage.jpg" alt="" />
				  </li>
				  <li>
					<img class="pict" src="http://<?php echo BASE_URL; ?>/img/slides/ramadhan.jpg" alt="" />
				  </li>
				</ul>
			</div>
		<!-- end slider -->
				</div>
			</div>
		</div>
		
<section id="content">
	<div class="container contentindex">
	
	<div class="row">
			<div class="col-lg-12 mid">
				<div class="row">
					<div class="col-lg-4 a1">
						<div class="box b1">
							<div class="box-gray aligncenter">
							
							<div class="panel panel-info">
							  <div class="panel-heading">
								<h3 class="panel-title titleindex">Events</h3>
							  </div>
							  <div class="panel-body">
								<?php 
								$sql="SELECT * FROM event WHERE Category_id='2' ORDER BY Event_id DESC LIMIT 1";
								$query=mysql_query($sql);
								$data=mysql_fetch_array($query);
								echo '<h4 class="titleindexmid">'.$data['Event_name']; echo '</h4>'; 
								echo '<p align="left">Place : '.$data['Location']; echo '</p>';
								echo '<p align="left">Date : '.$data['Start']; echo '</p>'; 
								echo '<p align="left">Time : '.$data['Time']; echo ' - '; echo $data['Finish']; 
								?>
								<a href="http://<?php echo BASE_URL; ?>/event_detail.php?&id=<?php echo $data['Event_id']; ?>"> ...Read More</a></p>
							  </div>
							</div>

							<!--	<div class="box-bottom">
									<h4 class="titleindex">Events</h4>
								</div>
								<?php 
								/*$sql="SELECT * FROM event WHERE Category_id='2' ORDER BY Event_id DESC LIMIT 1";
								$query=mysql_query($sql);
								$data=mysql_fetch_array($query);
								echo '<div align="center"><h4 class="titleindexmid">'.$data['Event_name']; echo '</h4></div>'; 
								echo '<p align="left">Place : '.$data['Location']; echo '</p>';
								echo '<p align="left">Date : '.$data['Start']; echo '</p>'; 
								echo '<p align="left">Time : '.$data['Time']; echo ' - '; echo $data['Finish']; echo'</p>'; */
								?>
								<a href="http://<?php echo BASE_URL; ?>/event_detail.php?&id=<?php echo $data['Event_id']; ?>">Read More</a>
								-->

							</div>
							
						</div>
					</div>
					<div class="col-lg-4 a2">
						<div class="box b2">
							<div class="box-gray aligncenter">
							<div class="panel panel-info">
							  <div class="panel-heading">
								<h3 class="panel-title titleindex">News</h3>
							  </div>
							  <div class="panel-body">
								<?php 
								 $sql="SELECT * FROM news WHERE Category_id='1' ORDER BY News_id DESC LIMIT 1";
								$query=mysql_query($sql);
								$data=mysql_fetch_array($query);
								echo '<h4 class="titleindexmid">'.$data['News_name']; echo '</h4>';  ?>
							<?php	 echo '<p align="justify">'.$data['Description'].'...'; echo '<a href="http://'.BASE_URL.'/press_detail.php?id='.$data['News_id'].'">Read More</a></p>';
							
								?>
							  </div>
							</div>
							
							
							
							
							<!--	<div class="box-bottom">
									<h4 class="titleindex">News</h4>
								</div>
								<?php 
								 $sql="SELECT * FROM news WHERE Category_id='1' ORDER BY News_id DESC LIMIT 1";
								$query=mysql_query($sql);
								$data=mysql_fetch_array($query);
								echo '<h4 class="service">'.$data['News_name']; echo '</h4>'; 
								echo '<p align="justify">'.$data['Description']; echo '</p>';
								?>
															
							</div>
							<div class="box-bottom">
								<a href="http://<?php echo BASE_URL; ?>/press_detail.php?id=<?php echo $data['News_id']; ?>">Read More</a>
							--></div>
						</div>
					</div>
					<div class="col-lg-4 a3">
						<div class="box b3">
							<div class="box-gray aligncenter">
							<div class="panel panel-info">
							  <div class="panel-heading">
								<h3 class="panel-title titleindex">About Helios</h3>
							  </div>
							  <div class="panel-body">
								<p align="justify">PT. Helios Informatika Nusantara (Helios) is an Enterprise Group Distributor of Hewlett Packard Technologies. Founded in 2014 as a member of PT. Computrade Technology International (CTI) Group of companies, Helios aims to be an IT infrastructure solution provider that meets the needs of both business partners and suppliers across Indonesia...<a href="http://<?php echo BASE_URL; ?>/overview.php">Read More</a></p>
								
							  </div>
							</div>
							
							
							
							<!--	<h4 class="service">About Helios</h4>
								<p align="justify">PT. Helios Informatika Nusantara (Helios) is an Enterprise Group Distributor of Hewlett Packard Technologies. Founded in 2014 as a member of PT. Computrade Technology International (CTI) Group of companies, Helios aims to be an IT infrastructure solution provider that meets the needs of both business partners and suppliers across Indonesia.</p>
							</div>
							<div class="box-bottom">
								<a href="http://<?php echo BASE_URL; ?>/overview.php">Read More</a>
							</div> -->
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- divider -->
		<div class="row">
			<div class="col-lg-12 line">
				<div class="solidline">
				</div>
			</div>
		</div>
		<!-- end divider -->
		<!-- Portfolio Projects -->
		<div class="row">
			<div class="col-lg-12 product">
				<div class="row">
					<section id="projects">
					<?php $sql="SELECT * FROM product ORDER BY Product_id DESC LIMIT 4";
					$query=mysql_query($sql);
					while($data=mysql_fetch_array($query))
					{
						$id=$data['Product_id'];
						$title=$data['Product_name'];
						$pict=$data['Product_image'];
						$content=$data['Content'];
					
					?>
					<ul id="thumbs" class="portfolio">
						<!-- Item Project and Filter Name -->
						<li class="col-lg-3 design" data-id="id-0" data-type="web">
							<div class="item-thumbs">
								<!-- Fancybox - Gallery Enabled - Title - Full Image -->
								<a class="hover-wrap fancybox" data-fancybox-group="gallery"  title="<?php echo $title; ?>" href="http://<?php echo BASE_URL; ?>/img/product/<?php echo $pict; ?>">
								<span class="overlay-img"></span>
								<span class="overlay-img-thumb font-icon-plus"></span>
								</a>
								<!-- Thumb Image and Description -->
								<img src="http://<?php echo BASE_URL; ?>/img/product/<?php echo $pict; ?>" alt="">
							</div>
						</li>
					</ul> 
					<?php } ?>
					</section>
				</div>
			</div>
		</div>
	</div>
	</section>
	</div>
	<?php include "footer.php"; ?>