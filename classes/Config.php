<?php

/**
 * Created by PhpStorm.
 * User: Mozh
 * Date: 15-08-2017
 * Time: 14:28
 */
abstract class Config {
  private $path;
  private $host;
  private $param = array();

  public function __construct($path, $host) {
    $this->path = $path;
    $this->host = $host;
  }

  /**
   * @return mixed
   */
  protected function getPath() {
    return $this->path;
  }

  /**
   * @return mixed
   */
  protected function getHost() {
    return $this->host;
  }

  /**
   * @return array
   */
  protected function getParam(){
    return $this->param;
  }

  /**
   * @param array $param
   */
  protected function addParam($key, $param) {
    $this->param[$key] = $param;
  }

  public abstract function read();


  public function write(){
    $param = $this->getParam();//get param for insert from current config

    try {
      require_once "/config/config.inc.php";
      $conn = new PDO("mysql:host=".dbhost.";dbname=".dbname."", dbuser, dbpass);

      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $statement = $conn->prepare("INSERT INTO test (type, name, db_host, db_name, db_username, db_password, date, last_modified)
    VALUES(:type, :name, :host, :dbname, :dbuser, :dbpass, :time, :updated)");
      $statement->execute($param);
    }
    catch(PDOException $e)
    {
      echo $e->getMessage();
    }

  }
}