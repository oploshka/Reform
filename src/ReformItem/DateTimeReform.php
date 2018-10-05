<?php

namespace Oploshka\ReformItem;


class DateTimeReform implements \Oploshka\Reform\ReformItemInterface {
  
  private static $settings = ['format' => 'Y-m-d']; // ISO8601
  
  public static function getSettings() {
    return self::$settings;
  }
  
  public static function validate($value, $validate = array()) {
    
    $str_value = StringReform::validate($value);
    if ($str_value === NULL) {
      return NULL;
    }
    
    $format = self::$settings['format'];
    if (isset($validate['format'])) {
      $format = $validate['format'];
    }
    
    $date = \DateTime::createFromFormat($format, $str_value);
    
    $error = \DateTime::getLastErrors();
    if ($error['warning_count'] != 0 || $error['error_count'] != 0) {
      return NULL;
    }
    
    return $date;
  }
}