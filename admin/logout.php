<?php
  session_start();
  session_destroy();
  echo "<script>alert('You Have Logged Out!'); window.location = 'login.php'</script>";
?>