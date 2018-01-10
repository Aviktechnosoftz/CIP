<?php
//error_reporting(1);
// include('site_safety.php');
//error_reporting(0);
session_start();
include_once('connect.php');


if(!isset($_SESSION['admin']))
{
  header("location:logout.php");
}
else
{
  $user= $_SESSION['admin'];
}
// print_r($_SESSION);
$project_name_query=$conn->query("select tbl_project.id as project_id,project_name as name,number from tbl_project_register left join tbl_project on tbl_project_register.project_id = tbl_project.id where tbl_project.id='".$_SESSION['admin']."'  group by project_id")->fetch_object();

$get_project_details=$conn->query("select * from tbl_project_detail where project_id='".$_SESSION['admin']."'")->fetch_object();
$get_main_maps=$conn->query("select * from tbl_maps where project_id='".$_SESSION['admin']."'");
$get_main_maps_baclground=$conn->query("select * from tbl_maps where project_id='".$_SESSION['admin']."' and is_activated='1'")->fetch_object();
// print_r($_SESSION);
// $home=true;



$Map_ID=$conn->query("select MAX(id)+1 as map_id from tbl_intenal_traffic_map where project_id='".$_SESSION['admin']."'")->fetch_object(); 

$map=$Map_ID->map_id;

if($map === NULL) {$map='1' ;}



?>

<!DOCTYPE html>
<html>
<header>
  <link rel="shortcut icon" type="image/x-icon" href="image/favicon.ico"/>


  <link rel="stylesheet" href="css/bootstrap.min.css">
     <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
 <!--    <script type="text/javascript" src="js/upload.js" ></script> -->
  <link rel="stylesheet" href="css/sidebar.css">
  <link rel="stylesheet" href="index_files/mbcsmbmcp.css" type="text/css" />
 <link rel="stylesheet" href="css/font-awesome.min.css">
<!--  <link rel="stylesheet" href="js/jquery.mobile-1.4.5.min.css">
<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="js/jquery.mobile-1.4.5.min.js"></script> -->

 <meta name="viewport" content="width=device-width,height=device-height,initial-scale=1.0" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/1.7.22/fabric.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
<script type="text/javascript" src="https://fastcdn.org/FileSaver.js/1.1.20151003/FileSaver.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/javascript-canvas-to-blob/3.14.0/js/canvas-to-blob.min.js"></script>

</header>


<body>
    



<div class="logo" onclick="redirect()"></div>
<script>
  function redirect()
  {
    window.location.href="header_home.php";
  }
</script>
 

<div class="nav_wrap" style=" background-color:#DF5430;">

<? include('header.php'); ?>
  <? //include('test_side_new.php');?>
</div>
 <div class="" style="padding-left: 0 !important;">
   
  </div>
 <div class="" style="height: 100%;
    margin-left: 28.5%;
    width: 71.5%;
    position: absolute;
    top: 16vh;
    background-color: #F2F2F6;"> 
<div class=" col-md-12 col-sm-12 canvasbackground" style="padding-right: 0px; padding-left: 0px">
<div class="container-fluid" id="canvas-container" style="padding-left: 0 !important;background-color: #F2F2F6;padding: 0px;">
<!-- <div class="col-md-12 col-sm-12 col-xs-12" > -->  
  <!-- <div class="col-xs-1 col-md-1 col-lg-1 col-sm-1 no-padding image_outerleftdiv"  id="images">
    <div class="col-sm-12 col-md-12 no-padding"><img class="image_canvas" draggable="true" src="map_images/safety_helmet.png"   crossOrigin="Anonymous"></div>
    <div class="col-sm-12 col-md-12 no-padding" ><img class="image_canvas" draggable="true" src="map_images/safety_footwear.png"   crossOrigin="Anonymous"></div>
    <div class="col-sm-12 col-md-12 no-padding"><img class="image_canvas" draggable="true" src="map_images/cloths.png"   crossOrigin="Anonymous"></div>
    <div class="col-sm-12 col-md-12 no-padding"><img class="image_canvas" draggable="true" src="map_images/danger.png"   crossOrigin="Anonymous"></div>
    <div class="col-sm-12 col-md-12 no-padding"><img class="image_canvas" draggable="true" src="map_images/flash_light.png"   crossOrigin="Anonymous"></div>
    <div class="col-sm-12 col-md-12 no-padding"><img class="image_canvas" draggable="true" src="map_images/speed_limit.png"   crossOrigin="Anonymous"></div>
    <div class="col-sm-12 col-md-12 no-padding"><img class="image_canvas" draggable="true" src="map_images/pedestrains.png"   crossOrigin="Anonymous"></div>
    <div class="col-sm-12 col-md-12 no-padding"><img class="image_canvas" draggable="true" src="map_images/caution_vehicle.png"   crossOrigin="Anonymous"></div>
    <div class="col-sm-12 col-md-12 no-padding"><img class="image_canvas" draggable="true" src="map_images/speed_limit.png"   crossOrigin="Anonymous"></div>
    <div class="col-sm-12 col-md-12 no-padding"><img class="image_canvas" draggable="true" src="map_images/give_way.png"   crossOrigin="Anonymous"></div>
</div>  -->

      <div class="col-xs-1 col-md-1 col-lg-1 col-sm-1 no-padding image_outerleftdiv" id="images">
            <div class="carousel thin" id="c_test2" style="height: 300px;">
                <a class="prev"><span class="glyphicon glyphicon-chevron-up"></span></a>
                <div class="window">
                    <ul class="clr">     
                        <li class="item">
                          <img class="image_canvas" draggable="true" src="map_images/cloths.png"   crossOrigin="Anonymous">
                        </li>
                        <li class="item">
                            <img class="image_canvas" draggable="true" src="map_images/cloths.png"   crossOrigin="Anonymous">
                        </li>
                        <li class="item">
                            <img class="image_canvas" draggable="true" src="map_images/cloths.png"   crossOrigin="Anonymous">
                        </li>
                        
                        <li class="item">
                            <img class="image_canvas" draggable="true" src="map_images/cloths.png"   crossOrigin="Anonymous">
                        </li>
                         <li class="item">
                          <img class="image_canvas" draggable="true" src="map_images/cloths.png"   crossOrigin="Anonymous">
                        </li>
                        <li class="item">
                            <img class="image_canvas" draggable="true" src="map_images/cloths.png"   crossOrigin="Anonymous">
                        </li>
                        <li class="item">
                            <img class="image_canvas" draggable="true" src="map_images/cloths.png"   crossOrigin="Anonymous">
                        </li>
                        
                        <li class="item">
                            <img class="image_canvas" draggable="true" src="map_images/cloths.png"   crossOrigin="Anonymous">
                        </li>
                        
                       
                        
                    </ul>
                </div> <!-- .window -->
                <a class="next"><span class="glyphicon glyphicon-chevron-down"></span></a>
            </div> <!-- .carousel -->
        </div>



  <div class="col-xs-9 col-md-9 col-lg-9 col-sm-9" style="background-color: #F2F2F6; height: 100%;padding: 0px;">
