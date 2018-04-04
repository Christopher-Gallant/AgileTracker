<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Class Selection</title>
  </head>
  <body>
    <header>
      <h1>Header goes here!</h1>
    </header>
    <main>
      <?php
        $courseSelection = file('data/classSelectionList.txt');
        $instructor = trim($courseSelection[0]);
          echo "Classes available for $instructor:<br>";
          echo '<form class="Class Selection" action="courseAttendance.html" method="post">
                  <select name="course">';
                    for($i=1; $i<count($courseSelection); $i++)
                    {
                      $courseOptions = explode(";", $courseSelection[$i]);
                      $classCount = count($courseOptions);
                      echo "$classCount";
                      echo "<option value=$courseOptions[0]>$courseOptions[0] ($classCount)</option>";
                    }
                  echo "</select><br><br>";

                  echo '<input type="submit" name="submit" value="Submit">';
                echo "</form>";
      ?>
    </main>
    <footer>
      <h1>Footer goes here!</h1>
    </footer>
  </body>
</html>
