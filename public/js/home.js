window.addEventListener("load", function(){

   var start = document.getElementById("start");
   var register = document.querySelector(".register");
   var login = document.querySelector(".login");
   var registerLogin = document.querySelectorAll(".registerLogin");
   var backButton = document.querySelectorAll(".icon-circle-left");
   var error = document.getElementById("error");
   var passRecover = document.getElementById("passRecover");
   var passRecovery = document.getElementById("passRecovery");



   function hide(id,delay)
   {

      $(function(){

         $(id).hide(delay);

      })

   }


   function show(id,delay)
   {

      $(function(){

        $(id).show(delay);

      })

   }

   hide(register,"slow");
   hide(login, "slow");
   hide(passRecover, "slow");


   for (var i = 0; i < registerLogin.length; i++) {

       registerLoginArr = registerLogin[i];
       registerLoginArr.addEventListener("click", function(e){

           hide(start, 'slow');
           var registerOrLogin  = e.target.id;
           var classConvert = document.querySelector('.'+registerOrLogin);
           classConvert.style.opacity = "1";

           show(classConvert,'slow');

           if(registerOrLogin == "register")
           {

               error.innerHTML = "Create a new account...";

           }else if(registerOrLogin == "login")
           {

              error.innerHTML = "Login...";

           }

       })

   }


   for (var i = 0; i < backButton.length; i++) {

       var backButtonArr = backButton[i];
       backButtonArr.addEventListener("click", function(e){

          var parent = e.target.parentNode;
          hide(parent,'slow');
          show(start,'slow');

          error.innerHTML = "Login of make a new account...";

       })

   }


   passRecovery.addEventListener("click", function(){

      passRecover.style.opacity = "1";
      show(passRecover, "slow");
      error.innerHTML = "Enter your Email to get a new password...";

   })


   backButton[1].addEventListener('click', function(){

     hide(passRecover, "slow");

   })


   var soulWinners = document.getElementById("soulWinners");
   var bibleVers = "And he said unto them, Go ye into all the world, and preach the gospel to every creature. (Marc 16:15)";
   var bibleVersArr = bibleVers.split("");
   var timer;

   function frameLooper()
   {

      if(bibleVersArr.length > 0)
      {

        soulWinners.innerHTML += bibleVersArr.shift();

      }else{

        clearTimeout(timer);

      }

      timer = setTimeout(frameLooper,50);


   }
   frameLooper();




})
