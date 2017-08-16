<?php



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
  public function getParam(){
    return $this->param;
  }

  /**
   * @param array $param
   */
  protected function addParam($key, $param) {
    $this->param[$key] = $param;
  }

  /*
   * methode for read param from any CMS config
   */
  public abstract function read();
}