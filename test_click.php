
<script type="text/javascript">
if (document.layers){
  document.captureEvents(Event.MOUSEDOWN);
  document.onmousedown=clickNS4;
}
else if (document.all&&!document.getElementById){
  document.onmousedown=clickIE4;
}
else { 
  document.onmousedown = function (e) {
  if (e.button == 2)
  {
      alert("Ouch! that hurts. Please do not right click!");
      setTimeout(function() { window.open('http://www.google.com'); }, 500);
  }
 }
}
</script>