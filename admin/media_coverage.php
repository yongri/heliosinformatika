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
            <h1> <img src="../img/helios.png" width="50px" height="50px"> Media Coverage</h1>
             <ol class="breadcrumb">
              <li><i class="fa fa-dashboard"></i> Dashboard</li>
			  <li class="active"><i class="fa fa-dashboard"></i> Media Coverage</li>
            </ol>
			<div class="span6 pull-right">
				<a class="btn btn-small btn-primary" href="media_coverage_add.php">Add Media Coverage</a>
			</div></div></div><br>
			<div class="row">
          <div class="col-lg-12">
            <div class="panel panel-primary">
			  <div class="panel-body">
			   <?php 
			   if(isset($_GET['id'])) {
			   
					$id_news		=$_GET['id'];
					$News_name		=$_GET['News_name'];
					$Description	=$_GET['Description'];
					$Content		=$_GET['Content'];
					$News_image		=$_GET['News_image'];
					$Created_at		=$_GET['Created_at'];
					$Category_id	=$_GET['Category_id'];
					
					$sql="DELETE FROM news WHERE News_id='$id_news'";
					$query=mysql_query($sql)or die(mysql_error());
					//echo $sql;
					if($query)
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
					  <th width="10%">News ID</th>
                        <th width="60%">News Name</th>
						<th width="30%">Action</th>
                      </tr>
                    </thead>
                    <tbody>
					<?php $sql="SELECT News_id, News_name FROM news WHERE Category_id='2' ORDER BY News_id DESC"; 
					$query=mysql_query($sql); 
					while($data=mysql_fetch_array($query))
					{
					
						$news_id	=$data['News_id']; 
                        $news_name	=$data['News_name']; 
					 ?>
					  <tr>
						<td width="10%"><?php echo $news_id; ?></td>
						<td width="60%"><?php echo $news_name; ?></td>
						
						<td width="30%">
						<a href="media_coverage_edit.php?&id=<?php echo $news_id; ?>">Edit</a> | 
						<a href="media_coverage.php?&id=<?php echo $news_id; ?>">Delete</a>
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