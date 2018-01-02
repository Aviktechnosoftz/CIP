<?php
// session_start();
// print_r($_SESSION);
// error_reporting(0);
 // print_r($_REQUEST['approved_form']);
 // die();
include_once('connect.php');



define('_MPDF_PATH','../');
include("../mpdf.php");
// include_once('../connect.php');
$get_admin= $conn->query("select project_id from tbl_instruction where id='".$_REQUEST['approved_form']."'")->fetch_object();

 @$main_query= $conn->query("select a.id,a.project_id,a.subject,a.clause,a.instructions,a.today_date,a.emp_id,a.image_1_text,a.image_2_text,a.image_3_text,a.image_4_text,a.distribution_id as distribution,a.employee_id,a.issued_by,a.req_date,a.attachments,b.company_name,b.phone_no as emp_phone,b.email_add as emp_email,c.given_name,c.surname,c.email_add from tbl_instruction a inner join tbl_employer b on a.emp_id = b.id inner join tbl_employee c on a.employee_id = c.id where a.project_id='".$get_admin->project_id."' AND a.id='".$_REQUEST['approved_form']."'")->fetch_object();

// $main_query= $conn->query("select * from tbl_instruction where id='152'")->fetch_object();

$project_name= $conn->query("select project_name,number from tbl_project where id='".$get_admin->project_id."'")->fetch_object();
$employee_name= $conn->query("select given_name,surname,email_add from tbl_employee where id IN (".$main_query->employee_id." )");
$issue_details= $conn->query("select id,given_name,surname,email_add from tbl_employee where id=".$main_query->issued_by."")->fetch_object();
$distribution= $conn->query("select given_name,surname,email_add from tbl_employee where id IN (".$main_query->distribution.")");
 $seprator=",";
              $str_loop= "";
              while($rows2=$distribution->fetch_object()) {
              $str2= $str2.$rows2->given_name." ".$rows2->surname." (".$rows2->email_add. ") ".$seprator;
              
           }
            
              $str4= rtrim($str2,',');

$seprator=",";
  $str_loop= "";
  while($rows=$employee_name->fetch_object()) {
  $str= $str.$rows->given_name." ".$rows->surname." ( ".$rows->email_add. ") ".$seprator;
  $str3= rtrim($str,',');
  }


$img_arr=array();
$img_arr=explode(",",$main_query->attachments);
$expl_img_arr0 = explode(".",$img_arr[0]);
$expl_img_arr1 = explode(".",$img_arr[1]);
$expl_img_arr2 = explode(".",$img_arr[2]);
$expl_img_arr3 = explode(".",$img_arr[3]);

 $expl_img_arr0_p = end($expl_img_arr0);
 $expl_img_arr1_p = end($expl_img_arr1);
 $expl_img_arr2_p = end($expl_img_arr2);
 $expl_img_arr3_p = end($expl_img_arr3);
 
  // echo  $expl_img_arr0_p ;
  // echo  $expl_img_arr1_p ;
  // echo  $expl_img_arr2_p ;
  // echo  $expl_img_arr3_p ;
  // die() ;
  $width_image_k_0 = "";
  
    $width_image_k_1 = "";
  
    $width_image_k_2 = "";
  
    $width_image_k_3 = "";
  if ($expl_img_arr0_p == 'png' OR $expl_img_arr0_p == 'jpg' OR $expl_img_arr0_p == 'gif' OR $expl_img_arr0_p == 'jpeg' OR $expl_img_arr0_p == 'PNG' )
  {
	  	  $img_arr_0 = "https://cipropertyapp.com/API/Uploads/".$img_arr[0];
					$width_image_k_0 = "display:block";
					

  }
  else {
	  $img_arr_0 = "Document.png";
	  $width_image_k_0 = "display:none";

  }
  if ($expl_img_arr1_p == 'png' OR $expl_img_arr1_p == 'jpg' OR $expl_img_arr1_p == 'gif' OR $expl_img_arr1_p == 'jpeg'OR $expl_img_arr1_p == 'PNG')
  {
       $img_arr_1 = "https://cipropertyapp.com/API/Uploads/".$img_arr[1];
	    $width_image_k_1 = "display:block"; 
  }
  else {
	  $img_arr_1 = "Document.png";
		$width_image_k_1 = "display:none";
  }
   if ($expl_img_arr2_p == 'png' OR $expl_img_arr2_p == 'jpg' OR $expl_img_arr2_p == 'gif' OR $expl_img_arr2_p == 'jpeg' OR $expl_img_arr2_p == 'PNG')
  {
		$img_arr_2 = "https://cipropertyapp.com/API/Uploads/".$img_arr[2];
		$width_image_k_2 = "display:block";
  }
  else {
	  $img_arr_2 = "Document.png";
$width_image_k_2 = "display:none";
  }
   if ($expl_img_arr3_p == 'png' OR $expl_img_arr3_p == 'jpg' OR $expl_img_arr3_p == 'gif' OR $expl_img_arr3_p == 'jpeg' OR $expl_img_arr3_p == 'PNG')
  {
	$img_arr_3 = "https://cipropertyapp.com/API/Uploads/".$img_arr[3];
	$width_image_k_3 = "display:block";
  }
  else {
	  $img_arr_3 = "Document.png";
$width_image_k_3 = "display:none";
  }
