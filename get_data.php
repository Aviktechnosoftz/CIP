<?php
include_once('connect.php');

// print_r($_POST);
// die();
// echo "select * from tbl_graph where Month(month)= '".$_POST['s_data']."'";
// die();
$query1= "select * from tbl_graph where Month(month)= '".$_POST['s_data']."'";
				$result1=mysqli_query($conn,$query1);
				$numOfRows1=mysqli_num_rows($result1);
				$a = array();
				$b= array();
				$a = 0;
				$b = 0;
				if($numOfRows1 == 0)	
				{
				// print"no Data has been found !";
				
				
				}
				else
				{
				
				// $c = "";
				     while ($row1=mysqli_fetch_array($result1))
						{
		

							$a .=$row1['avg_day'].',';
							$b .=$row1['notice_issued'].',';
						}		
				$a = rtrim($a,',');
				$b = rtrim($b,',');
				
						// $c = $a.'+'.$b;
				}
				
				$query2= "select * from tbl_graph where Month(month)= '".$_POST['m_data']."'";
				$result2=mysqli_query($conn,$query2);
				$numOfRows2=mysqli_num_rows($result2);
				$aa = array();
				$bb= array();
				$aa = 0;
				$bb = 0;
				if($numOfRows2 == 0)	
				{
				// print"no Data has been found !";
				
				
				}
				else
				{
				
				     while ($row2=mysqli_fetch_array($result2))
						{
		

							$aa .=$row2['avg_day'].',';
							$bb .=$row2['notice_issued'].',';
						}		
				$aa = rtrim($aa,',');
				$bb = rtrim($bb,',');
				
						// echo $a.'+'.$b;
				}
				
				$query3= "select * from tbl_graph where Month(month)= '".$_POST['e_data']."'";
				$result3=mysqli_query($conn,$query3);
				$numOfRows3=mysqli_num_rows($result3);
				$aaa = array();
				$bbb = array();
				$aaa = 0;
				$bbb = 0;
				if($numOfRows3 == 0)	
				{
				// print"no Data has been found !";
				
				
				}
				else
				{
				
				     while ($row3=mysqli_fetch_array($result3))
						{
		

							$aaa .=$row3['avg_day'].',';
							$bbb .=$row3['notice_issued'].',';
						}		
				$aaa = rtrim($aaa,',');
				$bbb = rtrim($bbb,',');
				
						
				}
				if ($numOfRows1 != 0 OR $numOfRows2 != 0 OR $numOfRows3 != 0) {echo $a.'+'.$b.'+'.$aa.'+'.$bb.'+'.$aaa.'+'.$bbb;}
				if ($numOfRows1 == 0 AND $numOfRows2 == 0 AND $numOfRows3 == 0) {}
?>