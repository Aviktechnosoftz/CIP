<footer class="footer">

<div class="">
    <span style="float: left;    padding-left: 0vw;   /*  padding-top: 5px;*/
    padding-bottom: 6px;">
    <img class="" src="image/logoCIP.png">
</span>
<span class="bottom_text1 footer_date" ><span style="color: white;text-align: right">Doc. Code:
    C - Q - MG - 001</span><br/>Issue Date: &nbsp <?=date("d M Y") ?><br/>Issue N0: 5</span>


<!-- <span style="float: right;    margin-right: 8.3vw; "> -->
 <!-- <img src="image/footer_new.png" style="position: absolute;  bottom: 3vh;  width: 6vw; ">  -->
<!-- </span> -->
</div>
  
    
</footer>

<style>
    .footer_date {
         padding-left: 14.5vw !important;
         padding-top: 0.5vh !important;
         font-family: 'Avenirnext';
         text-align: right;
        }

	.footer {
        position: fixed !important;
      height: 8vh !important;
      margin-left: 28.5%;
	  /*  position: absolute;*/
    right: 0;
    /* //--sangeeta--//*/
    /*height: 10vh;*/
    bottom: 0;
    left: 0;
    /* padding: 1rem; */
    padding: 0;
   
    background-color: #3D3D3D;
    text-align: center;
}
@media (max-width: 1024px){
.footer{
   height: 10vh !important;  
}
.footer_date {
    padding-left: 10vw !important;
    font-size: 1.2vw !important;
    padding-top: 0.5vh !important;
}
.footerimage{
        width: 12vw !important;
}
}

@media (max-width: 768px){
.footer_date {
    padding-left: 6vw !important;
    font-size: 1.4vw !important;
    padding-top: 0.5vh !important;
}
.footerimage{
        width: 15.5vw !important;
}

</style>

<script>
    $('.bottom_text1').css('color','#AAAAAA');
    $('body').css('background-color','#3D3D3D');
    $('.Main_Form').css('max-height','76%');
    $('.Main_Form').css('min-height','76%');
    $('.Main_Form').css('top','41vh');
    $('.Main_Form').css('overflow-y','auto');
    $('.Main_Form').css('border','none');

      $('.wrapper').css('max-height','76%');
    $('.wrapper').css('min-height','76%');
     $('.wrapper').css('top','41vh');
      $('.wrapper').css('overflow-y','auto');
        $('.wrapper').css('border','none');
        $('.bottom_text').css('color','#7d7d7f');

    

     $('.main_div,#wrapper').css('max-height','76%');
    $('.main_div,#wrapper').css('min-height','76%');
     $('.main_div,#wrapper').css('top','28vh');
      $('.main_div,#wrapper').css('overflow-y','auto');
      $('.main_div,#wrapper').css('border','none');

      $('#wrapper').css('width','270%');

$('.form-control').css('color','#000');
     $('#mbmcpebul_table ul.gradient_menu').css('z-index','999');
     $('select').css('color','#000');
     $('table > caption').css('color','#000');
     $('.well').css('border','none');
     $('.well').css('box-shadow','none');

     $("input[type='text']").css('background-color','#e4e4e4');
       $("input[type='date']").css('background-color','#e4e4e4');
       $("textarea").css('background-color','#e4e4e4');
     $('select').css('background-color','#e4e4e4');
     $("input[type='password']").css('background-color','#e4e4e4');
     
    
</script>