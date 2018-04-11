<?php
  require('../data/Student.php');

  class Student_ds extends Students{

    public $conn;
    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function insert($arr){
      
      $qry = "INSERT INTO students (studentID, studentName) VALUES (?, ?)";

      if($stmt = $conn->prepare($qry)){
        $stmt->bind_param('ss',
        $this->studentID,
        $this->studentName
        );

        $this->studentID = $conn->real_escape_string($arr['studentID']);
        $this->studentName = $conn->real_escape_string($arr['studentName']);
      }
    }


    
    
    
    
    
    public function selectSingle($key){
      $qry = 'SELECT * FROM Students WHERE studentID = ?';
      
      $stmt = $this->conn->prepare($qry);
      $stmt->bind_param('s', $key);
      $stmt->execute();
      
      $stmt->bind_result(
        $this->studentID,
        $this->studentName
      );

      $row = array();
      while ($stmt->fetch()) {
        array_push($row, $this->studentID);
        array_push($row, $this->studentName);
      }
      if (!empty($row)) {
          return $row;
      } else {
          return null;
      }
    }





    public function selectAll($sel_all){
      $sel_all = '*';
      $qry = 'SELECT '. $sel_all.' FROM Students';
      $stmt = $this->conn->prepare($qry);
      $stmt->execute();
      $stmt->store_result();
      $stmt->bind_result(
        $this->studentID,
        $this->studentName
      );

      $returnSet = array();
      $rowCount = 0;
      while ($stmt->fetch()) {
        $row = array();

        array_push($row, $this->studentID);
        array_push($row, $this->studentName);

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