<?php

namespace Rpc\Utils\Validate\system;

class OriginValidate implements \Rpc\Utils\ValidateInterface {

  private static $settings = [];

  public static function getSettings(){
    return self::$settings;
  }

  public static function validate($value, $validate = array()) {
    return $value;
  }
}
