<?php
/**
 * Created by PhpStorm.
 * User: Mozh
 * Date: 15-08-2017
 * Time: 11:37
 */

class ConfigScan {

  //store root dir for all sites
  private $rootDir;

  public function __construct($rootDir) {
    $this->rootDir = $rootDir;
  }

  /**
   * @return mixed
   */
  public function getRootDir() {
    return $this->rootDir;
  }

  private function scanDir($dir){
    return array_diff(scandir($dir), array('..', '.'));
  }

  /**
   * @param $dir
   * @return array
   */
  private function getHost($dir){
    $allDir = $this->scanDir($dir);
    if(!empty($allDir)) {
      $hosts = [];
      foreach ($allDir as $dir) {
        if (is_dir($this->getRootDir().DIRECTORY_SEPARATOR.$dir)) {
          $hosts[] = $dir;
        }
      }
    }
    return $hosts;
  }

  /**
   * get all hosts
   * @return array
   */
  public function findConfig(){
    $hostName = $this->getHost($this->rootDir);
    if(!empty($hostName)){
      $db = new dbFunc();
      $db->clear();
      foreach($hostName as $host){
        $path = $this->getRootDir().DIRECTORY_SEPARATOR.$host;
        $hostDir = $this->scanDir($path);
        if(in_array('app', $hostDir)){
          $config = new MConfig($path.DIRECTORY_SEPARATOR.'app'.DIRECTORY_SEPARATOR.'etc'.DIRECTORY_SEPARATOR.'local.xml', $host);
        }elseif(in_array('config', $hostDir)){
          $config = new PConfig($path.DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'settings.inc.php', $host);
        }else{
          throw new Exception('underfined');
        }
        $config->read();//call abstract methode

        $db->write($config->getParam());
      }
      $db->show();
    }
  }
}