<?
  session_start();
  error_reporting(0);
  include_once('connect.php');
  if(!isset($_SESSION['admin']))
  {
    header("location:logout.php");
  }
  else
  {
    $user= $_SESSION['admin'];
  }
  $get_main_detail=$conn->query("select * from tbl_sm_report_main where project_id='".$_SESSION['admin']."' order by task_number");
?>
<header>
  <? include('header.php'); ?>
  <? //include('test_side_new.php');?>
  <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
  <script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!--     <script src="js/jquery.min.js"></script> -->
  <script src="js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/sidebar.css">
  <link rel="stylesheet" href="css/sidebar.css">
</header>

<div class="header_checklist">
  <div style="height: 75%">
    <div class="col-md-12">
      <div class="col-sm-4"></div>
      <div class="col-sm-8"><span class="bottom_text" style="font-family: 'Avenirnext'; margin-left: 45px;">Date: &nbsp; <?=date("d M Y ") ?></span></div>
    </div>
    <div class="col-md-12">
      <div class="tab">
        <div class="col-sm-4"><button class="tablinks" onclick="openCity(event, 'leftTab')">Task Observed</button></div>
        <div class="col-sm-4"><button class="tablinks leff" onclick="openCity(event, 'London')" id="defaultOpen">Checklist</button></div>
        <div class="col-sm-4"><button class="tablinks pull-right" onclick="openCity(event, 'Paris')">Action Required<span class="badge" style="background: red;padding: 4px 7px;font-size: 14px"></span></button></div>
      </div>
    </div>
  </div>
  <div style="height: 25%;">
    <div class="col-sm-12 checklist_head">
      <div class="col-sm-2"><span class="blue_table_label">No</span></div>
      <div class="col-sm-8 text-center"><span class="blue_table_label">TASK/ COMMENTS</span></div>
      <div class="col-sm-2"><span class="blue_table_label">YES/NO/NA</span></div>
    </div>
  </div>
</div>

