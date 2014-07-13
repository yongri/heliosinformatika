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
			<h1><img src="../img/helios.png" width="50px" height="50px">  Certificate </h1>
            <ol class="breadcrumb">
              <li><i class="fa fa-dashboard"></i> Dashboard</li> <span class="divider">/</span>
			<li class="active">Certificate</li>
            </ol>
			<div class="span6 pull-right">
				<a class="btn btn-small btn-primary" href="certificate.php">Back</a>
			</div>
          </div>
        </div><!-- /.row --><br>
        <div class="row">
          <div class="col-lg-12">
				 <div class="panel panel-primary">
			  <div class="panel-body">
		<?php if ($_POST)
				{
					if(isset($_POST['certificate_id']))
					{
					$certificate_id	=$_POST['certificate_id'];
					}
					if(empty($_POST['certificate_name']))
					{
						$error['err_certificate_name']='Name certificate Required';
					}
					else
					{
						$certificate_name=$_POST['certificate_name'];
					}
					$Published_at=date('Y').'-'.date('m').'-'.date('d');
					if(empty($error))
					{
						$certificate=$_FILES['certificate']['name'];
						$physic_certificate=$_FILES['certificate']['tmp_name'];
						$sql="INSERT INTO certificate VALUES ('$certificate_id','$certificate_name',$certificate','$Published_at')";
						$query=mysql_query($sql);
						echo $sql;
						if (move_uploaded_file($physic_certificate,"../img/profile/".$certificate))
						{
						echo' success!';
						}
						else
						{
						echo'failed';
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
					//	var_dump($error);
					} 
				}
				

				?>
					<form action="" method="post" enctype="multipart/form-data" class="form-horizontal" role="form" name="form1">
			<div class="form-group">
				<label class="col-sm-2 control-label" for="certificate_id"></label>
					<div class="col-sm-2">
					<input type="hidden" value="<?php echo (isset($certificate_id)) ? $certificate_id : ''; ?>" class="form-control" name="certificate_id">
					
					</div>
			</div>
			<div class="form-group <?php echo (isset($error['certificate_name'])) ? 'warning' : ''; ?>" id="certificate_name">
				<label class="col-sm-2 control-label" for="certificate_name">certificate Name</label>
					<div class="col-sm-8">
					<input type="text" class="form-control" value="<?php echo (isset($certificate_name)) ? $certificate_name : ''; ?>" name="certificate_name">
					<p class="help-block"><?php echo (isset($error['certificate_name'])) ? $error['certificate_name'] : ''; ?></p>
					</div>
			</div>
			<div class="form-group" id="image">
				<label class="col-sm-2 control-label" for="image">Image</label>
					<div class="col-sm-2">
					<input type="file" id="image" name="certificate">
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