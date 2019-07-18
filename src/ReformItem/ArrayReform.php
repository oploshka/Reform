<?php

namespace Oploshka\ReformItem;

class ArrayReform implements \Oploshka\Reform\ReformItemInterface {

  private static $settings = [];

  public static function getSettings(){
    return self::$settings;
  }

  public static function validate($items, $validates = array(), $Reform = null) {
    $value = array();
  
    foreach($validates as $key => $validate){
      // если обязательное поле отсутствует или равно null, пустая строка
      if(!isset($items[$key]) || $items[$key] === array() || $items[$key] === null || $items[$key] === '' ) {
        // обязательно ли поле?
        if(!(isset($validate['req']) && $validate['req']==false)){
          // print $key;
          return null;
        }
        // поле необязательно
        $value[$key] = null;
        continue;
      }
      // если поле есть то проверим его
      $value[$key] = $Reform->item($items[$key], $validate);
    
      if( $value[$key] === null ) {
        // print 'ERROR_NOT_VALIDATE_TYPE_' . $key;
        return null;
      }
    }
    return $value;
  }
}
