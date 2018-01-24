/** DATEPICKER **/
 $('#datepicker .date').datepicker({
        'format': 'yyyy-mm-dd',
        'autoclose': true
 });

/** LOADER **/
function showLoading() {
    $("#loader").show();
  }
  var loadingTimeout = setTimeout(showLoading, 300);
  $(document).ready(function() {
    clearTimeout(loadingTimeout); 
    $("#loader").fadeOut();
  });


