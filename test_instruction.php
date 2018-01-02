
<?
session_start();
include_once('connect.php');
$response = file_get_contents("https://cipropertyapp.com/pdf_forms/pdf/site_ns_pdf.php?approved_form=167");
$get_attachment= $conn->query("Select attachments from tbl_instruction where id=167")->fetch_object();
$attachment_array=explode(",",$get_attachment->attachments);


$supported_image = array(    'gif',    'jpg',    'jpeg',    'png');
$doc_array=array();
$pdf_url="https://cipropertyapp.com/pdf_forms/pdf/pdf_download/site_ins_167.pdf";
array_push($doc_array,$pdf_url);
foreach ($attachment_array as $key => $value) {

	
	$ext = strtolower(pathinfo($value, PATHINFO_EXTENSION)); 
	if (!in_array($ext, $supported_image)) 
		{    
			array_push($doc_array,"https://cipropertyapp.com/API/Uploads/".$value);
		} 

	
}

// print_r($doc_array);


    // echo "https://cipropertyapp.com/pdf_forms/pdf/site_ns_pdf.php?approved_form=".$instruction_no->id ."";
     $to= "shashank.r@aviktechnosoft.com";
     $Sub = "New Site Instruction Form Submitted";
      
           

      $msg = "<html> 
            <body>
            Hello HSR / SM, <br/><br/>

          Site Instruction form  is submitted.<br/><br/>


        



          Thanks <br/>
          Team CIP <br/>
          Send from Mobile app <br/>   </body> 
          </html>";
            $subject= $Sub;
            $url = 'http://192.169.226.71/VS/send_instruction.php';
            $data = array('to' => $to, 'msg' => $msg,'pdf_link' =>$doc_array,'number' => "167", 'subject' => $subject);
             $options = array('http' => array(
              'method'  => 'POST',
              'content' => http_build_query($data)
                  ));

                  $context  = stream_context_create($options);
                @$result = file_get_contents($url, false, $context);


// $to= "shashank.r@aviktechnosoft.com";
//      $Sub = "New Site Instruction Form Submitted";
//       $pdf_url="https://cipropertyapp.com/pdf_forms/pdf/pdf_download/site_ins_69.pdf";
           

//       $msg = "<html> 
//             <body>
//             Hello HSR / SM, <br/><br/>

//           Site Instruction form  is submitted.<br/><br/>


        



//           Thanks <br/>
//           Team CIP <br/>
//           Send from Mobile app <br/>   </body> 
//           </html>";
//             $subject= $Sub;
//             $url = 'http://192.169.226.71/VS/send_instruction.php';
//             $data = array('to' => $to, 'msg' => $msg,'pdf_link' =>$pdf_url,'number' => $instruction_no->id, 'subject' => $subject);
//             $options = array('http' => array(
//               'method'  => 'POST',
//               'content' => http_build_query($data)
//                   ));

//                   $context  = stream_context_create($options);
//                 @$result = file_get_contents($url, false, $context);

                ?>
