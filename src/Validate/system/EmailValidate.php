<?php

namespace Rpc\Utils\Validate\system;

class EmailValidate implements \Rpc\Utils\ValidateInterface {

  private static $settings = [];

  public static function getSettings(){
    return self::$settings;
  }

  public static function validate($value, $validate = array()) {
    if(!is_string($value)) { return NULL; }
    if (!filter_var($value, FILTER_VALIDATE_EMAIL)) { return NULL; }
    return $value;
  }
}
