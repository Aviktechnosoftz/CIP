 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!--    <script src="assets/js/jquery-ui.min.js"></script> -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- <link href="assets/css/jquery-ui.min.css" rel="stylesheet" /> -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>
    
  
    
      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css">
    
  

<div class="form-group">
    <label>First check in:</label>
    <input type="text" class="form-control form-control-1 input-sm from2" placeholder="CheckIn" >
</div>

<div class="form-group">
<label>First check out:</label>
<input type="text" class="form-control form-control-2 input-sm to" placeholder="CheckOut">
</div>
    
    <br/>
    
 <div class="form-group">
    <label>Second check in:</label>
    <input type="text" class="form-control form-control-1 input-sm from2" placeholder="CheckIn" >
</div>

<div class="form-group">
<label>Second check out:</label>
<input type="text" class="form-control form-control-2 input-sm to" placeholder="CheckOut">
</div>


<script type="text/javascript">
	var startDate = new Date();
var fechaFin = new Date();
var FromEndDate = new Date();
var ToEndDate = new Date();




$('.from2').datepicker({
    autoclose: true,
    minViewMode: 1,
    format: 'mm/yyyy'
}).on('changeDate', function(selected){
        startDate = new Date(selected.date.valueOf());
        startDate.setDate(startDate.getDate(new Date(selected.date.valueOf())));
        $('.to').datepicker('setStartDate', startDate);
    }); 

$('.to').datepicker({
    autoclose: true,
    minViewMode: 1,
    format: 'mm/yyyy'
}).on('changeDate', function(selected){
        FromEndDate = new Date(selected.date.valueOf());
        FromEndDate.setDate(FromEndDate.getDate(new Date(selected.date.valueOf())));
        $('.from2').datepicker('setEndDate', FromEndDate);
    });




</script>