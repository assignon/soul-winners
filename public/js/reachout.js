window.addEventListener("load",function(){

    var home = document.querySelector(".icon-home2");
    var soulsList = document.querySelector(".icon-list2");
    var details = document.getElementById("details");
    var soulsForm = document.getElementById("soulsForm");
    var soulsAdded = document.getElementById("soulsAdded");


    home.addEventListener('click', function(){

      details.innerHTML = "Fill the fields to add souls";

      $(function(){

         $(soulsForm).show('slow');
         $(soulsAdded).hide('slow');
         $(soulsAdded).css('opacity','0');

      })

    })


    soulsList.addEventListener('click', function(){

      details.innerHTML = "All the souls that have been added";

      $(function(){

         $(soulsForm).hide('slow');
         $(soulsAdded).show('slow');
         $(soulsAdded).css('opacity','1');

      })

    })


})
