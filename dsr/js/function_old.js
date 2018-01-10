function capitalize( str )
{
    var pieces = str.split(" ");
    for ( var i = 0; i < pieces.length; i++ )
    {
        var j = pieces[i].charAt(0).toUpperCase();
        pieces[i] = j + pieces[i].substr(1).toLowerCase();
    }
    return pieces.join(" ");
}
function filter_table(data1,data2,data3,text_data,data8,data9,data10,jo_object){
	jo = jo_object.find('tr');
	if(text_data!= undefined){
		var data4 = capitalize(text_data.trim());
		var data5 = text_data.toLowerCase().trim();
		var data6 = text_data.toUpperCase().trim();
		var data7 = text_data.trim();
	}else{
		var data4 ='';
		var data5 ='';
		var data6 ='';
		var data7 ='';
	}
    jo.hide();
    jo.filter(function (i, v) {
        var $t = $(this);
		if(data10=='Active'){
		if ( ($t.is(":contains('Open')") || $t.is(":contains('EnRoute')") || $t.is(":contains('Arrived')")) && ($t.is(":contains('" + data1 + "')")) && ($t.is(":contains('" + data2 + "')")) && ($t.is(":contains('" + data3 + "')")) &&  ($t.is(":contains('" + data8 + "')")) && ($t.is(":contains('" + data9 + "')")) && (($t.is(":contains('" + data4 + "')")) || ($t.is(":contains('" + data5 + "')")) || ($t.is(":contains('" + data6 + "')")) || ($t.is(":contains('" + data7 + "')")) ) ) {
                return true;
            }
		}else{
            if ( ($t.is(":contains('" + data10 + "')")) && ($t.is(":contains('" + data1 + "')")) && ($t.is(":contains('" + data2 + "')")) && ($t.is(":contains('" + data3 + "')")) &&  ($t.is(":contains('" + data8 + "')")) && ($t.is(":contains('" + data9 + "')")) && (($t.is(":contains('" + data4 + "')")) || ($t.is(":contains('" + data5 + "')")) || ($t.is(":contains('" + data6 + "')")) || ($t.is(":contains('" + data7 + "')")) ) ) {
                return true;
            }
		}
		 return false;
		}).show();
}

function filter_poi_search(str,substationall){
    var filtered_subs = new Array();
    if(str!=null && str!=''){
      for(var j = 0; j < substationall.length; j++){
          var subs = substationall[j];
          if((subs[1].toLowerCase().indexOf(str.toLowerCase())>-1)){
            filtered_subs.push(subs);
          }
        }
    }
    else{
      filtered_subs = substationall;
  }
    return filtered_subs;
}//serch for poi string


 function get_veh_counts(timediff,eventcode){
   if (timediff < 1) 
   {
        if(eventcode=='4001' || eventcode=='6011' || eventcode=='4001_Z' || eventcode=='6011_Z')
        { 
		 veh_green++;
		}
        else if(eventcode=='4002' || eventcode=='6012' || eventcode=='4002_Z' || eventcode=='6012')
        {
		 veh_red++;
        }
		else
		{
		 veh_yellow++;
		}
	}
	else{
		veh_grey++;
	}
	veh_count = [['Eqp','Count'],['Ignition On',veh_green],['Ignition Off',veh_red],['Exception',veh_yellow],['Inactive',veh_total-veh_green-veh_red-veh_yellow]];
	return veh_count;

 }
function view_chart(){
	  $('#piechart').toggle();
}

 function initialize_both(LocationData,substationData)
	 {
		  isfitbounds = false ;
		  if(activeall_checked!='')
		  {
				 var event_arr = new Array();
				 event_arr[0]=0;
				 initialize(filter_eqptype($('#opco').val(),filter_eqptype($('#dept').val(),filter_eqptype($('#primary').val(),filter_eqptype($('#group').val(),filter_eqptype($('#eqp').val(),filter_eqptype(event_arr,LocationData,33),21),26),28),29),27));
		  }
		  else
		  {
				 initialize(filter_eqptype($('#opco').val(),filter_eqptype($('#dept').val(),filter_eqptype($('#primary').val(),filter_eqptype($('#group').val(),filter_eqptype($('#eqp').val(),LocationData,21),26),28),29),27));
		  }

		 if($('#poi').val()!=null  && substationData!=null)
		 {
			 initialize_poi_both(filter_eqptype($('#poi').val(),substationData,4));
		}
		right_click_event();
		long_press_zoom();
	 }


    
function filter_veh_search(str,all_sites){
    var filteredarray = new Array();
    
    if(str!=null && str!=''){
      for(var j = 0; j < all_sites.length; j++){
          var sites = all_sites[j];
          if(
            (sites[1].toLowerCase().indexOf(str.toLowerCase())>-1) || 
            (sites[41].toLowerCase().indexOf(str.toLowerCase())>-1) || 
            (sites[24].toLowerCase().indexOf(str.toLowerCase())>-1)|| 
            (sites[34].toLowerCase().indexOf(str.toLowerCase())>-1)){
            filteredarray.push(sites);
          }
        }
      }
    else{
      filteredarray = all_sites;
  }
    return filteredarray;
}

