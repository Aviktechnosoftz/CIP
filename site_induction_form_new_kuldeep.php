

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="https://www.w3.org/1999/xhtml">
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
<link href="./css/jquery.signaturepad.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

		

<head>
<header>

 <script src="js/jquery.signaturepad.js"></script> 
<script src="js/numeric-1.2.6.min.js"></script> 
		<script src="js/bezier.js"></script>
		
		
		<script type='text/javascript' src="https://github.com/niklasvh/html2canvas/releases/download/0.4.1/html2canvas.js"></script>
		<script src="js/json2.min.js"></script>


</header>
<div class="main_form_header">
  <div class="col-md-12" style="padding-top: 14px">
    <div class="col-md-6 main_title_container">
        <legend class="main_title">OCCUPATIONAL HEALTH & SAFETY MANAGEMENT SYSTEM</legend>
        <label class="control-label rightpadding"><span class="form-name">Site Induction Form&nbsp;<?// echo $project_name->project_name ?> </span></label>
        <input type="hidden" name="id" value="<? ?>">   
    </div>
    <div class="col-md-6 form_logo_container">
      <img src="image/logo.png" width="17%" style="image-rendering: -webkit-optimize-contrast;">
    </div>
  </div> 
</div>

<div class="Main_Form2">
  <div class="col-md-12">
	<form  name="site_form" id="myform"  method="POST" enctype="multipart/form-data" class="well form-horizontal well_class" >
		<fieldset>
			<div class="row">
				<div class="form-group">
					<div class="col-sm-12">
						<label>NAME OF PROJECT/SITE</label>
						<input type="text" placeholder="Enter First Name Here.." class="form-control form-control-left-radius" value="" readonly>
					</div>								
				</div>
			</div>
			<div class="row">
				<div class="form-group">
					<div class="col-sm-12">
						<label>PROJECT NUMBER</label>						
						<input type="text" placeholder="Enter Project Number Here.." class="form-control form-control-left-radius" value="" readonly>
					</div>
				</div>	
			</div>
			<div class="row">
				<div class="form-group">
					<div class="col-sm-12">
						<label>DATE</label>
						<input type="text" class="form-control form-control-left-radius" value="" readonly>
					</div>
				</div>	
			</div>
			
			<div class="row">
					<div class="form-group">
						<div class="col-sm-12">
							<label>Induction Number</label>
							<input type="text" name="induction_number" class="form-control form-control-left-radius" value="" id="ind_no" placeholder= "Please Select Employer for the Induction Number"readonly>
								
						</div>
					</div>
			</div>
			<div class="row">
				<div class="form-group">			
						<div class="col-sm-12">
							<label>Access Authority Issued</label>
							<input type="text"  class="form-control form-control-left-radius" value="">					
						</div>
				</div>		
			</div>
			

			<div class="row">
				<div class="form-group">
						<div class="col-sm-12">
							<p class="h4" style="text-align: left;font-size: 2vh;">EMPLOYER DETAILS</p>							
						</div>
				</div>
			</div>

			<div class="row">
				<div class="form-group">
					<div class="col-sm-12">
						<label>Employer/Business Name</label>
							<p>						
							<select style="height: 34px;display: block;width: 100%;padding-left:20px;font-size: 14px;line-height: 1.42857143;color: #555;background-color: #eee;background-image: none;border: 1px solid #eee;border-radius: 20vh;" id="select" onchange ="select2()" name="select_employer" required>
							<option value="">Please Select Employer</option>
							<? ?>
							<option value=""><?  ?> </option>
							<?  ?>
						<script>
							function select2() {
								  	
								   var e = document.getElementById("select");
								   var strUser = e.options[e.selectedIndex].value;
									// alert(strUser);
									$.ajax({
									    type: "POST",
									    url: "ajax.php",
									    data: {text1: strUser},

									    success: function(data) {
									       
									        
									    	  // alert(data);
									        var val_a= data.split("$");
									        
									        $('#ph').val(val_a[5]);
									        $('#emp_contact').val(val_a[3]);
									        $('#email').val(val_a[6]);
									        $('#address').val(val_a[7]);
									        $('#emp_trade').val(val_a[4]);
									        $('#ind_no').val(val_a[14]);

									        





									    }
									});
									}
							 </script>
													  
							</select>
							
							
							</p>
						<!-- <div>
							<label> Please Select</label>
						</div> -->	
							
						</div>
					</div>
			</div>
			<div class="row">
				<div class="form-group">						
						<div class="col-sm-12">
							<label>Phone Number</label>
							<input type="text" id="ph" name ="ph" class="form-control form-control-left-radius" value="" readonly>						
						</div>
				</div>
			</div>


			<div class="row">
				<div class="form-group">
					<div class="col-sm-12">
						<label>Employer Contact Person</label>
						<input type="text" placeholder="Contact Person.." id="emp_contact" class="form-control form-control-left-radius"  value="" readonly>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="form-group">		
					<div class="col-sm-12">
						<label>Email Address</label>
						<input type="Email" id="email" placeholder="Email Address.." class="form-control form-control-left-radius" readonly>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="form-group">
					<div class="col-sm-12">
						<label>Address  Of Your Employer/ Business </label>
						<textarea id="address" placeholder="Address..." rows="3" class="form-control form-control-left-radius" readonly></textarea>
					</div>
				</div>
			</div>		

			<div class="row">
				<div class=" form-group">
					<div class="col-sm-12">
						<p class="h4" style="text-align: left;font-size: 2vh;">PERSON INDUCTED DETAILS</p>
						
					</div>
				</div>
			</div>

			<div class="row">
				<div class="form-group">
					<div class="col-sm-6 ">
						<label>Your First Name</label>
						<input type="text" placeholder="Enter First Name Here.." id= "f_name_emp" class="form-control form-control-left-radius" name="empe_name" required>
					</div>
					<div class="col-sm-6">
						<label>Your Surname</label>
						<input type="text" placeholder="Enter Surname Here.." class="form-control form-control-left-radius" name="empe_surname" id="s_name_emp" required>
					</div>
				</div>	
			</div>

			<div class="row">
				<div class="form-group">
					<div class="col-md-12">
						<label>Your Address </label>
						<textarea placeholder="Enter Address Here.." rows="2" class="form-control form-control-left-radius" name="empe_add" id="person_address"  required></textarea>
						<div id="error_address" style="display: none;margin-top: 3px;font-size: 12px;color:#E74C3C">
							<label><i>The Address Must conatin atleast a number</i></label>

						</div>
					</div>							
				</div>
			</div>

			<div class="row">
				<div class="form-group">
					<div class="col-sm-12 ">
						<label>Your Date of Birth</label>
						<input type="Date" placeholder="Enter Date Of Birth Here.." class="form-control form-control-left-radius" name="empe_dob" id= "dob" style="text-align: left;" required>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="form-group">		
					<div class="col-sm-12">
						<label>Your Contact Number</label>
						<input type="Number" placeholder="Enter Contact Number Here.." class="form-control form-control-left-radius input" name="empe_contact" required>
					</div>
					<div class="alert"></div>
				</div>
			</div>

			<div class="row">
				<div class="form-group">
					<div class="col-sm-12 ">
						<label>Trade</label>
						<input type="text" class="form-control form-control-left-radius" name="empe_occupation" id="emp_trade" readonly>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="form-group">		
					<div class="col-sm-12">
						<label>Employee Position</label>
						<select id="position" style="height: 34px;display: block;width: 100%;padding-left:20px;font-size: 14px;line-height: 1.42857143;color: #555;background-color: #eee;background-image: none;border: 1px solid #eee;border-radius: 20vh;" name="empe_position" required>
							<option value=""> Select your position </option>
							<option value="Project Manager"> Project Manager </option>
							<option value="Site Manager"> Site Manager </option>
							<option value="Site Foreman"> Site Foreman </option>
							<option value="Worker"> Worker </option>
							<option id="other_value" value="1"> Other</option>

							<script>
								$(document).ready(function(){
								    $('#position').on('change', function() {
								      if ( this.value == '1')
								      //.....................^.......
								      {
								         $("#position_other").show();
								         $("#position-other_text").focus();
								         $("#position-other_text").prop('required',true);
								 
								          

								         
								        }
								        
								        else
								        	$("#position_other").hide();
								        	$('#other_value').val('1');
								
									});

								    });
								
								
									$(function() {
								    $(".input").keypress(function(event) {
								        if (event.which != 8 && event.which != 0 && (event.which < 48 || event.which > 57)) {
								            $(".alert").html("Enter only digits!").show().fadeOut(2000);
								            return false;
								        }
								    });
								});
									$(function() {
								    $(".input2").keypress(function(event) {
								        if (event.which != 8 && event.which != 0 && (event.which < 48 || event.which > 57)) {
								            $(".alert2").html("Enter only digits!").show().fadeOut(2000);
								            return false;
								        }
								    });
								});
																	
							</script>



						</select>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="form-group">
					<div class="col-sm-12 ">
						<label>Your Email Address</label>
						<input type="Email" placeholder="Enter Email Address Here.." class="form-control form-control-left-radius"  name="empe_email" required>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="form-group">		
					<div class="col-sm-12" id= "position_other" hidden>
						<label>Enter Position</label>
						<input type="text" placeholder="Enter Position.." class="form-control form-control-left-radius" id= "position-other_text" name=""  onchange="other_val()">
						<script>
							function other_val()
							{
							var other_position= document.getElementById('position-other_text').value;
							
							document.getElementById("other_value").value = other_position;
						}
						</script>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="form-group">
					<div class="col-sm-12">
						<p class="h4" style="text-align: left;font-size: 2vh;">EMERGENCY CONTACT PERSON</p>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="form-group">
					<div class="col-sm-12 ">
						<label>Contact Persons Name</label>
						<input type="text" placeholder="Enter Contact Person Name Here.." class="form-control form-control-left-radius" name="empe_emrg_name" required>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="form-group">		
					<div class="col-sm-12 ">
						<label>Their Contact Number</label>
						<input type="Number" placeholder="Enter Contact Number Here.." class="form-control input2 form-control-left-radius" name="empe_emrg_number" required>
					</div>
					<div class="alert2"></div>
				</div>
			</div>
			<div class="row">
				<div class="form-group">					
					<div class="col-sm-12 ">
						<label>Relationship To You</label>
						<input type="text" placeholder="Enter Relationship Here.." class="form-control form-control-left-radius" name="empe_emrg_relation" required>
					</div>
					
				</div>
			</div>
					
			<div class="row">
				<div class="form-group">
					<div class="col-sm-12 ">
						<p class="h4" style="text-align: left;font-size: 2vh;">MEDICAL CONDITIONS</p>
					</div>
				</div>
			</div>
				
			<div class="row">
				<div class="form-group">
					<div class="col-sm-9">
						<p class="text" style="text-align: left;"> Do you have a medical condition that poses a health or safety risk to you or others on site? e.g. Diabetes, Deafness, Heart/Lung Condition, Allergy etc.)</p>
					</div>							
				    <div class="col-sm-3">
				              
				        <label class="checkbox-inline" style="float: right;">
					      	<div style="float: left;">
						    	<input class="faChkSqr" name="medical_check"  id="medical" type="checkbox" onclick="uncheck(1);"><div style="margin-top: 6px;margin-left: 6px;width: 30px;height: 25px;">Yes</div>
						    </div>
					    <label class="checkbox-inline">
						    <div style="float: right;">
					      		<input style="margin-top:-3px" class="faChkSqr" name="medical_check_no"   id="medical_no" type="checkbox" onclick="uncheck(2);" checked><div style="margin-left: 10px;width: 25px;height: 25px">No</div>
					      	</div>
			           	
			          
			            <script>
						function uncheck(check) {
						    var prim = document.getElementById("medical");
						    var secn = document.getElementById("medical_no");
						    if (prim.checked == true && secn.checked == true) {
						        if (check == 1) {
						            secn.checked = false;
						            document.getElementById("txt_1").readOnly = false;
						            document.getElementById("txt_1").focus();
						            document.getElementById("txt_1").value="";

						        } else if (check == 2) {
						            prim.checked = false;
						            document.getElementById("txt_1").readOnly = true;
						            document.getElementById("txt_1").value="";



						        }
						    }
						    if (prim.checked == false && secn.checked == false) {

						        secn.checked = true;
						        document.getElementById("txt_1").readOnly = true;

						    }

						}		
						</script>
			          	</label>
			          	</label>
      				</div>
  				</div>
			</div>

				<div class="row">
					<div class="form-group">
						<div class="col-sm-12">
							<textarea name="medical_detail"  id="txt_1" rows="2" class="form-control form-control-left-radius" readonly="readonly" required></textarea>
							<div style="display: none;">
							<label id="err2"> Please Fill The Medical Description </label>
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="form-group">
						<div class="col-sm-12 ">
							<p class="h4" style="text-align: left;font-size: 2vh;">COMPETENCY CERTIFICATES / PROOF OF IDENTITY</p>
						</div>	
					</div>
				</div>

				<div class="row">
					<div class="form-group">
						<div class="col-sm-12 ">
							<p class="text" style="text-align: left;">Have you completed a 'General Construction Induction Card'?</p>
						</div>
          				<div class="col-sm-12">
							<label class="inline">Date Issued</label>
							<input  class="inline form-control form-control-left-radius" type="Date" name="gcic_issue" style=" text-align: left;" min="1997-01-01" required>
						</div>

					</div>
				</div>

				<div class="row">
					<div class="form-group">
						<div class="col-sm-12">
							<label>Name Of Induction Training Provider</label>
							<input type="text" name="provider_name" class="form-control form-control-left-radius" required> 
						</div>
					</div>
				</div>
				<div class="row">
					<div class="form-group">		
						<div class="col-sm-12">
							<label>General Construction Induction Card</label>
							<input  type="text" name="card_number" class="form-control form-control-left-radius" id= "pin_insert"  onchange="pin_generate()" minlength="4" required>
							

							<input type="hidden" name="pin_value" id= "pin_generation" hidden>
							<script>
								
							function pin_generate()
							{
								
								
								var fianl_val= document.getElementById('pin_insert').value;
								var lastFour = fianl_val.substr(fianl_val.length - 4); 
								document.getElementById('pin_generation').value = lastFour;
								
								
							
							}
							</script>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="form-group">
    					<div class="col-sm-12 ">
	        				<p class="text" style="text-align: left; font-size: 15px">Upload General Construction Induction Card, Driver's License,Trade Certificates, Prescribe Occupations, Licenses, First Aid Certificate, etc. related to your work on this site e.g. Electrician, Plant Operator, Crane, Rigger, First Aider, Demolitionetc.<strong>Upload Licenses
	        				</strong>
	        				</p>
        				</div>
						</div>
				</div>

				<div class="row">
					<div class="form-group">
						<div class="col-sm-6">
							<p style="text-align: center;">
								<!-- <input type="file" name="photo[]" id="imgInp1" required style="padding-left: 28%;">
								<img class="preview1" id="preview1" alt="" style=" width: 120px;height: 120px;background-position: center 
								center;background-size: cover; border-radius:20px ;display: inline-block;"> -->
							<div style="text-align: center;">
							<span class="glyphicon glyphicon-eye-open" id="viewer" style="display:none;left:65px;position:relative;top:25px"></span>
																  

							<div id="uploader" onclick="$('#file_1').click()" >


								 <img class="preview1"  id="preview1" alt="" style=" width: 120px;height: 120px;background-position: center center;background-size: cover; border-radius:20px ;display: inline-block;"  onerror="javascript:this.src='Document.png'"/> 
								 </div>
				                <input type="file" name="photo[]" id="file_1" class="file_2" 
				                onchange="document.getElementById('preview1').src = window.URL.createObjectURL(this.files[0]); document.getElementById('viewer').style.display = 'block';" required><br>
								<label>General Construction Induction Card Front:</label>
							</div>
							</p>
						</div>
						

						<div class="col-sm-6">
							<p style="text-align: center;">
							<div style="text-align: center;">
							<span class="glyphicon glyphicon-eye-open" id="viewer2" style="display:none;left:53px;position:relative;top:15px"></span>

							<div id="uploader2"  onclick="$('#file_2').click()" >
								 <img class="preview2" id="preview2" alt="" style=" width: 120px;height: 120px;background-position: center center;background-size: cover; border-radius:20px ;display: inline-block;" onerror="javascript:this.src='Document.png'" />
							</div>
							<input type="file" name="photo[]"  class="file_2" id="file_2" 
				                onchange="document.getElementById('preview2').src = window.URL.createObjectURL(this.files[0]); document.getElementById('viewer2').style.display = 'block';" required><br>
								<label>General Construction Induction Card Back:</label>
							</div>

							</p>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="form-group">
						<div class="col-sm-6">
							<p style="text-align: center;">
							<div style="text-align: center;">
							<span class="glyphicon glyphicon-eye-open" id="viewer3" style="display:none;left:53px;position:relative;top:15px"></span>

							<div id="uploader3"  onclick="$('#file_3').click()" >
						
								 <img class="preview3" id="preview3" alt="" style=" width: 120px;height: 120px;background-position: center center;background-size: cover; border-radius:20px ;display: inline-block;" />
				                </div>
								<input type="file" name="photo[]" id="file_3" 
				                onchange="document.getElementById('preview3').src = window.URL.createObjectURL(this.files[0]); document.getElementById('viewer3').style.display = 'block';" required><br>
								<label> Upload Driver License Front:</label>
							</div>
							</p>
						</div>
						<div class="col-sm-6">
							<p style="text-align: center;">
							<div style="text-align: center;">
							<span class="glyphicon glyphicon-eye-open" id="viewer4" style="display:none;left:53px;position:relative;top:15px"></span>

							<div id="uploader4"  onclick="$('#file_4').click()" >						
							<img class="preview4" id="preview4" alt="" style=" width: 120px;height: 120px;background-position: center center;background-size: cover; border-radius:20px ;display: inline-block;"  />
				                </div>
								<input type="file" name="photo[]" id="file_4" 
				                onchange="document.getElementById('preview4').src = window.URL.createObjectURL(this.files[0]); document.getElementById('viewer4').style.display = 'block';" required><br>
								<label> Upload Driver License Back:</label>
							</div>
							</p>
						</div>
					</div>	
				</div>
				<div class="row">
					<div class="form-group">
						<div class="col-sm-6">
							<p style="text-align: center;">					
							<div style="text-align: center;">
							<span class="glyphicon glyphicon-eye-open" id="viewer5" style="display:none;left:53px;position:relative;top:15px"></span>

							<div id="uploader5"  onclick="$('#file_5').click()" >
								<img class="preview5" id="preview5" alt="" style=" width: 120px;height: 120px;background-position: center center;background-size: cover; border-radius:20px ;display: inline-block;" />
				                </div>
								<input type="file" name="photo[]" id="file_5" 
				                onchange="document.getElementById('preview5').src = window.URL.createObjectURL(this.files[0]); document.getElementById('viewer5').style.display = 'block';"><br>
								<label> Upload Competency/ Certificates:</label>
							</div>
							</p>
						</div>
						<div class="col-sm-6">
							<p style="text-align: center;">
							<div style="text-align: center;">
							<span class="glyphicon glyphicon-eye-open" id="viewer6" style="display:none;left:53px;position:relative;top:15px"></span>

							<div id="uploader6"  onclick="$('#file_6').click()" >
								<img class="preview6" id="preview6" alt="" style=" width: 120px;height: 120px;background-position: center center;background-size: cover; border-radius:20px ;display: inline-block;"/>
				                </div>
								<input type="file" name="photo[]" id="file_6" 
				                onchange="document.getElementById('preview6').src = window.URL.createObjectURL(this.files[0]); document.getElementById('viewer6').style.display = 'block';"><br>
								<label> Upload Competency/ Certificates:</label>
							</div>
							</p>
						</div>
					</div>
				</div>	
				<div class="row">
					<div class="form-group">
						<div class="col-sm-6">
							<p style="text-align: center;">
							<div style="text-align: center;">
							<span class="glyphicon glyphicon-eye-open" id="viewer7" style="display:none;left:53px;position:relative;top:15px"></span>

							<div id="uploader7"  onclick="$('#file_7').click()" >
								<img class="preview7" id="preview7" alt="" style=" width: 120px;height: 120px;background-position: center center;background-size: cover; border-radius:20px ;display: inline-block;"  />
				                </div>
								<input type="file" name="photo[]" id="file_7" 
				                onchange="document.getElementById('preview7').src = window.URL.createObjectURL(this.files[0]); document.getElementById('viewer7').style.display = 'block';"><br>
								<label> Upload Competency/ Certificates:</label>
							</div>
							</p>
						</div>
						<div class="col-sm-6">
							<p style="text-align: center;">
							<div style="text-align: center;">
							<span class="glyphicon glyphicon-eye-open" id="viewer8" style="display:none;left:53px;position:relative;top:15px"></span>

							<div id="uploader8"  onclick="$('#file_8').click()" >
								<img class="preview8" id="preview8" alt="" style=" width: 120px;height: 120px;background-position: center center;background-size: cover; border-radius:20px ;display: inline-block;"  />
				                </div>
								<input type="file" name="photo[]" id="file_8" 
				                onchange="document.getElementById('preview8').src = window.URL.createObjectURL(this.files[0]); document.getElementById('viewer8').style.display = 'block';"><br>
								<label> Upload Competency/ Certificates:</label>
								</div>
								</p>					
						</div>
					</div>	
				</div>
				<div class="row">
					<div class="form-group">
						<div class="col-sm-6">
							<p style="text-align: center;">
							<div style="text-align: center;">
							<span class="glyphicon glyphicon-eye-open" id="viewer9" style="display:none;left:53px;position:relative;top:15px"></span>

							<div id="uploader9"  onclick="$('#file_9').click()" >
								<img class="preview9" id="preview9" alt="" style=" width: 120px;height: 120px;background-position: center center;background-size: cover; border-radius:20px ;display: inline-block;"/>
				                </div>
								<input type="file" name="photo[]" id="file_9" 
				                onchange="document.getElementById('preview9').src = window.URL.createObjectURL(this.files[0]); document.getElementById('viewer9').style.display = 'block';"><br>
								<label> Upload Competency/ Certificates:</label>
							</div>
							</p>
						</div>
						<div class="col-sm-6">
							<p style="text-align: center;">
							<div style="text-align: center;">
							<span class="glyphicon glyphicon-eye-open" id="viewer10" style="display:none;left:53px;position:relative;top:15px"></span>

							<div id="uploader10"  onclick="$('#file_10').click()" >
								<img class="preview10" id="preview10" alt="" style=" width: 120px;height: 120px;background-position: center center;background-size: cover; border-radius:20px ;display: inline-block;"  />
									</div>
							   <input type="file" name="photo[]" id="file_10" 
				                onchange="document.getElementById('preview10').src = window.URL.createObjectURL(this.files[0]); document.getElementById('viewer10').style.display = 'block';"><br>
								<label> Upload Competency/ Certificates:</label>
							</div>
							</p>
						</div>
					</div>	
				</div>
				<div class="row">
					<div class="form-group">
						<div class="col-sm-6">
							<p style="text-align: center;">
							<div style="text-align: center;">
							<span class="glyphicon glyphicon-eye-open" id="viewer11" style="display:none;left:53px;position:relative;top:15px"></span>

							<div id="uploader11"  onclick="$('#file_11').click()" >
								<img class="preview11" id="preview11" alt="" style=" width: 120px;height: 120px;background-position: center center;background-size: cover; border-radius:20px ;display: inline-block;"  />
				                </div>
								<input type="file" name="photo[]" id="file_11" 
				                onchange="document.getElementById('preview11').src = window.URL.createObjectURL(this.files[0]); document.getElementById('viewer11').style.display = 'block';"><br>
								<label> Upload Competency/ Certificates:</label>
							</div>
							</p>
						</div>
						<div class="col-sm-6">
							<p style="text-align: center;">
							<div style="text-align: center;">
							<span class="glyphicon glyphicon-eye-open" id="viewer12" style="display:none;left:53px;position:relative;top:15px"></span>

							<div id="uploader12"  onclick="$('#file_12').click()" >
								<img class="preview12" id="preview12" alt="" style=" width: 120px;height: 120px;background-position: center center;background-size: cover; border-radius:20px ;display: inline-block;"  />
				                </div>
								<input type="file" name="photo[]" id="file_12" 
				                onchange="document.getElementById('preview12').src = window.URL.createObjectURL(this.files[0]); document.getElementById('viewer12').style.display = 'block';"><br>
								<label> Upload Competency/ Certificates:</label>
							</div>
							</p>
						</div>
					</div>	
				</div>
				<div class="row">
					<div class="form-group">
						<div class="col-sm-6">
							<p style="text-align: center;">
							<div style="text-align: center;">
							<span class="glyphicon glyphicon-eye-open" id="viewer13" style="display:none;left:53px;position:relative;top:15px"></span>

							<div id="uploader13"  onclick="$('#file_13').click()" >
								<img class="preview13" id="preview13" alt="" style=" width: 120px;height: 120px;background-position: center center;background-size: cover; border-radius:20px ;display: inline-block;"  />
				                </div>
								<input type="file" name="photo[]" id="file_13" 
				                onchange="document.getElementById('preview13').src = window.URL.createObjectURL(this.files[0]); document.getElementById('viewer13').style.display = 'block';"><br>
								<label> Upload Competency/ Certificates:</label>
							
							</div>
							</p>
						</div>
						<div class="col-sm-6">
							<p style="text-align: center;">
							<div style="text-align: center;">
							<span class="glyphicon glyphicon-eye-open" id="viewer14" style="display:none;left:53px;position:relative;top:15px"></span>

							<div id="uploader14"  onclick="$('#file_14').click()" >
								<img class="preview14" id="preview14" alt="" style=" width: 120px;height: 120px;background-position: center center;background-size: cover; border-radius:20px ;display: inline-block;"  />
				                </div>
								<input type="file" name="photo[]" id="file_14" 
				                onchange="document.getElementById('preview14').src = window.URL.createObjectURL(this.files[0]); document.getElementById('viewer14').style.display = 'block';"><br>
								<label> Upload Competency/ Certificates:</label>
							</div>
							</p>
						</div>
					</div>	
				</div>
				<script>
					


				</script>

				
				<div class="row">
					<div class="form-group">
						<div class="col-md-12 rightpadding">
							<div class="col-sm-9">
								<p class="h4" style="text-align: left;font-size: 2vh;">INDUCTION TOPICS</p>
								<p align="left"> <b> Note:-</b> &nbsp; Please select all to confirm you understand all of the below induction topics discussed at the induction.</p>								
							</div>							
							<div class="col-sm-3 leftpadding">						              
						        <label class="checkbox-inline" style="float: right;">							        
					            	<input type="checkbox" id="select_all" class="faChkSqr"><div style="margin-top: 6px;width: 80px;height: 25px;text-align: right;padding-right: 7px;">Select All</div>
					            </label>					          	
	          				</div>
          				</div>
      				</div>
				</div>						
				
				<div class="row">
					<div class="form-group">
						<div class="col-md-12 rightpadding">
							<div class="col-sm-6">
								<div class="chknum">1)</div>
								<div class="col-sm-10 chkcontent">
									<p>Additional Inductions i.e. Visitor, Ceiling, Client. </p>
								</div>
								<div class="chkbox">
									<!-- <label class="checkbox-inline"> -->
								    	<input type="checkbox" Id="1" name="check_test[]" value="1" class="checkbox">
						            <!-- </label> -->
								</div>
							</div>
							<div class="col-sm-6">
								<div class="chknum">27)</div>
								<div class="col-sm-10 chkcontent">
									<p>Minimum PPE - 
										<ul class="ulpaddingdd">
											<li>Hard Hats, Steel Capped Boots.</li>
											<li>Protective Clothing Short Sleeve Shirt & Work Shorts are the Minimum Requirement.</li>
											<li>High Visibility Vests.</li>
										</ul>
									</p>
								</div>
								<div class="chkbox">
								<!-- <label class="checkbox-inline" style="float: right;"> -->							        
					           		<input type="checkbox" Id="1" name="check_test[]" value="27" class="checkbox">
					            <!-- </label> -->
								</div>
							</div>
							
						</div>
						<div class="col-md-12" style="padding-right: 18px;"><div class="bottom-line"></div></div>
					</div>	
				</div>

				<div class="row">
					<div class="form-group">
						<div class="col-md-12 rightpadding">
							<div class="col-sm-6">
								<div class="chknum">2)</div>
								<div class="col-sm-10 chkcontent">
									<p>What We are Building- 
										<ul class="ulpaddingsd">
											<li>Description.</li>
											<li>Expected Duration & Completion Date.</li>
											<li>Site Ph. No. etc.</li>
											<li>Sites Hours.</li>
										</ul>
									</p>
								</div>
								<div class="chkbox">
									<!--<l<label class="checkbox-inline">-->
								        
						            	<input type="checkbox" Id="1" name="check_test[]" value= "2" class="checkbox">

						            <!--</label>-->
								</div>
							</div>
							<div class="col-sm-6">
								<div class="chknum">28)</div>
								<div class="col-sm-10 chkcontent">
									<p>Safety Signs &nbsp; Barricades</p>
								</div>
								<div class="chkbox">
									<!--<label class="checkbox-inline" style="float: right;">-->
								        
						            	<input type="checkbox" Id="1" name="check_test[]" value="28" class="checkbox">

						            <!--</label>-->
								</div>

							</div>
						</div>
						<div class="col-md-12" style="padding-right: 18px;"><div class="bottom-line"></div></div>
					</div>	
				</div>

				<div class="row">
					<div class="form-group">
						<div class="col-md-12 rightpadding">
							<div class="col-sm-6">
								<div class="chknum">3)</div>
								<div class="col-sm-10 chkcontent">
									<p>Site Management Team - <ul class="ulpaddingsd">
													<li>Project Director and Site Manager.</li>
													<li>Foremen.</li>
													<li>Site Ph. No. etc.</li>
													<li>Site Safety Advisor (SSA).</li>
													</ul>
									</p>
								</div>
								<div class="chkbox">
									<!--<l<label class="checkbox-inline">-->
								        
						            	<input type="checkbox" Id="1" name="check_test[]" value="3" class="checkbox">

						            <!--</label>-->
								</div>
							</div>
							<div class="col-sm-6">	
								<div class="chknum">29)</div>
								<div class="col-sm-10 chkcontent">
									<p>Emergency Procedures -<ul class="ulpaddingdd">
													<li>Evacuation Procedures.</li>
													<li>Emergency Contact Details.</li>
													<li>Fire Fighting Equipment, etc.</li>
									
													</ul>
									</p>
								</div>
								<div class="chkbox">
									<!--<label class="checkbox-inline" style="float: right;">-->
								        
						            	<input type="checkbox" Id="1" name="check_test[]" value="29" class="checkbox">

						            <!--</label>-->
								</div>
							</div>
						</div>
						<div class="col-md-12" style="padding-right: 18px;"><div class="bottom-line"></div></div>
					</div>	
				</div>

				<div class="row">
					<div class="form-group">
						<div class="col-md-12 rightpadding">
							<div class="col-sm-6">
								<div class="chknum">4)</div>
								<div class="col-sm-10 chkcontent">
									<p>Site Layout - <ul class="ulpaddingsd">
													<li>Offices, Amenities, First Aid, Parking, etc.</li>
													<li>Deliveries To Site</li>
													</ul>
									</p>
								</div>
								<div class="chkbox">
									<!--<l<label class="checkbox-inline">-->
								        
						            <input type="checkbox" Id="1" name="check_test[]" value="4" class="checkbox">

						            <!--</label>-->
								</div>
							</div>
							<div class="col-sm-6">
								<div class="chknum">30)</div>
								<div class="col-sm-10 chkcontent">
									<p>Incident Reporting Requirements -<ul class="ulpaddingdd">
													<li>Accidents</li>
													<li>Dangerous Events.</li>
													<li>Near Misses</li>
													<li>Hazard</li>
									
													</ul>
									</p>
								</div>
								<div class="chkbox">
									<!--<label class="checkbox-inline" style="float: right;">-->
								        
						            	<input type="checkbox" Id="1" name="check_test[]" value="30" class="checkbox">

						            <!--</label>-->
								</div>
							</div>
						</div>
					</div>	
				</div>

				<div class="row">
					<div class="form-group">
						<div class="col-md-12 rightpadding">
							<div class="col-sm-6">
								<div class="chknum">5)</div>
								<div class="col-sm-10 chkcontent">
									<p>Policies - <ul class="ulpaddingsd">
													<li>WHS, Quality, Environment.</li>
													<li>Outline of CMP.</li>
													</ul>
									</p>
								</div>
								<div class="chkbox">
									<!-- <label class="checkbox-inline"> -->
								        
						            	<input type="checkbox" Id="1" name="check_test[]" value="5" class="checkbox">

						            <!-- </label> -->
								</div>
							</div>
							<div class="col-sm-6">
								<div class="chknum">31)</div>
								<div class="col-sm-10 chkcontent">
									<p>First Aid Facility</p>
								</div>
								<div class="chkbox">
									<!--<label class="checkbox-inline" style="float: right;">-->
								        
						            	<input type="checkbox" Id="1" name="check_test[]" value="31" class="checkbox">

						            <!--</label>-->
								</div>
							</div>
						</div>
						<div class="col-md-12" style="padding-right: 18px;"><div class="bottom-line"></div></div>
					</div>	
				</div>

				<div class="row">
					<div class="form-group">
						<div class="col-md-12 rightpadding">
							<div class="col-sm-6">
								<div class="chknum">6)</div>
								<div class="col-sm-10 chkcontent">
									<p>Essential Health & Safety Requirements for site.</p>
								</div>
								<div class="chkbox">
									<!-- <label class="checkbox-inline"> -->
								        
						            	<input type="checkbox" Id="1" name="check_test[]" value="6" class="checkbox">

						            <!-- </label> -->
								</div>
							</div>
							<div class="col-sm-6">
								<div class="chknum">32)</div>
								<div class="col-sm-10 chkcontent">
									<p>Amenities, Toilets & Drink Stations</p>
								</div>
								<div class="chkbox">
									<!--<label class="checkbox-inline" style="float: right;">-->
								        
						            	<input type="checkbox" Id="1" name="check_test[]" value="32" class="checkbox">

						            <!--</label>-->
								</div>
							</div>
						</div>
						<div class="col-md-12" style="padding-right: 18px;"><div class="bottom-line"></div></div>
					</div>	
				</div>
				<div class="row">
					<div class="form-group">
						<div class="col-md-12 rightpadding">
							<div class="col-sm-6">
								<div class="chknum">7)</div>
								<div class="col-sm-10 chkcontent">
									<p>Site Access & Security</p>
								</div>
								<div class="chkbox">
									<!--<l<label class="checkbox-inline">-->
								        
						            	<input type="checkbox" Id="1" name="check_test[]" value="7" class="checkbox">

						            <!--</label>-->
								</div>
							</div>
							<div class="col-sm-6">
								<div class="chknum">33)</div>
								<div class="col-sm-10 chkcontent">
									<p>General Site Requirements</p>
								</div>
								<div class="chkbox">
									<!--<label class="checkbox-inline" style="float: right;">-->
								        
						            	<input type="checkbox" Id="1" name="check_test[]" value="33" class="checkbox">

						            <!--</label>-->
								</div>
							</div>
						</div>
						<div class="col-md-12" style="padding-right: 18px;"><div class="bottom-line"></div></div>
					</div>	
				</div>

				<div class="row">
					<div class="form-group">
						<div class="col-md-12 rightpadding">
							<div class="col-sm-6">
								<div class="chknum">8)</div>
								<div class="col-sm-10 chkcontent">
									<p>Site Rules -e.g. Civil  Language & Behaviour</p>
								</div>
								<div class="chkbox">
									<!--<l<label class="checkbox-inline">-->
								        
						            	<input type="checkbox" Id="1" name="check_test[]" value="8" class="checkbox">

						            <!--</label>-->
								</div>
							</div>
							<div class="col-sm-6">
								<div class="chknum">34)</div>
								<div class="col-sm-10 chkcontent">
									<p>Environmental Compliance</p>
								</div>
								<div class="chkbox">
									<!--<label class="checkbox-inline" style="float: right;">-->
								        
						            	<input type="checkbox" Id="Environmental_select" name="check_test[]" value="34" class="checkbox">

						            <!--</label>-->
								</div>
								    <script>
									$(document).ready(function(){

											 $("#Environmental_select").click(function(){
								      

								       var SelectVal = $(this).val();

									     if(SelectVal == "1"){
									         $("#Environmental_text").attr("readonly", true);
									         $("#Environmental_text").attr("required", false);  
									         $(this).val("0");
									     }	
									      else{
									         $("#Environmental_text").attr("readonly", false);
									         $("#Environmental_text").attr("required", true); 
									         $("#Environmental_text").focus();

									         $(this).val("1");
									     }
								     });
									});
									$(document).ready(function(){

											 $("#select_all").click(function(){
								      

								       var SelectVal_all = $(this).val();

									     if(SelectVal_all == "1"){
									         $("#Environmental_text").attr("readonly", true);     
									         $(this).val("0");
									     }	
									      else{
									         $("#Environmental_text").attr("readonly", false);
									         $("#Environmental_text").focus();

									         $(this).val("1");
									     }
								     });
									});
									</script>
							</div>
						</div>
						<div class="col-md-12" style="padding-right: 18px;"><div class="bottom-line"></div></div>
					</div>
				</div>

				<div class="row">
					<div class="form-group">
						<div class="col-md-12 rightpadding">
							<div class="col-sm-6">
								<div class="chknum">9)</div>
								<div class="col-sm-10 chkcontent">
									<p>Disciplinary Procedures -</p>
								</div>
								<div class="chkbox">
									<!--<l<label class="checkbox-inline">-->
								        
						            	<input type="checkbox" Id="1" name="check_test[]" value="9" class="checkbox">

						            <!--</label>-->
								</div>
							</div>
						</div>
						<div class="col-md-12" style="padding-right: 18px;"><div class="bottom-line"></div></div>
					</div>						
				</div>

				<div class="row">
					<div class="form-group">
						<div class="col-md-12 rightpadding">
							<div class="col-sm-6">
								<div class="chknum">10)</div>
								<div class="col-sm-10 chkcontent">
									<p>Drugs and Alcohol -</p>
								</div>
								<div class="chkbox">
									<!--<l<label class="checkbox-inline">-->
								        
						            	<input type="checkbox" Id="1" name="check_test[]" value="10" class="checkbox">

						            <!--</label>-->
								</div>
							</div>	
						</div>
						<div class="col-md-12" style="padding-right: 18px;"><div class="bottom-line"></div></div>
					</div>						
				</div>

				<div class="row">
					<div class="form-group">
						<div class="col-md-12 rightpadding">
							<div class="col-sm-6">
								<div class="chknum">11)</div>
								<div class="col-sm-10 chkcontent">
									<p>Smoking Policy, Designated Smoking Area's</p>
								</div>
								<div class="chkbox">
									<!--<l<label class="checkbox-inline">-->
								        
						            	<input type="checkbox" Id="1" name="check_test[]" value="11" class="checkbox">

						            <!--</label>-->
								</div>
							</div>
						</div>
						<div class="col-md-12" style="padding-right: 18px;"><div class="bottom-line"></div></div>
					</div>						
				</div>

				<div class="row">
					<div class="form-group">
						<div class="col-md-12 rightpadding">
							<div class="col-sm-6">
								<div class="chknum">12)</div>
								<div class="col-sm-10 chkcontent">
									<p>Project Consultation & Communication</p>
								</div>
								<div class="chkbox">
									<!--<l<label class="checkbox-inline">-->
								        
						            	<input type="checkbox" Id="1" name="check_test[]" value="12" class="checkbox">

						            <!--</label>-->
								</div>
							</div>
						</div>
						<div class="col-md-12" style="padding-right: 18px;"><div class="bottom-line"></div></div>
					</div>	
				</div>

				<div class="row">
					<div class="form-group">
						<div class="col-md-12 rightpadding">
							<div class="col-sm-6">
								<div class="chknum">13)</div>
								<div class="col-sm-10 chkcontent">
									<p>Site Specific Hazards</p>
								</div>
								<div class="chkbox">
									<!--<l<label class="checkbox-inline">-->
								        
						            	<input type="checkbox" Id="1" name="check_test[]" value="13" class="checkbox">

						            <!--</label>-->
								</div>
							</div>
						</div>
						<div class="col-md-12" style="padding-right: 18px;"><div class="bottom-line"></div></div>
					</div>	
				</div>

				<div class="row">
					<div class="form-group">
						<div class="col-md-12 rightpadding">
							<div class="col-sm-6">
								<div class="chknum">14)</div>
								<div class="col-sm-10 chkcontent">
									<p>Work Method Statement Requirements</p>
								</div>
								<div class="chkbox">
									<!--<l<label class="checkbox-inline">-->
								        
						            	<input type="checkbox" Id="1" name="check_test[]" value="14"  class="checkbox">

						            <!--</label>-->
								</div>
							</div>
						</div>
						<div class="col-md-12" style="padding-right: 18px;"><div class="bottom-line"></div></div>
					</div>	
				</div>

				<div class="row">
					<div class="form-group">
						<div class="col-md-12 rightpadding">
							<div class="col-sm-6">
								<div class="chknum">15)</div>
								<div class="col-sm-10 chkcontent">
									<p>Site Permits</p>
								</div>
								<div class="chkbox">
									<!--<l<label class="checkbox-inline">-->
								        
						            <input type="checkbox" Id="1"name="check_test[]" value="15" class="checkbox">

						            <!--</label>-->
								</div>
							</div>
						</div>
						<div class="col-md-12" style="padding-right: 18px;"><div class="bottom-line"></div></div>
					</div>	
				</div>
				
				<div class="row">
					<div class="form-group">
						<div class="col-md-12 rightpadding">
							<div class="col-sm-6">
								<div class="chknum">16)</div>
								<div class="col-sm-10 chkcontent">
									<p>Live Services</p>
								</div>
								<div class="chkbox">
									<!--<l<label class="checkbox-inline">-->
								        
						            <input type="checkbox" Id="1" name="check_test[]" value="16" class="checkbox">

						            <!--</label>-->
								</div>
							</div>
						</div>
						<div class="col-md-12" style="padding-right: 18px;"><div class="bottom-line"></div></div>
					</div>	
				</div>
			
				<div class="row">
					<div class="form-group">
						<div class="col-md-12 rightpadding">
							<div class="col-sm-6">
								<div class="chknum">17)</div>
								<div class="col-sm-10 chkcontent">
									<p>Underground Services</p>
								</div>
								<div class="chkbox">
									<!--<l<label class="checkbox-inline">-->
								        
						            	<input type="checkbox" Id="1" name="check_test[]" value="17" class="checkbox">

						            <!--</label>-->
								</div>
							</div>
						</div>
						<div class="col-md-12" style="padding-right: 18px;"><div class="bottom-line"></div></div>
					</div>	
				</div>
		
				<div class="row">
					<div class="form-group">
						<div class="col-md-12 rightpadding">
							<div class="col-sm-6">
								<div class="chknum">18)</div>
								<div class="col-sm-10 chkcontent">
									<p>Mobile Plant</p>
								</div>
								<div class="chkbox">
									<!--<l<label class="checkbox-inline">-->
								        
						            	<input type="checkbox" Id="1" name="check_test[]" value="18" class="checkbox">

						            <!--</label>-->
								</div>
							</div>
						</div>
						<div class="col-md-12" style="padding-right: 18px;"><div class="bottom-line"></div></div>
					</div>	
				</div>

				<div class="row">
					<div class="form-group">
						<div class="col-md-12 rightpadding">
							<div class="col-sm-6">
								<div class="chknum">19)</div>
								<div class="col-sm-10 chkcontent">
									<p>Working at Heights</p>
								</div>
								<div class="chkbox">
									<!--<l<label class="checkbox-inline">-->
								        
						            	<input type="checkbox" Id="1" name="check_test[]" value="19" class="checkbox">

						            <!--</label>-->
								</div>
							</div>
						</div>
						<div class="col-md-12" style="padding-right: 18px;"><div class="bottom-line"></div></div>
					</div>	
				</div>
			
				<div class="row">
					<div class="form-group">
						<div class="col-md-12 rightpadding">
							<div class="col-sm-6">
								<div class="chknum">20)</div>
								<div class="col-sm-10 chkcontent">
									<p>Safety Harnesses.</p>
								</div>
								<div class="chkbox">
									<!--<l<label class="checkbox-inline">-->
								        
						            	<input type="checkbox" Id="1" name="check_test[]" value="20" class="checkbox">

						            <!--</label>-->
								</div>
							</div>
						</div>
						<div class="col-md-12" style="padding-right: 18px;"><div class="bottom-line"></div></div>
					</div>	
				</div>
			
				<div class="row">
					<div class="form-group">
						<div class="col-md-12 rightpadding">
							<div class="col-sm-6">
								<div class="chknum">21)</div>
								<div class="col-sm-10 chkcontent">
									<p>Ladders</p>
								</div>
								<div class="chkbox">
									<!--<l<label class="checkbox-inline">-->
								        
						            	<input type="checkbox" Id="1" name="check_test[]" value="21" class="checkbox">

						            <!--</label>-->
								</div>
							</div>
						</div>
						<div class="col-md-12" style="padding-right: 18px;"><div class="bottom-line"></div></div>
					</div>	
				</div>
		
				<div class="row">
					<div class="form-group">
						<div class="col-md-12 rightpadding">
							<div class="col-sm-6">
								<div class="chknum">22)</div>
								<div class="col-sm-10 chkcontent">
									<p>Mobile and Fixed Scaffold.</p>
								</div>
								<div class="chkbox">
									<!--<l<label class="checkbox-inline">-->
								        
						            	<input type="checkbox" Id="1" name="check_test[]" value="22" class="checkbox">

						            <!--</label>-->
								</div>
							</div>
						</div>
						<div class="col-md-12" style="padding-right: 18px;"><div class="bottom-line"></div></div>
					</div>	
				</div>

				<div class="row">
					<div class="form-group">
						<div class="col-md-12 rightpadding">
							<div class="col-sm-6">
								<div class="chknum">23)</div>
								<div class="col-sm-10 chkcontent">
									<p>Electrical -<ul class="ulpaddingdd">
													<li>Portable equip/tools tested and tagged.</li>
													</ul>
									</p>
								</div>
								<div class="chkbox">
									<!--<l<label class="checkbox-inline">-->
								        
						            <input type="checkbox" Id="1" name="check_test[]" value="23" class="checkbox">

						            <!--</label>-->
								</div>
							</div>
						</div>
						<div class="col-md-12" style="padding-right: 18px;"><div class="bottom-line"></div></div>
					</div>	
				</div>

				<div class="row">
					<div class="form-group">
						<div class="col-md-12 rightpadding">
							<div class="col-sm-6">
								<div class="chknum">24)</div>
								<div class="col-sm-10 chkcontent">
									<p>Fire Prevention</p>
								</div>
								<div class="chkbox">
									<!--<l<label class="checkbox-inline">-->
								        
						            	<input type="checkbox" Id="1" name="check_test[]" value="24" class="checkbox">

						            <!--</label>-->
								</div>
							</div>
						</div>
						<div class="col-md-12" style="padding-right: 18px;"><div class="bottom-line"></div></div>
					</div>	
				</div>	

				<div class="row">
					<div class="form-group">
						<div class="col-md-12 rightpadding">
							<div class="col-sm-6">
								<div class="chknum">25)</div>
								<div class="col-sm-10 chkcontent">
									<p>Hazardous Substances & MSDS</p>
								</div>
								<div class="chkbox">
									<!--<l<label class="checkbox-inline">-->
								        
						            	<input type="checkbox" Id="1" name="check_test[]" value="25" class="checkbox">

						            <!--</label>-->
								</div>
							</div>
						</div>
						<div class="col-md-12" style="padding-right: 18px;"><div class="bottom-line"></div></div>
					</div>	
				</div>

				<div class="row">
					<div class="form-group">
						<div class="col-md-12 rightpadding">
							<div class="col-sm-6">
								<div class="chknum">26)</div>
								<div class="col-sm-10 chkcontent">
									<p>Manual Handling</p>
								</div>
								<div class="chkbox">
									<!--<l<label class="checkbox-inline">-->
								        
						            	<input type="checkbox" Id="1" name="check_test[]" value="26" class="checkbox">

						            <!--</label>-->
								</div>
							</div>
						</div>
						<div class="col-md-12" style="padding-right: 18px;"><div class="bottom-line"></div></div>
					</div>	
				</div>
				<script>
								$(document).ready(function(){
												    $('#select_all').on('click',function(){
												        if(this.checked){
												            $('.checkbox').each(function(){
												                this.checked = true;
												            });
												        }else{
												             $('.checkbox').each(function(){
												                this.checked = false;
												            });
												        }
												    });
												    
												    $('.checkbox').on('click',function(){
												        if($('.checkbox:checked').length == $('.checkbox').length){
												            $('#select_all').prop('checked',true);
												        }else{
												            $('#select_all').prop('checked',false);
												        }
												    });
												});
										$(document).ready(function(){

											$(".checkbox").prop('required',true);
										});
				</script>	
				<div class="row">
					<div class="col-sm-12 form-group">
						<p class="h4" style="text-align: left;font-size: 2vh;">PRIVACY NOTIFICATION:</p>
						
					</div>
					
				</div>	
				<div class="row">
					<div class="col-sm-12 form-group">
						<p style="font-size: 2.1vh;padding-top: 1vh;font-family: Helvetica_Nue;color:#919191;">The personal information you have provided may be used for the purpose of contacting the person you have nominated in the event of an emergency. From time to time the information may be supplied to others such (as medical officers, ambulance officers) involved with the outcome of an emergency or medical situation. All disclosures will be subject to the provisions imposed by the Privacy Act 1988.</p>
						
					</div>
					
				</div>
				<div class="row">
					<div class="form-group">
						<div class="col-sm-12">
							<p class="h4" style="color: #010101;font-size: 2vh;">INDUCTION DECLARATION</p>
							<!-- <div class="col-sm-12"> -->
							<div class="col-sm-12" style="-webkit-border-radius: 15px;
	-moz-border-radius: 15px;
	border-radius: 15px;background: #e4e4e4;">
							<p class="h5" style="text-align: left;font-weight: 100;">I <input type="text" id="declaration_name" name="declaration_name" style="border: 0;text-align: center;background: #e4e4e4;" readonly>&nbsp;<span style="float: right;color: #272727;"> certify the following:</span> </p>
							<ul style="padding-left: 15px;color: #8f8f8f;">
								<li>All information givenby me verbally during the induction and written by me on this form is true and correct.</li>
								<li>I understand my Work Health and Safety, Quality and Environmental obligations and responsibilities on this project as explained to me during the Site Specific Induction and as ticked by meabove.</li>
								<li>I have all the relevant licences, experience, trainings, qualifications,knowledge and skills to do the tasksallocated to me on this project competently and in a safe way.</li>
								<li>I am medically fit to perform the respective tasks I am required to undertake while on site.</li>

							</ul>
							
						</div>
						<!-- </div> -->
						</div>	
					</div>
					
				</div>
				<div class="row">
					<div class="form-group">
						<div class="col-sm-12">
						<div style="-webkit-border-radius: 50px;-moz-border-radius: 50px;border-radius: 50px;background: #d3d3d3;height: 155px">
						 <div style="width: 50%; float: left;">
						 	<p class="h5" style="text-align: center;vertical-align: middle;">Today's Date<br><? echo date("d/m/y"); ?></p>
						</div>
						<div style="width: 50%; float: right;">
						  <p class="h5" style="text-align: center;vertical-align: middle;position: absolute;left: 70%;" >Your Signature</p>
						  	<input type="text" name="sign_div_hide" id="sign_div_hide" hidden="">
						  <div id="signArea" >
			<!-- <h2 class="tag-ingo">Put signature below,</h2> -->
			<div class="sig sigWrapper" style="height:auto;">
				<div class="typed"></div>
				<canvas class="sign-pad" id="sign-pad" width="300" height="100"></canvas>
				<canvas id='blank' style='display:none'></canvas>
				<input type="button" name="" id="btnSaveSign" value="Save">
				<!-- <li class="clearButton"><a href="#clear">Clear</a></li> -->
				<input type="button" name="" class="clearButton" value="Clear">
			</div>
		</div></div>
		<div class="sign-container">
		<?php
		
		?>
		<img src="<?php  ?>" class="sign-preview" />
		<?php
		
		
		?>
		</div>
								
				                
						</div>
						</div>
					</div>
				</div>
				

					<script>
						$('#f_name_emp,#s_name_emp').bind('keypress keyup blur', function() {
						$('#declaration_name').val($('#f_name_emp').val() + ' ' + $('#s_name_emp').val());
						});

					</script>
					<script>
					// function dec_name_get(){
					// 	var name= document.getElementById("f_name_emp").value;
					// 	// alert(name);
					// 	var today = new Date();

					// 	var time = today.getHours()+ "" + today.getMinutes() + "" + today.getSeconds();
					// 	$.ajax({
					// 		    type: "POST",
					// 		    url: "ajax_decalaration.php",
					// 		    data: "name="+name+"&time="+time,

					// 		    success: function(data) {
					// 		    	var string = "API/Uploads/"+time+".jpg";
					// 		    	document.getElementById("sign_div").style.backgroundImage = "url('" + string + "')";
     //          						document.getElementById("sign_div").style.backgroundRepeat= "no-repeat";
     //          						document.getElementById("sign_div").style.backgroundPosition= "top center";
     //          						document.getElementById("sign_div_hidden").value= time;



					// 		    }
					// 		});
					// }
					</script>
				<div class="row">				
					<div class="form-group">
			        	<label class="col-md-4 control-label"></label>
				            <div class="col-md-5">					
								<input type="submit"  class="btn btn-primary form_submit_button" id= "submit" value="Submit"  name="set"  data-complete-text="Loading Completed" autocomplete="off" onclick="check_sign()" />
								
							</div>
					</div>	
				</div>
				
		</fieldset>
		</form> 
	<? ?>
	</div>
