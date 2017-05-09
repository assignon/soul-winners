<?php

   session_start();
   $_SESSION = array();
   session_destroy();
   header("Location:../reachoutNL/welcom.php?page=home");

 ?>
