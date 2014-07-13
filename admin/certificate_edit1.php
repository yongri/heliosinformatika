<?php
session_start(); 
if(!isset($_SESSION['User_id'])){
header("location:login.php");
}
else
{
include  "../connection.php";
include "header.php"; 
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
            <h1><img src="../img/helios.png" width="50px" height="50px"> Certifications</h1>
        </div><!-- /.row -->
      </div><!-- /#page-wrapper -->
		 <div class="row">
          <div class="col-lg-12">
            <ol class="breadcrumb">
              <li><i class="fa fa-dashboard"></i> About Us</li>
			  <li class="active"><i class="fa fa-dashboard"></i> Certifications</li>
            </ol>
			<div class="row">
          <div class="col-lg-12">
            <div class="panel panel-primary">
	<div class="panel-body">
<?php
	if (isset($_POST['bkirim']))
	{
		$Certificateid	=$_POST['Certificateid'];
		if(empty($_POST['Certificate_name']))
		{
			$error['err_Certificate_name']='Certificate name Required';
		}
		else
		{
		$Certificate_name=$_POST['Certificate_name'];
		}
		$Created_at= date('Y').'-'.date('m').'-'.date('d');
		if(empty($error))
		{
				$sql="UPDATE certificate SET Certificate_name='$Certificate_name', Created_at='$Created_at' WHERE Certificate_id='".$Certificateid."'";	
				$query=mysql_query($sql);
			
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
		}
	} else
	//var_dump($error);

		$id = $_GET['id'];
		$sql=("SELECT * FROM certificate WHERE Certificate_id='$id'") or die (mysql_error());
		$query=mysql_query($sql);
		while($data=mysql_fetch_array($query))
		{		
		echo "<form action='' method='post' class='form-horizontal' role='form'>";
		$Certificateid	=$data['Certificate_id'];
		$Certificate_name=$data['Certificate_name'];
		}
	?>
		<div class="form-group">
				<label class="col-sm-2 control-label" for="Certificateid"></label>
					<div class="col-sm-2">
					<input type="hidden" value="<?php echo (isset($Certificateid)) ? $Certificateid : ''; ?>" class="form-control" name="Certificateid">
					</div>
		</div>
		<div class="form-group <?php echo (isset($error['err_Certificate_name'])) ? 'warning' : ''; ?>">
			<label class="col-sm-2 control-label" for="Certificate_name"></label>
				<div class="col-sm-8">
				<textarea name="Certificate_name"  class="form-control" rows="3"><?php echo (isset($Certificate_name)) ? $Certificate_name : ''; ?></textarea>
					<p class="help-block"><?php echo (isset($error['err_Certificate_name'])) ? $error['err_Certificate_name'] : ''; ?></p>
				</div>
		</div>
			<div class="form-group">
				<label class="col-sm-2 control-label"></label>
					<div class="col-sm-4">
						<input name="bkirim" type="submit" id="bkirim" class="btn btn-primary" value="Save" />
						<input type="reset" name="bbatal" id="bbatal" class="btn btn-default" value="Cancel" />
					</div>
			</div>
	</form>
</div><!-- panel body -->
</div><!-- panel primary -->
</div><!-- span 12 -->
</div><!-- row -->
</div> <!-- page wraper-->
</div>
		<?php } ?>			