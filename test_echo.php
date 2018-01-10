<?

if(isset($_POST['xyz']))
{
	echo "ok";
}
 ?>

 <form method="POST">
 	
 	<input type="submit" name="xyz" onclick="hey()">
 </form>

<script>
	function hey()
	{
		alert("ok");
	}
</script>