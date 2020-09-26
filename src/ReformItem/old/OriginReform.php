<?php

namespace Oploshka\ReformItem;

class OriginReform implements \Oploshka\Reform\ReformItemInterface {

  private static $settings = [];

  public static function getSettings(){
    return self::$settings;
  }

  public static function validate($value, $validate = array()) {
    return $value;
  }
}
