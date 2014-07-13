<?php 
	session_start(); 
	include "connection.php";
	include "cons.php"; 
	include"header.php"; 
?>
<div class="container overviewnews">
	<div class="container overviewmidle">
		<div class="col-lg-12">
			<div class="col-lg-8 pull-left">
				<ol class="breadcrumb">
					<li><a href="#" class="jejak">Home</a></li>
					<li class="active">Media Coverage</li>
				</ol>
			</div>
			<div class="col-lg-4">
					<!-- Title Product -->	<h3 class="coverage">Media Coverage</h3>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<div class="col-lg-4">
					<div class="box leftmenu">
					<div id='cssmenu'>
						<ul>
						<?php $sql1=("SELECT * FROM news WHERE Category_id='2' ORDER BY Created_at DESC LIMIT 4") or die (mysql_error());
								$query1=mysql_query($sql1);
								while($data1=mysql_fetch_array($query1))
								{
								$news_id	=$data1['News_id'];
											 if($news_id > 0){
								?>
							<li class='active'><a href='http://<?php echo BASE_URL; ?>/coverage_detail.php?id=<?php echo $data1['News_id']; ?>'><span><?php echo $data1['News_name']; ?></span><br/><br/><span><em><?php echo date('d M Y',strtotime($data1['Created_at'])); ?></em></span></a></li>
						<?php } 
						else{
								echo "<span>>No News</span>";
							}
						 } ?>
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
							<div class="box-gray newscontent">
							<?php
				$batas=3;
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
								$sql="SELECT * FROM news WHERE Category_id='2' ORDER BY Created_at DESC LIMIT $posisi,$batas";
								$query=mysql_query($sql);
								while($data=mysql_fetch_array($query))
								{
									$desc = htmlentities(strip_tags($data['Description']));
									$description = substr($desc,0,700); // ambil 220 karakter
									$description = substr($desc,0,strrpos($description," ")); // break per spasi
									$news=$data['News_name'];
									$create=$data['Created_at'];
																
								?>
								<h4 class="location"><?php echo $news; ?></h4>
								<img src="http://<?php echo BASE_URL; ?>/img/news/<?php echo $data['News_image']; ?>"><br/><br/>
								<?php echo"	{$description} .. <a href='{$data['Content']}' target='_blank'>Read More</a>"; ?><br/><br/>
								<?php echo '<i>Posted On : '.date('d M Y',strtotime($create)).'</i>'; ?>
										<div class="row">
											<div class="col-lg-12 linenews">
												<div class="solidline">
												</div>
											</div>
										</div>
									<?php } ?>
									
									<div class="span6">
					<div class="pagination pull-left">
						<ul class="pagination">
							<?php 
							$sql2="SELECT * FROM news WHERE Category_id='2' ORDER BY Created_at  DESC ";
							$query2=mysql_query($sql2);
							$jmldata=mysql_num_rows($query2);
							$jmlpage=ceil($jmldata/$batas);
							for($i=1;$i<=$jmlpage;$i++)
								if($i!=$page)
								{
									echo '<li><a href="media_coverage.php?page='.$i.'">'.$i.'</a></li>';
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
			</div>
		</div>
	</div>
	<?php include "footer.php"; ?>