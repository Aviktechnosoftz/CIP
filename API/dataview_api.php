<? 
   $conn = new mysqli("127.0.0.1","checklist_form","checklist_form","checklist_form");
   // include_once('connect.php');
   $project_id= $_REQUEST['project'];
   $get_project_details=$conn->query("select * from tbl_project_detail where project_id='".$project_id."'")->fetch_object();
?>

<!DOCTYPE html>
  <html>
    <head>
      <title></title>
      <style type="text/css">
        @font-face 
        {
          font-family: 'Avenirnext';
          src: url('../fonts/AvenirNextLTPro-Regular.otf');
        }
        @font-face 
        {
          font-family: 'Avenirnextbold';
          src: url('../fonts/AvenirNextLTPro-Bold.otf');
        }
        @font-face 
        {
          font-family: 'Avenirnextitalic';
          src: url('../fonts/AvenirNextLTPro-It.otf');
        }
        @font-face 
        {
          font-family: 'Avenirnextmedium';
          src: url('../fonts/avenir-next-lt-pro-medium-596dfa60711d1.otf');
        }

        .container {padding: 50px}
        input[type="text"]
        {
          width: 100%;
          border-radius: 20vh;
          border: none;
          height: 35px;
          outline: none;
          padding: 2px 5px 2px 20px;
        }




        /*.rowdith {width: 30%}
        */
        /*@media only screen 
        and (max-device-width : 768px){ input[type="text"]
        {
        width: 100%
        }}*/
        .title
        {
          font-size: 16px;
          /*float: left;margin-left: 35%;*/
          text-align: center;
          color: #7D7E7E;
          /*font-weight: bold;*/
        }
        .title2
        {
          font-size: 14px;    
        }
        @media only screen and (min-device-width : 768px) and (max-device-width : 1024px) and (orientation : landscape) 
        { 
          input[type="text"]{width: 100%}
          .container {padding: 40px;}
        }

        @media only screen and (min-device-width : 768px) and (max-device-width : 1024px) and (orientation : portrait) 
        {
          input[type="text"]{width: 100%}
          .container {padding: 40px;}
        }
  
        @media screen and (min-device-width : 320px) and (max-device-width : 480px)
        {
          input[type="text"]{width: 100%}
          .container {padding: 0px;}
        }
        p
        {
          margin: 0;
          font-size: 2vh; 
          color: gray;
        }

        ::-webkit-scrollbar 
  {
    width: 7px;
    background: lightgrey;
  }

  ::-webkit-scrollbar-track 
  {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
    border-radius: 10px;
    border-top-left-radius: 0;
    border-bottom-left-radius: 0;
  }
 
  ::-webkit-scrollbar-thumb 
  {
    border-radius: 10px;
    border-radius: 10px;
    border-top-left-radius: 0;
    border-bottom-left-radius: 0;
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.5); 
    background: #F6F6F6;
  }
      </style>
   </head>
   <body style="background:#F5F5F5;font-family: Avenirnext;">
      <div class="container">
      <p>
        <div class="title" style="">Construction Manager:</div><br>
		    <input  type="text" class="title2" name="" value="<?=$get_project_details->construction_manager ?>" readonly=""> <br>

        <br><div class="title">Project Engineer:</div><br>
		    <input type="text" class="title2" name="" value="<?=$get_project_details->project_engineer     ?>" readonly=""><br>

        <br><div class="title"> Project Manager:</div><br> 
		    <input type="text" class="title2" name="" value="<?=$get_project_details->project_address ?>" readonly=""><br>

        <br><div class="title">Site Manager:</div><br>
        <input type="text" class="title2"  name="" value="<?=$get_project_details->site_manager ?>" readonly=""><br>

        <br><div class="title">Foreman:</div><br><input type="text" class="title2" name="" value="<?=$get_project_details->foreman ?>" readonly=""><br>

        <br><div class="title">HSR:</div><br>
        <input type="text" class="title2" name="" value="<?=$get_project_details->safety_representative ?>" readonly=""> <br>

        <br><div class="title">Site Engineer:</div><br>
        <input type="text" name="" class="title2" value="<?=$get_project_details->site_engineer ?>" readonly=""><br>
        <br><div class="title">Contracts Administrator:</div><br>
        <input type="text" name="" class="title2" value="<?=$get_project_details->contract_admin ?>" readonly="">
      </p>
   </body>
</div>
</html>
