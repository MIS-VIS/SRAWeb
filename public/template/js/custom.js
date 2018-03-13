
/** PJAX **/
$(document).pjax('a', '#response-content');

$(document).on('submit', 'form', function(event) {
  	$.pjax.submit(event, '#response-content');
});


/** DATEPICKER **/
$(document).on('ready pjax:success', function() { 
	 $('#datepicker .date').datepicker({
        'format': 'dd-mm-yyyy',
        'autoclose': true
 	});
});

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

