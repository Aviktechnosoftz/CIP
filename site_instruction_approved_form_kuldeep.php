<?php
session_start();
error_reporting(0);
// print_r($_REQUEST);
include_once('connect.php');
if(!isset($_SESSION['admin']))
{
	header("location:logout.php");
}
else

{
	$user= $_SESSION['admin'];
}
$project_name= $conn->query("select project_name,number from tbl_project where id='".$_SESSION['admin']."'")->fetch_object();
if(isset($_REQUEST['send_email']))
{
  $Sub = "New Site Instruction PDF Link is Here";
  $to=$_REQUEST['other_email'];
           

  $msg = "<html> 
        <body>
        Hello HSR / SM, <br/><br/>

      Site Instruction form  is ready to be downloded.<br/><br/>


      <a href ='https://cipropertyapp.com/pdf_php/test_ok.php?id=".$_REQUEST['id']."'><input type=\"button\" value=\"Download\"> </a><br/><br/>



      Thanks <br/>
      Team CIP <br/>
      Send from Mobile app <br/>   </body> 
      </html>";
        $subject= $Sub;
        $url = 'http://192.169.226.71/volts_dev/send_mail.php';
        $data = array('to' => $to, 'msg' => $msg, 'subject' => $subject);
        $options = array('http' => array(
          'method'  => 'POST',
          'content' => http_build_query($data)
              ));

              $context  = stream_context_create($options);
            @$result = file_get_contents($url, false, $context);
            $success= 1;
           



}
else
{
  @$main_query= $conn->query("select a.id,a.project_id,a.subject,a.clause,a.instructions,a.today_date,a.emp_id,a.image_1_text,a.image_2_text,a.image_3_text,a.image_4_text,a.distribution_id as distribution,a.employee_id,a.issued_by,a.req_date,a.attachments,b.company_name,b.phone_no as emp_phone,b.email_add as emp_email,c.given_name,c.surname,c.email_add from tbl_instruction a inner join tbl_employer b on a.emp_id = b.id inner join tbl_employee c on a.employee_id = c.id where a.project_id='".$_SESSION['admin']."' AND a.id='".$_REQUEST['approved_form']."'")->fetch_object();


@$project_name= $conn->query("select project_name,number from tbl_project where id='".$main_query->project_id."'")->fetch_object();
$issue_details= $conn->query("select id,given_name,surname,email_add from tbl_employee where id=".$main_query->issued_by."")->fetch_object();


$employee_name= $conn->query("select given_name,surname,email_add from tbl_employee where id IN (".$main_query->employee_id.")");
$distribution= $conn->query("select given_name,surname,email_add from tbl_employee where id IN (".$main_query->distribution.")");

//  print_r($main_query);
$img_arr=array();
$img_arr=explode(",",$main_query->attachments);
// print_r($img_arr);

  $textArray = array(
    "2.1.3" => "The Contractor is entitled to require the Subcontractor at the Subcontractor’s own cost from time to time to reschedule the performance of the whole or any part of the Subcontract Works including returning to the site on not less than 24 hours’ notice to recommence the Subcontract Works. The Subcontractor is entitled to an extension of time if completion of the Subcontract Works is delayed by any such requirement. The Subcontractor acknowledges that any such requirement by the Contractor is not a breach of the Subcontract and the Contractor is not liable for any damages, costs and expenses suffered or incurred by the Subcontractor in complying with the requirement.",
    "2.4.1" => "The Subcontractor must carry out the Subcontract Works in accordance with any directions given by the Contractor from time to time. If any direction by the Contractor is not given in writing, it must be confirmed in writing within 3 days of the direction.If the Contractor considers there is an emergency, it may give an oral direction, which must be acted on immediately by the Subcontractor and confirmed in writing by the Contractor within 24 hours.",
    "2.4.2" => "If the Subcontractor wishes to claim that a direction, although not stated to be a variation, involves a variation, it must lodge written notice with the Contractor to that effect within 3 days of receipt of the direction otherwise any subsequent claim that a variation is involved is barred absolutely.Without limiting this clause, the Contractor may concede in a particular instance or instances that a variation is involved without waiving the requirement for such written notice to be given in all other instances.",
    "2.7" => "Cleaning Up
    When on site, the Subcontractor must clean up and remove all rubbish from the site daily or, if so directed by the Contractor to designated areas on the site.  Upon completion of the Subcontract Works, the Subcontractor must leave the site in a clean and tidy condition.If the Subcontractor fails within 24 hours from the receipt of a written direction by the Contractor to clean up or remove rubbish, the Contractor may (without being obliged to do so) arrange for the cleaning up, or, removal of the rubbish at the Subcontractors expense and the cost of doing so is a debt due and owing to the Contractor.  The Contractor will advise the Subcontractor of any costs incurred under this clause.",
    "5.3" => "Work by Others If the Subcontract Works is dependent on or appreciably affected by the quality of any other work to be carried out or that has been carried out by the Contractor or any Separate Contractors (“other work”):",
    "5.3.1" => "if the other work is defective, the Subcontractor must immediately notify the Contractor in writing so that the Contractor may arrange for the defects to remedied; and",
    "5.3.2" => "if the Subcontractor accepts the other work by proceeding with the execution of the Subcontract Works and the other work is subsequently found to be defective, then upon rectification of the other work by the Contractor (or any Separate Contractor), if directed by the Contractor the Subcontractor will re-execute that part of the Subcontract Works at no additional cost.",
    "5.7.2" => " If the Contractor discovers materials or work which is not in accordance with the Subcontract, the Contractor may direct the Subcontractor to comply with the Subcontract and to:",
    "5.7.3.1" => "remove materials from the site;",
    "5.7.3.2" => "demolish work;",
    "5.7.3.3" => "reconstruct, replace, or correct the materials or work; or",
    "5.7.3.4" => " not deliver the materials or work to the site.",
    "5.7.4" => "The Subcontractor must comply with all such directions within the times specified by the Contractor and at no cost to the Contractor.",
    "5.8" => "Cost of Rectification or Compliance"
    );

  $clauses=explode(",",$main_query->clause);
  $texts=array();
  // print_r($clauses);
  foreach($clauses as $key=>$value)
  {
     // $texts = $clauses[$key];
     array_push($texts, $textArray[$value]);
  }

$c= array_combine($clauses, $texts);
  // print_r($c);

}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="https://www.w3.org/1999/xhtml">
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
 <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
