<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="/assets/style.css">
</head>
<body>
	<h1>Edit this course!</h1>
	<?php
	if($this->session->flashdata('errors'))
		{
			echo $this->session->flashdata('errors');
		}
	?>
	<form action="/courses/update/<?= $course['id'] ?>" method='post'>
		Name: <input type='text' name='name' value="<?= $course['name']?>">
		Description: <input type='text' name='description' value="<?= $course['description']?>">
		<input type='submit' value='update!'>
	</form>
</body>	
</html>