<?PHP
$group	  = $_GET["sign"];
$url = "http://api.wapshared.net/horoscope.php?sign=".$group; 
$parse = file_get_contents($url); 
//$result = json_decode($parse); 
echo $parse;
//$order_id = $result['message'];

//print_r($result); 

?>

