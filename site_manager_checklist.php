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
/*  $q = $_REQUEST['site_manager_submitted_form'];
  echo $q;die();*/
  //echo "select * from tbl_sm_weekly_action where checklist_udid ='".$_POST['site_manager_submitted_form']."'";die();


     $get_udid=$conn->query("select * from tbl_filled_sm_weekly where date(created)='".$_REQUEST['site_manager_submitted_form']."'")->fetch_object();

     $get_action_required_content= $conn->query("select *,tbl_sm_weekly_main.id FROM tbl_sm_weekly_main left join tbl_sm_weekly_action on tbl_sm_weekly_main.id = tbl_sm_weekly_action.row_id and  (tbl_sm_weekly_action.checklist_udid = '".$get_udid->checklist_udid."'  OR tbl_sm_weekly_action.checklist_udid is null) WHERE  (tbl_sm_weekly_action.action = '2' or (tbl_sm_weekly_action.action = '1'  AND  (tbl_sm_weekly_action.actual_date  != '' AND tbl_sm_weekly_action.actual_date IS NOT NULL)))  order by  tbl_sm_weekly_main.task_number");

     $count_action=$conn->query("select count(*) as count,tbl_sm_weekly_main.id FROM tbl_sm_weekly_main left join tbl_sm_weekly_action on tbl_sm_weekly_main.id = tbl_sm_weekly_action.row_id and  (tbl_sm_weekly_action.checklist_udid = '".$get_udid->checklist_udid."'  OR tbl_sm_weekly_action.checklist_udid is null) WHERE  (tbl_sm_weekly_action.action = '2' or (tbl_sm_weekly_action.action = '1'  AND  (tbl_sm_weekly_action.actual_date  != '' AND tbl_sm_weekly_action.actual_date IS NOT NULL)))  order by  tbl_sm_weekly_main.task_number")->fetch_object();

  $get_row_id=$conn->query("select * from tbl_sm_weekly_action where checklist_udid ='".$get_udid->checklist_udid."'");
?>
<header>
  <? include('header.php'); ?>
  <? include('test_side_new.php');?>
  <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
  <script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!--<script src="js/jquery.min.js"></script>-->
  <script src="js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/sidebar.css">  
  <link rel="stylesheet" href="css/sidebar.css">
</header>

<div class="main_form_header_blue" style="padding-left: 0;padding-right: 0;padding-top: 5px;height: 25%">
  <div class="row">
    <div class="col-sm-12">
    <div class="col-sm-1" style="padding-top: 30px"><? include('modButton.php'); ?></div>    
    <div class="col-sm-11" style="padding-right: 50px;">
        <img src="image/logo.png" class="img-responsive pull-right" style="width: 70px;height: 70px; image-rendering: -webkit-optimize-contrast;">
    </div>
    <div class="col-sm-12 text-center" style="margin-top: -20px"><span style="color:#fff;font-size: 18px;
    font-weight: bolder;"><? 
    $yrdata= strtotime($_REQUEST['site_manager_submitted_form']);
    echo date('d F Y', $yrdata);?></span></div>
    </div>  
     
    <div class="col-md-12">
      <div class="tab">
        <div class="col-sm-5" style="margin-left: -20px"><button class="tablinks col-sm-12" onclick="openCity(event, 'London')" id="defaultOpen">
          <div class="col-sm-9 col-sm-offset-3 text-left">Checklist</div></button>
        </div>
      
      <div class="col-sm-4 col-sm-offset-3" style="padding-right: 0"><button class="tablinks pull-right col-sm-12" onclick="openCity(event, 'Paris')"<div class="text-right" style="padding-left: 55px;">Action Required<span class="badge" style="background: red;padding: 4px 0px;font-size: 14px;margin-top:-30px;margin-left: 5px;"><? if($count_action->count) {?><div style="height: 0px;"></div><? }?></span></button>
      </div>
    </div>
    </div>
    </div>
   
    <div class="col-sm-12 blue_table_head">
        <div class="col-sm-1"><span class="blue_table_label">No</span></div>
        <div class="col-sm-8"><span class="blue_table_label">TASK/ COMMENTS</span></div>
        <div class="col-sm-3 text-right"><span class="blue_table_label" style="padding-right: 15;">YES/NO/NA</span></div>
    </div>

</div>

