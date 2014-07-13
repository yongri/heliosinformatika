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
            <h1><img src="../img/helios.png" width="50px" height="50px"> Certificate</h1>
        </div><!-- /.row -->
      </div><!-- /#page-wrapper -->
		 <div class="row">
          <div class="col-lg-12">
            <ol class="breadcrumb">
              <li><i class="fa fa-dashboard"></i> About Us</li>
			  <li><i class="fa fa-dashboard"></i> Certificate </li>
			  <li class="active"><i class="fa fa-dashboard"></i> Edit</li>
            </ol>
			<div class="row">
          <div class="col-lg-12">
            <div class="panel panel-primary">
	<div class="panel-body">
<?php
	if (isset($_POST['bkirim']))
	{
		if(isset($_POST['Certificate_id']))
		{
		$Certificate_id=$_POST['Certificate_id'];
		}
		else
		$Certificate_id=1;
		if(empty($_POST['Certificate_name']))
		{
			$error['err_Certificate_name']='Certificate_name is required!';
		}
		else
		{
		$Certificate_name=$_POST['Certificate_name'];
		}
		if(empty($error))
		{
				$sql="UPDATE certificate SET Certificate_name='$Certificate_name' WHERE Certificate_id='$Certificate_id'";
				$query=mysql_query($sql); //echo $sql;
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
	} else
	var_dump($error);
}
		$id = $_GET['id'];
		$sql=("SELECT * FROM certificate WHERE Certificate_id='$id'") or die (mysql_error());
		$query=mysql_query($sql);
		while($data=mysql_fetch_array($query))
		{		
		echo "<form action='' method='post' enctype='multipart/form-data' class='form-horizontal' role='form'>";
		$Certificate_name=$data['Certificate_name'];
		}
	?>
	
		<div class="form-group <?php echo (isset($error['err_Certificate_name'])) ? 'warning' : ''; ?>">
			<label class="col-sm-1 control-label" for="Certificate_name"></label>
				<div class="col-sm-1">
					<textarea name="Certificate_name" rows="5" class="form-control"><?php echo (isset($Certificate_name)) ? $Certificate_name : ''; ?></textarea>
					<p class="help-block"><?php echo (isset($error['err_Certificate_name'])) ? $error['err_Certificate_name'] : ''; ?></p>
				</div>
		</div>
			<div class="form-group">
				<label class="col-sm-1 control-label"></label>
					<div class="col-sm-2">
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