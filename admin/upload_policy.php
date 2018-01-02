<?
include('session_login.php');
include_once('connect.php');
error_reporting(0);
$get_project_details=$conn->query("select * from tbl_project_detail where is_archieved !=1");
$get_project_details2=$conn->query("select * from tbl_project_detail where is_archieved !=1");
$get_min=$conn->query("select MIN(id) as min from tbl_project_detail")->fetch_object();
$get_archieved=$conn->query("select count(*) as count from tbl_project_detail where is_archieved=1")->fetch_object();
$get_policy=$conn->query("Select * from tbl_policy where id='1'")->fetch_object();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Light Bootstrap Dashboard by Creative Tim
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>
    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <!--  <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet"> -->
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
    </script>
    <?//include 'header_dash.php'; ?>
  </head>
  <body>
    <?include 'sidepanel.php'; ?>
    <div class="content" style="">
      <div class="container-fluid" style="padding: 0">
        <div class="row nomargin">
          <div class="col-md-12" style="padding:0px">
            <div class="card" style=" ">
              
              <div class="content"  style="max-height:87vh; padding-bottom: 0px !important;overflow-y: hidden;">
                <div class="row nomargin" id="content_1">
           <div class="form-group">  
  <div class="col-md-4 box text-center" >
    <label class="btn btn-primary" style="border: none">

      <img src="../image/safety_icon.png" alt="..." class="img-thumbnail img-check" value="sa_policy" title="Safety Policy">
      <input type="radio" name="chk1" id="item4" value="val1" class="hidden radio_policy" autocomplete="off">
    </label>
  </div>
  <div class="col-md-4 box text-center">
    <label class="btn btn-primary" style="border: none">
      <img src="../image/quality_icon.png" alt="..." class="img-thumbnail img-check" value="qa_policy" title="Quality Policy">
      <input type="radio" name="chk1" id="item4" value="val2" class="hidden radio_policy" autocomplete="off">
    </label>
  </div>
  <div class="col-md-4 box text-center">
    <label class="btn btn-primary" style="border: none">
      <img src="../image/environment_icon.png" alt="..." class="img-thumbnail img-check" value="ev_policy" title="Environment Policy">
      <input type="radio" name="chk1" id="item4" value="val3" class="hidden radio_policy" autocomplete="off">
    </label>
  </div>

  
  
</div>
</div>
<div class="form-group">
  <div class="col-md-4  text-center">
    <span class="label label-info label_text_image" >Safety Policy</span>
  </div>
  <div class="col-md-4  text-center">
    <span class="label label-info label_text_image" >Quality Policy</span>
  </div>
  <div class="col-md-4  text-center">
    <span class="label label-info label_text_image" >Environment Policy</span>
  </div>
</div>

 <div class="fileupload fileupload-new col-md-12" data-provides="fileupload">
  <!-- <div class="col-md-4 col-md-offset-4"> -->
      <span class="btn btn-primary btn-file col-md-2 col-md-offset-5" id="btn_upload"><span class="fileupload-new">Select file</span>
    <span class="fileupload-exists ">Change</span>         <input type="file"  name="music" accept="doc,pdf,rtf,docx"/></span>
    <span class="fileupload-preview col-md-5 col-md-offset-2" style="display: none;"></span>
    <a href="#" class="close fileupload-exists col-md-2" data-dismiss="fileupload" id="reset_modal" style="float: none" style="display: none;">×</a>
  <!-- </div> -->
  
  </div>


<div class="col-sm-12" id="iframe_view_safety" style="display: none">
  <iframe id="safety" src="https://docs.google.com/gview?url=http://cipropertyapp.com/API/Uploads/<?=$get_policy->safety_policy ?>&embedded=true" style="   
    width: 100%;height: 60vh" frameborder="0"></iframe>
</div>

<div class="col-sm-12" id="iframe_view_quality" style="display: none">
  <iframe  id="quality" src="https://docs.google.com/gview?url=http://cipropertyapp.com/API/Uploads/<?=$get_policy->quality_policy?>&embedded=true" style="   
    width: 100%;height: 60vh" frameborder="0"></iframe>