<head>
<header>
<? include('header.php'); ?>
 <? include('test_side_new_3.php');?>
 <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <script src="js/bootstrap.min.js"></script>
  <!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->
<!--     <script src="js/jquery.min.js"></script> -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.js"></script> -->
    <!-- <script src="js/bootstrap.min.3.3.6.js"></script> -->
     <script type="text/javascript" src=js/validation_site_induction.js></script>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.3/jquery-ui.min.js"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.14/themes/base/jquery-ui.css">

<link rel="stylesheet" href="css/sidebar.css">
<link rel="stylesheet" href="css/sidebar.css">
</header>


<div class="main_form_header">
  <div class="col-md-12" style="padding-top: 14px">
    <div class="col-md-6 main_title_container">
        <legend class="main_title">CONTRACTS ADMINISTRATION MANAGEMENT SYSTEM</legend>
          <label class="col-md-12 control-label form-name">Site Instruction Form</label>

        <input type="hidden" name="id" value="<?= $instruction_no->id ?>">   
    </div>
    <div class="col-md-6 form_logo_container">
      <img src="image/logo.png" width="17%" style="image-rendering: -webkit-optimize-contrast;">
    </div>
  </div> 
</div>

<div class="Main_Form2">
  <div class="col-md-12">
    <div class="alert alert-success" role="alert" style="<? if($success!='1'){ echo 'display:none;';}?>">
      <strong>Well done!</strong> You have successfully Sent Site Instruction Form Download Link.&nbsp;
      <button onclick="back()"> Go Back</button>
      <script>
        function back()
        {
            window.location.href='site_instruction_approved.php';
        }
      </script>
    </div>

    <form class="well form-horizontal well_class" action="" method="post"  id="contact_form"  enctype="multipart/form-data">
      <fieldset>
      <div class="form-group">
                 <div class="col-md-12" style="padding-left: 0px;padding-bottom: 25px;">
                <label class="col-md-12 control-label" style="padding-left: 0px;"><span class="project_title" style="">PROJECT :&nbsp;<? echo $project_name->project_name ?> </span></label>
            </div>
        </div> 

      <div class="form-group">
           <div class="col-md-12 zeropadding">
           <div class="input-group">
               <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>              
               <input name="subject" id="date_show" placeholder="Site Instruction Number" class="form-control"  type="text" name="" value="<?= str_pad($_REQUEST['approved_form'], 4, "0", STR_PAD_LEFT); ?>" readonly>
           </div>
         </div>
       </div>

      <div class="form-group"> 
        <div class="col-md-12 zeropadding">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>            
              <input name="subject" id="date_show" placeholder="Subject Goes Here" class="form-control"  type="text" name="date_today" value="<?echo $main_query->subject ?>" readonly>        
            </div>
        </div>
      </div>

      <div class="form-group">
        <div class="col-md-12 zeropadding">
         <div class="input-group">              
            <div class="alert alert-info" style="text-align: justify;margin-bottom: 0px">
                  Site Instruction: This instruction is not a variation to the Subcontract. Should,however, the execution of the instruction result in additional costs which, in the opinion of the Trade Contractor would justify an application for a variation, then the Trade Contractor must submit sucha a claim within three (3) days of receipt of this instruction. Failure to do so will signify acceptance of this instruction without cost.
            </div>
          </div>
        </div>
      </div>


      <div class="form-group"> 
        <div class="col-md-6 rightpadding">
        <label class="col-md-12 control-label label-position">To</label>
        <div class="col-md-12 zeropadding">
          <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input  id="" placeholder="Page Goes Here" class="form-control"  type="text" value="<?= $main_query->company_name ?>" readonly>       
          </div>
        </div>
        </div>
        <div class="col-md-6 leftpadding">  
          <label class="col-md-12 control-label label-position">Date</label>
          <div class="col-md-12 zeropadding">
             <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                <input  id="" placeholder="Date Goes Here" class="form-control"  type="text" name="date_today" value="<?=$main_query->today_date ?>" readonly>
            </div>
          </div>
      </div>
    </div>

   <!--    <div class="form-group"> 
        <div class="col-md-6 rightpadding">
        <label class="col-md-12 control-label label-position">Page</label>
         <div class="col-md-12 zeropadding">
           <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span>
              <input  id="" placeholder="Page Goes Here" class="form-control"  type="text" value="01" readonly>
          </div>
        </div>
        </div>
        <div class="col-md-6 leftpadding">
        <label class="col-md-12 control-label label-position">Of</label>
        <div class="col-md-12 zeropadding">
           <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-tags"></i></span>
              <input id="" placeholder="Of Goes Here" class="form-control"  type="text"  value="01" readonly>
          </div>
        </div>
        </div>
      </div> -->


      <div class="form-group">
        <div class="col-md-6 rightpadding">  
        <label class="col-md-12 control-label">Phone No.</label>
        <div class="col-md-12 zeropadding">
             <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                <input  id="phone" placeholder="Phone Goes Here" class="form-control"  type="text" value="<?=$main_query->emp_phone  ?>" readonly>
            </div>
         </div>
        </div>
        <div class="col-md-6 leftpadding">
        <label class="col-md-12 control-label label-position">Email</label>
          <div class="col-md-12 zeropadding" >
           <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
              <input id="email" placeholder="Email Goes Here" class="form-control"  type="text"  value="<?=$main_query->emp_email ?>" readonly>
          </div>
        </div>
      </div>
      </div>

      <div class="form-group">
        <div class="col-md-12 zeropadding"> 
        <label class="col-md-12 control-label label-position">Attention</label>
          <div class="col-md-12 zeropadding">
           <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-exclamation-sign"></i></span>
              <?
  $seprator=",";
  $str_loop= "";
  while($rows=$employee_name->fetch_object()) {
  $str= $str.$rows->given_name." ".$rows->surname." ( ".$rows->email_add. ") ".$seprator;
  $str3= rtrim($str,',');
  }
