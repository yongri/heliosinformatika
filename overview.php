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
					<li class="active">Company Background</li>
				</ol>
			</div>
			<div class="col-lg-4">
					<!-- Title Product -->	<h3 class="menu_overview">Company Background</h3>
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
							<div class="box-gray overviewmanajemen">
								<div class="row">
									<div class="col-lg-12">
										<?php 
											$sql=("SELECT * FROM overview WHERE Overview_id='1'") or die (mysql_error());
											$query=mysql_query($sql);
											$data=mysql_fetch_array($query); 
										?>
										<?php echo $data['Description']; ?><br/>
									</div>
								</div>
							</div><br/><br/>
								<div class="box-gray overviewdirector">
									
										<h3 class="directorside">Managements</h3><hr>
										<br/>
									
									<div class="media">
									  <a class="pull-left" href="#">
										<img class="" src="http://<?php echo BASE_URL; ?>/img/profile/<?php echo $data['Overview_image']; ?>" alt="">
									  </a>
									  <div class="media-body pull-left">
												<h3 class="media-heading detail3">Deddy Sudja</h3>
												<p>President Director of PT. Helios Informatika Nusantara</p>
								
									  </div>
									</div>
										<div class="media">
										  <a class="pull-left" href="#">
											<img class="" src="http://<?php echo BASE_URL; ?>/img/profile/<?php echo $data['Overview_image2']; ?>" alt="">
										  </a>
										  <div class="media-body pull-left">
													<h3 class="media-heading detail3">Royani Lo</h3>
													<p>Director of PT. Helios Informatika Nusantara</p>
									
										  </div>
										</div>
								</div>
						</div>
						
					</div>
			</div>
		</div>
	</div>
	<?php include "footer.php";  ?>