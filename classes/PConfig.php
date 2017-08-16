<?php

/**
 * PrestaShop config
 */
class PConfig extends Config {
  private $conf = [
    'host' => '_DB_SERVER_',
    'dbname' => '_DB_NAME_',
    'dbuser' => '_DB_USER_',
    'dbpass' => '_DB_PASSWD_',
  ];

  public function read() {
    $this->addParam('type', 'prestashop');
    $file = fopen($this->getPath(), "r");
    while (($line = fgets($file)) !== false) {
      foreach ($this->conf as $key => $c) {
        if (strpos($line, $c) !== FALSE) {
          //FOUND
          $ar_line = explode("'", $line);
          $this->addParam($key, $ar_line[3]);
        }
      }
    }
    fclose($file);
    $this->addParam('name', $this->getHost());
    $this->addParam('time', date("Y-m-d H:i:s", time()));
    $this->addParam('updated', date('Y-m-d', filemtime($this->getPath())));

    //print_r($this->getParam());
  }
}