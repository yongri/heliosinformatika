<?php session_start();
include "connection.php";  
include "cons.php";
include"header.php"; 
include "library/class.phpmailer.php";
function save_record($salutation,$name,$title,$company,$industry,$code1,$code2,$region,$phone,$mobile,$email,$subject,$message,$datepost)
	{
		$sql="INSERT INTO contact VALUES ('','$salutation','$name','$title','$company','$industry','$code1','$code2','$region','$phone','$mobile','$email','$subject','$message','$datepost')";
		$query=mysql_query($sql); //echo $sql;
		return ($query) ? TRUE : FALSE;
	}
	if ($_POST)
	{
		$is_error 	= FALSE;
		$is_numeric	= FALSE;
		$salutation	=$_POST['salutation'];
		$name		=$_POST['name'];
		$title		=$_POST['title'];
		$company	=$_POST['company'];
		$industry	=$_POST['industry'];
		$code1		=$_POST['country1'];
		$code2		=$_POST['country2'];
		$region		=$_POST['region'];
		$phone		=$_POST['phone'];
		$mobile		=$_POST['mobile'];
		$email		=$_POST['email'];
		$subject	=$_POST['subject'];
		$message	=$_POST['message'];
		$datepost	=date('Y').'-'.date('m').'-'.date('d');
	if ($name == '')
	{
		$is_error = TRUE;
		$error['name'] = 'Name is required';
	}
	if ($company == '')
	{
		$is_error = TRUE;
		$error['company'] = 'Company is required';
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
			$error['region']  = 'The area code entered was not 3 digits long';
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
			$error['phone']  = 'The phone entered was not 5 digits long';
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
			$error['mobile']  = 'The mobile entered was not 6 digits long';
		} 
		else 
		{
			/* Success */
		}
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
	}
	/* if ($subject == '')
	{
		$is_error = TRUE;
		$error['subject'] = 'Subject is required';
	} */
	if ($message == '')
	{
		$is_error = TRUE;
		$error['message'] = 'Message is required';
	}
	
	if (!$is_error)
	{
					$mail = new PHPMailer();
					$mail->IsHTML(true);
					$mail->Body = $message;
					$mail->IsSMTP(); // telling the class to use SMTP
					$mail->SMTPDebug  = 1;                     // enables SMTP debug information (for testing)
																	   // 1 = errors and messages
																	   // 2 = messages only
					$mail->SMTPAuth   = true;                  // enable SMTP authentication
					$mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
					$mail->Host       = "smtp.gmail.com";      // we use GMAIL as the SMTP server
					$mail->Port       = 465;                   // set the SMTP port for the GMAIL server
					$mail->Username   = "webadmin@computradetech.com";  // GMAIL username
					$mail->Password   = "admincti";            // GMAIL password
					$mail->SetFrom('webadmin@computradetech.com',$email);
					$mail->Subject    = "Helios - ".$subject;
					$mail->AltBody    = "To view the message, please use an HTML compatible mail viewer!"; // optional, comment out and test
					$mail->AddAddress('info@heliosinformatika.com');
					$mail->AddCc('marketing@computradetech.com');
					if( ! $mail->Send()) 
					{
						echo "Mailer Error: " . $mail->ErrorInfo;
					}
					else
					{
						if(save_record($salutation,$name,$title,$company,$industry,$code1,$code2,$region,$phone,$mobile,$email,$subject,$message,$datepost))
						{
										$end_message =  "<div class='alert alert-success alert-dismissable'>
														<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
														Thank you. your comment has been saved! </div>";
								
						}
						else
						{
							$end_message = "<div class='alert alert-warning alert-dismissable'>
													  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
													  <strong>Sorry! </strong>your comment is not saved!</div>";
						}
					}
	}
	
}
?>
<div class="container overview2">
	<div class="container overviewmidle">
		<div class="col-lg-12">
			<div class="col-lg-8 pull-left">
				<ol class="breadcrumb">
					<li><a href="#" class="jejak">Home</a></li>
					<li class="active">Contact Us</li>
				</ol>
			</div>
			<div class="col-lg-4">
					<!-- Title Product -->	<h3 class="contact">Contact Us</h3>
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
									<div class="col-lg-4 maps">
										<h4 class="location"><strong>Location</strong></h4>
										<iframe src="https://mapsengine.google.com/map/u/0/embed?mid=zWC1raBKCs0M.kV64qXTn3TqU" width="270" height="270"></iframe>
									
									</div>
								</div>
					</div>
						<div class="col-lg-8">
							<div class="box">
								<div class="box-gray overviewcontent2">	
									<p align="justify">
									For any inquiries related to HP server & storage, you can send email to us by clicking on address we provide on the left side in this page. 
									You can also fill out form below for your convenience. </p><br/>
									<p align="justify"><em>Required fields are marked * </em></p> <br/>
									
									<form action="" method="post" class="form-horizontal formcontact" role="form" data-toggle="validator">
										<?php 
										if($_POST)
										{
											if(isset($end_message))
											{
												echo $end_message;										
											}
										}
										?>	
										
										<div class="form-group  <?php echo (isset($error['salutation'])) ? 'warning' : ''; ?>">
											<label class="col-sm-2 control-label" for="Salutation">Salutation</label>
												<div class="col-sm-4 objectcontact">
													<select name=salutation class="form-control salutation" autofocus>
														<option>Mr</option>
														<option>Mrs</option>
														<option>Miss</option>
													</select>
													<span class="help-block"><?php echo (isset($error['salutation'])) ? $error['salutation'] : ''; ?></span>
												</div>
										</div> 
										<div class="form-group <?php echo (isset($error['name'])) ? 'warning' : ''; ?>">
											<label class="col-sm-2 control-label" for="Name">Name <font class="star">*</font></label>
											<div class="col-sm-4 objectcontact">
												<input type="text" name="name" class="form-control" required>
												<!--	<input type="text" name="name" placeholder="*Enter your Name" data-rule="maxlen:6" data-msg="Please enter at least 6 chars" />-->
													<span class="help-block"><?php echo (isset($error['name'])) ? $error['name'] : ''; ?></span>
											</div>
										</div>
											<div class="form-group <?php echo (isset($error['title'])) ? 'warning' : ''; ?>">
		<label class="col-sm-2 control-label" for="Title">Job Title</label>
	
			<div class="col-sm-4 objectcontact">
				<input type="text" name="title" class="form-control">
					<span class="help-block"><?php echo (isset($error['title'])) ? $error['title'] : ''; ?></span>
			</div>
	</div>
		<div class="form-group <?php echo (isset($error['company'])) ? 'warning' : ''; ?>">
		<label class="col-sm-2 control-label" for="Company">Company <font class="star">*</font></label>
	
			<div class="col-sm-4 objectcontact">
				<input type="text" name="company" class="form-control">
					<span class="help-block"><?php echo (isset($error['company'])) ? $error['company'] : ''; ?></span>
			</div>
	</div>
	<div class="form-group <?php echo (isset($error['industry'])) ? 'warning' : ''; ?>">
				<label class="col-sm-2 control-label" for="Industry">Industry</label>
					<div class="col-sm-4 objectcontact">
					<select name=industry class="form-control">
								<option>Financial Services</option>
								<option>Communications</option>
								<option>Chemicals & Pharmacy</option>
								<option>Engineering & Construction</option>
								<option>Educational & Research</option>
								<option>Media Entertainment</option>
								<option>Industrial Manufacturing</option>
								<option>Mining, Oil & Gas</option>
								<option>Professional Services</option>
								<option>Healthcare</option>
								<option>Retail & Distribution</option>
								<option>Information Technology</option>
								<option>Other</option>
							</select>
							<span class="help-block"><?php echo (isset($error['industry'])) ? $error['industry'] : ''; ?></span>
						</div>
					</div>
					<div class="form-group form-inline<?php echo (isset($error['phone'])) ? 'warning' : ''; ?>">
					<label class="col-sm-2 control-label" for="Phone">Phone <font class="star">*</font></label>
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
					<div class="form-group <?php echo (isset($error['email'])) ? 'warning' : ''; ?>">
					<label class="col-sm-2 control-label" for="Email">Email <font class="star">*</font></label>
						<div class="col-sm-4 objectcontact">
						<input type="email" name="email" class="form-control" required>
							<span class="help-block"><?php echo (isset($error['email'])) ? $error['email'] : ''; ?></span>
						</div>
				</div>
				<div class="form-group <?php echo (isset($error['subject'])) ? 'warning' : ''; ?>">
					<label class="col-sm-2 control-label" for="Subject">Subject</label>
						<div class="col-sm-4 objectcontact">
						<select name=subject class="form-control">
								<option>General Information</option>
								<option>Sales Inquiries</option>
								<option>Technical Support</option>
								<option>Partnership</option>
								<option>Others</option>
								
							</select>
							<span class="help-block"><?php echo (isset($error['subject'])) ? $error['subject'] : ''; ?></span>
						</div>
				</div>
				<div class="form-group <?php echo (isset($error['message'])) ? 'warning' : ''; ?>">
			<label class="col-sm-2 control-label" for="Message">Message</label>
			<!--<div class="col-lg-4 field">Address -->
				<div class="col-sm-4 objectcontact">
					<textarea name="message" class="form-control" required></textarea>
						<span class="help-block"><?php echo (isset($error['message'])) ? $error['message'] : ''; ?></span>
				</div>
		</div>
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

<?php include "footer.php"; ?>