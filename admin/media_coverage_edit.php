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
              <li><i class="fa fa-dashboard"></i> Media Coverage</li>
			  <li class="active"><i class="fa fa-dashboard"></i> Edit</li>
            </ol>
			<div class="span6 pull-right">
				<a class="btn btn-small btn-primary" href="media_coverage.php">Back</a>
			</div>
        </div></div><br>
			<div class="row">
          <div class="col-lg-12">
            <div class="panel panel-primary">
	<div class="panel-body">
	<?php
	if (isset($_POST['bkirim']))
	{
		if(empty($_POST['news_name']))
		{
			$error['err_news_name']='News title required!';
		}
		else
		{
		$news_name=$_POST['news_name'];
		}
		if(empty($_POST['Description']))
		{
			$error['err_description']='Description required!';
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
		$file=$_FILES['News']['name'];
		if(empty($error))
		{
			if(move_uploaded_file($_FILES['News']['tmp_name'],"../img/news/".$file))
			{	
			
				echo "upload file success ".$file;
			
				$sql="UPDATE news SET News_name='$news_name', Description='$Description', Content='$url', News_image='$file',Created_at='$Created_at', Category_id='2' WHERE News_id='{$_GET['id']}'";
				$query=mysql_query($sql); //echo $sql;
			
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
			else {
				$sql="UPDATE news SET News_name='$news_name', Description='$Description', Content='$url',Created_at='$Created_at', Category_id='2' WHERE News_id='{$_GET['id']}'";
				$query=mysql_query($sql); echo $sql;
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
		}
		 else
	var_dump($error);
}
		$id = $_GET['id'];
		$sql=("SELECT * FROM news WHERE News_id='$id'") or die (mysql_error());
		$query=mysql_query($sql);
		while($data=mysql_fetch_array($query))
		{		
		$news_name		=$data['News_name'];
		$Description	=$data['Description'];
		$url			=$data['Content'];
		$News_image		=$data['News_image'];
		$Created_at		=date('m/d/Y', strtotime($data['Created_at'])); 
		}
	?>
		<form action='' method='post' class='form-horizontal' role='form' name='form1'>
		<div class="form-group <?php echo (isset($error['news_name'])) ? 'warning' : ''; ?>" id="news_name">
				<label class="col-sm-2 control-label" for="news_name">Title</label>
					<div class="col-sm-10">
					<input type="text" class="form-control" value="<?php echo (isset($news_name)) ? $news_name : ''; ?>" name="news_name">
					<p class="help-block"><?php echo (isset($error['news_name'])) ? $error['news_name'] : ''; ?></p>
					</div>
			</div>
		<div class="form-group <?php echo (isset($error['err_Description'])) ? 'warning' : ''; ?>" id="descriptions">
			<label class="col-sm-2 control-label" for="Description">Descriptions</label>
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
			<div class="form-group">
			<label class="col-sm-2 control-label" for="News"></label>
				<div class="col-sm-4">
					<img src="../img/news/<?php echo $News_image; ?>" width="100px">
				</div>
		</div>
			<div class="form-group" id="image">
				<label class="col-sm-2 control-label" for="News">Image</label>
					<div class="col-sm-2">
					<input type="file" id="image" name="News">
					</div>
			</div>
			
			<div class="form-group">
				<label class="col-sm-2 control-label"></label>
					<div class="col-sm-4">
						<input name="bkirim" type="submit" id="bkirim" class="btn btn-primary" value="Save" />
						<input type="reset" name="bbatal" id="bbatal" class="btn btn-default" value="Cancel" />
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