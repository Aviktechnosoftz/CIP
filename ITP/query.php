<?
  include 'connect.php';

  $res=$conn->query("SELECT * FROM tbl_itp_form_heading_header WHERE main_id='".$_POST['main']."'")->fetch_object();
$xyz=$_POST['special_info'];
  

   $query=$conn->query("UPDATE tbl_itp_form_heading_header SET location='".$_POST['location']."', special_info='".$_POST['special_info']."',trade_name='".$_POST['trade_name']."',trade_name='".$_POST['trade_name']."',updated=now() WHERE main_id='".$_POST['main']."'");


  
   
    /*if($res->special_info != "") {        
    // $res=$conn->query("SELECT * FROM tbl_itp_form_heading_header WHERE main_id='".$_POST['main']."'")->fetch_object();
            $xyz=$_POST['special_info'];

          
           echo "UPDATE tbl_itp_form_heading_header SET location='".$_POST['location']."', special_info='".$xyz."',trade_name='".$_POST['trade_name']."',updated=now() WHERE main_id='".$_POST['main']."'";
           $query=$conn->query("UPDATE tbl_itp_form_heading_header SET location='".$_POST['location']."', special_info='".$xyz."',trade_name='".$_POST['trade_name']."',trade_name='".$_POST['trade_name']."',updated=now() WHERE main_id='".$_POST['main']."'");*/

           if($query){
      echo "data updated successfully";
    }
 

  
 
	
           
        
      

	

 
  
		
?>