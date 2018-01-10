<link rel="shortcut icon" type="image/x-icon" href="image/favicon.ico"/>

	<script src="js/jquery.min.1.12.0.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js" type="text/javascript" charset="utf-8"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/contextMenu/contextMenu.js" ></script>
	<link rel="stylesheet" href="js/contextMenu/contextMenu.css">

<input type="button" name="" class="testButton">
	<script type="text/javascript">
		var menu = [{
        name: 'create',
        img: 'js/contextMenu/images/add.png',
        title: 'create button',
        fun: function () {
            alert('i am add button')
        }
    
    }, {
        name: 'delete',
        img: 'js/contextMenu/images/delete.png',
        title: 'delete button',
        
 
    }];
     
//Calling context menu
 $('.testButton').contextMenu(menu,{triggerOn:'contextmenu'});
	</script>