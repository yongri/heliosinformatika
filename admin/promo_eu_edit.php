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
            <h1> <img src="../img/helios.png" width="50px" height="50px"> End User Promotion</h1>
             <ol class="breadcrumb">
              <li><i class="fa fa-dashboard"></i> Dashboard</li>
			  <li class="active"><i class="fa fa-dashboard"></i> End User</li>
            </ol>
			<div class="span6 pull-right">
				<a class="btn btn-small btn-primary" href="promo_eu.php">Back</a>
			</div>
			</div></div><br>
			<div class="row">
          <div class="col-lg-12">
            <div class="panel panel-primary">
			  <div class="panel-body">
		<?php  if (isset($_POST['bkirim']))
				{
					$Promo_id	=$_POST['Promo_id'];
					if(empty($_POST['Title']))
					{
						$error['err_Title']='Name Promo Required';
					}
					else
					{
						$Title=$_POST['Title'];
					}
					$Start= date('Y-m-d', strtotime($_POST['Start']));
					$End=date('Y-m-d', strtotime($_POST['End']));
					$Published_at=date('Y').'-'.date('m').'-'.date('d');
					$file=$_FILES['Promo']['name'];
			if(empty($error))
		{
			if(move_uploaded_file($_FILES['Promo']['tmp_name'],"../img/promo/".$file))
			{	
			
				//echo "upload file success ".$file;
			
				$sql="UPDATE promo SET Start='$Start', End='$End',Title='$Title',Promo_image='$file', Published_at='$Published_at', Category_id='2' WHERE Promo_id='{$_GET['id']}'";	
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
				$sql2="UPDATE promo SET Start='$Start', End='$End',Title='$Title', Published_at='$Published_at', Category_id='2' WHERE Promo_id='{$_GET['id']}'";	
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
		$sql=("SELECT * FROM promo WHERE Category_id='2' AND Promo_id='$id'") or die (mysql_error());
		$query=mysql_query($sql);
		while($data=mysql_fetch_array($query))
		{		
		echo "<form action='' method='post' enctype='multipart/form-data' class='form-horizontal' role='form'>";
		$Title	=$data['Title'];
		$Start	=date('d/m/Y',strtotime($data['Start']));
		$End	=date('d/m/Y',strtotime($data['End']));
		$Promo	=$data['Promo_image'];
		}
	?>
				
					<form action="" method="post" enctype="multipart/form-data" class="form-horizontal" role="form" name="form1">
			<div class="form-group">
				<label class="col-sm-2 control-label" for="Promo_id"></label>
					<div class="col-sm-2">
					<input type="hidden" value="<?php echo (isset($Promo_id)) ? $Promo_id : ''; ?>" class="form-control" name="Promo_id">
					</div>
			</div>
			<div class="form-group <?php echo (isset($error['Title'])) ? 'warning' : ''; ?>" id="Title">
				<label class="col-sm-2 control-label" for="Title">Promo Name</label>
					<div class="col-sm-8">
					<input type="text" class="form-control" value="<?php echo (isset($Title)) ? $Title : ''; ?>" name="Title">
					<p class="help-block"><?php echo (isset($error['Title'])) ? $error['Title'] : ''; ?></p>
					</div>
			</div>
			<div class="form-group" id="start">
			<label class="col-sm-2 control-label" for="start">Start</label>
                <div class="col-sm-4">
                    <input type='text' name="Start" id="tgl" value="<?php echo (isset($Start)) ? $Start : ''; ?>" />
                  
                </div>
            </div>
		<div class="form-group" id="end">
			<label class="col-sm-2 control-label" for="end">End</label>
                <div class="col-sm-4">
                    <input type='text' name="End" id="tgl2" value="<?php echo (isset($End)) ? $End : ''; ?>" />
                  
                </div>
        </div>
		<div class="form-group">
			<label class="col-sm-2 control-label" for="promo"></label>
				<div class="col-sm-4">
					<img src="../img/promo/<?php echo $Promo; ?>" width="100px">
				</div>
		</div>
			<div class="form-group" id="image">
				<label class="col-sm-2 control-label" for="promo">Image</label>
					<div class="col-sm-2">
					<input type="file" id="image" name="Promo">
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
        </div>
        </div><!-- /.row -->
      </div><!-- /#page-wrapper -->

    </div>
<!--end content-->

</div><!-- /#wrapper -->
   
  </body>
</html>
<?php } ?>