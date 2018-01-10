<h4><span class="label label-info">Please Select The Month</span></h4>
              
    <script>
$(function() {
    var startDate;
    var endDate;
    
    var  selectCurrentWeek = function() {
      alert("ok");
        window.setTimeout(function () {
            $('.week-picker').find('.ui-datepicker-current-day a').addClass('ui-state-active')
        }, 1);
    }
    
    $('.week-picker').datepicker( {
        showOtherMonths: true,
        firstDay: 1,
        selectOtherMonths: true,
    changeMonth: true,
    changeYear: true,
    showWeek: true,
     dateFormat: 'yy-mm-dd',
     maxDate: new Date(),

  

        onSelect: function(dateText, inst) { 

            var date = $(this).datepicker('getDate');
            
            startDate = new Date(date.getFullYear(), date.getMonth(), date.getDate() - date.getDay()+1);
            endDate = new Date(date.getFullYear(), date.getMonth(), date.getDate() - date.getDay() + 1, 0, 23, 59, 59);

            var dateFormat = inst.settings.dateFormat || $.datepicker._defaults.dateFormat;

            $('#startDate2').val($.datepicker.formatDate( dateFormat, startDate, inst.settings ));
            $('#endDate2').val($.datepicker.formatDate( dateFormat, endDate, inst.settings ));
           
            selectMonth();
        },
        beforeShowDay: function(date) {
            return [true, date.getDate() == 1 ? "first-class" : ""];
        },
        onChangeMonthYear: function(year, month, inst) {
            selectCurrentWeek();
        }
    });
    
    $('.week-picker .ui-datepicker-calendar tr').live('mousemove', function() { $(this).find('td a').addClass('ui-state-hover'); });
    $('.week-picker .ui-datepicker-calendar tr').live('mouseleave', function() { $(this).find('td a').removeClass('ui-state-hover'); });
});
</script>
 <div class="week-picker"></div>

   
           </div>
                <div class="col-sm-3 form-group" style="margin:10px" >
                  <h4><span class="label label-info">Month Start Date:</span></h4>
                  <input type="text" id="startDate2" placeholder="Week Start Date" name="start_date_week" class="form-control" value="" readonly>

              </div>
                <div class="col-sm-3 form-group" style="margin:10px" >
                  <h4><span class="label label-info">Month End Date:</span></h4>
                  <input type="text" id="endDate2" placeholder="Week End Date"  name="end_date_week" class="form-control" value="" readonly>

              </div>