<?PHP
$group	  = $_GET["year"];
$url   = "http://webmobilecloudguru.com/horoscope/yearly_show.php?year_moonsign=virgo&select_year=".$group; 
$parse = json_encode(file_get_contents($url)); 

echo $parse;
// echo json_decode($parse,true);
//$order_id = $result['message'];

//print_r($result); 

?>

