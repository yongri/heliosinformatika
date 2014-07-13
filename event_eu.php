<?php 	
	session_start(); 
	include "connection.php"; 
	include "cons.php"; 
	include"header.php"; 
?>
<div class="container overviewevent">
	<div class="container overviewmidle">
		<div class="col-lg-12">
			<div class="col-lg-8 pull-left">
				<ol class="breadcrumb">
					<li><a href="#" class="jejak">Home</a></li>
					<li class="active">Events</li>
				</ol>
			</div>
			<div class="col-lg-4">
					<!-- Title Product -->	<h3 class="event">Events</h3>
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
							<li class='active'><a href='http://<?php echo BASE_URL; ?>/event_detail.php?id=<?php echo $data1['Event_id']; ?>'><span><?php echo $data1['Event_name']; ?></span><br/><br/><span><em><?php echo $data1['Start']; ?></em></span></a></li>
						
					
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
						<div class="alert alert-info alert-dismissable">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
									Next event to be announced.
								</div>
								<h4 class="directorside">Previous Event </h4><hr><br/>
							  <section id="projects">
									<?php								
										$sql3="SELECT * FROM event WHERE Category_id='2' ORDER BY Event_id DESC LIMIT 1";
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
									  <a class="pull-left" href="#">
									<!--	<img class="media-object" src="http://<?php echo BASE_URL; ?>/img/event/<?php echo $data3['Event_image']; ?>" width="300px" height="425px" alt="">-->
									  <ul id="thumbs" class="portfolio">
												<!-- Item Project and Filter Name -->
												<li class="col-lg-6 design" data-id="id-0" data-type="web">
													<div class="item-thumbs">
														<!-- Fancybox - Gallery Enabled - Title - Full Image -->
														<a class="hover-wrap fancybox" data-fancybox-group="gallery" title="<?php echo $data['Event_name']; ?>" href="http://<?php echo BASE_URL; ?>/img/event/<?php echo $data3['Event_image']; ?>">
														<span class="overlay-img"></span>
														<span class="overlay-img-thumb font-icon-plus"></span>
														</a>
														<!-- Thumb Image and Description -->
														<img src="http://<?php echo BASE_URL; ?>/img/event/<?php echo $data3['Event_image']; ?>" alt="">
													</div>
												</li>
											</ul>
									 </a>
									  <div class="media-body">
										<p class="paragraph"><?php echo '<h3 class="title_event">'.$data3['Event_name'].'</h3>'; ?></p>
										<p class="paragraph"><?php echo '<strong>Place : </strong><br>'.$data3['Location']; ?></p>
										<p class="paragraph"><?php echo "<strong>Date : </strong><br>" .$data3['Start']." - "; ?>
										<?php echo "  ".$data3['End']. " "; ?></p>
										<p class="paragraph"><?php echo "<strong>Time : </strong><br>" .$data3['Time']." - "; ?>
										<?php echo "  ".$data3['Finish']. " "; ?></p>
										<?php if($data3['End'] > date('Y-m-d')) {
	   
										   echo "
											<p class='paragraph'><a class='btn btn-primary btn-sm active' href='mailto:perli.yanti@computradetech.com?subject=Registration ".$data3['Event_name']."&amp;body=%0A-----------------------------------------------------------------------------------------------------------------------------%0A%20Please%20complete%20information%20below%20for%20registration%0A%20Company%20:%0A%20%20Name%20:%0A%20%20Job%20Title%20:%0A%20%20Email%20:%0A%20%20Phone%20:%0A%20%20Mobile%20:%0A%20%20Note%20:%20you%20can%20register%20other%20person%20from%20your%20company.%0A%20-----------------------------------------------------------------------------------------------------------------------------' role='button'>REGISTER</a></p>"; 
											} else if($data3['End'] < date('Y-m-d')){
											echo "<p class='paragraph'><font color='red'>Event has Passed</font></p>"; 
											}
											?>
											<?php } 
											else{
											echo "<p class='paragraph'>No Event</p>";
											}
											?>
							  </div>
								</div>
							<?php } ?>
							</section>
							</div>
						</div>
					</div>
			</div>
		</div>
	</div>
	<?php include "footer.php"; ?>