<!-- <iframe id="iframe_a" src="https://docs.google.com/gview?url=http://cipropertyapp.com/API/Uploads/Internal_plan.pdf&embedded=true" style="height: 81vh;
    width: 75%;" frameborder="0"></iframe> -->
  
   <!--  <iframe src=""></iframe>     -->
  <canvas id="canvas" >
      
    </canvas>  
   </div>
   <div class="col-xs-1 col-md-1 col-lg-1 col-sm-1 no-padding image_outerrightdiv"  id="images" >
        <div class="carousel thin" id="c_test" style="height: 300px;">
                <a class="prev"><span class="glyphicon glyphicon-chevron-up"></span></a>
                <div class="window">
                    <ul class="clr">     
                        <li class="item">
                          <img class="image_canvas" draggable="true" src="map_images/cloths.png"   crossOrigin="Anonymous">
                        </li>
                        <li class="item">
                            <img class="image_canvas" draggable="true" src="map_images/cloths.png"   crossOrigin="Anonymous">
                        </li>
                        <li class="item">
                            <img class="image_canvas" draggable="true" src="map_images/cloths.png"   crossOrigin="Anonymous">
                        </li>
                        
                        <li class="item">
                            <img class="image_canvas" draggable="true" src="map_images/cloths.png"   crossOrigin="Anonymous">
                        </li>
                         <li class="item">
                          <img class="image_canvas" draggable="true" src="map_images/cloths.png"   crossOrigin="Anonymous">
                        </li>
                        <li class="item">
                            <img class="image_canvas" draggable="true" src="map_images/cloths.png"   crossOrigin="Anonymous">
                        </li>
                        <li class="item">
                            <img class="image_canvas" draggable="true" src="map_images/cloths.png"   crossOrigin="Anonymous">
                        </li>
                        
                        <li class="item">
                            <img class="image_canvas" draggable="true" src="map_images/cloths.png"   crossOrigin="Anonymous">
                        </li>
                        
                       
                        
                    </ul>
                </div> <!-- .window -->
                <a class="next"><span class="glyphicon glyphicon-chevron-down"></span></a>
            </div> <!-- .carousel -->
</div>
  
  </div>
<div class="col-sm-12 col-md-12" id="images" style="height: 21%; margin-top: 8px;margin-bottom: 8px;box-shadow: 0 0 5px 1px black;
    border: 5px solid transparent;background-color: #F2F2F6;">
    <div class="col-xs-8 col-md-8 col-lg-8 col-sm-8" style="background-color: #F2F2F6;padding:0px;">
    <ul class="list-unstyled" style="margin-top:10px;padding:0px;">
      <div class="col-md-12 col-sm-12" style="">
     
      <div class="col-md-3 col-sm-3" style="">
          <button id="drawing-mode" class="btn btn-info drawing_btn ">Free Draw</button>&nbsp;
      </div>
      <div class="col-md-3 col-sm-3">
           <button id="other_btn" class="btn btn-info" >Lines Draw</button>
      </div>
<div class="col-md-3 col-sm-3">
         <button class="btn btn-primary button_cls" data-toggle="modal" data-target=".bd-example">Large modal</button>
</div>
<div class="col-sm-3 col-md-3" style="float: right;"><button class=" btn btn-info" id="b" type="button" style="background-color:#5bc0de !important;outline: none;border: none;" onclick="">Save as Image</button></div>
</div>

          <div class="col-md-8" style="display: none;float: left;" id="drawing-mode-options">
            <label for="drawing-mode-selector" style="padding: 0px;">Mode:</label>
            <select id="drawing-mode-selector" style="color: rgb(0, 0, 0);background-color: rgb(228, 228, 228);margin-left: 10px;width: 70%;border-radius: 2vh;outline: none; text-align-last: center;">
              <option>Pencil</option>
              <option>Circle</option>
              <option>Spray</option>
              <option>Pattern</option>

              <option>hline</option>
              <option>vline</option>
              <option>square</option>
              <option>diamond</option>
              <option>texture</option>
            </select><br>
            <label for="drawing-line-width" style="padding: 0px;">Line width:</label><input type="range" value="30" min="0" max="150" id="drawing-line-width">
            <br>
            <label for="drawing-color" style="padding: 0px;">Line color:</label>
            <input type="color" value="#005E7A" id="drawing-color"><br>
            <label for="drawing-shadow-width" style="padding: 0px;">Line shadow width:</label>
            <input type="range" value="0" min="0" max="50" id="drawing-shadow-width"><br>
            

 
          </div>
          <div id="other" style="display: none;">
           <div class="col-md-8 col-sm-8" style=" margin-top:5%;padding: 0px;">  
  
  <div class="col-md-12 col-sm-12" style="padding-bottom: 10px"> 
  <label for="" style="padding: 0px;">Line Type:</label>         
  <select name="" id="linetype" style="color: rgb(0, 0, 0); background-color: rgb(228, 228, 228); width: 100%; border-radius: 2vh; outline: none;
    text-align-last: center;">
  <option value="dashed">Dashed</option>
  <option value="straight">Straight</option>
</select></div>

<div class="col-md-12 col-sm-12" style="">
  <label for="" style="padding: 0px;">Line Color:</label>
<select name="" id="linecolor" style="color: rgb(0, 0, 0); background-color: rgb(228, 228, 228); width: 100%; border-radius: 2vh; outline: none;
    text-align-last: center;">
  <option value="red" style="color: red">Red</option>
  <option value="blue" style="color: blue">Blue</option>
   <option value="black" style="color: black">Black</option>
  <option value="yellow" style="color: #DFDF36;">Yellow</option>
  <option value="green" style="color: green">Green</option>
</select></div>
</div></div>
</ul>
   </div>
 <!--  </div> -->
  </div>



<div class="modal fade bd-example" id="upload_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" id="close_modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-sm-10 col-md-10" > <input type='file' id= "file_input" onchange="readURL(this);" /> </div>
          <div class="col-sm-2 col-md-2" ><div id="remove"></div></div>
          <div class="col-sm-6 col-md-6">   
            <img id="blah" src="image/image_upload2.png" style="padding: 20px 0 20px 0" />
          </div>
          <div class="col-sm-1 col-md-1 selec_or">
            <h4 class="modal-title">OR</h4>
          </div> 
          <div class="col-sm-4 col-md-4 selec">
            <select class="selec" id="uploaded_select" onchange="update_map()">
              <option value="">Please Select Maps</option>
              <? while($row_main_map=$get_main_maps->fetch_object()){?>
              <option value="<?=$row_main_map->id?>"><?=$row_main_map->map_name?></option>
              <? } ?>
            </select>
          </div>
          <div class="col-sm-1 col-md-1" id="remove2" style="display: none;" onclick="remove_selected_map()"><span class="glyphicon glyphicon-remove" id="remove_icon2" style="margin-top: 97px;"> </span></div>
        </div>
      </div>
      <div class="modal-footer">
        <center>
          <button class=" btn btn-info" id="b" type="button" style="background-color:#5bc0de !important;outline: none;border: none;" onclick="map();">Save as Image</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </center>
      </div>
    </div> 
  </div>
</div>
</div>

 <div class="col-sm-12 col-md-12" id="margin_set" style="margin-bottom: 5px;padding-left: 0px; padding-right: 0px; width: 104%;margin-left: -15px;"> 
 <?// include("Checklist_visit_footer/footer_new.php"); ?></div></div></div>
</body>

<script>
  // $(function () {
  //   $(document).on("hidden.bs.modal", "#modalTaskObserved", function () {
  //     $(this).find('input').val('');  
  //   });
  // });




var flag=0;
var image_name='<?=$get_main_maps_baclground->map_name ?>';
  function update_map()
  {
    if($('#uploaded_select').val() == '')
    {
      flag=0;
    }

    else
    {
      flag=1;
      $('#remove2').show();$('#file_input').hide();
    }
    
  }

function select_refresh()
{
   $.ajax({
          url : "ajax_internal_plan_sel_refresh.php",
          type: "POST",
          data: {flag:true}, 
          
            success: function(response){
            // alert(response); 

            //  image_name=response;
            // flag=2;
             $("#uploaded_select").html(response);
          }     
        });
}

function remove_selected_map()
{
  $('#file_input').show();
  $('#remove2').hide();
  $('#uploaded_select').val('');
  $('#uploaded_select').prop('disabled',true);
  flag=0;
}

