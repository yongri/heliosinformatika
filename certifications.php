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
					<li class="active">Certifications</li>
				</ol>
			</div>
			<div class="col-lg-4">
					<!-- Certificate_name Product -->	<h3 class="menu_certifications">Certifications</h3>
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
										<img src="http://<?php echo BASE_URL; ?>/img/banner/<?php echo $row['Image']; ?>">
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
										$sql="SELECT Certificate_name FROM certificate";
										$query=mysql_query($sql); 
										while($data=mysql_fetch_array($query)) { ?> 
										<?php echo $data['Certificate_name']; ?>
							<?php } ?>
					</section>
							</div>
						</div>
					</div>
		<!-- divider -->
			</div>
		</div>
	</div>
	<?php include "footer.php"; ?>