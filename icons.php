  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<div>
<div class="votes" style="text-align:center">
<span class="glyphicon glyphicon-ok glyphicon_gif1" id="gif_ok"></span>
<span class="glyphicon glyphicon-remove glyphicon_gif2" id="gif_remove"></span>
<span class="glyphicon glyphicon-plus glyphicon_gif3"  id="gif_na" ></span>
<span class="glyphicon glyphicon-edit glyphicon_gif4" id="gif_edit"></span>


</div>
</div>

<style>
.not-selected {
    background-color:red;
	width: 30px;
    height: 30px;
    border-radius: 50%;
    }
.glyphicon-ok:before {
    font-size: 20px;
    color: white;
    position: absolute;
    top: 12%;
    right: 20%;
    -webkit-text-stroke: 2px #AAAAAA;
}
.glyphicon-remove:before {
    font-size: 20px;
    color: white;
    position: absolute;
    top: 15%;
    right: 15%;
    -webkit-text-stroke: 2px #AAAAAA;
}
.glyphicon-edit:before {
    font-size: 20px;
    color: white;
    position: absolute;
    top: 15%;
    right: 15%;
    -webkit-text-stroke: 1px #AAAAAA;
}
.glyphicon-plus:before {
    font-size: 20px;
    color: white;
    position: absolute;
    top: 15%;
    right: 15%;
    -webkit-text-stroke: 2px #AAAAAA;
}

.glyphicon_gif1{
	width: 30px;
    height: 30px;
    background-color: #AAAAAA;
    border-radius: 50%;
}

.glyphicon_gif1_selected{
    width: 30px;
    height: 30px;
    background-color: red;
    border-radius: 50%;
}

.glyphicon_gif2{
	width: 30px;
    height: 30px;
    background-color: #AAAAAA;
    border-radius: 50%;
}

.glyphicon_gif2_selected{
    width: 30px;
    height: 30px;
    background-color: yellow;
    border-radius: 50%;
}

.glyphicon_gif3{
	width: 30px;
    height: 30px;
    background-color: #AAAAAA;
    border-radius: 50%;
}
.glyphicon_gif4{
	width: 30px;
    height: 30px;
    background-color: #AAAAAA;
    border-radius: 50%;
}

.selected {
color:#16A085;
}

</style>

<script type="text/javascript">
      $('.glyphicon').on("click", function(){

        var class_name= $(this).attr('class');
        console.log(class_name);
        if(class_name== "glyphicon glyphicon-ok glyphicon_gif1" || class_name == "glyphicon glyphicon-ok glyphicon_gif1 glyphicon_gif1_selected") 
        $(this).toggleClass('glyphicon_gif1_selected');
        else if(class_name== "glyphicon glyphicon-ok glyphicon_gif2" || class_name == "glyphicon glyphicon-ok glyphicon_gif2 glyphicon_gif2_selected")
           $(this).toggleClass('glyphicon_gif2_selected'); 
    });
</script>