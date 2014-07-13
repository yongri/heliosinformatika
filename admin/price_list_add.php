<?php
session_start(); 
if(!isset($_SESSION['User_id'])){
header("location:login.php");
}
else
{
include "../cons.php";
include  "../connection.php";
include "header.php"; 
?>
          <ul class="nav navbar-nav navbar-right navbar-user">
            <li class="dropdown messages-dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"> Welcome, <?php if(isset($_SESSION['User_id']))  echo $_SESSION['Username'];  ?><b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li class="dropdown user-dropdown">
					<li><a href="http://<?php echo BASE_URL; ?>/admin/logout.php"><i class="fa fa-power-off"></i> Log Out</a></li>
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
            <h1> <img src="../img/helios.png" width="50px" height="50px"> Price List</h1>
             <ol class="breadcrumb">
              <li><i class="fa fa-dashboard"></i> Dashboard</li>
			  <li class="active"><i class="fa fa-dashboard"></i> Price List</li>
            </ol>
			<div class="span6 pull-right">
				<a class="btn btn-small btn-primary" href="price_list.php">Back</a>
			</div>
          </div>
        </div><br>
        <div class="row">
          <div class="col-lg-12">
				 <div class="panel panel-primary">
			  <div class="panel-body">
			  <?php if ($_POST)
				{
					$Price_list_id	=$_POST['Price_list_id'];
					if(empty($_POST['Name']))
					{
						$error['err_Name']='Name Price List Required';
					}
					else
					{
						$Name=$_POST['Name'];
					}
					$Published_at= date('Y-m-d H:i:s', strtotime($_POST['Published_at']));
					if(empty($error))
					{
						$Price_list=$_FILES['Price_list']['name'];
						$physic_Price_list=$_FILES['Price_list']['tmp_name'];
						$sql="INSERT INTO price_list (Price_list_id,Name,File,Published_at) VALUES ('$Price_list_id','$Name','$Price_list','$Published_at')";
						$query=mysql_query($sql);
						//echo $input;
						if (move_uploaded_file($physic_Price_list,"../img/price_list/".$Price_list))
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
			  <div class="form-group">
				<label class="col-sm-2 control-label" for="$Price_list_id"></label>
					<div class="col-sm-2">
					<input type="hidden" value="<?php echo (isset($Price_list_id)) ? $Price_list_id : ''; ?>" class="form-control" name="Price_list_id">
					
					</div>
			</div>
			  <div class="form-group <?php echo (isset($error['err_Name'])) ? 'warning' : ''; ?>" id="name">
				<label class="col-sm-2 control-label" for="name">Price List Name</label>
					<div class="col-sm-8">
					<input type="text" class="form-control" value="<?php echo (isset($Name)) ? $Name : ''; ?>" name="name">
					<p class="help-block"><?php echo (isset($error['err_Name'])) ? $error['err_Name'] : ''; ?></p>
					</div>
			</div>
				<div class="form-group" id="price_list">
					<label class="col-sm-2 control-label" for="price_list">File </label>
					<div class="col-sm-2">
						<input type="file" id="$Price_list" name="Price_list" value="<?php echo (isset($Price_list)) ? $Price_list : ''; ?>">
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
		<!--	<div class="form-group" id="Price_list">
				<label class="col-sm-2 control-label" for="Price_list">price_list 2</label>
					<div class="col-sm-2">
					<input type="file" id="Price_list" name="price_list2">
					</div>
			</div>
				<div class="form-group" id="Price_list">
				<label class="col-sm-2 control-label" for="Price_list"></label>
					<div class="controls"><img src="../img/price_list/<?php echo $price_list2; ?>">
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