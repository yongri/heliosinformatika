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
			<h1><img src="../img/helios.png" width="50px" height="50px">  Left Banner </h1>
            <ol class="breadcrumb">
              <li><i class="fa fa-dashboard"></i> Dashboard</li> <span class="divider">/</span>
			<li class="active">Left Banner </li>
            </ol>
			<div class="span6 pull-right">
				<a class="btn btn-small btn-primary" href="banner.php">Back</a>
			</div>
          </div>
        </div><!-- /.row --><br>
        <div class="row">
          <div class="col-lg-12">
				 <div class="panel panel-primary">
			  <div class="panel-body">
		<?php  if ($_POST)
				{
					$Bannerid	=$_POST['Bannerid'];
					if(empty($_POST['Bannername']))
					{
						$error['err_Bannername']='Name banner Required';
					}
					else
					{
						$Bannername=$_POST['Bannername'];
					}
					$file=$_FILES['Banner']['name'];
			if(empty($error))
		{
			if(move_uploaded_file($_FILES['Banner']['tmp_name'],"../img/banner/".$file))
			{	
				//echo "upload file success ".$file;
				$sql="UPDATE banner SET Banner_name='$Bannername',Banner_image='$file' WHERE Banner_id='{$_GET['id']}'";	
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
			}
			else
			{
				$sql2="UPDATE banner SET Banner_name='$Bannername' WHERE Banner_id='{$_GET['id']}'";	
				$query2=mysql_query($sql2); //echo $sql2;
				if($query2)
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
		}
		 else
		var_dump($error);
}
		$id = $_GET['id'];
		$sql=("SELECT * FROM banner WHERE Banner_id='$id'") or die (mysql_error());
		$query=mysql_query($sql);
		while($data=mysql_fetch_array($query))
		{		
		echo "<form action='' method='post' enctype='multipart/form-data' class='form-horizontal' role='form'>";
		$Bannername=$data['Banner_name'];
		$banner=$data['Image'];
		}
	?>
				
					<form action="" method="post" enctype="multipart/form-data" class="form-horizontal" role="form" name="form1">
			<div class="form-group">
				<label class="col-sm-2 control-label" for="Bannerid"></label>
					<div class="col-sm-2">
					<input type="hidden" value="<?php echo (isset($Bannerid)) ? $Bannerid : ''; ?>" class="form-control" name="Bannerid">
					</div>
			</div>
			<div class="form-group <?php echo (isset($error['Bannername'])) ? 'warning' : ''; ?>" id="Bannername">
				<label class="col-sm-2 control-label" for="Bannername">Banner Name</label>
					<div class="col-sm-8">
					<input type="text" class="form-control" value="<?php echo (isset($Bannername)) ? $Bannername : ''; ?>" name="Bannername">
					<p class="help-block"><?php echo (isset($error['Bannername'])) ? $error['Bannername'] : ''; ?></p>
					</div>
			</div>
			<div class="form-group">
			<label class="col-sm-2 control-label" for="banner"></label>
				<div class="col-sm-4">
					<img src="../img/banner/<?php echo $banner; ?>" width="100px">
				</div>
		</div>
			<div class="form-group" id="image">
				<label class="col-sm-2 control-label" for="image">Image</label>
					<div class="col-sm-2">
					<input type="file" id="image" name="Banner">
					</div>
			</div>
			
			<div class="form-group">
			<label class="col-sm-2 control-label" for="tombol"></label>
				<div class="col-sm-2">
					<input name="bkirim" type="submit" id="bkirim" class="btn btn-primary" value="Save" />
					<input type="reset" name="bbatal" id="bbatal" class="btn btn-default" value="Cancel" />
				</div>
			</div>
</form>						
            </div>
			</div>
			</div>
        </div><!-- /.row -->
		
      </div><!-- /#page-wrapper -->
<!--end content-->

</div><!-- /#wrapper -->
   
  </body>
</html>
<?php } ?>