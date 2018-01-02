               <button type="submit" form="QueryForm" onclick="return loadQueryResults();">Submit Query</button>
			   <div id="DisplayDiv"></div>
<script>
			   function loadQueryResults() {
	// alert("done");
    $('#DisplayDiv').load('site_ns_pdf.php');
    return false;
}
</script>