<div class="Main_Form2_blue" style="top: 41vh;max-height: 59.6%;">
  <div class="col-md-12" style="padding-left: 0;">
    <form class="well form-horizontal well_class" action=" " method="post"  id="contact_form"  enctype="multipart/form-data" style="border: none;background: #393848;padding-left: 0 !important;padding-right: 0 !important" onsubmit="return terms_check()">
      <fieldset>
        <div class="form-group">
          <div class="col-sm-12" style="padding-right: 0px">
            <div id="London" class="tabcontent">
              <?
                while($row_get_row_id = $get_row_id->fetch_object())
                {
              ?>  
              <table id="mytable" class="table table-bordred" style="background-color: #333240; color: #fff;">
                <?
                  $checklist_action_comment = $row_get_row_id->checklist_action_comment;
                  if($checklist_action_comment == '')
                  {
                    $get_comment = $conn->query("select * from tbl_sm_weekly_main where id=".$row_get_row_id->row_id);
                    while($row_get_comment = $get_comment->fetch_object())
                    {
                ?>
                <tbody>
                  <tr class="content_tr">
                    <td style="text-align: left;vertical-align: middle;padding-left: 30px"  class="col-sm-1"><?=$row_get_comment->task_number?></td>    
                    <td class="col-sm-9" style="vertical-align: middle;padding-left: 30px"><?=$row_get_comment->task_desc?>
                      <div id="span2" class="t r"><br>
                        <?if($row_get_comment->comments != '' ){?>
                        <span class="glyphicon glyphicon-edit" ></span>&nbsp;
                        <? 


         if($row_get_row_id->action == "2")
         {
          echo $row_get_row_id->action_required;
         }


         else if(($row_get_row_id->action == "1" OR $row_get_row_id->action == "3") AND ($row_get_row_id->actual_date =="")) {
              if($row_get_row_id->checklist_action_comments!="")
              echo $row_get_row_id->checklist_action_comments; 
              if($row_get_row_id->checklist_action_comments=="")
              echo $row_get_comment->comments;
          }

              else if(($row_get_row_id->action == "1") AND ($row_get_row_id->actual_date !="" )) 
              {
              if($row_get_row_id->checklist_action_comments!="")
              echo $row_get_row_id->checklist_action_comments; 
              if($row_get_row_id->checklist_action_comments=="")
              echo $row_get_comment->comments; 

            ?> 
<br><br>
<div class="col-sm-6" style="padding-left: 0px"><b>Target Date:</b><?=$row_get_row_id->target_date ?></div><div class="col-sm-6"><b>Actual Date:</b><?=$row_get_row_id->actual_date ?></div>
        </div>

            <?
              }

         else echo $row_get_comment->comments; 

                        ?>
                      
        </div>
                  <?
                      }
                    }
                  ?>
                      </div>
                    </td>
                    <td class="col-sm-2 text-right" style="padding-right: 15px;vertical-align: middle;">
                      <?if($row_get_row_id->action == 1 AND $row_get_row_id->actual_date ==""){ ?>
                        <span class="glyphicon glyphicon-ok not-selected1" id="gif_ok"></span>
                      <?} 

                       else if($row_get_row_id->action== 1 AND $row_get_row_id->actual_date !=""){ ?>
                        
                        <span  class="glyphicon glyphicon-remove not-selected2" id="gif_ok"></span>
                        <span class="glyphicon glyphicon-ok not-selected1" id="gif_ok"></span>
                     
                       <? } else if($row_get_row_id->action == 2) {?>
                      <span  class="glyphicon glyphicon-remove not-selected2" id="gif_ok"></span>
                      <?}  else if($row_get_row_id->action== 3){ ?>
                        <span class="glyphicon glyphicon-plus not-selected3" id="gif_na" style="color: black"><span style="position: absolute;top:30%;right: 7%;-webkit-text-stroke: 0px;">N/A</span></span>
                      <? }?>

                     
                    

                    </td>
                  </tr>
                <?
                  }
                  else
                  {
                    $get_comment = $conn->query("select * from tbl_sm_weekly_main where id=".$row_get_row_id->row_id);
                    while($row_get_comment = $get_comment->fetch_object())
                    {
                ?>
                  <tr class="content_tr">
                    <td style="text-align: center;"></td>    
                    <td style="text-align: center;">
                      <div id="span2" class="t r" style="vertical-align: middle;"><br>
                        <?=$row_get_comment->task_desc?>
                        <span class="glyphicon glyphicon-pencil" ></span>&nbsp;<?=$row_get_comment->checklist_action_comments ?>
                    <?}?>
                    </div>
                  </td>
                </tr>
                  <?}?>
                </tbody>      
              </table>
              <?
                }
              ?>
            </div>
            <div id="Paris" class="tabcontent">
              <table id="mytable" class="table table-bordred " style="    background-color: #333240;
    color: #fff;">
