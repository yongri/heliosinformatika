<?php session_start(); 

	include "connection.php"; 
	include "cons.php"; 
	include"header.php"; ?>
<div class="container overviewevent">
	<div class="container overviewmidle">
		<div class="col-lg-12">
			<div class="col-lg-8 pull-left">
				<ol class="breadcrumb">
					<li><a href="#" class="jejak">Home</a></li>
					<li class="active" class="jejak">Promotions</li>
				</ol>
			</div>
			<div class="col-lg-4">
					<!-- Title Product -->	<h3 class="promotion">End User Promotions</h3>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<div class="col-lg-4">
					<div class="box leftmenu">
						<div id='cssmenu'>
						<ul>
						<?php $sql1=("SELECT * FROM promo WHERE Category_id='2' ORDER BY Promo_id DESC") or die (mysql_error());
								$query1=mysql_query($sql1);
								while($data1=mysql_fetch_array($query1))
								{
								$promo_id	=$data1['Promo_id'];
											 if($promo_id > 0){
								?>
							<li class='active'><a href='http://<?php echo BASE_URL; ?>/promo_eu_detail.php?id=<?php echo $data1['Promo_id']; ?>'><span><?php echo $data1['Title']; ?></span><br/><br/><span><em><?php echo date('d M Y',strtotime($data1['Start'])); ?><?php echo " - "; ?><?php echo date('d M Y',strtotime($data1['End'])); ?></em></span></a></li>
						<?php } 
						else{
											echo "<span>>No Promo</span>";
											}
						 } ?>
						</ul>
					</div>								
					</div>
					<div class="row kosong"></div>
						<div class="col-lg-12 leftbanner">
							<div class="col-lg-4">
								<div class="box">
								<?php $sql2="SELECT * FROM banner ORDER BY Banner_id DESC"; 
										$query2=mysql_query($sql2);
										while($data2=mysql_fetch_array($query2))
										{
										?>
									<div class="box-gray banner">
										<img src="http://<?php echo BASE_URL; ?>/img/banner/<?php echo $data2['Image']; ?>">
									</div>
									<div class="row kosong"></div>
									<?php } ?>									
								</div>
							</div>
						</div>
				</div>
					<div class="col-lg-8">
						<div class="box">
							<div class="box-gray eventcontent">
								<div class="alert alert-info alert-dismissable">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
									The promotion below is for end user only. For business partners promotions, please <a href="promo_bp.php">click here</a>
								</div>
						 <section id="projects">
						 <?php								
										$sql="SELECT * FROM promo WHERE Category_id='2' ORDER BY Promo_id DESC LIMIT 1";
										$query=mysql_query($sql); 
										while($data2=mysql_fetch_array($query)) {
										$promo_id=$data2['Promo_id'];
										$img=$data2['Promo_image'];
										if($promo_id > 0){
										/*$promo_id=$data2['Promo_id'];
										$img=$data2['Promo_image'];
										$promo=$data2['Title'];
										$start=$data2['Start'];
										$end=$data2['End']; */
										
										?> 
							 <div class="media">
									  <a class="pull-left" href="#">
									<!--	<img class="media-object" src="http://<?php echo BASE_URL; ?>/img/promo/<?php echo $img; ?>"width="300px" height="425px" alt="">-->
										 <ul id="thumbs" class="portfolio">
												<!-- Item Project and Filter Name -->
												<li class="col-lg-6 design" data-id="id-0" data-type="web">
													<div class="item-thumbs">
														<!-- Fancybox - Gallery Enabled - Title - Full Image -->
														<a class="hover-wrap fancybox" data-fancybox-group="gallery" title="<?php echo $data2['Title']; ?>" href="http://<?php echo BASE_URL; ?>/img/promo/<?php echo $img; ?>">
														<span class="overlay-img"></span>
														<span class="overlay-img-thumb font-icon-plus"></span>
														</a>
														<!-- Thumb Image and Description -->
														<img src="http://<?php echo BASE_URL; ?>/img/promo/<?php echo $img; ?>" alt="">
													</div>
												</li>
											</ul>


									 </a>
						  <div class="media-body">
							<p class="paragraph"><?php echo '<h3 class="title_event">'.$data2['Title'].'</h3>'; ?></h4></p>
							<p class="paragraph"><?php echo "<strong>Valid till : </strong><br>" .date('d M Y',strtotime($data2['Start']))." - "; ?>
										<?php echo "  ".date('d M Y',strtotime($data2['End'])). " "; ?></p>
										<?php 
											if($data2['End'] > date('Y-m-d')) 
											{
												echo "<p class='paragraph'><font color='blue'></font></p>";
											}
											elseif($data2['End'] < date('Y-m-d'))
											{
												echo "<p class='paragraph'><font color='red'>Promo has Passed</font></p>"; 
											}
									} 
											else 
											{ 
											echo "<p>No Promo Available</p>"; 
											}
										?>
							  </div>
								
							</div>
							<?php } ?>
					</section>
			</div>
						</div>
					</div>
			</div>
		</div>
	</div>
	<?php include "footer.php";   ?>