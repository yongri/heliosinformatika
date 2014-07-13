<?php
session_start();
include "connection.php";
include "cons.php";
include "header.php";

	if ($_POST)
	{
		$is_error 		= FALSE;
		$username=$_POST['username'];
		$password=$_POST['password'];
		
	if ($username == '')
	{
		$is_error = TRUE;
		$error['username'] = 'Username is required';
	}
	if ($password == '')
	{
		$is_error = TRUE;
		$error['password'] = 'Password is required';
	}
	if (!$is_error)
	{
		/*echo " "; */
	}
	
	}

?>
<div class="container overview2">
	<div class="container overviewmidle">
		<div class="col-lg-12">
			<div class="col-lg-8 pull-left">
				<ol class="breadcrumb">
					<li><a href="#" class="jejak">Home</a></li>
					<li><a href="#" class="jejak">Business Partner</a></li>
					<li class="active">Login</li>
				</ol>
			</div>
			<div class="col-lg-4">
					<!-- Title Product -->	<h3 class="login_partner">Login Partner</h3>
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
							<form action="bp_cek_login.php" method="post" class="form-horizontal" role="form" data-toggle="validator">
								<h5 class="location">Please fill your username and password or <a href="bp_register.php">click here</a> for Register</h5>
								
					<div class="form-group <?php echo (isset($error['username'])) ? 'warning' : ''; ?>">
					<label class="col-sm-4 control-label" for="Username">Username</label>
						<!--<div class="col-lg-4 field">Username -->
						<div class="col-sm-4">
						<input type="text" name="username" class="form-control" placeholder="Input Username" required autofocus>
						<!--	<input type="text" name="data" placeholder="*Enter your Username" data-rule="maxlen:6" data-msg="Please enter at least 6 chars" /> -->
							<span class="help-block"><?php echo (isset($error['username'])) ? $error['username'] : ''; ?></span>
						</div>
					</div>
						<div class="form-group <?php echo (isset($error['password'])) ? 'warning' : ''; ?>">
					<label class="col-sm-4 control-label" for="Password">Password</label>
					<!--	<div class="col-lg-4 field">Password -->
						<div class="col-sm-4">
						<input type="password" name="password" class="form-control" placeholder="Input Password" required>
						<!--	<input type="password" name="password" placeholder="*Enter your Password" data-rule="maxlen:6" data-msg="Please enter at least 6 chars" />-->
							<span class="help-block"><?php echo (isset($error['password'])) ? $error['password'] : ''; ?></span>
						</div>
						</div>
						
						<div class="form-group">
						<label class="col-sm-4 control-label" for="send"></label>
							<div class="col-sm-4">
								<button class="btn btn-theme margintop10 pull-left" type="submit">Send</button>
							</div>
						</div>
						</form>
						</div>
						</div>
						</div>
						</div>
						</div>
						</div>
<?php include "footer.php"; ?>