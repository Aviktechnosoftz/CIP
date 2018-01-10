<? 
for($i=1; $i<=3;$i++)
{
	for($k=1;$k<=$i-1;$k++)
	{
		echo "_";
	}

	for($j=$i;$j<=(2*$i);$j++)
	{
		echo "*";
	}

	echo "<br>";
}

for($i=3; $i>=1;$i--)
{
	
	for($k=$i;$k>=2;$k--)
	{
		echo "_";
	}
		// if($i==1)
		// {
		// 	$i=3;
		// }

	for($j=$i;$j<=($i*2);$j++)
	{
		echo "*";
	}

	echo "<br>";
}





?>