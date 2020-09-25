<?php

namespace Oploshka\Reform\Exception;

class ReformException extends \Exception {
  
  public function __construct($message = null, $code = 0, Exception $previous = null){
    parent::__construct('ERROR_REFORM_' .$message, $code, $previous);
  }
  
  // custom string representation of object
  public function __toString() {
    return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
  }
}