function update_map_info()
{
  var val_map_sel=$('#uploaded_select').val();
   $.ajax({
          url : "ajax_internal_plan.php",
          type: "POST",
          data: {name:val_map_sel}, 
          
            success: function(response){
            alert(response); 

             image_name=response;
             // canvas.clear();
            canvas_background_change(image_name);
          }     
        });
}


    function uploadImg()
  {
    var fileInput = document.getElementById('file_input');
      var filePath = fileInput.value; 
      var allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;
      if( !allowedExtensions.exec(filePath))
      {
        alert('Please upload file having extensions .jpeg/.jpg/.png only.');
        fileInput.value = '';
        return false;
        flag=0;
      }
      else
      {   
        var formData = new FormData();
        formData.append('file', $('#file_input')[0].files[0]);
          $.ajax({
          url : "ajax_internal_plan.php",
          type: "POST",
          data: formData, 
          contentType: false,
          cache: false,
          processData:false,
          async: false,
            success: function(response){
              alert('uploaded');
            image_name=response;
            
          }     
        });
      }
  }

  function map()
  {
    if(flag==1)
    {

      update_map_info();
      reset_modal();
      
    }

    else if(flag==2)
    {
      uploadImg();
      reset_modal();
      canvas_background_change(image_name);
    }
    else
      alert("Please Choose atleast one");
  }

  function reset_modal()
  {

    
    flag=0;
    $('#uploaded_select').val('');
    $('#file_input').val('');
    $('#blah').attr('src','image/image_upload2.png').width(175).height(175);
    
        // $(".modal-backdrop.in").hide();
      // $('.modal-backdrop').remove();
      $(".button_cls").click();
      // $('#remove').click();
      $('#remove2').click();
        $('#remove').click();
        select_refresh();
       $('#uploaded_select').removeAttr("disabled");
      // $('.modal-backdrop').removeClass();
      //  $('#upload_modal').modal('hide');

     // $('.modal.in').modal('hide');



  }

function canvas_background_change(name)
{
   canvas.setBackgroundImage('API/Uploads/'+name, canvas.renderAll.bind(canvas), {
    backgroundImageOpacity: 0.5,
    backgroundImageStretch: false
});

}
  
</script>

<!-- <script type="text/javascript"> 
    $('#margin_set').css($(window).height());
  </script> -->

<!-- test canvas 3 script and css -->
<script type="text/javascript">
  /* Drag and Drop code adapted from http://www.html5rocks.com/en/tutorials/dnd/basics/ */

var canvas = new fabric.Canvas('canvas');
canvas.setHeight(360);
canvas.setWidth(700);

canvas.setBackgroundImage('API/Uploads/'+'<?=$get_main_maps_baclground->map_name ?>', canvas.renderAll.bind(canvas), {
    backgroundImageOpacity: 0.5,
   backgroundImageStretch: false
});
/* 
NOTE: the start and end handlers are events for the <img> elements; the rest are bound to 
the canvas container.
*/
canvas.on('object:modified',function(){
  if(!isRedoing){
    h = [];
  }
  isRedoing = false;
});

var isRedoing = false;
var h = [];
function undo(){
  if(canvas._objects.length>0){
   h.push(canvas._objects.pop());
   canvas.renderAll();
  }
}
function redo(){
  
  if(h.length>0){
    isRedoing = true;
   canvas.add(h.pop());
  }
}
function handleDragStart(e) {
    [].forEach.call(images, function (img) {
        img.classList.remove('img_dragging');
    });
    this.classList.add('img_dragging');
}

function handleDragOver(e) {
  if(even == true)
 $('#other_btn').click();
   // even=true;
    if (e.preventDefault) {
        e.preventDefault(); // Necessary. Allows us to drop.
    }

    e.dataTransfer.dropEffect = 'copy'; // See the section on the DataTransfer object.
    // NOTE: comment above refers to the article (see top) -natchiketa

    // return false;
}

function handleDragEnter(e) {
    // this / e.target is the current hover target.
    this.classList.add('over');
    canvas.__eventListeners["mouse:down"] = [];
}

function handleDragLeave(e) {
    this.classList.remove('over'); // this / e.target is previous target element.
}

function handleDrop(e) {
    // this / e.target is current target element.

    if (e.stopPropagation) {
        e.stopPropagation(); // stops the browser from redirecting.
    }

    var img = document.querySelector('#images img.img_dragging');

    console.log('event: ', e);

    var newImage = new fabric.Image(img, {
        width: img.width,
        height: img.height,
        // Set the center of the new object based on the event coordinates relative
        // to the canvas container.
        left: e.layerX,
        top: e.layerY
    });
    canvas.add(newImage);

    return false;
}

function handleDragEnd(e) {
    // this/e.target is the source node.
    [].forEach.call(images, function (img) {
        img.classList.remove('img_dragging');
    });
}

if (Modernizr.draganddrop) {
    // Browser supports HTML5 DnD.

    // Bind the event listeners for the image elements
    var images = document.querySelectorAll('#images img');
    [].forEach.call(images, function (img) {
        img.addEventListener('dragstart', handleDragStart, false);
        img.addEventListener('dragend', handleDragEnd, false);
    });
    // Bind the event listeners for the canvas
    var canvasContainer = document.getElementById('canvas-container');
    canvasContainer.addEventListener('dragenter', handleDragEnter, false);
    canvasContainer.addEventListener('dragover', handleDragOver, false);
    canvasContainer.addEventListener('dragleave', handleDragLeave, false);
    canvasContainer.addEventListener('drop', handleDrop, false);
} else {
    // Replace with a fallback to a library solution.
    alert("This browser doesn't support the HTML5 Drag and Drop API.");
}


