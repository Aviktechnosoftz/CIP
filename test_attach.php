<?php

error_reporting(-1);
ini_set('display_errors', 'On');
set_error_handler("var_dump");
  // mail_attachment("shashank.r@aviktechnosoft.com","Subject","Here is the body",array("file1.pdf","file2.pdf"));
  // function mail_attachment($to, $subject, $message, $files) {
  //     $headers = "From: no-reply@mail.com";
  //     $semi_rand = md5(time()); 
  //     $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x"; 
  //     $headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\""; 

  //     $message = "This is a multi-part message in MIME format.\n\n" . "--{$mime_boundary}\n" . "Content-Type: text/html; charset=\"iso-8859-1\"\n" . "Content-Transfer-Encoding: 7bit\n\n" . $message . "\n\n"; 
  //     $message .= "--{$mime_boundary}\n";

  //     foreach ($files as $file) {

  //       $filename = end(explode("/",$file));  
  //       $data = file_get_contents($file);

  //       $data = chunk_split(base64_encode($data));

  //       $message .= "Content-Type: {\"application/octet-stream\"};\n" . " name=\"$file\"\n" .
  //         "Content-Disposition: attachment;\n" . " filename=\"$file\"\n" .
  //         "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n";
  //       $message .= "--{$mime_boundary}\n";
  //     }
  //       echo (@mail($to, $subject, $message, $headers)) ? "<p>Send to $to!</p>" : "<p>Not send toaar $to!</p>"; 
  // } // mail-attachment


if(mail("shashank.r@aviktechnosoft.com", "ok", "ok", "done"))
{
  echo "ok";
}
else
{
  echo "baby";
}
?>