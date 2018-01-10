<?PHP
$rid =$_POST["rid"]; 
$name=$_POST["name"];
$user_name = "aviktech_saurabh";
$password = "password1";
$database = "aviktech_demo";
$server = "localhost";
$db_handle = mysql_connect($server, $user_name, $password);
$db_found = mysql_select_db($database, $db_handle);

	if ($rid == null || $name ==null )
	{
		echo "Please fill all entry";
	}
	else if ($db_found) 
	{
		$SQL = "insert into `aviktech_demo`.`region` ( `regionID`, `accountID`, `name` ) values (  '".$rid."', ''wastepro'', '".$name."')";
		echo $SQL ;
		$result = mysql_query($SQL);
		mysql_close($db_handle);
		print "Records added to the database";
	}
		
	else 
	{
		print "Database NOT Found ";
		mysql_close($db_handle);
	}

?>

	<a href ="index.php"><button type="button" >Home</button>