<?include('sidepanel.php') ?>


<div class="content">
            <div class="container-fluid" >
                <div class="row">
                    

                    <div class="col-md-12" style="padding:0px">
                        <div class="card">
                             <div class="header">
                            <div class="col-md-4">
                                <h4 class="title" style="color:#5B6672;">Home Page</h4>
                            </div>
                             <div class="col-md-4">
                                <h4 class="title">Safety Management Report</h4>
                            </div>
                            
                              <div class="col-md-4">
                                  <div class="col-md-1 pull-right" id="list_view" style="width:0px;opacity: 0.2" onclick="show_list()"><img src="images/thumbnail_dark2.png" height="16px" width="16px"></div>
                                   <div class="col-md-1 pull-right" id="thumb_view" style="width: 0px;opacity: 1" onclick="show_thumbnail()"><img src="images/thumbnail_dark.png" height="16px" width="16px"></div>
                              </div>
                              <div class="col-md-12">
                                <!-- <h4 class="title" style="color:#E6523A">SITE SAFETY MANAGEMENT PLAN</h4> -->
                                <!-- <p class="category">24 Hours performance</p> -->
                            <!-- </div> -->
                            </div>
                            </div> 
                            
                            <div class="content">
                            <div class="col-sm-9">
                               <div class="col-sm-12" style=""><i class="fa fa-circle" aria-hidden="true">  
                                </i><span style="padding-left: 4px;">Site Safety Managemnet Plan</span>
                                <div class="col-sm-12" style="    border-left: 1px solid black;padding-left: 15px;margin-left: 8px;">
                                    <div class="col-sm-12" style="    padding-top: 5px;">
                                        <div class="col-sm-1">
                                           <img src="images/attendance_0.png" style="margin: 40px 0px;" >  
                                        </div>
                                        <div class="col-sm-2" >
                                            <img src="images/attendance_2.png" height="90px" width="100x" >  
                                        </div>
                                        <div class="col-sm-2" >
                                             <img src="images/attendance_3.png" height="90px" width="100x" > 
                                        </div>
                                        <div class="col-sm-2" >
                                             <img src="images/attendance_1.png" height="90px" width="100x" > 
                                        </div>
                                        
                                    </div>
                                    <div class="col-sm-12" style="   padding-top: 5px;">
                                        <div class="col-sm-1">
                                           <img src="images/chat_head_1.png"  >  
                                        </div>
                                        <div class="col-sm-11">
                                           <span style="font-weight: 600;font-size: 12px;">Crystal, 9 min ago</span>
                                           <br>
                                           <span style="font-size: 11px">just uploaded the resized BG images @Pieter- Let me know if you need any updates from site</span>
                                           <br>
                                            <div class="col-sm-12" style="padding: 0;margin-top: 15px;margin-bottom: 4px;font-size: 12.5px">
                                                Get Design sign-off @Alex Vlad
                                            </div>
                                        </div>
                                        <div class="col-sm-1">
                                           <img src="images/chat_head_2.png"  >  
                                        </div>
                                        <div class="col-sm-11" >
                                           <span style="font-weight: 600;font-size: 12px;">Vlad, 2 days ago</span>
                                           <br>
                                           <span style="font-size: 11px">Just finish a review of the first set, comments are up on invision. let me know if you have any questions</span>
                                           <br>
                                            <div class="col-sm-12" style="padding: 0;margin-top: 15px;margin-bottom: 4px;font-size: 12.5px;color: grey">
                                                Show all 6 Feeds
                                            </div>
                                        </div>
                                        <div class="col-sm-1">
                                           <img src="images/chat_head_3.png"  >  
                                        </div>
                                        <div class="col-sm-11" >
                                           <input type="text" id="comment2"  name="" placeholder="Add comment" class="form-control" style="height: 20px;
                                            border: none;
                                            border-bottom: 1px solid #333;
                                            border-radius: 0px;padding: 0;background-color: #F5F5F5">
                                           
                                            
                                        </div>
                                        
                                        
                                    </div>
                                   
                                </div>
                                </div>
                               <div class="col-sm-12" style=""><i class="fa fa-circle-o" aria-hidden="true">  
                                </i><span style="padding-left: 4px;">Topic Here</span>
                                <div class="col-sm-12" style="    border-left: 1px solid black;padding-left: 15px;margin-left: 8px;height: 100px">
                                   
                                </div>
                                </div>
                                <div class="col-sm-12" style=""><i class="fa fa-circle-o" aria-hidden="true">  
                                </i><span style="padding-left: 4px;">Topic Here</span>
                                <br>
                                <br>   
                                </div>
                            
                        

                                
                            </div>
                            <div class="col-sm-3">
                                <h5 style="font-size: 3.5vh;margin-bottom: 0px; color: #585858;font-family: 'Helvetica_Nue_thin'">Technopark Phase 3</h5>
                                <p style="font-size: 1.5vh;color:#A3A7A9">Created 6 days ago</p>
                            </div>
                                <!-- <div id="chartHours" class="ct-chart" style="height: 600px"></div> -->
                                <div class="footer">
                                    
                                    <!-- <hr>
                                    <div class="stats">
                                        <i class="fa fa-history"></i> Updated 3 minutes ago
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>




            </div>
        </div>




    </div>
</div>


</body>
<script>
 function show_thumbnail()
 {
    $("#content_1").show();
    $("#content_2").show();
    $("#content_3").hide();
    $('#thumb_view').css("opacity", "1");
    $('#list_view').css("opacity", "0.2");
}
function show_list()
{
    $("#content_1").hide();
    $("#content_2").hide();
    $("#content_3").show();
    $('#list_view').css("opacity", "1");
    $('#thumb_view').css("opacity", "0.2");


}

$(document).ready(function(){
    $("#content_1").show();
    $("#content_2").show();
    $("#content_3").hide();


    });
</script>
<style>

#comment2::-webkit-input-placeholder {
  color: #302F2F;
}
#comment2::-moz-placeholder { /* Firefox 19+ */
  color: #302F2F;
}
#comment2::-ms-input-placeholder { /* IE 10+ */
  color: #302F2F;
}
#comment2::-moz-placeholder { /* Firefox 18- */
  color:#302F2F;
}
</style>
