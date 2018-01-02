
<?
  include 'connect.php';
   $sql_qry="SELECT * FROM tbl_itp_form_heading_header WHERE main_id='".$_POST['main']."'";
   $result1=mysqli_query($conn,$sql_qry);
    if(mysqli_num_rows($result1)>0)
                   {
                     while($row=mysqli_fetch_array($result1))
                     { 
                      //echo $row[0];
                      $xyz=$row[0];
                      $abc=$row[1];
                      //echo $abc;
                      //echo $xyz;
          
                      }
                    }
           $pqr = $xyz.",".$_POST['special_info'];
          
           echo "UPDATE tbl_itp_form_heading_header SET special_info='$pqr', location='".$_POST['location']."',trade_name='".$_POST['trade_name']."',created=now(),updated=now() WHERE main_id='".$_POST['main']."'";
            $query=$conn->query("UPDATE tbl_itp_form_heading_header SET location='".$_POST['location']."', special_info='$pqr',trade_name='".$_POST['trade_name']."',created=now(),updated=now() WHERE main_id='".$_POST['main']."'");
            if ($query) {
                         echo "Data updated Successfully.";
                        }
 
 }
	?>

 
  