
<? 
$conn = new mysqli("localhost","root","","test");

$name= 'test_'.date('Y-m-d').".txt";
$data = $_POST["json"];
$myfile = file_put_contents($name, $data.PHP_EOL , FILE_APPEND | LOCK_EX);




// $data = '{
//  "deviceimei": "Sam",
//  "data_beacons": [{
//   "id": "0",
//   "uuid": "fda50693-a4e2-4fb1-afcf-c6eb07647825",
//   "rssi": "-69"
//  }, {
//   "id": "0",
//   "uuid": "2f234454-f491-1ba9-ffa6-000000000001",
//   "rssi": "-53"
//  }, {
//   "id": "0",
//   "uuid": "b9407f30-f5f8-466e-aff9-25556b57fe6d",
//   "rssi": "-75"
//  }, {
//   "id": "0",
//   "uuid": "2f234454-cf6d-4a0f-adf2-f4911ba9ffa6",
//   "rssi": "-60"
//  }, {
//   "id": "0",
//   "uuid": "00000000-0000-0000-0000-000000000000",
//   "rssi": "-88"
//  }]
// }';


$exjson = json_decode($data);
 $deviceimei=$exjson->deviceimei;
foreach ($exjson->data_beacons as $value) {

  $insert_beacon= $conn->query("insert into tbl_beacons set 
                    beacon_id = '".$value->id."',
                    imei   ='".$deviceimei."',
                    beacon_rssi='".$value->rssi."',
                     beacon_uuid='".$value->uuid."',
                    
                    date_time=NOW()");

  

}


if($insert_beacon)
{
  echo "{\"response\":\"200\",\"data\":\"Beacon Data Inserted \"}";
}
else
{
  echo "{\"response\":\"201\",\"data\":\"Technical Error \"}";
}
?>