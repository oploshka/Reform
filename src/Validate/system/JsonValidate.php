<?php

namespace Rpc\Utils\Validate\system;

class JsonValidate implements \Rpc\Utils\ValidateInterface {

  private static $setting = [];

  public static function getSettings(){
    return self::$setting;
  }

  public static function validate($value, $validate = array()) {
    if(!is_string($value)) {return NULL;}
    $value = (array) json_decode ($value, true);
    if (json_last_error() != 0){return NULL;}
    return $value;
  }
}
