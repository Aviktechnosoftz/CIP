 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>
<p>Drag from blue toolbar onto red canvas<br>Then press the action buttons below</p>
    <div id="toolbar">
        <img class="tool" width=32 height=32  src="image/icon1.png">
            <img class="tool" width=32 height=32 src="image/icon4.png" >
                <img class="tool" width=32 height=32 src="image/icon3.png" >
                    <img class="tool" width=32 height=32 type_icon="ok" src="image/icon2.png">
                    </div><br>
                    <li id="posX"></li>
        <li id="posY"></li>

                    <canvas id="canvas" width=800 height=500 style="background: url('internal_plan_img.png')"></canvas><br>
                    <button id=scribble>Simulate drawing on canvas</button>
                    <button id=export>Export to img element</button>
                    <p>Exported images will be put in this green Div</p>
                    <div id=exportedImgs style="background: url('internal_plan_img.png')">
                    </div>


<script type="text/javascript">
	// get references to the canvas and its context
var canvas=document.getElementById("canvas");
var ctx=canvas.getContext("2d");

// get the offset position of the canvas
var $canvas=$("#canvas");
var Offset=$canvas.offset();
var offsetX=Offset.left;
var offsetY=Offset.top;

var x,y,width,height;

// select all .tool's
var $tools=$(".tool");
// var $type=$(".tool").attr('type_icon');

// make all .tool's draggable
$tools.draggable({
    helper:'clone',
});


// assign each .tool its index in $tools
$tools.each(function(index,element){
    $(this).data("toolsIndex",index);
    
   


});


// make the canvas a dropzone
$canvas.droppable({
    drop:dragDrop,
});



// handle a drop into the canvas
var icons=[];
function dragDrop(e,ui){
    

    // get the drop point (be sure to adjust for border)
    x=parseInt(ui.offset.left-offsetX)-1;
    y=parseInt(ui.offset.top-offsetY);
    width=ui.helper[0].width;
    height=ui.helper[0].height;
    
    // get the drop payload (here the payload is the $tools index)
    var theIndex=ui.draggable.data("toolsIndex");
    // var icon_type=ui.draggable.data('icon_type');

    icons.push(theIndex);
    
    // drawImage at the drop point using the dropped image 
    // This will make the img a permanent part of the canvas content
    ctx.drawImage($tools[theIndex],x,y,width,height);

     var offset = $(ui.helper).offset();
            				var xPos = offset.left;
           					var yPos = offset.top;
           					$('#posX').text('x: ' + xPos);
            				$('#posY').text('y: ' + yPos);


    
}


$("#canvas").mousedown(function (e) {
   // console.log(e);
   make_draggable(e); 
});

// Just testing: Scribble some lines over the dropped img pixels
// In your app you can scribble any way you desire
$('#scribble').click(function(){
    ctx.beginPath();
    ctx.moveTo(x-20,y-20);
    ctx.lineTo(x+10,y+height+5);
    ctx.lineTo(x+20,y-20);
    ctx.lineTo(x+width,y+height+5);
    ctx.stroke();
    console.log('scribble',x,y,width,height);
});

// export the img pixels plus the scribble pixels
// (1) Draw the desired pixels onto a temporary canvas
// (2) Create a new img element from the temp canvas's dataURL
// (3) Append that new img to the #exportedImgs div
$('#export').click(function(){
    var tempCanvas=document.createElement('canvas');
    var tempCtx=tempCanvas.getContext('2d');
    tempCanvas.width=width;
    tempCanvas.height=height;
    tempCtx.drawImage(canvas,x,y,width,height,0,0,width,height);
    var img=new Image();
    img.onload=function(){
        $('#exportedImgs').append(img);
    };
    img.src=tempCanvas.toDataURL();
});


function make_draggable(elements)
{	

	console.log(elements);
	// elements.draggable({
	// 	containment:'parent',
	// 	start:function(e,ui){ ui.helper.css('z-index',++zIndex); },

	// 	stop:function(e,ui){
	// 		// alert('ok');
	// 		 var offset = $(ui.helper).offset();
 //            				var xPos = offset.left;
 //           					var yPos = offset.top;
 //           					$('#posX').text('x: ' + xPos);
 //            				$('#posY').text('y: ' + yPos);   
	// 	}
	// });
} 
</script>

<style type="text/css">
	body{ background-color: ivory; }
canvas{border:1px solid red;}
#exportedImgs{border:1px solid green; padding:15px; width:800px; height:500px;}
#toolbar{
    width:350px;
    height:35px;
    border:solid 1px blue;
}

</style>


<script type="text/javascript">
function randomFromTo(from, to){
   return Math.floor(Math.random() * (to - from + 1) + from);
}

jQuery(document).ready(function () { 
    var $map = jQuery('#exportedImgs');
    
        
        var x = 381;
        var y = 302;
        
        var $point = jQuery('<a href="#" class="point"><img src="image/icon3.png"  /></a>').css({top:y + 'px', left:x + 'px' , position:'absolute'});
        $map.append($point); 
    
    
});
</script>