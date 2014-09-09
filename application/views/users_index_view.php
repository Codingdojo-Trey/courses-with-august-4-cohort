<html>
<head>
	<title></title>
</head>
<body>
	<h1>Login my pretties!</h1>
	<form action='/users/login' method='post'>
		Email: <input type='email' name='email'>
		Password: <input type='password' name='password'>
		<input type='submit' value='login'>
	</form>
	<h2>Or register!</h2>
	<form action='/users/register' method='post'>
		First name: <input type='text' name='first_name'>
		Last name: <input type='text' name='last_name'>
		Email: <input type='email' name='email'>
		Password: <input type='password' name='password'>
		Confirm password: <input type='password' name='confirm_password'>
		<input type='submit' value='login'>
	</form>
	<?php 
		if($this->session->flashdata('errors'))
		{
			echo $this->session->flashdata('errors');
		}
	 ?>
</body>
</html>