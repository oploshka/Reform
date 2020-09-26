<?php

namespace Oploshka\ReformItem;

class EmailReform implements \Oploshka\Reform\ReformItemInterface {

  private static $settings = [];

  public static function getSettings(){
    return self::$settings;
  }

  public static function validate($value, $validate = array()) {
    if(!is_string($value)) { return null; }
    if (!filter_var($value, FILTER_VALIDATE_EMAIL)) { return null; }
    return $value;
  }
}
