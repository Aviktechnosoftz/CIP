<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.min.css" />
    <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
             
                   <center><div id="datepicker" ></div>	</center>
   
    <!-- /.modal -->

	<?php $red = array('2017-09-11','2017-09-12','2017-10-13','2017-10-28');
	      $green = array('2017-10-21','2017-10-22','2018-01-23');?>
	<script>
	var red_array = [<?php echo '"'.implode('","', $red).'"' ?>];
	var green_array = [<?php echo '"'.implode('","', $green).'"' ?>];
$('#datepicker').datepicker({
    beforeShowDay: colorize
});
   var greenDates = green_array;
   var redDates =red_array;
   function colorize(date) {
	if($.inArray($.datepicker.formatDate('yy-mm-dd', date ), red_array) > -1)
        {
         return [true, "green"];
        }
    else if($.inArray($.datepicker.formatDate('yy-mm-dd', date ), green_array) > -1)
        {
         return [true, "red"];
        }
        else{
             return [true, ""];
            }
}

</script>
<style>
.btn-default
{
	border-radius: 50%;
	background-color: lightgrey;
	font-size:20px;
	color: grey;
	
}
.blue a.ui-state-default {
    background-color: blue;
    background-image: none;
	color:white;
	 border-radius: 50%;
}
.red  a.ui-state-default{
    background-color: red;
    background-image: none;
	color:white;
	 border-radius: 50%;
}
.green  a.ui-state-default{
    background-color: green;
    background-image: none;
	color:white;
	border-radius: 50%;
}

.ui-datepicker-today a.ui-state-highlight {
	  border-radius: 50%;
    border: 2px solid #AFB74F   ;   
}

.ui-state-default, .ui-widget-content .ui-state-default, .ui-widget-header .ui-state-default {
     border:none;
	background: none;
	font-size: 18px;
	margin:25px 25px ;
}

.ui-datepicker .ui-datepicker-header {
   border:none;
   background:none;
}
.ui-datepicker-month 
{
	color:grey;
}
.ui-datepicker-year 
{
	color:grey;
}
ui-corner-all, .ui-corner-bottom, .ui-corner-right, .ui-corner-br {
  width:50%;
}

.ui-corner-all, .ui-corner-bottom, .ui-corner-left, .ui-corner-bl {
   width:50%;
}


</style>