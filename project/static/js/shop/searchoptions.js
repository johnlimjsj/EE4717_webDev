      $('p#searchoptionslink').one("click", moresearchoptions);

      function moresearchoptions(){ 
        $(this).html('Less Search Options');
        $('table.searchoptions').addClass('show');
        $(this).one("click", lesssearchoptions);
      }
      function lesssearchoptions(){ 
        $(this).html('More Search Options ');
        $('table.searchoptions').removeClass('show');
        $(this).one("click", moresearchoptions);
      }