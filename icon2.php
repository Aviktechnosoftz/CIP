  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<div>
<div style="text-align:center" class="votes">
<span class="glyphicon glyphicon-ok glyphicon_gif" id="gif_ok"></span>
<span class="glyphicon glyphicon-remove glyphicon_gif" id="gif_remove"></span>
<span class="glyphicon glyphicon-plus glyphicon_gif"  id="gif_na" "><span style="position: absolute;top:15%;right: 15%">N/A</span></span>
<span class="glyphicon glyphicon-edit glyphicon_gif" id="gif_edit"></span>


</div>
</div>
<script>
$(document).ready(function()
{
	$('.glyphicon-ok').on('click', function(){
	if($('.glyphicon-ok').hasClass("glyphicon_gif"))
	{
		$('.glyphicon').removeClass("not-selected2");
		$('.glyphicon').removeClass("not-selected3");
		$('.glyphicon').removeClass("not-selected4");
		$('.glyphicon').addClass("glyphicon_gif");
		$('.glyphicon-ok').removeClass("glyphicon_gif");
		$('.glyphicon-ok').addClass("not-selected1");
		
		
	}
	else if($('.glyphicon-ok').hasClass("not-selected1"))
	{
		$('.glyphicon').removeClass("not-selected2");
		$('.glyphicon').removeClass("not-selected3");
		$('.glyphicon').removeClass("not-selected4");
		$('.glyphicon').addClass("glyphicon_gif");
		$('.glyphicon-ok').removeClass("not-selected1");
		$('.glyphicon-ok').addClass("glyphicon_gif");
		
		
	}
	
	
});
$('.glyphicon-remove').on('click', function(){
	if($('.glyphicon-remove').hasClass("glyphicon_gif"))
	{
		$('.glyphicon').removeClass("not-selected1");
		$('.glyphicon').removeClass("not-selected3");
		$('.glyphicon').removeClass("not-selected4");
		$('.glyphicon').addClass("glyphicon_gif");
		$('.glyphicon-remove').removeClass("glyphicon_gif");
		$('.glyphicon-remove').addClass("not-selected2");
		
		
	}
	else if($('.glyphicon-remove').hasClass("not-selected2"))
	{
		$('.glyphicon').removeClass("not-selected1");
		$('.glyphicon').removeClass("not-selected3");
		$('.glyphicon').removeClass("not-selected4");
		$('.glyphicon').addClass("glyphicon_gif");
		$('.glyphicon-remove').removeClass("not-selected1");
		$('.glyphicon-remove').addClass("glyphicon_gif");
		
		
	}
	
});
$('.glyphicon-plus').on('click', function(){
	if($('.glyphicon-plus').hasClass("glyphicon_gif"))
	{
		$('.glyphicon').removeClass("not-selected1");
		$('.glyphicon').removeClass("not-selected2");
		$('.glyphicon').removeClass("not-selected4");
		$('.glyphicon').addClass("glyphicon_gif");
		$('.glyphicon-plus').removeClass("glyphicon_gif");
		$('.glyphicon-plus').addClass("not-selected3");
		
		
	}
	else if($('.glyphicon-plus').hasClass("not-selected3"))
	{
		$('.glyphicon').removeClass("not-selected1");
		$('.glyphicon').removeClass("not-selected2");
		$('.glyphicon').removeClass("not-selected4");
		$('.glyphicon').addClass("glyphicon_gif");
		$('.glyphicon-plus').removeClass("not-selected3");
		$('.glyphicon-plus').addClass("glyphicon_gif");
		
		
	}
	
});
$('.glyphicon-edit').on('click', function(){
	if($('.glyphicon-edit').hasClass("glyphicon_gif"))
	{
		$('.glyphicon').removeClass("not-selected1");
		$('.glyphicon').removeClass("not-selected2");
		$('.glyphicon').removeClass("not-selected3");
		$('.glyphicon').addClass("glyphicon_gif");
		$('.glyphicon-edit').removeClass("glyphicon_gif");
		$('.glyphicon-edit').addClass("not-selected4");
		
		
	}
	else if($('.glyphicon-edit').hasClass("not-selected4"))
	{
		$('.glyphicon').removeClass("not-selected1");
		$('.glyphicon').removeClass("not-selected2");
		$('.glyphicon').removeClass("not-selected3");
		$('.glyphicon').addClass("glyphicon_gif");
		$('.glyphicon-edit').removeClass("not-selected4");
		$('.glyphicon-edit').addClass("glyphicon_gif");
		
		
	}
	
});

});

 
</script>
<style>
.not-selected1 {
    background-color:green;
	width: 30px;
    height: 30px;
    border-radius: 50%;
    }
.not-selected2 {
    background-color:red;
	width: 30px;
    height: 30px;
    border-radius: 50%;
    }
	.not-selected3 {
    background-color:#D97631;
	width: 30px;
    height: 30px;
    border-radius: 50%;
    }
	.not-selected4 {
    background-color:yellow;
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
    -webkit-text-stroke: 2px #AAAAAA;
}
.glyphicon-plus:before {
    font-size: 20px;
    color: white;
    position: absolute;
    top: 15%;
    right: 15%;
    -webkit-text-stroke: 2px #AAAAAA;
}

.glyphicon_gif{
	width: 30px;
    height: 30px;
    background-color: #AAAAAA;
    border-radius: 50%;
}
.glyphicon_gif2{
	width: 30px;
    height: 30px;
    background-color: #AAAAAA;
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

.glyphicon-plus:before {
    content: none;

    }
    .glyphicon
    {
    	cursor: pointer;
    }
</style>