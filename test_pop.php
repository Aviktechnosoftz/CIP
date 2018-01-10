

    <div class="container">
  <h3>Bootstrap 3 Popover Form Example</h3>
  <ul class="list-unstyled">
    <li><a data-placement="right" data-toggle="popover" data-title="Login"  type="button" data-html="true" href="#" id="login2">Login</a></li>
    <div id="popover-content" class="hide">
      <form class="form-inline" role="form">
        <div class="form-group">
          <select class="form-control">
            <option>NA</option>
            <option>RU</option>
            <option>EU</option>
            <option>SEA</option>
          </select> 
          <input type="text" placeholder="Name" class="form-control" maxlength="5">
          <button type="submit" class="btn btn-primary">Go To Login »</button>                                  
        </div>
      </form>
    </div>
  </ul>
</div>

<script >
	
	$("[data-toggle=popover]").popover({
    html: true, 
	content: function() {
          return $('#popover-content').html();
        }
});

</script>