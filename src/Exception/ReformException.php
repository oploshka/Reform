<?php

namespace Oploshka\Reform\Exception;

/**
 * TODO: проверить
 * для получения всех констант есть магический метод ->getConstants()
 *
 * Class ReformException
 * @package Oploshka\Reform\Exception
 */
class ReformException extends \Exception {
  // Reform->item;
  const VALIDATE_IS_NOT_ARRAY           = 'VALIDATE_IS_NOT_ARRAY';
  const VALIDATE_TYPE_NO_ISSET          = 'VALIDATE_TYPE_NO_ISSET';
  const VALIDATE_TYPE_NO_STRING         = 'VALIDATE_TYPE_NO_STRING';
  const NO_CORRECT_VALIDATE_TYPE        = 'NO_CORRECT_VALIDATE_TYPE';
  const ERROR_NOT_INSTANCEOF_INTERFACE  = 'ERROR_NOT_INSTANCEOF_INTERFACE';
  //
  
  public function __construct($message = null, $code = 0, Exception $previous = null){
    parent::__construct('ERROR_REFORM_' .$message, $code, $previous);
  }
  
  // custom string representation of object
  public function __toString() {
    return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
  }
}
