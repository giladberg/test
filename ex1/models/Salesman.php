<?php 
  class Shop {
    // DB stuff
    private $conn;

   
   
    public function __construct($db) {
      $this->conn = $db;
    }

   
    public function read($query) {
    
      $stmt = $this->conn->prepare($query);

     
      $stmt->execute();

      return $stmt;
    }

   
    
  }