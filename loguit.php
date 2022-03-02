<?php
   session_start();
   unset($_SESSION["admin_name"]);
   unset($_SESSION["user_name"]);
   
   echo "<script>confirm('Log uit?')</script>";
   header('Refresh: 0.1; URL = index.php');
?>