</div> 
<script>
	  function get_image(id)
{
    
    $('#file_'+id).click();


}
</script>
  <style> 

label {
    
    
    font-style: italic;
    padding-left: 25px;
}

.preview1,.preview2,.preview3,.preview4,.preview5,.preview6,.preview7,.preview8,.preview9,.preview10,.preview11,.preview12,.preview13,.preview14
{
	background-image: url('image/grid.png');

}


#sign_div
{
	background-image: url('image/Your_Signature.png');
}
.h4
{
color: ##666666;
    font-size: 2.4vh;
    font-weight: 900;
}


input[type='file'] {
        color: transparent; 
        /*display: none;  */    position: absolute;
    top: 30px;
    left: 190px;
    z-index: -9999;
}


#signArea{
				width:304px;
				margin: 25px auto;
			}
			.sign-container {
				width: 60%;
				margin: auto;
			}
			.sign-preview {
				width: 150px;
				height: 50px;
				border: solid 1px #CFCFCF;
				margin: 10px 5px;
			}
			.tag-ingo {
				font-family: cursive;
				font-size: 12px;
				text-align: left;
				font-style: oblique;
			}

			.output>img,.output1>img,.output2>img,.output3>img,.output4>img,.output5>img,.output6>img,.output7>img,.output8>img,.output9>img,.output10>img,.output11>img,.output12>img,.output13>img,.output14>img
			{
				width: 120px;height: 120px;background-position: center center;background-size: cover; border-radius:20px ;display: inline-block;
			}
