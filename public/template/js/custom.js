/** DATEPICKER **/
 $('#datepicker .date').datepicker({
        'format': 'dd-mm-yyyy',
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


