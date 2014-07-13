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
            <h1><img src="../img/helios.png" width="50px" height="50px"> Career</h1>
			  <ol class="breadcrumb">
              <li><i class="fa fa-dashboard"></i> Career</li>
			  <li class="active"><i class="fa fa-dashboard"></i> Edit</li>
            </ol>
        </div><!-- /.row -->
      </div><!-- /#page-wrapper -->
			<div class="row">
          <div class="col-lg-12">
            <div class="panel panel-primary">
	<div class="panel-body">
	<?php
	if (isset($_POST['bkirim']))
	{
		if(empty($_POST['career_name']))
		{
			$error['err_career_name']='career name required!';
		}
		else
		{
		$career_name=$_POST['career_name'];
		}
		if(empty($_POST['Description']))
		{
			$error['err_description']='Job Description required!';
		}
		else
		{
		$Description=$_POST['Description'];
		}
		$Start= date('Y-m-d', strtotime($_POST['Start']));	
		$End= date('Y-m-d', strtotime($_POST['End']));
		$created_at= date('Y-m-d H:i:s', strtotime($_POST['Start']));
		if(empty($error))
		{
				$sql="UPDATE career SET Career_name='$career_name', Start='$Start', End='$End', Description='$Description', Created_at='$created_at' WHERE Career_id='{$_GET['id']}'";
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
		$sql=("SELECT * FROM career WHERE Career_id='$id'") or die (mysql_error());
		$query=mysql_query($sql);
		while($data=mysql_fetch_array($query))
		{		
		$career_name	=$data['Career_name'];
		$Description	=$data['Description'];
		$Start			=date('m/d/Y', strtotime($data['Start'])); 
		$End			=date('m/d/Y', strtotime($data['End']));
		}
	?>
		<form action='' method='post' class='form-horizontal' role='form' name='form1'>
		<div class="form-group <?php echo (isset($error['career_name'])) ? 'warning' : ''; ?>" id="career_name">
				<label class="col-sm-2 control-label" for="career_name">Career Name</label>
					<div class="col-sm-8">
					<input type="text" class="form-control" value="<?php echo (isset($career_name)) ? $career_name : ''; ?>" name="career_name">
					<p class="help-block"><?php echo (isset($error['career_name'])) ? $error['career_name'] : ''; ?></p>
					</div>
			</div>
		<div class="form-group <?php echo (isset($error['err_Description'])) ? 'warning' : ''; ?>" id="descriptions">
			<label class="col-sm-2 control-label" for="Description">Job Descriptions</label>
				<div class="col-sm-4">
					<textarea name="Description" rows="5" class="form-control"><?php echo (isset($Description)) ? $Description : ''; ?></textarea>
					<p class="help-block"><?php echo (isset($error['err_Description'])) ? $error['err_Description'] : ''; ?></p>
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
				<label class="col-sm-2 control-label"></label>
					<div class="col-sm-4">
						<input name="bkirim" type="submit" id="bkirim" class="btn btn-primary" value="Save" />
						<input type="reset" name="bbatal" id="bbatal" class="btn btn-default" value="Cancel" />
					</div>
			</div>
	</form>
</div><!-- panel body -->
</div><!-- panel primary -->
</div> <!-- page wraper-->
</div>
</div>		
 </body>
</html>
<?php } ?>