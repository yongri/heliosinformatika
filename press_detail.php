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
					<li class="active">Press Release</li>
				</ol>
			</div>
			<div class="col-lg-4">
					<!-- Title Product -->	<h3 class="press_release">Press Release</h3>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<div class="col-lg-4">
					<div class="box leftmenu">
						<?php include "menu_left_news.php"; ?>					
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
									$description=$data['Description'];
									$create=$data['Created_at'];
								}								
								?>
								<p align="justify"><h4 class="location"><?php echo $news; ?></h4></p><br/>
								<img src="http://<?php echo BASE_URL; ?>/img/news/<?php echo $img; ?>"><br/><br/>
								<p align="justify"><?php echo $description; ?></p><br/>
								<p align="justify"><?php echo $content; ?></p><br/>
								<?php echo '<i>Posted On : '.date('d M Y',strtotime($create)).'</i>'; ?> <strong>by Admin</strong>
							</div>
			</div>
						</div>
			</div>
		</div>
	</div>
	<?php include "footer.php"; ?>