<?php

namespace Oploshka\Reform\ReformItem;

use Oploshka\Reform\Contract\ReformItemAbstract;
use Oploshka\Reform\Contract\ReformItemInterface;
use Oploshka\Reform\Exception\ReformException;

class ObjectToJsonReformItem extends ReformItemAbstract implements ReformItemInterface {
  
  public static function validate($value) {
    if(!is_object($value) && !is_array($value)){
      throw new ReformException(ReformException::NOT_STRING);
    }
    
    $returnJson = json_encode(
      $value,
      JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_QUOT| JSON_PARTIAL_OUTPUT_ON_ERROR
    // http://php.net/manual/ru/json.constants.php
    );
  
    // обработки будут появлятся не смотря на установку option
    // по крайней мере что без JSON_PARTIAL_OUTPUT_ON_ERROR, что с ним будет json_last_error = 7
    // if (json_last_error() != 0 && json_last_error() != 7) {
    if (empty($returnJson)) {
      json_last_error();
      throw new ReformException(ReformException::NOT_STRING);
    }
    return $returnJson;
  }
  protected static function filterItem($value, $filter) {
    return $value;
  }
}
