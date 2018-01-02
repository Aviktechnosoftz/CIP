<?
error_reporting(0);
session_start();
include_once('connect.php');
if(!isset($_SESSION['admin']))
{
  header("location:logout.php");
}
else
{
  $user= $_SESSION['admin'];
}
?>
<header>
   <? include('header.php'); ?>
   <? include('test_side_new.php');?>
</header>
<div class="main_form_header">
  <div class="col-md-12" style="padding-top: 14px">
    <div class="col-md-6 main_title_container">
        <legend class="main_title">OCCUPATIONAL HEALTH & SAFETY MANAGEMENT SYSTEM</legend>
        <label class="control-label rightpadding"><span class="form-name">EDIT ACCESS AUTHORITY&nbsp;<?// echo $project_name->project_name ?> </span></label>
        <input type="hidden" name="id" value="<?= $instruction_no->id ?>">   
    </div>
    <div class="col-md-6 form_logo_container">
      <img src="image/logo.png" width="17%" style="image-rendering: -webkit-optimize-contrast;">
    </div>
  </div> 
</div>



<?
$obj=$conn->query("select * from tbl_access where id='".trim($_POST['edit_form'])."'")->fetch_object();
$obj_all=$conn->query("select * from tbl_access");
// print_r($_POST);
if(isset($_POST['edit']) & $_POST['edit']=='true')
    {
    if($_POST['access']!='')
    {
       $qry = $conn->query("update tbl_access set 
                    name = '".trim($_POST['access'])."', modified_date=NOW() where id = '".$_POST['edit_id']."'");
      
        // echo "update tbl_access set 
        //             name = '".trim($_POST['access'])."', modified_date=NOW() where id = '".$_POST['edit_id']."'";
        //             exit();


      $err1 = "Details updated";
       ?>
      <script>
      $( document ).ready(function() {
              var error= '<?=$err1?>';
              
              window.location.href='category.php';
              alert(error);
          });
      </script>
      <?
      }
    }
?>
  <script>
   </script>
  <style>
 body{
  background-color: white;
      }
  label {
    
    font-weight: 100;
    font-style: italic;
}

.form-control {
border-radius: 20vh;
border:none;
    box-shadow: none;
   -webkit-box-shadow: none;
   -moz-box-shadow: none;
   -moz-transition: none;
   -webkit-transition: none;
/*outline: none;
    border: none;
    box-shadow: none;
    -webkit-box-shadow: none;*/
}
.form-control:focus
{
  border:none;
    box-shadow: none;
   -webkit-box-shadow: none;
   -moz-box-shadow: none;
   -moz-transition: none;
   -webkit-transition: none;
}
input.form-control,input.form-control:focus {
    border:none;
    box-shadow: none;
   -webkit-box-shadow: none;
   -moz-box-shadow: none;
   -moz-transition: none;
   -webkit-transition: none;
}

select:focus
{
  border:none;
    box-shadow: none;
   -webkit-box-shadow: none;
   -moz-box-shadow: none;
   -moz-transition: none;
   -webkit-transition: none;
   outline: none;
}     

</style>
</head>

<body onbeforeunload=”HandleBackFunctionality()”>


<div class="Main_Form_list">

      <div class="well form-horizontal well_class" >
      <div class="form-group">
           <div class="col-md-12" style="padding-left: 0px;padding-bottom: 5px;">
                <label class="col-md-12 control-label" style=""><span class="project_title" style="">PROJECT :&nbsp;<? echo $_SESSION['project_name'] ?> </span></label>
            </div>
        </div>
     

   <!--  <div class="row">
      <div class="col-sm-6 col-xs-6">
         <input type='button' value='Back' onclick='back()' style='float:left;margin-top:1vh;margin-left:.3vw;color:white;background-color:#f47821;border:none;outline: none;border-radius:6vh' >
      </div>
      </div> -->
       <div class="row">
      <div class="col-lg-12">
          <form class="form-horizontal" method="post" id="add_ctgry" enctype="multipart/form-data">
              <div class="form-group">
                  <div class="col-sm-10">
                      <input type="hidden" name="edit" value="true" />
                      <input type="hidden" name="edit_id" value="<?=$obj->id?>" />
                  </div>
              </div>
              <div class="form-group">
                  
                  <div class="col-sm-12">
                  <label >Access Name</label>
                      <input class="form-control form-control-left-radius" type="text" name="access" id="access" placeholder="Company Name" value="<?=$obj->name ?>" />
                  </div>
              </div>
             <!--  <div class="form-group">
                  <input class="btn btn-primary" onclick="return validateForm()" type="button" value="Save"  style="margin-top: 1vh;margin-bottom: 1vh;color:white;background-color:#f47821;border:none;outline: none;border-radius:6vh"/>
              </div> -->

                <div class="col-sm-12">
           <div class="col-sm-6">
           <div class="col-sm-6 col-sm-offset-4">             
           <input class="btn btn-primary form_submit_button" onclick="return validateForm()" type="button" value="Save"  style=""/>
            </div>
            </div>


            <div class="col-sm-6">
           <div class="col-sm-6 col-sm-offset-2"> 
                <input type='button' value='Back' onclick='back()'  class="btn btn-primary form_submit_button">
               </div>
            </div> 
           </div>

          </form>
        </div>
    </div>
 




  </div><!---wraper close-->
</div>
<script>
function back(){
  window.location.href='category.php';
}
function validateForm() {
  //if ($('#latlong').prop("checked")==true) {
         if($( "#category_name" ).val() ==''){
          alert('Please fill Category Name');
          $( "#category_name" ).focus();
          return false;
         }
         
   else{
      $('#add_ctgry').submit();
      //window.location.href='event.php';
    return true;
   }
   
  //}  
}

</script>
 <? include_once('footer.php') ?>

 <style >
   
    label {
    
    font-weight: 100;
    font-style: italic;
}

.form-control {
border-radius: 20vh;
border:none;
    box-shadow: none;
   -webkit-box-shadow: none;
   -moz-box-shadow: none;
   -moz-transition: none;
   -webkit-transition: none;
/*outline: none;
    border: none;
    box-shadow: none;
    -webkit-box-shadow: none;*/
}
.form-control:focus
{
  border:none;
    box-shadow: none;
   -webkit-box-shadow: none;
   -moz-box-shadow: none;
   -moz-transition: none;
   -webkit-transition: none;
}
input.form-control,input.form-control:focus {
    border:none;
    box-shadow: none;
   -webkit-box-shadow: none;
   -moz-box-shadow: none;
   -moz-transition: none;
   -webkit-transition: none;
}

select:focus
{
  border:none;
    box-shadow: none;
   -webkit-box-shadow: none;
   -moz-box-shadow: none;
   -moz-transition: none;
   -webkit-transition: none;
   outline: none;
} 

.select2-container--default .select2-selection--single {
    background-color: #fff;
    border: none;
    outline: none;
    border-radius: 10vh;
}

.select2-container--default .select2-search--dropdown .select2-search__field {
    border: 1px solid #aaa;
    outline: none;
}

h4
{
color: #95989a;
    font-size: 2.4vh;
    font-weight: 900;
}
 </style>