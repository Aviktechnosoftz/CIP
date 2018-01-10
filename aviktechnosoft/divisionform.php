<table width="500" border="0" align="center" cellpadding="3" cellspacing="1">
<tr>
<td><strong>Add Division info</strong></td>
</tr>
</table>
<table width="500" border="0" align="center" cellpadding="0" cellspacing="1">
<tr>
<td><form name="form1" method="POST" action="division.php">
<table width="100%" border="0" cellspacing="1" cellpadding="3">
<tr>
<td width="40%">Division Name</td>
<td width="2%">:</td>
<td width="58%"><input name="did" type="text" id="subject" size="50"></td>
</tr>
<tr>
<td>Region Id</td>
<td>:</td>
<td>

<?PHP
$user_name = "aviktech_saurabh";
$password = "password1";
$database = "aviktech_demo";
$server = "localhost";
$db_handle = mysql_connect($server, $user_name, $password);
$db_found = mysql_select_db($database, $db_handle);
$options=""; 


	if ($db_found) 
	{
		$SQL = "select regionID from region";
		$result = mysql_query($SQL);
	    echo "<select name=\"rid\">";
		while( ( $resultrow = mysql_fetch_assoc( $result ) ) !== false )
		{
			$value = $resultrow['regionID'];
			echo  "<OPTION VALUE=".$value.">".$value."</OPTION>"; 
		}
		echo "</select>";
		mysql_close($db_handle);
	}
		
	else 
	{
		print "Database NOT Found ";
		mysql_close($db_handle);
	}
?>
</td>
</tr>
<tr>
<td>Name</td>
<td>:</td>
<td><input name="name" type="text" id="name" size="50"></td>
</tr>
 <td>&nbsp;</td>
<td>&nbsp;</td>
<td><input type="submit" name="Submit" value="Submit"> 
<input type="reset" name="Submit2" value="Reset">
<a href ="index.php"><button type="button" >Home</button></a></td>
</tr>
</table>
</form>
</td>
</tr>
</table>