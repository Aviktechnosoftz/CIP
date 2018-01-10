<? include('header.php') ?>

<div id='spritespin'></div>

<button id="prev">PREV</button>
<button id="next">NEXT</button>

<div class="details" style="display:none;">
  <div class="detail detail-0">Lorem ipsum dolor sit amet, consetetur sadipscing elitr</div>
  <div class="detail detail-8">sed diam nonumy eirmod tempor invidunt ut labore et</div>
  <div class="detail detail-20">consetetur sadipscing elitr, sed diam nonumy eirmod</div>
</div>

<script type="text/javascript">
	// use helper method to generate an array of image urls. We have 34 frames in total
var frames = SpriteSpin.sourceArray('http://i.stack.imgur.com/Ynoc2.png', { 
    frame: [1, 34], 
    digits: 3 
});

// these are the frame numbers that will show a detail bubble
var details = [0, 8, 20];
// the current index in the details array
var detailIndex = 0;

// initialise spritespin
var spin = $('#spritespin');
spin.spritespin({
    source: frames,
    width: 480,
    sense: -1,
    height: 327,
    animate: false
});
// get the api object. This is used to trigger animation to play up to a specific frame
var api = spin.spritespin("api");

spin.bind("onLoad", function(){
    var data = api.data;
    data.stage.prepend($(".details .detail")); // add current details
    data.stage.find(".detail").hide();         // hide current details
}).bind("onFrame", function(){
    var data = api.data;
    data.stage.find(".detail:visible").stop(false).fadeOut();
    data.stage.find(".detail.detail-" + data.frame).stop(false).fadeIn();
});
    
$( "#prev" ).click(function(){
    setDetailIndex(detailIndex - 1);
});
    
$( "#next" ).click(function(){
    setDetailIndex(detailIndex + 1);
});

function setDetailIndex(index){
    detailIndex = index;
    if (detailIndex < 0){
        detailIndex = details.length - 1;
    }
    if (detailIndex >= details.length){
        detailIndex = 0;
    }
    api.playTo(details[detailIndex]);
}
</script>

<style type="text/css">
	    .detail{
      position: absolute;
      width: 100px;
      background: white; 
      opacity: 0.7;
      padding: 10px;
      border: 1px dashed black;
      z-index: 1000;
    }
    .detail-0{
      top : 40px;
      left: 40px;
    }

    .detail-8{
      right : 40px;
      bottom: 40px;
    }

    .detail-20{
      top: 40px;
      left: 40px;
    }
</style>