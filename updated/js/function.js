
function setimage(timediff,eventcode,header){
//alert(timediff+','+eventcode+','+header);
  //var values = image_url.split('#');
  var image_url = 'Isuzu/Isuzu-MovingTruck_';
  var isrotation = 1;

  //var name = values[0];

   if (timediff < 1) 
       {

        if(eventcode=='4001' || eventcode=='6011' || eventcode=='8001')
        { 
     /*if (header == 901)//for poi image on history
         {
          image = 'image/poi/'+image_url+'.png';
         }*/
     
		if (header >= 349 || header < 12 || isrotation == 0)
         {
          image = 'image/vehicles/'+image_url+'Green0001.png';
         }
         else if (header >= 12 && header < 34)
         {
          image = 'image/vehicles/'+image_url+'Green0031.png';
         }
         else if (header >= 34 && header < 57)
         {
          image = 'image/vehicles/'+image_url+'Green0029.png';
         }
         else if (header >= 57 && header < 79)
         {
          image = 'image/vehicles/'+image_url+'Green0027.png';
         }
         else if (header >= 79 && header < 102)
         {
          image = 'image/vehicles/'+image_url+'Green0025.png';
         }
         else if (header >= 102 && header < 124)
         {
          image = 'image/vehicles/'+image_url+'Green0023.png';
         }
         else if (header >= 124 && header < 147)
         {
          image = 'image/vehicles/'+image_url+'Green0021.png';
         }
         else if (header >= 147 && header < 169)
         {
          image = 'image/vehicles/'+image_url+'Green0019.png';
         }
         else if (header >= 169 && header < 192)
         {
          image = 'image/vehicles/'+image_url+'Green0017.png';
         }
         else if (header >= 192 && header < 214)
         {
          image = 'image/vehicles/'+image_url+'Green0015.png';
         }
         else if (header >= 214 && header < 237)
         {
          image = 'image/vehicles/'+image_url+'Green0013.png';
         }
         else if (header >= 237 && header < 259)
         {
          image = 'image/vehicles/'+image_url+'Green0011.png';
         }
         else if (header >= 259 && header < 282)
         {
          image = 'image/vehicles/'+image_url+'Green0009.png';
         }
         else if (header >= 282 && header < 304)
         {
          image = 'image/vehicles/'+image_url+'Green0007.png';
         }
         else if (header >= 304 && header < 327)
         {
          image = 'image/vehicles/'+image_url+'Green0005.png';
         }
         else if (header >= 327 && header < 349)
         {
          image = 'image/vehicles/'+image_url+'Green0003.png';
         }
         else 
         {
          image = 'image/vehicles/'+image_url+'Green0001.png';
         }
        }//end green condition

        else if(eventcode=='4002' || eventcode=='6012')
        {
         if (header >= 349 || header < 12 || isrotation == 0)
         {
          image = 'image/vehicles/'+image_url+'Red0001.png';
         }
         else if (header >= 12 && header < 34)
         {
          image = 'image/vehicles/'+image_url+'Red0031.png';
         }
         else if (header >= 34 && header < 57)
         {
          image = 'image/vehicles/'+image_url+'Red0029.png';
         }
         else if (header >= 57 && header < 79)
         {
          image = 'image/vehicles/'+image_url+'Red0027.png';
         }
         else if (header >= 79 && header < 102)
         {
          image = 'image/vehicles/'+image_url+'Red0025.png';
         }
         else if (header >= 102 && header < 124)
         {
          image = 'image/vehicles/'+image_url+'Red0023.png';
         }
         else if (header >= 124 && header < 147)
         {
          image = 'image/vehicles/'+image_url+'Red0021.png';
         }
         else if (header >= 147 && header < 169)
         {
          image = 'image/vehicles/'+image_url+'Red0019.png';
         }
         else if (header >= 169 && header < 192)
         {
          image = 'image/vehicles/'+image_url+'Red0017.png';
         }
         else if (header >= 192 && header < 214)
         {
          image = 'image/vehicles/'+image_url+'Red0015.png';
         }
         else if (header >= 214 && header < 237)
         {
          image = 'image/vehicles/'+image_url+'Red0013.png';
         }
         else if (header >= 237 && header < 259)
         {
          image = 'image/vehicles/'+image_url+'Red0011.png';
         }
         else if (header >= 259 && header < 282)
         {
          image = 'image/vehicles/'+image_url+'Red0009.png';
         }
         else if (header >= 282 && header < 304)
         {
          image = 'image/vehicles/'+image_url+'Red0007.png';
         }
         else if (header >= 304 && header < 327)
         {
          image = 'image/vehicles/'+image_url+'Red0005.png';
         }
         else if (header >= 327 && header < 349)
         {
          image = 'image/vehicles/'+image_url+'Red0003.png';
         }
         else 
         {
          image = 'image/vehicles/'+image_url+'Red0001.png';
         }
        } 
        else{
           if (header >= 349 || header < 12 || isrotation == 0)
                if (header >= 349 || header < 12 || isrotation == 0)
         {
          image = 'image/vehicles/'+image_url+'Yellow0001.png';
         }
         else if (header >= 12 && header < 34)
         {
          image = 'image/vehicles/'+image_url+'Yellow0031.png';
         }
         else if (header >= 34 && header < 57)
         {
          image = 'image/vehicles/'+image_url+'Yellow0029.png';
         }
         else if (header >= 57 && header < 79)
         {
          image = 'image/vehicles/'+image_url+'Yellow0027.png';
         }
         else if (header >= 79 && header < 102)
         {
          image = 'image/vehicles/'+image_url+'Yellow0025.png';
         }
         else if (header >= 102 && header < 124)
         {
          image = 'image/vehicles/'+image_url+'Yellow0023.png';
         }
         else if (header >= 124 && header < 147)
         {
          image = 'image/vehicles/'+image_url+'Yellow0021.png';
         }
         else if (header >= 147 && header < 169)
         {
          image = 'image/vehicles/'+image_url+'Yellow0019.png';
         }
         else if (header >= 169 && header < 192)
         {
          image = 'image/vehicles/'+image_url+'Yellow0017.png';
         }
         else if (header >= 192 && header < 214)
         {
          image = 'image/vehicles/'+image_url+'Yellow0015.png';
         }
         else if (header >= 214 && header < 237)
         {
          image = 'image/vehicles/'+image_url+'Yellow0013.png';
         }
         else if (header >= 237 && header < 259)
         {
          image = 'image/vehicles/'+image_url+'Yellow0011.png';
         }
         else if (header >= 259 && header < 282)
         {
          image = 'image/vehicles/'+image_url+'Yellow0009.png';
         }
         else if (header >= 282 && header < 304)
         {
          image = 'image/vehicles/'+image_url+'Yellow0007.png';
         }
         else if (header >= 304 && header < 327)
         {
          image = 'image/vehicles/'+image_url+'Yellow0005.png';
         }
         else if (header >= 327 && header < 349)
         {
          image = 'image/vehicles/'+image_url+'Yellow0003.png';
         }
         else 
         {
          image = 'image/vehicles/'+image_url+'Yellow0001.png';
         }
          } 
        }
        else
        {
          if (header >= 349 || header < 12 || isrotation == 0)
         {
          image = 'image/vehicles/'+image_url+'Grey0001.png';
         }
         else if (header >= 12 && header < 34)
         {
          image = 'image/vehicles/'+image_url+'Grey0031.png';
         }
         else if (header >= 34 && header < 57)
         {
          image = 'image/vehicles/'+image_url+'Grey0029.png';
         }
         else if (header >= 57 && header < 79)
         {
          image = 'image/vehicles/'+image_url+'Grey0027.png';
         }
         else if (header >= 79 && header < 102)
         {
          image = 'image/vehicles/'+image_url+'Grey0025.png';
         }
         else if (header >= 102 && header < 124)
         {
          image = 'image/vehicles/'+image_url+'Grey0023.png';
         }
         else if (header >= 124 && header < 147)
         {
          image = 'image/vehicles/'+image_url+'Grey0021.png';
         }
         else if (header >= 147 && header < 169)
         {
          image = 'image/vehicles/'+image_url+'Grey0019.png';
         }
         else if (header >= 169 && header < 192)
         {
          image = 'image/vehicles/'+image_url+'Grey0017.png';
         }
         else if (header >= 192 && header < 214)
         {
          image = 'image/vehicles/'+image_url+'Grey0015.png';
         }
         else if (header >= 214 && header < 237)
         {
          image = 'image/vehicles/'+image_url+'Grey0013.png';
         }
         else if (header >= 237 && header < 259)
         {
          image = 'image/vehicles/'+image_url+'Grey0011.png';
         }
         else if (header >= 259 && header < 282)
         {
          image = 'image/vehicles/'+image_url+'Grey0009.png';
         }
         else if (header >= 282 && header < 304)
         {
          image = 'image/vehicles/'+image_url+'Grey0007.png';
         }
         else if (header >= 304 && header < 327)
         {
          image = 'image/vehicles/'+image_url+'Grey0005.png';
         }
         else if (header >= 327 && header < 349)
         {
          image = 'image/vehicles/'+image_url+'Grey0003.png';
         }
         else 
         {
          image = 'image/vehicles/'+image_url+'Grey0001.png';
         }
      }
      var bgimg = new Image();
          bgimg.src = image;
        //  center='30';
        //  size: new google.maps.Size(bgimg.width, bgimg.height),
        
        image = { url: image,
              origin: new google.maps.Point(0,0),
              anchor: new google.maps.Point((bgimg.width*0.5), (bgimg.height*0.5))
              };
        
          return image;
    }
    
                    function view_change(module){
			
			$.get( "check_session.php", function(data) {
			  if(data.trim()=='out'){
				  alert('Session out. Contractor redirecting you to login page..');
				window.location.href='index.php';
			  }
			});
			if(module == 'Map'){ 
				$(".current_view").hide();
				$("#map").show();
				$('.multiselect').removeAttr("disabled");
				   initialize();
			}
      else if(module=='Admin'){
        $(".current_view").hide();
        $('#Admin').show();
        $('.multiselect').attr('disabled', 'disabled');
        if($("#Admin").html().trim()==''){
          $("#Admin").html("<center><img src='image/spinner.gif'> <strong>Please wait while getting Admin...</strong></center>");
          $("#Admin").load("Admin.php");
          $("#tracker").load('tracker_list.php');
        }
      }
			else if(module == 'Manage POI'){ 
				$(".current_view").hide();
				$('#manage_poi').show();
				$('.multiselect').removeAttr("disabled");
				if($("#manage_poi").html().trim()==''){
					$("#manage_poi").html("<center><img src='image/spinner.gif'> <strong>Please wait while getting History...</strong></center>");
					$("#manage_poi").load("Manage_POI.php");
				}
			}
                    }