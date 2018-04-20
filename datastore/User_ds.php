<?php
require('../data/User.php');

  class User_ds extends Users{

    public $conn;
    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function insert($arr){

      $qry = "INSERT INTO users (userID, userLogin, userPass, userFName, userLName, roleID) VALUES (?, ?, ?, ?, ?, ?)";

      if($stmt = $conn->prepare($qry)){
        $stmt->bind_param('ssssss',
        $this->userID,
        $this->userLogin,
        $this->userPass,
        $this->userFName,
        $this->userLName, 
        $this->roleID
        );

        $this->userID = $conn->real_escape_string($arr['userID']);
        $this->userLogin = $conn->real_escape_string($arr['userLogin']);
        $this->userPass = $conn->real_escape_string($arr['userPass']);
        $this->userFName = $conn->real_escape_string($arr['userFName']);
        $this->userLName = $conn->real_escape_string($arr['userLName']);
        $this->roleID = $conn->real_escape_string($arr['roleID']);
        
      }
    }







    public function selectSingle($key){
      $qry = 'SELECT * FROM User WHERE userLogin = ?';
      $stmt = $this->conn->prepare($qry);
      $stmt->bind_param('s', $key);
      $stmt->execute();
      $stmt->bind_result($this->userID,$this->userLogin, $this->userFName, $this->userLName, $this->userPass, $this->roleID);
      $row = array();
      while ($stmt->fetch()) {	      
	    array_push($row, $this->userID);
        array_push($row, $this->userLogin);
        array_push($row, $this->userPass);
        array_push($row, $this->userFName);
        array_push($row, $this->userLName);
        array_push($row, $this->roleID);
      }
      if (!empty($row)) {
          return $row;
      } else {
          return null;
      }
    }





    public function selectAll(){
      $qry = 'SELECT * FROM Users';
      $stmt = $this->conn->prepare($qry);
      $stmt->execute();
      $stmt->store_result();
      $stmt->bind_result(
        $this->userID,
        $this->userName
      );

      $returnSet = array();
      $rowCount = 0;
      while ($stmt->fetch()) {
        $row = array();

        array_push($row, $this->userID);
        array_push($row, $this->userName);

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
