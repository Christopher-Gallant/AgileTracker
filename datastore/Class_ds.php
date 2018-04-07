<?php
  require('../data/Class.php');

  class Class_ds extends Classes{

    public $conn;
    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function insert($arr){
      
      $qry = "INSERT INTO classes (classID, className, classSection, classSemester, classInstructor, classScheduleMonStart, classScheduleMonEnd, classScheduleTuesStart, classScheduleTuesEnd, classScheduleWedStart, classScheduleWedEnd, classScheduleThursStart, classScheduleThursEnd, classScheduleFriStart, classScheduleFriEnd) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

      if($stmt = $conn->prepare($qry)){
        $stmt->bind_param('sssssssssssssss', $this->classID, $this->className, $this->classSection, $this->classSemester,$this->classInstructor, $this->classScheduleMonStart, $this->classScheduleMonEnd, $this->classScheduleTuesStart, $this->classScheduleTuesEnd, $this->classScheduleWedStart, $this->classScheduleWedEnd,               $this->classScheduleThursStart, $this->classScheduleThursEnd, $this->classScheduleFriStart,     $this->classScheduleFriEnd);

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
      

        if($stmt->execute()){
          echo "Records inserted successfully.";
        } else{
            echo "ERROR: Could not execute query: $sql. " . $conn->error;
          }
      } else{
          echo "ERROR: Could not prepare query: $sql. " . $conn->error;
        }

  }
}
?>