<?php
session_start(); 
if(!isset($_SESSION['User_id'])){
header("location:login.php");
}
else
{
include  "../connection.php";
include "header.php";
include "../library/class.phpmailer.php"; 

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
            <h1> <img src="../img/helios.png" width="50px" height="50px"> Business Partner</h1>
            <ol class="breadcrumb">
              <li class="active"><i class="fa fa-dashboard"></i> Business Partner</li>
            </ol>
			<div class="row">
          <div class="col-lg-12">
            <div class="panel panel-primary">
			  <div class="panel-body">
					<div class="table-responsive">
                  <table class="table table-bordered table-hover table-striped tablesorter judul">
                    <thead>
                      <tr>
                        <th width="10%">ID Partner</th>
                        <th width="30%">Name</th>
						<th width="20%">Status</th>
						<th width="50%">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
					<?php
					$sql="SELECT * FROM business_partner ORDER BY Bp_id DESC";
					$query=mysql_query($sql);
					while($row=mysql_fetch_array($query))
					{
                        $bp_id	=$row['Bp_id'];
                        $name=$row['Name'];
						$status=$row['Status'];
					  ?> 
					  <tr>
						<td width="10%"><?php echo $bp_id; ?></td>
						<td width="30%"><?php echo $name; ?></td>
						<td width="30%"><span class="label
							<?php 
							if($status=='Unconfirmed')
								echo "label-danger"; 				
							else if($status=='Confirmed')
								echo "label-primary";
							?>"> <?php echo $status; ?></span>
						</td>
						<td width="50%">
							<a href="bp_confirm.php?&id=<?php echo  $bp_id; ?>">See Detail</a> | 
							<a href="bp_list.php?&id=<?php echo  $bp_id; ?>">Delete</a>						
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