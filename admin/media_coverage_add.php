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
            <h1><img src="../img/helios.png" width="50px" height="50px"> Media Coverage</h1>
			  <ol class="breadcrumb">
              <li><i class="fa fa-dashboard"></i> Dashboard</li>
			  <li class="active"><i class="fa fa-dashboard"></i> Media Coverage</li>
            </ol>
			<div class="span6 pull-right">
				<a class="btn btn-small btn-primary" href="media_coverage.php">Back</a>
			</div>
          </div>
        </div><!-- /.row --><br>
        <div class="row">
          <div class="col-lg-12">
            <div class="panel panel-primary">
				<div class="panel-body">
					<?php if ($_POST)
				{
					$news_id	=$_POST['news_id'];
					if(empty($_POST['news_name']))
					{
						$error['err_news_name']='Title News Required';
					}
					else
					{
						$news_name=$_POST['news_name'];
					}
					if(empty($_POST['Description']))
					{
						$error['err_Description']='Description required';
					}
					else
					{
						$Description=$_POST['Description'];
					}
					if(empty($_POST['url']))
					{
						$error['err_url']='URL News required';
					}
					else
					{
						$url=$_POST['url'];
					}
					$Created_at= date('Y-m-d H:i:s', strtotime($_POST['Created_at']));
					if (empty($error))
					{
						$news=$_FILES['news']['name'];
						$physic_news=$_FILES['news']['tmp_name'];
						$sql="INSERT INTO news VALUES ('$news_id','$news_name','$Description','$url','$news','$Created_at','2')";
						$query=mysql_query($sql);
						//echo $input;
						if (move_uploaded_file($physic_news,"../img/news/".$news))
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
		<form action="" method="post" enctype="multipart/form-data" class="form-horizontal" role="form">
			<div class="form-group">
				<label class="col-sm-2 control-label" for="news_id"></label>
					<div class="col-sm-2">
					<input type="hidden" value="<?php echo (isset($news_id)) ? $news_id : ''; ?>" class="form-control" name="news_id">
					
					</div>
			</div>
			<div class="form-group <?php echo (isset($error['news_name'])) ? 'warning' : ''; ?>" id="news_name">
				<label class="col-sm-2 control-label" for="news_name">Title</label>
					<div class="col-sm-10">
					<input type="text" class="form-control" value="<?php echo (isset($news_name)) ? $news_name : ''; ?>" name="news_name">
					<p class="help-block"><?php echo (isset($error['news_name'])) ? $error['news_name'] : ''; ?></p>
					</div>
			</div>
		<div class="form-group <?php echo (isset($error['err_Description'])) ? 'warning' : ''; ?>" id="descriptions">
			<label class="col-sm-2 control-label" for="Description">Description News</label>
				<div class="col-sm-4">
					<textarea name="Description" rows="5" class="form-control"><?php echo (isset($Description)) ? $Description : ''; ?></textarea>
					<p class="help-block"><?php echo (isset($error['err_Description'])) ? $error['err_Description'] : ''; ?></p>
				</div>
		</div>
		<div class="form-group <?php echo (isset($error['err_url'])) ? 'warning' : ''; ?>" id="url">
			<label class="col-sm-2 control-label" for="url">URL/Link News</label>
				<div class="col-sm-8">
				<input type="text" class="form-control" value="<?php echo (isset($url)) ? $url : ''; ?>" name="url">
					<p class="help-block"><?php echo (isset($error['err_url'])) ? $error['err_url'] : ''; ?></p>
				</div>
		</div>
			<div class="form-group" id="Created_at">
			<label class="col-sm-2 control-label" for="Description">Created at</label>
                <div class="col-sm-4">
                    <input type='text' name="Created_at" id="tgl" value="<?php echo (isset($Created_at)) ? $Created_at : ''; ?>" />
                </div>
            </div>
			<div class="form-group" id="news">
				<label class="col-sm-2 control-label" for="news">Image</label>
					<div class="col-sm-2">
					<input type="file" id="news" name="news">
					</div>
			</div>
			<div class="form-group">
			<label class="col-sm-2 control-label" for="tombol"></label>
				<div class="col-sm-2">
					<input name="bkirim" type="submit" id="bkirim" class="btn btn-primary" value="Simpan" />
					<input type="reset" name="bbatal" id="bbatal" class="btn btn-default" value="Batal" />
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