var drawingModeEl = document.getElementById('drawing-mode'),
      drawingOptionsEl = document.getElementById('drawing-mode-options'),
      drawingColorEl = document.getElementById('drawing-color'),
      drawingLineWidthEl = document.getElementById('drawing-line-width'),
      drawingShadowWidth = document.getElementById('drawing-shadow-width');

  drawingModeEl.onclick = function() {
    canvas.isDrawingMode = !canvas.isDrawingMode;
    if (canvas.isDrawingMode) {
      $('#other_btn').attr('disabled',true);
      drawingModeEl.innerHTML = 'Cancel';
      drawingOptionsEl.style.display = '';
    }
    else {
      $('#other_btn').attr('disabled',false);
      drawingModeEl.innerHTML = 'Free Draw';
      drawingOptionsEl.style.display = 'none';
    }
  };

  // canvas.on('path:created', function() {
  //   updateComplexity();
  // });

  if (fabric.PatternBrush) {
    var vLinePatternBrush = new fabric.PatternBrush(canvas);
    vLinePatternBrush.getPatternSrc = function() {

      var patternCanvas = fabric.document.createElement('canvas');
      patternCanvas.width = patternCanvas.height = 10;
      var ctx = patternCanvas.getContext('2d');

      ctx.strokeStyle = this.color;
      ctx.lineWidth = 5;
      ctx.beginPath();
      ctx.moveTo(0, 5);
      ctx.lineTo(10, 5);
      ctx.closePath();
      ctx.stroke();

      return patternCanvas;
    };

    var hLinePatternBrush = new fabric.PatternBrush(canvas);
    hLinePatternBrush.getPatternSrc = function() {

      var patternCanvas = fabric.document.createElement('canvas');
      patternCanvas.width = patternCanvas.height = 10;
      var ctx = patternCanvas.getContext('2d');

      ctx.strokeStyle = this.color;
      ctx.lineWidth = 5;
      ctx.beginPath();
      ctx.moveTo(5, 0);
      ctx.lineTo(5, 10);
      ctx.closePath();
      ctx.stroke();

      return patternCanvas;
    };

    var squarePatternBrush = new fabric.PatternBrush(canvas);
    squarePatternBrush.getPatternSrc = function() {

      var squareWidth = 10, squareDistance = 2;

      var patternCanvas = fabric.document.createElement('canvas');
      patternCanvas.width = patternCanvas.height = squareWidth + squareDistance;
      var ctx = patternCanvas.getContext('2d');

      ctx.fillStyle = this.color;
      ctx.fillRect(0, 0, squareWidth, squareWidth);

      return patternCanvas;
    };

    var diamondPatternBrush = new fabric.PatternBrush(canvas);
    diamondPatternBrush.getPatternSrc = function() {

      var squareWidth = 10, squareDistance = 5;
      var patternCanvas = fabric.document.createElement('canvas');
      var rect = new fabric.Rect({
        width: squareWidth,
        height: squareWidth,
        angle: 45,
        fill: this.color
      });

      var canvasWidth = rect.getBoundingRectWidth();

      patternCanvas.width = patternCanvas.height = canvasWidth + squareDistance;
      rect.set({ left: canvasWidth / 2, top: canvasWidth / 2 });

      var ctx = patternCanvas.getContext('2d');
      rect.render(ctx);

      return patternCanvas;
    };

    var img = new Image();
    img.src = '../assets/honey_im_subtle.png';

    var texturePatternBrush = new fabric.PatternBrush(canvas);
    texturePatternBrush.source = img;
  }

  document.getElementById('drawing-mode-selector').addEventListener('change', function() {

    if (this.value === 'hline') {
      canvas.freeDrawingBrush = vLinePatternBrush;
    }
    else if (this.value === 'vline') {
      canvas.freeDrawingBrush = hLinePatternBrush;
    }
    else if (this.value === 'square') {
      canvas.freeDrawingBrush = squarePatternBrush;
    }
    else if (this.value === 'diamond') {
      canvas.freeDrawingBrush = diamondPatternBrush;
    }
    else if (this.value === 'texture') {
      canvas.freeDrawingBrush = texturePatternBrush;
    }
    else {
      canvas.freeDrawingBrush = new fabric[this.value + 'Brush'](canvas);
    }

    if (canvas.freeDrawingBrush) {
      canvas.freeDrawingBrush.color = drawingColorEl.value;
      canvas.freeDrawingBrush.width = parseInt(drawingLineWidthEl.value, 10) || 1;
      canvas.freeDrawingBrush.shadowBlur = parseInt(drawingShadowWidth.value, 10) || 0;
    }
  });

  drawingColorEl.onchange = function() {
    canvas.freeDrawingBrush.color = drawingColorEl.value;
  };
  drawingLineWidthEl.onchange = function() {
    canvas.freeDrawingBrush.width = parseInt(drawingLineWidthEl.value, 10) || 1;
  };
  drawingShadowWidth.onchange = function() {
    canvas.freeDrawingBrush.shadowBlur = parseInt(drawingShadowWidth.value, 10) || 0;
  };

  if (canvas.freeDrawingBrush) {
    canvas.freeDrawingBrush.color = drawingColorEl.value;
    canvas.freeDrawingBrush.width = parseInt(drawingLineWidthEl.value, 10) || 1;
    canvas.freeDrawingBrush.shadowBlur = 0;
  }



  


var even = false;

$('#other_btn').click(function() {
  // alert(even);
    if(even) {

        doEven();
    } else {
        doOdd();
    }

    even = !even;
});



$("#b").click(function(){
  $("#canvas").get(0).toBlob(function(blob){
    saveAs(blob, "image/myIMG.png");
    savetoserver();
    canvas.clear();
     canvas_background_change(image_name);
    console.log(blob);
  });
});


function savetoserver() {

var dataURL=canvas.toDataURL();

var project_id= <?php echo $_SESSION['admin'] ?>;

var lastid= <?php echo $map ; ?>;


var currentTime = new Date();
var n = currentTime.getTime();



var imagename='img_'+project_id+'_'+lastid+'_'+n;

$.ajax({
  type: "POST",
  url: "upload_internal_map.php",
  data: { image: dataURL,imagename: imagename,project_id: project_id}
          
}).done(function( respond ) {
 alert("Saved filename: "+respond);
 console.log(respond);
});


}

function doOdd() {
    // first click, third click, fifth click, etc
$('#other_btn').text("Cancel");
    $(".drawing_btn").attr("disabled", true);
        $('#other').show();
        var line, isDown;

        canvas.on('mouse:down', function(o){
          isDown = true;
          var pointer = canvas.getPointer(o.e);
          var points = [ pointer.x, pointer.y, pointer.x, pointer.y ];
          var color=$('#linecolor').val();
          if(document.getElementById('linetype').value == "dashed") {
            
             line = new fabric.Line(points, {
              strokeWidth: 5,
              strokeDashArray: [15, 5],
              fill: color,
              stroke: color,
              originX: 'center',
              originY: 'center'
            });
          }
          else {

            line = new fabric.Line(points, {

              strokeWidth: 5,
              fill: color,
              stroke: color,
              originX: 'center',
              originY: 'center'
            });
          }
          
          canvas.add(line);
        });

        canvas.on('mouse:move', function(o){
          if (!isDown) return;
          var pointer = canvas.getPointer(o.e);
          line.set({ x2: pointer.x, y2: pointer.y });
          canvas.renderAll();
        });

        canvas.on('mouse:up', function(o){
          isDown = false;
        });
}

function doEven() {
    // second click, fourth click, sixth click, etc
  $(".drawing_btn").attr("disabled", false);

canvas.__eventListeners["mouse:down"] = [];
    $('#other').hide();
    $('#other_btn').text("Lines Draw");

  
}


function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result)
                        .width(175)
                        .height(175);

                        $('#uploaded_select').attr('disabled','true');
                        $('#remove').html('<span class="glyphicon glyphicon-remove" id="remove_icon"></span>');
                        flag=2;
                };

                reader.readAsDataURL(input.files[0]);
            }
        }



$("#remove").on('click', function() {
   $('#blah').attr('src', 'image/image_upload2.png').width(175)
                        .height(175);
                        $('#file_input').val(''); 
                        $("#remove_icon").hide();
                         $('#uploaded_select').removeAttr("disabled");
                         flag=0;
});



</script>

<style type="text/css">
.selec{
  top: 95px!important;
}

.selec_or{
  top: 92px!important;
}
.canvasbackground {
  top: 6vh;
  height: 100%;
    margin-left: 1.5%;
    width: 97%;
    position: absolute;
  background-color: #F2F2F6;
}
  #canvas-container {
    position: relative;
    width:100%;
    height:55vh;
    box-shadow: 0 0 5px 1px black;
    border: 5px solid transparent;
}
.canvas-container{
   width:100% !important;
    height: 100% !important;
}
.lower-canvas{
  width:100% !important;
  height: 100% !important;
  image-rendering: pixelated;
}
.upper-canvas{
  width:100% !important;
  height: 100% !important;\
  image-rendering: pixelated;
}
#canvas-container.over {
    border: none;
}
#images img.img_dragging {
    opacity: 0.4;
}
/* 
Styles below based on  http://www.html5rocks.com/en/tutorials/dnd/basics/ 
*/

/* Prevent the text contents of draggable elements from being selectable. */
[draggable] {
    -moz-user-select: none;
    -khtml-user-select: none;
    -webkit-user-select: none;
    user-select: none;
    /* Required to make elements draggable in old WebKit */
    -khtml-user-drag: element;
    -webkit-user-drag: element;
    cursor: move;
}
</style>

<!-- end -->
<style>
.no-padding{
  padding: 0px !important;
}

