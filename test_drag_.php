 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>
 <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">



<!-- <div id="dragThis">
    <ul>
        <li id="posX"></li>
        <li id="posY"></li>
    </ul>
</div> -->

 <div class="dragImg"><img class="img" src="https://cdn.shopify.com/s/files/1/1061/1924/products/Man_Walking_Emoji_large.png?v=1480481046" style="width: 30px">

 	<div class="dragImg"><img class="img" src="http://freedesignfile.com/upload/2017/12/Alert-Icon-280x235.jpg" style="width: 30px">
 	

             </div>

             <li id="posX"></li>
        <li id="posY"></li>

 <div id="dropHere"></div>

 <div id="img_map"></div>
<style type="text/css">
	#dragThis {
    width: 6em;
    height: 6em;
    padding: 0.5em;
    border: 3px solid #ccc;
    border-radius: 0 1em 1em 1em;
}

#dropHere {
    width:100%;
    height: 100%;
    border: dotted 1px black;
    background-image: url('internal_plan_img.png');
    
}

#img_map { background:red; position:relative; width:400px;
    height: 400px;}
.point { display:block; 
	}
</style>


<script type="text/javascript">
 // $('#dragThis').draggable(
 //    {
 //        drag: function(){
 //            var offset = $(this).offset();
 //            var xPos = offset.left;
 //            var yPos = offset.top;
 //            $('#posX').text('x: ' + xPos);
 //            $('#posY').text('y: ' + yPos);
 //        }
 //    });


$(function(){  
 //Make every clone image unique.  
   var counts = [0];
    var resizeOpts = { 
      handles: "all" ,autoHide:true,
      
    };    
   $(".dragImg").draggable({
                         helper: "clone",

                         //Create counter
                         start: function() { counts[0]++; },

                         drag: function(){
           				
       								 }
                        });

$("#dropHere").droppable({
       drop: function(e, ui){
               if(ui.draggable.hasClass("dragImg")) {
     $(this).append($(ui.helper).clone());
     var offset = $(ui.helper).offset();
            				var xPos = offset.left;
           					var yPos = offset.top;
           					$('#posX').text('x: ' + xPos);
            				$('#posY').text('y: ' + yPos);   
   //Pointing to the dragImg class in dropHere and add new class.
         $("#dropHere .dragImg").addClass("item-"+counts[0]);
            $("#dropHere .img").addClass("imgSize-"+counts[0]);
                
   //Remove the current class (ui-draggable and dragImg)
         $("#dropHere .item-"+counts[0]).removeClass("dragImg ui-draggable ui-draggable-dragging");

$(".item-"+counts[0]).dblclick(function() {
$(this).remove();
});     
	make_draggable($(".item-"+counts[0])); 
      $(".imgSize-"+counts[0]).resizable(resizeOpts);  

       
       }


       }
      });


var zIndex = 0;
function make_draggable(elements)
{	
	elements.draggable({
		containment:'parent',
		start:function(e,ui){ ui.helper.css('z-index',++zIndex); },

		stop:function(e,ui){
			// alert('ok');
			 var offset = $(ui.helper).offset();
            				var xPos = offset.left;
           					var yPos = offset.top;
           					$('#posX').text('x: ' + xPos);
            				$('#posY').text('y: ' + yPos);   
		}
	});
}    


     });      
</script>




<script type="text/javascript">
function randomFromTo(from, to){
   return Math.floor(Math.random() * (to - from + 1) + from);
}

jQuery(document).ready(function () { 
    var $map = jQuery('#dropHere');
    
        
        var x = 461;
        var y = 182;
        
        var $point = jQuery('<a href="#" class="point"><img src="https://cdn.shopify.com/s/files/1/1061/1924/products/Man_Walking_Emoji_large.png?v=1480481046" style="width:40px" /></a>').css({top:y + 'px', left:x + 'px' , position:'absolute'});
        $map.append($point); 
    
    
});
</script>