</style>

<script>	var toggle_val= 0;
			$(document).ready(function() {
				$('#signArea').signaturePad({drawOnly:true, drawBezierCurves:true, lineTop:90});
				
			});
			
			$("#btnSaveSign").click(function(e){
					canvas = document.getElementById('sign-pad');
				if(canvas.toDataURL() == "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAASwAAABkCAYAAAA8AQ3AAAADHUlEQVR4Xu3YsQ3DQBADQasm9V+CanoDTu3A6RKjCvjDAwNd55zz8hEgQCAgcBmsQEsiEiDwETBYDoEAgYyAwcpUJSgBAgbLDRAgkBEwWJmqBCVAwGC5AQIEMgIGK1OVoAQIGCw3QIBARsBgZaoSlAABg+UGCBDICBisTFWCEiBgsNwAAQIZAYOVqUpQAgQMlhsgQCAjYLAyVQlKgIDBcgMECGQEDFamKkEJEDBYboAAgYyAwcpUJSgBAgbLDRAgkBEwWJmqBCVAwGC5AQIEMgIGK1OVoAQIGCw3QIBARsBgZaoSlAABg+UGCBDICBisTFWCEiBgsNwAAQIZAYOVqUpQAgQMlhsgQCAjYLAyVQlKgIDBcgMECGQEDFamKkEJEDBYboAAgYyAwcpUJSgBAgbLDRAgkBEwWJmqBCVAwGC5AQIEMgIGK1OVoAQIGCw3QIBARsBgZaoSlAABg+UGCBDICBisTFWCEiBgsNwAAQIZAYOVqUpQAgQMlhsgQCAjYLAyVQlKgIDBcgMECGQEDFamKkEJEDBYboAAgYyAwcpUJSgBAgbLDRAgkBEwWJmqBCVAwGC5AQIEMgIGK1OVoAQIGCw3QIBARsBgZaoSlAABg+UGCBDICBisTFWCEiBgsNwAAQIZAYOVqUpQAgQMlhsgQCAjYLAyVQlKgIDBcgMECGQEDFamKkEJEDBYboAAgYyAwcpUJSgBAgbLDRAgkBEwWJmqBCVAwGC5AQIEMgIGK1OVoAQIGCw3QIBARsBgZaoSlAABg+UGCBDICBisTFWCEiBgsNwAAQIZAYOVqUpQAgQMlhsgQCAjYLAyVQlKgIDBcgMECGQEDFamKkEJEDBYboAAgYyAwcpUJSgBAgbLDRAgkBEwWJmqBCVAwGC5AQIEMgIGK1OVoAQIGCw3QIBARuDnYD3Pk3mAoAQIbArc9/31MIO12bVXEcgL/D1Y+Zd6AAECkwL+YU3W6lEENgUM1mavXkVgUsBgTdbqUQQ2BQzWZq9eRWBSwGBN1upRBDYFDNZmr15FYFLAYE3W6lEENgUM1mavXkVgUuANCUCU5ApZHy4AAAAASUVORK5CYII=" || canvas.toDataURL()=="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAASwAAABkCAYAAAA8AQ3AAAADKElEQVR4Xu3YsW2EUBREUbYA2qD/emiDAljJmeXE6R0dKph/5mkCPu/7voePAAECAYGPwQq0JCIBAj8CBsshECCQETBYmaoEJUDAYLkBAgQyAgYrU5WgBAgYLDdAgEBGwGBlqhKUAAGD5QYIEMgIGKxMVYISIGCw3AABAhkBg5WpSlACBAyWGyBAICNgsDJVCUqAgMFyAwQIZAQMVqYqQQkQMFhugACBjIDBylQlKAECBssNECCQETBYmaoEJUDAYLkBAgQyAgYrU5WgBAgYLDdAgEBGwGBlqhKUAAGD5QYIEMgIGKxMVYISIGCw3AABAhkBg5WpSlACBAyWGyBAICNgsDJVCUqAgMFyAwQIZAQMVqYqQQkQMFhugACBjIDBylQlKAECBssNECCQETBYmaoEJUDAYLkBAgQyAgYrU5WgBAgYLDdAgEBGwGBlqhKUAAGD5QYIEMgIGKxMVYISIGCw3AABAhkBg5WpSlACBAyWGyBAICNgsDJVCUqAgMFyAwQIZAQMVqYqQQkQMFhugACBjIDBylQlKAECBssNECCQETBYmaoEJUDAYLkBAgQyAgYrU5WgBAgYLDdAgEBGwGBlqhKUAAGD5QYIEMgIGKxMVYISIGCw3AABAhkBg5WpSlACBAyWGyBAICNgsDJVCUqAgMFyAwQIZAQMVqYqQQkQMFhugACBjIDBylQlKAECBssNECCQETBYmaoEJUDAYLkBAgQyAgYrU5WgBAgYLDdAgEBGwGBlqhKUAAGD5QYIEMgIGKxMVYISIGCw3AABAhkBg5WpSlACBAyWGyBAICNgsDJVCUqAgMFyAwQIZAQMVqYqQQkQMFhugACBjIDBylQlKAECBssNECCQETBYmaoEJUDAYLkBAgQyAgYrU5WgBAgYLDdAgEBGwGBlqhKUAAGD5QYIEMgI/Bms+76P53kyDxCUAIFNgfM8j+u6fj3OYG127VUE8gL/Gqz8Kz2AAIFZAf+wZqv1MAJ7AgZrr1MvIjArYLBmq/UwAnsCBmuvUy8iMCtgsGar9TACewIGa69TLyIwK2CwZqv1MAJ7AgZrr1MvIjAr8AU2aZrkSYVn9AAAAABJRU5ErkJggg==")
        alert('Signature Field Cannot be left blank');
        
        		else
        		{
				html2canvas([document.getElementById('sign-pad')], {
					onrendered: function (canvas) {
						var canvas_img_data = canvas.toDataURL('image/png');
						var img_data = canvas_img_data.replace(/^data:image\/(png|jpg);base64,/, "");
						//ajax call to save image inside folder
						$.ajax({
							url: 'demo_sign_2.php',
							data: { img_data:img_data },
							type: 'post',
							dataType: 'json',
							success: function (response) {
							   alert("Signature Saved");
							   toggle_val=1;
							   $('#sign_div_hide').val(response+".png");
							}
						});
					}
				});
			}
			});

			
					  // var signaturePad = new signaturePad(canvas);

