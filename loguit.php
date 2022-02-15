<?php
   session_start();
   unset($_SESSION["admin_name"]);
   unset($_SESSION["user"]);
   
   echo 'Je bent uitgelogd';
   header('Refresh: 2; URL = index.php');
?>