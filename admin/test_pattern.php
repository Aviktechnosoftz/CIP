<!--    *<br>
  **<br>
 ***<br>
****<br>
-----------------------<br>
OUTPUT- -->
<? 
for($i=1;$i<=4;$i++)
{
	for ($j=4; $j>$i; $j--) { 
		echo "#";
		}

		for ($k=1; $k<=$i; $k++) { 
			echo "*";
		}

		

	
	echo '<br>';
}

?>