// 					  canvas = document.getElementById('sign-pad');
// 				ctx = canvas.getContext('2d');
// 				       // var signaturePad1 = new SignaturePad(sign1_canvas);
//                      canvas.addEventListener('mousemove',function(e){
//     ctx.lineTo(e.pageX,e.pageY);
//     ctx.stroke();
// });

			function check_sign()
			{
				       	var requiredDiv =  document.querySelector('.output');
				       	var requiredDiv2 =  document.querySelector('.output2');
				       	var requiredDiv3 =  document.querySelector('.output3');
				       	var requiredDiv4 =  document.querySelector('.output4');
				canvas = document.getElementById('sign-pad');
				 console.log(canvas.toDataURL());
    if(canvas.toDataURL() == "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAASwAAABkCAYAAAA8AQ3AAAADHUlEQVR4Xu3YsQ3DQBADQasm9V+CanoDTu3A6RKjCvjDAwNd55zz8hEgQCAgcBmsQEsiEiDwETBYDoEAgYyAwcpUJSgBAgbLDRAgkBEwWJmqBCVAwGC5AQIEMgIGK1OVoAQIGCw3QIBARsBgZaoSlAABg+UGCBDICBisTFWCEiBgsNwAAQIZAYOVqUpQAgQMlhsgQCAjYLAyVQlKgIDBcgMECGQEDFamKkEJEDBYboAAgYyAwcpUJSgBAgbLDRAgkBEwWJmqBCVAwGC5AQIEMgIGK1OVoAQIGCw3QIBARsBgZaoSlAABg+UGCBDICBisTFWCEiBgsNwAAQIZAYOVqUpQAgQMlhsgQCAjYLAyVQlKgIDBcgMECGQEDFamKkEJEDBYboAAgYyAwcpUJSgBAgbLDRAgkBEwWJmqBCVAwGC5AQIEMgIGK1OVoAQIGCw3QIBARsBgZaoSlAABg+UGCBDICBisTFWCEiBgsNwAAQIZAYOVqUpQAgQMlhsgQCAjYLAyVQlKgIDBcgMECGQEDFamKkEJEDBYboAAgYyAwcpUJSgBAgbLDRAgkBEwWJmqBCVAwGC5AQIEMgIGK1OVoAQIGCw3QIBARsBgZaoSlAABg+UGCBDICBisTFWCEiBgsNwAAQIZAYOVqUpQAgQMlhsgQCAjYLAyVQlKgIDBcgMECGQEDFamKkEJEDBYboAAgYyAwcpUJSgBAgbLDRAgkBEwWJmqBCVAwGC5AQIEMgIGK1OVoAQIGCw3QIBARsBgZaoSlAABg+UGCBDICBisTFWCEiBgsNwAAQIZAYOVqUpQAgQMlhsgQCAjYLAyVQlKgIDBcgMECGQEDFamKkEJEDBYboAAgYyAwcpUJSgBAgbLDRAgkBEwWJmqBCVAwGC5AQIEMgIGK1OVoAQIGCw3QIBARuDnYD3Pk3mAoAQIbArc9/31MIO12bVXEcgL/D1Y+Zd6AAECkwL+YU3W6lEENgUM1mavXkVgUsBgTdbqUQQ2BQzWZq9eRWBSwGBN1upRBDYFDNZmr15FYFLAYE3W6lEENgUM1mavXkVgUuANCUCU5ApZHy4AAAAASUVORK5CYII=" || canvas.toDataURL()=="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAASwAAABkCAYAAAA8AQ3AAAADKElEQVR4Xu3YsW2EUBREUbYA2qD/emiDAljJmeXE6R0dKph/5mkCPu/7voePAAECAYGPwQq0JCIBAj8CBsshECCQETBYmaoEJUDAYLkBAgQyAgYrU5WgBAgYLDdAgEBGwGBlqhKUAAGD5QYIEMgIGKxMVYISIGCw3AABAhkBg5WpSlACBAyWGyBAICNgsDJVCUqAgMFyAwQIZAQMVqYqQQkQMFhugACBjIDBylQlKAECBssNECCQETBYmaoEJUDAYLkBAgQyAgYrU5WgBAgYLDdAgEBGwGBlqhKUAAGD5QYIEMgIGKxMVYISIGCw3AABAhkBg5WpSlACBAyWGyBAICNgsDJVCUqAgMFyAwQIZAQMVqYqQQkQMFhugACBjIDBylQlKAECBssNECCQETBYmaoEJUDAYLkBAgQyAgYrU5WgBAgYLDdAgEBGwGBlqhKUAAGD5QYIEMgIGKxMVYISIGCw3AABAhkBg5WpSlACBAyWGyBAICNgsDJVCUqAgMFyAwQIZAQMVqYqQQkQMFhugACBjIDBylQlKAECBssNECCQETBYmaoEJUDAYLkBAgQyAgYrU5WgBAgYLDdAgEBGwGBlqhKUAAGD5QYIEMgIGKxMVYISIGCw3AABAhkBg5WpSlACBAyWGyBAICNgsDJVCUqAgMFyAwQIZAQMVqYqQQkQMFhugACBjIDBylQlKAECBssNECCQETBYmaoEJUDAYLkBAgQyAgYrU5WgBAgYLDdAgEBGwGBlqhKUAAGD5QYIEMgIGKxMVYISIGCw3AABAhkBg5WpSlACBAyWGyBAICNgsDJVCUqAgMFyAwQIZAQMVqYqQQkQMFhugACBjIDBylQlKAECBssNECCQETBYmaoEJUDAYLkBAgQyAgYrU5WgBAgYLDdAgEBGwGBlqhKUAAGD5QYIEMgI/Bms+76P53kyDxCUAIFNgfM8j+u6fj3OYG127VUE8gL/Gqz8Kz2AAIFZAf+wZqv1MAJ7AgZrr1MvIjArYLBmq/UwAnsCBmuvUy8iMCtgsGar9TACewIGa69TLyIwK2CwZqv1MAJ7AgZrr1MvIjAr8AU2aZrkSYVn9AAAAABJRU5ErkJggg==")
        alert('Signature Field Cannot be left blank');
  

  			else if(toggle_val == 0)
  			{
  				alert("Please Save Your Signature");
  			}

  			else if(requiredDiv.innerHTML.trim().length == 0 || requiredDiv2.innerHTML.trim().length == 0 || requiredDiv3.innerHTML.trim().length == 0 || requiredDiv4.innerHTML.trim().length == 0)
  			{
  				alert("Please Upload Documents");
  			}

				

				
			}



		  </script> 
 <script>
