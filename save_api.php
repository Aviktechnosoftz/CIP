
<? 
$s = array();
foreach ($_POST['comment'] as $k => $v) {
  
    
      array_push($s,$v);
    
  }
$date= date("Y-m-d h:i:sa");
$data= $_SERVER['REMOTE_ADDR']."-".$date.": ".implode(', ', $s);
// echo $data;


$name= date('Y-m-d').".txt";

if (file_exists($name)) {

    // echo "The file $filename exists";
    $content = PHP_EOL.$data;

$fp = fopen($_SERVER['DOCUMENT_ROOT'] . "/site_admin/$name","a");
fwrite($fp,$content);
fclose($fp);


} else {
    // echo "The file $filename does not exist";
    $content = $data;

$fp = fopen($_SERVER['DOCUMENT_ROOT'] . "/site_admin/$name","wb");
fwrite($fp,$content);
fclose($fp);
}

?>