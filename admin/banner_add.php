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
			<h1><img src="../img/helios.png" width="50px" height="50px"> Left Banner </h1>
            <ol class="breadcrumb">
              <li><i class="fa fa-dashboard"></i> Dashboard</li> <span class="divider">/</span>
				<li class="active">Banner</li>
            </ol>
          
		  <div class="span6 pull-right">
				<a class="btn btn-small btn-primary" href="banner.php">Back</a>
			</div></div>
        </div><br>
        <div class="row">
          <div class="col-lg-12">
				 <div class="panel panel-primary">
			  <div class="panel-body">
			  <?php if ($_POST)
				{
					$Banner_id	=$_POST['Banner_id'];
					if(empty($_POST['Banner_name']))
					{
						$error['banner_name']='Banner name Required';
					}
					else
					{
						$Banner_name=$_POST['banner_name'];
					}
					$Published_at= date('Y-m-d H:i:s', strtotime($_POST['Published_at']));
					if(empty($error))
					{
						$Banner=$_FILES['Banner']['name'];
						$physic_Banner=$_FILES['Banner']['tmp_name'];
						$sql="INSERT INTO banner (Banner_id,Banner_name,File,Published_at) VALUES ('$Banner_id','$Banner_name','$Banner','$Published_at')";
						$query=mysql_query($sql);
						//echo $input;
						if (move_uploaded_file($physic_Banner,"../img/banner/".$Banner))
						{
						//echo' success!';
						}
						else
						{
						//echo'failed';
						}
						if ($query) 
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
						var_dump($error);
					} 
				}
				?>
			  <form action="" method="post" enctype="multipart/form-data" class="form-horizontal" role="form" name="form1">
			  <div class="form-group <?php echo (isset($error['banner_name'])) ? 'warning' : ''; ?>" id="banner">
				<label class="col-sm-2 control-label" for="banner">Banner name</label>
					<div class="col-sm-8">
					<input type="text" class="form-control" value="<?php echo (isset($banner_name)) ? $banner_name : ''; ?>" name="banner_name">
					<p class="help-block"><?php echo (isset($error['banner_name'])) ? $error['banner_name'] : ''; ?></p>
					</div>
			</div>
				<div class="form-group" id="banner">
					<label class="col-sm-2 control-label" for="banner">Image</label>
					<div class="col-sm-2">
						<input type="file" id="Banner" name="Banner" value="<?php echo (isset($Banner)) ? $Banner : ''; ?>">
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
		<!--	<div class="form-group" id="Banner_name">
				<label class="col-sm-2 control-label" for="Banner_name">Banner 2</label>
					<div class="col-sm-2">
					<input type="file" id="Banner_name" name="banner2">
					</div>
			</div>
				<div class="form-group" id="Banner_name">
				<label class="col-sm-2 control-label" for="Banner_name"></label>
					<div class="controls"><img src="../img/banner/<?php echo $banner2; ?>">
					</div>
			</div> -->
					</div>
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