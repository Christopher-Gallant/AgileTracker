<?php
  require('../data/Class.php');

  class Class_ds extends Classes{

    public $conn;
    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function insert($arr){

      $qry = "INSERT INTO Classes (classID, className, classSection, classSemester, classInstructor, classScheduleMonStart, classScheduleMonEnd, classScheduleTuesStart, classScheduleTuesEnd, classScheduleWedStart, classScheduleWedEnd, classScheduleThursStart, classScheduleThursEnd, classScheduleFriStart, classScheduleFriEnd) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

      if($stmt = $conn->prepare($qry)){
        $stmt->bind_param('sssssssssssssss',
        $this->classID,
        $this->className,
        $this->classSection,
        $this->classSemester,
        $this->classInstructor,
        $this->classScheduleMonStart,
        $this->classScheduleMonEnd,
        $this->classScheduleTuesStart,
        $this->classScheduleTuesEnd,
        $this->classScheduleWedStart,
        $this->classScheduleWedEnd,
        $this->classScheduleThursStart,
        $this->classScheduleThursEnd,
        $this->classScheduleFriStart,
        $this->classScheduleFriEnd
      );

        $this->classID = $conn->real_escape_string($arr['classID']);
        $this->className = $conn->real_escape_string($arr['className']);
        $this->classSection = $conn->real_escape_string($arr['classSection']);
        $this->classSemester = $conn->real_escape_string($arr['classSemester']);
        $this->classInstructor = $conn->real_escape_string($arr['classInstructor']);
        $this->classScheduleMonStart = $conn->real_escape_string($arr['classScheduleMonStart']);
        $this->classScheduleMonEnd = $conn->real_escape_string($arr['classScheduleMonEnd']);
        $this->classScheduleTuesStart = $conn->real_escape_string($arr['classScheduleTuesStart']);
        $this->classScheduleTuesEnd = $conn->real_escape_string($arr['classScheduleTuesEnd']);
        $this->classScheduleWedStart = $conn->real_escape_string($arr['classScheduleWedStart']);
        $this->classScheduleWedEnd = $conn->real_escape_string($arr['classScheduleWedEnd']);
        $this->classScheduleThursStart = $conn->real_escape_string($arr['classScheduleThursStart']);
        $this->classScheduleThursEnd = $conn->real_escape_string($arr['classScheduleThursEnd']);
        $this->classScheduleFriStart = $conn->real_escape_string($arr['classScheduleFriStart']);
        $this->classScheduleFriEnd = $conn->real_escape_string($arr['classScheduleFriEnd']);



      }
    }







    public function selectSingle($key){
      $qry = 'SELECT * FROM Classes WHERE classID = ?';

      $stmt = $this->conn->prepare($qry);
      $stmt->bind_param('s', $key);
      $stmt->execute();

      $stmt->bind_result(
        $this->classID,
        $this->className,
        $this->classSection,
        $this->classSemester,
        $this->classInstructor,
        $this->classScheduleMonStart,
        $this->classScheduleMonEnd,
        $this->classScheduleTuesStart,
        $this->classScheduleTuesEnd,
        $this->classScheduleWedStart,
        $this->classScheduleWedEnd,
        $this->classScheduleThursStart,
        $this->classScheduleThursEnd,
        $this->classScheduleFriStart,
        $this->classScheduleFriEnd
      );

      $row = array();
      while ($stmt->fetch()) {
        array_push($row, $this->classID);
        array_push($row, $this->className);
        array_push($row, $this->classSection);
        array_push($row, $this->classSemester);
        array_push($row, $this->classInstructor);
        array_push($row, $this->classScheduleMonStart);
        array_push($row, $this->classScheduleMonEnd);
        array_push($row, $this->classScheduleTuesStart);
        array_push($row, $this->classScheduleTuesEnd);
        array_push($row, $this->classScheduleWedStart);
        array_push($row, $this->classScheduleWedEnd);
        array_push($row, $this->classScheduleThursStart);
        array_push($row, $this->classScheduleThursEnd);
        array_push($row, $this->classScheduleFriStart);
        array_push($row, $this->classScheduleFriEnd);
      }
      if (!empty($row)) {
          return $row;
      } else {
          return null;
      }
    }





    public function selectAll(){
      $qry = 'SELECT * FROM Classes';
      $stmt = $this->conn->prepare($qry);
      $stmt->execute();
      $stmt->store_result();
      $stmt->bind_result(
        $this->classID,
        $this->className,
        $this->classSection,
        $this->classSemester,
        $this->classInstructor,
        $this->classScheduleMonStart,
        $this->classScheduleMonEnd,
        $this->classScheduleTuesStart,
        $this->classScheduleTuesEnd,
        $this->classScheduleWedStart,
        $this->classScheduleWedEnd,
        $this->classScheduleThursStart,
        $this->classScheduleThursEnd,
        $this->classScheduleFriStart,
        $this->classScheduleFriEnd
      );

      $returnSet = array();
      $rowCount = 0;
      while ($stmt->fetch()) {
        $row = array();

        array_push($row, $this->classID);
        array_push($row, $this->className);
        array_push($row, $this->classSection);
        array_push($row, $this->classSemester);
        array_push($row, $this->classInstructor);
        array_push($row, $this->classScheduleMonStart);
        array_push($row, $this->classScheduleMonEnd);
        array_push($row, $this->classScheduleTuesStart);
        array_push($row, $this->classScheduleTuesEnd);
        array_push($row, $this->classScheduleWedStart);
        array_push($row, $this->classScheduleWedEnd);
        array_push($row, $this->classScheduleThursStart);
        array_push($row, $this->classScheduleThursEnd);
        array_push($row, $this->classScheduleFriStart);
        array_push($row, $this->classScheduleFriEnd);

        $rowCount++;

        array_push($returnSet, $row);
      }
      if ($rowCount > 0) {
          return $returnSet;
      } else {
          return null;
      }
    }
  }
?>
