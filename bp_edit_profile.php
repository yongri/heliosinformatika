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

function update_record($bp_id,$name,$address,$city,$code1,$code2,$region,$phone,$mobile,$faximile,$email2,$website)
{
	$sql="UPDATE business_partner SET Name='$name',Address='$address',City_name='$city',Country_code='$code1',Country_code2='$code2',Region_code='$region',Phone='$phone',Phone_mobile='$mobile',Fax='$faximile',Email2='$email2',Website='$website',Status='Confirmed' WHERE Bp_id='$bp_id'";
	$query=mysql_query($sql); echo $sql;
	return ($query) ? TRUE : FALSE;
}
function unique_username($username)
{
	$sql = "SELECT Username
		FROM business_partner 
		WHERE Username='$username'";
	$query=mysql_query($sql);
	
	return (mysql_num_rows($query) > 0) ? FALSE : TRUE;
}
if($_POST)
{
	//var_dump($_POST);
	$is_error  = FALSE;
	$is_numeric	= FALSE;
	$name		=$_POST['name'];
	$address	=$_POST['address'];
	$city		=$_POST['city'];
	$code1		=$_POST['country1'];
	$code2		=$_POST['country2'];
	$region		=$_POST['region'];
	$phone		=$_POST['phone'];
	$mobile		=$_POST['mobile'];
	$faximile	=$_POST['faximile'];
	$email2		=$_POST['email2'];
	$website	=$_POST['website'];
	//$username	=$_POST['username'];
	
	if ($name == '')
	{
		$is_error = TRUE;
		$error['name'] = 'Name is required';
	}
	
	if ($address == '')
	{
		$is_error = TRUE;
		$error['address'] = 'Address is required';
	}	
	
	if ($city == '')
	{
		$is_error = TRUE;
		$error['city'] = 'City is required';
	}
	
	if ($region == '')
	{
		$is_error = TRUE;
		$error['region'] = 'Area code is required';
	}
	else
	{
		if(!is_numeric($region)) 
		{
			$is_error = TRUE;
			$error['region']  = 'Data entered was not numeric';
		} 
			else if(strlen($region) < 3) 
		{
			$is_error = TRUE;
			$error['region']  = 'The area code entered must minimum 3 digits';
		} 
		else 
		{
			/* Success */
		}
	}
	if ($phone == '')
	{
		$is_error = TRUE;
		$error['phone'] = 'Phone is required';
	}
	else
	{
		if(!is_numeric($phone)) 
		{
			$is_error = TRUE;
			$error['phone']  = 'Data entered was not numeric';
		} 
		else if(strlen($phone) < 5) 
		{
			$is_error = TRUE;
			$error['phone']  = 'The phone entered must minimum 5 digits';
		} 
		else 
		{
			/* Success */
		}
	}
	if ($mobile == '')
	{
		$is_error = TRUE;
		$error['mobile'] = 'Mobile Phone is required';
	}
	else
	{
		if(!is_numeric($mobile)) 
		{
			$is_error = TRUE;
			$error['mobile']  = 'Data entered was not numeric';
		} 
			else if(strlen($mobile) < 6) 
		{
			$is_error = TRUE;
			$error['mobile']  = 'The mobile entered must minimum 6 digits';
		} 
		else 
		{
			/* Success */
		}
	}
	
	if ($faximile == '')
	{
		$is_error = TRUE;
		$error['faximile'] = 'Faximile is required';
	}
	if ($website == '')
	{
		$is_error = TRUE;
		$error['website'] = 'Website is required';
	}
/*	if ($username == '')
	{
		$is_error = TRUE;
		$error['username'] = 'Username is required';
	}
	elseif(!unique_username($username))
	{
		$is_error = TRUE;
		$error['username'] = 'Username is already used!';
	}
/*	if(isset($_POST["captcha"])AND $_POST["captcha"] !="" OR $_SESSION["code"]==$_POST["captcha"])
	{
		$is_error = TRUE;		
		$error['err_captcha']='Wrong Code Entered';
	} */
	
	if (!$is_error)
	{
		if(update_record($bp_id,$name,$address,$city,$code1,$code2,$region,$phone,$mobile,$faximile,$email2,$website))
		{
			$end_message =  "<div class='alert alert-success alert-dismissable'>
										<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
										Your information has been saved!</div>";
		}
		else
		{
			$end_message = "<div class='alert alert-warning alert-dismissable'>
									  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
									  <strong>Sorry! </strong>, your data is not saved!</div>";
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
					<li class="active">Edit Profile</li>
				</ol>
			</div>
			<div class="col-lg-4">
					<!-- Title Product -->	<h3 class="bp_edit_profil">Edit Profile</h3>
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
			<div class="col-sm-4 objectcontact">
				<input type="hidden" name="Bp_id" class="form-control" value="<?php echo $_SESSION['Bp_id']; ?>">
			</div>
	</div>
	<div class="form-group <?php echo (isset($error['name'])) ? 'warning' : ''; ?>">
		<label class="col-sm-4 control-label" for="Name">Name</label>
		<!--	<div class="col-lg-4 field">Name -->
			<div class="col-sm-4 objectcontact">
				<input type="text" name="name" class="form-control" value="<?php echo $_SESSION['Name']; ?>" required autofocus>
				<!--	<input type="text" name="name" placeholder="*Enter your Name" data-rule="maxlen:6" data-msg="Please enter at least 6 chars" />-->
					<span class="help-block"><?php echo (isset($error['name'])) ? $error['name'] : ''; ?></span>
			</div>
	</div>
		<div class="form-group <?php echo (isset($error['address'])) ? 'warning' : ''; ?>">
			<label class="col-sm-4 control-label" for="Address">Address</label>
			<!--<div class="col-lg-4 field">Address -->
				<div class="col-sm-4 objectcontact">
					<textarea name="address" class="form-control" required><?php echo $_SESSION['Address']; ?></textarea>
						<span class="help-block"><?php echo (isset($error['address'])) ? $error['address'] : ''; ?></span>
				</div>
		</div>
			<div class="form-group <?php echo (isset($error['city'])) ? 'warning' : ''; ?>">
			<!--<div class="col-lg-4 field">City -->
				<label class="col-sm-4 control-label" for="City">City</label>
					<div class="col-sm-4 objectcontact">
						<?php //$sql="SELECT * FROM business_partner a, city b WHERE a.City_id=b.City_id"; 
						//$query=mysql_query($sql); ?>
					<!--	<select name=city class="form-control"> 
						<?php //$data1=mysql_fetch_array($query); ?>
							<option value="<?php echo $data1['City_id']; ?>"><?php echo $data1['City_name']; ?></option>
							<?php 
						//	$sql2="SELECT * FROM city ORDER BY City_name";
						//	$query2=mysql_query($sql2);
						//	while($data2=mysql_fetch_array($query2)) {
						//		echo '<option value="'.$data2['City_id'].'">'.$data2['City_name'].'</option>';
						//	}
							?> 
						</select> -->
						<input type="text" name="city" class="form-control" value="<?php echo $_SESSION['City_name']; ?>" required>
							<span class="help-block"><?php echo (isset($error['city'])) ? $error['city'] : ''; ?></span>
					</div>
			</div>
				<div class="form-group form-inline<?php echo (isset($error['phone'])) ? 'warning' : ''; ?>">
					<label class="col-sm-2 control-label" for="Phone">Phone</label>
						<div class="col-sm-4 objectcontact2">
							<select name=country1 class="form-control country">
							<?php $sql1="SELECT * FROM business_partner a,country_code b WHERE a.Country_code=b.Country_code AND Bp_id='{$_SESSION['Bp_id']}'" ;
									$query1=mysql_query($sql1);
									while($data1=mysql_fetch_array($query1))
									{ $code1=$data1['Country_code']; 
									  $country1=$data1['Country_name']; ?>
								<option value="<?php echo $code1; ?>"><?php echo $_SESSION['Country_code']; echo ' - '; echo $country1; ?> </option> <?php } ?>
								<?php $sql=("SELECT * FROM country_code") or die (mysql_error());
								$query=mysql_query($sql);
								while($data=mysql_fetch_array($query))
								{ $code1=$data['Country_code']; 
								  $country=$data['Country_name']; ?>
							<option value="<?php echo $code1; ?>"><?php echo $code1; echo ' - '; echo $country; ?> </option> <?php } ?>
								
							</select>
						</div>
				 <div class="col-xs-2 objectcontact2">
				<input type="text" name="region" id="replyNumber" min="0" step="1" data-bind="value:replyNumber" value="<?php echo $_SESSION['Region_code']; ?>" class="form-control area" required>
				<span><?php echo (isset($error['region'])) ? $error['region'] : ''; ?></span>
				</div>
				 <div class="col-xs-3 objectcontact3">
				<input type="text" name="phone" id="replyNumber" min="0" step="1" data-bind="value:replyNumber" value="<?php echo $_SESSION['Phone']; ?>" class="form-control phone" required>
				<span><?php echo (isset($error['phone'])) ? $error['phone'] : ''; ?></span>
				</div>
				</div>
				<div class="form-group form-inline<?php echo (isset($error['mobile'])) ? 'warning' : ''; ?>">
					<label class="col-sm-2 control-label" for="Phone">Mobile Phone</label>
						<div class="col-sm-4 objectcontact2">
							<select name=country2 class="form-control country">
							<?php $sql2="SELECT * FROM business_partner a,country_code b WHERE a.Country_code2=b.Country_code AND Bp_id='{$_SESSION['Bp_id']}'" ;
									$query2=mysql_query($sql2);
									while($data2=mysql_fetch_array($query2))
									{ $code2=$data2['Country_code2']; 
									  $country2=$data2['Country_name']; ?>
								<option value="<?php echo $code2; ?>"><?php echo $_SESSION['Country_code2']; echo ' - '; echo $country2; ?> </option> <?php } ?>
							<?php $sql=("SELECT * FROM country_code") or die (mysql_error());
								$query=mysql_query($sql);
								while($data=mysql_fetch_array($query))
								{ $code2=$data['Country_code']; 
								  $country=$data['Country_name']; ?>
							<option value="<?php echo $code2; ?>"><?php echo $code2; echo ' - '; echo $country; ?> </option> <?php } ?>
							</select>
						</div>
				<div class="col-xs-3 objectcontact2">
					<input type="text" name="mobile" id="replyNumber" min="0" step="1" data-bind="value:replyNumber" value="<?php echo $_SESSION['Phone_mobile']; ?>" class="form-control phone">
				</div>			
				<span class="help-block"><?php echo (isset($error['mobile'])) ? $error['mobile'] : ''; ?></span>
						
				</div>
				<div class="form-group <?php echo (isset($error['faximile'])) ? 'warning' : ''; ?>">
					<label class="col-sm-4 control-label" for="Faximile">Faximile</label>
					<!--	<div class="col-lg-4 field">Faximile -->
						<div class="col-sm-4 objectcontact">
							<input type="text" name="faximile" value="<?php echo $_SESSION['Fax']; ?>" id="replyNumber" min="0" step="1" data-bind="value:replyNumber" class="form-control">
						<!--	<input type="text" name="faximile" placeholder="*Enter your Faximile" data-rule="maxlen:6" data-msg="Please enter at least 6 chars" />-->
							<span class="help-block"><?php echo (isset($error['faximile'])) ? $error['faximile'] : ''; ?></span>
						</div>
				</div>
				<div class="form-group">
					<label class="col-sm-4 control-label" for="Email">Primary Email</label>
					<!--	<div class="col-lg-4 field">Email -->
						<div class="col-sm-4 objectcontact">
						<input type="email" name="email" class="form-control" value="<?php echo $_SESSION['Email']; ?>" readonly="readonly">
						</div>
				</div>
				<div class="form-group <?php echo (isset($error['email'])) ? 'warning' : ''; ?>">
					<label class="col-sm-4 control-label" for="Email">Secondary Email (Optional) </label>
					<!--	<div class="col-lg-4 field">Email -->
						<div class="col-sm-4 objectcontact">
						<input type="email" name="email2" class="form-control" value="<?php echo $_SESSION['Email2']; ?>">
							<span class="help-block"><?php echo (isset($error['email'])) ? $error['email'] : ''; ?></span>
						</div>
				</div>
				<div class="form-group <?php echo (isset($error['website'])) ? 'warning' : ''; ?>">
					<label class="col-sm-4 control-label" for="Website">Website</label>
						<!--<div class="col-lg-4 field">Website -->
						<div class="col-sm-4 objectcontact">
						<input type="url" name="website" class="form-control" value="<?php echo $_SESSION['Website']; ?>" required>
						<!--	<input type="text" name="website" placeholder="*Enter your Website" data-rule="maxlen:6" data-msg="Please enter at least 6 chars" />-->
							<span class="help-block"><?php echo (isset($error['website'])) ? $error['website'] : ''; ?></span>
						</div>
				</div>
				<div class="form-group <?php echo (isset($error['username'])) ? 'warning' : ''; ?>">
					<label class="col-sm-4 control-label" for="Username">Username</label>
						<!--<div class="col-lg-4 field">Username -->
						<div class="col-sm-4 objectcontact">
						<input type="text" name="username" class="form-control" value="<?php echo $_SESSION['Username']; ?>" readonly="readonly">
						<!--	<input type="text" name="username" placeholder="*Enter your Username" data-rule="maxlen:6" data-msg="Please enter at least 6 chars" /> -->
							<span class="help-block error"><?php echo (isset($error['username'])) ? $error['username'] : ''; ?></span>
						</div>
				</div>
				<!--		<div class="form-group <?php echo (isset($error['err_captcha'])) ? 'warning' : ''; ?>">
					<label class="col-sm-4 control-label" for="captcha"><img src="captcha.php" /></label>
						<div class="col-xs-4">
						<input name="captcha" type="text" class="form-control" placeholder="Input Captcha" required>
							<p class="help-block"><?php echo (isset($error['err_captcha'])) ? $error['err_captcha'] : ''; ?></p>
						</div>
					</div> -->
						<div class="form-group">
			<label class="col-sm-4 control-label" for="tombol"></label>
				<div class="col-sm-4 objectcontact">
					<button class="btn btn-primary btn-sm active" type="submit">Send</button> <button class="btn btn-primary btn-sm active" type="reset">Cancel</button>
				</div>
			</div>
				</form>
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