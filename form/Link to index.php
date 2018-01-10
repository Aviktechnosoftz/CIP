<?php
// error_reporting(0);

if(isset($_REQUEST['submit']))
{ 
// print_r($_FILES);
// print_r($_POST);

// die();
$line = "--------------------------------------------------------------------";
$n_line ="\r\n";
$element_id = $_POST["element_id"];
$f_name = $_POST["element_2_1"];
$l_name = $_POST["element_2_2"];
$dob = "DOB:"." ".$_POST["element_1_1"]."/".$_POST["element_1_2"]."/".$_POST["element_1_3"].$n_line.$line.$n_line;
$s_address = "Address".$n_line."Street Address:"." ".$_POST["element_3_1"].$n_line;
$a_line2 = "Address Line 2:"." ".$_POST["element_3_2"].$n_line;
$a_city = "City:"." ".$_POST["element_3_3"].$n_line;
$a_state = "State/Province/Region:"." ".$_POST["element_3_4"].$n_line;
$a_postal = "Postal/Zip Code:"." ".$_POST["element_3_5"].$n_line;
$a_country = "Country:"." ".$_POST["element_3_6"].$n_line.$line.$n_line;
$b_group = "Blood Group:"." ".$_POST["element_4"].$n_line.$line.$n_line;
$phone = "Phone #:"." ".$_POST["element_6"].$n_line.$line.$n_line;
$e_number = "Emergency Phone#:"." ".$_POST["element_7"].$n_line.$line.$n_line;
$e_f_name = "Emergency Name".$n_line."First:"." ".$_POST["element_8_1"].$n_line;
$e_l_name = "Last:"." ".$_POST["element_8_2"].$n_line.$line.$n_line;

$e_info = "Name".$n_line."First:".$f_name.$n_line."Last:"." ".$l_name.$n_line.$line.$n_line.$dob.$s_address.$a_line2.$a_city.$a_state.$a_postal.$a_country.$b_group.$phone.$e_number.$e_f_name.$e_l_name;
// echo $name;
// die();
// $email = $_POST[’element_2_2’];
// $fp = fopen(”formdata.txt”, “a”);
$filename_save=str_replace("/","_",$element_id);
$image_save = "Employee ID/".$filename_save.".txt";
file_put_contents($image_save, $e_info);
// $savestring = $name;
// fwrite($fp, $savestring);
// fclose($fp);
//echo $image_save;
$get_image = $_FILES["photo"]["name"];
$image_path= 'Employee ID/';  
$target0 = $image_path.$filename_save;
move_uploaded_file($_FILES['photo']['tmp_name'], $target0);

?>

<script>
	alert("Thank You !! Employee ID Card Successfully Created");
	window.location.href="index.php";
</script>

<?php
  
}
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Untitled Form</title>
<link rel="stylesheet" type="text/css" href="view.css" media="all">
<script type="text/javascript" src="view.js"></script>
<script type="text/javascript" src="calendar.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body id="main_body" >
	
	<img id="top" src="top.png" alt="">
	<div id="form_container">
	
		<h1><a>AT</a></h1>
		<form id="form_51488" class="appnitro" enctype="multipart/form-data" method="post" action="" name="registration" onsubmit="return formValidation()">
					<div class="form_description">
			<h2>AT Employee ICard</h2>
		</div>						
			<ul >
			<div class="left">
			<label class="description" for="element_1">Employee ID</label>
			<select class="element select large" id="element_1" name="element_id" onchange="autofill_name($(this).find('option:selected').text())"> 
				<option value="" selected="selected">-- Select --</option>
				<option value="AT/IND/0001" >AT/IND/0001 Saurabh Solanki</option>
				<option value="AT/IND/0003" >AT/IND/0003 Dharmendra Singh</option>
				<option value="AT/IND/0006" >AT/IND/0006 Narendra Kumar Singh Kushwaha</option>
				<option value="AT/IND/00017" >AT/IND/00017 Arti Mishra</option>
				<option value="AT/IND/00023" >AT/IND/00023 Nitin Singhal</option>
				<option value="AT/IND/00025" >AT/IND/00025 Shashank Raghav</option>
				<option value="AT/IND/00026" >AT/IND/00026 Bhavnesh Mehta</option>
				<option value="AT/IND/00028" >AT/IND/00028 Mujeeb Ur Rehman</option>
				<option value="AT/IND/00029" >AT/IND/00029 Himanshu Katiyar</option>
				<option value="AT/IND/00030" >AT/IND/00030 Kuldeep Singh</option>
				<option value="AT/IND/00031" >AT/IND/00031 Om Prakash Maurya</option>
			</select>

		</div> 
					<p style="color:red" id="fdemo"></p>
		
			
			
			
					<li id="li_2" >
		<label class="description" for="element_2">Name </label>
		<span>
			<input id="element_2_1" name= "element_2_1" class="element text" maxlength="255" size="8" readonly value=""/>
			<label>First</label>
		</span>
		<span>
			<input id="element_2_2" name= "element_2_2" class="element text" style="width:150px !important" maxlength="255" size="14" readonly value="" />
			<label>Last</label>
		</span> 
		<span style="color:red;padding-left:10px" id="lastname"> Please Select Your Employee ID </span>
		</li>		<li id="li_1" >
		<label class="description" for="element_1">DOB  </label>
		<span>
			<input id="element_1_1" name="element_1_1" class="element text" size="2" maxlength="2" value="" type="text" readonly> /
			<label for="element_1_1">MM</label>
		</span>
		<span>
			<input id="element_1_2" name="element_1_2" class="element text" size="2" maxlength="2" value="" type="text" readonly> /
			<label for="element_1_2">DD</label>
		</span>
		<span>
	 		<input id="element_1_3" name="element_1_3" class="element text" size="4" maxlength="4" value="" type="text" readonly>
			<label for="element_1_3">YYYY</label>
		</span>
	
		<span id="calendar_1">
			<img id="cal_img_1" class="datepicker" src="calendar.gif" alt="Pick a date.">	<span style="color:red" id="ldemo"></span>
		</span>
		<script type="text/javascript">
			Calendar.setup({
			inputField	 : "element_1_3",
			baseField    : "element_1",
			displayArea  : "calendar_1",
			button		 : "cal_img_1",
			ifFormat	 : "%B %e, %Y",
			onSelect	 : selectDate
			});
		</script>
		 
		</li>		<li id="li_3" >
		<label class="description" for="element_3">Address </label>
		
		<div>
			<input id="element_3_1" name="element_3_1" class="element text large" value="" type="text">
			<label for="element_3_1">Street Address</label>
		</div>
	
		<div>
			<input id="element_3_2" name="element_3_2" class="element text large" value="" type="text">
			<label for="element_3_2">Address Line 2</label>
		</div>
	
		<div class="left">
			<input id="element_3_3" name="element_3_3" class="element text medium" value="" type="text">
			<label for="element_3_3">City</label>
		</div>
	
		<div class="right">
			<input id="element_3_4" name="element_3_4" class="element text medium" value="" type="text">
			<label for="element_3_4">State / Province / Region</label>
		</div>
	
		<div class="left">
			<input id="element_3_5" name="element_3_5" class="element text medium" maxlength="15" value="" type="text">
			<label for="element_3_5">Postal / Zip Code</label>
		</div>
	
		<div class="right">
			<select class="element select medium" id="element_3_6" name="element_3_6"> 
			<option value="" selected="selected"></option>
