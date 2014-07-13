<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Helios - Admin</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
<!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>
    <!-- Add custom CSS here -->
    <link href="css/sb-admin.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <!-- Page Specific CSS -->
    <link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.4.3.min.css">
	   <link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
	<!--tiny mce-->
	<script type="text/javascript" src="tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
	<script type="text/javascript">
	tinyMCE.init({
	// General options
				mode : "textareas",
				theme : "advanced",
				 
				plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,inlinepopups,autosave",
				 
				// Theme options
				theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect",
				theme_advanced_buttons2 : "cut,copy,paste,|,search,replace,|,bullist,numlist,|,outdent,indent|,undo,redo,,blockquote,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
				theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
				theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft",
				theme_advanced_toolbar_location : "top",
				theme_advanced_toolbar_align : "left",
				theme_advanced_statusbar_location : "bottom",
				theme_advanced_resizing : true,
				 
				// Example word content CSS (should be your site CSS) this one removes paragraph margins
				content_css : "css/word.css",
				 
				// Drop lists for link/image/media/template dialogs
				template_external_list_url : "lists/template_list.js",
				external_link_list_url : "lists/link_list.js",
				external_image_list_url : "lists/image_list.js",
				media_external_list_url : "lists/media_list.js",
				 
				// Replace values for the template plugin
				template_replace_values : {
				username : "Some User",
				staffid : "991234"
				}
				});
	</script>
	<script>
$(function() {
$("#tgl").datepicker();
});
</script>
	<script>
$(function() {
$("#tgl2").datepicker();
});
</script>
  </head>

  <body>

    <div id="wrapper">

      <!-- Sidebar -->
      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.html">PT. Helios Informatika Nusantara</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav side-nav">
            <li class="active"><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-caret-square-o-down"></i> About Us<b class="caret"></b></a>
					  <ul class="dropdown-menu">
						<li><a href="overview.php">Company Background</a></li>
						<li><a href="certificate.php">Certificate</a></li>
					<!--	<li><a href="awards.php">Awards</a></li> -->	
					  </ul>
				</li>
			<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-caret-square-o-down"></i> Products & Services<b class="caret"></b></a>
					  <ul class="dropdown-menu">
						<li><a href="product_server.php">HP Servers</a></li>
						<li><a href="product_storage.php">HP Storages</a></li>
						<li><a href="product_service.php">Helios Services</a></li>
					  </ul>
				</li>
				<li><a href="event.php"><i class="fa fa-caret-square-o-down"></i> Events</a></li>
					  <li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-caret-square-o-down"></i> Promotions<b class="caret"></b></a>
				<ul class="dropdown-menu">
						<li><a href="promo_bp.php">Business Partner</a></li>
						<li><a href="promo_eu.php">End User</a></li>
					  </ul>
					  </li>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-caret-square-o-down"></i> News<b class="caret"></b></a>
				<ul class="dropdown-menu">
						<li><a href="press_release.php">Press Release</a></li>
						<li><a href="media_coverage.php">Media Coverage</a></li>
				</ul>
					  </li>
            <li><a href="career.php"><i class="fa fa-caret-square-o-down"></i> Careers</a></li>
			 <li><?php  $sql="SELECT Banner_id FROM banner";
						$query=mysql_query($sql);
						$data=mysql_fetch_array($query);
					?>
			 <a href="banner.php"><i class="fa fa-caret-square-o-down"></i> Left Banner </a></li>
			<!--  <li><a href="user.php"><i class="fa fa-caret-square-o-down"></i> User</a></li>-->
            <li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-caret-square-o-down"></i> Partner Portal<b class="caret"></b></a>
					  <ul class="dropdown-menu">
						<li><a href="bp_list.php">Partner</a></li>
						<li><a href="price_list.php">Price List</a></li>
					  </ul>
				</li>
          </ul>