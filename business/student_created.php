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
	<h1 style="text-align:center;">Yeahhh</h1>
	<div class="container" style="display:flex;flex-direction:row;width:85%;margin:auto;margin-top:25px;">
    <div class="container" style="width:100%;">
	<?php
	
		$stu_id = $_POST["stu_id"];
		$name = $_POST["name"];
		$class_id1 = $_POST["class_id1"];	
		$class_id2 = $_POST["class_id2"];
		$class_id3 = $_POST["class_id3"];
		$class_id4 = $_POST["class_id4"];
		$class_id5 = $_POST["class_id5"];
		
		$db = mysqli_connect("db732216864.db.1and1.com","dbo732216864", "Linux2018", "db732216864");
			if (mysqli_connect_errno()) {
				echo '<p>Error: Could not connect to database.<br/>
				Please try again later.</p>';
				echo '<p>Error code is</p>'.mysqli_connect_error();
				exit;
			}
				
		$sql = "INSERT INTO Attendee (studentID, name, classID)
			VALUES ($stu_id, $name, $class_id1)";

		if ($db->query($sql) === TRUE) {
			echo "New class created successfully";
		} else {
			echo "Error: " . $sql . "<br>" . $db->error;
		}	
				
		$db->close();		
		
	?>
    </div>
	</div>
</body>
</html>
