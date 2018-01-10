<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>




<!-- Horizontal, flat -->






<div class="container vertical rounded">
 
  <? 


 $array_date_score= array("2017-10-13"=>"34","2017-12-20"=>"60","2017-01-14"=>"100","2017-09-17"=>"89");

 foreach ($array_date_score as $date => $score) {

  echo '<div class="progress-bar">
    <div class="progress-track">
      <div class="progress-fill">
        <span>'.$score.'%</span>
      </div>
    </div>
    <div class="col-md-12"><span style="font-size: 12px">'.$date.'</span></div>
  </div>';
  
 }


?>

  
</div>




<style>
  *, *:before, *:after {
  -moz-box-sizing: border-box; -webkit-box-sizing: border-box; box-sizing: border-box;
 }

body {
  background: #999;
}

h2 {
  margin: 0 0 20px 0;
  padding: 0 0 5px 0;
  border-bottom: 1px solid #999;
  font-family: sans-serif;
  font-weight: normal;
  color: #333;
}

.container {
  width: 700px;
  margin: 20px;
  background: #fff;
  padding: 20px;
  overflow: hidden;
  float: left;
}





/* Vertical */

.vertical .progress-bar {
  float: left;
  height: 300px;
  width: 60px;
  margin-right: 25px;
}

.vertical .progress-track {
  position: relative;
  width: 40px;
  height: 100%;
  background: #ebebeb;
  margin-left: 10px;
}

.vertical .progress-fill {
  position: relative;
  background: #825;
  height: 50%;
  width: 40px;
  color: #fff;
  text-align: center;
  font-family: "Lato","Verdana",sans-serif;
  font-size: 12px;
  line-height: 20px;
}

.rounded .progress-track,
.rounded .progress-fill {
  box-shadow: inset 0 0 5px rgba(0,0,0,.2);
  border-radius: 3px;
}
</style>

<script>
  $('.horizontal .progress-fill span').each(function(){
  var percent = $(this).html();
  $(this).parent().css('width', percent);
});


$('.vertical .progress-fill span').each(function(){
  var percent = $(this).html();
  var pTop = 100 - ( percent.slice(0, percent.length - 1) ) + "%";
  $(this).parent().css({
    'height' : percent,
    'top' : pTop
  });
});
</script>