.image_outerleftdiv{
  background-color: #F2F2F6 !important;
  box-shadow: 0 0 5px 1px black  !important;
  text-align-last: center  !important;
  border: 5px solid transparent  !important;
 /* height: 100%  !important;*/
   margin-left: 10px  !important;
   margin-right: 25px !important;
    /*overflow-y: scroll;*/
  z-index: 111  !important;
}
.image_outerrightdiv{
  background-color: #F2F2F6  !important;
  box-shadow: 0 0 5px 1px black  !important;
  text-align-last: center  !important;
  border: 5px solid transparent  !important;
  height: 100%  !important;
  margin-left: 25px !important;
  margin-right: 10px;
  overflow-y: scroll;
  z-index: 111;
}
.image_canvas{
  height: 8vh;
  margin-bottom: 5px;
}
/*@font-face {
  font-family: 'Helvetica_Nue';
   src: url('fonts/helvetica-neue-5923ee0f5f95b.ttf');
}
@font-face {
  font-family: 'Helvetica_Nue_light';
   src: url('fonts/helvetica-neue-light-5925314ecbd06.ttf');
}*/
@font-face {
  font-family: 'Avenirnext';
   src: url('fonts/AvenirNextLTPro-Regular.otf');
}
@font-face {
  font-family: 'Avenirnextbold';
   src: url('fonts/AvenirNextLTPro-Bold.otf');
}
@font-face {
  font-family: 'Avenirnextitalic';
   src: url('fonts/AvenirNextLTPro-It.otf');
}
@font-face {
  font-family: 'Avenirnextmedium';
   src: url('fonts/avenir-next-lt-pro-medium-596dfa60711d1.otf');
}
@media (min-width: 992px)
bootstrap.css:1937
.col-md-10 {
    width: 75%;
}
  
  body {
    background-color: white;
    height: 0vh;
    margin: 0px;
    overflow-x: hidden;
  overflow:hidden;

}


html *
{
  
   font-family: Avenirnext;
}



.nav_container
{
     
   /* margin-top: 1vh;*/
    margin-left: 12.5vw;
    float: left;
    margin-bottom: 1vh;
    font-size: 1.4vw;
   }

.nav_wrap
{
  
  
  
  float: left;
  width: 100%;
  height: 13.7vh;
  background-color: #DF5430;
  /*margin-top: -2px;*/


}

.button_1
{
  height: 13.4vh;

}

.logout a
{
    


    display: block;
    text-decoration: none;
    font-size: 2vh;
    /* line-height: 30px; */
    padding: 2vh;
    color: white;
    text-shadow: 1px 1px 1px rgba(128,125,122,1);
    font-weight: bold;
    color: white;
    /* letter-spacing: 1pt; */
    /* word-spacing: -10pt; */
    /* text-align: left; */
    font-family: Arial;
    float: right;
    /* height: 20vh; */
    margin-top: 4vh;
    background-size: 1vw;
  
}

.logout a:hover
{
-webkit-transform: scale(1);
-ms-transform: scale(1);
transform: scale(1);
transition: 0.1s ease;

}

.effect_item:hover
{
box-shadow: 0 0 0 2px white;
transition: 0.4s ease;
}



.welcome
{   
  text-shadow:1px 1px 1px rgba(222,222,222,1);font-weight:normal;color:#255915;background-color:#EBFCA4;letter-spacing:2pt;word-spacing:6pt;font-size:15px;text-align:center;font-family:impact, sans-serif;line-height:1;
}

.logo
{

/*border: 1px solid; */*/
    float: left;
    height: 11.6vh;
    margin-left: 2vw;
    margin-top: 1vh;
    width: 11.6vh;
    position: absolute;
    background-image: url(image/logo.png);
    background-repeat: no-repeat;
    background-size: 100% 100%;
    image-rendering:optimizeSpeed;              /* Legal fallback                 */
image-rendering:-moz-crisp-edges;           /* Firefox                        */
image-rendering:-o-crisp-edges;             /* Opera                          */
image-rendering:-webkit-optimize-contrast;  /* Chrome (and eventually Safari) */
image-rendering:crisp-edges;                /* CSS3 Proposed                  */
-ms-interpolation-mode:bicubic;    
cursor: pointer;




}

.sub-sub_menu
{
  background-color: white;
}

.Name
{
 padding-top: 1vw;
padding-left: 3.5vw;


  
  text-shadow:1px 1px 1px rgba(0,0,0,1);font-weight:normal;color:#F5F5F5;letter-spacing:1pt;word-spacing:2pt;font-size:27px;text-align:left;font-family:arial, helvetica, sans-serif;line-height:1;
}

#search_site
{
/*  left: 3%;*/
  margin-top: 28px;
  float: right;
}
#submit_search_site
{
    margin-left: 0.5px;
    height: 34px;
    float: right;
  }
  #mbmcpebul_wrapper {
    background-image: -webkit-linear-gradient(top, #DF5430 0%, #DF5430 100%);
  }

  /*li:hover {
    background: #3C3C3C;
  

  }*/
  li a img
  {
    margin-top: 2vh;
  }

 

   
#mbmcpebul_table ul.gradient_menu {

   z-index: 999;
     background-color: #505153;
    /* IE9, iOS 3.2+ */
    background-image: url(data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiIHZpZXdCb3g9IjAgMCAxIDEiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjxsaW5lYXJHcmFkaWVudCBpZD0idnNnZyIgZ3JhZGllbnRVbml0cz0idXNlclNwYWNlT25Vc2UiIHgxPSIwJSIgeTE9IjAlIiB4Mj0iMTAwJSIgeTI9IjAlIj48c3RvcCBzdG9wLWNvbG9yPSIjMDAwMDAwIiBzdG9wLW9wYWNpdHk9IjEiIG9mZnNldD0iMC4zMjc5OTk5OTk5OTk5OTk5NiIvPjxzdG9wIHN0b3AtY29sb3I9IiNlZWYxZjUiIHN0b3Atb3BhY2l0eT0iMSIgb2Zmc2V0PSIwLjk5NiIvPjxzdG9wIHN0b3AtY29sb3I9IiNlZWYxZjUiIHN0b3Atb3BhY2l0eT0iMSIgb2Zmc2V0PSIxIi8+PHN0b3Agc3RvcC1jb2xvcj0iI2VlZjFmNSIgc3RvcC1vcGFjaXR5PSIxIiBvZmZzZXQ9IjEiLz48L2xpbmVhckdyYWRpZW50PjxyZWN0IHg9IjAiIHk9IjAiIHdpZHRoPSIxIiBoZWlnaHQ9IjEiIGZpbGw9InVybCgjdnNnZykiIC8+PC9zdmc+);
    background-image: -webkit-gradient(linear, 0% 0%, 100% 0%,color-stop(0.328, rgb(0, 0, 0)),color-stop(0.996, rgb(238, 241, 245)),color-stop(1, rgb(238, 241, 245)),color-stop(1, rgb(238, 241, 245)));
    /* Android 2.3 */
    background-image: -webkit-linear-gradient(left,rgb(0, 0, 0) 70.8%,rgb(238, 241, 245) 130.6%,rgb(238, 241, 245) 100%,rgb(238, 241, 245) 100%);
    /* IE10+ */
    background-image: linear-gradient(to right,rgb(2, 0, 0) 70.8%,rgb(238, 241, 245) 130.6%,rgb(238, 241, 245) 100%,rgb(238, 241, 245) 100%);
    background-image: -ms-linear-gradient(left,rgb(0, 0, 0) 70.8%,rgb(238, 241, 245) 130.6%,rgb(238, 241, 245) 100%,rgb(238, 241, 245) 100%);
}
 
/* IE8- CSS hack */
@media \0screen\,screen\9 {
    .gradient {
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#ff000000",endColorstr="#ffeef1f5",GradientType=1);
    }





  }

  #mbmcpebul_table ul li:hover, #mbmcpebul_table ul li.subexpanded, #mbmcpebul_table ul li.subitemhot {
    border-color: transparent;
    background-color: black;
    box-shadow: none;
}

