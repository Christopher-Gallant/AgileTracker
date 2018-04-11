<?php
function db_connect()
{
  $db = new mysqli("db732216864.db.1and1.com", "dbo732216864", "Linux2018", "db732216864");
  $status = mysqli_connect_errno();
  if ($status) {
      echo '<p>Error: Could not connect to database.<br/>
            Please try again later.</p>';
      echo 'Status is '.mysqli_connect_errno().'<br/>';
      $db = null;
  }
  return $db;
}
?>
