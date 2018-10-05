<?php

namespace Oploshka\ReformItem;

class FloatReform implements \Oploshka\Reform\ReformItemInterface {

  private static $settings = ['min' => 0, 'max'=>1000000000];

  public static function getSettings(){
    return self::$settings;
  }

  public static function validate($value, $validate = array()) {
  
    $valueType = gettype ($value);
    if($valueType === 'double'){
      //
    } else if($valueType === 'integer'){
      $value = (double) $value;
    } else if($valueType === 'string'){
      if($value === ''){return NULL;}
      if(!is_numeric($value) ){return NULL;}
      $_v = floatval($value);
      if($value !== (string) $_v ){return NULL;}
      $value = $_v;
    } else {
      return NULL;
    }
  
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
