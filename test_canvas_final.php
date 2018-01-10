<!-- Based on the tutorial at http://www.html5rocks.com/en/tutorials/dnd/basics/ -->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/1.7.22/fabric.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
<script type="text/javascript" src="https://fastcdn.org/FileSaver.js/1.1.20151003/FileSaver.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/javascript-canvas-to-blob/3.14.0/js/canvas-to-blob.min.js"></script>
<div id="images">
    <img draggable="true" src="image/icon1.png" width="100" height="100"  crossOrigin="Anonymous"></img>
    <img draggable="true" src="image/icon2.png" width="100" height="100"  crossOrigin="Anonymous"></img>
    <img draggable="true" src="image/icon3.png" width="100" height="100"  crossOrigin="Anonymous"></img>
</div>

<!-- NOTE: Fabric.js sets both the <canvas> element and the wrapper element which it
creates to be user-unselectable using CSS properties (e.g. for Webkit, this is 
-webkit-user-select: none;). We could remove that property during the dragging, but 
I'm just going to wrap the canvas in a container and bind events to that, which is 
less intrusive.
 -->
<div id="canvas-container">
    <canvas id="canvas" width="800" height="600"></canvas>


    <li style="margin-top:10px;">
          <button id="drawing-mode" class="btn btn-info">Enter drawing mode</button>
          <div style="display: none;" id="drawing-mode-options">
            <label for="drawing-mode-selector">Mode:</label>
            <select id="drawing-mode-selector">
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
            <label for="drawing-line-width">Line width:</label>
            <input type="range" value="30" min="0" max="150" id="drawing-line-width"><br>
            <label for="drawing-color">Line color:</label>
            <input type="color" value="#005E7A" id="drawing-color"><br>
            <label for="drawing-shadow-width">Line shadow width:</label>
            <input type="range" value="0" min="0" max="50" id="drawing-shadow-width"><br>

            <button id="draw">Drawing Straight</button>

<button id="delete">Delete selected object(s)</button> 
            <a href="javascript:undo();">undo</a>
<a href="javascript:redo();">redo</a>
          </div>
        </li>
</div>
<input id="b" type="button" value="Save as Image" />

<script type="text/javascript">
	/* Drag and Drop code adapted from http://www.html5rocks.com/en/tutorials/dnd/basics/ */

var canvas = new fabric.Canvas('canvas');


canvas.setBackgroundImage('internal_plan_img.png', canvas.renderAll.bind(canvas), {
    backgroundImageOpacity: 0.5,
    backgroundImageStretch: false
});
/* 
NOTE: the start and end handlers are events for the <img> elements; the rest are bound to 
the canvas container.
*/
canvas.on('object:added',function(){

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
    if (e.preventDefault) {
        e.preventDefault(); // Necessary. Allows us to drop.
    }

    e.dataTransfer.dropEffect = 'copy'; // See the section on the DataTransfer object.
    // NOTE: comment above refers to the article (see top) -natchiketa

    return false;
}

function handleDragEnter(e) {
    // this / e.target is the current hover target.
    this.classList.add('over');
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
      drawingModeEl.innerHTML = 'Cancel drawing mode';
      drawingOptionsEl.style.display = '';
    }
    else {
      drawingModeEl.innerHTML = 'Enter drawing mode';
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




$("#b").click(function(){
	$("#canvas").get(0).toBlob(function(blob){
		saveAs(blob, "image/myIMG.png");
	});
});



var line, isDown,mode;
$("#draw").click(function(){
    
        canvas.isDrawingMode = false;

    mode="draw";

    canvas.on('mouse:down', function(o){
  isDown = true;
  var pointer = canvas.getPointer(o.e);
  var points = [ pointer.x, pointer.y, pointer.x, pointer.y ];
   
  if(mode=="draw"){
    line = new fabric.Line(points, {
    strokeWidth: 5,
    fill: 'red',
    stroke: 'red',
    originX: 'center',
    originY: 'center',
    selectable: true,
    targetFindTolerance: true
  });
  canvas.add(line);}
});
 
canvas.on('mouse:move', function(o){
  if (!isDown) return;
  var pointer = canvas.getPointer(o.e);
  
  if(mode=="draw"){
  line.set({ x2: pointer.x, y2: pointer.y });
  canvas.renderAll(); }
});

canvas.on('mouse:up', function(o){
  isDown = false;
});

});
$("#delete").click(function(){
    
    
    deleteObjects();
});

// Adding objects to the canvas...

 

  

// select all objects
function deleteObjects(){
    var activeObject = canvas.getActiveObject(),
    activeGroup = canvas.getActiveGroup();
    if (activeObject) {
        if (confirm('Are you sure?')) {
            canvas.remove(activeObject);
        }
    }
    else if (activeGroup) {
        if (confirm('Are you sure?')) {
            var objectsInGroup = activeGroup.getObjects();
            canvas.discardActiveGroup();
            objectsInGroup.forEach(function(object) {
            canvas.remove(object);
            });
        }
    }
}



</script>

<style type="text/css">
	#canvas-container {
    position: relative;
    width: 800px;
    height: 600px;
    box-shadow: 0 0 5px 1px black;
    margin: 10px auto;
    border: 5px solid transparent;
}
#canvas-container.over {
    border: 5px dashed cyan;
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