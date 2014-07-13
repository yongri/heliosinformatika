<?php 
session_start(); 
include "connection.php"; 
include "cons.php"; 
include"header.php"; ?>
<div class="container overviewcareer">
	<div class="container overviewmidle">
		<div class="col-lg-12">
			<div class="col-lg-8 pull-left">
				<ol class="breadcrumb">
					<li><a href="#" class="jejak">Home</a></li>
					<li class="active">Careers</li>
				</ol>
			</div>
			<div class="col-lg-4">
				<h3 class="careers">Careers</h3>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<div class="col-lg-4">
					<div class="box leftmenu">
						<div id='cssmenu'>
						<ul>
						<li class='active'><a href='#'><span>Career Available</span></a></li>
						<?php $sql1=("SELECT * FROM career ORDER BY Created_at DESC LIMIT 5") or die (mysql_error());
								$query1=mysql_query($sql1);
								while($data1=mysql_fetch_array($query1))
								{
								$career_id	=$data1['Career_id'];
											 if($career_id > 0){
								?>
							<li class='active'><a href='http://<?php echo BASE_URL; ?>/career_detail.php?id=<?php echo $data1['Career_id']; ?>'><span><?php echo $data1['Career_name']; ?></span><br/><br/><span><em><?php echo date('d M Y',strtotime($data1['Created_at'])); ?></em></span></a></li>
						<?php } 
						else{
								//echo "<span>>No Career Available</span>";
								

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
							<div class="box-gray careercontent">
							  <section id="projects">
									<?php							
										$sql="SELECT * FROM career ORDER BY Created_at DESC LIMIT 1";
										$query=mysql_query($sql); 
										while($data2=mysql_fetch_array($query)) {
										$career_id=$data2['Career_id'];
										$career=$data2['Career_name'];
										$description=$data2['Description'];
										$start=$data2['Start'];
										$end=$data2['End'];
										}
										?> 
							 <div class="media">
									  <div class="media-body">
									  <?php
									  if($career_id > 0){
									   
									?>
										<p class="paragraph"><?php echo '<h3 class="title_event">'.$career.'</h3>'; ?></p>
										<p class="paragraph"><?php echo $description; ?></p>
										<p class="paragraph"><?php echo '<strong>Available till : </strong><br>'.date('d M Y',strtotime($start))." - "; ?>
										<?php echo "  ".date('d M Y',strtotime($end)). " "; ?></p>
										<?php //$headers .= 'Cc: info@heliosinformatika.com' . "\r\n";
										if($end > date('Y-m-d H:i:s')) {
	   
										   echo " <p class='paragraph'><a href='mailto:hrd@computradetech.com?subject=Helios Job Vacancy - ".$career."' class='btn btn-primary btn-sm active pull-left' role='button'>Apply</a></p>
											<br><br><br>
											<p class='paragraph'><strong>You can also apply for a position with send Resume and CV to : </strong></p>
											<p class='paragraph'><strong>PT. Helios Informatika Nusantara </strong><br>
											Graha BIP 3rd floor , Jl. Jend. Gatot Subroto Kav. 23 <br>
											Jakarta Selatan 12930, Indonesia <br>
											</p>";
											} else {
											
											echo "<p class='paragraph'><font color='red'>Career has Passed</font></p>"; 
											}
											?>
											<?php } 
											else{
											//echo "<p>No Career Available</p>";
											echo"<p class='paragraph'><strong>You can apply for a position with send Resume or CV to : </strong></p>
											<p class='paragraph'><strong>PT. Helios Informatika Nusantara </strong><br>
											Graha BIP 3rd floor , Jl. Jend. Gatot Subroto Kav. 23 <br>
											Jakarta Selatan 12930, Indonesia <br>
											</p>";
											}
											?>
							  </div>
								</div>
					</section>
								
							</div>
			</div>
						
						</div>
			</div>
		</div>
	</div>
	<?php include "footer.php"; ?>