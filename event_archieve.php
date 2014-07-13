<?php 	session_start(); 
include "connection.php"; 
		include "cons.php"; 
		include"header.php"; ?>
<div class="container overviewevent">
	<div class="container overviewmidle">
		<div class="col-lg-12">
			<div class="col-lg-8 pull-left">
				<ol class="breadcrumb">
					<li><a href="#" class="jejak">Home</a></li>
					<li>Events</li>
					<li class="active">List Events</li>
				</ol>
			</div>
			<div class="col-lg-4">
					<!-- Title Product -->	<h3 class="event_archieve">List Events</h3>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<div class="col-lg-4">
					<div class="box leftmenu">
						<div id='cssmenu'>
						<ul>
						<?php $sql1=("SELECT * FROM event WHERE Category_id='2' ORDER BY Event_id DESC LIMIT 5") or die (mysql_error());
								$query1=mysql_query($sql1);
								while($data1=mysql_fetch_array($query1))
								{
								$event_id	=$data1['Event_id'];
											 if($event_id > 0){
								?>
							<li class='active'><a href='http://<?php echo BASE_URL; ?>/event_detail.php?id=<?php echo $data1['Event_id']; ?>'><span><?php echo $data1['Event_name']; ?></span><br/><br/><span><em><?php echo date('d M Y h:i a',strtotime($data1['Start'])); ?></em></span></a></li>
						
					
						<?php } 
					 
						else{
								echo "<span>>No Event</span>";
							}
						 } ?>
						 <li class='active'><a href='http://<?php echo BASE_URL; ?>/event_archieve.php'><span><em>See More Events</em></span></a></li>
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
							  <section id="projects">
							  <legend><h3 class="subtitle_event">List By Year : <?php 
										$sql2="SELECT Start FROM event WHERE Category_id='2' ORDER BY Published_at DESC";
										$query2=mysql_query($sql2); 
										$data2=mysql_fetch_array($query2);
											$date = DateTime::createFromFormat("Y-m-d", "2014-02-01");
											echo $date->format("Y");
										
										 ?></h3></legend>
									<?php		//"SELECT distinct Event_name FROM event WHERE Category_id='2' ORDER BY Published_at DESC ";						
										$sql3="SELECT * FROM event WHERE Category_id='2' ORDER BY Published_at DESC";
										$query3=mysql_query($sql3); 
										while($data3=mysql_fetch_array($query3)) {
											$event_id	=$data3['Event_id'];
											 if($event_id > 0){
											/*$img		=$data3['Event_image'];
											$event		=$data3['Event_name'];
											$location	=$data3['Location'];
											$start		=$data3['Start'];
											$end		=$data3['End']; */
										
										?> 
								<div class="media">
									  <div class="media-body">
										<p class="paragraph"><?php echo '<ul><li>'.$data3['Event_name'].'</li></ul>'; ?></p>
										<p class="paragraph"><a href="http://<?php echo BASE_URL; ?>/event_detail.php?id=<?php echo $data3['Event_id']; ?>">Read More</a></p>
									</div>
								</div>
							<?php } 
									} ?>
							</section>
							</div>
						</div>
					</div>
			</div>
		</div>
	</div>
	<?php include "footer.php"; ?>