function setimage(timediff,eventcode,image_url,header){
   if (timediff < 1) 
       {
        if(eventcode=='4001' || eventcode=='6011' || eventcode=='8001')
        { 
		 if (header == 901)//for poi image on history
         {
          image = 'image/poi/'+image_url+'.png';
         }
		 else if (header >= 349 || header < 12)
         {
          image = 'image/vehicles/'+image_url+'green.png';
         }
         else if (header >= 12 && header < 34)
         {
          image = 'image/vehicles/'+image_url+'green1.png';
         }
         else if (header >= 34 && header < 57)
         {
          image = 'image/vehicles/'+image_url+'green2.png';
         }
         else if (header >= 57 && header < 79)
         {
          image = 'image/vehicles/'+image_url+'green3.png';
         }
         else if (header >= 79 && header < 102)
         {
          image = 'image/vehicles/'+image_url+'green4.png';
         }
         else if (header >= 102 && header < 124)
         {
          image = 'image/vehicles/'+image_url+'green5.png';
         }
         else if (header >= 124 && header < 147)
         {
          image = 'image/vehicles/'+image_url+'green6.png';
         }
         else if (header >= 147 && header < 169)
         {
          image = 'image/vehicles/'+image_url+'green7.png';
         }
         else if (header >= 169 && header < 192)
         {
          image = 'image/vehicles/'+image_url+'green8.png';
         }
         else if (header >= 192 && header < 214)
         {
          image = 'image/vehicles/'+image_url+'green9.png';
         }
         else if (header >= 214 && header < 237)
         {
          image = 'image/vehicles/'+image_url+'green10.png';
         }
         else if (header >= 237 && header < 259)
         {
          image = 'image/vehicles/'+image_url+'green11.png';
         }
         else if (header >= 259 && header < 282)
         {
          image = 'image/vehicles/'+image_url+'green12.png';
         }
         else if (header >= 282 && header < 304)
         {
          image = 'image/vehicles/'+image_url+'green13.png';
         }
         else if (header >= 304 && header < 327)
         {
          image = 'image/vehicles/'+image_url+'green14.png';
         }
         else if (header >= 327 && header < 349)
         {
          image = 'image/vehicles/'+image_url+'green15.png';
         }
         else 
         {
          image = 'image/vehicles/'+image_url+'green.png';
         }
        }//end green condition
        else if(eventcode=='4002' || eventcode=='6012')
        {
          image ='image/vehicles/'+image_url+'red.png';
        } 
                  else if(sites[2] == '6071')
                   {
                    ingstatus = 'Motion Start';
                    image = 'image/vehicles/StorageContainer/containeryellowopen.png';
                   }
                    else if(sites[2] == '6074' )
                   {
                    ingstatus = 'Periodic Location';
                    image = 'image/vehicles/StorageContainer/containergreen.png';
                   }
                    else if(sites[2] == '6072' )
                   {
                    ingstatus = 'Motion Stopped';
                    image = 'image/vehicles/StorageContainer/containerredclose.png';
                   }
                    else if(sites[2] == '6079')
                   {
                    ingstatus = 'Door Open';
                    image = 'image/vehicles/StorageContainer/containerredopen.png';
                   }
                   else if(sites[2] == '6071_Z')
                   {
                    ingstatus = 'Motion Start with No GPS';
                    image = 'image/vehicles/StorageContainer/containeryellowopen.png';
                   }
                    else if(sites[2] == '6074_Z' )
                   {
                    ingstatus = 'Periodic Location';
                    image = 'image/vehicles/StorageContainer/containergreen.png';
                   }
                    else if(sites[2] == '6072_Z' )
                   {
                    ingstatus = 'Motion Stopped with No GPS';
                    image = 'image/vehicles/StorageContainer/containerredclose.png';
                   }
                    else if(sites[2] == '6079_Z')
                   {
                    ingstatus = 'Door Open with No GPS';
                    image = 'image/vehicles/StorageContainer/containeryellowopen.png';
                   }
					else{
					 if (header >= 349 || header < 12)
							 {
							  image = 'image/vehicles/'+image_url+'yellow.png';
							 }
							 else if (header >= 12 && header < 34)
							 {
							  image = 'image/vehicles/'+image_url+'yellow1.png';
							 }
							 else if (header >= 34 && header < 57)
							 {
							  image = 'image/vehicles/'+image_url+'yellow2.png';
							 }
							 else if (header >= 57 && header < 79)
							 {
							  image = 'image/vehicles/'+image_url+'yellow3.png';
							 }
							 else if (header >= 79 && header < 102)
							 {
							  image = 'image/vehicles/'+image_url+'yellow4.png';
							 }
							 else if (header >= 102 && header < 124)
							 {
							  image = 'image/vehicles/'+image_url+'yellow5.png';
							 }
							 else if (header >= 124 && header < 147)
							 {
							  image = 'image/vehicles/'+image_url+'yellow6.png';
							 }
							 else if (header >= 147 && header < 169)
							 {
							  image = 'image/vehicles/'+image_url+'yellow7.png';
							 }
							 else if (header >= 169 && header < 192)
							 {
							  image = 'image/vehicles/'+image_url+'yellow8.png';
							 }
							 else if (header >= 192 && header < 214)
							 {
							  image = 'image/vehicles/'+image_url+'yellow9.png';
							 }
							 else if (header >= 214 && header < 237)
							 {
							  image = 'image/vehicles/'+image_url+'yellow10.png';
							 }
							 else if (header >= 237 && header < 259)
							 {
							  image = 'image/vehicles/'+image_url+'yellow11.png';
							 }
							 else if (header >= 259 && header < 282)
							 {
							  image = 'image/vehicles/'+image_url+'yellow12.png';
							 }
							 else if (header >= 282 && header < 304)
							 {
							  image = 'image/vehicles/'+image_url+'yellow13.png';
							 }
							 else if (header >= 304 && header < 327)
							 {
							  image = 'image/vehicles/'+image_url+'yellow14.png';
							 }
							 else if (header >= 327 && header < 349)
							 {
							  image = 'image/vehicles/'+image_url+'yellow15.png';
							 }
							 else 
							 {
							  image = 'image/vehicles/'+image_url+'yellow.png';
							 }
					} 
			  }
			  else{
				   image ='image/vehicles/'+image_url+'grey.png';
				  } 
				var bgimg = new Image();
					bgimg.src = image;
				//  center='30';
				//	size: new google.maps.Size(bgimg.width, bgimg.height),
				
				image = {	url: image,
							origin: new google.maps.Point(0,0),
							anchor: new google.maps.Point((bgimg.width*0.5), (bgimg.height*0.5))
						  };
				
				  return image;
}

