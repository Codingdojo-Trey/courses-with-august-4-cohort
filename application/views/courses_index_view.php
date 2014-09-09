<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="/assets/style.css">
</head>
<body>
	<h1>Here are the awesome courses, <?php echo $this->session->userdata('name'); ?></h1>
	<table>
		<thead>
			<th>Name</th>
			<th>Description</th>
			<th>Date</th>
			<th>Instructor</th>
			<th>Remove</th>
			<th>Edit</th>
		</thead>
		<tbody>
			<?php 
				foreach ($courses as $course) 
				{
					echo "<tr>
							<td>{$course['name']}</td>
							<td>{$course['description']}</td>
							<td>{$course['created_at']}</td>
							<td>{$course['instructor']}</td>
							<td><a href='/courses/confirm/{$course['id']}'>delete</a></td>
							<td><a href='/courses/edit/{$course['id']}'>edit</a></td>
						</tr>";
				}
			 ?>
		</tbody>
	</table>
	<h2>add a new course!</h2>
	<?php 
		if($this->session->flashdata('errors'))
		{
			echo $this->session->flashdata('errors');
		}
		if($this->session->flashdata('success'))
		{
			echo "<p class='success'>".$this->session->flashdata('success')."</p>";
		}
	 ?>
	<form action='/courses/create' method='post'>
		Name: <input type='text' name='name'>
		Description: <input type='text' name='description'>
		<input type='submit' value='add course!'>
	</form>
</body>
</html>