if($expl_img_arr0_p == "" ) { $img_arr_0 = ""; $width_image_k_0 = "display:none"; }
if($expl_img_arr1_p == "" ) { $img_arr_1 = ""; $width_image_k_1 = "display:none";}
if($expl_img_arr2_p == "" ) { $img_arr_2 = ""; $width_image_k_2 = "display:none";}
if($expl_img_arr3_p == "" ) { $img_arr_3 = ""; $width_image_k_3 = "display:none";}
// echo $width_image_k_0;
// echo $width_image_k_1;
// echo $width_image_k_2;
// echo $width_image_k_3;
// die();


          for($i=1;$i<=4;$i++){
				$image_text_col ="";
                $image_text_col="image_".$i."_text";
                if($main_query->$image_text_col !="")
                {
             

                
                  $col_w_img .= $main_query->$image_text_col.','; 
          
          } }
                 $col_w_img = rtrim($col_w_img, ',');
				 $col_w_img_1 = array();
				 $col_w_img_1=explode(",",$col_w_img);
				 // echo $col_w_img_1[0]; 
				 $col_w_img_1_0 = explode(" ",$col_w_img_1[0]);
				 $col_w_img_1_1 = explode(" ",$col_w_img_1[1]);
				 $col_w_img_1_2 = explode(" ",$col_w_img_1[2]);
				 $col_w_img_1_3 = explode(" ",$col_w_img_1[3]);
				 // if()
				 if (sizeof($col_w_img_1_0)> 2) { $word_count_dot_0 = "...";} else { $word_count_dot_0 ="";}
				 if (sizeof($col_w_img_1_1)> 2) { $word_count_dot_1 = "...";} else { $word_count_dot_1 ="";}
				 if (sizeof($col_w_img_1_2)> 2) { $word_count_dot_2 = "...";} else { $word_count_dot_2 ="";}
				 if (sizeof($col_w_img_1_3)> 2) { $word_count_dot_3 = "...";} else { $word_count_dot_3 ="";}
			 
				 // die();
				 
									 
