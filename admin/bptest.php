<?php session_start();
include "connection.php";  
include "cons.php";
include"header.php"; 
include "library/class.phpmailer.php";
function update_record($status)
	{
		$sql="UPDATE business_partner SET status='$status' WHERE Bp_id='$bp_id'";
		$query=mysql_query($sql);
		return ($query) ? TRUE : FALSE;
	}
	if ($_POST)
	{
		$is_error 	= FALSE;
		$status=$_POST['status'];
		$email=$_POST['email'];
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
					$mail->SetFrom('info@heliosinformatika.com','Helios');
					$mail->Subject    = "PT. Helios Informatika Nusantara - Business Partner Confirmation";
					$mail->AltBody    = "To view the message, please use an HTML compatible mail viewer!"; // optional, comment out and test
					$mail->AddAddress($email);
					//$mail->AddCc('marketing@computradetech.com');
					if( ! $mail->Send()) 
					{
						echo "Mailer Error: " . $mail->ErrorInfo;
					}
					else
					{
						if(update_record($status))
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
					<div class="form-group <?php echo (isset($error['email'])) ? 'warning' : ''; ?>">
					<label class="col-sm-2 control-label" for="Email">Email <font class="star"></font></label>
						<div class="col-sm-4 objectcontact">
						<input type="hidden" name="email" class="form-control" value="<?php echo (isset($email)) ? $email : ''; ?>">
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