<div class="body_checklist">
  <div class="col-md-12">
    <form class="well form-horizontal well_class" action=" " method="post"  id="contact_form"  enctype="multipart/form-data" style="border: none;background: #201B1F">
      <fieldset>
        <div class="form-group">
          <div class="col-sm-12">
            <div id="leftTab" class="tabcontent">
              <center><button type="button" class="btn btn-default"  style="background-color:#f47821 ;margin-top:3rem;outline: none;border-radius:6vh;outline: none;border:none;color: #fff" data-toggle="modal" data-target="#modalTaskObserved">Create New Observation</button></center>
            </div>
            <!--Modal Box for Task Observed-->
              <div class="modal fade" id="modalTaskObserved" role="dialog">
                <div class="modal-dialog modal-sm">
                  <div class="modal-content" style="background: #393848 !important;">
                    <div class="modal-header" style="border-bottom: none;">
                      <button type="button" class="close" data-dismiss="modal" style="color: #C9D5D8">&times;</button>
                    </div>
                    <div class="modal-body">
                      <label class="label_blue">Task observed</label>
                      <textarea id="taskObserved" rows="4" style="height: 70px; width: 100% ; border:none; outline: none;resize: none;background-color:#fff !important;border-radius: 20vh;padding: 6px 12px;"></textarea>
                      <div class="" style="margin-top: 10px">
                        <label class="label_blue">Subcontractor Business Name</label>          
                        <select style="height: 34px;display: block;width: 100%;padding-left:20px;font-size: 14px;line-height: 1.42857143;color: #555;background-color: #eee;background-image: none;border: 1px solid #eee;border-radius: 20vh;" id=""  name="subContName">
                          <option selected disabled>select...</option>
                          <option value="All Type Welding">All Type Welding</option>
                          <option value="Commercial and Industrial Property">Commercial and Industrial Property</option>
                          <option value="Fusion HVAC">Fusion HVAC</option>
                          <option value="Gunnebo">Gunnebo</option> 
                          <option value="Max Door solutions">Max Door solutions</option>
                          <option value="Mesh and Bar">Mesh and Bar</option>
                          <option value="Modcol">Modcol</option>
                        </select>
                      </div>
                      <div class="" style="margin-top: 10px">
                        <label class="label_blue">Employees</label>
                        <input type="text" class="form-control form-control-left-radius" name="" id="employees" style="height: 50px;" > 
                      </div>
                      <div class="" style="margin-top: 10px">
                        <label class="label_blue">Action</label>
                        <div style="height: 35px;width: 100%;background: #fff;border-radius: 20px;">
                          <center>
                            <span class="glyphicon glyphicon-ok glyphicon_gif" id="gif_ok" style="margin-right: 10px" onclick="showhide(0)"></span>
                            <span class="glyphicon glyphicon-remove glyphicon_gif" id="gif_remove" style="margin-right: 10px" onclick="showhide(1)"></span>
                            <span class="glyphicon glyphicon-plus glyphicon_gif"  id="gif_na" style="color: black">
                              <span style="position: absolute;top:30%;right: 7%;-webkit-text-stroke: 0px white;color: white" onclick="showhide(2)">N/A</span>
                            </span>
                          </center>
                        </div>
                      </div>
                      <div id="Tgreen" style="display: none;">
                        <div style="margin-top: 10px">
                          <label class="label_blue">Comments</label>
                          <textarea id="Comments" rows="4" style="height: 70px; width: 100% ; border:none; outline: none;resize: none;background-color:#fff !important;border-radius: 20vh;padding: 6px 12px;"></textarea>
                        </div>
                      </div>
                      <div id="Tred" style="display: none;">
                         <div style="margin-top: 10px">
                          <label class="label_blue">Action Required</label>
                          <textarea id="actionRequired" rows="4" style="height: 70px; width: 100% ; border:none; outline: none;resize: none;background-color:#fff !important;border-radius: 20vh;padding: 6px 12px;"></textarea>
                        </div>
                         <div style="margin-top: 10px">
                          <label class="label_blue">Resp Person</label>
                          <input type="text" id="respPerson" style="height:35px;width: 100% ; border:none; outline: none;resize: none;background-color:#fff !important;border-radius: 20vh;padding: 6px 12px;"></textarea>
                        </div>
                        <div style="margin-top: 10px">
                          <label class="label_blue">Target Date</label>
                          <input type="text" class="form-control form-control-left-radius datepicker" name="" id="targetDate">
                        </div>
                      </div>
                      <script>
                          $('.datepicker').datepicker({
                            minDate: new Date(),
                            dateFormat: "yy-mm-dd",
                            duration: "fast",
                            showAnim: "slide",
                            onSelect: function(dateText, inst) { 
                             $('.datepicker').val(dateText);
                            },
                            showOptions: {direction: "down"} 
                          });
                      </script>
                    </div>
                    <div class="modal-footer" style="border-top: none;">
                      <button type="button" class="btn btn-default"  style="background-color:#f47821 ;margin-top:3rem;outline: none;border-radius:6vh;outline: none;border:none;color: #fff" onclick="saveData()">Save</button>
                      <button type="button" class="btn btn-default" data-dismiss="modal" style="background-color:#f47821 ;margin-top:3rem;outline: none;border-radius:6vh;outline: none;border:none;float: left;color: #fff">Cancel</button>
                    </div>
                  </div>  
                </div>
              </div>
            <!--End of modal box-->
            <div id="London" class="tabcontent">
              <?   while($row_main_detail=$get_main_detail->fetch_object()){  ?>
              <table id="mytable" class="table table-bordred blue_table_label" style="background-color: #3C3C3E;color: #fff;margin-top: -6px;">   
                <tbody>
                  <tr class="content_tr" id="content_<?=$row_main_detail->id ?>" onclick="flip_action(<?=$row_main_detail->id ?>)">
                    <td style="text-align: center;"><?=$row_main_detail->task_number ?></td>    
                    <td style="text-align: center;"><?=$row_main_detail->task_desc ?></td>
                  </tr>
                  <tr class="action_tr" style="display: none" >
                    <div class="action_tr_2" id= "action_<?=$row_main_detail->id?>" style="display: none;">
                      <div class="col-sm-4"></div>
                      <div class="col-sm-8" style="height: 20%;padding: 10px">         
                        <div style="text-align:center" class="votes">
                          <div class="col-sm-1">
                            <span class="glyphicon glyphicon-ok glyphicon_gif" id="gif_ok" onclick="update_tick()"></span>
                          </div>
                          <div class="col-sm-1">
                            <span id="mod_btn_2" class="glyphicon glyphicon-remove glyphicon_gif" id="gif_remove" ></span>
                          </div>
                          <div class="col-sm-1">
                              <span class="glyphicon glyphicon-plus glyphicon_gif"  id="gif_na" style="color: black" >
                                <span style="position: absolute;top:30%;right: 7%;-webkit-text-stroke: 0px white;color: white
                                ">N/A</span>
                            </span>
                          </div>
                          <div class="col-sm-8" >
                            <div class="glyphicon_gif_flip">
                              <span class="glyphicon glyphicon-refresh" title="Flip" style="color: #fff" onclick="flip_content(<?=$row_main_detail->id ?>)"></span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </tr>
                </tbody>
              </table>
              <? } ?>
            </div>
            <div id="Paris" class="tabcontent">
              <? $q=0; while($q<6){?>
              <table id="mytable" class="table table-bordred " style="background-color: #3C3C3E;color: #fff;">
                <tr>
                  <td> </td>
                  <td> hahahhahahahahahahahh</td>
                </tr>                
              </table>
              <? $q++;  }?>
              <div class="col-md-12">
                <center>
                  <legend style="color: #fff;font-size: 1.2em;border: none;font-weight: bold">DETAILS OF PERSON COMPLETING THIS FORM</legend>
                </center>
                <div class="col-sm-12">
                  <center>
                    <label class="label_blue">Name</label>
                  </center>
                  <input type="text" class="form-control form-control-left-radius backhIn" value="" name="" placeholder="Contact Person..." readonly>
                </div>
                <div class="col-sm-12">
                  <center>
                    <label class="label_blue">Position</label>
                  </center>
                  <input type="text" class="form-control form-control-left-radius backhIn" value="" name="" placeholder="Contact Person..." readonly>
                </div>
              </div>
            </div>
          </div>
        </div>
      </fieldset>
    </form>
    <div id="margin_set"></div>    
    <? include("footer_new.php"); ?>
  </div>
