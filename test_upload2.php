<? include('header.php'); ?>
<br>
<br>
<br>
<br>
<br>
<form class="fileinfo" enctype="multipart/form-data" method="post" name="fileinfo">
    <label>File to stash:</label>
    <input type="file" name="file" id="test" required />
</form>
<input  id='uploadBTN' type="button" value="Stash the file!" onclick="test()"></input>
<div id="output"></div>

<script type="text/javascript">
// $(function(){
//     $('#uploadBTN').on('click', function(){ 
//         var fd = new FormData($("#fileinfo"));
//         //fd.append("CustomField", "This is some extra data");
//         console.log(fd);
//         $.ajax({
//             url: 'test_upload_ajax.php',  
//             type: 'POST',
//             data: fd,
//             success:function(data){
//                 $('#output').html(data);
//             },
//             cache: false,
//             contentType: false,
//             processData: false
//         });
//     });
// });
function test()
{
 var formData = new FormData($(".fileinfo")[0]);


                $.each($('input[type=file]'), function(i, file) {
                    //alert(i);
                formData.append(i, $('input[type=file]')[i].files[0]);     
                console.log(formData);
                     }); 

                $.ajax({
            url: 'test_upload_ajax.php',  
            type: 'POST',
            data: formData,
            success:function(data){
                $('#output').html(data);
            },
            cache: false,
            contentType: false,
            processData: false
		   });
}


</script>
