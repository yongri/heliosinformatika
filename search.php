<?php
session_start();
include "connection.php";
include "cons.php";
include "header.php"; 
?>
<div class="container overview2">
	<div class="container overviewmidle">
		<div class="col-lg-12">
			<div class="col-lg-8 pull-left">
				<ol class="breadcrumb">
					<li><a href="#" class="jejak">Home</a></li>
					<li class="active jejak">Search</li>
				</ol>
			</div>
			<div class="col-lg-4">
					<!-- Title Product -->	<h3 class="menu_search">Search </h3>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<div class="col-lg-4">
					<div class="box-gray1">
					<p>	<legend>Our Office</legend> 
						Helios Informatika Nusantara<br>
						Graha BIP, 3rd Floor <br>
						Jl. Jend. Gatot Subroto Kav. 23 <br>
						Jakarta, 12930, Indonesia.<br>
						Phone : 62-21-521 0560 <br>
						Fax : 62-21-521 0561 </p>							
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

<?php
if(isset($_POST['search'])) {
$cari=$_POST['search'];
$sql="SELECT * FROM product where(Product_name like '%$cari%')or (Product_id like '%$cari%') or (Content like '%$cari%') ORDER BY Product_id DESC";
$query=mysql_query($sql);
$count=mysql_num_rows($query);
if($count>0){
echo " Find the word <b> $cari : </b><br><br>" ;
while($data=mysql_fetch_array($query)) {
echo'<table class="table table-strip">
<tr>
<td><a href="product_server_detail.php?id='.$data['Product_id'].'">'.$data['Product_name'].'</a></td>
<td><a href="product_storage_detail.php?id='.$data['Product_id'].'">'.$data['Product_name'].'</a></td>
<td><a href="product_service_detail.php?id='.$data['Product_id'].'">'.$data['Product_name'].'</a></td>
<td><img src="img/product/'.$data['Product_image'].'" width="30%" height="30%"></td>
</tr>
</table>';
}
}
else{
echo("<p align=center>Sorry,<b>$cari</b> is not found.</p>");
}
}
?>
</div>
						</div>
						</div>
						</div>
						</div>
						</div>
<?php include "footer.php"; ?>