<? include('header.php') ?>
<form name="site_mail_msg" id="site_mail_msg"  method="POST" >
          <div class="col-sm-6" style="padding-left: 0">
            <label>Message For Site Induction</label>
            <textarea id="site_msg" placeholder="Message..." rows="3" class="form-control form-control-left-radius"  style="resize: none;"></textarea>
            <!-- <input type="submit" name="site_msg_btn" id="site_msg_btn" style="display: none;">  -->
          </div>
      </form>

      <div class="col-sm-4 col-sm-offset-2">
<input type="button" onclick="site_msg2()" name="" value="Save Message" class="btn btn-success btn-md" style="background-color:#f47821;color: white;border:none;border-radius:10vh;outline: none;" >

</div>
<script type="text/javascript">

       function site_msg2()
{
  if($('#site_msg').val() =="" )
  {
    alert( "Please Enter Site Induction Message");
  }
  else
  {
    alert("ok");
    $('#site_mail_msg').submit();
  }
  
}


</script>