<?php 
	session_start(); 
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
					<li class="active">HP Storages</li>
				</ol>
			</div>
			<div class="col-lg-4">
					<!-- Title Product -->	<h3 class="menu_storage">HP Storages</h3>
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
							<div class="box-gray productcontent2">
								<div class="row">
								<?php 
								$batas=6;
				if(isset($_GET['page']))
			{
				$page=$_GET['page'];
			}
			if(empty($page)) 
			{
				$posisi=0;
				$page=1;
			}			
			else
			{
				$posisi=($page-1)*$batas;
			}
											$sql="SELECT * FROM product WHERE Category_id='2' ORDER BY Product_id DESC LIMIT $posisi,$batas";
											$query=mysql_query($sql);
											while($data=mysql_fetch_array($query))
											{	
											$desc = htmlentities(strip_tags($data['Content']));
											$description = substr($desc,0,150); // ambil 220 karakter
											$description = substr($desc,0,strrpos($description," ")); // break per spasi
											$id=$data['Product_id'];
											$img=$data['Product_image'];
											$product=$data['Product_name'];
											?>				
									    <div class="col-sm-6 col-md-4">
										<div class="thumbnail">
										  <img src="http://<?php echo BASE_URL; ?>/img/product/<?php echo $img; ?>" alt=""><br/>
										  
											<div class="productside"><?php echo $product; ?></div>
											<div align="left"><?php echo" {$description}..."; ?></div>
										   <div class="buttonproduct" align="center"><a href='http://<?php echo BASE_URL; ?>/product_storage_detail.php?id=<?php echo $id; ?>' class='btn btn-info btn-sm active square2' role='button'>Read More</a></div>

										</div>
									  </div>
									  <?php } ?>
								</div>
										<div class="span6">
					<div class="pagination pull-left">
						<ul class="pagination">
							<?php 
							$sql2="SELECT * FROM product WHERE Category_id='2' ORDER BY Product_id DESC ";
							$query2=mysql_query($sql2);
							$jmldata=mysql_num_rows($query2);
							$jmlpage=ceil($jmldata/$batas);
							for($i=1;$i<=$jmlpage;$i++)
								if($i!=$page)
								{
									echo '<li><a href="product_storage.php?page='.$i.'">'.$i.'</a></li>';
								}
								else
								{
									echo '<li class="active"><a href="#">'.$i.'</a></li>';
								}
							?>
						</ul>
					</div>
				</div>
							</div>
						</div>
					</div>
		<!-- divider -->
			</div>
		</div></div>
	
	<?php include "footer.php"; ?>