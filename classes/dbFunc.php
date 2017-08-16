<?php

/**
 * Class dbFunc
 * work with DB
 */

class dbFunc{
  private $pdo;

  private function setPdo(){
    require_once "/config/config.inc.php";
    $conn = new PDO("mysql:host=".dbhost.";dbname=".dbname."", dbuser, dbpass);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $this->pdo = $conn;
  }

  private function getPdo(){
    if(empty($this->pdo))
      $this->setPdo();
    return $this->pdo;
  }

  /**
   * clear prev data table
   */
  public function clear(){
    try {
      $conn = $this->getPdo();

      $query = $conn->prepare("truncate table test");
      $query->execute();
    }
    catch(PDOException $e) {
      echo $e->getMessage();
    }
  }

  /*
   * insert param in DB
   */
  public function write(array $param){
      try {
        $conn = $this->getPdo();
        $query = $conn->prepare("INSERT INTO test (type, name, db_host, db_name, db_username, db_password, date, last_modified)
    VALUES(:type, :name, :host, :dbname, :dbuser, :dbpass, :time, :updated)");
        $query->execute($param);
      } catch (PDOException $e) {
        echo $e->getMessage();
      }
  }

  /*
   * show DB table
   */
  public function show(){
    try {
      $conn = $this->getPdo();

      $query = $conn->prepare("SELECT * FROM test");
      $query->execute();
      $results = $query->fetchAll();
      $table = '<table>';
      $row_header = '<tr>
                <td>Type</td>
                <td>Name</td>
                <td>DB&nbsp;Host</td>
                <td>DB&nbsp;Name</td>
                <td>DB&nbsp;Username</td>
                <td>DB&nbsp;Password</td>
                <td>Date</td>
                <td>Last modified</td>
            </tr>';
      $table .= $row_header;
      foreach($results as $row){
        $row = '<tr>
                <td>'.$row["type"].'</td>
                <td>'.$row["name"].'</td>
                <td>'.$row["db_host"].'</td>
                <td>'.$row["db_name"].'</td>
                <td>'.$row["db_username"].'</td>
                <td>'.$row["db_password"].'</td>
                <td>'.$row["date"].'</td>
                <td>'.$row["last_modified"].'</td>
                </tr>';
        $table .= $row;
      }

      $table .= '</table>';
      print $table;

    }
    catch(PDOException $e) {
      echo $e->getMessage();
    }
  }
}