function getimagesize(timediff,eventcode,image_url,header){
   if (timediff < 1) 
       {
        if(eventcode=='4001' || eventcode=='6011' || eventcode=='8001')
        { 
		 if (header == 901)//for poi image on history
         {
          image = 'image/poi/'+image_url+'.png';
         }
		 else if (header >= 349 || header < 12)
         {
          image = 'image/vehicles/'+image_url+'green.png';
         }
         else if (header >= 12 && header < 34)
         {
          image = 'image/vehicles/'+image_url+'green1.png';
         }
         else if (header >= 34 && header < 57)
         {
          image = 'image/vehicles/'+image_url+'green2.png';
         }
         else if (header >= 57 && header < 79)
         {
          image = 'image/vehicles/'+image_url+'green3.png';
         }
         else if (header >= 79 && header < 102)
         {
          image = 'image/vehicles/'+image_url+'green4.png';
         }
         else if (header >= 102 && header < 124)
         {
          image = 'image/vehicles/'+image_url+'green5.png';
         }
         else if (header >= 124 && header < 147)
         {
          image = 'image/vehicles/'+image_url+'green6.png';
         }
         else if (header >= 147 && header < 169)
         {
          image = 'image/vehicles/'+image_url+'green7.png';
         }
         else if (header >= 169 && header < 192)
         {
          image = 'image/vehicles/'+image_url+'green8.png';
         }
         else if (header >= 192 && header < 214)
         {
          image = 'image/vehicles/'+image_url+'green9.png';
         }
         else if (header >= 214 && header < 237)
         {
          image = 'image/vehicles/'+image_url+'green10.png';
         }
         else if (header >= 237 && header < 259)
         {
          image = 'image/vehicles/'+image_url+'green11.png';
         }
         else if (header >= 259 && header < 282)
         {
          image = 'image/vehicles/'+image_url+'green12.png';
         }
         else if (header >= 282 && header < 304)
         {
          image = 'image/vehicles/'+image_url+'green13.png';
         }
         else if (header >= 304 && header < 327)
         {
          image = 'image/vehicles/'+image_url+'green14.png';
         }
         else if (header >= 327 && header < 349)
         {
          image = 'image/vehicles/'+image_url+'green15.png';
         }
         else 
         {
          image = 'image/vehicles/'+image_url+'green.png';
         }
        }//end green condition
        else if(eventcode=='4002' || eventcode=='6012')
        {
          image ='image/vehicles/'+image_url+'red.png';
        } 
                  else if(sites[2] == '6071')
                   {
                    ingstatus = 'Motion Start';
                    image = 'image/vehicles/StorageContainer/containeryellowopen.png';
                   }
                    else if(sites[2] == '6074' )
                   {
                    ingstatus = 'Periodic Location';
                    image = 'image/vehicles/StorageContainer/containergreen.png';
                   }
                    else if(sites[2] == '6072' )
                   {
                    ingstatus = 'Motion Stopped';
                    image = 'image/vehicles/StorageContainer/containerredclose.png';
                   }
                    else if(sites[2] == '6079')
                   {
                    ingstatus = 'Door Open';
                    image = 'image/vehicles/StorageContainer/containerredopen.png';
                   }
                   else if(sites[2] == '6071_Z')
                   {
                    ingstatus = 'Motion Start with No GPS';
                    image = 'image/vehicles/StorageContainer/containeryellowopen.png';
                   }
                    else if(sites[2] == '6074_Z' )
                   {
                    ingstatus = 'Periodic Location';
                    image = 'image/vehicles/StorageContainer/containergreen.png';
                   }
                    else if(sites[2] == '6072_Z' )
                   {
                    ingstatus = 'Motion Stopped with No GPS';
                    image = 'image/vehicles/StorageContainer/containerredclose.png';
                   }
                    else if(sites[2] == '6079_Z')
                   {
                    ingstatus = 'Door Open with No GPS';
                    image = 'image/vehicles/StorageContainer/containeryellowopen.png';
                   }
					else{
					 if (header >= 349 || header < 12)
							 {
							  image = 'image/vehicles/'+image_url+'yellow.png';
							 }
							 else if (header >= 12 && header < 34)
							 {
							  image = 'image/vehicles/'+image_url+'yellow1.png';
							 }
							 else if (header >= 34 && header < 57)
							 {
							  image = 'image/vehicles/'+image_url+'yellow2.png';
							 }
							 else if (header >= 57 && header < 79)
							 {
							  image = 'image/vehicles/'+image_url+'yellow3.png';
							 }
							 else if (header >= 79 && header < 102)
							 {
							  image = 'image/vehicles/'+image_url+'yellow4.png';
							 }
							 else if (header >= 102 && header < 124)
							 {
							  image = 'image/vehicles/'+image_url+'yellow5.png';
							 }
							 else if (header >= 124 && header < 147)
							 {
							  image = 'image/vehicles/'+image_url+'yellow6.png';
							 }
							 else if (header >= 147 && header < 169)
							 {
							  image = 'image/vehicles/'+image_url+'yellow7.png';
							 }
							 else if (header >= 169 && header < 192)
							 {
							  image = 'image/vehicles/'+image_url+'yellow8.png';
							 }
							 else if (header >= 192 && header < 214)
							 {
							  image = 'image/vehicles/'+image_url+'yellow9.png';
							 }
							 else if (header >= 214 && header < 237)
							 {
							  image = 'image/vehicles/'+image_url+'yellow10.png';
							 }
							 else if (header >= 237 && header < 259)
							 {
							  image = 'image/vehicles/'+image_url+'yellow11.png';
							 }
							 else if (header >= 259 && header < 282)
							 {
							  image = 'image/vehicles/'+image_url+'yellow12.png';
							 }
							 else if (header >= 282 && header < 304)
							 {
							  image = 'image/vehicles/'+image_url+'yellow13.png';
							 }
							 else if (header >= 304 && header < 327)
							 {
							  image = 'image/vehicles/'+image_url+'yellow14.png';
							 }
							 else if (header >= 327 && header < 349)
							 {
							  image = 'image/vehicles/'+image_url+'yellow15.png';
							 }
							 else 
							 {
							  image = 'image/vehicles/'+image_url+'yellow.png';
							 }
					} 
			  }
			  else{
				   image ='image/vehicles/'+image_url+'grey.png';
				  } 
					var bgimg = new Image();
					bgimg.src = image;
					var heights = bgimg.height;
					var half = (heights/2 );
					if(half == 0)
					{
						half =30;
					}
					return half;
}


