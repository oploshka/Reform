<?php

namespace Rpc\Utils\Validate\custom;

class _ExampleCustomValidate implements \Rpc\Utils\ValidateInterface {

  private static $settings = [];

  public static function getSettings(){
    return self::$settings;
  }

  public static function validate($value, $validate = array()) {
    return NULL;
  }
}
