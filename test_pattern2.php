<? 
$flag=1;
$counter=0;
for($i=1;$i<=4;$i++)
{	
	++$counter;
	for($k=4;$k>=$i;$k--)
		{
			echo "*";
		}
	if($i==2)
	{
		$flag=2;
		$i=3;
	}
	
	for($j=$i;$j>=$flag;$j--)
	{
		
		echo $j;
	}
$flag=1;
	$i=$counter;
	
	echo "<br>";



}



?>