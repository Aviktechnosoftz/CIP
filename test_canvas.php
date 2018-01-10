<!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/1.7.21/fabric.js"></script>
<canvas id="c" width="500" height="500" style="border:1px solid #ccc"></canvas>

<script type="text/javascript">
	var canvas = new fabric.Canvas('c', { selection: false });

var line, isDown;

canvas.on('mouse:down', function(o){
  isDown = true;
  var pointer = canvas.getPointer(o.e);
  var points = [ pointer.x, pointer.y, pointer.x, pointer.y ];
  line = new fabric.Line(points, {
    strokeWidth: 5,
    fill: 'red',
    stroke: 'red',
    originX: 'center',
    originY: 'center'
  });
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



</script> -->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>

<div style="width:20%;float:left;border:1px solid; height:400px">
  <h6>buttons</h6>
  <div>
    <div class="fake tool button tool-1">Click</div>
    <br/>
    <div class="fake tool button tool-1">Click</div>
    <hr />
    <div class="fake tool navbar tool-3"><span class="ui-icon ui-icon-newwin"></span> Nav</div>
    <hr/>
<img src="https://www.w3schools.com/images/w3schools_green.jpg" alt="W3Schools.com" style="width:104px;height:142px;" class="fake tool button tool-1">
  </div>
</div>
<div style="width:78%;height:400px;float:right;border:1px solid;" class="canvas">
  <p>
    canvas
  </p>

</div>
note:i want to drag these button multiple time and once it dopped inside canvas it can be draggable inside canvas and resizable


<script type="text/javascript">
	var defaultNav = [{
  class: "active",
  link: "#home",
  label: "Home"
}, {
  class: "",
  link: "#news",
  label: "News"
}, {
  class: "",
  link: "#contact",
  label: "Contact"
}, {
  class: "",
  link: "#about",
  label: "About"
}];

function init() {
  var diagram = [];
  var canvas = $(".canvas");
  $(".tool").draggable({
    helper: "clone",
    cancel: false,
  });
  canvas.droppable({
    drop: function(event, ui) {
      console.log(ui.helper.prop("outerHTML"));
      
      
      //code for image and divs but problem is divs are working properly but images are not showing please try to drag and drop the element   
      
      if (ui.helper.hasClass("fake")) {
        var new_signature;
        if (ui.helper.hasClass("button")) {
          new_signature = $("<div>", {
            class: "tool_wrapper ui-widget",
            style: ui.helper.attr("style")
          });
          var handle = $("<div>", {
              class: "tool_handle ui-widget-header"
            })
            .html("&nbsp;").appendTo(new_signature);
          var close = $("<span>", {
            class: "ui-icon ui-icon-close"
          }).appendTo(handle).click(function() {
            if (confirm("Are you sure you want to remove this Button?")) {
              new_signature.remove();
            }
          });
          var tool = $("<div>", {
              class: ui.helper.attr("class"),
              contenteditable: true
            })
            .html(ui.helper.html())
            .appendTo(new_signature).resizable();
          tool.css({
            width: "60px",
            height: "1.5em",
            "line-height": "inherit"
          });
          tool.removeClass("fake ui-draggable ui-draggable-handle ui-draggable-dragging");
          new_signature.appendTo($(this));
          var sigTop = parseInt(new_signature.css("top").slice(0, -2));
          new_signature.css("top", (sigTop - 13) + "px");
          new_signature.draggable({
            handle: ".tool_handle",
            helper: false,
            containment: "parent"
          });
          console.log(new_signature.prop("outerHTML"));
        }
        
              
      //code for navbar working properly 
        
        
        if (ui.helper.hasClass("navbar")) {
          new_signature = $("<div>", {
            class: "tool_wrapper ui-widget",
            style: ui.helper.attr("style")
          });
          var handle = $("<div>", {
              class: "tool_handle ui-widget-header"
            })
            .html("&nbsp;").appendTo(new_signature);
          var close = $("<span>", {
            class: "ui-icon ui-icon-close"
          }).appendTo(handle).click(function() {
            if (confirm("Are you sure you want to remove this Navigation Bar?")) {
              new_signature.remove();
            }
          });
          var tool = $("<ul>", {
              class: ui.helper.attr("class"),
            })
            .appendTo(new_signature).resizable();
          $.each(defaultNav, function(key, val) {
            var $li = $("<li>").appendTo(tool);
            $li.append($("<a>", {
              class: val.class,
              href: val.link
            }).html(val.label).click(function(e) {
              e.preventDefault();
            }));
          });
          tool.removeClass("fake ui-draggable ui-draggable-handle ui-draggable-dragging");
          new_signature.appendTo($(this));
          var sigTop = parseInt(new_signature.css("top").slice(0, -2));
          new_signature.css("top", (sigTop - 13) + "px");
          new_signature.draggable({
            handle: ".tool_handle",
            helper: false,
            containment: "parent"
          });
          console.log(new_signature.prop("outerHTML"));
        }
      }
    }
  });
}

$(init);

</script>

<style type="text/css">
	.tool-1,
.tool-2,
.tool-3 {
  width: 60px;
  height: 1.5em;
  border: 1px red solid;
  border-radius: .2em;
  text-align: center;
  padding: 0.5em;
}

.tool-2 {
  border: 1px green solid;
}

.tool-3 {
  border-color: blue;
}

.canvas .tool_wrapper {
  display: inline-block;
  width: auto;
  height: auto;
}

.canvas .tool_wrapper .tool_handle {
  height: 10px;
  line-height: 10px;
  padding: 0;
  margin: 0;
  margin-top: -10px;
  text-align: right;
}

.canvas .tool_wrapper .tool_handle .ui-icon {
  margin-top: -.30em;
}

.canvas .tool_wrapper .ui-resizable-se {
  margin-left: -5px;
  margin-top: -5px;
}

.canvas .tool_wrapper .button {
  width: 60px;
  height: 1.5em;
  border-radius: .2em;
  text-align: center;
  padding: 0.5em;
}

ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover:not(.active) {
  background-color: #111;
}

.active {
  background-color: #4CAF50;
}

</style>