?>   
              <input id="email" placeholder="Employee Name Here" class="form-control"  type="text"  value="<?=$str3;?>" readonly>
          </div>
        </div>
        </div>
      </div>

      <div class="form-group"> 
       <div class="col-md-12 zeropadding"> 
        <label class="col-md-12 control-label label-position">Instruction</label>
        <div class="col-md-12 zeropadding">
           <div class="alert alert-info">Instructions to be detailed with reference to attachments as necessary</div>
           
            <div class="input-group col-md-12">           
                <textarea class="form-control instruction_area" id="comment" style="-webkit-border-radius: 15px !important;-moz-border-radius: 15px !important;border-radius: 15px !important;border: none;font-size: 12px" rows="10" name="instruction"  readonly> <? echo $main_query->instructions ?>  </textarea>

            </div>
        </div>
      </div>
    </div>


    <div class="form-group"> 
       <div class="col-md-12 zeropadding"> 
     <!--    <label class="col-md-12 control-label label-position">Instruction</label> -->
        <div class="col-md-12 zeropadding">
           <!-- <div class="alert alert-info">Instructions to be detailed with reference to attachments as necessary</div> -->
           <!-- <div class="alert alert-info" id="clause_filled" style="display: none"></div> -->
           <!-- <input type="text" name="clause_filled_hide" id="clause_filled_hide" hidden> -->
          <div class="input-group col-md-12">
           
            <!-- <span class="input-group-addon" id="addon"></span> -->
             <div class="form-control instruction_area" rows="15" id="contract_condition" name="" style="-webkit-border-radius: 15px !important;-moz-border-radius: 15px !important;border-radius: 15px !important;font-size: 12px;height:auto;background-color: white !important  " readonly> <?foreach($c as $key=>$value)
          { echo "<b>$key</b>:"." ".$value."<br /><br />";
         
            }?> </div>


           
         
          </div>
        </div>
      </div>
      </div>

    <div class="form-group"> 
      <div class="col-md-12 zeropadding">
      <label class="col-md-12 control-label label-position">Requested Completion Date</label>  
          <div class="col-md-12 zeropadding">
           <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
              <input type="text" name="date" id="date" class="form-control" value="<?= $main_query->req_date ?>"  readonly   />
              <input type="hidden" name="req_date2" id="date2" class="form-control"  readonly placeholder="DD/MM/YYYY" />
          </div>
        </div>
      </div>
    </div>

    <div class="form-group"> 
      <div class="col-md-12 zeropadding">
        <label class="col-md-12 control-label label-position">Issued By</label>  
        <div class="col-md-12 zeropadding">
          <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input name="issue_by" id="" placeholder="Issued By Here" class="form-control"  type="text"  value="<?=$issue_details->given_name." ".$issue_details->surname ?>" readonly>
          </div>
        </div>
      </div>
    </div>
