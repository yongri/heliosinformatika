<?php
session_start(); 
include "connection.php";
	include "cons.php";
$sql="SELECT * FROM business_partner WHERE Bp_id='{$_SESSION['Bp_id']}'";
$query=mysql_query($sql); //echo $sql;
$data=mysql_fetch_array($query);
$status=$data['Status'];

	if($status=='Confirmed') {
	$bp_id=$_GET['id'];
	
	include "header.php";
?>
<div class="container overviewevent">
	<div class="container overviewmidle">
		<div class="col-lg-12">
			<div class="col-lg-8 pull-left">
				<ol class="breadcrumb">
					<li><a href="#" class="jejak">Home</a></li>
					<li><a href="#" class="jejak">Business Partner</a></li>
					<li class="active">Promotions</li>
				</ol>
			</div>
			<div class="col-lg-4">
					<!-- Title Product -->	<h3 class="promotionbp">Business Partner Promotions</h3>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<div class="col-lg-4">
					<div class="box leftmenu">
						<div id='cssmenu'>
						<ul>
							<li class='has-sub'><a href='promo_bp.php'><span>Promotions</span></a>
									<?php
						$sql1="SELECT * FROM promo WHERE Category_id='1' ORDER BY Promo_id DESC LIMIT 4";
						$query1=mysql_query($sql1);
						while($data1=mysql_fetch_array($query1))
						{
						?>
									<ul>
									   <li><a href="promo_bp_detail.php?id=<?php echo $data1['Promo_id']; ?>"><span><?php echo $data1['Title']; ?></span></a></li>
									</ul>
									<?php } ?>
							</li>
								 <li class='active'><a href="bp_edit_profile.php?id=<?php echo $_SESSION['Bp_id']; ?>"><span>Edit Profile</span></a></li>
								 <li class='active'><a href="price_list.php?id=<?php echo $_SESSION['Bp_id']; ?>"><span>Price List</span></a></li>
								 <li class='active'><a href="bp_change_password.php?id=<?php echo $_SESSION['Bp_id']; ?>"><span>Change Password</span></a></li>
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
							<div class="box-gray overviewcontent">
							  <section id="projects">
									<?php								
										$sql="SELECT * FROM promo WHERE Promo_id='{$_GET['id']}'";
										$query=mysql_query($sql); 
										while($data2=mysql_fetch_array($query)) {
										$promo_id=$data2['Promo_id'];
										$img=$data2['Promo_image'];
										$promo=$data2['Title'];
										$start=$data2['Start'];
										$end=$data2['End'];
										}
										?> 
							 <div class="media">
									  <a class="pull-left" href="#">
									<!--	<img class="media-object" src="http://<?php echo BASE_URL; ?>/img/promo/<?php echo $img; ?>"width="300px" height="425px" alt="">-->
									  <ul id="thumbs" class="portfolio">
												<!-- Item Project and Filter Name -->
												<li class="col-lg-6 design" data-id="id-0" data-type="web">
													<div class="item-thumbs">
														<!-- Fancybox - Gallery Enabled - Title - Full Image -->
														<a class="hover-wrap fancybox" data-fancybox-group="gallery" title="<?php echo $promo; ?>" href="http://<?php echo BASE_URL; ?>/img/promo/<?php echo $img; ?>">
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
									  <?php
									  if($promo_id > 0){
									   
									?>
										<p class="paragraph"><?php echo '<h3 class="title_event">'.$promo.'</h3>'; ?></p>
										<p class="paragraph"><?php echo "<strong>Valid till : </strong><br>" .date('d M Y',strtotime($start))." - "; ?>
										<?php echo "  ".date('d M Y',strtotime($end)). " "; ?></p>
										<?php if($end > date('Y-m-d H:i:s')) {
	   
										    echo "<p class='paragraph'><font color='blue'></font></p>";
											} else {
											echo "<p class='paragraph'><font color='red'>Promo has Passed</font></p>"; 
											}
											?>
											<?php } 
											else{
											echo "<p>No Promo Available</p>";
											}
											?>
							  </div>
								</div>
					</section>
								
							</div>
			</div>
						
						</div>
		<!-- divider -->
			</div>
		</div>
	</div>
	<?php include "footer.php"; } 
		else 
		{
		echo"<script>alert('You can not access this page. Please login first!'); window.location = 'bp_login.php'</script>";
		}
	?>
