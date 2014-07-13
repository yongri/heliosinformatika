<footer>
	<div class="container">
		<div class="row">
			<div class="col-lg-3 contact2">
				<div class="widget">
					<h5 class="widgetheading">Contact Us</h5>
					<address>
					<strong>PT. Helios Informatika Nusantara</strong><br>
						Graha BIP, 3rd Floor<br>
						Jl. Jend. Gatot Subroto Kav. 23<br>
						Jakarta, 12930, Indonesia.<br>
						Phone 	: 62-21-521 0560 <br>
						Fax     : 62-21-521 0561 <br>
					</address>
				</div>
			</div>
			<div class="col-lg-3 about">
				<div class="widget">
					<h5 class="widgetheading">About Helios</h5>
					<ul class="link-list">
						<li><a href="http://<?php echo BASE_URL; ?>/company-background">Company Background</a></li>
						<li><a href="http://<?php echo BASE_URL; ?>/certifications">Certification</a></li>
					<!--	<li><a href="#">Awards</a></li>-->
					</ul>
				</div>
			</div>
			<div class="col-lg-3 footerproduct">
				<div class="widget">
					<h5 class="widgetheading">Products & Services</h5>
					<ul class="link-list">
						<li><a href="http://<?php echo BASE_URL; ?>/hp-server">HP Servers</a></li>
						<li><a href="http://<?php echo BASE_URL; ?>/hp-storage">HP Storages</a></li>
						<li><a href="http://<?php echo BASE_URL; ?>/helios-service">Helios Services</a></li>
					</ul>
				</div>
			</div>
				<div class="col-lg-3 event2">
				<div class="widget">
					<h5 class="widgetheading widgetevent">Events</h5>
					<ul>
						<?php $sql1=("SELECT * FROM event WHERE Category_id='2' ORDER BY Event_id DESC LIMIT 2") or die (mysql_error());
								$query1=mysql_query($sql1);
								while($data1=mysql_fetch_array($query1))
								{
								$event_id	=$data1['Event_id'];
											 if($event_id > 0){
								?>
							<li><a href='http://<?php echo BASE_URL; ?>/event_detail.php?id=<?php echo $data1['Event_id']; ?>'><span><?php echo $data1['Event_name']; ?></span> | <span><em><?php echo $data1['Start']; ?></em></span></a></li><br/>
						
					
						<?php } 
					 
						else{
								echo "<span>>No Event</span>";
							}
						 } ?>
						</ul>
					
				</div>
			</div>
		</div>
	</div>
	<div id="sub-footer">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 copy">
					<div class="copyright">
						<p>
							<span>&copy; 2014 PT. Helios Informatika Nusantara | All Right Reserved </span>
						</p>
					</div>
				</div>
				<div class="col-lg-6 member">
					<ul class="social-network">
						<li><img src="http://<?php echo BASE_URL; ?>/img/member_cti.png"></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	</footer>
<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>
<!-- javascript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="http://code.jquery.com/jquery-latest.min.js"></script>
<script type='text/javascript' src='http://<?php echo BASE_URL; ?>/menu_source/menu_jquery.js'></script>
<script src="http://<?php echo BASE_URL; ?>/js/jquery-1.9.0.js"></script>
<script src="http://<?php echo BASE_URL; ?>/js/jquery.js"></script>
<script src="http://<?php echo BASE_URL; ?>/js/jquery.easing.1.3.js"></script>
<script src="http://<?php echo BASE_URL; ?>/js/jquery2.js"></script>
<script src="http://<?php echo BASE_URL; ?>/js/jquery.fancybox.pack.js"></script>
<script src="http://<?php echo BASE_URL; ?>/js/jquery.fancybox-media.js"></script>
<script src="http://<?php echo BASE_URL; ?>/js/google-code-prettify/prettify.js"></script>
<script src="http://<?php echo BASE_URL; ?>/js/portfolio/jquery.quicksand.js"></script>
<script src="http://<?php echo BASE_URL; ?>/js/portfolio/setting.js"></script>
<script src="http://<?php echo BASE_URL; ?>/js/jquery.flexslider.js"></script>
<script src="http://<?php echo BASE_URL; ?>/js/animate.js"></script>
<script src="http://<?php echo BASE_URL; ?>/js/custom.js"></script>
<script src="http://<?php echo BASE_URL; ?>/js/jquery.tooltipster.min.js"></script>
</body>
</html>