<!-- <input name="issue_by" id="" placeholder="Issued By Here" class="form-control"  type="text"  value="<?=$issue_details->given_name." ".$issue_details->surname ?>" readonly>

<input name="req_date" id="" placeholder="Date Goes Here" class="form-control"  type="text"  value="<?= $main_query->today_date ?>" readonly> -->


   <div class="form-group"> 
    <div class="col-md-12 zeropadding"> 
      <label class="col-md-12 control-label label-position">SI</label>
      <div class="col-md-12 zeropadding">
       <div class="input-group">
           <span class="input-group-addon"><i class="glyphicon glyphicon-exclamation-sign"></i></span>
           <?
              $seprator=",";
              $str_loop= "";
              while($rows2=$distribution->fetch_object()) {
              $str2= $str2.$rows2->given_name." ".$rows2->surname." (".$rows2->email_add. ") ".$seprator;
              
           }
            
              $str3= rtrim($str2,',');
            ?>
          <textarea  id="distribution" placeholder="Distribution List" class="form-control" style="resize: none;" readonly> <?=$str3?></textarea>      
        </div>
      </div>
    </div>
  </div>


 


  <div class="form-group">
    <div class="col-md-12 zeropadding"> 
      <div class="col-md-8">
                            <div class="col-sm-12" >
                          <? foreach ($img_arr as $key=>$value) { 

                              // $j=$key+1;
                              
                            ?>
                              
                              <div class="col-sm-3">
                              <img class="upload_1" onclick="preview('<?=$img_arr[$key] ?>')" height="70px" width="70px"  src= "<? if($img_arr[$key]!="") echo "API/Uploads/".$img_arr[$key] ?>"  onerror="javascript:this.src='Document.png'">

                              </div>
                              


                                <?  }?>
                                </div>


                                <div class="col-sm-12" >
                                
                                <?for($i=1;$i<=4;$i++){

                                    $image_text_col="image_".$i."_text";
                                    if($main_query->$image_text_col !="")
                                    {
                                  ?>

                                    <div class="col-sm-3">
                              <input name="desc<?=$i ?>" placeholder="Image Description" class="simple_field form-control"  id="desc<?=$i ?>"  type="text" value="<?=$main_query->$image_text_col ?> " readonly>
                              </div>
                              <?} }?>
                                     
                                    </div>  
                                      
                                      
      </div>   


      <script type="text/javascript">
                        
             function preview(url)
             {
                        var path="API/Uploads/"+url;
						$("#onerrorm1").attr("href" ,path);
                      $('.imagepreview').attr("src",path);
					  alert(path);
					  
						
				  $('#imagemodal').modal('show');  
               
             }                          

     </script>

  <div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">              
        <div class="modal-body">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
         	<a class="help-button  downloadupaddinvoice " id="onerrorm1"  href="" download >Downlode </a>

		  <img src="" class="imagepreview" style="width: 100%; height: 70vh"  onerror="javascript:this.src='Document.png'">
        </div>
      </div>
    </div>
  </div>


   </div>
   </div>

     <!--   <div class="form-group"> 
    <div class="col-md-12 zeropadding"> 
      <label class="col-md-12 control-label label-position"><b><u>Subcontract Condition</u></b></label>
      <div class="col-md-12 zeropadding" style="text-align: justify;">
       
          
          
        
      </div>
    </div>
  </div> -->

  <div class="form-group">
      <div class="col-md-12 zeropadding">
        <center>
          <div class="input-group col-md-5">
            
                  <a data-toggle="modal" data-email="<? echo $issue_details->email_add ?>" data-toggle="modal" title="Add this item" class="open-AddDialog btn btn btn-warning form_submit_button" href="#myModalNorm">Email Report</a>
                  <input type="hidden" name="" value="<? echo $issue_details->email_add?>" id="emp_email_hide">
            </div>
        </center>
      </div>  
  </div>