</div>

<div class="col-sm-12" id="iframe_view_environment" style="display: none">
  <iframe  id="environment" src="https://docs.google.com/gview?url=http://cipropertyapp.com/API/Uploads/<?=$get_policy->environmental_policy?>&embedded=true" style="   
    width: 100%;height: 60vh" frameborder="0"></iframe>
</div>



  <script type="text/javascript">
    $("input[type=file]").on("change",function(){
    formdata = new FormData();
   console.log(formdata);
   
    if($(this).prop('files').length > 0)
    {
      var files = $("input[type=file]")[0].files[0];
        console.log(files.type);
        if(files.type!= "application/pdf" &&  files.type!= "application/vnd.openxmlformats-officedocument.wordprocessingml.document")
        {
          alert("Only PDF Or Doc File Extension is Allowed");
        return false;
        }
        file =$(this).prop('files')[0];
        formdata.append("music", file);
         console.log(formdata);
            if(checked_policy == "sa_policy")
            {
          jQuery.ajax({
    url: "ajax_upload_policy_safety.php",
    type: "POST",
    data: formdata,
    processData: false,
    contentType: false,
    success: function (result) {
    $('#safety').attr('src',"https://docs.google.com/gview?url=http://cipropertyapp.com/API/Uploads/"+result+"&embedded=true");
         // alert(result);
         // play the audio file
                           }
      });
        }



          if(checked_policy == "qa_policy")
            {
          jQuery.ajax({
    url: "ajax_upload_policy_quality.php",
    type: "POST",
    data: formdata,
    processData: false,
    contentType: false,
    success: function (result) {

       $('#quality').attr('src',"https://docs.google.com/gview?url=http://cipropertyapp.com/API/Uploads/"+result+"&embedded=true");


         // alert(result);
         // play the audio file
                           }
      });
        }


          if(checked_policy == "ev_policy")
            {
          jQuery.ajax({
    url: "ajax_upload_policy_environment.php",
    type: "POST",
    data: formdata,
    processData: false,
    contentType: false,
    success: function (result) {
      // alert(result);
          $('#environment').attr('src',"https://docs.google.com/gview?url=http://cipropertyapp.com/API/Uploads/"+result+"&embedded=true");
                           }
      });
        }


       
    }
});

   

  </script>

                        
                  </div>
                 
               
                 
                <!-- <div class="footer">
                  <div class="legend">
                   
                  </div>
                
                </div> -->
              </div>
            </div>
          </div>
        </div>
     
      </div>
    </div>
   
  </body>
