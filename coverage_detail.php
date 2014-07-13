<?php session_start(); 
include "connection.php";
include "cons.php";  
include"header.php"; ?>
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
							   <?php $sql="SELECT * FROM news WHERE News_id='{$_GET['id']}'";
								$query=mysql_query($sql);
								while($data=mysql_fetch_array($query))
								{
									$news=$data['News_name'];
									$img=$data['News_image'];
									$content=$data['Content'];
									$create=$data['Created_at'];
								}								
								?>
								<p align="justify"><h4 class="location"><?php echo $news; ?></h4></p><br>
								<p align="justify"><a href="<?php echo $content; ?>"><?php echo $content; ?></a></p><br>
								<?php echo '<i>Posted On : '.date('d M Y',strtotime($create)).'</i>'; ?> <strong>by Admin</strong>
							</div>
			</div>
<!-- Nanti Subject ny pake variabel $judul event -->
						
						</div>
		<!-- divider -->
			</div>
		</div>
	</div>
	<?php include "footer.php"; ?>