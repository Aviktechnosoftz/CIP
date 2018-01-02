<?


// include("grab/lib/GrabzItClient.class.php");

// // Create the GrabzItClient class
// // Replace "APPLICATION KEY", "APPLICATION SECRET" with the values from your account!
// $grabzIt = new GrabzItClient("YjRkYzlmNDBiOGVlNGIzNjhjN2EwZmRiNDFhMmQ2ZTc=", "YWsKBT8/Gz9HPwM/DT8/P14yP2s/Pz8/bXRVPz8/Pz8=");

// $grabzIt->URLToPDF("http://www.google.com");

// $grabzIt->Save("http://www.google.com/handler.php");


// $filepath = "grab/result.pdf";
// $grabzIt->SaveTo($filepath);


// echo 'https://cipropertyapp.com/site_instruction_approved_form.php?approved_form=50&&flag=1';
$apikey = '3f0aa45f-a4b1-42f2-b2bb-099593ef016e';
$value = 'https://cipropertyapp.com/site_instruction_approved_form.php?approved_form=50&&flag=1'; // a url starting with http or an HTML string.  see example #5 if you have a long HTML string
$result = file_get_contents("http://api.html2pdfrocket.com/pdf?apikey=" . urlencode($apikey) . "&approved_form=50&admin=1");
file_put_contents('grab/mypdf2.pdf',$result);
// echo "http://api.html2pdfrocket.com/pdf?apikey=" . urlencode($apikey) . "&value=".$value;

// $_SESSION['admin'] = "1";
// $_SESSION['induction'] = "1";
// $_SESSION['pin'] = "1111";
// $_SESSION['project_name']= "Newcold-Truganina";




?>