function get_phone(qwe)
{
		var dpoi = $('#driver_list option').filter(function() {  return this.value.toLowerCase() == qwe;  }).data('value');
		return dpoi;
}

function finddataval(qwe,poi_list)
{
	var dpoi = poi_list.filter(function() {  return this.value == qwe;  }).data('value');
	return dpoi;
}

 function filter_eqptype(filter,all_sites,index)
{
    var filteredarray = new Array();
    
    if(filter!=null && filter!='')
	{

		for(var i = 0; i < filter.length; i++)
		{
		  for(var j = 0; j < all_sites.length; j++)
		  {
			  var sites = all_sites[j];
			  if((sites[index].toString().toLowerCase()).replace(',','').trim() == (filter[i].toString().toLowerCase()).replace(',','').trim())
			  {
				filteredarray.push(sites);
			  }
			  if(index == 33 && $("#d_map").val().toString() != '' && $('#sel_type option:selected').val().toString() != 'Select Type')
			  {
				  if(					  
					   ($('#sel_type option:selected').val()=='Equipment' && (sites[1].toString().toLowerCase()).replace(',','').trim() == $("#d_map").val().toString())|| 
					   ($('#sel_type option:selected').val()=='Driver name' && (sites[24].toString().toLowerCase()).replace(',','').trim() == $("#d_map").val().toString())||
					   ($('#sel_type option:selected').val()=='Unit' && (sites[41].toString().toLowerCase()).replace(',','').trim() == $("#d_map").val().toString())||
					   ($('#sel_type option:selected').val()=='Crew' && (sites[42].toString().toLowerCase()).replace(',','').trim() == $("#d_map").val().toString())||
					   ($('#sel_type option:selected').val()=='Tag' && (sites[49].toString().toLowerCase()).replace(',','').trim() == $("#d_map").val().toString())
				   )
				  {
					 filteredarray.push(sites);
				  }
			  }
        }
      }  
    }
    else
	{
      filteredarray = '';
	}
    return filteredarray;
}
 function set_center_map(){
          var centerMap = new google.maps.LatLng(33.62600000, -84.38850000);
          var zoomval = 13;          
          var myMapType = google.maps.MapTypeId.ROADMAP;
          var myOptions =
          {
            zoom: zoomval,
            center: centerMap,
            mapTypeId: myMapType
          }
          map = new google.maps.Map(document.getElementById("map-canvas"), myOptions);
         // map_custum_controls();
		 // if(show_custom){
			  var homeControlDiv = document.createElement('div');
			  var homeControl = new HomeControl(homeControlDiv, map);
			  var zoomControlDiv = document.createElement('div');
			  var zoomControl = new ZoomControl(zoomControlDiv, map);
			  map.controls[google.maps.ControlPosition.LEFT_BOTTOM].push(homeControlDiv);
			  map.controls[google.maps.ControlPosition.TOP_RIGHT].push(zoomControlDiv);
		show_custom= 0;
		//  }
        }
