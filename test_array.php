<? 
$a= array(10,0,0,20,30,50,0,0,100,20);

$last= count($a);
for($i=0;$i<count($a);$i++)
{
	 if ($a[$i] != 0){
            $a[$count++] = $a[$i]; 
	 }
	  
}
while ($count <$last)
        $a[$count++] = 0;
print_r($a);
?>