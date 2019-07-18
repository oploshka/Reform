<?php

namespace Oploshka\ReformItem;

class JsonReform implements \Oploshka\Reform\ReformItemInterface {
  
  private static $setting = [];

  public static function getSettings(){
    return self::$setting;
  }

  public static function validate($value, $validate = array()) {
    if(!is_string($value)) {return null;}
    $value = (array) json_decode ($value, true);
    if (json_last_error() != 0){return null;}
    return $value;
  }
}
