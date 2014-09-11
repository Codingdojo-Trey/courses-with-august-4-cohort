<html>
<head>
	<title></title>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			//this is just the event listener, no Ajax yet!
			$('form').submit(function(){
				alert('the form has been submitted!');

				$.post($(this).attr('action'), $(this).serialize(), function(data){
					$('#results').append("<p class='food'>Name is: "+ data.name + " food is: " + data.food + "</p>");
				}, 'json');

				//by putting this line below, we don't actually transfer any data to the server
				return false
			})

			$('#results').on('click', '.food', function(){
				var that = $(this);
				$.post("/ajax/delete/"+$(this).attr('id'), function(data){
					that.remove();
				})
			})
		})
	</script>
</head>
<body>
	<h1>TIME FOR AJAX!</h1>
	<form action='/ajax/process' method='post'>
		Your name: <input type='text' name='name'>
		Your favorite food: <input type='text' name='food'>
		<input type='submit' value='om nom nom!'>
	</form>
	<div id='results'>
		<?php 
			foreach ($facts as $fact) 
			{
				echo "<p id='paragraph{$fact['id']}' class='food'>name is: {$fact['name']}, food is: {$fact['food']}</p>";
			}
		 ?>
	</div>
</body>
</html>