<option value="Afghanistan" >Afghanistan</option>
<option value="Albania" >Albania</option>
<option value="Algeria" >Algeria</option>
<option value="Andorra" >Andorra</option>
<option value="Antigua and Barbuda" >Antigua and Barbuda</option>
<option value="Argentina" >Argentina</option>
<option value="Armenia" >Armenia</option>
<option value="Australia" >Australia</option>
<option value="Austria" >Austria</option>
<option value="Azerbaijan" >Azerbaijan</option>
<option value="Bahamas" >Bahamas</option>
<option value="Bahrain" >Bahrain</option>
<option value="Bangladesh" >Bangladesh</option>
<option value="Barbados" >Barbados</option>
<option value="Belarus" >Belarus</option>
<option value="Belgium" >Belgium</option>
<option value="Belize" >Belize</option>
<option value="Benin" >Benin</option>
<option value="Bhutan" >Bhutan</option>
<option value="Bolivia" >Bolivia</option>
<option value="Bosnia and Herzegovina" >Bosnia and Herzegovina</option>
<option value="Botswana" >Botswana</option>
<option value="Brazil" >Brazil</option>
<option value="Brunei" >Brunei</option>
<option value="Bulgaria" >Bulgaria</option>
<option value="Burkina Faso" >Burkina Faso</option>
<option value="Burundi" >Burundi</option>
<option value="Cambodia" >Cambodia</option>
<option value="Cameroon" >Cameroon</option>
<option value="Canada" >Canada</option>
<option value="Cape Verde" >Cape Verde</option>
<option value="Central African Republic" >Central African Republic</option>
<option value="Chad" >Chad</option>
<option value="Chile" >Chile</option>
<option value="China" >China</option>
<option value="Colombia" >Colombia</option>
<option value="Comoros" >Comoros</option>
<option value="Congo" >Congo</option>
<option value="Cook Islands and Niue" >Cook Islands and Niue</option>
<option value="Costa Rica" >Costa Rica</option>
<option value="Côte d'Ivoire" >Côte d'Ivoire</option>
<option value="Croatia" >Croatia</option>
<option value="Cuba" >Cuba</option>
<option value="Cyprus" >Cyprus</option>
<option value="Czech Republic" >Czech Republic</option>
<option value="Denmark" >Denmark</option>
<option value="Djibouti" >Djibouti</option>
<option value="Dominica" >Dominica</option>
<option value="Dominican Republic" >Dominican Republic</option>
<option value="East Timor" >East Timor</option>
<option value="Ecuador" >Ecuador</option>
<option value="Egypt" >Egypt</option>
<option value="El Salvador" >El Salvador</option>
<option value="Equatorial Guinea" >Equatorial Guinea</option>
<option value="Eritrea" >Eritrea</option>
<option value="Estonia" >Estonia</option>
<option value="Ethiopia" >Ethiopia</option>
<option value="Fiji" >Fiji</option>
<option value="Finland" >Finland</option>
<option value="France" >France</option>
<option value="Gabon" >Gabon</option>
<option value="Gambia" >Gambia</option>
<option value="Georgia" >Georgia</option>
<option value="Germany" >Germany</option>
<option value="Ghana" >Ghana</option>
<option value="Greece" >Greece</option>
<option value="Grenada" >Grenada</option>
<option value="Guatemala" >Guatemala</option>
<option value="Guinea" >Guinea</option>
<option value="Guinea-Bissau" >Guinea-Bissau</option>
<option value="Guyana" >Guyana</option>
<option value="Haiti" >Haiti</option>
<option value="Honduras" >Honduras</option>
<option value="Hong Kong" >Hong Kong</option>
<option value="Hungary" >Hungary</option>
<option value="Iceland" >Iceland</option>
<option value="India" selected >India</option>
<option value="Indonesia" >Indonesia</option>
<option value="Iran" >Iran</option>
<option value="Iraq" >Iraq</option>
<option value="Ireland" >Ireland</option>
<option value="Israel" >Israel</option>
<option value="Italy" >Italy</option>
<option value="Jamaica" >Jamaica</option>
<option value="Japan" >Japan</option>
<option value="Jordan" >Jordan</option>
<option value="Kazakhstan" >Kazakhstan</option>
<option value="Kenya" >Kenya</option>
<option value="Kiribati" >Kiribati</option>
<option value="North Korea" >North Korea</option>
<option value="South Korea" >South Korea</option>
<option value="Kuwait" >Kuwait</option>
<option value="Kyrgyzstan" >Kyrgyzstan</option>
<option value="Laos" >Laos</option>
<option value="Latvia" >Latvia</option>
<option value="Lebanon" >Lebanon</option>
<option value="Lesotho" >Lesotho</option>
<option value="Liberia" >Liberia</option>
<option value="Libya" >Libya</option>
<option value="Liechtenstein" >Liechtenstein</option>
<option value="Lithuania" >Lithuania</option>
<option value="Luxembourg" >Luxembourg</option>
<option value="Macedonia" >Macedonia</option>
<option value="Madagascar" >Madagascar</option>
<option value="Malawi" >Malawi</option>
<option value="Malaysia" >Malaysia</option>
<option value="Maldives" >Maldives</option>
<option value="Mali" >Mali</option>
<option value="Malta" >Malta</option>
<option value="Marshall Islands" >Marshall Islands</option>
<option value="Mauritania" >Mauritania</option>
<option value="Mauritius" >Mauritius</option>
<option value="Mexico" >Mexico</option>
<option value="Micronesia" >Micronesia</option>
<option value="Moldova" >Moldova</option>
<option value="Monaco" >Monaco</option>
<option value="Mongolia" >Mongolia</option>
<option value="Montenegro" >Montenegro</option>
<option value="Morocco" >Morocco</option>
<option value="Mozambique" >Mozambique</option>
<option value="Myanmar" >Myanmar</option>
<option value="Namibia" >Namibia</option>
<option value="Nauru" >Nauru</option>
<option value="Nepal" >Nepal</option>
<option value="Netherlands" >Netherlands</option>
<option value="New Zealand" >New Zealand</option>
<option value="Nicaragua" >Nicaragua</option>
<option value="Niger" >Niger</option>
<option value="Nigeria" >Nigeria</option>
<option value="Norway" >Norway</option>
<option value="Oman" >Oman</option>
<option value="Pakistan" >Pakistan</option>
<option value="Palau" >Palau</option>
<option value="Panama" >Panama</option>
<option value="Papua New Guinea" >Papua New Guinea</option>
<option value="Paraguay" >Paraguay</option>
<option value="Peru" >Peru</option>
<option value="Philippines" >Philippines</option>
<option value="Poland" >Poland</option>
<option value="Portugal" >Portugal</option>
<option value="Puerto Rico" >Puerto Rico</option>
<option value="Qatar" >Qatar</option>
<option value="Romania" >Romania</option>
<option value="Russia" >Russia</option>
<option value="Rwanda" >Rwanda</option>
<option value="Saint Kitts and Nevis" >Saint Kitts and Nevis</option>
<option value="Saint Lucia" >Saint Lucia</option>
<option value="Saint Vincent and the Grenadines" >Saint Vincent and the Grenadines</option>
<option value="Samoa" >Samoa</option>
<option value="San Marino" >San Marino</option>
<option value="Sao Tome and Principe" >Sao Tome and Principe</option>
<option value="Saudi Arabia" >Saudi Arabia</option>
<option value="Senegal" >Senegal</option>
<option value="Serbia and Montenegro" >Serbia and Montenegro</option>
<option value="Seychelles" >Seychelles</option>
<option value="Sierra Leone" >Sierra Leone</option>
<option value="Singapore" >Singapore</option>
<option value="Slovakia" >Slovakia</option>
<option value="Slovenia" >Slovenia</option>
<option value="Solomon Islands" >Solomon Islands</option>
<option value="Somalia" >Somalia</option>
<option value="South Africa" >South Africa</option>
<option value="Spain" >Spain</option>
<option value="Sri Lanka" >Sri Lanka</option>
<option value="Sudan" >Sudan</option>
<option value="Suriname" >Suriname</option>
<option value="Swaziland" >Swaziland</option>
<option value="Sweden" >Sweden</option>
<option value="Switzerland" >Switzerland</option>
<option value="Syria" >Syria</option>
<option value="Taiwan" >Taiwan</option>
<option value="Tajikistan" >Tajikistan</option>
<option value="Tanzania" >Tanzania</option>
<option value="Thailand" >Thailand</option>
<option value="Togo" >Togo</option>
<option value="Tonga" >Tonga</option>
<option value="Trinidad and Tobago" >Trinidad and Tobago</option>
<option value="Tunisia" >Tunisia</option>
<option value="Turkey" >Turkey</option>
<option value="Turkmenistan" >Turkmenistan</option>
<option value="Tuvalu" >Tuvalu</option>
<option value="Uganda" >Uganda</option>
<option value="Ukraine" >Ukraine</option>
<option value="United Arab Emirates" >United Arab Emirates</option>
<option value="United Kingdom" >United Kingdom</option>
<option value="United States" >United States</option>
<option value="Uruguay" >Uruguay</option>
<option value="Uzbekistan" >Uzbekistan</option>
<option value="Vanuatu" >Vanuatu</option>
<option value="Vatican City" >Vatican City</option>
<option value="Venezuela" >Venezuela</option>
<option value="Vietnam" >Vietnam</option>
<option value="Yemen" >Yemen</option>
<option value="Zambia" >Zambia</option>
<option value="Zimbabwe" >Zimbabwe</option>
	
			</select>
		<label for="element_3_6">Country</label>
	</div> 
			<span id="addressdemo" style="color:red"></span>

		</li>		<li id="li_4" >
		<label class="description" for="element_4">Blood Group  </label>
		<div>
			<input id="element_4" name="element_4" class="element text medium" type="text" maxlength="255" value=""/> 
			<p id="bgroup" style="color:red"></p>
		</div> 
		</li>		<li id="li_5" >
		
		<table><tr><td>
		<label class="description" for="element_5">Your Pic 
		</label>
		<div>
			<input style="width:228px" id="element_5" name="photo"   onchange="loadFile(event)" class="element file" type="file"/> 
		</div> 
		</td>
		<td>
			<div id="image-holder" class="holder"><img src="blank.jpg" name="image" id="output"  style="width:50px;height:50px" ><p id="imagedemo" style="color:red"></p>
			</div>
		</td></tr></table>
		
			
		</li>		<li id="li_6" >
		<label class="description" for="element_6">Phone # </label>
		<div>
		<span style="font-weight:bold"> +91 </span>	<input id="element_6" name="element_6" class="element text medium" style="width:260px" type="text" maxlength="255" value=""/><p id="ndemo" style="color:red"></p> 
		</div> 
		</li>		<li id="li_7" >
		<label class="description" for="element_7">Emergency Phone# </label>
		<div>
		<span style="font-weight:bold"> +91 </span>	<input id="element_7" name="element_7" class="element text medium"  style="width:260px" type="text" maxlength="255" value=""/>
		</div> 
		</li>	
			<p id="e_ndemo" style="color:red"></p> 
		<li id="li_8" >
		<label class="description" for="element_8">Emergency Name </label>
		<span>
			<input id="element_8_1" name= "element_8_1" class="element text" maxlength="255" size="8" value=""/>
			<label>First</label>
		</span>
		<span>
			<input id="element_8_2" name= "element_8_2" class="element text" maxlength="255" size="14" value=""/>
			<label>Last</label>
		</span> 
		</li>
		<p id="e_fdemo" style="color:red"></p>
			
					<li class="buttons">
			    <input type="hidden" name="form_id" value="51488" />
			    
				<input id="saveForm" class="button_text" type="submit" name="submit" value="Submit" />
		</li>
			</ul>
		</form>	
		
	</div>
	<img id="bottom" src="bottom.png" alt="">
	</body>
	<script>
	var loadFile = function(event) {
	  var fileInput = document.getElementById('element_5');
	 
    var filePath = fileInput.value;	
    var allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;
    if(!allowedExtensions.exec(filePath)){
        alert('Please upload file having extensions .jpeg/.jpg/.png only.');
        fileInput.value = '';
        return false;
    }
	else
	{   
    output.src = URL.createObjectURL(event.target.files[0]);
	}
  };
  
  function autofill_name(val)
  {
	  var i;
	  $('option[value=""]').attr("disabled", "disabled");
	 
	  var strArray = val.split(" ");
	 
	  $('#element_2_1').val(strArray[1]);
	  
		var value_edit = strArray.slice(2);
		var check=String(value_edit);
		 //console.log(check);
		var res = check.replace(",", " ");
		var final = res.replace(",", " ");
		  $('#element_2_2').val(final);
		//console.log(typeof(check));
		$('#lastname').hide();
	  
	  
	  
  }
	</script>
	<script>
	function formValidation()  
   {
	   

	
		var ufname = document.registration.element_id;
		var ulname = document.registration.element_1_1;
		var uno    = document.registration.element_6;
		var uemail = document.registration.element_3_1;
		
		var uemail3 = document.registration.element_3_3; 
		var uemail4 = document.registration.element_3_4; 
		var uemail5 = document.registration.element_3_5; 
		var uemail6 = document.registration.element_3_6; 
		
		var bgroup = document.registration.element_4;  
		var e_uno = document.registration.element_7;  
		var e_ufname = document.registration.element_8_1;  
		var uimage = document.registration.image; 

		
			
			userlname_validation(ulname);
		

			uemail_validation(uemail,uemail3,uemail4,uemail5,uemail6);

			
			bgroup_validation(bgroup);
	
			image_validation(uimage);

			userno_validation(uno);
							
			e_userno_validation(e_uno);
			userfname_validation(ufname);
			e_userfname_validation(e_ufname);


									
		if((userlname_validation(ulname)   && uemail_validation(uemail,uemail3,uemail4,uemail5,uemail6) && bgroup_validation(bgroup) && image_validation(uimage) && userno_validation(uno) && e_userno_validation(e_uno) &&  userfname_validation(ufname) && e_userfname_validation(e_ufname)) == true)
		{
			$('#form_51488').submit();
		}

		else
		{
			return false;
		}							



									}




	
	
	
	
