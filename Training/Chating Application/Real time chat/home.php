<?php
	
	include 'database.php';
	session_start();

	if(!isset($_SESSION['user_id'])){
		header('location:index.php');
	}

					// echo $_SESSION['user_id']; exit();
	// $now = strtotime(date('Y-m-d H:i:s'));
	// echo time().'<br>'; 
	// echo $now;
	// exit();	


?>



<!DOCTYPE html>
<html>
<head>
	<title>

	</title>
		<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	  	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  		<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>
<body>

	<container class="container">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div>
					<a class="btn btn-danger btn-sm" href="logout.php">LOGOUT</a>
					<p>
						Hello, <?php echo $_SESSION['user_email']; ?>
					</p>
				</div>
				<div>
					<table class="table">
					    <thead>
					      <tr>
					        <!-- <th>SR.</th> -->
					        <th>Email</th>
					        <th>Status</th>
					        <th>Action</th>
					      </tr>
					    </thead>
					    <tbody id='user_detail'>
		 					
					    
					    </tbody>
					  </table>
					  <!-- <button type='button' class='btn btn-info btn-sm chat' data-touserid='<?php echo $_SESSION['user_id'] ?>' data-touseremail='<?php echo $_SESSION['user_email'] ?>'>Start Chat</button> -->
				</div>
				<div id="user_model_details"></div>
			</div>
		</div>
			
	</container>

</body>
</html>
<script>
	$(document).ready(function(){

	
		fetch_user();
		// chat_dialog_box();
		setInterval(function(){
			update_last_activity();
		 	fetch_user();
			update_chat_history_data();
		}, 5000);

		function fetch_user()
		{
			$.ajax({
				url:"fetch_user.php",
				method:'POST',
				success:function(data){
					$("#user_detail").html(data);
				}
			})
		}
		function update_last_activity(){
			$.ajax({
				url:"update_last_activity.php",
				method:'POST',
				success:function(){
				}
			})
		}

		function make_chat_dialog_box(to_user_id, to_user_email)
		{
			var modal_content = '<div id="user_dialog_'+to_user_id+'" class="user_dialog" title="You have chat with '+to_user_email+'">';
			modal_content += '<div style="height:400px; border:1px solid #ccc; overflow-y: scroll; margin-bottom:24px; padding:16px;" class="chat_history" data-touserid="'+to_user_id+'" id="chat_history_'+to_user_id+'">';
			modal_content += fetch_user_chat_history(to_user_id);
			modal_content += '</div>';
			modal_content += '<div class="form-group">';
			modal_content += '<textarea name="chat_message_'+to_user_id+'" id="chat_message_'+to_user_id+'" class="form-control"></textarea>';
			modal_content += '</div><div class="form-group" align="right">';
			modal_content+= '<button type="button" name="send_chat" id="'+to_user_id+'" class="btn btn-info send_chat">Send</button></div></div>';
			$('#user_model_details').html(modal_content);
		}

		// $("#start_chat").click(function() {
		// $("#start_chat").on('click', function() {
		$(document).on('click','.start_chat',function(e){
            e.preventDefault();
			var to_user_id = $(this).data('touserid');
			var to_user_email = $(this).data('touseremail');

			console.log(to_user_id);
			console.log(to_user_email);
			make_chat_dialog_box(to_user_id, to_user_email);
			$("#user_dialog_"+to_user_id).dialog({
				autoOpen:false,
				width:400
			});
			$('#user_dialog_'+to_user_id).dialog('open');
		});

		// this is for testing
		// $(".chat").click(function() {
		// 	var to_user_id = $(this).data('touserid');
		// 	var to_user_email = $(this).data('touseremail');

		// 	console.log(to_user_id);
		// 	console.log(to_user_email);
		// 	make_chat_dialog_box(to_user_id, to_user_email);
		// 	$("#user_dialog_"+to_user_id).dialog({
		// 		autoOpen:false,
		// 		width:400
		// 	});
		// 	$('#user_dialog_'+to_user_id).dialog('open');
		// });

		$(document).on('click', '.send_chat', function(){
			var to_user_id = $(this).attr('id');
			var chat_message = $('#chat_message_'+to_user_id).val();
			$.ajax({
				url:"insert_chat.php",
				method:"POST",
				data:{to_user_id:to_user_id, chat_message:chat_message},
				success:function(data)
				{
					$('#chat_message_'+to_user_id).val('');
					$('#chat_history_'+to_user_id).html(data);
				}
			})
		});

		function fetch_user_chat_history(to_user_id)
		{
			$.ajax({
				url:"fetch_user_chat_history.php",
				method:"POST",
				data:{to_user_id:to_user_id},
				success:function(data){
					$('#chat_history_'+to_user_id).html(data);
				}
			})
		}

		function update_chat_history_data()
		{
			$('.chat_history').each(function(){
				var to_user_id = $(this).data('touserid');
				fetch_user_chat_history(to_user_id);
			});
		}

		$(document).on('click', '.ui-button-icon', function(){
			$('.user_dialog').dialog('destroy').remove();
		});

	});
</script>