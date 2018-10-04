<?php

namespace Oploshka\ReformItem;

class StringReform implements \Oploshka\Reform\ReformItemInterface {

  // 'string'
  private static $settings = ['min' => 1, 'max'=>1024, 'trim' => true,];

  public static function getSettings(){
    return self::$settings;
  }

  public static function validate($value, $validate = array()) {
    if(!is_string($value)) {return NULL;}
    // установки по умолчанию
    $trim = self::$settings['trim'];
    $min  = self::$settings['min'];
    $max  = self::$settings['max'];
    //
    if(isset($validate['trim']))  { $trim = $validate['trim']; }
    if(isset($validate['min']) )  { $min = $validate['min']; }
    if(isset($validate['max']) )  { $max = $validate['max']; }
    // обрежем лишнии пробелы
    if($trim){ $value = trim ($value); }
  
    // проверка на длинну
    $len = strlen ( $value );
    if($len < $min ){ return NULL; }
    if($len > $max ){ return NULL; }
  
    return (string) $value;
  }
}