function image_validation(uimage)  
	{  
	// var ufname_len = uimage.src;  
		// if (ufname_len != "")  

		var fullPath = uimage.src;
     var filename = fullPath.replace(/^.*[\\\/]/, '');
     // or, try this, 
     // var filename = fullPath.split("/").pop();

    

		// var ufname_len = uimage.src.length;  
		// alert(ufname_len);
		if (filename == "blank.jpg")  
			{  
				document.getElementById("imagedemo").innerHTML="Image should not be empty";
				// uimage.focus();  
				// document.getElementById("element_id").style.borderColor = "red";


				
				return false;  
			}
		else 
			{ 
				document.getElementById("imagedemo").innerHTML=""; 
				return true;  
			} 
	}

	
function userfname_validation(ufname)  
	{  
		var ufname_len = ufname.value.length;  
		if (ufname_len == 0)  
			{
			    
				document.getElementById("fdemo").innerHTML="ID should not be empty";
				ufname.focus();  
				// document.getElementById("element_id").style.borderColor = "red";


				
				return false;  
			}
		else 
			{ 
				document.getElementById("fdemo").innerHTML=""; 
				return true;  
			} 
	}

function userlname_validation(ulname)  
	{  
		var ulname_len = ulname.value.length;  
		if (ulname_len == 0)  
			{  
				document.getElementById("ldemo").innerHTML="DOB should not be empty";
								// document.getElementById("element_1_1").style.borderColor = "red";
								// document.getElementById("element_1_2").style.borderColor = "red";
				// document.getElementById("element_1_3").style.borderColor = "red";

				ulname.focus();  
				return false;  
			}  
		else 
			{
				document.getElementById("ldemo").innerHTML="";
				return true;  
			} 
	}


