<div id='cssmenu'>
						<ul>
						<?php $sql1=("SELECT * FROM news WHERE Category_id='1' ORDER BY News_id DESC LIMIT 4") or die (mysql_error());
								$query1=mysql_query($sql1);
								while($data1=mysql_fetch_array($query1))
								{
								$news_id	=$data1['News_id'];
											 if($news_id > 0){
								?>
							<li class='active'><a href='http://<?php echo BASE_URL; ?>/press_detail.php?id=<?php echo $data1['News_id']; ?>'><span><?php echo $data1['News_name']; ?></span><br/><br/><span><em><?php echo date('d M Y',strtotime($data1['Created_at'])); ?></em></span></a></li>
						<?php } 
						else{
								echo "<span>>No News</span>";
							}
						 }
						 ?>
						</ul>
					</div>