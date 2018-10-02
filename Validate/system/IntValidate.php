<?php

namespace Rpc\Utils\Validate\system;

class IntValidate implements \Rpc\Utils\ValidateInterface {

  private static $settings = ['min' => 0, 'max'=>1000000000,];

  public static function getSettings(){
    return self::$settings;
  }

  public static function validate($value, $validate = array()) {
    if($value === '' || (!is_numeric($value) || intval($value) != $value)){return NULL;}
    // установки по умолчанию
    $min  = self::$settings['min'];
    $max  = self::$settings['max'];
    //
    if(isset($validate['min']) )  { $min = $validate['min']; }
    if(isset($validate['max']) )  { $max = $validate['max']; }
  
    if($value < $min ){ return NULL; }
    if($value > $max ){ return NULL; }
    return (int) $value;
  }
}
