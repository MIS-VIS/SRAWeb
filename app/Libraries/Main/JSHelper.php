<?php

namespace App\Libraries\Main;


class JSHelper {



    public static function AjaxSelectToSelect($nameMain, $nameSub, $route, $key, $value){

      $string = "'";

      return '<script type="text/javascript">
			    $(document).ready(function() {
			        $("#'.$nameMain.'").on("change", function() {
			            var id = $(this).val();
			            if(id) {
			                $.ajax({
			                    url: "'.$route.'"+id,
			                    type: "GET",
			                    dataType: "json",
			                    success:function(data) {       
			                      
			                        $("#'. $nameSub .'").empty();

		                        	$.each(data, function(key, value) {
	                        			$("#'. $nameSub .'").append("<option value='.$string.'"+ value.'.$key.' +"'.$string.'>"+ value.'.$value.' +"</option>");
	                        		});

		                        	$("#'. $nameSub .'").append("<option value>Select</option>");  
			            
			                    }
			                });
			            }else{
			            	$("#'. $nameSub .'").empty();
			            }
			        });
			    });
			</script>';

    }








    public static function AjaxSelectToInput($nameMain, $nameSub, $route, $value){

      return '<script type="text/javascript">
	            $(document).ready(function() {
	                $("#'.$nameMain.'").on("change", function() {
	                    var id = $(this).val();
	                    if(id) {
	                        $.ajax({
	                            url: "'.$route.'"+id,
	                            type: "GET",
	                            dataType: "json",
	                            success:function(data) {
	                                $("#'.$nameSub.'").empty();
	                                $.each(data, function(key, value) {
	                                		$("#'.$nameSub.'").val(value.'.$value.');
	                                }); 
	                            }
	                        });
	                    }else{
	                        $("#'.$nameSub.'").val("");
	                    }
	                });
	            });
       		 </script>';

    }








    public static function Print($button, $div){

      $string = "'";

      return '<script>
		    	$("#'.$button.'").on("click", function () {
		            var divContents = $("#'.$div.'").html();
		            var printWindow = window.open("", "", "height=800,width=1500");
		            printWindow.document.write("<html><head><title></title>");
		            printWindow.document.write('.$string.'<link type="text/css" rel="stylesheet" href="http://'.$_SERVER['HTTP_HOST'].'/template/css/main.css">'.$string.');
		            printWindow.document.write('.$string.'<link type="text/css" rel="stylesheet" href="http://'.$_SERVER['HTTP_HOST'].'/template/css/custom.css">'.$string.');
		            printWindow.document.write("</head><body>");
		            printWindow.document.write(divContents);
		            printWindow.document.write("</body></html>");
		            printWindow.document.close();
		            setInterval(function () { 
		      			printWindow.print();
		      			printWindow.close();
		    		}, 1000);
		    	});
			</script>';

    }







    public static function RichText($id, $height){

      return '<script>
	            $(document).ready(function() {
	                $("#'.$id.'").summernote({
	                     height: '. $height .',
	                     toolbar: [
	                        ["style", ["style"]],
	                        ["text", ["bold", "italic", "underline", "color", "clear"]],
	                        ["para", ["paragraph"]],
	                        ["height", ["height"]],
	                        ["fontsize", ["fontsize"]],
	                        ["font", ["fontname"]],

	                    ],
	                    styleTags: ["h1", "h2", "h3", "h4", "h5", "h6"],
	                });
	            });
	        </script>';

    }







    public static function SelectSearch($id){

      return '<script>
    			$(document).ready(function() {
        			$("#'.$id.'").select2();
    			});
  			</script>';

    }







    public static function SelectNormal($id){

      return '<script>
    			$(document).ready(function() {
        			$("#'.$id.'").select2({
        				 minimumResultsForSearch: -1
        			});
    			});
  			</script>';

    }







    public static function ModalShow($id){

      return '<script>
    			$(document).ready(function() {
        			$("#'.$id.'").modal("show");
    			});
  			</script>';

    }







    public static function PriceInput($id){

      return '<script>
      			$(document).ready(function() {
	    			$("#'. $id .'").priceFormat({
		                prefix: "",
		                thousandsSeparator: ",",
		                clearOnEmpty: true,
		                allowNegative: true
            		});
            	});
  			</script>';

    }







    public static function ModalCallDelete(){

	  return '<script>
		        $(document).on("click", "#delete_button", function () {
		            var url = $(this).data("url");
		            $("#delete_body #form").attr("action", url);
		        });
		    </script>';

    }







    public static function Snackbar($message){

      return '<script>
			    new PNotify({
	                text    : "'. $message .'",
	                confirm : {
	                    confirm: true,
	                    buttons: [
	                        {
	                            text    : "Dismiss",
	                            addClass: "btn btn-link",
	                            click   : function (notice)
	                            {
	                                notice.remove();
	                            }
	                        },
	                        null
	                    ]
	                },
	                buttons : {
	                    closer : false,
	                    sticker: false
	                },
	                animate : {
	                    animate  : true,
	                    in_class : "slideInDown",
	                    out_class: "slideOutUp"
	                },
	                addclass: "md multiline"
	            });
			   </script>';

    }






}
