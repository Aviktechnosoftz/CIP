<!-- This is a response to:
http://stackoverflow.com/questions/19722423/how-can-i-make-my-css-menus-hover-states-move-horizontally-for-ux-purposes/19726903#19726903 -->
<div id="header">
<ul id="menu">
    <li><a href="#">Home</a></li>
    <li><a href="#">About</a></li>
    <li><a href="#">Portfolio</a></li>
</ul>
<div id="gutter">
    <span id="highlight"></span>
</div>    
</div>

<style>
#header {
  position: relative;
  overflow: hidden;
}

#menu {
  width: 100%;
  height: 120px;
  background: #181818;
  list-style: none;
  margin: 0;
  padding: 0;
}

#menu li {
  margin: 0;
  padding: 0;
  float: left;
}

#menu li a {
  color: #FFF;
  margin: 0;
  padding: 50px;
  display: block;
}

#highlight {
  position: absolute;
  top: 0;
  left: 0;
  height: 5px;
  background: #f00;
  transition: all .5s;
}





</style>

<script>

var doc = document;

var anchors = doc.getElementById('menu').getElementsByTagName('a');
var highlight = doc.getElementById('highlight');

for(var i = 0, len = anchors.length; i < len; i++) {
    anchors[i].addEventListener('mouseover', function(e) {
        var target = e.target;
        highlight.style.width = target.offsetWidth + 'px';
        highlight.style.left = target.offsetLeft + 'px';
    });
    
    anchors[i].addEventListener('mouseout', function(e) {
        var target = e.target;
        var storeNeg = '-' + highlight.style.width;
        console.log(storeNeg);
        highlight.style.left = storeNeg;
    });
}

</script>