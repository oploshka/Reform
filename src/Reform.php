<?php

namespace Oploshka\Reform;

use Oploshka\Reform\Exception\ReformException;
use Oploshka\Reform\ReformSchema;

class Reform extends ReformCore /* implements \Oploshka\Reform\ReformInterface */ {
  
  //  public function setError($errorCode='', $message='', $data = []){}
  //  public function resetError(){}
  //  public function getError(){ return []; }
  
  
  /**
   * @param $item
   * @param \Oploshka\Reform\ReformSchema $reformSchema
   * @return mixed
   * @throws ReformException
   */
  public function item($item, ReformSchema $reformSchema){
    
    /** @var $reformItemClass \Oploshka\Reform\ReformItem\IntegerReformItem  */
    $reformItemClass = $this->getReformMethodClass($reformSchema->getType());
  
    return $reformItemClass::reformValidate($item, $reformSchema, $this);
  }
  
}
