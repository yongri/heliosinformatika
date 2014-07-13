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