<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>PT. Helios Informatika Nusantara</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="" />
<!-- css -->
<link href="http://<?php echo BASE_URL; ?>/css/style2.css" rel="stylesheet" />
<link href="http://<?php echo BASE_URL; ?>/css/fancybox/jquery.fancybox.css" rel="stylesheet">
<link href="http://<?php echo BASE_URL; ?>/css/jcarousel.css" rel="stylesheet" />
<link href="http://<?php echo BASE_URL; ?>/css/flexslider.css" rel="stylesheet" />
<link href="http://<?php echo BASE_URL; ?>/css/style.css" rel="stylesheet" />
<link href="http://<?php echo BASE_URL; ?>/menu_source/styles.css" rel="stylesheet" type="text/css">

<!-- Theme skin -->
<link href="http://<?php echo BASE_URL; ?>/skins/default.css" rel="stylesheet" />
<script type="text/javascript">  

	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'UA-36587545-3']);
	  _gaq.push(['_trackPageview']);

	  (function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();
</script>
</head>
<body background="http://<?php echo BASE_URL; ?>/img/profile/bg.jpg" style="no-repeat scroll center top #FFFFFF">
<div id="wrapper">
	<!-- start header -->
	
</head>
	<header>
        <div class="navbar navbar-default navbar-static-top">
            <div class="container">
				
				
				
				<div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
					<a class="navbar-brand" href="http://<?php echo BASE_URL; ?>"><img class="logo" src="http://<?php echo BASE_URL; ?>/img/heliosnew.png" alt="PT. Helios Informatika Nusantara"></a>
                </div>
                <div class="navbar-collapse collapse">
				<div class="col-lg-3 cari">
					<form class="form-search" method="post" action="search.php">
							<input name="search" class="form-control cari" type="text" placeholder="Search.."> 
					</form>
				</div>
				<div class="col-lg-3 fb">
					<ul class="social-network">
							<a href="http://facebook.com/CTIZone"><img src="http://<?php echo BASE_URL; ?>/img/fb2.jpg" width="20px" height="20px"></a> 
							<a href="http://twitter.com/CTIZone"><img src="http://<?php echo BASE_URL; ?>/img/twitter2.jpg" width="20px" height="20px"></a>
					</ul>
				</div>
				<?php 
				$sql="SELECT * FROM business_partner WHERE Bp_id='{$_SESSION['Bp_id']}'";
				$query=mysql_query($sql); //echo $sql;
				$data=mysql_fetch_array($query);
				$status=$data['Status'];
				$username=$data['Username'];
					if($status=='Confirmed') 
					{
						echo'  <div class="col-lg-3 login2">
						Welcome, <strong> '. $username .' </strong> | <a href="http://'.BASE_URL.'/sign-out">Log out</a></div>';
					} 
					else
					{ 
						echo'<div class="col-lg-3 login1"><p><a href="http://'.BASE_URL.'/business-partner-login">Partner Portal</a></p></div>'; 
					}
				?>
                    <ul class="nav navbar-nav">
                        <li class="active listmenu"><a href="http://<?php echo BASE_URL; ?>">Home</a></li>
                        <li class="dropdown listmenu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="5" data-close-others="false">About Us</a>
                            <ul class="dropdown-menu">
                                <li>
								<a href="http://<?php echo BASE_URL; ?>/company-background">Company Background</a></li>
								<li><a href="http://<?php echo BASE_URL; ?>/certifications">Certifications</a></li>
							<!--	<li><a href="http://<?php echo BASE_URL; ?>/awards">Awards</a></li> -->
                            </ul>
                        </li>
						 <li class="dropdown listmenu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false">Products & Services</a>
                            <ul class="dropdown-menu">
								<li><a href="http://<?php echo BASE_URL; ?>/hp-server">HP Servers</a></li>
								<li><a href="http://<?php echo BASE_URL; ?>/hp-storage">HP Storages</a></li>
								<li><a href="http://<?php echo BASE_URL; ?>/helios-service">Helios Service</a></li>
                            </ul>
                        </li>
						<li class="dropdown listmenu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false">Events & Promotions</a>
                            <ul class="dropdown-menu">
                                <li><a href="http://<?php echo BASE_URL; ?>/event">Events</a></li>
								<li><a href="http://<?php echo BASE_URL; ?>/promo-end-user">Promotions</a></li>
                            </ul>
                        </li>
						<li class="dropdown listmenu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false">News</a>
                            <ul class="dropdown-menu">
								<li><a href="http://<?php echo BASE_URL; ?>/press-release">Press Release</a></li>
								<li><a href="http://<?php echo BASE_URL; ?>/media-coverage">Media Coverage</a></li>
                            </ul>
                        </li>
                        <li class="listmenu"><a href="http://<?php echo BASE_URL; ?>/career">Careers</a></li>
						<li class="listmenu"><a href="http://<?php echo BASE_URL; ?>/contact-us">Contact Us</a></li>
                    </ul>
                </div>
				
            </div>
        </div>
	</header>
	<!-- end header -->
	<!-- start slider -->
	