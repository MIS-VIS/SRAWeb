<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<table class="table" style="border: 1px;">

		<thead>
			<tr>
				<th>A</hr>
				<th>B</th>
				<th>C</th>
				<th><button class="add_row" id="add_row">Add</button></th>
			<tr>
		</thead>

		<tbody id="body">

			<div class="row">

				<tr>
					<td>
						<select name="dv_dept_code" id="dv_dept_code">
		  		 			@foreach($burProjectsDeptId as $data)
		  		 				<option value="{{ $data->dept_id }}">{{ $data->dept_id }}</option>
		  		 			@endforeach
	  		 			</select>
					</td>
					<td>
						<select name="dv_proj_code" id="dv_proj_code">
		  		 			@foreach($burProjectsAcctCode as $data)
		  		 				<option value="{{ $data->acct_code }}">{{ $data->acct_code }}</option>
		  		 			@endforeach
	  		 			</select>
					</td>
					<td><a href="#" id="test">Test</a></td>
					<td><input type="text"></td>

				</tr>

			</div>

		</tbody>

	</table>

</body>

  <script type="text/javascript" src="{{ asset('template/vendor/jquery/dist/jquery.min.js') }}"></script>
	  
  <script>
  		
  		 $(document).ready(function() {

  		 	$("#add_row").on("click", function() {
  		 		var content = '<tr>'+
  		 		'<td>' +
  		 		'<select name="dv_dept_code" id="dv_dept_code">'+
  		 			'@foreach($burProjectsDeptId as $data)'+
  		 				'<option value="{{ $data->dept_id }}">{{ $data->dept_id }}</option>'+
  		 			'@endforeach'+
  		 		'</select>' +
  		 		'</td>' +
				'<td>' +
  		 		'<select name="dv_proj_code" id="dv_proj_code">'+
  		 			'@foreach($burProjectsAcctCode as $data)'+
  		 				'<option value="{{ $data->acct_code }}">{{ $data->acct_code }}</option>'+
  		 			'@endforeach'+
  		 		'</select>' +
  		 		'</td>' +
				'<td><button id="test">Test</button></td>' +
				'<td><input type="text"></td></tr>';

			$("#body").append($(content));

  		 	});


  		 	$(document).on("click","#test" ,function(e) {
  		 		console.log($(this).closest('tr'));
  		 		$(this).closest('tr').remove();

  		 	});

  		 });




  		 $(document).ready(function() {
	        $(document).on("change", "#dv_dept_code", function() {
	            var id = $(this).val();
	            var parent = $(this).closest('tr');
	            if(id) {
	                $.ajax({
	                    url: "/ajax/response-accountCode/" + id,
	                    type: "GET",
	                    dataType: "json",
	                    success:function(data) {   

	                      	$(parent).find("#dv_proj_code").empty();

                        	$.each(data, function(key, value) {
                    			$(parent).find("#dv_proj_code").append("<option value='" + value.acct_code + "'.$string.'>"+ value.acct_code +"</option>");
                    		});

                        	$(parent).find("#dv_proj_code").append("<option value>Select</option>");  
	            
	                    }
	                });
	            }else{
	            	$(parent).find("#dv_proj_code").empty();
	            }
	        });
	    });



  </script>

    


</html>