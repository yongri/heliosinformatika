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
			<h1><img src="../img/helios.png" width="50px" height="50px">  Promotion </h1>
            <ol class="breadcrumb">
              <li><i class="fa fa-dashboard"></i> Dashboard</li> <span class="divider">/</span>
				<li> Promotion</li><li class="active"> Business Partner </li>
            </ol>
			<div class="span6 pull-right">
				<a class="btn btn-small btn-primary" href="promo_bp.php">Back</a>
			</div>
          </div>
        </div><!-- /.row --><br>
        <div class="row">
          <div class="col-lg-12">
				 <div class="panel panel-primary">
			  <div class="panel-body">
		<?php if ($_POST)
				{
					$promotionid	=$_POST['promotionid'];
					if(empty($_POST['promotionname']))
					{
						$error['err_promotionname']='Name promotion Required';
					}
					else
					{
						$promotionname=$_POST['promotionname'];
					}
					$Start= date('Y-m-d H:i:s', strtotime($_POST['Start']));	
					$End= date('Y-m-d H:i:s', strtotime($_POST['End']));
					$Published_at= date('Y').'-'.date('m').'-'.date('d');
					if (empty($error))
					{
						$promotion=$_FILES['promotion']['name'];
						$physic_promotion=$_FILES['promotion']['tmp_name'];
						$sql="INSERT INTO promo VALUES ('$promotionid','$Start','$End','$Published_at','$promotion','1','$promotionname')";
						$query=mysql_query($sql);
						//echo $input;
						if (move_uploaded_file($physic_promotion,"../img/promo/".$promotion))
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
									  <strong>Good!</strong> Adding Promo Success!</div>";
				}
				else
				{
					echo "<div class='alert alert-warning alert-dismissable'>
									  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
									  <strong>Sorry!</strong>Adding Promo failed!</div>";
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
				<label class="col-sm-2 control-label" for="promotionid"></label>
					<div class="col-sm-2">
					<input type="hidden" value="<?php echo (isset($promotionid)) ? $promotionid : ''; ?>" class="form-control" name="promotionid">
					
					</div>
			</div>
			<div class="form-group <?php echo (isset($error['promotionname'])) ? 'warning' : ''; ?>" id="promotionname">
				<label class="col-sm-2 control-label" for="promotionname">Promotion Name</label>
					<div class="col-sm-8">
					<input type="text" class="form-control" value="<?php echo (isset($promotionname)) ? $promotionname : ''; ?>" name="promotionname">
					<p class="help-block"><?php echo (isset($error['promotionname'])) ? $error['promotionname'] : ''; ?></p>
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
			<div class="form-group" id="promotion">
				<label class="col-sm-2 control-label" for="image">Image</label>
					<div class="col-sm-2">
					<input type="file" id="promotion" name="promotion">
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