<? 
include("grab/lib/GrabzItClient.class.php");

// This PHP file handles the GrabzIt callback

$message = $_GET["message"];
$customId = $_GET["customid"];
$id = $_GET["id"];
$filename = $_GET["filename"];
$format = $_GET["format"];

// Custom id can be used to store user ids or whatever is needed for the later processing of the
// resulting screenshot

$grabzIt = new GrabzItClient("YjRkYzlmNDBiOGVlNGIzNjhjN2EwZmRiNDFhMmQ2ZTc=", "YWsKBT8/Gz9HPwM/DT8/P14yP2s/Pz8/bXRVPz8/Pz8=");
$result = $grabzIt->GetResult($id);

if (!$result)
{
   return;
}

// Ensure that the application has the correct rights for this directory.
file_put_contents("results" . DIRECTORY_SEPARATOR . $filename, $result);

?>