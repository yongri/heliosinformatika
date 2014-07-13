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
			<h1><img src="../img/helios.png" width="50px" height="50px">  event </h1>
            <ol class="breadcrumb">
              <li><i class="fa fa-dashboard"></i> Dashboard</li> <span class="divider">/</span>
				<li> Event</li><li class="active">Add</li>
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
		<?php if ($_POST)
				{
					$event_id	=$_POST['event_id'];
					if(empty($_POST['event_name']))
					{
						$error['err_event_name']='Name event Required';
					}
					else
					{
						$event_name=$_POST['event_name'];
					}
					if(empty($_POST['Location']))
					{
						$error['err_Location']='Location required';
					}
					else
					{
						$Location=$_POST['Location'];
					}
					$Start= date('Y-m-d',strtotime($_POST['Start']));
					$End= date('Y-m-d',strtotime($_POST['End']));
					$Time=$_POST['Time'];
					$Finish=$_POST['Finish'];
					$Published_at=date('Y').'-'.date('m').'-'.date('d');
					if (empty($error))
					{
						$event=$_FILES['event']['name'];
						$physic_event=$_FILES['event']['tmp_name'];
						$sql="INSERT INTO event (Event_id, Event_name, Location, Start, End, Time, Finish, Published_at, Event_image, Category_id) VALUES ('$event_id','$event_name','$Location','$Start','$End','$Time','$Finish','$Published_at','$event','2')";
						$query=mysql_query($sql); 
						//echo $input;
						if (copy($physic_event,"../img/event/".$event))
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
									  <strong>Good!</strong> Update Success!</div>";
				}
				else
				{
					echo "<div class='alert alert-warning alert-dismissable'>
									  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
									  <strong>Sorry!</strong>Update failed!</div>";
				}
					}
				/*	else
					{
						var_dump($error);
					} */
				}
				

				?>
					<form action="" method="post" enctype="multipart/form-data" class="form-horizontal" role="form" name="form1">
			<div class="form-group">
				<label class="col-sm-2 control-label" for="event_id"></label>
					<div class="col-sm-2">
					<input type="hidden" value="<?php echo (isset($event_id)) ? $event_id : ''; ?>" class="form-control" name="event_id">
					
					</div>
			</div>
			<div class="form-group <?php echo (isset($error['event_name'])) ? 'warning' : ''; ?>" id="event_name">
				<label class="col-sm-2 control-label" for="event_name">Event Name</label>
					<div class="col-sm-8">
					<input type="text" class="form-control" value="<?php echo (isset($event_name)) ? $event_name : ''; ?>" name="event_name">
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
		<div class="form-group" id="time">
			<label class="col-sm-2 control-label" for="Time">Time </label>
                <div class="col-sm-4">
                    <input type='text' name="Time" value="<?php echo (isset($Time)) ? $Time : ''; ?>" placeholder="Example : 08:30:00" />
                </div>
        </div>
		<div class="form-group" id="finish">
			<label class="col-sm-2 control-label" for="Finish">Finish</label>
                <div class="col-sm-4">
                    <input type='text' name="Finish" value="<?php echo (isset($Finish)) ? $Finish : ''; ?>" placeholder="Example : 08:30:00" />
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
<!--end content-->

</div><!-- /#wrapper -->
   
  </body>
</html>
<?php } ?>