<tbody>
  <? while($row_action_required_detail=$get_action_required_content->fetch_object()){ 

      $get_resp_email= $conn->query("select id,email_add from tbl_employee where  id='".$row_action_required_detail->emp_id."'")->fetch_object();
    ?>
    
    <tr class="content_tr" id="mod_btn_3" data-toggle="modal" data-target="#myModal2_action_<?=$row_action_required_detail->id?>"  data-temp="<?if($row_action_required_detail->checklist_action_comments != "") echo $row_action_required_detail->checklist_action_comments; else echo $row_action_required_detail->comments;?>" data-task="<?=$row_action_required_detail->task_desc ?>">
   
      <td style="vertical-align: middle;padding-left: 30px" class="co-sm-1"><?=$row_action_required_detail->task_number?></td> 
      <td style="vertical-align: middle;padding-left: 30px" class="col-sm-9"><?=$row_action_required_detail->task_desc?>
         <div id="span2" class="t r" style="vertical-align: middle;"><br><b>Action Required:</b><?

         if($row_action_required_detail->action_required != "")
         {
          echo $row_action_required_detail->action_required;
         }


         else if($row_action_required_detail->checklist_action_comments != "") echo $row_action_required_detail->checklist_action_comments; 
         else echo $row_action_required_detail->comments;?>


         <br><b>Action Complete:</b>
         <?=$row_action_required_detail->action_complete; ?><br><b>Resp:</b>
         <?=$get_resp_email->email_add; ?><br>
         <div class="col-sm-6" style="padding-left: 0px"><b>Target Date:</b><?=$row_action_required_detail->target_date ?></div><div class="col-sm-6"><b>Actual Date:</b><?=$row_action_required_detail->actual_date ?></div>
        </div>


      </td>    
    <td class="col-sm-2 text-right" style="padding-right: 30px"><span  class="glyphicon glyphicon-remove not-selected2" id="gif_ok"></span>&nbsp<span  class="glyphicon glyphicon-ok not-selected1" id="gif_ok"></span></td>
      <? } ?>
    </tr>
    </tbody>
    </table>

            </div>
          </div>
        </div>
        <!-- <div class="form-group">
          <label class="col-md-1 control-label"></label>
          <div class="col-md-5">
            <input type="submit" id="submit3" name="save" value="Submit" class="btn btn-warning form_submit_button" >
          </div>
          <div class="col-md-5">
            <input type="submit" id="submit_later" name="save_later" value="Save" class="btn btn-warning form_submit_button" >
          </div>
        </div> -->
      </fieldset>
    </form>
    <div id="margin_set"></div>   
    <? include("footer_new.php"); ?>
  </div>
</div>  

<style>
	h4 
  {
      text-align: left;
    margin:2vh;
    /*font-weight: bold;*/
    font-weight: 100 !important;
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
    padding: 6px 0px;
    /*border: 1px solid #ccc;*/
    border-top: none;
  }
  .table>tbody>tr>td
  {
    border-top: 20px solid #3B3B49 !important;
  }
  .table>tbody>tr
  {
    font-size: 1em;
  }
  
  /*.table-striped > tbody > tr:nth-child(2n+1) > td, .table-striped > tbody > tr:nth-child(2n+1) > th {
   background-color: #26262d;
   color: #fff;
  }*/

</style>

<script>
  function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";

    if(cityName == "Paris")
    {
        // $('#margin_set').css('height','40vh');
        // alert($(window).height());
        // alert($('fieldset').height());
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

<script>
  function update_action(act,task_id,main_comment,action_comment)
  {
    // alert(act);
    $.ajax({
      type: "POST",
      url: "ajax_update_action.php",
      data: { action: act,task_id: task_id,main_comment: main_comment, action_comment: action_comment },              
      success: function(data) {
        alert(data);
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
</script>
<style>
.blue_table_head {
  background: #313131;
}
  .not-selected1 
  {
    background-color:#489048;
    width: 30px;
    height: 30px;
    -webkit-text-stroke: 2px #489048;
    border-radius: 50%;
  }
  .not-selected2 
  {
    background-color:#f13232;
    width: 30px;
    height: 30px;
    -webkit-text-stroke: 2px #f13232;
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
    font-size: 16px;
    color: white;
    position: initial;
    /*top: 15%;
    right: 15%;*/
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
  .glyphicon_gif2
  {
    width: 30px;
    height: 30px;
    background-color: #AAAAAA;
    border-radius: 50%;
  }
  .glyphicon_gif3
  {
    width: 30px;
    height: 30px;
    background-color: #AAAAAA;
    border-radius: 50%;
  }
  .glyphicon_gif4
  {
    width: 30px;
    height: 30px;
    background-color: #AAAAAA;
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

    #sidebar
  {
        max-height: 77%;
    min-height: 86%;
  }
</style>