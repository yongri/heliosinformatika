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
           <h1> <img src="../img/helios.png" width="50px" height="50px"> Service </h1>
              <ol class="breadcrumb">
              <li><i class="fa fa-dashboard"></i> Dashboard</li> <span class="divider">/</span>
			<li class="active">Helios Service</li>
            </ol>
			<div class="span6 pull-right">
				<a class="btn btn-small btn-primary" href="product_service.php">Back</a>
			</div>
        </div><!-- /.row -->
      </div><!-- /#page-wrapper --><br/>
			<div class="row">
          <div class="col-lg-12">
            <div class="panel panel-primary">
	<div class="panel-body">
	<?php
	if (isset($_POST['bkirim']))
	{
		if(empty($_POST['product_name']))
		{
			$error['err_product_name']='Product name required!';
		}
		else
		{
		$product_name=$_POST['product_name'];
		}
		if(empty($_POST['Content']))
		{
			$error['err_Content']='Content Product required!';
		}
		else
		{
		$Content=$_POST['Content'];
		}
		$Created_at= date('Y').'-'.date('m').'-'.date('d');
		if(empty($error))
		{
				$sql="UPDATE product SET Product_name='$product_name',Content='$Content', Created_at='$Created_at', Category_id='3' WHERE Product_id='{$_GET['id']}'";
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
		$sql=("SELECT * FROM product WHERE Product_id='$id'") or die (mysql_error());
		$query=mysql_query($sql);
		while($data=mysql_fetch_array($query))
		{		
		$product_name	=$data['Product_name'];
		$Content	=$data['Content'];
		}
	?>
		<form action='' method='post' class='form-horizontal' role='form' name='form1'>
		<div class="form-group <?php echo (isset($error['product_name'])) ? 'warning' : ''; ?>" id="product_name">
				<label class="col-sm-2 control-label" for="product_name">Product Name</label>
					<div class="col-sm-8">
					<input type="text" class="form-control" value="<?php echo (isset($product_name)) ? $product_name : ''; ?>" name="product_name">
					<p class="help-block"><?php echo (isset($error['product_name'])) ? $error['product_name'] : ''; ?></p>
					</div>
			</div>
		<div class="form-group <?php echo (isset($error['err_Content'])) ? 'warning' : ''; ?>" id="Contents">
			<label class="col-sm-2 control-label" for="Content">Contents</label>
				<div class="col-sm-4">
					<textarea name="Content" rows="5" class="form-control"><?php echo (isset($Content)) ? $Content : ''; ?></textarea>
					<p class="help-block"><?php echo (isset($error['err_Content'])) ? $error['err_Content'] : ''; ?></p>
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