/*
function set_center_map_history(){
          var myOptions =
          {
            zoom: 13,
            center: new google.maps.LatLng(33.62600000, -84.38850000),
            mapTypeId: google.maps.MapTypeId.ROADMAP
          }
         // map_custum_controls();
          map_his = new google.maps.Map(document.getElementById("map-history"), myOptions);
		  
//google.maps.event.addDomListener(window, "load", set_center_map_history);
        }*/
	function getmarkerstate(sites)
			{
				var ingstatus; 
						if(sites[2]=='8001')
						 {
								ingstatus = sites[32] + ' <strong>Status :</strong> PC in use ';
						 }
						else if(sites[2]=='4002' || sites[2]=='6012')
						 {
								ingstatus = sites[32] + ' <strong>Status :</strong> Parked ';
						 }
						 else  if(sites[2]=='4001' || sites[2]=='6011')
						 {
								ingstatus = sites[32];
								if(sites[7] == 0)
								{
									ingstatus = ingstatus + ' <strong>Status :</strong> Idle ';
								}
								else if (sites[7] > 0 && sites[7] < 80)
								{
									ingstatus = ingstatus + ' <strong>Status :</strong> Moving ';
								}
								else
								{
									ingstatus = ingstatus + ' <strong>Status :</strong> Speeding ';
								}
						 } 
						 else  if(sites[2]=='6006')
						 {
								ingstatus = 'Acceleration ' + ' <strong>Status :</strong> Running ';
						 }
						 else  if(sites[2]=='6007')
						 {
								ingstatus = 'Deceleration ' + ' <strong>Status :</strong> Running ';
						 }
						 else  if(sites[2]=='6001' || sites[2]=='6002')
						 {
								ingstatus = 'Speed Threshold ' + ' <strong>Status :</strong> Running ';
						 }
						 else  if(sites[2]=='6003')
						 {
								ingstatus = 'RPM Threshold ' + ' <strong>Status :</strong> Running ';
						 }
						 else  if(sites[2]=='6005')
						 {
								ingstatus = 'Mileage Threshold is Exceeded ' + ' <strong>Status :</strong> Running ';
						 }
						 else  if(sites[2]=='6015')
						 {
								ingstatus = 'Power Up/Reset and GPS lock ' + ' <strong>Status :</strong>  ';
						 }
						 else  if(sites[2]=='6008')
						 {
								ingstatus = 'Battery Low ' + ' <strong>Status :</strong> Running ';
						 }
						 else  if(sites[2]=='6016')
						 {
								ingstatus = 'Idle Time threshold ' + ' <strong>Status :</strong>  ';
						 }
						 else  if(sites[2]=='6019' || sites[2]=='6079')
						 {
								ingstatus = 'Door Open ' + ' <strong>Status :</strong>  ';
						 }
						 else  if(sites[2]=='6020')
						 {
								ingstatus = 'Door Closed ' + ' <strong>Status :</strong>  ';
						 }
						 else  if(sites[2]=='6026' || sites[2]=='6031')
						 {
								ingstatus = 'Movement ' + ' <strong>Status :</strong>  ';
						 }
						 else  if(sites[2]=='6071')
						 {
								ingstatus = 'Motion Start ' + ' <strong>Status :</strong>  ';
						 }
						 else  if(sites[2]=='6072')
						 {
								ingstatus = 'Motion Stopped ' + ' <strong>Status :</strong>  ';
						 }
						 else  if(sites[2]=='6074')
						 {
								ingstatus = 'Periodic Location ' + ' <strong>Status :</strong>  ';
						 }
						 else  if(sites[2]=='6075')
						 {
								ingstatus = 'Voltage Wake Up ' + ' <strong>Status :</strong>  ';
						 }
						 else 
						 {
								ingstatus = 'Inactive ' + ' <strong>Status :</strong> ';
						 }
						 return ingstatus;
			}

			function view_change(module){
			
			$.get( "check_session.php", function( data ) {
			  if(data.trim()=='out'){
				  alert('Session out. Volts redirecting you to login page..');
				window.location.href='index.php';
			  }
			});
			if(module=='Map'){
				$(".current_view").hide();
				$("#Map").show();
				$('.multiselect,#d_map').removeAttr("disabled");
				   initialize_both(LocationData,substationData);
				   imei_arr = [];
					$('.multiselect').removeAttr("disabled");
				    $("#d_map").val('');
					$("#clear_searchtext").hide();
			}
			else if(module=='History'){
				$(".current_view").hide();
				$('#History').show();
				$('.multiselect,#d_map').attr('disabled', 'disabled');
				if($("#History").html().trim()==''){
					$("#History").html("<center><img src='image/spinner.gif'> <strong>Please wait while getting History...</strong></center>");
					$("#History").load("History.php");
				}
			}
			else if(module=='Board'){
				$(".current_view").hide();
				$('#Board').show();
				$('.multiselect,#d_map').attr('disabled', 'disabled');
				if($("#Board").html().trim()==''){
					$("#Board").html("<center><img src='image/spinner.gif'> <strong>Please wait while getting Board...</strong></center>");
					$("#Board").load("Board.php");
				}
			}
			else if(module=='Repair Request'){
				$(".current_view").hide();
				$('#Repair_Request').show();
				$('.multiselect,#d_map').attr('disabled', 'disabled');
				if($("#Repair_Request").html().trim()==''){
					$("#Repair_Request").html("<center><img src='image/spinner.gif'> <strong>Please wait while getting Repair Request List...</strong></center>");
					$("#Repair_Request").load("Repair_Request.php");
				}
			}
			else if(module=='Equipment Security'){
				$(".current_view").hide();
				$('#Equipment_Security').show();
				$('.multiselect,#d_map').attr('disabled', 'disabled');
				if($("#Equipment_Security").html().trim()==''){
					$("#Equipment_Security").html("<center><img src='image/spinner.gif'> <strong>Please wait while getting Equipment Sequrity...</strong></center>");
					$("#Equipment_Security").load("Equipment_Security.php");
				}
			}
			else if(module=='Manage POI'){
				$(".current_view").hide();
				$('#Manage_POI').show();
				$('.multiselect,#d_map').attr('disabled', 'disabled');
				//if($("#Manage_POI").html().trim()==''){
					$("#Manage_POI").html("<center><img src='image/spinner.gif'> <strong>Please wait while getting Manage POI...</strong></center>");
					$("#Manage_POI").load("Manage_POI.php");
				//}
			}
			else if(module=='Equipment Scheduling'){
				$(".current_view").hide();
				$('#Schedule').show();
				$('.multiselect,#d_map').attr('disabled', 'disabled');
				if($("#Schedule").html().trim()==''){
					$("#Schedule").html("<center><img src='image/spinner.gif'> <strong>Please wait while getting Schedule...</strong></center>");
					$("#Schedule").load("Schedule.php");
				}
			}
			else if(module=='Reports'){
				$(".current_view").hide();
				$('#Reports').show();
				$('.multiselect,#d_map').attr('disabled', 'disabled');
				if($("#Reports").html().trim()==''){
					$("#Reports").html("<center><img src='image/spinner.gif'> <strong>Please wait while getting Reports...</strong></center>");
					$("#Reports").load("Reports.php");
				}
			}
			else if(module=='Admin'){
				$(".current_view").hide();
				$('#Admin').show();
				$('.multiselect,#d_map').attr('disabled', 'disabled');
				if($("#Admin").html().trim()==''){
					$("#Admin").html("<center><img src='image/spinner.gif'> <strong>Please wait while getting Admin...</strong></center>");
					$("#Admin").load("Admin.php");
					$("#tracker").load('tracker_list.php');
				}
			}
			else if(module=='Tracker Location'){
				$(".current_view").hide();
				$('#Tracker_Location').show();
				$('.multiselect,#d_map').attr('disabled', 'disabled');
				//if($("#Reports").html().trim()==''){
					$("#Tracker_Location").html("<center><img src='image/spinner.gif'> <strong>Please wait while getting Tracker Location...</strong></center>");
					$("#Tracker_Location").load("Tracker_Location.php");
					//$("#tracker").load('tracker_list.php');
				//}
			}
			else if(module=='Trip Sheet'){
				$(".current_view").hide();
				$('#Trip_Sheet').show();
				$('.multiselect,#d_map').attr('disabled', 'disabled');
				if($("#Trip_Sheet").html().trim()==''){
					$("#Trip_Sheet").html("<center><img src='image/spinner.gif'> <strong>Please wait while getting Trip Sheet List...</strong></center>");
					$("#Trip_Sheet").load("Trip_Sheet.php");
				}
			}
			else if(module=='Relocation'){
				$(".current_view").hide();
				$('#Relocation').show();
				$('.multiselect,#d_map').attr('disabled', 'disabled');
				if($("#Relocation").html().trim()==''){
					$("#Relocation").html("<center><img src='image/spinner.gif'> <strong>Please wait while getting Relocation List...</strong></center>");
					$("#Relocation").load("Relocation.php");
				}
			}
			else if(module=='Activity Search'){
				$(".current_view").hide();
				$('#Activity_Search').html('');
				$('#Activity_Search').show();
				$('.multiselect,#d_map').attr('disabled', 'disabled');
				if($("#Activity_Search").html().trim()==''){
					$("#Activity_Search").html("<center><img src='image/spinner.gif'> <strong>Please wait while getting Search List...</strong></center>");
					$("#Activity_Search").load("activity_search.php");
				}
			}
			 //FOR dISPATCH 
			else if(module=='Dispatch'){
			$(".current_view").hide();
			$('#Dispatch').html('');
			$('#Dispatch').show();
			$('.multiselect,#d_map').attr('disabled', 'disabled');
			if($("#Dispatch").html().trim()==''){
			  $("#Dispatch").html("<center><img src='image/spinner.gif'> <strong>Please wait while getting Search List...</strong></center>");
			  $("#Dispatch").load("dispatch.php");
			}
		  }

	}//view_change end

