<!DOCTYPE html>
<html>
   <head>
      <title></title>
      <? 
         include_once('connect.php');
         	$project_id= $_REQUEST['project'];
         $get_project_details=$conn->query("select * from tbl_project_detail where project_id='".$project_id."'")->fetch_object();
         
         	 ?>
   </head>
   <body style="background: black;text-align: center;">
      <p style="font-size: 2vh; color: gray">
      <b>Project Name:</b> 
         <br>
         <input type="text" name="" value="<?=$get_project_details->project_name?> " style="border-radius: 20vh;border:none;height: 24px;outline: none;padding: 2px 5px 2px 5px" readonly="">
         <br>
         <b> Address:</b><br> 
         <input type="text" name="" value="<?=$get_project_details->project_address ?>" style="border-radius: 20vh;border:none;height: 24px;outline: none;padding: 2px 5px 2px 5px" readonly=""><br> 

         <b> Total Site Area:</b><br>
         <input type="text" name="" value="<?=$get_project_details->total_site_area?>" style="border-radius: 20vh;border:none;height: 24px;outline: none;padding: 2px 5px 2px 5px" readonly=""><br>

         <b>Total Building Area:</b><br> 
         <input type="text" name="" value="<?=$get_project_details->total_building_area   ?>" style="border-radius: 20vh;border:none;height: 24px;outline: none;padding: 2px 5px 2px 5px" readonly=""><br>

         <b>Developer-Builder:</b> <br>
         <input type="text" name="" value="<?=$get_project_details->construction_manager ?>" style="border-radius: 20vh;border:none;height: 24px;outline: none;padding: 2px 5px 2px 5px" readonly=""><br>
         <b> Client:</b><br><input type="text" name="" value="<?=$get_project_details->client ?>" style="border-radius: 20vh;border:none;height: 24px;outline: none;padding: 2px 5px 2px 5px" readonly="">   <br>
         <b> Tenant:</b> 
            <br>
 <input type="text" name="" value="<?=$get_project_details->tenant ?>" style="border-radius: 20vh;border:none;height: 24px;outline: none;padding: 2px 5px 2px 5px" readonly=""><br>
     
         <b> Tenant's Project Manager :</b> 


         <br>
		 <input type="text" name="" value="<?=$get_project_details->project_manager?>" style="border-radius: 20vh;border:none;height: 24px;outline: none;padding: 2px 5px 2px 5px" readonly="">
         <br>
         <b>Construction Manager:</b><br>
		 <input type="text" name="" value="<?=$get_project_details->construction_manager  ?>" style="border-radius: 20vh;border:none;height: 24px;outline: none;padding: 2px 5px 2px 5px" readonly=""> <br>
         <b>Project Engineer:</b><br>
		 <input type="text" name="" value="<?=$get_project_details->project_engineer     ?>" style="border-radius: 20vh;border:none;height: 24px;outline: none;padding: 2px 5px 2px 5px" readonly=""><br>
         <b> Project Manager:</b> <br> 
		 <input type="text" name="" value="<?=$get_project_details->project_address ?>" style="border-radius: 20vh;border:none;height: 24px;outline: none;padding: 2px 5px 2px 5px" readonly=""><br>
         <b>Site Manager:</b> <br><input type="text" name="" value="<?=$get_project_details->site_manager     ?>" style="border-radius: 20vh;border:none;height: 24px;outline: none;padding: 2px 5px 2px 5px" readonly=""><br>
         <b>Foreman:</b><br><input type="text" name="" value="<?=$get_project_details->foreman        ?>" style="border-radius: 20vh;border:none;height: 24px;outline: none;padding: 2px 5px 2px 5px" readonly=""><br> 
         <b>HSR:</b><br><input type="text" name="" value="<?=$get_project_details->safety_representative ?>" style="border-radius: 20vh;border:none;height: 24px;outline: none;padding: 2px 5px 2px 5px" readonly=""> <br>
         <b> Site Engineer:</b><br><input type="text" name="" value="<?=$get_project_details->site_engineer ?>" style="border-radius: 20vh;border:none;height: 24px;outline: none;padding: 2px 5px 2px 5px" readonly="">
      </p>
   </body>
</html>

<style type="text/css">
   input[type="text"]
{
width: 30%
}
</style>