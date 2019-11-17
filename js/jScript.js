$(document).ready(function(){
    $('.parallax').parallax();
    $('select').formSelect();
    $('.datepicker').datepicker();

  });
      

  var x = 1;
  function create_calender(){
    
    x++;
    var event = 'event'+x;
    var date = 'date'+x;
    var main_div = document.getElementById("main_div");

    var div1 = document.createElement("div");
    div1.setAttribute("class", "input-field col s6 l6");
    div1.innerHTML = '<input name="'+event+'" id="'+event+'" type="text" class="validate"><label for="'+event+'" data-error="wrong" data-success="right">Event '+(x)+'</label>';
    main_div.appendChild(div1);
    
    var div2 = document.createElement("div");
    div2.setAttribute("class", "input-field col s6 l6");
    div2.innerHTML = '<input placeholder="Select Date" name="'+date+'" type="date">';
    main_div.appendChild(div2);

  }//end create_calender()


  var y = 1;
  function create_activity(){
    
    y++;
    var activity = 'activity'+y;
    var options = 'options'+y;
    var main_div1 = document.getElementById("main_div1");

    var div1 = document.createElement("div");
    div1.setAttribute("class", "input-field col s6 l6");
    div1.innerHTML = '<input name="'+activity+'" id="'+activity+'" type="text" class="validate"><label for="'+activity+'" data-error="wrong" data-success="right">Activity '+(y)+'</label>';
    main_div1.appendChild(div1);
    
    var div2 = document.createElement("div");
    div2.setAttribute("class", "input-field col s6 l6");
    div2.innerHTML = '<br><select class="browser-default black" name="'+options+'"><option value="" disabled selected>Activity Type</option><option value="academic">Academic</option><option value="sport">Sport</option></select>';
    main_div1.appendChild(div2);

  }//end create_activity()
