
<?
error_reporting(0);
function table($val,$counter)
{
	if($counter<=10)
	echo $val*$counter."<br>";
	table($val,++$counter);
}
$val=5;
$counter=1;
table($val,$counter);

?>