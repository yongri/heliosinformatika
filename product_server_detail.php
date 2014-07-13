<?php 
	session_start(); 
	include "connection.php";
	include "cons.php"; 
    include"header.php"; 
	$sql="SELECT * FROM product a,product_category b WHERE a.Category_id=b.Category_id AND Product_id='{$_GET['id']}'";
	$query=mysql_query($sql);
	$data=mysql_fetch_array($query);
?>
<div class="container overviewproduct">
	<div class="container overviewmidle">
		<div class="col-lg-12">
			<div class="col-lg-8 pull-left">
				<ol class="breadcrumb">
					<li><a href="#" class="jejak">Home</a></li>
					<li><a href="#" class="jejak">Products</a></li>
					<li><a href="#" class="jejak"><?php echo $data['Category_name']; ?></a></li>
					<li class="active">HP Servers</li>
				</ol>
			</div>
			<div class="col-lg-4">
					<!-- Title Product -->	<h3 class="menu_server">HP Servers</h3>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<div class="col-lg-4">
					<div class="box leftmenu">
						<div id='cssmenu'>
						<ul>
							<li class='has-sub'><a href='http://<?php echo BASE_URL; ?>/product_server.php'><span>HP Servers</span></a>
								<ul>
									<li class="active"><a href="http://<?php echo BASE_URL; ?>/product_server.php"><span>All Product Servers</span></a></li>
									<?php
						$sql1="SELECT * FROM product WHERE Category_id='1' ORDER BY Product_id DESC";
						$query1=mysql_query($sql1);
						while($data1=mysql_fetch_array($query1))
						{
						?>
									
									   <li><a href="http://<?php echo BASE_URL; ?>/product_server_detail.php?id=<?php echo $data1['Product_id']; ?>"><span><?php echo $data1['Product_name']; ?></span></a></li>
					
									
									<?php } ?>
									</ul>
							</li>
							<li class='has-sub'><a href='http://<?php echo BASE_URL; ?>/product_storage.php'><span>HP Storages</span></a>
							<ul>
									<li class="active"><a href="http://<?php echo BASE_URL; ?>/product_storage.php"><span>All Product Storages</span></a></li>
										<?php
						$sql2="SELECT * FROM product WHERE Category_id='2' ORDER BY Product_id DESC";
						$query2=mysql_query($sql2);
						while($data2=mysql_fetch_array($query2))
						{
						?>
									
									   <li><a href="http://<?php echo BASE_URL; ?>/product_storage_detail.php?id=<?php echo $data2['Product_id']; ?>"><span><?php echo $data2['Product_name']; ?></span></a></li>
									
									<?php } ?>
									</ul>
								 </li>
								 <li class='last'><a href='http://<?php echo BASE_URL; ?>/product_service.php'><span>Helios Service</span></a></li>
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
								<div class="row">
									  <div class="col-lg-12">
										  <div class="media">
											  <a class="pull-left" href="#">
											<!--	<img class="media-object" src="http://<?php echo BASE_URL; ?>/img/product/<?php echo $data['Product_image']; ?>" width="200px" height="150px" alt="">-->
											  <ul id="thumbs" class="portfolio">
												<!-- Item Project and Filter Name -->
												<li class="col-lg-3 design" data-id="id-0" data-type="web">
													<div class="item-thumbs">
														<!-- Fancybox - Gallery Enabled - Title - Full Image -->
														<a class="hover-wrap fancybox" data-fancybox-group="gallery" title="<?php echo $data['Product_name']; ?>" href="http://<?php echo BASE_URL; ?>/img/product/<?php echo $data['Product_image']; ?>">
														<span class="overlay-img"></span>
														<span class="overlay-img-thumb font-icon-plus"></span>
														</a>
														<!-- Thumb Image and Description -->
														<img src="http://<?php echo BASE_URL; ?>/img/product/<?php echo $data['Product_image']; ?>" alt="">
													</div>
												</li>
											</ul>
											 </a>
											  <div class="media-body">
														<h3 class="media-heading detail2"><?php echo $data['Product_name']; ?></h3><br/>
														<?php echo $data['Content']; ?>
										
											  </div>
										</div>
									  </div>
								</div>
							</div>
						</div>
					</div>
		<!-- divider -->
			</div>
		</div>
	</div>
	<?php include "footer.php"; ?>