function uemail_validation(uemail,uemail3,uemail4,uemail5,uemail6)  
	{  
		var ulname_len = uemail.value.length;
		
		var ulname_len3 = uemail3.value.length;  
		var ulname_len4 = uemail4.value.length;  
		var ulname_len5 = uemail5.value.length;  
		var ulname_len6 = uemail6.value.length;  
		if (ulname_len == 0  )  
			{  
				document.getElementById("addressdemo").innerHTML="Address should not be empty";
								// document.getElementById("element_3_1").style.borderColor = "red";
								

				uemail.focus();  
				return false;  
			}
else if  (ulname_len3 == 0  )  
			{  
				document.getElementById("addressdemo").innerHTML="City should not be empty";
								// document.getElementById("element_3_3").style.borderColor = "red";
								

				uemail.focus();  
				return false;  
			} 	
else if  (ulname_len4 == 0  )  
			{  
				document.getElementById("addressdemo").innerHTML="State should not be empty";
								// document.getElementById("element_3_4").style.borderColor = "red";
								

				uemail.focus();  
				return false;  
			} 
else if  (ulname_len5 == 0  )  
			{  
				document.getElementById("addressdemo").innerHTML="Zip Code should not be empty";
								// document.getElementById("element_3_5").style.borderColor = "red";
								

				uemail.focus();  
				return false;  
			}
			
			
			
			else if  (isNaN(uemail5.value))  
			{  
				document.getElementById("addressdemo").innerHTML="Zip Code should contain only numeric value";
								// document.getElementById("element_3_5").style.borderColor = "red";
								

				uemail.focus();  
				return false;  
			}

				else if  (ulname_len5 > 6)  
			{  
				document.getElementById("addressdemo").innerHTML="Zip Code Must Have 6 Digits";
								// document.getElementById("element_3_5").style.borderColor = "red";
								

				uemail.focus();  
				return false;  
			}
			
			
			
			
			
else if  (ulname_len6 == 0  )  
			{  
				document.getElementById("addressdemo").innerHTML="Country should not be empty";
								// document.getElementById("element_3_6").style.borderColor = "red";
								

				uemail.focus();  
				return false;  
			}			
		else 
			{
				document.getElementById("addressdemo").innerHTML="";
				return true;  
			}  
	}