// uploader1
var imageLoader = document.getElementById('file_1');
    imageLoader.addEventListener('change', handleImage, false);

function handleImage(e) {
    
    var reader = new FileReader();
    reader.onload = function (event) {
        $('#uploader img').attr('src',event.target.result);
    }
    reader.readAsDataURL(e.target.files[0]);
    
}

var dropbox;
dropbox = document.getElementById("uploader");
dropbox.addEventListener("dragenter", dragenter, false);
dropbox.addEventListener("dragover", dragover, false);
dropbox.addEventListener("drop", drop, false);

function dragenter(e) {
  e.stopPropagation();
  e.preventDefault();
}

function dragover(e) {
  e.stopPropagation();
  e.preventDefault();
}

function drop(e) {
	
		document.getElementById("viewer").style.display = "block";

  e.stopPropagation();
  e.preventDefault();
  //you can check e's properties
  //console.log(e);
  var dt = e.dataTransfer;
  var files = dt.files;
  
  
  //this code line fires your 'handleImage' function (imageLoader change event)
  imageLoader.files = files;
}
</script>
<script>
// uploader2

var imageLoader2 = document.getElementById('file_2');
    imageLoader2.addEventListener('change', handleImage2, false);

function handleImage2(e) {
    var reader = new FileReader();
    reader.onload = function (event) {
        $('#uploader2 img').attr('src',event.target.result);
    }
    reader.readAsDataURL(e.target.files[0]);
    
}