</html>
<style>
 
  .carousel{
    margin-top: 0px;
  }
  .carousel .item{
    height: 174px;
    /* Prevent carousel from being distorted if for some reason image doesn't load */
  }
  .carousel .item img{
    margin: 0 auto;
    /* Align slide image horizontally center */
  }
  .bs-example{
    margin: 0px;
  }
  .carousel-control.left, .carousel-control.right {
    background-image: none
  }
  .carousel-indicators {
    bottom: -24px;
  }
  .carousel-indicators li {
    background-color: #D8D8D8;
  }
  .carousel-indicators .active {
    background-color: #888888;
  }
  .carousel-inner>.item>img{
    height: 100%;
  }
  .middle {
    display: block;
    -webkit-margin-before: .5em;
    -webkit-margin-after: 1em;
    -webkit-margin-start: 0px;
    -webkit-margin-end: 0px;
    -webkit-padding-start: 40px;
    padding-left: 0;
    padding-right: 0;
  }
  .bootstrap-tagsinput {
    background-color:#F0F0F0;
    border: none;
    outline: none;
    box-shadow: none;
    display: inline-block;
    padding: 4px 6px;
    color: #555;
    border-radius: 4px;
    max-width: 100%;
    line-height: 5vh;
    cursor: text;
  }
  /*   .bootstrap-tagsinput .tag {
  margin-right: 2px;
  color: #C9C9C9;
  }*/
  .nomargin
  {
    margin: 0px;
  }
  @media (min-width: 768px)
  {
    .col-sm-offset-2 {
      margin-left: 19.666667%;
    }
  }
  .thumb
  {
    height:50px;
    width: 70%;
    margin-top: 20px;
    background: #FFFFFF;
    border:1px solid #E9E9E9;
  }
  #content_3
  {
    /*background: rgba(203, 203, 210, 0.15);*/
  }
  .thumb .notification
  {
    position: absolute;
    background-color: #424242;
    text-align: center;
    border-radius: 10px;
    min-width: 36px;
    padding: 0 5px;
    height: 18px;
    font-size: 12px;
    color: #FFFFFF;
    font-weight: bold;
    line-height: 18px;
    top: 10px;
    /* left: 7px; */
    margin-left: -18px;
  }
  .img-rounded {
    border-radius: 15px;
    margin-left: 5vw;
  }
  ::-webkit-scrollbar {
    width: 7px;
  }
  ::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
    border-radius: 10px;
    border-top-left-radius: 0;
    border-bottom-left-radius: 0;
  }
  ::-webkit-scrollbar-thumb {
    border-radius: 10px;
    border-radius: 10px;
    border-top-left-radius: 0;
    border-bottom-left-radius: 0;
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.5);
  }
  .carousel-indicators .active {
    display: inline-block;
    width: 10px;
    height: 10px;
    margin: 1px;
    text-indent: -999px;
    cursor: pointer;
    /*background-color: #000\9;*/
    background-color: #888888;
    border: 1px solid #fff;
    border-radius: 10px;
  }
  .carousel-indicators {
    left: 50%;
  }
  .carousel.fade {
    opacity: 1;
  }
  .carousel.fade .item {
    transition: opacity ease-out .7s;
    left: 0;
    opacity: 0;
    /* hide all slides */
    top: 0;
    position: absolute;
    width: 100%;
    display: block;
  }
  .carousel.fade .item:first-child {
    top: auto;
    opacity: 0;
    /* show first slide */
    position: relative;
  }
  .carousel.fade .item.active {
    opacity: 1;
  }
  .overlay{
    position: absolute;
    top: 0px;
    border-radius: 2vh;
    left: 0px;
    height: 100%;
    width: 100%;
    opacity: 0.5;
    background: -moz-linear-gradient(90deg, rgba(255,5,34,1) 0%, rgba(255,42,18,1) 32%, rgba(252,41,17,1) 33%, rgba(149,38,12,0) 79%, rgba(102,38,11,0) 100%);
    /* ff3.6+ */
    background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, rgba(102,38,11,0)), color-stop(21%, rgba(149,38,12,0)), color-stop(67%, rgba(252,41,17,1)), color-stop(68%, rgba(255,42,18,1)), color-stop(100%, rgba(255,5,34,1)));
    /* safari4+,chrome */
    background: -webkit-linear-gradient(90deg, rgba(255,5,34,1) 0%, rgba(255,42,18,1) 32%, rgba(252,41,17,1) 33%, rgba(149,38,12,0) 79%, rgba(102,38,11,0) 100%);
    /* safari5.1+,chrome10+ */
    background: -o-linear-gradient(90deg, rgba(255,5,34,1) 0%, rgba(255,42,18,1) 32%, rgba(252,41,17,1) 33%, rgba(149,38,12,0) 79%, rgba(102,38,11,0) 100%);
    /* opera 11.10+ */
    background: -ms-linear-gradient(90deg, rgba(255,5,34,1) 0%, rgba(255,42,18,1) 32%, rgba(252,41,17,1) 33%, rgba(149,38,12,0) 79%, rgba(102,38,11,0) 100%);
    /* ie10+ */
    background: linear-gradient(0deg, rgba(255,5,34,1) 0%, rgba(255,42,18,1) 32%, rgba(252,41,17,1) 33%, rgba(149,38,12,0) 79%, rgba(102,38,11,0) 100%);
    /* w3c */
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#66260B', endColorstr='#FF0522',GradientType=0 );
    /* ie6-9 */
  }
  .item{
    position: relative;
  }
  /*.item:nth-child(1) {    background-color: red;}.item:nth-child(2) {    background: rgba(23, 23, 23, 0.7);}.item:nth-child(3) {    background: rgba(23, 23, 23, 0.7);}.item:nth-child(4) {    background: rgba(23, 23, 23, 0.7);}*/
