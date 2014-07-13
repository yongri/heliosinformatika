<?php
  session_start();
  include "cons.php";
  session_destroy();
  echo "<script>alert('You Have Signed Out!'); window.location = 'http://10.8.102.19/heliosinformatika/'</script>";
?>