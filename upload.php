<?php 
include_once('connect.php');

if ( isset($_POST["image"]) && !empty($_POST["image"]) )
{
	
$project_id= $_POST['project_id'];
$imagename= $_POST['imagename'];
$data = $_POST['image'];

$uri =  substr($data,strpos($data,",")+1);

$file = $imagename . '.png';

 $image_insert = $conn->query("INSERT INTO tbl_intenal_traffic_map (project_id,image_name,created_date, modified_date,is_submitted,is_deleted) "."VALUES('$project_id','$imagename',now(),now(),null,null)");
					
         
 if(! $image_insert ) {
               die('Could not enter data: ' . mysql_error());
            }
         
			   
file_put_contents(__DIR__ .'/API/'.$file, base64_decode($uri));
 
// return the filename
echo $file;

}