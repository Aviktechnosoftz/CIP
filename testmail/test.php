<?php

//receiver of the email
$to = 'diamondsaurabh@gmail.com';

//subject of the email
$subject = 'Test email with attachment';

$random_hash = md5(date('r', time()));

//define the headers.
$headers = "From: diamondsaurabh@example.comrnReply-To: diamondsaurabh@example.com";

//mime type specification
$headers .= "rnContent-Type: multipart/mixed; boundary="PHP-mixed-".$random_hash.""";

//read the atachment file contents into a string,

//encode the contents with MIME base64,

//and split the contents  into smaller chunks using given below function

$attachments = chunk_split(base64_encode(file_get_contents('attachments.zip')));

//define the body of the message.
ob_start(); //Turn on output buffering

?>

Hello Test!!!
This is simple text email message.

--PHP-alt-<?php echo $random_hash; ?> 
Content-Type: text/html; charset="iso-8859-1"
Content-Transfer-Encoding: 7bit

<h2>Hello World!</h2>
<p>This is something with <b>HTML</b> formatting.</p>

--PHP-alt-<?php echo $random_hash; ?>--

--PHP-mixed-<?php echo $random_hash; ?> 
Content-Type: application/zip; name="attachment.zip" 
Content-Transfer-Encoding: base64 
Content-Disposition: attachment 

<?php echo $attachment; ?>
--PHP-mixed-<?php echo $random_hash; ?>--

<?php

//copy current buffer contents into $message
$message = ob_get_clean();
//send the email
$mail_sent = @mail( $to, $subject, $message, $headers );
//if the message is sent successfully print "Mail sent". Otherwise print "Mail failed"
echo $mail_sent ? "Mail sent" : "Mail failed";
?> 