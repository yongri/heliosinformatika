<?php
session_start(); 
if(!isset($_SESSION['User_id'])){
header("location:login.php");
}
else
{
include  "../connection.php";
include "header.php";
include "../library/class.phpmailer.php"; 
?>
          <ul class="nav navbar-nav navbar-right navbar-user">
            <li class="dropdown messages-dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"> Welcome, <?php if(isset($_SESSION['User_id']))  echo $_SESSION['Username'];  ?><b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li class="dropdown user-dropdown">
					<li><a href="logout.php"><i class="fa fa-power-off"></i> Log Out</a></li>
					</li>
				</ul>
			</li>
		  </ul>
        </div><!-- /.navbar-collapse -->
      </nav>
<!--content-->
      <div id="page-wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h1> <img src="../img/helios.png" width="50px" height="50px"> Business Partner</h1>
            <ol class="breadcrumb">
              <li class="active"><i class="fa fa-dashboard"></i> Business Partner</li>
            </ol>
			<div class="span6 pull-right">
				<a class="btn btn-small btn-primary" href="bp_list.php">Back</a>
			</div>
			</div></div><br>
			<div class="row">
          <div class="col-lg-12">
            <div class="panel panel-primary">
			  <div class="panel-body">
			  <?php
	if (isset($_POST['bkirim']))
	{
		
		$bp_id	=$_POST['Bp_id'];
		$name=$_POST['name'];
		$address=$_POST['Address'];
		$country_code=$_POST['Country_code'];
		$region_code=$_POST['Region_code'];
		$phone=$_POST['Phone'];
		$phone_mobile=$_POST['Phone_mobile'];
		$fax=$_POST['Fax'];
		$email=$_POST['Email'];
		$website=$_POST['Website'];
		$status=$_POST['Status'];
		$Username=$_POST['Username'];
		$Password=$_POST['Password'];
		
		$sql="UPDATE business_partner SET Status='$status' WHERE Bp_id='{$_GET['id']}'";	
		$query=mysql_query($sql); echo $sql;
			
				if($query)
				{
					echo "<div class='alert alert-success alert-dismissable'>
									  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
									  <strong>Good!</strong> Update Success!</div>";
				}
				else
				{
					echo "<div class='alert alert-warning alert-dismissable'>
									  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
									  <strong>Sorry!</strong>Update failed!</div>";
				}	
					$message.='Dear, '.$name.'<br/>';
					$message.='Thank you for your registration on our website!  <br/><br/>';
					$message.='Now you can login to business partner portal on <a href="http://www.heliosinformatika.com/business-partner-login">http://www.heliosinformatika.com/business-partner-login</a> using the username and password below : <br/><br/>';
					$message.='---------------------------------------------------------------------------------------------------------<br>';
					$message.='Username : '.$Username.' <br/>';
					$message.='Password : '.$Password.' <br/>';
					$message.='---------------------------------------------------------------------------------------------------------<br/><br/>';
					$message.='Regards, <br><br>';
					$message.='PT.Helios Informatika Nusantara <br><br>';
					$message.='Graha BIP, 3rd Floor<br/>';
					$message.='Jl. Jend. Gatot Subroto Kav. 23<br/>';
					$message.='Jakarta, 12930, Indonesia.<br/>';
					$message.='Phone : 62-21-521 0560<br/>';
					$message.='Fax : 62-21-521 0561 <br/>';
					$message.='Website : http://www.heliosinformatika.com<br/>';
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
					$mail->AddAddress('webadmin@computradetech.com');
					//$mail->AddCc('marketing@computradetech.com');
					if( ! $mail->Send()) 
					{
						echo "Mailer Error: " . $mail->ErrorInfo;
					}
					else
					{
						echo "<div class='alert alert-success alert-dismissable'>
							<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
							The Email Confirmation send!</div>";
								
						
					}
	
	
}
$sql="SELECT * FROM business_partner WHERE Bp_id='{$_GET['id']}'";
$query=mysql_query($sql); //echo $sql;
$data=mysql_fetch_array($query);

$bp_id	=$data['Bp_id'];
$name=$data['Name'];
$address=$data['Address'];
$country_code=$data['Country_code'];
$region_code=$data['Region_code'];
$phone=$data['Phone'];
$phone_mobile=$data['Phone_mobile'];
$fax=$data['Fax'];
$email=$data['Email'];
$website=$data['Website'];
$status=$data['Status'];
$Username=$data['Username'];
$Password=$data['Password'];
?>
<form action="" method="post" class="form-horizontal" role="form" data-toggle="validator">
<p><strong>Select option 'Confirmed' below to confirm the business partner and then click Send. So, The email confirmation will be automatically send to the business partner. </strong></p>
	<div class="form-group">
		<label class="col-sm-4 control-label" for="bp_id"></label>
			<div class="col-sm-4 objectcontact">
				<input type="hidden" name="Bp_id" class="form-control" value="<?php echo $bp_id; ?>">
			</div>
	</div>
	<div class="form-group">
					<label class="col-sm-4 control-label" for="Username"></label>
						<!--<div class="col-lg-4 field">Username -->
						<div class="col-sm-4 objectcontact">
						<input type="hidden" name="Username" class="form-control" value="<?php echo $Username; ?>">
					</div>
				</div>
						<div class="form-group">
							<label class="col-sm-4 control-label" for="inputPassword"></label>
								<div class="col-sm-4 objectcontact">
									<input name="Password" type="hidden" data-toggle="validator" data-minlength="6" class="form-control" value="<?php echo $Password; ?>">
									
								</div>
						</div>
	<div class="form-group <?php echo (isset($error['name'])) ? 'warning' : ''; ?>">
		<label class="col-sm-4 control-label" for="Name">Name</label>
		<!--	<div class="col-lg-4 field">Name -->
			<div class="col-sm-4 objectcontact">
				<input type="text" name="name" class="form-control" value="<?php echo $name; ?>" readonly="readonly">
				<!--	<input type="text" name="name" placeholder="*Enter your Name" data-rule="maxlen:6" data-msg="Please enter at least 6 chars" />-->
					<span class="help-block"><?php echo (isset($error['name'])) ? $error['name'] : ''; ?></span>
			</div>
	</div>
		<div class="form-group <?php echo (isset($error['address'])) ? 'warning' : ''; ?>">
			<label class="col-sm-4 control-label" for="Address">Address</label>
			<!--<div class="col-lg-4 field">Address -->
				<div class="col-sm-4 objectcontact">
					<textarea name="address" class="form-control" readonly="readonly"><?php echo $address; ?></textarea>
						<span class="help-block"><?php echo (isset($error['address'])) ? $error['address'] : ''; ?></span>
				</div>
		</div>
				<div class="form-group form-inline<?php echo (isset($error['phone'])) ? 'warning' : ''; ?>">
					<label class="col-sm-4 control-label" for="Phone">Phone</label>
						<div class="col-sm-2 objectcontact2">
							<select name=country1 class="form-control country" readonly="readonly">
								<option value="<?php echo $country_code; ?>"><?php echo $country_code; ?> </option> 
								
							</select>
						</div>
					 <div class="col-xs-2 objectcontact2">
						<input type="text" readonly="readonly" name="region" id="replyNumber" min="0" step="1" data-bind="value:replyNumber" value="<?php echo $phone; ?>" class="form-control area" required>
						<span><?php echo (isset($error['region'])) ? $error['region'] : ''; ?></span>
					</div>
					 <div class="col-xs-3 objectcontact3">
						<input type="text" readonly="readonly" name="phone" id="replyNumber" min="0" step="1" data-bind="value:replyNumber" value="<?php echo $phone_mobile; ?>" class="form-control phone" required>
						<span><?php echo (isset($error['phone'])) ? $error['phone'] : ''; ?></span>
					</div>
				</div>
				<div class="form-group <?php echo (isset($error['faximile'])) ? 'warning' : ''; ?>">
					<label class="col-sm-4 control-label" for="Faximile">Faximile</label>
					<!--	<div class="col-lg-4 field">Faximile -->
						<div class="col-sm-4 objectcontact">
							<input type="text" readonly="readonly" name="faximile" value="<?php echo $fax; ?>" id="replyNumber" min="0" step="1" data-bind="value:replyNumber" class="form-control">
						<!--	<input type="text" name="faximile" placeholder="*Enter your Faximile" data-rule="maxlen:6" data-msg="Please enter at least 6 chars" />-->
							<span class="help-block"><?php echo (isset($error['faximile'])) ? $error['faximile'] : ''; ?></span>
						</div>
				</div>
				<div class="form-group">
					<label class="col-sm-4 control-label" for="Email">Primary Email</label>
					<!--	<div class="col-lg-4 field">Email -->
						<div class="col-sm-4 objectcontact">
						<input type="email" readonly="readonly" name="email" class="form-control" value="<?php echo $email; ?>" readonly="readonly">
						</div>
				</div>
				<div class="form-group <?php echo (isset($error['website'])) ? 'warning' : ''; ?>">
					<label class="col-sm-4 control-label" for="Website">Website</label>
						<!--<div class="col-lg-4 field">Website -->
						<div class="col-sm-4 objectcontact">
						<input type="url" readonly="readonly" name="website" class="form-control" value="<?php echo $website; ?>" required>
						<!--	<input type="text" name="website" placeholder="*Enter your Website" data-rule="maxlen:6" data-msg="Please enter at least 6 chars" />-->
							<span class="help-block"><?php echo (isset($error['website'])) ? $error['website'] : ''; ?></span>
						</div>
				</div>
				<div class="form-group form-inline<?php echo (isset($error['status'])) ? 'warning' : ''; ?>">
					<label class="col-sm-4 control-label" for="Status">Status</label>
						<div class="col-sm-4 objectcontact2">
							<?php echo "
					<select name='Status'>
						<option value='Unconfirmed' ";
					echo ($status=='Unconfirmed') ? 'selected' : '' ; 
					echo ">Unconfirmed</option>
						<option value='Confirmed' ";
					echo ($status=='Confirmed') ? 'selected' : '' ;
					echo ">Confirmed</option>
					</select> "; ?>
						</div>
					</div>
						<div class="form-group">
							<label class="col-sm-4 control-label" for="tombol"></label>
							<div class="col-sm-4 objectcontact">
								<button class="btn btn-primary btn-sm active" name="bkirim" type="submit">Send</button> <button class="btn btn-primary btn-sm active" type="reset">Cancel</button>
							</div>
						</div> 
				</form>
				</div>
        </div>
        </div><!-- /.row -->
      </div><!-- /#page-wrapper -->

    </div>
<!--end content-->

</div><!-- /#wrapper -->
   
  </body>
</html>
<?php } ?>