<!-- </div>


</div> -->




</fieldset>
<? include("footer_new.php"); ?>
</form>

</div>
<span id="hidden_option" style="display: none;"></span>
</div>
<!-- Modal -->
<div class="modal fade" id="myModalNorm" tabindex="-1" role="dialog" 
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" 
                   data-dismiss="modal">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    PDF Download Link will be sent you shortly..!!
                </h4>
            </div>
            
            <!-- Modal Body -->
            <div class="modal-body">                 
                <form  name="edit_itp" method="POST">
                    <input type="hidden" class="form-control" id="employer_email" name="employer_email" />               
                    <div class="form-group">
                      <label for="exampleInputEmail1">Enter Email</label>
                        <input type="text" class="form-control" id="other_email" name="other_email" placeholder="Enter  Email Id "/>
                        <input type="hidden" class="form-control" id="id3" name="id2" />
                    </div>
                    <input type="hidden" name="id" value="<?=$main_query->id ?>">
                    <div class="form-group">
                    
                    <p class="text-center">                  
                    <input style="width:200px !important;" type="submit" class="btn btn-primary form_submit_button" name="send_email" value="Send Report">
                    </p>
                    
                </form>                
            </div>
            
            <!-- Modal Footer -->
        </div>
      </div>
  </div>      

  <style> 


#attention
{
    border: 0;
    border-bottom: 1.5px solid black;
    outline: 0;
}


h4
{
    color: #95989a;
    font-size: 2.4vh;
    font-weight: 900;
}

/*#upload_1,#upload_2,#upload_3,#upload_4,#upload_5,#upload_6
{
    background-image: url('image/upload_image.png');
    background-size: 70px 70px;
    border-radius: 7vh;
    border:solid 1px grey;

}*/
.upload_1
{
   background-image: url('image/upload_image.png');
    background-size: 70px 70px;
    border-radius: 7vh;
    }
input[type='file'] {
        color: transparent; 
        display: none;  
}

.select2-container--default .select2-selection--multiple .select2-selection__rendered {
padding: 6px 12px;
}
#comment {

font-weight: 100;
 width: 100%;
 padding: 5px 0px;
/*margin-bottom: 20px;*/
resize: vertical;
font-size: 11px;
line-height: 24px;

-webkit-appearance: none;
border-top-right-radius: 5vh;
border-bottom-right-radius: 5vh;
background: url(img/notebook.png);

}

.select2-search__field::-webkit-input-placeholder {
color:#a7a7ae !important;
}
.select2-search__field:-moz-placeholder { /* Firefox 18- */
color:#a7a7ae !important;
}
 
.select2-search__field::-moz-placeholder { /* Firefox 19+ */
color:#a7a7ae !important;
}
 
.select2-search__field:-ms-input-placeholder {
color:#a7a7ae !important;
}
#desc1,#desc2,#desc3,#desc4,#desc5,#desc6
{
  margin-top: 10px;
}

</style>



<script>

$(".open-AddDialog").click(function(){
    var email = $('#emp_email_hide').val();
     var email2 = $('#email').val();
     var distribution_email= $('#distribution_email').val();
      var distribution= $('#distribution').val();
     // $(".modal-body #emp_email").val(email);
     // $(".modal-body #employer_email").val(email2);
     //  $(".modal-body #distribution_modal").val(distribution);
     //   $(".modal-body #hidden_email_distribution").val(distribution_email);
    
  });
 

</script>	
							
						        
					


	    					