#mbmcpebul_table.css_menu ul li:hover > ul {

   background-color: #505153;
    /* IE9, iOS 3.2+ */
    background-image: url(data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiIHZpZXdCb3g9IjAgMCAxIDEiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjxsaW5lYXJHcmFkaWVudCBpZD0idnNnZyIgZ3JhZGllbnRVbml0cz0idXNlclNwYWNlT25Vc2UiIHgxPSIwJSIgeTE9IjAlIiB4Mj0iMTAwJSIgeTI9IjAlIj48c3RvcCBzdG9wLWNvbG9yPSIjMDAwMDAwIiBzdG9wLW9wYWNpdHk9IjEiIG9mZnNldD0iMC4zMjc5OTk5OTk5OTk5OTk5NiIvPjxzdG9wIHN0b3AtY29sb3I9IiNlZWYxZjUiIHN0b3Atb3BhY2l0eT0iMSIgb2Zmc2V0PSIwLjk5NiIvPjxzdG9wIHN0b3AtY29sb3I9IiNlZWYxZjUiIHN0b3Atb3BhY2l0eT0iMSIgb2Zmc2V0PSIxIi8+PHN0b3Agc3RvcC1jb2xvcj0iI2VlZjFmNSIgc3RvcC1vcGFjaXR5PSIxIiBvZmZzZXQ9IjEiLz48L2xpbmVhckdyYWRpZW50PjxyZWN0IHg9IjAiIHk9IjAiIHdpZHRoPSIxIiBoZWlnaHQ9IjEiIGZpbGw9InVybCgjdnNnZykiIC8+PC9zdmc+);
    background-image: -webkit-gradient(linear, 0% 0%, 100% 0%,color-stop(0.328, rgb(0, 0, 0)),color-stop(0.996, rgb(238, 241, 245)),color-stop(1, rgb(238, 241, 245)),color-stop(1, rgb(238, 241, 245)));
    /* Android 2.3 */
    background-image: -webkit-linear-gradient(left,rgb(0, 0, 0) 32.8%,rgb(238, 241, 245) 99.6%,rgb(238, 241, 245) 100%,rgb(238, 241, 245) 100%);
    /* IE10+ */
    background-image: linear-gradient(to right,rgb(0, 0, 0) 32.8%,rgb(238, 241, 245) 99.6%,rgb(238, 241, 245) 100%,rgb(238, 241, 245) 100%);
    background-image: -ms-linear-gradient(left,rgb(0, 0, 0) 32.8%,rgb(238, 241, 245) 99.6%,rgb(238, 241, 245) 100%,rgb(238, 241, 245) 100%);
}
 
/* IE8- CSS hack */
@media \0screen\,screen\9 {
    .gradient {
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#ff000000",endColorstr="#ffeef1f5",GradientType=1);
    }

  }
.main_content
{
     /*border: 1px solid grey;*/
    /*float: left;*/
   
    /* margin: -220px 0 0 -200px; */
  
   
    /*margin-left: 3vw;*/
    /*background-color: #f5f5f5;*/
 
    
    
    height: 82vh;
}

#content {
                 width: 30vw;
    height: 78vh;
    margin-top: 3vh;
    /*border: 1px solid;*/
    display: inline-block;
    float: left;
      /*background-image: url('image/notification_1.png');*/
      background-position: center;
    background-size: 30vw 79vh;
    background-repeat: no-repeat
    
}
#content2 {
       width: 38vw;
    height: 78vh;
    margin-left: 2vw;
    margin-top: 3vh;
    /*border: 1px solid;*/*/
    display: inline-block;
    float: left;
    /*margin-left: 2vw;*/
    
}

#side_1{  height: 50%;        /*border: 1px solid;*/    /*background-image: url('image/notification_2.png');*/   

margin-top: 3vh;
 background: #fff;   background-position: center;    background-size:  38vw 26vh;    background-repeat: no-repeat;}

#side_2
{

  
    
    padding-top: 1%;
    height: 45%;

    background-color: white;
/*  border: 1px solid;*/
    /*background-image: url('image/notification_3.png');*/
    background-position: center;
    background-size: 38vw 47vh;
    background-repeat: no-repeat;
 
}




@media (min-width: 768px) and (max-width: 1200px)
{
#content  {
    width: 40%;
        background-size: 257px 565px;
  
}

#content2  {
       width: 56%;
    margin-left: 2vw;
}
#side_2  {
       background-size: 365px 335px;
}
#side_1  {
     background-size: 365px 187px;
    
}
.image_outerrightdiv{
  margin-left: 15px !important;
    margin-right: 5px !important;
}
.image_outerleftdiv{
  margin-left: 5px !important;
  margin-right: 15px !important;
}

}

.forecast_submenu
{
  
    height: 5vh;
    width: 5vh;
    float: right;
    margin-right: 2vh;
    background-position: center;
    background-repeat: no-repeat;
    background-image: url(image/menu_icon.png);
    position: static;
    /* background-color: #00bbee; */
    /* margin-left: 20%; */
    /* margin-right: 20%; */
    margin-top: -5vh;
    /* margin-bottom: 15%; */
    /* border: 2px solid red; */
}
.temp
{
/*  border:1px solid;*/
      margin-top: 3vh;
      text-align: left;
      padding-left:  2vw;
}
.country
{
  /*border:1px solid;*/
    
      text-align: left;
      padding-left:  2vw;
}
.other_units
{
   /*border:1px solid;*/
    
      text-align: left;
      padding-left:  2vw;
}

sub, sup {
    position: relative;
    /* font-size: 75%; */
    line-height: 0;
    /* vertical-align: baseline; */
    margin-bottom: 0px;

    }
    sub
    {
             top: 0.5em;
    }
    .line-separator{

height:1px;

background:#717171;

border-bottom:1px solid #313030;

}

.text1
{
  font-size: 1.7vh;
}

#side_3
{

  
    margin-top: 3vh;
    padding-top: 1%;
    height: 57vh;
    background-color: white;
    background-position: center;
    background-size: 38vw 47vh;
    background-repeat: no-repeat;
 
}
.imgclass {
width: 100%;
height: 26vh;
}

.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
        background-color: #fefefe;
    margin: auto;
    padding: 5px 10px;
    border: 1px solid #888;
    /*width: 400px;*/
    top: 25%;
    left: 20%;
    /*height: 300px;*/
}
.modal-header {
  padding: 5px;
}
.modal-body {
padding: 5px;
}
/* The Close Button */
.close {
    color: #aaaaaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}
.close {
  font-size: 20px;
  /*color: green;*/
  outline: none;
  opacity: 0.9;
}
.close:hover,
.close:focus {
    color: #aaaaaa;
    text-decoration: none;
    cursor: pointer;
    opacity: 0.9;
}
.form-group {
  margin-bottom: 5px;
}

::-webkit-scrollbar {
    width: 7px;
        background: #fff;
}
 
::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
    border-radius: 10px;
    border-top-left-radius: 0;
     border-bottom-left-radius: 0;
}
 
::-webkit-scrollbar-thumb {
    border-radius: 10px;
    border-radius: 10px;
    border-top-left-radius: 0;
     border-bottom-left-radius: 0;
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.5); 
    background: #E3E1E3;
}

.thin {
    max-width:150px;    
}

.carousel > .window {
    overflow: hidden;
    position: relative;
    height: 300px;
}

/*
    This is the item wrapper,
    it will be animated.
*/
.carousel ul {
    list-style: none;
    height: 10000px;
    top: 0;
    left: 0;
    position: absolute;
    padding: 0px;
}

/*
    These are the items
*/
.carousel li {
    margin: 3px 0 0;
}
.prev, .next {
    font-size: 30px;
    width: 100%;
    position: relative;
    left: 50%;
    margin-left: -15px;
}
.carousel li:first-child {
    margin: 0;
}




</style>

</html>


<script>
  function home()
  {
    window.location.href='header_home.php';
  }

  $(document).ready (function(){
    var con= true;
    $('#test2').hide();
    
  });

$('#mbmcpebul_table li a').hover(
 function() {

// $(this).css('font-weight','bolder');
$('#mbmcpebul_table li .button_1').closest(this).css('color','#DF5430');
}, function(){

$(this).css('font-weight','100');
$(this).css('color','white');
// $('#mbmcpebul_table li .button_1').css('color','white');


});


