<?php

namespace Rpc\Utils\Validate\system;

class ArrayValidate implements \Rpc\Utils\ValidateInterface {

  private static $settings = [
    'parentValidateClass' => NULL,
  ];

  public static function getSettings(){
    return self::$settings;
  }

  public static function validate($items, $validates = array()) {
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
      $value[$key] = \Rpc\Utils\Validate::item($items[$key], $validate);
    
      if( $value[$key] === NULL ) {
        // print 'ERROR_NOT_VALIDATE_TYPE_' . $key;
        return NULL;
      }
    }
    return $value;
  }
}