function edit_ts(tsn){
				$("#"+tsn).show();
				$("#ts_load_spinner").show(); 
		$.ajax({
            type: "POST",
            url: "edit_tripsheet.php",
            data: "time_sheet="+tsn,
            success: function(data) {
				$("#trip_sheet_div").html(data); 
				$("#trip_sheet_div").show();
				$("#ts_load_spinner").hide();
				$("#"+tsn).hide();
            }
        });
  }


  function initialize_single(LocationData,substationData)
	 {
		  isfitbounds = true ;
		  if(activeall_checked!='')
		  {
			    var event_arr = new Array();
			    event_arr[0]=0;
			    initialize(filter_eqptype($('#eqp').val(),filter_eqptype($('#dept').val(),filter_eqptype($('#primary').val(),filter_eqptype($('#group').val(),filter_eqptype(event_arr,filter_eqptype($('#opco').val(),LocationData,27),33),26),28),29),21));
		  }
		  else
		  {
				initialize(filter_eqptype($('#eqp').val(),filter_eqptype($('#dept').val(),filter_eqptype($('#primary').val(),filter_eqptype($('#group').val(),filter_eqptype($('#opco').val(),LocationData,27),26),28),29),21));
		  }

        if($('#poi').val()!=null  && substationData!=null)
		{
			 initialize_poi_both(filter_eqptype($('#poi').val(),substationData,4));
		}
		right_click_event();
		long_press_zoom();
      }


  //This is using to rotate pin in engine details after load the class 
  function rotate_pin()
  {
	  $('#temp_pin').toggleClass('temp-rotate');
	  $('#pres_pin').toggleClass('pres-rotate');
	  $('#speed_pin').toggleClass('speed-rotate');
	  $('#fuellvl_pin').toggleClass('fuellvl-rotate');
	  $('#torque_pin').toggleClass('torque-rotate');
	  $('#coollvl_pin').toggleClass('coollvl-rotate');
	  $('#e_load_pin').toggleClass('e_load-rotate');
  }

