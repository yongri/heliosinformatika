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
            <h1> <img src="../img/helios.png" width="50px" height="50px"> Company Background</h1>
             <ol class="breadcrumb">
              <li><i class="fa fa-dashboard"></i> About Us</li>
			  <li class="active"><i class="fa fa-dashboard"></i> Company Background</li>
            </ol>
			<div class="row">
          <div class="col-lg-12">
            <div class="panel panel-primary">
			  <div class="panel-body">
					<?php $sql="SELECT * FROM overview"; 
					$query=mysql_query($sql); 
					$data=mysql_fetch_array($query); ?>
				<!--	<img src="../img/product/<?php echo $data['Overview_image']; ?>" width="300px" height="250px"><br><br>-->
					<?php echo $data['Description']; ?><br><br>
					<i>
					<?php echo " Posted at : " .$data['Created_at'] ; ?>
					</i>
				  </div>
			 
            </div> <a class="btn btn-small btn-primary" href="overview_edit.php?&id=<?php echo $data['Overview_id']; ?>">Edit</a>
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