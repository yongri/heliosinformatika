<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Helios - Admin</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <!-- Page Specific CSS -->
    <link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.4.3.min.css">
	
	
	
  </head>

  <body>

    <div class="container">
<div class="row">
<div class="col-sm-6 col-md-4 col-md-offset-4">
<h1 class="text-center login-title">Login</h1>
<div class="account-wall">
<img class="profile-img" src="#" alt="">
<form class="form-signin" method="post" action="cek_login.php">
	<input type="text" name="username" class="form-control" placeholder="Username" required autofocus>
	<input type="password" name="password" class="form-control" placeholder="Password" required>
	<button class="btn btn-lg btn-primary btn-block" type="submit">
	Login</button>
</form>
</div>
</div>
</div>
</div>
</body>
</html>