$( ".farn" ).click(function() {
    var val= $('.api_value').val();
    var calc= val*9/5+32;
    var final= Number(calc).toFixed(2);
    // alert(final);
    $('.temp_value').html(final);
    $(".farn").css('color', 'red');
    $('.farn_val').val(final);
    $(".celcius").css('color', 'black');
  
});
$( ".celcius" ).click(function() {
    var val= $('.farn_val').val();
    var calc= (5/9) * (val-32);
    var final= Number(calc).toFixed(2);
    // alert(final);
    $('.temp_value').html(final);
    $(".celcius").css('color', 'red');
    $(".farn").css('color', 'black');

  
});

$("#winput").click(function(){

    $("#zip_cde").val("");
  $("#errormsg").html("");
  $("#loading").hide();
});

$("#zipsubmit").click(function(){


  var zipcode = $.trim($("#zip_cde").val());



  if (zipcode == '')
  {
    $("#errormsg").html("Enter Zip Code").show();
  }
  else if( isNaN(zipcode))

    {
      $("#errormsg").html("Enter Only Numbers").show();

    }
 /* elseif (zipcode.match(/^\d+$/))
    {
      $("#errormsg").html("Enter Only Number").show();

    }*/
  else if (zipcode.length !=4)
  {
   $("#errormsg").html("Enter Valid Zip Code").show();
  }
  
  else {
    $("#errormsg").html("Correct").show();
       $("#myModal").hide();
       $("#tempdiv").hide();
       $("#error_div").hide();
       $('#loading').removeClass('hidden');
       $("#loading").show();
    

    
        $.ajax ({
          type:"POST",
          url:"get_weather.php",
      
          data: $("#zipform").serialize(),
          success: function(result) {
            // alert(result);
            if( result.indexOf('Warning') >= 0){
               // alert("ok");
                $("#error_div").show();
                $("#tempdiv").hide();
                $("#loading").hide();
              }

              else{
              var res = result.split(",");
              
            $('.temp_value').html(res[0]);
             $(".celcius").css('color', 'red');
             $(".farn").css('color', 'black');
             $('.api_value').val(res[0]);
             $('.farn_val').val(res[6]);
             $('#humid').html("&nbsp"+res[1]+"%");
              $('#wind').html("&nbsp"+res[2]+"km/h");
                $('#temp_prec').html("&nbsp"+res[3]);
                $('#country').html("&nbsp"+res[4]);
                $('#city').html("&nbsp"+res[5]);
                $("#tempdiv").show();
                $("#error_div").hide();
                $("#loading").hide();
          }
        }

        });
          
           
  }
 });

</script>
<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("winput");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "block";
    }
}



/*  // whenever we hover over a menu item that has a submenu
  $('#test').hover(function() { 
     $('#test2').show();
     //alert("test");
  });

  $( "#test2").mouseleave(function() {

  $('#test2').hide();
  //alert("test2");
});

  $("#test").parent().mouseleave(function() {

  $('#test2').hide();
  //alert("out");
});*/



</script>

