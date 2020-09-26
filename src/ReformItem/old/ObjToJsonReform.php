<?php

namespace Oploshka\ReformItem;

class ObjToJsonReform implements \Oploshka\Reform\ReformItemInterface {
  
  private static $setting = [];

  public static function getSettings(){
    return self::$setting;
  }

  public static function validate($value, $validate = array()) {
    if(!is_object($value) && !is_array($value)){
      return null;
    }
    try {
      $returnJson = \json_encode(
        $value,
        JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_QUOT| JSON_PARTIAL_OUTPUT_ON_ERROR
        // http://php.net/manual/ru/json.constants.php
      );
    
      // обработки будут появлятся не смотря на установку option
      // по крайней мере что без JSON_PARTIAL_OUTPUT_ON_ERROR, что с ним будет json_last_error = 7
      // if (json_last_error() != 0 && json_last_error() != 7) {
      if (empty($returnJson)) {
        json_last_error();
        return null;
      }
      return $returnJson;
    } catch (\Exception $e) {
      //
    }
    return null;
  }
}
