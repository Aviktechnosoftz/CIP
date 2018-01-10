<?PHP
$user_name = "aviktech_saurabh";
$password = "password1";
$database = "aviktech_appparts";
$server = "localhost";
$db_handle = mysql_connect($server, $user_name, $password);
$db_found = mysql_select_db($database, $db_handle);

$picklocation		= $_POST["picklocation"];
$targetlocation		= $_POST["targetlocation"];
$qty				= $_POST["qty"];
$partid				= $_POST["partid"];


$qtyinDB = "";
$qtyinDB2 = "";

if ($db_found) 
	{
		echo $picklocation; // is main add karni hai 
		echo $targetlocation; //yahn s ayi hai already delet ho gyi hai 
		echo $qty; // itne add karni hai 
		echo $partid; // is ko add karna hai 

		 $data = mysql_query("select qty from partsinfo where stocking_location = '".$picklocation."' and partnumber = '".$partid."'" )
		 or die(mysql_error()); 
		
		 $data2 = mysql_query("select qty from partspendinginfo where stocking_location  = '".$picklocation."' and distributor = '".$targetlocation."' and partnumber = '".$partid."'" )
		 or die(mysql_error()); 

		 $num_rows = mysql_num_rows($data);
 
		 while($info = mysql_fetch_array( $data )) 
		 { 
			  $qtyinDB =  $info['qty'] ;  
		 } 

		 while($info = mysql_fetch_array( $data2 )) 
		 { 
			  $qtyinDB2 =  $info['qty'] ; 
		 } 

		 echo $qtyinDB;
		 echo $qtyinDB2;

		 if (  $qtyinDB2 == $qty)
		 {
				 $deletedata = mysql_query("delete from partspendinginfo where stocking_location  = '".$picklocation."' and distributor = '".$targetlocation."' and partnumber = '".$partid."'" ) or die(mysql_error());
							 
				 $data1 = mysql_query("update partsinfo set qty = '".($qty+$qtyinDB)."' where stocking_location = '".$picklocation."' and partnumber = '".$partid."'" )
				or die(mysql_error()); 

				$num_rows = mysql_num_rows($data);

				if ($num_rows > 0)
				{
					echo "Part moved sucessfully to ".$picklocation. " from ".$targetlocation.".<br/>Now qty of Part id: ".$partid." in this location is ".($qty+$qtyinDB) ;
					$data1 = mysql_query("insert into `transactions` (  `Datetime`, `Partid`, `qty`, `fromlocation`, `tolocation` ) values ( NOW(),  '".$partid."',  '".$qty."',  '".$picklocation."',  '".$targetlocation."')" );
				 }
		 }
		 else
		 {
			 $deletedata = mysql_query("update partspendinginfo set qty = '".($qtyinDB2-$qty)."' where stocking_location  = '".$picklocation."' and distributor = '".$targetlocation."' and partnumber = '".$partid."'" ) or die(mysql_error());
			 
			 $data1 = mysql_query("update partsinfo set qty = '".($qty+$qtyinDB)."' where stocking_location = '".$picklocation."' and partnumber = '".$partid."'" )
			 or die(mysql_error()); 

			 $num_rows = mysql_num_rows($data);

			 if ($num_rows > 0)
			 {
				echo "Part moved sucessfully to ".$picklocation. " from ".$targetlocation.".<br/>Now qty of Part id: ".$partid." in this location is ".($qty+$qtyinDB) ;
				$data1 = mysql_query("insert into `transactions` (  `Datetime`, `Partid`, `qty`, `fromlocation`, `tolocation`,`status` ) values ( NOW(),  '".$partid."',  '".$qty."',  '".$picklocation."',  '".$targetlocation."',1)" );
			 }
		 }


	}
?>