<script type="text/javascript">
  

  !function ($) {

    var is,
    transition;

  // from valentine
  is = {
    fun: function (f) {
      return typeof f === 'function';
    },
    arr: function (ar) {
      return ar instanceof Array;
    },
    obj: function (o) {
      return o instanceof Object && !is.fun(o) && !is.arr(o);
    }
  };

  /*
    Based on Bootstrap
    Mozilla and Webkit support only
  */
  transition = (function () {
    var st = document.createElement('div').style,
      transitionEnd = 'TransitionEnd',
      transitionProp = 'Transition',
      support = st.transition !== undefined ||
        st.WebkitTransition !== undefined ||
        st.MozTransition !== undefined;

    return support && {
      prop: (function () {
        if (st.WebkitTransition !== undefined) {
          transitionProp = 'WebkitTransition';
        } else if (st.MozTransition !== undefined) {
          transitionProp = 'MozTransition';
        }
        return transitionProp;
      }()),
      end: (function () {
        if (st.WebkitTransition !== undefined) {
          transitionEnd = 'webkitTransitionEnd';
        } else if (st.MozTransition !== undefined) {
          transitionEnd = 'transitionend';
        }
        return transitionEnd;
      }())
    };
  }());

  function extend() {
    // based on jQuery deep merge
    var options, name, src, copy, clone,
      target = arguments[0], i = 1, length = arguments.length;

    for (; i < length; i += 1) {
      if ((options = arguments[i]) !== null) {
        // Extend the base object
        for (name in options) {
          src = target[name];
          copy = options[name];
          if (target === copy) {
            continue;
          }
          if (copy && (is.obj(copy))) {
            clone = src && is.obj(src) ? src : {};
            target[name] = extend(clone, copy);
          } else if (copy !== undefined) {
            target[name] = copy;
          }
        }
      }
    }
    return target;
  }

  function clone(obj) {
    if (null === obj || 'object' !== typeof obj) {
      return obj;
    }
    var copy = obj.constructor(),
      attr;
    for (attr in obj) {
      if (obj.hasOwnProperty(attr)) {
        copy[attr] = obj[attr];
      }
    }
    return copy;
  }

  // from jquery
  function proxy(fn, context) {
    var slice = Array.prototype.slice,
      args = slice.call(arguments, 2);
    return function () {
      return fn.apply(context, args.concat(slice.call(arguments)));
    };
  }

  function animate(options) {
    var el = options.el,
      complete = options.complete ? options.complete : function () {},
      animation,
      dummy;

    // no animation obj OR animation is not available,
    // fallback to css and call the callback
    if (! options.animation ||
      ! (el.animate || (options.css3transition && transition))) {
      el.css(options.fallbackCss);
      complete();
      return;
    }

    // we will animate, apply start CSS
    if (options.animStartCss) {
      if (options.animStartCss.opacity === 0) {
        options.animStartCss.opacity = 0.01; // ie quirk
      }
      el.css(options.animStartCss);
    }
    animation = options.animation;

    // css3 setted, if available apply the css
    if (options.css3transition && transition) {
      dummy = el[0].offsetWidth; // force reflow; source: bootstrap
      el[0].style[transition.prop] = 'all ' + animation.duration + 'ms';

      // takaritas
      delete animation.duration;
      delete animation.easing;

      el.css(animation);
      //el.unbind(transition.end);
      el.on(transition.end, function () {
        // delete transition properties and events
        el.off(transition.end);
        el[0].style[transition.prop] = 'none';
        complete();
      });
    } else if (window.ender) {
      // use morpheus
      el.animate(extend(animation, {'complete': complete}));
    } else {
      // use animate from jquery
      el.animate(animation, animation.duration, animation.easing, complete);
    }
  }

  /*
    Carousel Constructor
  */
  function Carousel(el, options) {
    this.init(el, options);

    // only return the API
    // instead of this
    return {
      getPageSize: proxy(this.getPageSize, this),
      getCursor: proxy(this.getCursor, this),
      nextPage: proxy(this.nextPage, this),
      prevPage: proxy(this.prevPage, this),
      isVisibleItem: proxy(this.isVisibleItem, this),
      scrollToItem: proxy(this.scrollToItem, this),
      getOptions: proxy(this.getOptions, this),
      setOptions: proxy(this.setOptions, this)
    };
  }

  Carousel.prototype = {
    init: function (el, options) {
      var opt;

      this.options = {
        window: '.window',
        items: 'li',
        pager: null,
        nextPager: 'a.next',
        prevPager: 'a.prev',
        activeClass: null,
        disabledClass: 'disabled',
        duration: 400,
        vertical: false,
        keyboard: false,
        css3transition: false,
        extraOffset: 0
      };
      this.setOptions(options);
      opt = this.options;

      if (opt.css3transition && ! transition) {
        opt.css3transition = false;
      }

      this.$el = $(el);
      this.$window = this.$el.find(
        opt.window
      );
      this.$itemWrapper = this.$window.children().first();
      this.$items = this.$el.find(
        opt.items
      );
      this.$nextPager = this.$el.find(
        opt.nextPager
      );
      this.$prevPager = this.$el.find(
        opt.prevPager
      );

      this.setDimensions();

      if (opt.pager) {
        this.$pager = this.$el.find(
          opt.pager
        );

        this.createPager();

        this.$pagerItems = this.$pager.find('li');
      }

      if (this.$items.length <= this.pageSize) {
        this.hidePrevPager();
        this.hideNextPager();
        return;
      }

      this.cursor = this.getActiveIndex();

      if (this.cursor < 0) {
        if (this.options.activeClass) {
          for (var i = 0; i < this.pageSize; i += 1) {
            $(this.$items.get(i)).addClass('active');
          }
        }

        this.cursor = 0;
      }

      if (this.cursor > this.lastPosition) {
        this.cursor = this.lastPosition;
      }

      if (this.cursor > 0) {
        this.scrollToItem(this.cursor, true);
      }

      if (this.cursor === 0) {
        this.hidePrevPager();
      }

      if (this.cursor >= this.lastPosition) {
        this.hideNextPager();
      }

      this.$nextPager.on('click', proxy(this.nextPage, this));
      this.$prevPager.on('click', proxy(this.prevPage, this));

      if (opt.keyboard) {
        $(document).on('keyup', proxy(this.onKeyUp, this));
      }

      this.$el.addClass('carousel-inited');
    },

    setDimensions: function () {
      var $secondItem,
        alignedDimension = 'width',
        marginType = ['margin-left', 'margin-right'];

      if (this.options.vertical) {
        alignedDimension = 'height';
        marginType = ['margin-top', 'margin-bottom'];
      }

      $secondItem = this.$items.first().next();
      this.itemMargin = parseInt($secondItem.css(marginType[0]), 10) +
        parseInt($secondItem.css(marginType[1]), 10);
      this.itemDimension = $secondItem[alignedDimension]() + this.itemMargin;

      this.windowDimension = this.$window[alignedDimension]();
      this.pageSize = Math.floor(
        (this.windowDimension + this.itemMargin) / this.itemDimension
      );
      this.pageDimension = this.pageSize * this.itemDimension;
      this.lastPosition = this.$items.length - this.pageSize;

    },

    createPager: function () {
      var itemsLen = this.$items.length,
        pagerItemsFrag = document.createDocumentFragment(),
        pagerItem,
        i;

      for (i = 0; i < itemsLen; i += 1) {
        pagerItem = document.createElement('li');
        $pagerItem = $(pagerItem);

        $pagerItem.on('click', proxy(this.usePager, this, i, itemsLen));

        if (i < this.pageSize) {
          $pagerItem.addClass('active');
        }

        pagerItemsFrag.appendChild(pagerItem);
      }

      this.$pager.empty().get(0).appendChild(pagerItemsFrag);
    },

    usePager: function (pos, len) {
      if (pos > (len - this.pageSize)) {
        this.scrollToItem(len - this.pageSize);
      } else {
        this.scrollToItem(pos);
      }
    },

    nextPage: function (e) {
      if (typeof(e) !== 'undefined') {
        e.preventDefault();
      }

      if (this.cursor >= this.lastPosition) {
        return;
      }

      var itemIdx = this.cursor + this.pageSize;
      if (itemIdx > this.lastPosition) {
        itemIdx = this.lastPosition;
      }

      this.scrollToItem(itemIdx);
    },

    prevPage: function (e) {
      if (typeof(e) !== 'undefined') {
        e.preventDefault();
      }

      if (this.cursor === 0) {
        return;
      }

      var itemIdx = this.cursor - this.pageSize;
      if (itemIdx < 0) {
        itemIdx = 0;
      }

      this.scrollToItem(itemIdx);
    },

    nextItem: function () {
      if (this.cursor >= this.lastPosition) {
        return;
      }

      this.scrollToItem(this.cursor + 1);
    },

    prevItem: function () {
      if (this.cursor === 0) {
        return;
      }
      this.scrollToItem(this.cursor - 1);
    },

    scrollToItem: function (idx, doNotAnimate) {
      var animateTo,
        scrollTo,
        direction = this.options.vertical ? 'top' : 'left',
        animObj = {},
        activeClassName = this.options.activeClass || 'active',
        itemsLen = this.$items.length,
        i;

      this.cursorPrevious = this.cursor;
      this.cursor = idx;

      if (this.cursor === 0) {
        this.hidePrevPager();
      } else {
        this.showPrevPager();
      }

      if (this.cursor >= this.lastPosition) {
        this.hideNextPager();
      } else {
        this.showNextPager();
      }

      scrollTo = this.cursor * this.itemDimension;
      if (this.cursor === this.lastPosition) {
        scrollTo = scrollTo -
          (this.windowDimension - this.pageDimension + this.itemMargin) +
          this.options.extraOffset;
      }

      scrollTo *= -1;
      animObj[direction] = scrollTo;

      if (! doNotAnimate) {
        animObj.duration = this.options.duration;
      }

      if (this.options.activeClass) {
        activeClass = this.options.activeClass;

        if (this.getPageSize() === 1) {
          $(this.$items.get(this.cursorPrevious)).removeClass(activeClass);
          $(this.$items.get(idx)).addClass(activeClass);
        } else {
          itemslen = this.$items.length;
          this.$items.removeClass(activeClass);

          for (i = 0; i < itemslen; i += 1) {
            if (this.isVisibleItem(i)) {
              $(this.$items.get(i)).addClass(activeClass);
            }
          }
        }
      }

      if (this.options.pager) {
        if (this.getPageSize() === 1) {
          $(this.$pagerItems.get(this.cursorPrevious)).removeClass(activeClassName);
          $(this.$pagerItems.get(this.cursor)).addClass(activeClassName);
        } else {
          this.$pagerItems.removeClass(activeClassName);

          for (i = 0; i < itemsLen; i += 1) {
            if (this.isVisibleItem(i)) {
              $(this.$pagerItems.get(i)).addClass(activeClassName);
            }
          }
        }
      }

      animate({
        el: this.$itemWrapper,
        animation: doNotAnimate ? false : animObj,
        fallbackCss: animObj,
        css3transition: this.options.css3transition
      });
    },

    onKeyUp: function (e) {
      if (e.keyCode === 39) {
        this.nextPage();
      } else if (e.keyCode === 37) {
        this.prevPage();
      }
    },

    getActiveIndex: function () {
      var i = 0,
        il = this.$items.length;

      for (; i < il; i += 1) {
        if ($(this.$items.get(i)).hasClass('active')) {
          return i;
        }
      }

      return -1;
    },

    hideNextPager: function () {
      this.$nextPager.addClass(
        this.options.disabledClass
      );
    },

    hidePrevPager: function () {
      this.$prevPager.addClass(
        this.options.disabledClass
      );
    },

    showNextPager: function () {
      this.$nextPager.removeClass(
        this.options.disabledClass
      );
    },

    showPrevPager: function () {
      this.$prevPager.removeClass(
        this.options.disabledClass
      );
    },

    getPageSize: function () {
      return this.pageSize;
    },

    getCursor: function () {
      return this.cursor;
    },

    isVisibleItem: function (idx) {
      if (this.cursor + this.pageSize <= idx || this.cursor > idx) {
        return false;
      }
      return true;
    },

    getOptions: function () {
      return this.options;
    },

    setOptions: function (options) {
      extend(this.options, options || {});
    }
  };

  $.fn.carousel = function (options) {
    return new Carousel(this.first(), options);
  };
}(window.ender || window.jQuery || window.Zepto);


$(document).ready(function () {
    $("#c_test").carousel({
        vertical: true
    });


     $("#c_test2").carousel({
        vertical: true
    });


});


</script>



