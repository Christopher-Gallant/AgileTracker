<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title></title>
	<!-- Normalize.css: Aids in making browsers render all elements more consistently. -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.0/normalize.min.css">
	<!-- AgileTracker CSS Framework -->
	<link rel="stylesheet" href="../applications/assets/css/main.css">
</head>
<body class="alignh-center">
	<h1 style="text-align:center;">Student Account</h1>
	<div class="container" style="display:flex;flex-direction:row;width:85%;margin:auto;margin-top:25px;">
    <div class="container" style="width:100%;">
	<?php
	
		$stu_id = $_POST["stu_id"];
		$name = $_POST["name"];
		
		require '../datastore/db_connect.php';
				
		$sql = "INSERT INTO Student (StudentID, Student_Name)
			VALUES ($stu_id, $name)";

		if ($db->query($sql) === TRUE) {
			echo "New student created successfully";
		} else {
			echo "Error: " . $sql . "<br>" . $db->error;
		}	
				
		$db->close();		
		
	?>
    </div>
	</div>
</body>
</html>
