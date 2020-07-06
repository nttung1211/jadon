<?php 
class DB {
  private $host;
  private $user;
  private $password;
  private $database;
  private $con;

  function __construct($host, $user, $password, $database) {
    $this->host = $host;
    $this->user = $user;
    $this->password = $password;
    $this->database = $database;
    $this->connect();
  }

  private function connect() {
    $this->con = new mysqli($this->host, $this->user, $this->password, $this->database);

    if ($this->con->connect_errno) {
      die($this->con->connect_error);
    }
  }

  function getData($query, $params = null) {
    
    if ($stmt = $this->con->prepare($query))  {
      if ($params) {
        $typeString = '';
        
        foreach ($params as $p) {
          $typeString = $typeString . 's';
        }

        $stmt->bind_param($typeString, ...$params);
      }

      $stmt->execute();
      $result = $stmt->get_result();

      if (mysqli_num_rows($result)) {
        $rows = [];

        while ($row = $result->fetch_assoc()) {
          $rows[] = $row;
        };

        return $rows;
      } else {
        return 0;
      }

      $stmt->close();
    } else {
      exit('Failed to prepare query.');
    }
  }

  function alterData($query, $params = null) {
    
    if ($stmt = $this->con->prepare($query))  {
      if ($params) {
        $typeString = '';
        
        foreach ($params as $p) {
          $typeString = $typeString . 's';
        }

        $stmt->bind_param($typeString, ...$params);
      }

      $stmt->execute();

      $stmt->close();
    } else {
      exit('Failed to prepare query.');
    }
  }

  function getConnection() {
    return $this->con;
  }

}
?>