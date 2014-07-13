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
			<h1><img src="../img/helios.png" width="50px" height="50px">  Price_list </h1>
            <ol class="breadcrumb">
              <li><i class="fa fa-dashboard"></i> Dashboard</li> <span class="divider">/</span>
			<li class="active">Price list </li>
            </ol>
			<div class="span6 pull-right">
				<a class="btn btn-small btn-primary" href="price_list.php">Back</a>
			</div>
          </div>
        </div><!-- /.row --><br>
        <div class="row">
          <div class="col-lg-12">
				 <div class="panel panel-primary">
			  <div class="panel-body">
		<?php  if ($_POST)
				{
					$price_listid	=$_POST['price_listid'];
					if(empty($_POST['Price_listname']))
					{
						$error['err_price_listname']='Name price list Required';
					}
					else
					{
						$price_listname=$_POST['Price_listname'];
					}
					$file=$_FILES['price_list']['name'];
					$Published_at=date('Y').'-'.date('m').'-'.date('d');
			if(empty($error))
		{
			if(move_uploaded_file($_FILES['price_list']['tmp_name'],"../img/price_list/".$file))
			{	
				echo "upload file success ".$file;
				$sql="UPDATE price_list SET Name='$price_listname',File='$file', Published_at='$Published_at' WHERE Price_list_id='{$_GET['id']}'";	
				$query=mysql_query($sql); echo $sql;
			
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
				$sql2="UPDATE price_list SET Name='$price_listname' WHERE Price_list_id='{$_GET['id']}'";	
				$query2=mysql_query($sql2); echo $sql2;
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
		$sql=("SELECT * FROM price_list WHERE Price_list_id='$id'") or die (mysql_error());
		$query=mysql_query($sql);
		while($data=mysql_fetch_array($query))
		{		
		echo "<form action='' method='post' enctype='multipart/form-data' class='form-horizontal' role='form'>";
		$Price_listname=$data['Name'];
		$price_list=$data['File'];
		}
	?>
				
					<form action="" method="post" enctype="multipart/form-data" class="form-horizontal" role="form" name="form1">
			<div class="form-group">
				<label class="col-sm-2 control-label" for="price_listid"></label>
					<div class="col-sm-2">
					<input type="hidden" value="<?php echo (isset($price_listid)) ? $price_listid : ''; ?>" class="form-control" name="price_listid">
					</div>
			</div>
			<div class="form-group <?php echo (isset($error['err_price_listname'])) ? 'warning' : ''; ?>" id="price_listname">
				<label class="col-sm-2 control-label" for="price_listname">Price List Name</label>
					<div class="col-sm-8">
					<input type="text" class="form-control" value="<?php echo (isset($Price_listname)) ? $Price_listname : ''; ?>" name="Price_listname">
					<p class="help-block"><?php echo (isset($error['err_price_listname'])) ? $error['err_price_listname'] : ''; ?></p>
					</div>
			</div>
			<div class="form-group">
			<label class="col-sm-2 control-label" for="price_list"></label>
				<div class="col-sm-4">
					<img src="../img/price_list/<?php echo $price_list; ?>" width="100px">
				</div>
		</div>
			<div class="form-group" id="image">
				<label class="col-sm-2 control-label" for="image">File</label>
					<div class="col-sm-2">
					<input type="file" id="image" name="price_list">
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