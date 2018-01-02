<?
 include 'connect.php';

// print_r($_POST);

$get_name=$conn->query("Select * from tbl_assign_checklist where itp_main_id='".$_POST['text1']."' and is_deleted=0");
$arr2=array();
while($row_get_name=mysqli_fetch_assoc($get_name))
{
array_push($arr2, [
      'name' => $row_get_name['checklist_name'],
      'u_id' => $row_get_name['uuid']
      
    ]);
}
$someJSON = json_encode($arr2);
  echo $someJSON;

// while($arr= mysqli_fetch_assoc($result))
// {

// 	 array_push($arr2, [
//       'name' => $arr['company_name']

      
//     ]);
//   }

//   // Convert the Array to a JSON String and echo it
//   $someJSON = json_encode($arr2);
//   echo $someJSON;

 ?>