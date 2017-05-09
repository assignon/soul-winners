<?php

   require "../reachoutNL/webApp/core/controller.php";

   class routing extends controllers
   {

        public function __construct()
        {

            parent::__construct();

        }


        public function home()
        {

           $this->public_view('home');

        }

        public function reachoutAmsterdam()
        {

           $this->private_view('reachout_session');

        }

        public function logout()
        {

           $this->private_view('logout');

        }

   }

 ?>
