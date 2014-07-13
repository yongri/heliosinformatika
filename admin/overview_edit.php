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
            <h1><img src="../img/helios.png" width="50px" height="50px"> Company Background</h1>
        </div><!-- /.row -->
      </div><!-- /#page-wrapper -->
		 <div class="row">
          <div class="col-lg-12">
            <ol class="breadcrumb">
              <li><i class="fa fa-dashboard"></i> About Us</li>
			  <li><i class="fa fa-dashboard"></i> Company Background </li>
			  <li class="active"><i class="fa fa-dashboard"></i> Edit</li>
            </ol>
			<div class="row">
          <div class="col-lg-12">
            <div class="panel panel-primary">
	<div class="panel-body">
<?php
	if (isset($_POST['bkirim']))
	{
		if(isset($_POST['overview_id']))
		{
		$overview_id=$_POST['overview_id'];
		}
		else
		$overview_id=1;
		if(empty($_POST['Description']))
		{
			$error['err_description']='Description is required!';
		}
		else
		{
		$Description=$_POST['Description'];
		}
		if(empty($error))
		{
				$sql="UPDATE overview SET Description='$Description' WHERE Overview_id='$overview_id'";
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
	} else
	var_dump($error);
}
		$id = $_GET['id'];
		$sql=("SELECT * FROM overview WHERE Overview_id='$id'") or die (mysql_error());
		$query=mysql_query($sql);
		while($data=mysql_fetch_array($query))
		{		
		echo "<form action='' method='post' enctype='multipart/form-data' class='form-horizontal' role='form'>";
		$Description=$data['Description'];
		//$file=$data['Overview_image'];
		}
	?>
	
		<div class="form-group <?php echo (isset($error['err_description'])) ? 'warning' : ''; ?>">
			<label class="col-sm-1 control-label" for="Description"></label>
				<div class="col-sm-1">
					<textarea name="Description" rows="5" class="form-control"><?php echo (isset($Description)) ? $Description : ''; ?></textarea>
					<p class="help-block"><?php echo (isset($error['err_description'])) ? $error['err_description'] : ''; ?></p>
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