</style>
<style>
  #edit_icon
  {
    background-color: #424242;
    color: #ffffff;
    border-radius: 6vh;
    font-size: 19px;
    font-weight: 100;
    position: absolute;
    z-index: 100;
    top: 0px;
    padding-top: 3px;
    width: 25px;
    left: 88%;
    height: 25px;
    cursor: pointer;
  }
  <!-- pencil square edit -->
  <!-- pencil square edit  end-->
</style>

 <style type="text/css">
                    .check
{
    opacity:0.3;
  color:#9966cc;
  border: 5px solid red;
}
.box{
    margin-bottom:0px;
}
.label_text_image
{
  background-color: #F56B2F !important;
    color: white !important;
    font-size: 18px !important;
    font-weight: 100 !important;
    padding: 5px !important;
}
                  </style> 

                  

                  <style type="text/css">
                    .btn-file{overflow:hidden;position:relative;vertical-align:middle;}.btn-file>input{position:absolute;top:0;right:0;margin:0;opacity:0;filter:alpha(opacity=0);transform:translate(-300px, 0) scale(4);font-size:23px;direction:ltr;cursor:pointer;}
.fileupload{margin-bottom:9px;margin-top: 15px;}.fileupload .uneditable-input{display:inline-block;margin-bottom:0px;vertical-align:middle;cursor:text;}
.fileupload .thumbnail{overflow:hidden;display:inline-block;margin-bottom:5px;vertical-align:middle;text-align:center;}.fileupload .thumbnail>img{display:inline-block;vertical-align:middle;max-height:100%;}
.fileupload .btn{vertical-align:middle;}
.fileupload-exists .fileupload-new,.fileupload-new .fileupload-exists{display:none;}
.fileupload-inline .fileupload-controls{display:inline;}
.fileupload-new .input-append .btn-file{-webkit-border-radius:0 3px 3px 0;-moz-border-radius:0 3px 3px 0;border-radius:0 3px 3px 0;}
.thumbnail-borderless .thumbnail{border:none;padding:0;-webkit-border-radius:0;-moz-border-radius:0;border-radius:0;-webkit-box-shadow:none;-moz-box-shadow:none;box-shadow:none;}
.fileupload-new.thumbnail-borderless .thumbnail{border:1px solid #ddd;}
.control-group.warning .fileupload .uneditable-input{color:#a47e3c;border-color:#a47e3c;}
.control-group.warning .fileupload .fileupload-preview{color:#a47e3c;}
.control-group.warning .fileupload .thumbnail{border-color:#a47e3c;}
.control-group.error .fileupload .uneditable-input{color:#b94a48;border-color:#b94a48;}
.control-group.error .fileupload .fileupload-preview{color:#b94a48;}
.control-group.error .fileupload .thumbnail{border-color:#b94a48;}
.control-group.success .fileupload .uneditable-input{color:#468847;border-color:#468847;}
.control-group.success .fileupload .fileupload-preview{color:#468847;}
.control-group.success .fileupload .thumbnail{border-color:#468847;}
                  </style>  
<script>
  $('.carousel').carousel({
    interval: 10000000
  }
                         );
  function show_thumbnail()
  {
    $("#content_1").show();
    $("#content_2").show();
    $("#content_3").hide();
    $('#thumb_view').css("opacity", "1");
    $('#list_view').css("opacity", "0.2");
  }
  function show_list()
  {
    $("#content_1").hide();
    $("#content_2").hide();
    $("#content_3").show();
    $('#list_view').css("opacity", "1");
    $('#thumb_view').css("opacity", "0.2");
  }
  $(document).ready(function(){
    $("#content_1").show();
    $("#content_2").show();
    $("#content_3").hide();
  }
                   );
  function redirect_homepage(project_id)
  {
    $.ajax(
      {
        url:"ajax_redirect_home.php",
        type:"POST",
        data:"project_id="+project_id,
        success: function(data)
        {
          if(data == "1")
          {
            window.location.href="../header_home.php";
            // window.open('../header_home.php', '_blank');
          }
        }
      }
    );
  }
</script>
<script>
  $(document).ready(function() {
    $('.draggable').on('dragstart', function(e){
      source_id = $(this).attr('id');
      // isarchieved = $(this).attr('alt');
      // var isarchievedvar =  document.getElementById("isarchieved").value;
      // document.getElementByID(getarchived).innerhtml = source_id;
      e.originalEvent.dataTransfer.setData("source_id", source_id);
    }
                      );
    $("#cart-item").on('dragenter', function (e){
      e.preventDefault();
      $(this).css('background', '#DF5430');
    }
                      );
    $("#cart-item").on('dragover', function (e){
      e.preventDefault();
      // document.getElementById("getarchived").style.backgroundColor="red";
      // $(this).css('background', '');
    }
                      );
    $("#cart-item").on('drop', function (e){
      // var source_id = $(this).attr('id');
      //  alert(source_id);
      // document.getElementById("getarchived").innerHTML = source_id;
      e.preventDefault();
      $(this).css('background', '#404040');
      // $(this).css('color', '#FAFAFA');
      // $(".alarchived").css('color', '#FAFAFA');
      // $( "#" + source_id ).addClass( "selectDisable" );
      $.ajax({
        url: 'archived.php',
        // dataType: "text",
        type: "POST",
        // data: data,
        data: {
          source_id:source_id}
        ,    
        success: function (data) {
          alert(data);
          location.reload();
          // window.location.href = '';
        }
        ,
        error: function (jqXHR, responseText, textStatus) {
          alert("not done");
          alert(jqXHR.responseText);
          // window.location.href = '';
        }
      }
            );
    }
                      );
  }
                   );
  function archieve_click(source_id)
  {
    $.ajax({
      url: 'archived.php',
      // dataType: "text",
      type: "POST",
      // data: data,
      data: {
        source_id:source_id}
      ,    
      success: function (data) {
        alert(data);
        location.reload();
        // window.location.href = '';
      }
      ,
      error: function (jqXHR, responseText, textStatus) {
        alert("not done");
        alert(jqXHR.responseText);
        // window.location.href = '';
      }
    }
          );
  }
</script>


<script type="text/javascript">
   $(document).ready(function(e){
        var checked_policy="";
        $('#btn_upload').attr("disabled", "disabled");
        $('input[type="file"]').attr('disabled', true);
      $('.img-check').click(function(e) {
        $('#reset_modal')[0].click();
         $('#btn_upload').attr("disabled", false);
        $('input[type="file"]').attr('disabled', false);
        $('#iframe_view').show();
        $('.img-check').not(this).removeClass('check')
        .siblings('input').prop('checked',false);
      $(this).addClass('check')
            .siblings('input').prop('checked',true);
    });
      
  });

                    $('.img-check').click(function(){
                       var value = $(this).attr('value');
                      checked_policy=value;
                      if(checked_policy == 'sa_policy')
                      {
                            $('#iframe_view_safety').show();
                            $('#iframe_view_quality').hide();
                            $('#iframe_view_environment').hide();
                      }

                      if(checked_policy == 'qa_policy')
                      {
                            $('#iframe_view_safety').hide();
                            $('#iframe_view_quality').show();
                            $('#iframe_view_environment').hide();
                      }

                      if(checked_policy == 'ev_policy')
                      {
                            $('#iframe_view_safety').hide();
                            $('#iframe_view_quality').hide();
                            $('#iframe_view_environment').show();
                      }


                      });
</script>

<script type="text/javascript">
                   

//file Upload
!(function(e) {
  var t = function(t, n) {
    (this.$element = e(t)),
      (this.type =
        this.$element.data("uploadtype") ||
        (this.$element.find(".thumbnail").length > 0 ? "image" : "file")),
      (this.$input = this.$element.find(":file"));
    if (this.$input.length === 0) return;
    (this.name = this.$input.attr("name") || n.name),
      (this.$hidden = this.$element.find(
        'input[type=hidden][name="' + this.name + '"]'
      )),
      this.$hidden.length === 0 &&
        ((this.$hidden = e('<input type="hidden" />')),
        this.$element.prepend(this.$hidden)),
      (this.$preview = this.$element.find(".fileupload-preview"));
    var r = this.$preview.css("height");
    this.$preview.css("display") != "inline" &&
      r != "0px" &&
      r != "none" &&
      this.$preview.css("line-height", r),
      (this.original = {
        exists: this.$element.hasClass("fileupload-exists"),
        preview: this.$preview.html(),
        hiddenVal: this.$hidden.val()
      }),
      (this.$remove = this.$element.find('[data-dismiss="fileupload"]')),
      this.$element
        .find('[data-trigger="fileupload"]')
        .on("click.fileupload", e.proxy(this.trigger, this)),
      this.listen();
  };
  (t.prototype = {
    listen: function() {
      this.$input.on("change.fileupload", e.proxy(this.change, this)),
        e(this.$input[0].form).on(
          "reset.fileupload",
          e.proxy(this.reset, this)
        ),
        this.$remove &&
          this.$remove.on("click.fileupload", e.proxy(this.clear, this));
    },
    change: function(e, t) {
      if (t === "clear") return;
      var n =
        e.target.files !== undefined
          ? e.target.files[0]
          : e.target.value
            ? { name: e.target.value.replace(/^.+\\/, "") }
            : null;
      if (!n) {
        this.clear();
        return;
      }
      this.$hidden.val(""),
        this.$hidden.attr("name", ""),
        this.$input.attr("name", this.name);
      if (
        this.type === "image" &&
        this.$preview.length > 0 &&
        (typeof n.type != "undefined"
          ? n.type.match("image.*")
          : n.name.match(/\.(gif|png|jpe?g)$/i)) &&
        typeof FileReader != "undefined"
      ) {
        var r = new FileReader(),
          i = this.$preview,
          s = this.$element;
        (r.onload = function(e) {
          i.html(
            '<img src="' +
              e.target.result +
              '" ' +
              (i.css("max-height") != "none"
                ? 'style="max-height: ' + i.css("max-height") + ';"'
                : "") +
              " />"
          ),
            s.addClass("fileupload-exists").removeClass("fileupload-new");
        }),
          r.readAsDataURL(n);
      } else
        this.$preview.text(n.name),
          this.$element
            .addClass("fileupload-exists")
            .removeClass("fileupload-new");
    },
    clear: function(e) {
      this.$hidden.val(""),
        this.$hidden.attr("name", this.name),
        this.$input.attr("name", "");
      if (navigator.userAgent.match(/msie/i)) {
        var t = this.$input.clone(!0);
        this.$input.after(t), this.$input.remove(), (this.$input = t);
      } else this.$input.val("");
      this.$preview.html(""),
        this.$element
          .addClass("fileupload-new")
          .removeClass("fileupload-exists"),
        e && (this.$input.trigger("change", ["clear"]), e.preventDefault());
    },
    reset: function(e) {
      this.clear(),
        this.$hidden.val(this.original.hiddenVal),
        this.$preview.html(this.original.preview),
        this.original.exists
          ? this.$element
              .addClass("fileupload-exists")
              .removeClass("fileupload-new")
          : this.$element
              .addClass("fileupload-new")
              .removeClass("fileupload-exists");
    },
    trigger: function(e) {
      this.$input.trigger("click"), e.preventDefault();
    }
  }),
    (e.fn.fileupload = function(n) {
      return this.each(function() {
        var r = e(this),
          i = r.data("fileupload");
        i || r.data("fileupload", (i = new t(this, n))),
          typeof n == "string" && i[n]();
      });
    }),
    (e.fn.fileupload.Constructor = t),
    e(document).on(
      "click.fileupload.data-api",
      '[data-provides="fileupload"]',
      function(t) {
        var n = e(this);
        if (n.data("fileupload")) return;
        n.fileupload(n.data());
        var r = e(t.target).closest(
          '[data-dismiss="fileupload"],[data-trigger="fileupload"]'
        );
        r.length > 0 && (r.trigger("click.fileupload"), t.preventDefault());
      }
    );
})(window.jQuery);


                  </script> 
