   <?
   ?>
   <head>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
   <script>
     var content:    '<form role="form">' +
                            '<div class="form-group">' +
                                '<label>Wildcard:</label>'+
                                '<select name="options" id="wildcarddropdown">' +
                                    '<option value="yes">Yes</option>'+
                                    '<option selected="selected" value="no" >No</option>'+
                                '</select>' +
                            '</div>' +
                            '<div class="wildcard" style="display: none">' +
                                '<div class="form-group">' +
                                    '<label for="inputlabel">Label:</label>'+
                                    '<input type="text" id="inputlabel">' +
                                '</div>' +
                                '<div class="form-group">' +
                                    '<label for="datatype">Data Type:</label>' +
                                    '<select name="datatype" id="datatype">' +
                                        '<option value="numeric">Numeric</option>' +
                                        '<option value="string">String</option>' +
                                   '</select>'+
                                '</div>' +
                            '</div>' +
                             '</form>';

    $('[data-toggle="popover"]').popover({html:true, container:'body', trigger:'click', placement:'bottom', content:wildcardcontent
       });

    var button = $(document).find('#popover');

    $(button).on('click', function(e){

        if($(e.target).data('toggle') !== 'popover' && $(e.target).parents('.popover.in').length === 0) {
            $('[data-toggle="popover"]').popover('hide');
        }

    });


    var dropdown = $(document).find('#wildcarddropdown');

    $(document).on('shown', '[data-toggle="popover"]', function(){
        console.log($(dropdown).val());
    });



 </script>
 </head>

 <body>
     <div>
    <button type="button" id="popover" data-toggle="popover">Popover</button>
</div>
 </body>