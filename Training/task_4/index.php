

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Bootstrap 4, from LayoutIt!</title>

    <meta name="description" content="Source code generated using layoutit.com">
    <meta name="author" content="LayoutIt!">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="css/style.css" rel="stylesheet">

    <style type="text/css">
    	.submit_btn{
    		position: relative; ;
    		bottom: 0px;
    		top: 10px;
    		right: 0px;
    	}
    </style>
    <script>
    	var arr_bus_name = {};

		$(document).ready(function(){
			
			$("#btn_submit").click(function(){
		     	var value = $('#business_input').val();
		     	$('#business_input').val('');
		     	var html ='<div class="row apend">';
						html +='<div class="col-md-4">';
						html +=	'<p id="listvalue"><b>'+value+'</bootstrap></p>';
						html +='</div>';
						html +='<div class="col-md-4">';
						html +=	'<div class="checkbox">';						 
						html +=		'<label>';
						html +=			 '<input type="checkbox" name="value[]" value="'+value+'"> Check It';
						html +=		'</label>';
						html +=	'</div> ';
						html +='</div>';				
					html +='</div>';
				$('.apend:last-child').after(html);		
		     	console.log(html);
		  	});

		 //  	$('#form1_submit').click(function(){
			//         var value = $(this).val();
			//         if(value[]){
			//             $.ajax({
			//                 type:'POST',
			//                 url:'ajex.php',
			//                 data:'value[]='+value,
			//                 success:function(html){
			//                     $('#business_id').html(html);
			//                 }
			//             }); 
			//         }else{
			//             $('#business_id').html('<option value="">Select Category First Business</option>');
			//         }
		 //    	});
			// var html1 ='<button>submit</button>';
			// $('.submit_btn:last-child').after(html1);
		});
	</script>

  </head>
  <body>

    <div class="container">
	<div class="row">
		<div class="col-md-12">
			<h2 class="text-center">
				Enter Multiple Name Of Business
			</h2>
			<!-- row start -->
			<div class="row">
				<!-- col-md-6 = 1 start-->
				<div class="col-md-12">
					
					<h4 class="text-center"></h4>

					<div class="row">
						<div class="col-md-10">		
							
								<div class="form-group">
									<input type="text" class="form-control" id="business_input" placeholder="Enter Business">
								</div>
							
						</div>
						<div class="col-md-2">
							<button id="btn_submit" class="btn btn-primary">
								Enter	
							</button>
						</div>	
					</div>
					<form id="form1" method="get" action="getdata.php">
						<div class="row apend">
							<center><h3>List Of Business You Entered</h3></center>
							<!-- <div class="col-md-8">
								<p id="listvalue"></p>
							</div>
							<div class="col-md-4">
								<div class="checkbox">						 
									<label>
										 <input type="checkbox" name="check"> Check It
									</label>
								</div> 
							</div>		 -->			
						</div> 

				</div>	
					 <input type="submit" name="submit" id="form1_submit" class="btn btn-primary submit_btn">
					</form>
				<!-- col-md-6 = 1 end-->

			</div>
			<!-- row end -->
		</div>
	</div>
</div>

    <script src="js/scripts.js"></script>

  </body>
</html>