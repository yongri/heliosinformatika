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
			<h1><img src="../img/helios.png" width="50px" height="50px">  Career </h1>
            <ol class="breadcrumb">
              <li><i class="fa fa-dashboard"></i> Dashboard</li> <span class="divider">/</span>
				<li class="active">Career</li>
            </ol>
			<div class="span6 pull-right">
				<a class="btn btn-small btn-primary" href="career.php">Back</a>
			</div>
          </div>
        </div><!-- /.row --><br>
        <div class="row">
          <div class="col-lg-12">
				 <div class="panel panel-primary">
			  <div class="panel-body">
		<?php if ($_POST)
				{
					$career_id	=$_POST['career_id'];
					if(empty($_POST['career_name']))
					{
						$error['err_career_name']='Name Job Required';
					}
					else
					{
						$career_name=$_POST['career_name'];
					}
					if(empty($_POST['Content']))
					{
						$error['err_Content']='Content required';
					}
					else
					{
						$Content=$_POST['Content'];
					}
					$Start= date('Y-m-d H:i:s', strtotime($_POST['Start']));	
					$End= date('Y-m-d H:i:s', strtotime($_POST['End']));
					$Created_at= date('Y').'-'.date('m').'-'.date('d');
					if (empty($error))
					{
						$sql="INSERT INTO career VALUES ('$career_id','$career_name','$Start','$End','$Content','$Created_at')";
						$query=mysql_query($sql);
						if ($query) 
						{
					echo "<div class='alert alert-success alert-dismissable'>
									  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
									  <strong>Good!</strong> Adding Career Success!</div>";
				}
				else
				{
					echo "<div class='alert alert-warning alert-dismissable'>
									  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
									  <strong>Sorry!</strong>Adding Career failed!</div>";
				}
					}
				/*	else
					{
						var_dump($error);
					} */
				}
				

				?>
					<form action="" method="post" enctype="multipart/form-data" class="form-horizontal" role="form" name="form1">
			<div class="form-group">
				<label class="col-sm-2 control-label" for="career_id"></label>
					<div class="col-sm-2">
					<input type="hidden" value="<?php echo (isset($career_id)) ? $career_id : ''; ?>" class="form-control" name="career_id">
					
					</div>
			</div>
			<div class="form-group <?php echo (isset($error['career_name'])) ? 'warning' : ''; ?>" id="career_name">
				<label class="col-sm-2 control-label" for="career_name">Job Name</label>
					<div class="col-sm-8">
					<input type="text" class="form-control" value="<?php echo (isset($career_name)) ? $career_name : ''; ?>" name="career_name">
					<p class="help-block"><?php echo (isset($error['career_name'])) ? $error['career_name'] : ''; ?></p>
					</div>
			</div>
			<div class="form-group <?php echo (isset($error['content'])) ? 'warning' : ''; ?>" id="content">
				<label class="col-sm-2 control-label" for="content">Description</label>
					<div class="col-sm-2">
					<textarea name="Content"  class="form-control" rows="3"><?php echo (isset($content)) ? $content : ''; ?></textarea>
					<p class="help-block"><?php echo (isset($error['content'])) ? $error['content'] : ''; ?></p>
					</div>
			</div>
			<div class="form-group" id="start">
			<label class="col-sm-2 control-label" for="Description">Start</label>
                <div class="col-sm-4">
                    <input type='text' name="Start" id="tgl" value="<?php echo (isset($Start)) ? $Start : ''; ?>" />
                  
                </div>
            </div>
		<div class="form-group" id="end">
			<label class="col-sm-2 control-label" for="Description">End</label>
                <div class="col-sm-4">
                    <input type='text' name="End" id="tgl2" value="<?php echo (isset($End)) ? $End : ''; ?>" />
                  
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