function bgroup_validation(bgroup)  
	{  
		var ulname_len = bgroup.value.length;  
		if (ulname_len == 0 )  
			{  
				document.getElementById("bgroup").innerHTML="Blood Group should not be empty";
								// document.getElementById("element_4").style.borderColor = "red";
								

				bgroup.focus();  
				return false;  
			}  
		else 
			{
				document.getElementById("bgroup").innerHTML="";
				return true;  
			}  
	}

function userno_validation(uno)
	{
		var uno_len = uno.value.length;
		if(uno_len == 0 )
			{
				// alert("Please enter the Contact number.");
				document.getElementById("ndemo").innerHTML="Mobile number should not be empty";
				uno.focus();
				return false;
			}
		else if(isNaN(uno.value))
			{
				// alert("Contact number should contain only digits.");
				document.getElementById("ndemo").innerHTML="Mobile number should contain only digits.";
				uno.focus();
				return false;
			}
		else if (uno_len != 10)
			{
				// alert("Contact number should contain only 10 digits.(Mobile number)");
				document.getElementById("ndemo").innerHTML="Mobile number should contain only 10 digits.";
				uno.focus();
				return false;
			}
		else 
			{
				document.getElementById("ndemo").innerHTML="";
				return true;
			}
	}	 
function e_userno_validation(e_uno)
	{
		// alert("enter");
		var uno_len = e_uno.value.length;
		if(uno_len == 0 )
			{
				// alert("Please enter the Contact number.");
				document.getElementById("e_ndemo").innerHTML="Mobile number should not be empty";
				e_uno.focus();
				return false;
			}
		else if(isNaN(e_uno.value))
			{
				// alert("Contact number should contain only digits.");
				document.getElementById("e_ndemo").innerHTML="Mobile number should contain only digits.";
				e_uno.focus();
				return false;
			}
		else if (uno_len != 10)
			{
				// alert("Contact number should contain only 10 digits.(Mobile number)");
				document.getElementById("e_ndemo").innerHTML="Mobile number should contain only 10 digits.";
				e_uno.focus();
				return false;
			}
		else 
			{
				document.getElementById("e_ndemo").innerHTML="";
				return true;
			}
	}
	
	
	function e_userfname_validation(e_ufname)  
	{  
		var ulname_len = e_ufname.value.length;  
		if (ulname_len == 0 )  
			{  
				document.getElementById("e_fdemo").innerHTML="Emergency First Name should not be empty";
								// document.getElementById("element_4").style.borderColor = "red";
								

				e_ufname.focus();  
				return false;  
			}  
		else 
			{
				document.getElementById("e_fdemo").innerHTML="";
				return true;  
			}  
	}


	</script>
</html>