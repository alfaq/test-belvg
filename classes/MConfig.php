<?php

/**
 * Magento config
 */

class MConfig extends Config {
  public function read() {
    if (file_exists($this->getPath())) {
      $xml = simplexml_load_file($this->getPath());
      $conf = $xml->global->resources->default_setup->connection;
        $this->addParam('type', 'magento');
        $this->addParam('name', $this->getHost());
        $this->addParam('host', $conf->host->__toString());
        $this->addParam('dbname', $conf->dbname->__toString());
        $this->addParam('dbuser', $conf->username->__toString());
        $this->addParam('dbpass', $conf->password->__toString());
        $this->addParam('time', date('Y-m-d H:i:s', time()));
        $this->addParam('updated', date('Y-m-d', filemtime($this->getPath())));
    }
  }
}