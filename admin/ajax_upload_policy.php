<?
if ($_FILES["music"]["error"] == UPLOAD_ERR_OK)
{
    // $file = $_FILES["music"]["tmp_name"];
    $image=basename($_FILES['music']['name']);
    $extension = pathinfo($_FILES['music']['name'], PATHINFO_EXTENSION);
	$tmppath="../API/"."Safety_Policy.".$extension;
    // now you have access to the file being uploaded
    //perform the upload operation.
    move_uploaded_file($_FILES['music']['tmp_name'],$tmppath);
}
?>