<?php 
session_start(); 
include "connection.php"; 
include "cons.php";
include"header.php"; 
?>
<div class="container overview2">
	<div class="container overviewmidle">
		<div class="col-lg-12">
			<div class="col-lg-8 pull-left">
				<ol class="breadcrumb">
					<li><a href="#" class="jejak">Home</a></li>
					<li><a href="#" class="jejak">About Us</a></li>
					<li class="active jejak">Awards</li>
				</ol>
			</div>
			<div class="col-lg-4">
					<!-- Title Product -->	<h3 class="menu_awards">Awards</h3>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<div class="col-lg-4">
					<div class="box leftmenu">
						<div id='cssmenu'>
						<ul>
							<li class='active'><a href='http://<?php echo BASE_URL; ?>/company-background'><span>Company Background</span></a></li>
							<li><a href='http://<?php echo BASE_URL; ?>/certifications'><span>Certifications</span></a></li>
						<!--	<li class='last'><a href='http://<?php echo BASE_URL; ?>/awards'><span>Awards</span></a></li>-->
						</ul>
					</div>						
					</div>
					<div class="row kosong"></div>
						<div class="col-lg-12 leftbanner">
							<div class="col-lg-4">
								<div class="box">
								<?php $sql="SELECT * FROM banner ORDER BY Banner_id DESC"; 
										$query=mysql_query($sql);
										while($row=mysql_fetch_array($query))
										{
										?>
									<div class="box-gray banner">
										<img src="<?php echo BASE_URL; ?>/img/banner/<?php echo $row['Image']; ?>">
									</div>
									<div class="row kosong"></div>
									<?php } ?>									
								</div>
							</div>
						</div>
				</div>
					<div class="col-lg-8">
						<div class="box">
							<div class="box-gray overviewcontent">
										<section id="projects">
									<?php								
										$sql="SELECT * FROM awards ORDER BY Awards_id DESC";
										$query=mysql_query($sql); 
										while($data=mysql_fetch_array($query)) { ?> 
							<ul id="thumbs" class="portfolio">
						<!-- Item Project and Filter Name -->
						<li class="col-lg-3 design" data-id="id-0" data-type="web">
							<div class="item-thumbs">
							<!-- Fancybox - Gallery Enabled - Title - Full Image -->
							<a class="hover-wrap fancybox" data-fancybox-group="gallery" title="<?php echo $data['Title']; ?>" href="<?php echo BASE_URL; ?>/img/awards/<?php echo $data['Awards_image']; ?>">
							<span class="overlay-img"></span>
							<span class="overlay-img-thumb font-icon-plus"></span>
							</a>
							<!-- Thumb Image and Description -->
						<img src="<?php echo BASE_URL; ?>/img/awards/<?php echo $data['Awards_image']; ?>" alt="">
						
							
							</div>
						</li>
					</ul> 
							<?php } ?>
					</section>
					
							</div>
						</div>
					</div>
		<!-- divider -->
			</div>
		</div>
	</div>
	<?php include "footer.php";  ?>