$textArray = array(
   "2.1.3" => "<b class='font_size_key' >2.1.&nbsp; &nbsp;Access and Scheduling <br/>2.1.3.</b>&nbsp; &nbsp; The Contractor is entitled to require the Subcontractor at the Subcontractor’s own cost from time to time to reschedule the performance of the whole or any part of the Subcontract Works including returning to the site on not less than 24 hours’ notice to recommence the Subcontract Works. The Subcontractor is entitled to an extension of time if completion of the Subcontract Works is delayed by any such requirement. The Subcontractor acknowledges that any such requirement by the Contractor is not a breach of the Subcontract and the Contractor is not liable for any damages, costs and expenses suffered or incurred by the Subcontractor in complying with the requirement.<hr/>", "2.4.1" => "<b class='font_size_key' >2.4. &nbsp; Directions<br/>2.4.1&nbsp;</b> The Subcontractor must carry out the Subcontract Works in accordance with any directions given by the Contractor from time to time. If any direction by the Contractor is not given in writing, it must be confirmed in writing within 3 days of the direction.If the Contractor considers there is an emergency, it may give an oral direction, which must be acted on immediately by the Subcontractor and confirmed in writing by the Contractor within 24 hours.<hr/>", "2.4.2" => "<b class='font_size_key'>2.4.2&nbsp;</b> If the Subcontractor wishes to claim that a direction, although not stated to be a variation, involves a variation, it must lodge written notice with the Contractor to that effect within 3 days of receipt of the direction otherwise any subsequent claim that a variation is involved is barred absolutely.Without limiting this clause, the Contractor may concede in a particular instance or instances that a variation is involved without waiving the requirement for such written notice to be given in all other instances.<hr/>", "2.7" => "<b class='font_size_key' >2.7 &nbsp;Cleaning Up</b><br/> When on site, the Subcontractor must clean up and remove all rubbish from the site daily or, if so directed by the Contractor to designated areas on the site. Upon completion of the Subcontract Works, the Subcontractor must leave the site in a clean and tidy condition.If the Subcontractor fails within 24 hours from the receipt of a written direction by the Contractor to clean up or remove rubbish, the Contractor may (without being obliged to do so) arrange for the cleaning up, or, removal of the rubbish at the Subcontractors expense and the cost of doing so is a debt due and owing to the Contractor. The Contractor will advise the Subcontractor of any costs incurred under this clause.<hr/>", "5.3" => "<b class='font_size_key'>5.3 &nbsp; Work by Others</b><br/> If the Subcontract Works is dependent on or appreciably affected by the quality of any other work to be carried out or that has been carried out by the Contractor or any Separate Contractors (“other work”):<hr/>", "5.3.1" => "<b class='font_size_key' >5.3.1 &nbsp;</b> if the other work is defective, the Subcontractor must immediately notify the Contractor in writing so that the Contractor may arrange for the defects to remedied; and <hr/>", "5.3.2" => "<b class='font_size_key' >5.3.2 &nbsp;</b> if the Subcontractor accepts the other work by proceeding with the execution of the Subcontract Works and the other work is subsequently found to be defective, then upon rectification of the other work by the Contractor (or any Separate Contractor), if directed by the Contractor the Subcontractor will re-execute that part of the Subcontract Works at no additional cost.<hr/>", "5.7.2" => "<b class='font_size_key'>5.7. &nbsp; Testing<br/>5.7.2&nbsp;</b> If the Contractor discovers materials or work which is not in accordance with the Subcontract, the Contractor may direct the Subcontractor to comply with the Subcontract and to:<hr/>", "5.7.3.1" => "<b class='font_size_key'>5.7.3.1 &nbsp;</b> remove materials from the site;<hr/>", "5.7.3.2" => "<b class='font_size_key'>5.7.3.2 &nbsp;</b> demolish work;<hr/>", "5.7.3.3" => "<b class='font_size_key'class='font_size_key'>5.7.3.3 &nbsp;</b> reconstruct, replace, or correct the materials or work; or<hr/>", "5.7.3.4" => "<b class='font_size_key'>5.7.3.4 &nbsp;</b> not deliver the materials or work to the site.<hr/>", "5.7.4" => " <b class='font_size_key'>5.7.4 &nbsp;</b> The Subcontractor must comply with all such directions within the times specified by the Contractor and at no cost to the Contractor.<hr/>", "5.8" => "<b class='font_size_key'>5.8 &nbsp;Cost of Rectification or Compliance</b><br/>If the Subcontractor fails to comply with any direction from the Contractor given under the Subcontract and, in particular any direction under clauses 2.4, 2.7, 5.3, 5.5, 5.7 and 14.2 then, without giving further notice, the Contractor may arrange for compliance itself by performing the relevant work or by engaging others to do so and the cost of such performance will be a debt due and owing to the Contractor by the Subcontractor. "
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
  // die();

foreach($c as $key=>$value)
          { $clauses_print .=  $value;
         
            }
// echo $clauses_print;
// die();
$color_des3 = "";
if($col_w_img_1[3] == "")
	{ $color_des3 = ""; } 
else {  $color_des3 = "#E4E4E4";}
$color_des2 = "";
if($col_w_img_1[2] == "")
	{ $color_des2 = ""; } 
else {  $color_des2 = "#E4E4E4";} 

$color_des1 = "";
if($col_w_img_1[1] == "")
	{ $color_des1 = ""; } 
else {  $color_des1 = "#E4E4E4";} 

$color_des0 = "";
if($col_w_img_1[0] == "")
	{ $color_des0 = ""; } 
else {  $color_des0 = "#E4E4E4";} 

$date_footer = date("d M Y ");
    $new_date = date('dS M Y', strtotime($date_footer));
    // echo $new_date;
// echo $date_footer;
// die();
  $footer='

 <div class="form-group"  >

            <div class="col-md-12 zeropadding">
            <div class="input-group" style="">
				<div style="background-color:#3D3D3D;height:70px;margin-top:-100px;margin-left:-72px;margin-right:-72;margin-bottom:-48.5px !important; ">
				<img src="logo_foot_2.png" alt="Smiley face" style="width:100px;height:60;position:relative;padding-top:5px;padding-left:30px"  >
<div class="bottom_text footer_date" style="font-family: Avenirnext;color:#7d7d7f;margin-left:540px;margin-top:-90px">Date:  '.$new_date.'
<img src="footer_new.png" alt="Smiley face" style="width:100px;height:80px"  ></div>
				
				</div>
            </div>
          </div>
        </div>';

$html = '
<head>
 
  <link rel="stylesheet" href="css/bootstrap.min.css">
    
 <style>
 #wwwww0 ,   {    background-image: url('.$img_arr_0.'); }
 #wwwww1 ,     {    background-image: url('.$img_arr_1.'); }
 #wwwww2 ,    {    background-image: url('.$img_arr_2.'); }
 #wwwww3 ,   {    background-image: url('.$img_arr_3.'); }
 #des_hid0 {    background-color: '.$color_des0.'}
 #des_hid1 {    background-color: '.$color_des1.' }
 #des_hid2 {    background-color: '.$color_des2.' }
 #des_hid3 {    background-color: '.$color_des3.' }
 .wwwww  {-webkit-background-size: cover;
			-moz-background-size: cover;
			  -o-background-size: cover;
				 background-size: cover;
			   background-repeat: no-repeat;
				 background-size: 100% 100%;
						   width:70px;
						  height:70px;
				   border-radius:50px;
  }
  
 .kkkkk {-webkit-background-size: cover;
			-moz-background-size: cover;
			  -o-background-size: cover;
				 background-size: cover;
			   background-repeat: no-repeat;
				 background-size: 100% 100%;
						   
				   
  }


.font_size_key { font-size: 17px;font-weight:900}
 </style>
</head>

<body style="">
<div class="main_form_header" style="">
  
  
  
  

  
<div class="Main_Form2">
  <div class="col-md-12">
    <form class="well form-horizontal well_class" action=" " method="post"  id="contact_form"  enctype="multipart/form-data" style="border: none" onsubmit="return terms_check()">
      <fieldset>

		<div class="form-group" style="background-color:#3D3D3D;color:white;margin-top:-80px;margin-bottom:40px;height:40px;margin-left:-92px;margin-right:-90px">
            <div class="col-md-12 zeropadding">
            <div class="input-group">
				 <div >
				<span style="float: left"></span> 
<div style="margin-top:10px;z-index:1">
<div style="margin-bottom:-38px;"><img src="header_new4.png" style="position: absolute;width: 220px;margin-left:-14px;"> </div>
</div style="margin-bottom:-10px;position: absolute;color: #EEEEEE;font-size: 1vh;">Project No. :3010-05</div>

            </div>
            </div>
          </div>
        </div>
        </div>
		
		
	<div class="form-group">
            <div class="col-md-12 zeropadding">
            <div class="input-group">
				 <div ><span style="color:red;margin-bottom:0px;margin-left:-5px;padding-left:0px">CONTRACTS ADMINISTRATION MANAGEMENT SYSTEM.</span><br />
			<span style="padding-top:50px">Site Instruction Form</span>
	  <img src="logo.png" alt="Smiley face" style="width:100px;height:100px;padding-left:500px;padding-bottom:0px;padding-top:-60px;z-index:999;"  ></div>
            </div>
          </div>
        </div>
	
	
        <div class="form-group">
               <div class="col-md-12" style="margin-left:3px;padding-bottom: 25px;">
                <label class="col-md-12 control-label" style="padding-left: 0px;"><span class="project_title" style=""><b style="font-weight:900">PROJECT</b> :&nbsp; <b style="font-weight:900">'.$project_name->project_name.'</b></span></label>
            </div>
        </div>        
        

         <div class="form-group">
            <div class="col-md-12 zeropadding">
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>              
				<div style="background-color:#E4E4E4;border:0px solid black;border-radius:20vh;height:30px;padding-left:15px;padding-top:3px">
				<span style="background-color:EEEEEE"><img src="llogo.jpg" style="width:18px;height:23px;padding-right:10px"></span>'.str_pad($_REQUEST['approved_form'], 4, "0", STR_PAD_LEFT).'
				</div>
            </div>
          </div>
        </div>

       <div class="form-group">
            <div class="col-md-12 zeropadding">
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>              
				<div style="background-color:#E4E4E4;border:0px solid black;border-radius:20vh;height:30px;padding-left:10px;padding-top:3px">
				<img src="llogo.jpg" style="width:18px;height:23px;padding-right:10px">'.$main_query->subject.'
				</div>
            </div>
          </div>
        </div>

        <div class="form-group"> 
          <div class="col-md-12 zeropadding">
           <div class="input-group">                
              <div class="alert alert-info" style="text-align: justify;margin-bottom: 0px">
                  Site Instruction:  This instruction is not a variation to the Subcontract. Should,however, the execution of the instruction result in additional costs which, in the opinion of the Trade Contractor would justify an application for a variation, then the Trade Contractor must submit sucha a claim within three (3) days of receipt of this instruction. Failure to do so will signify acceptance of this instruction without cost.
            </div>
          </div>          
          </div>
        </div>
		<div class="form-group" style="padding-bottom:-10px">
            <div class="col-md-12 zeropadding">
            <div class="input-group" >
			
                            
				<div style="border:0px solid black;border-radius:20vh;height:30px;padding-left:10px;padding-top:3px;width:45%;">
				To</div>
			<div style="border:0px solid black;border-radius:20vh;height:30px;padding-left:10px;padding-top:3px;width:45%;float:right;margin-top:-32px">Date</div>
            </div>
          </div>
        </div>
		<div class="form-group" >
            <div class="col-md-12 zeropadding" >
            <div class="input-group" >
			
				<div style="background-color:#E4E4E4;border:0px solid black;border-radius:20vh;height:30px;padding-left:10px;padding-top:3px;width:45%">
				<img src="user.png" style="width:18px;height:23px;padding-right:10px">'.$main_query->company_name.'</div>
			<div style="background-color:#E4E4E4;border:0px solid black;border-radius:20vh;height:30px;padding-left:10px;padding-top:3px;width:45%;float:right;margin-top:-32px"><img src="caln.png" style="width:18px;height:23px;padding-right:10px">'.$main_query->today_date.'</div>
            </div>
          </div>
        </div>
		<div class="form-group" style="padding-bottom:-10px">
            <div class="col-md-12 zeropadding">
            <div class="input-group" >
			
                            
				<div style="border:0px solid black;border-radius:20vh;height:30px;padding-left:10px;padding-top:3px;width:45%;">
				Phone No.</div>
			<div style="border:0px solid black;border-radius:20vh;height:30px;padding-left:10px;padding-top:3px;width:45%;float:right;margin-top:-32px">Email</div>
            </div>
          </div>
        </div>
		<div class="form-group" >
            <div class="col-md-12 zeropadding" >
            <div class="input-group" >
			
				<div style="background-color:#E4E4E4;border:0px solid black;border-radius:20vh;height:30px;padding-left:10px;padding-top:3px;width:45%">
				<img src="phone.png" style="width:18px;height:23px;padding-right:10px">'.$main_query->emp_phone.'</div>
			<div style="background-color:#E4E4E4;border:0px solid black;border-radius:20vh;height:30px;padding-left:10px;padding-top:3px;width:45%;float:right;margin-top:-32px"><img src="email.png" style="width:18px;height:23px;padding-right:10px">'.$main_query->emp_email.'</div>
            </div>
          </div>
        </div>


        <div class="form-group">
            <div class="col-md-12 zeropadding">
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>              
				<div style="border:0px solid black;border-radius:20vh;height:30px;padding-left:10px;padding-top:3px">
				Attention
				</div>
            </div>
          </div>
        </div>
 <div class="form-group">
            <div class="col-md-12 zeropadding">
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>              
				<div style="background-color:#E4E4E4;border:0px solid black;border-radius:20vh;height:30px;padding-left:10px;padding-top:3px">
				<img src="xxl.png" style="width:18px;height:23px;padding-right:10px">'.$str3.'
				</div>
            </div>
          </div>
        </div>

     
 <div class="form-group">
            <div class="col-md-12 zeropadding">
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>              
				<div style="border:0px solid black;border-radius:20vh;height:30px;padding-left:10px;padding-top:3px">
				Instruction
				</div>
            </div>
          </div>
        </div>
		 <div class="form-group">
            <div class="col-md-12 zeropadding">
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>              
								           <div class="alert alert-info">Instructions to be detailed with reference to attachments as necessary</div>

				</div>
            </div>
          </div>
        </div>
    

      
	  <div class="form-group">
            <div class="col-md-12 zeropadding">
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>              
				<div style="background-color:#E4E4E4;border:0px solid black;border-radius:20vh;height:30px;padding-left:12px;padding-top:3px;padding-right:12px">
				'.$main_query->instructions.'
				</div>
            </div>
          </div>
        </div>


     <div class="form-group">
            <div class="col-md-12 zeropadding">
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>              
				<div style="background-color:#E4E4E4;border:0px solid black;border-radius:20vh;height:30px;padding-left:10px;padding-top:3px;padding-right:7px">
				'.$clauses_print.'
				</div>
            </div>
          </div>
        </div>
		   
		   <div class="form-group">
            <div class="col-md-12 zeropadding">
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>              
				<div style="border:0px solid black;border-radius:20vh;height:30px;padding-left:10px;padding-top:3px">
				Requested Completion Date
				</div>
            </div>
          </div>
        </div>
 <div class="form-group">
            <div class="col-md-12 zeropadding">
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>              
				<div style="background-color:#E4E4E4;border:0px solid black;border-radius:20vh;height:30px;padding-left:10px;padding-top:3px">
				<img src="caln.png" style="width:18px;height:23px;padding-right:10px">'.$main_query->req_date.'
				</div>
            </div>
          </div>
        </div>

   
<div class="form-group">
            <div class="col-md-12 zeropadding">
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>              
				<div style="border:0px solid black;border-radius:20vh;height:30px;padding-left:10px;padding-top:3px">
				Issued By
				</div>
            </div>
          </div>
        </div>
 <div class="form-group">
            <div class="col-md-12 zeropadding">
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>              
				<div style="background-color:#E4E4E4;border:0px solid black;border-radius:20vh;height:30px;padding-left:10px;padding-top:3px">
				<img src="user.png" style="width:18px;height:23px;padding-right:10px">'.$issue_details->given_name." ".$issue_details->surname.'
				</div>
            </div>
          </div>
        </div>


<div class="form-group">
            <div class="col-md-12 zeropadding">
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>              
				<div style="border:0px solid black;border-radius:20vh;height:30px;padding-left:10px;padding-top:3px">
				SI
				</div>
            </div>
          </div>
        </div>
 <div class="form-group">
            <div class="col-md-12 zeropadding">
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>              
				<div style="background-color:#E4E4E4;border:0px solid black;border-radius:20vh;height:30px;padding-left:10px;padding-top:3px">
				<img src="xxl.png" style="width:18px;height:23px;padding-right:10px">'.$str4.'
				</div>
            </div>
          </div>
        </div>
	
	
	

 <div class="form-group">
            <div class="col-md-12 zeropadding" >
            <div class="input-group" style="margin-top:80px">
			
				<div class="wwwww" id="wwwww0" style="margin-top:-70px;margin-left:10px"></div>
				<div class="wwwww" id="wwwww1" style="margin-top:-70px;margin-left:180px" ></div>
				<div class="wwwww" id="wwwww2" style="margin-top:-70;margin-left:350" ></div>
				<div class="wwwww" id="wwwww3" style="float:right;margin-top:-70px" ></div>
            
            </div>
          </div>
        </div>
       <div class="form-group">
            <div class="col-md-12 zeropadding">
            <div class="input-group">
			
				<div  id="des_hid0" style="width:100px;border-radius:20vh;padding-left:10px">'.$col_w_img_1_0[0].''.$word_count_dot_0.'</div>
				<div  id="des_hid1" style="margin-top:-19px;margin-left:180px;width:100px;border-radius:20vh;padding-left:10px" >'.$col_w_img_1_1[0].''.$word_count_dot_1.'</div>
				<div  id="des_hid2" style="margin-top:-21;margin-left:350;width:100px;border-radius:20vh;padding-left:10px" >'.$col_w_img_1_2[0].''.$word_count_dot_2.'</div>
		<div  id="des_hid3" style="float:right;margin-top:-17.7px;margin-left:530px;width:100px;border-radius:20vh;padding-left:10px" >'.$col_w_img_1_3[0].''.$word_count_dot_3.'</div>
            
            </div>
          </div>
        </div>

       <div class="form-group">
            <div class="col-md-12 zeropadding" >
            <div class="input-group" style="">
			
				<div id="show_and_show_imag_0" style="width:100%;height:900px;border:1px solid black;'.$width_image_k_0.'" ><img src="'.$img_arr_0.'" style="width:100%;height:700px;padding-bottom:20px;"><div style="width:100%;height:200px;text-align:center">'.$col_w_img_1[0].'</div></div>
				<div id="show_and_show_imag_1" style="width:100%;height:900px;border:1px solid black;'.$width_image_k_1.'" ><img src="'.$img_arr_1.'" style="width:100%;height:700px;padding-bottom:20px"><div style="width:100%;height:200px;text-align:center">'.$col_w_img_1[1].'</div></div>
				<div id="show_and_show_imag_2" style="width:100%;height:900px;border:1px solid black;'.$width_image_k_2.'" ><img src="'.$img_arr_2.'" style="width:100%;height:700px;padding-bottom:20px"><div style="width:100%;height:200px;text-align:center">'.$col_w_img_1[2].'</div></div>
				<div id="show_and_show_imag_3" style="width:100%;height:900px;border:1px solid black;'.$width_image_k_3.'" ><img src="'.$img_arr_3.'" style="width:100%;height:700px;padding-bottom:20px"><div style="width:100%;height:200px;text-align:center;">'.$col_w_img_1[3].'</div></div>
				
            
            </div>
          </div>
        </div>

        
   




      
      </div>
 
      
      

      </fieldset>
    </form>
  </div>
</div> 


 </body>



';


//==============================================================
//==============================================================
//==============================================================


//==============================================================
//==============================================================
//==============================================================

$mpdf=new mPDF('c'); 


$save_pdf_srvr = "site_ins_".$main_query->id.".pdf";
$save_pdf_fldr = "pdf_download/site_ins_".$main_query->id.".pdf";
// echo $save_pdf_srvr;
// die();
$mpdf->WriteHTML($html);
$mpdf->SetHTMLFooter($footer);

// $mpdf->Output();

$mpdf->Output($save_pdf_fldr, 'F');
exit;


?>