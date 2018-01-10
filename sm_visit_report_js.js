
  $(function () {
    $(document).on("hidden.bs.modal", "#modalTaskObserved", function () {
      $(this).find('textarea').val('');
      $(this).find('input').val('');
      $(this).find('select').val('');
      $('#Tgreen').hide();
      $('#Tred').hide();
      $('#gif_ok').css('background-color','#AAAAAA');
      $('#gif_remove').css('background-color','#AAAAAA;');
      $('#gif_na').css('background-color','#AAAAAA;');
    });
  });

  var flag = 0;
  function showhide(event)
  {
    if(event == 0)
    {
      $('#Tred').hide();
      $('#Tgreen').show();
      $('#gif_ok').css('background-color','green');
      $('#gif_remove').css('background-color','#AAAAAA;');
      $('#gif_na').css('background-color','#AAAAAA;');
      return flag = 1;
    }
    else if(event == 1)
    {
      $('#Tgreen').hide();
      $('#Tred').show();
      $('#gif_remove').css('background-color','red');
      $('#gif_na').css('background-color','#AAAAAA;');
      $('#gif_ok').css('background-color','#AAAAAA;');
      return flag = 1;
    }
    else if(event == 2)
    {
      $('#Tred').hide();
      $('#Tgreen').show();
      $('#gif_na').css('background-color','#D9763');
      $('#gif_ok').css('background-color','#AAAAAA;');
      $('#gif_remove').css('background-color','#AAAAAA;');
      return flag = 1;
    }
  }

  function validation()
  {
    var taskOb = $('#taskObserved').val();
    var subContName = $('#subContName').val();
    var employees = $('#employees').val();
    if($('#Tgreen').css('display') != 'none')
    {
      if(taskOb == '' || subContName == 'Select...' || employees == '' || $('#Comments').val() == '')
      {
        if(flag == 1)
        {
          alert("Please Fill Complete Information...");
          return false;
        }
        if(flag == 0)
        {
          alert("Please Select Atleast One Action...");
          return false;
        }
      }
      else
      {
        return true;
      }  
    }
    else if($('#Tred').css('display') != 'none')
    {
      var actionRequired = $('#actionRequired').val();
      var respPerson = $('#respPerson').val();
      var targetDate = $('#targetDate').val();
      if(taskOb == '' || subContName == 'Select...' || employees == '' ||  actionRequired == '' || respPerson == '' || targetDate =='')
      {
        if(flag == 1)
        {
          alert("Please Fill Complete Information...");
          return false;
        }
        if(flag == 0)
        {
          alert("Please Select Atleast One Action...");
          return false;
        }
      }
      else
      {
        
        return true;
      } 
    }
    else
    {
      if(taskOb == '' || subContName == 'Select...' || employees == '')
      {
        alert("Please Fill Complete Information...");
        return false;
      }
      else
      {
        if(flag == 0)
        {
          alert("Please Select Atleast One Action...");
          return false;
        }
        else
        {
          return true;
        }
      }
    }
  }

  function saveData()
  {
    var valid = validation();
    if(valid)
    {
     alert("ok");
     //code to data... 
    }
  }




  var check=0;
  function flip_action(id)
  {
    // alert(id);
    if(check == '0')
    {
      check=1;
      $('.action_tr_2').hide();
      $('#content_'+id).fadeOut('slow').hide('slow');
      $('#action_'+id).fadeIn('slow').show();
    }
    else
    {
      alert('Select Action for the Previous Task or Close it');
    }
  }

  function flip_content(id)
  {
    check=0;
    $('#content_'+id).fadeIn('slow').show();
    $('#action_'+id).fadeOut('slow').hide('slow');
    // alert('ok');
  }

  
   
   function update_tick(row_id,tick_yes)
  {
     alert(tick_yes);
     $.ajax({
                        type: "POST",
                        url: "ajax_update_tick.php",
                        data: {action: tick_yes,task_id: row_id},
                        
                        success: function(data) {
                     
                            if(data=='1')
                            {
                              location.reload();
                            }
                            else
                            {
                              alert('Technical Error !! Try Again Later');
                            }
                          
                             
                        }
                    });
  }


  function update_na(row_id,na)
  {
     alert(na);
     $.ajax({
                        type: "POST",
                        url: "ajax_update_na.php",
                        data: {action: na,task_id: row_id},
                        
                        success: function(data) {
                     
                            if(data=='1')
                            {
                              location.reload();
                            }
                            else
                            {
                              alert('Technical Error !! Try Again Later');
                            }
                          
                             
                        }
                    });
  }



  $('.bottom_text').css('color','#fff');
  $('.leff').css('margin-left','60px');
  function openCity(evt, cityName) 
  {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) 
    {
      tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) 
    {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
    if(cityName == "leftTab")
    {
      $('#margin_set').height($(window).height() - $('fieldset').height());
    }
    if(cityName == "Paris")
    {
      $('#margin_set').height($(window).height() - $('fieldset').height());
    }
    if(cityName == "London")
    {
      $('#margin_set').height('0');
    }
  }
  // Get the element with id="defaultOpen" and click on it
  document.getElementById("defaultOpen").click();
