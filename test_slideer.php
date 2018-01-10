<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Image Rotate / Compare</title>
  
  
  <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'>
<link rel='stylesheet prefetch' href='http://fancyapps.com/fancybox/source/jquery.fancybox.css?v=2.1.5'>

      <link rel="stylesheet" href="css/style.css">

  
</head>

<body>
  <section>
  <div class="row">
    <div class="col-lg-12">
      <label>
        <input id="kyc-image-compare" type="checkbox"> Compare Mode</label>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-4">
      <span data-href="https://static.pexels.com/photos/2857/mountains-nature-man-person.jpg" class="kyc-image" data-fancybox-group="gallery">
         <img src="http://i.telegraph.co.uk/multimedia/archive/02690/Anne-Guichard_2690182k.jpg" class="img-responsive" data-rotate="0">
        <i class="rotater glyphicon glyphicon-repeat"></i>
        <i class="img-new-window glyphicon glyphicon-share-alt"></i>
      </span>
    </div>
    <div class="col-lg-4">
      <span data-href="https://i.ytimg.com/vi/UIrEM_9qvZU/maxresdefault.jpg" class="kyc-image" data-fancybox-group="gallery">
         <img src="http://polinger.daccinfosystems.com/wp/wp-content/uploads/2015/04/v2-cute-cat-picture.jpg" class="img-responsive" data-rotate="0">
        <i class="rotater glyphicon glyphicon-repeat" title="Rotate 90 degrees"></i>
        <i class="img-new-window glyphicon glyphicon-share-alt" title="Open in new tab"></i>
     </span>
    </div>
    <div class="col-lg-4">
      <span data-href="http://www.seeds4thesoul.com/wp-content/uploads/2015/08/mountain-reflections-norway-mountain-backgrounds-mountain-norway-reflections-26010.jpg" class="kyc-image" data-fancybox-group="gallery">
         <img src="http://i.telegraph.co.uk/multimedia/archive/02625/mountain1_2625884k.jpg" class="img-responsive" data-rotate="0">
        <i class="rotater glyphicon glyphicon-repeat"></i>
        <i class="img-new-window glyphicon glyphicon-share-alt"></i>
     </span>
    </div>
  </div>
</section>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js'></script>
<script src='http://fancyapps.com/fancybox/source/jquery.fancybox.js?v=2.1.5'></script>

    <script src="js/index.js"></script>

</body>
</html>

<style type="text/css">
  /* Downloaded from http://www.codeseek.co/ */
.img-selected {
  border: 2px solid red;
}
.rotate90 {
  transform: rotate(90deg);
  -ms-transform: rotate(90deg); /* IE 9 */
  -moz-transform: rotate(90deg); /* Firefox */
  -webkit-transform: rotate(90deg); /* Safari and Chrome */
  -o-transform: rotate(90deg); /* Opera */
}
.rotate180 {
  transform: rotate(180deg);
  -ms-transform: rotate(180deg); /* IE 9 */
  -moz-transform: rotate(180deg); /* Firefox */
  -webkit-transform: rotate(180deg); /* Safari and Chrome */
  -o-transform: rotate(180deg); /* Opera */
}
.rotate270 {
  transform: rotate(270deg);
  -ms-transform: rotate(270deg); /* IE 9 */
  -moz-transform: rotate(270deg); /* Firefox */
  -webkit-transform: rotate(270deg); /* Safari and Chrome */
  -o-transform: rotate(270deg); /* Opera */
}
.rotater {
  position: absolute;
  top: 0.5em;
  left: 1.5em;
  text-shadow: 0px 0px 4px rgba(255, 255, 255, 0.9);
  cursor: pointer;
}
.img-new-window {
  position: absolute;
  top: 0.5em;
  left: 3em;
  text-shadow: 0px 0px 4px rgba(255, 255, 255, 0.9);
  cursor: pointer;
}
.fancybox-opened {
  z-index: 2;
}
</style>

<script type="text/javascript">
  /* Downloaded from http://www.codeseek.co/ */
$("span.kyc-image").click(function() {
  var imgFullURL = $(this).attr("data-href"),
      rotated = $(this).children("img").attr("data-rotate"),
      imgContainer = "<div class=\"rotate" + rotated + "\"><img src=\"" + imgFullURL + "\"></div>";
  if ($("#kyc-image-compare").is(":checked") === true) { // Multi-Mode
    var total = $(".img-selected").length;
    if (total < 2 || $(this).children(":first").hasClass("img-selected")) {
      $(this).children(":first").toggleClass("img-selected");
      total = $(".img-selected").length;
      if (total === 2) { // Display multi-mode
        // Create a div containing both images
        imgFullURL = $(".img-selected").eq(0).parent().attr("data-href");
        rotated = $(".img-selected").eq(0).attr("data-rotate");
        var img1 = "<div class=\"rotate" + rotated + "\"><img src=\"" + imgFullURL + "\" class=\"img-responsive\"></div>";
        imgFullURL = $(".img-selected").eq(1).parent().attr("data-href");
        rotated = $(".img-selected").eq(1).attr("data-rotate");
        var img2 = "<div class=\"rotate" + rotated + "\"><img src=\"" + imgFullURL + "\" class=\"img-responsive\"></div>";
        var compare = "<div class=\"clearfix\"><div style=\"max-width:50%; float:left;\">" + img1 + "</div><div style=\"max-width:50%; float:right;\">" + img2 + "</div></div>";
        $.fancybox.open([{
          content: compare,
          type: "html",
          autoHeight: true,
          minHeight: Math.round($( window ).height() * .5)
        }], {
          closeClick: true
        });
        // Unselect the last element for better UX
        $(this).children("img").removeClass("img-selected");
      }
    }
  } else { // Regular Mode
    // Potential Feature: Add the rest of images as gallery
    $.fancybox.open([{ // Use entire div to keep rotational state
      content: imgContainer,
      type: "html",
      autoHeight: true,
      minHeight: Math.round($( window ).height() * .5)
    }], {
      closeClick: true
    });
  }
}).children("i").click(function() {
  if ($(this).hasClass("rotater")) {
    rotateMore($(this).parent().children("img"));
  } else if ($(this).hasClass("img-new-window")) {
    window.open($(this).parent().attr("data-href"), "_blank");
  }
  return false; // prevent default behavior
});

function rotateMore(e) {
  var rotation = parseInt(e.attr("data-rotate"));
  if (rotation === 270) { // Reset
    rotateTo(e, 0);
  } else { // Or add 90 degrees
    rotation += 90;
    rotateTo(e, rotation);
  }
}
function rotateTo(e, degrees) {
  // Clear previous rotations
  $(e).removeClass(function (index, css) {
    return (css.match(/(^|\s)rotate\S+/g) || []).join(" ");
  });
  $(e).attr("data-rotate", degrees);
  if (degrees !== 0) {
    $(e).addClass("rotate" + degrees);
  }
}
</script>