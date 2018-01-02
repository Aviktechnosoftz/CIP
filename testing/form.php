<form method="post" action="email.php" enctype="multipart/form-data">
<input type="text" id="contact_name" class="form-control" placeholder="Name" name="user_name"/>
<input type="text" id="contact_email" class="form-control" placeholder="Email Address"     
name="user_mail" <textarea id="contact_message" class="form-control" rows="7" placeholder="Write a 
message" name="user_message"></textarea>
<input name="attachment" type="file">      
<input type="submit" value="Send mail" class="btn btn-primary pull-right"/>
 </form>