<?php

   class controllers
   {

       public function __construct()
       {}


       protected function private_view($filename)
       {

          require "../reachoutNL/webApp/views/sessions/".$filename.".php";

       }


       protected function public_view($filename)
       {

          require "../reachoutNL/webApp/views/pages/".$filename.".php";

       }

   }

 ?>
