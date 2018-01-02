<?
 include 'connect.php';
?>
<html>
<head>
 <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<link href="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.3/css/bootstrap.min.css"
    rel="stylesheet" type="text/css" />
<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.3/js/bootstrap.min.js"></script>
<link href="http://cdn.rawgit.com/davidstutz/bootstrap-multiselect/master/dist/css/bootstrap-multiselect.css"
    rel="stylesheet" type="text/css" />
<script src="http://cdn.rawgit.com/davidstutz/bootstrap-multiselect/master/dist/js/bootstrap-multiselect.js"
    type="text/javascript"></script>
<script type="text/javascript">
   $(document).ready(function(){
        $('#ref_docs_select').multiselect({
            includeSelectAllOption: true
        });
    });

function edit(id){ 
        
      $("#id").val(id);
      //alert(id); 
      $.ajax({
       type: "POST",
       url:"test4.php",
       data:"id="+id,
       success: function(data){
       //alert(data);
        $("#myModal1").show();
       $("#trip_sheet_div").html(data);
       /*$("#l_div").css('opacity','0.4');
*/

      
       }
      });
     
    }
</script>
</head>
<body>
!-- Trigger the modal with a button -->
<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
       <select multiple="multiple" id="ref_docs_select" name="ref_docs_select">
                 <?
                 $qery=$conn->query("SELECT * FROM tbl_ref_docs");
                 while ( $row = $qery->fetch_object()) {
                  ?>

                  <option value="<?=$row->ref_docs_select;?>"><?=$row->ref_docs_select;?></option>
                  <?
                  }
                 ?>
                 </select>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
	   <button type="button" class="btn btn-info btn-lg" onclick="edit('556')" data-toggle="modal" data-target="#myModal1">edit</button>
     <div id="trip_sheet_div"></div>     
</body>