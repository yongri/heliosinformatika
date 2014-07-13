<?php session_start(); 
 include "connection.php"; ?>
 <?php include "cons.php";?>
<?php include"header.php"; ?>
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
							  <section id="projects">
									<?php								
										$sql="SELECT * FROM event WHERE Event_id='{$_GET['id']}'";
										$query=mysql_query($sql); 
										while($data2=mysql_fetch_array($query)) {
										$event_id	=$data2['Event_id'];
										$img		=$data2['Event_image'];
										$event		=$data2['Event_name'];
										$location	=$data2['Location'];
										$start		=$data2['Start'];
										$end		=$data2['End'];
										$time		=$data2['Time'];
										$finish		=$data2['Finish'];
										}
										?> 
								<div class="media">
									  <a class="pull-left" href="#">
									<!--	<img class="media-object" src="http://<?php echo BASE_URL; ?>/img/event/<?php echo $img; ?>"width="300px" height="424px" alt="">
									  <a class="pull-left" href="#">
									<!--	<img class="media-object" src="http://<?php echo BASE_URL; ?>/img/event/<?php echo $data3['Event_image']; ?>" width="300px" height="425px" alt="">-->
									  <ul id="thumbs" class="portfolio">
												<!-- Item Project and Filter Name -->
												<li class="col-lg-6 design" data-id="id-0" data-type="web">
													<div class="item-thumbs">
														<!-- Fancybox - Gallery Enabled - Title - Full Image -->
														<a class="hover-wrap fancybox" data-fancybox-group="gallery" title="<?php echo $event; ?>" href="http://<?php echo BASE_URL; ?>/img/event/<?php echo $img; ?>">
														<span class="overlay-img"></span>
														<span class="overlay-img-thumb font-icon-plus"></span>
														</a>
														<!-- Thumb Image and Description -->
														<img src="http://<?php echo BASE_URL; ?>/img/event/<?php echo $img; ?>" alt="">
													</div>
												</li>
											</ul>
									 </a>
									  
									  </a>
									  <div class="media-body">
									  <?php
									  if($event_id > 0){
									   
									?>
										<p class="paragraph"><?php echo '<h3 class="title_event">'.$event.'</h3>'; ?></p>
										<p class="paragraph"><?php echo '<strong>Place : </strong><br>'.$location; ?></p>
										<p class="paragraph"><?php echo "<strong>Date : </strong><br>" .$start." - "; ?>
										<?php echo "  ".$end. " "; ?></p>
										<p class="paragraph"><?php echo "<strong>Time : </strong><br>" .$time." - "; ?>
										<?php echo "  ".$finish. " "; ?></p>
										<?php if($end > date('Y-m-d')) {
	   
										   echo "
											<p class='paragraph'><a class='btn btn-primary btn-sm active' href='mailto:perli.yanti@computradetech.com?subject=Registration ".$event."&amp;body=%0A-----------------------------------------------------------------------------------------------------------------------------%0A%20Please%20complete%20information%20below%20for%20registration%0A%20Company%20:%0A%20%20Name%20:%0A%20%20Job%20Title%20:%0A%20%20Email%20:%0A%20%20Phone/Mobile%20:%0A%20%20Note%20:%20you%20can%20register%20other%20person%20from%20your%20company.%0A%20-----------------------------------------------------------------------------------------------------------------------------' role='button'>REGISTER</a></p>"; 
											} else {
											
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
							</section>
							</div>
						</div>
					</div>
			</div>
		</div>
	</div>
	<?php include "footer.php"; ?>