<?php

namespace Rpc\Utils\Validate\system;

class FloatValidate implements \Rpc\Utils\ValidateInterface {

  private static $settings = ['min' => 0, 'max'=>1000000000];

  public static function getSettings(){
    return self::$settings;
  }

  public static function validate($value, $validate = array()) {
    // if($value === '' || (!is_float($value) || floatval($value) != $value)){return NULL;}
    if( !is_numeric($value) ){ return NULL; }
    // установки по умолчанию
    $min  = self::$settings['min'];
    $max  = self::$settings['max'];
    //
    if(isset($validate['min']) )  { $min = $validate['min']; }
    if(isset($validate['max']) )  { $max = $validate['max']; }
  
    if($value < $min ){ return NULL; }
    if($value > $max ){ return NULL; }
    return (float) $value;
  }
}
