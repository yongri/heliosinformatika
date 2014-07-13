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
            <h1> <img src="../img/helios.png" width="50px" height="50px"> Event</h1>
             <ol class="breadcrumb">
              <li><i class="fa fa-dashboard"></i> Dashboard</li>
			  <li class="active"><i class="fa fa-dashboard"></i> Event</li>
            </ol>
			<div class="span6 pull-right">
				<a class="btn btn-small btn-primary" href="event_add.php">Add Event</a>
			</div>
			</div></div><br>
			<div class="row">
          <div class="col-lg-12">
            <div class="panel panel-primary">
			  <div class="panel-body">
			   <?php 
			   if(isset($_GET['id'])) {
			   
					$id_Event		=$_GET['id'];
					$Event_name		=$_GET['Event_name'];
					$Location		=$_GET['Location'];
					$Start			=$_GET['Start'];
					$End			=$_GET['End'];
					$Published_at	=$_GET['Published_at'];
					$Event_image	=$_GET['Event_image'];
					$Category_id	=$_GET['Category_id'];
					
					$sql="DELETE FROM event WHERE Event_id='$id_Event'";
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
					  <th width="10%">Event ID</th>
                        <th width="60%">Event Name</th>
						<th width="30%">Action</th>
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
					$sql="SELECT * FROM event WHERE Category_id='2'  LIMIT $posisi,$batas"; 
					$query=mysql_query($sql); 
					while($data=mysql_fetch_array($query))
					{
					
						$event_id	=$data['Event_id']; 
                        $event_name	=$data['Event_name']; 
					 ?>
					  <tr>
						<td width="10%"><?php echo $event_id; ?></td>
						<td width="60%"><?php echo $event_name; ?></td>
						
						<td width="30%">
						<a href="event_edit.php?&id=<?php echo $event_id; ?>">Edit</a> | 
						<a href="event.php?&id=<?php echo $event_id; ?>">Delete</a>
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
		<div class="span6">
					<div class="pagination pull-left">
						<ul class="pagination">
							<?php 
							$sql2="SELECT * FROM event WHERE Category_id='2' ORDER BY Event_id DESC ";
							$query2=mysql_query($sql2);
							$jmldata=mysql_num_rows($query2);
							$jmlpage=ceil($jmldata/$batas);
							for($i=1;$i<=$jmlpage;$i++)
								if($i!=$page)
								{
									echo '<li><a href="event.php?page='.$i.'">'.$i.'</a></li>';
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
<!--end content-->

</div><!-- /#wrapper -->
   
  </body>
</html>
<?php } ?>