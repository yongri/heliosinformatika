<?php
session_start(); 
include "connection.php";
	include "cons.php";
$sql="SELECT * FROM business_partner WHERE Bp_id='{$_SESSION['Bp_id']}'";
$query=mysql_query($sql); //echo $sql;
$data=mysql_fetch_array($query);
$status=$data['Status'];

	if($status=='Confirmed') {
	$bp_id=$_GET['id'];
	
	include "header.php";
?>
<div class="container overview2">
	<div class="container overviewmidle">
		<div class="col-lg-12">
			<div class="col-lg-8">
				<ol class="breadcrumb">
					<li><a href="#" class="jejak">Home</a></li>
					<li><a href="#" class="jejak">Business Partner</a></li>
					<li class="active">Price List</li>
				</ol>
			</div>
			<div class="col-lg-4">
					<!-- Title Product -->	<h3 class="price_list">Price List</h3>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
			<div class="col-lg-4">
					<div class="box leftmenu">
						<div id='cssmenu'>
						<ul>
							<li class='has-sub'><a href='promo_bp.php'><span>Promotions</span></a>
									<?php
						$sql1="SELECT * FROM promo WHERE Category_id='1' ORDER BY Promo_id DESC LIMIT 4";
						$query1=mysql_query($sql1);
						while($data1=mysql_fetch_array($query1))
						{
						?>
									<ul>
									   <li><a href="promo_bp_detail.php?id=<?php echo $data1['Promo_id']; ?>"><span><?php echo $data1['Title']; ?></span></a></li>
									</ul>
									<?php } ?>
							</li>
								 <li class='active'><a href="bp_edit_profile.php?id=<?php echo $_SESSION['Bp_id']; ?>"><span>Edit Profile</span></a></li>
								 <li class='active'><a href="price_list.php?id=<?php echo $_SESSION['Bp_id']; ?>"><span>Price List</span></a></li>
								 <li class='active'><a href="bp_change_password.php?id=<?php echo $_SESSION['Bp_id']; ?>"><span>Change Password</span></a></li>
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
							<div class="box-gray overviewcontent2">
							<?php
						$sql3="SELECT * FROM price_list ORDER BY Price_list_id DESC"; 
						$query3=mysql_query($sql3);
						while($data3=mysql_fetch_array($query3))
						{
							$name=$data3['Name'];
							$file=$data3['File'];
						
						?>
						<p><?php echo $name; ?></p>
						<p><a href="http://<?php echo BASE_URL; ?>/img/price_list/<?php echo $file; ?>">Download</a></p>
						<?php } ?>
				</div>
							</div>
						</div>
				</div>
			</div>
	</div>
<?php include "footer.php"; } 
		else 
		{
		echo"<script>alert('You can not access this page. Please login first!'); window.location = 'bp_login.php'</script>";
		}
	?>
