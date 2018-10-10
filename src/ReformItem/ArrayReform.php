<?php

namespace Oploshka\ReformItem;

class ArrayReform implements \Oploshka\Reform\ReformItemInterface {

  private static $settings = [];

  public static function getSettings(){
    return self::$settings;
  }

  public static function validate($items, $validates = array(), $Reform = NULL) {
    $value = array();
  
    foreach($validates as $key => $validate){
      // если обязательное поле отсутствует или равно NULL, пустая строка
      if(!isset($items[$key]) || $items[$key] === array() || $items[$key] === NULL || $items[$key] === '' ) {
        // обязательно ли поле?
        if(!(isset($validate['req']) && $validate['req']==false)){
          // print $key;
          return NULL;
        }
        // поле необязательно
        $value[$key] = NULL;
        continue;
      }
      // если поле есть то проверим его
      $value[$key] = $Reform->item($items[$key], $validate);
    
      if( $value[$key] === NULL ) {
        // print 'ERROR_NOT_VALIDATE_TYPE_' . $key;
        return NULL;
      }
    }
    return $value;
  }
}
