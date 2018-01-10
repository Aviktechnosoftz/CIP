<?
if(isset($_POST) && !empty($_POST))
{
if(!empty($_FILES['attachment']['name'])){
$file_name=$_FILES['attachment']['name'];
$temp_name=$_FILES['attachment']['temp_name'];
$file_type=$_FILES['attachment']['type'];
$base=basename($file_name);
$extension=substr($base,strlen($base)-4,strlen($base));
$allowed_extension=array(".pdf",".png");
if(in_array($extension,$allowed_extension))
{
$from=$_POST['email'];
$to="nishuteotia91@gmail.com";
$subject = "mail";
$message="hii i am nishu";
$rep_to="nishuteotia@rediffmail.com";

$file = $temp_name;
$content=chunk_split(base64_encode($file));
    $uid = md5(time());
	
	//normal header
	 $headers  = "From:".$from."\r\n";
	 $headers  = "Reply to:".$rep_to."\r\n";
	 $headers  .= "MIME-Version: 1.0\r\n";
	 
	 $headers  .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"\r\n\r\n";
	  $headers  .= "MIME-Version: 1.0\r\n";
	  
	  //text
	   $headers .= "Content-Type: text/html; charset=iso-8859-1\r\n";
       $headers .= "Content-Transfer-Encoding: 8bit\r\n";
       $headers .= $message."\r\n\r\n";
	   $headers .= "--".$uid."\n";
//file attachment
    $headers  .= "Content-Type:".file_type." ";
       $headers  .= "name=\"".$file_name."\"r\n";
       $headers  .= "Content-Transfer-Encoding: base64\r\n";
       $headers  .= "Content-Disposition: attachment; ";
       $headers  .= "filename=\"".$file_name."\"\r\n\n";
       $headers  .= "".$file."\r\n";
	   $headers .= "--".$uid."\n";
	   $headers .= $content."\r\n\r\n";
	   //send mail
	   if(mail($to, $subject, $message, $headers));
	   {
	   echo "mail sent";
	   }
	   else
	   {
		echo "mail failed";
		}
}
else
{
echo "file type not allowed";
}
else
{
echo "no file posted";
}
}
exit();
?>