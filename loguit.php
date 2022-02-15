<?php
   session_start();
   unset($_SESSION["admin_name"]);
   unset($_SESSION["user_name"]);
   
   echo "<script>alert('Je bent uitgelogd')</script>";
   header('Refresh: 0.1; URL = index.php');
?>