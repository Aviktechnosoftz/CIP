 
 <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" type="text/css" />
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    

  
    

 <meta name="viewport" content="width=device-width,height=device-height,initial-scale=1.0" />

<div class="form-group">
    <label class="col-md-4 control-label" for="rolename">Role Name</label>
    <div class="col-md-4">
        <select id="dates-field2" class="multiselect-ui form-control" multiple="multiple">
            <option value="cheese">Cheese</option>
            <option value="tomatoes">Tomatoes</option>
            <option value="mozarella">Mozzarella</option>
            <option value="mushrooms">Mushrooms</option>
            <option value="pepperoni">Pepperoni</option>
            <option value="onions">Onions</option>
        </select>
    </div>
</div>


<script type="text/javascript">
$(function() {
    $('.multiselect-ui').multiselect({
        includeSelectAllOption: true
    });
});
</script>