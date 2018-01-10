
<?php include 'header.php';?>
<!-- Modal Start-->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
		<?php $x=1; while($row=mysqli_fetch_array($status)){ ?>
							ID : <?php echo $row['empid']; ?> <br/>
							EmpName : <?php echo $row['empName']; ?><br/>
						<button onclick="location.href = 'Edit_details.php?id=<?php echo $row["empid"]; ?>'" class="btn btn-success" >View Profile</button>	
						<?php } ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!--End here-->
<div class="row">

<div class="col-md-3 " >
<div class="nav-side-menu">
    <i class="fa fa-bars fa-2x toggle-btn " data-toggle="collapse" data-target="#menu-content"></i>
  
        <div class="menu-list">
  
            <ul id="menu-content" class="menu-content collapse out">
                <li>
                  <a href="#">
                  <i class="fa fa-dashboard fa-lg"></i> Dashboard
                  </a>
                </li>

                <li  data-toggle="collapse" data-target="#products" class="collapsed active">
                  <a href="#"><i class="fa fa-gift fa-lg "></i> UI Elements <span class="arrow"></span></a>
                </li>
                <ul class="sub-menu collapse" id="products">
                    <li><a href="#">CSS3 Animation</a></li>
                    <li><a href="#">General</a></li>
                    <li><a href="#">Buttons</a></li>
                    <li><a href="#">Tabs & Accordions</a></li>
                    <li><a href="#">Typography</a></li>
                    <li><a href="#">FontAwesome</a></li>
                    <li><a href="#">Slider</a></li>
                    <li><a href="#">Panels</a></li>
                    <li><a href="#">Widgets</a></li>
                    <li><a href="#">Bootstrap Model</a></li>
                </ul>


                <li data-toggle="collapse" data-target="#service" class="collapsed">
                  <a href="#"><i class="fa fa-globe fa-lg "></i> Services <span class="arrow"></span></a>
                </li>  
                <ul class="sub-menu collapse" id="service">
                  <li>New Service 1</li>
                  <li>New Service 2</li>
                  <li>New Service 3</li>
                </ul>


                <li data-toggle="collapse" data-target="#new" class="collapsed">
                  <a href="#"><i class="fa fa-car fa-lg"></i> New <span class="arrow"></span></a>
                </li>
                <ul class="sub-menu collapse" id="new">
                  <li>New New 1</li>
                  <li>New New 2</li>
                  <li>New New 3</li>
                </ul>


                 <li>
                  <a href="#">
                  <i class="fa fa-user fa-lg"></i> Profile
                  </a>
                  </li>

                 <li>
                  <a href="#">
                  <i class="fa fa-users fa-lg"></i> Users
                  </a>
                </li>
				 <form id="search_form" method="post">
				 <li>
                  
                  <input type="text" class="form-control" id="search" name="search" placeholder="Search User" required >
                  
                </li>
				
				 <li>
                  <center>
										
				   <input type="submit" name="find" class="btn btn-success" value="Search" id="find">
                 </center>
                </li>
				</form>
				<li>

			 </center>
		  </div>	
         </ul>
     </div>
	 
</div>
</div>
</div>

<script>

$('#menu-content>li').on('click', function(){
	var data_val=$(this).data("target");
	if(data_val == "#service" && !$('*[data-target="#service"]').hasClass("active"))
	{
		
		
$('ul #products').removeClass('sub-menu collapse in');

$('ul #products').fadeOut("slow", function() {
    $('ul #products').addClass("sub-menu collapse out");
});


$('ul #new').removeClass('sub-menu collapse in');

$('ul #new').fadeOut("slow", function() {
    $('ul #new').addClass("sub-menu collapse out");
});


	}

if(data_val == "#products"  && !$('*[data-target="#products"]').hasClass("active"))
{
$('ul #service').removeClass('sub-menu collapse in');

$('ul #service').fadeOut("slow", function() {
    $('ul #service').addClass("sub-menu collapse out");
});


$('ul #new').removeClass('sub-menu collapse in');
$('ul #new').fadeOut("slow", function() {
    $('ul #new').addClass("sub-menu collapse out");
});


	}
	if(data_val == "#new"  && !$('*[data-target="#new"]').hasClass("active"))
{
$('ul #service').removeClass('sub-menu collapse in');

$('ul #service').fadeOut("slow", function() {
    $('ul #service').addClass("sub-menu collapse out");
});



$('ul #products').removeClass('sub-menu collapse in');
$('ul #products').fadeOut("slow", function() {
    $('ul #products').addClass("sub-menu collapse out");
});



	}
	
});

</script>
<?php
if(isset($_REQUEST['find'])) {
	echo "<script> $('#myModal').modal('show');</script> ";
}
?>