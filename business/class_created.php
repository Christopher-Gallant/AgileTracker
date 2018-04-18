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
	<h1 style="text-align:center;">Class Creation</h1>
	<div class="container" style="display:flex;flex-direction:row;width:85%;margin:auto;margin-top:25px;">
    <div class="container" style="width:100%;">
	<?php
		$class_id = $_POST["class_id"];
		$class_name = $_POST["class_name"];
		$class_section = $_POST["class_section"];	
		$class_semester = $_POST["class_semester"];
		$class_instructor = $_POST["class_instructor"];
		$mon_start = $_POST["mon_start"];
		$mon_end = $_POST["mon_end"];
		$tue_start = $_POST["tue_start"];
		$tue_end = $_POST["tue_end"];
		$wed_start = $_POST["wed_start"];
		$wed_end = $_POST["wed_end"];
		$thu_start = $_POST["thu_start"];
		$thu_end = $_POST["thu_end"];
		$fri_start = $_POST["fri_start"];
		$fri_end = $_POST["fri_end"];
		
		require '../datastore/db_connect.php';
				
		$sql = "INSERT INTO Class (classID, className, classSection, classSemester, classInstructor, classScheduleMonStart, classScheduleMonEnd, 
classScheduleTuesStart, classScheduleTuesEnd, classScheduleWedStart, classScheduleWedEnd, classScheduleThursStart, classScheduleThursEnd, 
classScheduleFriStart, classScheduleFriEnd)
			VALUES ($class_id, $class_name, $class_section, $class_semester, $class_instructor, $mon_start, $mon_end, $tue_start, $tue_end, 
$wed_start, $wed_end, $thu_start, $thu_end, $fri_start, $fri_end)";

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
