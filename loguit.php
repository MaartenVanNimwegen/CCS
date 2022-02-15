<?php
   session_start();
   unset($_SESSION["admin_name"]);
   unset($_SESSION["user_name"]);
   
   echo 'Je bent uitgelogd';
   header('Refresh: 1; URL = index.php');
?>