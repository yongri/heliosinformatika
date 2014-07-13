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
			<h1><img src="../img/helios.png" width="50px" height="50px">  Product </h1>
            <ol class="breadcrumb">
              <li><i class="fa fa-dashboard"></i> Dashboard</li> <span class="divider">/</span>
			<li class="active">Product Server</li>
            </ol>
			<div class="span6 pull-right">
				<a class="btn btn-small btn-primary" href="product_server.php">Back</a>
			</div>
          </div>
        </div><!-- /.row --><br>
        <div class="row">
          <div class="col-lg-12">
				 <div class="panel panel-primary">
			  <div class="panel-body">
		<?php  if (isset($_POST['bkirim']))
				{
					$product_id	=$_POST['product_id'];
					if(empty($_POST['product_name']))
					{
						$error['err_product_name']='Name product Required';
					}
					else
					{
						$product_name=$_POST['product_name'];
					}
					if(empty($_POST['Content']))
					{
						$error['err_Content']='Content required';
					}
					else
					{
						$Content=$_POST['Content'];
					}
					$Created_at=date('Y').'-'.date('m').'-'.date('d');
					$file=$_FILES['product']['name'];
			if(empty($error))
		{
			if(move_uploaded_file($_FILES['product']['tmp_name'],"../img/product/".$file))
			{	
			
				//echo "upload file success ".$file;
			
				$sql="UPDATE product SET Product_name='$product_name',Content='$Content',Product_image='$file', Created_at='$Created_at', Category_id='1' WHERE Product_id='{$_GET['id']}'";	
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
				$sql2="UPDATE product SET Product_name='$product_name',Content='$Content', Created_at='$Created_at', Category_id='1' WHERE Product_id='{$_GET['id']}'";	
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
		$sql=("SELECT * FROM product WHERE Category_id='1' AND Product_id='$id'") or die (mysql_error());
		$query=mysql_query($sql);
		while($data=mysql_fetch_array($query))
		{		
		echo "<form action='' method='post' enctype='multipart/form-data' class='form-horizontal' role='form'>";
		$product_name=$data['Product_name'];
		$content=$data['Content'];
		$product=$data['Product_image'];
		}
	?>
				
					<form action="" method="post" enctype="multipart/form-data" class="form-horizontal" role="form" name="form1">
			<div class="form-group">
				<label class="col-sm-2 control-label" for="product_id"></label>
					<div class="col-sm-2">
					<input type="hidden" value="<?php echo (isset($product_id)) ? $product_id : ''; ?>" class="form-control" name="product_id">
					</div>
			</div>
			<div class="form-group <?php echo (isset($error['product_name'])) ? 'warning' : ''; ?>" id="product_name">
				<label class="col-sm-2 control-label" for="product_name">Product Name</label>
					<div class="col-sm-8">
					<input type="text" class="form-control" value="<?php echo (isset($product_name)) ? $product_name : ''; ?>" name="product_name">
					<p class="help-block"><?php echo (isset($error['product_name'])) ? $error['product_name'] : ''; ?></p>
					</div>
			</div>
			<div class="form-group <?php echo (isset($error['content'])) ? 'warning' : ''; ?>" id="content">
				<label class="col-sm-2 control-label" for="content">Content</label>
					<div class="col-sm-2">
					<textarea name="Content"  class="form-control" rows="3"><?php echo (isset($content)) ? $content : ''; ?></textarea>
					<p class="help-block"><?php echo (isset($error['content'])) ? $error['content'] : ''; ?></p>
					</div>
			</div>
			<div class="form-group">
			<label class="col-sm-2 control-label" for="product"></label>
				<div class="col-sm-4">
					<img src="../img/product/<?php echo $product; ?>" width="100px">
				</div>
		</div>
			<div class="form-group" id="image">
				<label class="col-sm-2 control-label" for="image">Image</label>
					<div class="col-sm-2">
					<input type="file" id="image" name="product">
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