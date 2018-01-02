<?
error_reporting(0);
session_start();

include_once('connect.php');
if(!isset($_SESSION['admin']))
{
  header("location:logout.php");
}
else
{
  $user= $_SESSION['admin'];
}
?>

<?
$obj=$conn->query("select * from tbl_employer where id='".trim($_POST['edit_form'])."'")->fetch_object();
$get_states=$conn->query("Select * from tbl_state");


if(isset($_POST['edit']) & $_POST['edit']=='true')
    {
    if($_POST['edit_id']!='')
    {

      if(trim($_POST['new_empe_trade'])!='')
      {

        $val= trim($_POST['new_empe_trade']);



      }

      else{


        $val= trim($_POST['all_trade']);
      }


       $qry = $conn->query("update tbl_employer set 
                    company_name = '".trim(mysqli_real_escape_string($conn,$_POST['company']))."',
                    contact_person = '".trim(mysqli_real_escape_string($conn,$_POST['contact_person']))."',
                    phone_no = '".trim(mysqli_real_escape_string($conn,$_POST['phone']))."',
                    email_add = '".trim(mysqli_real_escape_string($conn,$_POST['email']))."',
                    address = '".trim($_POST['address'])."',
                    Tread = '".$val."',
                    state_id='".$_POST['state_name_hidden']."',
                    pin = '".trim($_POST['pin'])."',
                    modified_date= NOW()
                    where id = '".$_POST['edit_id']."'");
      
        
  if($qry)
  {
  
  $success=1;

}
     

       
      }
    }
?>
  <?//select box value selected----
 $trade= array("Principle",
"Concrete placement",
"Steel fixer",
"Mechanical",
"Block laying",
"Scaffold",
"Fire protection",
"Hydraulic services and Drainage",
"Roofing",
"Structural steel erection",
"Concrete panel installation",
"Electrical services",
"Carpet and Vinyl",
"Earthworks",
"Surveyors",
"Security",
"Piling",
"Joint cutting and sealing",
"Cleaner", 
"Window installation",
"Plasterboard",
"Floor sealing",
"Minor Earth works",
"Data",
"Floor and wall tiling",
"Landscaping",
"Roof safety",
"Formwork",
"Roller Doors",
"Painting",
"Dock Levellers",
"Pile caps",
"Mobile Crane Hire",
"Labour Hire",
"Fence and Armco",
"Metal work",
"Balustrades",
"Rapid Roller Doors",
"PIR Panel",
"Bulk Earthworks",
"Stormwater",
"Concrete Place",
"Lifts",
"Reo Supply",
"Vaults");
sort($trade);

$flag='false';
$clength = count($trade);
for($x = 0; $x < $clength; $x++) {
    $trade[$x];
    
}

if (in_array($obj->Tread, $trade)) {
   $flag='true';
}

  


  ?> <!-- select box value get ends.... -->
<header>
    <? include_once('header.php') ?>
    <? include('test_side_new.php');?>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/js/select2.min.js"></script>
      <style>
 body{
  background-color: white;
 }
 label {        
    font-style: italic;
    padding-left: 25px;
}
/* #country
  {
    width: 20vw;
  }*/
.select2-container--default .select2-selection--single {
    background-color: #fff;
    border: none;
    outline: none;
    border-radius: 10vh;
}

.select2-container--default .select2-search--dropdown .select2-search__field {
    border: 1px solid #aaa;
    outline: none;
}
.select2-container .select2-selection--single .select2-selection__rendered {
  padding-left: 25px;
}

h4
{
color: #95989a;
    font-size: 2.4vh;
    font-weight: 900;
}
.select2-container--default .select2-selection--single 
{
  height: 34px;
 padding: 4px 0px;

  background-color: rgb(228, 228, 228) !important;
}
</style>
</header>

<body onbeforeunload=”HandleBackFunctionality()”>

<div class="main_form_header">
  <div class="col-md-12" style="padding-top: 14px">
    <div class="col-md-6 main_title_container">
        <legend class="main_title">OCCUPATIONAL HEALTH & SAFETY MANAGEMENT SYSTEM</legend>
        <label class="control-label rightpadding"><span class="form-name">EDIT EMPLOYER&nbsp;<?// echo $project_name->project_name ?> </span></label>
        <input type="hidden" name="id" value="<?= $instruction_no->id ?>">   
    </div>
    <div class="col-md-6 form_logo_container">
      <img src="image/logo.png" width="17%" style="image-rendering: -webkit-optimize-contrast;">
    </div>
  </div> 
</div>

<div class="Main_Form_list">
  <div class="col-md-12">
    <center>
      <span style="color:green;" id='err'><?=$err?></span>
      <span style="color:green;" id="edit_gifimage"></span>
    </center>

    <form class="well form-horizontal well_class" method="post" id="edit_employer" enctype="multipart/form-data" >
    <div class="alert alert-success" role="alert" style="<? if($success!='1'){ echo 'display:none;';}?>">
          <strong>Well done!</strong> You successfully Edited Employer.&nbsp
          <input type="button" name="" value="Go Back" onclick="back()"> </button>
        </div>
     <fieldset>

        <div class="row">     
          <div class="form-group">
            <div class="col-sm-12">
              <input type="hidden" name="edit" value="true" />
              <input type="hidden" name="edit_id" value="<?=$obj->id?>" />
            </div>
          </div>
        </div>
            
        <div class="row">     
          <div class="form-group">
            <div class="col-sm-12">
              <label>Company Name</label>
              <input class="form-control form-control-left-radius" type="text" name="company" id="company" placeholder="Company Name" value="<?=$obj->company_name?>" />
            </div>
          </div>
        </div>

        <div class="row">     
          <div class="form-group">
            <div class="col-sm-12">
              <label>Contact Person</label>
              <input class="form-control form-control-left-radius" type="text" name="contact_person" id="contact_person" placeholder="Contact Person" value="<?=$obj->contact_person?>" />
            </div>
          </div>
        </div>

        <div class="row">     
          <div class="form-group">
            <div class="col-sm-12">
              <label>Employer Phone</label>
              <input class="form-control form-control-left-radius" type="text" name="phone" id="phone" placeholder="Employer Phone" value="<?=$obj->phone_no?>" />
            </div>
           </div>
        </div>

        <div class="row">     
          <div class="form-group">
            <div class="col-sm-12">
              <label>Email</label>
              <input class="form-control form-control-left-radius" type="text" name="email" id="email" placeholder="Email" value="<?=$obj->email_add?>" />
            </div>
          </div>
        </div>

        <div class="row">     
          <div class="form-group">
            <div class="col-sm-12">
              <label>Address</label>
              <textarea class="form-control form-control-left-radius" name="address" id="address" placeholder="Employer Address" /> <?=$obj->address?></textarea>
            </div>
          </div>
        </div>

        <div class="row">
        <div class="form-group">
          <div class="col-sm-12">
          <label>State</label>
          <input type="text" name="state_name_hidden" id="state_name_hidden"  hidden>
           <select style="height: 34px;display: block;width: 100%;    padding: 6px 12px;font-size: 14px;line-height: 1.42857143;color: #555;background-color: #eee;background-image: none;border: 1px solid #eee;border-radius: 20vh;" id="select" onchange ="select2()" name="select_employer" required>
             
              <? while($row_state=  $get_states->fetch_object()) {?>
              <option value="<? echo $row_state->id ?>" <?=$row_state->id == $obj->state_id ? ' selected="selected"' : '';?>><? echo $row_state->state_name ?> </option>
              <? } ?>
            <script>
            function select2() {
                  
                 var e = document.getElementById("select");
                 var strUser = e.options[e.selectedIndex].value;
                  // alert(strUser);
                  $('#state_name_hidden').val(strUser);
                
                }
               </script>
                            
              </select>
          </div>
        </div>
      </div>



        <div class="row">     
          <div class="form-group">
            <div class="col-sm-12">
              <label>Trade</label>
              <div class="col-sm-12 zeropadding">
                <div class="col-sm-11 zeropadding">
                  <input class="form-control form-control-left-radius" type="text" name="trade" id="default_trade" placeholder="" value="<?=$obj->Tread?>" disabled/>
                </div>
                <div class="col-sm-1">
                   <input class="form-control form-control-left-radius" type='button' value=''  id="edit_btn" style='float:right;margin-top:0vh;margin-left:.3vw;background-image:url("img/edit_2.png");background-repeat: no-repeat;background-position: center;border-radius:50%;border-color:transparent;height: 4vh;width: 4vw display: block;'>
                </div>
              </div>
            </div>
          </div>
        </div>      

        <div class="row" style="display: none" id="all_trade">
          <div class="form-group">
            <div class="col-sm-12">
              <label id="stored_trade_label" >All Trades</label>
              <div class="col-sm-12 zeropadding">
                <div class="col-sm-11 zeropadding" id="select_box" style="display: none; ">
                  <select class="form-control form-control-left-radius" id="country" name="all_trade" style="width:100%;">
                        <!-- Dropdown List Option -->
                  </select>
                </div>
                <div class="col-sm-1 zeropadding">
                  <input class="form-control form-control-left-radius" type='button' value=''  id="other_btn" style='float:right;margin-top:0vh;margin-left:.3vw;background-image:url("img/other_2.png");background-repeat: no-repeat;background-position: center;border-radius:50%;border-color:transparent;height: 4vh;width: 4vw; display: none;'>
                </div>
              </div>  
            </div>    
          </div>
        </div>

        <div class="row" id="other_trade_row" style="display: none">
          <div class="form-group">
            <div class="col-sm-12">
              <label id="new_trade_label" style="display: none;" id="other_trade_label">Other Trade:</label>
              <div class="col-sm-12 zeropadding">
                <div class="col-sm-11 zeropadding">
                  <input class="form-control form-control-left-radius" type="text" id="new_trade" name="new_empe_trade" placeholder="New Trade" style="display: none;" />
                </div>
                <div class="col-sm-1 zeropadding">
                  <input class="form-control form-control-left-radius" type='button' value=''  id="close_btn" style='float:right;margin-top:0vh;margin-left:.3vw;background-image:url("img/cross_2.png");background-repeat: no-repeat;background-position: center;border-radius:50%;border-color:transparent;height: 4vh;width: 4vw; display: none;'>
                </div>
              </div>
            </div>
          </div>
        </div>
              
        <div class="form-group">
          <div class="col-sm-12">
            <div class="col-sm-6">
              <div class="col-sm-6 col-sm-offset-3">
                  <input class="btn btn-primary form_submit_button" onClick="return validateForm()" type="button" value="Save"/>
                 </div>
            </div>
            <div class="col-sm-6">
              <div class="col-sm-6 col-sm-offset-3"> 
                <input type='button' value='Back' onclick='back()' class="btn btn-primary form_submit_button">
            </div>
            </div>
          </div>
        </div>
      </fieldset>
    </form>
     
  </div>  
</div>

<? include("footer.php"); ?> 

<script>
function validateForm() {

   if(document.getElementById("other_trade_row").style.display== "block")
   {
         // alert("block");
         if($( "#company" ).val() =='' || $( "#phone" ).val() =='' ||$( "#email" ).val() =='' ||$( "#contact_person" ).val() =='' ||$( "#address" ).val() =='' || $('#new_trade').val()==""){
          alert('Please fill all required details.');
          $( "#category_name" ).focus();
          return false;
        }
        else{
      $('#edit_employer').submit(); 
      //window.location.href='event.php';
    return true;
   }
   }
   else
   {
          // alert('hidden');   
         if($( "#company" ).val() =='' || $( "#phone" ).val() =='' ||$( "#email" ).val() =='' ||$( "#contact_person" ).val() =='' ||   $( "#address" ).val() ==''){
          alert('Please fill all required details.');
          $( "#category_name" ).focus();
          return false;
        }
        else{
      $('#edit_employer').submit(); 
      //window.location.href='event.php';
    return true;
   }
   }
}
function back(){
  window.location.href="employer.php";
}

$(document).ready(function() {
                      var country = ["Principle",
"Concrete placement",
"Steel fixer",
"Mechanical",
"Block laying",
"Scaffold",
"Fire protection",
"Hydraulic services and Drainage",
"Roofing",
"Structural steel erection",
"Concrete panel installation",
"Electrical services",
"Carpet and Vinyl",
"Earthworks",
"Surveyors",
"Security",
"Piling",
"Joint cutting and sealing",
"Cleaner", 
"Window installation",
"Plasterboard",
"Floor sealing",
"Minor Earth works",
"Data",
"Floor and wall tiling",
"Landscaping",
"Roof safety",
"Formwork",
"Roller Doors",
"Painting",
"Dock Levellers",
"Pile caps",
"Mobile Crane Hire",
"Labour Hire",
"Fence and Armco",
"Metal work",
"Balustrades",
"Rapid Roller Doors",
"PIR Panel",
"Bulk Earthworks",
"Stormwater",
"Concrete Place",
"Lifts",
"Reo Supply",
"Vaults"];
                      $("#country").select2({
                        data: country

                      });
                    });


if(<?echo $flag?>==true)

{
 


}


$(function(){

//  $("#add_butt").click(function(){
  
   
//     $('#new_trade_label').show();
//     $('#new_trade').show();
//      $('#new_trade').val('');
//     $('#new_trade').css('display','block');
//     $('#new_trade').focus();
//     $('#new_trade').prop('required',true);
//     $('#close_btn').show();
//     $('#country').prop( "disabled", true );
//     $('#select_box').hide();
//     $('#add_butt').hide();
//     $('#old_trade_label').hide();
    
  
//   });

// $("#close_btn").click(function(){
  
  
//       $('#new_trade_label').hide();
//       $('#new_trade').hide();
//       $('#new_trade').val('');
//       $('#close_btn').hide();
//       $('#country').prop( "disabled", false );
//       $('#new_trade').prop('required',false);
//       $('#country').focus();
//       $('#select_box').show();
//       $('#old_trade_label').show();
//       $('#add_butt').show();

//   });

$("#edit_btn").click(function(){
  
     
      $('#stored_trade_label').toggle();
      $('#select_box').toggle();
      $('#other_btn').toggle();
      $('#other_trade_row').hide();
      $('#all_trade').toggle();
       $('#new_trade_label').hide();
      $('#new_trade').hide();
      $('#close_btn').hide();


  });

$("#other_btn").click(function(){
  
     
      $('#new_trade_label').toggle();
      $('#new_trade').toggle();
      $('#close_btn').toggle();
      $('#stored_trade_label').toggle();
      $('#select_box').toggle();
      $('#other_btn').toggle();
      $('#other_trade_row').css('display','block');
      $('#all_trade').toggle();
      $('#new_trade').css('display','block');


  });
$("#close_btn").click(function(){
  
     
      $('#new_trade_label').hide();
          $('#other_trade_row').hide();
      $('#new_trade').hide();
      $('#close_btn').hide();


  });


}); 
</script>