var dropbox2;
dropbox2 = document.getElementById("uploader2");
dropbox2.addEventListener("dragenter", dragenter2, false);
dropbox2.addEventListener("dragover", dragover2, false);
dropbox2.addEventListener("drop", drop2, false);

function dragenter2(e) {
  e.stopPropagation();
  e.preventDefault();
}

function dragover2(e) {
  e.stopPropagation();
  e.preventDefault();
}

function drop2(e) {
		document.getElementById("viewer2").style.display = "block";

  e.stopPropagation();
  e.preventDefault();
  //you can check e's properties
  //console.log(e);
  var dt = e.dataTransfer;
  var files = dt.files;
  
  //this code line fires your 'handleImage' function (imageLoader change event)
  imageLoader2.files = files;
}
</script>
<script>
// uploader3

var imageLoader3 = document.getElementById('file_3');
    imageLoader3.addEventListener('change', handleImage3, false);

function handleImage3(e) {
    var reader = new FileReader();
    reader.onload = function (event) {
        $('#uploader3 img').attr('src',event.target.result);
    }
    reader.readAsDataURL(e.target.files[0]);
    
}

var dropbox3;
dropbox3 = document.getElementById("uploader3");
dropbox3.addEventListener("dragenter", dragenter3, false);
dropbox3.addEventListener("dragover", dragover3, false);
dropbox3.addEventListener("drop", drop3, false);

