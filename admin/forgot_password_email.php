<?
include_once('connect.php');

 $cur_date= strtotime(date('Y-m-d'));
  $cur_time= strtotime(date('H:i:s'));
  $sum= $cur_date+$cur_time;
  $reference=md5($sum);
$email=$conn->query("Update admin_login SET ref= '".$reference."', modified_date= NOW() where id=1");


 $to= "shashank.r@aviktechnosoft.com,pkoppen@ciproperty.com.au,saurabh@aviktechnosoft.com";
 // $link= "https://cipropertyapp.com/admin/dashboard.php?ref= ".$reference."";
     $Sub = "Password Reset link For the Admin Panel- CIP";
      
           

      $msg = "<html> 
            <body>
            Hello HSR / SM, <br/><br/>

          Password Reset link is Here...<br/><br/>


        
          <a href ='https://cipropertyapp.com/admin/forgot_password.php?ref=".$reference."'><input type=\"button\" value=\"Reset Here\"> </a><br/><br/>


          Thanks <br/>
          Team CIP <br/>
          Send from Mobile app <br/>   </body> 
          </html>";
            $subject= $Sub;
            $url = 'http://192.169.226.71/VS/send_password.php';
            $data = array('to' => $to, 'msg' => $msg, 'subject' => $subject);
             $options = array('http' => array(
              'method'  => 'POST',
              'content' => http_build_query($data)
                  ));

                  $context  = stream_context_create($options);
                @$result = file_get_contents($url, false, $context);




?>