</div> 

<script>
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
      $('#gif_na').css('background-color','#D9763');
      $('#gif_ok').css('background-color','#AAAAAA;');
      $('#gif_remove').css('background-color','#AAAAAA;');
      $('#Tgreen, #Tred').hide();
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
</script>


<script type="text/javascript">
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

  function update_tick()
  {
    alert('ok');
  }
</script>

<script>
  $('.bottom_text').css('color','#7d7d7f');
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
</script>

<style>
.glyphicon_gif_flip
  {
    float: right;
    padding: 7px;
    width: 30px;
    height: 30px;
    background-color: #AAAAAA;
    -webkit-text-stroke: 1px #efeeee;
    border-radius: 50%;
  }
  /* css for header and body*/
  .header_checklist 
  {
    float: left;
    position: absolute;
    top: 16vh;
    left: 27.5%;
    width: 72.5%;
    background-color: #f5f5f5;
    height: 21.5%;
    padding-top: 30px;
    padding-bottom: 0px;
    padding-left: 15px;
    padding-right: 20px;
    background: #201B1F;
  }
  .body_checklist 
  {
    float: left;
    position: absolute;
    top: 37.5vh;
    left: 27.5%;
    width: 72.5%;
    overflow-y: scroll;
    max-height: 63%;
    background: #201B1F;
  }
  .checklist_head
  {
    background: #2F2F31;
    /*margin: 15px 0 0 0;*/
    padding: 5px 0 5px 0;
  }
  .backhIn
  {
    background-color: #424043 !important;
    color :#fff !important;
  }
  h4 
  {
    text-align: left;
    margin:2vh;
    font-weight: bold;
  }

  table caption 
  {
    padding: .5em 0;
  }

  @media screen and (max-width: 767px) 
  {
    table caption 
    {
      border-bottom: 1px solid #ddd;
    }
  }

  .p 
  {
    text-align: center;
    padding-top: 140px;
    font-size: 14px;
  }
  th 
  {
    font-weight: 100;
    font-style: italic;
  }

  .form-control 
  {
    border-radius: 20vh;
    border:none;
    box-shadow: none;
    -webkit-box-shadow: none;
    -moz-box-shadow: none;
    -moz-transition: none;
    -webkit-transition: none;
    /*outline: none;
    border: none;
    box-shadow: none;
    -webkit-box-shadow: none;*/
  }
  .form-control:focus
  {
    border:none;
    box-shadow: none;
    -webkit-box-shadow: none;
    -moz-box-shadow: none;
    -moz-transition: none;
    -webkit-transition: none;
  }
  input.form-control,input.form-control:focus 
  {
    border:none;
    box-shadow: none;
    -webkit-box-shadow: none;
    -moz-box-shadow: none;
    -moz-transition: none;
    -webkit-transition: none;
  }
  select:focus
  {
    border:none;
    box-shadow: none;
    -webkit-box-shadow: none;
    -moz-box-shadow: none;
    -moz-transition: none;
    -webkit-transition: none;
    outline: none;
  } 
  input[type="date"]:focus
  {
    outline: none;
  }
  input[type="date"]
  {
    border:none;
    box-shadow: none;
    text-align: center;
  }
  .btn-primary
  {
    width: 8vw;
    background-color:#f47821;color: white;border:none;border-radius:10vh;outline: none;
    border:none;
    outline: none;
  }
  h4
  {
    color: #95989a;
    font-size: 2.4vh;
    font-weight: 900;
  }
  #search_btn
  {
    -webkit-border-radius: 60;
    -moz-border-radius: 60;
    border-radius: 60px;
    font-family: Arial;
    color: white;
    font-size: 12px;
    width: 12vw;
    height: 4vh;
    /*  margin-left: 1vw;*/
    background: transparent;
    /*padding: 10px 20px 10px 20px;*/
    border: solid #686868 1px;
    text-decoration: none;
    outline: none;
    font-family: 'Helvetica_Nue_thin';
  }

  ::-webkit-scrollbar 
  {
    width: 7px;
    background: #393848;
  }

  ::-webkit-scrollbar-track 
  {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
    border-radius: 10px;
    border-top-left-radius: 0;
    border-bottom-left-radius: 0;
  }
 
  ::-webkit-scrollbar-thumb 
  {
    border-radius: 10px;
    border-radius: 10px;
    border-top-left-radius: 0;
    border-bottom-left-radius: 0;
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.5); 
    background: #F6F6F6;
  }

  #attention_btn:hover, #approved_btn:hover, #today_btn:hover
  {
    /*background: #212121;*/
    cursor: pointer;
  }
  #effects:hover
  {
    background: #181717;
    cursor: pointer;
  }
  
  div.tab 
  {
    overflow: hidden;
    color: #fff;
    /*border: 1px solid #ccc;
    background-color: #f1f1f1;*/
  }

  /* Style the buttons inside the tab */
  div.tab button 
  {
    background-color: inherit;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    transition: 0.3s;
    font-size: 17px;
  }

  /* Change background color of buttons on hover */
  div.tab button:hover 
  {
    color: #3AAE72;
  }
  /* Create an active/current tablink class */
  div.tab button.active 
  {
    /*background-color: #ccc;*/
    border-bottom: 2px solid #FF7B2A;
  }
  /* Style the tab content */
  .tabcontent 
  {
    display: none;
    padding: 6px 12px;
    /*border: 1px solid #ccc;*/
    border-top: none;
  }

  .table>tbody>tr>td
  {
    border-top: 20px  !important;
  }
  .table>tbody>tr
  {
    font-size: 1em;
  }
  .not-selected1 
  {
    background-color:green;
    width: 30px;
    height: 30px;
    -webkit-text-stroke: 2px green;
    border-radius: 50%;
  }
  .not-selected2 
  {
    background-color:red;
    width: 30px;
    height: 30px;
    -webkit-text-stroke: 2px red;
    border-radius: 50%;
  }
  .not-selected3 
  {
    background-color:#D97631;
    width: 30px;
    height: 30px;
    border-radius: 50%;
  }
  .not-selected4 
  {
    background-color:#6DB4B4;
    width: 30px;
    height: 30px;
    -webkit-text-stroke: 1px #6DB4B4;
    border-radius: 50%;
  }
  .glyphicon-ok:before 
  {
    font-size: 20px;
    color: white;
    position: absolute;
    top: 12%;
    right: 20%;
  }
  .glyphicon-remove:before 
  {
    font-size: 20px;
    color: white;
    position: absolute;
    top: 15%;
    right: 15%;
  }
  .glyphicon-edit:before 
  {
    font-size: 20px;
    color: white;
    position: absolute;
    top: 15%;
    right: 15%;
  }
  .glyphicon-plus:before 
  {
    font-size: 20px;
    color: white;
    position: absolute;
    top: 15%;
    right: 15%;
  }

  .glyphicon_gif
  {
    width: 30px;
    height: 30px;
    background-color: #AAAAAA;
    -webkit-text-stroke: 1px #AAAAAA;
    border-radius: 50%;
  }
  .glyphicon-plus:before 
  {
    content: none;
  }
  .glyphicon
  {
    cursor: pointer;
  }
</style>


