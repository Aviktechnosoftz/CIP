<?
include_once('connect.php');
if ($_FILES["music"]["error"] == UPLOAD_ERR_OK)
{
    // $file = $_FILES["music"]["tmp_name"];
    $image=basename($_FILES['music']['name']);
    $extension = pathinfo($_FILES['music']['name'], PATHINFO_EXTENSION);
	$tmppath="../API/Uploads/"."Environmental_Policy.".$extension;
    // now you have access to the file being uploaded
    //perform the upload operation.
    move_uploaded_file($_FILES['music']['tmp_name'],$tmppath);
     $update_safety=$conn->query("Update tbl_policy set environmental_policy ='Environmental_Policy.".$extension."' where id='1'");

echo "Environmental_Policy.".$extension."";

     // echo "'Environmental_Policy.".$extension."'";
    // echo "Update tbl_policy set environmental_policy = 'Environmental_Policy.".$extension."' where id='1'";
}
?>