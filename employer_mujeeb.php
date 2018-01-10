<?php
error_reporting(0);
session_start();
//print_r($_POST);

include_once('connect.php');
if(!isset($_SESSION['admin']))
{
  header("location:logout.php");
}
else
{
  $user= $_SESSION['admin'];
}

if($_POST['del_tech']!=''){
   $data = $conn->query("update tbl_employer set is_deleted=1,modified_date where id = '".$_POST['del_id']."'"); 

   $data2 = $conn->query("update tbl_project_register set is_deleted=1,modified_date=NOW() where employer_id = '".$_POST['del_id']."'"); 
  
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="https://www.w3.org/1999/xhtml">
<head>
<header>
    <? include_once('header.php') ?>
</header>

  <script>
/*  $("#add_catgry").click(function(){
   alert('test');
});*/
  function catadd()
{
  //alert('test');
  window.location.href='add_employer.php';
}
  </script>
 
</head>

<body>



<div id="container" >

  <div id="container">
    <? include('test_side_new.php');?>
       
         <div class= "main_div" style="border: 1px solid grey;
    float: left;
    position: absolute;
    /* margin: -220px 0 0 -200px; */
    margin-top: -25vh;
    top: 25vh;
    left: 52.8vh;
    width: 72.5vw;
    background-color: #f5f5f5;
    border-radius: 4px;
    overflow-y: scroll;
    max-height: 100%;">
      
    <!-- <div style="min-height:640px; border: 1px solid rgba(128, 128, 128, 0.57);  width:92%; background-color:#f5f5f5;border-radius: 10px;"> -->
      <span style="color:green;" id='err'><?=$err?></span>
      <span style="color:green;" id="edit_gifimage"></span>
      
      <div style="margin-left: 1vh;width: 14vh;float: left;">
        <input type='button' class="btn btn-primary" value='Add New' style="cursor:pointer; width: 6vw; background-color:#f47821;color: white;border:none;border-radius:10vh;outline: none; border:none; outline: none;font-size: 1.8vh;margin-top: 2vh;" id='add_employer' onclick="catadd();">
            <!-- </strong>Search:</strong>  -->
            <!-- <input id='filter_rep' type="text" list='desc_list' style="width: 16vw; height:3vh;" oninput="filter(this.value,$('#user'))"> -->
      </div><h2 align="center" style="background-color: #f5f5f5;margin-top: 2vh;"> <span style="font-size:3vh;text-align:left;line-height:1.5;color: #DF5430;font-family: Helvetica_Nue;font-weight: 200">Employer/ Business Register</h2>
    <center>
      <table  class="table table-hover" style='border: 1px solid rgba(128, 128, 128, 0.57);'>
          <tr style="background-color: #696969; color: white;">
            
            <th>Employer/ Business</th>
            <th>Trade</th>
            <th>Contact Person</th>
            <th>Phone No.</th>
            <th>Email Address</th>
            <th>Address</th>
            <th style="text-align: center;">Update</th>
            <th style="text-align: center;">Delete</th>
          </tr>

         <tbody style="" id='user'>
              <?//echo "select * from tbl_category"; 
              
              $result = $conn->query("select * from tbl_employer where project_id='".$_SESSION['admin']."' order by id desc");
              
              while($row=$result->fetch_object())
                {?>
              
              <tr style="background-color: #F0FFFF; font-size: 15px;"> 
              
                <td ><?=$row->company_name?></td>
                <td ><?=$row->Tread?></td>
                <td ><?=$row->contact_person?></td>
                <td ><?=$row->phone_no?></td>
                <td ><?=$row->email_add?></td>
                <td ><?=$row->address?></td>
                <td align="center">
                  <form id="edit_form<?=$row->id?>" method="post" action="edit_employer.php" >
                  <input type="hidden"  name="edit_form" value="<?=$row->id?>" />
                  <input type="submit" class="btn btn-primary" class="button edit_click1" value="Edit" style="cursor:pointer; width: 6vw; background-color:#f47821;color: white;border:none;border-radius:10vh;outline: none; border:none; outline: none;font-size: 1.6vh" /> 
                </form>  
                </td>
                <td>
                  <form id="del<?=$row->id?>" method="post" action="employer.php" >
                     <input type="hidden" name="del_tech" value="<?=$row->company_name?>" />
                     <input type="hidden" name="del_id" value="<?=$row->id?>" />
                      <input type="button" class="btn btn-primary" class="button" value="Delete" style="cursor:pointer; width: 6vw; background-color:#f47821;color: white;border:none;border-radius:10vh;outline: none; border:none; outline: none;font-size: 1.6vh" onclick='del(<?=$row->id?>)'/>
                  </form>
                
                </td>
                
              </tr>
             <? } ?>
          </tbody> 
      </table>
  <!--   </div> -->
    
    </center>
  </div><!---wraper close-->
        </div>
</div><!--container close-->

</body>
</html>
<script>


/*function catadd()
{
  alert('test');
 // window.location.href='add_category.php';
}*/
/*function filter(text_data, jo_object) {
  alert(jo_object);
        jo = jo_object.find('tr');

        var data4 = capitalize(text_data.trim());
        var data5 = text_data.toLowerCase().trim();
        var data6 = text_data.toUpperCase().trim();
        var data7 = text_data.trim();

        jo.hide();
        jo.filter(function(i, v) {
            var $t = $(this);

            if (($t.is(":contains('" + data4 + "')")) || ($t.is(":contains('" + data5 + "')")) || ($t.is(":contains('" + data6 + "')")) || ($t.is(":contains('" + data7 + "')"))) {
                return true;
            }

            return false;
        }).show();
    }*/

function del(id){
ysorn = confirm("Are you want to delete Employer ?");
if(ysorn)
$('#del'+id).submit();
}
</script>
 <? include_once('footer.php') ?>

 <style>
    th {
    
    font-weight: 100;
    font-style: italic;
}

td {
    /*border: 1px solid black;*/
    word-wrap:break-word;
}

table {
border-collapse: collapse;
    table-layout: fixed;
    width:100%
}


 </style>