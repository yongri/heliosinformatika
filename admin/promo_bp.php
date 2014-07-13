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
            <h1> <img src="../img/helios.png" width="50px" height="50px"> Business Partner Promotion</h1>
             <ol class="breadcrumb">
              <li><i class="fa fa-dashboard"></i> Dashboard</li>
			  <li class="active"><i class="fa fa-dashboard"></i> Business Partner</li>
            </ol>
			<div class="span6 pull-right">
				<a class="btn btn-small btn-primary" href="promo_bp_add.php">Add Promotion</a>
			</div>
			</div></div><br>
			<div class="row">
          <div class="col-lg-12">
            <div class="panel panel-primary">
			  <div class="panel-body">
			   <?php 
			   if(isset($_GET['id'])) {
			   
					$id_Promo		=$_GET['id'];
					$Start			=$_GET['Start'];
					$End			=$_GET['End'];
					$Published_at	=$_GET['Published_at'];
					$Promo_image	=$_GET['Promo_image'];
					$Category_id	=$_GET['Category_id'];
					$Title			=$_GET['Title'];
					$sql="DELETE FROM promo WHERE Promo_id='$id_Promo'";
					$query=mysql_query($sql)or die(mysql_error());
					//echo $sql;
					if(isset($query))
					{
						echo "<div class='alert alert-success alert-dismissable'>
												  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
												  <strong>Good!</strong> Delete Success!</div>";
					}
					else 
					{
						echo "<div class='alert alert-warning alert-dismissable'>
												  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
												  <strong>Sorry!</strong> Failed to delete !</div>";
					}
					}
					else
					//var_dump($query);
					?>
			  <div class="table-responsive judul">
                  <table class="table table-bordered table-hover table-striped tablesorter">
                    <thead>
                      <tr>
					  <th width="10%">Promotion ID</th>
                        <th width="60%">Promotion Name</th>
						<th width="30%">Action</th>
                      </tr>
                    </thead>
                    <tbody>
					<?php $sql="SELECT Promo_id, Title FROM promo WHERE Category_id='1' ORDER BY Promo_id DESC"; 
					$query=mysql_query($sql); 
					while($data=mysql_fetch_array($query))
					{
					
						$promo_id	=$data['Promo_id']; 
                        $promo_name	=$data['Title']; 
					 ?>
					  <tr>
						<td width="10%"><?php echo $promo_id; ?></td>
						<td width="60%"><?php echo $promo_name; ?></td>
						
						<td width="30%">
						<a href="promo_bp_edit.php?&id=<?php echo $promo_id; ?>">Edit</a> | 
						<a href="promo_bp.php?&id=<?php echo $promo_id; ?>">Delete</a>
						</td>
					  </tr>
					  <?php } ?>
                    </tbody>
                  </table>
					</div>
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