function view_engine(jbus_imei,jbus_name,jbus_event,jbus_type,jbus_dname,jbus_status,jbus_bat,jbus_speed,first_time,is_dash_open)
 {   //alert(is_dash_open);
	 jbus_imei_show=jbus_imei;
		$("#"+jbus_imei).show(); 
		$.ajax({
            type: "POST",
            url: "engine_details.php", //changed engine_test from engine_details for testing 
			data: "jbus_imei="+jbus_imei+"&eqpname="+jbus_name+"&type="+jbus_type+"&dname="+jbus_dname+"&status="+jbus_status+"&event="+jbus_event+"&bat="+jbus_bat+"&speed="+jbus_speed+"&first_time="+first_time+"&is_dash_open="+is_dash_open,
            success: function(data)
			{
				$("#trip_sheet_div").html(data); 
				if(first_time){
					$("#trip_sheet_div").show(1,rotate_pin);
				}else{
					rotate_pin();
					$("#trip_sheet_div").show();
				}
				$("#"+jbus_imei).hide();
            }
        });
  }
  
  function view_poi_image(id,camid,offset,date){
	  $("#poi_"+id).show();
		$.ajax({
            type: "POST",
            url: "view_camera.php",
            data: 'poi_id='+id+'&camid='+camid+'&offset='+offset+'&date_pic='+date,
            success: function(data) {
				$("#trip_sheet_div").html(data); 
				$("#trip_sheet_div").show();
				$("#poi_"+id).hide();
			}
        });
  }
  function get_image_list(id,camid,offset,date){
	  $("#poi_"+id).show();
		$.ajax({
            type: "POST",
            url: "get_camera_image_list.php",
            data: 'poi_id='+id+'&camid='+camid+'&offset='+offset+'&date_pic='+date,
            success: function(data) {
				//$("#main_cam_img").html(''); 
				$("#camera_his_div").html(data); 
				$("#camera_his_div").show(); 
				//$("#trip_sheet_div").show();
				$("#poi_"+id).hide();
			}
        });
  }
