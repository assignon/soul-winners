<?php
   require "../reachoutNL/webApp/controllers/routing.php";
   class web_app
   {

     private $currentPage = "page";

      public function __construct()
      {

        $this->path();

      }


      public function path()
      {

          $routing = new routing();

          if(isset($_GET[$this->currentPage]))
          {

               $page = htmlspecialchars($_GET[$this->currentPage]);
              // $routing->home();

               if($page == 'home')
               {

                  $routing->home();

               }else if($page == 'reachoutAmsterdam')
               {

                  $routing->reachoutAmsterdam();

               }else if($page == 'logout')
               {

                  $routing->logout();

               }

          }

      }

   }

 ?>
