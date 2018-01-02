<?
   include 'connect.php';
    //print_r($_POST);
    $name=$_POST["itp_project_name"];
   $main= $_POST["itp_project"];
   //echo $main;
?>

<html>
  <head>
    <title>ITP</title>
    <link rel="image icon" type="image/png" sizes="160x160" href="">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.ui/1.8.9/jquery-ui.js" type="text/javascript"></script>
<link href="http://ajax.aspnetcdn.com/ajax/jquery.ui/1.8.9/themes/blitzer/jquery-ui.css"
    rel="stylesheet" type="text/css" />
    <style type="text/css">
      #log{
        max-width: 200px;
   
    </style>
     </head>
     <body>
     <div  class="container" style="margin-top:50px">
     <div class="row">
    <div class="col-sm-3"  id="log" ><img src="image/logo.png"></div>
    <div class="col-sm-6" style="color: #FA5536;font-weight: bold;font-size: 24px;border:1px solid;border-color: #9d9d9d;height: 10.6vh" >QUALITY MANAGEMENT SYSTEM<br>
<span style="color:#333333;font-size: 12px">Bulk Earthworks (Cut to Fill) (ITP FORM)</span></div>
    <div class="col-sm-3"  style="border:1px solid;border-color: #9d9d9d;" >
          <div style="border-bottom:1px solid ">QMS</div>
          <div style="border-bottom:1px solid ">Doc. Code: C-Q-ITP-0202C</div>
          <div style="border-bottom:1px solid ">Issue Date: TBC</div>
         <div >Issue No: 4</div>
         </div>
  </div>
    
     </div>
      <center>
<br><br><br><br>
        <div style="width: 80vw;">
          <div style="text-align: left;">
            <p style="font-size: 18px;font-family: Arial;font-weight: bold">Inspection Requirements & Checklist</p>
           <!-- <p style="font-size: 14px;font-family: Arial;font-weight: bold">Project: Auto Upload from Business Register</p> -->
          <div>
        <table class="table table-bordered" id="head_table" style="width:80vw;font-size: small;">
          <tr>
            <td style="font-size: 12px;font-family: Arial;border:1px solid black;font-weight: bold;">
             Project:</td>
            
            <td style="font-size: 12px;font-family: Arial;border:1px solid black;font-weight: bold;">Symbion</td>
            <td  style="font-size: 12px;font-family: Arial;border:1px solid black;font-weight: bold;">
             Date: </td>
            
            <td style="font-size: 12px;font-family: Arial;border:1px solid black;font-weight: bold;"">
            <?= date("d/m/Y");?></td>
          </tr>
          <tr style="font-size: 12px;font-family: Arial;border:1px solid black;font-weight: bold;"">
            <td style="font-size: 12px;font-family: Arial;border:1px solid black;font-weight: bold;">
              Site Location: </td>
            
            <td style="font-size: 12px;font-family: Arial;border:1px solid black;font-weight: bold;""> 
            Acacia Ridge</td>
            <td style="font-size: 12px;font-family: Arial;border:1px solid black;font-weight: bold">
             Checklist No:</td>
            
            <td style="font-size: 12px;font-family: Arial;border:1px solid black;font-weight: bold" > 
            </td>
          
          </tr>
          
          
        </table>
        </div>
        </div>
        </div>
         <table id="heading_table" class="table table-bordered" style="width:80vw;font-size: small;">
          <tr>
            <th  colspan="2" style="background-color:#FA5536;color:white;border:1px solid black;text-align: center"><br>
              No
            </th>
            <th  colspan="2" style="background-color: #FA5536;color:white;border:1px solid black;font-weight: bold;text-align: center;"><br>
               Item

            </th>
           
            <th style="background-color: #FA5536;color:white;border:1px solid black;text-align: center"><br>
              Acceptance Criteria 
            </th>
            <th rowspan="2"  colspan="3"  style="background-color: #FA5536;color:white;border:1px solid black;text-align: center"><br>
             Compliance
            </th>
            <th style="background-color: #FA5536;color:white;border:1px solid black;text-align: center"><br>
             Key 
            </th>
            <th  colspan="2" style="background-color: #FA5536;color:white;border:1px solid black;text-align: center"><br>
             CIP Sign
            </th>
            <th  colspan="2" style="background-color: #FA5536;color:white;border:1px solid black;text-align: center"><br>
              Client Sign
            </th>
            <th colspan="2" style="background-color: #FA5536; color:white;border:1px solid black;text-align: center"><br>
             Comments<br>
            </th>
          </tr>
          <table>
          <tr colspan="3">
            <th >Y</th><th >N</th><th >N/A</th>
           </tr>
          </table>
          
      <!--  <?
          $conn = new mysqli('localhost', 'root', '', "itp");
          //echo "select * from tbl_from_data_heading where main_id='".$main."'";
          
           //print_r($row);
            $qry = "select * from tbl_from_data_heading where main_id='".$main."'";
            $result=mysqli_set_charset($conn,"utf8");
            $result = mysqli_query($conn,$qry);

            //$result=mysql_real_escape_string($conn,$qry);
             if(mysqli_num_rows($result)>0)
                   {
                     while($row=mysqli_fetch_array($result))
                     {
                        //print_r($row[1]);
  
                      ?>  -->
              
           <!-- <tr class="highlight">
                <td style="border-bottom:1px solid black;border-right-color:white;border-left:1px solid black;font-weight: bold"><?= $row['index']; ?></td>
                <td colspan="8" style="border-bottom:1px solid black;border-right:1px solid black;font-weight: bold"><?=$row['title'];?><span style="float: right;"><a style="margin-left: 16vh" onclick="add_heading_rows('<?= $row['index']; ?>','<?=$row['id'];?>','<?=$row['title'];?>')">
                       <span class="glyphicon glyphicon-plus"></span></a>
            
           </tr> -->
         <? //echo"select * from tbl_from_data_row where main_id='2' and data_heading='2'";
           //echo "select * from tbl_from_data_row where item_no LIKE '".$row['index']."%' ORDER BY `tbl_from_data_row`.`data_heading` ASC";
           $qry_row = $conn->query("select * from tbl_from_data_row where main_id='".$main."' and data_heading='".$row['id']."'");
           if($qry_row->num_rows >0){
            while($qry_res = $qry_row->fetch_object()){

              ?>
              
              <tr>
                <td style="font-weight: bold;border:1px solid black;"><?=$qry_res->item_no?></td>
                <td style="border:1px solid black;"><?=$qry_res->activity?></td>
                <td style="border:1px solid black;"><?=$qry_res->ref_doc?><br ><SPAN style="background-color:yellow;"><?=$qry_res->ref_doc_input?></SPAN></td>
                <td style="border:1px solid black;"><?=$qry_res->acc_criteria?></td>
                <td style="border:1px solid black;"><?=$qry_res->key?></td>
                <td style="border:1px solid black;"><?=$qry_res->person?></td>
                <td style="border:1px solid black;"></td>
                <td style="border:1px solid black;"></td>
                <td style="border:1px solid black;"><?=$qry_res->comments?></td>
              
              </tr>
           <? }
         }
         ?> -->

                <?}
                }
                 ?>
                 
          
          
            
          

              
          
        </table>
        </center>
     </body>
    
     </html>