function update_image_camera(id,camid,offset,date){
	$.get( "send_cmd_camera.php", function( data ) {
		alert(data);
		var updateimg = setInterval(function(){
			$.ajax({
				type: "POST",
				url: "camera_table_update.php",
				data: 'poi_id='+id+'&camid='+camid+'&offset=0&max_date='+date,
				success: function(num_rows) {
					if(num_rows.trim().split(',')[0]>=2){
						$.ajax({
							type: "POST",
							url: "view_camera.php",
							data: 'poi_id='+id+'&camid='+camid+'&offset=0',
							success: function(data) {
								$("#trip_sheet_div").html(data);
								clearInterval(updateimg);
								}
						});				
					}else if(num_rows.trim().split(',')[0]>=1){
						$.ajax({
							type: "POST",
							url: "view_camera.php",
							data: 'poi_id='+id+'&camid='+camid+'&offset=0',
							success: function(data) {
								$("#trip_sheet_div").html(data);
									if(num_rows.trim().split(',')[1]==0){
										$("#status_msg").show();
									}else if(num_rows.trim().split(',')[1]==1){
										$("#pic_msg").show();
									}
								}
						});		
					}
				}//success part end
			});//ajax end
		},30000);
	});
}
			 function gethistory(imei,start_time,end_time,tsn,sheet_type,eqp_no){
				
				$('#dyn_back').show('slide', { direction: 'left' }, 1000);
			if(backarray[backarray.length-1] != 'History'){
						backarray.push('History');
					  }
				$(".current_view").hide();
				$('#History').show();
				$("#sel_view").val('History');
				if($("#History").html().trim()==''){
					$("#History").html("<center><img src='image/spinner.gif'><strong> Please wait while getting history...</strong></center>");
					$("#History").load("History.php");
				$("#dev_det").html('<strong><img src="image/spinner.gif" width="20px"> Please wait while getting history...</strong>');
				}


			if(imei == '')
			 {
			  alert('Please select valid Driver/Equip');
			 }
			 else
			 {
				var refreshIntervalId = setInterval(function(){ 
					if( $("#imeidl").val()!=eqp_no){
						 $("#dev_det").html('<strong><img src="image/spinner.gif" width="20px"> Please wait while getting history...</strong>');
						 $("#imeidl").val(eqp_no);
						 $("#hisdeviceimei").val(imei);
					}else{
						clearInterval(refreshIntervalId);
					}
				}, 300);
			  isstartend = true;
			  $.post( "vehicle_history_qry.php",{ imei:imei, start_time:start_time, end_time:end_time,tsn:tsn,sheet_type:sheet_type },function(data) {
				  if(start_time!=''){  $("#stime").val(new Date(start_time).toString("HH:mm")); $("#sdate").val(new Date(start_time).toString("yyyy-MM-dd")); }
				  if(end_time!=''){  $("#etime").val(new Date(end_time).toString("HH:mm")); $("#edate").val(new Date(end_time).toString("yyyy-MM-dd")); }
				$("#dev_det").html('<strong><img src="image/spinner.gif" width="20px">Please wait while getting history...</strong>');
				 $("#imeidl").val(eqp_no);
				 $("#hisdeviceimei").val(imei);
			  siteshistory = $.parseJSON(data);
			  //alert(siteshistory);
			  if(siteshistory=='')
			   { 
				$("#dev_det").html("<span style='color:red;' >No History Found.</span>");
			   }
			   else 
			   {
				$( "#bread:checkbox" ).prop( "checked", true );
				isbreadcrumps = true;
				 initializehis(siteshistory);
				 $('#pause_but').attr('src', "image/pause.png");
			   }
			 
			  });
			 }
		 }

		  function zoom_eqp_type(dev_type,index){
			  $("#dyn_back").show();
			if(backarray[backarray.length-1] != 'Map'){
						backarray.push('Map');
					  }
				$(".current_view").hide();
				$('#Map').show();
				$("#sel_view").val('Map');
				$('.multiselect,#d_map').removeAttr("disabled");
				activeall_checked = '';
			zoomondevice(dev_type,index);
		  }
function open_dialog(dialog,imei,if_yes_fun){
    var winW = window.innerWidth;
      var winH = window.innerHeight;
    var dialogoverlay = document.getElementById('dialogoverlay');
      var dialogbox = document.getElementById('dialogbox');
      dialogoverlay.style.display = "block";
      dialogoverlay.style.height = winH+"px";
      dialogbox.style.left = "31vw";
      dialogbox.style.top = "15vh";
      dialogbox.style.display = "block";
      /*dialogbox.style.text-align = "left";*/
    
    document.getElementById('dialogboxhead').innerHTML = "Please confirm";
      document.getElementById('dialogboxbody').innerHTML = dialog;
    document.getElementById('dialogboxfoot').innerHTML = '<button onclick="'+if_yes_fun+'(\''+imei+'\')">Yes</button> <button onclick="dialog_no()">No</button>';
   }
  function dialog_no(){
    document.getElementById('dialogbox').style.display = "none";
    document.getElementById('dialogoverlay').style.display = "none";
    return false;
  }