<?php /*
date_default_timezone_set("asia/jakarta");
$koneksi=mysql_connect("localhost","root","") or die("Connection to server Failed!");
$konekDB=mysql_select_db("webhelios",$koneksi) or die("Connection to database Failed!");
mysql_close(); */
?>
<?php 
date_default_timezone_set("asia/jakarta");
$hostname = "localhost"; /*nama server*/
$dbuser = "root"; /*nama username database*/
$dbpass = "ctidb112233"; /*password database*/
$dbName = "webhelios"; /*nama database*/
 
$koneksi = mysql_connect($hostname,$dbuser,$dbpass);
$konekDB = mysql_select_db($dbName,$koneksi);
?>