<link href="assets/css/bootstrap.min.css" rel="stylesheet" />
<link rel="stylesheet" href="tags_bootstrap/src/bootstrap-tagsinput.css" />

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="tags_bootstrap/src/bootstrap-tagsinput.js"></script>
<input type="text" id="category" />
<input type="text" id="category2" data-role="tagsinput" />



<script>
$('#category').on('input', function() 
{  		//alert(this.value);
//$('#category2').closest('div').children('input').val(this.value);
$( "div.bootstrap-tagsinput > input" ).val(this.value);


      //alert($('#category2').closest('div').children('input').val()); 
});

$("#category").on('focusout',function () {
   $("div.bootstrap-tagsinput > input").focusout();
   $('#category').val('');
});

$('#category').keypress(function (e) {
 var key = e.which;
 if(key == 13)  // the enter key code
  {
      $("div.bootstrap-tagsinput > input").focusout();
      $('#category').val('');
    return false;  
  }
});

</script>