<?php

namespace Oploshka\ReformItem;

class EmailReform implements \Oploshka\Reform\ReformItemInterface {

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
