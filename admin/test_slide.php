<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
       <script type="text/javascript" src="slider3/jquery.simpleSlider.js"> </script>
<script>

$(document).ready(function() {
$('#simpleSlider').simpleSlider();
});

</script>

       <div id="wrapper">
                                    <div id="simpleSliderPrevious"><</div>
                                    <div id="simpleSliderNext">></div>
                                    <div id="sliderContainer">
                                    <ul id="simpleSlider">
                                    <li><img src="images/1.svg" alt="" /></li>
                                    <li><img src="images/2.svg" alt="" /></li>
                                    <li><img src="images/3.svg" alt="" /></li>
                                    ...
                                    </ul>
                                    </div>
                                    </div>

                                    <style type="text/css">
                                   
 /* The slider container */
#sliderContainer {
width: 660px;
margin: 0 auto;
}
/* The slider ul stypes, important to note that we hide all the overflow! */
#simpleSlider {
width: 660px;
height: 300px;
overflow: hidden;
position: relative;
list-style: none;
padding: 0;
margin: 0 auto;
}
/* styles for each item */
#simpleSlider li {
position: absolute;
top: 0px;
left: 0px;
display: none;
}
/* display the first item */
#simpleSlider li:first-child {
display: block;
}
/* Our style for the next button, this can be anything */
#simpleSliderNext {
float: right;
color: #000;
font-size: 70pt;
font-weight: bold;
cursor: pointer;
margin-top: 110px;
}
/* Our style for the previous button, this can be anything */
#simpleSliderPrevious {
float: left;
color: #000;
font-size: 70pt;
font-weight: bold;
cursor: pointer;
margin-top: 110px;
}
li img {
border-radius: 2px;
}
/* Some margin for your navigation */
#simpleSliderNav {
margin: 20px;
}
/* Styling for the navigation items, this can also be anything we want, but I am using circles */
.simpleSliderNavItem {
height: 16px;
width: 16px;
float: left;
background: #000;
margin-left: 10px;
border-radius: 8px;
cursor: pointer;
}
/* styles for the active nav item */
.active {
background: #c10d0d;
}

                                    </style>

                                    