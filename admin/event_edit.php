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
<!--Location-->
<div id="page-wrapper">
        <div class="row">
          <div class="col-lg-12">
			<h1><img src="../img/helios.png" width="50px" height="50px">  Event </h1>
            <ol class="breadcrumb">
              <li><i class="fa fa-dashboard"></i> Dashboard</li> <span class="divider">/</span>
			<li class="active">Event</li>
            </ol>
			<div class="span6 pull-right">
				<a class="btn btn-small btn-primary" href="event.php">Back</a>
			</div>
          </div>
        </div><!-- /.row --><br>
        <div class="row">
          <div class="col-lg-12">
				 <div class="panel panel-primary">
			  <div class="panel-body">
		<?php  if (isset($_POST['bkirim']))
				{
					$event_id	=$_POST['Event_id'];
					if(empty($_POST['Event_name']))
					{
						$error['event_name']='Name event Required';
					}
					else
					{
						$event_name=$_POST['Event_name'];
					}
					if(empty($_POST['Location']))
					{
						$error['Location']='Location required';
					}
					else
					{
						$Location=$_POST['Location'];
					}
					$Start= date('Y-m-d', strtotime($_POST['Start']));
					$End=date('Y-m-d', strtotime($_POST['End']));
					$Time=$_POST['Time'];
					$Finish=$_POST['Finish'];
					
					$Published_at=date('Y').'-'.date('m').'-'.date('d');
					$file=$_FILES['event']['name'];

			if(empty($error))
		{
			
			if(move_uploaded_file($_FILES['event']['tmp_name'],"../img/event/".$file))
			{	
				echo "upload file success ".$file;
				//$physic_event=$_FILES['event']['tmp_name'];
			//if(copy($_FILES['event']['tmp_name'],"../img/event/".$file))
			//{
				$sql="UPDATE event SET Event_name='$event_name',Location='$Location', Start='$Start', End='$End', Time='$Time',Finish='$Finish',Published_at='$Published_at', Event_image='$file', Category_id='2' WHERE Event_id='{$_GET['id']}'";	
				$query=mysql_query($sql); echo $sql;
			//}
				
					//	{
					//	echo' success!';
					//	}
					//	else
						//{
					//	echo'failed';
						//}
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
				$sql2="UPDATE event SET Event_name='$event_name',Location='$Location', Start='$Start', End='$End', Time='$Time',Finish='$Finish',Published_at='$Published_at', Category_id='2' WHERE Event_id='{$_GET['id']}'";	
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
		$sql=("SELECT * FROM event WHERE Category_id='2' AND Event_id='$id'") or die (mysql_error());
		$query=mysql_query($sql);
		while($data=mysql_fetch_array($query))
		{		
		echo "<form action='' method='post' enctype='multipart/form-data' class='form-horizontal' role='form'>";
		$event_name=$data['Event_name'];
		$Location=$data['Location'];
		$Start=$data['Start'];
		$End=$data['End'];
		$Time=$data['Time'];
		$Finish=$data['Finish'];
		$Published_at=$data['Published_at'];
		$event=$data['Event_image'];
		$Category_id=$data['Category_id'];
		}
	?>
				
					<form action="" method="post" enctype="multipart/form-data" class="form-horizontal" role="form" name="form1">
			<div class="form-group">
				<label class="col-sm-2 control-label" for="event_id"></label>
					<div class="col-sm-2">
					<input type="hidden" value="<?php echo (isset($event_id)) ? $event_id : ''; ?>" class="form-control" name="Event_id">
					
					</div>
			</div>
			<div class="form-group <?php echo (isset($error['event_name'])) ? 'warning' : ''; ?>" id="event_name">
				<label class="col-sm-2 control-label" for="event_name">Event Name</label>
					<div class="col-sm-8">
					<input type="text" class="form-control" value="<?php echo (isset($event_name)) ? $event_name : ''; ?>" name="Event_name">
					<p class="help-block"><?php echo (isset($error['event_name'])) ? $error['event_name'] : ''; ?></p>
					</div>
			</div>
			<div class="form-group <?php echo (isset($error['Location'])) ? 'warning' : ''; ?>" id="Location">
				<label class="col-sm-2 control-label" for="Location">Location</label>
					<div class="col-sm-2">
					<textarea name="Location"  class="form-control" rows="3"><?php echo (isset($Location)) ? $Location : ''; ?></textarea>
					<p class="help-block"><?php echo (isset($error['Location'])) ? $error['Location'] : ''; ?></p>
					</div>
			</div>
			<div class="form-group" id="start">
			<label class="col-sm-2 control-label" for="start">Start</label>
                <div class="col-sm-4">
                    <input type='text' name="Start" id="tgl" value="<?php echo (isset($Start)) ? $Start : ''; ?>" />
                  
                </div>
            </div>
		<div class="form-group" id="end">
			<label class="col-sm-2 control-label" for="end">End</label>
                <div class="col-sm-4">
                    <input type='text' name="End" id="tgl2" value="<?php echo (isset($End)) ? $End : ''; ?>" />
                  
                </div>
        </div>
		<div class="form-group" id="end">
			<label class="col-sm-2 control-label" for="time">Time</label>
                <div class="col-sm-4">
                    <input type='text' name="Time" id="Finish" value="<?php echo (isset($Time)) ? $Time : ''; ?>" />
                  
                </div>
        </div>
		<div class="form-group" id="end">
			<label class="col-sm-2 control-label" for="finish">Finish</label>
                <div class="col-sm-4">
                    <input type='text' name="Finish" id="Finish" value="<?php echo (isset($Finish)) ? $Finish : ''; ?>"/>
                  
                </div>
        </div>
		<div class="form-group">
			<label class="col-sm-2 control-label" for="event"></label>
				<div class="col-sm-4">
					<img src="../img/event/<?php echo $event; ?>" width="100px">
				</div>
		</div>
			<div class="form-group" id="image">
				<label class="col-sm-2 control-label" for="image">Image</label>
					<div class="col-sm-2">
					<input type="file" id="image" name="event">
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
<!--end Location-->

</div><!-- /#wrapper -->
   
  </body>
</html>
<?php } ?>