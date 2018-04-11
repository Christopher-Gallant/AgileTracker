<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Rules Test</title>
</head>
<body class="alignh-center">
  <?php
    // Database Connection & Presentation
    require("../business/utils_presentation.php");
    require("../datastore/db_connect.php");

    // Datastore Objects
    require("../datastore/Class_ds.php");
    require("../datastore/Student_ds.php");
  ?>

  <!-- Student Testing! -->
  <h1 style="text-align:center;">Student Testing</h1>
	<div class="container" style="display:flex;flex-direction:column;width:85%;margin:auto;margin-top:25px;">
    <div class="container" style="width:100%;">
      <h3 style="text-align:center;">Create</h3>
  		<br />
  		<p>Please enter the following data for the student...</p>
  		<form action="../business/student_created.php" method="post">
  			<label>Student ID</label><br>
  			<input name="stu_id" type="number" min="0" placeholder="00000000"/><br><br>
  			<label>Name</label><br>
  			<input name="name" type="text" placeholder="Siri Sophia"/><br><br>
  			<p>You may enter up to 5 classes.<br></p>
  			<label>Class</label><br>
  			<input name="class_id1" type="text" placeholder="CSCI 101-01"/>
  			<input name="class_id2" type="text" placeholder="Class Name"/>
  			<input name="class_id3" type="text" placeholder="Class Name"/>
  			<input name="class_id4" type="text" placeholder="Class Name"/>
  			<input name="class_id5" type="text" placeholder="Class Name"/><br><br>
  			<p><input type="submit" name="submit" value="Submit"></p>
      </form>
    </div>
    <div class="container" style="width:100%">
      <h3 style="text-align:center;">Select Single</h3>
      <?php
        $conn = db_connect();
        $student = new Student_ds($conn);

        $key = "0";

        $studentRow = $student->selectSingle($key);
        if ($studentRow != null) {
            echo '<p style="color:green">Select Single: PASS</p>';
            echo '<br/>'.implode(' ', $studentRow);
        } else {
            echo '<p style="color:red">Select Single: FAIL</p>';
            echo '<br/>'.implode(' ', $studentRow);
            var_dump($studentRow);
        }
      ?>
    </div>
    <div class="container" style="width:100%">
      <h3 style="text-align:center;">Select All</h3>
      <?php
        $conn = db_connect();
        $students = new Student_ds($conn);

        $dataSet = $students->selectAll();
        if (isset($dataSet)) {
          echo '<p style="color:green">Select All: PASS</p>';
        } else {
          echo '<p style="color:red">Select All: FAIL</p>';
        }

        echo constructTable($dataSet);

        mysqli_close($conn);
      ?>
    </div>
	</div>

  <!-- Class Testing! -->
  <h1 style="text-align:center;">Create A Class</h1>
	<div class="container" style="display:flex;flex-direction:column;width:85%;margin:auto;margin-top:25px;">
    <div class="container" style="width:100%;">
  		<br />
  		<p>Please enter the following data for the class...</p>
  		<form action="../business/class_created.php" method="post">
  			<label>Class ID#</label><br>
  			<input name="class_id" type="number" min="0" placeholder="00000000"/><br><br>
  			<label>Class Name</label><br>
  			<input name="class_name" type="text" placeholder="CSCI 101-01"/><br><br>
  			<label>Class Section</label><br>
  			<input name="class_section" type="text" placeholder="Computer Programming"/><br><br>
  			<label>Class Semester</label><br>
  			<input name="class_semester" type="text" placeholder="Fall"/><br><br>
  			<label>Class Instructor</label><br>
  			<input name="class_instructor" type="text" placeholder="Ganondolf TriForce"/><br><br>
  			<p>Click on the fileds inside and select the appropriate time...</p>
  			<label>Monday Start</label>
  			<input name="mon_start" type="time"/>
  			<label>Monday End</label>
  			<input name="mon_end" type="time"/><br><br>
  			<label>Tuesay Start</label>
  			<input name="tue_start" type="time"/>
  			<label>Tuesday End</label>
  			<input name="tue_end" type="time"/><br><br>
  			<label>Wednesday Start</label>
  			<input name="wed_start" type="time"/>
  			<label>Wednesday End</label>
  			<input name="wed_end" type="time"/><br><br>
  			<label>Thursday Start</label>
  			<input name="thu_start" type="time"/>
  			<label>Thursday End</label>
  			<input name="thu_end" type="time"/><br><br>
  			<label>Friday Start</label>
  			<input name="fri_start" type="time"/>
  			<label>Friday End</label>
  			<input name="fri_end" type="time"/><br><br>
  			<p><input type="submit" name="submit" value="Submit"></p>
      </form>
    </div>
    <div class="container" style="width:100%">
      <h3 style="text-align:center;">Select Single</h3>
      <?php
        $conn = db_connect();
        $class = new Class_ds($conn);

        $key = "0";

        $classRow = $class->selectSingle($key);
        if ($classRow != null) {
            echo '<p style="color:green">Select Single: PASS</p>';
            echo '<br/>'.implode(' ', $classRow);
        } else {
            echo '<p style="color:red">Select Single: FAIL</p>';
            echo '<br/>'.implode(' ', $classRow);
            var_dump($classRow);
        }
      ?>
    </div>
    <div class="container" style="width:100%">
      <h3 style="text-align:center;">Select All</h3>
      <?php
        $conn = db_connect();
        $classes = new Class_ds($conn);

        $dataSet = $classes->selectAll();
        if (isset($dataSet)) {
          echo '<p style="color:green">Select All: PASS</p>';
        } else {
          echo '<p style="color:red">Select All: FAIL</p>';
        }

        echo constructTable($dataSet);

        mysqli_close($conn);
      ?>
    </div>
	</div>
</body>
</html>
