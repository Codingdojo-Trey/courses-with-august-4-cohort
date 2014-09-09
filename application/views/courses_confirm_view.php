<html>
<head>
	<title></title>
</head>
<body>
	<h1>Are you sure you want to delete this course??</h1>
	<?php 
		echo "Name: <h2> {$course['name']}</h2>";
		echo "Description: <h2> {$course['description']}</h2>";
	 
		echo "<a href='/courses/destroy/{$course['id']}'><button>Yes</button></a>";
	?>
	<a href="/courses/index"><button>No</button></a>
</body>
</html>