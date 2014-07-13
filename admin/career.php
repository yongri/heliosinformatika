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
            <h1> <img src="../img/helios.png" width="50px" height="50px"> Career</h1>
             <ol class="breadcrumb">
              <li><i class="fa fa-dashboard"></i> Dashboard</li>
			  <li class="active"><i class="fa fa-dashboard"></i> Career</li>
            </ol>
			<div class="span6 pull-right">
				<a class="btn btn-small btn-primary" href="career_add.php">Add Career</a>
			</div>
			</div>
		</div><br>
			<div class="row">
          <div class="col-lg-12">
            <div class="panel panel-primary">
			  <div class="panel-body">
			   <?php 
			   if(isset($_GET['id'])) {
			   
					$id_Career		=$_GET['id'];
					$Career_name	=$_GET['Career_name'];
					$Start			=$_GET['Start'];
					$End			=$_GET['End'];
					$Description	=$_GET['Description'];
					$Created_at		=$_GET['Created_at'];
					
					
					$sql="DELETE FROM career WHERE Career_id='$id_Career'";
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
						<th width="10%">Career ID</th>
                        <th width="40%">Career Name</th>
						<th width="20%">Created At</th>
						<th width="20%">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
					<?php
					$batas=5;
				if(isset($_GET['page']))
			{
				$page=$_GET['page'];
			}
			if(empty($page)) 
			{
				$posisi=0;
				$page=1;
			}			
			else
			{
				$posisi=($page-1)*$batas;
			}
				$sql="SELECT * FROM career LIMIT $posisi,$batas";
				$query = mysql_query($sql);
					while($data=mysql_fetch_array($query))
					{
						$Career_id=$data['Career_id']; 
                        $Career_name=$data['Career_name']; 
						$Created_at=date('m/d/Y', strtotime($data['Created_at']));
					  ?>
					  <tr>
						<td width="10%"><?php echo $Career_id; ?></td>
						<td width="40%"><?php echo $Career_name; ?></td>
						<td width="20%"><?php echo $Created_at; ?></td>
						<td width="20%">
						<a href="career_edit.php?&id=<?php echo $Career_id; ?>">Edit</a> | 
						<a href="career.php?&id=<?php echo $Career_id; ?>">Delete</a>
						</td>
					  </tr>
					  <?php } ?>
                    </tbody>
                  </table>
					</div>
					</div>
          </div>
        
		<div class="span6">
					<div class="pagination pull-left">
						<ul class="pagination">
							<?php 
							$sql2="SELECT * FROM career ORDER BY Career_id DESC ";
							$query2=mysql_query($sql2);
							$jmldata=mysql_num_rows($query2);
							$jmlpage=ceil($jmldata/$batas);
							for($i=1;$i<=$jmlpage;$i++)
								if($i!=$page)
								{
									echo '<li><a href="career.php?page='.$i.'">'.$i.'</a></li>';
								}
								else
								{
									echo '<li class="active"><a href="#">'.$i.'</a></li>';
								}
							?>
						</ul>
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