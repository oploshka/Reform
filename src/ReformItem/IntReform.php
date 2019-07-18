<?php

namespace Oploshka\ReformItem;

use phpDocumentor\Reflection\Types\Null_;

class IntReform implements \Oploshka\Reform\ReformItemInterface {

  private static $settings = ['min' => 0, 'max'=>1000000000,];

  public static function getSettings(){
    return self::$settings;
  }

  public static function validate($value, $validate = array()) {
    $valueType = gettype ($value);
    if($valueType === 'integer'){
      //
    } else if($valueType === 'string'){
      if($value === ''){return null;}
      if(!is_numeric($value) ){return null;}
      $_v = intval($value);
      if($value !== (string) $_v ){return null;}
      $value = $_v;
    } else {
      return null;
    }
    
    // установки по умолчанию
    $min  = self::$settings['min'];
    $max  = self::$settings['max'];
    //
    if(isset($validate['min']) )  { $min = $validate['min']; }
    if(isset($validate['max']) )  { $max = $validate['max']; }
  
    if($value < $min ){ return null; }
    if($value > $max ){ return null; }
    return (int) $value;
  }
}
