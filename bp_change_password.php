<?php	
session_start(); 
include "connection.php";
include "cons.php";
$sql	= "SELECT * FROM business_partner WHERE Bp_id='{$_SESSION['Bp_id']}'";
$query	= mysql_query($sql); //echo $sql;
$data	= mysql_fetch_array($query);
$status	= $data['Status'];

if($status=='Confirmed') {
	include "header.php";
	function update_record($id, $password)
	{
		$sql	= "UPDATE business_partner 
			SET Password='$password' 
			WHERE Bp_id='$id'";
		$Q		= mysql_query($sql) or mysql_error();
		return (mysql_affected_rows() > 0) ? TRUE : FALSE;
	}
	function check_password($id, $password)
	{
		$sql = "SELECT Bp_id 
			FROM business_partner
			WHERE Password = '$password'
				AND Bp_id = '$id'";
		$Q = mysql_query($sql);
		if (mysql_num_rows($Q) > 0)
			return true;
		return false;
	}
	
	if($_POST)
	{
		$is_error	= FALSE;
		$bp_id		= $_POST['Bp_id'];
		
		if ($_POST['password'] == '')
		{
			$is_error = TRUE;
			$error['password'] = 'Current Password is required';
		}
		else
		{
			$password = $_POST['password'];
			/*
			 *	Check if the old password is correct
			 */
			if (!check_password($bp_id, $password))
			{
				$is_error = TRUE;
				$error['password'] = 'Current Password is wrong';
			}
		}
		
		if ($_POST['password1'] == '')
		{
			$is_error = TRUE;
			$error['password1'] = 'New Password is required';
		}
		else
		{			
			$password1 = $_POST['password1'];
			if(strlen($password1) < 6)
			{
				$is_error = TRUE;
				$error['password1'] = 'Password Minimum 6 Character';
			}
			else 
			{
				if ($_POST['password2'] != '' && $_POST['password1'] != $_POST['password2'])
				{
					$is_error = TRUE;
					$error['password1']='Your password did not match!'; 
				}
			}
		}
		
		if ($_POST['password2'] == '')
		{
			$is_error = TRUE;
			$error['password2'] = 'Password2 is required';
		}

		
		if (!$is_error)
		{
			if(update_record($bp_id, $password1)) // Update password using the new submitted one
			{
				$end_message =  "<div class='alert alert-success alert-dismissable'>
											<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
											Your password has been saved!</div>";
			}
			else
			{
				$end_message = "<div class='alert alert-warning alert-dismissable'>
										  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
										  <strong>Sorry! </strong>, your password is not saved!</div>";
			}
		}
	}
	?>
	<div class="container overview2">
		<div class="container overviewmidle">
			<div class="col-lg-12">
				<div class="col-lg-8">
					<ol class="breadcrumb">
						<li><a href="#" class="jejak">Home</a></li>
						<li><a href="#" class="jejak">Business Partner</a></li>
						<li class="active">Change Password</li>
					</ol>
				</div>
				<div class="col-lg-4">
						<!-- Title Product -->	<h3 class="edit_password">Change Password</h3>
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
								<div class="box-gray overviewcontent">
							<!--	<form name="frmChange" method="post" action="" onSubmit="return validatePassword()">-->
							<form action="" method="post" class="form-horizontal" role="form" data-toggle="validator">
									<?php 
									if($_POST)
									{
										if(isset($end_message))
										{
											echo $end_message;										
										}
									}
									?>
	<div class="form-group">
			<label class="col-sm-4 control-label" for="Name"></label>
			<!--	<div class="col-lg-4 field">Name -->
				<div class="col-sm-4">
					<input type="hidden" name="Bp_id" class="form-control" value="<?php echo $_SESSION['Bp_id']; ?>">
				</div>
		</div>
		<div class="form-group <?php echo (isset($error['password'])) ? 'warning' : ''; ?>">
								<label class="col-sm-4 control-label" for="inputPassword">Current Password</label>
									<div class="col-sm-4">
										<input name="password" type="password" data-toggle="validator" data-minlength="6" class="form-control">
										<span class="help-block error"><?php echo (isset($error['password'])) ? $error['password'] : ''; ?></span>
										
									</div>
							</div> 
							<div class="form-group <?php echo (isset($error['password1'])) ? 'warning' : ''; ?>">
								<label class="col-sm-4 control-label" for="inputPassword">New Password</label>
									<div class="col-sm-4">
										<input name="password1" type="password" data-toggle="validator" data-minlength="6" class="form-control" placeholder="Minimum of 6 characters" required>
										<span class="help-block error"><?php echo (isset($error['password1'])) ? $error['password1'] : ''; ?></span>
										
									</div>
							</div>
						<div class="form-group <?php echo (isset($error['password2'])) ? 'warning' : ''; ?>">
								<label class="col-sm-4 control-label" for="inputPassword">Confirm New Password</label>
									<div class="col-sm-4">
									  <input type="password" name="password2" class="form-control" required>
									  <div class="help-block errors"><?php echo (isset($error['password2'])) ? $error['password2'] : ''; ?></div>
									</div>
						</div>
							<div class="form-group">
				<label class="col-sm-4 control-label" for="tombol"></label>
					<div class="col-sm-4">
						<button class="btn btn-primary btn-sm active" type="submit">Send</button>  <button class="btn btn-primary btn-sm active" type="reset">Cancel</button>
					</div>
				</div>
					</form>
					</div>
								
						</div>		
						</div>
				</div>
			</div>
		</div>
		</div>
	<?php 
	include "footer.php"; 
} 
else 
{
	echo"<script>alert('You can not access this page. Please login first!'); window.location = 'bp_login.php'</script>";
}
?>