function dragenter3(e) {
  e.stopPropagation();
  e.preventDefault();
}

function dragover3(e) {
  e.stopPropagation();
  e.preventDefault();
}

function drop3(e) {
			document.getElementById("viewer3").style.display = "block";

  e.stopPropagation();
  e.preventDefault();
  //you can check e's properties
  //console.log(e);
  var dt = e.dataTransfer;
  var files = dt.files;
  
  //this code line fires your 'handleImage' function (imageLoader change event)
  imageLoader3.files = files;
}
</script>
<script>
// uploader4

var imageLoader4 = document.getElementById('file_4');
    imageLoader4.addEventListener('change', handleImage4, false);

function handleImage4(e) {
    var reader = new FileReader();
    reader.onload = function (event) {
        $('#uploader4 img').attr('src',event.target.result);
    }
    reader.readAsDataURL(e.target.files[0]);
    
}

var dropbo4;
dropbox4 = document.getElementById("uploader4");
dropbox4.addEventListener("dragenter", dragenter4, false);
dropbox4.addEventListener("dragover", dragover4, false);
dropbox4.addEventListener("drop", drop4, false);

function dragenter4(e) {
  e.stopPropagation();
  e.preventDefault();
}

function dragover4(e) {
  e.stopPropagation();
  e.preventDefault();
}

function drop4(e) {
			document.getElementById("viewer4").style.display = "block";

  e.stopPropagation();
  e.preventDefault();
  //you can check e's properties
  //console.log(e);
  var dt = e.dataTransfer;
  var files = dt.files;
  
  //this code line fires your 'handleImage' function (imageLoader change event)
  imageLoader4.files = files;
}
</script>
<script>
// uploader5

var imageLoader5 = document.getElementById('file_5');
    imageLoader5.addEventListener('change', handleImage5, false);

function handleImage5(e) {
    var reader = new FileReader();
    reader.onload = function (event) {
        $('#uploader3 img').attr('src',event.target.result);
    }
    reader.readAsDataURL(e.target.files[0]);
    
}

var dropbox5;
dropbox5 = document.getElementById("uploader5");
dropbox5.addEventListener("dragenter", dragenter5, false);
dropbox5.addEventListener("dragover", dragover5, false);
dropbox5.addEventListener("drop", drop5, false);

function dragenter5(e) {
  e.stopPropagation();
  e.preventDefault();
}

function dragover5(e) {
  e.stopPropagation();
  e.preventDefault();
}

function drop5(e) {
			document.getElementById("viewer5").style.display = "block";

  e.stopPropagation();
  e.preventDefault();
  //you can check e's properties
  //console.log(e);
  var dt = e.dataTransfer;
  var files = dt.files;
  
  //this code line fires your 'handleImage' function (imageLoader change event)
  imageLoader5.files = files;
}
</script>
<script>
// uploader6

var imageLoader6 = document.getElementById('file_6');
    imageLoader6.addEventListener('change', handleImage6, false);

function handleImage6(e) {
    var reader = new FileReader();
    reader.onload = function (event) {
        $('#uploader3 img').attr('src',event.target.result);
    }
    reader.readAsDataURL(e.target.files[0]);
    
}

var dropbox6;
dropbox6 = document.getElementById("uploader6");
dropbox6.addEventListener("dragenter", dragenter6, false);
dropbox6.addEventListener("dragover", dragover6, false);
dropbox6.addEventListener("drop", drop6, false);

function dragenter6(e) {
  e.stopPropagation();
  e.preventDefault();
}

function dragover6(e) {
  e.stopPropagation();
  e.preventDefault();
}

function drop6(e) {
			document.getElementById("viewer6").style.display = "block";

  e.stopPropagation();
  e.preventDefault();
  //you can check e's properties
  //console.log(e);
  var dt = e.dataTransfer;
  var files = dt.files;
  
  //this code line fires your 'handleImage' function (imageLoader change event)
  imageLoader6.files = files;
}
</script>
<script>
// uploader3

var imageLoader7 = document.getElementById('file_7');
    imageLoader7.addEventListener('change', handleImage7, false);

function handleImage7(e) {
    var reader = new FileReader();
    reader.onload = function (event) {
        $('#uploader7 img').attr('src',event.target.result);
    }
    reader.readAsDataURL(e.target.files[0]);
    
}

var dropbox7;
dropbox7 = document.getElementById("uploader7");
dropbox7.addEventListener("dragenter", dragenter7, false);
dropbox7.addEventListener("dragover", dragover7, false);
dropbox7.addEventListener("drop", drop7, false);

function dragenter7(e) {
  e.stopPropagation();
  e.preventDefault();
}

function dragover7(e) {
  e.stopPropagation();
  e.preventDefault();
}

function drop7(e) {
			document.getElementById("viewer7").style.display = "block";

  e.stopPropagation();
  e.preventDefault();
  //you can check e's properties
  //console.log(e);
  var dt = e.dataTransfer;
  var files = dt.files;
  
  //this code line fires your 'handleImage' function (imageLoader change event)
  imageLoader7.files = files;
}
</script>
<script>
// uploader8

var imageLoader8 = document.getElementById('file_8');
    imageLoader8.addEventListener('change', handleImage8, false);

function handleImage8(e) {
    var reader = new FileReader();
    reader.onload = function (event) {
        $('#uploader8 img').attr('src',event.target.result);
    }
    reader.readAsDataURL(e.target.files[0]);
    
}

var dropbox8;
dropbox8 = document.getElementById("uploader8");
dropbox8.addEventListener("dragenter", dragenter8, false);
dropbox8.addEventListener("dragover", dragover8, false);
dropbox8.addEventListener("drop", drop8, false);

function dragenter8(e) {
  e.stopPropagation();
  e.preventDefault();
}

function dragover8(e) {
  e.stopPropagation();
  e.preventDefault();
}

function drop8(e) {
			document.getElementById("viewer8").style.display = "block";

  e.stopPropagation();
  e.preventDefault();
  //you can check e's properties
  //console.log(e);
  var dt = e.dataTransfer;
  var files = dt.files;
  
  //this code line fires your 'handleImage' function (imageLoader change event)
  imageLoader8.files = files;
}
</script>
<script>
// uploader9

var imageLoader9 = document.getElementById('file_9');
    imageLoader9.addEventListener('change', handleImage9, false);

function handleImage9(e) {
    var reader = new FileReader();
    reader.onload = function (event) {
        $('#uploader3 img').attr('src',event.target.result);
    }
    reader.readAsDataURL(e.target.files[0]);
    
}

var dropbox9;
dropbox9 = document.getElementById("uploader9");
dropbox9.addEventListener("dragenter", dragenter9, false);
dropbox9.addEventListener("dragover", dragover9, false);
dropbox9.addEventListener("drop", drop9, false);

function dragenter9(e) {
  e.stopPropagation();
  e.preventDefault();
}

function dragover9(e) {
  e.stopPropagation();
  e.preventDefault();
}

function drop9(e) {
			document.getElementById("viewer9").style.display = "block";

  e.stopPropagation();
  e.preventDefault();
  //you can check e's properties
  //console.log(e);
  var dt = e.dataTransfer;
  var files = dt.files;
  
  //this code line fires your 'handleImage' function (imageLoader change event)
  imageLoader9.files = files;
}
</script>
<script>
// uploader10

var imageLoader10 = document.getElementById('file_10');
    imageLoader10.addEventListener('change', handleImage10, false);

function handleImage10(e) {
    var reader = new FileReader();
    reader.onload = function (event) {
        $('#uploader3 img').attr('src',event.target.result);
    }
    reader.readAsDataURL(e.target.files[0]);
    
}

var dropbox10;
dropbox10 = document.getElementById("uploader10");
dropbox10.addEventListener("dragenter", dragenter10, false);
dropbox10.addEventListener("dragover", dragover10, false);
dropbox10.addEventListener("drop", drop10, false);

function dragenter10(e) {
  e.stopPropagation();
  e.preventDefault();
}

function dragover10(e) {
  e.stopPropagation();
  e.preventDefault();
}

