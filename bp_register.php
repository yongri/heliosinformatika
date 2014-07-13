<?php
session_start();
if(isset($_SESSION['Bp_id']))
{
	echo"<div class='alert alert-warning alert-dismissable'>
									  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
									  <strong>Sorry! </strong> You have already registered!</div>";
}
else
{
include "connection.php";
include "cons.php";
include "header.php";
function unique_email($email)
{
	$sql = "SELECT Email 
		FROM business_partner 
		WHERE Email='$email'";
	$query=mysql_query($sql);
	
	return (mysql_num_rows($query) > 0) ? FALSE : TRUE;
}

function save_record($bp_id,$name,$address,$city,$code1,$code2,$region,$phone,$mobile,$faximile,$email,$website,$username,$password)
{
	$sql="INSERT INTO business_partner (Bp_id, Name, Address, City_name, Country_code, Country_code2,Region_code,Phone,Phone_mobile, Fax, Email, Website, Status, Username, Password) VALUES ('','$name','$address','$city','$code1','$code2','$region','$phone','$mobile','$faximile','$email','$website','Unconfirmed','$username','$password')";
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
	$is_error 	= FALSE;
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
	$email		=$_POST['email'];
	$website	=$_POST['website'];
	$username	=$_POST['username'];
	//$password	=md5($_POST['password']);
	
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
	if ($username == '')
	{
		$is_error = TRUE;
		$error['username'] = 'Username is required';
	}
	elseif(!unique_username($username))
	{
		$is_error = TRUE;
		$error['username'] = 'Username is already used!';
	}
	
	if ($email == '')
	{
		$is_error = TRUE;
		$error['email'] = 'Email is required';
	}
	else
	{
		if ( ! preg_match("/^([a-zA-z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/",$email))
		{
			$is_error = TRUE;
			$error['email'] = 'Your Email address is invalid';
		}
		else
		{
			if (!unique_email($email))
			{
				$is_error = TRUE;
				$error['unique'] = "<div class='alert alert-warning alert-dismissable'>
									  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
									  <strong>Sorry! </strong> Your Email Has Been Registered! Please Login <a href='bp.php'>here</a></div>";
			}	
		}		
	}
	
	if ($_POST['password1'] == '')
	{
		$is_error = TRUE;
		$error['password1'] = 'Password is required';
	}
	else
	{
		if(strlen($_POST['password1'])<6)
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
			else
			{
				$password=$_POST['password1'];
			}
		}
	}
	if ($_POST['password2'] == '')
	{
		$is_error = TRUE;
		$error['password2'] = 'Password2 is required';
	}
	
	//if(isset($_POST["captcha"]) AND $_POST["captcha"]!="" && $_SESSION["code"]==$_POST["captcha"])
	//if(isset($_POST['captcha']) != ($_SESSION['code']))
	//{
	//	$is_error = TRUE;		
//		$error['err_captcha']='Wrong Code Entered';
	//}  
	
	if (!$is_error)
	{
		if(save_record($bp_id,$name,$address,$city,$code1,$code2,$region,$phone,$mobile,$faximile,$email,$website,$username,$password))
		{
			$end_message =  "<div class='alert alert-success alert-dismissable'>
										<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
										Thank you. Your information has been saved! You must wait for the confirmation by our Admin. Please check your Email regularly. </div>";
		}
		else
		{
			$end_message = "<div class='alert alert-warning alert-dismissable'>
									  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
									  <strong>Sorry! </strong> Your data is not saved!</div>";
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
					<li class="active">Register</li>
				</ol>
			</div>
			<div class="col-lg-4">
					<!-- Title Product -->	<h3 class="business_partner">Register Partner</h3>
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
							<div class="box-gray overviewcontent2">
							<form action="" method="post" class="form-horizontal" role="form" data-toggle="validator">
								<?php 
								if($_POST)
								{
									if(isset($error['unique']))
									{
										echo $error['unique'];
									}
									elseif(isset($end_message))
									{
										echo $end_message;										
									}
								}
								?>
	<div class="form-group <?php echo (isset($error['name'])) ? 'warning' : ''; ?>">
		<label class="col-sm-4 control-label" for="Name">Name</label>
		<!--	<div class="col-lg-4 field">Name -->
			<div class="col-sm-4 objectcontact">
				<input type="text" name="name" class="form-control" required autofocus>
				<!--	<input type="text" name="name" placeholder="*Enter your Name" data-rule="maxlen:6" data-msg="Please enter at least 6 chars" />-->
					<span class="help-block"><?php echo (isset($error['name'])) ? $error['name'] : ''; ?></span>
			</div>
	</div>
		<div class="form-group <?php echo (isset($error['address'])) ? 'warning' : ''; ?>">
			<label class="col-sm-4 control-label" for="Address">Address</label>
			<!--<div class="col-lg-4 field">Address -->
				<div class="col-sm-4 objectcontact">
					<textarea name="address" class="form-control" required></textarea>
						<span class="help-block"><?php echo (isset($error['address'])) ? $error['address'] : ''; ?></span>
				</div>
		</div>
			<div class="form-group <?php echo (isset($error['city'])) ? 'warning' : ''; ?>">
			<!--<div class="col-lg-4 field">City -->
				<label class="col-sm-4 control-label" for="City">City</label>
					<div class="col-sm-4 objectcontact">
					<?php //$sql="SELECT * FROM city ORDER BY City_name"; 
						//$query=mysql_query($sql); ?>
					<!--	<select name=city class="form-control">
							<option value="">--Select Your City--</option> -->
							<input type="text" name="city" class="form-control" required>
							<?php //while($data=mysql_fetch_array($query)) 
						//	{
						//		echo '<option value="'.$data['City_id'].'">'.$data['City_name'].'</option>';
						//	}
							?> 
					<!--	</select> -->
							<span class="help-block"><?php echo (isset($error['city'])) ? $error['city'] : ''; ?></span>
					</div>
			</div>
					<div class="form-group form-inline<?php echo (isset($error['phone'])) ? 'warning' : ''; ?>">
					<label class="col-sm-2 control-label" for="Phone">Phone</label>
						<div class="col-sm-4 objectcontact2">
						<select name=country1 class="form-control country">
						<option>--Country Code--</option>
					<?php $sql=("SELECT * FROM country_code") or die (mysql_error());
								$query=mysql_query($sql);
								while($data=mysql_fetch_array($query))
								{ $code=$data['Country_code']; 
								  $country=$data['Country_name']; ?>
							<option value="<?php echo $code; ?>"><?php echo $code; echo ' - '; echo $country; ?> </option> <?php } ?>
				</select><span class="help-block"><?php echo (isset($error['country'])) ? $error['country'] : ''; ?></span></div>
				 <div class="col-xs-2 objectcontact2">
				<input type="text" name="region" id="replyNumber" min="0" step="1" data-bind="value:replyNumber" class="form-control area" placeholder="area code" required>
				<span><?php echo (isset($error['region'])) ? $error['region'] : ''; ?></span>
				</div>
				 <div class="col-xs-3 objectcontact3">
				<input type="text" name="phone" id="replyNumber" min="0" step="1" data-bind="value:replyNumber" class="form-control phone" placeholder="phone number" required>
				<span><?php echo (isset($error['phone'])) ? $error['phone'] : ''; ?></span>
				</div>
				</div>
				<div class="form-group form-inline<?php echo (isset($error['mobile'])) ? 'warning' : ''; ?>">
					<label class="col-sm-2 control-label" for="Phone">Mobile Phone</label>
						<div class="col-sm-4 objectcontact2">
							<select name=country2 class="form-control country">
							<option>--Country Code--</option>
							<?php $sql=("SELECT * FROM country_code") or die (mysql_error());
									$query=mysql_query($sql);
									while($data=mysql_fetch_array($query))
									{ $code=$data['Country_code']; 
									  $country=$data['Country_name']; ?>
								<option value="<?php echo $code; ?>"><?php echo $code; echo ' - '; echo $country; ?> </option> <?php } ?>
							</select>
						</div>
				<div class="col-xs-3 objectcontact2">
					<input type="text" name="mobile" id="replyNumber" min="0" step="1" data-bind="value:replyNumber" class="form-control phone" placeholder="mobile number">
				</div>			
				<span class="help-block"><?php echo (isset($error['mobile'])) ? $error['mobile'] : ''; ?></span>
						
				</div>
				<div class="form-group <?php echo (isset($error['faximile'])) ? 'warning' : ''; ?>">
					<label class="col-sm-4 control-label" for="Faximile">Faximile</label>
					<!--	<div class="col-lg-4 field">Faximile -->
						<div class="col-sm-4 objectcontact">
							<input type="text" name="faximile" id="replyNumber" min="0" step="1" data-bind="value:replyNumber" class="form-control phone" required>
						<!--	<input type="text" name="faximile" placeholder="*Enter your Faximile" data-rule="maxlen:6" data-msg="Please enter at least 6 chars" />-->
							<span class="help-block"><?php echo (isset($error['faximile'])) ? $error['faximile'] : ''; ?></span>
						</div>
				</div>
				<div class="form-group <?php echo (isset($error['email'])) ? 'warning' : ''; ?>">
					<label class="col-sm-4 control-label" for="Email">Email</label>
					<!--	<div class="col-lg-4 field">Email -->
						<div class="col-sm-4 objectcontact">
						<input type="email" name="email" class="form-control" required>
							<!--<input type="text" name="email" placeholder="*Enter your Email" data-rule="maxlen:6" data-msg="Please enter at least 6 chars" /> -->
							<span class="help-block"><?php echo (isset($error['email'])) ? $error['email'] : ''; ?></span>
						</div>
				</div>
				<div class="form-group <?php echo (isset($error['website'])) ? 'warning' : ''; ?>">
					<label class="col-sm-4 control-label" for="Website">Website</label>
						<!--<div class="col-lg-4 field">Website -->
						<div class="col-sm-4 objectcontact">
						<input type="url" name="website" class="form-control" placeholder="Example : http://abcd.com" required>
						<!--	<input type="text" name="website" placeholder="*Enter your Website" data-rule="maxlen:6" data-msg="Please enter at least 6 chars" />-->
							<span class="help-block"><?php echo (isset($error['website'])) ? $error['website'] : ''; ?></span>
						</div>
				</div>
				<div class="form-group <?php echo (isset($error['username'])) ? 'warning' : ''; ?>">
					<label class="col-sm-4 control-label" for="Username">Username</label>
						<!--<div class="col-lg-4 field">Username -->
						<div class="col-sm-4 objectcontact">
						<input type="text" name="username" class="form-control" required>
						<!--	<input type="text" name="username" placeholder="*Enter your Username" data-rule="maxlen:6" data-msg="Please enter at least 6 chars" /> -->
							<span class="help-block error"><?php echo (isset($error['username'])) ? $error['username'] : ''; ?></span>
						</div>
				</div>
						<div class="form-group <?php echo (isset($error['password1'])) ? 'warning' : ''; ?>">
							<label class="col-sm-4 control-label" for="inputPassword">Password</label>
								<div class="col-sm-4 objectcontact">
									<input name="password1" type="password" data-toggle="validator" data-minlength="6" class="form-control" placeholder="Minimum of 6 characters" required>
									<span class="help-block error"><?php echo (isset($error['password1'])) ? $error['password1'] : ''; ?></span>
									
								</div>
						</div> 
						
					<div class="form-group <?php echo (isset($error['password2'])) ? 'warning' : ''; ?>">
					<label class="col-sm-4 control-label" for="Password">Confirm <br>Password </label>
								<div class="col-sm-4 objectcontact">
								  <input type="password" name="password2" class="form-control" placeholder="Confirm Password" required>
								  <div class="help-block with-errors"><?php echo (isset($error['password2'])) ? $error['password2'] : ''; ?></div>
								</div>
						</div> 
				<!--		<div class="form-group <?php echo (isset($error['err_captcha'])) ? 'warning' : ''; ?>">
					<label class="col-sm-4 control-label" for="captcha"><img src="captcha.php" /></label>
						<div class="col-xs-4 objectcontact">
						<input name="captcha" type="text" class="form-control" placeholder="Input Captcha" required>
							<p class="help-block"><?php echo (isset($error['err_captcha'])) ? $error['err_captcha'] : ''; ?></p>
						</div>
					</div>  -->
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

<?php include "footer.php";
}
 ?>