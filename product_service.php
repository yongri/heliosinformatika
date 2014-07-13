<?php session_start(); 
	include "connection.php"; 
		include "cons.php"; 
		include"header.php";
?>
<div class="container overviewproduct">
	<div class="container overviewmidle">
		<div class="col-lg-12">
			<div class="col-lg-8 pull-left">
				<ol class="breadcrumb">
					<li><a href="#" class="jejak">Home</a></li>
					<li><a href="#" class="jejak">Products</a></li>
					<li class="active">Helios Service</li>
				</ol>
			</div>
			<div class="col-lg-4">
					<!-- Title Product -->	<h3 class="service">Helios Service</h3>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<div class="col-lg-4">
					<div class="box leftmenu">
						<div id='cssmenu'>
						<ul>
							<li class='has-sub'><a href='http://<?php echo BASE_URL; ?>/hp-server'><span>HP Servers</span></a>
								<ul>
									<li class="active"><a href="http://<?php echo BASE_URL; ?>/hp-server"><span>All Product Servers</span></a></li>
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
							<li class='has-sub'><a href='http://<?php echo BASE_URL; ?>/product-storage'><span>HP Storages</span></a>
							<ul>
									<li class="active"><a href="http://<?php echo BASE_URL; ?>/product-storage"><span>All Product Storages</span></a></li>
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
								 <li class='last'><a href='http://<?php echo BASE_URL; ?>/helios-service'><span>Helios Service</span></a></li>
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
					<div align="justify">
						<?php
							$sql="SELECT * FROM product WHERE Category_id='3'";
											$query=mysql_query($sql);
											$data=mysql_fetch_array($query);
											$content=$data['Content'];
						?>
						<p><?php echo $content; ?></p>
							</div>
							</div>
						</div>
					</div>
		<!-- divider -->
			</div>
		</div>
	</div>
	<?php include "footer.php"; ?>