function drop10(e) {
			document.getElementById("viewer10").style.display = "block";

  e.stopPropagation();
  e.preventDefault();
  //you can check e's properties
  //console.log(e);
  var dt = e.dataTransfer;
  var files = dt.files;
  
  //this code line fires your 'handleImage' function (imageLoader change event)
  imageLoader10.files = files;
}
</script>
<script>
// uploader11

var imageLoader11 = document.getElementById('file_11');
    imageLoader11.addEventListener('change', handleImage11, false);

function handleImage11(e) {
    var reader = new FileReader();
    reader.onload = function (event) {
        $('#uploader3 img').attr('src',event.target.result);
    }
    reader.readAsDataURL(e.target.files[0]);
    
}

var dropbox11;
dropbox11 = document.getElementById("uploader11");
dropbox11.addEventListener("dragenter", dragenter11, false);
dropbox11.addEventListener("dragover", dragover11, false);
dropbox11.addEventListener("drop", drop11, false);

function dragenter11(e) {
  e.stopPropagation();
  e.preventDefault();
}

function dragover11(e) {
  e.stopPropagation();
  e.preventDefault();
}

function drop11(e) {
			document.getElementById("viewer11").style.display = "block";

  e.stopPropagation();
  e.preventDefault();
  //you can check e's properties
  //console.log(e);
  var dt = e.dataTransfer;
  var files = dt.files;
  
  //this code line fires your 'handleImage' function (imageLoader change event)
  imageLoader11.files = files;
}
</script>
<script>
// uploader12

var imageLoader12 = document.getElementById('file_12');
    imageLoader12.addEventListener('change', handleImage12, false);

function handleImage12(e) {
    var reader = new FileReader();
    reader.onload = function (event) {
        $('#uploader3 img').attr('src',event.target.result);
    }
    reader.readAsDataURL(e.target.files[0]);
    
}

var dropbox12;
dropbox12 = document.getElementById("uploader12");
dropbox12.addEventListener("dragenter", dragenter12, false);
dropbox12.addEventListener("dragover", dragover12, false);
dropbox12.addEventListener("drop", drop12, false);

function dragenter12(e) {
  e.stopPropagation();
  e.preventDefault();
}

function dragover12(e) {
  e.stopPropagation();
  e.preventDefault();
}

function drop12(e) {
			document.getElementById("viewer12").style.display = "block";

  e.stopPropagation();
  e.preventDefault();
  //you can check e's properties
  //console.log(e);
  var dt = e.dataTransfer;
  var files = dt.files;
  
  //this code line fires your 'handleImage' function (imageLoader change event)
  imageLoader12.files = files;
}
</script>
<script>
// uploader13

var imageLoader13 = document.getElementById('file_13');
    imageLoader13.addEventListener('change', handleImage13, false);

function handleImage13(e) {
    var reader = new FileReader();
    reader.onload = function (event) {
        $('#uploader3 img').attr('src',event.target.result);
    }
    reader.readAsDataURL(e.target.files[0]);
    
}

var dropbox13;
dropbox13 = document.getElementById("uploader13");
dropbox13.addEventListener("dragenter", dragenter13, false);
dropbox13.addEventListener("dragover", dragover13, false);
dropbox13.addEventListener("drop", drop13, false);

function dragenter13(e) {
  e.stopPropagation();
  e.preventDefault();
}

function dragover13(e) {
  e.stopPropagation();
  e.preventDefault();
}

function drop13(e) {
			document.getElementById("viewer13").style.display = "block";

  e.stopPropagation();
  e.preventDefault();
  //you can check e's properties
  //console.log(e);
  var dt = e.dataTransfer;
  var files = dt.files;
  
  //this code line fires your 'handleImage' function (imageLoader change event)
  imageLoader13.files = files;
}
</script>
<script>
// uploader14

var imageLoader14 = document.getElementById('file_14');
    imageLoader14.addEventListener('change', handleImage3, false);

function handleImage14(e) {
    var reader = new FileReader();
    reader.onload = function (event) {
        $('#uploader3 img').attr('src',event.target.result);
    }
    reader.readAsDataURL(e.target.files[0]);
    
}

var dropbox14;
dropbox14 = document.getElementById("uploader14");
dropbox14.addEventListener("dragenter", dragenter14, false);
dropbox14.addEventListener("dragover", dragover14, false);
dropbox14.addEventListener("drop", drop14, false);

function dragenter14(e) {
  e.stopPropagation();
  e.preventDefault();
}

function dragover14(e) {
  e.stopPropagation();
  e.preventDefault();
}

function drop14(e) {
			document.getElementById("viewer14").style.display = "block";

  e.stopPropagation();
  e.preventDefault();
  //you can check e's properties
  //console.log(e);
  var dt = e.dataTransfer;
  var files = dt.files;
  
  //this code line fires your 'handleImage' function (imageLoader change event)
  imageLoader14.files = files;
}
</script>
<!-- The Modal -->
											<div id="myModal" class="modal">
											  <div class="modeliconbackgroundcolor">
											  <span class="close ">&times;</span>
											 
											  </div>
											  <img class="modal-content north" id="img01">
											  <div id="caption"></div>
										</div>

<script>

	
var modal = document.getElementById('myModal');
var modalImg = document.getElementById("img01");

// Get the image and insert it inside the modal - use its "alt" text as a caption
var viewerimg = document.getElementById('viewer');
var img = document.getElementById('preview1');
viewerimg.onclick = function(){
	if(img.src != "" ) {
    modal.style.display = "block";
	modalImg.src = img.src;
    captionText.innerHTML = img.alt;
	}
}
// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];
// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
    modal.style.display = "none";
}		
</script>
<script>
// for file 2, and image 2
// Get the image and insert it inside the modal - use its "alt" text as a caption
var viewerimg2 = document.getElementById('viewer2');
var img2 = document.getElementById('preview2');
viewerimg2.onclick = function(){
	if(img2.src != "" ) {
    modal.style.display = "block";
	modalImg.src = img2.src;
	}
}
</script>
<script>
// for file 3, and image 3
// Get the image and insert it inside the modal - use its "alt" text as a caption
var viewerimg3 = document.getElementById('viewer3');
var img3 = document.getElementById('preview3');
viewerimg3.onclick = function(){
	if(img3.src != "" ) {
    modal.style.display = "block";
	modalImg.src = img3.src;
	}
}
</script>
<script>
// for file 4, and image 4
// Get the image and insert it inside the modal - use its "alt" text as a caption
var viewerimg4 = document.getElementById('viewer4');
var img4 = document.getElementById('preview4');
viewerimg4.onclick = function(){
	if(img4.src != "" ) {
    modal.style.display = "block";
	modalImg.src = img4.src;
	}
}
</script>
<script>
// for file 5, and image 5
// Get the image and insert it inside the modal - use its "alt" text as a caption
var viewerimg5 = document.getElementById('viewer5');
var img5 = document.getElementById('preview5');
viewerimg5.onclick = function(){
	if(img5.src != "" ) {
    modal.style.display = "block";
	modalImg.src = img5.src;
	}
}
</script>
<script>
// for file 6, and image 6
// Get the image and insert it inside the modal - use its "alt" text as a caption
var viewerimg6 = document.getElementById('viewer6');
var img6 = document.getElementById('preview6');
viewerimg6.onclick = function(){
	if(img6.src != "" ) {
    modal.style.display = "block";
	modalImg.src = img6.src;
	}
}
</script>
<script>
// for file 7, and image 7
// Get the image and insert it inside the modal - use its "alt" text as a caption
var viewerimg7 = document.getElementById('viewer7');
var img7 = document.getElementById('preview7');
viewerimg7.onclick = function(){
	if(img7.src != "" ) {
    modal.style.display = "block";
	modalImg.src = img7.src;
	}
}
</script>
<script>
// for file 8, and image 8
// Get the image and insert it inside the modal - use its "alt" text as a caption
var viewerimg8 = document.getElementById('viewer8');
var img8 = document.getElementById('preview8');
viewerimg8.onclick = function(){
	if(img8.src != "" ) {
    modal.style.display = "block";
	modalImg.src = img8.src;
	}
}
</script>
<script>
// for file 9, and image 9
// Get the image and insert it inside the modal - use its "alt" text as a caption
var viewerimg9 = document.getElementById('viewer9');
var img9 = document.getElementById('preview9');
viewerimg9.onclick = function(){
	if(img9.src != "" ) {
    modal.style.display = "block";
	modalImg.src = img9.src;
	}
}
</script>
<script>
// for file 10, and image 10
// Get the image and insert it inside the modal - use its "alt" text as a caption
var viewerimg10 = document.getElementById('viewer10');
var img10 = document.getElementById('preview10');
viewerimg10.onclick = function(){
	if(img10.src != "" ) {
    modal.style.display = "block";
	modalImg.src = img10.src;
	}
}
</script>
<script>
// for file 11, and image 11
// Get the image and insert it inside the modal - use its "alt" text as a caption
var viewerimg11 = document.getElementById('viewer11');
var img11 = document.getElementById('preview11');
viewerimg11.onclick = function(){
	if(img11.src != "" ) {
    modal.style.display = "block";
	modalImg.src = img11.src;
	}
}
</script>
<script>
// for file 12, and image 12
// Get the image and insert it inside the modal - use its "alt" text as a caption
var viewerimg12 = document.getElementById('viewer12');
var img12 = document.getElementById('preview12');
viewerimg12.onclick = function(){
	if(img12.src != "" ) {
    modal.style.display = "block";
	modalImg.src = img12.src;
	}
}
</script>
<script>
// for file 13, and image 13
// Get the image and insert it inside the modal - use its "alt" text as a caption
var viewerimg13 = document.getElementById('viewer13');
var img13 = document.getElementById('preview13');
viewerimg13.onclick = function(){
	if(img13.src != "" ) {
    modal.style.display = "block";
	modalImg.src = img13.src;
	}
}
</script>
<script>
// for file 14, and image 14
// Get the image and insert it inside the modal - use its "alt" text as a caption
var viewerimg14 = document.getElementById('viewer14');
var img14 = document.getElementById('preview14');
viewerimg14.onclick = function(){
	if(img14.src != "" ) {
    modal.style.display = "block";
	modalImg.src = img14.src;
	}
}
</script>


<style>
<!-- Get the modal css -->
#preview1 , #preview2,#preview3,#preview4,#preview5,#preview6,#preview7,#preview8,#preview9,#preview10,#preview11,#preview12,#preview13,#preview14 {
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
}



/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 50px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.7); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
    margin: auto;
    display: block;
    width: 50%;
    max-width: 500px;
    max-height: 500px;
	
}

/* Caption of Modal Image */
#caption {
    margin: auto;
    display: block;
    width: 550px;
    height: 100px;
    max-width: 700px;
    text-align: center;
    color: #ccc;
    padding: 10px 0;
}

/* Add Animation */
.modal-content, #caption {    
    -webkit-animation-name: zoom;
    -webkit-animation-duration: 0.6s;
    animation-name: zoom;
    animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
    from {-webkit-transform:scale(0)} 
    to {-webkit-transform:scale()}
}

@keyframes zoom {
    from {transform:scale(0)} 
    to {transform:scale()}
}

/* The Close Button */
.close {
    position: absolute;
    top: 15px;
    right: 35px;
    color: white !important;
    font-size: 40px;
    font-weight: bold;
    transition: 0.3s;
	opacity: 5.2 !important;
}

.close:hover,
.close:focus {
    color: white !important;
    text-decoration: none;
    cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
    .modal-content {
        width: 100%;
    }
}
</style>